/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_vehicle_reservation_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-16 21:58:04
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('1', 'o47Fa0mp9SRTf3eiKmqWm69BjG_8', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '赖俊强', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE5xptsib9Kia11eibwQciblhnUEVlyhu4UNK5BMqs47kYbYYG4dlRa8NRhw3iciaybyO2vUGJnB8CYJM2ya2q1gjldx9ib/132', '纠结', '粤L66666', '一匠科技', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('2', 'oyur_1JsPp73VApJ5AfbUHGmvyPo', '13669581234', 'ba8180831b8d94535ddefad359f735b2', '林晓聪', 'http://thirdwx.qlogo.cn/mmopen/6Zzu4IicyEE7ar2kVTlu6ZgPpINE6aslAgWTNIibCMPvDib3LgRFxnnC07kR2aaL9hiau0caichC0zhFweQBDj60objmmuAt7O2DK/132', '晓聪', '粤L88888', '一匠', '2018-05-11 15:52:36', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

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
INSERT INTO `t_notice` VALUES ('2', 'N6018', '请准时到达。否则，后果自负！', '0', '2018-05-16 19:25:36', '2018-05-16 20:10:50', '', '0');
INSERT INTO `t_notice` VALUES ('3', 'N5565', '请保存好发票！', '0', '2018-05-16 19:45:41', '2018-05-16 20:10:53', null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_oil
-- ----------------------------
INSERT INTO `t_oil` VALUES ('1', 'O0111', '二甲苯', '芳香烃', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_oil` VALUES ('2', 'O0002', '乙醇', '烷烃', '2018-05-13 15:52:36', '2018-05-14 19:53:39', null, '0');
INSERT INTO `t_oil` VALUES ('5', 'O6436', '丙烯', '烯烃', '2018-05-14 19:21:01', null, null, '0');
INSERT INTO `t_oil` VALUES ('6', 'O2496', '乙烯', '烯烃', '2018-05-14 19:24:40', null, '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('1', 'O0001', '1', '二甲苯', '芳香烃类', '粤L66666', '1', '赖俊强', '一匠科技', '0', null, '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('2', 'O0002', '2', '乙醇', '芳香烃类', '粤L66666', '1', '赖俊强', '一匠', '2', '2', '2018-05-16 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('3', 'O0003', '5', '丙烯', '烯烃', '粤L88888', '2', '林晓聪', '一匠', '1', '1', '2018-05-13 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('4', 'O0004', '6', '乙烯', '烯烃', '粤L88888', '2', '林晓聪', '一匠', '3', '3', '2018-05-17 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('5', 'O0005', '6', '乙烯', '烯烃', '粤L88888', '2', '林晓聪', '一匠', '3', '4', '2018-05-18 15:52:36', null, null, '0');

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
