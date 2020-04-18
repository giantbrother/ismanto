<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->model('M_menu');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataMenu'] 	= $this->M_menu->select_all();

		$data['page'] 		= "menu";
		$data['judul'] 		= "Data Menu";
		$data['deskripsi'] 	= "List Data Menu";

		
		$this->template->views('home', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */