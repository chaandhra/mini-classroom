<?php
include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "INSERT INTO ujian VALUES ('', '$_POST[tgl_ujian]', '$_POST[nm_ujian]', '$_POST[pelajaran]', '$_POST[kd_soal]', '$_POST[jml_soal]')";
	$DB_con->exec($sql);
    $sql = "UPDATE jadwal_ujian SET status_ujian = 'tampil' WHERE kd_ujian = '$_POST[kd_ujian]'";
    $DB_con->exec($sql);
}
 
header("location:data_ujian.php");
?>