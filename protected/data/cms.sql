-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 13-Maio-2015 às 04:02
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_usuario`
--

CREATE TABLE IF NOT EXISTS `adm_usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm_usuario_tipo`
--

CREATE TABLE IF NOT EXISTS `adm_usuario_tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adm_usuario_tipo`
--

INSERT INTO `adm_usuario_tipo` (`id`, `nome`) VALUES
(1, 'Desenvolvedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_menu`
--

CREATE TABLE IF NOT EXISTS `dev_menu` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_menu_categoria` int(11) NOT NULL,
  `id_menu_pai` int(11) DEFAULT NULL,
  `id_menu_filho` int(11) DEFAULT NULL,
  `icon` varchar(300) DEFAULT NULL,
  `ordem` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dev_menu`
--

INSERT INTO `dev_menu` (`id`, `nome`, `id_menu_categoria`, `id_menu_pai`, `id_menu_filho`, `icon`, `ordem`) VALUES
(1, 'Sidebar Menu', 1, NULL, NULL, '', 1),
(2, 'Desenvolvedor', 1, 1, NULL, 'development.png', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_menu_categoria`
--

CREATE TABLE IF NOT EXISTS `dev_menu_categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ordem` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dev_menu_categoria`
--

INSERT INTO `dev_menu_categoria` (`id`, `nome`, `ordem`) VALUES
(1, 'Desenvolvedor', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_menu_categoria_permissao`
--

CREATE TABLE IF NOT EXISTS `dev_menu_categoria_permissao` (
  `id` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL,
  `id_menu_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_menu_item`
--

CREATE TABLE IF NOT EXISTS `dev_menu_item` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_menu_pai` int(11) NOT NULL,
  `id_menu_filho` int(11) DEFAULT NULL,
  `link` varchar(300) NOT NULL,
  `icon` varchar(300) DEFAULT NULL,
  `ordem` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dev_menu_item`
--

INSERT INTO `dev_menu_item` (`id`, `nome`, `id_menu_pai`, `id_menu_filho`, `link`, `icon`, `ordem`) VALUES
(1, 'Categorias', 2, NULL, 'devMenuCategoria', 'laptop.png', 1),
(2, 'Sidebar Itens', 2, NULL, 'f', 'file.png', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_menu_permissao`
--

CREATE TABLE IF NOT EXISTS `dev_menu_permissao` (
  `id` int(11) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dev_profile_menu_item`
--

CREATE TABLE IF NOT EXISTS `dev_profile_menu_item` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `link` varchar(300) NOT NULL,
  `id_usuario_tipo` int(11) NOT NULL,
  `ordem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_usuario`
--
ALTER TABLE `adm_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adm_usuario_tipo`
--
ALTER TABLE `adm_usuario_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `dev_menu`
--
ALTER TABLE `dev_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_menu_categoria`
--
ALTER TABLE `dev_menu_categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `dev_menu_categoria_permissao`
--
ALTER TABLE `dev_menu_categoria_permissao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_menu_item`
--
ALTER TABLE `dev_menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_menu_permissao`
--
ALTER TABLE `dev_menu_permissao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dev_profile_menu_item`
--
ALTER TABLE `dev_profile_menu_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_usuario`
--
ALTER TABLE `adm_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `adm_usuario_tipo`
--
ALTER TABLE `adm_usuario_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dev_menu`
--
ALTER TABLE `dev_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dev_menu_categoria`
--
ALTER TABLE `dev_menu_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dev_menu_categoria_permissao`
--
ALTER TABLE `dev_menu_categoria_permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dev_menu_item`
--
ALTER TABLE `dev_menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dev_menu_permissao`
--
ALTER TABLE `dev_menu_permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dev_profile_menu_item`
--
ALTER TABLE `dev_profile_menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
