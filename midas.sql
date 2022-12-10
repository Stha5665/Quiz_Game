-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 06:43 PM
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
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `sample_no` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `billing_date` datetime NOT NULL,
  `sub_total` varchar(25) NOT NULL,
  `discount_percent` varchar(25) NOT NULL,
  `discount_amount` varchar(25) NOT NULL,
  `net_total` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`sample_no`, `patient_id`, `billing_date`, `sub_total`, `discount_percent`, `discount_amount`, `net_total`) VALUES
(1, 9, '2022-12-10 16:23:44', '1120', '7', '78.4', '1041.6'),
(3, 8, '2022-12-10 16:28:17', '1600', '12', '192', '1408'),
(4, 10, '2022-12-10 18:31:53', '940', '7', '65.8', '874.2');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(6) NOT NULL,
  `country_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`) VALUES
(1, 'USA'),
(2, 'NEPAL');

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
(2, 'java', 'java@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

CREATE TABLE `municipalities` (
  `municipality_name` varchar(55) NOT NULL,
  `province_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`municipality_name`, `province_id`) VALUES
('Adak', 1),
('Ambler', 1),
('Anderson', 1),
('Bhaktapur', 2),
('Gorkha', 3),
('Humla', 4),
('Islip', 5),
('Jumla', 4),
('Kalikot', 4),
('Kaski', 3),
('Kathmandu', 2),
('Lamjung', 3),
('North Hempstead', 5),
('Tokha', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` varchar(5) NOT NULL,
  `gender` char(1) NOT NULL,
  `country` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `municipality` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneno` varchar(30) NOT NULL,
  `language` varchar(80) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `age`, `gender`, `country`, `province`, `municipality`, `address`, `phoneno`, `language`, `date_time`) VALUES
(8, 'Ram Thapa', '42', 'M', 'NEPAL', 'Bagmati', 'Kathmandu', 'Thapathali, 123 road', '9876784321', 'English Nepali', '2022-12-10 16:17:12'),
(9, 'Nora Fatehi', '30', 'F', 'USA', 'New York', 'North', '22 Spotify Hall, Main Road', '9977886677', 'English', '2022-12-10 16:20:53'),
(10, 'Elon Musk', '49', 'M', 'USA', 'Alaska', 'Ambler', '23 silicon street', '9899870654', 'English Chinese Nepali', '2022-12-10 18:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `country_id` int(6) NOT NULL,
  `province_name` varchar(30) NOT NULL,
  `province_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`country_id`, `province_name`, `province_id`) VALUES
(1, 'Alaska', 1),
(2, 'Bagmati', 2),
(2, 'Gandaki', 3),
(2, 'Karnali', 4),
(1, 'New York', 5);

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
('{"q1":"Kathmandu","q2":"C","q3":"7","q4":"Mt Everest","q5":"all"}', 32, 'JAVA', '5', '2022-12-03 04:50:57', '85', '5/5/5'),
('{"q1":"Nuwakot","q3":"9","q4":"Mt Himasulu","q5":"all"}', 33, 'done', '1', '2022-12-03 05:02:47', '14', '1/4/5'),
('{"q2":"D","q3":"10","q4":"Mt Himasulu","q5":"all"}', 34, 'ok', '1', '2022-12-08 05:55:19', '11', '1/4/5'),
('{"q1":"Kathmandu","q2":"B","q3":"6","q4":"Mt Makalu","q5":"all"}', 35, '', '2', '2022-12-08 06:07:51', '57', '2/5/5');

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
-- Table structure for table `test_details`
--

CREATE TABLE `test_details` (
  `sample_no` int(25) NOT NULL,
  `patient_id` int(25) NOT NULL,
  `test_items` varchar(80) NOT NULL,
  `quantity` int(8) NOT NULL,
  `unit_price` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`sample_no`, `patient_id`, `test_items`, `quantity`, `unit_price`) VALUES
(1, 9, 'Endoscopy', 2, '560'),
(3, 8, 'Xray', 2, '800'),
(4, 10, 'Sugar Test', 4, '235');

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
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`sample_no`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD UNIQUE KEY `municipality_name` (`municipality_name`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

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
-- Indexes for table `test_details`
--
ALTER TABLE `test_details`
  ADD UNIQUE KEY `sample_no` (`sample_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `quiz_played`
--
ALTER TABLE `quiz_played`
  MODIFY `player_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
