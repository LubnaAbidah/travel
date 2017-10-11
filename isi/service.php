
<?
$a = !empty($_GET['a']) ? $_GET['a'] : "reset";
$id_jadwal = !empty($_GET['id']) ? $_GET['id'] : " ";   

$a = @$_GET["a"];
$sql = @$_POST["sql"];

switch ($a) {
    case "reset" :  curd_read();   break;
	}
  mysqli_close($kdb);

function curd_read()
{ 
?>

    <div class="panel panel-default" style="color:black">
        <div class="panel-body">Service</div>
    </div>                             
 <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                          
															 <?php
																$hasil = sql_select();
															  $i=1;
															  echo "Jumlah Jadwal :";
																global $kdb;
																
																 $per_hal=4;
 																$result  = "select count(id_jadwal) from jadwal";		
																$sqli = mysqli_query($kdb,$result);
																$data=mysqli_fetch_array($sqli);
																$banyakData = $data[0];
																echo $data[0];

																$limit = 2;
																

															  while($baris = mysqli_fetch_array($hasil))
																{
																	?>
														<div class="panel panel-default">
                                                            
                                                            <div class="active panel-heading" role="tab" id="heading<?php echo $baris['id_jadwal']; ?>">
                                                              <h4 class="panel-title">
                                                                <a role="button" name="myPanel" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $baris['id_jadwal']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $baris['id_jadwal']; ?>">
                                                                 <b><?php echo $baris['nm_kota_asal']; ?> - </b><b><?php echo $baris['nm_kota_tujuan']; ?></b><br>
																</a>
                                                              </h4>
                                                            </div>
                                                            <div id="collapse<?php echo $baris['id_jadwal']; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $baris['id_jadwal']; ?>">
                                                              <div class="panel-body">
                                                                  
							                                   <table class="table" >
													             <thead>
													                 <tr style="background:gray;">
                                                                            <td>Berangkat</td>
													                         <td>Harga  </td>
													                         <td> Mobil </td>
													                         <td>Warna</td>
													                         <td>Nomor polisi </td>
													                         <td>Kursi Tersedia </td>
                                                                             <td></td>
													                 </tr>
													             </thead>
													             <tbody>
													                 <tr style="width:400px;">
													                    
													                     
													                        
													                        <td><?php echo $baris['tgl_berangkat']; ?> | <?php echo $baris['jam_berangkat']; ?></td>
													                        <td>Rp.<?php echo $baris['harga']; ?> ,00</td>
													                        <td><?php echo $baris['jenis_mobil']; ?></td>
													                        <td><?php echo $baris['warna_mobil']; ?></td>
													                        <td><?php echo $baris['nomor_polisi']; ?></td>
													                         <td>
													                       <?php 
													                       $id_jadwal = $baris['id_jadwal']; 
													                       
																$result2="SELECT count(nomor_kursi) from pesan where id_jadwal=$id_jadwal";
																$sqli2 = mysqli_query($kdb,$result2);
																$data2=mysqli_fetch_array($sqli2);
																$banyakData2 = 5-$data2[0];
																echo $banyakData2;
																?></td>
													                   <td>                                        	
																		<?php 
																		$id_jadwal =  $baris['id_jadwal'];
												                            if(isset($_SESSION['username']) && $banyakData2>0){
												                        echo "<a href='index.php?menu=8&idp=$id_jadwal' class='btn btn-primary btn-sm' value='Pesan'>Pesan</a>"; 
												             }elseif($banyakData2==0){
												             echo "<a href='index.php?menu=8&idp=$id_jadwal' class='btn btn-primary btn-sm disabled' value='Pesan'>Kurisi Penuh</a>
												             ";
												         }
															 else{
												            echo "<a href='formlogin.php' class='btn btn-primary btn-sm' value='Pesan'>Pesan</a>
												            ";
												         }

												           ?> </td> 
                                                                          </table> 
															</div>
                                                            </div>
                                                            </div> 
															<?php
															$i++; 															
															}
															?>
 <ul class="pagination">			
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?menu=3&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
			}
			?>						
		</ul>
   <?php
  mysqli_free_result($hasil);

	
															  ?>

                                                          </div>
                                                          
                                                         
                                                          </div>
                                                        </div>
                                                   
<?php function sql_select()
{
    global $kdb;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$limit = 2;
$mulai_dari = $limit * ($page -1);
  $sql =  "select * from jadwal, kendaraan, kota_asal, kota_tujuan where 
  jadwal.id_kota_asal = kota_asal.id_kota_asal and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and 
  jadwal.id_mobil = kendaraan.id_mobil limit $mulai_dari,$limit " ; 
  $hasil = mysqli_query($kdb, $sql) or die(mysql_error());
  return $hasil;
}
?>
             
     
     
     <?php 
    if (isset($_POST['id_jadwal'])){
         ?>
     <script>
    $('#myPanel').refresh(function (e) {
  e.preventDefault()
  $(this).tab('show')

     </script>
     <?php } else {?>
      <script>
     $(this).tab('hide')
        </script>
<?php } ?>
     





