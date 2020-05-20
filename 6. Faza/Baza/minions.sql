-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 10:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `brojrecenzija`
--

DROP TABLE IF EXISTS `brojrecenzija`;
CREATE TABLE IF NOT EXISTS `brojrecenzija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idKorisnik` int(11) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `broj` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brojrecenzija`
--

INSERT INTO `brojrecenzija` (`id`, `idKorisnik`, `idSmestaj`, `broj`) VALUES
(5, 9, 1, 0),
(6, 9, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `filepathdokumentacijekorisnika`
--

DROP TABLE IF EXISTS `filepathdokumentacijekorisnika`;
CREATE TABLE IF NOT EXISTS `filepathdokumentacijekorisnika` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(100) NOT NULL,
  `idKorisnika` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `filepathdokumentacijesmestaja`
--

DROP TABLE IF EXISTS `filepathdokumentacijesmestaja`;
CREATE TABLE IF NOT EXISTS `filepathdokumentacijesmestaja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(100) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filepathdokumentacijesmestaja`
--

INSERT INTO `filepathdokumentacijesmestaja` (`id`, `filepath`, `idSmestaj`) VALUES
(1, 'slike/proba/slika31.jpg', 1),
(2, 'slike/proba/slika32.jpg', 1),
(3, 'slike/proba/slika33.jpg', 1),
(4, 'slike/proba/slika34.jpg', 1),
(5, 'slike/proba/slika35.jpg', 1),
(16, 'slike/proba/slika21.jpg', 2),
(17, 'slike/proba/slika22.jpg', 2),
(18, 'slike/proba/slika23.jpg', 2),
(19, 'slike/proba/slika24.jpg', 2),
(20, 'slike/proba/slika25.jpg', 2),
(21, 'slike/proba/slika11.jpg', 3),
(22, 'slike/proba/slika12.jpg', 3),
(23, 'slike/proba/slika13.jpg', 3),
(24, 'slike/proba/slika14.jpg', 3),
(25, 'slike/proba/slika15.jpg', 3),
(26, 'slike/proba/slika41.jpg', 4),
(27, 'slike/proba/slika42.jpg', 4),
(28, 'slike/proba/slika43.jpg', 4),
(29, 'slike/proba/slika44.jpg', 4),
(30, 'slike/proba/slika45.jpg', 4),
(41, 'slike/proba/slika51.jpg', 7),
(42, 'slike/proba/slika52.jpg', 7),
(43, 'slike/proba/slika53.jpg', 7),
(44, 'slike/proba/slika54.jpg', 7),
(45, 'slike/proba/slika55.jpg', 7),
(46, 'slike/proba/slika1.jpg', 8),
(47, 'slike/proba/slika2.jpg', 8),
(48, 'slike/proba/slika3.jpg', 8),
(49, 'slike/proba/slika4.jpg', 8),
(50, 'slike/proba/slika5.jpg', 8),
(51, 'slike/proba/slika11.jpg', 9),
(52, 'slike/proba/slika12.jpg', 9),
(53, 'slike/proba/slika13.jpg', 9),
(54, 'slike/proba/slika14.jpg', 9),
(55, 'slike/proba/slika15.jpg', 9),
(56, 'slike/proba/slika41.jpg', 10),
(57, 'slike/proba/slika42.jpg', 10),
(58, 'slike/proba/slika43.jpg', 10),
(59, 'slike/proba/slika44.jpg', 10),
(60, 'slike/proba/slika45.jpg', 10),
(61, 'slike/proba/slika51.jpg', 11),
(62, 'slike/proba/slika52.jpg', 11),
(63, 'slike/proba/slika53.jpg', 11),
(64, 'slike/proba/slika54.jpg', 11),
(65, 'slike/proba/slika55.jpg', 11),
(66, 'slike/proba/slika61.jpg', 12),
(67, 'slike/proba/slika62.jpg', 12),
(68, 'slike/proba/slika63.jpg', 12),
(69, 'slike/proba/slika64.jpg', 12),
(70, 'slike/proba/slika65.jpg', 12);

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
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `tip`, `username`, `password`, `email`, `datumRodjenja`, `adresa`, `status`) VALUES
(7, 'Nikola', 'Marovic', 'oglasavac', 'nidzulitza', 'asdfasdf', 'nixy.marovic@gmail.com', '1998-05-23', 'Brace Velickovic 4', 'aktivan'),
(9, 'Aleksandar', 'Nikolic', 'korisnik', 'coasort', 'sifra123', 'aleksandarnikolic@hotmail.rs', '1998-10-06', 'Bavaniste bb', 'aktivan'),
(11, 'Nikola', 'Marovic', 'admin', 'admin', 'admin', 'nmarovic998@gmail.com', '1998-05-23', 'Brace Velickovic 4', 'aktivan'),
(12, 'Mina', 'Urosevic', 'oglasavac', 'minka', 'qwerqwer', 'mina.urosevic@gmail.com', '1999-01-01', 'Karadjordjeva', 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

DROP TABLE IF EXISTS `odgovor`;
CREATE TABLE IF NOT EXISTS `odgovor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRecenzija` int(11) DEFAULT NULL,
  `idOglasavac` int(11) NOT NULL,
  `tekst` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recenzija`
