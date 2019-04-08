-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 �?04 �?08 �?09:09
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
-- 表的结构 `bc_api`
--

CREATE TABLE IF NOT EXISTS `bc_api` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `unionid` int(10) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `isshow` int(10) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `info` text NOT NULL,
  `order` int(11) NOT NULL,
  `other` varchar(255) NOT NULL,
  `uid` int(10) NOT NULL DEFAULT '1',
  `aid` int(10) NOT NULL,
  `mid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=47 ;

--
-- 转存表中的数据 `bc_api`
--

INSERT INTO `bc_api` (`id`, `unionid`, `admin`, `isshow`, `addtime`, `info`, `order`, `other`, `uid`, `aid`, `mid`) VALUES
(1, 1, 'admin', 1, '2019-03-31 14:16:10', '{''msg'':2019}', 1, '', 1, 0, 1),
(2, 1, 'admin', 0, '2019-03-31 14:20:11', '{''appid'':wx2019}', 1, '', 1, 0, 1),
(3, 1, 'admin', 0, '2019-03-31 14:20:14', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(4, 1, 'admin', 0, '2019-03-31 14:20:15', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(5, 1, 'admin', 0, '2019-03-31 14:20:16', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(6, 1, 'admin', 0, '2019-03-31 14:20:17', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(7, 1, 'admin', 0, '2019-03-31 14:42:58', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(8, 1, 'admin', 0, '2019-03-31 14:43:00', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(9, 1, 'admin', 0, '2019-03-31 14:43:46', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(10, 1, 'admin', 0, '2019-03-31 14:47:21', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(11, 1, 'admin', 0, '2019-03-31 14:48:25', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(12, 1, 'admin', 0, '2019-03-31 14:53:32', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(13, 1, 'admin', 0, '2019-03-31 15:19:30', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(14, 1, 'admin', 0, '2019-03-31 15:25:58', '{''appid'':wx2019}', 1, '', 1, 0, 0),
(15, 1, '22', 0, '2019-03-31 15:27:57', '{"WenBen":"23"}', 1, '', 1, 0, 22),
(16, 1, '18', 0, '2019-03-31 15:28:41', '{"WenBen":"667"}', 1, '', 1, 0, 18),
(17, 1, '2', 0, '2019-03-31 15:29:03', '{"WenBen":"233"}', 1, '', 1, 0, 2),
(18, 1, '5', 0, '2019-03-31 15:29:12', '{"WenBen":"23"}', 1, '', 1, 0, 5),
(19, 1, '1', 0, '2019-03-31 15:30:19', '{"WenBen":"878778"}', 1, '', 1, 0, 1),
(20, 1, '1', 0, '2019-03-31 15:30:22', '{"WenBen":"878778"}', 1, '', 1, 0, 1),
(21, 1, '2', 0, '2019-03-31 15:30:49', '{"WenBen":"233232"}', 12, '', 1, 0, 2),
(22, 1, '4', 0, '2019-03-31 15:30:53', '{"WenBen":"23322"}', 12, '', 1, 0, 4),
(23, 1, '5', 0, '2019-03-31 15:30:56', '{"WenBen":"11212"}', 12, '', 1, 0, 5),
(24, 1, '1', 0, '2019-03-31 15:31:17', '{"WenBen":"wxsaa"}', 12, '', 1, 0, 1),
(25, 1, '1', 0, '2019-03-31 15:31:23', '{"WenBen":"wxaaa5665"}', 12, '', 1, 0, 1),
(26, 1, '1', 0, '2019-03-31 15:31:29', '{"WenBen":"aaa334"}', 12, '', 1, 0, 1),
(27, 1, '22', 1, '2019-03-31 15:56:12', '{"WenBen":"666"}', 12, '', 1, 0, 22),
(28, 1, '23', 1, '2019-03-31 15:56:19', '{"WenBen":"555"}', 12, '', 1, 0, 23),
(29, 1, '40', 1, '2019-04-02 07:05:14', '{"KaiGuan":true,"DanXuan":"0","DuoXuan":["2"]}', 12, '', 1, 0, 40),
(30, 1, '41', 1, '2019-04-02 07:22:48', '{"NaRong":"<p>22332</p>\\n<p>2<b>323</b></p>"}', 12, '', 1, 0, 41),
(31, 1, '21', 1, '2019-04-02 07:48:51', '{"WenBen":"2332"}', 2, '', 1, 0, 21),
(32, 1, '21', 1, '2019-04-02 07:49:20', '{"WenBen":"32323"}', 2, '', 1, 0, 21),
(33, 2, '22', 0, '2019-04-02 07:58:31', '{"WenBen":"2332"}', 0, '', 1, 0, 22),
(34, 2, '22', 0, '2019-04-02 07:58:35', '{"WenBen":"233233"}', 0, '', 1, 0, 22),
(35, 2, '25', 1, '2019-04-02 08:22:00', '{"WenBenapp":"3434","WenBen":"344"}', 0, '', 1, 0, 25),
(36, 2, '21', 1, '2019-04-02 08:22:13', '{"WenBen":"3434"}', 0, '', 1, 0, 21),
(37, 2, '22', 1, '2019-04-02 08:22:18', '{"WenBen":"34344"}', 0, '', 1, 0, 22),
(38, 2, '23', 1, '2019-04-02 08:22:31', '{"WenBen":"3434"}', 0, '', 1, 0, 23),
(39, 2, '23', 1, '2019-04-02 08:22:33', '{"WenBen":"3434"}', 0, '', 1, 0, 23),
(40, 2, '21', 0, '2019-04-02 08:24:24', '{"WenBen":"2332"}', 0, '', 1, 0, 21),
(41, 1, '42', 1, '2019-04-02 08:28:22', '{"XiaLa":"yaogao"}', 0, '', 1, 0, 42),
(42, 1, '42', 1, '2019-04-02 08:38:15', '{"XiaLa":"yaogao"}', 0, '', 1, 0, 42),
(43, 1, '47', 1, '2019-04-02 15:27:41', '{"WenBen":"8888888888888888888888888888888845454444444444444444444444444444444444444444444444444444444"}', 0, '', 1, 0, 47),
(44, 1, '47', 1, '2019-04-05 09:04:36', '{"WenBen":"999"}', 3, '', 1, 0, 47);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
