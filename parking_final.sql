-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 05:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `f_name`, `l_name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'user', 'test@gmail.com', '45534534', 'hi there please help me regarding some questions', '2023-12-30 02:07:49', '2023-12-30 02:07:49');

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
-- Table structure for table `f_a_q_s`
--

CREATE TABLE `f_a_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_a_q_s`
--

INSERT INTO `f_a_q_s` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Do I get a guaranteed spot by booking a parking space through ParKing?', 'Absolutely! By booking a parking space with ParKing you will get a guaranteed space for the duration of your booking.', '1', '2023-12-30 10:16:05', '2023-12-30 10:16:05'),
(2, 'How do I have to proceed in order to park my car once the booking is completed?', 'Once you complete the booking, we will email you your parking pass. You will need to present it at the parking facility in order to park your car. You can also find the parking pass in the \"Bookings\" section on our website or mobile apps. Most parking providers also accept e-passes (on your mobile phone). If the parking provider requires a printed parking pass we will always inform you before you complete your booking.', '1', '2023-12-30 10:17:13', '2023-12-30 10:17:13'),
(3, 'Can I leave and return the parking space during the booking period?', 'The parking locations available for booking do not allow in/out privileges (repeat entry), unless this is expressly indicated in the provided Parking Pass.', '1', '2023-12-30 10:17:32', '2023-12-30 10:17:32'),
(4, 'Can I change the details of my booking?', 'We do not allow any amendments to existing bookings. To amend a booking (e.g. time, date and parking location specified) please cancel the existing booking and start a new one.', '1', '2023-12-30 10:17:53', '2023-12-30 10:17:53'),
(5, 'What happens if I arrive earlier to the car park?', 'Unfortunately, if you arrive earlier you’ll be charged by the parking operator from the time you arrive until your pre-booked period starts. This charge will be based on the applicable tariff for each parking provider.', '1', '2023-12-30 10:18:16', '2023-12-30 10:18:16'),
(6, 'What happens if I stay longer than my booking period?', 'If you stay longer than your booked exit time and grace period, some locations will automatically charge for the overstay. This charge will be based on the applicable tariff for the overstay period for each parking provider. However, as this depends on the parking provider, we recommend that you always check your booking confirmation email for details and contact us prior to the end of the booked exit time and grace period with any queries.', '1', '2023-12-30 10:18:28', '2023-12-30 10:18:28'),
(7, 'Can I change the details of my booking', 'We do not allow any amendments to existing bookings. To amend a booking (e.g. time, date and parking location specified) please cancel the existing booking and start a new one.?', '1', '2023-12-30 10:25:10', '2023-12-30 10:25:10'),
(8, 'Can I change the details of my booking?', 'We do not allow any amendments to existing bookings. To amend a booking (e.g. time, date and parking location specified) please cancel the existing booking and start a new one.', '1', '2023-12-30 10:25:22', '2023-12-30 10:25:22');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_14_172823_create_permission_tables', 1),
(6, '2023_12_14_175555_create_parking_slots_table', 2),
(7, '2023_12_14_191927_create_parking_images_table', 3),
(8, '2023_12_17_130538_create_transation_infos_table', 4),
(9, '2023_12_17_132027_create_slots_table', 4),
(10, '2023_12_27_052454_create_reviews_table', 5),
(11, '2023_12_27_192058_create_contacts_table', 6),
(12, '2023_12_27_192258_create_f_a_q_s_table', 7),
(13, '2023_12_27_192436_create_social_links_table', 8);

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

-- --------------------------------------------------------

--
-- Table structure for table `parking_images`
--

CREATE TABLE `parking_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parking_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_images`
--

INSERT INTO `parking_images` (`id`, `parking_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 8, '1702629512-8-0uAXzX3wFO.jpg', '2023-12-15 02:38:32', '2023-12-15 02:38:32'),
(8, 8, '1702629512-8-xojS02BapP.jpg', '2023-12-15 02:38:32', '2023-12-15 02:38:32'),
(10, 9, '1702702355-9-oQOxnP21lY.jpg', '2023-12-15 22:52:36', '2023-12-15 22:52:36'),
(11, 9, '1702702356-9-3YMlKVxuy4.jpg', '2023-12-15 22:52:36', '2023-12-15 22:52:36'),
(12, 10, '1702704424-10-CmbmlsWy3E.jpg', '2023-12-15 23:27:04', '2023-12-15 23:27:04'),
(13, 10, '1702704424-10-SyOpbkQbUf.jpg', '2023-12-15 23:27:04', '2023-12-15 23:27:04'),
(14, 11, '1702704597-11-H6YXwyjflD.jpg', '2023-12-15 23:29:57', '2023-12-15 23:29:57'),
(15, 12, '1702704789-12-8L2u5ekbDi.png', '2023-12-15 23:33:09', '2023-12-15 23:33:09'),
(16, 13, '1702705000-13-ueb8o3vcKK.jpg', '2023-12-15 23:36:40', '2023-12-15 23:36:40'),
(17, 14, '1702705743-14-AfF8NZzUY5.jpg', '2023-12-15 23:49:03', '2023-12-15 23:49:03'),
(18, 15, '1702705927-15-ImSslHx6xl.png', '2023-12-15 23:52:07', '2023-12-15 23:52:07'),
(19, 16, '1702706439-16-d5x10wfe6D.jpg', '2023-12-16 00:00:39', '2023-12-16 00:00:39'),
(22, 11, '1702740704-11-uZ0ar56QLc.jpg', '2023-12-16 09:31:44', '2023-12-16 09:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `parking_slots`
--

CREATE TABLE `parking_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `building_number` varchar(255) NOT NULL,
  `coordinates` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_area` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `price` double NOT NULL,
  `slot_numbers` varchar(255) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `close_time` varchar(255) NOT NULL,
  `slot_type` varchar(255) NOT NULL,
  `cctv` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `security` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `guest` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `extinguisher` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `water` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `mainroad` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes',
  `user_id` tinyint(4) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0 = inactive, 1 = active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parking_slots`
--

INSERT INTO `parking_slots` (`id`, `building_name`, `building_number`, `coordinates`, `mobile`, `city`, `post_area`, `zip`, `price`, `slot_numbers`, `open_time`, `close_time`, `slot_type`, `cctv`, `security`, `guest`, `extinguisher`, `water`, `mainroad`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Attic Apartment', '1/1', '[90.38693660955636, 23.797195492142905]', '01878552579', 'Mirpur', 'Kafrul', 1206, 230, 'A1,B2', '06:00', '00:00', 'car,bike', '1', '0', '1', '1', '1', '1', 3, '1', '2023-12-15 02:38:32', '2023-12-17 09:05:08'),
(9, 'Apon Towerss', '12/23', '[90.37205178021196, 23.798588329786327]', '01878987562', 'Kazipara', 'Kazipara', 1223, 200, 'A1,A3,A4', '06:00', '00:00', 'car,bike,cng', '1', '1', '1', '1', '1', '0', 1, '1', '2023-12-15 22:52:35', '2023-12-24 08:22:35'),
(10, 'Green Nest', '4A/B', '[90.36623156481124, 23.813286843773994]', '0123456789', 'Mirpur', 'Mirpur-11', 1222, 210, 'A1,B1,C1,D1', '05:00', '00:00', 'car,bike,cng', '1', '1', '0', '0', '0', '1', 1, '1', '2023-12-15 23:27:03', '2023-12-15 23:57:45'),
(11, 'Rajanigandha Heights', 'Block C, House 68 Avenue 5', '[90.3663240601033, 23.81239422167468]', '0123456789', 'Dhaka', 'Dhaka', 1216, 190, 'A1,B1,H1', '05:00', '00:00', 'car,bike,truck', '1', '1', '0', '1', '1', '0', 1, '1', '2023-12-15 23:29:57', '2023-12-16 09:07:31'),
(12, 'S.R. Tower', '94 সমাজকল্যান রোড', '[90.368719193179, 23.805680512485665]', '011244567', 'Dhaka', 'Dhaka', 1216, 310, 'A1,A2', '05:00', '00:00', 'car,bike', '1', '1', '1', '0', '0', '0', 1, '1', '2023-12-15 23:33:09', '2023-12-15 23:57:50'),
(13, 'Orchid Tower', '78, 1 Senpara Parbata Ln', '[90.36848949814276, 23.804665263090683]', '011233456', 'Dhaka', 'Dhaka', 1216, 122, 'A1,A2,A3', '05:00', '00:00', 'car,bike', '1', '1', '1', '0', '0', '0', 1, '1', '2023-12-15 23:36:40', '2023-12-15 23:57:47'),
(14, 'Hhamcon Tower', '89, Senpara parbota', '[90.3679566617941, 23.804813911738492]', '0124578963', 'Dhaka', 'Dhaka', 1216, 211, 'A1,A2,A3,A4,A5', '05:00', '00:00', 'car,bike', '1', '1', '0', '0', '1', '0', 1, '1', '2023-12-15 23:49:03', '2023-12-15 23:57:48');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` int(11) NOT NULL,
  `review` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `transaction_id`, `slot_id`, `review`, `status`, `rating`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 14, 'like this', 1, 5, NULL, '2023-12-27 00:40:31'),
