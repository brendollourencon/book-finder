-- MySQL dump 10.13  Distrib 5.7.12, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: livraria
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `cartoes`
--

DROP TABLE IF EXISTS `cartoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartoes` (
  `numero` int(16) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `codigo_seguranca` int(3) NOT NULL,
  `data_validade` varchar(4) NOT NULL,
  PRIMARY KEY (`numero`),
  UNIQUE KEY `numero_UNIQUE` (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartoes`
--

LOCK TABLES `cartoes` WRITE;
/*!40000 ALTER TABLE `cartoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cartoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cpf` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `orgao_emissor` varchar(45) NOT NULL,
  `passaporte` int(11) DEFAULT NULL,
  `nome_mae` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `preferencial` char(1) NOT NULL DEFAULT 'N' COMMENT 'S=Sim/N=Não',
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (11111111,402586958,'Brendol','123',123,'Mãe','brendol.lourencon@gmail.com','123','','A');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos_usuario`
--

DROP TABLE IF EXISTS `contatos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contatos_usuario` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_cnpj` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT 'E=Editoras / C=Clientes',
  PRIMARY KEY (`id_contato`),
  KEY `fk_cpf_cnpj_idx` (`cpf_cnpj`),
  CONSTRAINT `fk_cpf_cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos_usuario`
--

LOCK TABLES `contatos_usuario` WRITE;
/*!40000 ALTER TABLE `contatos_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `contatos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editoras`
--

DROP TABLE IF EXISTS `editoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editoras` (
  `cnpj` int(14) NOT NULL,
  `razao_social` varchar(45) NOT NULL,
  `descricao_estadual` int(11) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`cnpj`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoras`
--

LOCK TABLES `editoras` WRITE;
/*!40000 ALTER TABLE `editoras` DISABLE KEYS */;
/*!40000 ALTER TABLE `editoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` char(2) DEFAULT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `primeiro_endereco` char(1) NOT NULL,
  `status` char(1) NOT NULL,
  `cpf_cnpj` int(11) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `fk_cpf_idx` (`cpf_cnpj`),
  CONSTRAINT `cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cpf` FOREIGN KEY (`cpf_cnpj`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_pedidos`
--

DROP TABLE IF EXISTS `itens_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_pedidos` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `fk_id_pedido_idx` (`id_pedido`),
  KEY `fk_id_produto_idx` (`id_produto`),
  CONSTRAINT `id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_pedidos`
--

LOCK TABLES `itens_pedidos` WRITE;
/*!40000 ALTER TABLE `itens_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias`
--

DROP TABLE IF EXISTS `midias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midias` (
  `id_midia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_midia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias`
--

LOCK TABLES `midias` WRITE;
/*!40000 ALTER TABLE `midias` DISABLE KEYS */;
/*!40000 ALTER TABLE `midias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `midias_produtos`
--

DROP TABLE IF EXISTS `midias_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `midias_produtos` (
  `id_midias_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `id_midia` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_midias_produtos`),
  KEY `fk_id_midia_idx` (`id_midia`),
  KEY `fk_id_produto_idx` (`id_produto`),
  CONSTRAINT `fk_id_midia` FOREIGN KEY (`id_midia`) REFERENCES `midias` (`id_midia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `midias_produtos`
--

LOCK TABLES `midias_produtos` WRITE;
/*!40000 ALTER TABLE `midias_produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `midias_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `data_entrega` datetime NOT NULL,
  `tipo_pagamento` varchar(45) NOT NULL,
  `status` char(2) NOT NULL COMMENT 'P=Pendente\nPG=Pago\nC=Cancelado',
  PRIMARY KEY (`id_pedido`),
  KEY `fk_id_cliente_idx` (`id_cliente`),
  CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(7,2) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descricao` text NOT NULL,
  `meta_titulo` varchar(60) NOT NULL,
  `meta_descricao` varchar(170) DEFAULT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,100.00,'Produto de teste','descrição de teste','meta titulo de teste','meta descrição de teste','A'),(2,150.00,'Harry Pother','Livro do Harry','Livro do Harry','Teste','A');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefones`
--

DROP TABLE IF EXISTS `telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefones` (
  `id_telefone` int(11) NOT NULL AUTO_INCREMENT,
  `cpf_cnpj` int(11) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_telefone`),
  KEY `fk_cpf_cnpj_idx` (`cpf_cnpj`),
  CONSTRAINT `fk_cnpj` FOREIGN KEY (`cpf_cnpj`) REFERENCES `editoras` (`cnpj`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cpf` FOREIGN KEY (`cpf_cnpj`) REFERENCES `clientes` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefones`
--

LOCK TABLES `telefones` WRITE;
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-22 17:16:35
