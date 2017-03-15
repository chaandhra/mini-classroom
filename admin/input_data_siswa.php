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
		<link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../css/style_2.css">
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
					<li class="treeview">
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
					<li class="active treeview">
						<a href="#">
							<i class="fa fa-group"></i> <span>Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_siswa.php"><i class="fa fa-folder-open"></i> Data Siswa</a></li>
							<li class="active"><a href="input_data_siswa.php"><i class="fa fa-tasks"></i> Input Data Siswa</a></li>
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
					Form Pendaftaran Siswa
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li>Dashboard</li>
					<li class="active">Form Pendaftaran Siswa</li>
				</ol>
			</section>
			<section class="content">
				<form method="post" class="eusi" enctype="multipart/form-data" action="simpan_siswa.php" style="margin-left:auto;margin-right:auto;background-color:#fff">
					<div class="imgcontainer">
						<img src="../upload/default.jpeg" id="preview_gambar" alt="Coba Gambar Lain" class="avatar">
						<input type="file" onchange="readURL(this);" id="file" class="inputfile" name="gambar" accept="image/*"><br>
						<label class="labelku" for="file">Pilih Gambar</label>
					</div>

					<div class="container" style="width:100%">
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="number" placeholder="Masukkan NISN" name="nisn" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Masukkan Nama" name="nm_siswa" required>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" placeholder="Bidang Study" name="bidang_study" required>
							<option value="" style="color: red">Pilih Bidang Study</option>
							<?php
								include 'koneksi.php';
							    $sql = "SELECT * FROM bidang_study ";
							    foreach ($DB_con->query($sql) as $dat) :
							?>
							<option><?php echo $dat['nm_bs'] ?></option>
							<?php endforeach; ?>
						</select>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="jns_kelamin" required>
							<option value="" style="color: red">Pilih Jenis Kelamin</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
							<option value="Lainnya">Lainnya</option>
						</select>
						<textarea placeholder="Alamat Lengkap" name="alamat" style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;resize:none;" required></textarea>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="number" placeholder="Umur" name="umur" required>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="kelas" required>
							<option value="" style="color: red">Pilih Kelas</option>
							<option value="X">X</option>
							<option value="XI">XI</option>
							<option value="XII">XII</option>
						</select>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="nm_kelas" required>
							<option value="" style="color: red">Pilih Nama Kelas</option>
							<?php
								include 'koneksi.php';
							    $sql = "SELECT * FROM kelas ";
							    foreach ($DB_con->query($sql) as $dataa) :
							?>
							<option><?php echo $dataa['kelas'] ?></option>
							<?php endforeach; ?>
						</select>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="No Telepon" name="no_telpon" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Agama" name="agama" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Email" name="email" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Tempat Lahir" name="tempat_lahir" required>
						<label>Tanggal Lahir</label>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="date" placeholder="yyyy-mm-dd" name="tgl_lahir" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Masukkan Username" name="username" required>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="password" placeholder="Masukkan Password" name="password" required>
						<button style="background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;" type="submit">Tambahkan</button>
					</div>

					<div class="container" style="background-color:#f1f1f1;width:100%">
						<button style="color: white;margin: 8px 0;border: none;cursor: pointer;" type="reset" class="cancelbtn">Reset</button>
					</div>
				</form>
			</section>
		</div>
            
		<footer class="main-footer">
			<strong>Copyright &copy; 2016 UjianOnline.com</strong> All rights reserved.
		</footer>
	</div>
		
		<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/fastclick/fastclick.js"></script>
		<script src="dist/js/app.min.js"></script>
		<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="plugins/chartjs/Chart.min.js"></script>
		<script src="dist/js/pages/dashboard2.js"></script>
		<script src="dist/js/demo.js"></script>
		<script>
			function readURL(input) {
			if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
			$('#preview_gambar')
			.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
			}
			}
		</script>
		
	</body>
</html>