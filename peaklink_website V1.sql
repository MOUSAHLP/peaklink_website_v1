-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 09:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peaklink_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `facts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facts`)),
  `phone` varchar(255) NOT NULL,
  `back_image` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `label_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`label_title`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `facts`, `phone`, `back_image`, `video`, `label_title`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"sad\"}', '{\"ar\":\"cswef\"}', '{\"ar\":[{\"number\":\"1\",\"title\":\"adscew\"}]}', '32', '2', NULL, '{\"ar\":\"cewf\"}', '2024-04-16 16:16:06', '2024-04-16 16:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `active_menus`
--

CREATE TABLE `active_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'Resource', 'Role Created', 'Spatie\\Permission\\Models\\Role', 'Created', 2, NULL, NULL, '{\"guard_name\":\"web\",\"name\":\"superAdmin\",\"updated_at\":\"2024-04-16 18:49:52\",\"created_at\":\"2024-04-16 18:49:52\",\"id\":2}', NULL, '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(2, 'Resource', 'User Created', 'App\\Models\\User', 'Created', 1, NULL, NULL, '{\"name\":\"issa\",\"email\":\"issa@gmail.com\",\"updated_at\":\"2024-04-16 18:54:33\",\"created_at\":\"2024-04-16 18:54:33\",\"id\":1}', NULL, '2024-04-16 15:54:33', '2024-04-16 15:54:33'),
(3, 'Access', 'issa logged in', NULL, 'Login', NULL, 'App\\Models\\User', 1, '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"}', NULL, '2024-04-16 15:54:50', '2024-04-16 15:54:50'),
(4, 'Resource', 'Footer Created by issa', 'App\\Models\\Footer', 'Created', 1, 'App\\Models\\User', 1, '{\"is_inputSubscrip\":false,\"footers\":\"{\\\"ar\\\":[{\\\"title\\\":\\\"test\\\",\\\"footers\\\":[{\\\"type\\\":\\\"email\\\",\\\"name\\\":\\\"email\\\"}]},{\\\"title\\\":\\\"test2\\\",\\\"footers\\\":[{\\\"type\\\":\\\"text\\\",\\\"name\\\":\\\"textwq\\\"}]}]}\",\"updated_at\":\"2024-04-16 19:00:13\",\"created_at\":\"2024-04-16 19:00:13\",\"id\":1}', NULL, '2024-04-16 16:00:14', '2024-04-16 16:00:14'),
(5, 'Resource', 'Media Created by issa', 'Awcodes\\Curator\\Models\\Media', 'Created', 1, 'App\\Models\\User', 1, '{\"disk\":\"public\",\"directory\":\"media\",\"visibility\":\"public\",\"name\":\"6f906e1f-10ef-4778-b500-b4206f8aff18\",\"path\":\"media\\/6f906e1f-10ef-4778-b500-b4206f8aff18.png\",\"exif\":null,\"width\":468,\"height\":371,\"size\":51653,\"type\":\"image\\/png\",\"ext\":\"png\",\"title\":\"Screenshot 2023-09-07 173655\",\"updated_at\":\"2024-04-16 19:15:45\",\"created_at\":\"2024-04-16 19:15:45\",\"id\":1}', NULL, '2024-04-16 16:15:45', '2024-04-16 16:15:45'),
(6, 'Resource', 'Media Created by issa', 'Awcodes\\Curator\\Models\\Media', 'Created', 2, 'App\\Models\\User', 1, '{\"disk\":\"public\",\"directory\":\"media\",\"visibility\":\"public\",\"name\":\"ec66a2aa-f9ea-4067-9dfd-65430c06d74c\",\"path\":\"media\\/ec66a2aa-f9ea-4067-9dfd-65430c06d74c.png\",\"exif\":null,\"width\":1907,\"height\":733,\"size\":264155,\"type\":\"image\\/png\",\"ext\":\"png\",\"title\":\"Screenshot 2023-09-05 175030\",\"updated_at\":\"2024-04-16 19:15:45\",\"created_at\":\"2024-04-16 19:15:45\",\"id\":2}', NULL, '2024-04-16 16:15:46', '2024-04-16 16:15:46'),
(7, 'Resource', 'About Us Created by issa', 'App\\Models\\AboutUs', 'Created', 1, 'App\\Models\\User', 1, '{\"back_image\":2,\"phone\":\"32\",\"title\":\"{\\\"ar\\\":\\\"sad\\\"}\",\"label_title\":\"{\\\"ar\\\":\\\"cewf\\\"}\",\"description\":\"{\\\"ar\\\":\\\"cswef\\\"}\",\"facts\":\"{\\\"ar\\\":[{\\\"number\\\":\\\"1\\\",\\\"title\\\":\\\"adscew\\\"}]}\",\"updated_at\":\"2024-04-16 19:16:06\",\"created_at\":\"2024-04-16 19:16:06\",\"id\":1}', NULL, '2024-04-16 16:16:06', '2024-04-16 16:16:06'),
(8, 'Resource', 'Manage Title Page Created by issa', 'App\\Models\\ManageTitlePage', 'Created', 1, 'App\\Models\\User', 1, '{\"title\":\"{\\\"ar\\\":\\\"sad\\\"}\",\"description\":\"{\\\"ar\\\":\\\"fsed\\\"}\",\"updated_at\":\"2024-04-16 19:21:59\",\"created_at\":\"2024-04-16 19:21:59\",\"id\":1}', NULL, '2024-04-16 16:21:59', '2024-04-16 16:21:59'),
(9, 'Access', 'issa logged in', NULL, 'Login', NULL, 'App\\Models\\User', 1, '{\"ip\":\"127.0.0.1\",\"user_agent\":\"Mozilla\\/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit\\/537.36 (KHTML, like Gecko) Chrome\\/123.0.0.0 Safari\\/537.36\"}', NULL, '2024-04-19 04:06:13', '2024-04-19 04:06:13'),
(10, 'Resource', 'Manage Menu Created by issa', 'App\\Models\\ManageMenu', 'Created', 1, 'App\\Models\\User', 1, '{\"status\":true,\"title\":\"{\\\"ar\\\":\\\"sad\\\"}\",\"updated_at\":\"2024-04-19 07:06:37\",\"created_at\":\"2024-04-19 07:06:37\",\"id\":1}', NULL, '2024-04-19 04:06:37', '2024-04-19 04:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`name`)),
  `slug` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `call_sections`
--

CREATE TABLE `call_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `phone` varchar(255) DEFAULT NULL,
  `button_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`button_title`)),
  `button_link` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_projects`
--

CREATE TABLE `category_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_contacts`
--

CREATE TABLE `contact_us_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contacts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`contacts`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_forms`
--

CREATE TABLE `contact_us_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `image` varchar(255) NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`questions`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flow_works`
--

CREATE TABLE `flow_works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `image` varchar(255) NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`short_description`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_inputSubscrip` tinyint(4) NOT NULL DEFAULT 1,
  `inputSubscrip` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`inputSubscrip`)),
  `footers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`footers`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `is_inputSubscrip`, `inputSubscrip`, `footers`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, '{\"ar\":[{\"title\":\"test\",\"footers\":[{\"type\":\"email\",\"name\":\"email\"}]},{\"title\":\"test2\",\"footers\":[{\"type\":\"text\",\"name\":\"textwq\"}]}]}', '2024-04-16 16:00:13', '2024-04-16 16:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `manage_menus`
