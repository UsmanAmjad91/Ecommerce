-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 11, 2022 at 09:24 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `email`, `status`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Usman', 'user@user.com', 1, '$2y$10$7zS7PFuoqN9sSU5iRctGR.Xz3tUiSYaYq3OVt7UhNtn.3FmTyn1Rq', '2022-07-23 14:06:15', '2022-07-23 09:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_image` text COLLATE utf8_unicode_ci,
  `brand_status` int DEFAULT NULL,
  `is_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand`, `brand_image`, `brand_status`, `is_home`, `created_at`, `updated_at`) VALUES
(1, 'Zellbury', '1659703944.Mercedes-Benz.png', 1, 1, '2022-07-28 06:13:42', '2022-08-05 07:52:24'),
(2, 'Limelight', '1659702821.audi.png', 1, 0, '2022-07-28 06:17:41', '2022-08-05 07:33:41'),
(3, 'Khaadi', '1659702850.Aston-Martin.png', 1, 1, '2022-07-28 06:17:58', '2022-08-05 07:34:10'),
(4, 'Generation', '1659702861.bentley.png', 1, 0, '2022-07-28 06:18:15', '2022-08-05 07:34:21'),
(5, 'Sana Safinaz', '1659704135.Lotus.png', 1, 0, '2022-07-28 06:18:28', '2022-08-05 07:55:35'),
(6, 'Amazon', '1659702928.Bugatti.png', 1, 1, '2022-07-28 06:21:20', '2022-08-05 07:35:28'),
(7, 'Apple Inc.', '1659704172.Volvo.png', 1, 0, '2022-07-28 06:21:28', '2022-08-05 07:56:12'),
(8, 'Google LLC', '1659702952.chrysler.png', 1, 1, '2022-07-28 06:21:38', '2022-08-05 07:35:52'),
(9, 'Microsoft Corp', '1659702966.Citroen.png', 1, 1, '2022-07-28 06:21:48', '2022-08-05 07:36:06'),
(10, 'Mercedes-Benz', '1659702975.Corvette.png', 1, 1, '2022-07-28 06:22:25', '2022-08-05 07:36:15'),
(11, 'Hewlett-Packards', '1659703007.Dodge.png', 1, 1, '2022-07-28 06:22:35', '2022-08-05 07:36:47'),
(12, 'Gillette', '1659703194.ferrari.png', 1, 1, '2022-07-28 06:22:45', '2022-08-05 07:39:54'),
(13, 'Sony', '1659703346.Fiat.png', 1, 1, '2022-07-28 06:22:58', '2022-08-05 07:42:26'),
(14, 'IBM', '1659703387.ford.png', 1, 0, '2022-07-28 06:23:27', '2022-08-05 07:43:07'),
(15, 'LOUIS VUITTON', '1659703400.Genesis.png', 1, 0, '2022-07-28 06:24:19', '2022-08-05 07:43:20'),
(16, 'GUCCI', '1659703412.GMC.png', 1, 0, '2022-07-28 06:24:31', '2022-08-05 07:43:32'),
(17, 'HERMES', '1659703423.honda.png', 1, 1, '2022-07-28 06:24:43', '2022-08-05 07:43:43'),
(18, 'PRADA', '1659703438.Jaguar.png', 1, 1, '2022-07-28 06:24:53', '2022-08-05 07:43:58'),
(19, 'CHANEL', '1659703453.Infiniti.png', 1, 1, '2022-07-28 06:25:03', '2022-08-05 07:44:13'),
(20, 'RALPH LAUREN', '1659703467.Peugeot.png', 1, 1, '2022-07-28 06:25:14', '2022-08-05 07:44:27'),
(21, 'BURBERRY', '1659703483.porsche.png', 1, 0, '2022-07-28 06:25:27', '2022-08-05 07:44:43'),
(22, 'velit cum', '1659703494.tesla.png', 1, 0, '2022-08-05 03:17:05', '2022-08-05 07:44:54'),
(23, 'Impedit', '1660205188.McLaren.png', 1, 1, '2022-08-11 03:06:28', '2022-08-11 03:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_slug` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_parent_id` int DEFAULT NULL,
  `cat_image` text COLLATE utf8_unicode_ci,
  `status` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_slug`, `cat_parent_id`, `cat_image`, `status`, `is_home`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'man', NULL, '1660112256.session-img.png', '1', 1, '2022-07-24 05:11:09', '2022-08-10 01:17:36'),
