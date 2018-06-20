-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 08:10 PM
-- Server version: 10.1.29-MariaDB-6
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2_2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fkIdEstCivil` int(11) NOT NULL,
  `fkIdProfissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `telefone`, `endereco`, `sexo`, `fkIdEstCivil`, `fkIdProfissao`) VALUES
(2, 'Camilla Vanessa de Souza Bim', 'camillabim@yahoo.com.br', '', '', 'F', 1, 1),
(3, 'FlÃ¡via Lopes', 'flavia.lopes@academico.ifg.edu.br', '', '', 'F', 1, 4),
(4, 'Renato Oliveira Abreu', 'renato.abreu.info@gmail.com', '(64) 99999-9999', 'Rua Fulano de Tal, 2525', 'M', 2, 2),
(5, 'Guilherme Ferraz Franco', 'guilhermeferraz123@gmail.com', '6499999-9999', 'Rua teste', 'M', 1, 3),
(6, 'Jonathan', 'jonathan@ifg.edu.br', '64999999999', 'rua teste', 'M', 2, 4),
(7, 'Teste de ProfissÃ£o', 'teste@gmail.com', '64991115544', 'Rua teste', 'M', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `est_civil`
--

CREATE TABLE `est_civil` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `est_civil`
--

INSERT INTO `est_civil` (`id`, `descricao`) VALUES
(1, 'Solteiro'),
(2, 'Casado'),
(3, 'Divorciado'),
(4, 'Amasiado'),
(5, 'Viúvo');

-- --------------------------------------------------------

--
-- Table structure for table `profissao`
--

CREATE TABLE `profissao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profissao`
--

INSERT INTO `profissao` (`id`, `descricao`) VALUES
(1, 'Programadora'),
(2, 'Professor'),
(3, 'Analista Banco de Dados'),
(4, 'Estudante');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdEstCivil` (`fkIdEstCivil`),
  ADD KEY `fkIdProfissao` (`fkIdProfissao`);

--
-- Indexes for table `est_civil`
--
ALTER TABLE `est_civil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profissao`
--
ALTER TABLE `profissao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `est_civil`
--
ALTER TABLE `est_civil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profissao`
--
ALTER TABLE `profissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fkClienteEstCivil` FOREIGN KEY (`fkIdEstCivil`) REFERENCES `est_civil` (`id`),
  ADD CONSTRAINT `fkClienteProfissao` FOREIGN KEY (`fkIdProfissao`) REFERENCES `profissao` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
