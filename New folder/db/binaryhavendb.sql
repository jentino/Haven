-- MySQL dump 10.13  Distrib 5.6.36, for Win64 (x86_64)
--
-- Host: localhost    Database: povertyalleviatordb
-- ------------------------------------------------------
-- Server version	5.6.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblbinaryextreme`
--

DROP TABLE IF EXISTS `tblbinaryextreme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbinaryextreme` (
  `candle_id` int(15) NOT NULL,
  `candle1` varchar(10) NOT NULL,
  `signalbar` varchar(12) NOT NULL,
  `time1` varchar(12) NOT NULL,
  PRIMARY KEY (`candle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbinaryextreme`
--

LOCK TABLES `tblbinaryextreme` WRITE;
/*!40000 ALTER TABLE `tblbinaryextreme` DISABLE KEYS */;
INSERT INTO `tblbinaryextreme` VALUES (1,'1','2','52');
/*!40000 ALTER TABLE `tblbinaryextreme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsignals`
--

DROP TABLE IF EXISTS `tblsignals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsignals` (
  `candle_id` int(15) NOT NULL,
  `candle1` int(11) NOT NULL,
  `candle5` int(1) NOT NULL,
  `candle6` int(1) NOT NULL,
  `dot1` int(1) NOT NULL,
  `dot2` int(1) NOT NULL,
  `dot3` int(1) NOT NULL,
  `dot4` int(15) NOT NULL,
  `dot5` int(15) NOT NULL,
  KEY `candle_id` (`candle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsignals`
--

LOCK TABLES `tblsignals` WRITE;
/*!40000 ALTER TABLE `tblsignals` DISABLE KEYS */;
INSERT INTO `tblsignals` VALUES (1,2,2,2,2,2,2,1,1);
/*!40000 ALTER TABLE `tblsignals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timedb`
--

DROP TABLE IF EXISTS `timedb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timedb` (
  `timeid` int(23) NOT NULL,
  `time` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timedb`
--

LOCK TABLES `timedb` WRITE;
/*!40000 ALTER TABLE `timedb` DISABLE KEYS */;
INSERT INTO `timedb` VALUES (1,'1');
/*!40000 ALTER TABLE `timedb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-04  1:53:07
