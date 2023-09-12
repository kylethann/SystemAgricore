-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 02:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agricoresystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `Profile_Photo` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullName`, `email`, `password`, `DateCreated`, `Profile_Photo`, `position_id`) VALUES
(1, 'Rose ', 'Rose Senangote', 'senangote@email.com', '202cb962ac59075b964b07152d234b70', '2023-06-28 15:35:43', '../Uploads/profile_photos/65004ccd62dde0.11592446.jpg', 1),
(2, 'rey', 'lily', 'lily@email.com', '202cb962ac59075b964b07152d234b70', '2023-06-28 15:39:46', '../Uploads/profile_photos/64fd5387537a83.48104054.jpg', 1),
(3, 'Maria', 'Maria', 'maria@email.com', '202cb962ac59075b964b07152d234b70', '2023-06-28 15:55:41', '', 1),
(5, 'lea', 'lea torres', 'torres@email.com', '202cb962ac59075b964b07152d234b70', '2023-06-28 16:45:31', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `action` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `user_id`, `role`, `date`, `action`) VALUES
(1, 1, 'Admin', '2023-06-28 16:39:53', 'New admin: osjf added to the system.'),
(2, 1, 'Admin', '2023-06-28 16:45:31', 'New admin: lea added to the system.'),
(3, 5, 'Admin', '2023-06-28 16:59:12', 'New admin: brus added to the system.'),
(4, 5, 'Admin', '2023-06-28 17:00:21', 'New admin: wr added to the system.'),
(5, 5, 'Admin', '2023-06-28 17:04:36', 'New admin: lia added to the system.'),
(6, 1, 'Admin', '2023-06-29 16:26:24', 'New admin: tan added to the system.'),
(7, 1, 'Admin', '2023-06-29 16:29:14', 'New admin: may added to the system.'),
(8, 1, 'Admin', '2023-06-29 17:01:45', 'New admin: mika added to the system.'),
(9, 1, 'Admin', '2023-06-29 17:41:46', 'New admin: bae added to the system.'),
(10, 1, 'Admin', '2023-06-29 20:26:04', 'New admin: erica added to the system.'),
(11, 1, 'Admin', '2023-06-30 15:40:36', 'New admin: leni added to the system.'),
(12, 1, 'Admin', '2023-06-30 16:44:29', 'New admin: bini added to the system.'),
(13, 1, 'Admin', '2023-06-30 18:10:36', 'New admin: bianca added to the system.'),
(14, 1, 'Admin', '2023-06-30 19:47:28', 'New admin: sample added to the system.'),
(15, 1, 'Admin', '2023-06-30 19:53:07', 'New admin: sam2 added to the system.'),
(16, 5, 'Client', '2023-07-11 00:29:43', 'New admin: josh added to the system.'),
(17, 5, 'Client', '2023-07-11 00:33:02', 'New admin: blessy added to the system.'),
(18, 5, 'Client', '2023-07-11 00:35:06', 'New admin: MERY added to the system.'),
(19, 1, 'farmer1', '2023-07-15 04:23:53', 'New Farmer: 09553883694 added to the system.'),
(20, 3, 'farmer1', '2023-07-15 04:27:24', 'New Farmer: astra added to the system.'),
(21, 1, 'farmer1', '2023-07-15 04:33:02', 'New Farmer: 09553883694 added to the system.'),
(22, 5, 'farmer1', '2023-07-15 04:51:49', 'New Farmer: 94557225421 added to the system.'),
(23, 6, 'Farmer', '2023-07-15 04:53:57', 'New Farmer: bernadette added to the system.'),
(24, 7, 'Farmer', '2023-07-15 04:56:29', 'New Farmer: maya added to the system.'),
(25, 8, 'Admin', '2023-07-15 20:44:05', 'New Farmer: mike added to the system.'),
(26, 9, 'Admin', '2023-07-15 20:50:55', 'New Farmer: mile added to the system.'),
(27, 2, 'Admin', '2023-07-15 20:54:09', 'New admin: bebe added to the system.'),
(28, 2, 'Admin', '2023-07-15 20:58:26', 'New admin: qq added to the system.'),
(29, 2, 'admin', '2023-07-15 23:55:26', 'ID # deleted from  table'),
(30, 2, 'admin', '2023-07-15 23:57:08', 'ID # deleted from  table'),
(31, 1, 'Admin', '2023-07-24 23:57:11', 'Login'),
(32, 1, 'Admin', '2023-07-24 23:57:30', 'Login'),
(33, 1, 'Admin', '2023-07-25 00:07:04', 'Login'),
(34, 1, 'Admin', '2023-07-25 00:47:33', 'Login'),
(35, 2, 'Admin', '2023-07-26 12:25:40', 'Login'),
(36, 2, 'Admin', '2023-07-27 15:00:03', 'Login'),
(37, 10, 'Admin', '2023-07-27 15:06:58', 'New Farmer: kat added to the system.'),
(38, 11, 'Admin', '2023-07-27 17:33:10', 'New Farmer: we added to the system.'),
(39, 2, 'Admin', '2023-07-27 17:42:45', 'Login'),
(40, 1, 'Admin', '2023-07-27 23:31:34', 'Login'),
(41, 0, '12', '2023-07-27 23:44:59', 'New Farmer: meng added to the system.'),
(42, 0, '17', '2023-07-27 23:51:09', 'New Farmer: key added to the system.'),
(43, 0, '18', '2023-07-27 23:54:16', 'New Client: bright added to the system.'),
(44, 19, 'Client', '2023-07-27 23:58:17', 'New Client: bshfd added to the system.'),
(45, 13, 'Farmer', '2023-07-28 00:00:37', 'New Farmer: sfdhv added to the system.'),
(46, 50, 'Admin', '2023-07-28 00:11:12', 'New Admin: kit added to the system.'),
(47, 2, 'Admin', '2023-07-31 16:27:52', 'Login'),
(48, 2, 'Admin', '2023-07-31 17:15:08', 'ID # deleted from the system'),
(49, 2, 'Admin', '2023-07-31 17:15:23', 'ID # deleted from the system'),
(50, 2, 'Admin', '2023-07-31 17:17:32', 'ID # deleted from the system'),
(51, 20, 'Client', '2023-07-31 17:44:39', 'New Client: jash added to the system.'),
(52, 2, 'Admin', '2023-07-31 18:07:38', 'ID # deleted from the system'),
(53, 2, 'Admin', '2023-07-31 18:18:14', 'ID # deleted from the system'),
(54, 2, 'Admin', '2023-07-31 18:19:15', 'ID # deleted from the system'),
(55, 2, 'Admin', '2023-07-31 18:28:13', 'ID # deleted from the system'),
(56, 2, 'Admin', '2023-08-02 00:13:41', 'Login'),
(57, 21, 'Client', '2023-08-02 01:03:44', 'New Client: sf added to the system.'),
(58, 2, 'Admin', '2023-08-03 00:01:23', 'Login'),
(59, 51, 'Admin', '2023-08-03 00:53:56', 'New Admin: kc added to the system.'),
(60, 2, 'Admin', '2023-08-03 01:47:18', 'Updated information of ID # from  table'),
(61, 2, 'Admin', '2023-08-03 01:52:12', 'Updated information of ID #40 from  table'),
(62, 41, 'Admin', '2023-08-03 02:02:45', 'Login'),
(63, 2, 'Admin', '2023-08-03 02:10:32', 'Updated information of Admin with ID #41 from table'),
(64, 41, 'Admin', '2023-08-03 02:11:14', 'Login'),
(65, 2, 'Admin', '2023-08-03 02:12:42', 'Updated information of Admin with ID #51 from table'),
(66, 2, 'Admin', '2023-08-03 02:13:48', 'Updated information of Admin with ID #51 from table'),
(67, 2, 'Admin', '2023-08-03 02:26:42', 'Updated information of Admin with ID #51 from table'),
(68, 52, 'Admin', '2023-08-03 02:39:54', 'New Admin: joy added to the system.'),
(69, 2, 'Admin', '2023-08-03 02:57:40', 'Admin with ID #46 Deleted from table'),
(70, 2, 'Admin', '2023-08-03 03:15:43', 'Updated information of Admin with ID #51 from table'),
(71, 51, 'Admin', '2023-08-03 03:16:53', 'Login'),
(72, 2, 'Admin', '2023-08-03 03:20:57', 'Updated information of Admin with ID #51 from table'),
(73, 2, 'Admin', '2023-08-03 03:25:47', 'Updated information of Admin with ID #51 from table'),
(74, 2, 'Admin', '2023-08-03 03:27:23', 'Admin with ID #51 Deleted from table'),
(75, 2, 'Admin', '2023-08-03 03:43:08', 'Admin with ID # Deleted from table'),
(76, 2, 'Admin', '2023-08-03 03:44:08', 'Admin with ID # Deleted from table'),
(77, 2, 'Admin', '2023-08-03 03:44:26', 'Admin with ID # Deleted from table'),
(78, 2, 'Admin', '2023-08-03 03:49:35', 'Admin with ID # Deleted from table'),
(79, 2, 'Admin', '2023-08-03 03:51:30', 'Admin with ID # Deleted from table'),
(80, 2, 'Admin', '2023-08-03 03:54:20', 'Admin with ID # Deleted from table'),
(81, 2, 'Admin', '2023-08-03 03:54:36', 'Admin with ID # Deleted from table'),
(82, 2, 'Admin', '2023-08-03 03:55:18', 'Admin with ID # Deleted from table'),
(83, 2, 'Admin', '2023-08-03 03:57:57', 'Admin with ID #50 Deleted from table'),
(84, 2, 'Admin', '2023-08-03 03:58:55', 'Admin with ID #48 Deleted from table.'),
(85, 2, 'Admin', '2023-08-03 04:00:23', 'Admin with ID #49 Deleted from table.'),
(86, 2, 'Admin', '2023-08-03 04:03:20', 'Admin with ID #42 Deleted from table.'),
(87, 53, 'Admin', '2023-08-03 04:09:07', 'New Admin: boss added to the system.'),
(88, 54, 'Admin', '2023-08-03 04:10:32', 'New Admin: noule added to the system.'),
(89, 2, 'Admin', '2023-08-03 04:14:12', 'Admin with ID #45 Deleted from table.'),
(90, 2, 'Admin', '2023-08-03 04:14:20', 'Admin with ID #41 Deleted from table.'),
(91, 2, 'Admin', '2023-08-04 23:58:07', 'Login'),
(92, 2, 'Admin', '2023-08-05 00:21:55', 'Admin with ID #13 Deleted from table.'),
(93, 2, 'Admin', '2023-08-05 00:24:23', 'Farmer with ID #13 Deleted from table.'),
(94, 55, 'Admin', '2023-08-05 00:36:35', 'New Admin: jh added to the system.'),
(95, 14, 'Farmer', '2023-08-05 00:42:50', 'New Farmer: jf added to the system.'),
(96, 2, 'Admin', '2023-08-05 01:19:39', 'Updated information of Farmer with ID # from table'),
(97, 2, 'Admin', '2023-08-05 01:23:49', 'Updated information of Farmer with ID # from table'),
(98, 2, 'Admin', '2023-08-05 01:29:52', 'Updated information of Farmer with ID # from table'),
(99, 2, 'Admin', '2023-08-05 01:38:34', 'Updated information of Farmer with ID # from table'),
(100, 2, 'Admin', '2023-08-05 01:39:59', 'Updated information of Farmer with ID #14 from table'),
(101, 2, 'Admin', '2023-08-05 01:43:24', 'Updated information of Farmer with ID #14 from table'),
(102, 2, 'Admin', '2023-08-05 01:43:35', 'Farmer with ID #14 Deleted from table.'),
(103, 2, 'Admin', '2023-08-05 02:04:34', 'Client with ID# was removed from the system.'),
(104, 2, 'Admin', '2023-08-05 02:04:46', 'Client with ID# was removed from the system.'),
(105, 2, 'Admin', '2023-08-05 02:05:32', 'Client with ID#21 was removed from the system.'),
(106, 22, 'Client', '2023-08-05 02:25:12', 'New Client: bf added to the system.'),
(107, 2, 'Admin', '2023-08-05 02:26:24', 'Client with ID#22 was removed from the system.'),
(108, 2, 'Admin', '2023-08-05 02:45:08', 'Updated information of Client with ID#19 from table.'),
(109, 2, 'Admin', '2023-08-05 02:45:52', 'Updated information of Client with ID#20 from table.'),
(110, 2, 'Admin', '2023-08-05 02:46:22', 'Updated information of Client with ID#20 from table.'),
(111, 2, 'Admin', '2023-08-05 02:48:57', 'Updated information of Client with ID#18 from table.'),
(112, 2, 'Admin', '2023-08-05 02:52:24', 'Updated information of Client user jagfe with ID#19 from table.'),
(113, 2, 'Admin', '2023-08-05 02:55:06', 'Updated information of Client user \'wfert\' with ID#20 from table.'),
(114, 2, 'Admin', '2023-08-05 02:55:56', 'Updated information of Client user \\sfaje89\\ with ID#20 from table.'),
(115, 2, 'Admin', '2023-08-05 02:57:57', 'Updated information of Client user “ with ID#19 from table.'),
(116, 56, 'Admin', '2023-08-05 03:07:48', 'New Admin: srf added to the system.'),
(117, 57, 'Admin', '2023-08-05 04:41:02', 'New Admin: ky added to the system.'),
(118, 58, 'Admin', '2023-08-05 06:15:14', 'New Admin: gege added to the system.'),
(119, 2, 'Admin', '2023-08-05 06:16:35', 'Updated information of Admin with ID #57 from table'),
(120, 2, 'Admin', '2023-08-05 06:16:42', 'Admin with ID #56 Deleted from table.'),
(121, 15, 'Farmer', '2023-08-05 06:18:09', 'New Farmer: jeje added to the system.'),
(122, 2, 'Admin', '2023-08-05 06:18:56', 'Updated information of Farmer with ID #10 from table'),
(123, 2, 'Admin', '2023-08-05 06:19:02', 'Farmer with ID #11 Deleted from table.'),
(124, 23, 'Client', '2023-08-05 06:20:14', 'New Client: kpayn added to the system.'),
(125, 2, 'Admin', '2023-08-05 06:20:42', 'Updated information of Client User with ID#20 from table.'),
(126, 2, 'Admin', '2023-08-05 06:20:48', 'Client with ID#19 was removed from the system.'),
(127, 2, 'Admin', '2023-08-09 17:30:54', 'Login'),
(128, 3, 'Admin', '2023-08-09 23:31:51', 'Login'),
(129, 59, 'Admin', '2023-08-10 00:22:36', 'New Admin: meyn added to the system.'),
(130, 3, 'Admin', '2023-08-10 00:22:47', 'Admin with ID #59 Deleted from table.'),
(131, 3, 'Admin', '2023-08-10 04:03:37', 'Farmer with ID #15 Deleted from table.'),
(132, 3, 'Admin', '2023-08-10 04:05:38', 'Farmer with ID #10 Deleted from table.'),
(133, 60, 'Admin', '2023-08-10 04:15:19', 'New Admin: mary1 added to the system.'),
(134, 3, 'Admin', '2023-08-10 04:17:04', 'Updated information of Admin with ID #55 from table'),
(135, 3, 'Admin', '2023-08-10 04:17:55', 'Updated information of Admin with ID #58 from table'),
(136, 3, 'Admin', '2023-08-10 04:19:40', 'Admin with ID #39 Deleted from table.'),
(137, 16, 'Farmer', '2023-08-10 04:22:01', 'New Farmer: bee added to the system.'),
(138, 3, 'Admin', '2023-08-10 04:22:50', 'Updated information of Farmer with ID #16 from table'),
(139, 3, 'Admin', '2023-08-10 04:31:45', 'Admin with ID #36 Deleted from table.'),
(140, 3, 'Admin', '2023-08-10 04:31:50', 'Admin with ID #37 Deleted from table.'),
(141, 3, 'Admin', '2023-08-10 04:31:55', 'Admin with ID #38 Deleted from table.'),
(142, 9, 'Admin', '2023-08-11 04:27:49', 'Login'),
(143, 3, 'Admin', '2023-08-11 17:10:35', 'Login'),
(144, 3, 'Admin', '2023-08-14 16:53:21', 'Login'),
(145, 3, 'Admin', '2023-08-14 18:21:35', 'Updated information of Admin with ID #58 from table'),
(146, 3, 'Admin', '2023-08-14 18:27:10', 'Updated information of Admin with ID #58 from table'),
(147, 3, 'Admin', '2023-08-14 18:36:23', 'Updated information of Admin with ID #60 from table'),
(148, 3, 'Admin', '2023-08-14 18:54:11', 'Updated information of Admin with ID #57 from table'),
(149, 3, 'Admin', '2023-08-14 19:04:03', 'Updated information of Admin with ID #58 from table'),
(150, 3, 'Admin', '2023-08-14 19:12:41', 'Updated information of Admin with ID #60 from table'),
(151, 61, 'Admin', '2023-08-14 19:16:37', 'New Admin: sample2 added to the system.'),
(152, 3, 'Admin', '2023-08-14 19:31:17', 'Updated information of Client User with ID#23 from table.'),
(153, 17, 'Farmer', '2023-08-14 19:45:00', 'New Farmer: sample3 added to the system.'),
(154, 62, 'Admin', '2023-08-14 19:55:10', 'New Admin: sample8 added to the system.'),
(155, 18, 'Farmer', '2023-08-14 19:57:33', 'New Farmer: sample11 added to the system.'),
(156, 24, 'Client', '2023-08-14 20:00:40', 'New Client: sample12 added to the system.'),
(157, 3, 'Admin', '2023-08-15 16:16:56', 'Login'),
(158, 3, 'Admin', '2023-08-17 11:34:25', 'Login'),
(159, 3, 'Admin', '2023-08-17 12:19:05', 'Admin with ID # Deleted from table.'),
(160, 3, 'Admin', '2023-08-17 12:19:13', 'Admin with ID # Deleted from table.'),
(161, 3, 'Admin', '2023-08-17 12:38:11', 'Admin with ID # Deleted from table.'),
(162, 3, 'Admin', '2023-08-17 12:38:28', 'Admin with ID # Deleted from table.'),
(163, 3, 'Admin', '2023-08-17 12:45:26', 'Admin with ID # Deleted from table.'),
(164, 3, 'Admin', '2023-08-17 12:49:09', 'Admin with ID # Deleted from table.'),
(165, 3, 'Admin', '2023-08-17 12:53:52', 'Admin with ID # Deleted from table.'),
(166, 3, 'Admin', '2023-08-17 12:53:58', 'Admin with ID # Deleted from table.'),
(167, 3, 'Admin', '2023-08-17 12:56:42', 'Login'),
(168, 9, 'Admin', '2023-08-17 23:29:39', 'Login'),
(169, 9, 'Admin', '2023-08-18 02:16:01', 'Admin with ID # Deleted from table.'),
(170, 9, 'Admin', '2023-08-18 02:31:21', 'Farmer with ID #17 Deleted from table.'),
(171, 19, 'Admin', '2023-08-18 02:38:35', 'New Farmer: berta added to the system.'),
(172, 9, 'Admin', '2023-08-18 03:52:22', 'Farmer with ID #18 Deleted from table.'),
(173, 43, 'Admin', '2023-08-18 17:41:07', 'Login'),
(174, 2, 'Admin', '2023-08-18 17:42:03', 'Login'),
(175, 2, 'Admin', '2023-08-18 17:54:11', 'Admin with ID # Deleted from table.'),
(176, 2, 'Admin', '2023-08-18 17:54:32', 'Admin with ID # Deleted from table.'),
(177, 2, 'Admin', '2023-08-18 17:55:06', 'Admin with ID # Deleted from table.'),
(178, 2, 'Admin', '2023-08-18 17:56:59', 'Admin with ID # Deleted from table.'),
(179, 2, 'Admin', '2023-08-18 17:57:04', 'Admin with ID # Deleted from table.'),
(180, 2, 'Admin', '2023-08-18 18:00:01', 'Admin with ID # Deleted from table.'),
(181, 2, 'Admin', '2023-08-18 18:20:59', 'Admin with ID # Deleted from table.'),
(182, 2, 'Admin', '2023-08-18 18:21:42', 'Admin with ID #26 Deleted from table.'),
(183, 2, 'Admin', '2023-08-18 18:25:45', 'Admin with ID #61 Deleted from table.'),
(184, 2, 'Admin', '2023-08-18 18:30:08', 'Admin with ID #62 Deleted from table.'),
(185, 2, 'Admin', '2023-08-18 18:30:15', 'Admin with ID #58 Deleted from table.'),
(186, 2, 'Admin', '2023-08-18 18:31:07', 'Admin with ID #28 Deleted from table.'),
(187, 2, 'Admin', '2023-08-18 18:31:16', 'Admin with ID #40 Deleted from table.'),
(188, 2, 'Admin', '2023-08-18 18:32:48', 'Admin with ID # Deleted from table.'),
(189, 2, 'Admin', '2023-08-18 18:33:23', 'Admin with ID #60 Deleted from table.'),
(190, 2, 'Admin', '2023-08-18 18:33:29', 'Admin with ID #57 Deleted from table.'),
(191, 2, 'Admin', '2023-08-18 18:35:38', 'Admin with ID #55 Deleted from table.'),
(192, 2, 'Admin', '2023-08-18 18:36:25', 'Admin with ID #47 Deleted from table.'),
(193, 2, 'Admin', '2023-08-18 18:36:44', 'Admin with ID #44 Deleted from table.'),
(194, 2, 'Admin', '2023-08-18 18:37:34', 'Admin with ID # Deleted from table.'),
(195, 2, 'Admin', '2023-08-18 18:37:50', 'Admin with ID # Deleted from table.'),
(196, 2, 'Admin', '2023-08-18 18:44:32', 'Admin with ID #54 Deleted from table.'),
(197, 2, 'Admin', '2023-08-18 18:47:39', 'Admin with ID # Deleted from table.'),
(198, 2, 'Admin', '2023-08-18 18:47:45', 'Admin with ID # Deleted from table.'),
(199, 2, 'Admin', '2023-08-18 18:48:05', 'Admin with ID # Deleted from table.'),
(200, 2, 'Admin', '2023-08-18 18:55:02', 'Admin with ID # Deleted from table.'),
(201, 2, 'Admin', '2023-08-18 18:55:50', 'Admin with ID # Deleted from table.'),
(202, 2, 'Admin', '2023-08-18 19:14:12', 'Admin with ID # Deleted from table.'),
(203, 2, 'Admin', '2023-08-18 19:43:47', 'Admin with ID # Deleted from table.'),
(204, 2, 'Admin', '2023-08-18 19:43:53', 'Admin with ID # Deleted from table.'),
(205, 2, 'Admin', '2023-08-18 19:44:18', 'Admin with ID # Deleted from table.'),
(206, 2, 'Admin', '2023-08-18 19:44:22', 'Admin with ID # Deleted from table.'),
(207, 2, 'Admin', '2023-08-18 19:44:41', 'Admin with ID # Deleted from table.'),
(208, 2, 'Admin', '2023-08-18 19:44:45', 'Admin with ID # Deleted from table.'),
(209, 2, 'Admin', '2023-08-18 19:45:26', 'Admin with ID # Deleted from table.'),
(210, 2, 'Admin', '2023-08-18 19:45:31', 'Admin with ID # Deleted from table.'),
(211, 2, 'Admin', '2023-08-18 19:48:11', 'Admin with ID # Deleted from table.'),
(212, 2, 'Admin', '2023-08-18 19:50:17', 'Admin with ID # Deleted from table.'),
(213, 2, 'Admin', '2023-08-18 19:51:36', 'Admin with ID # Deleted from table.'),
(214, 2, 'Admin', '2023-08-18 19:51:41', 'Admin with ID # Deleted from table.'),
(215, 2, 'Admin', '2023-08-18 19:52:17', 'Admin with ID #53 Deleted from table.'),
(216, 2, 'Admin', '2023-08-18 19:52:56', 'Admin with ID #43 Deleted from table.'),
(217, 2, 'Admin', '2023-08-18 19:53:02', 'Admin with ID #35 Deleted from table.'),
(218, 2, 'Admin', '2023-08-18 19:54:13', 'Login'),
(219, 2, 'Admin', '2023-08-18 20:03:33', 'Admin with ID #34 Deleted from table.'),
(220, 2, 'Admin', '2023-08-18 20:03:41', 'Admin with ID #33 Deleted from table.'),
(221, 2, 'Admin', '2023-08-18 20:07:41', 'Admin with ID #32 Deleted from table.'),
(222, 2, 'Admin', '2023-08-18 20:07:48', 'Admin with ID #31 Deleted from table.'),
(223, 2, 'Admin', '2023-08-18 20:08:43', 'Admin with ID #30 Deleted from table.'),
(224, 2, 'Admin', '2023-08-18 20:16:49', 'Farmer with ID #19 Deleted from table.'),
(225, 2, 'Admin', '2023-08-18 20:20:47', 'Client with ID#24 was removed from the system.'),
(226, 2, 'Admin', '2023-08-18 20:22:34', 'Client with ID#23 was removed from the system.'),
(227, 2, 'Admin', '2023-08-18 20:23:08', 'Client with ID#20 was removed from the system.'),
(228, 2, 'Admin', '2023-08-18 20:23:44', 'Client with ID#18 was removed from the system.'),
(229, 2, 'Admin', '2023-08-18 20:25:56', 'Admin with ID #29 was removed from the system.'),
(230, 2, 'Admin', '2023-08-18 20:26:31', 'Admin with ID #27 was removed from the system.'),
(231, 2, 'Admin', '2023-08-18 20:27:03', 'Admin with ID #25 was removed from the system.'),
(232, 2, 'Admin', '2023-08-18 20:28:00', 'Admin with ID #24 was removed from the system.'),
(233, 2, 'Admin', '2023-08-18 20:29:51', 'Admin with ID #23 was removed from the system.'),
(234, 2, 'Admin', '2023-08-18 20:58:02', 'Client with ID#9 was removed from the system.'),
(235, 2, 'Admin', '2023-08-18 21:00:17', 'Client with ID# was removed from the system.'),
(236, 2, 'Admin', '2023-08-18 21:00:47', 'Client with ID# was removed from the system.'),
(237, 2, 'admin', '2023-08-18 21:05:51', 'ID # deleted from Farmer table'),
(238, 2, 'admin', '2023-08-18 21:05:58', 'ID # deleted from Farmer table'),
(239, 2, 'admin', '2023-08-18 21:06:53', 'ID # deleted from Farmer table'),
(240, 2, 'admin', '2023-08-18 21:06:59', 'ID # deleted from Farmer table'),
(241, 9, 'Admin', '2023-08-23 15:25:15', 'Login'),
(242, 9, 'admin', '2023-08-23 15:30:11', 'ID # deleted from Farmer table'),
(243, 9, 'admin', '2023-08-23 15:30:39', 'ID # deleted from Farmer table'),
(244, 9, 'Admin', '2023-08-23 15:34:38', 'Admin with ID # was removed from the system.'),
(245, 9, 'Admin', '2023-08-23 15:34:43', 'Admin with ID # was removed from the system.'),
(246, 9, 'Admin', '2023-08-23 15:36:26', 'Admin with ID # was removed from the system.'),
(247, 9, 'Admin', '2023-08-23 15:36:30', 'Admin with ID # was removed from the system.'),
(248, 9, 'Admin', '2023-08-23 15:37:12', 'Admin with ID # was removed from the system.'),
(249, 9, 'Admin', '2023-08-23 15:37:17', 'Admin with ID # was removed from the system.'),
(250, 9, 'Admin', '2023-08-23 15:38:00', 'Admin with ID # was removed from the system.'),
(251, 9, 'Admin', '2023-08-23 15:38:06', 'Admin with ID # was removed from the system.'),
(252, 9, 'Admin', '2023-08-23 15:38:37', 'Admin with ID # was removed from the system.'),
(253, 9, 'Admin', '2023-08-23 15:38:50', 'Admin with ID # was removed from the system.'),
(254, 9, 'Admin', '2023-08-23 15:39:34', 'Admin with ID # was removed from the system.'),
(255, 9, 'Admin', '2023-08-23 15:39:41', 'Admin with ID # was removed from the system.'),
(256, 9, 'Admin', '2023-08-23 21:21:17', 'Login'),
(257, 20, 'Admin', '2023-08-23 21:59:14', 'New Farmer: jeje added to the system.'),
(258, 21, 'Admin', '2023-08-23 22:14:55', 'New Farmer: chim, added to the system.'),
(259, 22, 'Admin', '2023-08-23 22:22:08', 'New Farmer: meme added to the system.'),
(260, 23, 'Admin', '2023-08-23 22:24:55', 'New Farmer: keyt added to the system.'),
(261, 9, 'Admin', '2023-08-23 22:33:55', 'Updated information of Farmer with ID #23 from table'),
(262, 9, 'Admin', '2023-08-23 22:35:24', 'Updated information of Farmer with ID #23 from table'),
(263, 24, 'Admin', '2023-08-23 22:45:47', 'New Farmer: bii added to the system.'),
(264, 25, 'Admin', '2023-08-23 22:58:00', 'New Farmer: gigi added to the system.'),
(265, 26, 'Admin', '2023-08-23 23:07:48', 'New Farmer: mi added to the system.'),
(266, 9, 'Admin', '2023-08-23 23:09:52', 'Updated information of Farmer with ID #26 from table'),
(267, 9, 'Admin', '2023-08-23 23:12:37', 'Updated information of Farmer with ID #23 from table'),
(268, 9, 'Admin', '2023-08-24 00:54:12', 'New event: sample Event added to the events table.'),
(269, 9, 'Admin', '2023-08-24 00:55:17', 'Successfully updated Event: sample Event.'),
(270, 9, 'Admin', '2023-08-24 00:56:40', 'ID #1 deleted from events table'),
(271, 9, 'Admin', '2023-08-24 01:06:49', 'New event: Sample2 added to the events table.'),
(272, 9, 'Admin', '2023-08-24 01:07:34', 'ID #3 deleted from events table'),
(273, 9, 'Admin', '2023-08-24 01:14:46', 'New event: sample3 added to the events table.'),
(274, 9, 'Admin', '2023-08-24 01:24:08', 'Login'),
(275, 9, 'Admin', '2023-08-24 01:25:49', 'Login'),
(276, 9, 'Admin', '2023-08-24 01:28:43', 'Login'),
(277, 9, 'Admin', '2023-08-26 15:02:56', 'Login'),
(278, 9, 'Admin', '2023-08-27 00:30:29', 'Login'),
(279, 9, 'Admin', '2023-08-27 12:41:15', 'Login'),
(280, 2, 'Admin', '2023-08-27 13:33:56', 'Login'),
(281, 2, 'Admin', '2023-08-27 23:20:10', 'Login'),
(282, 2, 'Admin', '2023-08-28 00:00:57', 'Updated profile photo of ID #2 from Admin table'),
(283, 2, 'Admin', '2023-08-28 00:07:06', 'Login'),
(284, 2, 'Admin', '2023-08-28 00:26:44', 'Updated profile photo of ID #2 from Admin table'),
(285, 2, 'Admin', '2023-08-28 00:31:57', 'Updated profile photo of ID #2 from Admin table'),
(286, 2, 'Admin', '2023-08-28 01:04:35', 'Updated profile photo of ID #2 from Admin table'),
(287, 2, 'Admin', '2023-08-30 18:42:18', 'Login'),
(288, 2, 'Admin', '2023-08-30 18:49:34', 'Login'),
(289, 2, 'Admin', '2023-08-30 19:38:21', 'Admin with ID #20 Deleted from table.'),
(290, 2, 'Admin', '2023-08-30 19:48:10', 'Admin with ID #4 Deleted from table.'),
(291, 2, 'Admin', '2023-08-30 19:48:34', 'Admin with ID #10 Deleted from table.'),
(292, 2, 'Admin', '2023-08-30 19:48:43', 'Admin with ID #18 Deleted from table.'),
(293, 2, 'Admin', '2023-08-30 20:47:15', 'Login'),
(294, 2, 'Admin', '2023-08-30 22:20:28', 'Updated profile photo of ID #2 from Admin table'),
(295, 2, 'Admin', '2023-08-30 23:15:50', 'Login'),
(296, 1, 'Admin', '2023-08-31 00:34:15', 'Login'),
(297, 1, 'Admin', '2023-08-31 00:39:42', 'Updated profile photo of ID #1 from Admin table'),
(298, 1, 'Admin', '2023-08-31 01:30:19', 'Updated information of Admin with ID # from table'),
(299, 1, 'Admin', '2023-08-31 01:30:27', 'Updated information of Admin with ID # from table'),
(300, 1, 'Admin', '2023-08-31 01:30:48', 'Updated information of Admin with ID # from table'),
(301, 1, 'Admin', '2023-08-31 01:32:31', 'Updated information of Admin with ID # from table'),
(302, 1, 'Admin', '2023-08-31 01:32:39', 'Updated information of Admin with ID # from table'),
(303, 1, 'Admin', '2023-08-31 01:34:30', 'Updated information of Admin with ID # from table'),
(304, 1, 'Admin', '2023-08-31 01:35:07', 'Updated information of Admin with ID # from table'),
(305, 1, 'Admin', '2023-08-31 01:37:22', 'Updated information of Admin with ID # from table'),
(306, 1, 'Admin', '2023-08-31 01:38:44', 'Updated information of Admin with ID #1 from table'),
(307, 1, 'Admin', '2023-08-31 01:40:09', 'Admin user with ID# has updated its account.'),
(308, 1, 'Admin', '2023-08-31 01:40:41', 'Admin user with ID# has updated its account.'),
(309, 1, 'Admin', '2023-08-31 01:41:55', 'Admin user with ID#1 has updated its account.'),
(310, 1, 'Admin', '2023-08-31 01:42:32', 'Admin user with ID#1 has updated its account.'),
(311, 1, 'Admin', '2023-08-31 01:43:50', 'Admin user with ID#1 has updated its account.'),
(312, 1, 'Admin', '2023-08-31 01:45:32', 'Updated information of Admin with ID #3 from table'),
(313, 11, 'Admin', '2023-08-31 02:06:47', 'Login'),
(314, 2, 'Admin', '2023-09-03 23:45:27', 'Login'),
(315, 2, 'Admin', '2023-09-03 23:48:34', 'Updated profile photo of ID #2 from Admin table'),
(316, 2, 'Admin', '2023-09-04 00:20:03', 'Admin user with ID#2 has updated its account.'),
(317, 2, 'Admin', '2023-09-04 00:21:51', 'Logout'),
(318, 2, 'Admin', '2023-09-04 00:22:37', 'Login'),
(319, 2, 'Admin', '2023-09-04 00:49:03', 'Updated profile photo of ID #2 from Admin table'),
(320, 2, 'Admin', '2023-09-04 18:34:32', 'Login'),
(321, 2, 'Admin', '2023-09-05 10:52:22', 'Login'),
(322, 1, 'Admin', '2023-09-05 12:06:49', 'Logout'),
(323, 2, 'Admin', '2023-09-05 12:07:02', 'Login'),
(324, 2, 'Admin', '2023-09-06 00:11:01', 'Login'),
(325, 2, 'Admin', '2023-09-06 00:40:57', 'Updated profile photo of ID #2 from Admin table'),
(326, 2, 'Admin', '2023-09-06 00:47:37', 'Updated profile photo of ID #2 from Admin table.'),
(327, 1, 'Admin', '2023-09-06 00:49:17', 'Login'),
(328, 1, 'Admin', '2023-09-06 00:49:43', 'Updated profile photo of ID #1 from Admin table.'),
(329, 2, 'Admin', '2023-09-06 01:24:44', 'Updated profile photo of ID #2 from Admin table.'),
(330, 2, 'Admin', '2023-09-06 01:26:27', 'Updated profile photo of ID #2 from Admin table.'),
(331, 2, 'Admin', '2023-09-06 01:28:20', 'Updated profile photo of ID #2 from Admin table.'),
(332, 2, 'Admin', '2023-09-06 01:29:17', 'Updated profile photo of ID #2 from Admin table.'),
(333, 2, 'Admin', '2023-09-06 01:29:41', 'Updated profile photo of ID #2 from Admin table.'),
(334, 2, 'Admin', '2023-09-06 01:31:10', 'Updated profile photo of ID #2 from Admin table.'),
(335, 2, 'Admin', '2023-09-06 01:33:50', 'Updated profile photo of ID #2 from Admin table.'),
(336, 2, 'Admin', '2023-09-06 01:34:30', 'Updated profile photo of ID #2 from Admin table.'),
(337, 2, 'Admin', '2023-09-10 12:26:44', 'Login'),
(338, 1, 'Admin', '2023-09-10 12:28:09', 'Login'),
(339, 2, 'Admin', '2023-09-10 12:30:06', 'Farmer with ID # removed from the system.'),
(340, 2, 'Admin', '2023-09-10 12:30:25', 'Farmer with ID # removed from the system.'),
(341, 2, 'Admin', '2023-09-10 12:31:52', 'Admin with ID #19 Deleted from table.'),
(342, 2, 'Admin', '2023-09-10 12:32:12', 'Farmer with ID # removed from the system.'),
(343, 2, 'Admin', '2023-09-10 12:36:28', 'Farmer with ID # removed from the system.'),
(344, 2, 'Admin', '2023-09-10 12:37:44', 'Farmer with ID # was removed from the system.'),
(345, 2, 'Admin', '2023-09-10 12:37:52', 'Farmer with ID # was removed from the system.'),
(346, 2, 'Admin', '2023-09-10 12:38:48', 'Farmer with ID #9 was removed from the system.'),
(347, 2, 'Admin', '2023-09-10 12:38:50', 'Farmer with ID #8 was removed from the system.'),
(348, 2, 'Admin', '2023-09-10 12:38:57', 'Farmer with ID #24 was removed from the system.'),
(349, 2, 'Admin', '2023-09-10 12:39:07', 'Farmer with ID #16 was removed from the system.'),
(350, 2, 'Admin', '2023-09-10 12:39:12', 'Farmer with ID #20 was removed from the system.'),
(351, 2, 'Admin', '2023-09-10 12:46:53', 'Updated profile photo of ID #2 from Admin table.'),
(352, 2, 'Admin', '2023-09-10 12:52:13', 'Updated profile photo of ID # from Admin table'),
(353, 2, 'Admin', '2023-09-10 12:53:37', 'Updated profile photo of ID # from Admin table'),
(354, 2, 'Admin', '2023-09-10 12:55:14', 'Updated profile photo of ID # from Admin table'),
(355, 2, 'Admin', '2023-09-10 13:26:31', 'Updated profile photo of ID #2 from Admin table.'),
(356, 1, 'Admin', '2023-09-10 13:28:23', 'Admin with ID #64 Deleted from table.'),
(357, 1, 'Admin', '2023-09-10 13:28:26', 'Admin with ID #21 Deleted from table.'),
(358, 1, 'Admin', '2023-09-10 13:28:29', 'Admin with ID #63 Deleted from table.'),
(359, 1, 'Admin', '2023-09-10 13:28:33', 'Admin with ID #22 Deleted from table.'),
(360, 1, 'Admin', '2023-09-10 13:28:36', 'Admin with ID #16 Deleted from table.'),
(361, 1, 'Admin', '2023-09-10 13:28:39', 'Admin with ID #17 Deleted from table.'),
(362, 1, 'Admin', '2023-09-10 13:28:43', 'Admin with ID #15 Deleted from table.'),
(363, 1, 'Admin', '2023-09-10 13:28:45', 'Admin with ID #14 Deleted from table.'),
(364, 1, 'Admin', '2023-09-10 13:28:48', 'Admin with ID #12 Deleted from table.'),
(365, 1, 'Admin', '2023-09-10 13:28:50', 'Admin with ID #11 Deleted from table.'),
(366, 1, 'Admin', '2023-09-10 13:28:53', 'Admin with ID #9 Deleted from table.'),
(367, 1, 'Admin', '2023-09-10 13:28:55', 'Admin with ID #8 Deleted from table.'),
(368, 1, 'Admin', '2023-09-10 13:28:59', 'Admin with ID #7 Deleted from table.'),
(369, 1, 'Admin', '2023-09-10 13:29:02', 'Admin with ID #6 Deleted from table.'),
(370, 2, 'Admin', '2023-09-10 14:47:34', 'Logout'),
(371, 1, 'Admin', '2023-09-10 14:47:42', 'Login'),
(372, 1, 'Admin', '2023-09-10 14:48:14', 'Updated profile photo of ID #1 from Admin table.'),
(373, 1, 'Admin', '2023-09-10 14:48:43', 'Logout'),
(374, 2, 'Admin', '2023-09-10 14:48:50', 'Login'),
(375, 2, 'Admin', '2023-09-10 14:49:03', 'Logout'),
(376, 1, 'Admin', '2023-09-10 14:49:10', 'Login'),
(377, 1, 'Admin', '2023-09-10 14:54:25', 'Logout'),
(378, 1, 'Admin', '2023-09-12 19:18:22', 'Login'),
(379, 1, 'Admin', '2023-09-12 19:31:44', 'Updated profile photo of ID #1 from Admin table.'),
(380, 1, 'Admin', '2023-09-12 19:34:37', 'Updated profile photo of ID #1 from Admin table.');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(225) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `position_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `username`, `full_name`, `middle_name`, `last_name`, `fullName`, `email`, `password`, `dateCreated`, `position_id`) VALUES
(1, 'tantan', '', '', '', 'tan', 'tan@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-08 16:26:46', 1),
(2, 'key', '', '', '', 'key', 'key@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-08 16:28:34', 1),
(3, 'yel', '', '', '', 'yel', 'yel@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-08 16:34:02', 1),
(4, 'waine', '', '', '', 'waine', 'waine@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-08 16:37:19', 1),
(5, 'maylyn', '', '', '', 'maylyn', 'may@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-11 00:02:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` int(11) NOT NULL,
  `crops` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `crops`) VALUES
