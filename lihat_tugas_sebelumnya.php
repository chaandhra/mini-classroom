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
		if ($_SESSION['level'] == "guru")
		{
			header('location:guru.php');
		}
		else if ($_SESSION['level'] == "siswa")
		{
		}
	}
?>
<?php
	if (isset($_GET['id'])) {
		$query = $DB_con->query("SELECT * FROM tugas WHERE id = '$_GET[id]'");
		$data  = $query->fetch(PDO::FETCH_ASSOC);
	} else {
		echo "kode tidak tersedia!
		<a href='data_tugas.php'>Kembali</a>";
		exit();
	}
 
	if ($data === false) {
		include 'header';
		echo "Data tidak ditemukan!
		<a href='data_tugas.php'>Kembali</a>";
		exit();
	}
?>
<html>
	<head>
		<title>UjianOnline.com/Siswa</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="admin/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="css/style_2.css">
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
									<img src="<?php echo "upload/siswa/".$_SESSION['gambar'] ?>" class="user-image" alt="User Image">
									<span class="hidden-xs"><?php echo $_SESSION['nama'] ?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="user-header">
										<img src="<?php echo "upload/siswa/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image">
										<p>
											Student
											<?php
											    $sql_bs = "SELECT bidang_study FROM siswa WHERE siswa.nisn = '$_SESSION[nisn_nip]'";
											    foreach ($DB_con->query($sql_bs) as $data_bs) :
											?>
											<small><?php echo $data_bs['bidang_study'] ?></small>
											<?php endforeach; ?>
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
						<img src="<?php echo "upload/siswa/".$_SESSION['gambar'] ?>" class="img-circle" alt="User Image" style="border-radius:50px;height:45px">
					</div>
					<div class="pull-left info">
						<p><?php echo $_SESSION['nama'] ?></p>
						<?php
						    $sql_kel = "SELECT kelas,nm_kelas FROM siswa WHERE siswa.nisn = '$_SESSION[nisn_nip]'";
						    foreach ($DB_con->query($sql_kel) as $data_kel) :
						?>
						<a href="#"><i class="fa fa-circle text-success"></i><?php echo $data_kel['kelas']."&nbsp;".$data_kel['nm_kelas'] ?></a>
						<?php endforeach; ?>
					</div>
				</div>
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="treeview">
						<a href="guru.php">
							<i class="fa fa-dashboard"></i> <span>Home</span>
						</a>
					</li>
					
					<li class="treeview">
						<a href="#">
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="data_hasil_siswa.php">
									<i class="fa fa-folder-open"></i> Data Hasil Ujian
								</a>
							</li>
						</ul>
					</li>
					
					<?php
						include 'koneksi.php';
					    $sql = "SELECT * FROM pelajaran,siswa WHERE siswa.nisn = '$_SESSION[nisn_nip]' AND pelajaran.bidang_study = siswa.bidang_study ";
					    foreach ($DB_con->query($sql) as $datas) :
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-book"></i> <span><?php echo $datas['nm_pelajaran'] ?></span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
								<small class="label pull-right bg-blue">
									<?php 
										$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
										$tt = $t->fetch(PDO::FETCH_ASSOC);
										$date_s = $tt['tanggal'];
										$a = $DB_con->query("SELECT COUNT(id) AS tugas FROM tugas,siswa WHERE tugas.pelajaran = '$datas[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND tugas.tanggal <= '$date_s' AND tugas.sampai >= '$date_s' AND tugas.kelas = siswa.kelas AND tugas.nm_kelas = siswa.nm_kelas");
										$b = $a->fetch(PDO::FETCH_ASSOC);
										$c = $b['tugas'];
										echo $c;
									?>
								</small>
								<small class="label pull-right bg-red">
									<?php 
										$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
										$tt = $t->fetch(PDO::FETCH_ASSOC);
										$date_s = $tt['tanggal'];
										$a = $DB_con->query("SELECT COUNT(kd_ujian) AS jadwal FROM jadwal_ujian,siswa WHERE jadwal_ujian.pelajaran = '$datas[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND jadwal_ujian.tgl_ujian <= '$date_s' AND jadwal_ujian.sampai >= '$date_s' AND jadwal_ujian.kelas = siswa.kelas AND jadwal_ujian.nm_kelas = siswa.nm_kelas");
										$b = $a->fetch(PDO::FETCH_ASSOC);
										$c = $b['jadwal'];
										echo $c;
									?>
								</small>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="jadwal_ujian.php?nm_pelajaran=<?php echo $datas['nm_pelajaran'] ?>"><i class="fa fa-folder-open"></i> Jadwal Ujian
									<span class="pull-right-container">
										<small class="label pull-right bg-red">
											<?php 
												$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
												$tt = $t->fetch(PDO::FETCH_ASSOC);
												$date_s = $tt['tanggal'];
												$a = $DB_con->query("SELECT COUNT(kd_ujian) AS jadwal FROM jadwal_ujian,siswa WHERE jadwal_ujian.pelajaran = '$datas[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND jadwal_ujian.tgl_ujian <= '$date_s' AND jadwal_ujian.sampai >= '$date_s' AND jadwal_ujian.kelas = siswa.kelas AND jadwal_ujian.nm_kelas = siswa.nm_kelas");
												$b = $a->fetch(PDO::FETCH_ASSOC);
												$c = $b['jadwal'];
												echo $c;
											?>
										</small>
									</span>
								</a>
							</li>
							<li>
								<a href="tugas.php?nm_pelajaran=<?php echo $datas['nm_pelajaran'] ?>"><i class="fa fa-tasks"></i> Tugas
									<span class="pull-right-container">
										<small class="label pull-right bg-blue">
											<?php 
												$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
												$tt = $t->fetch(PDO::FETCH_ASSOC);
												$date_s = $tt['tanggal'];
												$a = $DB_con->query("SELECT COUNT(id) AS tugas FROM tugas,siswa WHERE tugas.pelajaran = '$datas[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND tugas.tanggal <= '$date_s' AND tugas.sampai >= '$date_s' AND tugas.kelas = siswa.kelas AND tugas.nm_kelas = siswa.nm_kelas");
												$b = $a->fetch(PDO::FETCH_ASSOC);
												$c = $b['tugas'];
												echo $c;
											?>
										</small>
									</span>
								</a>
							</li>
						</ul>
					</li>
					<?php endforeach; ?>
					
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Tugas Sebelumnya
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Tugas Sebelumnya</li>
				</ol>
			</section>
			<section class="content">
				<form method="post" class="eusi" enctype="multipart/form-data" action="simpan_hasil.php" style="padding-top: 0px;margin-left:auto;margin-right:auto;background-color:#fff">
					<div class="containerr" style="width:100%;margin-top:0;padding:0;">
						<img src="images/lekukansegitiga.jpg" width="25%" style="float:right">
					</div>
					<div class="container" style="width:100%;margin-top:20px;">
						<table>
								<?php
								    $sql = "SELECT * FROM tugas where id = '$data[id]'";
								    foreach ($DB_con->query($sql) as $dataas) :
								?>
							<tr>
								<td>
									<?php echo $dataas['tugas'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
				</form>
			</section>
		</div>
            
		<footer class="main-footer">
			<strong>Copyright &copy; 2016 UjianOnline.com</strong> All rights reserved.
		</footer>
	</div>
		
		<script src="admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="admin/bootstrap/js/bootstrap.min.js"></script>
		<script src="admin/plugins/fastclick/fastclick.js"></script>
		<script src="admin/dist/js/app.min.js"></script>
		<script src="admin/plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="admin/plugins/chartjs/Chart.min.js"></script>
		<script src="admin/dist/js/pages/dashboard2.js"></script>
		<script src="admin/dist/js/demo.js"></script>
		
	</body>
</html>