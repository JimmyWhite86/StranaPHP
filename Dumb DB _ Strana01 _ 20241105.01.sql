-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Nov 05, 2024 alle 07:53
-- Versione del server: 5.7.39
-- Versione PHP: 7.4.33

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
  `NomeEvento` varchar(40) NOT NULL,
  `DataEvento` date NOT NULL,
  `Immagine` text NOT NULL,
  `Descrizione` text NOT NULL,
  `eliminato` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `Eventi`
--

INSERT INTO `Eventi` (`IDEvento`, `NomeEvento`, `DataEvento`, `Immagine`, `Descrizione`, `eliminato`) VALUES
(1, 'Partizan', '2024-10-31', 'immagini/IG _ Partizan _ 01.png', 'Cena partizan piu musica e djset', 0),
(3, 'Bagna Cauda', '2024-10-24', 'immagini/IG _ Bagna _ 01.png', 'cena bagna', 0),
(4, 'Cena BSD + Live Music', '2024-12-26', 'immagini/IG _ BSD _ 01.JPG', 'Cena e musica', 1),
(5, 'Musica in Prossimità & LavaLamp', '2024-11-30', 'immagini/ig _ lavalamp _ 01.png', '            qua provo a scrivere un sacco di cosae sadflkmasdf lkadmvlkasm flkasjflkasdjfoisjadfoiwjogaskjnaskjvn. jdsoifjasldkfjlkasdjf joiasdjfoaisjdfoiajsdfojiasdfl oisjdfoiajsdfoiasjdf', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `menuCucina`
--

CREATE TABLE `menuCucina` (
  `idPiatto` int(11) NOT NULL,
  `nomePiatto` varchar(40) NOT NULL,
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
(1, 'Gnocchi ai formaggi', '            ', 'primi', 7, 'Pino', 1, '2028-10-24'),
(3, 'cotoletta', '            ', 'secondi', 10, 'Tarta', 1, '2028-10-24'),
(4, 'patate al forno', '            ', 'contorni', 4, 'Pino', 1, '2028-10-24'),
(5, 'verdure miste', '            ', 'contorni', 4, 'Pino', 1, '2028-10-24'),
(6, 'insalata', '            ', 'contorni', 3, 'Pino', 0, '2028-10-24'),
(7, 'Pasta al pesto', '            ', 'primi', 4, 'Tarta', 1, '2028-10-24'),
(8, 'Tomini al forno', '            ', 'secondi', 6, 'Tarta', 1, '2028-10-24'),
(9, 'Battuta di fassone', '            ', 'antipasti', 6, 'Tarta', 1, '2028-10-24');

-- --------------------------------------------------------

--
-- Struttura della tabella `User`
--

CREATE TABLE `User` (
  `IDUser` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `User`
--

INSERT INTO `User` (`IDUser`, `UserName`, `Password`, `admin`) VALUES
(3, 'Andrea', 'Strana86', 1),
(4, 'Alice', 'Abbadia01', 1);

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
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `menuCucina`
--
ALTER TABLE `menuCucina`
  MODIFY `idPiatto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `User`
--
ALTER TABLE `User`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
