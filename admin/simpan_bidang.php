<?php
include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "INSERT INTO bidang_study VALUES ('', '$_POST[nm_bs]')";
    $DB_con->exec($sql);
}
 
header("location:data_bidang.php");
?>