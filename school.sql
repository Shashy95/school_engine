-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2020 at 07:11 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `en_message` varchar(500) DEFAULT NULL,
  `sw_message` varchar(500) DEFAULT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `en_message`, `sw_message`, `postingdate`) VALUES
(1, 'Sharon Novatus', 'cielonovatus95@gmail.com', '', 'trial', '2020-06-08 10:12:37'),
(2, 'sharon', 'cielonovatus95@gmail.com', 'hi', '', '2020-06-26 16:55:31'),
(3, 'Sharon Novatus', 'cielonovatus95@gmail.com', 'Testing', '', '2020-06-27 01:14:26'),
(4, 'Sharon Novatus', 'cielonovatus95@gmail.com', 'testing if messages are received', '', '2020-07-09 07:30:09'),
(5, 'Sharon Novatus', 'cielonovatus95@gmail.com', '', 'najaribu kama meseji zinafika', '2020-07-09 07:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `desc_id` int(200) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(200) NOT NULL,
  `sch_id` int(200) NOT NULL,
  `en_description` varchar(700) NOT NULL,
  `sw_description` varchar(700) NOT NULL,
  PRIMARY KEY (`sch_id`,`desc_id`,`schoolname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`desc_id`, `schoolname`, `sch_id`, `en_description`, `sw_description`) VALUES
(1, 'Dallas Kidszone', 1, 'eyyy', 'mambo'),
(2, 'St.Thomas Nursery and Primary School', 2, 'hello', 'mzima ww'),
(3, 'Ilboru Secondary School', 10, 'Ilboru Secondary School is a secondary school in Arusha. The necta school id is s0110', 'Shule ya Sekondari ya Ilboru ni shule ya sekondari huko Arusha. Idhini ya shule ya necta ni s0110'),
(4, 'Sakina Girls Secondary School', 11, 'Sakina Secondary School is a girls catholic school', 'Sakina Secondary School ni shule ya wasichana ya kikatoliki'),
(5, 'Winning Spirit High School', 12, 'Welcome to Winning Spirit High School.', 'Karibu Winning Spirit High School.'),
(6, 'Tengeru Boys Secondary School', 3, 'aaa', 'aa'),
(7, 'Al-Muntazir Islamic Seminary', 4, 'bbb', 'bb'),
(8, 'St Francis Girls Secondary School', 5, 'ccc', 'cc'),
(9, 'Kibaha Boys Secondary School', 6, 'ddd', 'dd'),
(10, 'Canossa Girls Secondary School', 7, 'eee', 'ee'),
(11, 'Marian Girls High School', 8, 'mmm', 'mm'),
(12, 'Kisimiri Secondary School', 9, 'kkk', 'kk'),
(13, 'Lucky Vicent Nursery and Primary School', 13, 'Lucky Vincent School is a legally registered non-religious English medium school which provides quality education to our pupils. Our aim is to prepare your child for future and not only to pass examinations. We use current teaching techniques through qualified teachers with love and respect to students.', 'Lucky Vincent School ni shule ya kati isiyo ya kidini iliyosajiliwa isiyo ya kidini ambayo hutoa elimu bora kwa wanafunzi wetu. Kusudi letu ni kuandaa mtoto wako kwa siku za usoni na sio tu kupitisha mitihani. Tunatumia mbinu za sasa za kufundishia kupitia waalimu waliohitimu kwa upendo na heshima kwa wanafunzi.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `sname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `en_gender` varchar(20) DEFAULT NULL,
  `sw_gender` varchar(20) DEFAULT NULL,
  `region` varchar(50) NOT NULL,
  `en_level` varchar(70) DEFAULT NULL,
  `sw_level` varchar(70) DEFAULT NULL,
  `pname` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `en_relation` varchar(20) DEFAULT NULL,
  `sw_relation` varchar(20) DEFAULT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `form`
--


-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(200) NOT NULL,
  `en_level` varchar(100) NOT NULL,
  `sw_level` varchar(100) NOT NULL,
  `en_category` varchar(100) NOT NULL,
  `sw_category` varchar(100) NOT NULL,
  `en_type` varchar(100) NOT NULL,
  `sw_type` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `en_gender` varchar(100) NOT NULL,
  `sw_gender` varchar(100) NOT NULL,
  `combination` varchar(200) DEFAULT NULL,
  `logo` varchar(200) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`en_level`,`sw_level`,`schoolname`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `schoolname`, `en_level`, `sw_level`, `en_category`, `sw_category`, `en_type`, `sw_type`, `region`, `en_gender`, `sw_gender`, `combination`, `logo`, `location`, `phone`, `email`, `address`) VALUES
(1, 'Dallas Kidszone', 'Nursery', 'Chekechea', 'Private School', 'Shule Binafsi', 'Day School', 'Shule ya Kutwa', 'Dar es Salaam', 'Boys and Girls', 'Wavulana na Wasichana', '', 'dallas.jpg', 'Kibada,Kigamboni', '0655306060', '', 'P.O Box 31441,Dar es Salaam'),
(2, 'St.Thomas Nursery and Primary School', 'Nursery and Primary ', 'Chekechea na Msingi', 'Private School', 'Shule Binafsi', 'Day and Boarding ', 'Shule ya Kutwa na Bweni', 'Arusha', 'Boys and Girls', 'Wavulana na Wasichana', '', 'stthomasarusha.jpg', 'Moshono', '0', '', 'P.O Box 11060,Arusha'),
(3, 'Tengeru Boys Secondary School', 'O level', 'Daraja la chini la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule ya Bweni', 'Arusha', 'Boys Only ', 'Wavulana tu', '', 'tengeruboys.jpg', 'Arumeru', '0764976805', '', 'P.O Box 7590,Arusha'),
(4, 'Al-Muntazir Islamic Seminary', 'A level', 'Daraja la juu la sekondari', 'Private School', 'Shule Binafsi', 'Day and Boarding ', 'Shule ya Kutwa na Bweni', 'Dar es Salaam', 'Boys and Girls', 'Wavulana na Wasichana', 'ECA,PCB,PCM', 'al_muntazir[1].jpg', 'Ilala', '0754632394', 'edu.cbe@almuntazir.org', 'P.O Box 21735,Dar es Salaam'),
(5, 'St Francis Girls Secondary School', 'O level', 'Daraja la chini la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule ya Bweni', 'Mbeya', 'Girls Only ', 'Wasichana tu', '', 'stfrancisgirls.png', 'Forest-Mbeya,Mbeya Mjini', '0768616935', '', 'P.O Box 924,Mbeya'),
(6, 'Kibaha Boys Secondary School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Public School', 'Shule ya Serikali', 'Boarding School', 'Shule ya Bweni', 'Pwani', 'Boys Only ', 'Wavulana tu', 'CBA,ECA,PCB,PCM', 'kibahaboys.jpg', 'Kibaha-Tumbi', '0752453639', ' admin@kec.go.tz', 'P.O Box 30053,Kibaha '),
(7, 'Canossa Girls Secondary School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule ya Bweni', 'Dar es Salaam', 'Girls Only ', 'Wasichana tu', 'EGM,HGE,HKL,PCB,PCM', 'canossa.png', 'Tegeta Nyuki-Sokoni', '0787151341', 'canossahighsch@gmail.com ', 'P.O Box 67372,Dar es Salaam '),
(8, 'Marian Girls High School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule ya Bweni', 'Pwani', 'Girls Only ', 'Wasichana tu', 'CBG,PCB,PCM,PGM', 'mariangirls.png', 'Bagamoyo', '0754669173', '', 'P.O Box 14,Bagamoyo'),
(9, 'Kisimiri Secondary School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Public School', 'Shule ya Serikali', 'Day and Boarding ', 'Shule ya Kutwa na Bweni', 'Arusha', 'Boys and Girls', 'Wavulana na Wasichana', 'HKL,PCM', 'kisimiri_logo_live newww.png', 'Arumeru', '0754928973', ' info@kisimirisecondary.com', 'P.O Box 14480,Arusha'),
(10, 'Ilboru Secondary School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Public School', 'Shule ya Serikali', 'Boarding School', 'Shule ya Bweni', 'Arusha', 'Boys Only ', 'Wavulana tu', 'HGL,PCB,PCM', 'ilboru.png', 'Arumeru', '0767252464', '', 'P.O Box 3014,Arusha'),
(11, 'Sakina Girls Secondary School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule ya Bweni', 'Arusha', 'Girls Only ', 'Wasichana tu', 'CBG,EGM,HGE,HGL,HKL,PCB,PCM,PGM', 'sakinagirls.jpg', 'Kwa Shamsi Area,Ngarenaro', '0765482552', '', 'P.O Box 1722,Arusha'),
(12, 'Winning Spirit High School', 'O level and A level', 'Daraja la chini na juu la sekondari', 'Private School', 'Shule Binafsi', 'Boarding School', 'Shule Ya Bweni', 'Arusha', 'Boys and Girls', 'Wavulana na Wasichana', 'CBG,EGM,ECA,HGE,HGL,HKL,PCB,PCM,PGM', 'winningspiritarusha.jpg', 'Kiranyi Ward,Arumeru', '0784421042', '', 'P.O Box 11064,Arusha'),
(13, 'Lucky Vicent Nursery and Primary School', 'Nursery and Primary School', '', 'Private School', 'Shule Binafsi', 'Day and Boarding ', 'Shule ya Kutwa na Bweni', 'Arusha', 'Boys and Girls', 'Wavulana na Wasichana', '', 'luckyvincent.PNG', 'Mbauda', '0784313402/0758991906', 'info@luckyvincent.sc.tz', 'P.O. Box  10275 Arusha');
