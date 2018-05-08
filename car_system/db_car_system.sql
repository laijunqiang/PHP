/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_car_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-08 14:48:39
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
INSERT INTO `t_admin` VALUES ('1', 'admin', 'f79908a3fdc52d8748a76d003372f1e2', '2018-04-16 15:52:36', '2018-05-07 12:41:21');

-- ----------------------------
-- Table structure for t_car
-- ----------------------------
DROP TABLE IF EXISTS `t_car`;
CREATE TABLE `t_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '车辆编号',
  `plate` char(7) DEFAULT NULL COMMENT '车牌号',
  `frame` char(17) NOT NULL COMMENT '车架号，VIN码17位',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `frame` (`frame`) USING BTREE,
  UNIQUE KEY `plate` (`plate`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_car
-- ----------------------------
INSERT INTO `t_car` VALUES ('7', 'C07421', '京A00000', '221BL52P7TR115521', '2018-05-02 16:30:50', null, null, '0');
INSERT INTO `t_car` VALUES ('8', 'C02554', '粤L66666', '111BL52P7TR115522', '2018-05-02 16:43:22', '2018-05-03 11:08:35', null, '0');
INSERT INTO `t_car` VALUES ('9', 'C09461', '滇C55555', '221BL52P7TR115522', '2018-05-02 17:02:24', '2018-05-03 11:07:38', '', '0');

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
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('10', '130754', '12345676666', 'd4e11d0fe335d390eb09f07fcf3bddd7', '刘强东', '/Public/image/5aee8daad3a6d.jpg', '2018-05-06 13:07:54', '2018-05-08 14:27:38', null, '0');
INSERT INTO `t_driver` VALUES ('11', '161544', '13669586274', 'd4e11d0fe335d390eb09f07fcf3bddd7', '赖俊强', '/Public/image/5aeeb9b05c507.jpg', '2018-05-06 16:15:44', null, null, '0');
INSERT INTO `t_driver` VALUES ('12', '161650', '13669581111', 'd4e11d0fe335d390eb09f07fcf3bddd7', '张三', '/Public/image/5aeec3e904668.jpg', '2018-05-06 16:16:50', '2018-05-06 16:59:21', '', '0');

-- ----------------------------
-- Table structure for t_goods
-- ----------------------------
DROP TABLE IF EXISTS `t_goods`;
CREATE TABLE `t_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(5) NOT NULL COMMENT '商品编号',
  `name` char(20) NOT NULL COMMENT '商品名称',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_goods
