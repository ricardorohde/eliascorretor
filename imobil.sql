-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 02-Mar-2015 às 22:53
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `imobil`
--
CREATE DATABASE IF NOT EXISTS `u532218104_imobi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `u532218104_imobi`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncio`
--

CREATE TABLE IF NOT EXISTS `Anuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpimovel` int(11) NOT NULL,
  `tpnegocio` int(11) NOT NULL,
  `cidade` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `valor` float NOT NULL,
  `vizualizacoes` int(11) NOT NULL,
  `finalizado` varchar(10) NOT NULL,
  `usuario` int(11) NOT NULL,
  `areaterreno` float NOT NULL,
  `qtdcomodo` int(11) NOT NULL,
  `qtdbanheiro` int(11) NOT NULL,
  `qtdquarto` int(11) NOT NULL,
  `qtdgaragem` int(11) NOT NULL,
  `quintal` varchar(10) NOT NULL,
  `areaservico` varchar(10) NOT NULL,
  `piscina` varchar(10) NOT NULL,
  `data` datetime NOT NULL,
  `areaconstruida` float NOT NULL,
  `andarmaximo` varchar(20) NOT NULL,
  `areapiscina` float NOT NULL,
  `tempo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncioestatistica`
--

CREATE TABLE IF NOT EXISTS `Anuncioestatistica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anuncio` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `Cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `Comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(200) NOT NULL,
  `data` datetime NOT NULL,
  `usuario` int(11) NOT NULL,
  `anuncio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariolido`
--

CREATE TABLE IF NOT EXISTS `Comentariolido` (
  `comentario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagemanuncio`
--

CREATE TABLE IF NOT EXISTS `Imagemanuncio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anuncio` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `url` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE IF NOT EXISTS `Mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(200) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `anuncio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagemlida`
--

CREATE TABLE IF NOT EXISTS `Mensagemlida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo`
--

CREATE TABLE IF NOT EXISTS `Tempo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpimovel`
--

CREATE TABLE IF NOT EXISTS `Tpimovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpimovel` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cdauxilar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpnegocio`
--

CREATE TABLE IF NOT EXISTS `Tpnegocio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpnegocio` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `cdauxiliar` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `ultimaMudanca` datetime NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
