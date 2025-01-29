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

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Eventi`
--
ALTER TABLE `Eventi`
  ADD PRIMARY KEY (`IDEvento`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Eventi`
--
ALTER TABLE `Eventi`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
