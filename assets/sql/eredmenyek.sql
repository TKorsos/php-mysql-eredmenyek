-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2024. Okt 01. 14:32
-- Kiszolgáló verziója: 8.0.17
-- PHP verzió: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `eredmenyek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `foci`
--

CREATE TABLE `foci` (
  `id` int(11) NOT NULL,
  `merkozes_tipus_id` int(11) DEFAULT NULL,
  `hazai_id` int(11) DEFAULT NULL,
  `vendeg_id` int(11) DEFAULT NULL,
  `hazai_gol` varchar(5) DEFAULT NULL,
  `vendeg_gol` varchar(5) DEFAULT NULL,
  `datum` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `foci`
--

INSERT INTO `foci` (`id`, `merkozes_tipus_id`, `hazai_id`, `vendeg_id`, `hazai_gol`, `vendeg_gol`, `datum`, `created_at`) VALUES
(1, 1, 1, 2, '2', '0', '10.09. 20:45', '2024-09-13 12:44:58'),
(2, 1, 3, 1, '0', '2', '07.09. 20:45', '2024-09-13 12:45:34'),
(3, 1, 16, 2, '3', '0', '07.09. 20:45', '2024-09-13 12:45:55'),
(17, 2, 4, 1, '2', '1', '14.07. 20:45', '2024-09-13 12:45:55'),
(18, 2, 5, 1, '1', '2', '10.07. 20:45', '2024-09-13 12:46:12'),
(19, 2, 1, 6, '2', '1', '07.09. 20:45', '2024-09-13 12:45:34'),
(20, 2, 1, 7, '2', '1', '30.06. 18:00', '2024-09-13 16:21:25'),
(21, 3, 1, 8, '0', '0', '25.06. 21:00', '2024-09-13 16:22:02'),
(22, 3, 9, 1, '1', '1', '20.06. 18:00', '2024-09-13 16:22:39'),
(23, 3, 10, 1, '0', '1', '16.06. 21:00', '2024-09-13 16:23:04'),
(24, 4, 1, 11, '0', '1', '07.06. 20:45', '2024-09-13 16:23:20'),
(25, 4, 17, 2, '2', '2', '07.06. 20:45', '2024-09-13 16:23:20'),
(26, 4, 1, 12, '3', '0', '03.06. 20:45', '2024-09-14 12:36:51'),
(27, 4, 1, 13, '2', '2', '26.03. 20:45', '2024-09-14 12:36:51'),
(28, 4, 1, 14, '0', '1', '23.03. 20:00', '2024-09-14 12:36:51'),
(29, 5, 15, 1, '1', '1', '20.11. 2023', '2024-09-14 12:36:51');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `orszagok`
--

CREATE TABLE `orszagok` (
  `id` int(11) NOT NULL,
  `orszag` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `orszagok`
--

INSERT INTO `orszagok` (`id`, `orszag`, `created_at`) VALUES
(1, 'Anglia', '2024-09-13 16:36:21'),
(2, 'Finnország', '2024-09-13 16:36:28'),
(3, 'Írország', '2024-09-13 16:36:35'),
(4, 'Spanyolország', '2024-09-13 16:36:44'),
(5, 'Hollandia', '2024-09-13 16:36:51'),
(6, 'Svájc', '2024-09-13 16:36:56'),
(7, 'Szlovákia', '2024-09-13 16:37:01'),
(8, 'Szlovénia', '2024-09-13 16:37:08'),
(9, 'Dánia', '2024-09-13 16:37:13'),
(10, 'Szerbia', '2024-09-13 16:37:18'),
(11, 'Izland', '2024-09-13 16:37:24'),
(12, 'Bosznia-Hercegovina', '2024-09-30 13:49:53'),
(13, 'Belgium', '2024-09-30 13:51:00'),
(14, 'Brazília', '2024-09-30 13:51:08'),
(15, 'Észak-Macedónia', '2024-09-30 13:51:55'),
(16, 'Görögország', '2024-09-30 14:00:55'),
(17, 'Skócia', '2024-09-30 14:09:19');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tipus`
--

CREATE TABLE `tipus` (
  `id` int(11) NOT NULL,
  `tipus_megnevezes` varchar(60) DEFAULT NULL,
  `tipus_forma` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- A tábla adatainak kiíratása `tipus`
--

INSERT INTO `tipus` (`id`, `tipus_megnevezes`, `tipus_forma`, `created_at`) VALUES
(1, 'EURÓPA: UEFA Nemzetek Ligája - B-Liga', 'Tabella', '2024-09-13 15:04:53'),
(2, 'EURÓPA: EURO - Play Off', 'Sorsolás', '2024-09-13 15:05:08'),
(3, 'EURÓPA: Euro', 'Tabella', '2024-09-13 16:18:04'),
(4, 'VILÁG: Barátságos válogatott-mérkőzés', NULL, '2024-09-13 16:18:28'),
(5, 'EURÓPA: Euro - Selejtező', 'Tabella', '2024-09-30 13:52:46');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `foci`
--
ALTER TABLE `foci`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `orszagok`
--
ALTER TABLE `orszagok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `foci`
--
ALTER TABLE `foci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `orszagok`
--
ALTER TABLE `orszagok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `tipus`
--
ALTER TABLE `tipus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
