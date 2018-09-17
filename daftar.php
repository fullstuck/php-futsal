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
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="admin/assets/css/style.css" rel="stylesheet" />
     <!-- php5 Shiv and Respond.js for IE8 support of php5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	 <!-- Date Picker -->
        <link href="admin/assets/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="admin/assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	
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

                    <img src="admin/assets/img/logo.png" />
                </a>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                           
                           
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
							<a href="admin/login.php"><button class="btn btn-primary btn-lg" >
							Sign In
                            </button></a>
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
				<a class="btn btn-danger" href="index.php"><i class="fa fa-fast-backward "></i> Kembali ke Menu Utama</a>
				<a  href="booking.php"><i></i></a></div>
                <h4 class="page-head-line">Sign Up</h4>

                </div>

            </div>
			
            
			<!-- Form Input Data -->
			<div class="col-md-12 col-sm-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Form Pendaftaran
                        </div>
                        <div class="panel-body">
                            
				<form action="admin/insert-user.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
						
                <div class="form-group">
					<label class="control-label">Username</label>
                    <input class="form-control" style="width:30%" id="username" type="text" name="username" placeholder="Masukkan Username">
				</div>
				
				<div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" style="width:30%" id="password" type="password" name="password" placeholder="Masukkan Password">
				</div>				
                  
				<div class="form-group">
                    <label class="control-label">Nama</label>
                    <input class="form-control" style="width:30%" id="fullname" type="text" name="fullname" placeholder="Masukkan Nama">
				</div>
				
				<div class="form-group">
                    <label class="control-label">No. HP</label>
                    <input class="form-control" style="width:30%" id="no_hp" type="text" name="no_hp" placeholder="Masukkan Nomor HP">
				</div>
				<div class="form-group">
                    <label class="control-label">Foto(Jika ada)</label>
                    <input name="nama_file" id="nama_file" type="file" />
                </div>
				<div class="form-group" hidden>
                    <label class="control-label">Hak Akses</label>
                    <input class="form-control" style="width:30%" id="hak_akses" type="text" name="hak_akses" value="penyewa">
				</div>
				  <div class="card-footer">
                <button class="btn btn-primary icon-btn" name="input" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
				&nbsp;&nbsp;&nbsp;<a class="btn btn-default icon-btn" href="index.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
    <script src="admin/assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="admin/assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="admin/assets/js/bootstrap-datepicker.min.js"></script>
	 <!-- daterangepicker -->
        <script src="admin/assets/js/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="admin/assets/js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>

	<script>
		//options method for call datepicker
		$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
		</script>
</body>
</html>
