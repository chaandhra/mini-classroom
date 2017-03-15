<?php

include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "UPDATE kelas SET kelas = '$_POST[kelas]'
                                 WHERE id = '$_POST[id]' ";
    $DB_con->exec($sql);
}
 
header("location:data_kelas.php");

?>