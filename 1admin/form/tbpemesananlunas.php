<section class="content-header">
      <h1>
        Data Pemesanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Pemesanan Lunas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Pemesanan Lunas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_pesan = !empty($_GET['id']) ? $_GET['id'] : " ";   
$id_member = !empty($_GET['mem']) ? $_GET['mem'] : " ";   
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
    case "detail"  :  curd_detail($id_pesan,$id_member); break;  
 case "hapus"  :  curd_delete($id_pesan); break;   	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>


  Jumlah Record :   
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_pesan) from pesan where status='Lunas'";       
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Pemesanan</td>
   <td>Status</td>
  <td>Member</td>
  <td>Jadwal</td>
  <td>Tanggal</td>
  <td>Harga</td>
  <td>No Kursi</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_pesan']; ?></td>
   <td><?php echo $baris['status']; ?></td>
  <td><?php echo $baris['username']; ?></td>
  <td><?php echo $baris['nm_kota_asal']; ?> - <?php echo $baris['nm_kota_tujuan']; ?></td>
  <td><?php echo $baris['tgl_berangkat']; ?></td>
  <td><?php echo $baris['harga']; ?></td>
  <td><?php echo $baris['nomor_kursi']; ?></td>
  <td> 
<a href="index.php?form=12&a=detail&id=<?php echo $baris['id_pesan']; ?>&mem=<?php echo $baris['id_member']; ?>"class="btn btn-default">DETAIL</a>   
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
        <li><a href="index.php?form=12&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td> <input type = "text" name="nomor_kursi" id="nomor_kursi" maxlength="50" size="50" value="<?php  echo trim ($row["nomor_kursi"])?>"></td>
</tr>
<tr>
<td width="200px">Status Pembayaran</td>
<td> 
<?php  $status = str_replace('"', '"', trim($row["status"])); ?>
<input type="radio" name="status" id="status" value="Belum Bayar" <?php  if($status=='Belum Bayar' || $status=='') {echo "checked=\"checked\""; } else {echo ""; }  ?> />
<label>Belum Bayar</label><br>
<input type="radio" name="status" id="status" value="Dalam Proses" <?php  if($status=='Dalam Proses') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Dalam Proses</label><br>
<input type="radio" name="status" id="status" value="Lunas" <?php  if($status=='Lunas') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Lunas</label>
</td>
</tr>
<tr>
<td width="200px">ID Jadwal</td>
<td> <input type = "text" name="id_jadwal" id="id_jadwal" maxlength="50" size="50" value="<?php  echo trim ($row["id_jadwal"])?>"></td>
</tr>
<tr>
<td width="200px">ID Member</td>
<td> <input type = "text" name="id_member" id="id_member" maxlength="50" size="50" value="<?php  echo trim ($row["id_member"])?>"></td>
</tr>
</table>
<?php  }?>


<?php 
function curd_detail($id_pesan,$id_member) 
{
global $kdb;
$hasil2 = sql_select_byid($id_pesan,$id_member);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Detail Data Pemesanan</h3><br>
<a href="index.php?form=12&a=reset" class="btn btn-primary btn-sm">Kembali</a>
<br>
<form action="index.php?form=12&a=reset" method="post">
ID Pesan =<b> <?php echo $row['id_pesan'];?></b><br>
Nama Pemesan = <?php echo $row['nama'];?><br>
Nomor Telepon = <?php echo $row['telepon'];?><br>
Kota Keberangkatan  = <?php echo $row['nm_kota_asal'];?><br> 
Kota Tujuan = <?php echo $row['nm_kota_tujuan'];?><br> 
Tanggal Berangkat = <?php echo $row['tgl_berangkat'];?><br> 
Jam Berangkat = <?php echo $row['jam_berangkat'];?><br>  
Nomor Kursi = <?php echo $row['nomor_kursi'];?><br> 
Jenis Mobil = <?php echo $row['jenis_mobil'];?><br>
Nomor Polisi = <?php echo $row['nomor_polisi'];?><br>
Warna Mobil = <?php echo $row['warna_mobil'];?><br>
Status Pembayaran =<b> <?php echo $row['status'];?></b><br>
--------------------------------------------------------------------------------------------<br>
Nomor Resi =<b> <?php echo $row['no_resi'];?></b><br>
Nomor Rek =<b> <?php echo $row['no_rek'];?></b><br>
Tanggal Transfer =<b> <?php echo $row['tgl_transfer'];?></b><br>
Jam Transfer =<b> <?php echo $row['jam_transfer'];?></b><br>
Harga Tiket =<b><?php echo $row['harga'];?></b>

</form>
<?php } ?>

<?php 
function curd_delete($id_pesan) 
{
global $kdb;
$hasil3 = sql_select_byid3($id_pesan);
$row = mysqli_fetch_array($hasil3);
?>
<h3>Penghapusan Data Pemesanan</h3><br>
<a href="index.php?form=13&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=13&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_pesanx" value="<?php  echo $id_pesan; ?>" >
<h3> Anda yakin akan menghapus data Pemesanan dengan ID =  <b> <?php echo $row['id_pesan'];?> </b></h3>
<p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-sm"></p>
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
  and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and status='Lunas' limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["nomor_kursi"];
  echo $_POST["status"];
  echo $_POST["id_jadwal"];
  echo $_POST["id_member"];
  
  $sql  = " insert into `pesan` (`nomor_kursi`,`status`,`id_jadwal`,`id_member`) 
  values ( 
  '".$_POST["nomor_kursi"]."',
  '".$_POST["status"]."',
  '".$_POST["id_jadwal"]."',
'".$_POST["id_member"]."'  )";      
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_pesan,$id_member)
{
  global $kdb;
$sql =  "select * from konfirmasi_pesan, member, pesan, jadwal, kota_asal, kota_tujuan, kendaraan where 
kendaraan.id_mobil = jadwal.id_mobil and member.id_member = pesan.id_member and pesan.id_pesan = pesan.id_pesan and 
pesan.id_pesan = '$id_pesan' and member.id_member = '$id_member' and pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_kota_asal = 
kota_asal.id_kota_asal and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and konfirmasi_pesan.id_pesan = pesan.id_pesan" ; 

  //$sql = " select * from pesan where id_pesan = ".$id_pesan; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}
function sql_select_byid3($id_pesan)
{
  global $kdb;
$sql = " select * from pesan where id_pesan = ".$id_pesan; 
  $hasil3 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil3;
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