-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2020 at 11:30 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_login_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `menu_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `menu_id`, `name`, `alias`, `description`) VALUES
(1, '1', 'store', 'Save data', 'Insert data'),
(2, '1', 'update', 'Update data', 'Update data'),
(3, '1', 'destroy', 'Hapus data', 'Destroy data'),
(4, '2', 'store', 'Save data', 'Insert data'),
(5, '2', 'update', 'Update data', 'Update data'),
(6, '2', 'destroy', 'Hapus data', 'Destroy data'),
(7, '3', 'test', 'test', 'Test'),
(8, '4', 'empat', 'empat', 'empat'),
(9, '5', 'test_get', 'Get data', 'Get data text example api');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `sub` int(2) NOT NULL,
  `order_key` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `controller`, `sub`, `order_key`, `type`) VALUES
(1, 'User', 'user', 1, 1, NULL),
(2, 'Role', 'role', 1, 2, NULL),
(3, 'Menu 3', 'menu3', 2, 1, NULL),
(4, 'Menu 4', 'menu4', 2, 2, NULL),
(5, 'Test Api', 'test', 0, 1, 'api');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'All Menu / Super Admin', 'Desc All Menu / Super Admin'),
(2, 'Only User &amp;amp;amp;amp;amp; Role', 'Desc Only User &amp;amp;amp;amp;amp; Role');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(27, 2, 1),
(28, 2, 2),
(33, 1, 1),
(34, 1, 2),
(35, 1, 3),
(36, 1, 4),
(37, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role_menu_action`
--

CREATE TABLE `role_menu_action` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_menu_action`
--

INSERT INTO `role_menu_action` (`id`, `role_id`, `menu_id`, `action`) VALUES
(61, 2, 1, 'store'),
(62, 2, 1, 'update'),
(63, 2, 1, 'destroy'),
(64, 2, 2, 'store'),
(65, 2, 2, 'update'),
(66, 2, 2, 'destroy'),
(75, 1, 1, 'store'),
(76, 1, 1, 'update'),
(77, 1, 1, 'destroy'),
(78, 1, 2, 'store'),
(79, 1, 2, 'update'),
(80, 1, 2, 'destroy'),
(81, 1, 3, 'test'),
(82, 1, 4, 'empat'),
(83, 1, 5, 'index_get');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Hery Fidiawan', 'fidiawan', 'heryfidiawan07@gmail.com', '$2y$10$nMuXAiZ4FzCIZOciri5U/.MtJE5RzH2jpej9TPhDKIHqYXu.l03au'),
(2, 'User 2', 'user2', 'user2@mail.com', '$2y$10$www57RmZu9Hyenibv1P.aOub62fP05X4/6PJk9RXGgIhOIO7KbVD2'),
(3, 'User 3', 'user3', 'user3@mail.com', '$2y$10$CVODQ4wEOzd31aaJ4qXyJehEdWdhZMroHHC.WPWvu0pPdcJKqomNC');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`controller`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_menu_action`
--
ALTER TABLE `role_menu_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `role_menu_action`
--
ALTER TABLE `role_menu_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
