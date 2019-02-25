# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: cake_cms
# Generation Time: 2019-02-25 08:47:33 +0000
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
  `last_name` varchar(30) NOT NULL,
  `technician_id` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT '',
  `role_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime DEFAULT NULL,
  `service_order_id` varchar(32) DEFAULT NULL,
  `job_id` char(32) DEFAULT NULL,
  `service_asin` varchar(40) DEFAULT NULL,
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` date DEFAULT NULL,
  `appointment_start_time` time DEFAULT NULL,
  `appointment_end_time` time DEFAULT NULL,
  `product_order_id` varchar(200) DEFAULT NULL,
  `product_asin` varchar(40) DEFAULT NULL,
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
  `buyer_id` varchar(30) DEFAULT NULL,
  `defect` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(3,'me@you.com','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa','2019-02-14 08:57:46','2019-02-14 08:57:46',1),
	(4,'dustin@tlht.us','$2y$10$s4.ik7ewMtuEjNXySIz27e9jnBSu8qMCW4DFaPW93ef4HeD6KWmPa',NULL,NULL,3);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
