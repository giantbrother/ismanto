<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Railinkpnp extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_railinkpnp');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataRailinkpnp'] 	= $this->M_railinkpnp->select_all();

		$data['page'] 		= "Rute";
		$data['judul'] 		= "Data Pnp Railink";
		$data['deskripsi'] 	= "List Data Penumpang Railink";

		$data['modal_tambah_railinkpnp'] = show_my_modal('modals/modal_tambah_railinkpnp', 'tambah-railinkpnp', $data);

		$this->template->views('railinkpnp/home', $data);
	}



	public function tampil() {
		$data['dataRailinkpnp'] = $this->M_railinkpnp->select_all();
		$this->load->view('railinkpnp/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('id_stasiun', 'id_stasiun', 'trim|required');
		
		$data = $this->input->post();
		if (!empty($this->input->post('pnp')) 
			&& !empty($this->input->post('tanggal')) 
			&& !empty($this->input->post('id'))
			&& !empty($this->input->post('id_stasiun'))) {
			$result = $this->M_railinkpnp->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('railinkpnp'));
	}


	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataRailinkpnp'] 	= $this->M_railinkpnp->select_by_id($id);

		echo show_my_modal('modals/modal_update_raininkpnp', 'update-railinkpnp', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_railinkpnp->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Nama Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Nama Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_railinkpnp->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pnp Railink Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pnp Railink Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['railinkpnp'] = $this->M_railinkpnp->select_by_id($id);
		$data['jumlahRailinkpnp'] = $this->M_railinkpnp->total_rows();
		$data['dataRailinkpnp'] = $this->M_railinkpnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_railink', 'detail-railink', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_railinkpnp->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Stasiun");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pnprailink.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pnprailink.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_railinkpnp->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_railinkpnp->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Railinkpnp Berhasil diimport ke database'));
						redirect('Railinkpnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Railinkpnp Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Railinkpnp');
				}

			}
		}
	}
}

/* End of file Railinkpnp.php */
/* Location: ./application/controllers/Railinkpnp.php */