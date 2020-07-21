-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 16 2020 г., 14:52
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sklad`
--

-- --------------------------------------------------------

--
-- Структура таблицы `komplekt`
--

CREATE TABLE `komplekt` (
  `komplekt_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naklad_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `komplekt`
--

INSERT INTO `komplekt` (`komplekt_id`, `name`, `naklad_id`) VALUES
(1, 'Подшипник для рулевой', 1),
(2, 'Станок BOSCH №322', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `nakladnaya`
--

CREATE TABLE `nakladnaya` (
  `naklad_id` bigint(20) NOT NULL,
  `sklad_id` bigint(20) DEFAULT NULL,
  `date_start` date NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remont` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remont_stanka` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `nakladnaya`
--

INSERT INTO `nakladnaya` (`naklad_id`, `sklad_id`, `date_start`, `name`, `price`, `remont`, `remont_stanka`) VALUES
(1, 1, '2020-06-01', 'Запчасть', '50$', 'Громов А.А.', '500$'),
(2, 2, '2020-06-07', 'Станок', '100$', 'Гурков С.А.', '150$');

-- --------------------------------------------------------

--
-- Структура таблицы `organ`
--

CREATE TABLE `organ` (
  `organ_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `organ`
--

INSERT INTO `organ` (`organ_id`, `name`, `date_start`) VALUES
(1, 'СемСтек ', '2020-06-01'),
(2, 'МастерТросПесок ', '2020-02-05'),
(3, 'ТросАртМрамор ', '2020-04-01');

-- --------------------------------------------------------

--
-- Структура таблицы `sklad`
--

CREATE TABLE `sklad` (
  `sklad_id` bigint(20) NOT NULL,
  `organ_id` bigint(20) NOT NULL,
  `adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kol_vo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sklad`
--

INSERT INTO `sklad` (`sklad_id`, `organ_id`, `adress`, `kol_vo`) VALUES
(1, 1, 'Ул.Бейбитшилик д.33', '№5515'),
(2, 2, 'Ул.Жагалау д.25', '№5516');

-- --------------------------------------------------------

--
-- Структура таблицы `stanki`
--

CREATE TABLE `stanki` (
  `stanok_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `date_start` date NOT NULL,
  `srok_exp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` date NOT NULL,
  `komplekt_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stanki`
--

INSERT INTO `stanki` (`stanok_id`, `name`, `type_id`, `date_start`, `srok_exp`, `date_end`, `komplekt_id`) VALUES
(1, 'Фрезерный', 2, '2020-06-06', '2 года', '2021-09-01', 2),
(2, '1315', 1, '2020-07-17', '5 лет', '2020-07-25', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type_stanok`
--

CREATE TABLE `type_stanok` (
  `type_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type_stanok`
--

INSERT INTO `type_stanok` (`type_id`, `name`) VALUES
(1, 'Токарный'),
(2, 'Фрезерный'),
(6, '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `komplekt`
--
ALTER TABLE `komplekt`
  ADD PRIMARY KEY (`komplekt_id`),
  ADD KEY `FK_komplekt_nakladnaya_naklad_id` (`naklad_id`);

--
-- Индексы таблицы `nakladnaya`
--
ALTER TABLE `nakladnaya`
  ADD PRIMARY KEY (`naklad_id`),
  ADD KEY `FK_nakladnaya_sklad_sklad_id` (`sklad_id`);

--
-- Индексы таблицы `organ`
--
ALTER TABLE `organ`
  ADD PRIMARY KEY (`organ_id`);

--
-- Индексы таблицы `sklad`
--
ALTER TABLE `sklad`
  ADD PRIMARY KEY (`sklad_id`),
  ADD KEY `FK_sklad_organ_organ_id` (`organ_id`);

--
-- Индексы таблицы `stanki`
--
ALTER TABLE `stanki`
  ADD PRIMARY KEY (`stanok_id`),
  ADD KEY `FK_stanki_type_stanok_type_id` (`type_id`),
  ADD KEY `FK_stanki_komplekt_komplekt_id` (`komplekt_id`);

--
-- Индексы таблицы `type_stanok`
--
ALTER TABLE `type_stanok`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `komplekt`
--
ALTER TABLE `komplekt`
  MODIFY `komplekt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `nakladnaya`
--
ALTER TABLE `nakladnaya`
  MODIFY `naklad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `organ`
--
ALTER TABLE `organ`
  MODIFY `organ_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sklad`
--
ALTER TABLE `sklad`
  MODIFY `sklad_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `stanki`
--
ALTER TABLE `stanki`
  MODIFY `stanok_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type_stanok`
--
ALTER TABLE `type_stanok`
  MODIFY `type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `komplekt`
--
ALTER TABLE `komplekt`
  ADD CONSTRAINT `FK_komplekt_nakladnaya_naklad_id` FOREIGN KEY (`naklad_id`) REFERENCES `nakladnaya` (`naklad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `nakladnaya`
--
ALTER TABLE `nakladnaya`
  ADD CONSTRAINT `FK_nakladnaya_sklad_sklad_id` FOREIGN KEY (`sklad_id`) REFERENCES `sklad` (`sklad_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `sklad`
--
ALTER TABLE `sklad`
  ADD CONSTRAINT `FK_sklad_organ_organ_id` FOREIGN KEY (`organ_id`) REFERENCES `organ` (`organ_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `stanki`
--
ALTER TABLE `stanki`
  ADD CONSTRAINT `FK_stanki_komplekt_komplekt_id` FOREIGN KEY (`komplekt_id`) REFERENCES `komplekt` (`komplekt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_stanki_type_stanok_type_id` FOREIGN KEY (`type_id`) REFERENCES `type_stanok` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
