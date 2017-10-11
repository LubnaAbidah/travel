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

   

</head>

<body>

    <!-- Navigation -->
    
    <!-- Header -->
    <a name="about"></a>
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                        <div class="col-md-12">
                        <h2 class="indent-left margin-bot"><a class="grid1-desc">Masuk ke Team2Travel.net</a></h2>		
                        </div>
                        <div class="col-md-12">
                             
<?php  session_start();


mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("db_tiket2");


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
?>Silahkan masukkan email anda untuk mendapatkan konfirmasi password baru
            <form action="get_password.php?page=getpass" method="post">
          <div class="form-group has-feedback">
		  <div class="row">
		  <div class="col-xs-3">
            <input type="text" name="email" class="form-control" placeholder="Email" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		   </div>
		    <div class="col-xs-8">
			</div>
			</div>
          
          <div class="row">
           
            <div class="col-xs-1">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
            </div><!-- /.col -->
          </div>
        </form>
		        <a href="formlogin.php">Kembali Ke Login</a><br>
         
                            <!-- I  N  I    L  H  O   -->
                        </div> 

                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    
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


