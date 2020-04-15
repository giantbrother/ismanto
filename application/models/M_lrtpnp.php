<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lrtpnp extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('lrtpnp');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM lrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM lrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}


	public function insert($data) {
		$table      = 'lrtpnp';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'pnp'            => $this->input->post('pnp', TRUE),
			'id_stasiun'            => $this->input->post('id_stasiun', TRUE),
			'tanggal'           => $this->input->post('tanggal', TRUE),
			'status' =>1,
			);
			$this->db->insert('lrtpnp', $data);
			return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('lrtpnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE lrtpnp SET nama='" .$data['nama'] ."' , tanggal='" .$data['tanggal'] ."' WHERE id='" .$data['id'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM lrtpnp WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('lrtpnp');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('lrtpnp');

		return $data->num_rows();
	}
}

/* End of file M_Lrtpnp.php */
/* Location: ./application/models/M_Lrtpnp.php */