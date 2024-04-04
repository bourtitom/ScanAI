
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
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `request` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `request`, `image`) VALUES
(53, 'Classic', '5', 25, 'gold.png'),
(54, 'Premium', '10', 60, 'ruby.png'),
(55, 'King', '15', 0, 'crown2.png');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_connexion` datetime DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `last_connexion`, `date_registered`) VALUES
(13, 'admin@admin', '$2y$10$/mfb71.mIifWk2z5Y2d5rOun9LqkPQPnUBe29GWjsu398ssKl89YC', NULL, NULL),
(16, 'feur@admin', '$2y$10$K9K7Zei4CBpIokm0hPtWSeNjezj2wckK/J1J80QNrBDRMduxrmWZq', NULL, NULL),
(17, 'theo.riak@gmail.com', '$2y$10$16d0tOwDiP1Cgv58JdiVO.ZQmnCGj7TwuVXvlmxMfGq8lx3/gYWWq', NULL, NULL),
(19, 'theo.riak1@gmail.com', '$2y$10$rlj/TQXk8B643LJfrSLh/.tXKnrZFSPWZPTY2EdWdRJh33PBOkvAS', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;
