
<?php
   $url=$_SERVER['REQUEST_URI'];
   header("Refresh: 10; URL=$url");
   
?>

<html>

    <head>
        <title>BChartJS</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

        <style>
 #chart{
   z-index:-10;} 
</style>
<body>
 <div id="chart">
</div>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/jquery-1.9.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/exporting.js'); ?>"></script>

<script type="text/javascript">
            
            jQuery(function(){
    new Highcharts.Chart({
        chart: {
            renderTo: 'chart',
            type: 'line',
        },
        title: {
            text: 'Grafik Statistik pengunjung',
            x: -20
        },
        subtitle: {
            text: 'Data Penumpang',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Penumpang'
            }
        },
        series: [{
            name: 'Data Dalam Bulan',
            data: <?php echo json_encode($grafik); ?>
        }]
    });
}); 
</script>
</body>
</html>