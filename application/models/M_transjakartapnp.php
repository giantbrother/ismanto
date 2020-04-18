<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transjakartapnp extends CI_Model {
	
	public function select_all() {
		$this->db->select('transjakarta.*', FALSE);
		$this->db->select('transjakartapnp.*', FALSE);
		$this->db->from('transjakartapnp');
		$this->db->join('transjakarta', 'transjakarta.id = transjakartapnp.id_stasiun');
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM transjakartapnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function select_by_detail($id) {
		$sql = "SELECT * FROM transjakartapnp INNER JOIN transjakarta ON transjakartapnp.id_stasiun = transjakarta.id WHERE transjakartapnp.id_stasiun = transjakarta.id AND transjakartapnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM transjakartapnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function cari_st() {
		$sql = "SELECT * FROM transjakarta";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO transjakartapnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('transjakartapnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE transjakartapnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM transjakartapnp WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_pnp($nama) {
		$this->db->where('id', $nama);
		$data = $this->db->get('transjakartapnp');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('transjakartapnp');

		return $data->num_rows();
	}
}

/* End of file M_transjakartapnp.php */
/* Location: ./application/models/M_transjakartapnp.php */