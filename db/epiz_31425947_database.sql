-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql208.byetcluster.com
-- Generation Time: Apr 28, 2022 at 06:15 AM
-- Server version: 10.3.27-MariaDB
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
-- Database: `epiz_31425947_database`
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
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL,
  `min` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `img`, `min`, `type`, `status`) VALUES
(8, 'images (9).jpeg', 218, 'whatsapp', 'yes'),
(9, 'images (9).jpeg', 218, 'whatsapp', 'yes'),
(10, 'IMG-20220406-WA0047.jpg', 213, 'whatsapp', 'yes');

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
  `author` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `date`, `title`, `des`, `thumbnail`, `author`, `status`) VALUES
(7, '2022-04-03', 'Victor Paul', 'The bazungula you are you still Y chromosomes you are you still have the same we are you still have the same we are you still have the same we are you still have the same we can always look at it again in a eeee you are you still have the opportunity of an account on which you are not always run e you are you still have your own virus checking you still have the same we are going eeee you are you still Y to get to t\r\n', 'images (5).jpeg', 'Paul', 'no'),
(8, '2022-04-03', 'Leo nip', 'Can you please send the money to be a good morning cutie am good at first but then I will be a good morning cutie am good with you and your family are doing great Sunday I am the love and miss you and your team to help me with the same you have a good time to be a member wa phic to be earned a reputation for a while back I will be in touch with the following you you can always report them to relevant to your pic and', 'images (5).jpeg', 'Paul', 'yes'),
(9, '2022-04-08', 'Victor', 'The only way we unaapply you have any questions or comments regarding my application to be ðŸ”¥ðŸ”¥ and consideration in advance of our lives in my application to be ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ðŸ”¥ and they are not the intended recipient you are not the intended recipient you are not the intended recipient', 'images (7).jpeg', 'Paul', 'yes'),
(10, '2022-04-08', 'Yeah', 'Uhjs you have any further questions feel free to contact me at your earliest convenience please see the attached file is scanned image in TIFF format PDF MMR and varicella vaccine and they are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient', 'IMG-20220406-WA0036.jpg', 'Paul', 'yes'),
(11, '2022-04-09', 'The intended recipient you are', 'The intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not the intended recipient you are not', '7743-HF-KK-benchmark-analytics-P1_2.gif', 'Victor(admin)', 'yes');

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
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `date` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `blogid` int(11) NOT NULL,
  `state` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `blogid`, `state`) VALUES
