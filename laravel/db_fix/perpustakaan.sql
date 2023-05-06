-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 03:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang_buku` varchar(255) NOT NULL,
  `penerbit_buku` varchar(255) NOT NULL,
  `tahun_buku` date NOT NULL,
  `alamat_penerbit` varchar(255) NOT NULL,
  `sinopsis` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id`, `foto`, `judul_buku`, `pengarang_buku`, `penerbit_buku`, `tahun_buku`, `alamat_penerbit`, `sinopsis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '63e6a64c-b4fb-43ee-b964-d9982107f4bb-1683226435.jpg', 'judul coba edit', 'josua', 'gramedia', '2023-05-05', 'jakarta', 'Harry Potter is an ordinary boy who lives in a cupboard under the stairs at his Aunt Petunia and Uncle Vernon\'s house, which he thinks is normal for someone like him who\'s parents have been killed in a \'car crash\'. He is bullied by them and his fat, spoilt cousin Dudley, and lives a very unremarkable life with only the odd hiccup (like his hair growing back overnight!) to cause him much to think about. That is until an owl turns up with a letter addressed to Harry and all hell breaks loose!', '2023-05-04 11:27:49', '2023-05-04 11:53:55', '2023-05-04 18:27:49'),
(2, '33bf5731-10b7-4a53-a467-f97343d03492-1683231300.jpg', 'terkayes-kayes', 'josua', 'elex compute', '2023-05-05', 'jakarta', 'kayyes is my obsession when she said \"Sarang heyoo!!!!!!!!!!!!!!!!!!!!!!!!!\"', '2023-05-04 13:15:00', '2023-05-04 13:15:00', '2023-05-04 20:15:00'),
(3, '33274983-1bc8-4353-9d3b-9b371cdfcf25-1683231473.png', 'Lisa Manoban', 'josua', 'elex compute', '2023-05-05', 'Jakarta', 'Lalisaaaa!!!!!!!!!!!! born pink ;v!', '2023-05-04 13:17:53', '2023-05-04 13:17:53', '2023-05-04 20:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(10) NOT NULL,
  `idUsers` int(10) NOT NULL,
  `idBuku` int(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `status_kembali` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `idUsers`, `idBuku`, `tanggal_pinjam`, `alasan`, `status_kembali`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-05', 'Butuh', 0, '2023-05-04 19:10:27', '2023-05-04 19:10:27'),
(2, 3, 1, '2023-05-05', 'Butuh Banget lo-0', 0, '2023-05-04 12:37:57', '2023-05-04 12:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` int(5) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sandi` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `role`, `password`, `sandi`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 1, '$2y$10$qH2gz7KKunlPTr3cf.ApqOmySN2yTsDbirzwb4wM..98okgT3xOaa', 'katasandi', 1, '2023-05-04 13:49:50', '2023-05-04 16:51:30', '2023-05-04 13:49:50'),
(2, 'regis', 'regis', 2, '$2y$10$WevvBZO207McMqGk5bEViuZwRiTOJmfHjuLG/cJKUQNb3CVsvSEce', 'regis', 1, '2023-05-04 13:48:26', '2023-05-04 10:32:42', '2023-05-04 13:48:26'),
(3, 'admin baru edit', 'adminBaru', 1, '$2y$10$bOAPrrTIoGvMSTp1kEmcu.cc48rGvo9Gbpcn7u.hM/gBVdDx2gFea', 'baruu', 1, '2023-05-04 10:55:23', '2023-05-04 10:51:02', '2023-05-04 10:55:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`),
  ADD KEY `idBuku` (`idBuku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD CONSTRAINT `tbl_history_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tbl_history_ibfk_2` FOREIGN KEY (`idBuku`) REFERENCES `tbl_buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
