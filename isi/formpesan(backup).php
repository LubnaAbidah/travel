   <?php
            $idj = $_GET['idp'];
             $query1 = "select * from jadwal, kendaraan, kota_asal, kota_tujuan where  
             kendaraan.id_mobil  = jadwal.id_mobil 
             and jadwal.id_kota_asal = kota_asal.id_kota_asal and  
             jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan 
             and jadwal.id_jadwal = ".$idj;
            
            $result=mysqli_query($kdb,$query1) or die(mysql_error());
            while($row=mysqli_fetch_object($result))
               {
            ?>
  
     <div class="panel panel-default" style="color:black">
        <div class="panel-body">Input Data Pesan</div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">         
                                                       

                                                          <div class="col-md-12 ">
                                                            <form class="form-controll" action="#" method="get">
                                                                <?php 
                                                                        if(isset($_SESSION['username'])){
                                                                    
                                                                        $zet = $_SESSION['username'];

                                                                    $querya = "select * from member where username = '$zet' ";

                                                                        $resultan=mysqli_query($kdb,$querya) or die(mysql_error());
                                                                        while($rom=mysqli_fetch_object($resultan))
                                                                           {
                                                                    ?>
                                                                <div class="input-group-md">
                                                                   Nama<input class="form-control" type="text" name="nama" id="nama" maxlength="30" value=" <?php echo $rom -> nama; ?>" disabled/>
                                                                </div>
                                                                <div class="input-group-md">
                                                                   No. Telp/HP <input class="form-control" type="text" name="telepon" id="telepon" maxlength="30" value=" <?php echo $rom -> telepon; ?>" disabled/>
                                                                </div>
                                                                 <div class="form-group">
                                                                  <label>Status</label>
                                                                  <select class="form-control" name="status" id="status"disabled>
                                                                    <option>Belum Bayar</option>
                                                                    <option>Lunas</option>
                                                                  </select>
                                                                </div>
                                                                        <?php } } ?>
                                                                <div class="input-group-md">
                                                                    <span class="input-group-btn">
                                                                       <span class="glyphicon glyphicon-min" aria-hidden="true"></span>
                                                                      </span>
                                                                    No Kursi
                                                                    <input class="form-control" type="number" name="nomor_kursi" id="nomor_kursi" min="1" max="5" maxlength="5" placeholder="Nomor Kursi" style="width:100px;"
                                                                     value=" <?php echo $rom -> nomor_kursi; ?>"/>
                                                                    <span class="glyphicon glyphicon-max" aria-hidden="true"></span>
                                                                </div>
                                                              </form>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-5">
                                                            <hr>
                                                            <p>  Kota Asal            : <?php echo $row -> nm_kota_asal; ?> </p>
                                                            <p>  Kota Tujuan          : <?php echo $row -> nm_kota_tujuan; ?></p>
                                                            <p>  Tanggal Berangkat    : <?php echo $row -> tgl_berangkat; ?></p>
                                                            <br>
                                                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                          <div class="btn-group btn-group-md "  >
                                                            <a href="index.php?menu=12&i=<?php echo $row -> id_jadwal; ?>">
                                                                <button  type="submit" class="btn btn-primary" value="batalpesan">
                                                                    <span >Simpan</span>
                                                                </button>
                                                            </a>
                                                          </div>
                                                        </div>
                                                        </div>
                                                    <div class="col-md-5">
                                                        <hr>
                                                        <img src="img/kursi.png"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                       <br>
                                                        <p>Keterangan:<br>
                                                        0: Supir<br>
                                                        <?php 
                                                      //  if ($row -> nomor_kursi = 1){
                                                       //  echo "1 : Terisi"}
                                                       //  else{
                                                       //   echo "1 : Kosong"}
                                                         
                                                 
                                                 $id_jadwal = $row -> id_jadwal; 
                                $result2="SELECT nomor_kursi from pesan where id_jadwal=$id_jadwal";
                             //   $d = mysqli_query($kdb,$result2);
                                
                             //   echo $d;
                               // $data2=mysqli_fetch_assoc($sqli2);
                               // $banyakData2 = $data2;
                               // $items = (string)$data2;
                               // echo $items
                                ?>
                                                       
                                                        1: Kosong<br>
                                                        2: Kosong<br>
                                                        3: Kosong<br>
                                                        4: Kosong<br>
                                                        5: Kosong
                                                        </p>
                                                    </div>
                                                          <?php } ?>
                                                          </div> 

            </div>
            
       
            
    



