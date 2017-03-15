<?php
include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "INSERT INTO tugas VALUES ('', '$_POST[tugas]', '$_POST[pelajaran]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[tanggal]', '$_POST[sampai]', '$_POST[judul]')";
    $DB_con->exec($sql);
}
 
header("location:data_tugas.php");
?>