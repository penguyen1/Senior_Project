-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: BC_MLQA
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `bcml_course`
--

DROP TABLE IF EXISTS `bcml_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bcml_course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(400) DEFAULT NULL,
  `completed` tinyint(1) DEFAULT '0',
  `hidden` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bcml_course`
--

LOCK TABLES `bcml_course` WRITE;
/*!40000 ALTER TABLE `bcml_course` DISABLE KEYS */;
INSERT INTO `bcml_course` VALUES (1,'Calculus 1 Fall 2012 Velling',0,0),(2,'Calculus 2 Fall 2012 Velling',0,0),(3,'Calculus 3 Fall 2012 Velling',0,0),(4,'TEST Calculus I Spring 2013',0,0),(5,'Brooklyn10Test',0,0),(6,'Multivariate and Vector Calculus Bocchi Spring 2013',0,0),(7,'Calc2_1206_Spring13_Gindes',0,0),(8,'Precalc Fall 2013 Velling',0,0),(9,'Calculus 1 Spring 2013 Velling',0,0),(10,'Calculus 2 Spring 2013 Velling',0,0),(11,'Multivariable Calculus Spring 2013 Ki Song',0,0),(12,'Test',0,0),(13,'MATH 1206 MY3B Calculus II - Ki Song',0,0),(14,'MATH 2201 EMY6 Multivariable Calculus - Ki Song',0,0),(15,'ECON3410',0,0),(16,'Calc3_2201_Summer13_Gindes',0,0),(17,'Math 1201 TY8 (Kingan, Fall 2013, 9:05 - 10:45)',0,0),(18,'Calc3_2201_Fall13_EMY6_Gindes',0,0),(19,'Calc3_2201_Fall13_MY11_Gindes',0,0),(20,'Precalculus Fall13 Gibson',0,0),(21,'',0,0),(22,'Math 1201 - Calculus I',0,0),(23,'Calc1_1201_Spring14_Gindes',0,0),(24,'Calc3_2201_Spring14_Gindes',0,0),(25,'Calc3_2201_Spring14_MY9_Gindes',0,0),(26,'Calculus 2 Spring 2014 Velling',0,0),(27,'Calculus 1 Spring 2014 Velling',0,0);
/*!40000 ALTER TABLE `bcml_course` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-09 13:29:36
