<!DOCTYPE html>
<html>
<head>
	<title>Cara Membuat Captcha dengan php | WWW.MALASNGODING.COM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Cara Membuat Captcha dengan php | WWW.MALASNGODING.COM</h1>	
	<div class="kotak">	
		<?php
		session_start();
		if($_SESSION["Captcha"]!=$_POST["nilaiCaptcha"]){
			header("location:index.php?pesan=salah");
		}else{		
			echo "<p>Captcha Anda Benar</p>";
		}
		?>
	</div>
</body>
</html>
