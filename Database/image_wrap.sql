-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 04:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_wrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image`) VALUES
(111, '1454643161295278', 'profPic/28289.jpg'),
(112, '1454643161295278', 'profPic/26061.png'),
(113, '1454643161295278', 'profPic/2854.jpg'),
(114, '1454643161295278', 'profPic/3670.jpg'),
(115, '1454643161295278', 'profPic/28075.png'),
(116, '1454643161295278', 'profPic/31752.jpg'),
(117, '1454643161295278', 'profPic/13252.jpg'),
(118, '1454643161295278', 'profPic/29357.png'),
(119, '1454643161295278', 'profPic/871.png'),
(120, '1454643161295278', 'profPic/1300.jpg'),
(121, '1454643161295278', 'profPic/31522.png'),
(122, '1454643161295278', 'profPic/31155.png'),
(123, '1454643161295278', 'profPic/2928.jpg'),
(124, '1454643161295278', 'profPic/3241.png'),
(125, '1454643161295278', 'profPic/10451.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
