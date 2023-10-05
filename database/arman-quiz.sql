-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 07:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arman-quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_text` text NOT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `is_correct`) VALUES
(1, 1, 'Hyperlink Text Markup Language', 0),
(2, 1, 'Hypertext Transfer Protocol', 0),
(3, 1, 'HyperText Markup Language', 1),
(4, 2, 'ul Element', 0),
(5, 2, 'li Element', 0),
(6, 2, 'ol Element', 1),
(7, 3, 'a Element', 1),
(8, 3, 'h1 Element', 0),
(9, 3, 'p Element', 0),
(10, 4, 'src\r\n', 1),
(11, 4, 'alt', 0),
(12, 4, 'href', 0),
(13, 5, 'Bold text', 1),
(14, 5, 'Line break', 0),
(15, 5, 'Italic text', 0),
(16, 6, 'Creative Style Sheets', 0),
(17, 6, 'Computer Style Sheets', 0),
(18, 6, 'Cascading Style Sheets', 1),
(19, 7, 'text-color', 0),
(20, 7, 'font-color', 0),
(21, 7, 'color', 1),
(22, 8, '#paragraph', 0),
(23, 8, '.paragraph', 0),
(24, 8, 'p', 1),
(25, 9, 'inline', 0),
(26, 9, 'block', 1),
(27, 9, 'none', 0),
(28, 10, 'padding', 1),
(29, 10, 'margin', 0),
(30, 10, 'border-spacing', 0),
(31, 11, 'var', 1),
(32, 11, 'let', 0),
(33, 11, 'const', 0),
(34, 12, 'character', 1),
(35, 12, 'string', 0),
(36, 12, 'boolean', 0),
(37, 13, 'alert()', 1),
(38, 13, 'console.log()', 0),
(39, 13, 'document.write()', 0),
(40, 14, '=', 1),
(41, 14, '==', 0),
(42, 14, '===', 0),
(43, 15, 'function', 1),
(44, 15, 'var', 0),
(45, 15, 'if', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `technology_id` int(11) DEFAULT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `technology_id`, `question_text`) VALUES
(1, 1, 'What does HTML stand for?'),
(2, 1, 'Which HTML tag is used to create an ordered list?'),
(3, 1, 'Which HTML tag is used to create a hyperlink?'),
(4, 1, 'Which attribute is used to define the image source in the <img> tag?'),
(5, 1, 'What does the HTML \"br\" tag represent?'),
(6, 2, 'What does CSS stand for?'),
(7, 2, 'Which CSS property is used to change the text color of an element?'),
(8, 2, 'Which CSS selector is used to target all <p> elements?'),
(9, 2, 'What is the default value for the \"display\" property in CSS for most HTML elements?'),
(10, 2, 'Which CSS property is used to add space between the border and content of an element?'),
(11, 3, 'What keyword is used to declare a variable in JavaScript?'),
(12, 3, 'Which of the following is not a valid data type in JavaScript?'),
(13, 3, 'Which built-in method is used to display a message in a pop-up dialog box in JavaScript?'),
(14, 3, 'Which operator is used for assignment in JavaScript?'),
(15, 3, 'Which keyword is used to declare a function in JavaScript?');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `technology_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `technology_id`, `score`) VALUES
(1, 3, 3, 3),
(2, 8, 1, 3),
(3, 8, 2, 0),
(4, 8, 2, 0),
(5, 8, 3, 0),
(6, 8, 1, 3),
(7, 1, 1, 2),
(8, 1, 2, 0),
(9, 1, 3, 0),
(10, 1, 1, 2),
(11, 1, 2, 2),
(12, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Arman', '$2y$10$fciTEqJwiK64GXFtozceJO3ZJ/6KltoKceGr.lJPBxh.gqVOSpvs2'),
(2, 'User 2', '$2y$10$7KftfbIf.UXQrMvwcZDvj.H11aK9bO511sp3j/Fv6gM7Tmg/i0k5.'),
(3, 'Admin', '$2y$10$zqt6lMcNH3mnxL8kPkTUp.VPBqtByapUOf1qpyMnhSm27lrQ9Vaha'),
(4, 'Admin1', '$2y$10$9eHyCacmBnwsPOfsGqcynOs5S3qC5z/261JX8eE93BfQ8PSxKGLDq'),
(5, 'Admin 5', '$2y$10$QX.wYcyM9Sk.8u8CyxI7dOJNZ.KUEYAp5iyUNU8X/9/LkDPwYanr6'),
(6, 'Ar45', '$2y$10$dvVHBaPBJwQgIs//tZWhbOY.ZXhK8qKAOyIAxEeGMUbPUHFjLMEI.'),
(7, 'User 3', '$2y$10$XuHsMRjFcY0NbGBr7mFEcOs/gbtrbke2NOaSHRfgXa7N5hsWLnV8y'),
(8, 'Hello', '$2y$10$XK1ZASPP7PAqxGfriGs7QuWl7137GeOVFKXWnv0Dh5AJuXq4gDlYy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `technology_id` (`technology_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `technology_id` (`technology_id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`technology_id`) REFERENCES `technologies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
