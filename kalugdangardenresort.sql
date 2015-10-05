-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2015 at 11:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kalugdangardenresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `cottage_list`
--

CREATE TABLE IF NOT EXISTS `cottage_list` (
  `cottagename` varchar(25) NOT NULL,
`cottagelist_id` int(11) NOT NULL,
  `cottage_id` int(25) NOT NULL,
  `datecreated` varchar(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `lastUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cottage_list`
--

INSERT INTO `cottage_list` (`cottagename`, `cottagelist_id`, `cottage_id`, `datecreated`, `availability`, `lastUpdated`) VALUES
('MC1', 26, 1, '10/2/2015 5:04:39 PM', 1, ''),
('MC2', 27, 1, '10/2/2015 5:04:50 PM', 1, ''),
('MC3', 28, 1, '10/2/2015 5:05:06 PM', 1, ''),
('MC4', 29, 1, '10/2/2015 5:05:22 PM', 1, ''),
('MC5', 30, 1, '10/2/2015 5:05:33 PM', 1, ''),
('MC6', 31, 1, '10/2/2015 5:06:31 PM', 1, '10/3/2015 9:02:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `cottage_type`
--

CREATE TABLE IF NOT EXISTS `cottage_type` (
  `description` varchar(25) NOT NULL,
  `price` int(25) NOT NULL,
  `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
`Cottage_ID` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `R_Type` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cottage_type`
--

INSERT INTO `cottage_type` (`description`, `price`, `datecreated`, `Cottage_ID`, `pic`, `R_Type`, `created_at`, `updated_at`) VALUES
('Main Cottage', 600, '2015-09-04 23:30:46', 1, '', 1, '2015-10-03 17:46:34', '0000-00-00 00:00:00'),
('Kids Cottage', 800, '2015-09-04 23:30:46', 2, '', 1, '2015-10-03 17:46:38', '0000-00-00 00:00:00'),
('Olympic Cottage', 1000, '2015-09-04 23:32:58', 3, '', 1, '2015-10-03 17:46:41', '0000-00-00 00:00:00'),
('Kubo', 1000, '2015-09-04 23:32:58', 4, '', 1, '2015-10-03 17:46:43', '0000-00-00 00:00:00'),
('Pavilion', 2500, '2015-09-04 23:33:19', 5, '', 1, '2015-10-03 17:46:49', '0000-00-00 00:00:00'),
('Room1', 0, '2015-10-04 01:47:41', 6, '', 2, '2015-10-03 17:47:41', '0000-00-00 00:00:00'),
('Room2', 0, '2015-10-04 01:47:41', 7, '', 2, '2015-10-03 17:47:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reservation _type`
--

CREATE TABLE IF NOT EXISTS `reservation _type` (
`id` int(15) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation _type`
--

INSERT INTO `reservation _type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cottage Reservation', '2015-10-03 17:39:00', '0000-00-00 00:00:00'),
(2, 'Room Reservation', '2015-10-03 17:39:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_additional`
--

CREATE TABLE IF NOT EXISTS `tbl_additional` (
`aid` int(11) NOT NULL,
  `additional` varchar(50) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_additional`
--

INSERT INTO `tbl_additional` (`aid`, `additional`, `price`) VALUES
(1, 'AdditionalPerson', 300),
(2, 'ExtraBed', 300),
(3, 'ExtraLinen', 100),
(4, 'ExtraTowel', 50),
(5, 'ExtraPillow', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit`
--

CREATE TABLE IF NOT EXISTS `tbl_audit` (
  `login` varchar(50) DEFAULT NULL,
  `logUser` varchar(45) NOT NULL,
  `logActions` varchar(45) NOT NULL,
  `logout` varchar(50) DEFAULT NULL,
`auid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=986 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_audit`
--

INSERT INTO `tbl_audit` (`login`, `logUser`, `logActions`, `logout`, `auid`) VALUES
('9/9/2015 4:03:55 AM', 'admin123', '', '4:03 AM', 667),
('9/9/2015 4:10:30 AM', 'admin123', '', '4:10 AM', 668),
('9/9/2015 4:12:09 AM', 'admin123', '', '4:13 AM', 669),
('9/9/2015 4:41:16 AM', 'admin123', '', '4:41 AM', 670),
('9/9/2015 4:42:08 AM', 'admin123', 'Created new user acct, ', '4:43 AM', 671),
('9/9/2015 4:43:28 AM', 'admin1', '', '4:43 AM', 672),
('9/9/2015 4:44:24 AM', 'admin1', '', '4:44 AM', 673),
('9/9/2015 4:45:07 AM', 'admin1', '', NULL, 674),
('9/9/2015 4:47:05 AM', 'admin1', '', '4:47 AM', 675),
('9/9/2015 4:47:54 AM', 'admin1', '', '4:48 AM', 676),
('9/9/2015 4:48:30 AM', 'admin1', 'Deleted user acct, ', '4:49 AM', 677),
('9/9/2015 3:40:19 PM', 'admin1', '', '3:40 PM', 678),
('9/9/2015 3:45:26 PM', 'admin1', '', '3:45 PM', 679),
('9/9/2015 3:46:30 PM', 'admin1', 'Restored deleted user account, ', '3:47 PM', 680),
('9/9/2015 3:47:16 PM', 'admin123', '', '3:47 PM', 681),
('9/9/2015 4:11:31 PM', 'admin1', '', '4:11 PM', 682),
('9/9/2015 4:12:10 PM', 'admin1', '', NULL, 683),
('9/9/2015 4:13:04 PM', 'admin1', '', NULL, 684),
('9/9/2015 4:24:08 PM', 'admin1', '', NULL, 685),
('9/9/2015 4:25:16 PM', 'admin1', '', NULL, 686),
('9/9/2015 4:30:12 PM', 'admin1', '', NULL, 687),
('9/9/2015 5:56:37 PM', 'admin1', '', '5:56 PM', 688),
('9/9/2015 5:58:40 PM', 'admin1', '', '5:59 PM', 689),
('9/9/2015 6:00:16 PM', 'admin1', '', '6:00 PM', 690),
('9/9/2015 6:09:13 PM', 'admin1', '', '6:09 PM', 691),
('9/9/2015 6:12:24 PM', 'admin1', '', '6:12 PM', 692),
('9/9/2015 6:13:20 PM', 'admin1', '', '6:13 PM', 693),
('9/9/2015 6:15:21 PM', 'admin1', '', '6:15 PM', 694),
('9/9/2015 6:15:50 PM', 'admin1', '', '6:16 PM', 695),
('9/9/2015 6:17:33 PM', 'admin1', '', '6:17 PM', 696),
('9/9/2015 7:38:04 PM', 'admin1', '', NULL, 697),
('9/9/2015 7:39:30 PM', 'admin1', '', '7:39 PM', 698),
('9/9/2015 7:41:24 PM', 'admin1', '', '7:41 PM', 699),
('9/9/2015 11:49:45 PM', 'admin1', '', '11:51 PM', 700),
('9/10/2015 12:07:42 AM', 'admin1', '', '12:09 AM', 701),
('9/10/2015 12:11:58 AM', 'admin1', '', '12:12 AM', 702),
('9/10/2015 2:09:22 AM', 'admin1', '', '2:09 AM', 703),
('9/10/2015 2:10:22 AM', 'admin1', '', '2:10 AM', 704),
('9/10/2015 2:14:52 AM', 'admin1', '', NULL, 705),
('9/10/2015 2:15:37 AM', 'admin1', '', NULL, 706),
('9/10/2015 2:16:48 AM', 'admin1', '', NULL, 707),
('9/10/2015 2:17:12 AM', 'admin1', '', NULL, 708),
('9/10/2015 2:20:31 AM', 'admin1', '', NULL, 709),
('9/10/2015 2:24:59 AM', 'admin1', '', NULL, 710),
('9/10/2015 2:27:45 AM', 'admin1', '', NULL, 711),
('9/10/2015 2:28:06 AM', 'admin1', '', '2:29 AM', 712),
('9/10/2015 2:32:28 AM', 'admin1', '', '2:33 AM', 713),
('9/10/2015 2:34:04 AM', 'admin1', '', '2:35 AM', 714),
('9/10/2015 2:39:59 AM', 'admin1', '', '2:40 AM', 715),
('9/10/2015 2:41:02 AM', 'admin1', '', '2:41 AM', 716),
('9/10/2015 2:45:02 AM', 'admin1', '', '2:45 AM', 717),
('9/10/2015 2:48:15 AM', 'admin1', '', '2:48 AM', 718),
('9/10/2015 2:50:15 AM', 'admin1', '', '2:50 AM', 719),
('9/10/2015 3:11:54 AM', 'admin1', '', NULL, 720),
('9/10/2015 3:13:03 AM', 'admin1', '', NULL, 721),
('9/10/2015 3:14:05 AM', 'admin1', 'Added new guest info, ', NULL, 722),
('9/10/2015 3:15:06 AM', 'admin1', 'Added new guest info, ', '3:19 AM', 723),
('9/10/2015 2:29:49 PM', 'admin1', 'Added new guest info, ', NULL, 724),
('9/10/2015 2:40:15 PM', 'admin1', '', '2:42 PM', 725),
('9/10/2015 10:52:22 PM', 'admin1', '', '10:52 PM', 726),
('9/10/2015 11:08:31 PM', 'admin1', '', '11:08 PM', 727),
('9/10/2015 11:20:16 PM', 'admin1', '', '11:20 PM', 728),
('9/10/2015 11:28:23 PM', 'admin1', '', '11:28 PM', 729),
('9/10/2015 11:30:40 PM', 'admin1', '', '11:31 PM', 730),
('9/11/2015 12:04:10 AM', 'admin1', '', '12:04 AM', 731),
('9/11/2015 12:05:05 AM', 'admin1', '', '12:06 AM', 732),
('9/11/2015 12:24:42 AM', 'admin1', '', '12:25 AM', 733),
('9/11/2015 12:30:52 AM', 'admin1', '', '12:31 AM', 734),
('9/11/2015 12:32:23 AM', 'admin1', '', '12:32 AM', 735),
('9/11/2015 12:33:47 AM', 'admin1', '', '12:33 AM', 736),
('9/11/2015 5:27:55 AM', 'admin1', '', NULL, 737),
('9/11/2015 5:33:33 AM', 'admin1', '', NULL, 738),
('9/11/2015 5:34:04 AM', 'admin1', '', NULL, 739),
('9/11/2015 1:18:01 PM', 'admin1', '', NULL, 740),
('9/11/2015 1:19:32 PM', 'admin1', 'Deleted user acct, ', '1:20 PM', 741),
('9/11/2015 1:21:44 PM', 'admin1', '', '1:22 PM', 742),
('9/11/2015 1:25:32 PM', 'admin1', '', NULL, 743),
('9/11/2015 1:29:03 PM', 'admin1', 'Restored deleted user account, ', '1:29 PM', 744),
('9/11/2015 4:44:07 PM', 'admin1', 'Deleted user acct, Restored deleted user acco', NULL, 745),
('9/11/2015 4:58:33 PM', 'admin1', 'Added new guest info, ', '5:08 PM', 746),
('9/11/2015 9:13:07 PM', 'admin1', '', '9:23 PM', 747),
('9/12/2015 12:52:02 AM', 'admin1', '', '12:52 AM', 748),
('9/12/2015 12:52:54 AM', 'admin1', '', '12:52 AM', 749),
('9/12/2015 12:04:57 PM', 'admin1', '', '12:05 PM', 750),
('9/12/2015 12:08:23 PM', 'admin1', '', '12:08 PM', 751),
('9/12/2015 12:09:12 PM', 'admin1', '', '12:09 PM', 752),
('9/12/2015 12:10:15 PM', 'admin1', '', '12:10 PM', 753),
('9/12/2015 1:24:51 PM', 'admin1', '', '1:25 PM', 754),
('9/12/2015 1:39:18 PM', 'admin1', '', '1:40 PM', 755),
('9/12/2015 3:08:41 PM', 'admin1', '', '3:09 PM', 756),
('9/12/2015 3:10:52 PM', 'admin1', '', '3:11 PM', 757),
('9/12/2015 3:14:07 PM', 'admin1', 'Added new guest info, ', '3:15 PM', 758),
('9/12/2015 3:29:37 PM', 'admin1', 'Updated guest information, ', NULL, 759),
('9/12/2015 3:46:23 PM', 'admin1', '', '3:46 PM', 760),
('9/12/2015 3:56:21 PM', 'admin1', '', '3:56 PM', 761),
('9/12/2015 4:30:25 PM', 'admin1', '', '4:30 PM', 762),
('9/12/2015 4:40:36 PM', 'admin1', '', '4:41 PM', 763),
('9/12/2015 4:41:40 PM', 'admin1', '', '4:41 PM', 764),
('9/12/2015 5:08:16 PM', 'admin1', '', '5:09 PM', 765),
('9/12/2015 5:20:20 PM', 'admin1', '', NULL, 766),
('9/12/2015 7:16:28 PM', 'admin1', 'Updated guest information, ', '7:20 PM', 767),
('9/12/2015 7:48:58 PM', 'admin1', '', '7:49 PM', 768),
('9/12/2015 7:49:22 PM', 'admin1', '', NULL, 769),
('9/12/2015 7:49:55 PM', 'admin1', '', NULL, 770),
('9/12/2015 7:53:19 PM', 'admin1', '', '7:54 PM', 771),
('9/12/2015 7:58:42 PM', 'admin1', '', '7:59 PM', 772),
('9/12/2015 8:03:27 PM', 'admin1', '', '8:03 PM', 773),
('9/12/2015 8:04:21 PM', 'admin1', '', '8:04 PM', 774),
('9/12/2015 8:05:17 PM', 'admin1', '', '8:05 PM', 775),
('9/12/2015 8:11:19 PM', 'admin1', 'Updated guest information, ', '8:11 PM', 776),
('9/12/2015 8:12:52 PM', 'admin1', 'Updated guest information, ', '8:13 PM', 777),
('9/12/2015 8:19:44 PM', 'admin1', 'Updated guest information, ', '8:20 PM', 778),
('9/12/2015 8:36:33 PM', 'admin1', '', NULL, 779),
('9/12/2015 8:37:37 PM', 'admin1', 'Updated patient info, ', '8:37 PM', 780),
('9/12/2015 8:42:35 PM', 'admin1', 'Updated patient info, Updated patient info, U', '8:45 PM', 781),
('9/12/2015 8:46:20 PM', 'admin1', 'Added new guest info, Updated patient info, U', '8:49 PM', 782),
('9/12/2015 8:53:15 PM', 'admin1', 'Updated patient info, ', '8:53 PM', 783),
('9/12/2015 8:55:02 PM', 'admin1', 'Updated patient info, ', '8:55 PM', 784),
('9/12/2015 8:59:27 PM', 'admin1', 'Updated patient info, ', '9:00 PM', 785),
('9/12/2015 9:00:45 PM', 'admin1', '', '9:00 PM', 786),
('9/12/2015 9:14:47 PM', 'admin1', '', '9:14 PM', 787),
('9/12/2015 9:16:21 PM', 'admin1', '', NULL, 788),
('9/12/2015 9:17:02 PM', 'admin1', '', '9:17 PM', 789),
('9/12/2015 10:41:50 PM', 'admin1', '', '11:28 PM', 790),
('9/13/2015 1:39:57 AM', 'admin1', '', NULL, 791),
('9/13/2015 1:42:10 AM', 'admin1', '', '1:43 AM', 792),
('9/13/2015 1:44:19 AM', 'admin1', '', '1:44 AM', 793),
('9/13/2015 1:51:33 AM', 'admin1', '', NULL, 794),
('9/13/2015 1:53:31 AM', 'admin1', '', NULL, 795),
('9/13/2015 2:02:40 AM', 'admin1', '', '2:03 AM', 796),
('9/13/2015 2:08:13 AM', 'admin1', '', '2:08 AM', 797),
('9/13/2015 2:13:31 AM', 'admin1', '', '2:13 AM', 798),
('9/13/2015 2:16:06 AM', 'admin1', '', NULL, 799),
('9/13/2015 2:18:05 AM', 'admin1', '', '2:18 AM', 800),
('9/13/2015 2:19:02 AM', 'admin1', '', '2:19 AM', 801),
('9/13/2015 2:22:49 AM', 'admin1', '', '2:23 AM', 802),
('9/13/2015 2:30:57 AM', 'admin1', '', '2:31 AM', 803),
('9/13/2015 3:02:42 AM', 'admin1', '', '3:03 AM', 804),
('9/13/2015 3:11:38 AM', 'admin1', '', '3:11 AM', 805),
('9/13/2015 3:33:16 AM', 'admin1', '', NULL, 806),
('9/13/2015 3:35:29 AM', 'admin1', 'Added new reservation information, ', '3:37 AM', 807),
('9/13/2015 3:42:02 AM', 'admin1', 'Added new reservation information, ', '3:42 AM', 808),
('9/13/2015 3:47:13 AM', 'admin1', 'Added new reservation information, ', '3:48 AM', 809),
('9/13/2015 3:59:00 AM', 'admin1', '', '3:59 AM', 810),
('9/13/2015 4:00:31 AM', 'admin1', '', '4:01 AM', 811),
('9/13/2015 4:01:52 AM', 'admin1', 'Added new reservation information, ', '4:02 AM', 812),
('9/13/2015 4:11:53 AM', 'admin1', '', '4:12 AM', 813),
('9/13/2015 4:12:49 AM', 'admin1', 'Added new reservation information, ', '4:13 AM', 814),
('9/13/2015 4:16:13 AM', 'admin1', 'Added new reservation information, ', '4:17 AM', 815),
('9/13/2015 4:21:42 AM', 'admin1', '', NULL, 816),
('9/13/2015 4:23:59 AM', 'admin1', '', NULL, 817),
('9/13/2015 4:27:11 AM', 'admin1', '', NULL, 818),
('9/13/2015 4:28:20 AM', 'admin1', 'Added new reservation information, ', '4:29 AM', 819),
('9/13/2015 5:13:27 PM', 'admin1', '', NULL, 820),
('9/13/2015 5:14:34 PM', 'admin1', '', '5:14 PM', 821),
('9/13/2015 5:15:52 PM', 'admin1', '', NULL, 822),
('9/13/2015 6:53:06 PM', 'admin1', '', '6:53 PM', 823),
('9/13/2015 6:55:07 PM', 'admin1', '', NULL, 824),
('9/13/2015 7:00:48 PM', 'admin1', '', '7:01 PM', 825),
('9/13/2015 7:16:54 PM', 'admin1', '', NULL, 826),
('9/13/2015 7:19:26 PM', 'admin1', '', NULL, 827),
('9/13/2015 7:32:02 PM', 'admin1', '', '7:32 PM', 828),
('9/13/2015 7:44:18 PM', 'admin1', 'Added new guest info, ', '7:45 PM', 829),
('9/13/2015 7:46:04 PM', 'admin1', '', '7:46 PM', 830),
('9/13/2015 7:47:12 PM', 'admin1', '', '7:47 PM', 831),
('9/13/2015 7:56:06 PM', 'admin1', 'Added new reservation information, ', '7:56 PM', 832),
('9/13/2015 8:02:16 PM', 'admin1', 'Added new reservation information, ', NULL, 833),
('9/13/2015 8:06:18 PM', 'admin1', '', '8:14 PM', 834),
('9/13/2015 8:18:55 PM', 'admin1', '', '8:19 PM', 835),
('9/13/2015 8:23:38 PM', 'admin1', '', '8:23 PM', 836),
('9/13/2015 8:25:28 PM', 'admin1', '', '8:25 PM', 837),
('9/13/2015 8:27:24 PM', 'admin1', '', '8:27 PM', 838),
('9/13/2015 8:54:53 PM', 'admin1', '', NULL, 839),
('9/13/2015 9:07:29 PM', 'admin1', '', '9:07 PM', 840),
('9/13/2015 9:53:49 PM', 'admin1', '', NULL, 841),
('9/13/2015 11:00:35 PM', 'admin1', '', '11:05 PM', 842),
('9/13/2015 11:08:47 PM', 'admin1', '', '11:09 PM', 843),
('9/13/2015 11:09:47 PM', 'admin1', '', '11:10 PM', 844),
('9/13/2015 11:42:47 PM', 'admin1', '', '11:44 PM', 845),
('9/13/2015 11:47:42 PM', 'admin1', '', '11:48 PM', 846),
('9/13/2015 11:55:41 PM', 'admin1', '', '11:56 PM', 847),
('9/14/2015 12:02:39 AM', 'admin1', '', '12:03 AM', 848),
('9/14/2015 12:34:46 AM', 'admin1', '', '12:35 AM', 849),
('9/14/2015 1:05:14 AM', 'admin1', '', '1:05 AM', 850),
('9/14/2015 1:07:01 AM', 'admin1', '', '1:07 AM', 851),
('9/14/2015 1:08:20 AM', 'admin1', '', '1:09 AM', 852),
('9/14/2015 1:41:56 AM', 'admin1', '', '1:42 AM', 853),
('9/14/2015 1:43:38 AM', 'admin1', '', '1:44 AM', 854),
('9/14/2015 1:45:09 AM', 'admin1', '', '1:45 AM', 855),
('9/14/2015 1:46:41 AM', 'admin1', '', '1:48 AM', 856),
('9/14/2015 2:04:52 AM', 'admin1', '', '2:09 AM', 857),
('9/14/2015 4:55:09 PM', 'admin1', '', NULL, 858),
('9/14/2015 5:01:55 PM', 'admin1', '', NULL, 859),
('9/14/2015 5:03:09 PM', 'admin1', '', NULL, 860),
('9/14/2015 5:06:08 PM', 'admin1', '', NULL, 861),
('9/14/2015 5:08:47 PM', 'admin1', '', NULL, 862),
('9/14/2015 5:38:37 PM', 'admin1', '', NULL, 863),
('9/14/2015 5:40:42 PM', 'admin1', '', NULL, 864),
('9/14/2015 5:42:04 PM', 'admin1', '', NULL, 865),
('9/14/2015 5:43:07 PM', 'admin1', '', NULL, 866),
('9/14/2015 5:44:13 PM', 'admin1', '', NULL, 867),
('9/14/2015 5:45:30 PM', 'admin1', '', NULL, 868),
('9/14/2015 5:48:09 PM', 'admin1', '', NULL, 869),
('9/14/2015 5:50:13 PM', 'admin1', '', NULL, 870),
('9/14/2015 5:52:19 PM', 'admin1', '', NULL, 871),
('9/14/2015 7:55:21 PM', 'admin1', '', NULL, 872),
('9/14/2015 8:41:42 PM', 'admin1', '', NULL, 873),
('9/14/2015 8:45:27 PM', 'admin1', '', NULL, 874),
('9/14/2015 8:47:33 PM', 'admin1', '', NULL, 875),
('9/14/2015 8:52:06 PM', 'admin1', '', NULL, 876),
('9/14/2015 8:53:39 PM', 'admin1', '', NULL, 877),
('9/14/2015 8:57:02 PM', 'admin1', '', NULL, 878),
('9/15/2015 10:08:20 PM', 'admin1', '', '10:10 PM', 879),
('9/15/2015 10:10:41 PM', 'admin1', '', '10:13 PM', 880),
('9/15/2015 10:18:40 PM', 'admin1', '', '10:19 PM', 881),
('9/15/2015 10:22:59 PM', 'admin1', '', '10:23 PM', 882),
('9/15/2015 10:27:04 PM', 'admin1', '', '10:28 PM', 883),
('9/15/2015 11:25:50 PM', 'admin1', '', '11:26 PM', 884),
('9/15/2015 11:39:59 PM', 'admin1', '', '11:40 PM', 885),
('9/15/2015 11:45:56 PM', 'admin1', '', '11:46 PM', 886),
('9/15/2015 11:59:08 PM', 'admin1', '', '11:59 PM', 887),
('9/16/2015 12:03:57 AM', 'admin1', '', '12:05 AM', 888),
('9/16/2015 1:26:36 AM', 'admin1', '', '1:26 AM', 889),
('9/16/2015 1:27:53 AM', 'admin1', '', '1:28 AM', 890),
('9/16/2015 1:33:28 AM', 'admin1', '', '1:38 AM', 891),
('9/16/2015 1:42:15 AM', 'admin1', '', '1:42 AM', 892),
('9/16/2015 1:43:57 AM', 'admin1', '', '1:45 AM', 893),
('9/16/2015 1:46:57 AM', 'admin1', '', '1:47 AM', 894),
('9/16/2015 1:52:42 AM', 'admin1', '', '1:53 AM', 895),
('9/16/2015 2:05:15 AM', 'admin1', '', '2:05 AM', 896),
('9/16/2015 2:07:37 AM', 'admin1', '', '2:08 AM', 897),
('9/16/2015 2:08:57 AM', 'admin1', '', '2:09 AM', 898),
('9/16/2015 2:11:51 AM', 'admin1', '', '2:12 AM', 899),
('9/16/2015 2:13:23 AM', 'admin1', '', '2:13 AM', 900),
('9/16/2015 2:15:55 AM', 'admin1', '', '2:16 AM', 901),
('9/16/2015 2:19:40 AM', 'admin1', '', '2:20 AM', 902),
('9/16/2015 2:23:37 AM', 'admin1', '', NULL, 903),
('9/16/2015 2:24:34 AM', 'admin1', '', NULL, 904),
('9/16/2015 2:25:22 AM', 'admin1', '', NULL, 905),
('9/16/2015 2:27:00 AM', 'admin1', '', '2:27 AM', 906),
('9/16/2015 2:29:01 AM', 'admin1', '', '2:29 AM', 907),
('9/16/2015 2:29:54 AM', 'admin1', '', '2:30 AM', 908),
('9/16/2015 2:31:30 AM', 'admin1', '', NULL, 909),
('9/16/2015 2:33:56 AM', 'admin1', '', '2:34 AM', 910),
('9/16/2015 2:38:20 AM', 'admin1', '', '2:38 AM', 911),
('9/16/2015 2:40:54 AM', 'admin1', '', '2:41 AM', 912),
('9/16/2015 2:43:12 AM', 'admin1', '', '2:43 AM', 913),
('9/16/2015 2:46:46 AM', 'admin1', '', '2:47 AM', 914),
('9/16/2015 2:55:15 AM', 'admin1', '', NULL, 915),
('9/16/2015 3:18:32 AM', 'admin1', '', '3:19 AM', 916),
('9/16/2015 3:28:26 AM', 'admin1', '', '3:30 AM', 917),
('9/16/2015 3:35:10 AM', 'admin1', '', NULL, 918),
('9/16/2015 3:37:56 AM', 'admin1', '', '3:41 AM', 919),
('9/16/2015 3:42:45 AM', 'admin1', '', '3:43 AM', 920),
('9/16/2015 3:46:08 AM', 'admin1', '', '3:47 AM', 921),
('9/16/2015 3:54:49 AM', 'admin1', '', '3:55 AM', 922),
('9/16/2015 4:00:38 AM', 'admin1', '', '4:01 AM', 923),
('9/16/2015 4:03:42 AM', 'admin1', '', '4:05 AM', 924),
('9/16/2015 4:14:42 AM', 'admin1', '', '4:15 AM', 925),
('9/16/2015 4:27:52 AM', 'admin1', '', '4:28 AM', 926),
('9/16/2015 4:38:03 AM', 'admin1', '', '4:38 AM', 927),
('9/16/2015 4:46:09 AM', 'admin1', '', '4:46 AM', 928),
('9/16/2015 4:48:39 AM', 'admin1', '', NULL, 929),
('9/18/2015 10:13:07 PM', 'admin1', '', NULL, 930),
('9/18/2015 10:24:21 PM', 'admin1', '', '10:25 PM', 931),
('9/20/2015 10:43:36 PM', 'admin1', '', NULL, 932),
('9/20/2015 10:49:05 PM', 'admin1', '', NULL, 933),
('9/20/2015 10:49:57 PM', 'admin1', 'Added new reservation information, ', '10:50 PM', 934),
('9/20/2015 10:50:35 PM', 'admin1', '', '10:50 PM', 935),
('9/20/2015 10:54:29 PM', 'admin1', '', '10:54 PM', 936),
('9/20/2015 10:54:57 PM', 'admin1', '', '10:55 PM', 937),
('9/20/2015 10:55:56 PM', 'admin1', '', '10:56 PM', 938),
('9/20/2015 10:56:41 PM', 'admin1', '', '10:56 PM', 939),
('9/20/2015 10:57:13 PM', 'admin1', '', '10:58 PM', 940),
('9/20/2015 11:00:09 PM', 'admin1', '', '11:00 PM', 941),
('9/20/2015 11:19:49 PM', 'admin1', '', '11:20 PM', 942),
('9/20/2015 11:30:59 PM', 'admin1', '', '11:31 PM', 943),
('9/20/2015 11:32:04 PM', 'admin1', '', '11:32 PM', 944),
('9/20/2015 11:35:44 PM', 'admin1', '', '11:37 PM', 945),
('9/20/2015 11:47:07 PM', 'admin1', '', '11:47 PM', 946),
('9/20/2015 11:52:16 PM', 'admin1', '', '11:53 PM', 947),
('9/20/2015 11:54:01 PM', 'admin1', '', '11:56 PM', 948),
('9/20/2015 11:59:42 PM', 'admin1', '', '12:02 AM', 949),
('9/21/2015 12:04:21 AM', 'admin1', '', '12:06 AM', 950),
('9/21/2015 12:06:27 AM', 'admin1', '', '12:08 AM', 951),
('9/21/2015 12:08:28 AM', 'admin1', '', '12:09 AM', 952),
('9/21/2015 12:15:16 AM', 'admin1', '', '12:23 AM', 953),
('9/21/2015 12:35:52 AM', 'admin1', 'Added new reservation information, ', '12:38 AM', 954),
('9/21/2015 12:39:12 AM', 'admin1', '', '12:39 AM', 955),
('9/21/2015 12:45:14 AM', 'admin1', '', '12:45 AM', 956),
('9/21/2015 12:50:04 AM', 'admin1', '', NULL, 957),
('9/21/2015 12:51:11 AM', 'admin1', '', '12:51 AM', 958),
('9/21/2015 12:58:13 AM', 'admin1', '', '12:58 AM', 959),
('9/21/2015 12:59:25 AM', 'admin1', '', '12:59 AM', 960),
('9/21/2015 1:00:36 AM', 'admin1', '', '1:00 AM', 961),
('9/21/2015 1:02:45 AM', 'admin1', '', '1:05 AM', 962),
('9/21/2015 1:14:12 AM', 'admin1', '', '1:14 AM', 963),
('9/21/2015 1:15:47 AM', 'admin1', '', '1:16 AM', 964),
('9/21/2015 1:21:09 AM', 'admin1', '', '1:21 AM', 965),
('9/21/2015 1:26:05 AM', 'admin1', '', '1:26 AM', 966),
('9/21/2015 1:27:27 AM', 'admin1', '', '1:27 AM', 967),
('9/22/2015 4:29:41 PM', 'admin1', 'Added new reservation information, ', NULL, 968),
('9/22/2015 5:02:33 PM', 'admin1', '', NULL, 969),
('9/22/2015 5:04:22 PM', 'admin1', '', NULL, 970),
('9/23/2015 2:23:51 AM', 'admin1', 'Added new reservation information, ', '2:25 AM', 971),
('9/23/2015 2:25:19 AM', 'admin1', '', '2:26 AM', 972),
('9/27/2015 12:46:18 AM', 'admin1', '', '12:46 AM', 973),
('9/27/2015 2:30:20 AM', 'admin1', '', '2:30 AM', 974),
('9/27/2015 2:30:58 AM', 'admin1', '', '2:32 AM', 975),
('9/27/2015 7:51:01 PM', 'admin1', '', '7:51 PM', 976),
('9/27/2015 7:52:15 PM', 'admin1', '', '7:52 PM', 977),
('9/27/2015 8:25:50 PM', 'admin1', '', '8:26 PM', 978),
('9/27/2015 8:26:44 PM', 'admin1', '', '8:26 PM', 979),
('9/27/2015 8:31:06 PM', 'admin1', '', '8:31 PM', 980),
('9/27/2015 8:31:49 PM', 'admin1', '', '8:32 PM', 981),
('9/27/2015 8:32:22 PM', 'admin1', '', '8:33 PM', 982),
('9/27/2015 8:33:54 PM', 'admin1', '', '8:34 PM', 983),
('9/28/2015 6:21:40 PM', 'admin1', '', '6:23 PM', 984),
('9/28/2015 6:52:37 PM', 'admin1', '', '6:53 PM', 985);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners_info`
--

CREATE TABLE IF NOT EXISTS `tbl_banners_info` (
`id` int(12) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_banners_info`
--

INSERT INTO `tbl_banners_info` (`id`, `title`, `content`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Swimming Pools', 'Kalugdan Garden Resort has 3 swimming pools, The Main Pool,Kiddie Pool and the Olympic Pool', 'wel-1.jpg', '2015-10-03 19:34:23', '2015-10-03 13:03:00'),
(2, 'Rates', 'Kalugdan Garden Resort has very affordable price.', 'wel-3.jpg', '2015-10-03 19:34:23', '2015-10-03 12:46:20'),
(3, 'Cottages', 'Cottages of Kalugdan Garden Resort Has 5 different types of cottages', 'wel-2.jpg', '2015-10-03 19:35:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cotbilling`
--

CREATE TABLE IF NOT EXISTS `tbl_cotbilling` (
`cbid` int(11) NOT NULL,
  `crid` int(50) NOT NULL,
  `gid` int(50) NOT NULL,
  `totalcottageamount` int(50) NOT NULL,
  `totaladult` int(50) NOT NULL,
  `totalkid` int(50) NOT NULL,
  `totalamount` int(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `amountToBePaid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cotbilling`
--

INSERT INTO `tbl_cotbilling` (`cbid`, `crid`, `gid`, `totalcottageamount`, `totaladult`, `totalkid`, `totalamount`, `availability`, `amountToBePaid`) VALUES
(1, 1, 1, 900, 300, 240, 1440, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cottage1`
--

CREATE TABLE IF NOT EXISTS `tbl_cottage1` (
  `description` varchar(25) NOT NULL,
  `price` int(25) NOT NULL,
  `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
`Cottage_ID` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cottage1`
--

INSERT INTO `tbl_cottage1` (`description`, `price`, `datecreated`, `Cottage_ID`, `pic`) VALUES
('Main Cottage', 600, '2015-09-04 23:30:46', 1, ''),
('Kids Cottage', 800, '2015-09-04 23:30:46', 2, ''),
('Olympic Cottage', 1000, '2015-09-04 23:32:58', 3, ''),
('Kubo', 1000, '2015-09-04 23:32:58', 4, ''),
('Pavilion', 2500, '2015-09-04 23:33:19', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cottagepending`
--

CREATE TABLE IF NOT EXISTS `tbl_cottagepending` (
  `businessSource` varchar(50) NOT NULL,
  `ReservationDate` varchar(50) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `reservationtype` varchar(50) NOT NULL,
  `cottagetype` varchar(50) NOT NULL,
  `cottage1` varchar(50) NOT NULL,
  `cottage2` varchar(50) NOT NULL,
  `cottage3` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `adult` int(50) NOT NULL,
  `kid` int(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `TotalAmount` int(50) NOT NULL,
  `AmountToBePaid` int(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `lastUpdated` varchar(50) NOT NULL,
`cpid` int(11) NOT NULL,
  `gid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cottagepending`
--

INSERT INTO `tbl_cottagepending` (`businessSource`, `ReservationDate`, `GuestName`, `reservationtype`, `cottagetype`, `cottage1`, `cottage2`, `cottage3`, `day`, `adult`, `kid`, `dateAdded`, `TotalAmount`, `AmountToBePaid`, `availability`, `lastUpdated`, `cpid`, `gid`) VALUES
('Online', '10/8/2015', '', 'Cottage Reservation', 'Main Cottage', 'MC3', '', '', 'Morning', 6, 5, '', 0, 0, 0, '', 11, 8),
('Online', '10/9/2015', '', 'Cottage Reservation', 'Pavilion', 'Pav1', '', '', 'Morning', 4, 8, '10/1/2015', 0, 0, 0, '', 12, 9),
('Online', '10/10/2015', '', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', 'MC3', 'Morning', 5, 6, '10/1/2015', 0, 0, 0, '', 13, 9),
('Online', '10/18/2015', 'Ainah', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', 'MC3', 'Morning', 5, 5, '', 1000, 1000, 0, '', 14, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cottagereservation`
--

CREATE TABLE IF NOT EXISTS `tbl_cottagereservation` (
  `ReservationDate` varchar(50) DEFAULT NULL,
  `businessSource` varchar(50) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `reservationtype` varchar(50) NOT NULL,
  `cottagetype` varchar(50) NOT NULL,
  `cottage1` varchar(50) NOT NULL,
  `cottage2` varchar(50) NOT NULL,
  `cottage3` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `adult` int(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `TotalAmount` int(50) NOT NULL,
  `AmountToBePaid` int(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `lastUpdated` varchar(50) NOT NULL,
  `kid` int(50) NOT NULL,
`crid` int(11) NOT NULL,
  `gid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cottagereservation`
--

INSERT INTO `tbl_cottagereservation` (`ReservationDate`, `businessSource`, `GuestName`, `reservationtype`, `cottagetype`, `cottage1`, `cottage2`, `cottage3`, `day`, `adult`, `dateAdded`, `TotalAmount`, `AmountToBePaid`, `availability`, `lastUpdated`, `kid`, `crid`, `gid`) VALUES
('10/1/2015', 'Online', '', 'Cottage Reservation', 'Main Cottage', 'MC1', '', '', 'Morning', 3, '9/30/15', 0, 0, 1, '', 2, 5, 8),
('10/3/2015', 'Online', '', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', 'MC3', 'Morning', 3, '10/1/2015', 0, 0, 1, '', 2, 6, 8),
('10/5/2015', 'Online', '', 'Cottage Reservation', 'Kids Cottage', 'KC1', '', '', 'Morning', 2, '10/1/2015', 0, 0, 1, '', 2, 7, 8),
('10/6/2015', 'Online', '', 'Cottage Reservation', 'Pavilion', 'Pav1', '', '', 'Morning', 6, '10/1/2015', 0, 0, 1, '', 10, 8, 8),
('10/7/2015', 'Online', '', 'Cottage Reservation', 'Kubo', 'Palmera', '', '', 'Morning', 8, '10/1/2015', 0, 0, 1, '', 7, 9, 8),
('10/8/2015', 'Online', '', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', '', 'Overnight', 4, '', 0, 0, 1, '', 5, 10, 8),
('10/8/2015', 'Online', '', 'Cottage Reservation', 'Main Cottage', 'MC3', '', '', 'Morning', 6, '', 0, 0, 1, '', 5, 11, 8),
('10/18/2015', 'Online', 'Ainah', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', 'MC3', 'Morning', 5, '', 1000, 1000, 1, '', 5, 14, 9),
('10/1/2015', 'WALK-IN', '', 'Cottage Reservation', 'Main Cottage', 'MC2', '', '', 'Overnight', 1, '9/30/2015 4:20:00 PM', 0, 0, 1, '', 3, 43, 8),
('10/12/2015', 'WALK-IN', 'ainah r ramirez', 'Cottage Reservation', 'Kids Cottage', 'KC1', '', '', 'Morning', 3, '10/1/2015 3:06:49 PM', 0, 0, 1, '', 5, 44, 9),
('10/11/2015', 'WALK-IN', 'ainah r ramirez', 'Cottage Reservation', 'Olympic Cottage', 'OC1', '', '', 'Morning', 1, '10/1/2015 3:11:34 PM', 0, 0, 1, '', 6, 45, 9),
('10/12/2015', 'WALK-IN', 'ainah r ramirez', 'Cottage Reservation', 'Pavilion', 'PAV1', '', '', 'Overnight', 6, '10/1/2015 3:13:02 PM', 0, 0, 1, '', 8, 46, 9),
('10/15/2015', 'WALK-IN', 'ainah r ramirez', 'Cottage Reservation', 'Kubo', 'PALMERA', '', '', 'Morning', 5, '10/1/2015 3:15:10 PM', 0, 0, 1, '', 5, 47, 9),
('10/20/2015', 'WALK-IN', 'Ainah M Ramirez', 'Cottage Reservation', 'Main Cottage', 'MC2', '', '', 'Morning', 3, '10/2/2015 12:08:11 PM', 1650, 825, 1, '', 5, 48, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cottage_list`
--

CREATE TABLE IF NOT EXISTS `tbl_cottage_list` (
  `cottagename` varchar(25) NOT NULL,
`cottagelist_id` int(11) NOT NULL,
  `cottage_id` int(25) NOT NULL,
  `datecreated` varchar(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `lastUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cottage_list`
--

INSERT INTO `tbl_cottage_list` (`cottagename`, `cottagelist_id`, `cottage_id`, `datecreated`, `availability`, `lastUpdated`) VALUES
('MC1', 26, 1, '10/2/2015 5:04:39 PM', 1, ''),
('MC2', 27, 1, '10/2/2015 5:04:50 PM', 1, ''),
('MC3', 28, 1, '10/2/2015 5:05:06 PM', 1, ''),
('MC4', 29, 1, '10/2/2015 5:05:22 PM', 1, ''),
('MC5', 30, 1, '10/2/2015 5:05:33 PM', 1, ''),
('MC6', 31, 1, '10/2/2015 5:06:31 PM', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guestinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_guestinfo` (
  `lastname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middleInitial` varchar(10) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
`gid` int(11) NOT NULL,
  `lastUpdated` varchar(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guestinfo`
--

INSERT INTO `tbl_guestinfo` (`lastname`, `firstname`, `middleInitial`, `address`, `contactNo`, `email`, `dateAdded`, `gid`, `lastUpdated`, `availability`) VALUES
('Ramirez', 'Ainah', 'M', 'Mother Earth', 464634143, 'ainah@yahoo.com', '9/12/2015 8:47:27 PM', 8, '9/23/2015 7:36:46 PM', 1),
('ramirez', 'ainah', 'r', 'dy', 0, 'ainah@yahoo.com', '', 9, '10/1/2015 11:36:22 PM', 1),
('Dy', 'Daniel', 'R', 'Royal  South', 395644546, 'dy@gmail.com', '10/2/2015 12:07:37 PM', 10, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_onlineaccounts`
--

CREATE TABLE IF NOT EXISTS `tbl_onlineaccounts` (
`oaid` int(11) NOT NULL,
  `gid` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middleInitial` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactNo` int(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_onlineaccounts`
--

INSERT INTO `tbl_onlineaccounts` (`oaid`, `gid`, `username`, `password`, `lastname`, `firstname`, `middleInitial`, `address`, `contactNo`, `email`) VALUES
(1, 9, 'jomethedope', '12345', 'Selorio', 'Jomarie', 'Selorio', 'bhds', 132123, 'JomsFresco@gmail.com'),
(2, 0, 'twets', '12345', 'dfhgdfgb', 'dsbfk', 'dfbfu', 'dghdgi', 0, '44684686'),
(3, 0, 'ainah', '123', 'ramirez', 'ainah', 'r', 'dy', 0, '648646');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE IF NOT EXISTS `tbl_package` (
  `packagename` varchar(20) NOT NULL,
  `NoOfGuest` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Hours` int(3) DEFAULT NULL,
`packid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`packagename`, `NoOfGuest`, `Price`, `Hours`, `packid`) VALUES
('Package1', 2, 1800, 12, 1),
('Package2', 2, 3000, 24, 2),
('Package3', 4, 2500, 12, 3),
('Package4', 4, 4000, 24, 4),
('Package5', 6, 3000, 12, 5),
('Package6', 6, 4800, 24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pricing`
--

CREATE TABLE IF NOT EXISTS `tbl_pricing` (
`idp` int(11) NOT NULL,
  `desc_a` varchar(45) NOT NULL,
  `price` int(45) NOT NULL,
  `day` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pricing`
--

INSERT INTO `tbl_pricing` (`idp`, `desc_a`, `price`, `day`) VALUES
(1, 'Adult', 150, 'Morning'),
(2, 'Kids', 120, 'Morning'),
(3, 'Adult', 160, 'Overnight'),
(4, 'Kids', 140, 'Overnight'),
(5, 'Adult', 150, 'Weekend And Holiday Morning'),
(6, 'Kids', 120, 'Weekend And Holiday Morning'),
(7, 'Adult', 170, 'Weekend And Holiday Overnight'),
(8, 'Kids', 140, 'Weekend And Holiday Overnight'),
(9, 'Adult', 150, 'Summer Morning'),
(10, 'Kids', 120, 'Summer Morning'),
(11, 'Adult', 180, 'Summer Overnight'),
(12, 'Kids', 140, 'Summer Overnight');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roombilling`
--

CREATE TABLE IF NOT EXISTS `tbl_roombilling` (
`rbid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `additionalpersonTotalPrice` int(50) NOT NULL,
  `extrabedTotalprice` int(50) NOT NULL,
  `extralinenTotalprice` int(50) NOT NULL,
  `extratowelTotalprice` int(50) NOT NULL,
  `extrapillowTotalprice` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomname`
--

CREATE TABLE IF NOT EXISTS `tbl_roomname` (
`rnid` int(11) NOT NULL,
  `roomname` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomname`
--

INSERT INTO `tbl_roomname` (`rnid`, `roomname`) VALUES
(1, 'ROOM1'),
(2, 'ROOM2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roompending`
--

CREATE TABLE IF NOT EXISTS `tbl_roompending` (
`rpid` int(11) NOT NULL,
  `gid` int(50) NOT NULL,
  `rid` int(50) NOT NULL,
  `reservationtype` varchar(50) NOT NULL,
  `roomname` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `guest` int(50) NOT NULL,
  `additionalPerson` int(50) NOT NULL,
  `extraBed` int(50) NOT NULL,
  `extraLinen` int(50) NOT NULL,
  `extraTowel` int(50) NOT NULL,
  `extraPillow` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roomreservation`
--

CREATE TABLE IF NOT EXISTS `tbl_roomreservation` (
  `CheckInDate` varchar(50) NOT NULL,
  `checkInTime` varchar(50) NOT NULL,
`rid` int(11) NOT NULL,
  `gid` int(50) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `reservationtype` varchar(50) NOT NULL,
  `checkOutTime` varchar(50) NOT NULL,
  `roomname` varchar(50) NOT NULL,
  `packagetype` varchar(50) NOT NULL,
  `guest` int(50) NOT NULL,
  `additionalPerson` int(50) NOT NULL,
  `extraBed` int(50) NOT NULL,
  `extraLinen` int(50) NOT NULL,
  `extraTowel` int(50) NOT NULL,
  `extraPillow` int(50) NOT NULL,
  `extracottage` varchar(50) NOT NULL,
  `businessSource` varchar(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `TotalAmount` int(50) NOT NULL,
  `AmountToBePaid` int(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `CheckOutDate` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_roomreservation`
--

INSERT INTO `tbl_roomreservation` (`CheckInDate`, `checkInTime`, `rid`, `gid`, `GuestName`, `reservationtype`, `checkOutTime`, `roomname`, `packagetype`, `guest`, `additionalPerson`, `extraBed`, `extraLinen`, `extraTowel`, `extraPillow`, `extracottage`, `businessSource`, `dateAdded`, `TotalAmount`, `AmountToBePaid`, `availability`, `CheckOutDate`) VALUES
('10/02/2015 ', '3:34:AM ', 5, 8, 'Ainah M Ramirez', 'Room Reservation', '10/3/2015 3:34:31 AM', 'ROOM1', 'Package2', 2, 0, 0, 0, 0, 0, '', 'WALK-IN', '10/2/2015 3:34:48 AM', 3000, 3000, 1, ''),
('10/25/2015 ', '12:00:PM ', 6, 10, 'Daniel R Dy', 'Room Reservation', '10/26/2015 12:00:38 AM', 'ROOM1', 'Package1', 2, 1, 1, 2, 3, 2, '', 'WALK-IN', '10/2/2015 12:10:39 PM', 2850, 1425, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE IF NOT EXISTS `tbl_useraccounts` (
`uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accountType` varchar(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `datecreated` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`uid`, `username`, `password`, `accountType`, `availability`, `datecreated`) VALUES
(2, 'admin123', 'admin123', 'admin', 1, '9/9/2015 3:56:22 AM'),
(3, 'admin1', 'admin1', 'admin', 1, '9/9/2015 4:43:13 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE IF NOT EXISTS `tbl_user_info` (
`id` int(11) NOT NULL,
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `middleInitial` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contactNo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `availability` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_void`
--

CREATE TABLE IF NOT EXISTS `tbl_void` (
  `businessSource` varchar(50) NOT NULL,
  `ReservationDate` varchar(50) NOT NULL,
  `GuestName` varchar(50) NOT NULL,
  `reservationtype` varchar(50) NOT NULL,
  `cottagetype` varchar(50) NOT NULL,
  `cottage1` varchar(50) NOT NULL,
  `cottage2` varchar(50) NOT NULL,
  `cottage3` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `adult` int(50) NOT NULL,
  `kid` int(50) NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `TotalAmount` int(50) NOT NULL,
  `AmountToBePaid` int(50) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT '1',
  `lastUpdated` varchar(50) NOT NULL,
`vid` int(11) NOT NULL,
  `gid` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_void`
--

INSERT INTO `tbl_void` (`businessSource`, `ReservationDate`, `GuestName`, `reservationtype`, `cottagetype`, `cottage1`, `cottage2`, `cottage3`, `day`, `adult`, `kid`, `dateAdded`, `TotalAmount`, `AmountToBePaid`, `availability`, `lastUpdated`, `vid`, `gid`) VALUES
('Online', '10/9/2015', '', 'Cottage Reservation', 'Pavilion', 'Pav1', '', '', 'Morning', 4, 8, '10/1/2015', 0, 0, 1, '', 12, 9),
('Online', '10/10/2015', '', 'Cottage Reservation', 'Main Cottage', 'MC1', 'MC2', 'MC3', 'Morning', 5, 6, '10/1/2015', 0, 0, 1, '', 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(120) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isVerified` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `isAdmin` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `vCode` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cottage_list`
--
ALTER TABLE `cottage_list`
 ADD PRIMARY KEY (`cottagelist_id`);

--
-- Indexes for table `cottage_type`
--
ALTER TABLE `cottage_type`
 ADD PRIMARY KEY (`Cottage_ID`);

--
-- Indexes for table `reservation _type`
--
ALTER TABLE `reservation _type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_additional`
--
ALTER TABLE `tbl_additional`
 ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
 ADD PRIMARY KEY (`auid`);

--
-- Indexes for table `tbl_banners_info`
--
ALTER TABLE `tbl_banners_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cotbilling`
--
ALTER TABLE `tbl_cotbilling`
 ADD PRIMARY KEY (`cbid`);

--
-- Indexes for table `tbl_cottage1`
--
ALTER TABLE `tbl_cottage1`
 ADD PRIMARY KEY (`Cottage_ID`);

--
-- Indexes for table `tbl_cottagepending`
--
ALTER TABLE `tbl_cottagepending`
 ADD PRIMARY KEY (`cpid`);

--
-- Indexes for table `tbl_cottagereservation`
--
ALTER TABLE `tbl_cottagereservation`
 ADD PRIMARY KEY (`crid`);

--
-- Indexes for table `tbl_cottage_list`
--
ALTER TABLE `tbl_cottage_list`
 ADD PRIMARY KEY (`cottagelist_id`);

--
-- Indexes for table `tbl_guestinfo`
--
ALTER TABLE `tbl_guestinfo`
 ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `tbl_onlineaccounts`
--
ALTER TABLE `tbl_onlineaccounts`
 ADD PRIMARY KEY (`oaid`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
 ADD PRIMARY KEY (`packid`);

--
-- Indexes for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
 ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `tbl_roombilling`
--
ALTER TABLE `tbl_roombilling`
 ADD PRIMARY KEY (`rbid`);

--
-- Indexes for table `tbl_roomname`
--
ALTER TABLE `tbl_roomname`
 ADD PRIMARY KEY (`rnid`);

--
-- Indexes for table `tbl_roompending`
--
ALTER TABLE `tbl_roompending`
 ADD PRIMARY KEY (`rpid`);

--
-- Indexes for table `tbl_roomreservation`
--
ALTER TABLE `tbl_roomreservation`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_void`
--
ALTER TABLE `tbl_void`
 ADD PRIMARY KEY (`vid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cottage_list`
--
ALTER TABLE `cottage_list`
MODIFY `cottagelist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `cottage_type`
--
ALTER TABLE `cottage_type`
MODIFY `Cottage_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reservation _type`
--
ALTER TABLE `reservation _type`
MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_additional`
--
ALTER TABLE `tbl_additional`
MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_audit`
--
ALTER TABLE `tbl_audit`
MODIFY `auid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=986;
--
-- AUTO_INCREMENT for table `tbl_banners_info`
--
ALTER TABLE `tbl_banners_info`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_cotbilling`
--
ALTER TABLE `tbl_cotbilling`
MODIFY `cbid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_cottage1`
--
ALTER TABLE `tbl_cottage1`
MODIFY `Cottage_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cottagepending`
--
ALTER TABLE `tbl_cottagepending`
MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_cottagereservation`
--
ALTER TABLE `tbl_cottagereservation`
MODIFY `crid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_cottage_list`
--
ALTER TABLE `tbl_cottage_list`
MODIFY `cottagelist_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_guestinfo`
--
ALTER TABLE `tbl_guestinfo`
MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_onlineaccounts`
--
ALTER TABLE `tbl_onlineaccounts`
MODIFY `oaid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
MODIFY `packid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pricing`
--
ALTER TABLE `tbl_pricing`
MODIFY `idp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_roombilling`
--
ALTER TABLE `tbl_roombilling`
MODIFY `rbid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roomname`
--
ALTER TABLE `tbl_roomname`
MODIFY `rnid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_roompending`
--
ALTER TABLE `tbl_roompending`
MODIFY `rpid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roomreservation`
--
ALTER TABLE `tbl_roomreservation`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_void`
--
ALTER TABLE `tbl_void`
MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(120) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
