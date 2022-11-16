-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 09:18 PM
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
-- Database: `csk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$fnb.o2jNQHJPwAULY088N.wUth/ylBqoW6sSQSxyOh7cacK2EInhm');

-- --------------------------------------------------------

--
-- Table structure for table `booking_list`
--

CREATE TABLE `booking_list` (
  `member_id` int(10) NOT NULL,
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `aptDate` date NOT NULL,
  `aptTime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_list`
--

INSERT INTO `booking_list` (`member_id`, `id`, `title`, `description`, `aptDate`, `aptTime`) VALUES
(100677, 1, 'Sample 101', 'This is a sample schedule only.', '2022-10-10', '9:00 AM - 10:00 AM'),
(100800, 2, 'Sample 102', 'Sample Description 102', '2022-10-07', '9:00 AM - 10:00 AM'),
(100800, 3, 'Sample 102', 'Sample Description 102', '2022-10-08', '9:00 AM - 10:00 AM'),
(100800, 4, 'Sample 102', 'Sample Description 102', '2022-10-08', '9:00 AM - 10:00 AM'),
(100677, 5, 'Sample 102', 'Sample Description', '2023-10-12', '1:00 PM - 2:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `notification_tb`
--

CREATE TABLE `notification_tb` (
  `appointment_id` int(255) UNSIGNED NOT NULL,
  `appointment_type` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `noti_date` date NOT NULL,
  `noti_day` varchar(255) NOT NULL,
  `noti_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_tb`
--

INSERT INTO `notification_tb` (`appointment_id`, `appointment_type`, `cust_name`, `details`, `status`, `noti_date`, `noti_day`, `noti_time`) VALUES
(418, 'Acceptance', 'Daniel Ting', 'Your appointment have been accepted.', 0, '2022-10-29', 'Saturday', '03:36 PM'),
(766, 'Cancellation', 'Daniel Ting', 'Your appointment have been cancelled', 0, '2022-10-29', 'Saturday', '03:34 PM'),
(1027, 'Changed', 'Daniel Ting', 'Your appointment have been changed.', 0, '2022-10-29', 'Saturday', '03:44 PM');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `product_ID` int(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_sname` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_discount` int(255) NOT NULL,
  `product_dprice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`product_ID`, `product_image`, `product_name`, `product_sname`, `product_price`, `product_discount`, `product_dprice`) VALUES
(1, 'promo_plant1.jpg', 'Rickrack cactus', 'Selenicereus anthonyanus', 200, 50, 100),
(2, 'promo_plant2.jpg', 'Christmas Cactus', 'Schlumbergera bridgesii', 200, 50, 100),
(3, 'promo_plant3.jpg', 'Fairy Castle Cactus', 'Acanthocereus tetragonus', 200, 50, 100),
(4, 'promo_plant4.jpg', 'Star Cactus', 'Astrophytum asterias', 200, 50, 100),
(5, 'promo_plant5.jpg', 'Golden Barrel Cactus', 'Echinocactus grusonii', 100, 50, 50),
(6, 'promo_plant6.jpg', 'Easter Cactus', 'Schlumbergera gaertneri', 100, 50, 100),
(7, 'promo_plant7.jpg', 'Moon Cactus', 'Grafted hybrid', 100, 50, 100),
(8, 'promo_plant8.jpg', 'Old Lady Cactus', 'Mammillaria hahniana', 100, 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` int(10) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `dob` date NOT NULL,
  `password` text NOT NULL,
  `validation_key` text NOT NULL,
  `registration_date` date NOT NULL,
  `is_active` int(11) NOT NULL,
  `otp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `email`, `phone_number`, `dob`, `password`, `validation_key`, `registration_date`, `is_active`, `otp`) VALUES
(8, 0, 'Hassaan', 'Ghayas', 'Has123', 'kingharispro7@gmail.com', '12345678909', '1999-05-03', '$2y$10$DsJUZYYhn.zo63TM6DUV0uzs/YJ49rWaUO8IBVFuDkw4LQ80P4axu', 'M2I4N2VkM2Q3MjZkZmNkNzFjNzIyYzY2', '2022-10-24', 0, ''),
(9, 0, 'demo', 'demo', 'demo', 'demo@gmail.com', '09120901290', '2022-11-25', '$2y$10$9zPM7iaZBcvzQAr3gNb0n.ABGrs8A6PQOKRqPyteIbZ3CDnQPHA6G', 'ZDQ3OWYxM2Q3MjhkZjIyNzRjMWIwNDIx', '2022-11-10', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_list`
--
ALTER TABLE `booking_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_tb`
--
ALTER TABLE `notification_tb`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_list`
--
ALTER TABLE `booking_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