--

CREATE TABLE `manage_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_menus`
--

INSERT INTO `manage_menus` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"sad\"}', 1, '2024-04-19 04:06:37', '2024-04-19 04:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `manage_title_pages`
--

CREATE TABLE `manage_title_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`description`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_title_pages`
--

INSERT INTO `manage_title_pages` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"sad\"}', '{\"ar\":\"fsed\"}', '2024-04-16 16:21:59', '2024-04-16 16:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disk` varchar(255) NOT NULL DEFAULT 'public',
  `directory` varchar(255) NOT NULL DEFAULT 'media',
  `visibility` varchar(255) NOT NULL DEFAULT 'public',
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `width` int(10) UNSIGNED DEFAULT NULL,
  `height` int(10) UNSIGNED DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'image',
  `ext` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `exif` text DEFAULT NULL,
  `curations` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `disk`, `directory`, `visibility`, `name`, `path`, `width`, `height`, `size`, `type`, `ext`, `alt`, `title`, `description`, `caption`, `exif`, `curations`, `created_at`, `updated_at`) VALUES
(1, 'public', 'media', 'public', '6f906e1f-10ef-4778-b500-b4206f8aff18', 'media/6f906e1f-10ef-4778-b500-b4206f8aff18.png', 468, 371, 51653, 'image/png', 'png', NULL, 'Screenshot 2023-09-07 173655', NULL, NULL, NULL, NULL, '2024-04-16 16:15:45', '2024-04-16 16:15:45'),
(2, 'public', 'media', 'public', 'ec66a2aa-f9ea-4067-9dfd-65430c06d74c', 'media/ec66a2aa-f9ea-4067-9dfd-65430c06d74c.png', 1907, 733, 264155, 'image/png', 'png', NULL, 'Screenshot 2023-09-05 175030', NULL, NULL, NULL, NULL, '2024-04-16 16:15:45', '2024-04-16 16:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_01_26_190346_create_permission_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_26_183333_create_filament_sort_order_table', 1),
(7, '2024_01_26_183728_create_pages_table', 1),
(8, '2024_01_26_184500_create_media_table', 1),
(9, '2024_01_26_184813_create_activity_log_table', 1),
(10, '2024_01_26_184814_add_event_column_to_activity_log_table', 1),
(11, '2024_01_26_184815_add_batch_uuid_column_to_activity_log_table', 1),
(12, '2024_01_26_191419_add_themes_settings_to_users_table', 1),
(13, '2024_01_28_111515_create_silder_pages_table', 1),
(14, '2024_01_28_111651_create_services_table', 1),
(15, '2024_01_28_111735_create_faqs_table', 1),
(16, '2024_01_28_111759_create_about_us_table', 1),
(17, '2024_01_28_111826_create_flow_works_table', 1),
(18, '2024_01_28_111904_create_category_projects_table', 1),
(19, '2024_01_28_112108_create_projects_table', 1),
(20, '2024_01_28_112216_create_title_page_projects_table', 1),
(21, '2024_01_28_114358_create_our_client_reviews_table', 1),
(22, '2024_01_28_114531_create_why_choose_our_services_table', 1),
(23, '2024_01_28_114620_create_pricings_table', 1),
(24, '2024_01_28_114742_create_call_sections_table', 1),
(25, '2024_01_28_114831_create_contact_us_form_table', 1),
(26, '2024_01_28_114950_create_blog_categories_table', 1),
(27, '2024_01_28_115029_create_tags_table', 1),
(28, '2024_01_28_115101_create_posts_table', 1),
(29, '2024_01_28_115239_create_brands_table', 1),
(30, '2024_01_28_115657_create_title_section_services_table', 1),
(31, '2024_01_28_115831_create_title_section_abouts_table', 1),
(32, '2024_01_28_115920_create_title_section_contacts_table', 1),
(33, '2024_01_28_120026_create_title_section_not_founds_table', 1),
(34, '2024_01_28_120304_create_active_menus_table', 1),
(35, '2024_02_02_081102_create_teams_table', 1),
(36, '2024_02_02_084838_create_team_details_table', 1),
(37, '2024_02_02_183638_create_footers_table', 1),
(38, '2024_02_02_192343_create_manage_menus_table', 1),
(39, '2024_02_02_193638_create_manage_title_pages_table', 1),
(40, '2024_02_02_195108_create_settings_table', 1),
(41, '2024_02_03_084028_create_product_categories_table', 1),
(42, '2024_02_03_084224_create_product_tags_table', 1),
(43, '2024_02_03_090923_create_products_table', 1),
(44, '2024_02_05_070503_add_status_to_product_categories', 1),
(45, '2024_02_08_155326_create_products_tags_relations_table', 1),
(46, '2024_02_16_135018_create_contact_us_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `our_client_reviews`
--

CREATE TABLE `our_client_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `client_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`client_name`)),
  `client_job` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`client_job`)),
  `client_image` varchar(255) NOT NULL,
  `stars` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `layout` varchar(255) NOT NULL DEFAULT 'default',
  `blocks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`blocks`)),
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_any_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(2, 'view_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(3, 'create_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(4, 'update_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(5, 'delete_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(6, 'delete_any_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(7, 'replicate_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(8, 'reorder_about::us', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(9, 'view_any_activity', 'web', '2024-04-16 15:49:38', '2024-04-16 15:49:38'),
(10, 'view_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(11, 'create_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(12, 'update_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(13, 'delete_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(14, 'delete_any_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(15, 'replicate_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(16, 'reorder_activity', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(17, 'view_any_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(18, 'view_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(19, 'create_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(20, 'update_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(21, 'delete_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(22, 'delete_any_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(23, 'replicate_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(24, 'reorder_blog::category', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(25, 'view_any_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(26, 'view_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(27, 'create_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(28, 'update_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(29, 'delete_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(30, 'delete_any_brand', 'web', '2024-04-16 15:49:39', '2024-04-16 15:49:39'),
(31, 'replicate_brand', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(32, 'reorder_brand', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(33, 'view_any_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(34, 'view_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(35, 'create_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(36, 'update_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(37, 'delete_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(38, 'delete_any_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(39, 'replicate_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(40, 'reorder_call::section', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(41, 'view_any_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(42, 'view_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(43, 'create_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(44, 'update_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(45, 'delete_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(46, 'delete_any_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(47, 'replicate_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(48, 'reorder_category::project', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(49, 'view_any_contact::us::contact', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(50, 'view_contact::us::contact', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(51, 'create_contact::us::contact', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(52, 'update_contact::us::contact', 'web', '2024-04-16 15:49:40', '2024-04-16 15:49:40'),
(53, 'delete_contact::us::contact', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(54, 'delete_any_contact::us::contact', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(55, 'replicate_contact::us::contact', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(56, 'reorder_contact::us::contact', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(57, 'view_any_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(58, 'view_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(59, 'create_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(60, 'update_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(61, 'delete_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(62, 'delete_any_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(63, 'replicate_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(64, 'reorder_faq', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(65, 'view_any_flow::work', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(66, 'view_flow::work', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(67, 'create_flow::work', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(68, 'update_flow::work', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(69, 'delete_flow::work', 'web', '2024-04-16 15:49:41', '2024-04-16 15:49:41'),
(70, 'delete_any_flow::work', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(71, 'replicate_flow::work', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(72, 'reorder_flow::work', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(73, 'view_any_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(74, 'view_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(75, 'create_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(76, 'update_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(77, 'delete_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(78, 'delete_any_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(79, 'replicate_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(80, 'reorder_footer', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(81, 'view_any_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(82, 'view_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(83, 'create_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(84, 'update_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(85, 'delete_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(86, 'delete_any_manage::menu', 'web', '2024-04-16 15:49:42', '2024-04-16 15:49:42'),
(87, 'replicate_manage::menu', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(88, 'reorder_manage::menu', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(89, 'view_any_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(90, 'view_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(91, 'create_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(92, 'update_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(93, 'delete_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(94, 'delete_any_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(95, 'replicate_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(96, 'reorder_manage::title::page', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(97, 'view_any_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(98, 'view_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(99, 'create_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(100, 'update_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(101, 'delete_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(102, 'delete_any_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(103, 'replicate_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(104, 'reorder_media', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(105, 'view_any_our::client::review', 'web', '2024-04-16 15:49:43', '2024-04-16 15:49:43'),
(106, 'view_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(107, 'create_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(108, 'update_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(109, 'delete_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(110, 'delete_any_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(111, 'replicate_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(112, 'reorder_our::client::review', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(113, 'view_any_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(114, 'view_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(115, 'create_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(116, 'update_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(117, 'delete_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(118, 'delete_any_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(119, 'replicate_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(120, 'reorder_page', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(121, 'view_any_post', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(122, 'view_post', 'web', '2024-04-16 15:49:44', '2024-04-16 15:49:44'),
(123, 'create_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(124, 'update_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(125, 'delete_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(126, 'delete_any_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(127, 'replicate_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(128, 'reorder_post', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(129, 'view_any_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(130, 'view_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(131, 'create_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(132, 'update_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(133, 'delete_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(134, 'delete_any_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(135, 'replicate_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(136, 'reorder_pricing', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(137, 'view_any_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(138, 'view_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(139, 'create_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(140, 'update_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(141, 'delete_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(142, 'delete_any_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(143, 'replicate_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(144, 'reorder_product::category', 'web', '2024-04-16 15:49:45', '2024-04-16 15:49:45'),
(145, 'view_any_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(146, 'view_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(147, 'create_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(148, 'update_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(149, 'delete_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(150, 'delete_any_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(151, 'replicate_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(152, 'reorder_product', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(153, 'view_any_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(154, 'view_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(155, 'create_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(156, 'update_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(157, 'delete_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(158, 'delete_any_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(159, 'replicate_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(160, 'reorder_product::tag', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(161, 'view_any_project', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(162, 'view_project', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(163, 'create_project', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(164, 'update_project', 'web', '2024-04-16 15:49:46', '2024-04-16 15:49:46'),
(165, 'delete_project', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(166, 'delete_any_project', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(167, 'replicate_project', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(168, 'reorder_project', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(169, 'view_any_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(170, 'view_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(171, 'create_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(172, 'update_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(173, 'delete_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(174, 'delete_any_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(175, 'replicate_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(176, 'reorder_role', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(177, 'view_any_service', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(178, 'view_service', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(179, 'create_service', 'web', '2024-04-16 15:49:47', '2024-04-16 15:49:47'),
(180, 'update_service', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(181, 'delete_service', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(182, 'delete_any_service', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(183, 'replicate_service', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(184, 'reorder_service', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(185, 'view_any_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(186, 'view_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(187, 'create_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(188, 'update_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(189, 'delete_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(190, 'delete_any_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(191, 'replicate_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(192, 'reorder_setting', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(193, 'view_any_silder::page', 'web', '2024-04-16 15:49:48', '2024-04-16 15:49:48'),
(194, 'view_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(195, 'create_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(196, 'update_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(197, 'delete_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(198, 'delete_any_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(199, 'replicate_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(200, 'reorder_silder::page', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(201, 'view_any_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(202, 'view_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(203, 'create_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(204, 'update_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(205, 'delete_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(206, 'delete_any_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(207, 'replicate_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(208, 'reorder_tag', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(209, 'view_any_team::detail', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(210, 'view_team::detail', 'web', '2024-04-16 15:49:49', '2024-04-16 15:49:49'),
(211, 'create_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(212, 'update_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(213, 'delete_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(214, 'delete_any_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(215, 'replicate_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(216, 'reorder_team::detail', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(217, 'view_any_team', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(218, 'view_team', 'web', '2024-04-16 15:49:50', '2024-04-16 15:49:50'),
(219, 'create_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(220, 'update_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(221, 'delete_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(222, 'delete_any_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(223, 'replicate_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(224, 'reorder_team', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(225, 'view_any_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(226, 'view_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(227, 'create_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(228, 'update_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(229, 'delete_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(230, 'delete_any_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(231, 'replicate_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(232, 'reorder_user', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(233, 'view_any_why::choose::our::service', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(234, 'view_why::choose::our::service', 'web', '2024-04-16 15:49:51', '2024-04-16 15:49:51'),
(235, 'create_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(236, 'update_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(237, 'delete_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(238, 'delete_any_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(239, 'replicate_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52'),
(240, 'reorder_why::choose::our::service', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`tags`)),
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `slug` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_title`)),
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_keywords`)),
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_description`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pricing` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`pricing`)),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_in_store` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_tags_relations`
--

CREATE TABLE `products_tags_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_tag_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_project_id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `image` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `date` date NOT NULL,
  `client_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`client_name`)),
  `website` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_title`)),
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_keywords`)),
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_description`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'panel_user', 'web', '2024-04-16 15:48:50', '2024-04-16 15:48:50'),
(2, 'superAdmin', 'web', '2024-04-16 15:49:52', '2024-04-16 15:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
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
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `slug` varchar(255) NOT NULL,
  `short_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`short_description`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_title`)),
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_keywords`)),
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_description`)),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location_map` varchar(255) DEFAULT NULL,
  `headerlogo` varchar(255) DEFAULT NULL,
  `footerlogo` varchar(255) DEFAULT NULL,
  `open_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`open_time`)),
  `close_time` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`close_time`)),
  `site_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`site_name`)),
  `powered_by` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`powered_by`)),
  `powered_by_link` varchar(255) DEFAULT NULL,
  `social_links` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`social_links`)),
  `color` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`color`)),
  `maintenance` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_title`)),
  `meta_image` varchar(255) DEFAULT NULL,
  `meta_keywords` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_keywords`)),
  `meta_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta_description`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `silder_pages`
--

CREATE TABLE `silder_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `button_link` varchar(255) NOT NULL,
  `button_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`button_title`)),
  `video` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `socials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`socials`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `skills_title` varchar(255) NOT NULL,
  `skills_description` longtext NOT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`skills`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_page_projects`
--

CREATE TABLE `title_page_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title_section`)),
  `description_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description_section`)),
  `image_section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_section_abouts`
--

CREATE TABLE `title_section_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title_section`)),
  `description_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description_section`)),
  `image_section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_section_contacts`
--

CREATE TABLE `title_section_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title_section`)),
  `description_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description_section`)),
  `image_section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_section_not_founds`
--

CREATE TABLE `title_section_not_founds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `image` varchar(255) NOT NULL,
  `button_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`button_title`)),
  `button_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `title_section_services`
