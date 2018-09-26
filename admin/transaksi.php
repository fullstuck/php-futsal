<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "koneksi.php";
?>
<!-- End -->

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xphp">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Sistem Informasi Futsal</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- php5 Shiv and Respond.js for IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <marquee><strong>Komplek </strong>SPBU No. 14-294-722 Vitka Point (Tiban)
                    &nbsp;&nbsp;
                    <strong>Telp: </strong>0778 - 326623, 326289 
					<strong>Fax: </strong>0778 - 326389 </marquee>
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
	
				<!-- Fungsi Waktu Session -->
				<?php
				$timeout = 10; // Set timeout minutes
				$logout_redirect_url = "../index.php"; // Set logout URL

				$timeout = $timeout * 60; // Converts minutes to seconds
				if (isset($_SESSION['start_time'])) {
					$elapsed_time = time() - $_SESSION['start_time'];
					if ($elapsed_time >= $timeout) {
						session_destroy();
						echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
					}
				}
				$_SESSION['start_time'] = time();
				?>
				<?php } ?>
				<!-- End -->
	
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">

                    <img src="assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                    <!-- Fungsi Menampilkan Foto Admin -->
                                        <img src="<?php echo $_SESSION['gambar']; ?>" alt="" class="img-rounded" />
										<!-- End -->
                                    </a>
                                    <div class="media-body">
                                        Welcome, <h4 class="media-heading"><?php echo $_SESSION['fullname']; ?></h4>
                                    </div>
                                </div></br>
                                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
								
                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<div align="right">
				<a class="btn btn-danger" href="dashboard.php"><i class="fa fa-fast-backward "></i> Kembali ke Menu Utama</a>
				<a class="btn btn-success" href="cetak-transaksi.php"><i class="fa fa dekstop "></i> Cetak Transaksi</a></div>
                    <h4 class="page-head-line">Menu Transaksi Booking</h4>
					
					<?php
             if(isset($_GET['hal']) == 'hapus'){
				$id_transaksi = $_GET['kd'];
				$cek = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan WHERE id_pemesanan='$id_pemesanan'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
					if($delete){
						echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
					}
				}
			}
			?>
			
			<!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='transaksi.php' method="POST">
          
	       <!--<input type='date' class="form-control" style="margin-bottom: 4px;" name='qcari' required /> -->
		   <input class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" id="qcari" type="text" name="qcari" style="margin-bottom: 4px;" required/>
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> 
			</form>
          	</div>
              </div><p></p>
			  
				<!--
				<div align="right">	
				<a class="btn btn-primary" href="tambah_transaksi.php"><i class="fa fa-plus-square "></i> Tambah Data Transaksi </a></div>
                </div>
				-->

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Berikut Record Transaksi Booking 
						</div>
                </div>

            </div>
			
			<!-- Fungsi Menampilkan Data Transaksi dari Database -->					
					<?php
                    $query1="SELECT tb_pemesanan.id_pesanan, tb_pemesanan.gambar, user.fullname, tb_pemesanan.tgl, tb_lapangan.nama_lapangan, tb_pemesanan.status, tb_pemesanan.harga
								FROM tb_pemesanan, tb_lapangan, user
								WHERE user.user_id=tb_pemesanan.user_id AND tb_lapangan.id_lapangan=tb_pemesanan.id_lapangan";
                    
					// Fungsi Search
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT tb_pemesanan.id_pesanan, tb_pemesanan.gambar, user.fullname, tb_pemesanan.tgl, tb_lapangan.nama_lapangan, tb_pemesanan.status, tb_pemesanan.harga
								FROM tb_pemesanan, tb_lapangan, user
								WHERE user.user_id=tb_pemesanan.user_id AND tb_lapangan.id_lapangan=tb_pemesanan.id_lapangan 
								AND tb_pemesanan.tgl like '%$qcari%'";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>	
						  <!-- End -->
			
            <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th><center>No.</center></th>
                      <th><center>Nama Pemesanan</center></th>
                      <th><center>Tanggal Main</center></th>
                      <th><center>Nama Lapangan</center></th>
					  <th><center>Harga</center></th>
					  <th><center>Status Pemesanan</center></th>
					  <th><center>Bukti Pembayaran</center></th>
                      <th><center>Tools</center></th>
                    </tr>
                  </thead>
					<!-- Fungsi Menampilkan data dari database -->	
					<?php 
					 $no=0;
					 while($data=mysqli_fetch_array($tampil))
					{ $no++; ?>
								
					<tbody>
						 <td><center><?php echo $no; ?></center></td>
						<td><span class="fa fa-user fa-lg"></span> <?php echo $data['fullname'];?></td>
						<td><center><strong><?php echo $data['tgl'];?></strong></center></td>
						<td><center><?php echo $data['nama_lapangan'];?></center></td>
						<td><center><strong>Rp. <?php echo $data['harga'];?></strong></center></td>
						<td><center><?php echo $data['status'];?></center></td>
						<?php 
						if($data['gambar']!=null){ ?>
						<td><center><img src="<?php echo $data['gambar'];?>" width="100" height="100" class="img-rounded" style="border: 3px solid #888;"/></center></td>
						<?php } else { ?>
						<td><center></center></td>
						<?php } ?>
						<td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Approve" href="konfirmasi.php?hal=konfirmasi&kd=<?php echo $data['id_pesanan'];?>"><span class="">Approve</span></a>  
							<!-- <a class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Decline" href="tolak.php?hal=tolak&kd=<?php echo $data['id_pesanan'];?>"><span class=""> Decline</span></a> --></center></td></tr></div>
						 <?php   
						  } 
						 ?>   
					<!-- End -->  
                  </tbody>
                </table>
              </div>

			  
            </div>
          </div>


            </div>
           
            </div>
			</div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 Vitka Futsal Center | By : <a href="../index.php" target="_blank">SPAN Community</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
	<!-- daterangepicker -->
        <script src="assets/js/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="assets/js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
		<script>
		//options method for call datepicker
		$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
		</script>
</body>
</html>
