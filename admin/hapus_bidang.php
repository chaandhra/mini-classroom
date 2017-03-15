<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $DB_con->exec("DELETE FROM bidang_study WHERE id = '$_GET[id]'");
}
header("location:data_bidang.php")
?>