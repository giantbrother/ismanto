<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Data Penumpang LRT</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>Nama Stasiun</th>
          <th>Tanggal</th>
          <th>Jumlah Penumpang</th>
          
          </tr>
        </thead>
        <tbody id="data-lrtpnp">
          
            <tr>
              <td><?php echo $lrtpnp->nama; ?></td>
              <td><?php echo $lrtpnp->tanggal; ?></td>
              <td><?php echo $lrtpnp->pnp; ?></td>
              
            </tr>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>