--

DROP TABLE IF EXISTS `recenzija`;
CREATE TABLE IF NOT EXISTS `recenzija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cistoca` int(11) NOT NULL,
  `komfor` int(11) NOT NULL,
  `kvalitet` int(11) NOT NULL,
  `lokacija` int(11) NOT NULL,
  `ljubaznost` int(11) NOT NULL,
  `opstiUtisak` varchar(25) NOT NULL,
  `tip` varchar(45) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recenzija`
--

INSERT INTO `recenzija` (`id`, `cistoca`, `komfor`, `kvalitet`, `lokacija`, `ljubaznost`, `opstiUtisak`, `tip`, `idSmestaj`, `idKorisnik`, `komentar`) VALUES
(11, 5, 5, 4, 4, 4, 'sjajno', 'porodica', 2, 9, 'Komentar na recenziju.'),
(13, 3, 4, 4, 4, 5, 'sjajno', 'grupa prijatelja', 2, 9, 'Komentar'),
(14, 4, 5, 3, 4, 3, 'dobro', 'porodica', 1, 9, 'Ovo je komentar.');

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

DROP TABLE IF EXISTS `rezervacija`;
CREATE TABLE IF NOT EXISTS `rezervacija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datumOd` date NOT NULL,
  `datumDo` date NOT NULL,
  `brojOsoba` int(11) NOT NULL,
  `napomena` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idKorisnika` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `datumOd`, `datumDo`, `brojOsoba`, `napomena`, `status`, `idSmestaj`, `idKorisnika`) VALUES
