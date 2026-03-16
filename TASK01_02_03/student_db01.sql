-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2026 at 05:53 PM
-- Server version: 8.0.42
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db01`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `department` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `dob`, `department`, `phone`, `password`) VALUES
(1, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '123'),
(2, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '123'),
(3, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'ECE', '6382338647', '123'),
(4, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '123'),
(5, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '1234'),
(6, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '123'),
(7, 'NIVETHITHA P', 'itzxnivethithaxz@gmail.com', '2005-03-30', 'CSE(AI-DS)', '6382338647', '122'),
(8, 'NIVETHITHA P', 'vtu24312@veltech.edu.in', '2005-03-20', 'ECE', '6382338647', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
