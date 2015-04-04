-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2015 at 01:58 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(0, 'General Discussion', 'General Topics Goes Here');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(8) NOT NULL,
  `topic_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_auther` varchar(50) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `topic_id`, `post_content`, `post_auther`, `post_date`) VALUES
(1, 1, 'Thats a great idea ', 'rnztx', '2015-03-24'),
(2, 1, 'this is a long text .. this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..this is a long text ..', 'rnztx', '2015-03-24'),
(3, 1, 'is it working', 'admin', '2015-03-24'),
(4, 2, 'Whats wrong with this', 'admin', '2015-03-24'),
(5, 2, 'When i thought Comments are not working... ', 'admin', '2015-03-24'),
(6, 2, 'its is Working', 'admin', '2015-03-24'),
(7, 3, 'Sunil is Here', 'admin', '2015-03-24'),
(8, 4, 'comment no 2', 'admin', '2015-03-24'),
(0, 0, 'free Porn Goes There ;)', 'admin', '2015-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'PD1001', 'Omeprazole', 'Omeprazole offers fast, effective relief of pressure and bloating that antacids can''t provide.Specially formulated with 100% simethicone, the antigas medicine doctors recommend most for gas, pressure.', 'omeprazole.jpg', '200.50'),
(2, 'PD1002', 'Pepcid', '1 Tablet relieves heartburn and acid indigestion (Read Package Insert before use). Pepcid AC prevents heartburn and acid indigestion brought on by eating and drinking certain foods and beverages.', 'pepcid.jpg', '500.85'),
(3, 'PD1003', 'Thermacare', 'Get 8 hours of long-lasting pain relief and deep muscle relaxation for your neck, shoulders or wrists. Just open the pouch and the warmth will start!', 'thermacare.jpg', '100.00'),
(4, 'PD1004', 'Oral-B Protection Floss', 'Patented tension control design allows floss to surround the tooth surface. Easy to reach back teeth! Easy flossing with one hand. Unique, patented floss that''s smooth, strong, and shred resistant.', 'oral-b.jpg', '400.30');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_title` varchar(255) NOT NULL,
  `topic_description` varchar(255) NOT NULL,
  `category_id` int(8) NOT NULL,
  `topic_auther` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`, `topic_description`, `category_id`, `topic_auther`) VALUES
(1, 'Free wifi in Hospitals', 'Every Hospital should be offering free wifi, so it will be helpful for family of patients', 1, 'rnztx'),
(2, 'ban eating on Roads', 'aaa', 1, 'rnztx'),
(3, 'Smoking In Colleges', 'good or bad', 1, 'rnztx'),
(4, 'reason for near-sightedness', 'all time indoor', 1, 'rnztx'),
(5, 'Future of cars', 'is Electrnics', 1, 'admin'),
(0, 'Free wifi in Hospitals', 'Hospitals should Allow Free WiFi in hospitals', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(8) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_level` int(8) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_level`) VALUES
(17, 'admin', 'root', 'abc@admin.com', 1),
(16, 'foo', 'pass', 'foo.bar@foo.po', 0),
(14, 'rohit', 'precious', 'karadkar.rohit@gmail.com', 0),
(12, 'nikita', 'pass', 'nikita.bongale@foo.bar', 0),
(18, 'abc', '123', 'pratsj9@gmail.com', 0),
(17, 'pratsj9', '123', 'pratsj9@live.in', 0),
(11, 'rohan', 'foo', 'rohan.karadkar@gmail.com', 0),
(10, 'rnztx', 'pass', 'rohit.karadkar@gmail.com', 0),
(13, 'shreya', 'pass', 'shreya.karadkar@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`), ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `user_email` (`user_email`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
