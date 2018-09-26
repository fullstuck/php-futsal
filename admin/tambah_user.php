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
				<a class="btn btn-success" href="user.php"><i class="fa fa-reply "></i> Kembali ke Menu Sebelumnya</a></div>
                    <h4 class="page-head-line">Input Data User</h4>

                </div>

            </div>
            
			<!-- Form Input Data -->
			<div class="col-md-12 col-sm-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Form Data User
                        </div>
                        <div class="panel-body">
                            
						<form class="form-horizontal style-form" action="insert-user.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
									
						
                  <div class="form-group">
                    <label class="control-label">Username</label>
                    <input class="form-control" style="width:20%" type="text" name="username" id="username" placeholder="Masukkan Username">
				  </div>
                  <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" style="width:25%" type="password" name="password" id="password" placeholder="Masukkan Password">
                  </div>
				  <div class="form-group">
                    <label class="control-label">Nama Lengkap</label>
                    <input class="form-control" style="width:40%" type="text" name="fullname" id="fullname" placeholder="Masukkan Nama Lengkap">
                  </div>
				  <div class="form-group">
                    <label class="control-label">No. HP</label>
				    <input class="form-control" style="width:20%" id="demoDate" type="text" name="no_hp" id="no_hp" placeholder="Masukkan No. HP">
				  </div>
				  <div class="form-group">
                    <label class="control-label">Hak Akses</label>
				    <input class="form-control" style="width:20%" id="hak_akses" type="text" name="hak_akses" id="no_hp" placeholder="Masukkan Hak Akses User">
				   </div>
				  <div class="form-group">
                    <label class="control-label">Foto User</label>
                    <input name="nama_file" id="nama_file" type="file" />
                  </div>
				  
				  <div class="card-footer">
                <button class="btn btn-primary icon-btn" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
				&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="user.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
</body>
</html>
