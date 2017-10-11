 <?php $idj = $_GET['idp'];
             $query1 = "select * from pesan, jadwal, kota_asal, kota_tujuan, member where 
  pesan.id_jadwal = jadwal.id_jadwal and pesan.id_member = member.id_member and jadwal.id_kota_asal = kota_asal.id_kota_asal
  and jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan and id_pesan= ".$idj;
            
            $result=mysqli_query($kdb,$query1) or die(mysql_error());
            while($row=mysqli_fetch_object($result))
               {
	?>
            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Konfirmasi Batal Pesan</div>
            </div> <form class="form-controll" action="index.php?menu=17&i=<?php echo $row -> id_pesan; ?>" method="post">
                                                <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                         
                                                        <div class="col-md-5 ">
                                                            <p>ID Pesan :<span><?php echo $row -> id_pesan; ?></span></p>
                                                            <p>Kota Asal : <span><?php echo $row -> nm_kota_asal; ?></span></p>
                                                            <p>Kota Tujuan : <span><?php echo $row -> nm_kota_tujuan; ?></span></p>
                                                            <p>Tanggal Berangkat : <span><?php echo $row -> tgl_berangkat; ?></span></p>
                                                          
                                                                <p>Total Bayar : <span><?php echo $row -> harga; ?></span></p>
                                                                <p>Status Bayar : <div class="alert alert-danger" role="alert"><?php echo $row -> status; ?></div>
                                                                </p>
							<?php  } ?>
                                                        <input type="submit" name="action" value="YA" class="btn btn-warning">
                                                            
															  <a class="btn btn-danger" onclick=self.history.back() > TIDAK</a>
                                                    </div>
                                                        
                                                    </div>
                                                </div>


                                    