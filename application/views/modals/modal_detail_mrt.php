<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> List Dara (Dari Mrt: <b><?php echo $mrt->nama; ?></b>)</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama</th>
            
          </tr>
        </thead>
        <tbody id="data-mrt">
<<<<<<< HEAD
         
              <tr>
               <td><?php echo $mrt->nama; ?></td>
               
              </tr>
         
=======
          <?php
            foreach ($dataMrt as $mrt) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $mrt->nama; ?></td>
               
              </tr>
              <?php
            }
          ?>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>