-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2020 pada 08.22
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `handphone`, `alamat`, `level`, `kd_toko`) VALUES
(1, 'Branch Manager', 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', '087776345663', 'Rangkasbitung', 'bm', 'faskal01'),
(2, 'Ani', 'kasir1', '8cb2237d0679ca88db6464eac60da96345513964', '089647367634', 'Rangkasbitung', 'kasir', 'faskal01'),
(3, 'Produksi', 'produksi', '6e3bf9569d685dc740285417951b943b2452c2b5', '097123674743', 'Rangkasbitung', 'produksi', 'faskal01'),
(4, 'Ahmad', 'designer1', '8cb2237d0679ca88db6464eac60da96345513964', '089887897874', 'Rangkasbitung', 'setting', 'faskal01'),
(5, 'Owner', 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', '089473467254', 'Rangkasbitung', 'owner', 'faskal01'),
(6, 'Badri', 'designer2', '8cb2237d0679ca88db6464eac60da96345513964', '083147827426', 'Rangkasbitung', 'setting', 'faskal02'),
(7, 'Tati', 'kasir2', '8cb2237d0679ca88db6464eac60da96345513964', '0892876728361', 'Rangkasbitung', 'kasir', 'faskal02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` int(11) NOT NULL,
  `bahan_nama` varchar(255) NOT NULL,
  `bahan_kategori` varchar(50) NOT NULL,
  `bahan_hpp` int(11) NOT NULL,
  `bahan_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `bahan_nama`, `bahan_kategori`, `bahan_hpp`, `bahan_jual`) VALUES
(1, 'FLEXI CHINA 260', 'Meter', 10000, 20000),
(2, 'FLEXI CHINA 340', 'Meter', 20000, 30000),
(3, 'KORCIN', 'Meter', 25000, 35000),
(4, 'VINIL', 'Meter', 55000, 65000),
(5, 'GRAFTACK', 'Meter', 70000, 70000),
(6, 'RITRAMA', 'Meter', 70000, 80000),
(7, 'TRANSPARAN', 'Meter', 60000, 70000),
(8, 'ALBATROS', 'Meter', 50000, 60000),
(9, 'ONE WAY', 'Meter', 50000, 65000),
(10, 'CLOTH', 'Meter', 20000, 35000),
(11, 'CANVAS GOLD', 'Meter', 100000, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_jual`
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
-- Dumping data untuk tabel `harga_jual`
--

INSERT INTO `harga_jual` (`hj_id`, `hj_produk`, `hj_bahan`, `hj_mesin`, `hj_finishing`, `hj_potong`, `hj_ukuran`, `hj_display`, `hj_harga`, `hj_min_qty`, `hj_sisi`, `hj_sisi_finishing`) VALUES
(13, 1, 16, 6, 7, 1, '', 1, 1000, 1, 1, 1),
(14, 1, 4, 2, 7, 1, '', 1, 4000, 1, 1, 1),
(15, 3, 16, 6, 7, 1, '', 1, 90000, 1, 0, 0),
(18, 5, 16, 2, 7, 6, '', 1, 20000, 1, 0, 0),
(26, 1, 4, 2, 1, 1, '', 1, 50000, 100, 1, 0),
(27, 2, 5, 3, 1, 1, 'A4', 1, 25000, 1, 1, 0),
(28, 3, 8, 3, 1, 1, '', 3, 20000, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
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
  `invoice_payment` varchar(10) NOT NULL,
  `kd_toko` varchar(10) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tgl`, `invoice_kostumer`, `invoice_status`, `invoice_diskon`, `invoice_dp`, `invoice_ar`, `invoice_total`, `invoice_payment`, `kd_toko`, `id_admin`) VALUES
(1, '2020-09-27', 2, 0, 0, 0, 0, 100000, '', 'faskal01', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_display`
--

CREATE TABLE `jenis_display` (
  `jenis_display_id` int(11) NOT NULL,
  `jenis_display_nama` varchar(255) NOT NULL,
  `jenis_display_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_display`
--

INSERT INTO `jenis_display` (`jenis_display_id`, `jenis_display_nama`, `jenis_display_hpp`) VALUES
(1, 'Tanpa Display', 0),
(6, 'Meter', 0),
(7, 'Lembar', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_finishing`
--

CREATE TABLE `jenis_finishing` (
  `jenis_finishing_id` int(11) NOT NULL,
  `jenis_finishing_nama` varchar(255) NOT NULL,
  `jenis_finishing_kategori` varchar(30) NOT NULL,
  `jenis_finishing_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_finishing`
--

INSERT INTO `jenis_finishing` (`jenis_finishing_id`, `jenis_finishing_nama`, `jenis_finishing_kategori`, `jenis_finishing_hpp`) VALUES
(1, 'Tanpa Laminating', '', 0),
(3, 'Laminating', 'lembar', 1000),
(4, 'Laminating Glosy', 'meter', 100),
(5, 'Laminating Glosy A3 ( 32 x 48 )', 'lembar', 500),
(6, 'Laminating Doff A3 ( 32 x 48 )', 'lembar', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_potong`
--

CREATE TABLE `jenis_potong` (
  `jenis_potong_id` int(11) NOT NULL,
  `jenis_potong_nama` varchar(255) NOT NULL,
  `jenis_potong_kategori` varchar(30) NOT NULL,
  `jenis_potong_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_potong`
--

INSERT INTO `jenis_potong` (`jenis_potong_id`, `jenis_potong_nama`, `jenis_potong_kategori`, `jenis_potong_hpp`) VALUES
(1, 'Tanpa Potong', '', 0),
(2, 'Cutting ', 'meter', 1000),
(3, 'Manual', 'meter', 10000),
(4, 'Manual A3 ( 32 x 48 )', 'lembar', 200),
(5, 'Mesin A3 ( 32 x 48 )', 'lembar', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kostumer`
--

CREATE TABLE `kostumer` (
  `kostumer_id` int(11) NOT NULL,
  `kostumer_nama` varchar(255) NOT NULL,
  `kostumer_telp` varchar(30) NOT NULL,
  `kostumer_alamat` text NOT NULL,
  `kostumer_email` varchar(255) NOT NULL,
  `kd_toko` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kostumer`
--

INSERT INTO `kostumer` (`kostumer_id`, `kostumer_nama`, `kostumer_telp`, `kostumer_alamat`, `kostumer_email`, `kd_toko`) VALUES
(2, 'samsudin', '08234234', 'menasah mesjid', 'samsudin@gmail.com', 'faskal01'),
(3, 'jaua', '0834234', 'asnad', 'sd', 'faskal01'),
(4, 'Khairul Umam', '083234234234', 'jl. perdagangan no.54', 'umam@Gmail.com', 'faskal01'),
(5, 'sdfsdfs', '34234234', 'sfsdfsd', 'sdfsdf@sdfsdf.com', 'faskal01'),
(6, 'Adi', '08536009712', 'Jalan Kenari nomer 2', 'adisa@gmail.com', 'faskal01'),
(7, 'Sundara', '080808080', 'Lebak', 'sundara@sundara.com', 'faskal01'),
(8, 'zaky', '088888888', 'rrr', 'sdsd@sdssd.klk', 'faskal01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mesin`
--

CREATE TABLE `mesin` (
  `mesin_id` int(11) NOT NULL,
  `mesin_nama` varchar(255) NOT NULL,
  `mesin_tipe` varchar(255) NOT NULL,
  `mesin_kategori` varchar(255) NOT NULL,
  `mesin_hpp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mesin`
--

INSERT INTO `mesin` (`mesin_id`, `mesin_nama`, `mesin_tipe`, `mesin_kategori`, `mesin_hpp`) VALUES
(2, 'Laser Jet ', 'BW', 'meter', 10000),
(3, 'Starjet', 'BW', 'meter', 7000),
(4, 'Roland', '', 'meter', 7000),
(5, 'Develope', 'Color', 'meter', 13000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `order_id` int(11) NOT NULL,
  `kd_toko` varchar(10) NOT NULL,
  `order_invoice` int(11) NOT NULL,
  `order_hj` int(11) NOT NULL,
  `order_keterangan` text NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_harga_satuan` int(11) NOT NULL,
  `order_harga_sub_total` int(11) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`order_id`, `kd_toko`, `order_invoice`, `order_hj`, `order_keterangan`, `order_qty`, `order_harga_satuan`, `order_harga_sub_total`, `order_datetime`) VALUES
(1, 'faskal01', 1, 26, 'Ukuran : x<br/>Luas :  (Meter Persegi)', 1, 50000, 50000, '2020-09-27 16:37:02'),
(2, '', 1, 26, 'Ukuran : x<br/>Luas :  (Meter Persegi)', 1, 50000, 50000, '2020-09-27 16:37:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`) VALUES
(1, 'Kartu Nama'),
(6, 'Spanduk'),
(7, 'Banner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_bahan`
--

CREATE TABLE `satuan_bahan` (
  `kd_satuan` int(10) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan_bahan`
--

INSERT INTO `satuan_bahan` (`kd_satuan`, `nama_satuan`) VALUES
(2, 'Meter'),
(3, 'Lembar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(10) NOT NULL,
  `kd_toko` varchar(10) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `ket_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `kd_toko`, `nama_toko`, `alamat_toko`, `ket_toko`) VALUES
(1, 'faskal01', 'Faskal Pusat', 'Jl. Soekarno Hatta Rangkasbitung', 'Faskal Pusat'),
(2, 'faskal02', 'Faskal Cabang', 'Jl. RA. Kartini', 'Faskal Cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user` int(100) NOT NULL,
  `kd_level` varchar(25) NOT NULL,
  `level_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

--
-- Indeks untuk tabel `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`hj_id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indeks untuk tabel `jenis_display`
--
ALTER TABLE `jenis_display`
  ADD PRIMARY KEY (`jenis_display_id`);

--
-- Indeks untuk tabel `jenis_finishing`
--
ALTER TABLE `jenis_finishing`
  ADD PRIMARY KEY (`jenis_finishing_id`);

--
-- Indeks untuk tabel `jenis_potong`
--
ALTER TABLE `jenis_potong`
  ADD PRIMARY KEY (`jenis_potong_id`);

--
-- Indeks untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`kostumer_id`);

--
-- Indeks untuk tabel `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`mesin_id`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `satuan_bahan`
--
ALTER TABLE `satuan_bahan`
  ADD PRIMARY KEY (`kd_satuan`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `bahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `harga_jual`
--
ALTER TABLE `harga_jual`
  MODIFY `hj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_display`
--
ALTER TABLE `jenis_display`
  MODIFY `jenis_display_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_finishing`
--
ALTER TABLE `jenis_finishing`
  MODIFY `jenis_finishing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_potong`
--
ALTER TABLE `jenis_potong`
  MODIFY `jenis_potong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `kostumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `mesin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `satuan_bahan`
--
ALTER TABLE `satuan_bahan`
  MODIFY `kd_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
