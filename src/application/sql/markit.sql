-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-08 14:44:00
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
(1, '127.0.0.1', 'administrator', 0, '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1449581313, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', '応 振强', 0, '$2y$08$zOn4Z7RxYamx1qw3N2bbY.BTi4o4teT0iNjwiIr4UUPF0tZ7ihFY6', NULL, 'yingzhenqiang@163.com', NULL, NULL, NULL, NULL, 1449465516, 1449581081, 1, '振强', '応', '', ''),
(4, '::1', '关 丽媛', 0, '$2y$08$xXm59t.azWRDVnyKxRMpSeAmtwojp405M/M2dG9h73qMKAcgt6H4q', NULL, 'yingzhenqiang@gmail.com', NULL, NULL, NULL, NULL, 1449471105, NULL, 1, '丽媛', '关', '', ''),
(5, '::1', '程 徐媛', 0, '$2y$08$/RuKG3i8skFqcGVoCJAxoOObIUKA48vZKj6rhHFEKq/nmTxWsJY8C', NULL, 'chenxuyuan@163.com', NULL, NULL, NULL, NULL, 1449581421, 1449581497, 1, '徐媛', '程', '', '');

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
(6, 5, 2);

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
(2, 'Caltech Pedestrian Detection Benchmark', 'http://www.vision.caltech.edu/Image_Datasets/CaltechPedestri', '0000-00-00 00:00:00', 2, 0, 2),
(3, 'INRIA Pedestrian Detector', 'http://ttic.uchicago.edu/~smaji/projects/ped-detector/', '2015-12-07 15:02:09', 2, 0, 2),
(4, 'Single-Pedestrian Detection aided by Mul', 'http://www.ee.cuhk.edu.hk/~wlouyang/projects/ouyangWcvpr13Mu', '2015-12-08 03:10:52', 2, 0, 2),
(5, 'Pedestrian Detection 资源', 'http://www.cnblogs.com/yutenghit/archive/2012/07/03/2575261.html', '2015-12-08 03:13:25', 2, 0, 2),
(6, '源码 Pedestrian Detection with Spatially Pooled Features and Structured Ensemble Learning', 'https://github.com/chhshen/pedestrian-detection', '2015-12-08 03:18:59', 2, 0, 2),
(7, 'Piotr''s Computer Vision Matlab Toolbox', 'http://vision.ucsd.edu/~pdollar/toolbox/doc/', '2015-12-08 03:19:37', 2, 0, 2),
(8, 'Discriminatively trained deformable part models', 'http://www.cs.berkeley.edu/~rbg/latent/index.html', '2015-12-08 03:21:25', 2, 0, 2),
(9, 'ETH Pedestrian Dataset', 'https://data.vision.ee.ethz.ch/cvl/aess/dataset/', '2015-12-08 03:23:11', 2, 0, 2),
(10, 'IEEE Xplore Digital Library', 'http://ieeexplore.ieee.org/Xplore/home.jsp', '2015-12-08 03:23:22', 2, 0, 1),
(11, ' Springer Link', 'http://link.springer.com/', '2015-12-08 03:25:31', 2, 0, 1),
(12, '中国知网', 'http://www.cnki.net/', '2015-12-08 03:29:43', 2, 0, 1),
(13, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:33:02', 2, 0, 3),
(14, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:34:03', 2, 0, 3),
(15, 'PHP 开发规范', 'http://codeigniter.org.cn/user_guide/general/styleguide.html', '2015-12-08 09:04:46', 2, 0, 5),
(16, '在线JS/CSS/HTML压缩', 'http://tool.oschina.net/jscompress', '2015-12-08 11:15:10', 2, 0, 4),
(17, '在线正则表达式测试', 'http://tool.oschina.net/regex', '2015-12-08 11:16:19', 2, 0, 4),
(18, 'xampp配置局域网访问', 'http://www.cnblogs.com/tiny-bj/p/4092715.html', '2015-12-08 12:22:08', 2, 0, 7),
(19, '在这里写下你的反馈意见', '#', '2015-12-08 13:10:09', 2, 0, 8);

-- --------------------------------------------------------

--
-- 表的结构 `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `theme_name` varchar(30) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mark_num` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `theme`
--

INSERT INTO `theme` (`id`, `theme_name`, `like_num`, `create_time`, `mark_num`) VALUES
(1, '文献检索', 0, '2015-12-07 12:12:49', 3),
(2, 'CV::行人检测', 0, '2015-12-07 12:12:49', 8),
(3, 'CV::路面检测', 0, '2015-12-08 03:48:23', 1),
(4, '站长工具箱', 0, '2015-12-08 08:50:52', 2),
(5, 'OO大作业开发必读', 0, '2015-12-08 09:04:17', 1),
(6, '图像处理', 0, '2015-12-08 11:06:36', 0),
(7, '服务器配置', 0, '2015-12-08 12:21:50', 1),
(8, '意见反馈', 0, '2015-12-08 13:09:23', 1);

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
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
