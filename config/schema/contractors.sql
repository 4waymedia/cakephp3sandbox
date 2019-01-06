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