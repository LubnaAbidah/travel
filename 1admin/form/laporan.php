
<script type="text/javascript">
var s5_taf_parent = window.location;
function popup_print(){
window.open(‘preview.php’,’page’,’toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes’)
}
</script>

<section class="content-header">
      <h1>
        Data Laporan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Laporan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<h2>Input Pendapatan Periode</h2>
<div class='row'>
<div class='col-sm-6'>
<form method=POST action=''>
<div class='form-group'>
    <label>Masukkan Tanggal Awal<span class='text-danger'></span></label>
	<div class='input-group date'>
    <input class='form-control' type='date' name='awal' id='awal'>
	<span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
	</div>
</div>	
<div class='form-group'>
    <label>Masukkan Tanggal Akhir<span class='text-danger'></span></label>
	<div class='input-group date'>
    <input class='form-control' type='date' name='akhir' id='akhir'>
	<span class='input-group-addon'>
    <span class='glyphicon glyphicon-calendar'></span>
    </span>
	</div>
</div>	

<button class='btn btn-primary'><span class='glyphicon glyphicon-print'></span> Tampilkan</button>
<a href="index.php?form=9" class='btn btn-success'><span class='glyphicon glyphicon-refresh'></span> Clear</a>
<a onClick="popup_print()" class='btn btn-default'><span class='glyphicon glyphicon-download'></span> Download</a>

</form>
</div>
</div>
<body onLoad="window.print()">

<?php
$tglawal= @$_POST["awal"];
$tglakhir= @$_POST["akhir"];
?>
<h2>Laporan Periode <?php echo $tglawal ?> s/d <?php echo $tglakhir?></h2>
	<div class='panel panel-default'>
	
    <table class='table table-bordered table-hover table-striped'>
    <thead>
        <tr>
            <th>ID Pesan</th>
			<th>Jadwal</th>
			<th>Tanggal Berangkat </th>
			<th>Tanggal Transfer </th>
			<th>Member </th>
			<th>No Resi </th>
			<th>Harga (Rp.) </th>
        </tr>
    </thead>
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	$subtotal=0;
	
    $sql="select * from konfirmasi_pesan, member, pesan, jadwal, kota_asal, kota_tujuan, kendaraan where 
kendaraan.id_mobil = jadwal.id_mobil and member.id_member = pesan.id_member and pesan.id_pesan = pesan.id_pesan and pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_kota_asal = 
kota_asal.id_kota_asal and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and konfirmasi_pesan.id_pesan = pesan.id_pesan AND status='Lunas'AND tgl_transfer BETWEEN '$tglawal' AND '$tglakhir' ";
	$hasil = mysqli_query($kdb, $sql);
    while($r=mysqli_fetch_array($hasil)){
	$harga =$r[harga];
	$subtotal= $harga + $subtotal;
       echo "
			 <td>$r[id_pesan]</td>
			 <td>$r[nm_kota_asal] - $r[nm_kota_tujuan]</td>
			 <td>$r[tgl_berangkat]</td>
			 <td>$r[tgl_transfer]</td>
			 <td>$r[username]</td>
			 <td>$r[no_resi]</td>
			 <td>$r[harga]</td>
			 
            </tr>";
    }
	
	echo"<tr>
	<td colspan='5' align='right'></td>
	<td><b>Grand Total :</td>
	<td>$subtotal</td></b>
    </tr>";
    echo "</table></div>";

?>
</body>
 </div>
</div>
</div>
 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
        <!-- /.col -->
    
      <!-- /.row -->
    </section>
    <!-- /.content -->