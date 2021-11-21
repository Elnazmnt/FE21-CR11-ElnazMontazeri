-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 11:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr11_petadoption_elnazmontazeri`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr11_petadoption_elnazmontazeri` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_cr11_petadoption_elnazmontazeri`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` smallint(5) NOT NULL,
  `animal_name` varchar(30) NOT NULL,
  `animal_photo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `hobbies` varchar(50) DEFAULT NULL,
  `breed` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `animal_name`, `animal_photo`, `location`, `description`, `size`, `age`, `hobbies`, `breed`) VALUES
(1, 'Tedi', 'tedi.jpg', 'Kenyongasse 23-25', 'a sweet and lovely dog', 'small', 1, 'Chasing and Giving You Kisses', 'Pomeranian'),
(2, 'Fredi', 'fredi.jpg', 'Prager Str. 20', 'a sweet and lovely cat', 'small', 2, 'Stalking,Eating,Purring', 'Peterbald'),
(3, 'Nina', 'nina.jpg', 'Siemensstraße 43', 'a very clever turtle', 'large', 9, 'Reading and learning', 'Chinese Box Turtle'),
(4, 'Natali', 'natali.jpg', 'Himmelstraße 20-24', 'Natalie is very beautiful and attractive', 'small', 10, 'People Watching.', 'Persian cat'),
(5, 'Sasha', 'sasha.jpg', 'Trummelhofgasse 2', 'If you have Sasha, you will never be alone again', 'small', 3, 'Talking and eating', 'Australian King Parrot'),
(6, 'Edvard', 'edvard.jpg', 'boblinger strasse 12', 'a unique charming animal', 'large', 12, 'Change colors and think', 'African chameleon'),
(7, 'Patrick', 'patrick.jpg', 'mariahilferstraße', 'Patik is very smart and fast', 'small', 1, 'he makes you love herself', 'Dutch squirrel'),
(8, 'Alfredo', 'alfredo.jpeg', 'Thaliastraße 11', 'I can only say that Alfredo is amazing', 'large', 11, 'Play with children and watch TV', 'Bulldog'),
(9, 'Niki', 'niki.jpg', 'Wiener Straße 12', NULL, 'small', 2, 'People Watching', 'Bengal cat'),
(10, 'Maroni', 'maroni.jpg', 'Universitätsstraße 74', NULL, 'large', 4, 'Play with children and watch TV', 'Afghan Hound');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone_number`, `address`, `picture`, `email`, `password`, `status`) VALUES
(1, 'eli', 'mnt', 49732900, 'Vienna', 'eli.jpg', 'elnaz@yahoo.com', '123456', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
