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