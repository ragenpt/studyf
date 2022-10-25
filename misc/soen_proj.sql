-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2022 at 06:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soen_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `AnsweredAssessmentQuestions`
--

CREATE TABLE `AnsweredAssessmentQuestions` (
  `answeredQuestionId` int(11) NOT NULL,
  `enrolledCourseId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `AssessmentQuestions`
--

CREATE TABLE `AssessmentQuestions` (
  `questionId` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `totalMarks` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CourseContents`
--

CREATE TABLE `CourseContents` (
  `contentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `lectureName` varchar(50) NOT NULL,
  `lectureIndex` smallint(6) NOT NULL,
  `isAssessment` tinyint(1) NOT NULL,
  `weight` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CourseMaterial`
--

CREATE TABLE `CourseMaterial` (
  `materialId` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `videoLecture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `CourseProgress`
--

CREATE TABLE `CourseProgress` (
  `progressId` int(11) NOT NULL,
  `enrolledCourseId` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `completion` float NOT NULL,
  `gradeReceived` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `EnrolledCourses`
--

CREATE TABLE `EnrolledCourses` (
  `enrolledCourseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ExistingCourses`
--

CREATE TABLE `ExistingCourses` (
  `courseId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseDesc` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `courseCode` varchar(11) NOT NULL,
  `private` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `GradedAssessmentQuestions`
--

CREATE TABLE `GradedAssessmentQuestions` (
  `gradedQuestionId` int(11) NOT NULL,
  `enrolledCourseId` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `marksReceived` float NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `signUpDate` datetime NOT NULL DEFAULT current_timestamp(),
  `isTeacher` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `username`, `email`, `password`, `signUpDate`, `isTeacher`) VALUES
(1, 'George', 'Marchenko', 'georgi3', 'gosha@gmail.com', '39aef234da63b52dcd36c4110eef838857a6c4b01416af165bdc593e1287d2e5e1099922baffd447d3cad1f491df86520615befab47f5a5673382a79dd722a07', '2022-10-19 01:03:56', 0),
(2, 'George', 'Marh', 'george', 'george@gmail.com', 'ee42ff1b20dade8ed6cdfbf0a4bb311090d1ee5e4da04cdf02e7efcf620d1ee06ec65898d2eaef72e13e22ccb6b6680302f9ff81ff396df78ad7169aa18df552', '2022-10-19 01:07:02', 0),
(3, 'George', 'Marh', 'george', 'george@gmail.com', 'ee42ff1b20dade8ed6cdfbf0a4bb311090d1ee5e4da04cdf02e7efcf620d1ee06ec65898d2eaef72e13e22ccb6b6680302f9ff81ff396df78ad7169aa18df552', '2022-10-19 01:07:02', 0),
(4, 'George', 'Marchenko', 'george123', 'georgeee@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '2022-10-20 18:20:45', 0),
(5, 'Jose', 'Yanes', 'jose', 'jose@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '2022-10-20 22:55:06', 0),
(6, 'Emilio', 'Baston', 'embaston', 'embaston@embaston.com', '39aef234da63b52dcd36c4110eef838857a6c4b01416af165bdc593e1287d2e5e1099922baffd447d3cad1f491df86520615befab47f5a5673382a79dd722a07', '2022-10-20 23:18:53', 0),
(7, 'Emilio', 'Baston', 'embaston4', 'embaston4@embaston.com', '39aef234da63b52dcd36c4110eef838857a6c4b01416af165bdc593e1287d2e5e1099922baffd447d3cad1f491df86520615befab47f5a5673382a79dd722a07', '2022-10-20 23:19:42', 0),
(8, 'Teacher', 'Teacher', 'teacher', 'teacher@gmail.com', '50ecc45020be014e68d714cd076007e84a9621d9a5e589a916e45273014830b399d143a57f525554bfe9e751d97fe0fa884dbdea7b07721723b4eff39e9d28ad', '2022-10-23 23:14:30', 0),
(9, 'Admin', 'Admin', 'admin', 'admin@gmail.com', '58b5444cf1b6253a4317fe12daff411a78bda0a95279b1d5768ebf5ca60829e78da944e8a9160a0b6d428cb213e813525a72650dac67b88879394ff624da482f', '2022-10-23 23:15:08', 1),
(10, 'Joe', 'Doe', 'joedoe', 'joedoe@gmail.com', '39aef234da63b52dcd36c4110eef838857a6c4b01416af165bdc593e1287d2e5e1099922baffd447d3cad1f491df86520615befab47f5a5673382a79dd722a07', '2022-10-24 11:58:46', 0),
(11, 'Sia', 'Aklsfnlaksf', 'sia', 'sia@gmail.com', '39aef234da63b52dcd36c4110eef838857a6c4b01416af165bdc593e1287d2e5e1099922baffd447d3cad1f491df86520615befab47f5a5673382a79dd722a07', '2022-10-25 11:37:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AnsweredAssessmentQuestions`
--
ALTER TABLE `AnsweredAssessmentQuestions`
  ADD PRIMARY KEY (`answeredQuestionId`);

--
-- Indexes for table `AssessmentQuestions`
--
ALTER TABLE `AssessmentQuestions`
  ADD PRIMARY KEY (`questionId`),
  ADD KEY `ForeignKey (CourseContent.contentId)` (`contentId`);

--
-- Indexes for table `CourseContents`
--
ALTER TABLE `CourseContents`
  ADD PRIMARY KEY (`contentId`),
  ADD KEY `ForeignKey (ExistingCourses.courseId)` (`courseId`);

--
-- Indexes for table `CourseMaterial`
--
ALTER TABLE `CourseMaterial`
  ADD PRIMARY KEY (`materialId`),
  ADD KEY `ForeignKey (CourseContent.contentId)` (`contentId`);

--
-- Indexes for table `CourseProgress`
--
ALTER TABLE `CourseProgress`
  ADD PRIMARY KEY (`progressId`);

--
-- Indexes for table `EnrolledCourses`
--
ALTER TABLE `EnrolledCourses`
  ADD PRIMARY KEY (`enrolledCourseId`),
  ADD KEY `ForeignKey (Users.userId)` (`userId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `ExistingCourses`
--
ALTER TABLE `ExistingCourses`
  ADD PRIMARY KEY (`courseId`),
  ADD UNIQUE KEY `courseCode` (`courseCode`),
  ADD KEY `users.userId` (`userId`);

--
-- Indexes for table `GradedAssessmentQuestions`
--
ALTER TABLE `GradedAssessmentQuestions`
  ADD PRIMARY KEY (`gradedQuestionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AnsweredAssessmentQuestions`
--
ALTER TABLE `AnsweredAssessmentQuestions`
  MODIFY `answeredQuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `AssessmentQuestions`
--
ALTER TABLE `AssessmentQuestions`
  MODIFY `questionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CourseContents`
--
ALTER TABLE `CourseContents`
  MODIFY `contentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CourseMaterial`
--
ALTER TABLE `CourseMaterial`
  MODIFY `materialId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `CourseProgress`
--
ALTER TABLE `CourseProgress`
  MODIFY `progressId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ExistingCourses`
--
ALTER TABLE `ExistingCourses`
  MODIFY `courseId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `GradedAssessmentQuestions`
--
ALTER TABLE `GradedAssessmentQuestions`
  MODIFY `gradedQuestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AssessmentQuestions`
--
ALTER TABLE `AssessmentQuestions`
  ADD CONSTRAINT `(CourseContent.contentId)` FOREIGN KEY (`contentId`) REFERENCES `CourseContents` (`contentId`);

--
-- Constraints for table `CourseContents`
--
ALTER TABLE `CourseContents`
  ADD CONSTRAINT `ForeignKey (ExistingCourses.courseId)` FOREIGN KEY (`courseId`) REFERENCES `ExistingCourses` (`courseId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CourseMaterial`
--
ALTER TABLE `CourseMaterial`
  ADD CONSTRAINT `ForeignKey (CourseContent.contentId)` FOREIGN KEY (`contentId`) REFERENCES `CourseContents` (`contentId`);

--
-- Constraints for table `ExistingCourses`
--
ALTER TABLE `ExistingCourses`
  ADD CONSTRAINT `Course Teacher Mapping` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
