<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-mrt"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Mrt/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-mrt"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
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
      <tbody id="data-mrt">
      <?php
        $no = 1;
        foreach ($dataMrt as $mrt) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $mrt->nama; ?></td>
           
            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataMrt" data-id="<?php echo $mrt->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-mrt" data-id="<?php echo $mrt->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataMrt" data-id="<?php echo $mrt->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_tambah_mrt; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataMrt', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Mrt';
  $data['url'] = 'Mrt/import';
  echo show_my_modal('modals/modal_import', 'import-mrt', $data);
?>