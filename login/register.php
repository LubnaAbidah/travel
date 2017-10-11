
			
<?php  
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("db_travel");
//include "isi/koneksi/koneksi.php";

if (isset($_POST['register'])){
	//koneksi terpusat
	
		
  global $kdb;
  global $_POST;
  $sql  = " insert into `member` ( `nama`, `alamat`, `telepon`, `jen_kelamin`, `username`, `password` ) values ( '".$_POST["nama"]."', '".$_POST["alamat"]."', '".$_POST["telepon"]."', '".$_POST["jen_kelamin"]."', '".$_POST["username"]."', '".$_POST["password"]."', )";
  mysqli_query($kdb, $sql) or die( mysql_error());
		
?>
<form action="register" method="post">                
<div class="form-group">
  <label for="npm" class="col-md-2">Nama</label>
  <div class="col-md-6">
    <input type="text" name="nama" id="nama" maxlength="25" size="25" value="<?php  echo trim($row["nama"]) ?>" class="form-control">
  </div>
</div>
<div class="form-group">
  <label for="nama" class="col-md-2">Alamat</label>
  <div class="col-md-6">
    <input type="text" name="alamat" id="alamat" maxlength="25" size="25" value="<?php  echo trim($row["alamat"]) ?>" class="form-control">
  </div>
</div>
<div class="form-group">
  <label for="nama" class="col-md-2">Telepon</label>
  <div class="col-md-6">
    <input type="number" name="telepon" id="telepon" maxlength="25" size="25" value="<?php  echo trim($row["telepon"]) ?>" class="form-control">
  </div>
</div>
<div class="form-group">
  <label for="sex" class="col-md-2">Jenis Kelamin</label>
  <div class="col-md-6">
    <?php  $sex = str_replace('"', '"', trim($row["jen_kelamin"])); ?>
    <input type="radio" name="jen_kelamin" id="sex" value="P" <?php  if($sex=='P' || $sex=='') {echo "checked=\"checked\""; } else {echo ""; }  ?> />
    <label>Perempuan</label><br>
    <input type="radio" name="jen_kelamin" id="jen_kelamin" value="L" <?php  if($sex=='L') {echo "checked=\"checked\""; } else {echo ""; } ?> />
    <label>Laki-Laki</label>
  </div>
</div>
<div class="form-group">
  <label for="tmp_lahir" class="col-md-2">username</label>
  <div class="col-md-6">
    <input type="text" name="username" id="username" maxlength="25" size="25" value="<?php  echo trim($row["username"]) ?>" class="form-control">
  </div>
</div>
<div class="form-group">
  <label for="tgl_lahir" class="col-md-2">password</label>
  <div class="col-md-6">
    <input type="password" name="password" id="password" maxlength="25" size="25" value="<?php  echo trim($row["password"]) ?>" class="form-control" placeholder="yyyy/mm/dd">
  </div>
</div>
				
				<input type="hidden" name="sql" value="daftar" >
    <?php }?>
			</form>
