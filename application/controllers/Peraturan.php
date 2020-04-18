<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peraturan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_peraturan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataPeraturan'] 	= $this->M_peraturan->select_all();

		$data['page'] 		= "Peraturan";
		$data['judul'] 		= "Data Peraturan";
		$data['deskripsi'] 	= "List Data Peraturan";

		$data['modal_tambah_peraturan'] = show_my_modal('modals/modal_tambah_peraturan', 'tambah-peraturan', $data);

		$this->template->views('peraturan/home', $data);
		
	}


	public function tampil() {
		$data['dataPeraturan'] = $this->M_peraturan->select_all();
		$this->load->view('peraturan/list_data', $data);
		
	}
	
	
	public function prosesTambah(){
		//validate the form data 

		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		$this->form_validation->set_rules('tentang', 'tentang', 'trim|required');
		$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
		
		$data 	= $this->input->post();
        if ($this->form_validation->run() == FALSE){
		$result = $this->M_peraturan->insert($data);
	
		}else{
			
			//get the form values
			$data['nama'] = $this->input->post('nama', TRUE);
			$data['tentang'] = $this->input->post('tentang', TRUE);
			$data['gambar'] = $this->input->post('gambar', TRUE);
			//file upload code 
			//set file upload settings 
			//$config['upload_path']          = APPPATH. '../uploads/peraturan/';
			//$config['allowed_types']        = 'gif|jpg|png|jpeg';
			//$config['max_size']             = 15000000;
			$config['upload_path'] = './upload/';
	        $config['allowed_types'] = 'gif|jpg|png|doc|txt|pdf|jpeg|xls|docx|xlsx';
	        $config['max_size'] = 1024 * 8;
	        $config['encrypt_name'] = FALSE;
			

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				$error = array('error' => $this->upload->display_errors());
				
				$this->template->views('peraturan/home', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['gambar'] = $upload_data['file_name'];

				//store pic data to the db
				
				$this->M_peraturan->store_pic_data($data);
				redirect('/');
			}
		$this->template->views('peraturan/home', $data);
		}
	}
	public function prosesTambah1() {
		
		$this->form_validation->set_rules('id', 'id', 'trim|required');	
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');	
		$this->form_validation->set_rules('tentang', 'tentang', 'trim|required');
		$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');
		
			
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_peraturan->insert($data);
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
		$data['dataPeraturan'] 	= $this->M_peraturan->select_by_id($id);
		$data['datast'] 	= $this->M_peraturan->cari_st($id);
		echo show_my_modal('modals/modal_update_peraturan', 'update-peraturan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_peraturan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Peraturan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Peraturan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_peraturan->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Peraturan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Peraturan Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['peraturan'] = $this->M_peraturan->select_by_detail($id);
		$data['jumlahPeraturan'] = $this->M_peraturan->total_rows();
		$data['dataPeraturan'] = $this->M_peraturan->select_by_stasiun($id);

		echo show_my_modal('modals/modal_detail_peraturan', 'detail-peraturan', $data, 'lg');

	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_peraturan->select_all();

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
		$objWriter->save('./assets/excel/Data Peraturan.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Peraturan.xlsx', NULL);
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
						$check = $this->M_peraturan->check_pnp($value['B']);

						if ($check != 1) {
							$resultData[$index]['id'] = ucwords($value['A']);
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_peraturan->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Peraturan Berhasil diimport ke database'));
						redirect('Peraturan');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Peraturan Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Peraturan');
				}

			}
		}
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */