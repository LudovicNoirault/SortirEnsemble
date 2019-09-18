-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 18 sep. 2019 à 11:34
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sortirensemble`
--

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

DROP TABLE IF EXISTS `etats`;
CREATE TABLE IF NOT EXISTS `etats` (
  `idEtat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`idEtat`, `libelle`) VALUES
(1, 'Active'),
(2, 'Annulee'),
(3, 'Terminee');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `idInscriptions` int(11) NOT NULL AUTO_INCREMENT,
  `date_inscription` datetime NOT NULL,
  `sorties_idSortie` int(11) NOT NULL,
  `participants_idParticipant` int(11) NOT NULL,
  PRIMARY KEY (`idInscriptions`),
  KEY `FK_sorties` (`sorties_idSortie`),
  KEY `FK_participants` (`participants_idParticipant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

DROP TABLE IF EXISTS `lieux`;
CREATE TABLE IF NOT EXISTS `lieux` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(30) NOT NULL,
  `rue` varchar(255) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `villes_idVille` int(11) NOT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `FK_villes` (`villes_idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`idLieu`, `nom_lieu`, `rue`, `latitude`, `longitude`, `villes_idVille`) VALUES
(1, 'IMIE', '132 Avenue de Lattre de Tassigny, 49000 Angers', 47.447784, -0.539066, 1);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `idParticipant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `actif` tinyint(4) NOT NULL,
  `sites_idSite` int(11) NOT NULL,
  PRIMARY KEY (`idParticipant`),
  KEY `FK_sites` (`sites_idSite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(30) NOT NULL,
  `lieux_idLieu` int(11) NOT NULL,
  PRIMARY KEY (`idSite`),
  KEY `FK_lieux2` (`lieux_idLieu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

DROP TABLE IF EXISTS `sorties`;
CREATE TABLE IF NOT EXISTS `sorties` (
  `idSortie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `datedebut` datetime NOT NULL,
  `duree` int(11) DEFAULT NULL,
  `datecloture` datetime NOT NULL,
  `nbinscriptionsmax` int(11) NOT NULL,
  `descriptioninfos` varchar(500) DEFAULT NULL,
  `urlPhoto` varchar(250) DEFAULT NULL,
  `organisateur` int(11) NOT NULL,
  `lieux_idLieu` int(11) NOT NULL,
  `etats_idEtat` int(11) NOT NULL,
  PRIMARY KEY (`idSortie`),
  KEY `sorties_participants_fk` (`organisateur`),
  KEY `FK_lieux` (`lieux_idLieu`),
  KEY `FK_etats` (`etats_idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(30) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`idVille`, `nom_ville`, `code_postal`) VALUES
(1, 'Angers', '49000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
