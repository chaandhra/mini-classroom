<?php
include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "INSERT INTO kelas VALUES ('$_POST[id]', '$_POST[kelas]')";
    $DB_con->exec($sql);
}
 
header("location:data_kelas.php");
?>