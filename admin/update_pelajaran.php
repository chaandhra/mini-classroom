<?php

include 'koneksi.php';
$bs = $_POST['nm_bs'];
$jml_d = count($bs);
 
if (isset($_POST)) {
	for($x=0;$x<$jml_d;$x++){
	    $sql = "UPDATE pelajaran SET nm_pelajaran = '$_POST[nm_pelajaran]',
									 bidang_study = '$bs[$x]'
	                                 WHERE kd_pelajaran = '$_POST[kd_pelajaran]' ";
	    $DB_con->exec($sql);
	}
}
 
header("location:data_pelajaran.php");

?>