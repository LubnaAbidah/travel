<!DOCTYPE html>
<?php
$form = !empty($_GET['form']) ? $_GET['form'] : "1";

session_start();
if(!isset($_SESSION['email'])){ header("location:login.php"); }
if(!isset($_SESSION['nama_lengkap'])){ header("location:login.php"); }

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Team2Travel</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.php" class="logo">Team2<span class="lite">Travel</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username"> 
                                <?php echo "".$_SESSION['nama_lengkap'].''; ?>
                             </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="index.php?form=9"><i class="icon_profile"></i> Lihat Profil</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> Ganti Password</a>
                            </li>
                            <li>
                                <a href="sistem.php?op=out"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li <?php if($form==1) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=1">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>DAFTAR KOTA</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li <?php if($form==2) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=2">Kota Keberangkatan</a></li>                          
                          <li <?php if($form==3) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=3">Kota Tujuan</a></li>
                      </ul>
                  </li>       
                  <li <?php if($form==4) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=4">
                          <i class="icon_house_alt"></i>
                          <span>Pemesanan</span>
                      </a>
                  </li>
                  <li <?php if($form==5) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=5">
                          <i class="icon_house_alt"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>
                  <li <?php if($form==6) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=6">
                          <i class="icon_house_alt"></i>
                          <span>Kendaraan</span>
                      </a>
                  </li>         
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Pengguna</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li <?php if($form==7) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=7">Member</a></li>
                          <li <?php if($form==8) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=8">Admin</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              
              <?php	
                switch($form)
                {
                case('1'): include_once('./form/dashboard.php'); break;	
                case('2'): include_once('./form/tbkota-asal.php'); break;		
                case('3'): include_once('./form/tbkota-tujuan.php'); break;	
                case('4'): include_once('./form/tbpemesanan.php'); break; 
                case('5'): include_once('./form/tbjadwal.php'); break;	
                case('6'): include_once('./form/tbmobil.php'); break;		
                case('7'): include_once('./form/tbmember.php'); break;	
                case('8'): include_once('./form/tbadmin.php'); break; 
                case('9'): include_once('./form/profil.php'); break; 
                default:   include_once('./form/dashboard.php'); break;
                }			
              ?>
              
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
