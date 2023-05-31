-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'business', 3),
(2, 'sports', 2),
(3, 'politics', 3),
(4, 'entertainment', 2),
(7, 'health', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'Politics - 2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '3', '21 May, 2023', 1, 'butterfly.jpg'),
(2, 'Politics', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '3', '21 May, 2023', 2, 'post-format.jpg'),
(3, 'Sports - 1', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '2', '21 May, 2023', 2, 'rose.jpg'),
(4, 'Demo - 2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '7', '21 May, 2023', 3, 'butterfly.jpg'),
(5, 'demo', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '4', '22 May, 2023', 5, 'butterfly.jpg'),
(6, 'demo', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '7', '22 May, 2023', 5, 'rose.jpg'),
(7, 'demo update', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi. Modi sequi labore rem nostrum. Repudiandae voluptate dolore deserunt eligendi aperiam necessitatibus officiis. Accusantium sint voluptate omnis sit iste quam quo esse atque nihil consectetur!', '2', '22 May, 2023', 3, 'post_1.jpg'),
(9, 'new post', 'lorem test', '1', '26 May, 2023', 3, 'avater2.jpeg'),
(10, 'business', 'lorem text update', '1', '26 May, 2023', 3, 'avater3.jpeg'),
(11, 'testing ', 'lorem text', '3', '26 May, 2023', 5, 'avater1.jpeg'),
(12, 'demo 1', 'demo 1', '4', '27 May, 2023', 4, 'post-format.jpg'),
(13, 'add post', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, consectetur. Quisquam provident ut distinctio, non illum harum ex iure repudiandae aspernatur, numquam aut fuga animi, temporibus consequatur fugiat blanditiis error voluptatibus ab neque dolorum. Ab, doloremque ipsum nobis eos fugit excepturi necessitatibus unde recusandae tenetur illum omnis labore, eum atque perferendis, nam illo debitis sequi.', '1', '28 May, 2023', 2, '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `website_name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `footer_desc` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`website_name`, `logo`, `footer_desc`) VALUES
('News Site', 'tree.jpg', '© copyright 2022 News Site | <a href=\"https://webdev531.000webhostapp.com/\">Yash Borda</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Vinay', 'Jivani', 'vinay777', 'ad2050f30d3e477b973eaf31b9ef5fef', 1),
(2, 'Yash', 'Borda', 'yashborda7048', '0e7517141fb53f21ee439b355b5a1d0a', 1),
(3, 'Jenish', 'Vala', 'jenish999', '142a2cc20b6838b88cbbe9a6e22d8e34', 0),
(4, 'Keyur', 'Lamabhiya', 'keyur888', 'c1591b6d4b33d2cf6c4912c919f83cca', 0),
(5, 'Abhishek', 'Ghadiya', 'abhishek888', 'f68074d4197bc01dda9f8d765e9632e0', 0),
(6, 'Chandramol', 'Panday', 'chandramol666', 'b2af147537917eb7108e111ab2b0e5f4', 0),
(7, 'Demo', 'User', 'demo123', '62cc2d8b4bf2d8728120d052163a77df', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
