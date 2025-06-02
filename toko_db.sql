-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2025 pada 10.30
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
-- Database: `toko_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `produk_id`, `jumlah`, `user_id`) VALUES
(1, 3, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `deskripsi`, `gambar`) VALUES
(1, 'jawir', 10000, 'jawir merupakan singkatan dari jawa ireng', 'WhatsApp Image 2024-12-25 at 13.49.16.jpeg'),
(2, 'rosyid', 20000, 'sdf gfsfhxghx fgrxfhdfh', 'WhatsApp Image 2024-12-25 at 15.46.09(1).jpeg'),
(3, 'minecraft', 194000, 'Minecraft adalah sebuah permainan bak pasir yang dikembangkan oleh pengembang permainan Swedia Mojang Studios. Permainan ini dibuat oleh Markus \"Notch\" Persson dalam bahasa pemrograman Java. Wikipedia\r\nPengembang: Mojang, Other Ocean Interactive, 4J Studios, Xbox Game Studios\r\nBahasa pemrograman: Java, C++\r\nPenghargaan: Penghargaan Video Game BAFTA untuk Family, LAINNYA\r\nNominasi: Penghargaan Video Game BAFTA untuk Multiplayer, LAINNYA\r\nGenre: Permainan bertahan hidup, Permainan petualangan-aksi, Gameplay nonlinier\r\nPerancang: Markus Persson, Jens Bergensten\r\nPlatform: Nintendo Switch, Xbox One, PlayStation 5, ChromeOS, LAINNYA', 'download.jfif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'rosyid', 'payahhawok@gmail.com', '$2y$10$VAD1xmtZGsbUsMcZnVVDN.hy.e7.FZAat3hpyasal//BT1mEnpHue', 'admin'),
(2, 'zallzall', 'deltabot09@gmail.com', '$2y$10$I75WIsZ7Vvm3CORIBMBMM.iivetELTz6jZ6FVLFo416h9tDqqGkZO', 'user'),
(3, 'Dewi', 'zenzayya4@gmail.com', '$2y$10$dYh11cIEA4sOunEHnxBOwO9lxR.Yu.P/5e17vi4taYatwmH7Et6.O', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
