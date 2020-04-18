<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lrtpnp extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_lrtpnp');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataLrtpnp'] 	= $this->M_lrtpnp->select_all();

		$data['page'] 		= "Rute";
		$data['judul'] 		= "Data Pnp LRT";
		$data['deskripsi'] 	= "List Data Penumpang LRT";

		$data['modal_tambah_lrtpnp'] = show_my_modal('modals/modal_tambah_lrtpnp', 'tambah-lrtpnp', $data);

		$this->template->views('lrtpnp/home', $data);
	}


	

	public function tampil() {
		$data['dataLrtpnp'] = $this->M_lrtpnp->select_all();
		$this->load->view('lrtpnp/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
<<<<<<< HEAD
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');



		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lrtpnp->insert($data);
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
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('id_stasiun', 'id_stasiun', 'trim|required');
		
		$data = $this->input->post();
		if (!empty($this->input->post('pnp')) 
			&& !empty($this->input->post('tanggal')) 
			&& !empty($this->input->post('id'))
			&& !empty($this->input->post('id_stasiun'))) {
			$result = $this->M_lrtpnp->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('lrtpnp'));
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}


	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
<<<<<<< HEAD
		$data['dataLrtpnp'] 	= $this->M_lrtpnp->select_by_id($id);
		$data['datast'] 	= $this->M_lrtpnp->cari_st($id);
		
		echo show_my_modal('modals/modal_update_lrtpnp', 'update-lrtpnp', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');	
		//$this->form_validation->set_rules('id_stasiun', 'id', 'trim|required');
		//$this->form_validation->set_rules('id', 'idnye', 'trim|required');

=======
		$data['dataLrt'] 	= $this->M_lrtpnp->select_by_id($id);

		echo show_my_modal('modals/modal_update_lrt', 'update-lrt', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_lrtpnp->update($data);

			if ($result > 0) {
				$out['status'] = '';
<<<<<<< HEAD
				$out['msg'] = show_succ_msg('Data Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data  Gagal diupdate', '20px');
=======
				$out['msg'] = show_succ_msg('Data Nama Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data KoNamata Gagal diupdate', '20px');
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
		$result = $this->M_lrtpnp->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Pnp Lrt Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Pnp Lrt Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
<<<<<<< HEAD
		$data['lrtpnp'] = $this->M_lrtpnp->select_by_detail($id);
		$data['jumlahLrtpnp'] = $this->M_lrtpnp->total_rows();
		$data['dataLrtpnp'] = $this->M_lrtpnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_lrtpnp', 'detail-lrtpnp', $data, 'lg');
=======
		$data['lrtpnp'] = $this->M_lrtpnp->select_by_id($id);
		$data['jumlahLrtpnp'] = $this->M_lrtpnp->total_rows();
		$data['dataLrtpnp'] = $this->M_lrtpnp->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_lrt', 'detail-lrt', $data, 'lg');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_lrtpnp->select_all();

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
		$objWriter->save('./assets/excel/Data Pnplrt.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Pnplrt.xlsx', NULL);
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
						$check = $this->M_lrtpnp->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
							$resultData[$index]['pnp'] = ucwords($value['C']);
							$resultData[$index]['tanggal'] = ucwords($value['D']);
							$resultData[$index]['id_stasiun'] = ucwords($value['B']);
							$resultData[$index]['status'] = ucwords($value['E']);
							
=======
						$check = $this->M_lrtpnp->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_lrtpnp->insert_batch($resultData);
					if ($result > 0) {
<<<<<<< HEAD
						$this->session->set_flashdata('msg', show_succ_msg('Data Penumpang Lrt Berhasil diimport ke database'));
						redirect('Lrtpnp');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data  Penumpang Lrt Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Lrtpnp');
=======
						$this->session->set_flashdata('msg', show_succ_msg('Data Lrt Berhasil diimport ke database'));
						redirect('Lrt');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Lrt Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Lrt');
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
				}

			}
		}
	}
}

<<<<<<< HEAD
/* End of file Lrtpnp.php */
/* Location: ./application/controllers/Lrtpnp.php */
=======
/* End of file Lrt.php */
/* Location: ./application/controllers/Lrt.php */
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
