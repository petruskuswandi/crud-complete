-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 02.23
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `tahun_terbit` varchar(255) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perpustakaan`
--

INSERT INTO `perpustakaan` (`id_buku`, `judul`, `pengarang`, `tahun_terbit`, `isbn`) VALUES
(1, 'Book 1', 'Author 1', '2000', '978-1234567890'),
(2, 'Book 2', 'Author 2', '1995', '978-9876543210'),
(3, 'Book 3', 'Author 3', '2010', '978-5555555555'),
(4, 'Book 4', 'Author 4', '2018', '978-9999999999'),
(5, 'Book 5', 'Author 5', '2005', '978-4444444444'),
(6, 'Book 6', 'Author 6', '2003', '978-1111111111'),
(7, 'Book 7', 'Author 7', '2007', '978-2222222222'),
(8, 'Book 8', 'Author 8', '2009', '978-3333333333'),
(9, 'Book 9', 'Author 9', '2012', '978-4444444444'),
(10, 'Book 10', 'Author 10', '2015', '978-5555555555'),
(11, 'Book 91', 'Author 91', '2013', '978-2222222222'),
(12, 'Book 92', 'Author 92', '2001', '978-3333333333'),
(13, 'Book 93', 'Author 93', '2010', '978-4444444444'),
(14, 'Book 94', 'Author 94', '2005', '978-5555555555'),
(15, 'Book 95', 'Author 95', '2008', '978-6666666666'),
(16, 'Book 96', 'Author 96', '2002', '978-2222222222'),
(17, 'Book 97', 'Author 97', '2007', '978-3333333333'),
(18, 'Book 98', 'Author 98', '2015', '978-4444444444'),
(19, 'Book 99', 'Author 99', '2011', '978-5555555555'),
(20, 'Book 100', 'Author 100', '2008', '978-6666666666');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
