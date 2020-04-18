<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transjakartapnp extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_transjakartapnp');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTransjakartapnp'] 	= $this->M_transjakartapnp->select_all();

		$data['page'] 		= "Transjakarta";
		$data['judul'] 		= "Data Pnp Transjakarta";
		$data['deskripsi'] 	= "List Data Penumpang Transjakarta";

		$data['modal_tambah_transjakartapnp'] = show_my_modal('modals/modal_tambah_transjakartapnp', 'tambah-transjakartapnp', $data);

		$this->template->views('transjakartapnp/home', $data);
	}



	public function tampil() {
		$data['dataTransjakartapnp'] = $this->M_transjakartapnp->select_all();
		$this->load->view('transjakartapnp/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('id_stasiun', 'id_stasiun', 'trim|required');
		
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transjakartapnp->insert($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Gagal ditambahkan  ', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}


	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataTransjakartapnp'] 	= $this->M_transjakartapnp->select_by_id($id);
		$data['datast'] 	= $this->M_transjakartapnp->cari_st($id);
		echo show_my_modal('modals/modal_update_transjakartapnp', 'update-transjakartapnp', $data);
	}

	public function prosesUpdate() {
		
		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		//$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		//$this->form_validation->set_rules('id', 'idnye', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transjakartapnp->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_transjakartapnp->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pnp Transjarta Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pnp Transjarta Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['transjakartapnp'] = $this->M_transjakartapnp->select_by_detail($id);
		$data['jumlahTransjakartapnp'] = $this->M_transjakartapnp->total_rows();
		$data['dataTransjakartapnp'] = $this->M_transjakartapnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_transjakartapnp', 'detail-transjakartapnp', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_transjakartapnp->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Stasiun");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Jumlah Penumpang");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Tanggal");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->id_stasiun);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->pnp); 
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal);  
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data transjakartapnp.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data transjakartapnp.xlsx', NULL);
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
						$check = $this->M_transjakartapnp->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
							$resultData[$index]['pnp'] = ucwords($value['C']);
							$resultData[$index]['tanggal'] = ucwords($value['D']);
							$resultData[$index]['id_stasiun'] = ucwords($value['B']);
							$resultData[$index]['status'] = ucwords($value['E']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_transjakartapnp->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data transjakartapnp Berhasil diimport ke database'));
						redirect('transjakartapnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data transjakartapnp Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('transjakartapnp');
				}

			}
		}
	}
}

/* End of file Transjakartapnp.php */
/* Location: ./application/controllers/Transjakartapnp.php */