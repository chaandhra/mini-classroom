<?php
include 'koneksi.php';
if (isset($_GET['kd_hasil'])) {
    $DB_con->exec("DELETE FROM hasil WHERE kd_hasil = '$_GET[kd_hasil]'");
}
header("location:data_hasil_ujian.php")
?>