-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 20-Nov-2017 às 05:07
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aluno_insert`(IN `pnm_aluno` VARCHAR(40), IN `pcd_telefone` INT(11), IN `pnm_endereco_aluno` VARCHAR(70), IN `pdt_nascimento_aluno` DATE, IN `pcd_escola` INT(11), IN `pcd_turma` INT(11), IN `pdt_matricula` DATE)
BEGIN
	INSERT INTO aluno(nm_aluno, cd_telefone, nm_endereco_aluno, dt_nascimento_aluno, cd_escola, cd_turma, dt_matricula)
	VALUES(pnm_aluno, pcd_telefone, pnm_endereco_aluno, pdt_nascimento_aluno, pcd_escola, pcd_turma, pdt_matricula);

    SELECT * FROM aluno WHERE cd_cpf_aluno = LAST_INSERT_ID();

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
  `cd_cpf_aluno` int(11) NOT NULL,
  `nm_aluno` varchar(40) NOT NULL,
  `cd_telefone_aluno` int(11) NOT NULL,
  `nm_endereco_aluno` varchar(70) NOT NULL,
  `dt_nascimento_aluno` date NOT NULL,
  `cd_escola` int(11) NOT NULL,
  `cd_turma` int(11) NOT NULL,
  `dt_matricula` date NOT NULL,
  PRIMARY KEY (`cd_cpf_aluno`),
  KEY `FK_matricula_escola` (`cd_escola`),
  KEY `FK_matricula_turma` (`cd_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE IF NOT EXISTS `escola` (
  `cd_escola` int(11) NOT NULL AUTO_INCREMENT,
  `nm_escola` varchar(50) NOT NULL,
  `nm_endereco_escola` varchar(70) NOT NULL,
  `cd_telefone_escola` int(11) NOT NULL,
  PRIMARY KEY (`cd_escola`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`cd_escola`, `nm_escola`, `nm_endereco_escola`, `cd_telefone_escola`) VALUES
(1, 'FATEC', 'praca 19 de janeiro', 34343434);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `FK_ingrecao_professor` FOREIGN KEY (`cd_cpf_professor`) REFERENCES `professor` (`cd_cpf_professor`),
  ADD CONSTRAINT `FK_ingrecao_escola` FOREIGN KEY (`cd_escola`) REFERENCES `escola` (`cd_escola`);

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
