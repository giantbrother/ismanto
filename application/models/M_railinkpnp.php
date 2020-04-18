<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_railinkpnp extends CI_Model {
	
	public function select_all() {
<<<<<<< HEAD
		$this->db->select('railink.*', FALSE);
		$this->db->select('railinkpnp.*', FALSE);
		$this->db->from('railinkpnp');
		$this->db->join('railink', 'railink.id = railinkpnp.id_stasiun');
=======
		$this->db->select('*');
		$this->db->from('railinkpnp');

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM railinkpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	
		public function select_by_detail($id) {
		$sql = "SELECT * FROM railinkpnp INNER JOIN railink ON railinkpnp.id_stasiun = railink.id WHERE railinkpnp.id_stasiun = railink.id AND railinkpnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM railinkpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	public function cari_st() {
		$sql = "SELECT * FROM railink";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO railinkpnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
=======


	public function insert($data) {
		$table      = 'railinkpnp';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'pnp'            => $this->input->post('pnp', TRUE),
			'id_stasiun'            => $this->input->post('id_stasiun', TRUE),
			'tanggal'           => $this->input->post('tanggal', TRUE),
			'status' =>1,
			);
			$this->db->insert('railinkpnp', $data);
			return $this->db->affected_rows();
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function insert_batch($data) {
		$this->db->insert_batch('railinkpnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
<<<<<<< HEAD
		$sql = "UPDATE railinkpnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
=======
		$sql = "UPDATE railinkpnp SET nama='" .$data['nama'] ."' , tanggal='" .$data['tanggal'] ."' WHERE id='" .$data['id'] ."'";
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM railinkpnp WHERE id='" .$id ."'";

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
		$data = $this->db->get('railinkpnp');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('railinkpnp');

		return $data->num_rows();
	}
}

/* End of file M_railinkpnp.php */
/* Location: ./application/models/M_railinkpnp.php */