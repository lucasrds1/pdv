-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: crud-vendas
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `cod_empresa` int NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `numero_cliente` varchar(13) DEFAULT NULL,
  `endereco_cliente` varchar(100) DEFAULT NULL,
  `cpf_cliente` varchar(11) DEFAULT NULL,
  `dta_ins_cli` datetime DEFAULT NULL,
  `usr_cli_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`cod_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,111111,'lucas','85987734479','ave central','08912089331','2022-09-26 22:48:22','19'),(2,867164,'Isabelle Penha Rodrigues',NULL,NULL,NULL,'2022-09-27 21:13:37','19'),(5,867164,'luciano sera','85988905422','Av Central Leste, 170, araturi, caucaia, ce','','2022-09-28 22:00:51','19'),(6,111111,'lucas','85987734479','avenida','08912089331','2022-09-28 22:37:12','Lucas Penha Rodrigues'),(7,867164,'larisse guedes','85987734479','Av Central Leste, 170, araturi, caucaia, ce','','2022-09-28 22:39:20','Lucas Penha Rodrigues');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `id_empresa` int NOT NULL AUTO_INCREMENT,
  `cod_empresa` int NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `numero_empresa` varchar(13) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`cod_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,123456,'empresa@gmail.com','empresa',NULL,'12345678901234'),(13,112966,'emrer@gfgf.com','empresa',NULL,NULL),(33,867164,'lpsolution@outlook.com','LPSolution','85987734479',NULL),(26,627840,'polishop@outlook.com','polishop',NULL,'12345678901222'),(27,400399,'lucas@dsds.com.br','lucas enterprise',NULL,NULL),(28,855239,'empresa1@dfdf.cdd','empresa1',NULL,NULL),(29,497506,'isa@hotmail.com','isabelle empresa',NULL,NULL),(32,124246,'empresa2@dfd.com','empresa2',NULL,NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_nota`
--

DROP TABLE IF EXISTS `itens_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itens_nota` (
  `eNota` int NOT NULL,
  `item` int NOT NULL AUTO_INCREMENT,
  `cod_empresa` varchar(6) NOT NULL,
  `quantidade` decimal(6,0) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `vr_unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`eNota`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_nota`
--

LOCK TABLES `itens_nota` WRITE;
/*!40000 ALTER TABLE `itens_nota` DISABLE KEYS */;
INSERT INTO `itens_nota` VALUES (951236,1,'',2,'teste10',20.00),(759777,1,'',3,'coca cola',32.00),(111555,1,'',3,'pepsi',32.00),(895477,1,'',3,'pepsi',74.00),(444666,1,'',1,'frango',19.00),(224466,2,'',6,'biscoito',38.00),(759777,2,'',1,'teste10',5.00),(151860,1,'',2,'arroz',9.00),(741852,1,'',1,'iphone',3000.00),(455566,1,'',3,'iphone',2000.00),(741852,2,'',1,'motorola',2000.00),(444666,2,'',5,'ovo',5.00),(555666,2,'',5,'biscoito',10.00),(777111,1,'',5,'biscoito',38.00),(785258,1,'',5,'biscoito',38.00),(111112,1,'',1,'bolsa',200.00),(111111,2,'',2,'sapato',200.00),(111111,1,'',1,'tenis',100.00),(111112,2,'',2,'tenis',490.00),(111112,3,'',1,'bolsa',200.00),(111112,4,'',2,'tenis',490.00),(111122,1,'',2,'testes',20.00);
/*!40000 ALTER TABLE `itens_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nota` (
  `eNota` int NOT NULL,
  `cod_empresa` varchar(6) NOT NULL,
  `dataVenda` date NOT NULL,
  `formaPagamento` varchar(20) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `qntd_produtos` int NOT NULL,
  PRIMARY KEY (`eNota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` VALUES (151860,'','2022-07-31','pix','TESTETESTE',0),(741852,'','2022-08-01','pix','',0),(444666,'','2022-07-31','pix','frango',0),(455566,'','2022-08-01','crédito','TESTE FINAL',0),(951236,'','2022-07-31','pix','',0),(895477,'','2022-07-31','crédito','teste5',0),(111555,'','2022-07-31','crédito','chave: 08912089331',0),(759777,'','2022-07-30','crédito','TESTEEEEE',0),(555666,'','2022-08-19','fiado','pagar dia 17 de agosto',0),(111228,'','2022-08-19','fiado','pagar dia 17 de agosto',0),(224466,'','2022-08-27','fiado','pagar dia 17 de agosto',0),(777111,'','2022-08-28','fiado','pagar dia 17 de agosto',0),(785258,'','2022-09-04','fiado','pagar dia 17 de agosto',0),(588564,'','2022-09-08','pix','blabal',2),(111111,'','2022-09-08','pix','blabal',2),(222555,'','2022-09-09','pix','blabal',2),(778521,'','2022-09-09','pix','blabal',2),(111112,'','2022-09-09','pix','teste',2),(111122,'','2022-09-09','pix','teste',1);
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cod_empresa` varchar(6) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `numero_celular` varchar(13) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `permissoes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (5,'','','Larisse','0000-00-00',NULL,'','6562c5c1f33db6e05a082a88cddab5ea',NULL),(4,'','','Lucas','0000-00-00',NULL,'','81dc9bdb52d04dc20036dbd8313ed055',NULL),(6,'','','Penha','0000-00-00',NULL,'','01cfcd4f6b8770febfb40cb906715822',NULL),(7,'','','Isabelle','0000-00-00',NULL,'','a53c8cd09fb02ba13e56ba08309e70dc',NULL),(8,'','','Lucas Penha','0000-00-00',NULL,'','698dc19d489c4e4db73e28a713eab07b',NULL),(9,'','','Silva Rodrigues','0000-00-00',NULL,'','aa1bf4646de67fd9086cf6c79007026c',NULL),(10,'','','Jucelino','0000-00-00',NULL,'','827ccb0eea8a706c4c34a16891f84e7b',NULL),(19,'867164','08912089331','Lucas Penha Rodrigues','2003-08-12','85987734479','lucasrds17@outlook.com','1ce9f12efd36b0fe0623c4f81ef24202','ADMIN'),(16,'400399','12345678901','luciano serra rodrigues','1971-05-28','85987734479','luciano@gmail.com','12345678',NULL),(18,'124246','01912089331','Luciano Serra Rodrigues','2003-08-12','85987734479','lucasrds@outlook.com','1ce9f12efd36b0fe0623c4f81ef24202','ADMIN'),(14,'627840','06694223390','isabelle penha rodrigues','1996-05-08','85987991830','isabelle@outlook.com','08051996','ADMIN');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'crud-vendas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-01 18:03:03