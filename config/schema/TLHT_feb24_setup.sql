# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: cake_cms
# Generation Time: 2019-02-25 03:48:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table account_payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `account_payments`;

CREATE TABLE `account_payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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

LOCK TABLES `account_payments` WRITE;
/*!40000 ALTER TABLE `account_payments` DISABLE KEYS */;

INSERT INTO `account_payments` (`id`, `account_id`, `contractor_id`, `technician_id`, `job_id`, `order_id`, `amount`, `confirmation_receipt`, `date`)
VALUES
	(24,1,7,'','917','112-9343665-6265850',94.50,NULL,'0000-00-00');

/*!40000 ALTER TABLE `account_payments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table accounts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;

INSERT INTO `accounts` (`id`, `name`, `description`)
VALUES
	(1,'Venmo','Business Venmo Account - busvenmo@tlht.com'),
	(2,'Bank of the West','business account');

/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contractor_payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contractor_payments`;

CREATE TABLE `contractor_payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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



# Dump of table contractors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contractors`;

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `technician_id` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT '',
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contractors` WRITE;
/*!40000 ALTER TABLE `contractors` DISABLE KEYS */;

INSERT INTO `contractors` (`id`, `first_name`, `last_name`, `technician_id`, `email`, `role_id`, `created`, `modified`)
VALUES
	(24,'Eric','Flint','Flint-A1VGPOC5WLXTK6','',1,'2019-02-21 05:02:41','2019-02-21 05:02:41'),
	(25,'Dustin','Hennagin','Hennagin-A2KDRJ6UAD2OJT','',1,'2019-02-21 05:02:41','2019-02-21 05:02:41'),
	(26,'Joshua','Hennagin','Hennagin-A32BDXSGWDJRPY','',1,'2019-02-21 05:02:41','2019-02-21 05:02:41');

/*!40000 ALTER TABLE `contractors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime DEFAULT NULL,
  `service_order_id` varchar(32) DEFAULT NULL,
  `job_id` char(32) DEFAULT NULL,
  `service_asin` varchar(15) DEFAULT NULL,
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` date DEFAULT NULL,
  `appointment_start_time` time DEFAULT NULL,
  `appointment_end_time` time DEFAULT NULL,
  `product_order_id` varchar(200) DEFAULT NULL,
  `product_asin` varchar(20) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_quantity_purchased` int(5) DEFAULT NULL,
  `product_order_status` varchar(32) DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `buyer_phone_number` int(10) DEFAULT NULL,
  `ship_address_line_1` varchar(64) NOT NULL DEFAULT '',
  `ship_address_line_2` varchar(64) DEFAULT NULL,
  `ship_postal_code` int(11) NOT NULL,
  `ship_city` varchar(32) NOT NULL DEFAULT '',
  `coverage_area` varchar(64) DEFAULT NULL,
  `buyer_id` int(15) DEFAULT NULL,
  `defect` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;

