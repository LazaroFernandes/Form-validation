-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Out-2021 às 13:17
-- Versão do servidor: 10.3.29-MariaDB-0+deb10u1
-- versão do PHP: 7.3.29-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aform`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `iddata` int(11) NOT NULL,
  `datastart` datetime NOT NULL,
  `dataend` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`iddata`, `datastart`, `dataend`) VALUES
(2, '2021-10-04 00:00:00', '2021-10-18 23:59:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idlivro` int(11) NOT NULL,
  `nomelivro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idlivro`, `nomelivro`) VALUES
(1, 'livro 1'),
(2, 'livro 2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `livro` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `relacao` int(11) NOT NULL,
  `opiniao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `register`
--

INSERT INTO `register` (`id`, `livro`, `nome`, `endereco`, `cpf`, `relacao`, `opiniao`) VALUES
(109, 1, 'ge', 'gege', '04678677046', 4, 'ffefefefefeeffefefefefe'),
(110, 2, 'fefe', 'fesfse', '04678677046', 6, 'rggrrgrgrgrg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relacao`
--

CREATE TABLE `relacao` (
  `idrelacao` int(11) NOT NULL,
  `nomerelacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relacao`
--

INSERT INTO `relacao` (`idrelacao`, `nomerelacao`) VALUES
(1, 'Comedia'),
(2, 'Terror'),
(3, 'Romance'),
(4, 'Auto-conhecimento '),
(5, 'Cientifico '),
(6, 'Poemas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`iddata`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idlivro`);

--
-- Índices para tabela `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relacao` (`relacao`),
  ADD KEY `id_livro` (`livro`) USING BTREE;

--
-- Índices para tabela `relacao`
--
ALTER TABLE `relacao`
  ADD PRIMARY KEY (`idrelacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `iddata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `idlivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `relacao`
--
ALTER TABLE `relacao`
  MODIFY `idrelacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `id_lei` FOREIGN KEY (`livro`) REFERENCES `livro` (`idlivro`),
  ADD CONSTRAINT `relacao` FOREIGN KEY (`relacao`) REFERENCES `relacao` (`idrelacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
