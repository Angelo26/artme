-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 08:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `photo`) VALUES
(1, 'angel', '202cb962ac59075b964b07152d234b70', 'adminupload/WIN_20170815_16_04_32_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `skill1` varchar(255) NOT NULL,
  `skill2` varchar(255) NOT NULL,
  `aaddress` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `astatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `id` int(255) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `astyle` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`id`, `aname`, `astyle`, `price`, `artist`, `picture`) VALUES
(6, 'banner', 'digital art', 200, 'Angel', 'artsupload/banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `art_id` int(11) NOT NULL,
  `art_name` varchar(255) NOT NULL,
  `art_style` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `astatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`art_id`, `art_name`, `art_style`, `price`, `picture`, `artist`, `astatus`) VALUES
(1, 'Monalisa', 'painting', '20000', 'artsupload/monalisa.jpg', 'Leonardo Davinci', 'out of stock'),
(2, 'Messi', 'sketch', '200', 'artsupload/messi.jpg', 'Aman', 'available'),
(3, 'you belong to me', 'digital art', '800', 'artsupload/you_belong_to_me.jpg', 'Angel', 'available'),
(4, 'buddha', 'sculpture', '10000', 'artsupload/buddha.jpg', 'Anil', 'out of stock'),
(5, 'bottleworld', 'photoshop art', '500', 'artsupload/bottleworld.jpg', 'Udhav', 'available'),
(47, 'Monalisa', 'painting', '20000', 'artsupload/monalisa.jpg', 'Leonardo Davinci', 'out of stock'),
(48, 'Messi', 'sketch', '200', 'artsupload/messi.jpg', 'Aman', 'available'),
(49, 'you belong to me', 'digital art', '800', 'artsupload/you_belong_to_me.jpg', 'Angel', 'available'),
(50, 'buddha', 'sculpture', '10000', 'artsupload/buddha.jpg', 'Anil', 'out of stock'),
(51, 'bottleworld', 'photoshop art', '500', 'artsupload/bottleworld.jpg', 'Udhav', 'available'),
(52, 'Monalisa', 'painting', '20000', 'artsupload/monalisa.jpg', 'Leonardo Davinci', 'out of stock'),
(53, 'Messi', 'sketch', '200', 'artsupload/messi.jpg', 'Aman', 'available'),
(83, 'eyesonyou', 'sketch', '1000', 'artsupload/eyesonyou.jpg', 'Babin', 'Available'),
(86, 'heart', 'digital art', '200', 'artsupload/heart.PNG', 'Babin', 'Available'),
(87, 'heart', 'digital art', '200', 'artsupload/heart.PNG', 'Babin', 'Available'),
(88, 'level 0 diagram', 'digital art', '1000', 'artsupload/lvl 0 diagram.png', 'Anil', 'Available'),
(89, 'routine', 'drawing', '200', 'artsupload/Routine.png', 'Angel', 'Available'),
(90, 'routine', 'digital art', '200', 'artsupload/Routine.png', 'Angel', 'Available'),
(91, 'banner', 'digital art', '200', 'artsupload/banner.jpg', 'Angel', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `changedesc`
--

CREATE TABLE `changedesc` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `udesc` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `changedesc`
--

INSERT INTO `changedesc` (`id`, `fname`, `lname`, `profession`, `udesc`, `img`) VALUES
(1, 'Anil', 'Basnet', 'Fullstack developer', 'Got a logo designed. I am impressed and it\'s really affordable.', 'imgs/anil.jpg'),
(2, 'Nitesh', 'KC', 'Web Developer', 'I really like the art market. It\'s like a digital art museum.', 'imgs/nitesh.jpg'),
(3, 'Udhav', 'Basnet', 'Network Engineer', 'So many artist and I like the way this platform is supporting them.', 'imgs/udhav.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `realartists`
--

CREATE TABLE `realartists` (
  `artist_id` int(11) NOT NULL,
  `artist_first` varchar(256) NOT NULL,
  `artist_last` varchar(256) NOT NULL,
  `artist_email` varchar(256) NOT NULL,
  `artist_pwd` varchar(256) NOT NULL,
  `artist_address` varchar(256) NOT NULL,
  `artist_skills` varchar(256) NOT NULL,
  `artist_skill1` varchar(255) NOT NULL,
  `artist_skill2` varchar(255) NOT NULL,
  `artist_works` varchar(256) NOT NULL,
  `artist_desc` varchar(256) NOT NULL,
  `artist_contact` varchar(256) NOT NULL,
  `artist_img` varchar(255) NOT NULL,
  `artist_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realartists`
--

INSERT INTO `realartists` (`artist_id`, `artist_first`, `artist_last`, `artist_email`, `artist_pwd`, `artist_address`, `artist_skills`, `artist_skill1`, `artist_skill2`, `artist_works`, `artist_desc`, `artist_contact`, `artist_img`, `artist_status`) VALUES
(3, 'Angel', 'Maden', 'angelmaden333@gmail.com', '$2y$10$Y7eD5HS4zWv9CQCxvhhqPexykHv.G9Z2E3MMbO8kvIr/nnLicJWoC', 'Baghbazar', 'Material design', 'photoshop art', 'sculpture', '', 'I am a pro artist', '9811322487', 'upload/Screenshot (25).png', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `fname`, `lname`, `username`, `pwd`, `email`) VALUES
(1, 'angel', 'madne', 'angelmaden333', '$2y$10$7NWPncV6fTkZa3BJuU6RyuO43CbpuUqDtYm3XJrlId1CZCYCqNNcq', 'angelmaden333@gmail.com'),
(2, 'Angel', 'Maden', 'angel1', '$2y$10$Mc5imleBUVOnErWKhVEnn.BlpIspjDeZ5p3RiXkrmKqF25LJHvJDK', 'angelmaden3@gmail.com'),
(3, 'Angel', 'Maden', 'angel', '$2y$10$svQKh9XsHHV2T8xh3Rl6BeZ7uR5YEZVLXZXYHaIk.YGDp07/ukDSK', 'angelmaden123@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `changedesc`
--
ALTER TABLE `changedesc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `realartists`
--
ALTER TABLE `realartists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `changedesc`
--
ALTER TABLE `changedesc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `realartists`
--
ALTER TABLE `realartists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
