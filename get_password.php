<?php

	include "isi/koneksi/koneksi.php";


	$email = ($_POST['email']);


	// Cek email pengguna di database
	$cek_email = mysqli_num_rows(mysqli_query($kdb, "SELECT nama FROM member WHERE nama = '$email'"));

	// jika email tidak ditemukan
	if ($cek_email == ""){
    	echo"
        	<script>alert('Email tidak terdaftar didalam database, mohon ulangi lagi.');
            	window.location='javascript:history.go(-1)'
       		</script>
    	";
	}
	else
	
	{
		// ganti password pengguna dengan password baru yang diambil dari random auto unik id yang telah dienkripsi 
		//dengan md5 format substring (kombinasi angka dan karakter) limit password 6 karakter
		$password_baru = substr(md5(uniqid(rand())),0,6);

    	// ganti password pengguna dengan password yang baru (reset password)
    	$query = mysqli_query($kdb, "update member set password = '$password_baru' where nama = '$_POST[email]'");

    	// dapatkan email_pengguna dari database
    	$sql2 = mysqli_query($kdb, "select email from admin where id_admin = '5'");
    	$j2   = mysqli_fetch_array($sql2);

    	$subjek = "Password Baru Member";
    	$pesan = "Password baru anda adalah <b>$password_baru</b>";

    	// Kirim email dalam format HTML
   		$dari = "From: $j2[email]\r\n";
    	$dari .= "Content-type: text/html\r\n";

    	// Kirim password ke email pengguna
    	mail($_POST['email'],$subjek,$pesan,$dari);

    	echo "
        	<script>alert('Password baru sudah terkirim ke alamat email Anda.');
            	window.location='formlogin.php'
        	</script>
    	";
	}
?>