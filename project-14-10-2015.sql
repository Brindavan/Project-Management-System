-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2015 at 01:08 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `phone`, `logo`) VALUES
(1, 'Google', 'San Franscisco', '158263253', 'c:/xampp/htdocs/project/application/assets/company/logo/google.jpg\r\n'),
(2, 'IBM', 'ibm', '1231231231', 'c:/xampp/project/application/assets/images/company/logo/ibm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `company_id`, `name`, `address`, `phone`) VALUES
(1, 1, 'Ethan Hunt', 'New York', '123467895'),
(2, 1, 'Sasha Gray', 'UK', '1524698202'),
(3, 2, 'Arrow', 'address of arrow', '1231231231'),
(4, 1, 'The Flash', 'address of the flash', '1234123455'),
(5, 2, 'Will Smith', 'Texas, Austin', '1591591592'),
(6, 2, 'Matt Murdock', 'Tokyo, Japan', '1472583699');

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE IF NOT EXISTS `employee_project` (
  `id` int(11) NOT NULL,
  `team_leader_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`id`, `team_leader_id`, `employee_id`, `project_id`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 3, 3),
(4, 3, 4, 2),
(5, 4, 5, 4),
(6, 4, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE IF NOT EXISTS `note` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` varchar(50000) NOT NULL,
  `sender` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `body`, `sender`, `project_id`) VALUES
(1, 'Welcome All', 'This note is given to all the employee of this project to welcome you all. This note is given to all the employee of this project to welcome you all.This note is given to all the employee of this project to welcome you all.This note is given to all the employee of this project to welcome you all.\r\n', 1, 1),
(2, 'Hello and Goodbye', 'I want to be your favorite hello and hardest goodbye.', 1, 2),
(3, 'best...rest', 'I know I am not the best...But I am not the rest.', 2, 3),
(4, 'Perfect', 'Don''t wait for the perfect MOMENT...take the moment and make it perfect.', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `actual_finish_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `url` varchar(100) NOT NULL,
  `completion` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `company_id`, `name`, `start_date`, `finish_date`, `actual_finish_date`, `url`, `completion`, `status`) VALUES
(1, 1, 'Job Portal', '2015-10-14 06:47:30', '2015-11-01 18:30:00', '2015-10-13 18:30:00', 'https://github/job-portal', 40, 'ongoing'),
(2, 1, 'Human Resource Information System', '2015-10-14 06:47:30', '2015-10-15 18:30:00', '2015-10-31 18:30:00', 'https://github/hris', 100, 'finished'),
(3, 2, 'Game of Thrones', '2015-10-14 06:47:30', '2015-10-22 18:30:00', '0000-00-00 00:00:00', 'https://github/game-of-thrones', 20, 'ongoing'),
(4, 2, 'Making Android App', '2015-10-14 06:55:33', '2015-10-14 18:30:00', '0000-00-00 00:00:00', 'https://github/android-app\r\n', 0, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `project_link`
--

CREATE TABLE IF NOT EXISTS `project_link` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `teamleader_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_link`
--

INSERT INTO `project_link` (`id`, `project_id`, `company_id`, `teamleader_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, NULL),
(3, 3, 2, NULL),
(4, 4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `task` varchar(5000) NOT NULL,
  `generator` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assign` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `company_id`, `task`, `generator`, `project_id`, `assign`, `status`) VALUES
(1, 1, 'Complete design by tomorrow.', 1, 1, 1, 'new'),
(2, 1, 'This is another task: Complete Coding by tomorrow night', 3, 2, 4, 'new'),
(3, 2, 'Task: test the module 1 by tomorrow night.', 2, 3, 3, 'new'),
(4, 2, 'New Task in the town: Watch the following like to learn: https://yoututbe.com/akljdklajfd', 4, 4, 6, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `team_leader`
--

CREATE TABLE IF NOT EXISTS `team_leader` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_leader`
--

INSERT INTO `team_leader` (`id`, `company_id`, `name`, `address`, `phone`) VALUES
(1, 1, 'John Zandan', 'USA', '1472583696'),
(2, 2, 'Noah Zandan', 'Kathmandu', '1234567890'),
(3, 1, 'Tyroin Lannister', 'Game of Thrones', '1234567899'),
(4, 2, 'Cercie Lannister', 'Game of thrones', '1569874258');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `problem` varchar(5000) NOT NULL,
  `issuer` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `company_id`, `problem`, `issuer`, `project_id`, `status`) VALUES
(1, 1, 'Problem in database connection.', 1, 1, 'open'),
(2, 1, 'color #125f14 not detected properly.', 4, 2, 'open'),
(3, 2, 'https://youtube/kasjdlkfjlf not open.Please provide the link properly.', 3, 3, 'open'),
(4, 2, 'problem in debugging software.', 6, 4, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_employee`
--

CREATE TABLE IF NOT EXISTS `ticket_employee` (
  `id` int(11) NOT NULL,
  `ticket_it` int(11) NOT NULL,
  `solver` int(11) NOT NULL,
  `solution` varchar(50000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `category`) VALUES
(1, 'Google', 'c822c1b63853ed273b89687ac505f9fa', 'company'),
(2, 'IBM', 'e757fd4fedc4fe825bb81b1b466a0947', 'company'),
(3, 'Ethan Hunt', 'ef1739c4a0a4716cb2428df9226d17db', 'employee'),
(4, 'Sasha Gray', '571a80a5e6b0df1689b768586d689fa4', 'employee'),
(5, 'Arrow', '9022a153e6190f10d9b57aa4232b8aea', 'employee'),
(6, 'The Flash', '1451d219fa47cff31e70a7027640b5b4', 'employee'),
(7, 'Will Smith', '7426656dca23061ee43c22bb236242e4', 'employee'),
(8, 'Matt Murdock', '03f27a0571db6763fa899a7d46e6d6ba', 'employee'),
(9, 'John Zandan', 'd305c813d65e413b6274ec4724a6ad9e', 'teamleader'),
(10, 'Noah Zandan', '8e59082a9f788d57583315bf01ed1390', 'teamleader'),
(11, 'Tyroin Lanister', '21089688102340eea9d8bc32de7d1c18', 'teamleader'),
(12, 'Cercie Lanniste', '28588b5a4eca5e5016376b3f891cdb31', 'teamleader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_project`
--
ALTER TABLE `employee_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_link`
--
ALTER TABLE `project_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_leader`
--
ALTER TABLE `team_leader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_employee`
--
ALTER TABLE `ticket_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `employee_project`
--
ALTER TABLE `employee_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_link`
--
ALTER TABLE `project_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `team_leader`
--
ALTER TABLE `team_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket_employee`
--
ALTER TABLE `ticket_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
