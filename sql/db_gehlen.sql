-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2018 às 01:41
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gehlen`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `estado` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` bigint(20) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `CIDADE` int(11) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `SEXO` char(1) NOT NULL,
  `RG_CNPJ` varchar(20) NOT NULL,
  `CPF_IE` varchar(20) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `DATA_NASCIMENTO` date DEFAULT NULL,
  `TELEFONE` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `USUARIO_INCLUSAO` varchar(50) DEFAULT NULL,
  `DATA_INCLUSAO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL,
  `pais` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_propriedade`
--

CREATE TABLE `imagem_propriedade` (
  `ID` int(11) NOT NULL,
  `ID_PROPRIEDADE` int(11) NOT NULL,
  `CAMINHO` varchar(250) DEFAULT NULL,
  `STATUS` int(11) NOT NULL,
  `USUARIO_CADASTRO` int(11) NOT NULL,
  `DATA_CADASTRO` datetime NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `propriedade`
--

CREATE TABLE `propriedade` (
  `ID` int(20) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `DESCRICAO` varchar(400) NOT NULL,
  `CLIENTE` bigint(20) NOT NULL,
  `VALOR` float NOT NULL,
  `AREA_M2` float NOT NULL,
  `USUARIO_CADASTRO` int(11) DEFAULT NULL,
  `DATA_CADASTRO` datetime DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DORMITORIO` int(11) DEFAULT '0',
  `BANHEIRO` int(11) DEFAULT '0',
  `GARAGEM` int(11) DEFAULT '0',
  `CIDADE` int(11) DEFAULT NULL,
  `ESTADO` int(11) DEFAULT NULL,
  `AVALIACAO` int(11) DEFAULT NULL,
  `STATUS_PROPRIEDADE` varchar(50) DEFAULT NULL,
  `TIPO_IMOVEL` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imovel`
--

CREATE TABLE `tipo_imovel` (
  `ID` bigint(20) NOT NULL,
  `NOME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(20) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CIDADE` varchar(50) NOT NULL,
  `ENDERECO` varchar(50) NOT NULL,
  `ESTADO` char(2) NOT NULL,
  `RG` varchar(20) NOT NULL,
  `IMAGEM` varchar(200) DEFAULT NULL,
  `FUNCAO` varchar(50) DEFAULT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `DATANASC` date NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `DATA_INCLUSAO` datetime DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CPF` varchar(50) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cidade_estado` (`estado`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Estado_pais` (`pais`);

--
-- Indexes for table `imagem_propriedade`
--
ALTER TABLE `imagem_propriedade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_IMAGEM_PROPRIEDADE` (`ID_PROPRIEDADE`);

--
-- Indexes for table `propriedade`
--
ALTER TABLE `propriedade`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_PROPRIEDADE_CLIENTE` (`CLIENTE`),
  ADD KEY `FK_PROPRIEDADE_USUARIO` (`USUARIO_CADASTRO`),
  ADD KEY `FK_PROPRIEDADE_CIDADE` (`CIDADE`),
  ADD KEY `FK_PROPRIEDADE_ESTADO` (`ESTADO`),
  ADD KEY `FK_PROPRIEDADE_TIPO_IMOVEL` (`TIPO_IMOVEL`);

--
-- Indexes for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5565;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID_CLIENTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `imagem_propriedade`
--
ALTER TABLE `imagem_propriedade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `propriedade`
--
ALTER TABLE `propriedade`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tipo_imovel`
--
ALTER TABLE `tipo_imovel`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `FK_CIDADE_ESTADO` FOREIGN KEY (`estado`) REFERENCES `estado` (`id`);

--
-- Limitadores para a tabela `imagem_propriedade`
--
ALTER TABLE `imagem_propriedade`
  ADD CONSTRAINT `FK_IMAGEM_PROPRIEDADE` FOREIGN KEY (`ID_PROPRIEDADE`) REFERENCES `propriedade` (`ID`);

--
-- Limitadores para a tabela `propriedade`
--
ALTER TABLE `propriedade`
  ADD CONSTRAINT `FK_PROPRIEDADE_CIDADE` FOREIGN KEY (`CIDADE`) REFERENCES `cidade` (`id`),
  ADD CONSTRAINT `FK_PROPRIEDADE_CLIENTE` FOREIGN KEY (`CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `FK_PROPRIEDADE_ESTADO` FOREIGN KEY (`ESTADO`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `FK_PROPRIEDADE_TIPO_IMOVEL` FOREIGN KEY (`TIPO_IMOVEL`) REFERENCES `tipo_imovel` (`ID`),
  ADD CONSTRAINT `FK_PROPRIEDADE_USUARIO` FOREIGN KEY (`USUARIO_CADASTRO`) REFERENCES `usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
