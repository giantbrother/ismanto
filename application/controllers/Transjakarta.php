<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transjakarta extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Model_transjakarta');
		
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKota'] 	= $this->Model_transjakarta->select_all();

		$data['page'] 		= "Rute";
		$data['judul'] 		= "Data MRT";
		$data['deskripsi'] 	= "List Data Stasiun MRT";

		$data['modal_tambah_kota'] = show_my_modal('modals/modal_tambah_kota', 'tambah-kota', $data);

		$this->template->views('transjakarta/index', $data);
	}

		function data()
		{

			// nama table
			$table      = 'transjakarta';
			$select = 'id,pnp, tanggal';
			$get = $this->db->select($select)->get($table);
			$recordsTotal = $get->num_rows();
			 $start = 0; 
			 $length = 0;
			 if ( isset($request['start']) && $request['length'] != -1 ) {
					$start  = intval($request['start']);
					$length = intval($request['length']);
			}
			if($length > 0)
				{
					$getdb = $this->db->select($select)->where('id', $id)->get($table);
				}else{
					$getdb = $get;
				}
			$data = array();
			 if ($getdb->num_rows() > 0)
			 {
				foreach($getdb->result() as $value)
				{
					$data[] = array('id'=>$value->id, 'pnp'=>$value->pnp, 'tanggal'=>$value->tanggal, 'aksi'=>'
										   
										   <a href="'. base_url() .'transjakarta/edit/'. $value->id .'" type="button" class="btn btn-xs btn-primary"> <i class="fa fa-edit"></i></a>
										   <a href="'. base_url() .'transjakarta/delete/'. $value->id .'" type="button" class="btn btn-xs btn-danger"> <i class="fa fa-times fa fa-white"></i></a>');

										   }
			 }
			 
			  echo json_encode(array("draw" => isset ( $request['draw'] ) ?
						intval( $request['draw'] ) :
						0,
					"recordsTotal"    => intval( $recordsTotal ),
					"recordsFiltered" => intval( $getdb->num_rows() ),
					"data"            => $data
				));


		}


		function add()
		{
			 $data = array(
                    'content' => 'transjakarta/add'
                );
			if (isset($_POST['submit'])) {
			
				$this->Model_transjakarta->save();
				redirect('transjakarta');
			} else {
				$this->template->views('transjakarta/add', $data);
			}
		}

		function edit()
		{
			$data = array(
                    'content' => 'tujuan/edit'
                );
			if (isset($_POST['submit'])) {
				
				$this->model_tujuan->update();
				redirect('tujuan');
			} else {
				$id_tujuan 		= $this->uri->segment(3);
				$data['tujuan'] 	= $this->db->get_where('tbl_tujuan', array('id_tujuan' => $id_tujuan))->row_array();
				$this->template->dashboard('temp/index','header','sidebar','main','footer',$data);
			}
		}

		function delete()
		{
			$id_tujuan = $this->uri->segment(3);
			if (!empty($id_tujuan)) {
				$this->db->where('id_tujuan', $id_tujuan);
				$this->db->delete('tbl_tujuan');
			}
			redirect('tujuan');
		}

		function upload_foto_tujuan()
		{
			//validasi foto yang di upload
			$config['upload_path']          = './uploads/tujuan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('userfile');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}






	}

?>