(2, 1, 3, 9, 'somewhat good', 1, 4, NULL, '2023-12-27 00:40:34'),
(3, 1, 2, 9, 'nice one', 0, 3, '2023-12-27 03:50:10', '2023-12-27 03:50:10'),
(4, 1, 1, 9, 'good one', 0, 4, '2023-12-27 09:30:34', '2023-12-27 09:30:34');

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

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `slot_number` varchar(255) NOT NULL,
  `occupied` enum('yes','no') NOT NULL DEFAULT 'no',
  `end_time` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `slot_id`, `slot_number`, `occupied`, `end_time`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 8, 'A1', 'no', NULL, NULL, '2023-12-17 09:05:27', '2023-12-17 09:05:27'),
(12, 8, 'B2', 'no', NULL, NULL, '2023-12-17 09:05:27', '2023-12-17 09:05:27'),
(17, 10, 'A1', 'no', NULL, NULL, '2023-12-17 09:06:17', '2023-12-17 09:06:17'),
(18, 10, 'B1', 'no', NULL, NULL, '2023-12-17 09:06:17', '2023-12-17 09:06:17'),
(19, 10, 'C1', 'no', NULL, NULL, '2023-12-17 09:06:18', '2023-12-17 09:06:18'),
(20, 10, 'D1', 'no', NULL, NULL, '2023-12-17 09:06:18', '2023-12-17 09:06:18'),
(21, 13, 'A1', 'no', NULL, NULL, '2023-12-17 09:06:23', '2023-12-17 09:06:23'),
(22, 13, 'A2', 'no', NULL, NULL, '2023-12-17 09:06:24', '2023-12-17 09:06:24'),
(23, 13, 'A3', 'no', NULL, NULL, '2023-12-17 09:06:24', '2023-12-17 09:06:24'),
(24, 14, 'A1', 'yes', '1703718000', 2, '2023-12-17 09:06:31', '2023-12-24 11:02:40'),
(25, 14, 'A2', 'no', NULL, NULL, '2023-12-17 09:06:31', '2023-12-17 09:06:31'),
(26, 14, 'A3', 'no', NULL, NULL, '2023-12-17 09:06:31', '2023-12-17 09:06:31'),
(27, 14, 'A4', 'no', NULL, NULL, '2023-12-17 09:06:31', '2023-12-17 09:06:31'),
(28, 14, 'A5', 'no', NULL, NULL, '2023-12-17 09:06:31', '2023-12-17 09:06:31'),
(29, 12, 'A1', 'no', NULL, NULL, '2023-12-17 09:06:42', '2023-12-17 09:06:42'),
(30, 12, 'A2', 'no', NULL, NULL, '2023-12-17 09:06:42', '2023-12-17 09:06:42'),
(34, 9, 'A1', 'yes', '1704025620', 1, '2023-12-18 12:03:17', '2023-12-30 00:27:54'),
(35, 9, 'A3', 'yes', '1703590740', 2, '2023-12-18 12:03:17', '2023-12-24 23:40:11'),
(36, 9, 'A4', 'yes', '1703963100', 1, '2023-12-18 12:03:17', '2023-12-29 07:18:27'),
(84, 11, 'B1', 'no', NULL, NULL, '2023-12-22 09:43:03', '2023-12-22 09:43:03'),
(85, 11, 'H1', 'no', NULL, NULL, '2023-12-22 09:43:03', '2023-12-22 09:43:03'),
(86, 11, 'j1', 'no', NULL, NULL, '2023-12-22 09:43:25', '2023-12-22 09:43:25'),
(87, 11, 'j2', 'no', NULL, NULL, '2023-12-22 09:43:25', '2023-12-22 09:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT '#',
  `twitter` varchar(255) DEFAULT '#',
  `instagram` varchar(255) DEFAULT '#',
  `linkedin` varchar(255) DEFAULT '#',
  `youtube` varchar(255) DEFAULT '#',
  `behance` varchar(255) DEFAULT '#',
  `dribbble` varchar(255) DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `behance`, `dribbble`, `created_at`, `updated_at`) VALUES
