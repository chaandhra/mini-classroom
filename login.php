<!DOCTYPE html>
<?php include 'koneksi.php'; 
	session_start();
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
			header('location:siswa.php');
		}
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UjianOnline.com/Login </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="wrap">
		<div class="avatar">
			<img src="images/img_avatar.png">
		</div>
		<form style="" action="login_proses.php" method="post">
		<input type="text" placeholder="nomor induk" name="nisn_nip" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="text" style="border-radius: 0px 0px 0px 0px ;" placeholder="username" name="username" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" placeholder="password" name="password" required>
		<button style="margin-top:15px">Masuk</button>
		</form>
	</div>
  
      <script src="js/index.js"></script>

</body>
</html>
