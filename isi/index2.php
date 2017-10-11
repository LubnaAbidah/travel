<?php
require('fpdf17/fpdf.php');

$pdf = new FPDF("P","cm","Letter");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../img/intro-bg.jpg',1,1,3,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'TEAM2TRAVEL',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 085768047575',0,'L');    
$pdf->SetFont('Helvetica','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JL. Rajabasa Bandar Lampung',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Website : team2travel.net Email : test@team2travel.net',0,'L');
$pdf->Line(1,3.1,20,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,20,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Helvetica','B',14);
$pdf->Cell(18,0.7,"-------------------------------- TIKET PEMESANAN --------------------------------",0,10,'C');
//$pdf->ln(1);
$pdf->SetFont('Helvetica','',10);
function koneksidatabase()
{
    include('koneksi/koneksi.php');
    return $kdb;
}
$kdb = koneksidatabase();
$mem = $_GET['mem'];
$mes = $_GET['mes'];
$sql =  "select * from member, pesan, jadwal, kota_asal, kota_tujuan, kendaraan where kendaraan.id_mobil = jadwal.id_mobil and member.id_member = pesan.id_member and pesan.id_pesan = '$mem' and member.id_member = '$mes' and pesan.id_jadwal = jadwal.id_jadwal and jadwal.id_kota_asal = kota_asal.id_kota_asal and  jadwal.id_kota_tujuan = kota_tujuan.id_kota_tujuan" ; 
$hasil = mysqli_query($kdb, $sql) or die(mysql_error());
while($baris = mysqli_fetch_array($hasil))
{
    $pdf->Ln();
    $pdf->Cell(5,0.8,"ID Pemesanan        ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['id_pesan'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Perjalanan      ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(3,0.8,$baris['nm_kota_asal'],0,0,'L');
    $pdf->Cell(0.2,0.8,"-",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nm_kota_tujuan'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Tanggal Berangkat   ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['tgl_berangkat'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Jam Berangkat         ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['jam_berangkat'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Nomor Kursi  ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nomor_kursi'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Jenis Mobil  ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['jenis_mobil'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Nomor Polisi  ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(5,0.8,$baris['nomor_polisi'],0,0,'L');
    $pdf->Ln();
    $pdf->Cell(5,0.8,"Total Bayar   ",0,0,'L');
    $pdf->Cell(2,0.8,": ",0,0,'L');
    $pdf->Cell(0.7,0.8,"Rp. ",0,0,'L');
    $pdf->Cell(1,0.8,$baris['harga'],0,0,'L');
    $pdf->Cell(2,0.8,",00 ",0,0,'L');
	$pdf->Ln();
	$pdf->Cell(5,0.8,"Note: Kendaraan dan nomor kursi dapat berubah sewaktu-waktu mohon kiranya agar maklum.Terimakasih.",0,0,'L');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(5,0,"------------------------------------------------------------------------------------------------------------------------ ( Gunting disini )",0,0,'L');
}

$pdf->Output("tiket.pdf","I");

?>

