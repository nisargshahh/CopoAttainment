-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 06:23 AM
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
(2, 'BLC :2011 - 2012', '2011 - 2012', 2, '2022-07-25 10:09:34', 2);

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
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `semester`, `end_sem_total_marks`, `created`) VALUES
(1, 'BDA', 'KJS2022', 7, 0, '2022-07-21 06:23:10'),
(2, 'BLC', 'BLC2022', 7, 0, '2022-07-21 06:26:15');

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
  `quests_cos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_cos`)),
  `quests_bt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_bt`)),
  `quests_percentage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`quests_percentage`)),
  `pattern_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_mapping`
--

INSERT INTO `co_mapping` (`id`, `quests_cos`, `quests_bt`, `quests_percentage`, `pattern_id`, `created_by`, `batch_id`) VALUES
(4, '{\"cos\":[\"1\",\"2\",\"3\"]}', '{\"bt_levels\":[\"1\",\"2\",\"3\"]}', '{\"percentages\":[\"50\",\"50\",\"50\"]}', 1, 2, 1);

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
(4, 'Artificial Intelligence and Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `marks_id` int(11) NOT NULL,
  `marks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`marks`)),
  `pattern_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`marks_id`, `marks`, `pattern_id`, `batch_id`, `created`) VALUES
(1, '{\"marks\":[{\"Arya Veer Krishna\":[\"4\",\"5\",\"5\"]},{\"Barot Het Mehul\":[\"4\",\"5\",\"5\"]},{\"Barude Yogesh Revan\":[\"4\",\"5\",\"5\"]},{\"Bendkhale Vaishnavi Vidyadhar\":[\"4\",\"5\",\"5\"]},{\"Bhadra Vivek Rajesh\":[\"4\",\"5\",\"5\"]},{\"Bhole Chinmay Santosh\":[\"4\",\"5\",\"5\"]},{\"Birari Namita Nitin\":[\"4\",\"5\",\"5\"]},{\"Bodekar Ambaji Subhash\":[\"3\",\"5\",\"5\"]},{\"Bodekar Sunil Bhiru\":[\"3\",\"5\",\"5\"]},{\"Chahar Aditya Dharmendra\":[\"4\",\"5\",\"5\"]},{\"Chaudhary Rohan Mahesh\":[\"4\",\"5\",\"5\"]},{\"Chavan Siddhesh Vijay\":[\"4\",\"5\",\"5\"]},{\"Chawada Bhumika Dinesh\":[\"4\",\"5\",\"5\"]},{\"Dama Smit Bharat\":[\"4\",\"5\",\"5\"]},{\"Dixit Varun Sandeep\":[\"2\",\"5\",\"5\"]},{\"Duraphe Vaishnav Ashok\":[\"4\",\"5\",\"5\"]},{\"Eshan Anand Pranjali\":[\"3\",\"5\",\"5\"]},{\"Gaikwad Anjali Chandrakant\":[\"4\",\"5\",\"5\"]},{\"Gajjar Gaurang Rajesh\":[\"4\",\"5\",\"5\"]},{\"Ghorpade Mayuresh Shrikant\":[\"4\",\"5\",\"4\"]},{\"Gopinathan Aathira\":[\"4\",\"5\",\"5\"]},{\"Gothankar Aniket Madhukar\":[\"4\",\"5\",\"5\"]},{\"Hamdare Zaid Khalid\":[\"3\",\"4\",\"0\"]},{\"Jain Samyak Neeru\":[\"4\",\"5\",\"5\"]},{\"Jhaveri Bhavya Vipul\":[\"4\",\"5\",\"5\"]},{\"Kadam Chitrang Avinash\":[\"4\",\"5\",\"5\"]},{\"Kadam Omkar Ravindra\":[\"4\",\"5\",\"4\"]},{\"Kadam Rushikesh Vilas\":[\"4\",\"5\",\"5\"]},{\"Kadlag Omkar Abasaheb\":[\"5\",\"5\",\"5\"]},{\"Kariya Jay Nitin\":[\"4\",\"5\",\"5\"]},{\"Kayampurath Ashwin Ramesh\":[\"4\",\"5\",\"5\"]},{\"Khochade Prathamesh Shashank\":[\"3\",\"5\",\"5\"]},{\"Kini Ganesh Yogesh\":[\"4\",\"5\",\"5\"]},{\"Koli Harsh Ravindra\":[\"3\",\"5\",\"5\"]},{\"Kulkarni Shubham Sunil\":[\"4\",\"5\",\"4\"]},{\"Metha Rajat Rahul\":[\"4\",\"5\",\"5\"]},{\"Parab Mihir Harishankar\":[\"4\",\"5\",\"5\"]},{\"Paradkar Rohit Santosh\":[\"4\",\"5\",\"5\"]},{\"Patel Ayush Rahul\":[\"4\",\"5\",\"4\"]},{\"Patel Pradeep Savji\":[\"4\",\"5\",\"5\"]},{\"Patel Ved Pranet\":[\"4\",\"5\",\"5\"]},{\"Patil Anurag Sudhir\":[\"4\",\"5\",\"5\"]},{\"Patil Sujal Dinesh\":[\"4\",\"5\",\"5\"]},{\"Pawar Nakul Umesh\":[\"4\",\"5\",\"5\"]},{\"Rana Gaurav Santosh\":[\"4\",\"5\",\"5\"]},{\"Sahu Aklant Akhaya\":[\"4\",\"4\",\"5\"]},{\"Sakpal Saloni Anil\":[\"4\",\"5\",\"5\"]},{\"Sapkale Gunjan Kunda\":[\"3\",\"5\",\"5\"]},{\"Satam Shabda Shrikant\":[\"4\",\"5\",\"5\"]},{\"Shaikh Faizan Majid\":[\"3\",\"4\",\"3\"]},{\"Shashtri Parikshit Umesh\":[\"4\",\"5\",\"5\"]},{\"Shinde Raj Anil\":[\"4\",\"5\",\"5\"]},{\"Singh Aashima Paramjit\":[\"4\",\"5\",\"5\"]},{\"Singh Kanika Krishnakumar\":[\"4\",\"5\",\"5\"]},{\"Singh Shikhar Chandrabhushan\":[\"4\",\"5\",\"5\"]},{\"Singh Ujjawal Dinesh\":[\"4\",\"5\",\"5\"]},{\"Singh Vatsa Deepak\":[\"4\",\"5\",\"5\"]},{\"Singh Ishani Ravishankar\":[\"4\",\"5\",\"5\"]},{\"Somavanshi Ashutosh Suresh\":[\"4\",\"5\",\"5\"]},{\"Sonne Abhinandan Shahaji\":[\"4\",\"5\",\"5\"]},{\"Talajiya Ajinkya Niraj\":[\"4\",\"5\",\"5\"]},{\"Tapre Rrahul Jaywant\":[\"3\",\"5\",\"5\"]},{\"Telgote Gajanan Vinod\":[\"4\",\"5\",\"5\"]},{\"Thapar Harjas Rajindersingh\":[\"4\",\"5\",\"5\"]},{\"Tiwari Rithik Subash\":[\"4\",\"5\",\"5\"]},{\"Udaipurwala Burhanuddin Siraj\":[\"4\",\"5\",\"5\"]},{\"Ugale Ashwin Govind\":[\"4\",\"5\",\"5\"]},{\"Vaja Jash Deepak\":[\"AB\",\"AB\",\"AB\"]},{\"Vishal Vijayan Rajani\":[\"3\",\"5\",\"5\"]},{\"Wani Vipul Vinod\":[\"4\",\"5\",\"5\"]},{\"Yadav Abhishek Jagdish Prasad\":[\"4\",\"5\",\"5\"]},{\"Zaveri Deep Kalpana\":[\"4\",\"5\",\"5\"]},{\"Zore Ronit Raju\":[\"4\",\"5\",\"5\"]}]}', 1, 1, '2022-07-25 01:14:22');

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
  `total_marks` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pattern`
