-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2021 at 06:22 AM
-- Server version: 10.2.10-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-restaurante`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_cart`
--

CREATE TABLE `test_cart` (
  `cart_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(100) NOT NULL DEFAULT '',
  `status` varchar(15) NOT NULL DEFAULT 'Initial',
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla de carrito de compras';

-- --------------------------------------------------------

--
-- Table structure for table `test_cart_items`
--

CREATE TABLE `test_cart_items` (
  `cart_item_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `comment` varchar(100) NOT NULL DEFAULT '',
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='tabla de cart_items';

-- --------------------------------------------------------

--
-- Table structure for table `test_restaurant`
--

CREATE TABLE `test_restaurant` (
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `thumbnail` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de restaurantes';

--
-- Dumping data for table `test_restaurant`
--

INSERT INTO `test_restaurant` (`restaurant_id`, `name`, `thumbnail`, `status`, `updated`) VALUES
(1, 'Nu\'ul. El mejor restaurante de la Riviera Maya', 'restaurant_1.jpg', 1, '2021-11-18 20:01:53'),
(2, 'El Coapeñito. El sabor de Coapa en otros lados que no son Coapa', 'restaurant_2.jpeg', 1, '2021-11-18 20:01:53'),
(3, 'Alita Mia', 'restaurant_3.jpg', 1, '2021-11-19 05:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `test_restaurant_menu`
--

CREATE TABLE `test_restaurant_menu` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `course` varchar(21) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `item_thumbnail` varchar(100) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='menus de restaurantes';

--
-- Dumping data for table `test_restaurant_menu`
--

INSERT INTO `test_restaurant_menu` (`menu_id`, `restaurant_id`, `course`, `name`, `item_thumbnail`, `keyword`, `description`, `price`) VALUES
(1, 2, 'Meal', 'Taco Coapeño. ', 'taco_coapeno_1.jpg', 'tacos suadero comida', 'El mejor suadero y chorizo', 25),
(2, 2, 'Appetizer', 'Cebollitas Cambrai', 'cebollitas_1.jpg', 'entrada cebolla comida asado', 'Cebollitas Asadas en grasa de la rica', 40),
(3, 1, 'Appetizer', 'Sashimi de Atun', 'sashimi_1.jpg', 'saludable pescado japones ', 'Sashim de atun corte fino', 190),
(4, 2, 'Meal', 'Taco de Arrachera', 'taco_arrachera_1.jpg', 'taco arrachera comida mexicana ', 'Suave arrachera cortada en cuadritos en una tortilla', 32),
(5, 2, 'Meal', 'Taco de Pastor', 'taco_pastor_1.jpg', 'taco pastor comida mexicana ', 'Taco de pastor, directo del trompo', 25),
(6, 2, 'Meal', 'Taco de Nopales', 'taco_nopales_1.jpg', 'vegan nopales taco mexicano', 'Taco de nopalitos asados con cebolla.', 23),
(7, 1, 'Meal', 'Ceviche de pescado fresco', 'ceviche_1.jpg', 'ceviche healthy pescado raw food', 'Ceviche de pescado, puede ser mero o hoachinango', 230),
(8, 1, 'Meal', 'Pulpo a las brasas', 'pulpo_1.jpg', 'pulpo seafood mariscos', 'Pulp recien sacado del mar asado en brasas conservando su sabor', 350),
(9, 2, 'Dessert', 'Platano con crema', 'platano_crema_1.jpg', 'postre gordo platano', 'Platano macho asado con crema fresca y canales', 130),
(10, 1, 'Dessert', 'Pastel de Chocolate', 'pastel_chocolate_1.jpg', 'pastel chocolate postre desert', 'Pastel de chocolate con extra chocolate', 140),
(11, 1, 'Meal', 'Ratatuille', 'ratatouille_1.jpg', 'vegan vegetales homemade', 'Ratatuille como el de la pelicula', 230),
(12, 2, 'Appetizer', 'Chicharron de queso', 'chicharron_queso_1.jpg', 'entrada queso chicharron mexicana', 'Queso asado hasta que se vuelve un taco', 90),
(13, 2, 'Appetizer', 'Taqueños', 'taqueno_1.jpg', 'tacos venezuela ', 'Para el paladar internacional, unos taqueños como los de casa', 80),
(14, 1, 'Meal', 'Bife de chorizo', 'bife_1.jpg', 'argentino asado bife corte carne', 'Un bife de chorizo de 600gs al punto como lo hacen los viejos', 600),
(15, 3, 'Appetizer', '12 Alitas Buffalo', 'chicken_1.jpg', 'alitas pollo buffalo', 'Alitas en Salsa Bufalo', 90),
(16, 3, 'Meal', '12 Alitas Lemon & Pepper', 'chicken_1.jpg', 'alitas pollo lemon pepper', 'Alitas en Salsa Lemon Pepper', 90),
(17, 3, 'Appetizer', 'Papas a la francesa', 'fries_1.jpg', 'papas francesa', 'Papas a la francesa', 70);

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='lista de usuarios';

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`user_id`, `name`, `phone`, `address`, `created`) VALUES
(1, 'Xavier Alfeiran', '+529981932630', 'Av Yaxchilan con Labna', '2021-11-18 23:56:57'),
(2, 'Xavier Alfeiran', '+529981932630', 'Av Yaxchilan con Labna', '2021-11-18 23:57:28'),
(3, 'Xavier Alfeiran', '+529981932630', 'Av Yaxchilan con Labna', '2021-11-18 23:57:47'),
(4, 'Ricardo Diaz', '9982095548', 'Blvd Luis D. Colosio, MZ 305. Plaza CUNSTORAGE Piso 2 Oficina 07.', '2021-11-19 00:04:31'),
(5, 'Ricardo Diaz', '9982095548', 'Blvd Luis D. Colosio, MZ 305. Plaza CUNSTORAGE Piso 2 Oficina 07.', '2021-11-19 00:04:48'),
(7, 'Xavier Alfeiran', '9981659329', 'av. yaxchilan y labna\nTelevisora de Cancun', '2021-11-19 02:13:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_cart`
--
ALTER TABLE `test_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `test_cart_items`
--
ALTER TABLE `test_cart_items`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `test_restaurant`
--
ALTER TABLE `test_restaurant`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `test_restaurant_menu`
--
ALTER TABLE `test_restaurant_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `fk_restaurant` (`restaurant_id`);

--
-- Indexes for table `test_users`
--
ALTER TABLE `test_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_cart`
--
ALTER TABLE `test_cart`
  MODIFY `cart_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_cart_items`
--
ALTER TABLE `test_cart_items`
  MODIFY `cart_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_restaurant`
--
ALTER TABLE `test_restaurant`
  MODIFY `restaurant_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_restaurant_menu`
--
ALTER TABLE `test_restaurant_menu`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `test_users`
--
ALTER TABLE `test_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test_restaurant_menu`
--
ALTER TABLE `test_restaurant_menu`
  ADD CONSTRAINT `fk_restaurant` FOREIGN KEY (`restaurant_id`) REFERENCES `test_restaurant` (`restaurant_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
