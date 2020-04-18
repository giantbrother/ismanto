<?php
          $no = 1;
          foreach ($dataKcipnp as $kcipnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $kcipnp->nama; ?></td>
              <td><?php echo $kcipnp->tanggal; ?></td>
              <td><?php echo $kcipnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataKcipnp" data-id="<?php echo $kcipnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-kcipnp" data-id="<?php echo $kcipnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataKcipnp" data-id="<?php echo $kcipnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
              </td>
            </tr>
            <?php
            $no++;
          }
?>