<?php
session_start();
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("db_tiket2");
$nmuser = $_POST['user'];
$psw = $_POST['password'];
$op = $_GET['op'];
if($op=="in"){
    $cek = mysql_query("SELECT * FROM operator_loket WHERE user='$nmuser' AND password='$psw' ");
    if(mysql_num_rows($cek)==1){
        $c = mysql_fetch_array($cek);
        $_SESSION['user'] = $c['user'];
        $_SESSION['nama'] = $c['nama'];
            header("location:index.php");
    }else{
         die("user / password salah <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['user']);
    header("location:index.php");
}
?>