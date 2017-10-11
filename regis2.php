
<?php

  function koneksidatabase()
{
    include('isi/koneksi/koneksi.php');
	return $kdb;
}  
$kdb = koneksidatabase();  
if(isset($_POST['register_btn']))
{
  
 $name = $_POST['nama'];
 $alamat = $_POST['alamat'];
 $telp = $_POST['telepon'];
 $sex = $_POST['jen_kelamin'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $repassword = $_POST['repassword'];
 $chapta = $_POST["nilaiCaptcha"];

 // Proses Pengecekan Jika terdapat username yang sama   
$result = "SELECT * FROM member WHERE username='$username'";
$check_user =mysqli_query($kdb,$result) or die(mysql_error());
$fetch_user = mysqli_num_rows($check_user);

// Proses pengecekan jika terdapat nama yang sama
$result1 = "SELECT * FROM member WHERE nama='$name'";
$check_nama =mysqli_query($kdb,$result1) or die(mysql_error());
$fetch_email = mysqli_num_rows($check_nama);
  session_start(); 
if( empty($name) || empty($alamat) || empty($telp) || empty($sex) || empty($username) || empty($password) || empty($repassword) || empty($chapta))
{
/*echo "<script>alert('Semua field harus terisi'); window.location = 'formRegistrasi3.php'</script>";
    
} elseif (!filter_var($name,FILTER_VALIDATE_EMAIL))
   
{ */  
echo "<script>alert('Semua field harus terisi'); window.location = 'formRegistrasi3.php'</script>";
}elseif($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
 echo "<script>alert('Chapta tidak sesuai'); window.location = 'formRegistrasi3.php'</script>";
}elseif ($password != $repassword)
   
{   
  echo "<script>alert('Password yang anda masukkan tidak sama, mohon koreksi kembali.'); window.location = 'formRegistrasi3.php'</script>";  
} elseif ($fetch_user == 1)
   
{
echo "<script>alert('Username yang anda kebetulan sudah ada, mohon mencoba yang lainnya!'); window.location = 'formRegistrasi3.php'</script>";    
} elseif ($fetch_email == 1)
   
{
    
echo "<script>alert('Email yang anda masukkan saat ini sudah terdaftar pada sistem kami, mohon melanjutkannya.'); window.location = 'formRegistrasi3.php'</script>";    
} else { 

 $sql  = " insert into `member` (`telepon`,`nama`,`jen_kelamin`,`alamat`, `username`, `password`) 
  values ( '".$_POST["telepon"]."', 
  '".$_POST["nama"]."',
  '".$_POST["jen_kelamin"]."',
  '".$_POST["alamat"]."',
  '".$_POST["username"]."',
  '".$_POST["password"]."' )";			  
  mysqli_query($kdb, $sql) or die( mysql_error()); 

if ($sql) { echo 
"<script>alert('Terima kasih, akun anda telah berhasil dibuat. Selamat Datang! silahkan login'); window.location = 'formlogin.php'</script>";
 } else { echo "Terjadi masalah pada sistem kami,  mohon mengulangi beberapa saat lagi.<a href='formRegistrasi3.php'>Kembali</a>";  }

} }


?>