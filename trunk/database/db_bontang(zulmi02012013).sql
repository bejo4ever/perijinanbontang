/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-01-02 23:29:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cek_list_iuiphhk`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_iuiphhk`;
CREATE TABLE `cek_list_iuiphhk` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_iuiphhk
-- ----------------------------
INSERT INTO `cek_list_iuiphhk` VALUES ('47', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('58', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('59', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('60', '9', null, '');
INSERT INTO `cek_list_iuiphhk` VALUES ('61', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('62', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('63', '9', null, 'ada');
INSERT INTO `cek_list_iuiphhk` VALUES ('64', '9', null, '');
INSERT INTO `cek_list_iuiphhk` VALUES ('65', '9', null, '');

-- ----------------------------
-- Table structure for `cek_list_lingkungan`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_lingkungan`;
CREATE TABLE `cek_list_lingkungan` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`),
  CONSTRAINT `cek_list_lingkungan_ibfk_2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_LINGKUNGAN_SYARAT` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lingkungan` (`ID_IJIN_LINGKUNGAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_lingkungan
-- ----------------------------

-- ----------------------------
-- Table structure for `cek_list_lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_lokasi`;
CREATE TABLE `cek_list_lokasi` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`),
  CONSTRAINT `FK_IJIN2` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lokasi` (`ID_IJIN_LOKASI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SYARAT2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_lokasi
-- ----------------------------
INSERT INTO `cek_list_lokasi` VALUES ('47', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('58', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('59', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('60', '9', null, '');
INSERT INTO `cek_list_lokasi` VALUES ('61', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('62', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('63', '9', null, 'ada');
INSERT INTO `cek_list_lokasi` VALUES ('64', '9', null, '');
INSERT INTO `cek_list_lokasi` VALUES ('65', '9', null, '');

-- ----------------------------
-- Table structure for `cek_list_prinsip`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_prinsip`;
CREATE TABLE `cek_list_prinsip` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_prinsip
-- ----------------------------
INSERT INTO `cek_list_prinsip` VALUES ('98', '8', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('98', '9', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('98', '10', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('98', '11', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('98', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('99', '8', null, 'da');
INSERT INTO `cek_list_prinsip` VALUES ('99', '9', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('99', '10', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('99', '11', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('99', '12', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('100', '8', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('100', '9', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('100', '10', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('100', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('100', '12', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('101', '8', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('101', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('101', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('101', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('101', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('102', '8', null, 'ada');
INSERT INTO `cek_list_prinsip` VALUES ('102', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('102', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('102', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('102', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('103', '8', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('103', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('103', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('103', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('103', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('104', '8', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('104', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('104', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('104', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('104', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('105', '8', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('105', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('105', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('105', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('105', '12', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('106', '8', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('106', '9', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('106', '10', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('106', '11', null, '');
INSERT INTO `cek_list_prinsip` VALUES ('106', '12', null, '');

-- ----------------------------
-- Table structure for `cek_list_sktr`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_sktr`;
CREATE TABLE `cek_list_sktr` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_SKTR` (`ID_IJIN`),
  CONSTRAINT `FK_SKTR` FOREIGN KEY (`ID_IJIN`) REFERENCES `sktr` (`ID_SKTR`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_sktr
-- ----------------------------
INSERT INTO `cek_list_sktr` VALUES ('81', '26', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('81', '27', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('82', '26', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('82', '27', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('83', '26', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('83', '27', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('84', '26', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('84', '27', null, 'ada');
INSERT INTO `cek_list_sktr` VALUES ('85', '26', null, '');
INSERT INTO `cek_list_sktr` VALUES ('85', '27', null, 'ada');

-- ----------------------------
-- Table structure for `cek_list_sppl`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_sppl`;
CREATE TABLE `cek_list_sppl` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_sppl
-- ----------------------------
INSERT INTO `cek_list_sppl` VALUES ('72', '7', null, 'asd');
INSERT INTO `cek_list_sppl` VALUES ('72', '8', null, 'asd');
INSERT INTO `cek_list_sppl` VALUES ('72', '9', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('72', '10', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('72', '11', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('73', '7', null, 'asd');
INSERT INTO `cek_list_sppl` VALUES ('73', '8', null, 'asd');
INSERT INTO `cek_list_sppl` VALUES ('73', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('73', '10', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('73', '11', null, '');
INSERT INTO `cek_list_sppl` VALUES ('74', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('74', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('74', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('74', '10', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('74', '11', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('75', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('75', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('75', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('75', '10', null, '');
INSERT INTO `cek_list_sppl` VALUES ('75', '11', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('76', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('76', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('76', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('76', '10', null, 'ada');
INSERT INTO `cek_list_sppl` VALUES ('76', '11', null, '');
INSERT INTO `cek_list_sppl` VALUES ('77', '7', null, 'asd');
INSERT INTO `cek_list_sppl` VALUES ('77', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('77', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('77', '10', null, '');
INSERT INTO `cek_list_sppl` VALUES ('77', '11', null, '');
INSERT INTO `cek_list_sppl` VALUES ('78', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('78', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('78', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('78', '10', null, '');
INSERT INTO `cek_list_sppl` VALUES ('78', '11', null, '');
INSERT INTO `cek_list_sppl` VALUES ('79', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('79', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('79', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('79', '10', null, '');
INSERT INTO `cek_list_sppl` VALUES ('79', '11', null, '');
INSERT INTO `cek_list_sppl` VALUES ('80', '7', null, '');
INSERT INTO `cek_list_sppl` VALUES ('80', '8', null, '');
INSERT INTO `cek_list_sppl` VALUES ('80', '9', null, '');
INSERT INTO `cek_list_sppl` VALUES ('80', '10', null, '');
INSERT INTO `cek_list_sppl` VALUES ('80', '11', null, '');

-- ----------------------------
-- Table structure for `cek_list_trayek`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_trayek`;
CREATE TABLE `cek_list_trayek` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_trayek
-- ----------------------------
INSERT INTO `cek_list_trayek` VALUES ('3', '2', null, 'ada');
INSERT INTO `cek_list_trayek` VALUES ('3', '3', null, 'ada');
INSERT INTO `cek_list_trayek` VALUES ('53', '2', null, '');
INSERT INTO `cek_list_trayek` VALUES ('53', '3', null, 'ada');
INSERT INTO `cek_list_trayek` VALUES ('54', '2', null, 'ada');
INSERT INTO `cek_list_trayek` VALUES ('54', '3', null, '');
INSERT INTO `cek_list_trayek` VALUES ('55', '2', null, 'ada');
INSERT INTO `cek_list_trayek` VALUES ('55', '3', null, '');
INSERT INTO `cek_list_trayek` VALUES ('56', '2', null, '');
INSERT INTO `cek_list_trayek` VALUES ('56', '3', null, '');
INSERT INTO `cek_list_trayek` VALUES ('57', '2', null, '');
INSERT INTO `cek_list_trayek` VALUES ('57', '3', null, '');

-- ----------------------------
-- Table structure for `cek_list_trotoar`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_trotoar`;
CREATE TABLE `cek_list_trotoar` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_trotoar
-- ----------------------------
INSERT INTO `cek_list_trotoar` VALUES ('47', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('58', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('59', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('60', '9', null, '');
INSERT INTO `cek_list_trotoar` VALUES ('61', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('62', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('63', '9', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('64', '9', null, '');
INSERT INTO `cek_list_trotoar` VALUES ('65', '9', null, '');
INSERT INTO `cek_list_trotoar` VALUES ('94', '1', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('94', '2', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('94', '3', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('95', '1', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('95', '2', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('95', '3', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('96', '1', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('96', '2', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('96', '3', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('97', '1', null, '');
INSERT INTO `cek_list_trotoar` VALUES ('97', '2', null, 'ada');
INSERT INTO `cek_list_trotoar` VALUES ('97', '3', null, 'ada');

-- ----------------------------
-- Table structure for `dt_syarat`
-- ----------------------------
DROP TABLE IF EXISTS `dt_syarat`;
CREATE TABLE `dt_syarat` (
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`,`ID_SYARAT`),
  KEY `FK_SYARAT` (`ID_SYARAT`),
  CONSTRAINT `FK_IJIN` FOREIGN KEY (`ID_IJIN`) REFERENCES `master_ijin` (`ID_IJIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SYARAT` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dt_syarat
-- ----------------------------
INSERT INTO `dt_syarat` VALUES ('1', '1', '1');
INSERT INTO `dt_syarat` VALUES ('1', '2', '1');
INSERT INTO `dt_syarat` VALUES ('1', '3', '1');
INSERT INTO `dt_syarat` VALUES ('1', '4', '1');
INSERT INTO `dt_syarat` VALUES ('1', '5', '1');
INSERT INTO `dt_syarat` VALUES ('1', '6', '1');
INSERT INTO `dt_syarat` VALUES ('1', '7', '1');
INSERT INTO `dt_syarat` VALUES ('1', '8', '1');
INSERT INTO `dt_syarat` VALUES ('1', '9', '1');
INSERT INTO `dt_syarat` VALUES ('2', '14', '1');
INSERT INTO `dt_syarat` VALUES ('2', '15', '1');
INSERT INTO `dt_syarat` VALUES ('2', '16', '1');
INSERT INTO `dt_syarat` VALUES ('2', '17', '1');
INSERT INTO `dt_syarat` VALUES ('2', '18', '1');
INSERT INTO `dt_syarat` VALUES ('2', '19', '1');
INSERT INTO `dt_syarat` VALUES ('2', '20', '1');
INSERT INTO `dt_syarat` VALUES ('2', '21', '1');
INSERT INTO `dt_syarat` VALUES ('2', '22', '1');
INSERT INTO `dt_syarat` VALUES ('2', '23', '1');
INSERT INTO `dt_syarat` VALUES ('2', '47', '1');
INSERT INTO `dt_syarat` VALUES ('3', '3', '1');
INSERT INTO `dt_syarat` VALUES ('3', '10', '1');
INSERT INTO `dt_syarat` VALUES ('3', '11', '1');
INSERT INTO `dt_syarat` VALUES ('3', '12', '1');
INSERT INTO `dt_syarat` VALUES ('3', '13', '1');
INSERT INTO `dt_syarat` VALUES ('3', '48', '1');
INSERT INTO `dt_syarat` VALUES ('3', '49', '1');
INSERT INTO `dt_syarat` VALUES ('3', '50', '1');
INSERT INTO `dt_syarat` VALUES ('3', '51', '1');
INSERT INTO `dt_syarat` VALUES ('3', '52', '1');
INSERT INTO `dt_syarat` VALUES ('4', '24', '1');
INSERT INTO `dt_syarat` VALUES ('4', '26', '1');
INSERT INTO `dt_syarat` VALUES ('4', '27', '1');
INSERT INTO `dt_syarat` VALUES ('4', '28', '1');
INSERT INTO `dt_syarat` VALUES ('4', '29', '1');
INSERT INTO `dt_syarat` VALUES ('5', '30', '1');
INSERT INTO `dt_syarat` VALUES ('5', '31', '1');
INSERT INTO `dt_syarat` VALUES ('5', '32', '1');
INSERT INTO `dt_syarat` VALUES ('5', '33', '1');
INSERT INTO `dt_syarat` VALUES ('5', '34', '1');
INSERT INTO `dt_syarat` VALUES ('5', '35', '1');
INSERT INTO `dt_syarat` VALUES ('5', '36', '1');
INSERT INTO `dt_syarat` VALUES ('5', '37', '1');
INSERT INTO `dt_syarat` VALUES ('5', '38', '1');
INSERT INTO `dt_syarat` VALUES ('5', '39', '1');
INSERT INTO `dt_syarat` VALUES ('5', '40', '1');
INSERT INTO `dt_syarat` VALUES ('5', '41', '1');
INSERT INTO `dt_syarat` VALUES ('5', '42', '1');
INSERT INTO `dt_syarat` VALUES ('5', '43', '1');
INSERT INTO `dt_syarat` VALUES ('5', '44', '1');
INSERT INTO `dt_syarat` VALUES ('5', '46', '1');
INSERT INTO `dt_syarat` VALUES ('6', '3', '1');
INSERT INTO `dt_syarat` VALUES ('6', '53', '1');
INSERT INTO `dt_syarat` VALUES ('6', '54', '1');
INSERT INTO `dt_syarat` VALUES ('6', '55', '1');
INSERT INTO `dt_syarat` VALUES ('6', '56', '1');
INSERT INTO `dt_syarat` VALUES ('6', '57', '1');
INSERT INTO `dt_syarat` VALUES ('7', '47', '1');
INSERT INTO `dt_syarat` VALUES ('7', '58', '1');
INSERT INTO `dt_syarat` VALUES ('7', '59', '1');
INSERT INTO `dt_syarat` VALUES ('7', '60', '1');
INSERT INTO `dt_syarat` VALUES ('7', '61', '1');
INSERT INTO `dt_syarat` VALUES ('7', '62', '1');
INSERT INTO `dt_syarat` VALUES ('7', '63', '1');
INSERT INTO `dt_syarat` VALUES ('7', '64', '1');
INSERT INTO `dt_syarat` VALUES ('7', '65', '1');
INSERT INTO `dt_syarat` VALUES ('8', '66', '1');
INSERT INTO `dt_syarat` VALUES ('8', '67', '1');
INSERT INTO `dt_syarat` VALUES ('8', '68', '1');
INSERT INTO `dt_syarat` VALUES ('8', '69', '1');
INSERT INTO `dt_syarat` VALUES ('8', '70', '1');
INSERT INTO `dt_syarat` VALUES ('9', '72', '1');
INSERT INTO `dt_syarat` VALUES ('9', '73', '1');
INSERT INTO `dt_syarat` VALUES ('9', '74', '1');
INSERT INTO `dt_syarat` VALUES ('9', '75', '1');
INSERT INTO `dt_syarat` VALUES ('9', '76', '1');
INSERT INTO `dt_syarat` VALUES ('9', '77', '1');
INSERT INTO `dt_syarat` VALUES ('9', '78', '1');
INSERT INTO `dt_syarat` VALUES ('9', '79', '1');
INSERT INTO `dt_syarat` VALUES ('9', '80', '1');
INSERT INTO `dt_syarat` VALUES ('10', '81', '1');
INSERT INTO `dt_syarat` VALUES ('10', '82', '1');
INSERT INTO `dt_syarat` VALUES ('10', '83', '1');
INSERT INTO `dt_syarat` VALUES ('10', '84', '1');
INSERT INTO `dt_syarat` VALUES ('10', '85', '1');
INSERT INTO `dt_syarat` VALUES ('11', '86', '1');
INSERT INTO `dt_syarat` VALUES ('11', '87', '1');
INSERT INTO `dt_syarat` VALUES ('11', '88', '1');
INSERT INTO `dt_syarat` VALUES ('11', '89', '1');
INSERT INTO `dt_syarat` VALUES ('11', '90', '1');
INSERT INTO `dt_syarat` VALUES ('11', '91', '1');
INSERT INTO `dt_syarat` VALUES ('11', '92', '1');
INSERT INTO `dt_syarat` VALUES ('11', '93', '1');
INSERT INTO `dt_syarat` VALUES ('12', '98', '1');
INSERT INTO `dt_syarat` VALUES ('12', '99', '1');
INSERT INTO `dt_syarat` VALUES ('12', '100', '1');
INSERT INTO `dt_syarat` VALUES ('12', '101', '1');
INSERT INTO `dt_syarat` VALUES ('12', '102', '1');
INSERT INTO `dt_syarat` VALUES ('12', '103', '1');
INSERT INTO `dt_syarat` VALUES ('12', '104', '1');
INSERT INTO `dt_syarat` VALUES ('12', '105', '1');
INSERT INTO `dt_syarat` VALUES ('12', '106', '1');
INSERT INTO `dt_syarat` VALUES ('13', '94', '1');
INSERT INTO `dt_syarat` VALUES ('13', '95', '1');
INSERT INTO `dt_syarat` VALUES ('13', '96', '1');
INSERT INTO `dt_syarat` VALUES ('13', '97', '1');

-- ----------------------------
-- Table structure for `ijin_lingkungan`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lingkungan`;
CREATE TABLE `ijin_lingkungan` (
  `ID_IJIN_LINGKUNGAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN_LINGKUNGAN_INTI` int(11) DEFAULT NULL,
  `NO_REG` varchar(50) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NAMA_DIREKTUR` varchar(50) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_AWAL` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN`),
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`),
  CONSTRAINT `FK_LINGKUNGAN` FOREIGN KEY (`ID_IJIN_LINGKUNGAN_INTI`) REFERENCES `ijin_lingkungan_inti` (`ID_IJIN_LINGKUNGAN_INTI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan
-- ----------------------------

-- ----------------------------
-- Table structure for `ijin_lingkungan_inti`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lingkungan_inti`;
CREATE TABLE `ijin_lingkungan_inti` (
  `ID_IJIN_LINGKUNGAN_INTI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NPWPD` varchar(50) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NO_AKTE` varchar(50) DEFAULT NULL,
  `BENTUK_PERUSAHAAN` int(11) DEFAULT NULL,
  `ALAMAT_PERUSAHAAN` varchar(100) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KELURAHAN` int(11) DEFAULT NULL,
  `NAMA_KEGIATAN` varchar(50) DEFAULT NULL,
  `JENIS_USAHA` varchar(50) DEFAULT NULL,
  `ALAMAT_LOKASI` varchar(100) DEFAULT NULL,
  `ID_KELURAHAN_LOKASI` int(11) DEFAULT NULL,
  `ID_KECAMATAN_LOKASI` int(11) DEFAULT NULL,
  `STATUS_LOKASI` int(11) DEFAULT NULL,
  `LUAS_USAHA` float DEFAULT NULL,
  `LUAS_BAHAN` float DEFAULT NULL,
  `LUAS_BANGUNAN` float DEFAULT NULL,
  `LUAS_RUANG_USAHA` float DEFAULT NULL,
  `KAPASITAS` float DEFAULT NULL,
  `IZIN_SKTR` int(11) DEFAULT NULL,
  `IZIN_LOKASI` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN_INTI`),
  KEY `FK_PEMOHON_LINGKUNGAN` (`ID_PEMOHON`),
  CONSTRAINT `FK_PEMOHON_LINGKUNGAN` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan_inti
-- ----------------------------

-- ----------------------------
-- Table structure for `ijin_lokasi`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lokasi`;
CREATE TABLE `ijin_lokasi` (
  `ID_IJIN_LOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `NPWPD` varchar(50) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NO_AKTA` varchar(50) DEFAULT NULL,
  `BENTUK_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `RT` int(11) DEFAULT NULL,
  `RW` int(11) DEFAULT NULL,
  `ID_KELURAHAN` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `TELP` varchar(20) DEFAULT NULL,
  `FUNGSI` varchar(50) DEFAULT NULL,
  `STATUS_TANAH` int(11) DEFAULT NULL,
  `KETERANGAN_TANAH` varchar(50) DEFAULT NULL,
  `LUAS_LOKASI` float DEFAULT NULL,
  `ALAMAT_LOKASI` varchar(100) DEFAULT NULL,
  `ID_KELURAHAN_LOKASI` int(11) DEFAULT NULL,
  `ID_KECAMATAN_LOKASI` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LOKASI`),
  KEY `FK_IJIN_LOKASI_INTI` (`ID_PEMOHON`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lokasi
-- ----------------------------
INSERT INTO `ijin_lokasi` VALUES ('9', '1', '1', '', '', '123', '123', '123', '123', '123', '21', '12', '1', '1', '1', '123', '123', '1', '', '123', '123', '1', '1', '1', '1', '2013-12-31', null, '2013-12-24');

-- ----------------------------
-- Table structure for `ijin_prinsip`
-- ----------------------------
DROP TABLE IF EXISTS `ijin_prinsip`;
CREATE TABLE `ijin_prinsip` (
  `ID_IJIN_PRINSIP` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `NAMA_LOKASI` varchar(50) DEFAULT NULL,
  `LONGITUDE` varchar(50) DEFAULT NULL,
  `LATITUDE` varchar(50) DEFAULT NULL,
  `ALAMAT_LOKASI` varchar(100) DEFAULT NULL,
  `JENIS_TOWER` varchar(50) DEFAULT NULL,
  `FUNGSI_BANGUNAN` varchar(50) DEFAULT NULL,
  `JENIS_BANGUNAN` varchar(50) DEFAULT NULL,
  `UKURAN_BANGUNAN` varchar(50) DEFAULT NULL,
  `TINGGI_BANGUNAN` float DEFAULT NULL,
  `TIANG_BANGUNAN` varchar(50) DEFAULT NULL,
  `PONDASI_BANGUNAN` varchar(50) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_PRINSIP`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_prinsip
-- ----------------------------
INSERT INTO `ijin_prinsip` VALUES ('8', '1', 'asd', '', '', '1', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '2019-12-31', '1', '1');
INSERT INTO `ijin_prinsip` VALUES ('9', '1', 'asd', '', '', '1', 'asd', 'asd', 'asd', 'ads', 'asd', 'asd', 'asd', 'asdd', '23', '2', '2', null, null, '2018-12-31', '0', '0');
INSERT INTO `ijin_prinsip` VALUES ('10', '1', 'asd', '', '8', '2', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '2019-12-31', '1', '1');
INSERT INTO `ijin_prinsip` VALUES ('11', '1', 'asd', null, '8', '1', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '0000-00-00', '0', '0');
INSERT INTO `ijin_prinsip` VALUES ('12', '1', 'asd', null, '9', '2', 'asd', 'asd', 'asd', 'ads', 'asd', 'asd', 'asd', 'asdd', '23', '2', '2', null, null, '0000-00-00', '0', '0');

-- ----------------------------
-- Table structure for `iuiphhk`
-- ----------------------------
DROP TABLE IF EXISTS `iuiphhk`;
CREATE TABLE `iuiphhk` (
  `ID_IUIPHHK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NPWP` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `STATUS_MODAL` int(11) DEFAULT NULL,
  `NAMA_NOTARIS` varchar(50) DEFAULT NULL,
  `NO_AKTA` varchar(50) DEFAULT NULL,
  `PENANGGUNG_JAWAB` varchar(50) DEFAULT NULL,
  `NAMA_DIREKSI` varchar(50) DEFAULT NULL,
  `DEWAN_KOMISARIS` varchar(50) DEFAULT NULL,
  `TUJUAN_PRODUKSI` varchar(200) DEFAULT NULL,
  `LOKASI_PABRIK` int(11) DEFAULT NULL,
  `LUAS_TANAH` float DEFAULT NULL,
  `ALAMAT_PABRIK` varchar(100) DEFAULT NULL,
  `OLAH1_P_TAHUN` int(11) DEFAULT NULL,
  `OLAH1_P_BULAN` int(11) DEFAULT NULL,
  `OLAH2_P_TAHUN` int(11) DEFAULT NULL,
  `OLAH2_P_BULAN` int(11) DEFAULT NULL,
  `OLAH3_P_TAHUN` int(11) DEFAULT NULL,
  `OLAH3_P_BULAN` int(11) DEFAULT NULL,
  `OLAH1_S_TAHUN` int(11) DEFAULT NULL,
  `OLAH1_S_BULAN` int(11) DEFAULT NULL,
  `OLAH2_S_TAHUN` int(11) DEFAULT NULL,
  `OLAH2_S_BULAN` int(11) DEFAULT NULL,
  `OLAH3_S_TAHUN` int(11) DEFAULT NULL,
  `OLAH3_S_BULAN` int(11) DEFAULT NULL,
  `MT_TANAH` float DEFAULT NULL,
  `MT_BANGUNAN` float DEFAULT NULL,
  `MT_MESIN` float DEFAULT NULL,
  `MT_DLL` float DEFAULT NULL,
  `MK_BAHAN_BAKU` float DEFAULT NULL,
  `MK_UPAH` float DEFAULT NULL,
  `MK_DLL` float DEFAULT NULL,
  `SP_MODAL_SENDIRI` float DEFAULT NULL,
  `SP_PINJAMAN` float DEFAULT NULL,
  `TKI_L_JUMLAH` int(11) DEFAULT NULL,
  `TKI_P_JUMLAH` int(11) DEFAULT NULL,
  `TKA_JUMLAH` int(11) DEFAULT NULL,
  `TKA_ASAL` varchar(255) DEFAULT NULL,
  `TKA_JABATAN` varchar(50) DEFAULT NULL,
  `TKA_JANGKA_WAKTU` float DEFAULT NULL,
  `DN_JENIS_PRODUK1` float DEFAULT NULL,
  `DN_JENIS_PRODUK2` float DEFAULT NULL,
  `DN_JENIS_PRODUK3` float DEFAULT NULL,
  `E_JENIS_PRODUK1` float DEFAULT NULL,
  `E_JENIS_PRODUK2` float DEFAULT NULL,
  `E_JENIS_PRODUK3` float DEFAULT NULL,
  `MERK_JENIS_PRODUK` int(11) DEFAULT NULL,
  `BBKB_DN_JUMLAH` int(11) DEFAULT NULL,
  `BBKB_DN_SATUAN` varchar(50) DEFAULT NULL,
  `BBKB_DN_ASAL` varchar(50) DEFAULT NULL,
  `BBKB_DN_HARGA` float DEFAULT NULL,
  `BBKB_DN_KETERANGAN` varchar(100) DEFAULT NULL,
  `BBKO_DN_JUMLAH` int(11) DEFAULT NULL,
  `BBKO_DN_SATUAN` varchar(50) DEFAULT NULL,
  `BBKO_DN_ASAL` varchar(50) DEFAULT NULL,
  `BBKO_DN_HARGA` float DEFAULT NULL,
  `BBKO_DN_KETERANGAN` varchar(100) DEFAULT NULL,
  `BP_DN_JUMLAH` int(11) DEFAULT NULL,
  `BP_DN_SATUAN` varchar(50) DEFAULT NULL,
  `BP_DN_ASAL` varchar(50) DEFAULT NULL,
  `BP_DN_HARGA` float DEFAULT NULL,
  `BP_DN_KETERANGAN` varchar(100) DEFAULT NULL,
  `RBB_LUAS_GUDANG` float DEFAULT NULL,
  `RBB_KAYU_OLAHAN` float DEFAULT NULL,
  `RBB_PENOLONG` float DEFAULT NULL,
  `RBB_HASIL_PRODUKSI` float DEFAULT NULL,
  `RLPLY_LOKASI` int(11) DEFAULT NULL,
  `RLPLY_LUAS` int(11) DEFAULT NULL,
  `RLPLY_PERIZINAN` int(11) DEFAULT NULL,
  `RSD1_KAPASITAS` int(11) DEFAULT NULL,
  `RSD1_JUMLAH` int(11) DEFAULT NULL,
  `RSD211_KAPASITAS` int(11) DEFAULT NULL,
  `RSD211_JUMLAH` int(11) DEFAULT NULL,
  `RSD212_KAPASITAS` int(11) DEFAULT NULL,
  `RSD212_JUMLAH` int(11) DEFAULT NULL,
  `RSD213_KAPASITAS` int(11) DEFAULT NULL,
  `RSD213_JUMLAH` int(11) DEFAULT NULL,
  `RSD22_KAPASITAS` int(11) DEFAULT NULL,
  `RSD22_JUMLAH` int(11) DEFAULT NULL,
  `RSD23_KAPASITAS` int(11) DEFAULT NULL,
  `RSD23_JUMLAH` int(11) DEFAULT NULL,
  `RPL1_VOLUME` float DEFAULT NULL,
  `RPL1_SATUAN` varchar(50) DEFAULT NULL,
  `RPL1_PENANGANAN` varchar(100) DEFAULT NULL,
  `RPL2_VOLUME` float DEFAULT NULL,
  `RPL2_SATUAN` varchar(50) DEFAULT NULL,
  `RPL2_PENANGANAN` varchar(100) DEFAULT NULL,
  `RPL3_VOLUME` float DEFAULT NULL,
  `RPL3_SATUAN` varchar(50) DEFAULT NULL,
  `RPL3_PENANGANAN` varchar(100) DEFAULT NULL,
  `RPL4_VOLUME` float DEFAULT NULL,
  `RPL4_SATUAN` varchar(50) DEFAULT NULL,
  `RPL4_PENANGANAN` varchar(100) DEFAULT NULL,
  `PENYETUJU` varchar(50) DEFAULT NULL,
  `NOMOR_SURAT` varchar(50) DEFAULT NULL,
  `TGL_TERLAMPIR` date DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IUIPHHK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of iuiphhk
-- ----------------------------
INSERT INTO `iuiphhk` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1', '1', '0000-00-00', '0000-00-00', '1', '1', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for `iuiphhk_rencana_alat`
-- ----------------------------
DROP TABLE IF EXISTS `iuiphhk_rencana_alat`;
CREATE TABLE `iuiphhk_rencana_alat` (
  `ID_RENCANA_ALAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IUIPHHK` int(11) DEFAULT NULL,
  `NAMA_ALAT` varchar(50) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `KAPASITAS` varchar(100) DEFAULT NULL,
  `MERK` varchar(100) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `NEGARA` varchar(100) DEFAULT NULL,
  `HARGA` float DEFAULT NULL,
  `JENIS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_RENCANA_ALAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of iuiphhk_rencana_alat
-- ----------------------------

-- ----------------------------
-- Table structure for `iuiphhk_rencana_produksi`
-- ----------------------------
DROP TABLE IF EXISTS `iuiphhk_rencana_produksi`;
CREATE TABLE `iuiphhk_rencana_produksi` (
  `ID_RENCANA_PRODUKSI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IUIPHHK` int(11) DEFAULT NULL,
  `JENIS_PRODUKSI` varchar(50) DEFAULT NULL,
  `KAPASITAS` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_RENCANA_PRODUKSI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of iuiphhk_rencana_produksi
-- ----------------------------

-- ----------------------------
-- Table structure for `master_ijin`
-- ----------------------------
DROP TABLE IF EXISTS `master_ijin`;
CREATE TABLE `master_ijin` (
  `ID_IJIN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_IJIN` varchar(100) DEFAULT NULL,
  `NAMA_PEJABAT` varchar(50) DEFAULT NULL,
  `NIP_PEJABAT` varchar(50) DEFAULT NULL,
  `JABATAN` varchar(75) DEFAULT NULL,
  `PANGKAT` varchar(50) DEFAULT NULL,
  `WAKTUSELESAI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_ijin
-- ----------------------------
INSERT INTO `master_ijin` VALUES ('1', 'Ijin Depo Air Minum', 'dr. Indriati As\'ad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');
INSERT INTO `master_ijin` VALUES ('2', 'Ijin Pengambilan Mineral Bukan Logam dan Batuan', 'Rachman, SE', '19570411 198503 1 010', 'Kepala Badan Pelayanan Perijinan Terpadu Dan Penanaman Modal', 'Pembina Utama Muda', '5 hari');
INSERT INTO `master_ijin` VALUES ('3', 'Ijin Usaha Jasa Titipan', 'Drs. Akhmad Suharto, M.Si', '19660910 198609 1 001', 'Kepala Dinas Perhubungan Komunikasi dan Informatika', 'Pembina Tingkat 1', '5 hari');
INSERT INTO `master_ijin` VALUES ('4', 'Ijin Usaha Jasa Konstruksi', 'Rachman, SE', '19570411 198503 1 010', 'Kepala Badan Pelayanan Perijinan Terpadu Dan Penanaman Modal', 'Pembina Utama Muda', '5 hari');
INSERT INTO `master_ijin` VALUES ('5', 'Ijin Apotek', 'dr. Indriati As\'ad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');
INSERT INTO `master_ijin` VALUES ('6', 'Ijin Trayek', 'Drs. H. Akhmad Suharto, M.Si', '19609101986091001', 'Kepala Dinas Perhubungan', 'Pembina Utama Muda (IV/c)', null);
INSERT INTO `master_ijin` VALUES ('7', 'Ijin Lokasi', 'H. A. Sofyan Hasdam', null, 'Wali Kota Bontang', null, null);
INSERT INTO `master_ijin` VALUES ('8', 'Ijin Lingkungan', 'Adi Darma', null, 'Wali Kota Bontang', null, null);
INSERT INTO `master_ijin` VALUES ('9', 'Surat Pernyataan Kesanggupan Pengelolaan dan Pemantauan Lingkungan Hidup (SPPL)', 'Pemujianto', null, 'Penanggung Jawab Kegiatan', null, null);
INSERT INTO `master_ijin` VALUES ('10', 'Surat Keterangan Kesanggupan Tata Ruang (SKTR)', 'Ir. Abdul Rifai. MT', '1963041719861022', 'Kepala Dinas Tata Ruang Kota Bontang', 'Pembina Tk 1', null);
INSERT INTO `master_ijin` VALUES ('11', 'IUIPHHK', 'Rachman, SE', '19570411 198503 1 010', 'Kepala Badan Pelayanan Perijinan Terpadu dan Penanaman Modal Kota Bontang', 'Pembina Utama Muda', null);
INSERT INTO `master_ijin` VALUES ('12', 'Izin Prinsip', 'Adi Darma', null, 'Walikota', null, null);
INSERT INTO `master_ijin` VALUES ('13', 'Izin Bongkar Trotoar', 'Rachman, SE', '19570411 198503 1 010', 'Kepala', 'Pembina Utama Muda', null);

-- ----------------------------
-- Table structure for `master_syarat`
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat`;
CREATE TABLE `master_syarat` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SYARAT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_syarat
-- ----------------------------
INSERT INTO `master_syarat` VALUES ('1', 'Permohonan ke Kepala Dinas Kesehatan Kota Bontang');
INSERT INTO `master_syarat` VALUES ('2', 'Denah Lokasi Tempat Usaha');
INSERT INTO `master_syarat` VALUES ('3', 'Fotocopy KTP Pemohon');
INSERT INTO `master_syarat` VALUES ('4', 'Surat Pernyataan dan Penunjukkan Sebagai Penanggung Jawab');
INSERT INTO `master_syarat` VALUES ('5', 'Fotocopy Sertifikat/Ijazah tenaga kerja yang memiliki pengetahuan penyehatan/Hygiene Ssanitasi Makanan');
INSERT INTO `master_syarat` VALUES ('6', 'Rekomendasi Dari Assosiasi Rumah Makan/Restoran (Bila Ada)');
INSERT INTO `master_syarat` VALUES ('7', 'KIR Kesehatan Karyawan / Surat Keterangan Sehat');
INSERT INTO `master_syarat` VALUES ('8', 'Surat Pernyataan Kesanggupan Pengelolaan Dan Pemantuan Lingkungan Hidup (SPPLH) Dinas Lingkungan Hidup');
INSERT INTO `master_syarat` VALUES ('9', 'Pas Photo 4 x 6 sebanyak 2 lembar');
INSERT INTO `master_syarat` VALUES ('10', 'Fotocopy Nomor Pokok Wajib Pajak (NPWP)');
INSERT INTO `master_syarat` VALUES ('11', 'Fotocopy Surat Ijin Tempat Usaha (SITU)');
INSERT INTO `master_syarat` VALUES ('12', 'Fotocopy Surat Ijin Usaha Perdagangan (SIUP)');
INSERT INTO `master_syarat` VALUES ('13', 'Fotocopy Surat Ijin Ordonasi Gangguan / Hinder Ordonantie (HO)');
INSERT INTO `master_syarat` VALUES ('14', 'Surat Salinan Bukti Hak Tanah');
INSERT INTO `master_syarat` VALUES ('15', 'Peta Lokasi Asli dengan Skala 1 : 1000');
INSERT INTO `master_syarat` VALUES ('16', 'Rekomendasi UKL/UPL dari Badan LH Kota Bontang');
INSERT INTO `master_syarat` VALUES ('17', 'Rekomendasi dari Dinas Perikanan Kelautan dan Pertanian jika lokasi berada di hutan lindung');
INSERT INTO `master_syarat` VALUES ('18', 'Rekomendasi dari Dinas Pekerjaan Umum jika lokasi terdapat sarana dan prasarana Pekerjaan Umum');
INSERT INTO `master_syarat` VALUES ('19', 'Fotocopy laporan produksi');
INSERT INTO `master_syarat` VALUES ('20', 'Fotocopy pembayaran Pajak');
INSERT INTO `master_syarat` VALUES ('21', 'Menyampaikan SIPUD 3 bulan sebelum berakhirnya SIPUD tersebut, apabila SIPUD masa berlakunya telah habis, maka dianggap permohonan baru');
INSERT INTO `master_syarat` VALUES ('22', 'Rekomendasi dari Kecamatan dan Kelurahan setempat');
INSERT INTO `master_syarat` VALUES ('23', 'Berkas disampaikan dalam satu rangkap');
INSERT INTO `master_syarat` VALUES ('24', 'Fotocopy Sertifikat Badan Usaha (SBU) yang dilegalisir dan menunjukkan SBU Asli');
INSERT INTO `master_syarat` VALUES ('26', 'Fotocopy Nomor Pokok Wajib Pajak (NPWP) dan PKP');
INSERT INTO `master_syarat` VALUES ('27', 'Keterangan Domisili dari Kelurahan Setempat');
INSERT INTO `master_syarat` VALUES ('28', 'Pas Foto terbaru Direktur / Pimpinan Badan Usaha 2 (dua) lembar ukuran 4x6 berwarna');
INSERT INTO `master_syarat` VALUES ('29', 'Permohonan dibuat 1 rangkap');
INSERT INTO `master_syarat` VALUES ('30', 'Permohonan ke Dinkes oleh Apoteker Penanggung Jawab');
INSERT INTO `master_syarat` VALUES ('31', 'Salinan / Fotocopy Surat Ijin Kerja Apoteker Surat Penugasan');
INSERT INTO `master_syarat` VALUES ('32', 'Fotocopy Kartu Tanda Penduduk (KTP) Pemohon/Apoteker yang masih berlaku');
INSERT INTO `master_syarat` VALUES ('33', 'Gambar Lokasi dan Denah Bangunan Apotek');
INSERT INTO `master_syarat` VALUES ('34', 'Surat Pernyataan Status Tanah/Bangunan Dalam Bentuk Akta Hak Milik / Sewa / Kontrak');
INSERT INTO `master_syarat` VALUES ('35', 'Daftar Asisten Apoteker Dengan Mencantumkan Nama, Alamat, Tanggal Lulus dan No. Surat Izin Kerja');
INSERT INTO `master_syarat` VALUES ('36', 'Daftar Terperinci Alat Perlengkapan Apotek');
INSERT INTO `master_syarat` VALUES ('37', 'Surat Pernyataan Dari Apoteker Pengelola Apotek Bahwa Tidak Bekerja Tetap Pada Perusahaan Farmasi Lain dan Tidak Menjadi Apoteker Pengelola Apotek di Apotek Lain');
INSERT INTO `master_syarat` VALUES ('38', 'Asli dan Fotocopy Surat Persetujuan Dari Atasan (Dilampirkan Bagi Pemohon Pegawai negeri Sipil, Anggota TNI/POLRI Dan Pegawai Instansi Pemerintah Lainnya)');
INSERT INTO `master_syarat` VALUES ('39', 'Fotocopy Akta Perjanjian Kerjasama Antara Pemilik Saranan Apotek Dengan Apoteker Pengelola Apotek (Dilampirkan Bila Menggunakan Saran Apotek Milik Pihak Lain)');
INSERT INTO `master_syarat` VALUES ('40', 'Surat Pernyataan Pemilik Sarana Tidak Pernah Terlibat Pelanggaran Peraturan Perundang-undangan di Bidang Obat');
INSERT INTO `master_syarat` VALUES ('41', 'Rekomendasi Dari Organisasi Profesi (ISFO)');
INSERT INTO `master_syarat` VALUES ('42', 'Profil pendirian Apotek');
INSERT INTO `master_syarat` VALUES ('43', 'Rekomendasi Laik Sehat Dari PL Dinkes');
INSERT INTO `master_syarat` VALUES ('44', 'Surat Pernyataan Kesanggupan Pengelollan Dan Pemantauan Lingkungan Hidup (SPPLH) Dinas Lingkungan Hidup');
INSERT INTO `master_syarat` VALUES ('45', 'Surat Pernyataan Tunduk Pada Peraturan Yang Berlaku');
INSERT INTO `master_syarat` VALUES ('46', 'Foto 4 x 6 , 3 (tiga) Lembar');
INSERT INTO `master_syarat` VALUES ('47', 'Fotocopy KTP Bontang yang Masih Berlaku');
INSERT INTO `master_syarat` VALUES ('48', 'Rekomendasi dari kelurahan / kecamatan setempat');
INSERT INTO `master_syarat` VALUES ('49', 'Fotocopy Akte Pendirian Perusahaan');
INSERT INTO `master_syarat` VALUES ('50', 'Peta / Denah Lokasi');
INSERT INTO `master_syarat` VALUES ('51', 'Lembar Sertifikasi Perangkat yang Digunakan');
INSERT INTO `master_syarat` VALUES ('52', 'Fotocopy Surat Izin Penyelenggaraan Jasa Titipan (SIPJT) Kantor Pusat');
INSERT INTO `master_syarat` VALUES ('53', 'Foto Copy Ijin Usaha Angkutan');
INSERT INTO `master_syarat` VALUES ('54', 'Foto Copy STNK');
INSERT INTO `master_syarat` VALUES ('55', 'Foto Copy Buku Uji Kendaraan');
INSERT INTO `master_syarat` VALUES ('56', 'Rekomendasi Persetujuan Ijin Trayek ari Dinas Perhubungan Komunikasi da Informatika Kota Bontang');
INSERT INTO `master_syarat` VALUES ('57', 'Surat Pengantar dari Perusahaan');
INSERT INTO `master_syarat` VALUES ('58', 'Mengisi formulir permohonan');
INSERT INTO `master_syarat` VALUES ('59', 'Foto Copy Akta Pendirian Perusahaan (Akta Perubahan, Akta Pendirian Cabang apabila ada)');
INSERT INTO `master_syarat` VALUES ('60', 'Foto Copy NPWP Perusahaan');
INSERT INTO `master_syarat` VALUES ('61', 'Surat Persetujuan Prinsip dari Pemerintah Kota Bontang Tanda Keanggotaan REI (bagi pembangunan perumahan)');
INSERT INTO `master_syarat` VALUES ('62', 'Uraian Rencana Kegiatan Pembangunan / Proyek Proposal');
INSERT INTO `master_syarat` VALUES ('63', 'Surat Persetujuan Penanaman Modal dari Badan Koordinasi Penanaman Modal (apabila ada)');
INSERT INTO `master_syarat` VALUES ('64', 'Pernyataan kesanggupan dan memberikan ganti rugi dari atau menyediakan tempat penampungan bagi pemilik tanah yang berhak atas tanah');
INSERT INTO `master_syarat` VALUES ('65', 'Gambar Teknik Bangunan');
INSERT INTO `master_syarat` VALUES ('66', 'Format isian diisi dengan huruf besar / kapital');
INSERT INTO `master_syarat` VALUES ('67', 'dokumen AMDAL / Dokumen UKL-UPL');
INSERT INTO `master_syarat` VALUES ('68', 'Fotokopi dokumen pendirian usaha (akta notaris)');
INSERT INTO `master_syarat` VALUES ('69', 'Fotokopi perizinan yang telah dimiliki');
INSERT INTO `master_syarat` VALUES ('70', 'Profil usaha dan / atau kegiatan');
INSERT INTO `master_syarat` VALUES ('71', 'Surat Pernyataan persetujuan SPPL');
INSERT INTO `master_syarat` VALUES ('72', 'Foto kopi surat legalisir tanah');
INSERT INTO `master_syarat` VALUES ('73', 'Foto kopi Surat rekomendasi IMB dari kelurahan');
INSERT INTO `master_syarat` VALUES ('74', 'IMB');
INSERT INTO `master_syarat` VALUES ('75', 'HO lama (untuk perpanjangan HO)');
INSERT INTO `master_syarat` VALUES ('76', 'Foto kopi surat keterangan kesesuaian tata ruang dari Dinas Tata Ruang Kota Bontang');
INSERT INTO `master_syarat` VALUES ('77', 'Denah Lokasi');
INSERT INTO `master_syarat` VALUES ('78', 'Gambar Teknis');
INSERT INTO `master_syarat` VALUES ('79', 'Layout ruang usaha');
INSERT INTO `master_syarat` VALUES ('80', 'Foto kopi surat tidak keberatan tetangga');
INSERT INTO `master_syarat` VALUES ('81', 'Identitas Pemohon / Kartu Tanda Penduduk');
INSERT INTO `master_syarat` VALUES ('82', 'Fotocopy Legalitas Tanah (minimal PPAT) DAN Pajak Bumi dan Bangunan');
INSERT INTO `master_syarat` VALUES ('83', 'Surat Rekomendasi Kelurahan');
INSERT INTO `master_syarat` VALUES ('84', 'Gambar Site Plan Lokasi Bangunan dan Gambar Teknik Bangunan');
INSERT INTO `master_syarat` VALUES ('85', 'Persetujuan warga sekitar sampai jarak radius 100 meter (khusu untuk permohonan walet)');
INSERT INTO `master_syarat` VALUES ('86', 'Mengisi daftar isian permohonan');
INSERT INTO `master_syarat` VALUES ('87', 'Fotokopy Akta Pendirian Perusahaan / Koperasi yang tela isahkan oleh pejabat yang berwenang beserta perubahannya');
INSERT INTO `master_syarat` VALUES ('88', 'Fotokopy Nomor Pokok Wajib Pajak');
INSERT INTO `master_syarat` VALUES ('89', 'Fotokopy Izin Mendirikan Bangunan (IMB)');
INSERT INTO `master_syarat` VALUES ('90', 'Fotokopy Izin Gangguan SITU / HO');
INSERT INTO `master_syarat` VALUES ('91', 'Fotokopy Dokumen Upaya Pengelolaan Lingkungan (UKL) dan Upaya Pemantauan Lingkungan (UPL) sesuai peraturan perundang - undangan');
INSERT INTO `master_syarat` VALUES ('92', 'Fotokopy Jaminan Pasokan Bahan Baku');
INSERT INTO `master_syarat` VALUES ('93', 'Rekomendasi dari Instansi yang membidangi (Kehutanan dan Kelautan)');
INSERT INTO `master_syarat` VALUES ('94', 'Foto Copy KTP yang masih berlaku');
INSERT INTO `master_syarat` VALUES ('95', 'Surat Pemohon');
INSERT INTO `master_syarat` VALUES ('96', 'Gambar Lokasi yang dimohon');
INSERT INTO `master_syarat` VALUES ('97', 'Sket Lokasi');
INSERT INTO `master_syarat` VALUES ('98', 'Foto Copy SIUP, TDP, dan NPWP Perusahaan');
INSERT INTO `master_syarat` VALUES ('99', 'Foto Copy KTP pemohon / penanggung jawab');
INSERT INTO `master_syarat` VALUES ('100', 'Rekomendasi Camat Setempat');
INSERT INTO `master_syarat` VALUES ('101', 'Pas Foto warna 3x4 sebanyak 4 buah');
INSERT INTO `master_syarat` VALUES ('102', 'Gambar Teknis, meliputi : Gambar Konstruksi, Peta Lokasi, Denah Bangunan, Tampak Bangunan / Potongan, Grounding');
INSERT INTO `master_syarat` VALUES ('103', 'Perhitungan dan hasil penyelidikan tanah (sondir) yang disyahkan oleh laboratorium terakreditasi');
INSERT INTO `master_syarat` VALUES ('104', 'Surat Keterangan Tanah');
INSERT INTO `master_syarat` VALUES ('105', 'Rencana Anggaran Biaya (RAB)');
INSERT INTO `master_syarat` VALUES ('106', 'Surat persetujuan dari warga si sekitar lokasi menara telekomunikasi dalam radius 1.25 (satu koma\r\ndua lima) kali tinggi menara dan diketahui oleh kepala keiurahan/desa dan camat setempat');

-- ----------------------------
-- Table structure for `master_user`
-- ----------------------------
DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `USER` varchar(100) DEFAULT NULL,
  `PASS` varchar(100) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `NIP` varchar(100) DEFAULT NULL,
  `TELP` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ID_HAK` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('1', 'nvl', 'nvl', 'Noval', '19991011010101', '0316060000', 'nvl@yahoo.com', '1');
INSERT INTO `master_user` VALUES ('2', 'fo', 'fo', 'Front Office', null, '031888888', 'fo@yahoo.com', '2');

-- ----------------------------
-- Table structure for `m_pemohon`
-- ----------------------------
DROP TABLE IF EXISTS `m_pemohon`;
CREATE TABLE `m_pemohon` (
  `pemohon_id` int(11) NOT NULL AUTO_INCREMENT,
  `pemohon_nama` varchar(50) DEFAULT NULL,
  `pemohon_alamat` varchar(100) DEFAULT NULL,
  `pemohon_telp` varchar(20) DEFAULT NULL,
  `pemohon_npwp` varchar(50) DEFAULT NULL,
  `pemohon_rt` int(5) DEFAULT NULL,
  `pemohon_rw` int(5) DEFAULT NULL,
  `pemohon_kel` varchar(50) DEFAULT NULL,
  `pemohon_kec` varchar(50) DEFAULT NULL,
  `pemohon_kota` varchar(50) DEFAULT NULL,
  `pemohon_nik` varchar(20) DEFAULT NULL,
  `pemohon_stra` varchar(50) DEFAULT NULL,
  `pemohon_surattugas` varchar(50) DEFAULT NULL,
  `pemohon_pekerjaan` varchar(50) DEFAULT NULL,
  `pemohon_tempatlahir` varchar(50) DEFAULT NULL,
  `pemohon_tanggallahir` date DEFAULT NULL,
  `pemohon_user_id` int(11) DEFAULT NULL,
  `pemohon_pendidikan` varchar(50) DEFAULT NULL,
  `pemohon_tahunlulus` int(5) DEFAULT NULL,
  `pemohon_wn` varchar(50) DEFAULT NULL,
  `pemohon_hp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pemohon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_pemohon
-- ----------------------------
INSERT INTO `m_pemohon` VALUES ('1', 'Noval Debby Prasetyono', 'Lidah Kulon', '031606888', '1/NPWP/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '357818000001', '1/STRA/2013', '1/ST/2013', 'Programmer', 'Surabaya', '1994-12-07', '1', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('8', 'nama', 'alamat', '031', 'npwp', '5', '5', 'kel', 'kec', null, '123123', 'stra', 'st', 'pekerjaan', 'sby', '2013-12-21', '2', 'pend', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('10', 'Zulmi Adi Rizki', 'Wonocolo', '085258130813', '2/NPWP/2013', '1', '5', '12', '12', null, '131231232131', '12', '12', '12', '12', '2013-12-25', '2', '12', '0', null, null);
INSERT INTO `m_pemohon` VALUES ('20', 'Budi', 'Cempaka Permai', '0889839399', null, null, null, null, null, null, '423423423432', null, null, null, null, null, '2', null, null, null, null);

-- ----------------------------
-- Table structure for `m_perlengkapan_apotek`
-- ----------------------------
DROP TABLE IF EXISTS `m_perlengkapan_apotek`;
CREATE TABLE `m_perlengkapan_apotek` (
  `perlengkapan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perlengkapan_order` int(11) DEFAULT NULL,
  `perlengkapan_group` int(11) DEFAULT NULL,
  `perlengkapan_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`perlengkapan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_perlengkapan_apotek
-- ----------------------------

-- ----------------------------
-- Table structure for `nosk`
-- ----------------------------
DROP TABLE IF EXISTS `nosk`;
CREATE TABLE `nosk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  `ijin` varchar(100) DEFAULT NULL,
  `format` varchar(40) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nosk
-- ----------------------------
INSERT INTO `nosk` VALUES ('1', '2008', 'galian', '503/xC/KPT/xB/xT ', '4');
INSERT INTO `nosk` VALUES ('2', '2008', 'reklame', '503/xC/BPPM/REK/xB/xT', '13');
INSERT INTO `nosk` VALUES ('3', '2008', 'IMB', '640/0xC/BPPM/xB/xT', '21');
INSERT INTO `nosk` VALUES ('4', '2008', 'SIUP KECIL', '503/xC/BPPM/SIUP-K/xB/xT', '4');
INSERT INTO `nosk` VALUES ('5', '2008', 'SIUP MENENGAH', '503/xC/BPPM/SIUP-M/xB/xT', '1');
INSERT INTO `nosk` VALUES ('6', '2008', 'SIUP BESAR', '503/xC/BPPM/SIUP-B/xB/xT', '0');
INSERT INTO `nosk` VALUES ('7', '2008', 'Hiburan', 'xC/HIB/xB/xT', '2');
INSERT INTO `nosk` VALUES ('8', '2008', 'Lokasi', '503/xC/KOTA-B/xB/xT', '1');
INSERT INTO `nosk` VALUES ('9', '2008', 'ho', '503/xC/BPPM/HO/xB/xT', '57');
INSERT INTO `nosk` VALUES ('10', '2008', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '2');
INSERT INTO `nosk` VALUES ('11', '2009', 'galian', '540/xC/BPPM/xB/xT ', '2');
INSERT INTO `nosk` VALUES ('12', '2009', 'IMB', '640/xC/BPPM/IMB/xB/xT', '364');
INSERT INTO `nosk` VALUES ('13', '2009', 'ho', '503/xC/BPPM/HO/xB/xT', '5242');
INSERT INTO `nosk` VALUES ('14', '2009', 'reklame', '503/xC/BPPM/REK/xB/xT', '406');
INSERT INTO `nosk` VALUES ('15', '2009', 'SIUP KECIL', 'xC/SIUP-K/xB/xT', '376');
INSERT INTO `nosk` VALUES ('16', '2009', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '2');
INSERT INTO `nosk` VALUES ('17', '2009', 'Hiburan', 'xC/HIB/xB/xT', '2');
INSERT INTO `nosk` VALUES ('18', '2009', 'SIUP MENENGAH', 'xC/SIUP-M/xB/xT', '78');
INSERT INTO `nosk` VALUES ('19', '2009', 'Utilitas', '503/xC/BPPM/UTI/xB/xT', '1');
INSERT INTO `nosk` VALUES ('20', '2009', 'SIUP BESAR', 'xC/SIUP-B/xB/xT', '60');
INSERT INTO `nosk` VALUES ('21', '2010', 'imb', '640/xC/BPPM/IMB/xB/xT', '332');
INSERT INTO `nosk` VALUES ('22', '2010', 'ho', '503/xC/BPPM/HO/xB/xT', '517');
INSERT INTO `nosk` VALUES ('23', '2010', 'SIUP KECIL', 'xC/SIUP-K/xB/xT', '237');
INSERT INTO `nosk` VALUES ('24', '2010', 'SIUP BESAR', 'xC/SIUP-B/xB/xT', '85');
INSERT INTO `nosk` VALUES ('25', '2010', 'SIUP MENENGAH', 'xC/SIUP-M/xB/xT', '80');
INSERT INTO `nosk` VALUES ('26', '2010', 'reklame', '503/xC/BPPM/REK/xB/xT', '128');
INSERT INTO `nosk` VALUES ('27', '2010', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '4');
INSERT INTO `nosk` VALUES ('28', '2010', 'Hiburan', 'xC/HIB/xB/xT', '1');
INSERT INTO `nosk` VALUES ('29', '2010', 'Utilitas', '503/xC/BPPM/UTILITAS/xB/xT', '3');
INSERT INTO `nosk` VALUES ('30', '2011', 'ho', '503/xC/BPPM/HO/xB/xT', '626');
INSERT INTO `nosk` VALUES ('31', '2011', 'imb', '640/xC/BPPM/IMB/xB/xT', '341');
INSERT INTO `nosk` VALUES ('32', '2011', 'SIUP KECIL', 'xC/SIUP-K/xB/xT', '283');
INSERT INTO `nosk` VALUES ('33', '2011', 'SIUP BESAR', 'xC/SIUP-B/xB/xT', '81');
INSERT INTO `nosk` VALUES ('34', '2011', 'SIUP MENENGAH', 'xC/SIUP-M/xB/xT', '93');
INSERT INTO `nosk` VALUES ('35', '2011', 'reklame', '503/xC/BPPM/REK/xB/xT', '30');
INSERT INTO `nosk` VALUES ('36', '2011', 'galian', '540/xC/BPPM/xB/xT ', '1');
INSERT INTO `nosk` VALUES ('37', '2011', 'Hiburan', '503/00xC/HIB/BPPM/xB/xT', '3');
INSERT INTO `nosk` VALUES ('38', '2011', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '3');
INSERT INTO `nosk` VALUES ('39', '2012', 'imb', '640/xC/BPPM/IMB/xB/xT', '464');
INSERT INTO `nosk` VALUES ('40', '2012', 'SIUP KECIL', 'xC/SIUP-K/xB/xT', '335');
INSERT INTO `nosk` VALUES ('41', '2012', 'ho', '503/xC/BPPM/HO/xB/xT', '698');
INSERT INTO `nosk` VALUES ('42', '2012', 'Utilitas', '503/xC/BPPM/UTILITAS/xB/xT', '2');
INSERT INTO `nosk` VALUES ('43', '2012', 'SIUP MENENGAH', 'xC/SIUP-M/xB/xT', '101');
INSERT INTO `nosk` VALUES ('44', '2012', 'SIUP BESAR', 'xC/SIUP-B/xB/xT', '71');
INSERT INTO `nosk` VALUES ('45', '2012', 'reklame', '503/xC/BPPM/REK/xB/xT', '19');
INSERT INTO `nosk` VALUES ('46', '2012', 'Hiburan', '503/00xC/HIB/BPPM/xB/xT', '10');
INSERT INTO `nosk` VALUES ('47', '2012', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '2');
INSERT INTO `nosk` VALUES ('48', '2012', 'iao', '503/xC/BPPM/IAO/xB/xT', '2');
INSERT INTO `nosk` VALUES ('49', '2012', 'iab', '503/xC/BPPM/IAB/xB/xT', '4');
INSERT INTO `nosk` VALUES ('50', '2012', 'ihhk', '503/xC/BPPM/IHHK/xB/xT', '0');
INSERT INTO `nosk` VALUES ('51', '2012', 'iplc', '503/xC/BPPM/IPLC/xB/xT', '3');
INSERT INTO `nosk` VALUES ('52', '2012', 'isip', '503/xC/BPPM/ISIP/xB/xT', '4');
INSERT INTO `nosk` VALUES ('53', '2012', 'isipa', '503/xC/BPPM/SIPA/xB/xT', '1');
INSERT INTO `nosk` VALUES ('54', '2012', 'itr', '503/xC/TRA/BPPM/xB/xT', '522');
INSERT INTO `nosk` VALUES ('55', '2012', 'iusbw', '503/xC/BPPM/IUSBW/xB/xT', '2');
INSERT INTO `nosk` VALUES ('56', '2012', '$ijin', '', '0');
INSERT INTO `nosk` VALUES ('57', '2012', 'SIUP MIKRO', 'xC/SIUP-Mi/xB/xT', '0');
INSERT INTO `nosk` VALUES ('58', '2013', 'ho', '503/xC/BPPM/HO/xB/xT', '286');
INSERT INTO `nosk` VALUES ('59', '2013', 'imb', '640/xC/BPPM/IMB/xB/xT', '232');
INSERT INTO `nosk` VALUES ('60', '2013', 'SIUP KECIL', 'xC/SIUP-K/xB/xT', '159');
INSERT INTO `nosk` VALUES ('61', '2013', 'SIUP BESAR', 'xC/SIUP-B/xB/xT', '11');
INSERT INTO `nosk` VALUES ('62', '2013', 'SIUP MENENGAH', 'xC/SIUP-M/xB/xT', '40');
INSERT INTO `nosk` VALUES ('63', '2013', 'reklame', '503/xC/BPPM/REK/xB/xT', '10');
INSERT INTO `nosk` VALUES ('64', '2013', 'SIUP MIKRO', 'xC/SIUP-Mi/xB/xT', '1');
INSERT INTO `nosk` VALUES ('65', '2013', 'Hiburan', '503/00xC/HIB/BPPM/xB/xT', '3');
INSERT INTO `nosk` VALUES ('66', '2013', 'wisata', '556.1/xC/BPPM-BTG/xB/xT', '1');
INSERT INTO `nosk` VALUES ('67', '2013', 'iplc', '503/xC/BPPM/IPLC/xB/xT', '1');
INSERT INTO `nosk` VALUES ('68', '2013', 'galian', '540/xC/BPPM/xB/xT ', '1');

-- ----------------------------
-- Table structure for `sktr`
-- ----------------------------
DROP TABLE IF EXISTS `sktr`;
CREATE TABLE `sktr` (
  `ID_SKTR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `HAK_MILIK` int(11) DEFAULT NULL,
  `NAMA_PEMILIK` varchar(50) DEFAULT NULL,
  `NO_SURAT_TANAH` varchar(100) DEFAULT NULL,
  `BATAS_KIRI` varchar(100) DEFAULT NULL,
  `BATAS_KANAN` varchar(100) DEFAULT NULL,
  `BATAS_DEPAN` varchar(100) DEFAULT NULL,
  `BATAS_BELAKANG` varchar(100) DEFAULT NULL,
  `FUNGSI` varchar(100) DEFAULT NULL,
  `ALAMAT_BANGUNAN` varchar(100) DEFAULT NULL,
  `TINGGI_BANGUNAN` float DEFAULT NULL,
  `LUAS_PERSIL` float DEFAULT NULL,
  `LUAS_BANGUNAN` float DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_SKTR`),
  KEY `FK_PEMOHON_SKTR` (`ID_PEMOHON`),
  CONSTRAINT `FK_PEMOHON_SKTR` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sktr
-- ----------------------------
INSERT INTO `sktr` VALUES ('26', '10', '1', null, null, '0', 'Zulmi', '9892729272', 'Rumah', 'Rumah', 'Taman', 'Taman', 'Usaha', 'Wonocolo', '20', '80', '60', '1', '1', '2013-12-27', null, '2018-12-24');
INSERT INTO `sktr` VALUES ('27', '10', '2', null, null, '0', 'Zulmi', '9892729272', 'Rumah', 'Rumah', 'Taman', 'Taman', 'Usaha', 'Wonocolo', '20', '80', '60', '1', '1', '2013-12-28', null, '2018-12-31');

-- ----------------------------
-- Table structure for `sppl`
-- ----------------------------
DROP TABLE IF EXISTS `sppl`;
CREATE TABLE `sppl` (
  `ID_SPPL` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `NAMA_USAHA` varchar(50) DEFAULT NULL,
  `PENANGGUNG_JAWAB` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `JENIS_USAHA` varchar(100) DEFAULT NULL,
  `ALAMAT_USAHA` varchar(100) DEFAULT NULL,
  `STATUS_LAHAN` int(11) DEFAULT NULL,
  `NO_AKTA` varchar(100) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `MULAI_KEGIATAN` date DEFAULT NULL,
  `LUAS_LAHAN` float DEFAULT NULL,
  `LUAS_TAPAK_BANGUNAN` float DEFAULT NULL,
  `LUAS_KEGIATAN` float DEFAULT NULL,
  `LUAS_PARKIR` float DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_SPPL`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sppl
-- ----------------------------
INSERT INTO `sppl` VALUES ('7', '1', '9', null, null, 'asd', 'asd', '123', 'asd', 'asd', '1', '123', '2009-10-07', '2013-12-04', '123', '123', '123', '123', null, null, '2013-12-26', null, null);
INSERT INTO `sppl` VALUES ('8', '1', '10', null, null, 'UsahaKU', 'Zulmi Adi Rizki', '088882892892', 'asd', 'asd', '1', '123123', '2013-12-21', '2013-12-20', '123', '123', '123', '123', null, null, '2013-12-26', null, null);
INSERT INTO `sppl` VALUES ('9', '1', '10', '', null, 'asd', 'asd', 'asd', 'asd', 'asd', '1', 'asd', '2009-08-05', '2010-03-16', '12', '12', '12', '12', '1', '0', '2013-12-26', null, '2013-12-31');
INSERT INTO `sppl` VALUES ('10', '1', '10', '', null, 'Berdikari Mandiri', 'Budi', '0898393838383', 'Usaha', 'Cempaka Permai', '1', '89893 9 383 98903', '2013-12-17', '2013-12-04', '12', '12', '12', '12', '0', '0', '2013-12-26', null, '2018-06-26');
INSERT INTO `sppl` VALUES ('11', '0', '10', '', null, 'Berdikari Mandiri', 'Budi', '0898393838383', 'Usaha', 'Cempaka Permai', '1', '89893 9 383 98903', '2013-12-17', '2013-12-04', '12', '12', '12', '12', '1', '1', '2013-12-30', null, '2013-12-31');

-- ----------------------------
-- Table structure for `trayek`
-- ----------------------------
DROP TABLE IF EXISTS `trayek`;
CREATE TABLE `trayek` (
  `ID_TRAYEK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TRAYEK_INTI` int(11) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `KODE_TRAYEK` varchar(50) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NOMOR_UB` varchar(50) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_AWAL` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TRAYEK`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of trayek
-- ----------------------------
INSERT INTO `trayek` VALUES ('2', '3', '1', 'asd', null, 'asd', '2013-12-31', null, '2013-12-06', '1', '1');
INSERT INTO `trayek` VALUES ('3', '4', '1', null, null, null, '2013-12-30', null, '0000-00-00', null, null);

-- ----------------------------
-- Table structure for `trayek_inti`
-- ----------------------------
DROP TABLE IF EXISTS `trayek_inti`;
CREATE TABLE `trayek_inti` (
  `ID_TRAYEK_INTI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NOMOR_KENDARAAN` varchar(20) DEFAULT NULL,
  `NAMA_PEMILIK` varchar(50) DEFAULT NULL,
  `ALAMAT_PEMILIK` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(20) DEFAULT NULL,
  `NOMOR_RANGKA` varchar(50) DEFAULT NULL,
  `NOMOR_MESIN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TRAYEK_INTI`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of trayek_inti
-- ----------------------------
INSERT INTO `trayek_inti` VALUES ('3', '20', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `trayek_inti` VALUES ('4', '20', 'Perusahaan', 'L 3827 KL', 'Bejo', 'Wonogiri', '09879373937', '9907 90 892 323 ', '370 80 273 9832');

-- ----------------------------
-- Table structure for `trotoar`
-- ----------------------------
DROP TABLE IF EXISTS `trotoar`;
CREATE TABLE `trotoar` (
  `ID_TROTOAR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PEMOHON` int(11) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NO_SK_LAMA` varchar(50) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `PERUNTUKAN` varchar(50) DEFAULT NULL,
  `ALAMAT_LOKASI` varchar(100) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_TROTOAR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trotoar
-- ----------------------------
INSERT INTO `trotoar` VALUES ('1', '1', '1', '1', '1', 'asd', 'asd', 'asd', 'asd', '0000-00-00', '0000-00-00', '2014-01-29', '1', '1');
INSERT INTO `trotoar` VALUES ('2', '10', '2', '', '1', 'ada', 'ada', 'ada', 'ada', '0000-00-00', '0000-00-00', '2014-01-17', '0', '0');
INSERT INTO `trotoar` VALUES ('3', '20', '2', '', '2', 'Mandiri Utama', 'Jl Bekisar', 'Pembangunan reklame', 'Jl Ambengan', '0000-00-00', '0000-00-00', '2015-12-31', '1', '1');

-- ----------------------------
-- Table structure for `t_apotek`
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek`;
CREATE TABLE `t_apotek` (
  `apotek_id` int(11) NOT NULL AUTO_INCREMENT,
  `apotek_nama` varchar(50) DEFAULT NULL,
  `apotek_alamat` varchar(100) DEFAULT NULL,
  `apotek_telp` varchar(20) DEFAULT NULL,
  `apotek_kel` varchar(50) DEFAULT NULL,
  `apotek_kec` varchar(50) DEFAULT NULL,
  `apotek_kepemilikan` int(1) DEFAULT NULL,
  `apotek_pemilik` varchar(50) DEFAULT NULL,
  `apotek_pemilikalamat` varchar(100) DEFAULT NULL,
  `apotek_pemiliknpwp` varchar(50) DEFAULT NULL,
  `apotek_siup` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`apotek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek
-- ----------------------------

-- ----------------------------
-- Table structure for `t_apotek_asisten`
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_asisten`;
CREATE TABLE `t_apotek_asisten` (
  `asisten_id` int(11) NOT NULL AUTO_INCREMENT,
  `asisten_apotek_id` int(11) DEFAULT NULL,
  `asisten_apotekdet_id` int(11) DEFAULT NULL,
  `asisten_nama` varchar(50) DEFAULT NULL,
  `asisten_sik` varchar(50) DEFAULT NULL,
  `asisten_lulus` date DEFAULT NULL,
  `asisten_alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`asisten_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_asisten
-- ----------------------------

-- ----------------------------
-- Table structure for `t_apotek_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_ceklist`;
CREATE TABLE `t_apotek_ceklist` (
  `apotek_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `apotek_cek_apotek_id` int(11) DEFAULT NULL,
  `apotek_cek_apotekdet_id` int(11) DEFAULT NULL,
  `apotek_cek_syarat_id` int(11) DEFAULT NULL,
  `apotek_cek_status` int(1) DEFAULT NULL,
  `apotek_cek_keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`apotek_cek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_apotek_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_det`;
CREATE TABLE `t_apotek_det` (
  `det_apotek_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_apotek_apotek_id` int(11) DEFAULT NULL,
  `det_apotek_jenis` int(1) DEFAULT NULL,
  `det_apotek_tanggal` date DEFAULT NULL,
  `det_apotek_pemohon_id` int(11) DEFAULT NULL,
  `det_apotek_surveylulus` int(1) DEFAULT NULL,
  `det_apotek_terima` varchar(50) DEFAULT NULL,
  `det_apotek_terimatanggal` date DEFAULT NULL,
  `det_apotek_kelengkapan` int(1) DEFAULT NULL,
  `det_apotek_bap` varchar(50) DEFAULT NULL,
  `det_apotek_baptanggal` date DEFAULT NULL,
  `det_apotek_keputusan` int(1) DEFAULT NULL,
  `det_apotek_keterangan` varchar(255) DEFAULT NULL,
  `det_apotek_jarak` int(11) DEFAULT NULL,
  `det_apotek_rracik` int(1) DEFAULT NULL,
  `det_apotek_radmin` int(1) DEFAULT NULL,
  `det_apotek_rkerja` int(1) DEFAULT NULL,
  `det_apotek_rtunggu` int(1) DEFAULT NULL,
  `det_apotek_rwc` int(1) DEFAULT NULL,
  `det_apotek_air` varchar(20) DEFAULT NULL,
  `det_apotek_listrik` varchar(20) DEFAULT NULL,
  `det_apotek_apk` int(11) DEFAULT NULL,
  `det_apotek_apkukuran` varchar(20) DEFAULT NULL,
  `det_apotek_jendela` int(11) DEFAULT NULL,
  `det_apotek_limbah` int(1) DEFAULT NULL,
  `det_apotek_baksampah` int(1) DEFAULT NULL,
  `det_apotek_parkir` int(1) DEFAULT NULL,
  `det_apotek_papannama` int(1) DEFAULT NULL,
  `det_apotek_pengelola` int(3) DEFAULT NULL,
  `det_apotek_pendamping` int(3) DEFAULT NULL,
  `det_apotek_asisten` int(3) DEFAULT NULL,
  `det_apotek_luas` int(11) DEFAULT NULL,
  `det_apotek_statustanah` int(1) DEFAULT NULL,
  `det_apotek_sewalama` int(11) DEFAULT NULL,
  `det_apotek_sewaawal` date DEFAULT NULL,
  `det_apotek_sewaakhir` date DEFAULT NULL,
  `det_apotek_shnomor` varchar(50) DEFAULT NULL,
  `det_apotek_shtahun` int(4) DEFAULT NULL,
  `det_apotek_shgssu` varchar(50) DEFAULT NULL,
  `det_apotek_shtanggal` date DEFAULT NULL,
  `det_apotek_shan` varchar(50) DEFAULT NULL,
  `det_apotek_aktano` varchar(50) DEFAULT NULL,
  `det_apotek_aktatahun` int(4) DEFAULT NULL,
  `det_apotek_aktanotaris` varchar(50) DEFAULT NULL,
  `det_apotek_aktaan` varchar(50) DEFAULT NULL,
  `det_apotek_ckutipan` varchar(255) DEFAULT NULL,
  `det_apotek_ckec` varchar(50) DEFAULT NULL,
  `det_apotek_ctanggal` date DEFAULT NULL,
  `det_apotek_cpetok` varchar(50) DEFAULT NULL,
  `det_apotek_cpersil` varchar(50) DEFAULT NULL,
  `det_apotek_ckelas` varchar(50) DEFAULT NULL,
  `det_apotek_can` varchar(50) DEFAULT NULL,
  `det_apotek_sppihak1` varchar(50) DEFAULT NULL,
  `det_apotek_sppihak2` varchar(50) DEFAULT NULL,
  `det_apotek_spnomor` varchar(50) DEFAULT NULL,
  `det_apotek_sptanggal` date DEFAULT NULL,
  `det_apotek_notaris` varchar(50) DEFAULT NULL,
  `det_apotek_sk` varchar(50) DEFAULT NULL,
  `det_apotek_berlaku` date DEFAULT NULL,
  `det_apotek_kadaluarsa` date DEFAULT NULL,
  `det_apotek_proses` varchar(50) DEFAULT NULL,
  `det_apotek_perihal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`det_apotek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_apotek_ket`
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_ket`;
CREATE TABLE `t_apotek_ket` (
  `apotek_ket_id` int(11) NOT NULL AUTO_INCREMENT,
  `apotek_ket_apotek_id` int(11) DEFAULT NULL,
  `apotek_ket_detapotek_id` int(11) DEFAULT NULL,
  `apotek_ket_perlengkapanid` int(11) DEFAULT NULL,
  `apotek_ket_status` int(11) DEFAULT NULL,
  `apotek_ket_jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`apotek_ket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_ket
-- ----------------------------

-- ----------------------------
-- Table structure for `t_idam`
-- ----------------------------
DROP TABLE IF EXISTS `t_idam`;
CREATE TABLE `t_idam` (
  `idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `idam_usaha` varchar(50) DEFAULT NULL,
  `idam_jenisusaha` varchar(50) DEFAULT NULL,
  `idam_alamat` varchar(100) DEFAULT NULL,
  `idam_sertifikatpkp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam
-- ----------------------------
INSERT INTO `t_idam` VALUES ('2', 'asd', 'asd', 'asd', 'asd');
INSERT INTO `t_idam` VALUES ('3', '123', '123', '132', '123');
INSERT INTO `t_idam` VALUES ('4', '123', '123', '123', '123');
INSERT INTO `t_idam` VALUES ('5', 'qwe', 'qwe', 'qwe', 'qwe');

-- ----------------------------
-- Table structure for `t_idam_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_idam_ceklist`;
CREATE TABLE `t_idam_ceklist` (
  `idam_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `idam_cek_syarat_id` int(11) DEFAULT NULL,
  `idam_cek_idamdet_id` int(11) DEFAULT NULL,
  `idam_cek_idam_id` int(11) DEFAULT NULL,
  `idam_cek_status` int(1) DEFAULT NULL,
  `idam_cek_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idam_cek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_ceklist
-- ----------------------------
INSERT INTO `t_idam_ceklist` VALUES ('10', '1', '2', '2', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('11', '2', '2', '2', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('12', '3', '2', '2', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('13', '4', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('14', '5', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('15', '6', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('16', '7', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('17', '8', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('18', '9', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('19', '1', '3', '3', '0', '123');
INSERT INTO `t_idam_ceklist` VALUES ('20', '2', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('21', '3', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('22', '4', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('23', '5', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('24', '6', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('25', '7', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('26', '8', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('27', '9', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('28', '1', '4', '5', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('29', '2', '4', '5', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('30', '3', '4', '5', '0', 'ada');
INSERT INTO `t_idam_ceklist` VALUES ('31', '4', '4', '5', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('32', '5', '4', '5', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('33', '6', '4', '5', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('34', '7', '4', '5', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('35', '8', '4', '5', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('36', '9', '4', '5', '0', '');

-- ----------------------------
-- Table structure for `t_idam_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_idam_det`;
CREATE TABLE `t_idam_det` (
  `det_idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_idam_idam_id` int(11) DEFAULT NULL,
  `det_idam_jenis` int(1) DEFAULT NULL COMMENT '1=baru;2=perpanjangan',
  `det_idam_tanggal` date DEFAULT NULL COMMENT 'tanggal perijinan',
  `det_idam_pemohon_id` int(11) DEFAULT NULL,
  `det_idam_nomorreg` varchar(50) DEFAULT NULL,
  `det_idam_status` varchar(50) DEFAULT NULL COMMENT 'status perijinan',
  `det_idam_keterangan` varchar(255) DEFAULT NULL COMMENT 'keterangan penerimaan berkas',
  `det_idam_bap` varchar(50) DEFAULT NULL,
  `det_idam_baptanggal` date DEFAULT NULL,
  `det_idam_kelengkapan` int(1) DEFAULT NULL,
  `det_idam_terima` varchar(50) DEFAULT NULL COMMENT 'penerima berkas',
  `det_idam_terimatanggal` date DEFAULT NULL,
  `det_idam_sk` varchar(255) DEFAULT NULL,
  `det_idam_berlaku` date DEFAULT NULL,
  `det_idam_kadaluarsa` date DEFAULT NULL,
  `det_idam_lulussurvey` int(1) DEFAULT '0',
  `det_idam_proses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_idam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_det
-- ----------------------------
INSERT INTO `t_idam_det` VALUES ('2', '2', '1', '2013-12-31', '0', '', '3', '123', '123', '2013-12-16', '1', 'ada', '2013-12-18', '123', '2013-12-23', '2013-12-26', '0', null);
INSERT INTO `t_idam_det` VALUES ('3', '3', '1', '2013-12-31', '0', '', '', '', '', '0000-00-00', '0', '123', '2013-12-21', '', '0000-00-00', '0000-00-00', '0', null);
INSERT INTO `t_idam_det` VALUES ('4', '5', '1', '2013-12-31', '1', '', '', '', '', '0000-00-00', '0', '', '0000-00-00', '', '2014-01-02', '0000-00-00', '0', 'Selesai, sudah diambil');

-- ----------------------------
-- Table structure for `t_ipmbl`
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl`;
CREATE TABLE `t_ipmbl` (
  `ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ipmbl_luas` float DEFAULT NULL,
  `ipmbl_volume` float DEFAULT NULL,
  `ipmbl_keperluan` varchar(255) DEFAULT NULL,
  `ipmbl_kelurahan` varchar(50) DEFAULT NULL,
  `ipmbl_kecamatan` varchar(50) DEFAULT NULL,
  `ipmbl_usaha` varchar(50) DEFAULT NULL,
  `ipmbl_alamatusaha` varchar(100) DEFAULT NULL,
  `ipmbl_lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ipmbl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl
-- ----------------------------

-- ----------------------------
-- Table structure for `t_ipmbl_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl_ceklist`;
CREATE TABLE `t_ipmbl_ceklist` (
  `ipmbl_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `ipmbl_cek_syarat_id` int(11) DEFAULT NULL,
  `ipmbl_cek_ipmbldet_id` int(11) DEFAULT NULL,
  `ipmbl_cek_ipmbl_id` int(11) DEFAULT NULL,
  `ipmbl_cek_status` int(1) DEFAULT NULL,
  `ipmbl_cek_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ipmbl_cek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_ipmbl_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl_det`;
CREATE TABLE `t_ipmbl_det` (
  `det_ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_ipmbl_ipmbl_id` int(11) DEFAULT NULL,
  `det_ipmbl_jenis` int(1) DEFAULT NULL,
  `det_ipmbl_tanggal` date DEFAULT NULL,
  `det_ipmbl_pemohon_id` int(11) DEFAULT NULL,
  `det_ipmbl_nomorreg` varchar(50) DEFAULT NULL,
  `det_ipmbl_nomoragenda` int(11) DEFAULT NULL,
  `det_ipmbl_berkasmasuk` date DEFAULT NULL,
  `det_ipmbl_surveytanggal` date DEFAULT NULL,
  `det_ipmbl_surveylulus` varchar(255) DEFAULT NULL,
  `det_ipmbl_status` varchar(255) DEFAULT NULL,
  `det_ipmbl_surveypetugas` varchar(50) DEFAULT NULL,
  `det_ipmbl_surveydinas` varchar(50) DEFAULT NULL,
  `det_ipmbl_surveynip` varchar(50) DEFAULT NULL,
  `det_ipmbl_surveypendapat` text,
  `det_ipmbl_rekombl` varchar(50) DEFAULT NULL,
  `det_ipmbl_rekomblhtanggal` date DEFAULT NULL,
  `det_ipmbl_rekomkel` varchar(50) DEFAULT NULL,
  `det_ipmbl_rekomkeltanggal` date DEFAULT NULL,
  `det_ipmbl_rekomkec` varchar(50) DEFAULT NULL,
  `det_ipmbl_rekomkectanggal` date DEFAULT NULL,
  `det_ipmbl_sk` varchar(50) DEFAULT NULL,
  `det_ipmbl_kadaluarsa` date DEFAULT NULL,
  `det_ipmbl_berlaku` date DEFAULT NULL,
  `det_ipmbl_proses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_ipmbl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_ipmbl_dok`
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl_dok`;
CREATE TABLE `t_ipmbl_dok` (
  `dok_ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `dok_ipmbl_penerima` varchar(50) DEFAULT NULL,
  `dok_ipmbl_jabatan` varchar(50) DEFAULT NULL,
  `dok_ipmbl_tanggal` date DEFAULT NULL,
  `dok_ipmbl_keterangan` varchar(50) DEFAULT NULL,
  `dok_ipmbl_ipmbl_id` int(11) DEFAULT NULL,
  `dok_ipmbl_ipmbldet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`dok_ipmbl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_dok
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujk`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujk`;
CREATE TABLE `t_iujk` (
  `iujk_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujk_perusahaan` varchar(50) DEFAULT NULL,
  `iujk_alamat` varchar(100) DEFAULT NULL,
  `iujk_direktur` varchar(50) DEFAULT NULL,
  `iujk_golongan` varchar(50) DEFAULT NULL,
  `iujk_kualifikasi` varchar(50) DEFAULT NULL,
  `iujk_bidangusaha` varchar(50) DEFAULT NULL,
  `iujk_rt` int(3) DEFAULT NULL,
  `iujk_rw` int(3) DEFAULT NULL,
  `iujk_kelurahan` int(11) DEFAULT NULL,
  `iujk_kota` int(11) DEFAULT NULL,
  `iujk_propinsi` int(11) DEFAULT NULL,
  `iujk_telepon` varchar(20) DEFAULT NULL,
  `iujk_kodepos` varchar(7) DEFAULT NULL,
  `iujk_fax` varchar(20) DEFAULT NULL,
  `iujk_npwp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iujk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujk_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujk_ceklist`;
CREATE TABLE `t_iujk_ceklist` (
  `iujk_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujk_cek_syarat_id` int(11) DEFAULT NULL,
  `iujk_cek_iujkdet_id` int(11) DEFAULT NULL,
  `iujk_cek_iujk_id` int(11) DEFAULT NULL,
  `iujk_cek_status` int(11) DEFAULT NULL,
  `iujk_cek_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`iujk_cek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujk_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujk_det`;
CREATE TABLE `t_iujk_det` (
  `det_iujk_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_iujk_iujk_id` int(11) DEFAULT NULL,
  `det_iujk_jenis` int(1) DEFAULT NULL,
  `det_iujk_tanggal` date DEFAULT NULL,
  `det_iujk_pemohon_id` int(11) DEFAULT NULL,
  `det_iujk_nomorreg` varchar(50) DEFAULT NULL,
  `det_iujk_rekomnomor` varchar(255) DEFAULT NULL,
  `det_iujk_rekomtanggal` date DEFAULT NULL,
  `det_iujk_pj1` varchar(50) DEFAULT NULL,
  `det_iujk_pj2` varchar(50) DEFAULT NULL,
  `det_iujk_pj3` varchar(50) DEFAULT NULL,
  `det_iujk_pjteknis` varchar(50) DEFAULT NULL,
  `det_iujk_pjtbu` varchar(50) DEFAULT NULL,
  `det_iujk_surveylulus` int(1) DEFAULT NULL,
  `det_iujk_berlaku` date DEFAULT NULL,
  `det_iujk_kadaluarsa` date DEFAULT NULL,
  `det_iujk_proses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujt`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujt`;
CREATE TABLE `t_iujt` (
  `iujt_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujt_usaha` varchar(50) DEFAULT NULL,
  `iujt_alamatusaha` varchar(100) DEFAULT NULL,
  `iujt_penanggungjawab` varchar(50) DEFAULT NULL,
  `iujt_statusperusahaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iujt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujt_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujt_ceklist`;
CREATE TABLE `t_iujt_ceklist` (
  `iujt_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujt_cek_iujt_id` int(11) DEFAULT NULL,
  `iujt_cek_iujtdet_id` int(11) DEFAULT NULL,
  `iujt_cek_syarat_id` int(11) DEFAULT NULL,
  `iujt_cek_status` int(1) DEFAULT NULL,
  `iujt_cek_keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iujt_cek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujt_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujt_det`;
CREATE TABLE `t_iujt_det` (
  `det_iujt_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_iujt_iujt_id` int(11) DEFAULT NULL,
  `det_iujt_jenis` int(1) DEFAULT NULL,
  `det_iujt_tanggal` date DEFAULT NULL,
  `det_iujt_pemohon_id` int(11) DEFAULT NULL,
  `det_iujt_nomorreg` varchar(50) DEFAULT NULL,
  `det_iujt_norekom` varchar(50) DEFAULT NULL,
  `det_iujt_tglrekom` date DEFAULT NULL,
  `det_iujt_surveylulus` int(1) DEFAULT NULL,
  `det_iujt_surveytanggal` date DEFAULT NULL,
  `det_iujt_nopermohonan` varchar(50) DEFAULT NULL,
  `det_iujt_cekpetugas` varchar(50) DEFAULT NULL,
  `det_iujt_cektanggal` date DEFAULT NULL,
  `det_iujt_ceknip` varchar(50) DEFAULT NULL,
  `det_iujt_catatan` text,
  `det_iujt_sk` varchar(50) DEFAULT NULL,
  `det_iujt_berlaku` date DEFAULT NULL,
  `det_iujt_kadaluarsa` date DEFAULT NULL,
  `det_iujt_proses` varchar(50) DEFAULT NULL,
  `det_iujt_perihal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`det_iujt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_log`
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
  `log_tanggal` datetime DEFAULT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_pemohon` int(11) DEFAULT NULL,
  `log_permohonan` int(11) DEFAULT NULL,
  `log_aktifitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('2013-12-30 19:15:00', '1', '0', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-30 19:15:41', '1', '0', '3', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 10:54:25', '1', '1', '5', 'Tambah');

-- ----------------------------
-- Table structure for `t_sipd`
-- ----------------------------
DROP TABLE IF EXISTS `t_sipd`;
CREATE TABLE `t_sipd` (
  `sipd_id` int(11) NOT NULL AUTO_INCREMENT,
  `sipd_nama` varchar(50) DEFAULT NULL,
  `sipd_alamat` varchar(100) DEFAULT NULL,
  `sipd_telp` varchar(20) DEFAULT NULL,
  `sipd_urutan` int(3) DEFAULT NULL,
  `sipd_jenisdokter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sipd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_sipd
-- ----------------------------

-- ----------------------------
-- Table structure for `t_sipd_ceklist`
-- ----------------------------
DROP TABLE IF EXISTS `t_sipd_ceklist`;
CREATE TABLE `t_sipd_ceklist` (
  `sipd_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `sipd_cek_syarat_id` int(11) DEFAULT NULL,
  `sipd_cek_sipd_id` int(11) DEFAULT NULL,
  `sipd_cek_sipddet_id` int(11) DEFAULT NULL,
  `sipd_cek_status` int(1) DEFAULT NULL,
  `sipd_cek_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sipd_cek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_sipd_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_sipd_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_sipd_det`;
CREATE TABLE `t_sipd_det` (
  `det_sipd_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_sipd_sipd_id` int(11) DEFAULT NULL,
  `det_sipd_jenis` int(1) DEFAULT NULL,
  `det_sipd_tanggal` date DEFAULT NULL,
  `det_sipd_pemohon_id` int(11) DEFAULT NULL,
  `det_sipd_nomorreg` varchar(50) DEFAULT NULL,
  `det_sipd_proses` varchar(50) DEFAULT NULL,
  `det_sipd_sk` varchar(50) DEFAULT NULL,
  `det_sipd_skurut` int(11) DEFAULT NULL,
  `det_sipd_berlaku` date DEFAULT NULL,
  `det_sipd_kadaluarsa` date DEFAULT NULL,
  `det_sipd_terima` varchar(50) DEFAULT NULL,
  `det_sipd_terimatanggal` date DEFAULT NULL,
  `det_sipd_kelengkapan` int(1) DEFAULT NULL,
  `det_sipd_bap` varchar(50) DEFAULT NULL,
  `det_sipd_keputusan` int(1) DEFAULT NULL,
  `det_sipd_baptanggal` date DEFAULT NULL,
  `det_sipd_sip` varchar(50) DEFAULT NULL,
  `det_sipd_nrop` varchar(50) DEFAULT NULL,
  `det_sipd_str` varchar(50) DEFAULT NULL,
  `det_sipd_kompetensi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_sipd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_sipd_det
-- ----------------------------
