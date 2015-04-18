/*
Navicat MySQL Data Transfer

Source Server         : xuezi360
Source Server Version : 50615
Source Host           : 114.215.147.232:3306
Source Database       : 360xz

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2015-04-18 16:07:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lxw_followers`
-- ----------------------------
DROP TABLE IF EXISTS `lxw_followers`;
CREATE TABLE "lxw_followers" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "openid" varchar(255) NOT NULL,
  "grantid" int(11) NOT NULL,
  "createdate" date DEFAULT NULL,
  "createtime" time DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "openid" ("openid")
);

-- ----------------------------
-- Table structure for `lxw_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lxw_admin`;
CREATE TABLE "lxw_admin" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "username" varchar(64) DEFAULT NULL,
  "truename" varchar(64) DEFAULT NULL,
  "gender" varchar(8) DEFAULT NULL,
  "password" varchar(255) DEFAULT NULL,
  "remark" varchar(255) DEFAULT NULL,
  "is_supper" int(11) DEFAULT '0',
  PRIMARY KEY ("id"),
  UNIQUE KEY "username" ("username")
);

-- ----------------------------
-- Table structure for `lxw_grantrecord`
-- ----------------------------
DROP TABLE IF EXISTS `lxw_grantrecord`;
CREATE TABLE "lxw_grantrecord" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "name" varchar(64) DEFAULT NULL,
  "gender" varchar(8) DEFAULT NULL,
  "qrpath" varchar(255) DEFAULT NULL,
  "achievement" int(11) DEFAULT '0',
  "pureachieve" int(11) DEFAULT '0',
  "ggroup" varchar(24) DEFAULT '0',
  "remark" varchar(255) DEFAULT NULL,
  "adminid" int(11) DEFAULT NULL,
  PRIMARY KEY ("id")
);


-- ----------------------------
-- Table structure for `lxw_followerinfo`
-- ----------------------------
DROP TABLE IF EXISTS `lxw_followerinfo`;
CREATE TABLE "lxw_followerinfo" (
  "id" int(11) NOT NULL AUTO_INCREMENT,
  "openid" varchar(255) NOT NULL,
  "nickname" varchar(128) DEFAULT NULL,
  "sex" int(11) DEFAULT NULL,
  "language" varchar(32) DEFAULT NULL,
  "city" varchar(32) DEFAULT NULL,
  "province" varchar(32) DEFAULT NULL,
  "country" varchar(32) DEFAULT NULL,
  "headimgurl" varchar(1024) DEFAULT NULL,
  "subscribe_date" date DEFAULT NULL,
  "subscribe_time" time DEFAULT NULL,
  "remark" varchar(128) DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "openid" ("openid")
);


INSERT INTO lxw_admin(`username`,`truename`,`gender`,`password`,`remark`,`is_supper`) VALUES('admin','admin','男',SHA1('administrator!'),'admin',1)