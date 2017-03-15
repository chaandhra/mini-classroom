<?php
include 'koneksi.php';
session_start();
if (isset($_POST)) {
	$g = $DB_con->query("SELECT * FROM guru WHERE nip = '$_SESSION[nisn_nip]'");
	$guru = $g->fetch(PDO::FETCH_ASSOC);
	$s = $DB_con->query("SELECT count(no_soal) AS max FROM soal_ujian WHERE nm_pelajaran = '$guru[nm_pelajaran]' AND kd_soal = '$_POST[kd_soal]'");
	$soal = $s->fetch(PDO::FETCH_ASSOC);
	$max = $soal['max'];
	$jml_soal = $_POST['jml_soal'];
	if ($jml_soal > $max){
		echo "Maaf, Jumlah soal yang anda masukkan lebih dari soal yang tersedia !!! <br> <a href='input_data_ujian.php'>Kembali</a>";
	}else{
    $sql = "INSERT INTO jadwal_ujian VALUES ('', '$_POST[tgl_ujian]', '$_POST[sampai]', '$_POST[nm_ujian]', '$_POST[pelajaran]', '$_POST[kd_soal]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[jml_soal]', '$_POST[nilai_kkm]')";
    $DB_con->exec($sql);
	header("location:data_ujian.php");
	}
}
?>