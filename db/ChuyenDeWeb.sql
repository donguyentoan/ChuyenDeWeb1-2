-- Adminer 4.8.1 MySQL 8.0.16 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Pizza',	NULL,	NULL),
(2,	'Mỳ Ý',	NULL,	NULL),
(3,	'salad',	NULL,	NULL),
(4,	'Thức Uống',	NULL,	NULL),
(5,	'Combo',	NULL,	NULL);

DROP TABLE IF EXISTS `comboes`;
CREATE TABLE `comboes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comboes` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1,	'Combo Pizza Và Pepsi',	'Mẫu Theme thiết kế Chuẩn',	300000000,	NULL,	NULL);

DROP TABLE IF EXISTS `delivery_informations`;
CREATE TABLE `delivery_informations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provides` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wards` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartmentNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StreetNames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `delivery_informations` (`id`, `name`, `phone`, `provides`, `district`, `wards`, `apartmentNumber`, `StreetNames`, `details`, `date_order`, `created_at`, `updated_at`) VALUES
(18,	'le phu vinh',	'0344842232',	'VN211',	'VN21103',	'VN2110319',	'34',	'xom 1 thon 13',	'Trần bá giao',	'2023-10-18',	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE `manufactures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `manufactures` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Hải Sản Cao Cấp',	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2023_10_07_015206_create_products_table',	1),
(6,	'2023_10_07_015633_create_categories_table',	1),
(7,	'2023_10_07_015700_create_manufactures_table',	1),
(8,	'2023_10_07_015719_create_toppings_table',	1),
(9,	'2023_10_07_015733_create_sizes_table',	1),
(10,	'2023_10_07_015825_create_comboes_table',	1),
(13,	'2023_10_10_022813_create__delivery_informations_table',	4),
(16,	'2023_10_17_054238_create_order_detail_table',	5),
(17,	'2023_10_17_045159_create_orders_table',	6);

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(24,	17,	1,	1,	100290,	NULL,	NULL);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `deliveryInformation_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `customer_id`, `deliveryInformation_date`, `total_amount`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(17,	18,	'2023-10-18',	100290,	1,	2,	'2023-10-17 18:56:53',	'2023-10-17 18:56:53');

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `categories_id` bigint(20) unsigned NOT NULL,
  `Manufacture_id` int(11) NOT NULL,
  `Combo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_id` (`categories_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `categories_id`, `Manufacture_id`, `Combo_id`, `created_at`, `updated_at`) VALUES
(1,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(2,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190000,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(3,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(4,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(5,	'Mỳ Ý',	'Mẫu Theme thiết kế Chuẩn',	'myy.png',	456,	2,	2,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(6,	'Mỳ Ý Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	2,	2,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(7,	'Mỳ Ý',	'Mẫu Theme thiết kế Chuẩn',	'myy.png',	456,	2,	2,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(8,	'Mỳ Ý Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	2,	2,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(10,	'salad',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	3,	3,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(11,	'Salad  Trái cây',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	3,	3,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(12,	'salad',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	3,	3,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(13,	'Salad  Trái cây',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	3,	3,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(15,	'Pepsi ',	'Mẫu Theme thiết kế Chuẩn',	'pesi .jpeg',	34000,	4,	4,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(16,	'Coca',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	4,	4,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(17,	'Pepsi ',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	34000,	4,	4,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(18,	'Coca',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	4,	4,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(20,	'Combo pépi và pizza',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	123,	5,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(21,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(22,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190000,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(23,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(24,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(28,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(29,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190000,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(30,	'Pizza Hải Sản',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06'),
(31,	'Pizza Phô Mai',	'Mẫu Theme thiết kế Chuẩn',	'pizza.png',	190,	1,	1,	1,	'2023-10-17 08:21:06',	'2023-10-17 08:21:06');

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sizes` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1,	'Nhỏ',	5000,	NULL,	NULL),
(2,	'Vừa',	10000,	NULL,	NULL),
(3,	'Lớn ',	15000,	NULL,	NULL);

DROP TABLE IF EXISTS `toppings`;
CREATE TABLE `toppings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-10-19 03:29:12
