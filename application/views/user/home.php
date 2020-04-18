<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-user"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('User/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-user"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>


  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Password</th>
          <th>foto</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-user">
      


      <?php
      $no = 1;
      foreach ($dataUser as $admin) {
        ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $admin->nama; ?></td>
          <td><?php echo $admin->password; ?></td>
          <td><img  src='<?=base_url()?>assets/img/<?=$admin->foto;?>'width="100"/></td>
          <td class="text-center" style="min-width:100px;">
              <button class="btn btn-warning update-dataUser" href="<?php echo base_url('Profile'); ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
              <button class="btn btn-danger konfirmasiHapus-user" data-id="<?php echo $admin->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
              <button class="btn btn-info detail-dataUser" data-id="<?php echo $admin->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
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

<?php echo $modal_tambah_user; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataUser', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'User';
  $data['url'] = 'User/import';
  echo show_my_modal('modals/modal_import', 'import-user', $data);
?>
