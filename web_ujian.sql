/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.5-10.1.10-MariaDB : Database - web_ujian
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`web_ujian` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `web_ujian`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `nia` varchar(100) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jns_kelamin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

LOCK TABLES `admin` WRITE;

UNLOCK TABLES;

/*Table structure for table `bidang_study` */

DROP TABLE IF EXISTS `bidang_study`;

CREATE TABLE `bidang_study` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nm_bs` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `bidang_study` */

LOCK TABLES `bidang_study` WRITE;

insert  into `bidang_study`(`id`,`nm_bs`) values (1,'Rekayasa Perangkat Lunak (RPL)'),(2,'Teknik Kendaraan Ringan (TKR)'),(3,'Teknik Sepeda Motor (TSM)'),(4,'Teknik Ototronik (TO)'),(5,'Teknik Komputer dan Jaringan (TKJ)');

UNLOCK TABLES;

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `nip` varchar(100) NOT NULL,
  `nm_guru` varchar(100) DEFAULT NULL,
  `nm_pelajaran` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jns_kelamin` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `umur` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

LOCK TABLES `guru` WRITE;

insert  into `guru`(`nip`,`nm_guru`,`nm_pelajaran`,`alamat`,`jns_kelamin`,`agama`,`tgl_lahir`,`tempat_lahir`,`umur`,`username`,`password`,`gambar`) values ('111','Tendi yustiandi','Fisika','Dustan','Laki-laki','Islam','2016-11-11','Sumedang','17','tendi','tendi','Koala.jpg'),('123','Muhammad Rizky','Matematika','Dsn.Ranjeng','Laki-laki','Islam','1999-03-17','Sumedang','17','rizky','rizky','default.jpeg');

UNLOCK TABLES;

/*Table structure for table `hasil` */

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(100) DEFAULT NULL,
  `nm_siswa` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nm_kelas` varchar(100) DEFAULT NULL,
  `bidang_study` varchar(100) DEFAULT NULL,
  `kd_soal` int(100) DEFAULT NULL,
  `nm_pelajaran` varchar(100) DEFAULT NULL,
  `jml_soal` int(100) DEFAULT NULL,
  `jawaban_benar` int(100) DEFAULT NULL,
  `jawaban_salah` int(100) DEFAULT NULL,
  `nilai` int(100) DEFAULT NULL,
  `hasil` varchar(100) DEFAULT NULL,
  `nm_ujian` varchar(100) DEFAULT NULL,
  `tgl_ujian` date DEFAULT NULL,
  `kd_ujian` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hasil` */

LOCK TABLES `hasil` WRITE;

insert  into `hasil`(`id`,`nisn`,`nm_siswa`,`kelas`,`nm_kelas`,`bidang_study`,`kd_soal`,`nm_pelajaran`,`jml_soal`,`jawaban_benar`,`jawaban_salah`,`nilai`,`hasil`,`nm_ujian`,`tgl_ujian`,`kd_ujian`) values (1,'234','Sugianto','XII','RPL 1','Rekayasa Perangkat Lunak (RPL)',1,'Matematika',4,2,2,50,'Lulus','Ulangan harian','2016-12-16',1),(2,'345','Deni Nurhidayat','XII','TKR 1','Teknik Kendaraan Ringan (TKR)',1,'Matematika',4,0,4,0,'Gagal','Ulangan harian','2016-12-18',2);

UNLOCK TABLES;

/*Table structure for table `jadwal_ujian` */

DROP TABLE IF EXISTS `jadwal_ujian`;

