<?php
    include 'koneksi.php';
	
	//no_soal
	$c = $DB_con->query("SELECT COUNT(kd_soal) AS no FROM soal_ujian WHERE kd_soal = '$_POST[kd_soal]'");
	$d = $c->fetch(PDO::FETCH_ASSOC);
	$no_s = $d['no'];
	$no = $no_s + 1;
	
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
	$nama_baru = preg_replace("/\s+/", "_", $nama_file);
    $path = "upload/soal/".$nama_baru;
	if (isset($_POST)) {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == ""){
      if($ukuran_file <= 10000000){
        if(move_uploaded_file($tmp_file, $path)){
          $query = "INSERT INTO soal_ujian VALUES ('', '$_POST[kd_soal]', '$_POST[nm_pelajaran]', '$_POST[pertanyaan]', '$nama_baru', '$_POST[a]', '$_POST[b]', '$_POST[c]', '$_POST[d]', '$_POST[e]', '$_POST[kunci]', '$no')";
          $DB_con->exec($query);
          
          if($DB_con){
            header("location: tambah_lagi_soal.php?kd_soal=$_POST[kd_soal]");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_soal.php'>Kembali</a>";
          }
        }else{
          $query = "INSERT INTO soal_ujian VALUES ('', '$_POST[kd_soal]', '$_POST[nm_pelajaran]', '$_POST[pertanyaan]', '', '$_POST[a]', '$_POST[b]', '$_POST[c]', '$_POST[d]', '$_POST[e]', '$_POST[kunci]', '$no')";
          $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: tambah_lagi_soal.php?kd_soal=$_POST[kd_soal]");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_soal.php'>Kembali</a>";
          }
        }
      }else{
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><a href='input_data_soal.php'>Kembali Ke Form</a>";
      }
    }else{
      echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
      echo "<br><a href='input_data_soal.php'>Kembali Ke Form</a>";
    }
	}
    ?>