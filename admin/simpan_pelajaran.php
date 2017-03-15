<?php
include 'koneksi.php';
$bs = $_POST['nm_bs'];
$jml_d = count($bs);
 
if (isset($_POST)) {
	for($x=0;$x<$jml_d;$x++){
	    $sql = "INSERT INTO pelajaran VALUES ('', '$_POST[nm_pelajaran]', '$bs[$x]')";
	    $DB_con->exec($sql);
	}
}
 
header("location:data_pelajaran.php");
?>