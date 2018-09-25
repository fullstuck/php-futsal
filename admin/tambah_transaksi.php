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
	
	 <!-- Date Picker -->
        <link href="assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	
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
				<a class="btn btn-success" href="transaksi.php"><i class="fa fa-reply "></i> Kembali ke Menu Sebelumnya</a></div>
                    <h4 class="page-head-line">Input Data Transaksi</h4>

                </div>

            </div>
			
            
			<!-- Form Input Data -->
			<div class="col-md-12 col-sm-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Form Data Transaksi
                        </div>
                        <div class="panel-body">
                            
						<form action="insert-transaksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
						
                  <div class="form-group">
                    <label class="control-label">Nama Pemesan</label>
                    <input class="form-control" style="width:30%" id="nama" type="text" name="nama" placeholder="Masukkan Nama Pemesan">
				   </div>
				   <div class="form-group">
                              <label class="control-label">Hari Main</label>
                            <select name="hari_main" style="width:20%" class="form-control" required>
							<option value=""> -- Pilih Hari -- </option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jum'at">Jum'at</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Minggu</option>
						    </select>
                          </div>
                  <div class="form-group">
                    <label class="control-label">Tanggal Transaksi</label>
                    <input name="tgl_main" style="width:25%" id="tgl_main" class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" type="text" placeholder="Tanggal Lahir" required />  
				</div>
				  <div class="form-group">
                    <label class="control-label">Nama Lapangan</label> &nbsp;&nbsp;&nbsp;&nbsp; "Pastikan Anda Sudah Melihat <b>List Harga</b> Lapangan Terlebih Dahulu & Bagi Yang Ingin Menjadi Member Silahkan <b>Pilih Paket Member</b>"
                              <select name="id_lapangan" style="width:30%" class="form-control" onchange="document.getElementById('harga').value = harga[this.value]" required>
                              <option value=""> -- Pilih Lapangan -- </option> 
                              <?php
									$query1="select * from tb_lapangan";
									$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
									$jsArray = "var harga = new Array();\n";
									while($data=mysqli_fetch_array($tampil))
									{
								?>
							<option value="<?php echo $data['id_lapangan']; $id_lapangan=$data['id_lapangan']?>"><?php echo $data['nama_lapangan'];?></option>
						    <?php $jsArray .= "harga['" . $data['id_lapangan'] . "'] = '" . addslashes($data['harga']) . "';\n";  } ?>
                              </select>
                  </div>
				  
				  <div class="form-group">
                    <label class="control-label">Harga</label>
                    <input class="form-control" style="width:30%" id="harga" type="text" name="harga" disabled="disabled">
					<script type="text/javascript">  
					<?php echo $jsArray; ?>  
					</script>
				   </div>
				  
				   <div class="form-group">
                              <label class="control-label">Jam Mulai</label>
                            <select name="jam_mulai" style="width:15%" class="form-control" required>
							<option value=""> -- Pilih Jam -- </option>
							<option value="08:00">08:00</option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>							
						    </select>
                          </div>
				  <div class="form-group">
                              <label class="control-label">Jam Selesai</label>
                            <select name="jam_selesai" style="width:15%" class="form-control" required>
							<option value=""> -- Pilih Jam -- </option>
                            <option value="09:00">09:00</option>
                            <option value="10:00">10:00</option>
                            <option value="11:00">11:00</option>
                            <option value="12:00">12:00</option>
                            <option value="13:00">13:00</option>
                            <option value="14:00">14:00</option>
                            <option value="15:00">15:00</option>
                            <option value="16:00">16:00</option>
                            <option value="17:00">17:00</option>
                            <option value="18:00">18:00</option>
                            <option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
                            <option value="21:00">21:00</option>
							<option value="22:00">22:00</option>							
						    </select>
                          </div>
				   <div class="form-group">
                              <label class="control-label">Status Pembayaran</label>
                            <select name="keterangan" style="width:15%" class="form-control" required>
							<option value=""> -- Pilih Status -- </option>
                            <option value="Lunas">Lunas</option>
                            <option value="Dp">Dp</option>							
						    </select>
                          </div>
				   <div class="form-group">
                    <label class="control-label">Bukti Pembayaran</label> *di Upload pada saat mengisi <b>Transaksi Booking</b>*
                    <input name="nama_file" id="nama_file" type="file" />
                  </div>

				  
				  <div class="card-footer">
                <button class="btn btn-primary icon-btn" name="" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
				&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="transaksi.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
              </div>

					</form>
							
						</div>
                        <div class="panel-footer">
                            <marquee><strong>Vitka Futsal Center - Tiban, Kota Batam</strong></marquee>
                        </div>
                    </div>
                </div>
            </div>

			
			<!-- End Form Input Data -->

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
	<script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
	 
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
