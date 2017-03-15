<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM kelas WHERE id = '$_GET[id]'");
}
header("location:data_kelas.php")
?>