--

INSERT INTO `pattern` (`pattern_id`, `pattern_name`, `test_id`, `no_main_questions`, `main_question_marks`, `no_of_sub_questions`, `total_marks`, `created`) VALUES
(1, 'Basic test', 1, 3, '{\"sub_marks\":[\"5\",\"5\",\"5\"]}', '{\"sub_quests\":[\"0\",\"0\",\"0\"]}', 15, '2022-07-24 23:30:26'),
(2, 'Basic test', 2, 3, '{\"sub_marks\":[\"5\",\"5\",\"5\"]}', '{\"sub_quests\":[\"0\",\"0\",\"0\"]}', 15, '2022-07-24 23:31:09');

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
(2, 'Kashyap Kotak', 'kotakkashyap03@gmail.com', 1, 'kashyap@123', '2022-07-21 06:16:29', 1, 0);

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
(3, 'IA', '2022-07-24 23:00:00'),
(4, 'Assignment 1', '2022-07-24 23:00:00'),
(5, 'End Sem Exam', '2022-07-24 23:00:00');

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
-- Indexes for table `co_list`
--
ALTER TABLE `co_list`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `co_mapping`
--
ALTER TABLE `co_mapping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `pattern_id` (`pattern_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`pattern_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `bt_id` (`bt_id`),
  ADD KEY `co_id` (`co_id`),
  ADD KEY `pattern_id` (`pattern_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bt`
--
ALTER TABLE `bt`
  MODIFY `bt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `co_list`
--
ALTER TABLE `co_list`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `co_mapping`
--
ALTER TABLE `co_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `marks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pattern`
--
ALTER TABLE `pattern`
  MODIFY `pattern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `co_mapping`
--
ALTER TABLE `co_mapping`
  ADD CONSTRAINT `co_mapping_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `co_mapping_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `co_mapping_ibfk_3` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`pattern_id`);

--
-- Constraints for table `pattern`
--
ALTER TABLE `pattern`
  ADD CONSTRAINT `pattern_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
