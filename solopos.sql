-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 07:40 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solopos`
--

-- --------------------------------------------------------

--
-- Table structure for table `devisi`
--

CREATE TABLE `devisi` (
  `id_devisi` int(11) NOT NULL,
  `nama_devisi` varchar(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devisi`
--

INSERT INTO `devisi` (`id_devisi`, `nama_devisi`, `nama_lengkap`, `username`, `password`, `email`) VALUES
(2, 'Sirkulasi', 'Budiiiiiii', 'budi', 'budi', 'bradausa77@gmail.com'),
(6, 'IT', 'Bram Ada', 'bram', 'bram', 'bradausa77@gmail.com'),
(11, 'Umum', 'Budi Ono', 'budio', 'budio', 'bradausa77@gmail.com'),
(12, 'Devisi Humas', 'Faiz Alvian', 'Faiz', 'Faiz', 'Bradausa77@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pesan_ruang`
--

CREATE TABLE `pesan_ruang` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruang` varchar(35) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `jumlah_peserta` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan_ruang`
--

INSERT INTO `pesan_ruang` (`id_pesan`, `nama`, `divisi`, `email`, `tanggal_mulai`, `tanggal_selesai`, `jam_mulai`, `jam_selesai`, `ruang`, `keperluan`, `jumlah_peserta`, `status`, `catatan`) VALUES
(103, 'a', 'a', 'aa@gmail.com', '2017-09-02', '2017-09-05', '03:00:00', '04:00:00', 'Ruang Feature', 'a', 2, 'Menunggu', ''),
(104, 'a', 'a', 'bradausa77@gmail.com', '2017-09-02', '2017-09-05', '03:00:00', '04:00:00', 'Ruang Gagasan', 'a', 2, 'Ditolak', ''),
(105, 'a', 'a', 'aa@gmail.com', '2017-09-03', '2017-09-05', '03:00:00', '04:00:00', 'Ruang Feature', 'a', 2, 'Disetujui', ''),
(106, 'a', 'a', 'aa@gmail.com', '2017-09-07', '2017-09-09', '03:00:00', '04:00:00', 'Ruang Feature', 'a', 2, 'Disetujui', ''),
(107, 'a', 'a', 'aa@gmail.com', '2017-09-07', '2017-09-09', '05:00:00', '06:00:00', 'Ruang Feature', 'a', 2, 'Ditolak', ''),
(108, 'a', 'a', 'aa@gmail.com', '2017-09-07', '2017-09-09', '05:00:00', '06:00:00', 'Ruang Gagasan', 'a', 2, 'Ditolak', ''),
(109, 'a', 'a', 'aa@gmail.com', '2017-10-01', '2017-10-03', '05:00:00', '06:00:00', 'Ruang LPJS', 'a', 2, 'Ditolak', ''),
(110, 'a', 'a', 'aa@gmail.com', '2017-10-01', '2017-10-03', '13:00:00', '14:00:00', 'Ruang LPJS', 'a', 2, 'Ditolak', ''),
(111, 'a', 'a', 'aa@gmail.com', '2017-10-01', '2017-10-03', '13:00:00', '14:00:00', 'Ruang Feature', 'a', 2, 'Ditolak', ''),
(112, 'a', 'a@gmail.com', 'aa@gmail.com', '2017-09-01', '2017-09-02', '02:00:00', '03:00:00', 'Ruang Feature', 'a', 2, 'Menunggu', ''),
(113, 'b', 's', 'aribrada@gmail.com', '2017-12-01', '2017-12-04', '01:00:00', '02:00:00', 'Ruang Feature', 'ok', 3, 'Ditolak', ''),
(114, 'bram', 'it', 'bramada77@gmail.com', '2017-12-06', '2017-12-06', '14:00:00', '15:00:00', 'Ruang Gagasan', 'rapat', 16, 'Ditolak', ''),
(115, 'a', 'a', 'a@gmail.com', '2017-12-28', '2017-12-29', '16:00:00', '17:00:00', 'Ruang Feature', 's', 2, 'Ditolak', ''),
(116, 'Budi', 'Umun', 'budi@gmail.com', '2017-12-14', '2017-12-15', '01:00:00', '02:00:00', 'Ruang Feature', '3', 3, 'Ditolak', '3'),
(117, 'Budi Ono', 'Umum', 'budio@gmail.com', '2017-12-01', '2017-12-02', '02:00:00', '03:00:00', 'Ruang Feature', '4', 4, 'Ditolak', '4'),
(118, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-12-01', '2017-12-03', '01:00:00', '03:00:00', 'Ruang Feature', 'penting', 3, 'Ditolak', 'lcd royektor + snack 5'),
(119, 'Bram Ada', 'IT', 'bradausa77@gmail.com', '2017-12-02', '2017-12-04', '02:00:00', '03:00:00', 'Ruang Feature', 'oke', 5, 'Ditolak', 'tidak ada'),
(120, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-12-01', '2017-12-03', '02:00:00', '03:00:00', 'Ruang Feature', 'ada', 14, 'Ditolak', '...'),
(121, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-12-01', '2017-12-03', '02:00:00', '04:00:00', 'Ruang Feature', 'ooo', 8, 'Disetujui', ''),
(122, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-12-08', '2017-12-09', '02:00:00', '06:00:00', 'Ruang Feature', 'yyyyy', 7, 'Ditolak', ''),
(123, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-12-01', '2017-12-02', '01:00:00', '02:00:00', 'Ruang Feature', '2', 2, 'Disetujui', '2'),
(124, 'Budiiiiiii', 'Sirkulasi', 'bradausa77@gmail.com', '2017-11-01', '2017-11-02', '01:00:00', '02:00:00', 'Ruang Feature', 'rapat', 3, 'Disetujui', 'ok'),
(125, 'Bram Ada', 'IT', 'bradausa77@gmail.com', '2017-12-01', '2017-12-03', '10:00:00', '11:00:00', 'Ruang Gagasan', 'rapat penting', 9, 'Disetujui', 'sediakan lcd royektor'),
(126, 'Bram Ada', 'IT', 'bradausa77@gmail.com', '2017-12-01', '2017-12-01', '00:00:00', '01:00:00', 'Ruang Feature', '7', 4, 'Menunggu', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(35) NOT NULL,
  `kapasitas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`) VALUES
(1, 'Ruang Feature', 30),
(2, 'Ruang Gagasan', 20),
(3, 'Ruang LPJS', 15),
(4, 'Ruang Rapat Baru', 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'administrator', 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devisi`
--
ALTER TABLE `devisi`
  ADD PRIMARY KEY (`id_devisi`);

--
-- Indexes for table `pesan_ruang`
--
ALTER TABLE `pesan_ruang`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD UNIQUE KEY `nama_ruang` (`nama_ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devisi`
--
ALTER TABLE `devisi`
  MODIFY `id_devisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pesan_ruang`
--
ALTER TABLE `pesan_ruang`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
