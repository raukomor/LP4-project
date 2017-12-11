-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 11-Dez-2017 às 00:17
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
CREATE DATABASE IF NOT EXISTS `sistema_escola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistema_escola`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aluno_insert`(IN `pcd_cpf_aluno` BIGINT(11), IN `pnm_aluno` VARCHAR(40), IN `pim_perfil` VARCHAR(40), IN `pcd_telefone_aluno` VARCHAR(11), IN `pnm_endereco_aluno` VARCHAR(70), IN `pdt_nascimento_aluno` DATE, IN `pcd_escola` INT(11), IN `pcd_turma` INT(11), IN `pdt_matricula` DATE, IN `pcd_senha` INT(20))
BEGIN
	INSERT INTO aluno(cd_cpf_aluno, nm_aluno, im_perfil, cd_telefone_aluno, nm_endereco_aluno, dt_nascimento_aluno, cd_escola, cd_turma, dt_matricula, cd_senha) VALUES (pcd_cpf_aluno, pnm_aluno, pim_perfil, pcd_telefone_aluno, pnm_endereco_aluno, pdt_nascimento_aluno, pcd_escola, pcd_turma, pdt_matricula, pcd_senha);

    

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_escola_insert`(IN `pnm_escola` VARCHAR(50), IN `pnm_endereco_escola` VARCHAR(70), IN `pcd_telefone_escola` INT(11))
BEGIN
	INSERT INTO escola(nm_escola, nm_endereco_escola, cd_telefone_escola)
	VALUES(pnm_escola, pnm_endereco_escola, pcd_telefone_escola);

    SELECT * FROM escola WHERE cd_escola = LAST_INSERT_ID();

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `cd_cpf_aluno` bigint(11) NOT NULL,
  `nm_aluno` varchar(40) NOT NULL,
  `im_perfil` varchar(40) NOT NULL,
  `cd_telefone_aluno` int(11) NOT NULL,
  `nm_endereco_aluno` varchar(70) NOT NULL,
  `dt_nascimento_aluno` date NOT NULL,
  `cd_escola` int(11) NOT NULL,
  `cd_turma` int(11) NOT NULL,
  `dt_matricula` date NOT NULL,
  `cd_senha` int(20) NOT NULL,
  PRIMARY KEY (`cd_cpf_aluno`),
  KEY `FK_matricula_escola` (`cd_escola`),
  KEY `FK_matricula_turma` (`cd_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`codigo`, `arquivo`, `data`) VALUES
(3, '17886d01615aa2c069610109417cd3ba.png', '2017-12-03 15:08:19'),
(4, '0333395412dcf6e09616dd9292e0edf0.png', '2017-12-03 17:16:19'),
(5, '4d033db1efa905ff2c07893ba2b3f365.png', '2017-12-03 17:16:25'),
(6, '4612d2465b8e0ddeda20e1e21c5f68a4.png', '2017-12-03 23:30:29'),
(7, 'c2ecdd59fa322f0be59127d6cca037ae.png', '2017-12-03 23:31:06'),
(8, '6730d8439bfa67343d2f407a32d4380f.png', '2017-12-03 23:33:21'),
(9, 'cd05122d53dc8eb78b7c31716806c262.png', '2017-12-03 23:33:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE IF NOT EXISTS `escola` (
  `cd_escola` int(11) NOT NULL AUTO_INCREMENT,
  `nm_escola` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nm_endereco_escola` varchar(70) CHARACTER SET latin1 NOT NULL,
  `cd_telefone_escola` int(11) NOT NULL,
  PRIMARY KEY (`cd_escola`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=162 ;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`cd_escola`, `nm_escola`, `nm_endereco_escola`, `cd_telefone_escola`) VALUES
(148, 'Ã§Ã§Ã§', '123123', 123123),
(149, 'Ã§Ã§Ã§', '123', 123),
(150, 'pacheco', 'rua das pamonhas', 34343434),
(153, 'Ronaldo Ferreira de AlcÃ¢ntara', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(154, 'Ronaldo Ferreira de AlcÃ¢ntara', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(155, 'Ronaldo Ferreira de AlcÃ¢ntara', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(156, 'Ronaldo Ferreira de AlcÃ¢ntara', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(157, 'Rodrigo', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(158, 'Rodrigo', 'rua sÃ£o caetano 379, BoqueirÃ£o', 1334918198),
(159, 'fabio', '123', 123),
(160, 'batata', 'batata', 123123),
(161, 'Batatinha', 'florence', 12121212);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `cd_cpf_professor` int(11) NOT NULL,
  `nm_professor` varchar(40) NOT NULL,
  `cd_telefone_professor` int(11) NOT NULL,
  `nm_endereco_professor` varchar(70) NOT NULL,
  `dt_nascimento_professor` date NOT NULL,
  PRIMARY KEY (`cd_cpf_professor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_escola`
--

CREATE TABLE IF NOT EXISTS `professor_escola` (
  `cd_ingrecao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_ingrecao` date NOT NULL,
  `cd_cpf_professor` int(11) DEFAULT NULL,
  `cd_escola` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_ingrecao`),
  KEY `FK_ingrecao_professor` (`cd_cpf_professor`),
  KEY `FK_ingrecao_escola` (`cd_escola`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_turma`
--

CREATE TABLE IF NOT EXISTS `professor_turma` (
  `cd_ingrecao` int(11) NOT NULL AUTO_INCREMENT,
  `dt_ingrecao` date NOT NULL,
  `cd_cpf_professor` int(11) DEFAULT NULL,
  `cd_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_ingrecao`),
  KEY `FK_ingrecao_professor2` (`cd_cpf_professor`),
  KEY `FK_ingrecao_turma` (`cd_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `cd_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nm_periodo_turma` varchar(10) NOT NULL,
  `sg_sala_turma` char(5) NOT NULL,
  `cd_serie_turma` int(1) NOT NULL,
  `cd_escola` int(11) NOT NULL,
  PRIMARY KEY (`cd_turma`),
  KEY `FK_turma_escola` (`cd_escola`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cd_turma`, `nm_periodo_turma`, `sg_sala_turma`, `cd_serie_turma`, `cd_escola`) VALUES
(1, 'teste', 'tes', 1, 158);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_matricula_escola` FOREIGN KEY (`cd_escola`) REFERENCES `escola` (`cd_escola`),
  ADD CONSTRAINT `FK_matricula_turma` FOREIGN KEY (`cd_turma`) REFERENCES `turma` (`cd_turma`);

--
-- Limitadores para a tabela `professor_escola`
--
ALTER TABLE `professor_escola`
  ADD CONSTRAINT `FK_ingrecao_escola` FOREIGN KEY (`cd_escola`) REFERENCES `escola` (`cd_escola`),
  ADD CONSTRAINT `FK_ingrecao_professor` FOREIGN KEY (`cd_cpf_professor`) REFERENCES `professor` (`cd_cpf_professor`);

--
-- Limitadores para a tabela `professor_turma`
--
ALTER TABLE `professor_turma`
  ADD CONSTRAINT `FK_ingrecao_professor2` FOREIGN KEY (`cd_cpf_professor`) REFERENCES `professor` (`cd_cpf_professor`),
  ADD CONSTRAINT `FK_ingrecao_turma` FOREIGN KEY (`cd_turma`) REFERENCES `turma` (`cd_turma`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `FK_turma_escola` FOREIGN KEY (`cd_escola`) REFERENCES `escola` (`cd_escola`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
