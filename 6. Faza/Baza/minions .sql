-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 11:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minions`
--
CREATE DATABASE IF NOT EXISTS `minions` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `minions`;

-- --------------------------------------------------------

--
-- Table structure for table `adresa`
--

DROP TABLE IF EXISTS `adresa`;
CREATE TABLE IF NOT EXISTS `adresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `broj` int(11) NOT NULL,
  `idUlica` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adresa`
--

INSERT INTO `adresa` (`id`, `broj`, `idUlica`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 4, 4),
(5, 4, 5),
(6, 4, 6),
(7, 4, 7),
(8, 4, 8),
(9, 4, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 4, 13),
(14, 4, 14),
(15, 4, 15),
(16, 4, 16),
(17, 4, 17),
(18, 4, 18),
(19, 4, 19),
(20, 4, 20),
(21, 4, 21),
(22, 4, 22),
(23, 4, 23),
(24, 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `drzava`
--

DROP TABLE IF EXISTS `drzava`;
CREATE TABLE IF NOT EXISTS `drzava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drzava`
--

INSERT INTO `drzava` (`id`, `ime`) VALUES
(2, 'Srbija'),
(3, 'Srbija'),
(4, 'Srbija'),
(5, 'Srbija'),
(6, 'Srbija'),
(7, 'Srbija'),
(8, 'Srbija'),
(9, 'Srbija'),
(10, 'Srbija'),
(11, 'Srbija'),
(12, 'Srbija'),
(13, 'Srbija'),
(14, 'Srbija'),
(15, 'Srbija'),
(16, 'Srbija'),
(17, 'Srbija'),
(18, 'Srbija'),
(19, 'Srbija'),
(20, 'Srbija'),
(21, 'Srbija'),
(22, 'Srbija'),
(23, 'Srbija'),
(24, 'Srbija'),
(25, 'Srbija');

-- --------------------------------------------------------

--
-- Table structure for table `filepathdokumentacijekorisnika`
--

DROP TABLE IF EXISTS `filepathdokumentacijekorisnika`;
CREATE TABLE IF NOT EXISTS `filepathdokumentacijekorisnika` (
  `idFilepathDokumentacijeKorisnika` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(100) NOT NULL,
  `idKorisnika` int(11) NOT NULL,
  PRIMARY KEY (`idFilepathDokumentacijeKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `filepathdokumentacijesmestaja`
--

