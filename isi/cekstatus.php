

            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Data Status Bayar</div>
            </div>
                                                <div class="panel panel-primary" style="color:black;">
                                                    <table class="table table-hover">
                                                         <thead>
                                                             <tr>
                                                                 <td>ID Pesan</td>
                                                                 <td>Jurusan</td>
                                                                 <td>Berangkat</td>
                                                                 <td>Harga</td>
                                                                 <td colspan="2">Status</td>
                                                                 <td>Pembatalan</td>
                                                             </tr>
                                                         </thead>
                                                         <?php
                                                    $mem = $_SESSION['username'];
 //mencari banyak data yang ada dalam tabel

global $kdb;
$per_hal=8;
$result="select count(id_pesan) from member, pesan, jadwal, kota_asal, kota_tujuan where 
												   member.id_member = pesan.id_member 
												   
												   and member.username = '$mem' 
												   and pesan.id_jadwal = jadwal.id_jadwal 
												   and jadwal.id_kota_asal = kota_asal.id_kota_asal 
												   and  jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan";
												  
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_array($sqli);
$banyakData = $data[0];
$limit = 4;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$mulai_dari = $limit * ($page -1);                                                   
                                                   $query1 = "select * from member, pesan, jadwal, kota_asal, kota_tujuan where 
												   member.id_member = pesan.id_member 
												   
												   and member.username = '$mem' 
												   and pesan.id_jadwal = jadwal.id_jadwal 
												   and jadwal.id_kota_asal = kota_asal.id_kota_asal 
												   and  jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan 
												   limit $mulai_dari,$limit";

                                                        $result=mysqli_query($kdb,$query1) or die(mysql_error());
                                                        
                                                        while($row=mysqli_fetch_object($result))
                                                           { 
                                                            $id_pesan = $row -> id_pesan;
                               
                                                    ?>
                                                            <tbody>
                                                                
                                                                 <tr>
                                                                     <td><span><?php echo $row -> id_pesan; ?></span></td>
                                                                     <td><span><?php echo $row -> nm_kota_asal; ?> - <?php echo $row -> nm_kota_tujuan; ?></span></td>
                                                                     <td><?php echo $row -> tgl_berangkat; ?> | <?php echo $row -> jam_berangkat; ?></td>
                                                                     <td>Rp. <?php echo $row -> harga; ?> ,00</td>
                                                                     <td><?php 
                                                                                if ($row->status=="Belum Bayar") { 
                                                                                  echo "<td align='center'><a href='index.php?menu=14&idp=$id_pesan' class=' btn btn-danger'> $row->status</a>";
                                                                                  }
                                                                                elseif ($row->status=="Dalam Proses" ) { 
                                                                                  echo "<td align='center'><a href='#' class='btn btn-primary disabled'> $row->status</a>";
                                                                                  }
                                                                                  else {
                                                                                   echo "<td align='center'><a href='#' class='disabled btn btn-success'> $row->status</a>";
                                                                                  } ?>
                                                                     </td>
                                                                     <td>
																	<?php  if ($row->status=="Belum Bayar") { 
                                                                                  echo"<a href='index.php?menu=11&idp=$id_pesan' class=' btn btn-warning'>Batal</a>";
                                                                                  }?>
																	
                                                                         </td>
                                                                 </tr>
                                                             </tbody>
                                                         <?php } ?>
                                                         </table>
														 <div class="well well-sm">Pembatalan pemesanan hanya dapat dilakukan pada pemesanan yang belum dilakukan konfirmasi pembayaran<br>
														 Untuk melakukan konfirmasi pembayaran klik tombol <b style="color:red;">Belum Bayar</b></div>
														
                                                         <!--membuat pagination-->
 <div class="pagination">	
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?menu=2&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
												   } 
			?>					
		</div>
                                                </div>
												</div>
                                    