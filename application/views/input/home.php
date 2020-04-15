<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-input"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Input/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-input"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
        <th>#</th>
          <th>Angkutan</th>
          <th>PNP</th>
          <th>Tanggal</th>
        
      
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-input">
        <?php
		  $no = 1;
  foreach ($dataInput as $input) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $input->id_kereta; ?></td>
      <td><?php echo $input->pnp; ?></td>
      <td><?php echo $input->tanggal; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataInput" data-id="<?php echo $input->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-Input" data-id="<?php echo $input->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info detail-dataInput" data-id="<?php echo $input->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_update_input; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataInput', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Input';
  $data['url'] = 'Input/import';
  echo show_my_modal('modals/modal_import', 'import-input', $data);
?>