-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2024 at 04:32 PM
-- Server version: 8.0.36
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogify`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `created_at`, `author`) VALUES
(1, 'New thing in rails', 'Hey there! new update is coming up in the new updated rails version.', '2024-03-24 09:49:26', 'Gurpreet Kaur'),
(2, 'blogify', 'blogify is a blogs related site that is recently became popular amoung people doe to its simple and unique desigs for creation and listing of blogs', '2024-03-24 10:11:14', 'Alice Aly'),
(3, 'New Blog', 'This is a new blog related to blogify details for easier setup', '2024-03-24 10:40:48', 'Jon Devyer'),
(6, 'Magna minima dolorib', 'Amet deserunt est f', '2024-04-10 00:48:16', 'Nam iste accusamus e'),
(7, 'Ducimus laboriosam', 'Optio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio ROptio distinctio R', '2024-04-10 00:48:28', 'Illo voluptatem Ab');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `publication_date` date DEFAULT NULL,
  `site_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `author_middle_name` varchar(255) DEFAULT NULL,
  `author_last_name` varchar(255) DEFAULT NULL,
  `retrieval_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `url`, `author_first_name`, `publication_date`, `site_name`, `author_middle_name`, `author_last_name`, `retrieval_date`) VALUES
(18, 'CRUD Operation in PHP using MySQL', 'https://www.c-sharpcorner.com/article/crud-operation-in-php-using-mysql/', 'Kisorjan', '2021-06-21', 'c-sharpcorner', 'Jakathiswaran', '', NULL),
(19, 'PHP CRUD Create, edit, update and delete posts with MySQL database', 'https://codewithawa.com/posts/php-crud-create,-edit,-update-and-delete-posts-with-mysql-database', 'Awa', NULL, 'CodeWithAwa', 'Melvine', '', NULL),
(20, 'PHP Tutorial (& MySQL)', 'https://www.youtube.com/watch?v=pWG7ajC_OVo', 'Shawn', '2019-01-29', 'Youtube', '', '', NULL),
(21, 'CSS basics Styling', 'https://developer.mozilla.org/en-US/docs/Learn/Getting_started_with_the_web/CSS_basics', 'Mdn Web Docs', '2023-10-02', 'Mdn Web Docs', '', '', NULL),
(22, 'Case closed for over 40 dogfighting victims', 'https://www.aspca.org/news/justice-served-case-closed-over-40-dogfighting-victims', 'American Society for the Prevention of Cruelty to Animals', '2019-11-21', 'Justice served', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
