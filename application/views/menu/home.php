<?php

error_reporting(0);
$koneksi = mysqli_connect("localhost","ismantoi_test","Cctv2017 ") or die("Koneksi Gagal !" . mysqli_error());
mysqli_select_db($koneksi,"ismantoi_test");

$db = mysqli_select_db ($koneksi,"ismantoi_test") or die ("database tidak ada!". mysqli_error());
echo "<br />";
?>


<?php
$tanggal=$_POST['dari'];
$tanggal=$_POST['sampai'];
$count01 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM input"));
$count03 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM input WHERE (((tanggal) BETWEEN '".$_POST['dari']."' AND '".$_POST['sampai']."'))"));
$count02 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM input WHERE tanggal in(select max(tanggal) from input)"));

?>
    

 <?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
   
?>

<section class="content">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h9 class="panel-title"><i class="icon-book"></i> Laporan Bidang Perkeretaapian Dinas Perhubungan DKI Jakarta</h9>
  </div>
  <form action="<?php echo site_url('Laporan/export'); ?>" method="post">
    <div class="panel-body">
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Laporan Berdasarkan Bulan</label>
          <div class='col-md-9'>
            <select data-placeholder="Pilih Bulan" name="bulan" class="form-control">
              <option value=""></option>
              <option value="1">Januari</option>
              <option value="2">Febuari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Tanggal Awal</label>
          <div class='col-md-9'><input type="date" name="dari"  placeholder="Masukkan Tanggal" class="form-control" ></div>
          </div>
        </div>
        <br>
      <div class="row">
        <div class="form-group">
          <label class='col-md-2'>Tanggal Akhir</label>
          <div class='col-md-9'><input type="date" name="sampai"  placeholder="Masukkan Tanggal" class="form-control" ></div>
          </div>
        </div>
    </div>
   <div class="panel-footer">
      <br>
      <center><button type="submit" class="btn btn-md btn-primary"><i class="icon-download"></i> Ekspor Ke Excel</button></center>
      <br>
    </div>