--

CREATE TABLE `title_section_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title_section`)),
  `description_section` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description_section`)),
  `image_section` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `theme` varchar(255) DEFAULT 'default',
  `theme_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `sort_order`, `theme`, `theme_color`) VALUES
(1, 'issa', 'issa@gmail.com', NULL, '$2y$12$Bq6Y5w/14sxZRMhZ4cHZIO9MEJMpAxDxiv2uGix./5J.sRgNImh1G', NULL, '2024-04-16 15:54:33', '2024-04-16 15:54:33', 0, 'dracula', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `why_choose_our_services`
--

CREATE TABLE `why_choose_our_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`title`)),
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`description`)),
  `image` varchar(255) NOT NULL,
  `years_of_experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`years_of_experience`)),
  `title_experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title_experience`)),
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `facts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facts`)),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `active_menus`
--
ALTER TABLE `active_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `call_sections`
--
ALTER TABLE `call_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_projects`
--
ALTER TABLE `category_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_contacts`
--
ALTER TABLE `contact_us_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_forms`
--
ALTER TABLE `contact_us_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flow_works`
--
ALTER TABLE `flow_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_menus`
--
ALTER TABLE `manage_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_title_pages`
--
ALTER TABLE `manage_title_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `our_client_reviews`
--
ALTER TABLE `our_client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_parent_id_foreign` (`parent_id`),
  ADD KEY `pages_title_index` (`title`),
  ADD KEY `pages_layout_index` (`layout`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_tags_relations`
--
ALTER TABLE `products_tags_relations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tags_relations_product_tag_id_foreign` (`product_tag_id`),
  ADD KEY `products_tags_relations_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_tags_slug_unique` (`slug`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_category_project_id_foreign` (`category_project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_pages`
--
ALTER TABLE `silder_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_details_team_id_foreign` (`team_id`);

--
-- Indexes for table `title_page_projects`
--
ALTER TABLE `title_page_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_section_abouts`
--
ALTER TABLE `title_section_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_section_contacts`
--
ALTER TABLE `title_section_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_section_not_founds`
--
ALTER TABLE `title_section_not_founds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_section_services`
--
ALTER TABLE `title_section_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_choose_our_services`
--
ALTER TABLE `why_choose_our_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `active_menus`
--
ALTER TABLE `active_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `call_sections`
--
ALTER TABLE `call_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_projects`
--
ALTER TABLE `category_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_contacts`
--
ALTER TABLE `contact_us_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_forms`
--
ALTER TABLE `contact_us_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flow_works`
--
ALTER TABLE `flow_works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_menus`
--
ALTER TABLE `manage_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_title_pages`
--
ALTER TABLE `manage_title_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `our_client_reviews`
--
ALTER TABLE `our_client_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tags_relations`
--
ALTER TABLE `products_tags_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `silder_pages`
--
ALTER TABLE `silder_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_page_projects`
--
ALTER TABLE `title_page_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_section_abouts`
--
ALTER TABLE `title_section_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_section_contacts`
--
ALTER TABLE `title_section_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_section_not_founds`
--
ALTER TABLE `title_section_not_founds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `title_section_services`
--
ALTER TABLE `title_section_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_choose_our_services`
--
ALTER TABLE `why_choose_our_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_tags_relations`
--
ALTER TABLE `products_tags_relations`
  ADD CONSTRAINT `products_tags_relations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_tags_relations_product_tag_id_foreign` FOREIGN KEY (`product_tag_id`) REFERENCES `product_tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_project_id_foreign` FOREIGN KEY (`category_project_id`) REFERENCES `category_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_details`
--
ALTER TABLE `team_details`
  ADD CONSTRAINT `team_details_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
