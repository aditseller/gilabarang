-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 24, 2015 at 06:46 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gilabarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id_category`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(18, 'Buku'),
(6, 'Dapur'),
(10, 'Elektronik'),
(1, 'Fashion'),
(20, 'Film dan Musik'),
(8, 'Gadget'),
(21, 'Game'),
(16, 'Hobi dan Mainan'),
(11, 'Kamera'),
(3, 'Kecantikan'),
(4, 'Kesehatan'),
(9, 'Komputer'),
(17, 'Makanan Dan Minuman'),
(13, 'Olahraga'),
(12, 'Otomotif'),
(2, 'Pakaian'),
(7, 'Perlengkapan Bayi'),
(14, 'Perlengkapan Kantor'),
(5, 'Rumah Tangga'),
(19, 'Software'),
(15, 'Souvenir');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_product` (`id_product`),
  KEY `id_user` (`id_user`),
  KEY `fullname` (`fullname`),
  KEY `comment_date` (`comment_date`),
  KEY `id_seller` (`id_seller`),
  KEY `product_title` (`product_title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(50) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `condition` enum('new','second','refurbish') NOT NULL,
  `price` varchar(15) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `seller` varchar(100) NOT NULL,
  `email_seller` varchar(100) NOT NULL,
  `phone_seller` varchar(15) NOT NULL,
  `location_seller` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`id_product`),
  UNIQUE KEY `title` (`title`),
  KEY `seller` (`seller`),
  KEY `category` (`category`),
  KEY `email_seller` (`email_seller`),
  KEY `phone_seller` (`phone_seller`),
  KEY `phone_seller_2` (`phone_seller`),
  KEY `id_seller` (`id_seller`),
  KEY `created_at` (`start_date`),
  KEY `datelimit` (`end_date`),
  KEY `location_seller` (`location_seller`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `title`, `condition`, `price`, `id_seller`, `seller`, `email_seller`, `phone_seller`, `location_seller`, `category`, `description`, `start_date`, `end_date`) VALUES
(1, 'Mouse Wireless Logitech M215 ', 'new', '85000', 1, 'Gilabarang', 'tezaraditya@gmail.com', '081314421461', 'Jakarta', 'Komputer', 'Mouse Wireless Logitech M215 ', '2015-07-24 00:18:27', '2015-08-23 00:18:27'),
(2, 'Mouse Wireless Logitech M235', 'new', '95000', 1, 'Gilabarang', 'tezaraditya@gmail.com', '081314421461', 'Jakarta', 'Komputer', 'Mouse Wireless Logitech M235', '2015-07-24 00:23:20', '2015-08-23 00:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id_province` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) NOT NULL,
  PRIMARY KEY (`id_province`),
  UNIQUE KEY `province` (`province`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `province`) VALUES
(1, 'Aceh'),
(2, 'Bali'),
(3, 'Banten'),
(4, 'Bengkulu'),
(34, 'Daerah Istimewa Yogyakarta'),
(5, 'Gorontalo'),
(6, 'Jakarta'),
(7, 'Jambi'),
(8, 'Jawa Barat'),
(9, 'Jawa Tengah'),
(10, 'Jawa Timur'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Selatan'),
(13, 'Kalimantan Tengah'),
(14, 'Kalimantan Timur'),
(15, 'Kalimantan Utara'),
(16, 'Kepulauan Bangka Belitung'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nusa Tenggara Barat'),
(22, 'Nusa Tenggara Timur'),
(23, 'Papua'),
(24, 'Papua Barat'),
(25, 'Riau'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tengah'),
(29, 'Sulawesi Tenggara'),
(30, 'Sulawesi Utara'),
(31, 'Sumatera Barat'),
(32, 'Sumatera Selatan'),
(33, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `report` varchar(100) NOT NULL,
  `id_product` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_report`),
  KEY `report` (`report`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `chatid` varchar(20) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `birthdate` varchar(2) NOT NULL,
  `birthmonth` varchar(2) NOT NULL,
  `birthyear` varchar(4) NOT NULL,
  `joindate` datetime NOT NULL,
  `agreement` varchar(10) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `active` enum('y','n') NOT NULL DEFAULT 'n',
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`,`phone`),
  UNIQUE KEY `authKey` (`authKey`),
  KEY `fullname` (`fullname`),
  KEY `birthmonth` (`birthmonth`,`birthyear`),
  KEY `birthdate` (`birthdate`),
  KEY `birthyear` (`birthyear`),
  KEY `location` (`location`),
  KEY `location_2` (`location`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fullname`, `phone`, `chatid`, `gender`, `birthdate`, `birthmonth`, `birthyear`, `joindate`, `agreement`, `location`, `active`, `authKey`, `accessToken`) VALUES
(1, 'tezaraditya@gmail.com', '3630363034393931', 'Gilabarang', '081314421461', '', 'male', '04', '09', '1991', '2015-07-24 00:20:11', '1', 'Jakarta', 'y', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`fullname`) REFERENCES `users` (`fullname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`id_seller`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_5` FOREIGN KEY (`product_title`) REFERENCES `product` (`title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`seller`) REFERENCES `users` (`fullname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`email_seller`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_seller`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`location_seller`) REFERENCES `users` (`location`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`location`) REFERENCES `province` (`province`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
