<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:index.php');	
} else {
	include "koneksi.php";
require('fpdf17/fpdf.php');
require('koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT a.id_pesanan, c.fullname, a.tgl, b.nama_lapangan, a.harga, a.status FROM tb_pemesanan a, tb_lapangan b, user c WHERE a.id_lapangan=b.id_lapangan AND a.user_id=c.user_id ORDER BY a.tgl DESC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_pesanan = "";
$column_fullname = "";
$column_tgl = "";
$column_nama_lapangan = "";
$column_harga = "";
$column_status = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_pesanan 	= $row["id_pesanan"];
    $fullname 		= $row["fullname"];
	$tgl	 		= $row["tgl"];
	$harga	 		= $row["harga"];
    $nama_lapangan 	= $row["nama_lapangan"];
	$status 		= $row["status"];
	
	
    $column_id_pesanan 		= $column_id_pesanan.$id_pesanan."\n";
    $column_fullname 		= $column_fullname.$fullname."\n";
	$column_tgl 			= $column_tgl.$tgl."\n";
	$column_nama_lapangan 	= $column_nama_lapangan.$nama_lapangan."\n";
	$column_harga 			= $column_harga."Rp ".$harga."\n";
    $column_status 			= $column_status.$status."\n";
	

//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',13);
$pdf->Cell(130);
$pdf->Cell(30,10,'DATA PESANAN',0,0,'C');
$pdf->Ln();
$pdf->Cell(130);
$pdf->Cell(30,5,'Berikut List Data Pesanan',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(207,207,207);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(10);
$pdf->Cell(10,8,'ID',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(50,8,'Nama Pemesan',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(30,8,'Tgl. Main',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(70,8,'Nama Lapangan',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(40,8,'Harga',1,0,'C',1);
$pdf->SetX(210);
$pdf->Cell(50,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);



$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(10,6,$column_id_pesanan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(50,6,$column_fullname,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(30,6,$column_tgl,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(70,6,$column_nama_lapangan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(40,6,$column_harga,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(210);
$pdf->MultiCell(50,6,$column_status,1,'C');

$pdf->Output();
}
?>
