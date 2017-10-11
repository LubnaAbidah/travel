<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	
<head>
	<title>Masuk ke Team2Travel.net</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
    
<?php  session_start();

session_start();
if(!isset($_SESSION['username'])){ header("location:login/"); }
if(!isset($_SESSION['nama'])){ header("location:login/"); }

?>
    
<body>
	
				 <!-----start-main---->
				<div class="login-form">
					<div class="head">
						<img src="images/mem4.jpg" alt=""/>
						
					</div>
				<form name="formLogin" method="post" action="index.php">
					<li>
						<input type="text" name="username" required="required" placeholder="Username:" autofocus>
					</li>
					<li>
						<input type="password" name="password" required="required" placeholder="Password:">
					</li>
					<div class="p-container">
                        <h3> <?php  if(isset($_GET['status'])){ echo "&laquo; ".$_GET['status']." &raquo;"; }?> </h3>
								<a href="register.php"><label class="checkbox"><input><i></i>Daftar Dulu</label></a>
								<input type="submit" name="Login" id="Login" value="Sign in">
							<div class="clear"> </div>
					</div>
				</form>
                    
			</div>
			<!--//End-login-form-->
		  <!-----start-copyright---->
<!--
   					<div class="copy-right">
						<p>Template by <a href="http://w3layouts.com">w3layouts</a></p> 
					</div>
-->
				<!-----//end-copyright---->
		 		
</body>
</html>