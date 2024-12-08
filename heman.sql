-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2024 às 15:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `heman`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `frequencia` int(11) DEFAULT NULL,
  `objetivo` varchar(255) DEFAULT NULL,
  `data_matricula` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `data_nascimento`, `telefone`, `endereco`, `frequencia`, `objetivo`, `data_matricula`, `ativo`) VALUES
(0, 'ALEXANDRE ROSSI BENASSI', '2024-12-06', '(44) 9701-1869', 'Avenida.Guiomar.Gaspar.Batista ', 5, 'asd', '2024-12-07', 1),
(6, 'Alexandre Rossi Benassi', '2004-02-03', '111111111', 'Avenida Guiomar Gaspar Batista ', 5, 'Ficar bombado', '2030-12-04', 1),
(7, 'Luiz', '2004-02-03', '111111111', 'Rua 1', 5, 'Ficar bombado', '2030-12-06', 0),
(8, 'João', '2004-02-03', '111111111', 'Av Rio', 5, 'Ficar bombado', '2030-01-04', 0),
(9, 'Paulo', '2004-02-03', '111111111', 'Rua malu', 5, 'Ficar bombado', '2024-12-04', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `nome` varchar(255) NOT NULL,
  `tipo_exercicio` varchar(255) NOT NULL,
  `grupo_muscular` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `exercicio`
--

INSERT INTO `exercicio` (`nome`, `tipo_exercicio`, `grupo_muscular`, `id`) VALUES
('Sumo', 'Musculação', 'Gluteos', 1),
('ferro', 'Musculação', 'Superiores', 4),
('Terra', 'musculacao', 'membros interiores', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dia_treino` varchar(335) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ficha`
--



-- --------------------------------------------------------

--
-- Estrutura para tabela `ficha_exercicio`
--

CREATE TABLE `ficha_exercicio` (
  `id` int(11) NOT NULL,
  `ficha_id` int(11) DEFAULT NULL,
  `exercicio_id` int(11) DEFAULT NULL,
  `num_series` int(11) DEFAULT NULL,
  `num_repeticoes` int(11) DEFAULT NULL,
  `tempo_descanso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ficha_exercicio`
--


-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `turno_disponivel` varchar(255) DEFAULT NULL,
  `data_matricula` date NOT NULL,
  `ativo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_nascimento`, `telefone`, `endereco`, `turno_disponivel`, `data_matricula`, `ativo`) VALUES
(23, 'Alexandre Rossi Benassi', '2024-12-11', '44997011869', 'Avenida Guiomar Gaspar Batista ', 'Manhã', '2024-12-04', 0),
(24, 'Luiz', '2024-12-06', '44997011869', 'asdasd', 'Manhã', '2025-01-02', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
