-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2022 às 23:55
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_inovall`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioscadastro`
--

CREATE TABLE `usuarioscadastro` (
  `Id` int(12) NOT NULL,
  `Usuario` varchar(60) NOT NULL,
  `Senha` varchar(45) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefone` varchar(19) DEFAULT NULL,
  `Foto` longblob DEFAULT NULL,
  `Data_de_Nascimento` varchar(11) DEFAULT NULL,
  `Ativo` tinyint(1) NOT NULL,
  `CEP` varchar(9) DEFAULT NULL,
  `Endereco` varchar(100) DEFAULT NULL,
  `Complemento` varchar(100) DEFAULT NULL,
  `Bairro` varchar(60) DEFAULT NULL,
  `Cidade` varchar(60) DEFAULT NULL,
  `Estado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarioscadastro`
--

INSERT INTO `usuarioscadastro` (`Id`, `Usuario`, `Senha`, `Nome`, `CPF`, `Email`, `Telefone`, `Foto`, `Data_de_Nascimento`, `Ativo`, `CEP`, `Endereco`, `Complemento`, `Bairro`, `Cidade`, `Estado`) VALUES
(1, 'Luís ', 'luis123', 'Luis Tavares', '111.111.111-11', 'luis@gmail.com', '+55 (84) 98888-8888', 0x6c7569732e6a7067, '17/04/1956', 1, '59062-530', 'Rua Tereza Campos', '', 'Lagoa Nova', 'Natal', 'RN'),
(2, 'Claudia', 'claudia123', 'Claudia Tavares', '111.111.111-12', 'claudia@gmail.com', '+55 (84) 99999-9999', 0x636c61756469612e6a7067, '17/05/1978', 1, '59062-530', 'Rua Tereza Campos', '', 'Lagoa Nova', 'Natal', 'RN'),
(3, 'João', 'joao123', 'João Pedro', '111.111.111-13', 'joao@gmail.com', '+55 (84) 97777-7777', 0x6a6f616f2e6a7067, '15/08/1989', 1, '59010-020', 'Rua Feliciano Coelho', '', 'Praia do Meio', 'Natal', 'RN');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarioscadastro`
--
ALTER TABLE `usuarioscadastro`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Usuario` (`Usuario`),
  ADD UNIQUE KEY `CPF` (`CPF`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Telefone` (`Telefone`);
ALTER TABLE `usuarioscadastro` ADD FULLTEXT KEY `Senha` (`Senha`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarioscadastro`
--
ALTER TABLE `usuarioscadastro`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
