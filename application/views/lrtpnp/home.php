<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-lrtpnp"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Lrtpnp/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-lrtpnp"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
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
      <tbody id="data-lrtpnp">
      <?php
          $no = 1;
          foreach ($dataLrtpnp as $lrtpnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
<<<<<<< HEAD
              <td><?php echo $lrtpnp->nama; ?></td>
=======
              <td><?php echo $lrtpnp->id_stasiun; ?></td>
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
              <td><?php echo $lrtpnp->tanggal; ?></td>
              <td><?php echo $lrtpnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataLrtpnp" data-id="<?php echo $lrtpnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-lrtpnp" data-id="<?php echo $lrtpnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataLrtpnp" data-id="<?php echo $lrtpnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_tambah_lrtpnp; ?>

<div id="tempat-modal"></div>

<<<<<<< HEAD
<?php show_my_confirm('konfirmasiHapus', 'hapus-datalrtpnp', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Penumpang';
  $data['url'] = 'lrtpnp/import';
=======
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataLrtpnp', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Penumpang';
  $data['url'] = 'Lrtpnp/import';
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
  echo show_my_modal('modals/modal_import', 'import-lrtpnp', $data);
?>