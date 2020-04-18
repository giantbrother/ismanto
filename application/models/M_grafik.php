<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafik extends CI_Model {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('input');

		$data = $this->db->get();

		return $data->result();
	}

	
	function statistik_pengunjung()
		{
		 
		 $sql= $this->db->query("
		 
		 select
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=1)AND (YEAR(tanggal)=2020))),0) AS `Januari`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=2)AND (YEAR(tanggal)=2020))),0) AS `Februari`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=3)AND (YEAR(tanggal)=2020))),0) AS `Maret`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=4)AND (YEAR(tanggal)=2020))),0) AS `April`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=5)AND (YEAR(tanggal)=2020))),0) AS `Mei`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=6)AND (YEAR(tanggal)=2020))),0) AS `Juni`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=7)AND (YEAR(tanggal)=2020))),0) AS `Juli`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=8)AND (YEAR(tanggal)=2020))),0) AS `Agustus`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=9)AND (YEAR(tanggal)=2020))),0) AS `September`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=10)AND (YEAR(tanggal)=2020))),0) AS `Oktober`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=11)AND (YEAR(tanggal)=2020))),0) AS `November`,
		 ifnull((SELECT SUM(pnp) FROM (input)WHERE((Month(tanggal)=12)AND (YEAR(tanggal)=2020))),0) AS `Desember`
		from input GROUP BY YEAR(tanggal) 
		 
		 ");
		 
		 return $sql;
		 
		} 

}