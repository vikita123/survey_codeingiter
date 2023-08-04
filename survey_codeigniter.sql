-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 12:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_answers`
--

CREATE TABLE `survey_answers` (
  `id` int(30) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_answers`
--

INSERT INTO `survey_answers` (`id`, `survey_id`, `user_id`, `answer`, `question_id`, `date_created`) VALUES
(1, 1, 2, 'Once a week', 1, '2023-08-05 03:19:47'),
(2, 1, 2, ' Instagram,LinkedIn', 2, '2023-08-05 03:19:47'),
(3, 1, 2, 'Very satisfied', 3, '2023-08-05 03:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `survey_master`
--

CREATE TABLE `survey_master` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_master`
--

INSERT INTO `survey_master` (`id`, `title`, `description`, `user_id`, `date_created`) VALUES
(1, 'Test Survey', 'This is the test survey', 1, '2023-08-05 03:13:47'),
(2, 'Survey Form', 'Example of Survey Form', 1, '2023-08-05 03:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `id` int(30) NOT NULL,
  `question` text NOT NULL,
  `frm_option` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`id`, `question`, `frm_option`, `type`, `survey_id`, `date_created`) VALUES
(1, 'How often do you engage in physical exercise?', 'Daily,2-3 times a week,Once a week,Rarely or never', 'tp_multichoice', 1, '2023-08-05 03:13:47'),
(2, 'Which of the following social media platforms do you use? (Check all that apply)', 'Facebook, Instagram,LinkedIn', 'tp_checkbox', 1, '2023-08-05 03:13:47'),
(3, 'How satisfied are you with our customer service?', 'Very satisfied,Satisfied', 'tp_multichoice', 1, '2023-08-05 03:13:47'),
(4, 'What is your age group?', 'Under 18,18-24,25-34,35-44', 'tp_multichoice', 2, '2023-08-05 03:24:42'),
(5, 'Which type of content would you like to see more of on our website/blog? (Check all that apply)', ' Educational articles,How-to guides,Case studies', 'tp_checkbox', 2, '2023-08-05 03:24:42'),
(6, 'What is your favorite genre of music? ', 'Pop,Rock,Country,Classical,Electronic/Dance', 'tp_checkbox', 2, '2023-08-05 03:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `role_id` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2 = User',
  `is_active` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `is_active`, `created_at`, `update_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$mpsfmU7qlGcE3CSbAuSk0uTVZQ5v.RDD.e4Fu.573u54RGIFlUYUy', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'User', 'user@gmail.com', '$2y$10$mPKx9lV87.aNvYXH.3rb8udfOUzWsqlawUL/PHsYmZ93QxgirwMMK', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_answers`
--
ALTER TABLE `survey_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_master`
--
ALTER TABLE `survey_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_answers`
--
ALTER TABLE `survey_answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `survey_master`
--
ALTER TABLE `survey_master`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
