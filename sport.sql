-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 19, 2023 la 12:51 AM
-- Versiune server: 10.4.27-MariaDB
-- Versiune PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `sport`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `antrenori`
--

CREATE TABLE `antrenori` (
  `AntrenorID` int(20) NOT NULL,
  `AtletID` int(20) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Data_colaborare` date NOT NULL,
  `Telefon` varchar(20) DEFAULT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` int(20) DEFAULT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sex` char(1) DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `antrenori`
--

INSERT INTO `antrenori` (`AntrenorID`, `AtletID`, `Nume`, `Prenume`, `CNP`, `Data_colaborare`, `Telefon`, `Strada`, `Numar`, `Oras`, `Judet`, `Email`, `Sex`) VALUES
(1, 1, 'Manea', 'Alexandru', '5010416280865', '2020-10-23', '0743042860', 'Poenari', 100, 'Craiova', 'DJ', 'manea@gmail.com', 'M'),
(3, 4, 'Baluta', 'Andreea', '6080916280859', '2010-07-18', '0746784323', 'Maniu', 91, 'Brasov', 'BV', 'baluta@gmail.com', 'F'),
(4, 4, 'Anghel', 'Vlad', '5020203260876', '2011-04-14', '0733442321', 'Unirii', 47, 'Pitesti', 'AG', 'anghelvlad@gmail.com', 'M'),
(5, 1, 'Voicu', 'Alexandru', '6010213260435', '2014-06-19', '0743052140', 'Virtutii', 400, 'Cluj', 'CJ', 'voicu@gmail.com', 'M'),
(6, 49, 'Mihalcea', 'Marius', '5010415300869', '2022-06-06', '0796897740', 'Izvorului', 10, 'Caracal', 'Olt', 'mihalceandrei@gmail.com', 'M'),
(7, 25, 'Baciu', 'Ionela', '6010415280444', '2010-07-18', '0775431243', 'Marului', 15, 'Sibiu', 'SB', 'baciu46@gmail.com', 'F'),
(8, 26, 'Alexe', 'Antonia', '6030452270890', '2012-07-20', '0780549643', 'Bratianu', 200, 'Bucuresti', 'B', 'alexeantonia@gmail.com', 'F'),
(9, 48, 'Georgescu', 'Marian', '5030412480855', '2015-09-24', '0756758921', 'Politehnicii', 300, 'Valcea', 'VL', 'marian23@gmail.com', 'M'),
(10, 50, 'Ionescu', 'Mihaela', '6110415280865', '2015-09-21', '0765459465', 'Crizantemei', 77, 'Bucuresti', 'B', 'ionescumihaela@gmail.com', 'F');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `atleti`
--

CREATE TABLE `atleti` (
  `AtletID` int(20) NOT NULL,
  `ProbaID` int(20) NOT NULL,
  `SponsorID` int(20) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Data_nasterii` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefon` varchar(20) DEFAULT NULL,
  `Strada` varchar(50) NOT NULL,
  `Numar` int(10) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Judet` varchar(50) NOT NULL,
  `Club_sportiv` varchar(50) NOT NULL,
  `Sex` char(1) DEFAULT 'M'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `atleti`
--

INSERT INTO `atleti` (`AtletID`, `ProbaID`, `SponsorID`, `Nume`, `Prenume`, `CNP`, `Data_nasterii`, `Email`, `Telefon`, `Strada`, `Numar`, `Oras`, `Judet`, `Club_sportiv`, `Sex`) VALUES
(1, 6, 7, 'Badea', 'Maria', '6010215280855', '2001-02-15', 'badea@gmail.com', '0746897860', 'Independentei', 36, 'Cluj', 'CJ', 'Dinamo', 'F'),
(4, 6, 4, 'Toma', 'Alexandru', '5040512270670', '1987-10-15', 'toma54@gmail.com', '0746969590', 'Bucur', 15, 'Iasi', 'IS', 'Sportissimo', 'M'),
(25, 7, 3, 'Fertu', 'Teodora', '6010216280867', '2000-04-02', 'teodora24@gmail.com', '0743046760', 'Teilor', 65, 'Bucuresti', 'B', 'Atletis', 'F'),
(26, 1, 7, 'Ciu', 'Marina', '6010216280842', '1998-03-03', 'ciu54@gmail.com', '0746897862', 'Revolutiei', 25, 'Slatina', 'Olt', 'Atletis', 'F'),
(48, 2, 3, 'Ene', 'Ion', '6080916270858', '1990-12-29', 'ene23@gmail.com', '0754558931', 'Eroilor', 48, 'Bucuresti', 'B', 'Atletis', 'M'),
(49, 8, 5, 'Aspra', 'Nicoleta', '6010216280800', '1990-10-10', 'aspranicoleta@gmail.com', '0756565430', 'Libertatii', 300, 'Bucuresti', 'B', 'Dinamo', 'F'),
(50, 7, 6, 'Diaconu', 'Loredana', '6080915250890', '2003-07-02', 'diaconu43@gmail.com', '0743042160', 'Primaverii', 55, 'Craiova', 'DJ', 'Atletis', 'F');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `competitii`
--

CREATE TABLE `competitii` (
  `CompetitieID` int(20) NOT NULL,
  `Denumire` varchar(50) NOT NULL,
  `Data_competitie` date NOT NULL,
  `Taxa_participare` int(20) NOT NULL,
  `Oras` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `competitii`
--

INSERT INTO `competitii` (`CompetitieID`, `Denumire`, `Data_competitie`, `Taxa_participare`, `Oras`) VALUES
(1, 'Campionat European', '2019-04-10', 3000, 'Budapesta'),
(2, 'Jocuri Olimpice', '2021-11-15', 250, 'Bucuresti'),
(18, 'Campionat Mondial', '2015-08-14', 1000, 'Iasi');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `competitii_frecventate`
--

CREATE TABLE `competitii_frecventate` (
  `AtletID` int(20) NOT NULL,
  `CompetitieID` int(20) NOT NULL,
  `Nr_competitii_frecventate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `competitii_frecventate`
--

INSERT INTO `competitii_frecventate` (`AtletID`, `CompetitieID`, `Nr_competitii_frecventate`) VALUES
(1, 2, 4),
(4, 18, 6),
(25, 18, 8),
(26, 2, 10),
(48, 1, 2),
(49, 1, 12),
(50, 18, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `probe`
--

CREATE TABLE `probe` (
  `ProbaID` int(20) NOT NULL,
  `Cod_proba` char(3) NOT NULL,
  `Denumire_p` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `probe`
--

INSERT INTO `probe` (`ProbaID`, `Cod_proba`, `Denumire_p`) VALUES
(1, 'ALG', 'Alergat'),
(2, 'MRS', 'Mars'),
(6, 'SRT', 'Sarituri'),
(7, 'ARC', 'Aruncat ciocan'),
(8, 'MRT', 'Maraton');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sponsori_principali`
--

CREATE TABLE `sponsori_principali` (
  `SponsorID` int(20) NOT NULL,
  `Cod_sponsor` char(3) NOT NULL,
  `Denumire` varchar(50) NOT NULL,
  `An_colaborare` date NOT NULL,
  `Telefon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `sponsori_principali`
--

INSERT INTO `sponsori_principali` (`SponsorID`, `Cod_sponsor`, `Denumire`, `An_colaborare`, `Telefon`, `Email`) VALUES
(3, 'ADS', 'Adidas', '2005-02-23', '0789364590', 'adidas@gmail.com'),
(4, 'PMA', 'Puma', '2020-04-20', '0765459430', 'puma@gmail.com'),
(5, 'NEW', 'New Balance', '2022-04-02', '0766554433', 'newbalance@gmail.com'),
(6, 'LST', 'Lacoste', '2012-04-05', '0790985478', 'lacoste@gmail.com'),
(7, 'NKE', 'Nike', '2015-05-06', '0746904330', 'nike@gmail.com'),
(10, 'RBK', 'Reebok', '2023-01-03', '0746897869', 'reebok@gmail.com'),
(11, 'CNV', 'Converse', '2015-05-06', '0752897860', 'converse@gmail.com'),
(12, 'VNS', 'Vans', '2022-04-02', '0746892343', 'vans@gmail.com');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sustinere_probe`
--

CREATE TABLE `sustinere_probe` (
  `CompetitieID` int(20) NOT NULL,
  `ProbaID` int(20) NOT NULL,
  `Data_sustinere_proba` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `sustinere_probe`
--

INSERT INTO `sustinere_probe` (`CompetitieID`, `ProbaID`, `Data_sustinere_proba`) VALUES
(1, 7, '2023-04-08'),
(1, 8, '2023-05-11'),
(2, 7, '2023-10-14'),
(18, 1, '2023-08-16'),
(18, 2, '2023-11-09');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `antrenori`
--
ALTER TABLE `antrenori`
  ADD PRIMARY KEY (`AntrenorID`);

--
-- Indexuri pentru tabele `atleti`
--
ALTER TABLE `atleti`
  ADD PRIMARY KEY (`AtletID`);

--
-- Indexuri pentru tabele `competitii`
--
ALTER TABLE `competitii`
  ADD PRIMARY KEY (`CompetitieID`);

--
-- Indexuri pentru tabele `competitii_frecventate`
--
ALTER TABLE `competitii_frecventate`
  ADD PRIMARY KEY (`AtletID`,`CompetitieID`);

--
-- Indexuri pentru tabele `probe`
--
ALTER TABLE `probe`
  ADD PRIMARY KEY (`ProbaID`),
  ADD UNIQUE KEY `UNIQUE` (`Cod_proba`);

--
-- Indexuri pentru tabele `sponsori_principali`
--
ALTER TABLE `sponsori_principali`
  ADD PRIMARY KEY (`SponsorID`);

--
-- Indexuri pentru tabele `sustinere_probe`
--
ALTER TABLE `sustinere_probe`
  ADD PRIMARY KEY (`CompetitieID`,`ProbaID`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `antrenori`
--
ALTER TABLE `antrenori`
  MODIFY `AntrenorID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `atleti`
--
ALTER TABLE `atleti`
  MODIFY `AtletID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT pentru tabele `competitii`
--
ALTER TABLE `competitii`
  MODIFY `CompetitieID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `probe`
--
ALTER TABLE `probe`
  MODIFY `ProbaID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `sponsori_principali`
--
ALTER TABLE `sponsori_principali`
  MODIFY `SponsorID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
