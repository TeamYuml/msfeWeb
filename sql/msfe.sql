-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Sty 2018, 15:39
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
  `IDUser` int(11) DEFAULT NULL,
  `CzasPodania` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `calendar_events`
--

INSERT INTO `calendar_events` (`ID`, `title`, `start`, `end`, `description`, `IDUser`, `CzasPodania`) VALUES
(1, 'Opona d', '2018-01-12', '2018-03-09', 'Opona 12 razy dziennie ', 1, 1),
(3, 'asdasdd', '2018-01-11', '2018-01-25', 'sadasd', 30, NULL),
(4, 'sad', '2018-01-04', '2018-01-13', 'sa', 1, 123),
(5, 'asdasd', '2018-01-20', '2018-01-26', 'a', 1, NULL),
(6, 'd', '2018-01-13', '2018-01-28', 'd', 1, NULL),
(7, 'd', '2018-01-13', '2018-02-03', 'd', 30, NULL),
(8, 'Lek1', '2018-01-05', '2018-01-26', 'te', 31, 0),
(9, 'asld', '2018-01-16', '2018-01-20', 'dskalsdk', 1, NULL),
(10, 'asd', '2018-01-21', '2018-01-27', 'sd', 1, 1),
(11, 'd', '2018-01-28', '2018-01-25', 'd', 1, 2333),
(12, 'adasd', '2018-01-24', '2018-01-26', 'asdasd', 33, 11),
(13, 'xxzcxcczx', '2018-01-27', '2018-01-30', 'cxzczxcxzczx', 34, 0),
(14, 'xD', '2018-01-25', '2018-01-27', 'XD', 35, 11);

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
  `isActiveLekarz` tinyint(1) DEFAULT '1',
  `Stanowisko` varchar(50) NOT NULL DEFAULT 'Lekarz'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `lekarzmsfe`
--

