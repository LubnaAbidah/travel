       <div class="panel panel-default" style="color:black">
                    <div class="panel-body">Form Konfirmasi Pemesanan</div>
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
                                                            <form class="form-controll" action="index.php?menu=12&i=<?php echo $row -> id_pesan; ?>" method="post">
                                                                <?php 
                                                                        
                                                                    ?>
                                                                <div class="form-group row col-md-6">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">ID Pesan</label>
                                                                  <div class="col-xs-10">
                                                                    <input class="form-control" type="text" id="example-text-input" value=" <?php echo $idj; ?>" readonly>
                                                                  </div>
                                                                </div>
                                                                
                                                                <div class="form-group row col-md-6">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">Status</label>
                                                                  <div class="col-xs-10">
                                                                    <input class="form-control" type="text" id="example-text-input" value="Dalam Proses" readonly>
                                                                  </div>
                                                                </div><br>
                                                                
                                                                
                                                                <div class="form-group row col-md-12">
                                                                  <label for="example-text-input" class="col-xs-2 col-form-label">Alasan</label>
                                                                  <div class="col-xs-10">
                                                                      <textarea class="form-control" type="text" id="example-text-input" value=" "></textarea>
                                                                  </div>
                                                                </div>
																
																 <?php  } ?>
                                                               
                                                                 <p><input type="submit" name="action" value="Batalkan" class="btn btn-primary btn-sm"></p>
                                                              </form>
                                                        </div>
														
</div>
</div>
</div>
</div>
</div>


