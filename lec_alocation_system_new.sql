-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 05:47 PM
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
-- Database: `lec_alocation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
('adm1212', 'admin', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allocation_id` varchar(5) NOT NULL,
  `batch_id` varchar(5) DEFAULT NULL,
  `day_id` varchar(2) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `hall_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`allocation_id`, `batch_id`, `day_id`, `start_time`, `end_time`, `course_id`, `hall_id`) VALUES
('A1', '20GES', 'D1', '08:00:00', '09:00:00', 'FC12217', 'LH9'),
('A10', '20GES', 'D2', '08:00:00', '09:00:00', 'FC21324', 'LH2'),
('A103', '18GES', 'D3', '08:00:00', '09:00:00', 'FC22130', 'LH2'),
('A104', '18GES', 'D3', '09:00:00', '10:00:00', 'FC22130', 'LH2'),
('A105', '18GES', 'D3', '10:00:00', '11:00:00', 'FC22238', 'LH2'),
('A106', '18GES', 'D3', '11:00:00', '12:00:00', 'FC22238', 'LH2'),
('A107', '18GES', 'D3', '13:00:00', '14:00:00', 'FC22211', 'LH2'),
('A108', '18GES', 'D3', '14:00:00', '15:00:00', 'FC22239', 'LH3'),
('A109', '18GES', 'D3', '15:00:00', '16:00:00', 'FC22239', 'LH3'),
('A11', '20GES', 'D2', '09:00:00', '10:00:00', 'FC21324', 'LH2'),
('A110', '18GES', 'D3', '16:00:00', '17:00:00', 'FC22239', 'LH3'),
('A111', '18GES', 'D3', '17:00:00', '18:00:00', NULL, NULL),
('A112', '18GES', 'D4', '08:00:00', '09:00:00', 'FC22153', 'LH2'),
('A113', '18GES', 'D4', '09:00:00', '10:00:00', 'FC22153', 'LH2'),
('A114', '18GES', 'D4', '10:00:00', '11:00:00', 'FC22351', 'LH3'),
('A115', '18GES', 'D4', '11:00:00', '12:00:00', 'FC22351', 'LH3'),
('A116', '18GES', 'D4', '13:00:00', '14:00:00', 'FC22362', 'LH9'),
('A117', '18GES', 'D4', '14:00:00', '15:00:00', 'FC22362', 'LH9'),
('A118', '18GES', 'D4', '15:00:00', '16:00:00', 'FC22362', 'LH9'),
('A119', '18GES', 'D4', '16:00:00', '17:00:00', 'FC22362', 'LH9'),
('A12', '20GES', 'D2', '10:00:00', '11:00:00', 'FC21212', 'LH2'),
('A120', '18GES', 'D4', '17:00:00', '18:00:00', NULL, NULL),
('A121', '18GES', 'D5', '08:00:00', '09:00:00', 'FC22211', 'LH2'),
('A122', '18GES', 'D5', '09:00:00', '10:00:00', 'FC22211', 'LH2'),
('A123', '18GES', 'D5', '10:00:00', '11:00:00', 'FC22362', 'LH2'),
('A124', '18GES', 'D5', '11:00:00', '12:00:00', 'FC22226', 'LH2'),
('A125', '18GES', 'D5', '13:00:00', '14:00:00', NULL, NULL),
('A126', '18GES', 'D5', '14:00:00', '15:00:00', NULL, NULL),
('A127', '18GES', 'D5', '15:00:00', '16:00:00', NULL, NULL),
('A128', '18GES', 'D5', '16:00:00', '17:00:00', NULL, NULL),
('A129', '18GES', 'D5', '17:00:00', '18:00:00', NULL, NULL),
('A13', '20GES', 'D2', '11:00:00', '12:00:00', 'FC21212', 'LH2'),
('A130', '17GES', 'D1', '08:00:00', '09:00:00', NULL, NULL),
('A131', '17GES', 'D1', '09:00:00', '10:00:00', NULL, NULL),
('A132', '17GES', 'D1', '10:00:00', '11:00:00', 'LM32223', 'LH4'),
('A133', '17GES', 'D1', '11:00:00', '12:00:00', 'LM32223', 'LH4'),
('A134', '17GES', 'D1', '13:00:00', '14:00:00', 'GS32351', 'LH6'),
('A135', '17GES', 'D1', '14:00:00', '15:00:00', 'GS32351', 'LH6'),
('A136', '17GES', 'D1', '15:00:00', '16:00:00', 'LM32321', 'LH4'),
('A137', '17GES', 'D1', '16:00:00', '17:00:00', 'GS32351', 'LH6'),
('A138', '17GES', 'D1', '17:00:00', '18:00:00', 'LM32321', 'LH4'),
('A139', '17GES', 'D1', '18:00:00', '19:00:00', 'GS32351', 'LH6'),
('A14', '20GES', 'D2', '13:00:00', '14:00:00', 'FC21114', 'LH2'),
('A140', '17GES', 'D1', '19:00:00', '20:00:00', NULL, NULL),
('A141', '17GES', 'D2', '08:00:00', '09:00:00', 'RS32243', 'LH6'),
('A142', '17GES', 'D2', '09:00:00', '10:00:00', 'RS32241', 'LH6'),
('A143', '17GES', 'D2', '10:00:00', '11:00:00', 'SG32211', 'LH5'),
('A144', '17GES', 'D2', '10:00:00', '11:00:00', 'RS32241', 'LH6'),
('A145', '17GES', 'D2', '10:00:00', '11:00:00', 'GS32254', 'LH4'),
('A146', '17GES', 'D2', '10:00:00', '11:00:00', 'HS32337', 'LH7'),
('A147', '17GES', 'D2', '11:00:00', '12:00:00', 'SG32211', 'LH5'),
('A148', '17GES', 'D2', '11:00:00', '12:00:00', 'GS32254', 'LH6'),
('A149', '17GES', 'D2', '11:00:00', '12:00:00', 'HS32337', 'LH7'),
('A15', '20GES', 'D2', '14:00:00', '15:00:00', 'FC21114', 'LH2'),
('A150', '17GES', 'D2', '13:00:00', '14:00:00', 'RS32243', 'LH6'),
('A151', '17GES', 'D2', '14:00:00', '15:00:00', 'RS32243', 'LH6'),
('A152', '17GES', 'D2', '15:00:00', '16:00:00', 'RS32243', 'LH6'),
('A153', '17GES', 'D2', '16:00:00', '17:00:00', 'RS32348', 'LH6'),
('A154', '17GES', 'D2', '17:00:00', '18:00:00', 'RS32348', 'LH6'),
('A155', '17GES', 'D3', '08:00:00', '09:00:00', 'SG32216', 'LH5'),
('A156', '17GES', 'D3', '08:00:00', '09:00:00', 'GS32351', 'LH6'),
('A157', '17GES', 'D3', '08:00:00', '09:00:00', 'LM32226', 'LH4'),
('A158', '17GES', 'D3', '08:00:00', '09:00:00', 'HS32331', 'LH7'),
('A159', '17GES', 'D3', '09:00:00', '10:00:00', 'SG32216', 'LH5'),
('A16', '20GES', 'D2', '15:00:00', '16:00:00', 'FC21328', 'LH2'),
('A160', '17GES', 'D3', '09:00:00', '10:00:00', 'GS32351', 'LH6'),
('A161', '17GES', 'D3', '09:00:00', '10:00:00', 'LM32226', 'LH4'),
('A162', '17GES', 'D3', '09:00:00', '10:00:00', 'HS32331', 'LH7'),
('A163', '17GES', 'D3', '09:00:00', '10:00:00', 'RS32241', 'LH6'),
('A164', '17GES', 'D3', '10:00:00', '11:00:00', 'GS32253', 'LH4'),
('A165', '17GES', 'D3', '11:00:00', '12:00:00', 'GS32253', 'LH4'),
('A166', '17GES', 'D3', '13:00:00', '14:00:00', 'GS32253', 'LH6'),
('A167', '17GES', 'D3', '14:00:00', '15:00:00', 'GS32253', 'LH6'),
('A168', '17GES', 'D3', '15:00:00', '16:00:00', 'SG32314', 'LH5'),
('A169', '17GES', 'D3', '15:00:00', '16:00:00', 'GS32258', 'LH6'),
('A17', '20GES', 'D2', '16:00:00', '17:00:00', 'FC21328', 'LH2'),
('A170', '17GES', 'D3', '16:00:00', '17:00:00', 'SG32314', 'LH5'),
('A171', '17GES', 'D3', '16:00:00', '17:00:00', 'GS32258', 'LH6'),
('A172', '17GES', 'D3', '17:00:00', '18:00:00', NULL, NULL),
('A173', '17GES', 'D4', '08:00:00', '09:00:00', NULL, NULL),
('A174', '17GES', 'D4', '09:00:00', '10:00:00', 'RS32348', 'LH6'),
('A175', '17GES', 'D4', '10:00:00', '11:00:00', 'GS32258', 'LH4'),
('A176', '17GES', 'D4', '10:00:00', '11:00:00', 'RS32348', 'LH6'),
('A177', '17GES', 'D4', '11:00:00', '12:00:00', 'GS32258', 'LH4'),
('A178', '17GES', 'D4', '11:00:00', '12:00:00', 'RS32348', 'LH6'),
('A179', '17GES', 'D4', '13:00:00', '14:00:00', 'RS32347', 'LH6'),
('A18', '20GES', 'D2', '17:00:00', '18:00:00', 'FC21328', 'LH2'),
('A180', '17GES', 'D4', '14:00:00', '15:00:00', 'RS32347', 'LH6'),
('A181', '17GES', 'D4', '15:00:00', '16:00:00', 'RS32347', 'LH6'),
('A182', '17GES', 'D4', '16:00:00', '17:00:00', 'RS32347', 'LH6'),
('A183', '17GES', 'D4', '17:00:00', '18:00:00', NULL, NULL),
('A184', '17GES', 'D5', '08:00:00', '09:00:00', 'SG32217', 'LH5'),
('A185', '17GES', 'D5', '09:00:00', '10:00:00', 'SG32217', 'LH5'),
('A186', '17GES', 'D5', '10:00:00', '11:00:00', NULL, NULL),
('A187', '17GES', 'D5', '11:00:00', '12:00:00', NULL, NULL),
('A188', '17GES', 'D5', '13:00:00', '14:00:00', NULL, NULL),
('A189', '17GES', 'D5', '14:00:00', '15:00:00', NULL, NULL),
('A19', '20GES', 'D3', '08:00:00', '09:00:00', 'FC21241', 'LH2'),
('A190', '17GES', 'D5', '15:00:00', '16:00:00', NULL, NULL),
('A191', '17GES', 'D5', '16:00:00', '17:00:00', NULL, NULL),
('A192', '17GES', 'D5', '17:00:00', '18:00:00', NULL, NULL),
('A193', '16GES', 'D1', '08:00:00', '09:00:00', NULL, NULL),
('A194', '16GES', 'D1', '09:00:00', '10:00:00', 'HS41332', 'LH7'),
('A195', '16GES', 'D1', '10:00:00', '11:00:00', 'HS41332', 'LH7'),
('A196', '16GES', 'D1', '10:00:00', '11:00:00', 'LM41122', 'LH10'),
('A197', '16GES', 'D1', '10:00:00', '11:00:00', 'GS41260', 'LH9'),
('A198', '16GES', 'D1', '11:00:00', '12:00:00', 'HS41332', 'LH7'),
('A199', '16GES', 'D1', '11:00:00', '12:00:00', 'LM41122', 'LH10'),
('A2', '20GES', 'D1', '09:00:00', '10:00:00', 'FC12217', 'LH9'),
('A20', '20GES', 'D3', '09:00:00', '10:00:00', 'FC21241', 'LH2'),
('A200', '16GES', 'D1', '11:00:00', '12:00:00', 'GS41260', 'LH9'),
('A201', '16GES', 'D1', '13:00:00', '14:00:00', 'SG41218', 'LH5'),
('A202', '16GES', 'D1', '14:00:00', '15:00:00', 'SG41218', 'LH5'),
('A203', '16GES', 'D1', '15:00:00', '16:00:00', NULL, NULL),
('A204', '16GES', 'D1', '16:00:00', '17:00:00', NULL, NULL),
('A205', '16GES', 'D1', '17:00:00', '18:00:00', NULL, NULL),
('A206', '16GES', 'D2', '08:00:00', '09:00:00', 'RS41149', 'LH6'),
('A207', '16GES', 'D2', '09:00:00', '10:00:00', 'GS41152', 'LH3'),
('A208', '16GES', 'D2', '10:00:00', '11:00:00', 'SG41313', 'LH5'),
('A209', '16GES', 'D2', '10:00:00', '11:00:00', 'LM41225', 'LH10'),
('A21', '20GES', 'D3', '10:00:00', '11:00:00', 'FC21342', 'LH8'),
('A210', '16GES', 'D2', '10:00:00', '11:00:00', 'HS41138', 'LH7'),
('A211', '16GES', 'D2', '10:00:00', '11:00:00', 'RS41244', 'LH10'),
('A212', '16GES', 'D2', '11:00:00', '12:00:00', 'SG41313', 'LH7'),
('A213', '16GES', 'D2', '11:00:00', '12:00:00', 'LM41225', 'LH4'),
('A214', '16GES', 'D2', '11:00:00', '12:00:00', 'RS41244', 'LH9'),
('A215', '16GES', 'D2', '13:00:00', '14:00:00', 'SG41313', 'LH5'),
('A216', '16GES', 'D2', '13:00:00', '14:00:00', 'RS41342', 'LH9'),
('A217', '16GES', 'D2', '14:00:00', '15:00:00', 'RS41342', 'LH9'),
('A218', '16GES', 'D2', '15:00:00', '16:00:00', 'RS41245', 'LH9'),
('A219', '16GES', 'D2', '16:00:00', '17:00:00', 'RS41245', 'LH9'),
('A22', '20GES', 'D3', '11:00:00', '12:00:00', 'FC21342', 'LH8'),
('A220', '16GES', 'D2', '17:00:00', '18:00:00', 'RS41245', 'LH9'),
('A221', '16GES', 'D3', '08:00:00', '09:00:00', 'SG41212', 'LH5'),
('A222', '16GES', 'D3', '08:00:00', '09:00:00', 'GS41260', 'LH12'),
('A223', '16GES', 'D3', '09:00:00', '10:00:00', 'SG41212', 'LH5'),
('A224', '16GES', 'D3', '10:00:00', '11:00:00', 'SG41215', 'LH5'),
('A225', '16GES', 'D3', '10:00:00', '11:00:00', 'LM41228', 'LH4'),
('A226', '16GES', 'D3', '10:00:00', '11:00:00', 'HS41134', 'LH7'),
('A227', '16GES', 'D3', '11:00:00', '12:00:00', 'SG41215', 'LH5'),
('A228', '16GES', 'D3', '11:00:00', '12:00:00', 'LM41228', 'LH12'),
('A229', '16GES', 'D3', '11:00:00', '12:00:00', 'RS41246', 'LH6'),
('A23', '20GES', 'D3', '13:00:00', '14:00:00', 'FC21324', 'LH2'),
('A230', '16GES', 'D3', '13:00:00', '14:00:00', 'GS41255', 'LH12'),
('A231', '16GES', 'D3', '14:00:00', '15:00:00', 'GS41255', 'LH12'),
('A232', '16GES', 'D3', '15:00:00', '16:00:00', 'LM41229', 'LH12'),
('A233', '16GES', 'D3', '16:00:00', '17:00:00', 'LM41229', 'LH12'),
('A234', '16GES', 'D3', '17:00:00', '18:00:00', NULL, NULL),
('A235', '16GES', 'D4', '08:00:00', '09:00:00', 'GS41257', 'LH4'),
('A236', '16GES', 'D4', '08:00:00', '09:00:00', 'RS41342', 'LH4'),
('A237', '16GES', 'D4', '09:00:00', '10:00:00', 'RS41342', 'LH12'),
('A238', '16GES', 'D4', '10:00:00', '11:00:00', 'GS41257', 'LH12'),
('A239', '16GES', 'D4', '11:00:00', '12:00:00', 'RS41244', 'LH9'),
('A24', '20GES', 'D3', '14:00:00', '15:00:00', 'FC21129', 'LH2'),
('A240', '16GES', 'D4', '11:00:00', '12:00:00', 'GS41257', 'LH12'),
('A241', '16GES', 'D4', '13:00:00', '14:00:00', 'GS41256', 'LH12'),
('A242', '16GES', 'D4', '14:00:00', '15:00:00', 'GS41256', 'LH12'),
('A243', '16GES', 'D4', '15:00:00', '16:00:00', 'GS41256', 'LH12'),
('A244', '16GES', 'D4', '16:00:00', '17:00:00', NULL, NULL),
('A245', '16GES', 'D4', '17:00:00', '18:00:00', NULL, NULL),
('A246', '16GES', 'D5', '08:00:00', '09:00:00', NULL, NULL),
('A247', '16GES', 'D5', '09:00:00', '10:00:00', NULL, NULL),
('A248', '16GES', 'D5', '10:00:00', '11:00:00', 'RS41246', 'LH12'),
('A249', '16GES', 'D5', '11:00:00', '12:00:00', 'RS41246', 'LH12'),
('A25', '20GES', 'D3', '15:00:00', '16:00:00', 'FC21129', 'LH2'),
('A250', '16GES', 'D5', '13:00:00', '14:00:00', 'LM41224', 'LH12'),
('A251', '16GES', 'D5', '14:00:00', '15:00:00', 'LM41224', 'LH12'),
('A252', '16GES', 'D5', '15:00:00', '16:00:00', NULL, 'LH12'),
('A253', '16GES', 'D5', '16:00:00', '17:00:00', NULL, 'LH12'),
('A254', '16GES', 'D5', '17:00:00', '18:00:00', NULL, 'LH12'),
('A26', '20GES', 'D3', '16:00:00', '17:00:00', NULL, NULL),
('A27', '20GES', 'D3', '17:00:00', '18:00:00', NULL, NULL),
('A28', '20GES', 'D4', '08:00:00', '09:00:00', 'FC21159', 'LH2'),
('A29', '20GES', 'D4', '09:00:00', '10:00:00', 'FC21159', 'LH2'),
('A3', '20GES', 'D1', '10:00:00', '11:00:00', 'FC12217', 'LH9'),
('A30', '20GES', 'D4', '10:00:00', '11:00:00', 'FC21248', 'LH3'),
('A31', '20GES', 'D4', '11:00:00', '12:00:00', 'FC21248', 'LH3'),
('A32', '20GES', 'D4', '13:00:00', '14:00:00', 'FC21328', 'LH11'),
('A33', '20GES', 'D4', '14:00:00', '15:00:00', 'FC21328', 'LH11'),
('A34', '20GES', 'D4', '15:00:00', '16:00:00', 'FC21328', 'LH11'),
('A35', '20GES', 'D4', '16:00:00', '17:00:00', 'FC21328', 'LH11'),
('A36', '20GES', 'D4', '17:00:00', '18:00:00', 'FC21328', 'LH11'),
('A37', '20GES', 'D5', '08:00:00', '09:00:00', 'FC21248', 'LH2'),
('A38', '20GES', 'D5', '09:00:00', '10:00:00', 'FC21248', 'LH2'),
('A39', '20GES', 'D5', '10:00:00', '11:00:00', 'FC21248', 'LH8'),
('A4', '20GES', 'D1', '11:00:00', '12:00:00', 'FC12217', 'LH9'),
('A40', '20GES', 'D5', '11:00:00', '12:00:00', 'FC21241', 'LH8'),
('A41', '20GES', 'D5', '13:00:00', '14:00:00', 'FC21342', 'LH9'),
('A42', '20GES', 'D5', '14:00:00', '15:00:00', 'FC21342', 'LH9'),
('A43', '20GES', 'D5', '15:00:00', '16:00:00', 'FC21342', 'LH9'),
('A44', '20GES', 'D5', '16:00:00', '17:00:00', NULL, NULL),
('A45', '20GES', 'D5', '17:00:00', '18:00:00', NULL, NULL),
('A5', '20GES', 'D1', '13:00:00', '14:00:00', 'FC12232', 'LH2'),
('A54', '19GES', 'D2', '08:00:00', '09:00:00', 'FC21324', 'LH3'),
('A55', '19GES', 'D2', '09:00:00', '10:00:00', 'FC21324', 'LH3'),
('A56', '19GES', 'D2', '10:00:00', '11:00:00', 'FC21212', 'LH3'),
('A57', '19GES', 'D2', '11:00:00', '12:00:00', 'FC21212', 'LH3'),
('A58', '19GES', 'D2', '13:00:00', '14:00:00', 'FC21114', 'LH3'),
('A59', '19GES', 'D2', '14:00:00', '15:00:00', 'FC21114', 'LH3'),
('A6', '20GES', 'D1', '14:00:00', '15:00:00', 'FC12232', 'LH2'),
('A60', '19GES', 'D2', '15:00:00', '16:00:00', 'FC21328', 'LH3'),
('A61', '19GES', 'D2', '16:00:00', '17:00:00', 'FC21328', 'LH3'),
('A62', '19GES', 'D2', '17:00:00', '18:00:00', 'FC21328', 'LH3'),
('A63', '19GES', 'D3', '08:00:00', '09:00:00', 'FC21241', 'LH3'),
('A64', '19GES', 'D3', '09:00:00', '10:00:00', 'FC21241', 'LH3'),
('A65', '19GES', 'D3', '10:00:00', '11:00:00', 'FC21342', 'LH3'),
('A66', '19GES', 'D3', '11:00:00', '12:00:00', 'FC21342', 'LH3'),
('A67', '19GES', 'D3', '13:00:00', '14:00:00', 'FC21324', 'LH3'),
('A68', '19GES', 'D3', '14:00:00', '15:00:00', 'FC21129', 'LH3'),
('A69', '19GES', 'D3', '15:00:00', '16:00:00', 'FC21129', 'LH3'),
('A7', '20GES', 'D1', '15:00:00', '16:00:00', NULL, NULL),
('A70', '19GES', 'D4', '08:00:00', '09:00:00', 'FC21159', 'LH3'),
('A71', '19GES', 'D4', '09:00:00', '10:00:00', 'FC21159', 'LH3'),
('A72', '19GES', 'D4', '10:00:00', '11:00:00', NULL, NULL),
('A73', '19GES', 'D4', '11:00:00', '12:00:00', NULL, NULL),
('A74', '19GES', 'D4', '13:00:00', '14:00:00', 'FC21328', 'LH11'),
('A75', '19GES', 'D4', '14:00:00', '15:00:00', 'FC21328', 'LH11'),
('A76', '19GES', 'D4', '15:00:00', '16:00:00', 'FC21328', 'LH11'),
('A77', '19GES', 'D4', '16:00:00', '17:00:00', 'FC21328', 'LH11'),
('A78', '19GES', 'D5', '08:00:00', '09:00:00', 'FC21248', 'LH3'),
('A79', '19GES', 'D5', '09:00:00', '10:00:00', 'FC21248', 'LH3'),
('A8', '20GES', 'D1', '16:00:00', '17:00:00', NULL, NULL),
('A80', '19GES', 'D5', '10:00:00', '11:00:00', 'FC21248', 'LH3'),
('A81', '19GES', 'D5', '11:00:00', '12:00:00', 'FC21241', 'LH3'),
('A82', '19GES', 'D5', '13:00:00', '14:00:00', 'FC21342', 'LH9'),
('A83', '19GES', 'D5', '14:00:00', '15:00:00', 'FC21342', 'LH9'),
('A84', '19GES', 'D5', '15:00:00', '16:00:00', 'FC21342', 'LH9'),
('A85', '18GES', 'D1', '08:00:00', '09:00:00', NULL, NULL),
('A86', '18GES', 'D1', '09:00:00', '10:00:00', NULL, NULL),
('A87', '18GES', 'D1', '10:00:00', '11:00:00', NULL, NULL),
('A88', '18GES', 'D1', '11:00:00', '12:00:00', 'FC22351', 'LH8'),
('A89', '18GES', 'D1', '13:00:00', '14:00:00', 'FC22351', 'LH8'),
('A9', '20GES', 'D1', '17:00:00', '18:00:00', NULL, NULL),
('A90', '18GES', 'D1', '14:00:00', '15:00:00', 'FC22351', 'LH8'),
('A91', '18GES', 'D1', '15:00:00', '16:00:00', 'FC22351', 'LH8'),
('A92', '18GES', 'D1', '16:00:00', '17:00:00', 'FC22351', 'LH8'),
('A93', '18GES', 'D1', '17:00:00', '18:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batch_id` varchar(10) NOT NULL,
  `batch_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batch_id`, `batch_name`) VALUES
