-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 02 jan. 2024 à 23:10
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `serpentarium`
--

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `Id_Race` int NOT NULL,
  `nomRace` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `race`
--

INSERT INTO `race` (`Id_Race`, `nomRace`) VALUES
(1, 'Python réticulé'),
(2, 'Boa constrictor'),
(3, 'Vipère cornue'),
(4, 'Anaconda vert'),
(5, 'Serpent à sonnette'),
(6, 'Python tacheté '),
(7, 'Couleuvre à collier'),
(8, 'Serpent de mer à tête plate'),
(9, 'Cobra cracheur'),
(10, 'Cobra Royal');

-- --------------------------------------------------------

--
-- Structure de la table `serpent`
--

CREATE TABLE `serpent` (
  `Id_Serpent` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `poids` int NOT NULL,
  `dureeDeVie` time DEFAULT NULL,
  `heureDateNaissance` timestamp NULL DEFAULT NULL,
  `genre` tinyint(1) DEFAULT NULL,
  `Id_Race` int NOT NULL,
  `Mort` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `serpent`
--

INSERT INTO `serpent` (`Id_Serpent`, `nom`, `poids`, `dureeDeVie`, `heureDateNaissance`, `genre`, `Id_Race`, `Mort`) VALUES
(1, 'Fidow', 5, '00:05:00', '2023-01-01 08:30:00', 0, 4, 1),
(2, 'Whiskers', 7, '00:05:00', '2023-01-02 08:30:00', 0, 2, 1),
(3, 'Buddy', 10, '00:05:00', '2023-01-03 08:30:00', 1, 3, 1),
(4, 'Fluffy', 8, '00:05:00', '2023-02-01 08:30:00', 1, 4, 0),
(5, 'Mittens', 6, '00:05:00', '2023-02-03 08:30:00', 0, 5, 0),
(6, 'Charlie', 9, '00:05:00', '2023-02-05 08:30:00', 1, 6, 0),
(7, 'Bella', 7, '00:05:00', '2023-02-07 08:30:00', 0, 7, 1),
(8, 'Lucky', 6, '00:05:00', '2023-02-09 08:30:00', 1, 9, 0),
(9, 'Daisy', 8, '00:05:00', '2023-02-21 08:30:00', 1, 8, 0),
(10, 'Max', 10, '00:05:00', '2023-02-23 08:30:00', 0, 6, 0),
(11, 'Buddy', 9, '00:05:00', '2023-02-25 08:30:00', 1, 10, 0),
(12, 'Oliver', 7, '00:05:00', '2023-02-27 08:30:00', 0, 8, 0),
(13, 'Luna', 6, '00:05:00', '2023-02-28 08:30:00', 1, 2, 0),
(14, 'Bentley', 8, '00:05:00', '2023-03-01 08:30:00', 0, 3, 0),
(15, 'Lucy', 10, '00:05:00', '2023-03-03 08:30:00', 1, 4, 0),
(16, 'Duke', 9, '00:05:00', '2023-03-05 08:30:00', 0, 5, 0),
(17, 'Molly', 7, '00:05:00', '2023-03-07 08:30:00', 1, 4, 0),
(18, 'Daisy', 6, '00:05:00', '2023-03-09 08:30:00', 0, 8, 0),
(19, 'Milo', 8, '00:05:00', '2023-03-11 08:30:00', 1, 6, 0),
(20, 'Zoe', 10, '00:05:00', '2023-03-13 08:30:00', 0, 1, 0),
(21, 'Buddy', 9, '00:05:00', '2023-03-15 08:30:00', 1, 2, 0),
(22, 'Bailey', 7, '00:05:00', '2023-03-17 08:30:00', 0, 1, 0),
(23, 'Sophie', 6, '00:05:00', '2023-03-19 08:30:00', 1, 2, 0),
(24, 'Riley', 8, '00:05:00', '2023-03-21 08:30:00', 0, 3, 0),
(25, 'Cooper', 10, '00:05:00', '2023-03-23 08:30:00', 1, 4, 0),
(30, 'dfhdhdf', 36, '00:30:00', '2023-01-01 08:35:00', 0, 3, 0),
(31, 'dfhdhdf', 36, '00:35:00', '2023-01-01 08:35:10', 1, 3, 0),
(32, 'arg', 36, '00:30:00', '2023-01-01 08:35:10', 1, 3, 0),
(33, 'Serpent_9483', 39, '00:00:18', '2017-07-19 15:35:13', 0, 2, 0),
(34, 'Serpent_6929', 62, '00:00:17', '2013-07-28 19:32:29', 1, 1, 0),
(35, 'Serpent_3497', 88, '00:00:04', '2005-06-18 08:09:22', 1, 2, 0),
(36, 'Serpent_6262', 67, '00:00:03', '2004-04-20 21:24:00', 0, 1, 0),
(37, 'Serpent_5266', 36, '00:00:18', '2006-02-13 03:45:28', 1, 1, 0),
(38, 'Serpent_8906', 26, '00:00:08', '2009-12-25 12:08:36', 1, 1, 0),
(39, 'Serpent_6265', 36, '00:00:19', '2005-09-16 15:34:44', 0, 5, 0),
(40, 'Serpent_6082', 84, '00:00:10', '2021-08-22 05:40:52', 0, 3, 0),
(41, 'Serpent_9792', 87, '00:00:07', '2008-04-28 13:26:50', 1, 3, 0),
(42, 'Serpent_2935', 9, '00:00:15', '2019-05-26 14:09:43', 0, 6, 0),
(43, 'Serpent_6921', 6, '00:00:05', '2014-06-23 13:10:48', 0, 9, 0),
(44, 'Serpent_2866', 7, '00:00:13', '2007-06-09 08:17:59', 1, 2, 0),
(45, 'Serpent_9293', 1, '00:00:15', '2018-08-29 05:42:33', 0, 7, 0),
(46, 'Serpent_2155', 7, '00:00:05', '2023-08-30 14:43:07', 0, 4, 0),
(47, 'Serpent_4902', 4, '00:00:14', '2023-12-27 13:08:45', 0, 4, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`Id_Race`);

--
-- Index pour la table `serpent`
--
ALTER TABLE `serpent`
  ADD PRIMARY KEY (`Id_Serpent`),
  ADD KEY `Id_Race` (`Id_Race`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `Id_Race` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `serpent`
--
ALTER TABLE `serpent`
  MODIFY `Id_Serpent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `serpent`
--
ALTER TABLE `serpent`
  ADD CONSTRAINT `serpent_ibfk_1` FOREIGN KEY (`Id_Race`) REFERENCES `race` (`Id_Race`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
