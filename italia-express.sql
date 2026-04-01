-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2026 at 10:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `italia-express`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `U_ID` varchar(5) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Payment_Info` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`U_ID`, `Name`, `DOB`, `Address`, `Payment_Info`) VALUES
('U0001', 'John', '2005-03-04', '12345 Fake St', '4242 4242 4242 4242'),
('U0002', 'Jane', '2001-07-12', '98765 Real St', '5105 1051 0510 5100'),
('U0003', 'Tim', '1999-11-22', '10521 Red Rd', '6011 1111 1111 1106'),
('U0004', 'Kim', '2001-01-01', '38883 Jump Ct', '3000 0000 0000 0003'),
('U0005', 'Jamal', '2003-10-31', '40026 Blue Ave', '3954 9953 0089 2890'),
('U0006', 'Pablo', '1997-05-06', '999 Hop Rd', '9191 9191 9191 9191'),
('U0007', 'Jamie', '1995-06-15', '456 Oak Ave', '8888 8888 8888 8888'),
('U0008', 'Paula', '2013-08-16', '789 Pine St', '7777 7777 7777 7777'),
('U0009', 'Keon', '1989-01-02', '333 Farris View Lane Jefferson Alabama 44321', '4399 3211 1324 1000');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Delivery_ID` varchar(10) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `TimeStamp` datetime NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `U_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`Delivery_ID`, `Address`, `TimeStamp`, `Order_ID`, `U_ID`) VALUES
('D1034', '40026 Blue Ave', '2026-04-11 12:55:06', 109, 'U0005'),
('D1112', '98765 Real St', '2026-02-26 11:32:55', 103, 'U0002'),
('D4435', '12345 Fake St', '2026-01-13 04:12:32', 101, 'U0001'),
('D4444', '10521 Red Rd', '2026-03-31 15:40:12', 105, 'U0003'),
('D8764', '38883 Jump Ct', '2026-04-04 20:05:49', 107, 'U0004');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `FoodName` varchar(50) NOT NULL COMMENT 'The name of the food item',
  `Description` varchar(100) NOT NULL COMMENT 'A Description of the food item',
  `Pricing` int(5) NOT NULL COMMENT 'Price of food item',
  `MajorAllergen` varchar(50) NOT NULL COMMENT 'A list of potential allergy the food could trigger  ',
  `CalorieCount` int(4) NOT NULL COMMENT 'A int sating how much Calories each food item contains',
  `InStock` tinyint(1) NOT NULL COMMENT 'a true or false stating if the food is stocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`FoodName`, `Description`, `Pricing`, `MajorAllergen`, `CalorieCount`, `InStock`) VALUES
('Bread', 'Oven-baked garlic', 6, 'Gluten', 14, 1),
('Cake', 'Triple Chocolate', 8, 'Dairy, Nuts(potential)', 40, 1),
('Pasta', 'Noodles with meat sauce', 10, 'Red-meat', 24, 1),
('Pizza', 'Pizza with cheese', 11, 'Dairy', 32, 1),
('Soup', 'Creamy tomato', 5, 'Dairy', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `Order_ID` int(11) NOT NULL,
  `OrderSummary` varchar(255) DEFAULT NULL,
  `Total` decimal(10,2) NOT NULL,
  `TimeStamp` datetime NOT NULL,
  `IsDelivery` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`Order_ID`, `OrderSummary`, `Total`, `TimeStamp`, `IsDelivery`) VALUES
(101, 'Pizza x3', 26.32, '2026-01-13 04:12:32', 1),
(103, 'Pasta x2', 18.51, '2026-02-26 11:32:55', 1),
(105, 'Bread x6', 10.84, '2026-03-31 15:40:12', 1),
(107, 'Soup x2', 11.18, '2026-04-04 20:05:49', 1),
(109, 'Cake x1', 12.50, '2026-04-11 12:55:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase`
--

CREATE TABLE `item_purchase` (
  `U_ID` varchar(10) NOT NULL,
  `FoodName` varchar(100) NOT NULL,
  `TimeStamp` datetime NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_purchase`
--

INSERT INTO `item_purchase` (`U_ID`, `FoodName`, `TimeStamp`, `Quantity`, `Total`) VALUES
('U0001', 'Pizza', '2026-01-13 04:12:32', 3, 26.32),
('U0002', 'Pasta', '2026-02-26 11:32:55', 2, 18.51),
('U0003', 'Bread', '2026-03-31 15:40:12', 6, 10.84),
('U0004', 'Soup', '2026-04-04 20:05:49', 2, 11.18),
('U0005', 'Cake', '2026-04-11 12:55:06', 1, 12.50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`U_ID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Delivery_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`FoodName`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD PRIMARY KEY (`U_ID`,`FoodName`,`TimeStamp`),
  ADD KEY `FoodName` (`FoodName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`Order_ID`) REFERENCES `food_order` (`Order_ID`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `customer` (`U_ID`);

--
-- Constraints for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD CONSTRAINT `item_purchase_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `customer` (`U_ID`),
  ADD CONSTRAINT `item_purchase_ibfk_2` FOREIGN KEY (`FoodName`) REFERENCES `food` (`FoodName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
