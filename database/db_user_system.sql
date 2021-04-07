-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 09:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `note`, `photo`, `updated_at`, `created_at`) VALUES
(1, 'hariram', 'hi how are you doin', '', '2020-06-17 05:11:32', '2020-05-15 16:25:01'),
(3, 'ityy', 'skdncksnbajb', '', '2020-05-15 16:28:11', '2020-05-15 16:28:11'),
(5, 'hariram', 'hello', '', '2020-05-15 16:51:22', '2020-05-15 16:44:38'),
(6, 'hariram', 'uuyvvuuvyuvuyu', '', '2020-05-15 16:53:42', '2020-05-15 16:53:42'),
(7, 'hariram', 'jhvvhjhjvvhjvhjhjvvhj', '', '2020-05-15 16:55:01', '2020-05-15 16:55:01'),
(8, 'hariram', 'b j j hk hk  h hb hjbjb jb', '', '2020-05-15 16:55:14', '2020-05-15 16:55:14'),
(9, 'web technology', 'To use a PHP script on your web page, you just need to end the file name with .php and make sure the permissions on the file are set correctly. Any files to be accessed by the web server must be publically readable, but none of your PHP files (nor the dir', '', '2020-05-15 17:17:01', '2020-05-15 17:17:01'),
(10, 'lll', 'comeon', '', '2020-06-17 05:43:16', '2020-06-17 05:43:16'),
(11, '1222', 'deck', '', '2020-07-31 23:22:08', '2020-06-17 05:44:07'),
(18, 'Horticultural Products', 'fssfffss', '', '2021-03-31 06:59:12', '2021-03-31 06:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `bookhostel`
--

CREATE TABLE `bookhostel` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `course` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_no` int(11) NOT NULL,
  `guardian_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_relation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `guardian_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pincode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `seater` int(11) NOT NULL,
  `food` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room_alloted` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `booked_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookhostel`
--

INSERT INTO `bookhostel` (`id`, `uid`, `course`, `emergency_no`, `guardian_name`, `guardian_relation`, `guardian_no`, `guardian_address`, `duration`, `city`, `state`, `pincode`, `seater`, `food`, `room_alloted`, `price`, `booked_time`) VALUES
(2, 12, 'MCA', 1223, 'cdsc', 'vdsv', '1233444', 'vokdsjvof', 6, 'london', 'iodcsnon', '1233', 3, 'Veg', 0, 0, '2020-05-13 17:47:02'),
(3, 13, 'PHYSICS', 878787, 'jhvvhuv', 'uvyuhv', '6668687', 'jbjhjkjv;;uiv uhb', 12, 'tirpur', '6768778', '4554556', 5, 'Non-Veg', 1, 0, '2020-05-13 17:47:02'),
(4, 11, 'mca', 2147483647, 'rajendran', 'father', '24660380', '5/7/6 M.M.K Vinayagar Street Palliyur Pallathur', 6, 'Pallathur', 'India', '630107', 4, 'Veg', 1, 0, '2020-05-14 04:19:17'),
(5, 14, 'msc', 123455, 'ponnalagu', 'mother', '7654321', '5/7/6 M.M.K Vinayagar Street Palliyur Pallathur', 12, 'Pallathur', 'Assam', '630107', 4, 'Non-Veg', 1, 0, '2020-05-14 06:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `replied` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `uid`, `subject`, `feedback`, `created_at`, `replied`) VALUES
(1, 11, 'Come On', 'hi i don\'t know what i am going to do', '2020-05-05 05:57:12', 0),
(2, 11, 'what the hell is going on here', 'i  want to know that everything works fine or not', '2020-05-06 10:27:42', 1),
(3, 11, 'how are you', 'hi i am doing fine what should i adncjnedj', '2020-05-06 15:26:54', 1),
(4, 11, 'vsvgs', 'aDXDQF', '2020-05-06 15:40:45', 1),
(5, 11, 'dasd', 'sscsavcv', '2020-05-06 15:51:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `uid`, `title`, `note`, `created_at`, `updated_at`) VALUES
(4, 11, 'hariram', 'kali please help me', '2020-05-01 18:06:13', '2020-05-01 18:06:13'),
(5, 11, 'hi', 'Thank Yo', '2020-05-02 04:16:52', '2020-08-02 17:43:34'),
(11, 12, 'hariram', 'how can i finish it', '2020-05-09 10:14:47', '2020-05-09 10:14:47'),
(12, 12, 'heyy', 'cdlmdclmcl', '2020-06-17 05:50:15', '2020-06-17 05:50:15'),
(13, 12, 'xss', 'dxwdsdx', '2020-06-17 05:51:24', '2020-06-17 05:51:24'),
(14, 12, 'xexdx', 'zzxx', '2020-06-17 05:52:07', '2020-06-17 05:52:07'),
(15, 12, 'heyy', 'lmlklkl', '2020-06-17 06:02:17', '2020-06-17 06:02:17'),
(16, 12, 'mm', 'jmjmjmjjmjmjm', '2020-06-17 06:34:11', '2020-06-17 09:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `uid`, `type`, `message`, `created_at`) VALUES
(6, 11, 'sxhb QHJBXH', 'SXHX bh CHSHZ ', '2020-05-05 11:59:05'),
(7, 11, 'hey', 'what are you uptio', '2020-05-05 12:00:31'),
(14, 11, 'admin', 'Feedback wriiten', '2020-05-06 15:26:54'),
(15, 11, 'admin', 'Note added', '2020-05-06 15:34:23'),
(16, 11, 'admin', 'Note updated', '2020-05-06 15:34:58'),
(17, 11, 'admin', 'Note deleted', '2020-05-06 15:35:17'),
(19, 11, 'admin', 'Feedback written', '2020-05-06 15:51:15'),
(21, 11, 'user', 'What are you upto now', '2020-05-08 07:13:44'),
(22, 12, 'admin', 'Note added', '2020-05-09 10:14:47'),
(23, 12, 'admin', 'Profile updated', '2020-05-09 13:22:27'),
(24, 12, 'user', '34', '2020-05-10 09:03:33'),
(25, 12, 'admin', 'Profile updated', '2020-05-14 05:02:22'),
(26, 12, 'admin', 'Profile updated', '2020-05-14 05:12:57'),
(27, 12, 'admin', 'Profile updated', '2020-05-14 05:15:29'),
(28, 12, 'admin', 'Profile updated', '2020-05-14 05:17:40'),
(29, 12, 'admin', 'Profile updated', '2020-05-14 06:20:06'),
(30, 14, 'admin', 'Profile updated', '2020-05-14 06:36:39'),
(31, 12, 'admin', 'Note added', '2020-06-17 05:50:15'),
(32, 12, 'admin', 'Note added', '2020-06-17 05:51:24'),
(33, 12, 'admin', 'Note added', '2020-06-17 05:52:07'),
(34, 12, 'admin', 'Note added', '2020-06-17 06:02:17'),
(35, 12, 'admin', 'Note added', '2020-06-17 06:34:11'),
(36, 12, 'admin', 'Note updated', '2020-06-17 06:35:45'),
(37, 12, 'admin', 'Note updated', '2020-06-17 06:35:46'),
(38, 12, 'admin', 'Note updated', '2020-06-17 06:35:47'),
(39, 12, 'admin', 'Note updated', '2020-06-17 06:35:47'),
(40, 12, 'admin', 'Note updated', '2020-06-17 06:35:50'),
(41, 12, 'admin', 'Note updated', '2020-06-17 06:35:51'),
(42, 12, 'admin', 'Note updated', '2020-06-17 06:35:51'),
(43, 12, 'admin', 'Note updated', '2020-06-17 06:35:51'),
(44, 12, 'admin', 'Note updated', '2020-06-17 06:35:51'),
(45, 12, 'admin', 'Note updated', '2020-06-17 06:35:52'),
(46, 12, 'admin', 'Note updated', '2020-06-17 06:35:52'),
(47, 12, 'admin', 'Note updated', '2020-06-17 06:38:07'),
(48, 12, 'admin', 'Note updated', '2020-06-17 06:38:08'),
(49, 12, 'admin', 'Note updated', '2020-06-17 06:38:08'),
(51, 12, 'admin', 'Note updated', '2020-06-17 09:12:21'),
(52, 12, 'admin', 'Note updated', '2020-06-17 09:12:21'),
(53, 12, 'admin', 'Note updated', '2020-06-17 09:12:23'),
(54, 12, 'admin', 'Note updated', '2020-06-17 09:12:24'),
(55, 12, 'admin', 'Note updated', '2020-06-17 09:12:24'),
(56, 12, 'admin', 'Note updated', '2020-06-17 09:12:24'),
(57, 12, 'admin', 'Note updated', '2020-06-17 09:12:24'),
(58, 12, 'admin', 'Note updated', '2020-06-17 09:12:25'),
(59, 12, 'admin', 'Note updated', '2020-06-17 09:12:25'),
(60, 12, 'admin', 'Note updated', '2020-06-17 09:12:25'),
(61, 12, 'admin', 'Note updated', '2020-06-17 09:12:25'),
(62, 12, 'admin', 'Note updated', '2020-06-17 09:12:25'),
(63, 12, 'admin', 'Note updated', '2020-06-17 09:12:26'),
(64, 12, 'admin', 'Note updated', '2020-06-17 09:12:26'),
(65, 12, 'admin', 'Note updated', '2020-06-17 09:12:26'),
(66, 16, 'admin', 'Note added', '2020-07-31 21:05:52'),
(67, 16, 'admin', 'Note updated', '2020-07-31 21:06:03'),
(68, 16, 'admin', 'Note updated', '2020-07-31 21:06:27'),
(69, 16, 'admin', 'Note updated', '2020-07-31 21:07:27'),
(70, 16, 'admin', 'Note updated', '2020-07-31 21:08:36'),
(71, 16, 'admin', 'Note updated', '2020-07-31 21:10:29'),
(72, 16, 'admin', 'Note updated', '2020-07-31 21:11:19'),
(73, 16, 'admin', 'Note updated', '2020-07-31 21:11:47'),
(74, 16, 'admin', 'Note updated', '2020-07-31 21:12:35'),
(75, 16, 'admin', 'Note updated', '2020-07-31 21:14:01'),
(76, 16, 'admin', 'Note updated', '2020-07-31 21:14:41'),
(77, 16, 'admin', 'Note updated', '2020-07-31 21:14:51'),
(78, 11, 'admin', 'Note updated', '2020-08-02 17:43:34'),
(79, 1123, 'admin', 'Profile updated', '2020-11-20 09:30:00'),
(80, 11, 'user', 'fssffss', '2021-03-31 06:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) DEFAULT NULL,
  `seater` int(11) DEFAULT NULL,
  `feespm` int(11) DEFAULT NULL,
  `foodstatus` varchar(30) NOT NULL,
  `stayfrom` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `course` varchar(500) DEFAULT NULL,
  `regno` int(11) DEFAULT NULL,
  `firstName` varchar(500) DEFAULT NULL,
  `middleName` varchar(500) DEFAULT NULL,
  `lastName` varchar(500) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `emailid` varchar(500) DEFAULT NULL,
  `egycontactno` bigint(11) DEFAULT NULL,
  `guardianName` varchar(500) DEFAULT NULL,
  `guardianRelation` varchar(500) DEFAULT NULL,
  `guardianContactno` bigint(11) DEFAULT NULL,
  `corresAddress` varchar(500) DEFAULT NULL,
  `corresCIty` varchar(500) DEFAULT NULL,
  `corresState` varchar(500) DEFAULT NULL,
  `corresPincode` int(11) DEFAULT NULL,
  `pmntAddress` varchar(500) DEFAULT NULL,
  `pmntCity` varchar(500) DEFAULT NULL,
  `pmnatetState` varchar(500) DEFAULT NULL,
  `pmntPincode` int(11) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) DEFAULT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `seater`, `feespm`, `foodstatus`, `stayfrom`, `duration`, `course`, `regno`, `firstName`, `middleName`, `lastName`, `gender`, `contactno`, `emailid`, `egycontactno`, `guardianName`, `guardianRelation`, `guardianContactno`, `corresAddress`, `corresCIty`, `corresState`, `corresPincode`, `pmntAddress`, `pmntCity`, `pmnatetState`, `pmntPincode`, `postingDate`, `updationDate`, `photo`) VALUES
(2, 11, 3, 12000, 'Veg', '2020-05-13', 6, 'MCA', 12, 'R Hariram', NULL, NULL, 'Male', 246600380, 'hariram.rajendra@gmail.com', 1223, 'cdsc', 'vdsv', 1233444, 'vokdsjvof', 'london', 'iodcsnon', 1233, NULL, NULL, NULL, NULL, '2020-05-14 04:28:18', NULL, 'uploads/Screenshot (1).png'),
(3, 12, 5, 234567, 'Non-Veg', '2020-05-13', NULL, 'PHYSICS', 13, 'vinodhini', NULL, NULL, 'Female', 123456, 'vinu@gmail.com', 878787, 'jhvvhuv', 'uvyuhv', 6668687, 'jbjhjkjv;;uiv uhb', 'tirpur', '6768778', 4554556, NULL, NULL, NULL, NULL, '2020-05-13 19:03:10', NULL, ''),
(4, 15, 4, 25000, 'Veg', '2020-05-14', 6, 'mca', 11, 'R Hariram (Rajendran)', NULL, NULL, 'Male', 7092101264, 'haritheharry94@gmail.com', 2147483647, 'rajendran', 'father', 24660380, '5/7/6 M.M.K Vinayagar Street Palliyur Pallathur', 'Pallathur', 'India', 630107, NULL, NULL, NULL, NULL, '2020-05-14 04:21:08', NULL, 'uploads/Sketch.png'),
(5, 15, 4, 25000, 'Non-Veg', '2020-05-14', 12, 'msc', 14, 'test', NULL, NULL, 'Male', 7799798, 'test@gmail.com', 123455, 'ponnalagu', 'mother', 7654321, '5/7/6 M.M.K Vinayagar Street Palliyur Pallathur', 'Pallathur', 'Assam', 630107, NULL, NULL, NULL, NULL, '2020-05-14 06:42:06', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `gender` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `fees` int(11) NOT NULL,
  `seater1` int(11) NOT NULL,
  `room_my` int(11) NOT NULL,
  `one` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `two` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `three` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `four` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `five` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `seater`, `gender`, `fees`, `seater1`, `room_my`, `one`, `two`, `three`, `four`, `five`, `posting_date`) VALUES
(1, 11, 4, 'male', 12000, 5, 1, '', '', '', '', '', '2020-05-08 06:34:51'),
(2, 12, 4, 'female', 234567, 4, 0, '', '', '', '', '', '2020-05-08 06:58:11'),
(8, 13, 1, 'female', 25000, 3, 0, '', '', '', '', '', '2020-05-10 15:29:12'),
(9, 14, 3, 'male', 332, 3, 1, '', '', '', '', '', '2020-05-10 15:43:24'),
(10, 15, 1, 'male', 25000, 4, 1, '', '', '', '', '', '2020-05-10 19:17:36'),
(11, 16, 4, 'male', 25000, 4, 1, '', '', '', '', '', '2020-05-12 13:44:16'),
(12, 17, 2, 'male', 12345, 2, 1, '', '', '', '', '', '2020-05-12 13:46:00'),
(13, 19, 3, 'male', 66765, 3, 1, '', '', '', '', '', '2020-05-12 13:48:41'),
(16, 55, 1, 'female', 122321, 1, 0, '', '', '', '', '', '2020-06-17 08:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `room_logs`
--

CREATE TABLE `room_logs` (
  `id` int(11) NOT NULL,
  `hid` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `allot_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_logs`
--

INSERT INTO `room_logs` (`id`, `hid`, `roomno`, `allot_time`) VALUES
(23, 3, 12, '2020-05-13 14:34:45'),
(28, 2, 11, '2020-05-13 14:34:45'),
(29, 4, 15, '2020-05-14 04:20:01'),
(31, 5, 15, '2020-05-14 06:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `token`, `token_expire`, `created_at`, `verified`, `deleted`) VALUES
(11, 'R Hariram (Rajendran)', 'haritheharry94@gmail.com', '$2y$10$m7hfohEOtpkiKe8RQPo0HeiuQsAHIPLoWgbp9vG72V02yDuwv4IPa', '07092101264', 'Male', '2020-05-07', 'uploads/Sketch.png', '9f46116404c51', '2021-03-13 05:04:44', '2020-04-18 16:17:48', 1, 1),
(12, 'R Hariram', 'hariram.rajendra@gmail.com', '$2y$10$IvfO4jHrxQQiznJbbu1O5uDrooOrSIaJWLKco7hafDBaC46sMdaFO', '246600380', 'Male', '1998-08-07', 'uploads/Screenshot (1).png', '23835a4f52495', '2020-07-31 21:01:31', '2020-04-19 06:41:41', 0, 1),
(13, 'vinodhini', 'vinu@gmail.com', '$2y$10$8JnrKyh1ZHHzRIYXHfQsWOvrFiR/6xfrGJkdnpvjlrKH4FQwFkl9.', '123456', 'Female', '', '', '', '2020-05-11 10:18:20', '2020-05-05 17:36:25', 0, 1),
(14, 'test', 'test@gmail.com', '$2y$10$Iobob2YoulrHssujbZPm9.rT/D8nrdu1KuTrkCkFfROJ7kEZdZUyW', '7799798', 'Male', '2020-05-21', '', '8a5d0459f2754', '2020-07-31 23:39:27', '2020-05-06 06:43:02', 0, 1),
(16, 'R Hariram (Rajendran)', 'hey@gmail.com', '$2y$10$JV2FEUhm0DDGP9nwunyJ5eB7gO/Krmp6jARcz64rZg5QO0KbK5Nc.', '07092101264', '', '', '', '', '2020-07-31 20:42:19', '2020-07-31 20:42:19', 0, 1),
(19, 'Hari', 'admin@blog1.com', '$2y$10$WX06P2g5LxM1xPS7lnJGAOt1xbGMrHiwXxl5zYTz9lxZcSC/BE07S', '7092101264', '', '', '', '', '2021-03-31 06:56:19', '2021-03-31 06:56:19', 0, 1),
(1123, 'Faria', 'haritv@gmail.com', '$2y$10$gfJpNRUFs3f965oy14eju.2HZehbukcgPoDDuw/JcyV1IN2HZn17C', '12342342', '', '2020-11-12', '', '', '2020-11-20 09:41:58', '2020-11-20 09:27:20', 1, 1),
(154652, 'Hari', 'admin@blog.com', '$2y$10$4pzoNX7WMR06Pif4gUFaAurBmXJb9mzVJF/Y6CdqISGevRN/LyhjG', '7092101264', '', '', '', '', '2021-03-05 09:44:21', '2021-03-05 09:44:21', 0, 1),
(2554565, 'Hari', 'hari@gmail.com', '$2y$10$xcCFCF/gdbEmy4P9bsj3rOwbKFYEi9QIS9PYbsTaGu8PwfBD9CX4S', '7092101264', '', '', '', '', '2021-03-13 04:56:32', '2021-03-13 04:56:32', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(2) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `hits`) VALUES
(0, 310);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookhostel`
--
ALTER TABLE `bookhostel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `room_logs`
--
ALTER TABLE `room_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hid` (`hid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bookhostel`
--
ALTER TABLE `bookhostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_logs`
--
ALTER TABLE `room_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2554566;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookhostel`
--
ALTER TABLE `bookhostel`
  ADD CONSTRAINT `bookhostel_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_logs`
--
ALTER TABLE `room_logs`
  ADD CONSTRAINT `room_logs_ibfk_1` FOREIGN KEY (`hid`) REFERENCES `bookhostel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
