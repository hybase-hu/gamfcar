-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:29 PM
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
-- Database: `gamf_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(100) NOT NULL,
  `car_brand` varchar(30) NOT NULL,
  `car_type` varchar(20) NOT NULL,
  `car_motor_type` int(4) NOT NULL,
  `car_motor_ccm` int(5) DEFAULT NULL,
  `car_release_date` int(4) NOT NULL,
  `car_main_image` varchar(20) NOT NULL,
  `car_hp` int(5) NOT NULL,
  `car_price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_brand`, `car_type`, `car_motor_type`, `car_motor_ccm`, `car_release_date`, `car_main_image`, `car_hp`, `car_price`) VALUES
(1, 'Audi', 'S8', 1, 2500, 2020, 'audi.jpg', 270, 12000000),
(2, 'BMW', 'X8', 2, 3400, 2022, 'bmw3.jpg', 350, 25000000),
(3, 'Mazda', '3', 1, 350, 2021, 'mazda3.jpg', 450, 19900000),
(4, 'Porsche', 'Cayanne', 3, 2500, 2022, 'porsche.jpg', 250, 21000000),
(5, 'Toyota', 'Prius', 3, NULL, 2019, 'toyota_prius.jpg', 180, 7990000);

-- --------------------------------------------------------

--
-- Table structure for table `email_message`
--

CREATE TABLE `email_message` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `message_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `email_message`
--

INSERT INTO `email_message` (`id`, `username`, `contact`, `message`, `message_time`) VALUES
(1, 'steph', 'stephengreat@hotmail.hu', 'I fell in love with your voice on Durante\'s Celestia EP, had no idea you were such a talented DJ as well until I stumbled upon your Twitch channel recently. Love these mixes and the visuals are all really excellent as well, big props to the VJ/person running the stream as well :)', '2023-03-27 18:35:50'),
(2, 'Vendég', 'stephengreat@hotmail.hu', 'I fell in love with your voice on Durante\'s Celestia EP, had no idea you were such a talented DJ as well until I stumbled upon your Twitch channel recently. Love these mixes and the visuals are all really excellent as well, big props to the VJ/person running the stream as well :)', '2023-03-27 18:36:11'),
(3, 'Vendég', 'stephengreat@hotmail.hu', 'I fell in love with your voice on Durante\'s Celestia EP, had no idea you were such a talented DJ as well until I stumbled upon your Twitch channel recently. Love these mixes and the visuals are all really excellent as well, big props to the VJ/person running the stream as well :)', '2023-03-27 18:37:55'),
(7, 'Vendég', 'stephengreat@hotmail.hu', 'dsfsdf ddsf ds fds dfs fds dfds !!!!!!!!!!!!!!!!!!!!!!!!', '2023-03-27 18:45:07'),
(8, 'Vendég', 'stephengreat@hotmail.hu', 'dsafdsf  dsfd dfsfd s fdsafd sa fds', '2023-03-27 19:00:17'),
(9, 'Vendég', 'stephengreat@hotmail.hu', 'dsafdsf  dsfd dfsfd s fdsafd sa fds', '2023-03-27 19:01:13'),
(10, 'admin', 'admin@mail.hu', 'Hallod, mióta várok arra a verdára már? Hogy áll?', '2023-03-27 20:12:15'),
(11, 'admin', 'admin@mail.hu', 'Nahhh, válaszoljatok már!!! Vissza mondom a fenébe is', '2023-03-27 20:13:04'),
(12, 'admin', 'Kérem', 'Vegye fel a kapcsolatot', '2023-03-28 20:30:55'),
(13, 'Vendég', 'nagyfarok@bigdick.hu', 'Miért nincs hamburger a büfében??', '2023-04-15 19:54:54'),
(14, 'admin', '\' OR 1=1;-- -', '\' OR 1=1;-- -', '2023-04-18 22:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `motor_type`
--

CREATE TABLE `motor_type` (
  `motor_type_id` int(11) NOT NULL,
  `motor_type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `motor_type`
--

INSERT INTO `motor_type` (`motor_type_id`, `motor_type_name`) VALUES
(1, 'Benzin'),
(2, 'Diesel'),
(3, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `opinions`
--

CREATE TABLE `opinions` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `rating` int(1) NOT NULL,
  `img_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opinions`
--

INSERT INTO `opinions` (`id`, `created_at`, `username`, `message`, `rating`, `img_url`) VALUES
(1, '2023-03-27 18:09:22', 'steph', 'Nincs ingyen kávé', 4, '6421bjokocsi.jpg'),
(2, '2023-03-27 18:10:21', 'steph', 'I fell in love with your voice on Durante\'s Celestia EP, had no idea you were such a talented DJ as well until I stumbled upon your Twitch channel recently. Love these mixes and the visuals are all really excellent as well, big props to the VJ/person running the stream as well :)\r\nI fell in love with your voice on Durante\'s Celestia EP, had no idea you were such a talented DJ as well until I stumbled upon your Twitch channel recently. Love these mixes and the visuals are all really excellent as well, big props to the VJ/person running the stream as well :)', 5, '6421bcar1.jpg'),
(3, '2023-04-15 20:15:28', 'admin', 'Nagyon nagy kocsit szerettem volna de nem volt. Azt mondták tuti kompenzálok valamit, ezt adták... kapják be.', 1, '643aefiat-500-elettrica-3-1-7.jpg'),
(4, '2023-04-18 22:20:51', 'admin', '\' OR 1=1;-- -', 5, '643effiat-500-elettrica-3-1-7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(5) NOT NULL,
  `order_name` varchar(60) NOT NULL,
  `order_driver_license` varchar(12) NOT NULL,
  `order_payment` varchar(15) NOT NULL,
  `order_color` varchar(16) NOT NULL,
  `order_car_id` int(100) NOT NULL,
  `order_finish_date` datetime NOT NULL,
  `user_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_driver_license`, `order_payment`, `order_color`, `order_car_id`, `order_finish_date`, `user_name`) VALUES
('4c5e8', 'Nagy István', 'CZ12345678', '2', '4', 1, '2023-05-17 00:00:00', 'admin'),
('c6493', 'Anyukad', '1234567891', '2', '4', 4, '2023-05-17 00:00:00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Nagy Admin'),
(2, 'steph', '642aded47e3a8097c5ec129670f52888360a57b72766bab910f5220f5d58ff03', 'Stephen Great');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `motor_type`
--
ALTER TABLE `motor_type`
  ADD PRIMARY KEY (`motor_type_id`);

--
-- Indexes for table `opinions`
--
ALTER TABLE `opinions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_message`
--
ALTER TABLE `email_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `motor_type`
--
ALTER TABLE `motor_type`
  MODIFY `motor_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opinions`
--
ALTER TABLE `opinions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
