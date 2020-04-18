<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafik2 extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
		
		public function graph()
	{
		$data = $this->db->query("SELECT * from input");
		return $data->result();
	}

}