-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Feb 06, 2016 alle 12:50
-- Versione del server: 10.0.17-MariaDB
-- Versione PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `ID` int(11) NOT NULL,
  `Titolo` varchar(40) COLLATE armscii8_bin NOT NULL,
  `Data` date NOT NULL,
  `Ora` time NOT NULL,
  `IDsala` int(11) NOT NULL,
  `Prezzo` varchar(5) COLLATE armscii8_bin NOT NULL,
  `Regia` text COLLATE armscii8_bin NOT NULL,
  `Cast` text COLLATE armscii8_bin NOT NULL,
  `Durata` text COLLATE armscii8_bin NOT NULL,
  `Genere` text COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`ID`, `Titolo`, `Data`, `Ora`, `IDsala`, `Prezzo`, `Regia`, `Cast`, `Durata`, `Genere`) VALUES
(42, 'Vieni avanti cretino', '2016-02-02', '21:00:00', 1, '3.50', 'Vincenzo Russo', 'Gerardo Peluso, Fabiano Pecorelli', '100', 'Comico'),
(43, 'Star wars', '2016-02-02', '18:00:00', 4, '7.00', 'Vincenzo Russo', 'Gerardo Peluso, Fabiano Pecorelli', '100', 'Fantascienza'),
(44, 'Star wars', '2016-02-02', '22:00:00', 3, '8.50', 'Vincenzo Russo', 'Gerardo Peluso, Fabiano Pecorelli', '100', 'Fantascienza'),
(45, 'E fuori nevica', '2016-02-02', '21:00:00', 2, '4.50', 'Vincenzo Russo', 'Gerardo Peluso, Fabiano Pecorelli', '100', 'Comico'),
(46, 'Star wars', '2016-02-02', '22:00:00', 1, '6.50', 'Vincenzo Russo', 'Gerardo Peluso, Fabiano Pecorelli', '100', 'Fantascienza');

-- --------------------------------------------------------

--
-- Struttura della tabella `metodopagamento`
--

