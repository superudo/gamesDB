-- MySQL dump 10.13  Distrib 5.1.58, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: gamesdb
-- ------------------------------------------------------
-- Server version	5.1.58-1ubuntu1

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
-- Current Database: `gamesdb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `gamesdb` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_german1_ci */;

USE `gamesdb`;

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'Mariusz Gandzel',''),(2,'Anna Wlodarska',''),(3,'Piotr Rorot','');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (1,'Britta Stöckmann',''),(2,'Jens Jahnke','');
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `award`
--

DROP TABLE IF EXISTS `award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_german1_ci NOT NULL,
  `url` varchar(45) COLLATE latin1_german1_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `award`
--

LOCK TABLES `award` WRITE;
/*!40000 ALTER TABLE `award` DISABLE KEYS */;
INSERT INTO `award` VALUES (1,'Spiel des Jahres','http://www.spiel-des-jahres.org'),(2,'Deutscher Spielepreis','http://www.deutscherspielepreis.de'),(3,'Mensa Select','http://mindgames.us.mensa.org/');
/*!40000 ALTER TABLE `award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE latin1_german1_ci NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_category1` (`parent_category_id`),
  CONSTRAINT `fk_category_category1` FOREIGN KEY (`parent_category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Gesellschaftsspiel',NULL),(2,'Würfelspiel',1),(3,'Kartenspiel',1),(4,'Brettspiel',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature`
--

LOCK TABLES `feature` WRITE;
/*!40000 ALTER TABLE `feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `min_players` int(11) DEFAULT NULL,
  `max_players` int(11) DEFAULT NULL,
  `min_age` int(11) NOT NULL DEFAULT '0',
  `duration` int(11) DEFAULT NULL,
  `boxwidth` decimal(4,1) NOT NULL DEFAULT '0.0',
  `boxlength` decimal(4,1) NOT NULL DEFAULT '0.0',
  `boxheight` decimal(4,1) NOT NULL DEFAULT '0.0',
  `publisher_id` int(11) DEFAULT NULL,
  `base_game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_publisher1` (`publisher_id`),
  KEY `fk_game_game1` (`base_game_id`),
  CONSTRAINT `fk_game_game1` FOREIGN KEY (`base_game_id`) REFERENCES `game` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_game_publisher1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'Die Schatztaucher',2,4,6,35,'0.0','0.0','0.0',1,NULL),(2,'Expedition Sumatra - Dadu Dadu',2,4,8,20,'0.0','0.0','0.0',2,NULL),(3,'Quirkle',2,4,6,45,'29.5','29.5','7.5',1,NULL);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_x_artist`
--

DROP TABLE IF EXISTS `game_x_artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_x_artist` (
  `game_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`artist_id`),
  KEY `fk_game_has_artist_artist1` (`artist_id`),
  KEY `fk_game_has_artist_game1` (`game_id`),
  CONSTRAINT `fk_game_has_artist_artist1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_has_artist_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_x_artist`
--

LOCK TABLES `game_x_artist` WRITE;
/*!40000 ALTER TABLE `game_x_artist` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_x_artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_x_author`
--

DROP TABLE IF EXISTS `game_x_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_x_author` (
  `game_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`author_id`),
  KEY `fk_game_has_author_author1` (`author_id`),
  KEY `fk_game_has_author_game` (`game_id`),
  CONSTRAINT `fk_game_has_author_author1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_has_author_game` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_x_author`
--

LOCK TABLES `game_x_author` WRITE;
/*!40000 ALTER TABLE `game_x_author` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_x_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_x_award`
--

DROP TABLE IF EXISTS `game_x_award`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_x_award` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `award_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_game_x_award_price1` (`award_id`),
  KEY `fk_game_x_award_game1` (`game_id`),
  CONSTRAINT `fk_game_x_award_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_x_award_price1` FOREIGN KEY (`award_id`) REFERENCES `award` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_x_award`
--

LOCK TABLES `game_x_award` WRITE;
/*!40000 ALTER TABLE `game_x_award` DISABLE KEYS */;
INSERT INTO `game_x_award` VALUES (1,1,3,2011),(3,2,3,1999),(4,2,3,1999),(6,2,1,1970);
/*!40000 ALTER TABLE `game_x_award` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_x_category`
--

DROP TABLE IF EXISTS `game_x_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_x_category` (
  `game_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`category_id`),
  KEY `fk_game_has_category_category1` (`category_id`),
  KEY `fk_game_has_category_game1` (`game_id`),
  CONSTRAINT `fk_game_has_category_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_has_category_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_x_category`
--

LOCK TABLES `game_x_category` WRITE;
/*!40000 ALTER TABLE `game_x_category` DISABLE KEYS */;
INSERT INTO `game_x_category` VALUES (3,1),(2,4),(3,4);
/*!40000 ALTER TABLE `game_x_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_x_feature`
--

DROP TABLE IF EXISTS `game_x_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_x_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_game_x_feature_feature1` (`feature_id`),
  KEY `fk_game_x_feature_game1` (`game_id`),
  CONSTRAINT `fk_game_x_feature_feature1` FOREIGN KEY (`feature_id`) REFERENCES `feature` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_x_feature_game1` FOREIGN KEY (`game_id`) REFERENCES `game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_x_feature`
--

LOCK TABLES `game_x_feature` WRITE;
/*!40000 ALTER TABLE `game_x_feature` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_x_feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE latin1_german1_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_german1_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Schmidt Spiel + Freizeit','http://www.schmidtspiele.de/'),(2,'Igramoon Spieleverlag','http://www.igramoon.de/');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-17  0:11:11
