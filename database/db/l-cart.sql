-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2020 at 12:58 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l-cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('none','pending','in_progress','accept','deliverd','reject') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `address`, `phone`, `total_price`, `currency`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '1628.4999999999998', 'usd', 2, 'none', '2020-11-17 12:44:40', '2020-11-17 12:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `offers_type` enum('none','percent','pieces') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_pieces` int(11) NOT NULL DEFAULT '0',
  `free_pieces` int(11) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usd',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `offers_type`, `paid_pieces`, `free_pieces`, `percent`, `price`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 23, 'pieces', 22, 1, 0, 63.80, 'usd', '2020-11-17 12:44:40', '2020-11-17 12:44:40'),
(2, 1, 3, 1, 'percent', 0, 0, 7, 170.00, 'usd', '2020-11-17 12:45:08', '2020-11-17 12:45:08'),
(3, 1, 2, 1, 'none', 0, 0, 0, 3.00, 'usd', '2020-11-17 12:45:28', '2020-11-17 12:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `meta_tags`, `icon`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ملابس', 'clothes', 'تنشيط, محركات, البحث, هنا,', '/uploads/images/categories/1605614948.png', NULL, NULL, '2020-11-17 12:09:08', '2020-11-17 12:09:08'),
(2, 'رياضه', 'sports', 'تنشيط, محركات, البحث, هنا,', '/uploads/images/categories/1605615100.png', NULL, NULL, '2020-11-17 12:11:40', '2020-11-17 12:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameAr` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameEn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinceId` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `nameAr`, `nameEn`, `provinceId`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'القاهره', 'cairo', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'egypt', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `external_resources`
--

CREATE TABLE `external_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_05_171759_create_counties_table', 1),
(2, '2019_07_05_171810_create_cities_table', 1),
(3, '2019_07_05_171811_create_users_table', 1),
(4, '2019_07_05_171812_create_password_resets_table', 1),
(5, '2019_07_25_182920_create_reports_table', 1),
(6, '2019_08_03_204310_create_settings_table', 1),
(7, '2019_08_03_204706_create_setting_emails_table', 1),
(8, '2019_08_03_205052_create_setting_social_media_table', 1),
(9, '2019_08_03_205249_create_setting_phones_table', 1),
(10, '2019_08_03_205424_create_setting_watsapps_table', 1),
(11, '2019_08_03_205753_create_setting_addresses_table', 1),
(12, '2019_08_03_210537_create_setting_mail_provider_infos_table', 1),
(13, '2019_08_08_195022_create_external_resources_table', 1),
(14, '2019_08_26_220943_create_waiting_lists_table', 1),
(15, '2019_09_07_191925_create_categories_table', 1),
(16, '2020_11_14_144019_create_products_table', 1),
(17, '2020_11_14_144643_create_product_prices_table', 1),
(18, '2020_11_14_193516_create_product_images_table', 1),
(19, '2020_11_16_121300_create_carts_table', 1),
(20, '2020_11_16_122358_create_cart_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `offers_type` enum('none','percent','pieces') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_pieces` int(11) NOT NULL DEFAULT '0',
  `free_pieces` int(11) NOT NULL DEFAULT '0',
  `percent` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `content_ar`, `content_en`, `category_id`, `offers_type`, `paid_pieces`, `free_pieces`, `percent`, `created_at`, `updated_at`) VALUES