(4, 'Paul', 7, 'yes'),
(5, 'Paul', 10, 'yes'),
(6, 'Paul', 8, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `luckies`
--

CREATE TABLE `luckies` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `luckyno`
--

CREATE TABLE `luckyno` (
  `id` int(11) NOT NULL,
  `lucky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `luckyno`
--

INSERT INTO `luckyno` (`id`, `lucky`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

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
-- Table structure for table `mpesa_payments`
--

CREATE TABLE `mpesa_payments` (
  `id` int(11) NOT NULL,
  `TransactionType` varchar(255) DEFAULT NULL,
  `TransID` int(55) DEFAULT NULL,
  `TransTime` varchar(255) DEFAULT NULL,
  `TransAmount` int(15) DEFAULT NULL,
  `BusinessShortCode` int(11) DEFAULT NULL,
  `BillRefNumber` int(50) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `MSISDN` varchar(20) DEFAULT NULL,
  `FirstName` varchar(12) DEFAULT NULL,
  `MiddleName` varchar(12) DEFAULT NULL,
  `LastName` varchar(12) DEFAULT NULL,
  `OrgAccountBalance` int(11) DEFAULT NULL,
  `text` varchar(12) DEFAULT NULL,
  `tstamp` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpesa_payments`
--

INSERT INTO `mpesa_payments` (`id`, `TransactionType`, `TransID`, `TransTime`, `TransAmount`, `BusinessShortCode`, `BillRefNumber`, `InvoiceNumber`, `MSISDN`, `FirstName`, `MiddleName`, `LastName`, `OrgAccountBalance`, `text`, `tstamp`) VALUES
(1, NULL, NULL, NULL, 2000, NULL, NULL, NULL, '254794988992', NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, 5000, NULL, NULL, NULL, '254112605646', NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, 2000, NULL, NULL, NULL, '254794988992', NULL, NULL, NULL, NULL, NULL, NULL);

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
(150, 'Testing', 'Notification message', '', '0', '2021-05-09 02:00:00'),
(151, 'congratulations', 'congrats your withdrawal of105has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(152, 'congratulations', 'congrats your withdrawal of300has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(153, 'congratulations', 'congrats your withdrawal of300has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(154, 'congratulations', 'congrats your withdrawal of120has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(155, 'congratulations', 'congrats your withdrawal of20has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(156, 'congratulations', 'congrats your withdrawal of20has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(157, 'congratulations', 'congrats your withdrawal of20has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(158, 'congratulations', 'congrats your withdrawal of20has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(159, 'congratulations', 'congrats your withdrawal of20has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(160, 'congratulations', 'congrats your withdrawal of30has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(161, 'congratulations', 'congrats your withdrawal of1000has been received and is being processed', 'Paul', '1', '2022-04-02 00:00:00'),
(162, 'congratulations', 'congrats your withdrawal of120has been received and is being processed', 'Paul', '1', '2022-04-07 00:00:00'),
(163, 'congratulations', 'congrats your withdrawal of8095has been received and is being processed', 'Paul', '1', '2022-04-07 00:00:00'),
(164, 'congratulations', 'congrats your withdrawal of5000has been received and is being processed', 'Paul', '1', '2022-04-08 00:00:00'),
(165, 'congratulations', 'congrats your withdrawal of5000has been received and is being processed', 'Paul', '1', '2022-04-19 00:00:00'),
(166, 'congratulations', 'congrats your withdrawal of2454has been received and is being processed', 'Paul', '1', '2022-04-19 00:00:00'),
(167, 'congratulations', 'congrats your withdrawal of  has been received and is being processed', 'Paul', '1', '2022-04-20 00:00:00'),
(168, 'congratulations', 'congrats your withdrawal of  has been received and is being processed', 'Paul', '1', '2022-04-21 00:00:00'),
(169, 'congratulations', 'congrats your withdrawal of 0 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(170, 'congratulations', 'congrats your withdrawal of 0 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(171, 'congratulations', 'congrats your withdrawal of 0 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(172, 'congratulations', 'congrats your withdrawal of  has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(173, 'congratulations', 'congrats your withdrawal of 0 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(174, 'congratulations', 'congrats your withdrawal of 0 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(175, 'congratulations', 'congrats your withdrawal of 1000 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(176, 'congratulations', 'congrats your withdrawal of 837 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(177, 'congratulations', 'congrats your withdrawal of 816 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00'),
(178, 'congratulations', 'congrats your withdrawal of 1000 has been received and is being processed', 'Paul', '1', '2022-04-22 00:00:00');

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
(21, 6, '154.79.183.176', '', '', 10),
(22, 8, '41.60.236.233', '', '', 10),
(23, 8, '154.159.237.91', '', '', 10),
(24, 0, '154.159.237.132', '', '', 10),
(25, 0, '154.159.237.132', '', '', 10),
(26, 8, '154.159.237.132', '', '', 10),
(27, 8, '154.159.237.66', '', '', 10),
(28, 8, '154.159.237.181', '', '', 10),
(29, 8, '154.159.237.244', '', '', 10),
(30, 0, '154.159.237.244', '', '', 10),
(31, 7, '154.159.237.244', '', '', 10),
(32, 7, '154.159.237.255', '', '', 10),
(33, 7, '154.159.237.98', '', '', 10),
(34, 8, '154.159.237.27', '', '', 10),
(35, 8, '154.159.237.115', '', '', 10),
(36, 7, '154.159.237.141', '', '', 10),
(37, 7, '154.159.237.69', '', '', 10),
(38, 11, '154.159.237.54', 'Victor(admin)', 'Paul', 10),
(39, 10, '154.159.237.56', 'Paul', 'Paul', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Table structure for table `screenshots`
--

CREATE TABLE `screenshots` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `screenshot` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL,
  `amount` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screenshots`
--

INSERT INTO `screenshots` (`id`, `username`, `screenshot`, `status`, `amount`) VALUES
(1, 'Paul', 'Screenshot_20220415-190638.png', 'yes', ''),
(2, 'Paul', 'Screenshot_20220416-122211.png', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `tinypesa`
--

CREATE TABLE `tinypesa` (
  `ID` int(11) NOT NULL,
  `CheckoutRequestID` varchar(500) NOT NULL,
  `ResultCode` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `MpesaReceiptNumber` varchar(500) NOT NULL,
  `PhoneNumber` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
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
(1, 'Which continent is filled with black people?', 'Africa');

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

--
-- Dumping data for table `trivia2`
--

INSERT INTO `trivia2` (`id`, `quiz`, `ans`, `username`, `bonus`) VALUES
(8, 0, '', 'Paul', 5);

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
  `gpoints` int(11) NOT NULL,
  `bal` int(50) NOT NULL,
  `package` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `tel`, `country`, `ref`, `status`, `gpoints`, `bal`, `package`) VALUES
(6, 'Victor', 'victorpaul989@gmail.com', '64b1b5da5a7976a5c86629c879193d95', '0794988992', 'kenya', '', 'adm', 0, 0, ''),
(8, 'Paul', 'paulvictoraa@gmail.com', '64b1b5da5a7976a5c86629c879193d95', '254706235959', 'kenya', '', 'yes', 584, 600, 'platinum'),
(9, 'Yes', 'victorpaul989@gmail.com', 'da8bf557ea392ec9b9bf017574241550', '0126056046', 'kenya', '', 'no', 0, 0, ''),
(10, 'Yes', 'victorpaul989@gmail.com', 'da8bf557ea392ec9b9bf017574241550', '0112605646', 'kenya', '', 'no', 0, 0, ''),
(11, 'Scott', 'Scott@ml.nl', '1242901411032ff5d5f325d4f838915e', '254198376429', '', '', 'part', 0, 0, ''),
(15, 'Pul', 'P@k.com', '79fd2de662013089972f095d7f620529', '013236524285', '', 'Pul(part)', 'part', 0, 0, ''),
(14, 'Dedsec', 'billygoon1@gmail.com', '13ca6136764f4989d9bcaccd2927ed99', '0112605646', '', '', 'yes', 0, 0, 'platinum'),
(18, 'Pipo', 'pi@g.m', '447df5a3dc42fb8743f388bf67837776', '0794988992', 'kenya', '', 'yes', 0, 0, 'platinum');

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
  `phone` varchar(15) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawn`
--

INSERT INTO `withdrawn` (`id`, `username`, `phone`, `amount`) VALUES
(1, 'Paul', '254706235959', 20),
(2, 'Paul', '254706235959', 30),
(3, 'Paul', '254706235959', 1000),
(4, 'Paul', '254706235959', 120),
(5, 'Paul', '254706235959', 8095),
(6, 'Paul', '254706235959', 5000),
(7, 'Paul', '254706235959', 5000),
(8, 'Paul', '254706235959', 2454),
(9, 'Paul', '254706235959', 0),
(10, 'Paul', '254706235959', 0),
(11, 'Paul', '254706235959', 0),
(12, 'Paul', '254706235959', 0),
(13, 'Paul', '254706235959', 0),
(14, 'Paul', '254706235959', 0),
(15, 'Paul', '254706235959', 0),
(16, 'Paul', '254706235959', 0),
(17, 'Paul', '254706235959', 1000),
(18, 'Paul', '254706235959', 837),
(19, 'Paul', '254706235959', 816),
(20, 'Paul', '254706235959', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
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
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luckies`
--
ALTER TABLE `luckies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luckyno`
--
ALTER TABLE `luckyno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  ADD PRIMARY KEY (`transLoID`),
  ADD UNIQUE KEY `TransID` (`TransID`);

--
-- Indexes for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `screenshots`
--
ALTER TABLE `screenshots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tinypesa`
--
ALTER TABLE `tinypesa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `luckies`
--
ALTER TABLE `luckies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `luckyno`
--
ALTER TABLE `luckyno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mobile_payments`
--
ALTER TABLE `mobile_payments`
  MODIFY `transLoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpesa_payments`
--
ALTER TABLE `mpesa_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pageview`
--
ALTER TABLE `pageview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- AUTO_INCREMENT for table `screenshots`
--
ALTER TABLE `screenshots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tinypesa`
--
ALTER TABLE `tinypesa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trivia2`
--
ALTER TABLE `trivia2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `winwheel`
--
ALTER TABLE `winwheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `withdrawn`
--
ALTER TABLE `withdrawn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
