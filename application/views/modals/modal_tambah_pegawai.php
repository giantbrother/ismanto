<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Jumlah Penumpang</h3>

  <form id="form-tambah-pegawai" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Register" name="id" value="<?php echo getId('transjakarta','id'); ?>" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Penumpang" name="nama" aria-describedby="sizing-addon2">
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
          <input type="radio" name="id_kereta" value="1" id="mrt" class="minimal">
      <label for="mrt">MRT</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="2" id="lrt" class="minimal"> 
      <label for="lrt">LRT</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="3" id="kci" class="minimal"> 
      <label for="kci">KCI</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_kereta" value="4" id="tj" class="minimal"> 
      <label for="tj">TJ</label>
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