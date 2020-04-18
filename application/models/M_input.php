<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {

	public $table = "input";

	public function select_all() {
		$this->db->select('*');
		$this->db->from('input');

		$data = $this->db->get();

		return $data->result();
	}
	

	public function select_by_id($id) {
		$sql = "SELECT input.id AS input, input.pnp AS pnp, input.tanggal, input.id_kereta,  AND input.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_input($id) {
		$sql = "SELECT COUNT(*) AS jml FROM input WHERE id_input = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_id_kereta($id) {
		$sql = "SELECT COUNT(*) AS jml FROM input WHERE id_kereta = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE input SET pnp='" .$data['pnp'] ."', tanggal='" .$data['tanggal'] ."', id_kereta=" .$data['id_kereta'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {

		$sql = "DELETE FROM input WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$table      = 'input';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'pnp'            => $this->input->post('pnp', TRUE),
			'id_kereta'            => $this->input->post('id_kereta', TRUE),
			'tanggal'           => $this->input->post('tanggal', TRUE),
			'status' =>1,
			);
			$this->db->insert('input', $data);
			return $this->db->affected_rows();
	}



	public function insert_batch($data) {
		$this->db->insert_batch('input', $data);
		
		return $this->db->affected_rows();
	}

	public function check_id_kereta($id_kereta) {
		$this->db->where('id_kereta', $id_kereta);
		$data = $this->db->get('input');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('input');

		return $data->num_rows();
	}

	
}

/* End of file M_input.php */
/* Location: ./application/models/M_input.php */