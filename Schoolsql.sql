-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2022 at 06:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `a_id` int(11) NOT NULL,
  `value` varchar(50) NOT NULL,
  `st_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`a_id`, `value`, `st_id`, `date`) VALUES
(1, 'Present', 0, '17-02-22'),
(2, 'Absent', 1000, '17-02-22'),
(3, 'Present', 1001, '17-02-22'),
(4, 'Present', 1004, '17-02-22'),
(5, 'Present', 1005, '17-02-22'),
(6, 'Present', 1005, '15-02-22'),
(7, 'Present', 0, '18-02-22'),
(8, 'Absent', 1000, '18-02-22'),
(9, 'Absent', 1005, '18-02-22'),
(45, 'Present', 1004, '18-02-22'),
(46, 'Present', 0, '19-02-22'),
(47, 'Absent', 1000, '19-02-22'),
(48, 'Absent', 0, '20-02-22'),
(49, 'Present', 1000, '20-02-22'),
(50, 'Present', 1006, '20-02-22'),
(51, 'Absent', 1011, '20-02-22'),
(52, 'Present', 1015, '20-02-22'),
(53, 'Present', 0, '22-02-22'),
(54, 'Absent', 1000, '22-02-22'),
(55, 'Present', 1006, '22-02-22'),
(56, 'Present', 1011, '22-02-22'),
(57, 'Present', 1015, '22-02-22'),
(58, 'Present', 0, '12-04-22'),
(59, 'Absent', 1006, '12-04-22'),
(60, 'Present', 1017, '12-04-22'),
(61, 'Present', 0, '13-04-22'),
(62, 'Absent', 1006, '13-04-22'),
(63, 'Absent', 1017, '13-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `cstd` int(11) NOT NULL,
  `cteacher` char(15) NOT NULL,
  `section` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `cstd`, `cteacher`, `section`) VALUES
(201, 10, 'ramesh kumar', 'A'),
(202, 10, 'Suresh Kumar', 'B'),
(203, 12, 'sameer shah', 'A'),
(204, 12, 'sadhna singh', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `new_name` varchar(255) NOT NULL,
  `share` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`id`, `name`, `new_name`, `share`) VALUES
(0, 'ebook.jpg', '0303221646320213ebook.jpg', 'http://localhost/project/download.php?id=1'),
(0, 'Assignment (1).pdf', '0303221646321134Assignment (1).pdf', 'http://localhost/project/download.php?id=4'),
(0, 'maths class  9 pt3.pdf', '0303221646322951maths class  9 pt3.pdf', 'http://localhost/project/download.php?id=5'),
(0, 'maths class  9 pt3.pdf', '0303221646323292maths class  9 pt3.pdf', 'http://localhost/project/download.php?id=6'),
(0, 'PT3 Class IX (2021-2022)-Final draft.pdf', '0303221646323548PT3 Class IX (2021-2022)-Final draft.pdf', 'http://localhost/project/download.php?id=7'),
(0, 'DATE SHEET FOR DEC EXAM.pdf', '0303221646327580DATE SHEET FOR DEC EXAM.pdf', 'http://localhost/project/download.php?id=8'),
(0, 'ENGLISH ART INTEGRATION.pptm', '0603221646551694ENGLISH ART INTEGRATION.pptm', 'http://localhost/project/download.php?id=10'),
(0, 'tt.jpg', '0603221646552989tt.jpg', ''),
(0, 'result.jpg', '0603221646553563result.jpg', 'http://localhost/project/download.php?id=33'),
(0, 'ENGLISH ART INTEGRATION.pptm', '0603221646553947ENGLISH ART INTEGRATION.pptm', ''),
(0, 'photo_2021-10-04_14-18-23.jpg', '0603221646573301photo_2021-10-04_14-18-23.jpg', ''),
(0, 'photo_2021-10-04_14-18-23.jpg', '0603221646573420photo_2021-10-04_14-18-23.jpg', ''),
(0, 'photo_2021-10-04_14-18-58.jpg', '0603221646573614photo_2021-10-04_14-18-58.jpg', ''),
(0, 'photo_2021-10-04_14-18-58.jpg', '0603221646573649photo_2021-10-04_14-18-58.jpg', ''),
(0, 'photo_2021-10-04_14-18-58.jpg', '0603221646573668photo_2021-10-04_14-18-58.jpg', ''),
(0, 'photo_2021-10-04_14-18-58.jpg', '0603221646573710photo_2021-10-04_14-18-58.jpg', ''),
(0, 'photo_2021-10-04_14-18-50.jpg', '0603221646573957photo_2021-10-04_14-18-50.jpg', ''),
(0, 'school_logo.png', '0603221646575416school_logo.png', 'http://localhost/project/download.php?id=31'),
(0, 'teacher.jpg', '0603221646583430teacher.jpg', ''),
(0, 'result.jpg', '0603221646583460result.jpg', 'http://localhost/project/download.php?id=33'),
(0, 'attendence.jpg', '0603221646583577attendence.jpg', 'http://localhost/project/download.php?id=34');

-- --------------------------------------------------------

--
-- Table structure for table `ebook1`
--

CREATE TABLE `ebook1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `new_name` varchar(255) NOT NULL,
  `share` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook1`
--

INSERT INTO `ebook1` (`id`, `name`, `new_name`, `share`) VALUES
(1, 'tt.jpg', '0603221646584071tt.jpg', 'http://localhost/project/download.php?id=1'),
(2, 'attendence.jpg', '0603221646584285attendence.jpg', 'http://localhost/project/download.php?id=2'),
(3, 'Assignment (1) (1).pdf', '1304221649826549Assignment (1) (1).pdf', 'http://localhost/project/download.php?id=3');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(11) NOT NULL,
  `stuid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `postdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`rid`, `stuid`, `classid`, `subid`, `marks`, `postdate`, `updatedate`) VALUES
(2, 0, 201, 301, 80, '2022-03-10 13:56:53', '2022-03-10 13:56:53'),
(3, 1006, 201, 301, 87, '2022-03-13 13:53:07', '2022-03-13 13:53:07'),
(4, 1000, 202, 305, 40, '2022-03-10 15:37:59', '2022-03-10 15:37:59'),
(5, 1000, 202, 302, 43, '2022-03-10 15:37:59', '2022-03-10 15:37:59'),
(9, 1019, 202, 305, 100, '2022-04-13 05:36:29', '2022-04-13 05:36:29'),
(10, 1019, 202, 302, 65, '2022-04-13 05:36:30', '2022-04-13 05:36:30'),
(11, 1004, 203, 306, 94, '2022-04-13 04:26:33', '2022-04-13 04:26:33'),
(12, 1018, 204, 307, 82, '2022-04-13 05:06:10', '2022-04-13 05:06:10'),
(13, 1011, 202, 305, 0, '2022-04-13 11:37:26', NULL),
(14, 1011, 202, 302, 0, '2022-04-13 11:37:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sname` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sclass` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `clid` int(11) NOT NULL,
  `section` varchar(1) NOT NULL,
  `mno` bigint(8) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `uid`, `sname`, `email`, `sclass`, `password`, `clid`, `section`, `mno`, `gender`, `dob`) VALUES
(1, 0, 'aleena philip', 'aleena.philip@gmail.com', 10, '$2y$10$ASGI.n4BtAfxfghoYtbuO.TZn4JMO6kn7fL8eVLOAILLR78SYbFja', 201, 'A', 8120982434, 'female', '1997-09-13'),
(2, 1000, 'prerna shinde', 'prerna.shinde@gmail.com', 10, '$2y$10$lroFZr7TCQcJdGCdfD6czOuBouk6U/Ibnj9swWM1jXr2NRj1qiocK', 202, 'B', 9132450983, 'female', '2001-12-10'),
(3, 1001, 'aisha', 'aisha123@gmail.com', 12, '$2y$10$v5ljZLVrCuaXwx5hxFsFoOXK0oOMuB0VZBT5jvp.FdLqw5xVi007', 203, 'A', 999234764, 'female', '2002-10-10'),
(4, 1004, 'anshika', '12.anshika28@gmail.com', 12, '$2y$10$MrVIs3AC9UNHSTwUcwZSluPR.7HJ9ZOAkC9ck8MaLQrIFyMHsXkDO', 203, 'A', 8901265091, 'female', '2002-05-12'),
(5, 1005, 'yogita singhal', 'yogita.12.singh@gmail.com', 12, '$2y$10$HKyuAjx0yEXam0vb612SzeHyq6FK7k1bFlRij4QUtpXXnL9c8k/K6', 204, 'B', 7892345621, 'female', '1999-12-09'),
(6, 1006, 'himanshu singh', 'himans.jklm@gmail.com', 10, '$2y$10$S.pbcw5bK28WkD8WGTxUkueg2krlgjcUtriW3Ma2EIpNoTAQfOSUy', 201, 'A', 8782345637, 'male', '1999-12-23'),
(7, 1007, 'nihal pandey', 'nihal.123@gmail.com', 12, '$2y$10$jLB95c8SP7g5RtLKOX06l.bynE.JwtmnCDb157bxJvYBqRAis6olO', 204, 'b', 8936284730, 'male', '1998-05-08'),
(8, 1009, 'Divyansh', 'Divyansh.saha@gmail.com', 12, '$2y$10$wNCSNRDGktRjbtxlrJv6P.jAngIvc0klBIEmfqJcyM2FDCGTLJ94.', 203, 'A', 9982663409, 'male', '2000-08-19'),
(9, 1011, 'Aakash kumar', 'akaash.kumar@gmail.com', 10, '$2y$10$CGYF4FEaZCL75dNpsfMn4eZPhzQ9KtC88NSoE/e2pNhqc3E8ErqoO', 202, 'b', 9891236783, 'male', '2000-11-11'),
(10, 1012, 'siraj', 'siraj.mohd@gmail.com', 12, '$2y$10$cxSG1B6qijYwbK.srzdbMOCEPhwUbMXm2Ui3TvH8u5fj6Z/2D.6z2', 204, 'b', 9982345672, 'male', '2002-09-18'),
(12, 1015, 'alisha', 'alisha1122@gmail.com', 10, '$2y$10$CnavJNVK5mgQjcJY2Zim5uvZbVhfoDKKR95Mfru5fKZddbWha9O6i', 202, 'b', 9912768345, 'female', '2001-03-04'),
(13, 1017, 'harpreet kaur', 'harpreet123@gmail.com', 10, '$2y$10$FCgh.wH.tCZLgF0Bo6FaLukrViXAM0KYcHnWPNeLwIPcPt0m9ZDLa', 201, 'a', 9807365245, 'female', '1998-06-17'),
(14, 1018, 'avinash sigh', 'avi123nash@gmail.com', 12, '$2y$10$CeP0UaBrrul28ayUJ1g11uiiQY7PxUdJcPd24nJvmYN1FEKuc7mp6', 204, 'B', 9807765245, 'male', '2003-10-15'),
(25, 1019, 'jigyasa kumari', 'jigyasa09@gmail.com', 10, '$2y$10$RzFkARjkXySCMJStl9n1veyCqxJ9MyCD2TQvyZSkVJ16IG2DpZdsu', 202, 'B', 9856710934, 'female', '2008-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sbid` int(11) NOT NULL,
  `subjname` varchar(255) NOT NULL,
  `subteacher` varchar(255) NOT NULL,
  `t_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sbid`, `subjname`, `subteacher`, `t_id`, `c_id`) VALUES
