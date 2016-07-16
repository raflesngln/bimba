-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 02:23 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rev`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `email_admin`, `password`, `no_tlp`) VALUES
(1, 'Hana eka herita', 'hana@gmail.com', '52fd46504e1b86d80cfa22c0a1168a9d', '087832012334');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar`, `tgl_input`, `id_admin`) VALUES
(14, 'Unjuk Kreasi Siswa Bimba Sukasari', 'ayo.... daftarkan Putra dan Putra Anda untuk mengikuti Unjuk kreasi siswa bimba aiueo sukasari tangerang.... mau tau kemampuan anak.... ikuti lomba ini.... lomba yang melati h rasa percaya diri dan berani tampil dihadapan orang banyak', '1468219309.jpg', '2016-07-12', 1),
(16, 'Pemenang unjuk Kreasi Bersama AW Tangerang', 'Selamat kepada para pemenang, tingkatkan terus prestasimu..... Tetap Semangat Dan Terus Belajar', '1468302627.jpg', '2016-07-12', 1);

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
('9841607121', 'Badriyah', 'Jl. kunciran RT 09/RW 02 ', 'serang', '1992-05-01', 'tttt.jpg', 'ibad55@gmail.com', '088210783734', '2016-07-12', 1, '123456'),
('9841607122', 'Ummu Fajri', 'Perumahan Banjar Wijaya R', 'Tangerang', '1989-04-05', 'miss ummu.jpg', 'ummufajri@yahoo.co.id', '085697227080', '2016-07-12', 1, '123456'),
('9841607123', 'Erni Hidayati', 'Komp. Pengayoman Blok B5 ', 'Brebes', '1992-06-25', 'miss erni.jpg', 'erni_hidayati@gmail.com', '081911591254', '2016-07-12', 1, 'erni'),
('9841607124', 'Mega Anandya', 'Jl. H.Asalan Koang jaya R', 'Tangerang', '1994-08-15', 'mega.jpg', 'egamega@yahoo.com', '087888930245', '2016-07-12', 1, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(15) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `hari` text NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `nip`, `nis`, `hari`, `jam`, `id_admin`, `id_level`, `id_materi`) VALUES
(1, '9841607121', '1606243', 'senin', '08:00-09:00', 1, 1, 16071211),
(2, '9841607121', '1606243', 'rabu', '08:00-09:00', 1, 1, 16071223),
(3, '9841607121', '1606243', 'jumat', '08:00-09:00', 1, 1, 16071236),
(4, '9841607121', '1607123', 'selasa', '08:00-09:00', 1, 1, 16071211),
(5, '9841607121', '1607123', 'kamis', '08:00-09:00', 1, 1, 16071223),
(6, '9841607121', '1607123', 'sabtu', '08:00-09:00', 1, 1, 16071236),
(7, '9841607122', '1606244', 'selasa', '08:00-09:00', 1, 1, 16071211),
(8, '9841607122', '1606244', 'kamis', '08:00-09:00', 1, 1, 16071223),
(9, '9841607122', '1606244', 'sabtu', '08:00-09:00', 1, 1, 16071236),
(10, '9841607122', '1607124', 'senin', '09:00-10:00', 1, 1, 16071211),
(11, '9841607122', '1607124', 'rabu', '09:00-10:00', 1, 1, 16071223),
(12, '9841607122', '1607124', 'sabtu', '09:00-10:00', 1, 1, 16071236);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(10) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `level` varchar(25) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `status_active` int(10) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `id_siswa`, `tgl_input`, `level`, `id_admin`, `status_active`) VALUES
(1, 1, '2016-06-10 09:29:35', 'Level 1', 1, 0),
(2, 2, '2016-06-10 09:29:44', 'Level 2', 1, 0),
(3, 3, '2016-06-10 09:29:58', 'Level 3', 1, 0),
(4, 4, '2016-06-10 09:30:04', 'Level 4', 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160712125 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `tgl_input`, `materi`, `id_admin`, `id_level`) VALUES
(1, '2016-07-05', 'membaca', 1, 1),
(2, '2016-07-06', 'menulis', 1, 1),
(3, '2016-07-06', 'menghitung', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL,
  `id_materi` int(10) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `id_level` varchar(15) NOT NULL,
  `Nilai` int(3) NOT NULL,
  `grade` char(2) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `tgl_input`, `id_materi`, `nip`, `nis`, `id_level`, `Nilai`, `grade`, `catatan`) VALUES
