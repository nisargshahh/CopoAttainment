-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 06:38 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `copo`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `year` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `year`, `created_by`, `created`, `course_id`) VALUES
(1, 'BDA :2010 - 2011', '2010 - 2011', 2, '2022-07-25 00:16:01', 1),
(2, 'BLC :2011 - 2012', '2011 - 2012', 2, '2022-07-25 10:09:34', 2),
(3, 'BDA :2013 - 2014', '2013 - 2014', 6, '2022-08-08 14:15:59', 1),
(4, 'Principal of Communication Engineering :2021 - 2022', '2021 - 2022', 2, '2022-08-18 11:10:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bt`
--

CREATE TABLE `bt` (
  `bt_id` int(11) NOT NULL,
  `bt_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bt`
--

INSERT INTO `bt` (`bt_id`, `bt_name`) VALUES
(1, 'Remember'),
(2, 'Understand'),
(3, 'Apply'),
(4, 'Analyze'),
(5, 'Execute'),
(6, 'Create');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `course_code` text NOT NULL,
  `semester` int(11) NOT NULL,
  `end_sem_total_marks` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `semester`, `end_sem_total_marks`, `created`, `department`) VALUES
(1, 'BDA', 'KJS2022', 7, 0, '2022-07-21 06:23:10', 0),
(2, 'BLC', 'BLC2022', 7, 0, '2022-07-21 06:26:15', 0),
(5, 'Principal of Communication Engineering', '1UEXC404', 4, 60, '2022-08-18 10:59:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_exit_attainment`
--

CREATE TABLE `course_exit_attainment` (
  `id` int(11) NOT NULL,
  `attainment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attainment_levels`)),
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_exit_attainment`
--

INSERT INTO `course_exit_attainment` (`id`, `attainment_levels`, `batch_id`) VALUES
(1, '{\"CO1\":3,\"CO2\":3,\"CO3\":3,\"CO4\":3,\"CO5\":0,\"CO6\":0}', 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_exit_mapping`
--

CREATE TABLE `course_exit_mapping` (
  `id` int(11) NOT NULL,
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `co_attainment`
--

CREATE TABLE `co_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `percentages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`percentages`)),
  `attainment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attainment_levels`)),
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_attainment`
--

INSERT INTO `co_attainment` (`id`, `batch_id`, `percentages`, `attainment_levels`, `test_id`) VALUES
(63, 4, '[94.349,0,0,0,0,0]', '[3,0,0,0,0,0]', 1),
(64, 4, '[97.26,98.63,93.151,93.151,0,0]', '[3,1,3,2,2,2]', 5),
(65, 4, '[94.82,93.151,0,0,97.26,0]', '[3,3,0,0,3,0]', 2);

-- --------------------------------------------------------

--
-- Table structure for table `co_list`
--

CREATE TABLE `co_list` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_list`
--

INSERT INTO `co_list` (`co_id`, `co_name`) VALUES
(1, 'CO1'),
(2, 'CO2'),
(3, 'CO3'),
(4, 'CO4'),
(5, 'CO5'),
(6, 'CO6');

-- --------------------------------------------------------

--
-- Table structure for table `co_mapping`
--

