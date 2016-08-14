-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.6.16-1~exp1

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

CREATE DATABASE IF NOT EXISTS `ecommerce`;
USE `ecommerce`;


DROP TABLE IF EXISTS `Followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Followers` (
  `idFollower` int(11) NOT NULL,
  `idFollowing` int(10) unsigned NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
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
  `fechaPublicacion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (59,'Fecha Remera',600,NULL,'Juegos','Remera Fecha',6,'2016-08-12 17:32:56'),(60,'Testing fecha',150,NULL,'Abstractas','Testing fecha',6,'2016-08-12 17:41:38'),(61,'Fecha Remera',150,NULL,'Abstractas','Fecha rememra',6,'2016-08-12 19:11:18'),(62,'UFC',250,NULL,'Deportes','Remera UFC',6,'2016-08-12 19:11:48'),(63,'Strike Force',150,NULL,'Eslogans','Strike Force',6,'2016-08-12 19:12:40');
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (6,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(7,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(8,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(9,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(10,'pepecito','pirulo','Masculino','$2y$10$KyI.31aAzTkU33OTlVRwuuga7b9cJRzuxZgSXZwT1SYfbTEyqVuYK',''),(11,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(12,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(13,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(14,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(15,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(16,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(17,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(18,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(19,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(20,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(21,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(22,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(23,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(24,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(25,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(26,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(27,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(28,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(29,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(30,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(31,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(32,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(33,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(34,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(35,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(36,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(37,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(38,'test','test','Masculino','$2y$10$3kY05CqMHY9T4UY2VdXs9.m/iXuEErUnTSGn1ocal6dH7wjVKzMCm','test@test.com'),(39,'Pancho','pepe','Masculino','$2y$10$Kym9C.pIGQd6Gey7w4XSPu29u3UVHxp4c16yxrOsKJRVsL8cYLpn.','pepe.1@pepe.com'),(40,'Eugenia','Carlinii','Femenino','$2y$10$kMr9gIXVMHAJCLHzStY0BurEV5ojsLuxE.WaDAkRiI5KKNHl3d57q','eugeniacarlini@gmail.com');
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

-- Dump completed on 2016-08-13 16:19:55
