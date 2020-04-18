<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kcipnp"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Kcipnp/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-kcipnp"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Stasiun</th>
          <th>Tanggal</th>
          <th>Jumlah Penumpang</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-kcipnp">
      <?php
          $no = 1;
          foreach ($dataKcipnp as $kcipnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
<<<<<<< HEAD
              <td><?php echo $kcipnp->nama; ?></td>
=======
              <td><?php echo $kcipnp->id_stasiun; ?></td>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
              <td><?php echo $kcipnp->tanggal; ?></td>
              <td><?php echo $kcipnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataKcipnp" data-id="<?php echo $kcipnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-kcipnp" data-id="<?php echo $kcipnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataKcipnp" data-id="<?php echo $kcipnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
              </td>
            </tr>
            <?php
            $no++;
          }
        ?>






      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_kcipnp; ?>

<div id="tempat-modal"></div>

<<<<<<< HEAD
<?php show_my_confirm('konfirmasiHapus', 'hapus-datakcipnp', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
=======
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKcipnp', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
<?php
  $data['judul'] = 'Stasiun';
  $data['url'] = 'kcipnp/import';
  echo show_my_modal('modals/modal_import', 'import-kcipnp', $data);
?>