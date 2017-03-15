<?php
include 'koneksi.php';
if (isset($_GET['kd_pelajaran'])) {
    $DB_con->exec("DELETE FROM pelajaran WHERE kd_pelajaran = '$_GET[kd_pelajaran]'");
}
header("location:data_pelajaran.php")
?>