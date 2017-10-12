-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 11:26 PM
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
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `level`, `institution`, `date_start`, `date_end`) VALUES
(1, 'Application Development', 'PgD', 'Lambton College', '2017-07-04 00:00:00', '2019-02-08 00:00:00'),
(2, 'System Development', 'BSc', 'Unibratec College', '2009-09-04 00:00:00', '2012-10-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`, `level`) VALUES
(1, 'Portuguese', 'Native'),
(2, 'English', 'Fluent');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `date`) VALUES
(3, 2, 9, '2017-10-10 19:04:55'),
(4, 2, 3, '2017-10-10 19:04:55'),
(5, 2, 4, '2017-10-10 19:07:17'),
(6, 3, 4, '2017-10-10 19:20:47'),
(7, 3, 9, '2017-10-10 19:20:47'),
(8, 2, 10, '2017-10-12 15:46:51'),
(9, 4, 3, '2017-10-12 16:13:38'),
(10, 4, 2, '2017-10-12 16:13:38'),
(11, 4, 1, '2017-10-12 16:22:42'),
(12, 5, 12, '2017-10-12 17:25:46'),
(13, 5, 13, '2017-10-12 17:25:46'),
(14, 5, 11, '2017-10-12 17:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `img_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `img_location`) VALUES
(1, 'resume/resume1.jpg'),
(2, 'resume/resume2.jpg'),
(3, 'resume/resume3.jpg'),
(4, 'resume/resume4.jpg'),
(5, 'resume/resume5.jpg'),
(6, 'resume/resume6.jpg'),
(7, 'resume/resume7.jpg'),
(8, 'resume/resume8.jpg'),
(9, 'resume/resume9.jpg'),
(10, 'resume/resume10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` decimal(10,2) DEFAULT '0.00',
  `img_location` varchar(100) DEFAULT NULL,
  `file_location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `value`, `img_location`, `file_location`) VALUES
(1, 'My App', '250.50', 'products/social_networks_equalizer-1920x1080.jpg', 'products/app.apk'),
(2, 'Book PHP', '55.00', 'products/thumb-1920-499786.png', 'products/Amazon_refund_wifi_adapter.pdf'),
(3, 'WordPress Website', '1000.00', 'products/wordpress.png', 'products/wordpress.rar'),
(4, 'Landing Page', '200.00', 'products/landing_page.png', 'products/landing_page.html'),
(9, 'App Designer', '850.00', 'products/designer_app.jpg', NULL),
(10, 'Work Hours ( 50h )', '1500.00', 'products/work_hours.jpg', NULL),
(11, 'NodeJS Api', '6749.99', 'products/node_js_api.png', 'products/node_js_api.png'),
(12, 'Movies Feed Android App', '5000.00', 'products/moviesfeed.png', 'products/moviesfeed.apk'),
(13, 'Work Hours ( 30h )', '900.00', 'products/work_hours.jpg', NULL),
(14, 'GIT Course', '500.00', 'products/git.png', 'products/git_link.txt');

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
  `name` varchar(50) DEFAULT NULL,
  `years` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`, `years`) VALUES
(2, 'Java', 5),
(3, 'Android', 4),
(4, 'Javascript', 3),
(5, 'HTML', 2),
(6, 'CSS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `is_admin`) VALUES
(1, 'admin@resume.com', 'admin', '123456', 1),
(2, 'test@gmail.com', 'test', '123456', 0),
(3, 'pedro@gmail.com', 'pedrogf', '123456', 0),
(4, 'johndoe@outlook.com', 'johndoe', '123456', 0),
(5, 'kate@gmail.com', 'kate', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `date_start`, `date_end`, `position`, `company`) VALUES
(1, '2017-04-04 00:00:00', NULL, 'Software Engineer and Team Leader', 'Geolance Tech'),
(2, '2012-10-04 00:00:00', '2016-10-04 00:00:00', 'Software Engineer', 'Samsung CIN/Ufpe'),
(3, '2011-10-04 00:00:00', '2012-10-04 00:00:00', 'Traineer', 'Samsung CIN/Ufpe');

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
