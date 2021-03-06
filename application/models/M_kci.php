<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kci extends CI_Model {
	
	public function select_all() {
		
		$this->db->select('*');
		$this->db->from('kci');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kci WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	
	public function select_by_detail($id) {
		$sql = "SELECT * FROM kci WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM kci WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function cari_st() {
		$sql = "SELECT * FROM kci";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function insert($data) {
		$sql = "INSERT INTO kci VALUES('" .$data['id'] ."','" .$data['nama'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
=======


	public function insert($data) {
		$table      = 'kci';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'nama'            => $this->input->post('nama', TRUE),
		
			'status' =>1,
			);
			$this->db->insert('kci', $data);
			return $this->db->affected_rows();
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kci', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
<<<<<<< HEAD
			$sql = "UPDATE kci SET nama='" .$data['nama'] ."' WHERE id='" .$data['id'] ."'";
=======
		$sql = "UPDATE kci SET nama='" .$data['kci'] ."' WHERE id='" .$data['id'] ."'";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kci WHERE id='" .$id ."'";

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
		$data = $this->db->get('kci');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kci');

		return $data->num_rows();
	}
}

/* End of file M_kci.php */
/* Location: ./application/models/M_kci.php */