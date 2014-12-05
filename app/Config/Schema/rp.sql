/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50534
 Source Host           : localhost
 Source Database       : rp

 Target Server Type    : MySQL
 Target Server Version : 50534
 File Encoding         : utf-8

 Date: 10/07/2014 14:26:23 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `actions`
-- ----------------------------
BEGIN;
INSERT INTO `actions` VALUES ('1', 'Liste des coupons', '', 'coupons', 'admin_index'), ('2', 'Edition de coupon', '', 'coupons', 'admin_edit'), ('3', 'Voir les coupons', '', 'coupons', 'admin_view'), ('4', 'Tirage au sort', '', 'coupons', 'admin_lotery'), ('5', 'ValidÃ© le tirage et fermÃ© le concours', '', 'coupons', 'admin_validate'), ('6', 'lister les participants', '', 'people', 'admin_index'), ('7', 'vue partneaire', '', 'coupons', 'part_view'), ('8', 'index partenanire', '', 'coupons', 'part_index'), ('9', 'print', '', 'coupons', 'admin_print');
COMMIT;

-- ----------------------------
--  Table structure for `actions_groups`
-- ----------------------------
DROP TABLE IF EXISTS `actions_groups`;
CREATE TABLE `actions_groups` (
  `action_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`action_id`,`group_id`),
  KEY `fk_actions_groups_groups1_idx` (`group_id`),
  KEY `fk_actions_groups_actions1_idx` (`action_id`),
  CONSTRAINT `fk_actions_groups_actions1` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_actions_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `actions_groups`
-- ----------------------------
BEGIN;
INSERT INTO `actions_groups` VALUES ('2', '2'), ('1', '3'), ('2', '3'), ('3', '3'), ('4', '3'), ('5', '3'), ('6', '3'), ('9', '3'), ('7', '4'), ('8', '4');
COMMIT;

-- ----------------------------
--  Table structure for `coupons`
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `date_place_condition` text,
  `description` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `nb_available` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '1',
  `img_1` varchar(255) NOT NULL,
  `img_2` varchar(255) DEFAULT NULL,
  `img_3` varchar(255) DEFAULT NULL,
  `edition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_coupons_editions_idx` (`edition_id`),
  CONSTRAINT `fk_coupons_editions` FOREIGN KEY (`edition_id`) REFERENCES `editions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `coupons`
-- ----------------------------
BEGIN;
INSERT INTO `coupons` VALUES ('8', 'LE LIVRE SUR LES QUAIS', '20 croisiÃ¨res littÃ©raires Ã  gagner', 'Du 6 au 8 septembre 2013\r\nQuais de Morges', 'Pour la quatriÃ¨me annÃ©e consÃ©cutive, cette manifestation \r\ndâ€™envergure internationale, rÃ©unissant auteurs et lecteurs, \r\nprendra place sur les quais de Morges. Et qui dit quai dit \r\nbateau, et qui dit bateau dit croisiÃ¨re! Embarquez pour \r\nune escapade littÃ©raire sur lâ€™eau, au cours de laquelle \r\nvous pourrez assister Ã  une confÃ©rence ou un dÃ©bat \r\nthÃ©matique. ', 'http://lelivresurlesquais.ch/', '2', '1', '/files/uploads/livre_sur_les_quais_2_zoom945-1410193430.jpg', '/files/uploads/splash2013-copie-2.jpg', '/files/uploads/1410187724.jpeg', '1'), ('9', 'La Nuit des MusÃ©es', '40 billets Ã  gagner Ã  gagner', 'La Nuit des musÃ©es\r\nSamedi 21 septembre 2013 \r\nLausanne et Pully', 'Un accÃ¨s convivial, gai et joyeusement dÃ©bridÃ© aux 23 institutions \r\nde Lausanne et de Pully, qui ouvrent leurs portes pour une nuit \r\ndÃ©diÃ©e Ã  la culture. Retraites Populaires soutient en particulier \r\nle Vivarium et le mudac et vous recommande ces deux musÃ©es, \r\noÃ¹ une surprise vous attendra.. ', 'http://www.lanuitdesmusees.ch/', '40', '0', '/files/uploads/nuit-des-musees.jpg', '/files/uploads/206275_420448581349277_2017106255_n.jpg', '/files/uploads/185131_420448911349244_336291378_n.jpg', '1');
COMMIT;

-- ----------------------------
--  Table structure for `editions`
-- ----------------------------
DROP TABLE IF EXISTS `editions`;
CREATE TABLE `editions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `editions`
-- ----------------------------
BEGIN;
INSERT INTO `editions` VALUES ('1', '2014-03-27 09:35:19', '2014-03-27', '1', 'Bella Vita 50', 'fraise');
COMMIT;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'admin'), ('2', 'wgr'), ('3', 'rp'), ('4', 'Partnenaire');
COMMIT;

-- ----------------------------
--  Table structure for `people`
-- ----------------------------
DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `winner` tinyint(1) DEFAULT NULL,
  `coupon_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_people_coupons1_idx` (`coupon_id`),
  CONSTRAINT `fk_people_coupons1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `people`
-- ----------------------------
BEGIN;
INSERT INTO `people` VALUES ('26', 'Cyril', 'Hirschi', 'Av. des Mousquines 40', '1234', 'Lausanne', 'cyril@hirschi.me', null, '8');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', 'dd9792535df0dc3defc6aba12f18f38df4f53644', '1'), ('2', 'rp', 'b30b1d6ed3a5b772ba08cc588d2d1e7df6588446', '3'), ('3', 'part', 'f4c53e77bae47be232e5ee20adbde3fd941ea053', '4');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