CREATE TABLE `co_mapping` (
  `id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `course_outcome` text NOT NULL,
  `hours_allotted` int(11) NOT NULL,
  `po_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_list`)),
  `po_hours_allotted` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_mapping`
--

INSERT INTO `co_mapping` (`id`, `co_id`, `course_outcome`, `hours_allotted`, `po_list`, `po_hours_allotted`, `batch_id`, `teacher_id`) VALUES
(3, 1, 'abc', 10, '[\"PO1\",\"PO2\",\"PO3\",\"PO4\",\"PO5\"]', '[\"2\",\"2\",\"2\",\"2\",\"2\"]', 4, 2),
(4, 2, 'def', 11, '[\"PO1\",\"PO2\",\"PO3\",\"PO4\"]', '[\"2\",\"3\",\"4\",\"2\"]', 4, 2),
(5, 3, 'ghi', 12, '[\"PO1\",\"PO2\",\"PO3\"]', '[\"4\",\"4\",\"4\"]', 4, 2),
(6, 4, 'jkl', 13, '[\"PO1\",\"PO2\",\"PO3\",\"PO4\",\"PO5\",\"PO6\"]', '[\"1\",\"2\",\"3\",\"4\",\"2\",\"1\"]', 4, 2),
(7, 5, 'mno', 14, '[\"PO1\",\"PO2\"]', '[\"7\",\"7\"]', 4, 2),
(8, 6, 'pqr', 15, '[\"PO1\",\"PO2\",\"PO3\",\"PO4\"]', '[\"9\",\"2\",\"3\",\"1\"]', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `co_target_value`
--

CREATE TABLE `co_target_value` (
  `id` int(11) NOT NULL,
  `percentages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`percentages`)),
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_target_value`
--

INSERT INTO `co_target_value` (`id`, `percentages`, `batch_id`) VALUES
(4, '[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]', 2),
(8, '[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]', 4);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Computer Engineering'),
(2, 'Information Technology'),
(3, 'Electronics and Telecommunications'),
(4, 'Artificial Intelligence and Data Science'),
(5, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `type_id` int(11) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`type_id`, `type_name`) VALUES
(1, 'Written Exam'),
(2, 'Practical'),
(3, 'Oral'),
(4, 'SAT Skill Based'),
(5, 'SAT Activity Based'),
(6, 'Lab Exit'),
(7, 'SAT Lab Exit'),
(8, 'Course Exit'),
(9, 'Internal Assessment');

-- --------------------------------------------------------

--
-- Table structure for table `ia_attainment`
--

CREATE TABLE `ia_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attainment_level` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ia_attainment`
--

INSERT INTO `ia_attainment` (`id`, `batch_id`, `attainment_level`, `percentage`) VALUES
(1, 4, 3, 70);

-- --------------------------------------------------------

--
-- Table structure for table `ia_mapping`
--

CREATE TABLE `ia_mapping` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `target_value` int(11) NOT NULL,
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ia_mapping`
--

INSERT INTO `ia_mapping` (`id`, `teacher_id`, `marks_id`, `batch_id`, `target_value`, `lower_range`, `upper_range`) VALUES
(1, 2, 29, 4, 40, 50, 60);

-- --------------------------------------------------------

--
-- Table structure for table `lab_exit_attainment`
--

CREATE TABLE `lab_exit_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attainment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attainment_levels`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_exit_attainment`
--

INSERT INTO `lab_exit_attainment` (`id`, `batch_id`, `attainment_levels`) VALUES
(1, 2, '{\"LO1\":3,\"LO2\":3,\"LO3\":3,\"LO4\":3,\"LO5\":0,\"LO6\":0}'),
(2, 1, '{\"LO1\":3,\"LO2\":3,\"LO3\":3,\"LO4\":3,\"LO5\":0,\"LO6\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `lab_exit_mapping`
--

CREATE TABLE `lab_exit_mapping` (
  `id` int(11) NOT NULL,
  `target_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`target_value`)),
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_exit_mapping`
--

INSERT INTO `lab_exit_mapping` (`id`, `target_value`, `lower_range`, `upper_range`, `batch_id`, `marks_id`) VALUES
(3, '[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]', 40, 50, 4, 11),
(5, '[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]', 40, 50, 2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `lo_list`
--

CREATE TABLE `lo_list` (
  `lo_id` int(11) NOT NULL,
  `lo_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lo_list`
--

INSERT INTO `lo_list` (`lo_id`, `lo_name`) VALUES
(1, 'LO1'),
(2, 'LO2'),
(3, 'LO3'),
(4, 'LO4'),
(5, 'LO5'),
(6, 'LO6');

-- --------------------------------------------------------

--
-- Table structure for table `lo_mapping`
--

CREATE TABLE `lo_mapping` (
  `id` int(11) NOT NULL,
  `lo_id` int(11) NOT NULL,
  `lab_outcome` text NOT NULL,
  `hours_allotted` int(11) NOT NULL,
  `po_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_list`)),
  `po_hours_allotted` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_hours_allotted`)),
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`marks`)),
  `pattern_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `marks`, `pattern_id`, `batch_id`, `created`, `type`) VALUES
(1, '{\"marks\":[{\"Arya Veer Krishna\":[\"4\",\"5\",\"5\"]},{\"Barot Het Mehul\":[\"4\",\"5\",\"5\"]},{\"Barude Yogesh Revan\":[\"4\",\"5\",\"5\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"4\",\"5\",\"5\"]},{\"Bhadra Vivek Rajesh\":[\"4\",\"5\",\"5\"]},{\"Bhole Chinmay Santosh\":[\"4\",\"5\",\"5\"]},{\"Birari Namita Nitin\":[\"4\",\"5\",\"5\"]},{\"Bodekar Ambaji Subhash\":[\"3\",\"5\",\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\",\"5\",\"5\"]},{\"Chahar Aditya Dharmendra\":[\"4\",\"5\",\"5\"]},{\"Chaudhary Rohan Mahesh\":[\"4\",\"5\",\"5\"]},{\"Chavan Siddhesh Vijay\":[\"4\",\"5\",\"5\"]},{\"Chawada Bhumika Dinesh\":[\"4\",\"5\",\"5\"]},{\"Dama Smit Bharat\":[\"4\",\"5\",\"5\"]},{\"Dixit Varun Sandeep\":[\"2\",\"5\",\"5\"]},{\"Duraphe Vaishnav Ashok\":[\"4\",\"5\",\"5\"]},{\"Eshan Anand Pranjali\":[\"3\",\"5\",\"5\"]},{\"Gaikwad Anjali Chandrakant\":[\"4\",\"5\",\"5\"]},{\"Gajjar Gaurang Rajesh\":[\"4\",\"5\",\"5\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\",\"5\",\"4\"]},{\"Gopinathan Aathira\":[\"4\",\"5\",\"5\"]},{\"Gothankar Aniket Madhukar\":[\"4\",\"5\",\"5\"]},{\"Hamdare Zaid Khalid\":[\"3\",\"4\",\"0\"]},{\"Jain Samyak Neeru\":[\"4\",\"5\",\"5\"]},{\"Jhaveri Bhavya Vipul\":[\"4\",\"5\",\"5\"]},{\"Kadam Chitrang Avinash\":[\"4\",\"5\",\"5\"]},{\"Kadam Omkar Ravindra\":[\"4\",\"5\",\"4\"]},{\"Kadam Rushikesh Vilas\":[\"4\",\"5\",\"5\"]},{\"Kadlag Omkar Abasaheb\":[\"5\",\"5\",\"5\"]},{\"Kariya Jay Nitin\":[\"4\",\"5\",\"5\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\",\"5\",\"5\"]},{\"Khochade Prathamesh Shashank\":[\"3\",\"5\",\"5\"]},{\"Kini Ganesh Yogesh\":[\"4\",\"5\",\"5\"]},{\"Koli Harsh Ravindra\":[\"3\",\"5\",\"5\"]},{\"Kulkarni Shubham Sunil\":[\"4\",\"5\",\"4\"]},{\"Metha Rajat Rahul\":[\"4\",\"5\",\"5\"]},{\"Parab Mihir Harishankar\":[\"4\",\"5\",\"5\"]},{\"Paradkar Rohit Santosh\":[\"4\",\"5\",\"5\"]},{\"Patel Ayush Rahul\":[\"4\",\"5\",\"4\"]},{\"Patel Pradeep Savji\":[\"4\",\"5\",\"5\"]},{\"Patel Ved Pranet\":[\"4\",\"5\",\"5\"]},{\"Patil Anurag Sudhir\":[\"4\",\"5\",\"5\"]},{\"Patil Sujal Dinesh\":[\"4\",\"5\",\"5\"]},{\"Pawar Nakul Umesh\":[\"4\",\"5\",\"5\"]},{\"Rana Gaurav Santosh\":[\"4\",\"5\",\"5\"]},{\"Sahu Aklant Akhaya\":[\"4\",\"4\",\"5\"]},{\"Sakpal Saloni Anil\":[\"4\",\"5\",\"5\"]},{\"Sapkale Gunjan Kunda\":[\"3\",\"5\",\"5\"]},{\"Satam Shabda Shrikant\":[\"4\",\"5\",\"5\"]},{\"Shaikh Faizan Majid\":[\"3\",\"4\",\"3\"]},{\"Shashtri Parikshit Umesh\":[\"4\",\"5\",\"5\"]},{\"Shinde Raj Anil\":[\"4\",\"5\",\"5\"]},{\"Singh Aashima Paramjit\":[\"4\",\"5\",\"5\"]},{\"Singh Kanika Krishnakumar\":[\"4\",\"5\",\"5\"]},{\"Singh Shikhar Chandrabhushan\":[\"4\",\"5\",\"5\"]},{\"Singh Ujjawal Dinesh\":[\"4\",\"5\",\"5\"]},{\"Singh Vatsa Deepak\":[\"4\",\"5\",\"5\"]},{\"Singh Ishani Ravishankar\":[\"4\",\"5\",\"5\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\",\"5\",\"5\"]},{\"Sonne Abhinandan Shahaji\":[\"4\",\"5\",\"5\"]},{\"Talajiya Ajinkya Niraj\":[\"4\",\"5\",\"5\"]},{\"Tapre Rrahul Jaywant\":[\"3\",\"5\",\"5\"]},{\"Telgote Gajanan Vinod\":[\"4\",\"5\",\"5\"]},{\"Thapar Harjas Rajindersingh\":[\"4\",\"5\",\"5\"]},{\"Tiwari Rithik Subash\":[\"4\",\"5\",\"5\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"4\",\"5\",\"5\"]},{\"Ugale Ashwin Govind\":[\"4\",\"5\",\"5\"]},{\"Vaja Jash Deepak\":[\"AB\",\"AB\",\"AB\"]},{\"Vishal Vijayan Rajani\":[\"3\",\"5\",\"5\"]},{\"Wani Vipul Vinod\":[\"4\",\"5\",\"5\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\",\"5\",\"5\"]},{\"Zaveri Deep Kalpana\":[\"4\",\"5\",\"5\"]},{\"Zore Ronit Raju\":[\"4\",\"5\",\"5\"]}]}', 1, 1, '2022-07-25 01:14:22', 1),
(3, '[{\"Arya Veer Krishna\":[20]},{\"Barot Het Mehul\":[21]},{\"Barude Yogesh Revan\":[22]},{\"Bendkhale Vaishnavi Vidyadhar\":[16]},{\"Bhadra Vivek Rajesh\":[24]},{\"Bhole Chinmay Santosh\":[23]},{\"Birari Namita Nitin\":[22]},{\"Bodekar Ambaji Subhash\":[21]},{\"Bodekar Sunil Bhiru\":[17]},{\"Chahar Aditya Dharmendra\":[19]}]', 0, 1, '2022-08-08 11:03:29', 3),
(4, '[{\"Kush Gada\":[3,17,20,16,18,17,15,20,18,15,17,19,20,20,16,1]},{\"Vishal Gala\":[2,15,17,19,18,20,15,15,20,18,17,19,19,16,20,4]},{\"Amit Ahir\":[13,15,16,18,20,20,18,15,14,18,19,18,20,20,16,5]}]', 0, 1, '2022-08-10 13:30:37', 2),
(5, '[{\"Arya Veer Krishna\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Barot Het Mehul\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Barude Yogesh Revan\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Bendkhale Vaishnavi Vidyadhar\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Bhadra Vivek Rajesh\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Bhole Chinmay Santosh\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Birari Namita Nitin\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Bodekar Ambaji Subhash\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Bodekar Sunil Bhiru\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Chahar Aditya Dharmendra\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Chaudhary Rohan Mahesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Chavan Siddhesh Vijay\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Chawada Bhumika Dinesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Dama Smit Bharat\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Dixit Varun Sandeep\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Duraphe Vaishnav Ashok\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Eshan Anand Pranjali\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Gaikwad Anjali Chandrakant\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Gajjar Gaurang Rajesh\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Ghorpade Mayuresh Shrikant\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Gopinathan Aathira\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Gothankar Aniket Madhukar\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Hamdare Zaid Khalid\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Jain Samyak Neeru\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Jhaveri Bhavya Vipul\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Kadam Chitrang Avinash\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Kadam Omkar Ravindra\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Kadam Rushikesh Vilas\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Kadlag Omkar Abasaheb\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Kariya Jay Nitin\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Kayampurath Ashwin Ramesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Khochade Prathamesh Shashank\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Kini Ganesh Yogesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Koli Harsh Ravindra\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Kulkarni Shubham Sunil\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Metha Rajat Rahul\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Parab Mihir Harishankar\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Paradkar Rohit Santosh\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Patel Ayush Rahul\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Patel Pradeep Savji\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Patel Ved Pranet\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Patil Anurag Sudhir\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Patil Sujal Dinesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Pawar Nakul Umesh\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Rana Gaurav Santosh\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Sahu Aklant Akhaya\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Sakpal Saloni Anil\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Sapkale Gunjan Kunda\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Satam Shabda Shrikant\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Shaikh Faizan Majid\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Shashtri Parikshit Umesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Shinde Raj Anil\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Singh Aashima Paramjit\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Singh Kanika Krishnakumar\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Singh Shikhar Chandrabhushan\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Singh Ujjawal Dinesh\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Singh Vatsa Deepak\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Singh Ishani Ravishankar\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Somavanshi Ashutosh Suresh\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Sonne Abhinandan Shahaji\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Talajiya Ajinkya Niraj\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Tapre Rrahul Jaywant\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Telgote Gajanan Vinod\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Thapar Harjas Rajindersingh\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Tiwari Rithik Subash\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Udaipurwala Burhanuddin Siraj\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Ugale Ashwin Govind\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Vaja Jash Deepak\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Vishal Vijayan Rajani\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Wani Vipul Vinod\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Yadav Abhishek Jagdish Prasad\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Zaveri Deep Kalpana\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Zore Ronit Raju\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]}]', 0, 2, '2022-08-12 11:12:51', 2),
(6, '[{\"Arya Veer Krishna\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Barot Het Mehul\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Barude Yogesh Revan\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Bendkhale Vaishnavi Vidyadhar\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Bhadra Vivek Rajesh\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Bhole Chinmay Santosh\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Birari Namita Nitin\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Bodekar Ambaji Subhash\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Bodekar Sunil Bhiru\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Chahar Aditya Dharmendra\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Chaudhary Rohan Mahesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Chavan Siddhesh Vijay\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Chawada Bhumika Dinesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Dama Smit Bharat\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Dixit Varun Sandeep\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Duraphe Vaishnav Ashok\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Eshan Anand Pranjali\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Gaikwad Anjali Chandrakant\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Gajjar Gaurang Rajesh\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Ghorpade Mayuresh Shrikant\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Gopinathan Aathira\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Gothankar Aniket Madhukar\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Hamdare Zaid Khalid\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Jain Samyak Neeru\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Jhaveri Bhavya Vipul\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Kadam Chitrang Avinash\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Kadam Omkar Ravindra\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Kadam Rushikesh Vilas\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Kadlag Omkar Abasaheb\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Kariya Jay Nitin\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Kayampurath Ashwin Ramesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Khochade Prathamesh Shashank\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Kini Ganesh Yogesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Koli Harsh Ravindra\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Kulkarni Shubham Sunil\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Metha Rajat Rahul\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Parab Mihir Harishankar\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Paradkar Rohit Santosh\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Patel Ayush Rahul\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Patel Pradeep Savji\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Patel Ved Pranet\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Patil Anurag Sudhir\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Patil Sujal Dinesh\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Pawar Nakul Umesh\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Rana Gaurav Santosh\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Sahu Aklant Akhaya\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Sakpal Saloni Anil\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Sapkale Gunjan Kunda\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Satam Shabda Shrikant\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Shaikh Faizan Majid\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Shashtri Parikshit Umesh\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Shinde Raj Anil\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Singh Aashima Paramjit\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Singh Kanika Krishnakumar\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Singh Shikhar Chandrabhushan\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Singh Ujjawal Dinesh\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Singh Vatsa Deepak\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Singh Ishani Ravishankar\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Somavanshi Ashutosh Suresh\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Sonne Abhinandan Shahaji\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Talajiya Ajinkya Niraj\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Tapre Rrahul Jaywant\":[11,11,11,11,11,11,11,11,11,11,11,11,11,11,11,11]},{\"Telgote Gajanan Vinod\":[12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12]},{\"Thapar Harjas Rajindersingh\":[13,13,13,13,13,13,13,13,13,13,13,13,13,13,13,13]},{\"Tiwari Rithik Subash\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Udaipurwala Burhanuddin Siraj\":[15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15]},{\"Ugale Ashwin Govind\":[16,16,16,16,16,16,16,16,16,16,16,16,16,16,16,16]},{\"Vaja Jash Deepak\":[17,17,17,17,17,17,17,17,17,17,17,17,17,17,17,17]},{\"Vishal Vijayan Rajani\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]},{\"Wani Vipul Vinod\":[19,19,19,19,19,19,19,19,19,19,19,19,19,19,19,19]},{\"Yadav Abhishek Jagdish Prasad\":[10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10]},{\"Zaveri Deep Kalpana\":[14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14]},{\"Zore Ronit Raju\":[18,18,18,18,18,18,18,18,18,18,18,18,18,18,18,18]}]', 0, 1, '2022-08-18 09:45:34', 4),
(11, '[{\"AGAJ DIVYA SANTOSH SANJANA\":[5,5,5,5,0,0]},{\"AHER PRUTHVIRAJ SATISH NAMRATA\":[5,5,5,5,0,0]},{\"AMAL ROHAN UMESH HANSA\":[3,4,3,3,0,0]},{\"AMBOLE SUJIT MAHADEO MALAN\":[5,5,5,5,0,0]},{\"APPA PRIYANSHU ANILKUMAR SARLA\":[5,5,5,5,0,0]},{\"ARBAN SHRUSTI SANDEEP MANISHA\":[3,3,3,3,0,0]},{\"AWATE PRATHAMESH PRAKASH PRACHI\":[5,4,4,4,0,0]},{\"BARAI VEDANT MEHUL BIJAL\":[4,4,4,4,0,0]},{\"BHAGYWANT SATYAM SUBHASH SANGITA\":[5,5,5,5,0,0]},{\"BHARDWAJ SHUBHAM DEVANAND UMA\":[5,5,4,5,0,0]},{\"BIRJE RUSHIKESH RUPESH ANITA\":[5,5,5,5,0,0]},{\"CHANDANSHIVE ARYAA UDAY VINAYA\":[5,5,4,5,0,0]},{\"CHAUDHARI RAJAS DHANANJAY ARUNDHATI\":[5,5,5,5,0,0]},{\"CHAVARE ARYAN MANOJ VANDANA\":[5,5,5,5,0,0]},{\"DAVE ZEEL VIRENDRA PAYAL\":[4,4,4,4,0,0]},{\"DESAI NIRAV SHAMSUNDER SAMRUDDHI\":[5,5,5,5,0,0]},{\"DESAI PRAJAKTA RAVINDRA SANGEETA\":[4,4,3,5,0,0]},{\"DESHMANE ABHINAV MACHHINDRA SHARDA\":[5,5,5,4,0,0]},{\"DESHMUKH HARSH KANOJ MEENA\":[0,0,0,0,0,0]},{\"DESHPANDE SHRISH MANIK SHILPA\":[5,5,5,5,0,0]},{\"DHAKE DHANASHREE RAVINDRA NEETA\":[2,2,2,2,0,0]},{\"DHANSE AFFAN HASAN ALI NASREEN\":[4,4,4,4,0,0]},{\"DHOTE PIYUSH SANJAY SANGITA\":[5,5,5,5,0,0]},{\"GADEKAR VISHAL SANJAY SUNITA\":[4,4,4,4,0,0]},{\"GAIKWAD TANMAY TANAJI JAYASHREE\":[4,4,4,4,0,0]},{\"GAMIT SHUBHAM DIPAKKUMAR SHAILA\":[4,4,4,4,0,0]},{\"GANDHI TANUSH SANJAY URMILA\":[4,4,3,3,0,0]},{\"GANGAL NIKHIL SUNIL SUJATA\":[5,4,4,5,0,0]},{\"GHADI MOHIT NITIN POOJA\":[5,5,5,5,0,0]},{\"GHADIGAONKAR RAJAS SANDEEP RADHIKA\":[4,4,4,4,0,0]},{\"GITE HARSH SANJAY MAYA\":[4,4,4,4,0,0]},{\"GOPALKAR PIYUSH VINOD NEHA\":[4,4,5,3,0,0]},{\"GOVALKAR DEVANG SURYAKANT SANGEETA\":[5,5,5,5,0,0]},{\"GOWDA CHAITRISH UMESH MANJULA\":[5,4,3,4,0,0]},{\"HALBE HIMANSHU KISHOR VEENA\":[0,0,0,0,0,0]},{\"HARNE VINIT JITENDRA SHARDA\":[4,4,3,4,0,0]},{\"JADEJA RAJ MANSINGH KUSUMBA\":[5,5,5,5,0,0]},{\"JADHAV PRABUDDHA SANDEEP RUCHIRA\":[5,5,5,5,0,0]},{\"JAIN TISHA SANTOSH PADMA\":[5,5,5,5,0,0]},{\"JAISWAL HARSH MANOJ REKHA\":[5,5,5,5,0,0]},{\"JARI DHRUV PRASHANT VAISHALI\":[5,4,5,5,0,0]},{\"JETHVA MITESH MOHAN KALPANA\":[3,3,3,3,0,0]},{\"JHA AAKASHKUMAR ARUN VIVEKA\":[5,4,5,5,0,0]},{\"KADAM A AKANKSHA SANJAY SEEMA\":[5,5,5,5,0,0]},{\"KADGE SAHIL SANTOSH VAISHALI\":[5,5,4,5,0,0]},{\"KADLAG SHUBHANGI DNYANESHWAR SANGITA\":[5,5,5,5,0,0]},{\"KANKARIA PRATHAM PANKAJ JAYSHREE\":[4,4,4,4,0,0]},{\"KARANDE VIKRAM DEVDAS SHILPA\":[5,5,5,5,0,0]},{\"KATARIA UDAY ASHOK CHETANA\":[5,5,4,5,0,0]},{\"KAWA PARTHVI JATIN HEMLATA\":[0,0,0,0,0,0]},{\"KHAKHAR DEVANG ASHISH NEHA\":[5,4,5,5,0,0]},{\"KHEDEKAR ADITYA SANDEEP SWATI\":[5,5,5,5,0,0]},{\"KHOT KAMRAN ABDUL MAJEED RUBINA\":[5,5,5,5,0,0]},{\"KOLAPE PRATHMESH SUNIL MANISHA\":[4,4,4,4,0,0]},{\"KORGAONKAR VEDANT MAHESH MANSI\":[5,5,5,5,0,0]},{\"KSHIRSAGAR RENUKA SHARAD ROHINI\":[4,5,4,4,0,0]},{\"KUMAR SAHIL SANJIV RASHMI\":[4,4,4,4,0,0]},{\"LAKHE OMKAR ANANT VAISHALI\":[3,4,4,4,0,0]},{\"LAKHERA VEDANT RITESH MITALI\":[5,5,5,5,0,0]},{\"MANDHANIA ADITYA PURSHOTTAM KAVITA\":[4,5,5,5,0,0]},{\"MANUSMARE ADHISH ISHWAR BHAVANA\":[5,5,5,5,0,0]},{\"MEENA NIDHI DURGASHANKAR ASHA\":[5,5,5,5,0,0]},{\"MISHRA SURAJ INU\":[3,4,4,4,0,0]},{\"MOHITE KUNAL KRISHNA KAMAL\":[4,4,4,4,0,0]},{\"MOHITE RAJ DEEPAK DEEPALI\":[5,5,5,5,0,0]},{\"MOHITE SIDDHI DATTATRAY SURELI\":[0,0,0,0,0,0]},{\"MUDALIAR KEVIN GOPALKRISHNAN PADMAVATHY\":[4,4,4,3,0,0]},{\"NADAR PAVITHIRA MUTHURAMAN SARATHA\":[5,5,5,5,0,0]},{\"NAKADE SUPRIYA SURESH PARVATI\":[4,4,3,4,0,0]},{\"NAMDEV SNEHA ASHWIN SMITA\":[4,4,4,4,0,0]},{\"NARKHEDE LALIT SURESH LEKHA\":[5,5,5,5,0,0]},{\"NASARE MEHUL SURYAKANT SAKSHI\":[4,4,4,5,0,0]},{\"NAVANDER YASH VIJAY MEENA\":[4,5,5,5,0,0]},{\"NEDARIYA HANZALA ASIF NAJMA\":[5,5,5,5,0,0]},{\"NEDARIYA HUZEFA ASIF NAJMA\":[5,5,5,4,0,0]},{\"PALAN KSHITIJ MAHESHKUMAR SUNITA\":[0,0,0,0,0,0]},{\"PANCHAL KRISH PARESH FALGUNI\":[4,5,5,4,0,0]},{\"PANCHAL NEHAL PANKAJ UNNATI\":[4,4,3,4,0,0]},{\"PANCHAL NIKUNJ ASHOK CHNADRIKA\":[5,5,5,5,0,0]},{\"PANDEY AYUSH SANTOSH SHALINI\":[5,5,5,5,0,0]},{\"PANGUDWALE VEDANT HEMANT ARCHANA\":[5,5,5,5,0,0]},{\"PAREKH SIDDHARTH JAYESH PURNIMA\":[5,5,5,5,0,0]},{\"PARMAR DRASHTI RAMESH ARCHANA\":[5,5,5,5,0,0]},{\"PATEL BHAVESH PRAKASH MEENA\":[5,5,5,5,0,0]},{\"PATEL RAHUL PURSHOTTAM JAYSHREE\":[0,0,0,0,0,0]},{\"PATIL NINAD SANJAY ROHINI\":[5,5,4,5,0,0]},{\"PATIL SOURABH SAYAJI SHALAN\":[4,3,3,3,0,0]},{\"PATIL SUMEDH ARUN PUSHPALATA\":[5,5,5,5,0,0]},{\"PAWAR ANUSHKA SANTOSH SNEHAL\":[5,4,5,5,0,0]},{\"PHONDEKAR DEVANG UMESH NAYANA\":[4,4,4,4,0,0]},{\"PUNDE PRAFUL RAJENDRA LEELA\":[5,5,5,5,0,0]},{\"PUVVADA JATEESH VENKATA SAI KRISHNA MADHAVI\":[5,5,5,5,0,0]},{\"QURESHI FARHAN USMAN ALI RAHEEMA\":[4,4,4,4,0,0]},{\"RAJAK SUMEET KUMAR MAHENDRA SUMANLATA\":[4,4,3,4,0,0]},{\"RAMPURAWALA HATIM SAIFUDDIN RAZIYA\":[5,5,5,5,0,0]},{\"RASKAR SAURABH BALU JAYSHREE\":[4,4,4,4,0,0]},{\"RATHI DEVANSH RAKESH NEETA\":[5,4,4,4,0,0]},{\"RATHI VINIT SHASHIKANT LATIKA\":[5,5,5,4,0,0]},{\"RATHOD SUNIDHI MANISH NISHIGANDHA\":[4,4,4,4,0,0]},{\"RAWAL VED TUSHAR SONAL\":[5,5,5,5,0,0]},{\"RODE RACHITA RAJENDRA VAISHALI\":[4,4,4,4,0,0]},{\"SAH RAMLAKHAN BIRBAHADUR BINDA DEVI\":[4,4,4,4,0,0]},{\"SALIAN SOUMYA HARISH VIDYA\":[5,5,5,5,0,0]},{\"SALUNKHE YASH JAYPRAKASH JAYSHRI\":[4,4,4,4,0,0]},{\"SAMANT HARYASHWA BHUPESH RASHMI\":[5,5,5,5,0,0]},{\"SANKPAL PARTH KUNDLIK VARSHA\":[5,5,5,5,0,0]},{\"SAPKAL SARASWAT SANJAY ARCHANA\":[4,4,4,4,0,0]},{\"SARKATE SIDDHANT DNYANDEO ARCHANA\":[4,4,4,4,0,0]},{\"SARODE DARSHAN REVANAND SUJATA\":[4,4,4,4,0,0]},{\"SAROWA ATUL KAMLESH SAROWA\":[5,5,4,5,0,0]},{\"SAWANT ATHARV GOPAL RADHIKA\":[5,5,5,5,0,0]},{\"SHEIKH QAINAT AHMED NASIMA\":[5,5,5,5,0,0]},{\"SHELAR SAKSHI GHANSHYAM SARIKA\":[5,5,5,5,0,0]},{\"SHETTY MANASVI SUBHASH JAYASHRI\":[5,5,5,5,0,0]},{\"SINGH ADITYA BRIJ KISHORE SARITA SINGH\":[5,5,4,5,0,0]},{\"SINGH AMAN SADA PRATIMA\":[5,4,4,4,0,0]},{\"SINGH ARMAN MANOJ MALA\":[3,3,4,3,0,0]},{\"SINGH PRANAV MANOJ DEEPTI\":[4,4,4,4,0,0]},{\"SINGH SRISHTI MADANMOHAN MEENA\":[2,2,2,2,0,0]},{\"SOLANKI HARSH PRASHANT RASHMIKA\":[5,5,5,5,0,0]},{\"SONI MIHIR HARESH NISHA\":[5,5,5,5,0,0]},{\"SUTARIYA OM JANAKBHAI ISHA\":[4,4,4,4,0,0]},{\"TADLA VEDANT SANJAY KALPANA\":[0,0,0,0,0,0]},{\"THADURU PRATHAMESH RAMESH MANJULA\":[4,4,4,4,0,0]},{\"THAKKAR KUNAL MANISH SANGEETA\":[5,4,5,5,0,0]},{\"THAKUR KRUPALI SHANKAR ARCHANA\":[4,5,5,5,0,0]},{\"TIWARI AKANKSHA ASHOK POONAM\":[5,5,5,5,0,0]},{\"TIWARI PRATHMESH ASHOK RAGINI\":[5,5,5,5,0,0]},{\"TRIPATHI SHREYASH SUBHAS MANISHA\":[5,5,5,5,0,0]},{\"TRIVEDI DIVYANK VIJAY REKHA\":[5,5,5,5,0,0]},{\"VANJARI MADHAV LAXMINARAYAN SUGANDHA\":[5,5,5,5,0,0]},{\"VELANKAR ANIKET AMIT GEETANJALI\":[4,3,4,3,0,0]},{\"VIRK SAMARJEET SINGH BALJIT SINGH BALJIT KAUR\":[3,2,3,3,0,0]},{\"WAGHELA VED MANISH VIDYA\":[3,4,3,3,0,0]},{\"YADAV ANKIT PRAMOD KUMAR PRATIMA\":[4,4,4,4,0,0]},{\"YADAV AVANISH BRIJESH SAVITA\":[4,4,4,4,0,0]}]', 0, 4, '2022-08-19 19:11:34', 6),
(14, '[{\"Amal Rohan Umesh\":[0,0,0,0,0,0,0,0,16]},{\"Appa Priyanshu Anilkumar\":[18,25,25,18,18,18,18,18,15]},{\"Arban Shrushti Sandeep\":[22,23,23,23,23,23,23,22,21]},{\"Bhagywant Satyam Subhash\":[18,18,18,18,18,18,18,18,12]},{\"---\":[0,0,0,0,0,0,0,0,0]},{\"Bhardwaj Shubham Devanand\":[23,21,23,22,25,23,23,22,24]},{\"Desai Nirav Shamsunder\":[23,22,22,21,22,23,22,23,16]},{\"Desai Prajakta Ravindra\":[18,18,18,18,18,18,18,18,20]},{\"Deshmane Abhinav Machhindra\":[18,18,18,18,18,18,18,18,18]},{\"Deshpande Shrish Manik\":[21,21,21,21,21,21,20,21,17]},{\"Dhote Piyush Sanjay\":[18,18,18,15,16,18,18,18,14]},{\"Gamit Shubham Dipakkumar\":[21,21,21,21,21,21,21,22,12]},{\"Gandhi Tanush Sanjay\":[22,21,25,25,21,21,21,21,15]},{\"Ghadi Mohit Nitin\":[23,23,23,23,23,23,23,23,21]},{\"Gite Harsh Sanjay\":[21,21,21,21,21,21,21,21,12]},{\"Gopalkar Piyush Vinod\":[23,24,25,23,25,24,23,23,23]},{\"Govalkar Devang Suryakant\":[18,25,25,25,16,18,19,18,22]},{\"Gowda Chaitrish Umesh\":[23,25,25,25,23,22,23,23,23]},{\"Halbe Himanshu Kishor\":[23,25,23,25,23,23,23,23,23]},{\"Harne Vinit Jitendra\":[16,16,18,18,18,18,18,18,20]},{\"Jadeja Raj Mansingh\":[18,18,18,18,18,16,18,18,20]},{\"Jain Tisha Santosh\":[20,20,22,22,21,22,22,22,22]},{\"Jaiswal Harsh Manoj\":[22,23,22,23,22,22,22,22,24]},{\"Jari Dhruv Prashant\":[21,17,17,17,17,17,17,17,16]},{\"Jethva Mitesh Mohan\":[0,19,0,0,0,0,0,0,0]},{\"Kadge Sahil Santosh\":[22,22,22,22,22,22,22,22,23]},{\"Kankariya Pratham Pankaj\":[22,22,22,22,22,22,22,22,22]},{\"Kataria Uday Ashok\":[20,21,21,20,21,19,19,20,18]},{\"Kawa Parthvi Jatin\":[20,22,22,22,22,20,22,22,22]},{\"Khedekar Aditya Sandeep\":[15,15,22,15,15,15,17,15,15]},{\"Khot Kamran Abdulmajeed\":[23,20,21,22,22,23,20,23,12]},{\"Korgaonkar Vedant Mahesh\":[12,12,12,12,12,12,12,12,12]},{\"Kshirsagar Renuka Sharad\":[16,14,14,14,14,14,16,14,12]},{\"Yadav Ankit Kumar Pramod\":[21,21,21,22,21,21,21,22,24]},{\"Kumar Sahil Sanjiv\":[23,22,22,22,22,22,22,22,22]},{\"Lakhe Omkar Anant\":[22,22,22,22,22,22,22,17,22]},{\"Lakhera Vedant Ritesh\":[20,22,21,21,17,18,18,19,23]},{\"Mandhania Aditya Purshottam\":[23,22,22,22,22,22,22,22,23]},{\"Manusmare Adhish Ishwar\":[20,20,20,20,20,20,20,20,23]},{\"Meena Nidhi Durgashankar\":[16,16,16,16,16,16,16,16,16]},{\"Mishra Suraj Subhash\":[12,12,12,12,12,12,12,14,18]},{\"Mohite Kunal Krishna\":[18,16,16,15,15,15,15,15,15]},{\"Nadar Pavithira Muthuraman\":[22,22,22,23,23,23,23,24,23]},{\"Namdev Sneha Ashwin\":[20,20,20,22,23,19,22,21,22]},{\"Narkhede Lalit Suresh\":[15,15,15,15,15,15,15,15,20]},{\"Nasare Mehul Suryakant\":[16,16,16,20,16,16,16,16,22]},{\"Panchal Nehal Pankaj\":[20,19,19,21,21,20,21,20,23]},{\"Pandey Ayush Santosh\":[20,24,22,22,23,20,21,24,23]},{\"Pangudwale Vedant Hemant\":[16,16,16,16,16,16,16,16,24]},{\"Parmar Drashti Ramesh\":[23,22,23,22,23,23,23,24,24]},{\"Patel Rahul Purshottam\":[20,20,20,20,18,18,18,18,15]},{\"Patil Sumedh Arun\":[21,21,22,23,23,21,21,21,24]},{\"Pawar Anushka Santosh\":[15,15,15,15,15,15,15,15,14]},{\"Punde Praful Rajendra\":[15,15,15,15,15,15,15,15,12]},{\"Rampurawala Hatim Saifuddin\":[15,15,15,15,15,15,15,15,21]},{\"Raskar Saurabh Balu\":[22,24,24,22,22,21,22,24,22]},{\"Rathi Devansh Rakesh\":[23,24,22,22,21,21,21,20,21]},{\"Rathi Vinit Shashikant\":[16,16,16,16,16,16,16,16,20]},{\"Rathod Sunidhi Manish\":[15,15,15,15,15,15,15,15,15]},{\"(Rawal Ved T.) Ved Trivedi\":[15,15,15,15,15,15,15,15,15]},{\"Rode Rachita Rajendra\":[15,15,15,15,15,15,15,15,20]},{\"Sah Ramlakhan Birbahadur\":[20,20,20,20,20,21,21,19,23]},{\"Salian Soumya Harish\":[16,16,16,16,16,16,16,16,23]},{\"Sankpal Parth Kundlik\":[22,24,24,22,22,22,22,24,22]},{\"Sapkal Saraswat Sanjay\":[22,24,24,24,24,24,23,23,23]},{\"Sarowa Atul Nareshkumar\":[23,24,24,24,24,24,24,20,23]},{\"Sheikh Qainat Ahmed\":[8,8,8,8,8,8,8,8,8]},{\"Shetty Manasvi Subhash\":[24,22,24,24,24,24,23,24,22]},{\"Singh Aman Sada\":[21,21,20,22,21,21,21,21,20]},{\"Singh Arman Manoj\":[22,20,19,19,23,24,23,23,22]},{\"Singh Pranav Manoj\":[24,24,24,23,25,21,20,20,23]},{\"Singh Srishti Madanmohan\":[21,24,23,24,23,24,22,22,23]},{\"Soni Mihir Haresh\":[24,24,24,24,24,24,22,22,24]},{\"Sutariya Om Janak\":[12,12,12,12,12,12,12,12,12]},{\"Tadla Vedant Sanjay\":[23,24,24,24,24,24,23,23,21]},{\"Thaduru Prathamesh Ramesh\":[20,24,24,24,24,24,20,20,20]},{\"Thakkar Kunal Manish\":[23,24,24,24,21,23,22,21,20]},{\"Thakur Krupali Shankar\":[20,20,20,20,20,20,20,20,20]},{\"Tiwari Akanksha Ashok\":[20,23,23,23,23,23,20,20,20]},{\"Tiwari Prathmesh Ashok\":[15,15,15,15,15,15,15,15,15]},{\"Trivedi Divyank Vijay\":[20,22,20,20,20,20,20,20,10]},{\"Virk Samarjeet Singh\":[22,21,21,21,22,21,22,23,21]},{\"Waghela Ved Manish\":[24,24,24,24,24,24,24,20,23]},{\"Yadav Avanish Brijesh\":[12,12,12,12,12,12,12,12,11]},{\"Tripathi Shreyash Subhas\":[null,null,null,null,null,null,null,null,0]},{\"Jha Aakashkumaru00a0Arun\":[0,0,0,0,0,0,0,0,0]}]', 0, 4, '2022-08-22 12:08:39', 2),
(15, '[{\"Arya Veer Krishna\":[20]},{\"Barot Het Mehul\":[21]},{\"Barude Yogesh Revan\":[22]},{\"Bendkhale Vaishnavi Vidyadhar\":[16]},{\"Bhadra Vivek Rajesh\":[24]},{\"Bhole Chinmay Santosh\":[23]},{\"Birari Namita Nitin\":[22]},{\"Bodekar Ambaji Subhash\":[21]},{\"Bodekar Sunil Bhiru\":[17]},{\"Chahar Aditya Dharmendra\":[19]}]', 0, 4, '2022-08-22 13:32:30', 3),
(19, '[{\"Arya Veer Krishna\":[\"4\",\"5\",\"6\",\"6\"]},{\"Barot Het Mehul\":[\"4\",\"5\",\"7\",\"7\"]},{\"Barude Yogesh Revan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Bhadra Vivek Rajesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Bhole Chinmay Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Birari Namita Nitin\":[\"4\",\"5\",\"4\",\"4\"]},{\"Bodekar Ambaji Subhash\":[\"3\",\"5\",\"5\",\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\",\"5\",\"7\",\"7\"]},{\"Chahar Aditya Dharmendra\":[\"4\",\"5\",\"8\",\"8\"]},{\"Chaudhary Rohan Mahesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Chavan Siddhesh Vijay\":[\"4\",\"5\",\"7\",\"7\"]},{\"Chawada Bhumika Dinesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Dama Smit Bharat\":[\"4\",\"5\",\"7\",\"7\"]},{\"Dixit Varun Sandeep\":[\"2\",\"5\",\"5\",\"5\"]},{\"Duraphe Vaishnav Ashok\":[\"4\",\"5\",\"7\",\"7\"]},{\"Eshan Anand Pranjali\":[\"3\",\"5\",\"8\",\"8\"]},{\"Gaikwad Anjali Chandrakant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Gajjar Gaurang Rajesh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\",\"5\",\"10\",\"10\"]},{\"Gopinathan Aathira\":[\"4\",\"5\",\"8\",\"8\"]},{\"Gothankar Aniket Madhukar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Hamdare Zaid Khalid\":[\"3\",\"4\",\"0\",\"0\"]},{\"Jain Samyak Neeru\":[\"4\",\"5\",\"9\",\"9\"]},{\"Jhaveri Bhavya Vipul\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadam Chitrang Avinash\":[\"4\",\"5\",\"7\",\"7\"]},{\"Kadam Omkar Ravindra\":[\"4\",\"5\",\"4\",\"4\"]},{\"Kadam Rushikesh Vilas\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadlag Omkar Abasaheb\":[\"5\",\"5\",\"10\",\"10\"]},{\"Kariya Jay Nitin\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Khochade Prathamesh Shashank\":[\"3\",\"5\",\"10\",\"10\"]},{\"Kini Ganesh Yogesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Koli Harsh Ravindra\":[\"3\",\"5\",\"8\",\"8\"]},{\"Kulkarni Shubham Sunil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Metha Rajat Rahul\":[\"4\",\"5\",\"9\",\"9\"]},{\"Parab Mihir Harishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Paradkar Rohit Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Patel Ayush Rahul\":[\"4\",\"5\",\"4\",\"4\"]},{\"Patel Pradeep Savji\":[\"4\",\"5\",\"7\",\"7\"]},{\"Patel Ved Pranet\":[\"4\",\"5\",\"8\",\"8\"]},{\"Patil Anurag Sudhir\":[\"4\",\"5\",\"9\",\"9\"]},{\"Patil Sujal Dinesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Pawar Nakul Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Rana Gaurav Santosh\":[\"4\",\"5\",\"8\",\"8\"]},{\"Sahu Aklant Akhaya\":[\"4\",\"4\",\"6\",\"6\"]},{\"Sakpal Saloni Anil\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sapkale Gunjan Kunda\":[\"3\",\"5\",\"8\",\"8\"]},{\"Satam Shabda Shrikant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shaikh Faizan Majid\":[\"3\",\"4\",\"10\",\"10\"]},{\"Shashtri Parikshit Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shinde Raj Anil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Aashima Paramjit\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Kanika Krishnakumar\":[\"4\",\"5\",\"6\",\"6\"]},{\"Singh Shikhar Chandrabhushan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Ujjawal Dinesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Vatsa Deepak\":[\"4\",\"5\",\"9\",\"9\"]},{\"Singh Ishani Ravishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sonne Abhinandan Shahaji\":[\"4\",\"5\",\"8\",\"8\"]},{\"Talajiya Ajinkya Niraj\":[\"4\",\"5\",\"6\",\"6\"]},{\"Tapre Rrahul Jaywant\":[\"3\",\"5\",\"10\",\"10\"]},{\"Telgote Gajanan Vinod\":[\"4\",\"5\",\"10\",\"10\"]},{\"Thapar Harjas Rajindersingh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Tiwari Rithik Subash\":[\"4\",\"5\",\"8\",\"8\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"4\",\"5\",\"7\",\"7\"]},{\"Ugale Ashwin Govind\":[\"4\",\"5\",\"6\",\"6\"]},{\"Vaja Jash Deepak\":[\"AB\",\"AB\",\"AB\",\"AB\"]},{\"Vishal Vijayan Rajani\":[\"3\",\"5\",\"6\",\"6\"]},{\"Wani Vipul Vinod\":[\"4\",\"5\",\"7\",\"7\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\",\"5\",\"8\",\"8\"]},{\"Zaveri Deep Kalpana\":[\"4\",\"5\",\"9\",\"9\"]},{\"Zore Ronit Raju\":[\"4\",\"5\",\"10\",\"10\"]}]', 6, 2, '2022-09-20 01:35:53', 1),
(20, '[{\"Arya Veer Krishna\":[10,10,10,10,10]},{\"Barot Het Mehul\":[11,11,11,11,11]},{\"Barude Yogesh Revan\":[12,12,12,12,12]},{\"Bendkhale Vaishnavi Vidyadhar\":[13,13,13,13,13]},{\"Bhadra Vivek Rajesh\":[14,14,14,14,14]},{\"Bhole Chinmay Santosh\":[15,15,15,15,15]},{\"Birari Namita Nitin\":[16,16,16,16,16]},{\"Bodekar Ambaji Subhash\":[17,17,17,17,17]},{\"Bodekar Sunil Bhiru\":[18,18,18,18,18]},{\"Chahar Aditya Dharmendra\":[19,19,19,19,19]},{\"Chaudhary Rohan Mahesh\":[10,10,10,10,10]},{\"Chavan Siddhesh Vijay\":[11,11,11,11,11]},{\"Chawada Bhumika Dinesh\":[12,12,12,12,12]},{\"Dama Smit Bharat\":[13,13,13,13,13]},{\"Dixit Varun Sandeep\":[14,14,14,14,14]},{\"Duraphe Vaishnav Ashok\":[15,15,15,15,15]},{\"Eshan Anand Pranjali\":[16,16,16,16,16]},{\"Gaikwad Anjali Chandrakant\":[17,17,17,17,17]},{\"Gajjar Gaurang Rajesh\":[18,18,18,18,18]},{\"Ghorpade Mayuresh Shrikant\":[19,19,19,19,19]},{\"Gopinathan Aathira\":[10,10,10,10,10]},{\"Gothankar Aniket Madhukar\":[11,11,11,11,11]},{\"Hamdare Zaid Khalid\":[12,12,12,12,12]},{\"Jain Samyak Neeru\":[13,13,13,13,13]},{\"Jhaveri Bhavya Vipul\":[14,14,14,14,14]},{\"Kadam Chitrang Avinash\":[15,15,15,15,15]},{\"Kadam Omkar Ravindra\":[16,16,16,16,16]},{\"Kadam Rushikesh Vilas\":[17,17,17,17,17]},{\"Kadlag Omkar Abasaheb\":[18,18,18,18,18]},{\"Kariya Jay Nitin\":[19,19,19,19,19]},{\"Kayampurath Ashwin Ramesh\":[10,10,10,10,10]},{\"Khochade Prathamesh Shashank\":[11,11,11,11,11]},{\"Kini Ganesh Yogesh\":[12,12,12,12,12]},{\"Koli Harsh Ravindra\":[13,13,13,13,13]},{\"Kulkarni Shubham Sunil\":[14,14,14,14,14]},{\"Metha Rajat Rahul\":[15,15,15,15,15]},{\"Parab Mihir Harishankar\":[16,16,16,16,16]},{\"Paradkar Rohit Santosh\":[17,17,17,17,17]},{\"Patel Ayush Rahul\":[18,18,18,18,18]},{\"Patel Pradeep Savji\":[19,19,19,19,19]},{\"Patel Ved Pranet\":[10,10,10,10,10]},{\"Patil Anurag Sudhir\":[11,11,11,11,11]},{\"Patil Sujal Dinesh\":[12,12,12,12,12]},{\"Pawar Nakul Umesh\":[13,13,13,13,13]},{\"Rana Gaurav Santosh\":[14,14,14,14,14]},{\"Sahu Aklant Akhaya\":[15,15,15,15,15]},{\"Sakpal Saloni Anil\":[16,16,16,16,16]},{\"Sapkale Gunjan Kunda\":[17,17,17,17,17]},{\"Satam Shabda Shrikant\":[18,18,18,18,18]},{\"Shaikh Faizan Majid\":[19,19,19,19,19]},{\"Shashtri Parikshit Umesh\":[10,10,10,10,10]},{\"Shinde Raj Anil\":[11,11,11,11,11]},{\"Singh Aashima Paramjit\":[12,12,12,12,12]},{\"Singh Kanika Krishnakumar\":[13,13,13,13,13]},{\"Singh Shikhar Chandrabhushan\":[14,14,14,14,14]},{\"Singh Ujjawal Dinesh\":[15,15,15,15,15]},{\"Singh Vatsa Deepak\":[16,16,16,16,16]},{\"Singh Ishani Ravishankar\":[17,17,17,17,17]},{\"Somavanshi Ashutosh Suresh\":[18,18,18,18,18]},{\"Sonne Abhinandan Shahaji\":[19,19,19,19,19]},{\"Talajiya Ajinkya Niraj\":[10,10,10,10,10]},{\"Tapre Rrahul Jaywant\":[11,11,11,11,11]},{\"Telgote Gajanan Vinod\":[12,12,12,12,12]},{\"Thapar Harjas Rajindersingh\":[13,13,13,13,13]},{\"Tiwari Rithik Subash\":[14,14,14,14,14]},{\"Udaipurwala Burhanuddin Siraj\":[15,15,15,15,15]},{\"Ugale Ashwin Govind\":[16,16,16,16,16]},{\"Vaja Jash Deepak\":[17,17,17,17,17]},{\"Vishal Vijayan Rajani\":[18,18,18,18,18]},{\"Wani Vipul Vinod\":[19,19,19,19,19]},{\"Yadav Abhishek Jagdish Prasad\":[10,10,10,10,10]},{\"Zaveri Deep Kalpana\":[14,14,14,14,14]},{\"Zore Ronit Raju\":[18,18,18,18,18]}]', 0, 2, '2022-09-20 04:52:48', 2),
(21, '[{\"AGAJ DIVYA SANTOSH SANJANA\":[5,5,5,5,0,0]},{\"AHER PRUTHVIRAJ SATISH NAMRATA\":[5,5,5,5,0,0]},{\"AMAL ROHAN UMESH HANSA\":[3,4,3,3,0,0]},{\"AMBOLE SUJIT MAHADEO MALAN\":[5,5,5,5,0,0]},{\"APPA PRIYANSHU ANILKUMAR SARLA\":[5,5,5,5,0,0]},{\"ARBAN SHRUSTI SANDEEP MANISHA\":[3,3,3,3,0,0]},{\"AWATE PRATHAMESH PRAKASH PRACHI\":[5,4,4,4,0,0]},{\"BARAI VEDANT MEHUL BIJAL\":[4,4,4,4,0,0]},{\"BHAGYWANT SATYAM SUBHASH SANGITA\":[5,5,5,5,0,0]},{\"BHARDWAJ SHUBHAM DEVANAND UMA\":[5,5,4,5,0,0]},{\"BIRJE RUSHIKESH RUPESH ANITA\":[5,5,5,5,0,0]},{\"CHANDANSHIVE ARYAA UDAY VINAYA\":[5,5,4,5,0,0]},{\"CHAUDHARI RAJAS DHANANJAY ARUNDHATI\":[5,5,5,5,0,0]},{\"CHAVARE ARYAN MANOJ VANDANA\":[5,5,5,5,0,0]},{\"DAVE ZEEL VIRENDRA PAYAL\":[4,4,4,4,0,0]},{\"DESAI NIRAV SHAMSUNDER SAMRUDDHI\":[5,5,5,5,0,0]},{\"DESAI PRAJAKTA RAVINDRA SANGEETA\":[4,4,3,5,0,0]},{\"DESHMANE ABHINAV MACHHINDRA SHARDA\":[5,5,5,4,0,0]},{\"DESHMUKH HARSH KANOJ MEENA\":[0,0,0,0,0,0]},{\"DESHPANDE SHRISH MANIK SHILPA\":[5,5,5,5,0,0]},{\"DHAKE DHANASHREE RAVINDRA NEETA\":[2,2,2,2,0,0]},{\"DHANSE AFFAN HASAN ALI NASREEN\":[4,4,4,4,0,0]},{\"DHOTE PIYUSH SANJAY SANGITA\":[5,5,5,5,0,0]},{\"GADEKAR VISHAL SANJAY SUNITA\":[4,4,4,4,0,0]},{\"GAIKWAD TANMAY TANAJI JAYASHREE\":[4,4,4,4,0,0]},{\"GAMIT SHUBHAM DIPAKKUMAR SHAILA\":[4,4,4,4,0,0]},{\"GANDHI TANUSH SANJAY URMILA\":[4,4,3,3,0,0]},{\"GANGAL NIKHIL SUNIL SUJATA\":[5,4,4,5,0,0]},{\"GHADI MOHIT NITIN POOJA\":[5,5,5,5,0,0]},{\"GHADIGAONKAR RAJAS SANDEEP RADHIKA\":[4,4,4,4,0,0]},{\"GITE HARSH SANJAY MAYA\":[4,4,4,4,0,0]},{\"GOPALKAR PIYUSH VINOD NEHA\":[4,4,5,3,0,0]},{\"GOVALKAR DEVANG SURYAKANT SANGEETA\":[5,5,5,5,0,0]},{\"GOWDA CHAITRISH UMESH MANJULA\":[5,4,3,4,0,0]},{\"HALBE HIMANSHU KISHOR VEENA\":[0,0,0,0,0,0]},{\"HARNE VINIT JITENDRA SHARDA\":[4,4,3,4,0,0]},{\"JADEJA RAJ MANSINGH KUSUMBA\":[5,5,5,5,0,0]},{\"JADHAV PRABUDDHA SANDEEP RUCHIRA\":[5,5,5,5,0,0]},{\"JAIN TISHA SANTOSH PADMA\":[5,5,5,5,0,0]},{\"JAISWAL HARSH MANOJ REKHA\":[5,5,5,5,0,0]},{\"JARI DHRUV PRASHANT VAISHALI\":[5,4,5,5,0,0]},{\"JETHVA MITESH MOHAN KALPANA\":[3,3,3,3,0,0]},{\"JHA AAKASHKUMAR ARUN VIVEKA\":[5,4,5,5,0,0]},{\"KADAM A AKANKSHA SANJAY SEEMA\":[5,5,5,5,0,0]},{\"KADGE SAHIL SANTOSH VAISHALI\":[5,5,4,5,0,0]},{\"KADLAG SHUBHANGI DNYANESHWAR SANGITA\":[5,5,5,5,0,0]},{\"KANKARIA PRATHAM PANKAJ JAYSHREE\":[4,4,4,4,0,0]},{\"KARANDE VIKRAM DEVDAS SHILPA\":[5,5,5,5,0,0]},{\"KATARIA UDAY ASHOK CHETANA\":[5,5,4,5,0,0]},{\"KAWA PARTHVI JATIN HEMLATA\":[0,0,0,0,0,0]},{\"KHAKHAR DEVANG ASHISH NEHA\":[5,4,5,5,0,0]},{\"KHEDEKAR ADITYA SANDEEP SWATI\":[5,5,5,5,0,0]},{\"KHOT KAMRAN ABDUL MAJEED RUBINA\":[5,5,5,5,0,0]},{\"KOLAPE PRATHMESH SUNIL MANISHA\":[4,4,4,4,0,0]},{\"KORGAONKAR VEDANT MAHESH MANSI\":[5,5,5,5,0,0]},{\"KSHIRSAGAR RENUKA SHARAD ROHINI\":[4,5,4,4,0,0]},{\"KUMAR SAHIL SANJIV RASHMI\":[4,4,4,4,0,0]},{\"LAKHE OMKAR ANANT VAISHALI\":[3,4,4,4,0,0]},{\"LAKHERA VEDANT RITESH MITALI\":[5,5,5,5,0,0]},{\"MANDHANIA ADITYA PURSHOTTAM KAVITA\":[4,5,5,5,0,0]},{\"MANUSMARE ADHISH ISHWAR BHAVANA\":[5,5,5,5,0,0]},{\"MEENA NIDHI DURGASHANKAR ASHA\":[5,5,5,5,0,0]},{\"MISHRA SURAJ INU\":[3,4,4,4,0,0]},{\"MOHITE KUNAL KRISHNA KAMAL\":[4,4,4,4,0,0]},{\"MOHITE RAJ DEEPAK DEEPALI\":[5,5,5,5,0,0]},{\"MOHITE SIDDHI DATTATRAY SURELI\":[0,0,0,0,0,0]},{\"MUDALIAR KEVIN GOPALKRISHNAN PADMAVATHY\":[4,4,4,3,0,0]},{\"NADAR PAVITHIRA MUTHURAMAN SARATHA\":[5,5,5,5,0,0]},{\"NAKADE SUPRIYA SURESH PARVATI\":[4,4,3,4,0,0]},{\"NAMDEV SNEHA ASHWIN SMITA\":[4,4,4,4,0,0]},{\"NARKHEDE LALIT SURESH LEKHA\":[5,5,5,5,0,0]},{\"NASARE MEHUL SURYAKANT SAKSHI\":[4,4,4,5,0,0]},{\"NAVANDER YASH VIJAY MEENA\":[4,5,5,5,0,0]},{\"NEDARIYA HANZALA ASIF NAJMA\":[5,5,5,5,0,0]},{\"NEDARIYA HUZEFA ASIF NAJMA\":[5,5,5,4,0,0]},{\"PALAN KSHITIJ MAHESHKUMAR SUNITA\":[0,0,0,0,0,0]},{\"PANCHAL KRISH PARESH FALGUNI\":[4,5,5,4,0,0]},{\"PANCHAL NEHAL PANKAJ UNNATI\":[4,4,3,4,0,0]},{\"PANCHAL NIKUNJ ASHOK CHNADRIKA\":[5,5,5,5,0,0]},{\"PANDEY AYUSH SANTOSH SHALINI\":[5,5,5,5,0,0]},{\"PANGUDWALE VEDANT HEMANT ARCHANA\":[5,5,5,5,0,0]},{\"PAREKH SIDDHARTH JAYESH PURNIMA\":[5,5,5,5,0,0]},{\"PARMAR DRASHTI RAMESH ARCHANA\":[5,5,5,5,0,0]},{\"PATEL BHAVESH PRAKASH MEENA\":[5,5,5,5,0,0]},{\"PATEL RAHUL PURSHOTTAM JAYSHREE\":[0,0,0,0,0,0]},{\"PATIL NINAD SANJAY ROHINI\":[5,5,4,5,0,0]},{\"PATIL SOURABH SAYAJI SHALAN\":[4,3,3,3,0,0]},{\"PATIL SUMEDH ARUN PUSHPALATA\":[5,5,5,5,0,0]},{\"PAWAR ANUSHKA SANTOSH SNEHAL\":[5,4,5,5,0,0]},{\"PHONDEKAR DEVANG UMESH NAYANA\":[4,4,4,4,0,0]},{\"PUNDE PRAFUL RAJENDRA LEELA\":[5,5,5,5,0,0]},{\"PUVVADA JATEESH VENKATA SAI KRISHNA MADHAVI\":[5,5,5,5,0,0]},{\"QURESHI FARHAN USMAN ALI RAHEEMA\":[4,4,4,4,0,0]},{\"RAJAK SUMEET KUMAR MAHENDRA SUMANLATA\":[4,4,3,4,0,0]},{\"RAMPURAWALA HATIM SAIFUDDIN RAZIYA\":[5,5,5,5,0,0]},{\"RASKAR SAURABH BALU JAYSHREE\":[4,4,4,4,0,0]},{\"RATHI DEVANSH RAKESH NEETA\":[5,4,4,4,0,0]},{\"RATHI VINIT SHASHIKANT LATIKA\":[5,5,5,4,0,0]},{\"RATHOD SUNIDHI MANISH NISHIGANDHA\":[4,4,4,4,0,0]},{\"RAWAL VED TUSHAR SONAL\":[5,5,5,5,0,0]},{\"RODE RACHITA RAJENDRA VAISHALI\":[4,4,4,4,0,0]},{\"SAH RAMLAKHAN BIRBAHADUR BINDA DEVI\":[4,4,4,4,0,0]},{\"SALIAN SOUMYA HARISH VIDYA\":[5,5,5,5,0,0]},{\"SALUNKHE YASH JAYPRAKASH JAYSHRI\":[4,4,4,4,0,0]},{\"SAMANT HARYASHWA BHUPESH RASHMI\":[5,5,5,5,0,0]},{\"SANKPAL PARTH KUNDLIK VARSHA\":[5,5,5,5,0,0]},{\"SAPKAL SARASWAT SANJAY ARCHANA\":[4,4,4,4,0,0]},{\"SARKATE SIDDHANT DNYANDEO ARCHANA\":[4,4,4,4,0,0]},{\"SARODE DARSHAN REVANAND SUJATA\":[4,4,4,4,0,0]},{\"SAROWA ATUL KAMLESH SAROWA\":[5,5,4,5,0,0]},{\"SAWANT ATHARV GOPAL RADHIKA\":[5,5,5,5,0,0]},{\"SHEIKH QAINAT AHMED NASIMA\":[5,5,5,5,0,0]},{\"SHELAR SAKSHI GHANSHYAM SARIKA\":[5,5,5,5,0,0]},{\"SHETTY MANASVI SUBHASH JAYASHRI\":[5,5,5,5,0,0]},{\"SINGH ADITYA BRIJ KISHORE SARITA SINGH\":[5,5,4,5,0,0]},{\"SINGH AMAN SADA PRATIMA\":[5,4,4,4,0,0]},{\"SINGH ARMAN MANOJ MALA\":[3,3,4,3,0,0]},{\"SINGH PRANAV MANOJ DEEPTI\":[4,4,4,4,0,0]},{\"SINGH SRISHTI MADANMOHAN MEENA\":[2,2,2,2,0,0]},{\"SOLANKI HARSH PRASHANT RASHMIKA\":[5,5,5,5,0,0]},{\"SONI MIHIR HARESH NISHA\":[5,5,5,5,0,0]},{\"SUTARIYA OM JANAKBHAI ISHA\":[4,4,4,4,0,0]},{\"TADLA VEDANT SANJAY KALPANA\":[0,0,0,0,0,0]},{\"THADURU PRATHAMESH RAMESH MANJULA\":[4,4,4,4,0,0]},{\"THAKKAR KUNAL MANISH SANGEETA\":[5,4,5,5,0,0]},{\"THAKUR KRUPALI SHANKAR ARCHANA\":[4,5,5,5,0,0]},{\"TIWARI AKANKSHA ASHOK POONAM\":[5,5,5,5,0,0]},{\"TIWARI PRATHMESH ASHOK RAGINI\":[5,5,5,5,0,0]},{\"TRIPATHI SHREYASH SUBHAS MANISHA\":[5,5,5,5,0,0]},{\"TRIVEDI DIVYANK VIJAY REKHA\":[5,5,5,5,0,0]},{\"VANJARI MADHAV LAXMINARAYAN SUGANDHA\":[5,5,5,5,0,0]},{\"VELANKAR ANIKET AMIT GEETANJALI\":[4,3,4,3,0,0]},{\"VIRK SAMARJEET SINGH BALJIT SINGH BALJIT KAUR\":[3,2,3,3,0,0]},{\"WAGHELA VED MANISH VIDYA\":[3,4,3,3,0,0]},{\"YADAV ANKIT PRAMOD KUMAR PRATIMA\":[4,4,4,4,0,0]},{\"YADAV AVANISH BRIJESH SAVITA\":[4,4,4,4,0,0]}]', 0, 2, '2022-09-20 05:24:03', 6),
(22, '[{\"AGAJ DIVYA SANTOSH SANJANA\":[5,5,5,5,0,0]},{\"AHER PRUTHVIRAJ SATISH NAMRATA\":[5,5,5,5,0,0]},{\"AMAL ROHAN UMESH HANSA\":[3,4,3,3,0,0]},{\"AMBOLE SUJIT MAHADEO MALAN\":[5,5,5,5,0,0]},{\"APPA PRIYANSHU ANILKUMAR SARLA\":[5,5,5,5,0,0]},{\"ARBAN SHRUSTI SANDEEP MANISHA\":[3,3,3,3,0,0]},{\"AWATE PRATHAMESH PRAKASH PRACHI\":[5,4,4,4,0,0]},{\"BARAI VEDANT MEHUL BIJAL\":[4,4,4,4,0,0]},{\"BHAGYWANT SATYAM SUBHASH SANGITA\":[5,5,5,5,0,0]},{\"BHARDWAJ SHUBHAM DEVANAND UMA\":[5,5,4,5,0,0]},{\"BIRJE RUSHIKESH RUPESH ANITA\":[5,5,5,5,0,0]},{\"CHANDANSHIVE ARYAA UDAY VINAYA\":[5,5,4,5,0,0]},{\"CHAUDHARI RAJAS DHANANJAY ARUNDHATI\":[5,5,5,5,0,0]},{\"CHAVARE ARYAN MANOJ VANDANA\":[5,5,5,5,0,0]},{\"DAVE ZEEL VIRENDRA PAYAL\":[4,4,4,4,0,0]},{\"DESAI NIRAV SHAMSUNDER SAMRUDDHI\":[5,5,5,5,0,0]},{\"DESAI PRAJAKTA RAVINDRA SANGEETA\":[4,4,3,5,0,0]},{\"DESHMANE ABHINAV MACHHINDRA SHARDA\":[5,5,5,4,0,0]},{\"DESHMUKH HARSH KANOJ MEENA\":[0,0,0,0,0,0]},{\"DESHPANDE SHRISH MANIK SHILPA\":[5,5,5,5,0,0]},{\"DHAKE DHANASHREE RAVINDRA NEETA\":[2,2,2,2,0,0]},{\"DHANSE AFFAN HASAN ALI NASREEN\":[4,4,4,4,0,0]},{\"DHOTE PIYUSH SANJAY SANGITA\":[5,5,5,5,0,0]},{\"GADEKAR VISHAL SANJAY SUNITA\":[4,4,4,4,0,0]},{\"GAIKWAD TANMAY TANAJI JAYASHREE\":[4,4,4,4,0,0]},{\"GAMIT SHUBHAM DIPAKKUMAR SHAILA\":[4,4,4,4,0,0]},{\"GANDHI TANUSH SANJAY URMILA\":[4,4,3,3,0,0]},{\"GANGAL NIKHIL SUNIL SUJATA\":[5,4,4,5,0,0]},{\"GHADI MOHIT NITIN POOJA\":[5,5,5,5,0,0]},{\"GHADIGAONKAR RAJAS SANDEEP RADHIKA\":[4,4,4,4,0,0]},{\"GITE HARSH SANJAY MAYA\":[4,4,4,4,0,0]},{\"GOPALKAR PIYUSH VINOD NEHA\":[4,4,5,3,0,0]},{\"GOVALKAR DEVANG SURYAKANT SANGEETA\":[5,5,5,5,0,0]},{\"GOWDA CHAITRISH UMESH MANJULA\":[5,4,3,4,0,0]},{\"HALBE HIMANSHU KISHOR VEENA\":[0,0,0,0,0,0]},{\"HARNE VINIT JITENDRA SHARDA\":[4,4,3,4,0,0]},{\"JADEJA RAJ MANSINGH KUSUMBA\":[5,5,5,5,0,0]},{\"JADHAV PRABUDDHA SANDEEP RUCHIRA\":[5,5,5,5,0,0]},{\"JAIN TISHA SANTOSH PADMA\":[5,5,5,5,0,0]},{\"JAISWAL HARSH MANOJ REKHA\":[5,5,5,5,0,0]},{\"JARI DHRUV PRASHANT VAISHALI\":[5,4,5,5,0,0]},{\"JETHVA MITESH MOHAN KALPANA\":[3,3,3,3,0,0]},{\"JHA AAKASHKUMAR ARUN VIVEKA\":[5,4,5,5,0,0]},{\"KADAM A AKANKSHA SANJAY SEEMA\":[5,5,5,5,0,0]},{\"KADGE SAHIL SANTOSH VAISHALI\":[5,5,4,5,0,0]},{\"KADLAG SHUBHANGI DNYANESHWAR SANGITA\":[5,5,5,5,0,0]},{\"KANKARIA PRATHAM PANKAJ JAYSHREE\":[4,4,4,4,0,0]},{\"KARANDE VIKRAM DEVDAS SHILPA\":[5,5,5,5,0,0]},{\"KATARIA UDAY ASHOK CHETANA\":[5,5,4,5,0,0]},{\"KAWA PARTHVI JATIN HEMLATA\":[0,0,0,0,0,0]},{\"KHAKHAR DEVANG ASHISH NEHA\":[5,4,5,5,0,0]},{\"KHEDEKAR ADITYA SANDEEP SWATI\":[5,5,5,5,0,0]},{\"KHOT KAMRAN ABDUL MAJEED RUBINA\":[5,5,5,5,0,0]},{\"KOLAPE PRATHMESH SUNIL MANISHA\":[4,4,4,4,0,0]},{\"KORGAONKAR VEDANT MAHESH MANSI\":[5,5,5,5,0,0]},{\"KSHIRSAGAR RENUKA SHARAD ROHINI\":[4,5,4,4,0,0]},{\"KUMAR SAHIL SANJIV RASHMI\":[4,4,4,4,0,0]},{\"LAKHE OMKAR ANANT VAISHALI\":[3,4,4,4,0,0]},{\"LAKHERA VEDANT RITESH MITALI\":[5,5,5,5,0,0]},{\"MANDHANIA ADITYA PURSHOTTAM KAVITA\":[4,5,5,5,0,0]},{\"MANUSMARE ADHISH ISHWAR BHAVANA\":[5,5,5,5,0,0]},{\"MEENA NIDHI DURGASHANKAR ASHA\":[5,5,5,5,0,0]},{\"MISHRA SURAJ INU\":[3,4,4,4,0,0]},{\"MOHITE KUNAL KRISHNA KAMAL\":[4,4,4,4,0,0]},{\"MOHITE RAJ DEEPAK DEEPALI\":[5,5,5,5,0,0]},{\"MOHITE SIDDHI DATTATRAY SURELI\":[0,0,0,0,0,0]},{\"MUDALIAR KEVIN GOPALKRISHNAN PADMAVATHY\":[4,4,4,3,0,0]},{\"NADAR PAVITHIRA MUTHURAMAN SARATHA\":[5,5,5,5,0,0]},{\"NAKADE SUPRIYA SURESH PARVATI\":[4,4,3,4,0,0]},{\"NAMDEV SNEHA ASHWIN SMITA\":[4,4,4,4,0,0]},{\"NARKHEDE LALIT SURESH LEKHA\":[5,5,5,5,0,0]},{\"NASARE MEHUL SURYAKANT SAKSHI\":[4,4,4,5,0,0]},{\"NAVANDER YASH VIJAY MEENA\":[4,5,5,5,0,0]},{\"NEDARIYA HANZALA ASIF NAJMA\":[5,5,5,5,0,0]},{\"NEDARIYA HUZEFA ASIF NAJMA\":[5,5,5,4,0,0]},{\"PALAN KSHITIJ MAHESHKUMAR SUNITA\":[0,0,0,0,0,0]},{\"PANCHAL KRISH PARESH FALGUNI\":[4,5,5,4,0,0]},{\"PANCHAL NEHAL PANKAJ UNNATI\":[4,4,3,4,0,0]},{\"PANCHAL NIKUNJ ASHOK CHNADRIKA\":[5,5,5,5,0,0]},{\"PANDEY AYUSH SANTOSH SHALINI\":[5,5,5,5,0,0]},{\"PANGUDWALE VEDANT HEMANT ARCHANA\":[5,5,5,5,0,0]},{\"PAREKH SIDDHARTH JAYESH PURNIMA\":[5,5,5,5,0,0]},{\"PARMAR DRASHTI RAMESH ARCHANA\":[5,5,5,5,0,0]},{\"PATEL BHAVESH PRAKASH MEENA\":[5,5,5,5,0,0]},{\"PATEL RAHUL PURSHOTTAM JAYSHREE\":[0,0,0,0,0,0]},{\"PATIL NINAD SANJAY ROHINI\":[5,5,4,5,0,0]},{\"PATIL SOURABH SAYAJI SHALAN\":[4,3,3,3,0,0]},{\"PATIL SUMEDH ARUN PUSHPALATA\":[5,5,5,5,0,0]},{\"PAWAR ANUSHKA SANTOSH SNEHAL\":[5,4,5,5,0,0]},{\"PHONDEKAR DEVANG UMESH NAYANA\":[4,4,4,4,0,0]},{\"PUNDE PRAFUL RAJENDRA LEELA\":[5,5,5,5,0,0]},{\"PUVVADA JATEESH VENKATA SAI KRISHNA MADHAVI\":[5,5,5,5,0,0]},{\"QURESHI FARHAN USMAN ALI RAHEEMA\":[4,4,4,4,0,0]},{\"RAJAK SUMEET KUMAR MAHENDRA SUMANLATA\":[4,4,3,4,0,0]},{\"RAMPURAWALA HATIM SAIFUDDIN RAZIYA\":[5,5,5,5,0,0]},{\"RASKAR SAURABH BALU JAYSHREE\":[4,4,4,4,0,0]},{\"RATHI DEVANSH RAKESH NEETA\":[5,4,4,4,0,0]},{\"RATHI VINIT SHASHIKANT LATIKA\":[5,5,5,4,0,0]},{\"RATHOD SUNIDHI MANISH NISHIGANDHA\":[4,4,4,4,0,0]},{\"RAWAL VED TUSHAR SONAL\":[5,5,5,5,0,0]},{\"RODE RACHITA RAJENDRA VAISHALI\":[4,4,4,4,0,0]},{\"SAH RAMLAKHAN BIRBAHADUR BINDA DEVI\":[4,4,4,4,0,0]},{\"SALIAN SOUMYA HARISH VIDYA\":[5,5,5,5,0,0]},{\"SALUNKHE YASH JAYPRAKASH JAYSHRI\":[4,4,4,4,0,0]},{\"SAMANT HARYASHWA BHUPESH RASHMI\":[5,5,5,5,0,0]},{\"SANKPAL PARTH KUNDLIK VARSHA\":[5,5,5,5,0,0]},{\"SAPKAL SARASWAT SANJAY ARCHANA\":[4,4,4,4,0,0]},{\"SARKATE SIDDHANT DNYANDEO ARCHANA\":[4,4,4,4,0,0]},{\"SARODE DARSHAN REVANAND SUJATA\":[4,4,4,4,0,0]},{\"SAROWA ATUL KAMLESH SAROWA\":[5,5,4,5,0,0]},{\"SAWANT ATHARV GOPAL RADHIKA\":[5,5,5,5,0,0]},{\"SHEIKH QAINAT AHMED NASIMA\":[5,5,5,5,0,0]},{\"SHELAR SAKSHI GHANSHYAM SARIKA\":[5,5,5,5,0,0]},{\"SHETTY MANASVI SUBHASH JAYASHRI\":[5,5,5,5,0,0]},{\"SINGH ADITYA BRIJ KISHORE SARITA SINGH\":[5,5,4,5,0,0]},{\"SINGH AMAN SADA PRATIMA\":[5,4,4,4,0,0]},{\"SINGH ARMAN MANOJ MALA\":[3,3,4,3,0,0]},{\"SINGH PRANAV MANOJ DEEPTI\":[4,4,4,4,0,0]},{\"SINGH SRISHTI MADANMOHAN MEENA\":[2,2,2,2,0,0]},{\"SOLANKI HARSH PRASHANT RASHMIKA\":[5,5,5,5,0,0]},{\"SONI MIHIR HARESH NISHA\":[5,5,5,5,0,0]},{\"SUTARIYA OM JANAKBHAI ISHA\":[4,4,4,4,0,0]},{\"TADLA VEDANT SANJAY KALPANA\":[0,0,0,0,0,0]},{\"THADURU PRATHAMESH RAMESH MANJULA\":[4,4,4,4,0,0]},{\"THAKKAR KUNAL MANISH SANGEETA\":[5,4,5,5,0,0]},{\"THAKUR KRUPALI SHANKAR ARCHANA\":[4,5,5,5,0,0]},{\"TIWARI AKANKSHA ASHOK POONAM\":[5,5,5,5,0,0]},{\"TIWARI PRATHMESH ASHOK RAGINI\":[5,5,5,5,0,0]},{\"TRIPATHI SHREYASH SUBHAS MANISHA\":[5,5,5,5,0,0]},{\"TRIVEDI DIVYANK VIJAY REKHA\":[5,5,5,5,0,0]},{\"VANJARI MADHAV LAXMINARAYAN SUGANDHA\":[5,5,5,5,0,0]},{\"VELANKAR ANIKET AMIT GEETANJALI\":[4,3,4,3,0,0]},{\"VIRK SAMARJEET SINGH BALJIT SINGH BALJIT KAUR\":[3,2,3,3,0,0]},{\"WAGHELA VED MANISH VIDYA\":[3,4,3,3,0,0]},{\"YADAV ANKIT PRAMOD KUMAR PRATIMA\":[4,4,4,4,0,0]},{\"YADAV AVANISH BRIJESH SAVITA\":[4,4,4,4,0,0]}]', 0, 4, '2022-09-20 06:03:32', 8);
INSERT INTO `marks` (`marks_id`, `marks`, `pattern_id`, `batch_id`, `created`, `type`) VALUES
(23, '[{\"Arya Veer Krishna\":[\"4\",\"5\",\"6\",\"6\"]},{\"Barot Het Mehul\":[\"4\",\"5\",\"7\",\"7\"]},{\"Barude Yogesh Revan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Bhadra Vivek Rajesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Bhole Chinmay Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Birari Namita Nitin\":[\"4\",\"5\",\"4\",\"4\"]},{\"Bodekar Ambaji Subhash\":[\"3\",\"5\",\"5\",\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\",\"5\",\"7\",\"7\"]},{\"Chahar Aditya Dharmendra\":[\"4\",\"5\",\"8\",\"8\"]},{\"Chaudhary Rohan Mahesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Chavan Siddhesh Vijay\":[\"4\",\"5\",\"7\",\"7\"]},{\"Chawada Bhumika Dinesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Dama Smit Bharat\":[\"4\",\"5\",\"7\",\"7\"]},{\"Dixit Varun Sandeep\":[\"2\",\"5\",\"5\",\"5\"]},{\"Duraphe Vaishnav Ashok\":[\"4\",\"5\",\"7\",\"7\"]},{\"Eshan Anand Pranjali\":[\"3\",\"5\",\"8\",\"8\"]},{\"Gaikwad Anjali Chandrakant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Gajjar Gaurang Rajesh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\",\"5\",\"10\",\"10\"]},{\"Gopinathan Aathira\":[\"4\",\"5\",\"8\",\"8\"]},{\"Gothankar Aniket Madhukar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Hamdare Zaid Khalid\":[\"3\",\"4\",\"0\",\"0\"]},{\"Jain Samyak Neeru\":[\"4\",\"5\",\"9\",\"9\"]},{\"Jhaveri Bhavya Vipul\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadam Chitrang Avinash\":[\"4\",\"5\",\"7\",\"7\"]},{\"Kadam Omkar Ravindra\":[\"4\",\"5\",\"4\",\"4\"]},{\"Kadam Rushikesh Vilas\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadlag Omkar Abasaheb\":[\"5\",\"5\",\"10\",\"10\"]},{\"Kariya Jay Nitin\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Khochade Prathamesh Shashank\":[\"3\",\"5\",\"10\",\"10\"]},{\"Kini Ganesh Yogesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Koli Harsh Ravindra\":[\"3\",\"5\",\"8\",\"8\"]},{\"Kulkarni Shubham Sunil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Metha Rajat Rahul\":[\"4\",\"5\",\"9\",\"9\"]},{\"Parab Mihir Harishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Paradkar Rohit Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Patel Ayush Rahul\":[\"4\",\"5\",\"4\",\"4\"]},{\"Patel Pradeep Savji\":[\"4\",\"5\",\"7\",\"7\"]},{\"Patel Ved Pranet\":[\"4\",\"5\",\"8\",\"8\"]},{\"Patil Anurag Sudhir\":[\"4\",\"5\",\"9\",\"9\"]},{\"Patil Sujal Dinesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Pawar Nakul Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Rana Gaurav Santosh\":[\"4\",\"5\",\"8\",\"8\"]},{\"Sahu Aklant Akhaya\":[\"4\",\"4\",\"6\",\"6\"]},{\"Sakpal Saloni Anil\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sapkale Gunjan Kunda\":[\"3\",\"5\",\"8\",\"8\"]},{\"Satam Shabda Shrikant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shaikh Faizan Majid\":[\"3\",\"4\",\"10\",\"10\"]},{\"Shashtri Parikshit Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shinde Raj Anil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Aashima Paramjit\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Kanika Krishnakumar\":[\"4\",\"5\",\"6\",\"6\"]},{\"Singh Shikhar Chandrabhushan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Ujjawal Dinesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Vatsa Deepak\":[\"4\",\"5\",\"9\",\"9\"]},{\"Singh Ishani Ravishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sonne Abhinandan Shahaji\":[\"4\",\"5\",\"8\",\"8\"]},{\"Talajiya Ajinkya Niraj\":[\"4\",\"5\",\"6\",\"6\"]},{\"Tapre Rrahul Jaywant\":[\"3\",\"5\",\"10\",\"10\"]},{\"Telgote Gajanan Vinod\":[\"4\",\"5\",\"10\",\"10\"]},{\"Thapar Harjas Rajindersingh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Tiwari Rithik Subash\":[\"4\",\"5\",\"8\",\"8\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"4\",\"5\",\"7\",\"7\"]},{\"Ugale Ashwin Govind\":[\"4\",\"5\",\"6\",\"6\"]},{\"Vaja Jash Deepak\":[\"AB\",\"AB\",\"AB\",\"AB\"]},{\"Vishal Vijayan Rajani\":[\"3\",\"5\",\"6\",\"6\"]},{\"Wani Vipul Vinod\":[\"4\",\"5\",\"7\",\"7\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\",\"5\",\"8\",\"8\"]},{\"Zaveri Deep Kalpana\":[\"4\",\"5\",\"9\",\"9\"]},{\"Zore Ronit Raju\":[\"4\",\"5\",\"10\",\"10\"]}]', 6, 4, '2022-09-20 06:05:58', 1),
(29, '[{\"ARYA VEER KRISHNA SANGEETA\":[10]},{\"BAROT HET MEHUL LOPA\":[10]},{\"BARUDE YOGESH REVAN HEMLATA\":[10]},{\"BENDKHALE VAISHNAVI VIDYADHAR VISHAKHA\":[10]},{\"BHADRA VIVEK RAJESH NEETA\":[9]},{\"BHOLE CHINMAY SANTOSH SUGANDHA\":[10]},{\"BIRARI NAMITA NITIN YOGITA\":[10]},{\"BODEKAR AMBAJI SUBHASH SWATI\":[9]},{\"BODEKAR SUNIL BHIRU SANGITA\":[10]},{\"CHAHAR ADITYA DHARMENDRA NIRMALA KUMARI\":[9]},{\"CHAUDHARI ROHAN MAHESH JYOTI\":[10]},{\"CHAVAN SIDDHESH VIJAY VRUSHALI\":[10]},{\"CHAWADA BHUMIKA DINESH RUPA\":[10]},{\"DAMA SMIT BHARAT REKHA\":[9]},{\"DIXIT VARUN SANDEEP HEMLATA\":[9]},{\"DURAPHE VAISHNAV ASHOK SMITA\":[10]},{\"ESHAN ANAND PRANJALI\":[10]},{\"GAIKWAD ANJALI CHANDRAKANT SHOBHA\":[10]},{\"GAJJAR GAURANG RAJESH KOMAL\":[10]},{\"GHORPADE MAYURESH SHRIKANT DEVASHREE\":[8]},{\"GOPINATHAN AATHIRA BINDU\":[10]},{\"GOTHANKAR ANIKET MADHUKAR ASMITA\":[10]},{\"HAMARE ZAID KHALID UZMAH\":[8]},{\"JAIN SAMYAK NEERU\":[10]},{\"JHAVERI BHAVYA VIPUL RIDDHI\":[9]},{\"KADAM CHITRANG AVINASH PRIYA\":[10]},{\"KADAM OMKAR RAVINDRA RUPALI\":[10]},{\"KADAM RUSHIKESH VILAS HEMLATA\":[10]},{\"KADLAG OMKAR ABASAHEB SANGITA\":[9]},{\"KARIYA JAY NITIN SANGITA\":[10]},{\"KAYAMPURATH ASHWIN RAMESH AJITHA\":[10]},{\"KHOCHADE PRATHAMESH SHASHANK SONALI\":[10]},{\"KINI GANESH YOGESH MEENAKSHI MEENAKSHI\":[10]},{\"KOLI HARSH RAVINDRA HEMLATA\":[9]},{\"KULKARNI SHUBHAM SUNIL SENHAL\":[9]},{\"METHA RAJAT RAHUL SANGITA\":[10]},{\"PARAB MIHIR HARISHANKAR SHIVANI\":[10]},{\"PARADKAR ROHIT SANTOSH SAMPADA\":[10]},{\"PATEL AYUSH RAHUL MAMTA\":[10]},{\"PATEL PRADEEP SAVJI NANUBAI\":[10]},{\"PATEL VED PRANET HEENA\":[10]},{\"PATIL ANURAG SUDHIR VARSHA\":[10]},{\"PATIL SUJAL DINESH VANDANA\":[10]},{\"PAWAR NAKUL UMESH SWATI\":[9]},{\"RANA GAURAV SANTOSH NEETA\":[9]},{\"SAHU AKLANT AKHAYA IPSITA\":[10]},{\"SAKPAL SALONI SADHANA\":[10]},{\"SAPKALE GUNJAN KUNDA\":[10]},{\"SATAM SHABDA SHRIKANT SHWETA\":[10]},{\"SHAIKH FAIZAN MAJID SAMINA\":[9]},{\"SHASHTRI PARIKSHIT UMESH NEHAL\":[10]},{\"SHINDE RAJ ANIL PUSHPA\":[10]},{\"SINGH AASHIMA PARAMJIT DEEPA\":[10]},{\"SINGH ISHANI RAVISHANKAR SUJITA\":[10]},{\"SINGH KANIKA KRISHNAKUMAR KANCHAN\":[9]},{\"SINGH SHIKHAR CHANDRABHUSHAN MALA\":[10]},{\"SINGH THAPAR HARJAS HARJEETKAUR\":[9]},{\"SINGH UJJAWAL DINESH SUDHA\":[9]},{\"SINGH VATSA DEEPAK KAVITA\":[10]},{\"SOMAVANSHI ASHUTOSH SURESH MANISHA\":[10]},{\"SONNE ABHINANDAN SHAHAJI PRAMILA\":[10]},{\"TALAJIYA AJINKYA NIRAJ ZARANA\":[9]},{\"TAPRE RAHUL JAYWANT KALPANA\":[10]},{\"TELGOTE GAJANAN VINOD CHHAYA\":[10]},{\"TIWARI RITHIK SUBASH PRAMILADEVI\":[10]},{\"UDAIPURWALA BURHANUDDIN SIRAJ ZAINAB\":[10]},{\"UGALE ASHWIN GOVIND MANGAL\":[10]},{\"VAJA JASH DEEPAK JAGRUTI\":[9]},{\"VISHAL VIJAYAN RAJANI\":[9]},{\"WANI VIPUL VINOD PALLAVI\":[10]},{\"YADAV ABHISHEK JAGDISH PRASAD GYANDEVI\":[9]},{\"ZAVERI DEEP KALPANA\":[10]},{\"ZORE RONIT RAJU ROSHANI\":[9]}]', 0, 4, '2022-09-20 06:49:01', 9),
(30, '[{\"Arya Veer Krishna\":[\"5\"]},{\"Barot Het Mehul\":[\"4\"]},{\"Barude Yogesh Revan\":[\"4\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"5\"]},{\"Bhadra Vivek Rajesh\":[\"4\"]},{\"Bhole Chinmay Santosh\":[\"4\"]},{\"Birari Namita Nitin\":[\"4\"]},{\"Bodekar Ambaji Subhash\":[\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\"]},{\"Chahar Aditya Dharmendra\":[\"4\"]},{\"Chaudhary Rohan Mahesh\":[\"4\"]},{\"Chavan Siddhesh Vijay\":[\"4\"]},{\"Chawada Bhumika Dinesh\":[\"5\"]},{\"Dama Smit Bharat\":[\"4\"]},{\"Dixit Varun Sandeep\":[\"3\"]},{\"Duraphe Vaishnav Ashok\":[\"5\"]},{\"Eshan Anand Pranjali\":[\"4\"]},{\"Gaikwad Anjali Chandrakant\":[\"5\"]},{\"Gajjar Gaurang Rajesh\":[\"4\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\"]},{\"Gopinathan Aathira\":[\"5\"]},{\"Gothankar Aniket Madhukar\":[\"5\"]},{\"Hamdare Zaid Khalid\":[\"AB\"]},{\"Jain Samyak Neeru\":[\"4\"]},{\"Jhaveri Bhavya Vipul\":[\"4\"]},{\"Kadam Chitrang Avinash\":[\"2\"]},{\"Kadam Omkar Ravindra\":[\"5\"]},{\"Kadam Rushikesh Vilas\":[\"5\"]},{\"Kadlag Omkar Abasaheb\":[\"4\"]},{\"Kariya Jay Nitin\":[\"4\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\"]},{\"Khochade Prathamesh Shashank\":[\"4\"]},{\"Kini Ganesh Yogesh\":[\"4\"]},{\"Koli Harsh Ravindra\":[\"5\"]},{\"Kulkarni Shubham Sunil\":[\"3\"]},{\"Metha Rajat Rahul\":[\"4\"]},{\"Parab Mihir Harishankar\":[\"4\"]},{\"Paradkar Rohit Santosh\":[\"4\"]},{\"Patel Ayush Rahul\":[\"4\"]},{\"Patel Pradeep Savji\":[\"4\"]},{\"Patel Ved Pranet\":[\"3\"]},{\"Patil Anurag Sudhir\":[\"4\"]},{\"Patil Sujal Dinesh\":[\"5\"]},{\"Pawar Nakul Umesh\":[\"4\"]},{\"Rana Gaurav Santosh\":[\"5\"]},{\"Sahu Aklant Akhaya\":[\"5\"]},{\"Sakpal Saloni Anil\":[\"4\"]},{\"Sapkale Gunjan Kunda\":[\"5\"]},{\"Satam Shabda Shrikant\":[\"5\"]},{\"Shaikh Faizan Majid\":[\"4\"]},{\"Shashtri Parikshit Umesh\":[\"4\"]},{\"Shinde Raj Anil\":[\"4\"]},{\"Singh Aashima Paramjit\":[\"4\"]},{\"Singh Kanika Krishnakumar\":[\"4\"]},{\"Singh Shikhar Chandrabhushan\":[\"3\"]},{\"Singh Ujjawal Dinesh\":[\"5\"]},{\"Singh Vatsa Deepak\":[\"5\"]},{\"Singh Ishani Ravishankar\":[\"4\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\"]},{\"Sonne Abhinandan Shahaji\":[\"4\"]},{\"Talajiya Ajinkya Niraj\":[\"4\"]},{\"Tapre Rrahul Jaywant\":[\"4\"]},{\"Telgote Gajanan Vinod\":[\"5\"]},{\"Thapar Harjas Rajindersingh\":[\"5\"]},{\"Tiwari Rithik Subash\":[\"4\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"5\"]},{\"Ugale Ashwin Govind\":[\"5\"]},{\"Vaja Jash Deepak\":[\"4\"]},{\"Vishal Vijayan Rajani\":[\"5\"]},{\"Wani Vipul Vinod\":[\"4\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\"]},{\"Zaveri Deep Kalpana\":[\"4\"]},{\"Zore Ronit Raju\":[\"4\"]}]', 2, 4, '2022-09-20 06:53:50', 1),
(31, '[{\"Arya Veer Krishna\":[\"4\",\"5\",\"6\",\"6\"]},{\"Barot Het Mehul\":[\"4\",\"5\",\"7\",\"7\"]},{\"Barude Yogesh Revan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Bhadra Vivek Rajesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Bhole Chinmay Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Birari Namita Nitin\":[\"4\",\"5\",\"4\",\"4\"]},{\"Bodekar Ambaji Subhash\":[\"3\",\"5\",\"5\",\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\",\"5\",\"7\",\"7\"]},{\"Chahar Aditya Dharmendra\":[\"4\",\"5\",\"8\",\"8\"]},{\"Chaudhary Rohan Mahesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Chavan Siddhesh Vijay\":[\"4\",\"5\",\"7\",\"7\"]},{\"Chawada Bhumika Dinesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Dama Smit Bharat\":[\"4\",\"5\",\"7\",\"7\"]},{\"Dixit Varun Sandeep\":[\"2\",\"5\",\"5\",\"5\"]},{\"Duraphe Vaishnav Ashok\":[\"4\",\"5\",\"7\",\"7\"]},{\"Eshan Anand Pranjali\":[\"3\",\"5\",\"8\",\"8\"]},{\"Gaikwad Anjali Chandrakant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Gajjar Gaurang Rajesh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\",\"5\",\"10\",\"10\"]},{\"Gopinathan Aathira\":[\"4\",\"5\",\"8\",\"8\"]},{\"Gothankar Aniket Madhukar\":[\"4\",\"5\",\"9\",\"9\"]},{\"Hamdare Zaid Khalid\":[\"3\",\"4\",\"0\",\"0\"]},{\"Jain Samyak Neeru\":[\"4\",\"5\",\"9\",\"9\"]},{\"Jhaveri Bhavya Vipul\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadam Chitrang Avinash\":[\"4\",\"5\",\"7\",\"7\"]},{\"Kadam Omkar Ravindra\":[\"4\",\"5\",\"4\",\"4\"]},{\"Kadam Rushikesh Vilas\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kadlag Omkar Abasaheb\":[\"5\",\"5\",\"10\",\"10\"]},{\"Kariya Jay Nitin\":[\"4\",\"5\",\"8\",\"8\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Khochade Prathamesh Shashank\":[\"3\",\"5\",\"10\",\"10\"]},{\"Kini Ganesh Yogesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Koli Harsh Ravindra\":[\"3\",\"5\",\"8\",\"8\"]},{\"Kulkarni Shubham Sunil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Metha Rajat Rahul\":[\"4\",\"5\",\"9\",\"9\"]},{\"Parab Mihir Harishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Paradkar Rohit Santosh\":[\"4\",\"5\",\"5\",\"5\"]},{\"Patel Ayush Rahul\":[\"4\",\"5\",\"4\",\"4\"]},{\"Patel Pradeep Savji\":[\"4\",\"5\",\"7\",\"7\"]},{\"Patel Ved Pranet\":[\"4\",\"5\",\"8\",\"8\"]},{\"Patil Anurag Sudhir\":[\"4\",\"5\",\"9\",\"9\"]},{\"Patil Sujal Dinesh\":[\"4\",\"5\",\"10\",\"10\"]},{\"Pawar Nakul Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Rana Gaurav Santosh\":[\"4\",\"5\",\"8\",\"8\"]},{\"Sahu Aklant Akhaya\":[\"4\",\"4\",\"6\",\"6\"]},{\"Sakpal Saloni Anil\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sapkale Gunjan Kunda\":[\"3\",\"5\",\"8\",\"8\"]},{\"Satam Shabda Shrikant\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shaikh Faizan Majid\":[\"3\",\"4\",\"10\",\"10\"]},{\"Shashtri Parikshit Umesh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Shinde Raj Anil\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Aashima Paramjit\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Kanika Krishnakumar\":[\"4\",\"5\",\"6\",\"6\"]},{\"Singh Shikhar Chandrabhushan\":[\"4\",\"5\",\"8\",\"8\"]},{\"Singh Ujjawal Dinesh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Singh Vatsa Deepak\":[\"4\",\"5\",\"9\",\"9\"]},{\"Singh Ishani Ravishankar\":[\"4\",\"5\",\"10\",\"10\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\",\"5\",\"7\",\"7\"]},{\"Sonne Abhinandan Shahaji\":[\"4\",\"5\",\"8\",\"8\"]},{\"Talajiya Ajinkya Niraj\":[\"4\",\"5\",\"6\",\"6\"]},{\"Tapre Rrahul Jaywant\":[\"3\",\"5\",\"10\",\"10\"]},{\"Telgote Gajanan Vinod\":[\"4\",\"5\",\"10\",\"10\"]},{\"Thapar Harjas Rajindersingh\":[\"4\",\"5\",\"9\",\"9\"]},{\"Tiwari Rithik Subash\":[\"4\",\"5\",\"8\",\"8\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"4\",\"5\",\"7\",\"7\"]},{\"Ugale Ashwin Govind\":[\"4\",\"5\",\"6\",\"6\"]},{\"Vaja Jash Deepak\":[\"AB\",\"AB\",\"AB\",\"AB\"]},{\"Vishal Vijayan Rajani\":[\"3\",\"5\",\"6\",\"6\"]},{\"Wani Vipul Vinod\":[\"4\",\"5\",\"7\",\"7\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\",\"5\",\"8\",\"8\"]},{\"Zaveri Deep Kalpana\":[\"4\",\"5\",\"9\",\"9\"]},{\"Zore Ronit Raju\":[\"4\",\"5\",\"10\",\"10\"]}]', 8, 4, '2022-09-20 06:56:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orals_attainment`
--

