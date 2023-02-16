-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 04:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuebolu`
--

-- --------------------------------------------------------

--
-- Table structure for table `lap_penjualan`
--

CREATE TABLE `lap_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_kue` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lap_penjualan`
--

INSERT INTO `lap_penjualan` (`id_penjualan`, `id_pembeli`, `id_kue`, `jumlah`, `total_harga`, `tanggal`) VALUES
(7, 2, 2, 2, 30000, '2022-01-07 05:56:41'),
(8, 2, 2, 3, 45000, '2022-01-08 13:42:38'),
(9, 1, 1, 5, 0, '2022-07-19 12:27:26'),
(11, 1, 3, 5, 0, '2022-07-19 12:29:46');

--
-- Triggers `lap_penjualan`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `lap_penjualan` FOR EACH ROW BEGIN
UPDATE produk SET stok=stok-NEW.jumlah
WHERE id_kue=NEW.id_kue;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok2` BEFORE DELETE ON `lap_penjualan` FOR EACH ROW UPDATE produk SET stok=stok+old.jumlah
WHERE id_kue=old.id_kue
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `alamat`) VALUES
(1, 'Adi Pambukto', 'Magelang, Jawa Tengah'),
(2, 'Hilmy Avicena', 'Magelang, Jawa Tengah'),
(3, 'Aira Azzahra', 'Magelang, Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `gambar` varchar(50) NOT NULL,
  `id_kue` int(11) NOT NULL,
  `nama_kue` varchar(50) NOT NULL,
  `jenis_kue` varchar(50) NOT NULL,
  `harga_kue` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`gambar`, `id_kue`, `nama_kue`, `jenis_kue`, `harga_kue`, `stok`) VALUES
('boluSuri.jpg', 1, 'Bolu Macan', 'Kue Bolu', 16000, 14),
('boluPeca.jpg', 2, 'Bolu Peca', 'Kue Bolu', 15000, 5),
('boluKlemben.jpg', 3, 'Bolu Klemben', 'Kue Bolu', 16000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lap_penjualan`
--
ALTER TABLE `lap_penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_kue` (`id_kue`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_kue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lap_penjualan`
--
ALTER TABLE `lap_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_kue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lap_penjualan`
--
ALTER TABLE `lap_penjualan`
  ADD CONSTRAINT `lap_penjualan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `lap_penjualan_ibfk_2` FOREIGN KEY (`id_kue`) REFERENCES `produk` (`id_kue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
