
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



# Create Contractor Roles
CREATE TABLE `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `contractor_payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contractor_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `order_id` char(254) DEFAULT NULL,
  `payment_source_id` char(254) DEFAULT NULL,
  `payment_amount` decimal(10,2) DEFAULT '0.00',
  `deduction_fees` decimal(10,2) DEFAULT '0.00',
  `payment_addon` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;



CREATE TABLE `accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `account_payments` (
                                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                                  `account_id` int(11) NOT NULL,
                                  `contractor_id` int(11) NOT NULL,
                                  `technician_id` int(11) NOT NULL,
                                  `job_id` char(32) NOT NULL DEFAULT '',
                                  `order_id` char(254) NOT NULL DEFAULT '',
                                  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
                                  `confirmation_receipt` varchar(24) DEFAULT NULL,
                                  `date` date NOT NULL,
                                  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


# Create Payments table
CREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` char(254) DEFAULT NULL,
  `transaction_type` char(254) DEFAULT NULL,
  `order_id` char(254) DEFAULT NULL,
  `product_details` char(254) DEFAULT NULL,
  `Total_product_charges` char(254) DEFAULT NULL,
  `total_promotional_rebates` char(254) DEFAULT NULL,
  `amazon_fees` char(254) DEFAULT NULL,
  `other` char(254) DEFAULT NULL,
  `total` char(254) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;



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
  `product_order_id` varchar(32) NOT NULL DEFAULT '',
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

