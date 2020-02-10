-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 12:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `holiday` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `day`, `month`, `holiday`) VALUES
(1, 26, 3, 'Independence day'),
(2, 16, 12, 'Victory day'),
(3, 25, 12, 'Crismas day'),
(4, 21, 2, 'International Mother Language Day'),
(5, 14, 4, 'Bengali New Year'),
(6, 1, 5, 'International Labour Day'),
(7, 29, 4, 'Buddha purnima');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `Class_Name` varchar(50) NOT NULL,
  `Class_no` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'core',
  `active` int(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `Class_Name`, `Class_no`, `status`, `active`) VALUES
(1, 'Primary One', 'P1', 'core', 1),
(2, 'Primary Two', 'P2', 'core', 1),
(3, 'Primary Five', 'P5', 'core', 1),
(4, 'Primary Six', 'P6', 'core', 1),
(5, 'Primary Seven', 'P7', 'core', 1),
(6, ' Primary Three', 'P3', 'core', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'Brazil'),
(2, 'China'),
(3, 'France'),
(4, 'India'),
(5, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `description` text,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hteacher_grades`
--

CREATE TABLE `hteacher_grades` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `year` varchar(25) NOT NULL,
  `g_1` int(11) NOT NULL,
  `g_2` int(11) NOT NULL,
  `g_3` int(11) NOT NULL,
  `g_4` int(11) NOT NULL,
  `g_u` int(11) NOT NULL,
  `g_x` int(11) NOT NULL,
  `p_1` float NOT NULL,
  `p_2` float NOT NULL,
  `p_3` float NOT NULL,
  `p_4` float NOT NULL,
  `p_u` float NOT NULL,
  `p_x` float NOT NULL,
  `g_total` int(11) NOT NULL,
  `pat_total` varchar(50) DEFAULT NULL,
  `p_total` float NOT NULL,
  `p_actual` float NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `report_date` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sch_category` varchar(25) NOT NULL DEFAULT 'gorvenment'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hteacher_grades`
--

INSERT INTO `hteacher_grades` (`id`, `teacher_name`, `school_name`, `sub_county`, `year`, `g_1`, `g_2`, `g_3`, `g_4`, `g_u`, `g_x`, `p_1`, `p_2`, `p_3`, `p_4`, `p_u`, `p_x`, `g_total`, `pat_total`, `p_total`, `p_actual`, `grade`, `remarks`, `report_date`, `status`, `sch_category`) VALUES
(2, 'Kiconco Betty', 'Katooma II', 'Bubaare', '2015', 1, 29, 12, 6, 5, 0, 1.89, 55, 22.64, 11.32, 9.43, 0, 53, NULL, 100, 57.08, 'Grade four', 'Fair with Ungraded', '21-11-2019 11:50:51 am', 'active', 'gorvenment'),
(3, 'Byarugaba Vicent Mukwate', 'Katsikizi', 'Bubaare', '2015', 0, 2, 8, 3, 3, 4, 0, 10, 40, 15, 15, 20, 20, NULL, 100, 31.25, 'Ungraded', 'Poor with Ungraded', '21-11-2019 11:59:24 am', 'active', 'gorvenment'),
(4, 'Asiimwe Patrick', 'Kashaka', 'Bubaare', '2015', 0, 14, 5, 2, 1, 0, 0, 64, 22.73, 9.09, 4.55, 0, 22, NULL, 100.01, 61.37, 'Grade four', 'Fair with Ungraded', '21-11-2019 12:59:27 pm', 'active', 'gorvenment'),
(5, 'Kwesiga Erastus', 'Mugarutsa', 'Bubaare', '2015', 26, 84, 9, 2, 0, 0, 21.49, 69, 7.44, 1.65, 0, 0, 121, NULL, 100, 77.69, 'Grade two', 'Good', '21-11-2019 12:56:37 pm', 'active', 'gorvenment'),
(6, 'Mugume Wilson', 'Komuyaga', 'Bubaare', '2015', 0, 4, 6, 4, 1, 2, 0, 24, 35.29, 23.53, 5.88, 11.76, 17, NULL, 100, 41.18, 'Ungraded', 'Poor with Ungraded', '21-11-2019 12:56:42 pm', 'active', 'gorvenment'),
(7, 'Bamuhimbise Wilson', 'Nshozi', 'Bubaare', '2015', 0, 12, 4, 1, 0, 0, 0, 71, 23.53, 5.88, 0, 0, 17, NULL, 100, 66.18, 'Grade three', 'Fair', '21-11-2019 01:11:21 pm', 'active', 'gorvenment'),
(8, 'Kobuyonjo Juliet', 'Rugarama II', 'Bubaare', '2015', 3, 15, 3, 2, 0, 1, 12.5, 63, 12.5, 8.33, 0, 4.17, 24, NULL, 100, 67.71, 'Grade three', 'Fair', '21-11-2019 01:13:23 pm', 'active', 'gorvenment'),
(9, 'Ainomugisha Costance', 'Mukora', 'Bubaare', '2015', 1, 7, 9, 1, 0, 0, 5.56, 39, 50, 5.56, 0, 0, 18, NULL, 100.01, 61.12, 'Grade three', 'Fair', '21-11-2019 01:11:51 pm', 'active', 'gorvenment'),
(10, 'Muhwezi DEO', 'St. Simon Kooga', 'Bubaare', '2015', 0, 16, 4, 0, 2, 1, 0, 70, 17.39, 0, 8.7, 4.35, 23, NULL, 100.01, 60.87, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:15:24 pm', 'active', 'gorvenment'),
(11, 'Twinamatsiko Yoab Magara', 'Rubaare', 'Bubaare', '2015', 3, 14, 2, 1, 0, 0, 15, 70, 10, 5, 0, 0, 20, NULL, 100, 73.75, 'Grade three', 'Fair', '21-11-2019 01:15:41 pm', 'active', 'gorvenment'),
(12, 'Nankunda Richard', 'Rwentaga', 'Bubaare', '2015', 2, 30, 2, 0, 0, 0, 5.88, 88, 5.88, 0, 0, 0, 34, NULL, 100, 75, 'Grade two', 'Good', '21-11-2019 01:18:03 pm', 'active', 'gorvenment'),
(13, 'Kamugisha Elia', 'Coloma', 'Bubaare', '2015', 25, 12, 0, 0, 0, 0, 67.57, 32, 0, 0, 0, 0, 37, NULL, 100, 91.89, 'Grade two', 'Good', '21-11-2019 01:28:48 pm', 'active', 'private'),
(14, 'Anita Ainembabazi', 'St. Anita Memorial', 'Bubaare', '2015', 1, 16, 0, 0, 0, 0, 5.88, 94, 0, 0, 0, 0, 17, NULL, 100, 76.47, 'Grade two', 'Good', '21-11-2019 01:28:45 pm', 'active', 'private'),
(16, 'Atukunda Agnes', 'Esteeri Kokundeka Memorial', 'Rubaya', '2015', 1, 10, 5, 1, 0, 1, 5.56, 56, 27.78, 5.56, 0, 5.56, 18, NULL, 100.02, 62.51, 'Grade three', 'Fair', '21-11-2019 01:29:50 pm', 'active', 'gorvenment'),
(17, 'Mutabazi Edson', 'Kaguhanzya', 'Rubaya', '2015', 5, 42, 2, 0, 0, 2, 9.8, 82, 3.92, 0, 0, 3.92, 51, NULL, 100, 73.52, 'Grade three', 'Fair', '21-11-2019 01:36:28 pm', 'active', 'gorvenment'),
(18, 'Mwebaze Methodius', 'Omukigando', 'Rubaya', '2015', 0, 11, 8, 5, 2, 1, 0, 41, 29.63, 18.52, 7.41, 3.7, 27, NULL, 100, 50, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:37:49 pm', 'active', 'gorvenment'),
(19, 'Bainomukama Gerald', 'Ruburara', 'Rubaya', '2015', 0, 10, 13, 6, 2, 0, 0, 32, 41.94, 19.35, 6.45, 0, 31, NULL, 100, 50, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:39:03 pm', 'active', 'gorvenment'),
(20, 'Kokunda Lydia', 'Rushozi', 'Rubaya', '2015', 0, 12, 3, 0, 0, 0, 0, 80, 20, 0, 0, 0, 15, NULL, 100, 70, 'Grade three', 'Fair', '21-11-2019 01:40:14 pm', 'active', 'gorvenment'),
(21, 'Kamuhangire Elias', 'Bunenero', 'Rubaya', '2015', 2, 31, 3, 0, 0, 0, 5.56, 86, 8.33, 0, 0, 0, 36, NULL, 100, 74.31, 'Grade three', 'Fair', '21-11-2019 01:31:58 pm', 'active', 'gorvenment'),
(22, 'Dissi Livingston', 'Itara', 'Rubaya', '2015', 1, 13, 13, 2, 1, 2, 3.13, 41, 40.63, 6.25, 3.13, 6.25, 32, NULL, 100.02, 55.48, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:43:36 pm', 'active', 'gorvenment'),
(23, 'Kasigaire Benon', 'Kyamatambarire', 'Rubaya', '2015', 1, 13, 16, 7, 3, 0, 2.5, 33, 40, 17.5, 7.5, 0, 40, NULL, 100, 51.25, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:44:47 pm', 'active', 'gorvenment'),
(24, 'Bitekyerezo Julius', 'Rubaya', 'Rubaya', '2015', 0, 4, 8, 3, 0, 0, 0, 27, 53.33, 20, 0, 0, 15, NULL, 100, 51.67, 'Grade three', 'Fair', '21-11-2019 01:46:12 pm', 'active', 'gorvenment'),
(25, 'Nuwagira Robert', 'Ruhunga', 'Rubaya', '2015', 0, 3, 9, 5, 0, 0, 0, 18, 52.94, 29.41, 0, 0, 17, NULL, 100, 47.06, 'Grade four', 'Poor', '21-11-2019 01:47:50 pm', 'active', 'gorvenment'),
(27, 'Karuhanga Piason', 'Rwantsinga', 'Rubaya', '2015', 0, 4, 9, 2, 1, 1, 0, 24, 52.94, 11.76, 5.88, 5.88, 17, NULL, 100, 47.06, 'Ungraded', 'Poor with Ungraded', '24-11-2019 02:22:07 pm', 'active', 'gorvenment'),
(28, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2015', 15, 78, 8, 1, 0, 1, 14.56, 76, 7.77, 0.97, 0, 0.97, 103, NULL, 100, 75.49, 'Grade two', 'Good', '21-11-2019 01:49:50 pm', 'active', 'gorvenment'),
(29, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2015', 0, 14, 7, 2, 4, 1, 0, 50, 25, 7.14, 14.29, 3.57, 28, NULL, 100, 51.79, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:50:28 pm', 'active', 'gorvenment'),
(30, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2015', 2, 33, 8, 1, 1, 1, 4.35, 72, 17.39, 2.17, 2.17, 2.17, 46, NULL, 99.99, 67.39, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:55:18 pm', 'active', 'gorvenment'),
(31, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2015', 0, 10, 7, 5, 1, 0, 0, 43, 30.43, 21.74, 4.35, 0, 23, NULL, 100, 53.26, 'Grade four', 'Fair with Ungraded', '21-11-2019 01:56:23 pm', 'active', 'gorvenment'),
(32, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2015', 3, 39, 10, 5, 0, 0, 5.26, 68, 17.54, 8.77, 0, 0, 57, NULL, 99.99, 67.54, 'Grade three', 'Fair', '21-11-2019 01:58:11 pm', 'active', 'gorvenment'),
(33, 'Akandwanaho Ezekiel', 'Mabira Parents School', 'Rwanyamahembe', '2015', 30, 4, 0, 0, 0, 0, 88.24, 12, 0, 0, 0, 0, 34, NULL, 100, 97.06, 'Grade two', 'Good', '21-11-2019 02:01:06 pm', 'active', 'private'),
(34, 'Basiima Obeb', 'Muko I', 'Rwanyamahembe', '2015', 2, 27, 7, 0, 1, 7, 4.55, 61, 15.91, 0, 2.27, 15.91, 44, NULL, 100, 58.53, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:00:51 pm', 'active', 'gorvenment'),
(35, 'Twesigye Enid', 'Nyampikye', 'Rwanyamahembe', '2015', 5, 36, 4, 3, 0, 0, 10.42, 75, 8.33, 6.25, 0, 0, 48, NULL, 100, 72.4, 'Grade three', 'Fair', '21-11-2019 02:01:50 pm', 'active', 'gorvenment'),
(36, 'Atiisa Milton', 'Rutooma Intergrated', 'Rwanyamahembe', '2015', 0, 20, 10, 1, 0, 1, 0, 63, 31.25, 3.13, 0, 3.13, 32, NULL, 100.01, 63.28, 'Grade three', 'Fair', '21-11-2019 02:03:06 pm', 'active', 'gorvenment'),
(37, 'Muraarira Kandiho Sam', 'Nyakayojo II', 'Rwanyamahembe', '2015', 0, 15, 6, 1, 1, 0, 0, 65, 26.09, 4.35, 4.35, 0, 23, NULL, 100.01, 63.05, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:03:03 pm', 'active', 'gorvenment'),
(38, 'Katugwensi Flora Barigye', 'Runengo', 'Rwanyamahembe', '2015', 0, 32, 6, 0, 1, 0, 0, 82, 15.38, 0, 2.56, 0, 39, NULL, 99.99, 69.23, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:05:49 pm', 'active', 'gorvenment'),
(39, 'Mujuni Naboth', 'Rweishamiro', 'Rwanyamahembe', '2015', 0, 10, 4, 2, 0, 0, 0, 63, 25, 12.5, 0, 0, 16, NULL, 100, 62.5, 'Grade three', 'Fair', '21-11-2019 02:04:57 pm', 'active', 'gorvenment'),
(40, 'Ngabirano Jones', 'Rutooma Modern', 'Rwanyamahembe', '2015', 2, 23, 5, 0, 0, 1, 6.45, 74, 16.13, 0, 0, 3.23, 31, NULL, 100, 70.16, 'Grade three', 'Fair', '21-11-2019 02:07:19 pm', 'active', 'gorvenment'),
(41, 'Kansiime Anold', 'Wagawaga', 'Rwanyamahembe', '2015', 13, 5, 0, 0, 0, 0, 72.22, 28, 0, 0, 0, 0, 18, NULL, 100, 93.06, 'Grade two', 'Good', '21-11-2019 02:09:17 pm', 'active', 'private'),
(42, 'muhumuza Richard', 'Rwentojo', 'Rwanyamahembe', '2015', 4, 28, 1, 1, 0, 2, 11.11, 78, 2.78, 2.78, 0, 5.56, 36, NULL, 100.01, 71.53, 'Grade three', 'Fair', '21-11-2019 02:09:53 pm', 'active', 'gorvenment'),
(43, 'Kyoshaba Justine', 'Akashanda', 'Bukiro', '2015', 2, 17, 5, 0, 0, 0, 8.33, 71, 20.83, 0, 0, 0, 24, NULL, 99.99, 71.87, 'Grade three', 'Fair', '21-11-2019 02:11:06 pm', 'active', 'gorvenment'),
(44, 'Kabigumira Vencious', 'Kibaare 1', 'Bukiro', '2015', 0, 8, 5, 3, 0, 1, 0, 47, 29.41, 17.65, 0, 5.88, 17, NULL, 100, 54.41, 'Grade three', 'Fair', '21-11-2019 02:13:14 pm', 'active', 'gorvenment'),
(45, 'Abesiga Vivian', 'Kitengure', 'Bukiro', '2015', 1, 13, 8, 2, 1, 2, 3.7, 48, 29.63, 7.41, 3.7, 7.41, 27, NULL, 100, 56.48, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:16:22 pm', 'active', 'gorvenment'),
(46, 'Mugume Jonas', 'Nyantungu', 'Bukiro', '2015', 3, 43, 22, 1, 0, 3, 4.17, 60, 30.56, 1.39, 0, 4.17, 72, NULL, 100.01, 64.59, 'Grade three', 'Fair', '21-11-2019 02:16:40 pm', 'active', 'gorvenment'),
(47, 'Rwakaningi Denis', 'Rubingo I', 'Bukiro', '2015', 0, 21, 2, 0, 0, 0, 0, 91, 8.7, 0, 0, 0, 23, NULL, 100, 72.83, 'Grade three', 'Fair', '21-11-2019 02:18:23 pm', 'active', 'gorvenment'),
(48, 'Tukahirwa Jovia', 'Nyarubungo', 'Bukiro', '2015', 0, 24, 9, 1, 0, 3, 0, 65, 24.32, 2.7, 0, 8.11, 37, NULL, 99.99, 61.48, 'Grade three', 'Fair', '21-11-2019 02:18:20 pm', 'active', 'gorvenment'),
(49, 'Ahumuza Ruth', 'Rubingo-Nyanja', 'Bukiro', '2015', 3, 15, 7, 4, 0, 1, 10, 50, 23.33, 13.33, 0, 3.33, 30, NULL, 99.99, 62.5, 'Grade three', 'Fair', '21-11-2019 02:20:47 pm', 'active', 'gorvenment'),
(50, 'Mbakiza Joseph', 'Rwengwe 1', 'Bukiro', '2015', 2, 17, 9, 0, 1, 0, 6.9, 59, 31.03, 0, 3.45, 0, 29, NULL, 100, 66.38, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:19:34 pm', 'active', 'gorvenment'),
(51, 'Muhairwe Milton Twaza', 'Buyenje', 'Rubindi', '2015', 0, 29, 1, 0, 0, 3, 0, 88, 3.03, 0, 0, 9.09, 33, NULL, 100, 67.43, 'Grade three', 'Fair', '21-11-2019 02:24:54 pm', 'active', 'gorvenment'),
(52, 'bekyinga Asaph', 'Akarungu', 'Rubindi', '2015', 6, 35, 11, 5, 1, 0, 10.34, 60, 18.97, 8.62, 1.72, 0, 58, NULL, 99.99, 67.24, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:22:44 pm', 'active', 'gorvenment'),
(53, 'Ssali Abdul Kariim', 'Kariro Muslim', 'Rubindi', '2015', 0, 4, 10, 10, 1, 0, 0, 16, 40, 40, 4, 0, 25, NULL, 100, 42, 'Ungraded', 'Poor with Ungraded', '21-11-2019 02:34:12 pm', 'active', 'gorvenment'),
(54, 'Lwanga Narcis', 'Kyakataara', 'Rubindi', '2015', 2, 22, 2, 0, 0, 0, 7.69, 85, 7.69, 0, 0, 0, 26, NULL, 100, 75, 'Grade two', 'Good', '21-11-2019 02:35:33 pm', 'active', 'gorvenment'),
(55, 'Barigye Cyprus', 'kaihiro', 'Rubindi', '2015', 0, 15, 5, 2, 0, 0, 0, 68, 22.73, 9.09, 0, 0, 22, NULL, 100, 64.77, 'Grade three', 'Fair', '21-11-2019 02:35:09 pm', 'active', 'gorvenment'),
(56, 'Asiimwe Specius', 'Karuhitsi', 'Rubindi', '2015', 4, 21, 6, 0, 0, 2, 12.12, 64, 18.18, 0, 0, 6.06, 33, NULL, 100, 68.94, 'Grade three', 'Fair', '21-11-2019 02:36:32 pm', 'active', 'gorvenment'),
(57, 'Mugarura Robert', 'Rubindi Boys', 'Rubindi', '2015', 32, 59, 4, 1, 0, 2, 32.65, 60, 4.08, 1.02, 0, 2.04, 98, NULL, 99.99, 80.1, 'Grade two', 'Good', '21-11-2019 02:36:29 pm', 'active', 'gorvenment'),
(58, 'Bwomi Joshua Agaba', 'Nyamiriro', 'Rubindi', '2015', 0, 2, 6, 4, 4, 1, 0, 12, 35.29, 23.53, 23.53, 5.88, 17, NULL, 99.99, 32.35, 'Ungraded', 'Poor with Ungraded', '21-11-2019 02:38:25 pm', 'active', 'gorvenment'),
(59, 'Kiiza Dominic', 'Rukanja', 'Rubindi', '2015', 8, 48, 3, 1, 0, 2, 12.9, 77, 4.84, 1.61, 0, 3.23, 62, NULL, 100, 73.79, 'Grade three', 'Fair', '21-11-2019 02:38:49 pm', 'active', 'gorvenment'),
(60, 'Bekunda George William', 'Rwembirizi', 'Rubindi', '2015', 2, 19, 2, 0, 0, 0, 8.7, 83, 8.7, 0, 0, 0, 23, NULL, 100.01, 75.01, 'Grade two', 'Good', '21-11-2019 02:40:35 pm', 'active', 'gorvenment'),
(61, 'Mwebesa Deo', 'Rubindi Girls', 'Rubindi', '2015', 1, 25, 6, 1, 1, 2, 2.78, 69, 16.67, 2.78, 2.78, 5.56, 36, NULL, 100.01, 63.89, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:40:08 pm', 'active', 'gorvenment'),
(62, 'Magezi Patrick', 'Hopebel', 'Rubindi', '2015', 17, 7, 0, 0, 0, 0, 70.83, 29, 0, 0, 0, 0, 24, NULL, 100, 92.71, 'Grade two', 'Good', '21-11-2019 02:43:42 pm', 'active', 'private'),
(63, 'Mugerwa Prima', 'Rwamuhigi', 'Rubindi', '2015', 0, 7, 14, 9, 7, 2, 0, 18, 35.9, 23.08, 17.95, 5.13, 39, NULL, 100.01, 37.18, 'Ungraded', 'Poor with Ungraded', '21-11-2019 02:41:58 pm', 'active', 'gorvenment'),
(64, 'Amutuhaire Grace', 'Ant Betty Ruhumba', 'Rubindi', '2015', 0, 11, 8, 7, 3, 1, 0, 37, 26.67, 23.33, 10, 3.33, 30, NULL, 100, 46.67, 'Ungraded', 'Poor with Ungraded', '21-11-2019 02:46:21 pm', 'active', 'private'),
(65, 'Bamwesigye Asaph', 'Rubindi Preparatory', 'Rubindi', '2015', 36, 23, 1, 0, 0, 0, 60, 38, 1.67, 0, 0, 0, 60, NULL, 100, 89.58, 'Grade two', 'Good', '21-11-2019 02:45:21 pm', 'active', 'private'),
(66, 'Boona Mpumwire Edith', 'Kagongi I', 'Kagongi', '2015', 0, 13, 9, 3, 2, 1, 0, 46, 32.14, 10.71, 7.14, 3.57, 28, NULL, 99.99, 53.57, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:47:32 pm', 'active', 'gorvenment'),
(67, 'Nyabwangu Jolly', 'Bwengure', 'Kagongi', '2015', 1, 16, 6, 2, 0, 1, 3.85, 62, 23.08, 7.69, 0, 3.85, 26, NULL, 100.01, 63.47, 'Grade three', 'Fair', '21-11-2019 02:47:35 pm', 'active', 'gorvenment'),
(68, 'Kamugisha Julius', 'Kibingo 111', 'Kagongi', '2015', 1, 6, 8, 2, 0, 0, 5.88, 35, 47.06, 11.76, 0, 0, 17, NULL, 99.99, 58.82, 'Grade three', 'Fair', '21-11-2019 02:49:51 pm', 'active', 'gorvenment'),
(69, 'Nuwagaba Crescent', 'Munyonyi Mixed', 'Kagongi', '2015', 0, 8, 7, 4, 2, 0, 0, 38, 33.33, 19.05, 9.52, 0, 21, NULL, 100, 50, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:50:52 pm', 'active', 'gorvenment'),
(70, 'Tumushabe Betyce', 'Katagyengyera', 'Kagongi', '2015', 6, 33, 10, 2, 2, 0, 11.32, 62, 18.87, 3.77, 3.77, 0, 53, NULL, 99.99, 68.39, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:50:11 pm', 'active', 'gorvenment'),
(71, 'Rutafa James', 'Nyakabwera', 'Kagongi', '2015', 19, 19, 5, 2, 1, 2, 39.58, 40, 10.42, 4.17, 2.08, 4.17, 48, NULL, 100, 75.52, 'Grade three', 'Good with Ungraded', '21-11-2019 02:51:40 pm', 'active', 'gorvenment'),
(72, 'Bainomugisha Alex', 'omukagyera', 'Kagongi', '2015', 0, 5, 4, 3, 3, 0, 0, 33, 26.67, 20, 20, 0, 15, NULL, 100, 43.33, 'Ungraded', 'Poor with Ungraded', '21-11-2019 02:53:48 pm', 'active', 'gorvenment'),
(73, 'Mwijuka Deuth', 'Rweshe', 'Kagongi', '2015', 0, 21, 5, 0, 0, 0, 0, 81, 19.23, 0, 0, 0, 26, NULL, 100, 70.19, 'Grade three', 'Fair', '21-11-2019 02:54:53 pm', 'active', 'gorvenment'),
(74, 'Kamayangi Angela', 'Kyarushanje', 'Kagongi', '2015', 13, 47, 12, 0, 3, 1, 17.11, 62, 15.79, 0, 3.95, 1.32, 76, NULL, 100.01, 71.39, 'Grade four', 'Fair with Ungraded', '21-11-2019 02:58:17 pm', 'active', 'gorvenment'),
(75, 'Mugume Ihinduza Abel', 'Nsiika', 'Kagongi', '2015', 2, 19, 12, 4, 2, 1, 5, 48, 30, 10, 5, 2.5, 40, NULL, 100, 58.13, 'Grade four', 'Fair with Ungraded', '21-11-2019 03:00:23 pm', 'active', 'gorvenment'),
(76, 'Tumubwine Patrick', 'Nyaminyobwa', 'Kagongi', '2015', 1, 18, 13, 4, 1, 5, 2.38, 43, 30.95, 9.52, 2.38, 11.9, 42, NULL, 99.99, 52.38, 'Grade four', 'Fair with Ungraded', '21-11-2019 03:01:46 pm', 'active', 'gorvenment'),
(77, 'Mworozi Adrine', 'Rwamanuma', 'Kagongi', '2015', 3, 7, 1, 2, 8, 1, 13.64, 32, 4.55, 9.09, 36.36, 4.55, 22, NULL, 100.01, 42.05, 'Ungraded', 'Poor with Ungraded', '21-11-2019 03:01:37 pm', 'active', 'gorvenment'),
(78, 'Sande Ainamani', 'Rweshe Parents', 'Kagongi', '2015', 0, 15, 9, 3, 0, 0, 0, 56, 33.33, 11.11, 0, 0, 27, NULL, 100, 61.11, 'Grade three', 'Fair', '21-11-2019 03:08:26 pm', 'active', 'gorvenment'),
(79, 'Muhereza Vicent', 'Akabaare', 'Kashare', '2015', 0, 17, 7, 0, 0, 0, 0, 71, 29.17, 0, 0, 0, 24, NULL, 100, 67.71, 'Grade three', 'Fair', '21-11-2019 03:04:18 pm', 'active', 'gorvenment'),
(80, 'Asiimwe Herbert', 'Amabaare', 'Kashare', '2015', 0, 5, 5, 3, 1, 1, 0, 33, 33.33, 20, 6.67, 6.67, 15, NULL, 100, 46.66, 'Ungraded', 'Poor with Ungraded', '21-11-2019 03:09:35 pm', 'active', 'gorvenment'),
(81, 'Namurebire Julius', 'Kitongore 11', 'Kashare', '2015', 0, 8, 2, 3, 2, 0, 0, 53, 13.33, 20, 13.33, 0, 15, NULL, 99.99, 51.66, 'Grade four', 'Fair with Ungraded', '21-11-2019 03:09:56 pm', 'active', 'gorvenment'),
(82, 'Mutungi Deus', 'Kyenshama', 'Kashare', '2015', 0, 9, 11, 2, 0, 0, 0, 41, 50, 9.09, 0, 0, 22, NULL, 100, 57.96, 'Grade three', 'Fair', '21-11-2019 03:11:03 pm', 'active', 'gorvenment'),
(83, 'Nankunda Zephrine', 'Nchune', 'Kashare', '2015', 1, 16, 2, 0, 0, 0, 5.26, 84, 10.53, 0, 0, 0, 19, NULL, 100, 73.68, 'Grade three', 'Fair', '21-11-2019 03:11:49 pm', 'active', 'gorvenment'),
(84, 'kiconco Enid', 'Mirongo Central school', 'Kashare', '2015', 0, 18, 5, 1, 0, 0, 0, 75, 20.83, 4.17, 0, 0, 24, NULL, 100, 67.71, 'Grade three', 'Fair', '21-11-2019 03:11:42 pm', 'active', 'gorvenment'),
(85, 'Kekihembo Naome', 'Rugarura', 'Kashare', '2015', 0, 11, 18, 1, 5, 0, 0, 31, 51.43, 2.86, 14.29, 0, 35, NULL, 100.01, 50, 'Grade four', 'Fair with Ungraded', '21-11-2019 03:12:42 pm', 'active', 'gorvenment'),
(86, 'Mugabo Dickson', 'Nombe', 'Kashare', '2015', 2, 26, 12, 2, 0, 0, 4.76, 62, 28.57, 4.76, 0, 0, 42, NULL, 99.99, 66.66, 'Grade three', 'Fair', '21-11-2019 03:14:09 pm', 'active', 'gorvenment'),
(87, 'Musinguzi Gidion', 'Rweibaare 1', 'Kashare', '2015', 0, 11, 11, 3, 1, 22, 0, 23, 22.92, 6.25, 2.08, 45.83, 48, NULL, 100, 30.21, 'Ungraded', 'Poor with Ungraded', '21-11-2019 03:15:49 pm', 'active', 'gorvenment'),
(88, 'Mpongano Elly', 'omukabaare', 'Kashare', '2015', 2, 29, 1, 0, 0, 2, 5.88, 85, 2.94, 0, 0, 5.88, 34, NULL, 99.99, 71.32, 'Grade three', 'Fair', '21-11-2019 03:15:59 pm', 'active', 'gorvenment'),
(89, 'Nuwagaba Apollo', 'Rwamukondo', 'Kashare', '2015', 2, 25, 1, 2, 0, 0, 6.67, 83, 3.33, 6.67, 0, 0, 30, NULL, 100, 72.5, 'Grade three', 'Fair', '21-11-2019 03:17:17 pm', 'active', 'gorvenment'),
(90, 'Boroba James', 'Rwobugoigo', 'Kashare', '2015', 1, 10, 6, 1, 0, 2, 5, 50, 30, 5, 0, 10, 20, NULL, 100, 58.75, 'Grade three', 'Fair', '21-11-2019 03:17:03 pm', 'active', 'gorvenment'),
(91, 'Atusiime Jane', 'Rweibare 11', 'Kashare', '2015', 8, 36, 0, 0, 0, 0, 18.18, 82, 0, 0, 0, 0, 44, NULL, 100, 79.55, 'Grade two', 'Good', '21-11-2019 03:19:02 pm', 'active', 'gorvenment'),
(92, 'Namara Jane', 'St. Marys Rweibaare', 'Kashare', '2015', 2, 19, 11, 2, 0, 1, 5.71, 54, 31.43, 5.71, 0, 2.86, 35, NULL, 100, 63.57, 'Grade three', 'Fair', '21-11-2019 03:21:10 pm', 'active', 'gorvenment'),
(93, 'Abaasa Agnes', 'Rubindi Parents', 'Kashare', '2015', 42, 17, 0, 1, 0, 0, 70, 28, 0, 1.67, 0, 0, 60, NULL, 100, 91.67, 'Grade two', 'Good', '21-11-2019 03:29:22 pm', 'active', 'private'),
(94, 'Mugarura Keneth', 'Lypa International', 'Kashare', '2015', 72, 4, 0, 0, 0, 0, 94.74, 5, 0, 0, 0, 0, 76, NULL, 100, 98.69, 'Grade two', 'Good', '21-11-2019 03:30:04 pm', 'active', 'private'),
(95, 'Mpirirwe Edith', 'Nyamirima', 'Kashare', '2015', 0, 7, 10, 11, 4, 4, 0, 19, 27.78, 30.56, 11.11, 11.11, 36, NULL, 100, 36.11, 'Ungraded', 'Poor with Ungraded', '21-11-2019 03:30:47 pm', 'active', 'gorvenment'),
(96, 'Asiimwe Patrick', 'Kashaka', 'Bubaare', '2016', 0, 11, 6, 1, 0, 2, 0, 55, 30, 5, 0, 10, 20, NULL, 100, 57.5, 'Grade three', 'Fair', '22-11-2019 10:55:27 am', 'active', 'gorvenment'),
(97, 'Byarugaba Vicent Mukwate', 'Katsikizi', 'Bubaare', '2016', 0, 4, 10, 2, 0, 2, 0, 22, 55.56, 11.11, 0, 11.11, 18, NULL, 100, 47.22, 'Grade four', 'Poor', '22-11-2019 10:58:21 am', 'active', 'gorvenment'),
(98, 'Kiconco Betty', 'Katooma II', 'Bubaare', '2016', 1, 25, 11, 2, 2, 0, 2.44, 61, 26.83, 4.88, 4.88, 0, 41, NULL, 100.01, 62.81, 'Grade four', 'Fair with Ungraded', '22-11-2019 10:56:46 am', 'active', 'gorvenment'),
(99, 'Kwesiga Erastus', 'Mugarutsa', 'Bubaare', '2016', 44, 53, 5, 0, 0, 2, 42.31, 51, 4.81, 0, 0, 1.92, 104, NULL, 100, 82.94, 'Grade two', 'Good', '22-11-2019 11:00:01 am', 'active', 'gorvenment'),
(100, 'Mugume Wilson', 'Komuyaga', 'Bubaare', '2016', 0, 6, 8, 3, 0, 0, 0, 35, 47.06, 17.65, 0, 0, 17, NULL, 100, 54.41, 'Grade three', 'Fair', '22-11-2019 11:00:30 am', 'active', 'gorvenment'),
(101, 'Ainomugisha Costance', 'Mukora', 'Bubaare', '2016', 1, 11, 4, 0, 0, 1, 5.88, 65, 23.53, 0, 0, 5.88, 17, NULL, 100, 66.18, 'Grade three', 'Fair', '22-11-2019 11:01:32 am', 'active', 'gorvenment'),
(102, 'Bamuhimbise Wilson', 'Nshozi', 'Bubaare', '2016', 1, 13, 3, 0, 0, 1, 5.56, 72, 16.67, 0, 0, 5.56, 18, NULL, 100.01, 68.06, 'Grade three', 'Fair', '22-11-2019 11:01:08 am', 'active', 'gorvenment'),
(103, 'Twinamatsiko Yoab Magara', 'Rubaare', 'Bubaare', '2016', 2, 11, 3, 2, 1, 0, 10.53, 58, 15.79, 10.53, 5.26, 0, 19, NULL, 100, 64.48, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:02:55 am', 'active', 'gorvenment'),
(104, 'Kobuyonjo Juliet', 'Rugarama II', 'Bubaare', '2016', 1, 22, 8, 1, 2, 1, 2.86, 63, 22.86, 2.86, 5.71, 2.86, 35, NULL, 100.01, 62.15, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:03:45 am', 'active', 'gorvenment'),
(105, 'Muhwezi DEO', 'St. Simon Kooga', 'Bubaare', '2016', 3, 11, 0, 1, 0, 0, 20, 73, 0, 6.67, 0, 0, 15, NULL, 100, 76.67, 'Grade two', 'Good', '22-11-2019 11:05:03 am', 'active', 'gorvenment'),
(106, 'Kamugisha Elia', 'Coloma', 'Bubaare', '2016', 30, 9, 0, 0, 0, 0, 76.92, 23, 0, 0, 0, 0, 39, NULL, 100, 94.23, 'Grade two', 'Good', '22-11-2019 11:06:09 am', 'active', 'private'),
(107, 'Nankunda Richard', 'Rwentaga', 'Bubaare', '2016', 7, 42, 2, 0, 0, 3, 12.96, 78, 3.7, 0, 0, 5.56, 54, NULL, 100, 73.15, 'Grade three', 'Fair', '22-11-2019 11:04:46 am', 'active', 'gorvenment'),
(108, 'Anita Ainembabazi', 'St. Anita Memorial', 'Bubaare', '2016', 9, 26, 3, 1, 0, 1, 22.5, 65, 7.5, 2.5, 0, 2.5, 40, NULL, 100, 75.63, 'Grade two', 'Good', '22-11-2019 11:07:59 am', 'active', 'private'),
(109, 'Atukunda Agnes', 'Esteeri Kokundeka Memorial', 'Rubaya', '2016', 5, 19, 1, 0, 0, 1, 19.23, 73, 3.85, 0, 0, 3.85, 26, NULL, 100.01, 75.97, 'Grade two', 'Good', '22-11-2019 11:11:17 am', 'active', 'gorvenment'),
(110, 'Kamuhangire Elias', 'Bunenero', 'Rubaya', '2016', 4, 24, 1, 0, 0, 0, 13.79, 83, 3.45, 0, 0, 0, 29, NULL, 100, 77.59, 'Grade two', 'Good', '22-11-2019 11:07:02 am', 'active', 'gorvenment'),
(111, 'Mutabazi Edson', 'Kaguhanzya', 'Rubaya', '2016', 9, 45, 1, 0, 0, 0, 16.36, 82, 1.82, 0, 0, 0, 55, NULL, 100, 78.64, 'Grade two', 'Good', '22-11-2019 11:14:20 am', 'active', 'gorvenment'),
(112, 'Dissi Livingston', 'Itara', 'Rubaya', '2016', 4, 14, 10, 5, 2, 1, 11.11, 39, 27.78, 13.89, 5.56, 2.78, 36, NULL, 100.01, 57.64, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:14:44 am', 'active', 'gorvenment'),
(113, 'Mwebaze Methodius', 'Omukigando', 'Rubaya', '2016', 1, 25, 9, 4, 4, 1, 2.27, 57, 20.45, 9.09, 9.09, 2.27, 44, NULL, 99.99, 57.38, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:16:02 am', 'active', 'gorvenment'),
(114, 'Kasigaire Benon', 'Kyamatambarire', 'Rubaya', '2016', 2, 14, 7, 7, 5, 4, 5.13, 36, 17.95, 17.95, 12.82, 10.26, 39, NULL, 100.01, 45.52, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:16:28 am', 'active', 'gorvenment'),
(115, 'Bainomukama Gerald', 'Ruburara', 'Rubaya', '2016', 1, 8, 6, 0, 7, 1, 4.35, 35, 26.09, 0, 30.43, 4.35, 23, NULL, 100, 43.48, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:16:49 am', 'active', 'gorvenment'),
(116, 'Kokunda Lydia', 'Rushozi', 'Rubaya', '2016', 0, 10, 3, 1, 2, 0, 0, 63, 18.75, 6.25, 12.5, 0, 16, NULL, 100, 57.81, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:18:03 am', 'active', 'gorvenment'),
(117, 'Modern h/t', 'Kahoma Modern', 'Rubaya', '2016', 11, 9, 1, 2, 0, 0, 47.83, 39, 4.35, 8.7, 0, 0, 23, NULL, 100.01, 81.53, 'Grade two', 'Good', '22-11-2019 11:18:42 am', 'active', 'private'),
(118, 'Bitekyerezo Julius', 'Rubaya', 'Rubaya', '2016', 2, 11, 2, 5, 0, 2, 9.09, 50, 9.09, 22.73, 0, 9.09, 22, NULL, 100, 56.82, 'Grade three', 'Fair', '22-11-2019 11:17:55 am', 'active', 'gorvenment'),
(119, 'Karuhanga Piason', 'Rwantsinga', 'Rubaya', '2016', 0, 5, 7, 3, 3, 0, 0, 28, 38.89, 16.67, 16.67, 0, 18, NULL, 100.01, 44.45, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:19:14 am', 'active', 'gorvenment'),
(120, 'Nuwagira Robert', 'Ruhunga', 'Rubaya', '2016', 0, 7, 6, 4, 3, 0, 0, 35, 30, 20, 15, 0, 20, NULL, 100, 46.25, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:21:29 am', 'active', 'gorvenment'),
(121, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2016', 2, 17, 6, 7, 2, 1, 5.71, 49, 17.14, 20, 5.71, 2.86, 35, NULL, 99.99, 55.71, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:19:39 am', 'active', 'gorvenment'),
(122, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2016', 0, 14, 8, 9, 3, 1, 0, 40, 22.86, 25.71, 8.57, 2.86, 35, NULL, 100, 47.86, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:36:20 am', 'active', 'gorvenment'),
(123, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2016', 23, 60, 8, 2, 1, 1, 24.21, 63, 8.42, 2.11, 1.05, 1.05, 95, NULL, 100, 76.32, 'Grade three', 'Good with Ungraded', '22-11-2019 11:22:08 am', 'active', 'gorvenment'),
(124, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2016', 3, 26, 4, 0, 0, 3, 8.33, 72, 11.11, 0, 0, 8.33, 36, NULL, 99.99, 68.05, 'Grade three', 'Fair', '22-11-2019 11:24:48 am', 'active', 'gorvenment'),
(125, 'Muhumuza Jotham', 'Mishenyi', 'Rwanyamahembe', '2016', 22, 3, 0, 0, 0, 0, 88, 12, 0, 0, 0, 0, 25, NULL, 100, 97, 'Grade two', 'Good', '22-11-2019 11:25:32 am', 'active', 'gorvenment'),
(126, 'Muraarira Kandiho Sam', 'Nyakayojo II', 'Rwanyamahembe', '2016', 2, 12, 0, 1, 0, 0, 13.33, 80, 0, 6.67, 0, 0, 15, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 11:26:04 am', 'active', 'gorvenment'),
(127, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2016', 10, 19, 6, 4, 0, 0, 25.64, 49, 15.38, 10.26, 0, 0, 39, NULL, 100, 72.44, 'Grade three', 'Fair', '22-11-2019 11:26:36 am', 'active', 'gorvenment'),
(128, 'Katugwensi Flora Barigye', 'Runengo', 'Rwanyamahembe', '2016', 9, 19, 1, 0, 0, 1, 30, 63, 3.33, 0, 0, 3.33, 30, NULL, 99.99, 79.16, 'Grade two', 'Good', '22-11-2019 11:26:47 am', 'active', 'gorvenment'),
(129, 'Ngabirano Jones', 'Rutooma Modern', 'Rwanyamahembe', '2016', 4, 36, 12, 3, 0, 0, 7.27, 65, 21.82, 5.45, 0, 0, 55, NULL, 99.99, 68.63, 'Grade three', 'Fair', '22-11-2019 11:27:23 am', 'active', 'gorvenment'),
(130, 'Basiima Obeb', 'Muko I', 'Rwanyamahembe', '2016', 8, 39, 4, 0, 0, 1, 15.38, 75, 7.69, 0, 0, 1.92, 52, NULL, 99.99, 75.48, 'Grade two', 'Good', '22-11-2019 11:27:15 am', 'active', 'gorvenment'),
(131, 'muhumuza Richard', 'Rwentojo', 'Rwanyamahembe', '2016', 4, 27, 5, 0, 0, 0, 11.11, 75, 13.89, 0, 0, 0, 36, NULL, 100, 74.31, 'Grade three', 'Fair', '22-11-2019 11:28:40 am', 'active', 'gorvenment'),
(132, 'Akandwanaho Ezekiel', 'Mabira Parents School', 'Rwanyamahembe', '2016', 22, 13, 2, 0, 0, 0, 59.46, 35, 5.41, 0, 0, 0, 37, NULL, 100.01, 88.52, 'Grade two', 'Good', '22-11-2019 11:29:20 am', 'active', 'private'),
(133, 'Kansiime Anold', 'Wagawaga', 'Rwanyamahembe', '2016', 21, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 21, NULL, 100, 100, 'Grade one', 'Excellent', '22-11-2019 11:29:51 am', 'active', 'private'),
(134, 'Twesigye Enid', 'Nyampikye', 'Rwanyamahembe', '2016', 1, 22, 13, 10, 1, 1, 2.08, 46, 27.08, 20.83, 2.08, 2.08, 48, NULL, 99.98, 55.2, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:29:08 am', 'active', 'gorvenment'),
(135, 'Mujuni Naboth', 'Rweishamiro', 'Rwanyamahembe', '2016', 0, 10, 6, 4, 0, 0, 0, 50, 30, 20, 0, 0, 20, NULL, 100, 57.5, 'Grade three', 'Fair', '22-11-2019 11:30:17 am', 'active', 'gorvenment'),
(136, 'Atiisa Milton', 'Rutooma Intergrated', 'Rwanyamahembe', '2016', 0, 15, 13, 2, 1, 0, 0, 48, 41.94, 6.45, 3.23, 0, 31, NULL, 100.01, 58.88, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:30:37 am', 'active', 'gorvenment'),
(137, 'Kabigumira Vencious', 'Kibaare 1', 'Bukiro', '2016', 1, 14, 6, 2, 1, 1, 4, 56, 24, 8, 4, 4, 25, NULL, 100, 60, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:31:07 am', 'active', 'gorvenment'),
(138, 'Kyoshaba Justine', 'Akashanda', 'Bukiro', '2016', 2, 8, 7, 3, 0, 0, 10, 40, 35, 15, 0, 0, 20, NULL, 100, 61.25, 'Grade three', 'Fair', '22-11-2019 11:42:35 am', 'active', 'gorvenment'),
(139, 'Mugume Jonas', 'Nyantungu', 'Bukiro', '2016', 10, 39, 17, 7, 0, 1, 13.51, 53, 22.97, 9.46, 0, 1.35, 74, NULL, 99.99, 66.89, 'Grade three', 'Fair', '22-11-2019 11:43:53 am', 'active', 'gorvenment'),
(140, 'Abesiga Vivian', 'Kitengure', 'Bukiro', '2016', 0, 17, 6, 0, 0, 0, 0, 74, 26.09, 0, 0, 0, 23, NULL, 100, 68.48, 'Grade three', 'Fair', '22-11-2019 11:44:22 am', 'active', 'gorvenment'),
(141, 'Rwakaningi Denis', 'Rubingo I', 'Bukiro', '2016', 3, 13, 2, 0, 0, 2, 15, 65, 10, 0, 0, 10, 20, NULL, 100, 68.75, 'Grade three', 'Fair', '22-11-2019 11:44:34 am', 'active', 'gorvenment'),
(142, 'Mbakiza Joseph', 'Rwengwe 1', 'Bukiro', '2016', 0, 21, 3, 1, 0, 0, 0, 84, 12, 4, 0, 0, 25, NULL, 100, 70, 'Grade three', 'Fair', '22-11-2019 11:45:20 am', 'active', 'gorvenment'),
(143, 'Tukahirwa Jovia', 'Nyarubungo', 'Bukiro', '2016', 5, 31, 2, 1, 1, 1, 12.2, 76, 4.88, 2.44, 2.44, 2.44, 41, NULL, 100.01, 71.96, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:45:17 am', 'active', 'gorvenment'),
(144, 'bekyinga Asaph', 'Akarungu', 'Rubindi', '2016', 3, 23, 18, 14, 8, 1, 4.48, 34, 26.87, 20.9, 11.94, 1.49, 67, NULL, 100.01, 48.89, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:45:59 am', 'active', 'gorvenment'),
(145, 'Ahumuza Ruth', 'Rubingo-Nyanja', 'Bukiro', '2016', 5, 7, 9, 3, 1, 1, 19.23, 27, 34.62, 11.54, 3.85, 3.85, 26, NULL, 100.01, 59.62, 'Grade four', 'Fair with Ungraded', '22-11-2019 11:46:36 am', 'active', 'gorvenment'),
(146, 'Barigye Cyprus', 'kaihiro', 'Rubindi', '2016', 2, 11, 5, 6, 4, 1, 6.9, 38, 17.24, 20.69, 13.79, 3.45, 29, NULL, 100, 49.14, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:47:10 am', 'active', 'gorvenment'),
(147, 'Muhairwe Milton Twaza', 'Buyenje', 'Rubindi', '2016', 6, 16, 0, 0, 0, 1, 26.09, 70, 0, 0, 0, 4.35, 23, NULL, 100.01, 78.27, 'Grade two', 'Good', '22-11-2019 11:47:59 am', 'active', 'gorvenment'),
(148, 'Bwomi Joshua Agaba', 'Nyamiriro', 'Rubindi', '2016', 0, 2, 4, 3, 4, 2, 0, 13, 26.67, 20, 26.67, 13.33, 15, NULL, 100, 28.33, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:47:54 am', 'active', 'gorvenment'),
(149, 'Mwebesa Deo', 'Rubindi Girls', 'Rubindi', '2016', 10, 18, 0, 0, 0, 0, 35.71, 64, 0, 0, 0, 0, 28, NULL, 100, 83.93, 'Grade two', 'Good', '22-11-2019 11:50:30 am', 'active', 'gorvenment'),
(150, 'Ssali Abdul Kariim', 'Kariro Muslim', 'Rubindi', '2016', 1, 8, 7, 3, 0, 0, 5.26, 42, 36.84, 15.79, 0, 0, 19, NULL, 100, 59.21, 'Grade three', 'Fair', '22-11-2019 11:49:22 am', 'active', 'gorvenment'),
(151, 'Asiimwe Specius', 'Karuhitsi', 'Rubindi', '2016', 3, 19, 3, 0, 0, 0, 12, 76, 12, 0, 0, 0, 25, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 11:51:28 am', 'active', 'gorvenment'),
(152, 'Mugerwa Prima', 'Rwamuhigi', 'Rubindi', '2016', 1, 3, 2, 1, 6, 2, 6.67, 20, 13.33, 6.67, 40, 13.33, 15, NULL, 100, 30, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:51:09 am', 'active', 'gorvenment'),
(153, 'Lwanga Narcis', 'Kyakataara', 'Rubindi', '2016', 1, 18, 2, 0, 0, 0, 4.76, 86, 9.52, 0, 0, 0, 21, NULL, 99.99, 73.8, 'Grade three', 'Fair', '22-11-2019 11:52:16 am', 'active', 'gorvenment'),
(154, 'Bamwesigye Asaph', 'Rubindi Preparatory', 'Rubindi', '2016', 23, 12, 0, 0, 0, 0, 65.71, 34, 0, 0, 0, 0, 35, NULL, 100, 91.43, 'Grade two', 'Good', '22-11-2019 11:52:49 am', 'active', 'private'),
(156, 'Magezi Patrick', 'Hopebel', 'Rubindi', '2016', 24, 2, 0, 0, 0, 1, 88.89, 7, 0, 0, 0, 3.7, 27, NULL, 100, 94.45, 'Grade two', 'Good', '22-11-2019 11:53:34 am', 'active', 'private'),
(157, 'Amutuhaire Grace', 'Ant Betty Ruhumba', 'Rubindi', '2016', 0, 9, 5, 0, 3, 2, 0, 47, 26.32, 0, 15.79, 10.53, 19, NULL, 100.01, 48.69, 'Ungraded', 'Poor with Ungraded', '22-11-2019 11:54:01 am', 'active', 'private'),
(158, 'Bekunda George William', 'Rwembirizi', 'Rubindi', '2016', 4, 16, 5, 3, 0, 0, 14.29, 57, 17.86, 10.71, 0, 0, 28, NULL, 100, 68.75, 'Grade three', 'Fair', '22-11-2019 11:54:59 am', 'active', 'gorvenment'),
(159, 'Mugarura Robert', 'Rubindi Boys', 'Rubindi', '2016', 5, 30, 2, 0, 0, 1, 13.16, 79, 5.26, 0, 0, 2.63, 38, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 11:56:10 am', 'active', 'gorvenment'),
(160, 'Kiiza Dominic', 'Rukanja', 'Rubindi', '2016', 8, 54, 9, 3, 0, 3, 10.39, 70, 11.69, 3.9, 0, 3.9, 77, NULL, 100.01, 69.81, 'Grade three', 'Fair', '22-11-2019 11:57:04 am', 'active', 'gorvenment'),
(161, 'Amos Ashaba', 'St.Josephs Model', 'Rubindi', '2016', 43, 12, 0, 0, 0, 0, 78.18, 22, 0, 0, 0, 0, 55, NULL, 100, 94.55, 'Grade two', 'Good', '22-11-2019 12:21:47 pm', 'active', 'private'),
(162, 'Boona Mpumwire Edith', 'Kagongi I', 'Kagongi', '2016', 3, 13, 11, 3, 3, 0, 9.09, 39, 33.33, 9.09, 9.09, 0, 33, NULL, 99.99, 57.57, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:22:21 pm', 'active', 'gorvenment'),
(163, 'Kamugisha Julius', 'Kibingo 111', 'Kagongi', '2016', 0, 7, 9, 5, 0, 0, 0, 33, 42.86, 23.81, 0, 0, 21, NULL, 100, 52.38, 'Grade three', 'Fair', '22-11-2019 12:25:05 pm', 'active', 'gorvenment'),
(164, 'Nuwagaba Crescent', 'Munyonyi Mixed', 'Kagongi', '2016', 0, 4, 8, 5, 0, 1, 0, 22, 44.44, 27.78, 0, 5.56, 18, NULL, 100, 45.83, 'Grade four', 'Poor', '22-11-2019 12:25:52 pm', 'active', 'gorvenment'),
(165, 'Nyabwangu Jolly', 'Bwengure', 'Kagongi', '2016', 2, 22, 2, 2, 0, 0, 7.14, 79, 7.14, 7.14, 0, 0, 28, NULL, 99.99, 71.42, 'Grade three', 'Fair', '22-11-2019 12:17:30 pm', 'active', 'gorvenment'),
(166, 'Rutafa James', 'Nyakabwera', 'Kagongi', '2016', 36, 23, 10, 6, 4, 2, 44.44, 28, 12.35, 7.41, 4.94, 2.47, 81, NULL, 100.01, 73.77, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:26:46 pm', 'active', 'gorvenment'),
(167, 'Bainomugisha Alex', 'omukagyera', 'Kagongi', '2016', 0, 4, 8, 3, 2, 1, 0, 22, 44.44, 16.67, 11.11, 5.56, 18, NULL, 100, 43.05, 'Ungraded', 'Poor with Ungraded', '22-11-2019 12:27:56 pm', 'active', 'gorvenment'),
(168, 'Mwijuka Deuth', 'Rweshe', 'Kagongi', '2016', 0, 19, 9, 2, 2, 1, 0, 58, 27.27, 6.06, 6.06, 3.03, 33, NULL, 100, 58.34, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:28:35 pm', 'active', 'gorvenment'),
(169, 'Tumushabe Betyce', 'Katagyengyera', 'Kagongi', '2016', 2, 34, 12, 4, 2, 1, 3.64, 62, 21.82, 7.27, 3.64, 1.82, 55, NULL, 100.01, 62.73, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:27:42 pm', 'active', 'gorvenment'),
(170, 'Kamayangi Angela', 'Kyarushanje', 'Kagongi', '2016', 16, 37, 8, 7, 6, 1, 21.33, 49, 10.67, 9.33, 8, 1.33, 75, NULL, 99.99, 66, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:29:14 pm', 'active', 'gorvenment'),
(171, 'Mworozi Adrine', 'Rwamanuma', 'Kagongi', '2016', 0, 4, 3, 3, 5, 3, 0, 22, 16.67, 16.67, 27.78, 16.67, 18, NULL, 100.01, 29.17, 'Ungraded', 'Poor with Ungraded', '22-11-2019 12:29:13 pm', 'active', 'gorvenment'),
(172, 'Tumubwine Patrick', 'Nyaminyobwa', 'Kagongi', '2016', 0, 7, 5, 4, 0, 0, 0, 44, 31.25, 25, 0, 0, 16, NULL, 100, 54.69, 'Grade three', 'Fair', '22-11-2019 12:30:33 pm', 'active', 'gorvenment'),
(173, 'Mugume Ihinduza Abel', 'Nsiika', 'Kagongi', '2016', 7, 46, 18, 8, 9, 2, 7.78, 51, 20, 8.89, 10, 2.22, 90, NULL, 100, 58.34, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:30:26 pm', 'active', 'gorvenment'),
(174, 'Muhumsa Ephraim', 'Rweshe Pentecost', 'Kagongi', '2016', 2, 11, 1, 1, 1, 0, 12.5, 69, 6.25, 6.25, 6.25, 0, 16, NULL, 100, 68.75, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:33:47 pm', 'active', 'private'),
(175, 'Muhereza Vicent', 'Akabaare', 'Kashare', '2016', 2, 21, 4, 4, 0, 0, 6.45, 68, 12.9, 12.9, 0, 0, 31, NULL, 99.99, 66.93, 'Grade three', 'Fair', '22-11-2019 12:31:49 pm', 'active', 'gorvenment'),
(176, 'Asiimwe Herbert', 'Amabaare', 'Kashare', '2016', 0, 8, 7, 4, 1, 1, 0, 38, 33.33, 19.05, 4.76, 4.76, 21, NULL, 100, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:34:21 pm', 'active', 'gorvenment'),
(177, 'Mutungi Deus', 'Kyenshama', 'Kashare', '2016', 2, 8, 2, 3, 0, 1, 12.5, 50, 12.5, 18.75, 0, 6.25, 16, NULL, 100, 60.94, 'Grade three', 'Fair', '22-11-2019 12:36:12 pm', 'active', 'gorvenment'),
(178, 'Namurebire Julius', 'Kitongore 11', 'Kashare', '2016', 0, 8, 4, 4, 6, 0, 0, 36, 18.18, 18.18, 27.27, 0, 22, NULL, 99.99, 40.91, 'Ungraded', 'Poor with Ungraded', '22-11-2019 12:36:03 pm', 'active', 'gorvenment'),
(179, 'Nankunda Zephrine', 'Nchune', 'Kashare', '2016', 0, 11, 3, 1, 0, 0, 0, 73, 20, 6.67, 0, 0, 15, NULL, 100, 66.67, 'Grade three', 'Fair', '22-11-2019 12:37:01 pm', 'active', 'gorvenment'),
(180, 'kiconco Enid', 'Mirongo Central school', 'Kashare', '2016', 0, 21, 5, 0, 0, 0, 0, 81, 19.23, 0, 0, 0, 26, NULL, 100, 70.19, 'Grade three', 'Fair', '22-11-2019 12:37:11 pm', 'active', 'gorvenment'),
(181, 'Kaduya Halima', 'Nyamirima Moslem', 'Kashare', '2016', 0, 7, 9, 6, 4, 0, 0, 27, 34.62, 23.08, 15.38, 0, 26, NULL, 100, 43.27, 'Ungraded', 'Poor with Ungraded', '22-11-2019 12:37:56 pm', 'active', 'gorvenment'),
(182, 'Mugabo Dickson', 'Nombe', 'Kashare', '2016', 9, 29, 0, 0, 0, 0, 23.68, 76, 0, 0, 0, 0, 38, NULL, 100, 80.92, 'Grade two', 'Good', '22-11-2019 12:38:22 pm', 'active', 'gorvenment'),
(183, 'Kekihembo Naome', 'Rugarura', 'Kashare', '2016', 0, 9, 4, 0, 0, 3, 0, 56, 25, 0, 0, 18.75, 16, NULL, 100, 54.69, 'Grade three', 'Fair', '22-11-2019 12:38:48 pm', 'active', 'gorvenment'),
(184, 'Mpongano Elly', 'omukabaare', 'Kashare', '2016', 5, 23, 2, 3, 1, 0, 14.71, 68, 5.88, 8.82, 2.94, 0, 34, NULL, 100, 70.59, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:39:08 pm', 'active', 'gorvenment'),
(185, 'Musinguzi Gidion', 'Rweibaare 1', 'Kashare', '2016', 1, 11, 10, 4, 3, 1, 3.33, 37, 33.33, 13.33, 10, 3.33, 30, NULL, 99.99, 50.83, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:40:22 pm', 'active', 'gorvenment'),
(186, 'Boroba James', 'Rwobugoigo', 'Kashare', '2016', 1, 15, 2, 1, 1, 1, 4.76, 71, 9.52, 4.76, 4.76, 4.76, 21, NULL, 99.99, 64.28, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:41:05 pm', 'active', 'gorvenment'),
(187, 'Nuwagaba Apollo', 'Rwamukondo', 'Kashare', '2016', 4, 19, 4, 1, 0, 0, 14.29, 68, 14.29, 3.57, 0, 0, 28, NULL, 100.01, 73.22, 'Grade three', 'Fair', '22-11-2019 12:40:17 pm', 'active', 'gorvenment'),
(188, 'Abaasa Agnes', 'Rubindi Parents', 'Kashare', '2016', 44, 21, 4, 1, 0, 0, 62.86, 30, 5.71, 1.43, 0, 0, 70, NULL, 100, 88.57, 'Grade two', 'Good', '22-11-2019 12:41:55 pm', 'active', 'private'),
(189, 'Atusiime Jane', 'Rweibare 11', 'Kashare', '2016', 15, 31, 1, 0, 0, 0, 31.91, 66, 2.13, 0, 0, 0, 47, NULL, 100, 82.45, 'Grade two', 'Good', '22-11-2019 12:42:23 pm', 'active', 'gorvenment'),
(190, 'Mugarura Keneth', 'Lypa International', 'Kashare', '2016', 54, 35, 2, 0, 0, 0, 59.34, 38, 2.2, 0, 0, 0, 91, NULL, 100, 89.29, 'Grade two', 'Good', '22-11-2019 12:43:36 pm', 'active', 'private'),
(191, 'Namara Jane', 'St. Marys Rweibaare', 'Kashare', '2016', 6, 19, 10, 1, 1, 0, 16.22, 51, 27.03, 2.7, 2.7, 0, 37, NULL, 100, 68.92, 'Grade four', 'Fair with Ungraded', '22-11-2019 12:44:08 pm', 'active', 'gorvenment'),
(192, 'Kiconco Betty', 'Katooma II', 'Bubaare', '2017', 0, 24, 6, 2, 0, 0, 0, 75, 18.75, 6.25, 0, 0, 32, NULL, 100, 67.19, 'Grade three', 'Fair', '22-11-2019 01:54:34 pm', 'active', 'gorvenment'),
(193, 'Mugume Wilson', 'Komuyaga', 'Bubaare', '2017', 0, 5, 10, 4, 1, 1, 0, 24, 47.62, 19.05, 4.76, 4.76, 21, NULL, 100, 46.43, 'Ungraded', 'Poor with Ungraded', '22-11-2019 01:55:18 pm', 'active', 'gorvenment'),
(194, 'Ainomugisha Costance', 'Mukora', 'Bubaare', '2017', 2, 24, 1, 0, 0, 0, 7.41, 89, 3.7, 0, 0, 0, 27, NULL, 100, 75.93, 'Grade two', 'Good', '22-11-2019 01:56:01 pm', 'active', 'gorvenment'),
(195, 'Twinamatsiko Yoab Magara', 'Rubaare', 'Bubaare', '2017', 1, 13, 1, 0, 1, 0, 6.25, 81, 6.25, 0, 6.25, 0, 16, NULL, 100, 70.31, 'Grade four', 'Fair with Ungraded', '22-11-2019 01:56:31 pm', 'active', 'gorvenment'),
(196, 'Nankunda Richard', 'Rwentaga', 'Bubaare', '2017', 6, 24, 3, 1, 0, 0, 17.65, 71, 8.82, 2.94, 0, 0, 34, NULL, 100, 75.74, 'Grade two', 'Good', '22-11-2019 01:57:07 pm', 'active', 'gorvenment'),
(197, 'Anita Ainembabazi', 'St. Anita Memorial', 'Bubaare', '2017', 4, 26, 3, 0, 0, 1, 11.76, 76, 8.82, 0, 0, 2.94, 34, NULL, 99.99, 73.52, 'Grade three', 'Fair', '22-11-2019 01:58:05 pm', 'active', 'private'),
(198, 'Kamugisha Elia', 'Coloma', 'Bubaare', '2017', 18, 21, 0, 0, 0, 0, 46.15, 54, 0, 0, 0, 0, 39, NULL, 100, 86.54, 'Grade two', 'Good', '22-11-2019 01:58:59 pm', 'active', 'private'),
(199, 'Asiimwe Patrick', 'Kashaka', 'Bubaare', '2017', 2, 12, 6, 1, 1, 0, 9.09, 55, 27.27, 4.55, 4.55, 0, 22, NULL, 100.01, 64.78, 'Grade four', 'Fair with Ungraded', '22-11-2019 01:59:20 pm', 'active', 'gorvenment'),
(200, 'Byarugaba Vicent Mukwate', 'Katsikizi', 'Bubaare', '2017', 7, 9, 1, 0, 0, 0, 41.18, 53, 5.88, 0, 0, 0, 17, NULL, 100, 83.83, 'Grade two', 'Good', '22-11-2019 02:00:02 pm', 'active', 'gorvenment'),
(201, 'Kwesiga Erastus', 'Mugarutsa', 'Bubaare', '2017', 34, 94, 7, 1, 0, 1, 24.82, 69, 5.11, 0.73, 0, 0.73, 137, NULL, 100, 79.02, 'Grade two', 'Good', '22-11-2019 02:00:47 pm', 'active', 'gorvenment'),
(202, 'Bamuhimbise Wilson', 'Nshozi', 'Bubaare', '2017', 0, 7, 8, 2, 1, 1, 0, 37, 42.11, 10.53, 5.26, 5.26, 19, NULL, 100, 51.32, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:01:25 pm', 'active', 'gorvenment'),
(203, 'Kobuyonjo Juliet', 'Rugarama II', 'Bubaare', '2017', 2, 21, 7, 0, 0, 0, 6.67, 70, 23.33, 0, 0, 0, 30, NULL, 100, 70.84, 'Grade three', 'Fair', '22-11-2019 02:02:23 pm', 'active', 'gorvenment'),
(204, 'Muhwezi DEO', 'St. Simon Kooga', 'Bubaare', '2017', 0, 14, 4, 3, 1, 1, 0, 61, 17.39, 13.04, 4.35, 4.35, 23, NULL, 100, 57.61, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:03:01 pm', 'active', 'gorvenment'),
(205, 'Kamuhangire Elias', 'Bunenero', 'Rubaya', '2017', 2, 36, 2, 0, 0, 0, 5, 90, 5, 0, 0, 0, 40, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 02:03:42 pm', 'active', 'gorvenment'),
(206, 'Dissi Livingston', 'Itara', 'Rubaya', '2017', 1, 12, 4, 2, 1, 0, 5, 60, 20, 10, 5, 0, 20, NULL, 100, 62.5, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:05:38 pm', 'active', 'gorvenment'),
(207, 'Kasigaire Benon', 'Kyamatambarire', 'Rubaya', '2017', 2, 21, 4, 2, 0, 1, 6.67, 70, 13.33, 6.67, 0, 3.33, 30, NULL, 100, 67.5, 'Grade three', 'Fair', '22-11-2019 02:07:03 pm', 'active', 'gorvenment'),
(208, 'Bitekyerezo Julius', 'Rubaya', 'Rubaya', '2017', 0, 11, 4, 5, 0, 1, 0, 52, 19.05, 23.81, 0, 4.76, 21, NULL, 100, 54.76, 'Grade three', 'Fair', '22-11-2019 02:08:51 pm', 'active', 'gorvenment'),
(209, 'Nuwagira Robert', 'Ruhunga', 'Rubaya', '2017', 0, 12, 4, 1, 0, 0, 0, 71, 23.53, 5.88, 0, 0, 17, NULL, 100, 66.18, 'Grade three', 'Fair', '22-11-2019 02:09:58 pm', 'active', 'gorvenment'),
(210, 'Karuhanga Piason', 'Rwantsinga', 'Rubaya', '2017', 1, 28, 11, 2, 0, 1, 2.33, 65, 25.58, 4.65, 0, 2.33, 43, NULL, 100.01, 65.12, 'Grade three', 'Fair', '22-11-2019 02:10:32 pm', 'active', 'gorvenment'),
(211, 'Modern h/t', 'Kahoma Modern', 'Rubaya', '2017', 3, 23, 1, 1, 0, 0, 10.71, 82, 3.57, 3.57, 0, 0, 28, NULL, 99.99, 74.99, 'Grade three', 'Fair', '22-11-2019 02:11:27 pm', 'active', 'private'),
(212, 'Kokunda Lydia', 'Rushozi', 'Rubaya', '2017', 1, 12, 4, 1, 0, 2, 5, 60, 20, 5, 0, 10, 20, NULL, 100, 61.25, 'Grade three', 'Fair', '22-11-2019 02:12:15 pm', 'active', 'gorvenment'),
(213, 'Bainomukama Gerald', 'Ruburara', 'Rubaya', '2017', 1, 14, 8, 5, 0, 0, 3.57, 50, 28.57, 17.86, 0, 0, 28, NULL, 100, 59.82, 'Grade three', 'Fair', '22-11-2019 02:13:05 pm', 'active', 'gorvenment'),
(214, 'Mwebaze Methodius', 'Omukigando', 'Rubaya', '2017', 0, 11, 1, 3, 1, 1, 0, 65, 5.88, 17.65, 5.88, 5.88, 17, NULL, 100, 55.89, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:14:13 pm', 'active', 'gorvenment'),
(215, 'Mutabazi Edson', 'Kaguhanzya', 'Rubaya', '2017', 7, 36, 2, 0, 0, 0, 15.56, 80, 4.44, 0, 0, 0, 45, NULL, 100, 77.78, 'Grade two', 'Good', '22-11-2019 02:15:03 pm', 'active', 'gorvenment'),
(216, 'Atukunda Agnes', 'Esteeri Kokundeka Memorial', 'Rubaya', '2017', 1, 22, 1, 0, 0, 1, 4, 88, 4, 0, 0, 4, 25, NULL, 100, 72, 'Grade three', 'Fair', '22-11-2019 02:15:39 pm', 'active', 'gorvenment'),
(217, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2017', 1, 19, 6, 2, 0, 2, 3.33, 63, 20, 6.67, 0, 6.67, 30, NULL, 100, 62.5, 'Grade three', 'Fair', '22-11-2019 02:16:12 pm', 'active', 'gorvenment'),
(218, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2017', 3, 35, 6, 2, 3, 1, 6, 70, 12, 4, 6, 2, 50, NULL, 100, 65.5, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:17:31 pm', 'active', 'gorvenment'),
(219, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2017', 5, 19, 5, 1, 0, 0, 16.67, 63, 16.67, 3.33, 0, 0, 30, NULL, 100, 73.34, 'Grade three', 'Fair', '22-11-2019 02:20:37 pm', 'active', 'gorvenment'),
(220, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2017', 11, 63, 5, 2, 2, 2, 12.94, 74, 5.88, 2.35, 2.35, 2.35, 85, NULL, 99.99, 72.06, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:14:06 pm', 'active', 'gorvenment'),
(221, 'Basiima Obeb', 'Muko I', 'Rwanyamahembe', '2017', 2, 28, 5, 0, 0, 2, 5.41, 76, 13.51, 0, 0, 5.41, 37, NULL, 100.01, 68.93, 'Grade three', 'Fair', '22-11-2019 02:22:12 pm', 'active', 'gorvenment'),
(222, 'Muraarira Kandiho Sam', 'Nyakayojo II', 'Rwanyamahembe', '2017', 0, 13, 5, 0, 0, 0, 0, 72, 27.78, 0, 0, 0, 18, NULL, 100, 68.06, 'Grade three', 'Fair', '22-11-2019 02:25:42 pm', 'active', 'gorvenment'),
(223, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2017', 0, 29, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 29, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 02:22:55 pm', 'active', 'gorvenment'),
(224, 'Muhumuza Jotham', 'Mishenyi', 'Rwanyamahembe', '2017', 9, 35, 3, 2, 4, 1, 16.67, 65, 5.56, 3.7, 7.41, 1.85, 54, NULL, 100, 68.98, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:23:48 pm', 'active', 'gorvenment'),
(225, 'Akandwanaho Ezekiel', 'Mabira Parents School', 'Rwanyamahembe', '2017', 15, 10, 0, 0, 0, 0, 60, 40, 0, 0, 0, 0, 25, NULL, 100, 90, 'Grade two', 'Good', '22-11-2019 02:25:05 pm', 'active', 'private'),
(226, 'Twesigye Enid', 'Nyampikye', 'Rwanyamahembe', '2017', 4, 29, 3, 1, 0, 0, 10.81, 78, 8.11, 2.7, 0, 0, 37, NULL, 100, 74.33, 'Grade three', 'Fair', '22-11-2019 02:26:13 pm', 'active', 'gorvenment'),
(227, 'Katugwensi Flora Barigye', 'Runengo', 'Rwanyamahembe', '2017', 3, 26, 2, 0, 0, 0, 9.68, 84, 6.45, 0, 0, 0, 31, NULL, 100, 75.81, 'Grade two', 'Good', '22-11-2019 02:27:11 pm', 'active', 'gorvenment'),
(228, 'Ngabirano Jones', 'Rutooma Modern', 'Rwanyamahembe', '2017', 1, 11, 5, 1, 0, 0, 5.56, 61, 27.78, 5.56, 0, 0, 18, NULL, 100.01, 66.67, 'Grade three', 'Fair', '22-11-2019 02:27:54 pm', 'active', 'gorvenment'),
(229, 'Atiisa Milton', 'Rutooma Intergrated', 'Rwanyamahembe', '2017', 0, 9, 8, 3, 0, 0, 0, 45, 40, 15, 0, 0, 20, NULL, 100, 57.5, 'Grade three', 'Fair', '22-11-2019 02:27:22 pm', 'active', 'gorvenment'),
(230, 'muhumuza Richard', 'Rwentojo', 'Rwanyamahembe', '2017', 4, 34, 0, 0, 0, 1, 10.26, 87, 0, 0, 0, 2.56, 39, NULL, 100, 75.65, 'Grade two', 'Good', '22-11-2019 02:28:33 pm', 'active', 'gorvenment'),
(231, 'Mujuni Naboth', 'Rweishamiro', 'Rwanyamahembe', '2017', 0, 21, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 21, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 02:28:43 pm', 'active', 'gorvenment'),
(232, 'Kansiime Anold', 'Wagawaga', 'Rwanyamahembe', '2017', 20, 0, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 20, NULL, 100, 100, 'Grade one', 'Excellent', '22-11-2019 02:37:39 pm', 'active', 'private'),
(233, 'Kyoshaba Justine', 'Akashanda', 'Bukiro', '2017', 2, 20, 5, 4, 1, 4, 5.56, 56, 13.89, 11.11, 2.78, 11.11, 36, NULL, 100.01, 56.95, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:30:33 pm', 'active', 'gorvenment'),
(234, 'Kabigumira Vencious', 'Kibaare 1', 'Bukiro', '2017', 0, 8, 2, 1, 0, 4, 0, 53, 13.33, 6.67, 0, 26.67, 15, NULL, 100, 48.33, 'Grade four', 'Poor', '22-11-2019 02:29:02 pm', 'active', 'gorvenment'),
(235, 'Abesiga Vivian', 'Kitengure', 'Bukiro', '2017', 0, 30, 1, 0, 0, 0, 0, 97, 3.23, 0, 0, 0, 31, NULL, 100, 74.19, 'Grade three', 'Fair', '22-11-2019 02:35:45 pm', 'active', 'gorvenment'),
(236, 'Tukahirwa Jovia', 'Nyarubungo', 'Bukiro', '2017', 1, 27, 4, 3, 2, 2, 2.56, 69, 10.26, 7.69, 5.13, 5.13, 39, NULL, 100, 61.54, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:36:59 pm', 'active', 'gorvenment'),
(237, 'Ahumuza Ruth', 'Rubingo-Nyanja', 'Bukiro', '2017', 0, 5, 6, 4, 0, 0, 0, 33, 40, 26.67, 0, 0, 15, NULL, 100, 51.67, 'Grade three', 'Fair', '22-11-2019 02:38:00 pm', 'active', 'gorvenment'),
(238, 'Mugume Jonas', 'Nyantungu', 'Bukiro', '2017', 2, 38, 17, 5, 0, 2, 3.13, 59, 26.56, 7.81, 0, 3.13, 64, NULL, 100.01, 62.9, 'Grade three', 'Fair', '22-11-2019 02:36:11 pm', 'active', 'gorvenment'),
(239, 'Rwakaningi Denis', 'Rubingo I', 'Bukiro', '2017', 6, 19, 0, 0, 0, 1, 23.08, 73, 0, 0, 0, 3.85, 26, NULL, 100.01, 77.89, 'Grade two', 'Good', '22-11-2019 02:39:38 pm', 'active', 'gorvenment'),
(240, 'bekyinga Asaph', 'Akarungu', 'Rubindi', '2017', 14, 16, 2, 1, 0, 0, 42.42, 48, 6.06, 3.03, 0, 0, 33, NULL, 99.99, 82.57, 'Grade two', 'Good', '22-11-2019 02:39:06 pm', 'active', 'gorvenment'),
(241, 'Mbakiza Joseph', 'Rwengwe 1', 'Bukiro', '2017', 3, 34, 6, 5, 0, 1, 6.12, 69, 12.24, 10.2, 0, 2.04, 49, NULL, 99.99, 66.83, 'Grade three', 'Fair', '22-11-2019 02:40:14 pm', 'active', 'gorvenment'),
(242, 'Barigye Cyprus', 'kaihiro', 'Rubindi', '2017', 0, 16, 7, 4, 0, 1, 0, 57, 25, 14.29, 0, 3.57, 28, NULL, 100, 58.93, 'Grade three', 'Fair', '22-11-2019 02:40:15 pm', 'active', 'gorvenment'),
(243, 'Muhairwe Milton Twaza', 'Buyenje', 'Rubindi', '2017', 2, 24, 0, 0, 0, 1, 7.41, 89, 0, 0, 0, 3.7, 27, NULL, 100, 74.08, 'Grade three', 'Fair', '22-11-2019 02:40:55 pm', 'active', 'gorvenment'),
(244, 'Ssali Abdul Kariim', 'Kariro Muslim', 'Rubindi', '2017', 0, 11, 11, 1, 0, 1, 0, 46, 45.83, 4.17, 0, 4.17, 24, NULL, 100, 58.33, 'Grade three', 'Fair', '22-11-2019 02:41:30 pm', 'active', 'gorvenment'),
(245, 'Asiimwe Specius', 'Karuhitsi', 'Rubindi', '2017', 1, 22, 2, 0, 0, 0, 4, 88, 8, 0, 0, 0, 25, NULL, 100, 74, 'Grade three', 'Fair', '22-11-2019 02:41:23 pm', 'active', 'gorvenment'),
(246, 'Lwanga Narcis', 'Kyakataara', 'Rubindi', '2017', 1, 22, 8, 1, 0, 1, 3.03, 67, 24.24, 3.03, 0, 3.03, 33, NULL, 100, 65.91, 'Grade three', 'Fair', '22-11-2019 02:42:31 pm', 'active', 'gorvenment');
INSERT INTO `hteacher_grades` (`id`, `teacher_name`, `school_name`, `sub_county`, `year`, `g_1`, `g_2`, `g_3`, `g_4`, `g_u`, `g_x`, `p_1`, `p_2`, `p_3`, `p_4`, `p_u`, `p_x`, `g_total`, `pat_total`, `p_total`, `p_actual`, `grade`, `remarks`, `report_date`, `status`, `sch_category`) VALUES
(247, 'Bwomi Joshua Agaba', 'Nyamiriro', 'Rubindi', '2017', 1, 19, 8, 2, 1, 0, 3.23, 61, 25.81, 6.45, 3.23, 0, 31, NULL, 100.01, 63.72, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:42:31 pm', 'active', 'gorvenment'),
(248, 'Mwebesa Deo', 'Rubindi Girls', 'Rubindi', '2017', 4, 28, 0, 1, 0, 0, 12.12, 85, 0, 3.03, 0, 0, 33, NULL, 100, 76.52, 'Grade two', 'Good', '22-11-2019 02:44:07 pm', 'active', 'gorvenment'),
(249, 'Mugarura Robert', 'Rubindi Boys', 'Rubindi', '2017', 6, 25, 0, 0, 0, 0, 19.35, 81, 0, 0, 0, 0, 31, NULL, 100, 79.84, 'Grade two', 'Good', '22-11-2019 02:45:26 pm', 'active', 'gorvenment'),
(250, 'Mugerwa Prima', 'Rwamuhigi', 'Rubindi', '2017', 0, 2, 2, 4, 9, 3, 0, 10, 10, 20, 45, 15, 20, NULL, 100, 17.5, 'Ungraded', 'Failed with Ungraded', '22-11-2019 02:45:12 pm', 'active', 'gorvenment'),
(251, 'Bamwesigye Asaph', 'Rubindi Preparatory', 'Rubindi', '2017', 26, 2, 0, 0, 0, 0, 92.86, 7, 0, 0, 0, 0, 28, NULL, 100, 98.22, 'Grade two', 'Good', '22-11-2019 02:46:50 pm', 'active', 'private'),
(252, 'Kiiza Dominic', 'Rukanja', 'Rubindi', '2017', 8, 43, 10, 2, 0, 2, 12.31, 66, 15.38, 3.08, 0, 3.08, 65, NULL, 100, 70.38, 'Grade three', 'Fair', '22-11-2019 02:46:14 pm', 'active', 'gorvenment'),
(253, 'Amos Ashaba', 'St.Josephs Model', 'Rubindi', '2017', 46, 10, 0, 0, 0, 0, 82.14, 18, 0, 0, 0, 0, 56, NULL, 100, 95.54, 'Grade two', 'Good', '22-11-2019 02:48:27 pm', 'active', 'private'),
(254, 'Bekunda George William', 'Rwembirizi', 'Rubindi', '2017', 0, 21, 5, 0, 0, 0, 0, 81, 19.23, 0, 0, 0, 26, NULL, 100, 70.19, 'Grade three', 'Fair', '22-11-2019 02:49:35 pm', 'active', 'gorvenment'),
(255, 'Magezi Patrick', 'Hopebel', 'Rubindi', '2017', 24, 4, 0, 0, 0, 0, 85.71, 14, 0, 0, 0, 0, 28, NULL, 100, 96.43, 'Grade two', 'Good', '22-11-2019 02:50:31 pm', 'active', 'private'),
(256, 'Boona Mpumwire Edith', 'Kagongi I', 'Kagongi', '2017', 0, 14, 10, 7, 3, 1, 0, 40, 28.57, 20, 8.57, 2.86, 35, NULL, 100, 49.29, 'Ungraded', 'Poor with Ungraded', '22-11-2019 02:51:13 pm', 'active', 'gorvenment'),
(257, 'Kamugisha Julius', 'Kibingo 111', 'Kagongi', '2017', 0, 5, 6, 8, 0, 0, 0, 26, 31.58, 42.11, 0, 0, 19, NULL, 100.01, 46.06, 'Grade four', 'Poor', '22-11-2019 02:56:04 pm', 'active', 'gorvenment'),
(258, 'Nyabwangu Jolly', 'Bwengure', 'Kagongi', '2017', 0, 17, 3, 0, 0, 0, 0, 85, 15, 0, 0, 0, 20, NULL, 100, 71.25, 'Grade three', 'Fair', '22-11-2019 02:57:02 pm', 'active', 'gorvenment'),
(259, 'Nuwagaba Crescent', 'Munyonyi Mixed', 'Kagongi', '2017', 1, 15, 3, 3, 2, 2, 3.85, 58, 11.54, 11.54, 7.69, 7.69, 26, NULL, 100, 55.77, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:57:16 pm', 'active', 'gorvenment'),
(260, 'Tumushabe Betyce', 'Katagyengyera', 'Kagongi', '2017', 0, 7, 7, 1, 3, 1, 0, 37, 36.84, 5.26, 15.79, 5.26, 19, NULL, 99.99, 47.37, 'Ungraded', 'Poor with Ungraded', '22-11-2019 02:57:52 pm', 'active', 'gorvenment'),
(261, 'Rutafa James', 'Nyakabwera', 'Kagongi', '2017', 12, 25, 6, 10, 4, 3, 20, 42, 10, 16.67, 6.67, 5, 60, NULL, 100.01, 60.42, 'Grade four', 'Fair with Ungraded', '22-11-2019 02:58:27 pm', 'active', 'gorvenment'),
(262, 'Kamayangi Angela', 'Kyarushanje', 'Kagongi', '2017', 4, 39, 6, 0, 0, 1, 8, 78, 12, 0, 0, 2, 50, NULL, 100, 72.5, 'Grade three', 'Fair', '22-11-2019 02:59:06 pm', 'active', 'gorvenment'),
(263, 'Bainomugisha Alex', 'omukagyera', 'Kagongi', '2017', 3, 23, 5, 1, 0, 0, 9.38, 72, 15.63, 3.13, 0, 0, 32, NULL, 100.02, 71.89, 'Grade three', 'Fair', '22-11-2019 02:59:59 pm', 'active', 'gorvenment'),
(264, 'Mugume Ihinduza Abel', 'Nsiika', 'Kagongi', '2017', 1, 38, 11, 6, 3, 0, 1.69, 64, 18.64, 10.17, 5.08, 0, 59, NULL, 99.99, 61.86, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:00:11 pm', 'active', 'gorvenment'),
(265, 'Mwijuka Deuth', 'Rweshe', 'Kagongi', '2017', 2, 24, 3, 1, 0, 0, 6.67, 80, 10, 3.33, 0, 0, 30, NULL, 100, 72.5, 'Grade three', 'Fair', '22-11-2019 03:00:50 pm', 'active', 'gorvenment'),
(266, 'Tumubwine Patrick', 'Nyaminyobwa', 'Kagongi', '2017', 0, 6, 5, 5, 2, 0, 0, 33, 27.78, 27.78, 11.11, 0, 18, NULL, 100, 45.83, 'Ungraded', 'Poor with Ungraded', '22-11-2019 03:01:13 pm', 'active', 'gorvenment'),
(267, 'Kamuntu Joseph', 'Moonlight', 'Kagongi', '2017', 9, 35, 5, 1, 0, 0, 18, 70, 10, 2, 0, 0, 50, NULL, 100, 76, 'Grade two', 'Good', '22-11-2019 03:02:12 pm', 'active', 'private'),
(268, 'Sande Ainamani', 'Rweshe Parents', 'Kagongi', '2017', 0, 14, 7, 2, 0, 0, 0, 61, 30.43, 8.7, 0, 0, 23, NULL, 100, 63.04, 'Grade three', 'Fair', '22-11-2019 03:03:33 pm', 'active', 'private'),
(269, 'Asiimwe Herbert', 'Amabaare', 'Kashare', '2017', 1, 20, 10, 2, 1, 0, 2.94, 59, 29.41, 5.88, 2.94, 0, 34, NULL, 99.99, 63.23, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:01:28 pm', 'active', 'gorvenment'),
(270, 'Muhereza Vicent', 'Akabaare', 'Kashare', '2017', 1, 17, 7, 3, 0, 1, 3.45, 59, 24.14, 10.34, 0, 3.45, 29, NULL, 100, 62.07, 'Grade three', 'Fair', '22-11-2019 03:05:20 pm', 'active', 'gorvenment'),
(271, 'kiconco Enid', 'Mirongo Central school', 'Kashare', '2017', 1, 15, 18, 2, 3, 0, 2.56, 38, 46.15, 5.13, 7.69, 0, 39, NULL, 99.99, 55.76, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:07:48 pm', 'active', 'gorvenment'),
(272, 'Mutungi Deus', 'Kyenshama', 'Kashare', '2017', 5, 18, 7, 3, 0, 0, 15.15, 55, 21.21, 9.09, 0, 0, 33, NULL, 100, 68.94, 'Grade three', 'Fair', '22-11-2019 03:08:07 pm', 'active', 'gorvenment'),
(273, 'Nankunda Zephrine', 'Nchune', 'Kashare', '2017', 2, 16, 5, 3, 1, 0, 7.41, 59, 18.52, 11.11, 3.7, 0, 27, NULL, 100, 63.89, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:09:15 pm', 'active', 'gorvenment'),
(274, 'Mugabo Dickson', 'Nombe', 'Kashare', '2017', 4, 39, 0, 0, 0, 1, 9.09, 89, 0, 0, 0, 2.27, 44, NULL, 100, 75.57, 'Grade two', 'Good', '22-11-2019 03:08:27 pm', 'active', 'gorvenment'),
(275, 'Mpirirwe Edith', 'Nyamirima', 'Kashare', '2017', 0, 4, 7, 12, 4, 1, 0, 14, 25, 42.86, 14.29, 3.57, 28, NULL, 100.01, 33.93, 'Ungraded', 'Poor with Ungraded', '22-11-2019 03:10:15 pm', 'active', 'gorvenment'),
(276, 'Mpongano Elly', 'omukabaare', 'Kashare', '2017', 2, 28, 7, 1, 0, 0, 5.26, 74, 18.42, 2.63, 0, 0, 38, NULL, 99.99, 70.39, 'Grade three', 'Fair', '22-11-2019 03:10:27 pm', 'active', 'gorvenment'),
(277, 'Nuwagaba Apollo', 'Rwamukondo', 'Kashare', '2017', 7, 23, 3, 1, 0, 1, 20, 66, 8.57, 2.86, 0, 2.86, 35, NULL, 100, 74.28, 'Grade three', 'Fair', '22-11-2019 03:11:34 pm', 'active', 'gorvenment'),
(278, 'Kekihembo Naome', 'Rugarura', 'Kashare', '2017', 0, 9, 5, 2, 0, 0, 0, 56, 31.25, 12.5, 0, 0, 16, NULL, 100, 60.94, 'Grade three', 'Fair', '22-11-2019 03:11:33 pm', 'active', 'gorvenment'),
(279, 'Atusiime Jane', 'Rweibare 11', 'Kashare', '2017', 9, 54, 1, 0, 0, 1, 13.85, 83, 1.54, 0, 0, 1.54, 65, NULL, 100.01, 76.93, 'Grade two', 'Good', '22-11-2019 03:12:23 pm', 'active', 'gorvenment'),
(280, 'Musinguzi Gidion', 'Rweibaare 1', 'Kashare', '2017', 0, 15, 6, 2, 0, 1, 0, 63, 25, 8.33, 0, 4.17, 24, NULL, 100, 61.46, 'Grade three', 'Fair', '22-11-2019 03:13:01 pm', 'active', 'gorvenment'),
(281, 'Namara Jane', 'St. Marys Rweibaare', 'Kashare', '2017', 2, 24, 4, 0, 0, 2, 6.25, 75, 12.5, 0, 0, 6.25, 32, NULL, 100, 68.75, 'Grade three', 'Fair', '22-11-2019 03:13:26 pm', 'active', 'gorvenment'),
(282, 'Mugarura Keneth', 'Lypa International', 'Kashare', '2017', 43, 27, 0, 0, 1, 0, 60.56, 38, 0, 0, 1.41, 0, 71, NULL, 100, 89.08, 'Grade three', 'Good with Ungraded', '22-11-2019 03:14:33 pm', 'active', 'private'),
(283, 'Boroba James', 'Rwobugoigo', 'Kashare', '2017', 0, 10, 4, 1, 1, 0, 0, 63, 25, 6.25, 6.25, 0, 16, NULL, 100, 60.94, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:14:31 pm', 'active', 'gorvenment'),
(284, 'Abaasa Agnes', 'Rubindi Parents', 'Kashare', '2017', 38, 31, 6, 0, 1, 0, 50, 41, 7.89, 0, 1.32, 0, 76, NULL, 100, 84.54, 'Grade three', 'Good with Ungraded', '22-11-2019 03:15:47 pm', 'active', 'private'),
(285, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2018', 11, 64, 6, 0, 0, 0, 13.58, 79, 7.41, 0, 0, 0, 81, NULL, 100, 76.54, 'Grade two', 'Good', '22-11-2019 03:15:12 pm', 'active', 'gorvenment'),
(286, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2018', 0, 33, 5, 2, 0, 0, 0, 83, 12.5, 5, 0, 0, 40, NULL, 100, 69.38, 'Grade three', 'Fair', '22-11-2019 03:25:45 pm', 'active', 'gorvenment'),
(287, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2018', 5, 27, 18, 5, 4, 3, 8.06, 44, 29.03, 8.06, 6.45, 4.84, 62, NULL, 99.99, 57.25, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:21:43 pm', 'active', 'gorvenment'),
(288, 'Muhumuza Jotham', 'Mishenyi', 'Rwanyamahembe', '2018', 8, 23, 2, 6, 6, 0, 17.78, 51, 4.44, 13.33, 13.33, 0, 45, NULL, 99.99, 61.67, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:26:19 pm', 'active', 'gorvenment'),
(289, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2018', 0, 13, 6, 6, 1, 1, 0, 48, 22.22, 22.22, 3.7, 3.7, 27, NULL, 99.99, 52.78, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:26:22 pm', 'active', 'gorvenment'),
(290, 'Akandwanaho Ezekiel', 'Mabira Parents School', 'Rwanyamahembe', '2018', 20, 8, 2, 0, 0, 0, 66.67, 27, 6.67, 0, 0, 0, 30, NULL, 100.01, 90.01, 'Grade two', 'Good', '22-11-2019 03:27:01 pm', 'active', 'private'),
(291, 'Twesigye Enid', 'Nyampikye', 'Rwanyamahembe', '2018', 15, 23, 1, 0, 0, 1, 37.5, 58, 2.5, 0, 0, 2.5, 40, NULL, 100, 81.88, 'Grade two', 'Good', '22-11-2019 03:27:39 pm', 'active', 'gorvenment'),
(292, 'Atiisa Milton', 'Rutooma Intergrated', 'Rwanyamahembe', '2018', 0, 17, 15, 0, 0, 0, 0, 53, 46.88, 0, 0, 0, 32, NULL, 100.01, 63.29, 'Grade three', 'Fair', '22-11-2019 03:28:14 pm', 'active', 'gorvenment'),
(293, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2018', 8, 10, 6, 6, 2, 0, 25, 31, 18.75, 18.75, 6.25, 0, 32, NULL, 100, 62.5, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:27:29 pm', 'active', 'gorvenment'),
(294, 'Mujuni Naboth', 'Rweishamiro', 'Rwanyamahembe', '2018', 4, 20, 0, 0, 0, 0, 16.67, 83, 0, 0, 0, 0, 24, NULL, 100, 79.17, 'Grade two', 'Good', '22-11-2019 03:28:43 pm', 'active', 'gorvenment'),
(295, 'Kansiime Anold', 'Wagawaga', 'Rwanyamahembe', '2018', 26, 1, 0, 0, 0, 0, 96.3, 4, 0, 0, 0, 0, 27, NULL, 100, 99.08, 'Grade one', 'Excellent', '22-11-2019 03:29:03 pm', 'active', 'private'),
(296, 'Basiima Obeb', 'Muko I', 'Rwanyamahembe', '2018', 2, 38, 10, 0, 0, 0, 4, 76, 20, 0, 0, 0, 50, NULL, 100, 71, 'Grade three', 'Fair', '22-11-2019 03:28:45 pm', 'active', 'gorvenment'),
(297, 'Muraarira Kandiho Sam', 'Nyakayojo II', 'Rwanyamahembe', '2018', 0, 13, 9, 0, 0, 0, 0, 59, 40.91, 0, 0, 0, 22, NULL, 100, 64.77, 'Grade three', 'Fair', '22-11-2019 03:30:04 pm', 'active', 'gorvenment'),
(298, 'Katugwensi Flora Barigye', 'Runengo', 'Rwanyamahembe', '2018', 1, 19, 5, 2, 0, 0, 3.7, 70, 18.52, 7.41, 0, 0, 27, NULL, 100, 67.59, 'Grade three', 'Fair', '22-11-2019 03:31:00 pm', 'active', 'gorvenment'),
(299, 'Ngabirano Jones', 'Rutooma Modern', 'Rwanyamahembe', '2018', 2, 22, 1, 0, 0, 0, 8, 88, 4, 0, 0, 0, 25, NULL, 100, 76, 'Grade two', 'Good', '22-11-2019 03:32:25 pm', 'active', 'gorvenment'),
(300, 'muhumuza Richard', 'Rwentojo', 'Rwanyamahembe', '2018', 5, 32, 8, 5, 1, 0, 9.8, 63, 15.69, 9.8, 1.96, 0, 51, NULL, 100, 67.16, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:33:18 pm', 'active', 'gorvenment'),
(301, 'Muhairwe Milton Twaza', 'Buyenje', 'Rubindi', '2018', 0, 21, 0, 0, 0, 1, 0, 95, 0, 0, 0, 4.55, 22, NULL, 100, 71.59, 'Grade three', 'Fair', '22-11-2019 03:29:29 pm', 'active', 'gorvenment'),
(302, 'bekyinga Asaph', 'Akarungu', 'Rubindi', '2018', 10, 17, 6, 2, 0, 1, 27.78, 47, 16.67, 5.56, 0, 2.78, 36, NULL, 100.01, 72.92, 'Grade three', 'Fair', '22-11-2019 03:34:41 pm', 'active', 'gorvenment'),
(303, 'Ssali Abdul Kariim', 'Kariro Muslim', 'Rubindi', '2018', 1, 5, 8, 2, 0, 2, 5.56, 28, 44.44, 11.11, 0, 11.11, 18, NULL, 100, 51.39, 'Grade three', 'Fair', '22-11-2019 03:37:25 pm', 'active', 'gorvenment'),
(304, 'Lwanga Narcis', 'Kyakataara', 'Rubindi', '2018', 0, 18, 10, 1, 0, 1, 0, 60, 33.33, 3.33, 0, 3.33, 30, NULL, 99.99, 62.5, 'Grade three', 'Fair', '22-11-2019 03:37:57 pm', 'active', 'gorvenment'),
(305, 'Barigye Cyprus', 'kaihiro', 'Rubindi', '2018', 2, 25, 4, 3, 0, 2, 5.56, 69, 11.11, 8.33, 0, 5.56, 36, NULL, 100, 65.28, 'Grade three', 'Fair', '22-11-2019 03:37:30 pm', 'active', 'gorvenment'),
(306, 'Mugarura Robert', 'Rubindi Boys', 'Rubindi', '2018', 12, 32, 2, 1, 0, 0, 25.53, 68, 4.26, 2.13, 0, 0, 47, NULL, 100.01, 79.26, 'Grade two', 'Good', '22-11-2019 03:38:36 pm', 'active', 'gorvenment'),
(307, 'Kiiza Dominic', 'Rukanja', 'Rubindi', '2018', 24, 29, 5, 2, 0, 1, 39.34, 48, 8.2, 3.28, 0, 1.64, 61, NULL, 100, 79.92, 'Grade two', 'Good', '22-11-2019 03:39:14 pm', 'active', 'gorvenment'),
(308, 'Asiimwe Specius', 'Karuhitsi', 'Rubindi', '2018', 1, 23, 1, 0, 0, 0, 4, 92, 4, 0, 0, 0, 25, NULL, 100, 75, 'Grade two', 'Good', '22-11-2019 03:38:59 pm', 'active', 'gorvenment'),
(309, 'Bekunda George William', 'Rwembirizi', 'Rubindi', '2018', 0, 21, 9, 3, 0, 0, 0, 64, 27.27, 9.09, 0, 0, 33, NULL, 100, 63.64, 'Grade three', 'Fair', '22-11-2019 03:39:54 pm', 'active', 'gorvenment'),
(310, 'Magezi Patrick', 'Hopebel', 'Rubindi', '2018', 33, 5, 0, 0, 0, 0, 86.84, 13, 0, 0, 0, 0, 38, NULL, 100, 96.71, 'Grade two', 'Good', '22-11-2019 03:40:41 pm', 'active', 'private'),
(311, 'Bwomi Joshua Agaba', 'Nyamiriro', 'Rubindi', '2018', 5, 17, 5, 2, 1, 0, 16.67, 57, 16.67, 6.67, 3.33, 0, 30, NULL, 100.01, 69.18, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:40:09 pm', 'active', 'gorvenment'),
(312, 'Amos Ashaba', 'St.Josephs Model', 'Rubindi', '2018', 69, 1, 0, 0, 0, 0, 98.57, 1, 0, 0, 0, 0, 70, NULL, 100, 99.64, 'Grade one', 'Excellent', '22-11-2019 03:41:03 pm', 'active', 'private'),
(313, 'Mwebesa Deo', 'Rubindi Girls', 'Rubindi', '2018', 13, 29, 2, 0, 0, 0, 29.55, 66, 4.55, 0, 0, 0, 44, NULL, 100.01, 81.26, 'Grade two', 'Good', '22-11-2019 03:41:11 pm', 'active', 'gorvenment'),
(314, 'Bamwesigye Asaph', 'Rubindi Preparatory', 'Rubindi', '2018', 26, 4, 0, 0, 0, 0, 86.67, 13, 0, 0, 0, 0, 30, NULL, 100, 96.67, 'Grade two', 'Good', '22-11-2019 03:41:39 pm', 'active', 'private'),
(315, 'Mugerwa Prima', 'Rwamuhigi', 'Rubindi', '2018', 0, 4, 7, 3, 0, 2, 0, 25, 43.75, 18.75, 0, 12.5, 16, NULL, 100, 45.31, 'Grade four', 'Poor', '22-11-2019 03:42:07 pm', 'active', 'gorvenment'),
(316, 'Kiconco Betty', 'Katooma II', 'Bubaare', '2018', 0, 8, 11, 1, 1, 0, 0, 38, 52.38, 4.76, 4.76, 0, 21, NULL, 100, 55.96, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:42:40 pm', 'active', 'gorvenment'),
(317, 'Asiimwe Patrick', 'Kashaka', 'Bubaare', '2018', 1, 12, 7, 1, 2, 0, 4.35, 52, 30.43, 4.35, 8.7, 0, 23, NULL, 100, 59.78, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:43:21 pm', 'active', 'gorvenment'),
(318, 'Mugume Wilson', 'Komuyaga', 'Bubaare', '2018', 0, 9, 6, 9, 2, 0, 0, 35, 23.08, 34.62, 7.69, 0, 26, NULL, 100.01, 46.16, 'Ungraded', 'Poor with Ungraded', '22-11-2019 03:46:00 pm', 'active', 'gorvenment'),
(319, 'Byarugaba Vicent Mukwate', 'Katsikizi', 'Bubaare', '2018', 0, 7, 7, 3, 0, 1, 0, 39, 38.89, 16.67, 0, 5.56, 18, NULL, 100.01, 52.78, 'Grade three', 'Fair', '22-11-2019 03:46:14 pm', 'active', 'gorvenment'),
(320, 'Ainomugisha Costance', 'Mukora', 'Bubaare', '2018', 1, 10, 7, 1, 0, 0, 5.26, 53, 36.84, 5.26, 0, 0, 19, NULL, 99.99, 64.47, 'Grade three', 'Fair', '22-11-2019 03:47:13 pm', 'active', 'gorvenment'),
(321, 'Kwesiga Erastus', 'Mugarutsa', 'Bubaare', '2018', 35, 99, 8, 0, 0, 1, 24.48, 69, 5.59, 0, 0, 0.7, 143, NULL, 100, 79.2, 'Grade two', 'Good', '22-11-2019 03:47:17 pm', 'active', 'gorvenment'),
(322, 'Twinamatsiko Yoab Magara', 'Rubaare', 'Bubaare', '2018', 4, 20, 10, 11, 1, 0, 8.7, 43, 21.74, 23.91, 2.17, 0, 46, NULL, 100, 58.16, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:47:39 pm', 'active', 'gorvenment'),
(323, 'Bamuhimbise Wilson', 'Nshozi', 'Bubaare', '2018', 0, 12, 3, 1, 0, 0, 0, 75, 18.75, 6.25, 0, 0, 16, NULL, 100, 67.19, 'Grade three', 'Fair', '22-11-2019 03:48:22 pm', 'active', 'gorvenment'),
(324, 'Nankunda Richard', 'Rwentaga', 'Bubaare', '2018', 1, 31, 10, 4, 0, 2, 2.08, 65, 20.83, 8.33, 0, 4.17, 48, NULL, 99.99, 63.01, 'Grade three', 'Fair', '22-11-2019 03:49:13 pm', 'active', 'gorvenment'),
(325, 'Kobuyonjo Juliet', 'Rugarama II', 'Bubaare', '2018', 4, 25, 5, 0, 0, 1, 11.43, 71, 14.29, 0, 0, 2.86, 35, NULL, 100.01, 72.15, 'Grade three', 'Fair', '22-11-2019 03:49:16 pm', 'active', 'gorvenment'),
(326, 'Anita Ainembabazi', 'St. Anita Memorial', 'Bubaare', '2018', 13, 11, 1, 0, 0, 0, 52, 44, 4, 0, 0, 0, 25, NULL, 100, 87, 'Grade two', 'Good', '22-11-2019 03:50:12 pm', 'active', 'private'),
(327, 'Kamuhangire Elias', 'Bunenero', 'Rubaya', '2018', 1, 27, 3, 0, 0, 0, 3.23, 87, 9.68, 0, 0, 0, 31, NULL, 100.01, 73.4, 'Grade three', 'Fair', '22-11-2019 03:50:48 pm', 'active', 'gorvenment'),
(328, 'Muhwezi DEO', 'St. Simon Kooga', 'Bubaare', '2018', 2, 23, 3, 1, 0, 0, 6.9, 79, 10.34, 3.45, 0, 0, 29, NULL, 100, 72.42, 'Grade three', 'Fair', '22-11-2019 03:50:36 pm', 'active', 'gorvenment'),
(329, 'Dissi Livingston', 'Itara', 'Rubaya', '2018', 0, 9, 15, 0, 0, 1, 0, 36, 60, 0, 0, 4, 25, NULL, 100, 57, 'Grade three', 'Fair', '22-11-2019 03:51:18 pm', 'active', 'gorvenment'),
(330, 'Atukunda Agnes', 'Esteeri Kokundeka Memorial', 'Rubaya', '2018', 0, 19, 2, 1, 0, 0, 0, 86, 9.09, 4.55, 0, 0, 22, NULL, 100, 70.45, 'Grade three', 'Fair', '22-11-2019 03:51:56 pm', 'active', 'gorvenment'),
(331, 'Kamugisha Elia', 'Coloma', 'Bubaare', '2018', 13, 23, 1, 0, 0, 1, 34.21, 61, 2.63, 0, 0, 2.63, 38, NULL, 100, 80.92, 'Grade two', 'Good', '22-11-2019 03:51:37 pm', 'active', 'private'),
(332, 'Kasigaire Benon', 'Kyamatambarire', 'Rubaya', '2018', 13, 41, 0, 0, 0, 0, 24.07, 76, 0, 0, 0, 0, 54, NULL, 100, 81.02, 'Grade two', 'Good', '22-11-2019 03:52:36 pm', 'active', 'gorvenment'),
(333, 'Mutabazi Edson', 'Kaguhanzya', 'Rubaya', '2018', 13, 41, 0, 0, 0, 0, 24.07, 76, 0, 0, 0, 0, 54, NULL, 100, 81.02, 'Grade two', 'Good', '22-11-2019 03:52:37 pm', 'active', 'gorvenment'),
(334, 'Bitekyerezo Julius', 'Rubaya', 'Rubaya', '2018', 0, 10, 9, 4, 0, 1, 0, 42, 37.5, 16.67, 0, 4.17, 24, NULL, 100.01, 54.17, 'Grade three', 'Fair', '22-11-2019 03:53:21 pm', 'active', 'gorvenment'),
(335, 'Mwebaze Methodius', 'Omukigando', 'Rubaya', '2018', 0, 1, 8, 4, 1, 1, 0, 7, 53.33, 26.67, 6.67, 6.67, 15, NULL, 100.01, 38.34, 'Ungraded', 'Poor with Ungraded', '22-11-2019 03:53:44 pm', 'active', 'gorvenment'),
(336, 'Nuwagira Robert', 'Ruhunga', 'Rubaya', '2018', 0, 7, 11, 5, 1, 0, 0, 29, 45.83, 20.83, 4.17, 0, 24, NULL, 100, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:54:20 pm', 'active', 'gorvenment'),
(337, 'Karuhanga Piason', 'Rwantsinga', 'Rubaya', '2018', 1, 25, 15, 9, 3, 2, 1.82, 45, 27.27, 16.36, 5.45, 3.64, 55, NULL, 99.99, 53.63, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:54:51 pm', 'active', 'gorvenment'),
(338, 'Bainomukama Gerald', 'Ruburara', 'Rubaya', '2018', 0, 20, 6, 3, 1, 0, 0, 67, 20, 10, 3.33, 0, 30, NULL, 100, 62.5, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:54:44 pm', 'active', 'gorvenment'),
(339, 'Kyoshaba Justine', 'Akashanda', 'Bukiro', '2018', 2, 27, 2, 1, 0, 0, 6.25, 84, 6.25, 3.13, 0, 0, 32, NULL, 100.01, 73.44, 'Grade three', 'Fair', '22-11-2019 03:55:29 pm', 'active', 'gorvenment'),
(340, 'Kabigumira Vencious', 'Kibaare 1', 'Bukiro', '2018', 0, 7, 7, 3, 0, 1, 0, 39, 38.89, 16.67, 0, 5.56, 18, NULL, 100.01, 52.78, 'Grade three', 'Fair', '22-11-2019 03:56:10 pm', 'active', 'gorvenment'),
(341, 'Kokunda Lydia', 'Rushozi', 'Rubaya', '2018', 0, 28, 12, 4, 0, 0, 0, 64, 27.27, 9.09, 0, 0, 44, NULL, 100, 63.64, 'Grade three', 'Fair', '22-11-2019 03:55:49 pm', 'active', 'gorvenment'),
(342, 'Modern h/t', 'Kahoma Modern', 'Rubaya', '2018', 4, 19, 4, 0, 0, 0, 14.81, 70, 14.81, 0, 0, 0, 27, NULL, 99.99, 74.99, 'Grade three', 'Fair', '22-11-2019 03:56:38 pm', 'active', 'private'),
(343, 'Mugume Jonas', 'Nyantungu', 'Bukiro', '2018', 9, 32, 0, 0, 0, 0, 21.95, 78, 0, 0, 0, 0, 41, NULL, 100, 80.49, 'Grade two', 'Good', '22-11-2019 03:57:15 pm', 'active', 'gorvenment'),
(344, 'Rwakaningi Denis', 'Rubingo I', 'Bukiro', '2018', 4, 44, 1, 0, 0, 2, 7.84, 86, 1.96, 0, 0, 3.92, 51, NULL, 99.99, 73.52, 'Grade three', 'Fair', '22-11-2019 03:58:16 pm', 'active', 'gorvenment'),
(345, 'Mbakiza Joseph', 'Rwengwe 1', 'Bukiro', '2018', 3, 44, 7, 4, 2, 2, 4.84, 71, 11.29, 6.45, 3.23, 3.23, 62, NULL, 100.01, 65.33, 'Grade four', 'Fair with Ungraded', '22-11-2019 03:59:08 pm', 'active', 'gorvenment'),
(346, 'Boona Mpumwire Edith', 'Kagongi I', 'Kagongi', '2018', 1, 33, 2, 2, 0, 2, 2.5, 83, 5, 5, 0, 5, 40, NULL, 100, 68.13, 'Grade three', 'Fair', '22-11-2019 04:00:13 pm', 'active', 'gorvenment'),
(347, 'Kamugisha Julius', 'Kibingo 111', 'Kagongi', '2018', 0, 6, 11, 2, 0, 0, 0, 32, 57.89, 10.53, 0, 0, 19, NULL, 100, 55.26, 'Grade three', 'Fair', '22-11-2019 04:06:09 pm', 'active', 'gorvenment'),
(348, 'Nuwagaba Crescent', 'Munyonyi Mixed', 'Kagongi', '2018', 0, 7, 6, 4, 0, 0, 0, 41, 35.29, 23.53, 0, 0, 17, NULL, 100, 54.41, 'Grade three', 'Fair', '22-11-2019 04:06:37 pm', 'active', 'gorvenment'),
(349, 'Rutafa James', 'Nyakabwera', 'Kagongi', '2018', 24, 24, 16, 8, 2, 3, 31.17, 31, 20.78, 10.39, 2.6, 3.9, 77, NULL, 100.01, 67.54, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:07:05 pm', 'active', 'gorvenment'),
(350, 'Bainomugisha Alex', 'omukagyera', 'Kagongi', '2018', 4, 19, 5, 4, 1, 0, 12.12, 58, 15.15, 12.12, 3.03, 0, 33, NULL, 100, 65.91, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:08:12 pm', 'active', 'gorvenment'),
(351, 'Tumubwine Patrick', 'Nyaminyobwa', 'Kagongi', '2018', 0, 3, 5, 4, 2, 1, 0, 20, 33.33, 26.67, 13.33, 6.67, 15, NULL, 100, 38.33, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:08:48 pm', 'active', 'gorvenment'),
(352, 'Mugume Ihinduza Abel', 'Nsiika', 'Kagongi', '2018', 4, 25, 9, 4, 1, 0, 9.3, 58, 20.93, 9.3, 2.33, 0, 43, NULL, 100, 65.7, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:09:34 pm', 'active', 'gorvenment'),
(353, 'Kamayangi Angela', 'Kyarushanje', 'Kagongi', '2018', 7, 35, 3, 4, 0, 0, 14.29, 71, 6.12, 8.16, 0, 0, 49, NULL, 100, 72.96, 'Grade three', 'Fair', '22-11-2019 04:10:30 pm', 'active', 'gorvenment'),
(354, 'Abesiga Vivian', 'Kitengure', 'Bukiro', '2018', 2, 27, 6, 1, 0, 0, 5.56, 75, 16.67, 2.78, 0, 0, 36, NULL, 100.01, 70.84, 'Grade three', 'Fair', '22-11-2019 03:57:14 pm', 'active', 'gorvenment'),
(355, 'Tumushabe Betyce', 'Katagyengyera', 'Kagongi', '2018', 1, 10, 9, 3, 5, 1, 3.45, 34, 31.03, 10.34, 17.24, 3.45, 29, NULL, 99.99, 47.41, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:11:50 pm', 'active', 'gorvenment'),
(356, 'Tukahirwa Jovia', 'Nyarubungo', 'Bukiro', '2018', 1, 20, 10, 7, 0, 1, 2.56, 51, 25.64, 17.95, 0, 2.56, 39, NULL, 99.99, 58.33, 'Grade three', 'Fair', '22-11-2019 04:12:05 pm', 'active', 'gorvenment'),
(357, 'Nyabwangu Jolly', 'Bwengure', 'Kagongi', '2018', 0, 23, 1, 2, 0, 0, 0, 88, 3.85, 7.69, 0, 0, 26, NULL, 100, 70.19, 'Grade three', 'Fair', '22-11-2019 04:13:07 pm', 'active', 'gorvenment'),
(358, 'Ahumuza Ruth', 'Rubingo-Nyanja', 'Bukiro', '2018', 0, 4, 5, 5, 1, 0, 0, 27, 33.33, 33.33, 6.67, 0, 15, NULL, 100, 45, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:13:10 pm', 'active', 'gorvenment'),
(359, 'Mwijuka Deuth', 'Rweshe', 'Kagongi', '2018', 2, 25, 5, 1, 0, 0, 6.06, 76, 15.15, 3.03, 0, 0, 33, NULL, 100, 71.21, 'Grade three', 'Fair', '22-11-2019 04:13:33 pm', 'active', 'gorvenment'),
(360, 'Kamuntu Joseph', 'Moonlight', 'Kagongi', '2018', 20, 10, 0, 0, 0, 0, 66.67, 33, 0, 0, 0, 0, 30, NULL, 100, 91.67, 'Grade two', 'Good', '22-11-2019 04:14:17 pm', 'active', 'private'),
(361, 'Mworozi Adrine', 'Rwamanuma', 'Kagongi', '2018', 0, 4, 9, 3, 1, 1, 0, 22, 50, 16.67, 5.56, 5.56, 18, NULL, 100.01, 45.83, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:16:07 pm', 'active', 'gorvenment'),
(362, 'Amutuhaire Grace', 'Ant Betty Ruhumba', 'Rubindi', '2018', 0, 9, 4, 7, 0, 0, 0, 45, 20, 35, 0, 0, 20, NULL, 100, 52.5, 'Grade three', 'Fair', '22-11-2019 04:16:15 pm', 'active', 'private'),
(363, 'Muhereza Vicent', 'Akabaare', 'Kashare', '2018', 0, 18, 8, 3, 0, 0, 0, 62, 27.59, 10.34, 0, 0, 29, NULL, 100, 62.93, 'Grade three', 'Fair', '22-11-2019 04:16:56 pm', 'active', 'gorvenment'),
(364, 'Mutungi Deus', 'Kyenshama', 'Kashare', '2018', 15, 20, 7, 3, 1, 2, 31.25, 42, 14.58, 6.25, 2.08, 4.17, 48, NULL, 100, 71.36, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:17:26 pm', 'active', 'gorvenment'),
(365, 'Muhumsa Ephraim', 'Rweshe Pentecost', 'Kagongi', '2018', 0, 5, 4, 5, 1, 0, 0, 33, 26.67, 33.33, 6.67, 0, 15, NULL, 100, 46.67, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:17:15 pm', 'active', 'private'),
(366, 'Nankunda Zephrine', 'Nchune', 'Kashare', '2018', 0, 12, 4, 7, 0, 1, 0, 50, 16.67, 29.17, 0, 4.17, 24, NULL, 100.01, 53.13, 'Grade three', 'Fair', '22-11-2019 04:18:00 pm', 'active', 'gorvenment'),
(367, 'Asiimwe Herbert', 'Amabaare', 'Kashare', '2018', 0, 3, 7, 6, 6, 1, 0, 13, 30.43, 26.09, 26.09, 4.35, 23, NULL, 100, 31.52, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:18:18 pm', 'active', 'gorvenment'),
(368, 'Kaduya Halima', 'Nyamirima Moslem', 'Kashare', '2018', 0, 13, 14, 4, 0, 0, 0, 42, 45.16, 12.9, 0, 0, 31, NULL, 100, 57.26, 'Grade three', 'Fair', '22-11-2019 04:18:38 pm', 'active', 'gorvenment'),
(369, 'kiconco Enid', 'Mirongo Central school', 'Kashare', '2018', 0, 27, 16, 1, 0, 0, 0, 61, 36.36, 2.27, 0, 0, 44, NULL, 99.99, 64.77, 'Grade three', 'Fair', '22-11-2019 04:18:59 pm', 'active', 'gorvenment'),
(370, 'Mugabo Dickson', 'Nombe', 'Kashare', '2018', 9, 46, 1, 0, 0, 0, 16.07, 82, 1.79, 0, 0, 0, 56, NULL, 100, 78.57, 'Grade two', 'Good', '22-11-2019 04:19:53 pm', 'active', 'gorvenment'),
(371, 'Kekihembo Naome', 'Rugarura', 'Kashare', '2018', 0, 12, 16, 4, 2, 1, 0, 34, 45.71, 11.43, 5.71, 2.86, 35, NULL, 100, 51.43, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:19:18 pm', 'active', 'gorvenment'),
(372, 'Musinguzi Gidion', 'Rweibaare 1', 'Kashare', '2018', 3, 13, 2, 0, 0, 0, 16.67, 72, 11.11, 0, 0, 0, 18, NULL, 100, 76.39, 'Grade two', 'Good', '22-11-2019 04:20:36 pm', 'active', 'gorvenment'),
(373, 'Mpongano Elly', 'omukabaare', 'Kashare', '2018', 2, 21, 14, 6, 1, 0, 4.55, 48, 31.82, 13.64, 2.27, 0, 44, NULL, 100.01, 59.67, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:20:31 pm', 'active', 'gorvenment'),
(374, 'Boroba James', 'Rwobugoigo', 'Kashare', '2018', 1, 10, 12, 5, 0, 0, 3.57, 36, 42.86, 17.86, 0, 0, 28, NULL, 100, 56.25, 'Grade three', 'Fair', '22-11-2019 04:21:22 pm', 'active', 'gorvenment'),
(375, 'Nuwagaba Apollo', 'Rwamukondo', 'Kashare', '2018', 16, 36, 3, 0, 0, 1, 28.57, 64, 5.36, 0, 0, 1.79, 56, NULL, 100.01, 79.47, 'Grade two', 'Good', '22-11-2019 04:21:37 pm', 'active', 'gorvenment'),
(376, 'Abaasa Agnes', 'Rubindi Parents', 'Kashare', '2018', 30, 19, 3, 2, 0, 0, 55.56, 35, 5.56, 3.7, 0, 0, 54, NULL, 100.01, 85.66, 'Grade two', 'Good', '22-11-2019 04:21:59 pm', 'active', 'private'),
(377, 'Mugarura Keneth', 'Lypa International', 'Kashare', '2018', 55, 11, 0, 0, 0, 0, 83.33, 17, 0, 0, 0, 0, 66, NULL, 100, 95.83, 'Grade two', 'Good', '22-11-2019 04:22:52 pm', 'active', 'private'),
(378, 'Atusiime Jane', 'Rweibare 11', 'Kashare', '2018', 14, 53, 1, 0, 0, 1, 20.29, 77, 1.45, 0, 0, 1.45, 69, NULL, 100, 78.62, 'Grade two', 'Good', '22-11-2019 04:22:32 pm', 'active', 'gorvenment'),
(379, 'Namurebire Julius', 'Kitongore 11', 'Kashare', '2018', 0, 7, 7, 1, 0, 1, 0, 44, 43.75, 6.25, 0, 6.25, 16, NULL, 100, 56.25, 'Grade three', 'Fair', '22-11-2019 04:23:14 pm', 'active', 'gorvenment'),
(380, 'Namara Jane', 'St. Marys Rweibaare', 'Kashare', '2018', 0, 15, 7, 5, 0, 1, 0, 54, 25, 17.86, 0, 3.57, 28, NULL, 100, 57.14, 'Grade three', 'Fair', '22-11-2019 04:23:22 pm', 'active', 'gorvenment'),
(382, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2019', 11, 36, 3, 2, 1, 3, 20.75, 67.92, 5.66, 3.77, 1.89, 5.66, 56, '53', 105.65, 75.46, 'Grade three', 'Good with Ungraded', '21-01-2020 09:46:28 am', 'active', 'government'),
(384, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2019', 21, 45, 2, 0, 0, 0, 30.88, 66.18, 2.94, 0, 0, 0, 68, '68', 100, 81.99, 'Grade two', 'Good', '21-01-2020 02:21:51 pm', 'active', 'government'),
(385, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2019', 2, 31, 13, 1, 2, 0, 4.08, 63.27, 26.53, 2.04, 4.08, 0, 49, '49', 100, 65.31, 'Grade four', 'Fair with Ungraded', '21-01-2020 02:22:35 pm', 'active', 'government'),
(386, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2019', 3, 22, 2, 1, 0, 1, 10.71, 78.57, 7.14, 3.57, 0, 3.57, 29, '28', 103.56, 74.1, 'Grade three', 'Fair', '21-01-2020 02:24:17 pm', 'active', 'government'),
(387, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2019', 5, 26, 2, 2, 0, 0, 14.29, 74.29, 5.71, 5.71, 0, 0, 35, '35', 100, 74.29, 'Grade three', 'Fair', '21-01-2020 02:25:11 pm', 'active', 'government');

-- --------------------------------------------------------

--
-- Table structure for table `hteacher_sch_transfers`
--

CREATE TABLE `hteacher_sch_transfers` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `old_teacher_name` varchar(50) NOT NULL,
  `new_teacher_name` varchar(50) NOT NULL,
  `years_served` varchar(50) NOT NULL,
  `sch_no` varchar(25) NOT NULL,
  `old_h_id` varchar(25) NOT NULL,
  `new_h_id` varchar(25) NOT NULL,
  `transfer_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hteacher_sch_transfers`
--

INSERT INTO `hteacher_sch_transfers` (`id`, `school_name`, `old_teacher_name`, `new_teacher_name`, `years_served`, `sch_no`, `old_h_id`, `new_h_id`, `transfer_date`, `status`) VALUES
(5, 'Ruhunga Primary School', 'Nuwagira Robert', 'Tushabe Ronald', '2018', 'Sch_0017', '102011', '102009', '2019-11-11 18:36:56', 'active'),
(6, 'Ruhunga Primary School', 'Tushabe Ronald', 'Dissi Livingston', '2019', 'Sch_0017', '102009', '102013', '2019-11-11 18:39:11', 'active'),
(7, 'Itara Primary school', 'Nuwagira Robert', 'Dissi Livingston', '2016,2017,2018', 'Sch_0023', '102011', '102013', '2019-11-12 00:22:50', 'active'),
(8, 'Bwizibwera Preparatory School', 'Atukunda Agnes', 'Kamuhangire Elias', '2016', 'Sch_0048', '102016', '102017', '2019-11-12 00:24:43', 'active'),
(9, 'Rubaya Primary School', 'Kasigaire Benon', 'Dissi Livingston', '2015', 'Sch_0029', '102012', '102013', '2019-11-12 17:08:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `left_sch_records`
--

CREATE TABLE `left_sch_records` (
  `id` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `sch_no` varchar(25) NOT NULL,
  `h_id` varchar(25) NOT NULL,
  `years_served` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `left_sch_records`
--

INSERT INTO `left_sch_records` (`id`, `school_name`, `teacher_name`, `sch_no`, `h_id`, `years_served`, `date`, `status`) VALUES
(1, '', 'Tushabe Ronald', '', '102009', '', '2019-11-11 18:36:56', 'active'),
(2, 'Itara Primary school', 'Dissi Livingston', 'Sch_0023', '102013', '2014,2015,2016,2017,', '2019-11-11 18:39:11', 'active'),
(3, 'Ruhunga Primary School', 'Dissi Livingston', 'Sch_0017', '102013', '2019', '2019-11-12 00:22:50', 'active'),
(4, 'Kaguhanzya Primary School', 'Kamuhangire Elias', 'Sch_0033', '102017', '2017', '2019-11-12 00:24:44', 'active'),
(5, 'Itara Primary school', 'Dissi Livingston', 'Sch_0023', '102013', '2018', '2019-11-12 17:08:41', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `primary_five`
--

CREATE TABLE `primary_five` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `sch_no` varchar(20) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL DEFAULT 'P5',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_five`
--

INSERT INTO `primary_five` (`id`, `student_name`, `school_name`, `std_no`, `sch_no`, `date_of_birth`, `home_address`, `district`, `gender`, `year`, `class`, `status`, `reg_date`) VALUES
(40201, 'Amanya Ivan', 'Itara Primary school', '40201', 'Sch_0023', '2004-06-08', 'Muko,Rwebishekye', 'Mbarara', 'Male', '2019', 'P5', 'active', '2019-11-12 16:51:31'),
(40202, 'Ronard Tushabe', 'Itara Primary school', '40202', 'Sch_0023', '2007-11-05', 'Muyenga', 'Mbarara', 'Male', '2019', 'P5', 'active', '2019-11-12 17:48:00'),
(40203, 'Justin Nalugo', 'Muko primary school', '40203', 'Sch_0021', '10/04/1994', 'Kakyeka', 'Mbarara', 'Female', '2019', 'P5', 'active', '2019-11-14 01:02:38'),
(40204, 'Akankwasa Anna', 'Muko primary school', '40204', 'Sch_0021', '07/22/1999', 'kitagwenda', 'Mbarara', 'Female', '2019', 'P5', 'active', '2019-11-14 01:08:51'),
(40205, 'Agaba mark', 'Itara Primary school', '40205', 'Sch_0023', '10/06/2009', 'Muko,Rwebishekye', 'Mbarara', 'Male', '2019', 'P5', 'active', '2019-11-14 02:00:08'),
(40206, 'Abaho Alex', 'Muko primary school', '40206', 'Sch_0021', '06/28/2019', 'kitagwenda', 'Mbarara', 'Male', '2019', 'P5', 'active', '2019-11-14 14:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `primary_five_results`
--

CREATE TABLE `primary_five_results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `std_no` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `english_g` varchar(25) NOT NULL,
  `math_g` varchar(25) NOT NULL,
  `science_g` varchar(25) NOT NULL,
  `sst_g` varchar(25) NOT NULL,
  `aggregates` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reporting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_five_results`
--

INSERT INTO `primary_five_results` (`id`, `student_name`, `school_name`, `std_no`, `year`, `english_g`, `math_g`, `science_g`, `sst_g`, `aggregates`, `grade`, `remarks`, `reporting_date`, `status`) VALUES
(1, 'Ronard Tushabe', 'Muza Central Primary Scho', '50201', '2019', 'D2', 'D2', 'D2', 'D2', '8', 'one', 'Excellent', '2019-11-14 04:19:12', 'active'),
(2, 'Tushabe Ronald', 'Bwizibwera Town School', '50202', '2019', 'D1', 'D1', 'D2', 'D1', '5', 'one', 'Excellent', '2019-11-14 14:27:50', 'active'),
(3, 'Abaho Christine', 'Muko primary school', '50205', '2019', 'D1', 'C3', 'D2', 'D2', '8', 'one', 'Excellent', '2019-11-17 20:21:12', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `primary_four`
--

CREATE TABLE `primary_four` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `sch_no` varchar(20) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL DEFAULT 'P4',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `primary_four_results`
--

CREATE TABLE `primary_four_results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `std_no` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `english_g` varchar(25) NOT NULL,
  `math_g` varchar(25) NOT NULL,
  `science_g` varchar(25) NOT NULL,
  `sst_g` varchar(25) NOT NULL,
  `aggregates` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reporting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_four_results`
--

INSERT INTO `primary_four_results` (`id`, `student_name`, `school_name`, `std_no`, `year`, `english_g`, `math_g`, `science_g`, `sst_g`, `aggregates`, `grade`, `remarks`, `reporting_date`, `status`) VALUES
(1, 'Agaba mark', 'Itara Primary school', '40205', '2019', 'D2', 'C6', 'C4', 'C3', '15', 'two', 'Good', '2019-11-14 03:42:57', 'active'),
(2, 'Amanya Ivan', 'Itara Primary school', '40201', '2019', 'D1', 'D1', 'D1', 'D1', '4', 'one', 'Excellent', '2019-11-14 03:52:34', 'active'),
(3, 'Ronard Tushabe', 'Itara Primary school', '40202', '2019', 'C3', 'C6', 'D2', 'F9', '20', 'three', 'Good with F9', '2019-11-14 03:58:39', 'active'),
(4, 'Abaho Alex', 'Muko primary school', '40206', '2019', 'D1', 'D2', 'D2', 'D1', '6', 'one', 'Excellent', '2019-11-14 14:10:14', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `primary_mock_results`
--

CREATE TABLE `primary_mock_results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `std_no` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `english_g` varchar(25) NOT NULL,
  `math_g` varchar(25) NOT NULL,
  `science_g` varchar(25) NOT NULL,
  `sst_g` varchar(25) NOT NULL,
  `aggregates` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reporting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_mock_results`
--

INSERT INTO `primary_mock_results` (`id`, `student_name`, `school_name`, `std_no`, `year`, `english_g`, `math_g`, `science_g`, `sst_g`, `aggregates`, `grade`, `remarks`, `reporting_date`, `status`) VALUES
(1, 'Abasa Allan', 'Bwizibwera Town School', '60204', '2019', 'D2', 'C3', 'C3', 'D2', '10', 'one', 'Excellent', '2019-11-19 13:53:20', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `primary_seven`
--

CREATE TABLE `primary_seven` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `sch_no` varchar(20) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL DEFAULT 'P7',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_seven`
--

INSERT INTO `primary_seven` (`id`, `student_name`, `school_name`, `std_no`, `sch_no`, `date_of_birth`, `home_address`, `district`, `gender`, `year`, `class`, `status`, `reg_date`) VALUES
(60201, 'Agaba mark', 'Ruhunga Primary School', '60201', 'Sch_0017', '2004-10-18', 'Kakoba', 'Mbarara', 'Male', '2019', 'P7', 'active', '2019-11-12 23:57:15'),
(60202, 'Abanitwe Anjella', 'Muko primary school', '60202', 'Sch_0021', '2007-11-06', 'Kisasi', 'Mbarara', 'Female', '2019', 'P7', 'active', '2019-11-17 17:31:52'),
(60203, 'Flavia Katusime', 'Ruhunga Primary School', '60203', 'Sch_0017', '2003-11-10', 'Kakyeka', 'Mbarara', 'Female', '2019', 'P7', 'active', '2019-11-18 09:32:23'),
(60204, 'Abasa Allan', 'Bwizibwera Town School', '60204', 'Sch_0031', '2005-11-15', 'Muyenga, Kampala', 'Mbarara', 'Male', '2019', 'P7', 'active', '2019-11-19 13:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `primary_seven_results`
--

CREATE TABLE `primary_seven_results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `std_no` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `english_g` varchar(25) NOT NULL,
  `math_g` varchar(25) NOT NULL,
  `science_g` varchar(25) NOT NULL,
  `sst_g` varchar(25) NOT NULL,
  `aggregates` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reporting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_seven_results`
--

INSERT INTO `primary_seven_results` (`id`, `student_name`, `school_name`, `std_no`, `year`, `english_g`, `math_g`, `science_g`, `sst_g`, `aggregates`, `grade`, `remarks`, `reporting_date`, `status`) VALUES
(1, 'Junior Ahabwe', 'Bwizibwera Primary School', '70201', '2019', 'D1', 'D2', 'D1', 'D2', '6', 'one', 'Excellent', '2019-11-14 04:35:18', 'active'),
(2, 'Abaho Christine', 'Muko primary school', '70202', '2019', 'D2', 'D1', 'D1', 'D1', '5', 'one', 'Excellent', '2019-11-17 20:24:34', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `primary_seven_temp`
--

CREATE TABLE `primary_seven_temp` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `sch_no` varchar(20) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL DEFAULT 'P7',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_seven_temp`
--

INSERT INTO `primary_seven_temp` (`id`, `student_name`, `school_name`, `std_no`, `sch_no`, `date_of_birth`, `home_address`, `district`, `gender`, `year`, `class`, `status`, `reg_date`) VALUES
(70201, 'Junior Ahabwe', 'Bwizibwera Primary School', '70201', 'Sch_0028', '1999-04-28', 'muko', 'Mbarara', 'Male', '2018', 'P7', 'active', '2019-11-13 01:45:04'),
(70202, 'Abaho Christine', 'Muko primary school', '70202', 'Sch_0021', '2007-05-22', 'Kakyeka', 'Mbarara', 'Female', '2018', 'P7', 'active', '2019-11-17 20:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `primary_six`
--

CREATE TABLE `primary_six` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `std_no` varchar(20) NOT NULL,
  `sch_no` varchar(20) NOT NULL,
  `date_of_birth` varchar(25) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `district` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class` varchar(25) NOT NULL DEFAULT 'P6',
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_six`
--

INSERT INTO `primary_six` (`id`, `student_name`, `school_name`, `std_no`, `sch_no`, `date_of_birth`, `home_address`, `district`, `gender`, `year`, `class`, `status`, `reg_date`) VALUES
(50201, 'Ronard Tushabe', 'Muza Central Primary Scho', '50201', 'Sch_0025', '2002-05-19', 'Kakyeka', 'Mbarara', 'Male', '2019', 'P6', 'active', '2019-11-12 23:56:11'),
(50202, 'Tushabe Ronald', 'Bwizibwera Town School', '50202', 'Sch_0031', '09/23/2019', 'Muyenga, Kampala', 'Mbarara', 'Male', '2019', 'P6', 'active', '2019-11-14 14:27:24'),
(50203, 'Agaba mark', 'Muza Central Primary Scho', '50203', 'Sch_0025', '06/16/2010', 'Muko,Rwebishekye', 'Mbarara', 'Male', '2019', 'P6', 'active', '2019-11-14 15:43:10'),
(50204, 'Ivan Amanya', 'Muko primary school', '50204', 'Sch_0021', '2009-11-18', 'Muyenga, Kampala', 'Mbarara', 'Female', '2019', 'P6', 'active', '2019-11-17 17:29:36'),
(50205, 'Abaho Christine', 'Muko primary school', '50205', 'Sch_0021', '2002-03-04', 'Katata', 'Mbarara', 'Female', '2019', 'P6', 'active', '2019-11-17 20:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `primary_six_results`
--

CREATE TABLE `primary_six_results` (
  `id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `std_no` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `english_g` varchar(25) NOT NULL,
  `math_g` varchar(25) NOT NULL,
  `science_g` varchar(25) NOT NULL,
  `sst_g` varchar(25) NOT NULL,
  `aggregates` varchar(25) NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `reporting_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primary_six_results`
--

INSERT INTO `primary_six_results` (`id`, `student_name`, `school_name`, `std_no`, `year`, `english_g`, `math_g`, `science_g`, `sst_g`, `aggregates`, `grade`, `remarks`, `reporting_date`, `status`) VALUES
(1, 'Agaba mark', 'Ruhunga Primary School', '60201', '2019', 'C3', 'D1', 'P8', 'D2', '14', 'two', 'Good', '2019-11-14 04:30:10', 'active'),
(2, 'Ivan Amanya', 'Muko primary school', '50204', '2019', 'C4', 'C6', 'D2', 'C3', '15', 'two', 'Good', '2019-11-19 14:26:22', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `schools_head`
--

CREATE TABLE `schools_head` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(50) NOT NULL,
  `sch_no` varchar(25) NOT NULL,
  `hteacher_name` varchar(50) NOT NULL,
  `year` varchar(20) NOT NULL,
  `h_id` int(11) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Primary School',
  `graded` varchar(25) NOT NULL DEFAULT 'no',
  `status` varchar(20) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_head`
--

INSERT INTO `schools_head` (`id`, `sch_name`, `sch_no`, `hteacher_name`, `year`, `h_id`, `level`, `graded`, `status`) VALUES
(2, 'Katooma II', 'Sch-525316494', 'Kiconco Betty', '2015,2016,2017,2018,', 102020, 'Primary School', 'no', 'open'),
(3, 'Katsikizi', 'Sch-990561230', 'Byarugaba Vicent Mukwate', '2015,2016,2017,2018,', 102021, 'Primary School', 'no', 'open'),
(4, 'Komuyaga', 'Sch-730890848', 'Mugume Wilson', '2015,2016,2017,2018,', 102023, 'Primary School', 'no', 'open'),
(5, 'Mugarutsa', 'Sch-642926346', 'Kwesiga Erastus', '2015,2016,2017,2018,', 102025, 'Primary School', 'no', 'open'),
(6, 'Mukora', 'Sch-486238497', 'Ainomugisha Costance', '2015,2016,2017,2018,', 102027, 'Primary School', 'no', 'open'),
(7, 'Nshozi', 'Sch-380524579', 'Bamuhimbise Wilson', '2015,2016,2017,2018,', 102019, 'Primary School', 'no', 'open'),
(8, 'Rubaare', 'Sch-702034558', 'Twinamatsiko Yoab Magara', '2015,2016,2017,2018,', 102097, 'Primary School', 'no', 'open'),
(9, 'Rugarama II', 'Sch-316931307', 'Kobuyonjo Juliet', '2015,2016,2017,2018,', 102022, 'Primary School', 'no', 'open'),
(10, 'Rwentaga', 'Sch-255007184', 'Nankunda Richard', '2015,2016,2017,2018,', 102098, 'Primary School', 'no', 'open'),
(11, 'St. Simon Kooga', 'Sch-827061556', 'Muhwezi DEO', '2015,2016,2017,2018,', 102024, 'Primary School', 'no', 'open'),
(12, 'Bunenero', 'Sch-869327613', 'Kamuhangire Elias', '2015,2016,2017,2018,', 102017, 'Primary School', 'no', 'open'),
(13, 'Esteeri Kokundeka Memorial', 'Sch-348688349', 'Atukunda Agnes', '2015,2016,2017,2018,', 102016, 'Primary School', 'no', 'open'),
(14, 'Itara', 'Sch-551326218', 'Dissi Livingston', '2015,2016,2017,2018,', 102013, 'Primary School', 'no', 'open'),
(15, 'Kaguhanzya', 'Sch-402153891', 'Mutabazi Edson', '2015,2016,2017,2018,', 102093, 'Primary School', 'no', 'open'),
(16, 'Kyamatambarire', 'Sch-375285360', 'Kasigaire Benon', '2015,2016,2017,2018,', 102012, 'Primary School', 'no', 'open'),
(17, 'Omukigando', 'Sch-321303097', 'Mwebaze Methodius', '2015,2016,2017,2018,', 102094, 'Primary School', 'no', 'open'),
(18, 'Rubaya', 'Sch-775781043', 'Bitekyerezo Julius', '2015,2016,2017,2018,', 102015, 'Primary School', 'no', 'open'),
(19, 'Ruburara', 'Sch-74843033', 'Bainomukama Gerald', '2015,2016,2017,2018,', 102092, 'Primary School', 'no', 'open'),
(20, 'Ruhunga', 'Sch-448801009', 'Nuwagira Robert', '2015,2016,2017,2018,', 102011, 'Primary School', 'no', 'open'),
(21, 'Rushozi', 'Sch-780664898', 'Kokunda Lydia', '2015,2016,2017,2018,', 102014, 'Primary School', 'no', 'open'),
(22, 'Rwantsinga', 'Sch-897266065', 'Karuhanga Piason', '2015,2016,2017,2018,', 102096, 'Primary School', 'no', 'open'),
(23, 'Buhumuriro', 'Sch-670298198', 'Abenawe Chris Katty', '2015,2016,2017,2018,', 102029, 'Primary School', 'no', 'open'),
(24, 'Bwizibwera moslem', 'Sch-667398632', 'Mulindwa Umar', '2015,2016,2017,2018,', 102031, 'Primary School', 'no', 'open'),
(25, 'Bwizibwera Town school', 'Sch-721297319', 'Atwiine Edridah Mugizi', '2015,2016,2017,2018,', 102033, 'Primary School', 'no', 'open'),
(26, 'Kacwamba', 'Sch-935010361', 'Mujuzi Grace', '2015,2016,2017,2018,', 102036, 'Primary School', 'no', 'open'),
(27, 'Karuyenje', 'Sch-88219349', 'Tumuhairwe Asaph', '2015,2016,2017,2018,', 102037, 'Primary School', 'no', 'open'),
(28, 'Kitookye', 'Sch-39762194', 'Mateeka Geoffrey', '2015,2016,2017,2018,', 102039, 'Primary School', 'no', 'open'),
(29, 'Mishenyi', 'Sch-120429453', 'Muhumuza Jotham', '2015,2016,2017,2018,', 102028, 'Primary School', 'no', 'open'),
(30, 'Muko I', 'Sch-406382331', 'Basiima Obeb', '2015,2016,2017,2018,', 102030, 'Primary School', 'no', 'open'),
(31, 'Nyakayojo II', 'Sch-377619401', 'Muraarira Kandiho Sam', '2015,2016,2017,2018,', 102032, 'Primary School', 'no', 'open'),
(32, 'Nyampikye', 'Sch-532616367', 'Twesigye Enid', '2015,2016,2017,2018,', 102034, 'Primary School', 'no', 'open'),
(33, 'Runengo', 'Sch-884479190', 'Katugwensi Flora Barigye', '2015,2016,2017,2018,', 102035, 'Primary School', 'no', 'open'),
(34, 'Rutooma Intergrated', 'Sch-598309703', 'Atiisa Milton', '2015,2016,2017,2018,', 102038, 'Primary School', 'no', 'open'),
(35, 'Rutooma Modern', 'Sch-973656664', 'Ngabirano Jones', '2015,2016,2017,2018,', 102041, 'Primary School', 'no', 'open'),
(36, 'Rweishamiro', 'Sch-988171983', 'Mujuni Naboth', '2015,2016,2017,2018,', 102042, 'Primary School', 'no', 'open'),
(37, 'Rwentojo', 'Sch-720288514', 'muhumuza Richard', '2015,2016,2017,2018,', 102044, 'Primary School', 'no', 'open'),
(38, 'Akashanda', 'Sch-162872536', 'Kyoshaba Justine', '2015,2016,2017,2018,', 102040, 'Primary School', 'no', 'open'),
(39, 'Kibaare 1', 'Sch-786143956', 'Kabigumira Vencious', '2015,2016,2017,2018,', 102043, 'Primary School', 'no', 'open'),
(40, 'Kitengure', 'Sch-888687462', 'Abesiga Vivian', '2015,2016,2017,2018,', 102046, 'Primary School', 'no', 'open'),
(41, 'Nyantungu', 'Sch-150918342', 'Mugume Jonas', '2015,2016,2017,2018,', 102048, 'Primary School', 'no', 'open'),
(42, 'Nyarubungo', 'Sch-689528334', 'Tukahirwa Jovia', '2015,2016,2017,2018,', 102050, 'Primary School', 'no', 'open'),
(43, 'Rubingo I', 'Sch-425019495', 'Rwakaningi Denis', '2015,2016,2017,2018,', 102045, 'Primary School', 'no', 'open'),
(44, 'Rubingo-Nyanja', 'Sch-580931365', 'Ahumuza Ruth', '2015,2016,2017,2018,', 102047, 'Primary School', 'no', 'open'),
(45, 'Rwengwe 1', 'Sch-98819143', 'Mbakiza Joseph', '2015,2016,2017,2018,', 102049, 'Primary School', 'no', 'open'),
(46, 'Akarungu', 'Sch-750736203', 'bekyinga Asaph', '2015,2016,2017,2018,', 102051, 'Primary School', 'no', 'open'),
(47, 'Buyenje', 'Sch-688531086', 'Muhairwe Milton Twaza', '2015,2016,2017,2018,', 102053, 'Primary School', 'no', 'open'),
(48, 'kaihiro', 'Sch-588252142', 'Barigye Cyprus', '2015,2016,2017,2018,', 102056, 'Primary School', 'no', 'open'),
(49, 'Kariro Muslim', 'Sch-536328151', 'Ssali Abdul Kariim', '2015,2016,2017,2018,', 102062, 'Primary School', 'no', 'open'),
(50, 'Karuhitsi', 'Sch-305408752', 'Asiimwe Specius', '2015,2016,2017,2018,', 102064, 'Primary School', 'no', 'open'),
(51, 'Kyakataara', 'Sch-907939152', 'Lwanga Narcis', '2015,2016,2017,2018,', 102065, 'Primary School', 'no', 'open'),
(52, 'Nyamiriro', 'Sch-707066169', 'Bwomi Joshua Agaba', '2015,2016,2017,2018,', 102052, 'Primary School', 'no', 'open'),
(53, 'Rubindi Boys', 'Sch-359431863', 'Mugarura Robert', '2015,2016,2017,2018,', 102054, 'Primary School', 'no', 'open'),
(54, 'Rubindi Girls', 'Sch-963462004', 'Mwebesa Deo', '2015,2016,2017,2018,', 102057, 'Primary School', 'no', 'open'),
(55, 'Rukanja', 'Sch-259503859', 'Kiiza Dominic', '2015,2016,2017,2018,', 102059, 'Primary School', 'no', 'open'),
(56, 'Rwamuhigi', 'Sch-350049857', 'Mugerwa Prima', '2015,2016,2017,2018,', 102061, 'Primary School', 'no', 'open'),
(57, 'Rwembirizi', 'Sch-745182195', 'Bekunda George William', '2015,2016,2017,2018,', 102063, 'Primary School', 'no', 'open'),
(58, 'Bwengure', 'Sch-32246671', 'Nyabwangu Jolly', '2015,2016,2017,2018,', 102055, 'Primary School', 'no', 'open'),
(59, 'Kagongi I', 'Sch-842536434', 'Boona Mpumwire Edith', '2015,2016,2017,2018,', 102058, 'Primary School', 'no', 'open'),
(60, 'Katagyengyera', 'Sch-641891982', 'Tumushabe Betyce', '2015,2016,2017,2018,', 102060, 'Primary School', 'no', 'open'),
(61, 'Kibingo 111', 'Sch-63777880', 'Kamugisha Julius', '2015,2016,2017,2018,', 102067, 'Primary School', 'no', 'open'),
(62, 'Kyarushanje', 'Sch-412465685', 'Kamayangi Angela', '2015,2016,2017,2018,', 102069, 'Primary School', 'no', 'open'),
(63, 'Munyonyi Mixed', 'Sch-489960955', 'Nuwagaba Crescent', '2015,2016,2017,2018,', 102072, 'Primary School', 'no', 'open'),
(64, 'Nsiika', 'Sch-554284541', 'Mugume Ihinduza Abel', '2015,2016,2017,2018,', 102076, 'Primary School', 'no', 'open'),
(65, 'Nyakabwera', 'Sch-154902695', 'Rutafa James', '2015,2016,2017,2018,', 102079, 'Primary School', 'no', 'open'),
(66, 'Nyaminyobwa', 'Sch-282432145', 'Tumubwine Patrick', '2015,2016,2017,2018,', 102068, 'Primary School', 'no', 'open'),
(67, 'omukagyera', 'Sch-915981899', 'Bainomugisha Alex', '2015,2016,2017,2018,', 102071, 'Primary School', 'no', 'open'),
(68, 'Rwamanuma', 'Sch-379859215', 'Mworozi Adrine', '2015,2016,2017,2018,', 102073, 'Primary School', 'no', 'open'),
(69, 'Rweshe', 'Sch-308871963', 'Mwijuka Deuth', '2015,2016,2017,2018,', 102074, 'Primary School', 'no', 'open'),
(70, 'Akabaare', 'Sch-80300138', 'Muhereza Vicent', '2015,2016,2017,2018,', 102066, 'Primary School', 'no', 'open'),
(71, 'Amabaare', 'Sch-395681548', 'Asiimwe Herbert', '2015,2016,2017,2018,', 102070, 'Primary School', 'no', 'open'),
(72, 'Kitongore 11', 'Sch-208165835', 'Namurebire Julius', '2015,2016,2017,2018,', 102075, 'Primary School', 'no', 'open'),
(73, 'Kyenshama', 'Sch-293293931', 'Mutungi Deus', '2015,2016,2017,2018,', 102078, 'Primary School', 'no', 'open'),
(74, 'Mirongo Central school', 'Sch-267655756', 'kiconco Enid', '2015,2016,2017,2018,', 102077, 'Primary School', 'no', 'open'),
(75, 'Nchune', 'Sch-208873684', 'Nankunda Zephrine', '2015,2016,2017,2018,', 102080, 'Primary School', 'no', 'open'),
(76, 'Nombe', 'Sch-874972627', 'Mugabo Dickson', '2015,2016,2017,2018,', 102082, 'Primary School', 'no', 'open'),
(77, 'Nyamirima Moslem', 'Sch-932727358', 'Kaduya Halima', '2015,2016,2017,2018,', 102081, 'Primary School', 'no', 'open'),
(78, 'Omumabaare', 'Sch-994361811', 'Nambale Richards M ', '2015,2016,2017,2018,', 102087, 'Primary School', 'no', 'open'),
(79, 'omukabaare', 'Sch-330340111', 'Mpongano Elly', '2015,2016,2017,2018,', 102084, 'Primary School', 'no', 'open'),
(80, 'Rugarura', 'Sch-675692064', 'Kekihembo Naome', '2015,2016,2017,2018,', 102089, 'Primary School', 'no', 'open'),
(81, 'Rwamukondo', 'Sch-161812900', 'Nuwagaba Apollo', '2015,2016,2017,2018,', 102090, 'Primary School', 'no', 'open'),
(82, 'Rweibaare 1', 'Sch-482748846', 'Musinguzi Gidion', '2015,2016,2017,2018,', 102091, 'Primary School', 'no', 'open'),
(83, 'Rweibare 11', 'Sch-522368926', 'Atusiime Jane', '2015,2016,2017,2018,', 102088, 'Primary School', 'no', 'open'),
(84, 'Rwobugoigo', 'Sch-866407649', 'Boroba James', '2015,2016,2017,2018,', 102085, 'Primary School', 'no', 'open'),
(85, 'St. Marys Rweibaare', 'Sch-463581799', 'Namara Jane', '', 102083, 'Primary School', 'no', 'open'),
(86, 'Kashaka', 'Sch-996581712', 'Asiimwe Patrick', '2015,2016,2017,2018,', 102018, 'Primary School', 'no', 'open'),
(87, 'Coloma', 'Sch-566961575', 'Kamugisha Elia', '2015,2016,2017,2018,', 102100, 'Primary School', 'no', 'open'),
(88, 'St. Anita Memorial', 'Sch-547606755', 'Anita Ainembabazi', '2015,2016,2017,2018,', 102101, 'Primary School', 'no', 'open'),
(89, 'Kahoma Modern', 'Sch-774640128', 'Modern h/t', '2015,2016,2017,2018,', 102102, 'Primary School', 'no', 'open'),
(90, 'Mabira Parents School', 'Sch-91448406', 'Akandwanaho Ezekiel', '2015,2016,2017,2018,', 102103, 'Primary School', 'no', 'open'),
(91, 'Wagawaga', 'Sch-835405332', 'Kansiime Anold', '2015,2016,2017,2018,', 102104, 'Primary School', 'no', 'open'),
(92, 'Rubindi Preparatory', 'Sch-500417065', 'Bamwesigye Asaph', '2015,2016,2017,2018,', 102105, 'Primary School', 'no', 'open'),
(93, 'Hopebel', 'Sch-319398474', 'Magezi Patrick', '2015,2016,2017,2018,', 102106, 'Primary School', 'no', 'open'),
(94, 'Ant Betty Ruhumba', 'Sch-599346393', 'Amutuhaire Grace', '2015,2016,2017,2018,', 102107, 'Primary School', 'no', 'open'),
(95, 'Rweshe Parents', 'Sch-771320988', 'Sande Ainamani', '2015,2016,2017,2018,', 102108, 'Primary School', 'no', 'open'),
(96, 'Lypa International', 'Sch-31141264', 'Mugarura Keneth', '2015,2016,2017,2018,', 102109, 'Primary School', 'no', 'open'),
(97, 'Nyamirima', 'Sch-246402442', 'Mpirirwe Edith', '2015,2016,2017,2018,', 102111, 'Primary School', 'no', 'open'),
(98, 'Rubindi Parents', 'Sch-734636594', 'Abaasa Agnes', '2015,2016,2017,2018,', 102110, 'Primary School', 'no', 'open'),
(99, 'St.Josephs Model', 'Sch-752479340', 'Amos Ashaba', '2015,2016,2017,2018,', 102112, 'Primary School', 'no', 'open'),
(100, 'Rweshe Pentecost', 'Sch-299209998', 'Muhumsa Ephraim', '2015,2016,2017,2018,', 102113, 'Primary School', 'no', 'open'),
(101, 'Moonlight', 'Sch-829859772', 'Kamuntu Joseph', '2015,2016,2017,2018,', 102114, 'Primary School', 'no', 'open');

-- --------------------------------------------------------

--
-- Table structure for table `schools_tb`
--

CREATE TABLE `schools_tb` (
  `id` int(11) NOT NULL,
  `sch_name` varchar(255) NOT NULL,
  `sch_no` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `district` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `parish` varchar(50) NOT NULL,
  `girls` varchar(50) NOT NULL,
  `boys` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Primary School',
  `status` varchar(20) NOT NULL DEFAULT 'open',
  `managed` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_tb`
--

INSERT INTO `schools_tb` (`id`, `sch_name`, `sch_no`, `category`, `district`, `county`, `sub_county`, `parish`, `girls`, `boys`, `total`, `level`, `status`, `managed`) VALUES
(28, 'Rugarama II', 'Sch-316931307', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Rugarama', '188', '180', '368', 'Primary School', 'open', 'yes'),
(29, 'Mugarutsa', 'Sch-642926346', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Mugarutsa', '342', '346', '688', 'Primary School', 'open', 'yes'),
(30, 'Kashaka', 'Sch-996581712', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kashaka', '142', '162', '304', 'Primary School', 'open', 'yes'),
(31, 'Katooma II', 'Sch-525316494', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kamushoko', '173', '164', '337', 'Primary School', 'open', 'yes'),
(32, 'St. Simon Kooga', 'Sch-827061556', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kashaka', '207', '194', '401', 'Primary School', 'open', 'yes'),
(33, 'Rwentaga', 'Sch-255007184', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Rwenshanku', '275', '265', '540', 'Primary School', 'open', 'yes'),
(34, 'Rubaare', 'Sch-702034558', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Mugarutsya', '106', '97', '203', 'Primary School', 'open', 'yes'),
(35, 'Nshozi', 'Sch-380524579', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kashaka', '112', '135', '247', 'Primary School', 'open', 'yes'),
(36, 'Komuyaga', 'Sch-730890848', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kamushoko', '144', '167', '311', 'Primary School', 'open', 'yes'),
(37, 'Mukora', 'Sch-486238497', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Rwenshanku', '203', '174', '377', 'Primary School', 'open', 'yes'),
(38, 'Katsikizi', 'Sch-990561230', 'government', 'Mbarara', 'Kashari', 'Bubaare', 'Kamushoko', '76', '55', '131', 'Primary School', 'open', 'yes'),
(39, 'Rutooma Modern', 'Sch-973656664', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Kakyerere', '190', '201', '391', 'Primary School', 'open', 'yes'),
(40, 'Rwentojo', 'Sch-720288514', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Katyazo', '240', '247', '487', 'Primary School', 'open', 'yes'),
(41, 'Kacwamba', 'Sch-935010361', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Mabira', '191', '175', '366', 'Primary School', 'open', 'yes'),
(42, 'Rweishamiro', 'Sch-988171983', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Katyazo', '167', '140', '307', 'Primary School', 'open', 'yes'),
(43, 'Kitookye', 'Sch-39762194', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Mabira', '121', '133', '254', 'Primary School', 'open', 'yes'),
(44, 'Karuyenje', 'Sch-88219349', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Kakyerere', '190', '177', '367', 'Primary School', 'open', 'yes'),
(45, 'Runengo', 'Sch-884479190', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Katyazo', '177', '219', '396', 'Primary School', 'open', 'yes'),
(46, 'Rutooma Intergrated', 'Sch-598309703', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Ogwengoma', '193', '173', '366', 'Primary School', 'open', 'yes'),
(47, 'Buhumuriro', 'Sch-670298198', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Kakyerere', '247', '233', '480', 'Primary School', 'open', 'yes'),
(48, 'Mishenyi', 'Sch-120429453', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Rwebishekye', '236', '219', '455', 'Primary School', 'open', 'yes'),
(49, 'Bwizibwera Town school', 'Sch-721297319', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Rwebishekye', '236', '219', '455', 'Primary School', 'open', 'yes'),
(50, 'Muko I', 'Sch-406382331', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Rwebishekye', '120', '102', '222', 'Primary School', 'open', 'yes'),
(51, 'Bwizibwera moslem', 'Sch-667398632', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Rwebishekye', '108', '96', '204', 'Primary School', 'open', 'yes'),
(52, 'Kibaare 1', 'Sch-786143956', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Kakoba', '-162', '-185', '-347', 'Primary School', 'open', 'yes'),
(53, 'Nyakayojo II', 'Sch-377619401', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Kakyerere', '141', '192', '333', 'Primary School', 'open', 'yes'),
(54, 'Nyampikye', 'Sch-532616367', 'government', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Mabira', '99', '109', '208', 'Primary School', 'open', 'yes'),
(55, 'Rubingo-Nyanja', 'Sch-580931365', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Nyanja', '88', '72', '160', 'Primary School', 'open', 'yes'),
(56, 'Rwengwe 1', 'Sch-98819143', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Nyanja', '189', '192', '381', 'Primary School', 'open', 'yes'),
(57, 'Nyarubungo', 'Sch-689528334', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Nyarubungo', '185', '162', '347', 'Primary School', 'open', 'yes'),
(59, 'Akashanda', 'Sch-162872536', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Nyarubungo', '250', '210', '460', 'Primary School', 'open', 'yes'),
(60, 'Kitengure', 'Sch-888687462', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Bukiro', '260', '261', '521', 'Primary School', 'open', 'yes'),
(61, 'Itara', 'Sch-551326218', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Itara', '195', '176', '371', 'Primary School', 'open', 'yes'),
(62, 'Rwantsinga', 'Sch-897266065', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Bunenero', '103', '200', '303', 'Primary School', 'open', 'yes'),
(63, 'Ruburara', 'Sch-74843033', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Bunenero', '97', '206', '303', 'Primary School', 'open', 'yes'),
(64, 'Nyantungu', 'Sch-150918342', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Rubingo', '392', '384', '776', 'Primary School', 'open', 'yes'),
(65, 'Rubaya', 'Sch-775781043', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Bunenero', '91', '113', '204', 'Primary School', 'open', 'yes'),
(66, 'Rubingo I', 'Sch-425019495', 'government', 'Mbarara', 'Kashari', 'Bukiro', 'Ruhunga', '370', '357', '727', 'Primary School', 'open', 'yes'),
(67, 'Bunenero', 'Sch-869327613', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Bunenero', '198', '181', '379', 'Primary School', 'open', 'yes'),
(68, 'Omukigando', 'Sch-321303097', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Itara', '103', '109', '212', 'Primary School', 'open', 'yes'),
(69, 'Rushozi', 'Sch-780664898', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Rushozi', '83', '83', '166', 'Primary School', 'open', 'yes'),
(70, 'Kaguhanzya', 'Sch-402153891', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Ruhunga', '295', '326', '621', 'Primary School', 'open', 'yes'),
(71, 'Rubindi Boys', 'Sch-359431863', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Karuhama', '250', '273', '523', 'Primary School', 'open', 'yes'),
(72, 'Ruhunga', 'Sch-448801009', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Ruhunga', '140', '114', '254', 'Primary School', 'open', 'yes'),
(73, 'Rubindi Girls', 'Sch-963462004', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Karuhama', '240', '331', '571', 'Primary School', 'open', 'yes'),
(74, 'Esteeri Kokundeka Memorial', 'Sch-348688349', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Rushozi', '174', '142', '316', 'Primary School', 'open', 'yes'),
(75, 'Kyamatambarire', 'Sch-375285360', 'government', 'Mbarara', 'Kashari', 'Rubaya', 'Rushozi', '168', '132', '300', 'Primary School', 'open', 'yes'),
(76, 'Rukanja', 'Sch-259503859', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Nyamiriro', '221', '216', '437', 'Primary School', 'open', 'yes'),
(77, 'Kyakataara', 'Sch-907939152', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Nyamiriro', '192', '203', '395', 'Primary School', 'open', 'yes'),
(78, 'Kariro Muslim', 'Sch-536328151', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Kariro', '117', '102', '219', 'Primary School', 'open', 'yes'),
(79, 'Buyenje', 'Sch-688531086', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Rwamuhigi', '222', '198', '420', 'Primary School', 'open', 'yes'),
(80, 'Rwembirizi', 'Sch-745182195', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Kariro', '231', '186', '417', 'Primary School', 'open', 'yes'),
(81, 'Karuhitsi', 'Sch-305408752', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Bitsya', '254', '258', '512', 'Primary School', 'open', 'yes'),
(82, 'Rwamuhigi', 'Sch-350049857', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Nyamiriro', '114', '99', '213', 'Primary School', 'open', 'yes'),
(83, 'Akarungu', 'Sch-750736203', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Karwesanga', '89', '98', '187', 'Primary School', 'open', 'yes'),
(84, 'kaihiro', 'Sch-588252142', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Karwesanga', '245', '264', '509', 'Primary School', 'open', 'yes'),
(85, 'Nyamiriro', 'Sch-707066169', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Nyamiriro', '207', '152', '359', 'Primary School', 'open', 'yes'),
(86, 'Bwengure', 'Sch-32246671', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Bwengure', '251', '257', '508', 'Primary School', 'open', 'yes'),
(87, 'Nsiika', 'Sch-554284541', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Nsiika', '192', '165', '357', 'Primary School', 'open', 'yes'),
(88, 'Munyonyi Mixed', 'Sch-489960955', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Kyandahi', '185', '170', '355', 'Primary School', 'open', 'yes'),
(89, 'Katagyengyera', 'Sch-641891982', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Bwengure', '111', '91', '202', 'Primary School', 'open', 'yes'),
(90, 'Nyakabwera', 'Sch-154902695', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Kibingo', '265', '235', '500', 'Primary School', 'open', 'yes'),
(91, 'Rweshe', 'Sch-308871963', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Ngango', '207', '221', '428', 'Primary School', 'open', 'yes'),
(92, 'St. Marys Rweibaare', 'Sch-463581799', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '231', '194', '425', 'Primary School', 'open', 'yes'),
(93, 'Kagongi I', 'Sch-842536434', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Ntuura', '230', '250', '480', 'Primary School', 'open', 'yes'),
(94, 'Rweibaare 1', 'Sch-482748846', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '151', '167', '318', 'Primary School', 'open', 'yes'),
(95, 'Rwamanuma', 'Sch-379859215', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Ntuura', '235', '282', '517', 'Primary School', 'open', 'yes'),
(96, 'omukagyera', 'Sch-915981899', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Ntuura', '166', '177', '343', 'Primary School', 'open', 'yes'),
(97, 'Kyarushanje', 'Sch-412465685', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Ntuura', '63', '88', '151', 'Primary School', 'open', 'yes'),
(98, 'Nyaminyobwa', 'Sch-282432145', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Nsiika', '81', '104', '185', 'Primary School', 'open', 'yes'),
(99, 'Kibingo 111', 'Sch-63777880', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Kibingo', '188', '203', '391', 'Primary School', 'open', 'yes'),
(100, 'Mirongo Central school', 'Sch-267655756', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '212', '199', '411', 'Primary School', 'open', 'yes'),
(101, 'Akabaare', 'Sch-80300138', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '223', '222', '445', 'Primary School', 'open', 'yes'),
(102, 'Nyamirima Moslem', 'Sch-932727358', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '78', '108', '186', 'Primary School', 'open', 'yes'),
(103, 'Amabaare', 'Sch-395681548', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '94', '92', '186', 'Primary School', 'open', 'yes'),
(104, 'Nchune', 'Sch-208873684', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nchune', '257', '226', '483', 'Primary School', 'open', 'yes'),
(105, 'Rwamukondo', 'Sch-161812900', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mitoozo', '136', '130', '266', 'Primary School', 'open', 'yes'),
(106, 'Nombe', 'Sch-874972627', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nchune', '290', '278', '568', 'Primary School', 'open', 'yes'),
(107, 'Rweibare 11', 'Sch-522368926', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nyabisirira', '414', '367', '781', 'Primary School', 'open', 'yes'),
(108, 'Kitongore 11', 'Sch-208165835', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mitoozo', '40', '23', '63', 'Primary School', 'open', 'yes'),
(109, 'Rugarura', 'Sch-675692064', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nyabisirira', '175', '131', '306', 'Primary School', 'open', 'yes'),
(110, 'Kyenshama', 'Sch-293293931', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nyabisirira', '130', '90', '220', 'Primary School', 'open', 'yes'),
(111, 'Omumabaare', 'Sch-994361811', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nyabisirira', '81', '78', '159', 'Primary School', 'open', 'yes'),
(112, 'omukabaare', 'Sch-330340111', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Nchune', '144', '113', '257', 'Primary School', 'open', 'yes'),
(113, 'Rwobugoigo', 'Sch-866407649', 'government', 'Mbarara', 'Kashari', 'Kashare', 'Mitoozo', '178', '195', '373', 'Primary School', 'open', 'yes'),
(114, 'Coloma', 'Sch-566961575', 'private', 'Mbarara', 'Kashari', 'Bubaare', 'Bukiro', '112', '147', '259', 'Primary School', 'open', 'yes'),
(115, 'St. Anita Memorial', 'Sch-547606755', 'private', 'Mbarara', 'Kashari', 'Bubaare', 'Bukiro', '170', '134', '304', 'Primary School', 'open', 'yes'),
(116, 'Kahoma Modern', 'Sch-774640128', 'private', 'Mbarara', 'Kashari', 'Rubaya', 'Rwanyena', '101', '113', '214', 'Primary School', 'open', 'yes'),
(117, 'Mabira Parents School', 'Sch-91448406', 'private', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Mabira', '134', '156', '290', 'Primary School', 'open', 'yes'),
(118, 'Wagawaga', 'Sch-835405332', 'private', 'Mbarara', 'Kashari', 'Rwanyamahembe', 'Rutooma', '204', '192', '396', 'Primary School', 'open', 'yes'),
(119, 'Rubindi Preparatory', 'Sch-500417065', 'government', 'Mbarara', 'Kashari', 'Rubindi', 'Nyabuhama', '214', '212', '426', 'Primary School', 'open', 'yes'),
(120, 'Hopebel', 'Sch-319398474', 'private', 'Mbarara', 'Kashari', 'Rubindi', 'Katyazo', '156', '167', '323', 'Primary School', 'open', 'yes'),
(121, 'Aunt Betty Ruhumba', 'Sch-599346393', 'private', 'Mbarara', 'Kashari', 'Rubindi', 'Kariro', '145', '140', '285', 'Primary School', 'open', 'yes'),
(122, 'Rweshe Parents', 'Sch-771320988', 'private', 'Mbarara', 'Kashari', 'Kagongi', 'Nyabisirira', '161', '173', '334', 'Primary School', 'open', 'yes'),
(123, 'Lypa International', 'Sch-31141264', 'private', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '223', '254', '477', 'Primary School', 'open', 'yes'),
(124, 'Nyamirima', 'Sch-246402442', 'private', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '132', '127', '259', 'Primary School', 'open', 'yes'),
(125, 'Rubindi Parents', 'Sch-734636594', 'private', 'Mbarara', 'Kashari', 'Kashare', 'Mirongo', '221', '195', '416', 'Primary School', 'open', 'yes'),
(126, 'St.Josephs Model', 'Sch-752479340', 'private', 'Mbarara', 'Kashari', 'Rubindi', 'Nsiika', '132', '123', '255', 'Primary School', 'open', 'yes'),
(127, 'Rweshe Pentecost', 'Sch-299209998', 'government', 'Mbarara', 'Kashari', 'Kagongi', 'Kibingo', '98', '105', '203', 'Primary School', 'open', 'yes'),
(128, 'Moonlight', 'Sch-829859772', 'private', 'Mbarara', 'Kashari', 'Kagongi', 'Kibingo', '143', '168', '311', 'Primary School', 'open', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `schools_teacher`
--

CREATE TABLE `schools_teacher` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `sch_no` varchar(25) NOT NULL,
  `teacher_roll` varchar(25) NOT NULL,
  `year` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `subject_code` varchar(25) NOT NULL,
  `graded` varchar(25) NOT NULL DEFAULT 'no',
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools_teacher`
--

INSERT INTO `schools_teacher` (`id`, `school_name`, `teacher_name`, `sch_no`, `teacher_roll`, `year`, `class`, `subject`, `subject_code`, `graded`, `status`) VALUES
(2, 'Muko primary school', 'Most Bilkis Begum', 'Sch_0021', '102004', '2015', 'Primary Two', 'Math', '1002', 'yes', 'active'),
(3, 'Itara Primary school', 'Akampa Mark', 'Sch_0023', '102004', '2018', 'Primary One', 'English', '1001', 'yes', 'active'),
(4, 'Muza Central Primary Scho', 'Most Mohona Begum', 'Sch_0025', '102005', '2005', 'Primary Four', 'Science', '1003', 'yes', 'active'),
(5, 'Bwizibwera Primary School', 'Md Asraful Islam ', 'Sch_0028', '102003', '2017', 'Primary Six', 'Social Studies', '1004', 'yes', 'active'),
(6, 'Itara Primary school', 'Most Mohona Begum', 'Sch_0023', '102005', '2009', 'Primary Two', 'Physical Education', '1005', 'yes', 'active'),
(7, 'Muko primary school', 'Derek J. Arnold', 'Sch_0021', '102006', '2018', 'Primary Six', 'Science', '1003', 'yes', 'active'),
(8, 'Itara Primary school', 'Akampa Mark', 'Sch_0023', '102004', '2018', 'Primary Two', 'Social Studies', '1004', 'no', 'active'),
(9, 'Muko primary school', 'Md Asraful Islam ', 'Sch_0021', '102003', '1990', 'Primary One', 'English', '1001', 'yes', 'active'),
(10, 'Muza Central Primary Scho', 'Most Mohona Begum', 'Sch_0025', '102005', '1990', 'Primary Two', 'Social Studies', '1004', 'yes', 'active'),
(11, 'Ruhunga Primary School', 'Derek J. Arnold', 'Sch_0017', '102006', '2018', 'Primary Four', 'Social Studies', '1004', 'no', 'active'),
(12, 'Runengo Primary School', 'Akampa Mark', 'Sch_0013', '102004', '2018', 'Primary Six', 'Math', '1002', 'no', 'active'),
(13, 'Rwendezi Primary School', 'Tumutegyereize ', 'Sch_0009', '102014', '2014,2015,2016,2017,2018,2019', 'Physical Education,Primary Six,Primary Seven', 'Social Studies', '1004', 'no', 'active'),
(14, 'Rubaya Primary School', 'Md Asraful Islam ', 'Sch_0029', '102003', '2017,2018,2019', 'Primary Two,Primary Four,Primary Five', 'Math', '1002', 'no', 'active'),
(15, 'Kashaka Primary School', 'Musimenta Lydia', 'Sch_003', '102015', '2019', 'Array', 'Runyankole', '1006', 'no', 'active'),
(16, 'Katooma Primary school', 'Tumutegyereize ', 'Sch_0045', '102014', '2018', 'Primary Four', 'Physical Education', '1005', 'no', 'active'),
(17, 'Runengo Primary School', 'Tumutegyereize ', 'Sch_0013', '102014', '2016,2017,2018', 'Array', 'Math', '1002', 'no', 'active'),
(18, 'Ruhunga Primary School', 'Most Mohona Begum', 'Sch_0017', '102005', '2012', 'Array', 'Runyankole', '1006', 'no', 'active'),
(19, 'Kashaka Primary School', 'Tumutegyereize ', 'Sch_003', '102014', '2012', 'Primary Four', 'Physical Education', '1005', 'no', 'active'),
(20, 'Runengo Primary School', 'Tumutegyereize ', 'Sch_0013', '102014', '2017', 'Primary Seven', 'Science', '1003', 'no', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sch_mock_results`
--

CREATE TABLE `sch_mock_results` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(25) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `year` varchar(25) NOT NULL,
  `g_1` int(11) NOT NULL,
  `g_2` int(11) NOT NULL,
  `g_3` int(11) NOT NULL,
  `g_4` int(11) NOT NULL,
  `g_u` int(11) NOT NULL,
  `g_x` int(11) NOT NULL,
  `p_1` float NOT NULL,
  `p_2` float NOT NULL,
  `p_3` float NOT NULL,
  `p_4` float NOT NULL,
  `p_u` float NOT NULL,
  `p_x` float NOT NULL,
  `g_total` int(11) NOT NULL,
  `p_total` float NOT NULL,
  `p_actual` float NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `report_date` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sch_mock_results`
--

INSERT INTO `sch_mock_results` (`id`, `teacher_name`, `school_name`, `sub_county`, `year`, `g_1`, `g_2`, `g_3`, `g_4`, `g_u`, `g_x`, `p_1`, `p_2`, `p_3`, `p_4`, `p_u`, `p_x`, `g_total`, `p_total`, `p_actual`, `grade`, `remarks`, `report_date`, `status`) VALUES
(2, 'Asiimwe Patrick', 'Kashaka', 'Bubaare', '2019', 2, 8, 2, 7, 1, 0, 10, 40, 10, 35, 5, 0, 20, 100, 53.75, 'Grade four', 'Fair with Ungraded', '22-11-2019 04:58:05 pm', 'active'),
(3, 'Muhwezi DEO', 'St. Simon Kooga', 'Bubaare', '2019', 3, 9, 2, 11, 4, 1, 10, 30, 6.67, 36.67, 13.33, 3.33, 30, 100, 45, 'Ungraded', 'Poor with Ungraded', '22-11-2019 04:57:32 pm', 'active'),
(4, 'Kwesiga Erastus', 'Mugarutsa', 'Bubaare', '2019', 4, 20, 32, 7, 0, 0, 6.35, 31.75, 50.79, 11.11, 0, 0, 63, 100, 58.34, 'Grade three', 'Fair', '22-11-2019 05:00:28 pm', 'active'),
(5, 'Nankunda Richard', 'Rwentaga', 'Bubaare', '2019', 2, 12, 4, 5, 0, 1, 8.33, 50, 16.67, 20.83, 0, 4.17, 24, 100, 59.37, 'Grade three', 'Fair', '22-11-2019 05:00:28 pm', 'active'),
(6, 'Kiconco Betty', 'Katooma II', 'Bubaare', '2019', 1, 5, 2, 6, 4, 0, 5.56, 27.78, 11.11, 33.33, 22.22, 0, 18, 100, 40.28, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:01:27 pm', 'active'),
(7, 'Byarugaba Vicent Mukwate', 'Katsikizi', 'Bubaare', '2019', 0, 1, 1, 4, 1, 2, 0, 11.11, 11.11, 44.44, 11.11, 22.22, 9, 100, 25, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:00:57 pm', 'active'),
(8, 'Mugume Wilson', 'Komuyaga', 'Bubaare', '2019', 0, 9, 1, 14, 2, 0, 0, 34.62, 3.85, 53.85, 7.69, 0, 26, 100.01, 41.35, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:02:17 pm', 'active'),
(9, 'Bamuhimbise Wilson', 'Nshozi', 'Bubaare', '2019', 0, 8, 4, 2, 1, 0, 0, 53.33, 26.67, 13.33, 6.67, 0, 15, 100, 56.67, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:03:40 pm', 'active'),
(10, 'Ainomugisha Costance', 'Mukora', 'Bubaare', '2019', 0, 8, 6, 8, 2, 0, 0, 33.33, 25, 33.33, 8.33, 0, 24, 100, 45.83, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:03:29 pm', 'active'),
(11, 'Kobuyonjo Juliet', 'Rugarama II', 'Bubaare', '2019', 0, 14, 3, 7, 1, 0, 0, 56, 12, 28, 4, 0, 25, 100, 55, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:04:37 pm', 'active'),
(12, 'Twinamatsiko Yoab Magara', 'Rubaare', 'Bubaare', '2019', 0, 2, 8, 7, 1, 0, 0, 11.11, 44.44, 38.89, 5.56, 0, 18, 100, 40.28, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:04:50 pm', 'active'),
(13, 'Kasigaire Benon', 'Kyamatambarire', 'Rubaya', '2019', 3, 8, 3, 0, 0, 1, 20, 53.33, 20, 0, 0, 6.67, 15, 100, 70, 'Grade three', 'Fair', '22-11-2019 05:05:16 pm', 'active'),
(14, 'Atukunda Agnes', 'Esteeri Kokundeka Memorial', 'Rubaya', '2019', 4, 6, 1, 3, 0, 0, 28.57, 42.86, 7.14, 21.43, 0, 0, 14, 100, 69.64, 'Grade three', 'Fair', '22-11-2019 05:08:27 pm', 'active'),
(15, 'Kamuhangire Elias', 'Bunenero', 'Rubaya', '2019', 1, 15, 1, 7, 0, 0, 4.17, 62.5, 4.17, 29.17, 0, 0, 24, 100.01, 60.42, 'Grade three', 'Fair', '22-11-2019 05:08:11 pm', 'active'),
(16, 'Mutabazi Edson', 'Kaguhanzya', 'Rubaya', '2019', 2, 34, 1, 2, 0, 2, 4.88, 82.93, 2.44, 4.88, 0, 4.88, 41, 100.01, 69.52, 'Grade three', 'Fair', '22-11-2019 05:09:10 pm', 'active'),
(17, 'Dissi Livingston', 'Itara', 'Rubaya', '2019', 0, 3, 4, 9, 3, 0, 0, 15.79, 21.05, 47.37, 15.79, 0, 19, 100, 34.21, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:09:33 pm', 'active'),
(18, 'Karuhanga Piason', 'Rwantsinga', 'Rubaya', '2019', 1, 2, 2, 8, 14, 0, 3.7, 7.41, 7.41, 29.63, 51.85, 0, 27, 100, 20.37, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:10:08 pm', 'active'),
(20, 'Mwebaze Methodius', 'Omukigando', 'Rubaya', '2019', 0, 4, 4, 26, 15, 3, 0, 7.69, 7.69, 50, 28.85, 5.77, 52, 100, 22.11, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:10:46 pm', 'active'),
(21, 'Bainomukama Gerald', 'Ruburara', 'Rubaya', '2019', 0, 7, 4, 12, 3, 0, 0, 26.92, 15.38, 46.15, 11.54, 0, 26, 100, 39.42, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:11:37 pm', 'active'),
(22, 'Kokunda Lydia', 'Rushozi', 'Rubaya', '2019', 0, 9, 3, 15, 3, 0, 0, 30, 10, 50, 10, 0, 30, 100, 40, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:12:34 pm', 'active'),
(23, 'Bitekyerezo Julius', 'Rubaya', 'Rubaya', '2019', 0, 8, 2, 11, 4, 0, 0, 32, 8, 44, 16, 0, 25, 100, 39, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:11:22 pm', 'active'),
(24, 'Nuwagira Robert', 'Ruhunga', 'Rubaya', '2019', 0, 5, 5, 15, 1, 0, 0, 19.23, 19.23, 57.69, 3.85, 0, 26, 100, 38.46, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:15:49 pm', 'active'),
(25, 'Mujuni Naboth', 'Rweishamiro', 'Rwanyamahembe', '2019', 6, 8, 4, 0, 0, 1, 31.58, 42.11, 21.05, 0, 0, 5.26, 19, 100, 73.69, 'Grade three', 'Fair', '22-11-2019 05:13:16 pm', 'active'),
(26, 'Katugwensi Flora Barigye', 'Runengo', 'Rwanyamahembe', '2019', 6, 12, 0, 0, 0, 0, 33.33, 66.67, 0, 0, 0, 0, 18, 100, 83.33, 'Grade two', 'Good', '22-11-2019 05:16:29 pm', 'active'),
(27, 'Atusiime Jane', 'Rweibare 11', 'Kashare', '2019', 44, 11, 0, 0, 0, 0, 80, 20, 0, 0, 0, 0, 55, 100, 95, 'Grade two', 'Good', '22-11-2019 05:15:20 pm', 'active'),
(28, 'Twesigye Enid', 'Nyampikye', 'Rwanyamahembe', '2019', 3, 7, 5, 1, 0, 1, 17.65, 41.18, 29.41, 5.88, 0, 5.88, 17, 100, 64.71, 'Grade three', 'Fair', '22-11-2019 05:18:08 pm', 'active'),
(29, 'Atwiine Edridah Mugizi', 'Bwizibwera Town school', 'Rwanyamahembe', '2019', 6, 18, 2, 1, 0, 0, 22.22, 66.67, 7.41, 3.7, 0, 0, 27, 100, 76.85, 'Grade two', 'Good', '22-11-2019 05:18:17 pm', 'active'),
(30, 'Abenawe Chris Katty', 'Buhumuriro', 'Rwanyamahembe', '2019', 4, 7, 3, 11, 4, 4, 12.12, 21.21, 9.09, 33.33, 12.12, 12.12, 33, 99.99, 40.91, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:19:00 pm', 'active'),
(31, 'Ngabirano Jones', 'Rutooma Modern', 'Rwanyamahembe', '2019', 2, 18, 6, 8, 2, 0, 5.56, 50, 16.67, 22.22, 5.56, 0, 36, 100.01, 56.95, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:19:51 pm', 'active'),
(32, 'muhumuza Richard', 'Rwentojo', 'Rwanyamahembe', '2019', 5, 15, 9, 1, 0, 0, 16.67, 50, 30, 3.33, 0, 0, 30, 100, 70, 'Grade three', 'Fair', '22-11-2019 05:19:47 pm', 'active'),
(33, 'Basiima Obeb', 'Muko I', 'Rwanyamahembe', '2019', 1, 10, 3, 6, 3, 0, 4.35, 43.48, 13.04, 26.09, 13.04, 0, 23, 100, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:21:08 pm', 'active'),
(34, 'Mateeka Geoffrey', 'Kitookye', 'Rwanyamahembe', '2019', 1, 3, 4, 8, 0, 0, 6.25, 18.75, 25, 50, 0, 0, 16, 100, 45.31, 'Grade four', 'Poor', '22-11-2019 05:21:37 pm', 'active'),
(35, 'Mujuzi Grace', 'Kacwamba', 'Rwanyamahembe', '2019', 0, 1, 0, 3, 12, 0, 0, 6.25, 0, 18.75, 75, 0, 16, 100, 10.1, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:22:08 pm', 'active'),
(36, 'Mulindwa Umar', 'Bwizibwera moslem', 'Rwanyamahembe', '2019', 1, 2, 2, 9, 3, 1, 5.56, 11.11, 11.11, 50, 16.67, 5.56, 18, 100.01, 31.95, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:22:33 pm', 'active'),
(37, 'Namara Jane', 'St. Marys Rweibaare', 'Kashare', '2019', 4, 4, 7, 5, 1, 0, 19.05, 19.05, 33.33, 23.81, 4.76, 0, 21, 100, 55.96, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:21:28 pm', 'active'),
(38, 'Tumuhairwe Asaph', 'Karuyenje', 'Rwanyamahembe', '2019', 1, 15, 5, 7, 1, 1, 3.33, 50, 16.67, 23.33, 3.33, 3.33, 30, 99.99, 55, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:23:25 pm', 'active'),
(39, 'Muhumuza Jotham', 'Mishenyi', 'Rwanyamahembe', '2019', 0, 4, 2, 2, 1, 0, 0, 44.44, 22.22, 22.22, 11.11, 0, 9, 99.99, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:24:08 pm', 'active'),
(40, 'Muraarira Kandiho Sam', 'Nyakayojo II', 'Rwanyamahembe', '2019', 0, 12, 5, 2, 0, 0, 0, 63.16, 26.32, 10.53, 0, 0, 19, 100.01, 63.16, 'Grade three', 'Fair', '22-11-2019 05:23:00 pm', 'active'),
(41, 'Atiisa Milton', 'Rutooma Intergrated', 'Rwanyamahembe', '2019', 0, 4, 1, 12, 8, 0, 0, 16, 4, 48, 32, 0, 25, 100, 26, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:25:02 pm', 'active'),
(42, 'Kyoshaba Justine', 'Akashanda', 'Bukiro', '2019', 5, 14, 7, 4, 1, 1, 15.63, 43.75, 21.88, 12.5, 3.13, 3.13, 32, 100.02, 62.51, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:25:10 pm', 'active'),
(43, 'Mugume Jonas', 'Nyantungu', 'Bukiro', '2019', 3, 20, 13, 17, 2, 0, 5.45, 36.36, 23.64, 30.91, 3.64, 0, 55, 100, 52.27, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:25:44 pm', 'active'),
(44, 'Musinguzi Gidion', 'Rweibaare 1', 'Kashare', '2019', 4, 14, 8, 6, 1, 0, 12.12, 42.42, 24.24, 18.18, 3.03, 0, 33, 99.99, 60.6, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:23:37 pm', 'active'),
(45, 'Tukahirwa Jovia', 'Nyarubungo', 'Bukiro', '2019', 1, 6, 2, 3, 2, 1, 6.67, 40, 13.33, 20, 13.33, 6.67, 15, 100, 48.34, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:26:00 pm', 'active'),
(46, 'Rwakaningi Denis', 'Rubingo I', 'Bukiro', '2019', 1, 13, 5, 17, 5, 0, 2.44, 31.71, 12.2, 41.46, 12.2, 0, 41, 100.01, 42.69, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:26:36 pm', 'active'),
(47, 'Kabigumira Vencious', 'Kibaare 1', 'Bukiro', '2019', 0, 5, 2, 5, 8, 0, 0, 25, 10, 25, 40, 0, 20, 100, 30, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:27:02 pm', 'active'),
(48, 'Ahumuza Ruth', 'Rubingo-Nyanja', 'Bukiro', '2019', 0, 0, 2, 7, 5, 1, 0, 0, 13.33, 46.67, 33.33, 6.67, 15, 100, 18.33, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:27:42 pm', 'active'),
(49, 'Abesiga Vivian', 'Kitengure', 'Bukiro', '2019', 0, 13, 4, 13, 0, 0, 0, 43.33, 13.33, 43.33, 0, 0, 30, 99.99, 50, 'Grade three', 'Fair', '22-11-2019 05:27:39 pm', 'active'),
(50, 'Mwebesa Deo', 'Rubindi Girls', 'Rubindi', '2019', 10, 27, 11, 0, 0, 0, 20.83, 56.25, 22.92, 0, 0, 0, 48, 100, 74.48, 'Grade three', 'Fair', '24-11-2019 06:08:25 pm', 'active'),
(51, 'Mbakiza Joseph', 'Rwengwe 1', 'Bukiro', '2019', 0, 1, 1, 8, 11, 0, 0, 4.76, 4.76, 38.1, 52.38, 0, 21, 100, 15.48, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:28:59 pm', 'active'),
(52, 'Kiiza Dominic', 'Rukanja', 'Rubindi', '2019', 4, 13, 4, 7, 1, 1, 13.33, 43.33, 13.33, 23.33, 3.33, 3.33, 30, 99.98, 58.33, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:30:18 pm', 'active'),
(53, 'Mugarura Robert', 'Rubindi Boys', 'Rubindi', '2019', 5, 22, 6, 5, 0, 0, 13.16, 57.89, 15.79, 13.16, 0, 0, 38, 100, 67.76, 'Grade three', 'Fair', '22-11-2019 05:32:17 pm', 'active'),
(54, 'Barigye Cyprus', 'kaihiro', 'Rubindi', '2019', 2, 17, 2, 4, 2, 0, 7.41, 62.96, 7.41, 14.81, 7.41, 0, 27, 100, 62.04, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:32:04 pm', 'active'),
(55, 'Muhairwe Milton Twaza', 'Buyenje', 'Rubindi', '2019', 1, 16, 5, 4, 0, 0, 3.85, 61.54, 19.23, 15.38, 0, 0, 26, 100, 63.47, 'Grade three', 'Fair', '22-11-2019 05:34:28 pm', 'active'),
(56, 'Bwomi Joshua Agaba', 'Nyamiriro', 'Rubindi', '2019', 1, 15, 5, 8, 2, 0, 3.23, 48.39, 16.13, 25.81, 6.45, 0, 31, 100.01, 54.04, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:34:41 pm', 'active'),
(57, 'Asiimwe Specius', 'Karuhitsi', 'Rubindi', '2019', 1, 13, 6, 17, 2, 1, 2.5, 32.5, 15, 42.5, 5, 2.5, 40, 100, 45, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:35:19 pm', 'active'),
(58, 'bekyinga Asaph', 'Akarungu', 'Rubindi', '2019', 0, 1, 2, 4, 9, 1, 0, 5.88, 11.76, 23.53, 52.94, 5.88, 17, 99.99, 16.17, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:35:39 pm', 'active'),
(59, 'Ssali Abdul Kariim', 'Kariro Muslim', 'Rubindi', '2019', 0, 1, 2, 3, 9, 0, 0, 6.67, 13.33, 20, 60, 0, 15, 100, 16.67, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:35:57 pm', 'active'),
(60, 'Lwanga Narcis', 'Kyakataara', 'Rubindi', '2019', 0, 7, 5, 7, 0, 0, 0, 36.84, 26.32, 36.84, 0, 0, 19, 100, 50, 'Grade three', 'Fair', '22-11-2019 05:36:29 pm', 'active'),
(61, 'Mugerwa Prima', 'Rwamuhigi', 'Rubindi', '2019', 0, 9, 1, 3, 5, 0, 0, 50, 5.56, 16.67, 27.78, 0, 18, 100.01, 44.45, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:36:51 pm', 'active'),
(62, 'Bekunda George William', 'Rwembirizi', 'Rubindi', '2019', 0, 3, 3, 12, 1, 0, 0, 15.79, 15.79, 63.16, 5.26, 0, 19, 100, 35.53, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:37:31 pm', 'active'),
(63, 'Boona Mpumwire Edith', 'Kagongi I', 'Kagongi', '2019', 1, 21, 3, 0, 0, 0, 4, 84, 12, 0, 0, 0, 25, 100, 73, 'Grade three', 'Fair', '22-11-2019 05:38:07 pm', 'active'),
(64, 'Tumushabe Betyce', 'Katagyengyera', 'Kagongi', '2019', 0, 3, 2, 1, 9, 0, 0, 20, 13.33, 6.67, 60, 0, 15, 100, 23.33, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:39:29 pm', 'active'),
(65, 'Mwijuka Deuth', 'Rweshe', 'Kagongi', '2019', 2, 11, 8, 11, 2, 0, 5.88, 32.35, 23.53, 32.35, 5.88, 0, 34, 99.99, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:38:06 pm', 'active'),
(66, 'Kamayangi Angela', 'Kyarushanje', 'Kagongi', '2019', 0, 9, 2, 5, 2, 0, 0, 50, 11.11, 27.78, 11.11, 0, 18, 100, 50, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:40:28 pm', 'active'),
(67, 'Nyabwangu Jolly', 'Bwengure', 'Kagongi', '2019', 0, 8, 5, 6, 2, 0, 0, 38.1, 23.81, 28.57, 9.52, 0, 21, 100, 47.62, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:41:23 pm', 'active'),
(68, 'Mugume Ihinduza Abel', 'Nsiika', 'Kagongi', '2019', 0, 5, 7, 10, 8, 0, 0, 16.67, 23.33, 33.33, 26.67, 0, 30, 100, 32.5, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:41:29 pm', 'active'),
(69, 'Kamugisha Julius', 'Kibingo 111', 'Kagongi', '2019', 0, 10, 2, 4, 2, 0, 0, 55.56, 11.11, 22.22, 11.11, 0, 18, 100, 52.78, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:41:53 pm', 'active'),
(70, 'Nuwagaba Crescent', 'Munyonyi Mixed', 'Kagongi', '2019', 0, 3, 2, 3, 17, 0, 0, 12, 8, 12, 68, 0, 25, 100, 16, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:42:25 pm', 'active'),
(71, 'Tumubwine Patrick', 'Nyaminyobwa', 'Kagongi', '2019', 0, 2, 2, 3, 11, 0, 0, 11.11, 11.11, 16.67, 61.11, 0, 18, 100, 18.06, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:42:16 pm', 'active'),
(72, 'Rutafa James', 'Nyakabwera', 'Kagongi', '2019', 0, 6, 5, 12, 10, 0, 0, 18.18, 15.15, 36.36, 30.3, 0, 33, 99.99, 30.3, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:42:56 pm', 'active'),
(73, 'Mworozi Adrine', 'Rwamanuma', 'Kagongi', '2019', 0, 4, 3, 8, 5, 1, 0, 19.05, 14.29, 38.1, 23.81, 4.76, 21, 100.01, 30.96, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:43:04 pm', 'active'),
(74, 'Bainomugisha Alex', 'omukagyera', 'Kagongi', '2019', 0, 4, 7, 1, 3, 0, 0, 26.67, 46.67, 6.67, 20, 0, 15, 100.01, 45.01, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:44:01 pm', 'active'),
(75, 'Kekihembo Naome', 'Rugarura', 'Kashare', '2019', 0, 3, 3, 9, 7, 0, 0, 13.64, 13.64, 40.91, 31.82, 0, 22, 100.01, 27.28, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:46:03 pm', 'active'),
(76, 'Nankunda Zephrine', 'Nchune', 'Kashare', '2019', 0, 10, 4, 8, 3, 2, 0, 37.04, 14.81, 29.63, 11.11, 7.41, 27, 100, 42.59, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:46:47 pm', 'active'),
(77, 'kiconco Enid', 'Mirongo Central school', 'Kashare', '2019', 0, 7, 6, 10, 3, 0, 0, 26.92, 23.08, 38.46, 11.54, 0, 26, 100, 41.35, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:48:08 pm', 'active'),
(78, 'Namurebire Julius', 'Kitongore 11', 'Kashare', '2019', 0, 1, 0, 11, 0, 0, 0, 8.33, 0, 91.67, 0, 0, 12, 100, 29.17, 'Grade four', 'Poor', '22-11-2019 05:47:13 pm', 'active'),
(79, 'Mutungi Deus', 'Kyenshama', 'Kashare', '2019', 0, 6, 4, 4, 2, 0, 0, 37.5, 25, 25, 12.5, 0, 16, 100, 46.88, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:48:43 pm', 'active'),
(80, 'Asiimwe Herbert', 'Amabaare', 'Kashare', '2019', 0, 3, 3, 8, 3, 2, 0, 15.79, 15.79, 42.11, 15.79, 10.53, 19, 100.01, 30.27, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:49:26 pm', 'active'),
(81, 'Kaduya Halima', 'Nyamirima Moslem', 'Kashare', '2019', 0, 1, 1, 4, 4, 0, 0, 10, 10, 40, 40, 0, 10, 100, 22.5, 'Ungraded', 'Failed with Ungraded', '22-11-2019 05:49:25 pm', 'active'),
(82, 'Mugabo Dickson', 'Nombe', 'Kashare', '2019', 2, 26, 6, 3, 0, 0, 5.41, 70.27, 16.22, 8.11, 0, 0, 37, 100.01, 68.25, 'Grade three', 'Fair', '22-11-2019 05:50:08 pm', 'active'),
(83, 'Nuwagaba Apollo', 'Rwamukondo', 'Kashare', '2019', 1, 2, 4, 8, 2, 0, 5.88, 11.76, 23.53, 47.06, 11.76, 0, 17, 99.99, 38.23, 'Ungraded', 'Poor with Ungraded', '22-11-2019 05:50:44 pm', 'active'),
(84, 'Muhereza Vicent', 'Akabaare', 'Kashare', '2019', 3, 26, 6, 3, 0, 0, 7.89, 68.42, 15.79, 7.89, 0, 0, 38, 99.99, 69.07, 'Grade three', 'Fair', '22-11-2019 05:51:22 pm', 'active'),
(85, 'Boroba James', 'Rwobugoigo', 'Kashare', '2019', 3, 22, 3, 5, 1, 0, 8.82, 64.71, 8.82, 14.71, 2.94, 0, 34, 100, 65.44, 'Grade four', 'Fair with Ungraded', '22-11-2019 05:52:02 pm', 'active'),
(86, 'Mpongano Elly', 'omukabaare', 'Kashare', '2019', 2, 8, 4, 4, 0, 0, 11.11, 44.44, 22.22, 22.22, 0, 0, 18, 99.99, 61.11, 'Grade three', 'Fair', '22-11-2019 05:52:39 pm', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `shifted_status` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_logo` varchar(255) NOT NULL,
  `welcome_messege` text NOT NULL,
  `principle_image` text NOT NULL,
  `principle_message` text NOT NULL,
  `school_address` text NOT NULL,
  `school_phone` varchar(100) NOT NULL,
  `school_email` varchar(255) NOT NULL,
  `school_image` text NOT NULL,
  `school_about` text NOT NULL,
  `facebook_link` text NOT NULL,
  `youtube_link` text NOT NULL,
  `principle_sign` text NOT NULL,
  `register_sign` text NOT NULL,
  `additional_sign` text NOT NULL,
  `slider_image_1` text NOT NULL,
  `slider_image_2` text NOT NULL,
  `slider_image_3` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `shifted_status`, `school_name`, `school_logo`, `welcome_messege`, `principle_image`, `principle_message`, `school_address`, `school_phone`, `school_email`, `school_image`, `school_about`, `facebook_link`, `youtube_link`, `principle_sign`, `register_sign`, `additional_sign`, `slider_image_1`, `slider_image_2`, `slider_image_3`) VALUES
(1, 92, 'Polytechnic Institute Secondery School', 'upload/logo1_f79.jpg', 'Polytechnic Institute Secondary School, Kurigram. Patrick Henry Academy is committed to an environment where everyone is treated with dignity and respect. Explore our website and learn more about the school that we love so much! ', 'upload/images (26)_2ee.jpg', 'Dear Students, Staff and Parents:\r\n\r\nWelcome to the 2018-2019 school year! Our commitment at Polytechnic Institute Secondary School High School is to provide a safe and intellectually challenging environment that will empower students to become innovative thinkers, creative problem solvers and inspired learners prepared to thrive in the twenty-first century.\r\n\r\nHigh standards and expectations for each student in regard to academic performance, co-curricular participation, and responsible citizenship are the foundation of our school. It is with pride that we hold these high standards and ask each of our students to commit to maintaining the extraordinary record of achievement and contribution that has been the legacy of Weston High School students. It is the contribution of our students to our school community that makes Weston High School an exceptional learning community. Full participation in academic and co-curricular programs and a willingness to act responsibly as an individual within our educational environment are the factors that enable all to have a successful and enjoyable year.', 'Kurigram,sador-7665', '01857945632', 'principle@gmail.com', 'upload/maxresdefault_305.jpg', 'Our school is so beautiful  and environment is suitable for study.', 'http://bit.ly/2zB18lF', 'https://www.youtube.com/channel/UCHeq4DXU6Z3TLSfJD2tNhTg', 'upload/podarSign_843.png', 'upload/studentSign_ae3.png', 'upload/studentSign_d8d.png', 'upload/junior-school-slider-1_98d.jpg', 'upload/maxresdefaghjult_95a.jpg', 'upload/BodyImage-Farnboro-01_b08.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL,
  `staff_id` text CHARACTER SET latin1 NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`id`, `staff_id`, `attendance_date`) VALUES
(1, '203001,203002,203003,203004,203005,203006', '2018-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Sao Paulo', 1),
(2, 'Rio de Janeiro', 1),
(3, 'Ceara', 1),
(4, 'Santa Catarina', 1),
(5, 'Espirito Santo', 1),
(6, 'Beijing', 2),
(7, 'Hebei', 2),
(8, 'Jiangsu', 2),
(9, 'Guangdong', 2),
(10, 'Guangdong', 2),
(11, 'Ile-de-France', 3),
(12, 'Midi-Pyrenees', 3),
(13, 'Picardie', 3),
(14, 'Franche-Comte', 3),
(15, 'Alsace', 3),
(16, 'Haryana', 4),
(17, 'Andhra Pradesh', 4),
(18, 'Delhi', 4),
(19, 'Tamil Nadu', 4),
(20, 'Uttar Pradesh', 4),
(21, 'California', 5),
(22, 'Iowa', 5),
(23, 'New York', 5),
(24, 'New Jersey', 5),
(25, 'Massachusetts', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `Sub_Name` varchar(225) NOT NULL,
  `Sub_code` varchar(5) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'core',
  `active` varchar(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `Sub_Name`, `Sub_code`, `status`, `active`) VALUES
(1, 'English', '1001', 'core', '1'),
(2, 'Math', '1002', 'core', '1'),
(3, 'Science', '1003', 'core', '1'),
(4, 'Social Studies', '1004', 'core', '1'),
(5, 'Physical Education', '1005', 'core', '1'),
(6, 'Runyankole', '1006', 'core', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_county_mock_results`
--

CREATE TABLE `sub_county_mock_results` (
  `id` int(11) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `div_1` int(11) NOT NULL,
  `div_2` int(11) NOT NULL,
  `div_3` int(11) NOT NULL,
  `div_4` int(11) NOT NULL,
  `div_u` int(11) NOT NULL,
  `div_x` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `p_div_1` float NOT NULL,
  `year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_county_mock_results`
--

INSERT INTO `sub_county_mock_results` (`id`, `sub_county`, `div_1`, `div_2`, `div_3`, `div_4`, `div_u`, `div_x`, `total`, `p_div_1`, `year`) VALUES
(1, 'Bubaare', 12, 96, 65, 78, 17, 4, 272, 4.41, '2019'),
(2, 'Rubaya', 11, 101, 30, 108, 43, 6, 299, 3.68, '2019'),
(3, 'Rwanyamahembe', 36, 136, 51, 71, 34, 8, 336, 10.71, '2019'),
(4, 'Kashare', 63, 144, 59, 88, 27, 4, 385, 16.36, '2019'),
(5, 'Bukiro', 10, 72, 36, 74, 34, 3, 229, 4.37, '2019'),
(6, 'Rubindi', 24, 144, 52, 74, 31, 3, 328, 7.32, '2019'),
(7, 'Kagongi', 3, 86, 48, 64, 71, 1, 273, 1.1, '2019');

-- --------------------------------------------------------

--
-- Table structure for table `sub_county_results`
--

CREATE TABLE `sub_county_results` (
  `id` int(11) NOT NULL,
  `sub_county` varchar(50) NOT NULL,
  `div_1` int(11) NOT NULL,
  `div_2` int(11) NOT NULL,
  `div_3` int(11) NOT NULL,
  `div_4` int(11) NOT NULL,
  `div_u` int(11) NOT NULL,
  `div_x` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `p_div_1` float NOT NULL,
  `year` varchar(50) NOT NULL,
  `pat_total` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_county_results`
--

INSERT INTO `sub_county_results` (`id`, `sub_county`, `div_1`, `div_2`, `div_3`, `div_4`, `div_u`, `div_x`, `total`, `p_div_1`, `year`, `pat_total`) VALUES
(1, 'Bubaare', 62, 255, 64, 22, 12, 8, 423, 14.94, '2015', NULL),
(2, 'Rubaya', 15, 175, 91, 31, 9, 7, 328, 4.57, '2015', NULL),
(3, 'Rwanyamahembe', 76, 374, 83, 22, 9, 14, 578, 13.15, '2015', NULL),
(4, 'Bukiro', 11, 158, 67, 11, 2, 10, 259, 4.25, '2015', NULL),
(5, 'Rubindi', 108, 327, 79, 40, 17, 15, 586, 18.43, '2015', NULL),
(6, 'Kagongi', 46, 227, 101, 31, 24, 12, 441, 10.43, '2015', NULL),
(7, 'Kashare', 132, 268, 102, 32, 13, 32, 579, 22.8, '2015', NULL),
(8, 'Bubaare', 99, 244, 63, 13, 5, 13, 437, 22.65, '2016', NULL),
(9, 'Rubaya', 39, 191, 54, 31, 26, 10, 351, 11.11, '2016', NULL),
(10, 'Rwanyamahembe', 131, 332, 88, 42, 8, 9, 610, 21.48, '2016', NULL),
(11, 'Bukiro', 26, 150, 52, 17, 3, 6, 254, 10.24, '2016', NULL),
(12, 'Rubindi', 134, 253, 62, 33, 25, 14, 521, 25.72, '2016', NULL),
(13, 'Kagongi', 68, 231, 104, 53, 34, 12, 502, 13.55, '2016', NULL),
(14, 'Kashare', 143, 296, 73, 33, 17, 7, 569, 25.13, '2016', NULL),
(15, 'Bubaare', 76, 294, 57, 14, 5, 5, 451, 16.85, '2017', NULL),
(16, 'Rubaya', 19, 238, 46, 22, 2, 7, 334, 5.69, '2017', NULL),
(17, 'Rwanyamahembe', 78, 381, 53, 14, 9, 9, 554, 14.08, '2017', NULL),
(19, 'Bukiro', 14, 181, 41, 22, 3, 14, 275, 5.09, '2017', NULL),
(20, 'Rubindi', 133, 265, 55, 16, 10, 9, 488, 27.25, '2017', NULL),
(21, 'Kagongi', 32, 262, 77, 45, 17, 8, 441, 7.26, '2017', NULL),
(22, 'Kashare', 115, 350, 90, 32, 12, 8, 607, 18.95, '2017', NULL),
(23, 'Rwanyamahembe', 107, 363, 94, 32, 14, 5, 615, 17.4, '2018', NULL),
(24, 'Rubindi', 196, 260, 63, 26, 1, 10, 556, 35.25, '2018', NULL),
(25, 'Bubaare', 74, 290, 79, 32, 6, 6, 487, 15.2, '2018', NULL),
(26, 'Rubaya', 32, 247, 85, 30, 6, 5, 405, 7.9, '2018', NULL),
(27, 'Bukiro', 21, 205, 38, 21, 3, 6, 294, 7.14, '2018', NULL),
(28, 'Kagongi', 63, 229, 85, 46, 13, 8, 444, 14.19, '2018', NULL),
(29, 'Kashare', 145, 336, 122, 47, 10, 9, 669, 21.67, '2018', NULL),
(31, 'Rwanyamahembe', 42, 160, 22, 6, 3, 4, 237, 18.03, '2019', '233');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ivan36', 'ivanmata@gmail.com', 'Ivanmata36'),
(2, 'Admin', 'admin@admin.com', 'Admin@super'),
(3, 'Daphine', 'daphine@gmail.com', '123456'),
(4, 'Ronald', 'rtushabe10@gmail.com', 'ron');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_grades`
--

CREATE TABLE `teacher_grades` (
  `id` int(11) NOT NULL,
  `school_name` varchar(225) NOT NULL,
  `teacher_name` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `class` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `g_1` int(11) NOT NULL,
  `g_2` int(11) NOT NULL,
  `g_3` int(11) NOT NULL,
  `g_4` int(11) NOT NULL,
  `g_u` int(11) NOT NULL,
  `g_x` int(11) NOT NULL,
  `p_1` float NOT NULL,
  `p_2` float NOT NULL,
  `p_3` float NOT NULL,
  `p_4` float NOT NULL,
  `p_u` float NOT NULL,
  `p_x` float NOT NULL,
  `g_total` int(11) NOT NULL,
  `p_total` float NOT NULL,
  `p_actual` float NOT NULL,
  `grade` varchar(25) NOT NULL,
  `remarks` varchar(25) NOT NULL,
  `report_date` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `total_hteachers`
--

CREATE TABLE `total_hteachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `level` varchar(50) NOT NULL DEFAULT 'Primary School',
  `password` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '123456',
  `type` varchar(25) NOT NULL DEFAULT 'teacher',
  `has_sch` varchar(25) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_hteachers`
--

INSERT INTO `total_hteachers` (`id`, `teacher_name`, `gender`, `image`, `birth_date`, `mobile`, `email`, `address`, `national_id`, `education`, `designation`, `level`, `password`, `type`, `has_sch`) VALUES
(102021, 'Byarugaba Vicent Mukwate', 'Male', 'upload/68ebe16749c2820d4cfc1cea4d2c28.jpg', '1980-02-17', '0752402273', 'vmbyarugaba@gmail.com', 'Not Known, kakoba, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102020, 'Kiconco Betty', 'Female', 'upload/be4fc011d6144d08c45b7042dfbb54.jpg', '1982-02-11', '0773981263', 'bkiconco@gmail.com', 'muko, kakoba, Bubaare, Mbarara', 'JUT53VR55KP', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102019, 'Bamuhimbise Wilson', 'Male', 'upload/eaf0092420083998358e668381bc31.jpg', '1980-03-02', '0752809758', 'bwilson@gmail.com', 'kako,  nyakayojo,  nyarubungo,  Mbarara', 'DFFRRGGT12', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102018, 'Asiimwe Patrick', 'Male', 'upload/5ca3329aad8e97bdb5c0c392a913c5.jpg', '1981-03-03', '0782311763', 'pasiimwe@gmail.com', 'muko, kakoba, Bubaare, Mbarara', 'WERR43433RDD', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102011, 'Nuwagira Robert', 'Male', 'upload/4f77ec4b3a22c71ca5a1db912688e7.jpg', '1990-11-08', '0775690394', 'robert12@gmail.com', 'Muko, Bunenero,   Rubaya,   Mbarara', 'GUR21TD7543T5TY', 'BCE Arts with Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102012, 'Kasigaire Benon', 'Male', 'upload/c63b17a795aa411e0b57fb9e95d555.jpg', '1990-11-13', '075238547002', 'benonkasigaire@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'GUR21TD7543T5TY', 'Diploma  Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102013, 'Dissi Livingston', 'Male', 'upload/50471bea9f261aedaeaf9a3171699d.jpg', '1990-11-21', '0772925490', 'disiilivingston@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'YURTRYT5654873', 'Diploma  in Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102014, 'Kokunda Lydia', 'Female', 'upload/0f29c0e5f4d623b919432a3238c202.png', '2019-11-01', '0756254775', 'lydia@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'YURYKMJJT5654873', 'Diploma  in Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102015, 'Bitekyerezo Julius', 'Male', 'upload/8a13fa10e93e96573f6f9a491f7c48.jpg', '1983-11-23', '0775954775', 'juluis@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'GUR21TD7543T5TY', 'BCE Arts with Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102016, 'Atukunda Agnes', 'Female', 'upload/d9af57d5f23f0761d4fbdb77736de2.png', '2019-11-12', '0789251275', 'ag@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'YURTYTDF543T56', 'Diploma  in Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102017, 'Kamuhangire Elias', 'Male', 'upload/e44124e94b08acad49121fcd4126f5.jpg', '1981-05-01', '0719254715', 'elias@gmail.com', 'Muko, Rwebishekye, Rubaya, Mbarara', 'YURTYTDF543T56', 'Diploma  in Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102022, 'Kobuyonjo Juliet', 'Female', 'upload/18218432104d0669580dd92c30c90a.png', '1880-02-17', '0778964538', 'kjuliet@gmail.com', 'Not Known, Kashare, nyarubungo, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'kakyeka', 'Primary School', '123456', 'hteacher', 'yes'),
(102023, 'Mugume Wilson', 'Male', 'upload/b0c4f922ccd6232bc0d1d6ee7678b5.jpg', '1880-02-17', '0752935449', 'wmugume@gmail.com', 'Not Known, kakoba, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102024, 'Muhwezi Deo', 'Male', 'upload/22c63394bb31fce99d06b5d379a831.jpg', '1980-02-17', '0782272847', 'mdeo@gmail.com', 'Not Known, kakoba, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102025, 'Kwesiga Erastus', 'Male', 'upload/5ac652553ff106a08cfaba4c5c1cbb.jpg', '1880-02-17', '0782474306', 'ekwesiga@gmail.com', 'Not Known, kakoba, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102026, 'Kamuhangire Elias', 'Male', 'upload/fd391442d7d005deaa01c1bce98886.jpg', '1880-02-17', '0753663276', 'kelias@gmail.com', 'Not Known, kakoba, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102027, 'Ainomugisha Costance', 'Female', 'upload/64eb07dd959e1e8d6bcc67eea22ce5.jpg', '1880-02-17', '0752557104', 'cainomugisha@gmail.com', 'Not Known, kakoba, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102028, 'Muhumuza Jotham', 'Male', 'upload/02faf99c972766afcde163077aa291.jpg', '1880-02-17', '0776651072', 'mjotham@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102029, 'Abenawe Chris Katty', 'Female', 'upload/9f9637c34c20daf408c3636549ce6b.jpg', '1880-02-17', '0782813126', 'kcabenawe@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102030, 'Basiima Obeb', 'Male', 'upload/a6008e2f414486c1600d8293a8ccd8.jpg', '1880-02-17', '0772389176', 'bobed@gmail.com', 'Not Known, nyakayojo, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102031, 'Mulindwa Umar', 'Male', 'upload/0c84c3e1ebb19ea6d359722d87747a.jpg', '1880-02-17', '0781486483', 'umulindwa@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102032, 'Muraarira Kandiho Sam', 'Male', 'upload/d6acdc319757d38c8e191f60003ea2.jpg', '1880-02-17', '0702825956', 'msam@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102033, 'Atwiine Edridah Mugizi', 'Female', 'upload/726c3785b109216ed0a21e95bcfe8c.jpg', '1880-02-17', '0772844045', 'meadridah2gmail.com', 'Not Known,    kakoba,    Rwanyamahembe,    Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102034, 'Twesigye Enid', 'Female', 'upload/e4c8e37c01b6acdfeba7ab2d5f6200.png', '1880-02-17', '0772354775', 'tenid@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102035, 'Katugwensi Flora Barigye', 'Female', 'upload/fb70c2ce920529e97ca11fe72c78a5.png', '1880-02-17', '0701300721', 'kflora@gmail.com', 'Not Known, nyakayojo, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102036, 'Mujuzi Grace', 'Female', 'upload/cd4e7b2b693064793e5413cdb5fd34.jpg', '1880-02-17', '0788380715', 'gmujuzi@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102037, 'Tumuhairwe Asaph', 'Male', 'upload/40905c3f3e9d810d178c913cd5bc62.jpg', '1880-02-17', '0773099501', 'atumuhairwe@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102038, 'Atiisa Milton', 'Male', 'upload/4011ad9cfe2eafe43cd7b28a087d57.jpg', '1880-02-17', '0782126019', 'amilton@gmail.com', 'Not Known, nyakayojo, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102039, 'Mateeka Geoffrey', 'Male', 'upload/92f9e90421a9b7384a5377a1dbe972.jpg', '1880-02-17', '0782571847', 'gmateeka@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102040, 'Kyoshaba Justine', 'Female', 'upload/98e6ed86f65d6bcf533587b34cc46e.jpg', '1880-02-17', '0772450159', 'jkyoshaba@gmail.com', 'Not Known, kakoba, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102041, 'Ngabirano Jones', 'Male', 'upload/572fcb9702f75e010e0fd8e7fb1b78.jpg', '1880-02-17', '0772181480', 'njones@gmail.com', 'Not Known, nyakayojo, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102042, 'Mujuni Naboth', 'Male', 'upload/9894d153cba1e8c70fa0bf7abac463.jpg', '1880-02-17', '0701878910', 'mnaboth@gmail.com', 'Not Known, kakoba, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102043, 'Kabigumira Vencious', 'Male', 'upload/6bca8d92862ec22d06408be2fae889.jpg', '1880-02-17', '0772312054', 'vkabigumira@gmail.com', 'Not Known, Katyazo, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102044, 'muhumuza Richard', 'Male', 'upload/8ad6338f2a0eee536279e88bdb5e59.jpg', '1880-02-17', '0752448481', 'mrichard@gmail.com', 'Not Known, Rushozi, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102045, 'Rwakaningi Denis', 'Male', 'upload/818abce17e80a8c28d49603aa3a00c.jpg', '1880-02-17', '0782046285', 'rdenis@gmail.com', 'Not Known, Bukiro, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102046, 'Abesiga Vivian', 'Female', 'upload/891afff78590080acc300b875054af.jpg', '1880-02-17', '0772190250', 'vabesiga@gmail.com', 'Not Known, Ruti, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102047, 'Ahumuza Ruth', 'Female', 'upload/45547a4f7b430dc7ad5c75cc1fdcde.png', '1880-02-17', '0780901577', 'aruth@gmail.com', 'Not Known, Bukiro, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102048, 'Mugume Jonas', 'Male', 'upload/329c4af5368c978b677a89e8231f1e.jpg', '1880-02-17', '0782333799', 'jmugume@gmail.com', 'Not Known, Katyazo, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102049, 'Mbakiza Joseph', 'Male', 'upload/1fc30689561599994c5c214ebcfc7c.jpg', '1880-02-17', '0784822537', 'mjoseph@gmail.com', 'Not Known, Bukiro, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102050, 'Tukahirwa Jovia', 'Female', 'upload/4c3cbb237939050d046399a583380e.jpg', '1880-02-17', '0772317789', 'jtukahirwa@gmail.com', 'Not Known, Kakyerere, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102051, 'bekyinga Asaph', 'Male', 'upload/970908bfdc0cdc56bd50e65c7f4662.jpg', '1880-02-17', '0752480426', 'basaph@gmail.com', 'Not Known, Kakyerere, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102052, 'Bwomi Joshua Agaba', 'Male', 'upload/7542b398cd0b3f4214cbcea399143a.jpg', '1880-02-17', '0782940470', 'jbwomi@gmail.com', 'Not Known, Rutooma, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102053, 'Muhairwe Milton Twaza', 'Male', 'upload/a7fc3f43bcf1e214e3f79129b6c255.jpg', '1880-02-17', '0772316292', 'mtwazagmail.com', 'Not Known, Kakoba, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102054, 'Mugarura Robert', 'Male', 'upload/6c0abb609b5cd35fe42bad33ba0040.jpg', '1880-02-17', '0772933940', 'rmugarura', 'Not Known, Nyamityobora, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102055, 'Nyabwangu Jolly', 'Female', 'upload/184adcd5e6c56ac457e842f3523746.png', '1880-02-17', '0772935354', 'njolly@gmail.com', 'Not Known, Rwanyena, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102056, 'Barigye Cyprus', 'Male', 'upload/b1b501fd00aade8f09b0044b1ac44a.jpg', '1880-02-17', '0772834133', 'bcyprus@gmail.com', 'Not Known, Rwebishekye, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102057, 'Mwebesa Deo', 'Male', 'upload/61912efcb5b87c60dfb5ea059210e7.jpg', '1880-02-17', '0782191099', 'dmwebesa@gmail.com', 'Not Known, Ruti, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102058, 'Boona Mpumwire Edith', 'Female', 'upload/3c3c6af11d025ca2b773a86f849328.png', '1880-02-17', '0755547183', 'bedith@gmail.com', 'Not Known, Bunenero, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102059, 'Kiiza Dominic', 'Male', 'upload/9054343cdae3c595a980a09ceff870.jpg', '1880-02-17', '0783687620', 'dkiiza@gmail.com', 'Not Known, Ruharo, Bukiro, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102060, 'Tumushabe Betyce', 'Female', 'upload/db70a343987badae43106a8c757641.png', '1880-02-17', '0702634912', 'btushabe@gmail.com', 'Not Known, Kahungye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102061, 'Mugerwa Prima', 'Male', 'upload/708ec7a7c9b30206d038a2f97f92af.jpg', '1880-02-17', '0772367276', 'pmugerwa@gmail.com', 'Not Known, Ruharo, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102062, 'Ssali Abdul Kariim', 'Male', 'upload/989b0becff11723349be6a47a6e5ab.jpg', '1880-02-17', '0702848424', 'skariim@gmail.com', 'Not Known, Nyamityobora, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102063, 'Bekunda George William', 'Male', 'upload/63f21e4112fbc9d4072ae6c059f886.jpg', '1880-02-17', '0772547174', 'gwbekunda@gmail.com', 'Not Known, Ruti, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102064, 'Asiimwe Specius', 'Female', 'upload/5397ad430f91c402bde7a7960b9326.png', '1880-02-17', '0778740539', 'aspecius', 'Not Known, Rwebishekye, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102065, 'Lwanga Narcis', 'Male', 'upload/45007b63a71a59cc5782b9aa4f3406.jpg', '1880-02-17', '0775621716', 'lnarcis', 'Not Known, Rwebishekye, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102066, 'Muhereza Vicent', 'Male', 'upload/a8617b380c572737c11d5616062b33.jpg', '1880-02-17', '0782709643', 'vmuhereza@gmail.com', 'Not Known, Ruharo, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102067, 'Kamugisha Julius', 'Male', 'upload/d03da0ac914dfd635b940d581e72fa.jpg', '1880-02-17', '0783352665', 'jkamugisha', 'Not Known, Kahungye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102068, 'Tumubwine Patrick', 'Male', 'upload/921e043ed07156b0a70b82497a2afe.jpg', '1880-02-17', '0705063523', 'tpatrick@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102069, 'Kamayangi Angela', 'Female', 'upload/e94330377aaad0c7bd60f3ade03cec.jpg', '1880-02-17', '0772992482', 'akamayangi@gmail.com', 'Not Known, Bunenero, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102070, 'Asiimwe Herbert', 'Male', 'upload/58f3c6aa48309ba3e3028512a1e9e7.jpg', '1880-02-17', '0782604344', 'rasiimwe@gmail.com', 'Not Known,  Rwebishekye,  Kashare,  Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102071, 'Bainomugisha Alex', 'Male', 'upload/2666bf5ac50ae815492fff609e5671.jpg', '1880-02-17', '0789008305', 'balex@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102072, 'Nuwagaba Crescent', 'Male', 'upload/d7fc4711f4f2551d3a5887facc9951.jpg', '1880-02-17', '0772528821', 'cnuwagaba@gmail.com', 'Not Known, Kahungye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102073, 'Mworozi Adrine', 'Female', 'upload/0574e2013c6b569edf7a100f896baf.png', '1880-02-17', '0706640107', 'madrine@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102074, 'Mwijuka Deuth', 'Male', 'upload/95c14037ed088e7a890d5b50c15855.jpg', '1880-02-17', '0772389228', 'mdeuth@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102075, 'Namurebire Julius', 'Male', 'upload/13e4780b137b51efe906093b33950f.jpg', '1880-02-17', '078543894', 'jnamurebire', 'Not Known, Ruti, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102076, 'Mugume Ihinduza Abel', 'Male', 'upload/7797ad95e8e5e53db89873070bb3fa.jpg', '1880-02-17', '0782457344', 'amgumei@gmail.com', 'Not Known, Kahungye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102077, 'kiconco Enid', 'Female', 'upload/62d03f2c24b0d0101c82db29575678.png', '1880-02-17', '0777596208', 'kenid@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102078, 'Mutungi Deus', 'Male', 'upload/719ff08f5ee9c67354a81c47b305b7.jpg', '1880-02-17', '0782840585', 'dmutungi@gmail.com', 'Not Known, Ruharo, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102079, 'Rutafa James', 'Male', 'upload/3cfd0927d9dcc7bcc40c81b4fd8a26.jpg', '1880-02-17', '0772615389', 'rutafajames@gmail.com', 'Not Known, Ruhunga, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102080, 'Nankunda Zephrine', 'Female', 'upload/c53cd16091c36eb1e76a67c2f46cc2.png', '1880-02-17', '0782468008', 'nzephrine@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102081, 'Kaduya Halima', 'Female', 'upload/5408e418c7872aa5a9b7393dd22de0.jpg', '1880-02-17', '0755983833', 'hkaduya@gmail.com', 'Not Known, Rutooma, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102082, 'Mugabo Dickson', 'Male', 'upload/7d75e7cade0a5af5d79bc5c16ee319.jpg', '1880-02-17', '0757024288', 'mdickson@gmail.com', 'Not Known, Rwebishekye, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102083, 'Namara Jane', 'Female', 'upload/d6d6b8597adae57ed6be6d37340fa3.jpg', '1880-02-17', '0776209193', 'namarajane@gmail.com', 'Not Known, Kakyerere, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102084, 'Mpongano Elly', 'Male', 'upload/3c6f960736301e7581337cfcb81b1d.jpg', '1880-02-17', '0772412168', 'empongano@gmail.com', 'Not Known, Ruti, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102085, 'Boroba James', 'Male', 'upload/a9b8433d35a256355c0262c6ae2fcd.jpg', '1880-02-17', '0772968601', 'borobajames@gmail.com', 'Not Known, Bunenero, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102086, 'Kaduyu Halima', 'Female', 'upload/256a56bf97c289640d526a62682d31.png', '1880-02-17', '0776983833', 'khalima@gmail.com', 'Not Known, Rwebishekye, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102087, 'Nambale Richards M ', 'Male', 'upload/d1acf15bbf694bf470566dcba39f69.jpg', '1880-02-17', '0755015407', 'mrnambale', 'Not Known, Ruharo, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102088, 'Atusiime Jane', 'Female', 'upload/52866f38005fa58ddafc7589199c4e.jpg', '1880-02-17', '0782191047', 'jatusiime@gmail.com', 'Not Known, Kahungye, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102089, 'Kekihembo Naome', 'Female', 'upload/7c941941672b72b5679d947c87895c.jpg', '1880-02-17', '0752387070', 'nkekihembo', 'Not Known, Ruti, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102090, 'Nuwagaba Apollo', 'Male', 'upload/ed847defa4538a25f237f3cc3395c0.jpg', '1880-02-17', '0758219110', 'napollo1@gmail.com', 'Not Known, Kakoba, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102091, 'Musinguzi Gidion', 'Male', 'upload/5ef50be92c896eb060d0b73125fe86.jpg', '1880-02-17', '0703032742', 'mgidion@gmail.com', 'Not Known, Nyamityobora, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102092, 'Bainomukama Gerald', 'Male', 'upload/1fec449cc4390b8b2eab484be6dcb8.jpg', '1880-02-17', '0772869613', 'bgerald22@gmail.com', 'Not Known, Bunenero, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102093, 'Mutabazi Edson', 'Male', 'upload/1afc84f946120107e89102256d430f.jpg', '1880-02-17', '0772931672', 'emutabaazi@gmail.com', 'Not Known, Ruharo, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102094, 'Mwebaze Methodius', 'Male', 'upload/b633a72f7d97d346110bd9cb0d3db4.jpg', '1880-02-17', 'o782198392', 'mmethodius@gmail.com', 'Not Known, Bunenero, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102095, 'Kyokunda Lydia Kalongo', 'Female', 'upload/7ac655f312f204a24cfa791b24ad01.jpg', '1880-02-17', '0774115559', 'lkyokunda@gmail.com', 'Not Known, Bukiro, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102096, 'Karuhanga Piason', 'Male', 'upload/374144ea5823b2c62452d7af4f073b.jpg', '1880-02-17', '0782314451', 'kpiason@gmail.com', 'Not Known, Bukiro, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102097, 'Twinamatsiko Yoab Magara', 'Male', 'upload/f19aa0e38ea1133c84ede1fbd4fd14.jpg', '1880-02-10', '0772896466', 'yoabmagara@gmail.com', 'Not Known, Kakyerere, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102098, 'Nankunda Richard', 'Male', 'upload/67bd09b65a3d970cc71fd8dd2b7226.jpg', '1880-02-17', '0776656764', 'nankundarichard@gmail.com', 'Not Known, Bunenero, Biharwe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102099, 'Mujuni Grace', 'Male', 'upload/98bd9c58daca433639d9d132b3b81a.jpg', '1880-02-17', '0788380715', 'gracemujuni@gmail.com', 'Not Known, Bunenero, Kamikuzi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'no'),
(102100, 'Kamugisha Elia', 'Male', 'upload/b8b43a02530d1d3a3347db74117c78.jpg', '1880-02-17', '0789254216', 'kamugishaelia@gmail.com', 'Not Known, Bukiro, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102101, 'Anita Ainembabazi', 'Female', 'upload/47f779ca95291df713797007b438d2.png', '1880-02-17', '0752378651', 'anitaainembabazi', 'Not Known, Mabira, Bubaare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102102, 'Modern h/t', 'Male', 'upload/f4ee4e67a87a7973aca45bafa87518.jpg', '1880-02-17', '07973763883', 'modernht@gmail.com', 'Not Known, Kahungye, Rubaya, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102103, 'Akandwanaho Ezekiel', 'Male', 'upload/c0a15ad32b9bb62074e00bcb1c2c8b.jpg', '1880-02-17', '07125326654', 'akandanahoe@yahoo.com', 'Not Known, Mabira, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102104, 'Kansiime Anold', 'Male', 'upload/923820e8cf033cb36ed9f3d5b073ee.jpg', '1880-02-17', '07586763556', 'kansimeanold@gmail.com', 'Not Known, Rutooma, Rwanyamahembe, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102105, 'Bamwesigye Asaph', 'Male', 'upload/5bb40d088fe61213bffff77c1805e1.jpg', '1880-02-17', '0789540986', 'naasaph@yahoo.com', 'Not Known, Kitooma, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102106, 'Magezi Patrick', 'Male', 'upload/dc9b3e364fff10ec986bc547ceb9c8.jpg', '1880-02-17', '07825471934', 'magezip@yahoo.com', 'Not Known, Katyazo, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102107, 'Amutuhaire Grace', 'Male', 'upload/67b9aca5e259466640401cd3e86b02.jpg', '1880-02-17', '0775456433', 'amutuhaire@yahoo.com', 'Not Known, Katyazo, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102108, 'Sande Ainamani', 'Male', 'upload/1a703d0bd9db5a9cf04d4bd7f9065b.jpg', '1880-02-17', '07757365278', 'ainamanis@gmail.com', 'Not Known, Bunenero, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102109, 'Mugarura Keneth', 'Male', 'upload/7589a4f2fbf440cd43939ec220c0eb.jpg', '1880-02-17', '07974555376', 'kenthm@yahoo.com', 'Not Known, Kakyerere, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102110, 'Abaasa Agnes', 'Female', 'upload/a52d68567f4482bdf42548fbbda74f.png', '1880-02-17', '0777676446', 'ag63@gmail.com', 'Not Known, Kakyerere, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102111, 'Mpirirwe Edith', 'Female', 'upload/2827dcc201251f697aaae8c0f8dcb7.png', '1880-02-17', '07895472543', 'edmpirirwe@gmail.com', 'Not Known, Kakyerere, Kashare, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102112, 'Amos Ashaba', 'Male', 'upload/9159f22d1e90acedb10fecdd828b5f.jpg', '1880-02-17', '0718566395', 'amoaashaba@gmail.com', 'Not Known, Kakyerere, Rubindi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102113, 'Muhumsa Ephraim', 'Male', 'upload/8c336eff6f56e2b0107bda831aea58.jpg', '1880-02-17', '077654233', 'muhumuza@gmail.com', 'Not Known, Kakyerere, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes'),
(102114, 'Kamuntu Joseph', 'Male', 'upload/455d7ad873f22c206f7066cae5f3e7.jpg', '1880-02-17', '07054673547', 'kamuntujose@yahoo.com', 'Not Known, Bunenero, Kagongi, Mbarara', 'RTN39DT9SA12IL', 'Primary Education', 'Head Teacher', 'Primary School', '123456', 'hteacher', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `total_staff`
--

CREATE TABLE `total_staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `gender` varchar(255) CHARACTER SET latin1 NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_staff`
--

INSERT INTO `total_staff` (`id`, `staff_name`, `father_name`, `mother_name`, `gender`, `image`, `birth_date`, `mobile`, `email`, `address`, `national_id`, `education`, `designation`) VALUES
(203001, 'Akhi Akter ', 'Mr Joseph Doe', 'Loren Doe', 'Female', 'upload/33a5574ca9fd96fbbae8f6c42f72fc.jpg', '2018-11-07', '01445121545', 'akiakter45454@gmail.com', 'kurigram, Najira ,  kurigram,    kurigram', '789678345435656', 'J.S.C', 'Cooker'),
(203002, 'Najmul Hasan', 'Nahid Hasan', 'Momota Begum', 'Male', 'upload/261212310e53def72592960cd2a75f.jpg', '1995-11-16', '01885326981', 'najmul@gmail.com', 'kurigram, kurigram, kurigram, kurigram', '123456987321', 'S.S.S', 'Pion'),
(203003, 'Jahid Hasan', 'Md Pikul Islam', 'Most Mina Begum', 'Male', 'upload/38ad2626a2a43bb95d6f0b71bec450.jpg', '1997-11-13', '01785326903', 'jahid566@gmail.com', 'kurigram,Najira , kurigram, kurigram, kurigram', '123654123667', 'J.S.C', 'Sweeper'),
(203004, 'Most Momena Begum', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/13eb158378ee8675a0eefa7ee2dd72.png', '1990-11-08', '01730233033', 'momena@gmail.com', 'Nagira,Munsipara, kurigram, Kurigram, Kurigram', '12324343455454475489', 'HSC', 'Peon'),
(203005, 'Md Kamal Hossain', 'Md Jamal Ahmed', 'Most Momana Begum', 'Male', 'upload/ba04f414ab469ba1ec43f6a70fa88e.png', '1990-11-08', '01730233030', 'momena@gmail.com', 'Nagira,Munsipara, kurigram, Kurigram, Kurigram', '12324343455454475489', 'HSC', 'Peon'),
(203006, 'Mac Van me', 'Dafine', 'Grace RRR', 'Male', 'upload/b8ac1a747cf61b32413c0d5bf57bc9.jpg', '2008-10-15', '0789254775', 'amanyaivan36@gmail.com', 'Van, jjsjs, Kashari, Mbarara', 'YURTRYT5654873', 'BCE', 'Kampala');

-- --------------------------------------------------------

--
-- Table structure for table `total_teachers`
--

CREATE TABLE `total_teachers` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birth_date` date NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` text NOT NULL,
  `national_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `education` text NOT NULL,
  `designation` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '123456',
  `type` varchar(25) NOT NULL DEFAULT 'teacher',
  `category` varchar(25) NOT NULL,
  `has_sch` varchar(25) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_teachers`
--

INSERT INTO `total_teachers` (`id`, `teacher_name`, `gender`, `image`, `birth_date`, `mobile`, `email`, `address`, `national_id`, `education`, `designation`, `password`, `type`, `category`, `has_sch`) VALUES
(102021, 'Mwine Ronald', 'male', 'upload/42e8ca94c2de457440a7a1363abf05.png', '1982-08-12', '0779001818', 'mwineronald0006@gmail.com', 'not Known, Mabira, Bubaare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102020, 'Muhwezi Deo', 'male', 'upload/555d72c8bc4272f43212d03009be1b.png', '1982-08-12', '0782272847', 'muhwezideo@yahoo.com', 'not Known, Mabira, Bubaare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'yes'),
(102019, 'Atuhaire charity ', 'female', 'upload/59b4dabe13a1cca4dfef7df349787e.png', '1982-08-12', '0755620125', 'atuhairecharity424@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102018, 'Atwine angella', 'female', 'upload/9262bff8012ad68cacd91e78b43017.png', '1982-08-12', '0773604504', 'angelaatwiine@gmail.com.', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102017, 'Kyokusiima Justine', 'Female', 'upload/1cb091440e059e3da4564fba90e263.png', '1982-08-12', '075955406', 'justinekyokusiima@gmail.com.', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102016, 'Najuna Anet Mukiga', 'Female', 'upload/a1379ae311a6a36994562131557b01.png', '1982-08-12', '0776900657', 'najunaanet@gmail.com.', 'not Known,  Mirongo,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102022, 'Natuha Modest', 'male', 'upload/35941223e919c4b98767a884c9cc80.png', '1982-08-12', '0781555747', 'natuhamo4@gmail.com', 'not Known, Mabira, Bubaare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102023, 'Tumuhairwe Beneth', 'female', 'upload/5a8927c209b9b487d7ae3e08eef471.png', '1982-08-12', '0756147007', 'na@na', 'not Known, Mabira, Bubaare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102024, 'Kabigarire Christine', 'female', 'upload/5485fad4d434a904018fd6f8db8edc.png', '1982-08-12', '0776212121', 'kabagairechristine@gmail.com', 'not Known, Mabira, Bubaare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102025, 'Abesigye Patrick', 'Male', 'upload/6412097a85ab5c13af20e97444b256.jpg', '1982-08-12', '0775153062', 'abesigyepatrick@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant 11', '123456', 'teacher', 'gorvernment', 'no'),
(102026, 'Kabaramagye Agnes', 'Female', 'upload/1e0c2e0134c5c03dd72325d91ac094.png', '1982-08-12', '0779115553', 'kabaramagyeagnes@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant 11', '123456', 'teacher', 'gorvernment', 'no'),
(102027, 'Komuruka Dianah', 'Female', 'upload/a3822667628d9f577f7122bf1de856.png', '1982-08-12', '0788530490', 'komurukadianah@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant 11', '123456', 'teacher', 'gorvernment', 'no'),
(102028, 'Nshekanabo Tumuhaise Jonathan', 'male', 'upload/48415e84804f9f01ebdf46f760e618.png', '1982-08-12', '0782303432', 'nshekanabotumuhaise@gmail.com', 'not Known, Mabira, Rwanyamahembe, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102029, 'Kasiragye Amon', 'male', 'upload/c9307185cb1e3dbc4670c7b060bec3.jpg', '1982-08-12', '0782230110', 'kasiragyeamon@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102030, 'Bashaija Amos', 'male', 'upload/082381f292232f890a488b48dc55d7.png', '1982-08-12', '0784729388', 'bashaijaamos@gmail.com', 'not Known, Mabira, Rwanyamahembe, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102031, 'Bainomugisha Deus', 'male', 'upload/b60844bd84019e1e25cb89338c8a34.png', '1982-08-12', '0776571547', 'kahimawicklif@gmail.com', 'not Known, Mabira, Rwanyamahembe, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102032, 'Kyohangirwe Rosette', 'female', 'upload/a636e05b8e2bcd97563f3934c44f0f.png', '1982-08-12', '0783427141', 'katumildred@yahoo.com', 'not Known, Mabira, Rwanyamahembe, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102033, 'Asiimwe Specius Mbabazi', 'female', 'upload/fbfb67396bc86a535c72c5c1469acc.png', '1982-08-12', '0701913474', 'speciusasiimwembabazi2019@gmail.com', 'not Known, Mabira, Rubindi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102034, 'Mugisha David N', 'male', 'upload/85bd9d9c3412bf8bf8d8f79ec0b85c.jpg', '1982-08-12', '0782891378', 'mugishadavid@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102035, 'Abigaba Bruce', 'male', 'upload/97ccd8a359c7038d0aa9f21e74eff9.png', '1982-08-12', '0784316100', 'abigababruce@gmail.com', 'not Known, Mabira, Rubindi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102036, 'Baker Joseph', 'male', 'upload/358303a855208882e57fce37af200a.png', '1982-08-12', '0759612135', 'bakerjoseph2019@gmail.com', 'not Known, Mabira, Rubindi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102037, 'Mutungi Deus', 'male', 'upload/786578d1d0035329bf78665550650d.jpg', '1982-08-12', '0782840585', 'deusmutungi@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102038, 'Gumisiriza Nicholas', 'male', 'upload/ee3c478fba21e34c1a82d207246a28.png', '1982-08-12', '0777836430', 'gumisirizanicholas2019@gmail.com', 'not Known, Mabira, Rubindi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102039, 'Bamwesigye Geoffrey', 'male', 'upload/0f138e8aad13786a7d83aaec91b0f6.png', '1982-08-12', '0754148167', 'bamwesigyegeoffrey@gmail.com', 'not Known, Mabira, Rubaya, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102040, 'Twinomujuni Adrian', 'male', 'upload/4b476de72e849a96ad21d7e6e0c004.jpg', '1982-08-12', '0776933516', 'adriantwinomujuni@gmail.com ', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102041, 'Nkwatirire Fredrick', 'male', 'upload/cf4da47222f69ba2bac6fbae98b756.jpg', '1982-08-12', '0772972110', 'nkwatirirefred@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102042, 'Aryatuha Proviah', 'female', 'upload/1f87c28997831d1f6f341bb26d4305.png', '1982-08-12', '0781635256', 'aryatuhaproviah@gmail.com', 'not Known, Mabira, Rubaya, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102043, 'Tuhame Naboth', 'male', 'upload/c71b74ed032f6137705a8e8a366ec3.jpg', '1982-08-12', '0783110858', 'tuhamenaboth@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102044, 'Natweeta Sheila', 'female', 'upload/b7ac322822574d61b8bd38958a15f0.png', '1982-08-12', '0700592880', 'natweetasheila01@gmail.com', 'not Known, Mabira, Rubaya, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102045, 'Tayebwa Mankiline', 'female', 'upload/34bd375053df091cf5a0477a23a36f.png', '1982-08-12', '0786228056', 'tayebwamackline@gmail.com', 'not Known, Mabira, Rubaya, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102046, 'Mugizi Innocent', 'male', 'upload/849e1801885494ab2bd8baa7bbdc2f.jpg', '1982-08-12', '0782642922', 'innocentmugizi@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102047, 'Mutoranwa Herbert', 'male', 'upload/31a56c9dfbda583f052e0d74a27b9d.jpg', '1982-08-12', '0772521060', 'mutoranwaherbert@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102048, 'Tumusiime John Bosco', 'male', 'upload/bacb2fbb8aa42db915d6779702a87c.png', '1982-08-12', '0751931064', 'tumusiime5boscos@gmail.com', 'not Known, Mabira, Kagongi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102049, 'Tibakanya Mary', 'male', 'upload/ee77063d08ee9789bcfcc4761f55d9.png', '1982-08-12', '0778554696', 'tibakanyamarys@yahoo.com', 'not Known, Mabira, Kagongi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102050, 'Kagumire Didas', 'male', 'upload/2d58d732005e70057c76fe302d97b9.png', '1982-08-12', '0773967429', 'didaskagumire@gmail.com', 'not Known, Mabira, Kagongi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102051, 'Ainembabazi Olver', 'male', 'upload/35a4d172512a94c950a3a114f57002.png', '1982-08-12', '0777686486', 'ainembabazioliver@yahoo.com', 'not Known, Mabira, Kagongi, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102052, 'Mujuni Godfrey', 'male', 'upload/0355441d390ce6cdfdcb1cc6216ef2.png', '1982-08-12', '0774337678', 'godfreymujunik@yahoo.com', 'not Known, Mabira, Bukiro, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102053, 'Tugume Pontian', 'male', 'upload/6a339250a1b11b3d49e58260d72728.jpg', '1982-08-12', '0775433545', 'tugumepontian@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'gorvernment', 'no'),
(102054, 'Tamutenzya Christopher', 'male', 'upload/5a159763efc5665a76e0efc7f56f2b.jpg', '1982-08-12', '0781943825', 'tamutenzyatc@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102055, 'Barigye Felix', 'male', 'upload/629abe7482d3e14a0254caa025a37b.jpg', '1982-08-12', '0784454323', 'barigyefelix@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102056, 'Namara Wilson', 'male', 'upload/d3d10840f83e780d47a7bd93e89d40.jpg', '1982-08-12', '0750556584', 'wilnamara@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102057, 'Kashaba Wilber', 'male', 'upload/e45a01c824aaed9cb3f4e0d4dc4083.jpg', '1982-08-12', '0779546109', 'kashabwilber@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102058, 'Kiconco Enid', 'female', 'upload/30ec11073644305cac676bbc16ce59.jpg', '1982-08-12', '0777596208', 'enikicon@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102059, 'Asiimwe Immaculate Blessing', 'female', 'upload/30ec11073644305cac676bbc16ce59.png', '1982-08-12', '0788980700', 'aeblessing92@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102060, 'Mwesiga Enock Bamusiima', 'male', 'upload/2992d3b2bc101a5ee46babd4c18121.jpg', '1982-08-12', '0785285616', 'mwesigaenock@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102061, 'Ninsiima Roe', 'female', 'upload/940e25a448ef57c2fc99c7fa0062d3.jpg', '1982-08-12', '0700152657', 'ninsimaroe1@gmail.com', 'not Known, Mabira, Bukiro, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102062, 'Arinaitwe Jane', 'female', 'upload/c3b48a147b52e9e470fc54fc36a612.png', '1982-08-12', '0785948505', 'arinaitwejane@gmail.com', 'not Known,  Mabira,  Kashare,  Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'gorvernment', 'no'),
(102063, 'Keneema Peace', 'female', 'upload/64895a3fbf772f814bef462e75bf52.jpg', '1982-08-12', '0752760156', 'keneemapeace@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102064, 'Natukunda Doreck', 'female', 'upload/163fc8d008837c4bf7bfbac424e8a5.png', '1982-08-12', '0788138135', 'natukundadoreck@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102065, 'Twinobusingye Abby', 'male', 'upload/f884f2ad700e8bd714c7a591dade68.jpg', '1982-08-12', '0782123606', 'twinobusingyeabby@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', '', 'no'),
(102066, 'Rugundu Denson', 'male', 'upload/77507db3dce9b4d8f70c0550ddceb1.jpg', '1982-08-12', '0782039151', 'rugundudenson@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102067, 'Arinaitwe Grace', 'female', 'upload/1ec741038a7818fa52e442dc2622cc.jpg', '1982-08-12', '0773262637', 'arigrace230@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102068, 'Natwijuka Medius', 'female', 'upload/fa42f7cbd6516e95962f438cdd2a13.png', '1982-08-12', '0782278185', 'mediusnatwijuka@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102069, 'Atuhaire Allen', 'female', 'upload/ebf44cc5eb0b6578c091682445c095.jpg', '1982-08-12', '0778139396', 'atuhaireallen25@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102070, 'Igurukira Sanyu', 'female', 'upload/ce822004926402e6091e3fb8db79ff.png', '1982-08-12', '0781246644', 'sanyuigurukira@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102071, 'Atuhaire Abia', 'female', 'upload/fa2c0eb63320f89aa25ec17c0fa096.jpg', '1982-08-12', '0782698531', 'abiaatuhaire@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102072, 'Abaine Jovanice Molly', 'female', 'upload/1ed8109be3e3e89683c3c213dc9722.jpg', '1982-08-12', '0782921163', 'ajmolly2014@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102073, 'Mwesigwa Edward', 'male', 'upload/2a989b85fc92210c74248c6f002c92.jpg', '1982-08-12', '0778724497', 'edwardmwesigwa817@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102074, 'Kansiime Immaculate', 'female', 'upload/c089db07afca691473f1ea0c4e95d6.png', '1982-08-12', '0774570271', 'kansiimeimmaculate506@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102075, 'Asiimwe Annet', 'female', 'upload/0e65c5631fde838857bfcdbfc665e2.png', '1982-08-12', '0772887036', 'asiimweannet@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102076, 'Turyagumanawe Abel', 'male', 'upload/fe22329dcd9c63fb15ee739aab6e7e.jpg', '1982-08-12', '0788807715', 'aturyagumanawe294@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102077, 'Mugabo Dickson', 'male', 'upload/764c9c8833980ea7576de090c176ee.jpg', '1982-08-12', '0782896138', 'dicksonmugabo@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102078, 'Akunda Betty', 'female', 'upload/429267dd29cafe0022106c6e4d85b5.jpg', '1982-08-12', '0702423832', 'ankundabetty1975@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102079, 'Mpongano Elijah', 'male', 'upload/f99335c468bb8b7eac2548f4c88649.jpg', '1982-08-12', '0755538311', 'mponganoelijah@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102080, 'Magada Noah', 'female', 'upload/7081274698e5b84f4fae3c428061bf.jpg', '1982-08-12', '0704520411', 'magadanoah@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102081, 'Muhumuza Jotham', 'male', 'upload/e383d3df4f8f08f3c855cc8b827f34.jpg', '1982-08-12', '0776651072', 'muhumuzajotham@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102082, 'Birungi Ritah', 'female', 'upload/26171a1b7a76b4149ccff2ebde3537.jpg', '1982-08-12', '0785759499', 'birungiritah2019@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102083, 'Nassali Hajarah', 'female', 'upload/35ebdd1b3f9aa440b6cad78ef1ef9e.png', '1982-08-12', '0753974822', 'nasssalihajarah15@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', '', 'no'),
(102084, 'Kasasira Jackson', 'male', 'upload/99880fff1e6e90f120337c1435922c.jpg', '1982-08-12', '0780234598', 'jacksonkasasira@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102085, 'Bebwa Alamanzani', 'male', 'upload/39d93cf9c171a5deee01cdc87080e5.jpg', '1982-08-12', '0774677647', 'bebwaalamanzani@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102086, 'Turyahebwa Medard', 'female', 'upload/17828006615e69646a9a62ad7ca2c6.jpg', '1982-08-12', '0774607930', 'turyahebwamedard@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102087, 'Muhairwenta Scovia', 'female', 'upload/95bd0a8ea00e8e348fce2e1f48342a.png', '1982-08-12', '0788209235', 'muhairwentas@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102088, 'Ayebazibwe Adam', 'male', 'upload/e62017acc3a54b2a3ba4e9a89edb2d.jpg', '1982-08-12', '0779093077', 'adamsa2014@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102089, 'Tumwesigye Byensi Deus', 'male', 'upload/c81fa255e873acb91e998c29d8e734.jpg', '1982-08-12', '0777871003', 'deustumwesigye458@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102090, 'Kyohairwe Sarah', 'female', 'upload/ea0ac9f25ffe46cd9004082be21c09.png', '1982-08-12', '0773477048', 'kyohairwesarah@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102091, 'Ayebwazibwe Enock', 'male', 'upload/81158bbe0d62bfff7733b424672bdd.jpg', '1982-08-12', '0754013227', 'ayeebwazibweekb@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102092, 'Kyomugabe Angella', 'female', 'upload/4c4f69fbea4b8e8bf3eac0bce518c9.png', '1982-08-12', '0782762975', 'kyomugabeangella@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102093, 'Mugisha Godius', 'male', 'upload/851c65f40bc1eeaa545187ec79afbe.jpg', '1982-08-12', '0774989742', 'mugishagodius@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102094, 'Tibakanya Annah', 'female', 'upload/d0e0bdc57ce56080168d655582dd42.png', '1982-08-12', '0773308480', 'tibakanyaannah@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102095, 'Namala Jovulet', 'female', 'upload/3e54a4358fe6a2b5333f63c4208dee.jpg', '1982-08-12', '0774988215', 'jovuletnamara@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102096, 'Kamugisha Robert', 'male', 'upload/8b2a1fa250b199b7f93ac78affb091.jpg', '1982-08-12', '0775103289', 'robertkamugisha@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102097, 'Kekihembo N', 'female', 'upload/315e64ebc2c5fc5d3f61e26834023b.png', '1982-08-12', '0775748601', 'kekihembonaome@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102098, 'Kamwesigye Amon', 'male', 'upload/95d747b6d74138e25bf7948e2be46a.jpg', '1982-08-12', '0788736336', 'kamwesigyeamon@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102099, 'Amumpe Zakumumpa', 'male', 'upload/7198d604d38a622cd5a30f08834049.jpg', '1982-08-12', '0789676743', 'azakumumpa@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102100, 'Asiimwe Joseph', 'male', 'upload/e8c229c380d196b01991f0283fc6b2.jpg', '1982-08-12', '0774042149', 'asiimwejoseph@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102101, 'Abaine Kasiisi Johnson', 'male', 'upload/6fa55697036e61b1b9c68e81b8d838.jpg', '1982-08-12', '0702137977', 'abainekasiisijohnson@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102102, 'Katushbe Jane', 'female', 'upload/b3647ed5fcdb120a012d860b79672a.jpg', '1982-08-12', '0773120968', 'katushabejane@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102103, 'Nalubega Jane Scovia', 'female', 'upload/9a8a936c2e074715cb39da35610f7d.png', '1982-08-12', '0782635340', 'nalubegajanescovia@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102104, 'Ahimbisibwe Anna', 'female', 'upload/45ca72023273d5738b78845024bb97.jpg', '1982-08-12', '0775726651', 'ahimbisibweanna@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102105, 'Nimusiima Annah', 'male', 'upload/a4d2aec4a023d8bf33a6f4a437fb2a.png', '1982-08-12', '0776266832', 'nimusiimaannah89@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102106, 'Kyampaire Hope', 'female', 'upload/1e4a34e10e2193b995638f25d744b5.jpg', '1982-08-12', '0772674106', 'kyampairehope@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102107, 'Ariho John Oscar', 'male', 'upload/5e32a86da1fec70c91776f44186d60.jpg', '1982-08-12', '0772637626', 'oscarariho7@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102108, 'Mucunguzi Godfrey', 'male', 'upload/d53efb67d5381090568c37678b356c.jpg', '1982-08-12', '0771960540', 'mucunguzigodfrey@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102109, 'Bainomugisha Robert', 'male', 'upload/4fac22624656f95e71b51dc812e16a.jpg', '1982-08-12', '0782356995', 'bainerobs@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102110, 'Kiconco Annet Katyaba', 'female', 'upload/9182d89aa022f39f47c112b006a937.jpg', '1982-08-12', '0776339986', 'kiconcoann@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102111, 'Kyabishiki Mary', 'female', 'upload/26250f5a4217eab820faf6c3977916.png', '1982-08-12', '0776412001', 'mkyabishiki@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102112, 'Laaki David', 'male', 'upload/21a7dcce906036afafa8ae0c0d72e7.jpg', '1982-08-12', '0787547570', 'laakidavid@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102113, 'Namara Jane', 'female', 'upload/eda280793d31e54187389b79d13991.png', '1982-08-12', '0776209193', 'namarajane@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102114, 'Arinaitwe Laban', 'male', 'upload/a015c7950f54b72dc48a1887bf3f76.jpg', '1982-08-12', '0785214849', 'arinaitwelab@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102115, 'Bakahebwa Nice', 'female', 'upload/b034f85ae05def868bde987635e7c7.png', '1982-08-12', '0786555246', 'bakahebwanice@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102116, 'Kyogabirwe Judith', 'female', 'upload/0cb18235b5d89fc4695dc5a311af7d.jpg', '1982-08-12', '0771492623', 'judithkyogabirwe2@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102117, 'Namusuzi Justine', 'female', 'upload/ce8ac9f1d0e62b4307582c68467a7f.jpg', '1982-08-12', '0773893377', 'namujuzijustine660@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102118, 'Mwesigye Geofrey', 'male', 'upload/bde4d34a182aa25a3503bc9acb6eb5.jpg', '1982-08-12', '0784267247', 'mwesigyegeofrey36@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102119, 'Atusiime Jane', 'female', 'upload/c476d1f70f9ac1fedcd2d831f8ec07.jpg', '1982-08-12', '0782191047', 'janeatusiime2017@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102120, 'Nyankuba Naome', 'female', 'upload/aab9decdf9a0b912a76c68fe8b90c3.jpg', '1982-08-12', '0776804472', 'naomenyankuba@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102121, 'Mutatina Cosma', 'male', 'upload/f6a1489b3665d7f3b141da9c29a973.jpg', '1982-08-12', '082053704', 'cosmamutatina@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102122, 'Masiba Isaac', 'male', 'upload/a1d9d38a45b82e087a33b7816bbd47.jpg', '1982-08-12', '0783130380', 'masiibaisaac8@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102123, 'Nasaasira Monic', 'female', 'upload/1583c8a9df1150611cf1cd2342765e.jpg', '1982-08-12', '0788880299', 'nasmonic42@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102124, 'Musimenta Rosette', 'female', 'upload/390340c34224f69cc5aee2aabdba2f.jpg', '1982-08-12', '0775200761', 'murose803@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102125, 'Mujinya Gilbert', 'male', 'upload/3a4bb56d90d4c78e964fb26e7a2da5.jpg', '1982-08-12', '0703689544', 'mujinyagilbert@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102126, 'Mugumya Godfrey', 'male', 'upload/785887e45ec3f436cb721d32de380c.jpg', '1982-08-12', '0772949864', 'godfrey@yahoo.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102127, 'Namanya Edson Bakikunde', 'male', 'upload/1a6f342687b4f820821c205573e426.jpg', '1982-08-12', '0782853867', 'namanyaedson80@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102128, 'Kyatukundire Shallon', 'female', 'upload/22401dd80bace63a3460be53f7765b.jpg', '1982-08-12', '0782515543', 'kyatukundireshalon@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no'),
(102129, 'Okwarisiima Vinnah', 'female', 'upload/d5a56f79c674f96ad0612e8ee15a1b.jpg', '1982-08-12', '0773830089', 'vinnahokworisiima@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102130, 'Ampiire Jecones', 'female', 'upload/c3a687392f039ac13e498ddb5bbe53.jpg', '1982-08-12', '0773442288', 'desire2006@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102131, 'Atuhaire Macklean', 'female', 'upload/413e52f09ba6cee88be745303daf7b.jpg', '1982-08-12', '0773931836', 'atuhairemacklean@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102132, 'Nimusiima Naume', 'female', 'upload/cc4d6ece3d65959c17276feb0c92cb.jpg', '1982-08-12', '0776243352', 'naumenimusiima@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102133, 'Bagasha Annah Baine', 'female', 'upload/aa7f4b401de48be4f6b7624ebae00c.jpg', '1982-08-12', '0754739006', 'annahbagasha@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Education Assistant II', '123456', 'teacher', 'Government', 'no'),
(102134, 'Turyagumamu Eden', 'male', 'upload/8c773db59aaa06fd94be951aa69698.jpg', '1982-08-12', '0789492752', 'edenturyagumamu@gmail.com', 'not Known, Mabira, Kashare, Mbarara', 'RU7HG45ES21NXC8D', 'Primary education', 'Deputy head teacher', '123456', 'teacher', 'Government', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Class_no` (`Class_no`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hteacher_grades`
--
ALTER TABLE `hteacher_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hteacher_sch_transfers`
--
ALTER TABLE `hteacher_sch_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `left_sch_records`
--
ALTER TABLE `left_sch_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_five`
--
ALTER TABLE `primary_five`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_five_results`
--
ALTER TABLE `primary_five_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_four`
--
ALTER TABLE `primary_four`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_four_results`
--
ALTER TABLE `primary_four_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_mock_results`
--
ALTER TABLE `primary_mock_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_seven`
--
ALTER TABLE `primary_seven`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_seven_results`
--
ALTER TABLE `primary_seven_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_seven_temp`
--
ALTER TABLE `primary_seven_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_six`
--
ALTER TABLE `primary_six`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primary_six_results`
--
ALTER TABLE `primary_six_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_head`
--
ALTER TABLE `schools_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools_tb`
--
ALTER TABLE `schools_tb`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sch_no` (`sch_no`),
  ADD UNIQUE KEY `sch_name` (`sch_name`);

--
-- Indexes for table `schools_teacher`
--
ALTER TABLE `schools_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sch_mock_results`
--
ALTER TABLE `sch_mock_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Sub_code` (`Sub_code`);

--
-- Indexes for table `sub_county_mock_results`
--
ALTER TABLE `sub_county_mock_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_county_results`
--
ALTER TABLE `sub_county_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_grades`
--
ALTER TABLE `teacher_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_hteachers`
--
ALTER TABLE `total_hteachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_staff`
--
ALTER TABLE `total_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_teachers`
--
ALTER TABLE `total_teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hteacher_grades`
--
ALTER TABLE `hteacher_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `hteacher_sch_transfers`
--
ALTER TABLE `hteacher_sch_transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `left_sch_records`
--
ALTER TABLE `left_sch_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `primary_five`
--
ALTER TABLE `primary_five`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40207;

--
-- AUTO_INCREMENT for table `primary_five_results`
--
ALTER TABLE `primary_five_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `primary_four`
--
ALTER TABLE `primary_four`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `primary_four_results`
--
ALTER TABLE `primary_four_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `primary_mock_results`
--
ALTER TABLE `primary_mock_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `primary_seven`
--
ALTER TABLE `primary_seven`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60205;

--
-- AUTO_INCREMENT for table `primary_seven_results`
--
ALTER TABLE `primary_seven_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `primary_seven_temp`
--
ALTER TABLE `primary_seven_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70203;

--
-- AUTO_INCREMENT for table `primary_six`
--
ALTER TABLE `primary_six`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50206;

--
-- AUTO_INCREMENT for table `primary_six_results`
--
ALTER TABLE `primary_six_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schools_head`
--
ALTER TABLE `schools_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `schools_tb`
--
ALTER TABLE `schools_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `schools_teacher`
--
ALTER TABLE `schools_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sch_mock_results`
--
ALTER TABLE `sch_mock_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_county_mock_results`
--
ALTER TABLE `sub_county_mock_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_county_results`
--
ALTER TABLE `sub_county_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_grades`
--
ALTER TABLE `teacher_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `total_hteachers`
--
ALTER TABLE `total_hteachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102115;

--
-- AUTO_INCREMENT for table `total_staff`
--
ALTER TABLE `total_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203007;

--
-- AUTO_INCREMENT for table `total_teachers`
--
ALTER TABLE `total_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102135;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
