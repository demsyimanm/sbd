-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 05:30 PM
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
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `db_username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `db_password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `db_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `konten`, `waktu_mulai`, `waktu_akhir`, `kelas`, `status`, `ip`, `db_username`, `db_password`, `db_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdsdasd', 'asdasdadasd', '2015-09-22 03:00:00', '2015-12-17 04:00:00', 'A', 0, '', '', '', '', '2015-11-01 17:53:20', '0000-00-00 00:00:00', '2015-11-01 17:53:20'),
(2, 'qweqwe', 'sdadasd\r\nasdasd\r\nasdas\r\ndasd\r\nasdas\r\ndasd\r\nasdas\r\ndasd\r\nasd\r\nd\r\nasd\r\nasd\r\nasdas\r\ndd\r\n', '2015-10-12 08:27:15', '2015-11-25 10:27:15', 'A', 0, '', '', '', '', '2015-11-01 17:53:23', '0000-00-00 00:00:00', '2015-11-01 17:53:23'),
(3, 'sdasdsdsa', 'asdasd', '2015-09-09 00:14:45', '2015-11-26 00:14:45', 'A', 0, '', '', '', '', '2015-11-01 17:53:25', '0000-00-00 00:00:00', '2015-11-01 17:53:25'),
(4, 'aku coba', 'asds;asdaklnalsdna\r\nasdjkasdjlasjd\r\ndaskldasldknasldn\r\nadaskldnasdklasndas\r\ndaskdkl;asnkdasjD\r\naldfjasdjASdlKasD"ASjdkjl;asdkASdkas\r\nD\r\nasd''jlasdasjkld;jas;ldjask;dnas;dmasd', '2015-10-01 02:02:45', '2015-11-25 02:02:45', 'A', 0, '', '', '', '', '2015-11-01 17:53:28', '0000-00-00 00:00:00', '2015-11-01 17:53:28'),
(5, 'Praktikum 1', 'kerjakan dengan sungguh sungguh', '2015-10-06 20:50:30', '2015-11-27 20:50:30', 'A', 0, '10.151.63.115', 'root', '', 'bridge', '2015-10-29 07:02:53', '0000-00-00 00:00:00', '2015-10-29 07:02:53'),
(6, 'asdds', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '--', 0, '', '', '', '', '2015-10-29 06:53:32', '0000-00-00 00:00:00', '2015-10-29 06:53:32'),
(7, 'Praktikum 1', 'kerjakan dengan sungguh sungguh yaaa', '2015-10-06 21:02:45', '2015-10-23 21:02:45', 'A', 0, '10.151.63.115', 'root', '', 'bridge', '2015-10-29 07:04:28', '0000-00-00 00:00:00', '2015-10-29 07:04:28'),
(8, 'Praktikum 1', 'kerjakan dengan sungguh sungguh yaaa', '2015-10-06 21:02:45', '2015-11-18 21:02:45', 'A', 0, '10.151.63.115', 'root', '', 'bridge', NULL, '0000-00-00 00:00:00', '2015-11-01 11:14:42'),
(9, 'demsy', 'asddjaasldandlas', '2015-10-13 01:49:15', '2015-12-29 01:49:15', 'A', 0, '10.151.63.115', 'bridge', 'bridge', 'bridge', NULL, '0000-00-00 00:00:00', '2015-11-01 11:02:29'),
(10, 'Praktikum 1', 'hayoo bisa gaak?', '2015-10-30 09:45:00', '2015-11-26 09:42:00', 'B', 0, '10.151.63.115', 'bridge', 'bridge', 'bridge', NULL, '0000-00-00 00:00:00', '2015-11-01 17:59:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `event_id`, `judul`, `konten`, `jawaban`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'dasdasadasd', 'asdadasdasd', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '1', 'sdass', 'asdasdasd', 'select * from event', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1', 'Soal1', 'Tampilkan semua nama pada tabel user pada database', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4', 'aku bau', 'cobaaaa', 'select * from event', NULL, '0000-00-00 00:00:00', '2015-10-26 12:40:56'),
(5, '4', 'aku kamu', 'asddaldsnna', 'select * from users', NULL, '0000-00-00 00:00:00', '2015-10-27 10:08:19'),
(6, '3', 'dasdsdasdasds', 'asdsdd', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '8', 'Gampil', 'Tampilkan semua event', 'select * from event', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '8', 'Gancil', 'Tampilkan semua user', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '9', '1', 'user', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '9', '2', 'event', 'select * from event', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '10', 'User', 'user', 'select * from users', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '10', 'Event', 'event', 'select * from event', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=298 ;

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
(28, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 4, 4, 0, 'fdfdffsfsfdssdf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 4, 4, 0, 'select * from asdaadsdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 4, 4, 0, 'fdsdfssfsdsdfsfdsfsfs', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 4, 4, 0, 'asdasdasdasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 4, 4, 0, 'select * from event,users,submissions  where users_id = 1', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 4, 4, 0, 'select nama from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 4, 4, 100, 'select * from event\r\n', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 4, 4, 0, 'select * from', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 4, 4, 0, 'select * from', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 4, 4, 0, 'select * from eventselect * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 4, 4, 0, 'efeffesfesfeewggsfgs', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 4, 4, 0, 'rwerwerwre', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 4, 4, 0, 'select * fro', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 4, 4, 0, 'uyfkfyyfhffhfjh', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 4, 4, 0, 'select * from eventdfsfasdff', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 4, 4, 0, 'adfadfdasddfsf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 4, 4, 0, 'dvdsfsdfsdf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 5, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 5, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 5, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 5, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 4, 6, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 4, 6, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 4, 6, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 5, 6, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 4, 6, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 4, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 5, 4, 0, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 5, 4, 100, 'select * from pendaftar', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 4, 4, 0, 'sdfsdfsddfswefwefsdfsdf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 4, 4, 0, '', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 5, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 4, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 5, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 3, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 3, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 5, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 4, 4, 0, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 2, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 8, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 8, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 7, 4, 0, 'asdsdaadd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 7, 4, 0, 'dadaasdada', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 8, 4, 0, 'sadasddasdsd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 8, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 8, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 8, 4, 0, 'sadsddasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 7, 4, 0, 'asdasdad', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 7, 4, 0, 'demsy', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 8, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 7, 4, 0, 'xzczxccxz', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 7, 4, 0, 'zcccx', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 7, 4, 0, 'sdsdfdsf', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 7, 4, 0, 'demsy', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 7, 4, 0, 'iman', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 7, 4, 0, 'u', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 7, 4, 0, 'q', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 7, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 8, 4, 0, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 9, 4, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 10, 4, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 9, 4, 0, 'asdasadasd', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 11, 9, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 11, 9, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 12, 9, 100, 'select * from event', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 11, 9, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 11, 9, 100, 'select * from users', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `kelas`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'bilfash', '5113100091', '$2y$10$SVgRSSp34xdNYR4RIs1LEeiYRf4vsH9465g2/4tZshE6OMB/Wvj/m', 'A', 1, 'ummkNKWx28I0QTXK9IuL0HYtMD2SJwkarPvppF2hY2Ono7jAdqCb1Rvu0Fay', '2015-08-17 15:13:22', '2015-11-01 10:57:22'),
(4, 'demsy', 'demsy', '$2y$10$r2aTURyrVQ/uwwxa3K.NRej03GUikOvaqDOzvbF1T1anLlH1MAbRa', 'A', 3, '4D4TiK7mI1YBRANeJKpn4GSKvxA2FhStwdfPWgU1cPrSNzcn6Vbl92mDjMNG', '0000-00-00 00:00:00', '2015-10-27 23:20:38'),
(5, 'sdasds', 'user1', '$2y$10$lOc4F.sC5yjKAwuc3cZf0e/NkCRiQEdAm3ZYCxMOStHtG4OTX1C1.', 'C', 1, '6fIvTPDDxOEHl3WMMVJcdMwfL5IP5FVY6WZM8f2mto6Os1iODYM5dukDLqBj', '0000-00-00 00:00:00', '2015-10-29 19:30:32'),
(6, 'coba', 'coba', '$2y$10$wNLLz6lA/37rsK8TNcTAwe6e19XY2rkylKDMDvGTVXWLdYSjAk76q', 'A', 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'iman', 'iman', '$2y$10$Cqb9AheTiBKj0d8ZLIi6Qum4F/RK5LUd6XNwEJLilpYwBEythnRiS', 'B', 2, 'e9S43JnGsBI5LDEl9mQ2nWIVRrakyyssVFjwgyAIpUZqxqQZX8mH30m30Z1H', '0000-00-00 00:00:00', '2015-11-01 11:15:19'),
(8, 'bilfash', 'bilfash', '$2y$10$I/OVgbXKoUkSZv1Z8DE.qO1RKp/X4kyelnlOBCuRJqB3OY9klraL6', 'B', 3, 'hTtrbCmMbslCuyfTw0a3HCZ2nZK4YwcJX0JcLmGpvD9qna5NHTNJqfGcwrMZ', '0000-00-00 00:00:00', '2015-10-29 20:08:10'),
(9, 'must', 'must', '$2y$10$WEy/tmGIHo0dOlN4dxWdK.N5AziNqIJxfs3V65K5GbgRxNxU6VX1e', 'B', 3, 'AHPRLCcYgMqkPrZxaP0yWAvclPBzzBJP6vKlDcCJp8fARnNlNyCS48ZGiM9U', '0000-00-00 00:00:00', '2015-11-01 04:07:39'),
(11, 'kamu', 'kamu', '$2y$10$t0DwZjzITUarF5UQ5Cg8nu.g3Q.HFKq44luWusVBA.O1j20I/OhMq', 'D', 2, 'SJoDlr7JVxZsY1cDaJsCCjvdoyyQa52dZ3owuIg2F1JkHzdXq0XdL23aDi9o', '0000-00-00 00:00:00', '2015-11-01 04:08:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
