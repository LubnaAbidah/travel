<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
	
    <section class="content-header">
      <h1>
        Konfirmasi Pemesanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Konfirmasi Pemesanan</a></li>
        <li class="active">Data Konfirmasi Pemesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Konfirmasi Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$no_resi = !empty($_GET['id']) ? $_GET['id'] : " ";   
//$kdb = koneksidatabase();
$a = @$_GET["a"];
$sql = @$_POST["sql"];
switch ($sql) {
    case "insert": sql_insert(); break;
    case "update": sql_update(); break;
    case "delete": sql_delete(); break;	
}

switch ($a) {
    case "reset" :  curd_read();   break;
    case "tambah":  curd_create(); break;	
    case "edit"  :  curd_update($no_resi); break;	
    case "hapus"  :  curd_delete($no_resi); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <!--<a href="index.php?form=15&a=tambah"class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE</a><br>-->
  Jumlah Record :		
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "SELECT count(*) as total from konfirmasi_pesan, pesan where konfirmasi_pesan.id_pesan=pesan.id_pesan and status='Belum Bayar'";		  
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table id="example1" class="table table-bordered table-striped">
  <tr>
  <td>No</td>
  <td>No Resi</td>
  <td>No Rek</td>
  <td>Tgl Transfer</td>
  <td>Jam Transfer</td>
  <td>ID Pemesanan</td>
  <td>Status</td>
  <td>Harga</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['no_resi']; ?></td>
  <td><?php echo $baris['no_rek']; ?></td>
  <td><?php echo $baris['tgl_transfer']; ?></td>
  <td><?php echo $baris['jam_transfer']; ?></td>
  <td><?php echo $baris['id_pesan']; ?></td>
  <td><?php echo $baris['status']; ?></td>
  <td><?php echo $baris['harga']; ?></td>
  <td>
  <a href="index.php?form=15&a=hapus&id=<?php echo $baris['no_resi']; ?>"class="btn btn-danger btn-sm"></i>Delete</a>
  <a href="index.php?form=15&a=edit&id=<?php echo $baris['no_resi']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>
 	
  </td>
  </tr>
  <?php
   $i++;  
  }
  ?>
  </table>  
 <ul class="pagination">			
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Page:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?form=15&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
			}
			?>						
		</ul>
   <?php
  mysqli_free_result($hasil);
}
 ?>

 
<?php 
function formeditor($row)
  {
?>
<table>
<td width="200px">Nomor Kursi</td>
<td> <input type = "text" name="nomor_kursi" id="nomor_kursi" maxlength="50" size="50" value="<?php  echo trim ($row["nomor_kursi"])?> " readonly/></td>
</tr>
<tr>
<td width="200px">Status Pembayaran</td>
<td> 
<?php  $status = str_replace('"', '"', trim($row["status"])); ?>
<input type="radio" name="status" id="status" value="Belum Bayar" <?php  if($status=='Belum Bayar' || $status=='') {echo "checked=\"checked\""; } else {echo ""; }  ?> />
<label>Belum Bayar</label><br>
<input type="radio" name="status" id="status" value="Dalam Proses" <?php  if($status=='Dalam Proses') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Dalam Proses</label><br>
</td>
</tr>
<tr>
<td width="200px">Jadwal</td>
<td> <input type = "text" name="id_jadwal" id="id_jadwal" maxlength="22" size="22" value="<?php  echo trim ($row["nm_kota_asal"])?>"readonly/> -
<input type = "text" name="id_jadwal" id="id_jadwal" maxlength="22" size="22" value="<?php  echo trim ($row["nm_kota_tujuan"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">Member</td>
<td> <input type = "text" name="id_member" id="id_member" maxlength="50" size="50" value="<?php  echo trim ($row["username"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">Tanggal</td>
<td> <input type = "text" name="id_member" id="id_member" maxlength="50" size="50" value="<?php  echo trim ($row["tgl_berangkat"])?>"readonly/></td>
</tr>
<tr>
<td width="200px">Harga</td>
<td> <input type = "text" name="id_member" id="id_member" maxlength="50" size="50" value="<?php  echo trim ($row["harga"])?>"readonly/></td>
</tr>
</table>
-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
<table>
<tr>
<td width="200px">No Resi</td>
<td><input type="text" name="no_resi" id="no_resi" maxlength="25" size="25" value="<?php  echo trim($row["no_resi"]) ?>" readonly/></td>
</tr>
<tr>
<td width="200px">ID Pesan</td>
<td><input type="text" name="id_pesan" id="id_pesan" maxlength="25" size="25" value="<?php  echo trim($row["id_pesan"]) ?>" readonly/></td>
</tr>
</table>
<?php  }?>
 

<?php 
function curd_update($no_resi) 
{
global $kdb;
$hasil2 = sql_select_byid($no_resi);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Status Konfirmasi Pesan</h3><br>
<a href="index.php?form=15&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=15&a=reset" method="post">
<input type="hidden" name="sql" value="update" class="btn btn-primary btn-sm"> 
<input type="hidden" name="no_resix" value="<?php  echo $no_resi; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm></p>
</form>
<?php } ?>

<?php 
function curd_delete($no_resi) 
{
global $kdb;
$hasil2 = sql_select_byid($no_resi);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Konfirmasi Pesan</h3><br>
<a href="index.php?form=15&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=15&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="no_resix" value="<?php  echo $no_resi; ?>" >
<h3> Anda yakin akan menghapus data Konfirmasi Pesan dengan No Resi <b><?php echo $row['no_resi'];?> </b></h3>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 


function sql_select()
{
  global $kdb;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 5;
$mulai_dari = $limit * ($page -1);
  $sql = " select * from konfirmasi_pesan, pesan, jadwal, kota_asal, kota_tujuan, member where konfirmasi_pesan.id_pesan = pesan.id_pesan
  and pesan.id_jadwal = jadwal.id_jadwal and pesan.id_member = member.id_member and jadwal.id_kota_asal = kota_asal.id_kota_asal
  and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and status='Belum Bayar' limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_select_byid($no_resi)
{
  global $kdb;
  $sql = " select * from konfirmasi_pesan,pesan, jadwal, kota_asal, kota_tujuan, member where konfirmasi_pesan.id_pesan = pesan.id_pesan
  and pesan.id_jadwal = jadwal.id_jadwal and pesan.id_member = member.id_member and jadwal.id_kota_asal = kota_asal.id_kota_asal
  and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and no_resi = ".$no_resi; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update `pesan`, `konfirmasi_pesan` set 
  `status` = '".$_POST["status"]."' where konfirmasi_pesan.id_pesan = pesan.id_pesan and no_resi = ".$_POST["no_resix"];       
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `konfirmasi_pesan` where no_resi = ".$_POST["no_resix"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

?>
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
<!-- script datatables -->
  