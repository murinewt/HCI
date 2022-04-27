-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2022 at 08:36 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasemysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_articles`
--

DROP TABLE IF EXISTS `news_articles`;
CREATE TABLE IF NOT EXISTS `news_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `display` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_articles`
--

INSERT INTO `news_articles` (`id`, `title`, `description`, `display`) VALUES
(1, 'First Article', 'Write an Article', 'true'),
(2, 'Second Article', 'Write an Article article', 'true'),
(3, 'Third Article', 'Article Write an Article', 'true'),
(4, 'Fourth Article', 'Write an Article Write an Article', 'true'),
(5, 'Fifth Article', 'Write an Article Fifth', 'true'),
(6, 'Sixth Article', 'Write an Article Again', 'true'),
(7, 'Seventh Article', 'Write Seventh Article', 'true');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
