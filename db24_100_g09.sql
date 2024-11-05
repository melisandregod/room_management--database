-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2024 at 03:42 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db24_100_g09`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `bookingDate` datetime NOT NULL,
  `checkInStatus` int(11) NOT NULL DEFAULT '0',
  `checkOutStatus` int(11) NOT NULL DEFAULT '0',
  `checkInDate` datetime NOT NULL,
  `checkOutDate` datetime NOT NULL,
  `customers_customerId` int(11) NOT NULL,
  `registStaff_registStaffId` int(11) NOT NULL,
  `totalPrice` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `bookingDate`, `checkInStatus`, `checkOutStatus`, `checkInDate`, `checkOutDate`, `customers_customerId`, `registStaff_registStaffId`, `totalPrice`) VALUES
(82, '2024-10-24 07:36:07', 0, 0, '2024-11-16 14:00:00', '2024-11-20 12:00:00', 1, 1, 3500),
(88, '2024-10-24 07:48:26', 1, 0, '2024-10-07 02:00:00', '2024-10-09 12:00:00', 2, 1, 2500),
(89, '2024-10-24 08:27:29', 1, 1, '2024-10-07 02:00:00', '2024-10-09 12:00:00', 2, 1, 2500),
(90, '2024-11-03 01:09:40', 1, 1, '2025-04-28 12:00:00', '2025-05-03 12:00:00', 3, 1, 5100);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `bookingDetailId` int(11) NOT NULL,
  `booking_bookingId` int(11) NOT NULL,
  `rooms_roomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`bookingDetailId`, `booking_bookingId`, `rooms_roomId`) VALUES
(95, 88, 1),
(96, 88, 2),
(108, 88, 1),
(109, 88, 1),
(183, 89, 1),
(184, 89, 1),
(199, 90, 3),
(200, 90, 3),
(216, 82, 3),
(217, 82, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cleanschedule`
--

CREATE TABLE `cleanschedule` (
  `cleanScheduleId` int(11) NOT NULL,
  `registStaff_registStaffId` int(11) NOT NULL,
  `rooms_roomId` int(11) NOT NULL,
  `cleanScheduleTime` datetime NOT NULL,
  `cleanScheduleStatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cleanschedule`
--

INSERT INTO `cleanschedule` (`cleanScheduleId`, `registStaff_registStaffId`, `rooms_roomId`, `cleanScheduleTime`, `cleanScheduleStatus`) VALUES
(2, 1, 2, '2024-11-06 05:42:00', 1),
(3, 1, 10, '2024-11-07 11:57:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `bookingId` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `customerIdCard` varchar(13) DEFAULT NULL,
  `phoneNo` varchar(10) NOT NULL,
  `customerEmail` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `firstName`, `lastName`, `customerIdCard`, `phoneNo`, `customerEmail`) VALUES
(1, 'David', 'Miller', '1234567890009', '0812345698', 'bluefox93@gmail.com'),
(2, 'John', 'Smith', '1234567890123', '0812345678', 'sunsetgazer88@gmail.com'),
(3, 'Emily', 'Johnson', '2345678901234', '0823456789', 'redlion56@gmail.com'),
(4, 'Michael', 'Brown', '3456789012345', '0834567890', 'stardust47@gmail.com'),
(5, 'Sarah', 'Davis', '4567890123456', '0845678901', 'wildflower91@gmail.com'),
(6, 'David', 'Wilson', '5678901234567', '0856789012', 'goldentiger12@gmail.com'),
(7, 'Jessica', 'Taylor', '6789012345678', '0867890123', 'forestbreeze29@gmail.com'),
(8, 'James', 'Anderson', '7890123456789', '0878901234', 'oceanwave64@gmail.com\n'),
(9, 'Mary', 'Thomas', '8901234567890', '0889012345', 'silvermoon75@gmail.com\n'),
(10, 'Robert', 'Jackson', '9012345678901', '0890123456', 'dreamchaser14@gmail.com\n'),
(11, 'Linda', 'White', '0123456789012', '0801234567', 'mountainpeak83@gmail.com\n'),
(12, 'Daniel', 'Harris', '1234567890123', '0813456789', 'thunderhawk22@gmail.com\n'),
(13, 'Sophia', 'Martin', '2345678901234', '0824567890', 'luckybreeze99@gmail.com'),
(14, 'Chris', 'Thompson', '3456789012345', '0835678901', 'radiantstar42@gmail.com'),
(15, 'Olivia', 'Martinez', '4567890123456', '0846789012', 'desertfox57@gmail.com'),
(16, 'Matthew', 'Robinson', '5678901234567', '0857890123', 'emeraldsky65@gmail.com'),
(47, 'Hatsawat', 'Intrasod', '-', '0619032431', 'aum3523@gmail.com'),
(48, 'Hatsawat', 'Johnson', '-', '0823456789', 'aum3523@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `detailId` int(11) NOT NULL,
  `detailName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`detailId`, `detailName`) VALUES
