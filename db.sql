-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2019 at 03:48 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bisnis`
--

CREATE TABLE `tb_bisnis` (
  `id_bisnis` int(11) NOT NULL,
  `nama_bisnis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bisnis`
--

INSERT INTO `tb_bisnis` (`id_bisnis`, `nama_bisnis`) VALUES
(1, 'Bisnis 1'),
(2, 'bisnis 2'),
(3, 'Bisnis 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fungsi`
--

CREATE TABLE `tb_fungsi` (
  `id_fungsi` int(11) NOT NULL,
  `nama_fungsi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_fungsi`
--

INSERT INTO `tb_fungsi` (`id_fungsi`, `nama_fungsi`) VALUES
(1, 'asdasd'),
(2, 'fungsi 2'),
(3, 'fungsi 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelompok`
--

CREATE TABLE `tb_kelompok` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelompok`
--

INSERT INTO `tb_kelompok` (`id_kelompok`, `nama_kelompok`) VALUES
(1, 'kelompok1'),
(2, 'kelompok 2'),
(8, 'Kelompok 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk`
--

CREATE TABLE `tb_sk` (
  `id_sk` int(11) NOT NULL,
  `produk` varchar(20) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `perihal` varchar(60) NOT NULL,
  `tmt` date NOT NULL,
  `catatan` varchar(60) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sk`
--

INSERT INTO `tb_sk` (`id_sk`, `produk`, `nomer`, `perihal`, `tmt`, `catatan`, `file`, `id_kelompok`, `created`) VALUES
(32, 'SK Direktur Utama', '12/TU/3101/VII/2019', 'hkasjhdkjhaskdh', '2019-09-30', 'asd', '1569861007_aplikasi_bangka.pdf', 1, '2019-09-30 16:30:07'),
(33, 'SK Direktur Utama', 'asdasd', 'asdasd', '2019-10-01', 'asdasdasd', '1569862945_aplikasi_bangka.pdf', 1, '2019-09-30 17:02:25'),
(34, 'SK Direktur Utama', '34-PO/T/IX/2019', 'hkasjhdkjhaskdh', '2019-10-01', '', '1569867790_GEMASTIK_12_Pengembangan_Perangkat_Lunak-120050165505-404_notfound.pdf', 1, '2019-09-30 18:23:10'),
(35, 'SK Direktur Keuangan', '12/TU/3101/VII/2019', 'hkasjhdkjhaskdh', '2019-10-01', '', '1569867861_Cetak_Surat.pdf', 1, '2019-09-30 18:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stk`
--

CREATE TABLE `tb_stk` (
  `id_stk` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `fungsi` varchar(40) NOT NULL,
  `nomer` varchar(20) NOT NULL,
  `revisi` int(11) NOT NULL,
  `perihal` varchar(40) NOT NULL,
  `tmt` date NOT NULL,
  `catatan` varchar(40) NOT NULL,
  `info` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  `id_kelompok` int(11) NOT NULL,
  `id_fungsi` int(11) NOT NULL,
  `id_bisnis` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stk`
--

INSERT INTO `tb_stk` (`id_stk`, `jenis`, `fungsi`, `nomer`, `revisi`, `perihal`, `tmt`, `catatan`, `info`, `file`, `id_kelompok`, `id_fungsi`, `id_bisnis`, `created`) VALUES
(5, 'Pedoman', 'Direktur Management Asset', '12/TU/3101/VII/2019', 0, 'hkasjhdkjhaskdh', '2019-09-30', 'asd', 'Referensi Review Doc', '1569860986_aplikasi_bangka.pdf', 1, 1, 1, '2019-09-30 16:29:46'),
(6, 'Pedoman', 'Direktur Management Asset', '2222', 0, 'hkasjhdkjhaskdh', '2019-10-01', 'sadasdas', 'Referensi Review Doc', '1569863543_aplikasi_bangka.pdf', 2, 2, 2, '2019-09-30 17:12:23'),
(7, 'TKI', 'VIP Procurement Excellent Center', '12/TU/3101/VII/2019', 0, 'hkasjhdkjhaskdh', '2019-10-01', '', 'Referensi Review Doc', '1569867909_aplikasi_bangka.pdf', 1, 1, 1, '2019-09-30 18:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `nama`, `pass`, `level`) VALUES
(1, 'iqbal@gmail.com', 'iqbal', 'c4ca4238a0b923820dcc509a6f75849b', 'admin'),
(2, 'iqbal@gmail.com', 'agus', 'c4ca4238a0b923820dcc509a6f75849b', 'operator'),
(5, 'iqbaltrynew@gmail.com', 'Muhammad Iqbal', '827ccb0eea8a706c4c34a16891f84e7b', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bisnis`
--
ALTER TABLE `tb_bisnis`
  ADD PRIMARY KEY (`id_bisnis`);

--
-- Indexes for table `tb_fungsi`
--
ALTER TABLE `tb_fungsi`
  ADD PRIMARY KEY (`id_fungsi`);

--
-- Indexes for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tb_sk`
--
ALTER TABLE `tb_sk`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `tb_stk`
--
ALTER TABLE `tb_stk`
  ADD PRIMARY KEY (`id_stk`),
  ADD KEY `id_bisnis` (`id_bisnis`),
  ADD KEY `id_fungsi` (`id_fungsi`),
  ADD KEY `id_kelompok` (`id_kelompok`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bisnis`
--
ALTER TABLE `tb_bisnis`
  MODIFY `id_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_fungsi`
--
ALTER TABLE `tb_fungsi`
  MODIFY `id_fungsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kelompok`
--
ALTER TABLE `tb_kelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_sk`
--
ALTER TABLE `tb_sk`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_stk`
--
ALTER TABLE `tb_stk`
  MODIFY `id_stk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sk`
--
ALTER TABLE `tb_sk`
  ADD CONSTRAINT `tb_sk_ibfk_3` FOREIGN KEY (`id_kelompok`) REFERENCES `tb_kelompok` (`id_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_stk`
--
ALTER TABLE `tb_stk`
  ADD CONSTRAINT `tb_stk_ibfk_1` FOREIGN KEY (`id_bisnis`) REFERENCES `tb_bisnis` (`id_bisnis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_stk_ibfk_2` FOREIGN KEY (`id_fungsi`) REFERENCES `tb_fungsi` (`id_fungsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_stk_ibfk_3` FOREIGN KEY (`id_kelompok`) REFERENCES `tb_kelompok` (`id_kelompok`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