(1, 'facebook.com', 'twitter.com', '#', 'linkedin.com', '#', 'behance.com', 'dribbble.com', NULL, '2023-12-30 08:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `transation_infos`
--

CREATE TABLE `transation_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `slot_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `slot_number` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'BDT',
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` enum('pending','confirmed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transation_infos`
--

INSERT INTO `transation_infos` (`id`, `user_id`, `slot_id`, `name`, `email`, `phone`, `start_time`, `end_time`, `slot_number`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_number`, `order_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'Tonmoy', 'admin@gmail.com', '12345566666', '2023-12-19T00:00', '2023-12-20T00:00', 'A1', 'online', 'Stripe', 'PK-e5DQyIQz', 'BDT', 4800.00, NULL, 'ch_3OOl7MIHJUOLArKT1xzKPhKW', '1702922452', 'confirmed', '2023-12-18 12:00:52', '2023-12-18 12:00:52'),
(2, 1, 9, 'Tonmoy', 'admin@gmail.com', '12345566666', '2023-12-19T00:22', '2023-12-20T00:22', 'A1', 'online', 'Stripe', 'PK-XLMmiR2S', 'BDT', 4800.00, NULL, 'ch_3OOlW8IHJUOLArKT1yP0goC4', '1702923985', 'confirmed', '2023-12-18 12:26:25', '2023-12-18 12:26:25'),
(3, 1, 9, 'Tonmoy', 'admin@gmail.com', '12345566666', '2023-12-24T13:00', '2023-12-25T01:00', 'A1', 'online', 'Stripe', 'PK-QXLecDjE', 'BDT', 2400.00, NULL, 'ch_3OQliZIHJUOLArKT0KosLIkO', '1703401412', 'confirmed', '2023-12-24 01:03:32', '2023-12-24 01:03:32'),
(4, 2, 14, 'Beverly Hills', 'bhills_2288@mailinator.com', '1333', '2023-12-24T23:00', '2023-12-27T23:00', 'A1', 'online', 'Stripe', 'PK-wGeEbvXt', 'BDT', 15192.00, NULL, 'ch_3OQv4MIHJUOLArKT1SpipTEq', '1703437360', 'confirmed', '2023-12-24 11:02:40', '2023-12-24 11:02:40'),
(5, 2, 9, 'Beverly Hills', 'bhills_2288@mailinator.com', '1333', '2023-12-25T11:38', '2023-12-26T11:39', 'A3', 'online', 'Stripe', 'PK-xV0Gso8j', 'BDT', 4803.00, NULL, 'ch_3OR6tOIHJUOLArKT0SSZw133', '1703482811', 'confirmed', '2023-12-24 23:40:11', '2023-12-24 23:40:11'),
(6, 1, 9, 'Tonmoy', 'admin@gmail.com', '12345566666', '2023-12-29T19:05', '2023-12-30T19:05', 'A4', 'Cash', 'Cash', 'PK-sjyFJI7S', 'BDT', 4800.00, NULL, 'Ch-efSdJA8v', '1703855907', 'confirmed', '2023-12-29 07:18:27', '2023-12-29 08:16:06'),
(21, 1, 9, 'Tonmoy', 'admin@gmail.com', '12345566666', '2023-12-30T12:27', '2023-12-31T12:27', 'A1', 'Online', 'Online', 'PK-ZAmb9E68', 'BDT', 4800.00, NULL, 'PK-tW0VGHPF', '1703917674', 'confirmed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `nid` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `role` enum('admin','landowner','user') NOT NULL DEFAULT 'user',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=inactive, 1=active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `nid`, `address`, `photo`, `role`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tonmoy', 'admin@gmail.com', '12345566666', '123456', 'Mirpur-14, Dhaka-1200', '1701699570-user.png', 'admin', '1', NULL, '$2y$12$qCwLvqdSBL/PSkZnVZH8OOvD/QcF8hBuGHhFIXEkVTDMeOvXDcs6W', 'ldt0g1HLgvIVgawSAaXhEPsxk6iINu2CCpT7OiKAnTCyL0cyDWdETlnymKEf', NULL, '2023-12-27 01:07:43'),
(2, 'Beverly Hills', 'bhills_2288@mailinator.com', '1333', 'Beverly Hills', NULL, NULL, 'user', '1', NULL, '$2y$12$DNQPObXu5XOH3m273rg6D.VR5VZGgZEwH06QRFJVaWE6L/bhgcUZq', 'laMJWa1i0lMbW0B6ms17gnN7bt0vsorcKsMGKXKCqLp1mDu0F0qbgNIB5n9R', '2023-11-15 23:03:49', '2023-12-27 01:07:45'),
(3, 'User', 'user@gmail.com', '24234', '12121212', NULL, '1701086235-user.jpg', 'user', '1', NULL, '$2y$12$L6aYMOvEo1Y9p0r.7Cw0MeBK/HpULaMk0vQdmwLc6uH4ZkOyxA.Oq', 'gfcCM3k7ePJWpYNp2ALtXmpmUdAt8Is3pBeA0cx0sPixef3pZmNOlhotj6Jf', '2023-11-18 09:45:30', '2023-11-27 05:57:17'),
(7, 'bhills_7135', 'bhills_7135@mailinator.com', NULL, '1234', NULL, NULL, 'user', '1', NULL, '$2y$12$05EcdaAX5zEG950r354TPech0zpPTVKnKO9xmHhCGN.GiobtgeANe', NULL, '2023-12-30 01:02:11', '2023-12-30 01:02:11'),
(8, 'bhills_5813', 'bhills_5813@mailinator.com', NULL, '111111111', NULL, NULL, 'user', '1', NULL, '$2y$12$8RZ83Ms5NWeM3P6tQJo.7OYISHcvDTS3Bz1UxD3mmsS7uCkgaXlGG', NULL, '2023-12-30 01:03:32', '2023-12-30 01:03:32'),
(10, 'bhills_9717', 'bhills_9717@mailinator.com', NULL, '2123455646', NULL, NULL, 'user', '1', NULL, '$2y$12$3e85DOVw2GuW/Id4bAzo5uQFltlW1j9Qt5Z6zvmuBO9I3zGMkiO1q', NULL, '2023-12-30 01:14:45', '2023-12-30 01:14:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
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
-- Indexes for table `parking_images`
--
ALTER TABLE `parking_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parking_slots`
--
ALTER TABLE `parking_slots`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transation_infos`
--
ALTER TABLE `transation_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nid_unique` (`nid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `f_a_q_s`
--
ALTER TABLE `f_a_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `parking_images`
--
ALTER TABLE `parking_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parking_slots`
--
ALTER TABLE `parking_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transation_infos`
--
ALTER TABLE `transation_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
