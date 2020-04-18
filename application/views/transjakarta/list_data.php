<?php

        $no = 1;
        foreach ($dataTransjakarta as $transjakarta) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $transjakarta->nama; ?></td>
            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataTransjakarta" data-id="<?php echo $transjakarta->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-transjakarta" data-id="<?php echo $transjakarta->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataTransjakarta" data-id="<?php echo $transjakarta->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
            </td>
          </tr>
          <?php
          $no++;
        }
?>