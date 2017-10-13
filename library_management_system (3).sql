-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2017 at 06:10 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`) VALUES
('Harman'),
('Mohit');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ISBN` char(14) NOT NULL,
  `Author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ISBN`, `Author`) VALUES
('0121', 'Sarah Harris'),
('01210', 'Randall D. Knight'),
('01211', 'George B. Thomas Jr'),
('01212', 'Joel R. Hass'),
('01213', 'Maurice D. Weir'),
('01214', 'John D. Cutnell'),
('01214', 'Kenneth W. Johnson'),
('0122', 'David Harris'),
('0123', 'David A. Patterson'),
('0124', 'John L. Hennessy'),
('0125', 'David A. Patterson'),
('0126', 'John L. Hennessy'),
('0127', 'J. Noland White'),
('0127', 'Saundra K. Ciccarelli'),
('0128', 'Hugh D. Young'),
('0129', 'Roger A. Freedman'),
('0596802358', 'Philipp K. Janert'),
('099040207X', 'Mr. Martin Holzke'),
('099040207X', 'Mr. Tom Stachowitz'),
('1285057090', 'Bruce H. Edwards'),
('1285057090', 'Ron Larson'),
('1429237198', 'Daniel L. Schacter'),
('1429237198', 'Daniel T. Gilbert'),
('1429261781', 'David G. Myers'),
('1449600069', 'Julia Lobur'),
('1449600069', 'Linda Null'),
('1452257876', 'A. Michael Huberman'),
('1452257876', 'Matthew B. Miles'),
('1590597699', 'Clare Churcher');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Cost` decimal(5,2) NOT NULL,
  `IsReserved` tinyint(1) NOT NULL,
  `Edition` int(11) NOT NULL,
  `Publisher` varchar(30) NOT NULL,
  `CopyYr` decimal(4,0) NOT NULL,
  `ShelfID` int(11) DEFAULT NULL,
  `SubName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Cost`, `IsReserved`, `Edition`, `Publisher`, `CopyYr`, `ShelfID`, `SubName`) VALUES
('000', 'Computer Architecture: A Quantitative Approach ', '24.95', 0, 6, 'Morgan Kaufmann', '2016', 223, 'Computer Architecture'),
('000178', 'Introducation of Java', '20.00', 1, 4, 'David Khurana', '2012', 456, 'java'),
('0123704901', 'Computer Architecture: A Quantitative Approach', '24.95', 0, 4, 'Morgan Kaufmann', '2006', 321, 'Computer Architecture'),
('0123944244', 'Digital Design and Computer Architecture', '52.57', 0, 2, 'Morgan Kaufmann', '2012', 311, 'Computer Architecture'),
('0124077269', 'Computer Organization and Design', '75.74', 0, 5, 'Morgan Kaufmann', '2013', 312, 'Computer Architecture'),
('0205973361', 'Psychology', '158.53', 0, 4, 'Pearson', '2014', 232, 'Psychology'),
('0321696867', ' Physics', '225.76', 0, 13, 'Addison-Wesley', '2011', 211, 'Physics'),
('0321740904', ' Modern Physics', '228.16', 1, 3, 'Addison-Wesley', '2012', 212, 'Physics'),
('0321884078', 'Thomas\' Calculus', '198.89', 0, 13, 'Pearson', '2013', 111, 'Calculus'),
('0470879521', 'Physics', '209.38', 0, 9, 'John Wiley and Sons', '2012', 212, 'Physics'),
('0596802358', 'Data Analysis', '26.69', 0, 1, 'O\'Reilly Media', '2010', 131, 'Data Science'),
('099040207X', 'SQL Database for Beginners', '22.49', 0, 1, 'LearnToProgram, Incorporated ', '2014', 121, 'Data Science'),
('12345', 'Introduction of php', '20.00', 0, 4, 'J.K ', '2017', 88, 'php'),
('1285057090', 'Calculus', '245.84', 1, 10, 'Cengage Learning', '2013', 112, 'Calculus'),
('1429237198', 'Psychology ', '159.48', 1, 2, 'Worth Publishers', '2010', 231, 'Psychology'),
('1429261781', 'Psychology', '152.54', 0, 10, 'Worth Publishers', '2011', 222, 'Psychology');

-- --------------------------------------------------------

--
-- Table structure for table `bookcopy`
--

CREATE TABLE `bookcopy` (
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IsChecked` tinyint(1) NOT NULL DEFAULT '0',
  `IsHold` tinyint(1) NOT NULL DEFAULT '0',
  `IsDamaged` tinyint(1) NOT NULL DEFAULT '0',
  `FuRequester` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookcopy`
--

INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES
('000', 1, 1, 0, 0, 'rohan'),
('012', 2, 0, 0, 1, NULL),
('013', 3, 0, 1, 0, 'harpreet'),
('014', 1, 1, 0, 0, NULL),
('015', 2, 0, 1, 0, NULL),
('016', 1, 1, 0, 0, 'gagan');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `FloorID` int(11) NOT NULL,
  `NumAssistant` int(11) NOT NULL,
  `NumCopier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`FloorID`, `NumAssistant`, `NumCopier`) VALUES
