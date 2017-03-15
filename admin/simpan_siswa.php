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
          $query = "INSERT INTO siswa VALUES ('$_POST[nisn]', '$_POST[bidang_study]', '$nama_baru', '$_POST[nm_siswa]', '$_POST[jns_kelamin]', '$_POST[alamat]', '$_POST[umur]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[no_telpon]', '$_POST[agama]', '$_POST[email]', '$_POST[tempat_lahir]', '$_POST[tgl_lahir]', '$_POST[username]', '$_POST[password]' )";
          $DB_con->exec($query);
          
          if($DB_con){
            header("location: data_siswa.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_siswa.php'>Kembali</a>";
          }
        }else{
          $query = "INSERT INTO siswa VALUES ('$_POST[nisn]', '$_POST[bidang_study]', 'default.jpeg', '$_POST[nm_siswa]', '$_POST[jns_kelamin]', '$_POST[alamat]', '$_POST[umur]', '$_POST[kelas]', '$_POST[nm_kelas]', '$_POST[no_telpon]', '$_POST[agama]', '$_POST[email]', '$_POST[tempat_lahir]', '$_POST[tgl_lahir]', '$_POST[username]', '$_POST[password]' )";
          $DB_con->exec($query);
		  
		  if($DB_con){
            header("location: data_siswa.php");
          }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='input_data_siswa.php'>Kembali</a>";
          }
        }
      }else{
        echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
        echo "<br><a href='input_data_siswa.php'>Kembali Ke Form</a>";
      }
    }else{
      echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
      echo "<br><a href='input_data_siswa.php'>Kembali Ke Form</a>";
    }
	}
    ?>