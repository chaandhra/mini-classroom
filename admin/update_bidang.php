<?php

include 'koneksi.php';
 
if (isset($_POST)) {
    $sql = "UPDATE bidang_study SET nm_bs = '$_POST[nm_bs]'
                                 WHERE id = '$_POST[id]' ";
    $DB_con->exec($sql);
}
 
header("location:data_bidang.php");

?>