-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 07:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `harga_beli` int(255) DEFAULT NULL,
  `harga_jual` int(255) DEFAULT NULL,
  `setok` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
  `id_cookie` int(11) NOT NULL,
  `id_user_cookie` int(11) NOT NULL,
  `cookie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`id_cookie`, `id_user_cookie`, `cookie`) VALUES
(1, 1, 'r0tudf1vu2cfpdg67btfoxyz3fv1r4kx'),
(2, 4, 'p17m999ovhns6pztuxbbqv03uy06smrk0l1jr2ex7m2sct8dazry8zpf390l4mejlb0k3hi0tl1cfpktde8ns6m6azdxconq5a47dwp9evyhe1n4aci6d5dni74yo7kz'),
(3, 6, 'nmfkcs8j9ii0ksylox5shdy4scl8bopr492tfd4b2byt0ec7l6evhtj5kz4kfq6bw72znmufh2l2ckh0a7nc25ajxg29bixs2mf77s14sc27lkdxsj6mtpd8huwft8hef5eb8zo7zw9dwdyirw5njebdak5x7soiq98dcsikz1yptkquxk63q7s12x6ct94a'),
(4, 7, '9uodwgutpn020w7cbweo13sfc3btezm7rthih54bl7537qjj6z2lw7cf19em9npbs0nfvjmpexgfq97vy2mggxw6u51zmart2w0cs9gnv09zs9l478pxdjo013g4sw7dq8ea1dsm575ejmf0lcnzwv7d4p02dc9b8ebrjn67xckry6g0dwmit3ey2zecyr6olmdpxpr17g6s2kcw2it7bwvozypz2zqn'),
(5, 8, 'gvuk920881qfqyd9crbdwl45geoma7yqlxdmvj6k7jodqqetkdv5fz74sfbka6h8whrioltaukx2fww9cu3u1rvivby9ckmsd6wxmqmwngc5x4kidjy0cseyg8l19po4u9sl3k39ib5p04brf1vwhh9oksak68itvrg1b5qqai5eok8cxs8xxfi9fqc9wgnpn4v0yw6vu2osypdsd2cxh27hlbwa5ce1rj7wfkg4df3areibqc49kvzx0qnvpfn'),
(6, 9, 'f0pv19wplf535mktlheltdmlp89yohhfm6x8h3v06av7elds4ronj1f3ucf1bluvr0i08xnyg9a4ulpdmnsr7s0flxigehc0iycaw1x9detxngwga99qwr23g4h88cozapac985hep7knpabt765l2m0izqhk9ae8s68qnarbuogh1tyid2vt9so8ky8fszed5qlmxniavz1v4o1gacxkvul71dchvhjbvjdeys3t7k1924x3avglwsn2gif8hh'),
(7, 10, 'rop5sh817ij7x1oom8hocee2iqhc5m77r35z8yagr7afdfep96i59h5eeg9aeep93nczr3p681tws8ytox77zdtpzc43l1k2oxfwf8xndj3q7up0aakgf7g3ud834ejbwnlmln3y6erdibzz2t99hbofli680o4fxfj6b20k8jucg4aj8ceeqt00j8y5ojtwk9lzbr720i6o7vk7fys6c67hxz09jqup8fhavp8m0bynihc93z05psnlszpzo5x'),
(8, 14, '95fpl7jmmhkcxanhiz4o3xd367uyuid780uuqmsvoh1qxyh17ipggdcd45zuxbpczsdgdrunwicu4wj7r8o02jjo08knnc7qlmydxdcl51arw9r549rfsrkolvzumjyv4guejjfpbonig9dqnlxlq5qavk7ctx19tjgd6ahxy3wqw9kwo2g5mowni0uue5h6htiv2xayhfimb3m24buwuztu9ux8vjcx6tsghnlej019o3n8c5rnz8yirwbpw16');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `browser_version` varchar(200) NOT NULL,
  `os` varchar(200) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `online` int(11) NOT NULL,
  `waktu_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `id_user`, `browser`, `browser_version`, `os`, `ip_address`, `online`, `waktu_login`) VALUES
