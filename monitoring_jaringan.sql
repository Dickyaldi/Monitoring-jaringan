-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2025 pada 13.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring_jaringan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `username`, `password`, `gambar`, `level`) VALUES
(1, 'RIZKI FIKRIANSYAH', 'rizkifikriansyah998@gmail.com', 'rizki', '$2y$10$CitkBpaKWjT.3mg7ppyZ8eZCTFW808YA6ktL9rO.BMqnow7LEAH9q', NULL, 1),
(2, 'Fera Febrianti', 'ferafebrianti18@gmail.com', 'fera', '$2y$10$cNdScy48mxipXqFp7hpmTe8ezJ1ColduKEygmxqqZTx39v/yemaY6', NULL, 2),
(7, 'm. fitratullah', 'Kyfitra@gmail.com', 'admin', '$2y$10$yoUdBIk7nC.HlBLdFLMKT.rQHEBQhXDzDkzIwyXHhyGUc0Wf78BNO', NULL, 1),
(8, 'dedy', 'dedi09@gmail.com', 'dedy', '$2y$10$DOgGCbKVtaJ6TkoZrdAxj.VFijYNXOSPgC5ZTs7kOoPjUENBRdZsG', NULL, 1),
(9, 'yz', 'yz12@gmail.com', 'yz', '$2y$10$GD9POR.xLcVChYBrR4esju0zEoFt7MSuiwW3/bxkKGCTH42sMlQhy', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `router`
--

CREATE TABLE `router` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `nama_router` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jitter` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `router`
--

INSERT INTO `router` (`id`, `lokasi`, `nama_router`, `tanggal`, `jitter`, `ip`, `keterangan`) VALUES
(1, 'panggi', 'iky09', '0000-00-00', '50mbps', '192.168.1.1', 'Enable'),
(2, 'sadia', 'deden123', '0000-00-00', '50mbps', '192.168.1.1', 'Enable'),
(3, 'pane', 'fitra12', '2025-04-09', '50mbps', '192.168.1.1', 'Disable');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `router`
--
ALTER TABLE `router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
