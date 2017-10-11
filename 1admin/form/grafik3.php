<?php
$kdb = koneksidatabase();
grafik(); 
mysqli_close($kdb);

function grafik() 
{
global $dbc;

$datamhs = sql_select_tahun_masuk_mahasiswa();
?>
<script src="../bootstrap/js/jquery.js" type="text/javascript"></script>
<script src="../bootstrap/js/highcharts.js" type="text/javascript"></script>
<script src="../bootstrap/js/exporting.js" type="text/javascript"></script>	
<script type="text/javascript">
$(function () {

    $('#containerx').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'DATA JUMLAH MAHASISWA'
        },
        subtitle: {
            text: 'BERDASARKAN TAHUN MASUK'
        },
        xAxis: {
            categories: [
			
    'Jumlah Member'			
						],
            title: {
                text: 'Tahun Masuk'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Mahasiswa',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' ORANG'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'bottom',
            x: 50,
            y: 10,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Tahun',
            data: [
    <?php
	  while($row = mysqli_fetch_assoc($datamhs))
	  {
		 echo $row['jummhs'].', ';  
     } ?>	
			
			]
        }]
    });
});
</script>	
<div id="containerx" style="min-width: 150px; width: 100%; min-height: 360px; margin: 0 auto"></div>	
<?php
  
}

function koneksidatabase()
{
    include('koneksi.php');
	return $kdb;
} 

function sql_select_tahun_masuk_mahasiswa()
{
  global $kdb;
  $sql = "SELECT count(*) as jummhs from member "; 
  $res = mysqli_query($kdb, $sql) or die(mysql_error());
  return $res;
}

?>