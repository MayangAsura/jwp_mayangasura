-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2021 at 02:10 AM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18135673_db_jwp_coralisstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `profile`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(7, 'mayangasura2@gmail.com', 'Mayang', '00eee8145a2bf95610e48f3bcfcf72c2', 'avatar2.png', '2021-12-16 01:16:15', NULL, '2021-12-17 07:53:10', 7),
(8, 'mayang.asura123@gmail.com', 'Mayang', '504f5a58745367ff42a839d269c66a82', 'avatar.png', '2021-12-16 16:54:42', NULL, '2021-12-16 17:02:37', NULL),
(9, 'mayangasura21@gmail.com', 'Mayang', '28ccd125c170ad75fe132046b3a149c2', 'tas.PNG', '2021-12-16 20:41:30', NULL, '2021-12-16 20:43:00', NULL),
(10, 'aa@gmail.com', 'bismillah cek', '4297f44b13955235245b2497399d7a93', 'tas1.PNG', '2021-12-16 20:45:26', NULL, NULL, NULL),
(11, 'mayangasura217@gmail.com', 'Mayang', 'dd31b02150f759181706afbd6f627231', 'IMG_20200923_105138_800.jpg', '2021-12-17 01:20:04', NULL, '2021-12-17 08:20:40', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
