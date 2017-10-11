<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kota Keberangkatan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daftar Kota</a></li>
        <li class="active">Kota Keberangkatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Kota Keberangkatan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_kota_asal = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_kota_asal); break;	
    case "hapus"  :  curd_delete($id_kota_asal); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=2&a=tambah"class="btn btn-success btn-sm"><i class="fa fa-plus"></i> CREATE</a><br>
  Jumlah Record :		
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_kota_asal) from kota_asal";			  
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <thead>
  <tr>
  <td>No</td>
  <td>ID Kota Keberangkatan</td>
  <td>Kota Keberangkatan</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_kota_asal']; ?></td>
  <td><?php echo $baris['nm_kota_asal']; ?></td>
  <td>
  <a href="index.php?form=2&a=edit&id=<?php echo $baris['id_kota_asal']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>
  <a href="index.php?form=2&a=hapus&id=<?php echo $baris['id_kota_asal']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>	
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
				<li><a href="index.php?form=2&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td><input type="text" name="nm_kota_asal" id="nm_kota_asal" maxlength="25" size="25" value="<?php  echo trim($row["nm_kota_asal"]) ?>" ></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Kota Keberangkatan</h3><br>
<a href="index.php?form=2&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=2&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
  "nm_kota_asal" => "",
  "publish" => "T");
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan"class="btn btn-primary btn-sm" ></p>
</form>
<?php } ?>

<?php 
function curd_update($id_kota_asal) 
{
global $kdb;
$hasil2 = sql_select_byid($id_kota_asal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Kota Keberangkatan</h3><br>
<a href="index.php?form=2&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=2&a=reset" method="post">
<input type="hidden" name="sql" value="update" class="btn btn-primary btn-sm"> 
<input type="hidden" name="id_kota_asalx" value="<?php  echo $id_kota_asal; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_kota_asal) 
{
global $kdb;
$hasil2 = sql_select_byid($id_kota_asal);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Kota Keberangkatan</h3><br>
<a href="index.php?form=2&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=2&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_kota_asalx" value="<?php  echo $id_kota_asal; ?>" >
<h3> Anda yakin akan menghapus data Kota Keberangkatan <b><?php echo $row['nm_kota_asal'];?> </b></h3>
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
  $sql = " select * from kota_asal limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST;
   if($_POST["nm_kota_asal"]== "" || empty($_POST["nm_kota_asal"])){ 
            echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
        }else {
  $sql  = " insert into `kota_asal` (`nm_kota_asal`) values ( '".$_POST["nm_kota_asal"]."' )";			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}
}

function sql_select_byid($id_kota_asal)
{
  global $kdb;
  $sql = " select * from kota_asal where id_kota_asal = ".$id_kota_asal; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
  $sql  = " update  `kota_asal` set `nm_kota_asal` = '".$_POST["nm_kota_asal"]."' where id_kota_asal = ".$_POST["id_kota_asalx"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `kota_asal` where id_kota_asal = ".$_POST["id_kota_asalx"];			  
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
