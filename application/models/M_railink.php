<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_railink extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('railink');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM railink WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	
	public function select_by_detail($id) {
		$sql = "SELECT * FROM railink WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM railink WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function cari_st() {
		$sql = "SELECT * FROM railink";

		$data = $this->db->query($sql);

		return $data->result();
	}
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e



	public function insert($data) {
<<<<<<< HEAD
		$sql = "INSERT INTO railink VALUES('" .$data['id'] ."','" .$data['nama'] ."', status=1)";
=======
		$sql = "INSERT INTO railink VALUES('','" .$data['nama'] ."'	,'" .$data['tanggal'] ."')";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('railink', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE railink SET nama='" .$data['nama'] ."'  WHERE id='" .$data['id'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM railink WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

<<<<<<< HEAD
	public function check_pnp($nama) {
		$this->db->where('id', $nama);
=======
	public function check_nama($nama) {
		$this->db->where('nama', $nama);
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		$data = $this->db->get('railink');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('railink');

		return $data->num_rows();
	}
}

/* End of file M_railink.php */
/* Location: ./application/models/M_railink.php */