<?php
          $no = 1;
          foreach ($dataMrtpnp as $mrtpnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $mrtpnp->nama; ?></td>
              <td><?php echo $mrtpnp->tanggal; ?></td>
              <td><?php echo $mrtpnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataMrtpnp" data-id="<?php echo $mrtpnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-mrtpnp" data-id="<?php echo $mrtpnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataMrtpnp" data-id="<?php echo $mrtpnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
              </td>
            </tr>
            <?php
            $no++;
          }
        ?>