CREATE TABLE `metodopagamento` (
  `ID` int(11) NOT NULL,
  `tipocarta` varchar(40) COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(40) COLLATE armscii8_bin NOT NULL,
  `Cognome` varchar(40) COLLATE armscii8_bin NOT NULL,
  `Datascadenza` date NOT NULL,
  `Numero` varchar(16) COLLATE armscii8_bin NOT NULL,
  `Cvv` varchar(3) COLLATE armscii8_bin NOT NULL,
  `IDutente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `metodopagamento`
--

INSERT INTO `metodopagamento` (`ID`, `tipocarta`, `Nome`, `Cognome`, `Datascadenza`, `Numero`, `Cvv`, `IDutente`) VALUES
(1, 'Visa', 'Vincenzo', 'Russo', '2025-12-26', '1234567812345678', '333', 2),
(2, 'PostePay', 'vincenzo', 'russo', '2015-12-26', '1234567812345678', '444', 2),
(3, 'PayPal', 'vincenzo', 'russo', '2015-12-26', '1234567812345678', '663', 2),
(9, 'Unicredit', 'vincenzo', 'russo', '2016-02-02', '1234567812345678', '444', 2),
(11, 'Unicredit', 'vincenzo', 'russo', '2016-02-02', '1234567812345678', '555', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `posto`
--

CREATE TABLE `posto` (
  `ID` varchar(3) COLLATE armscii8_bin NOT NULL,
  `IDsala` int(11) DEFAULT NULL,
  `IDfilm` int(11) DEFAULT NULL,
  `IDutente` int(11) DEFAULT NULL,
  `libero` int(11) NOT NULL,
  `codice` int(11) NOT NULL,
  `guest` varchar(50) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `posto`
--

INSERT INTO `posto` (`ID`, `IDsala`, `IDfilm`, `IDutente`, `libero`, `codice`, `guest`) VALUES
('A1', 1, 42, 2, 0, 123, NULL),
('A2', 1, 42, 2, 0, 124, NULL),
('A3', 1, 42, 2, 0, 125, NULL),
('A4', 1, 42, 2, 0, 126, NULL),
('A5', 1, 42, 2, 0, 127, NULL),
('A6', 1, 42, NULL, 0, 128, 'ospite'),
('A7', 1, 42, NULL, 1, 129, NULL),
('A8', 1, 42, NULL, 1, 130, NULL),
('A9', 1, 42, NULL, 1, 131, NULL),
('B1', 1, 42, NULL, 1, 132, NULL),
('B2', 1, 42, NULL, 1, 133, NULL),
('B3', 1, 42, NULL, 1, 134, NULL),
('B4', 1, 42, NULL, 1, 135, NULL),
('B5', 1, 42, NULL, 1, 136, NULL),
('B6', 1, 42, NULL, 1, 137, NULL),
('B7', 1, 42, NULL, 1, 138, NULL),
('B8', 1, 42, NULL, 1, 139, NULL),
('B9', 1, 42, NULL, 1, 140, NULL),
('C1', 1, 42, NULL, 1, 141, NULL),
('C2', 1, 42, NULL, 1, 142, NULL),
('C3', 1, 42, NULL, 1, 143, NULL),
('C4', 1, 42, NULL, 1, 144, NULL),
('C5', 1, 42, NULL, 1, 145, NULL),
('C6', 1, 42, NULL, 1, 146, NULL),
('C7', 1, 42, NULL, 1, 147, NULL),
('C8', 1, 42, NULL, 1, 148, NULL),
('C9', 1, 42, NULL, 1, 149, NULL),
('D1', 1, 42, NULL, 1, 150, NULL),
('D2', 1, 42, NULL, 1, 151, NULL),
('D3', 1, 42, NULL, 1, 152, NULL),
('D4', 1, 42, NULL, 1, 153, NULL),
('D5', 1, 42, NULL, 1, 154, NULL),
('D6', 1, 42, NULL, 1, 155, NULL),
('D7', 1, 42, NULL, 1, 156, NULL),
('D8', 1, 42, NULL, 1, 157, NULL),
('D9', 1, 42, NULL, 1, 158, NULL),
('E1', 1, 42, 2, 0, 159, NULL),
('E2', 1, 42, NULL, 1, 160, NULL),
('E3', 1, 42, NULL, 1, 161, NULL),
('E4', 1, 42, NULL, 1, 162, NULL),
('E5', 1, 42, NULL, 1, 163, NULL),
('E6', 1, 42, NULL, 1, 164, NULL),
('E7', 1, 42, NULL, 1, 165, NULL),
('E8', 1, 42, 2, 0, 166, NULL),
('E9', 1, 42, NULL, 1, 167, NULL),
('F1', 1, 42, NULL, 1, 168, NULL),
('F2', 1, 42, NULL, 1, 169, NULL),
('F3', 1, 42, NULL, 1, 170, NULL),
('F4', 1, 42, NULL, 1, 171, NULL),
('F5', 1, 42, NULL, 1, 172, NULL),
('F6', 1, 42, NULL, 1, 173, NULL),
('F7', 1, 42, NULL, 1, 174, NULL),
('F8', 1, 42, NULL, 1, 175, NULL),
('F9', 1, 42, NULL, 1, 176, NULL),
('G1', 1, 42, NULL, 1, 177, NULL),
('G2', 1, 42, NULL, 1, 178, NULL),
('G3', 1, 42, NULL, 1, 179, NULL),
('G4', 1, 42, 2, 0, 180, NULL),
('G5', 1, 42, NULL, 1, 181, NULL),
('G6', 1, 42, NULL, 1, 182, NULL),
('G7', 1, 42, NULL, 1, 183, NULL),
('G8', 1, 42, NULL, 1, 184, NULL),
('G9', 1, 42, NULL, 1, 185, NULL),
('H1', 1, 42, NULL, 1, 186, NULL),
('H2', 1, 42, NULL, 1, 187, NULL),
('H3', 1, 42, NULL, 1, 188, NULL),
('H4', 1, 42, NULL, 1, 189, NULL),
('H5', 1, 42, NULL, 1, 190, NULL),
('H6', 1, 42, NULL, 1, 191, NULL),
('H7', 1, 42, NULL, 1, 192, NULL),
('H8', 1, 42, NULL, 1, 193, NULL),
('H9', 1, 42, NULL, 1, 194, NULL),
('I1', 1, 42, NULL, 1, 195, NULL),
('I2', 1, 42, NULL, 1, 196, NULL),
('I3', 1, 42, NULL, 1, 197, NULL),
('I4', 1, 42, NULL, 1, 198, NULL),
('I5', 1, 42, NULL, 1, 199, NULL),
('I6', 1, 42, NULL, 1, 200, NULL),
('I7', 1, 42, NULL, 1, 201, NULL),
('I8', 1, 42, NULL, 1, 202, NULL),
('I9', 1, 42, NULL, 1, 203, NULL),
('L1', 1, 42, NULL, 1, 204, NULL),
('L2', 1, 42, NULL, 1, 205, NULL),
('L3', 1, 42, NULL, 1, 206, NULL),
('L4', 1, 42, NULL, 1, 207, NULL),
('L5', 1, 42, NULL, 1, 208, NULL),
('L6', 1, 42, NULL, 1, 209, NULL),
('L7', 1, 42, NULL, 1, 210, NULL),
('L8', 1, 42, NULL, 1, 211, NULL),
('L9', 1, 42, NULL, 1, 212, NULL),
('A1', 4, 43, NULL, 1, 213, NULL),
('A2', 4, 43, NULL, 1, 214, NULL),
('A3', 4, 43, NULL, 1, 215, NULL),
('A4', 4, 43, NULL, 1, 216, NULL),
('A5', 4, 43, NULL, 1, 217, NULL),
('A6', 4, 43, NULL, 1, 218, NULL),
('A7', 4, 43, NULL, 1, 219, NULL),
('B1', 4, 43, NULL, 1, 220, NULL),
('B2', 4, 43, NULL, 1, 221, NULL),
('B3', 4, 43, NULL, 1, 222, NULL),
('B4', 4, 43, NULL, 1, 223, NULL),
('B5', 4, 43, NULL, 1, 224, NULL),
('B6', 4, 43, NULL, 1, 225, NULL),
('B7', 4, 43, NULL, 1, 226, NULL),
('C1', 4, 43, NULL, 1, 227, NULL),
('C2', 4, 43, NULL, 1, 228, NULL),
('C3', 4, 43, NULL, 1, 229, NULL),
('C4', 4, 43, NULL, 1, 230, NULL),
('C5', 4, 43, NULL, 1, 231, NULL),
('C6', 4, 43, NULL, 1, 232, NULL),
('C7', 4, 43, NULL, 1, 233, NULL),
('D1', 4, 43, NULL, 1, 234, NULL),
('D2', 4, 43, NULL, 1, 235, NULL),
('D3', 4, 43, NULL, 1, 236, NULL),
('D4', 4, 43, NULL, 1, 237, NULL),
('D5', 4, 43, NULL, 1, 238, NULL),
('D6', 4, 43, NULL, 1, 239, NULL),
('D7', 4, 43, NULL, 1, 240, NULL),
('E1', 4, 43, NULL, 1, 241, NULL),
('E2', 4, 43, NULL, 1, 242, NULL),
('E3', 4, 43, NULL, 1, 243, NULL),
('E4', 4, 43, 2, 0, 244, NULL),
('E5', 4, 43, NULL, 1, 245, NULL),
('E6', 4, 43, NULL, 1, 246, NULL),
('E7', 4, 43, NULL, 1, 247, NULL),
('F1', 4, 43, NULL, 1, 248, NULL),
('F2', 4, 43, NULL, 1, 249, NULL),
('F3', 4, 43, NULL, 1, 250, NULL),
('F4', 4, 43, NULL, 1, 251, NULL),
('F5', 4, 43, NULL, 1, 252, NULL),
('F6', 4, 43, NULL, 1, 253, NULL),
('F7', 4, 43, NULL, 1, 254, NULL),
('G1', 4, 43, NULL, 1, 255, NULL),
('G2', 4, 43, NULL, 1, 256, NULL),
('G3', 4, 43, NULL, 1, 257, NULL),
('G4', 4, 43, NULL, 1, 258, NULL),
('G5', 4, 43, NULL, 1, 259, NULL),
('G6', 4, 43, NULL, 1, 260, NULL),
('G7', 4, 43, NULL, 1, 261, NULL),
('A1', 3, 44, NULL, 1, 262, NULL),
('A2', 3, 44, NULL, 1, 263, NULL),
('A3', 3, 44, NULL, 1, 264, NULL),
('A4', 3, 44, NULL, 1, 265, NULL),
('A5', 3, 44, NULL, 1, 266, NULL),
('A6', 3, 44, NULL, 1, 267, NULL),
('A7', 3, 44, NULL, 1, 268, NULL),
('A8', 3, 44, NULL, 1, 269, NULL),
('B1', 3, 44, NULL, 1, 270, NULL),
('B2', 3, 44, NULL, 1, 271, NULL),
('B3', 3, 44, NULL, 1, 272, NULL),
('B4', 3, 44, NULL, 1, 273, NULL),
('B5', 3, 44, NULL, 1, 274, NULL),
('B6', 3, 44, NULL, 1, 275, NULL),
('B7', 3, 44, NULL, 1, 276, NULL),
('B8', 3, 44, NULL, 1, 277, NULL),
('C1', 3, 44, NULL, 1, 278, NULL),
('C2', 3, 44, NULL, 1, 279, NULL),
('C3', 3, 44, 2, 0, 280, NULL),
('C4', 3, 44, 2, 0, 281, NULL),
('C5', 3, 44, 2, 0, 282, NULL),
('C6', 3, 44, NULL, 1, 283, NULL),
('C7', 3, 44, NULL, 1, 284, NULL),
('C8', 3, 44, NULL, 1, 285, NULL),
('D1', 3, 44, NULL, 1, 286, NULL),
('D2', 3, 44, NULL, 1, 287, NULL),
('D3', 3, 44, NULL, 1, 288, NULL),
('D4', 3, 44, NULL, 1, 289, NULL),
('D5', 3, 44, NULL, 1, 290, NULL),
('D6', 3, 44, NULL, 1, 291, NULL),
('D7', 3, 44, NULL, 1, 292, NULL),
('D8', 3, 44, NULL, 1, 293, NULL),
('E1', 3, 44, NULL, 1, 294, NULL),
('E2', 3, 44, NULL, 1, 295, NULL),
('E3', 3, 44, NULL, 1, 296, NULL),
('E4', 3, 44, NULL, 1, 297, NULL),
('E5', 3, 44, NULL, 1, 298, NULL),
('E6', 3, 44, NULL, 1, 299, NULL),
('E7', 3, 44, NULL, 1, 300, NULL),
('E8', 3, 44, NULL, 1, 301, NULL),
('F1', 3, 44, NULL, 1, 302, NULL),
('F2', 3, 44, NULL, 1, 303, NULL),
('F3', 3, 44, NULL, 1, 304, NULL),
('F4', 3, 44, NULL, 1, 305, NULL),
('F5', 3, 44, NULL, 1, 306, NULL),
('F6', 3, 44, NULL, 1, 307, NULL),
('F7', 3, 44, NULL, 1, 308, NULL),
('F8', 3, 44, NULL, 1, 309, NULL),
('G1', 3, 44, NULL, 1, 310, NULL),
('G2', 3, 44, NULL, 1, 311, NULL),
('G3', 3, 44, NULL, 1, 312, NULL),
('G4', 3, 44, NULL, 1, 313, NULL),
('G5', 3, 44, NULL, 1, 314, NULL),
('G6', 3, 44, NULL, 1, 315, NULL),
('G7', 3, 44, NULL, 1, 316, NULL),
('G8', 3, 44, NULL, 1, 317, NULL),
('H1', 3, 44, NULL, 1, 318, NULL),
('H2', 3, 44, NULL, 1, 319, NULL),
('H3', 3, 44, NULL, 1, 320, NULL),
('H4', 3, 44, NULL, 1, 321, NULL),
('H5', 3, 44, NULL, 1, 322, NULL),
('H6', 3, 44, NULL, 1, 323, NULL),
('H7', 3, 44, NULL, 1, 324, NULL),
('H8', 3, 44, NULL, 1, 325, NULL),
('A1', 2, 45, NULL, 1, 326, NULL),
('A2', 2, 45, NULL, 1, 327, NULL),
('A3', 2, 45, NULL, 1, 328, NULL),
('A4', 2, 45, NULL, 1, 329, NULL),
('A5', 2, 45, NULL, 1, 330, NULL),
('A6', 2, 45, NULL, 1, 331, NULL),
('A7', 2, 45, NULL, 1, 332, NULL),
('A8', 2, 45, NULL, 1, 333, NULL),
('A9', 2, 45, NULL, 1, 334, NULL),
('A10', 2, 45, NULL, 1, 335, NULL),
('B1', 2, 45, NULL, 1, 336, NULL),
('B2', 2, 45, NULL, 1, 337, NULL),
('B3', 2, 45, NULL, 1, 338, NULL),
('B4', 2, 45, NULL, 1, 339, NULL),
('B5', 2, 45, NULL, 1, 340, NULL),
('B6', 2, 45, NULL, 1, 341, NULL),
('B7', 2, 45, NULL, 1, 342, NULL),
('B8', 2, 45, NULL, 1, 343, NULL),
('B9', 2, 45, NULL, 1, 344, NULL),
('B10', 2, 45, NULL, 1, 345, NULL),
('C1', 2, 45, NULL, 1, 346, NULL),
('C2', 2, 45, NULL, 1, 347, NULL),
('C3', 2, 45, NULL, 1, 348, NULL),
('C4', 2, 45, NULL, 1, 349, NULL),
('C5', 2, 45, NULL, 1, 350, NULL),
('C6', 2, 45, NULL, 1, 351, NULL),
('C7', 2, 45, NULL, 1, 352, NULL),
('C8', 2, 45, NULL, 1, 353, NULL),
('C9', 2, 45, NULL, 1, 354, NULL),
('C10', 2, 45, NULL, 1, 355, NULL),
('D1', 2, 45, NULL, 1, 356, NULL),
('D2', 2, 45, NULL, 1, 357, NULL),
('D3', 2, 45, NULL, 1, 358, NULL),
('D4', 2, 45, NULL, 1, 359, NULL),
('D5', 2, 45, NULL, 1, 360, NULL),
('D6', 2, 45, NULL, 1, 361, NULL),
('D7', 2, 45, NULL, 1, 362, NULL),
('D8', 2, 45, NULL, 1, 363, NULL),
('D9', 2, 45, NULL, 1, 364, NULL),
('D10', 2, 45, NULL, 1, 365, NULL),
('E1', 2, 45, NULL, 1, 366, NULL),
('E2', 2, 45, NULL, 1, 367, NULL),
('E3', 2, 45, NULL, 1, 368, NULL),
('E4', 2, 45, NULL, 1, 369, NULL),
('E5', 2, 45, NULL, 1, 370, NULL),
('E6', 2, 45, NULL, 1, 371, NULL),
('E7', 2, 45, NULL, 1, 372, NULL),
('E8', 2, 45, NULL, 1, 373, NULL),
('E9', 2, 45, NULL, 1, 374, NULL),
('E10', 2, 45, NULL, 1, 375, NULL),
('F1', 2, 45, NULL, 1, 376, NULL),
('F2', 2, 45, NULL, 1, 377, NULL),
('F3', 2, 45, NULL, 1, 378, NULL),
('F4', 2, 45, NULL, 1, 379, NULL),
('F5', 2, 45, NULL, 1, 380, NULL),
('F6', 2, 45, NULL, 1, 381, NULL),
('F7', 2, 45, NULL, 1, 382, NULL),
('F8', 2, 45, NULL, 1, 383, NULL),
('F9', 2, 45, NULL, 1, 384, NULL),
('F10', 2, 45, NULL, 1, 385, NULL),
('G1', 2, 45, NULL, 1, 386, NULL),
('G2', 2, 45, NULL, 1, 387, NULL),
('G3', 2, 45, NULL, 1, 388, NULL),
('G4', 2, 45, NULL, 1, 389, NULL),
('G5', 2, 45, NULL, 1, 390, NULL),
('G6', 2, 45, NULL, 1, 391, NULL),
('G7', 2, 45, NULL, 1, 392, NULL),
('G8', 2, 45, NULL, 1, 393, NULL),
('G9', 2, 45, NULL, 1, 394, NULL),
('G10', 2, 45, NULL, 1, 395, NULL),
('H1', 2, 45, NULL, 1, 396, NULL),
('H2', 2, 45, NULL, 1, 397, NULL),
('H3', 2, 45, NULL, 1, 398, NULL),
('H4', 2, 45, NULL, 1, 399, NULL),
('H5', 2, 45, NULL, 1, 400, NULL),
('H6', 2, 45, NULL, 1, 401, NULL),
('H7', 2, 45, NULL, 1, 402, NULL),
('H8', 2, 45, NULL, 1, 403, NULL),
('H9', 2, 45, NULL, 1, 404, NULL),
('H10', 2, 45, NULL, 1, 405, NULL),
('I1', 2, 45, NULL, 1, 406, NULL),
('I2', 2, 45, NULL, 1, 407, NULL),
('I3', 2, 45, NULL, 1, 408, NULL),
('I4', 2, 45, NULL, 1, 409, NULL),
('I5', 2, 45, NULL, 1, 410, NULL),
('I6', 2, 45, NULL, 1, 411, NULL),
('I7', 2, 45, NULL, 1, 412, NULL),
('I8', 2, 45, NULL, 1, 413, NULL),
('I9', 2, 45, NULL, 1, 414, NULL),
('I10', 2, 45, NULL, 1, 415, NULL),
('L1', 2, 45, NULL, 1, 416, NULL),
('L2', 2, 45, NULL, 1, 417, NULL),
('L3', 2, 45, NULL, 1, 418, NULL),
('L4', 2, 45, NULL, 1, 419, NULL),
('L5', 2, 45, NULL, 1, 420, NULL),
('L6', 2, 45, NULL, 1, 421, NULL),
('L7', 2, 45, NULL, 1, 422, NULL),
('L8', 2, 45, NULL, 1, 423, NULL),
('L9', 2, 45, NULL, 1, 424, NULL),
('L10', 2, 45, NULL, 1, 425, NULL),
('A1', 1, 46, NULL, 1, 426, NULL),
('A2', 1, 46, NULL, 1, 427, NULL),
('A3', 1, 46, NULL, 1, 428, NULL),
('A4', 1, 46, NULL, 1, 429, NULL),
('A5', 1, 46, NULL, 1, 430, NULL),
('A6', 1, 46, NULL, 1, 431, NULL),
('A7', 1, 46, NULL, 1, 432, NULL),
('A8', 1, 46, NULL, 1, 433, NULL),
('A9', 1, 46, NULL, 1, 434, NULL),
('B1', 1, 46, NULL, 1, 435, NULL),
('B2', 1, 46, NULL, 1, 436, NULL),
('B3', 1, 46, NULL, 1, 437, NULL),
('B4', 1, 46, NULL, 1, 438, NULL),
('B5', 1, 46, NULL, 1, 439, NULL),
('B6', 1, 46, NULL, 1, 440, NULL),
('B7', 1, 46, NULL, 1, 441, NULL),
('B8', 1, 46, NULL, 1, 442, NULL),
('B9', 1, 46, NULL, 1, 443, NULL),
('C1', 1, 46, NULL, 1, 444, NULL),
('C2', 1, 46, NULL, 1, 445, NULL),
('C3', 1, 46, NULL, 1, 446, NULL),
('C4', 1, 46, NULL, 1, 447, NULL),
('C5', 1, 46, NULL, 1, 448, NULL),
('C6', 1, 46, NULL, 1, 449, NULL),
('C7', 1, 46, NULL, 1, 450, NULL),
('C8', 1, 46, NULL, 1, 451, NULL),
('C9', 1, 46, NULL, 1, 452, NULL),
('D1', 1, 46, NULL, 1, 453, NULL),
('D2', 1, 46, NULL, 1, 454, NULL),
('D3', 1, 46, NULL, 1, 455, NULL),
('D4', 1, 46, NULL, 1, 456, NULL),
('D5', 1, 46, NULL, 1, 457, NULL),
('D6', 1, 46, NULL, 1, 458, NULL),
('D7', 1, 46, NULL, 1, 459, NULL),
('D8', 1, 46, NULL, 1, 460, NULL),
('D9', 1, 46, NULL, 1, 461, NULL),
('E1', 1, 46, NULL, 1, 462, NULL),
('E2', 1, 46, NULL, 1, 463, NULL),
('E3', 1, 46, NULL, 1, 464, NULL),
('E4', 1, 46, NULL, 1, 465, NULL),
('E5', 1, 46, NULL, 1, 466, NULL),
('E6', 1, 46, NULL, 1, 467, NULL),
('E7', 1, 46, NULL, 1, 468, NULL),
('E8', 1, 46, NULL, 1, 469, NULL),
('E9', 1, 46, NULL, 1, 470, NULL),
('F1', 1, 46, NULL, 1, 471, NULL),
('F2', 1, 46, NULL, 1, 472, NULL),
('F3', 1, 46, NULL, 1, 473, NULL),
('F4', 1, 46, NULL, 1, 474, NULL),
('F5', 1, 46, NULL, 1, 475, NULL),
('F6', 1, 46, NULL, 1, 476, NULL),
('F7', 1, 46, NULL, 1, 477, NULL),
('F8', 1, 46, NULL, 1, 478, NULL),
('F9', 1, 46, NULL, 1, 479, NULL),
('G1', 1, 46, NULL, 1, 480, NULL),
('G2', 1, 46, NULL, 1, 481, NULL),
('G3', 1, 46, NULL, 1, 482, NULL),
('G4', 1, 46, NULL, 1, 483, NULL),
('G5', 1, 46, NULL, 1, 484, NULL),
('G6', 1, 46, NULL, 1, 485, NULL),
('G7', 1, 46, NULL, 1, 486, NULL),
('G8', 1, 46, NULL, 1, 487, NULL),
('G9', 1, 46, NULL, 1, 488, NULL),
('H1', 1, 46, NULL, 1, 489, NULL),
('H2', 1, 46, NULL, 1, 490, NULL),
('H3', 1, 46, NULL, 1, 491, NULL),
('H4', 1, 46, NULL, 1, 492, NULL),
('H5', 1, 46, NULL, 1, 493, NULL),
('H6', 1, 46, NULL, 1, 494, NULL),
('H7', 1, 46, NULL, 1, 495, NULL),
('H8', 1, 46, NULL, 1, 496, NULL),
('H9', 1, 46, NULL, 1, 497, NULL),
('I1', 1, 46, NULL, 1, 498, NULL),
('I2', 1, 46, NULL, 1, 499, NULL),
('I3', 1, 46, NULL, 1, 500, NULL),
('I4', 1, 46, NULL, 1, 501, NULL),
('I5', 1, 46, NULL, 1, 502, NULL),
('I6', 1, 46, NULL, 1, 503, NULL),
('I7', 1, 46, NULL, 1, 504, NULL),
('I8', 1, 46, NULL, 1, 505, NULL),
('I9', 1, 46, NULL, 1, 506, NULL),
('L1', 1, 46, NULL, 1, 507, NULL),
('L2', 1, 46, NULL, 1, 508, NULL),
('L3', 1, 46, NULL, 1, 509, NULL),
('L4', 1, 46, NULL, 1, 510, NULL),
('L5', 1, 46, NULL, 1, 511, NULL),
('L6', 1, 46, NULL, 1, 512, NULL),
('L7', 1, 46, NULL, 1, 513, NULL),
('L8', 1, 46, NULL, 1, 514, NULL),
('L9', 1, 46, 2, 0, 515, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `sala`
--

CREATE TABLE `sala` (
  `ID` int(11) NOT NULL,
  `Numerofile` int(11) NOT NULL,
  `Numerocolonne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `sala`
--

INSERT INTO `sala` (`ID`, `Numerofile`, `Numerocolonne`) VALUES
(1, 10, 9),
(2, 10, 10),
(3, 8, 8),
(4, 7, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `Nickname` varchar(30) COLLATE armscii8_bin NOT NULL,
  `Password` varchar(30) COLLATE armscii8_bin NOT NULL,
  `Nome` varchar(30) COLLATE armscii8_bin DEFAULT NULL,
  `Cognome` varchar(30) COLLATE armscii8_bin DEFAULT NULL,
  `Indirizzo` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `Email` varchar(50) COLLATE armscii8_bin DEFAULT NULL,
  `Codfis` varchar(16) COLLATE armscii8_bin DEFAULT NULL,
  `Tipo` int(11) NOT NULL,
  `Datanascita` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `Nickname`, `Password`, `Nome`, `Cognome`, `Indirizzo`, `Email`, `Codfis`, `Tipo`, `Datanascita`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, NULL, NULL, 0, NULL),
(2, 'vincenzo', 'russo', 'Vincenzo', 'Russo', 'via santa maria delle grazie 19', 'v.russo57@studenti.unisa.it', '', 1, '1994-12-02'),
(4, 'gerardo', 'peluso', 'Gerardo', 'Peluso', 'Via lamia', 'g.peluso14@studenti.unisa.it', NULL, 1, '1994-03-26');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `film_ibfk_1` (`IDsala`);

--
-- Indici per le tabelle `metodopagamento`
--
ALTER TABLE `metodopagamento`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDutente` (`IDutente`);

--
-- Indici per le tabelle `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `posto_ibfk_1` (`IDsala`),
  ADD KEY `posto_ibfk_2` (`IDfilm`),
  ADD KEY `posto_ibfk_3` (`IDutente`);

--
-- Indici per le tabelle `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT per la tabella `metodopagamento`
--
ALTER TABLE `metodopagamento`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT per la tabella `posto`
--
ALTER TABLE `posto`
  MODIFY `codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`IDsala`) REFERENCES `sala` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `metodopagamento`
--
ALTER TABLE `metodopagamento`
  ADD CONSTRAINT `metodopagamento_ibfk_1` FOREIGN KEY (`IDutente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `posto`
--
ALTER TABLE `posto`
  ADD CONSTRAINT `posto_ibfk_1` FOREIGN KEY (`IDsala`) REFERENCES `sala` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posto_ibfk_2` FOREIGN KEY (`IDfilm`) REFERENCES `film` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posto_ibfk_3` FOREIGN KEY (`IDutente`) REFERENCES `utenti` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
