-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 12:37 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokobale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notelpon` varchar(15) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `namalengkap`, `email`, `notelpon`, `level`) VALUES
(14, 'admin', '$2y$10$.7MOShCjq/miCl01svEtuehpQIlr9tDNGlhaq6Cp/bnO7vmnqn0K2', 'febby febriana', 'febbyfebriana1998@gmail.com', '082812342112', 'admin'),
(15, 'hanjani', '$2y$10$KW.wav4eGf4cJojL1QuiMOYpGUwXN1/xBCQjBB2.o0ZvEdQNPfOrO', 'Hanjani', 'tiwi@gmail.com', '082812342111', 'pegawai'),
(16, 'artiyanti', '$2y$10$v.89bVjXzMG1GiLGzkk7L.TY5xWDSnY7TPrOSYw5sVJJbsSX2ciHO', 'Artiyanti', 'yanti@gmail.com', '083812343212', 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `kode_bank` int(11) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `namabank` varchar(50) NOT NULL,
  `atasnama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`kode_bank`, `norek`, `namabank`, `atasnama`) VALUES
(7, '70012345122', 'BRI SYARIAH', 'Hanjani ');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `namakategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `namakategori`) VALUES
(8, 'Aksesoris'),
(9, 'Baju'),
(10, 'Celana'),
(11, 'Perlengkapan Bayi'),
(12, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `kode_bank` int(11) NOT NULL,
  `nama_penggirim` varchar(50) NOT NULL,
  `rek_pengirim` varchar(50) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_order`, `kodepelanggan`, `kode_bank`, `nama_penggirim`, `rek_pengirim`, `tgl_konfirmasi`, `bukti_transfer`) VALUES
(1, 1, 12, 7, 'febby', '0834567890', '2019-07-24', 'Baju2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkir`) VALUES
(1, 'Aceh', 46000),
(3, 'Jakarta', 23000),
(4, 'Solo', 37000);

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `kurir_id` int(11) NOT NULL,
  `kurir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurirs`
--

INSERT INTO `kurirs` (`kurir_id`, `kurir`) VALUES
(1, 'JNE'),
(2, 'JNT'),
(4, 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `tgl_order` date NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status_order` varchar(20) NOT NULL DEFAULT 'Belum Dibayar',
  `status_konfirmasi` varchar(20) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `status_terima` varchar(20) NOT NULL DEFAULT 'Belum Diterima',
  `kurir_id` int(11) NOT NULL,
  `resi` varchar(30) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `kodepelanggan`, `tgl_order`, `alamat_pengirim`, `id_kota`, `status_order`, `status_konfirmasi`, `status_terima`, `kurir_id`, `resi`, `ongkir`) VALUES
(1, 12, '2019-07-24', 'serah', 4, 'Sudah Dibayar', 'Menunggu Konfirmasi', 'Belum Diterima', 1, NULL, 29600);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE `orders_temp` (
  `id_order_temp` int(11) NOT NULL,
  `kodepelanggan` int(11) DEFAULT NULL,
  `kodeproduk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `tgl_order` date NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `kodeproduk` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `kodeproduk`, `size`, `jumlah`, `harga_satuan`, `total`) VALUES
(1, 1, 33, '21', 2, 125000, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kodepelanggan` int(5) NOT NULL,
  `namapelanggan` varchar(20) NOT NULL,
  `jeniskelamin` varchar(12) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tanggaldaftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kodepelanggan`, `namapelanggan`, `jeniskelamin`, `tempatlahir`, `tgllahir`, `alamat`, `id_kota`, `nohp`, `email`, `username`, `password`, `tanggaldaftar`) VALUES
(10, 'Chanyeol', 'laki-laki', 'Kuala Enok', '1995-10-10', 'thehok', 0, '081345231452', 'yeol@gmail.com', 'yeol', '$2y$10$vnZ7ADYmVJpp3', '2019-07-16'),
(12, 'marijan', 'laki-laki', 'goa', '1990-12-02', 'serah', 3, '099999999999', 'ramdanriawan3@gmail.com', 'ramdanriawan3', '$2y$10$S1ceKWtuFLNLEAT0VlVgJORLXExvf.m77d7iy/GOYV9HxN2NpWOu.', '0090-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kodeproduk` int(11) NOT NULL,
  `kd_subkategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` float NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) DEFAULT NULL,
  `ukuran` varchar(200) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `tgl_masuk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kodeproduk`, `kd_subkategori`, `nama_produk`, `deskripsi`, `harga_produk`, `stok`, `berat`, `foto1`, `foto2`, `ukuran`, `diskon`, `tgl_masuk`) VALUES
