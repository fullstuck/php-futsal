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

        $user_id			= $_SESSION['user_id'];
		$tgl				= $_GET['tgl'];
		$jam				= $_GET['jam'];
		$id_lapangan		= $_GET['kd'];
		$sisa				= $_GET['sisa'];
		$harga				= $_GET['harga'];
		$id_pesan_member 	= $_GET['id'];
		$status				= "Menunggu Konfirmasi Admin";
		$sql="INSERT INTO tb_pemesanan(id_lapangan,user_id,harga,tgl,jam,status) 
		VALUES ('$id_lapangan','$user_id','$harga','$tgl','$jam','$status')";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
		$sql2="UPDATE tb_pesan_member SET sisa_jam = sisa_jam - '$sisa' where id_pesan_member='$id_pesan_member'";
		$res2=mysqli_query($koneksi, $sql2) or die (mysqli_error());
		echo "<script> window.location = './status_pesanan.php'</script>";	




