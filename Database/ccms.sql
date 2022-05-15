-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 09:44 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `token` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `mobile`, `password`, `image`, `token`, `status`) VALUES
(24, 'Muhammad Nehal Khan', 'knehal288@gmail.com', 3463207951, '$2y$10$WOPaPD4QQs7dhqGNdAqDeupYv/E5pzMuuipprIXX.0uJB5Ko.JoQ6', 'upload/default.jpg', '0df46089374433add49fcd729dbabe', 'active'),
(27, 'Administrator', 'admin@gmail.com', 43434343434, '$2y$10$/3Z/QhPwXPshv1i3rRAD8eFOq0PvK6mYXsFjqcjGoY02AkR9zkLzu', 'upload/default.jpg', '79410ac26817a6cb86657a68fbb983', 'active'),
(28, 'Syed Mohammad Aun', 'mohammadaun1215@gmail.com', 3352941301, '$2y$10$N7JtwiHwxbKoA6PF1xJnRen7UlcoDVKV4BgIZN6o1TkeFARF7o/Wq', 'upload/default.jpg', 'c19f7f3e8a426227a1fb8cab80b038', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `ground_id` int(11) NOT NULL,
  `no_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `name`, `start_date`, `start_time`, `end_time`, `ground_id`, `no_of_seats`) VALUES
(5, '1810C2', '2021-05-20', '03:38:00', '17:02:00', 2, 55),
(7, '1810C54', '2021-05-06', '19:49:00', '00:00:00', 3, 22),
(8, '1810C7', '0000-00-00', '16:51:00', '00:00:00', 3, 77),
(12, 'yuuuuuuu', '0000-00-00', '22:14:00', '00:00:00', 5, 14),
(13, 'ffff4535', '2021-05-15', '17:21:00', '00:00:00', 2, 88),
(14, 'testbatch', '2021-05-28', '11:00:00', '00:00:00', 3, 25),
(15, 'testbatch', '2021-05-28', '11:00:00', '13:00:00', 3, 25);

-- --------------------------------------------------------

--
-- Table structure for table `batch_reg`
--

CREATE TABLE `batch_reg` (
  `br_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_age` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_reg`
--

INSERT INTO `batch_reg` (`br_id`, `user_name`, `user_email`, `user_age`, `batch_id`) VALUES
(1, 'Muhammad Nehal Khan', 'knehal288@gmail.com', 21, 5),
(7, 'muhammad nehal', 'admin@gmail.com', 0, 13),
(8, 'muhammad nehal', 'knehal288@gmail.com', 20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_mobile` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `ground_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_name`, `customer_email`, `customer_mobile`, `date`, `is_approved`, `ground_id`) VALUES
(1, 'Muhammad Nehal Khan', 'knehal288@gmail.com', 3463207951, '2021-05-28', 1, 3),
(4, 'gdgfs', 'gsgdfg', 3463207951, '2021-05-31', 0, 3),
(5, 'Muhammad Nehal', 'knehal288@gmail.com', 54354534534, '2021-06-05', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `name`, `email`, `date`, `message`) VALUES
(1, 'muhammad nehal', 'knehal288@gmail.com', '2021-06-04 23:34:31', ' sdfsdfsdfsdf dsfsdfsdfd fdsfdsfsdfsd'),
(2, 'muhammad nehal', 'knehal288@gmail.com', '2021-06-04 23:35:25', 'sadasdsdasdas dsadasdasdasd sadasdsd'),
(3, 'muhammad nehal', 'knehal288@gmail.com', '2021-06-04 23:36:08', 'sadasdsdasdas dsadasdasdasd sadasdsd'),
(4, 'muhammad nehal', 'knehal288@gmail.com', '2021-06-04 23:36:31', 'errr'),
(5, 'muhammad nehal', 'knehal288@gmail.com', '2021-06-04 23:39:40', 'uuuuuuuuuu');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `detail` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `ground_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `title`, `date`, `detail`, `image`, `ground_id`) VALUES
(4, 'fsdfsadf', '2021-05-29 12:58:00', 'asfsf asdfa asfd', 'upload/download.jpg', 2),
(6, 'fsdfsadffffff', '2021-05-30 03:31:00', 'fsdaaaaaaaaaaaaaaaaaaaa', 'upload/231a0-15487375130145-800.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE `ground` (
  `ground_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `capacity` int(11) NOT NULL,
  `booking_cost` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`ground_id`, `name`, `location`, `capacity`, `booking_cost`, `description`, `image`) VALUES
(2, 'Gaddafi Stadium ', 'Lahore', 10000, 50000, 'This stadium is located in Lahore, Pakistan', 'upload/e21c34440c1f10ac09515fc58e891396.jpg'),
(3, 'Iqbal Stadium', 'Faisalabad', 20000, 90000, 'This stadium is located in Faisalabad, Pakistan', 'upload/e21c34440c1f10ac09515fc58e891396.jpg'),
(5, 'Jinnah National Stadium', 'Sialkot', 8000, 65645, 'Jinnah Stadium in Sialkot was built by the British in the 1920s', 'upload/e21c34440c1f10ac09515fc58e891396.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `city` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `registration_date` datetime NOT NULL,
  `role` varchar(250) NOT NULL,
  `educational_qualification` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `father_name`, `email`, `date_of_birth`, `mobile`, `city`, `address`, `registration_date`, `role`, `educational_qualification`, `image`) VALUES
(1, 'virat', 'kohli', 'test@gmail.com', '2021-05-05', 324234234, 'dehli', 'Black Mountain Rd 18b', '2021-05-11 00:00:00', 'batsman', 'inter', 'upload/download.jpg'),
(3, 'muhammad nehal', 'muhammad shahid', 'knehal288@gmail.com', '2000-01-27', 3463207951, 'karachi', 'SP 15/6 Asif colony', '2021-05-18 00:00:00', 'All rounder', 'BCOM', 'upload\\default.jpg'),
(4, '1810C54', 'gfdgdf', 'knehal288@gmail.com', '1995-02-14', 45345345345, 'karachi', 'gfgdfgs', '2021-06-04 22:17:40', 'All rounder', 'bcom', 'upload/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `detail` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `date`, `detail`, `image`) VALUES
(1, 'jjjjjjjjjjjjjjjjj', '2021-05-14 13:02:00', 'sfdfdvdfvzvzgrtreg', 'upload/e21c34440c1f10ac09515fc58e891396.jpg'),
(3, 'hhhhhhhhhhhhhhhhhh', '2021-06-26 10:05:00', 'asddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'upload/e21c34440c1f10ac09515fc58e891396.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_detail` varchar(250) NOT NULL,
  `notice_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_detail`, `notice_datetime`) VALUES
(1, 'Tomorrow club will remain closed due to heavy rain.', '2021-06-04 17:06:11'),
(2, 'sfsdfsdfsdfsd', '2021-06-04 17:13:40'),
(3, 'gdsgfggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2021-06-04 08:23:52'),
(4, 'dddddddddddddddddddddddddddddddddddddd', '2021-06-04 20:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photo_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `upload_date` datetime NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photo_id`, `title`, `description`, `upload_date`, `image`) VALUES
(2, 'world cup 1992', 'Pakistan won 1992', '0000-00-00 00:00:00', 'upload/World-Cup-Final-a-wearandcheer.com_-640x423.jpg'),
(3, 'world cup 1992', 'Pakistan won 1992 cricket world cup ', '0000-00-00 00:00:00', 'upload/default.jpg'),
(4, 'world cup 1992', 'Pakistan won 1992 cricket world cup ', '2021-05-19 17:44:00', 'upload/download.jpg'),
(5, 'world cup 1992', 'Pakistan won 1992 cricket world cup ', '2021-05-19 05:44:56', 'upload/unnamed.png'),
(6, 'test', 'sfsdfsdfss', '2021-05-21 07:37:51', 'upload/World-Cup-Final-a-wearandcheer.com_-640x423.jpg'),
(7, 'test2', 'sdsds', '2021-05-21 07:39:50', 'upload/download.jpg'),
(8, 'cricket', 'ffffffffffffffffffffff', '2021-05-21 10:03:56', 'upload/star-india.jpg'),
(9, 'Sports India Cricket League', 'Sports India Cricket League', '2021-05-24 09:42:59', 'upload/231a0-15487375130145-800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `sub_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `sub_email`) VALUES
(1, 'knehal288@gmail.com'),
(2, 'knehal288@gmail.com'),
(3, 'knehal288@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `upload_date` datetime NOT NULL,
  `video` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `title`, `description`, `upload_date`, `video`) VALUES
(1, 'test342', 'srerfsfsdfsd', '2021-05-30 00:00:00', 'upload/f.mp4'),
(3, 'hhfddd', 'tesdfdfdfdfdfddf', '2021-05-30 00:00:00', 'upload/f.mp4'),
(5, 'fdf', 'fsdfsdf', '2021-05-30 11:55:42', 'upload/f.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `ground_id` (`ground_id`);

--
-- Indexes for table `batch_reg`
--
ALTER TABLE `batch_reg`
  ADD PRIMARY KEY (`br_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `b` (`ground_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `e` (`ground_id`);

--
-- Indexes for table `ground`
--
ALTER TABLE `ground`
  ADD PRIMARY KEY (`ground_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `batch_reg`
--
ALTER TABLE `batch_reg`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ground`
--
ALTER TABLE `ground`
  MODIFY `ground_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `ground_id` FOREIGN KEY (`ground_id`) REFERENCES `ground` (`ground_id`);

--
-- Constraints for table `batch_reg`
--
ALTER TABLE `batch_reg`
  ADD CONSTRAINT `batch_reg_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `b` FOREIGN KEY (`ground_id`) REFERENCES `ground` (`ground_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `e` FOREIGN KEY (`ground_id`) REFERENCES `ground` (`ground_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
