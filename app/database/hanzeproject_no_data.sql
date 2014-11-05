-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 05, 2014 at 06:49 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

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
-- Table structure for table `afdeling`
--

CREATE TABLE `afdeling` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `afdeling_medewerker`
--

CREATE TABLE `afdeling_medewerker` (
  `medewerker_id` int(11) NOT NULL,
  `afdeling_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
`id` int(11) NOT NULL,
  `omschrijving` varchar(45) NOT NULL,
  `prijs` decimal(10,2) DEFAULT '0.00',
  `tv` int(11) DEFAULT '0',
  `ib` int(11) DEFAULT '0',
  `gr` int(11) DEFAULT '0',
  `sg` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
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

CREATE TABLE `medewerker` (
`id` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `functie` varchar(45) NOT NULL,
  `gebruikersnaam` varchar(45) NOT NULL,
  `wachtwoord` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `actief` tinyint(1) DEFAULT '0',
  `daghap` tinyint(1) DEFAULT '0',
  `menu_soort_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_recept`
--

CREATE TABLE `menu_recept` (
  `menu_id` int(11) NOT NULL,
  `recept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_soort`
--

CREATE TABLE `menu_soort` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
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

CREATE TABLE `order_regel` (
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `prijs` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recept`
--

CREATE TABLE `recept` (
`id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `recept_ingredient`
--

CREATE TABLE `recept_ingredient` (
  `recept_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdeling`
--
ALTER TABLE `afdeling`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `naam_UNIQUE` (`naam`);

--
-- Indexes for table `afdeling_medewerker`
--
ALTER TABLE `afdeling_medewerker`
 ADD PRIMARY KEY (`medewerker_id`,`afdeling_id`), ADD KEY `fk_afdelingen_has_medewerker_medewerker1_idx` (`medewerker_id`), ADD KEY `fk_afdeling__medewerker_afdeling1_idx` (`afdeling_id`);

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
-- AUTO_INCREMENT for table `afdeling`
--
ALTER TABLE `afdeling`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `afdeling_medewerker`
--
ALTER TABLE `afdeling_medewerker`
ADD CONSTRAINT `fk_afdeling__medewerker_afdeling1` FOREIGN KEY (`afdeling_id`) REFERENCES `afdeling` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_afdelingen_has_medewerker_medewerker1` FOREIGN KEY (`medewerker_id`) REFERENCES `medewerker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
