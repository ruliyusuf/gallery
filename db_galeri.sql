-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2024 pada 14.47
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
-- Database: `db_galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(5577, 'RPL Generations', 'RPL Generations', '2024-01-13 08:43:28', 4168),
(5701, 'XII RPL 2', 'XII RPL 2', '2024-01-12 21:57:35', 4168),
(8156, 'Coba', 'Coba Album', '2024-01-15 20:06:12', 6174),
(9248, 'XII RPL 3', 'XII RPL 3', '2024-01-13 08:43:14', 4168),
(9490, 'XII RPL 1', 'Foto XII RPL 1', '2024-01-12 21:53:34', 4168);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` text NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` datetime NOT NULL,
  `lokasifile` text NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(1128, 'Gunung Tangkuban Perahu', 'Gunung Tangkuban Perahu', '2024-01-12 16:41:29', '420617.jpg', 5577, 4168),
(1129, 'Gunung Tangkuban Perahu', 'Gunung Tangkuban Perahu', '2024-01-12 16:41:29', '420615.jpg', 9248, 4168),
(1130, 'Gunung Tangkuban Perahu', 'Gunung Tangkuban Perahu', '2024-01-12 16:41:29', '420616.jpg', 5577, 4168),
(1132, 'Gunung Tangkuban Perahu', 'Gunung Tangkuban Perahu', '2024-01-12 16:41:29', '420619.jpg', 5701, 4168),
(1133, 'Gunung Tangkuban Perahu', 'Gunung Tangkuban Perahu', '2024-01-12 16:41:29', '420618.jpg', 9490, 4168),
(13754350, ' cvvf', 'kjhgvcx', '2024-01-14 14:43:29', 'IMG-13754350.jpg', 5577, 4168),
(85444444, 'Coba', 'Coba Foto Cekrek', '2024-01-15 20:07:11', 'IMG-85444444.jpg', 8156, 6174),
(90675621, ' c', ' v vc  c xc', '2024-01-14 14:43:01', 'IMG-90675621.jpg', 5577, 4168),
(99389835, 'Coba Foto', 'vfvfd', '2024-01-14 14:41:41', 'IMG-99389835.jpg', 5577, 4168);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentarfoto`
--

CREATE TABLE `tbl_komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_komentarfoto`
--

INSERT INTO `tbl_komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(2103, 13754350, 6174, 'Coba komen bisa oraaa', '2024-01-15 10:25:51'),
(74466590, 13754350, 4168, 'Naon kehed', '2024-01-15 16:53:14'),
(90339183, 90675621, 4168, 'Hei Heii', '2024-01-15 16:57:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_likefoto`
--

CREATE TABLE `tbl_likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_likefoto`
--

INSERT INTO `tbl_likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(25874682, 1128, 4168, '2024-01-15 17:04:14'),
(42180998, 13754350, 4168, '2024-01-15 16:46:47'),
(74628946, 85444444, 6174, '2024-01-15 20:10:11'),
(88465901, 90675621, 4168, '2024-01-15 16:50:33'),
(97512341, 99389835, 4168, '2024-01-14 15:32:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `namalengkap` text NOT NULL,
  `jeniskelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `password`, `email`, `namalengkap`, `jeniskelamin`, `alamat`) VALUES
(4168, 'rizky76', '6228fcd5b58de800fd5798dd4cc5b6ccb233220b', 'user76@gmail.com', 'RIZKY FAUZI ACHMAN', 'L', 'Pakusarakan'),
(6174, 'rizky', '6228fcd5b58de800fd5798dd4cc5b6ccb233220b', 'admin@gmail.com', 'RIZKY FAUZI ACHMAN', 'P', 'Pakusarakan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `fk_album_user` (`userid`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `fk_foto_album` (`albumid`),
  ADD KEY `fk_foto_user` (`userid`);

--
-- Indeks untuk tabel `tbl_komentarfoto`
--
ALTER TABLE `tbl_komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fk_komentar_foto` (`fotoid`),
  ADD KEY `fk_komentar_user` (`userid`);

--
-- Indeks untuk tabel `tbl_likefoto`
--
ALTER TABLE `tbl_likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fk_like_foto` (`fotoid`),
  ADD KEY `fk_like_user` (`userid`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `fk_album_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `fk_foto_album` FOREIGN KEY (`albumid`) REFERENCES `tbl_album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foto_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_komentarfoto`
--
ALTER TABLE `tbl_komentarfoto`
  ADD CONSTRAINT `fk_komentar_foto` FOREIGN KEY (`fotoid`) REFERENCES `tbl_foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_komentar_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_likefoto`
--
ALTER TABLE `tbl_likefoto`
  ADD CONSTRAINT `fk_like_foto` FOREIGN KEY (`fotoid`) REFERENCES `tbl_foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_like_user` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