(1, 2, 2),
(2, 3, 3),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `Username` varchar(15) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IssueID` int(4) NOT NULL,
  `ExtenDate` date DEFAULT NULL,
  `IssueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `NumExten` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`Username`, `ISBN`, `CopyID`, `IssueID`, `ExtenDate`, `IssueDate`, `ReturnDate`, `NumExten`) VALUES
('Gurpreet', '000', 0, 153, NULL, '2017-10-12', '2017-10-26', 0),
('Harman', '0123704901', 0, 156, NULL, '2017-10-13', '2017-10-27', 0),
('Harman', '12345', 0, 155, NULL, '2017-10-13', '2017-10-27', 0),
('harpreet', '014', 7, 82, '2015-02-05', '2015-02-05', '2015-02-19', 0),
('himanshu', '000', 0, 154, NULL, '2017-10-12', '2017-10-26', 0),
('Jaspreet', '000', 0, 151, NULL, '2017-10-11', '2017-10-25', 0),
('jaspreet', '012', 1, 45, '2015-01-03', '2015-01-03', '2015-01-17', 0),
('Joban', '000', 0, 152, NULL, '2017-10-12', '2017-10-26', 0),
('lovepal', '015', 2, 143, NULL, '2015-04-18', '2015-05-02', 0),
('prabh', '013', 3, 150, NULL, '2015-04-19', '2015-05-03', 0),
('rohan', '000', 1, 115, '2015-04-13', '2015-03-31', '2015-04-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `SName` varchar(30) NOT NULL,
  `Keyword` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`SName`, `Keyword`) VALUES
