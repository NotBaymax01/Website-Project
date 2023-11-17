-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 01:03 PM
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
-- Database: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindata`
--

CREATE TABLE `admindata` (
  `fullName` varchar(50) NOT NULL,
  `icNum` varchar(12) NOT NULL,
  `jobTitle` varchar(30) NOT NULL,
  `telNum` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admindata`
--

INSERT INTO `admindata` (`fullName`, `icNum`, `jobTitle`, `telNum`, `email`, `password`) VALUES
('Muhammad Zackwan', '030931051273', 'Staff', '0196729571', 'zack@gmail.com', 'zack1234'),
('Akma Danish', '041026100183', 'Manager', '0192380977', 'danish@gmail.com', 'danish1234'),
('Ahmad Zaim', '971214032483', 'Manager', '0163718491', 'zaim@gmail.com', 'zaim1234');

-- --------------------------------------------------------

--
-- Table structure for table `matchdata`
--

CREATE TABLE `matchdata` (
  `matchName` varchar(40) NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(10) NOT NULL,
  `venue` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `matchdata`
--

INSERT INTO `matchdata` (`matchName`, `date`, `time`, `venue`) VALUES
('Malaysia vs Laos', '16/12/2023', '8.30 p.m', 'Stadium Bukit Jalil'),
('Malaysia vs Singapore', '13/12/2023', '8.30 p.m', 'Stadium Bukit Jalil'),
('Myanmar vs Malaysia', '19/12/2023', '8.30 p.m', 'Stadium Bukit Jalil'),
('Vietnam vs Malaysia', '10/12/2023', '8.30 p.m', 'Stadium Bukit Jalil');

-- --------------------------------------------------------

--
-- Table structure for table `ticketdata`
--

CREATE TABLE `ticketdata` (
  `bil` int(100) NOT NULL,
  `icNum` varchar(12) NOT NULL,
  `name` varchar(40) NOT NULL,
  `telNum` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `matchName` varchar(40) NOT NULL,
  `numOfTicket` int(100) NOT NULL,
  `paymentType` varchar(30) NOT NULL,
  `totalPrice` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticketdata`
--

INSERT INTO `ticketdata` (`bil`, `icNum`, `name`, `telNum`, `email`, `matchName`, `numOfTicket`, `paymentType`, `totalPrice`) VALUES
(8, '041123072364', 'Idlan Haqim', '0196869508', 'idlan@gmail.com', 'Malaysia vs Laos', 5, 'Online Banking', 'RM150'),
(10, '041212102345', 'Irfan Daniel', '0191234567', 'ipan@gmail.com', 'Malaysia vs Singapore', 1, 'Credit/Debit Card', 'RM30'),
(11, '041204081234', 'Alif Zaharin', '0198765432', 'alip@gmail.com', 'Vietnam vs Malaysia', 4, 'Touch N Go', 'RM120'),
(21, '012042310042', 'Irfan Danish', '0194572461', 'fan@gmail.com', 'Malaysia vs Singapore', 10, 'Touch N Go', 'RM300'),
(35, '040704048592', 'Amir Nafiz', '01161505991', 'amirnafiz@gmail.com', 'Vietnam vs Malaysia', 5, 'Online Banking', 'RM150'),
(138, '031221108261', 'Amer Azrin', '0193375831', 'azrin@gmail.com', 'Malaysia vs Laos', 3, 'Credit/Debit Card', 'RM90'),
(143, '021011101903', 'Hanis Syafiqah', '01183791403', 'hanis@gmail.com', 'Malaysia vs Singapore', 6, 'Online Banking', 'RM180'),
(146, '971026091847', 'Nurhayat', '0148710492', 'hayat@gmail.com', 'Malaysia vs Singapore', 2, 'Touch N Go', 'RM60'),
(148, '041026100183', 'Akma Danish', '0192380977', 'danish@gmail.com', 'Malaysia vs Singapore', 4, 'Online Banking', 'RM120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindata`
--
ALTER TABLE `admindata`
  ADD PRIMARY KEY (`icNum`);

--
-- Indexes for table `matchdata`
--
ALTER TABLE `matchdata`
  ADD PRIMARY KEY (`matchName`);

--
-- Indexes for table `ticketdata`
--
ALTER TABLE `ticketdata`
  ADD PRIMARY KEY (`bil`),
  ADD KEY `match_foreign` (`matchName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticketdata`
--
ALTER TABLE `ticketdata`
  MODIFY `bil` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticketdata`
--
ALTER TABLE `ticketdata`
  ADD CONSTRAINT `match_foreign` FOREIGN KEY (`matchName`) REFERENCES `matchdata` (`matchName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
