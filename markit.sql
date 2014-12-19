-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 12 月 19 日 10:03
-- 服务器版本: 5.5.32
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `markit`
--
CREATE DATABASE IF NOT EXISTS `markit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `markit`;

-- --------------------------------------------------------

--
-- 表的结构 `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `markid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `link` varchar(128) NOT NULL,
  `createby` varchar(30) DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usernum` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`markid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `mark`
--

INSERT INTO `mark` (`markid`, `title`, `link`, `createby`, `createtime`, `usernum`) VALUES
(1, 'baidu', 'http://www.baidu.com', 'Jack', '2014-12-19 05:36:15', 1),
(2, 'Github', 'https://github.com', 'Jack', '2014-12-19 05:36:15', 1),
(7, '在php MYSQL中插入当前时间_php技巧_脚本之家', 'http://www.jb51.net/article/14058.htm', 'Jack', '0000-00-00 00:00:00', 1),
(8, 'CI简单的插入数据库操作(含详尽的思路流程分析和代码) - 教程发布与分享 - ', 'http://codeigniter.org.cn/forums/forum.php?mod=viewthread&tid=11745', 'Jack', '2014-12-19 05:37:42', 1),
(9, '来藏-最好用的网络收藏夹', 'http://www.laicang.com/', 'Jack', '2014-12-19 08:37:28', 1),
(10, 'php 逗号 分割字符串 - 春哥也编程 - 博客园', 'http://www.cnblogs.com/zcy_soft/archive/2010/10/27/1862105.html', 'Jack', '2014-12-19 09:00:41', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mark_tag`
--

CREATE TABLE IF NOT EXISTS `mark_tag` (
  `markid` int(11) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mark_tag`
--

INSERT INTO `mark_tag` (`markid`, `tag`) VALUES
(9, '来藏'),
(9, '网络收藏夹'),
(9, '免费网络收藏夹'),
(9, '收藏夹'),
(9, '书签'),
(9, '网络书签'),
(9, '免费网络书签'),
(9, '网站推广'),
(9, '网络推广'),
(9, '网站营销'),
(9, '网络营销'),
(10, 'php'),
(10, '编程'),
(10, '博客园');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'Jack', '123456', NULL),
(2, 'Bob', '123456', NULL),
(3, 'Tommy', 'tommy', 'tom@163.com'),
(4, 'lili', '123456', 'lili@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `user_mark`
--

CREATE TABLE IF NOT EXISTS `user_mark` (
  `userid` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(200) DEFAULT NULL,
  `markname` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`userid`,`markid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_mark`
--

INSERT INTO `user_mark` (`userid`, `markid`, `datetime`, `description`, `markname`) VALUES
(1, 7, '0000-00-00 00:00:00', 'mysql时间函数', '在php MYSQL中插入当前时间_php技巧_脚本之家'),
(1, 8, '2014-12-19 05:37:42', ' CI简单的插入数据库操作(含详尽的思路流程分析和代码) ,CodeIgniter 中国开发者社区', 'CI简单的插入数据库操作(含详尽的思路流程分析和代码) - '),
(1, 9, '2014-12-19 08:37:29', '来藏-为您提供免费网络收藏夹,帮助您收藏自己喜欢的网页,存放安全,永远不会丢失,还可以为您的网站增加外链,提高权重,欢迎您的使用。', '来藏-最好用的网络收藏夹'),
(1, 10, '2014-12-19 09:00:41', '<?php \r\n//利用 explode 函数分割字符串到数组 \r\n$source = "hello1,hello2,hello3,hello4,hello5";//按逗号分离字符串 ', 'php 逗号 分割字符串 - 春哥也编程 - 博客园');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
