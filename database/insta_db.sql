-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mei 2024 pada 00.14
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insta_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_list`
--

CREATE TABLE `comment_list` (
  `id` int(30) NOT NULL,
  `post_id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment_list`
--

INSERT INTO `comment_list` (`id`, `post_id`, `member_id`, `message`, `date_created`, `date_updated`) VALUES
(13, 20, 3, 'So beautifullll', '2024-05-02 04:21:31', '2024-05-02 04:21:31'),
(15, 23, 6, 'so beautiful', '2024-05-02 04:34:41', '2024-05-02 04:34:41'),
(16, 24, 3, 'cool mannn', '2024-05-02 04:36:50', '2024-05-02 04:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_list`
--

CREATE TABLE `like_list` (
  `post_id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `like_list`
--

INSERT INTO `like_list` (`post_id`, `member_id`) VALUES
(19, 3),
(20, 3),
(23, 6),
(24, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_list`
--

CREATE TABLE `member_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Approved, 2 = Denied, 3=Blocked',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member_list`
--

INSERT INTO `member_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `avatar`, `status`, `date_created`, `date_updated`) VALUES
(3, 'yanu', 'arsyah', 'imaduddin', 'yanuar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/member/3.png?v=1714510321', 0, '2024-05-01 03:45:29', '2024-05-01 03:52:01'),
(5, 'Intan', 'Perma', 'Sari', 'Intan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/member/5.png?v=1714598048', 0, '2024-05-02 04:14:08', '2024-05-02 04:14:08'),
(6, 'ilham', 'adi', 'putra', 'ilham@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'uploads/member/6.png?v=1714599191', 0, '2024-05-02 04:33:11', '2024-05-02 04:33:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_meta`
--

CREATE TABLE `member_meta` (
  `member_id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_list`
--

CREATE TABLE `post_list` (
  `id` int(30) NOT NULL,
  `member_id` int(30) NOT NULL,
  `caption` text NOT NULL,
  `upload_path` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post_list`
--

INSERT INTO `post_list` (`id`, `member_id`, `caption`, `upload_path`, `date_created`, `date_updated`) VALUES
(19, 5, 'Liburan Asikkkk', 'uploads/posts/202405020003/', '2024-05-02 04:15:15', '2024-05-02 04:15:15'),
(20, 5, 'Felling good', 'uploads/posts/202405020004/', '2024-05-02 04:16:35', '2024-05-02 04:16:35'),
(23, 3, 'Holiday', 'uploads/posts/202405020001/', '2024-05-02 04:20:48', '2024-05-02 04:20:48'),
(24, 6, 'Cool', 'uploads/posts/202405020002/', '2024-05-02 04:35:43', '2024-05-02 04:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'InstaApp'),
(6, 'short_name', 'InstaApp'),
(11, 'logo', 'uploads/log.png?v=1714514138'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1714514488');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_list`
--
ALTER TABLE `comment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `like_list`
--
ALTER TABLE `like_list`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_meta`
--
ALTER TABLE `member_meta`
  ADD KEY `individual_id` (`member_id`);

--
-- Indexes for table `post_list`
--
ALTER TABLE `post_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_list`
--
ALTER TABLE `comment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `member_list`
--
ALTER TABLE `member_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_list`
--
ALTER TABLE `post_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `comment_list`
--
ALTER TABLE `comment_list`
  ADD CONSTRAINT `member_id_fk_cl` FOREIGN KEY (`member_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_id_fk_cl` FOREIGN KEY (`post_id`) REFERENCES `post_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `like_list`
--
ALTER TABLE `like_list`
  ADD CONSTRAINT `member_id_fk_ll` FOREIGN KEY (`member_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `post_id_fk_ll` FOREIGN KEY (`post_id`) REFERENCES `post_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `member_meta`
--
ALTER TABLE `member_meta`
  ADD CONSTRAINT `member_id_fk_mm` FOREIGN KEY (`member_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `post_list`
--
ALTER TABLE `post_list`
  ADD CONSTRAINT `member_id_fk_pl` FOREIGN KEY (`member_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
