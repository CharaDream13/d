-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2025 at 11:00 PM
-- Server version: 5.1.65-community-log
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `id_moder_status` int(11) NOT NULL AUTO_INCREMENT,
  `moder_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_moder_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`id_moder_status`, `moder_status`) VALUES
(1, 'none'),
(2, 'delete'),
(3, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE IF NOT EXISTS `Products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `available` tinyint(1) DEFAULT '1',
  `id_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `fk_product_type` (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `Rent`
--

CREATE TABLE IF NOT EXISTS `Rent` (
  `id_rent` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `id_status` int(11) DEFAULT NULL,
  `id_moder_status` int(11) DEFAULT NULL,
  `moder_comment` text,
  PRIMARY KEY (`id_rent`),
  KEY `id_user` (`id_user`),
  KEY `id_product` (`id_product`),
  KEY `id_status` (`id_status`),
  KEY `id_moder_status` (`id_moder_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE IF NOT EXISTS `Reviews` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` text,
  `date` date DEFAULT NULL,
  `id_moder_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_review`),
  KEY `id_user` (`id_user`),
  KEY `id_product` (`id_product`),
  KEY `id_moder_status` (`id_moder_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Rules`
--

CREATE TABLE IF NOT EXISTS `Rules` (
  `id_rule` int(11) NOT NULL AUTO_INCREMENT,
  `name_rule` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Rules`
--

INSERT INTO `Rules` (`id_rule`, `name_rule`) VALUES
(1, 'admin'),
(2, 'moderator'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `name_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`id_status`, `name_status`) VALUES
(1, 'open'),
(2, 'close');

-- --------------------------------------------------------

--
-- Table structure for table `Types`
--

CREATE TABLE IF NOT EXISTS `Types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Types`
--

INSERT INTO `Types` (`id_type`, `type`) VALUES
(1, 'excavator'),
(2, 'bulldozer'),
(3, 'crane'),
(4, 'truck');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL,
  `id_rule` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_rule` (`id_rule`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id_user`, `login`, `phone`, `email`, `password`, `first_name`, `last_name`, `patronymic`, `id_rule`) VALUES
(1, 'admin', '+7(996)966-69-13', 'charadream13@gmail.com', 'admintex', 'chara', 'dream', 'none', 1),
(2, 'CDшка', '+6(666)666-66-66', 'cd@gm.c', 'cdfka', 'cdfka', 'none', 'none', 2),
(4, 'chara', '89127999666', 'chara13@gmail.com', 'chara', 'Ð§Ð°Ñ€Ð°', 'Ð”Ñ€Ð¸Ð¼', 'Ð¢Ñ€Ð¸Ð½Ð°Ð´', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Products`
--
ALTER TABLE `Products`
  ADD CONSTRAINT `fk_product_type` FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`);

--
-- Constraints for table `Rent`
--
ALTER TABLE `Rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `rent_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `rent_ibfk_4` FOREIGN KEY (`id_moder_status`) REFERENCES `admin` (`id_moder_status`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`id_moder_status`) REFERENCES `admin` (`id_moder_status`);

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_rule`) REFERENCES `rules` (`id_rule`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
