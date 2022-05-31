-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2022 年 5 月 31 日 06:45
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `卒業制作`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Contact_form`
--

CREATE TABLE `Contact_form` (
  `id` int(11) NOT NULL,
  `company_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `Department` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `industry` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `use_bim` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `administrative_divisions` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `e_mail` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `TEL` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `FAX` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `support` int(1) NOT NULL,
  `comment` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `Contact_form`
--

INSERT INTO `Contact_form` (`id`, `company_name`, `Department`, `industry`, `use_bim`, `postal_code`, `administrative_divisions`, `address`, `name`, `e_mail`, `TEL`, `FAX`, `support`, `comment`, `created_at`) VALUES
(1, 'NR興業', '現場監督', '足場', 'gloobe', '8140012', '福岡県', '福岡市早良区昭代', '奈須　冬吾', 'togo@xxx.com', '000-0000-0000', '0000-00-0000', 1, '99999999999', '2022-05-23 15:22:57'),
(3, 'showcase', '代表取締役社長', '販売業', 'なし', '8220001', '群馬県', '直方市感田', '伊豆丸 勝也', 'katyuyan@xxx.com', '3450346', '56635435', 0, '厳しいぽよ', '2022-05-24 03:34:35'),
(5, 'nasnasau', 'nashi', 'it', 'rebit', '8230015', '福岡県', '宮若市上有木', '奈須冬吾', 'nar@xxx.com', '000000000', '9999999', 0, 'もう眠いけど\r\nコードを書く', '2022-05-27 01:06:48'),
(7, 'test', 'test', '足場', 'なし', '8000025', '福岡県', '北九州市門司区柳町', '奈須冬吾', 'test@example.com', '000000000', '9999999', 0, 'もう帰りたい', '2022-05-27 18:15:14'),
(9, 'test', 'test', 'tse', 'なし', '1200012', '青森県', '足立区青井', '奈須冬吾', 'test@example.com', '000000000', '9999999', 0, 'お腹が空いた', '2022-05-27 18:34:32'),
(10, 'どきどき', 'どきどき', '不動産', 'なし', '1140012', '東京都', '北区田端新町', '港区 女子', 'minatoku@example.com', '000000000', '9999999', 0, 'スイーツが食べたい', '2022-05-30 16:26:53'),
(11, 'どきどき', 'どきどき', 'test', 'test', '1140014', '東京都', '北区田端', '港区 女子', 'test@example.com', '000000000', '9999999', 0, '私嘘つかない', '2022-05-30 16:28:06'),
(12, '（株）建築設計事務所', '設計部部長', '設計', 'JwCAD', '8140002', '福岡県', '福岡市早良区西新1-9-11', '田中 とも', 'tanaka@eximple.com', '000000000', '9999999', 0, 'お客さん呼び込んでほしい', '2022-05-30 20:24:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `todoufuken_table`
--

CREATE TABLE `todoufuken_table` (
  `id` int(2) NOT NULL,
  `todofuken_number` int(2) NOT NULL,
  `name` varchar(8) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `todoufuken_table`
--

INSERT INTO `todoufuken_table` (`id`, `todofuken_number`, `name`) VALUES
(1, 1, '北海道'),
(2, 2, '青森県'),
(3, 3, '岩手県'),
(4, 4, '宮城県'),
(5, 5, '秋田県'),
(6, 6, '山形県'),
(7, 7, '福島県'),
(8, 8, '茨城県'),
(9, 9, '栃木県'),
(10, 10, '群馬県'),
(11, 11, '埼玉県'),
(12, 12, '千葉県'),
(13, 13, '東京都'),
(14, 14, '神奈川県'),
(15, 15, '新潟県'),
(16, 16, '富山県'),
(17, 17, '石川県'),
(18, 18, '福井県'),
(19, 19, '山梨県'),
(20, 20, '長野県'),
(21, 21, '岐阜県'),
(22, 22, '静岡県'),
(23, 23, '愛知県'),
(24, 24, '三重県'),
(25, 25, '滋賀県'),
(26, 26, '京都府'),
(27, 27, '大阪府'),
(28, 28, '兵庫県'),
(29, 29, '奈良県'),
(30, 30, '和歌山県'),
(31, 31, '鳥取県'),
(32, 32, '島根県'),
(33, 33, '岡山県'),
(34, 34, '広島県'),
(35, 35, '山口県'),
(36, 36, '徳島県'),
(37, 37, '香川県'),
(38, 38, '愛媛県'),
(39, 39, '高知県'),
(40, 40, '福岡県'),
(41, 41, '佐賀県'),
(42, 42, '長崎県'),
(43, 43, '熊本県'),
(44, 44, '大分県'),
(45, 45, '宮崎県'),
(46, 46, '鹿児島県'),
(47, 47, '沖縄県');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'nas', 'password', 1, 0, '2022-05-29 12:43:17', '2022-05-29 12:43:17'),
(2, 'nas1', 'password', 0, 0, '2022-05-29 12:43:17', '2022-05-29 12:43:17'),
(3, 'nas2', 'password', 0, 0, '2022-05-29 18:41:05', '2022-05-29 18:41:05');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `Contact_form`
--
ALTER TABLE `Contact_form`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todoufuken_table`
--
ALTER TABLE `todoufuken_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `Contact_form`
--
ALTER TABLE `Contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `todoufuken_table`
--
ALTER TABLE `todoufuken_table`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
