<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kcipnp extends CI_Model {
	
	public function select_all() {
<<<<<<< HEAD
		$this->db->select('kci.*', FALSE);
		$this->db->select('kcipnp.*', FALSE);
		$this->db->from('kcipnp');
		$this->db->join('kci', 'kci.id = kcipnp.id_stasiun');
=======
		$this->db->select('*');
		$this->db->from('kcipnp');

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kcipnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	public function select_by_detail($id) {
		$sql = "SELECT * FROM kcipnp INNER JOIN kci ON kcipnp.id_stasiun = kci.id WHERE kcipnp.id_stasiun = kci.id AND kcipnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM kcipnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	
	public function cari_st() {
		$sql = "SELECT * FROM kci";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function insert($data) {
		$sql = "INSERT INTO kcipnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
=======


	public function insert($data) {
		$table      = 'kcipnp';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'pnp'            => $this->input->post('pnp', TRUE),
			'id_stasiun'            => $this->input->post('id_stasiun', TRUE),
			'tanggal'           => $this->input->post('tanggal', TRUE),
			'status' =>1,
			);
			$this->db->insert('kcipnp', $data);
			return $this->db->affected_rows();
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kcipnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
<<<<<<< HEAD
			$sql = "UPDATE kcipnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
=======
		$sql = "UPDATE kcipnp SET nama='" .$data['nama'] ."' , tanggal='" .$data['tanggal'] ."' WHERE id='" .$data['id'] ."'";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kcipnp WHERE id='" .$id ."'";

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
		$data = $this->db->get('kcipnp');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('kcipnp');

		return $data->num_rows();
	}
}

/* End of file M_kcipnp.php */
/* Location: ./application/models/M_kcipnp.php */