(20, 14, 'Celana Levis', 'Nyaman, Lembut																								', 140000, 4, 0.8, 'CLE1.jpg', '', 'S,M,L,XL', 20, '2019-07-09 00:00:00'),
(21, 14, 'Celana Pendek Import', 'Nyaman, Lembut, dan keren', 125, 5, 0.8, 'CLO5.jpg', '', 'S,M,L,XL', 0, '2019-07-09 00:00:00'),
(22, 10, 'Baju Kemeja Cowok', 'Baju kemeja anak cowok ini sangat nyaman digunakan bagi anak anak ', 90, 3, 0.8, 'BJCO6.jpg', '', 'S,M,L,XL', 0, '2019-07-09 00:00:00'),
(30, 1, 'Topi kupluk', 'Nyaman', 85000, 2, 0.8, 'TP2.jpg', '', 'S,M,L,XL', 0, '2019-07-09 00:00:00'),
(32, 8, 'Sepatu Cowok', 'Nyamana', 115000, 5, 0.8, 'CO6.jpg', '', '21,22,23,24', 0, '2019-07-10 00:00:00'),
(33, 8, 'Sepatu Cowok', 'Nyaman', 125000, 6, 0.8, 'CO8.jpg', '', '21,22,23,24', 0, '2019-07-10 00:00:00'),
(34, 12, 'Baju Atasan Cewek', 'Nyaman', 140000, 12, 0.8, 'BJCE1.jpg', '', 'S,M,L,XL', 20, '2019-07-10 00:00:00'),
(37, 14, 'Celana Cowok', 'Nyaman		', 150000, 6, 0.8, 'CLO1.jpg', 'CLO5.jpg', 'S,M,L,XL', 0, '0000-00-00 00:00:00'),
(38, 1, 'Baju Tidur Anak Perempuan', 'sdfcgvhbjnkml', 345678, 6, 0.8, 'Baju2.jpg', '', 'S,M,L,XL', 0, '2019-07-10 00:00:00'),
(39, 11, 'Baju Cowok', 'Bagus', 1200000, 3, 0.5, 'baju9.jpg', 'baju10.jpg', 'S,M,L,XL', 0, '2019-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE `resi` (
  `resi_id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `kd_subkategori` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_subkategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`kd_subkategori`, `id_kategori`, `nama_subkategori`) VALUES
(1, 8, 'Topi'),
(3, 11, 'Carseat'),
(4, 11, 'Stroller'),
(7, 12, 'Sepatu Cewek'),
(8, 12, 'Sepatu Cowok'),
(9, 9, 'Baju Bayi'),
(10, 9, 'Baju Atasan Cowok'),
(11, 9, 'Baju Setelan Cowok'),
(12, 9, 'baju Atasan Cewek'),
(13, 9, 'Baju Setelan Cewek'),
(14, 10, 'Celana Cowok'),
(15, 10, 'Celana Cewek');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `kodepelanggan` int(11) NOT NULL,
  `kodeproduk` int(11) NOT NULL,
  `isi_ulasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kode_bank`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `kodepelanggan` (`kodepelanggan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
  ADD PRIMARY KEY (`id_order_temp`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kodepelanggan`),
  ADD KEY `id_kota` (`id_kota`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kodeproduk`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`resi_id`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`kd_subkategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `kode_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_order_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kodepelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kodeproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
  MODIFY `resi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `kd_subkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `konfirmasi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasi_ibfk_2` FOREIGN KEY (`kodepelanggan`) REFERENCES `pelanggan` (`kodepelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD CONSTRAINT `sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
