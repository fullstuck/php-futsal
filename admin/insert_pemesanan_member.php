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
		$tgl				= date("Y-m-d");
		$id_member			= $_GET['kd'];
		$sisa_jam			= $_GET['jam'];
		$status				= "Menunggu Konfirmasi Admin";
		$sql="INSERT INTO tb_pesan_member(id_member,user_id,tgl,sisa_jam,status) 
		VALUES ('$id_member','$user_id','$tgl','$sisa_jam','$status')";
		$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
		echo "<script> window.location = './status_pesanan_member.php'</script>";	




?>