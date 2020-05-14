-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema school
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema school
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `school` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema new_schema1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `new_schema1` ;
USE `school` ;

-- -----------------------------------------------------
-- Table `school`.`Korisnici`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Korisnici` (
  `idKorisnici` INT NOT NULL AUTO_INCREMENT,
  `Ime` VARCHAR(45) NOT NULL,
  `Prezime` VARCHAR(45) NOT NULL,
  `tip` VARCHAR(15) NOT NULL,
  `userName` VARCHAR(45) NOT NULL,
  `eMail` VARCHAR(45) NOT NULL,
  `datumRodjenja` DATE NOT NULL,
  `adresa` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idKorisnici`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Smestaj`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Smestaj` (
  `idOglasi` INT NOT NULL AUTO_INCREMENT,
  `opis` VARCHAR(200) NOT NULL,
  `cena` INT NOT NULL,
  `idVlasnik` INT NOT NULL,
  `idAdresa` INT NOT NULL,
  `tipSmestaja` VARCHAR(45) NOT NULL,
  `kapacitet` INT NOT NULL,
  `povrsina` INT NOT NULL,
  `kuhinja` VARCHAR(5) NOT NULL,
  `terasa` TINYINT NOT NULL,
  `parking` TINYINT NOT NULL,
  `datum` DATE NOT NULL,
  PRIMARY KEY (`idOglasi`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Adresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Adresa` (
  `idAdresa` INT NOT NULL AUTO_INCREMENT,
  `broj` INT NOT NULL,
  `idUlica` INT NOT NULL,
  PRIMARY KEY (`idAdresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Grad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Grad` (
  `idgrad` INT NOT NULL AUTO_INCREMENT,
  `Ime` VARCHAR(45) NOT NULL,
  `ptt` VARCHAR(45) NOT NULL,
  `idDrzava` INT NOT NULL,
  PRIMARY KEY (`idgrad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Drzava`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Drzava` (
  `iddrzava` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iddrzava`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Ulica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Ulica` (
  `idUlica` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NULL,
  `idGrad` INT NOT NULL,
  PRIMARY KEY (`idUlica`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`FilepathDokumentacijeSmestaja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`FilepathDokumentacijeSmestaja` (
  `idFilepath` INT NOT NULL AUTO_INCREMENT,
  `filepath` VARCHAR(100) NOT NULL,
  `idOglas` INT NOT NULL,
  PRIMARY KEY (`idFilepath`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Recenzija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Recenzija` (
  `idRecenzija` INT NOT NULL AUTO_INCREMENT,
  `cistoca` INT NOT NULL,
  `komfor` INT NOT NULL,
  `kvalitet` INT NOT NULL,
  `lokacija` INT NOT NULL,
  `ljubaznost` INT NOT NULL,
  `osptiUtisak` INT NOT NULL,
  `tip` VARCHAR(45) NOT NULL,
  `idOglasa` INT NOT NULL,
  `idKorisnika` INT NOT NULL,
  `komentar` VARCHAR(500) NULL,
  PRIMARY KEY (`idRecenzija`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Rezervacija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Rezervacija` (
  `idRezervacija` INT NOT NULL AUTO_INCREMENT,
  `datumOd` DATE NOT NULL,
  `datumDo` DATE NOT NULL,
  `brojOsoba` INT NOT NULL,
  `napomena` VARCHAR(500) NOT NULL,
  `idSmestaj` INT NOT NULL,
  `idKorisnika` INT NOT NULL,
  PRIMARY KEY (`idRezervacija`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `school`.`Odgovor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `school`.`Odgovor` (
  `idOdgovor` INT NOT NULL AUTO_INCREMENT,
  `idRecenzija` INT NULL,
  `idKorisnick` INT NOT NULL,
  `idOdgovorNa` INT NULL,
  `text` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`idOdgovor`))
ENGINE = InnoDB;

USE `new_schema1` ;

-- -----------------------------------------------------
-- Table `new_schema1`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_schema1`.`Admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `new_schema1`.`FilepathDokumentacijeKorisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `new_schema1`.`FilepathDokumentacijeKorisnika` (
  `idFilepathDokumentacijeKorisnika` INT NOT NULL AUTO_INCREMENT,
  `filepath` VARCHAR(100) NOT NULL,
  `idKorisnika` INT NOT NULL,
  PRIMARY KEY (`idFilepathDokumentacijeKorisnika`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
