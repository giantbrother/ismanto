<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kci extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kci');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKci'] 	= $this->M_kci->select_all();

		$data['page'] 		= "Stasuin";
		$data['judul'] 		= "Data KCI";
		$data['deskripsi'] 	= "List Data Stasiun KCI";

		$data['modal_tambah_kci'] = show_my_modal('modals/modal_tambah_kci', 'tambah-kci', $data);

		$this->template->views('kci/home', $data);
	}

	public function tampil() {
		$data['dataKci'] = $this->M_kci->select_all();
		$this->load->view('kci/list_data', $data);
	}

	public function prosesTambah() {
		
		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		
<<<<<<< HEAD
		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kci->insert($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun MRT  Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Stasiun MRT Gagal ditambahkan  ', '20px');
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
			$result = $this->M_kci->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('kci'));
	}
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataKci'] 	= $this->M_kci->select_by_id($id);
<<<<<<< HEAD
		$data['datast'] 	= $this->M_kci->cari_st($id);
=======

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		echo show_my_modal('modals/modal_update_kci', 'update-kci', $data);
	}

	public function prosesUpdate() {
<<<<<<< HEAD
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
=======
		$this->form_validation->set_rules('kci', 'Kci', 'trim|required');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kci->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data KCI Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data KCI Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kci->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data KCI Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data KCI Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
<<<<<<< HEAD
		$data['kci'] = $this->M_kci->select_by_id($id);
		$data['jumlahKci'] = $this->M_kci->total_rows();
		$data['dataKci'] = $this->M_kci->select_by_stasiun($id);
=======
		$data['KCI'] = $this->M_kci->select_by_id($id);
		$data['jumlahKci'] = $this->M_kci->total_rows();
		$data['dataKci'] = $this->M_kci->select_by_input($id);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		echo show_my_modal('modals/modal_detail_kci', 'detail-kci', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_kci->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Stasiun KCI");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
<<<<<<< HEAD
		$objWriter->save('./assets/excel/Data Stasiun Kci.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Stasiun Kci.xlsx', NULL);
=======
		$objWriter->save('./assets/excel/Data Kci.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Kci.xlsx', NULL);
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
						$check = $this->M_kci->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
=======
						$check = $this->M_kci->check_nama($value['B']);

						if ($check != 1) {
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_kci->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data KCI Berhasil diimport ke database'));
						redirect('Kci');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data KCI Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Kci');
				}

			}
		}
	}
}

/* End of file KCI.php */
/* Location: ./application/controllers/KCI.php */