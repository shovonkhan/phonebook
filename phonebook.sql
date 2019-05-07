-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 07:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairman` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managing_director` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established` date DEFAULT NULL,
  `headquarters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `type`, `bank_type`, `chairman`, `managing_director`, `established`, `headquarters`, `phone`, `website`, `image`, `history`, `created_at`, `updated_at`) VALUES
(1, 'Janata Bank', 'B', '1', 'asdfasdf', 'sfasdf', '2018-11-05', 'asdf', '01718594586', 'asdfasd', 'logoscre.png', '<p>sadfasdfasdasdfsdfsadf</p>', '2018-11-05 03:28:12', '2018-11-05 03:28:12'),
(2, 'Dutch Bangla Bank', 'Commercial bank', '2', 'Sayem Ahmed', 'N/A', '1995-01-01', 'Dhaka', '2555', 'https://www.dutchbanglabank.com', 'DBBL.jpg', '<p>naa</p>', '2018-11-22 02:12:33', '2018-11-22 02:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maneger` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `bank`, `maneger`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Gulshan -1', 'Dutch Bangla Bank', 'N/A', '2152', '<p>sdlasd</p>', '2018-11-22 02:13:08', '2018-11-22 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripiton` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descripiton`, `created_at`, `updated_at`) VALUES
(1, 'Ring Slub', '<p>fgasdgasgsa</p>', '2018-11-05 03:34:28', '2018-11-05 03:34:28'),
(2, 'OE', '<p>sdfgasdfasd</p>', '2018-11-05 03:35:01', '2018-11-05 03:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `chemicals`
--

CREATE TABLE `chemicals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `scientific` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `use_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemical_inventories`
--

CREATE TABLE `chemical_inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chemical_stors`
--

CREATE TABLE `chemical_stors` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoic_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `weight` decimal(9,2) DEFAULT NULL,
  `as_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opping_stock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_stock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managing_director` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairman` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established` date DEFAULT NULL,
  `headquarters` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `type`, `managing_director`, `chairman`, `established`, `headquarters`, `phone`, `email`, `address`, `parent`, `website`, `image`, `created_at`, `updated_at`) VALUES
(1, 'GWI Export Ltd.', '2', 'Md Mafuj Ahmed Khan', 'Nasar Khan', '2018-01-01', 'Dhaka', '1719889648', 'shovonmd40@gmail.com', '<p>This is a Export company</p>', 'GWI Export Ltd', 'www.gwi.com', 'shovon.jpg', '2018-11-22 02:07:22', '2018-11-22 02:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `sex`, `email`, `phone`, `location`, `created_at`, `updated_at`) VALUES
(14, 'Md Shovon', 'Khan', 1, 'mafujkhanmd40@gmail.com', '01719889648', 'Dhaka', '2018-10-29 04:10:34', '2018-10-29 04:10:34'),
(15, 'Md Shovon', 'Khan', 1, 'mafujkhanmd40@gmail.com', '01719889648', 'Dhaka', '2018-10-29 04:22:02', '2018-10-29 04:22:02'),
(16, 'Akter', 'Hossein', 1, 'mafujkhanmd40@gmail.com', '555555555', 'Dhaka', '2018-10-29 05:25:53', '2018-10-29 05:25:53'),
(17, 'Md Khan', 'Last Name', 2, 'shoomd40@gmail.com', '01712985566', 'Dhaka', '2018-10-30 04:06:00', '2018-10-30 04:06:00'),
(18, 'Mahbub', 'Hoisain', 1, 'mafujkhanmd40@gmail.com', '01718594586', 'Shahdatpur', '2018-10-30 04:24:21', '2018-10-30 04:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `daily_consumptions`
--

CREATE TABLE `daily_consumptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `lot_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_yarn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yarn_count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wp_length` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yarn_weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_stop_mark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dyeing_length` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indigo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hydrose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_black` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caustic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sodium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trilon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setamol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premasol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `glucose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_black` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modifide_starch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_starch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uni_soft` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pva` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cms` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_officer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_oparetor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_shift` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(10) UNSIGNED NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chq_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(11,2) NOT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date` date DEFAULT NULL,
  `permission_date` date DEFAULT NULL,
  `permission_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `o_balence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_balence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `company`, `bank`, `branch`, `chq_no`, `amount`, `purpose`, `s_date`, `permission_date`, `permission_by`, `o_balence`, `c_balence`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657021', 4118000.00, 'Import L/C payment against Dyes chemical from IBBL Rampura', '2017-12-18', '2017-12-18', '1', '0', '0', 1, 'Add_student.png', '2018-11-22 02:44:12', '2018-11-22 03:03:25'),
(2, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', 'FDR', 50000000.00, 'FDR with DBBL -Gulshan circle -1 Branch', '2017-12-21', '2017-12-21', '1', '0', '0', 1, 'add_new_user.png', '2018-11-22 02:51:07', '2018-11-22 02:51:07'),
(3, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', 'FDR', 20000000.00, 'FDR with DBBL -Gulshan circle -1 Branch', '2017-12-21', '2017-12-21', '1', '0', '0', 1, 'add_payee_payer.png', '2018-11-22 02:51:53', '2018-11-22 02:51:53'),
(4, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657022', 220000.00, 'As per office requisition', '2017-12-27', '2017-12-27', '0', '0', '0', 1, 'add_new_vehicle.png', '2018-11-22 03:05:39', '2018-11-22 03:05:39'),
(5, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657023', 5000000.00, 'Deposited to Trust Bank -Pacific Co. Bd.Ltd.', '2017-12-28', '2017-12-28', '0', '0', '0', 1, 'add_page.png', '2018-11-22 03:08:38', '2018-11-22 03:08:38'),
(6, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657024', 1000000.00, 'Deposited to Prime Bank for Baridhara Flat Instalment purpose.', '2017-12-28', '2017-12-28', '0', '0', '0', 1, 'add_payee_payer.png', '2018-11-22 03:10:08', '2018-11-22 03:10:08'),
(7, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657026', 600000.00, 'IPO expenses TK 500000 and M.D sir tk. 100000', '2017-12-28', '2017-12-28', '0', '0', '0', 1, 'add_payment_method.png', '2018-11-22 03:11:39', '2018-11-22 03:11:39'),
(8, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657025', 962740.00, 'IIDFC Instalment 936275, Bank Excise duty and bank charges 26465.', '2017-12-28', '2017-12-28', '0', '0', '0', 1, 'add_syllabus.png', '2018-11-22 03:15:05', '2018-11-22 03:15:05'),
(9, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657028', 1707500.00, 'Gass bill for the month of Sept-17', '2018-01-01', '2018-01-01', '0', '0', '0', 1, 'add_section_list.png', '2018-11-22 03:17:00', '2018-11-22 03:17:00'),
(10, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657031', 284500.00, 'As per office requisition.', '2018-01-01', '2018-01-01', '0', '0', '0', 1, 'add_new_user.png', '2018-11-22 03:21:27', '2018-11-22 03:21:27'),
(11, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657032', 95000.00, 'Deposited to SIBL - PDL Account', '2018-01-01', '2018-01-01', '0', '0', '0', 1, 'add_new_issue.png', '2018-11-22 03:22:45', '2018-11-22 03:22:45'),
(12, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '5657033', 50000.00, 'As per office requisition.', '2018-01-01', '2018-01-01', '0', '0', '0', 1, 'add_new_user_2.png', '2018-11-22 03:28:03', '2018-11-22 03:28:03'),
(13, 'GWI Export Ltd.', 'Dutch Bangla Bank', 'Gulshan -1', '56570211', 4118000.00, 'sgdfs', '2018-11-22', '2018-11-22', '0', '0', '0', 1, NULL, '2018-11-22 03:43:49', '2018-11-22 03:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `lcs`
--

CREATE TABLE `lcs` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `lc_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_lc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sign_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lcs`
--

INSERT INTO `lcs` (`customer_id`, `lc_type`, `master_lc_no`, `lc_date`, `customer`, `lc_value`, `pi_to`, `pi_no`, `pi_date`, `auth_date`, `description`, `total_amount`, `sign_image`, `created_at`, `updated_at`) VALUES
(15, 'BTB', '0966180400094', '2018-10-23', 'Chancellor Garments Ltd.', '20700', 'NRG Hometex Limited', '0876', '2018-10-23', 'Md Mafuj Ahmed Khan', NULL, '7260', NULL, '2018-11-01 00:33:18', '2018-11-01 00:33:18'),
(16, 'BTB', '0966180400094', '2018-10-23', 'Chancellor Garments Ltd.', '20700', 'AMBER ROTOR SPINNING MILLS LTD', '0017', '2018-10-23', 'Md Mafuj Ahmed Khan', '<p>Six Thousand Eight Hundred Sixty Tow USD only.</p>', '6862.00', NULL, '2018-11-04 02:41:33', '2018-11-04 02:41:33'),
(17, 'BTB', '1761180400439', '2018-07-31', 'Chantik Garments Ltd', '171080', 'BADSHA TEXTILES LTD', '1565', '2018-07-23', 'Md Mafuj Ahmed Khan', '<p>One Lac Twenty Eight Thousand Three Hundred Only</p>', '127174.72', NULL, '2018-11-04 02:54:06', '2018-11-04 02:54:06'),
(18, 'BTB', '12733180400195', '2018-08-02', 'Progressinve Apparels Industry', '46500', 'NRG Hometex  Limited', '0608', '2018-06-30', 'Md Mafuj Ahmed Khan', '<p>Thirty-Two Thousand Four Hundred Ninety-Three And Cent Fifty only</p>', '32493.50', NULL, '2018-11-04 03:04:37', '2018-11-04 03:04:37'),
(19, 'BTB', '1273180400195', '2018-06-30', 'Progressive Apparals Ltd.', '46500', 'NRG Hometex Limited', '0608', '2018-08-16', 'Md Mafuj Ahmed Khan', '<p>Thiry Four Thousand Eight Hundred One Only</p>', '34801', NULL, '2018-11-04 03:09:40', '2018-11-04 03:09:40'),
(20, 'BTB', '0966180400095', '2018-10-29', 'Chancellor Garments Ltd.', '20547', 'AMBER ROTOR SPINNING MILLS LTD', '0036', '2018-11-04', 'Md Mafuj Ahmed Khan', '<p>Thousand Nine Hundred Thirty Seven USD Only</p>', '10937', NULL, '2018-11-06 00:43:45', '2018-11-06 00:43:45'),
(21, 'BTB', '0966180400083', '2018-10-08', 'NRG Hometext Limited', '32742', 'W Apparels Ltd.', '0272', '2018-10-10', 'Md Mafuj Ahmed Khan', '<p>twenty-two thousand, eight hundred eighty-one</p>', '22881', NULL, '2018-11-08 01:04:02', '2018-11-08 01:04:02'),
(22, 'BTB', '2285180400452', '2018-09-30', 'PARTEX ROTOR SPINNING MILLS LTD.', '31237.50', 'NOFS Garments Ltd.', '0270', '2018-10-09', 'Md Mafuj Ahmed Khan', '<p>twenty-one thousand, eight hundred twenty-seven</p>', '21827', NULL, '2018-11-08 01:22:17', '2018-11-08 01:22:17'),
(23, 'BTB', '0966180400083', '2018-09-23', 'PARTEX ROTOR SPINNING MILLS LTD.', '42000', 'W Apparels Ltd.', '0269', '2018-10-06', 'Md Mafuj Ahmed Khan', '<p>twenty-nine thousand, three hundred twenty-four</p>', '29325', NULL, '2018-11-08 01:26:18', '2018-11-08 01:26:18'),
(24, 'BTB', '216218043347', '2018-07-23', 'Badsha Textiles Limited', '35919', 'Dowsland Apparels Ltd.', '2186', '2018-08-04', 'Md Mafuj Ahmed Khan', '<p>twenty-seven thousand</p>', '27000', NULL, '2018-11-08 01:31:49', '2018-11-08 01:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `manufacture_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Partex Group', '<p>This is Partext&nbsp;Group</p>', '2019-01-14 05:15:27', '2019-01-14 05:15:27'),
(2, 'Amber Text', '<p>This is&nbsp;Amber Text</p>', '2019-01-14 05:16:26', '2019-01-14 05:16:26'),
(3, 'Indigo Text', '<p>This is&nbsp;Indigo Text</p>', '2019-01-14 05:16:47', '2019-01-14 05:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `master_lcs`
--

CREATE TABLE `master_lcs` (
  `master_lc_id` int(10) UNSIGNED NOT NULL,
  `customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_ex_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_lcs`
--

INSERT INTO `master_lcs` (`master_lc_id`, `customer`, `lc_no`, `lc_value`, `lc_date`, `lc_ex_date`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Md Shovon', '57312212', '5000', '58', '60', 'dghfghdfg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `label`, `link`, `parent`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test', 0, 0, NULL, NULL),
(2, 'About Us', 'about-us', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menuses`
--

CREATE TABLE `menuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menuses`
--

INSERT INTO `menuses` (`id`, `name`, `parent_id`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Home', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '2014_10_12_000001_create_users_table', 1),
(19, '2014_10_12_100003_create_password_resets_table', 1),
(20, '2018_05_07_220031_create_phonebooks_table', 1),
(21, '2018_05_21_055107_create_departments_table', 1),
(22, '2018_05_21_070343_create_designations_table', 1),
(23, '2018_07_11_080154_create_banks_table', 1),
(24, '2018_07_11_102108_create_inventories_table', 1),
(25, '2018_07_15_095759_create_companies_table', 1),
(26, '2018_07_16_075628_create_branches_table', 1),
(27, '2018_07_17_061027_create_personals_table', 1),
(28, '2018_07_19_061434_create_chemicals_table', 1),
(29, '2018_07_19_080713_create_chemical_inventories_table', 1),
(30, '2018_07_19_085412_create_daily_consumptions_table', 1),
(31, '2018_07_24_095148_create_chemical_stors_table', 1),
(32, '2018_10_11_051252_create_lcs_table', 1),
(33, '2018_10_11_055322_create_orders_table', 1),
(34, '2018_10_11_055819_create_order_lcs_table', 1),
(35, '2018_10_24_122504_create_master_lcs_table', 2),
(36, '2018_10_25_074948_create_customers_table', 3),
(37, '2018_10_25_075401_create_products_table', 3),
(38, '2018_10_25_075702_create_sales_table', 3),
(39, '2018_11_05_084942_create_categories_table', 4),
(40, '2018_11_13_060111_create_stocks_table', 5),
(41, '2018_11_13_072127_create_receives_table', 5),
(42, '2018_11_13_085822_create_receive_invens_table', 6),
(43, '2018_11_13_072128_create_receives_table', 7),
(44, '2018_11_13_060112_create_stocks_table', 8),
(45, '2018_11_13_060113_create_stocks_table', 9),
(46, '2018_11_26_063824_create_menus_table', 10),
(47, '2018_11_27_070034_create_menuses_table', 11),
(48, '2018_11_27_073756_create_tbl_pages_table', 12),
(49, '2019_01_14_065520_create_yarns_table', 13),
(50, '2019_01_14_094734_create_yarn_stocks_table', 14),
(51, '2019_01_14_103116_create_yarn_receives_table', 14),
(52, '2019_01_14_103117_create_yarn_receives_table', 15),
(53, '2019_01_14_103118_create_yarn_receives_table', 16),
(55, '2019_01_14_105425_create_manufactures_table', 17),
(56, '2019_01_14_105424_create_manufactures_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `items` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `items`, `qty`, `rate`, `amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(3, 9, 1, 'iPhone 8', '5', '5', '25', '175.00', NULL, NULL),
(4, 10, 1, 'iPhone 8', '5', '50', '250', '350.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_lcs`
--

CREATE TABLE `order_lcs` (
  `id` int(10) UNSIGNED NOT NULL,
  `lc_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personals`
--

CREATE TABLE `personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h_education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `baiodata` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonebooks`
--

CREATE TABLE `phonebooks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `dis` decimal(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `designation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `category`, `company`, `p_date`, `qty`, `price`, `dis`, `amount`, `designation`, `created_at`, `updated_at`) VALUES
(9, 'NE 16/s Cotton Ring Denim', 'Ring Denim', 'NRG Hometext Limited', '2018-11-01', 2000, 3.63, '0.00', 7260.00, 'NE 16/s Cotton Ring Denim + 40D yarn elect. cleared 5402, 49.00 (NOT FOR WHITE )', NULL, NULL),
(10, '7/1 Carded Autocoro (OE) 100% Cotton Yarn', 'OE', 'AMBER ROTOR SPINNING MILLS LTD.', '2018-10-23', 3650, 1.88, '0.00', 6862.00, '7/1 Carded Autocoro (OE) 100% Cotton Yarn', NULL, NULL),
(11, '12/1', 'OE', 'Badsha Textiles Limited', '2018-07-31', 56272, 2.26, '0.00', 128300.00, '100% Cotton Karded OE Yarn', NULL, NULL),
(12, 'NE 10/s Cotton Ring Slub Denim', 'Ring Slub', 'NRG Hometext Limited', '2018-06-30', 2500, 3.05, '0.00', 7625.00, 'NE 10/s Cotton Ring Slub Denim yarn electronically cleared 5205.21.00( not for white)', NULL, NULL),
(13, 'NE 12/s Cotton Ring Denim', 'Ring Denim', 'NRG Hometext Limited', '2018-06-23', 4500, 3.55, '0.00', 15975.00, 'NE 12/s Cotton Ring Denim + 40D yarn elect. cleared 5402.49.00', NULL, NULL),
(14, '10/1 Carded Autocoro (OE) 100% Cotton yarn', 'OE', 'PARTEX ROTOR SPINNING MILLS LTD.', '2018-10-10', 4950, 1.98, '0.00', 9801.00, '10/1 Carded Autocoro (OE) 100% Cotton yarn', NULL, NULL),
(15, '12/1', 'OE', 'AMBER ROTOR SPINNING MILLS LTD.', NULL, 3500, 2.18, '0.00', 7630.00, '12/1 Carded Autocoro (OE) 100% Cotton Yarn', NULL, NULL),
(16, '16/s', 'OE', 'AMBER ROTOR SPINNING MILLS LTD.', '2018-11-06', 2650, 2.38, '0.00', 6307.00, '16/1 Carded (OE) 100% Cotton Yarn', NULL, NULL),
(17, '9/1 Carded Autocoro', 'OE', 'PARTEX ROTOR SPINNING MILLS LTD.', '2018-10-09', 4500, 1.98, '0.00', 8910.00, '9/1 Carded Autocoro (OE) 100% Cotton Yarn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receives`
--

CREATE TABLE `receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufactur` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `r_date` date DEFAULT NULL,
  `count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `bag` int(11) DEFAULT NULL,
  `rate` decimal(8,2) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receives`
--

INSERT INTO `receives` (`id`, `manufactur`, `product_id`, `r_date`, `count`, `lc_no`, `lot_no`, `qty`, `bag`, `rate`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(10, 'AMBER ROTOR SPINNING MILLS LTD.', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 25, '2.00', '7260.00', '<p>fdasdf</p>', '2018-11-15 01:56:04', '2018-11-15 01:56:04'),
(11, 'AMBER ROTOR SPINNING MILLS LTD.', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 25, '2.00', '7260.00', '<p>fdasdf</p>', '2018-11-15 01:56:38', '2018-11-15 01:56:38'),
(12, 'AMBER ROTOR SPINNING MILLS LTD.', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 25, '2.00', '7260.00', '<p>fdasdf</p>', '2018-11-15 01:57:37', '2018-11-15 01:57:37'),
(13, 'AMBER ROTOR SPINNING MILLS LTD.', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 25, '2.00', '7260.00', '<p>fdasdf</p>', '2018-11-15 01:58:14', '2018-11-15 01:58:14'),
(14, 'AMBER ROTOR SPINNING MILLS LTD.', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 25, '2.00', '7260.00', '<p>fdasdf</p>', '2018-11-15 01:58:39', '2018-11-15 01:58:39'),
(15, 'NRG Hometext Limited', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 5475, '4.00', '5000.00', '<p>4rgsdf</p>', '2018-11-15 02:03:03', '2018-11-15 02:03:03'),
(16, 'NRG Hometext Limited', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 55, '5.00', '555.00', '<p>seafs</p>', '2018-11-15 02:04:35', '2018-11-15 02:04:35'),
(17, 'NRG Hometext Limited', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 55, '5.00', '5000.00', '<p>sadfsd555</p>', '2018-11-15 02:12:41', '2018-11-15 02:12:41'),
(18, 'NRG Hometext Limited', NULL, '2018-11-15', '12/1', '57312212', '53523', 4500, 55, '5.00', '5000.00', '<p>sadfsd555</p>', '2018-11-15 02:14:19', '2018-11-15 02:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `dis` decimal(8,2) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `cus_id`, `pro_id`, `qty`, `price`, `dis`, `amount`, `created_at`, `updated_at`) VALUES
(32, 15, 9, 2000, 3.63, '0.00', 7260.00, NULL, NULL),
(33, 16, 10, 3650, 1.88, '0.00', 6862.00, NULL, NULL),
(34, 17, 11, 56272, 2.26, '0.00', 127174.72, NULL, NULL),
(35, 18, 9, 2450, 3.63, '0.00', 8893.50, NULL, NULL),
(36, 18, 12, 2500, 3.05, '0.00', 7625.00, NULL, NULL),
(37, 18, 13, 4500, 3.55, '0.00', 15975.00, NULL, NULL),
(38, 19, 9, 2450, 3.63, '0.00', 8893.50, NULL, NULL),
(39, 19, 12, 2500, 3.05, '0.00', 7625.00, NULL, NULL),
(40, 19, 13, 5150, 3.55, '0.00', 18282.50, NULL, NULL),
(41, 20, 15, 3500, 2.18, '0.00', 7630.00, NULL, NULL),
(42, 20, 16, 2650, 2.38, '0.00', 6307.00, NULL, NULL),
(43, 21, 14, 4950, 1.98, '0.00', 9801.00, NULL, NULL),
(44, 21, 15, 6000, 2.18, NULL, 13080.00, NULL, NULL),
(45, 22, 17, 4500, 1.98, '0.00', 8910.00, NULL, NULL),
(46, 22, 15, 2650, 2.18, '0.00', 5777.00, NULL, NULL),
(47, 22, 16, 3000, 2.38, '0.00', 7140.00, NULL, NULL),
(48, 23, 10, 8700, 1.88, '0.00', 16356.00, NULL, NULL),
(49, 23, 17, 6550, 1.98, '0.00', 12969.00, NULL, NULL),
(50, 24, 14, 4000, 2.25, '0.00', 9000.00, NULL, NULL),
(51, 24, 11, 8000, 2.25, '0.00', 18000.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufactur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_date` date DEFAULT NULL,
  `lc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lot_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `challen_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_stock` int(11) DEFAULT NULL,
  `qty` int(52) DEFAULT NULL,
  `bag` int(11) DEFAULT NULL,
  `receive` int(11) DEFAULT NULL,
  `rate` decimal(8,2) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `manufactur`, `count`, `r_date`, `lc_no`, `lot_no`, `challen_no`, `opening_stock`, `qty`, `bag`, `receive`, `rate`, `amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'dfgsdf', '12/1', '2018-11-15', '465', '465', '45645', 500, NULL, 25, 252, '2.50', '5000.00', 'fsgdf', '2018-11-14 23:18:25', '2018-11-15 06:39:45'),
(2, 'gsdf', '10', '2018-11-15', '54724', '44', '445', 450, NULL, 25, 530, '3.50', '5000.00', 'gsdgdf', '2018-11-14 23:23:34', '2018-11-14 22:23:30'),
(3, 'NRG Hometext Limited', '12/1', '2018-11-15', '57312212', '53523', NULL, 500, 50, 25, NULL, '2.30', '5000.00', '<p>adsfsd</p>', '2018-11-15 04:01:17', '2018-11-15 04:01:17'),
(4, 'NRG Hometext Limited', '12/1', '2018-11-18', '57312212', '53523', NULL, 5000, 4500, 52, NULL, '2.30', '5000.00', '<p>sgdf</p>', '2018-11-18 01:04:48', '2018-11-18 01:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `parent_id`, `title`, `created_at`, `updated_at`) VALUES
(1, '0', 'Home', NULL, NULL),
(2, '1', 'About', NULL, NULL),
(3, '1', 'Service', NULL, NULL),
(4, '0', 'Hono', NULL, NULL),
(5, '3', 'theko', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yarns`
--

CREATE TABLE `yarns` (
  `id` int(10) UNSIGNED NOT NULL,
  `yarn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yarns`
--

INSERT INTO `yarns` (`id`, `yarn_name`, `company_name`, `category`, `remarks`, `created_at`, `updated_at`) VALUES
(2, '10 s', 'Partex Group', 'category', '<p>This is Something like that Remarks</p>', '2019-01-14 01:49:25', '2019-01-14 01:49:25'),
(3, '9', 'Amber', 'category 1', '<p>Hum Tum - Full Title Song | Saif Ali Khan | Rani Mukerji | Alka Yagnik | Babul Supriyo</p>', '2019-01-14 03:43:43', '2019-01-14 03:43:43'),
(4, '12', 'Partex', 'category 2', '<p>Hum Tum - Full Title Song | Saif Ali Khan | Rani Mukerji | Alka Yagnik | Babul Supriyo</p>', '2019-01-14 03:44:05', '2019-01-14 03:44:05'),
(5, '16', 'Indigo', 'category 4', '<p>Hum Tum - Full Title Song | Saif Ali Khan | Rani Mukerji | Alka Yagnik | Babul Supriyo</p>', '2019-01-14 03:44:33', '2019-01-14 03:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `yarn_receives`
--

CREATE TABLE `yarn_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `yarn_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `amount` decimal(8,2) DEFAULT '0.00',
  `challan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bill` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `yarn_stocks`
--

CREATE TABLE `yarn_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `yarn_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemicals`
--
ALTER TABLE `chemicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical_inventories`
--
ALTER TABLE `chemical_inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chemical_stors`
--
ALTER TABLE `chemical_stors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_consumptions`
--
ALTER TABLE `daily_consumptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lcs`
--
ALTER TABLE `lcs`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_lcs`
--
ALTER TABLE `master_lcs`
  ADD PRIMARY KEY (`master_lc_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuses`
--
ALTER TABLE `menuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_lcs`
--
ALTER TABLE `order_lcs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_lcs_lc_id_index` (`lc_id`),
  ADD KEY `order_lcs_order_id_index` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonebooks`
--
ALTER TABLE `phonebooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receives`
--
ALTER TABLE `receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `yarns`
--
ALTER TABLE `yarns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_receives`
--
ALTER TABLE `yarn_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yarn_stocks`
--
ALTER TABLE `yarn_stocks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chemicals`
--
ALTER TABLE `chemicals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemical_inventories`
--
ALTER TABLE `chemical_inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chemical_stors`
--
ALTER TABLE `chemical_stors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `daily_consumptions`
--
ALTER TABLE `daily_consumptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lcs`
--
ALTER TABLE `lcs`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_lcs`
--
ALTER TABLE `master_lcs`
  MODIFY `master_lc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menuses`
--
ALTER TABLE `menuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_lcs`
--
ALTER TABLE `order_lcs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phonebooks`
--
ALTER TABLE `phonebooks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `receives`
--
ALTER TABLE `receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarns`
--
ALTER TABLE `yarns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `yarn_receives`
--
ALTER TABLE `yarn_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yarn_stocks`
--
ALTER TABLE `yarn_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_lcs`
--
ALTER TABLE `order_lcs`
  ADD CONSTRAINT `order_lcs_lc_id_foreign` FOREIGN KEY (`lc_id`) REFERENCES `lcs` (`customer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
