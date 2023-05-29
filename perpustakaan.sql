-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Apr 2021 pada 08.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `NIS` int(11) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk_anggota` enum('L','P') NOT NULL,
  `tlp_anggota` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `img_anggota` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `NIS`, `nama_anggota`, `alamat`, `jk_anggota`, `tlp_anggota`, `kelas`, `img_anggota`, `username`, `password`, `password2`, `level`, `status`) VALUES
(31, 81932121, 'Virna', 'bandung', 'P', '09432843412', 'x mia 3', 'default.png', 'virna', '$2y$10$0oI0oM2OV3zB5FrpPVAHe.wJ28NOLzVgTp6TQmu4IIV', 'virna', 'anggota', 'active'),
(32, 453467667, 'Haris Januar', 'Cileunyi', 'L', '085878827382', 'X MIA 3', 'default.png', 'haris', '$2y$10$XwI4VvSGWZvaUa/moJcc3uoat1YGAnj3Na6wJ.zlEbN', 'haris', 'anggota', 'active'),
(33, 2147483647, 'Citra', 'Tanjungsari', 'P', '085603300690', 'XI IIS 1', 'default.png', 'citra', '$2y$10$BrlgQ225Fmh0WDdq3J1KhOjrZqXB80UHqJoIfmfwREC', 'citra', 'anggota', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `stok` int(4) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  `rak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `ISBN`, `judul`, `kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`, `deskripsi`, `img`, `rak`) VALUES
(68, '978-602-374-2', 'BUKU FISIKA UNTUK SISWA SMA/MA KELAS X PEMINATAN KURIKULUM 2013', 'IPA', 'NUNUNG NURHAYATI', 'Yrama Widya', 2015, 5, 'Buku Fisika SMA/MA Kelas X Peminatan ini merupakan buku yang disesuaikan dengan Kurikulum terbaru yang memberikan banyak kemudahan bagi siswa.', 'Buku-Siswa-Fisika-Kelas-X-Peminatan.jpg', 'A01'),
(69, '9786024271220', 'Sejarah Indonesia SMA Kelas X', 'Sejarah', 'Restu Gunawan, Amurwani Dwi Lestariningsih, dan Sardiman', 'Pusat Kurikulum dan Perbukuan Kemendikbud', 2017, 100, 'Dalam K 13 ini diharapkan siswa tidak hanya menghafal, tetapi juga mampu melakukan penulisan dan mendiskripsikan setiap peristiwa sejarah yang terjadi. Selain itu, siswa diharapkan dapat mengaitkan be', 'bse-a_5a1f70d2c3999244384824.jpg', 'S02'),
(70, '978-602-374-3', 'Biologi untuk SMA/MA Kelas X Peminatan Kurikulum 2013', 'IPA', 'SUNARDI, DKK', 'Yrama Widya', 2014, 22, 'buku biologi', 'Biologi-peminatan-X.jpg', 'A01'),
(71, '3894729', 'Bahasa Indonesia kelas X', 'Bahasa', 'Kemendikbud', 'Kemendikbud', 2017, 20, 'Buku Bahasa Indonesia untuk kelas 10', 'bse-a_5c3d64ab6114c066460566.jpg', 'B02'),
(72, '283729', 'seni budaya', 'Seni', 'NUNUNG NURHAYATI', 'Yrama Widya', 2015, 9, 'buku seni budaya', 'a51776d0d757391f02fa94819fa17f8d.png', 'S03'),
(73, '978-602-374-3', 'DASAR-DASAR BIOKIMIA', 'IPA', 'Anna Poedjiadi', 'UI Press', 2005, 2, 'Buku pembelajaran ini berisi materi-materi biokimia, fungsi organ tubuh yang berhubungan dengan proses kimia, metabolisme, rekayasa genetika, gizi dan kesehatan. ', 'a-biokimia.jpg', 'A01'),
(74, '9786024271220', 'Matematika kelas XI', 'Matematika', 'Andri Kristianto Sitanggang, S.Pd.,M.Pd , DKK', 'BSE', 2017, 27, 'Buku ini diawali dengan pengajuan masalah yang bersumber dari fakta dan lingkungan budaya siswa terkait dengan materi yang akan diajarkan.', 'bse-a_59fbf26ceec46353426911.jpg', 'B02'),
(75, '9786022995708', 'Ekonomi SMA Kelas X', 'IPS', 'Endang Mulyadi, DKK', 'Yudhistira', 2020, 19, 'Sebagai salah satu media pembelajaran bagi siswa, buku seri Ekonomi untuk tingkat SMA/MA ini dapat dijadikan salah satu bahan ajar mata pelajaran Ekonomi di sekolah.', 'Ekonomi-1-Hvs.jpg', 'E01'),
(76, '9786022995708', 'Ensiklopedi Sejarah Islam', 'Sejarah', 'Dr Raghib As-Sirjani', 'Pustaka Al-Kautsar', 2019, 3, 'Ensiklopedi sejarah islam', '5_1P3JD91.jpg', 'S03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `terlambat` int(2) DEFAULT NULL,
  `denda` int(6) DEFAULT NULL,
  `total_buku` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kembali`
--

INSERT INTO `kembali` (`id_kembali`, `id_pinjam`, `id_buku`, `id_anggota`, `tgl_dikembalikan`, `terlambat`, `denda`, `total_buku`) VALUES
(36, 48, 0, 31, '2021-04-17', 18734, 9367104, 0),
(38, 49, 69, 33, '2021-04-24', 7, 3500, 1),
(39, 48, 68, 31, '2021-04-24', 0, 0, 1),
(40, 52, 73, 31, '2021-03-18', 1, 500, 1),
(41, 53, 76, 31, '2021-01-11', 4, 2000, 1);

--
-- Trigger `kembali`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER INSERT ON `kembali` FOR EACH ROW BEGIN
UPDATE buku SET stok=stok+NEW.total_buku
WHERE id_buku=NEW.id_buku;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `img_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `jenis_kelamin`, `alamat`, `no_tlp`, `img_petugas`, `username`, `password`, `password2`, `level`, `status`) VALUES
(1, 'admin', 'P', 'Tanjungsari', '08954666', 'default.png', 'admin', '$2y$10$5xhQ5y96ucBCxhw0PKpepeLcW8/Qrc6gyFQMfxVpwpK', 'admin', 'admin', 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status_pinjam` int(1) NOT NULL,
  `total_buku` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status_pinjam`, `total_buku`) VALUES
(47, 32, 72, '2021-03-12', '2021-03-25', 1, 1),
(48, 31, 68, '2021-04-16', '2021-04-24', 0, 1),
(49, 33, 69, '2021-04-10', '2021-04-17', 1, 1),
(50, 31, 74, '2021-04-08', '2021-05-08', 1, 1),
(51, 31, 70, '2021-04-24', '2021-05-01', 1, 1),
(52, 31, 73, '2021-03-10', '2021-03-17', 0, 1),
(53, 31, 76, '2021-01-06', '2021-01-07', 0, 1),
(54, 31, 71, '2021-04-09', '2021-04-16', 1, 1),
(56, 31, 70, '2021-04-20', '2021-04-27', 1, 1);

--
-- Trigger `pinjam`
--
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
UPDATE buku SET stok=stok-NEW.total_buku
WHERE id_buku=NEW.id_buku;
    END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`id_kembali`,`id_buku`,`id_anggota`,`id_pinjam`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`,`id_anggota`,`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `kembali`
--
ALTER TABLE `kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
