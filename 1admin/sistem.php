<?php
session_start();
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("db_tiket2");
$nmuser = $_POST['email'];
$psw = $_POST['password'];
$op = $_GET['op'];
if($op=="in"){
    $cek = mysql_query("SELECT * FROM admin WHERE email='$nmuser' AND password='$psw' ");
    if(mysql_num_rows($cek)==1){
        $c = mysql_fetch_array($cek);
        $_SESSION['email'] = $c['email'];
        $_SESSION['nama_lengkap'] = $c['nama_lengkap'];
            header("location:index.php");
    }else{
         die("email / password salah <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['email']);
    header("location:index.php");
}
?>