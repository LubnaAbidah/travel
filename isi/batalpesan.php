 <?php 
//$id_pesan = $_POST['id_pesan']; 
$id_pesan = $_GET['i'];
$sql  = " delete from `pesan` where id_pesan = '$id_pesan'";   		  
  mysqli_query($kdb, $sql) or die( mysql_error());      
  
if ($sql) { echo 
"<script>alert('Pembatalan pemesanan berhasil dilakukan.'); window.location = 'index.php?menu=2'</script>";
 } else { echo "Terjadi masalah pada sistem kami, mohon mengulangi beberapa saat lagi.<a href='index.php?menu=2'>Kembali</a>";  }
														 ?>