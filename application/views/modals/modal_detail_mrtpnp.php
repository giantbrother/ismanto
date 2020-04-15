<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Penumpang (Mrtpnp: <b><?php echo $mrtpnp->id_kereta; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>Nama Stasiun</th>
          <th>Tanggal</th>
          <th>Jumlah Penumpang</th>
          
          </tr>
        </thead>
        <tbody id="data-mrtpnp">
          <?php
            foreach ($dataMrtpnp as $mrtpnp) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $mrtpnp->id_stasiun; ?></td>
                <td><?php echo $mrtpnp->tanggal; ?></td>
                <td><?php echo $mrtpnp->pnp; ?></td>
               
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>