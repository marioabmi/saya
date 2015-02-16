CREATE DATABASE  IF NOT EXISTS `sys_aya` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sys_aya`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: sys_aya
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_cargos` int(2) NOT NULL,
  `masculino` varchar(150) DEFAULT NULL,
  `femenino` varchar(150) DEFAULT NULL,
  `nivel` int(2) DEFAULT NULL,
  `rango` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_cargos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos`
--

DROP TABLE IF EXISTS `datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos` (
  `id_datos` int(1) NOT NULL AUTO_INCREMENT,
  `acta_texto1` varchar(250) DEFAULT NULL,
  `acta_inicio` int(3) DEFAULT NULL,
  `acta_texto2` varchar(250) DEFAULT NULL,
  `acta_text3` varchar(250) DEFAULT NULL,
  `acta_fin` varchar(250) DEFAULT NULL,
  `acuerdo_incio` varchar(250) DEFAULT NULL,
  `acuerdo_fin` varchar(250) DEFAULT NULL,
  `acuerdo_simbolo` varchar(2) DEFAULT NULL,
  `acuerdo_img1` varchar(50) DEFAULT NULL,
  `acuerdo_img2` varchar(50) DEFAULT NULL,
  `acuerdo_img3` varchar(50) DEFAULT NULL,
  `procedimiento` int(1) DEFAULT NULL,
  `logo1` varchar(50) DEFAULT NULL,
  `logo2` varchar(50) DEFAULT NULL,
  `logo3` varchar(50) DEFAULT NULL,
  `backup` varchar(15) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `reporte1` varchar(50) DEFAULT NULL,
  `reporte2` varchar(50) DEFAULT NULL,
  `reporte3` varchar(50) DEFAULT NULL,
  `reporte4` varchar(50) DEFAULT NULL,
  `reporte5` varchar(50) DEFAULT NULL,
  `desarrolladores` varchar(50) DEFAULT NULL,
  `licencia` int(1) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `xrl8` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_datos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos`
--

LOCK TABLES `datos` WRITE;
/*!40000 ALTER TABLE `datos` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_departamentos` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_departamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id_empleados` int(2) NOT NULL AUTO_INCREMENT,
  `id_personas` int(11) NOT NULL,
  `id_cargos` int(11) NOT NULL,
  PRIMARY KEY (`id_empleados`),
  KEY `fk5` (`id_personas`),
  KEY `fk6` (`id_cargos`),
  CONSTRAINT `fk5` FOREIGN KEY (`id_personas`) REFERENCES `personas` (`id_personas`),
  CONSTRAINT `fk6` FOREIGN KEY (`id_cargos`) REFERENCES `cargos` (`id_cargos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id_municipios` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(60) DEFAULT NULL,
  `id_departamentos` int(11) NOT NULL,
  PRIMARY KEY (`id_municipios`),
  KEY `fk1` (`id_departamentos`),
  CONSTRAINT `fk1` FOREIGN KEY (`id_departamentos`) REFERENCES `departamentos` (`id_departamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nacionalidades`
--

DROP TABLE IF EXISTS `nacionalidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nacionalidades` (
  `id_nacionalidades` int(11) NOT NULL AUTO_INCREMENT,
  `nacionalidad` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_nacionalidades`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nacionalidades`
--

LOCK TABLES `nacionalidades` WRITE;
/*!40000 ALTER TABLE `nacionalidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `nacionalidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo_concejo`
--

DROP TABLE IF EXISTS `periodo_concejo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo_concejo` (
  `id_periodo` int(2) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo_concejo`
--

LOCK TABLES `periodo_concejo` WRITE;
/*!40000 ALTER TABLE `periodo_concejo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo_concejo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id_personas` int(3) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(200) DEFAULT NULL,
  `sexo` int(1) DEFAULT NULL,
  `direccin` varchar(200) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `id_municipios` int(11) NOT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `id_profesiones` int(11) NOT NULL,
  `id_nacionalidades` int(11) NOT NULL,
  `foto` mediumblob NOT NULL,
  PRIMARY KEY (`id_personas`),
  KEY `fk2` (`id_municipios`),
  KEY `fk3` (`id_profesiones`),
  KEY `fk4` (`id_nacionalidades`),
  CONSTRAINT `fk2` FOREIGN KEY (`id_municipios`) REFERENCES `municipios` (`id_municipios`),
  CONSTRAINT `fk3` FOREIGN KEY (`id_profesiones`) REFERENCES `profesiones` (`id_profesiones`),
  CONSTRAINT `fk4` FOREIGN KEY (`id_nacionalidades`) REFERENCES `nacionalidades` (`id_nacionalidades`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesiones`
--

DROP TABLE IF EXISTS `profesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesiones` (
  `id_profesiones` int(11) NOT NULL AUTO_INCREMENT,
  `profesion` varchar(150) DEFAULT NULL,
  `nomenclatura1` varchar(10) DEFAULT NULL,
  `nomenclatura2` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_profesiones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesiones`
--

LOCK TABLES `profesiones` WRITE;
/*!40000 ALTER TABLE `profesiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empleados` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,1,'@marioabmi','eb5a790b34e06e2ce3346fa2ca5d6abb',1),(2,2,1,'@josue','202cb962ac59075b964b07152d234b70',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sys_aya'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-15 20:11:40
