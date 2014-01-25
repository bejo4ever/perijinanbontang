/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang_fix

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-01-25 09:17:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for master_ijin
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
INSERT INTO `master_ijin` VALUES ('14', 'Izin Minuman Beralkohol', 'Adi Darma', '', 'Wali Kota Bontang', '', '');
INSERT INTO `master_ijin` VALUES ('15', 'Izin Praktek Dokter', 'dr. Indriati As\'ad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');
