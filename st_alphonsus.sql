-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 01:18 PM
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
-- Database: `st alphonsus`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class Name` varchar(10) NOT NULL,
  `Teacher ID` varchar(10) NOT NULL,
  `TA ID` varchar(20) NOT NULL,
  `Student ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class Name`, `Teacher ID`, `TA ID`, `Student ID`) VALUES
('RR', 'AUDPRR', 'TRAWRR, SARCRR', ''),
('YR1', 'ANTTYR1', 'STECYR1, EMIWYR1', ''),
('YR2', 'CONHYR2', 'SIMTYR2, YVOSYR2', ''),
('YR3', 'PIEWYR3', 'KATAYR3, UNAUYR3', ''),
('YR4', 'EVACYR4', 'BERSYR4, WENBYR4', ''),
('YR5', 'CONSYR5', 'AMYTYR5, RICKYR5', ''),
('YR6', 'VIRGYR6', 'WARCYR6, THOEYR6', '');

-- --------------------------------------------------------

--
-- Table structure for table `deputy head teachers`
--

CREATE TABLE `deputy head teachers` (
  `Deputy Head ID` varchar(7) NOT NULL,
  `School ID` varchar(10) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deputy head teachers`
--

INSERT INTO `deputy head teachers` (`Deputy Head ID`, `School ID`, `First Name`, `Last Name`) VALUES
('KATR1', 'STALPHM000', 'KATE', 'ROSS'),
('RUDM1', 'STALPHM000', 'RUDO', 'MARARA');

-- --------------------------------------------------------

--
-- Table structure for table `external contractors`
--

