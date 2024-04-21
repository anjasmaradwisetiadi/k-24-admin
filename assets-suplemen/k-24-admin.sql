-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 08:48 AM
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
(1, 'administator', '[\"full view administator\", \"full view member\", \"crud member\"]', '2024-04-21 01:48:39', '2024-04-21 01:48:39'),
(2, 'member', '[\"separate view member\"]', '2024-04-21 01:48:39', '2024-04-21 01:48:39');

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
('0d12894e-8b81-4546-aed2-401dadf309b6', 2, 'Jelita Patricia Novitasari', 'luluh.agustina@example.org', '$2y$10$jHMS3zXiNQeVaOHNZt8iw.vddXjAXOlAGQK0MRxErtH5kvqpVrQpy', '(+62) 716 3333 021', '2124-06-07', 'male', '1706821111097711', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('14da35c9-600b-47b0-b4ae-b7a6b5c91b32', 2, 'Bakidin Sitompul M.Kom.', 'eka86@example.org', '$2y$10$9Z23QvgqTzQRKldTWLld3OkXL64zlK6TEmef34zpx/9pd4pCM.85i', '0864 4046 5127', '2008-07-20', 'female', '6411740502247371', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('16e29729-df45-4350-9b6d-cd5dd94c07d9', 2, 'Eka Wasis Winarno S.Pt', 'hartati.amalia@example.org', '$2y$10$dT2kOSUsvbAckFU0tH5qaeVx83VEEBtNqyZICOqCOLmoUK9gciwUC', '(+62) 413 0694 7490', '2119-09-04', 'male', '3319994709138399', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('1ec604ec-d6f7-44ac-a2ed-50f69ddd6407', 2, 'Kasim Makara Wahyudin', 'jane56@example.com', '$2y$10$rT0B.TLaVUW3bomTg.zKTOjjM/TYFRJ/AR/fI6kyk9bUr8oTzGrba', '0471 7446 051', '2100-09-06', 'female', '2171660507214574', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('1f425342-8598-48a1-8ee2-7ba1a48d3d4c', 1, 'Karen Agustina', 'mardhiyah.rusman@example.com', '$2y$10$/Dcxrvn7Hb4YXbAaro2/8u6iHUoCwCMKYOw3p.fvQkoU.F0ioghwG', '(+62) 426 3502 703', '2032-06-17', 'male', '6112756806139441', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('219d4cc7-65e2-4086-a032-ad919745c8cc', 1, 'Baktiono Emin Hidayanto M.M.', 'caket.dabukke@example.net', '$2y$10$84rk0Cgp9ZdvivY/.m.CDuvkT6FSMzo8Gb45nQM.P4qC4e/aGiMCa', '(+62) 29 1235 0417', '2014-06-14', 'female', '9126221209209841', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('24287806-b04a-4ca9-a633-9abc6b1f747e', 2, 'Daru Martani Nugroho', 'kurnia.gunarto@example.org', '$2y$10$URNqBACopJyYKyTztt46puwACdtV5Ww8UaOzdC3yb6DVtssjavISy', '(+62) 938 7482 790', '2098-10-16', 'male', '3201136306228440', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('2dc5a218-f950-4a20-bc95-3776ecc39c4d', 2, 'Ajimat Vinsen Winarno', 'msimanjuntak@example.net', '$2y$10$9WGVIlc427vNaEIGGtH5DuZE1iUMJrSJWvNvtvUFV9A5WYK8/plTC', '(+62) 715 7544 6310', '2019-10-22', 'female', '2105215807066405', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('3288c040-5074-44f0-8dac-e42f6adfb061', 2, 'Mitra Hendri Wibowo S.H.', 'jpermadi@example.net', '$2y$10$6KXdEk0Aj/BsYgVRgTNeQOHTHfQBFYdLtA5le.Tb9O.XSvtmgFWSS', '(+62) 605 9766 467', '2114-12-26', 'male', '5371045805177868', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('35e32ffa-2c06-47b7-b448-ec823d886b4d', 1, 'Kasiyah Hasanah', 'inashiruddin@example.com', '$2y$10$ySBykpfS1R9JDYlgu/o.6Ovju66sbqpW/DRYxhrNRDaC84cRq724a', '0473 4360 8368', '2123-09-18', 'male', '8205686212225634', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('37949950-50bd-4f53-8709-7460f1c863dc', 2, 'Icha Novitasari', 'ifa48@example.org', '$2y$10$9aeRjTta0i79GmGqHV9ieOsyqfzbNACJVI2ZO3M6LLfIR5e8tTU5K', '(+62) 612 0533 492', '2034-08-07', 'male', '9209254601219788', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('37cb1249-6aa5-47d6-9f04-1421054e9418', 1, 'Sakura Lailasari', 'sarah72@example.com', '$2y$10$OrmE15ncf4MYdtAfROWRve9zb00waud0PSp9QfuYSCWIReLU2qlE2', '027 8980 566', '2083-12-01', 'male', '1301275205996234', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('39e12692-7787-40e4-8e8d-463c82909933', 2, 'Sakura Titi Laksita', 'anapitupulu@example.org', '$2y$10$K69tVC0aZOiSfF.0knW5euHYRiBIkpOV9Nm8yHE/ETMNNDt8hSV9a', '0798 5642 228', '2034-12-31', 'male', '3517514409974857', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('3db5eb3b-cf36-44a8-b999-37c620f4d04e', 1, 'Nalar Parman Sitompul', 'lsaptono@example.net', '$2y$10$xB.lcB36ppR3DxAtz7FA5.J6M8yC9kqDeiZFqj2J6.BRLFkvBy6G.', '0843 1336 169', '2051-02-04', 'male', '6408194406165977', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('400ade05-ce50-4da9-b8c0-40a42fc78197', 2, 'Purwa Galang Prabowo S.Pd', 'kusuma.laksita@example.net', '$2y$10$dbBRyFNQvaZOK5FQsFEpSeu4xuWUzr0VCyNpaBwgjT4RJBNSmloyW', '(+62) 732 3507 7736', '2045-04-14', 'female', '3301792705078924', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('43b30452-5c63-401b-880a-c04fd087d672', 1, 'Vanesa Pertiwi', 'hnamaga@example.com', '$2y$10$2E.QnmxxM8xskFQPTR3En.wyinYfVTGy4oWZFNBdAVIR5t/H0yd.u', '027 2944 6116', '2117-12-18', 'female', '3404930306034505', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('45153f69-2e3b-4db4-bbe6-838eff2880f4', 1, 'Maman Gunawan', 'hpurwanti@example.org', '$2y$10$5DWAf4kNPAxsExW87Q6XxegcTENB3HxTsl0gU2M3uWFKgllYSoITG', '(+62) 955 9295 6789', '2112-09-17', 'male', '3511840512021490', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('4dd87dd2-a871-47ec-bb38-69f33af9de77', 1, 'Kacung Budiyanto S.Gz', 'hartati.dadi@example.com', '$2y$10$fUGRkkWP0SgBUfSuYGu1.uhfvUfw4KIwajEK87tsbByfXBQMh4Qre', '0362 7163 2361', '2108-04-16', 'male', '7109975909106021', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('4de286fe-96f5-473a-80e9-4e80ea82d3e8', 1, 'Ellis Permata S.Pt', 'intan59@example.net', '$2y$10$NOaFxjOOXM4XcKdMH8xRI.p.XUNZxwCPcyI6KPNsbcAS.VsUTLC4a', '024 7820 213', '2098-08-12', 'male', '3672661008052358', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('5e40b4b8-effc-4add-bbf4-d0a5b7f66763', 2, 'Kania Purwanti', 'wahyuni.hamzah@example.net', '$2y$10$wldwm6D7rQUx285X/W5gQ.YDWWQygmFa.zqdzG7Nh8WsNw0QGlQpW', '0211 1720 903', '2071-03-31', 'female', '6201135710021594', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('6422febc-12b6-4b5a-82bc-0a84555393db', 1, 'Faizah Andriani', 'novi.purwanti@example.com', '$2y$10$IPJwMi/BkQsPsReCRWJw7uo4y0H87XrxfGuuxBo52LqXuL3cwRgBu', '(+62) 578 8854 773', '2113-11-29', 'female', '1507562312216540', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('66e9881e-26e6-467b-ad8d-f67f45c8c18a', 1, 'Nugraha Bagya Gunawan M.Pd', 'wsiregar@example.com', '$2y$10$2NaqP2ztkEUxjmN1VabwVu0KtPFF7GMfo2iLAJJwhdbA2V3qNRXvm', '(+62) 25 0805 8100', '2075-08-13', 'female', '9106345305211218', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('72551a54-4318-4879-9018-62497c59af2e', 2, 'Maria Rahmawati', 'ami86@example.com', '$2y$10$wgrqMQBSV8HW4G968NZq3O2WStR/HdWeGjkFh2CI1JAt9hFzV6jbO', '0427 6242 4035', '2022-07-21', 'male', '1905114405945356', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('7540ea0f-9bf2-4ad2-ac27-8f20c8e93e4c', 1, 'Tantri Ida Kusmawati M.TI.', 'cahyadi.novitasari@example.net', '$2y$10$Ew24Domil2S8qf6LCgZ8kuJmHQn7UO0qx5NwT7pBHHUZ4uaEg9Vi.', '(+62) 809 9366 1667', '2059-01-10', 'female', '1222692107952426', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('7a44aa97-b127-4308-a825-c50b3987a53c', 2, 'Mutia Nasyiah', 'qhariyah@example.com', '$2y$10$ZrheYj4bWbE.uW5smxE.FujCxzmL6ARrESwBvOTShhfO8Em4G4Y0C', '(+62) 755 1259 796', '2019-10-20', 'female', '7103335606988075', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('885c4309-7d4d-4847-a0d4-38b1f28cd443', 2, 'Hasna Mulyani', 'whardiansyah@example.com', '$2y$10$.2jpWgGd8JmwU.K9Wz7/0e6G0GqdbI6SXcg0j4aubPfDl/LzgZ5gK', '(+62) 815 019 817', '2066-08-16', 'female', '6371992102016983', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('8d2a0922-76c4-4762-b3b0-bd8ea64e8925', 1, 'Elvina Mayasari S.Gz', 'cinta67@example.com', '$2y$10$/96KGF6G5jfJYg284JZdROovK36NsIPXAUUy4PMCoIi13IzaH4h36', '0462 1331 806', '2009-12-27', 'female', '3314950404110713', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('9339e1f0-6fde-442f-bc4a-be4502c879de', 1, 'Puji Belinda Kuswandari S.H.', 'uyainah.aisyah@example.net', '$2y$10$Jr6lJHdnNgBKQpRmbyUvE.ZQO1VQdKYensc40Nk1wy/gpQ7oCYJMO', '0700 8196 4673', '2096-12-20', 'female', '1311825209037045', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('955e8cf6-68aa-4b18-9450-355d9e162aac', 1, 'Kunthara Prasetya Zulkarnain M.TI.', 'septi.thamrin@example.net', '$2y$10$pq.4VhHVH4hKgivqvjZxt.39AGWlyTAkdqEHIpNfQep6hgPM.rN3W', '(+62) 23 1408 527', '2020-04-15', 'male', '7311872105223058', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('9bf363c0-9b3a-4491-83f0-683c2cd6cf5e', 2, 'Mylalovic Frederich', 'mylalovic@gmail.com', '$2y$10$yKdP0NCACBd0BI/wByMKJOVd4iFqBu2QsbkvOHjx2nvnNu6c2np.q', '081227182582', '1997-04-12', 'female', '0863175318163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:39', '2024-04-21 01:48:39'),
('9d9c69d0-9d61-4d19-8f56-39b9fc6ba351', 1, 'Yuliana Padmasari', 'gilda.utama@example.com', '$2y$10$EZrwim0r6U5qjkp/Ck7ffOSTLJxNrvoKAydKsDwqLPMZozG.tCQeG', '0383 5036 403', '2071-04-24', 'female', '3302850303069305', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('a4e2fa70-fd1f-47ae-835d-44d7eefa30b3', 2, 'Rafid Lazuardi', 'salsabila66@example.org', '$2y$10$sdj.B0fKqwyp8pU8gldux.0GK4jEsqXIcjHtvrEu9U.wuSP85XP8m', '0612 4413 1912', '2022-05-18', 'male', '1612164809966674', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('a5a59757-d810-4375-917c-97daa2e3ae58', 1, 'Endah Faizah Yuliarti', 'asaragih@example.com', '$2y$10$elV3Tu89INQ/UXnVHuLYj.5q6mg3V/yhxgssBspWErzZizDgHZY1K', '(+62) 911 7216 546', '2089-11-18', 'male', '1806821502003901', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('a83d7b6f-5a0d-4b6f-b4ed-1e14bf7cb038', 1, 'Anita Halimah M.Kom.', 'titin08@example.org', '$2y$10$f4GjMdLpzuAy6hoTywbmh.wHkUtRj036rKFEnmijVTl18CtqKM2iC', '0840 0100 3084', '2108-04-11', 'female', '1401374406200273', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('a907c603-6420-4b55-a79f-a6ebc2869572', 1, 'Malik Cahyanto Halim S.Pd', 'wulan.wulandari@example.net', '$2y$10$RrroggBoubuRHycIiifKa.qV.tAJGfBCUvkOTbaT8NmISU8gQQmqi', '(+62) 20 3498 6111', '2025-07-16', 'female', '1101891812175463', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('b1a66c51-82c3-4e36-a3f4-10c155cab6c1', 1, 'Yani Yulianti', 'wulan99@example.com', '$2y$10$s3pm7VYbPQLyethyeTLjn.3FvKJg1YRyLlGul7d.ahB0XhmIr0sJ2', '0801 0868 7200', '2060-12-15', 'male', '5107455402149301', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('b251cccc-a1b5-48bd-af93-c29d8fcea883', 2, 'Putu Wahyudin', 'tiara77@example.net', '$2y$10$k4OUx0COozlecLW8309khOq0JFgDlCacGrztIfD7aFSZNmazbgBI.', '(+62) 907 4313 602', '2124-08-01', 'male', '6407904405021358', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('bfc7e9e5-fa16-4b42-b4c1-befe506f18a6', 2, 'Karna Putra', 'winarno.fathonah@example.com', '$2y$10$b.oQMnrkT1JFizApPyDlue34lrGYOqx2p.X2RQn7HeHgNEn6xxPeK', '(+62) 944 0334 2795', '2063-05-22', 'female', '9125317112059931', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('c651eccc-2569-42e7-a5d7-444d5aa21b3b', 1, 'Tantri Jamalia Mandasari', 'gsiregar@example.net', '$2y$10$jMqUenxcy83ctruySriAiOPwd6rgS/hb3Xj.hqFHQxGCEJhKIup62', '0977 6117 7180', '2041-07-05', 'male', '5308447003144585', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('c6eace2c-25ef-46b4-a746-3c95054d1291', 1, 'Julia Eva Oktaviani S.IP', 'namaga.kamal@example.org', '$2y$10$KSTeRxiyuW4iBpsNWdoUfe.vTe0TkSv9qsyhJO..KUahrN6lz5jsa', '0555 6442 042', '2132-11-11', 'male', '9208292007982969', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('c9224799-2019-4d1c-95dd-792fc8dc331d', 1, 'Eli Hasanah M.Pd', 'hilda.permata@example.net', '$2y$10$g8ghm0IC5Ihiq/rnqPXKNOEb8WrQixcv7ytcKsZ9qut.utmU79YEm', '(+62) 772 1117 350', '2035-03-09', 'male', '6111717112099848', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('d4bea726-633d-4300-8edf-63cd86c1cad5', 2, 'Daliman Prasetyo', 'unggul.rajata@example.net', '$2y$10$xkg9yQAU5/geQvpsVoQscengu56cJ/yMvkSMBTEKGt/XWQm392Dh.', '(+62) 814 7422 3027', '2093-01-28', 'male', '6101472709170306', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('d59e3084-e0f9-4be8-b376-a411186d943b', 2, 'Almira Nadia Pratiwi S.E.', 'daliman02@example.org', '$2y$10$huxEjU8.k1Xi4jPR3TJgwOI0yFow/DNz2I4DQID85F8lbq8164gPC', '(+62) 430 2111 133', '2073-06-28', 'male', '3603364311986031', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('dafb5251-f48e-464c-a028-50094ef38a73', 1, 'Uchita Maria Sudiati', 'dongoran.nurul@example.com', '$2y$10$2/qG.d5BZ5o7bQRRnJUfw.s9BtfnwlQi5yNfX.0KmeqTNHaKKJDUy', '(+62) 329 4895 5585', '2092-11-08', 'female', '6401336606061727', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('dba7231f-623d-44da-8aa2-df2e3a0c675c', 2, 'Pranawa Samosir', 'mursita23@example.com', '$2y$10$8EMTXKUsgLJsIf9DyPk4kOPiXcAqpdJW0s1jZehGL4IGgs2BYnhH.', '0947 4228 063', '2103-09-01', 'male', '7322155502136029', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('df446d23-8f65-483b-aba2-dcab95a140fc', 2, 'Santiago Lozano', 'santiagolozano@gmail.com', '$2y$10$gtYzQcvsOAnr9uzfiSsewuO5uru0h3B4jXjLSjyLLIHg9uObwtIva', '081224282582', '1991-04-12', 'female', '0863179618163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:39', '2024-04-21 01:48:39'),
('e8b7ff61-a3cf-4d39-a65d-9c1bbbd28a6f', 2, 'Prima Wahyudin', 'dbudiyanto@example.org', '$2y$10$YJj/ggQ2iWLGDjBFWVu9QutVZOnLZHRCzASInawaJ5YaEUObQieW2', '0534 5602 5243', '2103-06-05', 'female', '6472516002235825', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('e97b4e29-7cbe-459a-9a35-55c651f7ae0d', 1, 'Olga Sihombing S.E.', 'pradipta.paiman@example.org', '$2y$10$DYiyozAELDAd24fI4wmhbu3AaFo.voIJUF3Pmt8KUEt73GXGXGpue', '023 2697 5836', '2044-01-28', 'female', '5303962404144204', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('ee6e6404-1987-40fc-a785-d0853af5050d', 1, 'Ade Kusmawati', 'pratiwi.irfan@example.org', '$2y$10$UvTzwj0vHAVGNykr0jkHiOa.vvKgVqqLpLQuyBUch8iOqOSL/OcR6', '0374 3260 9632', '2140-03-22', 'male', '3576705002005181', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('ef541e51-94d0-4a74-8736-ed41e43560b3', 2, 'Ika Yuliarti S.Pd', 'aris19@example.org', '$2y$10$etoxaBeTpBYH3gb3zcTQ/OGJQAcHdVslE3Rxwif9FCc3ojHBZpRW.', '(+62) 262 6550 692', '2011-05-08', 'female', '1174484502072553', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'member', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('f8438fb3-103f-4054-9f63-90b60f195c8f', 1, 'Ihdi Ulfaq', 'ihdiulfaq@gmail.com', '$2y$10$VI7c1uArbsdBsKMZTErr0uZ9x6UkfYMNtOKRKfOR4SFHdFEgZbQNS', '081227182517', '1991-02-23', 'male', '0863175318363', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:39', '2024-04-21 01:48:39'),
('f90302fd-9b99-4e16-a040-925612225b6d', 1, 'Anjasmara Dwi Setiadi', 'anjasmara@gmail.com', '$2y$10$ZcoGjOVW8u44IYeq/7G/IukPIhScXcPuOBfQUfx8qU68KIa3stW3i', '081227182587', '1998-01-23', 'male', '0863175418163', 'http://laravel-test-k-24.test/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:39', '2024-04-21 01:48:39'),
('f95e32e4-7b8b-4335-9cb1-9946df5f8424', 1, 'Bakianto Karta Winarno', 'queen.permadi@example.net', '$2y$10$2kTl/OL54cjwDiYWtH7mlO3G4JnVRU6vP6qKv5EOBd1cY4o6KmEDy', '0311 9559 2036', '2036-01-05', 'female', '1308145401131782', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 1, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43'),
('ff4c48cc-e619-4354-8626-ca759d26317f', 2, 'Uchita Tania Wijayanti', 'endra53@example.net', '$2y$10$uGR8AghbhhNgJMLLR7GfjOom9o.WHbLBI1hCeMACZwixeAabwyUBG', '0205 5741 761', '2099-05-29', 'female', '1110212306070892', 'http://master-duel-ruler.site/storage/photo-users/shuraiq-omen.jpg', 'administator', 0, NULL, NULL, '2024-04-21 01:48:43', '2024-04-21 01:48:43');

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
