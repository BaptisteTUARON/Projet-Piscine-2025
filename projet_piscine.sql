-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2025 at 10:40 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_piscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Motdepasse` varchar(255) NOT NULL DEFAULT 'admin123'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`Nom`, `Prenom`, `Courriel`, `Telephone`, `Motdepasse`) VALUES
('Auvrignon', 'Benoit', 'benoit.auvrignon@edu.ece.fr', '0782998944', 'benoit123'),
('Tuaron Dit Casaux', 'Baptiste', 'baptiste.tuaronditcasaux@edu.ece.fr', '0646640109', 'baptiste123'),
('Pottier', 'Matthieu', 'matthieu.pottier@edu.ece.fr', '0680201232', 'matthieu123'),
('Wehbe', 'Roy', 'roy.wehbe@edu.ece.fr', '0680122123', 'roy123');

-- --------------------------------------------------------

--
-- Table structure for table `agent_immobilier`
--

DROP TABLE IF EXISTS `agent_immobilier`;
CREATE TABLE IF NOT EXISTS `agent_immobilier` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Specialite` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `Agenda` text NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  `Adresse_ligne1` varchar(255) DEFAULT NULL,
  `Adresse_ligne2` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Code_Postal` int DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Telephone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_immobilier`
--

INSERT INTO `agent_immobilier` (`ID`, `Nom`, `Prenom`, `Photo`, `Specialite`, `Video`, `CV`, `Agenda`, `Courriel`, `Adresse_ligne1`, `Adresse_ligne2`, `Ville`, `Code_Postal`, `Pays`, `Telephone`) VALUES
(1, 'Leclerc', 'Alice', '', '', '', '/cv/alice.pdf', '', 'alice.leclerc@immo.fr', '15 Rue des Lilas', '', 'Paris', 75011, 'France', '0601020301'),
(2, 'Blanc', 'Hugo', '', '', '', '/cv/hugo.pdf', '', 'hugo.blanc@immo.fr', '22 Avenue Victor Hugo', 'Bâtiment B', 'Lyon', 69002, 'France', '0601020302'),
(3, 'Petit', 'Chloé', '', '', '', '/cv/chloe.pdf', '', 'chloe.petit@immo.fr', '10 Boulevard Haussmann', '', 'Marseille', 13008, 'France', '0601020303'),
(4, 'Moreau', 'Nathan', '', '', '', '/cv/nathan.pdf', '', 'nathan.moreau@immo.fr', '8 Rue de la République', 'Appt 301', 'Toulouse', 31000, 'France', '0601020304'),
(5, 'Dubois', 'Emma', '', '', '', '/cv/emma.pdf', '', 'emma.dubois@immo.fr', '5 Place Bellecour', '', 'Lille', 59800, 'France', '0601020305');

-- --------------------------------------------------------

--
-- Table structure for table `bien_immobilier`
--

DROP TABLE IF EXISTS `bien_immobilier`;
CREATE TABLE IF NOT EXISTS `bien_immobilier` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Superficie` varchar(255) NOT NULL,
  `Prix` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bien_immobilier`
--

