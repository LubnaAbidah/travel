<section class="content-header">
      <h1>
        Data Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Pengguna</li>
        <li class="active">Admin</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_admin = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_admin); break;	
    case "hapus"  :  curd_delete($id_admin); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=8&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>CREATE</a><br>
  Jumlah Record :		
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_admin) from admin";			  
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>Email</td>
  <td>Password</td>
  <td>Nomor Telepon</td>
  <td>Nama Lengkap</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['email']; ?></td>
  <td><?php echo $baris['password']; ?></td>
  <td><?php echo $baris['no_telp']; ?></td>
  <td><?php echo $baris['nama_lengkap']; ?></td>
  <td>
  <a href="index.php?form=8&a=edit&id=<?php echo $baris['id_admin']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>
  <a href="index.php?form=8&a=hapus&id=<?php echo $baris['id_admin']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>		
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
				<li><a href="index.php?form=8&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td width="200px">E-mail</td>
<td> <input type = "text" name="email" id="email" maxlength="50" size="50" value="<?php  echo trim ($row["email"])?>"></td>
</tr>
<tr>
<td width="200px">Password</td>
<td> <input type = "text" name="password" id="password" maxlength="50" size="50" value="<?php  echo trim ($row["password"])?>"></td>
</tr>
<tr>
<td width="200px">Nomor Telepon</td>
<td> <input type = "text" name="no_telp" id="no_telp" maxlength="50" size="50" value="<?php  echo trim ($row["no_telp"])?>"></td>
</tr>
<tr>
<td width="200px">Nama Lengkap</td>
<td> <input type = "text" name="nama_lengkap" id="nama_lengkap" maxlength="50" size="50" value="<?php  echo trim ($row["nama_lengkap"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Admin</h3><br>
<a href="index.php?form=8&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=8&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "email" => "",
    "password" => "",
	"no_telp" => "",
	"nama_lengkap" => "" );
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm" ></p>
</form>
<?php } ?>

<?php 
function curd_update($id_admin) 
{
global $kdb;
$hasil2 = sql_select_byid($id_admin);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Admin</h3><br>
<a href="index.php?form=8&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=8&a=reset" method="post">
<input type="hidden" name="sql" value="update" >
<input type="hidden" name="id_adminx" value="<?php  echo $id_admin; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_admin) 
{
global $kdb;
$hasil2 = sql_select_byid($id_admin);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Admin</h3><br>
<a href="index.php?form=8&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=8&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_adminx" value="<?php  echo $id_admin; ?>" >
<h3> Anda yakin akan menghapus<b> <?php echo $row['nama_lengkap'];?> </b> dari data Admin </h3>
<p><input type="submit" name="action" value="Delete" class="btn btn-primary btn-sm" ></p>
</form>
<?php } ?>

<?php 


function sql_select()
{
  global $kdb;
   $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 10;
$mulai_dari = $limit * ($page -1);
  $sql = " select * from admin limit $mulai_dari,$limit " ;
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["email"];
  echo $_POST["password"];
  echo $_POST["no_telp"];
   echo $_POST["nama_lengkap"];
  $sql  = " insert into `admin` (`email`,`nama_lengkap`,`password`,`no_telp`) 
  values ( '".$_POST["email"]."', 
  '".$_POST["nama_lengkap"]."',
  '".$_POST["password"]."',
  '".$_POST["no_telp"]."' )";			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_admin)
{
  global $kdb;
  $sql = " select * from admin where id_admin = ".$id_admin; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update  `admin` set `email` = '".$_POST["email"]."', `nama_lengkap` = '".$_POST["nama_lengkap"]."',`password` = '".$_POST["password"]."', `no_telp` = '".$_POST["no_telp"]."' where id_admin = ".$_POST["id_adminx"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `admin` where id_admin = ".$_POST["id_adminx"];		  
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