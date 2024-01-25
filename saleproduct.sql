-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 11:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saleproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `description`, `quantity`, `unit_price`, `total_price`) VALUES
(3, 1, 'CC', 3, '3.00', '9.00'),
(4, 1, 'banana', 2, '2.00', '4.00'),
(5, 1, 'Apple', 20, '30.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `proudct_id` varchar(55) NOT NULL,
  `product_name` varchar(55) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `proudct_id`, `product_name`, `product_price`, `product_qty`) VALUES
(1, 'ml01', 'Malai Kadhaai', 250, 2),
(2, 'pn01', 'Paneer Mutter', 150, 3),
(3, 'pn02', 'Paneer Aloo', 120, 4),
(4, 'rm1', 'Tandoori Roti', 25, 2),
(5, 'rm1', 'Butter Roti', 35, 2),
(6, 'jr01', 'Jeera Rice', 110, 2),
(7, 'kf1', 'Veg Kofta', 230, 2),
(8, 'mt01', 'Mutton Curry', 425, 1),
(9, 'ck01', 'Chicken Cury', 210, 1),
(10, 'ck02', 'Chicken Masala', 110, 1),
(11, 'ck03', 'Chicken Rice', 150, 1),
(12, 'rt01', 'Onion Rayata', 45, 1),
(13, 'rt02', 'Onine Curd Rayata', 90, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
