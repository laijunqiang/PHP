/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_student_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-16 20:41:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` char(20) NOT NULL COMMENT '超级管理员账号',
  `password` char(32) NOT NULL COMMENT '超级管理员密码',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='超级管理员';

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', '张老师', '202cb962ac59075b964b07152d234b70', '2018-01-29 16:30:38', '2018-03-08 19:50:44');
INSERT INTO `t_admin` VALUES ('2', '李老师', 'c20ad4d76fe97759aa27a0c99bff6710', '2018-01-29 16:30:38', '2018-03-07 18:26:37');
INSERT INTO `t_admin` VALUES ('3', '林老师', '81dc9bdb52d04dc20036dbd8313ed055', '2018-01-29 16:30:38', '2018-03-07 18:22:57');

-- ----------------------------
-- Table structure for t_course
-- ----------------------------
DROP TABLE IF EXISTS `t_course`;
CREATE TABLE `t_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(20) NOT NULL COMMENT '课程号',
  `name` char(20) NOT NULL COMMENT '课程名',
  `credit` float(4,0) NOT NULL COMMENT '学分',
  `time` char(20) NOT NULL COMMENT '开课时间点',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='课程';

-- ----------------------------
-- Records of t_course
-- ----------------------------
INSERT INTO `t_course` VALUES ('1', 'A001', 'python', '2', '2019-3-4', '2018-01-29 16:51:18', '2018-03-08 09:32:35', '0');
INSERT INTO `t_course` VALUES ('2', 'A002', 'java', '2', '2019-3-2', '2018-01-29 16:51:18', '0', '0');
INSERT INTO `t_course` VALUES ('3', 'A003', 'c++', '2', '2019-3-1', '2018-01-29 16:51:18', '0', '0');
INSERT INTO `t_course` VALUES ('4', 'A004', 'c', '2', '2019-3-4', '2018-01-31 17:09:40', '0', '2018-02-02 15:33:20');
INSERT INTO `t_course` VALUES ('5', 'A005', 'PHP', '2', '2019-3-10', '2018-01-31 18:29:12', '2018-01-31 18:31:19', '2018-01-31 18:36:49');
INSERT INTO `t_course` VALUES ('6', 'A009', 'DB', '2', '2019-3-10', '2018-02-01 10:22:46', '2018-02-01 10:23:13', '2018-02-01 10:23:21');
INSERT INTO `t_course` VALUES ('7', 'A005', 'PHP', '2', '2019-3-4', '2018-02-02 15:27:45', '2018-02-02 15:31:02', '0');

