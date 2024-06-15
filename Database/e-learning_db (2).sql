-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 12:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `academic_year` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`batch_id`, `batch_name`, `academic_year`, `status`) VALUES
(1, '1st', '2010-2011', 'Finished'),
(2, '2nd', '2011-2012', 'Finished'),
(3, '3rd', '2012-2013', 'Finished'),
(4, '4th', '2013-2014', 'Finished'),
(5, '5th', '2014-2015', 'Finished'),
(6, '6th', '2015-2016', 'Finished'),
(7, '7th', '2016-2017', 'Finished'),
(8, '8th', '2017-2018', 'Finished'),
(9, '9th', '2018-2019', 'Finished'),
(10, '10th', '2022-2023', 'Ongoing'),
(11, '11th', '2023-2024', 'Ongoing'),
(12, '12th', '2024-2025', 'Ongoing'),
(13, '13th', '2024-2025', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` text NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `faculty_id`) VALUES
(1, 'ITPEC', 1),
(2, 'Programming', 1),
(3, 'Language', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `exam_id` int(11) NOT NULL,
  `exam_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`exam_id`, `exam_type`) VALUES
(1, 'Monthly Test'),
(2, 'Chapter End Test'),
(3, 'ITPEC Practice'),
(4, 'Placement Test'),
(5, 'Japanese');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_id`, `faculty_name`) VALUES
(1, 'IT'),
(2, 'Language'),
(3, 'Business'),
(4, 'Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` text NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`, `faculty_id`) VALUES
(1, 'IT Leader', 1),
(2, 'Japanese Leader', 2),
(3, 'IT Associated Professor', 1),
(4, 'Language Associated Professor', 2),
(5, 'Lecturer', 1),
(6, 'Lecturer', 2),
(7, 'IT Assistant Lecturer', 1),
(8, 'Language Assistant Lecturer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer_a` text NOT NULL,
  `answer_b` text NOT NULL,
  `answer_c` text NOT NULL,
  `answer_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `answer_student` int(11) NOT NULL,
  `correct_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `subject`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `correct_answer`, `answer_student`, `correct_student`) VALUES
(1, 'IP', 'Which of the following is an appropriate usage of radio buttons in GUI applications?', 'Red', 'Green', 'Blue', 'White', 'A', 20, 8),
(2, 'FE', 'In theory, what color is printed by a printer, when cyan, magenta, and yellow are mixed together by a subtractive color mixture?', 'Cyan', 'Megenta', 'Yellow', 'Black', 'B', 11, 5),
(3, 'FE', 'Which of the following is an appropriate concept of universal design?', 'RGB', 'CMYK', 'Both A and B', 'Non of the all', 'C', 9, 6),
(4, 'FE', 'Which of the following is a language used for the operation of a relational database?', 'SMTP', 'SSL', 'UML', 'SQL', 'D', 10, 6),
(5, 'IP', 'Which of the following subnet masks provides the minimum number of IP addresses available in the subnet to assign to devices that request a connection?', '255.255.255.0', '255.255.255.248', '255.255.255.252', '255.255.255.254', 'A', 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `result_id` int(11) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `exam_type` text NOT NULL,
  `subject` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `year_section` text NOT NULL,
  `date_taken` date NOT NULL,
  `given_mark` int(11) NOT NULL,
  `total_score` int(11) NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`result_id`, `exam_id`, `exam_type`, `subject`, `student_id`, `student_name`, `year_section`, `date_taken`, `given_mark`, `total_score`, `result`) VALUES
