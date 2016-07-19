-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2016 at 03:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bimba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nm_admin` varchar(25) NOT NULL,
  `email_admin` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `email_admin`, `password`, `no_tlp`) VALUES
(1, 'hana', 'han@gmail.com', '52fd46504e1b86d80cfa22c0a1168a9d', '087832012334'),
(2, 'putrggkji', 'ana@gmail.com', '52fd46504e1b86d80cfa22c0a1168a9d', '00897766'),
(3, 'admin', 'admin@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '094038498');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar`, `tgl_input`, `id_admin`) VALUES
(14, 'Unjuk Kreasi Siswa ', 'ayo.... daftrkan Putra dan Putri anda untuk mengikuti Unjuk kreasi siswa bimba aiueo sukasari tangerang.... mau tau kemampuan anak.... ikuti lomba ini.... lomba yang melati h rasa percaya diri dan berani tampil dihadapan orang banyak', '1466977298.jpg', '2016-06-26', 1),
(15, 'jakarta', 'banyak orang bingung ', '1466977462.jpg', '2016-06-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(15) NOT NULL,
  `nm_guru` varchar(25) NOT NULL,
  `alamat_guru` varchar(25) NOT NULL,
  `tmptlahir_guru` varchar(25) NOT NULL,
  `tgllahir_guru` date NOT NULL,
  `foto` text NOT NULL,
  `email_guru` varchar(25) NOT NULL,
  `tlp_guru` varchar(12) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_admin` int(11) NOT NULL,
  `pass_guru` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nm_guru`, `alamat_guru`, `tmptlahir_guru`, `tgllahir_guru`, `foto`, `email_guru`, `tlp_guru`, `tgl_masuk`, `id_admin`, `pass_guru`) VALUES
('9841606212', 'putri', 'pasar baru', 'kendal', '2014-07-24', 'Blue 3D Wallpapers 06hfkh.jpg', 'putri@gmail.com', '0877777777', '2016-06-21', 1, '123'),
('9841606262', 'aaaa', 'serang', 'TANGERANG', '1977-06-16', '3D Wallpapers Collection 02.jpg', 'hana@gmail.com', '08127874855', '2016-06-26', 1, '202cb962ac59075b964b07152d234b70'),
('9841606263', 'bbb', 'tangerang', 'TANGERANG', '1978-02-15', 'Blue 3D Wallpapers 03.jpg', 'hana@gmail.com', '000000000', '2016-06-26', 1, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `hari` text NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nip`, `nis`, `hari`, `jam`, `id_admin`, `id_level`, `id_materi`) VALUES
(1, '9841606212', '1607164', 'senin', '09:00-10:00', 1, 1, 16061915),
(2, '9841606212', '1607164', 'senin', '08:15-08:45', 1, 1, 16062122),
(3, '9841606212', '1607164', 'senin', '09:00-09:30', 1, 1, 16062235),
(4, '9841606262', '1606243', 'rabu', '08:00-08:30', 1, 1, 16062643),
(5, '9841606212', '1606244', 'kamis', '09:00-09:30', 1, 1, 16062643),
(6, '9841606212', '1607164', 'senin', '10:00-10:30', 1, 1, 16062122),
(7, '9841606212', '1606244', 'senin', '08:00-09:30', 1, 1, 16061915);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_input` datetime NOT NULL,
  `level` varchar(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `tgl_input`, `level`, `id_admin`) VALUES
(1, '2016-06-10 09:29:35', 'Level 1', 1),
(2, '2016-06-10 09:29:44', 'level 2', 1),
(3, '2016-06-10 09:29:58', 'level 3', 1),
(4, '2016-06-10 09:30:04', 'level 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_input` date NOT NULL,
  `materi` varchar(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_materi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16062644 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `tgl_input`, `materi`, `id_admin`, `id_level`) VALUES
(16061915, '2016-06-19', 'Baca 1', 1, 1),
(16062122, '2016-06-21', 'Tulis 2', 1, 2),
(16062235, '2016-06-22', 'Hitung 1', 1, 1),
(16062643, '2016-06-26', 'M1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `id_level` varchar(15) NOT NULL,
  `id_materi` varchar(12) NOT NULL,
  `jumlah_nilai` float NOT NULL,
  `grade` char(2) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `tgl_input`, `nip`, `nis`, `id_level`, `id_materi`, `jumlah_nilai`, `grade`, `catatan`) VALUES
('984160626285', '2016-06-26', '9841606212', '1606243', '1', '16061915', 90, 'A', 'Ayo semangat terus ya dek...');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_bayar` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_bayar` date NOT NULL,
  `nis` varchar(12) NOT NULL,
  `bayar` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status_bayar` enum('BELUM_LUNAS','LUNAS') NOT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `tgl_bayar`, `nis`, `bayar`, `id_level`, `id_admin`, `status_bayar`) VALUES
(1, '2016-06-15', '1606243', 600000, 1, 1, 'LUNAS'),
(2, '2016-06-15', '1606244', 700000, 1, 1, 'BELUM_LUNAS'),
(3, '2016-06-19', '1606263', 600000, 2, 1, 'LUNAS'),
(4, '2016-06-22', '1607164', 600000, 2, 1, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(12) NOT NULL,
  `nm_siswa` varchar(25) NOT NULL,
  `tmptlahir_siswa` varchar(20) NOT NULL,
  `tgllahir_siswa` date NOT NULL,
  `jns_kel` enum('laki-laki','perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `nm_ayah` varchar(25) NOT NULL,
  `agama_ayah` varchar(10) NOT NULL,
  `krj_ayah` varchar(25) NOT NULL,
  `no_ayah` varchar(12) NOT NULL,
  `nm_ibu` varchar(25) NOT NULL,
  `agama_ibu` varchar(10) NOT NULL,
  `krj_ibu` varchar(25) NOT NULL,
  `no_ibu` varchar(12) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nm_siswa`, `tmptlahir_siswa`, `tgllahir_siswa`, `jns_kel`, `agama`, `alamat`, `foto`, `nm_ayah`, `agama_ayah`, `krj_ayah`, `no_ayah`, `nm_ibu`, `agama_ibu`, `krj_ibu`, `no_ibu`, `id_level`, `id_admin`, `status`) VALUES
('1606243', 'candra dwi putra', 'Tanagerang', '2011-04-05', 'laki-laki', 'Islam', 'Jl. SUkamanah Tangerang', 'candra.jpg', 'Sulaiman', 'Islam', 'karyawan', '0897876765', 'Supani', 'Islam', 'IRT', '089799998687', 1, 1, 'aktif'),
('1606244', 'Rahutomo11', 'Tangerang', '2011-03-02', 'laki-laki', 'Islam', 'Jl. Dmyanti', 'RAhutomo.jpg', 'anjar', 'Islam', 'PNS', '08712345667', 'Tania', 'Islam', 'IRT', '089776787655', 1, 1, 'lulus'),
('1606263', 'aa', 'tangerang', '2011-01-02', 'laki-laki', 'Islam', 'tangerang', 'bl.jpg', 'samsudin', 'Islam', 'karyawan swasta', '08990809', 'Supani', 'Islam', 'karyawan swasta', '00980989', 1, 1, 'aktif'),
('1607164', 'budi', 'dki', '2007-02-10', 'laki-laki', 'Islam', 'lorem ispujm dolorl istgv amet', 'abstract_colorful_design_vector_background_art_267245.jpg', 'santo', 'Islam', 'wirasawa', '089898', 'yani', 'Islam', 'wrswasartga', '98292', 2, 3, 'aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
