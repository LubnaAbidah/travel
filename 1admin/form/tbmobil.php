<section class="content-header">
      <h1>
        Data Kendaraan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Kendaraan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Kendaraan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_mobil = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_mobil); break;	
    case "hapus"  :  curd_delete($id_mobil); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=6&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>CREATE</a><br>
  Jumlah Record :		
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_mobil) from kendaraan";			  
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Kendaraan</td>
  <td>Jenis Kendaraan</td>
  <td>Nomor Polisi</td>
  <td>Warna Mobil</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_mobil']; ?></td>
  <td><?php echo $baris['jenis_mobil']; ?></td>
  <td><?php echo $baris['nomor_polisi']; ?></td>
  <td><?php echo $baris['warna_mobil']; ?></td>
  <td>
  <a href="index.php?form=6&a=edit&id=<?php echo $baris['id_mobil']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>
  <a href="index.php?form=6&a=hapus&id=<?php echo $baris['id_mobil']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>	
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
				<li><a href="index.php?form=6&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td width="200px">Jenis Mobil</td>
<td> <input type = "text" name="jenis_mobil" id="jenis_mobil" maxlength="50" size="50" value="<?php  echo trim ($row["jenis_mobil"])?>"></td>
</tr>
<tr>
<td width="200px">Nomor Polisi</td>
<td> <input type = "text" name="nomor_polisi" id="nomor_polisi" maxlength="50" size="50" value="<?php  echo trim ($row["nomor_polisi"])?>"></td>
</tr>
<tr>
<td width="200px">Warna Mobil</td>
<td> <input type = "text" name="warna_mobil" id="warna_mobil" maxlength="8" size="8" value="<?php  echo trim ($row["warna_mobil"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Kendaraan</h3><br>
<a href="index.php?form=6&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=6&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "jenis_mobil" => "",
	"nomor_polisi" => "",
	"warna_mobil" => "" );
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($id_mobil) 
{
global $kdb;
$hasil2 = sql_select_byid($id_mobil);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Kendaraan</h3><br>
<a href="index.php?form=6&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=6&a=reset" method="post">
<input type="hidden" name="sql" value="update" class="btn btn-primary btn-sm">
<input type="hidden" name="id_mobilx" value="<?php  echo $id_mobil; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_mobil) 
{
global $kdb;
$hasil2 = sql_select_byid($id_mobil);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Kendaraan</h3><br>
<a href="index.php?form=6&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=6&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_mobilx" value="<?php  echo $id_mobil; ?>" >
<h3> Anda yakin akan menghapus data kendaraan Mobil <?php echo $row['jenis_mobil'];?> dengan Nomor Polisi <?php echo $row['nomor_polisi'];?> </h3>
<p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 


function sql_select()
{
  global $kdb;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 10;
$mulai_dari = $limit * ($page -1);
  $sql = " select * from kendaraan limit $mulai_dari,$limit " ;
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["jenis_mobil"];
  echo $_POST["nomor_polisi"];
   echo $_POST["warna_mobil"];
   if($_POST["jenis_mobil"]== "" || empty($_POST["jenis_mobil"])){ 
            echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
        }elseif  ($_POST["nomor_polisi"]== "" || empty($_POST["nomor_polisi"])){
			echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
		}elseif  ($_POST["warna_mobil"]== "" || empty($_POST["warna_mobil"])){
			echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
		}else{
  $sql  = " insert into `kendaraan` (`warna_mobil`,`jenis_mobil`,`nomor_polisi`) 
  values (  '".$_POST["warna_mobil"]."', 
            '".$_POST["jenis_mobil"]."',
            '".$_POST["nomor_polisi"]."' )";			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}
}

function sql_select_byid($id_mobil)
{
  global $kdb;
  $sql = " select * from kendaraan where id_mobil = ".$id_mobil; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update  `kendaraan` set `warna_mobil` = '".$_POST["warna_mobil"]."',`jenis_mobil` = '".$_POST["jenis_mobil"]."',
  `nomor_polisi` = '".$_POST["nomor_polisi"]."' where id_mobil = ".$_POST["id_mobilx"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `kendaraan` where id_mobil = ".$_POST["id_mobilx"];		  
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