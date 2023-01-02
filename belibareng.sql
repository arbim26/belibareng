-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 07:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belibareng`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'KZ7PEmREr2qhpyNH0hIxc0W6WbByygX1SYUuPT1T.jpg', 'Tentang Kami', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus fugiat, accusantium ex minima dicta pariatur ducimus autem, maxime excepturi deleniti tempore impedit modi sint earum neque doloribus, dolorem corporis? Provident dolorum nisi nesciunt praesentium odio eius consectetur quisquam, ipsa et dolorem repudiandae laboriosam, cupiditate, in iste quod voluptate obcaecati dolore? Iure, adipisci nostrum. Quam saepe maiores tenetur doloribus possimus laborum exercitationem, dignissimos sapiente commodi fuga ratione voluptas temporibus! Necessitatibus, eligendi corporis! Quisquam libero odio est veritatis illum optio a alias sit in quas explicabo voluptas sed, nam placeat expedita assumenda beatae magnam facere cum harum. Ut doloribus fugiat eveniet est!</p>', '2022-11-30 18:10:31', '2022-12-06 17:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `image`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(15, 'RWWzeQU5ADFszvCGMj1DOYw7f3YZbMFeJ34ARXZT.png', 'Data dari Kementrian, Mendag Akan Buka Hipermarket di Arab Saudi', '<p>UMKM akan maju pada tepatnya</p>', '0000-00-00', '2022-12-05 17:19:59', '2022-12-09 12:08:59'),
(16, '2oYYvkyVeP5a5lTgNCCBGZgjFaIxySpszi2i6EgD.png', 'UMKM berhap maju, Mendag Akan Buka Hipermarket di Arab Saudi', '<p>UMKM akan maju pada tepat nya</p>', '0000-00-00', '2022-12-05 17:20:13', '2022-12-09 12:10:10'),
(18, '0cGKf5117vbiVsBvTNRI65Uyo6CnHgjGZQhPoU5i.png', 'Bantu Pasarkan Produk UMKM, Mendag Akan Buka Hipermarket di Arab Saudi', '<p>UMKM maju bersama Generasi Indonesia</p>', '0000-00-00', '2022-12-09 12:08:21', '2022-12-09 12:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `produk_id` int(10) UNSIGNED NOT NULL,
  `qty` bigint(20) NOT NULL DEFAULT 0,
  `harga` bigint(20) NOT NULL DEFAULT 0,
  `total` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_tlp` varchar(255) NOT NULL,
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_19_064952_artikel', 1),
(6, '2022_10_25_082333_create_products_table', 1),
(7, '2022_10_28_073726_aboutusmigration', 1),
(8, '2022_10_31_065403_create_visis_table', 1),
(9, '2022_11_03_030029_create_misis_table', 1),
(10, '2022_11_03_033413_create_sliders_table', 1),
(11, '2022_11_30_033027_create_checkouts_table', 1),
(12, '2022_11_30_061827_create_carts_table', 1),
(13, '2022_12_12_043005_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, '3SrpBDpZRXnLMJDEKnbWVY6OurUsHn5oGKroujwS.png', 'Misi', '<p>Menjadiaknn yang mbeltjgklfn jlsfnjkflsgsgs</p>', '2022-12-04 17:02:43', '2022-12-04 17:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `no_invoice` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total` double(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `barang`, `harga`, `stock`, `content`, `created_at`, `updated_at`) VALUES
(1, 'aDukFe8ZdaCTigBH83dsB97llpSkX5jOzVw6ISAn.jpg', 'Minyak Goreng', 28000, 575, '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta fugiat perferendis minima sit eligendi delectus suscipit fuga, adipisci ipsum voluptatum dignissimos ratione, enim quam. Nostrum eaque est vero quaerat tenetur.</p>', '2022-12-05 17:22:10', '2022-12-05 17:25:12'),
(2, '4mSkLhBeNZjVZl2poSYGWHZWJfOW2omIMWnFv7dG.jpg', 'Tepung', 12000, 760, '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta fugiat perferendis minima sit eligendi delectus suscipit fuga, adipisci ipsum voluptatum dignissimos ratione, enim quam. Nostrum eaque est vero quaerat tenetur.</p>', '2022-12-05 17:22:41', '2022-12-05 17:25:02'),
(3, 'YAW3RI0XX6U2oh1BVFvUZ6drMvCuuJa3t3wvjzqW.jpg', 'Gula', 10000, 500, '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta fugiat perferendis minima sit eligendi delectus suscipit fuga, adipisci ipsum voluptatum dignissimos ratione, enim quam. Nostrum eaque est vero quaerat tenetur.</p>', '2022-12-05 17:25:48', '2022-12-05 17:25:48'),
(4, 'C0szLHlgOGEsnaobHSDpfaWbESsX7noYDhqUf1ex.jpg', 'Telur', 28000, 980, '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta fugiat perferendis minima sit eligendi delectus suscipit fuga, adipisci ipsum voluptatum dignissimos ratione, enim quam. Nostrum eaque est vero quaerat tenetur.</p>', '2022-12-05 17:26:29', '2022-12-05 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'xkIhOR7884gHZ8ampuHWCpZo5bPTyTbs8YEDWaqx.jpg', '2022-12-01 13:57:17', '2022-12-01 13:57:17'),
(3, 'ZGq4fUVI7qHR7JNMqcDRGFfNXZGYRjYZYXhEB07D.jpg', '2022-12-06 17:47:26', '2022-12-06 17:47:26'),
(4, 'oursLbZzpWki94zXXD3HExUL7reCjFFxbnkrB0rz.jpg', '2022-12-06 17:47:37', '2022-12-06 17:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01982198938', 1, '2022-12-19 21:14:19', '$2y$10$n.gyA.XbZqK2YO9WUqe.2eB5bd8K/cfZkeYSkveYB3WQWcEP/Sl7a', 'jOy7wTb0tuw3u4vu1SujnA9otAqvyYxSIgaSC5U7OOYSyYg2wgs79Bo7HEjD', '2022-12-19 21:14:19', '2022-12-19 21:14:19'),
(2, 'Bima', 'bima@gmail.com', '01982198939', 2, '2022-12-19 21:14:19', '$2y$10$CAYplTPzticSfthLAPvbquNGzIiJsArYGup6pokS/uS9jHo7GN2SG', 'A5EgmLbUiIHmP0aL1Kisni5LVwa7ESSfPxHc4Lbnfp3RZJmrmSpa7OaMdFvW', '2022-12-19 21:14:19', '2022-12-19 21:14:19'),
(3, 'Feby', 'feby@gmail.com', '01982198936', 2, '2022-12-19 21:14:19', '$2y$10$FhKRpSYKUWQGuUbFe8xa7O4Qvo45bvgrCfltPqvL3BC3/FPLIC5MG', 'G9UiXZD609zR5npDpRTgOAYpAHPcjWwv319aVz0Kw8NVIKMzAglgfbRNM5Zo', '2022-12-19 21:14:19', '2022-12-19 21:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `image`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'rGa3S0v4vUY6cLfuUcfuVCz4bnNQKw5nUDkUXkcc.png', 'Visi', '<p>Menjadikan Salah Satu Strartasdsadasdasdasdasdsa</p>', '2022-12-04 17:00:21', '2022-12-04 17:00:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_telp_unique` (`telp`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
