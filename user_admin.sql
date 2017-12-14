-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Dez-2017 às 19:05
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `sistema_escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `cd_acc` int(11) NOT NULL AUTO_INCREMENT,
  `nm_acc` varchar(50) NOT NULL,
  `nm_pass_acc` varchar(50) NOT NULL,
  PRIMARY KEY (`cd_acc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user_admin`
--

INSERT INTO `user_admin` (`cd_acc`, `nm_acc`, `nm_pass_acc`) VALUES
(1, 'admin', 'usbw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
