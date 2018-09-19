<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:index.php');	
} else {
	include "koneksi.php";
require('fpdf17/fpdf.php');
require('koneksi.php');


//Select the Products you want to show in your PDF file

$result=mysqli_query($koneksi, "SELECT * FROM tb_member ORDER BY id_member ASC") or die(mysql_error());

//Initialize the 3 columns and the total

$column_id_member = "";
$column_jumlah_jam = "";
$column_waktu = "";
$column_nama_lapangan = "";
$column_harga = "";

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_member 		= $row["id_member"];
	$jumlah_jam		= $row["jumlah_jam"];
	$waktu			= $row["waktu"];
    $nama_lapangan	= $row["nama_lapangan"];
	$harga 			= $row["harga"];
	
    $column_id_member	 	= $column_id_member.$id_member."\n";
	$column_jumlah_jam 		= $column_jumlah_jam.$jumlah_jam." Jam\n";
	$column_waktu 			= $column_waktu.$waktu."\n";
    $column_nama_lapangan	= $column_nama_lapangan.$nama_lapangan."\n";
	$column_harga 			= $column_harga.$harga."\n";

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(80);
$pdf->Cell(30,10,'LIST HARGA MEMBER',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,5,'Berikut List Data Harga Member',0,0,'C');
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

$pdf->SetX(30);
$pdf->Cell(10,8,'ID',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(30,8,'Jumlah Jam',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(30,8,'Waktu',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(60,8,'Nama Lapangan',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(30,8,'Harga',1,0,'C',1);

$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(10,6,$column_id_member,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$column_jumlah_jam,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(30,6,$column_waktu,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(60,6,$column_nama_lapangan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(30,6,$column_harga,1,'C');

$pdf->Output();
}
?>
