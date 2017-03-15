<!DOCTYPE html>
<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['level'])) {
    header("Location: login.php");
}
if (isset($_SESSION['level']))
{
	if ($_SESSION['level'] == "admin")
	{
		header('location:admin/index.php');
	}
	if ($_SESSION['level'] == "siswa")
	{
		header('location:siswa.php');
	}
	else if ($_SESSION['level'] == "guru")
	{
	}
}
?>
<html>
	<head>
		<title>UjianOnline.com/Guru</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="admin/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="css/style_2.css">
		<!-- iCheck -->
		<link rel="stylesheet" href="admin/plugins/iCheck/flat/blue.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="admin/plugins/morris/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="admin/plugins/datepicker/datepicker3.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	</head>
	
	<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<header class="main-header">
			<a href="#" class="logo">
				<span class="logo-mini"><b>U.O.</b></span>
				<span class="logo-lg"><b>Ujian</b>Online.com</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo "upload/guru/".$_SESSION['gambar'] ?>" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="<?php echo "upload/guru/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image">
									<p>
										Teacher
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
						<img src="<?php echo "upload/guru/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image" style="border-radius:50px;height:45px">
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
						<a href="guru.php">
							<i class="fa fa-dashboard"></i> <span>Home</span>
						</a>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-play"></i> <span>Mulai Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_ujian.php"><i class="fa fa-folder-open"></i> Data Ujian</a></li>
							<li><a href="input_data_ujian.php"><i class="fa fa-tasks"></i> Input Data Ujian</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-plus"></i> <span>Soal Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_soal.php"><i class="fa fa-folder-open"></i> Data Soal</a></li>
							<li><a href="input_data_soal.php"><i class="fa fa-tasks"></i> Input Data Soal</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-pencil"></i> <span>Buat Tugas</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_tugas.php"><i class="fa fa-folder-open"></i> Data Tugas</a></li>
							<li><a href="input_data_tugas.php"><i class="fa fa-tasks"></i> Input Data Tugas</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_hasil.php"><i class="fa fa-folder-open"></i> Data Hasil Ujian</a></li>
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
						<li><a href="file.php">File</a></li>
				</ol>
			</section>
			<section class="content">
			
				<!-- bagean nu alus -->
				
				<div class="row">
				<section class="col-lg-7 connectedSortable">
				<div class="row">
					<div class="col-lg-3 col-xs-6" style="width: 50%">
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><i class="fa fa-play"></i></h3>
								<p>Mulai ujian</p>
							</div>
							<div class="icon">
								<i class="fa fa-play"></i>
							</div>
							<a href="data_ujian.php" class="small-box-footer">Mulai ujian <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<div class="col-lg-3 col-xs-6" style="width: 50%">
						<div class="small-box bg-green">
							<div class="inner">
								<h3><i class="fa fa-pencil"></i></h3>
								<p>Buat Tugas</p>
							</div>
							<div class="icon">
								<i class="fa fa-pencil"></i>
							</div>
							<a href="data_tugas.php" class="small-box-footer">Buat tugas <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				</section>
				<section class="col-lg-5 connectedSortable">
					<div class="col-md-4" style="width: 100%">
						<div class="box box-widget widget-user-2">
							<div class="widget-user-header bg-yellow">
								<div class="widget-user-image">
									<img class="img-circle" src="<?php echo "upload/guru/".$_SESSION['gambar'] ?>" alt="User Avatar">
								</div>
								<h3 class="widget-user-username"><?php echo $_SESSION['nama'] ?></h3>
								<h5 class="widget-user-desc">
									<?php  
										$job = $DB_con->query("SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'");
										$hasil = $job->fetch(PDO::FETCH_ASSOC);
										echo "Guru&nbsp;".$hasil['nm_pelajaran'];
									?>
								</h5>
							</div>
							<div class="box-footer no-padding">
								<ul class="nav nav-stacked">
									<li>
										<a href="data_ujian.php">
											Daftar Ujian 
											<span class="pull-right badge bg-blue">
												<?php 
													$job = $DB_con->query("SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'");
													$hasil = $job->fetch(PDO::FETCH_ASSOC);
													$a = $DB_con->query("SELECT COUNT(kd_ujian) AS jadwal FROM jadwal_ujian WHERE jadwal_ujian.pelajaran = '$hasil[nm_pelajaran]'");
													$b = $a->fetch(PDO::FETCH_ASSOC);
													$c = $b['jadwal'];
													echo $c;
												?>
											</span>
										</a>
									</li>
					                <li>
										<a href="data_tugas.php">
											Daftar Tugas 
											<span class="pull-right badge bg-aqua">
												<?php 
													$job = $DB_con->query("SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'");
													$hasil = $job->fetch(PDO::FETCH_ASSOC);
													$a = $DB_con->query("SELECT COUNT(id) AS jadwal_t FROM tugas WHERE tugas.pelajaran = '$hasil[nm_pelajaran]'");
													$b = $a->fetch(PDO::FETCH_ASSOC);
													$c = $b['jadwal_t'];
													echo $c;
												?>
											</span>
										</a>
									</li>
					                <li>
										<a href="data_soal.php">
											Daftar Soal 
											<span class="pull-right badge bg-green">
												<?php 
													$job = $DB_con->query("SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'");
													$hasil = $job->fetch(PDO::FETCH_ASSOC);
													$a = $DB_con->query("SELECT COUNT(id) AS jadwal_s FROM soal_ujian WHERE soal_ujian.nm_pelajaran = '$hasil[nm_pelajaran]'");
													$b = $a->fetch(PDO::FETCH_ASSOC);
													$c = $b['jadwal_s'];
													echo $c;
												?>
											</span>
										</a>
									</li>
					            </ul>
							</div>
						</div>
					</div>
			    </section>
			    </div>
				
				<!-- nepika dieu -->
				
			</section>
		</div>
            
		<footer class="main-footer">
			<strong>Copyright &copy; 2016 UjianOnline.com</strong> All rights reserved.
		</footer>
	</div>
		
		<!-- jQuery 2.2.3 -->
		<script src="admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="admin/bootstrap/js/bootstrap.min.js"></script>
		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
		<script src="admin/plugins/morris/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="admin/plugins/sparkline/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="admin/plugins/knob/jquery.knob.js"></script>
		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
		<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="admin/plugins/datepicker/bootstrap-datepicker.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<!-- Slimscroll -->
		<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="admin/plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src="admin/dist/js/app.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="admin/dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="admin/dist/js/demo.js"></script>
		
	</body>
</html>