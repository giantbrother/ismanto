<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mrtpnp extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_mrtpnp');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMrtpnp'] 	= $this->M_mrtpnp->select_all();

		$data['page'] 		= "MRT";
		$data['judul'] 		= "Data Pnp MRT";
		$data['deskripsi'] 	= "List Data Penumpang MRT";

		$data['modal_tambah_mrtpnp'] = show_my_modal('modals/modal_tambah_mrtpnp', 'tambah-mrtpnp', $data);

		$this->template->views('mrtpnp/home', $data);
	}


	

	public function tampil() {
		$data['dataMrtpnp'] = $this->M_mrtpnp->select_all();
		$this->load->view('mrtpnp/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');



		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_mrtpnp->insert($data);
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
		$data['dataMrtpnp'] 	= $this->M_mrtpnp->select_by_id($id);
		$data['datast'] 	= $this->M_mrtpnp->cari_st($id);

		echo show_my_modal('modals/modal_update_mrtpnp', 'update-mrtpnp', $data);
	}

	public function prosesUpdate() {


		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		//$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		//$this->form_validation->set_rules('id', 'idnye', 'trim|required');



		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_mrtpnp->update($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_mrtpnp->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Penumpang  Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Penumpang dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['mrtpnp'] = $this->M_mrtpnp->select_by_detail($id);
		$data['jumlahMrtpnp'] = $this->M_mrtpnp->total_rows();
		//$data['dataMrtpnp'] = $this->M_mrtpnp->select_by_stasiun($id);
		
		echo show_my_modal('modals/modal_detail_mrtpnp', 'detail-mrtpnp', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_mrtpnp->select_all();

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
		$objWriter->save('./assets/excel/Data Mrtpnp.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Mrtpnp.xlsx', NULL);
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
						$check = $this->M_mrtpnp->check_pnp($value['B']);

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
					$result = $this->M_mrtpnp->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Penumpang Mrt Berhasil diimport ke database'));
						redirect('Mrtpnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Penumpang Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Mrtpnp');
				}

			}
		}
	}
}

/* End of file Mrtpnp.php */
/* Location: ./application/controllers/Mrtpnp.php */