-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2014 at 10:05 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hanzeproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
`id` int(11) NOT NULL,
  `omschrijving` varchar(45) NOT NULL,
  `prijs` decimal(10,2) DEFAULT '0.00',
  `tv` int(11) DEFAULT '0',
  `ib` int(11) DEFAULT '0',
  `gr` int(11) DEFAULT '0',
  `sg` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `omschrijving`, `prijs`, `tv`, `ib`, `gr`, `sg`) VALUES
(1, 'Heineken bier', '0.00', 60, 0, 0, 12),
(2, 'Rode wijn', '0.00', 25, 0, 0, 10),
(3, 'Witte wijn', '0.00', 25, 0, 0, 10),
(4, 'Melk', '0.00', 60, 0, 0, 20),
(5, 'Coca Cola', '0.00', 50, 0, 0, 20),
(6, 'Bief', '0.00', 50, 0, 0, 20),
(7, 'Tongfilet', '0.00', 50, 0, 0, 20);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE IF NOT EXISTS `klant` (
`id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefoon` varchar(13) DEFAULT NULL,
  `adres` varchar(45) NOT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `woonplaats` varchar(45) NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(32) NOT NULL,
  `datum_registratie` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=' ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE IF NOT EXISTS `medewerker` (
`id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `functie` varchar(45) NOT NULL,
  `afdeling` varchar(45) NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `actief` tinyint(1) DEFAULT '0',
  `daghap` tinyint(1) DEFAULT '0',
  `menu_soort_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `naam`, `prijs`, `actief`, `daghap`, `menu_soort_id`) VALUES
(1, 'Six Pack Heineken', '5.00', 1, 1, 4),
(2, 'TestVegaMenu', '10.00', 1, 0, 1),
(3, 'Biefstuk Schotel', '10.00', 1, 0, 2),
(4, 'Rode Wijn', '5.00', 1, 0, 4),
(5, 'Tongfilet Schotel', '12.00', 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_recept`
--

CREATE TABLE IF NOT EXISTS `menu_recept` (
  `menu_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_recept`
--

INSERT INTO `menu_recept` (`menu_id`, `recept_id`) VALUES
(1, 1),
(4, 2),
(3, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_soort`
--

CREATE TABLE IF NOT EXISTS `menu_soort` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menu_soort`
--

INSERT INTO `menu_soort` (`id`, `naam`) VALUES
(4, 'Dranken'),
(1, 'Vegetarisch'),
(3, 'Vis'),
(2, 'Vlees');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `status` enum('geplaatst','in bereiding','klaar') DEFAULT 'geplaatst',
  `betaald` tinyint(1) DEFAULT '0',
  `geplaatst` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_regel`
--

CREATE TABLE IF NOT EXISTS `order_regel` (
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recept`
--

CREATE TABLE IF NOT EXISTS `recept` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `recept`
--

INSERT INTO `recept` (`id`, `naam`) VALUES
(1, 'Six pack Heineken'),
(2, 'Rode Wijn'),
(3, 'Biefstuk Schotel'),
(4, 'Tongfilet Schotel');

-- --------------------------------------------------------

--
-- Table structure for table `recept_ingredient`
--

CREATE TABLE IF NOT EXISTS `recept_ingredient` (
  `recept_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recept_ingredient`
--

INSERT INTO `recept_ingredient` (`recept_id`, `ingredient_id`, `aantal`) VALUES
(1, 1, 6),
(2, 2, 1),
(3, 6, 1),
(4, 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `gebruikersnaam_UNIQUE` (`gebruikersnaam`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_menu_menu_soort1_idx` (`menu_soort_id`);

--
-- Indexes for table `menu_recept`
--
ALTER TABLE `menu_recept`
 ADD PRIMARY KEY (`menu_id`,`recept_id`), ADD KEY `fk_menu_has_recept_recept1_idx` (`recept_id`), ADD KEY `fk_menu_has_recept_menu1_idx` (`menu_id`);

--
-- Indexes for table `menu_soort`
--
ALTER TABLE `menu_soort`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `soort_UNIQUE` (`naam`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_ORDER_klant1_idx` (`klant_id`);

--
-- Indexes for table `order_regel`
--
ALTER TABLE `order_regel`
 ADD PRIMARY KEY (`order_id`,`menu_id`), ADD KEY `fk_ORDER_REGEL_menu1_idx` (`menu_id`), ADD KEY `fk_order_regel_order1_idx` (`order_id`);

--
-- Indexes for table `recept`
--
ALTER TABLE `recept`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recept_ingredient`
--
ALTER TABLE `recept_ingredient`
 ADD PRIMARY KEY (`recept_id`,`ingredient_id`), ADD KEY `fk_RECEPT_INGREDIENT_ingredient1_idx` (`ingredient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu_soort`
--
ALTER TABLE `menu_soort`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recept`
--
ALTER TABLE `recept`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `fk_menu_menu_soort1` FOREIGN KEY (`menu_soort_id`) REFERENCES `menu_soort` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu_recept`
--
ALTER TABLE `menu_recept`
ADD CONSTRAINT `fk_menu_has_recept_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_menu_has_recept_recept1` FOREIGN KEY (`recept_id`) REFERENCES `recept` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
ADD CONSTRAINT `fk_ORDER_klant1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_regel`
--
ALTER TABLE `order_regel`
ADD CONSTRAINT `fk_ORDER_REGEL_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_order_regel_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recept_ingredient`
--
ALTER TABLE `recept_ingredient`
ADD CONSTRAINT `fk_RECEPT_INGREDIENT_ingredient1` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredient` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_RECEPT_INGREDIENT_recept1` FOREIGN KEY (`recept_id`) REFERENCES `recept` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
