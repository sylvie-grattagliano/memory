-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 oct. 2024 à 04:22
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `candymemo`
--

-- --------------------------------------------------------

--
-- Structure de la table `tableau`
--

DROP TABLE IF EXISTS `tableau`;
CREATE TABLE IF NOT EXISTS `tableau` (
  `Joueurs_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `Score` int NOT NULL,
  PRIMARY KEY (`Joueurs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tableau`
--

INSERT INTO `tableau` (`Joueurs_id`, `name`, `Score`) VALUES
(1, 'Sylvie GRATTAGLIANO', 0),
(2, 'Sylvie GRATTAGLIANO', 0),
(3, 'TESTDEDIANCHE DERNIER', 100),
(4, 'ALICIA ALICIA', 100),
(5, 'TESTDEDIANCHE DERNIER', 100),
(6, 'TESTDEDIANCHE DERNIER', 100),
(7, 'SS ZZ', 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
