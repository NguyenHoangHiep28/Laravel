-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 08:55 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `product_name`, `image`, `price`) VALUES
(15, '2021-08-02 21:27:13', '2021-08-02 21:27:13', 'Brown Shirt', 'brown-shirt.storeProduct6108c5a14b8696.20939927.jpg', 22),
(16, '2021-08-02 21:37:00', '2021-08-02 21:37:00', 'Black body skirt', 'black-body-skirt.storeProduct6108c7ec620ba7.42569801.jpg', 20),
(17, '2021-08-02 21:37:11', '2021-08-02 21:37:11', 'Colorful Shirt', 'colorful-shirt.storeProduct6108c7f75c10b2.86734287.jpg', 30),
(18, '2021-08-02 21:37:24', '2021-08-02 21:37:24', 'Blue skirt', 'blue-skirt.storeProduct6108c80437a003.69778137.jpg', 23),
(19, '2021-08-02 21:37:42', '2021-08-02 21:37:42', 'Jeans', 'jeans.storeProduct6108c8165f1bd9.82175338.jpg', 18),
(20, '2021-08-02 21:38:01', '2021-08-02 22:38:18', 'Shirt Summer Collection', 'shirt-summer-collection.storeProduct6108d64a324430.75177034.jpg', 22),
(21, '2021-08-02 21:38:26', '2021-08-02 21:38:26', 'White skirt', 'white-skirt.storeProduct6108c842abcb33.70450561.jpg', 23),
(22, '2021-08-02 21:39:37', '2021-08-02 21:39:37', 'Hoodie', 'hoodie.storeProduct6108c889baae77.87332178.jpg', 25),
(23, '2021-08-02 21:40:44', '2021-08-02 21:40:44', 'Sleepwear', 'sleepwear.storeProduct6108c8cca08af7.14303718.jpg', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
