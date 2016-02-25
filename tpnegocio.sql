-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 02-Mar-2015 às 23:04
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

--
-- Extraindo dados da tabela `tpnegocio`
--

INSERT INTO `Tpnegocio` (`id`, `tpnegocio`, `descricao`, `cdauxiliar`) VALUES
(1, 'compra', 'comprar um bem de acordo com o seu desejo e com as condições que são acordadas com o vendedor.', '01'),
(2, 'venda', 'descrição.', '02'),
(3, 'aluguel', '', '03'),
(4, 'contrato', '', '04'),
(5, 'permuta', '', '05'),
(6, 'outros', '', '06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