CREATE TABLE `external contractors` (
  `Contractor ID` varchar(10) NOT NULL,
  `Last Name` varchar(15) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Sector` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `external contractors`
--

INSERT INTO `external contractors` (`Contractor ID`, `Last Name`, `First Name`, `Sector`) VALUES
('ALEJ06', 'Jackson', 'Alexander', ''),
('CATJ11', 'Jones', 'Catherine', 'Part time teacher'),
('CHRM02', 'Mago', 'Christian', 'IT'),
('DYLW05', 'Wallace', 'Dylan', ''),
('JAKW08', 'Watson', 'Jake', ''),
('JAMR07', 'Russell', 'James', 'Roofing'),
('MATL12', 'Longby', 'Matthew ', 'Part time TA'),
('RICG01', 'Gibson', 'Richard', ''),
('RYAH10', 'Hodges', 'Ryan', ''),
('RYAI04', 'Ince', 'Ryan', '');

-- --------------------------------------------------------

--
-- Table structure for table `head teacher`
--

CREATE TABLE `head teacher` (
  `Head ID` varchar(10) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `head teacher`
--

INSERT INTO `head teacher` (`Head ID`, `First Name`, `Last Name`) VALUES
('DJ1', 'DAVID', 'JONES');

-- --------------------------------------------------------

--
-- Table structure for table `parent pairs`
--

CREATE TABLE `parent pairs` (
  `Pair ID` varchar(50) NOT NULL,
  `Parent 1 ID` varchar(15) NOT NULL,
  `Parent 2 ID` varchar(15) NOT NULL,
  `Student ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent pairs`
--

INSERT INTO `parent pairs` (`Pair ID`, `Parent 1 ID`, `Parent 2 ID`, `Student ID`) VALUES
('AALLAN01', 'ADAA001', 'ABIA002', ''),
('AALSOP01', 'ADRA003', 'ALEA004', ''),
('AWALLACE01', 'ANTW010', 'WENW011', 'ELLW077, KARW039, LUKW012, REBW062'),
('AYELCH01', 'ANDW008', 'YVOW009', ''),
('AZOUNG01', 'ALAY005', 'ZOEY006', '');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `Guardian ID` varchar(10) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last name` varchar(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone number` bigint(11) NOT NULL,
  `Student ID` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`Guardian ID`, `First Name`, `Last name`, `Address`, `Phone number`, `Student ID`) VALUES
('ABIA002', 'Abigail', 'Allan', 'Halton street, Bolton, BL3', 0, 'JACA074'),
('ADAA001', 'Adam', 'Allan', 'Halton street, Bolton, BL3', 0, 'JACA074'),
('ADRA003', 'Adrian', 'Alsop', '', 0, ''),
('ALAY005', 'Alan', 'Young', '', 0, ''),
('ALEA004', 'Alexandra', 'Alsop', '', 0, ''),
('ALEW007', 'Alexander', 'White', '', 0, ''),
('ANDW008', 'Andrew', 'Welch', '', 0, ''),
('ANTW010', 'Anthony', 'Wallace', '', 0, 'ELLW077, KARW039, LUKW012, REBW062'),
('AUSV012', 'Austin', 'Vaughan', '', 0, ''),
('BENU014', 'Benjamin', 'Underwood', '', 0, ''),
('BLAT016', 'Blake', 'Turner', '', 0, ''),
('BORR018', 'Boris', 'Reis', '', 0, ''),
('BRAS020', 'Brandon', 'Sharp', '', 0, ''),
('BRIR022', 'Brian', 'Rutherford', '', 0, ''),
('CAMR024', 'Cameron', 'Ross', '', 0, ''),
('CARR026', 'Carl', 'Randall', '', 0, ''),
('CHAP028', 'Charles', 'Peters', '', 0, ''),
('CHRP030', 'Christian', 'Parr', '', 0, ''),
('CHRP032', 'Christopher', 'Paige', '', 0, ''),
('COLO034', 'Colin', 'Ogden', '', 0, ''),
('CONN036', 'Connor', 'Newman', '', 0, ''),
('DANM038', 'Dan', 'Mitchell', '', 0, ''),
('DAVM040', 'David', 'Miller', '', 0, ''),
('DOMM042', 'Dominic', 'Mackay', '', 0, ''),
('DYLM044', 'Dylan', 'MacLeod', '', 0, ''),
('JANZ049', 'Jane', 'Zeigler', '', 0, ''),
('JERH046', 'Jerome', 'Hart', '', 0, ''),
('JULM045', 'Julia', 'MacLeod', '', 0, ''),
('KYLM043', 'Kylie', 'Mackay', '', 0, ''),
('LILM041', 'Lillian', 'Miller', '', 0, ''),
('LISM039', 'Lisa', 'Mitchell', '', 0, ''),
('MARZ048', 'Mark', 'Zeigler', '', 0, ''),
('MICN037', 'Michelle', 'Newman', '', 0, ''),
('NICO035', 'Nicola', 'Ogden', '', 0, ''),
('PENP033', 'Penelope', 'Paige', '', 0, ''),
('SALP031', 'Sally', 'Parr', '', 0, ''),
('SONP029', 'Sonia', 'Peters', '', 0, ''),
('STER027', 'Stephanie', 'Randall', '', 0, ''),
('SUER025', 'Sue', 'Ross', '', 0, ''),
('THER023', 'Theresa', 'Rutherford', '', 0, ''),
('TRAS021', 'Tracey', 'Sharp', '', 0, ''),
('UNAR019', 'Una', 'Reis', '', 0, ''),
('VANT017', 'Vanessa', 'Turner', '', 0, ''),
('VICU015', 'Victoria', 'Underwood', '', 0, ''),
('VIRV013', 'Virginia', 'Vaughan', '', 0, ''),
('WENW011', 'Wendy', 'Wallace', '', 0, ''),
('YVOW009', 'Yvonne', 'Welch', '', 0, ''),
('ZOEY006', 'Zoe', 'Young', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sign in`
--

CREATE TABLE `sign in` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign in`
--

INSERT INTO `sign in` (`Email`, `Password`) VALUES
('admin@stalphonsus.ac.uk', '*D509D48072C20A1E1FEE5E6290C72F2E40B15B5E');

-- --------------------------------------------------------

--
-- Table structure for table `st alphonsus1`
--

CREATE TABLE `st alphonsus1` (
  `DfE Key` varchar(10) NOT NULL,
  `School name` varchar(20) NOT NULL,
  `Head teacher ID` varchar(20) NOT NULL,
  `Deputy Head ID` varchar(20) NOT NULL,
  `Class Name` varchar(40) NOT NULL,
  `Student ID` varchar(10000) NOT NULL,
  `Contractor ID` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `st alphonsus1`
--

INSERT INTO `st alphonsus1` (`DfE Key`, `School name`, `Head teacher ID`, `Deputy Head ID`, `Class Name`, `Student ID`, `Contractor ID`) VALUES
('STALPHM000', 'St Alphonsus', 'DJ1', 'RUDM1, KATR1', 'RR', 'JACA074', 'ALEJ06');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student ID` varchar(10) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL,
  `Teacher ID` varchar(10) NOT NULL,
  `TA ID` varchar(20) NOT NULL,
  `Class name` varchar(5) NOT NULL,
  `Parent Pair ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student ID`, `First Name`, `Last Name`, `Teacher ID`, `TA ID`, `Class name`, `Parent Pair ID`) VALUES
('AARY134', 'Aaron', 'Young', '', '', '', ''),
('ADAO052', 'Adam', 'Oliver', '', '', '', ''),
('ADRH019', 'Adrian', 'Hamilton', '', '', '', ''),
('ADRS115', 'Adrian', 'Simpson', '', '', '', ''),
('ALAM011', 'Alan', 'Mackay', '', '', '', ''),
('ALEB036', 'Alexandra', 'Bond', '', '', '', ''),
('ALEM010', 'Alexandra', 'Mackenzie', '', '', '', ''),
('ALES001', 'Alexander', 'Sutherland', '', '', '', ''),
('ALES020', 'Alexander', 'Springer', '', '', '', ''),
('ALIT044', 'Alison', 'Turner', '', '', '', ''),
('AMAC087', 'Amanda', 'Cornish', '', '', '', ''),
('AMEB018', 'Amelia', 'Bower', '', '', '', ''),
('ANDR114', 'Andrew', 'Roberts', '', '', '', ''),
('ANNF119', 'Anne', 'Forsyth', '', '', '', ''),
('ANNH035', 'Anna', 'Hill', '', '', '', ''),
('AUSD075', 'Austin', 'Dyer', '', '', '', ''),
('BELA099', 'Bella', 'Alsop', '', '', 'YR1', ''),
('BENR027', 'Benjamin', 'Rampling', '', '', '', ''),
('BERY041', 'Bernadette', 'Young', '', '', '', ''),
('BLAW080', 'Blake', 'White', '', '', '', ''),
('BRAA124', 'Brandon', 'Anderson', '', '', '', ''),
('BRAC016', 'Brandon', 'Churchill', '', '', '', ''),
('CAMD066', 'Cameron', 'Dyer', '', '', '', ''),
('CARC022', 'Carl', 'Carr', '', '', '', ''),
('CARF109', 'Carol', 'Fraser', '', '', '', ''),
('CARP120', 'Carolyn', 'Parr', '', '', '', ''),
('CARS078', 'Carl', 'Springer', '', '', '', ''),
('CARS089', 'Carol', 'Springer', '', '', '', ''),
('CHLS107', 'Chloe', 'Sutherland', '', '', '', ''),
('CHRP008', 'Christian', 'Paterson', '', '', '', ''),
('CLAK069', 'Claire', 'King', '', '', '', ''),
('CLAM105', 'Claire', 'Mills', '', '', '', ''),
('CLAR033', 'Claire', 'Rees', '', '', '', ''),
('COLG125', 'Colin', 'Graham', '', '', '', ''),
('DAVL057', 'David', 'Lawrence', '', '', '', ''),
('DIAL045', 'Diane', 'Lyman', '', '', '', ''),
('DIAR065', 'Diane', 'Rutherford', '', '', '', ''),
('DOMR126', 'Dominic', 'Reid', '', '', '', ''),
('DONM007', 'Donna', 'Murray', '', '', '', ''),
('DONR082', 'Donna', 'Ross', '', '', '', ''),
('DORM025', 'Dorothy', 'May', '', '', '', ''),
('DYLH095', 'Dylan', 'Hudson', '', '', '', ''),
('ELLW077', 'Ella', 'Wallace', '', '', '', ''),
('EMIG006', 'Emily', 'Glover', '', '', '', ''),
('EMMT088', 'Emma', 'Taylor', '', '', '', ''),
('EVAD092', 'Evan', 'Davies', '', '', '', ''),
('EVAW091', 'Evan', 'Walker', '', '', '', ''),
('FAIS046', 'Faith', 'Short', '', '', '', ''),
('FELB118', 'Felicity', 'Ball', '', '', '', ''),
('FION117', 'Fiona', 'North', '', '', '', ''),
('FIOS014', 'Fiona', 'Sharp', '', '', '', ''),
('FIOT111', 'Fiona', 'Turner', '', '', '', ''),
('FRAT004', 'Frank', 'Tucker', '', '', '', ''),
('GABP032', 'Gabrielle', 'Paige', '', '', '', ''),
('GAVF015', 'Gavin', 'Fisher', '', '', '', ''),
('GAVF076', 'Gavin', 'Forsyth', '', '', '', ''),
('GORC133', 'Gordon', 'Churchill', '', '', '', ''),
('HARW047', 'Harry', 'Walker', '', '', '', ''),
('HEAB093', 'Heather', 'Black', '', '', '', ''),
('IREG023', 'Irene', 'Gray', '', '', '', ''),
('JACA074', 'Jacob', 'Allan', 'AUDPRR', 'TRAWRR, SARCRR', 'RR', 'AALLAN01'),
('JAMH097', 'James', 'Henderson', '', '', '', ''),
('JASP038', 'Jason', 'Peters', '', '', '', ''),
('JASP098', 'Jason', 'Paige', '', '', '', ''),
('JENC043', 'Jennifer', 'Clark', '', '', '', ''),
('JENF131', 'Jennifer', 'Ferguson', '', '', '', ''),
('JESH061', 'Jessica', 'Hamilton', '', '', '', ''),
('JESP003', 'Jessica', 'Peters', '', '', '', ''),
('JEST083', 'Jessica', 'Thomson', '', '', '', ''),
('JOEE048', 'Joe', 'Edmunds', '', '', '', ''),
('JOSK084', 'Joseph', 'Kelly', '', '', '', ''),
('JUSC121', 'Justin', 'Clark', '', '', '', ''),
('KARP059', 'Karen', 'Poole', '', '', '', ''),
('KARW039', 'Karen', 'Wallace', '', '', '', ''),
('KEIM096', 'Keith', 'Mackay', '', '', '', ''),
('KEVL026', 'Kevin', 'Lee', '', '', '', ''),
('KYLB053', 'Kylie', 'Blake', '', '', '', ''),
('KYLW021', 'Kylie', 'White', '', '', '', ''),
('LAUM103', 'Lauren', 'Mackay', '', '', '', ''),
('LEAL030', 'Leah', 'Lewis', '', '', '', ''),
('LILF130', 'Lily', 'Fisher', '', '', '', ''),
('LISB017', 'Lisa', 'Buckland', '', '', '', ''),
('LUCG064', 'Lucas', 'Grant', '', '', '', ''),
('LUKW012', 'Luke', 'Wallace', '', '', '', ''),
('MADH072', 'Madeleine', 'Hill', '', '', '', ''),
('MARC063', 'Maria', 'Chapman', '', '', '', ''),
('MARU050', 'Maria', 'Underwood', '', '', '', ''),
('MAXM002', 'Max', 'Mackay', '', '', '', ''),
('MAXM106', 'Max', 'MacDonald', '', '', '', ''),
('MEGP013', 'Megan', 'Parr', '', '', '', ''),
('MELL029', 'Melanie', 'Lambert', '', '', '', ''),
('MICJ037', 'Michelle', 'Jones', '', '', '', ''),
('MICJ128', 'Michelle', 'Jackson', '', '', '', ''),
('NATC081', 'Natalie', 'Churchill', '', '', '', ''),
('NATN122', 'Natalie', 'Newman', '', '', '', ''),
('NEIB100', 'Neil', 'Berry', '', '', '', ''),
('NEIL054', 'Neil', 'Lewis', '', '', '', ''),
('NICH104', 'Nicola', 'Hodges', '', '', '', ''),
('NICK042', 'Nicholas', 'Kerr', '', '', '', ''),
('NICR028', 'Nicola', 'Ross', '', '', '', ''),
('OLIC031', 'Olivia', 'Clarkson', '', '', '', ''),
('OLIW058', 'Oliver', 'Welch', '', '', '', ''),
('PAUO112', 'Paul', 'Ogden', '', '', '', ''),
('PETR009', 'Peter', 'Randall', '', '', '', ''),
('PHIM101', 'Phil', 'Mitchell', '', '', '', ''),
('PIPH040', 'Pippa', 'Hart', '', '', '', ''),
('PIPH070', 'Pippa', 'Henderson', '', '', '', ''),
('PIPM068', 'Pippa', 'MacLeod', '', '', '', ''),
('REBC055', 'Rebecca', 'Carr', '', '', '', ''),
('REBW062', 'Rebecca', 'Wallace', '', '', '', ''),
('RICC051', 'Richard', 'Cameron', '', '', '', ''),
('ROBR034', 'Robert', 'Randall', '', '', '', ''),
('RYAS110', 'Ryan', 'Sanderson', '', '', '', ''),
('SART024', 'Sarah', 'Taylor', '', '', '', ''),
('SEAB127', 'Sean', 'Ball', '', '', '', ''),
('SEAL108', 'Sean', 'Lawrence', '', '', '', ''),
('SEAV129', 'Sean', 'Vaughan', '', '', '', ''),
('SEAW132', 'Sean', 'Welch', '', '', '', ''),
('SEBA094', 'Sebastian', 'Avery', '', '', '', ''),
('SEBD116', 'Sebastian', 'Dyer', '', '', '', ''),
('SIMH086', 'Simon', 'Howard', '', '', '', ''),
('SOPL073', 'Sophie', 'Lewis', '', '', '', ''),
('STEB005', 'Stephanie', 'Butler', '', '', '', ''),
('STEG123', 'Stewart', 'Gray', '', '', '', ''),
('STER102', 'Stephanie', 'Robertson', '', '', '', ''),
('SUEN090', 'Sue', 'Newman', '', '', '', ''),
('THEJ079', 'Theresa', 'Jackson', '', '', '', ''),
('THES071', 'Theresa', 'Skinner', '', '', '', ''),
('TRAM085', 'Tracey', 'Miller', '', '', '', ''),
('VANS067', 'Vanessa', 'Simpson', '', '', '', ''),
('VIRE113', 'Virginia', 'Ellison', '', '', '', ''),
('WENW060', 'Wendy', 'White', '', '', '', ''),
('WILP056', 'William', 'Peters', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Teacher ID` varchar(10) NOT NULL,
  `Class ID` varchar(10) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Phone number` bigint(11) NOT NULL,
  `Annual salary` int(6) NOT NULL,
  `Background check` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Teacher ID`, `Class ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Annual salary`, `Background check`) VALUES
('ANTTYR1', 'YR1', 'Anthony', 'Turner', '', 7000000001, 25000, 'yes'),
('AUDPRR', 'RR', 'Audrey', 'Peters', 'Chorley road, Westhoughton, BL5', 7000000000, 24000, 'yes'),
('CONHYR2', 'YR2', 'Connor', 'Hudson', '', 0, 0, ''),
('CONSYR5', 'YR5', 'Connor', 'Smith', '', 0, 0, ''),
('EVACYR4', 'YR4', 'Evan', 'Cameron', '', 0, 0, ''),
('PIEWYR3', 'YR3', 'Piers', 'Welch', '', 0, 0, ''),
('VIRGYR6', 'YR6', 'Virginia', 'Glover', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `teaching assistants`
--

CREATE TABLE `teaching assistants` (
  `TA ID` varchar(10) NOT NULL,
  `Teacher ID` varchar(10) NOT NULL,
  `Class ID` varchar(5) NOT NULL,
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Phone number` bigint(11) NOT NULL,
  `Annual salary` int(6) NOT NULL,
  `Background check` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaching assistants`
--

INSERT INTO `teaching assistants` (`TA ID`, `Teacher ID`, `Class ID`, `First Name`, `Last Name`, `Address`, `Phone number`, `Annual salary`, `Background check`) VALUES
('AMYTYR5', '', '', 'Amy', 'Turner', '', 0, 0, ''),
('BERSYR4', '', '', 'Bernadette', 'Sharp', '', 0, 0, ''),
('EMIWYR1', 'ANTTYR1', 'YR1', 'Emily', 'White', '', 0, 0, ''),
('KATAYR3', '', '', 'Kate', 'Avery', '', 0, 0, ''),
('RICKYR5', '', '', 'Richard', 'King', '', 0, 0, ''),
('SARCRR', 'AUDPRR', 'RR', 'Sarah', 'Cameron', '', 0, 0, ''),
('SIMTYR2', '', '', 'Simon', 'Turner', '', 0, 0, ''),
('STECYR1', 'ANTTYR1', 'YR1', 'Stephen', 'Carr', '', 0, 0, ''),
('THOEYR6', '', '', 'Thomas', 'Edmunds', '', 0, 0, ''),
('TRAWRR', 'AUDPRR', 'RR', 'Tracey', 'Welch', '', 0, 0, ''),
('UNAUYR3', '', '', 'Una', 'Underwood', '', 0, 0, ''),
('WARCYR6', '', '', 'Warren', 'Cornish', '', 0, 0, ''),
('WENBYR4', '', '', 'Wendy', 'Baker', '', 0, 0, ''),
('YVOSYR2', '', '', 'Yvonne', 'Short', '', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class Name`),
  ADD KEY `Teacher ID` (`Teacher ID`),
  ADD KEY `TA ID` (`TA ID`),
  ADD KEY `Student ID` (`Student ID`);

--
-- Indexes for table `deputy head teachers`
--
ALTER TABLE `deputy head teachers`
  ADD PRIMARY KEY (`Deputy Head ID`),
  ADD KEY `School ID` (`School ID`);

--
-- Indexes for table `external contractors`
--
ALTER TABLE `external contractors`
  ADD PRIMARY KEY (`Contractor ID`);

--
-- Indexes for table `head teacher`
--
ALTER TABLE `head teacher`
  ADD PRIMARY KEY (`Head ID`);

--
-- Indexes for table `parent pairs`
--
ALTER TABLE `parent pairs`
  ADD PRIMARY KEY (`Pair ID`),
  ADD KEY `Parent 1 ID` (`Parent 1 ID`),
  ADD KEY `Parent 2 ID` (`Parent 2 ID`),
  ADD KEY `Student ID` (`Student ID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`Guardian ID`),
  ADD KEY `Student ID` (`Student ID`);

--
-- Indexes for table `sign in`
--
ALTER TABLE `sign in`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `st alphonsus1`
--
ALTER TABLE `st alphonsus1`
  ADD PRIMARY KEY (`DfE Key`),
  ADD KEY `Head teacher ID` (`Head teacher ID`),
  ADD KEY `Deputy Head ID` (`Deputy Head ID`),
  ADD KEY `Class Name` (`Class Name`),
  ADD KEY `Student ID` (`Student ID`(768)),
  ADD KEY `Contractor ID` (`Contractor ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student ID`),
  ADD KEY `Teacher ID` (`Teacher ID`),
  ADD KEY `TA ID` (`TA ID`),
  ADD KEY `Class name` (`Class name`),
  ADD KEY `Parent Pair ID` (`Parent Pair ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher ID`),
  ADD KEY `Class ID` (`Class ID`);

--
-- Indexes for table `teaching assistants`
--
ALTER TABLE `teaching assistants`
  ADD PRIMARY KEY (`TA ID`),
  ADD KEY `Teacher ID` (`Teacher ID`),
  ADD KEY `Class ID` (`Class ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`Teacher ID`) REFERENCES `teachers` (`Teacher ID`) ON UPDATE CASCADE;

--
-- Constraints for table `deputy head teachers`
--
ALTER TABLE `deputy head teachers`
  ADD CONSTRAINT `deputy head teachers_ibfk_1` FOREIGN KEY (`School ID`) REFERENCES `st alphonsus1` (`DfE Key`) ON UPDATE CASCADE;

--
-- Constraints for table `parent pairs`
--
ALTER TABLE `parent pairs`
  ADD CONSTRAINT `parent pairs_ibfk_1` FOREIGN KEY (`Parent 1 ID`) REFERENCES `parents` (`Guardian ID`),
  ADD CONSTRAINT `parent pairs_ibfk_2` FOREIGN KEY (`Parent 2 ID`) REFERENCES `parents` (`Guardian ID`);

--
-- Constraints for table `st alphonsus1`
--
ALTER TABLE `st alphonsus1`
  ADD CONSTRAINT `st alphonsus1_ibfk_1` FOREIGN KEY (`Head teacher ID`) REFERENCES `head teacher` (`Head ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `st alphonsus1_ibfk_2` FOREIGN KEY (`Class Name`) REFERENCES `class` (`Class Name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `st alphonsus1_ibfk_3` FOREIGN KEY (`Contractor ID`) REFERENCES `external contractors` (`Contractor ID`) ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`Class ID`) REFERENCES `class` (`Class Name`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
