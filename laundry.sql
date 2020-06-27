-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2017 at 04:14 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username_admin`, `password_admin`, `nama_admin`) VALUES
(1, 'admin', '2', 'Amiruloh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_cuci`
--

CREATE TABLE `tb_jenis_cuci` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL,
  `harga_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_cuci`
--

INSERT INTO `tb_jenis_cuci` (`id_jenis`, `nama_jenis`, `harga_jenis`) VALUES
(1, 'Basah', 3000),
(2, 'Kering', 4000),
(3, 'Setrika', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(10) NOT NULL,
  `harga_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `harga_kategori`) VALUES
(1, 'Reguler', 0),
(2, 'Express', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_username` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_pewangi` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `berat_cucian` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_cucian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_username`, `id_kategori`, `id_jenis`, `id_pewangi`, `total_harga`, `berat_cucian`, `tanggal`, `status_cucian`) VALUES
(1, 1, 1, 1, 1, 50000, 2, '2017-11-09 02:00:00', 'Selesai'),
(4, 1, 2, 3, 4, 33000, 4, '2017-11-09 08:10:29', 'Sudah Di Antar'),
(5, 1, 2, 3, 5, 75000, 10, '2017-11-09 08:13:51', 'Sudah Di Antar'),
(6, 1, 2, 3, 5, 40000, 5, '2017-11-15 18:47:32', 'Sudah Di Antar'),
(7, 6, 2, 2, 5, 41000, 6, '2017-11-21 11:56:22', 'Pending'),
(8, 1, 2, 3, 7, 54000, 7, '2017-11-23 11:41:24', 'Sudah Di Antar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pewangi`
--

CREATE TABLE `tb_pewangi` (
  `id_pewangi` int(11) NOT NULL,
  `nama_pewangi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pewangi`
--

INSERT INTO `tb_pewangi` (`id_pewangi`, `nama_pewangi`) VALUES
(1, 'Downy Mistique'),
(2, 'Molto'),
(3, 'Daisy'),
(4, 'Downy Romance'),
(5, 'Downy Fusion'),
(6, 'Downy Passion'),
(7, 'Lavender');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status_cucian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_username` int(11) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `password_user` varchar(20) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `ktp_user` varchar(200) NOT NULL,
  `profil_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_username`, `username_user`, `password_user`, `email_user`, `nama_user`, `alamat_user`, `ktp_user`, `profil_user`) VALUES
(1, 'raisa', '1', 'raisa@revsuzuran.com', 'Raisa Andriana', 'Indonesia', 'ktp_raisa.PNG', 'raisa.png'),
(2, 'nuril', '1', 'nurillutvi@gmail.com', 'Nuril Lutvi', 'Sidoarjo', 'nuril_ktp.png', 'nuril.png'),
(3, 'Amir', '1', 'amir@gmail.com', 'Muhammad Amirulloh', 'Mojokerto', '', ''),
(4, 'Amirulloh', '1', 'Muhammadamirulloh@gmail.com', 'Muhammad Amirulloh', 'Mojokerto', '', ''),
(5, 'Koala', '1', 'wew@gmail.com', 'Koala Kumal', 'China', '', ''),
(6, 'Koala1', '1', 'koala@gmail.com', 'Koala panda', 'china', 'KTP-164322-570.Penguins.jpg', 'FOTO-164322-766.Koala.jpg'),
(7, 'Sendy', '1', 'Sendy@gmail.com', 'Sendy Aditya P', 'Sukodono', 'KTP-061315-881.Lighthouse.jpg', 'FOTO-061315-378.Penguins.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jenis_cuci`
--
ALTER TABLE `tb_jenis_cuci`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_pewangi`
--
ALTER TABLE `tb_pewangi`
  ADD PRIMARY KEY (`id_pewangi`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_jenis_cuci`
--
ALTER TABLE `tb_jenis_cuci`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pewangi`
--
ALTER TABLE `tb_pewangi`
  MODIFY `id_pewangi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_username` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
