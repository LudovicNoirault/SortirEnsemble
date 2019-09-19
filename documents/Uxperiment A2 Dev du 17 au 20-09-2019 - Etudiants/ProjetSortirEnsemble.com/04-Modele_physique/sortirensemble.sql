-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 19 sep. 2019 à 09:22
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
  `sorties_idSortie` int(11) DEFAULT NULL,
  `participants_idParticipant` int(11) DEFAULT NULL,
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
  `villes_idVille` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `FK_villes` (`villes_idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`idLieu`, `nom_lieu`, `rue`, `latitude`, `longitude`, `villes_idVille`) VALUES
(1, 'IMIE', '132 Avenue de Lattre de Tassigny, 49000 Angers', 47.447784, -0.539066, 1),
(2, 'Elysée', '55 Faubourg Saint-Honoré', 48.869745, 2.307946, 2),
(3, 'Chabada', '56 Boulevard du Doyenné', 47.49, -0.535, 1);

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
  `username` varchar(180) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `id_site` int(11) DEFAULT NULL,
  PRIMARY KEY (`idParticipant`),
  UNIQUE KEY `UNIQ_7169709292FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_71697092A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_71697092C05FB297` (`confirmation_token`),
  KEY `IDX_71697092E26315E6` (`id_site`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`idParticipant`, `nom`, `prenom`, `telephone`, `actif`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `id_site`) VALUES
(1, 'Philippe', 'Favreau', '0203040506', 1, 'Philippe Favreau', 'philippe favreau', 'greatdemon@mail.com', 'greatdemon@mail.com', 1, NULL, '$2y$13$2p8sH6pOO7LtZ4cVAIHBz.hspnX/UIu7Kt7Sd0xcj3Lw45pw/6ERS', '2019-09-18 12:47:10', NULL, NULL, 'a:0:{}', NULL),
(2, 'Pontoizeau', 'Alexis', '0102030405', 1, 'Alexis Pontoizeau', 'alexis pontoizeau', 'demon@mail.com', 'demon@mail.com', 1, NULL, '$2y$13$2p8sH6pOO7LtZ4cVAIHBz.hspnX/UIu7Kt7Sd0xcj3Lw45pw/6ERS', '2019-09-18 12:47:10', NULL, NULL, 'a:0:{}', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(30) NOT NULL,
  `lieux_idLieu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSite`),
  KEY `FK_lieux2` (`lieux_idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`idSite`, `nom_site`, `lieux_idLieu`) VALUES
(1, 'World Company Angers', 2),
(2, 'Salle de Concert', 3);

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
  `lieux_idLieu` int(11) DEFAULT NULL,
  `etats_idEtat` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSortie`),
  KEY `sorties_participants_fk` (`organisateur`),
  KEY `FK_lieux` (`lieux_idLieu`),
  KEY `FK_etats` (`etats_idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sorties`
--

INSERT INTO `sorties` (`idSortie`, `nom`, `datedebut`, `duree`, `datecloture`, `nbinscriptionsmax`, `descriptioninfos`, `urlPhoto`, `organisateur`, `lieux_idLieu`, `etats_idEtat`) VALUES
(1, 'essai activite 2', '2019-09-18 16:30:00', 150, '2019-09-18 19:00:00', 15, 'blavla', 'blavla', 2, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`idVille`, `nom_ville`, `code_postal`) VALUES
(1, 'Angers', '49000'),
(2, 'Paris', '75008'),
(3, 'Nantes', '44000');

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
  ADD CONSTRAINT `FK_71697092E26315E6` FOREIGN KEY (`id_site`) REFERENCES `sites` (`idSite`);

--
-- Contraintes pour la table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `FK_lieux2` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`);

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
