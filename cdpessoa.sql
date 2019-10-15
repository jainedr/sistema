-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2019 at 04:05 PM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdpessoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`id`, `nome`) VALUES
(1, 'Medico'),
(2, 'Teste'),
(3, 'Teste 3'),
(4, 'Cardio'),
(5, 'Dentista'),
(6, 'Teste 4'),
(7, 'Cardio 2');

-- --------------------------------------------------------

--
-- Table structure for table `marcacao`
--

CREATE TABLE IF NOT EXISTS `marcacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) CHARACTER SET utf8 NOT NULL,
  `espec` int(11) NOT NULL,
  `data_rec` date NOT NULL,
  `data_marc` date NOT NULL,
  `contato` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sus` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1361 ;

--
-- Dumping data for table `marcacao`
--

INSERT INTO `marcacao` (`id`, `nome`, `endereco`, `espec`, `data_rec`, `data_marc`, `contato`, `sus`) VALUES
(1349, 'JaÃ­ne Dias Rocha', 'rua Ademar Marcos, 76', 1, '0000-00-00', '0000-00-00', '88374427711', ''),
(1354, 'Alan GonÃ§alvess', 'Rua Joao Amaral Neves', 1, '0000-00-00', '0000-00-00', '8833442211', ''),
(1355, 'Maria Neves Costa', 'Rua Joao Amaral Neves', 2, '0000-00-00', '0000-00-00', '88374427711', ''),
(1356, 'Joao Pereira Costa', 'rua Ademar Marcos, 76', 1, '0000-00-00', '0000-00-00', '88374427711', ''),
(1357, 'Alvino Moreira Alves', 'Rua Joao Pereira Neves', 5, '0000-00-00', '0000-00-00', '44 55665555', '774455669'),
(1358, 'Alan GonÃ§alves Cardoso', 'Rua Geraldo SimÃµes Costa', 5, '2019-10-06', '2019-10-22', '88374427711', '5468746222'),
(1359, 'Alan GonÃ§alves Cardoso', 'Rua Geraldo SimÃµes Costa', 4, '0000-00-00', '0000-00-00', '88374427711', '5468746222'),
(1360, 'Alvino Moreira', 'Rua Joao Pereira Neves', 1, '2019-10-06', '2019-10-30', '44 55665555', '774455669');

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `sus` varchar(50) NOT NULL,
  `contato` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sus` (`sus`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `endereco`, `sus`, `contato`) VALUES
(4, 'Alan GonÃ§alves Cardoso', 'Rua Geraldo SimÃµes Costa', '5468746222', '88374427711'),
(5, 'Teste 2', 'Rua Geraldo SimÃµes Costa', '5461746854', '33 45454545'),
(6, 'Alberto Rodrigues', 'Rua Amaral ', '11224455366', '33 55445544'),
(7, 'Alvino Moreira', 'Rua Joao Pereira Neves', '774455669', '44 55665555');
