<?php

error_reporting(0);
<<<<<<< HEAD
$koneksi = mysqli_connect("localhost","ismantoi_test","Cctv2017 ") or die("Koneksi Gagal !" . mysqli_error());
mysqli_select_db($koneksi,"ismantoi_test");

$db = mysqli_select_db ($koneksi,"ismantoi_test") or die ("database tidak ada!". mysqli_error());
=======
$koneksi = mysqli_connect("localhost","root","Cctv2017") or die("Koneksi Gagal !" . mysqli_error());
mysqli_select_db($koneksi,"cendana");

$db = mysqli_select_db ($koneksi,"cendana") or die ("database tidak ada!". mysqli_error());
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
echo "<br />";
?>



<<<<<<< HEAD

=======
>>>>>>> 28c79abe5e7e997bdcec84fa42eed627bf20136e
<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
   
?>

<html>

<head>

<script type="text/javascript" src="assets/plugins/chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>

<center>
		<h2>GRAFIK INTEGRASI MODA TRANSPORTASI RELL</h2>
	</center>
 

	<div style="width: 800;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<br/>
	<br/>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["MRT", "LRT", "KCI", "Transjakarta", "Railink"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_mrt = mysqli_query($koneksi,"SELECT id_kereta, SUM(pnp) as total FROM input WHERE (tanggal='". date('Y-m-d')."')  GROUP BY id_kereta = MRT" );
					echo mysqli_num_rows($jumlah_mrt);
					?>, 
					<?php 
					$jumlah_lrt = mysqli_query($koneksi,"SELECT id_kereta, SUM(pnp) as total FROM input WHERE tanggal='". date('Y-m-d')."'  GROUP BY id_kereta = LRT" );
					echo mysqli_num_rows($jumlah_lrt);
					?>, 
					<?php 
					$jumlah_kci = mysqli_query($koneksi,"SELECT id_kereta, SUM(pnp) as total FROM input WHERE tanggal='". date('Y-m-d')."'  GROUP BY id_kereta = KCI" );
					echo mysqli_num_rows($jumlah_kci);
					?>, 
					<?php 
					$jumlah_transjakarta = mysqli_query($koneksi,"SELECT id_kereta, SUM(pnp) as total FROM input WHERE tanggal='". date('Y-m-d')."'  GROUP BY id_kereta = Transjakarta" );
					echo mysqli_num_rows($jumlah_transjakarta);
					?>,
					<?php 
					$jumlah_railink = mysqli_query($koneksi,"SELECT id_kereta, SUM(pnp) as total FROM input WHERE tanggal='". date('Y-m-d')."'  GROUP BY id_kereta = Railink" );
					echo mysqli_num_rows($jumlah_railink);
					?>,
					
					],
					backgroundColor: [
					"#ff6384",
					"#36a2eb",
					"#cc65fe",
					"#ffce56",
					"#f38b4a",
					"#56d798",
					
					],
					borderColor: [
					
					  "#f38b4a",
					  "#56d798",
					  "#ff8397",
					  "#6970d5"
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>

<div>
<head>
	
	<!--code install AnyCharts-->
	<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-stock.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
  <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" />
  <link rel="stylesheet" href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" />
  <style>
  #container {
    width: 100%;
    height: 380px;
    margin: 0;
    padding: 0;
  }
</style>

