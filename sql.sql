-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 19, 2024 at 12:42 PM
-- Server version: 9.0.1
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int NOT NULL,
  `bookingDate` datetime NOT NULL,
  `checkInStatus` int NOT NULL DEFAULT '0',
  `checkOutStatus` int NOT NULL DEFAULT '0',
  `checkInDate` datetime NOT NULL,
  `checkOutDate` datetime NOT NULL,
  `customers_customerId` int NOT NULL,
  `registStaff_registStaffId` int NOT NULL,
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `bookingDetail`
--

CREATE TABLE `bookingDetail` (
  `bookingDetailId` int NOT NULL,
  `booking_bookingId` int NOT NULL,
  `rooms_roomId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `cleanSchedule`
--

CREATE TABLE `cleanSchedule` (
  `cleanScheduleId` int NOT NULL,
  `registStaff_registStaffId` int NOT NULL,
  `rooms_roomId` int NOT NULL,
  `cleanScheduleTime` datetime NOT NULL,
  `cleanScheduleStatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int NOT NULL,
  `customers_customerId` int NOT NULL,
  `booking_bookingId` int NOT NULL,
  `rating` int NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `customerIdCard` varchar(13) NOT NULL,
  `phoneNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `detailId` int NOT NULL,
  `detailName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
  `optionalId` int NOT NULL,
  `bookingDetail_bookingDetailId` int NOT NULL,
  `services_serviceId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `payId` int NOT NULL,
  `payments_paymentId` int NOT NULL,
  `booking_bookingId` int NOT NULL,
  `payDate` datetime NOT NULL,
  `totalPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int NOT NULL,
  `paymentName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `registStaff`
--

CREATE TABLE `registStaff` (
  `registStaffId` int NOT NULL,
  `staffs_staffId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `roomDetail`
--

CREATE TABLE `roomDetail` (
  `roomDetailId` int NOT NULL,
  `rooms_roomId` int NOT NULL,
  `details_detailId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roomDetail`
--

INSERT INTO `roomDetail` (`roomDetailId`, `rooms_roomId`, `details_detailId`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 2, 2),
(4, 2, 4),
(5, 3, 1),
(6, 3, 3),
(7, 4, 5),
(8, 5, 6),
(9, 6, 9),
(10, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int NOT NULL,
  `types_typeId` int NOT NULL,
  `roomStatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
(10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int NOT NULL,
  `serviceName` varchar(45) NOT NULL,
  `servicePrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `staffId` int NOT NULL,
  `staffFristName` varchar(45) NOT NULL,
  `staffLastName` varchar(45) NOT NULL,
  `postition` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `typeId` int NOT NULL,
  `typeName` varchar(45) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
-- Indexes for table `bookingDetail`
--
ALTER TABLE `bookingDetail`
  ADD PRIMARY KEY (`bookingDetailId`),
  ADD KEY `fk_bookingDetail_booking1_idx` (`booking_bookingId`),
  ADD KEY `fk_bookingDetail_rooms1_idx` (`rooms_roomId`);

--
-- Indexes for table `cleanSchedule`
--
ALTER TABLE `cleanSchedule`
  ADD PRIMARY KEY (`cleanScheduleId`),
  ADD KEY `fk_cleanSchedule_registStaff1_idx` (`registStaff_registStaffId`),
  ADD KEY `fk_cleanSchedule_rooms1_idx` (`rooms_roomId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `fk_comments_customers1_idx` (`customers_customerId`),
  ADD KEY `fk_comments_booking1_idx` (`booking_bookingId`);

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
-- Indexes for table `registStaff`
--
ALTER TABLE `registStaff`
  ADD PRIMARY KEY (`registStaffId`),
  ADD KEY `fk_registStaff_staffs1_idx` (`staffs_staffId`);

--
-- Indexes for table `roomDetail`
--
ALTER TABLE `roomDetail`
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
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookingDetail`
--
ALTER TABLE `bookingDetail`
  MODIFY `bookingDetailId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cleanSchedule`
--
ALTER TABLE `cleanSchedule`
  MODIFY `cleanScheduleId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `detailId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `optional`
--
ALTER TABLE `optional`
  MODIFY `optionalId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `payId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registStaff`
--
ALTER TABLE `registStaff`
  MODIFY `registStaffId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomDetail`
--
ALTER TABLE `roomDetail`
  MODIFY `roomDetailId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `staffId` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `typeId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_customers` FOREIGN KEY (`customers_customerId`) REFERENCES `customers` (`customerId`),
  ADD CONSTRAINT `fk_booking_registStaff1` FOREIGN KEY (`registStaff_registStaffId`) REFERENCES `registStaff` (`registStaffId`);

--
-- Constraints for table `bookingDetail`
--
ALTER TABLE `bookingDetail`
  ADD CONSTRAINT `fk_bookingDetail_booking1` FOREIGN KEY (`booking_bookingId`) REFERENCES `booking` (`bookingId`),
  ADD CONSTRAINT `fk_bookingDetail_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`);

--
-- Constraints for table `cleanSchedule`
--
ALTER TABLE `cleanSchedule`
  ADD CONSTRAINT `fk_cleanSchedule_registStaff1` FOREIGN KEY (`registStaff_registStaffId`) REFERENCES `registStaff` (`registStaffId`),
  ADD CONSTRAINT `fk_cleanSchedule_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_booking1` FOREIGN KEY (`booking_bookingId`) REFERENCES `booking` (`bookingId`),
  ADD CONSTRAINT `fk_comments_customers1` FOREIGN KEY (`customers_customerId`) REFERENCES `customers` (`customerId`);

--
-- Constraints for table `optional`
--
ALTER TABLE `optional`
  ADD CONSTRAINT `fk_optional_bookingDetail1` FOREIGN KEY (`bookingDetail_bookingDetailId`) REFERENCES `bookingDetail` (`bookingDetailId`),
  ADD CONSTRAINT `fk_optional_services1` FOREIGN KEY (`services_serviceId`) REFERENCES `services` (`serviceId`);

--
-- Constraints for table `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `fk_pay_booking1` FOREIGN KEY (`booking_bookingId`) REFERENCES `booking` (`bookingId`),
  ADD CONSTRAINT `fk_pay_payments1` FOREIGN KEY (`payments_paymentId`) REFERENCES `payments` (`paymentId`);

--
-- Constraints for table `registStaff`
--
ALTER TABLE `registStaff`
  ADD CONSTRAINT `fk_registStaff_staffs1` FOREIGN KEY (`staffs_staffId`) REFERENCES `staffs` (`staffId`);

--
-- Constraints for table `roomDetail`
--
ALTER TABLE `roomDetail`
  ADD CONSTRAINT `fk_roomDetail_details1` FOREIGN KEY (`details_detailId`) REFERENCES `details` (`detailId`),
  ADD CONSTRAINT `fk_roomDetail_rooms1` FOREIGN KEY (`rooms_roomId`) REFERENCES `rooms` (`roomId`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_types1` FOREIGN KEY (`types_typeId`) REFERENCES `types` (`typeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
