<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<<<<<<< HEAD
  <h3 style="display:block; text-align:center;">Tambah Data Stasiun Railink</h3>
=======
  <h3 style="display:block; text-align:center;">Tambah Data Stasiun Lrt</h3>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

  <form id="form-tambah-railink" method="POST" action="<?= base_url('railink/prosestambah') ?>">
  <div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Register" name="id" value="<?php echo getId('railink','id'); ?>" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Stasiun" name="nama" aria-describedby="sizing-addon2">
    </div>
 
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>