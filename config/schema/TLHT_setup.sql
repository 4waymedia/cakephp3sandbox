-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2019 at 09:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazon_jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `description`) VALUES
(1, 'Venmo', 'Business Venmo Account - busvenmo@tlht.com'),
(2, 'Bank of the West', 'business account');

-- --------------------------------------------------------

--
-- Table structure for table `account_payments`
--

DROP TABLE IF EXISTS `account_payments`;
CREATE TABLE IF NOT EXISTS `account_payments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `technician_id` varchar(32) NOT NULL DEFAULT '',
  `job_id` char(32) NOT NULL DEFAULT '',
  `order_id` char(254) NOT NULL DEFAULT '',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `confirmation_receipt` varchar(24) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

DROP TABLE IF EXISTS `contractors`;
CREATE TABLE IF NOT EXISTS `contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `technician_id` varchar(32) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nickname` varchar(64) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`id`, `first_name`, `technician_id`, `last_name`, `email`, `nickname`, `role_id`, `created`, `modified`) VALUES
(3, 'Dustin', 'Dustin Hennagin-A2KDRJ6UAD2OJT', 'Hennagin', 'Skater0guy@gmail.com', 'Fuzz', 2, '2019-01-06 02:29:43', '2019-01-06 02:29:43'),
(4, 'Josh', 'Joshua Hennagin-A32BDXSGWDJRPY', 'G', 'paulg@me.com', 'Paul G', 1, '2019-01-06 02:59:11', '2019-01-06 03:15:17'),
(5, 'test', 'Joshua Hennagin-A32BDXSG', 'assis', 'assistme@you.com', 'assistant', 1, '2019-01-06 03:21:30', '2019-01-06 03:31:16'),
(6, 'Eric', 'Eric Flint-A1VGPOC5WLXTK6', 'Flint', 'eric@me.com', 'Eric F', 1, NULL, '2019-02-17 06:46:19'),
(7, 'Joshua', 'Hennagin-A32BDXSGWDJRPY', 'Hennagin', NULL, NULL, 1, '2019-02-22 21:19:53', '2019-02-22 21:19:53'),
(8, 'Eric', 'Flint-A1VGPOC5WLXTK6', 'Flint', NULL, NULL, 1, '2019-02-22 21:19:53', '2019-02-22 21:19:53'),
(9, 'Dustin', 'Hennagin-A2KDRJ6UAD2OJT', 'Hennagin', NULL, NULL, 1, '2019-02-22 21:19:53', '2019-02-22 21:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_payments`
--

