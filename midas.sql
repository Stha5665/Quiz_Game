-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 04:53 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midas`
--

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `EMPLOYEID` int(6) NOT NULL,
  `EMPLOYENAME` varchar(55) NOT NULL,
  `EMPLOYEMAIL` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`EMPLOYEID`, `EMPLOYENAME`, `EMPLOYEMAIL`) VALUES
(1, 'kali', 'kali@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_options`
--

CREATE TABLE `quiz_options` (
  `question_id` int(6) NOT NULL,
  `option_one` varchar(50) NOT NULL,
  `option_two` varchar(50) NOT NULL,
  `option_three` varchar(50) NOT NULL,
  `option_four` varchar(50) NOT NULL,
  `answer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_options`
--

INSERT INTO `quiz_options` (`question_id`, `option_one`, `option_two`, `option_three`, `option_four`, `answer`) VALUES
(1, 'Kathmandu', 'Bhaktapur', 'Lalitpur', 'Nuwakot', 'Kathmandu'),
(2, 'A', 'B', 'C', 'D', 'C'),
(3, '6', '7', '9', '10', '7'),
(4, 'Mt Everest', 'Mt Makalu', 'Mt Himasulu', 'Mt Ganesh', 'Mt Everest'),
(5, 'water', 'ground', 'house', 'all', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_played`
--

CREATE TABLE `quiz_played` (
  `choosen_answer` text NOT NULL,
  `player_id` int(6) NOT NULL,
  `player_name` varchar(30) NOT NULL,
  `score` varchar(30) NOT NULL,
  `played_date_time` datetime NOT NULL,
  `total_time_taken` varchar(25) NOT NULL,
  `evaluation` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_played`
--

INSERT INTO `quiz_played` (`choosen_answer`, `player_id`, `player_name`, `score`, `played_date_time`, `total_time_taken`, `evaluation`) VALUES
('{"q1":"Kathmandu","q2":"C","q3":"7","q4":"Mt Ganesh"}', 29, 'Hero', '3', '2022-12-02 21:22:51', '10', '3/4/5'),
('{"q1":"Bhaktapur","q2":"B","q3":"9","q4":"Mt Everest","q5":"all"}', 30, 'Jack', '2', '2022-12-02 21:31:33', '17', '2/5/5'),
('{"q1":"Kathmandu","q2":"C","q3":"6","q4":"Mt Everest","q5":"all"}', 31, 'Rider', '4', '2022-12-03 04:38:46', '24', '4/5/5'),
('{"q1":"Kathmandu","q2":"C","q3":"7","q4":"Mt Everest","q5":"all"}', 32, 'JAVA', '5', '2022-12-03 04:50:57', '85', '5/5/5');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(6) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `question`) VALUES
(1, 'Which of the following is the capital city of Nepal ?'),
(2, 'B comes before ?'),
(3, '8 comes after ?'),
(4, 'Nepal has the highest mountain named as ?'),
(5, 'Sky is above the ___ ?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'Hacker World', 'Internet Rider'),
(2, 'abc@gmail.com', 'abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_options`
--
ALTER TABLE `quiz_options`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_played`
--
ALTER TABLE `quiz_played`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_played`
--
ALTER TABLE `quiz_played`
  MODIFY `player_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
