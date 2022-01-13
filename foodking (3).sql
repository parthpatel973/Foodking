-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 09:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodking`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Mexican', 1),
(2, 'Chinese', 1),
(3, 'Indian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalcode` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fullname`, `email`, `address`, `state`, `city`, `postalcode`, `username`, `password`) VALUES
(11, 'mihir', 'mihirpatel@gmail.com', 'Hostel', 'Gujarat', 'limbadiya chokdi', 389230, '', 'mihir123'),
(9, 'Ammar', 'ammarkoka@gmail.com', 'At Vohrvad Godhra', 'Gujarat', 'Godhra', 389001, '', 'ammar123'),
(10, 'parth patel', 'parthpatel22@gmail.com', 'Lunawada', 'Gujarat', 'lunawada', 389230, '', 'parth123'),
(12, 'mihir patel', 'mihir@1', 'lunawada, lunawada', 'Gujarat', 'lunawada', 0, '', '23704'),
(13, 'ankur', 'ankur@1', 'lunawada', 'gujrat', 'lunawada', 389229, '', 'ankur123'),
(14, 'ab', 'ab@gmail.com', 'ajjuajhgsjhbhjsk', 'gujrat', 'lunawada', 2152542, '', 'ankur456'),
(15, 'pm', 'pm@pm.pm', 'and', 'guj', 'and', 123456, '', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `grouplink`
--

CREATE TABLE IF NOT EXISTS `grouplink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  `ownername` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `grouplink`
--

