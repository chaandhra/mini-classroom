<?php
include 'koneksi.php';
if (isset($_GET['nip'])) {
    $DB_con->exec("DELETE FROM guru WHERE nip = '$_GET[nip]'");
}
header("location:data_guru.php")
?>