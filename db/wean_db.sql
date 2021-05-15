-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql102.byetcluster.com
-- Generation Time: May 14, 2021 at 09:21 PM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_28354383_gloom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `secondname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `secondname`, `password`) VALUES
(1, 'victor', 'Paul', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `des` varchar(500) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `date`, `title`, `des`, `thumbnail`, `author`) VALUES
(2, '2021-04-24', 'The limitations on saying that I have to meet with', 'images.png', 'images.png', 'Paul'),
(3, '2021-04-24', 'D', 'images (3).jpeg', 'images (3).jpeg', 'Paul'),
(4, '2021-04-24', 'The limitations on saying that I have to meet with', 'images (3).jpeg', 'images (3).jpeg', 'Paul'),
(5, '2021-04-24', 'Tu hii I will get paid for the limitations on sayi', 'download.jpeg', 'download.jpeg', 'Paul'),
(6, '2021-04-24', 'Web', 'Web hosting the limitations on saying that I have to meet with you and discuss the limitations to meet with you and discuss the limitations on saying that I have to meet with you and discuss the limitations on', '1280px-M-PESA_LOGO-01.svg.png', 'Paul');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bonus` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gaming_points`
--

CREATE TABLE `gaming_points` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `blogid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `blogid`) VALUES
(2, 'Paul', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_payments`
--

CREATE TABLE `mobile_payments` (
  `transLoID` int(11) NOT NULL,
  `TransactionType` varchar(10) NOT NULL,
  `TransID` varchar(10) NOT NULL,
  `TransTime` varchar(14) NOT NULL,
  `TransAmount` varchar(6) NOT NULL,
  `BusinessShortCode` varchar(6) NOT NULL,
  `BillRefNumber` varchar(6) NOT NULL,
  `InvoiceNumber` varchar(6) NOT NULL,
  `OrgAccountBalance` varchar(10) NOT NULL,
  `ThirdPartyTransID` varchar(10) NOT NULL,
  `MSISDN` varchar(14) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `MiddleName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `msg`, `username`, `active`, `date`) VALUES
