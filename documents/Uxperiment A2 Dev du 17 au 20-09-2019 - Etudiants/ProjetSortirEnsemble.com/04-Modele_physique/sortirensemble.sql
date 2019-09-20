-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 sep. 2019 à 08:31
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
  `libelle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etats`
--

INSERT INTO `etats` (`idEtat`, `libelle`) VALUES
(1, 'Active'),
(2, 'Annulee'),
(3, 'Terminee'),
(4, 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `idInscriptions` int(11) NOT NULL AUTO_INCREMENT,
  `date_inscription` datetime NOT NULL,
  `participants_idParticipant` int(11) DEFAULT NULL,
  `sorties_idSortie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInscriptions`),
  KEY `FK_participants` (`participants_idParticipant`),
  KEY `FK_sorties` (`sorties_idSortie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

DROP TABLE IF EXISTS `lieux`;
CREATE TABLE IF NOT EXISTS `lieux` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `villes_idVille` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `FK_villes` (`villes_idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`idLieu`, `nom_lieu`, `rue`, `latitude`, `longitude`, `villes_idVille`) VALUES
(1, 'Chabada', '56 Boulevard du Doyenné', 47.488749, -0.535838, 1);

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id_site` int(11) DEFAULT NULL,
  `participant_user_id` int(11) NOT NULL,
  `idParticipant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` tinyint(1) NOT NULL,
  PRIMARY KEY (`idParticipant`),
  UNIQUE KEY `UNIQ_716970923D631C9D` (`participant_user_id`),
  KEY `IDX_71697092E26315E6` (`id_site`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id_site`, `participant_user_id`, `idParticipant`, `nom`, `prenom`, `pseudo`, `telephone`, `actif`) VALUES
(1, 1, 1, 'Dupont', 'Albert', 'Adupont', '0102030405', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieux_idLieu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSite`),
  KEY `FK_lieux2` (`lieux_idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`idSite`, `nom_site`, `lieux_idLieu`) VALUES
(1, 'Salle de Concert Anjou', 1),
(2, 'Salle de Concert Anjou 2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

DROP TABLE IF EXISTS `sorties`;
CREATE TABLE IF NOT EXISTS `sorties` (
  `idSortie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedebut` datetime NOT NULL,
  `duree` int(11) DEFAULT NULL,
  `datecloture` datetime NOT NULL,
  `nbinscriptionsmax` int(11) NOT NULL,
  `descriptioninfos` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlPhoto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisateur` int(11) DEFAULT NULL,
  `etats_idEtat` int(11) DEFAULT NULL,
  `lieux_idLieu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSortie`),
  KEY `FK_lieux` (`lieux_idLieu`),
  KEY `FK_participant` (`organisateur`),
  KEY `FK_etats` (`etats_idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sorties`
--

INSERT INTO `sorties` (`idSortie`, `nom`, `datedebut`, `duree`, `datecloture`, `nbinscriptionsmax`, `descriptioninfos`, `urlPhoto`, `organisateur`, `etats_idEtat`, `lieux_idLieu`) VALUES
(1, 'lorem', '2019-09-20 14:45:00', 180, '2019-09-20 17:45:00', 15, 'ipsum', 'https://cdn.pixabay.com/photo/2012/04/01/18/55/work-in-progress-24027_1280.png', 1, 1, 1),
(3, 'lorem ipsum2', '2019-09-20 15:03:00', 181, '2019-09-20 18:03:00', 17, 'ipsum lorem2', 'https://cdn.pixabay.com/photo/2012/04/01/18/55/work-in-progress-24027_1280.png', 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `reset_token`) VALUES
(1, 'demo@mail.com', '[]', '$argon2i$v=19$m=1024,t=2,p=2$Nm5pSDdTUVNtR2djdHBZSA$qxHFXJ+SFMndS1c2ia8LWE2o+qd5QZRAtQOPYXLXKyU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`idVille`, `nom_ville`, `code_postal`) VALUES
(1, 'Angers', '49000');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `FK_74E0281C630ED3E4` FOREIGN KEY (`sorties_idSortie`) REFERENCES `sorties` (`idSortie`),
  ADD CONSTRAINT `FK_74E0281CC9E644A` FOREIGN KEY (`participants_idParticipant`) REFERENCES `participants` (`idParticipant`);

--
-- Contraintes pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD CONSTRAINT `FK_9E44A8AE866BE01A` FOREIGN KEY (`villes_idVille`) REFERENCES `villes` (`idVille`);

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `FK_716970923D631C9D` FOREIGN KEY (`participant_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_71697092E26315E6` FOREIGN KEY (`id_site`) REFERENCES `sites` (`idSite`);

--
-- Contraintes pour la table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `FK_BC00AA63B7AE97EA` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`);

--
-- Contraintes pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD CONSTRAINT `FK_488163E8760206E3` FOREIGN KEY (`etats_idEtat`) REFERENCES `etats` (`idEtat`),
  ADD CONSTRAINT `FK_488163E8B7AE97EA` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`),
  ADD CONSTRAINT `FK_participant` FOREIGN KEY (`organisateur`) REFERENCES `participants` (`idParticipant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
