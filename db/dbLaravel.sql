-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2023 lúc 05:34 AM
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
