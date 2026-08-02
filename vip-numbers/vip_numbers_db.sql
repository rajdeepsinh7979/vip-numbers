-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2026 at 10:07 AM
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
-- Database: `vip_numbers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(20) DEFAULT 'blue',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `title`, `description`, `color`, `created_at`, `updated_at`) VALUES
(12, 'New Number Added', '2222222222 added to Premium category', 'green', '2026-07-24 04:41:39', '2026-07-24 04:41:39'),
(13, 'New Number Added', '1111111111 added to VIP category', 'green', '2026-07-25 07:31:54', '2026-07-25 07:31:54'),
(14, 'Number Deleted', '9999000009 removed from inventory', 'red', '2026-07-25 07:35:50', '2026-07-25 07:35:50'),
(15, 'Number Deleted', '9999000008 removed from inventory', 'red', '2026-07-25 07:36:07', '2026-07-25 07:36:07'),
(16, 'Number Updated', '1111111111 updated', 'blue', '2026-07-30 13:10:31', '2026-07-30 13:10:31'),
(17, 'Number Updated', '9999000007 updated', 'blue', '2026-07-30 13:18:36', '2026-07-30 13:18:36'),
(18, 'Profile Updated', 'admin updated profile information', 'purple', '2026-07-31 13:45:44', '2026-07-31 13:45:44'),
(19, 'Password Changed', 'Account password was updated', 'purple', '2026-07-31 14:09:46', '2026-07-31 14:09:46'),
(20, 'Password Changed', 'Account password was updated', 'purple', '2026-07-31 14:10:38', '2026-07-31 14:10:38'),
(21, 'Password Changed', 'Account password was updated', 'purple', '2026-07-31 14:10:58', '2026-07-31 14:10:58'),
(22, 'Number Deleted', '9999000011 removed from inventory', 'red', '2026-08-01 09:48:23', '2026-08-01 09:48:23'),
(23, 'Number Deleted', '9999000007 removed from inventory', 'red', '2026-08-01 09:48:34', '2026-08-01 09:48:34'),
(24, 'Number Updated', '9999000004 updated', 'blue', '2026-08-01 09:50:18', '2026-08-01 09:50:18'),
(25, 'Number Deleted', '9999000010 removed from inventory', 'red', '2026-08-01 09:51:44', '2026-08-01 09:51:44'),
(26, 'Number Deleted', '9999000006 removed from inventory', 'red', '2026-08-01 09:54:31', '2026-08-01 09:54:31'),
(27, 'Number Deleted', '9999000004 removed from inventory', 'red', '2026-08-01 09:56:29', '2026-08-01 09:56:29'),
(28, 'Number Deleted', '9999000003 removed from inventory', 'red', '2026-08-01 09:57:49', '2026-08-01 09:57:49'),
(29, 'Number Deleted', '9999000001 removed from inventory', 'red', '2026-08-01 09:58:19', '2026-08-01 09:58:19'),
(30, 'Number Deleted', '9999000002 removed from inventory', 'red', '2026-08-01 09:58:40', '2026-08-01 09:58:40'),
(31, 'Number Deleted', '9999000005 removed from inventory', 'red', '2026-08-01 09:59:55', '2026-08-01 09:59:55'),
(32, 'Number Deleted', '7777000011 removed from inventory', 'red', '2026-08-01 10:04:16', '2026-08-01 10:04:16'),
(33, 'Number Deleted', '6666777788 removed from inventory', 'red', '2026-08-01 10:05:51', '2026-08-01 10:05:51'),
(34, 'Number Deleted', '8888222233 removed from inventory', 'red', '2026-08-01 10:07:41', '2026-08-01 10:07:41'),
(35, 'Number Deleted', '9999444455 removed from inventory', 'red', '2026-08-01 10:10:03', '2026-08-01 10:10:03'),
(36, 'Number Deleted', '8888999900 removed from inventory', 'red', '2026-08-01 10:10:17', '2026-08-01 10:10:17'),
(37, 'Number Deleted', '9999000012 removed from inventory', 'red', '2026-08-01 10:12:33', '2026-08-01 10:12:33'),
(38, 'Number Updated', '6666555544 updated', 'blue', '2026-08-01 10:12:51', '2026-08-01 10:12:51'),
(39, 'Number Deleted', '6666555544 removed from inventory', 'red', '2026-08-01 10:13:00', '2026-08-01 10:13:00'),
(40, 'Number Deleted', '7777666655 removed from inventory', 'red', '2026-08-01 10:18:26', '2026-08-01 10:18:26'),
(41, 'Number Updated', '7777333344 updated', 'blue', '2026-08-01 10:19:00', '2026-08-01 10:19:00'),
(42, 'Number Updated', '8888000099 updated', 'blue', '2026-08-01 10:19:07', '2026-08-01 10:19:07'),
(43, 'Number Deleted', '8888000099 removed from inventory', 'red', '2026-08-01 10:19:16', '2026-08-01 10:19:16'),
(44, 'New Number Added', '1111111111 added to VIP category', 'green', '2026-08-01 10:20:27', '2026-08-01 10:20:27'),
(45, 'New Number Added', '2222222222 added to VIP category', 'green', '2026-08-01 10:22:31', '2026-08-01 10:22:31'),
(46, 'New Number Added', '3333333333 added to VIP category', 'green', '2026-08-01 10:25:11', '2026-08-01 10:25:11'),
(47, 'New Number Added', '5555555555 added to VIP category', 'green', '2026-08-01 10:33:48', '2026-08-01 10:33:48'),
(48, 'New Number Added', '6666666666 added to VIP category', 'green', '2026-08-01 10:36:06', '2026-08-01 10:36:06'),
(49, 'New Number Added', '7777777777 added to Premium category', 'green', '2026-08-01 10:41:24', '2026-08-01 10:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reset_pass`
--

