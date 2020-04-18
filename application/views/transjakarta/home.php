<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-transjakarta"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Transjakarta/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-transjakarta"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Halte</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-transjakarta">
	   <?php
        $no = 1;
        foreach ($dataTransjakarta as $transjakarta) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $transjakarta->nama; ?></td>

            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataTransjakarta" data-id="<?php echo $transjakarta->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-transjakarta" data-id="<?php echo $transjakarta->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataTransjakarta" data-id="<?php echo $transjakarta->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_tambah_transjakarta; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-datatransjakarta', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Transjakarta';
  $data['url'] = 'transjakarta/import';
  echo show_my_modal('modals/modal_import', 'import-transjakarta', $data);
?>