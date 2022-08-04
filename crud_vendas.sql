-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Ago-2022 às 16:25
-- Versão do servidor: 5.7.36
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_vendas`
--
CREATE DATABASE IF NOT EXISTS `crud_vendas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crud_vendas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_nota`
--

DROP TABLE IF EXISTS `itens_nota`;
CREATE TABLE IF NOT EXISTS `itens_nota` (
  `eNota` int(6) NOT NULL,
  `item` int(250) NOT NULL AUTO_INCREMENT,
  `quantidade` decimal(6,0) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `vr_unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`eNota`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_nota`
--

INSERT INTO `itens_nota` (`eNota`, `item`, `quantidade`, `descricao`, `vr_unit`) VALUES
(951236, 1, '2', 'teste10', '20.00'),
(759777, 1, '3', 'coca cola', '32.00'),
(111555, 1, '3', 'pepsi', '32.00'),
(895477, 1, '3', 'pepsi', '74.00'),
(444666, 1, '1', 'frango', '19.00'),
(110022, 1, '1', 'ZERO', '32.00'),
(759777, 2, '1', 'teste10', '5.00'),
(151860, 1, '2', 'arroz', '9.00'),
(741852, 1, '1', 'iphone', '3000.00'),
(455566, 1, '3', 'iphone', '2000.00'),
(741852, 2, '1', 'motorola', '2000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `eNota` int(6) NOT NULL,
  `dataVenda` date NOT NULL,
  `formaPagamento` varchar(20) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`eNota`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nota`
--

INSERT INTO `nota` (`eNota`, `dataVenda`, `formaPagamento`, `observacao`) VALUES
(151860, '2022-07-31', 'pix', 'TESTETESTE'),
(110022, '2022-07-31', 'pix', 'teste pastas'),
(741852, '2022-08-01', 'pix', ''),
(444666, '2022-07-31', 'pix', 'frango'),
(455566, '2022-08-01', 'crédito', 'TESTE FINAL'),
(951236, '2022-07-31', 'pix', ''),
(895477, '2022-07-31', 'crédito', 'teste5'),
(111555, '2022-07-31', 'crédito', 'chave: 08912089331'),
(759777, '2022-07-30', 'crédito', 'TESTEEEEE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(5, 'Larisse', '6562c5c1f33db6e05a082a88cddab5ea'),
(4, 'Lucas', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Penha', '01cfcd4f6b8770febfb40cb906715822'),
(7, 'Isabelle', 'a53c8cd09fb02ba13e56ba08309e70dc'),
(8, 'Lucas Penha', '698dc19d489c4e4db73e28a713eab07b'),
(9, 'Silva Rodrigues', 'aa1bf4646de67fd9086cf6c79007026c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
