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
				<a class="btn btn-danger" href="dashboard_penyewa.php"><i class="fa fa-fast-backward "></i> Kembali ke Menu Utama</a>
				<!-- <a class="btn btn-success" href="cetak-lapangan.php"><i class="fa fa dekstop "></i> Cetak List Harga</a></div> -->
                    <h4 class="page-head-line">List Pesanan Member</h4>
					
					 <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='status_pesanan_member.php' method="POST">
          
	       <!--<input type='date' class="form-control" style="margin-bottom: 4px;" name='qcari' required /> -->
		   <input class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" id="qcari" type="text" name="qcari" style="margin-bottom: 4px;" required/>
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> 
			</form>
          	</div>
              </div><p></p>
				
				<!--
				<div align="right">	
				<a class="btn btn-primary" href="tambah_harga.php"><i class="fa fa-plus-square "></i> Tambah Data Harga </a>
				</div>
				-->
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Berikut Daftar Member Yang Telah Anda Pesan
						</div>
                </div>

            </div>
			
			<!-- Fungsi Menampikan Isi dari Database -->
					<?php
					$user_id = $_SESSION['user_id'];
                    $query1="select a.*, b.* from tb_member a, tb_pesan_member b where a.id_member=b.id_member AND b.user_id='$user_id'";
					// Fungsi Search
                    if(isset($_POST['qcari'])){
					$qcari=$_POST['qcari'];
					$query1="select a.*, b.* from tb_member a, tb_pesan_member b where a.id_member=b.id_member AND b.user_id='$user_id' AND b.tgl like '%$qcari%'";
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
					  <th><center>Tgl Pesan</center></th>
                      <th><center>Jumlah Jam</center></th>
					  <th><center>Waktu</center></th>
                      <th><center>Nama Lapangan</center></th>
					  <th><center>Harga</center></th>
					  <th><center>Status</center></th>
                      <th><center>Action</center></th>
                      
                    </tr>
                  </thead>
				  
                  <!-- Fungsi Menampilkan data dari database -->	
					<?php 
						$no=0;
						while($data=mysqli_fetch_array($tampil))
						{ $no++; ?>
								
					<tbody>
						 <td><center><?php echo $no; ?></center></td>
						 <td><center><?php echo $data['tgl'];?></center></td>
						<td><center><?php echo $data['jumlah_jam'];?> Jam</center></td>
						<td><center><?php echo $data['waktu'];?></center></td>
						<td><center><?php echo $data['nama_lapangan'];?></center></td>
						<td><center><strong>Rp. <?php echo $data['harga'];?></strong></center></td>
						<td><center><?php echo $data['status'];?></center></td>
						<!--
						<td><center><div id="thanks"><a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Edit List Harga" href="edit-harga.php?hal=edit&kd=<?php //echo $data['id_lapangan'];?>"><span class="fa fa-edit"> Edit</span></a>  
						<a onclick="return confirm ('Yakin hapus <?php ///echo $data['nama_lapangan'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus List Harga" href="hapus-list.php?hal=hapus&kd=<?php //echo $data['id_lapangan'];?>"><span class="fa fa-lg fa-trash"> Delete</span></a></center></td></tr></div>
						--> 
						 <?php
							if($data['status']=="Diterima" && $data['gambar']==null){
								?>
								<td>
								<form class="form-horizontal style-form" action="insert_pembayaran_member.php?hal=edit&kd=<?php echo $data['id_pesan_member'];?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
								<div class="form-group">
								<center><input name="nama_file" id="nama_file" type="file" /></center>
								</div>
								<center><button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button></center>
								</form>
								</td>
								<?php
							}else if($data['status']=="Diterima" && $data['gambar']!=null){
								?><td><center><img src="<?php echo $data['gambar'];?>" width="100" height="100" class="img-rounded" style="border: 3px solid #888;"/></center></td><?php
							}
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
