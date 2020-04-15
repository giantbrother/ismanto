<?php

error_reporting(0);
$koneksi = mysqli_connect("localhost","root","Cctv2017") or die("Koneksi Gagal !" . mysqli_error());
mysqli_select_db($koneksi,"cendana");

$db = mysqli_select_db ($koneksi,"cendana") or die ("database tidak ada!". mysqli_error());
echo "<br />";
?>

 <?php
$sqlku6 = mysqli_query($koneksi,"SELECT id_kereta,SUM(pnp) AS total1 FROM input WHERE MONTH(tanggal)='7' AND id_kereta='MRT'");		
$rowku6 = mysqli_fetch_array($sqlku6);




$count1 = mysqli_num_rows(mysqli_query($koneksi,"SELECT id_kereta, sum(pnp) as total FROM input WHERE tanggal='". date('Y-m-d')."' AND id_kereta = LRT"));
$count2 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pegawai WHERE tanggal='". date('Y-m-d')."' AND id_kereta = 2" ));
$count3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pegawai WHERE tanggal='". date('Y-m-d')."' AND id_kereta = 3" ));
$count4 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pegawai WHERE tanggal='". date('Y-m-d')."' AND id_kereta = 4" ));
$count11 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM mrt" ));
$count12 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM lrt" ));
$count13 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kci" ));
$count14 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM railink" ));
$count15 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM tj" ));


?>
    

 <?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
   
?>

<section class="content">
  <div class="box">
        <div class="box-header with-border">
          <div align="left"><h4><b>Dashbord Jumlah Penumpang Per Hari</b></h4></div>

          <div class="box-tools pull-right"> 
          </div>
        </div>
            <!-- /.box-header -->
       <div class="box-body dataTables_wrapper"> 
             <div class="row">
             <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                   <?php echo '<h5 class="white-text link">'.$sqlku6.' Data</h5>'; ?>

                  <p>MRT</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('mrt') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			 <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                     <?php echo '<h5 class="white-text link">'.$count1.' Data</h5>'; ?>

                  <p>LRT</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('lrt') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			  <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-fuchsia">
                <div class="inner">
                    <?php echo '<h5 class="white-text link">'.$count3.' Data</h5>'; ?>
					
                  <p>KCI</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('kci') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			   
						
			      <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count4.' Data</h5>'; ?>

                  <p>Railink</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Railink') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count11.' Stasiun</h5>'; ?>

                  <p>Jumlah Stasiun MRT</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Mrt') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count12.' Stasiun</h5>'; ?>

                  <p>Jumlah Stasiun LRT</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Lrt') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-fuchsia">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count13.' Stasiun</h5>'; ?>

                  <p>Jumlah Stasiun KCI</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Kci') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count14.' Stasiun</h5>'; ?>

                  <p>Jumlah Stasiun Railink</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Railink') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count15.' Stasiun</h5>'; ?>

                  <p>Jumlah Transjakarta</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Transjakarta') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                 <?php echo '<h5 class="white-text link">'.$count15.' Stasiun</h5>'; ?>

                  <p>Pnp Transjakarta</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <a href="<?php echo site_url('Transjakarta') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			</div>
   <!-- /.box -->
		  </section>



