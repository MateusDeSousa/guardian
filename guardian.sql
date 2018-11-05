-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Nov-2018 às 18:35
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guardian`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(60) COLLATE utf8_bin NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `cnh` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

CREATE TABLE `tb_funcionario` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,  
  `password` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_locacao`
--

CREATE TABLE `tb_locacao` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id` int(11) NOT NULL,
  `car_brand` varchar(30) COLLATE utf8_bin NOT NULL,
  `car_model` varchar(30) COLLATE utf8_bin NOT NULL,
  `year` int(11) NOT NULL,
  `seats_qtd` int(11) NOT NULL,
  `air_cond` varchar(3) COLLATE utf8_bin NOT NULL,
  `abs` varchar(3) COLLATE utf8_bin NOT NULL,
  `sound` varchar(3) COLLATE utf8_bin NOT NULL,
  `door_qtd` int(11) NOT NULL,
  `status` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_locacao`
--
ALTER TABLE `tb_locacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_locacao`
--
ALTER TABLE `tb_locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



--mudanças no banco 04/10/2018 16:46
ALTER TABLE `tb_funcionario` CHANGE `user` `username` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL;

ALTER TABLE `tb_funcionario` ADD `email` VARCHAR(100) NOT NULL ;

ALTER TABLE `tb_veiculo` ADD `chassis` VARCHAR(20) NOT NULL ;

ALTER TABLE `tb_veiculo` ADD PRIMARY KEY( `chassis`);

ALTER TABLE `tb_veiculo` ADD `value` REAL NOT NULL ;