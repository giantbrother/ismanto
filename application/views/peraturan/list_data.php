  <?php
        $no = 1;
        foreach ($dataPeraturan as $peraturan) {
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $peraturan->nama; ?></td>
			 <td><?php echo $peraturan->tentang; ?></td>
			  	<td><a href="<?=base_url().'uploads/peraturan/'.$peraturan->gambar;?>" target="_blank"><img src="<?=base_url().'uploads/peraturan/'.$peraturan->gambar;?>" width="100"></a></td>
           
            <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataPeraturan" data-id="<?php echo $peraturan->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-peraturan" data-id="<?php echo $peraturan->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                <button class="btn btn-info detail-dataPeraturan" data-id="<?php echo $peraturan->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>
            </td>
          </tr>
          <?php
          $no++;
            }
          ?>