INSERT INTO `jobs` (`id`, `order_created_time`, `service_order_id`, `job_id`, `service_asin`, `job_name`, `job_status`, `appointment_date`, `appointment_start_time`, `appointment_end_time`, `product_order_id`, `product_asin`, `product_name`, `product_quantity_purchased`, `product_order_status`, `technician`, `buyer_phone_number`, `ship_address_line_1`, `ship_address_line_2`, `ship_postal_code`, `ship_city`, `coverage_area`, `buyer_id`, `defect`)
VALUES
	(1770,'2019-02-15 15:45:45','114-0503659-8884257','74b479ca-a438-3ea6-e212-a93423f9','B06WGSP17V','Leaky Faucet Repair','COMPLETED','2019-02-19','14:00:00','17:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'5566 MORAGA AVE',NULL,94611,'OAKLAND','35 miles radius around 94590',1954078281,NULL),
	(1771,'2019-02-15 13:59:45','114-8876954-8284239','5ab4799b-89aa-a2c5-c4e1-2d77e95a','B00STOHXWC','Treadmill Assembly','COMPLETED','2019-02-19','17:00:00','20:00:00','114-1767030-9897031','B0193V3DJ6','TREADMILL',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1046 LINDSEY CT',NULL,94549,'LAFAYETTE','Marin County',2147483647,NULL),
	(1772,'2019-02-13 17:18:56','114-3419655-1821042','22b474cb-efcc-d389-ad83-08bb1922','B01CFCGM7U','Mailbox Installation - Post Mounted - First-Time Installation','COMPLETED','2019-02-17','11:00:00','14:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',510,'3136 PASEO GRANADA',NULL,94566,'PLEASANTON','35 miles radius around 94590',50840234,NULL),
	(1773,'2019-02-12 19:28:09','113-1032634-7121844','08b47273-8d56-830e-4f11-21a54998','B00UBYCN28','Furniture Assembly - 3 hours','COMPLETED','2019-02-16','11:00:00','14:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1187 SCOTS LN',NULL,94596,'WALNUT CREEK','Marin County',1779209811,NULL),
	(1774,'2019-02-12 18:10:49','112-8384385-9762648','c0b47251-33ab-17af-825f-c812ff23','B01JJQV73O','Grab Bar Installation - Tile','COMPLETED','2019-02-18','14:00:00','17:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'38162 WOODRUFF DR',NULL,94560,'NEWARK','35 miles radius around 94590',926780711,NULL),
	(1775,'2019-02-12 11:44:17','112-9642975-0333032','56b4719f-0d18-e7c8-1b5d-ec598b44','B00UBYCOV8','Furniture Assembly - 4 hours','COMPLETED','2019-02-15','17:00:00','20:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'2952 BELLA DR',NULL,94519,'CONCORD','Marin County',1788213620,NULL),
	(1776,'2019-02-11 22:18:31','114-7125913-4572224','54b4702f-70e3-9848-533b-aab32f46','B012TXC7B0','Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More','COMPLETED','2019-02-16','11:00:00','14:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1515 15TH ST APT 505',NULL,94103,'SAN FRANCISCO','35 miles radius around 94590',840477140,NULL),
	(1777,'2019-02-10 19:15:12','111-0779493-5357803','0ab46d4a-da48-9349-087b-417e386c','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-17','11:00:00','14:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',2147483647,'21 Bud Ct',NULL,94523,'Pleasant Hill','San Francisco Bay Area',1136352980,NULL),
	(1778,'2019-02-10 18:56:06','114-3640514-1377015','2eb46d3f-0e26-91ca-4e18-583313b1','B00STRWUKO','Bed Assembly - Bunk Bed','COMPLETED','2019-02-14','11:00:00','14:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',415,'700 ROBIN DR APT 746',NULL,94925,'CORTE MADERA','Marin County',772851616,NULL),
	(1779,'2019-02-10 18:18:35','113-5195961-0749818','eeb46d30-4918-ffd2-c877-6b83d02c','B00STRX6AC','TV Stand or Media Storage Assembly - Media Cabinet','COMPLETED','2019-02-16','08:00:00','11:00:00','113-9555714-3294639|113-9555714-3294639','B015Q0JXX8|B000NPQKU','HOME_FURNITURE_AND_DECOR|HOME_FURNITURE_AND_DECOR',1,'NotDelivered|NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1125 COWAN LN',NULL,95448,'HEALDSBURG','35 miles radius around 94590',750356291,NULL),
	(1780,'2019-02-10 16:21:48','112-6817605-1168224','92b46cfa-18bf-6bc2-f3c0-bf7c844e','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-16','11:00:00','14:00:00','112-7529414-5625852','B004O6TXVS','SPORTING_GOODS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',707,'4733 TARTON DR',NULL,95405,'SANTA ROSA','San Francisco Bay Area',1001332,NULL),
	(1781,'2019-02-10 09:40:52','112-0703496-8933804','70b46c43-1245-1edb-7198-eee5d825','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-14','17:00:00','20:00:00','112-4351814-3633005','B002CVU2HG','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1285 REDWOOD BLVD APT D',NULL,94947,'NOVATO','Marin County',776472281,NULL),
	(1782,'2019-02-10 09:05:54','114-5028255-4623413','08b46c30-0d8d-5bce-bb24-68185f19','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-13','11:00:00','14:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1700 22ND AVE',NULL,94122,'SAN FRANCISCO','Marin County',1195865460,NULL),
	(1783,'2019-02-09 20:33:04','112-6715531-2377018','8eb46ad8-89f8-3f65-51e9-92ebfa3d','B00STOHWSM','Home Gym Assembly','COMPLETED','2019-02-16','08:00:00','11:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'3681 BRIDLEWOOD WAY',NULL,95747,'ROSEVILLE','94203',1099601191,NULL),
	(1784,'2019-02-08 21:04:36','112-6063135-3301823','6eb46855-96b4-b9e1-01df-900ffe29','B01L2YQNFI','Toilet Replacement (Commercial)','COMPLETED','2019-02-20','08:00:00','11:00:00','112-4080285-4598602','B01N1I9D6E','PLUMBING_FIXTURE',1,'Delivered','Dustin Hennagin-A2KDRJ6UAD2OJT',916,'9169 PINTO CANYON WAY',NULL,95747,'ROSEVILLE','94203',2081718290,NULL),
	(1785,'2019-02-08 17:34:06','112-9343665-6265850','12b467f2-46a7-148d-9342-5728db53','B00T1HBZDE','Grill Assembly - 4 or 5 burners','COMPLETED','2019-02-18','08:00:00','11:00:00','112-5680200-7013036','B002BCSX0Y','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'1123 VINTAGE GREENS DR',NULL,95492,'WINDSOR','35 miles radius around 94590',1958449651,NULL),
	(1786,'2019-02-08 14:29:53','113-6397731-2865833','b6b467cf-dfc5-ae65-cb74-4c49035c','B00STOHR28','Hutch Assembly','COMPLETED','2019-02-18','08:00:00','11:00:00','113-9052336-2684229','B01M8MW5UO','HOME_FURNITURE_AND_DECOR',1,'Delivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'463 AVIATION BLVD',NULL,95403,'SANTA ROSA','35 miles radius around 94590',1267837360,NULL),
	(1787,'2019-02-08 00:40:41','113-8634078-0042669','74b46622-bd81-d132-e590-1a652ffb','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-18','11:00:00','14:00:00','113-2380028-3559460','B072JHYQGC','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'9 PIN OAK PL',NULL,95409,'SANTA ROSA','35 miles radius around 94590',1208395221,NULL),
	(1788,'2019-02-07 16:34:42','111-4406380-8291456','4ab46545-1dbf-54f5-96c5-1e00f750','B06WGSP17V','Leaky Faucet Repair','COMPLETED','2019-02-11','17:00:00','20:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',2147483647,'4782 NEWHAVEN ST',NULL,94568,'DUBLIN','35 miles radius around 94590',2073216210,NULL),
	(1789,'2019-02-06 17:31:54','111-0348503-2210632','14b462cc-09ae-4080-701d-fc42fd81','B00STOHXWC','Treadmill Assembly','COMPLETED','2019-02-11','17:00:00','20:00:00','111-7122882-9945059','B01M0L0D90','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'5332 GOLD CREEK CIR',NULL,94505,'DISCOVERY BAY','CA - Contra Costa County',36514981,'LateSentEta'),
	(1790,'2019-02-06 16:51:25','113-8889144-1842668','44b462b9-7d4a-bde0-b577-33690387','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-13','17:00:00','20:00:00','113-5923060-4389844','B07GQ71KCH','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'484 WELDON AVE',NULL,94610,'OAKLAND','CA - Alameda County',640741381,NULL),
	(1791,'2019-02-06 16:23:07','112-6857864-2826654','e0b462ab-e9d3-ff8c-da76-b70c2c38','B071XVGL49','Toilet Fill Valve Replacement','COMPLETED','2019-02-11','11:00:00','14:00:00','112-8730071-2846653','B01BNVDPZ6','PLUMBING_FIXTURE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'915 RAILROAD AVE',NULL,94019,'HALF MOON BAY','CA - San Mateo County',61688910,'LateSentEta'),
	(1792,'2019-02-05 16:10:03','111-6666968-6229013','a4b46012-8f5f-8a06-3ddd-3292ad51','B06VX413N3','Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','COMPLETED','2019-02-10','08:00:00','11:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',925,'3979 DEERGRASS CIR',NULL,95677,'ROCKLIN','94203',1080191320,'LateSentEta'),
	(1793,'2019-02-05 16:06:21','111-1235516-9590652','d4b46011-7c74-f046-782e-d712e1ab','B06VX413N3','Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','COMPLETED','2019-02-10','08:00:00','11:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',925,'3979 DEERGRASS CIR',NULL,95677,'ROCKLIN','94203',1080191320,'LateSentEta'),
	(1794,'2019-02-05 12:34:55','112-3048266-3807429','acb45fb0-8e56-de45-39b2-8db711b8','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-08','11:00:00','14:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'2416 BONAR ST',NULL,94702,'BERKELEY','San Francisco Bay Area',2007766230,'LateSentEta'),
	(1795,'2019-02-04 22:18:24','114-6656580-1596255','86b45e2b-c09c-cade-c92e-69fc69d6','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-11','11:00:00','14:00:00','114-8826160-9406615','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'808 DONAHUE ST',NULL,95401,'SANTA ROSA','35 miles radius around 94590',1893740040,NULL),
	(1796,'2019-02-04 22:00:18','113-0406569-8630633','beb45e21-fd13-b706-672d-bc6d9d66','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-10','14:00:00','17:00:00','113-3479742-9814628','B00YUPDW0Q','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'102 LEAFIELD RD',NULL,94506,'DANVILLE','35 miles radius around 94590',711158351,NULL),
	(1797,'2019-02-04 21:40:15','112-7037673-6985854','fcb45e17-239f-5eff-4125-97dbff01','B01M9E5IBJ','Handyman Services - 2 Hours - Inside - No Ladder','COMPLETED','2019-02-14','08:00:00','11:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',916,'5224 HIDDEN LN',NULL,95819,'SACRAMENTO','94203',1173398591,NULL),
	(1798,'2019-02-04 19:49:20','113-0619140-8584221','8cb469d3-07b8-c798-b44b-ab44c6e9','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-10','08:00:00','11:00:00','113-1001983-6102665','B07H42GX6M','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1577 45th Ave',NULL,94122,'San Francisco','Marin County',2143898,NULL),
	(1799,'2019-02-04 17:33:33','111-8711616-1644259','78b45da7-2546-1357-53be-c3578936','B06WGSP17V','Leaky Faucet Repair','COMPLETED','2019-02-12','08:00:00','11:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1163 TENNESSEE ST',NULL,94107,'SAN FRANCISCO','Marin County',2147483647,'LateSentEta'),
	(1800,'2019-02-04 17:07:19','112-3497891-4415451','24b45d9e-f5c7-e7cd-ce21-e0cf0e8d','B00STRWW8Y','Dresser Assembly - Dresser','COMPLETED','2019-02-19','14:00:00','17:00:00','112-4941261-6279465','B00534LJ9O','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',0,'740 FRANCISCO ST',NULL,94133,'SAN FRANCISCO','San Francisco Bay Area',759777821,NULL),
	(1801,'2019-02-04 16:16:38','114-0284995-5325052','22b45d83-d383-55b9-6cb0-79427c6f','B01JJQWSVO','Security Safe Installation - Wall Anchored','COMPLETED','2019-02-18','11:00:00','14:00:00','114-7375013-5819418','B018X5MM5E','SECURITY_ELECTRONICS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',408,'38800 HASTINGS ST APT 76',NULL,94536,'FREMONT','35 miles radius around 94590',2147483647,NULL),
	(1802,'2019-02-04 12:17:44','112-5265211-2481034','04b45d18-4ba0-5f2d-a0a3-c53de215','B071XVGL49','Toilet Fill Valve Replacement','COMPLETED','2019-02-09','11:00:00','14:00:00','112-4296666-8807430|112-4296666-8807430','B0097CVGWI|B00578RKB','PLUMBING_FIXTURE|PLUMBING_FIXTURE',1,'NotDelivered|NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',925,'4482 Barberry Court',NULL,94521,'Concord','35 miles radius around 94590',169734537,'LateSentEta'),
	(1803,'2019-02-03 15:23:29','114-3121991-4865869','b2b45ad8-aee1-7a57-6297-cbfefb51','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-09','08:00:00','11:00:00','114-0272738-9667460','B008JA2X5S','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'3621 EVERGREEN RD',NULL,95405,'SANTA ROSA','Marin County',27908422,NULL),
	(1804,'2019-02-03 10:08:49','112-6977237-8527464','54b45a48-0f9b-1933-2f87-646eca2a','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-12','17:00:00','20:00:00','112-6986291-6866617','B00573S4QM','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'274 BUTTERFIELD RD',NULL,94960,'SAN ANSELMO','CA - Marin County',15489258,NULL),
	(1805,'2019-02-03 08:16:18','112-9693887-8669808','76b45a13-8d04-1ec4-dd50-7645c740','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-08','11:00:00','14:00:00','112-6279875-2415407','B07BDPDZWD','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'127 HEARTFORD WAY',NULL,94503,'AMERICAN CANYON','Marin County',228402641,NULL),
	(1806,'2019-02-03 07:53:47','112-3575175-4304212','acb45a09-f5a6-be78-a602-547220e3','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-08','08:00:00','11:00:00','112-8873482-1085864','B00F74RX40','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',707,'3422 FIR DR',NULL,95405,'SANTA ROSA','Marin County',1932130340,'LateSentEta'),
	(1807,'2019-02-03 04:56:37','113-7895647-0125805','ecb459bb-a095-701f-3e5c-4616b9e8','B00OK5PIXA','Mailbox Installation - Wall Mounted - Replacement','COMPLETED','2019-02-10','14:00:00','17:00:00','113-6334299-3089024','B01DX1TORC','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'23 BISHOP PINE LN',NULL,94803,'EL SOBRANTE','San Francisco Bay Area',668911196,NULL),
	(1808,'2019-02-02 17:37:57','111-7438646-1603432','fcb45883-1276-6cb7-99e7-0e7a8b0b','B01M27P73B','Handyman Services - 3 Hours - Inside - No Ladder','COMPLETED','2019-02-06','17:00:00','20:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1372 SPRUCE ST',NULL,94579,'SAN LEANDRO','35 miles radius around 94590',2147483647,'LateSentEta'),
	(1809,'2019-02-02 16:24:22','114-0623715-4667468','36b45863-d114-a7fe-c01e-3ce95660','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-08','14:00:00','17:00:00','114-9736628-8552257','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',650,'3705 BEARTOOTH LN E',NULL,94558,'NAPA','35 miles radius around 94590',2147483647,NULL),
	(1810,'2019-02-01 23:09:51','113-8632720-1674669','1ab4568b-b74b-bcbe-b6ad-f506602d','B01M6V9DS8','Bed Assembly - Murphy Bed','COMPLETED','2019-02-11','08:00:00','11:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1189 18th Ave',NULL,94063,'REDWOOD CITY','35 miles radius around 94590',1369381351,NULL),
	(1811,'2019-02-01 18:05:08','113-0773478-6503421','6cb455fc-dab6-9aef-f6b6-43250077','B00STOHS18','Office Chair Assembly - 1 Chair','COMPLETED','2019-02-09','14:00:00','17:00:00','113-0840100-0809810','B07DZCK7K4','CHAIR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'2400 SONOMA ST',NULL,94558,'NAPA','35 miles radius around 94590',2147483647,'LateSentEta|LateStart'),
	(1812,'2019-02-01 14:42:28','113-8125759-8784221','12b4559d-ec73-4115-9c88-a59ef704','B01M9E5IBJ','Handyman Services - 2 Hours - Inside - No Ladder','COMPLETED','2019-02-04','17:00:00','20:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'43 DEARBORN ST',NULL,94110,'SAN FRANCISCO','San Francisco',584572710,NULL),
	(1813,'2019-01-31 20:46:57','112-1093632-6224202','e6b453b2-2c95-589f-4646-49fa5a2b','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-04','11:00:00','14:00:00','112-0072786-1750674','B0765JNS2D','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'3352 WASHINGTON ST',NULL,94118,'SAN FRANCISCO','Marin County',2147483647,NULL),
	(1814,'2019-01-31 18:14:14','113-5019811-0525831','b2b45372-7030-b78e-d7a3-ccb96ef9','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','COMPLETED','2019-02-15','08:00:00','11:00:00','113-4544465-2477865','B07FB11KYG','AUTO_ACCESSORY',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'922 VISTA POINTE DR',NULL,94582,'SAN RAMON','35 miles radius around 94590',1606606440,NULL),
	(1815,'2019-01-31 15:23:29','111-8234468-7958654','2cb4531e-16c3-e062-8b8b-e977c63d','B06ZXY1L43','Speaker Stand Assembly and Setup - 2 Stands','COMPLETED','2019-02-20','11:00:00','14:00:00','111-2310263-5825039','B079J62LDZ','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',650,'6455 PINE VALLEY DR',NULL,95409,'SANTA ROSA','San Francisco Bay Area',5543945,NULL),
	(1816,'2019-01-31 09:50:31','111-4390543-2868209','86b45288-2a26-358e-4b4b-c9207ed8','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-06','14:00:00','17:00:00','111-6997856-7306600','B0765JNS2D','HARDWARE',2,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2067698966,'848 BATTERY ST',NULL,94111,'SAN FRANCISCO','San Francisco Bay Area',2147483647,NULL),
	(1817,'2019-01-30 11:02:36','112-1268153-5240246','0eb45013-a0a2-ab22-9560-b84703de','B01ETS3DLQ','Storage Cabinet Assembly','COMPLETED','2019-02-12','11:00:00','14:00:00','112-2545431-3829869','B0072MZOJ6','PLUMBING_FIXTURE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'1012 LOS GAMOS RD APT F',NULL,94903,'SAN RAFAEL','35 miles radius around 94590',2147483647,'LateSentEta'),
	(1818,'2019-01-29 20:17:53','111-1156877-3765062','62b45324-7d3e-fed8-5c27-93977ec4','B00STRWY0A','Dresser Assembly - Wardrobe/Armoire','COMPLETED','2019-02-02','17:00:00','20:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'771 54TH ST',NULL,94609,'OAKLAND','35 miles radius around 94590',2147483647,NULL),
	(1819,'2019-01-29 17:52:08','113-9761230-7256215','72b44e3c-bea1-14ad-2edb-abcb5fbe','B071XVGJ3Q','Magnetic Knife Strip Installation - Wall Mounted','COMPLETED','2019-02-04','14:00:00','17:00:00','113-6615928-6005802','B00JF2QZK8','KITCHEN',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',312,'1330 MADRONA AVE',NULL,94574,'SAINT HELENA','35 miles radius around 94590',23476118,NULL),
	(1820,'2019-01-29 16:35:10','111-0566455-0473825','b8b44e1a-5b49-035d-af8a-383d9326','B00STOHXWC','Treadmill Assembly','COMPLETED','2019-02-02','11:00:00','14:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'84 KING AVE',NULL,94611,'PIEDMONT','Marin County',64349194,'LateSentEta|LateStart'),
	(1821,'2019-01-28 22:00:42','112-4268662-8721869','60b44c1c-bac1-62d9-eff1-ed84502d','B01MG21IQT','Handyman Services - 8 Hours - Inside - Step Ladder','COMPLETED','2019-02-03','08:00:00','11:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',2147483647,'2134 KNOX AVE',NULL,94565,'PITTSBURG','35 miles radius around 94590',2147483647,'LateSentEta'),
	(1822,'2019-01-28 10:53:06','112-4758127-6798606','32b44ae9-2f85-503a-4751-9d024b9c','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-04','08:00:00','11:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',707,'744 SUNNYSIDE RD',NULL,94574,'SAINT HELENA','35 miles radius around 94590',789511321,NULL),
	(1823,'2019-01-28 10:43:22','112-5750446-8096269','f8b44ae3-a761-c7d6-1e2a-12009586','B00TX97DKO','Gazebo Assembly - On the Lawn','COMPLETED','2019-02-06','08:00:00','11:00:00','112-8669407-8281043','B077XQW4Z7','OUTDOOR_LIVING',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'2730 BRYANT ST 1ST FLOOR',NULL,94110,'SAN FRANCISCO','Marin County',2147483647,'LateSentEta'),
	(1824,'2019-01-27 21:50:35','113-4440551-1313862','5ab44982-b74d-3899-0597-b48c9b52','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-02-18','08:00:00','11:00:00','113-9098037-5943427','B07BH6Y6LL','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'1800 Versailles Ave',NULL,94501,'Alameda','35 miles radius around 94590',872718810,NULL),
	(1825,'2019-01-27 17:28:08','113-1205574-8834651','3cb4490c-b22a-02a5-cdff-03da88bd','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-05','11:00:00','14:00:00','113-6358009-1175467','B0758L67KP','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'118 VIENNA ST',NULL,94112,'SAN FRANCISCO','Marin County',2061813431,NULL),
	(1826,'2019-01-27 15:13:27','113-2609986-1414647','96b448cf-3286-165f-cd17-8fda8929','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-02-06','11:00:00','14:00:00','113-0630519-0522622','B077GSJJ8D','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'740 ROLLING GREEN DR',NULL,94571,'RIO VISTA','San Francisco Bay Area',533483971,'LateSentEta'),
	(1827,'2019-01-27 10:02:03','114-1556239-0736227','5eb4483f-4562-9793-e4ea-31d1da3a','B00STRX7OW','TV Stand or Media Storage Assembly - TV Stand','COMPLETED','2019-01-31','08:00:00','11:00:00','','','',NULL,'','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'441 WOOD HOLLOW DR',NULL,94945,'NOVATO','35 miles radius around 94590',1846726710,NULL),
	(1828,'2019-01-26 21:35:02','111-5657759-8537006','b6b446e7-b01f-d846-533c-f027724c','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-06','11:00:00','14:00:00','111-2513057-7505038','B0758L67KP','HARDWARE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'855 POMONA AVE',NULL,94530,'EL CERRITO','Marin County',1273421220,NULL),
	(1829,'2019-01-26 18:25:31','112-3490630-9652243','78b44697-ea5b-b425-7647-989bde57','B06VX42J63','Garage Wall Shelf Installation - Up to 8 Feet - 2 Units','COMPLETED','2019-02-09','14:00:00','17:00:00','112-9535307-2625047|112-9535307-2625047','B07DRDX8CC|B07DRG7ZG','HOME|HOME',1,'NotDelivered|NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'667 Bamboo Terrace',NULL,94903,'San Rafael','Marin County',2017369520,NULL),
	(1830,'2019-01-26 16:52:29','114-8641672-3556204','e8b44666-ad29-1d63-8239-21d8c454','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-02','11:00:00','14:00:00','114-9358470-5901015','B075CQDW9M','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'15 Piedmont Rd.',NULL,94939,'Larkspur','35 miles radius around 94590',1423191350,NULL),
	(1831,'2019-01-26 14:48:23','114-5314132-4635410','1cb44631-1a8a-8638-6eb9-6643e456','B06ZXY1D22','Curtain Rod Installation - Drywall - 3 Curtain Rods','COMPLETED','2019-02-01','08:00:00','11:00:00','114-9622975-1751438|114-9622975-1751438','B00DB1HR5Q|B00DB1HR6','HOME|HOME',1,'NotDelivered|NotDelivered','Eric Flint-A1VGPOC5WLXTK6',510,'701 BANKS DR',NULL,94806,'SAN PABLO','35 miles radius around 94590',757981221,NULL),
	(1832,'2019-01-26 13:05:25','111-5545631-6914647','0ab445fd-f31f-71c7-6630-6dcaef8a','B00T1HBYFS','Grill Assembly - 2 or 3 burners','COMPLETED','2019-01-31','14:00:00','17:00:00','111-8987238-6753859','B077JTCMKR','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'31 VOLKER CT',NULL,94574,'SAINT HELENA','35 miles radius around 94590',261177257,'LateSentEta'),
	(1833,'2019-01-26 11:59:48','113-1328215-7230608','1cb445df-e7de-2d24-17f8-795baf44','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','2019-01-31','14:00:00','17:00:00','113-6258537-0028205','B072C3K6ZQ','SURVEILANCE_SYSTEMS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'360 ARLINGTON ST',NULL,94131,'SAN FRANCISCO','Marin County',395248977,'LateSentEta|ProviderReschedule'),
	(1834,'2019-01-26 09:40:37','111-3012086-9425006','b4b445a2-e434-c45b-e8ba-06aa279e','B06W2N7KLK','Glass Shower Door Installation - First Time','COMPLETED','2019-02-14','14:00:00','17:00:00','111-1042382-0427406','B078TMMK75','PLUMBING_FIXTURE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'6 WILDWOOD CT',NULL,94015,'DALY CITY','San Francisco',388233557,NULL),
	(1835,'2019-01-26 09:18:39','111-8585619-5264236','c4b4459d-ccfd-216f-376e-eceae73f','B01M6V9DS8','Bed Assembly - Murphy Bed','COMPLETED','2019-02-02','08:00:00','11:00:00','111-8562865-6440262','B079QRQT54','BED',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3961 SHAKER RUN CIR',NULL,94533,'FAIRFIELD','35 miles radius around 94590',71323191,'LateSentEta'),
	(1836,'2019-01-25 20:26:37','112-7801950-0776226','74b44436-6362-50de-424a-a39271ed','B06X6JS7XZ','Faucet Mounted Water Filter Installation','COMPLETED','2019-01-29','14:00:00','17:00:00','112-2999270-3038630','B00910U03W','PLUMBING_FIXTURE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'903 Vermont St',NULL,94610,'Oakland','35 miles radius around 94590',125097691,NULL),
	(1837,'2019-01-24 11:14:06','114-7670271-1564211','b2b440ab-166f-6285-33b9-9cba91b9','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','2019-02-17','08:00:00','11:00:00','114-5113104-4839432','B07H4BGY1W','HARDWARE',1,'Delivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'2375 32nd Ave',NULL,94116,'San Francisco','Marin County',1414837851,NULL),
	(1838,'2019-01-23 10:33:22','114-1320493-0470604','bab43e01-6aca-3f66-558e-4b056652','B00UBYCKCG','Furniture Assembly - 2 hours','COMPLETED','2019-01-26','11:00:00','14:00:00','','','',NULL,'','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'920 BRODERICK ST',NULL,94115,'SAN FRANCISCO','35 miles radius around 94590',1200718556,'LateSentEta'),
	(1839,'2019-01-23 08:10:27','113-1077190-3485860','3ab43dbf-dd8e-20f3-ee1d-5cb5b314','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-01-29','11:00:00','14:00:00','113-5477426-0871465','B002JB40MC','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'375 GARFIELD PARK AVE',NULL,95409,'SANTA ROSA','San Francisco Bay Area',1473639060,'LateSentEta'),
	(1840,'2019-01-22 18:15:16','113-0393617-4991406','e2b43c42-63fc-70b4-2f7d-48d480f4','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','COMPLETED','2019-02-02','11:00:00','14:00:00','','','',NULL,'','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3405 STEWARTON DR',NULL,94803,'RICHMOND','35 miles radius around 94590',2147483647,'LateSentEta'),
	(1841,'2019-01-21 20:22:01','114-0156505-4530675','96b439ec-d795-1811-b7d1-22fb1998','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','2019-01-25','08:00:00','11:00:00','114-2200116-3769839','B002CVU2HG','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'107 LARK CT',NULL,94947,'NOVATO','Marin County',1177074351,'LateSentEta');

/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

INSERT INTO `payments` (`id`, `date`, `transaction_type`, `order_id`, `product_details`, `product_title`, `payment_detail`, `total_product_charges`, `total_promotional_rebates`, `amazon_fees`, `refund_admin_fee`, `refund_referral_fee`, `refund_product_charge`, `other`, `total`)
VALUES
	(908,'2019-02-17','Order Payment','114-3419655-1821042',NULL,'Mailbox Installation - Post Mounted - First-Time Installation','','$150.14','0','$-30.03','0','0','0','0','120.11'),
	(909,'2019-02-17','Order Payment','111-0779493-5357803',NULL,'Deadbolt Installation - Wood Door','','$100.53','0','$-20.11','0','0','0','0','80.42'),
	(910,'2019-02-16','Order Payment','114-7670271-1564211',NULL,'Garage Door Opener Replacement','','$239.12','0','$-47.82','0','0','0','0','191.3'),
	(911,'2019-02-16','Order Payment','114-7125913-4572224',NULL,'Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More','','$204.71','0','$-40.94','0','0','0','0','163.77'),
	(912,'2019-02-16','Order Payment','113-1032634-7121844',NULL,'Furniture Assembly - 3 hours','','$122.64','0','$-24.53','0','0','0','0','98.11'),
	(913,'2019-02-16','Order Payment','112-6817605-1168224',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(914,'2019-02-16','Order Payment','113-5195961-0749818',NULL,'TV Stand or Media Storage Assembly - Media Cabinet','','$140.18','0','$-28.04','0','0','0','0','112.14'),
	(915,'2019-02-10','Order Payment','113-0406569-8630633',NULL,'Deadbolt Installation - Wood Door','','$100.53','0','$-20.11','$-4.02','$20.11','$-100.53','0','-4.02'),
	(916,'2019-02-16','Order Payment','112-6715531-2377018',NULL,'Home Gym Assembly','','$136.73','0','$-27.35','0','0','0','0','109.38'),
	(917,'2019-02-15','Order Payment','112-9642975-0333032',NULL,'Furniture Assembly - 4 hours','','$143.40','0','$-28.68','0','0','0','0','114.72'),
	(918,'2019-02-15','Order Payment','113-5019811-0525831',NULL,'Roof Rack Installation - At-Home - Rack Only','','$90.68','0','$-18.14','0','0','0','0','72.54'),
	(919,'2019-02-14','Order Payment','111-3012086-9425006',NULL,'Glass Shower Door Installation - First Time','','$710.23','0','$-142.05','0','0','0','0','568.18'),
	(920,'2019-02-14','Order Payment','112-0703496-8933804',NULL,'Exercise Bike Assembly','','$76.55','0','$-15.31','0','0','0','0','61.24'),
	(921,'2019-02-14','Order Payment','114-2622241-0913052',NULL,'Gazebo Assembly - On the Lawn','','$391.08','0','$-78.22','0','0','0','0','312.86'),
	(922,'2019-02-14','Order Payment','114-3640514-1377015',NULL,'Bed Assembly - Bunk Bed','','$134.00','0','$-26.80','0','0','0','0','107.2'),
	(923,'2019-02-14','Order Payment','112-7037673-6985854',NULL,'Handyman Services - 2 Hours - Inside - No Ladder','','$158.85','0','$-31.77','0','0','0','0','127.08'),
	(924,'2019-02-13','Order Payment','113-8889144-1842668',NULL,'Deadbolt Installation - Wood Door','','$128.46','0','$-25.69','0','0','0','0','102.77'),
	(925,'2019-02-13','Order Payment','114-5028255-4623413',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(926,'2019-02-12','Order Payment','112-6977237-8527464',NULL,'Deadbolt Installation - Wood Door','','$98.26','0','$-19.65','0','0','0','0','78.61'),
	(927,'2019-02-12','Order Payment','112-1268153-5240246',NULL,'Storage Cabinet Assembly','','$112.30','0','$-22.46','0','0','0','0','89.84'),
	(928,'2019-02-12','Order Payment','112-3490630-9652243',NULL,'Garage Wall Shelf Installation - Up to 8 Feet - 2 Units','','$226.42','0','$-45.28','0','0','0','0','181.14'),
	(929,'2019-02-12','Order Payment','111-8711616-1644259',NULL,'Leaky Faucet Repair','','$141.21','0','$-28.24','0','0','0','0','112.97'),
	(930,'2019-02-11','Order Payment','111-0348503-2210632',NULL,'Treadmill Assembly','','$75.11','0','$-15.02','0','0','0','0','60.09'),
	(931,'2019-02-11','Order Payment','111-4406380-8291456',NULL,'Leaky Faucet Repair','','$91.21','0','$-18.24','0','0','0','0','72.97'),
	(932,'2019-02-11','Order Payment','112-6857864-2826654',NULL,'Toilet Fill Valve Replacement','','$79.13','0','$-15.83','0','0','0','0','63.3'),
	(933,'2019-02-11','Order Payment','114-6656580-1596255',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(934,'2019-02-10','Order Payment','113-8632720-1674669',NULL,'Bed Assembly - Murphy Bed','','$272.80','0','$-54.56','0','0','0','0','218.24'),
	(935,'2019-02-10','Order Payment','111-6666968-6229013',NULL,'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','','$131.09','0','$-26.22','0','0','0','0','104.87'),
	(936,'2019-02-10','Order Payment','111-1235516-9590652',NULL,'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','','$131.09','0','$-26.22','0','0','0','0','104.87'),
	(937,'2019-02-10','Order Payment','113-7895647-0125805',NULL,'Mailbox Installation - Wall Mounted - Replacement','','$81.65','0','$-16.33','0','0','0','0','65.32'),
	(938,'2019-02-10','Order Payment','113-0619140-8584221',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(939,'2019-02-09','Order Payment','113-0773478-6503421',NULL,'Office Chair Assembly - 1 Chair','','$65.76','0','$-13.15','0','0','0','0','52.61'),
	(940,'2019-02-09','Order Payment','112-5265211-2481034',NULL,'Toilet Fill Valve Replacement','','$74.79','0','$-14.96','0','0','0','0','59.83'),
	(941,'2019-02-09','Order Payment','114-3121991-4865869',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(942,'2019-02-08','Order Payment','114-0623715-4667468',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(943,'2019-02-08','Order Payment','112-3048266-3807429',NULL,'Deadbolt Installation - Wood Door','','$128.46','0','$-25.69','0','0','0','0','102.77'),
	(944,'2019-02-08','Order Payment','112-3575175-4304212',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(945,'2019-02-08','Order Payment','112-9693887-8669808',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(946,'2019-02-06','Order Payment','111-7438646-1603432',NULL,'Handyman Services - 3 Hours - Inside - No Ladder','','$214.91','0','$-42.98','0','0','0','0','171.93'),
	(947,'2019-02-06','Order Payment','111-5657759-8537006',NULL,'Garage Door Opener Replacement','','$202.67','0','$-40.53','0','0','0','0','162.14'),
	(948,'2019-02-06','Order Payment','111-4390543-2868209',NULL,'Deadbolt Installation - Wood Door','','$118.77','0','$-23.75','0','0','0','0','95.02'),
	(949,'2019-02-06','Order Payment','112-5750446-8096269',NULL,'Gazebo Assembly - On the Lawn','','$351.27','0','$-70.25','0','0','0','0','281.02'),
	(950,'2019-02-06','Order Payment','113-2609986-1414647',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(951,'2019-02-05','Order Payment','113-1205574-8834651',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(952,'2019-02-04','Order Payment','113-8125759-8784221',NULL,'Handyman Services - 2 Hours - Inside - No Ladder','','$185.79','0','$-37.16','0','0','0','0','148.63');

/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`)
VALUES
	(1,'Technician'),
	(2,'Assistant'),
	(3,'Admin');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`, `role_id`)
VALUES
	(1,'cakephp@example.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2018-12-31 22:07:09','2019-01-03 01:15:47',1),
	(2,'4waymedia@gmail.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2019-01-03 01:18:33','2019-01-03 01:18:33',3),
	(3,'me@you.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2019-02-14 08:57:46','2019-02-14 08:57:46',1);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
