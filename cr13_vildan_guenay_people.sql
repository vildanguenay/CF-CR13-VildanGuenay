-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 04:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `people`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendships`
--

CREATE TABLE `friendships` (
  `friendship_id` int(11) NOT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_friend_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friendships`
--

INSERT INTO `friendships` (`friendship_id`, `fk_user_id`, `fk_friend_id`) VALUES
(18, 11, 8),
(19, 11, 3),
(20, 1, 2),
(21, 1, 9),
(22, 1, 4),
(23, 12, 6),
(24, 12, 7),
(25, 12, 2),
(26, 12, 3),
(27, 11, 1),
(28, 12, 10),
(29, 12, 9),
(30, 13, 1),
(31, 13, 2),
(32, 13, 6),
(33, 13, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `password` varchar(150) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `image` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Bill Gates', 'billgates@gates.com', 'billgatesppl', 'https://pbs.twimg.com/profile_images/988775660163252226/XpgonN0X_400x400.jpg'),
(2, 'Elon Musk', 'elonmusk@musk.com', 'elonmuskppl', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5fdTFg_jiletm2FUFO26jtD6zpTx6pt_W4bg6TWbkoA7cFar1'),
(3, 'Barack Obama', 'barackobama@obama.com', 'barackoppl', 'https://www.bienenundnatur.de/wp-content/uploads/2016/07/612022.jpg'),
(4, 'Donald Trump', 'donaldtrump@trump.com', 'donaldtrumpppl', 'https://apps-cloud.n-tv.de/img/15561051-1437637243000/16-9/750/RTX1GZCO.jpg'),
(5, 'Reed Hastings', 'r.hastings@netflix.com', 'reedhastingsppl', 'https://amp.businessinsider.com/images/55df7013bd86ef1b008b672a-750-563.jpg'),
(6, 'Jeff Bezos', 'j.bezos@amazon.com', 'jeffbezosppl', 'https://content.fortune.com/wp-content/uploads/2017/10/618585750.jpg'),
(7, 'Marissa Mayer', 'm.mayer@yahoo.com', 'marissamppl', 'https://130e178e8f8ba617604b-8aedd782b7d22cfe0d1146da69a52436.ssl.cf1.rackcdn.com/yahoo-ceo-takes-pay-cut-over-security-lapses-showcase_image-2-a-9748.jpg'),
(8, 'Sheryl Sandberg ', 'sheryl.sandberg@facebook.com', 'sherylsppl', 'https://s3-prod.adage.com/s3fs-public/styles/width_1024/public/305792579_15_20181126_3x2.jpg'),
(9, 'Ruth Porat', 'ruth.p@gmail.com', 'ruthporatppl', 'https://www.handelsblatt.com/images/ruth-porat/20106832/2-format2020.jpg'),
(10, 'Ginni Rometty', 'ginni.rometty@ibm.com', 'ginniromppl', 'https://images.livemint.com/rf/Image-621x414/LiveMint/Period2/2018/10/31/Photos/Processed/IBMCEO-kTx--621x414@LiveMint.jpg'),
(11, 'Vildan Guenay', 'vildan-guenay@hotmail.com', 'vildan', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d2/Crystal_Clear_kdm_user_female.svg/1024px-Crystal_Clear_kdm_user_female.svg.png'),
(12, 'erdemir guenay', 'erdemir.guenay@gmail.com', 'erdemir', NULL),
(13, 'jakob', 'guenayjakob@gmail.com', 'jakob1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`friendship_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_friend_id` (`fk_friend_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `friendship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`fk_friend_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
