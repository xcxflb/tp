-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 �?04 �?08 �?09:10
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `agent`
--

-- --------------------------------------------------------

--
-- 表的结构 `bc_wxapp`
--

CREATE TABLE IF NOT EXISTS `bc_wxapp` (
  `id` int(11) NOT NULL,
  `appid` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `desc` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `isshow` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `game_type` int(10) NOT NULL DEFAULT '1',
  `app_name` varchar(255) NOT NULL,
  `version` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bc_wxapp`
--

INSERT INTO `bc_wxapp` (`id`, `appid`, `order`, `addtime`, `desc`, `img`, `uname`, `isshow`, `token`, `game_type`, `app_name`, `version`) VALUES
(1, 'wx20012', 1, '2019-04-04 11:37:59', '一个测试', '', 'admin', 1, 'adaswe12wwe2aa', 1, 'wechat', 0),
(0, 'wx', 0, '2019-04-04 12:12:25', '3434', '', '', 1, '', 1, '微信应用', 0),
(0, 'wxformmodel', 12, '2019-04-07 13:19:36', '3434', '', 'admin', 1, '', 1, '微信表单', 0),
(0, 'wxplane', 10, '2019-04-07 13:19:38', '3434', '', 'admin', 1, '', 1, '微信飞机大战', 0),
(0, 'wxcaicai', 3, '2019-04-07 13:19:00', '3434232', '', 'admin', 0, '', 1, '微信猜谜语', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
