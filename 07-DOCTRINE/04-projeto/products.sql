-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Dez-2014 às 16:53
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
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `value`) VALUES
(1, 1, 'Batata', 'Batata Baroa', '1.88'),
(2, 2, 'Laranja', 'Laranja Iwoa', '1.99'),
(3, 3, 'Frango', 'Frango Saudavel', '8.75'),
(4, 4, 'FeijÃ£o', 'FeijÃ£o Baiano', '2.55'),
(5, 5, 'Detergente', 'Detergente Ype', '0.88'),
(6, 6, 'Shampoo', 'Shampoo Dove', '4.35'),
(7, 7, 'Bombom', 'Bombom Garoto', '2.99'),
(8, 8, 'PÃ£o', 'PÃ£o de Forma', '2.45'),
(9, 9, 'Balas', 'Bala Chita', '2.99'),
(10, 10, 'LimÃ£o', 'LimÃ£o Galo', '0.99'),
(11, 11, 'Banana', 'Banana Nanica', '2.78');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_category`
--

CREATE TABLE IF NOT EXISTS `products_category` (
`id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products_category`
--

INSERT INTO `products_category` (`id`, `category_name`) VALUES
(1, 'Legumes'),
(2, 'Frutas'),
(3, 'Frios'),
(4, 'GrÃ£os'),
(5, 'Limpeza'),
(6, 'Higiene'),
(7, 'Doces'),
(8, 'Padaria'),
(9, 'Doces'),
(10, 'Frutas'),
(11, 'Frutas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products_tags`
--

CREATE TABLE IF NOT EXISTS `products_tags` (
  `products_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `products_tags`
--

INSERT INTO `products_tags` (`products_id`, `tag_id`) VALUES
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(4, 1),
(4, 9),
(5, 3),
(5, 4),
(6, 3),
(6, 4),
(6, 9),
(7, 1),
(7, 5),
(7, 9),
(8, 1),
(8, 7),
(8, 8),
(9, 1),
(9, 9),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'alimentos'),
(2, 'compras'),
(3, 'fragil'),
(4, 'perigoso'),
(5, 'bonitos'),
(6, 'salgados'),
(7, 'quentes'),
(8, 'frios'),
(9, 'validade');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_B3BA5A5A12469DE2` (`category_id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_tags`
--
ALTER TABLE `products_tags`
 ADD PRIMARY KEY (`products_id`,`tag_id`), ADD KEY `IDX_E3AB5A2C6C8A81A9` (`products_id`), ADD KEY `IDX_E3AB5A2CBAD26311` (`tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `FK_B3BA5A5A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `products_category` (`id`);

--
-- Limitadores para a tabela `products_tags`
--
ALTER TABLE `products_tags`
ADD CONSTRAINT `FK_E3AB5A2CBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`),
ADD CONSTRAINT `FK_E3AB5A2C6C8A81A9` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
