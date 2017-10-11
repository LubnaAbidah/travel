<?php include "include/header.php"?>
<?php 
$form = !empty($_GET['form']) ? $_GET['form'] : "1";


if(!isset($_SESSION['user'])){ header("location:login.php"); }
if(!isset($_SESSION['nama'])){ header("location:login.php"); }


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
          <p> <?php echo "".$_SESSION['nama'].''; ?> - Operator</p>
         <i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
 
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li <?php if($form==1) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=1">
                          <i class="fa fa-circle-o"></i> 
                          <span>Dashboard</span>
                      </a>
                  </li>
		 <li <?php if($form==2) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=2">
                          <i class="fa fa-laptop"></i>
                          <span>Pemesanan Lunas</span>
                      </a>
                  </li> 
		 <li <?php if($form==7) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=7">
                          <i class="fa fa-laptop"></i>
                          <span>Pemesanan Dalam Proses</span>
                      </a>
                  </li> 
		<li <?php if($form==3) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=3">
                          <i class="fa fa-laptop"></i>
                          <span>Pemesanan Belum Bayar</span>
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
           <li <?php if($form==4) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=4"><i class="fa fa-circle-o"></i>Member</a></li>
           <li <?php if($form==5) { echo 'class="active"'; } else { echo 'class=""'; } ?>><a class="" href="index.php?form=5"><i class="fa fa-circle-o"></i>Operator</a></li>
          </ul>
        </li>
		<li <?php if($form==6) { echo 'class="active"'; } else { echo 'class=""'; } ?> >
                      <a class="" href="index.php?form=6">
                          <i class="fa fa-list"></i>
                          <span>Jadwal</span>
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
                case('1'): include_once('./form/dashboardx.php'); break;	
                case('2'): include_once('./form/tbpemesananx.php'); break;	
				case('3'): include_once('./form/tbpemesanan.php'); break;
                case('4'): include_once('./form/tbmemberx.php'); break;	
				case('5'): include_once('./form/passwordx.php'); break;
				case('6'): include_once('./form/tbjadwal.php'); break;
				case('7'): include_once('./form/tbpemesananxx.php'); break;
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