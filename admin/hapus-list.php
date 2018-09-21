<?php
include "koneksi.php";
$id_lapangan = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_lapangan WHERE id_lapangan='$id_lapangan'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'list_harga.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'list_harga.php'</script>";	
}
?>