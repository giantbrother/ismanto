
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