INSERT INTO `lekarzmsfe` (`idLekarz`, `imieLekarz`, `nazwiskoLekarz`, `loginLekarz`, `miejscepracyLekarz`, `telefonLekarza`, `pesel`, `hasloLekarz`, `isActiveLekarz`, `Stanowisko`) VALUES
(62, 'Andrzej', 'Kowalski', 'test@wp.pl', 'test', 111111111, '11111111111', '$2y$10$5t.S2wENLB9JdFue92ihhOC0pqbZBNSUflMer4jmXxxRDkInRz8/O', 1, 'Lekarz'),
(63, 'testt', 'testt', 't2@wp.pl', 'testowo', 123000333, '12300033322', '$2y$10$OshOvBIg4R8PkJU8QbXiEO6ODqB4SOd2R0Y/mK3ITlJISG3wdF.8G', 1, 'Lekarz'),
(64, 'te3', 'te3', 't3@wp.pl', 'rtsad', 393222399, '00099933323', '$2y$10$vvxvXDnHl8BA1Xf36E/Sm.0pTtJnmFOEkL562SgkGfEsGGnCNuATO', 1, 'Lekarz'),
(65, 't44', 't44t', 't4@wp.pl', 't44', 303000332, '03322211143', '$2y$10$duxRR0JoIpyD1TvdYwL0su5NfG.rdzQdP.j6lB4MFnYQnua0NaDpy', 1, 'Lekarz'),
(66, 'test', 'test', 'testowypracownik@wp.pl', 'test', 333222, '12333344422', '$2y$10$HeqJvYIkHs0O8N4CBV8epOd/KMLZ5GvziUMxdeFM6dUqCcYaYK18y', 1, 'Lekarz'),
(67, 'ksadjakjdskd', 'skajdkasjdkajdka', 'kasdksa@wp.pl', 'jdaskdjaksjd', 123123123, '12300035317', '$2y$10$NAsVrkCR2VDyVYUKwaFuauMJ/ymb4c6.0122vMuME.Tt9QuRsQYoe', 1, 'Lekarz');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pielegniarkamsfe`
--

CREATE TABLE `pielegniarkamsfe` (
  `idP` int(11) NOT NULL,
  `imieP` varchar(50) NOT NULL,
  `nazwiskoP` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hasloP` varchar(255) NOT NULL,
  `pesel` varchar(12) NOT NULL,
  `miejscepracy` varchar(255) NOT NULL,
  `telefon` bigint(20) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `stanowisko` varchar(50) DEFAULT 'Pielegniarka/az'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pielegniarkamsfe`
--

INSERT INTO `pielegniarkamsfe` (`idP`, `imieP`, `nazwiskoP`, `email`, `hasloP`, `pesel`, `miejscepracy`, `telefon`, `isActive`, `stanowisko`) VALUES
(1, 'te2', 'te2', 't2@wp.pl', 'te2', '12312312313', 'asdasld', 123123123, 1, 'Pielegniarka/az'),
(2, 'test', 'test', 'testo@wp.pl', '$2y$10$Yq1EgN/GgZKConcwCdvirOWfHloGwyWKdrB7ARXvP3N4A7a9VDQjm', '00099933333', 'teste33', 123993933, 1, 'Pielegniarka/az');

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
  `isActive` tinyint(4) DEFAULT '1',
  `idP_C` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `userconnect`
--

INSERT INTO `userconnect` (`ID_U`, `idUser_C`, `idLekarz_C`, `isActive`, `idP_C`) VALUES
(34, 1, 62, 0, 1),
(35, 33, 64, 1, 2),
(36, 34, 62, 1, 0);

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
  `MiastoUser` varchar(255) NOT NULL,
  `UlicaUser` varchar(255) NOT NULL,
  `NrmUser` varchar(50) NOT NULL,
  `isActiveUser` tinyint(1) NOT NULL DEFAULT '1',
  `PESELUser` varchar(12) NOT NULL,
  `telefonUser` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `usermsfe`
--

INSERT INTO `usermsfe` (`idUser`, `imieUser`, `nazwiskoUser`, `emailUser`, `hasloUser`, `MiastoUser`, `UlicaUser`, `NrmUser`, `isActiveUser`, `PESELUser`, `telefonUser`) VALUES
(1, 'asd', 'asd', 'test@wp.pl', '$2y$10$v/HyXx2f6yeaCLM9ZtYvteMMP.Z0PzDgmf7sjhIxW9ULyuzNe5/3O', 'asd', '', '', 1, '12312312333', 123123123),
(31, 'pacjent', 'pacjent', 'pacjent1@wp.pl', '$2y$10$LLMaifusIdHtYfHsCoYH3u247xdkjb.KrK4ya1hcfPjwkbN.V0Fpm', '', '', '', 1, '12311133300', 333111),
(32, 'testko', 'testko', 'testowy@wp.pl', '$2y$10$UMB8kadYChaa/SiCbhcH3OxUh0l6xScvqfJbWKUbhersy7f/HNnjK', '', '', '', 1, '00300033311', 7008802),
(33, 'pacjent2', 'pacjent2', 'pacjent2@wp.pl', '$2y$10$RDuhXrU6X7AtgOstlmY5guNOPRWwv4iG0VkW17RVBE1wEknlIcRs2', 'ddd', 'dsad', '12', 1, '19919919999', 939293949),
(34, 'tes', 'kk', 'fajnypacjent@wp.pl', '$2y$10$1Q3mrCuvFVoR1dzpsEB7AeiC8o83XsxfH7eKD5Rk0G94lMX4IZQ4S', 'lk', 'lklklk', '2332', 1, '99933322211', 233999222),
(35, 'lol', 'lol', 'lol@exmaple.org', '$2y$10$BD9AAjlyZQqvPBFmg7jQ8uZq1esc4DJyF42Mvmht2FBhxo9T3hvN2', 'xd', 'FAJNE', '12', 1, '75321486520', 123333333);

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
-- Indexes for table `pielegniarkamsfe`
--
ALTER TABLE `pielegniarkamsfe`
  ADD PRIMARY KEY (`idP`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `hasloP` (`hasloP`),
  ADD UNIQUE KEY `pesel` (`pesel`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `lekarzmsfe`
--
ALTER TABLE `lekarzmsfe`
  MODIFY `idLekarz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT dla tabeli `pielegniarkamsfe`
--
ALTER TABLE `pielegniarkamsfe`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `test`
--
ALTER TABLE `test`
  MODIFY `id_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `userconnect`
--
ALTER TABLE `userconnect`
  MODIFY `ID_U` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT dla tabeli `usermsfe`
--
ALTER TABLE `usermsfe`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
