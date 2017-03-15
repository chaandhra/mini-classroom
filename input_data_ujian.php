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
		<link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="admin/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="css/style_2.css">
		<style>
			.alus {
				width: 25%;
			}
			
			@media screen and (max-width: 500px) {
			    .alus {
					width: 100%;
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
							<li class="active"><a href="input_data_ujian.php"><i class="fa fa-tasks"></i> Input Data Ujian</a></li>
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
					Tambah Ujian
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Tambah Ujian</li>
				</ol>
			</section>
			<section class="content">
				<form method="post" class="eusi" enctype="multipart/form-data" action="simpan_ujian.php" style="margin-left:auto;margin-right:auto;background-color:#fff">
					<div class="container" style="width:100%">
						<label>Tanggal Ujian</label>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="date" placeholder="Tanggal Ujian *yyyy-mm-dd" name="tgl_ujian" onclick="document.getElementById('myTable').style.display='none'" required>
						<label>Sampai Tanggal</label>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="date" placeholder="Sampai Tanggal *yyyy-mm-dd" name="sampai" onclick="document.getElementById('myTable').style.display='none'" required>
						
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="nm_ujian" onclick="document.getElementById('myTable').style.display='none'" required>
							<option value="" style="color: red">Pilih Judul Ujian</option>
							<option value="Ulangan harian">Ulangan harian</option>
							<option value="UTS">UTS</option>
							<option value="UAS Ganjil">UAS Ganjil</option>
							<option value="UAS Genap">UAS Genap</option>
						</select>
						
						<?php
							include 'koneksi.php';
						    $sql = "SELECT * FROM guru WHERE guru.nip = '$_SESSION[nisn_nip]'";
							foreach ($DB_con->query($sql) as $dataa) :
						?>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Pelajaran" name="pelajaran" readonly="readonly" value="<?php echo $dataa['nm_pelajaran'] ?>">
						<?php endforeach; ?>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" placeholder="Kode Soal" name="kd_soal" onclick="document.getElementById('myTable').style.display='inline'" required>
						<div class="row">
        <div class="col-xs-12">
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="myTable" style="font-size: 13px">
								<tr>
									<th>Kode Soal</th>
									<th>Soal Tersedia</th>
									<th>Contoh Pertanyaan</th>
								</tr>
							<?php
								include 'koneksi.php';
							    $sql = "SELECT * FROM soal_ujian,guru WHERE guru.nip = '$_SESSION[nisn_nip]' AND soal_ujian.nm_pelajaran = guru.nm_pelajaran GROUP BY kd_soal";
							    foreach ($DB_con->query($sql) as $data) :
							?>
								<tr>
									<td><?php echo $data['kd_soal'] ?></td>
									<td><span class="label label-success">
										<?php 
											$c = $DB_con->query("SELECT count(no_soal) AS max FROM soal_ujian WHERE kd_soal = '$data[kd_soal]'");
											$d = $c->fetch(PDO::FETCH_ASSOC);
											$max = $d['max'];
											echo $max."&nbsp;&nbsp;Soal";
										?>
									</span></td>
									<td><?php echo $data['pertanyaan'] ?></td>
								</tr>
								<?php endforeach; ?>
							</table>
            </div>
            <!-- /.box-body -->
        </div>
      </div>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="kelas" onclick="document.getElementById('myTable').style.display='none'" required>
							<option value="" style="color: red">Pilih Kelas</option>
							<option value="X">X</option>
							<option value="XI">XI</option>
							<option value="XII">XII</option>
						</select>
						<select style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" name="nm_kelas" onclick="document.getElementById('myTable').style.display='none'" required>
							<option value="" style="color: red">Pilih Nama Kelas</option>
							<?php
								include 'koneksi.php';
							    $sql = "SELECT * FROM kelas ";
							    foreach ($DB_con->query($sql) as $dataa) :
							?>
							<option><?php echo $dataa['kelas'] ?></option>
							<?php endforeach; ?>
						</select>
						
						<span class="label label-danger"><small>* Untuk jumlah soal cek terlebih dahulu jumlah soal tersedia</small></span>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="number" placeholder="Jumlah Soal" name="jml_soal" onclick="document.getElementById('myTable').style.display='none'" required>
						
						<span class="label label-danger"><small>* Untuk nilai kkm 10 - 100</small></span>
						<input style="width:100%; padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="number" placeholder="Nilai KKM" name="nilai_kkm" onclick="document.getElementById('myTable').style.display='none'" min="10" max="100" required>
						
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