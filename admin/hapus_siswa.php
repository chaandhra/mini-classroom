<?php
include 'koneksi.php';
if (isset($_GET['nisn'])) {
    $DB_con->exec("DELETE FROM siswa WHERE nisn = '$_GET[nisn]'");
}
header("location:data_siswa.php")
?>