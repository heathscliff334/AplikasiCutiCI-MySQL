-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 03:14 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_is`
--
CREATE DATABASE IF NOT EXISTS `portal_is` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `portal_is`;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
CREATE TABLE `cuti` (
  `cuti_id` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_cuti` enum('permisi','tahunan','sakit') NOT NULL DEFAULT 'permisi',
  `photo` varchar(100) DEFAULT NULL,
  `keterangan_cuti` varchar(255) DEFAULT NULL,
  `mulai_cuti` datetime NOT NULL,
  `sampai_cuti` datetime NOT NULL,
  `lama_cuti` int(11) DEFAULT NULL,
  `lama_hari` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acc_spv` int(2) NOT NULL DEFAULT '0',
  `acc_koor` int(2) NOT NULL DEFAULT '0',
  `acc_pimp` int(2) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '0',
  `komen` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `user_id`, `jenis_cuti`, `photo`, `keterangan_cuti`, `mulai_cuti`, `sampai_cuti`, `lama_cuti`, `lama_hari`, `created_at`, `acc_spv`, `acc_koor`, `acc_pimp`, `status`, `komen`, `is_active`) VALUES
('5e008b216fc03', 1, 'sakit', 'default.jpg', 'tipes kata dokter harus istirahat', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 9, 0, '2019-12-23 09:38:41', 0, 0, 0, 0, 'asdasdasdasdasd', 1),
('5e008be2d4550', 1, 'sakit', 'default.jpg', 'harus istirahat', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 9, 0, '2019-12-23 09:41:54', 0, 0, 0, 0, '', 1),
('5e017acd469bc', 1, 'sakit', 'default.jpg', 'test', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 99, 0, '2019-12-24 02:41:17', 3, 0, 0, 3, '', 0),
('5e017af0cdcb7', 1, 'sakit', 'default.jpg', 'test', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 99, 0, '2019-12-24 02:41:52', 3, 0, 0, 3, '', 1),
('5e017b1534b6c', 1, 'sakit', 'default.jpg', 'test', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 99, 0, '2019-12-24 02:42:29', 3, 0, 0, 3, '', 1),
('5e017b6e8a39a', 1, 'sakit', 'default.jpg', 'test', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 99, 0, '2019-12-24 02:43:58', 3, 0, 0, 3, '', 0),
('5e017b863cc89', 1, 'sakit', 'default.jpg', 'test', '2019-12-24 00:00:00', '2019-12-24 00:00:00', 99, 0, '2019-12-24 02:44:22', 3, 0, 0, 3, '', 0),
('5e017b9952623', 1, 'tahunan', 'default.jpg', 'test', '2019-12-25 12:59:00', '2019-12-24 00:00:00', 2, 0, '2019-12-24 02:44:41', 1, 0, 1, 1, '', 1),
('5e017bbe31e19', 1, 'tahunan', 'default.jpg', 'test', '2019-12-25 12:59:00', '2019-12-24 00:00:00', 2, 0, '2019-12-24 02:45:18', 1, 0, 1, 1, '', 1),
('5e017dc745e86', 1, 'permisi', 'default.jpg', 'urus visa 1 jam', '2019-12-24 10:00:00', '2019-12-24 11:00:00', 1, 0, '2019-12-24 02:53:59', 1, 0, 1, 1, '', 1),
('5e01969605796', 1, 'permisi', '5e01969605796.jpg', 'persiapan natal', '2019-12-24 15:00:00', '2019-12-24 17:00:00', 2, 0, '2019-12-24 04:39:50', 1, 1, 1, 1, NULL, 1),
('5e047d9f6b813', 1, 'permisi', '5e047d9f6b813.jpg', 'liburan akhir tahun', '2019-12-30 08:00:00', '2019-12-31 17:00:00', 16, 0, '2019-12-26 09:30:07', 0, 0, 0, 0, 'test asdasd qwewerasd', 1),
('5e058a645e497', 2, 'permisi', 'default.jpg', 'urus paspor', '2019-12-27 13:00:00', '2019-12-27 15:00:00', 2, 0, '2019-12-27 04:36:52', 0, 0, 0, 0, 'asdasd', 1),
('5e05b599e7ca2', 2, 'tahunan', 'default.jpg', 'asdasdasdasdasda', '2019-12-28 10:00:00', '2019-12-28 11:00:00', 1, 0, '2019-12-27 07:41:13', 0, 0, 0, 0, NULL, 1),
('5e05b61c65b43', 2, 'permisi', 'default.jpg', 'TESTESTESETSETSET', '2019-12-28 13:00:00', '2019-12-28 14:00:00', 1, 0, '2019-12-27 07:43:24', 0, 0, 0, 0, NULL, 0),
('5e05bfdcc99b0', 3, 'permisi', 'default.jpg', 'ADA KELAS KULIAH', '2019-12-27 16:00:00', '2019-12-27 05:00:00', 1, 0, '2019-12-27 08:25:00', 0, 1, 3, 0, NULL, 1),
('5e05d45e23dff', 4, 'permisi', 'default.jpg', 'BELI OBAT DI APOTIK', '2019-12-28 08:00:00', '2019-12-28 09:00:00', 1, 0, '2019-12-27 09:52:30', 3, 0, 0, 0, NULL, 1),
('5e0718513e31c', 1, 'permisi', 'default.jpg', 'ASD', '2019-12-28 07:54:00', '2019-12-28 08:54:00', 1, 0, '2019-12-28 08:54:41', 0, 0, 0, 0, NULL, 1),
('5e0726f474457', 2, 'permisi', 'default.jpg', '123131231', '2019-12-28 10:12:00', '2019-12-28 02:03:00', 1, 0, '2019-12-28 09:57:08', 1, 0, 0, 0, NULL, 1),
('5e099666694eb', 4, 'permisi', '5e099666694eb.jpg', 'BELI MAKAN', '2019-12-30 14:00:00', '2019-12-30 16:00:00', 2, 0, '2019-12-30 06:17:10', 1, 0, 0, 0, NULL, 1),
('5e099d587edc1', 2, 'tahunan', 'default.jpg', 'LIBURAN', '2019-12-30 08:00:00', '2019-12-30 17:00:00', 9, 0, '2019-12-30 06:46:48', 1, 3, 0, 0, NULL, 1),
('5e18471d56069', 2, 'permisi', 'default.jpg', 'TESTTT JAM', '2020-01-11 08:00:00', '2020-01-13 17:00:00', 27, 0, '2020-01-10 09:42:53', 1, 3, 0, 0, NULL, 1),
('5e1d44e749f97', 5, 'permisi', 'default.jpg', 'TS', '2020-01-14 11:00:00', '2020-01-14 12:00:00', 1, 0, '2020-01-14 04:34:47', 3, 0, 0, 0, NULL, 1),
('5e1d8d728032f', 2, 'permisi', '5e1d8d728032f.JPG', 'ASDASD', '2020-01-14 09:09:00', '2020-01-14 10:00:00', 1, 0, '2020-01-14 09:44:18', 1, 1, 0, 0, NULL, 1),
('5e1d8eb11c87a', 2, 'tahunan', '5e1d8eb11c87a.JPG', 'LIBUR LIBUR MANTAB JIWA', '2020-01-14 08:00:00', '2020-01-14 17:00:00', 0, 1, '2020-01-14 09:49:37', 1, 0, 0, 0, NULL, 1),
('5e1fdfbc5f1ce', 8, 'permisi', 'default.jpg', 'TEST CUTII PERMISI', '2020-01-16 08:00:00', '2020-01-16 17:00:00', 0, 1, '2020-01-16 03:59:56', 1, 1, 0, 0, NULL, 1),
('5e228b82446b3', 2, 'tahunan', 'default.jpg', 'CUTI SINCIA', '2020-01-18 08:00:00', '2020-01-25 17:00:00', 0, 8, '2020-01-18 04:37:22', 1, 1, 3, 0, NULL, 1),
('5e267b8d8d7ca', 2, 'tahunan', 'default.jpg', '2 HARI CUY', '2020-01-21 00:00:00', '2020-01-22 00:00:00', 0, 2, '2020-01-21 04:18:21', 0, 0, 0, 0, NULL, 1),
('5e268403f03c5', 2, 'tahunan', 'default.jpg', '1 HARI LAGI DONG', '2020-01-22 00:00:00', '2020-01-23 00:00:00', 0, 1, '2020-01-21 04:54:27', 0, 0, 0, 0, NULL, 1),
('5e268432145ac', 2, 'tahunan', 'default.jpg', '1 JAM SAJA', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, '2020-01-21 04:55:14', 0, 0, 0, 0, NULL, 1),
('5e27d41b8a51d', 2, 'tahunan', 'default.jpg', 'Q', '2020-01-01 00:00:00', '2020-01-31 00:00:00', 0, 27, '2020-01-22 04:48:27', 0, 0, 0, 0, NULL, 1),
('5e27f154a817f', 2, 'permisi', 'default.jpg', 'HARI', '2020-01-01 00:00:00', '2020-01-07 00:00:00', 0, 6, '2020-01-22 06:53:08', 0, 0, 0, 0, NULL, 1),
('5e27f31f56aba', 2, 'permisi', 'default.jpg', 'JAM 2', '2020-01-22 08:00:00', '2020-01-22 11:00:00', 3, 0, '2020-01-22 07:00:47', 0, 0, 0, 0, NULL, 1),
('5e27f7c0b77a8', 2, 'tahunan', 'default.jpg', 'CUTI SINCIA', '2020-01-01 00:00:00', '2020-02-03 00:00:00', 0, 29, '2020-01-22 07:20:32', 0, 0, 0, 0, NULL, 1),
('5e281407e6c49', 29, 'tahunan', 'default.jpg', 'TEST', '2020-01-22 00:00:00', '2020-01-23 00:00:00', 0, 2, '2020-01-22 09:21:11', 0, 1, 0, 0, NULL, 1),
('5e29411883261', 38, 'tahunan', 'default.jpg', 'JI', '2020-01-01 00:00:00', '2020-01-07 00:00:00', 0, 6, '2020-01-23 06:45:44', 0, 0, 0, 0, NULL, 1),
('5e2e57fc2dfdc', 2, 'tahunan', 'default.jpg', 'TEST SISA CUTI', '2020-01-27 00:00:00', '2020-01-28 00:00:00', 0, 2, '2020-01-27 03:24:44', 0, 0, 0, 0, NULL, 1),
('5e2e581cb5508', 2, 'tahunan', 'default.jpg', 'TEST SISA CUTI', '2020-01-27 00:00:00', '2020-01-28 00:00:00', 0, 2, '2020-01-27 03:25:16', 0, 0, 0, 0, NULL, 1),
('5e2e58e08af4b', 2, 'tahunan', 'default.jpg', 'TEST SISA CUTI', '2020-01-27 00:00:00', '2020-01-28 00:00:00', 0, 2, '2020-01-27 03:28:32', 0, 0, 0, 0, NULL, 1),
('5e2e593519ce4', 2, 'tahunan', 'default.jpg', 'TEST SISA CUTI', '2020-01-27 00:00:00', '2020-01-28 00:00:00', 0, 2, '2020-01-27 03:29:57', 0, 0, 0, 0, NULL, 1),
('5e2e5956731b5', 2, 'tahunan', 'default.jpg', 'TEST CUTI LAGI (1)', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:30:30', 0, 0, 0, 0, NULL, 1),
('5e2e59bf30be5', 2, 'tahunan', 'default.jpg', 'TEST CUTI LAGI (1)', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:32:15', 0, 0, 0, 0, NULL, 1),
('5e2e5b2cd7780', 2, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:38:20', 0, 0, 0, 0, NULL, 1),
('5e2e5b990a40c', 2, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:40:09', 0, 0, 0, 0, NULL, 1),
('5e2e5bbe7519a', 2, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:40:46', 0, 0, 0, 0, NULL, 1),
('5e2e5bd12d02f', 2, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:41:05', 1, 0, 0, 0, NULL, 1),
('5e2e5c3e96854', 2, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:42:54', 3, 0, 0, 0, NULL, 1),
('5e2e5dac9bfb3', 8, 'tahunan', 'default.jpg', 'ASD', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:49:00', 3, 0, 0, 0, NULL, 1),
('5e2e5dbe1f9f9', 8, 'tahunan', 'default.jpg', '12', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:49:18', 3, 0, 0, 0, NULL, 1),
('5e2e5dd3a0eb8', 8, 'tahunan', 'default.jpg', '12', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 03:49:39', 1, 0, 0, 0, NULL, 1),
('5e2e5df098739', 8, 'tahunan', 'default.jpg', 'TEST SISA CUTI - 3 HARI', '2020-01-27 00:00:00', '2020-01-29 00:00:00', 0, 3, '2020-01-27 03:50:08', 3, 0, 0, 0, '', 1),
('5e2e61b37e6e6', 2, 'permisi', 'default.jpg', 'PERMISI 1 HARI', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 04:06:11', 1, 0, 0, 0, NULL, 1),
('5e2e6207111f5', 2, 'permisi', 'default.jpg', 'PERMISI 1 HARI', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 04:07:35', 1, 0, 0, 0, NULL, 1),
('5e2e6a2146a74', 2, 'permisi', 'default.jpg', '123123', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 04:42:09', 1, 0, 0, 0, NULL, 1),
('5e2e6af5e263a', 8, 'tahunan', 'default.jpg', '221231231', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 04:45:41', 3, 0, 0, 0, '', 1),
('5e2e6b10b79cf', 2, 'tahunan', 'default.jpg', '222222 ', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 04:46:08', 3, 0, 0, 0, '', 1),
('5e2e96fcc74bc', 2, 'tahunan', 'default.jpg', 'TEST TOLAK', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 07:53:32', 3, 0, 0, 0, 'a', 1),
('5e2ea71debe38', 2, 'tahunan', 'default.jpg', 'TEST', '2020-01-27 00:00:00', '2020-01-27 00:00:00', 0, 1, '2020-01-27 09:02:21', 3, 0, 3, 0, 'testasda', 1),
('5e2eaaff4f8a1', 2, 'permisi', 'default.jpg', 'JALAN-JALAN', '2020-01-27 00:00:00', '2020-01-29 00:00:00', 0, 3, '2020-01-27 09:18:55', 0, 0, 0, 0, NULL, 1),
('5e2eab30d67d5', 2, 'permisi', 'default.jpg', 'ASDASDASDASD', '2020-01-28 00:00:00', '0000-00-00 00:00:00', 0, 0, '2020-01-27 09:19:44', 0, 0, 0, 0, NULL, 0),
('5e2eab6e5bb07', 2, 'tahunan', 'default.jpg', 'LIBURAN', '2020-07-13 00:00:00', '2020-07-20 00:00:00', 0, 7, '2020-01-27 09:20:46', 1, 0, 0, 0, NULL, 1),
('5e329e8e5dd84', 2, 'permisi', 'default.jpg', 'TEST', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:14:54', 0, 0, 0, 0, NULL, 1),
('5e329eaae323e', 2, 'permisi', 'default.jpg', 'TEST', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:15:22', 0, 0, 0, 0, NULL, 1),
('5e329fe61c1b2', 2, 'permisi', 'default.jpg', 'GFHGFHGFHF', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:20:38', 0, 0, 0, 0, NULL, 1),
('5e32a010d29e8', 2, 'permisi', 'default.jpg', 'GFHGFHGFHF', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:21:20', 0, 0, 0, 0, NULL, 1),
('5e32a0d49cd8d', 2, 'permisi', 'default.jpg', 'GFHGFHGFHF', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:24:36', 0, 0, 0, 0, NULL, 1),
('5e32a0ff11a49', 2, 'permisi', 'default.jpg', 'GFHGFHGFHF', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:25:19', 0, 0, 0, 0, NULL, 1),
('5e32a1cabffc8', 2, 'permisi', 'default.jpg', 'SDGDFGDFHNJGH,HJN,MHN,HNJ,HJ', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-30 09:28:42', 0, 0, 0, 0, NULL, 1),
('5e32a2a814b26', 2, 'permisi', 'default.jpg', 'SDGDFGDFHNJGH,HJN,MHN,HNJ,HJ', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-30 09:32:24', 0, 0, 0, 0, NULL, 1),
('5e32a37bec522', 2, 'permisi', 'default.jpg', 'TEST CUTI', '2020-02-01 00:00:00', '2020-02-01 00:00:00', 0, 1, '2020-01-30 09:35:55', 0, 0, 0, 0, NULL, 1),
('5e32a3c619ff8', 2, 'permisi', 'default.jpg', 'TEST CUTI', '2020-02-01 00:00:00', '2020-02-01 00:00:00', 0, 1, '2020-01-30 09:37:10', 0, 0, 0, 0, NULL, 1),
('5e32a3d07d61c', 2, 'permisi', 'default.jpg', 'TEST CUTI', '2020-02-01 00:00:00', '2020-02-01 00:00:00', 0, 1, '2020-01-30 09:37:20', 0, 0, 0, 0, NULL, 1),
('5e32a4b75ea20', 2, 'tahunan', 'default.jpg', 'DSFDS', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:41:11', 3, 0, 0, 0, '', 1),
('5e32a52cb441c', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:43:08', 0, 0, 0, 0, NULL, 1),
('5e32a6b81d2c2', 2, 'permisi', 'default.jpg', '3', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:49:44', 0, 0, 0, 0, NULL, 1),
('5e32a731af68f', 2, 'permisi', 'default.jpg', '3', '2020-01-30 00:00:00', '2020-01-30 00:00:00', 0, 1, '2020-01-30 09:51:45', 0, 0, 0, 0, NULL, 1),
('5e32a7a354497', 2, 'permisi', 'default.jpg', 'FEBRUARI ASDASD', '2020-02-29 00:00:00', '2020-02-29 00:00:00', 0, 1, '2020-01-30 09:53:39', 0, 0, 0, 0, NULL, 1),
('5e32a7ddaea83', 2, 'permisi', 'default.jpg', 'FEBRUARI ASDASD', '2020-02-29 00:00:00', '2020-02-29 00:00:00', 0, 1, '2020-01-30 09:54:37', 0, 0, 0, 0, NULL, 1),
('5e32a81c61a49', 2, 'permisi', 'default.jpg', 'DGFHGFHGFH', '2020-01-30 00:00:00', '2020-02-29 00:00:00', 0, 27, '2020-01-30 09:55:40', 0, 0, 0, 0, NULL, 1),
('5e33928e5e3c7', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:35:58', 0, 0, 0, 0, NULL, 1),
('5e3393a83c838', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:40:40', 0, 0, 0, 0, NULL, 1),
('5e3393c82de19', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:41:12', 0, 0, 0, 0, NULL, 1),
('5e3394492ceba', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:43:21', 0, 0, 0, 0, NULL, 1),
('5e339457c2a21', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:43:35', 0, 0, 0, 0, NULL, 1),
('5e339490a9b60', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:44:32', 0, 0, 0, 0, NULL, 1),
('5e3394c29fc96', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:45:22', 0, 0, 0, 0, NULL, 1),
('5e3394f858811', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:46:16', 0, 0, 0, 0, NULL, 1),
('5e33950de7365', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:46:37', 0, 0, 0, 0, NULL, 1),
('5e339711dfc0c', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:55:13', 0, 0, 0, 0, NULL, 1),
('5e3397192e745', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:55:21', 0, 0, 0, 0, NULL, 1),
('5e3397356a25b', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:55:49', 0, 0, 0, 0, NULL, 1),
('5e3397477bb79', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 02:56:07', 0, 0, 0, 0, NULL, 1),
('5e339c766d58e', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:18:14', 0, 0, 0, 0, NULL, 1),
('5e339c7de7017', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:18:21', 0, 0, 0, 0, NULL, 1),
('5e339c89385d4', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:18:33', 0, 0, 0, 0, NULL, 1),
('5e339c8fc9b35', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:18:39', 0, 0, 0, 0, NULL, 1),
('5e339cb71cd09', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:19:19', 0, 0, 0, 0, NULL, 1),
('5e339cbfa8e67', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 03:19:27', 0, 0, 0, 0, NULL, 1),
('5e33ace06c6f0', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:28:16', 0, 0, 0, 0, NULL, 1),
('5e33ad78d497e', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:30:48', 0, 0, 0, 0, NULL, 1),
('5e33ad9fcd90d', 2, 'permisi', 'default.jpg', '0935', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:31:27', 0, 0, 0, 0, NULL, 1),
('5e33ae202485c', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:33:36', 0, 0, 0, 0, NULL, 1),
('5e33aea301913', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:35:47', 0, 0, 0, 0, NULL, 1),
('5e33af23e1c02', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:37:55', 0, 0, 0, 0, NULL, 1),
('5e33af2736cc3', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:37:59', 0, 0, 0, 0, NULL, 1),
('5e33af4e78d1c', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:38:38', 0, 0, 0, 0, NULL, 1),
('5e33af9412420', 2, 'permisi', 'default.jpg', 'ASDASD', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:39:48', 1, 0, 0, 0, '', 1),
('5e33b0a47e705', 2, 'tahunan', 'default.jpg', 'TEST EMAIL INT', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:44:20', 3, 0, 0, 0, '', 1),
('5e33b144266fd', 2, 'permisi', 'default.jpg', 'SSSSSS', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:47:00', 3, 0, 0, 0, '', 1),
('5e33b1c02b50a', 2, 'sakit', '5e33b1c02b50a.png', 'SDFSDFDS', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:49:04', 3, 0, 0, 0, '', 1),
('5e33b22ab0e8f', 2, 'sakit', 'default.jpg', 'ASDASD', '2020-02-01 00:00:00', '2020-02-03 00:00:00', 0, 2, '2020-01-31 04:50:50', 3, 0, 0, 0, '', 1),
('5e33b2930caff', 2, 'tahunan', 'default.jpg', 'DFGDFG', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 04:52:35', 3, 0, 0, 0, '', 1),
('5e33ccd7c1a21', 39, 'tahunan', 'default.jpg', 'PULANG KAMPUNG', '2020-01-31 00:00:00', '2021-02-11 00:00:00', 0, 324, '2020-01-31 06:44:39', 0, 0, 3, 0, '', 1),
('5e33cd1c3b07e', 39, 'tahunan', 'default.jpg', 'PULANG KAMPUNG', '2020-01-31 00:00:00', '2021-02-11 00:00:00', 0, 324, '2020-01-31 06:45:48', 0, 0, 3, 0, '', 1),
('5e33e382dee68', 39, 'permisi', 'default.jpg', 'AASDASDDFGDF', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 08:21:22', 0, 0, 3, 0, '', 1),
('5e33e3ee2e38f', 39, 'permisi', 'default.jpg', 'AASDASDDFGDF', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 08:23:10', 3, 1, 1, 0, '', 1),
('5e33ec7713ee4', 29, 'permisi', 'default.jpg', 'ASDSDF', '2020-01-31 00:00:00', '2020-01-31 00:00:00', 0, 1, '2020-01-31 08:59:35', 3, 0, 0, 0, '', 0),
('5e378ae9bba3f', 2, 'permisi', 'default.jpg', 'TEST EMAIL INTEGRATION', '2020-02-03 00:00:00', '2020-02-03 00:00:00', 0, 1, '2020-02-03 02:52:25', 3, 0, 0, 0, '', 1),
('5e378b54513c7', 2, 'permisi', 'default.jpg', 'VIIII AJSJSJS', '2020-02-05 00:00:00', '2020-02-08 00:00:00', 0, 4, '2020-02-03 02:54:12', 1, 1, 0, 0, '', 1),
('5e38e59b6b00f', 29, 'tahunan', 'default.jpg', 'CUTI CAP GO MEH', '2020-02-04 00:00:00', '2020-02-08 00:00:00', 0, 5, '2020-02-04 03:31:39', 3, 0, 3, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `news_id` varchar(64) NOT NULL,
  `judul_news` varchar(255) NOT NULL,
  `isi_news` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `judul_news`, `isi_news`, `created_at`, `is_active`) VALUES
('1', 'Pengumuman Switching Class/Tukar Kelas Semester Genap 2019/2020', 'Dear Mahasiswa/i,\r\n\r\nUniversitas Bunda Mulia dan Akpar Bunda Mulia\r\n\r\n\r\nBerikut kami informasikan mengenai jadwal perkuliahan semester GENAP TA. 2019/2020.\r\n\r\nJadwal dapat dilihat di portal mahasiswa pada menu jadwal => jadwal kuliah. Jadwal tersebut masih bersifat sementara. Apabila terdapat ketidaksesuaian jadwal dengan KRS yang diambil silahkan datang ke Layanan Mahasiswa Lt. 2 dengan membawa print bukti pengisian KRS.\r\n\r\nJadwal perkuliahan tidak dapat dipindahkan tetapi dapat melalui switching class/tukar kelas.\r\n\r\nDokumen yang diperlukan untuk switching class/tukar kelas adalah :\r\n\r\nSurat pengajuan yang ditanda tangani oleh kedua belah pihak mahasiswa yang akan ditukar kelasnya\r\n\r\nMelampirkan jadwal perkuliahan masing-masing mahasiswa\r\n\r\nSyarat tukar kelas:\r\n\r\nHarus memiliki jumlah SKS dan mata kuliah yang sama karena akan dilakukan tukar kelas untuk semua mata kuliah.\r\n\r\nKedua mahasiswa diwajibkan datang bersamaan ke Layanan Mahasiswa\r\n\r\nPengajuan switching class dapat diajukan ke Layanan Mahasiswa (LM) lantai 2 pada tanggal 30, 31 Desember 2019 & 6 Januari 2020 – Lewat dari tgl tersebut pengajuan tidak dapat diproses\r\n\r\nDemikian informasi yang disampaikan.\r\n\r\n\r\nJakarta, 26 Desember 2019\r\n\r\nSalam,\r\n\r\nLayanan Mahasiswa', '2019-12-28 07:37:45', 1),
('2', 'Pengambilan Sertifikat CAP Prodi Akuntansi', 'Dear Mahasiswa/i Prodi Akuntansi,\r\nBagi mahasiswa/i yang telah lulus ujian sertifikasi CAP pada tanggal 2 Desember 2019 lalu, dapat mengambil sertifikat sertifkasi tersebut ke Layanan Mahasiswa Kampus Ancol (untuk mahasiswa Ancol) dan Layanan Mahasiswa Kampus Serpong (untuk mahasiswa Serpong). Pengambilan sertifikat dapat dilakukan mulai tanggal 18 Desember 2019 - 18 Januari 2020.\r\n\r\nBagi mahasiswa/i yang belum lulus atau belum mengikuti ujian sertifikasi CAP, dapatkan mendaftarkan diri kembali pada ujian sertifikasi di semester berikutnya. Jadwal ujian sertifikasi berikutnya akan diinformasikan lebih lanjut pada portal mahasiswa.\r\nAtas perhatian dan kerjasamanya, kami ucapkan terimakasih.\r\nSalam,\r\nProdi Akuntansi', '2019-12-28 07:42:22', 0),
('5e071ae3df1e0', 'test', '<p>test</p>\r\n', '2019-12-28 09:05:39', 1),
('5e071b24dac3a', 'TEST LAGI', '<p><strong>BOLD</strong>&nbsp;<em>ITALIC</em>&nbsp; <s>STRIKETHROUGH</s></p>\r\n\r\n<ul>\r\n	<li><s>ASDASDASD</s></li>\r\n	<li><s>KEDUA</s></li>\r\n	<li><s>KETIGA</s></li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '2019-12-28 09:06:44', 1),
('5e071f5a8821a', 'Pengambilan Sertifikat CAP Prodi Akuntansi', '<p>Dear Mahasiswa/i Prodi Akuntansi,</p>\r\n\r\n<p>Bagi mahasiswa/i yang telah lulus ujian sertifikasi CAP pada tanggal 2 Desember 2019 lalu, dapat mengambil sertifikat sertifkasi tersebut ke Layanan Mahasiswa Kampus Ancol (untuk mahasiswa Ancol) dan Layanan Mahasiswa Kampus Serpong (untuk mahasiswa Serpong). Pengambilan sertifikat dapat dilakukan mulai tanggal&nbsp;<strong>18 Desember 2019 - 18 Januari 2020.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bagi mahasiswa/i yang belum lulus atau belum mengikuti ujian sertifikasi CAP, dapatkan mendaftarkan diri kembali pada ujian sertifikasi di semester berikutnya. Jadwal ujian sertifikasi berikutnya akan diinformasikan lebih lanjut pada portal mahasiswa.</p>\r\n\r\n<p>Atas perhatian dan kerjasamanya, kami ucapkan terimakasih.</p>\r\n\r\n<p>Salam,</p>\r\n\r\n<p>Prodi Akuntansi</p>\r\n', '2019-12-28 09:24:42', 1),
('5e071fbcc3c85', 'Reminder Pembayaran BPP, Pengisian KRS, Pengajuan Cuti Periode Genap TA. 2019/2020', '<p>Dear Mahasiswa/I,</p>\r\n\r\n<p>Bersama dengan ini Layanan Mahasiswa mengingatkan serta menginformasikan kembali perihal beberapa hal diantaranya :</p>\r\n\r\n<p>Bahwa Periode pembayaran BPS &amp; BPP untuk angkatan 2017, 2018, 2019 (Paket) terakhir Tgl 20 November 2019, sedangkan Periode Pembayaran BPP untuk Angkatan 2016 dan sebelumnya (Non Paket) Akan berakhir pada tgl 16 Desember 2019. Pembayaran yang dilakukan lewat dari tgl tersebut di atas Maka secara Otomatis akan dikenakan Denda sesuai dengan ketentuan yang berlaku.</p>\r\n\r\n<p>Bagi Mahasiwa/I yang Belum melakukan pengisian KRS dimohon agar segera melakukan Resgistrasi pengisian KRS dengan mengisi form KRS yang dapat di Download dari portal mahasiswa-download lain-lain, setelah mendapat persetujuan Prodi lalu diserahkan di Layanan Mahasiswa untuk di proses.</p>\r\n\r\n<p>Bagi mahasiswa yang merencanakan untuk Cuti diharapkan agar segera Melaporkan diri di Layanan Mahasiswa dengan Mengisi Form Pangajuan Cuti serta meminta persetujuan Prodi dan menyerahkan di Layanan Mahasiswa Selambat-lambatnya 15 Hari sebelum perkuliahan di Mulai. Adapun Ketentuan pengajuan Cuti adalah sebagai berikut :</p>\r\n\r\n<p>Mengisi Form permohonan cuti kuliah diambil di Layanan Mahasiswa.</p>\r\n\r\n<p>Pengajuan cuti kuliah dilakukan&nbsp;<strong>paling lambat H-15 dari hari pertama kalender&nbsp;</strong>perkuliahan (form harus sudah mendapat tanda tangan lengkap dari orang tua/ wali, Kaprodi, dan Perpustakaan).&nbsp;<strong>Biaya cuti = BPS.</strong></p>\r\n\r\n<p>Jika terlambat mengajukan cuti, mahasiswa di berikan dispensasi untuk mengajukan di periode waktu&nbsp;<strong>H-14 awal perkuliahan sampai dengan H+28 awal perkuliahan</strong>&nbsp;dengan harus membayar biaya pinalti sebesar Rp 1.000.000,-. Sehingga&nbsp;<strong>biaya yang dibayarkan = BPS + Pinalti (Rp 1.000.000,-).</strong></p>\r\n\r\n<p>Apabila mahasiswa&nbsp;<strong>tidak melaporkan cuti/ statusnya dicutikan</strong>, maka dikenakan pinalti sebesar Rp 1.500.000,-. Sehingga&nbsp;<strong>biaya = [BPS + Pinalti (Rp 1.500.000,-)]/ semester</strong>. Biaya ini akan ditagihkan pada saat mahasiswa aktif kembali.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Demikian informasi ini kami sampaikan, atas perhatiannya kami ucapkan terimaksih.</p>\r\n\r\n<p>Jakarta, 6 Desember 2019</p>\r\n\r\n<p>Salam</p>\r\n\r\n<p>Layanan Mahasiwa</p>\r\n', '2019-12-28 09:26:20', 1),
('5e071fef95dbe', 'asal', '<p>test</p>\r\n', '2019-12-28 09:27:11', 1),
('5e07227353826', 'bbbbb', '<p>saadasdas</p>\r\n', '2019-12-28 09:37:55', 0),
('5e0995babc68e', 'test lagi TESTTESTTESTTESTTESTTEST', '<p>testasd as dasadasdas</p>\r\n\r\n<ol>\r\n	<li>test</li>\r\n	<li>test</li>\r\n	<li>te</li>\r\n</ol>\r\n', '2019-12-30 06:14:18', 1),
('5e0996dd9f323', 'Promosi King Foto Untuk Calon Wisudawan/i Januari 2020', '<p>Dear Calon Wisudawan/i</p>\r\n\r\n<p>Diinformasikan&nbsp;Promosi King Foto Online Booking untuk Calon Wisudawan/i Universitas Bunda Mulia 2020. untuk promo khusus di website kingfoto.com dengan link:&nbsp;bit.ly/Wisuda-BundaMulia</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Demikian informasi ini di sampikan, Terimakasih.</strong></p>\r\n\r\n<p><strong>Salam</strong></p>\r\n', '2019-12-30 06:19:09', 1),
('5e292393a4cec', 'TEST EMAIL', '<p>TEST EMAIL</p>\r\n', '2020-01-23 04:39:47', 1),
('5e29240258ca7', 'TEST EMAIL', '<blockquote>\r\n<p><em><strong>TEST EMAIL</strong></em></p>\r\n</blockquote>\r\n', '2020-01-23 04:41:38', 1),
('5e294f0b706b1', 'TEST BROADCAST EMAIL', '<p>TEST BROADCAST EMAIL</p>\r\n', '2020-01-23 07:45:15', 1),
('5e29509306cae', 'asdasd', '<p>asdasd</p>\r\n', '2020-01-23 07:51:47', 1),
('5e295230db562', 'asdasdas', '<p>sdfsdfsdf</p>\r\n', '2020-01-23 07:58:40', 1),
('5e29529ac6169', 'TEST Lagi ', '<p>ajsdasdfgnmd,fgmd,fm</p>\r\n', '2020-01-23 08:00:26', 1),
('5e2957d0e8ce5', 'DSGDSGDFG', '<p>ASDASDASD</p>\r\n', '2020-01-23 08:22:40', 1),
('5e295a925b404', 'test lagi email + autoload config', '<p>test lagi email + autoload config</p>\r\n', '2020-01-23 08:34:26', 1),
('5e295d92bd28b', 'LAST TEST EMAIL BROADCAST', '<p>ISI ISI ISI ISI&nbsp;</p>\r\n\r\n<p>ISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISI</p>\r\n\r\n<p>ISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISI</p>\r\n\r\n<p>ISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISI</p>\r\n\r\n<p>ISI ISI ISI ISIISI ISI ISI ISIISI ISI ISI ISI</p>\r\n', '2020-01-23 08:47:14', 1),
('5e295ea31a294', 'Peraturan Perusahaan Ing Silver', '<p>Isi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi NewsIsi News&nbsp;Isi News&nbsp;Isi News&nbsp;Isi News</p>\r\n', '2020-01-23 08:51:47', 1),
('5e32a03ab530e', 'asdasdasd', '<p>dfgdfg</p>\r\n', '2020-01-30 09:22:02', 1),
('5e33b47385a6d', 'Peraturan Perusahaan Update', '<p>Isi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi Isi.</p>\r\n\r\n<ol>\r\n	<li>Isi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi Isi</li>\r\n	<li>Isi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi Isi</li>\r\n	<li>Isi Isi IsiIsi Isi IsiIsi Isi IsiIsi Isi Isi</li>\r\n</ol>\r\n\r\n<p>Isi Isi IsiIsi Isi IsiIsi Isi Isi</p>\r\n\r\n<p><a href=\"http://192.168.1.52:8080/e-cuti/admin\">klik disini</a></p>\r\n\r\n<p>Isi Isi IsiIsi Isi Isi</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Isi Isi Isi</strong></p>\r\n', '2020-01-31 05:00:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('5df9de4252606', 'test2spokdksd', 1233, 'default.jpg', 'test2sdoifjosdo'),
('5dfb410d08623', 'HPHPHPHPHP', 999999, '5dfb410d08623.jpg', 'test'),
('5e00349466317', 'test', 123, '5e00349466317.JPG', 'test'),
('5e0042f6e7f55', 'test lagi', 99000, '5e0042f6e7f55.JPG', 'test dong lagi'),
('5e008b872f11e', 'test', 123456, 'default.jpg', 'test foto');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `sisa_cuti` int(11) NOT NULL DEFAULT '0',
  `updated_month` int(11) NOT NULL DEFAULT '0',
  `kat_user` enum('1','2') NOT NULL DEFAULT '1',
  `role` enum('admin','spv','koordinator','pimpinan','su','staff') NOT NULL DEFAULT 'staff',
  `divisi` enum('finance','accounting','purchasing','marketing-jgc','marketing-snt','it','direktur') NOT NULL DEFAULT 'marketing-jgc',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `sisa_cuti`, `updated_month`, `kat_user`, `role`, `divisi`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(1, 'admin', '$2y$10$Fv8DHOfAgkiRBYlRbR2Hb.GjX/8LmGFHKdsSrEdLE0KT.AwoKxgIu', 'admin@admin.com', 'Admin admin', '08787214545', 2, 2, '1', 'admin', '', '2020-02-19 09:36:51', 'user_no_image.jpg', '2019-12-19 09:48:36', 1),
(2, 'kevin', '$2y$10$LYiXez9pwpYWacT.tRU4aeA2YVBo0A3oBICfcZQ9hA5YdR1qfyKhe', 'heathscliff334@gmail.com', 'Kevin Laurence H.', '087819151700', 12, 2, '2', 'staff', 'it', '2020-02-19 09:29:57', 'user_no_image.jpg', '2019-12-23 07:53:16', 1),
(3, 'testspv', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'tes1t@gmail.com', 'test spv', '087845457', 2, 2, '1', 'spv', '', '2020-01-16 04:02:28', 'user_no_image.jpg', '2019-12-24 04:07:44', 1),
(4, 'teststaff', '$2y$10$PBqvkGJ5q1mRiU1470FYCueEwgoeVCJcHHBqqBCccor4aVf2KKV.y', 'teststaff@gmail.com', 'test staff', '0878546462', 2, 2, '1', 'staff', 'finance', '2020-01-10 08:56:42', 'user_no_image.jpg', '2019-12-27 09:47:17', 1),
(5, 'testpimp', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', 'testpimp@gmail.com', 'test pimpinan', '08781915445', 2, 2, '1', 'pimpinan', '', '2020-02-04 03:32:41', 'user_no_image.jpg', '2019-12-28 03:20:13', 1),
(6, 'testpas', '$2y$10$oehX2bFuq739L0I4Nw9cYehJp/vIhTOlL76i33a6RGx17ALccwYYS', 'test_pas@gmail.com', 'test password hash', '0878456456', 2, 2, '1', 'admin', '', '2019-12-30 09:00:39', 'user_no_image.jpg', '2019-12-30 08:59:45', 1),
(8, 'test', '$2y$10$YEyiuFdp42MIeG5oPNDgzeL5CH1Q7JzVSWnxyklkmTbahud.6IFG6', 'test@gmail.com', 'test', '', 11, 2, '1', 'staff', 'marketing-snt', '2020-01-27 04:45:16', 'user_no_image.jpg', '2019-12-30 09:12:59', 1),
(28, 'su', '$2y$10$Fp2zqgPz98GG9v54uBsWZuqIexzwA5.QzSBtUmvTIEYpPLPpB4OkK', 'super_admin@admin.com', 'Super Admin', '0878787458', 2, 2, '1', 'su', '', '2020-01-20 08:48:34', 'user_no_image.jpg', '2020-01-09 08:40:40', 1),
(29, 'spvmarketing', '$2y$10$mGMsE8Z8MXfoDkWsWRFuAeQpReezhyoHW/zVkYfqe1EnbQVy/q.R6', 'spvmar@gmail.com', 'spv marketing', '0878456456', 27, 2, '1', 'spv', '', '2020-02-14 04:56:00', 'user_no_image.jpg', '2020-01-16 03:49:21', 1),
(30, 'koordinator', '$2y$10$b39EFDBfle0P.IvKOukbYOKunwh40NEhjHQeJyP1nIM7pz7j5oiIq', 'koorasd@asdas.com', 'koordinator cuti', '078654658', 7, 2, '1', 'koordinator', 'finance', '2020-02-19 09:38:34', 'user_no_image.jpg', '2020-01-16 04:21:42', 1),
(32, 'asdasd', '$2y$10$cc/tPECLzUevOfmb0jiKVuxwmswheh5wmJzBtV8tW7UanLUzXfUTq', 'asdasd@gmail.com', 'asdasd', '12312312', 7, 2, '1', 'staff', 'marketing-snt', '2020-01-17 09:53:30', 'user_no_image.jpg', '2020-01-17 03:49:29', 1),
(34, 'qwe', '$2y$10$GYBWFMIm8SlmOx8.le9sd.ew9CV.x4Av17I8GjMP8FCbcPyPSkYcu', 'test222@gmail.com', 'tesst', '0878456243', 7, 2, '1', 'spv', '', '2020-01-20 09:52:56', 'user_no_image.jpg', '2020-01-17 03:50:30', 1),
(36, 'testlagi', '$2y$10$KtzmWcRTSl1tylBH1hORmODqcRwSmndcuLYr4nLJXtbL941ND8.H2', 'testlagidong@gmail.com', 'test lagi dong aaa', '0787564', 2, 2, '1', 'staff', 'finance', '2020-01-20 09:19:09', 'user_no_image.jpg', '2020-01-20 09:18:58', 1),
(37, 'testlagi1', '$2y$10$sb0NQeRIx1I/cvdgUFWI6.x3k.y8/GzslkTAwHB9syo3nI5aKRLgK', 'testlagidong3@gmail.com', 'test lagi dong hehe', '09453452344', 2, 2, '1', 'staff', 'it', '2020-01-20 09:38:48', 'user_no_image.jpg', '2020-01-20 09:38:39', 1),
(38, 'cindyf', '$2y$10$8jvaSHFAeu75SHiNjqa9HeCImyXiMY.HDOp19xbPCTyDXKRKLp4Ia', 'fatresiacindy@gmail.com', 'Cindy Fatresia', '082150731158', 12, 2, '2', 'koordinator', 'finance', '2020-01-31 03:18:06', 'user_no_image.jpg', '2020-01-23 06:31:44', 1),
(39, 'adminit', '$2y$10$uOOOcbrn8oZHj2CMTrIkKueCoFaxRqAGuSPkg/1fPvI6u.B8qFX4i', 'itissunter@gmail.com', 'admin it is', '0574876546', 2, 2, '1', 'spv', 'it', '2020-02-04 07:24:37', 'user_no_image.jpg', '2020-01-30 09:00:56', 1),
(40, 'testit', '$2y$10$2v3OJETMGU1TR2lXXp3mB.nBBhIvJC4MA.3oOOWYPFh8g2aMhAIKe', 'vinz.lrn@gmail.com', 'test it', '08456845645', 2, 2, '1', 'staff', 'it', '2020-01-31 04:37:24', 'user_no_image.jpg', '2020-01-31 04:37:12', 1),
(41, 'afen', '$2y$10$9sES6H7dqs0hoVAiDU4.M.efULcQw12XHLusK6AXX8wWDl3TKXNEe', NULL, NULL, NULL, 12, 2, '2', 'spv', 'marketing-jgc', '2020-02-04 07:31:27', 'user_no_image.jpg', '2020-02-04 04:03:44', 1),
(42, 'testmarjgc', '$2y$10$.WODdLRbLGlI8Yx1I/pMGeDcBaZat22qvPlxJ9Fiza.Mb75SG3xtG', NULL, NULL, NULL, 1, 2, '1', 'staff', 'marketing-jgc', '2020-02-04 04:15:02', 'user_no_image.jpg', '2020-02-04 04:15:02', 1),
(43, 'xcvxcvxc', '$2y$10$JLmvDAMLeeYdq57HthjJg.0Zea.KfAZ9oogvAsDz5S7DXSP9BMPsG', NULL, NULL, NULL, 0, 0, '', 'staff', 'marketing-snt', '2020-02-04 04:28:41', 'user_no_image.jpg', '2020-02-04 04:28:41', 1),
(44, 'asdasdasd1', '$2y$10$9fjQScmY4Ay03F2fjybobOluwsMPP6pYUnNjWPtFAACIw32urkGoS', NULL, NULL, NULL, 0, 0, '1', 'staff', 'marketing-snt', '2020-02-04 04:30:43', 'user_no_image.jpg', '2020-02-04 04:30:43', 1),
(45, 'mila', '$2y$10$H6RF3samwfFuufHmceWTpOjva7auKsXlXKooVE0l0tpzklcxALiP2', NULL, NULL, NULL, 0, 0, '1', 'staff', 'marketing-jgc', '2020-02-04 07:35:02', 'user_no_image.jpg', '2020-02-04 07:35:02', 1),
(46, '123123asd', '$2y$10$a3m6zr/w7RJAezkmDDHB3.EAFfF9bmbuT4K1NXDITIMACkx7IaCdC', NULL, NULL, NULL, 0, 0, '1', 'staff', 'marketing-jgc', '2020-02-04 07:40:13', 'user_no_image.jpg', '2020-02-04 07:40:13', 1),
(47, 'xcvxcv21', '$2y$10$nxfLbLUbfkCRr8UsLRjyDeTlLrDj9tiLRLPZTgYJ9wR9eW3U4WavK', NULL, NULL, NULL, 0, 0, '1', 'staff', 'marketing-snt', '2020-02-04 07:41:24', 'user_no_image.jpg', '2020-02-04 07:41:24', 1),
(48, 'yani', '$2y$10$QeqPuegOvtrEAVWHNnyAZeWluHReM0vA0wiTcMNYQySaF385uhFZ.', NULL, NULL, NULL, 0, 0, '1', 'staff', 'marketing-jgc', '2020-02-04 07:44:31', 'user_no_image.jpg', '2020-02-04 07:44:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
