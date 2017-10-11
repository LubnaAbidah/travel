 <?php 
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
   function koneksidatabase()
{
    include('koneksi/koneksi.php');
	return $kdb;
}  
$kdb = koneksidatabase(); 


 
 $no_resi = $_POST['no_resi'];
 $no_rek = $_POST['no_rek'];
 $tgl_transfer = $_POST['tgl_transfer'];
 $jam_transfer = $_POST['jam_transfer'];
 $id_pesan = $_POST['id_pesan'];
$status = $_POST['status'];  
$result = "SELECT * FROM konfirmasi_pesan WHERE no_resi='$no_resi'";
$check =mysqli_query($kdb,$result) or die(mysql_error());
$fetch_resi = mysqli_num_rows($check);

if( empty($no_resi) && empty($no_rek) && empty($tgl_transfer) && empty($jam_transfer))
{
echo "<script>alert('Semua field harus terisi'); window.location = 'index.php?menu=14'</script>";
    
}elseif ($fetch_resi == 1)
   
{
echo "<script>alert('No resi yang anda masukan sudah ada'); window.location = 'index.php?menu=14'</script>";    
}else { 

$sql  = " insert into `konfirmasi_pesan` (`no_resi`,`no_rek`,`tgl_transfer`,`jam_transfer`,`id_pesan`) 
  values ( 
  '".$_POST["no_resi"]."',
   '".$_POST["no_rek"]."',
    '".$_POST["tgl_transfer"]."',
	 '".$_POST["jam_transfer"]."',
'".$_POST["id_pesan"]."'  )";		  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
  
$sql1  = " update  `pesan` set 
  `status` = '".$_POST["status"]."' where id_pesan = '$id_pesan'";       
  mysqli_query($kdb, $sql1) or die( mysql_error());     
  
if ($sql && $sql1) { echo 
"<script>alert('Terima kasih konfirmasi pembayaran berhasil dilakukan, mohon bersabar. Kami akan memprosesnya.'); window.location = 'index.php?menu=2'</script>";
 } else { echo "Terjadi masalah pada sistem kami, mohon mengulangi beberapa saat lagi.<a href='index.php?menu=2'>Kembali</a>";  }

}
  

														
														 ?>