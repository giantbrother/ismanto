<?php
  $no = 1;
  foreach ($dataUser as $admin) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $admin->username; ?></td>
      <td><?php echo $admin->password; ?></td>
      <td><img  src='<?=base_url()?>assets/img/<?=$admin->foto;?>'  ></td>
      <td class="text-center" style="min-width:100px;">
          <button class="btn btn-warning update-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-user" data-id="<?php echo $user->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info detail-dataUser" data-id="<?php echo $user->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>