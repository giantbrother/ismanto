      <?php
          $no = 1;
          foreach ($dataTransjakartapnp as $transjakartapnp) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $transjakartapnp->nama; ?></td>
              <td><?php echo $transjakartapnp->tanggal; ?></td>
              <td><?php echo $transjakartapnp->pnp; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataTransjakartapnp" data-id="<?php echo $transjakartapnp->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-transjakartapnp" data-id="<?php echo $transjakartapnp->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataTransjakartapnp" data-id="<?php echo $transjakartapnp->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
              </td>
            </tr>
            <?php
            $no++;
          }
        ?>