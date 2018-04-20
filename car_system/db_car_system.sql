/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_car_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-20 11:51:09
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
INSERT INTO `t_admin` VALUES ('1', '13669586274', 'd4e11d0fe335d390eb09f07fcf3bddd7', '2018-04-16 15:52:36', null);

-- ----------------------------
-- Table structure for t_car
-- ----------------------------
DROP TABLE IF EXISTS `t_car`;
CREATE TABLE `t_car` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '车辆编号',
  `plate` char(7) NOT NULL COMMENT '车牌号',
  `frame` char(17) NOT NULL COMMENT '车架号，VIN码17位',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_car
-- ----------------------------
INSERT INTO `t_car` VALUES ('1', 'A001', '粤L66666', '1G1BL52P7TR115520', '2018-04-19 15:13:40', '2018-04-19 23:52:15', '', '0');
INSERT INTO `t_car` VALUES ('2', 'A002', '粤L77777', '1G1BL52P7TR115522', '2018-04-19 15:20:40', '2018-04-19 23:51:05', '', '0');
INSERT INTO `t_car` VALUES ('3', 'A003', '粤L33333', '1G1BL52P7TR115520', '2018-04-20 00:13:44', null, null, '0');

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
  `image` char(30) DEFAULT NULL COMMENT '头像路径',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('1', 'A001', '13669586274', 'd4e11d0fe335d390eb09f07fcf3bddd7', '纠结', '', '2018-04-16 15:13:40', null, '', '0');
INSERT INTO `t_driver` VALUES ('2', 'A002', '13413027537', 'd4e11d0fe335d390eb09f07fcf3bddd7', '赖俊强', null, '2018-04-19 15:13:40', null, null, '0');
INSERT INTO `t_driver` VALUES ('4', '010804', '13669586278', 'd4e11d0fe335d390eb09f07fcf3bddd7', '张三', '', '2018-04-20 01:04:08', '2018-04-20 01:10:34', null, '0');
INSERT INTO `t_driver` VALUES ('5', '010805', '13669583333', 'd4e11d0fe335d390eb09f07fcf3bddd7', '李四', '', '2018-04-20 01:08:04', null, null, '0');

-- ----------------------------
-- Table structure for t_driver_car
-- ----------------------------
DROP TABLE IF EXISTS `t_driver_car`;
CREATE TABLE `t_driver_car` (
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
  `car_id` int(11) NOT NULL COMMENT '车辆ID',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`driver_id`,`car_id`),
  UNIQUE KEY `car_id` (`car_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_driver_car
-- ----------------------------

-- ----------------------------
-- Table structure for t_goods
-- ----------------------------
DROP TABLE IF EXISTS `t_goods`;
CREATE TABLE `t_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '商品编号',
  `name` char(20) NOT NULL COMMENT '商品名称',
  `quantity` char(10) NOT NULL COMMENT '商品数量',
  `real_quantity` char(10) NOT NULL COMMENT '商品实际数量',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_goods
-- ----------------------------

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(14) NOT NULL COMMENT '订单编号',
  `order_number` char(20) DEFAULT NULL COMMENT '订单号',
  `goods_name` char(20) NOT NULL COMMENT '商品名称',
  `goods_quantity` char(10) NOT NULL COMMENT '商品数量',
  `create_time` char(19) NOT NULL COMMENT '订单创建时间',
  `departure_time` char(16) DEFAULT NULL COMMENT '订单出发时间',
  `car_plate` char(7) DEFAULT NULL COMMENT '车牌号',
  `destination` char(30) NOT NULL COMMENT '目的地',
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态，0表示未接单，1表示已接单，2表示已结束',
  `driver_number` char(20) DEFAULT NULL COMMENT '司机编号',
  `pick_number` char(20) DEFAULT NULL COMMENT '提货单号',
  `contract_number` char(20) DEFAULT NULL COMMENT '合同号',
  `short_info` char(20) DEFAULT NULL COMMENT '缺货信息',
  `pick_quantity` char(10) DEFAULT NULL COMMENT '商品提货数量',
  `pick_time` char(16) DEFAULT NULL COMMENT '提货时间',
  `company` char(20) DEFAULT '' COMMENT '结算单位',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  `real_quantity` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('17', '20180418170006', 'A017', '纸巾', '500箱', '2018-04-18 17:05:00', '2018-04-20T10:00', '', '广州', '0', '', '', '', '', '', '', '', '2018-04-20 00:36:41', null, '0', null);
INSERT INTO `t_order` VALUES ('18', '20180418170249', 'A018', '手机', '1000部', '2018-04-18 17:02:49', '2018-05-01T17:00', '', '惠州', '0', 'A001', '', '', '', '', '', '', '2018-04-20 11:40:07', '', '0', null);
INSERT INTO `t_order` VALUES ('19', '20180418170240', 'A019', '笔记本', '200箱', '2018-04-18 17:03:00', '2018-06-01T17:00', '', '深圳', '0', 'A001', '', '', '', '', '', '', '2018-04-20 11:24:56', null, '0', null);
INSERT INTO `t_order` VALUES ('20', '20180418170349', 'A020', '电脑', '1000台', '2018-04-18 17:05:00', '2018-06-01T17:00', null, '广州', '0', null, null, null, null, null, null, '', null, '2018-04-20 11:11:50', '1', null);