<div class="panel panel-primary">
        <div class="panel-heading">
          <h9 class="panel-title"><i class="icon-book"></i> Laporan Jumlah Penumpang Berdasarkan Bulan</h9>
        </div>

    <?php 
      //$sql = mysqli_query($koneksi, "SELECT t_gr.f_grno, MONTH(t_gr.f_grdate) AS bulan, YEAR(t_gr.f_grdate) AS tahun, SUM(t_gr_detail.f_received_qty) AS total FROM t_gr, t_gr_detail WHERE t_gr.f_grno=t_gr_detail.f_grno AND t_gr_detail.f_partcode='$partcode' AND YEAR(t_gr.f_grdate)='$tahun' AND MONTH(t_gr.f_grdate)='1'");
			$sql = mysqli_query($koneksi, "SELECT SUM (pnp) AS total FROM input WHERE MONTH(tanggal)='1'");
			
            $row = mysqli_fetch_array($sql); 
            
            $sql1 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='2'");
			
            $row1 = mysqli_fetch_array($sql1);
            
            $sql2 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='3'");
			
            $row2 = mysqli_fetch_array($sql2);
            
            $sql3 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='4'");
			
            $row3 = mysqli_fetch_array($sql3);
            
            $sql4 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='5'");
			
            $row4 = mysqli_fetch_array($sql4);
            
            $sql5 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='6'");
			
            $row5 = mysqli_fetch_array($sql5);
            
            $sql6 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='7'");
			
            $row6 = mysqli_fetch_array($sql6);
            
            $sql7 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='8'");
			
            $row7 = mysqli_fetch_array($sql7);
            
            $sql8 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='9'");
		
			$row8 = mysqli_fetch_array($sql8);
            
            $sql9 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='10'");
			
            $row9 = mysqli_fetch_array($sql9);
            
            $sql10 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='11'");
			
            $row10 = mysqli_fetch_array($sql10);
            
            $sql11 = mysqli_query($koneksi, "SELECT SUM(pnp) AS total FROM input WHERE MONTH(tanggal)='12'");
			
            $row11 = mysqli_fetch_array($sql11);
            
            ?>

			  <div class="table-responsive">
          <table id="Table" class="table table-bordered" border="0" align="center" cellpadding="10">
                <tr>
                <th width="20">Bulan</th>
                <th width="20">Januari</th>
                <th width="20">Februari</th>
                <th width="20">Maret</th>
                <th width="20">April</th>
                <th width="20">Mei</th>
                <th width="20">Juni</th>
                <th width="20">Juli</th>
                <th width="20">Agustus</th>
                <th width="20">September</th>
                <th width="20">Oktober</th>
                <th width="20">November</th>
                <th width="20">Desember</th>
                </tr>
            
                <tr>
                <td>Total</td>
                <td width="20"><?php echo $row['total'];?></td>
                <td width="20"><?php echo $row1['total'];?></td>
                <td width="20"><?php echo $row2['total'];?></td>
                <td width="20"><?php echo $row3['total'];?></td>
                <td width="20"><?php echo $row4['total'];?></td>
                <td width="20"><?php echo $row5['total'];?></td>
                <td width="20"><?php echo $row6['total'];?></td>
                <td width="20"><?php echo $row7['total'];?></td>
                <td width="20"><?php echo $row8['total'];?></td>
                <td width="20"><?php echo $row9['total'];?></td>
                <td width="20"><?php echo $row10['total'];?></td>
                <td width="20"><?php echo $row11['total'];?></td>
                </tr> 
                <?php
                $sqlku = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='1' AND id_kereta='MRT'");
			
                $rowku = mysqli_fetch_array($sqlku); 
                
                $sqlku1 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='2' AND id_kereta='MRT'");
			
                $rowku1 = mysqli_fetch_array($sqlku1); 
                
                $sqlku2 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='3' AND id_kereta='MRT'");
			
                $rowku2 = mysqli_fetch_array($sqlku2); 
                
                $sqlku3 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='4' AND id_kereta='MRT'");
			
                $rowku3 = mysqli_fetch_array($sqlku3); 
                
                $sqlku4 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='5' AND id_kereta='MRT'");
			
                $rowku4 = mysqli_fetch_array($sqlku4); 
                
                $sqlku5 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='6' AND id_kereta='MRT'");
			
                $rowku5 = mysqli_fetch_array($sqlku5); 
                
                $sqlku6 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='MRT'");
			
                $rowku6 = mysqli_fetch_array($sqlku6); 
                
                $sqlku7 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='8' AND id_kereta='MRT'");
			
                $rowku7 = mysqli_fetch_array($sqlku7); 
                
                $sqlku8 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='9' AND id_kereta='MRT'");
			
                $rowku8 = mysqli_fetch_array($sqlku8); 
                
                $sqlku9 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='10' AND id_kereta='MRT'");
			
                $rowku9 = mysqli_fetch_array($sqlku9); 
                
                $sqlku10 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='11' AND id_kereta='MRT'");
			
                $rowku10 = mysqli_fetch_array($sqlku10); 
                
                $sqlku11 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='12' AND id_kereta='MRT'");
			
                $rowku11 = mysqli_fetch_array($sqlku11); 
                ?>
                
               <tr>
                <td>MRT</td>
                <td width="20"><?php echo $rowku['total1'];?></td>
                <td width="20"><?php echo $rowku1['total1'];?></td>
                <td width="20"><?php echo $rowku2['total1'];?></td>
                <td width="20"><?php echo $rowku3['total1'];?></td>
                <td width="20"><?php echo $rowku4['total1'];?></td>
                <td width="20"><?php echo $rowku5['total1'];?></td>
                <td width="20"><?php echo $rowku6['total1'];?></td>
                <td width="20"><?php echo $rowku7['total1'];?></td>
                <td width="20"><?php echo $rowku8['total1'];?></td>
                <td width="20"><?php echo $rowku9['total1'];?></td>
                <td width="20"><?php echo $rowku10['total1'];?></td>
                <td width="20"><?php echo $rowku11['total1'];?></td>
                </tr>

				
				    <?php
                $sqlku101 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='1' AND id_kereta='LRT'");
			
                $rowku101 = mysqli_fetch_array($sqlku101); 
                
                $sqlku100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='2' AND id_kereta='LRT'");
			
                $rowku100 = mysqli_fetch_array($sqlku100); 
                
                $sqlku200 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='3' AND id_kereta='LRT'");
			
                $rowku200 = mysqli_fetch_array($sqlku200); 
                
                $sqlku300 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='4' AND id_kereta='LRT'");
			
                $rowku300 = mysqli_fetch_array($sqlku300); 
                
                $sqlku400 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='5' AND id_kereta='LRT'");
			
                $rowku400 = mysqli_fetch_array($sqlku400); 
                
                $sqlku500 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='6' AND id_kereta='LRT'");
			
                $rowku500 = mysqli_fetch_array($sqlku500); 
                
                $sqlku600 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='LRT'");
			
                $rowku600 = mysqli_fetch_array($sqlku600); 
                
                $sqlku700 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='8' AND id_kereta='LRT'");
			
                $rowku700 = mysqli_fetch_array($sqlku700); 
                
                $sqlku800 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='9' AND id_kereta='LRT'");
			
                $rowku800 = mysqli_fetch_array($sqlku800); 
                
                $sqlku900 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='10' AND id_kereta='LRT'");
			
                $rowku900 = mysqli_fetch_array($sqlku900); 
                
                $sqlku1000 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='11' AND id_kereta='LRT'");
			
                $rowku1000 = mysqli_fetch_array($sqlku1000); 
                
                $sqlku1100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='12' AND id_kereta='LRT'");
			
                $rowku1100 = mysqli_fetch_array($sqlku1100); 
                ?>
                
               <tr>
                <td>LRT</td>
                <td width="20"><?php echo $rowku101['total10'];?></td>
                <td width="20"><?php echo $rowku100['total10'];?></td>
                <td width="20"><?php echo $rowku200['total10'];?></td>
                <td width="20"><?php echo $rowku300['total10'];?></td>
                <td width="20"><?php echo $rowku400['total10'];?></td>
                <td width="20"><?php echo $rowku500['total10'];?></td>
                <td width="20"><?php echo $rowku600['total10'];?></td>
                <td width="20"><?php echo $rowku700['total10'];?></td>
                <td width="20"><?php echo $rowku800['total10'];?></td>
                <td width="20"><?php echo $rowku900['total10'];?></td>
                <td width="20"><?php echo $rowku1000['total10'];?></td>
                <td width="20"><?php echo $rowku1100['total10'];?></td>
                </tr>
				
				<?php
                $sqlku101 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='1' AND id_kereta='KCI'");
			
                $rowku101 = mysqli_fetch_array($sqlku101); 
                
                $sqlku100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='2' AND id_kereta='KCI'");
			
                $rowku100 = mysqli_fetch_array($sqlku100); 
                
                $sqlku200 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='3' AND id_kereta='KCI'");
			
                $rowku200 = mysqli_fetch_array($sqlku200); 
                
                $sqlku300 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='4' AND id_kereta='KCI'");
			
                $rowku300 = mysqli_fetch_array($sqlku300); 
                
                $sqlku400 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='5' AND id_kereta='KCI'");
			
                $rowku400 = mysqli_fetch_array($sqlku400); 
                
                $sqlku500 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='6' AND id_kereta='KCI'");
			
                $rowku500 = mysqli_fetch_array($sqlku500); 
                
                $sqlku600 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='KCI'");
			
                $rowku600 = mysqli_fetch_array($sqlku600); 
                
                $sqlku700 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='8' AND id_kereta='KCI'");
			
                $rowku700 = mysqli_fetch_array($sqlku700); 
                
                $sqlku800 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='9' AND id_kereta='KCI'");
			
                $rowku800 = mysqli_fetch_array($sqlku800); 
                
                $sqlku900 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='10' AND id_kereta='KCI'");
			
                $rowku900 = mysqli_fetch_array($sqlku900); 
                
                $sqlku1000 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='11' AND id_kereta='KCI'");
			
                $rowku1000 = mysqli_fetch_array($sqlku1000); 
                
                $sqlku1100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='12' AND id_kereta='KCI'");
			
                $rowku1100 = mysqli_fetch_array($sqlku1100); 
                ?>
                
               <tr>
                <td>KCI</td>
                <td width="20"><?php echo $rowku101['total10'];?></td>
                <td width="20"><?php echo $rowku100['total10'];?></td>
                <td width="20"><?php echo $rowku200['total10'];?></td>
                <td width="20"><?php echo $rowku300['total10'];?></td>
                <td width="20"><?php echo $rowku400['total10'];?></td>
                <td width="20"><?php echo $rowku500['total10'];?></td>
                <td width="20"><?php echo $rowku600['total10'];?></td>
                <td width="20"><?php echo $rowku700['total10'];?></td>
                <td width="20"><?php echo $rowku800['total10'];?></td>
                <td width="20"><?php echo $rowku900['total10'];?></td>
                <td width="20"><?php echo $rowku1000['total10'];?></td>
                <td width="20"><?php echo $rowku1100['total10'];?></td>
                </tr>
				
				<?php
                $sqlku101 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='1' AND id_kereta='RAILINK'");
			
                $rowku101 = mysqli_fetch_array($sqlku101); 
                
                $sqlku100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='2' AND id_kereta='RAILINK'");
			
                $rowku100 = mysqli_fetch_array($sqlku100); 
                
                $sqlku200 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='3' AND id_kereta='RAILINK'");
			
                $rowku200 = mysqli_fetch_array($sqlku200); 
                
                $sqlku300 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='4' AND id_kereta='RAILINK'");
			
                $rowku300 = mysqli_fetch_array($sqlku300); 
                
                $sqlku400 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='5' AND id_kereta='RAILINK'");
			
                $rowku400 = mysqli_fetch_array($sqlku400); 
                
                $sqlku500 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='6' AND id_kereta='RAILINK'");
			
                $rowku500 = mysqli_fetch_array($sqlku500); 
                
                $sqlku600 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='RAILINK'");
			
                $rowku600 = mysqli_fetch_array($sqlku600); 
                
                $sqlku700 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='8' AND id_kereta='RAILINK'");
			
                $rowku700 = mysqli_fetch_array($sqlku700); 
                
                $sqlku800 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='9' AND id_kereta='RAILINK'");
			
                $rowku800 = mysqli_fetch_array($sqlku800); 
                
                $sqlku900 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='10' AND id_kereta='RAILINK'");
			
                $rowku900 = mysqli_fetch_array($sqlku900); 
                
                $sqlku1000 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='11' AND id_kereta='RAILINK'");
			
                $rowku1000 = mysqli_fetch_array($sqlku1000); 
                
                $sqlku1100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='12' AND id_kereta='RAILINK'");
			
                $rowku1100 = mysqli_fetch_array($sqlku1100); 
                ?>
                
               <tr>
                <td>RAILINK</td>
                <td width="20"><?php echo $rowku101['total10'];?></td>
                <td width="20"><?php echo $rowku100['total10'];?></td>
                <td width="20"><?php echo $rowku200['total10'];?></td>
                <td width="20"><?php echo $rowku300['total10'];?></td>
                <td width="20"><?php echo $rowku400['total10'];?></td>
                <td width="20"><?php echo $rowku500['total10'];?></td>
                <td width="20"><?php echo $rowku600['total10'];?></td>
                <td width="20"><?php echo $rowku700['total10'];?></td>
                <td width="20"><?php echo $rowku800['total10'];?></td>
                <td width="20"><?php echo $rowku900['total10'];?></td>
                <td width="20"><?php echo $rowku1000['total10'];?></td>
                <td width="20"><?php echo $rowku1100['total10'];?></td>
                </tr>
				
				<?php
                $sqlku101 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='1' AND id_kereta='TRANSJAKARTA'");
			
                $rowku101 = mysqli_fetch_array($sqlku101); 
                
                $sqlku100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='2' AND id_kereta='TRANSJAKARTA'");
			
                $rowku100 = mysqli_fetch_array($sqlku100); 
                
                $sqlku200 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='3' AND id_kereta='TRANSJAKARTA'");
			
                $rowku200 = mysqli_fetch_array($sqlku200); 
                
                $sqlku300 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='4' AND id_kereta='TRANSJAKARTA'");
			
                $rowku300 = mysqli_fetch_array($sqlku300); 
                
                $sqlku400 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='5' AND id_kereta='TRANSJAKARTA'");
			
                $rowku400 = mysqli_fetch_array($sqlku400); 
                
                $sqlku500 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='6' AND id_kereta='TRANSJAKARTA'");
			
                $rowku500 = mysqli_fetch_array($sqlku500); 
                
                $sqlku600 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='TRANSJAKARTA'");
			
                $rowku600 = mysqli_fetch_array($sqlku600); 
                
                $sqlku700 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='8' AND id_kereta='TRANSJAKARTA'");
			
                $rowku700 = mysqli_fetch_array($sqlku700); 
                
                $sqlku800 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='9' AND id_kereta='TRANSJAKARTA'");
			
                $rowku800 = mysqli_fetch_array($sqlku800); 
                
                $sqlku900 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='10' AND id_kereta='TRANSJAKARTA'");
			
                $rowku900 = mysqli_fetch_array($sqlku900); 
                
                $sqlku1000 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='11' AND id_kereta='TRANSJAKARTA'");
			
                $rowku1000 = mysqli_fetch_array($sqlku1000); 
                
                $sqlku1100 = mysqli_query($koneksi, "SELECT id_kereta,SUM(pnp) AS total10 FROM input WHERE MONTH(tanggal)='12' AND id_kereta='TRANSJAKARTA'");
			
                $rowku1100 = mysqli_fetch_array($sqlku1100); 
                ?>
                
               <tr>
                <td>TRANSJAKARTA</td>
                <td width="20"><?php echo $rowku101['total10'];?></td>
                <td width="20"><?php echo $rowku100['total10'];?></td>
                <td width="20"><?php echo $rowku200['total10'];?></td>
                <td width="20"><?php echo $rowku300['total10'];?></td>
                <td width="20"><?php echo $rowku400['total10'];?></td>
                <td width="20"><?php echo $rowku500['total10'];?></td>
                <td width="20"><?php echo $rowku600['total10'];?></td>
                <td width="20"><?php echo $rowku700['total10'];?></td>
                <td width="20"><?php echo $rowku800['total10'];?></td>
                <td width="20"><?php echo $rowku900['total10'];?></td>
                <td width="20"><?php echo $rowku1000['total10'];?></td>
                <td width="20"><?php echo $rowku1100['total10'];?></td>
                </tr>
			
                </table>
        </div>
		  </div> 
      </table>
    </div> <!-- /container -->
 
  <div class="panel panel-primary">
  <div class="panel-heading">
    <h9 class="panel-title"><i class="icon-book"></i> Laporan Harian Jumlah Penumpang</h9>
  </div>
    <div class="table-responsive">
