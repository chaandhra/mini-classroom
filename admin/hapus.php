<?php
include 'koneksi.php';
if (isset($_GET['nia'])) {
    $DB_con->exec("DELETE FROM admin WHERE nia = '$_GET[nia]'");
}
header("location:data_admin.php")
?>