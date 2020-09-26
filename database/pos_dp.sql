-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 08:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_dp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `handphone` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `level` varchar(10) NOT NULL,
  `kd_toko` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `handphone`, `alamat`, `level`, `kd_toko`) VALUES
(4, 'Branch Manager', 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', '087776345663', 'Rangkasbitung', 'bm', 'faskal01'),
(5, 'Ani', 'kasir1', '8cb2237d0679ca88db6464eac60da96345513964', '089647367634', 'Rangkasbitung', 'kasir', 'faskal01'),
(6, 'Produksi', 'produksi', '6e3bf9569d685dc740285417951b943b2452c2b5', '097123674743', 'Rangkasbitung', 'produksi', 'faskal01'),
(7, 'Ahmad', 'designer1', '8cb2237d0679ca88db6464eac60da96345513964', '089887897874', 'Rangkasbitung', 'setting', 'faskal01'),
(8, 'Owner', 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', '089473467254', 'Rangkasbitung', 'owner', 'faskal01'),
(9, 'Badri', 'designer2', '8cb2237d0679ca88db6464eac60da96345513964', '083147827426', 'Rangkasbitung', 'setting', 'faskal02'),
(10, 'Tati', 'kasir2', '8cb2237d0679ca88db6464eac60da96345513964', '0892876728361', 'Rangkasbitung', 'setting', 'faskal02');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` int(11) NOT NULL,
  `bahan_nama` varchar(255) NOT NULL,
  `bahan_kategori` varchar(50) NOT NULL,
  `bahan_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `bahan_nama`, `bahan_kategori`, `bahan_hpp`) VALUES
(4, 'Flexy s60', 'lembar', 12000),
(5, 'F.china 280gr', 'meter', 6000),
(6, 'F.korea 480gr', 'meter', 21000),
(7, 'backlite korea', 'meter', 23000),
(8, 'Albatros', 'meter', 13000),
(9, 'sticker Albatros', 'meter', 13000),
(10, 'Sticker Ritrama', 'meter', 26000),
(11, 'Art paper 150 gr', 'lembar', 300),
(12, 'HVS 100 gr', 'lembar', 300),
(13, 'Art carton 230', 'lembar', 500),
(14, 'Art carton 260', 'lembar', 600),
(15, 'BW import', 'lembar', 900);

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE `harga_jual` (
  `hj_id` int(11) NOT NULL,
  `hj_produk` int(11) NOT NULL,
  `hj_bahan` int(11) NOT NULL,
  `hj_mesin` int(11) NOT NULL,
  `hj_finishing` int(11) NOT NULL,
  `hj_potong` int(11) NOT NULL,
  `hj_ukuran` varchar(30) NOT NULL,
  `hj_display` int(11) NOT NULL,
  `hj_harga` int(11) NOT NULL,
  `hj_min_qty` int(11) NOT NULL,
  `hj_sisi` int(11) NOT NULL,
  `hj_sisi_finishing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_jual`
--

INSERT INTO `harga_jual` (`hj_id`, `hj_produk`, `hj_bahan`, `hj_mesin`, `hj_finishing`, `hj_potong`, `hj_ukuran`, `hj_display`, `hj_harga`, `hj_min_qty`, `hj_sisi`, `hj_sisi_finishing`) VALUES
(12, 1, 4, 2, 3, 1, '', 1, 100000, 100, 2, 1),
(13, 1, 16, 6, 7, 1, '', 1, 1000, 1, 1, 1),
(14, 1, 4, 2, 7, 1, '', 1, 4000, 1, 1, 1),
(15, 3, 16, 6, 7, 1, '', 1, 90000, 1, 0, 0),
(18, 5, 16, 2, 7, 6, '', 1, 20000, 1, 0, 0),
(21, 2, 4, 2, 1, 1, 'A4', 1, 1000, 1, 1, 0),
(22, 4, 5, 2, 1, 4, '', 1, 5000, 1, 1, 0),
(23, 1, 4, 2, 3, 1, '', 1, 2500, 100, 2, 2),
(24, 1, 5, 2, 3, 1, '', 1, 150000, 100, 1, 0),
(25, 1, 6, 2, 3, 1, '', 1, 20000, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tgl` date NOT NULL,
  `invoice_kostumer` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_diskon` int(11) NOT NULL,
  `invoice_dp` int(11) NOT NULL,
  `invoice_ar` int(11) NOT NULL,
  `invoice_total` int(11) NOT NULL,
  `invoice_payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tgl`, `invoice_kostumer`, `invoice_status`, `invoice_diskon`, `invoice_dp`, `invoice_ar`, `invoice_total`, `invoice_payment`) VALUES
(1, '2020-09-26', 7, 3, 0, 1000000, 0, 1000000, 'cash'),
(2, '2020-09-26', 8, 3, 0, 100000, 100000, 100000, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_display`
--

CREATE TABLE `jenis_display` (
  `jenis_display_id` int(11) NOT NULL,
  `jenis_display_nama` varchar(255) NOT NULL,
  `jenis_display_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_display`
--

INSERT INTO `jenis_display` (`jenis_display_id`, `jenis_display_nama`, `jenis_display_hpp`) VALUES
(1, 'Tanpa Display', 0),
(3, 'X-Banner', 25000),
(4, 'Roll up ', 35000),
(5, 'xxxx1', 100);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_finishing`
--

CREATE TABLE `jenis_finishing` (
  `jenis_finishing_id` int(11) NOT NULL,
  `jenis_finishing_nama` varchar(255) NOT NULL,
  `jenis_finishing_kategori` varchar(30) NOT NULL,
  `jenis_finishing_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_finishing`
--

INSERT INTO `jenis_finishing` (`jenis_finishing_id`, `jenis_finishing_nama`, `jenis_finishing_kategori`, `jenis_finishing_hpp`) VALUES
(1, 'Tanpa Laminating', '', 0),
(3, 'Laminating', 'lembar', 1000),
(4, 'Laminating Glosy', 'meter', 100),
(5, 'Laminating Glosy A3 ( 32 x 48 )', 'lembar', 500),
(6, 'Laminating Doff A3 ( 32 x 48 )', 'lembar', 500);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_potong`
--

CREATE TABLE `jenis_potong` (
  `jenis_potong_id` int(11) NOT NULL,
  `jenis_potong_nama` varchar(255) NOT NULL,
  `jenis_potong_kategori` varchar(30) NOT NULL,
  `jenis_potong_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_potong`
--

INSERT INTO `jenis_potong` (`jenis_potong_id`, `jenis_potong_nama`, `jenis_potong_kategori`, `jenis_potong_hpp`) VALUES
(1, 'Tanpa Potong', '', 0),
(2, 'Cutting ', 'meter', 1000),
(3, 'Manual', 'meter', 10000),
(4, 'Manual A3 ( 32 x 48 )', 'lembar', 200),
(5, 'Mesin A3 ( 32 x 48 )', 'lembar', 500);

-- --------------------------------------------------------

--
-- Table structure for table `kostumer`
--

CREATE TABLE `kostumer` (
  `kostumer_id` int(11) NOT NULL,
  `kostumer_nama` varchar(255) NOT NULL,
  `kostumer_telp` varchar(30) NOT NULL,
  `kostumer_alamat` text NOT NULL,
  `kostumer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostumer`
--

INSERT INTO `kostumer` (`kostumer_id`, `kostumer_nama`, `kostumer_telp`, `kostumer_alamat`, `kostumer_email`) VALUES
(2, 'samsudin', '08234234', 'menasah mesjid', 'samsudin@gmail.com'),
(3, 'jaua', '0834234', 'asnad', 'sd'),
(4, 'Khairul Umam', '083234234234', 'jl. perdagangan no.54', 'umam@Gmail.com'),
(5, 'sdfsdfs', '34234234', 'sfsdfsd', 'sdfsdf@sdfsdf.com'),
(6, 'Adi', '08536009712', 'Jalan Kenari nomer 2', 'adisa@gmail.com'),
(7, 'Sundara', '080808080', 'Lebak', 'sundara@sundara.com'),
(8, 'zaky', '088888888', 'rrr', 'sdsd@sdssd.klk');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `mesin_id` int(11) NOT NULL,
  `mesin_nama` varchar(255) NOT NULL,
  `mesin_tipe` varchar(255) NOT NULL,
  `mesin_kategori` varchar(255) NOT NULL,
  `mesin_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`mesin_id`, `mesin_nama`, `mesin_tipe`, `mesin_kategori`, `mesin_hpp`) VALUES
(2, 'Laser Jet ', 'BW', 'meter', 10000),
(3, 'Starjet', 'BW', 'meter', 7000),
(4, 'Roland', '', 'meter', 7000),
(5, 'Develope', 'Color', 'meter', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `order_id` int(11) NOT NULL,
  `order_invoice` int(11) NOT NULL,
  `order_hj` int(11) NOT NULL,
  `order_keterangan` text NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_harga_satuan` int(11) NOT NULL,
  `order_harga_sub_total` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`order_id`, `order_invoice`, `order_hj`, `order_keterangan`, `order_qty`, `order_harga_satuan`, `order_harga_sub_total`, `order_datetime`) VALUES
(1, 1, 12, 'Ukuran : x<br/>Luas :  (Meter Persegi)', 10, 100000, 1000000, '2020-09-26 12:41:00'),
(2, 2, 12, 'Ukuran : x<br/>Luas :  (Meter Persegi)', 1, 100000, 100000, '2020-09-26 17:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`) VALUES
(1, 'Kartu Nama'),
(2, 'Flyer Brosur'),
(3, 'Display'),
(4, 'Print A3'),
(5, 'Large Format');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(10) NOT NULL,
  `kd_toko` varchar(10) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `ket_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `kd_toko`, `nama_toko`, `alamat_toko`, `ket_toko`) VALUES
(1, 'faskal01', 'Faskal Pusat', 'Jl. Soekarno Hatta Rangkasbitung', 'Faskal Pusat'),
(2, 'faskal02', 'Faskal Cabang', 'Jl. RA. Kartini', 'Faskal Cabang');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_user` int(100) NOT NULL,
  `kd_level` varchar(25) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_user`, `kd_level`, `level_name`) VALUES
(1, 'bm', 'Branch Manager'),
(2, 'kasir', 'Kasir'),
(3, 'produksi', 'Produksi'),
(4, 'setting', 'Setting / Design'),
(5, 'owner', 'Owner'),
(6, 'gudang', 'Gudang ATK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`hj_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `jenis_display`
--
ALTER TABLE `jenis_display`
  ADD PRIMARY KEY (`jenis_display_id`);

--
-- Indexes for table `jenis_finishing`
--
ALTER TABLE `jenis_finishing`
  ADD PRIMARY KEY (`jenis_finishing_id`);

--
-- Indexes for table `jenis_potong`
--
ALTER TABLE `jenis_potong`
  ADD PRIMARY KEY (`jenis_potong_id`);

--
-- Indexes for table `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`kostumer_id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`mesin_id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `bahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `harga_jual`
--
ALTER TABLE `harga_jual`
  MODIFY `hj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_display`
--
ALTER TABLE `jenis_display`
  MODIFY `jenis_display_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_finishing`
--
ALTER TABLE `jenis_finishing`
  MODIFY `jenis_finishing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_potong`
--
ALTER TABLE `jenis_potong`
  MODIFY `jenis_potong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `kostumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `mesin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;