-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 04 Ara 2020, 00:33:40
-- Sunucu sürümü: 10.3.25-MariaDB
-- PHP Sürümü: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `portal`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birims`
--

CREATE TABLE `birims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `birimadi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `birims`
--

INSERT INTO `birims` (`id`, `birimadi`, `created_at`, `updated_at`) VALUES
(1, 'Adet', NULL, NULL),
(2, 'Kg', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmas`
--

CREATE TABLE `firmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firma_unvan` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `firma_adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `firma_telefon` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `firma_faks` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `firma_eposta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `grups`
--

CREATE TABLE `grups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupadi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `grups`
--

INSERT INTO `grups` (`id`, `grupadi`, `created_at`, `updated_at`) VALUES
(1, 'Meyve', NULL, NULL),
(2, 'Sebze', NULL, NULL),
(3, 'Yeşillik', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayits`
--

CREATE TABLE `kayits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urun_id` bigint(20) UNSIGNED NOT NULL,
  `birim_id` bigint(20) UNSIGNED NOT NULL,
  `birimfiyat` double(8,2) DEFAULT 0.00,
  `netagirlik` double(8,2) DEFAULT 0.00,
  `tutar` double(8,2) DEFAULT 0.00,
  `onayli` tinyint(1) DEFAULT 0,
  `created_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2020_05_08_224258_create__birim__table', 1),
(29, '2020_05_08_224317_create__grup__table', 1),
(30, '2020_05_08_224357_create__urun__table', 1),
(31, '2020_05_09_204857_create_kayit_table', 1),
(32, '2020_05_24_225043_add_table_userlogs', 1),
(33, '2020_05_25_130931_add_table_firma', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uruns`
--

CREATE TABLE `uruns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `urunadi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `grup_id` bigint(20) UNSIGNED NOT NULL,
  `birim_id` bigint(20) UNSIGNED NOT NULL,
  `birimfiyat` double(10,2) DEFAULT 0.00,
  `cinsi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `barkod` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `sinif` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `uruns`
--

INSERT INTO `uruns` (`id`, `urunadi`, `grup_id`, `birim_id`, `birimfiyat`, `cinsi`, `barkod`, `sinif`, `created_at`, `updated_at`) VALUES
(1, 'Elma', 1, 1, 0.00, 'Starking', '123456789', '1.Kalite', NULL, NULL),
(2, 'Apple', 1, 2, 5.00, 'Starking', '123456789', 'A', '2020-06-03 08:31:16', '2020-06-03 08:31:16');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `userlogs`
--

CREATE TABLE `userlogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kullanici` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `islem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `aciklama` text COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `userlogs`
--

INSERT INTO `userlogs` (`id`, `kullanici`, `islem`, `tarih`, `aciklama`, `created_at`, `updated_at`) VALUES
(1, 'Administrator (id:1)', 'Kayıt Ekle', '2020-06-13 01:17:32', '[urun_id:1 (Elma)][birim_id:1 (Adet)][birimfiyat:0.15][netagirlik:0.4][tutar:0.06][onayli:][created_user_id:1]', '2020-06-12 19:17:32', '2020-06-12 19:17:32'),
(2, 'Administrator (id:1)', 'Kayıt Silme', '2020-06-13 01:18:30', '[urun_id:1 (Elma)][birim_id:1 (Adet)][birimfiyat:0.15][netagirlik:0.40][tutar:0.06][onayli:][created_user_id:1]', '2020-06-12 19:18:30', '2020-06-12 19:18:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yetki` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kullanıcı',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `yetki`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@admin.com', NULL, '$2y$10$cwd15HRgON0ytqkkV5F9zupfUOkqaii7fpbB9Kjd9I7W46LRYY0Km', 'Yönetici', NULL, NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `birims`
--
ALTER TABLE `birims`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `firmas`
--
ALTER TABLE `firmas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `grups`
--
ALTER TABLE `grups`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kayits`
--
ALTER TABLE `kayits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kayits_urun_id_foreign` (`urun_id`),
  ADD KEY `kayits_birim_id_foreign` (`birim_id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uruns`
--
ALTER TABLE `uruns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uruns_grup_id_foreign` (`grup_id`),
  ADD KEY `uruns_birim_id_foreign` (`birim_id`);

--
-- Tablo için indeksler `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `birims`
--
ALTER TABLE `birims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `firmas`
--
ALTER TABLE `firmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `grups`
--
ALTER TABLE `grups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kayits`
--
ALTER TABLE `kayits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `uruns`
--
ALTER TABLE `uruns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kayits`
--
ALTER TABLE `kayits`
  ADD CONSTRAINT `kayits_birim_id_foreign` FOREIGN KEY (`birim_id`) REFERENCES `birims` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kayits_urun_id_foreign` FOREIGN KEY (`urun_id`) REFERENCES `uruns` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `uruns`
--
ALTER TABLE `uruns`
  ADD CONSTRAINT `uruns_birim_id_foreign` FOREIGN KEY (`birim_id`) REFERENCES `birims` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uruns_grup_id_foreign` FOREIGN KEY (`grup_id`) REFERENCES `grups` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
