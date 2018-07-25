-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 06:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `nim` varchar(20) NOT NULL,
  `n_ayah` varchar(100) NOT NULL,
  `n_ibu` varchar(100) NOT NULL,
  `agama_ayah` varchar(100) NOT NULL,
  `agama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `usia_ayah` int(11) NOT NULL,
  `usia_ibu` int(11) NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `penghasilan` int(11) NOT NULL,
  `status_ayah` varchar(100) NOT NULL,
  `status_ibu` varchar(100) NOT NULL,
  `kepemilikan_rumah` varchar(100) NOT NULL,
  `daya_listrik` int(11) NOT NULL,
  `sumber_air` text NOT NULL,
  `saudara` text,
  `alamat_ayah` text NOT NULL,
  `alamat_ibu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_keluarga`
--

INSERT INTO `data_keluarga` (`nim`, `n_ayah`, `n_ibu`, `agama_ayah`, `agama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `usia_ayah`, `usia_ibu`, `jumlah_anak`, `anak_ke`, `penghasilan`, `status_ayah`, `status_ibu`, `kepemilikan_rumah`, `daya_listrik`, `sumber_air`, `saudara`, `alamat_ayah`, `alamat_ibu`) VALUES
('09021181419007', 'Syamsudin', 'Dahlia Yustina', 'Islam', 'Islam', 'PNS', 'IRT', 54, 50, 3, 3, 3000000, 'Kandung', 'Kandung', 'Pribadi', 10, 'Sudekat', '[{\"nama\":\"Diaz Liansyah Pratama\",\"usia\":\"27\",\"status\":\"Kandung\",\"pekerjaan\":\"Pegawai\"},{\"nama\":\"Azmi Auliansyah\",\"usia\":\"23\",\"status\":\"Kandung\",\"pekerjaan\":\"Pegawai\"}]', 'Lubuklinggau', 'Lubuklinggau');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan`
--

CREATE TABLE `data_pengajuan` (
  `id` int(11) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `jenis_beasiswa` enum('PPA','PKG','SWADANA') NOT NULL,
  `ipk_terakhir` double NOT NULL,
  `status` enum('baru','perpanjangan') NOT NULL DEFAULT 'baru'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengajuan`
--

INSERT INTO `data_pengajuan` (`id`, `nim`, `jenis_beasiswa`, `ipk_terakhir`, `status`) VALUES
(1, '09021181419007', 'PPA', 3.72, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(1, 'Sipil'),
(2, 'Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(100) NOT NULL,
  `pin` char(60) NOT NULL,
  `nama` text,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `tempat_lahir` text,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(8) DEFAULT NULL,
  `telepon` varchar(12) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `nomor_rekening` varchar(50) DEFAULT NULL,
  `prestasi` enum('Internasional','Nasional') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `pin`, `nama`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_pos`, `telepon`, `jurusan`, `semester`, `nomor_rekening`, `prestasi`) VALUES
('09021181419007', '$2y$10$w0mGp0Zti29xbigPpSW1p.u9CNrlnKKwP.3gmCnBZO8lfxt01iv2i', 'Azhary Arliansyah', 'L', 'Islam', 'Palembang', '1996-08-05', 'Komplek Bougenville', '31521', '081234265011', '2', 8, '123213324', 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `role`) VALUES
('azhary', '985fabf8f96dc1c4c306341031569937', 'arliansyah_azhary@yahoo.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `data_pengajuan`
--
ALTER TABLE `data_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengajuan`
--
ALTER TABLE `data_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
