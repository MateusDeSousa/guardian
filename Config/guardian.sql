-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Nov-2018 às 22:46
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

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
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `rented_car` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id`, `name`, `lastname`, `username`, `cnh`, `email`, `password`, `rented_car`) VALUES
(6, 'lucas k', 'pessoa', 'lucas1', 123123, 'asd@asd.com', '4297f44b13955235245b2497399d7a93', 0);

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
  `value` float NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `car_brand` varchar(30) COLLATE utf8_bin NOT NULL,
  `car_model` varchar(30) COLLATE utf8_bin NOT NULL,
  `client_name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_locacao`
--

INSERT INTO `tb_locacao` (`id`, `car_id`, `client_id`, `value`, `status`, `rent_date`, `return_date`, `car_brand`, `car_model`, `client_name`) VALUES
(412, 123, 321, 750, 'concluida', '2018-11-12', '2018-11-21', 'chevrolet', 'chevette', 'stefany do cross fox'),
(777, 12, 56, 800, 'pendente', '2018-11-21', '2018-11-24', 'caloi', 'gtx', 'Fulano De Tal');

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
  `status` varchar(30) COLLATE utf8_bin NOT NULL,
  `rent_date` datetime NOT NULL,
  `return_date` datetime NOT NULL,
  `value` float NOT NULL,
  `chassi` varchar(17) COLLATE utf8_bin NOT NULL,
  `board` varchar(7) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`id`, `car_brand`, `car_model`, `year`, `seats_qtd`, `air_cond`, `abs`, `sound`, `door_qtd`, `status`, `rent_date`, `return_date`, `value`, `chassi`, `board`) VALUES
(1, 'ford', 'fiesta', 2000, 5, 'sim', 'nao', 'sim', 4, 'disponivel', '2018-11-28 00:00:00', '2018-11-29 00:00:00', 70.5, '', ''),
(2, 'chevrolet', 'chevette', 1970, 5, 'nao', 'nao', 'sim', 4, 'disponivel', '2018-11-22 00:00:00', '2018-11-30 00:00:00', 50, '', ''),
(3, 'toyota', 'golf', 444, 444, 'sim', 'sim', 'nao', 444, 'disponivel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 80, 'hajk4018d', 'hyo4400'),
(4, 'toyota', 'golf', 123, 123, 'sim', 'sim', 'sim', 213, 'revisao', '0000-00-00 00:00:00', '2018-11-23 04:34:31', 80, '2134sdf35', 'hyo4400'),
(5, 'toyota', 'carro op', 123, 123, 'sim', 'sim', 'sim', 213, 'revisao', '0000-00-00 00:00:00', '2018-11-23 04:35:43', 80, '2134sdf35', 'hyo4400');

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
-- Indexes for table `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_locacao`
--
ALTER TABLE `tb_locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;

--
-- AUTO_INCREMENT for table `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
