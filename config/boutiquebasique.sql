-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 mars 2024 à 23:49
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutiquebasiqueoff`
--
CREATE DATABASE IF NOT EXISTS `boutiquebasiqueoff` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `boutiquebasiqueoff`;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `PRODUIT_ID` int(11) NOT NULL,
  `PRODUIT_NOM` varchar(50) NOT NULL,
  `PRODUIT_PRIX` decimal(10,0) NOT NULL,
  `PRODUIT_IMAGE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`PRODUIT_ID`, `PRODUIT_NOM`, `PRODUIT_PRIX`, `PRODUIT_IMAGE`) VALUES
(29, 'Sword', 200, 'sword.jpg'),
(30, 'Axe', 250, 'axe.jpg'),
(31, 'Bow', 150, 'bow.jpg'),
(32, 'Arrow', 5, 'arrow.jpg'),
(33, 'Tissu', 1, 'tissu.jpg'),
(34, 'Iron', 10, 'iron.webp'),
(35, 'Wood', 3, 'buche.jpeg'),
(36, 'Salad', 2, 'salad.webp'),
(37, 'Bread', 1, 'bread.jpeg'),
(38, 'Tarte au Potiron', 20, 'tartepotiron.jpg'),
(39, 'Tarte au Pomme', 20, 'tartepomme.webp'),
(40, 'Tarte au Fraise', 20, 'tarteberry.jpg'),
(41, 'Potion de Soins', 50, 'potionsoins.webp'),
(42, 'Potion de Force', 50, 'potionforce.png'),
(43, 'Potion de Poison', 50, 'potionpoison.webp'),
(44, 'Potion de Charme', 50, 'potioncharme.webp'),
(45, 'Peau de Sanglier', 10, 'peaus.webp'),
(46, 'Viande de Sanglier', 15, 'viands.png'),
(47, 'Peau de Lapin', 10, 'peaul.jpeg'),
(48, ' Viande de Lapin', 15, 'viandel.jpg'),
(49, 'Dragon', 1200, 'dragon.jpg'),
(50, 'Loup', 350, 'loup.jpg'),
(51, 'Chien', 100, 'chien.jpg'),
(52, 'Cheval', 300, 'cheval.webp');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_connexion` datetime NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `last_connexion`, `date_registered`) VALUES
(11, 'feur@root', '$2y$10$RwoITgKnBvdEYxYiYoK1beMT5SNebsPjznkLCCC/iahwbLXpMz1ny', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'test@test', '$2y$10$HOq5qPwdGs9J/B/4F.Nt7uneKomD2.niGfSikjoPmD11N0HNBapQ6', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`PRODUIT_ID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `PRODUIT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
