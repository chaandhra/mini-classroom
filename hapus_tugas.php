<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM tugas WHERE id = '$_GET[id]'");
}
header("location:data_tugas.php")
?>