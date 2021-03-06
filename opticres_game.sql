-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-01-26 11:20:17
-- 服务器版本： 5.5.31
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opticres_game`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(10) DEFAULT NULL COMMENT '名称',
  `company` varchar(20) DEFAULT NULL COMMENT '所属分类',
  `sex` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `state` int(10) UNSIGNED NOT NULL COMMENT '状态',
  `on_get` int(10) UNSIGNED DEFAULT '0',
  `spoil` varchar(50) DEFAULT NULL,
  `tab` int(10) UNSIGNED DEFAULT NULL COMMENT '标签',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `company`, `sex`, `state`, `on_get`, `spoil`, `tab`, `time`) VALUES
(1, '高旭', '生产综合部', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(2, '刘丽山', '生产综合部', 1, 62, 1, '品牌背包', 1, '2017-12-05 08:43:06'),
(3, '陈豪', '生产综合部', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(5, '刘累累', '生产综合部', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(6, '龚钢', '生产综合部', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(8, '方巧', '生产综合部', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(9, '陆德武', '生产综合部', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(10, '张娟', '生产综合部', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(11, '周耀', '生产综合部', 0, 51, 1, '行李箱', 0, '2017-12-05 08:43:06'),
(12, '肖文明', '生产综合部', 0, 62, 1, '品牌背包', 0, '2017-12-05 08:43:06'),
(13, '高杰', 'WDM后段', 0, 63, 1, '艾美特电风扇', 1, '2017-12-05 08:43:06'),
(14, '怀永梅', 'WDM后段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(15, '卢海燕', 'WDM后段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(16, '冯玲', 'WDM后段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(17, '鲜梅', 'WDM后段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(18, '王贤春', 'WDM后段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(19, '聂琼', 'WDM后段', 0, 11, 1, '苹果笔记本', 1, '2017-12-05 08:43:06'),
(20, '古丽园', 'WDM后段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(21, '武晴晴', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(22, '姜应红', 'WDM后段', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(23, '段金兰', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(24, '王莎', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(25, '马秀云', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(26, '莫月烨', 'WDM后段', 1, 53, 1, '床上用品四件套', 2, '2017-12-05 08:43:06'),
(27, '王美凤', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(28, '陈姣', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(29, '饶书叶', 'WDM后段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(30, '古小花', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(31, '连雪华', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(32, '王坤俩', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(33, '马晴', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(34, '王娟', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(35, '尹勤', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(36, '郭珍霜', 'WDM后段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(39, '杨汉贵', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(40, '李荧', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(41, '谢停停', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(42, '邓秋燕', 'WDM前段', 1, 43, 1, '小天鹅洗衣机', 1, '2017-12-05 08:43:06'),
(43, '罗晓娟', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(44, '崔安康', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(45, '陈涛', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(46, '陈国源', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(47, '古丽丹', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(48, '罗位', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(50, '张红清', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(51, '彭美娇', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(52, '刘洋洋', 'WDM前段', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(53, '张夏梅', 'WDM前段', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(55, '晏祥情', 'WDM前段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(56, '邹瑜', 'WDM前段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(57, '蒋於峰', 'WDM前段', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(59, '雷苏云', 'WDM前段', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(60, '陈丽梅', 'WDM前段', 1, 33, 1, '华为手机', 2, '2017-12-05 08:43:06'),
(61, '覃亚露', 'WDM前段', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(62, '赖洪玲', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(63, '何飘飘', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(64, '郑程', 'PLC组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(65, '陈梅', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(66, '卢文滔', 'PLC组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(67, '陈亚亮', 'PLC组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(68, '邓婷花', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(69, '彭雪春', 'PLC组', 1, 10, 1, '现金大奖', 1, '2017-12-05 08:43:06'),
(70, '黄春青', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(71, '何金英', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(72, '窦丽清', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(73, '邓秋玲', 'PLC组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(74, '吴礼谱', 'PLC组', 0, 43, 1, '小天鹅洗衣机', 1, '2017-12-05 08:43:06'),
(75, '肖隆俊', 'PLC组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(76, '吴冠琴', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(77, '童丽榕', 'PLC组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(78, '喻文彪', '光开关组', 0, 62, 1, '品牌背包', 1, '2017-12-05 08:43:06'),
(79, '周静', '光开关组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(80, '窦以相', '光开关组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(81, '周春良', '光开关组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(82, '张艳清', '光开关组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(83, '刘丽', '光开关组', 1, 31, 0, '小米电视55寸', 1, '2017-12-05 08:43:06'),
(84, '古丽平', '光开关组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(85, '陈新旺', '光开关组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(87, '覃小静', '光开关组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(88, '郑雪红', '光开关组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(89, '张秀敏', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(90, '韦荣添 ', '跳线组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(91, '蒲俊霖', '跳线组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(92, '李利红', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(93, '陈龙(跳)', '跳线组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(94, '雷思祥', '跳线组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(95, '王倩', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(96, '殷灯超', '跳线组', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(97, '赵燕', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(98, '丘舒婷', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(99, '马平平', '跳线组', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(100, '刘欢', '跳线组', 0, 42, 1, '海尔冰箱', 1, '2017-12-05 08:43:06'),
(101, '李泰宝', '跳线组', 0, 61, 1, '九阳电炖锅', 1, '2017-12-05 08:43:06'),
(102, '农画锋', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(105, '高丽丽', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(106, '窦亚德', '跳线组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(107, '段金贵', '跳线组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(108, '洪艳', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(109, '杨积喜', '跳线组', 0, 62, 1, '品牌背包', 2, '2017-12-05 08:43:06'),
(110, '刘容', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(111, '王影', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(112, '窦以标', '跳线组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(113, '古明许', '跳线组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(114, '冯丽贞', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(115, '罗斌兵', '跳线组', 0, 51, 1, '行李箱', 2, '2017-12-05 08:43:06'),
(116, '黄余余', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(117, '王文娟', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(119, '吴小梅', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(120, '范翠', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(121, '范路', '跳线组', 1, 51, 1, '行李箱', 2, '2017-12-05 08:43:06'),
(122, '胥春燕', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(124, '阳科', '跳线组', 0, 52, 1, '电饭煲', 2, '2017-12-05 08:43:06'),
(125, '曹红梅', '跳线组', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(126, '陆锋', '跳线组', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(127, '郭秀云', '跳线组', 1, 52, 1, '电饭煲', 2, '2017-12-05 08:43:06'),
(128, '祝瑶', '跳线组', 1, 42, 1, '海尔冰箱', 2, '2017-12-05 08:43:06'),
(130, '李少兰', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(131, '杨立侠', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(132, '覃小青', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(133, '甘敏', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(134, '赵小曼', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(135, '刘志兰', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(136, '李小锋', '跳线组', 0, 62, 1, '品牌背包', 0, '2017-12-05 08:43:06'),
(137, '覃江宏', '跳线组', 0, 62, 1, '品牌背包', 0, '2017-12-05 08:43:06'),
(140, '覃波', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(141, '吴秋艳', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(142, '马风梅', '跳线组', 1, 53, 1, '床上用品四件套', 0, '2017-12-05 08:43:06'),
(143, '许美丽', '跳线组', 1, 52, 1, '电饭煲', 0, '2017-12-05 08:43:06'),
(144, '卓益转', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(145, '古金花', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(146, '何业由', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(147, '郭华森', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(149, '李泰能', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(150, '王自豪', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(151, '张燕萍', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(153, '卢金雷', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(155, '刘亚萍', '跳线组', 1, 53, 1, '床上用品四件套', 0, '2017-12-05 08:43:06'),
(156, '李双龙', '跳线组', 0, 62, 1, '品牌背包', 0, '2017-12-05 08:43:06'),
(157, '刘春兰', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(158, '谢小芳', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(159, '陆妮妮', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(160, '张菊', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(161, '王翠', '跳线组', 1, 63, 1, '艾美特电风扇', 0, '2017-12-05 08:43:06'),
(162, '岳志祥', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(163, '廖焕先', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(165, '刘雪丹', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(167, '秦俊明', '跳线组', 0, 43, 1, '小天鹅洗衣机', 0, '2017-12-05 08:43:06'),
(169, '唐笑寒', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(170, '蓝敏萍', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(171, '殷芳', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(173, '全伟霞', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(174, '韩自红', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(175, '刘永芳', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(176, '文淑娟', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(179, '钟惠莲', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(180, '张程', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(182, '刘路', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(183, '陈莉', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(184, '蔡琼', '跳线组', 1, 61, 1, '九阳电炖锅', 0, '2017-12-05 08:43:06'),
(185, '吴楚琼', '跳线组', 1, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(187, '赖燕文', '跳线组', 0, 0, 0, NULL, 0, '2017-12-05 08:43:06'),
(189, '桑敏', '跳线组', 1, 63, 1, '艾美特电风扇', 0, '2017-12-05 08:43:06'),
(191, '杨蓉', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(192, '曹自兰', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(193, '曾灵芝', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(194, '童婷', '办公室', 1, 21, 1, 'iphone 8', 1, '2017-12-05 08:43:06'),
(195, '张玉婷', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(196, '黎敏贞', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(198, '杨文东', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(199, '冯美华', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(201, '田莉莉', '办公室', 1, 21, 1, 'iphone 8', 1, '2017-12-05 08:43:06'),
(202, '沈桂花', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(203, '李园静', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(204, '张思', '办公室', 1, 63, 1, '艾美特电风扇', 1, '2017-12-05 08:43:06'),
(205, '杨宝', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(206, '于海源', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(207, '石广静', '办公室', 1, 63, 1, '艾美特电风扇', 2, '2017-12-05 08:43:06'),
(208, '王姗', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(209, '黄丽娟', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(210, '杨惠玲', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(211, '罗永华', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(212, '王花', '办公室', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(213, '赵双', '办公室', 1, 51, 1, '行李箱', 2, '2017-12-05 08:43:06'),
(214, '李云杰', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(215, '刘文良', '办公室', 0, 62, 1, '品牌背包', 1, '2017-12-05 08:43:06'),
(216, '周芬', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(217, '王健', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(218, '刘娟', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(220, '李明娟', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(222, '余凡进', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(223, '蔡莉', '办公室', 1, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(224, '柳少美', '办公室', 1, 52, 1, '电饭煲', 2, '2017-12-05 08:43:06'),
(225, '罗霖', '办公室', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(226, '陈嘉颖', '办公室', 1, 41, 1, '小米电视32寸', 2, '2017-12-05 08:43:06'),
(227, '李豪华', '办公室', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(228, '秦林娟', '办公室', 1, 22, 1, '小米笔记本', 1, '2017-12-05 08:43:06'),
(229, '蔡雅诗', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(230, '刘小峰', '办公室', 0, 61, 1, '九阳电炖锅', 1, '2017-12-05 08:43:06'),
(231, '吴海燕', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(232, '李娜', '办公室', 1, 22, 0, '小米笔记本', 1, '2017-12-05 08:43:06'),
(233, '梁广智', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(234, '薛景峰', '办公室', 0, 41, 1, '小米电视32寸', 1, '2017-12-05 08:43:06'),
(235, '李敏', '办公室', 1, 63, 1, '艾美特电风扇', 1, '2017-12-05 08:43:06'),
(236, '黄秋秋', '办公室', 1, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(237, '董启明', '办公室', 0, 41, 1, '小米电视32寸', 1, '2017-12-05 08:43:06'),
(238, '龚廷', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(239, '危焘', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(240, '易广飞', '办公室', 0, 41, 1, '小米电视32寸', 1, '2017-12-05 08:43:06'),
(241, '朱顺驰', '办公室', 0, 63, 1, '艾美特电风扇', 1, '2017-12-05 08:43:06'),
(242, '胡晶晶', '办公室', 1, 32, 1, 'iPad', 1, '2017-12-05 08:43:06'),
(243, '孙海彬', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(244, '戴剑辉', '办公室', 0, 62, 1, '品牌背包', 1, '2017-12-05 08:43:06'),
(245, '温明文', '办公室', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(246, '岳文超', '办公室', 0, 0, 0, NULL, 2, '2017-12-05 08:43:06'),
(247, '钟志茂', '办公室', 0, 0, 0, NULL, 1, '2017-12-05 08:43:06'),
(248, '曹春艳', '飞宇光通', 1, 31, 1, '小米电视55寸', 0, '2017-12-24 14:58:11'),
(249, '张利莲', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 14:59:58'),
(250, '何永再', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 14:59:58'),
(251, '陈龙海', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:00:43'),
(252, '文晓婷', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:00:43'),
(253, '杨燕媚', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:02:00'),
(254, '詹泉', '飞宇光通', 0, 62, 1, '品牌背包', 0, '2017-12-24 15:02:00'),
(255, '熊勇杰', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(256, '梁燕', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(257, '李振容', '飞宇光通', 0, 52, 1, '电饭煲', 0, '2017-12-24 15:05:00'),
(258, '向瑞', '飞宇光通', 0, 61, 1, '九阳电炖锅', 0, '2017-12-24 15:05:00'),
(259, '代荣飞', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(260, '韦家树', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(261, '黄艳月', '飞宇光通', 1, 53, 1, '床上用品四件套', 0, '2017-12-24 15:05:00'),
(262, '姚超', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(263, '周菊', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(264, '郑丹妮', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:05:00'),
(265, '张艳霞', '飞宇光通', 1, 63, 1, '艾美特电风扇', 0, '2017-12-24 15:06:57'),
(266, '梁北生', '飞宇光通', 0, 51, 1, '行李箱', 0, '2017-12-24 15:06:57'),
(267, '夏艳林', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:06:57'),
(268, '陈晓玲', '飞宇光通', 1, 0, 0, NULL, 0, '2017-12-24 15:06:57'),
(269, '陈春梅', '飞宇光通', 0, 0, 0, NULL, 0, '2017-12-24 15:06:57'),
(270, '李中荣', '飞宇光通', 0, 63, 1, '艾美特电风扇', 0, '2017-12-24 15:07:15'),
(272, '唐运游', '飞宇精工', 0, 61, 0, '九阳电炖锅', 0, '2017-12-24 15:11:13'),
(273, '向玲', '飞宇精工', 1, 0, 0, NULL, 0, '2017-12-24 15:11:13'),
(274, '李士', '飞宇精工', 0, 0, 0, NULL, 0, '2017-12-24 15:11:13'),
(275, '李鲜', '飞宇精工', 0, 53, 0, '床上用品四件套', 0, '2017-12-24 15:11:13'),
(277, '冯静', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(278, '刘玉婷', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(279, '张作', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(280, '钟丽华', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(281, '李薇', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(282, '王彬', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(283, '徐务襟', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(284, '刘小芳', '飞宇融创', 1, 33, 1, '华为手机', 0, '2017-12-24 15:17:39'),
(285, '刘波', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(286, '陶振晖', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(287, '黄云峰', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(288, '梁成彬', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(289, '徐蔺', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(290, '梁炯芬', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:17:39'),
(291, '官巧媚', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:19:30'),
(292, '李海鹏', '飞宇融创', 0, 0, 0, NULL, 0, '2017-12-24 15:19:30'),
(293, '邬宏丹', '飞宇融创', 1, 0, 0, NULL, 0, '2017-12-24 15:19:30'),
(294, '罗巧林', '飞宇融创', 1, 63, 1, '艾美特电风扇', 0, '2017-12-24 15:19:30'),
(295, '罗广东', '飞宇亿创', 0, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(296, '李婷', '飞宇亿创', 1, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(297, '王蕾', '飞宇亿创', 1, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(298, '王金妹', '飞宇亿创', 1, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(299, '焦英', '飞宇亿创', 1, 42, 1, '海尔冰箱', 0, '2017-12-24 15:24:16'),
(300, '李智云', '飞宇亿创', 1, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(302, '庞莉', '飞宇亿创', 1, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(303, '林晓钟', '飞宇亿创', 0, 0, 0, NULL, 0, '2017-12-24 15:24:16'),
(305, '陈龙(亿)', '飞宇亿创', 0, 0, 0, NULL, 0, '2017-12-24 15:24:53'),
(306, '孟军', '飞宇亿创', 0, 0, 0, NULL, 0, '2017-12-24 15:24:53'),
(307, '覃武烈', '飞宇亿创', 0, 32, 0, 'iPad', 0, '2017-12-24 15:25:20');

-- --------------------------------------------------------

--
-- 表的结构 `prize`
--

CREATE TABLE `prize` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '奖品名称',
  `num` int(10) UNSIGNED NOT NULL COMMENT '奖品数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `prize`
--

INSERT INTO `prize` (`id`, `name`, `num`, `time`) VALUES
(1, '特等奖', 1, '2017-12-20 08:34:20'),
(2, '一等奖', 1, '2017-12-20 08:34:20'),
(3, '二等奖', 4, '2017-12-20 08:34:20'),
(4, '三等奖', 6, '2017-12-20 08:34:20'),
(5, '四等奖', 10, '2017-12-20 08:34:20'),
(6, '五等奖', 15, '2017-12-20 09:06:47'),
(7, '六等奖', 25, '2017-12-20 09:06:47');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `numb` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `numb`, `time`) VALUES
(1, 'dong', 0, '2017-12-11 07:46:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prize`
--
ALTER TABLE `prize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- 使用表AUTO_INCREMENT `prize`
--
ALTER TABLE `prize`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
