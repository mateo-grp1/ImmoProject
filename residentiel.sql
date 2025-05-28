-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 mai 2025 à 15:31
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetpiscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `residentiel`
--

DROP TABLE IF EXISTS `residentiel`;
CREATE TABLE IF NOT EXISTS `residentiel` (
  `numero` int NOT NULL,
  `photo` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pieces` int NOT NULL,
  `chambres` int NOT NULL,
  `dimension` int NOT NULL,
  `etage` int NOT NULL,
  `balcon` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parking` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Déchargement des données de la table `residentiel`
--

INSERT INTO `residentiel` (`numero`, `photo`, `adresse`, `pieces`, `chambres`, `dimension`, `etage`, `balcon`, `parking`, `prix`) VALUES
(101, '/Projet_Piscine/ImagePiscine/maisonAccueil.jpg', '12 rue des érables', 3, 2, 68, 2, 'Oui', 'Non', 89000),
(102, '/Projet_Piscine/ImagePiscine/maisonAccueil.jpg', '89 avenue Jean Jaurès', 4, 3, 95, 5, 'Non', 'Oui', 118000);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
