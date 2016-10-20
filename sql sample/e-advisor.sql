-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2016 at 03:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-advisor`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=124 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `prefix`, `title`) VALUES
(1, 'GE101', 'Arabic I'),
(2, 'GE111', 'English I'),
(3, 'GE112', 'English II'),
(4, 'GE131', 'Political Culture I'),
(5, 'GE132', 'Political Culture II'),
(6, 'GE231', 'Political Culture III '),
(7, 'GE232', 'Political Culture-IV'),
(8, 'GE311', 'Technical Writing'),
(9, 'GS111', 'Calculus I'),
(10, 'GS112', 'Calculus II'),
(11, 'GS141', 'General Physics I + Lab I'),
(12, 'GS221', 'Probability and Statistics'),
(13, 'IT101', 'IT Foundations'),
(14, 'IT111', 'Programming I'),
(15, 'IT112', 'Programming II'),
(16, 'IT201', 'Discrete Math and Structures'),
(17, 'IT212', 'Data Structures and Algorithms '),
(18, 'IT121', 'Digital and Logic Design '),
(19, 'IT222', 'Computer Architecture '),
(20, 'IT271', 'Network Fundamentals '),
(21, 'IT301', 'Computing Ethics & Society'),
(22, 'IT322', 'Operating Systems'),
(23, 'IT341', 'Database Systems'),
(24, 'IT342', 'Security Principles and Practices'),
(25, 'IT492', 'Internship'),
(26, 'IT499', 'IT Capstone Project'),
(27, 'CS205', 'Numerical Analysis '),
(29, 'SE201', 'Foundation of Software Engineering'),
(30, 'SE211', 'Software Requirements '),
(31, 'SE312', 'Formal Models & Methods'),
(32, 'SE321', 'Software Design'),
(33, 'SE322', 'Human Computer Interaction'),
(34, 'SE331', 'Software Testing '),
(35, 'CS211', 'Analysis of Algorithms'),
(36, 'CS331', 'Programming Languages '),
(37, 'SE341', 'Software Evolution and Maintenance'),
(38, 'SE441', 'Re-use and Component Based Development '),
(39, 'CS341', 'Software Development'),
(40, 'CS451', 'Intelligent Systems '),
(41, 'SE461', 'Software Quality '),
(42, 'SE490', 'Software Development I'),
(43, 'CS461', 'Computer Graphics'),
(44, 'CS442', 'Advanced Database '),
(45, 'SE492', 'Software Project Management'),
(46, 'SE301', 'Engineering Economics'),
(47, 'CS462', 'Multimedia Technology'),
(48, 'CS431', 'Compiler Construction'),
(49, 'SE421', 'Large Scale Software Design '),
(50, 'SE422', 'Software Architecture '),
(51, 'CS471', 'Distributed Systems'),
(52, 'CS443', 'Data and Web Mining'),
(53, 'CS463', 'Computer Vision & Image Processing'),
(54, 'CS453', 'Robotics'),
(55, 'CS454', 'Embedded Systems'),
(56, 'CS491', 'Special topics in Computer Science'),
(57, 'CN261', 'Electric basics'),
(58, 'CN281', 'Internet Programming'),
(59, 'CN262', 'Theory of Signals and Systems'),
(60, 'CN271', 'Intro. to Stochastic & Random process'),
(61, 'CN321', 'Network Protocols'),
(62, 'CN311', 'Networks Lab. (lab 1) '),
(63, 'CN382', 'Advanced Internet Programming'),
(64, 'CN371', 'Digital Communications'),
(65, 'CN331', 'Wireless and Mobile Communications '),
(66, 'CN322', 'Network lab 2 '),
(67, 'CN312', 'Network operating systems software'),
(68, 'CN498', 'Introduction to Project '),
(69, 'CN441', 'Network Security'),
(70, 'CN473', 'Network lab 3'),
(71, 'CN413', 'Network Planning and Deployment'),
(72, 'CN483', 'Mobile Commerce'),
(74, 'CN484', 'Mobile Computing'),
(75, 'CN414', 'Network Management and Evaluation'),
(76, 'CN415', 'Network optimization'),
(77, 'CN443', 'Authentication and Payment Protocols'),
(78, 'CN451', 'Network Programming'),
(79, 'CN474', 'Optical Communication Systems'),
(80, 'CN472', 'Multimedia Communications '),
(81, 'CN475', 'Satellite Communications Principle'),
(82, 'CN491', 'Current issues in IT'),
(83, 'CS451', 'Intelligent Systems'),
(84, 'CS471', 'Distributed Systems '),
(85, 'IS201', 'Foundations of Information Systems'),
(86, 'IS271', 'Financial Accounting'),
(87, 'IS321', 'IS Theory and Practices'),
(88, 'IS351', 'Organizational Behavior'),
(89, 'IS361', 'Systems Analysis and Design'),
(90, 'IS362', 'Information Systems Development'),
(91, 'IS372', 'Enterprise Resource Planning'),
(92, 'IS475', 'E-Commerce and E-Marketing'),
(93, 'IS302', 'Systems Simulation'),
(94, 'IS374', 'Principles of Marketing '),
(95, 'IS452', 'Optimization and Decision Making'),
(96, 'IS491', 'Special Topics in Information Systems '),
(97, 'CE201', 'Circuits Fundamentals'),
(98, 'CE202', 'Digital Electronics '),
(99, 'CE203', 'Digital Electronics Lab '),
(100, 'CE210', 'Advanced Digital Design with HDL'),
(101, 'CE211', 'Advanced Digital Design with HDL with Lab '),
(102, 'CE325', 'Hardware Testing and Fault Tolerance'),
(103, 'CE221', 'Signal and Systems '),
(104, 'CE300', 'Platform Architecture and Technologies'),
(105, 'CE310', 'Microcomputer Lab'),
(106, 'CE311', 'Microcomputer'),
(107, 'CE312', 'Microcontroller System Design '),
(108, 'CE313', 'Microcontroller System Design Lab'),
(109, 'CE321', 'Digital Signal Processing'),
(110, 'CE220', 'Embedded Systems'),
(111, 'CE398', 'Independent Study in Computer Systems Design'),
(112, 'CE499', 'Special Topics in Computer Systems Design '),
(113, 'CE415', 'Sequential Machine'),
(114, 'CE416', 'Image Processing'),
(115, 'CE440', 'Software Integration '),
(116, 'CN331', 'Wireless and Mobile Communication '),
(117, 'CE450', 'Robotics'),
(118, 'CE482', 'Computer Vision '),
(119, 'CE483', 'VLSI System Design'),
(120, 'CE484', 'Simulation and Modeling '),
(121, 'SE443', 'Agent-Oriented Software Engineering '),
(122, 'SE491', 'Special Topics in Software Engineering'),
(123, 'GS113', 'Math I');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `prefix`, `title`) VALUES
(1, 'it', 'عام'),
(2, 'se', 'هندسة البرمجيات'),
(3, 'cs', 'علوم الحاسوب'),
(4, 'ce', 'تصميم الكيان المادى'),
(5, 'cn', 'شبكات واتصالات الحاسوب'),
(6, 'is', 'نظم المعلومات');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'v1',
  `department` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pre_courses` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `elective` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `units` int(11) NOT NULL DEFAULT '3',
  `semesterNo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=154 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `version`, `department`, `course`, `pre_courses`, `elective`, `units`, `semesterNo`) VALUES
(1, 'v1', 'cs', 'CS205', 'GS112,IT112', '', 3, 4),
(2, 'v1', 'cs', 'IS201', 'IT112', '', 3, 3),
(3, 'v1', 'cs', 'SE201', 'IT112', NULL, 3, 3),
(4, 'v1', 'cs', 'CS211', 'IT201,IT112 ', NULL, 3, 4),
(5, 'v1', 'cs', 'CS331', 'IT212', NULL, 3, 5),
(6, 'v1', 'cs', 'SE322', 'SE201', NULL, 3, 5),
(7, 'v1', 'cs', 'CS341', 'IS361,IT341', NULL, 3, 6),
(8, 'v1', 'cs', 'IS361', 'IS201', NULL, 3, 5),
(9, 'v1', 'cs', 'CN281', 'IT112', NULL, 3, 6),
(10, 'v1', 'cs', 'CS451', 'IT212,IT201', NULL, 3, 7),
(11, 'v1', 'cs', 'CS461', 'IT112,IT212 ', NULL, 3, 7),
(12, 'v1', 'cs', 'CS442', 'IT341', NULL, 3, 8),
(13, 'v1', 'cs', 'CS462', 'IT322', NULL, 3, 8),
(14, 'v1', 'cs', 'SE492', 'SE201', NULL, 3, 7),
(15, 'v1', 'cs', 'CS431', 'CS331', 'add', 3, 6),
(16, 'v1', 'cs', 'CN483', 'IT342,CN281', 'add', 3, 6),
(17, 'v1', 'cs', 'CS471', 'IT322', 'add', 3, 6),
(18, 'v1', 'cs', 'SE321', 'SE201', 'add', 3, 6),
(19, 'v1', 'cs', 'CS443', 'CS451', 'add', 3, 6),
(20, 'v1', 'cs', 'CS463', 'CS461', 'add', 3, 6),
(21, 'v1', 'cs', 'CS453', 'CS451', 'add', 3, 6),
(22, 'v1', 'cs', 'CS454', 'IT322', 'add', 3, 6),
(23, 'v1', 'se', 'SE201', 'IT112', NULL, 3, 3),
(24, 'v1', 'se', 'SE211', 'SE201', NULL, 3, 4),
(25, 'v1', 'se', 'CN281', 'IT112', NULL, 3, 7),
(26, 'v1', 'se', 'CS211', 'IT201,IT112', NULL, 3, 4),
(27, 'v1', 'se', 'IS201', 'IT112', NULL, 3, 3),
(28, 'v1', 'se', 'SE312', 'SE201,IT201', NULL, 3, 5),
(29, 'v1', 'se', 'SE321', 'SE201', NULL, 3, 5),
(30, 'v1', 'se', 'SE322', 'SE201', NULL, 3, 5),
(31, 'v1', 'se', 'SE331', 'SE201', NULL, 3, 6),
(32, 'v1', 'se', 'SE341', 'SE201', NULL, 3, 6),
(33, 'v1', 'se', 'SE441', 'SE321', NULL, 3, 7),
(34, 'v1', 'se', 'SE461', 'SE321', NULL, 3, 7),
(35, 'v1', 'se', 'SE490', 'IT341,SE321', NULL, 3, 8),
(36, 'v1', 'se', 'SE492', 'SE201', NULL, 3, 8),
(37, 'v1', 'se', 'SE301', 'SE201', 'add', 3, 6),
(38, 'v1', 'se', 'SE421', 'SE321', 'add', 3, 6),
(39, 'v1', 'se', 'SE422', 'SE321', 'add', 3, 6),
(40, 'v1', 'se', 'SE443', 'SE321', 'add', 3, 6),
(41, 'v1', 'se', 'CS331', 'IT112', 'add', 3, 6),
(42, 'v1', 'se', 'CS451', 'IT212,IT201', 'add', 3, 6),
(43, 'v1', 'se', 'CS471', 'IT322', 'add', 3, 6),
(44, 'v1', 'se', 'IS475', 'IS201,CN281', 'add', 3, 6),
(45, 'v1', 'is', 'IS201', 'IT112', NULL, 3, 3),
(46, 'v1', 'is', 'SE201', 'IT112', NULL, 3, 3),
(47, 'v1', 'is', 'IS271', 'GS111', NULL, 3, 4),
(48, 'v1', 'is', 'CN281', 'IT112', NULL, 3, 4),
(49, 'v1', 'is', 'IS321', 'IS201', NULL, 3, 5),
(50, 'v1', 'is', 'SE321', 'SE201', NULL, 3, 7),
(51, 'v1', 'is', 'SE322', 'SE201', NULL, 3, 6),
(52, 'v1', 'is', 'IS351', 'IS201', NULL, 3, 5),
(53, 'v1', 'is', 'IS361', 'IS201', NULL, 3, 5),
(54, 'v1', 'is', 'IS362', 'IS361', NULL, 3, 6),
(55, 'v1', 'is', 'IS372', 'IS201', NULL, 3, 7),
(56, 'v1', 'is', 'CS451', 'IT212,IT201', NULL, 3, 8),
(57, 'v1', 'is', 'IS475', 'IS201,CN281', NULL, 3, 7),
(58, 'v1', 'is', 'SE492', 'SE201', NULL, 3, 8),
(59, 'v1', 'is', 'IS302', 'IT112,GS221', 'add', 3, 6),
(60, 'v1', 'is', 'IS374', 'IS271', 'add', 3, 6),
(61, 'v1', 'is', 'CS443', 'CS451', 'add', 3, 6),
(62, 'v1', 'is', 'IS452', 'IS351,GS221', 'add', 3, 6),
(63, 'v1', 'is', 'SE461', 'SE321', 'add', 3, 6),
(64, 'v1', 'is', 'CS471', 'IT322', 'add', 3, 6),
(65, 'v1', 'cn', 'CN261', 'GS141', NULL, 3, 3),
(66, 'v1', 'cn', 'CN281', 'IT112', NULL, 3, 3),
(67, 'v1', 'cn', 'CN262', 'CN261', NULL, 3, 4),
(68, 'v1', 'cn', 'CN271', 'GS221', NULL, 3, 4),
(69, 'v1', 'cn', 'CN321', 'IT271', NULL, 3, 5),
(70, 'v1', 'cn', 'CN311', 'IT271', NULL, 1, 5),
(71, 'v1', 'cn', 'CN382', 'CN281', NULL, 3, 5),
(72, 'v1', 'cn', 'CN371', 'CN262,CN271', NULL, 3, 5),
(73, 'v1', 'cn', 'CN331', 'CN321,CN371', NULL, 3, 6),
(74, 'v1', 'cn', 'CN322', 'CN321,CN311', NULL, 1, 6),
(75, 'v1', 'cn', 'CN312', 'IT322,CN322', NULL, 1, 6),
(76, 'v1', 'cn', 'CN441', 'IT342,CN322', NULL, 3, 8),
(77, 'v1', 'cn', 'CN473', 'CN322', NULL, 1, 7),
(78, 'v1', 'cn', 'CN413', 'CN321,CN473', NULL, 3, 8),
(79, 'v1', 'cn', 'CN483', 'IT342,CN281', NULL, 3, 7),
(80, 'v1', 'cn', 'CN484', 'CN382,CN483', NULL, 3, 8),
(81, 'v1', 'cn', 'CN414', 'CN473', 'add', 3, 6),
(82, 'v1', 'cn', 'CN415', 'CN321', 'add', 3, 6),
(83, 'v1', 'cn', 'CN443', 'CN483', 'add', 3, 6),
(84, 'v1', 'cn', 'CN451', 'CN382', 'add', 3, 6),
(85, 'v1', 'cn', 'CN472', 'CN441', 'add', 3, 6),
(86, 'v1', 'cn', 'CN474', 'CN371', 'add', 3, 6),
(87, 'v1', 'cn', 'CN475', 'CN371,CN331', 'add', 3, 6),
(88, 'v1', 'cn', 'CS451', 'IT201,IT211', 'add', 3, 6),
(89, 'v1', 'cn', 'CS471', 'IT322', 'add', 3, 6),
(90, 'v1', 'ce', 'CE201', 'GS141', NULL, 3, 3),
(91, 'v1', 'ce', 'CE202', 'CE301', NULL, 3, 4),
(92, 'v1', 'ce', 'CE203', 'CE301', NULL, 1, 4),
(93, 'v1', 'ce', 'CE210', 'IT221', NULL, 3, 4),
(94, 'v1', 'ce', 'CE211', 'IT221', NULL, 1, 4),
(95, 'v1', 'ce', 'CE325', 'IT221', NULL, 3, 6),
(96, 'v1', 'ce', 'CE221 ', 'CE201,CE301', NULL, 3, 4),
(97, 'v1', 'ce', 'CE300', 'CE201', NULL, 3, 5),
(98, 'v1', 'ce', 'CE310', 'CE201,IT221', NULL, 1, 5),
(99, 'v1', 'ce', 'CE311', 'CE201,CE320', NULL, 3, 5),
(100, 'v1', 'ce', 'CE312', 'CE411', NULL, 3, 5),
(101, 'v1', 'ce', 'CE313', 'CE411', NULL, 1, 6),
(102, 'v1', 'ce', 'CE321', 'CE321', NULL, 3, 5),
(103, 'v1', 'ce', 'CE220', 'IT221,CE201', NULL, 3, 4),
(104, 'v1', 'ce', 'CS351', 'IT211,IT341', NULL, 3, 6),
(106, 'v1', 'ce', 'CE415', 'CE210', 'add', 3, 6),
(107, 'v1', 'ce', 'CE416', 'CE200', 'add', 3, 6),
(108, 'v1', 'ce', 'CE440', 'IT322,IT212', 'add', 3, 6),
(109, 'v1', 'ce', 'CN331', 'IT271', 'add', 3, 6),
(110, 'v1', 'ce', 'CE450', 'CE325,CS450', 'add', 3, 6),
(111, 'v1', 'ce', 'CE482', 'CE201,CE210', 'add', 3, 6),
(112, 'v1', 'ce', 'CE483', 'CE311', 'add', 3, 6),
(113, 'v1', 'ce', 'CE484', 'CE200', 'add', 3, 6),
(124, 'v1', 'it', 'GE101', 'root', NULL, 3, 1),
(125, 'v1', 'it', 'GE111', 'root', NULL, 3, 1),
(126, 'v1', 'it', 'GE112', 'GE111', NULL, 3, 2),
(127, 'v1', 'it', 'GE131', 'root', NULL, 1, 1),
(128, 'v1', 'it', 'GE132', 'GE131', NULL, 1, 2),
(129, 'v1', 'it', 'GE231', 'GE132', NULL, 1, 3),
(130, 'v1', 'it', 'GE232', 'GE231', NULL, 1, 4),
(131, 'v1', 'it', 'GE311', 'root', NULL, 3, 4),
(132, 'v1', 'it', 'GS141', 'root', NULL, 4, 2),
(133, 'v1', 'it', 'GS111', 'root', NULL, 3, 1),
(134, 'v1', 'it', 'GS112', 'GS111', NULL, 3, 2),
(135, 'v1', 'it', 'GS221', 'GS112', NULL, 3, 3),
(136, 'v1', 'it', 'IT101', 'root', NULL, 3, 1),
(137, 'v1', 'it', 'IT111', 'root', NULL, 4, 1),
(138, 'v1', 'it', 'IT112', 'IT111', NULL, 4, 2),
(140, 'v1', 'it', 'IT212', 'IT112', NULL, 3, 3),
(141, 'v1', 'it', 'IT121', 'IT101', NULL, 3, 2),
(142, 'v1', 'it', 'IT222', 'IT121', NULL, 3, 4),
(143, 'v1', 'it', 'IT271', 'IT121', NULL, 3, 4),
(144, 'v1', 'it', 'IT301', 'IT101,IT111', NULL, 3, 6),
(145, 'v1', 'it', 'IT322', 'IT212', NULL, 3, 5),
(146, 'v1', 'it', 'IT341', 'IT212', NULL, 3, 5),
(147, 'v1', 'it', 'IT342', 'IT271', NULL, 3, 6),
(148, 'v1', 'it', 'IT492', '90', NULL, 3, 7),
(149, 'v1', 'it', 'IT499', '100', NULL, 4, 8),
(150, 'v1', 'it', 'root', '', NULL, 3, 0),
(153, 'v1', 'it', 'IT201', 'GS111,IT111', NULL, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depratment` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `name`, `depratment`, `remember_token`, `created_at`, `updated_at`) VALUES
(45, 'haitham', '$2y$10$1WAF6VSPwVw290V7HfVZFe/0hInjs9u3K/bojZeI9Hc9tGwvWduNi', 'هيثم نبوس', 'se', NULL, '2016-10-14', '2016-10-14'),
(46, 'n', '$2y$10$tb1dKeojwuQjzg6pTfghQeboH1O000xehwNrn4C5qf2Pzm3KXbwOG', 'n', 'se', 'M0Fw5R9RNZAEenzGZqmrDI7Epq4gbdx6xW8SF1bm4J8TLcClFlx5sySLwv51', '2016-10-17', '2016-10-17'),
(49, 'a2la', '$2y$10$HuemR1D4oG/yK9mSsQCVnerAz2SQd31M.xS5rPx/yw2Hm3t4F.2Oy', 'علاء  424', 'cn', 'kMGhQPPjgOI163mJLMD1lLntAh6jCS24xd4qetcQAg7zRd0ZsIXSqQgUi2Wt', '2016-10-17', '2016-10-20'),
(50, 'besha', '$2y$10$hrdUCNlXB1jolLV9PUuzZ.kwnDKfUCG6iXRLVVkE/R4zTouSmrILy', 'هيثم نبوس', 'se', 'tMKIAwPkYzfhyxMh8kIWpYaf76Lc6CXNsqLKhoK9PDQJDQK70QzRwJi62P3O', '2016-10-17', '2016-10-17'),
(51, 'nabildz', '$2y$10$M/GbLiVIm32u3Rx048gxQe1D.Fmh0wNJa.Yo/hQcmcGurW5f8QIsO', 'نبيل', 'se', NULL, '2016-10-20', '2016-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE IF NOT EXISTS `students_courses` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`id`, `student_id`, `course`, `updated_at`, `created_at`) VALUES
(48, '49', 'IT499', '2016-10-20', '2016-10-20'),
(49, '49', 'CS341', '2016-10-20', '2016-10-20'),
(50, '51', 'CS341', '2016-10-20', '2016-10-20'),
(51, '51', 'CS341', '2016-10-20', '2016-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