(18, '2020-05-01', '2020-05-02', 1, 'Nista', 'potvrdjena', 1, 9),
(19, '2020-05-02', '2020-05-03', 1, 'Nista', 'odbijena', 1, 9),
(20, '2020-05-01', '2020-05-02', 1, 'Nista', 'potvrdjena', 2, 9),
(21, '2020-07-01', '2020-07-02', 1, 'Nista', 'potvrdjena', 2, 9),
(22, '2020-07-01', '2020-07-02', 2, 'Nista', 'potvrdjena', 1, 9),
(23, '2020-05-13', '2020-05-15', 3, 'Nista', 'odbijena', 2, 9),
(24, '2020-05-15', '2020-05-16', 3, 'Nista', 'odbijena', 2, 9),
(25, '2020-05-28', '2020-05-29', 1, 'nista', 'odbijena', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

DROP TABLE IF EXISTS `smestaj`;
CREATE TABLE IF NOT EXISTS `smestaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `opis` varchar(1500) NOT NULL,
  `cena` int(11) NOT NULL,
  `idVlasnik` int(11) NOT NULL,
  `drzava` varchar(45) NOT NULL,
  `grad` varchar(45) NOT NULL,
  `ulica` varchar(45) NOT NULL,
  `broj` varchar(45) NOT NULL,
  `tipSmestaja` varchar(45) NOT NULL,
  `kapacitet` int(11) NOT NULL,
  `povrsina` int(11) NOT NULL,
  `kuhinja` tinyint(1) NOT NULL,
  `terasa` tinyint(4) NOT NULL,
  `parking` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`id`, `naziv`, `opis`, `cena`, `idVlasnik`, `drzava`, `grad`, `ulica`, `broj`, `tipSmestaja`, `kapacitet`, `povrsina`, `kuhinja`, `terasa`, `parking`) VALUES
(1, 'Aleksandar Apartments', 'Objekat Apartment ALEKSANDAR Valjevo se nalazi u Valjevu, u regionu Centralne Srbije i nudi popločano dvorište i pogled na grad. Ovaj klimatizovani smeštaj pruža gostima besplatan WiFi i privatni parking u okviru objekta. Divčibare su udaljene 36 km.\r\n\r\nApartman sadrži 1 spavaću sobu, opremljenu kuhinju sa frižiderom i mikrotalasnom pećnicom, flat-screen TV sa kablovskim kanalima, mašinu za pranje veša i 1 kupatilo sa bideom.\r\n\r\nGosti apartmana mogu da koriste terasu.\r\n\r\nNajbliži aerodrom je Aerodrom Nikola Tesla u Beogradu, udaljen 106 km od objekta Apartment ALEKSANDAR.', 30, 7, 'Srbija', 'Valjevo', 'Panticeva', '107', 'apartman', 6, 65, 1, 1, 1),
(2, 'Vila Beograd', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 80, 7, 'Srbija', 'Beograd', 'Vojvode Stepe', '33', 'vikendica', 12, 120, 1, 1, 1),
(9, 'Vila Pancevo', 'You can have the results returned as an instance of a custom class instead of a stdClass or array, as the getResult() and getResultArray() methods allow. If the class is not already loaded into memory, the Autoloader will attempt to load it. The object will have all values returned from the database set as properties. If these have been declared and are non-public then you should provide a __set() method to allow them to be set.', 45, 7, 'Srbija', 'Pancevo', 'Visnjicka', '5', 'hotelskaSoba', 5, 55, 1, 1, 0),
(10, 'Skockana', 'You can have the results returned as an instance of a custom class instead of a stdClass or array, as the getResult() and getResultArray() methods allow. If the class is not already loaded into memory, the Autoloader will attempt to load it. The object will have all values returned from the database set as properties. If these have been declared and are non-public then you should provide a __set() method to allow them to be set.', 30, 7, 'Srbija', 'Valjevo', 'Divcibarski put', '10', 'vikendica', 8, 50, 1, 1, 1),
(11, 'Sabac Apartments', 'You can have the results returned as an instance of a custom class instead of a stdClass or array, as the getResult() and getResultArray() methods allow. If the class is not already loaded into memory, the Autoloader will attempt to load it. The object will have all values returned from the database set as properties. If these have been declared and are non-public then you should provide a __set() method to allow them to be set.', 30, 12, 'Srbija', 'Sabac', 'Janka Veselinovic', '5', 'apartman', 3, 34, 1, 1, 0),
(12, 'Hotel Kragujevac', 'You can have the results returned as an instance of a custom class instead of a stdClass or array, as the getResult() and getResultArray() methods allow. If the class is not already loaded into memory, the Autoloader will attempt to load it. The object will have all values returned from the database set as properties. If these have been declared and are non-public then you should provide a __set() method to allow them to be set.', 30, 12, 'Srbija', 'Kragujevac', 'Daniciceva', '5', 'hotelskaSoba', 2, 15, 0, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
