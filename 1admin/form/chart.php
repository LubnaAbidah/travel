<!DOCTYPE html>
<html>
<head>
<title>Grafik dengan Highchart</title>
<script src="../bootstrap/js/jquery.js"></script>
<script src="../bootstrap/js/highcharts.js"></script>
<!-- script option grafik line -->
<?php
$kdb = koneksidatabase();
grafik(); 
mysqli_close($kdb);

function grafik() 
{
global $dbc;
$tahunmasuk = sql_select_tahun_masuk_mahasiswa();
$datamhs = sql_select_tahun_masuk_mahasiswa();
?>
<script type="text/javascript">
$(function () {
    $('#grafikline').highcharts({
        title: {
            text: 'Pemesanan',
            x: -20 //center
        },
        subtitle: {
            text: 'Periode Tahun',
            x: -20
        },
  credits: {
   enabled: false
  },
        xAxis: {
   title: {
                text: 'Tahun'
            },
            categories: ['<?php
	  while($row = mysqli_fetch_assoc($tahunmasuk))
	  {
		 ?>'<?php echo $row['jen_kelamin']; ?>', <?php 		 
      } ?>']
        },
        yAxis: {
            title: {
                text: 'Persentase (%)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
		
        series: [
		 <?php
	  while($row = mysqli_fetch_assoc($datamhs))
	  {
		 echo $row['jumlah'].', ';  
     } ?>
		]
    }]
    });
});
</script>
</head>
<body>
<div id="grafikline" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
</body>
</html>
<?php
  mysqli_free_result($tahunmasuk);
}

function koneksidatabase()
{
     include "../../isi/koneksi/koneksi.php";
	return $kdb;
} 

function sql_select_tahun_masuk_mahasiswa()
{
  global $kdb;
 $sql   = "SELECT jen_kelamin, count(member.jen_kelamin) as jumlah FROM member GROUP BY jen_kelamin";
  $res = mysqli_query($kdb, $sql) or die(mysql_error());
  return $res;
}

?>