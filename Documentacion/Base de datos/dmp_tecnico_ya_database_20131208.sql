-- MySQL dump 10.13  Distrib 5.6.12, for Linux (x86_64)
--
-- Host: localhost    Database: tecnico_ya_database
-- ------------------------------------------------------
-- Server version	5.6.12

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
-- Table structure for table `tbl_administradores`
--

DROP TABLE IF EXISTS `tbl_administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_administradores` (
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `emal_UNIQUE` (`email`),
  CONSTRAINT `fk_administrador_usuario` FOREIGN KEY (`email`) REFERENCES `tbl_usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_administradores`
--

LOCK TABLES `tbl_administradores` WRITE;
/*!40000 ALTER TABLE `tbl_administradores` DISABLE KEYS */;
INSERT INTO `tbl_administradores` VALUES ('admin@admin.com');
/*!40000 ALTER TABLE `tbl_administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_barrios`
--

DROP TABLE IF EXISTS `tbl_barrios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_barrios` (
  `id_barrio` int(11) NOT NULL,
  `nombres_barrio` varchar(45) NOT NULL,
  `fk_localidad` int(11) NOT NULL,
  PRIMARY KEY (`id_barrio`),
  KEY `fk_barrio_localidad_idx` (`fk_localidad`),
  CONSTRAINT `fk_barrio_localidad` FOREIGN KEY (`fk_localidad`) REFERENCES `tbl_localidades` (`id_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_barrios`
--

LOCK TABLES `tbl_barrios` WRITE;
/*!40000 ALTER TABLE `tbl_barrios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_barrios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cliente_contrata_servicio`
--

DROP TABLE IF EXISTS `tbl_cliente_contrata_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cliente_contrata_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_servicio` int(11) NOT NULL,
  `fk_cliente` varchar(45) NOT NULL,
  `fk_tecnico` varchar(45) NOT NULL,
  `precio_final_servicio` float NOT NULL,
  `fecha_hora_contrato` datetime NOT NULL,
  `horas_contrato_servicio` int(11) NOT NULL,
  `calificacion_otorgada_tecnico` int(11) DEFAULT NULL,
  `calificacion_otorgada_cliente` int(11) DEFAULT NULL,
  `descripcion_servicio_realizado` varchar(500) DEFAULT NULL,
  `foto_averia` blob,
  `aceptado_por_tecnico` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contrato_tecnico_idx` (`fk_tecnico`),
  KEY `fk_contrato_cliente_idx` (`fk_cliente`),
  KEY `fk_contrato_servicio_idx` (`fk_servicio`),
  CONSTRAINT `fk_contrato_cliente` FOREIGN KEY (`fk_cliente`) REFERENCES `tbl_clientes` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_servicio` FOREIGN KEY (`fk_servicio`) REFERENCES `tbl_servicios` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_tecnico` FOREIGN KEY (`fk_tecnico`) REFERENCES `tbl_tecnicos` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='duracion_servicio';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente_contrata_servicio`
--

LOCK TABLES `tbl_cliente_contrata_servicio` WRITE;
/*!40000 ALTER TABLE `tbl_cliente_contrata_servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cliente_contrata_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_clientes`
--

DROP TABLE IF EXISTS `tbl_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_clientes` (
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`email`),
  CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`email`) REFERENCES `tbl_usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clientes`
--

LOCK TABLES `tbl_clientes` WRITE;
/*!40000 ALTER TABLE `tbl_clientes` DISABLE KEYS */;
INSERT INTO `tbl_clientes` VALUES ('cliente@cliente.com');
/*!40000 ALTER TABLE `tbl_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_departamentos`
--

DROP TABLE IF EXISTS `tbl_departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(45) NOT NULL,
  `fk_pais` int(11) NOT NULL,
  PRIMARY KEY (`id_departamento`),
  KEY `fk_departamento_pais_idx` (`fk_pais`),
  CONSTRAINT `fk_departamento_pais` FOREIGN KEY (`fk_pais`) REFERENCES `tbl_paises` (`id_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_departamentos`
--

LOCK TABLES `tbl_departamentos` WRITE;
/*!40000 ALTER TABLE `tbl_departamentos` DISABLE KEYS */;
INSERT INTO `tbl_departamentos` VALUES (2,'Rocha',1),(3,'dsdfsdf',2),(4,'Rio',3),(5,'Carandiru',3),(6,'Flores',1);
/*!40000 ALTER TABLE `tbl_departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_localidades`
--

DROP TABLE IF EXISTS `tbl_localidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_localidades` (
  `id_localidad` int(11) NOT NULL,
  `nombre_localidad` varchar(45) NOT NULL,
  `fk_departamento` int(11) NOT NULL,
  PRIMARY KEY (`id_localidad`),
  KEY `fk_localidad_departamento_idx` (`fk_departamento`),
  CONSTRAINT `fk_localidad_departamento` FOREIGN KEY (`fk_departamento`) REFERENCES `tbl_departamentos` (`id_departamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_localidades`
--

LOCK TABLES `tbl_localidades` WRITE;
/*!40000 ALTER TABLE `tbl_localidades` DISABLE KEYS */;
INSERT INTO `tbl_localidades` VALUES (1,'Lascano',2),(2,'Castillos',2),(3,'Barrio du brasil',6);
/*!40000 ALTER TABLE `tbl_localidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_paises`
--

DROP TABLE IF EXISTS `tbl_paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_paises` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_paises`
--

LOCK TABLES `tbl_paises` WRITE;
/*!40000 ALTER TABLE `tbl_paises` DISABLE KEYS */;
INSERT INTO `tbl_paises` VALUES (1,'Uruguay'),(2,'Argentina'),(3,'Brasil'),(4,'Paraguay');
/*!40000 ALTER TABLE `tbl_paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_servicios`
--

DROP TABLE IF EXISTS `tbl_servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_servicio`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_servicios`
--

LOCK TABLES `tbl_servicios` WRITE;
/*!40000 ALTER TABLE `tbl_servicios` DISABLE KEYS */;
INSERT INTO `tbl_servicios` VALUES (1,'Carpinteria','Todo sobre carpintería',0),(3,'plomeria','Todo sobre plomería',0),(4,'Herrería','Todo sobre herrería',1),(5,'Técnico PC','Todo sobre computadoras',0),(6,'Jardinería','Todo sobre jardinería',0);
/*!40000 ALTER TABLE `tbl_servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tecnico_cubre_barrio`
--

DROP TABLE IF EXISTS `tbl_tecnico_cubre_barrio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tecnico_cubre_barrio` (
  `fk_tenico` varchar(45) NOT NULL,
  `fk_barrio` int(11) NOT NULL,
  PRIMARY KEY (`fk_tenico`,`fk_barrio`),
  KEY `fk_cobertura_usuario_idx` (`fk_tenico`),
  KEY `fk_cobertura_barrio_idx` (`fk_barrio`),
  CONSTRAINT `fk_cobertura_barrio` FOREIGN KEY (`fk_barrio`) REFERENCES `tbl_barrios` (`id_barrio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cobertura_usuario` FOREIGN KEY (`fk_tenico`) REFERENCES `tbl_tecnicos` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tecnico_cubre_barrio`
--

LOCK TABLES `tbl_tecnico_cubre_barrio` WRITE;
/*!40000 ALTER TABLE `tbl_tecnico_cubre_barrio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tecnico_cubre_barrio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tecnico_ofrece_servicio`
--

DROP TABLE IF EXISTS `tbl_tecnico_ofrece_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tecnico_ofrece_servicio` (
  `fk_tecnico` varchar(45) NOT NULL,
  `fk_servicio` int(11) NOT NULL,
  `precio_servicio` float NOT NULL,
  `ruta_imagen` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`fk_tecnico`,`fk_servicio`),
  KEY `fk_tecofserv_servicio_idx` (`fk_servicio`),
  KEY `fk_tecofserv_tecnico_idx` (`fk_tecnico`),
  CONSTRAINT `fk_tecofserv_servicio` FOREIGN KEY (`fk_servicio`) REFERENCES `tbl_servicios` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tecofserv_tecnico` FOREIGN KEY (`fk_tecnico`) REFERENCES `tbl_tecnicos` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tecnico_ofrece_servicio`
--

LOCK TABLES `tbl_tecnico_ofrece_servicio` WRITE;
/*!40000 ALTER TABLE `tbl_tecnico_ofrece_servicio` DISABLE KEYS */;
INSERT INTO `tbl_tecnico_ofrece_servicio` VALUES ('tecnico@tecnico.com',1,250,'includes/img/abmAdministrador.jpg');
/*!40000 ALTER TABLE `tbl_tecnico_ofrece_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tecnicos`
--

DROP TABLE IF EXISTS `tbl_tecnicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tecnicos` (
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`email`),
  CONSTRAINT `fk_tenico_usuario` FOREIGN KEY (`email`) REFERENCES `tbl_usuarios` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tecnicos`
--

LOCK TABLES `tbl_tecnicos` WRITE;
/*!40000 ALTER TABLE `tbl_tecnicos` DISABLE KEYS */;
INSERT INTO `tbl_tecnicos` VALUES ('tecnico@tecnico.com');
/*!40000 ALTER TABLE `tbl_tecnicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ubicacion`
--

DROP TABLE IF EXISTS `tbl_ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `longitud` mediumtext NOT NULL,
  `latitud` mediumtext NOT NULL,
  PRIMARY KEY (`id_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ubicacion`
--

LOCK TABLES `tbl_ubicacion` WRITE;
/*!40000 ALTER TABLE `tbl_ubicacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `email` varchar(45) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `contrasenia` varchar(45) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `fk_barrio` int(11) DEFAULT NULL,
  `fk_ubicacion` int(11) DEFAULT NULL COMMENT '	',
  `nick` varchar(45) NOT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `ci_UNIQUE` (`ci`),
  UNIQUE KEY `nick_UNIQUE` (`nick`),
  UNIQUE KEY `fk_ubicacion_UNIQUE` (`fk_ubicacion`),
  KEY `fk_usuario_barrio_idx` (`fk_barrio`),
  CONSTRAINT `fk_usuario_barrio` FOREIGN KEY (`fk_barrio`) REFERENCES `tbl_barrios` (`id_barrio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_ubicacion` FOREIGN KEY (`fk_ubicacion`) REFERENCES `tbl_ubicacion` (`id_ubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_usuarios` VALUES ('admin@admin.com','46922191','juan','perez','21232f297a57a5a743894a0e4a801fc3','099554488','algun lugar',1,NULL,NULL,'admin',NULL,NULL),('cliente@cliente.com','','','','4983a0ab83ed86e0e7213c8783940193','','',1,NULL,NULL,'cliente','masculino','0000-00-00'),('tecnico@tecnico.com','46922204','silvia','rodriguez','75f33e6eebce7012b8c74a889fa8a7ed','095553210','algun lado',1,NULL,NULL,'tecnico','femenino','0000-00-00');
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-08 20:27:21
