<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_input');
		
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataInput'] = $this->M_input->select_all();
	

		$data['page'] = "Data Penumpang";
		$data['judul'] = "** Input Data **";
		$data['deskripsi'] = "Jumlah Penumpang";

		$data['modal_tambah_input'] = show_my_modal('modals/modal_tambah_input', 'tambah-input', $data);

		$this->template->views('input/home', $data);
	}

	public function tampil() {
		$data['dataInput'] = $this->M_input->select_all();
		$this->load->view('input/list_data', $data);
	}

	public function prosesTambah() {
		

		$this->form_validation->set_rules('pnp', 'pnp', 'trim|required');	
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('id_kereta', 'id_kereta', 'trim|required');
		
		$data = $this->input->post();
		if (!empty($this->input->post('pnp')) 
			&& !empty($this->input->post('tanggal')) 
			&& !empty($this->input->post('id'))
			&& !empty($this->input->post('id_kereta'))) {
			$result = $this->M_input->insert($data);
			if ($result > 0) {
				$out['msg'] = show_succ_msg('Data Input Berhasil ditambahkan', '20px');
			} else {
				$out['msg'] = show_err_msg('Data Input Gagal ditambahkan', '20px');
			}
		} else {
			$out['msg'] = 'Data tidak boleh kosong';
		}
		$this->session->set_flashdata('error', $out['msg']);
		redirect(base_url('input'));
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataInput'] = $this->M_input->select_by_id($id);
		
		$data['userdata'] = $this->userdata;
	

		echo show_my_modal('modals/modal_update_input', 'update-input', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('pnp', 'Pnp', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('id_kereta', 'Id Kereta', 'trim|required');
		

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_input->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Input Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Input Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_input->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Input Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Input Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_input->select_all_input();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 
		$rowCount = 1; 

		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, "ID");
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, "Pnp");
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, "Tanggal");
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, "Id Kereta");
		$rowCount++;

		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->pnp); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->tanggal); 
		    $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->id_kereta); 
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Input.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Input.xlsx', NULL);
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
						$id = md5(DATE('ymdhms').rand());
						$check = $this->M_input->check_id_kereta($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = $id;
							$resultData[$index]['pnp'] = ucwords($value['B']);
							$resultData[$index]['tanggal'] = $value['C'];
							$resultData[$index]['id_kereta'] = $value['D'];
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_input->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Input Berhasil diimport ke database'));
						redirect('Input');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Input Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Input');
				}

			}
		}
	}
}

/* End of file Input.php */
/* Location: ./application/controllers/Input.php */