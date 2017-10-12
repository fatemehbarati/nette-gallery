/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : nette-gallery

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-10-12 14:44:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Group 1', '2017-10-12 14:41:20');
INSERT INTO `groups` VALUES ('2', 'Group 2', '2017-10-12 14:41:23');
INSERT INTO `groups` VALUES ('3', 'Group 3', '2017-10-12 14:41:29');
INSERT INTO `groups` VALUES ('4', 'Group 4', '2017-10-12 14:41:32');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Product 1', 'Description for product1', '1', '2017-10-12 14:42:40');
INSERT INTO `products` VALUES ('2', 'Product 2', 'Description for Product2', '1', '2017-10-12 14:42:57');
INSERT INTO `products` VALUES ('3', 'Product 3', 'Description for product3', '1', '2017-10-12 14:43:14');
INSERT INTO `products` VALUES ('4', 'Product 4', 'Description for product 4', '1', '2017-10-12 14:43:30');

-- ----------------------------
-- Table structure for product_group
-- ----------------------------
DROP TABLE IF EXISTS `product_group`;
CREATE TABLE `product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of product_group
-- ----------------------------
INSERT INTO `product_group` VALUES ('1', '1', '1', '2017-10-12 14:42:40');
INSERT INTO `product_group` VALUES ('2', '1', '2', '2017-10-12 14:42:40');
INSERT INTO `product_group` VALUES ('3', '2', '3', '2017-10-12 14:42:57');
INSERT INTO `product_group` VALUES ('4', '3', '1', '2017-10-12 14:43:14');
INSERT INTO `product_group` VALUES ('5', '3', '3', '2017-10-12 14:43:14');
INSERT INTO `product_group` VALUES ('6', '3', '4', '2017-10-12 14:43:14');
INSERT INTO `product_group` VALUES ('7', '4', '1', '2017-10-12 14:43:30');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '123456');
SET FOREIGN_KEY_CHECKS=1;