(301, 'math', 'ramesh kumar', 101, 201),
(302, 'physics', 'suresh kumar', 102, 202),
(305, 'geo', 'Suresh kumar', 102, 202),
(306, 'science', 'sameer shah', 104, 203),
(307, 'civics', 'fayed lal', 107, 204);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `tname` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `tname`, `email`, `password`) VALUES
(101, 'ramesh kumar', 'ramesh123@gmail.com', 'ramesh12'),
(102, 'Suresh Kumar', 'suresh.kumar@gmail.com', 'sureshk12umar34'),
(103, 'Sadhna singh', 'sadhnam12@gmail.com', 'sad12_0na'),
(104, 'sameer shah', 'sameer.shah@yaaho.com', 'sameer12.singh23'),
(107, 'fayed lal', 'harpreet3423@gmail.com', 'Asghn12312');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `student_att` (`st_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ebook1`
--
ALTER TABLE `ebook1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `students_id` (`stuid`),
  ADD KEY `subje_id` (`subid`),
  ADD KEY ` cl_id` (`classid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sbid`),
  ADD KEY `teacher_id` (`t_id`),
  ADD KEY `class_id` (`c_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `ebook1`
--
ALTER TABLE `ebook1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `student_att` FOREIGN KEY (`st_id`) REFERENCES `student` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT ` cl_id` FOREIGN KEY (`classid`) REFERENCES `class` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_id` FOREIGN KEY (`stuid`) REFERENCES `student` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subje_id` FOREIGN KEY (`subid`) REFERENCES `subject` (`sbid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`c_id`) REFERENCES `class` (`cid`),
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`tid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
