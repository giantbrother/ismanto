<?php
  $no = 1;
  foreach ($dataLrtpnp as $lrtpnp) {
    ?>
    <tr>
     <td><?php echo $no; ?></td>
     <td><?php echo $lrtpnp->nama; ?></td>
     <td><?php echo $lrtpnp->tanggal; ?></td>
     <td><?php echo $lrtpnp->pnp; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataLrtpnp" data-id="<?php echo $lrtpnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-lrtpnp" data-id="<?php echo $lrtpnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
        <button class="btn btn-info detail-dataLrtpnp" data-id="<?php echo $lrtpnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>