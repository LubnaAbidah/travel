<!DOCTYPE html>
<?php include "isi/koneksi/koneksi.php";
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Team2Travel.net</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    
    <!-- Header -->
    <a name="about"></a>
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
<!--                    P I N D A H A N  -->
<!--
                    <div class="header-banner">
                        <div class="wrap">
                            <div class="banner">
                                <div class="indent">
-->
                        <div class="col-md-12">
                        <h2 class="indent-left margin-bot"><a class="grid1-desc">Masuk ke Team2Travel.net</a></h2>		
                        </div>
                        <div class="col-md-12">
                             
<?php  session_start();

error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("db_tiket2");
//include "isi/koneksi/koneksi.php";

if (isset($_POST['Login'])){
	//koneksi terpusat

	$username=$_POST['username'];
	$password=$_POST['password'];
	
	
		$query=mysql_query("select * from member where username='$username' and password='$password'");
		$cek=mysql_num_rows($query);
		$row=mysql_fetch_array($query);
		
		if($cek){
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			
			
			?><script language="javascript">document.location.href="index.php";</script><?php
			
		}else{
			?><script language="javascript">document.location.href="formlogin.php?status=Gagal Login";</script><?php
		}		
		

}else{
	unset($_POST['Login']);
}
?>
            <form name="Login" class="form-inline" action="formlogin.php" method="post">
                <br><br>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Enter username">
              </div><br><br>
              <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
              </div><br><br>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="checkbox"> Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary" name="Login" id="Login">Sign in</button>
              
              <a href="index.php?menu=1" class="btn btn-default" value="Back">Back</a>
			  <p>Anda Lupa Password? <a href="forget-pass.php">Lupa Password</a></p>
			  <p>Belum mempunayi akun <a href="formRegistrasi3.php">Buat akun</a></p>
                <h3><?php  if(isset($_GET['status'])){ echo "&laquo; ".$_GET['status']." &raquo;"; }?></h3>
            </form>
            
                            <!-- I  N  I    L  H  O   -->
                        </div> 

                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright text-muted small">Copyright &copy; Informatics Management 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>


