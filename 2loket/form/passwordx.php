<section class="content-header">
      <h1>
        Ganti Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Ganti Password</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
<div class="row">
<div class="col-sm-6">
<form method="POST" action="./form/aksi_password.php" name="Ubah">
<div class="form-group">
<input name="user" type="hidden" value="<?php echo $_SESSION["user"]; ?>">
</div>
<div class="form-group">
    <label>Masukkan Password Lama<span class="text-danger">*</span></label>
    <input class="form-control" name="password" type="password" value=""/>
</div>
<div class="form-group">
    <label>Masukkan Password Baru<span class="text-danger">*</span></label>
    <input class="form-control" name="pass_baru" type="password" value=""/>
</div>
<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a class="btn btn-danger" onclick=self.history.back() ><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</form>
</div>
</div>
</div>
</div>
</div>
 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
        <!-- /.col -->
    
      <!-- /.row -->
    </section>
    <!-- /.content -->