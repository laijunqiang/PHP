/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_car_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-03 18:37:50
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
INSERT INTO `t_admin` VALUES ('1', 'admin', 'f79908a3fdc52d8748a76d003372f1e2', '2018-04-16 15:52:36', '2018-04-23 11:20:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('1', '010801', '13669586274', 'd4e11d0fe335d390eb09f07fcf3bddd7', '郑文', '', '2018-04-16 15:13:40', '2018-04-25 19:18:57', '', '0');
INSERT INTO `t_driver` VALUES ('2', '010802', '13413027537', 'd4e11d0fe335d390eb09f07fcf3bddd7', '赖俊强', null, '2018-04-19 15:13:40', null, '', '0');
INSERT INTO `t_driver` VALUES ('4', '010804', '13669586278', 'd4e11d0fe335d390eb09f07fcf3bddd7', '张三', '', '2018-04-20 01:04:08', '2018-04-20 01:10:34', '', '0');
INSERT INTO `t_driver` VALUES ('5', '010805', '13669583333', 'd4e11d0fe335d390eb09f07fcf3bddd7', '李四', '', '2018-04-20 01:08:04', null, '', '0');
INSERT INTO `t_driver` VALUES ('6', '202819', '12345678901', 'd4e11d0fe335d390eb09f07fcf3bddd7', '王五', '', '2018-04-20 20:28:19', null, '', '0');
INSERT INTO `t_driver` VALUES ('7', '105911', '13669586666', 'd4e11d0fe335d390eb09f07fcf3bddd7', '林东凡', '', '2018-04-23 10:59:11', '2018-04-23 10:59:24', '', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('42', 'admin', '修改账号为：admin 的车辆', '2018-04-23 11:20:23', null, '0');
INSERT INTO `t_log` VALUES ('43', 'admin', '退出系统', '2018-04-23 11:20:25', null, '0');
INSERT INTO `t_log` VALUES ('44', '郑文', '登录系统', '2018-04-23 11:20:36', null, '0');
INSERT INTO `t_log` VALUES ('45', '郑文', '生成订单编号为：20180423112105 的订单', '2018-04-23 11:21:05', null, '0');
INSERT INTO `t_log` VALUES ('46', '郑文', '修改订单编号为：20180423112105 的订单', '2018-04-23 11:21:10', null, '0');
INSERT INTO `t_log` VALUES ('47', '郑文', '删除订单ID为：70 的订单', '2018-04-23 11:21:19', null, '0');
INSERT INTO `t_log` VALUES ('48', '郑文', '退出系统', '2018-04-23 11:21:23', null, '0');
INSERT INTO `t_log` VALUES ('49', '郑文', '登录系统', '2018-04-23 11:21:36', null, '0');
INSERT INTO `t_log` VALUES ('50', '郑文', '退出系统', '2018-04-23 11:22:07', null, '0');
INSERT INTO `t_log` VALUES ('51', 'admin', '登录系统', '2018-04-23 11:22:27', null, '0');
INSERT INTO `t_log` VALUES ('52', 'admin', '登录系统', '2018-04-23 18:37:42', null, '0');
INSERT INTO `t_log` VALUES ('53', 'admin', '退出系统', '2018-04-23 20:02:22', null, '0');
INSERT INTO `t_log` VALUES ('54', 'admin', '登录系统', '2018-04-23 20:02:23', null, '0');
INSERT INTO `t_log` VALUES ('55', 'admin', '退出系统', '2018-04-23 20:04:42', null, '0');
INSERT INTO `t_log` VALUES ('56', 'admin', '登录系统', '2018-04-23 20:11:08', null, '0');
INSERT INTO `t_log` VALUES ('57', 'admin', '退出系统', '2018-04-23 20:12:33', null, '0');
INSERT INTO `t_log` VALUES ('58', '郑文', '登录系统', '2018-04-23 20:37:59', null, '0');
INSERT INTO `t_log` VALUES ('59', '郑文', '登录系统', '2018-04-24 16:34:25', null, '0');
INSERT INTO `t_log` VALUES ('60', '郑文', '退出系统', '2018-04-24 17:08:40', null, '0');
INSERT INTO `t_log` VALUES ('61', '郑文', '登录系统', '2018-04-24 17:31:44', null, '0');
INSERT INTO `t_log` VALUES ('62', '郑文', '退出系统', '2018-04-24 17:31:47', null, '0');
INSERT INTO `t_log` VALUES ('63', 'admin', '登录系统', '2018-04-24 17:31:49', null, '0');
INSERT INTO `t_log` VALUES ('64', 'admin', '退出系统', '2018-04-24 17:34:39', null, '0');
INSERT INTO `t_log` VALUES ('65', 'admin', '登录系统', '2018-04-25 19:22:45', null, '0');
INSERT INTO `t_log` VALUES ('66', 'admin', '登录系统', '2018-04-25 19:22:49', null, '0');
INSERT INTO `t_log` VALUES ('67', 'admin', '退出系统', '2018-04-25 19:22:54', null, '0');
INSERT INTO `t_log` VALUES ('68', 'admin', '登录系统', '2018-04-25 19:22:56', null, '0');
INSERT INTO `t_log` VALUES ('69', 'admin', '登录系统', '2018-04-25 19:23:06', null, '0');
INSERT INTO `t_log` VALUES ('70', 'admin', '退出系统', '2018-04-25 19:23:23', null, '0');
INSERT INTO `t_log` VALUES ('71', 'admin', '登录系统', '2018-04-25 19:23:24', null, '0');
INSERT INTO `t_log` VALUES ('72', 'admin', '退出系统', '2018-04-25 19:29:37', null, '0');
INSERT INTO `t_log` VALUES ('73', 'admin', '登录系统', '2018-04-25 19:44:05', null, '0');
INSERT INTO `t_log` VALUES ('74', 'admin', '退出系统', '2018-04-25 19:44:08', null, '0');
INSERT INTO `t_log` VALUES ('75', 'admin', '登录系统', '2018-04-25 19:44:43', null, '0');
INSERT INTO `t_log` VALUES ('76', 'admin', '退出系统', '2018-04-25 19:44:51', null, '0');
INSERT INTO `t_log` VALUES ('77', 'admin', '登录系统', '2018-04-25 19:44:51', null, '0');
INSERT INTO `t_log` VALUES ('78', 'admin', '登录系统', '2018-04-25 19:44:55', null, '0');
INSERT INTO `t_log` VALUES ('79', 'admin', '退出系统', '2018-04-25 19:44:57', null, '0');
INSERT INTO `t_log` VALUES ('80', 'admin', '登录系统', '2018-04-25 19:53:39', null, '0');
INSERT INTO `t_log` VALUES ('81', '郑文', '登录系统', '2018-04-25 21:01:15', null, '0');
INSERT INTO `t_log` VALUES ('82', '郑文', '退出系统', '2018-04-25 21:01:17', null, '0');
INSERT INTO `t_log` VALUES ('83', 'admin', '登录系统', '2018-04-25 21:01:19', null, '0');
INSERT INTO `t_log` VALUES ('84', 'admin', '退出系统', '2018-04-25 21:04:05', null, '0');
INSERT INTO `t_log` VALUES ('85', 'admin', '登录系统', '2018-04-25 21:04:06', null, '0');
INSERT INTO `t_log` VALUES ('86', 'admin', '删除订单ID为：23 的订单', '2018-04-25 21:19:22', null, '0');
INSERT INTO `t_log` VALUES ('87', 'admin', '修改订单编号为：20180420160613 的订单', '2018-04-25 22:34:28', null, '0');
INSERT INTO `t_log` VALUES ('88', 'admin', '修改订单编号为：20180420160613 的订单', '2018-04-25 22:45:29', '2018-04-25 22:46:07', '1');
INSERT INTO `t_log` VALUES ('89', 'admin', '删除日志ID为：88 的日志', '2018-04-25 22:46:07', '2018-04-25 22:46:29', '1');
INSERT INTO `t_log` VALUES ('90', 'admin', '删除日志ID为：89 的日志', '2018-04-25 22:46:29', null, '0');
INSERT INTO `t_log` VALUES ('91', 'admin', '生成订单编号为：20180425224936 的订单', '2018-04-25 22:49:36', null, '0');
INSERT INTO `t_log` VALUES ('92', 'admin', '修改订单编号为：20180420160932 的订单', '2018-04-25 22:51:30', null, '0');
INSERT INTO `t_log` VALUES ('93', 'admin', '修改订单编号为：20180420160932 的订单', '2018-04-25 23:01:15', null, '0');
INSERT INTO `t_log` VALUES ('94', 'admin', '修改订单编号为：20180420201537 的订单', '2018-04-25 23:01:30', null, '0');
INSERT INTO `t_log` VALUES ('95', 'admin', '删除订单ID为：67 的订单', '2018-04-25 23:02:08', null, '0');
INSERT INTO `t_log` VALUES ('96', 'admin', '登录系统', '2018-04-29 13:57:37', null, '0');
INSERT INTO `t_log` VALUES ('97', 'admin', '生成订单编号为：20180429140455 的订单', '2018-04-29 14:04:55', null, '0');
INSERT INTO `t_log` VALUES ('98', 'admin', '生成订单编号为：O20180429164413 的订单', '2018-04-29 16:44:13', null, '0');
INSERT INTO `t_log` VALUES ('99', 'admin', '生成订单编号为：O20180429164616 的订单', '2018-04-29 16:46:16', null, '0');
INSERT INTO `t_log` VALUES ('100', 'admin', '生成订单编号为：O20180430090334 的订单', '2018-04-30 09:03:34', null, '0');
INSERT INTO `t_log` VALUES ('101', 'admin', '修改订单编号为：O20180429164616 的订单', '2018-05-01 17:39:03', null, '0');
INSERT INTO `t_log` VALUES ('102', 'admin', '删除订单ID为：73 的订单', '2018-05-01 17:41:38', null, '0');
INSERT INTO `t_log` VALUES ('103', 'admin', '生成司机编号为：090047 的司机', '2018-05-02 09:00:47', null, '0');
INSERT INTO `t_log` VALUES ('104', 'admin', '生成司机编号为：090555 的司机', '2018-05-02 09:05:55', null, '0');
INSERT INTO `t_log` VALUES ('105', 'admin', '生成司机编号为：091139 的司机', '2018-05-02 09:11:39', null, '0');
INSERT INTO `t_log` VALUES ('106', 'admin', '生成司机编号为：091236 的司机', '2018-05-02 09:12:36', null, '0');
INSERT INTO `t_log` VALUES ('107', 'admin', '生成司机编号为：124920 的司机', '2018-05-02 12:49:20', null, '0');
INSERT INTO `t_log` VALUES ('108', 'admin', '生成车辆编号为：C09058 的车辆', '2018-05-02 16:28:43', null, '0');
INSERT INTO `t_log` VALUES ('109', 'admin', '生成车辆编号为：C07421 的车辆', '2018-05-02 16:30:50', null, '0');
INSERT INTO `t_log` VALUES ('110', 'admin', '生成车辆编号为：C02554 的车辆', '2018-05-02 16:43:22', null, '0');
INSERT INTO `t_log` VALUES ('111', 'admin', '生成车辆编号为：C09461 的车辆', '2018-05-02 17:02:24', null, '0');
INSERT INTO `t_log` VALUES ('112', 'admin', '修改车辆编号为：C09461 的车辆', '2018-05-02 18:21:27', null, '0');
INSERT INTO `t_log` VALUES ('113', 'admin', '修改车辆编号为：C09461 的车辆', '2018-05-02 18:27:23', null, '0');
INSERT INTO `t_log` VALUES ('114', 'admin', '修改车辆编号为：C09461 的车辆', '2018-05-02 18:27:34', null, '0');
INSERT INTO `t_log` VALUES ('115', 'admin', '修改车辆编号为：C02554 的车辆', '2018-05-02 18:27:45', null, '0');
INSERT INTO `t_log` VALUES ('116', 'admin', '修改车辆编号为：C09461 的车辆', '2018-05-03 11:07:31', null, '0');
INSERT INTO `t_log` VALUES ('117', 'admin', '修改车辆编号为：C09461 的车辆', '2018-05-03 11:07:38', null, '0');
INSERT INTO `t_log` VALUES ('118', 'admin', '修改车辆编号为：C02554 的车辆', '2018-05-03 11:08:35', null, '0');
INSERT INTO `t_log` VALUES ('119', 'admin', '删除车辆ID为：9 的车辆', '2018-05-03 11:09:10', null, '0');

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
  `pick_time` char(16) DEFAULT NULL COMMENT '提货时间',
  `company` char(20) DEFAULT '' COMMENT '结算单位',
  `real_quantity` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('73', 'O20180429164413', 'O201804', '2', '石油', '1000', '2018-04-29 16:44:13', '2018-05-01 16:00:00', null, null, '一匠科技', '0', null, null, null, null, null, null, null, '', null, null, '', '0');
INSERT INTO `t_order` VALUES ('75', 'O20180430090334', 'O201806', '4', '煤油', '1000', '2018-04-30 09:03:34', '2018-05-01 02:03:00', null, null, '长隆欢乐世界', '0', null, null, null, null, null, null, null, '', null, null, null, '0');

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `driver_id` int(11) DEFAULT NULL COMMENT '司机ID',
  `driver_name` char(20) DEFAULT NULL COMMENT '司机名称',
  `order_manage` tinyint(4) DEFAULT NULL COMMENT '订单管理权限',
  `driver_manage` tinyint(4) DEFAULT NULL COMMENT '用户管理权限',
  `car_manage` tinyint(4) DEFAULT NULL COMMENT '车辆管理权限',
  `role_manage` tinyint(4) DEFAULT NULL COMMENT '角色管理权限',
  `log_manage` tinyint(4) DEFAULT NULL COMMENT '日志管理权限',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  KEY `driver_id` (`driver_id`),
  CONSTRAINT `t_role_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `t_driver` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('8', '1', '郑文', '1', '0', '0', '0', '0', '2018-04-21 10:09:22', '2018-04-21 11:17:57', '', '0');
INSERT INTO `t_role` VALUES ('9', '2', '赖俊强', '1', '1', '1', '0', '0', '2018-04-21 10:28:17', '2018-04-21 14:44:19', '', '0');
INSERT INTO `t_role` VALUES ('16', '4', '张三', '1', '1', '0', '0', '0', '2018-04-21 11:13:47', '2018-04-21 11:18:49', '', '0');
