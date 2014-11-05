-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema hanzeproject
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `hanzeproject` ;

-- -----------------------------------------------------
-- Schema hanzeproject
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hanzeproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `hanzeproject` ;

-- -----------------------------------------------------
-- Table `hanzeproject`.`ingredient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`ingredient` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`ingredient` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `omschrijving` VARCHAR(45) NOT NULL,
  `prijs` DECIMAL(2) NULL DEFAULT 0,
  `tv` INT NULL DEFAULT 0,
  `ib` INT NULL DEFAULT 0,
  `gr` INT NULL DEFAULT 0,
  `sg` INT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`menu_soort`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`menu_soort` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`menu_soort` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `soort_UNIQUE` (`naam` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`menu` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`menu` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  `prijs` DECIMAL(2) NOT NULL,
  `actief` TINYINT(1) NULL DEFAULT 0,
  `daghap` TINYINT(1) NULL DEFAULT 0,
  `menu_soort_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_menu_menu_soort1_idx` (`menu_soort_id` ASC),
  CONSTRAINT `fk_menu_menu_soort1`
    FOREIGN KEY (`menu_soort_id`)
    REFERENCES `hanzeproject`.`menu_soort` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`recept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`recept` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`recept` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`recept_ingredient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`recept_ingredient` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`recept_ingredient` (
  `recept_id` INT NOT NULL,
  `ingredient_id` INT NOT NULL,
  `aantal` INT NOT NULL,
  PRIMARY KEY (`recept_id`, `ingredient_id`),
  INDEX `fk_RECEPT_INGREDIENT_ingredient1_idx` (`ingredient_id` ASC),
  CONSTRAINT `fk_RECEPT_INGREDIENT_recept1`
    FOREIGN KEY (`recept_id`)
    REFERENCES `hanzeproject`.`recept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RECEPT_INGREDIENT_ingredient1`
    FOREIGN KEY (`ingredient_id`)
    REFERENCES `hanzeproject`.`ingredient` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`klant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`klant` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`klant` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `voornaam` VARCHAR(45) NOT NULL,
  `achternaam` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefoon` VARCHAR(13) NULL,
  `adres` VARCHAR(45) NOT NULL,
  `postcode` VARCHAR(45) NULL,
  `woonplaats` VARCHAR(45) NOT NULL,
  `gebruikersnaam` VARCHAR(45) NOT NULL,
  `wachtwoord` VARCHAR(32) NOT NULL,
  `datum_registratie` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `gebruikersnaam_UNIQUE` (`gebruikersnaam` ASC))
ENGINE = InnoDB
COMMENT = ' ';


-- -----------------------------------------------------
-- Table `hanzeproject`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`order` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `klant_id` INT NOT NULL,
  `status` ENUM('geplaatst', 'in bereiding', 'klaar') NULL DEFAULT 'geplaatst',
  `betaald` TINYINT(1) NULL DEFAULT 0,
  `geplaatst` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_ORDER_klant1_idx` (`klant_id` ASC),
  CONSTRAINT `fk_ORDER_klant1`
    FOREIGN KEY (`klant_id`)
    REFERENCES `hanzeproject`.`klant` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`order_regel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`order_regel` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`order_regel` (
  `order_id` INT NOT NULL,
  `menu_id` INT NOT NULL,
  `aantal` INT NOT NULL,
  `prijs` DECIMAL(2) NOT NULL,
  PRIMARY KEY (`order_id`, `menu_id`),
  INDEX `fk_ORDER_REGEL_menu1_idx` (`menu_id` ASC),
  INDEX `fk_order_regel_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_ORDER_REGEL_menu1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `hanzeproject`.`menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_regel_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `hanzeproject`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`medewerker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`medewerker` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`medewerker` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `voornaam` VARCHAR(45) NOT NULL,
  `achternaam` VARCHAR(45) NOT NULL,
  `functie` VARCHAR(45) NOT NULL,
  `gebruikersnaam` VARCHAR(45) NOT NULL,
  `wachtwoord` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`afdeling`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`afdeling` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`afdeling` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `naam_UNIQUE` (`naam` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`afdeling_medewerker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`afdeling_medewerker` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`afdeling_medewerker` (
  `medewerker_id` INT NOT NULL,
  `afdeling_id` INT NOT NULL,
  PRIMARY KEY (`medewerker_id`, `afdeling_id`),
  INDEX `fk_afdelingen_has_medewerker_medewerker1_idx` (`medewerker_id` ASC),
  INDEX `fk_afdeling__medewerker_afdeling1_idx` (`afdeling_id` ASC),
  CONSTRAINT `fk_afdelingen_has_medewerker_medewerker1`
    FOREIGN KEY (`medewerker_id`)
    REFERENCES `hanzeproject`.`medewerker` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_afdeling__medewerker_afdeling1`
    FOREIGN KEY (`afdeling_id`)
    REFERENCES `hanzeproject`.`afdeling` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hanzeproject`.`menu_recept`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `hanzeproject`.`menu_recept` ;

CREATE TABLE IF NOT EXISTS `hanzeproject`.`menu_recept` (
  `menu_id` INT NOT NULL,
  `recept_id` INT NOT NULL,
  PRIMARY KEY (`menu_id`, `recept_id`),
  INDEX `fk_menu_has_recept_recept1_idx` (`recept_id` ASC),
  INDEX `fk_menu_has_recept_menu1_idx` (`menu_id` ASC),
  CONSTRAINT `fk_menu_has_recept_menu1`
    FOREIGN KEY (`menu_id`)
    REFERENCES `hanzeproject`.`menu` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_menu_has_recept_recept1`
    FOREIGN KEY (`recept_id`)
    REFERENCES `hanzeproject`.`recept` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
