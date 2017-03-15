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
<html>
	<head>
		<title>UjianOnline.com/Guru</title>
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
					<li class="treeview">
						<a href="guru.php">
							<i class="fa fa-dashboard"></i> <span>Home</span>
						</a>
					</li>
					<li class="active treeview">
						<a href="#">
							<i class="fa fa-play"></i> <span>Mulai Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_ujian.php"><i class="fa fa-folder-open"></i> Data Ujian</a></li>
							<li><a href="input_data_ujian.php"><i class="fa fa-tasks"></i> Input Data Ujian</a></li>
							<li class="active"><a href="tampilkan_ke_siswa.php"><i class="fa fa-eye"></i> Tampilkan Data Ujian</a></li>
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
					Tambah Ujian
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Tambah Ujian</li>
				</ol>
			</section>
			<section class="content">
				<form method="post" class="eusi" enctype="multipart/form-data" action="tampil.php" style="padding-top: 0px;margin-left:auto;margin-right:auto;background-color:#fff">
					<div class="containerr" style="width:100%;margin-top:0;padding:0;">
						<img src="images/lekukansegitiga.jpg" width="25%" style="float:right">
					</div>
					<div class="container" style="width:100%;margin-top:20px;">
						<input type="hidden" name="kd_ujian" value="<?php echo $data['kd_ujian'] ?>">
						<input type="hidden" name="tgl_ujian" value="<?php echo $data['tgl_ujian'] ?>">
						<input type="hidden" name="nm_ujian" value="<?php echo $data['nm_ujian'] ?>">
						<?php
							include 'koneksi.php';
						    $sql = "SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'";
							foreach ($DB_con->query($sql) as $dataa) :
						?>
						<input type="hidden" name="pelajaran" value="<?php echo $dataa['nm_pelajaran'] ?>">
						<?php endforeach; ?>
						<input type="hidden" name="kd_soal" value="<?php echo $data['kd_soal'] ?>">
						<input type="hidden" name="jml_soal" value="<?php echo $data['jml_soal'] ?>">
						
						<table>
							<tr>
								<td>Nama Ujian</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data['nm_ujian'] ?></td>
							</tr>
							<tr>
								<td>Pelajaran</td>
								<td>:</td>
								<td>&nbsp; &nbsp; <?php echo $data['pelajaran'] ?></td>
							</tr>
							<tr>
								<td>Jumlah Soal &nbsp; &nbsp;</td>
								<td>:</td>
								<td>&nbsp; &nbsp; 10</td>
							</tr>
						</table>
						<hr>
						
						<table>
							<?php
								include 'koneksi.php';
							    $sql = "SELECT * FROM soal_ujian,jadwal_ujian WHERE soal_ujian.kd_soal = '$data[kd_soal]' ORDER BY RAND() limit 10";
								foreach ($DB_con->query($sql) as $dataas) :
							?>
							<tr>
								<td><?php echo $dataas['pertanyaan'] ?></td>
							</tr>
							<tr>
								<td>
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
								<td>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="<?php echo"jawaban".$dataas['id']?>" value="a">A. &nbsp; &nbsp; <?php echo $dataas['a'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="<?php echo"jawaban".$dataas['id']?>" value="b">B. &nbsp; &nbsp; <?php echo $dataas['b'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="<?php echo"jawaban".$dataas['id']?>" value="c">C. &nbsp; &nbsp; <?php echo $dataas['c'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="<?php echo"jawaban".$dataas['id']?>" value="d">D. &nbsp; &nbsp; <?php echo $dataas['d'] ?><br>
									&nbsp; &nbsp; &nbsp; <input type="radio" name="<?php echo"jawaban".$dataas['id']?>" value="e">E. &nbsp; &nbsp; <?php echo $dataas['e'] ?><br>
									<br>
								</td>
							</tr>
							<?php endforeach; ?>
						</table>
						</div>

					<div class="container" style="background-color:#f1f1f1;width:100%">
						<a href="data_ujian.php"><button style="color: white;margin: 8px 0;border: none;cursor: pointer;" class="cancelbtn">Kembali</button></a>
					</div>
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