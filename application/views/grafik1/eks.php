<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<table border="1" style="font-size:13px;border:100px;font-family:Arial;">
    <thead>
      <tr>
          <th>No</th>
          <th>Id</th>
          <th>Penumpang</th>
          <th>Tanggal</th>
          <th>Layanan</th>
         
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=0; foreach($all as $row): $no++;?>
      <tr>
        <td><center>&nbsp;<?php echo $no; ?></center></td>
        <td>&nbsp;<?php echo $row->id; ?></td>
		<td>&nbsp;<?php echo $row->pnp; ?></td>
		<td>&nbsp;<?php echo $row->tanggal; ?></td>
		<td>&nbsp;<?php echo $row->id_kereta; ?></td>
       
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>