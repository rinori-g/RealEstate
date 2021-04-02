-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2021 at 04:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `rooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `description`, `category`, `rooms`, `bathrooms`, `created_at`, `image`, `price`) VALUES
(1, 4, 'Banese me qera!', 'Leshoj banese me qera ne lagjen Ulpiana!', 'Sale', 3, 1, '2020-09-10', 'slide2.jpg', '300.00'),
(12, 4, 'fffff', 'dsdsds dsdsds dsdsdsd sds dsd sd ds dsd dsd', 'Sale', 6, 2, '2020-09-10', 'slide2.jpg', '200.00'),
(14, 4, 'Gallery 1', ' sdsd dsdew,dfd ewewkwqe weweq. wewqewqe ,w ewqq', 'Rent', 11, 4, '0000-00-00', 'pages1.jpg\r\n', '43.00'),
(17, 4, 'Test', 'sds', 'Sale', 6, 6, '2020-09-08', 'black-backgrounds_052245_13.jpg', '200.00'),
(19, 4, 'Clirim', 'Clirim test', 'Sale', 6, 2, '2020-09-16', 'for stack overflow.PNG', '200.00'),
(39, 3, 'Shtepi ne shitje', 'ewfsdfsd', 'Rent', 11, 1, '2021-01-15', 'best.PNG', '123.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(3, 'Drin', 'Fejzullahu', 'drin@gmail.com', 'drin', '$2y$10$LKyWwyPBUtk3OwgNziYrduZdfjJ1NNI5v1/U6hhGAcwteyiP1YIai'),
(4, 'Arlind', 'Beqiri', 'arlind@gmail.com', 'arlind', '$2y$10$LKyWwyPBUtk3OwgNziYrduZdfjJ1NNI5v1/U6hhGAcwteyiP1YIai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
