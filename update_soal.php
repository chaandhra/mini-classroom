<?php
    include 'koneksi.php';
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
          $query = "UPDATE soal_ujian SET nm_pelajaran = '$_POST[nm_pelajaran]', pertanyaan = '$_POST[pertanyaan]', gambar = '$nama_baru', a = '$_POST[a]', b = '$_POST[b]', c = '$_POST[c]', d = '$_POST[d]', e = '$_POST[e]', kunci = '$_POST[kunci]' WHERE id = '$_POST[id]' ";
		  $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_soal.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
          }
        }else{
          $query = "UPDATE soal_ujian SET nm_pelajaran = '$_POST[nm_pelajaran]', pertanyaan = '$_POST[pertanyaan]', gambar = '$_POST[gambarr]', a = '$_POST[a]', b = '$_POST[b]', c = '$_POST[c]', d = '$_POST[d]', e = '$_POST[e]', kunci = '$_POST[kunci]' WHERE id = '$_POST[id]' ";
		  $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_soal.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
          }
        }
      }else{
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
      }
    }else{
      echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
      echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
    }
	}
    ?>