('16GES', '16/17 Batch'),
('17GES', '17/18 Batch'),
('18GES', '18/19 Batch'),
('19GES', '19/20 Batch'),
('20GES', '20/21 Batch');

-- --------------------------------------------------------

--
-- Table structure for table `booking_lec_hall`
--

CREATE TABLE `booking_lec_hall` (
  `id` int(11) NOT NULL,
  `lecture_name` varchar(255) DEFAULT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `hall_id` varchar(255) DEFAULT NULL,
  `day_id` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_lec_hall`
--

INSERT INTO `booking_lec_hall` (`id`, `lecture_name`, `batch_id`, `course_id`, `hall_id`, `day_id`, `date`, `time`) VALUES
(9, 'Dr.D.R. Welikanna', '18GES', 'FC12120', 'LH12', 'D2', '2023-09-11', '16:28:00'),
(10, 'Dr.G.S.N.Perera', '17GES', 'FC21246', 'LH1', 'D1', '2023-09-12', '10:04:00'),
(11, 'Dr.A.K.R.N. Ranasinghe', '18GES', 'FC21159', 'LH11', 'D2', '2023-09-21', '12:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `lecture_id` varchar(5) DEFAULT NULL,
  `batch_id` varchar(5) DEFAULT NULL,
  `department_id` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `lecture_id`, `batch_id`, `department_id`) VALUES
('FC12056', 'Sinhala II', 'L124', '20GES', NULL),
('FC12058', 'Tamil II', 'L124', '20GES', NULL),
('FC12120', 'Basics in Environmental Sciences', 'L102', '20GES', 'SG'),
('FC12152', 'Personality Development & Conflict Resolution', 'L122', '20GES', NULL),
('FC12217', 'Basic CAD for surveyors', 'L104', '20GES', 'SG'),
('FC12232', 'English II', 'L121', '20GES', 'SG'),
('FC12243', 'Land surveying', 'L101', '20GES', 'SG'),
('FC12260', 'Vector Calculus & Spherical Trigonometry', 'L109', '20GES', 'SG'),
('FC12323', 'Computer Programming', 'L103', '20GES', 'GIS'),
('FC12325', 'Descriptive Statistics & Probability Distribution', 'L105', '20GES', 'SG'),
('FC12361', 'Waves & Vibrations', 'L106', '20GES', 'GIS'),
('FC12545', 'Land Surveying Practical II', 'L107', '20GES', 'SG'),
('FC21114', 'Advanced Land Surveying', 'L108', '19GES', 'SG'),
('FC21129', 'Electronic Distance Measurement', 'L108', '19GES', 'SG'),
('FC21159', 'Technical Communication', 'L121', '19GES', 'SG'),
('FC21212', 'Adjustment Computation', 'L105', '19GES', 'SG'),
('FC21241', 'Geometric Geodesy', 'L102', '19GES', 'SG'),
('FC21246', 'Land Surveying Practical III', 'L107', '19GES', 'SG'),
('FC21248', 'Management', 'L124', '19GES', NULL),
('FC21324', 'Database Management Systems', 'L112', '19GES', 'GIS'),
('FC21328', 'Electricity and Magnetism', 'L106', '19GES', 'GIS'),
('FC21342', 'Inferential statistics and Numerical Method', 'L111', '19GES', 'SG'),
('FC22113', 'Advanced CAD for Surveyors', 'L104', '18GES', 'SG'),
('FC22130', 'Engineering Surveying', 'L108', '18GES', 'SG'),
('FC22153', 'Philisophy & Critical Thinking', 'L102', '18GES', 'SG'),
('FC22211', 'AC Theory and Circuits', 'L106', '18GES', 'GIS'),
('FC22226', 'Differential Equations and Mathematical Methods', 'L109', '18GES', 'SG'),
('FC22238', 'Fundamental Of Satellite Based Positioning and Navigation', 'L105', '18GES', 'SG'),
('FC22239', 'Geodetic Astronomy', 'L102', '18GES', 'SG'),
('FC22247', 'Land Surveying Practical IV', 'L107', '18GES', 'SG'),
('FC22351', 'Optical Remote Sensing', 'L122', '18GES', 'GIS'),
('FC22362', 'Web-based Developing Techniques', 'L103', '18GES', 'GIS'),
('GS32253', 'Disaster Management', 'L119', '17GES', 'GIS'),
('GS32254', 'Environmental Science', 'L102', '17GES', 'GIS'),
('GS32258', 'GIS Applications and Modelling', 'L120', '17GES', 'GIS'),
('GS32351', 'Advanced GIS', 'L119', '17GES', 'GIS'),
('GS41152', 'Colours in Cartography', 'L119', '16GES', 'GIS'),
('GS41255', 'Generalization and Symbolization', 'L119', '16GES', 'GIS'),
('GS41256', 'Geo-statistics in GIS', 'L116', '16GES', 'GIS'),
('GS41257', 'GIS Customization and Programming', 'L120', '16GES', 'GIS'),
('GS41260', 'Open Source GIS and Web Mapping', 'L120', '16GES', 'GIS'),
('HS32236', 'Seamanship and Navigation', NULL, '17GES', 'SG'),
('HS32331', 'Advanced Hydrographic Surveying', 'L115', '17GES', 'SG'),
('HS32337', 'Tides', 'L113', '17GES', 'SG'),
('HS41134', 'Law of the Sea', 'L115', '16GES', 'SG'),
('HS41138', 'Underwater Acoustics', 'L115', '16GES', 'SG'),
('HS41332', 'Hydrographic Data Management', 'L124', '16GES', NULL),
('HS41537', 'Hydrographic Practical', 'L113', '16GES', 'SG'),
('LM32223', 'Land Administration', 'L114', '17GES', 'SG'),
('LM32226', 'Land Tenure and Property Rights', 'L104', '17GES', 'SG'),
('LM32227', 'Land Valuation', NULL, '17GES', 'SG'),
('LM32321', 'Applied Project Management', NULL, '17GES', 'SG'),
('LM41122', 'Designing a Land Management Project', 'L124', '16GES', NULL),
('LM41224', 'Land Law', 'L104', '16GES', 'SG'),
('LM41225', 'Land Policy and Land Management', 'L104', '16GES', 'SG'),
('LM41228', 'Spatial Data Infrastructure', 'L114', '16GES', 'SG'),
('LM41229', 'Urban Planning', 'L108', '16GES', 'SG'),
('RS32241', 'Advanced Photogrammetry', 'L117', '17GES', 'GIS'),
('RS32243', 'Digital Elevation Modelling', 'L118', '17GES', 'GIS'),
('RS32347', 'Microwave Remote Sensing', 'L101', '17GES', 'GIS'),
('RS32348', 'Artificial Neural Networks', 'L116', '17GES', 'GIS'),
('RS41149', 'Satellite Technology', 'L118', '16GES', 'GIS'),
('RS41244', 'Digital Photogrammetry', 'L117', '16GES', 'GIS'),
('RS41245', 'Fundamentals of Space Science', 'L106', '16GES', 'GIS'),
('RS41246', 'Industrial Photogrammetry', 'L117', '16GES', 'GIS'),
('RS41342', 'Advanced Remote Sensing', 'L116', '16GES', 'GIS'),
('SG32211', 'Advanced Concepts of GNSS', 'L122', '17GES', 'SG'),
('SG32216', 'Fundamentals of Physical Geodesy', 'L122', '17GES', 'SG'),
('SG32217', 'Map Prjections', 'L102', '17GES', 'SG'),
('SG32314', 'Construction Surveying', 'L105', '17GES', 'SG'),
('SG41212', 'Advanced Physical Geodesy', 'L123', '16GES', 'SG'),
('SG41215', 'Deformation monitoring and Analysis', 'L107', '16GES', 'SG'),
('SG41218', 'Quantity Surveying', 'L124', '16GES', NULL),
('SG41313', 'Applications of GNSS', 'L113', '16GES', 'SG');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` varchar(3) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
('GIS', 'Department of Remote Sensing and GIS'),
('SG', 'Department of Surveying and Geodesy');

-- --------------------------------------------------------

--
-- Table structure for table `extra_lecture_allocation`
--

CREATE TABLE `extra_lecture_allocation` (
  `id` int(11) NOT NULL,
  `Lecture_Name` varchar(255) DEFAULT NULL,
  `Batch` varchar(255) DEFAULT NULL,
  `Course` varchar(255) DEFAULT NULL,
  `Hall` varchar(255) DEFAULT NULL,
  `Day` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `extra_lecture_allocation`
--

INSERT INTO `extra_lecture_allocation` (`id`, `Lecture_Name`, `Batch`, `Course`, `Hall`, `Day`, `Date`, `Time`) VALUES
(1, 'Dr.A.K.R.N. Ranasinghe', '18GES', 'Land Surveying Practical II', 'FGL-01', 'Tuesday', NULL, '00:22:00'),
(2, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '19GES', 'Geometric Geodesy', 'Physics Lab', 'Friday', NULL, '07:59:00'),
(3, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '20GES', 'Management', 'FGL-03', 'Thursday', '2023-09-22', '09:59:00'),
(4, 'Dr.A.K.R.N. Ranasinghe', '18GES', 'Land Surveying Practical II', 'FGL-01', 'Tuesday', '2023-09-28', '00:22:00'),
(5, 'Dr.A.K.R.N. Ranasinghe', '18GES', 'Land Surveying Practical II', 'FGL-01', 'Tuesday', '2023-09-28', '00:22:00'),
(6, 'Dr.A.K.R.N. Ranasinghe', '18GES', 'Land Surveying Practical II', 'FGL-01', 'Tuesday', '2023-09-28', '00:22:00'),
(7, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '18GES', 'Geometric Geodesy', 'FGL-03', 'Wednesday', '2023-09-25', '07:44:00'),
(8, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '', 'FC21241', 'LH3', 'D3', '2023-09-25', '07:44:00'),
(9, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '', 'FC21241', 'LH3', 'D3', '2023-09-25', '07:44:00'),
(10, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '18GES', 'FC21241', 'LH3', 'D3', '2023-09-25', '07:44:00'),
(11, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '19GES', 'FC21241', 'LH11', 'D5', '2023-09-11', '07:59:00'),
(12, 'Prof.R.M.K.G.S.B.K.S.Koswatta', '20GES', 'Management', 'FGL-03', 'Thursday', '2023-09-22', '09:59:00'),
(13, 'Dr.D.R. Welikanna', '20GES', 'Descriptive Statistics & Probability Distribution', 'FGL-02', 'Wednesday', '2023-09-12', '21:59:00'),
(14, 'Dr.G.S.N.Perera', '18GES', 'Land Surveying Practical III', 'Auditorium', 'Wednesday', '2023-09-21', '20:19:00'),
(15, '\n                        Dr.D.R. Welikanna                    ', '\n                        18GES                    ', '\n                        Basics in Environmental Sciences                    ', '\n                        FGL-04                    ', '\n                        Tuesday                    ', '2023-09-11', '16:28:00'),
(16, '\n                        Dr.D.R. Welikanna                    ', '\n                        18GES                    ', '\n                        Basics in Environmental Sciences                    ', '\n                        FGL-04                    ', '\n                        Tuesday                    ', '2023-09-11', '16:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hall_id` varchar(5) NOT NULL,
  `hall_name` varchar(50) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hall_id`, `hall_name`, `capacity`, `is_deleted`) VALUES
('121', '2323', 0, 1),
('222', '3654', 455, 0),
('45', 'llikj', 28, 0),
('5', 'llll88', 2588, 0),
('55', 'lll', 2, 0),
('555', 'llll', 25, 0),
('LH1', 'FGL-01', 100, 0),
('LH10', 'Mapping Hall', 150, 0),
('LH11', 'Physics Lab', 25, 0),
('LH12', 'FGL-04', 30, 0),
('LH2', 'FGL-02', 130, 0),
('LH3', 'FGL-03', 150, 0),
('LH4', 'Auditorium', 250, 0),
('LH5', 'Surveying & Geodesy lab', 25, 0),
('LH6', 'Remote Sensing lab', 15, 0),
('LH7', 'Hydro Lab', 15, 0),
('LH8', 'Computer Lab 01', 100, 0),
('LH9', 'Computer Lab 02', 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

CREATE TABLE `lecture` (
  `lecture_id` varchar(5) NOT NULL,
  `lecture_name` varchar(50) DEFAULT NULL,
  `department_id` varchar(3) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lecture_id`, `lecture_name`, `department_id`, `password`, `is_deleted`) VALUES
('L101', 'Dr.A.K.R.N. Ranasinghe', 'lll', 'e10adc3949ba59abbe56e057f20f883e', 1),
('L102', 'Prof.H.R.S. Bandara', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L103', 'Mr. M.D.C.De.S. Jayathilake', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L104', 'Dr.N.M.P.M. Piyasena', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L105', 'Dr.D.R. Welikanna', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L106', 'Dr.K.M.S. Bandara', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L107', 'Mr.K.K.D.W.S.Kannangara', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L108', 'Mrs.D.S.Munasinghe', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L109', 'Mr.T.D.A.Gomesz', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L110', 'Ms.H.M.C.J.Nawarathna', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L111', 'Dr.M.K. Abeyrathna', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L112', 'Mrs.P.B.S.N. Ariyathilake', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L113', 'Dr.M.D.E.K.Gunathilaka', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L114', 'Dr.H.Divithure', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L115', 'Mr.A.N.D.Perera', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L116', 'Dr.G.S.N.Perera', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L117', 'Dr.H.A.Nalani', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L118', 'Ms.L.A.K.S.Illeperuma', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L119', 'Dr.Indika Pussella', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L120', 'Prof.R.M.K.G.S.B.K.S.Koswatta', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L121', 'English Unit', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L122', 'Mrs.J.A.S.Jayakody', 'GIS', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L123', 'Dr.H.M.I. Prasanna', 'SG', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L124', 'Visiting Lecture', '', 'e10adc3949ba59abbe56e057f20f883e', 0),
('L150', 'aaaa', 'SG', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_day`
--

CREATE TABLE `lecture_day` (
  `day_id` varchar(2) NOT NULL,
  `day_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture_day`
--

INSERT INTO `lecture_day` (`day_id`, `day_name`) VALUES
('D1', 'Monday'),
('D2', 'Tuesday'),
('D3', 'Wednesday'),
('D4', 'Thursday'),
('D5', 'Friday'),
('D6', 'Saturday'),
('D7', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `student_comment`
--

CREATE TABLE `student_comment` (
  `id` int(11) NOT NULL,
  `batch_id` varchar(255) NOT NULL,
  `std_comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_comment`
--

INSERT INTO `student_comment` (`id`, `batch_id`, `std_comment`) VALUES
(1, '17GES', 'bbbbbb'),
(2, '17GES', 'mapping hall should be with 5 fans\r\n'),
(3, '18GES', '2545123'),
(4, '16GES', 'i want to add comment'),
(5, '17GES', 'please update lec hall'),
(6, '19GES', '2222222'),
(7, '17GES', 'eee'),
(8, '19GES', '11'),
(9, '19GES', 'kkkkkkkkkkkkkkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(200) NOT NULL,
  `name` varchar(250) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `batch_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `regno`, `password`, `batch_id`) VALUES
('16ges3333', 'kavinda', '16ges3333', '2be9bd7a3434f7038ca27d1918de58bd', '16GES'),
('18ges1058', 'AVINTHA', '18ges1058', 'b4d168b48157c623fbd095b4a565b5bb', '18GES'),
('18ges1500', 'rasanjana maldeniya', '18ges1500', 'cfa5301358b9fcbe7aa45b1ceea088c6', '18GES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `day_id` (`day_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `booking_lec_hall`
--
ALTER TABLE `booking_lec_hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `fk_lecture` (`lecture_id`),
  ADD KEY `fk_batch` (`batch_id`),
  ADD KEY `fk_department` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `extra_lecture_allocation`
--
ALTER TABLE `extra_lecture_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hall_id`);

--
-- Indexes for table `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `lecture_day`
--
ALTER TABLE `lecture_day`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `student_comment`
--
ALTER TABLE `student_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_lec_hall`
--
ALTER TABLE `booking_lec_hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `extra_lecture_allocation`
--
ALTER TABLE `extra_lecture_allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `student_comment`
--
ALTER TABLE `student_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `allocation_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `allocation_ibfk_2` FOREIGN KEY (`day_id`) REFERENCES `lecture_day` (`day_id`),
  ADD CONSTRAINT `allocation_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `allocation_ibfk_4` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`hall_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_batch` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`batch_id`),
  ADD CONSTRAINT `fk_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `fk_lecture` FOREIGN KEY (`lecture_id`) REFERENCES `lecture` (`lecture_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
