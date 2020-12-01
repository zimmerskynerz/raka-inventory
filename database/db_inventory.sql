-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 18.28
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rinci_keluar`
--

CREATE TABLE `rinci_keluar` (
  `id_brg` int(6) DEFAULT NULL,
  `id_keluar` int(5) NOT NULL,
  `harga` int(12) NOT NULL,
  `jml` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rinci_keluar`
--

INSERT INTO `rinci_keluar` (`id_brg`, `id_keluar`, `harga`, `jml`) VALUES
(10001, 1, 250000, 10),
(10001, 2, 250000, 60),
(10001, 3, 250000, 5),
(20001, 4, 100000, 4),
(20001, 5, 100000, 10),
(30001, 6, 3500000, 5),
(40001, 7, 750000, 5),
(50001, 8, 4000000, 20),
(90001, 9, 1500000, 5),
(20001, 10, 600000, 5),
(30001, 11, 3500000, 20),
(20002, 12, 1500000, 10),
(30002, 13, 900000, 20),
(50001, 14, 4000000, 2),
(60001, 15, 1250000, 10),
(30003, 16, 960000, 5),
(90001, 17, 1500000, 10),
(70001, 18, 1500000, 5),
(60002, 19, 400000, 20),
(90003, 20, 920000, 5),
(10001, 21, 300000, 50),
(10001, 22, 300000, 25),
(10001, 23, 300000, 1),
(20001, 24, 600000, 1),
(10002, 25, 300000, 1),
(10002, 26, 300000, 1),
(10003, 27, 1200000, 1),
(10003, 28, 1200000, 1),
(10002, 29, 300000, 1),
(10002, 30, 300000, 1),
(320001, 32, 750000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rinci_masuk`
--

CREATE TABLE `rinci_masuk` (
  `id_masuk` int(5) NOT NULL,
  `id_brg` int(6) DEFAULT NULL,
  `harga` int(12) NOT NULL,
  `jml` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rinci_masuk`
--

INSERT INTO `rinci_masuk` (`id_masuk`, `id_brg`, `harga`, `jml`) VALUES
(30, 320001, 500000, 1),
(31, 320001, 500000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_supplier` int(3) DEFAULT NULL,
  `id_brg` int(6) NOT NULL,
  `nm_brg` text DEFAULT NULL,
  `stok` int(5) DEFAULT NULL,
  `harga_beli` int(10) DEFAULT NULL,
  `harga_jual` int(10) DEFAULT NULL,
  `ket` enum('ada','tidak') NOT NULL DEFAULT 'ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_supplier`, `id_brg`, `nm_brg`, `stok`, `harga_beli`, `harga_jual`, `ket`) VALUES
(1, 10001, 'kursi santa', 41, 155000, 300000, 'ada'),
(1, 10002, 'kursi santai', 7, 155000, 300000, 'tidak'),
(1, 10003, 'lemari rias', 8, 900000, 1200000, 'ada'),
(1, 10004, 'wefdfsdsfsdf', 324, 343333, 34, 'tidak'),
(2, 20001, 'Meja Tamu', 36, 550000, 600000, 'ada'),
(2, 20002, 'Lemari pakaian', 50, 1000000, 1500000, 'ada'),
(4, 20003, 'Meja guru dan kursi', 50, 600000, 750000, 'ada'),
(2, 20004, 'Kursi Teras', 50, 400000, 500000, 'ada'),
(2, 20005, 'Meja murid dan kursi', 50, 250000, 350000, 'ada'),
(2, 20006, 'asdadasd', 23, 12312312, 312312312, 'ada'),
(2, 20007, 'sddfsdfsdf', 234234, 234234, 234, 'ada'),
(3, 30001, 'Lemari Buffet', 52, 3000000, 3500000, 'ada'),
(3, 30002, 'Meja Makan', 50, 780000, 900000, 'ada'),
(3, 30003, 'Kursi Goyang', 25, 700000, 960000, 'ada'),
(3, 30004, 'Lemari dapur', 45, 1000000, 1100000, 'ada'),
(3, 30005, 'Ayunan', 30, 1500000, 2000000, 'ada'),
(4, 40001, 'Meja Rias', 75, 500000, 750000, 'ada'),
(5, 50001, 'Kursi Tamu', 53, 3500000, 4000000, 'ada'),
(5, 50002, 'Rak Sepatu', 20, 400000, 500000, 'ada'),
(6, 60001, 'Rak Buku', 55, 1200000, 1250000, 'ada'),
(6, 60002, 'Lantai Kayu', 80, 200000, 400000, 'ada'),
(6, 60003, 'Jendela', 30, 700000, 800000, 'ada'),
(6, 60004, 'Kusen Jendela', 45, 500000, 600000, 'ada'),
(7, 70001, 'Kursi Taman', 45, 1000000, 1500000, 'ada'),
(7, 70002, 'Kursi Kantor', 50, 550000, 700000, 'ada'),
(7, 70003, 'Kursi Sudut', 50, 4500000, 5000000, 'ada'),
(9, 90001, 'Tempat tidur 160x200', 45, 1300000, 1500000, 'ada'),
(9, 90002, 'Meja Kantor', 50, 780000, 910000, 'ada'),
(9, 90003, 'Meja Resepsionis', 45, 700000, 920000, 'ada'),
(9, 90004, 'Meja Belajar', 30, 600000, 750000, 'ada'),
(9, 90005, 'Meja TV', 30, 450000, 600000, 'ada'),
(9, 90006, 'Tempat tidur 180x200', 20, 1500000, 1700000, 'ada'),
(10, 100001, 'Meja Komputer', 50, 750000, 900000, 'ada'),
(10, 100002, 'Pintu', 20, 400000, 500000, 'ada'),
(32, 320001, 'kursi gaming', 5, 500000, 750000, 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id_keluar` int(5) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `total_hrg` int(12) DEFAULT NULL,
  `status` enum('terjual','return') NOT NULL,
  `username` varchar(20) NOT NULL,
  `ket` enum('selesai','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keluar`
--

INSERT INTO `tb_keluar` (`id_keluar`, `tgl_keluar`, `total_hrg`, `status`, `username`, `ket`) VALUES
(1, '2019-09-25', 2500000, 'terjual', 'gudang', 'selesai'),
(2, '2019-09-25', 15000000, 'terjual', 'gudang', 'selesai'),
(3, '2019-09-26', 1250000, 'return', 'gudang', 'selesai'),
(4, '2019-10-04', 400000, 'terjual', 'gudang', 'selesai'),
(5, '2019-10-07', 1000000, 'return', 'gudang', 'selesai'),
(6, '2019-10-07', 17500000, 'terjual', 'gudang', 'selesai'),
(7, '2019-10-07', 3750000, 'return', 'gudang', 'selesai'),
(8, '2019-10-07', 80000000, 'terjual', 'gudang', 'selesai'),
(9, '2019-10-08', 7500000, 'return', 'gudang', 'selesai'),
(10, '2019-10-19', 3000000, 'terjual', 'gudang', 'selesai'),
(11, '2019-11-21', 70000000, 'terjual', 'gudang', 'selesai'),
(12, '2019-11-21', 15000000, 'terjual', 'gudang', 'selesai'),
(13, '2019-11-21', 18000000, 'terjual', 'gudang', 'selesai'),
(14, '2019-11-21', 8000000, 'return', 'gudang', 'selesai'),
(15, '2019-11-21', 12500000, 'terjual', 'gudang', 'selesai'),
(16, '2019-11-21', 4800000, 'return', 'gudang', 'selesai'),
(17, '2019-11-21', 15000000, 'terjual', 'gudang', 'selesai'),
(18, '2019-11-21', 7500000, 'return', 'gudang', 'selesai'),
(19, '2019-11-21', 8000000, 'terjual', 'gudang', 'selesai'),
(20, '2019-11-21', 4600000, 'terjual', 'gudang', 'selesai'),
(21, '2019-11-23', 15000000, 'terjual', 'gudang', 'selesai'),
(22, '2019-11-23', 7500000, 'terjual', 'gudang', 'selesai'),
(23, '2019-11-23', 300000, 'return', 'gudang', 'selesai'),
(24, '2019-11-23', 600000, 'terjual', 'gudang', 'selesai'),
(25, '2019-11-23', 300000, 'terjual', 'gudang', 'selesai'),
(26, '2019-11-23', 300000, 'return', 'gudang', 'selesai'),
(27, '2019-11-26', 1200000, 'terjual', 'gudang', 'selesai'),
(28, '2019-11-26', 1200000, 'return', 'gudang', 'selesai'),
(29, '2019-11-26', 300000, 'terjual', 'gudang', 'selesai'),
(30, '2019-11-26', 300000, 'return', 'gudang', 'selesai'),
(31, '2020-12-01', 0, 'terjual', 'gudang', 'belum'),
(32, '2020-12-01', 1500000, 'terjual', 'gudang', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_masuk` int(5) NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `total_hrg` int(12) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `ket` enum('selesai','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `tgl_masuk`, `total_hrg`, `username`, `ket`) VALUES
(30, '2020-12-01', 500000, 'gudang', 'selesai'),
(31, '2020-12-01', 500000, 'gudang', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(3) NOT NULL,
  `nm_supplier` varchar(20) NOT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `ket` enum('ada','tidak') NOT NULL DEFAULT 'ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nm_supplier`, `alamat`, `kota`, `no_hp`, `ket`) VALUES
(1, 'Toko 3w', 'Jekulo', 'kudus', '0857785432144', 'ada'),
(2, 'Toko Manfaat jaya', 'Jekulo', 'Kudus', '085777890444', 'ada'),
(3, 'Toko Sumber new', 'Tenggeles', 'kudus', '085123321455', 'ada'),
(4, 'Toko Soklin', 'Bulung', 'Kudus', '081888333666', 'ada'),
(5, 'Toko Murah Jaya', 'Gribig', 'Kudus', '087771234567', 'ada'),
(6, 'UD. Jati Agung', 'kalidiro, Jekulo', 'Kudus', '087654567888', 'ada'),
(7, 'UD. Jati Asli', 'Mejobo', 'Kudus', '098856712345', 'ada'),
(8, 'UD. Sumber Rezeki', 'Klaling, Jekulo', 'Kudus', '085225311267', 'ada'),
(9, 'UD. Nafi Jaya', 'Megawon', 'Kudus', '087712300876', 'ada'),
(10, 'Toko Giat Gemilang', 'Bulung', 'Kudus', '097666541244', 'ada'),
(11, 'Toko Naga Jaya', 'Gribig', 'Kudus', '085560901213', 'ada'),
(12, 'Toko Lima', 'Gribig', 'Kudus', '085640353666', 'ada'),
(13, 'Toko Semar', 'Gribig', 'Kudus', '089654777853', 'ada'),
(14, 'Timurjaya Furniture', 'Jl. Jend. Sudirman No.9 Barongan', 'Kudus', '0291438527', 'ada'),
(15, 'Istana Furniture', 'Kaliwungu', 'Kudus', '085727712564', 'ada'),
(16, 'UD.Furniture Rizky', 'Jojo,Mejobo', 'Kudus', '089638161494', 'ada'),
(17, 'Toko Truly Joglo', 'Prambatan lor', 'Kudus', '082225671498', 'ada'),
(18, 'Mebel Karya Jaya', 'Undaan', 'Kudus', '087654555800', 'ada'),
(19, 'Semar', 'Jl.Panjang,Lingkar utara,Peganjaran,Bae', 'Kudus', '085800035211', 'ada'),
(20, 'Euro Meuble', 'Jl.Lingkar utara UMK,Kayuapu kulon,Gondangmanis,Bae', 'Kudus', '087654333901', 'ada'),
(21, 'Mebel Larees Jaya', 'Rendeng, No.96', 'Kudus', '089666532607', 'ada'),
(22, 'Megawon Furniture', 'Mejobo rt 02 rw 02', 'Kudus', '085432671980', 'ada'),
(23, 'Mulia Furniture', 'Jl.Raya Kudus-Jepara km.4,madaran,mijen', 'Jepara', '085432111432', 'ada'),
(24, 'Toko Mebel Joglo', 'Kedungsari,gebog', 'kudus', '087680943671', 'ada'),
(25, 'Putra Mebel', 'Jl.Kudus Muria,Cendono', 'Kudus', '087654329020', 'ada'),
(26, 'Toko Subur Utama', 'Ngemplak lor,klirejo,undaaan', 'Kudus', '087654999087', 'ada'),
(27, 'Toko Moro Seneng', 'Besito', 'Kudus', '085640876333', 'ada'),
(28, 'Mulyo Jaya Abadi', 'Cendono,dawe', 'Kudus', '087765432111', 'ada'),
(29, 'Toko Tiga Putra', 'Jl.Kudus Colo', 'Kudus', '087654090877', 'ada'),
(30, 'Mebel Alfarukh', 'Pasuruan kidul', 'Kudus', '087771098755', 'ada'),
(31, 'toko syukur barokah', 'jln jend sudirman no.41', 'kuduss', '087876543444', 'ada'),
(32, 'toko abc', 'pengkol2', 'pati', '08123456789', 'ada'),
(33, 'asdadsdas', 'sad', 'Kudus', '98777383738', 'ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_update`
--

CREATE TABLE `tb_update` (
  `id_update` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_brg` int(6) NOT NULL,
  `stok` int(5) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `ket` enum('update','delete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_update`
--

INSERT INTO `tb_update` (`id_update`, `tgl_update`, `id_brg`, `stok`, `harga_beli`, `harga_jual`, `ket`) VALUES
(1, '2019-09-25', 10001, 55, 100000, 200000, 'update'),
(2, '2019-09-25', 10001, 60, 200000, 250000, 'update'),
(3, '2019-10-05', 20001, 10, 50000, 100000, 'update'),
(4, '2019-10-04', 20001, 10, 120000, 500000, 'update'),
(5, '2019-10-04', 20001, 10, 50000, 100000, 'update'),
(6, '2019-10-04', 10001, 56, 100000, 250000, 'update'),
(7, '2019-10-07', 30002, 50, 780000, 900000, 'update'),
(8, '2019-10-07', 40001, 50, 500000, 750000, 'update'),
(9, '2019-10-09', 20001, 10, 500000, 600000, 'update'),
(10, '2019-10-09', 20001, 10, 500000, 600000, 'update'),
(11, '2019-10-09', 20001, 10, 550000, 600000, 'update'),
(12, '2019-10-11', 20003, 50, 600000, 750000, 'update'),
(13, '2019-10-11', 10001, 50, 100000, 250000, 'update'),
(14, '2019-10-11', 30001, 60, 3000000, 3500000, 'update'),
(15, '2019-10-11', 10001, 50, 150000, 300000, 'update'),
(16, '2019-11-22', 10001, 50, 155000, 300000, 'update'),
(17, '2019-11-23', 10003, 10, 900000, 1200000, 'update'),
(18, '2019-11-23', 10002, 10, 155000, 300000, 'update'),
(19, '2019-11-23', 10001, 5, 155000, 300000, 'update'),
(20, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(21, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(22, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(23, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(24, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(25, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(26, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(27, '2019-11-26', 10003, 8, 900000, 1200000, 'update'),
(28, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(29, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(30, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(31, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(32, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(33, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(34, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(35, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(36, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(37, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(38, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(39, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(40, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(41, '2019-11-26', 10002, 7, 155000, 300000, 'update'),
(42, '2019-11-26', 20001, 24, 550000, 600000, 'update'),
(43, '2019-11-26', 10002, 7, 155000, 300000, 'update'),
(44, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(45, '2019-11-26', 20001, 24, 550000, 600000, 'update'),
(46, '2019-11-26', 20003, 50, 600000, 750000, 'update'),
(47, '2019-11-26', 20003, 50, 600000, 750000, 'update'),
(48, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(49, '2019-11-26', 10001, 29, 155000, 300000, 'update'),
(50, '2020-12-01', 10001, 29, 155000, 300000, 'update'),
(51, '2020-12-01', 10001, 29, 155000, 300000, 'update'),
(52, '2020-12-01', 10001, 29, 155000, 300000, 'update'),
(53, '2020-12-01', 10001, 29, 155000, 300000, 'update'),
(54, '2020-12-01', 10001, 29, 155000, 300000, 'update'),
(55, '2020-12-01', 20005, 50, 250000, 3500002, 'update'),
(56, '2020-12-01', 10004, 324, 343333, 34, 'update'),
(57, '2020-12-01', 10004, 324, 343333, 34, 'delete'),
(58, '2020-12-01', 10002, 7, 155000, 300000, 'delete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `jabatan` enum('admin','gudang','pemilik') DEFAULT NULL,
  `ket` enum('ada','tidak') NOT NULL DEFAULT 'ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `tgl_lahir`, `alamat`, `kota`, `no_hp`, `jabatan`, `ket`) VALUES
('admin', '123', 'raka', '1998-02-10', 'Jl. Kudus - Pati KM. 3, Ds. Salam, Kec. Bae', 'kudus', '085741992746', 'admin', 'ada'),
('admin2', '123', 'Dea', '1998-03-30', 'Daren', 'Jepara', '0852253000925', 'admin', 'ada'),
('gudang', '123', 'Riski', '1998-01-22', 'Jl. Kudus - Colo KM. 9, RT. 09/ RW.12, Ds. Jurang, Kec. Dawe', 'kudus', '083658965487', 'gudang', 'ada'),
('gudang2', '123', 'Yudha', '1996-07-05', 'Ploso', 'Kudus', '085641642729', 'gudang', 'ada'),
('pemilik', '123', 'Pemilik', '1997-02-23', 'Jl. Sumber - Bulusan No.69, RT. 05/ RW.05, Ds. Hadipolo, Kec. Jekulo, KODE POS : 59382', 'KUDUS', '0895411547434', 'pemilik', 'ada');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rinci_keluar`
--
ALTER TABLE `rinci_keluar`
  ADD KEY `id_keluar` (`id_keluar`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `rinci_masuk`
--
ALTER TABLE `rinci_masuk`
  ADD KEY `id_masuk` (`id_masuk`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  ADD PRIMARY KEY (`id_update`),
  ADD KEY `id_brg` (`id_brg`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  MODIFY `id_update` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rinci_keluar`
--
ALTER TABLE `rinci_keluar`
  ADD CONSTRAINT `rinci_keluar_ibfk_1` FOREIGN KEY (`id_keluar`) REFERENCES `tb_keluar` (`id_keluar`),
  ADD CONSTRAINT `rinci_keluar_ibfk_2` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`);

--
-- Ketidakleluasaan untuk tabel `rinci_masuk`
--
ALTER TABLE `rinci_masuk`
  ADD CONSTRAINT `rinci_masuk_ibfk_1` FOREIGN KEY (`id_masuk`) REFERENCES `tb_masuk` (`id_masuk`),
  ADD CONSTRAINT `rinci_masuk_ibfk_2` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`);

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD CONSTRAINT `tb_keluar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `tb_masuk_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_update`
--
ALTER TABLE `tb_update`
  ADD CONSTRAINT `tb_update_ibfk_1` FOREIGN KEY (`id_brg`) REFERENCES `tb_barang` (`id_brg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
