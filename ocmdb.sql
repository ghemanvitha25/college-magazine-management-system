-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 07:48 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 5689784589, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-01-21 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Auto Magazine', '2020-09-03 12:29:54'),
(2, 'Business & Finance Magazines', '2020-08-25 12:13:16'),
(3, 'Children Magazines', '2020-08-25 12:13:27'),
(4, 'Computer & Electronics Magazines', '2020-08-25 12:13:47'),
(5, 'Cooking, Food, & Bev Magazines', '2020-08-25 12:13:59'),
(6, 'Craft & Hobbies Magazines', '2020-08-25 12:14:10'),
(7, 'Entertainment & TV Magazines', '2020-08-25 12:14:25'),
(9, 'Test', '2020-11-28 18:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `subject`, `comment`, `postingDate`, `status`) VALUES
(1, '1', 'Gaurav Bisht', 'gaurav@gmail.com', 'Test Sample', 'Nice Magazine', '2020-09-15 07:12:11', 1),
(3, '1', 'Radhika Kashayp', 'rad@gmai.com', 'Greeat Book', 'jgjhgsdfjiauwryeiuryhfkdnsmjhdsjkfhtiuserbvirweu', '2020-09-16 05:52:00', 0),
(4, '3', 'Manshi Ahuja', 'mansi@gmail.com', 'Nice Book', 'It helps lots to children\r\n', '2020-09-16 05:53:16', 1),
(6, '2', 'Anuj', 'anuj@gmail.com', 'Test', 'Test Comment', '2020-11-28 18:34:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmagazine`
--

CREATE TABLE `tblmagazine` (
  `ID` int(10) NOT NULL,
  `UserID` int(5) DEFAULT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `CategoryID` int(5) DEFAULT NULL,
  `Publisher` varchar(200) DEFAULT NULL,
  `Language` varchar(200) DEFAULT NULL,
  `Frequency` varchar(200) DEFAULT NULL,
  `MagazineDescription` mediumtext DEFAULT NULL,
  `CoverImage` varchar(250) DEFAULT NULL,
  `UploadMagazine` varchar(250) DEFAULT NULL,
  `PostDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmagazine`
--

INSERT INTO `tblmagazine` (`ID`, `UserID`, `Title`, `CategoryID`, `Publisher`, `Language`, `Frequency`, `MagazineDescription`, `CoverImage`, `UploadMagazine`, `PostDate`, `Status`, `Remark`, `RemarkDate`) VALUES
(1, 1, 'India Todays', 2, 'India Todays Group', 'English', 'Weekly', 'A magazine is a publication with a paper cover which is issued regularly, usually every week or every month, and which contains articles, stories, photographs, and advertisements. Her face is on the cover of a dozen or more magazines. ... In an automatic gun, the magazine is the part that contains the bullets.', '156005c5baf40ff51a327f1c34f2975b1600326855.jpg', '8aaabcabe1a68a68d44f2a877f9176cd1599720855.pdf', '2020-09-17 07:14:15', 'Published', 'Your Magazine Has been published', '2020-09-17 07:14:15'),
(2, 1, 'Fashion Bonanza', 7, 'Fashion Group', 'English,Hindi', 'Monthly', 'A magazine is a publication with a paper cover which is issued regularly, usually every week or every month, and which contains articles, stories, photographs, and advertisements. Her face is on the cover of a dozen or more magazines. ... In an automatic gun, the magazine is the part that contains the bullets.', 'f6963285525cfdfc0ed1035e3716936f1599720969.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600325801.pdf', '2020-09-17 07:31:14', 'Published', 'Published', '2020-09-17 07:31:14'),
(3, 2, 'Children Craft', 3, 'Child Academy', 'English', 'Quarterly', 'An online magazine is a magazine published on the Internet, through bulletin board systems and other forms of public computer networks. One of the first magazines to convert from a print magazine format to being online only was the computer magazine Datamation.', 'b9fb9d37bdf15a699bc071ce49baea531599721607.jpg', '8aaabcabe1a68a68d44f2a877f9176cd1599721607.pdf', '2020-11-28 06:06:22', 'Published', 'Published', '2020-11-28 06:06:22'),
(4, 2, 'gfgret', 2, 'retert3', 'kjhjkhh', 'dftgrekljuo', 'jhgugujgbfj', '156005c5baf40ff51a327f1c34f2975b1599722826.jpg', '8aaabcabe1a68a68d44f2a877f9176cd1599722826.pdf', '2020-09-14 12:01:35', 'Published', 'Published', '2020-09-14 12:01:35'),
(5, 3, 'Mens Health', 5, 'Mens Group', 'Hindi and English', 'Montly', 'Infuriatingly, it often seems like, no matter what you do, your power to influence this clock is limited. Well, prepare for another sigh (or was that a yawn?) of exasperation. New research revealed that men\'s clock\'s are hard-wired to be around two hours behind women\'s. Early risers are often left to blearily battle against nature and, as a result, often search for a buzz in all the wrong places. We\'re looking at you, man clutching a can of fluorescent fizz during his morning commute.', 'cff8ad28cf40ebf4fbdd383fe546098d1600327260.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600327260.pdf', '2020-09-17 07:31:26', 'Published', 'Published', '2020-09-17 07:31:26'),
(6, 3, 'Child Care', 3, 'Child Association Group', 'Hindi, English, Marathi', 'Montly', 'Child care, otherwise known as day care, is the care and supervision of a child or multiple children at a time, whose ages range from two weeks to twenty years. Child care is the action or skill of looking after children by a day-care center, nannies, babysitter, teachers or other providers.', '74375080377499ab76dad37484ee7f151600327373.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600327373.pdf', '2020-09-17 07:31:40', 'Published', 'Published', '2020-09-17 07:31:40'),
(7, 3, 'Prgenancy', 7, 'Healthcare group', 'English', 'Quarterly', 'Whatever you want to know about getting pregnant, being pregnant or caring for your new baby, you should find it here.', '19c10f4e66067da4b5eb1dac874e46721600327502.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600327502.pdf', '2020-09-17 07:31:52', 'Published', 'Published', '2020-09-17 07:31:52'),
(8, 1, 'Pregnancy Healthcare Checkup', 2, 'morgan group', 'English', 'Monthly', 'Whatever you want to know about getting pregnant, being pregnant or caring for your new baby, you should find it here.', '19c10f4e66067da4b5eb1dac874e46721600327649.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600327649.pdf', '2020-09-17 07:32:03', 'Published', 'Published', '2020-09-17 07:32:03'),
(9, 1, 'Todays Fashion Bonanza', 2, 'Today gropu', 'Hindi', 'Montly', 'Fashion also alludes to the way in which things are made; to fashion something is to make it in a particular form. Most commonly, fashion is defined as the prevailing style of dress or behavior at any given time, with the strong implication that fashion is characterized by change.', '1e6ae4ada992769567b71815f124fac51600327817.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600327817.pdf', '2020-09-17 07:32:15', 'Published', 'Published', '2020-09-17 07:32:15'),
(10, 1, 'Stepping out for essential', 5, 'Home décor group', 'English', 'Monthly', 'Leaving Your Comfort Zone Teaches You to Deal With Change But by regularly pushing ourselves outside our comfort zone, we can learn to deal with change so that when other big changes pop up in life, we\'re more prepared to deal with them.', 'b9fb9d37bdf15a699bc071ce49baea531600669528.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600669528.pdf', '2020-09-21 06:29:17', 'Not Published', 'Content have some copyright', '2020-09-21 06:29:17'),
(11, 1, 'lhkhljljlkhkjdhfkjshdjk', 2, 'greartgry', 'hdrtryutduiti', 'kytkiyui', 'ktykukyioii9o', 'b9fb9d37bdf15a699bc071ce49baea531600669567.jpg', '2c86e2aa7eb4cb4db70379e28fab9b521600669567.pdf', '2020-09-21 06:26:07', NULL, NULL, NULL),
(12, 4, 'Test Mag', 1, 'ANUJ Publications', 'English', 'Weekly', 'This is for testing Purpose', 'a04ed20f3f7f8fcc2d7eaed65997366e1606588687.png', '5e61e9ed045864c92566d697cf41a1291606588766.pdf', '2020-11-28 18:40:48', 'Published', 'Published', '2020-11-28 18:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', '<div class=\"head\" style=\"color: rgb(33, 37, 41); font-family: \" exo=\"\" 2\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><h4 style=\"margin-bottom: 15px; line-height: 1.2; color: rgba(0, 0, 0, 0.66); font-size: 36px;\">About us</h4></div><div class=\"content\" style=\"color: rgb(33, 37, 41); font-family: \" exo=\"\" 2\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;\"=\"\"><div class=\"row\" style=\"display: flex; flex-wrap: wrap;\"><div class=\"col-12 col-lg-12 col-md-12 col-sm-12\" style=\"width: 870px; -webkit-box-flex: 0; flex: 0 0 100%; max-width: 100%;\"><p style=\"margin-bottom: 1rem; line-height: 1.5; color: rgb(60, 60, 60);\"><span style=\"color: rgb(123, 136, 152); font-family: \" mercury=\"\" ssm=\"\" a\",=\"\" \"mercury=\"\" b\",=\"\" georgia,=\"\" times,=\"\" \"times=\"\" new=\"\" roman\",=\"\" \"microsoft=\"\" yahei=\"\" new\",=\"\" yahei\",=\"\" å¾®è½¯é›…é»‘,=\"\" å®‹ä½“,=\"\" simsun,=\"\" stxihei,=\"\" åŽæ–‡ç»†é»‘,=\"\" serif;=\"\" font-size:=\"\" 26px;=\"\" letter-spacing:=\"\" normal;\"=\"\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p></div></div></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contact Us', 'H-204, Hole Town South West,Delhi-110096,India', 'info1@gmail.com', 8529631236, '2019-10-16 10:32:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Sarita Pandey', 7978979879, 'sarita@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-07 06:45:39'),
(2, 'Rahul Khanna', 9798797987, 'rahul@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-10 07:04:23'),
(3, 'Ram', 8977987987, 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-17 07:16:43'),
(4, 'Anuj kumar', 1234567892, 'anujk@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-11-28 18:36:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmagazine`
--
ALTER TABLE `tblmagazine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblmagazine`
--
ALTER TABLE `tblmagazine`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
