/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : lottery

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-08-06 10:41:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('25', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '38', '2014-07-31 13:53:34');
INSERT INTO `login` VALUES ('22', '258143345@qq.com', 'c4ca4238a0b923820dcc509a6f75849b', 'email', '35', '2014-07-24 18:23:51');
INSERT INTO `login` VALUES ('23', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '36', '2014-07-31 13:53:30');
INSERT INTO `login` VALUES ('24', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '37', '2014-07-31 13:53:32');
INSERT INTO `login` VALUES ('26', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '39', '2014-07-31 13:53:34');
INSERT INTO `login` VALUES ('27', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '40', '2014-07-31 13:53:34');
INSERT INTO `login` VALUES ('28', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '41', '2014-07-31 13:53:34');
INSERT INTO `login` VALUES ('29', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '42', '2014-07-31 13:53:35');
INSERT INTO `login` VALUES ('30', 'aaaaa@qq.com', '594f803b380a41396ed63dca39503542', 'email', '43', '2014-07-31 13:53:35');
INSERT INTO `login` VALUES ('35', 'marcus@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'email', '48', '2014-08-04 09:53:23');

-- ----------------------------
-- Table structure for `lottery_issue`
-- ----------------------------
DROP TABLE IF EXISTS `lottery_issue`;
CREATE TABLE `lottery_issue` (
  `id_lottery_issue` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `issue_result` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id_lottery_issue`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lottery_issue
-- ----------------------------
INSERT INTO `lottery_issue` VALUES ('3', '999999');
INSERT INTO `lottery_issue` VALUES ('4', 'pending');

-- ----------------------------
-- Table structure for `prize`
-- ----------------------------
DROP TABLE IF EXISTS `prize`;
CREATE TABLE `prize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `photo_url` varchar(500) DEFAULT NULL COMMENT '大图',
  `photo_url_s` varchar(500) DEFAULT NULL COMMENT '小图',
  `description` varchar(2000) DEFAULT NULL,
  `num` int(11) DEFAULT NULL COMMENT '总共需抽奖次数',
  `num_now` int(11) DEFAULT '0' COMMENT '目前抽奖次数',
  `category` int(2) DEFAULT NULL COMMENT '1:大奖 2小奖',
  `add_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1：正常 2：待开奖3：已开奖',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prize
-- ----------------------------
INSERT INTO `prize` VALUES ('1', '苹果（Apple）iPad', '/images/st1.jpg', '/images/st1.jpg', '苹果（Apple）iPad  10万次抽奖送出', '100000', '48', '1', null, '1', '1');
INSERT INTO `prize` VALUES ('2', '无线蓝牙音箱', '/images/st2.jpg', '/images/st2.jpg', '无线蓝牙音箱     1万次抽奖送出', '10000', '4', '1', null, '1', '2');
INSERT INTO `prize` VALUES ('3', '平板电脑床上床', '/images/st3.jpg', '/images/st3.jpg', '平板电脑床上床', '100000', '9', '2', null, '1', '3');
INSERT INTO `prize` VALUES ('4', '罗技（Logitech）', '/images/st4.jpg', '/images/st4.jpg', '罗技（Logitech）', '100000', '2', '2', null, '1', '4');
INSERT INTO `prize` VALUES ('5', 'SkinAT iPad air保护套', '/images/xt1.jpg', '/images/xt1.jpg', 'SkinAT iPad air保护套', '1000', '0', '2', null, '1', '5');
INSERT INTO `prize` VALUES ('6', '宝枫（POFOKO）', '/images/xt2.jpg', '/images/xt2.jpg', '宝枫（POFOKO）', '10', '10', '2', null, '2', '6');
INSERT INTO `prize` VALUES ('7', '韩国特兰恩', '/images/xt3.jpg', '/images/xt3.jpg', '韩国特兰恩', '5', '5', '2', null, '2', '7');
INSERT INTO `prize` VALUES ('8', 'CASMELY', 'http://img10.360buyimg.com/n0/g15/M06/01/04/rBEhWVLMvb4IAAAAAACfED0O6SEAAHrpwGoKWIAAJ8o100.jpg', 'http://img13.360buyimg.com/n7/g15/M06/01/04/rBEhWVLMvb4IAAAAAACfED0O6SEAAHrpwGoKWIAAJ8o100.jpg', 'CASMELY', '5', '0', '2', null, '1', '8');
INSERT INTO `prize` VALUES ('9', '实捷C27三USB接口 ', 'http://img10.360buyimg.com/n0/g15/M09/1D/04/rBEhWFKw_G0IAAAAAAEYChTAFLgAAG5kgJFqIoAARgi688.jpg', 'http://img12.360buyimg.com/n7/g15/M09/1D/04/rBEhWFKw_G0IAAAAAAEYChTAFLgAAG5kgJFqIoAARgi688.jpg', '实捷C27三USB接口 ', '6', '0', '2', null, '1', '9');
INSERT INTO `prize` VALUES ('10', '毕亚兹（BIAZE）', 'http://img10.360buyimg.com/n0/g13/M02/00/03/rBEhU1MyZm0IAAAAAADCN-qVZJIAAKvHQLyq7cAAMJP276.jpg', 'http://img14.360buyimg.com/n7/g13/M02/00/03/rBEhU1MyZm0IAAAAAADCN-qVZJIAAKvHQLyq7cAAMJP276.jpg', '毕亚兹（BIAZE）', '8', '0', '2', null, '1', '10');

-- ----------------------------
-- Table structure for `prizenolog`
-- ----------------------------
DROP TABLE IF EXISTS `prizenolog`;
CREATE TABLE `prizenolog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '抽奖人',
  `prizecode` int(11) DEFAULT NULL COMMENT '奖品',
  `prizeno` int(11) DEFAULT NULL COMMENT '抽奖号',
  `id_lottery_issue` int(11) DEFAULT '0',
  `add_time` datetime DEFAULT NULL COMMENT '日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prizenolog
-- ----------------------------
INSERT INTO `prizenolog` VALUES ('56', '48', '7', '999999', '3', '2014-07-05 12:57:26');
INSERT INTO `prizenolog` VALUES ('57', '48', '7', '2', '3', '2014-07-05 12:57:34');
INSERT INTO `prizenolog` VALUES ('58', '48', '6', '3', '3', '2014-07-05 12:57:42');
INSERT INTO `prizenolog` VALUES ('59', '48', '4', '4', '4', '2014-07-05 13:12:36');
INSERT INTO `prizenolog` VALUES ('60', '48', '4', '5', '4', '2014-07-05 13:12:44');
INSERT INTO `prizenolog` VALUES ('61', '48', '4', '1', '4', '2014-07-05 13:56:23');
INSERT INTO `prizenolog` VALUES ('62', '48', '4', '2', '4', '2014-07-05 13:56:46');
INSERT INTO `prizenolog` VALUES ('63', '25', '4', '3', '4', '2014-07-05 15:55:42');
INSERT INTO `prizenolog` VALUES ('64', '25', '3', '1', '4', '2014-07-07 09:29:42');
INSERT INTO `prizenolog` VALUES ('65', '25', '3', '2', '4', '2014-07-07 09:29:52');
INSERT INTO `prizenolog` VALUES ('66', '25', '3', '3', '4', '2014-07-10 11:57:59');
INSERT INTO `prizenolog` VALUES ('67', '25', '3', '4', '4', '2014-07-10 11:57:59');
INSERT INTO `prizenolog` VALUES ('68', '25', '3', '5', '4', '2014-07-10 12:15:33');
INSERT INTO `prizenolog` VALUES ('69', '25', '3', '6', '4', '2014-07-10 12:17:18');
INSERT INTO `prizenolog` VALUES ('70', '25', '3', '7', '4', '2014-07-10 12:19:22');
INSERT INTO `prizenolog` VALUES ('71', '25', '3', '8', '4', '2014-07-10 12:21:35');
INSERT INTO `prizenolog` VALUES ('72', '35', '1', '1', '4', '2014-07-24 18:31:21');
INSERT INTO `prizenolog` VALUES ('73', '35', '2', '1', '4', '2014-07-24 18:32:55');
INSERT INTO `prizenolog` VALUES ('74', '35', '3', '9', '4', '2014-07-24 18:34:04');
INSERT INTO `prizenolog` VALUES ('75', '35', '1', '2', '4', '2014-07-24 18:34:19');
INSERT INTO `prizenolog` VALUES ('76', '35', '1', '3', '4', '2014-07-24 18:35:46');
INSERT INTO `prizenolog` VALUES ('77', '35', '1', '4', '4', '2014-07-24 18:36:41');
INSERT INTO `prizenolog` VALUES ('78', '35', '1', '5', '4', '2014-07-24 18:38:58');
INSERT INTO `prizenolog` VALUES ('79', '35', '1', '6', '4', '2014-07-24 18:43:07');
INSERT INTO `prizenolog` VALUES ('80', '35', '1', '7', '4', '2014-07-24 18:44:53');
INSERT INTO `prizenolog` VALUES ('81', '35', '1', '8', '4', '2014-07-24 18:45:43');
INSERT INTO `prizenolog` VALUES ('82', '35', '1', '9', '4', '2014-07-24 18:46:44');
INSERT INTO `prizenolog` VALUES ('83', '35', '6', '2', '4', '2014-07-24 18:47:39');
INSERT INTO `prizenolog` VALUES ('84', '35', '1', '10', '4', '2014-07-24 18:48:45');
INSERT INTO `prizenolog` VALUES ('85', '35', '1', '11', '4', '2014-07-24 18:49:11');
INSERT INTO `prizenolog` VALUES ('86', '35', '1', '12', '4', '2014-07-24 18:49:37');
INSERT INTO `prizenolog` VALUES ('87', '35', '1', '13', '4', '2014-07-24 18:50:14');
INSERT INTO `prizenolog` VALUES ('88', '35', '1', '14', '4', '2014-07-24 18:50:38');
INSERT INTO `prizenolog` VALUES ('89', '35', '1', '15', '4', '2014-07-24 18:51:02');
INSERT INTO `prizenolog` VALUES ('90', '35', '1', '16', '4', '2014-07-24 18:51:15');
INSERT INTO `prizenolog` VALUES ('91', '35', '1', '17', '4', '2014-07-24 18:51:33');
INSERT INTO `prizenolog` VALUES ('92', '35', '1', '18', '4', '2014-07-24 18:52:04');
INSERT INTO `prizenolog` VALUES ('93', '35', '1', '19', '4', '2014-07-24 18:52:29');
INSERT INTO `prizenolog` VALUES ('94', '35', '1', '20', '4', '2014-07-24 18:52:52');
INSERT INTO `prizenolog` VALUES ('95', '35', '1', '21', '4', '2014-07-24 18:53:00');
INSERT INTO `prizenolog` VALUES ('96', '35', '1', '22', '4', '2014-07-24 18:53:44');
INSERT INTO `prizenolog` VALUES ('97', '35', '1', '23', '4', '2014-07-24 18:53:52');
INSERT INTO `prizenolog` VALUES ('98', '35', '1', '24', '4', '2014-07-24 18:53:57');
INSERT INTO `prizenolog` VALUES ('99', '35', '1', '25', '4', '2014-07-24 18:55:42');
INSERT INTO `prizenolog` VALUES ('100', '35', '1', '26', '4', '2014-07-24 18:55:51');
INSERT INTO `prizenolog` VALUES ('101', '35', '1', '27', '4', '2014-07-24 18:56:07');
INSERT INTO `prizenolog` VALUES ('102', '35', '6', '3', '4', '2014-07-24 18:56:27');
INSERT INTO `prizenolog` VALUES ('103', '35', '1', '28', '4', '2014-07-24 18:57:16');
INSERT INTO `prizenolog` VALUES ('104', '35', '6', '4', '4', '2014-07-24 18:57:41');
INSERT INTO `prizenolog` VALUES ('105', '35', '1', '29', '4', '2014-07-24 18:58:11');
INSERT INTO `prizenolog` VALUES ('106', '35', '1', '30', '4', '2014-07-24 18:58:30');
INSERT INTO `prizenolog` VALUES ('107', '35', '1', '31', '4', '2014-07-24 18:59:00');
INSERT INTO `prizenolog` VALUES ('108', '35', '1', '32', '4', '2014-07-24 19:01:21');
INSERT INTO `prizenolog` VALUES ('109', '35', '1', '33', '4', '2014-07-24 19:02:00');
INSERT INTO `prizenolog` VALUES ('110', '35', '1', '34', '4', '2014-07-24 19:02:31');
INSERT INTO `prizenolog` VALUES ('111', '35', '1', '35', '4', '2014-07-24 19:03:26');
INSERT INTO `prizenolog` VALUES ('112', '35', '2', '2', '4', '2014-07-24 19:05:06');
INSERT INTO `prizenolog` VALUES ('113', '35', '2', '3', '4', '2014-07-24 19:05:21');
INSERT INTO `prizenolog` VALUES ('114', '35', '6', '5', '4', '2014-07-24 19:05:56');
INSERT INTO `prizenolog` VALUES ('115', '35', '1', '36', '4', '2014-07-25 09:27:58');
INSERT INTO `prizenolog` VALUES ('116', '35', '1', '37', '4', '2014-07-25 09:28:07');
INSERT INTO `prizenolog` VALUES ('117', '35', '1', '38', '4', '2014-07-25 09:29:24');
INSERT INTO `prizenolog` VALUES ('118', '35', '6', '6', '4', '2014-07-25 09:31:20');
INSERT INTO `prizenolog` VALUES ('119', '35', '6', '7', '4', '2014-07-25 09:31:22');
INSERT INTO `prizenolog` VALUES ('120', '35', '6', '8', '4', '2014-07-25 09:31:24');
INSERT INTO `prizenolog` VALUES ('121', '35', '6', '9', '4', '2014-07-25 09:31:25');
INSERT INTO `prizenolog` VALUES ('122', '35', '6', '10', '4', '2014-07-25 09:31:26');
INSERT INTO `prizenolog` VALUES ('123', '35', '1', '39', '4', '2014-07-31 17:25:59');
INSERT INTO `prizenolog` VALUES ('124', '35', '1', '40', '4', '2014-07-31 17:26:20');
INSERT INTO `prizenolog` VALUES ('125', '35', '1', '41', '4', '2014-07-31 17:26:41');
INSERT INTO `prizenolog` VALUES ('126', '35', '1', '42', '4', '2014-07-31 17:27:02');
INSERT INTO `prizenolog` VALUES ('127', '35', '1', '43', '4', '2014-07-31 17:33:42');
INSERT INTO `prizenolog` VALUES ('128', '35', '1', '44', '4', '2014-07-31 17:34:03');
INSERT INTO `prizenolog` VALUES ('129', '35', '1', '45', '4', '2014-07-31 17:34:16');
INSERT INTO `prizenolog` VALUES ('130', '35', '1', '46', '4', '2014-07-31 17:42:50');
INSERT INTO `prizenolog` VALUES ('131', '35', '1', '47', '4', '2014-07-31 17:42:51');
INSERT INTO `prizenolog` VALUES ('132', '35', '1', '48', '4', '2014-07-31 17:43:01');
INSERT INTO `prizenolog` VALUES ('133', '48', '2', '4', '4', '2014-08-05 10:52:51');

-- ----------------------------
-- Table structure for `site`
-- ----------------------------
DROP TABLE IF EXISTS `site`;
CREATE TABLE `site` (
  `id_site` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_site`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site
-- ----------------------------

-- ----------------------------
-- Table structure for `thirdpart_his`
-- ----------------------------
DROP TABLE IF EXISTS `thirdpart_his`;
CREATE TABLE `thirdpart_his` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `position` int(200) DEFAULT NULL,
  `sort` int(20) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=232 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thirdpart_his
-- ----------------------------

-- ----------------------------
-- Table structure for `thirdpart_new`
-- ----------------------------
DROP TABLE IF EXISTS `thirdpart_new`;
CREATE TABLE `thirdpart_new` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `position` int(200) DEFAULT NULL,
  `sort` int(20) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thirdpart_new
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nick_name` varchar(100) DEFAULT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `avatar_url` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `qq` varchar(200) DEFAULT NULL,
  `minority` varchar(200) DEFAULT NULL,
  `detail` varchar(2000) DEFAULT NULL,
  `credentials_type` varchar(100) DEFAULT NULL,
  `credentials_no` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL COMMENT '分类：1 普通用户 2 商家',
  `add_time` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('40', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:34', '0');
INSERT INTO `user` VALUES ('39', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:34', '0');
INSERT INTO `user` VALUES ('38', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:34', '0');
INSERT INTO `user` VALUES ('35', null, 'c4ca4238a0b923820dcc509a6f75849b', 'aaa', null, null, null, null, null, '258143345@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-24 18:23:51', '1');
INSERT INTO `user` VALUES ('36', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:30', '0');
INSERT INTO `user` VALUES ('37', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:32', '0');
INSERT INTO `user` VALUES ('41', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:34', '0');
INSERT INTO `user` VALUES ('42', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:35', '0');
INSERT INTO `user` VALUES ('43', null, '594f803b380a41396ed63dca39503542', 'aaaaa', null, null, null, null, null, 'aaaaa@qq.com', null, null, null, null, null, null, null, null, null, null, '2014-07-31 13:53:35', '0');
INSERT INTO `user` VALUES ('48', null, 'e10adc3949ba59abbe56e057f20f883e', 'Marcus', null, null, null, null, null, 'marcus@mail.com', null, null, null, null, null, null, null, null, null, null, '2014-08-04 09:53:23', '1');
