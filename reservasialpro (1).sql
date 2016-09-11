-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2016 at 11:34 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservasialpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nrp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `nrp`, `no_hp`, `alamat`, `tanggal_lahir`, `email`, `facebook`, `line`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Demsy Iman Mustasyar', '5113100015', '085607227007', 'Wisma Permai gg 3 no 3 Sukolilo Surabaya', '1995-02-20', 'demsyx707@gmail.com', 'Demsy Iman Mustasyar', 'demsyiman', NULL, '0000-00-00 00:00:00', '2016-01-05 21:40:52'),
(8, 'Yohana Desy Permatasari', '5113100038', '085257461094', 'Keputih gang 1c no 15,  Sukolilo ,Surabaya', '1994-01-04', 'secretcodeot5@gmail.com', 'Yohana Desy Permatasari', 'deaszy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Admiral Budi Arviansyah Wr', '5113100189', '081511320696', 'bhaskara utara B12', '1994-03-24', 'arvi.admiral@gmail.com', 'www.facebook,com/arvi.rv.5', 'arviueo', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Aldi Febriansyah', '5114100015', '08983887521', 'jl kendung rejo gg 4 no 4 rt 4', '1996-09-12', 'aldifebrian1515@gmail.com', 'aldi febriansyah', 'sitokrom450', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Muhammad Shulhan Khairy', '5114201068', '085749663736', 'Keputih 1C/34', '1992-05-17', 'al.khair.21@gmail.com', 'facebook.com/shulhankhairy', 'shulhankhairy', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Bima Nisrina Madjid', '5112100019', '085646666967', 'Perumdos ITS Blok F4', '1994-09-09', 'nisrinabia@gmail.com', 'Nisrina Madjid', 'nisrinabia', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Basis Data', '0000-00-00 00:00:00', '2016-01-03 09:25:55'),
(3, 'Pemrograman Jaringan', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NRP_pemesan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_hp_pemesan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `materi` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `penyewaan_lain` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `penutor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `tanggal`, `jam_mulai`, `jam_akhir`, `nama_pemesan`, `NRP_pemesan`, `no_hp_pemesan`, `matkul_id`, `materi`, `penyewaan_lain`, `jumlah`, `admin_id`, `penutor`, `status`, `keterangan`, `remember_token`, `created_at`, `updated_at`) VALUES
(68, '2016-01-06', '11:50:00', '13:00:00', 'Demsy Iman M', '5113100015', '085607227007', 0, '', 'Demo SBD A', 8, 2, '', 1, '', NULL, '0000-00-00 00:00:00', '2016-01-05 21:40:27'),
(69, '2016-01-07', '11:50:00', '12:30:00', 'Demsy Iman Mustasyar', '5113100015', '085607227007', 0, '', 'Demo SBD', 2, 2, '', 1, 'Monggo', NULL, '0000-00-00 00:00:00', '2016-01-06 21:38:55'),
(72, '2016-02-16', '16:00:00', '18:00:00', 'Bima Nisrina Madjid', '5112100019', '085646666967', 0, '', 'Kelas TKMI (Progress TA)', 10, 12, '', 1, 'Semangat :*', NULL, '0000-00-00 00:00:00', '2016-02-13 07:41:57'),
(74, '2016-05-11', '22:36:00', '23:36:00', 'demsy iman', '5113100015', '085607227007', 3, 'dasdd', '', 3, 0, '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '2016-05-23', '23:37:00', '01:38:00', 'asd', '5113100164', '087884555666', 3, 'pop', '', 6, 0, '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '2016-05-23', '23:37:00', '01:38:00', 'asd', '5113100164', '087884555666', 3, 'pop', '', 6, 0, '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '2016-05-23', '21:39:00', '00:39:00', 'dems', '5113100015', '0878456375', 3, 'oioio', '', 2, 0, '', 0, '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Alpro Laboratory', 'alpro', '$2y$10$bFKQ6NKyFg.tI6dfO9r1Nu5aDV/kY0t37cVteNQvVMoujbLnB6K/q', 'JwsDhrkhXe4XJIelJbGZ0T75AB1Blq9binwvYLJtFrCF2umxc7zLrIVj2PN3', '2015-11-26 05:12:03', '2016-02-13 07:32:38', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
