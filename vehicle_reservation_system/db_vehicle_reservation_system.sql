/*
Navicat MySQL Data Transfer

Source Server         : vehicle_reservation_system
Source Server Version : 50549
Source Host           : 101.200.125.126:3306
Source Database       : student1

Target Server Type    : MYSQL
Target Server Version : 50549
File Encoding         : 65001

Date: 2018-06-12 17:11:02
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
INSERT INTO `t_admin` VALUES ('1', 'admin', '6ce2fd100b183b52f35d616d669fd114', '2018-04-16 15:52:36', '2018-05-30 17:00:13');

-- ----------------------------
-- Table structure for t_driver
-- ----------------------------
DROP TABLE IF EXISTS `t_driver`;
CREATE TABLE `t_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `openid` char(28) CHARACTER SET utf8 NOT NULL COMMENT '司机编号',
  `phone` char(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '司机联系方式',
  `name` char(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '真实姓名',
  `image` text CHARACTER SET utf8 NOT NULL COMMENT '头像路径',
  `nickname` char(32) NOT NULL COMMENT '昵称',
  `plate` char(7) CHARACTER SET utf8 DEFAULT NULL COMMENT '车牌号',
  `company` char(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '隶属公司',
  `create_time` char(19) CHARACTER SET utf8 NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) CHARACTER SET utf8 DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) CHARACTER SET utf8 DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_driver
-- ----------------------------
INSERT INTO `t_driver` VALUES ('8', 'olgoZ0im0jrIE8LAEVGPh0BMDVaQ', '13889586296', '红底', 'http://thirdwx.qlogo.cn/mmopen/vi_32/sCxibq0Kw6AxTLoLhnAeB4TCoYRnls8xx3CviciaO9pOXvLYVU1bSqfWvUgZxfOaxm1NheEVNaBC1R8hsNBrl9Ajw/132', '红底', '粤AJ2666', '一匠', '2018-05-27 16:52:36', null, null, '0');
INSERT INTO `t_driver` VALUES ('12', 'olgoZ0jTexRPxOBDcpYETKyEsyKU', '13413025639', '许宇坤', 'http://thirdwx.qlogo.cn/mmopen/vi_32/asUkNM1blkHklj1tLmFXqkyFcm0trs3D6bQgfIbD8JBJHsUgpK38Bxhm0pEiaBDibwaAyTn9mpnGe4N0icRkBKBxQ/132', '十字路口', '渝C66666', '企帮互联网', '2018-05-28 23:42:12', '', null, '0');
INSERT INTO `t_driver` VALUES ('14', 'olgoZ0lMB_RGBwU8S_H1wvLrUZjQ', '13755652285', '啦啦啦啦', 'http://thirdwx.qlogo.cn/mmopen/vi_32/7A3bHcZJrPBJNoO6dnl8zatN5TcG6dMtsj4Y4vwBJS6sPWibqOfnWvoOZXTI7OHnMDOicYeNx4ENbqxbXGenFmIg/132', '长发飘飘～', '京AJ2666', '看看', '2018-05-28 23:54:39', '', null, '0');
INSERT INTO `t_driver` VALUES ('17', 'olgoZ0k5l2yjPY5R7221A2n5htDo', '13138336179', '赖俊强', 'http://thirdwx.qlogo.cn/mmopen/vi_32/yP415EddR77C4rRcianTtp4nN7H8b4w3XnBcrUlWIdryvckz1RNibVgNnljCnEZpTicycznudPFWuJhrQqIGjYlDA/132', '????????????', '台A66667', '一匠科技', '2018-05-29 20:17:00', '2018-06-09 23:23:30', null, '0');
INSERT INTO `t_driver` VALUES ('18', 'olgoZ0k5l2yjPY5R7221A2n5ht55', '13755652288', '张三', 'http://thirdwx.qlogo.cn/mmopen/vi_32/asUkNM1blkHklj1tLmFXqkyFcm0trs3D6bQgfIbD8JBJHsUgpK38Bxhm0pEiaBDibwaAyTn9mpnGe4N0icRkBKBxQ/132', '张三', '粤A00000', '惠州石油', '2018-05-30 20:17:00', null, null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=365 DEFAULT CHARSET=utf8;

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
INSERT INTO `t_log` VALUES ('201', 'admin', '暂停全部车辆排队', '2018-05-24 21:28:09', null, '0');
INSERT INTO `t_log` VALUES ('202', 'admin', '删除订单ID为：6 的订单', '2018-05-24 21:30:14', null, '0');
INSERT INTO `t_log` VALUES ('203', 'admin', '生成订单编号为：O3785 的订单', '2018-05-29 23:47:22', null, '0');
INSERT INTO `t_log` VALUES ('204', 'admin', '生成订单编号为：O4146 的订单', '2018-05-30 08:55:03', null, '0');
INSERT INTO `t_log` VALUES ('205', 'admin', '生成订单编号为：O5381 的订单', '2018-05-30 08:57:02', null, '0');
INSERT INTO `t_log` VALUES ('206', 'admin', '下移订单ID为：73 的订单', '2018-05-30 09:00:25', null, '0');
INSERT INTO `t_log` VALUES ('207', 'admin', '上移订单ID为：73 的订单', '2018-05-30 09:01:09', null, '0');
INSERT INTO `t_log` VALUES ('208', 'admin', '暂停全部车辆排队', '2018-05-30 09:01:35', null, '0');
INSERT INTO `t_log` VALUES ('209', 'admin', '暂停全部车辆排队', '2018-05-30 09:05:03', null, '0');
INSERT INTO `t_log` VALUES ('210', 'admin', '暂停全部车辆排队', '2018-05-30 09:07:21', null, '0');
INSERT INTO `t_log` VALUES ('211', 'admin', '暂停全部车辆排队', '2018-05-30 09:07:33', null, '0');
INSERT INTO `t_log` VALUES ('212', 'admin', '暂停全部车辆排队', '2018-05-30 09:09:19', null, '0');
INSERT INTO `t_log` VALUES ('213', 'admin', '暂停全部车辆排队', '2018-05-30 09:10:08', null, '0');
INSERT INTO `t_log` VALUES ('214', 'admin', '暂停全部车辆排队', '2018-05-30 09:10:18', null, '0');
INSERT INTO `t_log` VALUES ('215', 'admin', '暂停全部车辆排队', '2018-05-30 09:11:57', null, '0');
INSERT INTO `t_log` VALUES ('216', 'admin', '暂停全部车辆排队', '2018-05-30 09:17:35', null, '0');
INSERT INTO `t_log` VALUES ('217', 'admin', '暂停全部车辆排队', '2018-05-30 09:18:05', null, '0');
INSERT INTO `t_log` VALUES ('218', 'admin', '暂停全部车辆排队', '2018-05-30 09:19:06', null, '0');
INSERT INTO `t_log` VALUES ('219', 'admin', '暂停全部车辆排队', '2018-05-30 09:20:19', null, '0');
INSERT INTO `t_log` VALUES ('220', 'admin', '暂停全部车辆排队', '2018-05-30 09:21:53', null, '0');
INSERT INTO `t_log` VALUES ('221', 'admin', '暂停全部车辆排队', '2018-05-30 09:22:47', null, '0');
INSERT INTO `t_log` VALUES ('222', 'admin', '暂停全部车辆排队', '2018-05-30 09:22:52', null, '0');
INSERT INTO `t_log` VALUES ('223', 'admin', '暂停全部车辆排队', '2018-05-30 09:23:43', null, '0');
INSERT INTO `t_log` VALUES ('224', 'admin', '暂停全部车辆排队', '2018-05-30 09:24:46', null, '0');
INSERT INTO `t_log` VALUES ('225', 'admin', '暂停全部车辆排队', '2018-05-30 09:24:48', null, '0');
INSERT INTO `t_log` VALUES ('226', 'admin', '暂停全部车辆排队', '2018-05-30 09:28:03', null, '0');
INSERT INTO `t_log` VALUES ('227', 'admin', '暂停全部车辆排队', '2018-05-30 09:28:53', null, '0');
INSERT INTO `t_log` VALUES ('228', 'admin', '生成订单编号为：O7103 的订单', '2018-05-30 12:52:17', null, '0');
INSERT INTO `t_log` VALUES ('229', 'admin', '暂停全部车辆排队', '2018-05-30 12:52:50', null, '0');
INSERT INTO `t_log` VALUES ('230', 'admin', '暂停全部车辆排队', '2018-05-30 12:52:53', null, '0');
INSERT INTO `t_log` VALUES ('231', 'admin', '暂停全部车辆排队', '2018-05-30 12:53:08', null, '0');
INSERT INTO `t_log` VALUES ('232', 'admin', '暂停全部车辆排队', '2018-05-30 12:53:11', null, '0');
INSERT INTO `t_log` VALUES ('233', 'admin', '暂停全部车辆排队', '2018-05-30 12:57:47', null, '0');
INSERT INTO `t_log` VALUES ('234', 'admin', '暂停全部车辆排队', '2018-05-30 12:57:51', null, '0');
INSERT INTO `t_log` VALUES ('235', 'admin', '暂停全部车辆排队', '2018-05-30 12:59:18', null, '0');
INSERT INTO `t_log` VALUES ('236', 'admin', '暂停全部车辆排队', '2018-05-30 12:59:22', null, '0');
INSERT INTO `t_log` VALUES ('237', 'admin', '暂停全部车辆排队', '2018-05-30 13:00:50', null, '0');
INSERT INTO `t_log` VALUES ('238', 'admin', '暂停全部车辆排队', '2018-05-30 13:01:17', null, '0');
INSERT INTO `t_log` VALUES ('239', 'admin', '暂停全部车辆排队', '2018-05-30 13:06:33', null, '0');
INSERT INTO `t_log` VALUES ('240', 'admin', '暂停全部车辆排队', '2018-05-30 13:06:41', null, '0');
INSERT INTO `t_log` VALUES ('241', 'admin', '暂停全部车辆排队', '2018-05-30 13:06:55', null, '0');
INSERT INTO `t_log` VALUES ('242', 'admin', '暂停全部车辆排队', '2018-05-30 13:07:51', null, '0');
INSERT INTO `t_log` VALUES ('243', 'admin', '暂停全部车辆排队', '2018-05-30 13:07:54', null, '0');
INSERT INTO `t_log` VALUES ('244', 'admin', '暂停全部车辆排队', '2018-05-30 13:09:24', null, '0');
INSERT INTO `t_log` VALUES ('245', 'admin', '暂停全部车辆排队', '2018-05-30 13:09:27', null, '0');
INSERT INTO `t_log` VALUES ('246', 'admin', '暂停全部车辆排队', '2018-05-30 13:10:45', null, '0');
INSERT INTO `t_log` VALUES ('247', 'admin', '暂停全部车辆排队', '2018-05-30 13:10:47', null, '0');
INSERT INTO `t_log` VALUES ('248', 'admin', '暂停全部车辆排队', '2018-05-30 13:13:23', null, '0');
INSERT INTO `t_log` VALUES ('249', 'admin', '暂停全部车辆排队', '2018-05-30 13:13:25', null, '0');
INSERT INTO `t_log` VALUES ('250', 'admin', '暂停全部车辆排队', '2018-05-30 13:14:15', null, '0');
INSERT INTO `t_log` VALUES ('251', 'admin', '暂停全部车辆排队', '2018-05-30 13:14:32', null, '0');
INSERT INTO `t_log` VALUES ('252', 'admin', '暂停全部车辆排队', '2018-05-30 13:15:24', null, '0');
INSERT INTO `t_log` VALUES ('253', 'admin', '暂停全部车辆排队', '2018-05-30 13:15:45', null, '0');
INSERT INTO `t_log` VALUES ('254', 'admin', '暂停全部车辆排队', '2018-05-30 13:18:36', null, '0');
INSERT INTO `t_log` VALUES ('255', 'admin', '暂停全部车辆排队', '2018-05-30 13:18:38', null, '0');
INSERT INTO `t_log` VALUES ('256', 'admin', '暂停全部车辆排队', '2018-05-30 13:22:36', null, '0');
INSERT INTO `t_log` VALUES ('257', 'admin', '暂停全部车辆排队', '2018-05-30 13:22:53', null, '0');
INSERT INTO `t_log` VALUES ('258', 'admin', '暂停全部车辆排队', '2018-05-30 13:23:52', null, '0');
INSERT INTO `t_log` VALUES ('259', 'admin', '暂停全部车辆排队', '2018-05-30 13:24:05', null, '0');
INSERT INTO `t_log` VALUES ('260', 'admin', '暂停全部车辆排队', '2018-05-30 13:24:18', null, '0');
INSERT INTO `t_log` VALUES ('261', 'admin', '暂停全部车辆排队', '2018-05-30 13:25:52', null, '0');
INSERT INTO `t_log` VALUES ('262', 'admin', '暂停全部车辆排队', '2018-05-30 13:25:55', null, '0');
INSERT INTO `t_log` VALUES ('263', 'admin', '删除订单ID为：72 的订单', '2018-05-30 13:27:45', null, '0');
INSERT INTO `t_log` VALUES ('264', 'admin', '删除订单ID为：73 的订单', '2018-05-30 13:28:32', null, '0');
INSERT INTO `t_log` VALUES ('265', 'admin', '删除订单ID为：74 的订单', '2018-05-30 13:30:03', null, '0');
INSERT INTO `t_log` VALUES ('266', 'admin', '删除订单ID为：75 的订单', '2018-05-30 13:30:07', null, '0');
INSERT INTO `t_log` VALUES ('267', 'admin', '生成油品编号为：O8574 的油品', '2018-05-30 14:43:07', null, '0');
INSERT INTO `t_log` VALUES ('268', 'admin', '修改油品编号为：O8574 的油品', '2018-05-30 15:21:12', null, '0');
INSERT INTO `t_log` VALUES ('269', 'admin', '修改油品编号为：O8574 的油品', '2018-05-30 15:22:13', null, '0');
INSERT INTO `t_log` VALUES ('270', 'admin', '生成油品编号为：O8462 的油品', '2018-05-30 16:51:48', null, '0');
INSERT INTO `t_log` VALUES ('271', 'admin', '删除油品ID为：9 的油品', '2018-05-30 16:51:52', null, '0');
INSERT INTO `t_log` VALUES ('272', 'admin', '修改油品编号为：O8574 的油品', '2018-05-30 16:53:45', null, '0');
INSERT INTO `t_log` VALUES ('273', 'admin', '修改油品编号为：O8574 的油品', '2018-05-30 16:54:22', null, '0');
INSERT INTO `t_log` VALUES ('274', 'admin', '删除油品ID为：8 的油品', '2018-05-30 16:54:27', null, '0');
INSERT INTO `t_log` VALUES ('275', 'admin', '修改用户ID为：7 的用户', '2018-05-30 16:56:47', null, '0');
INSERT INTO `t_log` VALUES ('276', 'admin', '删除用户ID为：7 的用户', '2018-05-30 16:56:52', null, '0');
INSERT INTO `t_log` VALUES ('277', 'admin', '修改权限ID为：32 的权限', '2018-05-30 16:57:53', '2018-05-30 16:59:18', '1');
INSERT INTO `t_log` VALUES ('278', 'admin', '修改权限ID为：32 的权限', '2018-05-30 16:57:59', '2018-05-30 16:58:07', '1');
INSERT INTO `t_log` VALUES ('279', 'admin', '删除日志ID为：278 的日志', '2018-05-30 16:58:08', '2018-05-30 16:59:18', '1');
INSERT INTO `t_log` VALUES ('280', 'admin', '删除日志ID为：279,277 的日志', '2018-05-30 16:59:19', null, '0');
INSERT INTO `t_log` VALUES ('281', 'admin', '修改公告编号为：N5565 的公告', '2018-05-30 17:00:05', null, '0');
INSERT INTO `t_log` VALUES ('282', 'admin', '修改账号为：admin 的车辆', '2018-05-30 17:00:13', null, '0');
INSERT INTO `t_log` VALUES ('283', 'admin', '暂停全部车辆排队', '2018-05-30 17:00:23', null, '0');
INSERT INTO `t_log` VALUES ('284', 'admin', '暂停全部车辆排队', '2018-05-30 17:00:26', null, '0');
INSERT INTO `t_log` VALUES ('285', 'admin', '生成订单编号为：O3640 的订单', '2018-05-30 17:15:22', null, '0');
INSERT INTO `t_log` VALUES ('286', 'admin', '生成订单编号为：O7751 的订单', '2018-05-30 19:05:28', null, '0');
INSERT INTO `t_log` VALUES ('287', 'admin', '暂停全部车辆排队', '2018-05-30 19:47:08', null, '0');
INSERT INTO `t_log` VALUES ('288', 'admin', '暂停全部车辆排队', '2018-05-30 19:47:13', null, '0');
INSERT INTO `t_log` VALUES ('289', 'admin', '暂停全部车辆排队', '2018-05-30 19:47:22', null, '0');
INSERT INTO `t_log` VALUES ('290', 'admin', '暂停全部车辆排队', '2018-05-30 19:47:25', null, '0');
INSERT INTO `t_log` VALUES ('291', 'admin', '生成订单编号为：O5717 的订单', '2018-05-30 21:23:38', null, '0');
INSERT INTO `t_log` VALUES ('292', 'admin', '生成订单编号为：O2487 的订单', '2018-05-30 22:14:56', null, '0');
INSERT INTO `t_log` VALUES ('293', 'admin', '上移订单ID为：85 的订单', '2018-05-30 22:16:02', null, '0');
INSERT INTO `t_log` VALUES ('294', 'admin', '上移订单ID为：85 的订单', '2018-05-30 22:17:00', null, '0');
INSERT INTO `t_log` VALUES ('295', 'admin', '上移订单ID为：75 的订单', '2018-06-08 10:20:54', null, '0');
INSERT INTO `t_log` VALUES ('296', 'admin', '上移订单ID为：87 的订单', '2018-06-08 10:21:07', null, '0');
INSERT INTO `t_log` VALUES ('297', 'admin', '暂停全部车辆排队', '2018-06-09 21:03:44', null, '0');
INSERT INTO `t_log` VALUES ('298', 'admin', '暂停全部车辆排队', '2018-06-09 21:03:46', null, '0');
INSERT INTO `t_log` VALUES ('299', 'admin', '暂停全部车辆排队', '2018-06-09 22:21:42', null, '0');
INSERT INTO `t_log` VALUES ('300', 'admin', '暂停全部车辆排队', '2018-06-09 22:28:58', null, '0');
INSERT INTO `t_log` VALUES ('301', 'admin', '暂停全部车辆排队', '2018-06-09 22:31:09', null, '0');
INSERT INTO `t_log` VALUES ('302', 'admin', '暂停全部车辆排队', '2018-06-09 22:40:16', null, '0');
INSERT INTO `t_log` VALUES ('303', 'admin', '暂停全部车辆排队', '2018-06-09 22:40:23', null, '0');
INSERT INTO `t_log` VALUES ('304', 'admin', '暂停全部车辆排队', '2018-06-09 22:40:25', null, '0');
INSERT INTO `t_log` VALUES ('305', 'admin', '暂停全部车辆排队', '2018-06-09 22:40:32', null, '0');
INSERT INTO `t_log` VALUES ('306', 'admin', '暂停全部车辆排队', '2018-06-09 22:40:35', null, '0');
INSERT INTO `t_log` VALUES ('307', 'admin', '下移订单ID为：76 的订单', '2018-06-09 23:42:03', null, '0');
INSERT INTO `t_log` VALUES ('308', 'admin', '下移订单ID为：89 的订单', '2018-06-09 23:42:30', null, '0');
INSERT INTO `t_log` VALUES ('309', 'admin', '生成订单编号为：O9468 的订单', '2018-06-10 09:30:13', null, '0');
INSERT INTO `t_log` VALUES ('310', 'admin', '生成订单编号为：O4414 的订单', '2018-06-10 09:40:58', null, '0');
INSERT INTO `t_log` VALUES ('311', 'admin', '修改订单ID为：72 的订单', '2018-06-10 16:17:35', null, '0');
INSERT INTO `t_log` VALUES ('312', 'admin', '修改订单ID为：94 的订单', '2018-06-10 16:17:55', null, '0');
INSERT INTO `t_log` VALUES ('313', 'admin', '修改订单ID为：94 的订单', '2018-06-10 16:18:09', null, '0');
INSERT INTO `t_log` VALUES ('314', 'admin', '修改订单ID为：72 的订单', '2018-06-10 16:18:26', null, '0');
INSERT INTO `t_log` VALUES ('315', 'admin', '修改订单ID为：94 的订单', '2018-06-10 16:18:59', null, '0');
INSERT INTO `t_log` VALUES ('316', 'admin', '修改订单ID为：94 的订单', '2018-06-10 16:19:14', null, '0');
INSERT INTO `t_log` VALUES ('317', 'admin', '删除订单ID为：94 的订单', '2018-06-10 16:32:49', null, '0');
INSERT INTO `t_log` VALUES ('318', 'admin', '删除订单ID为：72 的订单', '2018-06-10 17:19:59', null, '0');
INSERT INTO `t_log` VALUES ('319', 'admin', '删除订单ID为：76 的订单', '2018-06-10 17:20:14', null, '0');
INSERT INTO `t_log` VALUES ('320', 'admin', '删除订单ID为：94 的订单', '2018-06-10 17:20:24', null, '0');
INSERT INTO `t_log` VALUES ('321', 'admin', '删除订单ID为：73 的订单', '2018-06-10 17:22:56', null, '0');
INSERT INTO `t_log` VALUES ('322', 'admin', '暂停全部车辆排队', '2018-06-11 15:42:33', null, '0');
INSERT INTO `t_log` VALUES ('323', 'admin', '暂停全部车辆排队', '2018-06-11 15:42:41', null, '0');
INSERT INTO `t_log` VALUES ('324', 'admin', '暂停全部车辆排队', '2018-06-11 15:48:39', null, '0');
INSERT INTO `t_log` VALUES ('325', 'admin', '暂停全部车辆排队', '2018-06-11 15:52:55', null, '0');
INSERT INTO `t_log` VALUES ('326', 'admin', '暂停全部车辆排队', '2018-06-11 15:54:11', null, '0');
INSERT INTO `t_log` VALUES ('327', 'admin', '暂停全部车辆排队', '2018-06-11 16:03:28', null, '0');
INSERT INTO `t_log` VALUES ('328', 'admin', '暂停全部车辆排队', '2018-06-11 16:07:34', null, '0');
INSERT INTO `t_log` VALUES ('329', 'admin', '恢复全部车辆排队', '2018-06-11 16:13:14', null, '0');
INSERT INTO `t_log` VALUES ('330', 'admin', '暂停全部车辆排队', '2018-06-11 16:13:20', null, '0');
INSERT INTO `t_log` VALUES ('331', 'admin', '恢复全部车辆排队', '2018-06-11 16:13:22', null, '0');
INSERT INTO `t_log` VALUES ('332', 'admin', '暂停全部车辆排队', '2018-06-11 16:13:25', null, '0');
INSERT INTO `t_log` VALUES ('333', 'admin', '恢复全部车辆排队', '2018-06-11 16:13:37', null, '0');
INSERT INTO `t_log` VALUES ('334', 'admin', '暂停全部车辆排队', '2018-06-11 16:39:02', null, '0');
INSERT INTO `t_log` VALUES ('335', 'admin', '恢复全部车辆排队', '2018-06-11 16:44:19', null, '0');
INSERT INTO `t_log` VALUES ('336', 'admin', '暂停全部车辆排队', '2018-06-11 16:44:30', null, '0');
INSERT INTO `t_log` VALUES ('337', 'admin', '恢复全部车辆排队', '2018-06-11 16:49:12', null, '0');
INSERT INTO `t_log` VALUES ('338', 'admin', '暂停全部车辆排队', '2018-06-11 16:51:14', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('339', 'admin', '恢复全部车辆排队', '2018-06-11 16:51:49', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('340', 'admin', '暂停全部车辆排队', '2018-06-11 16:54:14', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('341', 'admin', '恢复全部车辆排队', '2018-06-11 17:02:47', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('342', 'admin', '暂停全部车辆排队', '2018-06-11 17:03:21', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('343', 'admin', '恢复全部车辆排队', '2018-06-11 17:03:45', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('344', 'admin', '暂停全部车辆排队', '2018-06-11 17:03:53', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('345', 'admin', '恢复全部车辆排队', '2018-06-11 17:08:42', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('346', 'admin', '暂停全部车辆排队', '2018-06-11 17:16:42', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('347', 'admin', '恢复全部车辆排队', '2018-06-11 17:18:25', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('348', 'admin', '暂停全部车辆排队', '2018-06-11 17:18:33', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('349', 'admin', '恢复全部车辆排队', '2018-06-11 17:18:37', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('350', 'admin', '取消置顶公告ID为：3 的公告', '2018-06-11 17:23:35', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('351', 'admin', '生成油品编号为：O2088 的油品', '2018-06-12 14:32:47', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('352', 'admin', '修改油品编号为：O2088 的油品', '2018-06-12 14:47:22', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('353', 'admin', '删除油品ID为：10 的油品', '2018-06-12 14:48:01', '2018-06-12 14:48:20', '1');
INSERT INTO `t_log` VALUES ('354', 'admin', '删除日志ID为：353,352,351,350,349,348 的日志', '2018-06-12 14:48:20', '2018-06-12 14:48:29', '1');
INSERT INTO `t_log` VALUES ('355', 'admin', '删除日志ID为：354,347,346,345,344,343 的日志', '2018-06-12 14:48:29', '2018-06-12 14:48:34', '1');
INSERT INTO `t_log` VALUES ('356', 'admin', '删除日志ID为：355,342,341,340,339,338 的日志', '2018-06-12 14:48:35', '2018-06-12 14:48:39', '1');
INSERT INTO `t_log` VALUES ('357', 'admin', '删除日志ID为：356 的日志', '2018-06-12 14:48:40', null, '0');
INSERT INTO `t_log` VALUES ('358', 'admin', '生成角色为：司机管理员 的角色', '2018-06-12 15:41:12', null, '0');
INSERT INTO `t_log` VALUES ('359', 'admin', '修改角色ID为：33 的角色', '2018-06-12 16:28:36', null, '0');
INSERT INTO `t_log` VALUES ('360', 'admin', '修改角色ID为：33 的角色', '2018-06-12 16:28:53', null, '0');
INSERT INTO `t_log` VALUES ('361', 'admin', '删除角色ID为：33 的角色', '2018-06-12 16:29:52', null, '0');
INSERT INTO `t_log` VALUES ('362', 'admin', '生成账号为：123 的用户', '2018-06-12 16:34:38', null, '0');
INSERT INTO `t_log` VALUES ('363', 'admin', '修改用户ID为：8 的用户', '2018-06-12 16:44:32', null, '0');
INSERT INTO `t_log` VALUES ('364', 'admin', '删除用户ID为：8 的用户', '2018-06-12 16:44:57', null, '0');

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
INSERT INTO `t_notice` VALUES ('3', 'N5565', '请保存好发票！！！', '0', '2018-05-16 19:45:41', '2018-06-11 17:23:35', null, '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_oil
-- ----------------------------
INSERT INTO `t_oil` VALUES ('1', 'O0111', '二甲苯', '芳香烃', '2018-05-11 15:52:36', null, null, '0');
INSERT INTO `t_oil` VALUES ('2', 'O0002', '乙醇', '烷烃', '2018-05-13 15:52:36', '2018-05-14 19:53:39', null, '0');
INSERT INTO `t_oil` VALUES ('5', 'O6436', '丙烯', '烯烃', '2018-05-14 19:21:01', null, null, '0');
INSERT INTO `t_oil` VALUES ('6', 'O2496', '乙烯', '烯烃', '2018-05-14 19:24:40', null, '', '0');
INSERT INTO `t_oil` VALUES ('7', 'O1256', '乙炔', '炔烃', '2018-05-14 19:24:40', null, null, '0');
INSERT INTO `t_oil` VALUES ('8', 'O8574', '张老师m,', '烷烃', '2018-05-30 14:43:06', '2018-05-30 16:54:22', '2018-05-30 16:54:26', '1');
INSERT INTO `t_oil` VALUES ('9', 'O8462', 'sdrfds', '芳香烃', '2018-05-30 16:51:48', null, '2018-05-30 16:51:52', '1');
INSERT INTO `t_oil` VALUES ('10', 'O2088', '001545456', '芳香烃', '2018-06-12 14:32:47', '2018-06-12 14:47:22', '2018-06-12 14:48:00', '1');

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `number` char(20) NOT NULL COMMENT '订单编号',
  `oil_id` int(11) NOT NULL COMMENT '油品ID',
  `driver_id` int(11) NOT NULL COMMENT '司机ID',
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('72', 'O3785', '2', '12', '2', '2', '2018-05-29 23:47:21', '2018-06-10 17:22:56', null, '0');
INSERT INTO `t_order` VALUES ('73', 'O5037', '1', '14', '3', '5', '2018-05-30 08:41:25', '2018-06-10 17:22:56', null, '0');
INSERT INTO `t_order` VALUES ('75', 'O5381', '1', '8', '1', '1', '2018-05-30 08:57:02', '2018-06-10 15:49:09', null, '0');
INSERT INTO `t_order` VALUES ('76', 'O7103', '1', '18', '3', '3', '2018-05-30 12:52:16', '2018-06-10 17:22:56', null, '0');
INSERT INTO `t_order` VALUES ('90', 'O1150', '1', '17', '0', null, '2018-06-09 23:19:17', null, null, '0');
INSERT INTO `t_order` VALUES ('94', 'O4414', '1', '17', '3', '4', '2018-06-10 09:40:58', '2018-06-10 17:22:56', null, '0');

-- ----------------------------
-- Table structure for t_permission
-- ----------------------------
DROP TABLE IF EXISTS `t_permission`;
CREATE TABLE `t_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `permission` char(10) NOT NULL COMMENT '权限',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_permission
-- ----------------------------
INSERT INTO `t_permission` VALUES ('1', '排队管理', '2018-06-12 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('2', '司机管理', '2018-06-11 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('3', '油品管理', '2018-06-10 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('4', '用户管理', '2018-06-09 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('5', '角色管理', '2018-06-09 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('6', '权限管理', '2018-06-09 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('7', '日志管理', '2018-06-09 09:40:58', null, null, '0');
INSERT INTO `t_permission` VALUES ('8', '公告管理', '2018-06-09 09:40:58', null, null, '0');

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` char(20) NOT NULL COMMENT '角色名称',
  `permission` varchar(20) DEFAULT NULL COMMENT '公告管理权限',
  `create_time` char(19) NOT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES ('31', '排队管理员', '1|2|3', '2018-05-14 21:12:58', '2018-05-16 18:43:26', '', '0');
INSERT INTO `t_role` VALUES ('32', '用户管理员', '4', '2018-05-14 21:17:02', '2018-05-30 16:57:59', null, '0');
INSERT INTO `t_role` VALUES ('33', '司机管理员', '1|2|3|4|5|6|7|8', '2018-06-12 15:41:12', '2018-06-12 16:28:53', '2018-06-12 16:29:51', '1');

-- ----------------------------
-- Table structure for t_token
-- ----------------------------
DROP TABLE IF EXISTS `t_token`;
CREATE TABLE `t_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `appid` char(18) NOT NULL,
  `access_token` varchar(512) NOT NULL COMMENT '全局access_token',
  `time` char(19) NOT NULL COMMENT '存储时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of t_token
-- ----------------------------
INSERT INTO `t_token` VALUES ('1', 'wxd0fa0958e79f879c', '10_iKlJwseFlXhFDVeJB4RXUeFFQaVrYzvHyWs_7-1HDd3P3IlDS7fWfw1rZNvguuEvde2So2aETkxpCXq8WWRmkbGtFQVocIJO5qWrbbiGbwKThdn7C4kGhsaolFkHYTeAJABSN', '2018-06-11 15:59:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('6', '13669586274', 'ba8180831b8d94535ddefad359f735b2', '赖俊强', '32', '2018-05-14 21:38:30', '2018-05-14 21:44:09', '', '0');
INSERT INTO `t_user` VALUES ('7', '13669586666', 'ba8180831b8d94535ddefad359f735b2', '林乐东', '31', '2018-05-14 21:44:46', '2018-05-30 16:56:47', '', '0');
INSERT INTO `t_user` VALUES ('8', '123', '9e15a365759eb89173e3d1e65f12ed52', '景明', '31', '2018-06-12 16:34:38', '2018-06-12 16:44:32', '2018-06-12 16:44:56', '1');

-- ----------------------------
-- View structure for v_order
-- ----------------------------
DROP VIEW IF EXISTS `v_order`;
CREATE ALGORITHM=UNDEFINED DEFINER=`student1`@`%` SQL SECURITY DEFINER VIEW `v_order` AS select `t_order`.`id` AS `id`,`t_order`.`number` AS `number`,`t_order`.`oil_id` AS `oil_id`,`t_order`.`driver_id` AS `driver_id`,`t_order`.`order_status` AS `order_status`,`t_order`.`order_number` AS `order_number`,`t_order`.`create_time` AS `create_time`,`t_order`.`update_time` AS `update_time`,`t_order`.`delete_time` AS `delete_time`,`t_order`.`status` AS `status`,`t_oil`.`number` AS `oil_number`,`t_oil`.`name` AS `oil_name`,`t_oil`.`type` AS `oil_type`,`t_driver`.`openid` AS `openid`,`t_driver`.`phone` AS `phone`,`t_driver`.`name` AS `name`,`t_driver`.`image` AS `image`,`t_driver`.`nickname` AS `nickname`,`t_driver`.`plate` AS `plate`,`t_driver`.`company` AS `company` from ((`t_order` join `t_oil`) join `t_driver`) where ((`t_order`.`driver_id` = `t_driver`.`id`) and (`t_order`.`oil_id` = `t_oil`.`id`) and (`t_order`.`status` = 0) and (`t_oil`.`status` = 0) and (`t_driver`.`status` = 0)) ;
