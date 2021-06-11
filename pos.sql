-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 09:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods_receipt`
--

CREATE TABLE `goods_receipt` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_order` int(10) UNSIGNED NOT NULL,
  `document_no` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goods_receipt`
--

INSERT INTO `goods_receipt` (`id`, `purchase_order`, `document_no`, `status`, `created_at`, `updated_at`) VALUES
(15, 15, 'GR-591397603', 2, '2021-05-26 19:39:40', '2021-05-26 19:40:02'),
(16, 16, 'GR-1170647011', 2, '2021-05-27 18:33:42', '2021-05-27 18:34:05'),
(17, 17, 'GR-1080008664', 2, '2021-05-27 18:40:52', '2021-05-27 18:41:18'),
(18, 18, 'GR-1436780210', 2, '2021-05-31 03:28:22', '2021-05-31 03:28:56'),
(19, 19, 'GR-202692633', 2, '2021-06-03 03:07:12', '2021-06-03 03:07:26');

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
(3, '2021_01_18_144046_create_supplier', 2),
(7, '2021_01_19_094551_create_table_po', 6),
(10, '2021_01_19_141213_m_status', 9),
(14, '2021_01_25_173241_table_sales', 13),
(18, '2021_01_26_141758_alter_sales', 17),
(21, '2014_10_12_000000_create_users_table', 18),
(22, '2014_10_12_100000_create_password_resets_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `m_produk`
--

CREATE TABLE `m_produk` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `minimal_stock` int(11) NOT NULL,
  `buy` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_produk`
--

