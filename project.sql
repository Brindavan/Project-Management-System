-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 03:05 AM
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
(1, 'Google', '', '', 'C:\\Users\\Raj Shrestha\\Desktop\\google'),
(2, 'IBM', '', '', 'C:\\Users\\Raj Shrestha\\Desktop\\google1');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `company_id`, `name`, `address`, `phone`) VALUES
(1, 1, 'Amit', 'Yelahanka,Bangalore', '8892129450'),
(2, 1, 'Bunny', 'Yelahanka,Bangalore', '8892129451'),
(3, 1, 'Robert', 'Yelahanka,Bangalore', '8892129452'),
(4, 1, 'Albert', 'Yelahanka,Bangalore', '8892129453'),
(5, 1, 'Alejandro', 'Yelahanka,Bangalore', '8892129454'),
(6, 1, 'Herbert', 'Yelahanka,Bangalore', '8892129455'),
(7, 1, 'James', 'Yelahanka,Bangalore', '8892129456'),
(8, 1, 'Gaby', 'Yelahanka,Bangalore', '8872129457'),
(9, 2, 'Bernard', 'Yelahanka,Bangalore', '8892129458'),
(10, 2, 'Richard', 'Yelahanka,Bangalore', '8892129459'),
(11, 2, 'Alex', 'Yelahanka,Bangalore', '8892129460'),
(12, 2, 'Jemma', 'Yelahanka,Bangalore', '8892129461'),
(13, 2, 'Slevin', 'Yelahanka,Bangalore', '8892129462'),
(14, 2, 'Brando', 'Yelahanka,Bangalore', '8892129463'),
(15, 2, 'Ravi', 'Yelahanka,Bangalore', '8892129464'),
(16, 2, 'Sergei', 'Yelahanka,Bangalore', '8892129465');

-- --------------------------------------------------------

--
-- Table structure for table `employee_project`
--

