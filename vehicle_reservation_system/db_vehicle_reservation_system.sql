/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_vehicle_reservation_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-18 22:00:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `account` char(20) NOT NULL COMMENT '超级管理员账号',
  `password` char(32) NOT NULL COMMENT '超级管理员密码，md5加密',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'admin', '6ce2fd100b183b52f35d616d669fd114', '2018-04-16 15:52:36', '2018-05-11 20:56:32');

-- ----------------------------
-- Table structure for t_driver
-- ----------------------------
DROP TABLE IF EXISTS `t_driver`;
CREATE TABLE `t_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `openid` char(28) NOT NULL COMMENT '司机编号',
  `account` char(11) NOT NULL COMMENT '司机账号',
  `password` char(32) NOT NULL COMMENT '司机密码',
  `name` char(20) NOT NULL COMMENT '真实姓名',
  `image` text COMMENT '头像路径',
  `nickname` char(32) DEFAULT NULL COMMENT '昵称',
  `plate` char(7) DEFAULT NULL,
  `company` char(20) DEFAULT NULL COMMENT '隶属公司',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('1', 'o47Fa0mp9SRTf3eiKmqWm69BjG_8', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '赖俊强', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE5xptsib9Kia11eibwQciblhnUEVlyhu4UNK5BMqs47kYbYYG4dlRa8NRhw3iciaybyO2vUGJnB8CYJM2ya2q1gjldx9ib/132', '纠结', '粤L66666', '一匠', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('2', 'oyur_1JsPp73VApJ5AfbUHGmvyPo', '13669581234', 'ba8180831b8d94535ddefad359f735b2', '林晓聪', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE7ar2kVTlu6ZgPpINE6aslAgWTNIibCMPvDib3LgRFxnnC07kR2aaL9hiau0caichC0zhFweQBDj60objmmuAt7O2DK/132', '晓聪', '粤L88888', '一匠', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('3', 'oyur_1JsPp73VApJ5AfbUHGmvy12', '13138336179', 'ba8180831b8d94535ddefad359f735b2', '红底', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE7ar2kVTlu6ZgPpINE6aslAgWTNIibCMPvDib3LgRFxnnC07kR2aaL9hiau0caichC0zhFweQBDj60objmmuAt7O2DK/132', '红底', '粤L77777', '一匠', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('4', 'oyur_1JsPp73VApJ5AfbUHGmvy17', '13138336666', 'ba8180831b8d94535ddefad359f735b2', '楚特', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE7ar2kVTlu6ZgPpINE6aslAgWTNIibCMPvDib3LgRFxnnC07kR2aaL9hiau0caichC0zhFweQBDj60objmmuAt7O2DK/132', '楚特', '粤L55555', '一匠', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('5', 'o47Fa0mp9SRTf3eiKmqWm69BjG_9', '13669586666', 'ba8180831b8d94535ddefad359f735b2', '张飞', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE5xptsib9Kia11eibwQciblhnUEVlyhu4UNK5BMqs47kYbYYG4dlRa8NRhw3iciaybyO2vUGJnB8CYJM2ya2q1gjldx9ib/132', '张飞', '粤L11111', '一匠', '2018-05-11 15:52:36', null, null, '0');

-- ----------------------------
-- Table structure for t_log
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user` char(20) NOT NULL,
  `log` varchar(50) DEFAULT NULL COMMENT '操作内容',
  `time` char(19) DEFAULT NULL COMMENT '操作时间，也是创建时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('1', 'admin', '修改账号为：admin 的车辆', '2018-05-11 20:56:09', null, '0');
