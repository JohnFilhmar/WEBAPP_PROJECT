-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2023 at 02:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `user_id` int NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_auth`
--

CREATE TABLE `login_auth` (
  `id` int NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `token` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_auth`
--

INSERT INTO `login_auth` (`id`, `email`, `password`, `token`) VALUES
(27, 'elizabethgeronaga@gmail.com', '$2y$10$Ooo7XOHpIFX1At4JJJs81OG5.b29if2Ol789GGpkCS4xsnZKWP/JW', 'verified'),
(28, 'olajohnfilhmar@gmail.com', '$2y$10$H9ojZMx6IvBMDOl0AzbddeO6E5WIz.G/z4xTQMhD50Yhb5NQQNdT.', 'verified'),
(31, 'qwe@qwe.com', '$2y$10$bebk1ZcU5ioA3EcsIseWz..AjuSjZLNOBySR3RrxzDyy.AJvh/Vzu', 'verified'),
(32, 'asdf@gmail.com', '$2y$10$BJrdiaaJSQQLqsyEguOxP.Nx.6VyGDDkZeEz3MCDF9sC/y4p/A6YO', 'verified'),
(33, 'qwe@email.com', '$2y$10$3NdzNYdJ0SH30ABFbdaV5ufILM901uTO.voXpJF0b2YLCqI5.Wyt2', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-11-12-051147', 'App\\Database\\Migrations\\Users', 'default', 'App', 1699765971, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `compatibility` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `price` int NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `itemname`, `compatibility`, `description`, `image`, `price`, `date_added`, `quantity`) VALUES
(35, '1', '1', '1', 'WIN_20231024_16_59_16_Pro.jpg', 1, '2023-12-03 21:32:08', 0),
(36, '2', '2', '2', 'WIN_20231024_16_58_59_Pro.jpg', 2, '2023-12-03 21:32:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `webproject`
--

CREATE TABLE `webproject` (
  `id` int NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `webproject`
--

INSERT INTO `webproject` (`id`, `username`, `password`, `image`, `email`, `role`) VALUES
(37, 'ADMIN', '$2y$10$sZ4woRcU2B46/cjHzH8ZveT2UjkwpgWr6xbVdTnL683gEhcLBIKQm', NULL, NULL, 'USER'),
(39, 'ADMINISTRATOR', '$2y$10$QRyEQXA/IQ1hCFQLKXW86uz.2Ps6sRktAZ7plSK9Z/wqRQQ4xruuS', NULL, NULL, 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constraint_products_id_FK_cart_item_id` (`item_id`),
  ADD KEY `constraint_users_id_FK_cart_user_id` (`user_id`);

--
-- Indexes for table `login_auth`
--
ALTER TABLE `login_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webproject`
--
ALTER TABLE `webproject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_auth`
--
ALTER TABLE `login_auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `webproject`
--
ALTER TABLE `webproject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `constraint_products_id_FK_cart_item_id` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint_users_id_FK_cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `webproject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