(1, 'سويت شيرت قطن بدون غطاء للرأس ورباط', 'Cotton sweatshirt without a hood and tie', '<h3>معلومات المنتج</h3>\r\n\r\n<ul>\r\n	<li id=\"specs\">\r\n	<h4>المواصفات</h4>\r\n\r\n	<dl>\r\n		<dt>حزمة سمك</dt>\r\n		<dd>33.8 centimeters</dd>\r\n		<dt>وزن الحزمة</dt>\r\n		<dd>440 grams</dd>\r\n		<dt>UPC-A</dt', '<h3>Product information<br />\r\nSpecifications<br />\r\nPackage thickness is 33.8 centimeters<br />\r\nThe weight of the package is 440 grams<br />\r\nUPC-A888757215386<br />\r\nConverse brand<br />\r\n', 1, 'none', 0, 0, 0, '2020-11-17 12:24:26', '2020-11-17 12:24:26'),
(2, 'تيشرت قطن سادة كوم قبه دائرية داخلي مريح - كحلي L', 'Plain Cotton T-Shirt Comfortable Inner Round Dome - Navy Blue L', '<h3>معلومات المنتج</h3>\r\n\r\n<ul>\r\n	<li id=\"specs\">\r\n	<h4>المواصفات</h4>\r\n\r\n	<h5>اللون</h5>\r\n\r\n	<h5>دي جي</h5>\r\n\r\n	<dl>\r\n		<dt>العلامة التجارية</dt>\r\n		<dd>اخرى</dd>\r\n		<dt>نوع القماش</dt>\r\n		<', '<h3>Product information</h3>\r\n\r\n<ul>\r\n	<li id=\"specs\">\r\n	<pre data-placeholder=\"الترجمة\" dir=\"ltr\" id=\"tw-target-text\">\r\nSpecifications</pre>\r\n\r\n	<p>the color<br />\r\n	DJ<br />\r\n	trade mark<br', 1, 'none', 0, 0, 0, '2020-11-17 12:30:18', '2020-11-17 12:30:18'),
(3, 'ساعة انالوج بعقارب جلد طبيعي دائرية بميناء على شكل اشكال هندسية للرجال من جيس W1182G1 - بني', 'Guess W1182G1 Geometric Dial Crocodile-Embossed Round Genuine Leather Analog Watch for Men - Brown', '<dl>\r\n	<dt>الرقم المصنعي</dt>\r\n	<dd>W1182G1</dd>\r\n	<dt>العلامة التجارية</dt>\r\n	<dd>جيس</dd>\r\n	<dt>شكل الساعة</dt>\r\n	<dd>دائري</dd>\r\n	<dt>حجم قطر قرص الساعة</dt>\r\n	<dd>42 ملليمتر</dd>\r\n</dl>\r\n', '<dl>\r\n	<dt>Brand</dt>\r\n	<dd>Guess</dd>\r\n	<dt>Manufacturer Number</dt>\r\n	<dd>W1182G1</dd>\r\n	<dt>Watch Shape</dt>\r\n	<dd>Round</dd>\r\n	<dt>Dial Case Diameter Size</dt>\r\n	<dd>42 millimeters</dd>\r\n', 1, 'percent', 0, 0, 7, '2020-11-17 12:40:08', '2020-11-17 12:40:08'),
(4, 'ساعة كاسيو اديفيس EF-558D-2AV للرجال - انالوج بعقارب، ساعة رياضية', 'Casio Edifice EF-558D-2AV For Men - Analog, Sport Watch, Stainless Steel', '<dl>\r\n	<dt>الرقم المصنعي</dt>\r\n	<dd>EF-558D-2A</dd>\r\n	<dt>العلامة التجارية</dt>\r\n	<dd>كاسيو</dd>\r\n	<dt>شكل الساعة</dt>\r\n	<dd>دائري</dd>\r\n	<dt>مادة السوار</dt>\r\n	<dd>ستانلس ستيل</dd>\r\n</dl>\r\n\r', '<p>Dial Color</p>\r\n\r\n<ul data-tabs=\"p7rtqp-tabs\" id=\"dial_color_en-connection-tabs\">\r\n</ul>\r\n\r\n<p><a data-enabled=\"true\" data-url=\"https://egypt.souq.com/eg-en/casio-edifice-ef-558d-2av-for-m', 2, 'pieces', 22, 1, 0, '2020-11-17 12:43:20', '2020-11-17 12:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1605615866.jpg', '2020-11-17 12:24:49', '2020-11-17 12:24:49'),
(2, 2, '1605616218.jpg', '2020-11-17 12:30:25', '2020-11-17 12:30:25'),
(3, 2, '3211232442.jpg', '2020-11-17 12:30:25', '2020-11-17 12:30:25'),
(4, 2, '4816848672.jpg', '2020-11-17 12:30:25', '2020-11-17 12:30:25'),
(5, 3, '1605616808.jpg', '2020-11-17 12:40:12', '2020-11-17 12:40:12'),
(6, 4, '1605617000.jpg', '2020-11-17 12:43:24', '2020-11-17 12:43:24'),
(7, 4, '3211234004.jpg', '2020-11-17 12:43:24', '2020-11-17 12:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `tax_plus` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `currency`, `price`, `tax`, `tax_plus`, `created_at`, `updated_at`) VALUES
(1, 1, 'l.e', 1.26, 1.00, 14.00, '2020-11-17 12:24:49', '2020-11-17 12:24:49'),
(2, 1, 'usd', 81.00, 1.00, 14.00, '2020-11-17 12:24:49', '2020-11-17 12:24:49'),
(3, 2, 'l.e', 53.00, 1.00, 14.00, '2020-11-17 12:30:25', '2020-11-17 12:30:25'),
(4, 2, 'usd', 3.00, 1.00, 14.00, '2020-11-17 12:30:25', '2020-11-17 12:30:25'),
(5, 3, 'l.e', 2653.00, 1.00, 14.00, '2020-11-17 12:40:12', '2020-11-17 12:40:12'),
(6, 3, 'usd', 170.00, 1.00, 14.00, '2020-11-17 12:40:12', '2020-11-17 12:40:12'),
(7, 4, 'l.e', 998.00, 14.00, 17.00, '2020-11-17 12:43:24', '2020-11-17 12:43:24'),
(8, 4, 'usd', 63.80, 17.00, 17.00, '2020-11-17 12:43:24', '2020-11-17 12:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `process` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `key`, `text`, `process`, `user_id`, `ip`, `browser`, `location`, `latitude`, `longitude`, `hostname`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:42:42', '2020-11-17 11:42:42'),
(2, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:43:09', '2020-11-17 11:43:09'),
(3, 'dashboard_update_setting', 'Update Setting Info', '{\"id\":1,\"title_ar\":\"l-Cart\",\"title_en\":\"l-Cart\",\"content_ar\":\"\\u0644\\u0648\\u062d\\u0629 \\u062a\\u062d\\u0643\\u0645 \\u0627\\u0644\\u0637\\u0644\\u0628\\u0627\\u062a\",\"content_en\":null,\"logo\":null,\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"extirnal_code\":\"\",\"created_by\":1,\"deleted_at\":null,\"created_at\":\"2020-11-17 11:43:34\",\"updated_at\":\"2020-11-17 11:43:34\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:43:34', '2020-11-17 11:43:34'),
(4, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:43:34', '2020-11-17 11:43:34'),
(5, 'dashboard_update_setting', 'Update Setting Info', '{\"id\":1,\"title_ar\":\"l-Cart\",\"title_en\":\"l-Cart\",\"content_ar\":\"\\u0644\\u0648\\u062d\\u0629 \\u062a\\u062d\\u0643\\u0645 l-Cart\",\"content_en\":null,\"logo\":null,\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"extirnal_code\":null,\"created_by\":1,\"deleted_at\":null,\"created_at\":\"2020-11-17 11:43:34\",\"updated_at\":\"2020-11-17 11:43:45\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:43:45', '2020-11-17 11:43:45'),
(6, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:43:46', '2020-11-17 11:43:46'),
(7, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:44:29', '2020-11-17 11:44:29'),
(8, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:45:10', '2020-11-17 11:45:10'),
(9, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:45:49', '2020-11-17 11:45:49'),
(10, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:46:03', '2020-11-17 11:46:03'),
(11, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:46:52', '2020-11-17 11:46:52'),
(12, 'dashboard_update_setting', 'Update Setting Info', '{\"id\":1,\"title_ar\":\"l-Cart\",\"title_en\":\"l-Cart\",\"content_ar\":\"\\u0644\\u0648\\u062d\\u0629 \\u062a\\u062d\\u0643\\u0645 l-Cart\",\"content_en\":null,\"logo\":\"\\/uploads\\/images\\/logos\\/l-Cart\\/96336817680.png\",\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"extirnal_code\":null,\"created_by\":1,\"deleted_at\":null,\"created_at\":\"2020-11-17 11:43:34\",\"updated_at\":\"2020-11-17 11:47:08\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:08', '2020-11-17 11:47:08'),
(13, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:08', '2020-11-17 11:47:08'),
(14, 'dashboard_update_setting', 'Update Setting Info', '{\"id\":1,\"title_ar\":\"l-Cart\",\"title_en\":\"l-Cart\",\"content_ar\":\"\\u0644\\u0648\\u062d\\u0629 \\u062a\\u062d\\u0643\\u0645 l-Cart\",\"content_en\":null,\"logo\":\"\\/uploads\\/images\\/logos\\/l-Cart\\/96336817680.png\",\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"extirnal_code\":null,\"created_by\":1,\"deleted_at\":null,\"created_at\":\"2020-11-17 11:43:34\",\"updated_at\":\"2020-11-17 11:47:08\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:15', '2020-11-17 11:47:15'),
(15, 'dashboard_browse_setting', 'Browse Setting', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:16', '2020-11-17 11:47:16'),
(16, 'dashboard_browse_create_user', 'Brwose Create  User', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:23', '2020-11-17 11:47:23'),
(17, 'dashboard_browse_create_user', 'Brwose Create  User', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:47:29', '2020-11-17 11:47:29'),
(18, 'dashboard_browse_create_user', 'Brwose Create  User', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:48:36', '2020-11-17 11:48:36'),
(19, 'dashboard_create_user', 'Create New User', '{\"fname\":\"amer\",\"lname\":\"muhamed\",\"email\":\"amer@mail.com\",\"city_id\":\"1\",\"phone\":\"123456\",\"updated_at\":\"2020-11-17 11:49:17\",\"created_at\":\"2020-11-17 11:49:17\",\"id\":2}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:49:17', '2020-11-17 11:49:17'),
(20, 'dashboard_browse_create_user', 'Brwose Create  User', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:49:18', '2020-11-17 11:49:18'),
(21, 'dashboard_browse_users_list', 'browse User', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:49:22', '2020-11-17 11:49:22'),
(22, 'dashboard_browse_edit_user', 'Brwose edit  User', '{\"id\":2,\"fname\":\"amer\",\"lname\":\"muhamed\",\"email\":\"amer@mail.com\",\"email_verified_at\":null,\"phone\":\"123456\",\"address\":null,\"lat\":null,\"long\":null,\"city_id\":1,\"gander\":\"male\",\"type_user\":\"user\",\"status\":\"active\",\"suspended_reason\":null,\"deactive_reason\":null,\"image\":\"img\\/avatar.png\",\"deleted_at\":null,\"created_at\":\"2020-11-17 11:49:17\",\"updated_at\":\"2020-11-17 11:49:17\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:54:33', '2020-11-17 11:54:33'),
(23, 'dashboard_user_update', 'update User info', '{\"id\":2,\"fname\":\"amer\",\"lname\":\"muhamed\",\"email\":\"amer@mail.com\",\"email_verified_at\":null,\"phone\":\"123456\",\"address\":null,\"lat\":null,\"long\":null,\"city_id\":1,\"gander\":\"male\",\"type_user\":\"user\",\"status\":\"active\",\"suspended_reason\":null,\"deactive_reason\":null,\"image\":\"img\\/avatar.png\",\"deleted_at\":null,\"created_at\":\"2020-11-17 11:49:17\",\"updated_at\":\"2020-11-17 11:54:49\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:54:49', '2020-11-17 11:54:49'),
(24, 'dashboard_browse_edit_user', 'Brwose edit  User', '{\"id\":2,\"fname\":\"amer\",\"lname\":\"muhamed\",\"email\":\"amer@mail.com\",\"email_verified_at\":null,\"phone\":\"123456\",\"address\":null,\"lat\":null,\"long\":null,\"city_id\":1,\"gander\":\"male\",\"type_user\":\"user\",\"status\":\"active\",\"suspended_reason\":null,\"deactive_reason\":null,\"image\":\"img\\/avatar.png\",\"deleted_at\":null,\"created_at\":\"2020-11-17 11:49:17\",\"updated_at\":\"2020-11-17 11:54:49\"}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:54:50', '2020-11-17 11:54:50'),
(25, 'dashboard_browse_users_list', 'browse User', 'null', 2, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:55:07', '2020-11-17 11:55:07'),
(26, 'dashboard_browse_users_list', 'browse User', 'null', 2, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:56:13', '2020-11-17 11:56:13'),
(27, 'dashboard_browse_users_list', 'browse User', 'null', 2, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:56:41', '2020-11-17 11:56:41'),
(28, 'dashboard_browse_users_list', 'browse User', 'null', 2, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 11:57:53', '2020-11-17 11:57:53'),
(29, 'dashboard_browse_view_create_category', 'Brwose view New Category', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:02:37', '2020-11-17 12:02:37'),
(30, 'dashboard_browse_create_category', 'Brwose Create  New Category', '{\"name_ar\":\"\\u0645\\u0644\\u0627\\u0628\\u0633\",\"name_en\":\"clothes\",\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"parent_id\":null,\"updated_at\":\"2020-11-17 12:09:08\",\"created_at\":\"2020-11-17 12:09:08\",\"id\":1}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:09:08', '2020-11-17 12:09:08'),
(31, 'dashboard_browse_view_create_category', 'Brwose view New Category', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:09:09', '2020-11-17 12:09:09'),
(32, 'dashboard_browse_create_category', 'Brwose Create  New Category', '{\"name_ar\":\"\\u0631\\u064a\\u0627\\u0636\\u0647\",\"name_en\":\"sports\",\"meta_tags\":\"\\u062a\\u0646\\u0634\\u064a\\u0637, \\u0645\\u062d\\u0631\\u0643\\u0627\\u062a, \\u0627\\u0644\\u0628\\u062d\\u062b, \\u0647\\u0646\\u0627,\",\"parent_id\":null,\"updated_at\":\"2020-11-17 12:11:40\",\"created_at\":\"2020-11-17 12:11:40\",\"id\":2}', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:11:40', '2020-11-17 12:11:40'),
(33, 'dashboard_browse_view_create_category', 'Brwose view New Category', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:11:41', '2020-11-17 12:11:41'),
(34, 'dashboard_browse_view_create_category', 'Brwose view New Category', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:11:51', '2020-11-17 12:11:51'),
(35, 'dashboard_browse_view_create_category', 'Brwose view New Category', 'null', 1, '156.207.251.129', 'Windows,Chrome86.0.4240.198', 'Egypt, Cairo, Cairo', '30.0626', '31.2497', 'host-156.207.129.251-static.tedata.net', NULL, '2020-11-17 12:12:28', '2020-11-17 12:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci,
  `extirnal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title_ar`, `title_en`, `content_ar`, `content_en`, `logo`, `meta_tags`, `extirnal_code`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'l-Cart', 'l-Cart', 'لوحة تحكم l-Cart', NULL, '/uploads/images/logos/l-Cart/96336817680.png', 'تنشيط, محركات, البحث, هنا,', NULL, 1, NULL, '2020-11-17 11:43:34', '2020-11-17 11:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `setting_addresses`
--

CREATE TABLE `setting_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_emails`
--

CREATE TABLE `setting_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_mail_provider_infos`
--

CREATE TABLE `setting_mail_provider_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `MAIL_DRIVER` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAIL_HOST` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAIL_port` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAIL_USERNAME` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAIL_PASSWORD` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_phones`
--

CREATE TABLE `setting_phones` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_social_media`
--

CREATE TABLE `setting_social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/icon.png',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting_watsapps`
--

CREATE TABLE `setting_watsapps` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `gander` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_user` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('not_verify','active','suspended','deactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `suspended_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deactive_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/avatar.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `phone`, `address`, `lat`, `long`, `city_id`, `gander`, `type_user`, `status`, `suspended_reason`, `deactive_reason`, `image`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'amr', 'muhamed', 'amrmuhamed9@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'male', 'admin', 'active', NULL, NULL, 'img/avatar.png', '$2y$10$9xlFK6imzv1eYhkE2yCfM.vxA7Rq39kwzIaX5F4ANUViOGZt9zvma', NULL, NULL, '2020-11-17 11:15:54', '2020-11-17 11:15:54'),
(2, 'amer', 'muhamed', 'amer@mail.com', NULL, '123456', NULL, NULL, NULL, 1, 'male', 'user', 'active', NULL, NULL, 'img/avatar.png', '$2y$10$nUyCtH734nlzFjJH/msAOe5hkGepL8uIjgRw6.HgW5m9fDSWSyeKu', 'ImPB90FzSn4YKNCY26tvl1W3QZnmcOvpzWZHEYXQY3IJrvCF6frpVKXd6tBd', NULL, '2020-11-17 11:49:17', '2020-11-17 11:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `waiting_lists_users`
--

CREATE TABLE `waiting_lists_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` int(10) UNSIGNED NOT NULL,
  `status` enum('not_read','read','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('user','company','other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_resources`
--
ALTER TABLE `external_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `external_resources_setting_id_foreign` (`setting_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `settings_created_by_foreign` (`created_by`);

--
-- Indexes for table `setting_addresses`
--
ALTER TABLE `setting_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_addresses_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `setting_emails`
--
ALTER TABLE `setting_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_emails_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `setting_mail_provider_infos`
--
ALTER TABLE `setting_mail_provider_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_mail_provider_infos_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `setting_phones`
--
ALTER TABLE `setting_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_phones_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `setting_social_media`
--
ALTER TABLE `setting_social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_social_media_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `setting_watsapps`
--
ALTER TABLE `setting_watsapps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_watsapps_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_city_id_foreign` (`city_id`);

--
-- Indexes for table `waiting_lists_users`
--
ALTER TABLE `waiting_lists_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `waiting_lists_users_address_foreign` (`address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `external_resources`
--
ALTER TABLE `external_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_addresses`
--
ALTER TABLE `setting_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_emails`
--
ALTER TABLE `setting_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_mail_provider_infos`
--
ALTER TABLE `setting_mail_provider_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_phones`
--
ALTER TABLE `setting_phones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_social_media`
--
ALTER TABLE `setting_social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting_watsapps`
--
ALTER TABLE `setting_watsapps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waiting_lists_users`
--
ALTER TABLE `waiting_lists_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `external_resources`
--
ALTER TABLE `external_resources`
  ADD CONSTRAINT `external_resources_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD CONSTRAINT `product_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `settings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_addresses`
--
ALTER TABLE `setting_addresses`
  ADD CONSTRAINT `setting_addresses_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_emails`
--
ALTER TABLE `setting_emails`
  ADD CONSTRAINT `setting_emails_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_mail_provider_infos`
--
ALTER TABLE `setting_mail_provider_infos`
  ADD CONSTRAINT `setting_mail_provider_infos_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_phones`
--
ALTER TABLE `setting_phones`
  ADD CONSTRAINT `setting_phones_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_social_media`
--
ALTER TABLE `setting_social_media`
  ADD CONSTRAINT `setting_social_media_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_watsapps`
--
ALTER TABLE `setting_watsapps`
  ADD CONSTRAINT `setting_watsapps_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waiting_lists_users`
--
ALTER TABLE `waiting_lists_users`
  ADD CONSTRAINT `waiting_lists_users_address_foreign` FOREIGN KEY (`address`) REFERENCES `cities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
