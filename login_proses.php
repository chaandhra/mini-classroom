<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$nisn_nip = $_POST['nisn_nip'];
$password = $_POST['password'];
// query untuk mendapatkan record dari username
$res = $DB_con->query("SELECT * FROM user where nisn_nip = '$nisn_nip'");
$row = $res->fetch(PDO::FETCH_ASSOC);
$user = $row['username'];
$pass = $row['password'];
$n_n = $row['nisn_nip'];
// cek kesesuaian password
if ($password == $pass && $nisn_nip == $n_n && $username == $user)
{
echo "sukses";
    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $row['level'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['nisn_nip'] = $row['nisn_nip'];
    $_SESSION['gambar'] = $row['gambar'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['password'] = $row['password'];
		session_start();
		error_reporting(0);
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
		if (!isset($_SESSION['level']))
		{
			header('location:login.php');
		}
}
else 
echo '<h1>Login gagal</h1>';
?>