<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-lrt"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Lrt/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-lrt"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Stasiun</th>
        
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-lrt">
      <?php
        $no = 1;
        foreach ($dataLrt as $lrt) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $lrt->nama; ?></td>
           
            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataLrt" data-id="<?php echo $lrt->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-lrt" data-id="<?php echo $lrt->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataLrt" data-id="<?php echo $lrt->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_tambah_lrt; ?>

<div id="tempat-modal"></div>

<<<<<<< HEAD
<?php show_my_confirm('konfirmasiHapus', 'hapus-datalrt', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Lrt';
  $data['url'] = 'lrt/import';
=======
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataLrt', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Lrt';
  $data['url'] = 'Lrt/import';
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
  echo show_my_modal('modals/modal_import', 'import-lrt', $data);
?>