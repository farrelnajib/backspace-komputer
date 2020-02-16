-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2020 at 01:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id12080979_backspacekomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Intel'),
(2, 'AMD'),
(3, 'Corsair'),
(4, 'V-Gen'),
(5, 'Adata'),
(6, 'MSI'),
(7, 'Asus'),
(8, 'WD'),
(9, 'Seagate'),
(10, 'Samsung'),
(11, 'Transcend'),
(12, 'Segotep'),
(13, 'Cubegaming'),
(14, 'Super Flower'),
(15, '1STPLAYER');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Processor'),
(2, 'RAM / Memory'),
(3, 'Motherboard'),
(4, 'Graphics Card'),
(5, 'HDD'),
(6, 'SSD'),
(7, 'Casing'),
(8, 'Power Supply');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `brand_id`, `category_id`, `price`) VALUES
(1, 'Corsair SO-DIMM DDR4 8GB PC21000 - CMSX8GX4M1A2666C18 (1X8GB)', 3, 2, 575000),
(2, 'ADATA DDR4 XPG SPECTRIX D40 PC19200 2400MHz 16GB (2X8GB) Dual Channel - RGB', 5, 2, 1100000),
(3, 'Intel Core i7-9700K 3.6Ghz Up To 4.9Ghz - Cache 12MB [Box] Socket LGA 1151V2 - Coffeelake Series', 1, 1, 5949000),
(4, 'AMD Ryzen 5 3600 3.6Ghz Up To 4.2Ghz Cache 32MB 65W AM4 [Box] - 6 Core - 100-100000031BOX - With AMD Wraith Stealth Cooler', 2, 1, 2920000),
(5, 'Asus ROG STRIX B350-F Gaming (AM4, AMD Promontory B350, DDR4, USB3.1, SATA3)', 7, 3, 1810000),
(6, 'MSI B360 Gaming Plus (LGA1151V2, B360, DDR4, USB3.1, SATA3) (By WPG)', 6, 3, 1665000),
(7, 'Asus GeForce RTX 2080 Ti 11GB DDR6 - Strix OC', 7, 4, 24000000),
(8, 'MSI Radeon RX 5700 XT 8GB DDR6 - Gaming X', 6, 4, 7199000),
(9, 'WDC 1TB SATA3 64MB - Blue - WD10EZEX - Garansi 2 Th', 8, 5, 595000),
(10, 'Seagate 1TB SATA3 - BarraCuda Series', 9, 5, 600000),
(11, 'Samsung SSD 970 EVO PLUS M.2 250GB MZ-V7S250BW - Grs 5th', 10, 6, 1125000),
(12, 'Transcend 220S 480GB SSD 2.5\" SATA 3 => TLC', 11, 6, 795000),
(13, 'SEGOTEP GAMING CASE WARSHIP EVA - WHITE - Include Front Led Fan - Psu Cover - USB 3.0', 12, 7, 450000),
(14, 'CUBE GAMING KORELF - ATX - SIDE TEMPERED GLASS - PSU COVER - FREE 1 PCS 12CM AUTOFLOW RAINBOW FAN - FRONT RAINBOW RGB STRIP', 13, 7, 470000),
(15, 'Super Flower Leadex Gold 550W - SF-550F14MG - 80 PLUS GOLD - Full Modular - 5 Years', 14, 8, 1350000),
(16, '1STPLAYER Gaming PSU DK6.0 600W Full Modular - PS-600AX(BM) (80Plus Bronze)', 15, 8, 800000),
(17, 'CUBE GAMING KARVIA - ATX - SIDE TEMPERED GLASS - PSU COVER - FREE 3 PCS RAINBOW RGB FAN', 13, 7, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin / Boss'),
(2, 'Kroco');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `shipment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity_after` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`shipment_id`, `product_id`, `status_id`, `amount`, `quantity_after`, `time`) VALUES
(1, 7, 1, 5, 20, '2019-12-30 10:00:00'),
(2, 7, 0, 2, 18, '2019-12-31 10:18:39'),
(3, 6, 1, 24, 24, '2020-01-01 01:07:16'),
(4, 13, 0, 3, 12, '2020-01-01 01:11:18'),
(5, 14, 1, 10, 14, '2020-01-01 02:32:18'),
(6, 3, 1, 5, 33, '2020-01-01 03:45:17'),
(7, 8, 0, 1, 6, '2020-01-01 17:20:06'),
(8, 9, 1, 25, 36, '2020-01-01 18:24:10'),
(9, 6, 0, 3, 21, '2020-01-01 18:51:20'),
(10, 1, 0, 2, 18, '2020-01-01 19:06:22'),
(11, 14, 0, 5, 9, '2020-01-02 00:47:34'),
(12, 15, 1, 12, 12, '2020-01-02 01:04:44'),
(13, 10, 0, 15, 22, '2020-01-02 01:28:05'),
(14, 5, 1, 6, 11, '2020-01-02 01:30:18'),
(15, 4, 0, 2, 9, '2020-01-03 22:21:16'),
(16, 15, 0, 3, 9, '2020-01-03 23:24:51'),
(17, 10, 0, 2, 20, '2020-01-04 14:57:28'),
(18, 13, 1, 3, 15, '2020-01-04 20:30:38'),
(19, 7, 1, 10, 22, '2020-01-07 14:04:06'),
(20, 7, 0, 10, 12, '2020-01-07 14:04:27'),
(21, 1, 0, 4, 14, '2020-01-09 10:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_info` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_info`) VALUES
(0, 'Keluar'),
(1, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`product_id`, `quantity`) VALUES
(1, 14),
(2, 45),
(3, 33),
(4, 9),
(5, 11),
(6, 21),
(7, 12),
(8, 6),
(9, 36),
(10, 20),
(11, 21),
(12, 26),
(13, 15),
(14, 9),
(15, 9),
(16, 41),
(17, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `role_id`) VALUES
(1, 'Farrel Najib Anshary', 'farrel.anshary@binus.ac.id', '$2y$10$das/NAdghQn5CItyh5d1ueR3FENvEIqBtGGtYhpAc9kIsVeiEZFW2', 1),
(2, 'Constantine Dylan', 'constantine.dylan@binus.ac.id', '$2y$10$hVoQUwIiqDY.KdpBihBZYeU9NNGgej5trTiVRy9nRP7cfqiraQxlC', 2),
(3, 'Charlene Mariscal', 'charlene.mariscal@binus.ac.id', '$2y$10$gReWTRQRcs72UwDuCHwJyePm8S8smhssmWafoIk0xq26AK6DiXNPq', 2),
(4, 'Vinsensius Raymon', 'vinsen.ray@gmail.com', '$2y$10$lwIPy2ERVHd.sN0iToI6/.P.EpdiKjEpjJyTLC8TEG8K7DZ/eXJLy', 2),
(5, 'KevinA', 'kevin99alex@gmail.com', '$2y$10$aEcTpD6KubZBtau0jOMNLOqCnTiyqOOBSVVpUL1FuobwvZt49XEJi', 2),
(6, 'Guest User', 'guest@backspacekomputer.com', '$2y$10$JJRX7dJav6K1KtH9yeWKHekN/J/2q6WyZNT.cs7CM5Gtl9y50h.Ea', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `shipment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
