-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2016 at 10:24 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aqarmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `amalya_type_t`
--

CREATE TABLE IF NOT EXISTS `amalya_type_t` (
`amalya_type_code` int(11) NOT NULL,
  `amalya_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amalya_type_t`
--

INSERT INTO `amalya_type_t` (`amalya_type_code`, `amalya_type_name`) VALUES
(7, 'تمليك كاش'),
(8, 'تمليك تقسيط'),
(9, 'ايجار مفروش'),
(10, 'ايجار'),
(13, 'تمليك');

-- --------------------------------------------------------

--
-- Table structure for table `aqar_need`
--

CREATE TABLE IF NOT EXISTS `aqar_need` (
  `code` varchar(20) NOT NULL,
  `madena` varchar(30) NOT NULL,
  `madena_other` varchar(50) DEFAULT NULL,
  `aqar_type` varchar(30) NOT NULL,
  `aqar_type_other` varchar(50) DEFAULT NULL,
  `namozg` varchar(30) DEFAULT NULL,
  `namozg_other` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `mesaha` varchar(250) DEFAULT NULL,
  `budget` varchar(250) DEFAULT NULL,
  `tashteeb` varchar(30) NOT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `masdr` varchar(30) DEFAULT NULL,
  `entry_date` date NOT NULL,
  `modkhel` varchar(30) NOT NULL,
  `update_date` date NOT NULL,
  `motabaa` varchar(30) DEFAULT NULL,
  `amalya_type` varchar(50) NOT NULL,
  `marhala` varchar(30) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updater` varchar(50) DEFAULT NULL,
  `door` varchar(20) DEFAULT NULL,
  `view_v` varchar(250) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `WC` int(11) DEFAULT NULL,
  `kmalyat` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `details` varchar(2500) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  `tashteeb_other` varchar(250) DEFAULT NULL,
  `amalya_type_other` varchar(250) DEFAULT NULL,
  `marhala_other` varchar(250) DEFAULT NULL,
  `call_date` varchar(250) DEFAULT NULL,
  `action_history` varchar(250) DEFAULT NULL,
  `found` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aqar_need`
--

INSERT INTO `aqar_need` (`code`, `madena`, `madena_other`, `aqar_type`, `aqar_type_other`, `namozg`, `namozg_other`, `address`, `mesaha`, `budget`, `tashteeb`, `notes`, `cust_name`, `telephone`, `mobile`, `masdr`, `entry_date`, `modkhel`, `update_date`, `motabaa`, `amalya_type`, `marhala`, `log_date`, `updater`, `door`, `view_v`, `rooms`, `WC`, `kmalyat`, `email`, `whatsapp`, `remember`, `details`, `office_id`, `tashteeb_other`, `amalya_type_other`, `marhala_other`, `call_date`, `action_history`, `found`) VALUES
('10012', 'مدينتى', NULL, 'شقة', NULL, '70', NULL, NULL, '96', '325000', 'بدون', 'معها عقد وكاله', 'داليا', NULL, '1093009579', NULL, '2014-06-17', 'ايمان', '2016-11-11', 'ايمان', 'تمليك', '7', '2016-03-18 01:24:10', 'admin', '0', 'Park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10013', 'مدينتى', NULL, 'شقة', NULL, NULL, '32', NULL, '186', '1300000', '', NULL, 'م/عصام عز', '1207879596', '1017373072', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', '3', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10014', 'مدينتى', NULL, 'شقة', NULL, NULL, '74', NULL, '69', '192000', '', NULL, 'محمد ابراهيم', NULL, '1001718642', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'هند', 'ايجار', '7', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10015', 'مدينتى', NULL, 'شقة', NULL, '30', '67', NULL, '103', '630000', '', 'من طرف أ/ احمد تاج والمفتاح معاه', 'خالد محمد عبد الفتاح', NULL, '1118008999', NULL, '2014-08-20', 'ايمان', '2016-03-18', 'ايمان', 'ايجار', '6', '2016-03-18 01:24:10', 'Ibrahim', NULL, 'Narrow Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10016', 'مدينتى', NULL, 'شقة', NULL, NULL, '70', NULL, '69', '185000', '', 'الرقم غلط', 'سمير', NULL, '122252011', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', '7', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10017', 'الرحاب', NULL, 'شقة', NULL, NULL, '132', NULL, '179', '975000', '', NULL, 'محمد أبو الفتوح', '1282221001', '1282221000', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', '10', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10018', 'مدينتى', NULL, 'شقة', NULL, NULL, '73', NULL, '82', '195000', '', 'استلام فورى', 'شريف عبد الحارث', NULL, '1204569921', NULL, '2014-02-03', 'ايمان', '2016-03-18', NULL, 'تمليك', '7', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0),
('10019', 'الرحاب', NULL, 'شقة', NULL, '300', '34', NULL, '177', '940000', '', 'لما تستلم هتكلمنا تعرضها ايجار', 'سهام', '1223136441', '1224262178', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', '3', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10020', 'مدينتى', NULL, 'شقة', NULL, '300', '34', NULL, '177', '1000000', '', 'بلغتها ان السعر عالى وقالت الاوفر قابل للتفاوض', 'عطا الله فؤاد', '24183491', '1286410203', NULL, '0000-00-00', '', '2016-03-18', 'ايهاب', 'تمليك', '3', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10021', 'التجمع الخامس', NULL, 'شقة', NULL, NULL, '67', NULL, '89', '378000', '', 'جاهزة الاستلام', 'ميشيل', NULL, '100520627', NULL, '0000-00-00', '', '2016-03-18', NULL, 'تمليك', '6', '2016-03-18 01:24:10', 'Ibrahim', NULL, 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10022', 'مدينتى', NULL, 'شقة', NULL, '300', '32', NULL, '177', '455000', '', NULL, 'شيماء شاكر', NULL, '1001715913', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', '3', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('10062', 'الرحاب', 'مدينتى - التجمع الخامس', 'شقة', 'او عمارة', '11', 'او اى نموذج', 'اى مكان', '150-200', '1000-15000', 'شركة', 'لا يوجد', 'محمد حسن', '5564564', '959599', 'على', '2016-11-17', 'admin', '2016-11-17', 'على', 'تمليك كاش', '10', '2016-11-17 16:24:07', 'admin', '0', 'Park', 2, 0, 'يفضل بلوكنتين', 'بللاللالللالا', '56656', 1, 'دورين على ناصيتين', NULL, 'اى تشطيب', 'ايجار قديم', 'اولى او ثانية', '2016-11-17', 'اتصلت بيه\r\nوكلمته', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aqar_type_t`
--

CREATE TABLE IF NOT EXISTS `aqar_type_t` (
`aqar_type_code` int(11) NOT NULL,
  `aqar_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aqar_type_t`
--

INSERT INTO `aqar_type_t` (`aqar_type_code`, `aqar_type_name`) VALUES
(10, 'شقة'),
(11, 'فيلا'),
(12, 'أرض'),
(13, 'مكتب'),
(14, 'عيادة'),
(15, 'صيدلية'),
(16, 'مصنع'),
(17, 'محل'),
(18, 'اخرى');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
`citycode` int(11) NOT NULL,
  `cityname` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`citycode`, `cityname`) VALUES
(11, 'الرحاب'),
(12, 'مدينتى'),
(14, 'التجمع الخامس');

-- --------------------------------------------------------

--
-- Table structure for table `door`
--

CREATE TABLE IF NOT EXISTS `door` (
`doorcode` int(11) NOT NULL,
  `doorname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `door`
--

INSERT INTO `door` (`doorcode`, `doorname`) VALUES
(9, '0'),
(10, '1'),
(11, '2'),
(12, '3'),
(13, '4'),
(14, '5'),
(15, '6'),
(16, 'اخرى');

-- --------------------------------------------------------

--
-- Table structure for table `laqab`
--

CREATE TABLE IF NOT EXISTS `laqab` (
`laqab_code` int(11) NOT NULL,
  `laqab_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laqab`
--

INSERT INTO `laqab` (`laqab_code`, `laqab_name`) VALUES
(1, 'الاستاذ'),
(2, 'الحاج'),
(7, 'مدام'),
(8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marhala`
--

CREATE TABLE IF NOT EXISTS `marhala` (
`marhalacode` int(11) NOT NULL,
  `marhalaname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marhala`
--

INSERT INTO `marhala` (`marhalacode`, `marhalaname`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '0');

-- --------------------------------------------------------

--
-- Table structure for table `namozg`
--

CREATE TABLE IF NOT EXISTS `namozg` (
`namozgcode` int(11) NOT NULL,
  `namozgname` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `namozg`
--

INSERT INTO `namozg` (`namozgcode`, `namozgname`) VALUES
(1, NULL),
(2, '30'),
(3, '300'),
(4, '60'),
(6, '400'),
(7, 'F'),
(8, 'A2'),
(9, '500'),
(10, 'B'),
(11, 'W'),
(12, 'T'),
(13, 'L'),
(14, 'E'),
(15, 'H'),
(16, 'I2'),
(17, 'Z'),
(18, 'D'),
(19, 'U'),
(20, 'G'),
(21, 'J'),
(22, 'Y'),
(23, 'V'),
(24, 'I'),
(25, 'C'),
(26, 'X'),
(27, 'T1'),
(28, 'A'),
(29, 'M'),
(30, 'D1'),
(31, 'A1'),
(32, '1b'),
(33, 'K'),
(34, '80'),
(35, '100'),
(36, 'E1'),
(37, '11'),
(38, '200'),
(39, '700'),
(40, 'N'),
(41, 'P'),
(42, '6'),
(43, '4b'),
(44, 'O'),
(45, 'II'),
(46, 'A4'),
(47, '4'),
(51, '600'),
(52, '70');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
`id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `emp` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `com_no` varchar(250) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `emp`, `address`, `com_no`, `notes`) VALUES
(1, 'مكتب الهدى', 'الاستاذ احمد', 'الرحاب السوق العمومى', 'تليفون 2455554 موبايل 12552255', 'مكتب جديد'),
(2, 'يوتوبيا', 'ابراهيم تاج', 'الرحاب بحرى', '156566222 تليفون\r\nموبال 1525225\r\nواتس 00100000', 'منافس');

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE IF NOT EXISTS `sheet1` (
  `A` varchar(10) DEFAULT NULL,
  `B` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sheet1`
--

INSERT INTO `sheet1` (`A`, `B`) VALUES
(NULL, '70'),
(NULL, '30'),
(NULL, '300'),
(NULL, '60'),
(NULL, '600'),
(NULL, '400'),
(NULL, 'F'),
(NULL, 'A2'),
(NULL, '500'),
(NULL, 'B'),
(NULL, 'W'),
(NULL, 'T'),
(NULL, 'L'),
(NULL, 'E'),
(NULL, 'H'),
(NULL, 'I2'),
(NULL, 'Z'),
(NULL, 'D'),
(NULL, 'U'),
(NULL, 'G'),
(NULL, 'J'),
(NULL, 'Y'),
(NULL, 'V'),
(NULL, 'I'),
(NULL, 'C'),
(NULL, 'X'),
(NULL, 'T1'),
(NULL, 'A'),
(NULL, 'M'),
(NULL, 'D1'),
(NULL, 'A1'),
(NULL, '1b'),
(NULL, 'K'),
(NULL, '80'),
(NULL, '100'),
(NULL, 'E1'),
(NULL, '11'),
(NULL, '200'),
(NULL, '700'),
(NULL, 'N'),
(NULL, 'P'),
(NULL, '6'),
(NULL, '4b'),
(NULL, 'O'),
(NULL, 'II'),
(NULL, 'A4'),
(NULL, '4'),
(NULL, '70'),
(NULL, '30'),
(NULL, '300'),
(NULL, '60'),
(NULL, '600'),
(NULL, '400'),
(NULL, 'F'),
(NULL, 'A2'),
(NULL, '500'),
(NULL, 'B'),
(NULL, 'W'),
(NULL, 'T'),
(NULL, 'L'),
(NULL, 'E'),
(NULL, 'H'),
(NULL, 'I2'),
(NULL, 'Z'),
(NULL, 'D'),
(NULL, 'U'),
(NULL, 'G'),
(NULL, 'J'),
(NULL, 'Y'),
(NULL, 'V'),
(NULL, 'I'),
(NULL, 'C'),
(NULL, 'X'),
(NULL, 'T1'),
(NULL, 'A'),
(NULL, 'M'),
(NULL, 'D1'),
(NULL, 'A1'),
(NULL, '1b'),
(NULL, 'K'),
(NULL, '80'),
(NULL, '100'),
(NULL, 'E1'),
(NULL, '11'),
(NULL, '200'),
(NULL, '700'),
(NULL, 'N'),
(NULL, 'P'),
(NULL, '6'),
(NULL, '4b'),
(NULL, 'O'),
(NULL, 'II'),
(NULL, 'A4'),
(NULL, '4'),
('70', NULL),
('30', NULL),
('300', NULL),
('60', NULL),
('600', NULL),
('400', NULL),
('F', NULL),
('A2', NULL),
('500', NULL),
('B', NULL),
('W', NULL),
('T', NULL),
('L', NULL),
('E', NULL),
('H', NULL),
('I2', NULL),
('Z', NULL),
('D', NULL),
('U', NULL),
('G', NULL),
('J', NULL),
('Y', NULL),
('V', NULL),
('I', NULL),
('C', NULL),
('X', NULL),
('T1', NULL),
('A', NULL),
('M', NULL),
('D1', NULL),
('A1', NULL),
('1b', NULL),
('K', NULL),
('80', NULL),
('100', NULL),
('E1', NULL),
('11', NULL),
('200', NULL),
('700', NULL),
('N', NULL),
('P', NULL),
('6', NULL),
('4b', NULL),
('O', NULL),
('II', NULL),
('A4', NULL),
('4', NULL),
('namozgcode', 'nam'),
(NULL, '70'),
(NULL, '30'),
(NULL, '300'),
(NULL, '60'),
(NULL, '600'),
(NULL, '400'),
(NULL, 'F'),
(NULL, 'A2'),
(NULL, '500'),
(NULL, 'B'),
(NULL, 'W'),
(NULL, 'T'),
(NULL, 'L'),
(NULL, 'E'),
(NULL, 'H'),
(NULL, 'I2'),
(NULL, 'Z'),
(NULL, 'D'),
(NULL, 'U'),
(NULL, 'G'),
(NULL, 'J'),
(NULL, 'Y'),
(NULL, 'V'),
(NULL, 'I'),
(NULL, 'C'),
(NULL, 'X'),
(NULL, 'T1'),
(NULL, 'A'),
(NULL, 'M'),
(NULL, 'D1'),
(NULL, 'A1'),
(NULL, '1b'),
(NULL, 'K'),
(NULL, '80'),
(NULL, '100'),
(NULL, 'E1'),
(NULL, '11'),
(NULL, '200'),
(NULL, '700'),
(NULL, 'N'),
(NULL, 'P'),
(NULL, '6'),
(NULL, '4b'),
(NULL, 'O'),
(NULL, 'II'),
(NULL, 'A4'),
(NULL, '4'),
('namozgcode', 'nam'),
('1', '70'),
('2', '30'),
('3', '300'),
('4', '60'),
('5', '600'),
('6', '400'),
('7', 'F'),
('8', 'A2'),
('9', '500'),
('10', 'B'),
('11', 'W'),
('12', 'T'),
('13', 'L'),
('14', 'E'),
('15', 'H'),
('16', 'I2'),
('17', 'Z'),
('18', 'D'),
('19', 'U'),
('20', 'G'),
('21', 'J'),
('22', 'Y'),
('23', 'V'),
('24', 'I'),
('25', 'C'),
('26', 'X'),
('27', 'T1'),
('28', 'A'),
('29', 'M'),
('30', 'D1'),
('31', 'A1'),
('32', '1b'),
('33', 'K'),
('34', '80'),
('35', '100'),
('36', 'E1'),
('37', '11'),
('38', '200'),
('39', '700'),
('40', 'N'),
('41', 'P'),
('42', '6'),
('43', '4b'),
('44', 'O'),
('45', 'II'),
('46', 'A4'),
('47', '4'),
('namozgcode', 'nam'),
('1', '70'),
('2', '30'),
('3', '300'),
('4', '60'),
('5', '600'),
('6', '400'),
('7', 'F'),
('8', 'A2'),
('9', '500'),
('10', 'B'),
('11', 'W'),
('12', 'T'),
('13', 'L'),
('14', 'E'),
('15', 'H'),
('16', 'I2'),
('17', 'Z'),
('18', 'D'),
('19', 'U'),
('20', 'G'),
('21', 'J'),
('22', 'Y'),
('23', 'V'),
('24', 'I'),
('25', 'C'),
('26', 'X'),
('27', 'T1'),
('28', 'A'),
('29', 'M'),
('30', 'D1'),
('31', 'A1'),
('32', '1b'),
('33', 'K'),
('34', '80'),
('35', '100'),
('36', 'E1'),
('37', '11'),
('38', '200'),
('39', '700'),
('40', 'N'),
('41', 'P'),
('42', '6'),
('43', '4b'),
('44', 'O'),
('45', 'II'),
('46', 'A4'),
('47', '4');

-- --------------------------------------------------------

--
-- Table structure for table `status_t`
--

CREATE TABLE IF NOT EXISTS `status_t` (
`status_code` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_t`
--

INSERT INTO `status_t` (`status_code`, `status_name`) VALUES
(8, 'متاح'),
(9, 'غير متاح'),
(10, 'مباع'),
(11, 'مؤجل'),
(12, 'اخرى'),
(13, 'لغى الفكرة'),
(14, 'متأجرة'),
(15, 'يتابع'),
(16, 'يتابع'),
(17, 'يتابع');

-- --------------------------------------------------------

--
-- Table structure for table `tashteeb_t`
--

CREATE TABLE IF NOT EXISTS `tashteeb_t` (
`tashteeb_code` int(11) NOT NULL,
  `tashteeb_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tashteeb_t`
--

INSERT INTO `tashteeb_t` (`tashteeb_code`, `tashteeb_name`) VALUES
(8, 'شركة'),
(9, 'خاص'),
(10, 'نصف تشطيب'),
(11, 'بدون'),
(12, 'اخرى');

-- --------------------------------------------------------

--
-- Table structure for table `udata`
--

CREATE TABLE IF NOT EXISTS `udata` (
  `code` varchar(20) NOT NULL,
  `madena` varchar(30) NOT NULL,
  `madena_other` varchar(50) DEFAULT NULL,
  `aqar_type` varchar(30) NOT NULL,
  `aqar_type_other` varchar(50) DEFAULT NULL,
  `namozg` varchar(30) DEFAULT NULL,
  `geem` varchar(30) DEFAULT NULL,
  `ain` varchar(30) DEFAULT NULL,
  `wow` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `ard_mesaha` decimal(10,0) DEFAULT NULL,
  `mbna_mesaha` decimal(10,0) DEFAULT NULL,
  `matloob` int(11) DEFAULT NULL,
  `aqd_total` int(11) DEFAULT NULL,
  `kest_modah` int(11) DEFAULT NULL,
  `madfoo` int(11) DEFAULT NULL,
  `alover` int(11) DEFAULT NULL,
  `kest_year` int(11) DEFAULT NULL,
  `kest_month` int(11) DEFAULT NULL,
  `tashteeb` varchar(30) NOT NULL,
  `hagz` varchar(30) DEFAULT NULL,
  `estlam` varchar(30) DEFAULT NULL,
  `nady` varchar(30) DEFAULT NULL,
  `wadyaa` varchar(30) DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL,
  `cust_title` varchar(20) DEFAULT NULL,
  `cust_name` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `masdr` varchar(30) DEFAULT NULL,
  `entry_date` date NOT NULL,
  `modkhel` varchar(30) NOT NULL,
  `update_date` date NOT NULL,
  `motabaa` varchar(30) DEFAULT NULL,
  `amalya_type` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `marhala` varchar(30) DEFAULT NULL,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL,
  `hadeka` varchar(50) DEFAULT NULL,
  `log_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updater` varchar(50) DEFAULT NULL,
  `door` varchar(20) DEFAULT NULL,
  `modah_ejar` varchar(20) DEFAULT NULL,
  `motabaqi` varchar(20) DEFAULT NULL,
  `view_v` varchar(250) DEFAULT NULL,
  `momz` tinyint(1) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `WC` int(11) DEFAULT NULL,
  `ways` varchar(50) DEFAULT NULL,
  `meterprice` varchar(20) DEFAULT NULL,
  `kmalyat` varchar(250) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `remember` tinyint(1) DEFAULT NULL,
  `details` varchar(2500) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `udata`
--

INSERT INTO `udata` (`code`, `madena`, `madena_other`, `aqar_type`, `aqar_type_other`, `namozg`, `geem`, `ain`, `wow`, `address`, `ard_mesaha`, `mbna_mesaha`, `matloob`, `aqd_total`, `kest_modah`, `madfoo`, `alover`, `kest_year`, `kest_month`, `tashteeb`, `hagz`, `estlam`, `nady`, `wadyaa`, `notes`, `cust_title`, `cust_name`, `telephone`, `mobile`, `masdr`, `entry_date`, `modkhel`, `update_date`, `motabaa`, `amalya_type`, `status`, `marhala`, `image1`, `image2`, `image3`, `hadeka`, `log_date`, `updater`, `door`, `modah_ejar`, `motabaqi`, `view_v`, `momz`, `rooms`, `WC`, `ways`, `meterprice`, `kmalyat`, `email`, `whatsapp`, `remember`, `details`, `office_id`) VALUES
('1', 'مدينتى', NULL, 'شقة', NULL, '300', '34', '42', '2', NULL, '45', '177', 1000000, 1150000, 10, 800000, 200000, 63000, 1800, '', NULL, NULL, 'FALSE', NULL, 'بلغتها ان السعر عالى وقالت الاوفر قابل للتفاوض', NULL, 'عطا الله فؤاد', '24183491', '1286410203', NULL, '0000-00-00', '', '2016-03-18', 'ايهاب', 'تمليك', 'لغى الفكرة', '3', NULL, NULL, NULL, '45', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '350000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10012', 'مدينتى', NULL, 'شقة', NULL, '70', NULL, '15', '32', NULL, '120', '96', 325000, 530000, 17, 260000, 90000, NULL, 23000, 'بدون', '01/01/2008', 'مستلمه', 'TRUE', NULL, 'معها عقد وكاله', NULL, 'داليا', NULL, '1093009579', NULL, '2014-06-17', 'ايمان', '2016-11-11', 'ايمان', 'تمليك', 'متاح', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'admin', '0', NULL, '190000', 'Park', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10013', 'مدينتى', NULL, 'شقة', NULL, NULL, '32', '39', '1', NULL, '50', '186', 1300000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'م/عصام عز', '1207879596', '1017373072', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '50', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10014', 'مدينتى', NULL, 'شقة', NULL, NULL, '74', '6', '53', NULL, '0', '69', 192000, 404000, 17, 192000, NULL, NULL, 1480, '', '01/01/2008', 'مستلمه', 'FALSE', NULL, NULL, NULL, 'محمد ابراهيم', NULL, '1001718642', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'هند', 'ايجار', 'متأجرة', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, 'سنه', '212000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10015', 'مدينتى', NULL, 'شقة', NULL, '30', '67', '8', '33', NULL, '0', '103', 630000, NULL, NULL, NULL, NULL, 2900, NULL, '', '05/07/2007', NULL, 'TRUE', NULL, 'من طرف أ/ احمد تاج والمفتاح معاه', NULL, 'خالد محمد عبد الفتاح', NULL, '1118008999', NULL, '2014-08-20', 'ايمان', '2016-03-18', 'ايمان', 'ايجار', 'مباع', '6', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, 'Narrow Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10016', 'مدينتى', NULL, 'شقة', NULL, NULL, '70', '14', '22', NULL, '0', '69', 185000, 404000, 17, 170000, 15000, NULL, 1400, '', NULL, NULL, 'FALSE', NULL, 'الرقم غلط', NULL, 'سمير', NULL, '122252011', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', '', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '234000', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10017', 'الرحاب', NULL, 'شقة', NULL, NULL, '132', '2', '1', NULL, '50', '179', 975000, 1102000, 4, 835000, 140000, 112650, 5927, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'محمد أبو الفتوح', '1282221001', '1282221000', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'مباع', '10', NULL, NULL, NULL, '50', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '267000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10018', 'مدينتى', NULL, 'شقة', NULL, NULL, '73', '55', '31', NULL, '0', '82', 195000, 436800, 17, 195000, NULL, NULL, 4785, '', NULL, NULL, 'FALSE', NULL, 'استلام فورى', NULL, 'شريف عبد الحارث', NULL, '1204569921', NULL, '2014-02-03', 'ايمان', '2016-03-18', NULL, 'تمليك', 'لغى الفكرة', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '241800', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10019', 'الرحاب', NULL, 'شقة', NULL, '300', '34', '27', '2', NULL, '45', '177', 940000, 907000, 3, 840000, 100000, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, 'لما تستلم هتكلمنا تعرضها ايجار', NULL, 'سهام', '1223136441', '1224262178', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'لغى الفكرة', '3', NULL, NULL, NULL, '45', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '67000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10021', 'التجمع الخامس', NULL, 'شقة', NULL, NULL, '67', '33', '31', NULL, '0', '89', 378000, 421000, NULL, 378000, NULL, 5790, 4500, '', NULL, NULL, 'FALSE', NULL, 'جاهزة الاستلام', NULL, 'ميشيل', NULL, '100520627', NULL, '0000-00-00', '', '2016-03-18', NULL, 'تمليك', 'متاح', '6', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '43000', 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10022', 'مدينتى', NULL, 'شقة', NULL, '300', '32', '22', '2', NULL, '45', '177', 455000, 1780000, 10, 430000, 25000, 65000, 2350, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'شيماء شاكر', NULL, '1001715913', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '45', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '1350000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10023', 'مدينتى', NULL, 'شقة', NULL, '60', '74', '22', '13', NULL, '0', '81', 250000, 496000, 17, 250000, NULL, 21000, NULL, '', '24/06/2008', NULL, 'FALSE', NULL, 'استلام فورى', NULL, 'ماجدة عبد العظيم', '1222651010', '1005230700', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '246000', 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10024', 'الرحاب', NULL, 'شقة', NULL, NULL, '95', '6', '26', NULL, '0', '108', 800000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, 'غاز+كرانيش نكلمه خارج مصر', NULL, 'سامى عطيه جرجيس', NULL, '1223275511', 'اتصال', '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'متاح', '5', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10025', 'الرحاب', NULL, 'شقة', NULL, NULL, '100', '2', '3', NULL, '57', '176', 0, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, 'شقة 3و4/ الرقم غير موجود بالخدمه', NULL, 'فارس', NULL, '1001602027', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'غير متاح', '5', NULL, NULL, NULL, '57', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10026', 'مدينتى', NULL, 'شقة', NULL, NULL, '13', '22', '2', NULL, '45', '174', 640000, 550000, 10, 390000, 250000, 31000, 1200, '', NULL, NULL, 'FALSE', NULL, 'الهاتف مغلق4/11/2015', NULL, 'حازم الشاعر', NULL, '1129010847', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', '', '1', NULL, NULL, NULL, '45', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '160000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10027', 'مدينتى', NULL, 'شقة', NULL, '70', '74', '25', '34', NULL, '0', '96', 250000, 511200, 17, 250000, NULL, NULL, 1870, '', '22/06/2008', 'غير مستلمه', 'FALSE', NULL, 'دفع دفعة الاستلام', NULL, 'نجوى مختار', NULL, '1114158487', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '261200', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10028', 'مدينتى', NULL, 'شقة', NULL, NULL, '72', '48', '51', NULL, '0', '65', 156000, 329500, 17, 156000, NULL, NULL, 1205, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'منى محمد على', '1149220044', '1225884557', NULL, '0000-00-00', '', '2016-03-18', NULL, 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '173500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10029', 'الرحاب', NULL, 'شقة', NULL, NULL, '119', '6', '2', NULL, '43', '171', 1400000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'هناء', '1144567157', '1110666803', 'اتصال', '0000-00-00', 'ايمان', '2016-03-18', 'محمد', 'تمليك', 'مباع', '8', NULL, NULL, NULL, '43', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', 'garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10030', 'الرحاب', NULL, 'شقة', NULL, NULL, '122', '26', '12', NULL, '0', '294', 1520000, 1630000, NULL, 1320000, 200000, 96500, 23970, '', NULL, NULL, 'FALSE', NULL, 'لغت فكرت البيع هتسكن فيها', NULL, 'كريم همام', NULL, '1001402329', NULL, '0000-00-00', '', '2016-03-18', NULL, 'تمليك', 'لغى الفكرة', '8', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '310000', 'g&park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10031', 'الرحاب', NULL, 'شقة', NULL, NULL, '18', '28', '2', NULL, '0', '170', 950000, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, 'شقة داخل فيلا فى المرحلة 6', NULL, 'فايز', NULL, '1280599953', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '6', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10032', 'مدينتى', NULL, 'شقة', NULL, NULL, '72', '67', '23', NULL, '0', '81', 620000, 470000, 10, 320000, 300000, 22500, 8700, '', NULL, NULL, 'FALSE', NULL, '3% عمولة+بدون تشطيب', NULL, 'أحمد', NULL, '1008009255', 'الوسيط', '2014-10-03', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10033', 'الرحاب', NULL, 'شقة', NULL, NULL, '130', '3', '52', NULL, '0', '223', 1550000, 821870, NULL, 821870, 728130, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, '7000للمتر', NULL, 'حسام', '24196413', '1159550454', NULL, '0000-00-00', 'محمد', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '9', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', 'R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10034', 'مدينتى', NULL, 'شقة', NULL, NULL, '72', '52', '32', NULL, '0', '66', 140000, 354000, 10, 130000, 10000, 14000, 1440, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'باسل محمد', NULL, '1272000085', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '224000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10035', 'مدينتى', NULL, 'شقة', NULL, '30', '67', '2', '33', NULL, '0', '103', 445000, 365000, 17, 325000, 120000, 27500, 11500, '', NULL, NULL, 'FALSE', NULL, 'دفعة الاستلام18000 لم تدفع', NULL, 'سامية', '22738341', '1001446036', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'لغى الفكرة', '6', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '40000', 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10036', 'مدينتى', NULL, 'شقة', NULL, NULL, '13', '42', '13', NULL, '0', '110', 200000, 366000, 15, 200000, NULL, 14800, 830, '', NULL, NULL, 'FALSE', NULL, 'الرقم خطأ', NULL, 'سالى', '22875022', '1227994157', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', '', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '166000', 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10037', 'مدينتى', NULL, 'شقة', NULL, NULL, '71', '43', '13', NULL, '0', '69', 355000, 367400, 17, 215000, 140000, NULL, 1345, 'خاص', NULL, 'مستلمه', 'FALSE', '18400', 'تشطيبات خاصة بها ساكن لشهر 6/2016بيدفع 1350/ الوديعه فى شهر 6/2016', NULL, 'هانى', '1144147974', '1150502830', NULL, '2014-10-20', 'ايمان', '2016-03-18', 'هند', 'تمليك', 'متاح', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10038', 'الرحاب', NULL, 'شقة', NULL, NULL, '0', '5', '2', NULL, '0', '164', 0, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, 'البيانات ناقصه', NULL, 'سونيا', '26906020', '1151190074', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', '', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10039', 'مدينتى', NULL, 'شقة', NULL, NULL, '23', '44', '13', NULL, '0', '110', 360000, 550000, 15, 260000, 100000, 21000, 900, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'أم شريف', NULL, NULL, NULL, '0000-00-00', 'محمد', '2016-03-18', NULL, 'تمليك', 'متاح', '2', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '290000', 'G&st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10040', 'التجمع الخامس', NULL, 'شقة', NULL, NULL, '17', '47', '31', NULL, '0', '106', 255000, 383000, 10, 255000, NULL, 28300, 925, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'عمرو حجازى', '1112787181', '1114000717', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '128000', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10041', 'مدينتى', NULL, 'شقة', NULL, NULL, '32', '2', '22', NULL, '0', '100', 176000, 532000, 10, 176000, NULL, 32000, 1400, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'رأفت فؤاد', '29248879', '1223567789', NULL, '0000-00-00', '', '2016-03-18', 'ايهاب', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '356000', 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10042', 'مدينتى', NULL, 'شقة', NULL, NULL, '31', '64', '42', NULL, '0', '104', 266000, 540000, 8, 266000, NULL, 38000, 1835, '', NULL, NULL, 'FALSE', NULL, 'بالنادى', NULL, 'نشأت', NULL, '1064020109', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '274000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10043', 'مدينتى', NULL, 'شقة', NULL, NULL, '32', '2', '12', NULL, '0', '103', 630000, 585000, 8, 530000, 100000, 32000, 5280, 'شركة', NULL, NULL, 'FALSE', NULL, 'بها مستاجر لمدة سنة', NULL, 'هدى عبد المنعم', NULL, '1005275666', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'متاح', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, NULL, 'St', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10044', 'مدينتى', NULL, 'شقة', NULL, NULL, '34', '37', '32', NULL, '0', '100', 200465, 567000, 10, 200465, NULL, 34600, 1220, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'ايمان', NULL, '24900002', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '366535', 'Narrow Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10045', 'مدينتى', NULL, 'شقة', NULL, NULL, '30', '42', '13', NULL, '0', '103', 100000, 573000, 10, 100000, NULL, 34950, 1235, '', NULL, NULL, 'FALSE', NULL, 'الرقم غلط', NULL, 'اسماعيل', NULL, '1222306923', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'غير متاح', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '473000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10046', 'مدينتى', NULL, 'شقة', NULL, NULL, '14', '49', '12', NULL, '0', '134', 588000, 431800, 10, 338000, 250000, 25000, 960, '', NULL, NULL, 'FALSE', NULL, 'بنتها في الجامعه وهتسكن فيها', NULL, 'هبه جعفر', NULL, '1227380282', NULL, '0000-00-00', 'ايهاب', '2016-03-18', 'ايمان', 'تمليك', 'غير متاح', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '93800', 'Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10047', 'مدينتى', NULL, 'شقة', NULL, NULL, '12', '29', '64', NULL, '0', '106', 250000, 585000, 10, 250000, NULL, 33900, 1650, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'محمود طنطاوى', '1211865587', '1009038838', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'مباع', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '335000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10048', 'مدينتى', NULL, 'شقة', NULL, NULL, '113', '88', '34', NULL, '0', '114', 160000, 378000, NULL, 160000, NULL, 20250, 2380, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'نادرزكريا', NULL, '1006899078', NULL, '0000-00-00', '', '2016-03-18', 'هند', 'تمليك', 'مباع', '11', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '218000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10049', 'مدينتى', NULL, 'شقة', NULL, '70', '72', '38', '31', NULL, '0', '96', 290000, 486000, 17, 260000, 30000, NULL, 21600, 'بدون', '21/06/2008', 'جاهزه على الاستلام', 'TRUE', '24000', 'الوديعه يدفعها المشترى ويستلم', NULL, 'سمير صبحى', '26202665', '1227395444', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'هند', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '226000', 'g&park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10050', 'مدينتى', NULL, 'شقة', NULL, NULL, '17', '59', '23', NULL, '0', '109', 170000, 433000, 10, 400000, 150000, 24000, 11000, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'ليلى', '26218160', '1061508492', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'مؤجل', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '263000', 'Narrow Garden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10051', 'مدينتى', NULL, 'شقة', NULL, NULL, '13', '36', '33', NULL, '0', '104', 340000, 407000, NULL, 340000, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'خليفة عريشة', '1143333858', '105004277', NULL, '0000-00-00', '', '2016-03-18', 'ايهاب', 'تمليك', 'لغى الفكرة', '1', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '67000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10052', 'مدينتى', NULL, 'شقة', NULL, NULL, '113', '56', '11', NULL, '0', '116', 330000, 488000, 10, 330000, NULL, 25000, 2275, '', NULL, NULL, 'FALSE', NULL, 'بدون تشطيبات', NULL, 'شادى احمد', NULL, '1277727297', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'غير متاح', '11', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '158000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10053', 'مدينتى', NULL, 'شقة', NULL, '70', '71', '3', '34', NULL, '0', '96', 311000, 511180, 17, 311000, NULL, NULL, 1870, '', '22/06/2008', NULL, 'FALSE', NULL, NULL, NULL, 'أشرف وهبه', '1200993870', '1276050095', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'متاح', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '200180', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10054', 'مدينتى', NULL, 'شقة', NULL, '70', '72', '49', '51', NULL, '0', '96', 280000, 486720, 17, 250000, 30000, NULL, 1780, '', '01/02/2008', NULL, 'FALSE', NULL, '24300وديعة', NULL, 'ايمن', NULL, '1001966412', NULL, '0000-00-00', 'ايمان', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '7', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '236720', 'g&park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10055', 'مدينتى', NULL, 'شقة', NULL, NULL, '31', '64', '33', NULL, '0', '109', 205000, 608000, 10, 205000, NULL, 37000, 1300, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'نادر شعبان', NULL, '1226420600', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '403000', 'parkark', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10056', 'مدينتى', NULL, 'شقة', NULL, NULL, '113', '36', '21', NULL, '0', '116', 400000, 617000, NULL, 350000, 50000, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'حمدى شاهين', NULL, '1001627538', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', '', '11', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '267000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10057', 'مدينتى', NULL, 'شقة', NULL, NULL, '31', '58', '21', NULL, '0', '106', 240000, 608000, 10, 240000, NULL, 37100, 1350, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'نبيل عبد الرحمن', '123379658', '1223631573', NULL, '0000-00-00', '', '2016-03-18', 'محمد', 'تمليك', 'مباع', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '368000', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10058', 'مدينتى', NULL, 'شقة', NULL, '300', '22', '27', '2', NULL, '60', '157', 0, 826250, 8, NULL, NULL, NULL, NULL, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'سمير حنا', NULL, NULL, NULL, '0000-00-00', 'محمد', '2016-03-18', NULL, 'تمليك', 'مباع', '2', NULL, NULL, NULL, '60', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '826250', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10059', 'مدينتى', NULL, 'شقة', NULL, NULL, '113', '91', '11', NULL, '0', '114', 210000, 617000, 17, 210000, NULL, 22500, 2250, '', NULL, NULL, 'FALSE', NULL, NULL, NULL, 'عمر حلمى', NULL, '1004448668', NULL, '0000-00-00', '', '2016-03-18', 'ايمان', 'تمليك', 'مباع', '11', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '407000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10060', 'مدينتى', NULL, 'شقة', NULL, NULL, '34', '38', '31', NULL, '0', '106', 235000, 629000, NULL, 235000, NULL, 365000, 1290, '', NULL, NULL, 'FALSE', NULL, 'البيانات خطئ', NULL, 'مدحت', NULL, '1003388850', NULL, '0000-00-00', '', '2016-03-18', NULL, 'تمليك', '', '3', NULL, NULL, NULL, '0', '2016-03-18 01:24:10', 'Ibrahim', NULL, NULL, '394000', 'park', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('10061', 'الرحاب', NULL, 'شقة', NULL, '100', '20', '30', '10', 'الرحاب بجوار السوق', '120', '90', 1000000, 900000, 3, 153, 6000, 15000, 1500, 'نصف تشطيب', '22/10/2016', '22/10/2019', 'بدون', '300', 'اتصال هاتفى مباشر', 'الحاج', 'محمد على عثمان', '1252525', '12245', 'محمد', '2016-11-17', 'admin', '2016-11-17', 'ابراهيم', 'تمليك كاش', 'متاح', '1', NULL, NULL, NULL, 'لا', '2016-11-17 13:41:17', 'admin', '2', '4', '0', 'Street', 1, 3, 2, 'بحرى', '3000', 'بلكونهبها زينة فاخرة واسعة', 'rrrrrr@yahoo.com', '12556622', 1, 'دورين على ناصيتين', 1);

-- --------------------------------------------------------

--
-- Table structure for table `udata_images`
--

CREATE TABLE IF NOT EXISTS `udata_images` (
  `code` varchar(20) NOT NULL,
  `image1` varchar(250) DEFAULT NULL,
  `image2` varchar(250) DEFAULT NULL,
  `image3` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `udata_images`
--

INSERT INTO `udata_images` (`code`, `image1`, `image2`, `image3`) VALUES
('1', 'images/1_1.jpg', 'images/1_2.jpg', 'images/1_3.jpg'),
('2', 'images/2_1.jpg', 'https://www.youtube.com/watch?v=JM1h_UdHMwI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`, `notes`) VALUES
('admin', 'ramadan', 'admin', 'Ù„Ù‡ ÙƒØ§ÙØ© Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª'),
('demo', 'demo', 'visitor', NULL),
('reda', 'reda', 'editor', 'Ù…Ø¯Ø®Ù„ Ø¨ÙŠØ§Ù†Ø§Øª'),
('visitor', 'visitor', 'visitor', 'Ø²Ø§Ø¦Ø± Ù„Ù„Ø§Ø³ØªØ¹Ù„Ø§Ù…Ø§Øª ÙÙ‚Ø·');

-- --------------------------------------------------------

--
-- Table structure for table `viewvv`
--

CREATE TABLE IF NOT EXISTS `viewvv` (
`viewcide` int(11) NOT NULL,
  `viewname` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viewvv`
--

INSERT INTO `viewvv` (`viewcide`, `viewname`) VALUES
(1, 'Park'),
(2, 'Wide Garden'),
(3, 'Street');

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE IF NOT EXISTS `website` (
  `url` varchar(250) NOT NULL,
  `sitename` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`url`, `sitename`) VALUES
('http://alrehabgoodnews.com/', 'جودنيوز للتسويق العقارى'),
('http://eg.waseet.net/ar/site/cairo/real_estate', 'الوسيط للعقارات'),
('https://egypt.aqarmap.com/ar/', 'عقار ماب للتسويق العقارى');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amalya_type_t`
--
ALTER TABLE `amalya_type_t`
 ADD PRIMARY KEY (`amalya_type_code`);

--
-- Indexes for table `aqar_need`
--
ALTER TABLE `aqar_need`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `aqar_type_t`
--
ALTER TABLE `aqar_type_t`
 ADD PRIMARY KEY (`aqar_type_code`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
 ADD PRIMARY KEY (`citycode`);

--
-- Indexes for table `door`
--
ALTER TABLE `door`
 ADD PRIMARY KEY (`doorcode`);

--
-- Indexes for table `laqab`
--
ALTER TABLE `laqab`
 ADD PRIMARY KEY (`laqab_code`);

--
-- Indexes for table `marhala`
--
ALTER TABLE `marhala`
 ADD PRIMARY KEY (`marhalacode`);

--
-- Indexes for table `namozg`
--
ALTER TABLE `namozg`
 ADD PRIMARY KEY (`namozgcode`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_t`
--
ALTER TABLE `status_t`
 ADD PRIMARY KEY (`status_code`);

--
-- Indexes for table `tashteeb_t`
--
ALTER TABLE `tashteeb_t`
 ADD PRIMARY KEY (`tashteeb_code`);

--
-- Indexes for table `udata`
--
ALTER TABLE `udata`
 ADD PRIMARY KEY (`code`), ADD UNIQUE KEY `code` (`code`), ADD UNIQUE KEY `code1` (`madena`,`geem`,`ain`,`wow`,`amalya_type`);

--
-- Indexes for table `udata_images`
--
ALTER TABLE `udata_images`
 ADD PRIMARY KEY (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `viewvv`
--
ALTER TABLE `viewvv`
 ADD PRIMARY KEY (`viewcide`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
 ADD PRIMARY KEY (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amalya_type_t`
--
ALTER TABLE `amalya_type_t`
MODIFY `amalya_type_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `aqar_type_t`
--
ALTER TABLE `aqar_type_t`
MODIFY `aqar_type_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
MODIFY `citycode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `door`
--
ALTER TABLE `door`
MODIFY `doorcode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `laqab`
--
ALTER TABLE `laqab`
MODIFY `laqab_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `marhala`
--
ALTER TABLE `marhala`
MODIFY `marhalacode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `namozg`
--
ALTER TABLE `namozg`
MODIFY `namozgcode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_t`
--
ALTER TABLE `status_t`
MODIFY `status_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tashteeb_t`
--
ALTER TABLE `tashteeb_t`
MODIFY `tashteeb_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `viewvv`
--
ALTER TABLE `viewvv`
MODIFY `viewcide` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