DROP TABLE IF EXISTS `filepathdokumentacijesmestaja`;
CREATE TABLE IF NOT EXISTS `filepathdokumentacijesmestaja` (
  `idFilepath` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(100) NOT NULL,
  `idOglas` int(11) NOT NULL,
  PRIMARY KEY (`idFilepath`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

DROP TABLE IF EXISTS `grad`;
CREATE TABLE IF NOT EXISTS `grad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(45) NOT NULL,
  `ptt` varchar(45) NOT NULL,
  `idDrzava` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`id`, `Ime`, `ptt`, `idDrzava`) VALUES
(1, 'Valjevo', '14000', 2),
(2, 'Valjevo', '14000', 3),
(3, 'Valjevo', '14000', 4),
(4, 'Valjevo', '14000', 5),
(5, 'Valjevo', '14000', 6),
(6, 'Valjevo', '14000', 7),
(7, 'Valjevo', '14000', 8),
(8, 'Valjevo', '14000', 9),
(9, 'Valjevo', '14000', 10),
(10, 'Valjevo', '14000', 11),
(11, 'Valjevo', '14000', 12),
(12, 'Valjevo', '14000', 13),
(13, 'Valjevo', '14000', 14),
(14, 'Valjevo', '14000', 15),
(15, 'Valjevo', '14000', 16),
(16, 'Valjevo', '14000', 17),
(17, 'Valjevo', '14000', 18),
(18, 'Valjevo', '14000', 19),
(19, 'Valjevo', '14000', 20),
(20, 'Valjevo', '14000', 21),
(21, 'Valjevo', '14000', 22),
(22, 'Valjevo', '14000', 23),
(23, 'Valjevo', '14000', 24),
(24, 'Valjevo', '14000', 25);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `tip` varchar(15) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `datumRodjenja` date NOT NULL,
  `adresa` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `tip`, `username`, `password`, `email`, `datumRodjenja`, `adresa`) VALUES
(7, 'Nikola', 'Marovic', 'oglasavac', 'nidzulitza', 'asdfasdf', 'nixy.marovic@gmail.com', '1998-05-23', 'Brace Velickovic 4');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

DROP TABLE IF EXISTS `odgovor`;
CREATE TABLE IF NOT EXISTS `odgovor` (
  `idOdgovor` int(11) NOT NULL AUTO_INCREMENT,
  `idRecenzija` int(11) DEFAULT NULL,
  `idKorisnick` int(11) NOT NULL,
  `idOdgovorNa` int(11) DEFAULT NULL,
  `text` varchar(300) NOT NULL,
  PRIMARY KEY (`idOdgovor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recenzija`
--

DROP TABLE IF EXISTS `recenzija`;
CREATE TABLE IF NOT EXISTS `recenzija` (
  `idRecenzija` int(11) NOT NULL AUTO_INCREMENT,
  `cistoca` int(11) NOT NULL,
  `komfor` int(11) NOT NULL,
  `kvalitet` int(11) NOT NULL,
  `lokacija` int(11) NOT NULL,
  `ljubaznost` int(11) NOT NULL,
  `osptiUtisak` int(11) NOT NULL,
  `tip` varchar(45) NOT NULL,
  `idOglasa` int(11) NOT NULL,
  `idKorisnika` int(11) NOT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idRecenzija`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `idRezervacija` int(11) NOT NULL AUTO_INCREMENT,
  `datumOd` date NOT NULL,
  `datumDo` date NOT NULL,
  `brojOsoba` int(11) NOT NULL,
  `napomena` varchar(500) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idKorisnika` int(11) NOT NULL,
  PRIMARY KEY (`idRezervacija`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

DROP TABLE IF EXISTS `smestaj`;
CREATE TABLE IF NOT EXISTS `smestaj` (
  `idOglasi` int(11) NOT NULL AUTO_INCREMENT,
  `opis` varchar(200) NOT NULL,
  `cena` int(11) NOT NULL,
  `idVlasnik` int(11) NOT NULL,
  `idAdresa` int(11) NOT NULL,
  `tipSmestaja` varchar(45) NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `povrsina` int(11) NOT NULL,
  `kuhinja` tinyint(1) NOT NULL,
  `terasa` tinyint(4) NOT NULL,
  `parking` tinyint(4) NOT NULL,
  PRIMARY KEY (`idOglasi`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`idOglasi`, `opis`, `cena`, `idVlasnik`, `idAdresa`, `tipSmestaja`, `kapacitet`, `povrsina`, `kuhinja`, `terasa`, `parking`) VALUES
(1, 'Ovo je jako lep smestaj.', 30, 7, 0, 'soba', 5, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ulica`
--

DROP TABLE IF EXISTS `ulica`;
CREATE TABLE IF NOT EXISTS `ulica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) DEFAULT NULL,
  `idGrad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ulica`
--

INSERT INTO `ulica` (`id`, `ime`, `idGrad`) VALUES
(1, 'Brace Velickovic', 1),
(2, 'Brace Velickovic', 2),
(3, 'Brace Velickovic', 3),
(4, 'Brace Velickovic', 4),
(5, 'Brace Velickovic', 5),
(6, 'Brace Velickovic', 6),
(7, 'Brace Velickovic', 7),
(8, 'Brace Velickovic', 8),
(9, 'Brace Velickovic', 9),
(10, 'Brace Velickovic', 10),
(11, 'Brace Velickovic', 11),
(12, 'Brace Velickovic', 12),
(13, 'Brace Velickovic', 13),
(14, 'Brace Velickovic', 14),
(15, 'Brace Velickovic', 15),
(16, 'Brace Velickovic', 16),
(17, 'Brace Velickovic', 17),
(18, 'Brace Velickovic', 18),
(19, 'Brace Velickovic', 19),
(20, 'Brace Velickovic', 20),
(21, 'Brace Velickovic', 21),
(22, 'Brace Velickovic', 22),
(23, 'Brace Velickovic', 23),
(24, 'Brace Velickovic', 24);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
