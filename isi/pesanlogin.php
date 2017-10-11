

            <div class="panel panel-default" style="color:black">
                <div class="panel-body">Peringatan pemesanan</div>
            </div>
                                                <div class="panel panel-primary">
                                                    <div class="panel-body" style="color:black;">
                                                        
                                                        
                                       <link href='style.css' rel='stylesheet' type='text/css'>
                                                        <div class="alert alert-warning" role="alert">Anda harus login terlebih dahulu untuk melakukan pemesanan</div>
                                                        
                                                        <?php
                                                            error_reporting(E_ALL ^ E_DEPRECATED);
                                                    mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
                                                    mysql_select_db("db_tiket2");
                                                    //include "isi/koneksi/koneksi.php";

                                                    if (isset($_POST['Login'])){
                                                        //koneksi terpusat

                                                        $username=$_POST['username'];
                                                        $password=$_POST['password'];
                                                        $nama=$_POST['nama'];

                                                            $query=mysql_query("select * from member where username='$username' and password='$password'");
                                                            $cek=mysql_num_rows($query);
                                                            $row=mysql_fetch_array($query);

                                                            if($cek){
                                                                $_SESSION['username']=$username;
                                                                $_SESSION['password']=$password;
                                                                $_SESSION['nama']=$nama;

                                                                ?><script language="javascript">document.location.href="index.php?menu=8";</script><?php

                                                            }else{
                                                                ?><script language="javascript">document.location.href="index.php?menu=13&status=Gagal Login";</script><?php
                                                            }		


                                                    }else{
                                                        unset($_POST['Login']);
                                                    }
                                                    ?>
                                    <form action="index.php?menu=8" method="post">
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">Username</label>
                                      <div class="col-xs-10">
                                        <input class="form-control" name="username" type="text" value="" placeholder="masukkan username" id="example-text-input">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="example-text-input" class="col-xs-2 col-form-label">password</label>
                                      <div class="col-xs-10">
                                        <input class="form-control"  name="password" type="text" value="" placeholder="masukkan password" id="example-text-input">
                                      </div>
                                    </div>

                                    <div style="margin:3em;">
                                        <button type="submit" name="Login" class="btn btn-primary btn-md" data-loading-text="<i class='fa fa-spinner'></i> processing konfirmasi">login</button>
                                    </div>
                                   
                                    <div class="alert alert-danger" role="alert">belum punya akun
                                            <a href='index.php?menu=16'>Buat akun</a></div>
                                </form>
                                                         
                                                        
                            
                                                        
                                                    </div>
                                                    </div>


