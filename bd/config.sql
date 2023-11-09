CREATE USER 'adm_plg'@'%' IDENTIFIED BY 'adm123';
GRANT ALL PRIVILEGES ON plg_log.* TO 'adm_plg'@'%';
GRANT ALL PRIVILEGES ON plg_log_adm.* TO 'adm_plg'@'%';
FLUSH PRIVILEGES;

CREATE DATABASE plg_log_adm;

USE plg_log_adm;

CREATE TABLE `usuarios` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(225) NOT NULL,
	`senha` varchar(500) NOT NULL,
	`salt` varchar(255) NOT NULL,
	`privilegio` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE DATABASE plg_log;

USE plg_log;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Tempo de geração: 06/11/2023 às 17:01
-- Versão do servidor: 8.0.26
-- Versão do PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `plg_log`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `autor` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

CREATE TABLE `movimentacao` (
  `id` int NOT NULL,
  `movimentacao` varchar(2) NOT NULL,
  `pallet1` varchar(255) NOT NULL DEFAULT '0',
  `pallet2` varchar(255) NOT NULL DEFAULT '0',
  `pallet3` varchar(255) NOT NULL DEFAULT '0',
  `pallet4` varchar(255) NOT NULL DEFAULT '0',
  `pallet5` varchar(255) NOT NULL DEFAULT '0',
  `pallet6` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `movimentacao`, `pallet1`, `pallet2`, `pallet3`, `pallet4`, `pallet5`, `pallet6`) VALUES
(1, '1', '2', '1', '1', '0', '0', '0'),
(2, '2', '1', '1', '0', '0', '0', '0'),
(3, '1', '1', '1', '1', '1', '4', '3'),
(4, '2', '0', '0', '0', '1', '3', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pallets`
--

CREATE TABLE `pallets` (
  `id` int NOT NULL,
  `autor` varchar(255) NOT NULL,
  `codigo` varchar(12) NOT NULL,
  `data` timestamp NOT NULL,
  `id_movimentacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pallets`
--

INSERT INTO `pallets` (`id`, `autor`, `codigo`, `data`, `id_movimentacao`) VALUES
(1, 'maycon', '123456789101', '2023-11-06 14:22:57', 1),
(2, 'maycon', '123456789101', '2023-11-06 14:23:09', 2),
(3, 'maycon', '123456789101', '2023-11-06 14:23:25', 3),
(4, 'maycon', '123456789101', '2023-11-06 14:23:37', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `autor` varchar(255) NOT NULL,
  `codigo` varchar(12) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `custo` varchar(255) NOT NULL,
  `lucro` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `autor`, `codigo`, `nome`, `modelo`, `descricao`, `custo`, `lucro`, `preco`, `volume`) VALUES
(1, 'maycon', '123456789101', 'Celular', 'GT 123-21', '8 Gb ram, 128 Gb', '1265', '20', '1518.00', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pallets`
--
ALTER TABLE `pallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pallets_fk0` (`id_movimentacao`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pallets`
--
ALTER TABLE `pallets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pallets`
--
ALTER TABLE `pallets`
  ADD CONSTRAINT `pallets_fk0` FOREIGN KEY (`id_movimentacao`) REFERENCES `movimentacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;