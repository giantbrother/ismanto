<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Railink extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_railink');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataRailink'] 	= $this->M_railink->select_all();

		$data['page'] 		= "Rute";
		$data['judul'] 		= "Data Railink";
		$data['deskripsi'] 	= "List Data Stasiun Railink";

		$data['modal_tambah_railink'] = show_my_modal('modals/modal_tambah_railink', 'tambah-railink', $data);

		$this->template->views('railink/home', $data);
	}


	

	public function tampil() {
		$data['dataRailink'] = $this->M_railink->select_all();
		$this->load->view('railink/list_data', $data);
	}

	public function prosesTambah() {
		
		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		
		$data = $this->input->post();
		if (!empty($this->input->post('id')) 
			&& !empty($this->input->post('nama'))) {
			$result = $this->M_railink->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('railink'));
	}
	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataRailink'] 	= $this->M_railink->select_by_id($id);

		echo show_my_modal('modals/modal_update_railink', 'update-railink', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('railink', 'railink', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_railink->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Railink Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Railink Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_railink->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Railink Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Railink Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['railink'] = $this->M_railink->select_by_id($id);
		$data['jumlahRailink'] = $this->M_railink->total_rows();
		$data['dataRailink'] = $this->M_railink->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_railink', 'detail-railink', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_railink->select_all();

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
		$objWriter->save('./assets/excel/Data Stasiun.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Stasiun.xlsx', NULL);
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
						$check = $this->M_railink->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_railink->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Lrt Berhasil diimport ke database'));
						redirect('Lrt');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Lrt Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Lrt');
				}

			}
		}
	}
}

/* End of file Railink.php */
/* Location: ./application/controllers/Railink.php */