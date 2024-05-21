-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 12:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(10, 2, 0),
(33, 8, 0),
(37, 4, 0),
(38, 4, 0),
(39, 3, 0),
(40, 3, 0),
(41, 3, 0),
(42, 3, 0),
(43, 3, 0),
(44, 3, 0),
(45, 3, 0),
(46, 3, 0),
(47, 3, 0),
(48, 3, 0),
(49, 3, 0),
(50, 3, 0),
(50, 5, 0),
(51, 3, 0),
(51, 6, 0),
(52, 3, 0),
(52, 5, 0),
(53, 3, 0),
(53, 5, 0),
(54, 3, 0),
(54, 7, 0),
(55, 3, 0),
(55, 7, 0),
(65, 4, 0),
(104, 9, 0),
(104, 17, 0),
(105, 10, 0),
(105, 19, 0),
(106, 12, 0),
(106, 16, 0),
(108, 11, 0),
(108, 15, 0),
(164, 22, 0),
(166, 21, 0),
(167, 20, 0),
(168, 20, 0),
(169, 22, 0),
(170, 20, 0),
(171, 20, 0),
(179, 20, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
