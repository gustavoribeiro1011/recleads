-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2022 às 02:42
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
-- Banco de dados: `u904669542_wefadmin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `forms`
--

DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(200) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `tipo_passagem` varchar(100) DEFAULT NULL,
  `adultos` varchar(10) DEFAULT NULL,
  `criancas_1` varchar(10) DEFAULT NULL,
  `criancas_2` varchar(10) DEFAULT NULL,
  `tipo_viagem` varchar(100) DEFAULT NULL,
  `data_ida` varchar(15) DEFAULT NULL,
  `data_volta` varchar(15) NOT NULL,
  `bagagem` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forms`
--

INSERT INTO `forms` (`id`, `link`, `nome`, `email`, `telefone`, `tipo_passagem`, `adultos`, `criancas_1`, `criancas_2`, `tipo_viagem`, `data_ida`, `data_volta`, `bagagem`, `created`, `modified`) VALUES
(1, 'voarmaiscomkelle.com.br', 'GUSTAVO HENRIQUE RIBEIRO\n', 'gustavoribeiro1011@gmail.com\n', '(43) 99626-2702\n', 'Ida e Volta\n', '1\n', '', '', 'Turismo\n', '', '', '', '2022-12-07 20:03:18', NULL),
(3, 'voarmaiscomkelle.com.br', 'GUSTAVO HENRIQUE RIBEIRO\n', 'gustavoribeiro1011@gmail.com\n', '(43) 99626-2702\n', 'Ida e Volta\n', '1\n', '2\n', '3\n', 'Turismo\n', '07/12/2022\n', '08/12/2022\n', 'Quero bagagem de 23Kg\n', '2022-12-07 20:17:57', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user`, `username`, `password`, `level`, `created`, `modified`) VALUES
(1, 'gustavoribeiro1011@gmail.com', 'gustavo', 'gustavo22b', 'admin', '2022-12-07 13:27:00', '2022-12-07 13:27:00'),
(2, 'adrianopessoalemail@gmail.com', 'adriano', '123456', 'admin', '2022-12-07 21:54:36', '2022-12-07 21:54:36'),
(3, 'kelle', 'kelle', '123456', 'user', '2022-12-07 23:38:37', '2022-12-07 23:38:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
