-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Gen 29, 2025 alle 08:08
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
-- Indici per le tabelle `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`IDUser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `User`
--
ALTER TABLE `User`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
