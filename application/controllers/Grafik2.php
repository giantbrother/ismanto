<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik2 extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_grafik2');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['graph'] 	= $this->M_grafik2->graph();
		$data['page'] 		= "menu";
		$data['judul'] 		= "Data Grafik";
		$data['deskripsi'] 	= "List Grafik";
		
		$this->template->views('grafik2/home', $data);
	}

}

/* End of file Grafik.php */
/* Location: ./application/controllers/Grafik.php */