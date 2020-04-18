<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Penumpang Railink </h3>


      <form method="POST" id="form-update-railinkpnp" action="<?= base_url('railinkpnp/update') ?>">
        <input type="hidden" name="idnye" value="<?php echo $dataRailinkpnp->id; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Jumlah penumpang" name="pnp" aria-describedby="sizing-addon2" value="<?php echo $dataRailinkpnp->pnp; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-calendar"></i>
          </span>
          <input type="text" class="form-control" placeholder="Tanggal" name="tanggal" aria-describedby="sizing-addon2" value="<?php echo $dataRailinkpnp->tanggal; ?>">
        </div>

        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-road"></i>
      </span>
      <select name="id_stasiun" class="form-control">
      <?php
      foreach($datast as $data_st){
      ?>
      <option value="<?php echo $data_st -> id; ?>"<?php if($data_st  -> id == $dataRailinkpnp->id_stasiun){echo"selected='selected'";} ?>>
      <?php echo $data_st -> nama;?></option>
      <?php }
      ?>
</select>
      
      </div>
       
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
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