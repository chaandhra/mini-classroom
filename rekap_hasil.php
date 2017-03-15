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
	if (isset($_POST)) {
		$query = $DB_con->query("SELECT * FROM hasil WHERE tgl_ujian = '$_POST[tgl_ujian]' AND nm_ujian = '$_POST[nm_ujian]' AND kelas = '$_POST[kelas]' AND nm_kelas = '$_POST[nm_kelas]'");
		$data_h  = $query->fetch(PDO::FETCH_ASSOC);
	} else {
		echo "kode tidak tersedia!
		<a href='data_hasil.php'>Kembali</a>";
		exit();
	}
 
	if ($data_h === false) {
		include 'header';
		echo "Data tidak ditemukan!
		<a href='data_hasil.php'>Kembali</a>";
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
		<style>
			.alus {
				width: 40%;
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
					<li class="active treeview">
						<a href="#">
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="data_hasil.php"><i class="fa fa-folder-open"></i> Data Hasil Ujian</a></li>
						</ul>
					</li>
				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Data Hasil Ujian
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Data Hasil Ujian</li>
				</ol>
			</section>
			<section class="content">
			
			<div class="alus box box-info collapsed-box">
				<div class="box-header">
					<i class="fa fa-search"></i>
					<h3 class="box-title">Cari nilai</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="minimized">
						<i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="box-body" style="display:none">
					<form action="#" method="post">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="NISN" id="myInputt" onkeyup="ngajarann()">
						</div>
					</form>
				</div>
				<div class="box-footer clearfix">
					<span class="pull-right btn btn-default">Lihat hasilnya dibawah
					<i class="fa fa-arrow-circle-down"></i></span>
				</div>
			</div>
			
				<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rekap Hasil Ujian</h3>
			  <a href="#" title="Print out" style="float: right">
				<button type="button" class="btn btn-default btn-sm">
					<i class="fa fa-print">&nbsp;&nbsp;Print</i>
				</button>
			  </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="myTable">
						<tr>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Tanggal</th>
							<th>Nama Ujian</th>
							<th>Kelas</th>
							<th>Nama Kelas</th>
							<th>Nama Pelajaran</th>
							<th>Jumlah Soal</th>
							<th>Nilai</th>
							<th>Hasil</th>
						</tr>
						<?php
							include 'koneksi.php';
						    $sql = "SELECT * FROM hasil,guru WHERE guru.nip = '$_SESSION[nisn_nip]' AND hasil.nm_pelajaran = guru.nm_pelajaran AND hasil.tgl_ujian = '$data_h[tgl_ujian]' AND hasil.nm_ujian = '$data_h[nm_ujian]' AND hasil.kelas = '$data_h[kelas]' AND hasil.nm_kelas = '$data_h[nm_kelas]' ORDER BY nilai DESC";
						    foreach ($DB_con->query($sql) as $data) :
						?>
						<tr>
							<td><?php echo $data['nisn'] ?></td>
							<td><?php echo $data['nm_siswa'] ?></td>
							<td><?php echo $data['tgl_ujian'] ?></td>
							<td><?php echo $data['nm_ujian'] ?></td>
							<td><?php echo $data['kelas'] ?></td>
							<td><?php echo $data['nm_kelas'] ?></td>
							<td><?php echo $data['nm_pelajaran'] ?></td>
							<td><?php echo $data['jml_soal'] ?></td>
							<td><?php echo $data['nilai'] ?></td>
							
							<?php
								if ($data['hasil'] == "Lulus"){
									echo "<td><span class='label label-success'>".$data['hasil']."</span></td>";
								}else{
									echo "<td><span class='label label-danger'>".$data['hasil']."</span></td>";
								}
							?>
							
							<td valign="center">
								<a href="report_guru.php?id=<?php echo $data['id'] ?>" title="Lihat Hasil">
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
		<script>
			function ngajarann() {
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInputt");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[0];
			    if (td) {
			      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    }       
			  }
			}
		</script>
		
	</body>
</html>