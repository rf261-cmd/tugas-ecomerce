-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2024 pada 16.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian`
--

CREATE TABLE `bagian` (
  `kd_bagian` varchar(15) NOT NULL,
  `nama_bagian` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bagian`
--

INSERT INTO `bagian` (`kd_bagian`, `nama_bagian`) VALUES
('Aksesori', 'Aksesoris'),
('Aksesoris', 'Aksesoris'),
('atribut', 'atribut'),
('Baju', 'Baju'),
('Celana', 'Celana'),
('F', 'finance'),
('gd', 'gudang'),
('HR', 'HRD'),
('Kaos', 'Kaos'),
('prod', 'produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `file` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `file`) VALUES
(1, '4.jpg'),
(7, 'SHARIHARI.txt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `kd_bagian` varchar(8) DEFAULT NULL,
  `gaji_bersih` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `nip`, `kd_bagian`, `gaji_bersih`, `gambar`, `Deskripsi`, `status`) VALUES
(168, '112', 'Baju', 100000, 'gambar1.jpg', 'workshhirt sz.L kondisi 80%', 'ready'),
(1686, '121', 'Celana', 400000, 'gambar2.jpg', 'sepatu nike sz.43\r\nkondisi 90%', 'sold'),
(1687, '161', 'atribut', 80000, 'gambar3.jpg', 'topi Branded\r\nkondisi 80%', 'ready'),
(7771, '12345678', 'Baju', 200000, 'gambar4.jpg', 'Jaket import Size XL ,kondisi :90%', 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `kd_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok_bahan` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `kd_bagian` varchar(8) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(11) NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `kd_bagian` varchar(8) NOT NULL,
  `status` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama_pegawai`, `password`, `kd_bagian`, `status`, `alamat`, `tgl_lahir`, `jekel`, `telepon`, `agama`, `foto`) VALUES
('112', 'atiz', '1', 'prod', 'Karyawan Tetap', 'puri', '2014-03-04', 'Laki-laki', '081234567890', 'Islam', ''),
('121', 'chiesa', '1', 'HR', 'Karyawan Tetap', 'medono gg.7', '2014-04-02', 'Laki-laki', '082345678901', 'Kristen', ''),
('12345678', 'abdul dul', '12345', 'gd', 'aktif', 'landung sari', '2004-03-25', 'laki - laki', '085566227711', 'islam', ''),
('161', 'Rafi', '1', 'F', 'Karyawan Tetap', 'Buaran Gg.1 Pekalongan', '2000-06-04', 'Laki-laki', '087756421311', 'Islam', ''),
('jese pinkma', 'jese', '1', 'Aksesori', 'ready', 'jonggol', '2024-10-02', 'Laki-laki', '082345678901', 'Islam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `kode_supplier` varchar(10) DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `kode_bahan` varchar(10) DEFAULT NULL,
  `nama_bahan` varchar(100) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `kode_produksi` varchar(11) NOT NULL,
  `kode_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `kd_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `stok_bahan` int(10) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `nama_pegawai` varchar(60) NOT NULL,
  `kd_bagian` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `telepon_supplier` varchar(15) DEFAULT NULL,
  `email_supplier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_keuangan`
--

CREATE TABLE `transaksi_keuangan` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis_transaksi` enum('pemasukan','pengeluaran') DEFAULT NULL,
  `jumlah` decimal(10,2) DEFAULT NULL,
  `nip` varchar(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `is_clicked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_keuangan`
--

INSERT INTO `transaksi_keuangan` (`id_transaksi`, `tanggal_transaksi`, `keterangan`, `jenis_transaksi`, `jumlah`, `nip`, `status`, `is_clicked`) VALUES
(1212, '2024-03-05', 'beli rokok 1 slop', 'pengeluaran', 150000.00, '112', 'Disetujui', 1),
(2311, '2024-03-05', 'tf bca a.n pt mejiku', 'pemasukan', 1500000.00, '12345678', 'Disetujui', 1),
(2312, '2024-03-12', 'beli mesin', 'pengeluaran', 200000.00, '12345678', 'Disetujui', 1),
(2318, '2024-05-29', 'perawatan alat', 'pengeluaran', 200000.00, '112', 'Ditolak', 1),
(2319, '2024-05-29', 'pembelian bahan baku', 'pengeluaran', 25000.00, '112', 'pending', 0),
(3411, '2024-10-17', 'berhasikl', 'pemasukan', 150000.00, 'jese pinkma', 'Disetujui', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `pass_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email_user`, `pass_user`) VALUES
(1, 'ahmad', 'priambodo', 'priambodo@gmail.com', '1'),
(2, 'rafi', 'atiz', 'rafi@gmail.com', '1'),
(3, 'uus', 'mania', 'uus@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`kd_bagian`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gaji` (`nip`),
  ADD KEY `nb` (`kd_bagian`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`kd_bahan`),
  ADD KEY `kd_bagian` (`kd_bagian`,`nip`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_bagian` (`kd_bagian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `kode_supplier` (`kode_supplier`),
  ADD KEY `kode_bahan` (`kode_bahan`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`),
  ADD KEY `kd_bahan` (`kd_bahan`,`nip`,`kd_bagian`),
  ADD KEY `nip` (`nip`),
  ADD KEY `kd_bagian` (`kd_bagian`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7772;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3412;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nb` FOREIGN KEY (`kd_bagian`) REFERENCES `bagian` (`kd_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`kd_bagian`) REFERENCES `bagian` (`kd_bagian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `gudang_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`kd_bagian`) REFERENCES `bagian` (`kd_bagian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`kode_bahan`) REFERENCES `gudang` (`kd_bahan`);

--
-- Ketidakleluasaan untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `produksi_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produksi_ibfk_2` FOREIGN KEY (`kd_bagian`) REFERENCES `bagian` (`kd_bagian`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produksi_ibfk_3` FOREIGN KEY (`kd_bahan`) REFERENCES `gudang` (`kd_bahan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi_keuangan`
--
ALTER TABLE `transaksi_keuangan`
  ADD CONSTRAINT `transaksi_keuangan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
