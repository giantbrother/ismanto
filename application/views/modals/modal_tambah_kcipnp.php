<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<<<<<<< HEAD
  <h3 style="display:block; text-align:center;">Tambah Data KCI Penumpang</h3>
=======
  <h3 style="display:block; text-align:center;">Tambah Data Pegawai</h3>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

  <form id="form-tambah-kcipnp" method="POST" action="<?= base_url('kcipnp/prosestambah') ?>">
  <div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Register" name="id" value="<?php echo getId('kcipnp','id'); ?>" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Pnp" name="pnp" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <div class="col-md-12">
           <?php
              echo cmb_dinamis('id_stasiun', 'kci', 'nama', 'id');
 
            ?>
      </div>
      </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>