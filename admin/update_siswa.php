<?php
    include 'koneksi.php';
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
	$nama_baru = preg_replace("/\s+/", "_", $nama_file);
    $path = "../upload/siswa/".$nama_baru;
	if (isset($_POST)) {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == ""){
      if($ukuran_file <= 10000000){
        if(move_uploaded_file($tmp_file, $path)){
          $query = "UPDATE siswa SET bidang_study =  '$_POST[bidang_study]', gambar = '$nama_baru', nm_siswa = '$_POST[nm_siswa]', jns_kelamin = '$_POST[jns_kelamin]', alamat = '$_POST[alamat]', umur = '$_POST[umur]', kelas = '$_POST[kelas]', nm_kelas = '$_POST[nm_kelas]', no_telpon = '$_POST[no_telpon]', agama = '$_POST[agama]', email = '$_POST[email]', tempat_lahir = '$_POST[tempat_lahir]', tgl_lahir = '$_POST[tgl_lahir]', username = '$_POST[username]', password = '$_POST[password]' WHERE nisn = '$_POST[nisn]'";
		  $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_siswa.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
          }
        }else{
          $query = "UPDATE siswa SET bidang_study =  '$_POST[bidang_study]', gambar = '$_POST[gambarr]', nm_siswa = '$_POST[nm_siswa]', jns_kelamin = '$_POST[jns_kelamin]', alamat = '$_POST[alamat]', umur = '$_POST[umur]', kelas = '$_POST[kelas]', nm_kelas = '$_POST[nm_kelas]', no_telpon = '$_POST[no_telpon]', agama = '$_POST[agama]', email = '$_POST[email]', tempat_lahir = '$_POST[tempat_lahir]', tgl_lahir = '$_POST[tgl_lahir]', username = '$_POST[username]', password = '$_POST[password]' WHERE nisn = '$_POST[nisn]' ";
		  $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_siswa.php");
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