<!DOCTYPE html>
<?php
$menu = !empty($_GET['menu']) ? $_GET['menu'] : "1";


?>
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

    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


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
                    <li>
                        <a href="cara-pesan/">Cara Memesan</a>
                    </li>
                        <?php session_start();
                            if(isset($_SESSION['username'])){
                        ?>
                    <li>
                        <ul class="nav navbar-nav navbar-right">
                    
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
                                        <a href="cara-pesan/profil.php"><i class="icon_profile"></i> Lihat Profil</a>
                                    </li>
                                    <li>
                                        <a href="cara-pesan/edit.php"><i class="icon_mail_alt"></i> Ganti Password</a>
                                    </li>
                                    <li>
                                        <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
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
                        <a href="formlogin.php">Login</a>
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



    <a name="about"></a>
    <div class="banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">

                        <div class="col-md-12">
                        <h2 class="indent-left margin-bot"><a href="index.php" class="grid1-desc">Pemesanan Tiket Travel Online</a></h2>		
                        </div>
                        <div class="col-md-4">
                            <div class="banner-left">
                                <div class="ze-white">
                                <div class="bs-sidebar" role="complementary">
                                        <ul class="nav bs-sidenav"> 
											<?php
												if(isset($_SESSION['username'])){
											?>
													<li <?php if($menu==1) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
														<div class="#"><a href="index.php?menu=1">
															<div class="grid1-img">
																<img src="images/glass.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4 >Pemesanan Tiket</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
													<li <?php if($menu==2) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
													   <div class="#"><a href="index.php?menu=2">
															<div class="grid1-img">
																<img src="images/flight.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4>Cek Status Bayar</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
													<li <?php if($menu==3) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
														<div class="#"><a href="index.php?menu=3">
															<div class="grid1-img">
																<img src="images/group.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4>Service Jadwal</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
													<li <?php if($menu==4) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
														<div class="#" ><a href="index.php?menu=4">
															<div class="grid1-img">
																<img href="cetak.php" src="images/key.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4>Cetak Pemesanan</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
                                                    <li <?php if($menu==19) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
                                                        <div class="#" ><a href="index.php?menu=19">
                                                            <div class="grid1-img">
                                                                <img src="images/hand.png" alt="">
                                                            </div>
                                                            <div class="grid1-desc">
                                                                <h4>Customer Services</h4>
                                                            </div>
                                                            <div class="clear"></div></a>
                                                        <div class="con-text"></div>
                                                        </div>
                                                    </li>
												<?php } else {?>
												    <li <?php if($menu==1) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
														<div class="#"><a href="index.php?menu=1">
															<div class="grid1-img">
																<img src="images/glass.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4 >Pemesanan Tiket</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
														<li <?php if($menu==3) { echo 'class="active"'; } else { echo 'class=""'; } ?>>
														<div class="#"><a href="index.php?menu=3">
															<div class="grid1-img">
																<img src="images/group.png" alt="">
															</div>
															<div class="grid1-desc">
																<h4>Service Jadwal</h4>
															</div>
															<div class="clear"></div></a>
														<div class="con-text"></div>
														</div>
													</li>
												<?php }?>
                                        </ul>
                                    </div>
                            </div>
                            </div>
                        </div>
                        
                        <div class="col-md-8" role="main">
                                <div class="clearfix"></div>
                    <!-- I  N  I    L  H  O   -->
                           
                                        <?php	
                                        switch($menu)
                                        {   
                                        case('1'): include_once('./isi/pemesanan.php'); break;	
                                        case('2'): include_once('./isi/cekstatus.php'); break;		
                                        case('3'): include_once('./isi/service.php'); break;	
                                        case('4'): include_once('./isi/cetakpesan.php'); break;
                                        case('5'): include_once('./isi/hasilcari.php'); break;	
                                        case('6'): include_once('./isi/batalpesan.php'); break;		
                                        case('7'): include_once('./isi/dtailcetakpesan.php'); break;	
                                        case('8'): include_once('./isi/formpesan.php'); break;
                                        case('9'): include_once('./isi/detailcari.php'); break;	
                                        case('10'): include_once('./isi/konfirmasipesan.php'); break;
                                        case('11'): include_once('./isi/konfirmasibatalpesan.php'); break;
                                        case('12'): include_once('./isi/konfirpesan.php'); break;
                                        case('13'): include_once('./isi/pesanlogin.php'); break;
                                        case('14'): include_once('./isi/transfer.php'); break;
                                        case('15'): include_once('./isi/servicekonf.php'); break;
                                        case('16'): include_once('./cara-pesan/pesanreg.php'); break;
                                        case('17'): include_once('./isi/batalpesan.php'); break;
                                        case('18'): include_once('./isi/transfer_act.php'); break;
                                        case('19'): include_once('./isi/cserv.php'); break;
                                        case('20'): include_once('./isi/kirimkeluhan.php'); break;
                                        default:   include_once('./isi/pemesanan.php'); break;
                                        }			
                                        ?>
                             

                        </div> 

                </div>
            </div>

        </div>


    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p class="copyright text-muted small">Copyright &copy; <a href="author/">Informatics Management 2016</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/jquery.js"></script>


    <script src="js/bootstrap.min.js"></script>
     <!--  JavaScript loading konfirmasi-->
    <script>
                            $('.btn').on('click', function(){
                            var $this = $(this);
                            $this.button('loading');
                            setTimeout(function(){
                                       $this.button('reset');
                                       }, 8000);
                            });
      </script>
     <script>
                            $("submit").on('click', function(){
                            var $btn = $(this);
                            $btn.button('loading');
                            setTimeout(function(){
                                       $btn.button('reset');
                                       }, 8000);
                            });
                            </script>

</body>

</html>
