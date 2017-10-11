<?php			
 
$idj = $_GET['i'];
$querya = "select * from pesan, jadwal, member
            where 
            pesan.id_jadwal = jadwal.id_jadwal
            and pesan.id_member = member.id_member
            and jadwal.id_jadwal = ".$idj;

 $sql=mysqli_query($kdb,$querya) or die(mysql_error());
 
  global $_POST; 

  echo $_POST["nomor_kursi"];
  echo $_POST["status"];
  echo $_POST["id_jadwal"];
  echo $_POST["id_member"];
if( empty($_POST["nomor_kursi"]))
{
echo "<script>alert('Semua field harus terisi'); window.location = 'index.php?menu=8&idp=$idj'</script>";
}else{
  $sql  = " insert into `pesan` (`nomor_kursi`,`status`,`id_jadwal`,`id_member`) 
  values ( 
  '".$_POST["nomor_kursi"]."',
  '".$_POST["status"]."',
  '".$_POST["id_jadwal"]."',
'".$_POST["id_member"]."'  )";		  
  mysqli_query($kdb, $sql) or die( mysql_error()); 
 //header("location:index.php?menu=10&i=$idj;");
echo("<script>location.href = 'index.php?menu=10&i=$idj;';</script>");
}



?>
