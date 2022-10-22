-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Out-2022 às 14:43
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
-- Banco de dados: `crud-vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_clientes`
--

DROP TABLE IF EXISTS `cad_clientes`;
CREATE TABLE IF NOT EXISTS `cad_clientes` (
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

--
-- Extraindo dados da tabela `cad_clientes`
--

INSERT INTO `cad_clientes` (`id_cliente`, `id_empresa`, `nome`, `fone`, `endereco`, `cpf_cnpj`, `dta_ins_cli`, `usr_cli_id`, `tipo_cliente`, `bairro`, `cep`, `data_ult_compra`, `uf`, `cidade`, `profissão`, `rg`, `email`, `facebook`, `instagram`, `id_loja`, `data_nascimento`) VALUES
(1, 111111, 'lucas', '85987734479', 'ave central', '08912089331', '2022-09-26 22:48:22', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 867164, 'Isabelle Penha Rodrigues', NULL, NULL, NULL, '2022-09-27 21:13:37', '19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 867164, 'Luciano Sera', '85988905422', 'Av Central Leste, 170, Araturi, Caucaia, Ce', NULL, '2022-10-14 23:14:02', 'Lucas Penha Rodrigues', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 111111, 'lucas', '85987734479', 'avenida', '08912089331', '2022-09-28 22:37:12', 'Lucas Penha Rodrigues', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 867164, 'Larisse Guedes', '85987734479', 'Av Central Leste, 170, Araturi, Caucaia, Ce', NULL, '2022-10-14 22:59:27', 'Lucas Penha Rodrigues', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_compras`
--

DROP TABLE IF EXISTS `cad_compras`;
CREATE TABLE IF NOT EXISTS `cad_compras` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_empresas`
--

DROP TABLE IF EXISTS `cad_empresas`;
CREATE TABLE IF NOT EXISTS `cad_empresas` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `email_empresa` varchar(50) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `numero_empresa` varchar(13) DEFAULT NULL,
  `cnpj_cpf` varchar(14) DEFAULT NULL,
  `tipo_cliente` varchar(1) DEFAULT NULL COMMENT 'Se o cadastro é com 1-CNPJ ou 2-CPF',
  `plano_pagamento` char(2) DEFAULT NULL COMMENT 'Tipo de plano de Pgto - Pegar da tabela TAB_PLANOS_PGTO',
  `dt_cadastro` date DEFAULT NULL COMMENT 'Data de Inicio da Assinatura',
  `qtd_lojas` int(11) DEFAULT '1' COMMENT 'Quantidade de Lojas liberadas para o uso do sistema',
  `dias_carencia` int(11) DEFAULT NULL COMMENT 'Dias de carencia para o inicio da cobrança',
  `status` varchar(1) DEFAULT NULL COMMENT 'Status da Empresa: 1-CARENCIA / 2-ATIVA / 3-INADIMPLENTE / 4-SUSPENÇA / 5-ENCERRADA -> Tabela TAB_STATUS',
  `data_pgto` date DEFAULT NULL COMMENT 'Data do último pagamento - mensalidade do sistema',
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cad_empresas`
--

INSERT INTO `cad_empresas` (`id_empresa`, `email_empresa`, `nome_empresa`, `numero_empresa`, `cnpj_cpf`, `tipo_cliente`, `plano_pagamento`, `dt_cadastro`, `qtd_lojas`, `dias_carencia`, `status`, `data_pgto`) VALUES
(1, 'empresa@gmail.com', 'empresa', NULL, '12345678901234', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'emrer@gfgf.com', 'empresa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'lpsolution@outlook.com', 'LPSolution', '85987734479', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'polishop@outlook.com', 'polishop', NULL, '12345678901222', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'lucas@dsds.com.br', 'lucas enterprise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'empresa1@dfdf.cdd', 'empresa1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'isa@hotmail.com', 'isabelle empresa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'empresa2@dfd.com', 'empresa2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'luciano.serra@hotmail.com.br', 'lucas penha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_entregador`
--

DROP TABLE IF EXISTS `cad_entregador`;
CREATE TABLE IF NOT EXISTS `cad_entregador` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_fornecedor`
--

DROP TABLE IF EXISTS `cad_fornecedor`;
CREATE TABLE IF NOT EXISTS `cad_fornecedor` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_lojas`
--

DROP TABLE IF EXISTS `cad_lojas`;
CREATE TABLE IF NOT EXISTS `cad_lojas` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_produtos`
--

DROP TABLE IF EXISTS `cad_produtos`;
CREATE TABLE IF NOT EXISTS `cad_produtos` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_usuarios`
--

DROP TABLE IF EXISTS `cad_usuarios`;
CREATE TABLE IF NOT EXISTS `cad_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` varchar(6) NOT NULL,
  `cpf_cnpj` varchar(11) NOT NULL,
  `nome` varchar(50) CHARACTER SET latin1 NOT NULL,
  `data_nascimento` date NOT NULL,
  `numero_celular` varchar(13) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tipo_cliente` varchar(1) DEFAULT NULL COMMENT 'Se o Cliente é pessoa 1-Fisica ou 2- Juridica',
  `id_funcao` int(3) NOT NULL COMMENT 'Função do Usuário dentro da empresa',
  PRIMARY KEY (`id_empresa`,`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cad_usuarios`
--

INSERT INTO `cad_usuarios` (`id_usuario`, `id_empresa`, `cpf_cnpj`, `nome`, `data_nascimento`, `numero_celular`, `email`, `senha`, `tipo_cliente`, `id_funcao`) VALUES
(19, '867164', '08912089331', 'Lucas Penha Rodrigues', '2003-08-12', '85987734479', 'lucasrds17@outlook.com', '1ce9f12efd36b0fe0623c4f81ef24202', NULL, 0),
(16, '400399', '12345678901', 'luciano serra rodrigues', '1971-05-28', '85987734479', 'luciano@gmail.com', '12345678', NULL, 0),
(18, '124246', '01912089331', 'Luciano Serra Rodrigues', '2003-08-12', '85987734479', 'lucasrds@outlook.com', '1ce9f12efd36b0fe0623c4f81ef24202', NULL, 0),
(14, '627840', '06694223390', 'isabelle penha rodrigues', '1996-05-08', '85987991830', 'isabelle@outlook.com', '08051996', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_venda`
--

DROP TABLE IF EXISTS `cad_venda`;
CREATE TABLE IF NOT EXISTS `cad_venda` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_acessos`
--

DROP TABLE IF EXISTS `mov_acessos`;
CREATE TABLE IF NOT EXISTS `mov_acessos` (
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_opcao` varchar(4) NOT NULL,
  PRIMARY KEY (`id_empresa`,`id_usuario`,`id_opcao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_notas`
--

DROP TABLE IF EXISTS `mov_notas`;
CREATE TABLE IF NOT EXISTS `mov_notas` (
  `eNota` int(11) NOT NULL,
  `item` int(11) NOT NULL AUTO_INCREMENT,
  `cod_empresa` varchar(6) NOT NULL,
  `quantidade` decimal(6,0) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `vr_unit` decimal(10,2) NOT NULL,
  PRIMARY KEY (`eNota`,`item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mov_notas`
--

INSERT INTO `mov_notas` (`eNota`, `item`, `cod_empresa`, `quantidade`, `descricao`, `vr_unit`) VALUES
(951236, 1, '', '2', 'teste10', '20.00'),
(759777, 1, '', '3', 'coca cola', '32.00'),
(111555, 1, '', '3', 'pepsi', '32.00'),
(895477, 1, '', '3', 'pepsi', '74.00'),
(444666, 1, '', '1', 'frango', '19.00'),
(224466, 2, '', '6', 'biscoito', '38.00'),
(759777, 2, '', '1', 'teste10', '5.00'),
(151860, 1, '', '2', 'arroz', '9.00'),
(741852, 1, '', '1', 'iphone', '3000.00'),
(455566, 1, '', '3', 'iphone', '2000.00'),
(741852, 2, '', '1', 'motorola', '2000.00'),
(444666, 2, '', '5', 'ovo', '5.00'),
(555666, 2, '', '5', 'biscoito', '10.00'),
(777111, 1, '', '5', 'biscoito', '38.00'),
(785258, 1, '', '5', 'biscoito', '38.00'),
(111112, 1, '', '1', 'bolsa', '200.00'),
(111111, 2, '', '2', 'sapato', '200.00'),
(111111, 1, '', '1', 'tenis', '100.00'),
(111112, 2, '', '2', 'tenis', '490.00'),
(111112, 3, '', '1', 'bolsa', '200.00'),
(111112, 4, '', '2', 'tenis', '490.00'),
(111122, 1, '', '2', 'testes', '20.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_produtos`
--

DROP TABLE IF EXISTS `mov_produtos`;
CREATE TABLE IF NOT EXISTS `mov_produtos` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_status_pedido`
--

DROP TABLE IF EXISTS `mov_status_pedido`;
CREATE TABLE IF NOT EXISTS `mov_status_pedido` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_venda`
--

DROP TABLE IF EXISTS `mov_venda`;
CREATE TABLE IF NOT EXISTS `mov_venda` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_venda_avaliacao`
--

DROP TABLE IF EXISTS `mov_venda_avaliacao`;
CREATE TABLE IF NOT EXISTS `mov_venda_avaliacao` (
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `mov_venda_tppgto`
--

DROP TABLE IF EXISTS `mov_venda_tppgto`;
CREATE TABLE IF NOT EXISTS `mov_venda_tppgto` (
  `id_empresa` int(11) NOT NULL,
  `id_loja` varchar(2) NOT NULL,
  `id_caixa` varchar(2) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_tppgto` varchar(2) NOT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_loja`,`id_caixa`,`id_venda`,`id_tppgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_acessos`
--

DROP TABLE IF EXISTS `tab_acessos`;
CREATE TABLE IF NOT EXISTS `tab_acessos` (
  `id_opcao` varchar(4) NOT NULL,
  `opcao` varchar(30) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`,`id_opcao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Essa tabela serão gravadas as opções de menu do sistema que cada usuário terá acesso.';

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_empresas_regime_trib`
--

DROP TABLE IF EXISTS `tab_empresas_regime_trib`;
CREATE TABLE IF NOT EXISTS `tab_empresas_regime_trib` (
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

--
-- Extraindo dados da tabela `tab_empresas_regime_trib`
--

INSERT INTO `tab_empresas_regime_trib` (`id_Regime_trib`, `descr_regime_trib`, `lim_receita_anual`, `lim_receita_trimestre`, `lim_receita_semestre`, `lim_receita_mes`, `cofins`, `csll`, `cpp`, `irpj`, `Pis_Pasep`, `iss`, `iof`, `issqn`, `icms`, `ipi`, `simples_nacional`, `inss`, `valor_descontar`) VALUES
(1, 'SIMPLES NACIONAL - FX 1', 180000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL),
(2, 'LUCRO REAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'LUCRO PRESUMIDO', 78000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'SIMPLES NACIONAL - FX 2', 360000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.3, NULL, 5940),
(5, 'MEI', 81000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL),
(6, 'SIMPLES NACIONA - FX - 3', 720000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9.5, NULL, 13860),
(7, 'SIMPLES NACIONAL - FX 4', 1800000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10.7, NULL, 22500),
(8, 'SIMPLES NACIONAL - FX 5', 3600000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14.3, NULL, 87300),
(9, 'SIMPLES NACIONAL - FX 6', 4800000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, NULL, 378000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_funcao`
--

DROP TABLE IF EXISTS `tab_funcao`;
CREATE TABLE IF NOT EXISTS `tab_funcao` (
  `id_funcao` int(3) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_empresa`,`id_funcao`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_status_pedido`
--

DROP TABLE IF EXISTS `tab_status_pedido`;
CREATE TABLE IF NOT EXISTS `tab_status_pedido` (
  `id_empresa` int(11) NOT NULL,
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `descr_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`,`id_controle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_tpmovi`
--

DROP TABLE IF EXISTS `tab_tpmovi`;
CREATE TABLE IF NOT EXISTS `tab_tpmovi` (
  `id_tpmovi` int(2) NOT NULL AUTO_INCREMENT,
  `tipo_movimento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tpmovi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_tppgto`
--

DROP TABLE IF EXISTS `tab_tppgto`;
CREATE TABLE IF NOT EXISTS `tab_tppgto` (
  `id_tppgto` varchar(2) NOT NULL,
  `descr_pgto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tppgto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tmp_caixa`
--

DROP TABLE IF EXISTS `tmp_caixa`;
CREATE TABLE IF NOT EXISTS `tmp_caixa` (
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
