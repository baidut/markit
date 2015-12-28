-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-19 23:08:31
-- 服务器版本： 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markit`
--

-- --------------------------------------------------------

--
-- 表的结构 `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- 表的结构 `auth_login_attempts`
--

CREATE TABLE `auth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `contribution` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_users`
--

INSERT INTO `auth_users` (`id`, `ip_address`, `username`, `contribution`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', 2, '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1450557078, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', '応 振强', 11, '$2y$08$zOn4Z7RxYamx1qw3N2bbY.BTi4o4teT0iNjwiIr4UUPF0tZ7ihFY6', NULL, 'yingzhenqiang@163.com', NULL, NULL, NULL, NULL, 1449465516, 1450531125, 1, '振强', '応', '', ''),
(4, '::1', '关 丽媛', 0, '$2y$08$xXm59t.azWRDVnyKxRMpSeAmtwojp405M/M2dG9h73qMKAcgt6H4q', NULL, 'yingzhenqiang@gmail.com', NULL, NULL, NULL, NULL, 1449471105, NULL, 1, '丽媛', '关', '', ''),
(5, '::1', '程 徐媛', 4, '$2y$08$/RuKG3i8skFqcGVoCJAxoOObIUKA48vZKj6rhHFEKq/nmTxWsJY8C', NULL, 'chenxuyuan@163.com', NULL, NULL, NULL, NULL, 1449581421, 1450547458, 1, '徐媛', '程', '', ''),
(6, '::1', 'w ccandcc', 0, '$2y$08$XQVLFEEFQQTYruVQbv78TuEp3dyj2HrUqb12ubfGElNQdeSnnyXru', NULL, '1272864784@qq.com', NULL, NULL, NULL, 'mu01VWPZfXDwElJmdjoek.', 1449714882, 1450021039, 1, 'ccandcc', 'w', 'pku', '88888888');

-- --------------------------------------------------------

--
-- 表的结构 `auth_users_groups`
--

CREATE TABLE `auth_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_users_groups`
--

INSERT INTO `auth_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2);

-- --------------------------------------------------------

--
-- 表的结构 `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contributor` int(11) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `theme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mark`
--

INSERT INTO `mark` (`mark_id`, `title`, `url`, `datetime`, `contributor`, `value`, `theme_id`) VALUES
(2, 'Caltech Pedestrian Detection Benchmark', 'http://www.vision.caltech.edu/Image_Datasets/CaltechPedestri', '0000-00-00 00:00:00', 2, 1, 2),
(3, 'INRIA Pedestrian Detector', 'http://ttic.uchicago.edu/~smaji/projects/ped-detector/', '2015-12-07 15:02:09', 2, 1, 2),
(4, 'Single-Pedestrian Detection aided by Mul', 'http://www.ee.cuhk.edu.hk/~wlouyang/projects/ouyangWcvpr13Mu', '2015-12-08 03:10:52', 2, 1, 2),
(5, 'Pedestrian Detection 资源', 'http://www.cnblogs.com/yutenghit/archive/2012/07/03/2575261.html', '2015-12-08 03:13:25', 2, 2, 2),
(6, '源码 Pedestrian Detection with Spatially Pooled Features and Structured Ensemble Learning', 'https://github.com/chhshen/pedestrian-detection', '2015-12-08 03:18:59', 2, 3, 2),
(7, 'Piotr''s Computer Vision Matlab Toolbox', 'http://vision.ucsd.edu/~pdollar/toolbox/doc/', '2015-12-08 03:19:37', 2, 1, 2),
(8, 'Discriminatively trained deformable part models', 'http://www.cs.berkeley.edu/~rbg/latent/index.html', '2015-12-08 03:21:25', 2, 3, 2),
(9, 'ETH Pedestrian Dataset', 'https://data.vision.ee.ethz.ch/cvl/aess/dataset/', '2015-12-08 03:23:11', 2, 0, 2),
(10, 'IEEE Xplore Digital Library', 'http://ieeexplore.ieee.org/Xplore/home.jsp', '2015-12-08 03:23:22', 2, 1, 1),
(11, ' Springer Link', 'http://link.springer.com/', '2015-12-08 03:25:31', 2, 1, 1),
(12, '中国知网', 'http://www.cnki.net/', '2015-12-08 03:29:43', 2, 0, 1),
(13, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:33:02', 2, 0, 3),
(14, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:34:03', 2, 0, 3),
(15, 'PHP 开发规范', 'http://codeigniter.org.cn/user_guide/general/styleguide.html', '2015-12-08 09:04:46', 2, 0, 5),
(16, '在线JS/CSS/HTML压缩', 'http://tool.oschina.net/jscompress', '2015-12-08 11:15:10', 2, 0, 4),
(17, '在线正则表达式测试', 'http://tool.oschina.net/regex', '2015-12-08 11:16:19', 2, 0, 4),
(18, 'xampp配置局域网访问', 'http://www.cnblogs.com/tiny-bj/p/4092715.html', '2015-12-08 12:22:08', 2, 0, 7),
(19, '在这里写下你的反馈意见', '#', '2015-12-08 13:10:09', 2, 1, 8),
(21, 'Fast Zero Block Detection and Early CU Termination for HEVC Video Coding', 'http://ieeexplore.ieee.org/stamp/stamp.jsp?tp=&arnumber=6572177', '2015-12-13 01:57:40', 6, 1, 9),
(22, 'JavaScript: base64 encode and decode - JSFiddle', 'http://jsfiddle.net/gabrieleromanato/qaght/', '2015-12-18 12:25:00', 5, 0, 11),
(23, 'Bookmarklet编写指南 - 阮一峰的网络日志', 'http://www.ruanyifeng.com/blog/2011/06/a_guide_for_writing_bookmarklet.html', '2015-12-18 12:26:19', 5, 0, 11),
(24, 'php实现JS的encodeURI和decodeURI - 网易博客', 'http://blog.163.com/yangyan6032@126/blog/static/1218798372011010644180/', '2015-12-18 12:28:51', 5, 0, 11),
(25, 'CodeIgniter PHP框架学习之三 | Onexin Team', 'http://www.onexin.net/codeigniter-php-framework-for-learning-three/', '2015-12-18 12:29:22', 5, 0, 3),
(26, 'CodeIgniter PHP框架学习之三 | Onexin Team', 'http://www.onexin.net/codeigniter-php-framework-for-learning-three/', '2015-12-18 12:30:31', 5, 0, 11),
(27, 'Cacodaimon/CacoCloud', 'https://github.com/Cacodaimon/CacoCloud', '2015-12-18 14:56:38', 5, 3, 11),
(28, 'Font Awesome Icons', 'http://fontawesome.io/icons/', '2015-12-19 03:31:01', 2, 0, 5),
(29, 'jidsjofdj', 'osojdosjfod', '2015-12-19 14:26:52', 1, 1, 12),
(30, 'Font Awesome Icons', 'http://fontawesome.io/icons/#form-control', '2015-12-19 14:27:12', 1, 1, 12);

-- --------------------------------------------------------

--
-- 表的结构 `mark_to_tag`
--

CREATE TABLE `mark_to_tag` (
  `mark_to_tag_id` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  `themeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mark_to_tag`
--

INSERT INTO `mark_to_tag` (`mark_to_tag_id`, `markid`, `tagid`, `themeid`) VALUES
(1, 0, 1, 0),
(2, 21, 2, 9),
(3, 9, 3, 2),
(4, 2, 3, 2),
(5, 15, 4, 5),
(6, 27, 5, 11),
(7, 27, 6, 11),
(8, 27, 7, 11),
(9, 27, 8, 11),
(10, 26, 5, 11),
(11, 28, 5, 5),
(12, 28, 6, 5),
(13, 26, 6, 11),
(14, 18, 7, 7),
(15, 22, 7, 11),
(16, 21, 7, 9),
(17, 16, 7, 4),
(18, 27, 9, 11),
(19, 27, 10, 11),
(20, 26, 11, 11),
(21, 29, 12, 12),
(22, 6, 13, 2),
(23, 6, 11, 2),
(24, 6, 14, 2),
(25, 6, 15, 2),
(26, 6, 16, 2),
(27, 6, 17, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`id`, `tag_name`) VALUES
(1, '无'),
(2, '全零决策'),
(3, '数据集'),
(4, 'PHP'),
(5, 'name'),
(6, 'name2'),
(7, 'name333'),
(8, 'name3333333'),
(9, 'name33333'),
(10, 'hhhhhh'),
(11, '孙东东都'),
(12, '桑桑桑'),
(13, '孙东东'),
(14, '孙东东送咚咚咚三咚咚咚咚咚咚咚咚咚'),
(15, '三咚咚咚咚咚咚咚咚咚东东'),
(16, '速度等等等等顶顶顶顶顶顶顶顶顶顶'),
(17, '速度等等等等顶顶顶顶顶顶顶顶顶顶等');

-- --------------------------------------------------------

--
-- 表的结构 `theme`
--

CREATE TABLE `theme` (
  `id` int(11) UNSIGNED NOT NULL,
  `theme_name` varchar(30) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mark_num` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `theme`
--

INSERT INTO `theme` (`id`, `theme_name`, `like_num`, `create_time`, `mark_num`) VALUES
(1, '文献检索', 2, '2015-12-07 12:12:49', 3),
(2, 'CV::行人检测', 2, '2015-12-07 12:12:49', 8),
(3, 'CV::路面检测', 3, '2015-12-08 03:48:23', 2),
(4, '站长工具箱', 2, '2015-12-08 08:50:52', 2),
(5, 'OO大作业开发必读', 2, '2015-12-08 09:04:17', 2),
(6, '图像处理', 2, '2015-12-08 11:06:36', 0),
(7, '服务器配置', 2, '2015-12-08 12:21:50', 1),
(8, '意见反馈', 2, '2015-12-08 13:09:23', 1),
(9, '视频编码', 2, '2015-12-12 04:54:40', 1),
(10, '测试新主题', 2, '2015-12-17 14:32:41', 0),
(11, '再测试一下', 2, '2015-12-17 14:32:56', 5),
(12, '莎莎莎莎', 1, '2015-12-19 14:26:41', 2);

-- --------------------------------------------------------

--
-- 表的结构 `user_like_theme`
--

CREATE TABLE `user_like_theme` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `theme_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_like_theme`
--

INSERT INTO `user_like_theme` (`user_id`, `theme_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 11),
(1, 12),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(5, 3),
(5, 4),
(5, 6),
(5, 9),
(5, 10),
(5, 11);

-- --------------------------------------------------------

--
-- 表的结构 `vote`
--

CREATE TABLE `vote` (
  `user_id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `type` enum('1','-1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `vote`
--

INSERT INTO `vote` (`user_id`, `mark_id`, `type`) VALUES
(1, 3, '1'),
(1, 4, '1'),
(1, 5, '1'),
(1, 6, '1'),
(1, 7, '1'),
(1, 8, '1'),
(1, 9, '1'),
(1, 10, '1'),
(1, 25, '1'),
(1, 27, '1'),
(1, 29, '1'),
(2, 6, '1'),
(2, 8, '1'),
(2, 9, '1'),
(2, 22, '1'),
(2, 23, '1'),
(2, 24, '1'),
(2, 26, '1'),
(2, 27, '1'),
(5, 2, '1'),
(5, 5, '1'),
(5, 6, '1'),
(5, 8, '1'),
(5, 9, '-1'),
(5, 30, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `themeid` (`theme_id`),
  ADD KEY `contributor` (`contributor`);

--
-- Indexes for table `mark_to_tag`
--
ALTER TABLE `mark_to_tag`
  ADD PRIMARY KEY (`mark_to_tag_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_like_theme`
--
ALTER TABLE `user_like_theme`
  ADD PRIMARY KEY (`user_id`,`theme_id`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`user_id`,`mark_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- 使用表AUTO_INCREMENT `mark_to_tag`
--
ALTER TABLE `mark_to_tag`
  MODIFY `mark_to_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 限制导出的表
--

--
-- 限制表 `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- 限制表 `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`contributor`) REFERENCES `auth_users` (`id`);

--
-- 限制表 `user_like_theme`
--
ALTER TABLE `user_like_theme`
  ADD CONSTRAINT `user_like_theme_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`),
  ADD CONSTRAINT `user_like_theme_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
