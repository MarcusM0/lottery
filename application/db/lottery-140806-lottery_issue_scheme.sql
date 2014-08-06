/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : lottery

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-08-06 13:17:09
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
  `id_prize` int(11) DEFAULT NULL,
  `issue_num` int(11) DEFAULT '1',
  `issue_result` varchar(255) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id_lottery_issue`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lottery_issue
-- ----------------------------
INSERT INTO `lottery_issue` VALUES ('1', '3', '1', '50000');
INSERT INTO `lottery_issue` VALUES ('2', '4', '1', '50000');
INSERT INTO `lottery_issue` VALUES ('3', '5', '1', '500');
INSERT INTO `lottery_issue` VALUES ('4', '3', '2', 'pending');
INSERT INTO `lottery_issue` VALUES ('5', '4', '2', 'pending');
INSERT INTO `lottery_issue` VALUES ('6', '5', '2', '1');
INSERT INTO `lottery_issue` VALUES ('7', '5', '3', 'pending');

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
INSERT INTO `prize` VALUES ('1', '苹果（Apple）iPad', '/images/st1.jpg', '/images/st1.jpg', '苹果（Apple）iPad  10万次抽奖送出', '100000', '0', '1', null, '1', '1');
INSERT INTO `prize` VALUES ('2', '无线蓝牙音箱', '/images/st2.jpg', '/images/st2.jpg', '无线蓝牙音箱     1万次抽奖送出', '10000', '0', '1', null, '1', '2');
INSERT INTO `prize` VALUES ('3', '平板电脑床上床', '/images/st3.jpg', '/images/st3.jpg', '平板电脑床上床', '100000', '0', '2', null, '1', '3');
INSERT INTO `prize` VALUES ('4', '罗技（Logitech）', '/images/st4.jpg', '/images/st4.jpg', '罗技（Logitech）', '100000', '0', '2', null, '1', '4');
INSERT INTO `prize` VALUES ('5', 'SkinAT iPad air保护套', '/images/xt1.jpg', '/images/xt1.jpg', 'SkinAT iPad air保护套', '1000', '1', '2', null, '1', '5');
INSERT INTO `prize` VALUES ('6', '宝枫（POFOKO）', '/images/xt2.jpg', '/images/xt2.jpg', '宝枫（POFOKO）', '10', '0', '2', null, '2', '6');
INSERT INTO `prize` VALUES ('7', '韩国特兰恩', '/images/xt3.jpg', '/images/xt3.jpg', '韩国特兰恩', '5', '0', '2', null, '2', '7');
INSERT INTO `prize` VALUES ('8', 'CASMELY', 'http://img10.360buyimg.com/n0/g15/M06/01/04/rBEhWVLMvb4IAAAAAACfED0O6SEAAHrpwGoKWIAAJ8o100.jpg', 'http://img13.360buyimg.com/n7/g15/M06/01/04/rBEhWVLMvb4IAAAAAACfED0O6SEAAHrpwGoKWIAAJ8o100.jpg', 'CASMELY', '5', '0', '2', null, '1', '8');
INSERT INTO `prize` VALUES ('9', '实捷C27三USB接口 ', 'http://img10.360buyimg.com/n0/g15/M09/1D/04/rBEhWFKw_G0IAAAAAAEYChTAFLgAAG5kgJFqIoAARgi688.jpg', 'http://img12.360buyimg.com/n7/g15/M09/1D/04/rBEhWFKw_G0IAAAAAAEYChTAFLgAAG5kgJFqIoAARgi688.jpg', '实捷C27三USB接口 ', '6', '0', '2', null, '1', '9');
INSERT INTO `prize` VALUES ('10', '毕亚兹（BIAZE）', 'http://img10.360buyimg.com/n0/g13/M02/00/03/rBEhU1MyZm0IAAAAAADCN-qVZJIAAKvHQLyq7cAAMJP276.jpg', 'http://img14.360buyimg.com/n7/g13/M02/00/03/rBEhU1MyZm0IAAAAAADCN-qVZJIAAKvHQLyq7cAAMJP276.jpg', '毕亚兹（BIAZE）', '8', '0', '2', null, '1', '10');

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

-- ----------------------------
-- Table structure for `user_lottery_action`
-- ----------------------------
DROP TABLE IF EXISTS `user_lottery_action`;
CREATE TABLE `user_lottery_action` (
  `id_user_lottery_actioin` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL COMMENT '抽奖人',
  `action_code` int(11) DEFAULT NULL COMMENT '奖品',
  `id_lottery_issue` int(11) DEFAULT NULL COMMENT '抽奖号',
  `created_time` datetime DEFAULT NULL COMMENT '日期',
  PRIMARY KEY (`id_user_lottery_actioin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_lottery_action
-- ----------------------------
INSERT INTO `user_lottery_action` VALUES ('1', '48', '5556', '1', '2014-08-06 07:12:49');
INSERT INTO `user_lottery_action` VALUES ('2', '48', '1', '2', '2014-08-06 07:12:56');
INSERT INTO `user_lottery_action` VALUES ('3', '48', '2', '2', '2014-08-06 07:13:24');
INSERT INTO `user_lottery_action` VALUES ('4', '48', '1', '3', '2014-08-06 07:13:40');
INSERT INTO `user_lottery_action` VALUES ('5', '48', '1', '6', '2014-08-06 07:15:19');
INSERT INTO `user_lottery_action` VALUES ('6', '48', '1', '7', '2014-08-06 07:16:27');
