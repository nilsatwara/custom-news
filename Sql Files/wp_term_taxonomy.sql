-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 16, 2024 at 07:16 AM
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
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint UNSIGNED NOT NULL,
  `term_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'wp_theme', '', 0, 1),
(3, 3, 'wp_theme', '', 0, 17),
(4, 4, 'nav_menu', '', 0, 3),
(5, 5, 'wp_template_part_area', '', 0, 3),
(6, 6, 'wp_template_part_area', '', 0, 1),
(7, 7, 'wp_template_part_area', '', 0, 2),
(8, 8, 'wp_theme', '', 0, 0),
(9, 9, 'category', '', 0, 1),
(10, 10, 'category', '', 0, 1),
(11, 11, 'category', '', 0, 1),
(12, 12, 'category', '', 0, 1),
(13, 13, 'category', '', 0, 0),
(14, 14, 'category', '', 0, 0),
(15, 15, 'news_category', '', 0, 1),
(16, 16, 'news_category', '', 0, 1),
(17, 17, 'news_category', '', 0, 1),
(18, 18, 'news_category', '', 0, 0),
(19, 19, 'news_category', '', 0, 1),
(20, 20, 'news_category', '', 0, 5),
(21, 21, 'news_category', '', 0, 1),
(22, 22, 'news_category', '', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