-- ----------------------------
-- Table structure for t_score
-- ----------------------------
DROP TABLE IF EXISTS `t_score`;
CREATE TABLE `t_score` (
  `student_id` int(11) NOT NULL COMMENT '学生ID',
  `course_id` int(11) NOT NULL COMMENT '课程ID',
  `score` float NOT NULL COMMENT '成绩',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `t_score_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `t_student` (`id`),
  CONSTRAINT `t_score_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `t_course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='成绩';

-- ----------------------------
-- Records of t_score
-- ----------------------------
INSERT INTO `t_score` VALUES ('1', '1', '85.5', '2018-01-29 17:04:36', '0', '0');
INSERT INTO `t_score` VALUES ('1', '2', '80.5', '2018-02-02 15:53:34', '0', '0');
INSERT INTO `t_score` VALUES ('1', '7', '70.5', '2018-03-08 21:59:30', '0', '0');
INSERT INTO `t_score` VALUES ('2', '1', '90.5', '2018-01-29 17:04:36', '0', '0');
INSERT INTO `t_score` VALUES ('3', '1', '90.5', '2018-02-01 11:15:50', '0', '0');
INSERT INTO `t_score` VALUES ('3', '3', '95', '2018-01-29 17:04:36', '0', '0');
INSERT INTO `t_score` VALUES ('8', '1', '59', '2018-02-01 11:16:30', '0', '0');
INSERT INTO `t_score` VALUES ('15', '1', '90.5', '2018-03-08 22:12:51', '0', '0');
INSERT INTO `t_score` VALUES ('16', '1', '50', '2018-03-11 16:14:14', '0', '0');
INSERT INTO `t_score` VALUES ('19', '2', '100', '2018-03-11 16:14:49', '0', '0');

-- ----------------------------
-- Table structure for t_student
-- ----------------------------
DROP TABLE IF EXISTS `t_student`;
CREATE TABLE `t_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(20) NOT NULL COMMENT '学号',
  `name` char(20) NOT NULL COMMENT '姓名',
  `sex` tinyint(4) NOT NULL COMMENT '性别,0表示女,1表示男',
  `age` char(10) NOT NULL COMMENT '出生年月',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COMMENT='学生';

-- ----------------------------
-- Records of t_student
-- ----------------------------
INSERT INTO `t_student` VALUES ('1', '1514080901201', '张三', '0', '1995-01-01', '2018-01-29 16:46:47', '2018-03-07 23:57:05', '0');
INSERT INTO `t_student` VALUES ('2', '1514080901202', '李四', '0', '1995-01-02', '2018-01-29 16:46:47', '0', '0');
INSERT INTO `t_student` VALUES ('3', '1514080901216', '纠结1', '0', '1995-12-30', '2018-01-29 16:46:47', '2018-01-31 15:27:42', '0');
INSERT INTO `t_student` VALUES ('8', '1514080901218', '纠结2', '0', '1995-12-30', '2018-01-31 15:18:29', '2018-01-31 15:26:24', '0');
INSERT INTO `t_student` VALUES ('9', '1514080901219', '纠结3', '1', '1995-12-30', '2018-01-31 15:24:24', '0', '0');
INSERT INTO `t_student` VALUES ('10', '1514080901220', '纠结4', '1', '1995-12-30', '2018-01-31 15:25:12', '0', '2018-02-01 14:36:55');
INSERT INTO `t_student` VALUES ('11', '1514080901221', '纠结5', '1', '1995-12-30', '2018-02-02 14:37:57', '0', '0');
INSERT INTO `t_student` VALUES ('12', '1514080901222', '纠结6', '1', '1995-12-30', '2018-02-02 14:40:27', '2018-02-02 14:47:44', '2018-02-02 14:50:41');
INSERT INTO `t_student` VALUES ('13', '1514080901223', '纠结7', '0', '1995-12-30', '2018-02-02 14:42:03', '0', '2018-02-02 14:50:37');
INSERT INTO `t_student` VALUES ('14', '1514080901224', '纠结8', '0', '1995-12-30', '2018-02-02 14:43:36', '0', '2018-02-02 14:50:44');
INSERT INTO `t_student` VALUES ('15', '1514080901224', '纠结8', '0', '35063', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('16', '1514080901225', '纠结9', '0', '35064', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('17', '1514080901226', '纠结10', '0', '35065', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('18', '1514080901227', '纠结11', '0', '35066', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('19', '1514080901228', '纠结12', '0', '35067', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('20', '1514080901229', '纠结13', '0', '35068', '2018-02-02 23:57:33', '0', '2018-03-07 19:09:19');
INSERT INTO `t_student` VALUES ('21', '1514080901230', '纠结14', '1', '35069', '2018-02-02 23:57:33', '0', '2018-03-07 19:09:22');
INSERT INTO `t_student` VALUES ('22', '1514080901231', '纠结15', '0', '35070', '2018-02-02 23:57:33', '0', '0');
INSERT INTO `t_student` VALUES ('23', '1514080901232', '纠结16', '0', '35071', '2018-02-02 23:57:33', '0', '2018-03-07 19:09:45');
INSERT INTO `t_student` VALUES ('24', '1514080901233', '纠结17', '0', '35072', '2018-02-02 23:57:33', '0', '2018-03-07 19:09:42');
INSERT INTO `t_student` VALUES ('25', '1514080901234', '纠结18', '0', '35073', '2018-02-02 23:57:33', '0', '2018-03-07 19:09:38');
INSERT INTO `t_student` VALUES ('26', '1514080901235', '纠结19', '0', '35074', '2018-02-02 23:57:34', '0', '0');
INSERT INTO `t_student` VALUES ('27', '1514080901236', '纠结20', '0', '35075', '2018-02-02 23:57:34', '0', '2018-03-07 19:09:34');
INSERT INTO `t_student` VALUES ('28', '1514080901224', '纠结8', '0', '35063', '2018-02-02 23:58:56', '0', '0');
INSERT INTO `t_student` VALUES ('29', '1514080901225', '纠结9', '0', '35064', '2018-02-02 23:58:56', '0', '0');
INSERT INTO `t_student` VALUES ('30', '1514080901226', '纠结10', '0', '35065', '2018-02-02 23:58:56', '0', '0');
INSERT INTO `t_student` VALUES ('31', '1514080901227', '纠结11', '0', '35066', '2018-02-02 23:58:56', '0', '0');
INSERT INTO `t_student` VALUES ('32', '1514080901228', '纠结12', '0', '35067', '2018-02-02 23:58:56', '0', '0');
INSERT INTO `t_student` VALUES ('33', '1514080901229', '纠结13', '0', '35068', '2018-02-02 23:58:57', '0', '0');
INSERT INTO `t_student` VALUES ('34', '1514080901230', '纠结14', '1', '35069', '2018-02-02 23:58:57', '0', '0');
INSERT INTO `t_student` VALUES ('35', '1514080901231', '纠结15', '0', '35070', '2018-02-02 23:58:57', '0', '2018-03-07 20:41:10');
INSERT INTO `t_student` VALUES ('36', '1514080901232', '纠结16', '0', '35071', '2018-02-02 23:58:57', '0', '2018-02-02 23:59:18');
INSERT INTO `t_student` VALUES ('37', '1514080901233', '纠结17', '0', '35072', '2018-02-02 23:58:57', '0', '2018-02-02 23:59:22');
INSERT INTO `t_student` VALUES ('38', '1514080901234', '纠结18', '0', '35073', '2018-02-02 23:58:57', '0', '2018-02-02 23:59:11');
INSERT INTO `t_student` VALUES ('39', '1514080901235', '纠结19', '0', '35074', '2018-02-02 23:58:57', '0', '2018-02-02 23:59:14');
INSERT INTO `t_student` VALUES ('40', '1514080901236', '纠结20', '0', '35075', '2018-02-02 23:58:57', '0', '2018-02-02 23:59:06');

-- ----------------------------
-- Table structure for t_teacher
-- ----------------------------
DROP TABLE IF EXISTS `t_teacher`;
CREATE TABLE `t_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(20) NOT NULL COMMENT '任课老师编号',
  `password` char(32) NOT NULL COMMENT '任课老师密码',
  `name` char(20) NOT NULL COMMENT '任课老师名字',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='任课老师';

-- ----------------------------
-- Records of t_teacher
-- ----------------------------
INSERT INTO `t_teacher` VALUES ('1', 'A001', '81dc9bdb52d04dc20036dbd8313ed055', '纠结', '2018-03-07 19:14:11', '2018-03-08 19:51:12', '0');
INSERT INTO `t_teacher` VALUES ('2', 'A002', '81dc9bdb52d04dc20036dbd8313ed055', '纠结2', '2018-03-07 19:14:34', '2018-03-07 23:26:54', '2018-03-07 23:30:23');
INSERT INTO `t_teacher` VALUES ('3', 'A003', '81dc9bdb52d04dc20036dbd8313ed055', '纠结3', '2018-03-07 20:06:20', '0', '0');

-- ----------------------------
-- Table structure for t_teacher_course
-- ----------------------------
DROP TABLE IF EXISTS `t_teacher_course`;
CREATE TABLE `t_teacher_course` (
  `teacher_id` int(11) NOT NULL COMMENT '任课老师ID',
  `course_id` int(11) NOT NULL COMMENT '课程ID',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`teacher_id`,`course_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `t_teacher_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `t_course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任课老师与课程';

-- ----------------------------
-- Records of t_teacher_course
-- ----------------------------
INSERT INTO `t_teacher_course` VALUES ('1', '1', '2018-03-07 19:18:23', '0', '0');
INSERT INTO `t_teacher_course` VALUES ('1', '2', '2018-03-08 19:24:11', '0', '0');
INSERT INTO `t_teacher_course` VALUES ('2', '2', '2018-03-07 19:18:23', '0', '0');