INSERT INTO `t_log` VALUES ('2', 'admin', '修改账号为：admin 的车辆', '2018-05-11 20:56:32', null, '0');
INSERT INTO `t_log` VALUES ('3', 'admin', '生成商品编号为：O7434 的商品', '2018-05-14 11:07:10', null, '0');
INSERT INTO `t_log` VALUES ('4', 'admin', '生成商品编号为：O2279 的商品', '2018-05-14 19:19:54', null, '0');
INSERT INTO `t_log` VALUES ('5', 'admin', '生成商品编号为：O6436 的商品', '2018-05-14 19:21:01', null, '0');
INSERT INTO `t_log` VALUES ('6', 'admin', '生成油品编号为：O2496 的油品', '2018-05-14 19:24:40', null, '0');
INSERT INTO `t_log` VALUES ('7', 'admin', '修改油品编号为：O0002 的油品', '2018-05-14 19:53:39', null, '0');
INSERT INTO `t_log` VALUES ('8', 'admin', '删除油品ID为：6 的油品', '2018-05-14 19:55:57', null, '0');
INSERT INTO `t_log` VALUES ('9', 'admin', '生成角色为：排队员 的权限', '2018-05-14 21:04:35', null, '0');
INSERT INTO `t_log` VALUES ('10', 'admin', '生成角色为：超级管理员 的权限', '2018-05-14 21:08:46', null, '0');
INSERT INTO `t_log` VALUES ('11', 'admin', '生成角色为：cccx 的权限', '2018-05-14 21:10:42', null, '0');
INSERT INTO `t_log` VALUES ('12', 'admin', '生成角色为：nbbn 的权限', '2018-05-14 21:11:03', null, '0');
INSERT INTO `t_log` VALUES ('13', 'admin', '生成角色为：sdffff 的权限', '2018-05-14 21:12:20', null, '0');
INSERT INTO `t_log` VALUES ('14', 'admin', '生成角色为：超级管理员 的权限', '2018-05-14 21:12:58', null, '0');
INSERT INTO `t_log` VALUES ('15', 'admin', '修改权限ID为：31 的权限', '2018-05-14 21:16:41', null, '0');
INSERT INTO `t_log` VALUES ('16', 'admin', '修改权限ID为：31 的权限', '2018-05-14 21:16:47', null, '0');
INSERT INTO `t_log` VALUES ('17', 'admin', '生成角色为：用户管理员 的权限', '2018-05-14 21:17:02', null, '0');
INSERT INTO `t_log` VALUES ('18', 'admin', '删除权限ID为：31 的权限', '2018-05-14 21:22:07', null, '0');
INSERT INTO `t_log` VALUES ('19', 'admin', '生成账号为：13669586274 的用户', '2018-05-14 21:38:30', null, '0');
INSERT INTO `t_log` VALUES ('20', 'admin', '修改用户ID为：6 的用户', '2018-05-14 21:44:09', null, '0');
INSERT INTO `t_log` VALUES ('21', 'admin', '生成账号为：13669586666 的用户', '2018-05-14 21:44:46', null, '0');
INSERT INTO `t_log` VALUES ('22', 'admin', '删除用户ID为：6 的用户', '2018-05-14 21:47:06', null, '0');
INSERT INTO `t_log` VALUES ('23', 'admin', '修改权限ID为：31 的权限', '2018-05-16 18:43:26', null, '0');
INSERT INTO `t_log` VALUES ('24', 'admin', '生成公告编号为：N6018 的公告', '2018-05-16 19:25:36', null, '0');
INSERT INTO `t_log` VALUES ('25', 'admin', '删除公告ID为：2 的公告', '2018-05-16 19:30:55', null, '0');
INSERT INTO `t_log` VALUES ('26', 'admin', '修改公告编号为：N6018 的公告', '2018-05-16 19:38:56', null, '0');
INSERT INTO `t_log` VALUES ('27', 'admin', '生成公告编号为：N5565 的公告', '2018-05-16 19:45:41', null, '0');
INSERT INTO `t_log` VALUES ('28', 'admin', '置顶公告ID为：2 的公告', '2018-05-16 20:04:19', null, '0');
INSERT INTO `t_log` VALUES ('29', 'admin', '取消置顶公告ID为：1 的公告', '2018-05-16 20:08:06', null, '0');
INSERT INTO `t_log` VALUES ('30', 'admin', '取消置顶公告ID为：2 的公告', '2018-05-16 20:08:12', null, '0');
INSERT INTO `t_log` VALUES ('31', 'admin', '置顶公告ID为：3 的公告', '2018-05-16 20:08:25', null, '0');
INSERT INTO `t_log` VALUES ('32', 'admin', '置顶公告ID为：1 的公告', '2018-05-16 20:08:30', null, '0');
INSERT INTO `t_log` VALUES ('33', 'admin', '置顶公告ID为：2 的公告', '2018-05-16 20:08:33', null, '0');
INSERT INTO `t_log` VALUES ('34', 'admin', '取消置顶公告ID为：2 的公告', '2018-05-16 20:10:50', null, '0');
INSERT INTO `t_log` VALUES ('35', 'admin', '取消置顶公告ID为：1 的公告', '2018-05-16 20:10:52', null, '0');
INSERT INTO `t_log` VALUES ('36', 'admin', '取消置顶公告ID为：3 的公告', '2018-05-16 20:10:53', null, '0');
INSERT INTO `t_log` VALUES ('37', 'admin', '删除公告ID为：1 的公告', '2018-05-16 20:13:30', null, '0');
INSERT INTO `t_log` VALUES ('38', 'admin', '删除公告ID为：2 的公告', '2018-05-16 20:13:34', null, '0');
INSERT INTO `t_log` VALUES ('39', 'admin', '置顶公告ID为：3 的公告', '2018-05-17 19:04:12', null, '0');
INSERT INTO `t_log` VALUES ('40', 'admin', '取消置顶公告ID为：3 的公告', '2018-05-17 19:04:15', null, '0');
INSERT INTO `t_log` VALUES ('41', 'admin', '生成订单编号为：O4643 的订单', '2018-05-17 20:02:17', null, '0');
INSERT INTO `t_log` VALUES ('42', 'admin', '生成订单编号为：O6287 的订单', '2018-05-17 20:03:34', null, '0');
INSERT INTO `t_log` VALUES ('43', 'admin', '生成订单编号为：O4767 的订单', '2018-05-17 20:04:48', null, '0');
INSERT INTO `t_log` VALUES ('44', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:38:03', null, '0');
INSERT INTO `t_log` VALUES ('45', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:38:39', null, '0');
INSERT INTO `t_log` VALUES ('46', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:38:41', null, '0');
INSERT INTO `t_log` VALUES ('47', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:38:43', null, '0');
INSERT INTO `t_log` VALUES ('48', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:38:45', null, '0');
INSERT INTO `t_log` VALUES ('49', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:38:47', null, '0');
INSERT INTO `t_log` VALUES ('50', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:38:49', null, '0');
INSERT INTO `t_log` VALUES ('51', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:38:52', null, '0');
INSERT INTO `t_log` VALUES ('52', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:47:39', null, '0');
INSERT INTO `t_log` VALUES ('53', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:47:45', null, '0');
INSERT INTO `t_log` VALUES ('54', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:47:50', null, '0');
INSERT INTO `t_log` VALUES ('55', 'admin', '下移订单ID为：6 的订单', '2018-05-17 20:47:58', null, '0');
INSERT INTO `t_log` VALUES ('56', 'admin', '上移订单ID为：6 的订单', '2018-05-17 20:59:31', null, '0');
INSERT INTO `t_log` VALUES ('57', 'admin', '上移订单ID为：7 的订单', '2018-05-17 20:59:37', null, '0');
INSERT INTO `t_log` VALUES ('58', 'admin', '上移订单ID为：7 的订单', '2018-05-17 20:59:41', null, '0');
INSERT INTO `t_log` VALUES ('59', 'admin', '下移订单ID为：7 的订单', '2018-05-17 20:59:44', null, '0');
INSERT INTO `t_log` VALUES ('60', 'admin', '下移订单ID为：6 的订单', '2018-05-17 21:10:42', null, '0');
INSERT INTO `t_log` VALUES ('61', 'admin', '生成订单编号为：O3884 的订单', '2018-05-17 21:12:32', null, '0');
INSERT INTO `t_log` VALUES ('62', 'admin', '下移订单ID为：6 的订单', '2018-05-17 21:23:11', null, '0');
INSERT INTO `t_log` VALUES ('63', 'admin', '下移订单ID为：7 的订单', '2018-05-17 21:23:14', null, '0');
INSERT INTO `t_log` VALUES ('64', 'admin', '删除订单ID为：6 的订单', '2018-05-17 21:41:21', null, '0');
INSERT INTO `t_log` VALUES ('65', 'admin', '删除订单ID为：7 的订单', '2018-05-17 21:41:27', null, '0');
INSERT INTO `t_log` VALUES ('66', 'admin', '暂停全部车辆排队', '2018-05-17 21:58:20', null, '0');
INSERT INTO `t_log` VALUES ('67', 'admin', '暂停全部车辆排队', '2018-05-17 22:03:06', null, '0');
INSERT INTO `t_log` VALUES ('68', 'admin', '暂停全部车辆排队', '2018-05-17 22:03:16', null, '0');
INSERT INTO `t_log` VALUES ('69', 'admin', '暂停全部车辆排队', '2018-05-17 22:05:47', null, '0');
INSERT INTO `t_log` VALUES ('70', 'admin', '暂停全部车辆排队', '2018-05-17 22:05:50', null, '0');
INSERT INTO `t_log` VALUES ('71', 'admin', '暂停全部车辆排队', '2018-05-17 22:05:51', null, '0');
INSERT INTO `t_log` VALUES ('72', 'admin', '暂停全部车辆排队', '2018-05-17 22:05:52', null, '0');
INSERT INTO `t_log` VALUES ('73', 'admin', '暂停全部车辆排队', '2018-05-17 22:05:53', null, '0');
INSERT INTO `t_log` VALUES ('74', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:32', null, '0');
INSERT INTO `t_log` VALUES ('75', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:47', null, '0');
INSERT INTO `t_log` VALUES ('76', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:50', null, '0');
INSERT INTO `t_log` VALUES ('77', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:51', null, '0');
INSERT INTO `t_log` VALUES ('78', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:53', null, '0');
INSERT INTO `t_log` VALUES ('79', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:54', null, '0');
INSERT INTO `t_log` VALUES ('80', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:55', null, '0');
INSERT INTO `t_log` VALUES ('81', 'admin', '暂停全部车辆排队', '2018-05-17 22:08:56', null, '0');
INSERT INTO `t_log` VALUES ('82', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:01', null, '0');
INSERT INTO `t_log` VALUES ('83', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:05', null, '0');
INSERT INTO `t_log` VALUES ('84', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:06', null, '0');
INSERT INTO `t_log` VALUES ('85', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:07', null, '0');
INSERT INTO `t_log` VALUES ('86', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:08', null, '0');
INSERT INTO `t_log` VALUES ('87', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:09', null, '0');
INSERT INTO `t_log` VALUES ('88', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:11', null, '0');
INSERT INTO `t_log` VALUES ('89', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:15', null, '0');
INSERT INTO `t_log` VALUES ('90', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:17', null, '0');
INSERT INTO `t_log` VALUES ('91', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:18', null, '0');
INSERT INTO `t_log` VALUES ('92', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:19', null, '0');
INSERT INTO `t_log` VALUES ('93', 'admin', '暂停全部车辆排队', '2018-05-17 22:09:19', null, '0');
INSERT INTO `t_log` VALUES ('94', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:22', null, '0');
INSERT INTO `t_log` VALUES ('95', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:27', null, '0');
INSERT INTO `t_log` VALUES ('96', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:32', null, '0');
INSERT INTO `t_log` VALUES ('97', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:44', null, '0');
INSERT INTO `t_log` VALUES ('98', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:46', null, '0');
INSERT INTO `t_log` VALUES ('99', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:48', null, '0');
INSERT INTO `t_log` VALUES ('100', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:49', null, '0');
INSERT INTO `t_log` VALUES ('101', 'admin', '暂停全部车辆排队', '2018-05-17 22:16:49', null, '0');
INSERT INTO `t_log` VALUES ('102', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:52', null, '0');
INSERT INTO `t_log` VALUES ('103', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:56', null, '0');
INSERT INTO `t_log` VALUES ('104', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:57', null, '0');
INSERT INTO `t_log` VALUES ('105', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:57', null, '0');
INSERT INTO `t_log` VALUES ('106', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:58', null, '0');
INSERT INTO `t_log` VALUES ('107', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:59', null, '0');
INSERT INTO `t_log` VALUES ('108', 'admin', '暂停全部车辆排队', '2018-05-18 19:10:59', null, '0');
INSERT INTO `t_log` VALUES ('109', 'admin', '暂停全部车辆排队', '2018-05-18 19:11:00', null, '0');
INSERT INTO `t_log` VALUES ('110', 'admin', '暂停全部车辆排队', '2018-05-18 19:11:00', null, '0');
INSERT INTO `t_log` VALUES ('111', 'admin', '暂停全部车辆排队', '2018-05-18 19:11:01', null, '0');
INSERT INTO `t_log` VALUES ('112', 'admin', '暂停全部车辆排队', '2018-05-18 19:11:02', null, '0');
INSERT INTO `t_log` VALUES ('113', 'admin', '暂停全部车辆排队', '2018-05-18 19:11:53', null, '0');
INSERT INTO `t_log` VALUES ('114', 'admin', '下移订单ID为：3 的订单', '2018-05-18 19:14:49', null, '0');
INSERT INTO `t_log` VALUES ('115', 'admin', '下移订单ID为：6 的订单', '2018-05-18 19:14:52', null, '0');
INSERT INTO `t_log` VALUES ('116', 'admin', '上移订单ID为：6 的订单', '2018-05-18 19:15:17', null, '0');
INSERT INTO `t_log` VALUES ('117', 'admin', '上移订单ID为：3 的订单', '2018-05-18 19:15:54', null, '0');
INSERT INTO `t_log` VALUES ('118', 'admin', '暂停全部车辆排队', '2018-05-18 19:17:44', null, '0');
INSERT INTO `t_log` VALUES ('119', 'admin', '暂停全部车辆排队', '2018-05-18 19:20:59', null, '0');
INSERT INTO `t_log` VALUES ('120', 'admin', '上移订单ID为：9 的订单', '2018-05-18 19:21:56', null, '0');
INSERT INTO `t_log` VALUES ('121', 'admin', '上移订单ID为：8 的订单', '2018-05-18 19:22:06', null, '0');
INSERT INTO `t_log` VALUES ('122', 'admin', '暂停全部车辆排队', '2018-05-18 19:35:15', null, '0');
INSERT INTO `t_log` VALUES ('123', 'admin', '删除订单ID为：6 的订单', '2018-05-18 19:45:15', null, '0');
INSERT INTO `t_log` VALUES ('124', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:25', null, '0');
INSERT INTO `t_log` VALUES ('125', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:27', null, '0');
INSERT INTO `t_log` VALUES ('126', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:28', null, '0');
INSERT INTO `t_log` VALUES ('127', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:28', null, '0');
INSERT INTO `t_log` VALUES ('128', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:52', null, '0');
INSERT INTO `t_log` VALUES ('129', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:53', null, '0');
INSERT INTO `t_log` VALUES ('130', 'admin', '暂停全部车辆排队', '2018-05-18 19:47:58', null, '0');
INSERT INTO `t_log` VALUES ('131', 'admin', '暂停全部车辆排队', '2018-05-18 19:48:01', null, '0');
INSERT INTO `t_log` VALUES ('132', 'admin', '暂停全部车辆排队', '2018-05-18 19:48:03', null, '0');
INSERT INTO `t_log` VALUES ('133', 'admin', '暂停全部车辆排队', '2018-05-18 19:51:03', null, '0');
INSERT INTO `t_log` VALUES ('134', 'admin', '删除订单ID为：7 的订单', '2018-05-18 19:52:27', null, '0');
INSERT INTO `t_log` VALUES ('135', 'admin', '暂停全部车辆排队', '2018-05-18 20:00:50', null, '0');
INSERT INTO `t_log` VALUES ('136', 'admin', '暂停全部车辆排队', '2018-05-18 20:00:51', null, '0');
INSERT INTO `t_log` VALUES ('137', 'admin', '暂停全部车辆排队', '2018-05-18 20:02:46', null, '0');
INSERT INTO `t_log` VALUES ('138', 'admin', '暂停全部车辆排队', '2018-05-18 20:02:47', null, '0');
INSERT INTO `t_log` VALUES ('139', 'admin', '暂停全部车辆排队', '2018-05-18 20:02:48', null, '0');
INSERT INTO `t_log` VALUES ('140', 'admin', '暂停全部车辆排队', '2018-05-18 20:02:50', null, '0');
INSERT INTO `t_log` VALUES ('141', 'admin', '暂停全部车辆排队', '2018-05-18 20:03:44', null, '0');
INSERT INTO `t_log` VALUES ('142', 'admin', '暂停全部车辆排队', '2018-05-18 20:03:45', null, '0');
INSERT INTO `t_log` VALUES ('143', 'admin', '暂停全部车辆排队', '2018-05-18 20:03:45', null, '0');
INSERT INTO `t_log` VALUES ('144', 'admin', '暂停全部车辆排队', '2018-05-18 20:06:07', null, '0');
INSERT INTO `t_log` VALUES ('145', 'admin', '暂停全部车辆排队', '2018-05-18 20:06:25', null, '0');
INSERT INTO `t_log` VALUES ('146', 'admin', '暂停全部车辆排队', '2018-05-18 20:06:28', null, '0');
INSERT INTO `t_log` VALUES ('147', 'admin', '暂停全部车辆排队', '2018-05-18 20:06:40', null, '0');
INSERT INTO `t_log` VALUES ('148', 'admin', '暂停全部车辆排队', '2018-05-18 20:08:06', null, '0');
INSERT INTO `t_log` VALUES ('149', 'admin', '暂停全部车辆排队', '2018-05-18 20:08:08', null, '0');
INSERT INTO `t_log` VALUES ('150', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:16', null, '0');
INSERT INTO `t_log` VALUES ('151', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:19', null, '0');
INSERT INTO `t_log` VALUES ('152', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:19', null, '0');
INSERT INTO `t_log` VALUES ('153', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:20', null, '0');
INSERT INTO `t_log` VALUES ('154', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:21', null, '0');
INSERT INTO `t_log` VALUES ('155', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:21', null, '0');
INSERT INTO `t_log` VALUES ('156', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:22', null, '0');
INSERT INTO `t_log` VALUES ('157', 'admin', '暂停全部车辆排队', '2018-05-18 20:10:23', null, '0');
INSERT INTO `t_log` VALUES ('158', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:14', null, '0');
INSERT INTO `t_log` VALUES ('159', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:22', null, '0');
INSERT INTO `t_log` VALUES ('160', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:24', null, '0');
INSERT INTO `t_log` VALUES ('161', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:26', null, '0');
INSERT INTO `t_log` VALUES ('162', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:27', null, '0');
INSERT INTO `t_log` VALUES ('163', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:27', null, '0');
INSERT INTO `t_log` VALUES ('164', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:28', null, '0');
INSERT INTO `t_log` VALUES ('165', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:28', null, '0');
INSERT INTO `t_log` VALUES ('166', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:29', null, '0');
INSERT INTO `t_log` VALUES ('167', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:30', null, '0');
INSERT INTO `t_log` VALUES ('168', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:31', null, '0');
INSERT INTO `t_log` VALUES ('169', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:32', null, '0');
INSERT INTO `t_log` VALUES ('170', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:33', null, '0');
INSERT INTO `t_log` VALUES ('171', 'admin', '暂停全部车辆排队', '2018-05-18 20:12:33', null, '0');
INSERT INTO `t_log` VALUES ('172', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:27', null, '0');
INSERT INTO `t_log` VALUES ('173', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:32', null, '0');
INSERT INTO `t_log` VALUES ('174', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:33', null, '0');
INSERT INTO `t_log` VALUES ('175', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:34', null, '0');
INSERT INTO `t_log` VALUES ('176', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:35', null, '0');
INSERT INTO `t_log` VALUES ('177', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:36', null, '0');
INSERT INTO `t_log` VALUES ('178', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:37', null, '0');
INSERT INTO `t_log` VALUES ('179', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:45', null, '0');
INSERT INTO `t_log` VALUES ('180', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:46', null, '0');
INSERT INTO `t_log` VALUES ('181', 'admin', '暂停全部车辆排队', '2018-05-18 20:14:49', null, '0');
INSERT INTO `t_log` VALUES ('182', 'admin', '暂停全部车辆排队', '2018-05-18 20:26:21', null, '0');
INSERT INTO `t_log` VALUES ('183', 'admin', '暂停全部车辆排队', '2018-05-18 20:27:01', null, '0');
INSERT INTO `t_log` VALUES ('184', 'admin', '暂停全部车辆排队', '2018-05-18 20:27:29', null, '0');
INSERT INTO `t_log` VALUES ('185', 'admin', '暂停全部车辆排队', '2018-05-18 20:28:19', null, '0');
INSERT INTO `t_log` VALUES ('186', 'admin', '暂停全部车辆排队', '2018-05-18 20:28:22', null, '0');
INSERT INTO `t_log` VALUES ('187', 'admin', '暂停全部车辆排队', '2018-05-18 20:29:25', null, '0');
INSERT INTO `t_log` VALUES ('188', 'admin', '暂停全部车辆排队', '2018-05-18 20:29:39', null, '0');
INSERT INTO `t_log` VALUES ('189', 'admin', '暂停全部车辆排队', '2018-05-18 20:30:04', null, '0');
INSERT INTO `t_log` VALUES ('190', 'admin', '暂停全部车辆排队', '2018-05-18 20:30:08', null, '0');
INSERT INTO `t_log` VALUES ('191', 'admin', '置顶公告ID为：3 的公告', '2018-05-18 20:46:55', null, '0');
INSERT INTO `t_log` VALUES ('192', 'admin', '取消置顶公告ID为：3 的公告', '2018-05-18 20:47:03', null, '0');
INSERT INTO `t_log` VALUES ('193', 'admin', '置顶公告ID为：2 的公告', '2018-05-18 20:47:05', null, '0');
INSERT INTO `t_log` VALUES ('194', 'admin', '置顶公告ID为：3 的公告', '2018-05-18 20:52:41', null, '0');
INSERT INTO `t_log` VALUES ('195', 'admin', '暂停全部车辆排队', '2018-05-18 21:45:42', null, '0');
INSERT INTO `t_log` VALUES ('196', 'admin', '暂停全部车辆排队', '2018-05-18 21:45:44', null, '0');
INSERT INTO `t_log` VALUES ('197', 'admin', '暂停全部车辆排队', '2018-05-18 21:46:27', null, '0');
INSERT INTO `t_log` VALUES ('198', 'admin', '暂停全部车辆排队', '2018-05-18 21:46:30', null, '0');
INSERT INTO `t_log` VALUES ('199', 'admin', '暂停全部车辆排队', '2018-05-18 21:46:50', null, '0');
INSERT INTO `t_log` VALUES ('200', 'admin', '暂停全部车辆排队', '2018-05-18 21:47:01', null, '0');

-- ----------------------------
-- Table structure for t_notice
-- ----------------------------
DROP TABLE IF EXISTS `t_notice`;
CREATE TABLE `t_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(5) DEFAULT NULL COMMENT '公告编号',
  `content` text NOT NULL COMMENT '公告内容',
  `top` tinyint(4) NOT NULL DEFAULT '0' COMMENT '置顶功能。1为置顶，0为取消置顶',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_notice
-- ----------------------------
INSERT INTO `t_notice` VALUES ('1', 'N0001', '请把微信姓名改成真实姓名', '0', '2018-05-11 15:52:36', '2018-05-16 20:10:52', '', '0');
INSERT INTO `t_notice` VALUES ('2', 'N6018', '请准时到达。否则，后果自负！', '1', '2018-05-16 19:25:36', '2018-05-18 20:47:05', '', '0');
INSERT INTO `t_notice` VALUES ('3', 'N5565', '请保存好发票！', '1', '2018-05-16 19:45:41', '2018-05-18 20:52:41', null, '0');

-- ----------------------------
-- Table structure for t_oil
-- ----------------------------
DROP TABLE IF EXISTS `t_oil`;
CREATE TABLE `t_oil` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(5) NOT NULL COMMENT '油品编号',
  `name` char(20) NOT NULL COMMENT '油品名称',
  `type` char(20) NOT NULL COMMENT '油品类型',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_oil
-- ----------------------------
INSERT INTO `t_oil` VALUES ('1', 'O0111', '二甲苯', '芳香烃', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_oil` VALUES ('2', 'O0002', '乙醇', '烷烃', '2018-05-13 15:52:36', '2018-05-14 19:53:39', null, '0');
INSERT INTO `t_oil` VALUES ('5', 'O6436', '丙烯', '烯烃', '2018-05-14 19:21:01', null, null, '0');
INSERT INTO `t_oil` VALUES ('6', 'O2496', '乙烯', '烯烃', '2018-05-14 19:24:40', null, '', '0');
INSERT INTO `t_oil` VALUES ('7', 'O1256', '乙炔', '炔烃', '2018-05-14 19:24:40', null, null, '0');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '订单编号',
  `oil_id` int(11) NOT NULL COMMENT '油品ID',
  `oil_name` char(20) NOT NULL COMMENT '油品名称',
  `oil_type` char(20) NOT NULL COMMENT '油品类型',
  `plate` char(7) NOT NULL COMMENT '车牌号',
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
  `driver_name` char(20) DEFAULT NULL COMMENT '司机编号',
  `driver_company` char(20) DEFAULT NULL COMMENT '司机隶属公司',
  `order_status` tinyint(4) DEFAULT '3' COMMENT '订单状态。0已装，1装车，2厂内，3厂外',
  `order_number` int(11) DEFAULT NULL COMMENT '排队次序',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `oil_id` (`oil_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `t_oil` (`id`),
  CONSTRAINT `t_order_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('1', 'O0001', '1', '二甲苯', '芳香烃类', '粤L66666', '1', '赖俊强', '一匠', '0', null, '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('3', 'O0003', '5', '丙烯', '烯烃', '粤L88888', '2', '林晓聪', '一匠', '1', '1', '2018-05-13 15:52:36', '2018-05-18 21:47:01', null, '0');
INSERT INTO `t_order` VALUES ('6', 'O4643', '1', '二甲苯', '芳香烃', '粤L66666', '1', '赖俊强', '一匠', '2', '2', '2018-05-17 20:02:17', '2018-05-18 21:47:01', null, '0');
INSERT INTO `t_order` VALUES ('7', 'O6287', '6', '乙烯', '烯烃', '粤L77777', '3', '红底', '一匠', '3', '3', '2018-05-17 20:03:34', '2018-05-18 21:47:01', null, '0');
INSERT INTO `t_order` VALUES ('8', 'O4767', '6', '乙烯', '烯烃', '粤L55555', '4', '楚特', '一匠', '3', '4', '2018-05-17 20:04:48', '2018-05-18 21:47:01', null, '0');
INSERT INTO `t_order` VALUES ('9', 'O3884', '7', '乙炔', '炔烃', '粤L11111', '5', '张飞', '一匠', '3', '5', '2018-05-17 21:12:32', '2018-05-18 21:47:01', null, '0');

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` char(20) NOT NULL COMMENT '角色名称',
  `order_manage` tinyint(4) DEFAULT NULL COMMENT '订单管理权限',
  `driver_manage` tinyint(4) DEFAULT NULL COMMENT '司机管理权限',
  `oil_manage` tinyint(4) DEFAULT NULL COMMENT '油品管理权限',
  `user_manage` tinyint(4) DEFAULT NULL COMMENT '用户管理权限',
  `role_manage` tinyint(4) DEFAULT NULL COMMENT '角色管理权限',
  `log_manage` tinyint(4) DEFAULT NULL COMMENT '日志管理权限',
  `notice_manage` tinyint(4) DEFAULT NULL COMMENT '公告管理权限',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('31', '排队管理员', '1', '0', '0', '0', '0', '0', '0', '2018-05-14 21:12:58', '2018-05-16 18:43:26', '', '0');
INSERT INTO `t_role` VALUES ('32', '用户管理员', '0', '0', '0', '1', '0', '0', '0', '2018-05-14 21:17:02', null, null, '0');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `account` char(11) NOT NULL COMMENT '用户账号',
  `password` char(32) NOT NULL COMMENT '司机密码',
  `name` char(20) NOT NULL COMMENT '姓名',
  `role_id` int(11) DEFAULT NULL COMMENT '角色',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `t_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('6', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '赖俊强', '32', '2018-05-14 21:38:30', '2018-05-14 21:44:09', '', '0');
INSERT INTO `t_user` VALUES ('7', '13669586666', 'ba8180831b8d94535ddefad359f735b2', '林东', '31', '2018-05-14 21:44:46', null, null, '0');
