-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 11:38 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indah`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `kontrak`
-- (See below for the actual view)
--
CREATE TABLE `kontrak` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
-- (See below for the actual view)
--
CREATE TABLE `login` (
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(32) NOT NULL,
  `nup` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL COMMENT 'Admin / Super Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `name`, `nup`, `role`) VALUES
(1, 'habib', '827ccb0eea8a706c4c34a16891f84e7b', 'Habib Syuhada', '10039315', 'Super Admin'),
(2, 'ab', '827ccb0eea8a706c4c34a16891f84e7b', 'ab', 'ab', 'Admin'),
(3, '1', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `no_arsip` varchar(50) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `perihal` text NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `kode_dokumen` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`no_arsip`, `no_surat`, `perihal`, `tanggal_terbit`, `kode_dokumen`, `file`, `tanggal_input`) VALUES
('a', 'a', 'a', '2020-06-22', 'P', '', '2020-06-25 14:51:03'),
('b', 'b', 'b', '2020-06-24', 'P', '1-200624 060600.pdf', '2020-06-25 14:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_dokumen`
--

CREATE TABLE `tbl_jenis_dokumen` (
  `kode_dokumen` varchar(50) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `adm_penomoran` varchar(50) NOT NULL,
  `sifat_penomoran` varchar(50) NOT NULL,
  `tanggal_input` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_dokumen`
--

INSERT INTO `tbl_jenis_dokumen` (`kode_dokumen`, `nama_dokumen`, `adm_penomoran`, `sifat_penomoran`, `tanggal_input`) VALUES
('P', 'Pengumuman', 'Divisi SDM', 'Biasa', '2020-06-22 00:00:00'),
('PR', 'Press Release', 'Sekper', 'Biasa', '2020-06-22 00:00:00');

-- --------------------------------------------------------

--
-- Structure for view `kontrak`
--
DROP TABLE IF EXISTS `kontrak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kontrak`  AS  (select `kntrk`.`nmkntrk` AS `nmkntrk`,`kntrk`.`kdpt` AS `kdpt`,`pt`.`nmpt` AS `nmpt`,`pt`.`almt` AS `almt`,`kntrk`.`tglm` AS `tglm`,`kntrk`.`tglex` AS `tglex`,`kntrk`.`tglacc` AS `tglacc`,`kntrk`.`ket` AS `ket`,(to_days(`kntrk`.`tglex`) - to_days(curdate())) AS `hari`,`kntrk`.`draftkntrk` AS `draftkntrk`,`kntrk`.`fkntrk` AS `fkntrk` from (`kntrk` join `pt`) where (`kntrk`.`kdpt` = `pt`.`kdpt`)) ;

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login`  AS  (select `usr`.`usr` AS `username`,md5(`usr`.`pss`) AS `password`,`usr`.`nm_user` AS `nm_user`,`usr`.`akses` AS `akses`,`usr`.`act` AS `act` from `usr`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`no_arsip`);

--
-- Indexes for table `tbl_jenis_dokumen`
--
ALTER TABLE `tbl_jenis_dokumen`
  ADD PRIMARY KEY (`kode_dokumen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
