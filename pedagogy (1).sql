-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2026 at 06:28 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedagogy`
--

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `nama_channel` varchar(100) NOT NULL,
  `deskripsi` text,
  `tanggal_dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`id`, `profile_picture`, `nama_channel`, `deskripsi`, `tanggal_dibuat`, `user_id`) VALUES
(1, '/assets/images/profile/Matematika Dasar Aljabar.png', 'Matematika', 'Halo, saya Bu Yulisan, dan di channel ini saya akan mengajarkan matematika dasar aljabar. Di sini kalian akan mempelajari konsep dasar seperti variabel, bentuk aljabar, persamaan, serta cara menyelesaikan soal dengan langkah yang jelas. Saya berharap melalui pembelajaran ini kalian dapat lebih memahami matematika dan lebih percaya diri dalam menyelesaikan soal.', '2026-03-20 12:31:21', 2),
(2, '/assets/images/profile/Fisika.png', 'Fisika', 'Fisika itu seru kalau ngerti caranya! Di channel ini, saya bakal bongkar konsep fisika dari dasar sampai level ujian, dikemas simple biar nggak bikin pusing. Siapin kertas coretan, yuk belajar bareng!', '2026-03-20 12:31:21', 3),
(3, '/assets/images/profile/Chinese.png', 'Chinese', '????(Halo!) Saya Kwee Sun, dan di sini kita akan belajar bahasa Mandarin bersama. Bukan cuma hafalan kosakata, tapi juga cara ngobrol alami kayak orang Taiwan dan China. ????????(pelan-pelan belajar, pasti bisa). Yuk mulai!', '2026-03-20 12:31:21', 4),
(4, '/assets/images/profile/Biola Dasar.png', 'Biola Dasar', 'Pemula? Santai aja. Channel ini khusus buat kamu yang baru pertama megang biola. Mulai dari posisi jari, teknik gesek, sampai bisa main lagu. Hako bakal kasih tips praktis biar belajar biola makin asik.', '2026-03-20 12:31:21', 5),
(5, '/assets/images/profile/Sejarah.png', 'Sejarah', 'Setiap peristiwa punya cerita. Di sini, kita akan menyusuri lorong waktu, dari masa lalu yang membentuk hari ini. Bukan sekadar hafalan, tapi memahami latar belakang dan maknanya. Hidupkan sejarah bersama Osiana!', '2026-03-20 12:31:21', 6),
(6, '/assets/images/profile/English.png', 'English', 'Buat kamu yang pengen lancar bahasa Inggris tanpa drama, kamu datang ke tempat yang tepat! Di channel ini, kita bakal belajar bareng, mulai dari grammar, daily conversation, sampai cara biar pede ngomong pakai English. No pressure, santai aja. Let\'s get started!', '2026-03-20 12:31:21', 7),
(7, '/assets/images/profile/Biology Kelas 10.png', 'Biology Kelas 10 | Metabolisme', 'Channel ini dedicated buat kalian yang lagi fokus memahami metabolisme di Biologi kelas 10. Materi disusun runut, lengkap dengan ilustrasi dan pembahasan soal. Biar nggak bingung bedain katabolisme sama anabolisme. Yuk belajar bareng!', '2026-03-20 12:31:21', 8),
(8, '/assets/images/profile/Seni Budaya.png', 'Seni Budaya | LKS 10A', 'Materi Seni Budaya untuk LKS 10A disajikan secara sistematis berdasarkan kurikulum. Setiap video membahas bab per bab, dilengkapi contoh soal dan pembahasan. Cocok untuk siswa yang ingin belajar mandiri atau persiapan ulangan.', '2026-03-20 12:31:21', 9),
(9, '/assets/images/profile/Piano Dasar.png', 'Piano Dasar', 'Pemula? Santai aja. Channel ini khusus buat kamu yang baru pertama duduk di depan piano. Mulai dari pengenalan tuts, baca not balok, sampai tangan kiri kanan bisa selaras. Hako bakal kasih tips praktis step by step, biar belajar piano makin asik dan nggak bikin pusing.', '2026-03-20 12:31:21', 5);

-- --------------------------------------------------------

--
-- Table structure for table `channel_members`
--

CREATE TABLE `channel_members` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `channel_id` int NOT NULL,
  `tanggal_gabung` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `channel_members`
--

INSERT INTO `channel_members` (`id`, `user_id`, `channel_id`, `tanggal_gabung`) VALUES
(1, 2, 1, '2026-05-05 07:17:34'),
(2, 3, 1, '2026-05-05 07:17:34'),
(3, 4, 1, '2026-05-05 07:17:34'),
(4, 5, 1, '2026-05-05 07:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int NOT NULL,
  `channel_id` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tanggal_upload` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_history`
--

CREATE TABLE `material_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `material_id` int NOT NULL,
  `selesai` tinyint(1) DEFAULT '0',
  `tanggal_selesai` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `channel_id` int NOT NULL,
  `user_id` int NOT NULL,
  `rating` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('siswa','guru','admin') DEFAULT 'siswa',
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `tanggal_daftar`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin', '2026-03-04 02:11:24'),
(2, 'Yulisan', 'yulisan@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(3, 'Hadinan', 'hadinan@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(4, 'Kwee Sun', 'kweesun@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(5, 'Hako', 'hako@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(6, 'Osiana', 'osiana@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(7, 'Essan', 'essan@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(8, 'Merza', 'merza@gmail.com', '123456', 'guru', '2026-03-20 12:29:23'),
(9, 'Susanto', 'susanto@gmail.com', '123456', 'guru', '2026-03-20 12:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_progress`
--

CREATE TABLE `user_progress` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `channel_id` int DEFAULT NULL,
  `progress` int DEFAULT '0',
  `terakhir_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_channels_user` (`user_id`);

--
-- Indexes for table `channel_members`
--
ALTER TABLE `channel_members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`channel_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`,`channel_id`),
  ADD KEY `fk_cm_channel` (`channel_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `material_history`
--
ALTER TABLE `material_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`material_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `channel_id` (`channel_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`channel_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `channel_members`
--
ALTER TABLE `channel_members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_history`
--
ALTER TABLE `material_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_progress`
--
ALTER TABLE `user_progress`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `fk_channels_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channel_members`
--
ALTER TABLE `channel_members`
  ADD CONSTRAINT `channel_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `channel_members_ibfk_2` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cm_channel` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cm_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_history`
--
ALTER TABLE `material_history`
  ADD CONSTRAINT `material_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `material_history_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_progress`
--
ALTER TABLE `user_progress`
  ADD CONSTRAINT `user_progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_progress_ibfk_2` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
