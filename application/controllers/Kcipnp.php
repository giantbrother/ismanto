<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kcipnp extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kcipnp');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKcipnp'] 	= $this->M_kcipnp->select_all();

<<<<<<< HEAD
		$data['page'] 		= "KCI";
		$data['judul'] 		= "Data Pnp KCI";
		$data['deskripsi'] 	= "List Data Penumpang KCI";
=======
		$data['page'] 		= "Rute";
		$data['judul'] 		= "Data Pnp KCI";
		$data['deskripsi'] 	= "List Data Penumpang LRT";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$data['modal_tambah_kcipnp'] = show_my_modal('modals/modal_tambah_kcipnp', 'tambah-kcipnp', $data);

		$this->template->views('kcipnp/home', $data);
	}


	

	public function tampil() {
		$data['dataKcipnp'] = $this->M_kcipnp->select_all();
		$this->load->view('kcipnp/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('id_stasiun', 'id_stasiun', 'trim|required');
		
<<<<<<< HEAD
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kcipnp->insert($data);
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
=======
		$data = $this->input->post();
		if (!empty($this->input->post('pnp')) 
			&& !empty($this->input->post('tanggal')) 
			&& !empty($this->input->post('id'))
			&& !empty($this->input->post('id_stasiun'))) {
			$result = $this->M_kcipnp->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('kcipnp'));
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}


	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataKcipnp'] 	= $this->M_kcipnp->select_by_id($id);
<<<<<<< HEAD
		$data['datast'] 	= $this->M_kcipnp->cari_st($id);
=======

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		echo show_my_modal('modals/modal_update_kcipnp', 'update-kcipnp', $data);
	}

	public function prosesUpdate() {
<<<<<<< HEAD
		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		//$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		//$this->form_validation->set_rules('id', 'idnye', 'trim|required');
=======
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kcipnp->update($data);

			if ($result > 0) {
				$out['status'] = '';
<<<<<<< HEAD
				$out['msg'] = show_succ_msg('Data  Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Gagal diupdate', '20px');
=======
				$out['msg'] = show_succ_msg('Data Nama Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Nama Gagal diupdate', '20px');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kcipnp->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pnp KCI Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pnp KCI Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
<<<<<<< HEAD
		$data['kcipnp'] = $this->M_kcipnp->select_by_detail($id);
		$data['jumlahKcipnp'] = $this->M_kcipnp->total_rows();
		$data['dataKcipnp'] = $this->M_kcipnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_kcipnp', 'detail-kcipnp', $data, 'lg');
=======
		$data['kcipnp'] = $this->M_kcipnp->select_by_id($id);
		$data['jumlahKcipnp'] = $this->M_kcipnp->total_rows();
		$data['dataKcipnp'] = $this->M_kcipnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_lrt', 'detail-lrt', $data, 'lg');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kcipnp->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Stasiun");
<<<<<<< HEAD
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Jumlah Penumpang");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Tanggal");

=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
<<<<<<< HEAD
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->id_stasiun);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->pnp); 
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal);  
=======
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Pnpkci.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pnpkci.xlsx', NULL);
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
						$check = $this->M_kcipnp->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
							$resultData[$index]['pnp'] = ucwords($value['C']);
							$resultData[$index]['tanggal'] = ucwords($value['D']);
							$resultData[$index]['id_stasiun'] = ucwords($value['B']);
							$resultData[$index]['status'] = ucwords($value['E']);
=======
						$check = $this->M_kcipnp->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kcipnp->insert_batch($resultData);
					if ($result > 0) {
<<<<<<< HEAD
						$this->session->set_flashdata('msg', show_succ_msg('Data Kcipnp Berhasil diimport ke database'));
						redirect('Kcipnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Kcipnp Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
=======
						$this->session->set_flashdata('msg', show_succ_msg('Data Lrt Berhasil diimport ke database'));
						redirect('Kcipnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Lrt Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
					redirect('Kcipnp');
				}

			}
		}
	}
}

/* End of file Kcipnp.php */
/* Location: ./application/controllers/Kcipnp.php */