(1, 'Sea View'),
(2, 'Mountain View'),
(3, 'King Bed'),
(4, 'Queen Bed'),
(5, 'Balcony'),
(6, 'Private Pool'),
(7, 'Wi-Fi'),
(8, 'Air Conditioner'),
(9, 'Breakfast Included'),
(10, 'Free Parking');

-- --------------------------------------------------------

--
-- Table structure for table `optional`
--

CREATE TABLE `optional` (
  `optionalId` int(11) NOT NULL,
  `bookingDetail_bookingDetailId` int(11) NOT NULL,
  `services_serviceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `optional`
--

INSERT INTO `optional` (`optionalId`, `bookingDetail_bookingDetailId`, `services_serviceId`) VALUES
(102, 95, 1),
(103, 96, 1),
(128, 108, 1),
(129, 108, 2),
(130, 109, 1),
(131, 109, 2),
(292, 183, 1),
(293, 183, 2),
(294, 184, 1),
(295, 184, 2),
(324, 199, 1),
(325, 199, 2),
(327, 200, 1),
(328, 200, 2),
(358, 216, 1),
(359, 217, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `payId` int(11) NOT NULL,
  `payments_paymentId` int(11) NOT NULL,
  `booking_bookingId` int(11) NOT NULL,
  `payDate` datetime NOT NULL,
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(11) NOT NULL,
  `paymentName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `paymentName`) VALUES
(1, 'Cash'),
(2, 'Credit Card');

-- --------------------------------------------------------

--
-- Table structure for table `registstaff`
--

CREATE TABLE `registstaff` (
  `registStaffId` int(11) NOT NULL,
  `staffs_staffId` int(11) NOT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registstaff`
--

INSERT INTO `registstaff` (`registStaffId`, `staffs_staffId`, `timeIn`, `timeOut`) VALUES
(1, 1, '2024-11-08 07:00:00', '2024-11-08 23:13:00'),
(8, 10, '2024-11-08 05:56:00', '2024-11-08 17:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `roomdetail`
--

CREATE TABLE `roomdetail` (
  `roomDetailId` int(11) NOT NULL,
  `rooms_roomId` int(11) NOT NULL,
  `details_detailId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomdetail`
--

INSERT INTO `roomdetail` (`roomDetailId`, `rooms_roomId`, `details_detailId`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 2, 2),
(4, 2, 4),
(5, 3, 1),
(6, 3, 3),
(7, 4, 5),
(8, 5, 6),
(9, 6, 9),
(10, 7, 10),
(27, 777, 4),
(28, 777, 7),
(29, 777, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(11) NOT NULL,
  `types_typeId` int(11) DEFAULT NULL,
  `roomStatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `types_typeId`, `roomStatus`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 2, 0),
(4, 2, 0),
(5, 3, 1),
(6, 3, 0),
(7, 1, 1),
(8, 2, 1),
(9, 3, 0),
(10, 2, 0),
(777, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `serviceName` varchar(45) NOT NULL,
  `servicePrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `serviceName`, `servicePrice`) VALUES
(1, 'Breakfast Package', 250),
(2, 'Dinner Package', 500),
(4, 'Cot', 300);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staffId` int(11) NOT NULL,
  `staffFirstName` varchar(45) NOT NULL,
  `staffLastName` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staffId`, `staffFirstName`, `staffLastName`, `position`) VALUES
(1, 'Hatsawat', 'Intrasod', 'cashier'),
(2, 'James', 'Williams', 'cleaner'),
(3, 'Sophia', 'Johnson', 'cleaner'),
(4, 'Ethan', 'Brown', 'chef'),
(5, 'Emma', 'Davis', 'cleaner'),
(6, 'Noah', 'Miller', 'cleaner'),
(7, 'Olivia', 'Wilson', 'cashier'),
(8, 'Liam', 'Taylor', 'cleaner'),
(9, 'Ava', 'Anderson', 'cleaner'),
(10, 'Mason', 'Thomas', 'cashier'),
(11, 'Isabella', 'Martin', 'cleaner'),
(12, 'Lucas', 'Jackson', 'cleaner'),
(13, 'Mia', 'Harris', 'cleaner'),
(14, 'Elijah', 'Thompson', 'cleaner'),
(15, 'Amelia', 'White', 'cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeId` int(11) NOT NULL,
  `typeName` varchar(45) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`typeId`, `typeName`, `price`) VALUES
