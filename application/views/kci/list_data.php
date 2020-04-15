<?php
  $no = 1;
  foreach ($dataKci as $kci) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kci->nama; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataKci" data-id="<?php echo $kci->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-kci" data-id="<?php echo $kci->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <button class="btn btn-info detail-dataKci" data-id="<?php echo $kci->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>