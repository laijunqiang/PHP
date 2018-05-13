/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_vehicle_reservation_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-13 22:58:21
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
-- Table structure for t_car
-- ----------------------------
DROP TABLE IF EXISTS `t_car`;
CREATE TABLE `t_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '车辆编号',
  `plate` char(7) NOT NULL COMMENT '车牌号',
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `plate` (`plate`) USING BTREE,
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `t_car_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_car
-- ----------------------------

-- ----------------------------
-- Table structure for t_driver
-- ----------------------------
DROP TABLE IF EXISTS `t_driver`;
CREATE TABLE `t_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(8) NOT NULL COMMENT '司机编号',
  `account` char(11) NOT NULL COMMENT '司机账号',
  `password` char(32) NOT NULL COMMENT '司机密码',
  `name` char(20) NOT NULL COMMENT '真实姓名',
  `image` char(31) DEFAULT NULL COMMENT '头像路径',
  `nickname` char(32) DEFAULT NULL COMMENT '昵称',
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
INSERT INTO `t_driver` VALUES ('1', 'D0001', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '赖俊强', null, '纠结', '一匠科技', '2018-05-11 15:52:36', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('1', 'admin', '修改账号为：admin 的车辆', '2018-05-11 20:56:09', null, '0');
INSERT INTO `t_log` VALUES ('2', 'admin', '修改账号为：admin 的车辆', '2018-05-11 20:56:32', null, '0');

-- ----------------------------
-- Table structure for t_notice
-- ----------------------------
DROP TABLE IF EXISTS `t_notice`;
CREATE TABLE `t_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `content` text NOT NULL COMMENT '公告内容',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_notice
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_oil
-- ----------------------------
INSERT INTO `t_oil` VALUES ('1', 'O0111', '二甲苯', '芳香烃类', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_oil` VALUES ('2', 'O0002', '乙醇', '芳香烃类', '2018-05-11 15:52:36', null, null, '0');

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
  `vehicle_id` int(11) NOT NULL COMMENT '车辆ID',
  `vehicle_plate` char(7) NOT NULL COMMENT '车牌号',
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
  `driver_number` char(20) DEFAULT NULL COMMENT '司机编号',
  `driver_company` char(20) DEFAULT NULL COMMENT '司机隶属公司',
  `order_status` tinyint(4) NOT NULL COMMENT '订单状态',
  `order` int(11) NOT NULL COMMENT '排队次序',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `oil_id` (`oil_id`),
  KEY `driver_id` (`driver_id`),
  KEY `vehicle_id` (`vehicle_id`) USING BTREE,
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`oil_id`) REFERENCES `t_oil` (`id`),
  CONSTRAINT `t_order_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `t_vehicle` (`id`),
  CONSTRAINT `t_order_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('1', 'O0001', '1', '二甲苯', '芳香烃类', '1', '粤L66666', '1', 'D0001', '一匠科技', '1', '1', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_order` VALUES ('2', 'O0002', '2', '乙醇', '芳香烃类', '1', '粤L66666', '1', 'D0001', '一匠', '2', '2', '2018-05-11 15:52:36', null, null, '0');

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` char(20) NOT NULL COMMENT '角色名称',
  `order_manage` tinyint(4) DEFAULT NULL COMMENT '订单管理权限',
  `driver_manage` tinyint(4) DEFAULT NULL COMMENT '司机管理权限',
  `vehicle_manage` tinyint(4) DEFAULT NULL COMMENT '车辆管理权限',
  `oil_manage` tinyint(4) DEFAULT NULL COMMENT '油品管理权限',
  `user_manage` tinyint(4) DEFAULT NULL COMMENT '用户管理权限',
  `role_manage` tinyint(4) DEFAULT NULL COMMENT '角色管理权限',
  `log_manage` tinyint(4) DEFAULT NULL COMMENT '日志管理权限',
  `notice_manage` tinyint(4) DEFAULT NULL COMMENT '公告管理权限',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('1', '派单员', '1', '0', '0', '0', '0', '0', '0', null, '2018-04-29 14:04:55', '2018-05-06 21:35:25', '', '0');
INSERT INTO `t_role` VALUES ('24', '司机管理员', '0', '1', '0', '0', '0', '0', '0', null, '2018-05-06 21:35:42', null, null, '0');
INSERT INTO `t_role` VALUES ('25', '管理员', '1', '1', '1', '1', '1', '0', '0', null, '2018-05-07 12:36:11', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('1', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '萧晓东', '1', '2018-04-29 14:04:55', null, '', '0');
INSERT INTO `t_user` VALUES ('4', '13138336273', 'ba8180831b8d94535ddefad359f735b2', '马东', '25', '2018-05-06 23:16:27', '2018-05-07 12:36:26', null, '0');
INSERT INTO `t_user` VALUES ('5', '12345678901', 'ba8180831b8d94535ddefad359f735b2', '朱琪', '24', '2018-05-07 12:31:55', null, null, '0');

-- ----------------------------
-- Table structure for t_vehicle
-- ----------------------------
DROP TABLE IF EXISTS `t_vehicle`;
CREATE TABLE `t_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '车辆编号',
  `plate` char(7) NOT NULL COMMENT '车牌号',
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `t_vehicle_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_vehicle
-- ----------------------------
INSERT INTO `t_vehicle` VALUES ('1', 'V0110', '粤L66666', '1', '2018-05-11 15:52:36', null, null, '0');
