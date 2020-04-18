<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('input');

		$data = $this->db->get();

		return $data->result();
	}

	
	public function all($dari='', $ke='', $bulan='')
	{
		if($dari != '' && $ke != '')
		{
			$q= $this->db->query("SELECT * FROM input WHERE (((tanggal) BETWEEN '".$dari."' AND '".$ke."'))");
		}else{
			$q= $this->db->query("SELECT * FROM input WHERE month(tanggal)='". $bulan ."'");
		}
		return $q->result();	
	}
	
	public function get_total($where='')
		{
			$this->db->select('sum(pnp) as total');
			if($where != ''){ 
				$this->db->where($where);
				}
			$get = $this->db->get('input');
			return ($get ? ($get->num_rows() > 0 ? $get->row()->total : 0) : 0);
		}


}