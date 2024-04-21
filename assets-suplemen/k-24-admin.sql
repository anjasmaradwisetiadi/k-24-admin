-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 05:54 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k-24-admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_20_065743_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permisions` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permisions`, `created_at`, `updated_at`) VALUES
(1, 'administator', '[\"full view administator\", \"full view member\", \"crud member\"]', '2024-04-20 22:44:57', '2024-04-20 22:44:57'),
(2, 'member', '[\"separate view member\"]', '2024-04-20 22:44:57', '2024-04-20 22:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('administator','member') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `no_hp`, `date_birth`, `gender`, `no_ktp`, `photo`, `position`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('068f2f8a-95c7-4ed0-afab-8dbdbf5fece0', 1, 'Widya Maria Rahimah', 'yuniar.dinda@example.org', '$2y$10$dON/uzNKhqKAs8zklAv2rueoo3.S2dCd8p3dkmLrjZgQ.v3HyXgoy', '0640 5651 1400', '2082-02-24', 'male', '1402871411079895', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('0ab571c1-5160-4e61-98d8-84de679a4329', 1, 'Ihdi Ulfaq', 'ihdiulfaq@gmail.com', '$2y$10$l4ViAH4xRrPhVCfScQkepe6B6OCwBz4cTAYsUpGl5wRNC9/1zOU26', '081227182517', '1991-02-23', 'male', '0863175318363', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:44:58', '2024-04-20 22:44:58'),
('0f48db67-6b3d-4e7a-828c-5b16d172aaa7', 2, 'Novi Yuniar M.Farm', 'praba.yuniar@example.net', '$2y$10$GJJvSQhyKG5dXz2WyQ.uXuQBZb33XRL/IePDGngN6VmaQkKNrhxLa', '(+62) 228 6451 247', '2031-01-10', 'female', '8171891009975153', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('12b96aaa-58d9-472e-a92a-7f23160577f0', 2, 'Harimurti Hidayat', 'nabila06@example.com', '$2y$10$CTOhhY4u6/XzANc9mzqxhuJta9WRUCt4jqvggy3NrqzXbny1lelYq', '(+62) 523 0574 682', '2083-09-28', 'male', '7101974712135725', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('137c3a5c-1217-43b4-a7a7-fe7fee1dbc1f', 1, 'Adinata Pradana', 'arta.kurniawan@example.net', '$2y$10$t2bcVctFyUicgrRxx4y3JOGm3JA37gTXGR1Q4V5EPydzQYomKR0p6', '0907 7195 412', '2072-03-29', 'female', '7410851609077868', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('194c53ea-bd01-4933-b32b-ab9038b759ef', 2, 'Jefri Jabal Habibi', 'aryani.satya@example.org', '$2y$10$5H2rbP1n.agohAoh.Mhgwetx4THh1/HYrYhDoycmxX5d0kldn71JS', '(+62) 23 4157 758', '2017-08-12', 'female', '1215305005977430', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('1b79bb9c-bee4-4e3e-9eba-d646fe1e2a3b', 2, 'Cornelia Nasyidah', 'esusanti@example.org', '$2y$10$zi3INxKE0DjTkWV2w/7phuLzbHZkP4CYVqHkwMUw8SUvZazZUfg3.', '0690 9582 068', '2033-05-22', 'male', '3208934809051051', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('1bb9637f-e5e6-4348-8513-6e8a5cdc92d3', 1, 'Dadi Narpati S.Pt', 'uchita45@example.com', '$2y$10$azjT.M0/arSOUobQNV01We7c3KmaYdrcvnt6nkTsPiR0U9GhNP/RK', '(+62) 433 2061 0804', '2125-10-13', 'female', '3505243105191120', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('1ccb114c-c818-4332-bd63-babbff9b1662', 2, 'Talia Halimah M.Farm', 'nainggolan.karman@example.org', '$2y$10$ZkMcezj7kQd3Ckmu4ll86e0cVY97uPiiojmidkTp62T7WNlpJldnK', '(+62) 306 4731 1704', '2050-10-22', 'female', '3603682810122808', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('1e7567fb-aa04-4fd0-a127-a7eede53e859', 1, 'Jais Umay Zulkarnain', 'erahayu@example.net', '$2y$10$zqj4pNvjlztRfmIQAy5YIu/L3cOEhwldCpMcZveEhAAvrZm2TFCna', '(+62) 25 2858 1384', '2039-06-17', 'female', '6111101907949503', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('244115dc-4279-4500-9c5d-b21d839d2640', 1, 'Samiah Melinda Palastri', 'pratama.saiful@example.org', '$2y$10$ODONBjI771sy2jEf3tzFzeiGn.Md8Sg/JLrpLo/g9/4QmUh4OoBB6', '0835 1622 577', '2019-12-04', 'male', '1103765306963140', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('2684c826-0528-4c95-8cde-f258b489ff75', 1, 'Anggabaya Karta Manullang', 'cici.saefullah@example.org', '$2y$10$H/RPl6KtQCAITS/HO9R4hOVuL2HI.WOFJGr2PvQoUqYy15JTIMdg2', '0710 9832 596', '2055-09-18', 'male', '7171016402126121', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('2c011f5b-dac3-422b-afe8-7492e64d0146', 2, 'Icha Hesti Hartati S.IP', 'eman68@example.net', '$2y$10$qQ6f/lf9keJ/uZzxgcMTd.okS9g8pD4n8lc4mdaWnYyNsCsQlSJaq', '0836 5341 0923', '2141-03-09', 'female', '1807165811066794', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('2e740c3d-87fe-4cd0-879a-072c183f38a7', 2, 'Santiago Lozano', 'santiagolozano@gmail.com', '$2y$10$KylZjH05hBWZB0IRHJj0dOJ4n96lNloWkW0fEpK759ySq03wesIH6', '081224282582', '1991-04-12', 'female', '0863179618163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:44:58', '2024-04-20 22:44:58'),
('313a3925-9f0e-42bb-84f2-23de714557d7', 1, 'Kenari Satya Ardianto', 'qmaulana@example.net', '$2y$10$ROOls3ZvjNqmpOtwbd.Ap.olbHIoZ3BzpCcX2GZr7t3WHepo9NoMe', '0861 3334 403', '2056-01-29', 'female', '6471900308099505', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('3fa79bcf-91c9-4c09-ac0b-2cdde7d9362d', 1, 'Tantri Sabrina Hastuti', 'uyainah.mahdi@example.com', '$2y$10$fbMogU4WAO59vvB9j2hgNOrBGS0Bc0TzaznAPXM8NKB/idCbxeXdK', '0367 4271 3511', '2018-03-01', 'male', '6306302104067770', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('46171141-0c29-42dc-94f9-d3028557fc93', 1, 'Labuh Waskita', 'mirawan@example.net', '$2y$10$Tg8Lu9JL0P65yd9Xn4D6.uHAH19e39.G2HRQWF/BZnMyLDm4CGHma', '(+62) 800 3302 673', '2040-06-14', 'female', '1501814310133815', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('49de0ff9-c04b-4594-9661-4e9a1872beaf', 2, 'Digdaya Setiawan', 'vsamosir@example.org', '$2y$10$avAWa66QB.IgNcGSvV3i3Og/OfM0WmB1xyfHmPc6UkwL1PS9vMaRO', '(+62) 374 5958 337', '2010-11-20', 'female', '3202572304972451', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('4bb31fc6-a4e5-4afd-b8f3-05125fbb1556', 2, 'Ellis Aryani', 'muhammad.nurdiyanti@example.com', '$2y$10$c61QtuUBKBjFvb2n1bgD5uAD7/qJFFFUr/2vf6QS/k4gnbMK9iOxy', '(+62) 455 0717 2372', '2045-05-05', 'female', '7101705411115307', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('559e9740-d3c4-40e3-8d28-60bc33771602', 2, 'Galar Sinaga', 'qwulandari@example.net', '$2y$10$U3V.bX5RKZukDBaNELcsJO.iF5FB8ZlYOjgQCxrvp1wwOiQXnVUtC', '(+62) 702 3198 195', '2053-02-01', 'male', '1471071602221132', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('5cff2ff2-000a-487e-9e83-3b305db5bd35', 2, 'Kasiyah Fitriani Permata S.Pt', 'ajeng68@example.org', '$2y$10$BAN7GnYZsOAv./4h8v1RoefIBtA00Z0.EwRX59nqIUIynix4Gv2bO', '0523 7107 6670', '2103-02-24', 'female', '1613551001088950', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('6f8425f5-7491-432e-9d94-0c99d7eaab7c', 1, 'Zamira Puput Uyainah S.Ked', 'darsirah82@example.org', '$2y$10$ksr6g766uw3ahBoIWFylQuE4Wwx6I2ZBt9ZPQUMAsiKmcbrgpRmSm', '0518 8742 014', '2108-10-27', 'male', '7410322306153205', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('7761bca7-0def-4ffa-bbac-95cacb0c0a3b', 1, 'Malika Hastuti', 'mutia.sitompul@example.org', '$2y$10$NY7YnxfM/F1jAWSdm67uqe797JDFZLotMAhUiPXYoMcXZI.ClCPXe', '(+62) 975 2881 508', '2113-12-31', 'male', '3205205401240560', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('8256c35f-868a-4549-a4c4-2c62c9630e16', 1, 'Hilda Maryati', 'kagustina@example.com', '$2y$10$ldqDVzBuIweZSr5xpW1lUem3NoSwfYIBmWoYh0rsgpN5TLnsNHqXW', '0733 0989 4761', '2088-03-21', 'female', '1107865405134611', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('840f7b42-0d7e-4824-b650-855015569901', 2, 'Mylalovic Frederich', 'mylalovic@gmail.com', '$2y$10$7VFBsS1Z3VTMExYeUVMEvudYfMmvU/mq6Ark.OxZ0XYOZiNnmZbVK', '081227182582', '1997-04-12', 'female', '0863175318163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:44:58', '2024-04-20 22:44:58'),
('8859addf-b1a3-4b9b-8fde-47e46344fbc2', 2, 'Kasim Maryadi', 'rprasasta@example.org', '$2y$10$DBY53SSJsGHvvNMQs4y53.Ec5qv/VK8CJdHozjBZYv11A9sZOABaS', '(+62) 399 0361 7988', '2101-06-28', 'male', '1812064102054304', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('9c2b5338-631e-4cfb-9745-04f030dffdc2', 1, 'Bakianto Prasetya', 'aryani.danu@example.com', '$2y$10$MhEG76V41s1SqJ2RFoh4HO5yvC7n139VmiAXqXcdUY76anxODjK.2', '(+62) 376 3549 697', '2144-04-06', 'male', '5303587011024090', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('9cd2a5b5-6954-4d6b-a6e5-cde16ba65e83', 1, 'Danang Taufik Kurniawan', 'napitupulu.darmana@example.org', '$2y$10$JGwJGEPtnIsdptrQVMoxhusgEHyQkSs8SWdwlt4RH.CVbNdc97xDO', '(+62) 287 1793 817', '2131-12-14', 'male', '1802041312084927', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('9e82bdc3-7b66-4a9e-ab86-7f636e485c18', 1, 'Garda Nashiruddin S.E.', 'putami@example.org', '$2y$10$Pc6uunhGVbKmWOKpPBqt3uiQ8IvLb.ZiMvDGtqpfRy8iRaYQNLoUy', '0305 7617 2721', '2053-09-13', 'female', '1371006204041811', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('a0c15d95-d2d1-476e-b349-f55d3fd844f1', 2, 'Upik Simon Mandala', 'jailani.cahya@example.com', '$2y$10$JIAVrknzNgSt//kzGYuDvu9Zrm8CB3QQ0eC.GZtSYmijJYkBDw.4K', '0787 0719 5573', '2117-12-03', 'male', '7605610103235645', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('a5403b7d-29b5-4010-a5dc-0ae3d39eedcb', 1, 'Naradi Cahyanto Nashiruddin', 'ika.hasanah@example.net', '$2y$10$jroSKvbzEGvOQ3Jrxk6uB.RsESnl.mUIQ7zjs0Tb1vHH.bB3fEsI.', '0336 1246 275', '2121-08-17', 'female', '1271045610141889', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('a565a4af-1588-4f46-ad3f-e0eafeeed7ac', 1, 'Siti Permata', 'unggul.widodo@example.net', '$2y$10$XdtuFQ6Rjx09W.bmoBdtrOBOB58usHXb9/cAoZ9w4brjm1eJCPjD6', '(+62) 242 4555 3584', '2088-04-29', 'female', '1308226007993343', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('a85a2e37-6904-49e6-8aae-69c552ca88e5', 2, 'Soleh Saragih', 'lidya91@example.org', '$2y$10$JMXtcb21KbCoszCxIjX81uXN67Cp6GqOss8mlBMwjFMS.StnIOhfu', '(+62) 483 2266 598', '2080-12-29', 'male', '3310507108001948', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('ab08bf25-48db-4546-b3f8-9ab2db7e1815', 1, 'Hasan Mitra Hutagalung S.Pd', 'galuh.uwais@example.com', '$2y$10$6LpHopsryTYKlKp37rgMf.bf4/VC.OZOHBPVL9ikJ7svkb9zKzjaC', '0213 7034 771', '2126-03-14', 'male', '3175804612025053', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('ab53dacd-0ede-453d-be9f-07e9576f8a1e', 2, 'Tasdik Martani Wibisono', 'hlatupono@example.net', '$2y$10$xIH3/1Bx8pXRdbZ7aLXk.eeIU0WLcPifSgjvnodAHjukHde.ucRq6', '(+62) 390 4330 876', '2098-01-24', 'male', '1278612910183953', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('ad4a0c8a-4ad2-4207-9ce4-be233c2c185e', 1, 'Yoga Mustofa', 'pradipta.rafi@example.net', '$2y$10$zjBqG9ku5LdTs31whz1gK.GaI4I1L7Jh3wTvIpKKqERgfz6QZvwUu', '(+62) 274 1760 6181', '2036-07-05', 'male', '5105105207005258', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('b21af3b5-8a63-446a-a64b-fd93ac5cb552', 1, 'Hani Aurora Suryatmi', 'nmardhiyah@example.com', '$2y$10$7BGD5WtkeQR8AYf9HLXD8O.FbLtbeEgBjZCfk6ghqH1zC4RLjauo2', '(+62) 465 6700 0095', '2072-12-23', 'female', '5207270110158890', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('b3a9e9ca-e70f-4e4c-9542-dc0a06c89e1f', 1, 'Anjasmara Dwi Setiadi', 'anjasmara@gmail.com', '$2y$10$F7TGYzp/T/crN9wTJQTgmuBd484yCmksGTl6P4KetiV7tbMSe66aO', '081227182587', '1998-01-23', 'male', '0863175418163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:44:57', '2024-04-20 22:44:57'),
('b86c719b-a2cd-4633-9e34-ec3e5c095d98', 1, 'Anastasia Cindy Agustina M.Pd', 'bella90@example.net', '$2y$10$UvW9HcfnrhsJLYMJIpuaZezQDezpqV4dBdjhl71rHi3QifzJd7GES', '(+62) 591 1513 9354', '2066-05-26', 'male', '3576937112157574', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('bc26fb38-4f21-45c5-b4f8-b5e726f9808b', 2, 'Cakrajiya Balamantri Latupono', 'oktaviani.bakiman@example.com', '$2y$10$uDOHHNzSYP4osBOPAcela.aWxUQTRMMZf/LEtWWntdYg6P3f/V0t2', '0230 6220 469', '2125-07-24', 'female', '9114542905169816', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('c3feef05-61d4-4bf4-91aa-3deb07860bdf', 2, 'Kani Palastri', 'yuni.prasetya@example.com', '$2y$10$SzK0mCwP1BkYyBgcyNgV1.G1XLVF2wMsWL0UjVIhdZO771P5chLJy', '0327 0970 2875', '2054-03-25', 'female', '3603952704229782', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('c6aacfc5-abe0-4319-95e5-2a5ba1000fa5', 2, 'Rahmi Aryani S.IP', 'napitupulu.raden@example.net', '$2y$10$MIWBJYHNNS38saz8rcCbmeDDVaH7.swRQE2lDzakXQq0LdjuCIRNO', '0955 3571 5690', '2022-04-01', 'female', '3327012510160131', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('c794d2f9-df04-4d00-b0a9-5c8dea3af04d', 2, 'Vanya Tania Uyainah', 'yprakasa@example.com', '$2y$10$byD1WNJd9VbPPZUtVib1m.sHqIXWNOsJLLJ2y7ypYHBhNUmJIzwlC', '0256 4870 6145', '2072-03-10', 'female', '3279412512238344', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('cddd49f7-26ef-4849-b1c9-afc7fced327c', 1, 'Vera Rahimah M.M.', 'riyanti.widya@example.org', '$2y$10$NOumel.PtlKrK/8CA6zoqev9mbfYKr8Lp5I6EwsVyaiPcwWfrG0CS', '0634 6939 4320', '2044-01-27', 'female', '8208594105206488', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('d487060a-4099-42a2-a716-42c3aed4fe26', 1, 'Uchita Hesti Mandasari S.Pt', 'ega92@example.com', '$2y$10$sW4oSrHt/gNpBccwPZGj4O/.PyLmEij6oUtFjlmsvexCRx6p.PUJ.', '(+62) 360 0023 5762', '2068-07-23', 'male', '3324206005003720', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('dd9be784-c1a6-4522-a94f-d4cd568834c6', 2, 'Caraka Maman Maulana S.IP', 'wisnu.nababan@example.org', '$2y$10$zveRkk2wV7zJ59IfJ9LYt.hMv1uZ2KFX2J.JLhDLHs7g7pcxVzq8S', '(+62) 242 7938 346', '2017-06-09', 'female', '1105830904149585', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('e6b2c377-cedf-4ac1-afdb-d0cfc9fea158', 2, 'Jane Rahimah', 'dina.prayoga@example.net', '$2y$10$OQIiKkkvQ3GPQmli9bARye2O7e.IeUZiYRafeYst118QhXlvExdu2', '(+62) 844 651 533', '2060-08-29', 'female', '9202533003970287', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('eaac80b2-8752-46c5-91aa-ae6fa3f5ab72', 1, 'Mahfud Sitompul', 'nabila89@example.net', '$2y$10$66rCrviE94ZCWzbfuwtvkuUS.kQDhJThtL8WtPJjcoQzYzupEdRj.', '(+62) 970 8247 539', '2140-06-18', 'female', '1275165405055534', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('ed2b6437-73c4-4436-b999-f18c5636ca2f', 2, 'Zalindra Nuraini S.Sos', 'rika25@example.com', '$2y$10$M35S4bxVb0CMF.nvZuJ5YeVZHSTRXKe864j0rLdvlwcMldxoRznEK', '0669 0594 4857', '2106-11-01', 'male', '5271575311046213', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('f08e0ba9-7fe1-43ad-934e-c91d33367545', 2, 'Jayeng Wibowo', 'bella.lestari@example.net', '$2y$10$xwC07gcJR/cTEGeTLLKr8eaEHOCzxvDylMGCEbVqDTl3I27pgpfiq', '0808 475 641', '2018-06-07', 'female', '5207634906210665', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('f199b9f5-19c0-4bf5-beb9-adf105e9679d', 1, 'Ami Tania Yolanda', 'ade.suwarno@example.org', '$2y$10$FbsxRnAgvy4Pi9UxmEqzI.4tCGzuyDssLDGiWNoJP31dA35.tXoD.', '0927 8695 5277', '2079-11-08', 'male', '5318332008041177', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('f780d823-0fd9-4d05-84d4-d2313cfe98ac', 2, 'Aswani Hidayat M.TI.', 'ira50@example.org', '$2y$10$ycuXVxPSjXP4ZPuOocMNnOjMtxw5PiTDyTo7Q7HkYvPca/UTC.fBS', '(+62) 309 6284 0991', '2010-06-14', 'male', '3326120506236359', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('f7b15cc1-d579-4387-a03b-a67cbb7f7306', 2, 'Ani Vanesa Hastuti S.I.Kom', 'halimah.fathonah@example.net', '$2y$10$UYGahptnz/BceJYjIE8CJ.ah.FID7RR3A0N3dPcdthPyHAhbKojiS', '0720 0525 876', '2125-10-10', 'female', '3313280409974173', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02'),
('fbc234bf-9dc1-46de-a870-3df3447683f2', 1, 'Dalimin Jati Ardianto S.Kom', 'kurniawan.emil@example.net', '$2y$10$Ee4CtcxntIPAqRlQL4arnuqJdGYPsLs2WED4qsVkedPrrcrFJtHZm', '0300 6036 786', '2042-02-13', 'female', '1509876407141997', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-20 22:45:02', '2024-04-20 22:45:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
