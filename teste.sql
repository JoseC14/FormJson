-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Nov-2022 às 19:14
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `json_test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `teste`
--

DROP TABLE IF EXISTS `teste`;
CREATE TABLE IF NOT EXISTS `teste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(70) NOT NULL,
  `cliente` varchar(225) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `teste`
--

INSERT INTO `teste` (`id`, `descricao`, `cliente`, `cpf`) VALUES
(121, 'de', 'dinha', '12345'),
(131, 'de', 'dinha', '12345'),
(132, 'Andre', 'estagiÃ¡rio', '7654568'),
(133, 'teste', '001', 'xv'),
(134, 'de', 'teste', 'ad'),
(135, 'de', 'dinha', '12345'),
(136, 'de', 'teste02', 'cvx');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
