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
if (isset($_GET['nm_pelajaran'])) {
    $query = $DB_con->query("SELECT * FROM tugas WHERE pelajaran = '$_GET[nm_pelajaran]'");
    $data  = $query->fetch(PDO::FETCH_ASSOC);
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
							<i class="fa fa-bar-chart"></i> <span>Hasil Ujian Siswa</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="data_hasil_siswa.php"><i class="fa fa-folder-open"></i> Data Hasil Ujian</a></li>
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
				<?php
					$sql_pel = "SELECT * FROM pelajaran WHERE nm_pelajaran = '$_GET[nm_pelajaran]' GROUP BY nm_pelajaran";
					foreach ($DB_con->query($sql_pel) as $data_pel) :
				?>
				<h1>
					Tugas <?php echo $data_pel['nm_pelajaran'] ?>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Tugas <?php echo $data_pel['nm_pelajaran'] ?></li>
				</ol>
				<?php endforeach; ?>
			</section>
			<section class="content">
	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tugas Hari Ini</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
						<tr>
							<th>Tugas</th>
							<th>Tanggal Tugas</th>
							<th>Sampai Tanggal</th>
							<th>Judul Tugas</th>
							<th>Nama Pelajaran</th>
							<th>Kelas</th>
							<th>Nama Kelas</th>
						</tr>
						<?php
						//$date_s = date("Y-m-d");
						$s = $DB_con->query("SELECT * FROM siswa where nisn = '$_SESSION[nisn_nip]'");
						$siswa = $s->fetch(PDO::FETCH_ASSOC);
						$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
						$tt = $t->fetch(PDO::FETCH_ASSOC);
						$date_s = $tt['tanggal'];
						$kueri = "SELECT * FROM tugas WHERE pelajaran = '$data[pelajaran]' AND tanggal <= '$date_s' AND sampai >= '$date_s' AND kelas = '$siswa[kelas]' AND nm_kelas = '$siswa[nm_kelas]' ORDER BY id DESC";
						foreach ($DB_con->query($kueri) as $data_m) :
						?>
						<tr>
							<td><?php echo $data_m['tugas'] ?></td>
							<td><?php echo $data_m['tanggal'] ?></td>
							<td><?php echo $data_m['sampai'] ?></td>
							<td><?php echo $data_m['judul'] ?></td>
							<td><?php echo $data_m['pelajaran'] ?></td>
							<td><?php echo $data_m['kelas'] ?></td>
							<td><?php echo $data_m['nm_kelas'] ?></td>
							<td valign="center">
								<a href="mulai_tugas.php?id=<?php echo $data_m['id'] ?>" title="Lihat Tugas">
									<button type="button" class="btn btn-default btn-sm">
										<i class="fa fa-pencil"></i>
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
	  
	  <hr>
	  
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tugas Sebelumnya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
						<tr>
							<th>Tugas</th>
							<th>Tanggal Tugas</th>
							<th>Sampai Tanggal</th>
							<th>Judul Tugas</th>
							<th>Nama Pelajaran</th>
							<th>Kelas</th>
							<th>Nama Kelas</th>
						</tr>
						
						<?php
							//$date_ss = date("Y-m-d");
							$s = $DB_con->query("SELECT * FROM siswa where nisn = '$_SESSION[nisn_nip]'");
							$siswa = $s->fetch(PDO::FETCH_ASSOC);
							$t = $DB_con->query("SELECT DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal");
							$tt = $t->fetch(PDO::FETCH_ASSOC);
							$date_ss = $tt['tanggal'];
						    $sql = "SELECT * FROM tugas WHERE pelajaran = '$data[pelajaran]' AND sampai < '$date_ss' AND kelas = '$siswa[kelas]' AND nm_kelas = '$siswa[nm_kelas]' ORDER BY id DESC";
						    foreach ($DB_con->query($sql) as $dataaq) :
						?>
						<tr>
							<td><?php echo $dataaq['tugas'] ?></td>
							<td><?php echo $dataaq['tanggal'] ?></td>
							<td><?php echo $dataaq['sampai'] ?></td>
							<td><?php echo $dataaq['judul'] ?></td>
							<td><?php echo $dataaq['pelajaran'] ?></td>
							<td><?php echo $dataaq['kelas'] ?></td>
							<td><?php echo $dataaq['nm_kelas'] ?></td>
							<td valign="center">
								<a href="lihat_tugas_sebelumnya.php?id=<?php echo $dataaq['id'] ?>" title="Lihat Tugas">
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
function ngajaran() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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