CREATE TABLE `orals_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attainment_level` int(11) NOT NULL,
  `percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orals_attainment`
--

INSERT INTO `orals_attainment` (`id`, `batch_id`, `attainment_level`, `percentage`) VALUES
(1, 1, 3, 100),
(2, 4, 3, 100);

-- --------------------------------------------------------

--
-- Table structure for table `oral_mapping`
--

CREATE TABLE `oral_mapping` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `target_value` int(11) NOT NULL,
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oral_mapping`
--

INSERT INTO `oral_mapping` (`id`, `batch_id`, `teacher_id`, `target_value`, `lower_range`, `upper_range`, `marks_id`) VALUES
(1, 1, 2, 40, 40, 50, 3),
(3, 4, 2, 20, 60, 70, 15),
(4, 4, 2, 40, 50, 60, 25),
(5, 4, 2, 40, 50, 60, 26),
(6, 4, 2, 40, 50, 60, 27),
(7, 4, 2, 40, 50, 60, 28);

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE `pattern` (
  `pattern_id` int(11) NOT NULL,
  `pattern_name` text NOT NULL,
  `test_id` int(11) NOT NULL,
  `no_main_questions` int(11) NOT NULL,
  `main_question_marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`main_question_marks`)),
  `no_of_sub_questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`no_of_sub_questions`)),
  `sub_questions_marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sub_questions_marks`)),
  `total_marks` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`pattern_id`, `pattern_name`, `test_id`, `no_main_questions`, `main_question_marks`, `no_of_sub_questions`, `sub_questions_marks`, `total_marks`, `created`) VALUES
(1, 'Basic test', 1, 3, '{\"sub_marks\":[\"5\",\"5\",\"5\"]}', '{\"sub_quests\":[\"0\",\"0\",\"0\"]}', '', 15, '2022-07-24 23:30:26'),
(2, 'Basic test', 2, 3, '{\"sub_marks\":[\"5\",\"5\",\"5\"]}', '{\"sub_quests\":[\"0\",\"0\",\"0\"]}', '', 15, '2022-07-24 23:31:09'),
(3, '60 marks exam', 5, 4, '{\"sub_marks\":[\"12\",\"16\",\"16\",\"16\"]}', '{\"sub_quests\":[\"8\",\"6\",\"3\",\"3\"]}', '', 60, '2022-07-28 10:18:31'),
(4, 'abc', 1, 3, '{\"sub_marks\":[\"10\",\"10\",\"10\"]}', '{\"sub_quests\":[\"2\",\"0\",\"0\"]}', '', 30, '2022-08-08 14:28:49'),
(6, '30 marks test', 1, 3, '[\"10\",\"10\",\"10\"]', '[\"2\",\"0\",\"0\"]', '[[\"5\",\"5\"],0,0]', 30, '2022-08-26 19:22:02'),
(7, '60 marks exam', 5, 4, '[\"12\",\"16\",\"16\",\"16\"]', '[\"8\",\"6\",\"3\",\"3\"]', '[[\"2\",\"2\",\"2\",\"2\",\"2\",\"2\",\"2\",\"2\"],[\"4\",\"4\",\"4\",\"4\",\"4\",\"4\"],[\"8\",\"8\",\"8\"],[\"8\",\"8\",\"8\"]]', 60, '2022-09-17 11:38:30'),
(8, '30 marks test', 2, 3, '[\"10\",\"10\",\"10\"]', '[\"2\",\"0\",\"0\"]', '[[\"5\",\"5\"],0,0]', 30, '2022-09-20 06:55:34');

-- --------------------------------------------------------

--
-- Table structure for table `po_list`
--

CREATE TABLE `po_list` (
  `id` int(11) NOT NULL,
  `po_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_list`
--

INSERT INTO `po_list` (`id`, `po_name`) VALUES
(1, 'PO1'),
(2, 'PO2'),
(3, 'PO3'),
(4, 'PO4'),
(5, 'PO5'),
(6, 'PO6'),
(7, 'PO7'),
(8, 'PO8'),
(9, 'PO9'),
(10, 'PO10'),
(11, 'PO11'),
(12, 'PO12'),
(13, 'PSO1'),
(14, 'PSO2'),
(15, 'PSO3');

-- --------------------------------------------------------

--
-- Table structure for table `po_mapping`
--

CREATE TABLE `po_mapping` (
  `id` int(11) NOT NULL,
  `co_statement` text NOT NULL,
  `co_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `pos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pos`)),
  `po_hours` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_hours`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `practical_attainment`
--

CREATE TABLE `practical_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attainment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attainment_levels`)),
  `percentages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`percentages`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practical_attainment`
--

INSERT INTO `practical_attainment` (`id`, `batch_id`, `attainment_levels`, `percentages`) VALUES
(6, 1, '{\"LO1\":1,\"LO2\":2,\"LO3\":1,\"LO4\":1,\"LO5\":1,\"LO6\":1}', '{\"LO1\":55.81395348837209,\"LO2\":82.55813953488372,\"LO3\":65.11627906976744,\"LO4\":77.90697674418605,\"LO5\":9.30232558139535,\"LO6\":51.162790697674424}'),
(14, 2, '{\"LO1\":1,\"LO2\":3,\"LO3\":1,\"LO4\":1,\"LO5\":1,\"LO6\":1}', '{\"LO1\":0,\"LO2\":100,\"LO3\":0,\"LO4\":0,\"LO5\":0,\"LO6\":0}');

-- --------------------------------------------------------

--
-- Table structure for table `practical_mapping`
--

CREATE TABLE `practical_mapping` (
  `id` int(11) NOT NULL,
  `number_of_practicals` int(11) NOT NULL,
  `lo_mapped` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`lo_mapped`)),
  `batch_id` int(11) NOT NULL,
  `mini_project` tinyint(1) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `target_val_percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`target_val_percentage`)),
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL,
  `mini_project_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practical_mapping`
