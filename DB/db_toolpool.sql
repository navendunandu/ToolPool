-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 02:59 AM
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
-- Database: `db_toolpool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'nandu', 'nandu@gmail.com', '12345678'),
(2, 'Sooraj', 'sooraj@gmail.com', '12345678'),
(3, 'aksdjOIASDosd', 'nirupama@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `booking_amount` varchar(100) NOT NULL DEFAULT '0',
  `booking_totalprice` int(11) NOT NULL DEFAULT 0,
  `boy_id` int(11) NOT NULL DEFAULT 0,
  `booking_delvdate` varchar(100) NOT NULL DEFAULT '0',
  `booking_retrndate` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `user_id`, `booking_status`, `booking_amount`, `booking_totalprice`, `boy_id`, `booking_delvdate`, `booking_retrndate`) VALUES
(68, '2022-11-13', 2, '1', '0', 100, 0, '0', '0'),
(69, '2022-11-13', 3, '1', '0', 150, 0, '0', '0'),
(70, '2022-11-10', 3, '8', '100', 200, 1, '2022-11-11', '2022-11-14'),
(71, '2022-11-13', 2, '1', '0', 100, 0, '0', '0'),
(72, '2022-11-13', 2, '1', '0', 100, 0, '0', '0'),
(74, '2022-11-13', 2, '2', '0', 100, 0, '0', '0'),
(75, '2022-11-13', 3, '1', '0', 150, 0, '0', '0'),
(76, '2022-11-13', 3, '1', '0', 150, 0, '0', '0'),
(77, '0', 3, '0', '0', 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `tool_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `tool_id`, `booking_id`, `cart_status`) VALUES
(70, 1, 9, 68, 1),
(71, 1, 8, 69, 1),
(72, 1, 11, 70, 1),
(73, 1, 8, 71, 1),
(74, 1, 11, 72, 1),
(75, 1, 8, 73, 0),
(76, 1, 11, 73, 0),
(77, 1, 11, 74, 1),
(78, 1, 8, 75, 1),
(79, 1, 8, 76, 1),
(80, 1, 8, 77, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Outdoor Tool'),
(9, 'Indoor Tool');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`) VALUES
(4, 'Honda'),
(5, 'bosch'),
(6, 'makita'),
(7, 'woodpeacker'),
(8, 'ibell');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(100) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `toolshop_id` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` varchar(100) NOT NULL DEFAULT '0',
  `complainttype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `user_id`, `toolshop_id`, `complaint_reply`, `complaint_status`, `complainttype_id`) VALUES
(13, 'sdf', 'dfvdz', 3, 2, 'qwedrqewr', '1', 5),
(14, 'no refund', 'hgdhkmn', 3, 2, 'jhfj', '1', 5),
(15, 'no refund', 'hgdhd', 7, 2, 'will be fixed', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(5, 'Misbehaviour'),
(6, 'Payment'),
(7, 'Order');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryboy`
--

CREATE TABLE `tbl_deliveryboy` (
  `boy_id` int(11) NOT NULL,
  `boy_name` varchar(100) NOT NULL,
  `boy_address` varchar(100) NOT NULL,
  `boy_contact` varchar(10) NOT NULL,
  `boy_email` varchar(100) NOT NULL,
  `boy_doj` varchar(100) NOT NULL,
  `boy_photo` varchar(100) NOT NULL,
  `boy_proof` varchar(100) NOT NULL,
  `place_id` varchar(100) NOT NULL,
  `boy_gender` varchar(100) NOT NULL,
  `boy_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_deliveryboy`
--

INSERT INTO `tbl_deliveryboy` (`boy_id`, `boy_name`, `boy_address`, `boy_contact`, `boy_email`, `boy_doj`, `boy_photo`, `boy_proof`, `place_id`, `boy_gender`, `boy_password`) VALUES
(1, 'Negha', 'Edapattu House\r\nOkkal P O', '8281241827', 'negha@gmail.com', '2022-11-05', '3.jpg', 'IMG_20200428_194851 (2).jpg', '211', 'Female', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(1, ' Thiruvananthapuram'),
(2, ' Kollam'),
(3, ' Pathanamtitta'),
(4, ' Alapuzha'),
(5, ' Kottayam'),
(6, ' Idukki'),
(7, ' Ernakulam'),
(8, ' Thrissur'),
(9, ' Palakkad'),
(10, ' Malappuram'),
(11, ' Kozhikode'),
(12, ' Wayanad'),
(13, ' Kannur'),
(14, ' Kasargode');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `district_id`) VALUES
(53, ' Alamcode', 1),
(54, 'Attingal', 1),
(55, 'Kaniyapuram', 1),
(56, 'Kattakada', 1),
(57, 'Kilimanoor', 1),
(58, 'Konchiravila', 1),
(59, 'Kurakkanni', 1),
(60, 'Nedumangad', 1),
(61, 'Thiruvananthapuram', 1),
(62, 'Varkala', 1),
(63, 'Adinad', 2),
(64, 'Ampalamkunnu', 2),
(65, 'Ayoor', 2),
(66, 'Chathannoor', 2),
(67, 'Kadakkal', 2),
(68, 'Karunagappalli', 2),
(69, 'Kollam', 2),
(70, 'Kottarakkara', 2),
(71, 'Kottiyam', 2),
(72, 'Kulathupuzha', 2),
(73, 'Kundara', 2),
(74, 'Mukhathala', 2),
(75, 'Mylakkadu', 2),
(76, 'Nedungolam', 2),
(77, 'Nilamel', 2),
(78, 'Oachira', 2),
(80, 'Paravur', 2),
(81, 'Perumpuzha', 2),
(82, 'Pozhikara', 2),
(83, 'Punalur', 2),
(84, 'Punthalathazham', 2),
(85, 'St Thomas Fort', 2),
(86, 'Tangasseri', 2),
(87, 'Valiyode', 2),
(88, 'Vallikavu', 2),
(89, ' Adavi', 3),
(90, ' Adoor', 3),
(91, ' Kadapra', 3),
(92, ' Konni', 3),
(93, ' Kozhencherry', 3),
(94, ' Mallapally', 3),
(95, ' Pandalam', 3),
(96, ' Parumala', 3),
(97, ' Pathanamthitta', 3),
(98, ' Pullad', 3),
(99, ' Ranni', 3),
(100, ' Thiruvalla', 3),
(101, '  Vennikulam', 3),
(102, 'Alappuzha', 4),
(103, 'Ambalappuzha', 4),
(104, 'Arookutty', 4),
(105, 'Aroor', 4),
(106, 'Charummood', 4),
(107, 'Chengannur', 4),
(108, 'Cherthala', 4),
(109, 'Chettikulangara', 4),
(110, 'Haripad', 4),
(111, 'Kanjikuzhi', 4),
(112, 'Kayamkulam', 4),
(113, 'Kokkamangalam', 4),
(114, 'Kokkothamangalam', 4),
(115, 'Komalapuram', 4),
(116, ' Mannar', 4),
(117, ' Mararikulam North', 4),
(118, 'Mavelikkara', 4),
(119, 'Muhamma', 4),
(120, 'Nangiarkulangara', 4),
(121, 'Padanilam', 4),
(122, 'Pallickal', 4),
(123, ' Thumpoly', 4),
(124, ' Thuravoor', 4),
(125, ' Vellakinar', 4),
(126, 'Changanassery', 5),
(127, 'Erattupetta', 5),
(128, 'Ettumanoor', 5),
(129, 'Kanjirappally', 5),
(130, 'Kottayam', 5),
(131, 'Manarcaud', 5),
(132, 'Pala', 5),
(133, 'Pampady', 5),
(134, 'Parathanam', 5),
(135, 'Ponkunnam', 5),
(136, 'Ramapuram', 5),
(137, 'Teekoy', 5),
(138, 'Vaikom', 5),
(139, 'Adimali', 6),
(140, 'Cheruthoni', 6),
(141, ' Idukki', 6),
(142, ' Kattappana', 6),
(143, ' Kumily', 6),
(144, ' Marayur', 6),
(145, ' Munnar', 6),
(146, ' Murickassery', 6),
(147, ' Muthalakodam', 6),
(148, ' Nedumkandam', 6),
(149, ' Painavu', 6),
(150, ' Parathode', 6),
(151, ' Peermade', 6),
(152, ' Thekkady', 6),
(153, ' Thodupuzha', 6),
(154, ' Thopramkudy', 6),
(155, ' Udumbanchola', 6),
(156, ' Vandiperiyar', 6),
(157, 'Allapra', 7),
(158, 'Aluva', 7),
(159, 'Ambalamedu', 7),
(160, 'Ambalamugal', 7),
(161, 'Angamaly', 7),
(162, 'Arakkunnam', 7),
(163, 'Chembarakky', 7),
(164, 'Chendamangalam', 7),
(165, 'Chengamanad', 7),
(166, 'Cheranallur', 7),
(167, 'Cheruvattoor', 7),
(168, 'Choornikkara', 7),
(169, 'Chowwara', 7),
(170, 'Chowwera', 7),
(171, 'Edachira', 7),
(172, 'Edappally', 7),
(173, 'Edathala', 7),
(174, 'Eloor', 7),
(175, 'Ernakulam', 7),
(176, 'Irumpanam', 7),
(177, ' Kadamakkudy', 7),
(178, ' Kadayiruppu', 7),
(179, ' Kadungalloor', 7),
(180, ' Kakkanad', 7),
(181, ' Kalady', 7),
(182, ' Kalamassery', 7),
(183, ' Kanjoor', 7),
(184, ' Kaprikkad', 7),
(185, ' Keezhmad', 7),
(186, ' Kochi', 7),
(187, ' Kolenchery', 7),
(188, ' Koonammavu', 7),
(189, ' Koothattukulam', 7),
(190, ' Kothamangalam', 7),
(191, ' Kottuvally', 7),
(192, ' Kundannoor', 7),
(193, ' Kunnukara', 7),
(194, ' Kureekkad', 7),
(195, ' Malayattoor', 7),
(196, ' Malayidomthuruth', 7),
(197, ' Manjaly', 7),
(198, ' Maradu', 7),
(199, ' Mattoor', 7),
(200, ' Moolampilly', 7),
(201, ' Mulavukad', 7),
(202, ' Muvattupuzha', 7),
(203, ' Nayarambalam', 7),
(204, ' Nedumbassery', 7),
(205, ' Nedungad', 7),
(206, 'North Paravur', 7),
(207, 'Oorakkad', 7),
(208, 'Palliyangadi', 7),
(209, 'Pampakuda', 7),
(210, 'Payyal', 7),
(211, 'Perumbavoor', 7),
(212, 'Perumpadappu', 7),
(213, 'Pezhakkappilly', 7),
(214, 'Piravom', 7),
(215, 'Pizhala', 7),
(216, 'Ponjassery', 7),
(217, 'Pukkattupadi', 7),
(218, 'Puliyanam', 7),
(219, 'Thamarachal', 7),
(220, 'Thiruvankulam', 7),
(221, 'Thottakkattukara', 7),
(222, 'Thrippunithura', 7),
(223, 'Thuruthipilly', 7),
(224, 'Udayamperoor', 7),
(225, 'Varappuzha', 7),
(226, 'Vazhakkala', 7),
(227, 'Vazhakulam', 7),
(228, 'Venduvazhy', 7),
(229, 'Vengoor ', 7),
(230, 'Vyttila', 7),
(231, 'Adat', 8),
(232, 'Akathiyoor', 8),
(233, 'Alagappa Nagar', 8),
(234, 'Annamanada', 8),
(235, 'Arangottukara', 8),
(236, 'Attore North', 8),
(237, 'Attore South', 8),
(238, 'Avinissery', 8),
(239, 'Brahmakulam', 8),
(240, 'Chalakudy', 8),
(241, 'Chavakkad', 8),
(242, 'Chelakkara', 8),
(243, 'Chemmappilly', 8),
(244, 'Chevoor', 8),
(245, 'Guruvayur', 8),
(246, 'Harinagar Poonkunnam', 8),
(247, ' Iringaprom', 8),
(248, ' Irinjalakuda', 8),
(249, ' Kallamkunnu', 8),
(250, ' Kanimangalam', 8),
(251, ' Karuvannoor', 8),
(252, ' Kechery', 8),
(253, ' Kodakara', 8),
(254, ' Kodungallur', 8),
(255, ' Kolazhy', 8),
(256, ' Koratty', 8),
(257, ' Kottappuram', 8),
(258, ' Kottapuram', 8),
(259, ' Kunnamkulam', 8),
(260, ' Kuthiran', 8),
(261, ' Kuttur', 8),
(262, ' Mala', 8),
(263, ' Manaloor', 8),
(264, ' Marathakkara', 8),
(265, ' Methala', 8),
(266, ' Moonupeedika', 8),
(267, ' Mulakunnathukavu', 8),
(268, ' Mupliyam', 8),
(269, ' Nenmanikkara', 8),
(270, ' Palakkal', 8),
(271, ' Palayur', 8),
(272, ' Palissery', 8),
(273, ' Paluvai', 8),
(274, ' Pavaratty', 8),
(275, ' Perakam', 8),
(276, ' Perambra', 8),
(277, ' Peruvamkulangara', 8),
(278, ' Pottore', 8),
(279, ' Puranattukara', 8),
(280, ' Puthukkad', 8),
(281, ' Puzhakkal ', 8),
(282, 'Sangamagrama', 8),
(283, 'Thaikkad', 8),
(284, 'Thalapilly', 8),
(285, 'Thalore', 8),
(286, 'Thiruvalayannur', 8),
(287, 'Thrissur', 8),
(288, 'Triprayar', 8),
(289, 'Vadakkumkara', 8),
(290, 'Vadanappally', 8),
(291, 'Vallachira', 8),
(292, 'Varandarappilly', 8),
(293, 'Vellanikkara', 8),
(294, 'Venmanad', 8),
(295, ' Wadakkancherry', 8),
(296, ' Chandranagar', 9),
(297, ' Chittur-Thathamangalam', 9),
(298, 'Kaikatty', 9),
(299, 'Kakkayur', 9),
(300, 'Kanjikode', 9),
(301, 'Karuvanpadi', 9),
(302, 'Kesavanpara', 9),
(303, 'Kulappully', 9),
(304, 'Kumbidi', 9),
(305, 'Manissery', 9),
(306, 'Mankurussi', 9),
(307, 'Mannarkkad', 9),
(308, 'Marutharode', 9),
(309, 'Olavakkode', 9),
(310, 'Padinjarangadi', 9),
(311, 'Palakkad', 9),
(312, 'Palakkuzhi', 9),
(313, 'Palappuram', 9),
(314, 'Pathirippala', 9),
(315, 'Pattambi', 9),
(316, 'Puthur', 9),
(317, 'Shoranur', 9),
(318, 'Trikkatiri', 9),
(319, ' Vadakkencherry', 9),
(320, ' Vaniyamkulam', 9),
(321, ' Vazhempuram', 9),
(322, ' Walayar', 9),
(323, ' Aikkarappadi', 10),
(324, ' Alamkod', 10),
(325, ' Alattiyur', 10),
(326, ' Ananthavoor', 10),
(327, ' Angadipuram', 10),
(328, ' Areekode', 10),
(329, ' Ariyallur', 10),
(330, ' Athavanad', 10),
(331, ' Changaramkulam', 10),
(332, ' Chemmad', 10),
(333, ' Cheriyamundam', 10),
(334, ' Cherukara', 10),
(335, ' Cherukavu', 10),
(336, ' Chungathara', 10),
(337, 'Edakkara', 10),
(338, 'Edappal', 10),
(339, 'Edarikode', 10),
(340, 'Idimuzhikkal', 10),
(341, 'Irimbiliyam', 10),
(342, ' Kadampuzha', 10),
(343, ' Kakkad', 10),
(344, 'Kalady', 10),
(345, 'Kalikavu', 10),
(346, 'Karinkallathani', 10),
(347, 'Karipur', 10),
(348, 'Kavathikalam', 10),
(349, 'Kodur', 10),
(350, 'Kondotty', 10),
(351, 'Koottilangadi', 10),
(352, 'Kottakkal', 10),
(353, 'Kuttippuram', 10),
(354, 'Malappuram', 10),
(355, 'Mampad', 10),
(356, 'Mangalam', 10),
(357, 'Manjeri', 10),
(358, 'Mankada', 10),
(359, 'Maranchery', 10),
(360, 'Mongam', 10),
(361, 'Naduvattom', 10),
(362, 'Nannambra', 10),
(363, 'Nediyiruppu', 10),
(364, 'Neduva', 10),
(365, 'Nilambur', 10),
(366, 'Niramarutur', 10),
(367, 'Oorakam', 10),
(368, 'Othukkungal', 10),
(369, 'Pallikkal', 10),
(370, 'Pandikkad', 10),
(371, 'Parappanangadi', 10),
(372, 'Parappur', 10),
(373, 'Pattikkad', 10),
(374, 'Perinthalmanna', 10),
(375, 'Perumanna-Klari', 10),
(376, 'Peruvallur', 10),
(377, 'Ponmundam', 10),
(378, 'Ponnani', 10),
(379, 'Pudiyangadi', 10),
(380, 'Purathur', 10),
(381, 'Puthanathani', 10),
(382, 'Tanur', 10),
(383, 'Tenhipalam', 10),
(384, 'Tennala', 10),
(385, 'Thalakkad', 10),
(386, 'Thalappara', 10),
(387, 'Tirur', 10),
(388, 'Tirurangadi', 10),
(389, 'Valambur', 10),
(390, 'Valanchery', 10),
(391, 'Valiyakunnu', 10),
(392, 'Valluvambram Junction', 10),
(393, 'Vaniyambalam', 10),
(394, 'Vazhayur', 10),
(395, 'Veliyankode', 10),
(396, 'Vengara', 10),
(397, 'Wandoor', 10),
(398, 'Balussery', 11),
(399, ' Cheruvannur Nallalam', 11),
(400, 'Feroke', 11),
(401, ' Kinassery', 11),
(402, 'Koduvally', 11),
(403, 'Koodaranji', 11),
(404, 'Koyilandy', 11),
(405, 'Kozhikode', 11),
(406, 'Kunnamangalam', 11),
(407, 'Madappally', 11),
(408, 'Pantheeramkavu', 11),
(409, 'Perambra', 11),
(410, 'Poovaranthode', 11),
(411, 'Ramanattukara', 11),
(412, ' Thamarassery', 11),
(413, ' Thiruvambady', 11),
(414, ' Thottumukkam', 11),
(415, ' Vatakara', 11),
(416, ' Kalpetta', 12),
(417, ' Kayakkunn', 12),
(418, ' Mananthavady', 12),
(419, ' Meenangadi', 12),
(420, 'Padinharethara', 12),
(421, 'Panamaram', 12),
(422, 'Pulpally', 12),
(423, 'Sultan Bathery', 12),
(424, 'Alakode', 13),
(425, 'Anjarakkandy', 13),
(426, 'Anthoor', 13),
(427, 'Azhikode and Azhikkal', 13),
(428, 'Cheleri', 13),
(429, 'Cherukunnu', 13),
(430, 'Cherupuzha', 13),
(431, 'Cheruthazham', 13),
(432, 'Dharmadom', 13),
(433, 'Eranholi', 13),
(434, 'Eruvatti', 13),
(435, 'Ezhome', 13),
(436, 'Irikkur', 13),
(437, 'Iritty', 13),
(438, 'Iriveri', 13),
(439, 'Kadachira', 13),
(440, 'Kadannappalli', 13),
(441, 'Kadirur', 13),
(442, 'Kalliasseri', 13),
(443, 'Kandamkunnu', 13),
(444, 'Kanhirode', 13),
(445, 'Kannadiparamba', 13),
(446, 'Kannapuram', 13),
(447, 'Kannur', 13),
(448, 'Karivellur', 13),
(449, 'Keezhallur', 13),
(450, 'Kolachery', 13),
(451, 'Kolavelloor', 13),
(452, 'Koodali', 13),
(453, 'Kottayam-Malabar', 13),
(454, 'Kunhimangalam', 13),
(455, 'Kurumathur', 13),
(456, 'Kuthuparamba', 13),
(457, 'Kuttiattoor', 13),
(458, 'Madayi', 13),
(459, 'Manantheri', 13),
(460, 'Mangattidam', 13),
(461, 'Maniyoor', 13),
(462, 'Mattanur', 13),
(463, 'Mavilayi', 13),
(464, 'Mayyil', 13),
(465, 'Mokeri', 13),
(466, 'Narath', 13),
(467, 'Paduvilayi', 13),
(468, 'Panniyannur', 13),
(469, 'Panoor', 13),
(470, 'Pappinisseri', 13),
(471, 'Pariyaram', 13),
(472, 'Pathiriyad', 13),
(473, 'Pattiom', 13),
(474, 'Payyanur', 13),
(475, 'Pazhayangadi', 13),
(476, 'Peralasseri', 13),
(477, 'Peravoor', 13),
(478, 'Peringathur', 13),
(479, 'Pilathara', 13),
(480, 'Pinarayi', 13),
(481, 'Sreekandapuram', 13),
(482, 'Taliparamba', 13),
(483, 'Thalassery', 13),
(484, 'Bangramanjeshwar', 14),
(485, 'Bare', 14),
(486, 'Cherkala', 14),
(487, 'Cheruvathur', 14),
(488, 'Hosabettu', 14),
(489, 'Kanhangad', 14),
(490, 'Kasaragod', 14),
(491, 'Kunjathur', 14),
(492, 'Manjeshwar', 14),
(493, 'Nileshwaram', 14),
(494, 'Uppala', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `tool_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_id`, `user_rating`, `user_review`, `review_datetime`, `tool_id`) VALUES
(1, 0, '0', 'hii\n', '2022-09-13 10:33:14', 8),
(2, 0, '4', 'hii\n', '2022-09-13 10:33:27', 8),
(3, 0, '0', 'khb ', '2022-10-28 14:41:10', 8),
(4, 0, '5', 'hyfctxcyfrcugvj\n', '2022-10-28 15:26:55', 8),
(5, 0, '4', 'ujhjef', '2022-10-28 15:51:40', 11),
(6, 3, '4', 'sdzf', '2022-10-28 16:01:10', 11),
(7, 2, '4', 'GOOD\n\n', '2022-10-31 15:06:20', 9),
(8, 2, '4', 'GOOD\n', '2022-10-31 15:07:36', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schat`
--

CREATE TABLE `tbl_schat` (
  `schat_id` int(11) NOT NULL,
  `schat_fromuid` int(11) NOT NULL,
  `schat_tosid` int(11) NOT NULL,
  `schat_touid` int(11) NOT NULL,
  `schat_fromsid` int(11) NOT NULL,
  `schat_content` varchar(500) NOT NULL,
  `schat_datetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_schat`
--

INSERT INTO `tbl_schat` (`schat_id`, `schat_fromuid`, `schat_tosid`, `schat_touid`, `schat_fromsid`, `schat_content`, `schat_datetime`) VALUES
(1, 3, 2, 0, 0, 'HI', 'November 08 2022, 12:37 PM'),
(2, 0, 0, 3, 2, 'Enthuvadey', 'November 08 2022, 12:49 PM'),
(3, 3, 2, 0, 0, 'Podey', 'November 08 2022, 12:51 PM'),
(4, 0, 0, 0, 2, 'Podaa !@', 'November 08 2022, 12:51 PM'),
(5, 0, 0, 3, 2, 'Hi', 'November 08 2022, 12:52 PM'),
(6, 0, 0, 3, 2, 'How', 'November 08 2022, 12:52 PM'),
(7, 3, 2, 0, 0, 'Who', 'November 08 2022, 12:52 PM'),
(8, 0, 0, 3, 2, 'podaaa', 'November 08 2022, 12:52 PM'),
(9, 0, 0, 3, 2, 'Hiii', 'November 08 2022, 02:21 PM'),
(10, 0, 0, 3, 2, 'hi', 'November 08 2022, 02:22 PM'),
(11, 0, 0, 3, 2, 'hi', 'November 08 2022, 02:22 PM'),
(12, 0, 0, 3, 2, 'hi', 'November 08 2022, 02:22 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `stock_date` varchar(100) NOT NULL,
  `tool_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `tool_id`) VALUES
(59, 8, '2022-10-31', 8),
(60, 10, '2022-10-13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(9, 'Grass Cutter', 6),
(10, 'Tiller', 6),
(11, 'Pressure pump', 6),
(12, 'Screwing Machine', 9),
(13, 'Drill', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tool`
--

CREATE TABLE `tbl_tool` (
  `tool_id` int(11) NOT NULL,
  `tool_name` varchar(100) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `tool_photo` varchar(100) NOT NULL,
  `tool_details` varchar(100) NOT NULL,
  `tool_rentprice` int(11) NOT NULL,
  `toolshop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tool`
--

INSERT INTO `tbl_tool` (`tool_id`, `tool_name`, `subcategory_id`, `company_id`, `type_id`, `tool_photo`, `tool_details`, `tool_rentprice`, `toolshop_id`, `user_id`) VALUES
(8, 'Drill', 13, 5, 5, '1.jpg', 'BOSCH Bosch 500 W GSB 501 drill machine with 5 high quality drill bits 500 W GSB 501 drill machine w', 150, 0, 2),
(9, 'Pressure Washer', 11, 8, 5, '34.jpg', 'iBELL WIND79 Induction Motor 1800 W 140bar 6L/Min Flow High Pressure Washer for Cars/Bikes & Home Cl', 200, 0, 3),
(11, 'driller', 13, 5, 6, 'IMG_20210307_154827.jpg', 'driller', 100, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_toolshop`
--

CREATE TABLE `tbl_toolshop` (
  `toolshop_id` int(11) NOT NULL,
  `toolshop_name` varchar(100) NOT NULL,
  `toolshop_contact` int(11) NOT NULL,
  `toolshop_email` varchar(100) NOT NULL,
  `toolshop_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `toolshop_logo` varchar(100) NOT NULL,
  `toolshop_proof` varchar(100) NOT NULL,
  `toolshop_password` varchar(100) NOT NULL,
  `toolshop_doj` date NOT NULL,
  `toolshop_vstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_toolshop`
--

INSERT INTO `tbl_toolshop` (`toolshop_id`, `toolshop_name`, `toolshop_contact`, `toolshop_email`, `toolshop_address`, `place_id`, `toolshop_logo`, `toolshop_proof`, `toolshop_password`, `toolshop_doj`, `toolshop_vstatus`) VALUES
(2, 'AR Tools', 2147483647, 'shop1@gmail.com', 'AR Tools\r\nCS Building', 71, '1.jpg', 'Screenshot (1).png', '12345678', '2022-07-30', '1'),
(3, 'Power Tools', 2147483647, 'shop2@gmail.com', 'PowerTool\r\nCSI BUilding', 202, '2.jpg', 'Screenshot (1).png', '12345678', '2022-07-30', '1'),
(4, 'Handy Tools', 2147483647, 'shop3@gmail.com', 'Handy Tools\r\nRajan Building', 487, '3.jpg', 'Screenshot (1).png', '12345678', '2022-07-30', '1'),
(5, 'fd', 0, 'dfs', 'fhbx', 172, 'pexels-ahmad-syahrir-761815.jpg', 'pexels-kam-pratt-5058766.jpg', '1234', '2022-10-28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(5, 'wired'),
(6, 'wireless'),
(7, 'diesel'),
(9, 'Hand Tools');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uchat`
--

CREATE TABLE `tbl_uchat` (
  `uchat_id` int(11) NOT NULL,
  `uchat_fromuid` int(11) NOT NULL,
  `uchat_touid` int(11) NOT NULL,
  `uchat_datetime` varchar(100) NOT NULL,
  `uchat_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_uchat`
--

INSERT INTO `tbl_uchat` (`uchat_id`, `uchat_fromuid`, `uchat_touid`, `uchat_datetime`, `uchat_content`) VALUES
(1, 2, 3, 'November 08 2022, 10:44 AM', 'Hai'),
(2, 3, 2, 'November 08 2022, 10:45 AM', 'hello'),
(3, 2, 3, 'November 08 2022, 10:46 AM', 'Hai'),
(4, 2, 2, 'November 10 2022, 08:07 PM', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_vstatus` varchar(100) NOT NULL,
  `user_doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_contact`, `user_address`, `place_id`, `user_photo`, `user_proof`, `user_password`, `user_vstatus`, `user_doj`) VALUES
(2, 'Alan', 'user1@gmail.com', 'Male', 2147483647, 'Alan Home\r\nMallapalli\r\nPathanamthitta', 94, '1.jpg', 'Screenshot (1).png', '1234', '', '2022-07-30'),
(3, 'Ajax', 'user2@gmail.com', 'Male', 2147483647, 'Ajax house\r\nThekummood\r\n', 66, '2.jpg', 'Screenshot (1).png', '123', '', '2022-07-30'),
(4, 'Mridula', 'user3@gmail.com', 'Female', 2147483647, 'Mridula bhavanam\r\nRajagiri', 304, '3.jpg', 'Screenshot (1).png', '12345678', '', '2022-07-30'),
(5, 'Jaani', 'user4@gmail.com', 'Female', 2147483647, 'Jaani Vilasam\r\nPunnoor', 211, '4.jpg', 'Screenshot (1).png', '12345678', '', '2022-07-30'),
(6, '', '', '', 0, '', 0, '', '', '', '', '2022-08-26'),
(7, 'Jisha', 'jishasmc@gmail.com', 'Female', 2147483647, 'Valayanchirangara', 157, 'IMG_20200731_205355 (1).jpg', 'IMG_20200428_194851 (2).jpg', 'drgvfe', '', '2022-10-17'),
(8, '', '', '', 0, '', 0, '', '', '', '', '2022-10-28'),
(9, 'drgb', '', '', 2147483647, '', 0, '', '', '', '', '2022-10-28'),
(10, 'Suraj', '', '', 0, '', 0, '', '', '', '', '2022-10-28'),
(11, 'alan', '', 'Male', 0, '', 0, '', '', '', '', '2022-10-28'),
(12, 'rama', '', 'Female', 0, '', 0, '', '', '', '', '2022-10-28'),
(13, 'sursaj', '', '', 0, '', 0, '', '', '', '', '2022-10-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  ADD PRIMARY KEY (`boy_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_schat`
--
ALTER TABLE `tbl_schat`
  ADD PRIMARY KEY (`schat_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_tool`
--
ALTER TABLE `tbl_tool`
  ADD PRIMARY KEY (`tool_id`);

--
-- Indexes for table `tbl_toolshop`
--
ALTER TABLE `tbl_toolshop`
  ADD PRIMARY KEY (`toolshop_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_uchat`
--
ALTER TABLE `tbl_uchat`
  ADD PRIMARY KEY (`uchat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_deliveryboy`
--
ALTER TABLE `tbl_deliveryboy`
  MODIFY `boy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_schat`
--
ALTER TABLE `tbl_schat`
  MODIFY `schat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_tool`
--
ALTER TABLE `tbl_tool`
  MODIFY `tool_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_toolshop`
--
ALTER TABLE `tbl_toolshop`
  MODIFY `toolshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_uchat`
--
ALTER TABLE `tbl_uchat`
  MODIFY `uchat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
