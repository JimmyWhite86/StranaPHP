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

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `menuCucina`
--
ALTER TABLE `menuCucina`
  ADD PRIMARY KEY (`idPiatto`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `menuCucina`
--
ALTER TABLE `menuCucina`
  MODIFY `idPiatto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
