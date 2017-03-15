<?php
    include 'koneksi.php';
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
	$nama_baru = preg_replace("/\s+/", "_", $nama_file);
    $path = "../upload/admin/".$nama_baru;
	if (isset($_POST)) {
    if($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == ""){
      if($ukuran_file <= 10000000){
        if(move_uploaded_file($tmp_file, $path)){
          $query = "UPDATE admin SET gambar = '$nama_baru',nama = '$_POST[nama]',jns_kelamin = '$_POST[jns_kelamin]',alamat = '$_POST[alamat]', tgl_lahir = '$_POST[tgl_lahir]',tempat_lahir = '$_POST[tempat_lahir]',agama = '$_POST[agama]',username = '$_POST[username]',password = '$_POST[password]' WHERE nia = '$_POST[nia]' ";
		  $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_admin.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><input type='button' value='kembali' onClick='history.go(-1);'>";
          }
        }else{
          $query = "UPDATE admin SET gambar = '$_POST[gambarr]',nama = '$_POST[nama]',jns_kelamin = '$_POST[jns_kelamin]',alamat = '$_POST[alamat]', tgl_lahir = '$_POST[tgl_lahir]',tempat_lahir = '$_POST[tempat_lahir]',agama = '$_POST[agama]',username = '$_POST[username]',password = '$_POST[password]' WHERE nia = '$_POST[nia]' ";
		  $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_admin.php");
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