--

INSERT INTO `practical_mapping` (`id`, `number_of_practicals`, `lo_mapped`, `batch_id`, `mini_project`, `teacher_id`, `type`, `target_val_percentage`, `lower_range`, `upper_range`, `marks_id`, `mini_project_marks`) VALUES
(7, 15, '[{\"exp1\":[\"LO1\",\"LO2\",\"LO5\",\"LO6\"],\"exp2\":[\"LO1\",\"LO3\",\"LO5\",\"LO6\"],\"exp3\":[\"LO1\",\"LO4\",\"LO5\",\"LO6\"],\"exp4\":[\"LO2\",\"LO3\",\"LO5\",\"LO6\"],\"exp5\":[\"LO2\",\"LO4\",\"LO5\",\"LO6\"],\"exp6\":[\"LO3\",\"LO4\",\"LO5\",\"LO6\"],\"exp7\":[\"LO1\",\"LO5\",\"LO6\"],\"exp8\":[\"LO2\",\"LO5\",\"LO6\"],\"exp9\":[\"LO3\",\"LO5\",\"LO6\"],\"exp10\":[\"LO4\",\"LO5\",\"LO6\"],\"exp11\":[\"LO1\",\"LO2\",\"LO4\",\"LO5\",\"LO6\"],\"exp12\":[\"LO1\",\"LO3\",\"LO4\",\"LO5\",\"LO6\"],\"exp13\":[\"LO2\",\"LO4\",\"LO5\",\"LO6\"],\"exp14\":[\"LO1\",\"LO2\",\"LO3\",\"LO4\",\"LO5\",\"LO6\"],\"exp15\":[\"LO1\",\"LO2\",\"LO3\",\"LO5\",\"LO6\"]}]', 1, 1, 2, '1', '{\"percentages\":[\"50\",\"50\",\"50\",\"50\",\"50\",\"50\"]}', 40, 50, 4, 5),
(12, 8, '[{\"b\":[\"LO1\",\"LO3\",\"LO4\",\"LO5\",\"LO6\"]},{\"b\":[\"LO1\",\"LO2\",\"LO5\",\"LO6\"]},{\"b\":[\"LO2\",\"LO5\",\"LO6\"]},{\"bb\":[\"LO1\",\"LO5\",\"LO6\"]},{\"b\":[\"LO3\",\"LO5\",\"LO6\"]},{\"b\":[\"LO2\",\"LO3\",\"LO5\",\"LO6\"]},{\"b\":[\"LO5\",\"LO6\"]},{\"bb\":[\"LO1\",\"LO4\",\"LO5\",\"LO6\"]}]', 4, 1, 2, '1', '{\"percentages\":[\"70\",\"40\",\"70\",\"70\",\"70\",\"40\"]}', 80, 90, 14, 5),
(13, 4, '[{\"a\":[\"LO2\",\"LO5\",\"LO6\"]},{\"b\":[\"LO3\",\"LO5\",\"LO6\"]},{\"c\":[\"LO1\",\"LO4\",\"LO5\",\"LO6\"]},{\"d\":[\"LO2\",\"LO3\",\"LO5\",\"LO6\"]},{\"e\":[\"LO1\",\"LO3\",\"LO4\",\"LO5\",\"LO6\"]}]', 2, 1, 2, '2', '{\"percentages\":[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]}', 40, 50, 20, 5);

