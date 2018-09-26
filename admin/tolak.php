<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "koneksi.php";
}
	
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/

		$id_pesanan		= $_GET['kd'];
		$status				= "Ditolak";
		$sql="UPDATE tb_pemesanan set status = '$status' where id_pesanan='$id_pesanan'";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
		echo "<script> window.location = './transaksi.php'</script>";	




?>