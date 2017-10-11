<?php include "include/header.php"?>
<?php 
$form = !empty($_GET['form']) ? $_GET['form'] : "1";


if(!isset($_SESSION['email'])){ header("location:login.php"); }
if(!isset($_SESSION['nama_lengkap'])){ header("location:login.php"); }


?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/fav.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo "".$_SESSION['nama_lengkap'].''; ?> - Admin</p>
         <i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
   
 
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li <?php if($form==1) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=1">
                          <i class="fa fa-circle-o"></i> 
                          <span>Dashboard</span>
                      </a>
                  </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Daftar Kota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if($form==2) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=2"><i class="fa fa-circle-o"></i> Kota Keberangkatan</a></li>                          
            <li <?php if($form==3) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=3"><i class="fa fa-circle-o"></i> Kota Tujuan</a></li>
          </ul>
        </li>
		  <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Pemesanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li <?php// if($form==4) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=4"><i class="fa fa-circle-o"></i> Data Pemesanan</a></li>  -->                   
            <li <?php if($form==12) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=12"><i class="fa fa-circle-o"></i> Pemesanan Lunas</a></li>
			<li <?php if($form==14) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=14"><i class="fa fa-circle-o"></i> Pemesanan Dalam Proses</a></li> 
			<li <?php if($form==13) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=13"><i class="fa fa-circle-o"></i> Pemesanan Baru<small class="label pull-right bg-green">Baru 
			<?php $result="SELECT count(*) as total from pesan where status='Belum Bayar'";
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_assoc($sqli);
echo $data['total'];?></small></a></li>
          </ul>
        </li>
		 <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Konfirmasi Pemesanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">                         
            <li <?php if($form==11) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=11"><i class="fa fa-circle-o"></i> Konfirmasi Pesan Lunas</a></li>
			<li <?php if($form==16) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=16"><i class="fa fa-circle-o"></i> Konfirmasi Pesan <small class="label pull-right bg-green">Baru 
			 <?php global $kdb;
$result="SELECT count(*) as total from konfirmasi_pesan, pesan where konfirmasi_pesan.id_pesan=pesan.id_pesan and status='Dalam Proses'";
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_assoc($sqli);
echo $data['total']; ?></small></a></li>
<li <?php if($form==15) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=15"><i class="fa fa-circle-o"></i>Konfirmasi Belum Bayar</p></a></li>
          </ul>
        </li>
		 <li <?php if($form==5) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=5">
                          <i class="fa fa-laptop"></i>
                          <span>Jadwal</span>
                      </a>
                  </li>
        <li <?php if($form==6) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=6">
                          <i class="fa fa-car"></i>
                          <span>Kendaraan</span>
                      </a>
        </li> 
        <li <?php if($form==17) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=17">
                          <i class="fa fa-envelope"></i>
                          <span>Keluhan Pelanggan<small class="label pull-right bg-green">Baru 
       <?php global $kdb;
$result="SELECT count(*) as total from keluhan, member where keluhan.id_member=member.id_member";
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_assoc($sqli);
echo $data['total']; ?></small></a></span>
                      </a>
        </li>    
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li <?php if($form==7) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=7"><i class="fa fa-circle-o"></i>Member</a></li>
           <li <?php if($form==10) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=10"><i class="fa fa-circle-o"></i>Admin</a></li>
          </ul>
        </li>
		 <li <?php if($form==9) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=9">
                          <i class="fa fa-file"></i>
                          <span>Laporan</span>
                      </a>
        </li> 
		
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                case('9'): include_once('./form/laporan.php'); break; 
				case('10'): include_once('./form/password.php'); break;
				case('11'): include_once('./form/tbkonfirmasipesan.php'); break;
				case('12'): include_once('./form/tbpemesananlunas.php'); break; 
				case('13'): include_once('./form/tbpemesananbelumbayar.php'); break; 
				case('14'): include_once('./form/tbpemesanandalamproses.php'); break;
				case('15'): include_once('./form/tbkonfirmasipesanbaru.php'); break;
				case('16'): include_once('./form/tbkonfirmasipesandalamproses.php'); break;	
                case('17'): include_once('./form/keluhan.php'); break; 			
                default:   include_once('./form/dashboard.php'); break;
                }			
              ?>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "include/footer.php"?>