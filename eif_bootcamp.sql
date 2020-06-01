-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июн 01 2020 г., 21:18
-- Версия сервера: 5.7.30-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eif_bootcamp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Pitching'),
(2, 'Marketing & sales'),
(3, 'Fundraising & managing finances'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Структура таблицы `learning`
--

CREATE TABLE `learning` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `learning`
--

INSERT INTO `learning` (`id`, `category_id`, `name`, `img_path`, `link`, `created_at`) VALUES
(1, 1, 'Test 1', '../../uploads/admin/category/1590973266635.jpg', 'http://google.com/', '2020-06-01 02:32:29'),
(2, 2, 'Test 2', '../../uploads/admin/category/1590952098969.jpeg', 'http://google.com/', '2020-06-01 02:32:31'),
(4, 3, 'Test 3', '../../uploads/admin/category/1590952098969.jpeg', 'http://google.com/', '2020-06-01 02:32:34'),
(5, 4, 'Test4', '../../uploads/admin/category/1590954258005.jpeg', 'http://google.com/', '2020-06-01 02:32:37'),
(6, 5, 'Test 5', '../../uploads/admin/category/1590952098969.jpeg', 'http://google.com/', '2020-06-01 02:32:40');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_german2_ci DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `video_path` varchar(255) DEFAULT NULL,
  `new_video_path` varchar(255) DEFAULT NULL,
  `video_status` varchar(255) NOT NULL DEFAULT '"disabled"',
  `password` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `video_upload_access` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `email`, `company_name`, `description`, `logo_path`, `video_path`, `new_video_path`, `video_status`, `password`, `user_role`, `status`, `video_upload_access`, `created_at`) VALUES
