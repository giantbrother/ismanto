<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lrt extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_lrt');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataLrt'] 	= $this->M_lrt->select_all();

<<<<<<< HEAD
		$data['page'] 		= "Stasiun";
=======
		$data['page'] 		= "Rute";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		$data['judul'] 		= "Data LRT";
		$data['deskripsi'] 	= "List Data Stasiun LRT";

		$data['modal_tambah_lrt'] = show_my_modal('modals/modal_tambah_lrt', 'tambah-lrt', $data);

		$this->template->views('lrt/home', $data);
	}


	

	public function tampil() {
		$data['dataLrt'] = $this->M_lrt->select_all();
		$this->load->view('lrt/list_data', $data);
	}

	public function prosesTambah() {
		
		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		
<<<<<<< HEAD
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lrt->insert($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun LRT  Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun LRT Gagal ditambahkan  ', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}
	
=======
		$data = $this->input->post();
		if (!empty($this->input->post('id')) 
			&& !empty($this->input->post('nama'))) {
			$result = $this->M_lrt->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('lrt'));
	}
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataLrt'] 	= $this->M_lrt->select_by_id($id);
<<<<<<< HEAD
$data['datast'] 	= $this->M_lrt->cari_st($id);
=======

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		echo show_my_modal('modals/modal_update_lrt', 'update-lrt', $data);
	}

	public function prosesUpdate() {
<<<<<<< HEAD
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
=======
		$this->form_validation->set_rules('lrt', 'Lrt', 'trim|required');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lrt->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Lrt Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Lrt Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_lrt->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Lrt Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Lrt Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['lrt'] = $this->M_lrt->select_by_id($id);
		$data['jumlahLrt'] = $this->M_lrt->total_rows();
<<<<<<< HEAD
		$data['dataLrt'] = $this->M_lrt->select_by_stasiun($id);
=======
		$data['dataLrt'] = $this->M_lrt->select_by_pegawai($id);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		echo show_my_modal('modals/modal_detail_lrt', 'detail-lrt', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_lrt->select_all();

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
<<<<<<< HEAD
		$objWriter->save('./assets/excel/Data StasiunLrt.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data StasiunLrt.xlsx', NULL);
=======
		$objWriter->save('./assets/excel/Data Stasiun.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Stasiun.xlsx', NULL);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
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
<<<<<<< HEAD
						$check = $this->M_lrt->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
=======
						$check = $this->M_lrt->check_nama($value['B']);

						if ($check != 1) {
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_lrt->insert_batch($resultData);
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

/* End of file Lrt.php */
/* Location: ./application/controllers/Lrt.php */