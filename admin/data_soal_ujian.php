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
							<i class="fa fa-home"></i> <span>Home</span>
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
					<li class="active treeview">
						<a href="#">
							<i class="fa fa-file"></i> <span>Soal Ujian</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="active"><a href="data_soal_ujian.php"><i class="fa fa-folder-open"></i> Data Soal Ujian</a></li>
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
					Data Soal Ujian
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li>Dashboard</li>
					<li class="active">Data Soal Ujian</li>
				</ol>
			</section>
			<section class="content">
				<input class="alus" style="padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" id="myInputt" onkeyup="ngajarann()" placeholder="Cari dengan id">
				<input class="alus" style="padding: 12px 20px; margin: 8px 0; display: inline-block;border: 1px solid #ccc; box-sizing: border-box;" type="text" id="myInput" onkeyup="ngajaran()" placeholder="Cari dengan nama pelajaran">
				
				<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Soal Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="myTable">
						<tr>
							<th>Kode Soal</th>
							<th>Nama Pelajaran</th>
							<th>Pertanyaan</th>
							<th>gambar</th>
							<th>Jawaban (A)</th>
							<th>Jawaban (B)</th>
							<th>Jawaban (C)</th>
							<th>Jawaban (D)</th>
							<th>Jawaban (E)</th>
							<th>Kunci Jawaban</th>
						</tr>
					<?php
						include 'koneksi.php';
					    $sql = "SELECT * FROM soal_ujian ";
					    foreach ($DB_con->query($sql) as $data) :
					?>
						<tr>
							<td><?php echo $data['kd_soal'] ?></td>
							<td><?php echo $data['nm_pelajaran'] ?></td>
							<td><?php echo $data['pertanyaan'] ?></td>
							<td>
								<center>
								<?php
									if($data['gambar'] == ""){
									}
									else{
										echo"<img src=../upload/soal/".$data['gambar']." width=100 height=100>" ;
									}
								?>
								</center>
							</td>
							<td><?php echo $data['a'] ?></td>
							<td><?php echo $data['b'] ?></td>
							<td><?php echo $data['c'] ?></td>
							<td><?php echo $data['d'] ?></td>
							<td><?php echo $data['e'] ?></td>
							<td><?php echo $data['kunci'] ?></td>
							
							<td valign="center">
								<a href="hapus_soal_ujian.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data?')" title="Hapus">
									<button type="button" class="btn btn-default btn-sm">
										<i class="fa fa-eraser"></i>
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
function ngajaran() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
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
<script>
function ngajarann() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInputt");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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