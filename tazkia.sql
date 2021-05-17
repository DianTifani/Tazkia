-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2020 pada 17.52
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tazkia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `adm`
--

CREATE TABLE `adm` (
  `kode_adm` int(11) NOT NULL,
  `adm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `adm`
--

INSERT INTO `adm` (`kode_adm`, `adm`) VALUES
(1, 'Visa'),
(2, 'Surat Sehat'),
(3, 'Pasport'),
(4, 'KTP'),
(5, 'KK'),
(6, 'SIM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `level`) VALUES
(1, 'Salnan Ratih A', 'salnanratih@gmail.com', 'salnan', '1b2cef635fc0f78859747845f3de06bb', 'superadmin'),
(2, 'Arif Santosa', 'arif@gmail.com', 'arif', '0ff6c3ace16359e41e37d40b8301d67f', 'admin'),
(1212, 'Nisa', 'nisa@gmail.com', 'nisa', '5fad30428811fe378fd389cd7659a33c', 'uyaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `adm_peserta`
--

CREATE TABLE `adm_peserta` (
  `kode_adm_peserta` int(11) NOT NULL,
  `kode_peserta` int(11) NOT NULL,
  `kode_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `adm_peserta`
--

INSERT INTO `adm_peserta` (`kode_adm_peserta`, `kode_peserta`, `kode_adm`) VALUES
(27, 1, 1),
(28, 1, 2),
(29, 1, 3),
(30, 1, 4),
(31, 1, 5),
(32, 1, 6),
(34, 2, 1),
(35, 2, 2),
(36, 3, 4),
(37, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `kode_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_travel` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`kode_peserta`, `nama`, `kode_travel`, `foto`) VALUES
(1, 'NUR EVATUL NISA', 1, '1111.jpg'),
(2, 'Evatul Nisa', 1, '2.jpg'),
(3, 'Madania', 3, '3.jpg'),
(4, 'Galih', 7, '4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `travel`
--

CREATE TABLE `travel` (
  `kode_travel` int(11) NOT NULL,
  `travel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `travel`
--

INSERT INTO `travel` (`kode_travel`, `travel`) VALUES
(1, 'Haji dan Dubai'),
(2, 'Haji dan Turki'),
(3, 'Umroh dan Dubai'),
(4, 'Umroh dan Turki'),
(5, 'Dubai'),
(7, 'Turki');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`kode_adm`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `adm_peserta`
--
ALTER TABLE `adm_peserta`
  ADD PRIMARY KEY (`kode_adm_peserta`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`kode_peserta`);

--
-- Indeks untuk tabel `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`kode_travel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `adm`
--
ALTER TABLE `adm`
  MODIFY `kode_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1213;

--
-- AUTO_INCREMENT untuk tabel `adm_peserta`
--
ALTER TABLE `adm_peserta`
  MODIFY `kode_adm_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `kode_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `travel`
--
ALTER TABLE `travel`
  MODIFY `kode_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
