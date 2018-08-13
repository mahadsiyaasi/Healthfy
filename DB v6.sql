-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 10:43 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthso`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `doctor_id` varchar(50) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `note` text NOT NULL,
  `status_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient_id`, `disease`, `doctor_id`, `amount`, `date`, `note`, `status_id`, `company_id`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(101, 27, 'Critical Care', '26', '10', '2018-08-09 14:28:32', 'time test', 167, 0, '2018-08-09', '2018-08-10', '17:40:00', '16:15:00'),
(102, 33, 'Massage Therapy and Body Contour', '24', '20', '2018-08-13 13:59:15', 'this distric t', 1, 1, '2018-08-15', '2018-08-16', '12:25:00', '12:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `chart_account`
--

CREATE TABLE `chart_account` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_account`
--

INSERT INTO `chart_account` (`id`, `number`, `name`, `description`, `parent_id`, `type`, `category`, `company_id`, `status_id`) VALUES
(3, NULL, 'Liabilities', 'This Creditors', NULL, '148', '133', 1, 1),
(4, NULL, 'Expenses', 'This expenses account', NULL, '149', '135', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chealths`
--

CREATE TABLE `chealths` (
  `id` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `slogan` text,
  `logo` text,
  `country` varchar(70) DEFAULT NULL,
  `state` varchar(70) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `distruct` varchar(70) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `default_curency_id` int(11) DEFAULT NULL,
  `tell` varchar(70) DEFAULT NULL,
  `mobile` varchar(70) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `code` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chealths`
--

INSERT INTO `chealths` (`id`, `name`, `slogan`, `logo`, `country`, `state`, `city`, `distruct`, `address`, `default_curency_id`, `tell`, `mobile`, `email`, `parent_id`, `status_id`, `code`) VALUES
(1, 'Nora Health', 'Health clinic and patient service ', 'dist/img/avatar.png', 'Somalia', 'Banadir', 'Moqdisho', 'Shipis', 'Near Hotell global', 1, '61233434', '61221221', 'nooraclinic@gmail.com', 0, 1, 'NH Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `daignosis_list`
--

CREATE TABLE `daignosis_list` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `inclusion_termenole` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `body_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daignosis_list`
--

INSERT INTO `daignosis_list` (`id`, `name`, `description`, `inclusion_termenole`, `parent_id`, `section_id`, `type_id`, `body_id`) VALUES
(1, 'Tonsillar aspergilosis', 'Tonsillar aspergilosis', NULL, NULL, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`) VALUES
(1, 'Bachelor of Medicine'),
(2, 'Doctor of Osteopathic Medicine '),
(3, 'Bachelor of Surgery'),
(4, 'Master of Clinical Medicine '),
(5, 'Master of Medical Science'),
(6, 'Master of Philosophy'),
(7, 'Master of Surgery');

-- --------------------------------------------------------

--
-- Table structure for table `dosage_unit_list`
--

CREATE TABLE `dosage_unit_list` (
  `dul_id` int(11) NOT NULL,
  `dosage_unit_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosage_unit_list`
--

INSERT INTO `dosage_unit_list` (`dul_id`, `dosage_unit_name`) VALUES
(1, 'Tablet'),
(2, 'Capsule'),
(3, 'Drop'),
(4, 'Suspension'),
(5, 'Cream');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'My doctor', '2018-02-12', '2018-02-12', '2018-02-04 21:33:00', '2018-02-04 21:00:00'),
(2, 'test About', '2018-02-05', '2018-02-05', '2018-02-04 21:00:00', '2018-02-05 10:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `frequency_list`
--

CREATE TABLE `frequency_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `abbreviation` varchar(50) DEFAULT NULL,
  `explanation` text,
  `hoursInBetween` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequency_list`
--

INSERT INTO `frequency_list` (`id`, `name`, `abbreviation`, `explanation`, `hoursInBetween`) VALUES
(2, 'Every Day', 'Q.D', 'q is used to represent \"every\" (because the Latin for every is quisque)\r\nd is used to represent \"day\" (because the Latin for day is diem)\r\nWe will see these two letters used this way in many of the abbreviations below.\r\n', 24),
(3, 'Every Hour', 'Q.H', 'q.h.\r\n\r\nNotice the use of q for every. \r\nh is used to represent \"hour\" \r\nWe will also see these two letters used this way in many of the abbreviations below.\r\n', 4),
(4, 'twice a day', 'B.I.D', 'b is used to represent \"twice\" (because the Latin prefix for 2 is bi - think bicycle)', 24),
(5, 'Three times Aday', 'T.I.D', 't is used to represent \"three times \" (because the Latin prefix for 3 is tri - think tricycle)\r\n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(7, 'App\\User', 137, 'image', '252 61 7056341 20170812_150132', '252-61-7056341-20170812_150132.jpg', 'image/jpeg', 'public', 36318, '[]', '[]', '[]', 1, '2018-07-26 18:59:40', '2018-07-26 18:59:40'),
(8, 'App\\User', 137, 'image', '252 61 7056341 20170812_150132', '252-61-7056341-20170812_150132.jpg', 'image/jpeg', 'public', 36318, '[]', '[]', '[]', 2, '2018-07-26 19:19:42', '2018-07-26 19:19:42'),
(9, 'App\\User', 137, 'image', '252 907 735 054 20170715_130001', '252-907-735-054-20170715_130001.jpg', 'image/jpeg', 'public', 29104, '[]', '[]', '[]', 3, '2018-07-26 19:32:50', '2018-07-26 19:32:50'),
(10, 'App\\User', 137, 'image', '252 61 7056341 20170812_150132', '252-61-7056341-20170812_150132.jpg', 'image/jpeg', 'public', 36318, '[]', '[]', '[]', 4, '2018-07-26 20:12:22', '2018-07-26 20:12:22'),
(11, 'App\\User', 139, 'image', '+252 907 735 054 20170715_130001', '+252-907-735-054-20170715_130001.jpg', 'image/jpeg', 'public', 29104, '[]', '[]', '[]', 5, '2018-07-27 12:19:47', '2018-07-27 12:19:47'),
(12, 'App\\User', 141, 'image', '+252 907 735 054 20170715_130001', '+252-907-735-054-20170715_130001.jpg', 'image/jpeg', 'public', 29104, '[]', '[]', '[]', 6, '2018-07-28 05:55:23', '2018-07-28 05:55:23'),
(13, 'App\\User', 142, 'image', '‪+252 61 8832229‬ 20170824_233455', '‪+252-61-8832229‬-20170824_233455.jpg', 'image/jpeg', 'public', 44120, '[]', '[]', '[]', 7, '2018-07-29 14:23:30', '2018-07-29 14:23:30'),
(14, 'App\\User', 142, 'image', '+252 907 735 054 20170715_130001', '+252-907-735-054-20170715_130001.jpg', 'image/jpeg', 'public', 29104, '[]', '[]', '[]', 8, '2018-08-13 11:04:24', '2018-08-13 11:04:24'),
(15, 'App\\User', 142, 'image', '+252 907 735 054 20170715_130001', '+252-907-735-054-20170715_130001.jpg', 'image/jpeg', 'public', 29104, '[]', '[]', '[]', 9, '2018-08-13 11:09:39', '2018-08-13 11:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `medication_dosage_units`
--

CREATE TABLE `medication_dosage_units` (
  `mdu_id` int(11) NOT NULL,
  `medication_id` int(11) DEFAULT NULL,
  `dosage_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_dosage_units`
--

INSERT INTO `medication_dosage_units` (`mdu_id`, `medication_id`, `dosage_unit_id`) VALUES
(50, 44, 4),
(52, 45, 2),
(53, 43, 2),
(54, 43, 3),
(55, 42, 2),
(56, 42, 4),
(57, 46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medication_list`
--

CREATE TABLE `medication_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `effect` text,
  `status_id` int(11) DEFAULT NULL,
  `strenght` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_list`
--

INSERT INTO `medication_list` (`id`, `name`, `effect`, `status_id`, `strenght`, `unit_id`, `company_id`) VALUES
(42, 'asylen', 'no more effect', 1, 493, 9, 1),
(43, 'panadol', 'routine pain dr', 1, 403, 10, 1),
(44, 'Panadol', 'no more effect', 0, 20, 9, 1),
(45, 'Asetl', 'no more effect', 1, 20, 12, 1),
(46, 'copsole', 'no more side effect', 1, 500, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medication_route`
--

CREATE TABLE `medication_route` (
  `mr_id` int(11) NOT NULL,
  `medication_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_route`
--

INSERT INTO `medication_route` (`mr_id`, `medication_id`, `route_id`) VALUES
(82, 44, 3),
(84, 45, 2),
(85, 43, 1),
(86, 43, 3),
(87, 42, 2),
(88, 42, 3),
(89, 42, 4),
(90, 46, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medication_strenght`
--

CREATE TABLE `medication_strenght` (
  `ms_id` int(11) NOT NULL,
  `medication_id` int(11) DEFAULT NULL,
  `strenght` int(11) DEFAULT NULL,
  `strenght_unit_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_strenght`
--

INSERT INTO `medication_strenght` (`ms_id`, `medication_id`, `strenght`, `strenght_unit_id`) VALUES
(24, 35, 128, 5),
(26, 37, 329, 5),
(33, 38, 112, 6),
(42, 39, 320, 7),
(43, 39, 110, 1),
(44, 39, 129, 4),
(45, 39, 239, 3),
(46, 40, 300, 6),
(47, 40, 190, 7),
(48, 41, 239, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_05_111258_create_events_table', 1),
(2, '2018_07_17_085252_create_permission_tables', 2),
(3, '2018_07_25_143831_create_media_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_tell` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8_unicode_ci,
  `state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_name`, `patient_tell`, `country`, `state`, `district`, `address`, `datebirth`, `gender`, `date`, `status_id`, `user_id`, `company_id`) VALUES
(8, 'Mohamed Isak', '615779523', 'Bangladesh', 'Rangamati', 'districit', '30m Date of Birth', '2022-01-18', 'male', '2018-01-03 04:19:52', 0, 106, 1),
(22, 'Mahad Xasan', '615545554', 'Somalia', 'Banaadir', NULL, NULL, NULL, 'male', '2018-07-16 09:00:30', 1, 124, 1),
(23, 'Mo Ali', '636163136', 'Algeria', 'Annaba', NULL, NULL, NULL, 'male', '2018-07-16 09:06:39', 1, 125, 1),
(24, 'Hamdi Gg', '45523523523', 'Angola', 'Encamp', 'asajvuiyiuouoivi', 'gghhv uiuiuiu iuyc', '1993-07-15', 'male', '2018-07-16 09:47:28', 1, 126, 1),
(25, 'MAHAD CEYNTE', '615574474', 'Antigua and Barbuda', 'Saint Paul', NULL, NULL, NULL, 'female', '2018-07-16 09:49:12', 0, 127, 1),
(26, 'CABDI CAWAALE', '6155778783', 'Argentina', 'Cordoba', NULL, NULL, NULL, 'male', '2018-07-16 09:51:39', 0, 128, 1),
(27, 'sahra xasan', '615574411', 'Azerbaijan', 'Balakan Rayonu', NULL, NULL, NULL, 'female', '2018-07-16 09:53:24', 1, 129, 1),
(28, 'Dahaba Ali Geedi', '615140773', 'Antigua and Barbuda', 'Saint Mary', 'mama daha b', 'MDa dahb', '1975-11-18', 'male', '2018-07-19 15:16:06', 1, 130, 1),
(29, 'cabdi raxmaan xaamud', '615777824', 'Somalia', 'Banaadir', NULL, NULL, NULL, 'male', '2018-07-21 10:17:42', 1, 131, 1),
(30, 'abdulaahi axmed', '615000279', 'Somalia', 'Banaadir', NULL, NULL, NULL, 'male', '2018-07-27 15:05:08', 1, 138, 1),
(31, 'Hamze abdi', '615443322', 'Somalia', 'Banaadir', NULL, NULL, NULL, 'male', '2018-07-28 08:43:28', 1, 140, 1),
(32, 'cabdi', '63713613131', 'Albania', 'Devoll (Bilisht)', NULL, NULL, NULL, 'male', '2018-07-30 06:51:57', 1, 143, 1),
(33, 'Almas hasan', '612555511', 'Algeria', 'Annaba', NULL, NULL, NULL, 'male', '2018-07-30 07:02:43', 1, 145, 1),
(34, 'dahaba ali', '615779520', 'Somalia', 'Banaadir', NULL, NULL, NULL, 'male', '2018-07-30 07:23:12', 1, 146, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `provider_name` varchar(50) DEFAULT NULL,
  `description` text,
  `status_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `account`, `provider_name`, `description`, `status_id`, `company_id`, `parent_id`, `user_id`) VALUES
(1, 'Cash', NULL, 'All Cash', 'Cash are money that are used as cash eg dollar and shilin somali', 1, 1, NULL, 0),
(2, 'Hand to hand', '612515152', 'person', 'this transuction by shiling somali', 1, 1, 1, 0),
(3, 'Hand to hand', '621666612', 'person', 'hand to hand cash trunsuction', 1, 1, 1, 0),
(4, 'Account', '11992112', 'Salaam somali bank', 'this account provider', 1, 0, 1, 0),
(5, 'Account', '32112211', 'Premiera Account', 'this account is premiera account', 1, 0, 1, 142);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(27, 'Patients', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(28, 'Doctors', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(29, 'Tests', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(30, 'Medications', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(31, 'Payments', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(32, 'Staffs', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(33, 'Add Patient', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(34, 'Manage Patient', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(35, 'Add Doctor', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(36, 'Manage Doctor', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(37, 'Add Test', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(38, 'Manage Tests', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(39, 'Lab Dashboard', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(40, 'Add Medication', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(41, 'Manage Medications', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(42, 'Add Payment', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(43, 'Manage Payments', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(44, 'Add Staff', 'web', '2018-07-17 08:58:46', '2018-07-17 08:58:46'),
(45, 'Manage Staffs', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(46, 'Roles', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(47, 'Create/Update', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(48, 'Account', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(49, 'Create/update ', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(50, 'Journal', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47'),
(51, 'Permalinks', 'web', '2018-07-17 08:58:47', '2018-07-17 08:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissionas`
--

CREATE TABLE `permissionas` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `sort` varchar(50) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `target` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissionas`
--

INSERT INTO `permissionas` (`id`, `name`, `parent_id`, `level_id`, `sort`, `type_id`, `url`, `target`, `status_id`, `icon`, `event`) VALUES
(1, 'Patients', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-user-plus', ''),
(2, 'Doctors', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-user-md', ''),
(3, 'Tests', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-hospital-o', ''),
(4, 'Medications', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-medkit', ''),
(5, 'Payments', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-money', ''),
(6, 'Staffs', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-users', ''),
(7, 'Add Patient', 1, 1, '1', 1, '/patients?new=true', '_Top', 1, '', ''),
(8, 'Manage Patient', 1, 1, '1', 1, '/editor?table=Patient', '_Top', 1, '', ''),
(9, 'Add Doctor', 2, 1, '1', 1, '/doctors?new=true', '_Top', 1, '', ''),
(10, 'Manage Doctor', 2, 1, '1', 1, '/editor?table=Doctor', '_Top', 0, '', ''),
(11, 'Add Test', 3, 1, '1', 1, '/tests', '_Top', 1, '', ''),
(12, 'Manage Tests', 3, 1, '1', 1, '/editor?table=Test', '_Top', 1, '', ''),
(13, 'Lab Dashboard', 3, 1, '1', 1, '/lab', '_Top', 1, '', ''),
(14, 'Add Medication', 4, 1, '1', 1, '/medication?new=true', '_Top', 1, '', ''),
(15, 'Manage Medications', 4, 1, '1', 1, '/medication', '_Top', 1, '', ''),
(16, 'Add Payment', 5, 1, '1', 1, '/payment?new=sub_main', '_Top', 1, '', ''),
(17, 'Manage Payments', 5, 1, '1', 1, '/payment', '_Top', 1, '', ''),
(18, 'Add Staff', 6, 1, '1', 1, NULL, '_Top', 1, '', 'onclick=\"modals(\'staffmodal\',\'Create Staff\');resetcaster(\'#staffm\',\'input[name=actiontype]\',\'register\');removeuertable(\'#staffmodal\')\"'),
(19, 'Manage Staffs', 6, 1, '1', 1, '/edit?table=Staff', '_Top', 1, '', ''),
(20, 'Roles', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-cogs', ''),
(21, 'Create/Update', 20, 1, '1', 1, '/role', '_Top', 1, '', ''),
(22, 'Account', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-university', ''),
(23, 'Create/update ', 22, 1, '1', 1, '/chart', '_Top', 1, '', ''),
(24, 'Journal', 22, 1, '1', 1, '/journal', '_Top', 1, '', ''),
(25, 'Permalinks', 1, 1, '1', 1, '/patients', '_Top', 1, '', ''),
(26, 'Permalinks', 2, 1, '1', 1, '/doctors', '_Top', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `sort` varchar(50) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `target` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `parent_id`, `level_id`, `sort`, `type_id`, `url`, `target`, `status_id`, `icon`, `event`) VALUES
(1, 'Patients', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-user-plus', ''),
(2, 'Doctors', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-user-md', ''),
(3, 'Tests', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-hospital-o', ''),
(4, 'Medications', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-medkit', ''),
(5, 'Payments Setups', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-money', ''),
(6, 'Staffs', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-users', ''),
(7, 'Add Patient', 1, 1, '1', 1, '/patients?new=true', '_Top', 1, '', ''),
(8, 'Manage Patient', 1, 1, '1', 1, '/editor?table=Patient', '_Top', 1, '', ''),
(9, 'Add Doctor', 2, 1, '1', 1, '/doctors?new=true', '_Top', 1, '', ''),
(10, 'Manage Doctor', 2, 1, '1', 1, '/editor?table=Doctor', '_Top', 0, '', ''),
(11, 'Add Test', 3, 1, '1', 1, '/tests', '_Top', 1, '', ''),
(12, 'Manage Tests', 3, 1, '1', 1, '/editor?table=Test', '_Top', 1, '', ''),
(13, 'Lab Dashboard', 3, 1, '1', 1, '/lab', '_Top', 1, '', ''),
(14, 'Add Medication', 4, 1, '1', 1, '/medication?new=true', '_Top', 1, '', ''),
(15, 'Manage Medications', 4, 1, '1', 1, '/medication', '_Top', 1, '', ''),
(16, 'Add Payment', 5, 1, '1', 1, '/payment?new=sub_main', '_Top', 1, '', ''),
(17, 'Manage Payments', 5, 1, '1', 1, '/payment', '_Top', 1, '', ''),
(18, 'Add Staff', 6, 1, '1', 1, NULL, '_Top', 1, '', 'onclick=\"modals(\'staffmodal\',\'Create Staff\');resetcaster(\'#staffm\',\'input[name=actiontype]\',\'register\');removeuertable(\'#staffmodal\')\"'),
(19, 'Manage Staffs', 6, 1, '1', 1, '/edit?table=Staff', '_Top', 1, '', ''),
(20, 'Roles', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-cogs', ''),
(21, 'Create/Update', 20, 1, '1', 1, '/role', '_Top', 1, '', ''),
(22, 'Account', 0, 1, '1', 1, NULL, '_Top', 1, 'fa fa-university', ''),
(23, 'Create/update ', 22, 1, '1', 1, '/chart', '_Top', 1, '', ''),
(24, 'Journal', 22, 1, '1', 1, '/journal', '_Top', 1, '', ''),
(25, 'Permalinks', 1, 1, '1', 1, '/patients', '_Top', 1, '', ''),
(26, 'Permalinks', 2, 1, '1', 1, '/doctors', '_Top', 1, '', ''),
(27, 'Appointments', 0, 1, '-1', 1, '', '1', 1, 'fa fa-plus', ''),
(28, 'my appoints', 27, 1, '-1', 1, '/appointments', '1', 1, 'fa fa-calander', ''),
(29, 'prescriptions', 0, 1, '-1', 1, '', '1', 1, 'fa fa-medkit', ''),
(30, 'Prescrips', 29, 1, '-1', 1, '/prescriptions', '1', 1, '1', ''),
(31, 'Payments', 0, 1, '-1', 1, '', '1', 1, 'fa fa-money', ''),
(32, 'Fee Payments', 31, 1, '-1', 1, '/payments', '1', 1, '1', ''),
(33, 'Setting', 0, 1, '-1', 1, '/settings', '1', 1, 'fa fa-cog', ''),
(34, 'App settings', 33, 1, '-1', 1, '/settings', '1', 1, 'fa fa-cog', ''),
(35, 'Feed', 0, 0, '0', 0, '', '0', 1, 'fa fa-file', ''),
(36, 'Health Feed', 35, 0, '0', 0, '', '0', 1, 'fa fa-news', ''),
(37, 'Health forum', 35, 0, '0', 0, '', '0', 1, 'fa fa-news', ''),
(38, 'Doctor', 0, 0, '0', 0, '', '0', 1, 'fa fa-heart', ''),
(39, 'my doctor', 38, 0, '0', 0, '', '0', 1, 'fa fa-news', ''),
(40, 'Medical Records', 0, 0, '0', 0, '', '0', 1, 'fa fa-heartbeat', ''),
(41, 'Records', 40, 0, '0', 0, '/records', '0', 1, 'fa-briefcase-medical', ''),
(42, 'Feedback', 0, 0, '1', 0, '1', '1', 1, 'fa fa-rss', ''),
(43, 'Feedback', 42, 0, '1', 0, '/pfeedback', '1', 1, 'fa fa-rss', ''),
(44, 'Profile', 0, 1, '-1', 1, NULL, '1', 1, 'fa fa-users', ''),
(45, 'my Profile', 44, 1, '-1', 1, '/complete', '1', 1, 'fa fa-users', ''),
(46, 'Un Approved', 2, 1, '-1', 1, '/doctors/unapproved', '1', NULL, '', ''),
(47, 'Communications', 0, 0, '0', 0, '0', '0', 1, 'fa fa-globe', ''),
(48, 'Appoints', 47, 0, '0', 0, '/doctors/appoints', '0', 1, 'fa fa-globe', ''),
(49, 'Un Approved', 1, 1, '1', 1, '/declinedPatients', '1', 1, 'fa fa-cog', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission_maping`
--

CREATE TABLE `permission_maping` (
  `id` int(11) NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `entity_type_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_maping`
--

INSERT INTO `permission_maping` (`id`, `entity_id`, `entity_type_id`, `permission_id`, `status_id`) VALUES
(137, 1, 1, 28, 1),
(138, 1, 1, 30, 1),
(139, 1, 1, 32, 1),
(140, 1, 1, 34, 1),
(141, 1, 1, 36, 1),
(142, 1, 1, 37, 1),
(143, 1, 1, 39, 1),
(144, 1, 1, 41, 1),
(145, 1, 1, 43, 1),
(241, 3, 3, 11, 1),
(242, 3, 3, 12, 1),
(243, 3, 3, 13, 1),
(244, 3, 3, 14, 1),
(245, 3, 3, 15, 1),
(246, 3, 3, 16, 1),
(247, 3, 3, 17, 1),
(248, 3, 3, 32, 1),
(249, 3, 3, 34, 1),
(250, 3, 3, 43, 1),
(251, 3, 3, 45, 1),
(252, 3, 3, 48, 1),
(283, 2, 2, 7, 1),
(284, 2, 2, 8, 1),
(285, 2, 2, 25, 1),
(286, 2, 2, 49, 1),
(287, 2, 2, 9, 1),
(288, 2, 2, 10, 1),
(289, 2, 2, 26, 1),
(290, 2, 2, 46, 1),
(291, 2, 2, 11, 1),
(292, 2, 2, 12, 1),
(293, 2, 2, 13, 1),
(294, 2, 2, 14, 1),
(295, 2, 2, 15, 1),
(296, 2, 2, 16, 1),
(297, 2, 2, 17, 1),
(298, 2, 2, 18, 1),
(299, 2, 2, 19, 1),
(300, 2, 2, 21, 1),
(301, 2, 2, 23, 1),
(302, 2, 2, 24, 1),
(303, 2, 2, 28, 1),
(304, 2, 2, 30, 1),
(305, 2, 2, 32, 1),
(306, 2, 2, 34, 1),
(307, 2, 2, 36, 1),
(308, 2, 2, 37, 1),
(309, 2, 2, 39, 1),
(310, 2, 2, 41, 1),
(311, 2, 2, 43, 1),
(312, 2, 2, 45, 1),
(313, 2, 2, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_detail`
--

CREATE TABLE `prescription_detail` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `medication_id` int(11) DEFAULT NULL,
  `dosage` varchar(50) DEFAULT NULL,
  `frequency_id` int(11) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `instruction` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_detail`
--

INSERT INTO `prescription_detail` (`id`, `prescription_id`, `medication_id`, `dosage`, `frequency_id`, `duration`, `instruction`, `status_id`) VALUES
(45, 36, 42, '2', 3, '2', 'After Food', 0),
(46, 36, 43, '1', 4, '1', 'After Food', 0),
(47, 36, 45, '3', 3, '2', 'After Food', 0),
(48, 37, 42, '1', 3, '1', 'After Food', 1),
(49, 37, 43, '2', 4, '3', 'Before Food', 1),
(50, 38, 42, '3', 3, '3', 'Before Food', 0),
(51, 38, 43, '2', 5, '2', 'Before Food', 0),
(52, 38, 45, '3', 4, '3', 'After Food', 0),
(53, 39, 42, '3', 2, '2', 'Before Food', 1),
(54, 39, 43, '3', 4, '1', 'Before Food', 0),
(55, 39, 45, '3', 2, '2', 'After Food', 1),
(56, 40, 45, '4', 4, '2', 'After Food', 1),
(57, 41, 42, '2', 2, '3', 'After Food', 1),
(58, 41, 43, '3', 4, '3', 'Before Food', 1),
(59, 42, 42, '2', 3, '2', 'After Food', 1),
(60, 42, 43, '3', 4, '2', 'Before Food', 1),
(61, 43, 42, '3', 4, '2', 'After Food', 1),
(62, 43, 43, '1', 4, '1', 'After Food', 1),
(63, 43, 45, '3', 4, '2', 'Before Food', 1),
(64, 44, 42, '1', 3, '2', 'After Food', 1),
(65, 44, 43, '1', 5, '3', 'After Food', 1),
(66, 45, 42, '2', 2, '5', 'After Food', 1),
(67, 46, 42, '2', 4, '4', 'After Food', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription_list`
--

CREATE TABLE `prescription_list` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription_list`
--

INSERT INTO `prescription_list` (`id`, `patient_id`, `doctor_id`, `status_id`, `date`, `company_id`) VALUES
(36, 8, 18, 0, '2018-04-11', 1),
(37, 15, 17, 1, '2018-04-18', 1),
(38, 8, 17, 1, '2018-04-19', 1),
(39, 8, 17, 1, '2018-04-27', 1),
(40, 8, 20, 1, '2018-04-27', 1),
(41, 8, 19, 1, '2018-04-27', 1),
(42, 8, 17, 1, '2018-07-16', 1),
(43, 27, 18, 1, '2018-07-19', 0),
(44, 27, 17, 1, '2018-07-20', 0),
(45, 30, 20, 1, '2018-07-27', 0),
(46, 31, 17, 1, '2018-07-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `qualification_id` int(11) DEFAULT NULL,
  `college_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `min`, `max`, `group_id`) VALUES
(4, 10, 310, 17),
(5, 10, 30, 2),
(6, 30, 58, 1),
(7, 10, 59, 1),
(8, 20, 120, 43),
(9, 10, 20, 48);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `status_id`, `description`) VALUES
(1, 'Patients', 1, 'this role is allowed for the patient when they registed then this permission and rule will automatic set this is not need manualy change notince don\'t try to modify this rule or change with out permission.'),
(2, 'Admin', 1, 'This is Admin rule all web features will auto available and can manage all system utilites'),
(3, 'Doctors', 1, 'This rule will be very affect full for the doctors and their account facilities.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `route_list`
--

CREATE TABLE `route_list` (
  `rl_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `explanation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route_list`
--

INSERT INTO `route_list` (`rl_id`, `name`, `explanation`) VALUES
(1, 'injection ', ''),
(2, 'by mouth', ''),
(3, 'instramascular', ''),
(4, 'intervinus', ''),
(5, 'buccal', 'held inside the cheek\r\n'),
(6, 'interal', 'delivered directly into the stomach or intestine (with a G-tube or J-tube)\r\n\r\n'),
(7, 'inhalable', 'breathed in through a tube or mask\r\n) '),
(8, 'infused', 'injected into a vein with an IV line and slowly dripped in over time'),
(9, 'intrathecal', 'injected into your spine\r\n'),
(10, 'nasal', 'given into the nose by spray or pump\r\n'),
(11, 'apthalmic', 'given into the eye by drops, gel, or ointment\r\n'),
(12, 'oral', 'swallowed by mouth as a tablet, capsule, lozenge, or liquid\r\n'),
(13, 'rectal', 'inserted into the rectum\r\n'),
(14, 'subcatinous', 'injected just under the skin'),
(15, 'sublingual', 'held under the tongue\r\n'),
(16, 'topical', 'applied to the skin\r\n'),
(17, 'trunsdermal', 'given through a patch placed on the skin');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `tell` varchar(50) DEFAULT NULL,
  `email` text,
  `specialization` text,
  `salary` varchar(50) DEFAULT NULL,
  `visit_amount` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `datebirth` date DEFAULT NULL,
  `address` text,
  `status_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `tell`, `email`, `specialization`, `salary`, `visit_amount`, `nationality`, `datebirth`, `address`, `status_id`, `user_id`, `type`, `company_id`, `gender`, `degree`, `city`, `experience`, `about`, `title`) VALUES
(17, 'Mahad M Cigale', '615779523', NULL, 'Heart Desease', '230', '10', 'Argentina', '2009-01-18', '30m wershadaha', 6, NULL, 'Doctor', 1, '', '', '', '', '', 'Dr'),
(18, 'Mahad Mac', '615148065', NULL, 'Heart Desease', '800', '10', 'Anguilla', '2004-01-18', 'mugadishu', 6, NULL, 'Doctor', 1, '', '', '', '', '', 'Dr'),
(19, 'Smart Doctor', '616266121', NULL, 'Dermatology', '230', '020', 'Bahrain', '2021-03-05', '30m wershadaha', 1, NULL, 'Doctor', 1, '', '', '', '', '', 'Dr'),
(20, 'Hasan Uudeey', '66166121', NULL, 'Heart Desease', '1000', '30', 'Antartica', '1992-02-20', 'sana adre', 1, NULL, 'Doctor', 1, '', '', '', '', '', 'Dr'),
(21, 'Mo Cabdi', '061521188', NULL, 'Cosmetic Surgery', '219', '20', 'Ashmore and Cartier Island', '2018-04-19', 'Zom-address', 1, NULL, 'Doctor', 1, '', '', '', '', '', 'Dr'),
(22, 'Dr abdi fitah Hassan', '+252615444744', 'kamaamio@gmal.com', 'Dentistry', '0', NULL, 'Somalia', NULL, NULL, 1, 136, 'Doctor', 0, 'Male', 'Bachelor of Surgery', '', '', '', 'Dr'),
(23, 'Mohamed Cilmi', '612666316', 'moelmi@gmail.com', 'Heart Desease', '033', '4', 'Somalia', '1993-07-19', 'wardhiigley', 1, 137, 'Doctor', 0, 'Female', 'Master of Medical Science', 'Sanaag', '3', 'this the baio of this dcoto r', 'Mis'),
(24, 'Abdulaahi Axme', '6162166621', 'abdalla@gmail.com', 'Massage Therapy and Body Contour', '0', '20', '', '1993-07-19', 'hodan 30 m', 1, 139, 'Doctor', 0, 'Male', 'Master of Medical Science', 'Banaadir', '3', 'aniga waxaan doctor caalami ah heystana shahaadoyin', 'Dr'),
(25, 'Hamze ali', '6162166644', 'Ham@gmai.com', 'Plastic Surgery', '0', '20', '', '2018-07-03', 'aruba s43', 1, 141, 'Doctor', 0, 'Male', 'Master of Medical Science', 'Bakool', '3', 'unufuisdf hfas fasdf as  fasd', 'Dr'),
(26, 'Hodan Hassan', '612777222', 'hodanhassan@gmail.com', 'Heart Desease', '2120', '10', 'Angola', '1993-07-09', 'Hodan 40m', 1, 142, 'Doctor', 0, 'Male', 'Master of Clinical Medicine', 'Cuando Cubango', '3', 'this is international bio', 'Mis'),
(27, 'abdi hasan', '617772177', 'moe@gmail.com', 'Aesthetics', '0', NULL, '', NULL, NULL, 6, 144, 'Doctor', 0, 'Male', 'Doctor of Osteopathic Medicine', '', '', '', ''),
(28, 'hassan abdi', '615663320', 'drhassan@hmail.com', 'Dentistry', '0', NULL, 'Somalia', '1993-08-08', NULL, 6, 147, 'Doctor', 0, 'Male', 'Bachelor of Surgery', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `strenght_list`
--

CREATE TABLE `strenght_list` (
  `sl_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strenght_list`
--

INSERT INTO `strenght_list` (`sl_id`, `name`) VALUES
(3, '500'),
(4, '100'),
(5, '20');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `parent_id` int(50) DEFAULT NULL,
  `advice` text,
  `report` varchar(50) DEFAULT NULL,
  `low` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `amount`, `type`, `parent_id`, `advice`, `report`, `low`, `status_id`, `description`) VALUES
(1, 'Allergy Screening', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(2, 'Diabetes', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(3, 'Health Profiles', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(14, 'Hormone Replacement Therapy Monitoring', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(15, 'Immunity Testing', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(17, 'Infectious Disease Screening', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(18, 'Thyroid Screening & Monitoring', NULL, 'Group', NULL, NULL, NULL, NULL, 1, ''),
(31, 'Allergy Screen - Inhalants', '125', 'Item', 14, 'Can help determine if you are allergic to any of the following to assist in identifying allergen sources that you may want to avoid: \r\n \r\n Acacia Tree, Alternaria alternata (mold), Bermuda Grass, Cat Epithelium & Dander, Common Ragweed, Dermatophagoides farinae (dust mite), Dog Dander, Elm Tree, German Cockroach, Kentucky Blue Grass, Oak Tree, Russian Thistle and Sheep Sorell.', 'this', 'no', 0, ''),
(32, 'Diabetes Screen (Glucose only)', '120', 'Item', 1, 'Please do not eat or drink anything except water for 8-12 hours before your test.', 'this', 'no', 1, 'Detects diabetes or a pre-diabetic condition.'),
(38, 'Diabetes Management Panel', '10', 'Item', 14, 'Please do not eat or drink anything except water for 8-12 hours before your test.', 'this', 'yes', 1, 'For patients already diagnosed with diabetes. Includes both Glucose and Hemoglobin A1c, which monitors glucose over a period of time.'),
(39, 'Fasting Insulin', '22', 'Item', 14, 'Please do not eat or drink anything except water for 8-12 hours before your test.', 'this', 'yes', 1, 'This test is intended only as a predictor for metabolic syndrome or hyperinsulinemia and is not useful for measuring insulin levels to monitor synthetic insulin use.'),
(40, 'diabateics', NULL, 'Group', NULL, NULL, NULL, NULL, 0, NULL),
(41, 'Other', NULL, 'Group', NULL, NULL, NULL, NULL, 1, NULL),
(42, 'Malaria', '10', 'Item', 41, 'NoWarning', 'this', 'yes', 1, 'this Other group for no more about description'),
(43, 'Masuclar', NULL, 'Group', NULL, NULL, NULL, NULL, 1, NULL),
(44, 'Joints pain', '20', 'Item', 43, 'This is related mascular pain and joints don&#039;t run as faster more than 1 hour before this test', 'this', 'yes', 1, 'this is test about knee jionts arms and etc'),
(45, 'Knee pain', '10', 'Item', 1, 'this pain  more', 'this', 'yes', 1, 'this not resatable pain'),
(46, 'Palm Pain', '15', 'Item', 43, 'this palm paint', 'this', 'yes', 1, 'this palm or hand joint test or surgery'),
(47, 'Alergy', NULL, 'Group', NULL, NULL, NULL, NULL, 1, NULL),
(48, 'Tuberclouse TB', NULL, 'Group', NULL, NULL, NULL, NULL, 1, NULL),
(49, 'Tb v20', '20', 'Item', 48, 'dtrink more water', 'this', 'yes', 1, 'h d adadu a sd  suh');

-- --------------------------------------------------------

--
-- Table structure for table `test_order_detail`
--

CREATE TABLE `test_order_detail` (
  `id` int(11) NOT NULL,
  `test_order_id` int(11) DEFAULT NULL,
  `result` text,
  `note` text,
  `test_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `ranges` varchar(50) DEFAULT NULL,
  `units` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_order_detail`
--

INSERT INTO `test_order_detail` (`id`, `test_order_id`, `result`, `note`, `test_id`, `status_id`, `amount`, `ranges`, `units`) VALUES
(27, 15, 'positive', 'this positive', 32, 5, '220', '30 - 58', 'mg'),
(28, 15, NULL, NULL, 38, 0, '10', NULL, NULL),
(29, 16, NULL, NULL, 32, 4, '220', NULL, NULL),
(30, 16, NULL, NULL, 42, 4, '10', NULL, NULL),
(31, 17, 'Positive', 'this test is done by dr Uudey', 46, 5, '15', '20 - 120', 'KG'),
(32, 17, 'negative', 'this test is done by dr Uudey', 44, 5, '20', '20 - 120', 'KG'),
(33, 18, NULL, NULL, 44, 0, '20', NULL, NULL),
(34, 18, NULL, NULL, 45, 0, '10', NULL, NULL),
(35, 19, 'none', 'THIS IS NEGATIVE AT ALL', 32, 5, '120', '10 - 59', 'mg'),
(36, 19, 'negative', 'THIS IS NEGATIVE AT ALL', 45, 5, '10', '10 - 59', 'mg'),
(37, 20, NULL, NULL, 32, 2, '120', NULL, NULL),
(38, 20, NULL, NULL, 45, 2, '10', NULL, NULL),
(39, 21, NULL, NULL, 32, 2, '120', NULL, NULL),
(40, 21, NULL, NULL, 45, 2, '10', NULL, NULL),
(41, 22, NULL, NULL, 32, 2, '120', NULL, NULL),
(42, 22, NULL, NULL, 45, 2, '10', NULL, NULL),
(43, 23, NULL, NULL, 32, 2, '120', NULL, NULL),
(44, 23, NULL, NULL, 45, 2, '10', NULL, NULL),
(45, 24, NULL, NULL, 32, 2, '120', NULL, NULL),
(46, 24, NULL, NULL, 45, 2, '10', NULL, NULL),
(47, 25, NULL, NULL, 32, 2, '120', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `test_order_master`
--

CREATE TABLE `test_order_master` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,0) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_order_master`
--

INSERT INTO `test_order_master` (`id`, `patient_id`, `company_id`, `user_id`, `doctor_id`, `total_amount`, `status_id`, `date`) VALUES
(15, 8, 1, 106, 19, '220', 5, '2018-02-04 15:58:13'),
(16, 8, 1, 106, 17, '230', 4, '2018-02-24 14:00:23'),
(17, 8, 1, 106, 20, '35', 5, '2018-02-24 16:56:29'),
(18, 8, 1, 106, 18, '30', 0, '2018-03-22 14:27:43'),
(19, 8, 1, 106, 19, '130', 5, '2018-07-04 05:24:54'),
(20, 27, 1, 106, 17, '130', 2, '2018-07-16 10:05:13'),
(21, 8, 1, 106, 18, '130', 2, '2018-07-16 14:35:11'),
(22, 27, 0, 129, 21, '130', 2, '2018-07-17 08:16:58'),
(23, 27, 0, 129, 20, '130', 2, '2018-07-20 08:11:20'),
(24, 31, 0, 140, 21, '130', 2, '2018-07-28 08:49:13'),
(25, 33, 1, 106, 19, '120', 2, '2018-08-13 13:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `payment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `balance` decimal(10,0) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `account` varchar(50) NOT NULL,
  `trunsaction_type` varchar(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`payment_id`, `patient_id`, `order_id`, `order_type`, `amount`, `discount`, `balance`, `status`, `date`, `account`, `trunsaction_type`, `company_id`, `status_id`, `doctor_id`) VALUES
(68, 2, 28, 'Test', '20', '0', '20', '2', '2017-11-14', '615779523', 'payment', 1, 0, 0),
(69, 2, 29, 'Test', '20', '0', '20', '2', '2017-11-15', '615779523', 'payment', 1, 0, 0),
(70, 2, 35, 'OrderPayment', '10', '0', '10', '2', '2017-11-15', '615553080', 'payment', 1, 0, 0),
(71, 2, 26, 'AppointPayment', '20', '0', '20', '2', '2017-11-15', '615553080', 'payment', 1, 0, 0),
(72, 2, 30, 'AppointPayment', '10', '0', '10', '2', '2017-11-15', '615779523', 'payment', 1, 0, 0),
(73, 2, 36, 'OrderPayment', '20', '0', '20', '2', '2017-11-15', '615553080', 'payment', 1, 0, 0),
(74, 2, 31, 'AppointPayment', '23', '0', '23', '2', '2017-11-15', '30575113', 'payment', 1, 0, 0),
(75, 6, 37, 'OrderPayment', '70', '20', '70', '2', '2017-12-14', '30575113', 'payment', 1, 0, 0),
(76, 2, 30, 'AppointPayment', '10', '0', '10', '2', '2018-01-11', '615760285', 'payment', 1, 0, 0),
(77, 2, 38, 'OrderPayment', '40', '0', '40', '2', '2018-02-04', '0030505212', 'payment', 1, 0, 0),
(78, 8, 18, 'TestOrderPayment', '30', '0', '30', NULL, '2018-05-12', '612515152', 'Payment', 1, 1, 0),
(79, 8, 17, 'TestOrderPayment', '35', '0', '35', NULL, '2018-05-13', '612515152', 'Payment', 1, 1, 0),
(80, 8, 16, 'TestOrderPayment', '230', '0', '230', NULL, '2018-05-23', '612515152', 'Payment', 1, 1, 0),
(81, 8, 19, 'TestOrderPayment', '130', '0', '130', NULL, '2018-07-07', '612515152', 'Payment', 1, 1, 0),
(82, 8, 15, 'TestOrderPayment', '230', '18', '212', NULL, '2018-07-21', '621666612', 'Payment', 1, 1, 0),
(83, 27, 95, 'AppointmentPayment', '10', '0', '10', NULL, '2018-07-30', '32112211', 'Payment', 0, 1, 26),
(84, 27, 95, 'AppointmentPayment', '10', '0', '10', NULL, '2018-07-30', '32112211', 'Payment', 0, 1, 26),
(85, 27, 99, 'AppointmentPayment', '10', '0', '10', NULL, '2018-08-08', '32112211', 'Payment', 0, 1, 26),
(86, 27, 101, 'AppointmentPayment', '10', '0', '10', 'Paid', '2018-08-09', '32112211', 'Payment', 0, 1, 26),
(87, 27, 101, 'AppointmentPayment', '10', '0', '10', 'Paid', '2018-08-09', '32112211', 'Payment', 0, 1, 26),
(88, 27, 101, 'AppointmentPayment', '10', '0', '10', 'Paid', '2018-08-09', '32112211', 'Payment', 0, 1, 26);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`, `group_id`) VALUES
(9, 'mg', 1),
(10, 'kg', 2),
(11, 'Mascular pain', 1),
(12, 'LBS', 1),
(13, 'KG', 43),
(14, 'HRs', 48);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `default_language_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `default_cash_account_id` int(11) DEFAULT NULL,
  `role_type_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `updated_date` datetime NOT NULL,
  `registered_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `status_id`, `default_language_id`, `company_id`, `mobile`, `phone`, `address`, `city`, `country`, `default_cash_account_id`, `role_type_id`, `date`, `updated_date`, `registered_by`, `updated_at`, `image`) VALUES
(106, 'Mahad Cigale', 'mahads@gmail.com', '$2y$10$jovh7NCFLvZFQ.DxYIW3PucHNjcqPiofeZaBKdEY75xMheh72cSnO', 'KE7kP8DcU0FZjQcxM7PnOH4UKvr3uyTPlWf4gKBEAngrjP7QRPvoA4Nn9Csa', 2, 1, 1, '615779523', '615779523', 'Warta nabad -30 m', 'Moqdisho', 'Somalia', 1, 2, '0000-00-00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', ''),
(124, 'Mahad Xasan', 'mx@gmail.com', '$2y$10$jn5eSFQHzSxIH1SJC/1v5u.QTIFid/SxrU/MgM77OPnmXGFOSH58y', 'FS83AIV6PynE5VWb5BBu2PNNW3TtqikIyJ7lQ21f', 1, 1, 0, '615545554', '615545554', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-16', '2018-07-16 09:00:30', 0, '0000-00-00 00:00:00', ''),
(125, 'Mo Ali', 'moali@gmail.com', '$2y$10$lEk/4/gL5EIG4Lky1Qzw0.BEKa13qVRAagy6YkdiIyIRLxJpaxjUi', 'FS83AIV6PynE5VWb5BBu2PNNW3TtqikIyJ7lQ21f', 1, 1, 0, '636163136', '636163136', '0', 'Annaba', 'Algeria', 0, 1, '2018-07-16', '2018-07-16 09:06:39', 0, '0000-00-00 00:00:00', ''),
(126, 'aasfasfd', 'qw@adA.AS', '$2y$10$sS.CT0MW/g0RSC1H6oPDGOnrBBEfiTttnVsPPKuw7R7i3/ABFxiTO', 'FS83AIV6PynE5VWb5BBu2PNNW3TtqikIyJ7lQ21f', 1, 1, 0, '45523523523', '45523523523', '0', 'Saint Peter', 'Antigua and Barbuda', 0, 1, '2018-07-16', '2018-07-16 09:47:28', 0, '0000-00-00 00:00:00', ''),
(127, 'MAHAD CEYNTE', 'CEYNTE@GMAIL.COM', '$2y$10$u.ht9eQFiZYVi9OMOTEKz.I4mdUGI6T7zj4CLKSzgWQgMKGrvUrW.', 'FS83AIV6PynE5VWb5BBu2PNNW3TtqikIyJ7lQ21f', 1, 1, 0, '615574474', '615574474', '0', 'Saint Paul', 'Antigua and Barbuda', 0, 1, '2018-07-16', '2018-07-16 09:49:12', 0, '0000-00-00 00:00:00', ''),
(128, 'CABDI CAWAALE', 'CABDICAWAALE@GMAIL.COM', '$2y$10$HDaTBMbsWO/tVmdUf4KFtuCjA.u9K.F6XjUy.vkvP2hYp1/kHsU4G', 'FS83AIV6PynE5VWb5BBu2PNNW3TtqikIyJ7lQ21f', 1, 1, 0, '6155778783', '6155778783', '0', 'Cordoba', 'Argentina', 0, 1, '2018-07-16', '2018-07-16 09:51:39', 0, '0000-00-00 00:00:00', ''),
(129, 'sahra xasan', 'sahraxasan@gmail.com', '$2y$10$cjl1ZaHmITPYh9AqZ5blbej02Diswblz0wA/l2eezEa6QmT2Wr3w.', '5AHc2YZZAezGrh3bbK50v1OlHjIABFwUQpu611OkgfxY1oENd31EgUMRCELe', 1, 1, 0, '615574411', '615574411', '0', 'Balakan Rayonu', 'Azerbaijan', 0, 1, '2018-07-16', '2018-07-16 09:53:24', 0, '0000-00-00 00:00:00', ''),
(130, 'Dahaba ali geedi', 'dahaali@gmail.com', '$2y$10$9duRSh/xo8uHa5Ca2pX88OE5SW2pP4a2l76LvrLnQfAM5IPxnaZKK', 'ab6l7mQ3erm2IvQwEaZZ8W1CbaP0Hi5qmPikLVfE5QE3dLb7Uv4GXrpk7kRh', 1, 1, 0, '615140773', '615140773', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-19', '2018-07-19 15:16:06', 0, '0000-00-00 00:00:00', ''),
(131, 'cabdi raxmaan xaamud', 'xaamud@gmail.com', '$2y$10$1BozSMTIn03H7zV/ipxZn.jpFe0JiU8jJV9SbRgFPIkXHwd7hL/nm', '09nTOXt3VKdUsI9ehY1nhYh8igwlUHnUsWkI8ulLqq9M8Vq4tNoHtxhO6lsF', 1, 1, 0, '615777824', '615777824', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-21', '2018-07-21 10:17:42', 0, '0000-00-00 00:00:00', ''),
(135, NULL, NULL, '$2y$10$4uZhQUFrXwpTKnhplVfDkuluNolTywrDmyhtyn40PCyZ1yDuI3jtu', 'XDHII5o9nZFQPJvVKubU1ikdsGwRAiMFjqSfAFwF', 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, '2018-07-21', '2018-07-21 14:51:25', 0, '0000-00-00 00:00:00', ''),
(136, 'Dr abdi fitah Hassan', 'kamaamio@gmal.com', '$2y$10$UGPg2fTvXhylogf2mVsN9.pyJoHZmkb4njZToOu3VbbchvMfVxm7m', 'Og88DleUwINDIBhhXbmb6d2KnEuVn4Gaz1qFDZ1F', 1, 1, 0, NULL, '+252615444744', NULL, NULL, 'Algeria', 0, 3, '2018-07-25', '0000-00-00 00:00:00', 0, '2018-07-25 06:57:04', ''),
(137, 'Mohamed Cilmi', 'moelmi@gmail.com', '$2y$10$F/3P7iHe3d5Ik0LZdU9BVOwkJ5s0DGY6dG8SsTtdeAqwzWBsaTlSa', 'CfpUAL3jOsuO5HkXwmH01skQvgs1f4HWkeQgRqJJbTshMTrU9oB6UxGKjxFI', 1, 1, 0, NULL, '612666316', '3 wa', 'Sanaag', 'Somalia', 0, 3, '2018-07-25', '0000-00-00 00:00:00', 0, '2018-07-26 23:12:23', ''),
(138, 'abdulaahi axmed', 'abda@gmail.com', '$2y$10$RYhBpnSwgJcLkajEbopjiOuFG6YnGWZK.pRndLbif21hFeEROU79S', 'Ei3sJcPERGJOrZfPuThzX9PKzxwiDwSo5Zz8nZfAUJgZu30P5UXjWAiVUrIm', 1, 1, 0, '615000279', '615000279', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-27', '2018-07-27 15:05:08', 0, '0000-00-00 00:00:00', ''),
(139, 'Abdulaahi Axme', 'abdalla@gmail.com', '$2y$10$JXz0gq8JWFT2twE4gzksv.KsWKk7LALtzdIwTXZHi4XoYX25xPx9q', 'v8eHuqbiIGOylMAyW4hduqNFvG9xExEG4FiSIhhK1KeWJSEZqyw1UfipgFJk', 1, 1, 0, NULL, '6162166621', 'hodan 30 m', 'Banaadir', 'Paraguay', 0, 3, '2018-07-27', '0000-00-00 00:00:00', 0, '2018-07-27 15:19:49', ''),
(140, 'Hamze abdi', 'Hamze@gmai.com', '$2y$10$huerWateMoOKrnSZlNEBjOspufX1umbEZWTJIpHqNkycXu7Nv6kz2', 'x0Zqm0AU7GsFSd4T4MRmzoUXweXi20AVHm65HqcoFVqACE2ppctBcB2XcFyh', 1, 1, 0, '615443322', '615443322', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-28', '2018-07-28 08:43:28', 0, '0000-00-00 00:00:00', ''),
(141, 'Hamze ali', 'Ham@gmai.com', '$2y$10$3/l8wjmhYJGwD99/O75pauUuO506Dm5ml6FnBBKeB40qFXip1GutS', '5ZinoPiuHTlhyVynJ4xCXpAPHcbBmP4BnQyRQb5rPc8U5R5JDEA55M974rLX', 1, 1, 0, NULL, '6162166644', 'aruba s43', 'Bakool', 'Somalia', 0, 3, '2018-07-28', '0000-00-00 00:00:00', 0, '2018-07-28 08:55:24', ''),
(142, 'Hodan Hassan', 'hodanhassan@gmail.com', '$2y$10$Tb39LZ/pTUnJkTFESt/GFu.A9edGhjmMdG68vOCqGRzhwXAolOUNG', '3svp5U0luG1F4vPHRV0AyR9oEsnc864H79bZLvk3OhNNcFmrde988L9KKHeq', 1, 1, 0, NULL, '612777211', 'Hodan 40m', 'Cuando Cubango', 'Somalia', 0, 3, '2018-07-29', '0000-00-00 00:00:00', 0, '2018-08-13 14:09:40', ''),
(143, 'cabdi', 'droopshit@gmail.co', '$2y$10$7Y5A3Pc.Hij5Fw9zzLzR7O0b50LqQ4yFtCkHK3qBpGD8gAiLtvUXe', 'K0WW26WWyPvOsEyYc15r0hWjyGebKEbr8o943BaO', 1, 1, 0, '63713613131', '63713613131', '0', 'Devoll (Bilisht)', 'Albania', 0, 1, '2018-07-30', '2018-07-30 06:51:57', 0, '0000-00-00 00:00:00', ''),
(144, 'abdi hasan', 'moe@gmail.com', '$2y$10$hElwj2InWwAXnCnnvtawN.b5NQtq.DdW9JXgOtF4JCCp42ocAKO9O', 'dGKeppoReinUkskaSBYuqyT1zeXlMEJ6UouBZUMs4WmsvDT4YQGILZil2KI3', 1, 1, 0, NULL, '617772177', NULL, NULL, 'Albania', 0, 3, '2018-07-30', '0000-00-00 00:00:00', 0, '2018-07-30 06:53:30', ''),
(145, 'Almas hasan', 'almaas@gmail.com', '$2y$10$dmkIN6rVrEJxNyF48f.DZu5cjs8Gbes1pww5ewRg0u0LyFpIvdaQm', '2WZe4L8uHbtsYpr72hcIiVZFz5kQRFcs1qpmixyw0NBWvJsQckCP68BJjnnx', 1, 1, 0, '612555511', '612555511', '0', 'Annaba', 'Algeria', 0, 1, '2018-07-30', '2018-07-30 07:02:43', 0, '0000-00-00 00:00:00', ''),
(146, 'dahaba ali', 'dahaba@gmail.com', '$2y$10$u3eYtfiXRVYuGI3adpTrqOCesglKr5cpvHgoqPVHJdgD0wJH/uiZe', 'LIyyb0Kq4WlmDeF6jZIG8QFVSqZaCqauOpsiA4y5hF9CunjJjjslIfnBQxU2', 1, 1, 0, '615779520', '615779520', '0', 'Banaadir', 'Somalia', 0, 1, '2018-07-30', '2018-07-30 07:23:12', 0, '0000-00-00 00:00:00', ''),
(147, 'hassan abdi', 'drhassan@hmail.com', '$2y$10$2bdsMPg7h.i9zhTuVZO6YuJrO9xZ9cj715uaOaqAHJ8GmDEiPtml2', 'HJWnHjLMlC2c4SRKR7ovHoeeoTQKU3gwK2KBVSqK6L6prSbOnEzucm9xJ9kv', 1, 1, 0, NULL, '615663320', NULL, NULL, 'Somalia', 0, 3, '2018-07-30', '0000-00-00 00:00:00', 0, '2018-07-30 07:28:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role_maping`
--

CREATE TABLE `user_role_maping` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `varaible_lists`
--

CREATE TABLE `varaible_lists` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `group_key` varchar(50) DEFAULT NULL,
  `type_key` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varaible_lists`
--

INSERT INTO `varaible_lists` (`status_id`, `status_name`, `description`, `group_key`, `type_key`, `parent_id`, `number`) VALUES
(1, 'Approval Requried', 'Orders that need administrative approval', 'TestOrderStatuses', 'Status', 0, 1),
(2, 'Awaiting payment', 'Payment is required', 'TestOrderStatuses', 'Status', 0, 2),
(3, 'Lab queue', 'Added to the lab que', 'TestOrderStatuses', 'Status', 0, 3),
(4, 'Awaiting result', 'Result is pending', 'TestOrderStatuses', 'Status', 0, 4),
(5, 'Completed', 'Result has been provided', 'TestOrderStatuses', 'Status', 0, 5),
(6, 'Cancelled', 'Cancelled', 'TestOrderStatuses', 'Status', 0, 6),
(7, 'Returned', 'Returned', 'TestOrderStatuses', 'Status', 0, 7),
(8, 'Heart Desease', NULL, 'Specialities', 'Category', 0, 8),
(9, 'Aesthetic, Reconstructive and Plastic Surgery', NULL, 'Specialities', 'Category', 0, 1),
(10, 'Aesthetics', NULL, 'Specialities', 'Category', 0, 2),
(11, 'Allergy and Immunology', NULL, 'Specialities', 'Category', 0, 3),
(12, 'Anesthesiology', NULL, 'Specialities', 'Category', 0, 4),
(13, 'Anesthesia', NULL, 'Specialities', 'Category', 0, 5),
(14, 'Antenatal Classes', NULL, 'Specialities', 'Category', 0, 6),
(15, 'Assisted Reproduction', NULL, 'Specialities', 'Category', 0, 7),
(16, 'Audiology', NULL, 'Specialities', 'Category', 0, 8),
(17, 'Bariatric Surgery', NULL, 'Specialities', 'Category', 0, 9),
(18, 'Cardiac Sciences', NULL, 'Specialities', 'Category', 0, 10),
(19, 'Cardiology', NULL, 'Specialities', 'Category', 0, 11),
(20, 'Cosmetic & Dermatology', NULL, 'Specialities', 'Category', 0, 12),
(21, 'Cosmetic Surgery', NULL, 'Specialities', 'Category', 0, 13),
(22, 'Critical Care', NULL, 'Specialities', 'Category', 0, 14),
(23, 'Dentistry', NULL, 'Specialities', 'Category', 0, 15),
(24, 'Dermatology', NULL, 'Specialities', 'Category', 0, 16),
(25, 'Diagnostic Services', NULL, 'Specialities', 'Category', 0, 17),
(26, 'Dietetics & Nutrition', NULL, 'Specialities', 'Category', 0, 18),
(27, 'Dietitian', NULL, 'Specialities', 'Category', 0, 19),
(28, 'Embryology and Genetics', NULL, 'Specialities', 'Category', 0, 20),
(29, 'Emergency Medicine', NULL, 'Specialities', 'Category', 0, 21),
(30, 'Endocrinology, Diabetology and Metabolic disorders', NULL, 'Specialities', 'Category', 0, 22),
(31, 'ENT', NULL, 'Specialities', 'Category', 0, 23),
(32, 'ENT, Head and Neck Surgery', NULL, 'Specialities', 'Category', 0, 24),
(33, 'Facial Therapy', NULL, 'Specialities', 'Category', 0, 25),
(34, 'Family Medicine', NULL, 'Specialities', 'Category', 0, 26),
(35, 'Gastroenterology', NULL, 'Specialities', 'Category', 0, 27),
(36, 'General & Laparoscopic Surgery', NULL, 'Specialities', 'Category', 0, 28),
(37, 'General Medicine', NULL, 'Specialities', 'Category', 0, 29),
(38, 'General Surgery', NULL, 'Specialities', 'Category', 0, 30),
(39, 'Gynecology & Obstetrics', NULL, 'Specialities', 'Category', 0, 31),
(40, 'Hair Transplant', NULL, 'Specialities', 'Category', 0, 32),
(41, 'Home care', NULL, 'Specialities', 'Category', 0, 33),
(42, 'Home Diagnostics', NULL, 'Specialities', 'Category', 0, 34),
(43, 'Homeopathy', NULL, 'Specialities', 'Category', 0, 35),
(44, 'I.C.U', NULL, 'Specialities', 'Category', 0, 36),
(45, 'Internal Medicine', NULL, 'Specialities', 'Category', 0, 37),
(46, 'IVF & Infertility', NULL, 'Specialities', 'Category', 0, 38),
(47, 'Lactation', NULL, 'Specialities', 'Category', 0, 39),
(48, 'Lactation Consultation', NULL, 'Specialities', 'Category', 0, 40),
(49, 'Laser Hair Removal', NULL, 'Specialities', 'Category', 0, 41),
(50, 'Laser Therapy', NULL, 'Specialities', 'Category', 0, 42),
(51, 'Massage Therapy and Body Contour', NULL, 'Specialities', 'Category', 0, 43),
(52, 'Medical Massage Therapy', NULL, 'Specialities', 'Category', 0, 44),
(53, 'Medical Oncology', NULL, 'Specialities', 'Category', 0, 45),
(54, 'Midwifery Services', NULL, 'Specialities', 'Category', 0, 46),
(55, 'Naturopathy', NULL, 'Specialities', 'Category', 0, 47),
(56, 'Neonatology', NULL, 'Specialities', 'Category', 0, 48),
(57, 'Nephrology', NULL, 'Specialities', 'Category', 0, 49),
(58, 'Neurology', NULL, 'Specialities', 'Category', 0, 50),
(59, 'Neuroscience', NULL, 'Specialities', 'Category', 0, 51),
(60, 'Neurosurgery', NULL, 'Specialities', 'Category', 0, 52),
(61, 'Nursing', NULL, 'Specialities', 'Category', 0, 53),
(62, 'Nutrition', NULL, 'Specialities', 'Category', 0, 54),
(63, 'OB/GYN', NULL, 'Specialities', 'Category', 0, 55),
(64, 'Occupational Therapy', NULL, 'Specialities', 'Category', 0, 56),
(65, 'Ophthalmology', NULL, 'Specialities', 'Category', 0, 57),
(66, 'Oral and Maxillofacial Surgery', NULL, 'Specialities', 'Category', 0, 58),
(67, 'Orthopedics', NULL, 'Specialities', 'Category', 0, 59),
(68, 'Osteopathy', NULL, 'Specialities', 'Category', 0, 60),
(69, 'Pediatrics', NULL, 'Specialities', 'Category', 0, 61),
(70, 'Pain Medicine', NULL, 'Specialities', 'Category', 0, 62),
(71, 'Pathology', NULL, 'Specialities', 'Category', 0, 63),
(72, 'Pharmacy', NULL, 'Specialities', 'Category', 0, 64),
(73, 'Physical Medical & Rehabilitation', NULL, 'Specialities', 'Category', 0, 65),
(74, 'Physicians', NULL, 'Specialities', 'Category', 0, 66),
(75, 'Physiotherapy', NULL, 'Specialities', 'Category', 0, 67),
(76, 'PICU', NULL, 'Specialities', 'Category', 0, 68),
(77, 'Plastic Surgery', NULL, 'Specialities', 'Category', 0, 69),
(78, 'Psychiatry', NULL, 'Specialities', 'Category', 0, 70),
(79, 'Psychology', NULL, 'Specialities', 'Category', 0, 71),
(80, 'Pulmonology', NULL, 'Specialities', 'Category', 0, 72),
(81, 'Radiology', NULL, 'Specialities', 'Category', 0, 73),
(82, 'Rehabilitation', NULL, 'Specialities', 'Category', 0, 74),
(83, 'Rheumatology', NULL, 'Specialities', 'Category', 0, 75),
(84, 'Speech Therapy', NULL, 'Specialities', 'Category', 0, 76),
(85, 'Surgical Oncology', NULL, 'Specialities', 'Category', 0, 77),
(86, 'Tanning Spa', NULL, 'Specialities', 'Category', 0, 78),
(87, 'Urology', NULL, 'Specialities', 'Category', 0, 79),
(88, 'Urology and Andrology', NULL, 'Specialities', 'Category', 0, 80),
(89, 'Vascular and Endovascular Surgery', NULL, 'Specialities', 'Category', 0, 81),
(91, 'Curent:curently has this', NULL, 'condition', 'Status', 0, 82),
(92, 'Weight', NULL, 'MessurementTypes', 'Type', 0, 0),
(93, 'Hieght', NULL, 'MessurementTypes', 'Type', 0, 0),
(94, 'Blood Pressure', NULL, 'MessurementTypes', 'Type', 0, 0),
(95, 'Blood Glucose', NULL, 'MessurementTypes', 'Type', 0, 0),
(96, 'Yes', NULL, 'IrregularHeartbeatDetected', 'Type', 0, 0),
(97, 'No', NULL, 'IrregularHeartbeatDetected', 'Type', 0, 0),
(98, 'Don\'t Know', NULL, 'IrregularHeartbeatDetected', 'Type', 0, 0),
(99, 'Plasma', '', 'CollectionTypeId', 'Type', 0, 0),
(100, 'Whole Blood', '', 'CollectionTypeId', 'Type', 0, 0),
(101, 'Kg', NULL, 'WeightUnit', 'Type', 0, 0),
(102, 'Lbs', NULL, 'WeightUnit', 'Unit', 0, 0),
(103, 'Oz', NULL, 'WeightUnit', 'Unit', 0, 0),
(104, 'mmHg', NULL, 'BGUnit', 'Unit', 0, 0),
(105, 'Beats per Minute', NULL, 'BGUnit', 'Unit', 0, 0),
(106, 'AfterBreakfast', 'After Breakfast', 'BGUnit', 'Type', 0, 0),
(107, 'AfterDinner', 'After dinner', 'BGUnit', 'Type', 0, 0),
(108, 'AfterExercise', 'After exercise', 'BGUnit', 'Type', 0, 0),
(109, 'AfterLunch', 'After lunch', 'BGUnit', 'Type', 0, 0),
(110, 'AfterMeal', 'After meal', 'BGUnit', 'Type', 0, 0),
(111, 'BeforeBedtime', 'Before bedtime', 'BGUnit', 'Type', 0, 0),
(112, 'BeforeBreakfast', 'Before breakfast', 'BGUnit', 'Type', 0, 0),
(113, 'BeforeDinner', 'Before dinner', 'BGUnit', 'Type', 0, 0),
(114, 'BeforeExercise', 'Before exercise', 'BGUnit', 'Type', 0, 0),
(115, 'BeforeLunch', 'Before lunch', 'BGUnit', 'Type', 0, 0),
(116, 'BeforeMeal', 'Before meal', 'BGUnit', 'Type', 0, 0),
(117, 'fasting', 'Fasting', 'BGUnit', 'Type', 0, 0),
(118, 'Ignore', 'Ignore', 'BGUnit', 'Type', 0, 0),
(119, 'non-fasting', 'Non-fasting', 'BGUnit', 'Type', 0, 0),
(120, 'Blood', NULL, 'BGType', 'Type', 0, 0),
(121, 'Plasma', NULL, 'BGType', 'Type', 0, 0),
(122, 'Mg/dl', NULL, 'BGUnit1', 'Unit', 0, 0),
(123, 'cm', 'Cent Meter', 'HeightUnit', 'Unit', 0, 0),
(124, 'Feet', 'British Unit ', 'HeightUnit', 'Unit', 0, 0),
(125, 'inch', 'British Unit ', 'HeightUnit', 'Unit', 0, 0),
(126, 'Deleted', 'Item deleted in the system  eg data', 'SystemEvents', 'Remove', 0, 0),
(127, 'accounting', 'null', 'Accounting', 'AccountingType', 0, 0),
(128, 'payroll,', 'null', 'Accounting', 'AccountingType', 0, 0),
(129, 'education', 'null', 'Accounting', 'AccountingType', 0, 0),
(130, 'ecomerce', 'null', 'Accounting', 'AccountingType', 0, 0),
(131, 'general voucher', 'null', 'Accounting', 'AccountingType', 0, 0),
(132, 'asset', 'null', 'ChartAccount', 'AccountingType', 0, 0),
(133, 'liability', 'null', 'ChartAccount', 'AccountingType', 0, 0),
(134, 'equity', 'null', 'ChartAccount', 'AccountingType', 0, 0),
(135, 'expenses', 'null', 'ChartAccount', 'AccountingType', 0, 0),
(136, 'revenues', 'null', 'ChartAccount', 'AccountingType', 0, 0),
(137, 'Cash Receipt', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(138, 'Invoice', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(139, 'Payable', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(140, 'Cash payment', 'AccountReferenceType', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(141, 'Sales', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(142, 'Purchase', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(143, 'Sales Return', 'null', 'VoucherRefrenceTypes', 'AccountingType', 0, 0),
(144, 'draft', 'null', 'AccountingStatus', 'AccountingType', 0, 0),
(145, 'to be posted', 'null', 'AccountingStatus', 'AccountingType', 0, 0),
(146, 'posted', 'null', 'AccountingStatus', 'AccountingType', 0, 0),
(147, 'deleted', 'null', 'AccountingStatus', 'AccountingType', 0, 0),
(148, 'general', 'null', 'AccountingRM', 'AccountingType', 0, 0),
(149, 'detail', 'null', 'AccountingRM', 'AccountingType', 0, 0),
(150, 'General Journal', 'journal', 'AccountReferenceType', 'AccountingType', 0, 0),
(151, 'General Voucher', 'this source used general ledger journal', 'VoucherSource', 'AccountingType', 0, 0),
(152, 'Debit', 'This account is debit for journal ', 'AccountingItem', 'AccountingType', 0, 0),
(153, 'Credit', 'This is credit journal account category', 'AccountingItem', 'AccountingType', 0, 0),
(155, 'University of Somalia (UNISO)', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(156, 'Banaadir University (BU)', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(157, 'Simad University (SU)', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(158, 'Somali Inernational University (SIU)', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(159, 'Jazeera University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(160, 'Plasma University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(161, 'Amoud University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(162, 'Hargiesa University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(163, 'Puntland State University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(164, 'Horseed University', 'have a faculty of medicine ', 'University', 'MedicineUniversity', 0, 0),
(165, 'Rejected', 'This mean your request has been rejected', 'AppointmentStatus', 'Status', 0, 0),
(166, 'Awaiting Payment Doctor Approval', 'This mean your request has of payment is still pen', 'AppointmentStatus', 'Status', 0, 0),
(167, 'Due To', 'have a faculty of medicine ', 'AppointmentStatus', 'Status', 0, 0),
(168, 'Mrs', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(169, 'Mr', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(170, 'Dr', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(171, 'Drs', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(172, 'Mis', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(173, 'Mrs', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0),
(174, 'Prof', 'Doctor titles that available in the system', 'DoctorTitles', 'Title', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_account`
--
ALTER TABLE `chart_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chealths`
--
ALTER TABLE `chealths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daignosis_list`
--
ALTER TABLE `daignosis_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosage_unit_list`
--
ALTER TABLE `dosage_unit_list`
  ADD PRIMARY KEY (`dul_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequency_list`
--
ALTER TABLE `frequency_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `medication_dosage_units`
--
ALTER TABLE `medication_dosage_units`
  ADD PRIMARY KEY (`mdu_id`);

--
-- Indexes for table `medication_list`
--
ALTER TABLE `medication_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication_route`
--
ALTER TABLE `medication_route`
  ADD PRIMARY KEY (`mr_id`);

--
-- Indexes for table `medication_strenght`
--
ALTER TABLE `medication_strenght`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissionas`
--
ALTER TABLE `permissionas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_maping`
--
ALTER TABLE `permission_maping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entity_id` (`entity_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `prescription_detail`
--
ALTER TABLE `prescription_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_list`
--
ALTER TABLE `prescription_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `route_list`
--
ALTER TABLE `route_list`
  ADD PRIMARY KEY (`rl_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strenght_list`
--
ALTER TABLE `strenght_list`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_order_detail`
--
ALTER TABLE `test_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_order_master`
--
ALTER TABLE `test_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_type_id` (`role_type_id`);

--
-- Indexes for table `user_role_maping`
--
ALTER TABLE `user_role_maping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varaible_lists`
--
ALTER TABLE `varaible_lists`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `chart_account`
--
ALTER TABLE `chart_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chealths`
--
ALTER TABLE `chealths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daignosis_list`
--
ALTER TABLE `daignosis_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dosage_unit_list`
--
ALTER TABLE `dosage_unit_list`
  MODIFY `dul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `frequency_list`
--
ALTER TABLE `frequency_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medication_dosage_units`
--
ALTER TABLE `medication_dosage_units`
  MODIFY `mdu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `medication_list`
--
ALTER TABLE `medication_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `medication_route`
--
ALTER TABLE `medication_route`
  MODIFY `mr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `medication_strenght`
--
ALTER TABLE `medication_strenght`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissionas`
--
ALTER TABLE `permissionas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `permission_maping`
--
ALTER TABLE `permission_maping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `prescription_detail`
--
ALTER TABLE `prescription_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `prescription_list`
--
ALTER TABLE `prescription_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route_list`
--
ALTER TABLE `route_list`
  MODIFY `rl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `strenght_list`
--
ALTER TABLE `strenght_list`
  MODIFY `sl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `test_order_detail`
--
ALTER TABLE `test_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `test_order_master`
--
ALTER TABLE `test_order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `user_role_maping`
--
ALTER TABLE `user_role_maping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `varaible_lists`
--
ALTER TABLE `varaible_lists`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_maping`
--
ALTER TABLE `permission_maping`
  ADD CONSTRAINT `permission_maping_ibfk_1` FOREIGN KEY (`entity_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_maping_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_type_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
