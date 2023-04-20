-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jun-2021 às 17:26
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdhospitalardeg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexams`
--

DROP TABLE IF EXISTS `tbexams`;
CREATE TABLE IF NOT EXISTS `tbexams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nmPaciente` varchar(50) NOT NULL,
  `exame` varchar(50) NOT NULL,
  `dtSolicitacao` date(8) NOT NULL,
  `medSolicita` varchar(50) NOT NULL,
  `motivoSolicita` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusers`
--

DROP TABLE IF EXISTS `tbusers`;
CREATE TABLE IF NOT EXISTS `tbusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusers`
--

INSERT INTO `tbusers` (`id`, `nome`, `email`, `senha`) VALUES
(7, 'Daniel', 'daniel@consultorio', '456'),
(6, 'Gabriel', 'gabriel@consultorio', '123'),
(8, 'Elton', 'elton@consultorio', '789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
