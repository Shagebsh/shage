-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: יולי 21, 2021 בזמן 11:37 PM
-- גרסת שרת: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shageshop`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `cost` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `orders`
--

CREATE TABLE `orders` (
  `id` int(50) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `order-date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(0, 'black hoodie', 87, './img/4.jfif'),
(0, 'Black hoodie', 80, './img/560(1).jpg'),
(0, 'Black hoodie', 80, './img/560(1).jpg');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `categotyid` int(11) NOT NULL,
  `description` text NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `categotyid`, `description`, `product_img`) VALUES
(1, 'yallow hoodi', '100', 1, '19', './img/4.jfif'),
(2, 'black hoodie ', '50', 1, 'black hoodie 100%coton ', './img/560 (1).jpg'),
(3, 'never to late hoodi', '75', 0, '', './img/560.jpg'),
(4, 'black tshirt', '55', 0, '', './img/img3.jpg'),
(5, 'long tshirt', '70', 0, '', './img/img4.jpg'),
(6, 'wight tshirt', '65', 0, '', './img/tshirt2.jpg'),
(7, 'black shirt', '80', 0, '', './img/swetshiet.jpg'),
(8, 'green jacket', '89', 0, '', './img/jacket2.jpg'),
(9, 'black jacket', '95', 0, '', './img/jacket3.jpg'),
(10, 'costom tshirt', '77', 0, '', './img/tshirt.jpg'),
(11, 'black jeanse', '68', 0, '', './img/jeans.jpg'),
(12, 'gray jeanse', '78', 0, '', './img/jeans2.jpg');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `createday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `password`, `email`, `address`, `createday`) VALUES
(0, 'admin', '', '4297f44b13955235245b2497399d7a93', 'admin@admin.com', '', '0000-00-00'),
(0, 'Shadibshara', '', '4297f44b13955235245b2497399d7a93', 'bsharashadi66@gmail.com', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
