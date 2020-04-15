<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_laporan');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMenu'] 	= $this->M_laporan->select_all();

		$data['page'] 		= "menu";
		$data['judul'] 		= "Data Laporan";
		$data['deskripsi'] 	= "List Laporan";

		
		$this->template->views('menu/home', $data);
	}

	public function eks()
	{
		$dari=$this->input->post('dari');
		$ke=$this->input->post('sampai');
		$bulan =$this->input->post('bulan');
		$data['all']=$this->M_laporan->all($dari, $ke, $bulan);
		$this->template->views('Laporan/export', $data);
	}

	public function export() {
		error_reporting(E_ALL);
    
		include_once './assets/phpexcel/Classes/PHPExcel.php';
		$objPHPExcel = new PHPExcel();

		$data = $this->M_laporan->select_all();

		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0); 

		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', "PNP");
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', "TANGGAL");
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', "TRANSPORTASI");

		$rowCount = 2;
		foreach($data as $value){
		    $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->pnp);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->tanggal); 
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->id_kereta);  
		    $rowCount++; 
		} 

		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		$objWriter->save('./assets/excel/Data Rekap.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data Rekap.xlsx', NULL);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */