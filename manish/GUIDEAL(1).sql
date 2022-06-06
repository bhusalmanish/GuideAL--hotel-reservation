-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2022 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `GUIDEAL`
--

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `details` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `type`, `price`, `details`, `image`, `location`) VALUES
(1, '100', 'Deluxe rooms', '2000', 'The Contemporary yet simple designed King bedded rooms are well equipped with modern amenities. Refresh your mind with our best suites for you.\r\n', 'room1.jpg', 'kathmandu'),
(2, '200', 'Standard room.', '1500', 'Simple design king bedded room are well equipped with modern amenities.', 'room2.jpg', 'bhaktapur'),
(3, '300', 'twin Deluxe room', '2000', 'Double bedded rooms with good hospitality and awesome sweets feel like home.', 'room3.jpg', 'lalitpur'),
(4, '400', 'Suite', '1000', 'Single bed suite for single person to live on and stay for one night.', 'room4.jpg', 'kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `room_id` int(255) NOT NULL,
  `checkin_date` varchar(255) NOT NULL,
  `checkout_date` varchar(255) NOT NULL,
  `N0_of_rooms` int(255) NOT NULL,
  `booked_by` varchar(255) NOT NULL,
  `booked_at` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `room_id`, `checkin_date`, `checkout_date`, `N0_of_rooms`, `booked_by`, `booked_at`) VALUES
(44, 1, '05/26/2022', '05/29/2022', 2, 'yojan@example.com', '2022-05-25 09:06:53'),
(46, 4, '05/26/2022', '05/28/2022', 2, 'ram@gmail.com', '2022-05-25 18:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `created_at`) VALUES
(1, 'yojan karki', 'yojan@example.com', '3ccaf608b876597950083fb483bc590d', 'admin', '2022-05-20 08:27:00'),
(3, 'ram', 'ram@gmail.com', 'c9a2c96cd599eca3ba0a2e2a471043e3', 'user', '2022-05-20 18:13:09'),
(4, 'shyam', 'shyam@gmail.com', 'cffba1722dd649bd7a72a37e48358b0f', 'user', '2022-05-20 18:35:04'),
(10, 'hari bahadur', 'hari@gmail.com', 'df863316b42f6c369a042952f2e0e39a', 'user', '2022-05-25 12:54:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
