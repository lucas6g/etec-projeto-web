-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 16-Jul-2020 às 19:20
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_projeto` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tecnologias` varchar(255) NOT NULL,
  `git_url` varchar(255) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_projeto`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id_projeto`, `nome_projeto`, `descricao`, `tecnologias`, `git_url`, `img_url`, `id_usuario`, `likes`, `categoria`) VALUES
(58, 'sistema de contabilidade ', 'dfdfdf', 'php,Mysql,Javascript', 'https://github.com/', '5f10a2f67ad4f.png', 107, 0, 'web'),
(59, 'controle de estoque', 'industry. Lorewn ', 'php,Mysql,Javascript', 'https://github.com/', '5f10a39e35e2c.png', 107, 0, 'desktop'),
(61, 'clone-whats', 'hgghgh', 'php,Mysql,Javascript', 'https://github.com/', '5f10a4ae53fc5.png', 108, 0, 'mobile'),
(63, 'jogo', 'descricao do jogo', 'php,Mysql,Javascript', 'https://github.com/', '5f10a5cdb2ca8.jpg', 108, 0, 'jogos'),
(64, 'realidade aumentada', 'descricao projeto', 'php,Mysql,Javascript', 'https://github.com/', '5f10a640c0ed5.jpg', 108, 0, 'inteligencia'),
(65, 'climaControlll', 'descricao', 'php,Mysql,Javascript', 'https://github.com/', '5f10a6f918f2a.jpg', 108, 0, 'desktop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `quanti_projetos` int(11) DEFAULT NULL,
  `img_profile` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `whatsapp`, `quanti_projetos`, `img_profile`) VALUES
(108, 'lucas', 'lucas@gmail.com', 'dc53fc4f621c80bdc2fa0329a6123708', '512515155', NULL, '5f10a34f199bd.png'),
(107, 'teste', 'teste@gmail.com', '698dc19d489c4e4db73e28a713eab07b', '156156165156', NULL, '5f10a2d3e8198.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
