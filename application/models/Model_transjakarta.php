<?php
 
	class Model_transjakarta extends CI_Model
	{

			function __construct()
			{
			parent::__construct();
			$this->load->database();
			$CI = &get_instance();
			//checkAksesModule();
		
			}


		public $table = "transjakarta";
		


		function save()
		{
			$data = array(
				//tabel di database => name di form
				'id'            => $this->input->post('id', TRUE),
				'pnp'            => $this->input->post('pnp', TRUE),
				'tanggal'           => $this->input->post('tanggal', TRUE),
				
				);
				$this->db->insert($this->table, $data);
		}


		function update()
		{
			if (empty($tujuan)) {
				$data = array(
					//tabel di database => name di form
					'provinsi'            => $this->input->post('provinsi', TRUE),
					'tujuan'           => $this->input->post('tujuan', TRUE),
					'kawasan'           => $this->input->post('kawasan', TRUE),
					'kode_tujuan'           => $this->input->post('kode_tujuan', TRUE),
					);
			} else {
				$data = array(
					//tabel di database => name di form
					'provinsi'            => $this->input->post('provinsi', TRUE),
					'tujuan'           => $this->input->post('tujuan', TRUE),
					'kawasan'           => $this->input->post('kawasan', TRUE),
					'kode_tujuan'           => $this->input->post('kode_tujuan', TRUE)
				);
			}		
			$id_tujuan 	= $this->input->post('id', TRUE);
			$this->db->where('id', $id_tujuan);
			$this->db->update($this->table, $data);
		}
		
		public function cekid()
  		  {
        $query = $this->db2->query("SELECT MAX(id_tujuan) as id_tujuan from tbl_tujuan");
        $hasil = $query->row();
        return $hasil->id_tujuan;
  		  }
	
		public function insert_multiple($data){
		$this->db2->insert_batch('transjakarta', $data);
		}

		public function select_all() {
			$data = $this->db->get('transjakarta');
	
			return $data->result();
		}

	}


?>