CREATE TABLE `jadwal_ujian` (
  `kd_ujian` int(100) NOT NULL AUTO_INCREMENT,
  `tgl_ujian` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `nm_ujian` varchar(100) DEFAULT NULL,
  `pelajaran` varchar(100) DEFAULT NULL,
  `kd_soal` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nm_kelas` varchar(100) DEFAULT NULL,
  `jml_soal` varchar(100) DEFAULT NULL,
  `nilai_kkm` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_ujian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal_ujian` */

LOCK TABLES `jadwal_ujian` WRITE;

insert  into `jadwal_ujian`(`kd_ujian`,`tgl_ujian`,`sampai`,`nm_ujian`,`pelajaran`,`kd_soal`,`kelas`,`nm_kelas`,`jml_soal`,`nilai_kkm`) values (1,'2016-12-16','2016-12-16','Ulangan harian','Matematika','1','XII','RPL 1','4','10'),(2,'2016-12-18','2016-12-18','Ulangan harian','Matematika','1','XII','TKR 1','4','10'),(3,'2016-12-18','2016-12-18','Ulangan harian','Matematika','1','XII','TKR 2','4','10');

UNLOCK TABLES;

/*Table structure for table `jawaban` */

DROP TABLE IF EXISTS `jawaban`;

CREATE TABLE `jawaban` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nisn` varchar(100) DEFAULT NULL,
  `nm_siswa` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nm_kelas` varchar(100) DEFAULT NULL,
  `bidang_study` varchar(100) DEFAULT NULL,
  `kd_soal` int(100) DEFAULT NULL,
  `id_soal` int(100) DEFAULT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL,
  `jawaban` varchar(100) DEFAULT NULL,
  `kunci` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `pelajaran` varchar(100) DEFAULT NULL,
  `kd_ujian` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `jawaban` */

LOCK TABLES `jawaban` WRITE;

insert  into `jawaban`(`id`,`nisn`,`nm_siswa`,`kelas`,`nm_kelas`,`bidang_study`,`kd_soal`,`id_soal`,`pertanyaan`,`jawaban`,`kunci`,`status`,`pelajaran`,`kd_ujian`) values (1,'234','Sugianto','XII','RPL 1','Rekayasa Perangkat Lunak (RPL)',1,1,'Untuk membangun sebuahSembatan dibutuhkan waktu 30 hari oleh 15 pekerja. Jika\r\ndikerjakan oleh 18 pe','a','a','benar','Matematika',1),(2,'234','Sugianto','XII','RPL 1','Rekayasa Perangkat Lunak (RPL)',1,2,'Harya 2 komponen A dan 3 komponen B adalah Rp13.500,00, sedangkan harga\r\nI komponen A dan 2 komponen','d','a','salah','Matematika',1),(3,'234','Sugianto','XII','RPL 1','Rekayasa Perangkat Lunak (RPL)',1,3,'Nilai ntaksirnum fungsi objektif z : 3x * 4y ywrgmemenuhi sistem pertidaksamaan:\r\nx * 2y <8;2x + y <','e','a','salah','Matematika',1),(4,'234','Sugianto','XII','RPL 1','Rekayasa Perangkat Lunak (RPL)',1,4,'Diketahui balok dengan ukuran panjang 13 cm, lebar 7 cm, dan luas permukaan3S2 cmz.\r\nTinggi balok te','a','a','benar','Matematika',1),(5,'345','Deni Nurhidayat','XII','TKR 1','Teknik Kendaraan Ringan (TKR)',1,1,'Untuk membangun sebuahSembatan dibutuhkan waktu 30 hari oleh 15 pekerja. Jika\r\ndikerjakan oleh 18 pe','c','a','salah','Matematika',2),(6,'345','Deni Nurhidayat','XII','TKR 1','Teknik Kendaraan Ringan (TKR)',1,2,'Harya 2 komponen A dan 3 komponen B adalah Rp13.500,00, sedangkan harga\r\nI komponen A dan 2 komponen','e','a','salah','Matematika',2),(7,'345','Deni Nurhidayat','XII','TKR 1','Teknik Kendaraan Ringan (TKR)',1,3,'Nilai ntaksirnum fungsi objektif z : 3x * 4y ywrgmemenuhi sistem pertidaksamaan:\r\nx * 2y <8;2x + y <','d','a','salah','Matematika',2),(8,'345','Deni Nurhidayat','XII','TKR 1','Teknik Kendaraan Ringan (TKR)',1,4,'Diketahui balok dengan ukuran panjang 13 cm, lebar 7 cm, dan luas permukaan3S2 cmz.\r\nTinggi balok te','e','a','salah','Matematika',2);

UNLOCK TABLES;

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

LOCK TABLES `kelas` WRITE;

insert  into `kelas`(`id`,`kelas`) values (1,'RPL 1'),(2,'RPL 2'),(3,'RPL 3'),(4,'RPL 4'),(5,'TKR 1'),(6,'TKR 2'),(7,'TKR 3'),(8,'TSM 1'),(9,'TSM 2'),(10,'TSM 3'),(11,'TKJ 1'),(12,'TKJ 2');

UNLOCK TABLES;

/*Table structure for table `pelajaran` */

DROP TABLE IF EXISTS `pelajaran`;

CREATE TABLE `pelajaran` (
  `kd_pelajaran` int(100) NOT NULL AUTO_INCREMENT,
  `nm_pelajaran` varchar(100) DEFAULT NULL,
  `bidang_study` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `pelajaran` */

LOCK TABLES `pelajaran` WRITE;

insert  into `pelajaran`(`kd_pelajaran`,`nm_pelajaran`,`bidang_study`) values (22,'Matematika','Rekayasa Perangkat Lunak (RPL)'),(23,'Matematika','Teknik Kendaraan Ringan (TKR)'),(24,'Matematika','Teknik Sepeda Motor (TSM)'),(25,'Matematika','Teknik Ototronik (TO)'),(26,'Matematika','Teknik Komputer dan Jaringan (TKJ)'),(27,'Web Dinamis','Rekayasa Perangkat Lunak (RPL)'),(28,'Pkn','Rekayasa Perangkat Lunak (RPL)'),(29,'Pkn','Teknik Kendaraan Ringan (TKR)'),(30,'Pkn','Teknik Sepeda Motor (TSM)'),(31,'Pkn','Teknik Ototronik (TO)'),(32,'Pkn','Teknik Komputer dan Jaringan (TKJ)'),(33,'Fisika','Rekayasa Perangkat Lunak (RPL)'),(34,'Fisika','Teknik Kendaraan Ringan (TKR)'),(35,'Fisika','Teknik Sepeda Motor (TSM)'),(36,'Fisika','Teknik Ototronik (TO)'),(37,'Fisika','Teknik Komputer dan Jaringan (TKJ)');

UNLOCK TABLES;

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nisn` varchar(100) NOT NULL,
  `bidang_study` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `nm_siswa` varchar(100) DEFAULT NULL,
  `jns_kelamin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `umur` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nm_kelas` varchar(100) DEFAULT NULL,
  `no_telpon` varchar(100) DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

LOCK TABLES `siswa` WRITE;

insert  into `siswa`(`nisn`,`bidang_study`,`gambar`,`nm_siswa`,`jns_kelamin`,`alamat`,`umur`,`kelas`,`nm_kelas`,`no_telpon`,`agama`,`email`,`tempat_lahir`,`tgl_lahir`,`username`,`password`) values ('234','Rekayasa Perangkat Lunak (RPL)','default.jpeg','Sugianto','Laki-laki','Dsn.Nanggerang','17','XII','RPL 1','089523955053','Islam','gycalm1@gmail.com','Sumedang','1999-03-17','sugianto','sugianto'),('345','Teknik Kendaraan Ringan (TKR)','Koala.jpg','Deni Nurhidayat','Laki-laki','Dsn.Pamulihan Situraja','17','XII','TKR 1','089523955053','Islam','deni@gmail.com','Sumedang','2016-11-11','deni','deni');

UNLOCK TABLES;

/*Table structure for table `soal_ujian` */

DROP TABLE IF EXISTS `soal_ujian`;

CREATE TABLE `soal_ujian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kd_soal` int(100) DEFAULT NULL,
  `nm_pelajaran` varchar(100) DEFAULT NULL,
  `pertanyaan` longtext,
  `gambar` varchar(100) DEFAULT NULL,
  `a` varchar(100) DEFAULT NULL,
  `b` varchar(100) DEFAULT NULL,
  `c` varchar(100) DEFAULT NULL,
  `d` varchar(100) DEFAULT NULL,
  `e` varchar(100) DEFAULT NULL,
  `kunci` varchar(1) DEFAULT NULL,
  `no_soal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `soal_ujian` */

LOCK TABLES `soal_ujian` WRITE;

insert  into `soal_ujian`(`id`,`kd_soal`,`nm_pelajaran`,`pertanyaan`,`gambar`,`a`,`b`,`c`,`d`,`e`,`kunci`,`no_soal`) values (1,1,'Matematika','Untuk membangun sebuahSembatan dibutuhkan waktu 30 hari oleh 15 pekerja. Jika\r\ndikerjakan oleh 18 pekerja, pekerjaan trersebut rlepat diselesaikan dalam waktu ...','images.png','36 hari','26 hari','20 hari','40 hari','10 hari','a','1'),(2,1,'Matematika','Harya 2 komponen A dan 3 komponen B adalah Rp13.500,00, sedangkan harga\r\nI komponen A dan 2 komponen B adalah Rp8.000,00. Harga I komponen A dan\r\nI komponen B adalah. ....','','Rp7.500,00','Rp8.500,00','Rp9.500,00','Rp10.500,00','Rp11.500,00','a','2'),(3,1,'Matematika','Nilai ntaksirnum fungsi objektif z : 3x * 4y ywrgmemenuhi sistem pertidaksamaan:\r\nx * 2y <8;2x + y <10; x>0 ;.v >0 adalah ....','','20','22','24','26','28','a','3'),(4,1,'Matematika','Diketahui balok dengan ukuran panjang 13 cm, lebar 7 cm, dan luas permukaan3S2 cmz.\r\nTinggi balok tersebut adalah ....','','11 cm','10 cm','9 cm','8 cm','7 cm','a','4');

UNLOCK TABLES;

/*Table structure for table `status_ujian` */

DROP TABLE IF EXISTS `status_ujian`;

CREATE TABLE `status_ujian` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `kd_ujian` varchar(100) DEFAULT NULL,
  `pelajaran` varchar(100) DEFAULT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_ujian` */

LOCK TABLES `status_ujian` WRITE;

UNLOCK TABLES;

/*Table structure for table `tugas` */

DROP TABLE IF EXISTS `tugas`;

CREATE TABLE `tugas` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `tugas` varchar(100) DEFAULT NULL,
  `pelajaran` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nm_kelas` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sampai` date DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tugas` */

LOCK TABLES `tugas` WRITE;

insert  into `tugas`(`id`,`tugas`,`pelajaran`,`kelas`,`nm_kelas`,`tanggal`,`sampai`,`judul`) values (3,'<p>Buat makalah tentang phytagoras !</p>\r\n','Matematika','XII','RPL 1','2016-12-19','2016-12-19','Makalah'),(4,'<p>Buat makalah tentang phytagoras !</p>\r\n','Matematika','XII','RPL 1','2016-12-18','2016-12-18','Makalah'),(5,'<p>Buat makalah tentang logaritma !</p>\r\n','Matematika','XII','RPL 1','2016-12-19','2016-12-19','Makalah'),(6,'<p>Buat makalah tentang lensa dan cermin !</p>\r\n','Fisika','XII','RPL 1','2016-12-19','2016-12-19','Makalah');

UNLOCK TABLES;

/*Table structure for table `ujian_susulan` */

DROP TABLE IF EXISTS `ujian_susulan`;

CREATE TABLE `ujian_susulan` (
  `kd_ujian_susulan` int(100) NOT NULL,
  `kd_soal` int(100) DEFAULT NULL,
  `nm_pelajaran` varchar(100) DEFAULT NULL,
  `tgl_ujian` date DEFAULT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `nm_siswa` varchar(100) DEFAULT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_ujian_susulan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ujian_susulan` */

LOCK TABLES `ujian_susulan` WRITE;

UNLOCK TABLES;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `nisn_nip` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

LOCK TABLES `user` WRITE;

insert  into `user`(`nisn_nip`,`nama`,`gambar`,`username`,`password`,`level`) values ('1','Admin','default.jpeg','admin','admin','admin'),('123','Muhammad Rizky','default.jpeg','rizky','rizky','guru'),('234','Sugianto','default.jpeg','sugianto','sugianto','siswa'),('345','Deni Nurhidayat','Koala.jpg','deni','deni','siswa'),('111','Tendi yustiandi','Koala.jpg','tendi','tendi','guru');

UNLOCK TABLES;

/* Trigger structure for table `admin` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambah_user_admin` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambah_user_admin` AFTER INSERT ON `admin` FOR EACH ROW BEGIN
	INSERT INTO USER(nisn_nip, nama, gambar, username, PASSWORD, LEVEL) VALUES(new.nia, new.nama, new.gambar, new.username, new.password, 'admin');
    END */$$


DELIMITER ;

/* Trigger structure for table `admin` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_user_admin` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_user_admin` AFTER UPDATE ON `admin` FOR EACH ROW BEGIN
	update user set nama = new.nama, gambar = new.gambar, username = new.username, password = new.password, level = 'admin' where nisn_nip = old.nia;
    END */$$


DELIMITER ;

/* Trigger structure for table `admin` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_user_admin` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_user_admin` AFTER DELETE ON `admin` FOR EACH ROW BEGIN
	delete from user where nisn_nip = old.nia;
    END */$$


DELIMITER ;

/* Trigger structure for table `guru` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambah_user` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambah_user` AFTER INSERT ON `guru` FOR EACH ROW BEGIN
	insert into user(nisn_nip, nama, gambar, username, password, level) values(new.nip, new.nm_guru, new.gambar, new.username, new.password, 'guru');
    END */$$


DELIMITER ;

/* Trigger structure for table `guru` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_user_guru` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_user_guru` AFTER UPDATE ON `guru` FOR EACH ROW BEGIN
	UPDATE USER SET nama = new.nm_guru, gambar = new.gambar, username = new.username, PASSWORD = new.password, LEVEL = 'guru' WHERE nisn_nip = old.nip;
    END */$$


DELIMITER ;

/* Trigger structure for table `guru` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_user_guru` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_user_guru` AFTER DELETE ON `guru` FOR EACH ROW BEGIN
	DELETE FROM USER WHERE nisn_nip = old.nip;
    END */$$


DELIMITER ;

/* Trigger structure for table `siswa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tambah_user_siswa` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tambah_user_siswa` AFTER INSERT ON `siswa` FOR EACH ROW BEGIN
INSERT INTO USER(nisn_nip, nama, gambar, username, PASSWORD, LEVEL) VALUES(new.nisn, new.nm_siswa, new.gambar, new.username, new.password, 'siswa');
    END */$$


DELIMITER ;

/* Trigger structure for table `siswa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `update_user_siswa` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `update_user_siswa` AFTER UPDATE ON `siswa` FOR EACH ROW BEGIN
	UPDATE USER SET nama = new.nm_siswa, gambar = new.gambar, username = new.username, PASSWORD = new.password, LEVEL = 'siswa' WHERE nisn_nip = old.nisn;
    END */$$


DELIMITER ;

/* Trigger structure for table `siswa` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `hapus_user_siswa` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `hapus_user_siswa` AFTER DELETE ON `siswa` FOR EACH ROW BEGIN
	DELETE FROM USER WHERE nisn_nip = old.nisn;
    END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
