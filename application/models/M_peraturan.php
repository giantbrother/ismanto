<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peraturan extends CI_Model {
	
	public function select_all() {
		$this->db->select('*');
		$this->db->from('peraturan');

		$data = $this->db->get();

		return $data->result();
	}
	
	function get_all_pics(){
		$all_pics = $this->db->get('peraturan');
		return $all_pics->result();
	}

	//save picture data to db
		function store_pic_data($data){
		$insert_data['nama'] = $data['nama'];
		$insert_data['tentang'] = $data['tentang'];
		$insert_data['gambar'] = $data['gambar'];

		$query = $this->db->insert('peraturan', $insert_data);
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM peraturan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	public function select_by_detail($id) {
		$sql = "SELECT * FROM peraturan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
	public function select_by_stasiun($id) {
		$sql = "SELECT * FROM peraturan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
		public function cari_st() {
		$sql = "SELECT * FROM peraturan";

		$data = $this->db->query($sql);

		return $data->result();
	}
	

	public function insert($data) {

		$sql = "INSERT INTO peraturan VALUES('" .$data['id'] ."','" .$data['nama'] ."','" .$data['tentang'] ."'	,'" .$data['gambar'] ."', status=1)";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('peraturan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE peraturan SET nama='" .$data['nama'] ."','" .$data['tentang'] ."''" .$data['gambar'] ."' WHERE id='" .$data['id'] ."'";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM peraturan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_pnp($nama) {
		$this->db->where('id', $nama);
		$data = $this->db->get('peraturan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('peraturan');

		return $data->num_rows();
	}
}

/* End of file M_peraturan.php */
/* Location: ./application/models/M_peraturan.php */