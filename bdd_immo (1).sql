-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Avril 2021 à 14:55
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd_immo`
--

-- --------------------------------------------------------

--
-- Structure de la table `bien`
--

CREATE TABLE `bien` (
  `ref` int(10) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `type` int(10) NOT NULL,
  `prix` varchar(20) NOT NULL,
  `surface` int(11) NOT NULL,
  `nbpiece` int(11) NOT NULL,
  `jardin` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bien`
--

INSERT INTO `bien` (`ref`, `adresse`, `type`, `prix`, `surface`, `nbpiece`, `jardin`) VALUES
(1, 'Tourcoing', 1, '160 000', 100, 5, 'avec'),
(2, 'Tourcoing', 1, '202 000', 175, 7, 'avec'),
(3, 'Mouveaux', 2, '120 000 ', 230, 6, 'sans'),
(4, 'Roubaix', 2, '50 000', 320, 5, 'sans'),
(5, 'Lille', 3, '60 000', 132, 6, 'avec'),
(6, 'Bondues', 3, '50 000', 429, 8, 'sans'),
(7, 'Douai', 4, '140 000', 189, 5, 'sans'),
(8, 'Sequedin', 4, '200 000', 299, 6, 'avec'),
(9, 'Lille', 5, '1 400 000', 563, 8, 'sans'),
(10, 'Lambersart', 5, '2 500 000', 598, 8, 'sans');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `numeroBien` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `extension` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `numeroBien`, `numero`, `extension`) VALUES
(1, 1, 1, 'jpg'),
(2, 1, 2, 'jpg'),
(3, 2, 1, 'jpg'),
(4, 2, 2, 'jpg'),
(5, 2, 3, 'jpg'),
(6, 3, 1, 'jpeg'),
(7, 3, 2, 'jpeg'),
(8, 3, 3, 'jpeg'),
(9, 4, 1, 'jpeg'),
(10, 4, 2, 'jpeg'),
(11, 4, 3, 'jpeg'),
(12, 5, 1, 'jpg'),
(13, 5, 2, 'jpg'),
(14, 5, 3, 'jpg'),
(15, 6, 1, 'jpg'),
(16, 6, 2, 'jpg'),
(17, 7, 1, 'jpg'),
(18, 8, 1, 'jpg'),
(19, 9, 1, 'jpg'),
(20, 9, 2, 'jpg'),
(21, 9, 3, 'jpg'),
(22, 10, 1, 'jpg'),
(23, 10, 2, 'jpg'),
(24, 10, 3, 'jpg');

-- --------------------------------------------------------

--
-- Structure de la table `typebien`
--

CREATE TABLE `typebien` (
  `id` int(10) NOT NULL,
  `libelle` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typebien`
--

INSERT INTO `typebien` (`id`, `libelle`) VALUES
(1, 'Maison'),
(2, 'Appartement'),
(3, 'Local'),
(4, 'Terrains'),
(5, 'Immeuble');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`) VALUES
(1, 'groupe1', 'groupe1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bien`
--
ALTER TABLE `bien`
  ADD PRIMARY KEY (`ref`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ce_bien_image` (`numeroBien`);

--
-- Index pour la table `typebien`
--
ALTER TABLE `typebien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `ce_bien_image` FOREIGN KEY (`numeroBien`) REFERENCES `bien` (`ref`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
