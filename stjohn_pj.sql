-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2017 年 07 月 30 日 13:11
-- 伺服器版本: 10.1.24-MariaDB
-- PHP 版本： 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `stjohn_pj`
--

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_admin`
--

CREATE TABLE `stjohn_admin` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `stjohn_admin`
--

INSERT INTO `stjohn_admin` (`id`, `username`, `password`, `reg_date`) VALUES
(1, 'Koo', 'zaq12wsx', '2017-07-30 11:04:44');

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_attendents`
--

CREATE TABLE `stjohn_attendents` (
  `id` int(10) UNSIGNED NOT NULL,
  `mid` int(10) UNSIGNED NOT NULL,
  `did` int(10) UNSIGNED NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_duty`
--

CREATE TABLE `stjohn_duty` (
  `id` int(10) UNSIGNED NOT NULL,
  `dutyname` varchar(100) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` enum('finished','upcoming') DEFAULT 'upcoming',
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `stjohn_duty`
--

INSERT INTO `stjohn_duty` (`id`, `dutyname`, `starttime`, `endtime`, `state`, `note`) VALUES
(1, 'Com & Games HK', '2017-07-30 10:00:00', '2017-07-30 21:00:00', 'finished', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_meeting`
--

CREATE TABLE `stjohn_meeting` (
  `id` int(10) UNSIGNED NOT NULL,
  `eventname` varchar(100) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `state` enum('finished','upcoming') DEFAULT 'upcoming',
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_members`
--

CREATE TABLE `stjohn_members` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(100) NOT NULL,
  `title` varchar(20) NOT NULL,
  `tnum` tinyint(4) NOT NULL,
  `dutyHrs` tinyint(4) NOT NULL,
  `meetHrs` tinyint(4) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `stjohn_members`
--

INSERT INTO `stjohn_members` (`id`, `username`, `password`, `title`, `tnum`, `dutyHrs`, `meetHrs`, `reg_date`, `status`) VALUES
(1, 'Charles', '123456', 'M', 127, 0, 0, '2017-07-30 11:06:46', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `stjohn_notice`
--

CREATE TABLE `stjohn_notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` enum('finished','upcoming') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `stjohn_admin`
--
ALTER TABLE `stjohn_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stjohn_attendents`
--
ALTER TABLE `stjohn_attendents`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stjohn_duty`
--
ALTER TABLE `stjohn_duty`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stjohn_meeting`
--
ALTER TABLE `stjohn_meeting`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stjohn_members`
--
ALTER TABLE `stjohn_members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `stjohn_notice`
--
ALTER TABLE `stjohn_notice`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `stjohn_admin`
--
ALTER TABLE `stjohn_admin`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `stjohn_attendents`
--
ALTER TABLE `stjohn_attendents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `stjohn_duty`
--
ALTER TABLE `stjohn_duty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `stjohn_meeting`
--
ALTER TABLE `stjohn_meeting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `stjohn_members`
--
ALTER TABLE `stjohn_members`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `stjohn_notice`
--
ALTER TABLE `stjohn_notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