(10, '', 'comment', 'Hi crush', '1', '2018-02-09 00:21:21'),
(11, 'Irene', 'like', '', '1', '2018-02-09 00:21:34'),
(12, 'Joe', 'like', '', '1', '2018-02-09 00:22:25'),
(13, 'Victor', 'like', '', '1', '2021-05-04 17:50:07'),
(14, '', 'comment', 'Wee', '1', '2021-05-04 17:50:28'),
(15, '', 'comment', 'Wee', '1', '2021-05-04 17:50:44'),
(150, 'Testing', 'Notification message', '', '0', '2021-05-09 02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `msg` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `topic`, `msg`) VALUES
(1, 'Testing', 'I love coding'),
(2, 'Victor', 'I love you'),
(3, 'Rt', 'Tyyu'),
(4, 'You', 'Yl');

-- --------------------------------------------------------

--
-- Table structure for table `pageview`
--

CREATE TABLE `pageview` (
  `id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `userip` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `viewer` varchar(100) NOT NULL,
  `bonus` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageview`
--

INSERT INTO `pageview` (`id`, `page`, `userip`, `author`, `viewer`, `bonus`) VALUES
(1, 6, '102.5.87.63', '', '', 10),
(2, 6, '154.155.228.166', '', '', 10),
(3, 6, '154.153.61.245', '', '', 10),
(4, 6, '154.79.232.164', '', '', 10),
(5, 6, '102.2.59.222', '', '', 10),
(6, 6, '154.152.97.229', '', '', 10),
(7, 6, '154.156.208.232', '', '', 10),
(8, 6, '102.1.56.77', '', '', 10),
(9, 6, '154.156.187.204', '', '', 10),
(10, 6, '154.159.47.187', '', '', 10),
(11, 6, '102.1.94.129', '', '', 10),
(12, 6, '154.156.185.209', '', '', 10),
(13, 6, '102.2.59.155', '', '', 10),
(14, 6, '154.159.158.103', '', '', 10),
(15, 6, '102.6.4.171', '', '', 10),
(16, 6, '102.5.4.203', '', '', 10),
(17, 6, '154.157.109.138', '', '', 10),
(18, 6, '154.155.127.214', '', '', 10),
(19, 6, '154.159.169.52', '', '', 10),
(20, 6, '154.153.216.93', '', '', 10),
(21, 6, '154.79.183.176', '', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `timestamp`) VALUES
(1, 'Yes, except the Dave Matthews Band doesn\'t rock.', 'The alien mothership is in orbit here. If we can hit that bullseye, the rest of the dominoes will fall like a house of cards. Checkmate. If rubbin\' frozen dirt in your crotch is wrong, hey I don\'t wanna be right.', '2018-02-20 07:29:46'),
(2, 'Saving the world with meals on wheels.', 'You know how I sometimes have really brilliant ideas? Heh-haa! Super squeaky bum time! I\'m the Doctor. Well, they call me the Doctor. I don\'t know why. I call me the Doctor too. I still don\'t know why.', '2018-02-20 07:29:46'),
(3, 'Tell him time is of the essence.', 'This man is a knight in shining armor. Watching ice melt. This is fun. Tell him time is of the essence. This man is a knight in shining armor. You look perfect. He taught me a code. To survive.', '2018-02-20 07:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `sendingusername` varchar(100) NOT NULL,
  `newusername` varchar(100) NOT NULL,
  `bonus` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trivia`
--

CREATE TABLE `trivia` (
  `id` int(11) NOT NULL,
  `quiz` varchar(400) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trivia`
--

INSERT INTO `trivia` (`id`, `quiz`, `ans`) VALUES
(0, '', ''),
(1, 'What continent is filled with black people?', 'Afrika');

-- --------------------------------------------------------

--
-- Table structure for table `trivia2`
--

CREATE TABLE `trivia2` (
  `id` int(11) NOT NULL,
  `quiz` int(11) NOT NULL,
  `ans` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bonus` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `country` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `status` varchar(4) NOT NULL,
  `bal` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `tel`, `country`, `ref`, `status`, `bal`) VALUES
(6, 'Victor', 'victorpaul989@gmail.com', '64b1b5da5a7976a5c86629c879193d95', '0794988992', 'kenya', '', 'no', 0),
(8, 'Paul', 'paulvictoraa@gmail.com', '64b1b5da5a7976a5c86629c879193d95', '254706235959', 'kenya', '', 'yes', 100);

-- --------------------------------------------------------

--
-- Table structure for table `winwheel`
--

CREATE TABLE `winwheel` (
  `id` int(11) NOT NULL,
  `username` int(100) NOT NULL,
  `bonus` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winwheel`
--

INSERT INTO `winwheel` (`id`, `username`, `bonus`, `date`, `time`) VALUES
(1, 0, 20, '2021-05-12', '05:23:55'),
(2, 0, 20, '2021-05-12', '05:23:56'),
(3, 0, 20, '2021-05-12', '05:23:57'),
(4, 0, 20, '2021-05-12', '05:23:57'),
(5, 0, 20, '2021-05-12', '05:23:58'),
(6, 0, 20, '2021-05-12', '05:23:58'),
(7, 0, 20, '2021-05-12', '05:23:59'),
(8, 0, 20, '2021-05-12', '05:24:00'),
(9, 0, 20, '2021-05-12', '05:24:00'),
(10, 0, 20, '2021-05-12', '05:24:01'),
(11, 0, 20, '2021-05-12', '05:24:01'),
(12, 0, 20, '2021-05-12', '05:24:02'),
(13, 0, 20, '2021-05-12', '05:24:03'),
(14, 0, 20, '2021-05-12', '05:24:04'),
(15, 0, 20, '2021-05-12', '05:24:04'),
(16, 0, 20, '2021-05-12', '05:24:05'),
(17, 0, 20, '2021-05-12', '05:24:06'),
(18, 0, 20, '2021-05-12', '05:24:06'),
(19, 0, 20, '2021-05-12', '05:24:07'),
(20, 0, 20, '2021-05-12', '05:24:08'),
(21, 0, 20, '2021-05-12', '05:24:08'),
(22, 0, 20, '2021-05-12', '05:24:09'),
(23, 0, 20, '2021-05-12', '05:24:10'),
(24, 0, 20, '2021-05-12', '05:24:10'),
(25, 0, 20, '2021-05-12', '05:24:11'),
(26, 0, 20, '2021-05-12', '05:24:12'),
(27, 0, 20, '2021-05-12', '05:24:12'),
(28, 0, 20, '2021-05-12', '05:24:13'),
(29, 0, 20, '2021-05-12', '05:24:14'),
(30, 0, 20, '2021-05-12', '05:24:14'),
(31, 0, 20, '2021-05-12', '05:24:15'),
(32, 0, 20, '2021-05-12', '05:24:16'),
(33, 0, 20, '2021-05-12', '05:24:16'),
(34, 0, 20, '2021-05-12', '05:24:17'),
(35, 0, 20, '2021-05-12', '05:26:16'),
(36, 0, 20, '2021-05-12', '05:26:16'),
(37, 0, 20, '2021-05-12', '05:26:18'),
(38, 0, 20, '2021-05-12', '05:26:19'),
(39, 0, 20, '2021-05-12', '05:26:20'),
(40, 0, 20, '2021-05-12', '05:26:21'),
(41, 0, 20, '2021-05-12', '05:26:22'),
(42, 0, 20, '2021-05-12', '05:26:22'),
(43, 0, 20, '2021-05-12', '05:26:23'),
(44, 0, 20, '2021-05-12', '05:26:24'),
(45, 0, 20, '2021-05-12', '05:26:24'),
(46, 0, 20, '2021-05-12', '05:26:25'),
(47, 0, 20, '2021-05-12', '05:26:26'),
(48, 0, 20, '2021-05-12', '05:26:27'),
(49, 0, 20, '2021-05-12', '05:26:28'),
(50, 0, 20, '2021-05-12', '05:26:29'),
(51, 0, 20, '2021-05-12', '05:26:29'),
(52, 0, 20, '2021-05-12', '05:26:30'),
(53, 0, 20, '2021-05-12', '05:26:31'),
(54, 0, 20, '2021-05-12', '05:26:31'),
(55, 0, 20, '2021-05-12', '05:26:32'),
(56, 0, 20, '2021-05-12', '05:26:33'),
(57, 0, 20, '2021-05-12', '05:26:34'),
(58, 0, 20, '2021-05-12', '05:26:35'),
(59, 0, 20, '2021-05-12', '05:26:35'),
(60, 0, 20, '2021-05-12', '05:26:36'),
(61, 0, 20, '2021-05-12', '05:26:37'),
(62, 0, 20, '2021-05-12', '05:26:38'),
(63, 0, 20, '2021-05-12', '05:26:39'),
(64, 0, 20, '2021-05-12', '05:26:40'),
(65, 0, 20, '2021-05-12', '05:26:40'),
(66, 0, 20, '2021-05-12', '05:26:41'),
(67, 0, 20, '2021-05-12', '05:26:42'),
(68, 0, 20, '2021-05-12', '05:26:44'),
(69, 0, 20, '2021-05-12', '05:26:46'),
(70, 0, 20, '2021-05-12', '05:26:46'),
(71, 0, 20, '2021-05-12', '05:26:47'),
(72, 0, 20, '2021-05-12', '05:26:49'),
(73, 0, 20, '2021-05-12', '05:26:49'),
(74, 0, 20, '2021-05-12', '05:26:50'),
(75, 0, 20, '2021-05-12', '05:26:51'),
(76, 0, 20, '2021-05-12', '05:26:51'),
(77, 0, 20, '2021-05-12', '05:26:52'),
(78, 0, 20, '2021-05-12', '05:26:52'),
(79, 0, 20, '2021-05-12', '05:26:53'),
(80, 0, 20, '2021-05-12', '05:26:53'),
(81, 0, 20, '2021-05-12', '05:26:54'),
(82, 0, 20, '2021-05-12', '05:26:54'),
(83, 0, 20, '2021-05-12', '05:26:55'),
(84, 0, 20, '2021-05-12', '05:26:56'),
(85, 0, 20, '2021-05-12', '05:26:56'),
(86, 0, 20, '2021-05-12', '05:26:57'),
(87, 0, 20, '2021-05-12', '05:26:58'),
(88, 0, 20, '2021-05-12', '05:26:58'),
(89, 0, 20, '2021-05-12', '05:26:59'),
(90, 0, 20, '2021-05-12', '05:27:00'),
(91, 0, 20, '2021-05-12', '05:27:00'),
(92, 0, 20, '2021-05-12', '05:27:01'),
(93, 0, 20, '2021-05-12', '05:27:02'),
(94, 0, 20, '2021-05-12', '05:27:02'),
(95, 0, 20, '2021-05-12', '05:27:03'),
(96, 0, 20, '2021-05-12', '05:27:03'),
(97, 0, 20, '2021-05-12', '05:27:04'),
(98, 0, 20, '2021-05-12', '05:27:05'),
(99, 0, 20, '2021-05-12', '05:27:05'),
(100, 0, 20, '2021-05-12', '05:27:06'),
(101, 0, 20, '2021-05-12', '05:27:06'),
(102, 0, 20, '2021-05-12', '05:27:07'),
(103, 0, 20, '2021-05-12', '05:32:12'),
(104, 0, 20, '2021-05-12', '05:32:27'),
(105, 0, 20, '2021-05-12', '05:32:35'),
(106, 0, 20, '2021-05-12', '05:32:42'),
(107, 0, 20, '2021-05-12', '05:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawn`
--

CREATE TABLE `withdrawn` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaming_points`
--
ALTER TABLE `gaming_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  ADD PRIMARY KEY (`transLoID`),
  ADD UNIQUE KEY `TransID` (`TransID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageview`
--
ALTER TABLE `pageview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivia`
--
ALTER TABLE `trivia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trivia2`
--
ALTER TABLE `trivia2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winwheel`
--
ALTER TABLE `winwheel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawn`
--
ALTER TABLE `withdrawn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  MODIFY `transLoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pageview`
--
ALTER TABLE `pageview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trivia2`
--
ALTER TABLE `trivia2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `winwheel`
--
ALTER TABLE `winwheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `withdrawn`
--
ALTER TABLE `withdrawn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
