<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mrtpnp extends CI_Model {
	
	public function select_all() {
		$this->db->select('mrt.*', FALSE);
		$this->db->select('mrtpnp.*', FALSE);
		$this->db->from('mrtpnp');
		$this->db->join('mrt', 'mrt.id = mrtpnp.id_stasiun');
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM mrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function select_by_detail($id) {
		$sql = "SELECT * FROM mrtpnp INNER JOIN mrt ON mrtpnp.id_stasiun = mrt.id WHERE mrtpnp.id_stasiun = mrt.id AND mrtpnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM mrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function cari_st() {
		$sql = "SELECT * FROM mrt";

		$data = $this->db->query($sql);

		return $data->result();
	}

<<<<<<< HEAD

	public function insert($data) {
		$sql = "INSERT INTO mrtpnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
=======
	public function insert($data) {
		$table      = 'mrtpnp';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'pnp'            => $this->input->post('pnp', TRUE),
			'id_stasiun'            => $this->input->post('id_stasiun', TRUE),
			'tanggal'           => $this->input->post('tanggal', TRUE),
			'status' =>1,
			);
			$this->db->insert('mrtpnp', $data);
			return $this->db->affected_rows();
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	}

	public function insert_batch($data) {
		$this->db->insert_batch('mrtpnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE mrtpnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM mrtpnp WHERE id='" .$id ."'";

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
		$data = $this->db->get('mrtpnp');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('mrtpnp');

		return $data->num_rows();
	}
}

/* End of file M_mrtpnp.php */
/* Location: ./application/models/M_mrtpnp.php */