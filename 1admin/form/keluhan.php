<section class="content-header">
      <h1>
        Data Keluhan Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        
        <li class="active">Keluhan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Customer Services</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<?php
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_keluhan = !empty($_GET['id']) ? $_GET['id'] : " ";   
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
    case "edit"  :  curd_update($id_keluhan); break;  
    case "hapus"  :  curd_delete($id_keluhan); break;   
    default : curd_read(); break;
}
  mysqli_close($kdb);

function curd_read()
{ 
  $hasil = sql_select();
  $i=1;
  ?>
  <a href="index.php?form=17&a=tambah" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>CREATE</a><br>
  Jumlah Record :   
<?php 
 global $kdb;
 $per_hal=10;
 $jum  = "select count(id_keluhan) from keluhan";       
$result = mysqli_query($kdb,$jum);
$out = mysqli_fetch_array($result);
$banyakData = $out[0];
echo $out[0];

$limit = 5;
?>
  <table border="1px" class="table table-bordered">
  <tr>
  <td>No</td>
  <td>ID Keluhan</td>
  <td>Judul Keluhan</td>
  <td>Detail Keluhan</td>
  <td>ID Member</td>
  <td>Aksi</td>
  </tr>
  <?php
  while($baris = mysqli_fetch_array($hasil))
  {
  ?>
  <tr>
  <td><?php echo $i; ?></td>
  <td><?php echo $baris['id_keluhan']; ?></td>
  <td><?php echo $baris['j_keluhan']; ?></td>
  <td><?php echo $baris['d_keluhan']; ?></td>
  <td><?php echo $baris['nama']; ?></td>
  <td>
  <a href="index.php?form=17&a=edit&id=<?php echo $baris['id_keluhan']; ?>"class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>UPDATE</a>
  <a href="index.php?form=17&a=hapus&id=<?php echo $baris['id_keluhan']; ?>"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>DELETE</a>  
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
        <li><a href="index.php?form=17&page=<?php echo $i ?>"><?php echo $i ?></a></li>
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
<td width="200px">Judul Keluhan</td>
<td> <input type = "text" name="j_keluhan" id="j_keluhan" maxlength="50" size="50" value="<?php  echo trim ($row["j_keluhan"])?>"></td>
</tr>
<tr>
<td width="200px">Detail Keluhan</td>
<td> <input type = "text" name="d_keluhan" id="d_keluhan" maxlength="50" size="50" value="<?php  echo trim ($row["d_keluhan"])?>"></td>
</tr>
<tr>
<td width="200px">ID Member</td>
<td> <input type = "text" name="id_member" id="id_member" maxlength="8" size="8" value="<?php  echo trim ($row["id_member"])?>"></td>
</tr>
</table>
<?php  }?>
 
<?php 
function curd_create() 
{
?>
<h3>Penambahan Data Keluhan</h3><br>
<a href="index.php?form=17&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=17&a=reset" method="post">
<input type="hidden" name="sql" value="insert" >
<?php
$row = array(
    "j_keluhan" => "",
  "d_keluhan" => "",
  "id_member" => "" );
formeditor($row)
?>
<p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_update($id_keluhan) 
{
global $kdb;
$hasil2 = sql_select_byid($id_keluhan);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Pengubahan Data Keluhan</h3><br>
<a href="index.php?form=17&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=17&a=reset" method="post">
<input type="hidden" name="sql" value="update" class="btn btn-primary btn-sm">
<input type="hidden" name="id_keluhanx" value="<?php  echo $id_keluhan; ?>" >
<?php
formeditor($row)
?>
<p><input type="submit" name="action" value="Update" class="btn btn-primary btn-sm"></p>
</form>
<?php } ?>

<?php 
function curd_delete($id_keluhan) 
{
global $kdb;
$hasil2 = sql_select_byid($id_keluhan);
$row = mysqli_fetch_array($hasil2);
?>
<h3>Penghapusan Data Keluhan</h3><br>
<a href="index.php?form=17&a=reset" class="btn btn-danger btn-sm">Batal</a>
<br>
<form action="index.php?form=17&a=reset" method="post">
<input type="hidden" name="sql" value="delete" >
<input type="hidden" name="id_keluhanx" value="<?php  echo $id_keluhan; ?>" >
<h3> Anda yakin akan menghapus data keluhan : <?php echo $row['j_keluhan'];?> <br/> Dengan Detail: <?php echo $row['d_keluhan'];?> </h3>
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
  $sql = " select * from keluhan, member where keluhan.id_member=member.id_member limit $mulai_dari,$limit " ;
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}

function sql_insert()
{
  global $kdb;
  global $_POST; 
  echo $_POST["j_keluhan"];
  echo $_POST["d_keluhan"];
   echo $_POST["id_member"];
   if($_POST["j_keluhan"]== "" || empty($_POST["j_keluhan"])){ 
            echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
        }elseif  ($_POST["d_keluhan"]== "" || empty($_POST["d_keluhan"])){
      echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
    }elseif  ($_POST["id_member"]== "" || empty($_POST["id_member"])){
      echo " <div class='row'>
                    <div class='col-lg-12'>
                        <div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <i class='fa fa-info-circle'></i>  <strong>Penambahan Gagal</strong> Harap isi semua form ! 
                        </div>
                    </div>
                </div>";
    }else{
  $sql  = " insert into `keluhan` (`id_member`,`j_keluhan`,`d_keluhan`) 
  values (  '".$_POST["id_member"]."', 
            '".$_POST["j_keluhan"]."',
            '".$_POST["d_keluhan"]."' )";        
  mysqli_query($kdb, $sql) or die( mysql_error()); 
}
}

function sql_select_byid($id_keluhan)
{
  global $kdb;
  $sql = " select * from keluhan where id_keluhan = ".$id_keluhan; 
  $hasil2 = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil2;
}

function sql_update()
{
  global $kdb;
  global $_POST; 
 $sql  = " update  `keluhan` set `id_member` = '".$_POST["id_member"]."',`j_keluhan` = '".$_POST["j_keluhan"]."',
  `d_keluhan` = '".$_POST["d_keluhan"]."' where id_keluhan = ".$_POST["id_keluhanx"];       
  mysqli_query($kdb, $sql) or die( mysql_error());      
}

function sql_delete()
{
  global $kdb;
  global $_POST; 
  $sql  = " delete from `keluhan` where id_keluhan = ".$_POST["id_keluhanx"];     
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