<!DOCTYPE html>
<?php
$menu = !empty($_GET['menu']) ? $_GET['menu'] : "1";

//session_start();
//if(!isset($_SESSION['username'])){ header("location:login/"); }
//if(!isset($_SESSION['nama'])){ header("location:login/"); }

?>
<?php include "../isi/koneksi/koneksi.php";
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="index.php">Team2Travel</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
                <ul class="nav navbar-nav navbar-right">
                        <?php session_start();
                            if(isset($_SESSION['username'])){
                        ?>
                    <li>
                        <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Cara Memesan</a>
                    </li>
                            <!-- alert notification end-->
                            <!-- user login dropdown start-->
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                    <span class="username"> 
                                        <?php echo $_SESSION['username']; ?>
                                     </span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <div class="log-arrow-up"></div>
                                    <li class="eborder-top">
                                        <a href="profil.php"><i class="icon_profile"></i> Lihat Profil</a>
                                    </li>
                                    <li>
                                        <a href="edit.php"><i class="icon_mail_alt"></i> Ganti Password</a>
                                    </li>
                                    <li>
                                        <a href="../logout.php"><i class="icon_key_alt"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- user login dropdown end -->
                        </ul>
                       
                    </li>
                    <?php
                        }else{
                        ?>
					<li>
                        <a href="index.php">Cara Memesan</a>
                    </li>
                    <li>
                        <a href="../formlogin.php">Login</a>
                    </li>
                    <?php
                    }
                    ?>
					 

<!--
                    <li>
                        <a href="#about">Cara Memesan</a>
                    </li>
                    <li>
                        <a href="login/">Login</a>
                    </li>
-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                
            <div class="panel panel-default" style="color:black">
                <div class="panel-body"><a href="../index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a> Home</div>
            </div>
                                                <div class="panel panel-primary">
                                                    
                                                    <div class="panel-body" style="color:black;">
                                                         <div class="alert alert-success" role="alert">
                                                          <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                                          <span class="sr-only">Error:</span>
                                                          Cara Pemesanan
                                                        </div>
                                                    <p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Cari Tiket</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                         Mulai pencarian Anda dengan memasukkan kota asal, kota Tujuan dan tanggal.
                                                    </p>
                                                    <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Lihat dan Pilih Tiket</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Detail tiket (jurusan, jadwal, harga tiket, dll.) dapat Anda lihat di halaman hasil pencarian.<br>
														Atau dapat juga dilihat pada menu Service Jadwal.
                                                    </p>
													<p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Pilih dan pesan tiket</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Untuk dapat melakukan pemesanan Anda harus melakukan <b style="color:red;">Login</b> atau <b style="color:red;">Daftar Akun</b> jika belum memiliki Akun.
                                                    Anda juga dapat memilih <b style="color:red;">Lupa Password</b> jika Anda lupa password akun Anda, kemudian masukkan email Anda maka notifikasi password baru akan terkirim langsung ke email Anda.
													</p>
                                                    <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Isi data penumpang</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Setelah memilih Tiket Anda, isi data pemesan yang dapat dihubungi dan data penumpang yang berangkat.
                                                    </p>
                                                    <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Lakukan pembayaran</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Pembayaran dan konfirmasi pembayaran dilakukan setelah pemesan tiket, paling lambat 1 jam setelah dilakukan pemesanan.
														Jika tidak maka pemesanan akan otomatis terhapus.
                                                    </p>
													 <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Lakukan Konfirmasi Pembayaran</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                         Untuk melakukan konfirmasi pembayaran klik tombol <b style="color:red;">Belum Bayar</b>.<br>
														 Setelah melakukan konfirmasi pembayaran maka status pembayaran Anda otomatis menjadi <b style="color:blue;">Dalam Proses</b>
                                                    </p>
													 <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Cetak Tiket</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                         Cetak tiket dapat dilakukan setelah Kami mencocokkan data konfirmasi pemesanan Anda dan status pembayaran Anda <b style="color:green;">Lunas</b> 
                                                    </p>
													<div class="alert alert-danger" role="alert">
													 <p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Batal Pesan</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Pembatalan pemesanan hanya dapat dilakukan pada pemesanan yang belum dilakukan konfirmasi pembayaran.
                                                    </p>
													<p></p><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                                        <strong>Konfirmasi Pembayaran Tidak Sesuai / Palsu</strong><br>
                                                        <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span>
                                                        Apabila konfirmasi pembayaran yang dilakukan sudah Kami cek namun <b style="color:red;">tidak sesuai</b> maka pemesanan 
														Anda akan kami hapus dari daftar dan pemberitahuan dugaan pemalsuan konfirmasi pembayaran akan terkirim ke email Anda.
														
													</p>
													</div>
                                                    </div> 
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