(2, 'Women', 'women', NULL, '1660112335.dp.png', '1', 0, '2022-07-24 06:28:47', '2022-08-11 02:55:09'),
(3, 'Children', 'children', NULL, '1660112382.screenshot.png', '1', 0, '2022-07-24 06:30:22', '2022-08-10 01:27:21'),
(4, 'Electronics', 'electronics', NULL, '1660112411.imageBlack.jpg', '0', 1, '2022-07-24 06:33:47', '2022-08-10 01:20:11'),
(5, 'Home Application', 'homeapplication', NULL, '1660112441.imageaesthic.jpg', '1', 1, '2022-07-24 06:35:01', '2022-08-10 01:27:26'),
(6, 'Sports', 'sports', NULL, '1660112979.nokialaptop.jpg', '0', 0, '2022-07-24 07:20:34', '2022-08-10 01:29:39'),
(7, 'Cars', 'cars', NULL, '1660111462.car-img-02.png', '1', 1, '2022-07-24 07:21:46', '2022-08-10 01:33:32'),
(8, 'Moterbikes', 'moterbike', NULL, '1660113279.dell1.jpg', '1', 1, '2022-07-24 07:28:54', '2022-08-10 01:34:39'),
(9, 'Network Modem', 'nwtwork modem', NULL, '1660113295.laptop5.jpg', '0', 1, '2022-07-25 02:32:02', '2022-08-10 01:34:55'),
(10, 'Electric Wire', 'electric wire', NULL, '1660113306.laptop3.png', '1', 0, '2022-07-25 02:32:33', '2022-08-10 01:35:10'),
(11, 'Glass Product', 'glass product', NULL, '1660113415.ph1.jpg', '1', 1, '2022-07-25 02:33:31', '2022-08-10 01:36:55'),
(24, 'Laptop', 'laptop', NULL, '1660113430.ph6.jpg', '1', 1, '2022-07-25 05:46:49', '2022-08-10 01:37:10'),
(25, 'Furniture', 'furniture', NULL, '1660113461.product8.jpg', '1', 1, '2022-07-25 05:50:43', '2022-08-10 01:37:41'),
(26, 'Microwave Oven', 'microwaveoven', NULL, '1660113632.product8.jpg', '0', 0, '2022-07-25 05:51:25', '2022-08-10 01:40:32'),
(27, 'Kids', 'kids', NULL, '1660113759.lcd5.jpg', '1', 0, '2022-07-25 06:01:09', '2022-08-10 01:42:39'),
(28, 'Perfume', 'perfume', NULL, '1660113769.lcd2.jpg', '1', 1, '2022-07-25 07:34:50', '2022-08-10 01:42:49'),
(29, 'Supreme', 'supreme', NULL, '1660113783.lcd4.jpg', '0', 1, '2022-07-26 05:54:17', '2022-08-10 01:43:09'),
(30, 'Electric Pumps', 'electricpumps', NULL, '1660113820.lcd1.jpg', '1', 0, '2022-07-26 06:03:31', '2022-08-10 01:43:40'),
(31, 'Eagan Brewer', 'eagan brewer', 4, '1660107493.img4.png', '1', 1, '2022-08-09 23:58:13', '2022-08-09 23:58:13'),
(32, 'Kaye Macias', 'Kaye Macias', NULL, '1660113993.lcd3.jpg', '1', 0, '2022-08-10 01:08:39', '2022-08-10 01:46:33'),
(33, 'Simon Griffith', 'Tempor Nam quae aut', 25, '1660202314.img.jpg', '0', 1, '2022-08-11 02:18:34', '2022-08-11 02:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `color_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `color` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_status` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`color_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color`, `color_status`, `created_at`, `updated_at`) VALUES
(1, 'Red', '1', '2022-07-27 23:04:25', '2022-07-27 23:31:50'),
(2, 'Blue', '1', '2022-07-27 23:06:04', '2022-07-27 23:06:04'),
(3, 'Green', '1', '2022-07-27 23:07:34', '2022-07-27 23:07:34'),
(4, 'Yellow', '1', '2022-07-27 23:07:56', '2022-07-27 23:07:56'),
(5, 'Pink', '1', '2022-07-27 23:08:13', '2022-07-27 23:08:13'),
(6, 'Purpal', '1', '2022-07-27 23:08:29', '2022-07-27 23:08:29'),
(7, 'Orange', '1', '2022-07-27 23:08:50', '2022-07-27 23:08:50'),
(8, 'Black', '1', '2022-07-27 23:09:05', '2022-07-27 23:09:05'),
(9, 'White', '1', '2022-07-27 23:09:18', '2022-07-27 23:09:18'),
(10, 'Teal', '1', '2022-07-27 23:10:35', '2022-07-27 23:10:35'),
(11, 'Aqua', '1', '2022-07-27 23:10:55', '2022-07-27 23:10:55'),
(12, 'Chocolate', '1', '2022-07-27 23:11:32', '2022-07-27 23:11:32'),
(14, 'Gold', '1', '2022-07-27 23:32:24', '2022-07-27 23:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon_title` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('Value','Per') COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_order_amount` int DEFAULT NULL,
  `is_one_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_title`, `coupon_code`, `coupon_value`, `type`, `min_order_amount`, `is_one_time`, `coupon_status`, `created_at`, `updated_at`) VALUES
(1, 'Dpower', 'dp554', '5145', 'Per', 750, 'Yes', 1, '2022-07-26 02:13:46', '2022-08-06 11:43:10'),
(2, 'Bday', 'BD154', '4845', 'Value', 1500, 'No', 0, '2022-07-26 02:37:16', '2022-07-26 09:28:45'),
(3, 'btmy', 'bt552', '2156', 'Value', 200, 'No', 1, '2022-07-26 05:09:11', '2022-07-27 00:18:50'),
(4, 'Friday', 'fr741', '2445', 'Per', 2000, 'Yes', 0, '2022-07-26 09:23:57', '2022-07-27 00:19:15'),
(5, 'Sunday', 'SN874', '2548', 'Per', 1200, 'Yes', 1, '2022-07-26 09:24:49', '2022-07-26 09:24:49'),
(6, 'Maia Bright', 'Nemo veritatis tempo', '21', 'Value', 1000, 'Yes', 1, '2022-08-06 11:23:36', '2022-08-06 11:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gstin` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `password`, `mobile`, `address`, `country`, `city`, `state`, `zip`, `company`, `gstin`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Usman', 'usman@usman.com', '123456789', '92123456789', 'Sahiwal', 'Pakistan', 'sahiwal', 'Punjab', '57000', 'us state', '91us', 1, '2022-08-10 13:39:55', '2022-08-10 13:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_07_22_074629_create_admins_table', 1),
(3, '2022_07_23_105526_create_categories_table', 2),
(4, '2022_07_26_054702_create_coupons_table', 3),
(5, '2022_07_27_060435_create_sizes_table', 4),
(6, '2022_07_28_030542_create_colors_table', 5),
(7, '2022_07_28_070132_create_products_table', 6),
(8, '2022_07_28_091334_create_brands_table', 7),
(9, '2022_07_28_091903_create_myears_table', 7),
(10, '2022_07_30_134407_create_productattrs_table', 8),
(11, '2022_08_10_072105_create_taxes_table', 9),
(12, '2022_08_10_132513_create_customers_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `myears`
--

DROP TABLE IF EXISTS `myears`;
CREATE TABLE IF NOT EXISTS `myears` (
  `model_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `year_status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `myears`
--

INSERT INTO `myears` (`model_id`, `year`, `year_status`, `created_at`, `updated_at`) VALUES
(1, '2000', 1, '2022-07-28 06:38:48', '2022-07-28 06:38:48'),
(2, '2001', 1, '2022-07-28 06:39:24', '2022-07-28 06:39:24'),
(3, '2002', 1, '2022-07-28 06:39:49', '2022-07-28 06:39:49'),
(4, '2003', 1, '2022-07-28 06:39:53', '2022-07-28 06:39:53'),
(5, '2004', 1, '2022-07-28 06:39:57', '2022-07-28 06:39:57'),
(6, '2005', 1, '2022-07-28 06:40:02', '2022-07-28 06:40:02'),
(7, '2006', 1, '2022-07-28 06:40:06', '2022-07-28 06:40:06'),
(8, '2007', 1, '2022-07-28 06:40:10', '2022-07-28 06:40:10'),
(9, '2008', 1, '2022-07-28 06:40:14', '2022-07-28 06:40:14'),
(10, '2009', 1, '2022-07-28 06:40:22', '2022-07-28 06:40:22'),
(11, '2010', 1, '2022-07-28 06:40:27', '2022-07-28 06:40:27'),
(12, '2011', 1, '2022-07-28 06:40:32', '2022-07-28 06:40:32'),
(13, '2012', 1, '2022-07-28 06:40:37', '2022-07-28 06:40:37'),
(14, '2013', 1, '2022-07-28 06:40:43', '2022-07-28 06:40:43'),
(15, '2014', 1, '2022-07-28 06:40:47', '2022-07-28 06:40:47'),
(16, '2015', 1, '2022-07-28 06:40:51', '2022-07-28 06:40:51'),
(17, '2016', 1, '2022-07-28 06:40:58', '2022-07-28 06:40:58'),
(18, '2017', 1, '2022-07-28 06:41:04', '2022-07-28 06:41:04'),
(19, '2018', 1, '2022-07-28 06:41:09', '2022-07-28 06:41:09'),
(20, '2019', 1, '2022-07-28 06:41:17', '2022-07-28 06:41:17'),
(21, '2020', 1, '2022-07-28 06:41:26', '2022-07-28 06:41:26'),
(22, '2021', 1, '2022-07-28 06:41:30', '2022-07-28 06:41:30'),
(23, '2022', 1, '2022-07-28 06:41:34', '2022-07-28 06:41:34'),
(24, '2023', 1, '2022-07-28 06:41:40', '2022-07-28 06:41:40'),
(25, '2024', 1, '2022-07-28 06:41:44', '2022-07-28 06:41:44'),
(26, '2025', 1, '2022-07-28 06:41:51', '2022-07-28 06:45:22'),
(27, '2026', 1, '2022-07-28 06:42:06', '2022-07-28 06:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productattrs`
--

DROP TABLE IF EXISTS `productattrs`;
CREATE TABLE IF NOT EXISTS `productattrs` (
  `patrr_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` int NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` int NOT NULL,
  `mrp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageatrr` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `qty` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patrr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productattrs`
--

INSERT INTO `productattrs` (`patrr_id`, `products_id`, `name`, `sku`, `mrp`, `imageatrr`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dolorem in numquam n', 6666, 'Aperiaml', '1659431312-.microsoftlaptop.jpg', 51756, 2392, '2022-08-02 09:08:32', '2022-08-02 09:08:32'),
(2, 2, 'Aliquip nostrud in i', 96, 'Aliquip sunt dicta', '1659431385-.microsoftlaptop.jpg', 150, 287, '2022-08-02 09:09:45', '2022-08-02 09:09:45'),
(3, 3, 'Iste omnis sequi dol', 16, 'Id quo blanditiis od', '1659431513-.lcd1.jpg', 200, 470, '2022-08-02 09:11:53', '2022-08-02 09:11:53'),
(4, 4, 'Molestiae magnam quo', 46, 'Delectus deleniti s', '1659431552-.lcd3.jpg', 241, 387, '2022-08-02 09:12:32', '2022-08-02 09:12:32'),
(5, 5, 'Impedit nihil sint', 62, 'Sed ad ratione excep', '1659431590-.tab1.jpg', 484, 352, '2022-08-02 09:13:10', '2022-08-02 09:13:10'),
(6, 6, 'Cupiditate ut quo su', 25, 'Voluptatum incididun', '1659431627-.tab5.jpg', 814, 379, '2022-08-02 09:13:47', '2022-08-02 09:13:47'),
(7, 7, 'Natus at omnis nobis', 33, 'Qui assumenda tempor', '1659431667-.pc3.jpg', 45, 602, '2022-08-02 09:14:27', '2022-08-02 09:14:27'),
(8, 8, 'Cum deserunt occaeca', 1, 'Consectetur molestia', '1659431710-.pc4.jpg', 876, 260, '2022-08-02 09:15:10', '2022-08-02 09:15:10'),
(9, 9, 'Dolorem eligendi lab', 55, 'Dolores autem sunt f', '1659431747-.ph6.jpg', 128, 121, '2022-08-02 09:15:47', '2022-08-02 09:15:47'),
(17, 17, 'Aut commodi vero lab', 63, 'Totam omnis voluptat', '1659682320-.Mustang.png', 215, 585, '2022-08-05 06:52:00', '2022-08-05 06:52:00'),
(11, 11, 'Est ut totam aut cu', 26, 'Voluptates in volupt', '1659431816-.ph2.jpg', 571, 402, '2022-08-02 09:16:56', '2022-08-02 09:16:56'),
(12, 12, 'Et cum mollit dolore', 86, 'Fuga Omnis dicta co', '1659431853-.laptop5.jpg', 887, 122, '2022-08-02 09:17:33', '2022-08-02 09:17:33'),
(16, 16, 'Sed aliqua Velit v', 88, 'Explicabo Esse atq', '1659682280-.car-img-01.png', 487, 700, '2022-08-05 06:51:20', '2022-08-05 06:51:20'),
(14, 14, 'Pariatur Architecto', 52, 'Enim delectus est p', '1659431947-.listing_img3.jpg', 68, 980, '2022-08-02 09:19:07', '2022-08-02 09:19:07'),
(18, 18, 'Tenetur quaerat volu', 34, 'Quia a culpa nisi ni', '1659682359-.porsche.png', 815, 149, '2022-08-05 06:52:39', '2022-08-05 06:52:39'),
(19, 19, 'Pariatur A amet ex', 37, 'Enim illo obcaecati', '1659788037-.dp.png', 821, 811, '2022-08-06 12:13:57', '2022-08-06 12:13:57'),
(20, 20, 'Quia voluptatem Odi', 45, 'Ut in optio et nequ', '1659788743-.product7-1.jpg', 473, 733, '2022-08-06 12:25:43', '2022-08-06 12:25:43'),
(21, 21, 'Repudiandae voluptat', 23, 'Nisi vel ea dolorem', '1659789601-.product8.jpg', 841, 985, '2022-08-06 12:40:01', '2022-08-06 12:40:01'),
(22, 22, 'Odio molestias vitae', 78, 'Quia est similique', '1660123308-.img.jpg', 243, 221, '2022-08-10 09:21:48', '2022-08-10 09:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` int DEFAULT NULL,
  `color` int DEFAULT NULL,
  `coupon` int DEFAULT NULL,
  `size` int DEFAULT NULL,
  `product_name` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_slug` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand` int DEFAULT NULL,
  `model` int DEFAULT NULL,
  `short_desc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `desc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `keywords` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `technical_specification` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `uses` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `warranty` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image1` text COLLATE utf8_unicode_ci,
  `image2` text COLLATE utf8_unicode_ci,
  `image3` text COLLATE utf8_unicode_ci,
  `image4` text COLLATE utf8_unicode_ci,
  `lead_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_promo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_featured` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_discounted` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_tranding` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_slug` (`product_slug`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `color`, `coupon`, `size`, `product_name`, `product_slug`, `brand`, `model`, `short_desc`, `desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `image1`, `image2`, `image3`, `image4`, `lead_time`, `tax`, `tax_type`, `is_promo`, `is_featured`, `is_discounted`, `is_tranding`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 4, 5, 'Dolorem', 'Dolores voluptatem', 1, 15, 'Labore quia deserunt', 'Qui harum esse dolorm\r\nrkevrlk klev lklrtm', 'Architecto nulla quo', 'Quia magnam possimus\r\nrkvmrre mrvkevlm', 'Debitis repudiandae', 'Ut', '1659683448.Kia.png', '1659683448.Rolls-Royce.png', '1659683448.Volvo.png', '1659683448.Citroen.png', '2ff', '24', '1', 'ON', 'OFF', 'OFF', 'OFF', 1, '2022-08-02 04:08:32', '2022-08-02 04:11:03'),
(2, 2, 5, 4, 5, 'Aliquip', 'Officia ut deserunt', 1, 15, 'Placeat iure assume', 'Sit ea dolorem duis\r\nnjhgfytfuyh yugytftfghg7 ytfu', 'Et sint blanditiis p', 'Quibusdam suscipit e hyfuy\r\nhgftrdty f vtyfrd 6fyu', 'Molestiae fugiat du', 'Atque', '1659685083.Jaguar.png', '1659512897.jpg', '1659431385.dell2.jpg', '1659685083.Acura.png', '2-7 days', '20%', '4', 'OFF', 'OFF', 'ON', 'ON', 1, '2022-08-02 04:09:45', '2022-08-02 04:10:48'),
(3, 28, 11, 5, 1, 'Iste omnis sequi dol', 'Ex atque elit et et', 10, 20, 'Tempor non non labor', 'Deserunt nihil maxim', 'Ipsum ea voluptate r', 'In in aute eos labor', 'Rerum temporibus quo', 'Ut autem dicta commo', '1659431513.lcd1.jpg', '1659431513.lcd3.jpg', '1659431513.lcd5.jpg', '1659431513.lcd7.jpg', '3 feb', '17', '5', 'OFF', 'ON', 'OFF', 'ON', 0, '2022-08-02 04:11:53', '2022-08-02 04:11:53'),
(4, 4, 12, 5, 7, 'Molestiae magnam quo', 'Eaque ex exercitatio', 3, 8, 'Aliquam architecto l', 'Dolor id in aut et', 'Non commodo quia sus', 'Maxime amet corrupt', 'Commodi ullam consec', 'Ea omnis impedit su', '1659431552.lcd1.jpg', '1659431552.lcd2.jpg', '1659431552.lcd4.jpg', '1659431552.lcd1.jpg', '2-3 days', '15%', '2', 'OFF', 'OFF', 'ON', 'ON', 1, '2022-08-02 04:12:32', '2022-08-02 04:12:32'),
(5, 27, 4, 1, 3, 'Impedit nihil sint', 'Provident culpa la', 2, 23, 'Libero exercitation', 'Velit velit maiores', 'Quis perferendis sit', 'Temporibus cumque an', 'Dolor accusantium es', 'Temporibus non asper', '1659431590.tab3.jpg', '1659431590.tab4.jpg', '1659431590.tab5.jpg', '1659431590.tab6.jpg', '4 jan', '20', '4', 'OFF', 'ON', 'ON', 'ON', 1, '2022-08-02 04:13:10', '2022-08-02 04:13:10'),
(6, 8, 1, 1, 6, 'Cupiditate ut quo su', 'Incidunt soluta opt', 9, 22, 'Dolores et dolore se', 'Quis eiusmod amet a', 'Aute omnis duis impe', 'Et molestias eveniet', 'Sunt eiusmod omnis s', 'Consectetur nesciun', '1659431627.tab5.jpg', '1659431627.tab3.jpg', '1659431627.tab2.jpg', '1659431627.tab1.jpg', '7 july', '12', '2', 'OFF', 'OFF', 'OFF', 'OFF', 1, '2022-08-02 04:13:47', '2022-08-02 04:13:47'),
(7, 5, 11, 2, 9, 'Natus at omnis nobis', 'Sed quia dolorum pro', 21, 26, 'Culpa nulla dolore i', 'Earum et sed nobis d', 'Quia facere reprehen', 'Saepe expedita aut e', 'Aperiam vel magna vo', 'Autem nihil ea tempo', '1659431667.pc4.jpg', '1659431667.pc4.jpg', '1659431667.pc5.jpg', '1659431667.pc6.png', '2-5 days', '10%', '3', 'OFF', 'ON', 'OFF', 'ON', 1, '2022-08-02 04:14:27', '2022-08-02 04:14:27'),
(8, 9, 2, 4, 2, 'Cum deserunt occaeca', 'Nobis aut maiores li', 19, 9, 'Eligendi voluptas ni', 'Impedit consequatur', 'Perferendis reprehen', 'Laboris mollitia in', 'Dolor consequat Sol', 'Sunt omnis odit pra', '1659431710.pc5.jpg', '1659431710.pc3.jpg', '1659431710.pc2.jpg', '1659431710.pc1.jpg', '9 dec', '25', '5', 'ON', 'OFF', 'OFF', 'ON', 0, '2022-08-02 04:15:10', '2022-08-02 04:15:10'),
(9, 27, 8, 5, 4, 'Dolorem eligendi lab', 'Eius id fugit sit', 19, 3, 'Voluptatem Cumque t', 'Voluptas voluptas eu', 'Esse veniam blandit', 'Nobis dolor est et', 'Magni culpa eveniet', 'Enim id quas ut volu', '1659431747.ph7.jpg', '1659431747.ph8.jpg', '1659431747.vivo1.jpg', '1659431747.vivo2.jpg', '5 oct', '24', '2', 'ON', 'ON', 'OFF', 'OFF', 0, '2022-08-02 04:15:47', '2022-08-02 04:15:47'),
(17, 7, 8, 3, 5, 'Aut commodi vero lab', 'Atque quia earum mol', 1, 3, 'Quo lorem earum vel', 'Incidunt architecto', 'Quis ea in accusamus', 'Aliquid commodo et a', 'Cum et do quo sit n', 'Harum debitis sapien', '1659682320.Mazda.png', '1659682320.ferrari.png', '1659682320.Lotus.png', '1659682320.Bugatti.png', '7 days', '14%', '2', 'OFF', 'OFF', 'ON', 'ON', 1, '2022-08-05 01:52:00', '2022-08-05 01:52:00'),
(11, 9, 11, 3, 11, 'Est ut totam aut cu', 'In placeat mollitia', 18, 14, 'Et laborum quo anim', 'Rerum nulla pariatur', 'Enim laborum Quod t', 'Enim ea totam ut vol', 'Odit aut molestiae a', 'Dolore odio laborios', '1659431816.ph8.jpg', '1659431816.ph1.jpg', '1659431816.ph5.jpg', '1659431816.ph4.jpg', '20 june', '10', '4', 'ON', 'OFF', 'ON', 'OFF', 0, '2022-08-02 04:16:56', '2022-08-02 04:16:56'),
(12, 29, 6, 4, 1, 'Et cum mollit dolore', 'Dicta rerum aut quis', 17, 1, 'Minima totam volupta', 'Dolore est ipsa har', 'Beatae et voluptate', 'Explicabo Magnam si', 'Officia provident c', 'Optio nostrum digni', '1659431853.nokialaptop.jpg', '1659431853.microsoftlaptop.jpg', '1659431853.dell6.jpg', '1659431853.applelaptop.jpg', '14 aug', '5', '1', 'OFF', 'OFF', 'ON', 'OFF', 0, '2022-08-02 04:17:33', '2022-08-02 04:17:33'),
(16, 28, 9, 1, 4, 'Sed aliqua Velit v', 'Tempora velit verita', 7, 12, 'Consequuntur sed eum', 'Animi quos doloribu', 'Consectetur iusto au', 'Molestiae adipisci q', 'Est ut quisquam qui', 'Quaerat possimus ve', '1659682280.banner-image-2.jpg', '1659682280.recent-car-3.jpg', '1659682280.post_200x200_4.jpg', '1659682280.post_200x200_1.jpg', '1 nov', '16', '2', 'OFF', 'ON', 'OFF', 'ON', 1, '2022-08-05 01:51:20', '2022-08-05 01:51:20'),
(14, 1, 6, 2, 10, 'Pariatur Architecto', 'Commodo quia eligend', 16, 18, 'Non rerum qui conseq', 'Dolore porro unde qu', 'Saepe pariatur Ulla', 'Voluptas alias eius', 'Reprehenderit dolor', 'Debitis aperiam est', '1659431947.listing_img4.jpg', '1659431947.featured-img-2.jpg', '1659431947.banner-image-1.jpg', '1659431947.about_us_img1.jpg', '10 may', '18', '2', 'OFF', 'ON', 'OFF', 'ON', 0, '2022-08-02 04:19:07', '2022-08-02 04:19:07'),
(18, 29, 1, 3, 3, 'Tenetur quaerat volu', 'Enim ipsum sed assu', 7, 17, 'Recusandae Quisquam', 'Cillum reprehenderit', 'Ea iusto dolorem ab', 'Sint velit non rem s', 'Id ab tenetur incidi', 'Ea id excepteur in d', '1659682359.Acura.png', '1659682359.Corvette.png', '1659682359.chrysler.png', '1659682359.tesla.png', '18 dec', '13', '3', 'OFF', 'ON', 'OFF', 'ON', 1, '2022-08-05 01:52:39', '2022-08-05 01:52:39'),
(19, 29, 6, 4, 1, 'Pariatur A amet ex', 'Maxime vel totam ass', 4, 17, 'Aliqua Doloribus om', '<p>the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Adipisci sit qui nes', '<p>the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Non aliqua Est obca', 'Unde fuga Voluptas', '1659788037.imagehd.jpg', '1659788037.img5.png', '1659788037.img4.png', '1659788037.imageBlack.jpg', 'Deserunt earum nostr', '14', '5', 'OFF', 'ON', 'OFF', 'ON', 0, '2022-08-06 07:13:57', '2022-08-06 07:13:57'),
(20, 3, 12, 2, 11, 'Quia voluptatem Odi', 'Debitis laudantium', 12, 10, 'Est veritatis repreh', '', 'Sequi sed irure qui', '', 'Sequi laboris quis i', 'Eum aliquid reiciend', '1659788743.product2-1.jpg', '1659788743.product3.jpg', '1659788743.product4.jpg', '1659788743.product10-1.jpg', 'Molestias voluptatib', 'Nulla tempor enim re', '4', 'OFF', 'ON', 'OFF', 'ON', 1, '2022-08-06 07:25:43', '2022-08-06 07:25:43'),
(21, 4, 9, 1, 4, 'Repudiandae voluptat', 'Illum incididunt re', 19, 8, 'Vel et modi blanditi', 'You can try to fix html code before saving it to database, file etc. using regular expressions, for example in PHP', 'In laudantium commo', 'ou can try to fix html code before saving it to database, file etc. using regular expressions, for example in PHP', 'Duis illo quod id e', 'Consequatur Ex eu v', '1659789601.product7-1.jpg', '1659789601.product8.jpg', '1659789601.product3-1.jpg', '1659789601.70x84.jpg', 'Nemo commodo dolore', 'Ipsam ex ipsa numqu', '1', 'OFF', 'ON', 'OFF', 'ON', 0, '2022-08-06 07:40:01', '2022-08-06 07:40:01'),
(22, 28, 7, 3, 10, 'Odio molestias vitae', 'Sint rerum aliquip', 4, 16, 'Accusamus qui maxime', '', 'Incididunt natus sin', '', 'Fugit est esse alia', 'Consequat Aspernatu', '1660123308.img6.png', '1660123308.img5.png', '1660123308.img4.png', '1660123308.imageaesthic.jpg', 'Magni ipsum aut quos', '5', '3', 'ON', 'OFF', 'OFF', 'ON', 1, '2022-08-10 04:21:48', '2022-08-10 04:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `size_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `size` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `size_status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size`, `size_status`, `created_at`, `updated_at`) VALUES
(1, 'XL', 1, '2022-07-27 07:09:44', '2022-07-27 07:09:44'),
(2, 'S', 1, '2022-07-27 02:47:27', '2022-07-27 02:47:27'),
(3, 'M', 1, '2022-07-27 02:47:44', '2022-07-27 02:47:44'),
(4, 'L', 1, '2022-07-27 02:48:05', '2022-07-27 02:48:05'),
(5, 'XL', 0, '2022-07-27 02:48:20', '2022-07-27 03:25:22'),
(6, 'XXL', 1, '2022-07-27 02:48:54', '2022-07-27 02:48:54'),
(7, 'XXXL', 1, '2022-07-27 02:49:06', '2022-07-27 02:49:06'),
(8, 'S', 0, '2022-07-27 02:49:29', '2022-07-27 02:49:29'),
(9, 'M', 0, '2022-07-27 02:49:43', '2022-07-27 02:49:43'),
(10, 'L', 0, '2022-07-27 02:49:58', '2022-07-27 02:49:58'),
(11, 'XXL', 0, '2022-07-27 02:51:26', '2022-07-27 02:51:26'),
(13, 'XXXL', 0, '2022-07-27 03:36:46', '2022-07-27 03:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `tax_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tax_desc` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_value` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tax_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`tax_id`, `tax_desc`, `tax_value`, `tax_status`, `created_at`, `updated_at`) VALUES
(1, 'GST TAX', '25%', 1, '2022-08-10 03:22:24', '2022-08-10 03:53:24'),
(2, 'With holding', '15%', 1, '2022-08-10 03:53:52', '2022-08-10 03:53:52'),
(3, 'Govt Tax', '10%', 1, '2022-08-10 03:54:19', '2022-08-10 03:54:19'),
(4, 'Property  Tax', '2%', 1, '2022-08-10 03:54:48', '2022-08-10 03:54:48'),
(5, 'Zukaat Tax', '5%', 1, '2022-08-10 03:55:12', '2022-08-10 03:55:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
