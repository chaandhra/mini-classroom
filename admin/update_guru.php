<?php
    include 'koneksi.php';
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
	$nama_baru = preg_replace("/\s+/", "_", $nama_file);
    $path = "../upload/guru/".$nama_baru;
	if (isset($_POST)) {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == ""){
      if($ukuran_file <= 10000000){
        if(move_uploaded_file($tmp_file, $path)){
          $query = "UPDATE guru SET nm_guru = '$_POST[nm_guru]', nm_pelajaran = '$_POST[nm_pelajaran]', alamat = '$_POST[alamat]', jns_kelamin = '$_POST[jns_kelamin]', agama = '$_POST[agama]', tgl_lahir = '$_POST[tgl_lahir]', tempat_lahir = '$_POST[tempat_lahir]', umur = '$_POST[umur]', username = '$_POST[username]', password = '$_POST[password]', gambar = '$nama_baru' WHERE nip = '$_POST[nip]' ";
		  $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_guru.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
          }
        }else{
          $query = "UPDATE guru SET nm_guru = '$_POST[nm_guru]', nm_pelajaran = '$_POST[nm_pelajaran]', alamat = '$_POST[alamat]', jns_kelamin = '$_POST[jns_kelamin]', agama = '$_POST[agama]', tgl_lahir = '$_POST[tgl_lahir]', tempat_lahir = '$_POST[tempat_lahir]', umur = '$_POST[umur]', username = '$_POST[username]', password = '$_POST[password]', gambar = '$_POST[gambarr]' WHERE nip = '$_POST[nip]' ";
		  $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_guru.php");
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