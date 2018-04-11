-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 06:24 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ablientang`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `nama`, `status`) VALUES
(1, 'admin', 1),
(2, 'kasir', 1),
(3, 'manajer', 1),
(4, 'member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(14) NOT NULL,
  `id_pesan` varchar(14) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `validasi` int(11) NOT NULL,
  `ket_mem` text NOT NULL,
  `ket_peg` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_pesan`, `id_user`, `total`, `tgl`, `status_pembayaran`, `validasi`, `ket_mem`, `ket_peg`, `foto`) VALUES
('BYR_171129_001', 'PSN_171129_001', NULL, 24000, '2017-11-29 00:00:00', 3, 0, '0', '0', '0'),
('BYR_171129_002', 'PSN_171129_002', NULL, 24000, '2017-11-29 00:00:00', 3, 1, '0', '0', '0'),
('BYR_171129_003', 'PSN_171129_003', NULL, 24000, '2017-11-29 00:00:00', 3, 0, '0', '0', '0'),
('BYR_171129_004', 'PSN_171129_004', NULL, 24000, '2017-11-29 00:00:00', 3, 0, '0', '0', '0'),
('BYR_171129_005', 'PSN_171129_005', NULL, 34000, '2017-11-29 00:00:00', 3, 0, '0', '0', '0'),
('BYR_171129_006', 'PSN_171129_006', NULL, 41000, '2017-11-29 00:00:00', 3, 0, '0', '0', '0'),
('BYR_171203_001', 'PSN_171203_001', NULL, 23500, '2017-12-03 00:00:00', 3, 1, '', '', ''),
('BYR_171205_001', 'PSN_171203_001', 1, 122, '2017-12-05 01:12:04', 1, 2, '0', 'adsasd', '0'),
('BYR_171205_002', 'PSN_171203_001', 1, 11231, '2017-12-05 01:46:13', 1, 2, '0', 'asdas', '0'),
('BYR_171205_003', 'PSN_171203_001', 1, 0, '2017-12-05 02:01:25', 1, 1, '0', '', '0'),
('BYR_171205_004', 'PSN_171203_001', 1, 0, '2017-12-05 02:14:24', 1, 1, '0', '', '0'),
('BYR_171206_001', 'PSN_171206_004', 1, 1000, '2017-12-06 17:23:36', 1, 1, '0', 'a', '0'),
('BYR_171207_001', 'PSN_171207_001', 1, 14000, '2017-12-07 17:38:58', 1, 1, '0', 'ngutang bro', '0'),
('BYR_171207_002', 'PSN_171207_002', 1, 44000, '2017-12-07 18:16:59', 1, 1, '0', '', '0'),
('BYR_171210_001', 'PSN_171210_001', 1, 4000, '2017-12-10 18:00:13', 1, 1, '0', '', '0'),
('BYR_171210_002', 'PSN_171210_001', 1, 0, '2017-12-10 18:01:30', 1, 1, '0', '', '0'),
('BYR_171210_003', 'PSN_171210_002', 1, 19000, '2017-12-10 18:04:48', 1, 1, '0', '', '0'),
('BYR_171210_004', 'PSN_171210_002', 1, 19000, '2017-12-10 18:05:22', 1, 1, '0', '', '0'),
('BYR_171210_005', 'PSN_171210_003', 1, 22000, '2017-12-10 18:51:22', 1, 1, '0', '', '0'),
('BYR_171212_001', 'PSN_171212_002', 10, 19000, '2017-12-12 10:37:02', 1, 1, '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `berbagi`
--

CREATE TABLE `berbagi` (
  `id_berbagi` int(11) NOT NULL,
  `id_member_asal` varchar(14) NOT NULL,
  `id_member_tujuan` varchar(14) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ket_asal` text NOT NULL,
  `ket_tujuan` text,
  `validasi` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berbagi`
--

INSERT INTO `berbagi` (`id_berbagi`, `id_member_asal`, `id_member_tujuan`, `jumlah`, `tanggal`, `ket_asal`, `ket_tujuan`, `validasi`, `status`) VALUES
(1, 'MEM_171206_001', 'MEM_171106_001', 588, '2017-12-11 03:37:47', 'vccv', NULL, 1, 1),
(2, 'MEM_171207_002', 'MEM_171206_001', 98, '2017-12-11 04:07:31', 'hilda x', NULL, 0, 2),
(3, 'MEM_171206_001', 'MEM_171129_001', 58, '2017-12-11 04:24:47', 'vxcbm', NULL, 0, 2),
(4, 'MEM_171106_001', 'MEM_171206_001', 100, '2017-12-12 09:40:20', 'nnx', NULL, 0, 1),
(5, 'MEM_171106_001', 'MEM_171206_001', 10000, '2017-12-12 10:38:57', 'gunakan dengan bijak', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `det_keranjang`
--

CREATE TABLE `det_keranjang` (
  `id_det_keranjang` int(11) NOT NULL,
  `id_keranjang` varchar(14) NOT NULL,
  `id_menu` varchar(14) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `det_pesan`
--

CREATE TABLE `det_pesan` (
  `id_det_pesan` int(11) NOT NULL,
  `id_menu` varchar(14) NOT NULL,
  `id_pesan` varchar(14) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pesan`
--

INSERT INTO `det_pesan` (`id_det_pesan`, `id_menu`, `id_pesan`, `jumlah`, `ket`) VALUES
(1, 'MNU_171101_010', 'PSN_171129_002', 1, ''),
(2, 'MNU_170814_001', 'PSN_171129_002', 1, ''),
(3, 'MNU_171101_010', 'PSN_171129_003', 1, ''),
(4, 'MNU_170814_001', 'PSN_171129_003', 1, ''),
(5, 'MNU_171101_010', 'PSN_171129_004', 1, ''),
(6, 'MNU_170814_001', 'PSN_171129_004', 1, ''),
(7, 'MNU_170814_001', 'PSN_171129_005', 1, ''),
(8, 'MNU_171101_014', 'PSN_171129_005', 1, ''),
(9, 'MNU_170814_001', 'PSN_171129_006', 1, ''),
(10, 'MNU_171101_002', 'PSN_171129_006', 1, ''),
(11, 'MNU_171101_001', 'PSN_171203_001', 1, ''),
(12, 'MNU_171101_010', 'PSN_171203_001', 1, ''),
(13, 'MNU_170814_001', '<div style="bo', 1, ''),
(14, 'MNU_170814_001', '', 2, 'jangan terlalu matang'),
(15, 'MNU_170814_001', '', 3, 'fast'),
(16, 'MNU_171101_010', '', 4, ''),
(17, 'MNU_170814_001', '<div style="bo', 2, ''),
(18, '0', '0', 0, '0'),
(19, 'MNU_171101_012', '', 3, ''),
(20, 'MNU_171101_016', '<div style="bo', 1, ''),
(21, 'MNU_171101_017', '<div style="bo', 1, ''),
(22, 'MNU_171101_016', 'PSN_171206_004', 1, ''),
(23, 'MNU_171101_017', 'PSN_171206_004', 1, ''),
(24, 'MNU_171101_016', 'PSN_171207_001', 1, ''),
(25, 'MNU_171101_017', 'PSN_171207_001', 1, ''),
(26, 'MNU_171101_001', 'PSN_171207_001', 2, 'tambah sambel'),
(27, 'MNU_171101_016', 'PSN_171207_002', 1, ''),
(28, 'MNU_171101_017', 'PSN_171207_002', 1, ''),
(29, 'MNU_171101_001', 'PSN_171207_002', 2, 'tambah sambel'),
(30, 'MNU_171101_016', 'PSN_171210_001', 1, ''),
(31, 'MNU_170814_001', 'PSN_171210_002', 1, ''),
(32, 'MNU_171101_002', 'PSN_171210_003', 1, ''),
(33, 'MNU_171101_001', 'PSN_171210_004', 1, ''),
(34, 'MNU_171101_004', 'PSN_171210_004', 1, ''),
(35, 'MNU_171101_019', 'PSN_171212_001', 5, ''),
(36, 'MNU_170814_001', '', 2, 'sambal tambah'),
(37, 'MNU_171101_004', '', 1, 'jeruk dingin'),
(38, 'MNU_170814_001', '', 1, ''),
(39, 'MNU_170814_001', 'PSN_171212_002', 1, ''),
(40, 'MNU_170814_001', 'PSN_171212_003', 1000, ''),
(41, 'MNU_171101_010', 'PSN_171212_003', 1000, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`, `status`) VALUES
(6, 'Extra', 1),
(7, 'Minuman', 1),
(8, 'Paket', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` varchar(14) NOT NULL,
  `id_member` varchar(14) NOT NULL,
  `total` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(14) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(128) NOT NULL,
  `poin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `id_akses`, `nama`, `foto`, `alamat`, `telpon`, `email`, `password`, `poin`, `status`) VALUES
('MEM_171106_001', 4, 'alim', 'abl_mbr_1509939179.jpg', 'jl tidar', '9494094664', 'tam@gmail.com', '08f8e0260c64418510cefb2b06eee5cd', 668938, 1),
('MEM_171129_001', 4, 'cun', '', 'cunu', '05699', 'cun@gmail.com', '343dd85de18b3e3fed5494020e601a45', 0, 1),
('MEM_171206_001', 4, 'imron', '', 'jl sampurna', '085769476947', 'imron@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 4216, 1),
('MEM_171207_001', 4, 'ali', '', 'jl sampurna', '085788890689', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', 0, 1),
('MEM_171207_002', 4, 'agung', '', 'jl raya pakis', '08989805065', 'agung@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', -294, 1),
('MEM_171212_001', 4, 'indra', '', 'jalan tengah surabaya', '08183839697', 'indra@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(14) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `desk` text NOT NULL,
  `gambar` text NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_def` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kat`, `nama`, `harga`, `desk`, `gambar`, `stok`, `stok_def`, `status`) VALUES
('MNU_170814_001', 8, 'Dada Nasi Kotak', 19000, 'Ayam bakar bagian dada di sajikan dalam nasi kotak, lengkap dengan sambal dan dayur lalapan.', 'abl_mnu_1509536575.jpg', 0, 0, 1),
('MNU_170814_002', 7, 'Teh Es/Panas', 3000, 'Es teh manis yang cocok untuk menemani makanan anda.', 'abl_mnu_1509537429.jpg', 0, 0, 1),
('MNU_171101_001', 8, 'Paha Nasi Kotak', 18500, 'Ayam bakar bagian paha disajikan dalam nasi kotak, lengkap dengan sambal dan sayur lalapan.', 'abl_mnu_1509536661.jpg', 0, 0, 1),
('MNU_171101_002', 8, 'Dada Nasi Kotak + Tahu/Tempe + Urap', 22000, 'Ayam bakar bagian dada disajikan dalam nasi kotak, lengkap dengan sambal dan sayur lalapan. Ditambah lagi menu extra yaitu tahu/tempe dan urap-urap.', 'abl_mnu_1509536812.jpg', 0, 0, 1),
('MNU_171101_003', 8, 'Paha Nasi Kotak + Tahu/Tempe + Urap', 21500, 'Ayam bakar bagian paha disajikan dalam nasi kotak, lengkap dengan sambal dan sayur lalapan. Ditambah lagi menu extra yaitu tahu/tempe dan urap-urap.', 'abl_mnu_1509537325.jpg', 0, 0, 1),
('MNU_171101_004', 7, 'Jeruk Es/Panas', 3000, 'Minuman jeruk, bisa pilih dingin atau panas.', 'abl_mnu_1509537494.jpg', 0, 0, 1),
('MNU_171101_005', 7, 'Lemon Teh Es/Panas', 4000, 'Segarnya teh yang dicampur dengan lemon.', 'abl_mnu_1509537588.jpg', 0, 0, 1),
('MNU_171101_006', 7, 'Jus Tomat', 5000, 'Jus tomat yang enak dan sehat.', 'abl_mnu_1509537817.jpg', 0, 0, 1),
('MNU_171101_007', 7, 'Jus Jambu', 5000, 'Jus Jambu merah manis dan cantik.', 'abl_mnu_1509537876.jpg', 0, 0, 1),
('MNU_171101_008', 7, 'Jus Stroberi', 5000, 'Jus favorit anak muda.', 'abl_mnu_1509537962.jpg', 0, 0, 1),
('MNU_171101_009', 7, 'Jus Nanas', 5000, 'Jus nanas asli, bukan punya sponsbob hehe', 'abl_mnu_1509538021.jpg', 0, 0, 1),
('MNU_171101_010', 7, 'Jus Alpukat', 5000, 'Jus alpukat pasti enak', 'abl_mnu_1509538087.jpg', 0, 0, 1),
('MNU_171101_011', 7, 'Jus Melon', 5000, 'Jus buah melon. hijau-hijau nyegerin', 'abl_mnu_1509538119.jpg', 0, 0, 1),
('MNU_171101_012', 7, 'Jus Buah Naga', 5000, 'Jus baru nih, buah naga. langsung dicoba deh', 'abl_mnu_1509538156.jpg', 0, 0, 1),
('MNU_171101_013', 6, 'Gurami bakar', 20000, 'Ayam bakar nya aja enak, apalagi ikan guraminya. segera coba manis-manis legit.', 'abl_mnu_1509539201.jpg', 0, 0, 1),
('MNU_171101_014', 6, 'Ayam Bakar Dada', 15000, 'Ayam Bakar bagian paha, menu andalan.', 'abl_mnu_1509539286.jpg', 0, 0, 1),
('MNU_171101_015', 6, 'Ayam Bakar Paha', 15000, 'Ayam Bakar bagian paha, menu favorit.', 'abl_mnu_1509539328.jpg', 0, 0, 1),
('MNU_171101_016', 6, 'Tahu/Tempe Bacem', 4000, 'Tahu atau Tempe bacem.', 'abl_mnu_1509539377.jpg', 0, 0, 1),
('MNU_171101_017', 6, 'Trancam', 3000, 'Trancam khas jawa', 'abl_mnu_1509539424.jpg', 0, 0, 1),
('MNU_171101_018', 6, 'Sayur Asem', 4000, 'Sayur Asem', 'abl_mnu_1509539469.jpg', 0, 0, 1),
('MNU_171101_019', 6, 'Urap-Urap', 4000, 'Sayur urap-urap.', 'abl_mnu_1509539508.jpg', 0, 0, 1),
('MNU_171101_020', 6, 'Tauge Ikan Teri', 4000, 'Tauge Ikan Teri', 'abl_mnu_1509539549.jpg', 0, 0, 1),
('MNU_171101_021', 6, 'Kangkung Balacan', 4000, 'Kangkung Balacan', 'abl_mnu_1509539591.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(14) NOT NULL,
  `id_member` varchar(14) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_poin` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `poin` int(11) NOT NULL,
  `ket` text,
  `tgl_ambil` datetime NOT NULL,
  `tempat` text NOT NULL,
  `status_bayar` int(11) NOT NULL,
  `status_kirim` int(11) NOT NULL,
  `lat` text NOT NULL,
  `lng` text NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_member`, `id_user`, `id_poin`, `total`, `tgl_pesan`, `poin`, `ket`, `tgl_ambil`, `tempat`, `status_bayar`, `status_kirim`, `lat`, `lng`, `ongkir`) VALUES
('PSN_171129_002', 'MEM_171106_001', NULL, 2, 24000, '2017-11-29 09:16:12', 0, NULL, '2017-11-29 09:15:00', 'Jl. Raya Dieng Atas, Kalisongo, Dau, Malang, Jawa Timur 65151, Indonesia\n', 1, 0, '-7.9696137999999985', '112.5999753', 0),
('PSN_171129_003', 'MEM_171106_001', NULL, 2, 24000, '2017-11-29 09:17:33', 0, NULL, '2017-11-29 09:17:00', 'Jl. Salahutu No.8, Pisang Candi, Sukun, Kota Malang, Jawa Timur 65146, Indonesia\n', 1, 0, '-7.966715000000001', '112.60572099999999', 0),
('PSN_171129_004', 'MEM_171106_001', NULL, 2, 24000, '2017-11-29 09:35:38', 0, NULL, '2017-12-02 13:34:00', 'Jl. Raya Singosari No.93, Losari, Singosari, Malang, Jawa Timur 65153, Indonesia\n', 1, 0, '-7.890323499999999', '112.6681021', 0),
('PSN_171129_005', 'MEM_171106_001', NULL, 2, 34000, '2017-11-29 09:38:23', 0, NULL, '2017-12-03 09:37:00', 'Jl. Salahutu No.8, Pisang Candi, Sukun, Kota Malang, Jawa Timur 65146, Indonesia\n', 1, 0, '-7.966715000000001', '112.60572099999999', 0),
('PSN_171205_001', 'MEM_171106_001', NULL, 2, 19000, '2017-12-05 08:48:11', 0, NULL, '2017-12-05 08:47:00', 'Jalan Slamet Temboro, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 0, 0, '-7.985042499999999', '112.68932421874999', 0),
('PSN_171206_001', 'MEM_171106_001', NULL, 2, 38000, '2017-12-06 03:51:59', 0, NULL, '2017-12-06 15:51:00', 'Jl. Simpang Santoso Dalam, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 0, 0, '-7.984987499999995', '112.67926953124996', 0),
('PSN_171206_003', 'MEM_171206_001', NULL, 2, 7000, '2017-12-06 05:07:05', 0, NULL, '2017-12-06 17:06:00', 'Jl. Sampurna No.41, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 0, 0, '-7.985292499999992', '112.68787890625', 0),
('PSN_171206_004', 'MEM_171206_001', NULL, 2, 7000, '2017-12-06 05:12:39', 770, NULL, '2017-12-06 17:12:00', 'Jl. Sampurna No.41, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 2, 0, '-7.9851324999999855', '112.68766015625003', 0),
('PSN_171207_001', 'MEM_171206_001', NULL, 2, 44000, '2017-12-07 05:38:01', 4840, NULL, '2017-12-08 17:40:00', 'Jl. Raya Pakis, Pakisjajar, Pakis, Malang, Jawa Timur 65154, Indonesia\n', 2, 0, '-7.961196499999999', '112.719314', 0),
('PSN_171207_002', 'MEM_171207_002', NULL, 2, 44000, '2017-12-07 06:15:31', 4840, NULL, '2017-12-09 18:20:00', 'Jl. Tidar No.100, Karangbesuki, Sukun, Kota Malang, Jawa Timur 65149, Indonesia\n', 2, 0, '-7.9658969', '112.60747289999999', 0),
('PSN_171210_001', 'MEM_171206_001', NULL, 2, 4000, '2017-12-10 05:55:33', 440, NULL, '2017-12-10 17:55:00', 'Jalan Slamet Temboro, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 3, 0, '-7.985042499999999', '112.68932421874999', 0),
('PSN_171210_002', 'MEM_171206_001', NULL, 2, 19000, '2017-12-10 06:02:27', 2090, NULL, '2017-12-10 18:02:00', 'Jl. Perdana Kusuma No.45, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 2, 0, '-7.985852499999986', '112.68076171874989', 0),
('PSN_171210_003', 'MEM_171206_001', NULL, 2, 22000, '2017-12-10 06:41:00', 2420, NULL, '2017-12-10 18:40:00', 'Jl. Perdana Kusuma No.45, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 2, 0, '-7.985852499999986', '112.68076171874989', 0),
('PSN_171210_004', 'MEM_171206_001', NULL, 2, 21500, '2017-12-10 07:04:08', 2365, NULL, '2017-12-10 19:03:00', 'Jalan Slamet Temboro, Cemorokandang, Kedungkandang, Kota Malang, Jawa Timur 65138, Indonesia\n', 0, 0, '-7.985042499999999', '112.68932421874999', 0),
('PSN_171212_001', 'MEM_171206_001', NULL, 2, 20000, '2017-12-12 04:04:27', 2200, NULL, '2017-12-12 04:04:00', 'Jl. Raya Dieng Atas No.55, Kalisongo, Dau, Malang, Jawa Timur 65151, Indonesia\n', 4, 0, '-7.970032499999995', '112.60142578125001', 0),
('PSN_171212_002', 'MEM_171106_001', NULL, 3, 19000, '2017-12-12 10:36:16', 2850, NULL, '2017-12-12 10:36:00', 'Jl. Krakatau No.15, Pisang Candi, Sukun, Kota Malang, Jawa Timur 65146, Indonesia\n', 2, 0, '-7.971157499999997', '112.60962109375001', 0),
('PSN_171212_003', 'MEM_171212_001', NULL, 3, 24700000, '2017-12-12 10:54:49', 3705000, NULL, '2017-12-12 10:00:00', 'Surabaya City, East Java, Indonesia\n', 0, 0, '-7.2651026000000005', '112.7450001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id_poin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `persen` double NOT NULL,
  `tgl` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`id_poin`, `id_user`, `persen`, `tgl`, `status`, `ket`) VALUES
(1, 7, 10, '2017-10-25 00:00:00', 0, 'Aktif'),
(2, 1, 11, '2017-10-25 19:58:02', 0, ''),
(3, 10, 15, '2017-12-12 03:43:49', 1, 'Tahun baru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ktp` varchar(16) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_akses`, `nama`, `ktp`, `telpon`, `email`, `alamat`, `foto`, `password`) VALUES
(1, 1, 'ali imron', '2123123112312123', '983210923', 'ali@gmail.com', 'jl.Sampurna 32rr', 'abl_usr_1509023738.jpg', 'f5bb0c8de146c67b44babbf4e6584cc0'),
(8, 2, 'Eko', '4832749234023', '087927492098', 'kasir@gmail.com', 'Jl Mawar gang 3', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(9, 3, 'Doni', '23134141414434', '081890383920', 'manajer@gmail.com', 'Jl Danau Sentani iv 43', '', '25d55ad283aa400af464c76d713c07ad'),
(10, 2, 'kasir', '8972931323230', '089766283982', 'kasir_@gmail.com', 'Jl Tidar', '', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `berbagi`
--
ALTER TABLE `berbagi`
  ADD PRIMARY KEY (`id_berbagi`);

--
-- Indexes for table `det_pesan`
--
ALTER TABLE `det_pesan`
  ADD PRIMARY KEY (`id_det_pesan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `berbagi`
--
ALTER TABLE `berbagi`
  MODIFY `id_berbagi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `det_pesan`
--
ALTER TABLE `det_pesan`
  MODIFY `id_det_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
