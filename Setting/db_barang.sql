-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 08:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `notif_stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`notif_stok`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_supplier` int(255) DEFAULT NULL,
  `id_brg` int(255) NOT NULL,
  `nm_brg` text,
  `stok` int(10) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_supplier`, `id_brg`, `nm_brg`, `stok`, `harga`) VALUES
(4711, 8988, 'Maple Kuastik', 2, 980000),
(4711, 18465, 'Djarum Super 12', 8, 0),
(2147483647, 65777, 'FD Toshiba', 10, 0),
(4711, 183699, 'RAK 2', 1, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_supplier` int(255) DEFAULT NULL,
  `id_brg` int(255) DEFAULT NULL,
  `id_beli` int(255) NOT NULL,
  `tgl_beli` date DEFAULT NULL,
  `jml` int(10) DEFAULT NULL,
  `total_hrg` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_brg` int(255) DEFAULT NULL,
  `id_jual` int(255) NOT NULL,
  `tgl_jual` date DEFAULT NULL,
  `jml` int(10) DEFAULT NULL,
  `total_hrg` int(12) DEFAULT NULL,
  `ket` enum('terjual','return') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(255) NOT NULL,
  `nm_supplier` text,
  `alamat` text,
  `kota` text,
  `no_hp` varchar(255) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nm_supplier`, `alamat`, `kota`, `no_hp`, `link`) VALUES
(555, 'mila', 'kudus', 'Kudus', '087777', '0877777'),
(4711, 'AWHome Design Creator', 'Ds. Hadipolo, RT. 05/ RW.05, Kec. Jekulo, Kode Pos : 59382', 'Kudus-JawaTengah', '0895411547434', 'https://aw-home.blogspot.com/'),
(2147483647, 'Studio 69 Officiall', 'Ds. Hadipolo, RT.05/ RW.05, Kec. Jekulo', 'Kudus', '90', 'https://aw-home.blogspot.com/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` text,
  `tgl_lahir` date NOT NULL,
  `alamat` text,
  `kota` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `jabatan` enum('admin','gudang','pemilik') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `tgl_lahir`, `alamat`, `kota`, `no_hp`, `link`, `jabatan`) VALUES
('gudang', '123', 'gudang', '2019-06-12', 'Jl. Raya Kudus - Pati Km. 10A, Kec. Jekulo,', 'Kudus', '089666111232', '', 'gudang'),
('mila', '123', 'mila siti', '1997-02-23', 'Dk. Sumber - Bulusan, Ds. Hadipolo, RT. 05/ RW. 05, Kec. Jekulo', 'Kudus', '0895411547434', 'http://bit.ly/2INgV81', 'admin'),
('pemilik', '123', 'pemilik', '0000-00-00', 'kudus', '', '', '', 'pemilik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_beli`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`),
  ADD CONSTRAINT `tb_pembelian_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