(39, '661', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 1, 'Fail'),
(40, '661ab02d1eb10', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 1, 'Fail'),
(41, '661ab02d1eb10', 'Chapter End Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(42, '661ab02d1eb10', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 1, 'Fail'),
(43, '661ab02d1eb10', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(47, '661ab3732c2fd', 'ITPEC Practice', 'FE', 16, 'Swan Htet', '9th', '2024-04-13', 2, 1, 'Fail'),
(48, '661ab3732c2fd', 'ITPEC Practice', 'FE', 16, 'Swan Htet', '9th', '2024-04-13', 3, 1, 'Fail'),
(49, '661ab3732c2fd', 'ITPEC Practice', 'FE', 16, 'Swan Htet', '9th', '2024-04-13', 3, 1, 'Fail'),
(50, '661ab3732c2fd', 'ITPEC Practice', 'IP', 16, 'Swan Htet', '9th', '2024-04-14', 2, 1, 'Fail'),
(52, '661ccd406cd61', 'Placement Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 0, 'Fail'),
(53, '661ccdbd60be5', 'Placement Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(54, '66222cf4f3ae0', 'Monthly Test', 'FE', 16, 'Swan Htet', '9th', '2024-04-19', 3, 3, 'Pass'),
(55, '66222e7065064', 'Monthly Test', 'FE', 16, 'Swan Htet', '9th', '2024-04-19', 3, 3, 'Pass'),
(56, '66222ecbcb6f2', 'Monthly Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 2, 'Pass'),
(57, '66222f082d282', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 2, 'Pass'),
(58, '6622310588b0b', 'Monthly Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 1, 'Fail'),
(59, '6622832533c43', 'Monthly Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(60, '6622843e65b09', 'Chapter End Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(61, '662284d2e61e5', 'Chapter End Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-01', 3, 0, 'Fail'),
(62, '6624aeca6b89e', 'Placement Test', 'IP', 16, 'Swan Htet', '9th', '2024-04-21', 2, 2, 'Pass'),
(63, '662a7430c8106', 'Monthly Test', 'IP', 16, 'Swan Htet', '9th', '2024-04-25', 2, 0, 'Fail'),
(64, '662c8c6587901', 'Monthly Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-01', 2, 1, 'Fail'),
(65, '662c9205dc49e', 'Chapter End Test', 'FE', 16, 'Swan Htet', '9th', '2024-04-27', 3, 3, 'Pass'),
(66, '662d0d7b25952', 'ITPEC Practice', 'FE', 16, 'Swan Htet', '9th', '2024-04-27', 3, 3, 'Pass'),
(67, '6633a100a239b', 'ITPEC Practice', 'FE', 16, 'Swan Htet', '9th', '2024-05-02', 2, 0, 'Fail'),
(68, '6635039a76f60', 'Monthly Test', 'IP', 16, 'Swan Htet', '9th', '2024-05-03', 2, 1, 'Fail'),
(69, '6637164d8c66b', 'Placement Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-05', 2, 0, 'Fail'),
(70, '663735893360e', 'ITPEC Practice', 'FE', 13, 'Jack Bos', '13th', '2024-05-05', 3, 0, 'Fail'),
(71, '6639b4dcd5a3b', 'Chapter End Test', 'FE', 16, 'Swan Htet', '9th', '2024-05-07', 3, 3, 'Pass'),
(72, '6639be2457abf', 'Monthly Test', 'FE', 13, 'Jack Bos', '13th', '2024-05-07', 3, 2, 'Pass'),
(73, '6639f89d10b4e', 'Monthly Test', 'IP', 16, 'Swan Htet', '9th', '2024-05-07', 2, 1, 'Fail'),
(74, '663b2c164e232', 'Monthly Test', 'IP', 13, 'Jack Bos', '13th', '2024-05-08', 2, 1, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(11) NOT NULL,
  `section_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `section_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `phone_no` text NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `dob`, `email`, `batch_id`, `course_id`, `section_id`, `phone_no`, `address`, `gender`, `status`) VALUES
(1, 'Jack Bos', '1979-04-30', 'jack007@gmail.com', 13, 1, 1, '756883362', 'South Dagon, Yangon, Myanmar', 'Male', 'Enrollment'),
(2, 'Swan Htet', '1979-04-30', 'swanhtet@gmail.com', 9, 1, 3, '756883362', 'South Dagon, Yangon, Myanmar', 'Male', 'Enrollment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` text NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `course_id`) VALUES
(1, 'IP', 1),
(2, 'FE', 1),
(3, 'Programming', 2),
(4, 'Strategy & Management', 1),
(5, 'Japanese', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `subject_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `dob`, `gender`, `email`, `address`, `subject_id`, `position_id`) VALUES
(1, 'Kyaw Zay', '1979-04-30', 'Male', 'kyawzay1979@gmail.com', 'South Dagon, Yangon, Myanmar', 1, 2),
(2, 'Metro IT', '1979-04-30', 'Female', 'metro@gmail.com', 'Nagasaki, Japan', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_question_result`
--

CREATE TABLE `tbl_temp_question_result` (
  `exam_id` varchar(255) NOT NULL,
  `exam_type` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `question` text NOT NULL,
  `answer_a` text NOT NULL,
  `answer_b` text NOT NULL,
  `answer_c` text NOT NULL,
  `answer_d` text NOT NULL,
  `correct_answer` text NOT NULL,
  `check_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `password` varchar(225) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp(),
  `gender` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone_no` text NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `status`, `created_at`, `updated_at`, `password`, `dob`, `gender`, `phone_no`, `address`) VALUES
(13, 'Jack', 'Bos', 'jack007@gmail.com', 1, '2024-03-24', '2024-03-24', '$2y$10$1/ZmKeGVHPvM6JY9YTJ7FerOO0bv3kLNRLIbCke./e0eERo8mK8hW', '2024-04-28', 'Male', '097777777', 'Bahan, Yangon'),
(14, 'Metro', 'IT', 'metro@gmail.com', 1, '2024-03-24', '2024-03-24', '$2y$10$oSWiuNrNIMPnrTQCRVKqHeKcUOr09e13QSYxfC.vRozwHNXLt.xL.', '2024-04-01', 'Female', '099999999', 'Thar Kay Ta, Yangon'),
(16, 'Swan', 'Htet', 'swanhtet@gmail.com', 1, '2024-04-29', '2024-05-02', '$2y$10$Za9xA9ZwVUyZPyU6HG7X8OGhyN.eGfAyTT5SFDAl8EbLUAY4/VADu', '2012-11-17', 'Male', '09798599663', 'Chan Aye Tharsan, Mandalay'),
(26, 'Kyaw', 'Zay', 'kyawzay1979@gmail.com', 1, '2024-04-29', '2024-05-05', '$2y$10$8xBBWyEy7Bmfmhyr822Jo.lIirjqiJbxF4N9lKJtVb03C6y7mgpgC', '1979-04-30', 'Male', '09756883362', 'South Dagon, Yangon, Myanmar'),
(27, 'Hnin', 'Lae', 'hninlae@gmail.com', 1, '2024-04-29', '2024-05-07', '$2y$10$o54W0E7sKc.lsA8eAyUFHe4Gw0b7TSN9bOnJpjYJZJcNIwv7TlFNm', '2009-06-25', 'Female', '09756883362', 'North Dagon, Yangon'),
(28, 'Paradise', 'Mandalay', 'paradise@gmail.com', 1, '2024-05-01', '2024-05-02', '$2y$10$6YngJ3DK313tkM0f6kZ3A.ouU2RrekWxWx6GyP8ooWSKC5bK00OIe', '2023-06-24', 'Male', '09777324077', 'Mandalay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`,`subject`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`result_id`,`exam_id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`,`batch_id`,`course_id`,`section_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_temp_question_result`
--
ALTER TABLE `tbl_temp_question_result`
  ADD PRIMARY KEY (`exam_id`,`question_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `tbl_batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
