-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jan-2016 às 16:00
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `negocios`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `daily_productivity`
--

CREATE TABLE IF NOT EXISTS `daily_productivity` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `person_id` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL COMMENT 'valor',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `commission_percent` decimal(10,0) NOT NULL COMMENT 'percentual de comissao',
  `companys_revenue` decimal(10,2) NOT NULL COMMENT 'receita da coop',
  `daily_productivity_status_id` int(11) NOT NULL,
  `buyer_document` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'CPF ou CNPJ do comprador',
  `buyer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'nome do comprador',
  `seller_id` int(11) NOT NULL COMMENT 'vendedor',
  `operator_id` int(11) NOT NULL COMMENT 'operador',
  `user_id` int(11) NOT NULL COMMENT 'usuário atual',
  `date` date NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `daily_productivity_status_id` (`daily_productivity_status_id`),
  KEY `seller_id` (`seller_id`),
  KEY `operator_id` (`operator_id`),
  KEY `location_id` (`location_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Users daily productivity' AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `daily_productivity`
--

INSERT INTO `daily_productivity` (`id`, `product_id`, `location_id`, `person_id`, `value`, `quantity`, `commission_percent`, `companys_revenue`, `daily_productivity_status_id`, `buyer_document`, `buyer_name`, `seller_id`, `operator_id`, `user_id`, `date`, `created`, `updated`) VALUES
(4, 9, 5, 1, '1234.23', 0, '30', '666.00', 1, '11.111.111/1111-11', '1111111111111111111', 191, 189, 1, '2015-12-18', '2015-12-04', '2015-12-04'),
(5, 17, 3, 1, '2.22', 0, '15', '158.00', 1, '22.222.222/2222-22', 'outro 2', 319, 299, 1, '2015-12-06', '2015-12-04', '2015-12-04'),
(6, 21, 4, 1, '89.63', 0, '28', '98.00', 1, '98.765.498/7654-65', 'Seg Viagem', 212, 209, 1, '2015-12-12', '2015-12-04', '2015-12-04'),
(7, 22, 3, 1, '98.74', 0, '27', '258.00', 2, '98.745.698/7456-98', '987456987', 184, 234, 2, '2015-12-18', '2015-12-05', '2015-12-05'),
(8, 31, 3, 1, '98.74', 0, '29', '78.00', 1, '78.978.798/7978-__', 'zruela', 178, 224, 2, '2015-12-18', '2015-12-05', '2015-12-05'),
(9, 16, 1, 1, '2400.00', 0, '34', '666.00', 1, '12.368.795/6441-31', 'Teste', 183, 336, 3, '2015-12-06', '2015-12-06', '2015-12-06'),
(10, 14, 2, 1, '7.89', 0, '19', '4.00', 1, '78.978.978/9798-77', '7987897987', 325, 242, 2, '2015-12-11', '2015-12-06', '2015-12-06'),
(11, 14, 1, 1, '11.11', 0, '22', '107.00', 1, '11.111.111/1111-11', 'teste 1 before save', 224, 299, 2, '2015-12-10', '2015-12-06', '2015-12-06'),
(12, 14, 3, 1, '99.99', 0, '12', '777.00', 1, '99.999.999/9999-99', '999999999', 294, 257, 2, '2015-12-10', '2015-12-06', '2015-12-06'),
(13, 14, 2, 1, '79.87', 0, '10', '888.00', 1, '78.979.879/8798-79', '787998', 175, 174, 2, '2015-12-10', '2015-12-06', '2015-12-06'),
(14, 14, 2, 1, '0.00', 0, '10', '78.00', 1, '444.4__.___-__', '444', 184, 189, 2, '2015-12-03', '2015-12-06', '2015-12-06'),
(15, 14, 3, 1, '0.00', 0, '10', '0.00', 1, '78.989.789/7897-89', '789789789789', 189, 191, 2, '2015-12-09', '2015-12-06', '2015-12-06'),
(16, 15, 2, 2, '0.00', 0, '20', '0.00', 1, '34.343.434/3434-3_', '34343', 191, 189, 2, '2015-12-10', '2015-12-06', '2015-12-06'),
(17, 15, 2, 1, '0.00', 0, '22', '4.30', 1, '55.555.555/5555-55', '5555555', 189, 189, 2, '2015-12-09', '2015-12-06', '2015-12-06'),
(18, 14, 2, 1, '0.00', 0, '13', '4.00', 2, '324.232.___-__', 'ewewew', 189, 184, 2, '2015-12-03', '2015-12-06', '2015-12-06'),
(19, 15, 2, 1, '0.00', 0, '24', '0.00', 1, '34.534.534/5223-45', '53452354', 189, 189, 2, '2015-12-10', '2015-12-06', '2015-12-06'),
(20, 16, 3, 1, '0.00', 0, '21', '0.00', 2, '454.354.54_-', '543543', 191, 190, 2, '2015-12-02', '2015-12-06', '2015-12-06'),
(21, 14, 2, 1, '0.00', 0, '15', '0.00', 1, '35.234.534/5345-34', '54523', 184, 189, 2, '2015-12-03', '2015-12-06', '2015-12-06'),
(22, 14, 2, 1, '55.55', 0, '21', '0.00', 1, '55.555.555/5555-55', '5555555555555555', 190, 189, 2, '2015-12-02', '2015-12-06', '2015-12-06'),
(23, 15, 4, 1, '9789.87', 0, '10', '146.00', 1, '98.798.798/7987-89', '798', 187, 191, 2, '2015-12-01', '2015-12-06', '2015-12-06'),
(24, 16, 2, 1, '979.87', 0, '10', '0.00', 1, '787.897.___-__', '897987', 174, 174, 2, '2015-12-06', '2015-12-06', '2015-12-06'),
(25, 18, 6, 2, '78.97', 0, '18', '45.00', 1, '78.978.978/9789-78', '789789789', 189, 191, 2, '2015-12-19', '2015-12-07', '2015-12-07'),
(26, 26, 1, 1, '2500.00', 0, '20', '666.00', 1, '12.345.689/7897-98', 'Empresa XYZ', 301, 193, 301, '2015-12-15', '2015-12-07', '2015-12-07'),
(27, 30, 1, 1, '95000.00', 0, '20', '58.00', 2, '068.180.406-86', 'Fulano', 301, 195, 301, '2015-12-20', '2015-12-07', '2015-12-07'),
(28, 14, 3, 2, '34.24', 0, '15', '68.00', 1, '23.432.423/4234-23', '4234324234', 193, 192, 3, '2015-12-11', '2015-12-09', '2015-12-09'),
(29, 21, 3, 1, '44.44', 0, '15', '8888.00', 1, '44.444.444/4444-44', '4444444444444444', 190, 193, 3, '2015-12-17', '2015-12-09', '2015-12-09'),
(30, 29, 2, 2, '9999.99', 0, '24', '19998.00', 1, '99.999.999/9999-9_', '999999999999999', 3, 194, 3, '2015-12-02', '2015-12-09', '2015-12-09'),
(31, 17, 2, 2, '128.00', 0, '15', '256.00', 1, '99.999.999/9999-99', '999999999999', 225, 233, 3, '2015-12-09', '2015-12-09', '2015-12-09'),
(32, 15, 2, 1, '78.99', 0, '24', '666.00', 1, '78.978.979/8789-78', 'uiuiui', 235, 249, 3, '2015-12-17', '2015-12-10', '2015-12-10'),
(33, 15, 3, 1, '9.87', 0, '29', '666.00', 1, '789.456.789-65', 'teeee', 3, 325, 3, '2015-12-11', '2015-12-10', '2015-12-10'),
(34, 15, 2, 2, '120.00', 0, '24', '0.00', 1, '068.180.406-83', '120x2=240 e comissao 24', 301, 327, 3, '2015-12-11', '2015-12-11', '2015-12-11'),
(35, 15, 3, 1, '21.00', 0, '21', '10.00', 1, '78.978.978/9789-78', '21*2', 299, 211, 3, '2015-12-18', '2015-12-11', '2015-12-11'),
(36, 16, 3, 1, '52.00', 0, '23', '0.00', 1, '789.456.789-14', '52x2', 183, 181, 3, '2015-12-18', '2015-12-11', '2015-12-11'),
(37, 15, 5, 2, '22.00', 0, '22', '0.00', 1, '22.222.222/2222-22', '22x2', 319, 325, 3, '2015-12-08', '2015-12-11', '2015-12-11'),
(38, 15, 1, 1, '22.00', 0, '21', '0.00', 1, '77.777.777/7777-77', '7777777777777777', 194, 192, 3, '2015-12-12', '2015-12-11', '2015-12-11'),
(39, 15, 4, 1, '55.00', 0, '25', '10.00', 1, '55_.___.___-', '5', 194, 192, 3, '2015-12-02', '2015-12-11', '2015-12-11'),
(40, 15, 2, 1, '99.00', 0, '27', '10.00', 1, '78.979.878/7978-99', '77', 325, 325, 3, '2015-12-05', '2015-12-11', '2015-12-11'),
(41, 15, 5, 2, '78.00', 0, '22', '10.00', 1, '33.333.333/3333-33', 'paulo', 294, 295, 3, '2015-12-02', '2015-12-11', '2015-12-11'),
(42, 15, 2, 1, '34.00', 0, '22', '0.00', 1, '33.333.333/3333-33', '333', 240, 265, 3, '2015-12-11', '2015-12-11', '2015-12-11'),
(43, 15, 2, 1, '789.00', 0, '25', '0.00', 1, '78.979.879/8797-97', 'teste', 298, 223, 192, '2015-12-10', '2015-12-11', '2015-12-11'),
(44, 15, 3, 1, '50.00', 0, '24', '0.00', 1, '50.505.050/5050-50', '50x2', 325, 235, 203, '2015-12-12', '2015-12-11', '2015-12-11'),
(45, 15, 2, 1, '23.00', 0, '23', '23.00', 1, '232.323.232-32', '23', 181, 257, 203, '2015-12-12', '2015-12-11', '2015-12-11'),
(46, 15, 2, 1, '25.00', 0, '25', '50.00', 1, '25.252.525/2525-25', '25*2', 271, 267, 203, '2015-12-12', '2015-12-11', '2015-12-11'),
(47, 15, 3, 1, '22.00', 0, '22', '484.00', 1, '22.222.222/2222-22', '22*22', 257, 256, 203, '2015-12-09', '2015-12-11', '2015-12-11'),
(48, 15, 4, 1, '45.00', 0, '25', '11.25', 1, '454.545.454-54', '45*25/100', 257, 275, 203, '2015-12-12', '2015-12-11', '2015-12-11'),
(49, 15, 20, 1, '1250.00', 0, '24', '300.00', 1, '068.180.406-83', '1250*24/100', 257, 234, 203, '2015-12-13', '2015-12-11', '2015-12-11'),
(50, 15, 3, 1, '29000.00', 0, '30', '8700.00', 1, '125.478.965-87', 'Nome 29000*30/100', 294, 218, 294, '2015-12-19', '2015-12-12', '2015-12-12'),
(51, 15, 2, 1, '45.00', 0, '10', '4.50', 1, '454.545.454-54', '45*10/100?', 257, 235, 294, '2015-12-10', '2015-12-12', '2015-12-12'),
(52, 18, 6, 2, '50000.00', 0, '40', '20000.00', 1, '98.989.898/9898-98', '50000*40/100', 319, 294, 294, '2015-12-09', '2015-12-12', '2015-12-12'),
(53, 29, 1, 1, '4000.00', 0, '4', '160.00', 1, '454.545.454-54', '4000*3,5/100', 296, 294, 294, '2015-12-10', '2015-12-12', '2015-12-12'),
(54, 26, 3, 2, '5000.00', 0, '35', '1750.00', 1, '50.000.500/0000-00', '5000*35/100', 294, 218, 294, '2015-12-25', '2015-12-12', '2015-12-12'),
(55, 15, 1, 1, '5500.00', 0, '30', '1650.00', 1, '55.555.555/5555-55', '5500*30/100', 319, 271, 294, '2015-12-20', '2015-12-13', '2015-12-13'),
(56, 15, 1, 1, '500.00', 0, '40', '200.00', 1, '545.454.545-45', '500*40/100', 183, 195, 3, '2015-12-20', '2015-12-21', '2015-12-21'),
(57, 14, 3, 1, '25.00', 0, '16', '4.00', 1, '55.555.555/5555-55', '25*16/100', 183, 183, 3, '2015-12-18', '2015-12-21', '2015-12-21'),
(58, 14, 1, 1, '25.00', 0, '16', '4.00', 1, '77.777.777/7777-77', '25,00*16/100', 183, 183, 3, '2015-12-17', '2015-12-21', '2015-12-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `daily_productivity_status`
--

CREATE TABLE IF NOT EXISTS `daily_productivity_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Status messages for daily_productivity' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `daily_productivity_status`
--

INSERT INTO `daily_productivity_status` (`id`, `name`, `desc`, `is_active`) VALUES
(1, 'Pendente', '', 1),
(2, 'Efetivado', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Company locations' AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `location`
--

INSERT INTO `location` (`id`, `shortname`, `fullname`, `is_active`) VALUES
(1, '00', 'Agencia Sede', 1),
(2, '02', 'São Felix de Minas', 1),
(3, '03', 'Frei Inocencio', 1),
(4, '04', 'Itabirinha', 1),
(5, '05', 'Jampruca', 1),
(6, '06', 'Pescador', 1),
(7, '07', 'Marilac', 1),
(8, '08', 'Nova Belem', 0),
(9, '09', 'Mantena', 1),
(10, '10', 'Fernandes Tourinho', 1),
(11, '11', 'Santa Efigênia ', 1),
(12, '12', 'São Geraldo da Piedade', 0),
(13, '13', 'Divinolandia', 1),
(14, '14', 'Sardoá', 1),
(15, '15', 'Divino das Laranjeiras', 1),
(16, '16', 'Capitão Andrade', 1),
(17, '17', 'Virginopolis', 1),
(18, '18', 'Vargem Grande', 1),
(19, '19', 'Perol', 1),
(20, '20', 'JK', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='person type' AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `person`
--

INSERT INTO `person` (`id`, `name`, `is_active`) VALUES
(1, 'PF', 1),
(2, 'PJ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `min_value` float NOT NULL DEFAULT '0',
  `max_value` float NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Company products' AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `product`
--

INSERT INTO `product` (`id`, `parent_id`, `name`, `description`, `min_value`, `max_value`, `is_active`) VALUES
(9, NULL, 'SEGUROS', '', 0, 0, 1),
(10, NULL, 'CONSORCIO', '', 0, 0, 1),
(11, NULL, 'DOMICILIO BANCÁRIO', '', 0, 0, 1),
(12, NULL, 'COBRANÇA BANCÁRIA', '', 0, 0, 1),
(13, NULL, 'CRÉDITO CONSIGNADO', '', 0, 0, 1),
(14, 9, 'Auto', '', 10, 25, 1),
(15, 9, 'Residencial Comum', '', 10, 40, 1),
(16, 9, 'Residencial Simplificado', '', 30, 30, 1),
(17, 9, 'Empresarial Simplificado', '', 20, 20, 1),
(18, 9, 'Empresarial Comum', '', 20, 40, 1),
(19, 9, 'Vida Apolice', '', 40, 40, 1),
(20, 9, 'Vida Mulher', '', 35, 35, 1),
(21, 9, 'Viagem', '', 35, 35, 1),
(22, 9, 'Passageiro ', '', 40, 40, 1),
(23, 9, 'AP Não Nominado', '', 40, 40, 1),
(24, 9, 'Estagiario ', '', 40, 40, 1),
(25, 9, 'Vida Individual', '', 35, 35, 1),
(26, 9, 'Vida Empresarial', '', 35, 35, 1),
(27, 9, 'Vida Empresarial Uniforme', '', 30, 30, 1),
(28, 10, 'Auto', '', 3.5, 3.5, 1),
(29, 10, 'Moto', '', 3.5, 3.5, 1),
(30, 10, 'Imovel', '', 3.5, 3.5, 1),
(31, 10, 'Servicos', '', 3.5, 3.5, 1),
(32, 10, 'Equipamentos', '', 3.5, 3.5, 1),
(33, 11, 'Cielo', '', 0, 0, 1),
(34, 11, 'Redecard', '', 0, 0, 1),
(35, 11, 'Sipag', '', 0, 0, 1),
(36, 12, 'Módulo Cedente', '', 0, 0, 1),
(37, 13, 'INSS', '', 10, 10, 1),
(38, 13, 'CDL', '', 10, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=176 ;

--
-- Extraindo dados da tabela `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `created_at`, `updated_at`, `full_name`, `avatar`) VALUES
(1, 1, '2015-11-21 20:58:48', NULL, 'the one', 'default.png'),
(2, 2, '2015-11-23 02:21:53', '2015-11-28 03:46:07', 'GUSTAVO GONCALVES DE ANDRADE', '00002.jpg'),
(3, 3, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'LAMARQUIA KEYROLLI DA SILVA', '00003.jpg'),
(4, 344, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'Estagiaria', 'default.png'),
(5, 188, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'ANA LUISA GONCALVES DE SOUSA', '00188.jpg'),
(6, 203, '2015-12-07 02:04:17', '2015-12-07 19:51:28', 'CARLOS HENRIQUE RODRIGUES LEITE', '00203.jpg'),
(21, 187, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'ANA INES DO CARMO SANTOS', '00021.jpg'),
(22, 189, '2015-12-22 02:00:00', '2015-12-07 19:32:44', 'ANDERSON SILVA ALVES', '00189.jpg'),
(23, 190, '2015-12-07 02:04:17', '2015-12-07 19:34:04', 'ANDRE LUIZ DE OLIVEIRA LEMOS', 'default.png'),
(24, 191, '2015-12-07 19:34:04', '2015-12-07 19:42:49', 'ANDREIA DE MOURA', 'default.png'),
(25, 192, '2015-12-07 19:34:04', '2015-12-07 19:41:50', 'ANTONIO SALVINO VIEIRA JUNIOR', '00192.jpg'),
(26, 193, '2015-12-07 19:34:04', '2015-12-07 19:45:09', 'BARBARA FERNANDES TRAVAGLIA MENDES', 'default.png'),
(27, 194, '2015-12-07 19:34:04', '2015-12-07 19:45:52', 'BERENICE FERNANDES PINHEIRO', 'default.png'),
(28, 195, '2015-12-07 19:34:04', '2015-12-07 19:46:27', 'BIANCA DARE MONTEIRO DE OLIVEIRA COSTA', 'default.png'),
(29, 196, '2015-12-07 19:34:04', '2015-12-07 19:46:56', 'BRUNA LIMA CARDOSO', 'default.png'),
(30, 197, '2015-12-07 19:34:04', '2015-12-07 19:48:07', 'BRUNA TEIXEIRA DE SOUZA', 'default.png'),
(31, 198, '2015-12-07 19:34:04', '2015-12-07 19:47:38', 'BRUNO DUTRA FONTES', 'default.png'),
(32, 199, '2015-12-07 19:34:04', '2015-12-07 19:50:01', 'CAIO HENRIQUE PEREIRA CUNHA', 'default.png'),
(33, 200, '2015-12-07 19:34:04', '2015-12-07 19:50:34', 'CAMILA ELIANA DUARTE PEREIRA', 'default.png'),
(34, 201, '2015-12-07 19:34:04', '2015-12-07 19:52:20', 'CAMILA RODRIGUES NALON', 'default.png'),
(35, 202, '2015-12-07 02:04:17', '2015-12-07 19:51:02', 'CAREN CRISTINA SOUZA MACIEL', 'default.png'),
(36, 204, '2015-12-07 19:32:44', '2015-12-07 19:53:40', 'CARMEN CRISTINA LOBO COSTA', 'default.png'),
(37, 205, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CELSO MOL MARIANO JUNIOR', '00037.jpg'),
(38, 206, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CLAUDILENE FERREIRA PIRES MAGALHAES', 'default.png'),
(39, 207, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CLAUDIO CONSTANTINO MOREIRA AGUILAR', 'default.png'),
(40, 208, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CRISTIANE SILVA CRUZ', 'default.png'),
(41, 209, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CRISTIANNE MARIA DE ASSUMPCAO', 'default.png'),
(42, 210, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'CRISTINE DE OLIVEIRA ALVES', 'default.png'),
(43, 211, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'DAIANA CRISTINA FERREIRA GUIMARAES', 'default.png'),
(44, 212, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'DALTON JOSE SOARES JUNIOR', '00044.jpg'),
(45, 213, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'DANILO MOURÃO DE MIRANDA ROCHA', '00213.jpg'),
(46, 214, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'DAYANE SOUZA FERREIRA', 'default.png'),
(47, 215, '2015-12-07 19:34:04', '2015-12-07 02:04:17', 'DEBORA GANGA RIBEIRO', 'default.png'),
(48, 216, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'DIOGO DA SILVA SILVEIRA DUARTE', 'default.png'),
(49, 217, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'EDIANE CLAUDIO DE SOUSA CONRADO', 'default.png'),
(50, 218, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'EDILENE AVELINO CERQUEIRA', 'default.png'),
(51, 219, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'ELLEN FLAVIA PIMENTEL ANICETO', 'default.png'),
(52, 220, '2015-12-22 02:00:00', '2015-12-22 02:00:00', 'EMILIA VALERIA PEREIRA CAMPOS', 'default.png'),
(53, 221, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'ERIQUE MORAIS DE BARROS', 'default.png'),
(54, 222, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'EURICO FRANCISCO CORREA', '00222.jpg'),
(55, 223, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'EVELYN ALINE FERNANDES', 'default.png'),
(56, 224, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDA DOS ANJOS COSTA', '00224.jpg'),
(57, 225, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDA DOS SANTOS SOUSA ARAUJO', '00225.jpg'),
(58, 226, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDA SATHLER DE OLIVEIRA MACHADO', 'default.png'),
(59, 227, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDO EMILY DA SILVA', 'default.png'),
(60, 228, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDO LUCIANO ARAUJO', 'default.png'),
(61, 229, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FERNANDO LUIZ MONTEIRO', 'default.png'),
(62, 230, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FILIPE FERREIRA DE ALMEIDA PEREIRA', '00230.jpg'),
(63, 231, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FLAVIA RENATA MONERAT FRANCO', 'default.png'),
(64, 232, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'FRANCISCO ANTUNES JUNIOR', 'default.png'),
(65, 233, '2015-12-07 02:04:17', '2015-12-07 02:04:17', '???', 'default.png'),
(66, 234, '2015-12-07 19:32:44', '2015-12-07 19:32:44', 'FREDERICO SILVA SANTO', 'default.png'),
(67, 235, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GEORDANIA S PEREIRA DA SILVA', 'default.png'),
(68, 236, '2015-12-07 19:34:04', '2015-12-07 19:34:04', '???', 'default.png'),
(69, 237, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GERALDO HERMOGENES DE CARVALHO', 'default.png'),
(70, 238, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GRAZIELLA OGGIONI SILVA GONZAGA', 'default.png'),
(71, 239, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GUILHERME CARREIRO LEITE', 'default.png'),
(72, 240, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GUILHERME FERRAZ STAUFFER', '00240.jpg'),
(73, 241, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'GUSTAVO MARCELINO RODRIGUES', 'default.png'),
(74, 242, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'HAYSON RENAN DA SILVA', 'default.png'),
(75, 243, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'HELLEN CRISTIAN LOURENCO CARDOZO', 'default.png'),
(76, 244, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'HELLON MARCOS DE SOUZA MIRANDA', 'default.png'),
(77, 245, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'IGOR JOSE SOARES', 'default.png'),
(78, 246, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'IGOR MARCAL DE OLIVEIRA', 'default.png'),
(79, 247, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'ISAAC TEIXEIRA MATOS', 'default.png'),
(80, 248, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'ISLANE BATISTA DE OLIVEIRA', 'default.png'),
(81, 249, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'JACIANE ALMEIDA CAMPOS', 'default.png'),
(82, 250, '2015-12-22 02:00:00', '2015-12-22 02:00:00', 'JAYNE DIAS MACHADO', '00250.jpg'),
(83, 251, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'JESSYCA ROCHA PASCOAL', 'default.png'),
(84, 252, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'JOSANNA SANTOS XAVIER', 'default.png'),
(85, 253, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'JOSÉ GERALDO PEDRA SÁ', 'default.png'),
(86, 254, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'JOSE VELOSO DO CARMO', 'default.png'),
(87, 255, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'JOSELMA MARIA TEIXEIRA', '00255.jpg'),
(88, 256, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'JULIANA RODRIGUES MARTINS', '00256.jpg'),
(89, 257, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'KARLA CRISTINA CUNHA MAFRA', 'default.png'),
(90, 258, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'KELEN MENDES VORIA', 'default.png'),
(91, 259, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'KELLY CRISTINA RODRIGUES MACIEL', 'default.png'),
(92, 260, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LAISLA MARQUES PIMENTA', 'default.png'),
(93, 261, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LARISSA RODRIGUES MENEZES', 'default.png'),
(94, 262, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LARISSA SANTANA FERREIRA', 'default.png'),
(95, 263, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'LARYSSE LOPES ALMEIDA', 'default.png'),
(96, 264, '2015-12-07 19:32:44', '2015-12-07 19:32:44', 'LEONARDO CESAR DE SOUZA', 'default.png'),
(97, 265, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LIDIANE PEREIRA DIAS', 'default.png'),
(98, 266, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LORRAYNE PEREIRA DE SOUSA', '00266.jpg'),
(99, 267, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LUCIANA PINTO VIEIRA', 'default.png'),
(100, 268, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LUIZ ANTONIO PEREIRA JUNIOR', 'default.png'),
(101, 269, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LUMA GONÇALVES DE BRITO', '00269.jpg'),
(102, 270, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'LUYGI CARDOSO MORETE', 'default.png'),
(103, 271, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MARCELO CHAIA SALGADO', 'default.png'),
(104, 272, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MARCELO MARTINS SAMPAIO', 'default.png'),
(105, 273, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MARCO ANTONIO FRANCO', '00273.jpg'),
(106, 274, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MARCO ANTONIO MARTINS DA ROCHA', 'default.png'),
(107, 275, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MARCUS VINICIUS GOMES', 'default.png'),
(108, 276, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'MARIA DO CARMO COSTA MAIA', 'default.png'),
(109, 277, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'MARIA GERALDA DE ARAÚJO', 'default.png'),
(110, 278, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'MARIA LEIDIANA DE OLIVEIRA', 'default.png'),
(111, 279, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'MARINA PEREIRA RODRIGUES', 'default.png'),
(112, 280, '2015-12-22 02:00:00', '2015-12-22 02:00:00', 'MARINA TEREZA DE SOUZA CUNHA', 'default.png'),
(113, 281, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'MARLENE TEODORA FERNANDES', 'default.png'),
(114, 282, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MATHEUS COELHO SANTOS	', 'default.png'),
(115, 283, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MATHEUS FREITAS RIBEIRO', 'default.png'),
(116, 284, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MAURO HENRIQUE AZEVEDO NEVES', 'default.png'),
(117, 285, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MELANY MARQUES BARBOSA', 'default.png'),
(118, 286, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MELINA FERREIRA GLORIA', 'default.png'),
(119, 287, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'MIGUEL ESTEVES JUNIOR', 'default.png'),
(120, 288, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'NAIR JULIANA GONCALVES', 'default.png'),
(121, 289, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'NATALIA ROCHA ARAUJO', 'default.png'),
(122, 290, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'NAYARA SIQUEIRA RAMOS', 'default.png'),
(123, 291, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'NICOLINA MARTINS BARBOSA', 'default.png'),
(124, 292, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'NUBIA SILVEIRA MEDEIROS', '00292.jpg'),
(125, 293, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'OTAVIO PORTUGAL DE ALBUQUERQUE', 'default.png'),
(126, 294, '2015-12-07 19:32:44', '2015-12-07 19:32:44', 'PABLO MACHADO ROCHA', 'default.png'),
(127, 295, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'PAULA ROBERTO', 'default.png'),
(128, 296, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'PAULO LOPES DE SA', '00296.jpg'),
(129, 297, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'PRICILA ALVES DOS SANTOS', 'default.png'),
(130, 298, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'PRISCILLA GUALBERTA ANICETO DIAS', 'default.png'),
(131, 299, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RAFAEL OLIVEIRA DUTRA', 'default.png'),
(132, 300, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RAIFA BORBOREMA GOMES', '00300.jpg'),
(133, 301, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RANIEL GIOVANI FERREIRA CURTO', '00133.jpg'),
(134, 302, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RAQUEL BRUM PENA DE MIRANDA', '00302.jpg'),
(135, 303, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RAQUEL GOMES MARQUES LEITE', 'default.png'),
(136, 304, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RENATA ALVES DE ARAUJO', 'default.png'),
(137, 305, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RENATA CARVALHO LINHARES', 'default.png'),
(138, 306, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'RENATA DE PAULA BASTOS', 'default.png'),
(139, 307, '2015-11-28 19:54:11', '2015-11-28 19:54:11', 'RENATO CAMPOS DUARTE', 'default.png'),
(140, 308, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'RENATO FERREIRA DE OLIVEIRA', 'default.png'),
(141, 309, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'RICARDO RIGAMONTI CRUZ', 'default.png'),
(142, 310, '2015-12-22 02:00:00', '2015-12-22 02:00:00', 'ROBSON DE ALMEIDA DA SILVA', 'default.png'),
(143, 311, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'RODRIGO NUNES DE AQUINO', 'default.png'),
(144, 312, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RODRIGO PEREIRA SENA', 'default.png'),
(145, 313, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'ROGE MILLAR DE SOUSA MIRANDA', 'default.png'),
(146, 314, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'ROMEU MATTAR NETO', 'default.png'),
(147, 315, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'ROMULO RODRIGUES OLIVEIRA', 'default.png'),
(148, 316, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'ROMULO RODRIGUES PIMENTA', 'default.png'),
(149, 317, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'RONIE ALVES DOS SANTOS', 'default.png'),
(150, 318, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'ROSILENE MARCIA PEREIRA', 'default.png'),
(151, 319, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'SABRINA LUCAS DE OLIVEIRA', '00151.jpg'),
(152, 320, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'SAMIR MARINHO DAGNONI	', '00320.jpg'),
(153, 321, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'SHAYENE DUARTE SILVA', 'default.png'),
(154, 322, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'SILAS DIAS COSTA JUNIOR	', 'default.png'),
(155, 323, '2015-12-07 02:04:17', '2015-12-07 02:04:17', 'SILVONEI FERREIRA CLEMENTE', 'default.png'),
(156, 324, '2015-12-07 19:32:44', '2015-12-07 19:32:44', 'SUHEILA ABOU CHACRA', 'default.png'),
(157, 325, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'TALIZ RUBACK GUJANSQUE FABRI', 'default.png'),
(158, 326, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'TAYNNARA LIRIO MARTINS DE BRITO', 'default.png'),
(159, 327, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'TERCIO RAMIRES COELHO', 'default.png'),
(160, 328, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'THAIS CUNHA DIAS', 'default.png'),
(161, 329, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'THAIS ELIZAMA PAULA', 'default.png'),
(162, 330, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'THAMARA DE SOUZA ROCHA', 'default.png'),
(163, 331, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'THIAGO DAVID DE SOUZA', 'default.png'),
(164, 332, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'THIAGO HENRIQUE SILVA MONTIMOR', 'default.png'),
(165, 333, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'TIAGO FERREIRA DIAS', 'default.png'),
(166, 334, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'TICIANA FERREIRA NUNES CAMPOS', 'default.png'),
(167, 335, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VALDEILTON RODRIGUES DE SOUZA', 'default.png'),
(168, 336, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VALDIRENE APARECIDA RODRIGUES', 'default.png'),
(169, 337, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VALERIA PEREIRA LUCAS', 'default.png'),
(170, 338, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VANEIDE RIBEIRO ROCHA', 'default.png'),
(171, 339, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VANESSA MARQUES DA SILVA', 'default.png'),
(172, 340, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VERONICA PIMENTA BESKOW	', 'default.png'),
(173, 341, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VERONICA SANTOS GENEROZO', 'default.png'),
(174, 342, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VINICIUS FREITAS MARQUES DE MORAIS', 'default.png'),
(175, 343, '2015-12-07 19:34:04', '2015-12-07 19:34:04', 'VIVIANNI CRISTINI DINIZ DE O TOLOMELLI', '00343.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  `can_productmanager` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `can_admin`, `can_productmanager`) VALUES
(1, 'Admin', '2015-11-21 20:58:47', NULL, 1, 0),
(2, 'User', '2015-11-21 20:58:47', NULL, 0, 0),
(3, 'Products', '2015-11-21 20:58:47', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_in_at` timestamp NULL DEFAULT NULL,
  `created_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `banned_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=345 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `username`, `password`, `auth_key`, `access_token`, `logged_in_ip`, `logged_in_at`, `created_ip`, `created_at`, `updated_at`, `banned_at`, `banned_reason`) VALUES
(1, 1, 1, 'neo@neo.com', 'neo', '$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O', 'uBZTWg-GFZ0u1dwPvifCjNHHM5DtoByi', 'OyIAcGv_hmtWJAnJZjZabwujJ_urq205', '::1', '2015-12-11 14:51:48', NULL, '2015-11-21 20:58:48', NULL, NULL, NULL),
(2, 2, 1, 'gustavo.andrade@sicoobcrediriodoce.com.br', 'gustavog3027_00', '$2y$13$LrESUWUL6krcQz3xzq5HkOG33sF4jrCFarI.a1NanmaAZwwe8SHOG', NULL, NULL, '127.0.0.1', '2015-12-06 20:52:33', NULL, '2015-11-23 02:21:53', '2015-11-28 04:26:50', NULL, NULL),
(3, 2, 1, 'lamarquia.silva@sicoobcrediriodoce.com.br', 'lamarquiak3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-21 17:38:43', NULL, '2015-11-28 19:54:11', '2015-11-28 19:54:11', NULL, NULL),
(176, 2, 1, 'alcineia.carvalho@sicoobcrediriodoce.com.br', 'alcineiac3027_05', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(177, 2, 1, 'alessandra.turco@sicoobcrediriodoce.com.br', 'alessandraa3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(178, 2, 1, 'alessandra.moura@sicoobcrediriodoce.com.br', 'alessandram3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(179, 2, 1, 'alessandra.silva@sicoobcrediriodoce.com.br', 'alessandraf3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(180, 2, 1, 'alessandra.roque@sicoobcrediriodoce.com.br', 'alessandran3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(181, 2, 1, 'aline.reis@sicoobcrediriodoce.com.br', 'alinek3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(182, 2, 1, 'aline.pereira@sicoobcrediriodoce.com.br', 'alinel3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(183, 2, 1, 'amilar.neto@sicoobcrediriodoce.com.br', 'amilara3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(187, 2, 1, 'ana.santos@sicoobcrediriodoce.com.br', 'anai3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(188, 2, 1, ' 	ana.sousa@sicoobcrediriodoce.com.br', 'anag3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-07 02:27:31', NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(189, 2, 1, 'anderson.alves@sicoobcrediriodoce.com.br', 'andersons3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:32:44', NULL, NULL),
(190, 2, 1, 'andre.lemos@sicoobcrediriodoce.com.br', 'andrel3027_15', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:34:04', NULL, NULL),
(191, 2, 1, 'andreia.moura@sicoobcrediriodoce.com.br', 'andreiam3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:42:49', NULL, NULL),
(192, 2, 1, 'antonio.junior@sicoobcrediriodoce.com.br', 'antonios3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '::1', '2015-12-11 14:52:07', NULL, '2015-11-28 19:54:11', '2015-12-07 19:41:50', NULL, NULL),
(193, 2, 1, 'barbara.mendes@sicoobcrediriodoce.com.br', 'barbaraf3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:45:09', NULL, NULL),
(194, 2, 1, 'berenice.pinheiro@sicoobcrediriodoce.com.br', 'berenicef3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:45:52', NULL, NULL),
(195, 2, 1, 'bianca.oliveira@sicoobcrediriodoce.com.br', 'biancad3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:46:27', NULL, NULL),
(196, 2, 1, 'bruna.cardoso@sicoobcrediriodoce.com.br', 'brunal3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:46:56', NULL, NULL),
(197, 2, 1, 'bruna.souza@sicoobcrediriodoce.com.br', 'brunat3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:48:07', NULL, NULL),
(198, 2, 1, 'bruno.fontes@sicoobcrediriodoce.com.br', 'brunod3027_14', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:47:38', NULL, NULL),
(199, 2, 1, 'caio.cunha@sicoobcrediriodoce.com.br', 'caioh3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:50:01', NULL, NULL),
(200, 2, 1, 'camila.pereira@sicoobcrediriodoce.com.br', 'camilae3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:50:34', NULL, NULL),
(201, 2, 1, 'camila.nalon@sicoobcrediriodoce.com.br', 'camilar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:52:20', NULL, NULL),
(202, 2, 1, 'caren.maciel@sicoobcrediriodoce.com.br', 'carenc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:51:02', NULL, NULL),
(203, 3, 1, 'carlos.leite@sicoobcrediriodoce.com.br', 'carlosh3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-11 13:59:57', NULL, '2015-11-28 19:54:11', '2015-12-07 19:51:28', NULL, NULL),
(204, 2, 1, 'carmen.costa@sicoobcrediriodoce.com.br', 'carmenc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 19:53:40', NULL, NULL),
(205, 2, 1, 'celso.mol@sicoobcrediriodoce.com.br', 'celsom3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(206, 2, 1, 'claudilene.magalhaes@sicoobcrediriodoce.com.br', 'claudilenef3027_06', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(207, 2, 1, 'claudio.aguilar@sicoobcrediriodoce.com.br', 'claudioc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(208, 2, 1, 'cristiane.cruz@sicoobcrediriodoce.com.br', 'cristianes3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(209, 2, 1, 'cristianne.assumpcao@sicoobcrediriodoce.com.br', 'cristiannem3027_17', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(210, 2, 1, 'cristine.alves@sicoobcrediriodoce.com.br', 'cristineo3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(211, 2, 1, 'daiana.guimaraes@sicoobcrediriodoce.com.br', 'daianac3027_16', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(212, 2, 1, 'dalton.junior@sicoobcrediriodoce.com.br', 'daltonj3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(213, 2, 1, 'danilo.rocha@sicoobcrediriodoce.com.br', 'danilom3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(214, 2, 1, 'dayane.ferreira@sicoobcrediriodoce.com.br', 'dayanes3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(215, 2, 1, 'debora.ribeiro@sicoobcrediriodoce.com.br', 'deborag3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(216, 2, 1, 'diogo.duarte@sicoobcrediriodoce.com.br', 'diogos3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(217, 2, 1, 'ediane.conrado@sicoobcrediriodoce.com.br', 'edianec3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(218, 2, 1, 'edilene.cerqueira@sicoobcrediriodoce.com.br', 'edilenea3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(219, 2, 1, 'ellen.aniceto@sicoobcrediriodoce.com.br', 'ellenf3027_15', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(220, 2, 1, 'emilia.campos@sicoobcrediriodoce.com.br', 'emiliav3027_05', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(221, 2, 1, 'erique.barros@sicoobcrediriodoce.com.br', 'eriquem3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(222, 2, 1, 'eurico.correa@sicoobcrediriodoce.com.br', 'euricof3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(223, 2, 1, 'evelyn.fernandes@sicoobcrediriodoce.com.br', 'evelyna3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(224, 2, 1, 'fernanda.costa@sicoobcrediriodoce.com.br', 'fernandaac3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(225, 2, 1, 'fernanda.araujo@sicoobcrediriodoce.com.br', 'fernandad3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(226, 2, 1, 'fernanda.oliveira@sicoobcrediriodoce.com.br', 'fernandas3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(227, 2, 1, 'fernando.silva@sicoobcrediriodoce.com.br', 'fernandoe3027_11', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(228, 2, 1, 'fernando.araujo@sicoobcrediriodoce.com.br', 'fernandol3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(229, 2, 1, 'fernando.monteiro@sicoobcrediriodoce.com.br', 'fernandol3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(230, 2, 1, 'filipe.almeida@sicoobcrediriodoce.com.br', 'filipef3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(231, 2, 1, 'flavia.franco@sicoobcrediriodoce.com.br', 'flaviar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(232, 2, 1, 'francisco.junior@sicoobcrediriodoce.com.br', 'franciscoa3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(233, 2, 0, 'francisco.silvestre@sicoobcrediriodoce.com.br', 'franciscos3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(234, 2, 1, 'frederico.santos@sicoobcrediriodoce.com.br', 'fredericos3027_20', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(235, 2, 1, 'geordania.silva@sicoobcrediriodoce.com.br', 'geordanias3027_11', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(236, 2, 1, 'geraldo.costa@sicoobcrediriodoce.com.br', 'geraldoa3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(237, 2, 1, 'geraldo.carvalho@sicoobcrediriodoce.com.br', 'geraldoh3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(238, 2, 1, 'graziella.gonzaga@sicoobcrediriodoce.com.br', 'graziellao3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(239, 2, 1, 'guilherme.leite@sicoobcrediriodoce.com.br', 'guilhermec3027_14', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(240, 2, 1, 'guilherme.stauffer@sicoobcrediriodoce.com.br', 'guilhermef3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(241, 2, 1, 'gustavo.rodrigues@sicoobcrediriodoce.com.br', 'gustavom3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(242, 2, 1, 'hayson.silva@sicoobcrediriodoce.com.br', 'haysonr3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(243, 2, 1, 'hellen.cardozo@sicoobcrediriodoce.com.br', 'hellenc3027_06', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(244, 2, 1, 'hellon.miranda@sicoobcrediriodoce.com.br', 'hellonm3027_15', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(245, 2, 1, 'igor.soares@sicoobcrediriodoce.com.br', 'igorj3027_14', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(246, 2, 1, 'igor.marcal@sicoobcrediriodoce.com.br', 'igorm3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(247, 2, 1, 'isaac.matos@sicoobcrediriodoce.com.br', 'isaact3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(248, 2, 1, 'islane.oliveira@sicoobcrediriodoce.com.br', 'islaneb3027_11', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(249, 2, 1, 'jaciane.campos@sicoobcrediriodoce.com.br', 'jacianea3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(250, 2, 1, 'jayne.machado@sicoobcrediriodoce.com.br', 'jayned3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(251, 2, 1, 'jessyca.castelar@sicoobcrediriodoce.com.br', 'jessycar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(252, 2, 1, 'josanna.xavier@sicoobcrediriodoce.com.br', 'josannas3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(253, 2, 1, 'jose.sa@sicoobcrediriodoce.com.br', 'joseg3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(254, 2, 1, 'jose.carmo@sicoobcrediriodoce.com.br', 'josev3027_17', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(255, 2, 1, 'joselma.teixeira@sicoobcrediriodoce.com.br', 'joselmam3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(256, 2, 1, 'juliana.martins@sicoobcrediriodoce.com.br', 'julianar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(257, 2, 1, 'karla.mafra@sicoobcrediriodoce.com.br', 'karlac3027_20', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(258, 2, 1, 'kelen.voria@sicoobcrediriodoce.com.br', 'kelenm3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(259, 2, 1, 'kelly.maciel@sicoobcrediriodoce.com.br', 'kellyc3027_17', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(260, 2, 1, 'laisla.pimenta@sicoobcrediriodoce.com.br', 'laislam3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(261, 2, 1, 'larissa.menezes@sicoobcrediriodoce.com.br', 'larissar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(262, 2, 1, 'larissa.ferreira@sicoobcrediriodoce.com.br', 'larissas3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(263, 2, 1, 'larysse.almeida@sicoobcrediriodoce.com.br', 'laryssel3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(264, 2, 1, 'leonardo.souza@sicoobcrediriodoce.com.br', 'leonardoc3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(265, 2, 1, 'lidiane.dias@sicoobcrediriodoce.com.br', 'lidianep3027_07', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(266, 2, 1, 'lorrayne.sousa@sicoobcrediriodoce.com.br', 'lorraynep3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(267, 2, 1, 'luciana.vieira@sicoobcrediriodoce.com.br', 'lucianap3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(268, 2, 1, 'luiz.junior@sicoobcrediriodoce.com.br', 'luizp3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(269, 2, 1, 'luma.brito@sicoobcrediriodoce.com.br', 'lumag3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(270, 2, 1, 'luygi.morete@sicoobcrediriodoce.com.br', 'luygic3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(271, 2, 1, 'marcelo.salgado@sicoobcrediriodoce.com.br', 'marceloc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(272, 2, 1, 'marcelo.sampaio@sicoobcrediriodoce.com.br', 'marcelom3027_10', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(273, 2, 1, 'marco.franco@sicoobcrediriodoce.com.br', 'marcof3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(274, 2, 1, 'marco.rocha@sicoobcrediriodoce.com.br', 'marcoa3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(275, 2, 1, 'marcus.gomes@sicoobcrediriodoce.com.br', 'marcusv3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(276, 2, 1, 'maria.maia@sicoobcrediriodoce.com.br', 'mariac3027_14', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(277, 2, 1, 'maria.araujo@sicoobcrediriodoce.com.br', 'mariag3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(278, 2, 1, 'maria.oliveira@sicoobcrediriodoce.com.br', 'marial3027_16', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(279, 2, 1, 'marina.pereira@sicoobcrediriodoce.com.br', 'marinap3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(280, 2, 1, 'marina.cunha@sicoobcrediriodoce.com.br', 'marinat3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(281, 2, 1, 'marlene.fernandes@sicoobcrediriodoce.com.br', 'marlenet3027_10', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(282, 2, 1, 'matheus.santos@sicoobcrediriodoce.com.br', 'matheusc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(283, 2, 1, 'matheus.ribeiro@sicoobcrediriodoce.com.br', 'matheusf3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(284, 2, 1, 'mauro.neves@sicoobcrediriodoce.com.br', 'mauroh3027_18', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(285, 2, 1, 'melany.barbosa@sicoobcrediriodoce.com.br', 'melanym3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(286, 2, 1, 'melina.santos@sicoobcrediriodoce.com.br', 'melinaf3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(287, 2, 1, 'miguel.junior@sicoobcrediriodoce.com.br', 'miguele3027_19', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(288, 2, 1, 'nair.goncalves@sicoobcrediriodoce.com.br', 'nairj3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(289, 2, 1, 'natalia.araujo@sicoobcrediriodoce.com.br', 'nataliar3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(290, 2, 1, 'nayara.ramos@sicoobcrediriodoce.com.br', 'nayaras3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(291, 2, 1, 'nicolina.barbosa@sicoobcrediriodoce.com.br', 'nicolinam3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(292, 2, 1, 'nubia.medeiros@sicoobcrediriodoce.com.br', 'nubias3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(293, 2, 1, 'otavio.albuquerque@sicoobcrediriodoce.com.br', 'otaviop3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(294, 2, 1, 'pablo.rocha@sicoobcrediriodoce.com.br', 'pablom3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-12 18:20:13', NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(295, 2, 1, 'paula.roberto@sicoobcrediriodoce.com.br', 'paular3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(296, 2, 1, 'paulo.sa@sicoobcrediriodoce.com.br', 'paulol3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(297, 2, 1, 'pricila.santos@sicoobcrediriodoce.com.br', 'pricilaa3027_18', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(298, 2, 1, 'priscilla.dias@sicoobcrediriodoce.com.br', 'priscillag3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(299, 2, 1, 'rafael.dutra@sicoobcrediriodoce.com.br', 'rafaelo3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(300, 2, 1, 'raifa.gomes@sicoobcrediriodoce.com.br', 'raifab3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(301, 2, 1, 'raniel.ferreira@sicoobcrediriodoce.com.br', 'ranielg3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-08 00:43:31', NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(302, 2, 1, 'raquel.miranda@sicoobcrediriodoce.com.br', 'raquelb3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(303, 2, 1, 'raquel.leite@sicoobcrediriodoce.com.br', 'raquelg3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(304, 2, 1, 'renata.araujo@sicoobcrediriodoce.com.br', 'renataa3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(305, 2, 1, 'renata.linhares@sicoobcrediriodoce.com.br', 'renatac3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(306, 2, 1, 'renata.bastos@sicoobcrediriodoce.com.br', 'renatap3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(307, 2, 1, 'renato.duarte@sicoobcrediriodoce.com.br', 'renatoc3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(308, 2, 1, 'renato.oliveira@sicoobcrediriodoce.com.br', 'renatof3027_14', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(309, 2, 1, 'ricardo.cruz@sicoobcrediriodoce.com.br', 'ricardor3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(310, 2, 1, 'robson.mendes@sicoobcrediriodoce.com.br', 'robsona3027_18', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(311, 2, 1, 'rodrigo.aquino@sicoobcrediriodoce.com.br', 'rodrigon3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(312, 2, 1, 'rodrigo.sena@sicoobcrediriodoce.com.br', 'rodrigop3027_10', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(313, 2, 1, 'roge.miranda@sicoobcrediriodoce.com.br', 'rogem3027_06', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(314, 2, 1, 'romeu.neto@sicoobcrediriodoce.com.br', 'romeum3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(315, 2, 1, 'romulo.oliveira@sicoobcrediriodoce.com.br', 'romulor3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(316, 2, 1, 'romulo.pimenta@sicoobcrediriodoce.com.br', 'romulor3027_17', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(317, 2, 1, 'ronie.santos@sicoobcrediriodoce.com.br', 'roniea3027_07', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(318, 2, 1, 'rosilene.pereira@sicoobcrediriodoce.com.br', 'rosilenem3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(319, 2, 1, 'sabrina.oliveira@sicoobcrediriodoce.com.br', 'sabrinal3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(320, 2, 1, 'samir.dagnoni@sicoobcrediriodoce.com.br', 'samirm3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(321, 2, 1, 'shayene.silva@sicoobcrediriodoce.com.br', 'shayened3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(322, 2, 1, 'silas.junior@sicoobcrediriodoce.com.br', 'silasd3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, '127.0.0.1', '2015-12-08 00:24:09', NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(323, 2, 1, 'silvonei.clemente@sicoobcrediriodoce.com.br', 'silvoneif3027_18', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(324, 2, 1, 'suheila.chacra@sicoobcrediriodoce.com.br', 'suheilaa3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(325, 2, 1, 'taliz.fabri@sicoobcrediriodoce.com.br', 'talizr3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(326, 2, 1, 'taynnara.brito@sicoobcrediriodoce.com.br', 'taynnaral3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(327, 2, 1, 'tercio.coelho@sicoobcrediriodoce.com.br', 'tercior3027_03', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(328, 2, 1, 'thais.dias@sicoobcrediriodoce.com.br', 'thaisc3027_13', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(329, 2, 1, 'thais.paula@sicoobcrediriodoce.com.br', 'thaise3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(330, 2, 1, 'thamara.rocha@sicoobcrediriodoce.com.br', 'thamaras3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(331, 2, 1, 'thiago.souza@sicoobcrediriodoce.com.br', 'thiagod3027_16', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(332, 2, 1, 'thiago.montimor@sicoobcrediriodoce.com.br', 'thiagoh3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(333, 2, 1, 'tiago.dias@sicoobcrediriodoce.com.br', 'tiagof3027_04', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(334, 2, 1, 'ticiana.campos@sicoobcrediriodoce.com.br', 'ticianaf3027_17', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(335, 2, 1, 'valdeilton.souza@sicoobcrediriodoce.com.br', 'valdeiltonr3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(336, 2, 1, 'valdirene.rodrigues@sicoobcrediriodoce.com.br', 'valdirenea3027_02', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(337, 2, 1, 'valeria.lucas@sicoobcrediriodoce.com.br', 'valeriap3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(338, 2, 1, 'vaneide.rocha@sicoobcrediriodoce.com.br', 'vaneider3027_11', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(339, 2, 1, 'vanessa.silva@sicoobcrediriodoce.com.br', 'vanessam3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(340, 2, 1, 'veronica.beskow@sicoobcrediriodoce.com.br', 'veronicap3027_09', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(341, 2, 1, 'veronica.generozo@sicoobcrediriodoce.com.br', 'veronicas3027_07', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(342, 2, 1, 'vinicius.morais@sicoobcrediriodoce.com.br', 'viniciusf3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(343, 2, 1, 'vivianni.tolomelli@sicoobcrediriodoce.com.br', 'viviannic3027_00', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', NULL, NULL, NULL),
(344, 2, 1, 'estagiaria@sicoobcrediriodoce.com.br', 'estagiaria', '$2y$13$oajJBPba8Dsp2Q3agjQyNOFG3xQhbqUs0KltljAApis0sopFP3JN6', NULL, NULL, NULL, NULL, NULL, '2015-11-28 19:54:11', '2015-12-07 02:04:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_auth`
--

CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_token`
--

CREATE TABLE IF NOT EXISTS `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_token_token` (`token`),
  KEY `user_token_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `daily_productivity`
--
ALTER TABLE `daily_productivity`
  ADD CONSTRAINT `ft_dp_status_id` FOREIGN KEY (`daily_productivity_status_id`) REFERENCES `daily_productivity_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ft_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ft_person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ft_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Limitadores para a tabela `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `user_token`
--
ALTER TABLE `user_token`
  ADD CONSTRAINT `user_token_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
