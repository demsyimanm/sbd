-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 07:29 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waktu_mulai` datetime DEFAULT NULL,
  `waktu_akhir` datetime DEFAULT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `konten`, `waktu_mulai`, `waktu_akhir`, `kelas`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdsdasd', 'asdasdadasd', '2015-09-22 03:00:00', '2015-12-17 04:00:00', 'A', 0, NULL, '0000-00-00 00:00:00', '2015-09-12 08:54:05'),
(2, 'qweqwe', 'sdadasd\r\nasdasd\r\nasdas\r\ndasd\r\nasdas\r\ndasd\r\nasdas\r\ndasd\r\nasd\r\nd\r\nasd\r\nasd\r\nasdas\r\ndd\r\n', '2015-10-12 08:27:15', '2015-11-25 10:27:15', 'A', 0, NULL, '0000-00-00 00:00:00', '2015-09-10 03:47:35'),
(3, 'sdasdsdsa', 'asdasd', '2015-09-09 00:14:45', '2015-09-23 00:14:45', 'A', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'aku coba', 'asds;asdaklnalsdna\r\nasdjkasdjlasjd\r\ndaskldasldknasldn\r\nadaskldnasdklasndas\r\ndaskdkl;asnkdasjD\r\naldfjasdjASdlKasD"ASjdkjl;asdkASdkas\r\nD\r\nasd''jlasdasjkld;jas;ldjask;dnas;dmasd', '2015-10-01 02:02:45', '2015-11-25 02:02:45', 'A', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_16_125129_databasev1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_username_index` (`username`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `event_id`, `judul`, `konten`, `jawaban`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'dasdasadasd', 'asdadasdasd', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '1', 'sdass', 'asdasdasd', 'asdasdad', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1', 'Soal1', 'Tampilkan semua nama pada tabel user pada database', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4', 'aku bau', 'cobaaaa', 'select * from event', NULL, '0000-00-00 00:00:00', '2015-10-26 12:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'asisten', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'user', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `question_id`, `users_id`, `nilai`, `jawaban`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 4, 0, 'sesdaddasdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 4, 0, 'fsfsdfsfsdf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 3, 4, 0, 'asdsddassdd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 4, 0, 'asdddasdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 4, 0, 'sadasdsa', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 4, 0, 'asdsdd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 4, 0, 'dfdfsddsfdsd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 4, 0, 'casdasdas', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 3, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 4, 0, 'asdssdasdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 3, 4, 0, 'sdasdasdasdsad', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, 4, 0, 'asdsddasdsds', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 3, 4, 0, 'sdasdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 3, 4, 0, 'demsy', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 4, 0, 'seelct * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 4, 0, 'seelct * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 4, 4, 100, 'select  * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `kelas`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'bilfash', '5113100091', '$2y$10$SVgRSSp34xdNYR4RIs1LEeiYRf4vsH9465g2/4tZshE6OMB/Wvj/m', 'A', 1, '2GR3sg82EWvnPDTK9CUgl0zCDQVicWYrv6CMVNgY4VQMgXzuZ8qtpaXzAco1', '2015-08-17 15:13:22', '2015-09-19 01:50:57'),
(3, 'demsy', 'qwe', '$2y$10$s1Z5aBZlfDavnrn4fyGWO.2T9W1bN44h3O/DWhU9KKM75I.hEE1sa', 'B', 1, 'tB8V4KHPJZX8SmoN4Ov4n8XLREpQ12lJeAFNd0hwzAuq0fmNOJeJQW4woCka', '2015-08-17 15:44:35', '2015-08-17 21:34:38'),
(4, 'demsy', 'demsy', '$2y$10$r2aTURyrVQ/uwwxa3K.NRej03GUikOvaqDOzvbF1T1anLlH1MAbRa', 'A', 3, '6zuemkj2yIRAv7WaAGSbjE4bbnkyMnEuBCeKPUFYUZhc96EcZdON9LO7xe22', '0000-00-00 00:00:00', '2015-09-19 02:14:20'),
(5, 'sdasds', 'user1', '$2y$10$lOc4F.sC5yjKAwuc3cZf0e/NkCRiQEdAm3ZYCxMOStHtG4OTX1C1.', 'C', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
