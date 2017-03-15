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
	if (isset($_GET['kd_ujian'])) {
		$query = $DB_con->query("SELECT * FROM jadwal_ujian WHERE kd_ujian = '$_GET[kd_ujian]'");
		$data  = $query->fetch(PDO::FETCH_ASSOC);
	} else {
		echo "kode tidak tersedia!
		<a href='data_ujian.php'>Kembali</a>";
		exit();
	}
 
	if ($data === false) {
		include 'header';
		echo "Data tidak ditemukan!
		<a href='data_ujian.php'>Kembali</a>";
		exit();
	}
?>
<?php
	$c = $DB_con->query("SELECT COUNT(kd_ujian) AS jumlah FROM jawaban WHERE kd_ujian = '$data[kd_ujian]' AND nisn = '$_SESSION[nisn_nip]'");
	$d = $c->fetch(PDO::FETCH_ASSOC);
	$e = $d['jumlah'];
	$a = $DB_con->query("SELECT * FROM jawaban WHERE nisn = '$_SESSION[nisn_nip]'");
	$b  = $a->fetch(PDO::FETCH_ASSOC);
	if ($e == $data['jml_soal']) {
		header("location:selesai.php?kd_ujian=$_GET[kd_ujian]");
	} else {
		
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
						<a href="guru.php" onclick="return confirm('Anda yakin tidak akan melanjutkan ujian ?')">
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
								<a href="data_hasil_siswa.php" onclick="return confirm('Anda yakin tidak akan melanjutkan ujian ?')">
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
								<a href="jadwal_ujian.php?nm_pelajaran=<?php echo $datas['nm_pelajaran'] ?>" onclick="return confirm('Anda yakin tidak akan melanjutkan ujian ?')" ><i class="fa fa-folder-open"></i> Jadwal Ujian
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
								<a href="tugas.php?nm_pelajaran=<?php echo $datas['nm_pelajaran'] ?>" onclick="return confirm('Anda yakin tidak akan melanjutkan ujian ?')"><i class="fa fa-tasks"></i> Tugas
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
					Ujian <?php echo $data['pelajaran'] ?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Ujian <?php echo $data['pelajaran'] ?></li>
				</ol>
			</section>
			<section class="content">
				<form method="post" class="eusi" enctype="multipart/form-data" action="simpan_hasil.php" style="padding-top: 0px;margin-left:auto;margin-right:auto;background-color:#fff">
					<div class="containerr" style="width:100%;margin-top:0;padding:0;">
						<img src="images/lekukansegitiga.jpg" width="25%" style="float:right">
					</div>
					<div class="container" style="width:100%;margin-top:20px;">
					
					<!--bagean nu arek di POST-->
					
						<?php
							include 'koneksi.php';
						    $sql = "SELECT * FROM siswa WHERE siswa.nisn = '$_SESSION[nisn_nip]'";
							foreach ($DB_con->query($sql) as $data_s) :
						?>
						<input type="hidden" name="kd_ujian" value="<?php echo $data['kd_ujian'] ?>">
						<input type="hidden" name="nisn" value="<?php echo $data_s['nisn'] ?>">
						<input type="hidden" name="nm_siswa" value="<?php echo $data_s['nm_siswa'] ?>">
						<input type="hidden" name="kelas" value="<?php echo $data_s['kelas'] ?>">
						<input type="hidden" name="nm_kelas" value="<?php echo $data_s['nm_kelas'] ?>">
						<input type="hidden" name="bidang_study" value="<?php echo $data_s['bidang_study'] ?>">
						<input type="hidden" name="kd_soal" value="<?php echo $data['kd_soal'] ?>">
						<input type="hidden" name="nm_pelajaran" value="<?php echo $data['pelajaran'] ?>">
						<input type="hidden" name="jml_soal" value="<?php echo $data['jml_soal'] ?>">
						<input type="hidden" name="nm_ujian" value="<?php echo $data['nm_ujian'] ?>">
						<input type="hidden" name="tgl_ujian" value="<?php echo $data['tgl_ujian'] ?>">
						<input type="hidden" name="nilai_kkm" value="<?php echo $data['nilai_kkm'] ?>">
						<table>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data_s['nm_siswa'] ?></td>
							</tr>
							<tr>
								<td>Kelas</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data_s['kelas']."&nbsp;".$data_s['nm_kelas'] ?></td>
							</tr>
							<tr>
								<td>Pelajaran</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data['pelajaran'] ?></td>
							</tr>
							<tr>
								<td>Jumlah Soal &nbsp; &nbsp;</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data['jml_soal'] ?></td>
							</tr>
						</table>
						<?php endforeach; ?>
						<hr>
						
						<table>
							
								<?php
									$res = $DB_con->query("SELECT COUNT(nisn) AS jumlah FROM jawaban where kd_ujian = '$data[kd_ujian]' AND nisn = '$_SESSION[nisn_nip]'");
									$row = $res->fetch(PDO::FETCH_ASSOC);
									$no = $row['jumlah'] + 1;
									$res_j = $DB_con->query("SELECT * FROM jawaban where kd_ujian = '$data[kd_ujian]' AND nisn = '$_SESSION[nisn_nip]'");
									$row_j = $res_j->fetch(PDO::FETCH_ASSOC);
									$z = $row_j['id_soal'];
								    $sql = "SELECT * FROM soal_ujian WHERE kd_soal = '$data[kd_soal]' AND nm_pelajaran = '$data[pelajaran]' AND no_soal = '$no' limit 1";
								    foreach ($DB_con->query($sql) as $dataas) :
								?>
							
							<tr>
								<td valign="top">
									<?php
										$res = $DB_con->query("SELECT COUNT(nisn) AS jumlah FROM jawaban where kd_ujian = '$data[kd_ujian]' AND nisn = '$_SESSION[nisn_nip]'");
										$row = $res->fetch(PDO::FETCH_ASSOC);
										$no = $row['jumlah'] + 1;
										echo $no.".&nbsp;&nbsp;";
									?>
								</td>
								<td>
									<input type="hidden" name="id" value="<?php echo $dataas['id'] ?>">
									<input type="hidden" name="kunci" value="<?php echo $dataas['kunci'] ?>">
									<input type="hidden" name="pertanyaan" value="<?php echo $dataas['pertanyaan'] ?>">
									<?php echo $dataas['pertanyaan'] ?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<?php
										if($dataas['gambar'] == ""){
										}
										else{
											echo"<img src=upload/soal/".$dataas['gambar']." width=200 height=100>" ;
										}
									?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="jawaban" value="a">A. &nbsp; &nbsp; <?php echo $dataas['a'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="jawaban" value="b">B. &nbsp; &nbsp; <?php echo $dataas['b'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="jawaban" value="c">C. &nbsp; &nbsp; <?php echo $dataas['c'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="jawaban" value="d">D. &nbsp; &nbsp; <?php echo $dataas['d'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="jawaban" value="e">E. &nbsp; &nbsp; <?php echo $dataas['e'] ?><br>
									<br>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
						</div>

					<div class="container" style="background-color:#f1f1f1;width:100%">
						<?php
							$res = $DB_con->query("SELECT COUNT(nisn) AS jumlah FROM jawaban WHERE nisn = '$_SESSION[nisn_nip]' AND kd_ujian = '$data[kd_ujian]'");
							$row = $res->fetch(PDO::FETCH_ASSOC);
							$no = $row['jumlah'];
							$jml_s = $data['jml_soal'];
							$t = $jml_s - 1;
							if ($no < $t){
								echo "<button onclick=\"return confirm('Apakah anda yakin dengan jawaban anda ?')\" style='background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;' type=submit>Lanjut</button>";
							}else{
								echo "<button onclick=\"return confirm('Apakah anda yakin dengan jawaban anda ?')\" style='background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;' type=submit>Selesai</button>";
							}
						?>
					</div>
					
					<!--nepika dieu wa-->
					
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