<?php
    $status="";
    $tahun=date("Y");
    $total = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input where YEAR(tanggal)='$tahun'");
    $data = mysqli_fetch_row($total);
    $totalall = $data[0];


    $hasil1 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun'");
    $data1 = mysqli_fetch_row($hasil1);
    $jumlah1 = $data1[0];
    $percent1= $jumlah1 * $totalall /100 ;


    $hasil2 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun'");
    $data2 = mysqli_fetch_row($hasil2);
    $jumlah2 = $data2[0];
    $percent2= $jumlah2 * $totalall /100 ;


    $hasil3 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun'");
    $data3 = mysqli_fetch_row($hasil3);
    $jumlah3 = $data3[0];
    $percent3= $jumlah3 * $totalall /100 ;


    $hasil4 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun'");
    $data4 = mysqli_fetch_row($hasil4);
    $jumlah4 = $data4[0];
    $percent4= $jumlah4 * $totalall /100 ;


    $hasil5 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun'");
    $data5 = mysqli_fetch_row($hasil5);
    $jumlah5 = $data5[0];
    $percent5= $jumlah5 * $totalall /100 ;


    $hasil6 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun'");
    $data6 = mysqli_fetch_row($hasil6);
    $jumlah6 = $data6[0];
    $percent6= $jumlah6 * $totalall /100 ;


    $hasil7 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun'");
    $data7 = mysqli_fetch_row($hasil7);
    $jumlah7 = $data7[0];
    $percent7= $jumlah7 * $totalall /100 ;


    $hasil8 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun'");
    $data8 = mysqli_fetch_row($hasil8);
    $jumlah8 = $data8[0];
    $percent8= $jumlah8 * $totalall /100 ;


    $hasil9 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun'");
    $data9 = mysqli_fetch_row($hasil9);
    $jumlah9 = $data9[0];
    $percent9= $jumlah9 * $totalall /100 ;


    $hasil10 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun'");
    $data10 = mysqli_fetch_row($hasil10);
    $jumlah10 = $data10[0];
    $percent10= $jumlah10 * $totalall /100 ;


    $hasil11 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun'");
    $data11 = mysqli_fetch_row($hasil11);
    $jumlah11 = $data11[0];
    $percent11= $jumlah11 * $totalall /100 ;


    $hasil12 = mysqli_query($koneksi,"SELECT SUM(pnp) as jum FROM input WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun'");
    $data12 = mysqli_fetch_row($hasil12);
    $jumlah12 = $data12[0];
    $percent12= $jumlah12 * $totalall /100 ;

    ?>



    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun' and status is null");
    $num0 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun' and status='$status'");
    $num2 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='01' and YEAR(tanggal)='$tahun' and status='$status'");
    $num3 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End--> 


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun' and status is null");
    $num4 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun' and status='$status'");
    $num5 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='02' and YEAR(tanggal)='$tahun' and status='$status'");
    $num6 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End--> 


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun' and status is null");
    $num7 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun' and status='$status'");
    $num8 = mysqli_num_rows($rt);
    {?>
    <?php } ?>



    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='03' and YEAR(tanggal)='$tahun' and status='$status'");
    $num9 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun' and status is null");
    $num10 = mysqli_num_rows($rt);
    {?>
    <?php } ?>



    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun' and status='$status'");
    $num11 = mysqli_num_rows($rt);
    {?>
    <?php } ?>



    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='04' and YEAR(tanggal)='$tahun' and status='$status'");
    $num12 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun' and status is null");
    $num13 = mysqli_num_rows($rt);
    {?>
    <?php } ?>



    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun' and status='$status'");
    $num14 = mysqli_num_rows($rt);
    {?>
    <?php } ?>



    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='05' and YEAR(tanggal)='$tahun' and status='$status'");
    $num15 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->



    <!--Mulai-->
    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun' and status is null");
    $num16 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun' and status='$status'");
    $num17 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='06' and YEAR(tanggal)='$tahun' and status='$status'");
    $num18 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun' and status is null");
    $num19 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun' and status='$status'");
    $num20 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='07' and YEAR(tanggal)='$tahun' and status='$status'");
    $num21 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->



    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun' and status is null");
    $num22 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun' and status='$status'");
    $num23 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='08' and YEAR(tanggal)='$tahun' and status='$status'");
    $num24 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->



    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun' and status is null");
    $num25 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun' and status='$status'");
    $num26 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='09' and YEAR(tanggal)='$tahun' and status='$status'");
    $num27 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun' and status is null");
    $num28 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun' and status='$status'");
    $num29 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='10' and YEAR(tanggal)='$tahun' and status='$status'");
    $num30 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun' and status is null");
    $num31 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun' and status='$status'");
    $num32 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='11' and YEAR(tanggal)='$tahun' and status='$status'");
    $num33 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->


    <!--Mulai-->

    <?php
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun' and status is null");
    $num34 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="active"; 
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun' and status='$status'");
    $num35 = mysqli_num_rows($rt);
    {?>
    <?php } ?>


    <?php
    $status="closed";                   
    $rt = mysqli_query($koneksi,"SELECT * FROM input WHERE MONTH(tanggal)='12' and YEAR(tanggal)='$tahun' and status='$status'");
    $num36 = mysqli_num_rows($rt);
    {?>
    <?php } ?>

    <!--End-->

</head>
<body>

	<div class="container">
		<div class="row">
      <div id="container"></div>

    </div>
  </div>
  <script type="text/javascript">
