-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 mai 2025 à 09:35
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_piscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`Nom`, `Prenom`, `Courriel`, `Telephone`) VALUES
('Auvrignon', 'Benoit', 'benoit.auvrignon@edu.ece.fr', '0782998944'),
('Tuaron Dit Casaux', 'Baptiste', 'baptiste.tuaronditcasaux@edu.ece.fr', '0646640109'),
('Pottier', 'Matthieu', 'matthieu.pottier@edu.ece.fr', '0680201232'),
('Wehbe', 'Roy', 'roy.wehbe@edu.ece.fr', '0680122123');

-- --------------------------------------------------------

--
-- Structure de la table `agent_immobilier`
--

DROP TABLE IF EXISTS `agent_immobilier`;
CREATE TABLE IF NOT EXISTS `agent_immobilier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `Agenda` text NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bien_immobilier`
--

DROP TABLE IF EXISTS `bien_immobilier`;
CREATE TABLE IF NOT EXISTS `bien_immobilier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Type_Vente` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse_ligne1` varchar(255) NOT NULL,
  `Adresse_ligne2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Code_Postal` int(11) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  `Type_Carte` varchar(255) NOT NULL,
  `Numero_Carte` varchar(255) NOT NULL,
  `Nom_Carte` varchar(255) NOT NULL,
  `Date_Expiration` varchar(255) NOT NULL,
  `Code_Securite` int(11) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Nom`, `Prenom`, `Adresse_ligne1`, `Adresse_ligne2`, `Ville`, `Code_Postal`, `Pays`, `Telephone`, `Courriel`, `Type_Carte`, `Numero_Carte`, `Nom_Carte`, `Date_Expiration`, `Code_Securite`, `Motdepasse`) VALUES
('Dupont', 'Louis', '10 rue sextius-michel', '10 rue sextius-michel', 'Paris', 75015, 'France', '0601020304', 'louis.dupont@edu.ece.fr', 'visa', '1234', 'Dupont', '09/25', 123, 'louis');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