INSERT INTO `bien_immobilier` (`ID`, `Categorie`, `Adresse`, `Ville`, `Description`, `Photo`, `Superficie`, `Prix`) VALUES
(1, 'Immobilier résidentiel', '12 Rue Lafayette, 75009 ', 'Paris', '3 chambres, 2 salles de bains', '/Image_bien/1.jpg', '85', '420000'),
(2, 'Immobilier Commercial', '25 Boulevard Haussmann, 75009 ', 'Paris', 'Espace de bureaux, 2 salles de réunion', '/Image_bien/2.jpg', '120', '950000'),
(3, 'Terrain', 'Chemin du Lavoir, 33500 ', 'Libourne', 'Terrain constructible', '/Image_bien/3.jpg', '800', '120000'),
(4, 'Appartements à louer', '5 Rue de la République, 13001 ', 'Marseille', '2 chambres, 1 salle de bains', '/Image_bien/4.jpg', '60', '850'),
(5, 'Immobilier en vente par enchère', '18 Rue Saint-Michel, 31000 ', 'Toulouse', '4 chambres, 3 salles de bains', '/Image_bien/5.jpg', '140', '375000'),
(6, 'Immobilier résidentiel', '41 Avenue Foch, 69006 ', 'Lyon', '5 chambres, 2 salles de bains', '/Image_bien/6.jpg', '160', '650000'),
(7, 'Immobilier Commercial', '3 Rue des Entrepreneurs, 75015 ', 'Paris', 'Boutique avec réserve', '/Image_bien/7.jpg', '70', '560000'),
(8, 'Terrain', 'Route de Branne, 33330 ', 'Saint-Émilion', 'Terrain agricole', '/Image_bien/8.jpg', '1500', '90000'),
(9, 'Appartements à louer', '8 Place Bellecour, 69002 ', 'Lyon', '1 chambre, 1 salle de bains', '/Image_bien/9.jpg', '45', '720'),
(10, 'Immobilier en vente par enchère', '14 Rue du Palais, 67000 ', 'Strasbourg', 'Maison de 6 pièces, 3 salles de bains', '/Image_bien/10.jpg', '175', '510000'),
(11, 'Immobilier résidentiel', '22 Rue Colbert, 59800 ', 'Lille', '2 chambres, 1 salle de bains', '/Image_bien/11.jpg', '70', '310000'),
(12, 'Immobilier Commercial', '5 Rue de Metz, 57000 ', 'Metz', 'Magasin avec vitrine', '/Image_bien/12.jpg', '90', '420000'),
(13, 'Terrain', 'Chemin des Vignes, 84200 ', 'Carpentras', 'Terrain plat, vue dégagée', '/Image_bien/13.jpg', '1000', '110000'),
(14, 'Appartements à louer', '7 Quai des Chartrons, 33000 ', 'Bordeaux', '3 chambres, 1 salle de bains', '/Image_bien/14.jpg', '80', '980'),
(15, 'Immobilier en vente par enchère', '4 Rue Gambetta, 86000 ', 'Poitiers', 'Maison ancienne, 5 chambres', '/Image_bien/15.jpg', '150', '295000'),
(16, 'Immobilier résidentiel', '12 Rue Nationale, 72000 ', 'Le Mans', '4 chambres, 2 salles de bains', '/Image_bien/16.jpg', '135', '370000'),
(17, 'Immobilier Commercial', 'Rue du Commerce, 21000 ', 'Dijon', 'Restaurant avec cuisine équipée', '/Image_bien/17.jpg', '85', '600000'),
(18, 'Terrain', 'Route de la Forêt, 17100 ', 'Saintes', 'Terrain boisé', '/Image_bien/18.jpg', '2000', '75000'),
(19, 'Appartements à louer', '9 Rue Sainte-Catherine, 69001 ', 'Lyon', 'Studio meublé', '/Image_bien/19.jpg', '30', '590'),
(20, 'Immobilier en vente par enchère', '13 Boulevard Carnot, 06000 ', 'Nice', '3 chambres, 2 salles de bains', '/Image_bien/20.jpg', '95', '435000'),
(21, 'Immobilier résidentiel', '6 Rue de l’Ouest, 75014 ', 'Paris', '2 chambres, 1 salle de bains', '/Image_bien/21.jpg', '68', '495000'),
(22, 'Immobilier Commercial', '11 Rue Thiers, 80000 ', 'Amiens', 'Bureaux rénovés, open-space', '/Image_bien/22.jpg', '130', '700000'),
(23, 'Terrain', 'Domaine de la Plaine, 30200 ', 'Bagnols-sur-Cèze', 'Terrain viabilisé', '/Image_bien/23.jpg', '1200', '105000'),
(24, 'Appartements à louer', '28 Rue Alsace Lorraine, 31000 ', 'Toulouse', '1 chambre, 1 salle de bains', '/Image_bien/24.jpg', '50', '750'),
(25, 'Immobilier en vente par enchère', '19 Rue Pierre Semard, 42000 ', 'Saint-Étienne', 'Maison mitoyenne, 4 chambres', '/Image_bien/25.jpg', '110', '265000'),
(26, 'Immobilier résidentiel', '24 Rue de la Barre, 69002 ', 'Lyon', '5 chambres, 3 salles de bains', '/Image_bien/26.jpg', '180', '720000'),
(27, 'Immobilier Commercial', 'Place du Marché, 56000 ', 'Vannes', 'Local commercial avec mezzanine', '/Image_bien/27.jpg', '95', '480000'),
(28, 'Terrain', 'Chemin des Lavandes, 26700 ', 'Pierrelatte', 'Parcelle constructible', '/Image_bien/28.jpg', '1350', '88000'),
(29, 'Appartements à louer', '11 Rue Nationale, 49100 ', 'Angers', '2 chambres, 1 salle de bains', '/Image_bien/29.jpg', '65', '820'),
(30, 'Immobilier en vente par enchère', 'Place de la Bourse, 33000 ', 'Bordeaux', 'Appartement bourgeois, 4 pièces', '/Image_bien/30.jpg', '115', '505000'),
(31, 'Immobilier résidentiel', '5 Rue Maréchal Foch, 64000 ', 'Pau', '3 chambres, 2 salles de bains', '/Image_bien/31.jpg', '100', '295000'),
(32, 'Immobilier Commercial', 'Rue du Palais, 25000 ', 'Besançon', 'Espace coworking', '/Image_bien/32.jpg', '105', '390000'),
(33, 'Terrain', 'Chemin de la Côte, 19100 ', 'Brive-la-Gaillarde', 'Terrain à bâtir', '/Image_bien/33.jpg', '1100', '92000'),
(34, 'Appartements à louer', 'Rue des Granges, 25000 ', 'Besançon', 'Studio étudiant', '/Image_bien/34.jpg', '28', '510'),
(35, 'Immobilier en vente par enchère', '12 Rue des Halles, 37000 ', 'Tours', 'Duplex, 3 chambres', '/Image_bien/35.jpg', '98', '345000'),
(36, 'Immobilier résidentiel', 'Route des Alpes, 73000 ', 'Chambéry', 'Maison individuelle, 4 chambres', '/Image_bien/36.jpg', '145', '390000'),
(37, 'Immobilier Commercial', 'Avenue Jean Jaurès, 34000 ', 'Montpellier', 'Magasin avec vitrine', '/Image_bien/37.jpg', '78', '310000'),
(38, 'Terrain', 'Chemin du Moulin, 50100 ', 'Cherbourg', 'Terrain non constructible', '/Image_bien/38.jpg', '900', '60000'),
(39, 'Appartements à louer', '3 Rue Michelet, 80000 ', 'Amiens', '2 chambres, 1 salle de bains', '/Image_bien/39.jpg', '55', '680');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Adresse_ligne1` varchar(255) NOT NULL,
  `Adresse_ligne2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Code_Postal` int NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Courriel` varchar(255) NOT NULL,
  `Type_Carte` varchar(255) NOT NULL,
  `Numero_Carte` varchar(255) NOT NULL,
  `Nom_Carte` varchar(255) NOT NULL,
  `Date_Expiration` varchar(255) NOT NULL,
  `Code_Securite` int NOT NULL,
  `Motdepasse` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Nom`, `Prenom`, `Adresse_ligne1`, `Adresse_ligne2`, `Ville`, `Code_Postal`, `Pays`, `Telephone`, `Courriel`, `Type_Carte`, `Numero_Carte`, `Nom_Carte`, `Date_Expiration`, `Code_Securite`, `Motdepasse`) VALUES
('Dupont', 'Louis', '10 rue sextius-michel', '10 rue sextius-michel', 'Paris', 75015, 'France', '0601020304', 'louis.dupont@edu.ece.fr', 'visa', '1234', 'Dupont', '09/25', 123, 'louis'),
('Martin', 'Claire', '12 Avenue de la République', '', 'Paris', 75011, 'France', '0600000001', 'claire.martin@exemple.com', 'visa', '1111', 'Martin', '12/26', 111, 'claire123'),
('Bernard', 'Julien', '24 Rue du Faubourg', 'Appartement 2B', 'Lyon', 69003, 'France', '0600000002', 'julien.bernard@exemple.com', 'mastercard', '2222', 'Bernard', '11/25', 222, 'julien123'),
('Robert', 'Élodie', '56 Boulevard Voltaire', '', 'Marseille', 13001, 'France', '0600000003', 'elodie.robert@exemple.com', 'visa', '3333', 'Robert', '10/26', 333, 'elodie123'),
('Richard', 'Luc', '18 Rue Lafayette', '', 'Toulouse', 31000, 'France', '0600000004', 'luc.richard@exemple.com', 'mastercard', '4444', 'Richard', '09/25', 444, 'luc123'),
('Durand', 'Nina', '8 Rue de la République', '', 'Nice', 6000, 'France', '0600000005', 'nina.durand@exemple.com', 'visa', '5555', 'Durand', '01/27', 555, 'nina123'),
('Dubois', 'Thomas', '14 Avenue Jean Jaurès', '', 'Nantes', 44000, 'France', '0600000006', 'thomas.dubois@exemple.com', 'mastercard', '6666', 'Dubois', '03/26', 666, 'thomas123'),
('Moreau', 'Emma', '20 Rue Victor Hugo', '', 'Strasbourg', 67000, 'France', '0600000007', 'emma.moreau@exemple.com', 'visa', '7777', 'Moreau', '05/27', 777, 'emma123'),
('Simon', 'Leo', '5 Rue des Lilas', '', 'Bordeaux', 33000, 'France', '0600000008', 'leo.simon@exemple.com', 'mastercard', '8888', 'Simon', '06/26', 888, 'leo123'),
('Laurent', 'Camille', '31 Rue Nationale', '', 'Lille', 59000, 'France', '0600000009', 'camille.laurent@exemple.com', 'visa', '9999', 'Laurent', '07/25', 999, 'camille123'),
('Garcia', 'Hugo', '7 Rue des Fleurs', '', 'Rennes', 35000, 'France', '0600000010', 'hugo.garcia@exemple.com', 'mastercard', '0000', 'Garcia', '08/27', 101, 'hugo123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