(1, 'Standard', 1000),
(2, 'Deluxe', 1500),
(3, 'Suite', 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `fk_booking_customers_idx` (`customers_customerId`),
  ADD KEY `fk_booking_registStaff1_idx` (`registStaff_registStaffId`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`bookingDetailId`),
  ADD KEY `fk_bookingDetail_booking1_idx` (`booking_bookingId`),
  ADD KEY `fk_bookingDetail_rooms1_idx` (`rooms_roomId`);

--
-- Indexes for table `cleanschedule`
--
ALTER TABLE `cleanschedule`
  ADD PRIMARY KEY (`cleanScheduleId`),
  ADD KEY `fk_cleanSchedule_registStaff1_idx` (`registStaff_registStaffId`),
  ADD KEY `fk_cleanSchedule_rooms1_idx` (`rooms_roomId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `fk_comments_customers1_idx` (`customerId`),
  ADD KEY `fk_comments_booking1_idx` (`bookingId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detailId`);

--
-- Indexes for table `optional`
--
ALTER TABLE `optional`
  ADD PRIMARY KEY (`optionalId`),
  ADD KEY `fk_optional_bookingDetail1_idx` (`bookingDetail_bookingDetailId`),
  ADD KEY `fk_optional_services1_idx` (`services_serviceId`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`payId`),
  ADD KEY `fk_pay_payments1_idx` (`payments_paymentId`),
  ADD KEY `fk_pay_booking1_idx` (`booking_bookingId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `registstaff`
--
ALTER TABLE `registstaff`
  ADD PRIMARY KEY (`registStaffId`),
  ADD KEY `fk_registStaff_staffs1_idx` (`staffs_staffId`);

--
-- Indexes for table `roomdetail`
--
ALTER TABLE `roomdetail`
  ADD PRIMARY KEY (`roomDetailId`),
  ADD KEY `fk_roomDetail_rooms1_idx` (`rooms_roomId`),
  ADD KEY `fk_roomDetail_details1_idx` (`details_detailId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `fk_rooms_types1_idx` (`types_typeId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `bookingDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
--
-- AUTO_INCREMENT for table `cleanschedule`
--
ALTER TABLE `cleanschedule`
  MODIFY `cleanScheduleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `optional`
--
ALTER TABLE `optional`
  MODIFY `optionalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `payId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registstaff`
--
ALTER TABLE `registstaff`
  MODIFY `registStaffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roomdetail`
--
ALTER TABLE `roomdetail`
  MODIFY `roomDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_customers` FOREIGN KEY (`customers_customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_booking_registStaff1` FOREIGN KEY (`registStaff_registStaffId`) REFERENCES `registstaff` (`registStaffId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD CONSTRAINT `fk_bookingDetail_booking1` FOREIGN KEY (`booking_bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bookingDetail_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cleanschedule`
--
ALTER TABLE `cleanschedule`
  ADD CONSTRAINT `fk_cleanSchedule_registStaff1` FOREIGN KEY (`registStaff_registStaffId`) REFERENCES `registstaff` (`registStaffId`),
  ADD CONSTRAINT `fk_cleanSchedule_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_booking1` FOREIGN KEY (`bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_customers1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `optional`
--
ALTER TABLE `optional`
  ADD CONSTRAINT `fk_optional_bookingDetail1` FOREIGN KEY (`bookingDetail_bookingDetailId`) REFERENCES `bookingdetail` (`bookingDetailId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_optional_services1` FOREIGN KEY (`services_serviceId`) REFERENCES `services` (`serviceId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `fk_pay_booking1` FOREIGN KEY (`booking_bookingId`) REFERENCES `booking` (`bookingId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pay_payments1` FOREIGN KEY (`payments_paymentId`) REFERENCES `payments` (`paymentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registstaff`
--
ALTER TABLE `registstaff`
  ADD CONSTRAINT `fk_registStaff_staffs1` FOREIGN KEY (`staffs_staffId`) REFERENCES `staffs` (`staffId`);

--
-- Constraints for table `roomdetail`
--
ALTER TABLE `roomdetail`
  ADD CONSTRAINT `fk_roomDetail_details1` FOREIGN KEY (`details_detailId`) REFERENCES `details` (`detailId`),
  ADD CONSTRAINT `fk_roomDetail_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_types1` FOREIGN KEY (`types_typeId`) REFERENCES `types` (`typeId`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
