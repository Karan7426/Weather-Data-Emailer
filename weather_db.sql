-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 10:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `mobile_number`, `password`, `created_on`, `is_active`) VALUES
(2, 'Karan Chaudhary', 'Karanchaudhary7426@gmail.com', '7426920047', '123456789', '2024-06-06 17:45:51', 1),
(3, 'Karan', 'k@gmail.com', '7426920047', '123456789', '2024-06-06 19:38:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `weather_data`
--

CREATE TABLE `weather_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `temperature` decimal(5,2) NOT NULL,
  `humidity` decimal(5,2) NOT NULL,
  `weather_description` text NOT NULL,
  `pressure` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_data`
--

INSERT INTO `weather_data` (`id`, `user_id`, `location`, `date`, `temperature`, `humidity`, `weather_description`, `pressure`) VALUES
(2, 2, '', '2024-06-06', 31.00, 79.00, 'Mist', 0.00),
(3, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(4, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(5, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(6, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(7, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(8, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(9, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(10, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(11, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(12, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(13, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(14, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(15, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(16, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(17, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(18, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(19, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(20, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(21, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(22, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(23, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(24, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(25, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(26, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(27, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(28, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(29, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(30, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(31, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(32, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(33, 2, 'Kolkata', '2024-06-06', 29.00, 79.00, 'Mist', 0.00),
(34, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(35, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(36, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(37, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(38, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(39, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(40, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(41, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(42, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(43, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(44, 2, 'Noida', '2024-06-06', 31.00, 38.00, 'Mist', 0.00),
(45, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(46, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(47, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(48, 2, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(49, 2, 'Mumbai', '2024-06-06', 31.00, 75.00, 'Mist', 0.00),
(50, 2, 'Mumbai', '2024-06-06', 31.00, 75.00, 'Mist', 0.00),
(51, 2, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(52, 3, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(53, 3, 'Delhi', '2024-06-06', 21.20, 65.00, 'Sunny', 0.00),
(54, 3, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(55, 3, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(56, 3, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(57, 3, 'Delhi', '2024-06-06', 23.00, 55.00, 'Sunny', 0.00),
(58, 3, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(59, 3, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(60, 3, 'Kolkata', '2024-06-06', 28.00, 84.00, 'Mist', 0.00),
(61, 3, 'Gorakhpur', '2024-06-06', 32.40, 29.00, 'Clear', 0.00),
(62, 2, 'Gorakhpur', '2024-06-07', 41.30, 21.00, 'Sunny', 0.00),
(63, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(64, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(65, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(66, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(67, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(68, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(69, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(70, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(71, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(72, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(73, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(74, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(75, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(76, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(77, 2, 'Kolkata', '2024-06-07', 36.00, 57.00, 'Mist', 0.00),
(78, 2, 'Delhi', '2024-06-07', 16.20, 73.00, 'Clear', 0.00),
(79, 2, 'Lucknow', '2024-06-07', 37.00, 35.00, 'Mist', 0.00),
(80, 2, 'Lucknow', '2024-06-07', 37.00, 35.00, 'Mist', 0.00),
(81, 2, 'Lucknow', '2024-06-07', 37.00, 35.00, 'Mist', 0.00),
(82, 2, 'Mirzapur', '2024-06-07', 45.10, 11.00, 'Sunny', 0.00),
(83, 2, 'Gorakhpur', '2024-06-07', 42.90, 17.00, 'Sunny', 0.00),
(84, 2, 'Mumbai', '2024-06-07', 33.00, 67.00, 'Mist', 0.00),
(85, 2, 'Delhi', '2024-06-07', 16.20, 73.00, 'Clear', 0.00),
(86, 2, 'Pune', '2024-06-07', 28.80, 60.00, 'Partly Cloudy', 0.00),
(87, 2, 'Jaipur', '2024-06-07', 39.00, 31.00, 'Overcast', 999.99),
(88, 2, 'Kolkata', '2024-06-07', 36.00, 60.00, 'Mist', 999.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weather_data`
--
ALTER TABLE `weather_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weather_data`
--
ALTER TABLE `weather_data`
  ADD CONSTRAINT `weather_data_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
