<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lrtpnp extends CI_Model {
	
	public function select_all() {
		$this->db->select('lrt.*', FALSE);
		$this->db->select('lrtpnp.*', FALSE);
		$this->db->from('lrtpnp');
		$this->db->join('lrt', 'lrt.id = lrtpnp.id_stasiun');
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM lrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function select_by_detail($id) {
		$sql = "SELECT * FROM lrtpnp INNER JOIN lrt ON lrtpnp.id_stasiun = lrt.id WHERE lrtpnp.id_stasiun = lrt.id AND lrtpnp.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM lrtpnp WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
		public function cari_st() {
		$sql = "SELECT * FROM lrt";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function insert($data) {
		$sql = "INSERT INTO lrtpnp VALUES('" .$data['id'] ."','" .$data['pnp'] ."','" .$data['tanggal'] ."'	,'" .$data['id_stasiun'] ."', status=1)";
	
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('lrtpnp', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE lrtpnp SET pnp='" .$data['pnp'] ."' , tanggal='" .$data['tanggal'] ."', id_stasiun='" .$data['id_stasiun'] ."' WHERE id='" .$data['idnye'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM lrtpnp WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_pnp($pnp) {
		$this->db->where('id', $pnp);
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