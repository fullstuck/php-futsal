<?php
$namafolder="gambar/"; //tempat menyimpan file
/*
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("ecommerce")  or die("Gagal");*/
include "koneksi.php";

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
        $nama				= $_POST['nama'];
		$tgl_main			= $_POST['tgl_main'];
		$id_lapangan		= $_POST['id_lapangan'];
		$hari_main			= $_POST['hari_main'];
		$jam_mulai			= $_POST['jam_mulai'];
		$jam_selesai		= $_POST['jam_selesai'];
		$keterangan			= $_POST['keterangan'];
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="INSERT INTO tb_transaksi(nama,tgl_main,id_lapangan,hari_main,jam_mulai,jam_selesai,keterangan,gambar) 
			VALUES ('$nama','$tgl_main','$id_lapangan','$hari_main', '$jam_mulai','$jam_selesai', '$keterangan','$gambar')";
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
			 echo "<script>alert('Data Transaksi Berhasil dimasukan!'); window.location = './transaksi.php'</script>";	
          //  echo "<h3><a href='input-admin.php'> Input Lagi</a></h3>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}



?>