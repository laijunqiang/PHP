/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_student_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-30 08:38:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` char(20) NOT NULL COMMENT '超级管理员账号',
  `password` char(30) NOT NULL COMMENT '超级管理员密码',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='超级管理员';

-- ----------------------------
-- Table structure for t_course
-- ----------------------------
DROP TABLE IF EXISTS `t_course`;
CREATE TABLE `t_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(20) NOT NULL COMMENT '课程号',
  `name` char(20) NOT NULL COMMENT '课程名',
  `credit` tinyint(4) NOT NULL COMMENT '学分',
  `time` char(20) NOT NULL COMMENT '开课时间点',
  `create_time` char(20) NOT NULL DEFAULT '0' COMMENT '创建记录时间',
  `update_time` char(20) NOT NULL DEFAULT '0' COMMENT '修改记录时间',
  `delete_time` char(20) NOT NULL DEFAULT '0' COMMENT '删除记录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='课程';

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='学生';
