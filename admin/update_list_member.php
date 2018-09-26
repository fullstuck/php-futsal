<?php
include "koneksi.php";
$id_member        = $_POST['id_member'];
$jumlah_jam			= $_POST['jumlah_jam'];
$waktu				= $_POST['waktu'];
$nama_lapangan      = $_POST['nama_lapangan'];
$harga      		= $_POST['harga'];


$query = mysqli_query($koneksi, "UPDATE tb_member SET jumlah_jam='$jumlah_jam', waktu='$waktu', nama_lapangan='$nama_lapangan', harga='$harga' WHERE id_member='$id_member'")or die(mysql_error());
if ($query){
header('location:list_harga_member.php');	
} else {
	echo "gagal";
    }
?>