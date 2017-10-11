<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
			  <?php 
 global $kdb;
$result="SELECT count(*) as total from pesan where status='Lunas'";
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_assoc($sqli);
echo $data['total'];
?></h3>

              <p>Pemesanan Lunas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?form=2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
			   <?php 
 global $kdb;
$result2="SELECT count(*) as total from pesan where status='Belum Bayar'";
$sqli2 = mysqli_query($kdb,$result2);
$data2=mysqli_fetch_assoc($sqli2);
echo $data2['total'];
?></h3>

              <p>Pemesanan Belum Bayar</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?form=3" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
<?php 
 global $kdb;
$result2="SELECT count(*) as total from pesan where status='Dalam Proses'";
$sqli2 = mysqli_query($kdb,$result2);
$data2=mysqli_fetch_assoc($sqli2);
echo $data2['total'];
?></h3>

              <p>Dalam Proses</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="index.php?form=7" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
			  <?php 
 global $kdb;
$result2="SELECT count(*) as total from jadwal";
$sqli2 = mysqli_query($kdb,$result2);
$data2=mysqli_fetch_assoc($sqli2);
echo $data2['total'];
?></h3>

              <p>Jadwal Keberangkatan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
           <a href="index.php?form=6" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			
          </div>
        </div>
        <!-- ./col -->
      </div>
         
          
            
        
          <!-- /.box -->

        </section>
		
