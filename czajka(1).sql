-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 13, 2023 at 10:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `czajka`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `home_number` varchar(255) DEFAULT NULL,
  `creation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id_account`, `login`, `password`, `email`, `country`, `city`, `postal_code`, `street`, `home_number`, `creation_time`) VALUES
(1, 'Test', '$argon2id$v=19$m=65536,t=4,p=1$Q05tWGlXeDRTRjRNSlRrbw$XNtL+k+sPKqRvp0GiFe1CdpKR/Qk/tTM1r+H8m0oqL4', 'test@example.com', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(2, 'user', '$argon2id$v=19$m=65536,t=4,p=1$OVFnbGdpUFA2c2YuOVRvbw$xAqKHHkHV+juIH+i+C/u4aUBgJlSFX88Xvvi44AJSFk', 'user@test.pl', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(3, 'testusr', '$2y$10$k17nzDNro/aDGtgcWgeuCOQf63qxLcA6gKBDXEvA0lLo54q2l9rP2', 'test@sample.com', NULL, NULL, NULL, NULL, NULL, '2023-03-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id_cart`, `id_account`, `id_product`, `count`) VALUES
(1, 3, 2, 3),
(2, 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `category`, `count`, `quantity`, `description`, `price`, `image`) VALUES
(1, 'Sencha 50g', 0, 45, 45, 'Sencha to rodzaj japońskiej zielonej herbaty przygotowywanej bez mielenia liści. Podobnie jak inne herbaty japońskie, jest ona z reguły silniejsza w smaku od swoich chińskich odpowiedników.', 12, 'sencha1'),
(2, 'Herbata rooibos pomarańczowo cynamonowa 50g', 0, 20, 20, 'Herbata rooibos pomarańczowo cynamonowa to napar przejrzysty, o ciemnej, intensywnej, czerwono-pomarańczowej barwie. W smaku delikatna, jedwabista, z wyczuwalnymi nutami pomarańczy i cynamonu oraz z charakterystycznym dla rooibosa miodowym posmakiem. Możn', 9.5, 'roiboos-1');

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `baskets_fk0` (`id_account`),
  ADD KEY `baskets_fk1` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `orders_fk0` (`id_account`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD KEY `products_orders_fk0` (`id_order`),
  ADD KEY `products_orders_fk1` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `baskets_fk0` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id_account`),
  ADD CONSTRAINT `baskets_fk1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id_account`);

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_orders_fk0` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_orders`),
  ADD CONSTRAINT `products_orders_fk1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
