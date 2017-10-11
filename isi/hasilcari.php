
<!--                       I    N    I                     L   H    O                  -->
<!--                       I    N    I                     L   H    O                  -->
<!--                       I    N    I                     L   H    O                  -->
<!--                       I    N    I                     L   H    O                  -->


<div>   
    <div>

        <?php
        require_once('koneksi/koneksi.php');
        
        $kingZeyst = "";
 
if (isset($_POST['carika']))		
{
   $carika = $_POST['carika'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "nm_kota_asal like '%$carika%'";
   }
}
 
if (isset($_POST['carikt']))
{
   $carikt = $_POST['carikt'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "nm_kota_tujuan LIKE '%$carikt%'";
   }
   else
   {
        $kingZeyst .= " AND nm_kota_tujuan LIKE '%$carikt%'";
   }
}
 
if (isset($_POST['caritgl']))
{
   $caritgl = $_POST['caritgl'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "tgl_berangkat = '$caritgl'";
   }
   else
   {
        $kingZeyst .= " AND tgl_berangkat = '$caritgl'";
   }
}
        $query1 = "select * from jadwal, kendaraan, kota_asal, kota_tujuan where  
		kendaraan.id_mobil  = jadwal.id_mobil and 
		jadwal.id_kota_asal = kota_asal.id_kota_asal and  
		jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and ".$kingZeyst;
        
      
        $result=mysqli_query($kdb,$query1) or die(mysql_error());
        while($row=mysqli_fetch_object($result))
        
        ?>
        <!-- MULAI LAGI GW -->

        <?php
        require_once('koneksi/koneksi.php');
        
        $kingZeyst = "";
 
if (isset($_POST['carika']))		
{
   $carika = $_POST['carika'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "nm_kota_asal like '%$carika%'";
   }
}
 
if (isset($_POST['carikt']))
{
   $carikt = $_POST['carikt'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "nm_kota_tujuan LIKE '%$carikt%'";
   }
   else
   {
        $kingZeyst .= " AND nm_kota_tujuan LIKE '%$carikt%'";
   }
}
 
if (isset($_POST['caritgl']))
{
   $caritgl = $_POST['caritgl'];
   if (empty($kingZeyst))
   {
        $kingZeyst .= "tgl_berangkat = '$caritgl'";
   }
   else
   {
        $kingZeyst .= " AND tgl_berangkat = '$caritgl'";
   }
}

       $query1 = "select * from jadwal, kendaraan, kota_asal, kota_tujuan where  
	   kendaraan.id_mobil  =jadwal.id_mobil and 
	   jadwal.id_kota_asal = kota_asal.id_kota_asal and  
	   jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and ".$kingZeyst;
  ?>
  <div class="panel panel-default" style="color:black">
        <div class="panel-body">Pilih Tujuan Anda
        </div>
    </div>
    <!-- nyoba ajo -->
    <?php
  if (isset($_POST[0]))
    { 
     echo "Mohon Maaf Jadwal yang anda cari belum ditemukan, Silahkan coba lagi nanti";
    }else{
      ?>
    <!-- start -->
<?php  
        
        $result=mysqli_query($kdb,$query1) or die(mysql_error());
        $no=1;
        while($row=mysqli_fetch_object($result)){
        
        ?>   
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                
                <table class="table table-hover">
             <thead>
                 <tr>
                     <td>Jurusan</td>
                     <td>Tanggal/Jam Berangkat</td>
                     <td>Harga</td>
                     <td>Kursi tersedia</td>
                     <td>aksi</td>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td><h4><?php echo $row -> nm_kota_asal; ?> - <?php echo $row -> nm_kota_tujuan; ?></h4></td>
                     <td><?php echo $row -> tgl_berangkat; ?> | <?php echo $row -> jam_berangkat; ?></td>
                     <td>Rp. <?php echo $row -> harga; ?> ,00</td>
                      <td>
                                                 <?php 
                                                 $id_jadwal = $row -> id_jadwal; 
                                                 
                                $result2="SELECT count(nomor_kursi) from pesan where id_jadwal=$id_jadwal";
                                $sqli2 = mysqli_query($kdb,$result2);
                                $data2=mysqli_fetch_array($sqli2);
                                $banyakData2 = 5-$data2[0];
                                echo $banyakData2;
                                ?></td>
                     <td><a href="index.php?menu=9&var1=<?php echo $row -> id_jadwal; ?>" class="btn btn-primary">
                        Lihat Detail
                    </a></td>
                 </tr>
             </tbody>
         </table>
                
        </div>
            <?php } ?>

            </div> <?php }  ?>
            <!-- stop -->
        </div>
    </div>
</div>
</div>
