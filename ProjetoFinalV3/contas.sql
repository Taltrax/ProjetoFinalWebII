-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Dez-2018 às 18:09
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_custos`
--

CREATE TABLE `centro_custos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `centro_custos`
--

INSERT INTO `centro_custos` (`id`, `nome`, `status`) VALUES
(1, 'Casa', 0),
(2, 'Academia', 1),
(3, 'SalÃ¡rio', 1),
(4, 'Teste', 0),
(5, 'teste2', 0),
(6, 'Casa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `nome`, `status`) VALUES
(2, 'Bradesco', 0),
(3, 'Banrisull', 0),
(4, 'Santander', 1),
(5, 'Banrisul', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `descricao`, `status`) VALUES
(1, 'cadeira inox', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_centro_custos` int(10) UNSIGNED NOT NULL,
  `id_conta` int(10) UNSIGNED NOT NULL,
  `tipo_mov` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `id_centro_custos`, `id_conta`, `tipo_mov`, `data`, `descricao`, `valor`) VALUES
(2, 2, 4, 'debito', '0000-00-00', 'Tenho desc', '100.00'),
(4, 2, 4, 'debito', '2018-12-29', 'Comprei uma luva', '230.00'),
(6, 2, 5, 'debito', '2018-12-27', 'Comprei uma pasta proteica', '100.00'),
(7, 6, 5, 'debito', '2018-12-28', 'Tapete vermelho', '100.00'),
(43, 2, 5, 'debito', '2018-12-02', 'Mensalidade academia', '100.00'),
(45, 2, 5, 'credito', '2018-12-02', '', '10.00'),
(46, 2, 5, 'debito', '2018-12-02', '', '100.00'),
(48, 3, 4, 'credito', '2018-12-02', 'ganhei uma grana', '100.00'),
(49, 3, 5, 'debito', '2018-12-02', 'escola', '200.00'),
(52, 3, 5, 'credito', '2018-12-02', '', '50.00'),
(53, 3, 4, 'credito', '2018-12-02', 'Recebi meu salÃ¡rio', '1000.00'),
(56, 3, 5, 'credito', '2018-12-02', 'Ganho um troco', '100.00'),
(58, 2, 5, 'debito', '2018-12-02', 'Perdi 20 mango', '20.00'),
(59, 2, 5, 'debito', '2018-12-02', 'Perdi 20 mango', '20.00'),
(60, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(61, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(62, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(63, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(64, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(65, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(66, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(67, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(68, 2, 4, 'credito', '2018-12-02', '', '10.00'),
(69, 2, 4, 'credito', '2018-12-02', '', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parcelas`
--

CREATE TABLE `parcelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_centro_custos` int(10) UNSIGNED NOT NULL,
  `id_conta` int(10) UNSIGNED NOT NULL,
  `id_item` int(11) NOT NULL,
  `tipo_mov` varchar(10) NOT NULL,
  `parcela` varchar(10) NOT NULL,
  `vencimento` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status_pagamento` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recorrentes`
--

CREATE TABLE `recorrentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_centro_custos` int(10) UNSIGNED NOT NULL,
  `id_conta` int(10) UNSIGNED NOT NULL,
  `tipo_mov` varchar(10) DEFAULT NULL,
  `dia` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recorrentes`
--

INSERT INTO `recorrentes` (`id`, `id_centro_custos`, `id_conta`, `tipo_mov`, `dia`, `descricao`, `valor`) VALUES
(4, 2, 4, 'credito', 2, '', '10.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `recorrentes_movimentacao`
--

CREATE TABLE `recorrentes_movimentacao` (
  `id_recorrentes` int(10) UNSIGNED NOT NULL,
  `id_movimentacao` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recorrentes_movimentacao`
--

INSERT INTO `recorrentes_movimentacao` (`id_recorrentes`, `id_movimentacao`, `data`) VALUES
(4, 69, '2018-12-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centro_custos`
--
ALTER TABLE `centro_custos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_centro_custos` (`id_centro_custos`),
  ADD KEY `id_conta` (`id_conta`);

--
-- Indexes for table `parcelas`
--
ALTER TABLE `parcelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_centro_custos` (`id_centro_custos`),
  ADD KEY `id_conta` (`id_conta`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `recorrentes`
--
ALTER TABLE `recorrentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_centro_custos` (`id_centro_custos`),
  ADD KEY `id_conta` (`id_conta`);

--
-- Indexes for table `recorrentes_movimentacao`
--
ALTER TABLE `recorrentes_movimentacao`
  ADD KEY `id_recorrentes` (`id_recorrentes`),
  ADD KEY `id_movimentacao` (`id_movimentacao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centro_custos`
--
ALTER TABLE `centro_custos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `parcelas`
--
ALTER TABLE `parcelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recorrentes`
--
ALTER TABLE `recorrentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`id_centro_custos`) REFERENCES `centro_custos` (`id`),
  ADD CONSTRAINT `movimentacao_ibfk_2` FOREIGN KEY (`id_centro_custos`) REFERENCES `centro_custos` (`id`),
  ADD CONSTRAINT `movimentacao_ibfk_3` FOREIGN KEY (`id_conta`) REFERENCES `contas` (`id`);

--
-- Limitadores para a tabela `parcelas`
--
ALTER TABLE `parcelas`
  ADD CONSTRAINT `parcelas_ibfk_1` FOREIGN KEY (`id_centro_custos`) REFERENCES `centro_custos` (`id`),
  ADD CONSTRAINT `parcelas_ibfk_2` FOREIGN KEY (`id_conta`) REFERENCES `contas` (`id`),
  ADD CONSTRAINT `parcelas_ibfk_3` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`);

--
-- Limitadores para a tabela `recorrentes`
--
ALTER TABLE `recorrentes`
  ADD CONSTRAINT `recorrentes_ibfk_1` FOREIGN KEY (`id_centro_custos`) REFERENCES `centro_custos` (`id`),
  ADD CONSTRAINT `recorrentes_ibfk_2` FOREIGN KEY (`id_conta`) REFERENCES `contas` (`id`);

--
-- Limitadores para a tabela `recorrentes_movimentacao`
--
ALTER TABLE `recorrentes_movimentacao`
  ADD CONSTRAINT `recorrentes_movimentacao_ibfk_1` FOREIGN KEY (`id_recorrentes`) REFERENCES `recorrentes` (`id`),
  ADD CONSTRAINT `recorrentes_movimentacao_ibfk_2` FOREIGN KEY (`id_movimentacao`) REFERENCES `movimentacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