-- ----------------------------
INSERT INTO `t_goods` VALUES ('1', 'G0001', '汽油', '2018-04-29 14:04:55', null, null, '0');
INSERT INTO `t_goods` VALUES ('2', 'G0002', '石油', '2018-04-29 14:23:55', null, null, '0');
INSERT INTO `t_goods` VALUES ('3', 'G0003', '柴油', '2018-04-29 15:23:55', null, null, '0');
INSERT INTO `t_goods` VALUES ('4', 'G0004', '煤油', '2018-04-29 16:00:00', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('153', 'admin', '生成司机编号为：215534 的司机', '2018-05-07 21:55:34', null, '0');
INSERT INTO `t_log` VALUES ('154', 'admin', '修改司机编号为：215534 的司机', '2018-05-07 21:55:38', null, '0');
INSERT INTO `t_log` VALUES ('155', 'admin', '修改司机编号为：215534 的司机', '2018-05-07 21:55:41', null, '0');
INSERT INTO `t_log` VALUES ('156', 'admin', '修改司机编号为：215534 的司机', '2018-05-07 21:55:43', null, '0');
INSERT INTO `t_log` VALUES ('157', 'admin', '修改司机编号为：215534 的司机', '2018-05-07 21:55:47', '2018-05-08 10:32:46', '1');
INSERT INTO `t_log` VALUES ('158', 'admin', '修改司机编号为：215534 的司机', '2018-05-07 21:55:51', '2018-05-08 10:20:16', '1');
INSERT INTO `t_log` VALUES ('159', 'admin', '删除司机ID为：13 的司机', '2018-05-07 21:55:53', '2018-05-08 10:20:16', '1');
INSERT INTO `t_log` VALUES ('160', 'admin', '删除日志ID为：Array 的日志', '2018-05-08 10:20:16', '2018-05-08 10:32:46', '1');
INSERT INTO `t_log` VALUES ('161', 'admin', '删除日志ID为：160,157 的日志', '2018-05-08 10:32:46', null, '0');
INSERT INTO `t_log` VALUES ('162', 'admin', '修改订单编号为：O20180430090334 的订单', '2018-05-08 10:36:44', null, '0');
INSERT INTO `t_log` VALUES ('163', 'admin', '删除订单ID为：75 的订单', '2018-05-08 10:36:47', null, '0');
INSERT INTO `t_log` VALUES ('164', 'admin', '删除订单ID为：73 的订单', '2018-05-08 10:36:50', null, '0');
INSERT INTO `t_log` VALUES ('165', 'admin', '生成订单编号为：O20180508143014 的订单', '2018-05-08 14:30:14', '', '0');
INSERT INTO `t_log` VALUES ('166', 'admin', '生成订单编号为：O20180508143050 的订单', '2018-05-08 14:30:50', '', '0');
INSERT INTO `t_log` VALUES ('167', 'admin', '删除日志ID为：166,165 的日志', '2018-05-08 14:31:20', null, '0');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(15) NOT NULL COMMENT '订单编号',
  `order_number` char(20) DEFAULT NULL COMMENT '订单号',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `goods_name` char(20) NOT NULL COMMENT '商品名称',
  `goods_quantity` int(11) NOT NULL COMMENT '商品数量',
  `create_time` char(19) NOT NULL COMMENT '订单创建时间',
  `departure_time` char(19) DEFAULT NULL COMMENT '订单出发时间',
  `car_id` int(11) DEFAULT NULL COMMENT '车辆ID',
  `car_plate` char(7) DEFAULT NULL COMMENT '车牌号',
  `destination` char(30) NOT NULL COMMENT '目的地',
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态，0表示未接单，1表示已接单，2表示已结束',
  `driver_id` int(11) DEFAULT NULL COMMENT '司机ID',
  `driver_number` char(20) DEFAULT NULL COMMENT '司机编号',
  `pick_number` char(20) DEFAULT NULL COMMENT '提货单号',
  `contract_number` char(20) DEFAULT NULL COMMENT '合同号',
  `short_info` char(20) DEFAULT NULL COMMENT '缺货信息',
  `pick_quantity` int(11) DEFAULT NULL COMMENT '商品提货数量',
  `pick_time` char(19) DEFAULT NULL COMMENT '提货时间',
  `company` char(20) DEFAULT '' COMMENT '结算单位',
  `real_quantity` int(11) DEFAULT NULL COMMENT '商品实际数量',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`),
  KEY `car_id` (`car_id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `t_order_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `t_goods` (`id`),
  CONSTRAINT `t_order_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `t_car` (`id`),
  CONSTRAINT `t_order_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('73', 'O20180429164413', 'O201804', '2', '石油', '1000', '2018-04-29 16:44:13', '2018-05-01 16:00:00', '9', '滇C55555', '一匠科技', '1', '10', '130754', 'O456', 'O456', '', '1000', '2018-05-08 22:00:00', '一匠', null, '2018-05-08 13:43:59', '', '0');
INSERT INTO `t_order` VALUES ('75', 'O20180430090334', 'O201806', '4', '煤油', '1000', '2018-04-30 09:03:34', '2018-06-01 02:03:00', '9', '滇C55555', '长隆欢乐世界', '2', '10', '130754', 'O123', 'O123', '', '1000', '2018-05-08 20:00:00', '一匠', '999', '2018-05-08 13:43:07', '', '0');
INSERT INTO `t_order` VALUES ('76', 'O20180508143014', 'O201811', '4', '煤油', '1000', '2018-05-08 14:30:14', '2018-05-08 21:00:00', null, null, '罗浮山', '0', null, null, null, null, null, null, null, '', null, null, null, '0');
INSERT INTO `t_order` VALUES ('77', 'O20180508143050', 'O201813', '4', '煤油', '10000', '2018-05-08 14:30:50', '2018-05-25 17:00:00', null, '', '台湾', '0', null, '', '', '', '', null, '', '', null, '', null, '0');

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` char(20) NOT NULL COMMENT '角色名称',
  `order_manage` tinyint(4) DEFAULT NULL COMMENT '订单管理权限',
  `driver_manage` tinyint(4) DEFAULT NULL COMMENT '司机管理权限',
  `car_manage` tinyint(4) DEFAULT NULL COMMENT '车辆管理权限',
  `goods_manage` tinyint(4) DEFAULT NULL COMMENT '商品管理权限',
  `user_manage` tinyint(4) DEFAULT NULL COMMENT '用户管理权限',
  `role_manage` tinyint(4) DEFAULT NULL COMMENT '角色管理权限',
  `log_manage` tinyint(4) DEFAULT NULL COMMENT '日志管理权限',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('1', '派单员', '1', '0', '0', '0', '0', '0', '0', '2018-04-29 14:04:55', '2018-05-06 21:35:25', '', '0');
INSERT INTO `t_role` VALUES ('24', '司机管理员', '0', '1', '0', '0', '0', '0', '0', '2018-05-06 21:35:42', null, null, '0');
INSERT INTO `t_role` VALUES ('25', '管理员', '1', '1', '1', '1', '1', '0', '0', '2018-05-07 12:36:11', null, null, '0');

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
INSERT INTO `t_user` VALUES ('1', '13138336179', 'd4e11d0fe335d390eb09f07fcf3bddd7', '萧晓东', '1', '2018-04-29 14:04:55', null, '', '0');
INSERT INTO `t_user` VALUES ('4', '13138336273', 'd4e11d0fe335d390eb09f07fcf3bddd7', '马东', '25', '2018-05-06 23:16:27', '2018-05-07 12:36:26', null, '0');
INSERT INTO `t_user` VALUES ('5', '12345678901', 'd4e11d0fe335d390eb09f07fcf3bddd7', '朱琪', '24', '2018-05-07 12:31:55', null, null, '0');
