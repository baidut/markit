-- 注意本文件的编码为utf-8 否则导入数据库乱码

--
-- 选择应用数据库
--
USE `app_markit`;

-- --------------------------------------------------------

--
-- 表的结构 `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('1ebeca6245d56c6f7ae73f1b7966aea6', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36', 1419139612, 'a:3:{s:9:"user_data";s:0:"";s:22:"flash:new:captcha_word";s:8:"Iy01HiNA";s:22:"flash:new:captcha_time";d:1419139647.163928985595703125;}');

-- --------------------------------------------------------

--
-- 表的结构 `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', '201181086', '2014-12-21 05:27:18'),
(2, '::1', '201181086', '2014-12-21 05:27:19');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'Jack', '123456', NULL),
(2, 'Bob', '123456', NULL),
(3, 'Tommy', 'tommy', 'tom@163.com'),
(4, 'lili', '123456', 'lili@163.com'),
(5, 'xiaoq', '123456', 'xiaoq@163.com'),
(6, 'wangx', '123456', 'xiaoq@163.com'),
(7, 'hello', '123456', 'hello@163.com'),
(8, 'dgdffgd', '123456', 'jiji@133.com'),
(9, 'thankyou', '123456', 'thankyou@163.com'),
(10, '1234', 'dddddd', '18018985037@163.com');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

-- --------------------------------------------------------

--
-- 表的结构 `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;