-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 31 Eki 2022, 11:53:32
-- Sunucu sürümü: 10.6.9-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `metatige_queen`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `tckn` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `accounts`
--

INSERT INTO `accounts` (`id`, `type`, `username`, `password`, `fname`, `lname`, `email`, `phone`, `birthdate`, `tckn`, `adress`, `status`, `updated_at`, `created_at`) VALUES
(1, 'ADMIN', 'admin', '700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'Alihan', 'OZTURK', 'admin@mail.com', '05464971229', NULL, NULL, '', 1, '2022-10-09 11:02:46', '2022-10-09 11:02:46'),
(16, 'CUSTOMER', NULL, NULL, ' test', ' mÃ¼ÅŸteri', ' customer@mail.com', '05464971229', '2022-10-09', ' 22111309032', ' Ä°zmir-1 Cad. 33/20 ', 1, '2022-10-09 16:33:25', '2022-10-09 16:33:25'),
(17, 'CUSTOMER', NULL, NULL, ' test2', ' mÃ¼ÅŸteri', ' customer@mail.com', ' 05464971229', '2022-10-05', ' 22111309032', 'Hamidabat Mah. 232 Sk. No: 17/A', 1, '2022-10-24 05:12:14', '2022-10-09 16:33:55'),
(18, 'STAFF', 'staff', ' 700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', ' test', ' personel', ' customer@mail.com', '05464971229', NULL, NULL, '', 1, '2022-10-09 16:35:14', '2022-10-09 16:35:14'),
(19, 'ADMIN', 'gamze', '700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', ' Gazme', ' HarmanbaÅŸÄ±', ' gamze@metatige.com', ' 05464971220', NULL, NULL, '', 1, '2022-10-18 11:43:05', '2022-10-18 11:43:05'),
(20, 'CUSTOMER', NULL, NULL, 'Ecem', 'UstaoÄŸlu', 'ecem@mail.com', '123', '2022-10-27', ' 222222222', 'Hamidabat Mah. 232 Sk. No: 17/A', 1, '2022-10-24 05:12:01', '2022-10-23 10:02:35'),
(21, 'CUSTOMER', NULL, NULL, ' 1234', ' 123', ' customer@mail.com', ' 05464971230', '2022-10-20', ' 22111309032', ' Ä°zmir-1 Cad. 33/20 ', 1, '2022-10-23 10:04:03', '2022-10-23 10:04:03'),
(22, 'CUSTOMER', NULL, NULL, ' test', ' mÃ¼ÅŸteri', ' alihan.freelance@hotmail.com', ' 05550903161', '2022-10-21', ' 22111309032', ' Hamidabat Mah. 232 Sk. No: 17/A', 1, '2022-10-24 05:17:34', '2022-10-24 05:17:34'),
(23, 'ADMIN', ' alihan', ' 700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', ' alhian', ' Ã¶ztÃ¼rk', ' alihanozturk364@gmail.com', ' 05550903161', NULL, NULL, NULL, 1, '2022-10-24 05:33:40', '2022-10-24 05:33:40'),
(24, 'ADMIN', ' alihan', ' d93a5def7511da3d0f2d171d9c344e9110470c3b4b1fed12c3baac014be15fac67c6e815', ' alhian', ' asd', ' facebook@metatige.com', ' 05324041138', NULL, NULL, NULL, 1, '2022-10-24 05:34:42', '2022-10-24 05:34:42'),
(25, 'ADMIN', ' alihan@metatige.com', ' 700c8b805a3e2a265b01c77614cd8b2163982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', ' asd', ' 123', ' alihanozturk364@gmail.com', ' 05550903161', NULL, NULL, NULL, 1, '2022-10-24 05:35:00', '2022-10-24 05:35:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `session_time` time NOT NULL,
  `reminding_tomorrow` int(11) NOT NULL DEFAULT 0,
  `reminding_today` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `appointments`
--

INSERT INTO `appointments` (`id`, `customer`, `package`, `session`, `session_date`, `session_time`, `reminding_tomorrow`, `reminding_today`, `status`) VALUES
(53, 16, 1, 1, '2022-10-22', '10:00:00', 1, 0, 2),
(54, 16, 1, 2, '2022-10-21', '11:00:00', 1, 1, 0),
(55, 16, 2, 1, '2022-10-21', '09:00:00', 0, 0, 1),
(56, 16, 2, 2, '2022-11-05', '09:00:00', 0, 0, 1),
(57, 16, 2, 3, '2022-10-21', '12:00:00', 0, 0, 1),
(58, 16, 2, 4, '2022-10-21', '13:00:00', 0, 0, 1),
(59, 16, 2, 5, '2022-10-21', '13:00:00', 0, 0, 1),
(60, 16, 2, 6, '2022-10-21', '08:00:00', 0, 0, 1),
(61, 16, 2, 7, '2022-10-21', '10:00:00', 0, 0, 1),
(62, 16, 2, 8, '2022-10-21', '09:00:00', 0, 0, 1),
(63, 16, 2, 9, '2022-10-21', '17:00:00', 0, 0, 1),
(64, 16, 2, 10, '2022-10-21', '17:00:00', 0, 0, 1),
(65, 16, 2, 11, '2022-10-21', '17:00:00', 0, 0, 1),
(66, 16, 2, 12, '2022-10-21', '17:00:00', 0, 0, 1),
(67, 16, 2, 13, '2022-10-21', '17:00:00', 0, 0, 1),
(68, 16, 2, 14, '2022-10-21', '17:00:00', 0, 0, 1),
(69, 16, 2, 15, '2022-10-21', '17:00:00', 0, 0, 1),
(70, 16, 2, 16, '2022-10-21', '17:00:00', 0, 0, 1),
(71, 16, 2, 17, '2022-10-21', '17:00:00', 0, 0, 1),
(72, 16, 2, 18, '2022-10-21', '14:00:00', 0, 0, 1),
(73, 16, 2, 19, '2022-10-21', '15:00:00', 0, 0, 1),
(74, 16, 2, 20, '2022-10-21', '15:00:00', 0, 0, 1),
(75, 16, 2, 21, '2022-10-21', '15:00:00', 0, 0, 1),
(76, 16, 2, 22, '2022-10-21', '15:00:00', 0, 0, 1),
(77, 16, 2, 23, '2022-10-21', '15:00:00', 0, 0, 1),
(78, 16, 2, 24, '2022-10-21', '15:00:00', 0, 0, 1),
(79, 16, 2, 25, '2022-10-21', '15:00:00', 0, 0, 1),
(80, 16, 2, 26, '2022-10-21', '15:00:00', 0, 0, 1),
(81, 16, 2, 27, '2022-10-21', '15:00:00', 0, 0, 1),
(82, 16, 2, 28, '2022-10-21', '15:00:00', 0, 0, 1),
(83, 16, 2, 29, '2022-10-21', '15:00:00', 0, 0, 1),
(84, 16, 2, 30, '2022-10-21', '15:00:00', 0, 0, 1),
(85, 16, 2, 31, '2022-10-21', '15:00:00', 0, 0, 1),
(86, 16, 2, 32, '2022-10-21', '15:00:00', 0, 0, 1),
(87, 16, 2, 33, '2022-10-21', '15:00:00', 0, 0, 1),
(88, 16, 2, 34, '2022-10-21', '15:00:00', 0, 0, 1),
(89, 16, 2, 35, '2022-10-21', '15:00:00', 0, 0, 1),
(90, 16, 2, 36, '2022-10-21', '18:00:00', 0, 0, 0),
(91, 16, 2, 37, '2022-10-21', '19:00:00', 0, 0, 2),
(92, 16, 2, 38, '2022-10-21', '20:00:00', 0, 0, 1),
(93, 16, 2, 39, '2022-10-21', '21:00:00', 0, 0, 1),
(94, 16, 2, 40, '2022-10-21', '21:00:00', 0, 0, 1),
(95, 16, 2, 41, '2022-10-21', '21:00:00', 0, 0, 1),
(96, 16, 2, 42, '2022-10-21', '21:00:00', 0, 0, 1),
(97, 16, 2, 43, '2022-10-21', '21:00:00', 0, 0, 1),
(98, 16, 2, 44, '2022-10-21', '21:00:00', 0, 0, 1),
(99, 16, 2, 45, '2022-10-21', '21:00:00', 0, 0, 1),
(100, 16, 2, 46, '2022-10-24', '13:00:00', 0, 1, 1),
(101, 16, 2, 47, '2022-10-24', '13:00:00', 0, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customer_notes`
--

CREATE TABLE `customer_notes` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `customer_notes`
--

INSERT INTO `customer_notes` (`id`, `customer`, `user`, `note`, `created_at`, `status`) VALUES
(1, 17, 1, ' test not', '2022-10-18 07:08:39', 1),
(2, 17, 1, ' test not 2', '2022-10-18 07:08:57', 1),
(3, 17, 16, ' test not 3', '2022-10-18 07:09:05', 1),
(4, 14, 1, ' test not 3', '2022-10-18 07:09:05', 1),
(5, 16, 1, ' test not\n', '2022-10-23 09:29:05', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `files`
--

INSERT INTO `files` (`id`, `customer`, `type`, `file`, `created_at`, `status`) VALUES
(1, 16, 2, '1666532845.png', '2022-10-18 10:29:08', 2),
(2, 16, 1, '1666532845.png', '2022-10-23 09:47:26', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `amount` decimal(6,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `payments`
--

INSERT INTO `payments` (`id`, `type`, `customer`, `amount`, `created_at`, `status`) VALUES
(1, 3, 17, '200.00', '2022-10-18 10:43:13', 2),
(2, 2, 17, '200.00', '2022-10-18 10:43:13', 1),
(3, 2, 16, '200.00', '2022-10-23 08:28:25', 2),
(4, 1, 16, '150.00', '2022-10-23 08:32:19', 2),
(5, 1, 16, '200.00', '2022-10-23 08:34:35', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `package` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`id`, `customer`, `package`, `price`, `created_at`, `status`) VALUES
(1, 16, 2, '300.00', '2022-10-21 07:46:09', 1),
(3, 16, 1, '300.00', '2022-10-21 07:46:09', 1),
(4, 16, 1, '3500.00', '2022-10-23 09:17:15', 1),
(5, 16, 24, '200.00', '2022-10-23 09:22:50', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `service_name`, `status`) VALUES
(2, 'Lazer Epilasyon', 1),
(3, 'G5 Masaj', 1),
(4, 'Kalıcı Makyaj', 1),
(5, 'sdfsdf', 1),
(6, 'sdfsdf', 1),
(7, 'Protez TÄ±rnak', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service_areas`
--

CREATE TABLE `service_areas` (
  `id` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `service_areas`
--

INSERT INTO `service_areas` (`id`, `service`, `area`, `status`) VALUES
(1, 2, 'Yüz', 1),
(2, 2, ' Kol', 1),
(3, 2, ' Kol altÄ±', 1),
(4, 2, ' Genital', 1),
(5, 2, ' sÄ±rt', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `service_packages`
--

CREATE TABLE `service_packages` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `service` int(11) NOT NULL,
  `areas` varchar(255) NOT NULL,
  `session` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `service_packages`
--

INSERT INTO `service_packages` (`id`, `package_name`, `service`, `areas`, `session`, `price`, `status`) VALUES
(1, 'KadÄ±n 4 BÃ¶lge 10 Seans', 2, ' [\"1\",\"2\",\"3\",\"4\"]', 2, '3500.00', 1),
(2, 'KadÄ±n 4 BÃ¶lge Bitirme', 2, ' [\"1\",\"2\",\"3\",\"4\"]', 50, '6500.00', 1),
(24, 'genital + bacak', 2, ' [\"2\",\"3\",\"4\"]', 2, '200.00', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `session_notes`
--

CREATE TABLE `session_notes` (
  `id` int(11) NOT NULL,
  `appointment` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `session_notes`
--

INSERT INTO `session_notes` (`id`, `appointment`, `user`, `note`, `created_at`, `status`) VALUES
(1, 15, 1, ' test not', '2022-10-18 07:08:39', 1),
(2, 15, 1, ' test not 2', '2022-10-18 07:08:57', 1),
(3, 15, 16, ' test not 3', '2022-10-18 07:09:05', 1),
(4, 14, 1, ' test not 3', '2022-10-18 07:09:05', 1),
(5, 15, 1, ' kontrol seansÄ± olcak', '2022-10-18 11:38:48', 1),
(6, 18, 1, ' test', '2022-10-18 11:42:06', 1),
(7, 15, 1, ' tetsts\n', '2022-10-18 12:02:44', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_key` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `sms_balance` int(11) NOT NULL,
  `system_package` int(11) NOT NULL,
  `admin_limit` int(11) NOT NULL,
  `customer_limit` int(11) NOT NULL,
  `system_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_key`, `site_url`, `sms_balance`, `system_package`, `admin_limit`, `customer_limit`, `system_status`, `created_at`) VALUES
(1, '202210002', 'https://queen.metatige.com', 92, 1, 5, 500, 1, '2022-10-24 05:22:37');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customer_notes`
--
ALTER TABLE `customer_notes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `service_areas`
--
ALTER TABLE `service_areas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `service_packages`
--
ALTER TABLE `service_packages`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `session_notes`
--
ALTER TABLE `session_notes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Tablo için AUTO_INCREMENT değeri `customer_notes`
--
ALTER TABLE `customer_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `service_areas`
--
ALTER TABLE `service_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `service_packages`
--
ALTER TABLE `service_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `session_notes`
--
ALTER TABLE `session_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
