<section class="content-header">
      <h1>
        Data Member
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Pengguna</li>
        <li class="active">Member</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_member = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_member); break;	
    case "hapus"  :  curd_delete($id_member); break;  	
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=7&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>CREATE</a><br>
  Jumlah Record :		
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_member) from member";			  
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Member</td>
  <td>Nama</td>
  <td>Alamat</td>
  <td>Telepon</td>
  <td>Jenis Kelamin</td>
  <td>Username</td>
  <td>Password</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_member']; ?></td>
  <td><?php echo $baris['nama']; ?></td>
  <td><?php echo $baris['alamat']; ?></td>
  <td><?php echo $baris['telepon']; ?></td>
  <td><?php echo $baris['jen_kelamin']; ?></td>
  <td><?php echo $baris['username']; ?></td>
  <td><?php echo $baris['password']; ?></td>
  <td>
  <a href="index.php?form=7&a=edit&id=<?php echo $baris['id_member']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>	
  <a href="index.php?form=7&a=hapus&id=<?php echo $baris['id_member']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>	
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
				<li><a href="index.php?form=7&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td width="200px">Nama</td>
<td> <input type = "text" name="nama" id="nama" maxlength="50" size="50" value="<?php  echo trim ($row["nama"])?>"></td>
</tr>
<tr>
<td width="200px">Alamat</td>
<td> <input type = "text" name="alamat" id="alamat" maxlength="50" size="50" value="<?php  echo trim ($row["alamat"])?>"></td>
</tr>
<tr>
<td width="200px">Telepon</td>
<td> <input type = "text" name="telepon" id="telepon" maxlength="8" size="8" value="<?php  echo trim ($row["telepon"])?>"></td>
</tr>
<tr>
<td width="200px">Jenis Kelamin (L/P)</td>
<td>
<?php  $jen_kelamin = str_replace('"', '"', trim($row["jen_kelamin"])); ?>
<input type="radio" name="jen_kelamin" id="jen_kelamin" value="P" <?php  if($jen_kelamin=='P' || $jen_kelamin=='') {echo "checked=\"checked\""; } else {echo ""; }  ?> />
<label>Perempuan</label><br>
<input type="radio" name="jen_kelamin" id="jen_kelamin" value="L" <?php  if($jen_kelamin=='L') {echo "checked=\"checked\""; } else {echo ""; } ?> />
<label>Laki-Laki</label>
</td>
</tr>
<tr>
<td width="200px">Username</td>
<td> <input type = "text" name="username" id="username" value="<?php  echo trim ($row["username"])?>"></td>
</tr>
<tr>
<td width="200px">Password</td>
<td> <input type = "text" name="password" id="password" maxlength="11" size="11" value="<?php  echo trim ($row["password"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Member</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "nama" => "",
	"alamat" => "",
	"telepon" => "",
	"jen_kelamin" => "L",
	"username" => "",
	"password" => "" );
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($id_member) 
{
global $kdb;
$hasil2 = sql_select_byid($id_member);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data member</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="update" >
<input type="hidden" name="id_memberx" value="<?php  echo $id_member; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_member) 
{
global $kdb;
$hasil2 = sql_select_byid($id_member);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data member</h3><br>
<a href="index.php?form=7&a=reset"class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=7&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_memberx" value="<?php  echo $id_member; ?>" >
<h3> Anda yakin akan menghapus data member <?php echo $row['nama'];?> </h3>
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
  $sql = " select * from member limit $mulai_dari,$limit " ;
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["nama"];
  echo $_POST["alamat"];
   echo $_POST["telepon"];
  echo $_POST["jen_kelamin"];
  echo $_POST["username"];
   echo $_POST["password"];
  $sql  = " insert into `member` (`telepon`,`nama`,`jen_kelamin`,`alamat`, `username`, `password`) 
  values ( '".$_POST["telepon"]."', 
  '".$_POST["nama"]."',
  '".$_POST["jen_kelamin"]."',
  '".$_POST["alamat"]."',
  '".$_POST["username"]."',
  '".$_POST["password"]."' )";			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}

function sql_select_byid($id_member)
{
  global $kdb;
  $sql = " select * from member where id_member = ".$id_member; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update  `member` set `telepon` = '".$_POST["telepon"]."',`nama` = '".$_POST["nama"]."',
  `jen_kelamin` = '".$_POST["jen_kelamin"]."',`alamat` = '".$_POST["alamat"]."',`username` = '".$_POST["username"]."',
  `password` = '".$_POST["password"]."' where id_member = ".$_POST["id_memberx"];			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 		  
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `member` where id_member = ".$_POST["id_memberx"];		  
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