-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 09:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_toko`
--

CREATE TABLE `data_toko` (
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_toko`
--

INSERT INTO `data_toko` (`nama`, `alamat`, `telepon`) VALUES
('Toko Sumber Bahagia', 'Jalan Pecindilan IV / 16, Surabaya', '031-8770321');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nota`
--

CREATE TABLE `detail_nota` (
  `id_nota` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_nota`
--

INSERT INTO `detail_nota` (`id_nota`, `no_urut`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `harga`, `sub_total`) VALUES
(1, 1, '02', 'Kain Batik Merah Okeman', 10, 'meter', 7500, 75000),
(1, 2, '1', 'Kain Batik', 100, 'meter', 0, 0),
(1, 3, '33964770881', 'Kain katun batik biru', 2, 'meter', 75000, 150000),
(2, 2, '097855060266', 'Mouse', 1, 'pcs', 80000, 80000),
(2, 3, '33964770881', 'Kain katun batik biru', 8, 'meter', 75000, 600000),
(2, 1, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(3, 3, '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 5, 'pcs', 225000, 1125000),
(3, 2, '8992112011031', 'Enervon-C', 40, 'botol', 40000, 1600000),
(4, 1, '8992112011031', 'Enervon-C', 50, 'botol', 40000, 2000000),
(5, 1, '02', 'Kain Batik Merah Okeman', 20, 'meter', 7500, 150000),
(6, 1, '02', 'Kain Batik Merah Okeman', 10, 'meter', 7500, 75000),
(8, 2, '2', 'a', 2, 'meter', 1500, 3000),
(8, 1, '8992112011031', 'Enervon-C', 50, 'botol', 40000, 2000000),
(9, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(14, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(15, 1, '02', 'Kain Batik Merah Okeman', 2, 'meter', 7500, 15000),
(16, 1, '02', 'Kain Batik Merah Okeman', 2, 'meter', 7500, 15000),
(17, 1, '02', 'Kain Batik Merah Okeman', 4, 'meter', 7500, 30000),
(18, 1, '02', 'Kain Batik Merah Okeman', 10, 'meter', 7500, 75000),
(19, 1, '02', 'Kain Batik Merah Okeman', 5, 'meter', 7500, 37500),
(20, 1, '02', 'Kain Batik Merah Okeman', 5, 'meter', 7500, 37500),
(21, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(22, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(23, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(24, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(25, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(26, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(27, 2, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(27, 3, '097855067081', 'Keyboard', 1, 'pcs', 100000, 100000),
(27, 1, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(28, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(28, 4, '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(28, 2, '1', 'Kain Batik', 200, 'meter', 0, 0),
(28, 3, '33964770881', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(31, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(31, 3, '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(31, 2, '33964770881', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(31, 4, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(32, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(32, 3, '09778854556', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(32, 2, '3396477088', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(32, 4, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(33, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(33, 3, '09778854556', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(33, 2, '3396477088', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(33, 4, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(34, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(34, 4, '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(34, 2, '1', 'Kain Batik', 200, 'meter', 0, 0),
(34, 3, '3396477088', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(35, 1, '02', 'Kain Batik Merah Okeman', 2, 'meter', 7500, 15000),
(35, 2, '1', 'Kain Batik', 200, 'meter', 0, 0),
(35, 3, '3396477088', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(35, 4, '33964770881', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(36, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(36, 4, '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000, 225000),
(36, 2, '1', 'Kain Batik', 100, 'meter', 0, 0),
(36, 3, '3396477088', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(37, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(37, 2, '1', 'Kain Batik', 100, 'meter', 0, 0),
(37, 3, '33964770881', 'Kain katun batik biru', 1, 'meter', 75000, 75000),
(38, 1, '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500, 7500),
(39, 1, '02', 'Kain Batik Merah Okeman', 2, 'meter', 7500, 15000),
(40, 1, '8992112011031', 'Enervon-C', 10, 'botol', 40000, 400000),
(41, 1, '1707HS023AV9', 'Logitech B100', 10, 'pcs', 80000, 800000),
(41, 12, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(43, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(43, 2, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(44, 3, '1707HS023AV9', 'Logitech B100', 10, 'pcs', 80000, 800000),
(44, 2, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(44, 1, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(45, 1, '1707HS023AV9', 'Logitech B100', 10, 'pcs', 80000, 800000),
(45, 2, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(45, 3, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(46, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(46, 2, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(47, 2, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(47, 1, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(48, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(49, 1, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(50, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(51, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(52, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(52, 2, '8999999053031', 'Pond\'s', 20, 'botol', 12500, 250000),
(53, 1, '8997021870564', 'Hot In Cream', 100, 'botol', 20000, 2000000),
(54, 1, '8997021870564', 'Hot In Cream', 100, 'botol', 20000, 2000000),
(60, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(61, 1, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(62, 2, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(63, 1, '8997021870564', 'Hot In Cream', 10, 'botol', 20000, 200000),
(64, 1, '8997021870564', 'Hot In Cream', 20, 'botol', 20000, 400000),
(65, 2, '1', 'Kain Batik', 10, 'meter', 0, 0),
(66, 1, '1', 'Kain Batik', 10, 'meter', 0, 0),
(67, 2, '8999999053031', 'Pond\'s', 10, 'botol', 12500, 125000),
(68, 1, '8999999053031', 'Pond\"s', 10, 'botol', 12500, 125000),
(69, 2, 'asdf', 'asdf', 23, 'Botol', 123, 2829);

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `no` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(255) NOT NULL,
  `nama` text NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`) VALUES
(1, 'Kain Batik', 'kain batik celana, kemeja, dll.'),
(2, 'Komputer', 'Kelengkapan alat-alat komputer. Mouse, keyboard, monitor, CPU, motherboard, printer, dll.'),
(3, 'Suplemen', 'Suplemen kesehatan, obat-obatan, pemutih, peninggi, pelangsing'),
(4, 'Cream', 'lotion, salep, sunblock');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `tanggal`, `total`, `petugas`) VALUES
(1, '2018-05-12 07:05:42', 225000, 'admin'),
(2, '2018-05-13 10:41:44', 1080000, 'admin'),
(3, '2018-05-13 10:49:56', 2725000, 'admin'),
(4, '2018-05-13 14:35:13', 2000000, 'admin'),
(5, '2018-05-13 14:46:46', 150000, 'admin'),
(6, '2018-05-13 14:47:42', 75000, 'admin'),
(7, '2018-05-13 14:48:02', 75000, 'admin'),
(8, '2018-05-13 14:49:04', 2003000, 'admin'),
(9, '2018-05-13 14:54:09', 7500, 'admin'),
(10, '2018-05-13 14:54:55', 7500, 'admin'),
(11, '2018-05-13 14:55:16', 7500, 'admin'),
(12, '2018-05-13 14:55:31', 7500, 'admin'),
(13, '2018-05-13 14:56:39', 7500, 'admin'),
(14, '2018-05-13 14:59:49', 7500, 'admin'),
(15, '2018-05-13 15:05:41', 15000, 'admin'),
(16, '2018-05-13 15:06:47', 15000, 'admin'),
(17, '2018-05-13 15:08:17', 30000, 'admin'),
(18, '2018-05-13 15:12:08', 75000, 'admin'),
(19, '2018-05-13 15:12:30', 37500, 'admin'),
(20, '2018-05-13 15:12:57', 37500, 'admin'),
(21, '2018-05-13 15:13:10', 7500, 'admin'),
(22, '2018-05-13 15:13:23', 7500, 'admin'),
(23, '2018-05-13 15:13:37', 7500, 'admin'),
(24, '2018-05-13 15:13:57', 7500, 'admin'),
(25, '2018-05-13 15:18:33', 7500, 'admin'),
(26, '2018-05-13 16:11:22', 7500, 'admin'),
(27, '2018-05-13 16:26:14', 507500, 'admin'),
(28, '2018-05-13 16:46:01', 307500, 'admin'),
(29, '2018-05-13 16:46:41', 0, ''),
(30, '2018-05-13 16:46:56', 0, ''),
(31, '2018-05-13 16:47:18', 707500, 'admin'),
(32, '2018-05-13 16:51:12', 707500, 'admin'),
(33, '2018-05-13 16:56:48', 707500, 'admin'),
(34, '2018-05-13 16:57:31', 307500, 'admin'),
(35, '2018-05-13 16:58:49', 165000, 'admin'),
(36, '2018-05-13 17:02:54', 307500, 'admin'),
(37, '2018-05-13 17:07:33', 82500, 'admin'),
(38, '2018-05-13 17:08:02', 7500, 'admin'),
(39, '2018-05-13 17:08:16', 15000, 'admin'),
(40, '2018-05-13 17:13:59', 400000, 'admin'),
(41, '2018-05-14 14:43:01', 1125000, 'admin'),
(42, '2018-05-14 14:44:43', 325000, 'admin'),
(43, '2018-05-14 14:45:20', 325000, 'admin'),
(44, '2018-05-14 14:45:57', 1125000, 'admin'),
(45, '2018-05-14 14:56:13', 1125000, 'admin'),
(46, '2018-05-14 14:57:02', 325000, 'admin'),
(47, '2018-05-14 14:57:30', 325000, 'admin'),
(48, '2018-05-14 14:59:37', 200000, 'admin'),
(49, '2018-05-14 15:06:04', 125000, 'admin'),
(50, '2018-05-14 14:58:31', 200000, 'admin'),
(51, '2018-05-14 14:59:06', 200000, 'admin'),
(52, '2018-05-14 15:00:26', 450000, 'admin'),
(53, '2018-05-14 15:02:24', 2000000, 'admin'),
(54, '2018-05-14 15:03:01', 2000000, 'admin'),
(55, '2018-05-14 15:03:29', 2000000, 'admin'),
(56, '2018-05-14 15:03:32', 2000000, 'admin'),
(57, '2018-05-14 15:04:56', 2000000, 'admin'),
(58, '2018-05-14 15:05:07', 2000000, 'admin'),
(59, '2018-05-14 15:05:24', 2000000, 'admin'),
(60, '2018-05-14 15:14:56', 200000, 'admin'),
(61, '2018-05-14 15:53:21', 125000, 'admin'),
(62, '2018-05-17 14:23:44', 200000, 'admin'),
(63, '2018-05-17 14:28:44', 200000, 'admin'),
(64, '2018-05-17 14:34:10', 400000, 'admin'),
(65, '2018-05-20 07:17:00', 0, 'admin'),
(66, '2018-05-20 07:17:40', 0, 'admin'),
(67, '2018-05-20 12:07:14', 125000, 'admin'),
(68, '2018-05-20 15:08:40', 125000, 'admin'),
(69, '2018-06-12 15:30:44', 2829, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama`) VALUES
(1, 'meter'),
(2, 'pcs'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `kode_satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `nama_kategori`, `kode_barang`, `nama_barang`, `jumlah_barang`, `kode_satuan`, `harga`) VALUES
(1, 'Kain Batik', '02', 'Kain Batik Merah Okeman', 1, 'meter', 7500),
(2, 'Komputer', '097855060266', 'Mouse', 0, 'pcs', 80000),
(3, 'Komputer', '097855067081', 'Keyboard', 0, 'pcs', 100000),
(4, 'Kain Batik', '1', 'Kain Batik', 3880, 'meter', 0),
(5, 'Kain Batik', '2', 'a', 10, 'meter', 1500),
(6, 'Komputer', '8806098109234', 'Samsung Monitor LED IPS HDMI/DVI 22 Inch', 0, 'pcs', 1200000),
(7, 'Komputer', '20', '2', 2, 'pcs', 2),
(8, 'Kain Batik', '3', '3', 3, 'meter', 3),
(9, 'Komputer', '09778854556', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 0, 'pcs', 225000),
(10, 'Komputer', '787546220987', 'Acces Point Cisco', 1, 'pcs', 10000000),
(11, 'Kain Batik', '3396477088', 'Kain katun batik biru', 4, 'meter', 75000),
(20, 'Kain Batik', '33', '3', 3, 'meter', 3),
(21, 'Komputer', '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000),
(22, 'Komputer', '7875462209874', 'Acces Point Cisco', 1, 'pcs', 10000000),
(23, 'Kain Batik', '33964770881', 'Kain katun batik biru', 6, 'meter', 75000),
(24, 'Suplemen', '8992112011031', 'Enervon-C', 300, 'Botol', 40000),
(28, 'Cream', '8997021870564', 'Hot In Cream', 150, 'Botol', 20000),
(29, 'Cream', '8999999053031', 'Pond\"s', 380, 'Botol', 12500),
(30, 'Komputer', '1707HS023AV9', 'Logitech B100', 470, 'pcs', 80000),
(31, 'Cream', 'asd', 'asd\"12we\'asd', 1231, 'meter', 123),
(32, 'Cream', 'GA20180604', 'Garnier Skin Natulas', 10, 'Botol', 20500),
(37, 'Kain Batik', 'asdf', 'asdf', 100, 'Botol', 123),
(40, 'Cream', '123', '123', 123, 'Botol', 123);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `petugas` varchar(255) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`tanggal`, `petugas`, `kode_barang`, `nama_barang`, `jumlah`, `keterangan`) VALUES
('2018-05-01 13:35:19', 'admin', 1, 'Kain Batik', 5000, 'stok baru'),
('2018-06-12 16:41:32', 'admin', 123, '123', 123, 'Stok baru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `invoice` tinyint(1) NOT NULL,
  `pembukuan` tinyint(1) NOT NULL,
  `stok` tinyint(1) NOT NULL,
  `pengaturan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `invoice`, `pembukuan`, `stok`, `pengaturan`) VALUES
('admin', 'admin', 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `detail_nota`
--
ALTER TABLE `detail_nota`
  ADD PRIMARY KEY (`id_nota`,`kode_barang`);

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PRIMARY2` (`kode_barang`) USING BTREE;

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`tanggal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
