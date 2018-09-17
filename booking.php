<?php
include "./admin/koneksi.php";
?>

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
    <link href="admin/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="admin/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="admin/admin/assets/css/style.css" rel="stylesheet" />
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
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">

                    <img src="admin/admin/assets/img/logo.png" />
                </a>

            </div>

           
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <!--  Modals-->
                        <div class="panel-body">
						<div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              About Us
                            </button>
                             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">About Us</h4>
                                        </div>
                                        <div class="modal-body">
										Untuk info lebih lanjut seputar <strong>Vitka Futsal Center</strong> anda bisa menghubungi kami di alamat berikut :<p>
										<strong>Komplek </strong>SPBU No. 14-294-722 Vitka Point (Tiban)<br>
											<strong>Telp: </strong>0778 - 326623, 326289 <br>
											<strong>Fax: </strong>0778 - 326389<p>
											
											<b>Bank Mandiri</b></br>
											No. Rek 1090014625800 </br>
											a.n Irawati Sitompul

                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
                    
                     <!-- End Modals-->
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
				<a class="btn btn-success" href="index.php"><i class="fa fa-fast-backward "></i> Kembali ke Menu Sebelumnya</a></div>
                    <h4 class="page-head-line">Menu Transaksi Booking</h4>
				<div align="right">	
				<a class="btn btn-primary" href="tambah_transaksi.php"><i class="fa fa-plus-square "></i> Tambah Data Transaksi </a></div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Berikut Info Lengkap Seputar Transaksi Booking 
						</div>
                </div>

            </div>
			
			<!-- Fungsi Menampilkan Data Transaksi dari Database -->					
					<?php
                    $query1="SELECT nama, tgl_main, tb_lapangan.nama_lapangan, hari_main, jam_mulai, jam_selesai, keterangan
								FROM tb_transaksi, tb_lapangan
								WHERE tb_transaksi.id_lapangan=tb_lapangan.id_lapangan 
								ORDER BY id_transaksi DESC limit 20";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
					<!-- End -->
					<!-- Fungsi Menampikan Informasi jika ada data yang akan dihapus dari database -->
					<?php
						 if(isset($_GET['hal']) == 'hapus'){
							$id_transaksi = $_GET['kd'];
							$cek = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE id_transaksi='$id_transaksi'");
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
					  <th><center>Hari Main</center></th>
                      <th><center>Nama Lapangan</center></th>
                      <th><center>Jam Mulai</center></th>
					  <th><center>Jam Selesai</center></th>
					  <th><center>Status Pembayaran</center></th>
                    </tr>
                  </thead>
					<!-- Fungsi Menampilkan data dari database -->	
					<?php 
					 $no=0;
					 while($data=mysqli_fetch_array($hasil))
					{ $no++; ?>
								
					<tbody>
						 <td><center><?php echo $no; ?></center></td>
						<td><center><?php echo $data['nama'];?></center></td>
						<td><center><strong><?php echo $data['tgl_main'];?></strong></center></td>
						<td><center><?php echo $data['hari_main'];?></center></td>
						<td><center><?php echo $data['nama_lapangan'];?></center></td>
						<td><center><span class="label label-success"><?php echo $data['jam_mulai'];?></span></center></td>
						<td><center><span class="label label-danger"><?php echo $data['jam_selesai'];?></span></center></td>
						<td><center><strong><?php echo $data['keterangan'];?></strong></center></td>
					 <?php } ?>
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
    <script src="admin/admin/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="admin/admin/assets/js/bootstrap.js"></script>
</body>
</html>
