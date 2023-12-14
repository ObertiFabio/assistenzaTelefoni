-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 04, 2023 alle 13:39
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oberti`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cellulari`
--

CREATE TABLE `cellulari` (
  `id` int(11) DEFAULT NULL,
  `garanzia` varchar(100) DEFAULT NULL,
  `marca` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `cellulari`
--

INSERT INTO `cellulari` (`id`, `garanzia`, `marca`) VALUES
(1, 'Laurea in Ingegneria Elettronica', 'BF814JT'),
(2, 'Licenza media', 'GC586WF'),
(3, 'Diploma di specializzazione', ''),
(4, 'Diploma di specializzazione', 'GE928MH'),
(5, 'Licenza elementare', 'XL165HK'),
(6, 'Diploma di specializzazione', 'BZ393SR'),
(7, 'Diploma di specializzazione', 'JP972BF'),
(8, 'Diploma di specializzazione', 'HB211ZY'),
(9, 'Licenza elementare', 'GK693NP'),
(10, 'Laurea in Ingegneria Biomedica', 'JS921AH');

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `richiesta_id` int(11) NOT NULL,
  `problema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `contiene`
--

INSERT INTO `contiene` (`richiesta_id`, `problema_id`) VALUES
(3432, 243),
(3432, 243);

-- --------------------------------------------------------

--
-- Struttura della tabella `dipendenti`
--

CREATE TABLE `dipendenti` (
  `matricola` char(10) NOT NULL,
  `nome` char(20) NOT NULL,
  `cognome` char(20) NOT NULL,
  `mansione` char(20) NOT NULL,
  `password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `manutentori`
--

CREATE TABLE `manutentori` (
  `id_manutentore` int(11) NOT NULL,
  `titolo_studio` text NOT NULL,
  `nome` text NOT NULL,
  `disponibilità` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `manutentori`
--

INSERT INTO `manutentori` (`id_manutentore`, `titolo_studio`, `nome`, `disponibilità`) VALUES
(324, 'ingegnere informatico', 'fabio', 1),
(324, 'ingegnere informatico', 'fabio', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `problemi`
--

CREATE TABLE `problemi` (
  `id` int(11) DEFAULT NULL,
  `problema` varchar(10) DEFAULT NULL,
  `tempo_riparazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `problemi`
--

INSERT INTO `problemi` (`id`, `problema`, `tempo_riparazione`) VALUES
(1, 'Neri', '1984-11-29'),
(2, 'Rossi', '2012-04-14'),
(3, 'Rossi', '2011-12-13'),
(4, 'Castani', '1967-04-22'),
(5, 'Castani', '1973-10-17'),
(6, 'Biondi', '1954-11-22'),
(7, 'Castani', '2008-02-16'),
(8, 'Biondi', '1953-05-05'),
(9, 'Biondi', '1961-05-02'),
(10, 'Biondi', '1977-11-02');

-- --------------------------------------------------------

--
-- Struttura della tabella `richieste`
--

CREATE TABLE `richieste` (
  `id_richiesta` int(11) NOT NULL,
  `descrizione` text NOT NULL,
  `data` date NOT NULL,
  `stato` tinyint(1) NOT NULL,
  `dipendente_matricola` int(11) NOT NULL,
  `cellulare_id` int(11) NOT NULL,
  `manutentore_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `richieste`
--

INSERT INTO `richieste` (`id_richiesta`, `descrizione`, `data`, `stato`, `dipendente_matricola`, `cellulare_id`, `manutentore_id`) VALUES
(1, 'NON VA AUDIO', '2023-11-24', 1, 3456, 234, 123),
(1, 'NON VA AUDIO', '2023-11-24', 1, 3456, 234, 123);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `dipendenti`
--
ALTER TABLE `dipendenti`
  ADD PRIMARY KEY (`matricola`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
