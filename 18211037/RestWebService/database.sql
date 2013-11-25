-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2013 at 06:32 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `klub`
--

-- --------------------------------------------------------

--
-- Table structure for table `liverpul`
--

CREATE TABLE `liverpul` (
  `Nama` varchar(16) DEFAULT NULL,
  `Posisi` varchar(10) DEFAULT NULL,
  `Gaji` int(6) DEFAULT NULL,
  `Nilai` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liverpul`
--

INSERT INTO `liverpul` (`Nama`, `Posisi`, `Gaji`, `Nilai`) VALUES
('Steven Gerrard', 'Midfielder', 120000, 8447604),
('Luis Suárez', 'Forward', 100000, 39440265),
('Daniel Sturridge', 'Forward', 80000, 15400611),
('Martin Skrtel', 'Defender', 70000, 11182773),
('Jordan Henderson', 'Midfielder', 60000, 11072121),
('Simon Mignolet', 'Goalkeeper', 31500, 8107482);
