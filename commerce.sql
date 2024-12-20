-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 20 déc. 2024 à 14:56
-- Version du serveur : 8.0.40-0ubuntu0.24.04.1
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `total`, `created_at`) VALUES
(3, 'Jonhy', 'john@rest.ru', 75.00, '2024-12-18 11:19:42'),
(4, 'Jonhy', 'john@rest.ru', 75.00, '2024-12-18 11:21:03'),
(5, 'Jonhy', 'john@rest.ru', 75.00, '2024-12-18 11:24:02'),
(6, 'anny', 'anny@eco.fr', 75.00, '2024-12-18 11:36:04'),
(7, 'rembi', 'rmbok@test.eu', 50.00, '2024-12-18 11:41:16'),
(8, 'test', 'rmbok@test.eu', 125.00, '2024-12-20 13:00:16'),
(9, 'res', 'tres@trans.com', 60.00, '2024-12-20 13:11:59'),
(10, 'John', 'doe@test.fr', 50.00, '2024-12-20 13:28:05'),
(11, 'tests', 'dresing@mag.org', 25.00, '2024-12-20 13:50:49'),
(12, 'ghetis', 'pok@tms.us', 100.00, '2024-12-20 14:18:44'),
(13, 'Dos', 'santos@test.com', 175.00, '2024-12-20 14:26:47'),
(14, 'karim', 'khenza@gmail.com', 20.00, '2024-12-20 14:53:43');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 3, 2, 3),
(2, 4, 2, 3),
(3, 5, 2, 3),
(4, 6, 1, 5),
(5, 7, 2, 2),
(6, 8, 2, 5),
(7, 9, 1, 4),
(8, 10, 2, 2),
(9, 11, 2, 1),
(10, 12, 2, 4),
(11, 13, 2, 7),
(12, 14, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'rest', 15.00),
(2, 'test', 25.00),
(3, 'piece', 10.00);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('client','admin') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'client',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(3, 'john', '$2y$10$QvDLPoRfWPS5RFCynekNseTheyvRZZqS/XbclrIFHS6DfGMfkj7.G', 'client', '2024-12-20 13:26:49'),
(4, 'admin', '$2y$10$CH5aEJeUeetUPn9RdvKJie4wwWSMs7qv0QUVzvLaL36nvjwDW875G', 'admin', '2024-12-20 13:38:48'),
(5, 'didier', '$2y$10$Bk0ZE2pUzJO5nu3glRSjaeRQ0kL5g3MUZbvt3HdkiSvAp5/0A4NY6', 'client', '2024-12-20 14:22:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
