-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 04 2017 г., 16:32
-- Версия сервера: 5.7.18-0ubuntu0.16.04.1
-- Версия PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE `job` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` decimal(15,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id`, `title`, `money`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Сварщики', '20000.00', NULL, 'some text', '2017-05-03 11:13:17', '2017-05-03 11:13:17', NULL),
(2, 'Столяры', '16000.00', NULL, 'some text', '2017-05-03 11:23:15', '2017-05-03 11:23:15', NULL),
(3, 'Парикмахеры', '20500.00', NULL, NULL, '2017-05-03 11:47:22', '2017-05-03 11:47:22', NULL),
(4, 'Сантехники', '20000.00', NULL, NULL, '2017-05-03 11:47:53', '2017-05-03 11:47:53', NULL),
(5, 'Монтажники деревянных конструкций', '15000.00', NULL, NULL, '2017-05-03 11:48:22', '2017-05-03 11:48:22', NULL),
(6, 'Водители', '21500.00', NULL, NULL, '2017-05-03 11:48:51', '2017-05-03 11:48:51', NULL),
(7, 'Монтеры', '15000.00', NULL, NULL, '2017-05-03 11:49:20', '2017-05-03 11:49:20', NULL),
(8, 'Пекари', '14000.00', NULL, NULL, '2017-05-03 11:49:44', '2017-05-03 11:49:44', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `managers`
--

CREATE TABLE `managers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menus`
--

INSERT INTO `menus` (`id`, `position`, `menu_type`, `icon`, `name`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'User', 'User', NULL, NULL, NULL),
(2, NULL, 0, NULL, 'Role', 'Role', NULL, NULL, NULL),
(4, 2, 1, 'fa-sign-out', 'Job', 'Job', 6, '2017-05-03 11:12:08', '2017-05-04 10:51:09'),
(5, 3, 1, 'fa-sign-out', 'Title', 'Title', 6, '2017-05-03 11:35:59', '2017-05-04 10:51:09'),
(6, 0, 2, 'fa-database', 'SEO', 'SEO', NULL, '2017-05-03 11:50:09', '2017-05-03 11:50:09'),
(7, 5, 1, 'fa-sign-out', 'Meta', 'Meta', 6, '2017-05-03 12:04:13', '2017-05-04 10:51:09'),
(8, 1, 1, 'fa-sign-out', 'Script', 'Script', 6, '2017-05-03 12:25:35', '2017-05-04 10:51:09'),
(9, 4, 1, 'fa-sign-out', 'Review', 'Review', 6, '2017-05-03 12:57:51', '2017-05-04 10:51:09'),
(25, 0, 2, 'fa-database', 'MainMenu', 'Main menu', NULL, '2017-05-04 11:03:20', '2017-05-04 11:03:20'),
(30, 0, 1, 'fa-database', 'Customers', 'Customers', 25, '2017-05-04 11:10:24', '2017-05-04 11:10:24'),
(31, 0, 1, 'fa-database', 'Clients', 'Clients', 25, '2017-05-04 11:10:42', '2017-05-04 11:10:42'),
(32, 0, 1, 'fa-database', 'Orders', 'Orders', 25, '2017-05-04 11:13:31', '2017-05-04 11:13:31'),
(33, 0, 3, 'fa-database', 'AboutUser', 'User', 25, '2017-05-04 11:16:58', '2017-05-04 11:16:58'),
(34, 0, 2, 'fa-database', 'SomeModels', 'Some models', NULL, '2017-05-04 11:19:55', '2017-05-04 11:19:55'),
(35, 0, 1, 'fa-database', 'Regions', 'Regions', 34, '2017-05-04 11:20:50', '2017-05-04 11:20:50'),
(36, 0, 1, 'fa-database', 'Districts', 'Districts', 34, '2017-05-04 11:22:01', '2017-05-04 11:22:01'),
(37, 0, 1, 'fa-database', 'Cities', 'Cities', 34, '2017-05-04 11:22:43', '2017-05-04 11:22:43'),
(38, 0, 1, 'fa-database', 'Addresses', 'Addresses', 34, '2017-05-04 11:24:05', '2017-05-04 11:24:05'),
(39, 0, 1, 'fa-database', 'Polands', 'Polands', 34, '2017-05-04 11:28:16', '2017-05-04 11:28:16'),
(40, 0, 1, 'fa-database', 'Managers', 'Managers', 34, '2017-05-04 11:28:36', '2017-05-04 11:28:36'),
(41, 0, 1, 'fa-database', 'TypeOfVisas', 'Type of visa', 34, '2017-05-04 11:29:39', '2017-05-04 11:29:39'),
(42, 0, 1, 'fa-database', 'Statuses', 'Statuses', 34, '2017-05-04 11:30:05', '2017-05-04 11:30:05'),
(43, 0, 1, 'fa-database', 'Partners', 'Partners', 25, '2017-05-04 11:30:56', '2017-05-04 11:30:56');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_role`
--

CREATE TABLE `menu_role` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_role`
--

INSERT INTO `menu_role` (`menu_id`, `role_id`) VALUES
(4, 1),
(4, 5),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 5),
(8, 1),
(8, 5),
(9, 1),
(9, 5),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(16, 1),
(16, 3),
(16, 4),
(20, 1),
(20, 3),
(21, 1),
(21, 3),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(25, 4),
(26, 1),
(26, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(32, 4),
(33, 1),
(33, 3),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(43, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `meta`
--

CREATE TABLE `meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `text_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `meta`
--

INSERT INTO `meta` (`id`, `text_tag`, `type_tag`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'visa, poland', 'keywords', '2017-05-03 12:04:40', '2017-05-03 12:05:03', NULL),
(2, 'some text about site', 'description', '2017-05-03 12:05:46', '2017-05-03 12:05:46', NULL),
(3, 'some text about site', 'description', '2017-05-03 12:05:46', '2017-05-03 12:05:55', '2017-05-03 12:05:55'),
(4, 'prosperis', 'title', '2017-05-03 12:08:16', '2017-05-03 12:08:16', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_10_10_000000_create_menus_table', 1),
(4, '2015_10_10_000000_create_roles_table', 1),
(5, '2015_10_10_000000_update_users_table', 1),
(6, '2015_12_11_000000_create_users_logs_table', 1),
(7, '2016_03_14_000000_update_menus_table', 1),
(8, '2017_05_03_131209_create_job_table', 2),
(9, '2017_05_03_133559_create_title_table', 3),
(10, '2017_05_03_140413_create_meta_table', 4),
(11, '2017_05_03_142536_create_script_table', 5),
(12, '2017_05_03_145751_create_review_table', 6),
(19, '2017_05_04_131024_create_customers_table', 7),
(20, '2017_05_04_131042_create_clients_table', 8),
(21, '2017_05_04_131331_create_orders_table', 9),
(22, '2017_05_04_132050_create_regions_table', 10),
(23, '2017_05_04_132201_create_districts_table', 11),
(24, '2017_05_04_132243_create_cities_table', 12),
(25, '2017_05_04_132405_create_addresses_table', 13),
(26, '2017_05_04_132816_create_polands_table', 14),
(27, '2017_05_04_132836_create_managers_table', 15),
(28, '2017_05_04_132939_create_type_of_visas_table', 16),
(29, '2017_05_04_133005_create_statuses_table', 17),
(30, '2017_05_04_133057_create_partners_table', 18);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `scan_order_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `polands`
--

CREATE TABLE `polands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2017-05-03 11:00:18', '2017-05-03 11:00:18'),
(3, 'Manager', '2017-05-04 09:28:22', '2017-05-04 09:28:22'),
(4, 'Poland', '2017-05-04 10:14:26', '2017-05-04 10:14:26'),
(5, 'Content - Manager', '2017-05-04 10:19:21', '2017-05-04 10:19:21');

-- --------------------------------------------------------

--
-- Структура таблицы `script`
--

CREATE TABLE `script` (
  `id` int(10) UNSIGNED NOT NULL,
  `yandex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `title`
--

CREATE TABLE `title` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `typeofvisas`
--

CREATE TABLE `typeofvisas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '$2y$10$oR5nyelEYWb/AU2LxPH9FOKqlX58CrIda9DoNRjpPdfh2yNRV1S6.', 'hVVP9M2BtNl75GZ5H5yBKp4G2qTpdFiz5c9SOquRGoSgSIRgRTkeKdUUnhPK', '2017-05-03 11:00:56', '2017-05-03 11:00:56'),
(2, 3, 'nata', 'admin123@gmail.com', '$2y$10$6D/b8EjfjJ6wq8ad1/pNu.MyHfYvI9rGKOTPSxpQ9GBXVw7gQLpri', 'woSr3KHZwtJE6DvhFdOBndDjUMt4IDpjjkGmZA2wfSgbXZqddzzhctyNzk1o', '2017-05-04 09:29:04', '2017-05-04 10:16:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users_logs`
--

INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'updated', 'users', 1, '2017-05-03 11:01:19', '2017-05-03 11:01:19'),
(2, 1, 'created', 'job', 1, '2017-05-03 11:13:17', '2017-05-03 11:13:17'),
(3, 1, 'created', 'job', 2, '2017-05-03 11:23:15', '2017-05-03 11:23:15'),
(4, 1, 'created', 'job', 3, '2017-05-03 11:47:22', '2017-05-03 11:47:22'),
(5, 1, 'created', 'job', 4, '2017-05-03 11:47:53', '2017-05-03 11:47:53'),
(6, 1, 'created', 'job', 5, '2017-05-03 11:48:22', '2017-05-03 11:48:22'),
(7, 1, 'created', 'job', 6, '2017-05-03 11:48:51', '2017-05-03 11:48:51'),
(8, 1, 'created', 'job', 7, '2017-05-03 11:49:20', '2017-05-03 11:49:20'),
(9, 1, 'created', 'job', 8, '2017-05-03 11:49:44', '2017-05-03 11:49:44'),
(10, 1, 'created', 'meta', 1, '2017-05-03 12:04:40', '2017-05-03 12:04:40'),
(11, 1, 'updated', 'meta', 1, '2017-05-03 12:05:03', '2017-05-03 12:05:03'),
(12, 1, 'created', 'meta', 2, '2017-05-03 12:05:46', '2017-05-03 12:05:46'),
(13, 1, 'created', 'meta', 3, '2017-05-03 12:05:46', '2017-05-03 12:05:46'),
(14, 1, 'deleted', 'meta', 3, '2017-05-03 12:05:55', '2017-05-03 12:05:55'),
(15, 1, 'created', 'meta', 4, '2017-05-03 12:08:16', '2017-05-03 12:08:16'),
(16, 1, 'created', 'users', 2, '2017-05-04 09:29:04', '2017-05-04 09:29:04'),
(17, 1, 'updated', 'users', 1, '2017-05-04 09:42:37', '2017-05-04 09:42:37'),
(18, 1, 'updated', 'users', 1, '2017-05-04 09:42:38', '2017-05-04 09:42:38'),
(19, 2, 'updated', 'users', 2, '2017-05-04 09:43:17', '2017-05-04 09:43:17'),
(20, 1, 'updated', 'users', 1, '2017-05-04 09:43:33', '2017-05-04 09:43:33'),
(21, 1, 'updated', 'users', 1, '2017-05-04 09:43:34', '2017-05-04 09:43:34'),
(22, 2, 'updated', 'users', 2, '2017-05-04 09:44:49', '2017-05-04 09:44:49'),
(23, 2, 'updated', 'users', 2, '2017-05-04 09:46:31', '2017-05-04 09:46:31'),
(24, 2, 'updated', 'users', 2, '2017-05-04 09:48:22', '2017-05-04 09:48:22'),
(25, 1, 'updated', 'users', 1, '2017-05-04 09:48:56', '2017-05-04 09:48:56'),
(26, 2, 'updated', 'users', 2, '2017-05-04 09:51:26', '2017-05-04 09:51:26'),
(27, 1, 'updated', 'users', 1, '2017-05-04 10:13:18', '2017-05-04 10:13:18'),
(28, 2, 'updated', 'users', 2, '2017-05-04 10:13:33', '2017-05-04 10:13:33'),
(29, 2, 'updated', 'users', 2, '2017-05-04 10:13:53', '2017-05-04 10:13:53'),
(30, 1, 'updated', 'users', 1, '2017-05-04 10:14:48', '2017-05-04 10:14:48'),
(31, 2, 'updated', 'users', 2, '2017-05-04 10:15:57', '2017-05-04 10:15:57'),
(32, 2, 'updated', 'users', 2, '2017-05-04 10:16:05', '2017-05-04 10:16:05'),
(33, 1, 'updated', 'users', 2, '2017-05-04 10:16:56', '2017-05-04 10:16:56'),
(34, 1, 'updated', 'users', 1, '2017-05-04 10:17:09', '2017-05-04 10:17:09'),
(35, 2, 'updated', 'users', 2, '2017-05-04 10:17:29', '2017-05-04 10:17:29'),
(36, 1, 'updated', 'users', 1, '2017-05-04 10:44:26', '2017-05-04 10:44:26');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Индексы таблицы `menu_role`
--
ALTER TABLE `menu_role`
  ADD UNIQUE KEY `menu_role_menu_id_role_id_unique` (`menu_id`,`role_id`),
  ADD KEY `menu_role_menu_id_index` (`menu_id`),
  ADD KEY `menu_role_role_id_index` (`role_id`);

--
-- Индексы таблицы `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `polands`
--
ALTER TABLE `polands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `script`
--
ALTER TABLE `script`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `typeofvisas`
--
ALTER TABLE `typeofvisas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `job`
--
ALTER TABLE `job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT для таблицы `meta`
--
ALTER TABLE `meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `polands`
--
ALTER TABLE `polands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `script`
--
ALTER TABLE `script`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `title`
--
ALTER TABLE `title`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `typeofvisas`
--
ALTER TABLE `typeofvisas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
