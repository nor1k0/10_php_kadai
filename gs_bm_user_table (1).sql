-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 19 日 12:34
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `php_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_user_table`
--

CREATE TABLE `gs_bm_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_user_table`
--

INSERT INTO `gs_bm_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', '$2y$10$xlN3GZ8yqSZNnUaHAfD7LeP4YpRLrv0ioIS3DVOCaA1rPSn0Y5fTu', 0, 0),
(4, '和田', 'wada', '123', 0, 0),
(5, '和田典子', 'wada', '$2y$10$2e/s5oOqxkBo2p1Gy0cUd.YD8DYVS4p7LJ2d3c8.Y4vdKatA5tSVS', 0, 0),
(6, '和田典子', 'n.wada', '$2y$10$maDorzZpjjWn6HWPbRBJge2t73ik2QMh46PdZ5Cj21sNYlT57dxAu', 1, 0),
(7, '田中花子', 'h.tanaka', '$2y$10$2XUi7Qcxek0qKoR89d729.36s7c.Oc/AeLJuzt/Db7gNSpfKaiDra', 0, 0),
(8, '佐藤太郎', 't.sato', '$2y$10$g.6zk0wBDptj0UNABfFOqeZ/cjMqcKrgp47ydiyOt45QS99Ii0OlS', 0, 0),
(9, '田中', 'tanaka', '$2y$10$bS2fT8bShxub4u9sYD70aefp..pEOcErQx4kzBfXpgOsggSlIryHW', 0, 0),
(10, 'tanaka', 'r', '$2y$10$jswWEUlT5xvKSCXvxhYWBuB52k1Hw4ywCa8Zmc82hcRYJF9PtEgLu', 0, 0),
(11, 'test1', '', '$2y$10$HAiHo4HoDZI9iowsNVwSHOuo8BqhCdp90uC4h8HiT4y85oOSq4ed2', 0, 0),
(12, 'test2', '1', '$2y$10$0ZZ422aDk1IjYi3QImHoXOU6XPyHuGONu8zkL24kE0xVphcVJ8yt6', 1, 0),
(13, 'test1', '２', '$2y$10$CTRm71J.RossJC9lGzs5teWTVaTzUh0I7hzQD3zdzKIBy/uLitQSu', 1, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_user_table`
--
ALTER TABLE `gs_bm_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_user_table`
--
ALTER TABLE `gs_bm_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
