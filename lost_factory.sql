-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-27 12:12:20
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `lost_factory`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs_table`
--

CREATE TABLE `bbs_table` (
  `id` int(11) NOT NULL,
  `bbs` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `place` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `machine` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `bbs_table`
--

INSERT INTO `bbs_table` (`id`, `bbs`, `date`, `place`, `machine`, `image`, `created_at`, `updated_at`) VALUES
(2, '急遽NL3000で加工しているCHAMBERにてねじ200mmマイクロメーターが必要になりました、公正記録と共に期日までに持ってきていただけると嬉しいです。持って来れる日時が分かり次第コメントを頂くことは可能でしょうか！？', '2021-12-31', '本社工場', 'NL3000', 'upload/20220127054707c7b32c8a366ddb9cec90617e976cf268.jpg', '2022-01-27 13:47:07', '2022-01-27 13:47:07'),
(4, '現在使用中の400mmデジタルノギスですが、不注意により落としてしまい一部破損してしまいました。計測自体は可能ではあるのですがメーカーへ修理、そして公正の後に使用した方が正確値が出るので、別のデジノギの手配を出来ればお願いします！', '2022-01-26', '第三工場', 'VTM1200', 'upload/20220127063939ad4c3918ff4f0e30eeb7af94c6698d3d.jpg', '2022-01-27 14:39:40', '2022-01-27 14:39:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `check_table`
--

CREATE TABLE `check_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lost_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `bbs_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `check_table`
--

INSERT INTO `check_table` (`id`, `user_id`, `lost_id`, `task_id`, `bbs_id`, `created_at`) VALUES
(16, 5, 11, 0, 0, '2022-01-21 10:35:17'),
(18, 5, 9, 0, 0, '2022-01-21 10:35:18'),
(25, 5, 8, 0, 0, '2022-01-21 10:51:17'),
(27, 5, 7, 0, 0, '2022-01-21 10:51:39'),
(36, 5, 4, 0, 0, '2022-01-24 18:31:59'),
(41, 5, 13, 0, 0, '2022-01-25 13:44:19'),
(47, 5, 3, 0, 0, '2022-01-26 18:57:31'),
(57, 5, 0, 4, 0, '2022-01-27 17:11:48'),
(62, 5, 0, 1, 0, '2022-01-27 17:15:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `lost_table`
--

CREATE TABLE `lost_table` (
  `id` int(11) NOT NULL,
  `lost` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `place` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `machine` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `lost_table`
--

INSERT INTO `lost_table` (`id`, `lost`, `date`, `place`, `machine`, `created_at`, `updated_at`) VALUES
(10, '1000mmノギス', '2022-01-12', '第三工場', 'VTM1200', '2022-01-14 17:06:46', '2022-01-14 17:06:46'),
(11, 'φ23ピンゲージ', '2022-01-20', '第二工場', 'DURA1', '2022-01-14 17:08:23', '2022-01-14 17:08:23'),
(12, 'マイクロシリンダー', '2022-01-13', '本社工場', 'VM5000', '2022-01-14 17:09:18', '2022-01-14 17:09:18'),
(13, 'φ40インサイト', '2022-01-15', '第二工場', 'NTX1000', '2022-01-20 15:45:50', '2022-01-20 15:45:50'),
(14, 'M8ねじゲージ', '2022-01-25', '本社工場', 'NL3000', '2022-01-24 19:19:07', '2022-01-24 19:19:07'),
(15, 'M12ねじゲージ', '2022-01-20', '本社工場', 'TAC950', '2022-01-27 09:44:38', '2022-01-27 09:44:38'),
(16, 'φ10ピンゲージ', '2022-01-27', '第二工場', 'MAM72', '2022-01-27 09:51:18', '2022-01-27 09:51:18'),
(17, 'M5ねじゲージ', '2022-01-21', '本社工場', 'NV5000', '2022-01-27 09:54:39', '2022-01-27 09:54:39'),
(18, 'φ23ピンゲージ', '2022-01-26', '第二工場', 'NH5000', '2022-01-27 10:58:57', '2022-01-27 10:58:57'),
(19, 'φ60ピンゲージ', '2022-01-26', '第二工場', 'SH503', '2022-01-27 11:00:13', '2022-01-27 11:00:13'),
(20, '800mmデジタルノギス', '2022-01-28', '第三工場', 'MCR', '2022-01-27 12:53:02', '2022-01-27 12:53:02'),
(21, 'M4ねじゲージ', '2022-01-27', '第三工場', 'MU8000', '2022-01-27 16:39:29', '2022-01-27 16:39:29'),
(22, '200mmマイクロメーター', '2022-01-29', '本社工場', 'A66', '2022-01-27 16:40:01', '2022-01-27 16:40:01'),
(23, 'φ32ピンゲージ', '2022-01-01', '本社工場', 'NL4000 ', '2022-01-27 18:04:36', '2022-01-27 18:04:36'),
(24, '400mmデジタルノギス', '2022-01-02', '第三工場', 'SL603B', '2022-01-27 18:06:23', '2022-01-27 18:06:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `task_table`
--

CREATE TABLE `task_table` (
  `id` int(11) NOT NULL,
  `task` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `place` varchar(11) COLLATE utf8mb4_bin NOT NULL,
  `machine` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `task_table`
--

INSERT INTO `task_table` (`id`, `task`, `date`, `place`, `machine`, `created_at`, `updated_at`) VALUES
(1, 'A66の200mmマイクロメーターをNL3000へ移動', '2022-01-27', '本社工場', 'NL3000', '2022-01-27 13:01:21', '2022-01-27 13:01:21'),
(4, 'NV5000のM5ねじゲージをMCRへ移動', '2022-01-28', '第三工場', 'MCR', '2022-01-27 16:45:56', '2022-01-27 16:45:56'),
(5, 'VTM1200の1000mmノギスをMCRへ移動', '2022-01-27', '第三工場', 'MCR', '2022-01-27 16:59:41', '2022-01-27 16:59:41'),
(6, 'NTX1000のφ40インサイトをNL3000へ移動', '2022-01-26', '本社工場', 'NL3000', '2022-01-27 17:01:32', '2022-01-27 17:01:32'),
(7, 'SL603Bの400mmデジタルノギスをTAC950へ移動', '2022-01-14', '本社工場', 'TAC950', '2022-01-27 17:01:46', '2022-01-27 17:01:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
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
(1, 'testuser01', '111111', 1, 0, '2022-01-12 19:26:36', '2022-01-12 19:26:36'),
(2, 'testuser02', '222222', 0, 0, '2022-01-12 19:26:36', '2022-01-12 19:26:36'),
(3, 'testuser03', '333333', 0, 0, '2022-01-12 19:26:36', '2022-01-12 19:26:36'),
(4, 'testuser04', '444444', 0, 0, '2022-01-12 19:26:36', '2022-01-12 19:26:36'),
(5, 'hibiki', '1234', 0, 0, '2022-01-12 19:26:46', '2022-01-12 19:26:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bbs_table`
--
ALTER TABLE `bbs_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `check_table`
--
ALTER TABLE `check_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `lost_table`
--
ALTER TABLE `lost_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `task_table`
--
ALTER TABLE `task_table`
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
-- テーブルの AUTO_INCREMENT `bbs_table`
--
ALTER TABLE `bbs_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `check_table`
--
ALTER TABLE `check_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- テーブルの AUTO_INCREMENT `lost_table`
--
ALTER TABLE `lost_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- テーブルの AUTO_INCREMENT `task_table`
--
ALTER TABLE `task_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