INSERT INTO `reset_pass` (`id`, `user_id`, `code_hash`, `created_at`, `expires_at`) VALUES
(8, 2, '9ec3a2c296650433a380ead1e036d542b14e46884011d975c45431b66fdbf05e', '2026-08-02 13:27:20', '2026-08-02 10:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `mobile_number`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Admin User', 'admin', 'admin@example.com', '9876543210', '$2y$10$DlJG2HOVnOlgSm/0twuvfuBs.wfvsvMSDqiP7yRrVijfMT8Z6uJs2', '2026-07-31 14:09:36', '2026-08-02 07:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `vip_numbers`
--

CREATE TABLE `vip_numbers` (
  `id` int(11) NOT NULL,
  `mobile_number` varchar(10) NOT NULL,
  `sum1` tinyint(4) NOT NULL,
  `sum2` tinyint(4) NOT NULL,
  `sum3` tinyint(4) NOT NULL,
  `highlight_ranges` varchar(100) DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `discount` tinyint(4) NOT NULL DEFAULT 0,
  `selling_price` int(11) NOT NULL,
  `status` enum('Available','Reserved','Sold') NOT NULL DEFAULT 'Available',
  `category` enum('VIP','Premium','Fancy','Golden','Platinum') NOT NULL DEFAULT 'VIP',
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vip_numbers`
--

INSERT INTO `vip_numbers` (`id`, `mobile_number`, `sum1`, `sum2`, `sum3`, `highlight_ranges`, `original_price`, `discount`, `selling_price`, `status`, `category`, `views`, `created_at`, `updated_at`) VALUES
(44, '9999000001', 45, 18, 9, '1-4', 120000, 10, 108000, 'Available', 'Fancy', 45, '2026-06-05 04:45:00', '2026-06-05 04:45:00'),
(45, '8888111122', 52, 24, 12, '3-8', 180000, 5, 171000, 'Sold', 'Premium', 82, '2026-06-10 09:00:00', '2026-06-18 10:40:00'),
(46, '7777333344', 48, 3, 3, '5-10', 90000, 15, 103500, 'Available', '', 36, '2026-06-18 03:50:00', '2026-08-01 10:19:00'),
(47, '9999888877', 55, 27, 14, '2-6', 250000, 8, 230000, 'Available', 'Premium', 120, '2026-06-27 12:15:00', '2026-06-27 12:15:00'),
(48, '9999000010', 46, 22, 11, '2-7', 150000, 5, 142500, 'Available', 'Fancy', 91, '2026-07-03 06:50:00', '2026-07-03 06:50:00'),
(51, '9999111122', 51, 25, 13, '3-6', 200000, 7, 186000, 'Available', 'Premium', 105, '2026-07-20 06:15:00', '2026-07-20 06:15:00'),
(59, '1111111111', 10, 1, 1, '1-10', 6000, 10, 6600, 'Available', 'VIP', 0, '2026-08-01 10:20:27', '2026-08-01 10:20:27'),
(60, '2222222222', 20, 2, 2, '2-8', 6000, 10, 6600, 'Available', 'VIP', 0, '2026-08-01 10:22:31', '2026-08-01 10:22:31'),
(61, '3333333333', 30, 3, 3, '3-7', 6000, 10, 6600, 'Available', 'VIP', 0, '2026-08-01 10:25:11', '2026-08-01 10:25:11'),
(62, '4444444444', 40, 4, 4, '4-10', 6000, 10, 6600, 'Available', 'VIP', 0, '2026-08-01 10:26:38', '2026-08-01 10:26:38'),
(63, '5555555555', 50, 5, 5, '1-10', 60000, 10, 66000, 'Available', 'VIP', 0, '2026-08-01 10:33:48', '2026-08-01 10:33:48'),
(64, '6666666666', 60, 6, 6, '2-10', 60000, 10, 66000, 'Available', 'VIP', 0, '2026-08-01 10:36:06', '2026-08-01 10:36:06'),
(65, '7777777777', 70, 7, 7, '1-10', 6000, 10, 6600, 'Available', 'Premium', 0, '2026-08-01 10:41:24', '2026-08-01 10:41:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vip_numbers`
--
ALTER TABLE `vip_numbers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vip_numbers`
--
ALTER TABLE `vip_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD CONSTRAINT `reset_pass_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
