-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Sty 2018, 20:58
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `msfe`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `calendar_events`
--

CREATE TABLE `calendar_events` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `IDUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `calendar_events`
--

INSERT INTO `calendar_events` (`ID`, `title`, `start`, `end`, `description`, `IDUser`) VALUES
(1, 'Opona d', '2018-01-12', '2018-03-09', 'Opona 12 razy dziennie ', 1),
(3, 'asdasdd', '2018-01-11', '2018-01-25', 'sadasd', 30),
(4, 'sad', '2018-01-04', '2018-01-13', 'sa', 1),
(5, 'asdasd', '2018-01-20', '2018-01-26', 'a', 1),
(6, 'd', '2018-01-13', '2018-01-28', 'd', 1),
(7, 'd', '2018-01-13', '2018-02-03', 'd', 30),
(8, 'testd', '2018-01-05', '2018-01-26', 'te', 31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarzmsfe`
--

CREATE TABLE `lekarzmsfe` (
  `idLekarz` int(11) NOT NULL,
  `imieLekarz` varchar(50) NOT NULL,
  `nazwiskoLekarz` varchar(150) NOT NULL,
  `loginLekarz` varchar(50) NOT NULL,
  `miejscepracyLekarz` varchar(255) NOT NULL,
  `telefonLekarza` int(20) NOT NULL,
  `pesel` varchar(255) NOT NULL,
  `hasloLekarz` varchar(255) DEFAULT NULL,
  `isActiveLekarz` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `lekarzmsfe`
--

INSERT INTO `lekarzmsfe` (`idLekarz`, `imieLekarz`, `nazwiskoLekarz`, `loginLekarz`, `miejscepracyLekarz`, `telefonLekarza`, `pesel`, `hasloLekarz`, `isActiveLekarz`) VALUES
(62, 'Andrzej', 'Kowalski', 'test@wp.pl', 'test', 111111111, '11111111111', '$2y$10$5t.S2wENLB9JdFue92ihhOC0pqbZBNSUflMer4jmXxxRDkInRz8/O', 1),
(63, 'testt', 'testt', 't2@wp.pl', 'testowo', 123000333, '12300033322', '$2y$10$OshOvBIg4R8PkJU8QbXiEO6ODqB4SOd2R0Y/mK3ITlJISG3wdF.8G', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `id_d` int(11) NOT NULL,
  `loginLekarz` varchar(255) DEFAULT NULL,
  `hasloLekarz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`id_d`, `loginLekarz`, `hasloLekarz`) VALUES
(1, 'xdd', '$2y$10$asbzbeL/VJ2G3dSlCpPp/ujmb44eF8vZWDBS1frxIutDQxszfF6Jm'),
(2, 'test@wp.pl', '$2y$10$r1DZ2l8xhJNo41Fxx/GA/.4g06/7QcpuvQaZ8QuNsFqoonOFJaYPO'),
(3, 'test2@wp.pl', '$2y$10$m11PxoTer.hPgt.zmkWAf.q4hHiP3APFGTFQ7AFMgvDN1fn8WsF4a'),
(4, 'test3@wp.pl', '$2y$10$/U5IAximHEoZGr7ebXzW4e27aJpIhtJ/zrPZtnXGHTXU9y.a3y7hy'),
(5, 'ad', '$2y$10$f5E7.pZeMHYDKYtbMura1OVVr9KP2awx/GimyQh2IZ5GSbDpClHq2'),
(6, 'dd', '$2y$10$Z5PLrcKNMx26GmcBk8IHWeI5zy8q2pUDK0QUMo1d69KhTCveLRTYu'),
(7, 'ddd', '$2y$10$vgg7XUPeIeFeG1W7Z7H6Luo.7ElHuG/oic8WhsFu7tkcYl4em1iZq'),
(8, 'dddd', '$2y$10$2OrGz2dGPt3u8jYfl1qtO.QmOCBZ08lNYSET4FpcmpluDHe933EjS'),
(9, 'asd', '$2y$10$t3pfZGC8gZLZ8XTikiu54.hIhaGJUPRA1Ym5BGjEDkW5mzes.Hwk6');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userconnect`
--

CREATE TABLE `userconnect` (
  `ID_U` int(11) NOT NULL,
  `idUser_C` int(11) NOT NULL,
  `idLekarz_C` int(11) NOT NULL,
  `isActive` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `userconnect`
--

INSERT INTO `userconnect` (`ID_U`, `idUser_C`, `idLekarz_C`, `isActive`) VALUES
(1, 62, 1, 1),
(2, 62, 31, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `usermsfe`
--

CREATE TABLE `usermsfe` (
  `idUser` int(11) NOT NULL,
  `imieUser` varchar(50) NOT NULL,
  `nazwiskoUser` varchar(50) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `hasloUser` varchar(255) NOT NULL,
  `adresUser` varchar(150) NOT NULL,
  `isActiveUser` tinyint(1) NOT NULL DEFAULT '1',
  `PESELUser` varchar(12) NOT NULL,
  `telefonUser` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `usermsfe`
--

INSERT INTO `usermsfe` (`idUser`, `imieUser`, `nazwiskoUser`, `emailUser`, `hasloUser`, `adresUser`, `isActiveUser`, `PESELUser`, `telefonUser`) VALUES
(1, 'asd', 'asd', 'test@wp.pl', '$2y$10$v/HyXx2f6yeaCLM9ZtYvteMMP.Z0PzDgmf7sjhIxW9ULyuzNe5/3O', 'fajnyadres', 1, '12312312333', 123123123),
(31, 'pacjent', 'pacjent', 'pacjent1@wp.pl', '$2y$10$LLMaifusIdHtYfHsCoYH3u247xdkjb.KrK4ya1hcfPjwkbN.V0Fpm', 'pacjentowo', 1, '12311133300', 333111);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lekarzmsfe`
--
ALTER TABLE `lekarzmsfe`
  ADD PRIMARY KEY (`idLekarz`),
  ADD UNIQUE KEY `loginLekarz` (`loginLekarz`),
  ADD UNIQUE KEY `telefonLekarza` (`telefonLekarza`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_d`);

--
-- Indexes for table `userconnect`
--
ALTER TABLE `userconnect`
  ADD PRIMARY KEY (`ID_U`);

--
-- Indexes for table `usermsfe`
--
ALTER TABLE `usermsfe`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `PESELUser` (`PESELUser`),
  ADD UNIQUE KEY `telefonUser` (`telefonUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `lekarzmsfe`
--
ALTER TABLE `lekarzmsfe`
  MODIFY `idLekarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT dla tabeli `test`
--
ALTER TABLE `test`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `userconnect`
--
ALTER TABLE `userconnect`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `usermsfe`
--
ALTER TABLE `usermsfe`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
