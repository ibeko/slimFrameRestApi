-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Ağu 2020, 23:52:14
-- Sunucu sürümü: 10.3.22-MariaDB-1ubuntu1
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `course_coupons`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `couponCode` varchar(20) COLLATE utf8_turkish_ci DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`id`, `title`, `couponCode`, `price`) VALUES
(1, 'Vue.js Eğitimi', 'VUEJSAD', 25.00),
(3, 'Nuxt.js Eğitimi', 'NUXT4VUE', 25.00),
(4, 'Codeigniter ile CMS Eğitimi', 'VSCMSDISCOUNT', 50.00),
(5, 'MySQL Eğitimi', 'SQLDISCOUNT', 20.00),
(7, 'MySQL Eğitimi', 'SQLDISCOUNT', 20.00),
(8, 'RODE Kursu', 'RODENT', 123.00),
(9, 'Vue Native ile Mobil Programlama', 'VUENATIVE', 25.00),
(12, 'GO Programlama Dili', 'GOGOGO', 50.00),
(14, 'Vuetify Eğitimi', 'VUETIFY', 25.00),
(15, 'Vuetify Eğitimi2', 'VUETIFY2', 22.00),
(16, 'Bekir Eğitim', 'BEKIR2020', 12.00);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
