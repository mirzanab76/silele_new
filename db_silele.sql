-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220519.9fafdbd082
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 14.04
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_silele`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(225) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(225) NOT NULL DEFAULT 'order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `id_pelanggan`, `tanggal`, `status`) VALUES
(46, '16zlZ7c5GD6LI', 134, '2022-05-19 11:47:26', 'Selesai'),
(47, '16jY8PumRWXjI', 134, '2022-05-19 11:48:09', 'Pembatalan'),
(48, '161WIBlaHorGo', 134, '2022-05-21 08:38:17', 'Selesai'),
(49, '16Ph5wCNSy6Q2', 134, '2022-05-21 16:21:53', 'Pembatalan'),
(50, '16j8uaSNomaUM', 133, '2022-05-21 08:39:29', 'Selesai'),
(51, '16vz6xY7/NycM', 133, '2022-05-21 08:39:33', 'Selesai'),
(56, '16Blam3.4jFa.', 134, '2022-05-24 15:14:52', 'Selesai'),
(57, '16iJymbMmDZkY', 134, '2022-05-24 15:08:18', 'Pembatalan'),
(58, '16XQzBaQXlApg', 134, '2022-05-24 15:13:22', 'Pengiriman'),
(59, '16vwQdHe44LtY', 134, '2022-05-24 14:59:43', 'membayar'),
(60, '161NI3UhH8RZ.', 134, '2022-05-24 15:00:32', 'bayar'),
(61, '161NI3UhH8RZ.', 134, '2022-05-30 08:51:47', 'bayar'),
(62, '162CQ85qzfqrA', 134, '2022-06-15 15:37:42', 'bayar'),
(63, '16gUQPEJO93Mw', 1, '2022-05-30 11:26:29', 'order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `id_detail` int(25) NOT NULL,
  `orderid` varchar(225) NOT NULL,
  `id_produk` int(225) NOT NULL,
  `qty` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`id_detail`, `orderid`, `id_produk`, `qty`) VALUES
(124, '16zlZ7c5GD6LI', 7, 1),
(126, '16jY8PumRWXjI', 9, 1),
(128, '161WIBlaHorGo', 7, 1),
(130, '16Ph5wCNSy6Q2', 1, 1),
(132, '16j8uaSNomaUM', 7, 1),
(134, '16vz6xY7/NycM', 1, 4),
(144, '16Blam3.4jFa.', 1, 6),
(145, '16Blam3.4jFa.', 7, 4),
(146, '16Blam3.4jFa.', 9, 1),
(147, '16Blam3.4jFa.', 10, 1),
(149, '16iJymbMmDZkY', 1, 1),
(151, '16XQzBaQXlApg', 1, 1),
(153, '16vwQdHe44LtY', 1, 2),
(155, '161NI3UhH8RZ.', 1, 2),
(157, '161NI3UhH8RZ.', 7, 1),
(159, '162CQ85qzfqrA', 1, 2),
(161, '16gUQPEJO93Mw', 7, 1),
(162, '162CQ85qzfqrA', 9, 1),
(163, '162CQ85qzfqrA', 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'Ajung'),
(2, 'Ambulu'),
(3, 'Arjasa\r\n'),
(4, 'Bangsalsari\r\n'),
(5, 'Balung\r\n'),
(6, 'Gumukmas\r\n'),
(7, 'Jelbuk\r\n\r\n'),
(8, 'Jenggawah\r\n'),
(9, 'Jombang\r\n'),
(10, 'Kalisat\r\n'),
(11, 'Kaliwates\r\n'),
(12, 'Kencong\r\n'),
(13, 'Ledokombo\r\n'),
(14, 'Mayang\r\n'),
(15, 'Mumbulsari\r\n'),
(16, 'Panti\r\n'),
(17, 'Pakusari\r\n'),
(18, 'Patrang\r\n'),
(19, 'Puger\r\n'),
(20, 'Rambipuji\r\n'),
(21, 'Semboro\r\n'),
(22, 'Silo\r\n'),
(23, 'Sukorambi\r\n'),
(24, 'Sukowono\r\n'),
(25, 'Sumberbaru\r\n'),
(26, 'Sumberjambe\r\n'),
(27, 'Sumbersari\r\n'),
(28, 'Tanggul\r\n'),
(29, 'Tempurejo\r\n'),
(30, 'Umbulsari\r\n'),
(31, 'Wuluhan\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `orderid` varchar(225) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `payment` varchar(225) NOT NULL,
  `namarekening` varchar(225) NOT NULL,
  `tglbayar` date NOT NULL,
  `tglsubmit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`idkonfirmasi`, `orderid`, `id_pelanggan`, `payment`, `namarekening`, `tglbayar`, `tglsubmit`, `gambar`) VALUES
