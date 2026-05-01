-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 04:33 AM
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
('Ambigious Pie', 'A pie of varying flavors combined.', 12, 'yes', 30, 1, 'images/ambiguos_pie.jpg'),
('Cake', 'Our special triple chocolate cake.', 8, 'Dairy, Nuts', 40, 1, 'images/cake.webp'),
('Fettuccine Alfredo', 'Made from free-ranged chickens and pasta made on-house.', 23, 'Gluten', 40, 1, 'images/Fettuccine Alfredo.jpg'),
('Garlic Bread', 'Oven-baked garlic bread.', 5, 'Gluten', 14, 1, 'images/bread.jpg'),
('Gnocchi', 'Italian dumplings made from scratch.', 14, 'Gluten', 11, 1, 'images/gnocci.jpg'),
('Lasagna', 'Lasagna made with fresh, homegrown tomatoes and pasta made in-house.', 14, 'Gluten, red meat', 15, 1, 'images/lasagna.jpg'),
('Pasta', 'Homemade spaghetti noodles topped with our special meat sauce.', 10, 'Red Meat, gluten', 24, 1, 'images/pasta.jpg'),
('Pizza', 'Pizza with fresh-sliced pepperoni, cheese, and our world renowned tomato sauce.', 11, 'Dairy, Red Meat', 32, 1, 'images/pizza.jpg'),
('Soup', 'Creamy tomato soup.', 6, 'Dairy', 17, 1, 'images/soup.jpg'),
('Tiramisu', 'Classic dessert made from coffee-soaked ladyfingers with delicious, creamy layers. Great \"pick-me-up\" ;)', 12, 'n/a', 70, 1, 'images/Tiramisu.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
