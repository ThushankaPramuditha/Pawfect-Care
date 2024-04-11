-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 07, 2024 at 02:42 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawfect-care`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulancedrivers`
--

CREATE TABLE `ambulancedrivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `license` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ambulancedrivers`
--

INSERT INTO `ambulancedrivers` (`id`, `name`, `address`, `contact`, `nic`, `license`, `user_id`) VALUES
(2, 'saliya', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '719274927485', '345827', 29);

-- --------------------------------------------------------

--
-- Table structure for table `daycarestaff`
--

CREATE TABLE `daycarestaff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `qualifications` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daycarestaff`
--

INSERT INTO `daycarestaff` (`id`, `name`, `address`, `contact`, `nic`, `qualifications`, `user_id`) VALUES
(1, 'samudi', 'no.4, Rajagiriya rd', '0772020202', '333333333333', 'ftvy', 23);

-- --------------------------------------------------------

--
-- Table structure for table `medstaff`
--

CREATE TABLE `medstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `qualifications` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medstaff`
--

INSERT INTO `medstaff` (`id`, `name`, `address`, `contact`, `nic`, `qualifications`, `user_id`) VALUES
(1, 'nirmal', 'no.7, Katubedda', '0771111111', '222222222222', 'phd', 22);

-- --------------------------------------------------------

--
-- Table structure for table `petowners`
--

CREATE TABLE `petowners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `NIC` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petowners`
--

INSERT INTO `petowners` (`id`, `name`, `address`, `contact`, `NIC`, `user_id`) VALUES
(2, 'Himasha Amandi', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '200180500868', 20),
(3, 'Himasha Amandi', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '200180500868', 21),
(4, 'Himasha Amandi', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '200180500868', 26);

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `qualifications` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `name`, `address`, `contact`, `nic`, `qualifications`, `user_id`) VALUES
(1, 'mandy', 'no.8, Dodangoda rd', '0776666666', '888888888888', ' cqacac  ', 24);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `description`) VALUES
(5, 'ftft', 'ijj'),
(6, 'test 2', 'hiueif'),
(7, 'Veterinary Care', 'Our experienced veterinarians provide routine check-ups, vaccinations, and medical care to keep your pet in great shape.\n'),
(9, 'Pet Ambulance', ' Swift and compassionate transportation for your pet during emergencies. Your pet\'s well-being is our priority\r\n      ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type` enum('petowner','receptionist','medical-staff','daycare-staff','ambulance-driver','veterinarian','admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `password`, `created_at`, `updated_at`, `status`) VALUES
(14, 'veterinarian', 'aa@gmail.com', 'hUkxrwjJ0uIxv0SgfeSq6A==:775bab3fac3d2fbc34285498c155096ed676c5f51362d932b4ec4adc05ddee7d', '2024-01-10 20:03:29', '2024-01-10 20:03:29', 'active'),
(20, 'petowner', 'amda@gmail.com', '2PTfV9cM6eAiKnZ0VunCDw==:2d00345f59c9617378afd1699e54cfc8e610ab31ee8527177f816c5024936b26', '2024-01-10 20:52:31', '2024-01-10 20:52:31', 'active'),
(21, 'petowner', 'ama@gmail.com', 'KoZN0DGb9IrT1FsX6/2Afw==:7efe8542a5f121c77bca44c2d70f5620dc6f9f6299dc3f0108837913859e84c2', '2024-01-11 08:58:06', '2024-01-11 08:58:06', 'active'),
(22, 'medical-staff', 'nirmal@gmail.com', 'uX8SqhEobDeA6TdQ9Rf10g==:651c9fcf1790ed47a8fd267d891f0adb35498c7dbec15b66dc5ac69959ca4b0e', '2024-01-29 07:45:26', '2024-01-29 07:45:26', 'active'),
(23, 'daycare-staff', 'samudi@gmail.com', 'oJfJEqF7kyCnQIwpYWuICA==:c1fc360bdbc67c0c3e13fa94f6e0e5a46f514fc6894e1ab5479903ae45921e51', '2024-01-29 07:58:22', '2024-01-29 07:58:22', 'active'),
(24, 'receptionist', 'mandy@gmail.com', 'M1eGtKQERzDFyGojvvCo3g==:31a2f4c684a344e834a72c25b3cff2e8293ba9c3ea54cb5957640ac88a1e0bde', '2024-01-29 07:59:30', '2024-01-29 07:59:30', 'active'),
(25, 'veterinarian', 'amandi@gmail.com', 'fHUTQ+SM6SQGNQX48H/rnA==:ea4af991b6b34366eae59a70e3a0173b3e912650918a08fad1c4a1a786570dcd', '2024-01-30 10:10:18', '2024-01-30 10:10:18', 'active'),
(26, 'petowner', 'aman@gmail.com', 'u7bnkl3jH0NGhnJClojAIw==:24ea5db9212d93c39534080d83939026151e7dfdcf7ac409c81431ababdef803', '2024-02-01 08:12:56', '2024-02-01 08:12:56', 'active'),
(27, 'veterinarian', 'sasini@gmail.com', 'fbtF7jLikvjfAnzAVk10IQ==:fdf3d717ff0cacc6f81c0e45fb517682bfc84a595108d77a007f169e55600517', '2024-02-01 08:54:13', '2024-02-01 08:54:13', 'active'),
(29, 'ambulance-driver', 'saliya1@gmail.com', 'vvIcJ4vHTU5hA62gnNPMhg==:ac004dc13d2ba510e3c51a4f2acd78b7ecfac5b4cb4f77dadd00dff1916c5045', '2024-02-02 05:41:45', '2024-02-02 05:41:45', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `veterinarians`
--

CREATE TABLE `veterinarians` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `veterinarians`
--

INSERT INTO `veterinarians` (`id`, `name`, `address`, `contact`, `nic`, `qualifications`, `user_id`) VALUES
(8, 'Himasha Amandi', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '200180500868', 'phd', 14),
(9, 'Amandi', 'Hospital Road, kandaana', '0774441482', '719274927411', 'srd223', 25),
(10, 'Sasini', 'Hospital Road, Dodangoda,Kalutara', '0774441482', '200180500868', 'MBBS', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulancedrivers`
--
ALTER TABLE `ambulancedrivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `daycarestaff`
--
ALTER TABLE `daycarestaff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `medstaff`
--
ALTER TABLE `medstaff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `petowners`
--
ALTER TABLE `petowners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_veterinarians_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulancedrivers`
--
ALTER TABLE `ambulancedrivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daycarestaff`
--
ALTER TABLE `daycarestaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medstaff`
--
ALTER TABLE `medstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petowners`
--
ALTER TABLE `petowners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `veterinarians`
--
ALTER TABLE `veterinarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambulancedrivers`
--
ALTER TABLE `ambulancedrivers`
  ADD CONSTRAINT `ambulancedrivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `daycarestaff`
--
ALTER TABLE `daycarestaff`
  ADD CONSTRAINT `daycarestaff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `medstaff`
--
ALTER TABLE `medstaff`
  ADD CONSTRAINT `medstaff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `petowners`
--
ALTER TABLE `petowners`
  ADD CONSTRAINT `petowners_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD CONSTRAINT `receptionists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD CONSTRAINT `fk_veterinarians_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
