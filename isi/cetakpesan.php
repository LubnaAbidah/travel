       <div class="panel panel-default" style="color:black">
                    <div class="panel-body">Cetak Pemesanan Yang Lunas</div>
                </div>
                          <div class="panel panel-primary">
                              <div class="panel-body" style="color:black;">
                                   <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                       <div class="btn-group btn-group-md " role="group" style="width:200px;" >
                                       <?php
                                            $zet = $_SESSION['username'];
                                            //mencari banyak data yang ada dalam tabel

global $kdb;
$per_hal=4;
$result="select count(id_pesan)  from member, pesan 
									   where member.id_member = pesan.id_member 
									    and member.username = '$zet'";
												  
$sqli = mysqli_query($kdb,$result);
$data=mysqli_fetch_array($sqli);
$banyakData = $data[0];
$limit = 5;
  $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$mulai_dari = $limit * ($page -1);
                                       $querya = "select * from member, pesan 
									   where member.id_member = pesan.id_member 
									    and member.username = '$zet' limit $mulai_dari,$limit ";

                                            $result=mysqli_query($kdb,$querya) or die(mysql_error());
                                            while($row=mysqli_fetch_object($result))
                                               {
												   if ($row->status=="Belum Bayar") { 
																  echo "Anda belum melakukan pembayaran pada  id pesan $row->id_pesan ;<br>";
																  }
																  elseif($row->status=="Dalam Proses"){
																	echo "Konfirmasi pembayaran Anda <b>masih dalam proses</b> pada  id pesan <b> $row->id_pesan ;</b><br>";
																  }
																  else {
																   echo " <a type='submit' class='btn btn-default' value='batalpesan' href='isi/index2.php?mem=$row->id_pesan&mes=$row->id_member'> ID PESAN =  $row->id_pesan   </a>"; 
																  }
                                       ?>
                                  
                                           
                                          
                                        
                                       <?php } ?>
                                        </div>
                                    </div><br>
                                   <!--membuat pagination-->
 <div class="pagination">	
			<?php 
			$banyakHalaman = ceil($banyakData / $limit);
			echo 'Halaman:<br> ';
			for($i=1;$i<=$banyakHalaman;$i++){
				
				?>
				<li><a href="index.php?menu=4&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php	
				
												   } 
			?>					
		</div>
                                      <br><br>
                                     <div class="well well-sm">Pembatalan pemesanan hanya dapat dilakukan pada pemesanan yang belum dilakukan konfirmasi pemesanan dan transaksi</div>
									 
                            </div> 
                        </div>

