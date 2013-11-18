-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2013 at 07:33 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_simkop`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_anggota`
--

CREATE TABLE IF NOT EXISTS `master_anggota` (
  `no_ba` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `lingkungan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat_pekerjaan` varchar(50) NOT NULL,
  `nama_suamiisteri` varchar(50) NOT NULL,
  `orang_tua` varchar(50) NOT NULL,
  `uang_pangkal` int(25) NOT NULL,
  `simpanan_wajib` int(25) NOT NULL,
  `simpanan_pokok` int(25) NOT NULL,
  `iuran_sumbangan` int(25) NOT NULL,
  `simpanan_sukarela` int(25) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `periode` year(4) NOT NULL,
  PRIMARY KEY (`no_ba`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_anggota`
--

INSERT INTO `master_anggota` (`no_ba`, `nama_lengkap`, `no_ktp`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `lingkungan`, `pekerjaan`, `alamat_pekerjaan`, `nama_suamiisteri`, `orang_tua`, `uang_pangkal`, `simpanan_wajib`, `simpanan_pokok`, `iuran_sumbangan`, `simpanan_sukarela`, `tanggal_masuk`, `periode`) VALUES
('10040200045', 'Dian Satro Wadoyo', '004837843275487', 'Perempuan', 'Pematang Siantar', '24-12-1992', '0993097323', 'Jln Balam', 'Balam', 'PNS', 'Jln Balam', '-', '-', 40000, 20000, 200000, 50000, 5000, '2013-06-14', 2013),
('1004020378', 'Faddli Lindra Wibowo', '0321832137912361763', 'Laki-Laki', 'Pematang Siantar', '24-12-1992', '0993097323', 'Jln Balam', 'Balam', 'Pegawai', 'Jln Balam', '-', '-', 40000, 20000, 200000, 50000, 5000, '2012-06-14', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE IF NOT EXISTS `master_jabatan` (
  `id_jabatan` int(50) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(15, 'Sekertaris'),
(13, 'Ketua'),
(19, 'Pengurus KSP');

-- --------------------------------------------------------

--
-- Table structure for table `master_pegawai`
--

CREATE TABLE IF NOT EXISTS `master_pegawai` (
  `nip` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `alamat_lengkap` varchar(50) NOT NULL,
  `id_jabatan` varchar(50) NOT NULL,
  `alamat_pekerjaan` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pegawai`
--

INSERT INTO `master_pegawai` (`nip`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat_lengkap`, `id_jabatan`, `alamat_pekerjaan`) VALUES
('10030389', 'Dito Meggy', 'Laki-Laki', 'Pematang Siantar', '24-12-1992', '0993097323', 'Jln Balam', '19', 'Jln Balam'),
('100402000', 'Dian Satro Wadoyo', 'Perempuan', 'Pematang Siantar', '24-12-1992', '0993097323', 'Jln Balam', '15', 'Jln Balam'),
('100402037', 'Faddli Lindra Wibowo', 'Laki-Laki', 'Pematang Siantar', '24-12-1992', '0993097323', 'Jln Balam', '13', 'Jln Balam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE IF NOT EXISTS `tbl_user_login` (
  `id_user_login` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `stts` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id_user_login`, `username`, `password`, `nama_lengkap`, `stts`) VALUES
(1, 'admin', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 'Administrator', 'administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
