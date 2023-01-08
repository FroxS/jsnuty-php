-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2023, 15:28
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `php-mvc`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `opis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `music`
--

INSERT INTO `music` (`id`, `name`, `link`, `opis`) VALUES
(36, 'Dj Killer x David Tango - Anything', 'https://www.youtube.com/embed/wlX991h4_7c', 'Dj Killer x David Tango - Anything');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `music_user`
--

CREATE TABLE `music_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `music_user`
--

INSERT INTO `music_user` (`id`, `user_id`, `music_id`) VALUES
(5, 3, 36);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `status`) VALUES
(3, 'test', 'test@wp.pl', '$2y$10$670a.UFvazNh/HUtii0n1O.fM5aO3d/NGB/sMCCbD6cpsP0f2LFLu', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `music_user`
--
ALTER TABLE `music_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `music_user`
--
ALTER TABLE `music_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
