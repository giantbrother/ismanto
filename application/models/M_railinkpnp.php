<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_railinkpnp extends CI_Model {
	
	public function select_all() {
		$this->db->select('railink.*', FALSE);
		$this->db->select('railinkpnp.*', FALSE);
		$this->db->from('railinkpnp');
		$this->db->join('railink', 'railink.id = railinkpnp.id_stasiun');
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM railinkpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function select_by_detail($id) {
		$sql = "SELECT * FROM railinkpnp INNER JOIN railink ON railinkpnp.id_stasiun = railink.id WHERE railinkpnp.id_stasiun = railink.id AND railinkpnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM railinkpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function cari_st() {
		$sql = "SELECT * FROM railink";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO railinkpnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('railinkpnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE railinkpnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM railinkpnp WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_pnp($nama) {
		$this->db->where('id', $nama);
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