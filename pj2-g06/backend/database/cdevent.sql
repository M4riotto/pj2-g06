-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2022 às 17:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cdevent`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `dia` varchar(11) NOT NULL,
  `horario` varchar(11) NOT NULL,
  `capa` varchar(300) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `limiteP` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `descricao`, `dia`, `horario`, `capa`, `municipio`, `uf`, `endereco`, `limiteP`, `categoria`) VALUES
(24, 'LIONS', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem eum voluptatibus eaque fugiat. Assumenda asperiores,', '10-01-2023', '20:30hs', 'https://c0.wallpaperflare.com/preview/142/668/835/king-lion-the-lion-king-crown.jpg', '', '', '', 0, ''),
(27, 'Coach do Amor', 'ffhahsfa skdjkas sajdha asdhias', '2023-02-21', '21:22', 'https://blog.emania.com.br/wp-content/uploads/2015/11/lua-de-mel-2.jpg', 'Caraguatatuba', 'SP', 'Av. Marechal - Nº305', 12, 'festas'),
(30, 'Giovanna Siqueira Nicolau ', '1211sfa fsedfv rgdfs dfg dfgdf ertwersAWEADFS RS RT', '', '', 'https://blog.emania.com.br/wp-content/uploads/2015/11/lua-de-mel-2.jpg', 'Caraguatatuba', 'RJ', 'Av. Marechal - Nº305', 122, 'palestras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataNascimento` date NOT NULL,
  `nome` varchar(220) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(220) CHARACTER SET utf8 NOT NULL,
  `senha_usuario` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `dataNascimento`, `nome`, `email`, `sexo`, `usuario`, `senha_usuario`) VALUES
(8, '490.401.288-71', '2003-07-18', 'Vitor', 'vitormariotto03@gmail.com', 'M', 'vitor', '$2y$10$DpkFTj6mWvC0DMHAfKmEEu44zsLdhxg5VQfqFIP0E20pslpcirfDS'),
(12, '490.401.288-71', '2022-11-08', 'cassio', 'fulltimenetworkingfotos@gmail.com', 'M', 'cassiomoreira', '$2y$10$do03tSTUFMnEG2SP8gM9sOXokd3y.fZwn6vly3roHvjU76TxPiW7O');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
