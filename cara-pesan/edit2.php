
<?php
error_reporting(0);
session_start();
$password = $_POST['password'];
$pass_baru = $_POST['pass_baru'];
$username = $_SESSION['username'];
include "../isi/koneksi/koneksi.php";
	$query = "SELECT * FROM member where username='$username'";       
$result = mysqli_query($kdb,$query);
 while($tampil = mysqli_fetch_array($result)){
	
	 
if(empty($_POST['pass_baru']) OR empty($_POST['password'])){
  echo "<script>alert('Anda harus mengisikan semua data pada form Ganti Password.');
            	window.location='javascript:history.go(-1)'
       		</script>";
} 
elseif($password==$tampil['password']){
  $updatepassword = "update member set password = '$pass_baru' where username = '$username'";
$updatequery = mysqli_query($kdb,$updatepassword)or die(mysql_error());
 echo "<script>alert('Password telah diganti');
            	window.location='javascript:history.go(-1)'
       		</script>";
  }else{
	echo"
        	<script>alert('Password lama anda tidak sesuai, mohon ulangi lagi.');
            	window.location='javascript:history.go(-1)'
       		</script>
    	";
  }
 }
                                                                     

?>