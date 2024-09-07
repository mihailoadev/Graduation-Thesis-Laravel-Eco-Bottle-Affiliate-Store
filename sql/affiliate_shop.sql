-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 06:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `affiliate_shop`
--
CREATE DATABASE IF NOT EXISTS `affiliate_shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `affiliate_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_SuperAdmin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: No, 1: Yes',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `is_SuperAdmin`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@email.com', NULL, 1, 1, '2024-07-25 14:21:03', '$2y$12$mfi7/hrum1cIcmSdpEfobOkXlVkP9sAq9cXjFcueF4WLAl5.00Z6m', 'kUI71Km8Kj', NULL, NULL),
(2, 'Moderator', 'moderator@email.com', NULL, 0, 1, '2024-07-25 14:21:03', '$2y$12$qbDzHviu1VRDWGJC.D9/COEg2pzeJGN0Q8EpSODQ/EqxVwoNMm0Wa', '7nvsQmeie1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `affiliates`
--

CREATE TABLE IF NOT EXISTS `affiliates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `affiliates_user_id_foreign` (`user_id`),
  KEY `affiliates_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliates`
--

INSERT INTO `affiliates` (`id`, `user_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(2, 2, 1, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(3, 3, 1, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(4, 4, 3, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(5, 5, 2, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(6, 6, 5, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(7, 7, 4, '2024-07-25 14:21:04', '2024-07-25 14:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_percentages`
--

CREATE TABLE IF NOT EXISTS `commission_percentages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_level` varchar(255) NOT NULL,
  `commission_percentage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commission_percentages`
--

INSERT INTO `commission_percentages` (`id`, `parent_level`, `commission_percentage`, `created_at`, `updated_at`) VALUES
(1, '1', '5', NULL, NULL),
(2, '2', '3', NULL, NULL),
(3, '3', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_01_172641_create_password_resets_table', 1),
(6, '2024_07_01_172804_create_admins_table', 1),
(7, '2024_07_01_172854_add_image_to_users_table', 1),
(8, '2024_07_01_172910_add_image_to_admins_table', 1),
(9, '2024_07_01_172929_create_affiliates_table', 1),
(10, '2024_07_01_172942_create_products_table', 1),
(11, '2024_07_01_172953_create_carts_table', 1),
(12, '2024_07_01_173003_create_orders_table', 1),
(13, '2024_07_01_173016_create_order_items_table', 1),
(14, '2024_07_01_173047_create_commission_percentages_table', 1),
(15, '2024_07_01_173110_create_user_earnings_table', 1),
(16, '2024_07_01_173130_create_user_commissions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:processing, 1:in transit, 2:delivered , 3:declined',
  `total` decimal(20,6) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(20,6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(20,6) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_description` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `reviews` int(11) NOT NULL DEFAULT 5,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `description`, `price`, `image`, `reviews`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'EcoBottle | Fire Red (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1716129350.Bottle - Fire Red.jpg', 5, 'ecobottle-fire-red-500ml--1719956145', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(2, 'EcoBottle | Forest Green (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430752.Bottle - Forest Green.jpg', 5, 'ecobottle-forest-green-500ml--1719742568', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(3, 'EcoBottle | Obsidian Black (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430805.Bottle - Obsidian Black.jpg', 5, 'ecobottle-obsidian-black-500ml--1712430805', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(4, 'EcoBottle | Ocean Blue (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430861.Bottle - Ocean Blue.jpg', 5, 'ecobottle-ocean-blue-500ml--1712430861', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(5, 'EcoBottle | Rock Grey (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430922.Bottle - Rock Grey.jpg', 5, 'ecobottle-rock-grey-500ml--1712430922', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(6, 'EcoBottle | Sky Blue (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430966.Bottle - Sky Blue.jpg', 5, 'ecobottle-sky-blue-500ml--1712430966', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(7, 'EcoBottle | Sunshine Orange (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1712430999.Bottle - Sunshine Orange.jpg', 5, 'ecobottle-sunshine-orange-500ml--1712430999', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(8, 'Eco Bottle | Orchid Purple (500ml)', 'This bottle stops 1000 plastic bottles from entering the ocean.', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every original EcoBottle funds the collection of 1000 ocean bound plastic bottles.', '35', '1719744753.1712430752.Bottle - Orchid Purple.jpg', 5, 'eco-bottle-orchid-purple-500ml--1719744796', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(9, 'Brew Flask | Obsidian Black (350ml)', 'Twist and sip. This 350ml flask features a 360° lid designed with hot drinks in mind ☕️', 'The Brew Flask’s top tech specs make it a front runner in the reusable Flask category. Designed to deliver on an unbeatable drinking experience on the go, the 360º leak proof lid allows you to sip from any angle, with an aromadome design that funnels the flow of the flavour to elevate the experience further. The 360 lockable lid means you can keep your Brew in your bag with the assurance that it won’t leak. Our Brew Flasks are made from 90% recycled stainless steel, double wall vacuum-insulated recycled materials and are 100% dishwasher safe – all while helping to save the ocean, every Brew funds the collection of 1000 ocean bound plastic bottles.', '40', '1719746031.Brew Flask Obsidian Black (350ml).jpg', 5, 'brew-flask-obsidian-black-350ml--1719746031', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(10, 'Brew Flask | Sky Blue (350ml)', 'Twist and sip. This 350ml flask features a 360° lid designed with hot drinks in mind ☕️', 'The Brew Flask’s top tech specs make it a front runner in the reusable Flask category. Designed to deliver on an unbeatable drinking experience on the go, the 360º leak proof lid allows you to sip from any angle, with an aromadome design that funnels the flow of the flavour to elevate the experience further. The 360 lockable lid means you can keep your Brew in your bag with the assurance that it won’t leak. Our Brew Flasks are made from 90% recycled stainless steel, double wall vacuum-insulated recycled materials and are 100% dishwasher safe – all while helping to save the ocean, every Brew funds the collection of 1000 ocean bound plastic bottles.', '40', '1719746100.Brew Flask Sky Blue (350ml).jpg', 5, 'brew-flask-sky-blue-350ml--1719746100', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(16, 'Brew Flask | Ocean Blue (350ml)', 'Twist and sip. This 350ml flask features a 360° lid designed with hot drinks in mind ☕️', 'The Brew Flask’s top tech specs make it a front runner in the reusable Flask category. Designed to deliver on an unbeatable drinking experience on the go, the 360º leak proof lid allows you to sip from any angle, with an aromadome design that funnels the flow of the flavour to elevate the experience further. The 360 lockable lid means you can keep your Brew in your bag with the assurance that it won’t leak. Our Brew Flasks are made from 90% recycled stainless steel, double wall vacuum-insulated recycled materials and are 100% dishwasher safe – all while helping to save the ocean, every Brew funds the collection of 1000 ocean bound plastic bottles.', '40', '1719746151.Brew Flask Ocean Blue (350ml).jpg', 5, 'brew-flask-ocean-blue-350ml--1719746151', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(17, 'Brew Flask | Rock Grey (350ml)', 'Twist and sip. This 350ml flask features a 360° lid designed with hot drinks in mind ☕️', 'The Brew Flask’s top tech specs make it a front runner in the reusable Flask category. Designed to deliver on an unbeatable drinking experience on the go, the 360º leak proof lid allows you to sip from any angle, with an aromadome design that funnels the flow of the flavour to elevate the experience further. The 360 lockable lid means you can keep your Brew in your bag with the assurance that it won’t leak. Our Brew Flasks are made from 90% recycled stainless steel, double wall vacuum-insulated recycled materials and are 100% dishwasher safe – all while helping to save the ocean, every Brew funds the collection of 1000 ocean bound plastic bottles.', '40', '1719746183.Brew Flask Rock Grey (350ml).jpg', 5, 'brew-flask-rock-grey-350ml--1719746183', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(18, 'GO Bottle | Obsidian Black (500ml)', 'Flip, sip and go. The EcoBottle that\'s made for you on the move 🏃', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every EcoBottle GO funds the collection of 1000 ocean bound plastic bottles.', '38', '1719746756.GO Bottle Obsidian Black.jpg', 5, 'go-bottle-obsidian-black-500ml--1719746820', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(19, 'GO Bottle | Ocean Blue (500ml)', 'Flip, sip and go. The EcoBottle that\'s made for you on the move 🏃', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every EcoBottle GO funds the collection of 1000 ocean bound plastic bottles.', '38', '1719746804.GO Bottle Ocean Blue.jpg', 5, 'go-bottle-ocean-blue-500ml--1719746804', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(20, 'GO Bottle | Forest Green (500ml)', 'Flip, sip and go. The EcoBottle that\'s made for you on the move 🏃', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every EcoBottle GO funds the collection of 1000 ocean bound plastic bottles.', '38', '1719746879.GO Bottle Forest Green.jpg', 5, 'go-bottle-forest-green-500ml--1719746879', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(23, 'GO Bottle | Sky Blue (500ml)', 'Flip, sip and go. The EcoBottle that\'s made for you on the move 🏃', 'The double wall insulation keeps your cold drinks cold and your hot drinks hot. Designed with a dual opening function the leak proof lid gives you the option to sip from the spout and the base and provides easy access for filling, cleaning and adding ice. Our bottles are made from 90% recycled stainless steel and recycled materials and are 100% dishwasher safe - all while helping to save the ocean, every EcoBottle GO funds the collection of 1000 ocean bound plastic bottles.', '38', '1719746910.GO Bottle Sky Blue.jpg', 5, 'go-bottle-sky-blue-500ml--1719746910', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(24, 'GO Lid | Obsidian Black', 'Customise your current GO or add a GO lid to your OG! Compatible with the 500ml Original EcoBottle & GO Bottle.', 'Flip, Sip and GO! Featuring a flip-lid with built in silicone straw and split-control spout. Life on the GO never looked so good. Compatible with the 500ml EcoBottle.', '10', '1719747314.GO Lid Obsdian Black.jpg', 5, 'go-lid-obsdian-black-1719747314', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(25, 'GO Lid | Ocean Blue', 'Customise your current GO or add a GO lid to your OG! Compatible with the 500ml Original EcoBottle & GO Bottle.', 'Flip, Sip and GO! Featuring a flip-lid with built in silicone straw and split-control spout. Life on the GO never looked so good. Compatible with the 500ml EcoBottle.', '10', '1719750180.GO Lid Ocean Blue.jpg', 5, 'go-lid-ocean-blue-1719750180', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(26, 'GO Lid | Forest Green', 'Customise your current GO or add a GO lid to your OG! Compatible with the 500ml Original EcoBottle & GO Bottle.', 'Flip, Sip and GO! Featuring a flip-lid with built in silicone straw and split-control spout. Life on the GO never looked so good. Compatible with the 500ml EcoBottle.', '10', '1719750228.GO Lid Forest Green.jpg', 5, 'go-lid-forest-green-1719750228', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(27, 'GO Lid | Sky Blue', 'Customise your current GO or add a GO lid to your OG! Compatible with the 500ml Original EcoBottle & GO Bottle.', 'Flip, Sip and GO! Featuring a flip-lid with built in silicone straw and split-control spout. Life on the GO never looked so good. Compatible with the 500ml EcoBottle.', '10', '1719750265.GO Lid Only Sky Blue.jpg', 5, 'go-lid-sky-blue-1719750719', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(28, 'Brew Lid | Obsidian Black', 'Customise your current Brew or add a Brew lid to your OG! Compatible with the Brew Flask, 500ml Original EcoBottle & GO Bottle.', 'Make your EcoBottle barista approved. Our 360° Brew Lid lets coffee aromas circulate whilst combatting spills that often happen with other coffee cups.', '10', '1719751108.Brew Lid Obsidian Black.jpg', 5, 'brew-lid-obsidian-black-1719751108', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(29, 'Brew Lid | Ocean Blue', 'Customise your current Brew or add a Brew lid to your OG! Compatible with the Brew Flask, 500ml Original EcoBottle & GO Bottle.', 'Make your EcoBottle barista approved. Our 360° Brew Lid lets coffee aromas circulate whilst combatting spills that often happen with other coffee cups.', '10', '1719751143.Brew Lid Ocean Blue.jpg', 5, 'brew-lid-ocean-blue-1719751143', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(30, 'Brew Lid | Forest Green', 'Customise your current Brew or add a Brew lid to your OG! Compatible with the Brew Flask, 500ml Original EcoBottle & GO Bottle.', 'Make your EcoBottle barista approved. Our 360° Brew Lid lets coffee aromas circulate whilst combatting spills that often happen with other coffee cups.', '10', '1719751190.Brew Lid Forest Green.jpg', 5, 'brew-lid-forest-green-1719751190', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(31, 'Brew Lid | Sky Blue', 'Customise your current Brew or add a Brew lid to your OG! Compatible with the Brew Flask, 500ml Original EcoBottle & GO Bottle.', 'Make your EcoBottle barista approved. Our 360° Brew Lid lets coffee aromas circulate whilst combatting spills that often happen with other coffee cups.', '10', '1719751221.Brew Lid Sky Blue.jpg', 5, 'brew-lid-sky-blue-1719751221', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(32, 'Original Cap | Obsidian Black', 'Compatible with the 500ml Original EcoBottle & GO Bottle.', 'The original cap in our four core colours, inspired by our planet. Compatible with the 500ml EcoBottle or GO Bottle.', '5', '1719751525.Original Cap Obsidian Black.png', 5, 'original-cap-obsidian-black-1719751525', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(33, 'Original Cap | Ocean Blue', 'The original cap in our four core colours, inspired by our planet. Compatible with the 500ml EcoBottle or GO Bottle.', 'The original cap in our six core colours, inspired by our planet. Compatible with the 500ml EcoBottle or GO Bottle.', '5', '1719751564.Original Cap Ocean Blue.png', 5, 'original-cap-ocean-blue-1719751564', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(34, 'Original Cap | Forest Green', 'Compatible with the 500ml Original EcoBottle & GO Bottle.', 'The original cap in our six core colours, inspired by our planet. Compatible with the 500ml EcoBottle or GO Bottle.', '5', '1719751599.Original Cap Forest Green.png', 5, 'original-cap-forest-green-1719751599', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(35, 'Original Cap | Sky Blue', 'Compatible with the 500ml Original EcoBottle & GO Bottle.', 'The original cap in our four core colours, inspired by our planet. Compatible with the 500ml EcoBottle or GO Bottle.', '5', '1719751645.Original Cap Sky Blue.jpg', 5, 'original-cap-sky-blue-1719751645', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(36, 'Carry Loop | Obsidian Black', 'Mix and match carry loops to make your bottle your own.', 'We pride ourselves on making products that will last a lifetime, but sometimes things can go wrong. Don’t worry, if you ever have an issue with your product, we provide a warranty. Our 10-year repair and replacement scheme covers manufacturing defects and parts that have been accidentally broken.', '5', '1719752349.Carry Loop Obsidian Black.jpg', 5, 'carry-loop-obsidian-black-1719752349', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(37, 'Carry Loop | Ocean Blue', 'Mix and match carry loops to make your bottle your own.', 'We pride ourselves on making products that will last a lifetime, but sometimes things can go wrong. Don’t worry, if you ever have an issue with your product, we provide a warranty. Our 10-year repair and replacement scheme covers manufacturing defects and parts that have been accidentally broken.', '5', '1719752373.Carry Loop Ocean Blue.jpg', 5, 'carry-loop-ocean-blue-1719752373', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(38, 'Carry Loop | Forest Green', 'Mix and match carry loops to make your bottle your own.', 'We pride ourselves on making products that will last a lifetime, but sometimes things can go wrong. Don’t worry, if you ever have an issue with your product, we provide a warranty. Our 10-year repair and replacement scheme covers manufacturing defects and parts that have been accidentally broken.', '5', '1719752396.Carry Loop Forest Green.jpg', 5, 'carry-loop-forest-green-1719752396', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(39, 'Carry Loop | Sky Blue', 'Mix and match carry loops to make your bottle your own.', 'We pride ourselves on making products that will last a lifetime, but sometimes things can go wrong. Don’t worry, if you ever have an issue with your product, we provide a warranty. Our 10-year repair and replacement scheme covers manufacturing defects and parts that have been accidentally broken.', '5', '1719752419.Carry Loop Sky Blue.jpg', 5, 'carry-loop-sky-blue-1719752419', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(40, 'OG Duo', '2 x OG EcoBottles', 'Our bestselling original EcoBottle - one for you and one for a friend. Our award-winning EcoBottle is designed to come along, at home and beyond. It keeps your cold drinks cold and your hot drinks hot. Ice, coffee, cocktails and smoothies are all good, thanks to its double lid, dual opening that lets you sip, fill, pour and clean with joy.', '60', '1719754221.OG Duo.jpg', 5, 'og-duo-1719754221', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(41, 'Brew Duo', '2 x Brew Flasks', 'One for you, one for a friend. Not just for hot drinks - our barista-approved brew flasks are the perfect iced coffee companion. Unlike other cups, they won\'t leak or sweat in your bag and are 100% dishwasher safe. Our double wall vacuum insulation means your ice will stay solid all day, and the 360° lid lets you take in all those sweet coffee aromas with every sip. All that while helping to save the ocean too, with every sale funding the collection of 11.4kg of ocean-bound plastic, equivalent to 1000 plastic bottles.', '60', '1719754269.Brew Duo.jpg', 5, 'brew-duo-1719754269', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(42, 'GO Duo', '2 x GO Bottles', 'One for you, one for a friend. This 500ml bottle features a flip-lid with built in silicone straw and split-control spout. Life on the GO never looked so good.', '64', '1719754304.GO Duo.jpg', 5, 'go-duo-1719754304', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(43, 'The Whole Family', 'OG EcoBottle + Big EcoBottle + Brew Flask + GO Bottle', 'Be prepared for any occasion with the entire EcoBottle range. Whether at work, getting coffee, or on the go, The Whole Family has you covered.', '120', '1719754343.The Whole Family.jpg', 5, 'the-whole-family-1719756178', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(44, 'Travel Mug (350ml)', 'The Travel Mug will give you that familiar, feel-good drinking experience whether you’re inside or out.', 'The vacuum-sealed double-wall insulation and a push-fit lid keeps your cold drinks cold and your hot drinks hot. It\'s a great option for a cuppa at home, and further afield! Whether you want a hot coffee for your morning commute or simply want the convenience of a thermal mug to sit on your desk keeping your favourite beverages at the perfect temperature. The removable lid enables you to sip drinks on the move with minimal splashes or use it like a regular mug. The ergonomic handle allows you to attach it to bags/ leads/ buggies when out and about to optimise storage space and carrying capacity. Our full range of thermal Travel Mugs come with a sip lid slider that can be customised to suit your personal style with eight vibrant colours inspired by our Earth. It\'s a durable tea and coffee cup that directly supports sustainability projects to protect the planet. EcoBottle Travel Mugs are made from 90% recycled stainless steel and double wall vacuum-insulated recycled materials – all while helping to save the ocean; every Mug funds the collection of 1,000 ocean bound plastic bottles.', '25', '1719754801.Travel Mug (350ml).jpg', 5, 'travel-mug-350ml--1719754801', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(45, 'Tumbler (350ml)', 'The Tumbler is designed to be the one stop cup you’ll need when you’re heading out and about.', 'The vacuum-sealed double-wall insulation and a push-fit lid keeps your cold drinks chilled and your hot drinks hot. It fits seamlessly under most coffee makers, such as barista machines, and in your car\'s cup holder so it’s an obvious choice to be the last thing you pick up before you leave home each morning. The removable lid means you can sip drinks on the move with minimal splashes or use it like a regular cup. Keep your hot coffee at the perfect temperature whilst you\'re on the go, without resorting to disposable cups from the coffee shop. Or fill it with tea so you can enjoy a piping hot brew just the way you like it. Choose the EcoBottle insulated stainless steel Travel Tumbler as your day to day commute cup or use it at home as the perfect product to maintain a toasty temperature if you\'re the type of tea and coffee drinker who can often go extended periods between sips (no judgement from us!) It\'s robust and versatile, won\'t rust and can be personalised with a range of colours to bring vibrancy to the sip lid slider. Our Tumblers are made from 90% recycled stainless steel double wall vacuum-insulated recycled materials – all while helping to save the ocean, every Tumbler funds the collection of 1,000 ocean bound plastic bottles so as you drink you can feel the positivity knowing your purchase has helped protect our planet and its ocean.', '25', '1719754839.Tumbler (350ml).jpg', 5, 'tumbler-350ml--1719754839', 1, '2024-07-25 14:21:03', '2024-07-25 14:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: Inactive, 1: Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_referral_code_unique` (`referral_code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `image`, `referral_code`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mihailo Anđelić', 'Vrbaska 7', 'mihailo@email.com', NULL, 'mrHg59aZ', 1, '2024-07-25 14:21:03', '$2y$12$o2IcKglCa3SN1MV/8x9/f.ZxCgjTeeheUl4V8uwspjM.rtkubpoQG', NULL, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(2, 'Marko Marković', 'Jurija Gagarina 29/2', 'marko@email.com', NULL, '5Cpkzv1u', 1, '2024-07-25 14:21:03', '$2y$12$HBKDS3jJsbGJ7Lrv/OMrT.JqVsUZS5QwcpnQ0AKj5pjNqwzXxc2Zq', NULL, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(3, 'Ana Anić', 'Kursulina 8', 'ana@email.com', NULL, 'kUXzAg7r', 1, '2024-07-25 14:21:03', '$2y$12$X2ZxgqGmfRzb6XJZ7f5//OaeSAzCY7caXUCmuePjtdvnRAtkPfHUm', NULL, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(4, 'Petar Petrović', 'Krunska 51', 'petar@email.com', NULL, 'PeroRkdn', 1, '2024-07-25 14:21:03', '$2y$12$s210h/D2hkoMX2gaf8Z8/erDMsMgOk2sqERduCT9uD028RgxcCnsG', NULL, '2024-07-25 14:21:03', '2024-07-25 14:21:03'),
(5, 'Anastasija Jovanović', 'Vojvode Stepe 283', 'anastasija@email.com', NULL, '8SKtWe9B', 1, '2024-07-25 14:21:03', '$2y$12$KHE0XOXLUDQZ7bX0OOrSruRlpKYTYsg7nui791GW7fiy4Lp8MWbl2', NULL, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(6, 'Jovana Jovanović', 'Cara Dušana 18', 'jovana@email.com', NULL, 'S6TQomCb', 1, '2024-07-25 14:21:04', '$2y$12$lG49S2TMlsoyIL1qGTPqwOuqXdgxguPrWfsDLBGQrB9i.FW/0HsP.', NULL, '2024-07-25 14:21:04', '2024-07-25 14:21:04'),
(7, 'Nikola Nikolić', 'Bulevar Kralja Aleksandra 240', 'nikola@email.com', NULL, 'XhfGl6wz', 1, '2024-07-25 14:21:04', '$2y$12$hLxza0MV9WeFNNobE0QdGeiPjA2S3VZpthSoodsxY9wB9Lpax9Wd.', NULL, '2024-07-25 14:21:04', '2024-07-25 14:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_commissions`
--

CREATE TABLE IF NOT EXISTS `user_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `shopper_id` bigint(20) UNSIGNED NOT NULL,
  `commission_level_id` bigint(20) UNSIGNED NOT NULL,
  `commission_amount` varchar(255) NOT NULL,
  `commission_percentage` varchar(255) NOT NULL,
  `order_amount` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_commissions_user_id_foreign` (`user_id`),
  KEY `user_commissions_shopper_id_foreign` (`shopper_id`),
  KEY `user_commissions_order_id_foreign` (`order_id`),
  KEY `user_commissions_commission_level_id_foreign` (`commission_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_earnings`
--

CREATE TABLE IF NOT EXISTS `user_earnings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `available_balance` varchar(255) NOT NULL DEFAULT '0',
  `total_earnings` varchar(255) NOT NULL DEFAULT '0',
  `total_withdrawn` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_earnings_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affiliates`
--
ALTER TABLE `affiliates`
  ADD CONSTRAINT `affiliates_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `affiliates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_commissions`
--
ALTER TABLE `user_commissions`
  ADD CONSTRAINT `user_commissions_commission_level_id_foreign` FOREIGN KEY (`commission_level_id`) REFERENCES `commission_percentages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_commissions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_commissions_shopper_id_foreign` FOREIGN KEY (`shopper_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_commissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_earnings`
--
ALTER TABLE `user_earnings`
  ADD CONSTRAINT `user_earnings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