CREATE TABLE IF NOT EXISTS `employee_project` (
  `id` int(11) NOT NULL,
  `teamleader_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_project`
--

INSERT INTO `employee_project` (`id`, `teamleader_id`, `project_id`, `employee_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 2, 2, 5),
(6, 2, 2, 6),
(7, 2, 2, 7),
(8, 2, 2, 8),
(9, 3, 3, 9),
(10, 3, 3, 10),
(11, 3, 3, 11),
(12, 3, 3, 12),
(13, 4, 4, 13),
(14, 4, 4, 14),
(15, 4, 4, 15),
(16, 4, 4, 16);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `body`, `sender`, `project_id`) VALUES
(1, 'Success', 'Coming together is a beginning;keeping together is a progress;working together is success.\r\n                            Henry Ford\r\n', 1, 1),
(2, 'Motivation', 'Failure is just a bend on the road,success waits at the end of the destination.', 2, 3),
(3, 'Price of Success', 'The price of success is hard work, dedication to the job at hand, and the determination that whether we win or lose, we have applied the best of ourselves to the task at hand.', 1, 2),
(4, 'Dream', 'A dream doesn''t become reality through magic; it takes sweat, determination and hard work.\r\nColin Powell', 2, 4),
(5, 'Measuring Success', 'Success is not measured by what you accomplish, but by the opposition you have encountered, and the courage with which you have maintained the struggle against overwhelming odds.\r\nOrison Swett Marden', 1, 1),
(6, 'Think', 'Think twice before you speak, because your words and influence will plant the seed of either success or failure in the mind of another.\r\nNapoleon Hill', 1, 2),
(7, 'Plans', '“Opportunities are usually disguised as hard work, so most people don’t recognize them.” —Ann Landers', 2, 3),
(8, 'The Ladder', 'The ladder of success is best climbed by stepping on the rungs of opportunity.\r\nAyn Rand', 2, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `company_id`, `name`, `start_date`, `finish_date`, `actual_finish_date`, `url`, `completion`, `status`) VALUES
(1, 1, 'Exodus', '2015-11-08 14:21:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'www.exodus.com', 60, 'ongoing'),
(2, 1, 'Genesis', '2015-11-08 14:21:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'www.genesis.com', 25, 'ongoing'),
(3, 2, 'bluesky', '2015-11-08 14:21:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'www.bluesky.com', 90, 'ongoing'),
(4, 2, 'tirangaa', '2015-11-08 14:26:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'www.tirangaa.com', 10, 'ongoing'),
(5, 1, 'Online Job Portal', '2015-09-30 18:30:00', '2015-11-04 01:30:00', '2015-11-11 22:30:00', 'https://online-job-portal/source-code\r\n', 100, 'finished');

-- --------------------------------------------------------

--
-- Table structure for table `project_link`
--

CREATE TABLE IF NOT EXISTS `project_link` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `teamleader_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_link`
--

INSERT INTO `project_link` (`id`, `project_id`, `company_id`, `teamleader_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 2, 3),
(4, 4, 2, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `company_id`, `task`, `generator`, `project_id`, `assign`, `status`) VALUES
(1, 1, 'Coding', 2, 2, 4, 'solved'),
(2, 2, 'Designing Web Interface', 4, 4, 15, 'ongoing'),
(3, 1, 'COmplete the First UI design...layout only', 1, 1, 1, 'ongoing'),
(4, 1, 'Make the database connection', 1, 1, 1, 'solved'),
(5, 1, 'Code the first module', 1, 1, 1, 'ongoing');

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
(1, 1, 'Emma', 'Yelahanka,Bangalore', '8892129466'),
(2, 1, 'Jimmy', 'Yelahanka,Bangalore', '8892129467'),
(3, 2, 'Jenny', 'Yelahanka,Bangalore', '8892129468'),
(4, 2, 'Krishna', 'Yelahanka,Bangalore', '8892129469');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `company_id`, `problem`, `issuer`, `project_id`, `status`) VALUES
(1, 1, 'Server not found', 1, 1, 'solved'),
(2, 1, 'Database not connected', 5, 2, 'open'),
(3, 1, 'Page not Loading', 1, 1, 'open'),
(4, 1, 'Array Index Out of Bound', 6, 2, 'solved'),
(5, 2, 'Unable to log in', 10, 3, 'open'),
(6, 2, 'Unable to link data objects', 12, 3, 'open'),
(7, 2, 'Runtime Error', 14, 4, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_employee`
--

CREATE TABLE IF NOT EXISTS `ticket_employee` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `solver` int(11) NOT NULL,
  `solution` varchar(50000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_employee`
--

INSERT INTO `ticket_employee` (`id`, `ticket_id`, `solver`, `solution`) VALUES
(1, 1, 4, 'Check the connection'),
(2, 2, 0, ''),
(3, 3, 7, 'check Internet setting'),
(4, 4, 8, 'Check the parameters'),
(5, 5, 0, ''),
(6, 6, 0, ''),
(7, 7, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `category`) VALUES
(1, 'google', 'c822c1b63853ed273b89687ac505f9fa', 'company'),
(2, 'ibm', 'e757fd4fedc4fe825bb81b1b466a0947', 'company'),
(3, 'emma', '00a809937eddc44521da9521269e75c6', 'teamleader'),
(4, 'jimmy', 'c2fe677a63ffd5b7ffd8facbf327dad0', 'teamleader'),
(5, 'jenny', 'ebe6941ee8a10c14dc933ae37a0f43fc', 'teamleader'),
(6, 'krishna', '243bd1ce0387f18005abfc43b001646a', 'teamleader'),
(7, 'amit', '0cb1eb413b8f7cee17701a37a1d74dc3', 'employee'),
(8, 'bunny', '20ee80e63596799a1543bc9fd88d8878', 'employee'),
(9, 'robert', '684c851af59965b680086b7b4896ff98', 'employee'),
(10, 'albert', '6c5bc43b443975b806740d8e41146479', 'employee'),
(11, 'alejandro', 'e052450f29b2e0e9a53fd4eb389e25a9', 'employee'),
(12, 'herbert', '74b0328a08e7d9e213b1ea77ba32198d', 'employee'),
(13, 'james', 'b4cc344d25a2efe540adbf2678e2304c', 'employee'),
(14, 'gaby', '68e18c13237884aa15c9bbc988be74ce', 'employee'),
(15, 'bernard', '78d6810e1299959f3a8db157045aa926', 'employee'),
(16, 'richard', '6ae199a93c381bf6d5de27491139d3f9', 'employee'),
(17, 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 'employee'),
(18, 'jemma', '6280974210588f571d70eaff7af6aa07', 'employee'),
(19, 'slevin', '0704e77371a053de51b774f14e67f53c', 'employee'),
(20, 'brando', '16132382c21299b781dfaf024b541e4d', 'employee'),
(21, 'ravi', '63dd3e154ca6d948fc380fa576343ba6', 'employee'),
(22, 'sergei', 'ef4a2f4ab1252d58ac1701b6494193b8', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `employee_project`
--
ALTER TABLE `employee_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_link`
--
ALTER TABLE `project_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `team_leader`
--
ALTER TABLE `team_leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ticket_employee`
--
ALTER TABLE `ticket_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
