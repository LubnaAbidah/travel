    <div class="panel panel-default" style="color:black">
        <div class="panel-body">Pemesanan Tiket Online Travel Lampung</div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-body" style="color:black;">
                <p class="lead">Selamat Datang di website <a target="_blank" href="#">Pemesanan Tiket Online</a> Travel Lampung. <br>
                    <div class="alert alert-info" role="alert">Cari Jadwal Keberangkatan Dengan Mudah</div>

                </p>
                <form action="index.php?menu=5" method="post">
                           <!-- <input class="form-control" type="text" name="carika"  maxlength="30" placeholder=" Kota Asal" /> -->
                            <div class="form-group row">
                              <label for="example-search-input" class="col-xs-2 col-form-label">Kota Asal</label>
                              <div class="col-xs-10">
                                 <select name="carika" class="form-control" style="width: 100%;"> 
                                    <?php
                                        global $kdb;
                                        $sqlquery   = "select `id_kota_asal`, `nm_kota_asal` from kota_asal ";
                                        $hasilquery = mysqli_query($kdb, $sqlquery) or die (mysql_error());
                                        while ( $baris = mysqli_fetch_assoc($hasilquery)) {
                                                $value = $baris["nm_kota_asal"];
                                                $caption = $baris ["nm_kota_asal"];
                                                if ($row["nm_kota_asal"] == $baris ["nm_kota_asal"])
                                                {$selstr = "selected"; }
                                                else {$selstr = ""; }
                                    ?>
                                    <option value="<?php echo $value ?>" <?php echo $selstr ?>>
                                        &nbsp; <?php echo $caption; ?> &nbsp;
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                            
                            
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Kota Tujuan</label>
                                      <div class="col-xs-10">
                                        <select name="carikt" class="form-control" style="width: 100%;"> 
                                            <?php
                                                global $kdb;
                                                $sqlquery2   = "select `id_kota_tujuan`, `nm_kota_tujuan` from kota_tujuan ";
                                                $hasilquery2 = mysqli_query($kdb, $sqlquery2) or die (mysql_error());
                                                while ( $baris2 = mysqli_fetch_assoc($hasilquery2)) {
                                                        $value = $baris2["nm_kota_tujuan"];
                                                        $caption = $baris2["nm_kota_tujuan"];
                                                        if ($row["nm_kota_tujuan"] == $baris2["nm_kota_tujuan"])
                                                        {$selstr = "selected"; }
                                                        else {$selstr = ""; }
                                            ?>
                                            <option value="<?php echo $value ?>" <?php echo $selstr ?>>
                                                &nbsp; <?php echo $caption; ?> &nbsp;
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Tanggal</label>
                                      <div class="col-xs-10">
                                         <input class="form-control" type="date" name="caritgl"  maxlength="30" placeholder="" />
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label" ></label>
                                      <div class="col-xs-10">
                                         <input  type="submit" class="btn btn-primary" value="Cari Jadwal" style="float:left;"/>
                                      </div>
                                    </div>
                </form>

            </div>
        </div>