-- --------------------------------------------------------

--
-- Table structure for table `practical_marks`
--

CREATE TABLE `practical_marks` (
  `id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `practical_marks`
--

INSERT INTO `practical_marks` (`id`, `marks`, `updated_at`) VALUES
(1, 25, '2022-08-10 11:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `pattern_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `bt_id` int(11) NOT NULL,
  `low_range` int(11) NOT NULL,
  `high_range` int(11) NOT NULL,
  `bt_percentage` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sat_attainment`
--

CREATE TABLE `sat_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attainment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attainment_levels`)),
  `percentages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`percentages`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sat_lo_mapping`
--

CREATE TABLE `sat_lo_mapping` (
  `id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `sat_outcome` text NOT NULL,
  `hours_allotted` int(11) NOT NULL,
  `po_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_list`)),
  `po_hours_allotted` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`po_hours_allotted`)),
  `batch_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sat_mapping`
--

CREATE TABLE `sat_mapping` (
  `id` int(11) NOT NULL,
  `number_of_practicals` int(11) NOT NULL,
  `so_mapped` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`so_mapped`)),
  `batch_id` int(11) NOT NULL,
  `mini_project` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `target_val_percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`target_val_percentage`)),
  `lower_range` int(11) NOT NULL,
  `upper_range` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL,
  `mini_project_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sat_mapping`
--

INSERT INTO `sat_mapping` (`id`, `number_of_practicals`, `so_mapped`, `batch_id`, `mini_project`, `teacher_id`, `type`, `target_val_percentage`, `lower_range`, `upper_range`, `marks_id`, `mini_project_marks`) VALUES
(1, 15, '[[\"SO1\",\"SO2\",\"SO3\",\"SO4\",\"SO5\",\"SO6\"],[\"SO1\",\"SO2\"],[\"SO1\",\"SO3\"],[\"SO1\",\"SO4\"],[\"SO1\",\"SO5\"],[\"SO1\",\"SO6\"],[\"SO2\",\"SO3\"],[\"SO2\",\"SO4\"],[\"SO2\",\"SO5\"],[\"SO2\",\"SO6\"],[\"SO3\",\"SO4\"],[\"SO3\",\"SO5\"],[\"SO3\",\"SO6\"],[\"SO4\",\"SO5\"],[\"SO4\",\"SO6\"],{\"cwec\":[\"SO2\",\"SO4\",\"SO6\"]}]', 1, 1, 2, 4, '{\"percentages\":[\"80\",\"40\",\"40\",\"40\",\"40\",\"40\"]}', 40, 50, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `so_list`
--

CREATE TABLE `so_list` (
  `id` int(11) NOT NULL,
  `so_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `so_list`
