<!DOCTYPE html>
<?php include "isi/koneksi/koneksi.php";
//include('regis2.php');
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
                        <h2 class="indent-left margin-bot"><a class="grid1-desc">Register ke Team2Travel.net</a></h2>		
                        </div>
                        <div class="col-md-12">
                             



<h4></h4>	
<div class="col-md-6">						 
<form name="register_btn" action="regis2.php" method="POST"> 
               
<div class="form-group">
  <label class="sr-only" for="exampleInputNama3">Nama Email</label>
  
    <input type="text" name="nama" id="exampleInputNama3" class="form-control" placeholder="masukkan email">

</div>
<div class="form-group">
   <label class="sr-only" for="exampleInputAlamat3">Alamat</label>

    <input type="text" name="alamat" id="exampleInputAlamat3" class="form-control" placeholder="masukkan alamat">

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputTelepon3">Telepon</label>

    <input type="number" name="telepon" id="exampleInputTelepon3"  class="form-control" placeholder="masukkan no telepon">

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputSex3">Sex</label>

    <select id="exampleInputSex3" name="jen_kelamin" class="form-control">
	<option value="L" >Laki-Laki</option>
	<option value="P">Perempuan</option>
	</select>

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputUsername3">Username</label>

    <input type="text" name="username" id="exampleInputUsername3"  class="form-control" placeholder="masukkan username">

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputPassword3">Password</label>

    <input type="password" name="password" id="exampleInputPassword3" class="form-control" placeholder="masukkan password">

</div>
<div class="form-group">
  <label class="sr-only" for="exampleInputREpassword3">Repassword</label>

    <input type="password" name="repassword" id="exampleInputREpassword3" class="form-control" placeholder="masukkan ulang password">

</div>
                     
                    <div class="form-group">
                    <label> Captcha</label>                
                   <img src="captcha.php" alt="gambar" /> </div>

<div class="form-group">
  <label class="sr-only" for="exampleInputREpassword3">Isikan captcha</label>

    <input  name="nilaiCaptcha" value="" class="form-control" placeholder="masukkan chapta">

</div>

				
			
              <input type="submit" class="btn btn-success" name="register_btn" value="Sign up">
			   <a href="index.php?menu=1" class="btn btn-default" value="Back">Back</a>
			  <p>sudah mempunayi akun <a href="formlogin.php">Login</a></p>
			 
			  </div>

				
            </form>
			<div class="col-md-6">
            </div>
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


