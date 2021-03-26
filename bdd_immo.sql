-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 26 Mars 2021 à 13:01
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
  `prix` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bien`
--

INSERT INTO `bien` (`ref`, `adresse`, `type`, `prix`) VALUES
(1, 'Tourcoing', 1, '160 000'),
(2, 'Tourcoing', 1, '202 000'),
(3, 'Mouveaux', 2, '120 000 '),
(4, 'Roubaix', 2, '50 000'),
(5, 'Lille', 3, '60 000'),
(6, 'Bondues', 3, '50 000'),
(7, 'Douai', 4, '140 000'),
(8, 'Sequedin', 4, '200 000'),
(9, 'Lille', 5, '1 400 000'),
(10, 'Lambersart', 5, '2 500 000');

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
-- Index pour la table `typebien`
--
ALTER TABLE `typebien`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
