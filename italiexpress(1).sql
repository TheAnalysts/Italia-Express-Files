-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2026 at 05:29 PM
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
-- Database: `italiexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `U_ID` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `D.O.B` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PaymentInfo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `Address` varchar(75) NOT NULL,
  `TimeStamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Order_ID` int(5) NOT NULL,
  `U_ID` int(6) NOT NULL,
  `Delivery_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Name` varchar(100) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Pricing` int(6) NOT NULL,
  `MajorAllergen` varchar(50) NOT NULL,
  `CalorieCount` int(8) NOT NULL,
  `InStock` tinyint(1) NOT NULL,
  `Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Name`, `Description`, `Pricing`, `MajorAllergen`, `CalorieCount`, `InStock`, `Image`) VALUES
('Cake', 'Our special triple chocolate cake.', 8, 'Dairy, Nuts', 40, 1, 'images/cake.webp'),
('Garlic Bread', 'Oven-baked garlic bread.', 5, 'Gluten', 14, 1, 'images/bread.jpg'),
('Pasta', 'Homemade spaghetti noodles topped with our special meat sauce.', 10, 'Red Meat', 24, 1, 'images/pasta.jpg'),
('Pizza', 'Pizza with fresh-sliced pepperoni, cheese, and our world renowned tomato sauce.', 11, 'Dairy, Red Meat', 32, 1, 'images/pizza.jpg'),
('Soup', 'Creamy tomato soup.', 6, 'Dairy', 17, 1, 'images/soup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `OrderID` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `FoodName` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ItemTotal` decimal(10,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`OrderID`, `U_ID`, `FoodName`, `Quantity`, `ItemTotal`, `Total`, `TimeStamp`) VALUES
(1, 1, 'Garlic Bread', 1, 5.00, 5.00, '2026-04-13 03:52:15'),
(2, 1, 'Pizza', 2, 22.00, 22.00, '2026-04-13 04:03:48'),
(3, 1, 'Garlic Bread', 1, 5.00, 5.00, '2026-04-13 04:10:09'),
(4, 1, 'Pizza', 2, 22.00, 32.00, '2026-04-13 15:15:52'),
(5, 1, 'Pasta', 1, 10.00, 32.00, '2026-04-13 15:15:52'),
(6, 1, 'Pizza', 2, 22.00, 32.00, '2026-04-13 15:16:19'),
(7, 1, 'Pasta', 1, 10.00, 32.00, '2026-04-13 15:16:19'),
(8, 1, 'Pizza', 3, 33.00, 47.00, '2026-04-13 15:18:19'),
(9, 1, 'Cake', 1, 8.00, 47.00, '2026-04-13 15:18:19'),
(10, 1, 'Soup', 1, 6.00, 47.00, '2026-04-13 15:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase`
--

CREATE TABLE `item_purchase` (
  `U_ID` int(6) NOT NULL,
  `FoodName` varchar(25) NOT NULL,
  `TimeStamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Quantity` int(4) NOT NULL,
  `Total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`Delivery_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `idx_user_orders` (`U_ID`,`TimeStamp`);

--
-- Indexes for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD PRIMARY KEY (`U_ID`,`TimeStamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
