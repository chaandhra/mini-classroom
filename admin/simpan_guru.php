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
          $query = "INSERT INTO guru VALUES ('$_POST[nip]', '$_POST[nm_guru]', '$_POST[nm_pelajaran]', '$_POST[alamat]', '$_POST[jns_kelamin]', '$_POST[agama]', '$_POST[tgl_lahir]', '$_POST[tempat_lahir]', '$_POST[umur]', '$_POST[username]', '$_POST[password]', '$nama_baru')";
          $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_guru.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_guru.php'>Kembali</a>";
          }
        }else{
          $query = "INSERT INTO guru VALUES ('$_POST[nip]', '$_POST[nm_guru]', '$_POST[nm_pelajaran]', '$_POST[alamat]', '$_POST[jns_kelamin]', '$_POST[agama]', '$_POST[tgl_lahir]', '$_POST[tempat_lahir]', '$_POST[umur]', '$_POST[username]', '$_POST[password]', 'default.jpeg')";
          $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_guru.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_guru.php'>Kembali</a>";
          }
        }
      }else{
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><a href='input_data_guru.php'>Kembali Ke Form</a>";
      }
    }else{
      echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
      echo "<br><a href='input_data_guru.php'>Kembali Ke Form</a>";
    }
	}
    ?>