<?php
	// MSG
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-success">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-error">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	// MODAL
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						      
						      <div class="col-md-6">
						        <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}

	function getId($tabel,$id)
{
	$ci=& get_instance();
    $q = $ci->db->query("select MAX(".$id.") as kd_max from ".$tabel."");
    $kd = "";
    if($q->num_rows()>0)
    {
        foreach($q->result() as $k)
        {
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%09s", $tmp);
        }
    }
    else
    {
        $kd = "000000001";
    }
    return $kd;
}
function cmb_dinamis($name, $table, $field, $pk, $selected=null, $extra=null)
{
	$ci   = get_instance();
	$cmb  = "<select name='$name' class='form-control' $extra>";

	$data = $ci->db->get($table)->result();
	foreach ($data as $row) {
		$cmb .= "<option value='".$row->$pk."'";
		//Apabila $selected bernilai sama dengan nilai $pk maka akan bernilai selected selain itu akan bernilai null
		$cmb .= $selected == $row->$pk ? 'selected' : '';
		$cmb .= ">".$row->$field."</option>";
	}
	$cmb .= "</select>";

	return $cmb;
}

	


?>