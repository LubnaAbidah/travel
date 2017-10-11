<?php
	//$query	=mysql_query("SELECT * FROM member WHERE nama='$username'");
	//$tampil	=mysql_fetch_array($query);

	$query = "SELECT * FROM member ";       
$result = mysqli_query($kdb,$query);
 while($tampil = mysqli_fetch_array($result)){
?>
<div class="span6">
                <legend><p><h3><?php echo $tampil['username']; ?></h3></p></legend>
            </div>
<table class="table striped hovered">
    <tbody>
        <tr>
           <th class="text-left">Nama/Email</th>
            <th class="text-left"><abbr title="Email tidak dapat dirubah!"><em><?php echo $tampil['nama']; ?></em></abbr></th>
        </tr>
        <tr>
           <th class="text-left">Username</th>
            <th class="text-left"><abbr title="Email tidak dapat dirubah!"><em><?php echo $tampil['username']; ?></em></abbr></th>
        </tr>
        <tr>
           <th class="text-left">Telepon</th>
            <th class="text-left"><abbr title="Email tidak dapat dirubah!"><em><?php echo $tampil['telepon']; ?></em></abbr></th>
        </tr>
        <tr>
           <th class="text-left">Jenis Kelamin</th>
            <th class="text-left"><abbr title="Email tidak dapat dirubah!"><em><?php echo $tampil['jen_kelamin']; ?></em></abbr></th>
        </tr>
        <tr>
          
            <th class="hidden password"><abbr title="Email tidak dapat dirubah!"><em><?php echo $tampil['password']; ?></em></abbr></th>
        </tr>
    </tbody>
</table>
 <?php } ?>