(1, 'Rice'),
(2, 'Corn');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(225) NOT NULL,
  `contact_number` varchar(225) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `Profile_Photo` varchar(255) NOT NULL,
  `Position_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `password`, `full_name`, `middle_name`, `last_name`, `address`, `contact_number`, `DateCreated`, `Profile_Photo`, `Position_Id`) VALUES
(8, 'bert', 'bert@email.com', '202cb962ac59075b964b07152d234b70', 'bert', 'carl', 'castro', 'florida', '09553883694', '2023-07-27 17:54:50', '', 0),
(17, 'key', 'key@email.com', '202cb962ac59075b964b07152d234b70', 'hfyu', 'kswhfu', 'kehfue', 'wkfg', '3562965', '2023-07-27 23:51:09', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `url` varchar(100) DEFAULT '#',
  `start` date NOT NULL,
  `end` date NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `url`, `start`, `end`, `color`) VALUES
(2, 'sample Event', 'kbyeeee', './dashboard.php?eventid=2', '2023-08-07', '2023-08-31', '#af1212'),
(4, 'sample3', 'hyjsdfvbt', './dashboard.php?eventid=4', '2023-08-31', '2023-09-01', '#5c60d6');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `crops` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `profilePhoto` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `username`, `fullName`, `gender`, `age`, `contactNumber`, `address`, `birthday`, `crops`, `email`, `password`, `dateCreated`, `profilePhoto`, `position_id`) VALUES
(1, 'mile', 'mile oca', 'on', 25, 2147483647, 'sta.rita', '2005-06-13', 'on', 'mile@email.com', '202cb962ac59075b964b07152d234b70', '2023-07-11 04:23:53', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmer1`
--

