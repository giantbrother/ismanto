<?php
          $no = 1;
          foreach ($dataKcipnp as $railinkpnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $railinkpnp->id_stasiun; ?></td>
              <td><?php echo $railinkpnp->tanggal; ?></td>
              <td><?php echo $railinkpnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataRailinkpnp" data-id="<?php echo $railinkpnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-railinkpnp" data-id="<?php echo $railinkpnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataRailinkpnp" data-id="<?php echo $railinkpnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
              </td>
            </tr>
            <?php
            $no++;
          }
?>