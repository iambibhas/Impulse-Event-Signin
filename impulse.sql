-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2011 at 10:13 AM
-- Server version: 5.1.56
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `impulse`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `organization` varchar(200) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `name`, `organization`, `email`, `website`, `twitter`) VALUES
(28, 'Bibhas Chandra Debnath', 'N/A', 'iambibhas@gmail.com', '', 'iAmBivas');
