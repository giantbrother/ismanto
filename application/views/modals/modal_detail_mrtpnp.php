<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<<<<<<< HEAD
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Data Penumpang MRT</h3>
=======
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Data</h3>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e

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
          
            <tr>
              <td><?php echo $mrtpnp->nama; ?></td>
              <td><?php echo $mrtpnp->tanggal; ?></td>
              <td><?php echo $mrtpnp->pnp; ?></td>
              
            </tr>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>