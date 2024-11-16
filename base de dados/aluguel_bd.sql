CREATE DATABASE  IF NOT EXISTS `aluguel_carros` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `aluguel_carros`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: aluguel_carros
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluguel`
--

DROP TABLE IF EXISTS `aluguel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluguel` (
  `idAluguel` int NOT NULL AUTO_INCREMENT,
  `idCarro` int NOT NULL,
  `idUsuario` int NOT NULL,
  `data_aluguel` date NOT NULL,
  `data_entrega` date NOT NULL,
  `preco_total` double NOT NULL,
  `forma_pagamento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAluguel`),
  KEY `fk_CarroAluguel` (`idCarro`),
  KEY `fk_UsuarioAluguel` (`idUsuario`),
  CONSTRAINT `fk_CarroAluguel` FOREIGN KEY (`idCarro`) REFERENCES `carro` (`idCarro`),
  CONSTRAINT `fk_UsuarioAluguel` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluguel`
--

LOCK TABLES `aluguel` WRITE;
/*!40000 ALTER TABLE `aluguel` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluguel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carro`
--

DROP TABLE IF EXISTS `carro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carro` (
  `idCarro` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `ano` year NOT NULL,
  `cor` varchar(45) NOT NULL,
  `preco_diaria` double NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `alugado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idCarro`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carro`
--

LOCK TABLES `carro` WRITE;
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` VALUES (18,'Strada','Ultra Turbo AT',2024,'Braco',132.65,'Fiat',_binary '\0'),(19,'Strada','Freedom 1.3',2024,'Preto',213.65,'Fiat',_binary '\0'),(20,'Jetta','Sedan',2024,'Vermelho',300.5,'Volkswagen',_binary '\0'),(21,'Jetta','Sedan',2024,'Branco',300.5,'Volkswagen',_binary '\0'),(22,'Onix','Lollapalooza ',2024,'Cinza',157.56,'Chevrolet',_binary '\0'),(23,'Onix','Lollapalooza ',2024,'Azul',157.65,'Chevrolet',_binary '\0'),(24,'Toro','Ranch',2024,'Azul',315,'Fiat',_binary '\0'),(25,'Eclipse','Croos',2025,'Cinza',245.78,'Mitsubishi',_binary '\0');
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `senha` int NOT NULL,
  `administrador` bit(1) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,'José Vinícius','admin',2024,_binary '','jose@gmail.com','2005-08-05'),(5,'Raul Seixas','raul',1234,_binary '\0','raul@gmail.com','2005-08-05'),(6,'Heleno Cardoso','professor',4321,_binary '\0','heleno@gamil.com','2000-01-01');
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

-- Dump completed on 2024-11-16 14:21:29
