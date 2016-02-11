-- phpMyAdmin SQL Dump
-- version 4.5.3.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2016 at 12:50 PM
-- Server version: 5.6.28-1
-- PHP Version: 5.6.17-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lasku`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL COMMENT 'Client name',
  `address` text COMMENT 'Billing address',
  `email` varchar(256) DEFAULT NULL COMMENT 'Client email address',
  `currency_id` int(11) DEFAULT NULL COMMENT 'Default currency ID',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Client';

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL COMMENT 'Config name',
  `value` text NOT NULL COMMENT 'Config value'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Configurations';

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'currency', '1');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL COMMENT '3 letters currency code',
  `label` varchar(5) NOT NULL COMMENT 'Currency label',
  `xrate` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT 'Exchange rate to main currency'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Currencies';

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `code`, `label`, `xrate`) VALUES
(1, 'IDR', 'Rp', 1.00),
(2, 'USD', '$', 1.00),
(3, 'CAD', '$', 1.00),
(4, 'MYR', 'RM', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL COMMENT 'Username',
  `password` varchar(64) NOT NULL COMMENT 'Password',
  `entry_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `entry_time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-02-11 04:08:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
