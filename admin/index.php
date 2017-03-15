<!DOCTYPE html>
<?php
include '../koneksi.php';
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: ../login.php");
}
if (isset($_SESSION['level']))
{
	if ($_SESSION['level'] == "admin")
	{
	}
	if ($_SESSION['level'] == "guru")
	{
		header('location: ../guru.php');
	}
	else if ($_SESSION['level'] == "siswa")
	{
		header('location: ../siswa.php');
	}
}
?>
<html>
	<head>
		<title>UjianOnline.com/Admin</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../css/style_2.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="plugins/morris/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<a href="#" class="logo">
				<span class="logo-mini"><b>U.O.</b></span>
				<span class="logo-lg"><b>Admin</b> Panel</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo "../upload/admin/".$_SESSION['gambar'] ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo "../upload/admin/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image">
									<p>
										Administrator Web
										<small>UjianOnline.com</small>
					                </p>
								</li>
								<li class="user-footer">
									<div class="pull-right">
										<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
  
		<aside class="main-sidebar">
			<section class="sidebar">
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo "../upload/admin/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image" style="border-radius:50px;height:45px">
					</div>
					<div class="pull-left info">
						<p><?php echo $_SESSION['nama'] ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<form action="https://google.com/search" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Google search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="active treeview">
						<a href="index.php">
							<i class="fa fa-dashboard"></i> <span>Home</span>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-gears"></i> <span>Admin</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_admin.php"><i class="fa fa-folder-open"></i> Data Admin</a></li>
							<li><a href="input_data_admin.php"><i class="fa fa-tasks"></i> Input Data Admin</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-user"></i> <span>Guru</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_guru.php"><i class="fa fa-folder-open"></i> Data Guru</a></li>
							<li><a href="input_data_guru.php"><i class="fa fa-tasks"></i> Input Data Guru</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-group"></i> <span>Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_siswa.php"><i class="fa fa-folder-open"></i> Data Siswa</a></li>
							<li><a href="input_data_siswa.php"><i class="fa fa-tasks"></i> Input Data Siswa</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-file"></i> <span>Soal Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_soal_ujian.php"><i class="fa fa-folder-open"></i> Data Soal Ujian</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-table"></i> <span>Kelas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_kelas.php"><i class="fa fa-folder-open"></i> Data Kelas</a></li>
							<li><a href="input_data_kelas.php"><i class="fa fa-tasks"></i> Input Data Kelas</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-gear"></i> <span>Bidang Study</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_bidang.php"><i class="fa fa-folder-open"></i> Data Bidang Study</a></li>
							<li><a href="input_data_bidang.php"><i class="fa fa-tasks"></i> Input Data Bidang Study</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-book"></i> <span>Pelajaran</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_pelajaran.php"><i class="fa fa-folder-open"></i> Data Pelajaran</a></li>
							<li><a href="input_data_pelajaran.php"><i class="fa fa-tasks"></i> Input Data Pelajaran</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_hasil_ujian.php"><i class="fa fa-folder-open"></i> Data Hasil Ujian</a></li>
						</ul>
					</li>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Dashboard
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>
									<?php 
										$admin = $DB_con->query("SELECT COUNT(nia) AS j_admin FROM admin");
										$j_admin = $admin->fetch(PDO::FETCH_ASSOC);
										$t_admin = $j_admin['j_admin'];
										echo $t_admin;
									?>
								</h3>
								<p>Admin</p>
							</div>
							<div class="icon">
								<i class="fa fa-gears"></i>
							</div>
							<a href="data_admin.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
			        </div>
			        <div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3>
									<?php 
										$guru = $DB_con->query("SELECT COUNT(nip) AS j_guru FROM guru");
										$j_guru = $guru->fetch(PDO::FETCH_ASSOC);
										$t_guru = $j_guru['j_guru'];
										echo $t_guru;
									?>
								</h3>
								<p>Guru</p>
							</div>
							<div class="icon">
								<i class="fa fa-user"></i>
							</div>
							<a href="data_guru.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
			        </div>
			        <div class="col-lg-3 col-xs-6">
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>
									<?php 
										$siswa = $DB_con->query("SELECT COUNT(nisn) AS j_siswa FROM siswa");
										$j_siswa = $siswa->fetch(PDO::FETCH_ASSOC);
										$t_siswa = $j_siswa['j_siswa'];
										echo $t_siswa;
									?>
								</h3>
								<p>Siswa</p>
							</div>
							<div class="icon">
								<i class="fa fa-group"></i>
							</div>
							<a href="data_siswa.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
			        </div>
			        <div class="col-lg-3 col-xs-6">
						<div class="small-box bg-red">
							<div class="inner">
								<h3>
									<?php 
										$jurusan = $DB_con->query("SELECT COUNT(id) AS j_jurusan FROM bidang_study");
										$j_jurusan = $jurusan->fetch(PDO::FETCH_ASSOC);
										$t_jurusan = $j_jurusan['j_jurusan'];
										echo $t_jurusan;
									?>
								</h3>
								<p>Jurusan</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a href="data_bidang.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
			        </div>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>
									<?php 
										$kelas = $DB_con->query("SELECT COUNT(id) AS j_kelas FROM kelas");
										$j_kelas = $kelas->fetch(PDO::FETCH_ASSOC);
										$t_kelas = $j_kelas['j_kelas'];
										echo $t_kelas;
									?>
								</h3>
								<p>Kelas</p>
							</div>
							<div class="icon">
								<i class="fa fa-table"></i>
							</div>
							<a href="data_kelas.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
			        </div>
					<div class="col-lg-3 col-xs-6">
						<div class="small-box bg-green">
							<div class="inner">
								<h3>
									<?php 
										$pelajaran = $DB_con->query("SELECT COUNT(kd_pelajaran) AS j_pelajaran FROM pelajaran GROUP BY nm_pelajaran");
										$j_pelajaran = $pelajaran->fetch(PDO::FETCH_ASSOC);
										$t_pelajaran = $j_pelajaran['j_pelajaran'];
										echo $t_pelajaran;
									?>
								</h3>
								<p>Pelajaran</p>
							</div>
							<div class="icon">
								<i class="fa fa-book"></i>
							</div>
							<a href="data_pelajaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
			</section>
		</div>
            
		<footer class="main-footer">
			<strong>Copyright &copy; 2016 UjianOnline.com</strong> All rights reserved.
		</footer>
	</div>
		
		<!-- jQuery 2.2.3 -->
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="plugins/morris/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="dist/js/app.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="dist/js/demo.js"></script>
		
	</body>
</html>