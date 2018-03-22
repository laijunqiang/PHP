/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : db_student_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-22 12:19:05
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
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='超级管理员';

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', '张老师', '202cb962ac59075b964b07152d234b70', '2018-01-29 16:30:38', '2018-03-19 09:18:20');
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
  `time` char(16) NOT NULL COMMENT '开课时间点',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='课程';

-- ----------------------------
-- Records of t_course
-- ----------------------------
INSERT INTO `t_course` VALUES ('1', 'A001', 'python', '2', '2019-3-4', '2018-01-29 16:51:18', '2018-03-08 09:32:35', '', '0');
INSERT INTO `t_course` VALUES ('2', 'A002', 'java', '2', '2019-3-2', '2018-01-29 16:51:18', '', '', '0');
INSERT INTO `t_course` VALUES ('3', 'A003', 'c++', '2', '2019-3-1', '2018-01-29 16:51:18', '', '', '0');
INSERT INTO `t_course` VALUES ('4', 'A004', 'c', '2', '2019-3-4', '2018-01-31 17:09:40', '', '', '0');
INSERT INTO `t_course` VALUES ('6', 'A006', 'DB', '2', '2019-3-10', '2018-02-01 10:22:46', '2018-02-01 10:23:13', '', '0');
INSERT INTO `t_course` VALUES ('7', 'A007', 'PHP', '2', '2019-3-4', '2018-02-02 15:27:45', '2018-02-02 15:31:02', '', '0');
INSERT INTO `t_course` VALUES ('8', 'A008', 'java web', '3', '2018-12-05T08:08', '2018-03-18 14:56:58', '2018-03-18 16:17:44', '2018-03-18 16:21:11', '0');

