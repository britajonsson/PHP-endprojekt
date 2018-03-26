-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2018 at 04:22 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `orderID` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `articleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`orderID`, `firstname`, `lastname`, `email`, `phone`, `street`, `zipcode`, `city`, `articleID`) VALUES
(56, 'Brita', 'Jonsson', 'britajonsson@gmail.com', '0733821387', 'Tomtebogatan 40', '11338', 'STOCKHOLM', 6),
(57, 'Aston', 'Castor', 'aston@mejl.com', '0708091011', 'Strandgatan 1', '13525', 'HELLSINGBY', 4),
(58, 'Yousef', 'Kero', 'yousef.kero@mails.com', '0731241265', 'Testvägen 134a', '13148', 'STENBY', 4),
(59, 'Sune', 'Svensson', 'sune@hejsan.se', '0708090807', 'Gatunamnet 23', '12394', 'ALVIK', 7),
(60, 'Ada', 'Glensson', 'glensson@gbgbg.gb', '0712345678', 'Avenyn 8', '35842', 'GöTLABORGGG', 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `articleID` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`articleID`, `title`, `description`, `picture`, `price`) VALUES
(4, 'Strykjärnet', 'Du funderar över om du stängde av strykjärnet och hur lång tid det kan ta innan gardinerna fattat eld. Ingår: Behov av att gå hem igen när du kommit ca 15 min hemifrån samt ett verklighetstroget strykjärn i frigolit', '001-iron.png', '450'),
(5, 'Spisen', 'Du funderar över om du stängde av spisen innan du gick hemifrån och om katten kan kvävas av den giftiga röken från en smält matlåda i plast.Ingår: Behov av att gå hem igen när du kommit ca 12 min hemifrån samt en matlåda i plast', '002-stove.png', '750'),
(6, 'Kaffebryggaren', 'Du funderar över om kaffebryggaren fortfarande är igång och om den står utom räckhåll för barnen.Ingår: Behov av att logga in i övervakningsscentralens kameror i köket. OBS! Övervakningskamera ingår ej.', '003-coffeemaker.png', '625'),
(7, 'Lampan', 'Du funderar över om du släckte lamporna i hallen innan du gick. Ingår: Behov av att ringa hem till grannen och be hen titta in genom brevinkastet samt en snäll granne', '004-light.png', '150'),
(8, 'Ytterdörren', 'Du funderar över om du låste ytterdörren ordentligt när du gick hemifrån. Ingår: Behov av att gå hem igen när du kommit ca 5 min hemifrån', '005-door.png', '575');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `article_no` (`articleID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`articleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `articleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_ibfk_1` FOREIGN KEY (`articleID`) REFERENCES `product` (`articleID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
