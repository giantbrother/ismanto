<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik1 extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_grafik1');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMenu'] 	= $this->M_grafik1->select_all();
		$data['page'] 		= "menu";
		$data['judul'] 		= "Data Grafik";
		$data['deskripsi'] 	= "List Grafik";
		foreach($this->M_grafik1->statistik_pengunjung()->result_array() as $row)
		{
		 $data['grafik'][]=(float)$row['Januari'];
		 $data['grafik'][]=(float)$row['Februari'];
		 $data['grafik'][]=(float)$row['Maret'];
		 $data['grafik'][]=(float)$row['April'];
		 $data['grafik'][]=(float)$row['Mei'];
		 $data['grafik'][]=(float)$row['Juni'];
		 $data['grafik'][]=(float)$row['Juli'];
		 $data['grafik'][]=(float)$row['Agustus'];
		 $data['grafik'][]=(float)$row['September'];
		 $data['grafik'][]=(float)$row['Oktober'];
		 $data['grafik'][]=(float)$row['November'];
		 $data['grafik'][]=(float)$row['Desember'];
		}
		
		
		$this->template->views('grafik1/home', $data);
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */