-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2022 at 06:17 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `co_id` int(11) NOT NULL,
  `co_name` text NOT NULL,
  `co_statement` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_code` text NOT NULL,
  `semester` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `marks` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pattern`
--

CREATE TABLE `pattern` (
  `pattern_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `no_main_questions` int(11) NOT NULL,
  `no_of_sub_questions` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL
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
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `dept_id`, `password`, `created`) VALUES
(1, 'Prince Karania', 'princekarania@somaiya.edu', 1, 'prince@123', '2022-07-21 06:15:31'),
(2, 'Kashyap Kotak', 'kotakkashyap03@gmail.com', 1, 'kashyap@123', '2022-07-21 06:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_name` text NOT NULL,
  `total_marks` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `bt`
--
ALTER TABLE `bt`
  ADD PRIMARY KEY (`bt_id`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`co_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`marks_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `student_id` (`student_id`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `batch_id` (`batch_id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `co`
--
ALTER TABLE `co`
  ADD CONSTRAINT `co_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

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
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`co_id`) REFERENCES `co` (`co_id`),
  ADD CONSTRAINT `question_ibfk_3` FOREIGN KEY (`pattern_id`) REFERENCES `pattern` (`pattern_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