(1, '1692Nd7uLcChk', 134, 'BCA', 'andre', '2022-05-16', '2022-05-16 11:39:55', ''),
(23, '16vwQdHe44LtY', 134, 'BCA', 'Mirzan', '0000-00-00', '2022-05-24 14:59:43', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `id_metode` int(11) NOT NULL,
  `metode` varchar(225) NOT NULL,
  `norek` int(11) NOT NULL,
  `atas_nama` varchar(225) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_bayar`
--

INSERT INTO `metode_bayar` (`id_metode`, `metode`, `norek`, `atas_nama`, `gambar`) VALUES
(5, 'BCA', 3534546, 'INDRA NUR', '673-9JTUSJN4KZA9BLY33RBXQS5JKMVCUV78D6UQF4W2-5a68ac59.png'),
(6, 'DANA', 876786889, 'INDRA', '845-dana-meta-logo.png'),
(7, 'COD', 0, '', '240-download.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto_profil` longblob NOT NULL,
  `isi_kecamatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `no_telp`, `username`, `password`, `foto_profil`, `isi_kecamatan`) VALUES
(133, 'Indraa', 'siwalan panji', '0897646528763', 'indra', 'indra', 0x3737302d3637616c464f6d2e706e67, 2),
(134, 'andre', 'siwalan panji', '0897646528763', 'andre', 'andre', 0x3830312d313831343331332e6a7067, 1),
(136, 'indraa', 'rt02/rw01 jember', '0897646528763', 'indra12', 'indra12', 0x3531302d3039303035373130305f313530383134313930352d67616d6261726f72616e672e6a7067, 4),
(137, 'anggun', 'siwalan panji', '0897646528763', 'anggun', 'anggun', 0x3237332d3039303035373130305f313530383134313930352d67616d6261726f72616e672e6a7067, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `nama_pengeluaran` varchar(225) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `keterangan`, `tanggal`, `nominal`) VALUES
(14, 'bibit lele', '1500 ekor', '2022-04-30', 150000),
(16, 'bibt lele', '1000 ekor', '2022-05-16', 100000),
(17, 'bibt lele', 'modal', '2022-05-21', 10000),
(18, 'bibit', 'tes', '2022-05-23', 2111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `stok`, `harga`, `foto_produk`) VALUES
(1, 'lele', 'lele goreng dengan kualitas terbaik', 78, 10000, '491-lele_goreng.png'),
(7, 'lele hidup', 'lele terbaik', 83, 7000, '525-lele_segar.png'),
(9, 'lele matang', 'lele matang dengan tambahan sambal', 86, 10000, '686-lele_lengkap.png'),
(10, 'lele mentah', 'enak', -5, 10000, '503-lele_bersih.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', 'admin', 'Indraa', 'indranurcahyo03@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`),
  ADD KEY `orderid` (`orderid`) USING BTREE;

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`idkonfirmasi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `isi_kecamatan` (`isi_kecamatan`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `id_detail` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD CONSTRAINT `id_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `cart` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD CONSTRAINT `pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`isi_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