(389, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:10:16'),
(390, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 10:24:53'),
(391, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 10:25:46'),
(392, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 10:28:03'),
(393, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 10:29:38'),
(394, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 10:51:18'),
(395, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:39:58'),
(396, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:44:09'),
(397, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:44:30'),
(398, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:47:59'),
(399, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:52:22'),
(400, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 11:52:35'),
(401, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 01:02:52'),
(402, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 01:25:34'),
(403, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 01:25:58'),
(404, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 02:52:56'),
(405, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 03:06:49'),
(406, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 03:08:47'),
(407, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 03:09:04'),
(408, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 03:09:16'),
(409, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2022-01-01 03:33:28'),
(410, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:07:27'),
(411, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:05:12'),
(412, 8, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:05:26'),
(413, 10, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:05:52'),
(414, 9, 'Chrome', '97.0.4692.71', 'Windows 7', '::1', 0, '2010-01-01 12:11:38'),
(415, 9, 'Internet Explorer', '8.0', 'Windows 7', '::1', 0, '2010-01-01 12:45:44'),
(416, 9, 'Firefox', '94.0', 'Windows 7', '127.0.0.1', 0, '2010-01-01 12:50:15'),
(417, 9, 'Firefox', '94.0', 'Windows 7', '127.0.0.1', 0, '2010-01-01 12:55:07'),
(418, 9, 'Firefox', '94.0', 'Windows 7', '127.0.0.1', 0, '2022-01-01 03:31:32'),
(419, 9, 'Firefox', '94.0', 'Windows 7', '127.0.0.1', 0, '2022-01-01 03:33:43'),
(420, 8, 'Chrome', '97.0.4692.99', 'Windows 7', '::1', 0, '2022-02-02 08:42:32'),
(421, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:49:16'),
(422, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:49:39'),
(423, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:52:19'),
(424, 9, 'Firefox', '96.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:58:28'),
(425, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:11:50'),
(426, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:13:45'),
(427, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:14:35'),
(428, 10, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:15:38'),
(429, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:15:56'),
(430, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:23:35'),
(431, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:31:22'),
(432, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:39:46'),
(433, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:42:21'),
(434, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:43:48'),
(435, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:44:07'),
(436, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:53:41'),
(437, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:54:43'),
(438, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:03:08'),
(439, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:06:23'),
(440, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:46:37'),
(441, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:47:40'),
(442, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:48:59'),
(443, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 11:50:38'),
(444, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:10:48'),
(445, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:16:52'),
(446, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:18:08'),
(447, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:18:42'),
(448, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:19:30'),
(449, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:20:11'),
(450, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:45:39'),
(451, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:50:59'),
(452, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 12:58:40'),
(453, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 01:02:19'),
(454, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 01:23:26'),
(455, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 01:28:53'),
(456, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 01:44:45'),
(457, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 02:54:29'),
(458, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:53:12'),
(459, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:06:57'),
(460, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:20:40'),
(461, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:45:59'),
(462, 8, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 03:51:21'),
(463, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 03:51:59'),
(464, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:29:04'),
(465, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:47:40'),
(466, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 10:09:41'),
(467, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 01:56:38'),
(468, 9, 'Chrome', '96.0.4664.110', 'Windows 10', '::1', 0, '2022-02-02 03:37:58'),
(469, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 03:47:15'),
(470, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:49:38'),
(471, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 08:39:41'),
(472, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:30:01'),
(473, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 04:15:17'),
(474, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:13:51'),
(475, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 08:17:46'),
(476, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 08:51:08'),
(477, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 08:50:55'),
(478, 9, 'Firefox', '94.0', 'Windows 10', '127.0.0.1', 0, '2022-02-02 09:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id_log`, `id_user`, `nama`, `status`, `login`, `logout`) VALUES
(1, 9, 'kasir', 'Kasir', '2022-02-02 09:52:19', '2022-02-02 09:55:35'),
(2, 9, 'kasir', 'Kasir', '2022-02-02 09:58:28', '0000-00-00 00:00:00'),
(3, 9, 'kasir', 'Kasir', '2022-02-02 10:11:50', '2022-02-02 10:13:29'),
(4, 8, 'admin', 'Admin', '2022-02-02 10:13:45', '2022-02-02 10:13:49'),
(5, 9, 'kasir', 'Kasir', '2022-02-02 10:14:35', '2022-02-02 10:15:29'),
(6, 10, 'superadmin', 'Superadmin', '2022-02-02 10:15:38', '2022-02-02 10:15:50'),
(7, 9, 'kasir', 'Kasir', '2022-02-02 10:15:56', '2022-02-02 10:22:53'),
(8, 9, 'kasir', 'Kasir', '2022-02-02 10:23:35', '2022-02-02 10:31:00'),
(9, 9, 'kasir', 'Kasir', '2022-02-02 10:31:22', '2022-02-02 10:39:20'),
(10, 9, 'kasir', 'Kasir', '2022-02-02 10:39:46', '0000-00-00 00:00:00'),
(11, 9, 'kasir', 'Kasir', '2022-02-02 10:42:21', '2022-02-02 10:43:40'),
(12, 8, 'admin', 'Admin', '2022-02-02 10:43:48', '2022-02-02 10:44:02'),
(13, 9, 'kasir', 'Kasir', '2022-02-02 10:44:07', '2022-02-02 10:53:25'),
(14, 8, 'admin', 'Admin', '2022-02-02 10:53:41', '2022-02-02 10:54:36'),
(15, 9, 'kasir', 'Kasir', '2022-02-02 10:54:43', '2022-02-02 11:02:56'),
(16, 8, 'admin', 'Admin', '2022-02-02 11:03:08', '2022-02-02 11:06:18'),
(17, 9, 'kasir', 'Kasir', '2022-02-02 11:06:23', '2022-02-02 11:46:32'),
(18, 8, 'admin', 'Admin', '2022-02-02 11:46:37', '2022-02-02 11:47:34'),
(19, 9, 'kasir', 'Kasir', '2022-02-02 11:47:40', '2022-02-02 11:48:42'),
(20, 9, 'kasir', 'Kasir', '2022-02-02 11:48:59', '2022-02-02 11:50:30'),
(21, 9, 'kasir', 'Kasir', '2022-02-02 11:50:38', '2022-02-02 12:10:38'),
(22, 9, 'kasir', 'Kasir', '2022-02-02 12:10:48', '2022-02-02 12:16:43'),
(23, 9, 'kasir', 'Kasir', '2022-02-02 12:16:52', '2022-02-02 12:17:55'),
(24, 8, 'admin', 'Admin', '2022-02-02 12:18:08', '2022-02-02 12:18:37'),
(25, 9, 'kasir', 'Kasir', '2022-02-02 12:18:42', '2022-02-02 12:19:22'),
(26, 8, 'admin', 'Admin', '2022-02-02 12:19:30', '2022-02-02 12:19:45'),
(27, 9, 'kasir', 'Kasir', '2022-02-02 12:20:11', '2022-02-02 12:45:23'),
(28, 9, 'kasir', 'Kasir', '2022-02-02 12:45:39', '2022-02-02 12:50:50'),
(29, 9, 'kasir', 'Kasir', '2022-02-02 12:50:59', '2022-02-02 12:58:32'),
(30, 9, 'kasir', 'Kasir', '2022-02-02 12:58:40', '2022-02-02 01:02:12'),
(31, 9, 'kasir', 'Kasir', '2022-02-02 01:02:19', '0000-00-00 00:00:00'),
(32, 9, 'kasir', 'Kasir', '2022-02-02 01:23:26', '0000-00-00 00:00:00'),
(33, 9, 'kasir', 'Kasir', '2022-02-02 01:28:53', '2022-02-02 01:44:37'),
(34, 9, 'kasir', 'Kasir', '2022-02-02 01:44:45', '2022-02-02 02:54:20'),
(35, 9, 'kasir', 'Kasir', '2022-02-02 02:54:29', '0000-00-00 00:00:00'),
(36, 9, 'kasir', 'Kasir', '2022-02-02 09:53:12', '0000-00-00 00:00:00'),
(37, 9, 'kasir', 'Kasir', '2022-02-02 10:06:57', '2022-02-02 10:20:23'),
(38, 9, 'kasir', 'Kasir', '2022-02-02 10:20:40', '2022-02-02 10:21:47'),
(39, 9, 'kasir', 'Kasir', '2022-02-02 10:45:59', '2022-02-02 03:51:14'),
(40, 8, 'admin', 'Admin', '2022-02-02 03:51:21', '2022-02-02 03:51:54'),
(41, 9, 'kasir', 'Kasir', '2022-02-02 03:51:59', '2022-02-02 03:56:49'),
(42, 9, 'kasir', 'Kasir', '2022-02-02 09:29:04', '0000-00-00 00:00:00'),
(43, 9, 'kasir', 'Kasir', '2022-02-02 09:47:40', '0000-00-00 00:00:00'),
(44, 9, 'kasir', 'Kasir', '2022-02-02 10:09:41', '2022-02-02 01:56:25'),
(45, 9, 'kasir', 'Kasir', '2022-02-02 01:56:38', '2022-02-02 03:36:59'),
(46, 9, 'kasir', 'Kasir', '2022-02-02 03:37:58', '0000-00-00 00:00:00'),
(47, 9, 'kasir', 'Kasir', '2022-02-02 03:47:15', '0000-00-00 00:00:00'),
(48, 9, 'kasir', 'Kasir', '2022-02-02 09:49:38', '0000-00-00 00:00:00'),
(49, 9, 'kasir', 'Kasir', '2022-02-02 08:39:41', '0000-00-00 00:00:00'),
(50, 9, 'kasir', 'Kasir', '2022-02-02 09:30:01', '2022-02-02 04:07:45'),
(51, 9, 'kasir', 'Kasir', '2022-02-02 04:15:17', '2022-02-02 04:15:29'),
(52, 9, 'kasir', 'Kasir', '2022-02-02 09:13:51', '0000-00-00 00:00:00'),
(53, 9, 'kasir', 'Kasir', '2022-02-02 08:17:46', '2022-02-02 03:40:27'),
(54, 9, 'kasir', 'Kasir', '2022-02-02 08:51:08', '2022-02-02 03:10:34'),
(55, 9, 'kasir', 'Kasir', '2022-02-02 08:50:55', '0000-00-00 00:00:00'),
(56, 9, 'kasir', 'Kasir', '2022-02-02 09:15:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `nama`, `level`, `aktivitas`, `waktu`) VALUES
(1, 'admin', 'Admin', 'Menambahkan data warung \'Pempek ID : -\'', '2022-01-01 10:26:55'),
(2, 'admin', 'Admin', 'Menambahkan data warung \'Nasi Padang ID : -\'', '2022-01-01 10:27:54'),
(3, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2010-01-01 12:05:20'),
(4, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 10:02:46'),
(5, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 10:13:20'),
(6, 'admin', 'Admin', 'Mengubah data warung \'Baso Tahu Siomay ID : 19\'', '2022-02-02 10:43:59'),
(7, 'admin', 'Admin', 'Menambahkan data warung \'Teras APA Chinese Food ID : 12\'', '2022-02-02 10:54:30'),
(8, 'admin', 'Admin', 'Menambahkan data warung \'intimart\'', '2022-02-02 11:03:38'),
(9, 'admin', 'Admin', 'Mengubah data warung \'sate madura\'', '2022-02-02 12:19:43'),
(10, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:06:19'),
(11, 'admin', 'Admin', 'Menambahkan data warung \'testing\'', '2022-02-02 03:51:42'),
(12, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:52:24'),
(13, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:53:34'),
(14, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:12:33'),
(15, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:12:50'),
(16, 'kasir', 'Kasir', 'Mengekspor data laporan penjualan ke Excel', '2022-02-02 03:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(255) NOT NULL,
  `kasir` varchar(255) NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `harga_brg` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `waktu` time NOT NULL,
  `pihak1` varchar(10) NOT NULL,
  `pihak2` varchar(10) NOT NULL,
  `pihak3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kasir`, `kode_brg`, `nama_brg`, `harga_brg`, `jumlah`, `total_harga`, `tgl_transaksi`, `waktu`, `pihak1`, `pihak2`, `pihak3`) VALUES
(83, 'kasir', '3273110201710002', 'intimart', '2700', '1', '2700', '2022-02-02', '12:46:00', '2160', '540', '0'),
(180, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-02', '14:10:00', '2000', '500', '0'),
(223, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-03', '12:03:00', '5600', '1400', '0'),
(242, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-03', '12:30:00', '2400', '600', '0'),
(268, 'kasir', '3273110201710002', 'intimart', '6000', '1', '6000', '2022-02-03', '12:53:00', '4800', '1200', '0'),
(320, 'kasir', '3273110201710002', 'intimart', '6000', '1', '6000', '2022-02-03', '14:34:00', '4800', '1200', '0'),
(325, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-03', '14:57:00', '2400', '600', '0'),
(351, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-04', '11:40:00', '2000', '500', '0'),
(369, 'kasir', '3273110201710002', 'intimart', '5000', '1', '5000', '2022-02-04', '12:00:00', '4000', '1000', '0'),
(373, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-04', '12:03:00', '2000', '500', '0'),
(378, 'kasir', '3273110201710002', 'intimart', '8500', '1', '8500', '2022-02-04', '12:06:00', '6800', '1700', '0'),
(391, 'kasir', '3273110201710002', 'intimart', '8500', '1', '8500', '2022-02-04', '12:15:00', '6800', '1700', '0'),
(396, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-04', '12:19:00', '2000', '500', '0'),
(398, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-04', '12:21:00', '2000', '500', '0'),
(416, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-04', '12:43:00', '2000', '500', '0'),
(483, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-07', '10:11:00', '2000', '500', '0'),
(497, 'kasir', '3273110201710002', 'intimart', '6000', '1', '6000', '2022-02-07', '12:11:00', '4800', '1200', '0'),
(501, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-07', '12:14:00', '2400', '600', '0'),
(510, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-07', '12:38:00', '5600', '1400', '0'),
(622, 'kasir', '3273110201710002', 'intimart', '5000', '1', '5000', '2022-02-08', '13:44:00', '4000', '1000', '0'),
(641, 'kasir', '3273110201710002', 'intimart', '10000', '1', '10000', '2022-02-09', '09:45:00', '8000', '2000', '0'),
(650, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-09', '11:16:00', '2400', '600', '0'),
(721, 'kasir', '3273110201710002', 'intimart', '10000', '1', '10000', '2022-02-10', '11:55:00', '8000', '2000', '0'),
(722, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-10', '11:58:00', '2400', '600', '0'),
(729, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-10', '12:14:00', '2400', '600', '0'),
(793, 'kasir', '3273110201710002', 'intimart', '14000', '1', '14000', '2022-02-11', '09:54:00', '11200', '2800', '0'),
(812, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-11', '12:09:00', '2400', '600', '0'),
(817, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-11', '12:19:00', '2400', '600', '0'),
(828, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-11', '12:51:00', '2400', '600', '0'),
(876, 'kasir', '3273110201710002', 'intimart', '14000', '1', '14000', '2022-02-14', '11:26:00', '11200', '2800', '0'),
(918, 'kasir', '3273110201710002', 'intimart', '9000', '1', '9000', '2022-02-14', '13:02:00', '7200', '1800', '0'),
(949, 'kasir', '3273110201710002', 'intimart', '6000', '1', '6000', '2022-02-15', '09:26:00', '4800', '1200', '0'),
(952, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-15', '10:18:00', '5600', '1400', '0'),
(956, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-15', '10:47:00', '5600', '1400', '0'),
(958, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-15', '11:03:00', '2400', '600', '0'),
(959, 'kasir', '3273110201710002', 'intimart', '3000', '1', '3000', '2022-02-15', '11:05:00', '2400', '600', '0'),
(982, 'kasir', '3273110201710002', 'intimart', '6500', '1', '6500', '2022-02-15', '12:05:00', '5200', '1300', '0'),
(985, 'kasir', '3273110201710002', 'intimart', '9500', '1', '9500', '2022-02-15', '12:12:00', '7600', '1900', '0'),
(992, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-15', '12:35:00', '5600', '1400', '0'),
(995, 'kasir', '3273110201710002', 'intimart', '2400', '1', '2400', '2022-02-15', '12:46:00', '1920', '480', '0'),
(1014, 'kasir', '3273110201710002', 'intimart', '7000', '1', '7000', '2022-02-15', '13:28:00', '5600', '1400', '0'),
(1095, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '28000', '1', '28000', '2022-02-17', '09:24:00', '22400', '5600', '0'),
(1096, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '14000', '1', '14000', '2022-02-17', '09:49:00', '11200', '2800', '0'),
(1097, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '60000', '1', '60000', '2022-02-17', '10:19:00', '48000', '12000', '0'),
(1098, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '16000', '1', '16000', '2022-02-17', '10:57:00', '12800', '3200', '0'),
(1099, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '59000', '1', '59000', '2022-02-17', '11:14:00', '47200', '11800', '0'),
(1100, 'kasir', '3273174205760001', 'Dapoer Meyva ID : 15', '13000', '1', '13000', '2022-02-17', '11:36:00', '10400', '2600', '0'),
(1101, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '20000', '1', '20000', '2022-02-17', '11:50:00', '16000', '4000', '0'),
(1102, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '22000', '1', '22000', '2022-02-17', '11:57:00', '17600', '4400', '0'),
(1103, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '10000', '1', '10000', '2022-02-17', '11:58:00', '8000', '2000', '0'),
(1104, 'kasir', '3277011902910002', 'sate madura', '20000', '1', '20000', '2022-02-17', '12:01:00', '16000', '4000', '0'),
(1105, 'kasir', '3273175105650002', 'Pempek ID : -', '26500', '1', '26500', '2022-02-17', '12:03:00', '21200', '5300', '0'),
(1106, 'kasir', '3273045507700006', 'Ayam Geprek INTI ID : 14', '57000', '1', '57000', '2022-02-17', '12:06:00', '45600', '11400', '0'),
(1107, 'kasir', '3273175105650002', 'Pempek ID : -', '10500', '1', '10500', '2022-02-17', '12:08:00', '8400', '2100', '0'),
(1108, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '24000', '1', '24000', '2022-02-17', '12:16:00', '19200', '4800', '0'),
(1109, 'kasir', '3273175105650002', 'Pempek ID : -', '20000', '1', '20000', '2022-02-17', '12:26:00', '16000', '4000', '0'),
(1110, 'kasir', '3273044605780003', 'Waroeng Chaca ID : 23', '150000', '1', '150000', '2022-02-17', '12:27:00', '120000', '30000', '0'),
(1111, 'kasir', '3273175105650002', 'Pempek ID : -', '10500', '1', '10500', '2022-02-17', '12:30:00', '8400', '2100', '0'),
(1112, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '22000', '1', '22000', '2022-02-17', '12:31:00', '17600', '4400', '0'),
(1113, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '16000', '1', '16000', '2022-02-17', '12:33:00', '12800', '3200', '0'),
(1114, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '22000', '1', '22000', '2022-02-17', '12:34:00', '17600', '4400', '0'),
(1115, 'kasir', '3277011902910002', 'sate madura', '20000', '1', '20000', '2022-02-17', '12:36:00', '16000', '4000', '0'),
(1116, 'kasir', '3277011902910002', 'sate madura', '20000', '1', '20000', '2022-02-17', '12:37:00', '16000', '4000', '0'),
(1117, 'kasir', '3273044605780003', 'Waroeng Chaca ID : 23', '60000', '1', '60000', '2022-02-17', '12:38:00', '48000', '12000', '0'),
(1118, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '15000', '1', '15000', '2022-02-17', '12:42:00', '12000', '3000', '0'),
(1119, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '50000', '1', '50000', '2022-02-17', '12:49:00', '40000', '10000', '0'),
(1120, 'kasir', '3277011902910002', 'sate madura', '5000', '1', '5000', '2022-02-17', '12:52:00', '4000', '1000', '0'),
(1121, 'kasir', '3277011902910002', 'sate madura', '22000', '1', '22000', '2022-02-17', '12:55:00', '17600', '4400', '0'),
(1122, 'kasir', '3273171602780004', 'Baso Tahu Siomay ID : 19', '17500', '1', '17500', '2022-02-17', '12:55:00', '14000', '3500', '0'),
(1123, 'kasir', '3273045507700006', 'Ayam Geprek INTI ID : 14', '35000', '1', '35000', '2022-02-17', '12:57:00', '28000', '7000', '0'),
(1124, 'kasir', '3273110201710002', 'intimart', '2500', '1', '2500', '2022-02-17', '12:57:00', '2000', '500', '0'),
(1125, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '8000', '1', '8000', '2022-02-17', '12:58:00', '6400', '1600', '0'),
(1126, 'kasir', '3273045507700006', 'Ayam Geprek INTI ID : 14', '16000', '1', '16000', '2022-02-17', '13:01:00', '12800', '3200', '0'),
(1127, 'kasir', '3273045507700006', 'Ayam Geprek INTI ID : 14', '16000', '1', '16000', '2022-02-17', '13:03:00', '12800', '3200', '0'),
(1128, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '22000', '1', '22000', '2022-02-17', '13:06:00', '17600', '4400', '0'),
(1129, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '20000', '1', '20000', '2022-02-17', '13:08:00', '16000', '4000', '0'),
(1130, 'kasir', '3273175105650002', 'Pempek ID : -', '13000', '1', '13000', '2022-02-17', '13:08:00', '10400', '2600', '0'),
(1131, 'kasir', '3273045507700006', 'Ayam Geprek INTI ID : 14', '27000', '1', '27000', '2022-02-17', '13:09:00', '21600', '5400', '0'),
(1132, 'kasir', '3277011902910002', 'sate madura', '15000', '1', '15000', '2022-02-17', '13:10:00', '12000', '3000', '0'),
(1133, 'kasir', '3273174205760001', 'Dapoer Meyva ID : 15', '28000', '1', '28000', '2022-02-17', '13:14:00', '22400', '5600', '0'),
(1134, 'kasir', '3273176303700003', 'Teras APA Chinese Food ID : 12', '33000', '1', '33000', '2022-02-17', '13:43:00', '26400', '6600', '0'),
(1135, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '10000', '1', '10000', '2022-02-17', '13:51:00', '8000', '2000', '0'),
(1136, 'kasir', '3273174205760001', 'Dapoer Meyva ID : 15', '15000', '1', '15000', '2022-02-17', '13:51:00', '12000', '3000', '0'),
(1137, 'kasir', '3273174205760001', 'Dapoer Meyva ID : 15', '40000', '1', '40000', '2022-02-17', '13:53:00', '32000', '8000', '0'),
(1138, 'kasir', '3273131605770003', 'Cihita Rasa ID : 22', '32000', '1', '32000', '2022-02-17', '13:53:00', '25600', '6400', '0'),
(1139, 'kasir', '3277011902910002', 'sate madura', '53000', '1', '53000', '2022-02-17', '13:53:00', '42400', '10600', '0');

-- --------------------------------------------------------

--
-- Table structure for table `persenan`
--

CREATE TABLE `persenan` (
  `id` int(11) NOT NULL,
  `pihak` varchar(50) NOT NULL,
  `persenan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persenan`
--

INSERT INTO `persenan` (`id`, `pihak`, `persenan`) VALUES
(1, 'WARUNG', '80'),
(2, 'KOPERASI', '20'),
(3, 'INTI', '0');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(225) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `telephon_toko` varchar(50) NOT NULL,
  `alamat_toko` varchar(100) NOT NULL,
  `moto_toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `telephon_toko`, `alamat_toko`, `moto_toko`) VALUES
(54, 'Pujasera Koperasi INTI', '022-42821965', 'Jl. Moh. Toha No. 77 Cigereleng Regol Bandung Jawa Barat', 'Pujasera Koperasi INTI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `aktif` int(1) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `telephone`, `aktif`, `level`) VALUES
(8, 'admin', 'admin', 'admin', '1234', 1, 1),
(9, 'kasir', 'kasir', 'kasir', '1234', 1, 0),
(10, 'superadmin', 'superadmin', 'superadmin', '1234', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` int(20) NOT NULL,
  `kode_warung` varchar(100) NOT NULL,
  `nama_warung` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `kode_warung`, `nama_warung`) VALUES
(32, '3277011902910002', 'sate madura'),
(33, '3273045507700006', 'Ayam Geprek INTI ID : 14'),
(34, '3273174205760001', 'Dapoer Meyva ID : 15'),
(35, '3273171602780004', 'Baso Tahu Siomay ID : 19'),
(36, '3204081701970002', 'Tutug Oncom ID : 21'),
(37, '3273131605770003', 'Cihita Rasa ID : 22'),
(38, '3273044605780003', 'Waroeng Chaca ID : 23'),
(39, '3273156105650001', 'Dapoer Bebek ID : 4'),
(40, '3204081410620002', 'Super Hemat ID : 5'),
(42, '3273175105650002', 'Pempek ID : -'),
(43, '3273104507710003', 'Nasi Padang ID : -'),
(44, '3273176303700003', 'Teras APA Chinese Food ID : 12'),
(45, '3273110201710002', 'intimart'),
(46, '1234', 'testing'),
(47, '3273195412720002', 'MIE Kocok ID : 20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`id_cookie`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `persenan`
--
ALTER TABLE `persenan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_warung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `id_cookie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1140;

--
-- AUTO_INCREMENT for table `persenan`
--
ALTER TABLE `persenan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_warung` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
