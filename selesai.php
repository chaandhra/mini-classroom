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
	
	} else {
		header("location:siswa.php");
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>UjianOnline.com/Siswa</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="admin/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
	</head>
	<body class="hold-transition lockscreen">
		<div class="lockscreen-wrapper">
			<div class="lockscreen-logo">
				<a><b>Selamat</b> anda telah selesai mengerjakan soal ujian !</a>
				<br><br>
			</div>
			<div class="lockscreen-item">
				<div class="lockscreen-image">
					<img src="images/Google_icon_2015.png" alt="User Image">
				</div>
				<form action="https://google.com/search" class="lockscreen-credentials">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Google search">
						<div class="input-group-btn">
							<button type="button" class="btn"><i class="fa fa-search text-muted"></i></button>
						</div>
					</div>
				</form>
			</div>
			<div class="text-center">
				<a href="siswa.php" style="padding: 10px;border: 1px solid #999;border-radius: 10px;color: #999;">Home</a>
			</div>
		</div>
	</body>
</html>