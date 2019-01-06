
# Create Contractors table
CREATE TABLE `contractors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `nickname` varchar(64) NOT NULL,
  `amazon_id` varchar(64) NOT NULL,
  `type_id` int(11)  NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Create Payments table
CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Date` char(254) DEFAULT NULL,
  `Transaction_type` char(254) DEFAULT NULL,
  `Order_ID` char(254) DEFAULT NULL,
  `Product_Details` char(254) DEFAULT NULL,
  `Total_product_charges` char(254) DEFAULT NULL,
  `Total_promotional_rebates` char(254) DEFAULT NULL,
  `Amazon_fees` char(254) DEFAULT NULL,
  `Other` char(254) DEFAULT NULL,
  `Total` char(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

# Create Jobs table
CREATE TABLE `jobs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_created_time` datetime NOT NULL,
  `service_order_id` varchar(32) NOT NULL DEFAULT '',
  `job_id` char(32) NOT NULL DEFAULT '',
  `service_asin` varchar(15) NOT NULL DEFAULT '',
  `job_name` char(100) NOT NULL DEFAULT '',
  `job_status` char(20) NOT NULL DEFAULT '',
  `appointment_date` date NOT NULL,
  `appointment_start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `appointment_end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_order_id` int(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;