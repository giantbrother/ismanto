<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lrt extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('lrt');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM lrt WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
<<<<<<< HEAD
	
			public function select_by_detail($id) {
		$sql = "SELECT * FROM lrt WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function select_by_stasiun($id) {
		$sql = "SELECT * FROM lrt WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function cari_st() {
		$sql = "SELECT * FROM lrt";

		$data = $this->db->query($sql);

		return $data->result();
	}
=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e



	public function insert($data) {
<<<<<<< HEAD
		$sql = "INSERT INTO lrt VALUES('" .$data['id'] ."','" .$data['nama'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
	}


=======
		$table      = 'lrt';
		$data = array(
			//tabel di database => name di form
			'id'            => $this->input->post('id', TRUE),
			'nama'            => $this->input->post('nama', TRUE),
		
			'status' =>1,
			);
			$this->db->insert('lrt', $data);
			return $this->db->affected_rows();
	}

>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
	public function insert_batch($data) {
		$this->db->insert_batch('lrt', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE lrt SET nama='" .$data['nama'] ."'  WHERE id='" .$data['id'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM lrt WHERE id='" .$id ."'";

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
		$data = $this->db->get('lrt');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('lrt');

		return $data->num_rows();
	}
}

/* End of file M_Lrt.php */
/* Location: ./application/models/M_lrt.php */