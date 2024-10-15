-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 06:01 AM
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
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(3, 'fdafaf', '5555', 'fff', 'm', 'kotchakon391@gmail.com', 'm'),
(4, 'q', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'httyhtyh', 'm', 'e@gmail.com', 'm'),
(5, 'a', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'asd', 'f', 'e@gmail.com', 'm'),
(6, 'v', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99', 'dfgdfg', 'm', 'e@gmail.com', 'm'),
(7, 'bv', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'vd', 'f', 'b@email.com', 'm'),
(8, 'admin', '8dc9fa69ec51046b4472bb512e292d959edd2aef', 'admin', 'm', 'yew_yasinthon@hotmail.com', 'a'),
(9, 'member', 'b54df48c4c77522382a5a3c2f0358573ad43746e', 'member', 'f', 'yew@hotmail.com', 'm'),
(10, 'man', '9baaf93857981795ff88b12e62b1c44d89c7b9ac', 'man', 'm', 'man@hotmail.com', 'm'),
(11, 'jj', '5ecdcf5104ac602d35bcc524e0bec05868316f72', 'jj', 'o', 'jj@hotmail.com', 'm');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
