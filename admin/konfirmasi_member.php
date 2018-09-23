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

		$id_pesan_member		= $_GET['kd'];
		$status					= "Diterima";
		$sql="UPDATE tb_pesan_member set status = '$status' where id_pesan_member='$id_pesan_member'";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
		echo "<script> window.location = './transaksi_member.php'</script>";	




?>