INSERT INTO `m_produk` (`id`, `supplier`, `nama`, `kode`, `stock`, `minimal_stock`, `buy`, `harga`, `created_at`, `updated_at`) VALUES
(1, 2, 'DVD', '1135945574', 37, 10, 10000, 20000, '2021-01-18 11:16:53', '2021-05-26 01:14:20'),
(3, 2, 'Modem', '1723681420', 36, 15, 40000, 60000, '2021-01-19 01:12:03', '2021-05-22 00:22:56'),
(4, 4, 'Printer', '447826102', 25, 15, 2000000, 2500000, '2021-01-30 16:23:59', '2021-02-09 17:22:01'),
(5, 3, 'Tinta Printer', '824563951', 27, 15, 100000, 1300000, '2021-01-30 16:24:40', '2021-02-07 17:22:11'),
(9, 7, 'Televisi', '655798807', 50, 25, 1200000, 1500000, '2021-02-01 08:23:45', '2021-02-09 17:27:59'),
(11, 10, 'Cpu', '1804693455', 28, 15, 1500000, 1800000, '2021-02-07 17:10:45', '2021-06-06 09:51:17'),
(13, 2, 'Hardisk', '422636698', 33, 17, 1000000, 1200000, '2021-02-09 17:39:30', '2021-02-10 17:31:00'),
(14, 3, 'CPU', '836500466', 19, 12, 100000, 120000, '2021-05-27 18:30:35', '2021-05-27 18:37:06'),
(15, 2, 'Keyboard', '714841997', 50, 12, 200000, 250000, '2021-06-03 03:02:14', '2021-06-03 03:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pending', NULL, NULL),
(2, 'Complete', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_supplier`
--

CREATE TABLE `m_supplier` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_supplier`
--

INSERT INTO `m_supplier` (`id`, `nama`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(2, 'PT. Grafika', 'Jl. Sangkarhurip No.70 Jakarta', '087925647864', '2021-01-18 09:27:33', '2021-02-01 08:18:13'),
(3, 'PT.Maju Subur', 'jl.kenangan indah No. 12 Bandung', '088892837381', '2021-01-29 20:45:21', '2021-02-09 17:19:54'),
(4, 'PT. Berkah Abadi', 'Jl.Jakarta No.65 Bandung', '089765534624', '2021-01-30 16:22:41', '2021-05-27 18:23:45'),
(7, 'PT. Indo Elektro', 'Jl. Sangkuriang 2 No.40 Cimahi', '089772561213', '2021-02-01 08:16:43', '2021-02-09 17:19:29'),
(8, 'PT. Elektro Jaya jaya', 'Jl. Melati No.47 Bandung Barat', '087522840854', '2021-02-01 08:19:27', '2021-02-09 17:37:31'),
(10, 'PT.Elektronik Tools', 'Jl.Mandarin no.40 Bandung', '089234712934', '2021-02-07 17:06:04', '2021-02-09 17:19:41'),
(12, 'PT. Surya Elektro', 'Jl. Gegerkaolng no. 34', '083288472309', '2021-02-09 17:17:08', '2021-02-09 17:17:08'),
(13, 'PT. ElektroCanggu', 'Jl. Soekarno Hatta No.12 Bandung', '088223492747', '2021-05-27 18:23:14', '2021-05-27 18:23:14');

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
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `no_telp`, `alamat`, `email`, `created_at`, `updated_at`) VALUES
(1, 'CV. Subur Komputer', '08877987647', 'Jl.Jakarta no. 15 Jakarta', 'dajip569@gmail.com', NULL, '2021-05-31 09:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `document_no` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `document_no`, `supplier`, `status`, `created_at`, `updated_at`) VALUES
(15, 'PO-1209222503', 10, 2, '2021-05-26 19:39:29', '2021-05-26 19:39:40'),
(16, 'PO-1508405877', 3, 2, '2021-05-27 18:32:44', '2021-05-27 18:33:42'),
(17, 'PO-1249581928', 10, 2, '2021-05-27 18:39:44', '2021-05-27 18:40:51'),
(18, 'PO-221375776', 10, 2, '2021-05-31 03:26:54', '2021-05-31 03:28:20'),
(19, 'PO-1930552984', 2, 2, '2021-06-03 03:06:46', '2021-06-03 03:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_line`
--

CREATE TABLE `purchase_order_line` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_order` int(10) UNSIGNED NOT NULL,
  `produk` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `buy` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_line`
--

INSERT INTO `purchase_order_line` (`id`, `purchase_order`, `produk`, `qty`, `buy`, `grand_total`) VALUES
(19, 15, 11, 2, 1500000, 3000000),
(20, 16, 14, 20, 100000, 2000000),
(21, 17, 11, 20, 1500000, 30000000),
(22, 18, 11, 7, 1500000, 10500000),
(23, 19, 15, 50, 200000, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_struk` varchar(115) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `no_struk`, `jumlah_bayar`, `kembalian`, `grand_total`, `created_at`, `updated_at`) VALUES
(19, '1603906926', 1900000, 100000, 1800000, '2021-05-26 19:42:09', '2021-05-26 19:42:09'),
(20, '299584224', 130000, 10000, 120000, '2021-05-27 18:37:06', '2021-05-27 18:37:06'),
(21, '16634260', 2000000, 200000, 1800000, '2021-05-31 03:40:25', '2021-05-31 03:40:25'),
(22, '21789813', 20000000, 18200000, 1800000, '2021-06-06 09:51:17', '2021-06-06 09:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `sales_line`
--

CREATE TABLE `sales_line` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales` int(10) UNSIGNED NOT NULL,
  `produk` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_line`
--

INSERT INTO `sales_line` (`id`, `sales`, `produk`, `harga`, `qty`, `grand_total`) VALUES
(21, 19, 11, 1800000, 1, 1800000),
(22, 20, 14, 120000, 1, 120000),
(23, 21, 11, 1800000, 1, 1800000),
(24, 22, 11, 1800000, 1, 1800000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`) VALUES
(5, 'Admin', 'Admin123@yahoo.com', NULL, '$2y$10$eskaxvrMvyeKPP5EpB9..eOz/Z.b..nddeEpHu46tbBZmCd8wFga2', NULL, '2021-05-26 19:24:34', '2021-05-26 19:24:34', 1),
(6, 'User', 'User123@yahoo.com', NULL, '$2y$10$U4pXmpgnXCbxoyCzJBqTquYz6nLCykmIzb8RJGNHyK4DlW04T2tkW', NULL, '2021-05-26 19:26:59', '2021-05-26 19:26:59', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods_receipt`
--
ALTER TABLE `goods_receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_produk`
--
ALTER TABLE `m_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_produk_supplier_foreign` (`supplier`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_supplier`
--
ALTER TABLE `m_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_status_foreign` (`status`);

--
-- Indexes for table `purchase_order_line`
--
ALTER TABLE `purchase_order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_line_purchase_order_foreign` (`purchase_order`),
  ADD KEY `purchase_order_line_produk_foreign` (`produk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_line`
--
ALTER TABLE `sales_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_line_sales_foreign` (`sales`),
  ADD KEY `sales_line_produk_foreign` (`produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods_receipt`
--
ALTER TABLE `goods_receipt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `m_produk`
--
ALTER TABLE `m_produk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_supplier`
--
ALTER TABLE `m_supplier`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchase_order_line`
--
ALTER TABLE `purchase_order_line`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sales_line`
--
ALTER TABLE `sales_line`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_produk`
--
ALTER TABLE `m_produk`
  ADD CONSTRAINT `m_produk_supplier_foreign` FOREIGN KEY (`supplier`) REFERENCES `m_supplier` (`id`);

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_status_foreign` FOREIGN KEY (`status`) REFERENCES `m_status` (`id`);

--
-- Constraints for table `purchase_order_line`
--
ALTER TABLE `purchase_order_line`
  ADD CONSTRAINT `purchase_order_line_produk_foreign` FOREIGN KEY (`produk`) REFERENCES `m_produk` (`id`),
  ADD CONSTRAINT `purchase_order_line_purchase_order_foreign` FOREIGN KEY (`purchase_order`) REFERENCES `purchase_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_line`
--
ALTER TABLE `sales_line`
  ADD CONSTRAINT `sales_line_produk_foreign` FOREIGN KEY (`produk`) REFERENCES `m_produk` (`id`),
  ADD CONSTRAINT `sales_line_sales_foreign` FOREIGN KEY (`sales`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