-- ----------------------------
-- Table structure for t_score
-- ----------------------------
DROP TABLE IF EXISTS `t_score`;
CREATE TABLE `t_score` (
  `student_id` int(11) NOT NULL COMMENT '学生ID',
  `course_id` int(11) NOT NULL COMMENT '课程ID',
  `score` float NOT NULL COMMENT '成绩',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  PRIMARY KEY (`student_id`,`course_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `t_score_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `t_student` (`id`),
  CONSTRAINT `t_score_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `t_course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='成绩';

-- ----------------------------
-- Records of t_score
-- ----------------------------
INSERT INTO `t_score` VALUES ('1', '1', '85.5', '2018-01-29 17:04:36');
INSERT INTO `t_score` VALUES ('1', '2', '80.5', '2018-02-02 15:53:34');
INSERT INTO `t_score` VALUES ('1', '7', '70.5', '2018-03-08 21:59:30');
INSERT INTO `t_score` VALUES ('2', '1', '90.5', '2018-01-29 17:04:36');
INSERT INTO `t_score` VALUES ('3', '1', '90.5', '2018-02-01 11:15:50');
INSERT INTO `t_score` VALUES ('3', '3', '95', '2018-01-29 17:04:36');
INSERT INTO `t_score` VALUES ('8', '1', '59', '2018-02-01 11:16:30');
INSERT INTO `t_score` VALUES ('15', '1', '90.5', '2018-03-08 22:12:51');
INSERT INTO `t_score` VALUES ('16', '1', '50', '2018-03-11 16:14:14');
INSERT INTO `t_score` VALUES ('19', '1', '99.5', '2018-03-22 00:01:37');
INSERT INTO `t_score` VALUES ('19', '2', '100', '2018-03-11 16:14:49');
INSERT INTO `t_score` VALUES ('36', '1', '91.5', '2018-03-19 11:02:05');
INSERT INTO `t_score` VALUES ('36', '2', '100', '2018-03-19 11:04:10');

-- ----------------------------
-- Table structure for t_student
-- ----------------------------
DROP TABLE IF EXISTS `t_student`;
CREATE TABLE `t_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(18) NOT NULL COMMENT '学号',
  `name` char(20) NOT NULL COMMENT '姓名',
  `sex` tinyint(4) NOT NULL COMMENT '性别,0表示女,1表示男',
  `age` char(10) NOT NULL COMMENT '出生年月',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='学生';

-- ----------------------------
-- Records of t_student
-- ----------------------------
INSERT INTO `t_student` VALUES ('1', '201811995122539865', '张三', '0', '1995-01-01', '2018-01-29 16:46:47', '2018-03-07 23:57:05', '', '0');
INSERT INTO `t_student` VALUES ('2', '201811995122532423', '李四', '0', '1995-01-02', '2018-01-29 16:46:47', '', '', '0');
INSERT INTO `t_student` VALUES ('3', '201811995122532429', '王五', '0', '1995-12-25', '2018-01-29 16:46:47', '2018-01-31 15:27:42', '', '0');
INSERT INTO `t_student` VALUES ('8', '201811995122532485', '张文', '0', '1995-12-25', '2018-01-31 15:18:29', '2018-01-31 15:26:24', '', '0');
INSERT INTO `t_student` VALUES ('15', '201811995122514867', '李强', '0', '1995-12-25', '2018-02-02 23:57:33', '', '', '0');
INSERT INTO `t_student` VALUES ('16', '201811995122532894', '许卫国', '0', '1995-12-25', '2018-02-02 23:57:33', '', '', '0');
INSERT INTO `t_student` VALUES ('19', '201811995122532158', '林琪', '0', '1995-12-25', '2018-02-02 23:57:33', '', '', '0');
INSERT INTO `t_student` VALUES ('36', '201811995122532435', '赖俊强', '1', '1998-01-01', '2018-03-18 10:00:54', '2018-03-18 13:38:44', '', '0');

-- ----------------------------
-- Table structure for t_teacher
-- ----------------------------
DROP TABLE IF EXISTS `t_teacher`;
CREATE TABLE `t_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `number` char(20) NOT NULL COMMENT '任课老师编号',
  `password` char(32) NOT NULL COMMENT '任课老师密码',
  `name` char(20) NOT NULL COMMENT '任课老师名字',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '删除记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='任课老师';

-- ----------------------------
-- Records of t_teacher
-- ----------------------------
INSERT INTO `t_teacher` VALUES ('1', '001', '81dc9bdb52d04dc20036dbd8313ed055', '曾志', '2018-03-07 19:14:11', '2018-03-19 09:26:24', '', '0');
INSERT INTO `t_teacher` VALUES ('2', '002', '81dc9bdb52d04dc20036dbd8313ed055', '刘雨', '2018-03-07 19:14:34', '2018-03-07 23:26:54', '', '0');
INSERT INTO `t_teacher` VALUES ('3', '003', '81dc9bdb52d04dc20036dbd8313ed055', '王华', '2018-03-07 20:06:20', '', '', '0');
INSERT INTO `t_teacher` VALUES ('4', '004', '81dc9bdb52d04dc20036dbd8313ed055', '杨雄', '2018-03-18 22:08:09', '2018-03-18 22:29:50', '', '0');

-- ----------------------------
-- Table structure for t_teacher_course
-- ----------------------------
DROP TABLE IF EXISTS `t_teacher_course`;
CREATE TABLE `t_teacher_course` (
  `teacher_id` int(11) NOT NULL COMMENT '任课老师ID',
  `course_id` int(11) NOT NULL COMMENT '课程ID',
  `create_time` char(19) DEFAULT NULL COMMENT '创建记录时间',
  `update_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `delete_time` char(19) DEFAULT NULL COMMENT '修改记录时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态，0表示未删除，1表示已删除',
  PRIMARY KEY (`teacher_id`,`course_id`),
  UNIQUE KEY `course_id` (`course_id`) USING BTREE,
  CONSTRAINT `t_teacher_course_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `t_teacher` (`id`),
  CONSTRAINT `t_teacher_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `t_course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='任课老师与课程';

-- ----------------------------
-- Records of t_teacher_course
-- ----------------------------
INSERT INTO `t_teacher_course` VALUES ('1', '1', '2018-03-16 22:10:19', '', '', '0');
INSERT INTO `t_teacher_course` VALUES ('1', '2', '2018-03-16 22:10:32', '', '', '0');
INSERT INTO `t_teacher_course` VALUES ('2', '7', '2018-03-16 22:10:32', '', '', '0');
INSERT INTO `t_teacher_course` VALUES ('4', '8', '2018-03-20 00:02:51', null, null, '0');

-- ----------------------------
-- View structure for v_remaining_course
-- ----------------------------
DROP VIEW IF EXISTS `v_remaining_course`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_remaining_course` AS select `t_course`.`id` AS `id`,`t_course`.`number` AS `number`,`t_course`.`name` AS `name`,`t_course`.`credit` AS `credit`,`t_course`.`time` AS `time`,`t_course`.`create_time` AS `create_time`,`t_course`.`update_time` AS `update_time` from `t_course` where ((`t_course`.`status` = 0) and (not(`t_course`.`id` in (select `t_teacher_course`.`course_id` from `t_teacher_course`)))) ;

-- ----------------------------
-- View structure for v_score
-- ----------------------------
DROP VIEW IF EXISTS `v_score`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_score` AS select `t_student`.`number` AS `number`,`t_student`.`name` AS `name`,`t_course`.`name` AS `course`,`t_score`.`score` AS `score` from ((`t_student` join `t_course`) join `t_score`) where ((`t_student`.`id` = `t_score`.`student_id`) and (`t_course`.`id` = `t_score`.`course_id`)) ;

-- ----------------------------
-- View structure for v_score_second
-- ----------------------------
DROP VIEW IF EXISTS `v_score_second`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_score_second` AS select `t_student`.`number` AS `学号`,`t_student`.`name` AS `姓名`,`t_course`.`number` AS `课程号`,`t_course`.`name` AS `课程名`,`t_score`.`score` AS `成绩`,`t_score`.`create_time` AS `create_time` from ((`t_course` join `t_score`) join `t_student`) where ((`t_course`.`id` = `t_score`.`course_id`) and (`t_student`.`id` = `t_score`.`student_id`) and (`t_course`.`status` = 0) and (`t_student`.`status` = 0)) order by `t_score`.`create_time` desc ;

-- ----------------------------
-- View structure for v_student
-- ----------------------------
DROP VIEW IF EXISTS `v_student`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_student` AS select `t_student`.`id` AS `学生ID`,`t_student`.`number` AS `学号`,`t_student`.`name` AS `姓名`,`t_student`.`sex` AS `性别`,`t_student`.`age` AS `年龄`,`t_course`.`name` AS `课程` from ((`t_student` join `t_course`) join `t_score`) where ((`t_student`.`id` = `t_score`.`student_id`) and (`t_course`.`id` = `t_score`.`course_id`) and (`t_student`.`status` = 0) and (`t_course`.`status` = 0)) order by `t_student`.`id` ;

-- ----------------------------
-- View structure for v_teacher_course
-- ----------------------------
DROP VIEW IF EXISTS `v_teacher_course`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_teacher_course` AS select `t_course`.`id` AS `课程ID`,`t_course`.`number` AS `课程号`,`t_course`.`name` AS `课程名`,`t_course`.`credit` AS `学分`,`t_course`.`time` AS `开课时间`,`t_teacher`.`number` AS `任课老师账号`,`t_teacher`.`name` AS `任课老师` from ((`t_course` join `t_teacher`) join `t_teacher_course`) where ((`t_teacher`.`id` = `t_teacher_course`.`teacher_id`) and (`t_course`.`id` = `t_teacher_course`.`course_id`) and (`t_teacher`.`status` = 0) and (`t_course`.`status` = 0)) ;
