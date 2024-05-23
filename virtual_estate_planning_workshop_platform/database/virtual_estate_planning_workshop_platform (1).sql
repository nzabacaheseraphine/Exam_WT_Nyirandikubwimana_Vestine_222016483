-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 11:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_estate_planning_workshop_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `attendee_id` int(12) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT 'not null',
  `location` varchar(200) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`attendee_id`, `workshop_id`, `name`, `email`, `gender`, `location`, `registration_date`) VALUES
(2, 1, 'Ntwari Brain', 'ntwaribr@gmail.com', 'male', 'Kigali', '2024-05-21 20:22:25'),
(3, 3, 'vestine Isimbi', 'veve123@gmail.com', 'female', 'Muhanga', '2024-05-21 20:06:31'),
(5, 2, 'Kaliza Kelly', 'kelly120@gmail.com', 'female', 'Huye', '2024-05-21 20:22:52'),
(6, 3, 'Niganze Regis', 'regis32@gmail.com', 'male', 'Uganda kampala', '2024-05-21 19:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `user_id`, `session_id`, `status`, `enrollment_date`) VALUES
(1, 1, 2, 'cancled', '2024-05-14 19:03:50'),
(3, 1, 1, 'pending', '2024-04-29 10:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `estateplanningresource`
--

CREATE TABLE `estateplanningresource` (
  `resource_id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resource_name` varchar(200) NOT NULL,
  `resource_type` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `uploaded_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estateplanningresource`
--

INSERT INTO `estateplanningresource` (`resource_id`, `user_id`, `resource_name`, `resource_type`, `description`, `uploaded_date`) VALUES
(1, 1, 'Estate Planning Guides', 'document', 'Comprehensive guide to estate planning', '2024-05-13 01:24:34'),
(3, 2, 'Administration support', 'Animation slides', 'help staff administration to perform easy their activities', '2024-05-15 12:35:03'),
(4, 6, 'Estate Planning Guides', 'templates', 'Comprehensive guide to estate planning', '2024-05-18 13:28:07'),
(5, 9, 'Estate Planning Guides', 'document', 'help staff administration to perform easy their activity', '2024-05-22 12:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `attendee_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `submission_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `workshop_id`, `attendee_id`, `comments`, `submission_date`) VALUES
(1, 2, 2, 'it was so interested', '2024-05-12 00:00:00'),
(3, 3, 6, 'Thank you so much for your and services and how you care our customers ', '2024-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(12) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `qualification` varchar(255) NOT NULL,
  `areaspecialized` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `workshop_id`, `session_id`, `name`, `contact`, `qualification`, `areaspecialized`) VALUES
(1, 2, 1, 'Ntwari Brino', '0785678900', 'PHD', 'Cival Engeneering'),
(2, 3, 2, 'GASANA Theogenne', '0785678900', 'PHD', 'HR'),
(4, 1, 2, 'Rwibutso Gianni', '0789654320', 'A0', 'English Center');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `material_name` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `upload_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `user_id`, `material_name`, `description`, `upload_date`) VALUES
(1, 1, 'Tax Implications Presentation', 'Slides and notes explaining tax implications related to estate planning and inheritance.', '2024-05-12 00:00:00'),
(2, 1, 'Virtual Gadgets ', 'Provides interactive elements for users to engage with, such as screens, controls, or utilities.', '2024-05-12 23:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amountpaid` int(25) DEFAULT NULL,
  `paymentmethods` varchar(200) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `amountpaid`, `paymentmethods`, `payment_date`) VALUES
(1, 1, 50900, 'cash', '2024-05-13 03:40:07'),
(2, 1, 5009, 'cheque', '2024-04-22 05:20:20'),
(4, 1, 700, 'cash in hand', '2024-05-13 17:50:06'),
(6, 2, 3200, 'cash', '2024-05-22 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(12) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `topic` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `uploaded_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `workshop_id`, `topic`, `description`, `duration`, `uploaded_time`) VALUES
(1, 1, 'Importance of estate planning', 'in this topic you make research and summary in more than two pages.', '4 hours', '2024-05-12 21:56:44'),
(2, 1, 'How online estate planning workshop platform work ', 'minimun ten pages and  but it on references', '6hours', '2024-05-12 22:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `dob` int(45) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `dob`, `contact`, `username`, `email`, `password`, `role`) VALUES
(1, 'Isimbi Nelly', 2000, '0784567324', 'Nelly', 'isimbinelly12@gmail.com', '1122', 'instructor'),
(2, 'Loic Nkurunziza', 1999, '07886607890', '', 'loic@gmail.com', '$2y$10$byG2fGrQYNIztm9fSWwFM.jqYwxySjsn1YS5Bjoht.OR3RIUeKPSW', 'admin'),
(3, 'Nyiraneza vestine', 1970, '0785678900', 'vestine', 'vesti@gmail.com', '$2y$10$LHvvbv.piOxmTE51p9FKfuMOfI18pY4.fyhk.Y.mjiiyPKDo.5t8m', 'instructor'),
(4, 'Beatrice Madam', 1967, '0781069265', 'Beatrice', 'beatrice1@gmail.com', '$2y$10$kXw6oMwQFAEPTkUKZY9LROUmZVlRFCNKmv/O77zCLEH.G71DJH2nC', 'admin'),
(5, 'minani', 2008, '0798765432', 'minani', 'minani@gmail.com', '$2y$10$IcWMq8MVFhV1c.wL4Bn0Ce163Be7O.uSipZ8iYHiVkR/M0pJuLrw2', 'instructor'),
(6, 'Nyiraneza vestine', 1962, '0785678909', 'VEVE', 'veve09@gmail.com', '$2y$10$uiRXxaLBLVXXWhzDWYrwjeKpsuVOQvmLlYEgH2FEOlWUjPaoZc516', 'attendee'),
(7, 'Nyiraneza vestine', 2000, '07886607890', 'veve', 'veve3@gmail.com', '$2y$10$r7fPuPrjKBc1FpLUbcrWOeRj6qx7j4cBW2gtnO8.VVMBsRNTstyBm', 'attendee'),
(8, 'Beatrice', 1972, '07884666657', 'bea', 'beatrice25@gmail.com', '$2y$10$s3LRsdqBdv4j6mywM4b3duqnd5zWJtFCjJ/R2I/NqorQG6cLcLr0m', 'attendee'),
(9, 'iradukunda Alice', 2000, '0789578900', 'Alice', 'alice123@gmail.com', '$2y$10$0FoZpe2YkDkIyP1HhY6AbOEJW09GrxO/oAJGwak1KeU31BqSpJZoO', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshop_id` int(12) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshop_id`, `user_id`, `name`, `description`, `date_time`) VALUES
(1, 1, 'Basic Estate Planning', 'provide a foundational understanding of estate planning principles for beginners', '2024-05-12 07:00:00'),
(2, 1, 'Advanced Estate Planning', 'These workshops target individuals with more specific or sophisticated estate planning needs.', '2024-05-14 07:00:00'),
(3, 1, ' Administration and Probate Workshops', 'Participants learn about the legal procedures involved in settling an estate after someone passes away.', '2024-04-30 05:30:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`attendee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `estateplanningresource`
--
ALTER TABLE `estateplanningresource`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `attendee_id` (`attendee_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `workshop_id` (`workshop_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `attendee_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `estateplanningresource`
--
ALTER TABLE `estateplanningresource`
  MODIFY `resource_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshop_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `attendee_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- Constraints for table `estateplanningresource`
--
ALTER TABLE `estateplanningresource`
  ADD CONSTRAINT `estateplanningresource_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`attendee_id`) REFERENCES `attendee` (`attendee_id`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`),
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshop` (`workshop_id`);

--
-- Constraints for table `workshop`
--
ALTER TABLE `workshop`
  ADD CONSTRAINT `workshop_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
