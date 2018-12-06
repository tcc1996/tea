-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 03 月 24 日 17:32
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tea`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminer`
--

CREATE TABLE IF NOT EXISTS `adminer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `adminname` varchar(128) NOT NULL COMMENT '管理员用户名',
  `adminnum` varchar(128) NOT NULL COMMENT '管理员账户',
  `password` varchar(128) NOT NULL COMMENT 'MD5密码',
  `zspassword` varchar(128) NOT NULL COMMENT '真实密码',
  `eoc` int(10) NOT NULL COMMENT '管理员权限',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '加入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `adminer`
--

INSERT INTO `adminer` (`id`, `adminname`, `adminnum`, `password`, `zspassword`, `eoc`, `datetime`) VALUES
(1, 'tcc1996', 'tcc1996', 'e10adc3949ba59abbe56e057f20f883e', '123456', 0, '2018-01-16 23:35:10'),
(2, 'tester', 'test01', 'dcbacadf485c141a2b9b0028f2c0b2e1', 'tcc', 1, '2018-01-16 23:35:10'),
(3, 'cc', 'cc', 'dcbacadf485c141a2b9b0028f2c0b2e1', 'tcc', 0, '2018-01-24 02:09:30');

-- --------------------------------------------------------

--
-- 表的结构 `adminhit`
--

CREATE TABLE IF NOT EXISTS `adminhit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '管理员id',
  `ipadress` varchar(32) NOT NULL COMMENT 'ip地址',
  `sorf` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- 转存表中的数据 `adminhit`
--

INSERT INTO `adminhit` (`id`, `aid`, `ipadress`, `sorf`, `datetime`) VALUES
(1, 1, '127.0.0.1', 1, '2018-01-22 06:19:01'),
(43, 1, '127.0.0.1', 1, '2018-01-24 02:19:09'),
(42, 1, '127.0.0.1', 1, '2018-01-23 08:59:12'),
(37, 1, '::1', 0, '2018-01-23 03:01:39'),
(38, 1, '::1', 1, '2018-01-23 03:01:43'),
(39, 1, '::1', 1, '2018-01-23 03:08:50'),
(40, 1, '127.0.0.1', 1, '2018-01-23 03:09:13'),
(41, 1, '127.0.0.1', 1, '2018-01-23 05:30:52'),
(36, 1, '::1', 1, '2018-01-23 02:53:08'),
(44, 3, '::1', 1, '2018-01-26 03:17:55'),
(45, 1, '::1', 1, '2018-01-26 08:13:24'),
(46, 1, '127.0.0.1', 1, '2018-01-27 01:50:20'),
(47, 1, '127.0.0.1', 1, '2018-01-29 01:43:52'),
(48, 1, '127.0.0.1', 1, '2018-01-30 02:34:26'),
(49, 1, '127.0.0.1', 1, '2018-01-30 04:00:01'),
(50, 1, '127.0.0.1', 1, '2018-01-31 01:15:03'),
(51, 1, '127.0.0.1', 1, '2018-02-01 05:37:45'),
(52, 1, '127.0.0.1', 0, '2018-02-01 08:09:12'),
(53, 1, '127.0.0.1', 0, '2018-02-01 08:09:14'),
(54, 1, '127.0.0.1', 0, '2018-02-01 08:09:16'),
(55, 3, '127.0.0.1', 1, '2018-02-01 08:09:22'),
(56, 3, '127.0.0.1', 1, '2018-02-02 01:05:54'),
(57, 3, '127.0.0.1', 1, '2018-02-05 08:45:23'),
(58, 3, '127.0.0.1', 1, '2018-02-06 01:12:46'),
(59, 1, '127.0.0.1', 1, '2018-02-11 07:10:19'),
(60, 1, '127.0.0.1', 1, '2018-02-27 06:52:05'),
(61, 1, '127.0.0.1', 1, '2018-03-07 03:16:24'),
(62, 1, '127.0.0.1', 1, '2018-03-07 08:22:06');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `adminhit_view`
--
CREATE TABLE IF NOT EXISTS `adminhit_view` (
`id` int(10) unsigned
,`aid` int(10)
,`ipadress` varchar(32)
,`sorf` int(11)
,`datetime` timestamp
,`adminnum` varchar(128)
);
-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '添加产品的管理员编号',
  `cid` int(10) NOT NULL COMMENT '所在的分类',
  `productname` varchar(128) NOT NULL COMMENT '产品名',
  `isok` int(10) NOT NULL COMMENT '是否在出售',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `aid`, `cid`, `productname`, `isok`) VALUES
(1, 3, 4, 'red tea', 1);

-- --------------------------------------------------------

--
-- 表的结构 `product_all`
--

CREATE TABLE IF NOT EXISTS `product_all` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '产品详细id',
  `pid` int(10) NOT NULL COMMENT '对应的产品名',
  `producttem` varchar(24) NOT NULL COMMENT '产品温度',
  `productswt` varchar(24) NOT NULL COMMENT '甜度或口味',
  `productsize` int(10) NOT NULL COMMENT '产品大小',
  `productyj` varchar(32) NOT NULL COMMENT '产品原价',
  `productxj` varchar(32) NOT NULL COMMENT '产品现价',
  `isok` int(10) NOT NULL COMMENT '库存是否够用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `product_class`
--

CREATE TABLE IF NOT EXISTS `product_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '由哪个管理员创建',
  `classname` varchar(128) NOT NULL COMMENT '分类名',
  `isok` int(10) NOT NULL COMMENT '是否展示分类',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `product_class`
--

INSERT INTO `product_class` (`id`, `aid`, `classname`, `isok`, `datetime`) VALUES
(1, 1, 'test01', 1, '2018-01-30 08:17:46'),
(2, 1, 'test02', 1, '2018-01-30 08:24:23'),
(4, 1, 'test04', 1, '2018-01-30 08:58:56'),
(10, 3, 'test03', 1, '2018-02-01 09:19:21'),
(8, 1, 'test4', 0, '2018-01-30 09:33:00'),
(9, 1, 'ato1', 0, '2018-02-01 07:35:55');

-- --------------------------------------------------------

--
-- 表的结构 `product_his`
--

CREATE TABLE IF NOT EXISTS `product_his` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) NOT NULL COMMENT '执行操作的管理员',
  `op_table` int(10) NOT NULL COMMENT '所操作的表',
  `op_species` int(10) NOT NULL COMMENT '操作类型',
  `op_allid` int(10) NOT NULL COMMENT '所操作的详细产品',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `product_view`
--

CREATE TABLE IF NOT EXISTS `product_view` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `cid` int(10) NOT NULL COMMENT '所在的分类',
  `productname` varchar(128) NOT NULL COMMENT '产品名',
  `classname` varchar(128) NOT NULL COMMENT '分类名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `product_view`
--

INSERT INTO `product_view` (`id`, `cid`, `productname`, `classname`) VALUES
(1, 4, 'red tea', 'test04');

-- --------------------------------------------------------

--
-- 视图结构 `adminhit_view`
--
DROP TABLE IF EXISTS `adminhit_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `adminhit_view` AS select `a`.`id` AS `id`,`a`.`aid` AS `aid`,`a`.`ipadress` AS `ipadress`,`a`.`sorf` AS `sorf`,`a`.`datetime` AS `datetime`,`b`.`adminnum` AS `adminnum` from (`adminhit` `a` join `adminer` `b` on((`a`.`aid` = `b`.`id`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



















-- test
