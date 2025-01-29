-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Gen 29, 2025 alle 08:07
-- Versione del server: 5.7.39
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Strana01`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Eventi`
--

CREATE TABLE `Eventi` (
  `IDEvento` int(11) NOT NULL,
  `NomeEvento` varchar(80) NOT NULL,
  `DataEvento` date NOT NULL,
  `Immagine` text NOT NULL,
  `Descrizione` text NOT NULL,
  `eliminato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Eventi`
--

INSERT INTO `Eventi` (`IDEvento`, `NomeEvento`, `DataEvento`, `Immagine`, `Descrizione`, `eliminato`) VALUES
(26, 'Giornata internazionale contro la violenza sulle donne', '2024-11-25', 'Immagini/25Nov _ Ig _ 01.png', 'Giornata internazionale contro la violenza sulle donne. \r\nPranzo con le volontarie del centro antiviolenza SvoltaDonna', 0),
(27, 'Gaza: due mesi sotto assedio', '2024-12-09', 'Immagini/Post _ Marco 04.png', 'Marco Magnano ci spiega quello che sta avvenendo in Palestina', 0),
(28, 'DJ Ciapagalline', '2024-12-06', 'Immagini/Insta03.jpg', 'DJ Ciapagalline ci farà ballare tutta la sera grazie ai suoi vinili', 0),
(29, 'Zagara', '2025-03-01', 'Immagini/IG _ Zagara _ 02.jpg', 'Concerto', 0),
(30, 'Dazespare Modificato', '2025-03-01', '/Immagini/IG Post _ Risonanza Cricetica _ 01.png', 'Concerto', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `menuCucina`
--

CREATE TABLE `menuCucina` (
  `idPiatto` int(11) NOT NULL,
  `nomePiatto` varchar(90) NOT NULL,
  `descrizionePiatto` text NOT NULL,
  `categoriaPiatto` varchar(40) NOT NULL,
  `prezzoPiatto` float NOT NULL,
  `cuoco` varchar(40) NOT NULL,
  `disponibilitaPiatto` tinyint(1) NOT NULL,
  `dataInserimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `menuCucina`
--

INSERT INTO `menuCucina` (`idPiatto`, `nomePiatto`, `descrizionePiatto`, `categoriaPiatto`, `prezzoPiatto`, `cuoco`, `disponibilitaPiatto`, `dataInserimento`) VALUES
(150, 'Acciughe al verde', '', 'antipasti', 5, 'Tarta', 1, '2007-01-25'),
(151, 'Battuta con caramello al limone', '', 'antipasti', 7, 'Tarta', 1, '2007-01-25'),
(152, 'Caserecce zucca e gorgo', '', 'primi', 7, 'Tarta', 1, '2007-01-25'),
(153, 'Vellutata di zucca', '', 'primi', 6, 'Tarta', 1, '2007-01-25'),
(154, 'Polpettine di legumi', '', 'secondi', 6, 'Tarta', 1, '2007-01-25'),
(155, 'Merluzzo mantecato', '', 'secondi', 9, 'Tarta', 1, '2007-01-25'),
(156, 'Patate al forno', '', 'contorni', 4, 'Tarta', 1, '2007-01-25'),
(157, 'Carote al forno', '', 'contorni', 4, 'Tarta', 1, '2007-01-25'),
(158, 'Pannacotta al cioccolato', '', 'dolci', 5, 'Tarta', 1, '2007-01-25'),
(159, 'Piatto per prova cancellazione', 'creo un piatto per poi provare a cancellarlo', 'antipasti', 100, 'Pino', 0, '2023-01-25');

-- --------------------------------------------------------

--
-- Struttura della tabella `User`
--

CREATE TABLE `User` (
  `IDUser` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `utenteAttivo` tinyint(1) NOT NULL,
  `dataInserimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `User`
--

INSERT INTO `User` (`IDUser`, `UserName`, `Password`, `admin`, `utenteAttivo`, `dataInserimento`) VALUES
(3, 'Andrea', 'Strana86', 1, 0, '2024-11-29 09:21:36'),
(15, 'Akira', '$2y$10$X2sW8uxKSMFwx5mXzNARdeSb4bgqkU9HFMFmjrWvr2L.g3D2rfIWq', 1, 1, '2024-12-05 08:03:48'),
(18, 'Admin', '$2y$10$LMvL8QHVNsi6soKbfNp6We1N1PTRbe4Y1G7mWEN3ulcTEcd5BNPty', 1, 1, '2025-01-07 19:48:03'),
(19, 'Prova01', '$2y$10$GzkabEtH.3EcI6nZUL5lietmFploSFPTCvJmlyiJw88tuY8Srd.He', 1, 1, '2025-01-09 11:03:02');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Eventi`
--
ALTER TABLE `Eventi`
  ADD PRIMARY KEY (`IDEvento`);

--
-- Indici per le tabelle `menuCucina`
--
ALTER TABLE `menuCucina`
  ADD PRIMARY KEY (`idPiatto`);

--
-- Indici per le tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Eventi`
--
ALTER TABLE `Eventi`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT per la tabella `menuCucina`
--
ALTER TABLE `menuCucina`
  MODIFY `idPiatto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT per la tabella `User`
--
ALTER TABLE `User`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
