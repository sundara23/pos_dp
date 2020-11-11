-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Nov 2020 pada 11.43
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
(3, 'Produksi Pusat', 'produksi1', '6e3bf9569d685dc740285417951b943b2452c2b5', '097123674743', 'Rangkasbitung', 'produksi', 'faskal01'),
(4, 'Ahmad', 'designer1', '8cb2237d0679ca88db6464eac60da96345513964', '089887897874', 'Rangkasbitung', 'setting', 'faskal01'),
(5, 'Owner Faskal', 'owner', '579233b2c479241523cba5e3af55d0f50f2d6414', '089473467254', 'Rangkasbitung', 'owner', 'faskal01'),
(6, 'Badri', 'designer2', '8cb2237d0679ca88db6464eac60da96345513964', '083147827426', 'Rangkasbitung', 'setting', 'faskal02'),
(7, 'Tati', 'kasir2', '8cb2237d0679ca88db6464eac60da96345513964', '0892876728361', 'Rangkasbitung', 'kasir', 'faskal02'),
(8, 'Produksi Cabang', 'produksi2', '6e3bf9569d685dc740285417951b943b2452c2b5', '08777778888', 'Rangkasbitung', 'produksi', 'faskal02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ak_tabel`
--

CREATE TABLE `ak_tabel` (
  `id_ak` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ak_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ak_tabel`
--

INSERT INTO `ak_tabel` (`id_ak`, `nama`, `ak_type`) VALUES
(1111, 'KAS', 'Aset'),
(1112, 'BANK BCA', 'Aset'),
(1113, 'BANK BRI', 'Aset'),
(1114, 'BANK BNI', 'Aset'),
(1115, 'BANK MANDIRI', 'Aset'),
(2111, 'MODAL USAHA', 'Modal'),
(3111, 'PENDAPATAN USAHA', 'Pemasukan'),
(4111, 'BIAYA OPERASIONAL', 'Pengeluaran'),
(4112, 'BIAYA GAJI', 'Pengeluaran'),
(5111, 'PENDAPATAN DITERIMA DIMUKA', 'Hutang'),
(5112, 'HUTANG USAHA', 'Hutang'),
(6111, 'PIUTANG USAHA', 'Piutang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arus_kas`
--

CREATE TABLE `arus_kas` (
  `id_arus_kas` int(50) NOT NULL,
  `tgl_ak` date NOT NULL,
  `id_ak` int(11) NOT NULL,
  `kd_toko` varchar(25) NOT NULL,
  `jenis_trx` varchar(25) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `ket_ak` text NOT NULL,
  `admin_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `arus_kas`
--

INSERT INTO `arus_kas` (`id_arus_kas`, `tgl_ak`, `id_ak`, `kd_toko`, `jenis_trx`, `debit`, `kredit`, `user`, `ket_ak`, `admin_by`) VALUES
(1, '2020-11-08', 1111, 'faskal01', 'CTK', 94500, 0, 0, 'Penjualan', 2),
(2, '2020-11-08', 1111, 'faskal01', 'CTK', 20000, 0, 0, 'Penjualan Kredit', 2),
(3, '2020-11-08', 1111, 'faskal01', 'CTK', 44500, 0, 0, 'Penjualan Kredit', 2),
(5, '2020-11-08', 1112, 'faskal01', 'CTK', 50000, 0, 5, 'Pembayaran Piutang', 2),
(6, '2020-11-09', 1111, 'faskal01', '0', 0, 9000, 0, 'uang makan', 2),
(7, '2020-11-09', 1111, 'faskal01', '0', 10000, 0, 0, 'Bayar hutang', 2),
(8, '2020-11-10', 1111, 'faskal02', 'ATK', 0, 0, 8, 'Penjualan Kredit', 7),
(9, '2020-11-10', 1111, 'faskal02', 'ATK', 51500, 0, 0, 'Penjualan Percetakan', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `bahan_id` varchar(11) NOT NULL,
  `bahan_nama` varchar(255) NOT NULL,
  `bahan_kategori` varchar(50) NOT NULL,
  `bahan_hpp` int(11) NOT NULL,
  `bahan_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`bahan_id`, `bahan_nama`, `bahan_kategori`, `bahan_hpp`, `bahan_jual`) VALUES
('0', 'Belum Disetting', '', 0, 0),
('BHN001', 'FLEXI CHINA 260', 'Meter', 10000, 20000),
('BHN002', 'FLEXI CHINA 340', 'Meter', 20000, 30000),
('BHN003', 'KORCIN', 'Meter', 25000, 35000),
('BHN004', 'VINIL', 'Meter', 55000, 65000),
('BHN005', 'GRAFTACK', 'Meter', 70000, 70000),
('BHN006', 'RITRAMA', 'Meter', 70000, 80000),
('BHN007', 'TRANSPARAN', 'Meter', 60000, 70000),
('BHN008', 'ALBATROS', 'Meter', 50000, 60000),
('BHN009', 'ONE WAY', 'Meter', 50000, 65000),
('BHN010', 'CLOTH', 'Meter', 20000, 35000),
('BHN011', 'CANVAS GOLD', 'Meter', 100000, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_besar`
--

CREATE TABLE `buku_besar` (
  `id_catatan_ak` int(11) NOT NULL,
  `tgl_ak` date NOT NULL,
  `kd_toko` varchar(25) NOT NULL,
  `jenis_trx` varchar(25) NOT NULL,
  `id_ak` int(11) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `ket_ak` int(11) NOT NULL,
  `admin_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_stok`
--

CREATE TABLE `data_stok` (
  `kd_stok` int(15) NOT NULL,
  `kd_produk` varchar(15) NOT NULL,
  `stok_masuk` int(2) NOT NULL,
  `stok_keluar` int(2) NOT NULL,
  `stok` int(15) NOT NULL,
  `date_stok` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_stok`
--

INSERT INTO `data_stok` (`kd_stok`, `kd_produk`, `stok_masuk`, `stok_keluar`, `stok`, `date_stok`) VALUES
(5, 'ATK0001', 1, 0, 90, '2020-10-19 17:04:06'),
(6, 'ATK0001', 1, 0, 20, '2020-10-19 17:51:23'),
(7, 'ATK0001', 0, 1, 5, '2020-10-19 17:51:38'),
(8, 'ATK0002', 1, 0, 100, '2020-11-10 16:45:12');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_display`
--

CREATE TABLE `jenis_display` (
  `jenis_display_id` int(11) NOT NULL,
  `jenis_display_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_display`
--

INSERT INTO `jenis_display` (`jenis_display_id`, `jenis_display_nama`) VALUES
(0, 'Belum Disetting'),
(1, 'Tanpa Display'),
(2, 'Mini Triangle POP Display'),
(3, 'Magnetic Backdrop'),
(4, 'Y Banner'),
(5, 'Tripod Standing Frame'),
(6, 'Roll Up Banner'),
(7, 'Mini X Banner'),
(8, 'X Banner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_finishing`
--

CREATE TABLE `jenis_finishing` (
  `jenis_finishing_id` int(11) NOT NULL,
  `jenis_finishing_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_finishing`
--

INSERT INTO `jenis_finishing` (`jenis_finishing_id`, `jenis_finishing_nama`) VALUES
(0, 'Belum Disetting'),
(1, 'Tanpa Finishing'),
(2, 'Selongsong Atas Bawah'),
(3, 'Selongsong Kiri Kanan'),
(4, 'Mata Ayam Keliling'),
(5, 'Lipat Abis'),
(6, 'Lipat Sisa Putih'),
(7, 'Laminasi'),
(9, 'Potong Pas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `jenis_pembayaran_id` int(11) NOT NULL,
  `jenis_pembayaran_nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`jenis_pembayaran_id`, `jenis_pembayaran_nama`) VALUES
(1, 'Tunai'),
(2, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_potong`
--

CREATE TABLE `jenis_potong` (
  `jenis_potong_id` int(11) NOT NULL,
  `jenis_potong_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_potong`
--

INSERT INTO `jenis_potong` (`jenis_potong_id`, `jenis_potong_nama`) VALUES
(0, 'Belum Disetting'),
(1, 'Tanpa Potong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_atk`
--

CREATE TABLE `kategori_atk` (
  `kd_kategori_atk` int(10) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_atk`
--

INSERT INTO `kategori_atk` (`kd_kategori_atk`, `nama_kategori`) VALUES
(1, 'Ballpoint'),
(2, 'Buku'),
(3, 'Amplop');

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
(0, 'admin', '0', '0', '0', 'faskal01'),
(1, 'joko', '0897282828', 'Lebak', 'joko@gmail.com', 'faskal01'),
(2, '', '88888', '88888', '888', 'faskal01'),
(3, '', '7878', 'kjk', 'kjjkkj', 'faskal01'),
(4, 'wer', '222', '222', 'tytytyt', 'faskal01'),
(5, 'test', '2323', 'fs', 'Sasa@ggg', 'faskal01'),
(6, 'uuu', '888', 'kkk', 'iii@ii', 'faskal01'),
(7, 'uuu', '888', 'kkk', 'iii@ii', 'faskal01'),
(8, '111', '1111', '111', '111', 'faskal02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_harga`
--

CREATE TABLE `level_harga` (
  `id_level_harga` int(11) NOT NULL,
  `level_kd_produk` varchar(25) NOT NULL,
  `nama_level` varchar(25) NOT NULL,
  `harga_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_harga`
--

INSERT INTO `level_harga` (`id_level_harga`, `level_kd_produk`, `nama_level`, `harga_level`) VALUES
(0, '0', '0', 0),
(1, 'ATK0001', 'Standar', 2000),
(2, 'ATK0001', 'Grosir', 1750),
(3, 'ATK0002', 'Standar', 2000),
(4, 'ATK0002', 'Grosir', 1500);

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
  `order_invoice` varchar(25) NOT NULL,
  `order_jenis_produk` varchar(11) NOT NULL,
  `order_produk_id` varchar(11) NOT NULL,
  `order_bahan_id` varchar(11) NOT NULL,
  `jd_id` int(11) NOT NULL,
  `jf_id` int(11) NOT NULL,
  `jp_id` int(11) NOT NULL,
  `order_keterangan` text NOT NULL,
  `lokasi_file` text NOT NULL,
  `order_qty` decimal(10,2) NOT NULL,
  `order_harga_satuan` int(11) NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `order_harga_sub_total` int(11) NOT NULL,
  `order_datetime` date NOT NULL,
  `admin1` int(11) NOT NULL,
  `admin2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`order_id`, `kd_toko`, `order_invoice`, `order_jenis_produk`, `order_produk_id`, `order_bahan_id`, `jd_id`, `jf_id`, `jp_id`, `order_keterangan`, `lokasi_file`, `order_qty`, `order_harga_satuan`, `biaya_tambahan`, `order_harga_sub_total`, `order_datetime`, `admin1`, `admin2`) VALUES
(1, 'faskal01', 'INV000000001', 'CTK', 'CTK002', 'BHN002', 1, 2, 1, '1 x 1,4 Meter', 'PC 4 folder a aa.png', '1.40', 30000, 3000, 45000, '2020-11-01', 4, 3),
(3, 'faskal01', 'INV000000001', 'CTK', 'CTK002', 'BHN001', 1, 1, 1, '2 x 2,3 Meter', 'Pc 4 folder a bb.png', '4.60', 20000, 15000, 107000, '2020-11-01', 4, 3),
(4, 'faskal01', 'INV000000001', 'CTK', 'CTK002', 'BHN002', 1, 1, 1, '2 x 3 Meter', 'pc 4 folder a cc.cdr', '6.00', 30000, 20000, 200000, '2020-11-01', 4, 3),
(5, 'faskal01', 'INV000000002', 'CTK', 'CTK002', '0', 0, 0, 0, '1', '', '0.00', 0, 0, 0, '2020-11-01', 0, 0),
(7, 'faskal01', 'INV000000003', 'CTK', 'CTK002', 'BHN001', 1, 1, 1, '1 x 4 Meter', 'Pc 4 ', '4.00', 20000, 20000, 100000, '2020-11-02', 4, 3),
(8, 'faskal02', 'INV000000004', 'CTK', '', '0', 0, 0, 0, '', '', '0.00', 0, 0, 0, '2020-11-10', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan_atk`
--

CREATE TABLE `orderan_atk` (
  `order_atk_id` int(11) NOT NULL,
  `kd_toko` varchar(25) NOT NULL,
  `order_atk_inv` varchar(25) NOT NULL,
  `kd_produk` varchar(25) NOT NULL,
  `id_level_harga` int(11) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_harga_subtotal` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderan_atk`
--

INSERT INTO `orderan_atk` (`order_atk_id`, `kd_toko`, `order_atk_inv`, `kd_produk`, `id_level_harga`, `order_qty`, `order_harga_subtotal`, `order_date`) VALUES
(3, 'faskal02', 'INV000000004', 'ATK0001', 1, 10, 20000, '2020-11-10 17:58:45'),
(4, 'faskal02', 'INV000000004', 'ATK0002', 4, 21, 31500, '2020-11-10 17:58:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` varchar(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`) VALUES
('CTK001', 'KARTU NAMA'),
('CTK002', 'BANNER / SPANDUK'),
('CTK003', 'UMBUL - UMBUL'),
('CTK004', 'ONE WAY'),
('CTK005', 'BALIHO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_atk`
--

CREATE TABLE `produk_atk` (
  `kd_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `kd_kategori_atk` int(11) NOT NULL,
  `produk_harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_atk`
--

INSERT INTO `produk_atk` (`kd_produk`, `nama_produk`, `kd_kategori_atk`, `produk_harga`) VALUES
('ATK0001', 'Ballpoint Standard AE-7', 1, 1500),
('ATK0002', 'Amplop Coklat', 3, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_atk_jual`
--

CREATE TABLE `produk_atk_jual` (
  `id_atk_jual` int(11) NOT NULL,
  `kd_produk` varchar(15) NOT NULL,
  `kd_satuan` int(11) NOT NULL,
  `min_qty` int(11) NOT NULL,
  `harga_jual_produk` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_atk_jual`
--

INSERT INTO `produk_atk_jual` (`id_atk_jual`, `kd_produk`, `kd_satuan`, `min_qty`, `harga_jual_produk`) VALUES
(4, 'ATK0001', 0, 0, 0),
(5, 'ATK0001', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_atk`
--

CREATE TABLE `satuan_atk` (
  `kd_satuan` int(10) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan_atk`
--

INSERT INTO `satuan_atk` (`kd_satuan`, `nama_satuan`) VALUES
(1, 'Pcs'),
(3, 'Lusin'),
(5, 'Gram'),
(6, 'Liter'),
(7, 'Kg'),
(8, 'Dus'),
(9, 'Pack'),
(11, 'Karton'),
(12, 'Box');

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
  `no_tlp` varchar(25) NOT NULL,
  `alamat_toko` text NOT NULL,
  `ket_toko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `kd_toko`, `nama_toko`, `no_tlp`, `alamat_toko`, `ket_toko`) VALUES
(1, 'faskal01', 'Faskal Pusat', '087741659464', 'Jl. Soekarno Hatta Rangkasbitung Kabupaten Lebak', 'Faskal Pusat'),
(2, 'faskal02', 'Faskal Cabang', '087890055118', 'Jl. RA. Kartini', 'Faskal Cabang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `trx_invoice` varchar(25) NOT NULL,
  `kd_toko` varchar(11) NOT NULL,
  `trx_date` date NOT NULL,
  `jenis_barang` varchar(11) NOT NULL,
  `trx_diskon` int(11) NOT NULL,
  `trx_dp` int(11) NOT NULL,
  `trx_lunas` int(11) NOT NULL,
  `trx_pajak` int(11) NOT NULL,
  `trx_customer` int(11) NOT NULL,
  `trx_ar` int(11) NOT NULL,
  `trx_total_pembayaran` int(11) NOT NULL,
  `trx_jenis_pembayaran` int(11) NOT NULL,
  `trx_status` int(11) NOT NULL,
  `trx_admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `trx_invoice`, `kd_toko`, `trx_date`, `jenis_barang`, `trx_diskon`, `trx_dp`, `trx_lunas`, `trx_pajak`, `trx_customer`, `trx_ar`, `trx_total_pembayaran`, `trx_jenis_pembayaran`, `trx_status`, `trx_admin_id`) VALUES
(1, 'INV000000001', 'faskal01', '2020-11-01', 'CTK', 32000, 0, 320000, 0, 1, 0, 352000, 2, 2, 2),
(2, 'INV000000002', 'faskal01', '2020-11-01', 'CTK', 0, 0, 0, 0, 0, 0, 0, 0, 9, 2),
(5, 'INV000000003', 'faskal01', '2020-11-02', 'CTK', 10000, 0, 94500, 5, 5, 0, 100000, 2, 2, 2),
(6, 'INV000000004', 'faskal02', '2020-11-10', 'ATK', 0, 0, 51500, 0, 0, 0, 51500, 1, 1, 7);

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
(6, 'gudang', 'Gudang ATK'),
(7, 'cs', 'Costumer Service');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ak_tabel`
--
ALTER TABLE `ak_tabel`
  ADD PRIMARY KEY (`id_ak`);

--
-- Indeks untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  ADD PRIMARY KEY (`id_arus_kas`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`bahan_id`);

--
-- Indeks untuk tabel `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`id_catatan_ak`);

--
-- Indeks untuk tabel `data_stok`
--
ALTER TABLE `data_stok`
  ADD PRIMARY KEY (`kd_stok`);

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
-- Indeks untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`jenis_pembayaran_id`);

--
-- Indeks untuk tabel `jenis_potong`
--
ALTER TABLE `jenis_potong`
  ADD PRIMARY KEY (`jenis_potong_id`);

--
-- Indeks untuk tabel `kategori_atk`
--
ALTER TABLE `kategori_atk`
  ADD PRIMARY KEY (`kd_kategori_atk`);

--
-- Indeks untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`kostumer_id`);

--
-- Indeks untuk tabel `level_harga`
--
ALTER TABLE `level_harga`
  ADD PRIMARY KEY (`id_level_harga`);

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
-- Indeks untuk tabel `orderan_atk`
--
ALTER TABLE `orderan_atk`
  ADD PRIMARY KEY (`order_atk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indeks untuk tabel `produk_atk`
--
ALTER TABLE `produk_atk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indeks untuk tabel `produk_atk_jual`
--
ALTER TABLE `produk_atk_jual`
  ADD PRIMARY KEY (`id_atk_jual`);

--
-- Indeks untuk tabel `satuan_atk`
--
ALTER TABLE `satuan_atk`
  ADD PRIMARY KEY (`kd_satuan`);

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
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `arus_kas`
--
ALTER TABLE `arus_kas`
  MODIFY `id_arus_kas` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `id_catatan_ak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_stok`
--
ALTER TABLE `data_stok`
  MODIFY `kd_stok` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `jenis_display_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_finishing`
--
ALTER TABLE `jenis_finishing`
  MODIFY `jenis_finishing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `jenis_pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_potong`
--
ALTER TABLE `jenis_potong`
  MODIFY `jenis_potong_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_atk`
--
ALTER TABLE `kategori_atk`
  MODIFY `kd_kategori_atk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `kostumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `level_harga`
--
ALTER TABLE `level_harga`
  MODIFY `id_level_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mesin`
--
ALTER TABLE `mesin`
  MODIFY `mesin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orderan_atk`
--
ALTER TABLE `orderan_atk`
  MODIFY `order_atk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_atk_jual`
--
ALTER TABLE `produk_atk_jual`
  MODIFY `id_atk_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `satuan_atk`
--
ALTER TABLE `satuan_atk`
  MODIFY `kd_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
