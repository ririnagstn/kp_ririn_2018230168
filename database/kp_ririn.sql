-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 04:43 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp_ririn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `satuan` varchar(200) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama`, `satuan`, `harga`, `kategori`, `gambar`) VALUES
(59, 'Bayam', 'Ikat', 5000, 'Sayuran', 'Bayam.jpeg'),
(61, 'Strawberry', 'kg', 65000, 'Buah', 'Strawberry.jpeg'),
(62, 'Melon', 'kg', 34000, 'Buah', 'Melon.jpeg'),
(63, 'Paprika Merah', 'kg', 25000, 'Sayuran', 'paprika merah.jpg'),
(64, 'Paprika Hijau', 'kg', 25000, 'Sayuran', 'Paprika Hijau.png'),
(65, 'Wortel', 'kg', 3400, 'Buah', 'Wortel.jpg'),
(66, 'Rawit', 'kg', 35000, 'Sayuran', 'rawit merah.jpg'),
(67, 'Alpukat', 'kg', 40000, 'Buah', 'alpukat.jpg'),
(68, 'Jambu Biji', 'kg', 32000, 'Buah', 'jambu biji.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `suka` int(11) NOT NULL,
  `tidak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `suka`, `tidak`) VALUES
(1, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_histori`
--

CREATE TABLE `tbl_histori` (
  `id_histori` varchar(20) NOT NULL,
  `nama` varchar(400) NOT NULL,
  `alamat` text NOT NULL,
  `totalharga` bigint(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_dikirim` datetime DEFAULT NULL,
  `tgl_diterima` datetime DEFAULT NULL,
  `id_sales` varchar(20) NOT NULL,
  `alasan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_histori`
--

INSERT INTO `tbl_histori` (`id_histori`, `nama`, `alamat`, `totalharga`, `status`, `tanggal`, `tgl_dikirim`, `tgl_diterima`, `id_sales`, `alasan`) VALUES
('ODR007', 'BOBY', 'Lenteng Agung', 80000, 'Pesanan Dibuat', '2022-12-06 22:08:30', NULL, NULL, 'sales', ''),
('ODR008', 'rino', 'kalimalang', 120000, 'Pesanan Dibuat', '2022-12-07 18:38:06', NULL, NULL, 'sales', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(20) NOT NULL,
  `id_pesanan` varchar(20) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `id_pesanan`, `id_barang`, `qty`) VALUES
(15, 'ODR007', 59, 1),
(16, 'ODR007', 60, 1),
(17, 'ODR007', 63, 1),
(18, 'ODR008', 59, 1),
(19, 'ODR008', 60, 1),
(20, 'ODR008', 61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`username`, `password`, `akses`, `nama`, `alamat`, `no_hp`) VALUES
('kasir', 'kasir', 'kasir', 'Kasir', 'Jln. Indah Pada waktunya', '089527278800'),
('sales', 'sales', 'sales', 'Sales Dival Ardiano', 'Jln kapan aja', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_histori`
--
ALTER TABLE `tbl_histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
