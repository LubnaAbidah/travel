<section class="content-header">
      <h1>
        Data Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Jadwal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_jadwal = !empty($_GET['id']) ? $_GET['id'] : " ";   

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
    case "edit"  :  curd_update($id_jadwal); break;	
    case "hapus"  :  curd_delete($id_jadwal); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>

  <a href="index.php?form=5&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE</a><br>
  <?php 
//mencari banyak data yang ada dalam tabel
echo "Jumlah Record :";
global $kdb;
$per_hal=10;
$result="SELECT count(id_jadwal) from jadwal";
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_array($sqli);
$banyakData = $data[0];
echo $data[0];

$limit = 5;
?>
<?php
  $hasil = sql_select();
  $i=1;
   //menampilkan data 
  ?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Jadwal</td>
  <td>Kota Keberangkatan</td>
  <td>Kota Tujuan</td>
  <td>Tanggal</td>
  <td>Waktu</td>
  <td>Harga</td>
  <td>Nomor Polisi</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_jadwal']; ?></td>
  <td><?php echo $baris['nm_kota_asal']; ?></td>
  <td><?php echo $baris['nm_kota_tujuan']; ?></td>
  <td><?php echo $baris['tgl_berangkat']; ?></td>
  <td><?php echo $baris['jam_berangkat']; ?></td>
  <td><?php echo $baris['harga']; ?></td>
  <td><?php echo $baris['nomor_polisi']; ?></td>
  <td>
  <a href="index.php?form=5&a=edit&id=<?php echo $baris['id_jadwal']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>	
  <a href="index.php?form=5&a=hapus&id=<?php echo $baris['id_jadwal']; ?>"class="btn btn-danger btn-sm">DELETE</a>	
  </td>
  </tr>
  <?php
   $i++;  
  }
  ?>
  </table> 
  <!--membuat pagination-->
 <ul class="pagination">			
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?form=5&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<tr>
<td width="200px">Kota Keberangkatan</td>
<td>
<select = name="id_kota_asal" id="id_kota_asal"> 
<?php
$kdb = koneksidatabase();
$sqlquery = "select `id_kota_asal`, `nm_kota_asal` from kota_asal ";
$hasilquery = mysqli_query($kdb, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_kota_asal"];
	$caption = $baris["nm_kota_asal"];
	if($row["id_kota_asal"]== $baris["id_kota_asal"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
<tr>
<td width="200px">Kota Tujuan</td>
<td> 
<select = name="id_kota_tujuan" id="id_kota_tujuan"> 
<?php
$kdb = koneksidatabase();
$sqlquery = "select `id_kota_tujuan`, `nm_kota_tujuan` from kota_tujuan ";
$hasilquery = mysqli_query($kdb, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_kota_tujuan"];
	$caption = $baris["nm_kota_tujuan"];
	if($row["id_kota_tujuan"]== $baris["id_kota_tujuan"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
<tr>
<td width="200px">Tanggal Keberangkatan</td>
<td> <input type = "date" name="tgl_berangkat" id="tgl_berangkat" maxlength="50" size="50" value="<?php  echo trim ($row["tgl_berangkat"])?>"></td>
</tr>
<tr>
<td width="200px">Waktu Keberangkatan</td>
<td> <input type = "time" name="jam_berangkat" id="jam_berangkat" maxlength="50" size="50" value="<?php  echo trim ($row["jam_berangkat"])?>"></td>
</tr>
<tr>
<td width="200px">Harga</td>
<td> <input type = "number" name="harga" id="harga" value="<?php  echo trim ($row["harga"])?>"></td>
</tr>
<td width="200px">Nomor Polisi</td>
<td>
<select = name="id_mobil" id="id_mobil">
<?php
$kdb = koneksidatabase();
$sqlquery = "select `id_mobil`, `nomor_polisi` from kendaraan ";
$hasilquery = mysqli_query($kdb, $sqlquery) or die (mysql_error());
while ($baris = mysqli_fetch_assoc($hasilquery)) {
	$value = $baris["id_mobil"];
	$caption = $baris["nomor_polisi"];
	if($row["id_mobil"]== $baris["id_mobil"])
	{$selectr = "selected";}
else {$selectr = "";}
?>
<option value= "<?php echo $value ?>" <?php echo $selectr?> >
&nbsp; <?php echo $caption; ?> &nbsp;
</option>
 <?php } ?>
</select>
</td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "nm_kota_asal" => "",
	"nm_kota_tujuan" => "",
	"tgl_berangkat" => "",
	"jam_berangkat" => "",
	"harga" => "",
	"id_mobil" => "");
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($id_jadwal) 
{
global $kdb;
$hasil2 = sql_select_byid($id_jadwal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="update" >
<input type="hidden" name="id_jadwalx" value="<?php  echo $id_jadwal; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_jadwal) 
{
global $kdb;
$hasil2 = sql_select_byid($id_jadwal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Jadwal</h3><br>
<a href="index.php?form=5&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=5&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_jadwalx" value="<?php  echo $id_jadwal; ?>" >
<h3> Anda yakin akan menghapus data Jadwal Keberangkatan <br> <?php echo $row['nm_kota_asal'];?> - <?php echo $row['nm_kota_tujuan'];?>. Pada Tanggal <?php echo $row['tgl_berangkat'];?> </h3>
<p><input type="submit" name="action" value="Delete" ></p>
</form>
<?php } ?>

<?php 


function sql_select()
{
    global $kdb;
   $where = ''; 
   if(isset($_GET['cari']) && $_GET['cari']){  
 $where .= " where nm_kota_tujuan like '%{$_GET['cari']}%'";  
}
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 5;
$mulai_dari = $limit * ($page -1);
  $sql =  "select * from jadwal, kendaraan, kota_asal, kota_tujuan where 
  jadwal.id_kota_asal = kota_asal.id_kota_asal and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and 
  jadwal.id_mobil = kendaraan.id_mobil limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["id_kota_asal"];
  echo $_POST["id_kota_tujuan"];
  echo $_POST["tgl_berangkat"];
  echo $_POST["jam_berangkat"];
   echo $_POST["harga"];
   echo $_POST["id_mobil"];
  $sql  = " insert into `jadwal` (`id_kota_asal`,`id_kota_tujuan`,`tgl_berangkat`,`jam_berangkat`, `harga`,
 `id_mobil`) 
  values ( '".$_POST["id_kota_asal"]."', 
  '".$_POST["id_kota_tujuan"]."',
  '".$_POST["tgl_berangkat"]."',
  '".$_POST["jam_berangkat"]."',
  '".$_POST["harga"]."',
  '".$_POST["id_mobil"]."' )";		  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_jadwal)
{
  global $kdb;
  $sql = "select * from jadwal where id_jadwal = ".$id_jadwal;
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update  `jadwal` set `id_kota_asal` = '".$_POST["id_kota_asal"]."',`id_kota_tujuan` = '".$_POST["id_kota_tujuan"]."',
  `tgl_berangkat` = '".$_POST["tgl_berangkat"]."',`jam_berangkat` = '".$_POST["jam_berangkat"]."',`harga` = '".$_POST["harga"]."',
  `id_mobil` = '".$_POST["id_mobil"]."' where id_jadwal = ".$_POST["id_jadwalx"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `jadwal` where id_jadwal = ".$_POST["id_jadwalx"];		  
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