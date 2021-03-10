-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 10 2021 г., 01:38
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car-rental`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id_brand` int UNSIGNED NOT NULL,
  `name_brand` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`) VALUES
(1, 'Acura'),
(2, 'Adler'),
(3, 'Alfa Romeo'),
(4, 'Alpina'),
(5, 'Alpine'),
(6, 'AM General'),
(7, 'AMC'),
(8, 'Ariel'),
(9, 'Aro'),
(10, 'Asia'),
(11, 'Aston Martin'),
(12, 'Audi'),
(13, 'Austin'),
(14, 'Autobianchi'),
(15, 'Bajaj'),
(16, 'Baltijas Dzips'),
(17, 'Batmobile'),
(18, 'Beijing'),
(19, 'Bentley'),
(20, 'Bertone'),
(21, 'Bilenkin'),
(22, 'Bitter'),
(23, 'BMW'),
(24, 'Borgward'),
(25, 'Brabus'),
(26, 'Bricklin'),
(27, 'Brilliance'),
(28, 'Bristol'),
(29, 'Bufori'),
(30, 'Bugatti'),
(31, 'Buick'),
(32, 'BYD'),
(33, 'Byvin'),
(34, 'Cadillac'),
(35, 'Callaway'),
(36, 'Carbodies'),
(37, 'Caterham'),
(38, 'Changan'),
(39, 'ChangFeng'),
(40, 'Chery'),
(41, 'Chevrolet'),
(42, 'Chrysler'),
(43, 'Citroen'),
(44, 'Cizeta'),
(45, 'Coggiola'),
(46, 'Dacia'),
(47, 'Dadi'),
(48, 'Daewoo2'),
(49, 'Daihatsu'),
(50, 'Daimler'),
(51, 'Datsun'),
(52, 'De Tomaso'),
(53, 'Delage'),
(54, 'DeLorean'),
(55, 'Derways'),
(56, 'DeSoto'),
(57, 'Dodge'),
(58, 'DongFeng'),
(59, 'Doninvest'),
(60, 'Donkervoort'),
(61, 'DS'),
(62, 'E-Car'),
(63, 'Eagle'),
(64, 'Eagle Cars'),
(65, 'Ecomotors'),
(66, 'Excalibur'),
(67, 'FAW'),
(68, 'Ferrari'),
(69, 'Fiat'),
(70, 'Fisker'),
(71, 'Ford'),
(72, 'Foton'),
(73, 'FSO'),
(74, 'Fuqi'),
(75, 'Geely'),
(76, 'Genesis'),
(77, 'Geo'),
(78, 'GMC'),
(79, 'Gonow'),
(80, 'Gordon'),
(81, 'Great Wall'),
(82, 'Hafei'),
(83, 'Haima'),
(84, 'Hanomag'),
(85, 'Haval'),
(86, 'Hawtai'),
(87, 'Hindustan'),
(88, 'Hispano-Suiza'),
(89, 'Holden'),
(90, 'Honda'),
(91, 'HuangHai'),
(92, 'Hudson'),
(93, 'Hummer'),
(94, 'Hyundai'),
(95, 'Infiniti'),
(96, 'Innocenti'),
(97, 'Invicta'),
(98, 'Iran Khodro'),
(99, 'Isdera'),
(100, 'Isuzu'),
(101, 'JAC'),
(102, 'Jaguar'),
(103, 'Jeep'),
(104, 'Jensen'),
(105, 'JMC'),
(106, 'Kia'),
(107, 'Koenigsegg'),
(108, 'KTM AG'),
(109, 'LADA (ВАЗ)'),
(110, 'Lamborghini'),
(111, 'Lancia'),
(112, 'Land Rover'),
(113, 'Landwind'),
(114, 'Lexus'),
(115, 'Liebao Motor'),
(116, 'Lifan'),
(117, 'Lincoln'),
(118, 'Lotus'),
(119, 'LTI'),
(120, 'Luxgen'),
(121, 'Mahindra'),
(122, 'Marcos'),
(123, 'Marlin'),
(124, 'Marussia'),
(125, 'Maruti'),
(126, 'Maserati'),
(127, 'Maybach'),
(128, 'Mazda'),
(129, 'McLare1'),
(130, 'Mega'),
(131, 'Mercedes-Benz'),
(132, 'Mercury'),
(133, 'Metrocab'),
(134, 'MG'),
(135, 'Microcar'),
(136, 'Minelli'),
(137, 'MINI'),
(138, 'Mitsubishi'),
(139, 'Mitsuoka'),
(140, 'Morgan'),
(141, 'Morris'),
(142, 'Nissan'),
(143, 'Noble'),
(144, 'Oldsmobile'),
(145, 'Opel'),
(146, 'Osca'),
(147, 'Packard'),
(148, 'Pagani'),
(149, 'Panoz'),
(150, 'Perodua'),
(151, 'Peugeot'),
(152, 'PGO'),
(153, 'Piaggio'),
(154, 'Plymouth'),
(155, 'Pontiac'),
(156, 'Porsche'),
(157, 'Premier'),
(158, 'Proton'),
(159, 'PUCH'),
(160, 'Puma'),
(161, 'Qoros'),
(162, 'Qvale'),
(163, 'Ravon'),
(164, 'Reliant'),
(165, 'Renaissance'),
(166, 'Renault'),
(167, 'Renault Samsung'),
(168, 'Rezvani'),
(169, 'Rimac'),
(170, 'Rolls-Royce'),
(171, 'Ronart'),
(172, 'Rover'),
(173, 'Saab'),
(174, 'Saleen'),
(175, 'Santana'),
(176, 'Saturn'),
(177, 'Scion'),
(178, 'SEAT'),
(179, 'Shanghai Maple'),
(180, 'ShuangHuan'),
(181, 'Skoda'),
(182, 'Smart'),
(183, 'Soueast'),
(184, 'Spectre'),
(185, 'Spyker'),
(186, 'SsangYong'),
(187, 'Steyr'),
(188, 'Subaru'),
(189, 'Suzuki'),
(190, 'Talbot'),
(191, 'TATA'),
(192, 'Tatra'),
(193, 'Tazzari'),
(194, 'Tesla'),
(195, 'Think'),
(196, 'Tianma'),
(197, 'Tianye'),
(198, 'Tofas'),
(199, 'Toyota'),
(200, 'Trabant'),
(201, 'Tramontana'),
(202, 'Triumph'),
(203, 'TVR'),
(204, 'Ultima'),
(205, 'Vauxhall'),
(206, 'Vector'),
(207, 'Venturi'),
(208, 'Volkswagen'),
(209, 'Volvo'),
(210, 'Vortex'),
(211, 'W Motors'),
(212, 'Wanderer'),
(213, 'Wartburg'),
(214, 'Westfield'),
(215, 'Wiesmann'),
(216, 'Willys'),
(217, 'Xin Kai'),
(218, 'Zastava'),
(219, 'Zenos'),
(220, 'Zenvo'),
(221, 'Zibar'),
(222, 'Zotye'),
(223, 'ZX');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int UNSIGNED NOT NULL,
  `id_brand` int UNSIGNED NOT NULL,
  `name_auto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_auto` varchar(255) NOT NULL,
  `id_box` int UNSIGNED NOT NULL,
  `year_release` int UNSIGNED NOT NULL,
  `engine_capacity` float NOT NULL,
  `price_rental` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `id_brand`, `name_auto`, `img_auto`, `id_box`, `year_release`, `engine_capacity`, `price_rental`) VALUES
(1, 131, 'Mercedes AMG S63', '0b65af7f2357d3fa0ee8d8972d7e0646.png', 1, 2020, 4, 7800),
(2, 11, 'Aston Martin DB11', '263d7e75f0c88646ead4a09a21f19873.png', 1, 2021, 5, 6500),
(3, 30, 'Bugatti CHIRON Sport300', 'e5b5ea7c27cd293b4295a69d2e324ad5.png', 2, 2019, 8, 9500),
(4, 34, 'Cadillaс Escalade', 'f2e3f2b2db112d8291803d38d52123e1.png', 1, 2016, 6, 5600),
(5, 110, 'Lamborghini Huracan', '793514409cd3a793594b74f506b884c6.png', 1, 2018, 5, 5600),
(6, 71, 'Ford Mustang GT5', 'a8cbff5a1c189b063013dfe6f071c9f1.png', 2, 2019, 5, 4300),
(7, 156, 'Porshe 911 Turbo', '8903936685c0776cc0bc10b64d585949.png', 1, 2020, 3, 6300),
(8, 194, 'Tesla Model S', 'bc250e0d83c37b0953ada14e7bbc1dfd.png', 1, 2018, 2, 3500),
(9, 142, 'Nissan GT R', '8928603cd5f39e8583cf8becbc180bd2.png', 1, 2015, 4, 5700);

-- --------------------------------------------------------

--
-- Структура таблицы `type_box`
--

CREATE TABLE `type_box` (
  `id_type` int UNSIGNED NOT NULL,
  `name_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_box`
--

INSERT INTO `type_box` (`id_type`, `name_type`) VALUES
(1, 'АКПП'),
(2, 'МКПП');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user_cart`
--

CREATE TABLE `user_cart` (
  `id_cart` int UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `id_product` int UNSIGNED NOT NULL,
  `date_rental` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_box` (`id_box`);

--
-- Индексы таблицы `type_box`
--
ALTER TABLE `type_box`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Индексы таблицы `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `type_box`
--
ALTER TABLE `type_box`
  MODIFY `id_type` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id_cart` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