INSERT INTO `grouplink` (`id`, `user_id`, `token`, `ownername`, `date`, `status`) VALUES
(7, 9, '1021707194b6d060f75860a9fa6b73a2', '', '2019-04-24 11:41:16', 1),
(8, 10, '83bdd5a91e556ca3b57aafab83ee8ef5', '', '2019-04-24 11:42:56', 1),
(9, 10, 'c97fc9737012376eee6fe4e2c9191c4d', '', '2019-04-24 11:52:19', 1),
(10, 12, 'c821676842228981f9b9618632b27274', '', '2019-04-24 14:31:25', 1),
(11, 12, 'ef50c335cca9f340bde656363ebd02fd', '', '2019-04-24 14:32:07', 1),
(12, 12, '3ea2db50e62ceefceaf70a9d9a56a6f4', '', '2019-04-24 14:40:31', 1),
(13, 14, 'e58d15cd0ff0568a0f8524fcce92b6bd', '', '2019-04-24 14:59:04', 1),
(14, 14, 'bcf00598faf7c60d7578466a16659bd4', '', '2019-04-24 15:03:07', 1),
(15, 15, '71e8c327273c4053d1fafa9df7fb415f', '', '2019-04-25 14:37:05', 1),
(16, 15, '48ab2f9b45957ab574cf005eb8a76760', '', '2019-04-26 11:20:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_dish`
--

CREATE TABLE IF NOT EXISTS `group_dish` (
  `group_dish_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dish_id` int(11) NOT NULL,
  PRIMARY KEY (`group_dish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `group_dish`
--

INSERT INTO `group_dish` (`group_dish_id`, `token`, `email`, `name`, `dish_id`) VALUES
(12, '1021707194b6d060f75860a9fa6b73a2', '', 'Satyam', 18),
(13, '83bdd5a91e556ca3b57aafab83ee8ef5', '', 'sb', 12),
(14, 'c97fc9737012376eee6fe4e2c9191c4d', '', 'hghgh', 18),
(15, 'c97fc9737012376eee6fe4e2c9191c4d', '', 'sdfgh', 20),
(16, 'c821676842228981f9b9618632b27274', '', 'mihir', 12),
(17, 'ef50c335cca9f340bde656363ebd02fd', '', 'mihir patel', 22),
(19, 'e58d15cd0ff0568a0f8524fcce92b6bd', '', 'hghg', 12),
(20, 'e58d15cd0ff0568a0f8524fcce92b6bd', '', 'jjjjh', 9),
(21, '48ab2f9b45957ab574cf005eb8a76760', '', 'mihir', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `paymentmethod` varchar(20) NOT NULL,
  `orderstatus` varchar(20) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `totalamount` decimal(9,2) NOT NULL,
  `sgst` decimal(9,2) NOT NULL,
  `cgst` decimal(9,2) NOT NULL,
  `deliverycharge` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `address`, `city`, `state`, `zip_code`, `phone_number`, `email_address`, `paymentmethod`, `orderstatus`, `subtotal`, `totalamount`, `sgst`, `cgst`, `deliverycharge`, `user_id`, `dateadded`) VALUES
(23, 'Ammar', '', 'At Vohrvad', 'Godhra', 'Gujarat', 389001, 2147483647, 'ammar@gmail.com', 'cashondelivery', 'processing', '140.00', '178.60', '16.80', '16.80', 5, 9, '2019-04-24 11:41:54'),
(24, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 445, 'parthpatel22@gmail.com', 'cashondelivery', 'completed', '200.00', '253.00', '24.00', '24.00', 5, 10, '2019-04-24 11:49:11'),
(25, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 2147483647, 'parthpatel22@gmail.com', 'cashondelivery', 'processing', '445.00', '556.80', '53.40', '53.40', 5, 10, '2019-04-24 12:06:13'),
(26, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 2147483647, 'parthpatel22@gmail.com', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 10, '2019-04-24 12:06:50'),
(27, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 0, 'parthpatel22@gmail.com', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 10, '2019-04-24 12:08:28'),
(28, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 0, 'parthpatel22@gmail.com', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 10, '2019-04-24 12:08:37'),
(29, 'parth', 'patel', 'Lunawada', 'lunawada', 'Gujarat', 389230, 2147483647, 'parthpatel22@gmail.com', 'cashondelivery', 'completed', '0.00', '5.00', '0.00', '0.00', 5, 10, '2019-04-24 12:13:38'),
(30, 'mihir', 'patel', 'lunawada, lunawada', 'lunawada', 'Gujarat', 0, 2147483647, 'mihir@1', 'cashondelivery', 'completed', '60.00', '79.40', '7.20', '7.20', 5, 12, '2019-04-24 12:53:27'),
(31, 'mihir', 'patel', 'lunawada, lunawada', 'lunawada', 'Gujarat', 0, 2147483647, 'mihir@1', 'cashondelivery', 'completed', '0.00', '5.00', '0.00', '0.00', 5, 12, '2019-04-24 12:56:29'),
(32, 'mihir', 'patel', 'lunawada, lunawada', 'lunawada', 'Gujarat', 0, 987654321, 'mihirtest@test.test', 'cashondelivery', 'processing', '230.00', '290.20', '27.60', '27.60', 5, 12, '2019-04-24 14:34:15'),
(33, 'mihir', 'patel', 'lunawada, lunawada', '--select city --', 'Gujarat', 0, 987654321, 'mihirtest@test.test', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 12, '2019-04-24 14:42:04'),
(34, 'ab', '', 'ajjuajhgsjhbhjsk', 'lunawada', 'gujrat', 2152542, 1234, 'ab@gmail.com', 'cashondelivery', 'processing', '170.00', '215.80', '20.40', '20.40', 5, 14, '2019-04-24 15:00:48'),
(35, 'ab', '', 'gdr', 'lunawada', 'gujrat', 2152542, 1234, 'ab@gmail.com', 'cashondelivery', 'completed', '0.00', '5.00', '0.00', '0.00', 5, 14, '2019-04-24 15:02:24'),
(36, 'ab', '', 'ajjuajhgsjhbhjsk', 'lunawada', 'gujrat', 2152542, 123456, 'ab@gmail.com', 'cashondelivery', 'processing', '60.00', '79.40', '7.20', '7.20', 5, 14, '2019-04-24 15:07:25'),
(37, 'pm', 'pm', 'and', 'and', 'guj', 12345678, 1234567886, 'pm@pm.pm', 'cashondelivery', 'processing', '80.00', '104.20', '9.60', '9.60', 5, 15, '2019-04-26 10:53:01'),
(38, 'pm', 'p,', 'and', 'and', 'guj', 123456, 987654321, 'pm@pm.pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 10:58:14'),
(39, 'pm', 'p,', 'and', 'and', 'guj', 123456, 987654321, 'pm@pm.', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 10:58:24'),
(40, 'pm', 'pm', 'and', 'and', 'guj', 123456, 987654319, 'pm@pm.', 'cashondelivery', 'processing', '60.00', '79.40', '7.20', '7.20', 5, 15, '2019-04-26 10:59:38'),
(41, 'pm', 'pm', 'and', 'and', 'guj', 123456, 987654319, 'pm@pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 10:59:46'),
(42, 'pm', 'pm', 'and', 'and', 'guj', 123456, 987654321, 'pm@pm.pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 11:07:58'),
(43, 'pm', 'p,', 'and', 'and', 'guj', 1234, 2147483647, 'pm@pm.pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 11:08:43'),
(44, 'pm', 'pm', 'and', 'and', 'guj', 12345, 987654321, 'pm@pm.pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 11:12:33'),
(45, 'pm', 'pm', 'and', 'and', 'guj', 123456, 1234, 'pm@pm.pm', 'cashondelivery', 'processing', '0.00', '5.00', '0.00', '0.00', 5, 15, '2019-04-26 11:13:28');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `group_dish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(4) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `total` decimal(15,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`order_product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `group_dish_id`, `product_id`, `name`, `quantity`, `price`, `total`) VALUES
(31, 23, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(32, 23, 12, 18, 'frenkie', 1, '80.0000', '80.0000'),
(33, 24, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(34, 24, 0, 18, 'frenkie', 1, '80.0000', '80.0000'),
(35, 24, 13, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(36, 25, 0, 23, 'Quesadillas', 1, '130.0000', '130.0000'),
(37, 25, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(38, 25, 0, 11, 'Tacos', 1, '75.0000', '75.0000'),
(39, 25, 14, 18, 'frenkie', 1, '80.0000', '80.0000'),
(40, 25, 15, 20, 'Hakka Noodle', 1, '100.0000', '100.0000'),
(41, 30, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(42, 32, 0, 18, 'frenkie', 1, '80.0000', '80.0000'),
(43, 32, 17, 22, 'Grilled chicken', 1, '150.0000', '150.0000'),
(44, 34, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(45, 34, 19, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(46, 34, 20, 9, 'Noodle soup', 1, '50.0000', '50.0000'),
(47, 36, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000'),
(48, 37, 0, 18, 'frenkie', 1, '80.0000', '80.0000'),
(49, 40, 0, 12, 'Sandwhich', 1, '60.0000', '60.0000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `discription` text NOT NULL,
  `category` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `discription`, `category`, `price`, `image`, `status`) VALUES
(11, 'Tacos', 'Tacos', '1', 75, 'g6.png', 1),
(12, 'Sandwhich', 'Sandwhich', '1', 60, 'g10.jpg', 1),
(7, 'Samosa', 'Samosa', '3', 20, 'g9.png', 1),
(8, 'Khandvi', 'Khandvi', '3', 20, 'g14.jpg', 1),
(9, 'Noodle soup', 'Noodle soup', '2', 50, 'g16.jpg', 1),
(18, 'frenkie', 'Frenkie', '1', 80, 'g8.jpg', 1),
(17, 'kungpaochicken', 'kungpaochicken', '1', 120, 'Best-Kung-Pao-Chicken-IMAGE-3.jpg', 1),
(19, 'Chicken Soup', 'Chicken Soup', '2', 85, 'g11.jpg', 1),
(20, 'Hakka Noodle', 'Hakka Noodle', '2', 100, 'g15.jpg', 1),
(21, 'Salad', 'Veg Salad', '3', 30, 'i1.jpg', 1),
(22, 'Grilled chicken', 'Grilled-chicken-drumsticks', '2', 150, 'grilled-chicken-drumsticks.jpg', 1),
(23, 'Quesadillas', 'mexican-Quesadillas', '1', 130, 'mexican-Quesadillas.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
