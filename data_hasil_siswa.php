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
		<style>
			.hore {
				width: 35%;
				height: auto;
			}
			.lockscreen-logo{
					font-size: 25px;
				}
			@media screen and (max-width: 500px) {
				img.hore {
					width: 100%;
					height: auto;
				}
				.lockscreen-logo{
					font-size: 20px;
				}
			}
		</style>
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
					<div class="pull-left image user-header">
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
					<li class="treeview">
						<a href="guru.php">
							<i class="fa fa-dashboard"></i> <span>Home</span>
						</a>
					</li>
					
					<li class="active treeview">
						<a href="#">
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="data_hasil_siswa.php"><i class="fa fa-folder-open"></i> Data Hasil Ujian</a></li>
						</ul>
					</li>
					
					
					<?php
						include 'koneksi.php';
					    $sql = "SELECT * FROM pelajaran,siswa WHERE siswa.nisn = '$_SESSION[nisn_nip]' AND pelajaran.bidang_study = siswa.bidang_study ";
					    foreach ($DB_con->query($sql) as $data) :
					?>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-book"></i> <span><?php echo $data['nm_pelajaran'] ?></span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
								<small class="label pull-right bg-blue">
									<?php 
										$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
										$tt = $t->fetch(PDO::FETCH_ASSOC);
										$date_s = $tt['tanggal'];
										$a = $DB_con->query("SELECT COUNT(id) AS tugas FROM tugas,siswa WHERE tugas.pelajaran = '$data[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND tugas.tanggal <= '$date_s' AND tugas.sampai >= '$date_s' AND tugas.kelas = siswa.kelas AND tugas.nm_kelas = siswa.nm_kelas");
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
										$a = $DB_con->query("SELECT COUNT(kd_ujian) AS jadwal FROM jadwal_ujian,siswa WHERE jadwal_ujian.pelajaran = '$data[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND jadwal_ujian.tgl_ujian <= '$date_s' AND jadwal_ujian.sampai >= '$date_s' AND jadwal_ujian.kelas = siswa.kelas AND jadwal_ujian.nm_kelas = siswa.nm_kelas");
										$b = $a->fetch(PDO::FETCH_ASSOC);
										$c = $b['jadwal'];
										echo $c;
									?>
								</small>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="jadwal_ujian.php?nm_pelajaran=<?php echo $data['nm_pelajaran'] ?>"><i class="fa fa-folder-open"></i> Jadwal Ujian
								<span class="pull-right-container">
									<small class="label pull-right bg-red">
										<?php 
											$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
											$tt = $t->fetch(PDO::FETCH_ASSOC);
											$date_s = $tt['tanggal'];
											$a = $DB_con->query("SELECT COUNT(kd_ujian) AS jadwal FROM jadwal_ujian,siswa WHERE jadwal_ujian.pelajaran = '$data[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND jadwal_ujian.tgl_ujian <= '$date_s' AND jadwal_ujian.sampai >= '$date_s' AND jadwal_ujian.kelas = siswa.kelas AND jadwal_ujian.nm_kelas = siswa.nm_kelas");
											$b = $a->fetch(PDO::FETCH_ASSOC);
											$c = $b['jadwal'];
											echo $c;
										?>
									</small>
								</span>
								</a>
							</li>
							<li>
								<a href="tugas.php?nm_pelajaran=<?php echo $data['nm_pelajaran'] ?>"><i class="fa fa-tasks"></i> Tugas
								<span class="pull-right-container">
									<small class="label pull-right bg-blue">
										<?php 
											$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
											$tt = $t->fetch(PDO::FETCH_ASSOC);
											$date_s = $tt['tanggal'];
											$a = $DB_con->query("SELECT COUNT(id) AS tugas FROM tugas,siswa WHERE tugas.pelajaran = '$data[nm_pelajaran]' AND siswa.nisn = '$_SESSION[nisn_nip]' AND tugas.tanggal <= '$date_s' AND tugas.sampai >= '$date_s' AND tugas.kelas = siswa.kelas AND tugas.nm_kelas = siswa.nm_kelas");
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
					Hasil Ujian Siswa
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Hasil Ujian Siswa</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Hasil Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
				
				<tr>
                  <th>NISN</th>
                  <th>Nama</th>
                  <th>Judul Ujian</th>
                  <th>Tanggal Ujian</th>
                  <th>Kelas</th>
                  <th>Nama Kelas</th>
                  <th>Pelajaran</th>
                  <th>Hasil</th>
                </tr>
				
				<?php
					include 'koneksi.php';
					$sql = "SELECT * FROM hasil WHERE nisn = '$_SESSION[nisn_nip]' ORDER BY id DESC";
				    foreach ($DB_con->query($sql) as $data_h) :
				?>
				
                <tr>
					<td><?php echo $data_h['nisn'] ?></td>
					<td><?php echo $data_h['nm_siswa'] ?></td>
					<td><?php echo $data_h['nm_ujian'] ?></td>
					<td><?php echo $data_h['tgl_ujian'] ?></td>
					<td><?php echo $data_h['kelas'] ?></td>
					<td><?php echo $data_h['nm_kelas'] ?></td>
					<td><?php echo $data_h['nm_pelajaran'] ?></td>
					<?php
						if ($data_h['hasil'] == "Lulus"){
							echo "<td><span class='label label-success'>".$data_h['hasil']."</span></td>";
						}else{
							echo "<td><span class='label label-danger'>".$data_h['hasil']."</span></td>";
						}
					?>
					<td valign="center">
						<a href="report_siswa.php?kd_ujian=<?php echo $data_h['kd_ujian'] ?>" title="Lihat Hasil">
							<button type="button" class="btn btn-default btn-sm">
								<i class="fa fa-files-o"></i>
							</button>
						</a>
					</td>
                </tr>
				
				<?php endforeach; ?>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
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