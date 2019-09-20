-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: SortirEnsemble
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `etats`
--

DROP TABLE IF EXISTS `etats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etats` (
  `idEtat` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idEtat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etats`
--

LOCK TABLES `etats` WRITE;
/*!40000 ALTER TABLE `etats` DISABLE KEYS */;
INSERT INTO `etats` VALUES (1,'actif'),(2,'innactif'),(3,'obsolète');
/*!40000 ALTER TABLE `etats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inscriptions` (
  `idInscriptions` int(11) NOT NULL AUTO_INCREMENT,
  `date_inscription` datetime NOT NULL,
  `participants_idParticipant` int(11) DEFAULT NULL,
  `sorties_idSortie` int(11) DEFAULT NULL,
  PRIMARY KEY (`idInscriptions`),
  KEY `FK_participants` (`participants_idParticipant`),
  KEY `FK_sorties` (`sorties_idSortie`),
  CONSTRAINT `FK_74E0281C630ED3E4` FOREIGN KEY (`sorties_idSortie`) REFERENCES `sorties` (`idSortie`),
  CONSTRAINT `FK_74E0281CC9E644A` FOREIGN KEY (`participants_idParticipant`) REFERENCES `participants` (`idParticipant`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lieux`
--

DROP TABLE IF EXISTS `lieux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lieux` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_lieu` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `villes_idVille` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `FK_villes` (`villes_idVille`),
  CONSTRAINT `FK_9E44A8AE866BE01A` FOREIGN KEY (`villes_idVille`) REFERENCES `villes` (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lieux`
--

LOCK TABLES `lieux` WRITE;
/*!40000 ALTER TABLE `lieux` DISABLE KEYS */;
INSERT INTO `lieux` VALUES (1,'Nowhere','Rue des lices',0,0,1);
/*!40000 ALTER TABLE `lieux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
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
  KEY `IDX_71697092E26315E6` (`id_site`),
  CONSTRAINT `FK_716970923D631C9D` FOREIGN KEY (`participant_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_71697092E26315E6` FOREIGN KEY (`id_site`) REFERENCES `sites` (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
INSERT INTO `participants` VALUES (1,14,13,'admin','admin','admin','0102030405',1),(1,15,14,'user','user','user','0102030405',1),(2,16,15,'Gnazé','matthieu','matthieu6875','0102030405',1);
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `idSite` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieux_idLieu` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSite`),
  KEY `FK_lieux2` (`lieux_idLieu`),
  CONSTRAINT `FK_BC00AA63B7AE97EA` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'Angers',1),(2,'Agence X',1);
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sorties`
--

DROP TABLE IF EXISTS `sorties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sorties` (
  `idSortie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datedebut` datetime NOT NULL,
  `duree` int(11) DEFAULT NULL,
  `datecloture` datetime NOT NULL,
  `nbinscriptionsmax` int(11) NOT NULL,
  `descriptioninfos` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisateur` int(11) DEFAULT NULL,
  `etats_idEtat` int(11) DEFAULT NULL,
  `lieux_idLieu` int(11) DEFAULT NULL,
  `time_scale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idSortie`),
  UNIQUE KEY `UNIQ_488163E84BD76D44` (`organisateur`),
  KEY `FK_lieux` (`lieux_idLieu`),
  KEY `FK_participant` (`organisateur`),
  KEY `FK_etats` (`etats_idEtat`),
  CONSTRAINT `FK_488163E84BD76D44` FOREIGN KEY (`organisateur`) REFERENCES `participants` (`idParticipant`),
  CONSTRAINT `FK_488163E8760206E3` FOREIGN KEY (`etats_idEtat`) REFERENCES `etats` (`idEtat`),
  CONSTRAINT `FK_488163E8B7AE97EA` FOREIGN KEY (`lieux_idLieu`) REFERENCES `lieux` (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sorties`
--

LOCK TABLES `sorties` WRITE;
/*!40000 ALTER TABLE `sorties` DISABLE KEYS */;
/*!40000 ALTER TABLE `sorties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (14,'admin@admin.admin','[\"ROLE_ADMIN\"]','$2y$13$U3OcSkffi1GbIf2PtfyqUeIA7QD/l0Pw6ywh0Dw8WHwxGbLlZmIPu',NULL),(15,'user@user.user','[\"ROLE_USER\"]','$2y$13$b4ydtWHXU39k152MBxpVY.F1lCpm4Pqx0MhniR4X72/dleXxMGoIW',NULL),(16,'matthieu@imie.fr','[\"ROLE_USER\"]','$2y$13$v8rHoZRqNOyf0QgsyktEqOJmgfwVXihdJxfZfNhK5Si9IDrrTQL/S',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `villes`
--

DROP TABLE IF EXISTS `villes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `villes` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ville` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `villes`
--

LOCK TABLES `villes` WRITE;
/*!40000 ALTER TABLE `villes` DISABLE KEYS */;
INSERT INTO `villes` VALUES (1,'Angers','49000'),(2,'Rochefort','17300');
/*!40000 ALTER TABLE `villes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-20 19:26:45
