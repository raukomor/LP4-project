-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Dez-2017 às 11:14
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_aluno_insert`(IN `pcd_cpf_aluno` BIGINT(11), IN `pnm_aluno` VARCHAR(40), IN `pim_perfil` VARCHAR(300), IN `pcd_telefone_aluno` VARCHAR(11), IN `pnm_endereco_aluno` VARCHAR(70), IN `pdt_nascimento_aluno` DATE, IN `pcd_escola` INT(11), IN `pcd_turma` INT(11), IN `pdt_matricula` DATE, IN `pcd_senha` INT(20))
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
  `nm_aluno` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `im_perfil` varchar(300) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=163 ;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`cd_escola`, `nm_escola`, `nm_endereco_escola`, `cd_telefone_escola`) VALUES
(1, 'Escola abysswalker', 'abyss', 13666),
(158, 'Nascimento Junior', 'Rua Abenito marcosa', 1334918198),
(162, 'Escola php', 'algumlugar', 133434);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cd_turma`, `nm_periodo_turma`, `sg_sala_turma`, `cd_serie_turma`, `cd_escola`) VALUES
(2, 'matutino', 'vd1', 3, 1),
(3, 'matutino', 'vd1', 3, 158),
(4, 'matutino', 'vd1', 3, 162),
(5, 'matutino', 'vd1', 3, 162),
(6, 'matutino', 'vd3', 2, 1),
(7, 'matutino', 'vd2', 2, 158),
(9, 'matutino', 'vd1', 2, 162);

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
