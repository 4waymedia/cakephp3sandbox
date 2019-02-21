# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: cake_cms
# Generation Time: 2019-02-19 19:02:31 +0000
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
  `technician_id` varchar(32) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contractors` WRITE;
/*!40000 ALTER TABLE `contractors` DISABLE KEYS */;

INSERT INTO `contractors` (`id`, `first_name`, `technician_id`, `last_name`, `email`, `nickname`, `role_id`, `created`, `modified`)
VALUES
	(3,'Dustin','Dustin Hennagin-A2KDRJ6UAD2OJT','Hennagin','Skater0guy@gmail.com','Fuzz',2,'2019-01-06 02:29:43','2019-01-06 02:29:43'),
	(4,'Josh','Joshua Hennagin-A32BDXSGWDJRPY','G','paulg@me.com','Paul G',1,'2019-01-06 02:59:11','2019-01-06 03:15:17'),
	(5,'test','Joshua Hennagin-A32BDXSG','assis','assistme@you.com','assistant',1,'2019-01-06 03:21:30','2019-01-06 03:31:16'),
	(6,'Eric','Eric Flint-A1VGPOC5WLXTK6','Flint','eric@me.com','Eric F',1,NULL,'2019-02-17 06:46:19');

/*!40000 ALTER TABLE `contractors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime NOT NULL,
  `service_order_id` varchar(32) NOT NULL DEFAULT '',
  `job_id` char(32) NOT NULL DEFAULT '',
  `service_asin` varchar(15) NOT NULL DEFAULT '',
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` varchar(10) NOT NULL DEFAULT '',
  `appointment_start_time` time NOT NULL,
  `appointment_end_time` time NOT NULL,
  `product_order_id` varchar(200) NOT NULL DEFAULT '',
  `product_asin` varchar(20) NOT NULL DEFAULT '',
  `product_name` varchar(100) NOT NULL DEFAULT '',
  `product_quantity_purchased` int(5) NOT NULL,
  `product_order_status` varchar(32) NOT NULL DEFAULT '',
  `technician` varchar(100) NOT NULL DEFAULT '',
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
	(416,'0000-00-00 00:00:00','114-3640514-1377015','2eb46d3f-0e26-91ca-4e18-583313b1','B00STRWUKO','Bed Assembly - Bunk Bed','COMPLETED','02-14-2019','11:00:00','14:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',415,'700 ROBIN DR APT 746','--',94925,'CORTE MADERA','Marin County',772851616,'--'),
	(417,'0000-00-00 00:00:00','112-0703496-8933804','70b46c43-1245-1edb-7198-eee5d825','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-14-2019','17:00:00','20:00:00','112-4351814-3633005','B002CVU2HG','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1285 REDWOOD BLVD APT D','--',94947,'NOVATO','Marin County',776472281,'--'),
	(418,'0000-00-00 00:00:00','114-5028255-4623413','08b46c30-0d8d-5bce-bb24-68185f19','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-13-2019','11:00:00','14:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1700 22ND AVE','--',94122,'SAN FRANCISCO','Marin County',1195865460,'--'),
	(419,'0000-00-00 00:00:00','111-4406380-8291456','4ab46545-1dbf-54f5-96c5-1e00f750','B06WGSP17V','Leaky Faucet Repair','COMPLETED','02-11-2019','17:00:00','20:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'4782 NEWHAVEN ST','--',94568,'DUBLIN','35 miles radius around 94590',2073216210,'--'),
	(420,'0000-00-00 00:00:00','111-0348503-2210632','14b462cc-09ae-4080-701d-fc42fd81','B00STOHXWC','Treadmill Assembly','COMPLETED','02-11-2019','17:00:00','20:00:00','111-7122882-9945059','B01M0L0D90','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'5332 GOLD CREEK CIR','--',94505,'DISCOVERY BAY','CA - Contra Costa County',36514981,'LateSentEta'),
	(421,'0000-00-00 00:00:00','113-8889144-1842668','44b462b9-7d4a-bde0-b577-33690387','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-13-2019','17:00:00','20:00:00','113-5923060-4389844','B07GQ71KCH','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'484 WELDON AVE','--',94610,'OAKLAND','CA - Alameda County',640741381,'--'),
	(422,'0000-00-00 00:00:00','112-6857864-2826654','e0b462ab-e9d3-ff8c-da76-b70c2c38','B071XVGL49','Toilet Fill Valve Replacement','COMPLETED','02-11-2019','11:00:00','14:00:00','112-8730071-2846653','B01BNVDPZ6','PLUMBING_FIXTURE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'915 RAILROAD AVE','--',94019,'HALF MOON BAY','e0477cce-1e28-4667-8dd2-4affa1c1d9b7-DELETED',61688910,'LateSentEta'),
	(423,'0000-00-00 00:00:00','111-6666968-6229013','a4b46012-8f5f-8a06-3ddd-3292ad51','B06VX413N3','Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','COMPLETED','02-10-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',925,'3979 DEERGRASS CIR','--',95677,'ROCKLIN','94203',1080191320,'LateSentEta'),
	(424,'0000-00-00 00:00:00','111-1235516-9590652','d4b46011-7c74-f046-782e-d712e1ab','B06VX413N3','Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','COMPLETED','02-10-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',925,'3979 DEERGRASS CIR','--',95677,'ROCKLIN','94203',1080191320,'LateSentEta'),
	(425,'0000-00-00 00:00:00','112-3048266-3807429','acb45fb0-8e56-de45-39b2-8db711b8','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-08-2019','11:00:00','14:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'2416 BONAR ST','--',94702,'BERKELEY','San Francisco Bay Area',2007766230,'LateSentEta'),
	(426,'0000-00-00 00:00:00','114-6656580-1596255','86b45e2b-c09c-cade-c92e-69fc69d6','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-11-2019','11:00:00','14:00:00','114-8826160-9406615','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'808 DONAHUE ST','--',95401,'SANTA ROSA','35 miles radius around 94590',1893740040,'--'),
	(427,'0000-00-00 00:00:00','113-0406569-8630633','beb45e21-fd13-b706-672d-bc6d9d66','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-10-2019','14:00:00','17:00:00','113-3479742-9814628','B00YUPDW0Q','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'102 LEAFIELD RD','--',94506,'DANVILLE','35 miles radius around 94590',711158351,'--'),
	(428,'0000-00-00 00:00:00','112-7037673-6985854','fcb45e17-239f-5eff-4125-97dbff01','B01M9E5IBJ','Handyman Services - 2 Hours - Inside - No Ladder','COMPLETED','02-14-2019','08:00:00','11:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',916,'5224 HIDDEN LN','--',95819,'SACRAMENTO','94203',1173398591,'--'),
	(429,'0000-00-00 00:00:00','113-0619140-8584221','8cb469d3-07b8-c798-b44b-ab44c6e9','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-10-2019','08:00:00','11:00:00','113-1001983-6102665','B07H42GX6M','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1577 45th Ave','--',94122,'San Francisco','Marin County',2143898,'--'),
	(430,'0000-00-00 00:00:00','111-8711616-1644259','78b45da7-2546-1357-53be-c3578936','B06WGSP17V','Leaky Faucet Repair','COMPLETED','02-12-2019','08:00:00','11:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1163 TENNESSEE ST','--',94107,'SAN FRANCISCO','Marin County',2147483647,'LateSentEta'),
	(431,'0000-00-00 00:00:00','112-5265211-2481034','04b45d18-4ba0-5f2d-a0a3-c53de215','B071XVGL49','Toilet Fill Valve Replacement','COMPLETED','02-09-2019','11:00:00','14:00:00','112-4296666-8807430|112-4296666-8807430','B0097CVGWI|B00578RKB','PLUMBING_FIXTURE|PLUMBING_FIXTURE',1,'NotDelivered|NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',925,'4482 Barberry Court','--',94521,'Concord','35 miles radius around 94590',169734537,'LateSentEta'),
	(432,'0000-00-00 00:00:00','114-3121991-4865869','b2b45ad8-aee1-7a57-6297-cbfefb51','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-09-2019','08:00:00','11:00:00','114-0272738-9667460','B008JA2X5S','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'3621 EVERGREEN RD','--',95405,'SANTA ROSA','Marin County',27908422,'--'),
	(433,'0000-00-00 00:00:00','112-6977237-8527464','54b45a48-0f9b-1933-2f87-646eca2a','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-12-2019','17:00:00','20:00:00','112-6986291-6866617','B00573S4QM','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'274 BUTTERFIELD RD','--',94960,'SAN ANSELMO','CA - Marin County',15489258,'--'),
	(434,'0000-00-00 00:00:00','112-9693887-8669808','76b45a13-8d04-1ec4-dd50-7645c740','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-08-2019','11:00:00','14:00:00','112-6279875-2415407','B07BDPDZWD','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'127 HEARTFORD WAY','--',94503,'AMERICAN CANYON','Marin County',228402641,'--'),
	(435,'0000-00-00 00:00:00','112-3575175-4304212','acb45a09-f5a6-be78-a602-547220e3','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-08-2019','08:00:00','11:00:00','112-8873482-1085864','B00F74RX40','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',707,'3422 FIR DR','--',95405,'SANTA ROSA','Marin County',1932130340,'LateSentEta'),
	(436,'0000-00-00 00:00:00','113-7895647-0125805','ecb459bb-a095-701f-3e5c-4616b9e8','B00OK5PIXA','Mailbox Installation - Wall Mounted - Replacement','COMPLETED','02-10-2019','14:00:00','17:00:00','113-6334299-3089024','B01DX1TORC','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'23 BISHOP PINE LN','--',94803,'EL SOBRANTE','San Francisco Bay Area',668911196,'--'),
	(437,'0000-00-00 00:00:00','111-7438646-1603432','fcb45883-1276-6cb7-99e7-0e7a8b0b','B01M27P73B','Handyman Services - 3 Hours - Inside - No Ladder','COMPLETED','02-06-2019','17:00:00','20:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1372 SPRUCE ST','--',94579,'SAN LEANDRO','35 miles radius around 94590',2147483647,'LateSentEta'),
	(438,'0000-00-00 00:00:00','114-0623715-4667468','36b45863-d114-a7fe-c01e-3ce95660','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-08-2019','14:00:00','17:00:00','114-9736628-8552257','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',650,'3705 BEARTOOTH LN E','--',94558,'NAPA','35 miles radius around 94590',2147483647,'--'),
	(439,'0000-00-00 00:00:00','113-8632720-1674669','1ab4568b-b74b-bcbe-b6ad-f506602d','B01M6V9DS8','Bed Assembly - Murphy Bed','COMPLETED','02-11-2019','08:00:00','11:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1189 18th Ave','--',94063,'REDWOOD CITY','35 miles radius around 94590',1369381351,'--'),
	(440,'0000-00-00 00:00:00','113-0773478-6503421','6cb455fc-dab6-9aef-f6b6-43250077','B00STOHS18','Office Chair Assembly - 1 Chair','COMPLETED','02-09-2019','14:00:00','17:00:00','113-0840100-0809810','B07DZCK7K4','CHAIR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'2400 SONOMA ST','--',94558,'NAPA','35 miles radius around 94590',2147483647,'LateSentEta|LateStart'),
	(441,'0000-00-00 00:00:00','113-8125759-8784221','12b4559d-ec73-4115-9c88-a59ef704','B01M9E5IBJ','Handyman Services - 2 Hours - Inside - No Ladder','COMPLETED','02-04-2019','17:00:00','20:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'43 DEARBORN ST','--',94110,'SAN FRANCISCO','San Francisco',584572710,'--'),
	(442,'0000-00-00 00:00:00','112-1093632-6224202','e6b453b2-2c95-589f-4646-49fa5a2b','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-04-2019','11:00:00','14:00:00','112-0072786-1750674','B0765JNS2D','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'3352 WASHINGTON ST','--',94118,'SAN FRANCISCO','Marin County',2147483647,'--'),
	(443,'0000-00-00 00:00:00','113-5019811-0525831','b2b45372-7030-b78e-d7a3-ccb96ef9','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','COMPLETED','02-15-2019','08:00:00','11:00:00','113-4544465-2477865','B07FB11KYG','AUTO_ACCESSORY',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'922 VISTA POINTE DR','--',94582,'SAN RAMON','35 miles radius around 94590',1606606440,'--'),
	(444,'0000-00-00 00:00:00','111-4390543-2868209','86b45288-2a26-358e-4b4b-c9207ed8','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-06-2019','14:00:00','17:00:00','111-6997856-7306600','B0765JNS2D','HARDWARE',2,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2067698966,'848 BATTERY ST','--',94111,'SAN FRANCISCO','San Francisco Bay Area',2147483647,'--'),
	(445,'0000-00-00 00:00:00','112-1268153-5240246','0eb45013-a0a2-ab22-9560-b84703de','B01ETS3DLQ','Storage Cabinet Assembly','COMPLETED','02-12-2019','11:00:00','14:00:00','112-2545431-3829869','B0072MZOJ6','PLUMBING_FIXTURE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'1012 LOS GAMOS RD APT F','--',94903,'SAN RAFAEL','35 miles radius around 94590',2147483647,'LateSentEta'),
	(446,'0000-00-00 00:00:00','111-1156877-3765062','62b45324-7d3e-fed8-5c27-93977ec4','B00STRWY0A','Dresser Assembly - Wardrobe/Armoire','COMPLETED','02-02-2019','17:00:00','20:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'771 54TH ST','--',94609,'OAKLAND','35 miles radius around 94590',2147483647,'--'),
	(447,'0000-00-00 00:00:00','113-9761230-7256215','72b44e3c-bea1-14ad-2edb-abcb5fbe','B071XVGJ3Q','Magnetic Knife Strip Installation - Wall Mounted','COMPLETED','02-04-2019','14:00:00','17:00:00','113-6615928-6005802','B00JF2QZK8','KITCHEN',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',312,'1330 MADRONA AVE','--',94574,'SAINT HELENA','35 miles radius around 94590',23476118,'--'),
	(448,'0000-00-00 00:00:00','111-0566455-0473825','b8b44e1a-5b49-035d-af8a-383d9326','B00STOHXWC','Treadmill Assembly','COMPLETED','02-02-2019','11:00:00','14:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'84 KING AVE','--',94611,'PIEDMONT','Marin County',64349194,'LateSentEta|LateStart'),
	(449,'0000-00-00 00:00:00','112-4268662-8721869','60b44c1c-bac1-62d9-eff1-ed84502d','B01MG21IQT','Handyman Services - 8 Hours - Inside - Step Ladder','COMPLETED','02-03-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'2134 KNOX AVE','--',94565,'PITTSBURG','35 miles radius around 94590',2147483647,'LateSentEta'),
	(450,'0000-00-00 00:00:00','112-4758127-6798606','32b44ae9-2f85-503a-4751-9d024b9c','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-04-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',707,'744 SUNNYSIDE RD','--',94574,'SAINT HELENA','35 miles radius around 94590',789511321,'--'),
	(451,'0000-00-00 00:00:00','112-5750446-8096269','f8b44ae3-a761-c7d6-1e2a-12009586','B00TX97DKO','Gazebo Assembly - On the Lawn','COMPLETED','02-06-2019','08:00:00','11:00:00','112-8669407-8281043','B077XQW4Z7','OUTDOOR_LIVING',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'2730 BRYANT ST 1ST FLOOR','--',94110,'SAN FRANCISCO','Marin County',2147483647,'LateSentEta'),
	(452,'0000-00-00 00:00:00','113-1205574-8834651','3cb4490c-b22a-02a5-cdff-03da88bd','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-05-2019','11:00:00','14:00:00','113-6358009-1175467','B0758L67KP','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'118 VIENNA ST','--',94112,'SAN FRANCISCO','Marin County',2061813431,'--'),
	(453,'0000-00-00 00:00:00','113-2609986-1414647','96b448cf-3286-165f-cd17-8fda8929','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-06-2019','11:00:00','14:00:00','113-0630519-0522622','B077GSJJ8D','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'740 ROLLING GREEN DR','--',94571,'RIO VISTA','San Francisco Bay Area',533483971,'LateSentEta'),
	(454,'0000-00-00 00:00:00','114-1556239-0736227','5eb4483f-4562-9793-e4ea-31d1da3a','B00STRX7OW','TV Stand or Media Storage Assembly - TV Stand','COMPLETED','01-31-2019','08:00:00','11:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'441 WOOD HOLLOW DR','--',94945,'NOVATO','35 miles radius around 94590',1846726710,'--'),
	(455,'0000-00-00 00:00:00','111-5657759-8537006','b6b446e7-b01f-d846-533c-f027724c','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-06-2019','11:00:00','14:00:00','111-2513057-7505038','B0758L67KP','HARDWARE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'855 POMONA AVE','--',94530,'EL CERRITO','Marin County',1273421220,'--'),
	(456,'0000-00-00 00:00:00','112-3490630-9652243','78b44697-ea5b-b425-7647-989bde57','B06VX42J63','Garage Wall Shelf Installation - Up to 8 Feet - 2 Units','COMPLETED','02-09-2019','14:00:00','17:00:00','112-9535307-2625047|112-9535307-2625047','B07DRDX8CC|B07DRG7ZG','HOME|HOME',1,'NotDelivered|NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'667 Bamboo Terrace','--',94903,'San Rafael','Marin County',2017369520,'--'),
	(457,'0000-00-00 00:00:00','114-8641672-3556204','e8b44666-ad29-1d63-8239-21d8c454','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-02-2019','11:00:00','14:00:00','114-9358470-5901015','B075CQDW9M','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'15 Piedmont Rd.','--',94939,'Larkspur','35 miles radius around 94590',1423191350,'--'),
	(458,'0000-00-00 00:00:00','114-5314132-4635410','1cb44631-1a8a-8638-6eb9-6643e456','B06ZXY1D22','Curtain Rod Installation - Drywall - 3 Curtain Rods','COMPLETED','02-01-2019','08:00:00','11:00:00','114-9622975-1751438|114-9622975-1751438','B00DB1HR5Q|B00DB1HR6','HOME|HOME',1,'NotDelivered|NotDelivered','Eric Flint-A1VGPOC5WLXTK6',510,'701 BANKS DR','--',94806,'SAN PABLO','35 miles radius around 94590',757981221,'--'),
	(459,'0000-00-00 00:00:00','111-5545631-6914647','0ab445fd-f31f-71c7-6630-6dcaef8a','B00T1HBYFS','Grill Assembly - 2 or 3 burners','COMPLETED','01-31-2019','14:00:00','17:00:00','111-8987238-6753859','B077JTCMKR','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'31 VOLKER CT','--',94574,'SAINT HELENA','35 miles radius around 94590',261177257,'LateSentEta'),
	(460,'0000-00-00 00:00:00','113-1328215-7230608','1cb445df-e7de-2d24-17f8-795baf44','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','01-31-2019','14:00:00','17:00:00','113-6258537-0028205','B072C3K6ZQ','SURVEILANCE_SYSTEMS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',415,'360 ARLINGTON ST','--',94131,'SAN FRANCISCO','Marin County',395248977,'LateSentEta|ProviderReschedule'),
	(461,'0000-00-00 00:00:00','111-3012086-9425006','b4b445a2-e434-c45b-e8ba-06aa279e','B06W2N7KLK','Glass Shower Door Installation - First Time','COMPLETED','02-14-2019','14:00:00','17:00:00','111-1042382-0427406','B078TMMK75','PLUMBING_FIXTURE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'6 WILDWOOD CT','--',94015,'DALY CITY','San Francisco',388233557,'--'),
	(462,'0000-00-00 00:00:00','111-8585619-5264236','c4b4459d-ccfd-216f-376e-eceae73f','B01M6V9DS8','Bed Assembly - Murphy Bed','COMPLETED','02-02-2019','08:00:00','11:00:00','111-8562865-6440262','B079QRQT54','BED',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3961 SHAKER RUN CIR','--',94533,'FAIRFIELD','35 miles radius around 94590',71323191,'LateSentEta'),
	(463,'0000-00-00 00:00:00','112-7801950-0776226','74b44436-6362-50de-424a-a39271ed','B06X6JS7XZ','Faucet Mounted Water Filter Installation','COMPLETED','01-29-2019','14:00:00','17:00:00','112-2999270-3038630','B00910U03W','PLUMBING_FIXTURE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'903 Vermont St','--',94610,'Oakland','35 miles radius around 94590',125097691,'--'),
	(464,'0000-00-00 00:00:00','114-1320493-0470604','bab43e01-6aca-3f66-558e-4b056652','B00UBYCKCG','Furniture Assembly - 2 hours','COMPLETED','01-26-2019','11:00:00','14:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'920 BRODERICK ST','--',94115,'SAN FRANCISCO','35 miles radius around 94590',1200718556,'LateSentEta'),
	(465,'0000-00-00 00:00:00','113-1077190-3485860','3ab43dbf-dd8e-20f3-ee1d-5cb5b314','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','01-29-2019','11:00:00','14:00:00','113-5477426-0871465','B002JB40MC','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'375 GARFIELD PARK AVE','--',95409,'SANTA ROSA','San Francisco Bay Area',1473639060,'LateSentEta'),
	(466,'0000-00-00 00:00:00','113-0393617-4991406','e2b43c42-63fc-70b4-2f7d-48d480f4','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','COMPLETED','02-02-2019','11:00:00','14:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3405 STEWARTON DR','--',94803,'RICHMOND','35 miles radius around 94590',2147483647,'LateSentEta'),
	(467,'0000-00-00 00:00:00','114-0156505-4530675','96b439ec-d795-1811-b7d1-22fb1998','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','01-25-2019','08:00:00','11:00:00','114-2200116-3769839','B002CVU2HG','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'107 LARK CT','--',94947,'NOVATO','Marin County',1177074351,'LateSentEta'),
	(468,'0000-00-00 00:00:00','114-9554472-3624200','48b4391c-158e-2cdb-0e2f-066f9218','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','COMPLETED','01-26-2019','08:00:00','11:00:00','114-2578377-8397023','B01ISFD16I','AUTO_ACCESSORY',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',510,'23 Whitehall Dr','--',94563,'Orinda','35 miles radius around 94590',1635443220,'LateSentEta'),
	(469,'0000-00-00 00:00:00','114-9521578-4917006','b2b438ee-450d-14b9-33c9-eb489323','B00STOHS18','Office Chair Assembly - 1 Chair','COMPLETED','01-26-2019','08:00:00','11:00:00','114-2718855-7632228','B07J5YT2R1','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'24 VIA FLOREADO','--',94563,'ORINDA','San Francisco Bay Area',1572979061,'LateSentEta'),
	(470,'0000-00-00 00:00:00','114-7645322-2893028','06b4374e-1785-d5d6-0b61-4520ecf1','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','01-28-2019','08:00:00','11:00:00','114-4876336-3082602','B00CM9CBZY','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',0,'4881 FAIRGRAVE AVE','--',95407,'SANTA ROSA','Marin County',536291941,'LateSentEta'),
	(471,'0000-00-00 00:00:00','113-2184750-8695437','9cb43467-0df1-4355-c0dc-fdb63d75','B01MG23CWS','Handyman Services - 2 Hours - Inside - Extension Ladder','COMPLETED','01-22-2019','17:00:00','20:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1695 15TH ST APT 9','--',94607,'OAKLAND','San Francisco',76852,'LateSentEta'),
	(472,'0000-00-00 00:00:00','114-8590260-8070664','dcb4342b-ce6f-778a-e2f3-18ba1e6f','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','01-24-2019','11:00:00','14:00:00','114-8901541-4457054','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'32250 County Road 14','--',95698,'Zamora','94203',2147483647,'LateSentEta'),
	(473,'0000-00-00 00:00:00','113-6862198-5298644','c0b433e9-4fb7-c35c-6014-a9517a91','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','01-31-2019','11:00:00','14:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'65 BRIDGEGATE DR','--',94903,'SAN RAFAEL','San Francisco Bay Area',711192396,'LateSentEta'),
	(474,'0000-00-00 00:00:00','114-2746054-6294606','6ab4318c-f8d0-486f-1600-faa1ac96','B00STRXAQM','Bookcase Assembly - 3 to 5 Shelves','COMPLETED','01-31-2019','08:00:00','11:00:00','114-5215539-7066605','B07C1RW58G','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'311 CORNWALL ST APT # 2','--',94118,'SAN FRANCISCO','Marin County',29600920,'--'),
	(475,'0000-00-00 00:00:00','111-5502164-4798616','7ab43132-c45b-8865-00f0-49db9298','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','01-25-2019','08:00:00','11:00:00','111-4426749-3823460','B005OU4E1M','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'524 JADE ST','--',94952,'PETALUMA','35 miles radius around 94590',2147483647,'LateSentEta|LateStart'),
	(476,'0000-00-00 00:00:00','113-3905137-2209840','aeb4311c-ee34-9ce4-5bdf-95c84617','B016YP7UNE','Garbage Disposal Repair','COMPLETED','01-22-2019','14:00:00','17:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'655 12TH ST APT 206','--',94607,'OAKLAND','Marin County',1174043586,'--'),
	(477,'0000-00-00 00:00:00','111-2223395-0605036','eab42f78-8ebe-dc64-25b6-ba6465c1','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','01-21-2019','08:00:00','11:00:00','111-1930040-1260210','B00NOATY4Q','HARDWARE',2,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'2261 TUOLUMNE ST APT 268','--',94589,'VALLEJO','San Francisco Bay Area',1343545801,'LateSentEta|LateStart'),
	(478,'0000-00-00 00:00:00','112-7843311-6746656','7cb42eb4-2f90-1e7a-c529-9bec2be1','B00WT8AP9W','Rowing Machine Assembly','COMPLETED','01-26-2019','14:00:00','17:00:00','112-8756264-1947403','B017HSNIEW','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',707,'56 Wild Rye Way','--',94558,'Napa','Marin County',425763070,'--'),
	(479,'0000-00-00 00:00:00','112-8433059-1470609','88b42e9f-da27-3f57-8039-8bbd545d','B00STOHR28','Hutch Assembly','COMPLETED','01-23-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3287 CONGRESSIONAL CT','--',94534,'FAIRFIELD','San Francisco Bay Area',2147483647,'LateSentEta'),
	(480,'0000-00-00 00:00:00','112-2879805-6601840','b2b4818e-fa9b-2583-8fd1-02032099','B00UBYECF4','Rocking Chair or Glider Assembly','NOT_SERVICED','02-23-2019','08:00:00','11:00:00','112-1929031-3761815','B075T5R99X','BABY_PRODUCT',1,'NotDelivered','--',415,'1239 B ST','--',94952,'PETALUMA','Marin County',751377911,'--'),
	(481,'0000-00-00 00:00:00','114-6379010-9389048','e0b4816a-d515-49f6-e84b-3eaa9ff9','B00TSTR2QE','Exercise Bike Assembly','NOT_SERVICED','02-23-2019','14:00:00','17:00:00','114-3768119-0918607','B014VX254A','SPORTING_GOODS',1,'NotDelivered','--',707,'2077 Sea Way','--',94923,'Bodega Bay','35 miles radius around 94590',112362371,'--'),
	(482,'0000-00-00 00:00:00','113-6411356-2570621','32b480b6-6dd8-1113-0b93-f40acad7','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','NOT_SERVICED','04-04-2019','08:00:00','11:00:00','113-0181388-7805044','B074J8DRM2','AUTO_ACCESSORY',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'155 WOODWARD AVE','--',94965,'SAUSALITO','San Francisco',349296570,'--'),
	(483,'0000-00-00 00:00:00','112-6166876-8825854','72b47efd-d3d3-26b1-a4a6-502c19ff','B00STOHR28','Hutch Assembly','NOT_SERVICED','02-24-2019','08:00:00','11:00:00','112-0687697-2220253','B01HG92NUM','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'351 Palm Avenue','--',94030,'Millbrae','35 miles radius around 94590',712864986,'--'),
	(484,'0000-00-00 00:00:00','112-1751879-3608210','56b47ed0-9c8f-2d9b-79bb-a50093a5','B01M9E5IBJ','Handyman Services - 2 Hours - Inside - No Ladder','NOT_SERVICED','02-20-2019','14:00:00','17:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',415,'1998 BROADWAY APT 1503','--',94109,'SAN FRANCISCO','35 miles radius around 94590',469383591,'--'),
	(485,'0000-00-00 00:00:00','111-4854427-6488227','0cb47ebd-eb0d-8cb5-c12f-1c9a7c45','B01JJQTH4A','Door Replacement - Front Door - Single Door - Pre-hung','CANCELLED','--','00:00:00','00:00:00','--','--','--',0,'--','--',2147483647,'2443 greenwich street','--',94123,'SAN FRANCISCO','35 miles radius around 94590',2467690,'--'),
	(486,'0000-00-00 00:00:00','113-0421731-1899447','c4b47eb7-0192-9f3d-25b3-b824e777','B071XVGL49','Toilet Fill Valve Replacement','NOT_SERVICED','02-26-2019','11:00:00','14:00:00','113-8519614-2807409','B0097CVGWI','PLUMBING_FIXTURE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'227 26TH AVE B','--',94121,'SAN FRANCISCO','35 miles radius around 94590',849265686,'--'),
	(487,'0000-00-00 00:00:00','113-6946028-5419405','28b47ea9-04e6-b83b-1c47-14162fc7','B00IAD0NQU','Garage Door Opener Replacement','NOT_SERVICED','02-20-2019','14:00:00','17:00:00','113-4489027-0602638','B07H4BGWXX','HARDWARE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'336 N MILL VALLEY DR','--',95391,'MOUNTAIN HOUSE','35 miles radius around 94590',767646410,'--'),
	(488,'0000-00-00 00:00:00','113-7949744-0243423','c6b47e7e-e8c5-bfcb-d4d3-7e7e8152','B00TSTR2QE','Exercise Bike Assembly','NOT_SERVICED','02-22-2019','11:00:00','14:00:00','113-2338935-3010646','B002JB40MC','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',707,'7070 ALMOND ST','--',94928,'ROHNERT PARK','35 miles radius around 94590',21247381,'--'),
	(489,'0000-00-00 00:00:00','112-7972503-6075446','a0b47df6-48e3-56c5-f993-bf92ec35','B00STRX08U','Table Assembly - Coffee Table','NOT_SERVICED','03-05-2019','11:00:00','14:00:00','112-9720128-1852216','B07BJ8YJH4','TABLE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'11 ACAPULCO CT','--',94949,'NOVATO','San Francisco Bay Area',289811161,'--'),
	(490,'0000-00-00 00:00:00','114-9756649-9605864','20b47df1-3938-4acc-1f8c-9d3fe6c4','B00TSTR2QE','Exercise Bike Assembly','NOT_SERVICED','03-09-2019','08:00:00','11:00:00','114-5809244-3692252','B00LSX8AA0','SPORTING_GOODS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',707,'29 IVERSON WAY','--',94952,'PETALUMA','35 miles radius around 94590',850641890,'--'),
	(491,'0000-00-00 00:00:00','113-3573744-2585846','e6b47cbd-40dc-b348-a4c8-d4590e07','B00IAD0LLW','Deadbolt Installation - Wood Door','CANCELLED','--','00:00:00','00:00:00','--','--','--',0,'--','--',2147483647,'106 FERN ST','--',94109,'SAN FRANCISCO','35 miles radius around 94590',540407910,'--'),
	(492,'0000-00-00 00:00:00','114-8608027-5065814','54b47c87-2a21-354f-2d2b-9127abc6','B01JKAWADU','Roof Rack Installation - At-Home - Rack Only','NOT_SERVICED','02-24-2019','14:00:00','17:00:00','114-3530035-8794638','B00FYYDDWE','AUTO_ACCESSORY',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'77 NORTHCREST DR','--',94080,'SOUTH SAN FRANCISCO','Marin County',689025741,'--'),
	(493,'0000-00-00 00:00:00','113-7951795-0724226','7eb47c5c-9dbc-097e-e33c-4d3b4790','B071RD9CCS','Automotive Seat Cover Installation','NOT_SERVICED','02-28-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'1079 MOHR LN A4','--',94518,'CONCORD','35 miles radius around 94590',2147483647,'--'),
	(494,'0000-00-00 00:00:00','114-0390919-7007461','64b47bf3-5a05-9694-3849-e4f1e4b9','B00IAD0LLW','Deadbolt Installation - Wood Door','NOT_SERVICED','02-21-2019','11:00:00','14:00:00','114-5444515-2409004','B07GTDFQZS','HARDWARE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'27 WATERBURY LN','--',94949,'NOVATO','San Francisco Bay Area',62161,'--'),
	(495,'0000-00-00 00:00:00','112-3476821-4213830','24b47a29-be8b-6e78-face-a73ad15d','B00IAD0LLW','Deadbolt Installation - Wood Door','NOT_SERVICED','02-21-2019','08:00:00','11:00:00','112-6230467-1985815','B007X5SXHC','HARDWARE',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'231 12TH AVE','--',94118,'SAN FRANCISCO','Marin County',464550450,'--'),
	(496,'0000-00-00 00:00:00','111-4320364-5248207','9ab47a25-b127-01ea-9b7d-53046ed7','B01BO2TLUC','Storage Bench Assembly','NOT_SERVICED','03-08-2019','11:00:00','14:00:00','111-9822300-2240254','B0779C95ZK','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',707,'1606 FAIR WAY','--',94515,'CALISTOGA','35 miles radius around 94590',2147483647,'--'),
	(497,'0000-00-00 00:00:00','114-0503659-8884257','74b479ca-a438-3ea6-e212-a93423f9','B06WGSP17V','Leaky Faucet Repair','NOT_SERVICED','02-19-2019','14:00:00','17:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'5566 MORAGA AVE','--',94611,'OAKLAND','35 miles radius around 94590',1954078281,'--'),
	(498,'0000-00-00 00:00:00','114-8876954-8284239','5ab4799b-89aa-a2c5-c4e1-2d77e95a','B00STOHXWC','Treadmill Assembly','NOT_SERVICED','02-19-2019','17:00:00','20:00:00','114-1767030-9897031','B0193V3DJ6','TREADMILL',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1046 LINDSEY CT','--',94549,'LAFAYETTE','Marin County',2147483647,'--'),
	(499,'0000-00-00 00:00:00','111-6466968-3921021','40b47957-5fb8-d1bf-01af-b1ef7b05','B01ETS3EJM','Storage Shed Assembly','NOT_SERVICED','02-20-2019','08:00:00','11:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'50 NOTRE DAME PL','--',94002,'BELMONT','35 miles radius around 94590',348111220,'--'),
	(500,'0000-00-00 00:00:00','113-2236076-2750644','b2b476fb-53c4-463c-5622-95c8e696','B01JQLXHL2','Child Changing Table Installation','NOT_SERVICED','02-21-2019','11:00:00','14:00:00','113-6238919-6451455','B00AQNT36S','EDUCATIONAL_SUPPLIES',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'832 FOLSOM ST 8TH FLOOR','--',94107,'SAN FRANCISCO','San Francisco',2147483647,'--'),
	(501,'0000-00-00 00:00:00','114-3419655-1821042','22b474cb-efcc-d389-ad83-08bb1922','B01CFCGM7U','Mailbox Installation - Post Mounted - First-Time Installation','COMPLETED','02-17-2019','11:00:00','14:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',510,'3136 PASEO GRANADA','--',94566,'PLEASANTON','35 miles radius around 94590',50840234,'--'),
	(502,'0000-00-00 00:00:00','111-6010663-7010636','c0b4739c-2faa-3439-ed6f-f0be2f7d','B00STOHPMU','Elliptical Assembly','NOT_SERVICED','03-03-2019','14:00:00','17:00:00','111-0861755-5914642','B00LJWR772','SPORTING_GOODS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'675 Cole St apt 3','--',94117,'San Francisco','Marin County',132474800,'--'),
	(503,'0000-00-00 00:00:00','113-1032634-7121844','08b47273-8d56-830e-4f11-21a54998','B00UBYCN28','Furniture Assembly - 3 hours','COMPLETED','02-16-2019','11:00:00','14:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1187 SCOTS LN','--',94596,'WALNUT CREEK','Marin County',1779209811,'--'),
	(504,'0000-00-00 00:00:00','112-8384385-9762648','c0b47251-33ab-17af-825f-c812ff23','B01JJQV73O','Grab Bar Installation - Tile','COMPLETED','02-18-2019','14:00:00','17:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'38162 WOODRUFF DR','--',94560,'NEWARK','35 miles radius around 94590',926780711,'--'),
	(505,'0000-00-00 00:00:00','113-7536586-7449055','3eb471b6-b506-d9a1-9b52-c8795dd6','B071XVGL49','Toilet Fill Valve Replacement','CANCELLED','--','00:00:00','00:00:00','--','--','--',0,'--','--',415,'616 Parisio Circle','--',94534,'Fairfield','35 miles radius around 94590',1413212891,'--'),
	(506,'0000-00-00 00:00:00','112-9642975-0333032','56b4719f-0d18-e7c8-1b5d-ec598b44','B00UBYCOV8','Furniture Assembly - 4 hours','COMPLETED','02-15-2019','17:00:00','20:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'2952 BELLA DR','--',94519,'CONCORD','Marin County',1788213620,'--'),
	(507,'0000-00-00 00:00:00','113-0291415-8834649','dab4719c-4367-d5a4-349f-b8fdc748','B01L2YQNFI','Toilet Replacement (Commercial)','CANCELLED','--','00:00:00','00:00:00','113-2436909-3941824','B00FX3YM1C','PLUMBING_FIXTURE',1,'NotDelivered','--',650,'336 MIRAMONTES AVE','--',94019,'HALF MOON BAY','35 miles radius around 94590',881835056,'--'),
	(508,'0000-00-00 00:00:00','114-7125913-4572224','54b4702f-70e3-9848-533b-aab32f46','B012TXC7B0','Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More','COMPLETED','02-16-2019','11:00:00','14:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'1515 15TH ST APT 505','--',94103,'SAN FRANCISCO','35 miles radius around 94590',840477140,'--'),
	(509,'0000-00-00 00:00:00','111-8287686-3781048','9cb46fa9-4cb9-f586-a05d-8c809878','B00TSTR2QE','Exercise Bike Assembly','CANCELLED','--','00:00:00','00:00:00','111-4070175-5707458','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','--',707,'990 SUNSET DR','--',95448,'HEALDSBURG','35 miles radius around 94590',1020234991,'--'),
	(510,'0000-00-00 00:00:00','114-6403500-1173017','60b46d5a-4d2c-f0ee-9121-8c052ff3','B01CFCGM7U','Mailbox Installation - Post Mounted - First-Time Installation','CANCELLED','--','00:00:00','00:00:00','114-6486058-7878606','B074WQ1NV1','HARDWARE',1,'Delivered','--',510,'3136 PASEO GRANADA','--',94566,'PLEASANTON','35 miles radius around 94590',50840234,'--'),
	(511,'0000-00-00 00:00:00','111-0779493-5357803','0ab46d4a-da48-9349-087b-417e386c','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-17-2019','11:00:00','14:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'21 Bud Ct','--',94523,'Pleasant Hill','San Francisco Bay Area',1136352980,'--'),
	(512,'0000-00-00 00:00:00','113-5195961-0749818','eeb46d30-4918-ffd2-c877-6b83d02c','B00STRX6AC','TV Stand or Media Storage Assembly - Media Cabinet','COMPLETED','02-16-2019','08:00:00','11:00:00','113-9555714-3294639|113-9555714-3294639','B015Q0JXX8|B000NPQKU','HOME_FURNITURE_AND_DECOR|HOME_FURNITURE_AND_DECOR',1,'NotDelivered|NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'1125 COWAN LN','--',95448,'HEALDSBURG','35 miles radius around 94590',750356291,'--'),
	(513,'0000-00-00 00:00:00','112-6817605-1168224','92b46cfa-18bf-6bc2-f3c0-bf7c844e','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-16-2019','11:00:00','14:00:00','112-7529414-5625852','B004O6TXVS','SPORTING_GOODS',1,'NotDelivered','Joshua Hennagin-A32BDXSGWDJRPY',707,'4733 TARTON DR','--',95405,'SANTA ROSA','San Francisco Bay Area',1001332,'--'),
	(514,'0000-00-00 00:00:00','112-6715531-2377018','8eb46ad8-89f8-3f65-51e9-92ebfa3d','B00STOHWSM','Home Gym Assembly','COMPLETED','02-16-2019','08:00:00','11:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'3681 BRIDLEWOOD WAY','--',95747,'ROSEVILLE','94203',1099601191,'--'),
	(515,'0000-00-00 00:00:00','112-0269621-6967444','38b46a61-1df1-b28f-5cae-89804eec','B00IAD0NQU','Garage Door Opener Replacement','NOT_SERVICED','02-24-2019','08:00:00','11:00:00','112-0087185-0725075','B0071JJBOE','HARDWARE',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3107 GUADALAJARA WAY','--',95833,'SACRAMENTO','94203',2147483647,'--'),
	(516,'0000-00-00 00:00:00','111-9281418-1098652','3ab4685e-57b6-36be-27a5-0d29e8aa','B00TX97DKO','Gazebo Assembly - On the Lawn','NOT_SERVICED','02-24-2019','11:00:00','14:00:00','111-4790628-9484240','B07M9PQFL8','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'1681 31st Avenue','--',94122,'San Francisco','Marin County',1237182030,'--'),
	(517,'0000-00-00 00:00:00','112-9343665-6265850','12b467f2-46a7-148d-9342-5728db53','B00T1HBZDE','Grill Assembly - 4 or 5 burners','COMPLETED','02-18-2019','08:00:00','11:00:00','112-5680200-7013036','B002BCSX0Y','OUTDOOR_LIVING',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'1123 VINTAGE GREENS DR','--',95492,'WINDSOR','35 miles radius around 94590',1958449651,'--'),
	(518,'0000-00-00 00:00:00','113-6397731-2865833','b6b467cf-dfc5-ae65-cb74-4c49035c','B00STOHR28','Hutch Assembly','COMPLETED','02-18-2019','08:00:00','11:00:00','113-9052336-2684229','B01M8MW5UO','HOME_FURNITURE_AND_DECOR',1,'Delivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'463 AVIATION BLVD','--',95403,'SANTA ROSA','35 miles radius around 94590',1267837360,'--'),
	(519,'0000-00-00 00:00:00','113-8634078-0042669','74b46622-bd81-d132-e590-1a652ffb','B00TSTR2QE','Exercise Bike Assembly','COMPLETED','02-18-2019','11:00:00','14:00:00','113-2380028-3559460','B072JHYQGC','SPORTING_GOODS',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'9 PIN OAK PL','--',95409,'SANTA ROSA','35 miles radius around 94590',1208395221,'--'),
	(520,'0000-00-00 00:00:00','113-0475607-9701804','44b46359-3223-8060-9760-da9c566f','B00STOHWSM','Home Gym Assembly','NOT_SERVICED','02-19-2019','14:00:00','17:00:00','--','--','--',0,'--','Eric Flint-A1VGPOC5WLXTK6',2147483647,'31 DUNEDIN DR','--',94513,'BRENTWOOD','CA - Contra Costa County',2147483647,'--'),
	(521,'0000-00-00 00:00:00','112-9656505-0909860','b8b4629b-1b0a-e543-8556-402d2dda','B00TSTR2QE','Exercise Bike Assembly','CANCELLED','--','00:00:00','00:00:00','112-7728319-6274608','B01MS7EWR9','SPORTING_GOODS',1,'NotDelivered','--',415,'1150 SACRAMENTO ST APT 102','--',94108,'SAN FRANCISCO','CA - San Francisco County',989305211,'--'),
	(522,'0000-00-00 00:00:00','111-5767197-1045864','6ab46257-dfba-53fa-20f7-adcc2f98','B00IAD0LLW','Deadbolt Installation - Wood Door','CANCELLED','--','00:00:00','00:00:00','111-4493035-5295466','B00F5BEC8U','MECHANICAL_COMPONENTS',1,'NotDelivered','--',2147483647,'1333 BROADWAY STE 1016','--',94612,'OAKLAND','CA - Alameda County',127548950,'--'),
	(523,'0000-00-00 00:00:00','112-3497891-4415451','24b45d9e-f5c7-e7cd-ce21-e0cf0e8d','B00STRWW8Y','Dresser Assembly - Dresser','NOT_SERVICED','02-19-2019','14:00:00','17:00:00','112-4941261-6279465','B00534LJ9O','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',0,'740 FRANCISCO ST','--',94133,'SAN FRANCISCO','San Francisco Bay Area',759777821,'--'),
	(524,'0000-00-00 00:00:00','114-0284995-5325052','22b45d83-d383-55b9-6cb0-79427c6f','B01JJQWSVO','Security Safe Installation - Wall Anchored','COMPLETED','02-18-2019','11:00:00','14:00:00','114-7375013-5819418','B018X5MM5E','SECURITY_ELECTRONICS',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',408,'38800 HASTINGS ST APT 76','--',94536,'FREMONT','35 miles radius around 94590',2147483647,'--'),
	(525,'0000-00-00 00:00:00','113-8356272-9565848','aab45acb-6bae-3c4a-06da-43869c87','B01M22LBKJ','Roof Rack Installation - At-Home - Rack and 1-2 Accessories','NOT_SERVICED','02-24-2019','14:00:00','17:00:00','--','--','--',0,'--','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'434 Landeros Dr','--',94403,'SAN MATEO','35 miles radius around 94590',107242611,'--'),
	(526,'0000-00-00 00:00:00','113-4404586-1718600','6eb45abe-2d0c-f8d2-35e0-5ff01b12','B00STRWW8Y','Dresser Assembly - Dresser','CANCELLED','--','00:00:00','00:00:00','113-2987682-9079448','B00GFU9B1I','BABY_PRODUCT',1,'NotDelivered','--',2147483647,'706 CEDAR ST','--',94070,'SAN CARLOS','35 miles radius around 94590',53154659,'--'),
	(527,'0000-00-00 00:00:00','114-4576556-0621058','ceb45834-a928-2d6a-0d87-c21f604a','B01L2YQNFI','Toilet Replacement (Commercial)','CANCELLED','--','00:00:00','00:00:00','114-8821994-2761019','B01N1I9D6E','PLUMBING_FIXTURE',1,'NotDelivered','--',2147483647,'15 ANCHORAGE RD','--',94965,'SAUSALITO','35 miles radius around 94590',50127562,'--'),
	(528,'0000-00-00 00:00:00','112-4892478-6522633','b4b4580e-7844-36fd-e6af-6e8f4912','B06W2N7P28','Hand Rail Installation - Drywall- Up to 16 Feet','NOT_SERVICED','03-04-2019','11:00:00','14:00:00','112-2721197-6415414','B07F8DP69B','BUILDING_MATERIAL',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',415,'75 CLOUD VIEW RD','--',94965,'SAUSALITO','35 miles radius around 94590',2147483647,'--'),
	(529,'0000-00-00 00:00:00','114-2266712-7791411','78b4579c-c053-7bc1-ebb8-3a0730e8','B06WGSP17V','Leaky Faucet Repair','CANCELLED','--','00:00:00','00:00:00','--','--','--',0,'--','--',2147483647,'3110 GLORIA TER','--',94549,'LAFAYETTE','35 miles radius around 94590',177034367,'--'),
	(530,'0000-00-00 00:00:00','111-4915563-2285035','a4b455e5-50e2-b069-a3ed-c7b118a9','B01JJQTSFS','Door Replacement - Interior Door - Single Door - Slab','NOT_SERVICED','02-21-2019','14:00:00','17:00:00','111-2692522-4330603','B01AW32WP0','BUILDING_MATERIAL',1,'NotDelivered','Eric Flint-A1VGPOC5WLXTK6',2147483647,'3589 SKYLINE DR','--',94542,'HAYWARD','35 miles radius around 94590',103093578,'--'),
	(531,'0000-00-00 00:00:00','111-2589735-9725047','f8b455c9-9c87-2f69-27cc-11aceb27','B00STRX08U','Table Assembly - Coffee Table','NOT_SERVICED','02-26-2019','11:00:00','14:00:00','111-0330396-5940205','B01N40YUCU','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',2147483647,'344 LAUREL WAY','--',94941,'MILL VALLEY','35 miles radius around 94590',2147483647,'--'),
	(532,'0000-00-00 00:00:00','113-8325981-6076202','5eb45599-9e58-fc0b-4af8-29719701','B00STRX1FM','Table Assembly - Dining Table','CANCELLED','--','00:00:00','00:00:00','113-9764932-7567409','B007QUL4G6','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','--',2147483647,'13 BRITTON AVE','--',94920,'BELVEDERE','San Francisco Bay Area',294444490,'--'),
	(533,'0000-00-00 00:00:00','111-8234468-7958654','2cb4531e-16c3-e062-8b8b-e977c63d','B06ZXY1L43','Speaker Stand Assembly and Setup - 2 Stands','NOT_SERVICED','02-20-2019','11:00:00','14:00:00','111-2310263-5825039','B079J62LDZ','HOME_FURNITURE_AND_DECOR',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',650,'6455 PINE VALLEY DR','--',95409,'SANTA ROSA','San Francisco Bay Area',5543945,'--'),
	(534,'0000-00-00 00:00:00','113-4440551-1313862','5ab44982-b74d-3899-0597-b48c9b52','B00IAD0LLW','Deadbolt Installation - Wood Door','COMPLETED','02-18-2019','08:00:00','11:00:00','113-9098037-5943427','B07BH6Y6LL','HARDWARE',1,'NotDelivered','Dustin Hennagin-A2KDRJ6UAD2OJT',510,'1800 Versailles Ave','--',94501,'Alameda','35 miles radius around 94590',872718810,'--'),
	(535,'0000-00-00 00:00:00','113-8699910-5969015','32b44589-9ddf-9ca1-f12f-d9b44741','B00OK3CMQS','Pet Door Installation - Glass Door','CANCELLED','--','00:00:00','00:00:00','--','--','--',0,'--','--',2147483647,'1730 Fell Street','--',94117,'San Francisco','Marin County',2147483647,'--'),
	(536,'0000-00-00 00:00:00','111-7629798-6081012','2eb444de-e665-a5c4-7882-dbce728d','B014QM2JT2','Window A/C Unit Installation and Haul Away - Above 12,000 BTU','CANCELLED','--','00:00:00','00:00:00','111-8139507-8461012','B00SMMZIKA','HOME',1,'NotDelivered','--',415,'750 WASHINGTON ST 2ND FLOOR','--',94108,'SAN FRANCISCO','35 miles radius around 94590',1497486051,'--'),
	(537,'0000-00-00 00:00:00','112-7070520-4525021','f4b44429-e7a7-5f48-c923-60a922d3','B00UBYCOV8','Furniture Assembly - 4 hours','NOT_SERVICED','02-20-2019','14:00:00','17:00:00','--','--','--',0,'--','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'413 30TH ST','--',94131,'SAN FRANCISCO','Marin County',5985641,'--'),
	(538,'0000-00-00 00:00:00','114-7670271-1564211','b2b440ab-166f-6285-33b9-9cba91b9','B00IAD0NQU','Garage Door Opener Replacement','COMPLETED','02-17-2019','08:00:00','11:00:00','114-5113104-4839432','B07H4BGY1W','HARDWARE',1,'Delivered','Joshua Hennagin-A32BDXSGWDJRPY',2147483647,'2375 32nd Ave','--',94116,'San Francisco','Marin County',1414837851,'--'),
	(539,'0000-00-00 00:00:00','111-7147380-8505001','ceb4395c-3f03-bbc4-1dfb-a372fc83','B00TSTR2QE','Exercise Bike Assembly','CANCELLED','--','00:00:00','00:00:00','111-8940229-3989827','B002CVU2HG','SPORTING_GOODS',1,'Delivered','--',707,'744 SUNNYSIDE RD','--',94574,'SAINT HELENA','35 miles radius around 94590',789511321,'--'),
	(540,'0000-00-00 00:00:00','112-9587380-7656243','00b4393e-e0e7-a798-2f6f-69ea3763','B06ZXY1D22','Curtain Rod Installation - Drywall - 3 Curtain Rods','CANCELLED','--','00:00:00','00:00:00','112-7034221-1625843|112-1403385-3318600','B01N683R28|B01N56NZL','HOME|HOME',1,'NotDelivered|NotDelivered','--',2147483647,'3618 TELEGRAPH AVE APT 8','--',94609,'OAKLAND','Marin County',1539764420,'--');

/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;

INSERT INTO `payments` (`id`, `date`, `transaction_type`, `order_id`, `product_details`, `product_title`, `payment_detail`, `total_product_charges`, `total_promotional_rebates`, `amazon_fees`, `refund_admin_fee`, `refund_referral_fee`, `refund_product_charge`, `other`, `total`)
VALUES
	(713,'Feb 17, 2019','Order Payment','114-3419655-1821042',NULL,'Mailbox Installation - Post Mounted - First-Time Installation','','$150.14','0','$-30.03','0','0','0','0','120.11'),
	(714,'Feb 17, 2019','Order Payment','111-0779493-5357803',NULL,'Deadbolt Installation - Wood Door','','$100.53','0','$-20.11','0','0','0','0','80.42'),
	(715,'Feb 16, 2019','Order Payment','114-7670271-1564211',NULL,'Garage Door Opener Replacement','','$239.12','0','$-47.82','0','0','0','0','191.3'),
	(716,'Feb 16, 2019','Order Payment','114-7125913-4572224',NULL,'Wall Hanging - 3 Hours - Ladder Required,  Items 6 Feet in Length or More','','$204.71','0','$-40.94','0','0','0','0','163.77'),
	(717,'Feb 16, 2019','Order Payment','113-1032634-7121844',NULL,'Furniture Assembly - 3 hours','','$122.64','0','$-24.53','0','0','0','0','98.11'),
	(718,'Feb 16, 2019','Order Payment','112-6817605-1168224',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(719,'Feb 16, 2019','Order Payment','113-5195961-0749818',NULL,'TV Stand or Media Storage Assembly - Media Cabinet','','$140.18','0','$-28.04','0','0','0','0','112.14'),
	(720,'Feb 10, 2019','Order Payment','113-0406569-8630633',NULL,'Deadbolt Installation - Wood Door','','$100.53','0','$-20.11','$-4.02','$20.11','$-100.53','0','-4.02'),
	(721,'Feb 16, 2019','Order Payment','112-6715531-2377018',NULL,'Home Gym Assembly','','$136.73','0','$-27.35','0','0','0','0','109.38'),
	(722,'Feb 15, 2019','Order Payment','112-9642975-0333032',NULL,'Furniture Assembly - 4 hours','','$143.40','0','$-28.68','0','0','0','0','114.72'),
	(723,'Feb 15, 2019','Order Payment','113-5019811-0525831',NULL,'Roof Rack Installation - At-Home - Rack Only','','$90.68','0','$-18.14','0','0','0','0','72.54'),
	(724,'Feb 14, 2019','Order Payment','111-3012086-9425006',NULL,'Glass Shower Door Installation - First Time','','$710.23','0','$-142.05','0','0','0','0','568.18'),
	(725,'Feb 14, 2019','Order Payment','112-0703496-8933804',NULL,'Exercise Bike Assembly','','$76.55','0','$-15.31','0','0','0','0','61.24'),
	(726,'Feb 14, 2019','Order Payment','114-2622241-0913052',NULL,'Gazebo Assembly - On the Lawn','','$391.08','0','$-78.22','0','0','0','0','312.86'),
	(727,'Feb 14, 2019','Order Payment','114-3640514-1377015',NULL,'Bed Assembly - Bunk Bed','','$134.00','0','$-26.80','0','0','0','0','107.2'),
	(728,'Feb 14, 2019','Order Payment','112-7037673-6985854',NULL,'Handyman Services - 2 Hours - Inside - No Ladder','','$158.85','0','$-31.77','0','0','0','0','127.08'),
	(729,'Feb 13, 2019','Order Payment','113-8889144-1842668',NULL,'Deadbolt Installation - Wood Door','','$128.46','0','$-25.69','0','0','0','0','102.77'),
	(730,'Feb 13, 2019','Order Payment','114-5028255-4623413',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(731,'Feb 12, 2019','Order Payment','112-6977237-8527464',NULL,'Deadbolt Installation - Wood Door','','$98.26','0','$-19.65','0','0','0','0','78.61'),
	(732,'Feb 12, 2019','Order Payment','112-1268153-5240246',NULL,'Storage Cabinet Assembly','','$112.30','0','$-22.46','0','0','0','0','89.84'),
	(733,'Feb 12, 2019','Order Payment','112-3490630-9652243',NULL,'Garage Wall Shelf Installation - Up to 8 Feet - 2 Units','','$226.42','0','$-45.28','0','0','0','0','181.14'),
	(734,'Feb 12, 2019','Order Payment','111-8711616-1644259',NULL,'Leaky Faucet Repair','','$141.21','0','$-28.24','0','0','0','0','112.97'),
	(735,'Feb 11, 2019','Order Payment','111-0348503-2210632',NULL,'Treadmill Assembly','','$75.11','0','$-15.02','0','0','0','0','60.09'),
	(736,'Feb 11, 2019','Order Payment','111-4406380-8291456',NULL,'Leaky Faucet Repair','','$91.21','0','$-18.24','0','0','0','0','72.97'),
	(737,'Feb 11, 2019','Order Payment','112-6857864-2826654',NULL,'Toilet Fill Valve Replacement','','$79.13','0','$-15.83','0','0','0','0','63.3'),
	(738,'Feb 11, 2019','Order Payment','114-6656580-1596255',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(739,'Feb 10, 2019','Order Payment','113-8632720-1674669',NULL,'Bed Assembly - Murphy Bed','','$272.80','0','$-54.56','0','0','0','0','218.24'),
	(740,'Feb 10, 2019','Order Payment','111-6666968-6229013',NULL,'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','','$131.09','0','$-26.22','0','0','0','0','104.87'),
	(741,'Feb 10, 2019','Order Payment','111-1235516-9590652',NULL,'Overhead Garage Storage Installation - Up to 4X8 - 1 Unit','','$131.09','0','$-26.22','0','0','0','0','104.87'),
	(742,'Feb 10, 2019','Order Payment','113-7895647-0125805',NULL,'Mailbox Installation - Wall Mounted - Replacement','','$81.65','0','$-16.33','0','0','0','0','65.32'),
	(743,'Feb 10, 2019','Order Payment','113-0619140-8584221',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(744,'Feb 9, 2019','Order Payment','113-0773478-6503421',NULL,'Office Chair Assembly - 1 Chair','','$65.76','0','$-13.15','0','0','0','0','52.61'),
	(745,'Feb 9, 2019','Order Payment','112-5265211-2481034',NULL,'Toilet Fill Valve Replacement','','$74.79','0','$-14.96','0','0','0','0','59.83'),
	(746,'Feb 9, 2019','Order Payment','114-3121991-4865869',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(747,'Feb 8, 2019','Order Payment','114-0623715-4667468',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(748,'Feb 8, 2019','Order Payment','112-3048266-3807429',NULL,'Deadbolt Installation - Wood Door','','$128.46','0','$-25.69','0','0','0','0','102.77'),
	(749,'Feb 8, 2019','Order Payment','112-3575175-4304212',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(750,'Feb 8, 2019','Order Payment','112-9693887-8669808',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(751,'Feb 6, 2019','Order Payment','111-7438646-1603432',NULL,'Handyman Services - 3 Hours - Inside - No Ladder','','$214.91','0','$-42.98','0','0','0','0','171.93'),
	(752,'Feb 6, 2019','Order Payment','111-5657759-8537006',NULL,'Garage Door Opener Replacement','','$202.67','0','$-40.53','0','0','0','0','162.14'),
	(753,'Feb 6, 2019','Order Payment','111-4390543-2868209',NULL,'Deadbolt Installation - Wood Door','','$118.77','0','$-23.75','0','0','0','0','95.02'),
	(754,'Feb 6, 2019','Order Payment','112-5750446-8096269',NULL,'Gazebo Assembly - On the Lawn','','$351.27','0','$-70.25','0','0','0','0','281.02'),
	(755,'Feb 6, 2019','Order Payment','113-2609986-1414647',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(756,'Feb 5, 2019','Order Payment','113-1205574-8834651',NULL,'Garage Door Opener Replacement','','$159.12','0','$-31.82','0','0','0','0','127.3'),
	(757,'Feb 4, 2019','Order Payment','113-8125759-8784221',NULL,'Handyman Services - 2 Hours - Inside - No Ladder','','$185.79','0','$-37.16','0','0','0','0','148.63'),
	(758,'Feb 18, 2019','Order Payment','113-8634078-0042669',NULL,'Exercise Bike Assembly','','$134.78','0','$-26.96','0','0','0','0','107.82'),
	(759,'Feb 18, 2019','Order Payment','114-0284995-5325052',NULL,'Security Safe Installation - Wall Anchored','','$200.94','0','$-40.19','0','0','0','0','160.75'),
	(760,'Feb 18, 2019','Order Payment','112-9343665-6265850',NULL,'Grill Assembly - 4 or 5 burners','','$147.66','0','$-29.53','0','0','0','0','118.13'),
	(761,'Feb 18, 2019','Order Payment','113-6397731-2865833',NULL,'Hutch Assembly','','$93.23','0','$-18.65','0','0','0','0','74.58'),
	(762,'Feb 18, 2019','Order Payment','113-4440551-1313862',NULL,'Deadbolt Installation - Wood Door','','$128.46','0','$-25.69','0','0','0','0','102.77');

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
	(1,'cakephp@example.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2018-12-31 22:07:09','2019-01-03 01:15:47',NULL),
	(2,'4waymedia@gmail.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2019-01-03 01:18:33','2019-01-03 01:18:33',3),
	(3,'me@you.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2019-02-14 08:57:46','2019-02-14 08:57:46',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
