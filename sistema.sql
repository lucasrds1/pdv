-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crud-vendas
-- ------------------------------------------------------
-- Server version	5.7.36

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
-- Table structure for table `cad_clientes`
--

DROP TABLE IF EXISTS `cad_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `fone` varchar(13) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `dta_ins_cli` datetime DEFAULT NULL,
  `usr_cli_id` varchar(100) DEFAULT NULL,
  `tipo_cliente` varchar(1) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `data_ult_compra` date DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `profissão` varchar(30) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `instagram` varchar(30) DEFAULT NULL,
  `id_loja` varchar(2) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_clientes`
--

LOCK TABLES `cad_clientes` WRITE;
/*!40000 ALTER TABLE `cad_clientes` DISABLE KEYS */;
INSERT INTO `cad_clientes` VALUES (1,111111,'lucas','85987734479','ave central','08912089331','2022-09-26 22:48:22','19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,867164,'Isabelle Penha Rodrigues',NULL,NULL,NULL,'2022-09-27 21:13:37','19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,867164,'Luciano Sera','85988905422','Av Central Leste, 170, Araturi, Caucaia, Ce',NULL,'2022-10-14 23:14:02','Lucas Penha Rodrigues',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,111111,'lucas','85987734479','avenida','08912089331','2022-09-28 22:37:12','Lucas Penha Rodrigues',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,867164,'Larisse Guedes','85987734479','Av Central Leste, 170, Araturi, Caucaia, Ce',NULL,'2022-10-14 22:59:27','Lucas Penha Rodrigues',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cad_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_compras`
--

DROP TABLE IF EXISTS `cad_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_compras` (
  `eNota` varchar(10) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `forma_Pgto` varchar(20) NOT NULL,
  `tipo_entrada` varchar(1) DEFAULT NULL COMMENT '1-Emissao própria / 2-Emitida por terceiros / 3 - Importação de XML',
  `serie_nf` varchar(2) DEFAULT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_natope` varchar(2) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `hora_entrada` varchar(4) DEFAULT NULL,
  `cod_tributario` varchar(2) DEFAULT NULL,
  `indicador_presenca` varchar(2) DEFAULT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `total_produtos` double DEFAULT NULL,
  `valor_seguro` double DEFAULT NULL,
  `outras_despesas` double DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  `total_nf` double DEFAULT NULL,
  `obs_complementar` varchar(100) DEFAULT NULL,
  `obs_natope` varchar(100) DEFAULT NULL,
  `id_frete` varchar(2) DEFAULT NULL,
  `valor_frete` double DEFAULT NULL,
  PRIMARY KEY (`eNota`,`id_empresa`,`id_loja`,`id_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_compras`
--

LOCK TABLES `cad_compras` WRITE;
/*!40000 ALTER TABLE `cad_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_empresa`
--

DROP TABLE IF EXISTS `cad_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_empresa` (
  `cod_empresa` int(11) NOT NULL,
  `email_empresa` varchar(50) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `numero_empresa` varchar(13) DEFAULT NULL,
  `cnpj_cpf` varchar(14) DEFAULT NULL,
  `tipo_cadastro` char(1) DEFAULT NULL COMMENT 'Se o cadastro é com 1-CNPJ ou 2-CPF',
  `plano_pagamento` char(2) DEFAULT NULL COMMENT 'Tipo de plano de Pgto - Pegar da tabela TAB_PLANOS_PGTO',
  `dt_cadastro` date DEFAULT NULL COMMENT 'Data de Inicio da Assinatura',
  `qtd_lojas` int(11) DEFAULT '1' COMMENT 'Quantidade de Lojas liberadas para o uso do sistema',
  `dias_carencia` int(11) DEFAULT NULL COMMENT 'Dias de carencia para o inicio da cobrança',
  `id_status` varchar(1) DEFAULT '1' COMMENT 'Status da Empresa: 1-CARENCIA / 2-ATIVA / 3-INADIMPLENTE / 4-SUSPENÇA / 5-ENCERRADA -> Tabela TAB_STATUS',
  PRIMARY KEY (`cod_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_empresa`
--

LOCK TABLES `cad_empresa` WRITE;
/*!40000 ALTER TABLE `cad_empresa` DISABLE KEYS */;
INSERT INTO `cad_empresa` VALUES (123456,'empresa@gmail.com','empresa',NULL,'12345678901234',NULL,NULL,NULL,NULL,NULL,NULL),(112966,'emrer@gfgf.com','empresa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(867164,'lpsolution@outlook.com','LPSolution','85987734479',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(627840,'polishop@outlook.com','polishop',NULL,'12345678901222',NULL,NULL,NULL,NULL,NULL,NULL),(400399,'lucas@dsds.com.br','lucas enterprise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(855239,'empresa1@dfdf.cdd','empresa1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(497506,'isa@hotmail.com','isabelle empresa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124246,'empresa2@dfd.com','empresa2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(667417,'luciano.serra@hotmail.com.br','lucas penha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(717799,'empresalucas@hotmail.com','Empresa do lucas','85987734479','08912089331','1',NULL,'2022-10-19',1,NULL,NULL),(230053,'lucasrds19@outlook.com','Empresa do lucas','85987734479','08912089322','1',NULL,'2022-10-19',1,NULL,NULL);
/*!40000 ALTER TABLE `cad_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_empresas`
--

DROP TABLE IF EXISTS `cad_empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `email_empresa` varchar(50) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `numero_empresa` varchar(13) DEFAULT NULL,
  `cnpj_cpf` varchar(14) DEFAULT NULL,
  `tipo_cadastro` varchar(1) DEFAULT NULL COMMENT 'Se o cadastro é com 1-CNPJ ou 2-CPF',
  `plano_pagamento` char(2) DEFAULT NULL COMMENT 'Tipo de plano de Pgto - Pegar da tabela TAB_PLANOS_PGTO',
  `dt_cadastro` datetime DEFAULT NULL COMMENT 'Data de Inicio da Assinatura',
  `qtd_lojas` int(11) DEFAULT '1' COMMENT 'Quantidade de Lojas liberadas para o uso do sistema',
  `dias_carencia` int(11) DEFAULT NULL COMMENT 'Dias de carencia para o inicio da cobrança',
  `id_status` varchar(1) DEFAULT NULL COMMENT 'Status da Empresa: 1-CARENCIA / 2-ATIVA / 3-INADIMPLENTE / 4-SUSPENÇA / 5-ENCERRADA -> Tabela TAB_STATUS',
  `data_pgto` date DEFAULT NULL COMMENT 'Data do último pagamento - mensalidade do sistema',
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=884239 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_empresas`
--

LOCK TABLES `cad_empresas` WRITE;
/*!40000 ALTER TABLE `cad_empresas` DISABLE KEYS */;
INSERT INTO `cad_empresas` VALUES (1,'empresa@gmail.com','empresa',NULL,'12345678901234',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'emrer@gfgf.com','empresa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'polishop@outlook.com','polishop',NULL,'12345678901222',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'lucas@dsds.com.br','lucas enterprise',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'empresa1@dfdf.cdd','empresa1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'isa@hotmail.com','isabelle empresa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'empresa2@dfd.com','empresa2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'luciano.serra@hotmail.com.br','lucas penha',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(884238,'lucasrds17@outlook.com','Empresa do lucas','85987734479','08912089331','1',NULL,'2022-10-22 00:00:00',1,NULL,NULL,NULL),(640990,'empresalucas1@hotmail.com','Empresa do lucas','85987734479','08912089333','1',NULL,'2022-10-22 00:00:00',1,NULL,NULL,NULL),(603253,'empresaluca5s@hotmail.com','Empresa do lucas2','85987734479','08912089332','1',NULL,'2022-10-22 00:00:00',2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cad_empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_entregador`
--

DROP TABLE IF EXISTS `cad_entregador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_entregador` (
  `id_entregador` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `transporte` varchar(20) DEFAULT NULL,
  `valor_km` double DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `endereço` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  PRIMARY KEY (`id_entregador`,`id_empresa`,`id_loja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_entregador`
--

LOCK TABLES `cad_entregador` WRITE;
/*!40000 ALTER TABLE `cad_entregador` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_entregador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_fornecedor`
--

DROP TABLE IF EXISTS `cad_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_fornecedor` (
  `nome` varchar(100) NOT NULL,
  `fone` varchar(13) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `tipo_fornecedor` varchar(1) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `data_ult_compra` date DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `atividade` varchar(30) DEFAULT NULL,
  `inscricao_estadual` varchar(15) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `fone_vendedor` varchar(11) DEFAULT NULL,
  `nome_vendedor` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `instagram` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_fornecedor`
--

LOCK TABLES `cad_fornecedor` WRITE;
/*!40000 ALTER TABLE `cad_fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_lojas`
--

DROP TABLE IF EXISTS `cad_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_lojas` (
  `id_empresa` int(11) NOT NULL,
  `nome_loja` varchar(20) DEFAULT NULL,
  `Endereco` varchar(30) DEFAULT NULL,
  `Bairro` varchar(20) DEFAULT NULL,
  `Fone` varchar(11) DEFAULT NULL,
  `Horario_funciona` varchar(50) DEFAULT NULL,
  `id_loja` varchar(2) NOT NULL,
  `ip_loja` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_lojas`
--

LOCK TABLES `cad_lojas` WRITE;
/*!40000 ALTER TABLE `cad_lojas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_notas`
--

DROP TABLE IF EXISTS `cad_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_notas` (
  `eNota` varchar(10) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `forma_Pgto` varchar(20) NOT NULL,
  `tipo_entrada` varchar(1) DEFAULT NULL COMMENT '1-Emissao própria / 2-Emitida por terceiros / 3 - Importação de XML',
  `serie_nf` varchar(2) DEFAULT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_natope` varchar(2) DEFAULT NULL,
  `data_entrada` date DEFAULT NULL,
  `hora_entrada` varchar(4) DEFAULT NULL,
  `cod_tributario` varchar(2) DEFAULT NULL,
  `indicador_presenca` varchar(2) DEFAULT NULL,
  `id_fornecedor` int(11) NOT NULL,
  `total_produtos` double DEFAULT NULL,
  `valor_seguro` double DEFAULT NULL,
  `outras_despesas` double DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  `total_nf` double DEFAULT NULL,
  `obs_complementar` varchar(100) DEFAULT NULL,
  `obs_natope` varchar(100) DEFAULT NULL,
  `id_frete` varchar(2) DEFAULT NULL,
  `valor_frete` double DEFAULT NULL,
  PRIMARY KEY (`eNota`,`id_empresa`,`id_loja`,`id_fornecedor`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_notas`
--

LOCK TABLES `cad_notas` WRITE;
/*!40000 ALTER TABLE `cad_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_produtos`
--

DROP TABLE IF EXISTS `cad_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_barras` varchar(13) DEFAULT NULL,
  `descricao` varchar(30) DEFAULT NULL,
  `cod_grupo` varchar(4) DEFAULT NULL,
  `cod_subgrupo1` varchar(4) DEFAULT NULL,
  `cod_subgrupo2` varchar(4) DEFAULT NULL,
  `descr_resumida` varchar(20) DEFAULT NULL,
  `unidade_entrada` varchar(3) DEFAULT NULL,
  `qt_emb_entrada` double DEFAULT NULL,
  `unidade_saida` varchar(3) DEFAULT NULL,
  `qt_unid_saida` double DEFAULT NULL,
  `perc_icms_entrada` double DEFAULT NULL,
  `perc_icms_saida` double DEFAULT NULL,
  `cod_trib` varchar(10) DEFAULT NULL,
  `perc_ipi` double DEFAULT NULL,
  `peso_liquido` double DEFAULT NULL,
  `peso_bruto` double DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `ncm` varchar(8) DEFAULT NULL COMMENT 'Nomenclatura Comum do Mercosul',
  PRIMARY KEY (`id_produto`,`id_empresa`),
  KEY `cad_produtos_id_produto_IDX` (`id_produto`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_produtos`
--

LOCK TABLES `cad_produtos` WRITE;
/*!40000 ALTER TABLE `cad_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_usuarios`
--

DROP TABLE IF EXISTS `cad_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` varchar(6) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `data_nascimento` date NOT NULL,
  `numero_celular` varchar(13) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 NOT NULL,
  `permissoes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_usuarios`
--

LOCK TABLES `cad_usuarios` WRITE;
/*!40000 ALTER TABLE `cad_usuarios` DISABLE KEYS */;
INSERT INTO `cad_usuarios` VALUES (5,'','','Larisse','0000-00-00',NULL,'','6562c5c1f33db6e05a082a88cddab5ea',NULL),(4,'','','Lucas','0000-00-00',NULL,'','81dc9bdb52d04dc20036dbd8313ed055',NULL),(6,'','','Penha','0000-00-00',NULL,'','01cfcd4f6b8770febfb40cb906715822',NULL),(7,'','','Isabelle','0000-00-00',NULL,'','a53c8cd09fb02ba13e56ba08309e70dc',NULL),(8,'','','Lucas Penha','0000-00-00',NULL,'','698dc19d489c4e4db73e28a713eab07b',NULL),(9,'','','Silva Rodrigues','0000-00-00',NULL,'','aa1bf4646de67fd9086cf6c79007026c',NULL),(10,'','','Jucelino','0000-00-00',NULL,'','827ccb0eea8a706c4c34a16891f84e7b',NULL),(16,'400399','12345678901','luciano serra rodrigues','1971-05-28','85987734479','luciano@gmail.com','12345678',NULL),(18,'124246','01912089331','Luciano Serra Rodrigues','2003-08-12','85987734479','lucasrds@outlook.com','1ce9f12efd36b0fe0623c4f81ef24202','ADMIN'),(14,'627840','06694223390','isabelle penha rodrigues','1996-05-08','85987991830','isabelle@outlook.com','08051996','ADMIN'),(20,'230053','0891208922','Lucas Penha Rodriguees','2003-08-12','85987734479','lucasrds19@outlook.com','1ce9f12efd36b0fe0623c4f81ef24202','ADMIN'),(21,'603253','0891208935','Isabelle Penha Rodrigues','2003-08-12','85987734479','isabelle12@outlook.com','1ce9f12efd36b0fe0623c4f81ef24202','ADMIN');
/*!40000 ALTER TABLE `cad_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cad_venda`
--

DROP TABLE IF EXISTS `cad_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cad_venda` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `tipo_cliente` varchar(1) DEFAULT NULL,
  `total_venda` double DEFAULT NULL,
  `total_desconto` double DEFAULT NULL,
  `total_lucro` double DEFAULT NULL,
  `hora_inicial` varchar(4) DEFAULT NULL,
  `hora_final` varchar(4) DEFAULT NULL,
  `mesa` varchar(3) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `mesa_old` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_venda`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cad_venda`
--

LOCK TABLES `cad_venda` WRITE;
/*!40000 ALTER TABLE `cad_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `cad_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cod_empresa` int(11) NOT NULL,
  `nome_cliente` varchar(100) NOT NULL,
  `numero_cliente` varchar(13) DEFAULT NULL,
  `endereco_cliente` varchar(100) DEFAULT NULL,
  `cpf_cliente` varchar(11) DEFAULT NULL,
  `dta_ins_cli` datetime DEFAULT NULL,
  `usr_cli_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`,`cod_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,111111,'lucas','85987734479','ave central','08912089331','2022-09-26 22:48:22','19'),(2,867164,'Isabelle Penha Rodrigues',NULL,'Av Central Leste, 170','08912089339','2022-10-20 20:50:15','Lucas Penha Rodrigues'),(5,867164,'Luciano Sera','85988905422','Av Central Leste, 170',NULL,'2022-10-16 20:28:49','Lucas Penha Rodrigues'),(6,111111,'lucas','85987734479','avenida','08912089331','2022-09-28 22:37:12','Lucas Penha Rodrigues'),(9,867164,'Isabelle Penha Rodrigues',NULL,NULL,NULL,'2022-10-20 20:49:07','Lucas Penha Rodrigues'),(8,867164,'Maria Eduarda','85985278587',NULL,'08912089332','2022-10-16 20:30:11','Lucas Penha Rodrigues'),(10,867164,'Luciano Sera',NULL,NULL,NULL,'2022-10-20 20:49:10','Lucas Penha Rodrigues'),(11,867164,'Larisse Guedes',NULL,NULL,NULL,'2022-10-20 20:49:14','Lucas Penha Rodrigues'),(12,867164,'Maria Eduarda',NULL,NULL,NULL,'2022-10-20 20:49:19','Lucas Penha Rodrigues'),(13,867164,'Marcia Oriene',NULL,NULL,NULL,'2022-10-20 20:49:23','Lucas Penha Rodrigues'),(14,867164,'Lucas Penha',NULL,NULL,NULL,'2022-10-20 20:49:26','Lucas Penha Rodrigues'),(15,867164,'Larisse Guedes',NULL,NULL,NULL,'2022-10-20 20:49:30','Lucas Penha Rodrigues'),(17,867164,'Maria Eduarda',NULL,NULL,NULL,'2022-10-20 20:49:36','Lucas Penha Rodrigues'),(18,867164,'Luciano Sera',NULL,NULL,NULL,'2022-10-20 20:49:40','Lucas Penha Rodrigues'),(19,867164,'Lucas Penha',NULL,NULL,NULL,'2022-10-20 20:49:45','Lucas Penha Rodrigues');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_nota`
--

DROP TABLE IF EXISTS `itens_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `itens_nota` (
  `eNota` int(11) NOT NULL,
  `item` int(11) NOT NULL AUTO_INCREMENT,
  `cod_empresa` varchar(6) NOT NULL,
  `quantidade` decimal(6,0) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `vr_unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`eNota`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
-- Table structure for table `mov_acessos`
--

DROP TABLE IF EXISTS `mov_acessos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_acessos` (
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_opcao` varchar(4) NOT NULL,
  PRIMARY KEY (`id_empresa`,`id_usuario`,`id_opcao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_acessos`
--

LOCK TABLES `mov_acessos` WRITE;
/*!40000 ALTER TABLE `mov_acessos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_acessos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_notas`
--

DROP TABLE IF EXISTS `mov_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_notas` (
  `eNota` int(11) NOT NULL,
  `item` int(11) NOT NULL AUTO_INCREMENT,
  `cod_empresa` varchar(6) NOT NULL,
  `quantidade` decimal(6,0) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `vr_unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`eNota`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_notas`
--

LOCK TABLES `mov_notas` WRITE;
/*!40000 ALTER TABLE `mov_notas` DISABLE KEYS */;
INSERT INTO `mov_notas` VALUES (951236,1,'',2,'teste10',20.00),(759777,1,'',3,'coca cola',32.00),(111555,1,'',3,'pepsi',32.00),(895477,1,'',3,'pepsi',74.00),(444666,1,'',1,'frango',19.00),(224466,2,'',6,'biscoito',38.00),(759777,2,'',1,'teste10',5.00),(151860,1,'',2,'arroz',9.00),(741852,1,'',1,'iphone',3000.00),(455566,1,'',3,'iphone',2000.00),(741852,2,'',1,'motorola',2000.00),(444666,2,'',5,'ovo',5.00),(555666,2,'',5,'biscoito',10.00),(777111,1,'',5,'biscoito',38.00),(785258,1,'',5,'biscoito',38.00),(111112,1,'',1,'bolsa',200.00),(111111,2,'',2,'sapato',200.00),(111111,1,'',1,'tenis',100.00),(111112,2,'',2,'tenis',490.00),(111112,3,'',1,'bolsa',200.00),(111112,4,'',2,'tenis',490.00),(111122,1,'',2,'testes',20.00);
/*!40000 ALTER TABLE `mov_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_produtos`
--

DROP TABLE IF EXISTS `mov_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_produtos` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `est_deposito` double DEFAULT NULL,
  `est_vajeto` double DEFAULT NULL,
  `cod_prateleira` varchar(6) DEFAULT NULL,
  `pr_compra` double DEFAULT NULL,
  `pr_custo` double DEFAULT NULL,
  `pr_custo_medio` double DEFAULT NULL,
  `pr_venda` double DEFAULT NULL,
  `data_atualizacao_preco` date DEFAULT NULL,
  `data_ult_compra` date DEFAULT NULL,
  `perc_lucro` double DEFAULT NULL,
  `pr_venda_promo` double DEFAULT NULL,
  `data_venc_promo` date DEFAULT NULL,
  `quant_atacado` double DEFAULT NULL COMMENT 'Quantidade para definir na venda se o preço considerado será pr_venda ou pr_venda - perc_desc_atacado',
  `perc_desc_atacado` double DEFAULT NULL COMMENT 'Percentual de desconto que incidirá sobre o pr_venda se quantidade vendida for maior que quant_atacado',
  `cod_barras` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_produto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_produtos`
--

LOCK TABLES `mov_produtos` WRITE;
/*!40000 ALTER TABLE `mov_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_status_pedido`
--

DROP TABLE IF EXISTS `mov_status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_status_pedido` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `id_status` int(2) DEFAULT NULL COMMENT '1- Pedido Aceito / 2-Em Produção / 3-Aguardando Despacho / 4-Despachado / 5-Em Mesa / 6-Em Rota / 7-Entregue / 8-Devolvido / 9-Recolhido',
  `id_entregador` int(3) DEFAULT NULL COMMENT 'Codigo do entregador -> Motoqueiro / Ciclista / Motorista',
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_caixa`,`id_controle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_status_pedido`
--

LOCK TABLES `mov_status_pedido` WRITE;
/*!40000 ALTER TABLE `mov_status_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_venda`
--

DROP TABLE IF EXISTS `mov_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_venda` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_item` int(3) NOT NULL AUTO_INCREMENT,
  `cod_barras` varchar(13) DEFAULT NULL,
  `id_funcao` int(3) NOT NULL,
  `data` date DEFAULT NULL,
  `hora` varchar(4) NOT NULL,
  `pr_venda` double NOT NULL,
  `quantidade` double NOT NULL,
  `id_produto` int(11) NOT NULL,
  `pr_custo` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cod_grupo` varchar(4) DEFAULT NULL,
  `cod_subgrupo1` varchar(4) DEFAULT NULL,
  `cod_subgrupo2` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_item`,`id_venda`,`id_caixa`,`id_loja`,`id_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_venda`
--

LOCK TABLES `mov_venda` WRITE;
/*!40000 ALTER TABLE `mov_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_venda_avaliacao`
--

DROP TABLE IF EXISTS `mov_venda_avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_venda_avaliacao` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `atend_caixa` varchar(1) DEFAULT NULL,
  `higiene_loja` varchar(1) DEFAULT NULL,
  `variedade_prod` varchar(1) DEFAULT NULL,
  `entrega` varchar(1) DEFAULT NULL,
  `prod_faltou` varchar(20) DEFAULT NULL,
  `prod_sugestao` varchar(20) DEFAULT NULL,
  `observ` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_caixa`,`id_venda`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_venda_avaliacao`
--

LOCK TABLES `mov_venda_avaliacao` WRITE;
/*!40000 ALTER TABLE `mov_venda_avaliacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_venda_avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mov_venda_tppgto`
--

DROP TABLE IF EXISTS `mov_venda_tppgto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mov_venda_tppgto` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_tppgto` varchar(2) NOT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_caixa`,`id_venda`,`id_tppgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mov_venda_tppgto`
--

LOCK TABLES `mov_venda_tppgto` WRITE;
/*!40000 ALTER TABLE `mov_venda_tppgto` DISABLE KEYS */;
/*!40000 ALTER TABLE `mov_venda_tppgto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nota` (
  `eNota` int(11) NOT NULL,
  `cod_empresa` varchar(6) NOT NULL,
  `dataVenda` date NOT NULL,
  `formaPagamento` varchar(20) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `qntd_produtos` int(11) NOT NULL,
  PRIMARY KEY (`eNota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
-- Table structure for table `tab_acessos`
--

DROP TABLE IF EXISTS `tab_acessos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_acessos` (
  `id_opcao` varchar(4) NOT NULL,
  `opcao` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Essa tabela serão gravadas as opções de menu do sistema que cada usuário terá acesso.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_acessos`
--

LOCK TABLES `tab_acessos` WRITE;
/*!40000 ALTER TABLE `tab_acessos` DISABLE KEYS */;
INSERT INTO `tab_acessos` VALUES ('1','ADMIN'),('2','Editar produto'),('3','Excluir produto'),('4','Adicionar produto'),('17','Editar cliente'),('18','Excluir cliente'),('19','Adicionar cliente'),('22','Editar venda'),('23','Excluir venda'),('24','Fazer venda'),('37','Editar fornecedor'),('38','Excluir fornecedor'),('39','Adicionar fornecedor');
/*!40000 ALTER TABLE `tab_acessos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_empresas_regime_trib`
--

DROP TABLE IF EXISTS `tab_empresas_regime_trib`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_empresas_regime_trib` (
  `id_Regime_trib` int(2) NOT NULL AUTO_INCREMENT,
  `descr_regime_trib` varchar(30) NOT NULL,
  `lim_receita_anual` double DEFAULT NULL,
  `lim_receita_trimestre` double DEFAULT NULL,
  `lim_receita_semestre` double DEFAULT NULL,
  `lim_receita_mes` double DEFAULT NULL,
  `cofins` double DEFAULT NULL COMMENT 'Contribuição para o Financiamento da Seguridade Social',
  `csll` double DEFAULT NULL COMMENT 'Contribuição Social Sobre Lucro Liquido',
  `cpp` double DEFAULT NULL COMMENT 'Contribuição Patronal Previdenciaria',
  `irpj` double DEFAULT NULL COMMENT 'Imposto de Renda Pessoa Juridica',
  `Pis_Pasep` double DEFAULT NULL COMMENT 'PIS-Programa de Integração Social / PASEP-Prog Form Patr Servidor Publico',
  `iss` double DEFAULT NULL COMMENT 'Imposto Sobre Serviço de Qualquer Natureza',
  `iof` double DEFAULT NULL COMMENT 'Imposto Sobre Operações de Credito',
  `issqn` double DEFAULT NULL COMMENT ' Imposto municipal sobre serviços de qualquer natureza',
  `icms` double DEFAULT NULL COMMENT ' Imposto sobre Circulação de Mercadorias e Prestação de Serviços',
  `ipi` double DEFAULT NULL COMMENT ' Imposto sobre Produtos Industrializados',
  `simples_nacional` double DEFAULT NULL COMMENT 'Aliquota Mensal ',
  `inss` double DEFAULT NULL COMMENT 'Instituto Nacional de Seguridade Social',
  `valor_descontar` double DEFAULT NULL COMMENT 'Valor a descontar do total recolhido',
  PRIMARY KEY (`id_Regime_trib`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_empresas_regime_trib`
--

LOCK TABLES `tab_empresas_regime_trib` WRITE;
/*!40000 ALTER TABLE `tab_empresas_regime_trib` DISABLE KEYS */;
INSERT INTO `tab_empresas_regime_trib` VALUES (1,'SIMPLES NACIONAL - FX 1',180000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL),(2,'LUCRO REAL',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'LUCRO PRESUMIDO',78000000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'SIMPLES NACIONAL - FX 2',360000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7.3,NULL,5940),(5,'MEI',81000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,NULL,NULL),(6,'SIMPLES NACIONA - FX - 3',720000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9.5,NULL,13860),(7,'SIMPLES NACIONAL - FX 4',1800000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10.7,NULL,22500),(8,'SIMPLES NACIONAL - FX 5',3600000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14.3,NULL,87300),(9,'SIMPLES NACIONAL - FX 6',4800000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,NULL,378000);
/*!40000 ALTER TABLE `tab_empresas_regime_trib` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_funcao`
--

DROP TABLE IF EXISTS `tab_funcao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_funcao` (
  `id_funcao` int(3) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`,`id_funcao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_funcao`
--

LOCK TABLES `tab_funcao` WRITE;
/*!40000 ALTER TABLE `tab_funcao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_funcao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_logs_login`
--

DROP TABLE IF EXISTS `tab_logs_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_logs_login` (
  `id_logs` int(11) NOT NULL AUTO_INCREMENT,
  `user_logs` varchar(100) NOT NULL,
  `id_empresa` varchar(6) DEFAULT NULL,
  `hora_log` datetime DEFAULT NULL,
  `acao_logs` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_logs`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_logs_login`
--

LOCK TABLES `tab_logs_login` WRITE;
/*!40000 ALTER TABLE `tab_logs_login` DISABLE KEYS */;
INSERT INTO `tab_logs_login` VALUES (1,'2022-10-22 17:45:31','867164',NULL,NULL),(2,'O usuário entrou no sistema em: ','867164',NULL,NULL),(3,'Lucas Penha Rodrigues','867164',NULL,NULL),(4,'Lucas Penha Rodrigues','867164','2022-10-22 18:28:28',NULL),(5,'Lucas Penha Rodrigues','867164','2022-10-22 18:32:13',NULL),(6,'Lucas Penha Rodrigues','867164','2022-10-22 23:20:20',NULL),(7,'Lucas Penha Rodrigues','867164','2022-10-23 11:00:31',NULL),(8,'Lucas Penha Rodrigues','867164','2022-10-23 11:01:03',NULL),(9,'Lucas Penha Rodrigues','867164','2022-10-23 11:05:42',NULL);
/*!40000 ALTER TABLE `tab_logs_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_status_pedido`
--

DROP TABLE IF EXISTS `tab_status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_status_pedido` (
  `id_empresa` int(11) NOT NULL,
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `descr_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_controle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_status_pedido`
--

LOCK TABLES `tab_status_pedido` WRITE;
/*!40000 ALTER TABLE `tab_status_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_tpmovi`
--

DROP TABLE IF EXISTS `tab_tpmovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_tpmovi` (
  `id_tpmovi` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_movimento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tpmovi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_tpmovi`
--

LOCK TABLES `tab_tpmovi` WRITE;
/*!40000 ALTER TABLE `tab_tpmovi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_tpmovi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tab_tppgto`
--

DROP TABLE IF EXISTS `tab_tppgto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tab_tppgto` (
  `id_tppgto` varchar(2) NOT NULL,
  `descr_pgto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tppgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tab_tppgto`
--

LOCK TABLES `tab_tppgto` WRITE;
/*!40000 ALTER TABLE `tab_tppgto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tab_tppgto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_caixa`
--

DROP TABLE IF EXISTS `tmp_caixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tmp_caixa` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_item` int(3) NOT NULL AUTO_INCREMENT,
  `cod_barras` varchar(13) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` varchar(4) NOT NULL,
  `pr_venda` double NOT NULL,
  `quantidade` double NOT NULL,
  `id_produto` int(11) NOT NULL,
  `pr_custo` double DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cod_grupo` varchar(4) DEFAULT NULL,
  `cod_subgrupo1` varchar(4) DEFAULT NULL,
  `cod_subgrupo2` varchar(4) DEFAULT NULL,
  `tp_movi` int(2) DEFAULT NULL COMMENT '01-VENDA / 02-SANGRIA / 03-CAIXA INICIAL / 04-CANCELADA / 05-FALTA / 06-OUTROS',
  `mesa` varchar(3) DEFAULT NULL,
  `mesa_fechada` int(1) DEFAULT NULL COMMENT '1-MESA ABERTA / 0 - MESA FECHADA',
  `despacho` varchar(15) DEFAULT NULL COMMENT '1-MESA / 2-BALCAO / 3-DEVILERY',
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `tipo_cliente` varchar(1) DEFAULT NULL,
  `id_controle` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_caixa`,`id_item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_caixa`
--

LOCK TABLES `tmp_caixa` WRITE;
/*!40000 ALTER TABLE `tmp_caixa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_caixa` ENABLE KEYS */;
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

-- Dump completed on 2022-10-23 11:18:55
