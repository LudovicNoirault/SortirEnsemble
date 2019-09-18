-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 17 sep. 2019 à 14:28
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
  `idEtat` int(11) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idLieu` int(11) NOT NULL,
  `nom_lieu` varchar(30) NOT NULL,
  `rue` varchar(30) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `villes_idVille` int(11) NOT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `FK_villes` (`villes_idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `idParticipant` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `mail` varchar(20) NOT NULL,
  `actif` tinyint(4) NOT NULL,
  `sites_idSite` int(11) NOT NULL,
  PRIMARY KEY (`idParticipant`),
  UNIQUE KEY `participants_pseudo_uk` (`pseudo`),
  KEY `FK_sites` (`sites_idSite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL,
  `nom_site` varchar(30) NOT NULL,
  `lieux_idLieu` int(11) NOT NULL,
  PRIMARY KEY (`idSite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

DROP TABLE IF EXISTS `sorties`;
CREATE TABLE IF NOT EXISTS `sorties` (
  `idSortie` int(11) NOT NULL,
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
  `idVille` int(11) NOT NULL,
  `nom_ville` varchar(30) NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `FK_participants` FOREIGN KEY (`participants_idParticipant`) REFERENCES `participants` (`idParticipant`),
  ADD CONSTRAINT `FK_sorties` FOREIGN KEY (`sorties_idSortie`) REFERENCES `sorties` (`idSortie`);

--
-- Contraintes pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD CONSTRAINT `FK_villes` FOREIGN KEY (`villes_idVille`) REFERENCES `villes` (`idVille`);

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `FK_sites` FOREIGN KEY (`sites_idSite`) REFERENCES `sites` (`idSite`);

--
-- Contraintes pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD CONSTRAINT `FK_etats` FOREIGN KEY (`etats_idEtat`) REFERENCES `etats` (`idEtat`),
  ADD CONSTRAINT `FK_lieux` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
