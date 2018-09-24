<?php
include ("koneksi.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error1');

} else if (empty($username)) {
	header('location:index.php?error=2');
	
} else if (empty($password)) {
	header('location:index.php?error=3');
	
}

$q = mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$row = mysqli_fetch_array ($q);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id'] = $row['user_id'];
	$_SESSION['username'] = $username;
	$_SESSION['fullname'] = $row['fullname'];    
	$_SESSION['gambar'] = $row['gambar'];	
	$_SESSION['hak_akses'] = $row['hak_akses'];
	if($_SESSION['hak_akses']=="penyewa"){
		header('location:dashboard_penyewa.php');
	}else if($_SESSION['hak_akses']=="admin"){
		header('location:dashboard.php');
	}
} else {
	header('location:index.php?error=4');
}
?>