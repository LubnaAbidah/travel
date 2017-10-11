    <?php

?>	

	  <div class="panel panel-default" style="color:black">
                    <div class="panel-body">Form Konfirmasi Pembayaran</div>
                </div>
                          <div class="panel panel-primary">
                              <div class="panel-body" style="color:black;">
                                   <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                       <div class="btn-group btn-group-md " role="group" style="width:200px;" >
                                       
                 <?php
            $idj = $_GET['idp'];
             $query1 = "select * from pesan where id_pesan= ".$idj;
            
            $result=mysqli_query($kdb,$query1) or die(mysql_error());
            while($row=mysqli_fetch_object($result))
               {
            ?>
  
   
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">         
                                                       

                                                          <div class="col-md-12 ">
                                                             <form class="form-controll" action="index.php?menu=18&i=<?php echo $row -> id_pesan; ?>" method="post">
                                                                <?php 
                                                                        
                                                                    ?>
                                                                <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">ID Pesan</label>
                                                                  <div class="col-xs-10">
                                                                    <input class="form-control" type="text" id="id_pesan" name="id_pesan" value=" <?php echo $idj; ?>" readonly>
                                                                  </div>
                                                                </div>
                                                                <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">No resi</label>
                                                                  <div class="col-xs-10">
                                                                       <input class="form-control" type="number" id="no_resi" name="no_resi" value=" ">
                                                                  </div>
                                                                </div>
														<!--		 <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">No Rek Anda</label>
                                                                  <div class="col-xs-10">
                                                                       <input class="form-control" type="number" id="no_rek" name="no_rek" value=" ">
                                                                  </div>
                                                                </div> -->
																 <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">Tanggal Transfer</label>
                                                                  <div class="col-xs-10">
                                                                       <input class="form-control" type="date" id="tgl_transfer" name="tgl_transfer" value=" ">
                                                                  </div>
                                                                </div>
																 <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">Jam Transfer</label>
                                                                  <div class="col-xs-10">
                                                                       <input class="form-control" type="time" id="jam_transfer" name="jam_transfer" value=" ">
                                                                  </div>
                                                                </div>
																
																 <?php  } ?>
																  <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">Status</label>
                                                                  <div class="col-xs-10">
                                                                   <input class="form-control" type="text" id="status" name="status"  maxlength="30" value="Dalam Proses" readonly/>
                                                                  </div>
																  </div>
                                                                
																
                                                               
                                                                 <p><input type="submit" name="action" value="Simpan" class="btn btn-primary btn-sm"></p>
                                                              </form>       
                                                                 
                                                             
															
                                                        </div>
														
</div>
</div>
</div>
</div>
</div>