CREATE TABLE `farmer1` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `crops` varchar(255) NOT NULL,
  `profile_photo` varchar(225) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `position_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer1`
--

INSERT INTO `farmer1` (`id`, `username`, `email`, `password`, `name`, `middleName`, `surname`, `gender`, `age`, `address`, `birthday`, `contactNumber`, `crops`, `profile_photo`, `dateCreated`, `position_id`) VALUES
(7, 'maya', 'maya@email.com', '202cb962ac59075b964b07152d234b70', 'Maya', 'Dela Cruz', 'Santiago', 'Female', 22, 'Florida', '2001-05-12', 2147483647, '', '', '2023-07-15 04:56:29', 1),
(12, 'meng', 'meng@email.com', '202cb962ac59075b964b07152d234b70', 'meng', 'meng', 'mengg', 'Female', 22, 'dsfe', '2023-07-05', 5689259, '', '', '2023-07-27 23:44:59', 1),
(21, 'chim,', 'chi@email.com', '202cb962ac59075b964b07152d234b70', 'chi', 'chichi', 'chiechiechie', 'Female', 25, 'guagua', '2023-08-09', 524894189, 'Corn', '', '2023-08-23 22:14:55', 1),
(22, 'meme', 'meme@email.com', '202cb962ac59075b964b07152d234b70', 'meme', 'me', 'meme', 'Female', 30, 'mabalacat', '2023-08-27', 26875959, 'Rice', '', '2023-08-23 22:22:08', 1),
(25, 'gigi', 'gigi@email.com', '202cb962ac59075b964b07152d234b70', 'gigi', 'gi', 'gi', 'Female', 48, 'guagua', '2023-08-01', 241, 'Corn', '', '2023-08-23 22:58:00', 1),
(26, 'mi', 'miii@email.com', '202cb962ac59075b964b07152d234b70', 'miu', 'mi', 'mi', 'Male', 58, 'florida', '2023-08-11', 94526345, 'Rice', '', '2023-08-23 23:07:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `int` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`int`, `position_name`) VALUES
(1, 'User'),
(2, 'Farmer'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `nav_color` varchar(255) NOT NULL,
  `nav_color_mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `position_name`) VALUES
(1, 'Admin'),
(2, 'Farmer'),
(3, 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer1`
--
ALTER TABLE `farmer1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`int`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `farmer1`
--
ALTER TABLE `farmer1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `int` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
