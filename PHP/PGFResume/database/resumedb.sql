-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 02:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resumedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `profile_id`, `name`, `level`, `institution`, `date_start`, `date_end`) VALUES
(1, 1, 'Application Development', 'PgD', 'Lambton College', '2017-07-04 00:00:00', '2019-02-08 00:00:00'),
(2, 1, 'System Development', 'BSc', 'Unibratec College', '2009-09-04 00:00:00', '2012-10-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Portuguese'),
(2, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `language_profile`
--

CREATE TABLE `language_profile` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language_profile`
--

INSERT INTO `language_profile` (`id`, `profile_id`, `language_id`, `level`) VALUES
(1, 1, 1, 'Native'),
(2, 1, 2, 'Fluent');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `img_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `profile_id`, `img_location`) VALUES
(1, 1, 'resume/resume1.jpg'),
(2, 1, 'resume/resume2.jpg'),
(3, 1, 'resume/resume3.jpg'),
(4, 1, 'resume/resume4.jpg'),
(5, 1, 'resume/resume5.jpg'),
(6, 1, 'resume/resume6.jpg'),
(7, 1, 'resume/resume7.jpg'),
(8, 1, 'resume/resume8.jpg'),
(9, 1, 'resume/resume9.jpg'),
(10, 1, 'resume/resume10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `img_location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `occupation`, `city`, `state`, `email`, `phone`, `linkedin`, `github`, `about`, `img_location`) VALUES
(1, 'Pedro Fernandes', 'Software Engineer', 'Toronto', 'ON', 'pedro92.gf@gmail.com', '416 505 2097', 'https://www.linkedin.com/in/pedro-fernandes-a62a9431', 'https://github.com/pedrofg', 'Software Engineer with thorough hands-on experience in all level of testing, including performance, functional, integration, system, regression, and user experience testing. Supportive and enthusiastic team player dedicated to streamlining processes and efficiently resolving project issues. Willing to take ownership of core components.', 'pgf.png');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`) VALUES
(2, 'Java'),
(3, 'Android'),
(4, 'Javascript'),
(5, 'HTML'),
(6, 'CSS');

-- --------------------------------------------------------

--
-- Table structure for table `skill_profile`
--

CREATE TABLE `skill_profile` (
  `id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `years` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_profile`
--

INSERT INTO `skill_profile` (`id`, `skill_id`, `profile_id`, `years`) VALUES
(1, 2, 1, 5),
(2, 3, 1, 4),
(3, 4, 1, 3),
(4, 5, 1, 2),
(5, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_admin` binary(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `profile_id`, `date_start`, `date_end`, `position`, `company`) VALUES
(1, 1, '2017-04-04 00:00:00', NULL, 'Software Engineer and Team Leader', 'Geolance Tech'),
(2, 1, '2012-10-04 00:00:00', '2016-10-04 00:00:00', 'Software Engineer', 'Samsung CIN/Ufpe'),
(3, 1, '2011-10-04 00:00:00', '2012-10-04 00:00:00', 'Traineer', 'Samsung CIN/Ufpe');

-- --------------------------------------------------------

--
-- Table structure for table `work_link`
--

CREATE TABLE `work_link` (
  `id` int(11) NOT NULL,
  `work_id` int(11) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_link`
--

INSERT INTO `work_link` (`id`, `work_id`, `link`, `name`) VALUES
(1, 1, 'https://www.geolance.tech/', 'Geolance Website'),
(2, 1, 'https://www.geolance.tech/project-evaluation', ' Geolance Calculator'),
(3, 1, 'https://marketplace.geolance.tech/', 'Geolance Marketplace'),
(4, 2, 'https://play.google.com/store/apps/details?id=br.org.sidi.aplicacoesbrasil.widget&hl=en', 'Destaques'),
(5, 3, 'https://play.google.com/store/apps/details?id=com.samsung.mobilesupport', 'Assistant Samsung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_profile`
--
ALTER TABLE `language_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_profile`
--
ALTER TABLE `skill_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_link`
--
ALTER TABLE `work_link`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `language_profile`
--
ALTER TABLE `language_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `skill_profile`
--
ALTER TABLE `skill_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_link`
--
ALTER TABLE `work_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
