-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 09:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile`) VALUES
(1, 'fenil', '1234', 'Doreamon-PC-Wallpaper.jpg'),
(13, 'dharmik', '1234', 'Use case.png'),
(24, 'chirag', '1234', 'windows-10-minimal-logo-4k-k1.jpg'),
(26, 'dhwani', '1234', 'start-1abfb4fe2980eabfbbaaa4365a0692539f7cd2725f324f904565a9a744f8e214.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `d_id` int(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `a_date` date NOT NULL,
  `t_date` date NOT NULL,
  `dfees` int(100) NOT NULL,
  `mfees` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `b_id`, `p_id`, `d_id`, `p_name`, `d_name`, `a_date`, `t_date`, `dfees`, `mfees`, `total`) VALUES
(1, 9, 1, 1, 'chirag', 'fenil', '2022-06-22', '2022-06-26', 200, 150, 350),
(2, 8, 1, 10, 'chirag', 'chirag', '2022-06-03', '2022-06-26', 100, 122, 222),
(3, 1, 2, 1, 'fenil', 'fenil', '2022-06-22', '2022-06-26', 50, 100, 150),
(4, 13, 2, 15, 'fenil', 'Shruti', '2022-06-25', '2022-06-26', 44, 44, 88),
(5, 13, 2, 15, 'fenil', 'Shruti', '2022-06-25', '2022-06-26', 1000, 500, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `d_id` int(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `adminstatus` varchar(100) NOT NULL,
  `doctorstatus` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `bill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `p_id`, `pname`, `d_id`, `dname`, `specialization`, `date`, `stime`, `etime`, `adminstatus`, `doctorstatus`, `payment`, `bill`) VALUES