DROP TABLE IF EXISTS `contractor_payments`;
CREATE TABLE IF NOT EXISTS `contractor_payments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contractor_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `order_id` char(254) DEFAULT NULL,
  `payment_source_id` char(254) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT '0.00',
  `deduction_fees` decimal(10,2) DEFAULT '0.00',
  `payment_addon` decimal(10,2) DEFAULT '0.00',
  `job_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime NOT NULL,
  `service_order_id` varchar(32) NOT NULL DEFAULT '',
  `job_id` char(50) NOT NULL DEFAULT '',
  `service_asin` varchar(15) NOT NULL DEFAULT '',
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` varchar(10) NOT NULL DEFAULT '',
  `appointment_start_time` time NOT NULL,
  `appointment_end_time` time NOT NULL,
  `product_order_id` varchar(200) NOT NULL DEFAULT '',
  `product_asin` varchar(39) NOT NULL DEFAULT '',
  `product_name` varchar(100) NOT NULL DEFAULT '',
  `product_quantity_purchased` int(5) NOT NULL,
  `product_order_status` varchar(32) NOT NULL DEFAULT '',
  `technician` varchar(100) NOT NULL DEFAULT '',
  `buyer_phone_number` varchar(20) DEFAULT NULL,
  `ship_address_line_1` varchar(64) NOT NULL DEFAULT '',
  `ship_address_line_2` varchar(64) DEFAULT NULL,
  `ship_postal_code` int(11) NOT NULL,
  `ship_city` varchar(32) NOT NULL DEFAULT '',
  `coverage_area` varchar(64) DEFAULT NULL,
  `buyer_id` varchar(11) DEFAULT NULL,
  `defect` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=638 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `order_created_time`, `service_order_id`, `job_id`, `service_asin`, `job_name`, `job_status`, `appointment_date`, `appointment_start_time`, `appointment_end_time`, `product_order_id`, `product_asin`, `product_name`, `product_quantity_purchased`, `product_order_status`, `technician`, `buyer_phone_number`, `ship_address_line_1`, `ship_address_line_2`, `ship_postal_code`, `ship_city`, `coverage_area`, `buyer_id`, `defect`) VALUES
(541, '2019-02-17 14:40:42', '112-1751879-3608210', '56b47ed0-9c8f-2d9b-79bb-a50093a587b7', 'B01M9E5IBJ', 'Handyman Services - 2 Hours - Inside - No Ladder', 'COMPLETED', '2019-02-20', '14:00:00', '17:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '415-516-0478', '1998 BROADWAY APT 1503', '--', 94109, 'SAN FRANCISCO', '35 miles radius around 94590', '469383591', '--'),
(542, '2019-02-17 13:12:52', '113-6946028-5419405', '28b47ea9-04e6-b83b-1c47-14162fc7a24e', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-20', '14:00:00', '17:00:00', '113-4489027-0602638', 'B07H4BGWXX', 'HARDWARE', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '9254138090', '336 N MILL VALLEY DR', '--', 95391, 'MOUNTAIN HOUSE', '35 miles radius around 94590', '767646410', '--'),
(543, '2019-02-15 15:45:45', '114-0503659-8884257', '74b479ca-a438-3ea6-e212-a93423f9bae4', 'B06WGSP17V', 'Leaky Faucet Repair', 'COMPLETED', '2019-02-19', '14:00:00', '17:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '5103204241', '5566 MORAGA AVE', '--', 94611, 'OAKLAND', '35 miles radius around 94590', '1954078281', '--'),
(544, '2019-02-15 13:59:45', '114-8876954-8284239', '5ab4799b-89aa-a2c5-c4e1-2d77e95a1bb9', 'B00STOHXWC', 'Treadmill Assembly', 'COMPLETED', '2019-02-19', '17:00:00', '20:00:00', '114-1767030-9897031', 'B0193V3DJ6', 'TREADMILL', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '9259008999', '1046 LINDSEY CT', '--', 94549, 'LAFAYETTE', 'Marin County', '21268182705', '--'),
(545, '2019-02-13 17:18:56', '114-3419655-1821042', '22b474cb-efcc-d389-ad83-08bb1922a43a', 'B01CFCGM7U', 'Mailbox Installation - Post Mounted - First-Time Installation', 'COMPLETED', '2019-02-17', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '510-449-5150', '3136 PASEO GRANADA', '--', 94566, 'PLEASANTON', '35 miles radius around 94590', '50840234', '--'),
(546, '2019-02-12 19:28:09', '113-1032634-7121844', '08b47273-8d56-830e-4f11-21a549989049', 'B00UBYCN28', 'Furniture Assembly - 3 hours', 'COMPLETED', '2019-02-16', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '9253243146', '1187 SCOTS LN', '--', 94596, 'WALNUT CREEK', 'Marin County', '1779209811', '--'),
(547, '2019-02-12 18:10:49', '112-8384385-9762648', 'c0b47251-33ab-17af-825f-c812ff23f035', 'B01JJQV73O', 'Grab Bar Installation - Tile', 'COMPLETED', '2019-02-18', '14:00:00', '17:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '510 796-1365', '38162 WOODRUFF DR', '--', 94560, 'NEWARK', '35 miles radius around 94590', '926780711', '--'),
(548, '2019-02-12 11:44:17', '112-9642975-0333032', '56b4719f-0d18-e7c8-1b5d-ec598b446bdc', 'B00UBYCOV8', 'Furniture Assembly - 4 hours', 'COMPLETED', '2019-02-15', '17:00:00', '20:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4155132393', '2952 BELLA DR', '--', 94519, 'CONCORD', 'Marin County', '1788213620', '--'),
(549, '2019-02-11 22:18:31', '114-7125913-4572224', '54b4702f-70e3-9848-533b-aab32f465620', 'B012TXC7B0', 'Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More', 'COMPLETED', '2019-02-16', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '6572292473', '1515 15TH ST APT 505', '--', 94103, 'SAN FRANCISCO', '35 miles radius around 94590', '840477140', '--'),
(550, '2019-02-10 19:15:12', '111-0779493-5357803', '0ab46d4a-da48-9349-087b-417e386c2d0a', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-17', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '+18327979576', '21 Bud Ct', '--', 94523, 'Pleasant Hill', 'San Francisco Bay Area', '1136352980', '--'),
(551, '2019-02-10 18:56:06', '114-3640514-1377015', '2eb46d3f-0e26-91ca-4e18-583313b152ae', 'B00STRWUKO', 'Bed Assembly - Bunk Bed', 'COMPLETED', '2019-02-14', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '415-573-7300', '700 ROBIN DR APT 746', '--', 94925, 'CORTE MADERA', 'Marin County', '772851616', '--'),
(552, '2019-02-10 18:18:35', '113-5195961-0749818', 'eeb46d30-4918-ffd2-c877-6b83d02cedbf', 'B00STRX6AC', 'TV Stand or Media Storage Assembly - Media Cabinet', 'COMPLETED', '2019-02-16', '08:00:00', '11:00:00', '113-9555714-3294639|113-9555714-3294639', 'B015Q0JXX8|B000NPQKUG', 'HOME_FURNITURE_AND_DECOR|HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered|NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '7074792455', '1125 COWAN LN', '--', 95448, 'HEALDSBURG', '35 miles radius around 94590', '750356291', '--'),
(553, '2019-02-10 16:21:48', '112-6817605-1168224', '92b46cfa-18bf-6bc2-f3c0-bf7c844e0074', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-16', '11:00:00', '14:00:00', '112-7529414-5625852', 'B004O6TXVS', 'SPORTING_GOODS', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '707-2176850', '4733 TARTON DR', '--', 95405, 'SANTA ROSA', 'San Francisco Bay Area', '1001332', '--'),
(554, '2019-02-10 09:40:52', '112-0703496-8933804', '70b46c43-1245-1edb-7198-eee5d825af58', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-14', '17:00:00', '20:00:00', '112-4351814-3633005', 'B002CVU2HG', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4152163757', '1285 REDWOOD BLVD APT D', '--', 94947, 'NOVATO', 'Marin County', '776472281', '--'),
(555, '2019-02-10 09:05:54', '114-5028255-4623413', '08b46c30-0d8d-5bce-bb24-68185f19edc0', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-13', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '+14156409935', '1700 22ND AVE', '--', 94122, 'SAN FRANCISCO', 'Marin County', '1195865460', '--'),
(556, '2019-02-09 20:33:04', '112-6715531-2377018', '8eb46ad8-89f8-3f65-51e9-92ebfa3d888f', 'B00STOHWSM', 'Home Gym Assembly', 'COMPLETED', '2019-02-16', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9169924537', '3681 BRIDLEWOOD WAY', '--', 95747, 'ROSEVILLE', '94203', '1099601191', '--'),
(557, '2019-02-08 21:04:36', '112-6063135-3301823', '6eb46855-96b4-b9e1-01df-900ffe29b1a2', 'B01L2YQNFI', 'Toilet Replacement (Commercial)', 'COMPLETED', '2019-02-20', '08:00:00', '11:00:00', '112-4080285-4598602', 'B01N1I9D6E', 'PLUMBING_FIXTURE', 1, 'Delivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '916-960-9462', '9169 PINTO CANYON WAY', '--', 95747, 'ROSEVILLE', '94203', '2081718290', '--'),
(558, '2019-02-08 17:34:06', '112-9343665-6265850', '12b467f2-46a7-148d-9342-5728db534c67', 'B00T1HBZDE', 'Grill Assembly - 4 or 5 burners', 'COMPLETED', '2019-02-18', '08:00:00', '11:00:00', '112-5680200-7013036', 'B002BCSX0Y', 'OUTDOOR_LIVING', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '3177969901', '1123 VINTAGE GREENS DR', '--', 95492, 'WINDSOR', '35 miles radius around 94590', '1958449651', '--'),
(559, '2019-02-08 14:29:53', '113-6397731-2865833', 'b6b467cf-dfc5-ae65-cb74-4c49035ca45c', 'B00STOHR28', 'Hutch Assembly', 'COMPLETED', '2019-02-18', '08:00:00', '11:00:00', '113-9052336-2684229', 'B01M8MW5UO', 'HOME_FURNITURE_AND_DECOR', 1, 'Delivered', 'Eric Flint-A1VGPOC5WLXTK6', '+19196493039', '463 AVIATION BLVD', '--', 95403, 'SANTA ROSA', '35 miles radius around 94590', '1267837360', '--'),
(560, '2019-02-08 00:40:41', '113-8634078-0042669', '74b46622-bd81-d132-e590-1a652ffb64ed', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-18', '11:00:00', '14:00:00', '113-2380028-3559460', 'B072JHYQGC', 'SPORTING_GOODS', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '7075951436', '9 PIN OAK PL', '--', 95409, 'SANTA ROSA', '35 miles radius around 94590', '1208395221', '--'),
(561, '2019-02-07 16:34:42', '111-4406380-8291456', '4ab46545-1dbf-54f5-96c5-1e00f750158a', 'B06WGSP17V', 'Leaky Faucet Repair', 'COMPLETED', '2019-02-11', '17:00:00', '20:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '4087057568', '4782 NEWHAVEN ST', '--', 94568, 'DUBLIN', '35 miles radius around 94590', '2073216210', '--'),
(562, '2019-02-06 17:31:54', '111-0348503-2210632', '14b462cc-09ae-4080-701d-fc42fd812e8e', 'B00STOHXWC', 'Treadmill Assembly', 'COMPLETED', '2019-02-11', '17:00:00', '20:00:00', '111-7122882-9945059', 'B01M0L0D90', 'SPORTING_GOODS', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '5102290574', '5332 GOLD CREEK CIR', '--', 94505, 'DISCOVERY BAY', '7967dce2-1e7d-475f-84ff-b087e57bcdaa-DELETED', '36514981', 'LateSentEta'),
(563, '2019-02-06 16:51:25', '113-8889144-1842668', '44b462b9-7d4a-bde0-b577-336903877e86', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-13', '17:00:00', '20:00:00', '113-5923060-4389844', 'B07GQ71KCH', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '510.219.0118', '484 WELDON AVE', '--', 94610, 'OAKLAND', 'CA - Alameda County', '640741381', '--'),
(564, '2019-02-06 16:23:07', '112-6857864-2826654', 'e0b462ab-e9d3-ff8c-da76-b70c2c386d75', 'B071XVGL49', 'Toilet Fill Valve Replacement', 'COMPLETED', '2019-02-11', '11:00:00', '14:00:00', '112-8730071-2846653', 'B01BNVDPZ6', 'PLUMBING_FIXTURE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9199437750', '915 RAILROAD AVE', '--', 94019, 'HALF MOON BAY', 'e0477cce-1e28-4667-8dd2-4affa1c1d9b7-DELETED', '61688910', 'LateSentEta'),
(565, '2019-02-05 16:10:03', '111-6666968-6229013', 'a4b46012-8f5f-8a06-3ddd-3292ad511e36', 'B06VX413N3', 'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit', 'COMPLETED', '2019-02-10', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '925 785 9035', '3979 DEERGRASS CIR', '--', 95677, 'ROCKLIN', '94203', '1080191320', 'LateSentEta'),
(566, '2019-02-05 16:06:21', '111-1235516-9590652', 'd4b46011-7c74-f046-782e-d712e1ab3fdf', 'B06VX413N3', 'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit', 'COMPLETED', '2019-02-10', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '925 785 9035', '3979 DEERGRASS CIR', '--', 95677, 'ROCKLIN', '94203', '1080191320', 'LateSentEta'),
(567, '2019-02-05 12:34:55', '112-3048266-3807429', 'acb45fb0-8e56-de45-39b2-8db711b8cae7', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-08', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '8182746040', '2416 BONAR ST', '--', 94702, 'BERKELEY', 'San Francisco Bay Area', '2007766230', 'LateSentEta'),
(568, '2019-02-04 22:18:24', '114-6656580-1596255', '86b45e2b-c09c-cade-c92e-69fc69d67278', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-11', '11:00:00', '14:00:00', '114-8826160-9406615', 'B01MS7EWR9', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '707-696-5051', '808 DONAHUE ST', '--', 95401, 'SANTA ROSA', '35 miles radius around 94590', '1893740040', '--'),
(569, '2019-02-04 22:00:18', '113-0406569-8630633', 'beb45e21-fd13-b706-672d-bc6d9d661f31', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-10', '14:00:00', '17:00:00', '113-3479742-9814628', 'B00YUPDW0Q', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9255482124', '102 LEAFIELD RD', '--', 94506, 'DANVILLE', '35 miles radius around 94590', '711158351', '--'),
(570, '2019-02-04 21:40:15', '112-7037673-6985854', 'fcb45e17-239f-5eff-4125-97dbff0179f6', 'B01M9E5IBJ', 'Handyman Services - 2 Hours - Inside - No Ladder', 'COMPLETED', '2019-02-14', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '916-402-6900', '5224 HIDDEN LN', '--', 95819, 'SACRAMENTO', '94203', '1173398591', '--'),
(571, '2019-02-04 19:49:20', '113-0619140-8584221', '8cb469d3-07b8-c798-b44b-ab44c6e91246', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-10', '08:00:00', '11:00:00', '113-1001983-6102665', 'B07H42GX6M', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4159903000', '1577 45th Ave', '--', 94122, 'San Francisco', 'Marin County', '2143898', '--'),
(572, '2019-02-04 17:33:33', '111-8711616-1644259', '78b45da7-2546-1357-53be-c3578936a3f5', 'B06WGSP17V', 'Leaky Faucet Repair', 'COMPLETED', '2019-02-12', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '4153700150', '1163 TENNESSEE ST', '--', 94107, 'SAN FRANCISCO', 'Marin County', '28271725915', 'LateSentEta'),
(573, '2019-02-04 17:07:19', '112-3497891-4415451', '24b45d9e-f5c7-e7cd-ce21-e0cf0e8d675e', 'B00STRWW8Y', 'Dresser Assembly - Dresser', 'COMPLETED', '2019-02-19', '14:00:00', '17:00:00', '112-4941261-6279465', 'B00534LJ9O', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '(415) 797 8296', '740 FRANCISCO ST', '--', 94133, 'SAN FRANCISCO', 'San Francisco Bay Area', '759777821', '--'),
(574, '2019-02-04 16:16:38', '114-0284995-5325052', '22b45d83-d383-55b9-6cb0-79427c6fe0b3', 'B01JJQWSVO', 'Security Safe Installation - Wall Anchored', 'COMPLETED', '2019-02-18', '11:00:00', '14:00:00', '114-7375013-5819418', 'B018X5MM5E', 'SECURITY_ELECTRONICS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '408 466 5339', '38800 HASTINGS ST APT 76', '--', 94536, 'FREMONT', '35 miles radius around 94590', '10436156835', '--'),
(575, '2019-02-04 12:17:44', '112-5265211-2481034', '04b45d18-4ba0-5f2d-a0a3-c53de2154443', 'B071XVGL49', 'Toilet Fill Valve Replacement', 'COMPLETED', '2019-02-09', '11:00:00', '14:00:00', '112-4296666-8807430|112-4296666-8807430', 'B0097CVGWI|B00578RKBC', 'PLUMBING_FIXTURE|PLUMBING_FIXTURE', 1, 'NotDelivered|NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '925-798-3495', '4482 Barberry Court', '--', 94521, 'Concord', '35 miles radius around 94590', '169734537', 'LateSentEta'),
(576, '2019-02-03 15:23:29', '114-3121991-4865869', 'b2b45ad8-aee1-7a57-6297-cbfefb512096', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-09', '08:00:00', '11:00:00', '114-0272738-9667460', 'B008JA2X5S', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '7072545292', '3621 EVERGREEN RD', '--', 95405, 'SANTA ROSA', 'Marin County', '27908422', '--'),
(577, '2019-02-03 10:08:49', '112-6977237-8527464', '54b45a48-0f9b-1933-2f87-646eca2a0910', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-12', '17:00:00', '20:00:00', '112-6986291-6866617', 'B00573S4QM', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4156860765', '274 BUTTERFIELD RD', '--', 94960, 'SAN ANSELMO', 'CA - Marin County', '15489258', '--'),
(578, '2019-02-03 08:16:18', '112-9693887-8669808', '76b45a13-8d04-1ec4-dd50-7645c740453a', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-08', '11:00:00', '14:00:00', '112-6279875-2415407', 'B07BDPDZWD', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '707-552-1961', '127 HEARTFORD WAY', '--', 94503, 'AMERICAN CANYON', 'Marin County', '228402641', '--'),
(579, '2019-02-03 07:53:47', '112-3575175-4304212', 'acb45a09-f5a6-be78-a602-547220e3c98a', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-08', '08:00:00', '11:00:00', '112-8873482-1085864', 'B00F74RX40', 'SPORTING_GOODS', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '707-318-8560', '3422 FIR DR', '--', 95405, 'SANTA ROSA', 'Marin County', '1932130340', 'LateSentEta'),
(580, '2019-02-03 04:56:37', '113-7895647-0125805', 'ecb459bb-a095-701f-3e5c-4616b9e894bf', 'B00OK5PIXA', 'Mailbox Installation - Wall Mounted - Replacement', 'COMPLETED', '2019-02-10', '14:00:00', '17:00:00', '113-6334299-3089024', 'B01DX1TORC', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '510-385-0828', '23 BISHOP PINE LN', '--', 94803, 'EL SOBRANTE', 'San Francisco Bay Area', '668911196', '--'),
(581, '2019-02-02 17:37:57', '111-7438646-1603432', 'fcb45883-1276-6cb7-99e7-0e7a8b0b8f8d', 'B01M27P73B', 'Handyman Services - 3 Hours - Inside - No Ladder', 'COMPLETED', '2019-02-06', '17:00:00', '20:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '5105088291', '1372 SPRUCE ST', '--', 94579, 'SAN LEANDRO', '35 miles radius around 94590', '33771316102', 'LateSentEta'),
(582, '2019-02-02 16:24:22', '114-0623715-4667468', '36b45863-d114-a7fe-c01e-3ce95660e039', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-08', '14:00:00', '17:00:00', '114-9736628-8552257', 'B01MS7EWR9', 'SPORTING_GOODS', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '650-533-1184', '3705 BEARTOOTH LN E', '--', 94558, 'NAPA', '35 miles radius around 94590', '9776030305', '--'),
(583, '2019-02-01 23:09:51', '113-8632720-1674669', '1ab4568b-b74b-bcbe-b6ad-f506602d08ab', 'B01M6V9DS8', 'Bed Assembly - Murphy Bed', 'COMPLETED', '2019-02-11', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '5108588575', '1189 18th Ave', '--', 94063, 'REDWOOD CITY', '35 miles radius around 94590', '1369381351', '--'),
(584, '2019-02-01 18:05:08', '113-0773478-6503421', '6cb455fc-dab6-9aef-f6b6-432500778c0d', 'B00STOHS18', 'Office Chair Assembly - 1 Chair', 'COMPLETED', '2019-02-09', '14:00:00', '17:00:00', '113-0840100-0809810', 'B07DZCK7K4', 'CHAIR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '707-738-0707', '2400 SONOMA ST', '--', 94558, 'NAPA', '35 miles radius around 94590', '22132509002', 'LateSentEta|LateStart'),
(585, '2019-02-01 14:42:28', '113-8125759-8784221', '12b4559d-ec73-4115-9c88-a59ef704b405', 'B01M9E5IBJ', 'Handyman Services - 2 Hours - Inside - No Ladder', 'COMPLETED', '2019-02-04', '17:00:00', '20:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '4159392093', '43 DEARBORN ST', '--', 94110, 'SAN FRANCISCO', 'San Francisco', '584572710', '--'),
(586, '2019-01-31 20:46:57', '112-1093632-6224202', 'e6b453b2-2c95-589f-4646-49fa5a2b7cff', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-04', '11:00:00', '14:00:00', '112-0072786-1750674', 'B0765JNS2D', 'HARDWARE', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '9176472999', '3352 WASHINGTON ST', '--', 94118, 'SAN FRANCISCO', 'Marin County', '37699955302', '--'),
(587, '2019-01-31 18:14:14', '113-5019811-0525831', 'b2b45372-7030-b78e-d7a3-ccb96ef94fc0', 'B01JKAWADU', 'Roof Rack Installation - At-Home - Rack Only', 'COMPLETED', '2019-02-15', '08:00:00', '11:00:00', '113-4544465-2477865', 'B07FB11KYG', 'AUTO_ACCESSORY', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '+14085297239', '922 VISTA POINTE DR', '--', 94582, 'SAN RAMON', '35 miles radius around 94590', '1606606440', '--'),
(588, '2019-01-31 15:23:29', '111-8234468-7958654', '2cb4531e-16c3-e062-8b8b-e977c63d7464', 'B06ZXY1L43', 'Speaker Stand Assembly and Setup - 2 Stands', 'COMPLETED', '2019-02-20', '11:00:00', '14:00:00', '111-2310263-5825039', 'B079J62LDZ', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '650 303-6704', '6455 PINE VALLEY DR', '--', 95409, 'SANTA ROSA', 'San Francisco Bay Area', '5543945', '--'),
(589, '2019-01-31 09:50:31', '111-4390543-2868209', '86b45288-2a26-358e-4b4b-c9207ed817e4', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-06', '14:00:00', '17:00:00', '111-6997856-7306600', 'B0765JNS2D', 'HARDWARE', 2, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '2067698966', '848 BATTERY ST', '--', 94111, 'SAN FRANCISCO', 'San Francisco Bay Area', '48458707502', '--'),
(590, '2019-01-30 11:02:36', '112-1268153-5240246', '0eb45013-a0a2-ab22-9560-b84703de37b9', 'B01ETS3DLQ', 'Storage Cabinet Assembly', 'COMPLETED', '2019-02-12', '11:00:00', '14:00:00', '112-2545431-3829869', 'B0072MZOJ6', 'PLUMBING_FIXTURE', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '415-299-4355', '1012 LOS GAMOS RD APT F', '--', 94903, 'SAN RAFAEL', '35 miles radius around 94590', '23845214302', 'LateSentEta'),
(591, '2019-01-29 20:17:53', '111-1156877-3765062', '62b45324-7d3e-fed8-5c27-93977ec4ea0d', 'B00STRWY0A', 'Dresser Assembly - Wardrobe/Armoire', 'COMPLETED', '2019-02-02', '17:00:00', '20:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '7602587433', '771 54TH ST', '--', 94609, 'OAKLAND', '35 miles radius around 94590', '46278722002', '--'),
(592, '2019-01-29 17:52:08', '113-9761230-7256215', '72b44e3c-bea1-14ad-2edb-abcb5fbec015', 'B071XVGJ3Q', 'Magnetic Knife Strip Installation - Wall Mounted', 'COMPLETED', '2019-02-04', '14:00:00', '17:00:00', '113-6615928-6005802', 'B00JF2QZK8', 'KITCHEN', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '312 404 1526', '1330 MADRONA AVE', '--', 94574, 'SAINT HELENA', '35 miles radius around 94590', '23476118', '--'),
(593, '2019-01-29 16:35:10', '111-0566455-0473825', 'b8b44e1a-5b49-035d-af8a-383d93265db5', 'B00STOHXWC', 'Treadmill Assembly', 'COMPLETED', '2019-02-02', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4157867663', '84 KING AVE', '--', 94611, 'PIEDMONT', 'Marin County', '64349194', 'LateSentEta|LateStart'),
(594, '2019-01-28 22:00:42', '112-4268662-8721869', '60b44c1c-bac1-62d9-eff1-ed84502df599', 'B01MG21IQT', 'Handyman Services - 8 Hours - Inside - Step Ladder', 'COMPLETED', '2019-02-03', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '4159337038', '2134 KNOX AVE', '--', 94565, 'PITTSBURG', '35 miles radius around 94590', '12791836905', 'LateSentEta'),
(595, '2019-01-28 10:53:06', '112-4758127-6798606', '32b44ae9-2f85-503a-4751-9d024b9cf296', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-04', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '707-337-3786', '744 SUNNYSIDE RD', '--', 94574, 'SAINT HELENA', '35 miles radius around 94590', '789511321', '--'),
(596, '2019-01-28 10:43:22', '112-5750446-8096269', 'f8b44ae3-a761-c7d6-1e2a-12009586a7bf', 'B00TX97DKO', 'Gazebo Assembly - On the Lawn', 'COMPLETED', '2019-02-06', '08:00:00', '11:00:00', '112-8669407-8281043', 'B077XQW4Z7', 'OUTDOOR_LIVING', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '4157067595', '2730 BRYANT ST 1ST FLOOR', '--', 94110, 'SAN FRANCISCO', 'Marin County', '15441074505', 'LateSentEta'),
(597, '2019-01-27 21:50:35', '113-4440551-1313862', '5ab44982-b74d-3899-0597-b48c9b52175c', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-02-18', '08:00:00', '11:00:00', '113-9098037-5943427', 'B07BH6Y6LL', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '510 928 8400', '1800 Versailles Ave', '--', 94501, 'Alameda', '35 miles radius around 94590', '872718810', '--'),
(598, '2019-01-27 17:28:08', '113-1205574-8834651', '3cb4490c-b22a-02a5-cdff-03da88bd1219', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-05', '11:00:00', '14:00:00', '113-6358009-1175467', 'B0758L67KP', 'HARDWARE', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '415 3704627', '118 VIENNA ST', '--', 94112, 'SAN FRANCISCO', 'Marin County', '2061813431', '--'),
(599, '2019-01-27 15:13:27', '113-2609986-1414647', '96b448cf-3286-165f-cd17-8fda89294824', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-02-06', '11:00:00', '14:00:00', '113-0630519-0522622', 'B077GSJJ8D', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '7073745029', '740 ROLLING GREEN DR', '--', 94571, 'RIO VISTA', 'San Francisco Bay Area', '533483971', 'LateSentEta'),
(600, '2019-01-27 10:02:03', '114-1556239-0736227', '5eb4483f-4562-9793-e4ea-31d1da3a5b06', 'B00STRX7OW', 'TV Stand or Media Storage Assembly - TV Stand', 'COMPLETED', '2019-01-31', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Joshua Hennagin-A32BDXSGWDJRPY', '4157172694', '441 WOOD HOLLOW DR', '--', 94945, 'NOVATO', '35 miles radius around 94590', '1846726710', '--'),
(601, '2019-01-26 21:35:02', '111-5657759-8537006', 'b6b446e7-b01f-d846-533c-f027724c4d58', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-06', '11:00:00', '14:00:00', '111-2513057-7505038', 'B0758L67KP', 'HARDWARE', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '5107880407', '855 POMONA AVE', '--', 94530, 'EL CERRITO', 'Marin County', '1273421220', '--'),
(602, '2019-01-26 18:25:31', '112-3490630-9652243', '78b44697-ea5b-b425-7647-989bde57e170', 'B06VX42J63', 'Garage Wall Shelf Installation - Up to 8 Feet - 2 Units', 'COMPLETED', '2019-02-09', '14:00:00', '17:00:00', '112-9535307-2625047|112-9535307-2625047', 'B07DRDX8CC|B07DRG7ZGS', 'HOME|HOME', 1, 'NotDelivered|NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '7072495785', '667 Bamboo Terrace', '--', 94903, 'San Rafael', 'Marin County', '2017369520', '--'),
(603, '2019-01-26 16:52:29', '114-8641672-3556204', 'e8b44666-ad29-1d63-8239-21d8c4543b72', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-02', '11:00:00', '14:00:00', '114-9358470-5901015', 'B075CQDW9M', 'HARDWARE', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '415-945-0900', '15 Piedmont Rd.', '--', 94939, 'Larkspur', '35 miles radius around 94590', '1423191350', '--'),
(604, '2019-01-26 14:48:23', '114-5314132-4635410', '1cb44631-1a8a-8638-6eb9-6643e456580f', 'B06ZXY1D22', 'Curtain Rod Installation - Drywall - 3 Curtain Rods', 'COMPLETED', '2019-02-01', '08:00:00', '11:00:00', '114-9622975-1751438|114-9622975-1751438', 'B00DB1HR5Q|B00DB1HR6U', 'HOME|HOME', 1, 'NotDelivered|NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '510 234-4265', '701 BANKS DR', '--', 94806, 'SAN PABLO', '35 miles radius around 94590', '757981221', '--'),
(605, '2019-01-26 13:05:25', '111-5545631-6914647', '0ab445fd-f31f-71c7-6630-6dcaef8a8d96', 'B00T1HBYFS', 'Grill Assembly - 2 or 3 burners', 'COMPLETED', '2019-01-31', '14:00:00', '17:00:00', '111-8987238-6753859', 'B077JTCMKR', 'OUTDOOR_LIVING', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '415 350 2557', '31 VOLKER CT', '--', 94574, 'SAINT HELENA', '35 miles radius around 94590', '261177257', 'LateSentEta'),
(606, '2019-01-26 11:59:48', '113-1328215-7230608', '1cb445df-e7de-2d24-17f8-795baf4410d1', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2019-01-31', '14:00:00', '17:00:00', '113-6258537-0028205', 'B072C3K6ZQ', 'SURVEILANCE_SYSTEMS', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '415-420-1172', '360 ARLINGTON ST', '--', 94131, 'SAN FRANCISCO', 'Marin County', '395248977', 'LateSentEta|ProviderReschedule'),
(607, '2019-01-26 09:40:37', '111-3012086-9425006', 'b4b445a2-e434-c45b-e8ba-06aa279ee335', 'B06W2N7KLK', 'Glass Shower Door Installation - First Time', 'COMPLETED', '2019-02-14', '14:00:00', '17:00:00', '111-1042382-0427406', 'B078TMMK75', 'PLUMBING_FIXTURE', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '4157942655', '6 WILDWOOD CT', '--', 94015, 'DALY CITY', 'San Francisco', '388233557', '--'),
(608, '2019-01-26 09:18:39', '111-8585619-5264236', 'c4b4459d-ccfd-216f-376e-eceae73f0884', 'B01M6V9DS8', 'Bed Assembly - Murphy Bed', 'COMPLETED', '2019-02-02', '08:00:00', '11:00:00', '111-8562865-6440262', 'B079QRQT54', 'BED', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '7076944836', '3961 SHAKER RUN CIR', '--', 94533, 'FAIRFIELD', '35 miles radius around 94590', '71323191', 'LateSentEta'),
(609, '2019-01-25 20:26:37', '112-7801950-0776226', '74b44436-6362-50de-424a-a39271ed5150', 'B06X6JS7XZ', 'Faucet Mounted Water Filter Installation', 'COMPLETED', '2019-01-29', '14:00:00', '17:00:00', '112-2999270-3038630', 'B00910U03W', 'PLUMBING_FIXTURE', 1, 'NotDelivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '4155197646', '903 Vermont St', '--', 94610, 'Oakland', '35 miles radius around 94590', '125097691', '--'),
(610, '2019-01-24 11:14:06', '114-7670271-1564211', 'b2b440ab-166f-6285-33b9-9cba91b97e20', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'COMPLETED', '2019-02-17', '08:00:00', '11:00:00', '114-5113104-4839432', 'B07H4BGY1W', 'HARDWARE', 1, 'Delivered', 'Joshua Hennagin-A32BDXSGWDJRPY', '4152604005', '2375 32nd Ave', '--', 94116, 'San Francisco', 'Marin County', '1414837851', '--'),
(611, '2019-01-23 10:33:22', '114-1320493-0470604', 'bab43e01-6aca-3f66-558e-4b056652ad6d', 'B00UBYCKCG', 'Furniture Assembly - 2 hours', 'COMPLETED', '2019-01-26', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '6507434400', '920 BRODERICK ST', '--', 94115, 'SAN FRANCISCO', '35 miles radius around 94590', '1200718556', 'LateSentEta'),
(612, '2019-01-23 08:10:27', '113-1077190-3485860', '3ab43dbf-dd8e-20f3-ee1d-5cb5b3148d17', 'B00TSTR2QE', 'Exercise Bike Assembly', 'COMPLETED', '2019-01-29', '11:00:00', '14:00:00', '113-5477426-0871465', 'B002JB40MC', 'SPORTING_GOODS', 1, 'NotDelivered', 'Eric Flint-A1VGPOC5WLXTK6', '5713348227', '375 GARFIELD PARK AVE', '--', 95409, 'SANTA ROSA', 'San Francisco Bay Area', '1473639060', 'LateSentEta'),
(613, '2019-01-22 18:15:16', '113-0393617-4991406', 'e2b43c42-63fc-70b4-2f7d-48d480f4d9d4', 'B01JKAWADU', 'Roof Rack Installation - At-Home - Rack Only', 'COMPLETED', '2019-02-02', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Eric Flint-A1VGPOC5WLXTK6', '5105016947', '3405 STEWARTON DR', '--', 94803, 'RICHMOND', '35 miles radius around 94590', '54084449602', 'LateSentEta'),
(614, '2018-12-11 10:19:29', '114-1216752-4453822', 'e2b3cf42-01bf-edae-500f-85eace52fcb4', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'NOT_SERVICED', '2018-12-17', '11:00:00', '14:00:00', '114-8908212-2261816', 'B0749LHHT1', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '(510) 4142202', '3326 ROBINSON DR', '--', 94602, 'OAKLAND', 'San Francisco Bay Area', '1843992190', '--'),
(615, '2018-12-09 12:09:40', '112-2200601-0860252', 'fab3ca51-1299-e1ac-e358-591b909c1f52', 'B00TX975SY', 'Bar Stool Assembly - 2 Stools', 'NOT_SERVICED', '2018-12-17', '17:00:00', '20:00:00', '112-7598539-0740216', 'B06XYKYYVS', 'HOME_FURNITURE_AND_DECOR', 1, 'Delivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '415-893-1889', '124 Somerset Dr.', '--', 94945, 'Novato', '30 miles radius around 94503', '336338377', '--'),
(616, '2018-12-08 19:28:41', '112-1615031-5048241', 'dab3c887-ee4b-753b-d6a8-85be700bc403', 'B00STRX6AC', 'TV Stand or Media Storage Assembly - Media Cabinet', 'NOT_SERVICED', '2018-12-21', '14:00:00', '17:00:00', '112-1941338-3805060', 'B07CYNFFTV', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '2153560202', '20 MARLEE RD', '--', 94523, 'PLEASANT HILL', 'San Francisco Bay Area', '380481741', '--'),
(617, '2018-12-08 16:51:53', '111-1186431-4437012', 'ceb3c83b-fc86-2424-c2bd-88c4da832818', 'B00WT8AP9W', 'Rowing Machine Assembly', 'NOT_SERVICED', '2019-01-13', '14:00:00', '17:00:00', '111-1533827-7391459', 'B0009V9Z9W', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4156088626', '1090 SILER PL', '--', 94705, 'BERKELEY', '30 miles radius around 94503', '496359310', '--'),
(618, '2018-12-08 11:45:32', '113-9621138-3623447', '3cb3c7af-d4be-779d-7f0f-3431c8ccd1fe', 'B071XVGL49', 'Toilet Fill Valve Replacement', 'COMPLETED', '2018-12-12', '14:00:00', '17:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '--', '5801 BARRETT AVE', '--', 94530, 'EL CERRITO', 'Marin County', '651667676', 'LateSentEta'),
(619, '2018-12-14 18:38:39', '114-2070623-0206638', 'b0b3d7df-7901-c87e-4e19-a9c0d99c5128', 'B00TX97HDC', 'Air Hockey Table Assembly', 'NOT_SERVICED', '2019-12-30', '08:00:00', '11:00:00', '114-1804977-5614646', 'B00026W6VI', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4153109353', '155 Dipsea Road', '--', 94970, 'Stinson Beach', 'San Francisco Bay Area', '6415831', '--'),
(620, '2018-12-14 11:03:06', '112-3025884-7740246', '02b3d70f-5069-7ad3-f49d-9e12f3c77720', 'B00OK5OUSY', 'Patio Heater Assembly', 'NOT_SERVICED', '2018-12-20', '08:00:00', '11:00:00', '112-3379451-2476267', 'B000PUFYTC', 'HOME', 2, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4153021902', '4039 PIEDMONT AVE', '--', 94611, 'OAKLAND', '30 miles radius around 94503', '502590736', '--'),
(621, '2018-12-14 10:27:20', '112-2297799-4894637', '98b3d6fd-a2ea-1d24-3704-50d4b4895140', 'B00IAD0NQU', 'Garage Door Opener Replacement', 'NOT_SERVICED', '2018-12-18', '14:00:00', '17:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '415-948-5958', '256 WILLAMETTE AVE', '--', 94708, 'KENSINGTON', 'Marin County', '10824270', '--'),
(622, '2018-12-12 15:09:26', '113-1189905-4879404', 'd8b3d258-03b4-7739-bf55-278d5c3bc207', 'B00STRX08U', 'Table Assembly - Coffee Table', 'NOT_SERVICED', '2018-12-22', '08:00:00', '11:00:00', '113-1348979-6329838', 'B07B489BM5', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4157063440', '1635 9TH AVE', '--', 94606, 'OAKLAND', '30 miles radius around 94503', '982263781', '--'),
(623, '2018-12-11 16:20:52', '114-0208176-9823409', '8eb3cff6-d058-d49e-c60a-ba02150c4bf2', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'NOT_SERVICED', '2018-12-19', '11:00:00', '14:00:00', '114-8070510-1557810', 'B001COEZTU', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '5104638300', 'C/O ARCHITECTURAL DIMENSIONS', '300 FRANK H OGAWA PLZ STE 375', 94612, 'OAKLAND', '30 miles radius around 94503', '32872557715', '--'),
(624, '2018-12-08 17:51:24', '113-5228520-3502658', '72b3c859-92b1-b8f5-e832-0ed60db0905d', 'B00STOHS18', 'Office Chair Assembly - 1 Chair', 'NOT_SERVICED', '2018-12-17', '14:00:00', '17:00:00', '113-9656675-8184219', 'B07KDS893Z', 'CHAIR', 1, 'Delivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4152561857', '1420 DAWES ST', '--', 94947, 'NOVATO', '30 miles radius around 94503', '800987776', '--'),
(625, '2018-12-06 14:09:52', '111-6420357-4790629', '7ab3c2e4-6225-8ce8-4a65-6a9d85bac44a', 'B00STRWVVC', 'Bed Assembly - Platform or Sleigh Bed', 'NOT_SERVICED', '2018-12-18', '17:00:00', '20:00:00', '111-7719908-4788217', 'B00IM7F62A', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '(415)786-3266', '112 PRINCE ALBERT ST', '--', 94954, 'PETALUMA', 'Marin County', '674012841', '--'),
(626, '2018-12-06 10:33:12', '113-0270134-7336225', '78b3c269-1281-8496-49de-e42ad80bd703', 'B00TSTR2QE', 'Exercise Bike Assembly', 'NOT_SERVICED', '2018-12-15', '08:00:00', '11:00:00', '113-9613602-6777867', 'B00XMHI866', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '415-999-9959', '5303 KELLIANN PL', '--', 94928, 'ROHNERT PARK', 'Marin County', '79558736', '--'),
(627, '2018-12-04 12:44:41', '114-0392101-5256237', '84b3bd7e-1fd0-c100-e55a-fd3f69c3cc96', 'B00STOHXWC', 'Treadmill Assembly', 'NOT_SERVICED', '2018-12-15', '14:00:00', '17:00:00', '114-4709522-0218627', 'B0193V3DJ6', 'TREADMILL', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '6502286974', '1785 SEVERUS DR', '--', 94589, 'VALLEJO', '30 miles radius around 94503', '7680537002', '--'),
(628, '2018-12-01 15:47:48', '112-2187211-2949803', 'bcb3b619-07fd-7b5d-ecc0-ca32f21c1644', 'B00TSTR8MM', 'Table Tennis Table Assembly', 'NOT_SERVICED', '2018-12-19', '11:00:00', '14:00:00', '112-6596668-0252267', 'B000BO150O', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '707-246-9978', '948 Galleron Rd', '--', 94574, 'Saint Helena', 'San Francisco Bay Area', '73068168', '--'),
(629, '2018-11-26 12:46:32', '111-6914792-3770611', 'f2b3a8e5-77cf-e23e-ba82-6491846bf140', 'B00STOHXWC', 'Treadmill Assembly', 'NOT_SERVICED', '2018-12-15', '11:00:00', '14:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '(707) 795-0546', '1392 Miramonte Pl', '--', 94928, 'Rohnert Park', 'Marin County', '1032759881', '--'),
(630, '2018-11-24 12:02:20', '113-0281878-4321876', '70b3a3ac-17ad-283f-dd2b-34553170acdf', 'B00T1HBYFS', 'Grill Assembly - 2 or 3 burners', 'NOT_SERVICED', '2018-12-28', '08:00:00', '11:00:00', '113-6722063-2009032', 'B077JTCMKQ', 'OUTDOOR_LIVING', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '5109080440', '7840 OAKMONT DR', '--', 95409, 'SANTA ROSA', 'San Francisco Bay Area', '881864596', '--'),
(631, '2018-12-15 17:03:39', '111-5963567-5685826', '68b3da48-9888-ae38-e5db-b07cec2660b3', 'B00STOHXWC', 'Treadmill Assembly', 'NOT_SERVICED', '2018-12-27', '08:00:00', '11:00:00', '--', '--', '--', 0, '--', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '8083720424', '5065 Brittany Dr', '--', 94534, 'Fairfield', '30 miles radius around 94503', '1816371480', '--'),
(632, '2018-12-15 16:53:19', '111-1312054-9352207', 'b6b3da42-6d0b-4476-64da-001177128e4d', 'B00STOHXWC', 'Treadmill Assembly', 'NOT_SERVICED', '2018-12-27', '14:00:00', '17:00:00', '111-4861956-6907432', 'B018R9THUE', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '4157062509', '2 FAWN CT', '--', 94960, 'SAN ANSELMO', 'San Francisco Bay Area', '1394983550', '--'),
(633, '2018-12-15 11:17:36', '113-0858522-8925059', '98b3d9a7-0380-aaa7-fa9f-553e044315d7', 'B00TX97HDC', 'Air Hockey Table Assembly', 'NOT_SERVICED', '2018-12-22', '08:00:00', '11:00:00', '113-7925455-7831442', 'B071FW6836', 'SPORTING_GOODS', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '415-640-2605', '1013 ERICA RD', '--', 94941, 'MILL VALLEY', '30 miles radius around 94503', '30412838', '--'),
(634, '2018-12-15 00:26:55', '113-6244353-7185023', 'acb3d87e-e41b-6053-a537-3fc930a9c1a2', 'B00STRX6AC', 'TV Stand or Media Storage Assembly - Media Cabinet', 'NOT_SERVICED', '2018-12-22', '08:00:00', '11:00:00', '113-2186981-6013821', 'B00DW7LBII', 'HOME_FURNITURE_AND_DECOR', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9252062246', '1410 Ashwood Drive', '--', 94553, 'Martinez', 'San Francisco Bay Area', '1907055771', '--'),
(635, '2018-12-11 17:45:13', '112-0605188-3681065', '8eb3d00d-d514-0713-215f-c329f515b2ec', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'NOT_SERVICED', '2018-12-17', '08:00:00', '11:00:00', '112-8717579-0236205|112-8717579-0236205', 'B01FY8UCVE|B01JJ0YYWG', 'HOME_LIGHTING_ACCESSORY|HARDWARE', 1, 'NotDelivered|NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9403009465', '510 MYRTLE AVE STE 101', '--', 94080, 'SOUTH SAN FRANCISCO', 'Marin County', '31003940615', '--'),
(636, '2018-12-11 13:20:01', '112-2825446-6994627', 'd6b3cf95-2cef-d440-a79d-09e948b0dbeb', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'NOT_SERVICED', '2018-12-21', '11:00:00', '14:00:00', '112-9411874-0828251', 'B0752V8D8D', 'HARDWARE', 1, 'Delivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '9259897077', '2440 Harvard Circle', '--', 94597, 'Walnut Creek', '30 miles radius around 94503', '6235415', '--'),
(637, '2018-12-08 08:38:22', '112-6362482-9317815', 'eeb3c758-f8b7-165a-a906-f1b0ae86bf29', 'B00IAD0LLW', 'Deadbolt Installation - Wood Door', 'COMPLETED', '2018-12-11', '14:00:00', '17:00:00', '112-8847035-2978666', 'B015SLMR1U', 'HARDWARE', 1, 'NotDelivered', 'Dustin Hennagin-A2KDRJ6UAD2OJT', '1 (408) 592-3788', '625B NATOMA ST', '--', 94103, 'SAN FRANCISCO', 'Marin County', '136808530', '--');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` char(254) DEFAULT NULL,
  `transaction_type` char(254) DEFAULT NULL,
  `order_id` char(254) DEFAULT NULL,
  `product_details` char(254) DEFAULT NULL,
  `product_title` char(255) DEFAULT NULL,
  `payment_detail` char(255) DEFAULT NULL,
  `total_product_charges` char(254) DEFAULT '0',
  `total_promotional_rebates` char(254) DEFAULT '0',
  `amazon_fees` char(254) DEFAULT '0',
  `refund_admin_fee` char(254) DEFAULT '0',
  `refund_referral_fee` char(254) DEFAULT '0',
  `refund_product_charge` char(254) DEFAULT '0',
  `other` char(254) DEFAULT '0',
  `total` char(254) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=872 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date`, `transaction_type`, `order_id`, `product_details`, `product_title`, `payment_detail`, `total_product_charges`, `total_promotional_rebates`, `amazon_fees`, `refund_admin_fee`, `refund_referral_fee`, `refund_product_charge`, `other`, `total`) VALUES
(713, '2019-02-17', 'Order Payment', '114-3419655-1821042', NULL, 'Mailbox Installation - Post Mounted - First-Time Installation', '', '$150.14', '0', '$-30.03', '0', '0', '0', '0', '120.11'),
(714, '2019-02-17', 'Order Payment', '111-0779493-5357803', NULL, 'Deadbolt Installation - Wood Door', '', '$100.53', '0', '$-20.11', '0', '0', '0', '0', '80.42'),
(715, '2019-02-16', 'Order Payment', '114-7670271-1564211', NULL, 'Garage Door Opener Replacement', '', '$239.12', '0', '$-47.82', '0', '0', '0', '0', '191.3'),
(716, '2019-02-16', 'Order Payment', '114-7125913-4572224', NULL, 'Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More', '', '$204.71', '0', '$-40.94', '0', '0', '0', '0', '163.77'),
(717, '2019-02-16', 'Order Payment', '113-1032634-7121844', NULL, 'Furniture Assembly - 3 hours', '', '$122.64', '0', '$-24.53', '0', '0', '0', '0', '98.11'),
(718, '2019-02-16', 'Order Payment', '112-6817605-1168224', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(719, '2019-02-16', 'Order Payment', '113-5195961-0749818', NULL, 'TV Stand or Media Storage Assembly - Media Cabinet', '', '$140.18', '0', '$-28.04', '0', '0', '0', '0', '112.14'),
(720, '2019-02-10', 'Order Payment', '113-0406569-8630633', NULL, 'Deadbolt Installation - Wood Door', '', '$100.53', '0', '$-20.11', '$-4.02', '$20.11', '$-100.53', '0', '-4.02'),
(721, '2019-02-16', 'Order Payment', '112-6715531-2377018', NULL, 'Home Gym Assembly', '', '$136.73', '0', '$-27.35', '0', '0', '0', '0', '109.38'),
(722, '2019-02-15', 'Order Payment', '112-9642975-0333032', NULL, 'Furniture Assembly - 4 hours', '', '$143.40', '0', '$-28.68', '0', '0', '0', '0', '114.72'),
(723, '2019-02-15', 'Order Payment', '113-5019811-0525831', NULL, 'Roof Rack Installation - At-Home - Rack Only', '', '$90.68', '0', '$-18.14', '0', '0', '0', '0', '72.54'),
(724, '2019-02-14', 'Order Payment', '111-3012086-9425006', NULL, 'Glass Shower Door Installation - First Time', '', '$710.23', '0', '$-142.05', '0', '0', '0', '0', '568.18'),
(725, '2019-02-14', 'Order Payment', '112-0703496-8933804', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(726, '2019-02-14', 'Order Payment', '114-2622241-0913052', NULL, 'Gazebo Assembly - On the Lawn', '', '$391.08', '0', '$-78.22', '0', '0', '0', '0', '312.86'),
(727, '2019-02-14', 'Order Payment', '114-3640514-1377015', NULL, 'Bed Assembly - Bunk Bed', '', '$134.00', '0', '$-26.80', '0', '0', '0', '0', '107.2'),
(728, '2019-02-14', 'Order Payment', '112-7037673-6985854', NULL, 'Handyman Services - 2 Hours - Inside - No Ladder', '', '$158.85', '0', '$-31.77', '0', '0', '0', '0', '127.08'),
(729, '2019-02-13', 'Order Payment', '113-8889144-1842668', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(730, '2019-02-13', 'Order Payment', '114-5028255-4623413', NULL, 'Garage Door Opener Replacement', '', '$159.12', '0', '$-31.82', '0', '0', '0', '0', '127.3'),
(731, '2019-02-12', 'Order Payment', '112-6977237-8527464', NULL, 'Deadbolt Installation - Wood Door', '', '$98.26', '0', '$-19.65', '0', '0', '0', '0', '78.61'),
(732, '2019-02-12', 'Order Payment', '112-1268153-5240246', NULL, 'Storage Cabinet Assembly', '', '$112.30', '0', '$-22.46', '0', '0', '0', '0', '89.84'),
(733, '2019-02-12', 'Order Payment', '112-3490630-9652243', NULL, 'Garage Wall Shelf Installation - Up to 8 Feet - 2 Units', '', '$226.42', '0', '$-45.28', '0', '0', '0', '0', '181.14'),
(734, '2019-02-12', 'Order Payment', '111-8711616-1644259', NULL, 'Leaky Faucet Repair', '', '$141.21', '0', '$-28.24', '0', '0', '0', '0', '112.97'),
(735, '2019-02-11', 'Order Payment', '111-0348503-2210632', NULL, 'Treadmill Assembly', '', '$75.11', '0', '$-15.02', '0', '0', '0', '0', '60.09'),
(736, '2019-02-11', 'Order Payment', '111-4406380-8291456', NULL, 'Leaky Faucet Repair', '', '$91.21', '0', '$-18.24', '0', '0', '0', '0', '72.97'),
(737, '2019-02-11', 'Order Payment', '112-6857864-2826654', NULL, 'Toilet Fill Valve Replacement', '', '$79.13', '0', '$-15.83', '0', '0', '0', '0', '63.3'),
(738, '2019-02-11', 'Order Payment', '114-6656580-1596255', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(739, '2019-02-10', 'Order Payment', '113-8632720-1674669', NULL, 'Bed Assembly - Murphy Bed', '', '$272.80', '0', '$-54.56', '0', '0', '0', '0', '218.24'),
(740, '2019-02-10', 'Order Payment', '111-6666968-6229013', NULL, 'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit', '', '$131.09', '0', '$-26.22', '0', '0', '0', '0', '104.87'),
(741, '2019-02-10', 'Order Payment', '111-1235516-9590652', NULL, 'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit', '', '$131.09', '0', '$-26.22', '0', '0', '0', '0', '104.87'),
(742, '2019-02-10', 'Order Payment', '113-7895647-0125805', NULL, 'Mailbox Installation - Wall Mounted - Replacement', '', '$81.65', '0', '$-16.33', '0', '0', '0', '0', '65.32'),
(743, '2019-02-10', 'Order Payment', '113-0619140-8584221', NULL, 'Garage Door Opener Replacement', '', '$159.12', '0', '$-31.82', '0', '0', '0', '0', '127.3'),
(744, '2019-02-09', 'Order Payment', '113-0773478-6503421', NULL, 'Office Chair Assembly - 1 Chair', '', '$65.76', '0', '$-13.15', '0', '0', '0', '0', '52.61'),
(745, '2019-02-09', 'Order Payment', '112-5265211-2481034', NULL, 'Toilet Fill Valve Replacement', '', '$74.79', '0', '$-14.96', '0', '0', '0', '0', '59.83'),
(746, '2019-02-09', 'Order Payment', '114-3121991-4865869', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(747, '2019-02-08', 'Order Payment', '114-0623715-4667468', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(748, '2019-02-08', 'Order Payment', '112-3048266-3807429', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(749, '2019-02-08', 'Order Payment', '112-3575175-4304212', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(750, '2019-02-08', 'Order Payment', '112-9693887-8669808', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(751, '2019-02-06', 'Order Payment', '111-7438646-1603432', NULL, 'Handyman Services - 3 Hours - Inside - No Ladder', '', '$214.91', '0', '$-42.98', '0', '0', '0', '0', '171.93'),
(752, '2019-02-06', 'Order Payment', '111-5657759-8537006', NULL, 'Garage Door Opener Replacement', '', '$202.67', '0', '$-40.53', '0', '0', '0', '0', '162.14'),
(753, '2019-02-06', 'Order Payment', '111-4390543-2868209', NULL, 'Deadbolt Installation - Wood Door', '', '$118.77', '0', '$-23.75', '0', '0', '0', '0', '95.02'),
(754, '2019-02-06', 'Order Payment', '112-5750446-8096269', NULL, 'Gazebo Assembly - On the Lawn', '', '$351.27', '0', '$-70.25', '0', '0', '0', '0', '281.02'),
(755, '2019-02-06', 'Order Payment', '113-2609986-1414647', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(756, '2019-02-05', 'Order Payment', '113-1205574-8834651', NULL, 'Garage Door Opener Replacement', '', '$159.12', '0', '$-31.82', '0', '0', '0', '0', '127.3'),
(757, '2019-02-04', 'Order Payment', '113-8125759-8784221', NULL, 'Handyman Services - 2 Hours - Inside - No Ladder', '', '$185.79', '0', '$-37.16', '0', '0', '0', '0', '148.63'),
(758, '2019-02-18', 'Order Payment', '113-8634078-0042669', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(759, '2019-02-18', 'Order Payment', '114-0284995-5325052', NULL, 'Security Safe Installation - Wall Anchored', '', '$200.94', '0', '$-40.19', '0', '0', '0', '0', '160.75'),
(760, '2019-02-18', 'Order Payment', '112-9343665-6265850', NULL, 'Grill Assembly - 4 or 5 burners', '', '$147.66', '0', '$-29.53', '0', '0', '0', '0', '118.13'),
(761, '2019-02-18', 'Order Payment', '113-6397731-2865833', NULL, 'Hutch Assembly', '', '$93.23', '0', '$-18.65', '0', '0', '0', '0', '74.58'),
(762, '2019-02-18', 'Order Payment', '113-4440551-1313862', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(763, '2019-01-17', 'Order Payment', '111-5540108-6949062', NULL, 'Storage Shelves Assembly', '', '$82.38', '0', '$-16.48', '0', '0', '0', '0', '65.9'),
(764, '2019-01-17', 'Order Payment', '114-4766827-5472244', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$81.38', '0', '$-16.28', '0', '0', '0', '0', '65.1'),
(765, '2019-01-17', 'Order Payment', '114-5997037-2522607', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(766, '2019-01-17', 'Order Payment', '112-0809161-1547455', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(767, '2019-01-16', 'Order Payment', '114-2070623-0206638', NULL, 'Air Hockey Table Assembly', '', '$206.68', '0', '$-41.34', '0', '0', '0', '0', '165.34'),
(768, '2019-01-15', 'Order Payment', '112-3674839-7406652', NULL, 'Furniture Assembly - 2 hours', '', '$98.42', '0', '$-19.68', '0', '0', '0', '0', '78.74'),
(769, '2019-01-15', 'Order Payment', '114-3906497-5084233', NULL, 'Air Hockey Table Assembly', '', '$106.68', '0', '$-21.34', '0', '0', '0', '0', '85.34'),
(770, '2019-01-15', 'Order Payment', '111-5754309-6425805', NULL, 'Stair Climber Assembly', '', '$105.42', '0', '$-21.08', '0', '0', '0', '0', '84.34'),
(771, '2019-01-14', 'Order Payment', '112-2143233-1061814', NULL, 'Office Chair Assembly - 1 Chair', '', '$67.42', '0', '$-13.48', '0', '0', '0', '0', '53.94'),
(772, '2019-01-14', 'Order Payment', '112-8291589-7605011', NULL, 'Table Tennis Table Assembly', '', '$101.22', '0', '$-20.24', '0', '0', '0', '0', '80.98'),
(773, '2019-01-14', 'Order Payment', '113-7103485-2525045', NULL, 'Rowing Machine Assembly', '', '$87.69', '0', '$-17.54', '0', '0', '0', '0', '70.15'),
(774, '2019-01-13', 'Order Payment', '114-4962822-5387406', NULL, 'Handyman Services - 2 Hours - Inside - Extension Ladder', '', '$213.11', '0', '$-42.62', '0', '0', '0', '0', '170.49'),
(775, '2019-01-13', 'Order Payment', '111-1186431-4437012', NULL, 'Rowing Machine Assembly', '', '$78.08', '0', '$-15.62', '0', '0', '0', '0', '62.46'),
(776, '2019-01-13', 'Order Payment', '112-5082022-1809060', NULL, 'Treadmill Assembly', '', '$75.11', '0', '$-15.02', '0', '0', '0', '0', '60.09'),
(777, '2019-01-13', 'Order Payment', '114-2522015-4722644', NULL, 'Treadmill Assembly', '', '$75.11', '0', '$-15.02', '0', '0', '0', '0', '60.09'),
(778, '2019-01-13', 'Order Payment', '111-2659434-2622644', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$122.10', '0', '$-24.42', '0', '0', '0', '0', '97.68'),
(779, '2019-01-13', 'Order Payment', '111-6911717-7540260', NULL, 'Storage Cabinet Assembly', '', '$122.59', '0', '$-24.52', '0', '0', '0', '0', '98.07'),
(780, '2019-01-13', 'Order Payment', '114-4770023-5145047', NULL, 'Curtain Rod Installation - Drywall - 2 Curtain Rods', '', '$110.31', '0', '$-22.06', '0', '0', '0', '0', '88.25'),
(781, '2019-01-12', 'Order Payment', '113-7270119-9896266', NULL, 'Treadmill Assembly', '', '$75.11', '0', '$-15.02', '0', '0', '0', '0', '60.09'),
(782, '2019-01-12', 'Order Payment', '112-7286959-7059440', NULL, 'Patio Heater Assembly', '', '$76.94', '0', '$-15.39', '0', '0', '0', '0', '61.55'),
(783, '2019-01-12', 'Order Payment', '114-3155026-9417026', NULL, 'Elliptical Assembly', '', '$84.44', '0', '$-16.89', '0', '0', '0', '0', '67.55'),
(784, '2019-01-12', 'Order Payment', '113-3254657-2121028', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(785, '2019-01-12', 'Order Payment', '114-9758768-4180239', NULL, 'Table Assembly - Coffee Table', '', '$70.44', '0', '$-14.09', '0', '0', '0', '0', '56.35'),
(786, '2019-01-12', 'Order Payment', '112-8971862-5670649', NULL, 'Patio Heater Assembly', '', '$83.16', '0', '$-16.63', '0', '0', '0', '0', '66.53'),
(787, '2019-01-12', 'Order Payment', '112-2820460-8159448', NULL, 'Curtain Rod Installation - Brick - 1 Curtain Rod', '', '$105.90', '0', '$-21.18', '0', '0', '0', '0', '84.72'),
(788, '2019-01-12', 'Order Payment', '113-1618371-9591418', NULL, 'Treadmill Assembly', '', '$165.69', '0', '$-33.14', '0', '0', '0', '0', '132.55'),
(789, '2019-01-11', 'Order Payment', '113-8727216-5459404', NULL, 'Garage Door Opener Replacement', '', '$187.20', '0', '$-37.44', '0', '0', '0', '0', '149.76'),
(790, '2019-01-11', 'Order Payment', '111-6159648-0389061', NULL, 'Hutch Assembly', '', '$128.31', '0', '$-25.66', '0', '0', '0', '0', '102.65'),
(791, '2019-01-11', 'Order Payment', '113-6735471-0140237', NULL, 'Treadmill Assembly', '', '$87.43', '0', '$-17.49', '0', '0', '0', '0', '69.94'),
(792, '2019-01-11', 'Order Payment', '112-4465602-6932258', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(793, '2019-01-10', 'Order Payment', '114-1398977-1214609', NULL, 'Treadmill Assembly', '', '$87.43', '0', '$-17.49', '0', '0', '0', '0', '69.94'),
(794, '2019-01-10', 'Order Payment', '111-0009202-8436244', NULL, 'Wall Hanging - 1 Hour, Items Under 6 Feet in Length', '', '$103.62', '0', '$-20.72', '0', '0', '0', '0', '82.9'),
(795, '2019-01-10', 'Order Payment', '113-7618306-9017023', NULL, 'Deadbolt Installation - Wood Door', '', '$121.83', '0', '$-24.37', '0', '0', '0', '0', '97.46'),
(796, '2019-01-10', 'Order Payment', '111-4245040-4153053', NULL, 'Exercise Bike Assembly', '', '$76.31', '0', '$-15.26', '0', '0', '0', '0', '61.05'),
(797, '2019-01-10', 'Order Payment', '112-2043876-1884211', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(798, '2019-01-09', 'Order Payment', '114-6213454-7306626', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$82.36', '0', '$-16.47', '0', '0', '0', '0', '65.89'),
(799, '2019-01-09', 'Order Payment', '112-5235292-2900238', NULL, 'Toilet Fill Valve Replacement', '', '$129.13', '0', '$-25.83', '0', '0', '0', '0', '103.3'),
(800, '2019-01-08', 'Order Payment', '113-0963977-0297854', NULL, 'Bed Assembly - Bed Frame', '', '$59.45', '0', '$-11.89', '0', '0', '0', '0', '47.56'),
(801, '2019-01-08', 'Order Payment', '111-5738456-6593027', NULL, 'Grill Assembly - 2 or 3 burners', '', '$72.47', '0', '$-14.49', '0', '0', '0', '0', '57.98'),
(802, '2018-12-10', 'Order Payment', '111-3191458-2401803', NULL, 'Bed Assembly - Bed Frame', '', '$99.92', '0', '$-19.98', '0', '0', '0', '0', '79.94'),
(803, '2018-12-10', 'Order Payment', '114-0600490-1059444', NULL, 'Exercise Bike Assembly', '', '$78.51', '0', '$-15.70', '0', '0', '0', '0', '62.81'),
(804, '2018-12-08', 'Order Payment', '113-0781906-4850659', NULL, 'Exercise Bike Assembly', '', '$117.20', '0', '$-23.44', '0', '0', '0', '0', '93.76'),
(805, '2018-12-06', 'Order Payment', '113-1175975-2606642', NULL, 'Treadmill Assembly', '', '$70.12', '0', '$-14.02', '0', '0', '0', '0', '56.1'),
(806, '2018-12-04', 'Order Payment', '114-2515956-5335422', NULL, 'Deadbolt Installation - Wood Door', '', '$103.66', '0', '$-20.73', '0', '0', '0', '0', '82.93'),
(807, '2018-12-04', 'Order Payment', '111-6711726-5609033', NULL, 'Dresser Assembly - Dresser', '', '$81.18', '0', '$-16.24', '0', '0', '0', '0', '64.94'),
(808, '2018-12-03', 'Order Payment', '114-0845174-3565059', NULL, 'Storage Cabinet Assembly', '', '$122.88', '0', '$-24.58', '0', '0', '0', '0', '98.3'),
(809, '2018-12-03', 'Order Payment', '113-4989978-2568201', NULL, 'Treadmill Assembly', '', '$81.52', '0', '$-16.30', '0', '0', '0', '0', '65.22'),
(810, '2018-12-02', 'Order Payment', '111-7248086-8908262', NULL, 'Treadmill Assembly', '', '$77.04', '0', '$-15.41', '0', '0', '0', '0', '61.63'),
(811, '2018-12-02', 'Order Payment', '113-7097508-9077818', NULL, 'Deadbolt Installation - Wood Door', '', '$123.94', '0', '$-24.79', '0', '0', '0', '0', '99.15'),
(812, '2018-12-02', 'Order Payment', '112-2330497-7984263', NULL, 'Garage Door Opener Replacement', '', '$144.35', '0', '$-28.87', '0', '0', '0', '0', '115.48'),
(813, '2018-12-01', 'Order Payment', '111-4741742-0643443', NULL, 'Elliptical Assembly', '', '$80.34', '0', '$-16.07', '0', '0', '0', '0', '64.27'),
(814, '2018-12-01', 'Order Payment', '113-9226562-3203454', NULL, 'Garage Door Opener Replacement', '', '$141.55', '0', '$-28.31', '0', '0', '0', '0', '113.24'),
(815, '2018-12-01', 'Order Payment', '111-1172013-0053858', NULL, 'Garage Door Opener Replacement', '', '$141.55', '0', '$-28.31', '0', '0', '0', '0', '113.24'),
(816, '2018-12-01', 'Order Payment', '113-1859771-9497829', NULL, 'Garage Door Opener Replacement', '', '$141.55', '0', '$-28.31', '0', '0', '0', '0', '113.24'),
(817, '2018-11-30', 'Order Payment', '114-3576083-3438619', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$82.77', '0', '$-16.55', '0', '0', '0', '0', '66.22'),
(818, '2018-11-29', 'Order Payment', '114-4166023-8242605', NULL, 'Exercise Bike Assembly', '', '$98.12', '0', '$-19.62', '0', '0', '0', '0', '78.5'),
(819, '2018-11-28', 'Order Payment', '112-3947610-9683460', NULL, 'Garage Door Opener Replacement', '', '$144.35', '0', '$-28.87', '0', '0', '0', '0', '115.48'),
(820, '2018-11-27', 'Order Payment', '111-9023040-3231444', NULL, 'Garage Door Opener Replacement', '', '$180.29', '0', '$-36.06', '0', '0', '0', '0', '144.23'),
(821, '2018-11-27', 'Order Payment', '114-5876068-1641051', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$122.10', '0', '$-24.42', '0', '0', '0', '0', '97.68'),
(822, '2018-12-30', 'Order Payment', '112-6761560-9790648', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(823, '2018-12-30', 'Order Payment', '114-5918455-1311457', NULL, 'Deadbolt Installation - Wood Door', '', '$98.26', '0', '$-19.65', '0', '0', '0', '0', '78.61'),
(824, '2018-12-30', 'Order Payment', '112-5774075-1707448', NULL, 'Office Chair Assembly - 1 Chair', '', '$67.42', '0', '$-13.48', '0', '0', '0', '0', '53.94'),
(825, '2018-12-30', 'Order Payment', '111-4213704-2649019', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(826, '2018-12-29', 'Order Payment', '113-5059566-5266658', NULL, 'Smoker Assembly', '', '$118.80', '0', '$-23.76', '0', '0', '0', '0', '95.04'),
(827, '2018-12-29', 'Order Payment', '111-7391159-2962646', NULL, 'Wall Hanging - 1 Hour - Ladder Required, Items 6 Feet in Length or More', '', '$115.21', '0', '$-23.04', '0', '0', '0', '0', '92.17'),
(828, '2018-12-29', 'Order Payment', '114-9635858-9282618', NULL, 'Bar Stool Assembly - 2 Stools', '', '$77.65', '0', '$-15.53', '0', '0', '0', '0', '62.12'),
(829, '2018-12-28', 'Order Payment', '111-5963567-5685826', NULL, 'Treadmill Assembly', '', '$165.69', '0', '$-33.14', '0', '0', '0', '0', '132.55'),
(830, '2018-12-28', 'Order Payment', '113-1075501-9998636', NULL, 'Table Tennis Table Assembly', '', '$102.94', '0', '$-20.59', '0', '0', '0', '0', '82.35'),
(831, '2018-12-28', 'Order Payment', '113-6636210-7672237', NULL, 'Treadmill Assembly', '', '$87.43', '0', '$-17.49', '0', '0', '0', '0', '69.94'),
(832, '2018-12-28', 'Order Payment', '113-0281878-4321876', NULL, 'Grill Assembly - 2 or 3 burners', '', '$62.98', '0', '$-12.60', '0', '0', '0', '0', '50.38'),
(833, '2018-12-27', 'Order Payment', '111-1312054-9352207', NULL, 'Treadmill Assembly', '', '$78.73', '0', '$-15.75', '0', '0', '0', '0', '62.98'),
(834, '2018-12-27', 'Order Payment', '113-4060308-7287457', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(835, '2018-12-27', 'Order Payment', '114-7906503-9642638', NULL, 'Deadbolt Installation - Wood Door', '', '$160.53', '0', '$-32.11', '0', '0', '0', '0', '128.42'),
(836, '2019-01-07', 'Order Payment', '111-6530036-7708200', NULL, 'Garage Door Opener Replacement', '', '$137.82', '0', '$-27.56', '0', '0', '0', '0', '110.26'),
(837, '2019-01-07', 'Order Payment', '111-0138989-8593817', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(838, '2019-01-06', 'Order Payment', '111-5199430-5865854', NULL, 'Elliptical Assembly', '', '$81.82', '0', '$-16.36', '0', '0', '0', '0', '65.46'),
(839, '2019-01-06', 'Order Payment', '114-3828322-6846641', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(840, '2019-01-06', 'Order Payment', '114-7948650-0535429', NULL, 'Treadmill Assembly', '', '$77.91', '0', '$-15.58', '0', '0', '0', '0', '62.33'),
(841, '2019-01-06', 'Order Payment', '113-7198140-6976245', NULL, 'Garage Door Opener Replacement', '', '$187.20', '0', '$-37.44', '0', '0', '0', '0', '149.76'),
(842, '2019-01-06', 'Order Payment', '111-1802672-9987404', NULL, 'Foosball Table Assembly', '', '$114.09', '0', '$-22.82', '0', '0', '0', '0', '91.27'),
(843, '2019-01-06', 'Order Payment', '113-0249809-6787430', NULL, 'Dresser Assembly - Dresser', '', '$80.54', '0', '$-16.11', '0', '0', '0', '0', '64.43'),
(844, '2019-01-06', 'Order Payment', '111-2846016-8393026', NULL, 'Office Chair Assembly - 1 Chair', '', '$75.50', '0', '$-15.10', '0', '0', '0', '0', '60.4'),
(845, '2019-01-05', 'Order Payment', '112-0195067-5256272', NULL, 'Exercise Bike Assembly', '', '$76.55', '0', '$-15.31', '0', '0', '0', '0', '61.24'),
(846, '2019-01-05', 'Order Payment', '114-1840396-6501059', NULL, 'Grill Assembly - 2 or 3 burners', '', '$72.92', '0', '$-14.58', '0', '0', '0', '0', '58.34'),
(847, '2019-01-05', 'Order Payment', '113-0220252-8530652', NULL, 'Office Chair Assembly - 1 Chair', '', '$66.92', '0', '$-13.38', '0', '0', '0', '0', '53.54'),
(848, '2019-01-04', 'Order Payment', '113-3456992-8641838', NULL, 'Treadmill Assembly', '', '$87.43', '0', '$-17.49', '0', '0', '0', '0', '69.94'),
(849, '2019-01-03', 'Order Payment', '114-2863550-0888222', NULL, 'Rocking Chair or Glider Assembly', '', '$88.93', '0', '$-17.79', '0', '0', '0', '0', '71.14'),
(850, '2019-01-03', 'Order Payment', '111-2901745-2284211', NULL, 'Toilet Replacement (Commercial)', '', '$197.85', '0', '$-39.57', '0', '0', '0', '0', '158.28'),
(851, '2019-01-03', 'Order Payment', '111-5774895-3273062', NULL, 'TV Stand or Media Storage Assembly - Media Cabinet', '', '$149.96', '0', '$-29.99', '0', '0', '0', '0', '119.97'),
(852, '2019-01-03', 'Order Payment', '114-5476357-3393008', NULL, 'Faucet Mounted Water Filter Installation', '', '$67.88', '0', '$-13.58', '0', '0', '0', '0', '54.3'),
(853, '2019-01-02', 'Order Payment', '114-6441121-4422631', NULL, 'Treadmill Assembly', '', '$165.69', '0', '$-33.14', '0', '0', '0', '0', '132.55'),
(854, '2019-01-02', 'Order Payment', '112-1965988-8009041', NULL, 'Storage Cabinet Assembly', '', '$122.59', '0', '$-24.52', '0', '0', '0', '0', '98.07'),
(855, '2019-01-02', 'Order Payment', '112-1081225-1829016', NULL, 'Deadbolt Installation - Wood Door', '', '$100.53', '0', '$-20.11', '0', '0', '0', '0', '80.42'),
(856, '2018-12-30', 'Order Payment', '113-9147785-1641816', NULL, 'Wall Hanging - 2 Hours, Items Under 6 Feet in Length', '', '$136.71', '0', '$-20.51', '0', '0', '0', '0', '116.2'),
(857, '2018-12-19', 'Order Payment', '114-0208176-9823409', NULL, 'Deadbolt Installation - Wood Door', '', '$128.46', '0', '$-25.69', '0', '0', '0', '0', '102.77'),
(858, '2018-12-19', 'Order Payment', '112-2187211-2949803', NULL, 'Table Tennis Table Assembly', '', '$95.34', '0', '$-19.07', '0', '0', '0', '0', '76.27'),
(859, '2018-12-18', 'Order Payment', '111-6420357-4790629', NULL, 'Bed Assembly - Platform or Sleigh Bed', '', '$79.26', '0', '$-15.85', '0', '0', '0', '0', '63.41'),
(860, '2018-12-18', 'Order Payment', '112-2297799-4894637', NULL, 'Garage Door Opener Replacement', '', '$163.26', '0', '$-32.65', '0', '0', '0', '0', '130.61'),
(861, '2018-12-17', 'Order Payment', '112-2200601-0860252', NULL, 'Bar Stool Assembly - 2 Stools', '', '$77.65', '0', '$-15.53', '0', '0', '0', '0', '62.12'),
(862, '2018-12-17', 'Order Payment', '113-5228520-3502658', NULL, 'Office Chair Assembly - 1 Chair', '', '$67.42', '0', '$-13.48', '0', '0', '0', '0', '53.94'),
(863, '2018-12-17', 'Order Payment', '114-1216752-4453822', NULL, 'Garage Door Opener Replacement', '', '$163.26', '0', '$-32.65', '0', '0', '0', '0', '130.61'),
(864, '2018-12-17', 'Order Payment', '112-0605188-3681065', NULL, 'Deadbolt Installation - Wood Door', '', '$116.29', '0', '$-23.26', '0', '0', '0', '0', '93.03'),
(865, '2018-12-15', 'Order Payment', '114-0392101-5256237', NULL, 'Treadmill Assembly', '', '$165.69', '0', '$-33.14', '0', '0', '0', '0', '132.55'),
(866, '2018-12-15', 'Order Payment', '111-6914792-3770611', NULL, 'Treadmill Assembly', '', '$165.69', '0', '$-33.14', '0', '0', '0', '0', '132.55'),
(867, '2018-12-15', 'Order Payment', '113-0270134-7336225', NULL, 'Exercise Bike Assembly', '', '$134.78', '0', '$-26.96', '0', '0', '0', '0', '107.82'),
(868, '2018-12-13', 'Order Payment', '111-7344493-6877817', NULL, 'Bar Stool Assembly - 2 Stools', '', '$89.18', '0', '$-17.84', '0', '0', '0', '0', '71.34'),
(869, '2018-12-12', 'Order Payment', '113-9621138-3623447', NULL, 'Toilet Fill Valve Replacement', '', '$79.13', '0', '$-15.83', '0', '0', '0', '0', '63.3'),
(870, '2018-12-12', 'Order Payment', '112-8418687-9898625', NULL, 'Patio Bench Assembly', '', '$138.45', '0', '$-27.69', '0', '0', '0', '0', '110.76'),
(871, '2018-12-11', 'Order Payment', '112-6362482-9317815', NULL, 'Deadbolt Installation - Wood Door', '', '$121.83', '0', '$-24.37', '0', '0', '0', '0', '97.46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Technician'),
(2, 'Assistant'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`, `role_id`) VALUES
(1, 'cakephp@example.com', '$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa', '2018-12-31 22:07:09', '2019-01-03 01:15:47', NULL),
(2, '4waymedia@gmail.com', '$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa', '2019-01-03 01:18:33', '2019-01-03 01:18:33', 3),
(3, 'me@you.com', '$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa', '2019-02-14 08:57:46', '2019-02-14 08:57:46', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
