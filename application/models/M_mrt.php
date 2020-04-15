<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mrt extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('mrt');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM mrt WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}



	public function insert($data) {
		$table      = 'mrt';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'nama'            => $this->input->post('nama', TRUE),
		
			'status' =>1,
			);
			$this->db->insert('mrt', $data);
			return $this->db->affected_rows();
	}


	public function insert_batch($data) {
		$this->db->insert_batch('mrt', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE mrt SET nama='" .$data['nama'] ."' WHERE id='" .$data['id'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM mrt WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('mrt');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('mrt');

		return $data->num_rows();
	}
}

/* End of file M_mrt.php */
/* Location: ./application/models/M_mrt.php */