('1', '2016-07-07', 1, '211', '2121313', '1', 90, 'a', 'ffj'),
('2', '2016-07-07', 2, '211', '2121313', '1', 90, 'a', 'ffj'),
('3', '2016-07-07', 3, '211', '2121313', '1', 90, 'a', 'ffj');

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
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `tgl_bayar`, `nis`, `bayar`, `id_level`, `id_admin`) VALUES
(1, '2016-07-12', '1606243', 600000, 1, 1),
(2, '2016-07-12', '1606244', 600000, 1, 1),
(3, '2016-07-12', '1607123', 600000, 1, 1),
(4, '2016-07-12', '1607124', 600000, 1, 1),
(5, '2016-07-12', '1607125', 600000, 1, 1),
(6, '2016-07-12', '1607126', 600000, 1, 1),
(7, '2016-07-12', '1607127', 600000, 1, 1),
(8, '2016-07-12', '1607128', 600000, 1, 1),
(9, '2016-07-12', '1607129', 600000, 1, 1);

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
('1606244', 'Rahutomo', 'Tangerang', '2011-03-02', 'laki-laki', 'Islam', 'Jl.Sukamanah 4 No.9 RT 01/RW 03', 'RAhutomo.jpg', 'aman setyawan', 'Islam', 'PNS', '08712345667', 'Tania', 'Islam', 'IRT', '089776787655', 1, 1, 'non aktif'),
('1607123', 'Fatimah Zahroni', 'Tangerang', '2012-07-08', 'perempuan', 'Islam', 'Jl. Adipatih RT 09 / RW 07 Legok', 'Fatimah.jpg', 'M. Dikha', 'Islam', 'Arsitek', '081372456765', 'Liana ', 'Islam', 'Guru', '081372456767', 1, 1, 'aktif'),
('1607124', 'Siti Aisyah', 'Bandung', '2013-09-02', 'perempuan', 'Islam', 'JL. Sukamanah 2 RT01/ RW 03 ', 'Aisyah.jpg', 'Anjas Kurniawan', 'Islam', 'Wiraswasta', '089546787666', 'Ani Soraya', 'Islam', 'Perawat', '087832763345', 1, 1, 'aktif'),
('1607125', 'Lizam Al-khalifi Junardo', 'Tangerang', '2011-10-06', 'perempuan', 'Islam', 'Perumahan Orchid Park Tangerang', 'Lizam.jpg', 'Lega Junardo', 'Islam', 'Pegawai Swasta', '087887965456', 'Norma Susanti', 'Islam', 'Pegawai Swasta', '087888937777', 1, 1, 'aktif'),
('1607126', 'Midho Al- Qois', 'Tangerang', '2011-02-09', 'laki-laki', 'Islam', 'Jl. Sukamulya 2 no. 20 Rt 002/Rw 09 Tangerang', 'Midho.jpg', 'Dodi', 'Islam', 'Karyawan Swasta', '081399141980', 'Mila', 'Islam', 'Ibu Rumah Tangga', '0', 1, 1, 'aktif'),
('1607127', 'Razka Afubar Aditya', 'Tangerang', '2013-02-01', 'laki-laki', 'Islam', 'Komp. Pengayoman Jl. Pengadilan raya Blok c6', 'Raska.jpg', 'Angga Aditya', 'Islam', 'Wiraswasta', '08561114876', 'Henylia Ulfa', 'Islam', 'Ibu Rumah Tangga', '081584484540', 1, 1, 'aktif'),
('1607128', 'Gerry Imanuel', 'Tangerang', '2010-01-10', 'laki-laki', 'Islam', 'Gedung 3 jln perdamaian RT 02 / RW 08 Tangerang', 'gerry.jpg', 'Joni Wiharja', 'Islam', 'Karyawan Swasta', '081294353198', 'Sri Wahyuni', 'Islam', 'Ibu Rumah Tangga', '082225878973', 1, 1, 'aktif'),
('1607129', 'Labiba Fatimah azzahra', 'Tangerang', '2011-07-13', 'perempuan', 'Islam', 'JL. Cendana No.4 Sukasari', 'labiba.jpg', 'Lutfie salman A', 'Islam', 'Karyawan swasta', '08979654634', 'Suzana Rubihartaloka', 'Islam', 'Ibu Rumah Tangga', '09684823530', 1, 1, 'aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