--

INSERT INTO `so_list` (`id`, `so_name`) VALUES
(1, 'SO1'),
(2, 'SO2'),
(3, 'SO3'),
(4, 'SO4'),
(5, 'SO5'),
(6, 'SO6');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` text NOT NULL,
  `teacher_email` text NOT NULL,
  `dept_id` int(11) NOT NULL,
  `password` text NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `dept_id`, `password`, `created`, `status`, `type`) VALUES
(1, 'Prince Karania', 'princekarania@somaiya.edu', 1, 'prince@123', '2022-07-21 06:15:31', 0, 1),
(2, 'Kashyap Kotak', 'kotakkashyap03@gmail.com', 3, 'kashyap@123', '2022-07-21 06:16:29', 1, 0),
(6, 'abc', 'abc@gmail.com', 1, 'abc123', '2022-08-08 14:14:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_name` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_name`, `created`) VALUES
(1, 'Test 1', '2022-07-24 23:00:00'),
(2, 'Test 2', '2022-07-24 23:00:00'),
(3, 'Assignment 1', '2022-07-24 23:00:00'),
(5, 'End Sem Exam', '2022-07-24 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `test_mapping`
--

CREATE TABLE `test_mapping` (
  `id` int(11) NOT NULL,
  `quests_cos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_cos`)),
  `quests_bt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_bt`)),
  `quests_range_min_val` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `quests_range_max_val` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_range_max_val`)),
  `pattern_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `marks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_mapping`
--

INSERT INTO `test_mapping` (`id`, `quests_cos`, `quests_bt`, `quests_range_min_val`, `quests_range_max_val`, `pattern_id`, `created_by`, `batch_id`, `marks_id`) VALUES
(5, '{\"cos\":[\"2\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\"]}', '{\"bt_levels\":[\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\",\"1\"]}', '{\"min_levels\":[\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\",\"40\"]}', '{\"max_levels\":[\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\",\"50\"]}', 3, 2, 1, 0),
(6, '{\"cos\":[\"1\",\"2\",\"3\"]}', '{\"bt_levels\":[\"1\",\"2\",\"3\"]}', '{\"min_levels\":[\"50\",\"50\",\"50\"]}', '{\"max_levels\":[\"40\",\"40\",\"40\"]}', 1, 2, 2, 1),
(7, '{\"cos\":[\"1\",\"2\",\"3\",\"4\"]}', '{\"bt_levels\":[\"2\",\"2\",\"4\",\"1\"]}', '{\"min_levels\":null}', '{\"max_levels\":null}', 6, 2, 2, 16),
(9, '{\"cos\":[\"1\",\"1\",\"1\",\"1\"]}', '{\"bt_levels\":[\"1\",\"1\",\"1\",\"1\"]}', '{\"min_levels\":[\"40\",\"40\",\"40\",\"40\"]}', '{\"max_levels\":[\"50\",\"50\",\"50\",\"50\"]}', 6, 2, 2, 19),
(10, '{\"cos\":[\"1\",\"2\",\"3\",\"4\"]}', '{\"bt_levels\":[\"1\",\"1\",\"1\",\"1\"]}', '{\"min_levels\":[\"40\",\"40\",\"40\",\"40\"]}', '{\"max_levels\":[\"50\",\"50\",\"50\",\"50\"]}', 6, 2, 4, 23),
(11, '{\"cos\":[\"5\",\"1\",\"2\",\"1\"]}', '{\"bt_levels\":[\"1\",\"1\",\"1\",\"1\"]}', '{\"min_levels\":[\"40\",\"40\",\"40\",\"40\"]}', '{\"max_levels\":[\"50\",\"50\",\"50\",\"50\"]}', 8, 2, 4, 31);

-- --------------------------------------------------------

--
-- Table structure for table `theory_attainment`
--

CREATE TABLE `theory_attainment` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `attanment_levels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attanment_levels`)),
  `percentages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`percentages`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `bt`