anychart.onDocumentReady(function() {
  // create data set on our data
  var dataSet = anychart.data.set(getData());

  // map data for the first series
  var seriesData_1 = dataSet.mapAs({
    'x': 0,
    'value': 1
  });

  // map data for the second series
  var seriesData_2 = dataSet.mapAs({
    'x': 0,
    'value': 2
  });

  // map data for the second series
  var seriesData_3 = dataSet.mapAs({
    'x': 0,
    'value': 3
  });

  // map data for the second series
  var seriesData_4 = dataSet.mapAs({
    'x': 0,
    'value': 4
  });

  // create line chart
  var chart = anychart.column();

  // turn on chart animation
  chart.animation(true);

  chart.padding(10);

  // disable Y axis
  chart.yAxis(false);

  // set X axis title
  chart.xAxis()
    .title('Month')
    .stroke('black', 2);

  chart.xAxis().ticks()
    .enabled(false);

  // force chart to stack values by Y scale
  chart.yScale().stackMode('value');

  // set chart title
  chart.title('Garik integrasi Moda Transportasi berdasarkan Jumlah');


  // create data-area and set background settings
  chart.dataArea()
    .background()
    .enabled(true)
    .fill('#456')
    .corners(25, 25, 0, 0);

  // set grid settings
  chart.xGrid()
    .stroke('#fff .1')
    .isMinor(true)
    .drawFirstLine(false)
    .drawLastLine(false);

  chart.yGrid()
    .stroke('#fff .1')
    .isMinor(true)
    .drawFirstLine(false)
    .drawLastLine(false);



  // create first series with mapped data
  var series_1 = chart.column(seriesData_1);
  series_1.name('Total');

  // create second series with mapped data
  var series_2 = chart.column(seriesData_2);
  series_2.name('Not Process');

  // create second series with mapped data
  var series_3 = chart.column(seriesData_3);
  series_3.name('active');


  // create second series with mapped data
  var series_4 = chart.column(seriesData_4);
  series_4.name('Closed');

  // turn the legend on
  chart.legend()
    .enabled(true)
    .fontSize(13)
    .fontColor('white')
    .positionMode('inside')
    .margin({
      top: 15
    });

  // set container id for the chart
  chart.container('container');

  // initiate chart drawing
  chart.draw();
});

function getData() {
  return [
    ['Janurai', <?php echo $jumlah1 = $data1[0]; ?>, <?php echo htmlentities($num0); ?>, <?php echo htmlentities($num2); ?>, <?php echo htmlentities($num3); ?>],
    ['Februari', <?php echo $jumlah2 = $data2[0]; ?>, <?php echo htmlentities($num4); ?>, <?php echo htmlentities($num5); ?>, <?php echo htmlentities($num6); ?>],
    ['Maret', <?php echo $jumlah3 = $data3[0]; ?>, <?php echo htmlentities($num7); ?>, <?php echo htmlentities($num8); ?>, <?php echo htmlentities($num9); ?>],
    ['April', <?php echo $jumlah4 = $data4[0]; ?>, <?php echo htmlentities($num10); ?>, <?php echo htmlentities($num11); ?>, <?php echo htmlentities($num12); ?>],
    ['Mei', <?php echo $jumlah5 = $data5[0]; ?>, <?php echo htmlentities($num13); ?>, <?php echo htmlentities($num14); ?>, <?php echo htmlentities($num15); ?>],
    ['Juni', <?php echo $jumlah6 = $data6[0]; ?>, <?php echo htmlentities($num16); ?>, <?php echo htmlentities($num17); ?>, <?php echo htmlentities($num18); ?>],
    ['Juli', <?php echo $jumlah7 = $data7[0]; ?>, <?php echo htmlentities($num19); ?>, <?php echo htmlentities($num20); ?>, <?php echo htmlentities($num21); ?>],
    ['Agustus', <?php echo $jumlah8 = $data8[0]; ?>, <?php echo htmlentities($num22); ?>, <?php echo htmlentities($num23); ?>, <?php echo htmlentities($num24); ?>],
    ['September', <?php echo $jumlah9 = $data9[0]; ?>, <?php echo htmlentities($num25); ?>, <?php echo htmlentities($num26); ?>, <?php echo htmlentities($num27); ?>],
    ['Oktober', <?php echo $jumlah10 = $data10[0]; ?>, <?php echo htmlentities($num28); ?>, <?php echo htmlentities($num29); ?>, <?php echo htmlentities($num30); ?>],
    ['November', <?php echo $jumlah11 = $data11[0]; ?>, <?php echo htmlentities($num31); ?>, <?php echo htmlentities($num32); ?>, <?php echo htmlentities($num33); ?>],
    ['Desember', <?php echo $jumlah12 = $data12[0]; ?>, <?php echo htmlentities($num34); ?>, <?php echo htmlentities($num33); ?>, <?php echo htmlentities($num36); ?>]
  ]
}
    </script>
</body>


</html>