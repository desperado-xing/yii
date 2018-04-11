/*
Navicat MySQL Data Transfer

Source Server         : loaclhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : yii2

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2017-08-24 11:35:05
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '1', '20');
INSERT INTO `test` VALUES ('2', '1', '30');
INSERT INTO `test` VALUES ('3', '2', '10');
INSERT INTO `test` VALUES ('4', '2', '40');
INSERT INTO `test` VALUES ('5', '3', '50');
INSERT INTO `test` VALUES ('6', '3', '4');

-- ----------------------------
-- Table structure for `yii_adminuser`
-- ----------------------------
DROP TABLE IF EXISTS `yii_adminuser`;
CREATE TABLE `yii_adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii_adminuser
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_brand`
-- ----------------------------
DROP TABLE IF EXISTS `yii_brand`;
CREATE TABLE `yii_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `createtime` int(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_brand
-- ----------------------------
INSERT INTO `yii_brand` VALUES ('1', '香蕉', '2', null, null);

-- ----------------------------
-- Table structure for `yii_business`
-- ----------------------------
DROP TABLE IF EXISTS `yii_business`;
CREATE TABLE `yii_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `realname` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '真是姓名',
  `phone` varchar(25) COLLATE utf8_bin DEFAULT NULL COMMENT '手机号',
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '明文密码',
  `passwd` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '加密密码',
  `status` int(2) DEFAULT NULL COMMENT '账户状态',
  `sort` int(3) DEFAULT NULL COMMENT '排序',
  `account` int(20) DEFAULT NULL COMMENT '账户余额',
  `createtime` int(20) DEFAULT NULL COMMENT '创建时间',
  `updatetime` int(20) DEFAULT NULL COMMENT '修改时间',
  `number` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '用户编号（自动生成）',
  `invitecode` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '邀请码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_business
-- ----------------------------
INSERT INTO `yii_business` VALUES ('8', 'nickname2', '贾克斯', '15802276504', '123321', '$2y$13$xOzWLCJcpnOWmfiPJjdc7.1/eAEbqqhMuWhvkdBQQqrYzpiP1yw1G', '0', '88', null, null, null, null, null);
INSERT INTO `yii_business` VALUES ('9', 'nickname4', '拉克丝', '15802276509', '123456', '$2y$13$tScbMjEedwaZ/QCexii4yuU1poTzpmAnUFoJcYiNKCSADkDPP1K.6', '0', '88', null, '1501131725', null, null, null);
INSERT INTO `yii_business` VALUES ('11', 'nickname6', '波比', '15802276511', '123321', '$2y$13$bUGpCjATK2v83b3MXw5A5uwkx/qeP4.7Zj8INc1g5TObJeZaLbXp2', '0', '99', null, '1501137923', null, 'Desperado184516', null);
INSERT INTO `yii_business` VALUES ('13', 'nickname7', '卡密尔', '15802276513', '123321', '$2y$13$4LYWH96ugGv8x4l/OzQx1e7XfP7Lc9XjLwTuDI5MsqhKJXZYeKT9a', '0', '8', null, '1501140463', null, 'Desperado655203', null);
INSERT INTO `yii_business` VALUES ('14', 'lllllll', '艾希', '15822276504', '123321', '$2y$13$leEw6VOPn4alCiv.NkLLUu4yT8dlyFfq1YZ.n1R.k5Pj/kzzC/PoC', '1', '88', null, '1501489582', null, 'Desperado222615', 'zm2oOK');
INSERT INTO `yii_business` VALUES ('15', 'simida', '卡莉斯塔', '15888876504', '123321', '$2y$13$Y2Pa3OusEsoPQLvj.oTDJOrEK82iS.DtPf8U0o7eUrvRU3AHY9lIW', '0', '7889', null, '1501580041', null, 'Desperado456561', 'Fpjn5M');

-- ----------------------------
-- Table structure for `yii_image`
-- ----------------------------
DROP TABLE IF EXISTS `yii_image`;
CREATE TABLE `yii_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_image
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_menu`
-- ----------------------------
DROP TABLE IF EXISTS `yii_menu`;
CREATE TABLE `yii_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单表中的ID',
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '菜单名称',
  `pid` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '菜单上级ID',
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '菜单url',
  `icon_style` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '图标样式',
  `display` int(20) DEFAULT '1' COMMENT '是否显示',
  `sort` int(20) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_menu
-- ----------------------------
INSERT INTO `yii_menu` VALUES ('1', '后台菜单管理', '0', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('2', '后台菜单列表', '1', 'menu/index', null, '1', '0');
INSERT INTO `yii_menu` VALUES ('3', '修改菜单', '1', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('4', '用户管理', '0', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('5', '用户列表', '4', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('6', '用户权限', '4', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('7', '分销管理', '0', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('8', '分销商管理', '7', 'business/index', null, '1', '0');
INSERT INTO `yii_menu` VALUES ('9', '商品管理', '0', null, null, '1', '0');
INSERT INTO `yii_menu` VALUES ('10', '品牌列表', '9', 'brand/index', null, '1', '0');
INSERT INTO `yii_menu` VALUES ('12', '品牌添加', '10', null, null, '1', '0');

-- ----------------------------
-- Table structure for `yii_migration`
-- ----------------------------
DROP TABLE IF EXISTS `yii_migration`;
CREATE TABLE `yii_migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_migration
-- ----------------------------
INSERT INTO `yii_migration` VALUES ('m000000_000000_base', '1498640706');
INSERT INTO `yii_migration` VALUES ('m130524_201442_init', '1498640710');
INSERT INTO `yii_migration` VALUES ('m170628_085337_adminuser', '1498640710');

-- ----------------------------
-- Table structure for `yii_news`
-- ----------------------------
DROP TABLE IF EXISTS `yii_news`;
CREATE TABLE `yii_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `addtime` int(20) DEFAULT NULL,
  `sort` int(2) DEFAULT NULL,
  `auth` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_news
-- ----------------------------
INSERT INTO `yii_news` VALUES ('7', null, 0xE58F8DE58092E698AFE88C83E5BEB7E890A8E58F91E7949FE58F8DE58092E698AF, '丰富的爽肤水999', null, null, null);
INSERT INTO `yii_news` VALUES ('25', null, 0xE58F8DE58092E698AF, '反倒是888', null, null, null);
INSERT INTO `yii_news` VALUES ('26', null, 0xE58F8DE58092E698AF, '反倒是', null, null, null);
INSERT INTO `yii_news` VALUES ('27', null, 0xE58F8DE58092E698AF, '反倒是', null, null, null);
INSERT INTO `yii_news` VALUES ('28', null, 0xE58F8DE58092E698AF, '电风扇水电费', null, null, null);
INSERT INTO `yii_news` VALUES ('29', null, 0xE5B9BFE6B39BE79A84E882A1E4BBBDE79A84E882A1E4B89C, '股份的股份', null, null, null);
INSERT INTO `yii_news` VALUES ('32', null, 0xE998B2E5AE88E68993E6B395E698AF, '范德萨发的所发生的方式', null, null, null);
INSERT INTO `yii_news` VALUES ('33', null, 0xE9ACBCE59CB0E696B9E4B8AA20, '同方股份的', null, null, null);
INSERT INTO `yii_news` VALUES ('34', null, 0xE58F8DE58092E698AFE58F91E98081E588B0, '范德萨范德萨', null, null, null);

-- ----------------------------
-- Table structure for `yii_user`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE `yii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yii_user
-- ----------------------------
INSERT INTO `yii_user` VALUES ('1', 'admin', 'cgJTvkmEBPOQI_zZQ9hn-lGNa6UFBFX6', '$2y$13$QxA0d62CmNzqrealZTXwqO4CNsxlfthPdc4UdxoMnuY0gdx23pKHO', null, '502377981@qq.com', '10', '1498707860', '1498707860');

-- ----------------------------
-- Table structure for `yii_user999`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user999`;
CREATE TABLE `yii_user999` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `password_hash` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '加密密码',
  `password_reset_token` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '明文密码',
  `auth_key` varchar(32) COLLATE utf8_bin DEFAULT NULL COMMENT '昵称',
  `status` int(5) DEFAULT '10' COMMENT '状态',
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '邮箱',
  `created_at` int(20) DEFAULT NULL,
  `updated_at` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of yii_user999
-- ----------------------------
INSERT INTO `yii_user999` VALUES ('1', 'admin', 'admin', 'admin', 'admin', null, null, null, null);

-- ----------------------------
-- Function structure for `queryChildrenAreaInfo`
-- ----------------------------
DROP FUNCTION IF EXISTS `queryChildrenAreaInfo`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `queryChildrenAreaInfo`(areaId INT) RETURNS varchar(4000) CHARSET utf8 COLLATE utf8_bin
BEGIN
DECLARE sTemp VARCHAR(4000);
DECLARE sTempChd VARCHAR(4000);

SET sTemp='$';
SET sTempChd = CAST(areaId AS CHAR);

WHILE sTempChd IS NOT NULL DO
SET sTemp= CONCAT(sTemp,',',sTempChd);
SELECT GROUP_CONCAT(id) INTO sTempChd FROM yii_menu WHERE FIND_IN_SET(parentId,sTempChd)>0;
END WHILE;
RETURN sTemp;
END
;;
DELIMITER ;