(4, 'Admin', NULL, 'adminbootcamp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'disabled', '05274d29ce51534bba19d936d0981e73', 'admin', 1, 0, '2020-05-30 16:35:57'),
(7, NULL, NULL, 'mariam@luckycarrotapp.com', NULL, NULL, NULL, NULL, NULL, 'disabled', '2b40d9765851e840f8b1b0474e5833cc', NULL, 1, 0, '2020-06-01 01:43:52'),
(8, 'gfxgfn', 'fcjy', 'velpida@rambler.ru', 'Smart electronics LLC', 'jgfxjyxcj', 'uploads/8/img/1590992398685.jpg', 'uploads/8/video/1/1590992472405.mp4', NULL, 'disabled', '2b40d9765851e840f8b1b0474e5833cc', NULL, 1, 0, '2020-06-01 01:43:52'),
(9, NULL, NULL, 'gevorg.parsyan.bm@gmail.com', 'RIOsys LLC', NULL, NULL, NULL, NULL, 'disabled', 'c3a68ccc2e1afcb2282339292102cb2b', NULL, 0, 0, '2020-06-01 01:54:17'),
(10, NULL, NULL, 'biobac@bk.ru', 'TakeAway.am', NULL, NULL, NULL, NULL, 'disabled', '7cf4cdc75ca9346cb996a85feb8d6c69', NULL, 0, 0, '2020-06-01 01:54:17'),
(11, NULL, NULL, 'lia.mkhitaryan@gmail.com', 'Arvest Quiz', NULL, NULL, NULL, NULL, 'disabled', '88bc310720a05e99d53476b12bddf012', NULL, 0, 0, '2020-06-01 01:54:17'),
(12, NULL, NULL, 'lusine@oores.app', 'Oores', NULL, NULL, NULL, NULL, 'disabled', 'f04980a2343eb764a46eb9dd15e0a679', NULL, 0, 0, '2020-06-01 01:54:17'),
(13, NULL, NULL, 'babayan.grigor@gmail.com', 'Nairi Stem', NULL, NULL, NULL, NULL, 'disabled', 'd98dd33d911a59b0307d7c161323450a', NULL, 0, 0, '2020-06-01 01:54:17'),
(14, NULL, NULL, 'haykm11@gmail.com', 'Easy Sales', NULL, NULL, NULL, NULL, 'disabled', '9fa9162aba5dc46a1b4f6b1a914d379d', NULL, 0, 0, '2020-06-01 01:54:17'),
(15, NULL, NULL, 'anna@volterman.com', 'ERA Technologies LLC', NULL, NULL, NULL, NULL, 'disabled', 'b41d0d7bf636126d83e0543488f014f4', NULL, 0, 0, '2020-06-01 01:54:17'),
(16, NULL, NULL, 'sahakyanmher@gmail.com', 'AVA', NULL, NULL, NULL, NULL, 'disabled', '6cb4051fc76b1555b2dfbee446ba3af2', NULL, 0, 0, '2020-06-01 01:54:17'),
(17, NULL, NULL, 'n.hovhannisyan@digitalpomegranate.com', 'Aion Clouds LLC', NULL, NULL, NULL, NULL, 'disabled', '26ad09166ae3d5f3a9e16ff0793d8d4d', NULL, 0, 0, '2020-06-01 01:54:17'),
(18, NULL, NULL, 'arttonoyan@gmail.com', 'Revalkon', NULL, NULL, NULL, NULL, 'disabled', '651d7539a0774dd6ba6c3ca95c728106', NULL, 0, 0, '2020-06-01 01:54:17'),
(19, NULL, NULL, 'rose.abrahamyan@gmail.com', 'Mimo LLC', NULL, NULL, NULL, NULL, 'disabled', '0c82f12422c7dd355f3f91e143f77ae6', NULL, 0, 0, '2020-06-01 01:54:42'),
(20, NULL, NULL, 'elinahovakimyan@gmail.com', 'Eventor', NULL, NULL, NULL, NULL, 'disabled', '2fc4f8d817afe44eb96055e92a329d1f', NULL, 0, 0, '2020-06-01 01:55:09'),
(21, NULL, NULL, 'hello@2do.am', 'Genevo Incorporated LLC', NULL, NULL, NULL, NULL, 'disabled', 'dca28e3c48630d5f40d6f574c9691ab5', NULL, 0, 0, '2020-06-01 01:55:09'),
(22, NULL, NULL, 'mikayel@wirestock.io', 'Wirestock LLC', NULL, NULL, NULL, NULL, 'disabled', '919bb1a1e50938a8efa5c7c9c400af15', NULL, 0, 0, '2020-06-01 01:55:30'),
(23, NULL, NULL, 'rsahakyan@yahoo.com', 'Kenguru', NULL, NULL, NULL, NULL, 'disabled', '63842439aebfcce6e072b81681c2fb94', NULL, 0, 0, '2020-06-01 01:55:30'),
(24, NULL, NULL, 'test@mail.ru', NULL, NULL, NULL, NULL, NULL, 'disabled', 'cb69cd596f305fa5f24a998a817a160a', NULL, 0, 0, '2020-06-01 01:56:48'),
(25, NULL, NULL, 'rendchainllc@gmail.com', 'Rendchain', NULL, NULL, NULL, NULL, 'disabled', '9541da184f498e543ed842a81fdeda6c', NULL, 0, 0, '2020-06-01 02:03:03'),
(26, NULL, NULL, 'nikoghosyankaren@gmail.com', 'gHost LLC', NULL, NULL, NULL, NULL, 'disabled', '4d8afffb1dd2c83f09eb023602fb1b15', NULL, 0, 0, '2020-06-01 02:03:50'),
(27, NULL, NULL, 'romeo.avagyan@gmail.com', 'ARD Music', NULL, NULL, NULL, NULL, 'disabled', '833998939bc66b741eba1cff9eae6a39', NULL, 0, 0, '2020-06-01 02:05:00'),
(28, NULL, NULL, 'zargaryandavid@gmail.com', ' STEM Didactics LLC', NULL, NULL, NULL, NULL, 'disabled', '519d125e1727a00e2dda6431ff7608a3', NULL, 0, 0, '2020-06-01 02:05:49');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `learning`
--
ALTER TABLE `learning`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `learning`
--
ALTER TABLE `learning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
