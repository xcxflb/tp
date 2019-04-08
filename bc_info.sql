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
-- 表的结构 `bc_info`
--

CREATE TABLE IF NOT EXISTS `bc_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=ARCHIVE  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `bc_info`
--

INSERT INTO `bc_info` (`id`, `info`, `time`, `order`) VALUES
(1, 'eyJqc29uIjoiNjU2In0=', '2019-03-25 09:16:43', 0),
(2, 'eyJqc29uIjoiNjU2In0=', '2019-03-25 09:16:47', 0),
(3, 'eyJqc29uIjoiNjU2In0=', '2019-03-25 09:17:07', 0),
(4, 'eyJqc29uIjoiNjU2In0=', '2019-03-26 08:55:31', 0),
(5, '{"inline":false,"labelPosition":"right","labelWidth":"90px","size":"small","statusIcon":true,"formItemList":[{"type":"input","label":"文本","disabled":false,"readonly":false,"value":"","placeholder":"请输入一些文本","rules":[{"required":true,"message":"不能为空","trig', '2019-03-26 10:59:30', 0),
(6, '{"inline":false,"labelPosition":"right","labelWidth":"90px","size":"small","statusIcon":true,"formItemList":[{"type":"input","label":"文本","disabled":false,"readonly":false,"value":"","placeholder":"请输入一些文本","rules":[{"required":true,"message":"不能为空","trig', '2019-03-26 10:59:54', 0),
(7, '{"inline":false,"labelPosition":"right","labelWidth":"90px","size":"small","statusIcon":true,"formItemList":[{"type":"input","label":"文本","disabled":false,"readonly":false,"value":"","placeholder":"请输入一些文本","rules":[{"required":true,"message":"不能为空","trig', '2019-03-26 10:59:57', 0),
(8, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiOTBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-26 11:09:19', 0),
(9, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiOTBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-26 11:09:24', 0),
(10, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiOTBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-26 11:09:26', 0),
(11, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiOTBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-26 11:13:21', 0),
(12, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 05:53:22', 0),
(13, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 05:58:01', 0),
(14, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 05:58:23', 0),
(15, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 06:02:13', 0),
(16, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-30 06:25:36', 0),
(17, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-30 06:25:39', 0),
(18, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-30 06:25:40', 0),
(19, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 06:26:52', 0),
(20, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 06:26:54', 0),
(21, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2ZTM4XHU2MjBmXHU5MTRkXHU3ZjZ', '2019-03-30 06:26:57', 0),
(22, 'eyJpbmZvIjoie1wiaW5saW5lXCI6ZmFsc2UsXCJsYWJlbFBvc2l0aW9uXCI6XCJyaWdodFwiLFwibGFiZWxXaWR0aFwiOlwiODBweFwiLFwic2l6ZVwiOlwic21hbGxcIixcInN0YXR1c0ljb25cIjp0cnVlLFwiZm9ybUl0ZW1MaXN0XCI6W3tcInR5cGVcIjpcImlucHV0XCIsXCJsYWJlbFwiOlwiXHU2NTg3XHU2NzJjXCIsXCJkaXNhYmx', '2019-03-30 06:35:58', 0),
(23, 'eyJpbmxpbmUiOmZhbHNlLCJsYWJlbFBvc2l0aW9uIjoicmlnaHQiLCJsYWJlbFdpZHRoIjoiODBweCIsInNpemUiOiJzbWFsbCIsInN0YXR1c0ljb24iOnRydWUsImZvcm1JdGVtTGlzdCI6W3sidHlwZSI6ImlucHV0IiwibGFiZWwiOiLmlofmnKwiLCJkaXNhYmxlZCI6ZmFsc2UsInJlYWRvbmx5IjpmYWxzZSwidmFsdWUiOiIiLCJwbGF', '2019-03-30 06:53:47', 0),
(24, 'eyJpbmxpbmUiOmZhbHNlLCJsYWJlbFBvc2l0aW9uIjoicmlnaHQiLCJsYWJlbFdpZHRoIjoiODBweCIsInNpemUiOiJzbWFsbCIsInN0YXR1c0ljb24iOnRydWUsImZvcm1JdGVtTGlzdCI6W3sidHlwZSI6ImlucHV0IiwibGFiZWwiOiLmlofmnKwiLCJkaXNhYmxlZCI6ZmFsc2UsInJlYWRvbmx5IjpmYWxzZSwidmFsdWUiOiIiLCJwbGF', '2019-03-30 06:53:51', 0),
(25, 'eyJpbmxpbmUiOmZhbHNlLCJsYWJlbFBvc2l0aW9uIjoicmlnaHQiLCJsYWJlbFdpZHRoIjoiODBweCIsInNpemUiOiJzbWFsbCIsInN0YXR1c0ljb24iOnRydWUsImZvcm1JdGVtTGlzdCI6W3sidHlwZSI6ImlucHV0IiwibGFiZWwiOiLmlofmnKwiLCJkaXNhYmxlZCI6ZmFsc2UsInJlYWRvbmx5IjpmYWxzZSwidmFsdWUiOiIiLCJwbGF', '2019-03-30 06:53:56', 0),
(26, 'eyJpbmxpbmUiOmZhbHNlLCJsYWJlbFBvc2l0aW9uIjoicmlnaHQiLCJsYWJlbFdpZHRoIjoiODBweCIsInNpemUiOiJzbWFsbCIsInN0YXR1c0ljb24iOnRydWUsImZvcm1JdGVtTGlzdCI6W3sidHlwZSI6ImlucHV0IiwibGFiZWwiOiLmlofmnKwzMjMiLCJkaXNhYmxlZCI6ZmFsc2UsInJlYWRvbmx5IjpmYWxzZSwidmFsdWUiOiIiLCJ', '2019-03-30 06:54:27', 0),
(27, 'eyJpbmxpbmUiOmZhbHNlLCJsYWJlbFBvc2l0aW9uIjoicmlnaHQiLCJsYWJlbFdpZHRoIjoiODBweCIsInNpemUiOiJzbWFsbCIsInN0YXR1c0ljb24iOnRydWUsImZvcm1JdGVtTGlzdCI6W3sidHlwZSI6ImlucHV0IiwibGFiZWwiOiLmlofmnKwyMyIsImRpc2FibGVkIjpmYWxzZSwicmVhZG9ubHkiOmZhbHNlLCJ2YWx1ZSI6IiIsInB', '2019-03-30 07:01:48', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
