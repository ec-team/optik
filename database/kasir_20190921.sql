-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 10:07 AM
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
('Toko Sumber Bahagia', 'Jalan Kalisari Timur XVI / No.1, Surabaya', '0838-5763-5883');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nota`
--

CREATE TABLE `detail_nota` (
  `id_nota` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` float NOT NULL,
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
(69, 2, 'asdf', 'asdf', 23, 'Botol', 123, 2829),
(70, 2, '123', '123', 3, 'Botol', 123, 369),
(71, 1, '123', '123', 1, 'Botol', 123, 123),
(71, 4, '3', '3', 1, 'meter', 3, 3),
(71, 3, '8997021870564', 'Hot In Cream', 1, 'Botol', 20000, 20000),
(71, 2, 'GA20180604', 'Garnier Skin Natulas', 1, 'Botol', 20500, 20500),
(72, 1, '123', '1231', 25, 'Botol', 1231, 30775),
(73, 1, '131', '1', 5, 'Botol', 1, 5),
(74, 2, 'asd', 'asd\"12we\'asd', 5, 'Meter', 123, 615),
(75, 1, '131', '1', 1, 'Botol', 1, 1),
(76, 1, '123', 'a', 1, 'Botol', 123, 123),
(77, 1, '123', 'a', 1, 'Botol', 123, 123),
(78, 1, '123', 'a', 1, 'Botol', 123, 123),
(79, 1, '123', 'a', 1, 'Botol', 123, 123),
(80, 1, '8999999053031', 'Pond\"s', 5, 'Botol', 12500, 62500),
(81, 1, '8997009510123', 'orange', 1, 'Botol', 5000, 5000),
(82, 1, 'tym01', 'merah', 5, 'Meter', 60000, 300000),
(83, 2, '183554S125', 'Scanner', 1, 'pcs', 600000, 600000),
(83, 1, '6985458452684', 'Charger', 1, 'pcs', 8000, 8000),
(84, 1, '183554S125', 'Scanner', 1, 'pcs', 600000, 600000),
(85, 1, '123', 'a', 2, 'Botol', 123, 246),
(86, 1, '123', 'a', 1, 'Botol', 123, 123),
(87, 3, '02', 'Kain Batik Merah Okeman', 1, 'Meter', 7500, 7500),
(87, 2, 'asdf', 'asdf', 51, 'Botol', 123, 6273),
(87, 1, 'GA20180604', 'Garnier Skin Natulas', 1, 'Botol', 20500, 20500),
(87, 4, 'tym01', 'merah', 5, 'Meter', 60000, 300000),
(88, 1, '183554S125', 'Scanner', 1, 'pcs', 600000, 600000),
(89, 2, '183554S125', 'Scanner', 1, 'pcs', 600000, 600000),
(89, 1, '6985458452684', 'Charger', 80, 'pcs', 8000, 640000),
(90, 1, '128a', 'Yohan', 15, 'Meter', 1234, 18510),
(91, 3, 'ww', 'w2', 0.2, 'Meter', 12345, 2469),
(92, 1, 'ww', 'w2', 14, 'Meter', 12345, 172830),
(93, 1, 'ww', 'w2', 1.8, 'Meter', 12345, 22221),
(94, 1, '128a', 'Yohan', 1.8, 'Meter', 12500, 22500);

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `no` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` float NOT NULL,
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
(4, 'Cream', 'lotion, salep, sunblock'),
(5, 'testing', 'testing'),
(6, 'Coba', 'coba'),
(7, 'kain celana', 'sumber sukses');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
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
(69, '2018-06-12 15:30:44', 2829, 'admin'),
(70, '2019-09-18 12:28:50', 369, 'admin'),
(71, '2019-09-18 12:29:57', 40626, 'admin'),
(72, '2019-09-18 13:58:48', 30775, 'admin'),
(73, '2019-09-18 18:02:18', 5, 'admin'),
(74, '2019-09-18 18:52:05', 615, 'admin'),
(75, '2019-09-18 19:05:24', 1, 'admin'),
(76, '2019-09-18 20:46:30', 123, 'admin'),
(77, '2019-09-19 12:31:57', 123, 'admin'),
(78, '2019-09-19 12:36:05', 123, 'admin'),
(79, '2019-09-19 12:38:57', 123, 'admin'),
(80, '2019-09-19 12:57:01', 62500, 'admin'),
(81, '2019-09-19 13:01:23', 5000, 'admin'),
(82, '2019-09-19 13:16:51', 300000, 'admin'),
(83, '2019-09-20 15:02:10', 608000, 'yohan'),
(84, '2019-09-20 15:14:17', 600000, 'yohankur'),
(85, '2019-09-20 15:55:22', 246, 'admin'),
(86, '2019-09-20 16:09:43', 123, 'admin'),
(87, '2019-09-20 16:27:19', 334273, 'admin'),
(88, '2019-09-21 01:16:41', 600000, 'admin'),
(89, '2019-09-21 01:35:45', 1240000, 'admin'),
(90, '2019-09-20 03:16:55', 18510, 'admin'),
(91, '2019-09-21 03:56:46', 2469, 'admin'),
(92, '2019-09-21 03:59:24', 172830, 'admin'),
(93, '2019-09-21 04:01:07', 22221, 'admin'),
(94, '2019-09-21 05:17:31', 22500, 'admin');

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
(1, 'Meter'),
(2, 'pcs'),
(3, 'Botol'),
(4, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` float NOT NULL,
  `kode_satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `nama_kategori`, `kode_barang`, `nama_barang`, `jumlah_barang`, `kode_satuan`, `harga`) VALUES
(1, 'Kain Batik', '02', 'Kain Batik Merah Okeman', 0, 'Meter', 7500),
(2, 'Komputer', '097855060266', 'Mouse', 0, 'pcs', 80000),
(3, 'Komputer', '097855067081', 'Keyboard', 0, 'pcs', 100000),
(4, 'Kain Batik', '1', 'Kain Batik', 3880, 'Meter', 0),
(5, 'Kain Batik', '2', 'a', 10, 'Meter', 1500),
(6, 'Komputer', '8806098109234', 'Samsung Monitor LED IPS HDMI/DVI 22 Inch', 0, 'pcs', 1200000),
(7, 'Komputer', '20', '2', 2, 'pcs', 2),
(8, 'Kain Batik', '3', '3', 2, 'Meter', 3),
(9, 'Komputer', '09778854556', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 0, 'pcs', 225000),
(10, 'Komputer', '787546220987', 'Acces Point Cisco', 1, 'pcs', 10000000),
(11, 'Kain Batik', '3396477088', 'Kain katun batik biru', 4, 'Meter', 75000),
(20, 'Kain Batik', '33', '3', 3, 'Meter', 3),
(21, 'Komputer', '097788545561', 'TP Link Switch 8 port Gigabit Ethernet 10/100/1000', 1, 'pcs', 225000),
(22, 'Komputer', '7875462209874', 'Acces Point Cisco', 1, 'pcs', 10000000),
(23, 'Kain Batik', '33964770881', 'Kain katun batik biru', 6, 'Meter', 75000),
(24, 'Suplemen', '8992112011031', 'Enervon-C', 300, 'Botol', 40000),
(28, 'Cream', '8997021870564', 'Hot In Cream', 149, 'Botol', 20000),
(29, 'Cream', '8999999053031', 'Pond\"sa', 375, 'Botol', 12500),
(30, 'Komputer', '1707HS023AV9', 'Logitech B100', 470, 'pcs', 80000),
(31, 'Cream', 'asd', 'asd\"12we\'asd', 1230, 'Meter', 123),
(32, 'Cream', 'GA20180604', 'Garnier Skin Natulas', 8, 'Botol', 20500),
(37, 'Kain Batik', 'asdf', 'asdf', 49, 'Botol', 123),
(40, 'Cream', '123', 'a', 95, 'Botol', 123),
(44, 'testing', 'tes', 'testing', 133, 'testing', 12345),
(46, 'Komputer', '131', '1', 14, 'Botol', 1),
(47, 'Cream', 'asdqwe', 'qwe', 1, 'Botol', 123),
(53, 'Komputer', '183554S125', 'Scanner', 1, 'pcs', 600000),
(55, 'Suplemen', '8997009510123', 'orange', 50, 'Botol', 5000),
(56, 'kain celana', 'tym01', 'merah', 490, 'Meter', 60000),
(57, 'Komputer', '6985458452684', 'Charger', 10, 'pcs', 8000),
(58, 'kain celana', 'ty1a', '', 0, '', 0),
(59, 'kain celana', '1234', 'pond\"s@', 0, '', 0),
(62, 'Kain Batik', 'qtqr', '', 0, '', 0),
(63, 'testing', 'asd5561Asd', 'Yohan 1993 yes', 14, 'testing', 16111993),
(64, 'Coba', '128a', 'Yohan', 2.37, 'Meter', 12500),
(66, 'Cream', 'asdqrw', 'asd', 0, 'Botol', 123),
(73, 'Coba', '123451', 'hahaha', 9.38, 'Meter', 1500),
(75, 'Cream', 'aadfe', 'asd ', 12, 'Meter', 12);

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `petugas` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` float NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`tanggal`, `petugas`, `kode_barang`, `nama_barang`, `jumlah`, `satuan`, `keterangan`) VALUES
('2018-05-01 13:35:19', 'admin', '1', 'Kain Batik', 5000, '', 'Stok baru'),
('2019-09-18 12:35:31', 'admin', 'asd', 'tes', 1, '', 'Stok baru'),
('2019-09-18 12:36:52', 'admin', 'asd', 'tes', 123, '', 'Stok baru'),
('2019-09-18 16:11:17', 'admin', 'asdqwe', 'qwe', 1, '', 'Stok baru'),
('2019-09-18 18:24:06', 'admin', '131', '1', 5, '', 'Stok tambahan'),
('2019-09-18 18:44:22', '', 'tes', 'testing', 0, '', 'Stok tambahan'),
('2019-09-18 18:44:43', '', 'tes', 'testing', 0, '', 'Stok tambahan'),
('2019-09-18 18:52:05', 'admin', 'asd', 'asd\"12we\'asd', 5, '', 'Penjualan'),
('2019-09-18 19:05:24', 'admin', '131', '1', 1, '', 'Penjualan'),
('2019-09-18 19:06:16', 'admin', '123', '1231', 0, '', 'Stok tambahan'),
('2019-09-18 19:20:08', '', '123', 'a', 0, '', 'Stok tambahan'),
('2019-09-18 19:20:17', '', '123', 'a', 0, '', 'Stok tambahan'),
('2019-09-18 19:21:21', 'admin', 'GA20180604', 'Garnier Skin Natulas', 0, '', 'Stok tambahan'),
('2019-09-18 19:21:28', 'admin', 'GA20180604', 'Garnier Skin Natulas', 9, '', 'Stok tambahan'),
('2019-09-18 19:25:49', 'admin', '123', 'a', 1, '', 'Stok tambahan'),
('2019-09-18 20:46:30', 'admin', '123', 'a', 1, '', 'Penjualan'),
('2019-09-18 21:10:20', 'tes', '123', 'a', 1, '', 'Stok tambahan'),
('2019-09-19 12:20:53', 'admin', '183554S125', 'Scanner', 5, '', 'Stok baru'),
('2019-09-19 12:31:57', 'admin', '123', 'a', 1, '', 'Penjualan'),
('2019-09-19 12:36:05', 'admin', '123', 'a', 1, '', 'Penjualan'),
('2019-09-19 12:38:57', 'admin', '123', 'a', 1, '', 'Penjualan'),
('2019-09-19 12:57:01', 'admin', '8999999053031', 'Pond\"s', 5, '', 'Penjualan'),
('2019-09-19 13:00:24', 'admin', '8997009510123', 'orange', 1, '', 'Stok baru'),
('2019-09-19 13:01:23', 'admin', '8997009510123', 'orange', 1, '', 'Penjualan'),
('2019-09-19 13:07:13', 'admin', '8997009510123', 'orange', 50, '', 'Stok tambahan'),
('2019-09-19 13:13:48', 'admin', 'tym01', 'merah', 500, '', 'Stok baru'),
('2019-09-19 13:16:51', 'admin', 'tym01', 'merah', 5, '', 'Penjualan'),
('2019-09-20 15:00:25', 'admin', '6985458452684', 'Charger', 1, '', 'Stok baru'),
('2019-09-20 15:02:10', 'yohan', '6985458452684', 'Charger', 1, '', 'Penjualan'),
('2019-09-20 15:14:17', 'yohankur', '183554S125', 'Scanner', 1, '', 'Penjualan'),
('2019-09-20 15:55:22', 'admin', '123', 'a', 2, '', 'Penjualan'),
('2019-09-20 16:09:43', 'admin', '123', 'a', 1, '', 'Penjualan'),
('2019-09-20 16:27:19', 'admin', 'GA20180604', 'Garnier Skin Natulas', 1, '', 'Penjualan'),
('2019-09-21 01:16:41', 'admin', '183554S125', 'Scanner', 1, '', 'Penjualan'),
('2019-09-21 01:35:08', 'admin', '6985458452684', 'Charger', 90, '', 'Stok tambahan'),
('2019-09-21 01:35:45', 'admin', '6985458452684', 'Charger', 80, '', 'Penjualan'),
('2019-09-21 01:42:49', '', 'ty1a', '', 0, '', 'Stok baru'),
('2019-09-21 01:43:56', 'admin', '1234', 'pond\'s', 10, '', 'Stok baru'),
('2019-09-21 01:44:36', '', '8999999053031', 'Pond\"s', 0, '', 'Stok tambahan'),
('2019-09-21 01:44:45', '', '8999999053031', 'Pond\"sa', 0, '', 'Stok tambahan'),
('2019-09-21 01:44:54', '', '1234', 'pond\"s', 0, '', 'Stok tambahan'),
('2019-09-21 01:45:01', '', '1234', 'pond\"s@', 0, '', 'Stok tambahan'),
('2019-09-21 01:45:08', '', '1234', 'pond\"s@', 0, '', 'Stok tambahan'),
('2019-09-21 01:49:10', 'admin', '1451123', '#%$asd', 12, '', 'Stok baru'),
('2019-09-21 01:51:01', 'admin', 'qtqr', '#%$asd', 14, '', 'Stok baru'),
('2019-09-21 01:52:33', '', 'qtqr', '', 0, '', 'Stok tambahan'),
('2019-09-21 01:53:58', '', 'qtqr', '', 0, '', 'Stok tambahan'),
('2019-09-21 01:57:08', '', 'qtqr', '', 0, '', 'Stok tambahan'),
('2019-09-21 01:57:18', '', 'qtqr', '', 0, '', 'Stok tambahan'),
('2019-09-21 01:57:41', '', 'qtqr', '', 0, '', 'Stok tambahan'),
('2019-09-21 02:50:05', 'admin', 'asd5561Asd', 'Yohan Kurniadi', 14, '', 'Stok baru'),
('2019-09-21 02:51:25', '', 'asd5561Asd', 'Yohan 1993', 0, '', 'Stok tambahan'),
('2019-09-21 02:51:55', '', 'asd5561Asd', 'Yohan 1993 yes', 0, '', 'Stok tambahan'),
('2019-09-21 03:29:07', 'admin', 'asdqrw', 'asd', 0, '', 'Stok baru'),
('2019-09-21 03:47:48', 'admin', 'w', 'w', 5, '', 'Stok baru'),
('2019-09-21 03:50:45', 'admin', 'ww', 'w2', 5.7, '', 'Stok baru'),
('2019-09-21 03:51:15', 'admin', '123tes', 'tes', 12, '', 'Stok baru'),
('2019-09-21 03:51:27', 'admin', '123tes', 'tes', 51, '', 'Stok tambahan'),
('2019-09-21 03:52:22', 'admin', 'ww', 'w2', 1.3, '', 'Stok tambahan'),
('2019-09-21 03:54:54', 'admin', 'ww', 'w2', 2.6, '', 'Stok tambahan'),
('2019-09-21 03:56:46', 'admin', 'ww', 'w2', 0.2, '', 'Penjualan'),
('2019-09-21 03:59:01', 'admin', 'ww', 'w2', 5, '', 'Stok tambahan'),
('2019-09-21 03:59:24', 'admin', 'ww', 'w2', 14, '', 'Penjualan'),
('2019-09-21 04:00:31', 'admin', 'ww', 'w2', 2, '', 'Stok tambahan'),
('2019-09-21 04:01:07', 'admin', 'ww', 'w2', 1.8, '', 'Penjualan'),
('2019-09-21 04:53:58', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:55:54', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:56:15', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:56:33', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:56:45', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:56:46', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:57:02', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:57:03', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:57:21', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:58:29', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:58:30', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:58:31', 'admin', '', '', 0, '', 'Barang dihapus'),
('2019-09-21 04:58:56', 'admin', '123tes', 'tes', 63, 'Botol', 'Barang dihapus'),
('2019-09-21 04:58:57', 'admin', '123tes', 'tes', 63, 'Botol', 'Barang dihapus'),
('2019-09-21 04:59:06', 'admin', '123tes', 'tes', 63, 'Botol', 'Barang dihapus'),
('2019-09-21 04:59:36', 'admin', '123tes', 'tes', 63, 'Botol', 'Barang dihapus'),
('2019-09-21 05:51:09', 'admin', '123451', 'hahaha', 1.5, 'Meter', 'Stok tambahan'),
('2019-09-21 05:51:20', 'admin', '128a', 'Yohan', 1.5, 'Meter', 'Stok tambahan'),
('2019-09-21 06:13:42', 'admin', 'aadfe', 'asd ', 12, 'Meter', 'Stok baru');

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
('admin', 'admin', 1, 1, 1, 1),
('yohankur', '123', 1, 0, 0, 0);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
