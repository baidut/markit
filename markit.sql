-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 12 月 17 日 06:24
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
CREATE DATABASE IF NOT EXISTS `markit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
  `createtime` datetime DEFAULT NULL,
  `usernum` int(11) DEFAULT NULL,
  PRIMARY KEY (`markid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `mark`
--

INSERT INTO `mark` (`markid`, `title`, `link`, `createby`, `createtime`, `usernum`) VALUES
(1, 'baidu', 'http://www.baidu.com', NULL, NULL, NULL),
(2, 'Github', 'https://github.com', NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'Jack', '123456', NULL),
(2, 'Bob', '123456', NULL),
(3, 'Tommy', 'tommy', 'tom@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `user_mark`
--

CREATE TABLE IF NOT EXISTS `user_mark` (
  `userid` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `action` enum('create','add','remove') NOT NULL,
  PRIMARY KEY (`userid`,`markid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
