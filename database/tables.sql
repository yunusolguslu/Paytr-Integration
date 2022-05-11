--CREATE USERS TABLE IF NOT EXISTS
CREATE TABLE IF NOT EXISTS `users` (
    `id` int NOT NULL AUTO_INCREMENT,
     `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,	
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--CREATE PRODUCTS TABLE IF NOT EXISTS
CREATE TABLE IF NOT EXISTS `products` (
    `id` int NOT NULL AUTO_INCREMENT,
     `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--CREATE ORDERS TABLE IF NOT EXISTS
CREATE TABLE IF NOT EXISTS `orders` (
    `id` int NOT NULL AUTO_INCREMENT,
        `user_id` int NOT NULL,
        `product_id` int NOT NULL,
        `quantity` int NOT NULL,
        `price` decimal(10,2) NOT NULL,
        `date`  datetime NOT NULL,
        `status` boolean NOT NULL,
        `paytrid` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;