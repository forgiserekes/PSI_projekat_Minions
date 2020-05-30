-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 05:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

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
CREATE DATABASE minions;
USE minions;
-- --------------------------------------------------------

--
-- Table structure for table `brojrecenzija`
--

CREATE TABLE `brojrecenzija` (
  `id` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `broj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brojrecenzija`
--

INSERT INTO `brojrecenzija` (`id`, `idKorisnik`, `idSmestaj`, `broj`) VALUES
(7, 16, 14, 0),
(8, 16, 18, 0),
(9, 16, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `filepathdokumentacijesmestaja`
--

CREATE TABLE `filepathdokumentacijesmestaja` (
  `id` int(11) NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `idSmestaj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filepathdokumentacijesmestaja`
--

INSERT INTO `filepathdokumentacijesmestaja` (`id`, `filepath`, `idSmestaj`) VALUES
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
(70, 'slike/proba/slika65.jpg', 12),
(71, 'slike/Hotel Metropol/slika61.jpg', 13),
(72, 'slike/Hotel Metropol/slika62.jpg', 13),
(73, 'slike/Hotel Metropol/slika63.jpg', 13),
(74, 'slike/Hotel Metropol/slika64.jpg', 13),
(75, 'slike/Hotel Metropol/slika65.jpg', 13),
(76, 'slike/Aleksandar Apartments/slika31.jpg', 14),
(77, 'slike/Aleksandar Apartments/slika32.jpg', 14),
(78, 'slike/Aleksandar Apartments/slika33.jpg', 14),
(79, 'slike/Aleksandar Apartments/slika34.jpg', 14),
(80, 'slike/Aleksandar Apartments/slika35.jpg', 14),
(81, 'slike/Hotel Metropol/slika21.jpg', 15),
(82, 'slike/Hotel Metropol/slika22.jpg', 15),
(83, 'slike/Hotel Metropol/slika23.jpg', 15),
(84, 'slike/Hotel Metropol/slika24.jpg', 15),
(85, 'slike/Hotel Metropol/slika25.jpg', 15),
(86, 'slike/Vila Beograd/slika11.jpg', 16),
(87, 'slike/Vila Beograd/slika12.jpg', 16),
(88, 'slike/Vila Beograd/slika13.jpg', 16),
(89, 'slike/Vila Beograd/slika14.jpg', 16),
(90, 'slike/Vila Beograd/slika15.jpg', 16),
(91, 'slike/Kragujevac Apartment/slika41.jpg', 17),
(92, 'slike/Kragujevac Apartment/slika42.jpg', 17),
(93, 'slike/Kragujevac Apartment/slika43.jpg', 17),
(94, 'slike/Kragujevac Apartment/slika44.jpg', 17),
(95, 'slike/Kragujevac Apartment/slika45.jpg', 17),
(96, 'slike/Vila Niketic/slika51.jpg', 18),
(97, 'slike/Vila Niketic/slika52.jpg', 18),
(98, 'slike/Vila Niketic/slika53.jpg', 18),
(99, 'slike/Vila Niketic/slika54.jpg', 18),
(100, 'slike/Vila Niketic/slika55.jpg', 18),
(101, 'slike/Apartment Valjevo/slika61.jpg', 19),
(102, 'slike/Apartment Valjevo/slika62.jpg', 19),
(103, 'slike/Apartment Valjevo/slika63.jpg', 19),
(104, 'slike/Apartment Valjevo/slika64.jpg', 19),
(105, 'slike/Apartment Valjevo/slika65.jpg', 19),
(106, 'slike/Moma/Capture.PNG', 20),
(107, 'slike/Moma/k.PNG', 20),
(108, 'slike/Moma5/Capture.PNG', 21),
(109, 'slike/Moma5/k.PNG', 21),
(110, 'slike/Moma3/ca760b70976b52578da88e06973af542.jpg', 22),
(111, 'slike/Moma3/download.jpg', 22),
(112, 'slike/Moma3/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg', 22),
(113, 'slike/Moma4/ca760b70976b52578da88e06973af542.jpg', 23),
(114, 'slike/Moma4/download.jpg', 23),
(115, 'slike/Moma4/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg', 23),
(116, 'slike/Moma4/ca760b70976b52578da88e06973af542.jpg', 24),
(117, 'slike/Moma4/download.jpg', 24),
(118, 'slike/Moma4/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg', 24),
(119, 'slike/Moma5/ca760b70976b52578da88e06973af542.jpg', 25),
(120, 'slike/Moma5/download.jpg', 25),
(121, 'slike/Moma5/RKyaEDwp8J7JKeZWQPuOVWvkUjGQfpCx_cover_580.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `tip` varchar(15) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `datumRodjenja` date NOT NULL,
  `adresa` varchar(70) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `tip`, `username`, `password`, `email`, `datumRodjenja`, `adresa`, `status`) VALUES
(11, 'Nikola', 'Marovic', 'admin', 'admin', 'admin', 'nmarovic998@gmail.com', '1998-05-23', 'Brace Velickovic 4', 'aktivan'),
(13, 'Nikola', 'Marovic', 'oglasavac', 'nidzulitza', 'qwerqwer', 'nmarovic998@gmail.com', '1998-05-23', 'Brace Velickovic 4', 'aktivan'),
(14, 'Momcilo', 'Niketic', 'oglasavac', 'moma98', 'zxcvzxcv', 'moma98kg@gmail.com', '1998-08-06', 'Bresnica bb', 'aktivan'),
(15, 'Mina', 'Urosevic', 'oglasavac', 'minka', 'asdfasdf', 'mina.urosevic12@gmail.com', '1999-01-31', 'Karadjordjeva 10', 'aktivan'),
(16, 'Aleksandar', 'Nikolic', 'korisnik', 'coa98', 'sifra123', 'aleksandarnikolic@hotmail.rs', '1998-10-06', 'Bavaniste bb', 'aktivan');

-- --------------------------------------------------------

--
-- Table structure for table `recenzija`
--

CREATE TABLE `recenzija` (
  `id` int(11) NOT NULL,
  `cistoca` int(11) NOT NULL,
  `komfor` int(11) NOT NULL,
  `kvalitet` int(11) NOT NULL,
  `lokacija` int(11) NOT NULL,
  `ljubaznost` int(11) NOT NULL,
  `opstiUtisak` varchar(25) NOT NULL,
  `tip` varchar(45) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `idOglasavac` int(11) NOT NULL,
  `komentar` varchar(500) DEFAULT NULL,
  `odgovor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recenzija`
--

INSERT INTO `recenzija` (`id`, `cistoca`, `komfor`, `kvalitet`, `lokacija`, `ljubaznost`, `opstiUtisak`, `tip`, `idSmestaj`, `idKorisnik`, `idOglasavac`, `komentar`, `odgovor`) VALUES
(16, 4, 5, 5, 4, 5, 'Sjajno', 'Porodica', 14, 16, 14, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic type', 'Similar to the contextual text color classes, easily set the background of an element to any contextual class. Anchor components will darken on hover, just like the text classes. Background utilities do not set color, so in some cases you’ll want to '),
(17, 5, 4, 5, 5, 4, 'Sjajno', 'Porodica', 14, 16, 14, 'Odlican smestaj, za svaku pohvalu! Ponovo cemo doci! Pozdrav iz Panceva!', NULL),
(19, 5, 4, 4, 5, 4, 'Dobro', 'Porodica', 14, 16, 14, 'Odlican smestaj, ponovo cemo doci.', NULL),
(20, 5, 5, 5, 5, 5, 'Dobro', 'Grupa prijatelja', 15, 16, 15, 'Ovo je bio odlican smestaj. Uvek cemo doci! Veliki pozdrav iz Bavanista!', NULL),
(21, 5, 5, 4, 5, 5, 'Sjajno', 'Porodica', 15, 16, 15, 'Opet cemo doci, sve je odlicno! Pozdrav!', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `datumOd` date NOT NULL,
  `datumDo` date NOT NULL,
  `brojOsoba` int(11) NOT NULL,
  `napomena` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL,
  `idSmestaj` int(11) NOT NULL,
  `idKorisnika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `datumOd`, `datumDo`, `brojOsoba`, `napomena`, `status`, `idSmestaj`, `idKorisnika`) VALUES
(27, '2020-05-27', '2020-05-28', 4, 'Nista', 'potvrdjena', 14, 16),
(28, '2020-05-29', '2020-05-30', 2, 'Nista', 'potvrdjena', 14, 16),
(30, '2020-05-31', '2020-06-01', 2, 'Nista', 'potvrdjena', 14, 16),
(31, '2020-05-13', '2020-05-14', 2, 'Nista', 'potvrdjena', 15, 16),
(32, '2020-05-29', '2020-05-30', 2, 'Nista', 'potvrdjena', 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `smestaj`
--

CREATE TABLE `smestaj` (
  `id` int(11) NOT NULL,
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
  `lat` varchar(20) NOT NULL,
  `lon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smestaj`
--

INSERT INTO `smestaj` (`id`, `naziv`, `opis`, `cena`, `idVlasnik`, `drzava`, `grad`, `ulica`, `broj`, `tipSmestaja`, `kapacitet`, `povrsina`, `kuhinja`, `terasa`, `parking`, `lat`, `lon`) VALUES
(14, 'Aleksandar Apartments', 'Stan se nalazi u centru Valjeva. Smesten je na samoj raskrsnici ulica Dr. Pantica i Sindjeliceve ulice u privatnoj zgradi. Od samog centra je udaljen 200m. Veoma prostran i komforan. U samoj blizini se nalaze prodavnice, pekare, kafici i restorani. Nov je i opremljen novim stvarima. Velicina je 65 m2. Ima besplatan WiFi. Raspolaze kompletno opremljenim kupatilom i kuhinjom. ', 30, 13, 'Srbija', 'Valjevo', 'Pantićeva', '107', 'apartman', 6, 65, 1, 1, 1, '44.272553', '19.890626'),
(15, 'Hotel Metropol', 'Fantastična lokacija hotela Metropol Palace pored veličanstvenog Tašmajdanskog parka poziva vas da istražite brojne znamenitosti, pozorišta i muzeje Beograda bogate domaćim i međunarodnim kulturnim sadržajima, sve na nekoliko minuta hoda of hotela.', 45, 13, 'Srbija', 'Beograd', 'Bulevar Kralja Aleksandra', '67', 'hotelskaSoba', 2, 23, 0, 1, 1, '44.806540', '20.473444'),
(16, 'Vila Beograd', '﻿﻿﻿﻿﻿Vikendica na obali Dedinju, vikend ekolosko naselje se nalazi preko puta usca Save u Dunav.   Povrsine 180 kvadrata, zidana od pune cigle, utvdjena obala, novogradnja, voda, struja led rasveta, asvaltirani put do nasela, od Beograda udaljeno naselje oko 60 km . Moze zamena za stan u Beogradu, uz moju doplatu ili zamena za skuplji auto uz Vasu doplatu.', 120, 13, 'Srbija', 'Beograd', 'Neznanog junaka', '10', 'vikendica', 12, 150, 1, 1, 1, '44.774108', '20.461578'),
(17, 'Kragujevac Apartment', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 35, 14, 'Srbija', 'Kragujevac', 'Karadjordjeva', '6', 'apartman', 4, 45, 1, 1, 1, '44.010062', '20.917019'),
(19, 'Apartment Valjevo', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 25, 15, 'Srbija', 'Valjevo', 'Karadjordjeva', '15', 'soba', 3, 23, 0, 1, 1, '44.271023', '19.888030'),
(24, 'Moma4', 'sdfsdfs', 100, 13, 'Srbija', 'Beograd', 'Niska', '20', 'soba', 50, 100, 1, 1, 1, '40.75637123', '-73.98545321'),
(25, 'Moma5', 'dfghfgh', 100, 13, 'Srbija', 'Beograd', ' Теразије ', '20', 'soba', 50, 100, 1, 1, 1, '44.80142690', '20.48234110');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brojrecenzija`
--
ALTER TABLE `brojrecenzija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filepathdokumentacijesmestaja`
--
ALTER TABLE `filepathdokumentacijesmestaja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recenzija`
--
ALTER TABLE `recenzija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smestaj`
--
ALTER TABLE `smestaj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brojrecenzija`
--
ALTER TABLE `brojrecenzija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `filepathdokumentacijesmestaja`
--
ALTER TABLE `filepathdokumentacijesmestaja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `recenzija`
--
ALTER TABLE `recenzija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `smestaj`
--
ALTER TABLE `smestaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

