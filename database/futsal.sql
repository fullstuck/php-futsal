-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 06:07 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapangan`
--

CREATE TABLE `tb_lapangan` (
  `id_lapangan` int(2) NOT NULL,
  `nama_lapangan` varchar(50) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lapangan`
--

INSERT INTO `tb_lapangan` (`id_lapangan`, `nama_lapangan`, `waktu`, `harga`) VALUES
(5, 'Lapangan Bawah', 'Pagi', 140000),
(6, 'Lapangan Bawah', 'Pagi', 140000),
(7, 'Lapangan Atas', 'Pagi', 160000),
(8, 'Lapangan Atas', 'Pagi', 160000),
(9, 'Lapangan Bawah', 'Malam', 170000),
(10, 'Lapangan Bawah', 'Malam', 170000),
(11, 'Lapangan Atas', 'Malam', 200000),
(12, 'Lapangan Atas', 'Malam', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `waktu` varchar(11) NOT NULL,
  `nama_lapangan` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `jumlah_jam`, `waktu`, `nama_lapangan`, `harga`) VALUES
(1, 4, 'Pagi', 'Lapangan Bawah', 500000),
(2, 8, 'Pagi', 'Lapangan Bawah', 900000),
(3, 12, 'Pagi', 'Lapangan Bawah', 1250000),
(4, 4, 'Malam', 'Lapangan Bawah', 650000),
(5, 8, 'Malam', 'Lapangan Bawah', 1180000),
(6, 12, 'Malam', 'Lapangan Bawah', 1550000),
(7, 4, 'Pagi', 'Lapangan Atas', 600000),
(8, 8, 'Pagi', 'Lapangan Atas', 1000000),
(9, 12, 'Pagi', 'Lapangan Atas', 1400000),
(10, 4, 'Malam', 'Lapangan Atas', 750000),
(11, 8, 'Malam', 'Lapangan Atas', 1250000),
(12, 12, 'Malam', 'Lapangan Atas', 1700000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jam` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pesanan`, `id_lapangan`, `user_id`, `harga`, `tgl`, `jam`, `status`, `gambar`) VALUES
(36, 5, 4, 140000, '2017-08-01', '00.00', 'Diterima', 'gambar/Android-Applications.jpg'),
(37, 5, 4, 0, '2017-08-02', '00.00', 'Diterima', NULL),
(38, 5, 4, 0, '2017-08-02', '01.00', 'Diterima', NULL),
(39, 5, 4, 0, '2017-08-03', '00.00', 'Diterima', NULL),
(40, 6, 4, 0, '2017-08-02', '01.00', 'Diterima', NULL),
(41, 5, 4, 0, '2017-08-06', '00.00', 'Diterima', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan_member`
--

CREATE TABLE `tb_pesan_member` (
  `id_pesan_member` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `sisa_jam` int(11) DEFAULT '0',
  `status` varchar(30) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan_member`
--

INSERT INTO `tb_pesan_member` (`id_pesan_member`, `id_member`, `user_id`, `tgl`, `sisa_jam`, `status`, `gambar`) VALUES
(7, 1, 4, '2017-08-06', 0, 'Diterima', 'gambar/a.jpg'),
(8, 1, 4, '2017-08-06', 3, 'Diterima', 'gambar/adaway.png'),
(9, 2, 4, '2017-08-06', 8, 'Diterima', 'gambar/download (7).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `hak_akses` varchar(20) NOT NULL DEFAULT 'penyewa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `no_hp`, `gambar`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'Irawati', '456xxx', 'gambar/2.png', 'admin'),
(4, 'penyewa', 'penyewa', 'penyewa', '1111111', 'gambar/001_Fish-Wallpaper-HD.jpg', 'penyewa'),
(5, 'test', 'test', 'test', '222222', NULL, 'penyewa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_pesan_member`
--
ALTER TABLE `tb_pesan_member`
  ADD PRIMARY KEY (`id_pesan_member`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lapangan`
--
ALTER TABLE `tb_lapangan`
  MODIFY `id_lapangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tb_pesan_member`
--
ALTER TABLE `tb_pesan_member`
  MODIFY `id_pesan_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