--
ALTER TABLE `bt`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_exit_attainment`
--
ALTER TABLE `course_exit_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_exit_mapping`
--
ALTER TABLE `course_exit_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_attainment`
--
ALTER TABLE `co_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_list`
--
ALTER TABLE `co_list`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `co_mapping`
--
ALTER TABLE `co_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co_target_value`
--
ALTER TABLE `co_target_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `ia_attainment`
--
ALTER TABLE `ia_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ia_mapping`
--
ALTER TABLE `ia_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_exit_attainment`
--
ALTER TABLE `lab_exit_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_exit_mapping`
--
ALTER TABLE `lab_exit_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lo_list`
--
ALTER TABLE `lo_list`
  ADD PRIMARY KEY (`lo_id`);

--
-- Indexes for table `lo_mapping`
--
ALTER TABLE `lo_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `orals_attainment`
--
ALTER TABLE `orals_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oral_mapping`
--
ALTER TABLE `oral_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`pattern_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `po_list`
--
ALTER TABLE `po_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_mapping`
--
ALTER TABLE `po_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_attainment`
--
ALTER TABLE `practical_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_mapping`
--
ALTER TABLE `practical_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practical_marks`
--
ALTER TABLE `practical_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `bt_id` (`bt_id`),
  ADD KEY `co_id` (`co_id`),
  ADD KEY `pattern_id` (`pattern_id`);

