<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transjakarta extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_transjakarta');
	}
	
	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataTransjakarta'] 	= $this->M_transjakarta->select_all();

		$data['page'] 		= "Halte";
		$data['judul'] 		= "Data Transjkarta";
		$data['deskripsi'] 	= "List Data Stasiun Transjkarta";

		$data['modal_tambah_transjakarta'] = show_my_modal('modals/modal_tambah_transjakarta', 'tambah-transjakarta', $data);

		$this->template->views('transjakarta/home', $data);
	}
	
	public function tampil() {
		$data['dataTransjakarta'] = $this->M_transjakarta->select_all();
		$this->load->view('transjakarta/list_data', $data);
	}

	public function prosesTambah() {
		
		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		
		
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transjakarta->insert($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Halte transjakarta  Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun transjakarta Gagal ditambahkan  ', '20px');
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
		$data['dataTransjakarta'] 	= $this->M_transjakarta->select_by_id($id);
		$data['datast'] 	= $this->M_transjakarta->cari_st($id);
		echo show_my_modal('modals/modal_update_transjakarta', 'update-transjakarta', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_transjakarta->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_transjakarta->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Stasiun Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Stasiun Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['transjakarta'] = $this->M_transjakarta->select_by_detail($id);
		$data['jumlahTransjakarta'] = $this->M_transjakarta->total_rows();
		$data['dataTransjakarta'] = $this->M_transjakarta->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_transjakarta', 'detail-transjakarta', $data, 'lg');

	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_transjakarta->select_all();

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
		$objWriter->save('./assets/excel/Data Stasiun transjakarta.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Stasiun transjakarta.xlsx', NULL);
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
						$check = $this->M_transjakarta->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_transjakarta->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Stasiun transjakarta Berhasil diimport ke database'));
						redirect('Transjakarta');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Stasiun transjakarta Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Transjakarta');
				}

			}
		}
	}

}	
