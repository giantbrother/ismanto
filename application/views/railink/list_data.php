<?php
  $no = 1;
  foreach ($dataRailink as $railink) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $railink->nama; ?></td>
      
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataRailink" data-id="<?php echo $railink->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-railink" data-id="<?php echo $railink->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info detail-dataRailink" data-id="<?php echo $railink->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>