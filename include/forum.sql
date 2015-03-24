-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2015 at 01:34 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'General Discussion', 'off-topics');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
(8, 4, 'comment no 2', 'admin', '2015-03-24');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`, `topic_description`, `category_id`, `topic_auther`) VALUES
(1, 'Free wifi in Hospitals', 'Every Hospital should be offering free wifi, so it will be helpful for family of patients', 1, 'rnztx'),
(2, 'ban eating on Roads', 'aaa', 1, 'rnztx'),
(3, 'Smoking In Colleges', 'good or bad', 1, 'rnztx'),
(4, 'reason for near-sightedness', 'all time indoor', 1, 'rnztx'),
(5, 'Future of cars', 'is Electrnics', 1, 'admin');

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
(18, 'rnztx', 'pass', 'rnztx@admin.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`post_id`), ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
 ADD PRIMARY KEY (`topic_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD UNIQUE KEY `user_email` (`user_email`), ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
