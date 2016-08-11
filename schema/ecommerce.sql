CREATE DATABASE  IF NOT EXISTS `ecommerce` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ecommerce`;
-- MySQL dump 10.13  Distrib 5.7.13, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.7.13-0ubuntu0.16.04.2

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
-- Table structure for table `Followers`
--

DROP TABLE IF EXISTS `Followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Followers` (
  `id_Follower` int(11) NOT NULL,
  `id_following` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Follower`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Followers`
--

LOCK TABLES `Followers` WRITE;
/*!40000 ALTER TABLE `Followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `precio` int(100) NOT NULL,
  `imagen` int(11) DEFAULT NULL,
  `categoria` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'primer remera',123,NULL,'Comics','es la primer remera',0),(2,'primer remera',123,NULL,'Comics','es la primer remera',0),(3,'Test',150,NULL,'Abstractas','test',19),(4,'test2',150,NULL,'Abstractas','test',19),(5,'test3',140,NULL,'Abstractas','test3',19),(6,'test4',150,NULL,'Abstractas','test4',19),(7,'test5',150,NULL,'Abstractas','test5',19),(8,'test6',150,NULL,'Abstractas','test6',19),(9,'test7',144,NULL,'Abstractas','test7',19),(10,'test8',123,NULL,'Abstractas','test8',19),(11,'test9',124,NULL,'Abstractas','test9',19),(12,'test9',124,NULL,'Abstractas','test9',19),(13,'test9',124,NULL,'Abstractas','test9',19),(14,'test9',124,NULL,'Abstractas','test9',19),(15,'test9',124,NULL,'Abstractas','test9',19),(16,'test9',124,NULL,'Abstractas','test9',19),(17,'test9',124,NULL,'Abstractas','test9',19),(18,'test9',124,NULL,'Abstractas','test9',19),(19,'test9',124,NULL,'Abstractas','test9',19),(20,'test9',124,NULL,'Abstractas','test9',19),(21,'test9',124,NULL,'Abstractas','test9',19),(22,'test9',123,NULL,'Abstractas','test9',19),(23,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(24,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(25,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(26,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(27,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(28,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(29,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(30,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(31,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(32,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(33,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(34,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(35,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(36,'Aikas',123,NULL,'Abstractas','kopaskdopas',7),(37,'test10',124,NULL,'Abstractas','test10',7),(38,'test11',123,NULL,'Abstractas','test11',7),(39,'hola',23,NULL,'Abstractas','pruebaa',8),(40,'hola2',123123,NULL,'Animales','hdspdkad',8),(41,'deadpolll',455,NULL,'Comics','el mejorrr',8),(42,'daleee',232,NULL,'Comics','dasd',8),(43,'daleee',232,NULL,'Comics','dasd',8),(44,'daleee',232,NULL,'Comics','dasd',8);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `mail` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (6,'la','la','1','asdasdas','kakaka'),(7,'gonza','gonza','Masculino','$2y$10$lwz2wHtgX3R2O910OcXcfe6ScfrEGBPqmIHpQIw31sDcmWj3vWYW2','gonza@gmail.com'),(8,'euge','euge','Femenino','$2y$10$FUrGqqzp.9nsYUz2kzfTR.SvD5HljsLqvgccHy1eZW3GOGyn7g5.a','euge@gmail.com'),(9,'eugee','eugee','Masculino','$2y$10$jzDk9/6iQwe.O2qiGMxJ4..cQakZWs5WoCKDJJFXOTHctudS8f4kS','eugee@eugee.com'),(10,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(11,'test','test','Masculino','$2y$10$ioDAJ3yz7Ploiww2EZVhP.0OcDnXgFDgBjKaWEtr1Qz4qEDBp5qzu','test2@a.com'),(12,'hola','hola','Masculino','$2y$10$MwUg5559CPJLXLfRTmyUSeGMSKQgfG7oadHp/zG.HAr88//55fk8S','hola@a.com'),(13,'nico','nico','Femenino','$2y$10$E8RZJ8hsJrGXQ3Axwocs6.AxQJLiOvjYMy15vk3psTC3pM3R2f9LC','nico@cagon.com'),(14,'mama','mama','Masculino','$2y$10$Ka6We84CZUxuthGZ7q8rV.DGXTGgSseJy6TOwyYcl/sVHu.l/mFja','mama@mama.com'),(15,'holaa','holaa','Femenino','$2y$10$tJQYxswxdryS8s52xCS01uapmaRGrMGNeP/YzmtkYTl19eEVWiVbO','holaa@holaa.com'),(16,'chau','chau','Masculino','$2y$10$6RXNAqM9lcHdpa43cy.IueR18RCkfNsSJ/1YpBwLbzb6xNFe9AgA.','chau@chau.com'),(17,'chau','chau','Masculino','$2y$10$Du2o.ISk25AXzIuJOshPueKhrB8GRhG9Q4toJUrhwxjazAu/ZTVwy','chau2@chau.com'),(18,'chau','chau','Masculino','$2y$10$BUpqLp1aZBqOVnM5sYVcEOMWAjC0Atrf0kkjrPWVgwUolT3wsbUhy','2chau2@chau.com'),(19,'mnb','mnb','Masculino','$2y$10$jyJqeG5u9zzycHAkh4Q2..oGM/4Xh2i3GV8rBeGsGXDBNZf0Izh62','jiji@a.com'),(20,'dnaji','jladjk','Femenino','$2y$10$K7FjFAIT5Zl8Ao3XCI3E4eTAQhfyhHGC7pGfLjk41bSSBzVtohMI2','djias@ajioas.c');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-09 16:49:48
