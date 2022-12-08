-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 02:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_odc`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `image`) VALUES
(2, 'mostafa mohamed', 'mostafa@email.com', 'a30f9153fbff89a8594d154ee9e7340c8d8501f9', 1, '6384039204ca64.28484321.jpg'),
(15, 'Hassan Mohamed', 'hassaneymar11@gmail.com', '5060d63d2f0223575a112506f08c090cd79d95c9', 0, '63850bc1b29120.99334002.jpg'),
(16, 'a45aaa', 'aaa@aaa.com', '52a00b8461593ce33409d7c5d0411699cbf9cda3', 0, '63850bed7a7140.78885387.jpg'),
(17, 'mostafa hassan', 'mostafa44@email.com', '7c222fb2927d828af22f592134e8932480637c0d', 0, '638531669eac93.66727341.jpg'),
(21, 'eslam kamel', 'eslam@email.com', 'cba92ff486abfcdb7255f8f211e807146268b37b', 0, '638bc2f2d3cbe7.88591657.jpg'),
(24, 'mmmm1234', 'm1234@m.com', '99106e868923f8e03db721cd81368eaef2ca8ba1', 0, '638caeaff30854.17022126.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
