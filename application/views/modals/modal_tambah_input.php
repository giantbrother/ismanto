<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Jumlah Penumpang</h3>

  <form id="form-tambah-input" method="POST" action="<?= base_url('input/prosestambah') ?>">
  <div class="alert alert-danger"><?= $this->session->flashdata('message'); ?></div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Register" name="id" value="<?php echo getId('input','id'); ?>" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Penumpang" name="pnp" aria-describedby="sizing-addon2">
    </div>


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Tanggal" name="tanggal" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="MRT" id="MRT" class="minimal">
      <label for="MRT">MRT</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="LRT" id="LRT" class="minimal"> 
      <label for="LRT">LRT</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="KCI" id="KCI" class="minimal"> 
      <label for="KCI">KCI</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="Transjakarta" id="Transjakarta" class="minimal"> 
      <label for="Transjakarta">TJ</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="Railink" id="Railink" class="minimal"> 
      <label for="Railink">RLK</label>
        </span>
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