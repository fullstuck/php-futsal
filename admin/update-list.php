<?php
include "koneksi.php";
$id_lapangan        = $_POST['id_lapangan'];
$nama_lapangan      = $_POST['nama_lapangan'];
$waktu				= $_POST['waktu'];
$harga      		= $_POST['harga'];


$query = mysqli_query($koneksi, "UPDATE tb_lapangan SET nama_lapangan='$nama_lapangan', waktu='$waktu', harga='$harga' WHERE id_lapangan='$id_lapangan'")or die(mysql_error());
if ($query){
header('location:list_harga.php');	
} else {
	echo "gagal";
    }
?>