<table id="Table" class="table table-bordered table_responsive" align="center">

    <?php 
			$this->load->model('M_laporan');
			$tanggal=$_POST['tanggal'];
			$bln = date('m');
			$thn = date('Y');
				$ttl = cal_days_in_month(CAL_GREGORIAN, $bln, $thn);
				$th =''; $td=''; $MRT=''; $LRT=''; $KCI='';  $RAILINK='';  $TRANSJAKARTA='';
				for($i=1; $i<=$ttl; $i++)
				{
					$th .= '<th>'. ($i) .'</th>';
					$_td = $this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i));
					$td .= '<td>'. ($_td > 0 ? $_td : '') .'</td>';
					$_MRT =$this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i, 'id_kereta'=>'MRT'));
					$MRT .= '<td>'. ($_MRT > 0 ? $_MRT : '') .'</td>';
					$_LRT = $this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i, 'id_kereta'=>'LRT'));
					$LRT .= '<td>'. ($_LRT > 0 ? $_LRT : '') .'</td>';
					$_KCI = $this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i, 'id_kereta'=>'KCI'));
					$KCI .= '<td>'. ($_KCI > 0 ? $_KCI : '') .'</td>';
					$_RAILINK = $this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i, 'id_kereta'=>'RAILINK'));
					$RAILINK .= '<td>'. ($_RAILINK > 0 ? $_RAILINK : '') .'</td>';
					$_TRANSJAKARTA = $this->M_laporan->get_total(array('YEAR(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'day(tanggal)'=>$i, 'id_kereta'=>'TRANSJAKARTA'));
					$TRANSJAKARTA .= '<td>'. ($_TRANSJAKARTA > 0 ? $_TRANSJAKARTA : '') .'</td>';
				
					
				}
				$total = $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln));
				$total_MRT =  $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'id_kereta'=>'MRT'));
				$total_LRT = $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'id_kereta'=>'LRT'));
				$total_KCI =  $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'id_kereta'=>'KCI'));
				$total_RAILINK =  $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'id_kereta'=>'RAILINK'));
				$total_TRANSJAKARTA =  $this->M_laporan->get_total(array('year(tanggal)'=>$thn, 'month(tanggal)'=>$bln, 'id_kereta'=>'TRANSJAKARTA'));
				
				echo '<thead><tr><th>Tanggal</th>'. $th .'<th>Total</th></tr></thead>
						<tbody>
						<tr><td><b>Total</b></td>'. $td .'<td><b>'. $total .'</b></td></tr>
						<tr><td><b>MRT</b></td>'. $MRT .'<td><b>'. $total_MRT .'</b></td></tr>
						<tr><td><b>LRT</b></td>'. $LRT .'<td><b>'. $total_LRT .'</b></td></tr>
						<tr><td><b>KCI</b></td>'. $KCI .'<td><b>'. $total_KCI .'</b></td></tr>
						<tr><td><b>RAILINK</b></td>'. $RAILINK .'<td><b>'. $total_RAILINK .'</b></td></tr>
						<tr><td><b>TRANSJAKARTA</b></td>'. $TRANSJAKARTA .'<td><b>'. $total_TRANSJAKARTA .'</b></td></tr>
						
						</tbody>';
            ?>
			</table></div>
			</div>
   <!-- /.box -->
</section>