('Calculus', 'Convergent'),
('Calculus', 'Derivative'),
('Calculus', 'Differential Equation'),
('Calculus', 'Integral'),
('Computer Architecture', 'Assembly'),
('Computer Architecture', 'Cache'),
('Computer Architecture', 'Instruction Set'),
('Computer Architecture', 'Memory'),
('Data Science', 'Cloud Computing'),
('Data Science', 'Computer Vision'),
('Data Science', 'Database'),
('Data Science', 'Statistics'),
('Physics', 'Electron'),
('Physics', 'Photoelectric Effect'),
('Physics', 'Quantum Physics'),
('Physics', 'Relativity'),
('Psychology', 'Cognitive'),
('Psychology', 'Neuropsychology');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `ShelfID` int(11) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `AisleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`ShelfID`, `FloorID`, `AisleID`) VALUES
(111, 1, 11),
(112, 1, 11),
(121, 1, 12),
(122, 1, 12),
(131, 1, 13),
(132, 1, 13),
(211, 2, 21),
(212, 2, 21),
(221, 2, 22),
(222, 2, 22),
(231, 2, 23),
(232, 2, 23),
(311, 3, 31),
(312, 3, 31),
(321, 3, 32),
(322, 3, 32),
(331, 3, 33),
(332, 3, 33);

-- --------------------------------------------------------

--
-- Table structure for table `student_faculty`
--

CREATE TABLE `student_faculty` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Dept` varchar(50) DEFAULT NULL,
  `Fine` decimal(10,0) NOT NULL,
  `IsDebarred` tinyint(4) NOT NULL,
  `IsFaculty` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_faculty`
--

INSERT INTO `student_faculty` (`Username`, `Name`, `DOB`, `Email`, `Gender`, `Address`, `Dept`, `Fine`, `IsDebarred`, `IsFaculty`) VALUES
('Amandeep', 'Aman Kaur', '2017-10-04', 'aman@gmail.com', 'F', '123,sliver strret\r\nBrampton', 'College of Computing', '0', 0, 1),
('Baljeet', 'Baljeet Kaur', '1989-10-10', 'bal@yahoo.com', 'F', '45,creditstone rd\r\nBrampton On', 'Medical college', '0', 0, 1),
('Gurpreet', 'Gurpreet Singh', '2017-10-10', 'mgopy@outlook.com', 'M', '118 Letty ave', 'College of Computing', '0', 0, 0),
('Harman', 'Harman Singh', '0000-00-00', 'harman@outlook.com', 'M', '118 Letty ave', 'Mehncial Engineering', '0', 0, 1),
('Harpreet', 'Harpreet Kaur', '0000-00-00', 'har@outlook.com', 'F', '71 creditstone rd', 'School of Electrical & Computer Engineering', '0', 0, 0),
('Himanshu', 'Himanshu Singhal', '2013-10-01', 'himanshu@outlook.com', 'M', '1233 lertty', 'College of Computing', '0', 0, 1),
('Jaspreet', 'Jaspreet kaur', '0000-00-00', 'jas123@gmail.com', 'F', '21 main street brampton', 'Computer Science', '0', 0, 0),
('Joban', 'Joban Singh', '2017-10-09', 'riar.joban@gmail.com', 'M', '71 creditstone rd', 'School of Industrial & Systems Engineering', '0', 0, 1),
('Lovepal', 'Lovepal Singh', '1996-01-26', 'love@outlook.com', 'M', '118 Letty ave', 'School of Electrical & Computer Engineering', '0', 0, 0),
('Lovepreet', 'Lovepreet Kaur', '2017-10-01', 'love@outlook.com', 'F', '118 Letty ave', 'College of Computing', '0', 0, 1),
('Rohan', 'Rohan Sharma', '0000-00-00', 'rohan@outlook.com', 'M', '71 creditstone rd', '', '0', 0, 0),
('rupinder', 'Rupinder Kaur', '2017-10-02', 'rupi@gmail.com', 'F', '118 Letty ave', 'Medical college', '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubName` varchar(30) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `NumJournal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubName`, `FloorID`, `NumJournal`) VALUES
('Calculus', 1, 23),
('Computer Architecture', 3, 20),
('Data Science', 1, 32),
('Physics', 2, 14),
('Psychology', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`) VALUES
('Amandeep', '12345'),
('Baljeet', 'bal123'),
('Gurpreet', '1234'),
('Harman', 'man123'),
('Harpreet', 'harpreet90'),
('Himanshu', 'himanshu'),
('Jaspreet', 'jass123'),
('Joban', '987'),
('Lovepal', '890lovepal'),
('Lovepreet', '12345'),
('Manpreet', 'manuu'),
('manu', '123'),
('Mohit', 'mohit'),
('Prabh', 'prabh1234'),
('Rohan', '123rohan'),
('rupinder', 'rupi1222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ISBN`,`Author`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `ShelfID` (`ShelfID`),
  ADD KEY `SubName` (`SubName`);

--
-- Indexes for table `bookcopy`
--
ALTER TABLE `bookcopy`
  ADD PRIMARY KEY (`ISBN`,`CopyID`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`FloorID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`Username`,`ISBN`,`CopyID`),
  ADD UNIQUE KEY `IssueID` (`IssueID`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `issue_ibfk_2` (`ISBN`,`CopyID`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`SName`,`Keyword`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`ShelfID`),
  ADD KEY `FloorID` (`FloorID`);

--
-- Indexes for table `student_faculty`
--
ALTER TABLE `student_faculty`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubName`),
  ADD KEY `FloorID` (`FloorID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
