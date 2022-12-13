-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 08:01 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recycon`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `item_id`, `created_at`, `updated_at`, `product_img`, `product_name`, `description`, `price`, `category`) VALUES
(1, 'ITEM001', NULL, NULL, 'https://modpodgerocksblog.com/wp-content/uploads/2012/01/Cell-phone-holder-from-lotion-bottle.jpg.webp', 'Gantungan HP', 'Gantungan HP dari bahan ramah lingkungan', 20000, 'Recycle'),
(2, 'ITEM002', NULL, NULL, 'https://www.springwise.com/wp-content/uploads/2018/07/ecoBirdy_childrens-chair_springwise.jpeg', 'Charlie Chair', 'Charlie chair plastic, produksi tahun 2020', 50000, 'Second'),
(3, 'ITEM003', NULL, NULL, 'https://thumbs.dreamstime.com/z/products-made-recycled-kraft-paperand-wood-packages-notebook-disposable-coffee-\n                cup-wooden-heart-cord-concept-environmental-171409246.jpg', 'Paper Craft', 'Paper craft terbuat dari bahan ramah lingkungan', 70000, 'Recycle'),
(4, 'ITEM004', NULL, NULL, 'https://www.temankreasi.com/asset/images/gambar/3.jpg', 'Pembatas Buku', 'Pembatas buku lucu-lucu, harga murah meriah terbuat dari bahan ramah lingkungan', 15000, 'Recycle'),
(5, 'ITEM005', NULL, NULL, 'https://ceklist.id/wp-content/uploads/2022/02/Alat-Pembolong-Kertas-Perforator.jpg', 'Pembolong Kertas', 'Pembolong kertas bekas, kualitas original', 60000, 'Second'),
(6, 'ITEM006', NULL, NULL, 'https://i0.wp.com/kayu-seru.com/wp-content/uploads/2020/10/Meja-Belajar-Kayu.jpg?fit=600%2C600&ssl=1', 'Meja Belajar Kecil', 'Meja belajar bekas ukuran kecil, terbuat 100% dari kayu asli', 100000, 'Second');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
