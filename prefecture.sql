-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydata`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `prefecture`
--

CREATE TABLE `prefecture` (
  `prefecture_id` int(11) NOT NULL,
  `prefecture_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `prefecture`
--

INSERT INTO `prefecture` (`prefecture_id`, `prefecture_name`) VALUES
(1, '北海道'),
(2, '青森'),
(3, '岩手'),
(4, '宮城'),
(5, '秋田'),
(6, '山形'),
(7, '福島'),
(8, '東京'),
(9, '神奈川'),
(10, '埼玉'),
(11, '千葉'),
(12, '茨城'),
(13, '栃木'),
(14, '群馬'),
(15, '山梨'),
(16, '新潟'),
(17, '長野'),
(18, '富山'),
(19, '石川'),
(20, '福井'),
(21, '愛知'),
(22, '岐阜'),
(23, '静岡'),
(24, '三重'),
(25, '大阪'),
(26, '兵庫'),
(27, '京都'),
(28, '滋賀'),
(29, '奈良'),
(30, '和歌山'),
(31, '鳥取'),
(32, '島根'),
(33, '岡山'),
(34, '広島'),
(35, '山口'),
(36, '徳島'),
(37, '香川'),
(38, '愛媛'),
(39, '高知'),
(40, '福岡'),
(41, '佐賀'),
(42, '長崎'),
(43, '熊本'),
(44, '大分'),
(45, '宮崎'),
(46, '鹿児島'),
(47, '沖縄');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prefecture`
--
ALTER TABLE `prefecture`
  ADD PRIMARY KEY (`prefecture_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prefecture`
--
ALTER TABLE `prefecture`
  MODIFY `prefecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
