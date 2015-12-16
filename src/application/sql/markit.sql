-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-16 05:42:23
-- �������汾�� 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `markit`
--
CREATE DATABASE IF NOT EXISTS `markit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `markit`;

-- --------------------------------------------------------

--
-- ��Ľṹ `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ת����е����� `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- ��Ľṹ `auth_login_attempts`
--

CREATE TABLE `auth_login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- ��Ľṹ `auth_users`
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
-- ת����е����� `auth_users`
--

INSERT INTO `auth_users` (`id`, `ip_address`, `username`, `contribution`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', 0, '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1449581313, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', '�� ��ǿ', 0, '$2y$08$zOn4Z7RxYamx1qw3N2bbY.BTi4o4teT0iNjwiIr4UUPF0tZ7ihFY6', NULL, 'yingzhenqiang@163.com', NULL, NULL, NULL, NULL, 1449465516, 1449581081, 1, '��ǿ', '��', '', ''),
(4, '::1', '�� ����', 0, '$2y$08$xXm59t.azWRDVnyKxRMpSeAmtwojp405M/M2dG9h73qMKAcgt6H4q', NULL, 'yingzhenqiang@gmail.com', NULL, NULL, NULL, NULL, 1449471105, NULL, 1, '����', '��', '', ''),
(5, '::1', '�� ����', 0, '$2y$08$/RuKG3i8skFqcGVoCJAxoOObIUKA48vZKj6rhHFEKq/nmTxWsJY8C', NULL, 'chenxuyuan@163.com', NULL, NULL, NULL, NULL, 1449581421, 1449581497, 1, '����', '��', '', ''),
(6, '::1', 'w ccandcc', 0, '$2y$08$XQVLFEEFQQTYruVQbv78TuEp3dyj2HrUqb12ubfGElNQdeSnnyXru', NULL, '1272864784@qq.com', NULL, NULL, NULL, 'mu01VWPZfXDwElJmdjoek.', 1449714882, 1450021039, 1, 'ccandcc', 'w', 'pku', '88888888');

-- --------------------------------------------------------

--
-- ��Ľṹ `auth_users_groups`
--

CREATE TABLE `auth_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ת����е����� `auth_users_groups`
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
-- ��Ľṹ `mark`
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
-- ת����е����� `mark`
--

INSERT INTO `mark` (`mark_id`, `title`, `url`, `datetime`, `contributor`, `value`, `theme_id`) VALUES
(2, 'Caltech Pedestrian Detection Benchmark', 'http://www.vision.caltech.edu/Image_Datasets/CaltechPedestri', '0000-00-00 00:00:00', 2, 0, 2),
(3, 'INRIA Pedestrian Detector', 'http://ttic.uchicago.edu/~smaji/projects/ped-detector/', '2015-12-07 15:02:09', 2, 0, 2),
(4, 'Single-Pedestrian Detection aided by Mul', 'http://www.ee.cuhk.edu.hk/~wlouyang/projects/ouyangWcvpr13Mu', '2015-12-08 03:10:52', 2, 0, 2),
(5, 'Pedestrian Detection ��Դ', 'http://www.cnblogs.com/yutenghit/archive/2012/07/03/2575261.html', '2015-12-08 03:13:25', 2, 0, 2),
(6, 'Դ�� Pedestrian Detection with Spatially Pooled Features and Structured Ensemble Learning', 'https://github.com/chhshen/pedestrian-detection', '2015-12-08 03:18:59', 2, 0, 2),
(7, 'Piotr''s Computer Vision Matlab Toolbox', 'http://vision.ucsd.edu/~pdollar/toolbox/doc/', '2015-12-08 03:19:37', 2, 0, 2),
(8, 'Discriminatively trained deformable part models', 'http://www.cs.berkeley.edu/~rbg/latent/index.html', '2015-12-08 03:21:25', 2, 0, 2),
(9, 'ETH Pedestrian Dataset', 'https://data.vision.ee.ethz.ch/cvl/aess/dataset/', '2015-12-08 03:23:11', 2, 0, 2),
(10, 'IEEE Xplore Digital Library', 'http://ieeexplore.ieee.org/Xplore/home.jsp', '2015-12-08 03:23:22', 2, 0, 1),
(11, ' Springer Link', 'http://link.springer.com/', '2015-12-08 03:25:31', 2, 0, 1),
(12, '�й�֪��', 'http://www.cnki.net/', '2015-12-08 03:29:43', 2, 0, 1),
(13, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:33:02', 2, 0, 3),
(14, 'KITTI:Road/Lane Detection Evaluation 2013', 'http://www.cvlibs.net/datasets/kitti/eval_road.php', '2015-12-08 06:34:03', 2, 0, 3),
(15, 'PHP �����淶', 'http://codeigniter.org.cn/user_guide/general/styleguide.html', '2015-12-08 09:04:46', 2, 0, 5),
(16, '����JS/CSS/HTMLѹ��', 'http://tool.oschina.net/jscompress', '2015-12-08 11:15:10', 2, 0, 4),
(17, '����������ʽ����', 'http://tool.oschina.net/regex', '2015-12-08 11:16:19', 2, 0, 4),
(18, 'xampp���þ���������', 'http://www.cnblogs.com/tiny-bj/p/4092715.html', '2015-12-08 12:22:08', 2, 0, 7),
(19, '������д����ķ������', '#', '2015-12-08 13:10:09', 2, 0, 8),
(21, 'Fast Zero Block Detection and Early CU Termination for HEVC Video Coding', 'http://ieeexplore.ieee.org/stamp/stamp.jsp?tp=&arnumber=6572177', '2015-12-13 01:57:40', 6, 0, 9);

-- --------------------------------------------------------

--
-- ��Ľṹ `mark_to_tag`
--

CREATE TABLE `mark_to_tag` (
  `mark_to_tag_id` int(11) NOT NULL,
  `markid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  `themeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ת����е����� `mark_to_tag`
--

INSERT INTO `mark_to_tag` (`mark_to_tag_id`, `markid`, `tagid`, `themeid`) VALUES
(1, 0, 1, 0),
(2, 21, 2, 9),
(3, 9, 3, 2),
(4, 2, 3, 2),
(5, 15, 4, 5);

-- --------------------------------------------------------

--
-- ��Ľṹ `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ת����е����� `tag`
--

INSERT INTO `tag` (`id`, `tag_name`) VALUES
(1, '��'),
(2, 'ȫ�����'),
(3, '���ݼ�'),
(4, 'PHP');

-- --------------------------------------------------------

--
-- ��Ľṹ `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `theme_name` varchar(30) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mark_num` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ת����е����� `theme`
--

INSERT INTO `theme` (`id`, `theme_name`, `like_num`, `create_time`, `mark_num`) VALUES
(1, '���׼���', 0, '2015-12-07 12:12:49', 3),
(2, 'CV::���˼��', 0, '2015-12-07 12:12:49', 8),
(3, 'CV::·����', 0, '2015-12-08 03:48:23', 1),
(4, 'վ��������', 0, '2015-12-08 08:50:52', 2),
(5, 'OO����ҵ�����ض�', 0, '2015-12-08 09:04:17', 1),
(6, 'ͼ����', 0, '2015-12-08 11:06:36', 0),
(7, '����������', 0, '2015-12-08 12:21:50', 1),
(8, '�������', 0, '2015-12-08 13:09:23', 1),
(9, '��Ƶ����', 0, '2015-12-12 04:54:40', 1);

-- --------------------------------------------------------

--
-- ��Ľṹ `vote`
--

CREATE TABLE `vote` (
  `user_id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `type` enum('1','-1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`user_id`,`mark_id`);

--
-- �ڵ����ı�ʹ��AUTO_INCREMENT
--

--
-- ʹ�ñ�AUTO_INCREMENT `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- ʹ�ñ�AUTO_INCREMENT `auth_login_attempts`
--
ALTER TABLE `auth_login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- ʹ�ñ�AUTO_INCREMENT `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- ʹ�ñ�AUTO_INCREMENT `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- ʹ�ñ�AUTO_INCREMENT `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- ʹ�ñ�AUTO_INCREMENT `mark_to_tag`
--
ALTER TABLE `mark_to_tag`
  MODIFY `mark_to_tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- ʹ�ñ�AUTO_INCREMENT `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- ʹ�ñ�AUTO_INCREMENT `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- ���Ƶ����ı�
--

--
-- ���Ʊ� `auth_users_groups`
--
ALTER TABLE `auth_users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `auth_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- ���Ʊ� `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`contributor`) REFERENCES `auth_users` (`id`);
