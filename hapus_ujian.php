<?php
include 'koneksi.php';
if (isset($_GET['kd_ujian'])) {
    $DB_con->exec("DELETE FROM jadwal_ujian WHERE kd_ujian = '$_GET[kd_ujian]'");
}
header("location:data_ujian.php")
?>