(1, 2, 'fenil', 1, 'fenil', 'Dentist', '2022-06-22', '17:43:00', '17:43:00', 'Aprroved', 'Aprroved', 'Aprroved', 'Aprroved'),
(7, 1, 'chirag', 10, 'chirag', 'Cardiologist', '2022-06-03', '22:40:00', '23:54:00', 'Rejected', 'Pending', 'Pending', 'Pending'),
(8, 1, 'chirag', 10, 'chirag', 'Cardiologist', '2022-06-03', '22:40:00', '23:54:00', 'Aprroved', 'Aprroved', 'Aprroved', 'Aprroved'),
(9, 1, 'chirag', 1, 'fenil', 'Dentist', '2022-06-22', '17:43:00', '17:43:00', 'Aprroved', 'Aprroved', 'Pending', 'Aprroved'),
(10, 4, 'Dharmik', 10, 'chirag', 'Cardiologist', '2022-06-03', '22:40:00', '23:54:00', 'Aprroved', 'Pending', 'Pending', 'Pending'),
(12, 6, 'harish', 16, 'dhwani', 'Gynecologist', '2022-06-25', '23:50:00', '23:52:00', 'Aprroved', 'Pending', 'Pending', 'Pending'),
(13, 2, 'fenil', 15, 'Shruti', 'Pediatrician', '2022-06-25', '09:30:00', '11:00:00', 'Aprroved', 'Aprroved', 'Aprroved', 'Aprroved');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `surname`, `username`, `email`, `gender`, `phone`, `specialization`, `s_id`, `password`, `salary`, `date_reg`, `status`, `profile`) VALUES
(1, 'fenil', 'darji', 'fenil', 'fenildarji3210@gmail.com', 'Male', '1234567899', 'Dentist', 1, 'abcd', '50000', '2022-06-16 16:05:26', 'Aprroved', 'windows-10-minimal-logo-4k-k1.jpg'),
(10, 'chirag', 'laddha', 'chirag07', 'chiragladdha9104@gmail.com', 'Male', '0192837465', 'Cardiologist', 5, '1234', '12223', '2022-06-21 00:32:25', 'Aprroved', 'doctordp.jpg'),
(11, 'Dhrumil', 'Mevada', 'dhrumil29', 'dhrumilmevada29@gmail.com', 'Male', '9988776655', 'Pediatrician', 3, '1234', '0', '2022-06-22 15:55:25', 'Aprroved', 'doctordp.jpg'),
(12, 'Malav', 'Gajjar', 'malav01', 'malavgajjar12@gmail.com', 'Male', '1234567890', 'Gynecologist', 4, '1234', '0', '2022-06-22 15:58:54', 'Aprroved', 'doctordp.jpg'),
(13, 'dharmik', 'desai', 'dharmik', 'fd2492001@gmail.com', 'Male', '0192837465', 'Psychiatrist', 2, '1234', '0', '2022-06-22 20:36:19', 'Aprroved', 'doctordp.jpg'),
(14, 'aryan', 'patel', 'aryan', 'fenildarji3210@gmail.com', 'Male', '0192837465', 'Psychiatrist', 2, '1234', '0', '2022-06-22 20:37:20', 'Aprroved', 'doctordp.jpg'),
(15, 'Shruti', 'Joshi', 'shruti', 'shrutijoshi1221@gmail.com', 'Female', '0192837465', 'Pediatrician', 3, '1234', '100000', '2022-06-24 22:23:26', 'Aprroved', 'doctordp.jpg'),
(16, 'dhwani', 'darji', 'dhwani', 'dhwanidarji2610@gmail.com', 'Female', '1234567890', 'Gynecologist', 4, '1234', '0', '2022-06-24 23:45:42', 'Aprroved', 'doctordp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_reg` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `firstname`, `surname`, `username`, `email`, `phone`, `gender`, `country`, `password`, `date_reg`, `profile`) VALUES
(1, 'chirag', 'shah', 'chirag', 'chiragshah@gmail.com', '1234567891', 'Male', 'surat', '1234', '2022-06-16 01:14:03', 'Doreamon-PC-Wallpaper.jpg'),
(2, 'fenil', 'darji', 'fenil24', 'fenildarji123@gmail.com', '9978418818', 'Male', 'Rajkot', 'abcd', '2022-06-16 01:15:47', 'Doreamon-PC-Wallpaper.jpg'),
(4, 'Dharmik', 'Desai', 'dharmik', 'fd2492001@gmail.com', '1234567890', 'Male', 'Ahmedabad', '1234', '2022-06-24 18:47:50', 'patientdp.jpg'),
(5, 'Hetvi', 'Vakhariya', 'hetvi', 'shrutijoshi1221@gmail.com', '1029112233', 'Female', 'surat', '1234', '2022-06-24 22:30:03', 'windows-10-minimal-logo-4k-k1.jpg'),
(6, 'harish', 'darji', 'harish24', 'dhwanidarji2610@gmail.com', '1234567890', 'Male', 'Ahmedabad', '1234', '2022-06-24 23:47:20', 'windows-10-minimal-logo-4k-k1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `b_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `d_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `prescription` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `b_id`, `p_id`, `d_id`, `date`, `stime`, `etime`, `prescription`, `profile`) VALUES
(13, 9, 1, 1, '2022-06-22', '17:43:00', '17:43:00', 'you have cancer', 'windows-10-minimal-logo-4k-k1.jpg'),
(15, 11, 5, 15, '2022-06-25', '09:30:00', '11:00:00', 'you have cancer', 'Doreamon-PC-Wallpaper.jpg'),
(16, 12, 6, 16, '2022-06-25', '23:50:00', '23:52:00', 'you are alright.\r\n', 'Doreamon-PC-Wallpaper.jpg'),
(17, 13, 2, 15, '2022-06-25', '09:30:00', '11:00:00', 'you have just normal fever.take rest for next few days', 'pat-2.png'),
(18, 1, 2, 1, '2022-06-22', '17:43:00', '17:43:00', 'take dolo for next 3 days', 'pat-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleslot`
--

CREATE TABLE `scheduleslot` (
  `id` int(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `doctor` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduleslot`
--

INSERT INTO `scheduleslot` (`id`, `specialization`, `doctor`, `date`, `stime`, `etime`) VALUES
(6, 'Pediatrician', 'Dhrumil', '2022-06-18', '23:42:00', '03:38:00'),
(7, 'Cardiologist', 'chirag', '2022-06-03', '22:40:00', '23:54:00'),
(8, 'Pediatrician', 'Shruti', '2022-06-25', '09:30:00', '11:00:00'),
(9, 'Gynecologist', 'dhwani', '2022-06-25', '23:50:00', '23:52:00'),
(13, 'Pediatrician', 'Shruti', '2022-06-11', '00:18:00', '00:17:00'),
(14, 'Gynecologist', 'Malav', '2022-06-28', '00:19:00', '02:14:00'),
(21, 'Gynecologist', 'Malav', '2022-06-22', '17:27:00', '17:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `s_id` int(100) NOT NULL,
  `spe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`s_id`, `spe`) VALUES
(1, 'Dentist'),
(2, 'Psychiatrist'),
(3, 'Pediatrician'),
(4, 'Gynecologist'),
(5, 'Cardiologist');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `t_id` int(100) NOT NULL,
  `t_no` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `d_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `d_name` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`t_id`, `t_no`, `p_id`, `d_id`, `p_name`, `d_name`, `p_email`, `date`, `s_time`, `e_time`) VALUES
(8, 1, 4, 10, 'Dharmik', 'chirag', 'fd2492001@gmail.com', '2022-06-03', '22:40:00', '23:54:00'),
(10, 4, 2, 15, 'fenil', 'Shruti', 'fenildarji123@gmail.com', '2022-06-25', '09:30:00', '11:00:00'),
(13, 4, 2, 15, 'fenil', 'Shruti', 'fenildarji123@gmail.com', '2022-06-25', '09:30:00', '11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduleslot`
--
ALTER TABLE `scheduleslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `scheduleslot`
--
ALTER TABLE `scheduleslot`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `s_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
