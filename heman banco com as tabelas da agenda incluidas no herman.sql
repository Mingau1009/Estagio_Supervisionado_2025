-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/06/2025 às 03:04
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
  `cpf` char(11) NOT NULL,
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

INSERT INTO `aluno` (`id`, `nome`, `data_nascimento`, `cpf`, `telefone`, `endereco`, `frequencia`, `objetivo`, `data_matricula`, `ativo`) VALUES
(30, 'Alexandre Rossi Benassi', '2004-02-27', '06879534996', '44997011869', 'Avenida Guiomar Gaspar', 5, 'Ficar musculoso', '2025-06-13', 1),
(31, 'Joao', '1998-12-31', '10987678909', '44997168633', 'Avenida Torres', 5, 'asdasd', '2025-06-13', 1),
(32, 'Wesley Marcelino', '2005-02-25', '58226792001', '44997168633', 'Rua presidente Vargas', 5, 'Ficar musculoso', '2025-06-17', 1),
(33, 'Izabela Cabral Goya', '2025-06-19', '58226792012', '44997168633', 'ave', 3, 'asd', '2025-06-21', 1),
(44, 'Wesley Marcelino', '2025-06-12', '58226792007', '44997011869', 'asda', 4, 'asdsad', '2025-06-21', 1),
(46, 'Wesley Marcelino', '2025-06-21', '06592359009', '44997168633', 'asd', 4, 'asd', '2025-06-21', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `criar_aula`
--

CREATE TABLE `criar_aula` (
  `id` int(11) NOT NULL,
  `nome_aula` varchar(100) NOT NULL,
  `dia_aula` varchar(100) NOT NULL,
  `horario_aula` time NOT NULL,
  `professor_aula` varchar(100) NOT NULL,
  `local_aula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `criar_aula`
--

INSERT INTO `criar_aula` (`id`, `nome_aula`, `dia_aula`, `horario_aula`, `professor_aula`, `local_aula`) VALUES
(18, 'Zumba', 'SABADO', '09:00:00', 'Izabela Cabral Goya', 'Sala 1'),
(19, 'Corrida', 'QUARTA', '17:30:00', 'Alexandre Rossi Benassi', 'Sala 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dieta`
--

CREATE TABLE `dieta` (
  `id` int(11) NOT NULL,
  `nome_aluno` varchar(50) NOT NULL,
  `dia_refeicao` varchar(50) NOT NULL,
  `tipo_refeicao` varchar(50) NOT NULL,
  `horario_refeicao` time NOT NULL,
  `descricao` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dieta`
--

INSERT INTO `dieta` (`id`, `nome_aluno`, `dia_refeicao`, `tipo_refeicao`, `horario_refeicao`, `descricao`) VALUES
(8, '30', 'SEGUNDA', 'Pré Treino', '18:30:00', 'asdassaas'),
(9, '33', 'TERCA', 'Pré Treino', '18:30:00', 'asdsa'),
(10, '32', 'TERCA', 'Pré Treino', '23:23:00', 'dasds'),
(11, '31', 'QUARTA', 'Pré Treino', '00:59:00', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento_aluno`
--

CREATE TABLE `evento_aluno` (
  `id` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `evento_aluno`
--

INSERT INTO `evento_aluno` (`id`, `evento_id`, `aluno_id`) VALUES
(35, 18, 30),
(36, 18, 31),
(41, 19, 31),
(42, 19, 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `color` varchar(45) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('Corrida', 'MUSCULAÇÃO', 'ABDÔMEN', 11),
('Abdominal', 'MUSCULAÇÃO', 'ABDÔMEN', 12),
('Campe', 'MUSCULAÇÃO', 'CARDIO', 13),
('Terra', 'CARDIO', 'ABDÔMEN', 14),
('ASD', 'CARDIO', 'CARDIO', 15),
('Sumo', 'MUSCULAÇÃO', 'CARDIO', 16),
('Corrida', 'CARDIO', 'ABDÔMEN', 17);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ficha`
--

CREATE TABLE `ficha` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `dia_treino` varchar(335) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ficha`
--

INSERT INTO `ficha` (`id`, `aluno_id`, `dia_treino`) VALUES
(20, 32, 'SEGUNDA'),
(22, 32, 'SEXTA'),
(23, 31, 'TERCA'),
(25, 32, 'QUARTA');

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

INSERT INTO `ficha_exercicio` (`id`, `ficha_id`, `exercicio_id`, `num_series`, `num_repeticoes`, `tempo_descanso`) VALUES
(79, 20, 12, 13, 30, 100),
(83, 22, 12, 12, 12, 12),
(84, 0, 13, 12, 12, 12),
(85, 0, 13, 12, 12, 12),
(87, 0, 15, 12, 12, 12),
(88, 25, 15, 12, 12, 12),
(89, 25, 15, 12, 12, 12),
(94, 23, 15, 12, 21, 21),
(95, 23, 15, 12, 12, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `turno_disponivel` varchar(255) DEFAULT NULL,
  `data_matricula` date NOT NULL,
  `ativo` tinyint(1) DEFAULT 1,
  `cpf` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_nascimento`, `telefone`, `endereco`, `turno_disponivel`, `data_matricula`, `ativo`, `cpf`) VALUES
(45, 'Alexandre Rossi Benassi', '2025-05-07', '44997168633', 'Rua Presidente Feliz Paiva 527', 'Manha', '2025-05-29', 1, '58226792002'),
(46, 'Ezequiel', '2025-06-11', '44997168633', 'Rua presidente Vargas', 'Manha', '2025-06-13', 0, '06879534994'),
(47, 'Alexandre Rossi Benassi', '2025-06-04', '44997168633', 'Rua Presidente Feliz Paiva 527', 'Manha', '2025-06-13', 1, '06879534999'),
(48, 'Izabela Cabral Goya', '2025-05-13', '44098789876', 'Rua Presidente Feliz Paiva 527', 'Manha', '2025-06-13', 1, '06879534991'),
(49, 'João Vitor', '1992-12-31', '44997168633', 'Rua presidente Vargas', 'Noite', '2025-06-21', 1, '87654678908'),
(50, 'Wesley Marcelino', '2025-06-03', '44997168633', 'ave', 'Tarde', '2025-06-21', 1, '06879534982');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `usuario_email` varchar(255) DEFAULT NULL,
  `acao` varchar(255) NOT NULL,
  `tabela_afetada` varchar(100) DEFAULT NULL,
  `registro_id` int(11) DEFAULT NULL,
  `dados_anteriores` longtext DEFAULT NULL,
  `dados_novos` longtext DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `data_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id`, `usuario_email`, `acao`, `tabela_afetada`, `registro_id`, `dados_anteriores`, `dados_novos`, `ip`, `user_agent`, `data_hora`) VALUES
(1, 'academia@gmail.com', 'EDICAO_FUNCIONARIO', 'funcionario', NULL, '{\n    \"id\": 46,\n    \"nome\": \"Ezequiel\",\n    \"data_nascimento\": \"2025-06-11\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua presidente Vargas\",\n    \"turno_disponivel\": \"Manha\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": 1,\n    \"cpf\": \"06879534994\"\n}', '{\n    \"nome\": \"Ezequiel\",\n    \"data_nascimento\": \"2025-06-11\",\n    \"cpf\": \"06879534994\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua presidente Vargas\",\n    \"turno_disponivel\": \"Manha\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": \"0\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:33:44'),
(2, 'academia@gmail.com', 'CADASTRO_FUNCIONARIO', 'funcionario', NULL, NULL, '{\n    \"nome\": \"João Vitor\",\n    \"data_nascimento\": \"1992-12-31\",\n    \"cpf\": \"87654678908\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua presidente Vargas\",\n    \"turno_disponivel\": \"Noite\",\n    \"data_matricula\": \"2025-06-21\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:34:16'),
(3, 'academia@gmail.com', 'EDICAO_ALUNO', 'aluno', NULL, '{\n    \"id\": 31,\n    \"nome\": \"Joao\",\n    \"data_nascimento\": \"1998-12-31\",\n    \"cpf\": \"10987678909\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Avenida Torres\",\n    \"frequencia\": 5,\n    \"objetivo\": \"asdasd\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": 0\n}', '{\n    \"nome\": \"Joao\",\n    \"data_nascimento\": \"1998-12-31\",\n    \"cpf\": \"10987678909\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Avenida Torres\",\n    \"frequencia\": \"5\",\n    \"objetivo\": \"asdasd\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": \"1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:34:24'),
(4, 'academia@gmail.com', 'EDICAO_ALUNO', 'aluno', NULL, '{\n    \"id\": 36,\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-06-15\",\n    \"cpf\": \"87896789009\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua presidente Vargas\",\n    \"frequencia\": 4,\n    \"objetivo\": \"ASD\",\n    \"data_matricula\": \"2025-05-13\",\n    \"ativo\": 1\n}', '{\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-06-15\",\n    \"cpf\": \"87896789032\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua presidente Vargas\",\n    \"frequencia\": \"4\",\n    \"objetivo\": \"ASD\",\n    \"data_matricula\": \"2025-05-13\",\n    \"ativo\": \"1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:36:38'),
(5, 'academia@gmail.com', 'TENTATIVA_CADASTRO_CPF_DUPLICADO', 'aluno', NULL, NULL, '{\n    \"cpf\": \"58226792002\",\n    \"nome\": \"Wesley Marcelino\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:42:44'),
(6, 'academia@gmail.com', 'CADASTRO_ALUNO', 'aluno', NULL, NULL, '{\n    \"id\": \"0\",\n    \"nome\": \"Wesley Marcelino\",\n    \"cpf\": \"58226792007\",\n    \"data_nascimento\": \"2025-06-12\",\n    \"telefone\": \"44997011869\",\n    \"data_matricula\": \"2025-06-21\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:42:47'),
(7, 'academia@gmail.com', 'TENTATIVA_CADASTRO_CPF_DUPLICADO', 'aluno', NULL, NULL, '{\n    \"cpf\": \"58226792007\",\n    \"nome\": \"Wesley Marcelino\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:44:04'),
(8, 'academia@gmail.com', 'TENTATIVA_CADASTRO_CPF_DUPLICADO', 'aluno', NULL, NULL, '{\n    \"cpf\": \"06879534996\",\n    \"nome\": \"Alexandre Rossi Benassi\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:44:21'),
(9, 'academia@gmail.com', 'TENTATIVA_CADASTRO_CPF_INVALIDO', 'aluno', NULL, NULL, '{\n    \"cpf\": \"068795341234\",\n    \"tamanho\": 12\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:46:41'),
(10, 'academia@gmail.com', 'CADASTRO_ALUNO', 'aluno', NULL, NULL, '{\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"cpf\": \"06879534123\",\n    \"data_nascimento\": \"2025-06-11\",\n    \"telefone\": \"44098789876\",\n    \"data_matricula\": \"2025-06-21\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 19:46:44'),
(11, 'academia@gmail.com', 'EDICAO_ALUNO', 'aluno', NULL, '{\n    \"id\": 30,\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2004-02-27\",\n    \"cpf\": \"06879534996\",\n    \"telefone\": \"44997011869\",\n    \"endereco\": \"Avenida Guiomar Gaspar\",\n    \"frequencia\": 5,\n    \"objetivo\": \"Ficar musculoso\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": 1\n}', '{\n    \"nome\": \"a\",\n    \"data_nascimento\": \"2004-02-27\",\n    \"cpf\": \"06879534996\",\n    \"telefone\": \"44997011869\",\n    \"endereco\": \"Avenida Guiomar Gaspar\",\n    \"frequencia\": \"5\",\n    \"objetivo\": \"Ficar musculoso\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": \"1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:35:53'),
(12, 'academia@gmail.com', 'EDICAO_ALUNO', 'aluno', NULL, '{\n    \"id\": 30,\n    \"nome\": \"a\",\n    \"data_nascimento\": \"2004-02-27\",\n    \"cpf\": \"06879534996\",\n    \"telefone\": \"44997011869\",\n    \"endereco\": \"Avenida Guiomar Gaspar\",\n    \"frequencia\": 5,\n    \"objetivo\": \"Ficar musculoso\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": 1\n}', '{\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2004-02-27\",\n    \"cpf\": \"06879534996\",\n    \"telefone\": \"44997011869\",\n    \"endereco\": \"Avenida Guiomar Gaspar\",\n    \"frequencia\": \"5\",\n    \"objetivo\": \"Ficar musculoso\",\n    \"data_matricula\": \"2025-06-13\",\n    \"ativo\": \"1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:36:10'),
(13, 'academia@gmail.com', 'CADASTRO_EXERCICIO', 'exercicio', NULL, NULL, '{\n    \"nome\": \"Corrida\",\n    \"tipo_exercicio\": \"CARDIO\",\n    \"grupo_muscular\": \"MEMBROS INFERIORES\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:52:17'),
(14, 'academia@gmail.com', 'EDICAO_EXERCICIO', 'exercicio', NULL, '{\n    \"nome\": \"Corrida\",\n    \"tipo_exercicio\": \"CARDIO\",\n    \"grupo_muscular\": \"MEMBROS INFERIORES\",\n    \"id\": 17\n}', '{\n    \"nome\": \"Corrida\",\n    \"tipo_exercicio\": \"CARDIO\",\n    \"grupo_muscular\": \"ABDÔMEN\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:52:25'),
(15, 'academia@gmail.com', 'EDICAO_DIETA', 'dieta', NULL, '{\n    \"id\": 8,\n    \"nome_aluno\": \"30\",\n    \"dia_refeicao\": \"SEGUNDA\",\n    \"tipo_refeicao\": \"Pré Treino\",\n    \"horario_refeicao\": \"18:30:00\",\n    \"descricao\": \"asdas\"\n}', '{\n    \"nome_aluno\": \"30\",\n    \"dia_refeicao\": \"SEGUNDA\",\n    \"tipo_refeicao\": \"Pré Treino\",\n    \"horario_refeicao\": \"18:30:00\",\n    \"descricao\": \"asdassa\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:55:05'),
(16, 'academia@gmail.com', 'CADASTRO_DIETA', 'dieta', NULL, NULL, '{\n    \"nome_aluno\": \"31\",\n    \"dia_refeicao\": \"QUARTA\",\n    \"tipo_refeicao\": \"Pré Treino\",\n    \"horario_refeicao\": \"00:59\",\n    \"descricao\": \"\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:55:19'),
(17, 'academia@gmail.com', 'EDICAO_AULA', 'criar_aula', 18, '{\n    \"id\": 18,\n    \"nome_aula\": \"Zumba\",\n    \"dia_aula\": \"SABADO\",\n    \"horario_aula\": \"09:00:00\",\n    \"professor_aula\": \"Izabela Cabral Goya\",\n    \"local_aula\": \"Sala 2\"\n}', '{\n    \"nome_aula\": \"Zumba\",\n    \"dia_aula\": \"SABADO\",\n    \"horario_aula\": \"09:00\",\n    \"professor_aula\": \"Izabela Cabral Goya\",\n    \"local_aula\": \"Sala 1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 20:59:51'),
(18, 'academia@gmail.com', 'CADASTRO_AULA', 'criar_aula', NULL, NULL, '{\n    \"nome_aula\": \"Corrida\",\n    \"dia_aula\": \"QUARTA\",\n    \"horario_aula\": \"17:30\",\n    \"professor_aula\": \"Alexandre Rossi Benassi\",\n    \"local_aula\": \"Sala 2\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:00:07'),
(19, 'academia@gmail.com', 'EDITAR_ALUNOS_AULA', 'evento_aluno', NULL, '{\n    \"evento_id\": \"19\",\n    \"alunos\": [\n        30\n    ]\n}', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:33:39'),
(20, 'academia@gmail.com', 'CADASTRAR_ALUNOS_AULA', 'evento_aluno', NULL, NULL, '{\n    \"evento_id\": \"19\",\n    \"alunos\": [\n        \"31\",\n        \"30\",\n        \"33\"\n    ]\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:33:59'),
(21, 'academia@gmail.com', 'EDITAR_ALUNOS_AULA', 'evento_aluno', NULL, '{\n    \"evento_id\": \"19\",\n    \"alunos\": [\n        31,\n        30,\n        33\n    ]\n}', '{\n    \"evento_id\": \"19\",\n    \"alunos\": [\n        31,\n        30\n    ]\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:34:10'),
(22, 'academia@gmail.com', 'EDICAO_DIETA', 'dieta', NULL, '{\n    \"id\": 8,\n    \"nome_aluno\": \"30\",\n    \"dia_refeicao\": \"SEGUNDA\",\n    \"tipo_refeicao\": \"Pré Treino\",\n    \"horario_refeicao\": \"18:30:00\",\n    \"descricao\": \"asdassa\"\n}', '{\n    \"nome_aluno\": \"30\",\n    \"dia_refeicao\": \"SEGUNDA\",\n    \"tipo_refeicao\": \"Pré Treino\",\n    \"horario_refeicao\": \"18:30:00\",\n    \"descricao\": \"asdassaas\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:34:36'),
(23, 'academia@gmail.com', 'CADASTRO_ALUNO', 'aluno', NULL, NULL, '{\n    \"nome\": \"Wesley Marcelino\",\n    \"cpf\": \"06592359009\",\n    \"data_nascimento\": \"2025-06-21\",\n    \"telefone\": \"44997168633\",\n    \"data_matricula\": \"2025-06-21\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:51:56'),
(24, 'academia@gmail.com', 'EDICAO_ALUNO', 'aluno', NULL, '{\n    \"id\": 46,\n    \"nome\": \"Wesley Marcelino\",\n    \"data_nascimento\": \"2025-06-21\",\n    \"cpf\": \"06592359009\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"asd\",\n    \"frequencia\": 4,\n    \"objetivo\": \"asd\",\n    \"data_matricula\": \"2025-06-21\",\n    \"ativo\": 1\n}', '{\n    \"nome\": \"Wesley Marcelino\",\n    \"data_nascimento\": \"2025-06-21\",\n    \"cpf\": \"06592359009\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"asd\",\n    \"frequencia\": \"4\",\n    \"objetivo\": \"asd\",\n    \"data_matricula\": \"2025-06-21\",\n    \"ativo\": \"0\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:52:00'),
(25, 'academia@gmail.com', 'GERACAO_PDF_ALUNOS', 'aluno', NULL, NULL, '{\n    \"tipo\": \"relatorio_completo\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:52:05'),
(26, 'academia@gmail.com', 'GERACAO_PDF_ALUNOS', 'aluno', NULL, NULL, '{\n    \"tipo\": \"relatorio_completo\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:52:43'),
(27, 'academia@gmail.com', 'EDICAO_FUNCIONARIO', 'funcionario', NULL, '{\n    \"id\": 45,\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-05-07\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua Presidente Feliz Paiva 527\",\n    \"turno_disponivel\": \"Tarde\",\n    \"data_matricula\": \"2025-05-29\",\n    \"ativo\": 1,\n    \"cpf\": \"58226792002\"\n}', '{\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-05-07\",\n    \"cpf\": \"58226792002\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua Presidente Feliz Paiva 527\",\n    \"turno_disponivel\": \"Manha\",\n    \"data_matricula\": \"2025-05-29\",\n    \"ativo\": \"0\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:53:12'),
(28, 'academia@gmail.com', 'EDICAO_FUNCIONARIO', 'funcionario', NULL, '{\n    \"id\": 45,\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-05-07\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua Presidente Feliz Paiva 527\",\n    \"turno_disponivel\": \"Manha\",\n    \"data_matricula\": \"2025-05-29\",\n    \"ativo\": 0,\n    \"cpf\": \"58226792002\"\n}', '{\n    \"nome\": \"Alexandre Rossi Benassi\",\n    \"data_nascimento\": \"2025-05-07\",\n    \"cpf\": \"58226792002\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"Rua Presidente Feliz Paiva 527\",\n    \"turno_disponivel\": \"Manha\",\n    \"data_matricula\": \"2025-05-29\",\n    \"ativo\": \"1\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:53:16'),
(29, 'academia@gmail.com', 'CADASTRO_FUNCIONARIO', 'funcionario', NULL, NULL, '{\n    \"nome\": \"Wesley Marcelino\",\n    \"data_nascimento\": \"2025-06-03\",\n    \"cpf\": \"06879534982\",\n    \"telefone\": \"44997168633\",\n    \"endereco\": \"ave\",\n    \"turno_disponivel\": \"Tarde\",\n    \"data_matricula\": \"2025-06-21\"\n}', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0 (Edition std-2)', '2025-06-21 21:53:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `phone` varchar(220) NOT NULL,
  `profissional` enum('S','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_unico` (`cpf`) USING BTREE;

--
-- Índices de tabela `criar_aula`
--
ALTER TABLE `criar_aula`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dieta`
--
ALTER TABLE `dieta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `evento_aluno`
--
ALTER TABLE `evento_aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `aluno_id` (`aluno_id`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ficha_exercicio`
--
ALTER TABLE `ficha_exercicio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_unico_funcionario` (`cpf`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `criar_aula`
--
ALTER TABLE `criar_aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `dieta`
--
ALTER TABLE `dieta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `evento_aluno`
--
ALTER TABLE `evento_aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `ficha_exercicio`
--
ALTER TABLE `ficha_exercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `evento_aluno`
--
ALTER TABLE `evento_aluno`
  ADD CONSTRAINT `evento_aluno_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `criar_aula` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evento_aluno_ibfk_2` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
