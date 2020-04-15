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