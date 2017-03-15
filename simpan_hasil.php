<?php
	include 'koneksi.php';
	if (isset($_POST)) {
		$jwb = $_POST['jawaban'];
		$knc = $_POST['kunci'];
		if ($jwb == $knc){
			$sql = "INSERT INTO jawaban VALUES ('', '$_POST[nisn]', '$_POST[nm_siswa]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[bidang_study]', '$_POST[kd_soal]', '$_POST[id]', '$_POST[pertanyaan]', '$_POST[jawaban]', '$_POST[kunci]', 'benar', '$_POST[nm_pelajaran]', '$_POST[kd_ujian]')";
			$DB_con->exec($sql);
		}else{
			$sql = "INSERT INTO jawaban VALUES ('', '$_POST[nisn]', '$_POST[nm_siswa]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[bidang_study]', '$_POST[kd_soal]', '$_POST[id]', '$_POST[pertanyaan]', '$_POST[jawaban]', '$_POST[kunci]', 'salah', '$_POST[nm_pelajaran]', '$_POST[kd_ujian]')";
			$DB_con->exec($sql);
		}
	}
	
	$res = $DB_con->query("SELECT COUNT(nisn) AS jumlah FROM jawaban where kd_ujian = '$_POST[kd_ujian]' AND nisn = '$_POST[nisn]'");
	$row = $res->fetch(PDO::FETCH_ASSOC);
	$no = $row['jumlah'];
	$t = $_POST['jml_soal'];
	if ($no < $t){
		header("location:mulai_ujian.php?kd_ujian=$_POST[kd_ujian]");
	}else{
		$j_soal = $_POST['jml_soal'];
		
		//jumlah eusi nu bener
		$benar = $DB_con->query("SELECT COUNT(status) AS jumlah_b FROM jawaban where kd_ujian = '$_POST[kd_ujian]' AND nisn = '$_POST[nisn]' AND status = 'benar'");
		$h_b = $benar->fetch(PDO::FETCH_ASSOC);
		$j_b = $h_b['jumlah_b'];
		
		//jumlah eusi nu salah
		$salah = $DB_con->query("SELECT COUNT(status) AS jumlah_s FROM jawaban where kd_ujian = '$_POST[kd_ujian]' AND nisn = '$_POST[nisn]' AND status = 'salah'");
		$h_s = $salah->fetch(PDO::FETCH_ASSOC);
		$j_s = $h_s['jumlah_s'];
		
		//ngitung nilai
		$nilai = $j_b * 100 / $j_soal;
		
		//nangtukeun hasil
		if ($nilai < $_POST['nilai_kkm']){
			$hasil = "Gagal";
		}else{
			$hasil = "Lulus";
		}
		
		//nyimpen dina tabel hasil
		$sql = "INSERT INTO hasil VALUES ('', '$_POST[nisn]', '$_POST[nm_siswa]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[bidang_study]', '$_POST[kd_soal]', '$_POST[nm_pelajaran]', '$_POST[jml_soal]', '$j_b', '$j_s', '$nilai', '$hasil', '$_POST[nm_ujian]', '$_POST[tgl_ujian]', '$_POST[kd_ujian]')";
		$DB_con->exec($sql);
		
		header("location:selesai.php?kd_ujian=$_POST[kd_ujian]");
	}
?>