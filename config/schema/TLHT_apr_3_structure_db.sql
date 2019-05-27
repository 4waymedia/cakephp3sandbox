# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: cake_cms
# Generation Time: 2019-04-03 23:27:55 +0000
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table accounts
# ------------------------------------------------------------

CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table businesses
# ------------------------------------------------------------

CREATE TABLE `businesses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_pay_period_date` date DEFAULT NULL,
  `business_name` varchar(64) DEFAULT '',
  `phone_number` varchar(16) DEFAULT NULL,
  `address_1` varchar(32) DEFAULT NULL,
  `address_2` varchar(32) DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `default_percentage` int(2) DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table businesses_users
# ------------------------------------------------------------

CREATE TABLE `businesses_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table contractor_payments
# ------------------------------------------------------------

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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table contractors
# ------------------------------------------------------------

CREATE TABLE `contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `business_id` int(11) DEFAULT NULL,
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

CREATE TABLE `jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime DEFAULT NULL,
  `service_order_id` varchar(128) DEFAULT NULL,
  `job_id` char(32) DEFAULT NULL,
  `service_asin` varchar(40) DEFAULT NULL,
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` date DEFAULT NULL,
  `appointment_start_time` time DEFAULT NULL,
  `appointment_end_time` time DEFAULT NULL,
  `product_order_id` varchar(255) DEFAULT NULL,
  `product_asin` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_quantity_purchased` int(10) DEFAULT NULL,
  `product_order_status` varchar(255) DEFAULT NULL,
  `technician` varchar(100) DEFAULT NULL,
  `buyer_phone_number` varchar(20) DEFAULT NULL,
  `ship_address_line_1` varchar(64) NOT NULL DEFAULT '',
  `ship_address_line_2` varchar(64) DEFAULT NULL,
  `ship_postal_code` int(11) NOT NULL,
  `ship_city` varchar(32) NOT NULL DEFAULT '',
  `coverage_area` varchar(64) DEFAULT NULL,
  `buyer_id` varchar(30) DEFAULT NULL,
  `defect` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pay_periods
# ------------------------------------------------------------

CREATE TABLE `pay_periods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int(7) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `contractors_used` int(2) DEFAULT NULL,
  `jobs_completed` int(6) DEFAULT NULL,
  `jobs_cancelled` int(11) DEFAULT NULL,
  `jobs_pending` int(11) DEFAULT NULL,
  `calculated` date NOT NULL,
  `status` set('active','closed','pending','unresolved') DEFAULT 'active',
  `user_modified` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table payments
# ------------------------------------------------------------

CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `order_id` varchar(128) DEFAULT NULL,
  `sku` varchar(64) DEFAULT NULL,
  `transaction_type` char(254) DEFAULT NULL,
  `payment_type` varchar(64) DEFAULT NULL,
  `product_details` char(254) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table roles
# ------------------------------------------------------------

CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `description` varchar(256) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
