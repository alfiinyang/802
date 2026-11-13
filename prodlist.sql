-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2012 at 06:28 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flamingo`
--

-- --------------------------------------------------------

--
-- Table structure for table `prodlist`
--

CREATE TABLE IF NOT EXISTS flamingo.prodlist (
  `prodCode` text NOT NULL,
  `prodName` text NOT NULL,
  `prodDesc` text NOT NULL,
  `prodPrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodlist`
--

INSERT INTO flamingo.prodlist (`prodCode`, `prodName`, `prodDesc`, `prodPrice`) VALUES
('FP001', 'Flamingo Slippers', 'Pink fluffy flamingo slippers with rubber soles', '21'),
('FP002', 'Flamingo Towels', 'Terry towelling material printed with flamingos', '15'),
('FP003', 'Flamingo Bathrobes', 'Terry cloth pink bathrobes with left breast flamingo motifs', '35'),
('FP004', 'T-Shirts', 'Pink T-Shirts printed with Flamingo scenes on front', '22'),
('FP005', 'Flamingo Shorts', 'Girls pink shorts with small flamingo badges on legs', '29'),
('FP006', 'Flamingo Sunglasses', 'Pink sunglasses with mirrored UV protected lenses', '41'),
('FP007', 'Shot Glass', 'Whisky shot glass with etched flamingos', '12'),
('FP008', 'Back Pack', 'Sturdy hiking backpack with printed flamingos', '39'),
('FP009', 'Baseball Cap', 'Adjustable baseball cap with woven flamingo badge', '15'),
('FP010', 'Flamingo Watch', 'Citizen watch with flamingo face and feather hands', '52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
