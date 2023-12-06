-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 05:46 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', NULL, NULL),
(2, 'Mỳ Ý', NULL, NULL),
(3, 'salad', NULL, NULL),
(4, 'Thức Uống', NULL, NULL),
(5, 'Combo', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comboes`
--

CREATE TABLE `comboes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comboes`
--

INSERT INTO `comboes` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Combo Pizza Và Pepsi', 'Mẫu Theme thiết kế Chuẩn', 300000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery_informations`
--

CREATE TABLE `delivery_informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `provides` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `wards` varchar(255) NOT NULL,
  `apartmentNumber` varchar(255) NOT NULL,
  `StreetNames` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date_order` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `delivery_informations`
--

INSERT INTO `delivery_informations` (`id`, `name`, `phone`, `provides`, `district`, `wards`, `apartmentNumber`, `StreetNames`, `details`, `date_order`, `created_at`, `updated_at`) VALUES
(18, 'le phu vinh', '0344842232', 'VN211', 'VN21103', 'VN2110319', '34', 'xom 1 thon 13', 'Trần bá giao', '2023-10-18', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hải Sản Cao Cấp 1', '2023-11-01 09:37:08', '2023-11-03 17:56:09'),
(2, 'Nước uống siêu tỉnh táo', '2023-11-01 09:37:08', '2023-11-02 09:37:08'),
(7, 'Sốt bò bằm', '2023-11-05 19:32:20', '2023-11-05 19:36:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_07_015206_create_products_table', 1),
(6, '2023_10_07_015633_create_categories_table', 1),
(7, '2023_10_07_015700_create_manufactures_table', 1),
(8, '2023_10_07_015719_create_toppings_table', 1),
(9, '2023_10_07_015733_create_sizes_table', 1),
(10, '2023_10_07_015825_create_comboes_table', 1),
(13, '2023_10_10_022813_create__delivery_informations_table', 4),
(16, '2023_10_17_054238_create_order_detail_table', 5),
(17, '2023_10_17_045159_create_orders_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(24, 17, 1, 1, 100290, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `deliveryInformation_date` date NOT NULL,
  `total_amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `deliveryInformation_date`, `total_amount`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(17, 18, '2023-10-18', 100290, 1, 2, '2023-10-17 18:56:53', '2023-10-17 18:56:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `manufacture_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `categories_id`, `manufacture_id`, `created_at`, `updated_at`) VALUES
(49, 'Espresso', 'Cappuccino là một loại đồ uống cà phê phổ biến và thú vị, được tạo ra bằng cách kết hợp cà phê espresso, sữa nóng và bọt sữa. Được phục vụ trong một tách lớn, cappuccino có lớp bọt sữa mịn trên mặt và một hương vị cân bằng giữa cà phê và sữa. Đây là một lựa chọn phổ biến cho những người yêu thích cảm giác bùi bùi của cà phê espresso và độ mềm mịn của sữa nóng.', '16989787693.jpg', 39000, 4, 2, '2023-11-03 02:32:49', '2023-11-03 02:32:49'),
(50, 'Pizza Hải Sản', 'Tôi thường dành thời gian chiều cuối tuần để tận hưởng sự yên bình và thư giãn tại quê nhà. Khi bước ra khỏi cửa, tôi đắm chìm trong vẻ đẹp của thiên nhiên vùng nông thôn, với những cánh đồng xanh mướt và những dãy núi xa xăm vươn lên trên bầu trời xanh thẳm. Không khí trong lành và mát mẻ khiến tôi cảm thấy sự thư thái và an lành tràn đầy. Tại đây, tôi thích tận hưởng những bữa ăn gia đình ấm áp, nơi chúng tôi tụ họp và trò chuyện về cuộc sống, công việc, và những kỷ niệm đáng nhớ. Cuộc sống đơn giản của quê hương luôn là nguồn cảm hứng cho tôi, giúp tôi thấy minh bạch và đánh thức sự trân trọng đối với những giá trị cơ bản của cuộc sống.', '1698978967Pizzaminsea-Hai-San-Nhiet-Doi-Xot-Tieu.jpg', 135000, 1, 1, '2023-11-03 02:36:07', '2023-11-03 02:36:07'),
(51, 'MÌ Ý SỐT BÒ BẰM', 'Mì Ý sốt bò bằm là một món ăn thơm ngon và phong cách của ẩm thực Ý. Mì mềm mịn, sốt bò bằm đậm đà và hương vị phô mai Parmesan tạo nên hòa quyện hoàn hảo, đem đến trải nghiệm ẩm thực tuyệt vời.', '1699237922myYSotBoBam.png', 35000, 2, 7, '2023-11-06 02:32:02', '2023-11-05 19:36:24'),
(52, 'Pizza Hải Sản Pesto Xanh', 'Tôm, thanh cua, mực và bông cải xanh tươi ngon trên nền sốt Pesto Xanh', '16993280290002624_seafood-pesto_500.png', 169000, 1, 1, '2023-11-07 03:33:49', '2023-11-07 03:33:49'),
(53, 'Pizza Hải Sản Cocktail', 'Tôm, cua, giăm bông,... với sốt Thousand Island', '16993282210002212_sf-cocktail_300.png', 149000, 1, 1, '2023-11-07 03:37:01', '2023-11-07 03:37:01'),
(54, 'Pizza Hải Sản Đào', 'Tôm, Đào hoà quyện bùng nổ cùng sốt Thousand Island', '16993284340003102_seafood-peach_300.png', 169000, 1, 1, '2023-11-07 03:40:34', '2023-11-07 03:40:34'),
(56, 'Pizza Hải Sản Cao Cấp', 'Tôm, cua, mực và nghêu với sốt Marinara', '16993299770002624_seafood-pesto_500.png', 169000, 1, 1, '2023-11-07 04:06:17', '2023-11-07 04:06:17'),
(57, 'Pizza Hải Sản Nhiệt Đới', 'Tôm, nghêu, mực cua, dứa với sốt Thousand Island', '16993302380002211_tropical-sf_300.png', 149000, 1, 1, '2023-11-07 04:07:35', '2023-11-06 21:10:38'),
(58, 'Pizza Aloha', 'Thịt nguội, xúc xích tiêu cay và dứa hòa quyện với sốt Thousand Island', '16993303640002225_double-pepperoni_300.png', 139000, 1, 1, '2023-11-07 04:12:44', '2023-11-07 04:12:44'),
(59, 'Pizza Thịt Xông Khói', 'Thịt giăm bông, thịt xông khói và hai loại rau của ớt xanh, cà chua', '16993304360002218_sup-deluxe_300.png', 139000, 1, 1, '2023-11-07 04:13:56', '2023-11-07 04:13:56'),
(60, 'Pizza Thịt Nguội Kiểu Canada', 'Sự kết hợp giữa thịt nguội và bắp ngọt', '16993305230002222_ca-bacon_300.png', 139000, 1, 1, '2023-11-07 04:15:23', '2023-11-07 04:15:23'),
(61, 'Pizza Gà Nướng 3 Vị', 'Gà nướng, gà bơ tỏi và gà ướp sốt nấm', '16993305680002228_ck-caldo_300.png', 139000, 1, 1, '2023-11-07 04:16:08', '2023-11-07 04:16:08'),
(62, 'Pizza 5 Loại Thịt Đặc Biệt', 'Xúc xích lợn và bò đặc trưng của Ý, giăm bông, thịt xông khói', '16993306690002219_meat-deluxe_300.png', 139000, 1, 1, '2023-11-07 04:17:49', '2023-11-07 04:17:49'),
(63, 'Pizza 5 Loại Thịt Đặc Biệt Và Rau Củ', 'Xúc xích bò, giăm bông, thịt xông khói,...và cả thế giới rau phong phú.', '16993307300002221_bacon-sup_300.png', 139000, 1, 1, '2023-11-07 04:18:50', '2023-11-07 04:18:50'),
(64, 'Pizza Gà Nướng Dứa', 'Thịt gà mang vị ngọt của dứa kết hợp với vị cay nóng của ớt', '16993308440002212_sf-cocktail_300.png', 139000, 1, 1, '2023-11-07 04:20:44', '2023-11-07 04:20:44'),
(65, 'Pizza Phô Mai', 'Bánh Pizza với vô vàn phô mai để bạn tha hồ tận hưởng.', '16993308950002226_double-cheese_300.png', 119000, 1, 1, '2023-11-07 04:21:35', '2023-11-07 04:21:35'),
(66, 'Pizza Xúc Xích Ý', 'Xúc xích cay kiểu Ý trên nền sốt cà chua', '16993309300002225_double-pepperoni_300.png', 119000, 1, 1, '2023-11-07 04:22:10', '2023-11-07 04:22:10'),
(68, 'Pizza Hawaiian', 'Giăm bông, thịt muối và dứa', '16993312860002224_hawaii_300.png', 119000, 1, 1, '2023-11-07 04:28:06', '2023-11-07 04:28:06'),
(69, 'Pizza Sốt Nấm & Bông Cải Xanh', 'Với sự kết hợp từ nấm, bông cải xanh và xốt nấm Truffle thơm béo sẽ tạo nên một hương vị khó quên cho những thực khách thích thanh đạm.', '16993313180003785_trufflemushroomsaucebroccoli_300.png', 119000, 1, 1, '2023-11-07 04:28:38', '2023-11-07 04:28:38'),
(70, 'Pizza Sốt Nấm & Bông Cải Xanh', 'Với sự kết hợp từ nấm, bông cải xanh và xốt nấm Truffle thơm béo sẽ tạo nên một hương vị khó quên cho những thực khách thích thanh đạm.', '16993313190003785_trufflemushroomsaucebroccoli_300.png', 119000, 1, 1, '2023-11-07 04:28:39', '2023-11-07 04:28:39'),
(71, 'Pizza Rau Củ', 'Pizza Rau Củ', '16993313540002229_veg_300.png', 119000, 1, 1, '2023-11-07 04:29:14', '2023-11-07 04:29:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Nhỏ', 5000, NULL, NULL),
(2, 'Vừa', 10000, NULL, NULL),
(3, 'Lớn ', 15000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `toppings`
--

CREATE TABLE `toppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comboes`
--
ALTER TABLE `comboes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery_informations`
--
ALTER TABLE `delivery_informations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comboes`
--
ALTER TABLE `comboes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `delivery_informations`
--
ALTER TABLE `delivery_informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
