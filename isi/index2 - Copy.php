<?php
include "koneksi/koneksi.php";
require('fpdf17/fpdf.php');
/**
 Judul  : Laporan PDF (portait):
 Level  : Menengah
 Author : Hakko Bio Richard
 Blog   : www.hakkoblogs.com
 Web    : www.niqoweb.com
 Email  : hakkobiorichard@ygmail.com
 
 Untuk tutorial yang lainnya silahkan berkunjung ke www.hakkoblogs.com
 
 Butuh jasa pembuatan website, aplikasi, pembuatan program TA dan Skripsi.? Hubungi NiqoWeb ==>> 085694984803
 
 **/
//Menampilkan data dari tabel di database

$result=mysql_query("SELECT * FROM jadwal ORDER BY nik ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_nik = "";
$column_nama = "";
$column_tempat = "";
$column_tanggal = "";
$column_alamat = "";
$column_no = "";
$column_jabatan = "";
$column_status ="";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $nik = $row["nik"];
    $nama = $row["nama"];
    $tempat_lahir = $row["tempat_lahir"];
    $tanggal_lahir = $row["tanggal_lahir"];
    $alamat = $row["alamat"];
    $no_telepon = $row["no_telepon"];
    $jabatan = $row["jabatan"];
    $status = $row["status"];
 
    

    $column_nik = $column_nik.$nik."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_tempat = $column_tempat.$tempat_lahir."\n";
    $column_tanggal = $column_tanggal.$tanggal_lahir."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_no = $column_no.$no_telepon."\n";
    $column_jabatan = $column_jabatan.$jabatan."\n";
    $column_status = $column_status.$status."\n";
    

//Create a new PDF file
$pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(125);
$pdf->Cell(30,10,'DATA KARYAWAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(125);
$pdf->Cell(30,10,'PT. NiqoWeb Cikarang | www.niqoweb.com',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'NIK',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(60,8,'Nama',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(25,8,'Tempat Lahir',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(25,8,'Tanggal Lahir',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(60,8,'Alamat',1,0,'C',1);
$pdf->SetX(200);
$pdf->Cell(35,8,'No Telepon',1,0,'C',1);
$pdf->SetX(235);
$pdf->Cell(25,8,'Jabatan',1,0,'C',1);
$pdf->SetX(260);
$pdf->Cell(32,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_nik,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(60,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,6,$column_tempat,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(25,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(60,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(200);
$pdf->MultiCell(35,6,$column_no,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(235);
$pdf->MultiCell(25,6,$column_jabatan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(260);
$pdf->MultiCell(32,6,$column_status,1,'C');

$pdf->Output();
?>
