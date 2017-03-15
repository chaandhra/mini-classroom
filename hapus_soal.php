<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM soal_ujian WHERE id = '$_GET[id]'");
}
header("location:data_soal.php")
?>