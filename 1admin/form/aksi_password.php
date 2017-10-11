<?php

error_reporting(0);
session_start();

$password = $_POST['password'];
$pass_baru = $_POST['pass_baru'];
$email = $_SESSION['email'];
include "../../isi/koneksi/koneksi.php";
	$query = "SELECT * FROM admin where email = '$email'";       
$result = mysqli_query($kdb,$query);
 while($tampil = mysqli_fetch_array($result)){
	
	 
if(empty($_POST['pass_baru']) OR empty($_POST['password'])){
  echo "<script>alert('Anda harus mengisikan semua data pada form Ganti Password.');
            	window.location='javascript:history.go(-1)'
       		</script>";
} 
elseif($password==$tampil['password']){
$updatepassword = "update admin set password = '$pass_baru' where email = '$email'";
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

