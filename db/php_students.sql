-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220826.811789df3c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 06:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_students`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `course` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `stu_name`, `email`, `phone`, `course`) VALUES
(25, 'Dieter Kir', 'dofut@55.com', '553453453', 'Beatae sed a ipsam d'),
(27, 'Jonas Castillo', 'cipokoz@mailinator.com', '534535', 'Neque quos dolore re'),
(30, 'Danielle Slater', 'qynef@mailinator.com', '535353', 'Consequatur elit ne'),
(31, 'Sybill Sherman', 'dugehesu@mailinator.com', '523553', 'Officiis tempore si'),
(33, 'Gary Shannon', 'jofi@mailinator.com', '53353', 'Id sit incidunt ob'),
(34, 'Kane Norton', 'ryximeb@mailinator.com', '535353', 'At exercitationem ex'),
(35, 'Preston Valencia', 'mypo@mailinator.com', '53453', 'Nesciunt error itaqs'),
(38, 'sagor', 'sagor@gmail.com', '01823348589', 'fff'),
(42, 'Kopil das gupta', 'kopil@gmail.com', '01608603032', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(39) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(22, 'Chayan Das Gup[ta', 'chayan@gmail.com', '7982479ee34ad16b3780988c0ee0ed40'),
(24, 'kopil', 'kopil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(25, 'Sarah Hunter', 'kosavanehu@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(26, 'Boris Henson', 'semokutif@mailinator.com', 'c824aa60055ca50ef24388a0a9b15dcd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
