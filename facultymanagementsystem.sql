-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultymanagementsystem`
--
CREATE DATABASE IF NOT EXISTS facultymanagementsystem;
USE facultymanagementsystem;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`, `type`) VALUES
('Doctor Manal', 'doctormanal@gmail.com', 'manal', 'admin'),
('Doctor Ousama', 'doctorousama@gmail.com', 'ousama', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assign_courses`
--

CREATE TABLE `assign_courses` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `course_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hall` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `day` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_courses`
--

INSERT INTO `assign_courses` (`id`, `professor_id`, `course_code`, `Hall`, `start_time`, `day`, `question`) VALUES
(64, 2021180, 'ARA73', 'hall 1', '08:00:00', 'Saturday', 'hello students'),
(65, 2021191, 'CS212', 'hall 3', '08:00:00', 'Sunday', ''),
(66, 2021181, 'MA111', 'hall 4', '10:00:00', 'Tuesday', 'Answer the following questions\r\n 1+1 = ?\r\n2+2 = ?'),
(67, 2021184, 'IT111', 'hall 6', '12:00:00', 'Tuesday', ''),
(68, 2021190, 'CS112', 'hall 8', '12:00:00', 'Tuesday', ''),
(74, 2021180, 'HU112', 'hall 6', '10:00:00', 'Tuesday', ''),
(75, 2021180, 'HU313', 'hall 10', '10:00:00', 'Thursday', ''),
(76, 2021180, 'CS213', 'hall 5', '14:00:00', 'Thursday', ''),
(77, 2021188, 'CS221', 'hall 5', '10:00:00', 'Thursday', 'hello'),
(78, 2021193, 'INF311', 'hall 3', '08:00:00', 'Saturday', ''),
(79, 2021183, 'CS214', 'hall 10', '12:00:00', 'Sunday', ''),
(81, 2021187, 'CS404', 'hall 5', '12:00:00', 'Tuesday', ''),
(82, 2021189, 'CS361', 'hall 9', '10:00:00', 'Sunday', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `semester_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`name`, `code`, `description`, `level_id`, `semester_id`) VALUES
('Arabic', 'ARA73', 'language skills', 4, 1),
('Bioinformatics', 'BINF54', 'elective course', 4, 2),
('Biology', 'BIO462', 'science of life', 2, 3),
('Introduction to Computers', 'CS111', 'improve skills', 3, 1),
('Programming – 1', 'CS112', 'improve skills', 3, 2),
('Programs Security ', 'CS212', 'improve skills', 1, 3),
('Programming – 2', 'CS213', 'improve skills', 3, 1),
('Data Structures', 'CS214', 'improve skills', 2, 2),
('Logic Design', 'CS221', 'improve skills', 2, 3),
('Algorithms', 'CS316', 'improve skills', 3, 1),
('Artificial Intelligence', 'CS361', 'improve skills', 4, 2),
('CyberSecurity', 'CS404', 'Ethical hacking course', 4, 3),
('Embedded Systems', 'ES165', 'machine learning skills', 3, 2),
('English-1', 'HU111', 'improve skills', 1, 3),
('English-2', 'HU112', 'improve skills', 1, 1),
('Human Rights', 'HU313', 'improve knowledge', 1, 2),
('Communication & Negotiation', 'HU331', 'improve skills', 1, 3),
('Management Information system', 'INF311', 'improve skills', 2, 1),
('Decision Support System', 'INF314', 'improve skills', 2, 2),
('Systems Analysis ', 'INF319', 'improve skills', 3, 3),
('Data Warehouse', 'INF334', 'improve skills', 1, 1),
('Big Data', 'INF432', 'improve skills', 4, 2),
('Introduction to Informatics', 'IS110', 'improve skills', 2, 3),
('database Systems 1', 'IS211', 'improve skills', 3, 1),
('database Systems 2', 'IS312', 'improve skills', 4, 2),
('Software Engineering-1', 'IS351', 'improve skills', 3, 3),
('Software Engineering-2', 'IS352', 'improve skills', 4, 1),
('Information Engineering', 'IS454', 'improve skills', 2, 2),
('Electronics – 1', 'IT111', 'improve skills', 2, 3),
('Computer Networks ', 'IT222', 'improve skills', 4, 1),
('Mathematics – 1', 'MA111', 'improve skills', 2, 3),
('Discrete Mathematics', 'MA112', 'improve skills', 1, 1),
('Mathematics – 2', 'MA113', 'improve skills', 1, 2),
('Physics', 'phys142', 'electromagnetic science', 1, 3),
('Spanish', 'SP452', 'language skills', 3, 2),
('Probability and Statistics', 'ST122', 'improve skills', 4, 1),
('Software Security', 'SWE425', 'improve skills', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(3) NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(4, 'AI'),
(1, 'CS'),
(2, 'IS'),
(3, 'IT'),
(6, 'MEDICAL'),
(5, 'SOFTWARE');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enroll_id` int(11) NOT NULL,
  `student_id` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_id` int(3) NOT NULL,
  `answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enroll_id`, `student_id`, `course_id`, `assign_id`, `answers`, `grades`) VALUES
(34, 'totti@gmail.com', 'MA111', 66, '../uploads/stdtxt/66905-math5.txt', 85),
(35, 'totti@gmail.com', 'IT111', 67, '', 0),
(36, 'totti@gmail.com', 'CS221', 77, '', 39),
(37, 'totti@gmail.com', 'INF311', 78, '', 0),
(38, 'totti@gmail.com', 'CS214', 79, '', 0),
(40, 'sohaila@gmail.com', 'CS221', 77, '../uploads/stdtxt/2254-math5.txt', 100),
(41, 'sohaila@gmail.com', 'MA111', 66, '', 0),
(42, 'sohaila@gmail.com', 'CS214', 79, '', 0),
(43, 'sohaila@gmail.com', 'INF311', 78, '', 0),
(44, 'sandy@gmail.com', 'MA111', 66, '', 0),
(45, 'sandy@gmail.com', 'IT111', 67, '', 0),
(46, 'sandy@gmail.com', 'CS221', 77, '../uploads/stdtxt/58391-math5.txt', 88),
(47, 'sandy@gmail.com', 'INF311', 78, '', 0),
(48, 'sandy@gmail.com', 'CS214', 79, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'level 1'),
(2, 'level 2'),
(3, 'level 3'),
(4, 'level 4');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `firstname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` int(14) NOT NULL,
  `DOB` date NOT NULL,
  `dept_id` int(3) NOT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'professor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`firstname`, `lastname`, `degree`, `gender`, `national_id`, `DOB`, `dept_id`, `username`, `password`, `type`) VALUES
('hala', 'zayed', 'BE', 'female', 2021180, '1995-11-15', 1, 'hala112', 'hala123', 'professor'),
('Nourane', 'Mohamed', 'BE', 'female', 2021181, '1988-08-08', 2, 'Nora88', 'Nora88', 'professor'),
('Ibrahim', 'Elsaid', 'PHD', 'male', 2021182, '1979-02-02', 3, 'IBR99', 'IBR99', 'professor'),
('Samer', 'Mohamed', 'BE', 'male', 2021183, '1995-11-15', 4, 'Smsm33', 'Smsm33', 'professor'),
('Donia', 'Ahmed', 'PHD', 'female', 2021184, '1993-05-15', 5, 'Dnia0', 'Dnia0', 'professor'),
('Sayed', 'Eltelt', 'BE', 'male', 2021186, '1994-01-25', 1, 'Tlt13', 'Tlt13', 'professor'),
('Smile', 'Samer', 'PHD', 'male', 2021187, '1991-11-15', 2, 'SG1', 'SG1', 'professor'),
('John', 'Maher', 'BE', 'male', 2021188, '1988-10-10', 3, 'Jhm99', 'Jhm99', 'professor'),
('Sandra', 'Zakaria', 'PHD', 'female', 2021189, '1995-01-01', 4, 'SZ95', 'SZ95', 'professor'),
('mohamed', 'elsaeed', 'BE', 'male', 2021190, '1980-01-05', 5, 'elsaeed', 'elsaeed', 'professor'),
('Nada', 'Ahmed', 'BE', 'female', 2021191, '1977-07-16', 6, 'Nada55', 'Nada55', 'professor'),
('Mohamed', 'Nawawi', 'BE', 'male', 2021192, '1994-04-20', 1, 'Nawa69', 'Nawa69', 'professor'),
('Ahmed', 'Ashraf', 'PHD', 'male', 2021193, '2002-10-05', 1, 'ashraf@gmail.com', 'ashrooof', 'professor'),
('khaled', 'sobh', 'BE', 'male', 2021194, '1980-02-05', 3, 'khaledsobh123@gmail.com', 'khaloood', 'professor');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(3) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`) VALUES
(1, 'Fall'),
(2, 'Spring'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `fullname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `age` int(3) NOT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`fullname`, `phone_number`, `age`, `username`, `password`, `level_id`, `type`) VALUES
('Ahmed Maher', 123450, 19, 'ahmedelseaid22@gmail.com', '123', 4, 'student'),
('Stephen G Johnson', 123451, 18, 'ahmedkhaled@gmail.com', '123456', 2, 'student'),
('Farah nawawi', 123452, 24, 'Farah1998@gmail.com', 'Frh98', 3, 'student'),
('Galal Mohamed', 123453, 20, 'Galilio@gmail.com', 'Glgl22', 3, 'student'),
('hika', 123454, 18, 'hika@gmail.com', '123456', 4, 'student'),
('ireny', 123455, 18, 'ireny@gmail.com', 'ireny', 2, 'student'),
('Malek Sayed', 123456, 18, 'Malek@gmail.com', 'Malek00', 3, 'student'),
('menna ayman', 123457, 22, 'mennaayman@gmail.com', 'menna', 2, 'student'),
('Rana Asser', 123458, 20, 'Rana2001@gmail.com', 'Rana99', 3, 'student'),
('sally fouad', 8521475, 15, 'sally@gmail.com', '123456', 3, 'student'),
('Sami Khaled', 123459, 21, 'Sami@gmail.com', 'Sami60', 1, 'student'),
('sandy', 1234456789, 19, 'sandy@gmail.com', 'sandy', 2, 'student'),
('sohaila', 1234456, 19, 'sohaila@gmail.com', 'sohaila', 2, 'student'),
('tamer ashraf', 123460, 20, 'totti@gmail.com', '159', 2, 'student'),
('ziad awad', 123461, 18, 'ziadawad@gmail.com', 'zoz', 2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `assign_courses`
--
ALTER TABLE `assign_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_professor_ID` (`professor_id`),
  ADD KEY `FK_course_code` (`course_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`),
  ADD KEY `FK_level_ID` (`level_id`),
  ADD KEY `FK_semesterID` (`semester_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `FK_studentID` (`student_id`),
  ADD KEY `FK_AssignID` (`assign_id`),
  ADD KEY `FK_courseid` (`course_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`national_id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `FK_DeptID` (`dept_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `FK_lvlID` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_courses`
--
ALTER TABLE `assign_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `phone_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_courses`
--
ALTER TABLE `assign_courses`
  ADD CONSTRAINT `FK_course_code` FOREIGN KEY (`course_code`) REFERENCES `course` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_professor_ID` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`national_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_level_ID` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_semesterID` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `FK_AssignID` FOREIGN KEY (`assign_id`) REFERENCES `assign_courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_courseid` FOREIGN KEY (`course_id`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `FK_studentID` FOREIGN KEY (`student_id`) REFERENCES `student` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FK_DeptID` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_lvlID` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
