 <?php
        $no = 1;
        foreach ($dataTj as $tj) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $tj->nama; ?></td>
           
            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataTj" data-id="<?php echo $tj->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-tj" data-id="<?php echo $tj->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataTj" data-id="<?php echo $tj->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
            </td>
          </tr>
          <?php
          $no++;
?>