-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 10-Dez-2014 às 17:45
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `value`) VALUES
(1, 'Laranja', 'Laranja iowa', '3,75'),
(2, 'Laranja Lima', 'Laranja Lima', '2,59'),
(3, 'Banana', 'Banana Prata', '1,55'),
(4, 'Banana', 'Banana Nanica', '2,99'),
(5, 'Manga', 'Manga Mantega', '1,20'),
(6, 'Manga', 'Manga Rosa', '0,99'),
(7, 'Uva', 'Uva Niagara', '5,99'),
(8, 'Melancia', 'Melancia', '0,99'),
(9, 'Pera', 'Pera Argentina', '6,89'),
(10, 'MaÃ§a', 'MaÃ§a Argentina', '2,00'),
(11, 'MelÃ£o', 'MelÃ£o Amarelo', '0,88'),
(12, 'MelÃ£o', 'MelÃ£o Cantaloupe', '2.30'),
(13, 'LimÃ£o', 'LimÃ£o Galego', '1,99'),
(14, 'LimÃ£o', 'LimÃ£o Tahiti', '2,67'),
(15, 'Tangerina', 'Tangerina', '3,12'),
(16, 'LimÃ£o', 'LimÃ£o Cravo', '1,99'),
(17, 'Ameixa', 'Ameixa', '2,75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