--
-- Indexes for table `sat_attainment`
--
ALTER TABLE `sat_attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sat_mapping`
--
ALTER TABLE `sat_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_list`
--
ALTER TABLE `so_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_mapping`
--
ALTER TABLE `test_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `pattern_id` (`pattern_id`);

--
-- Indexes for table `theory_attainment`
--
ALTER TABLE `theory_attainment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bt`
--
ALTER TABLE `bt`
  MODIFY `bt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_exit_attainment`
--
ALTER TABLE `course_exit_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_exit_mapping`
--
ALTER TABLE `course_exit_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co_attainment`
--
ALTER TABLE `co_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `co_list`
--
ALTER TABLE `co_list`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `co_mapping`
--
ALTER TABLE `co_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `co_target_value`
--
ALTER TABLE `co_target_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ia_attainment`
--
ALTER TABLE `ia_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ia_mapping`
--
ALTER TABLE `ia_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lab_exit_attainment`
--
ALTER TABLE `lab_exit_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_exit_mapping`
--
ALTER TABLE `lab_exit_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lo_list`
--
ALTER TABLE `lo_list`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lo_mapping`
--
ALTER TABLE `lo_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orals_attainment`
--
ALTER TABLE `orals_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oral_mapping`
--
ALTER TABLE `oral_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `pattern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `po_list`
--
ALTER TABLE `po_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `po_mapping`
--
ALTER TABLE `po_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `practical_attainment`
--
ALTER TABLE `practical_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `practical_mapping`
--
ALTER TABLE `practical_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `practical_marks`
--
ALTER TABLE `practical_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sat_attainment`
--
ALTER TABLE `sat_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sat_mapping`
--
ALTER TABLE `sat_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `so_list`
--
ALTER TABLE `so_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_mapping`
--
ALTER TABLE `test_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `theory_attainment`
--
ALTER TABLE `theory_attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `batch_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`bt_id`) REFERENCES `bt` (`bt_id`),
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`pattern_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `test_mapping`
--
ALTER TABLE `test_mapping`
  ADD CONSTRAINT `test_mapping_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `test_mapping_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `test_mapping_ibfk_3` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`pattern_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
