/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang_fix

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-01-14 12:14:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acl
-- ----------------------------
DROP TABLE IF EXISTS `acl`;
CREATE TABLE `acl` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `defaultusergroup` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `order` smallint(6) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `parent` smallint(6) DEFAULT NULL,
  `groupmenu_id` smallint(6) DEFAULT NULL,
  `publik` tinyint(4) DEFAULT '0',
  `keterangan` tinytext,
  PRIMARY KEY (`id`),
  KEY `acl_groupmenu` (`groupmenu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of acl
-- ----------------------------
INSERT INTO `acl` VALUES ('1', 'IMB', 'imb_daftar', '3', '1', '1', '1', '0', '3', '0', 'Daftar Permohonan IMB');
INSERT INTO `acl` VALUES ('2', 'SITU HO', 'iho_daftar', '3', '1', '2', '1', '0', '3', '0', 'Daftar Permohonan SITU HO');
INSERT INTO `acl` VALUES ('4', 'SIUP', 'siup_daftar', '3', '1', '4', '1', '0', '3', '0', 'Daftar Permohonan SIUP');
INSERT INTO `acl` VALUES ('5', 'IUJK', 'iujk_daftar', '3', '1', '5', '1', '0', '3', '0', 'Daftar Permohonan IUJK');
INSERT INTO `acl` VALUES ('6', 'Tanda Daftar Perusahaan (TDP)', 'tdp_daftar', '3', '0', '6', '1', '0', '3', '0', 'Daftar Permohonan Ijin Tanda Daftar Perusahaan (TDP)');
INSERT INTO `acl` VALUES ('9', 'Ijin Pameran Insidetil', 'pameran_daftar', '3', '1', '9', '1', '0', '3', '0', 'Daftar Permohonan Ijin Pameran Dagang & Hiburan Insidentil');
INSERT INTO `acl` VALUES ('10', 'Ijin Lokasi', 'lokasi_daftar', '3', '1', '10', '1', '0', '3', '0', 'Daftar Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('11', 'Pariw., Hiburan & Rekreasi Umum', 'pariwisata_daftar', '3', '0', '11', '1', '0', '3', '0', 'Daftar Permohonan Ijin Pariwisata, Hiburan dan Rekreasi Umum');
INSERT INTO `acl` VALUES ('12', 'Perjinan', 'infoperijinan', '0', '1', '1', '1', '0', '2', '1', 'Informasi Perijinan');
INSERT INTO `acl` VALUES ('13', 'Cek Permohonan', 'infopermohonan', '0', '1', '2', '1', '0', '2', '1', 'Cek Status Permohonan');
INSERT INTO `acl` VALUES ('14', 'Pengaduan', 'pengaduan_tambah', '0', '1', '3', '1', '0', '2', '1', 'Menambah Pengaduan Baru');
INSERT INTO `acl` VALUES ('19', 'Ijin Mendirikan Bangunan (IMB) Online', 'imbonline_tambah', '0', '1', '1', '1', '0', '3', '1', 'Permohonan IMB online');
INSERT INTO `acl` VALUES ('20', 'Surat Ijin Tempat Usaha (SITU)/ HO Online', 'hoonline_tambah', '0', '1', '2', '1', '0', '3', '1', 'Permohonan Ijin HO secara Online');
INSERT INTO `acl` VALUES ('21', 'Reklame Online', 'ironline_tambah', '0', '1', '3', '1', '0', '3', '1', 'Permohonan Reklame online');
INSERT INTO `acl` VALUES ('22', 'Surat Ijin Usaha Perdagangan (SIUP) Online', 'siuponline_tambah', '0', '1', '4', '1', '0', '3', '1', 'Permohonan SIUP Online');
INSERT INTO `acl` VALUES ('23', 'Ijin Usaha Jasa Konstruksi (IUJK) Online', 'iujkonline_tambah', '0', '1', '5', '1', '0', '3', '1', 'Permohonan IUJK online');
INSERT INTO `acl` VALUES ('26', 'Galian C Online', 'igconline_tambah', '0', '1', '8', '1', '0', '3', '1', 'Permohonan Galian C secara  online');
INSERT INTO `acl` VALUES ('27', 'Ijin Pameran Dagang & Hiburan Online', 'pameranonline_tambah', '0', '1', '9', '1', '0', '3', '1', 'Permohonan Ijin Pameran dan Usaha Hiburan Insidentil secara  online');
INSERT INTO `acl` VALUES ('28', 'Ijin Lokasi Online', 'lokasionline_tambah', '0', '1', '10', '1', '0', '3', '1', 'Permohonan Ijin Lokasi secara  online');
INSERT INTO `acl` VALUES ('29', 'Ijin Pariwisata Online', 'wisataonline_tambah', '0', '1', '11', '1', '0', '3', '1', 'Permohonan Ijin Pariwisata secara  online');
INSERT INTO `acl` VALUES ('30', 'IMB', 'imb_simulasi', '3', '1', '1', '1', '0', '7', '0', 'Simulasi Perhitungan Retribusi Ijin Mendirikan Bangunan (IMB)');
INSERT INTO `acl` VALUES ('31', 'SITU HO', 'ho_simulasi', '3', '1', '2', '1', '0', '7', '0', 'Simulasi Perhitungan Retribusi Ijin Gangguan (HO)');
INSERT INTO `acl` VALUES ('32', 'Reklame', 'reklame_simulasi', '3', '0', '3', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('33', 'SIUP', 'siup_simulasi', '3', '0', '4', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('34', 'IUJK', 'iujk_simulasi', '0', '1', '5', '1', '0', '7', '0', 'Simulasi Perhitungan Retribusi IUJK');
INSERT INTO `acl` VALUES ('35', 'Apotik', 'apotik_simulasi', '3', '0', '6', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('36', 'Toko Obat', 'tobat_simulasi', '3', '0', '7', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('37', 'Galian C', 'galianc_simulasi', '3', '0', '8', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('38', 'Pameran Insidentil', 'pameran_simulasi', '3', '0', '9', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('39', 'Lokasi', 'lokasi_simulasi', '3', '0', '10', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('40', 'Pariwisata', 'pariwisata_simulasi', '3', '0', '11', '1', '0', '7', '0', null);
INSERT INTO `acl` VALUES ('41', 'Tambah IUJK', 'iujk_tambah', '3', '1', '0', '0', '5', '0', '0', null);
INSERT INTO `acl` VALUES ('42', 'Simpan IUJK', 'iujk_simpan', '3', '1', '0', '0', '5', '0', '0', null);
INSERT INTO `acl` VALUES ('43', 'Simpan Pengaduan', 'pengaduan_simpan', '0', '1', '0', '0', '46', '0', '0', null);
INSERT INTO `acl` VALUES ('44', 'Daftar Pengaduan', 'pengaduan_daftar', '3', '1', '3', '1', '0', '2', '0', 'Daftar Pengaduan');
INSERT INTO `acl` VALUES ('45', 'Detail Data Pengaduan', 'pengaduan_detail', '3', '1', '0', '0', '44', '0', '0', 'Melihat detail data pegaduan');
INSERT INTO `acl` VALUES ('46', 'Tambah Pengaduan', 'pengaduan_tambah', '3', '1', '0', '0', '0', '0', '0', 'Tambah Pengaduan');
INSERT INTO `acl` VALUES ('47', 'Detail Data Permohonan', 'iujk_detail', '3', '1', '0', '0', '5', '0', '0', 'Melihat Detail data permohonan');
INSERT INTO `acl` VALUES ('48', 'Edit Data IUJK', 'iujk_edit', '3', '1', '0', '0', '5', '0', '0', 'Edit Data IUJK');
INSERT INTO `acl` VALUES ('49', 'Update Data Permohonan IUJK', 'iujk_update', '3', '1', '0', '0', '5', '0', '0', 'Update data Permohonan IUJK');
INSERT INTO `acl` VALUES ('50', 'Hapus data IUJK', 'iujk_hapus', '3', '1', '0', '0', '5', '0', '0', 'Hapus data IUJK');
INSERT INTO `acl` VALUES ('51', 'Mengubah status data permohonan IUJK', 'iujk_proses', '3', '1', '0', '0', '5', '0', '0', 'Mengubah status data permohonan IUJK');
INSERT INTO `acl` VALUES ('52', 'Tambah Permohonan IMB', 'imb_tambah', '3', '1', '0', '0', '1', '0', '1', 'Tambah data permohonan IMB');
INSERT INTO `acl` VALUES ('53', 'Simpan Permohonan IMB', 'imb_simpan', '3', '1', '0', '0', '1', '0', '0', 'Simpan Permohonan IMB');
INSERT INTO `acl` VALUES ('54', 'Detail Data Permohonan IMB', 'imb_detail', '3', '1', '0', '0', '1', '0', '0', 'Detail Data Permohonan IMB');
INSERT INTO `acl` VALUES ('55', 'Edit data permohonan IMB', 'imb_edit', '3', '1', '0', '0', '1', '0', '0', 'Edit data permohonan IMB');
INSERT INTO `acl` VALUES ('56', 'Update data permohonan IMB', 'imb_update', '3', '1', '0', '0', '1', '0', '0', 'Update data permohonan IMB');
INSERT INTO `acl` VALUES ('57', 'Mengubah status data permohonan IMB', 'imb_proses', '3', '1', '0', '0', '1', '0', '0', 'Mengubah status data permohonan IMB');
INSERT INTO `acl` VALUES ('58', 'Hapus data permohonan IMB', 'imb_hapus', '3', '1', '0', '0', '1', '0', '0', 'Hapus data permohonan IMB');
INSERT INTO `acl` VALUES ('59', 'Laporan IMB', 'imb_laporan', '3', '1', '1', '1', '0', '6', '0', 'Laporan IMB');
INSERT INTO `acl` VALUES ('60', 'Simpan Permohonan IMB Online', 'imbonline_simpan', '0', '1', '0', '0', '19', '0', '0', 'Simpan data Permohonan IMB secara online');
INSERT INTO `acl` VALUES ('61', 'Selesai Proses permohonan IMB online', 'imbonline_selesai', '0', '1', '0', '0', '19', '0', '0', 'Selesai Proses permohonan IMB secara online');
INSERT INTO `acl` VALUES ('62', 'Laporan IUJK', 'iujk_laporan', '3', '1', '1', '1', '0', '6', '0', 'Laporan IUJK');
INSERT INTO `acl` VALUES ('63', 'Simpan data Permohonan IUJK Online', 'iujkonline_simpan', '0', '1', '0', '0', '23', '0', '0', 'Simpan data Permohonan IUJK Online');
INSERT INTO `acl` VALUES ('64', 'Selesai Proses permohonan IUJK online', 'iujkonline_selesai', '0', '1', '0', '0', '23', '0', '0', 'Selesai Proses permohonan IUJK secara online');
INSERT INTO `acl` VALUES ('66', 'Galian C', 'igc_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Permohonan Ijin Galian C');
INSERT INTO `acl` VALUES ('67', 'Galian C', 'galianc_simpan', '1,3', '1', '0', '0', '66', '0', '0', 'Proses Simpan Ijin Galian C');
INSERT INTO `acl` VALUES ('68', 'Galian C', 'igc_tambah', '1,3', '1', '0', '0', '66', '0', '0', 'Tambah Ijin Galian C');
INSERT INTO `acl` VALUES ('69', 'Galian C', 'igc_edit', '1,3', '1', '0', '0', '66', '0', '0', 'Edit Daftar Ijin Galian C');
INSERT INTO `acl` VALUES ('70', 'Galian C', 'igc_detail', '1,3', '1', '0', '0', '66', '0', '0', 'Lihat Detail IGC');
INSERT INTO `acl` VALUES ('71', 'Galian C', 'igc_print', '1,3', '1', '0', '0', '66', '0', '0', 'Print Laporan');
INSERT INTO `acl` VALUES ('72', 'Reklame', 'ir_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Permohonan Ijin Reklame');
INSERT INTO `acl` VALUES ('73', 'Reklame', 'ir_tambah', '1,3', '1', '0', '0', '72', '0', '0', 'Tambah Reklame Baru');
INSERT INTO `acl` VALUES ('74', 'Galian C', 'igc_proses', '1,3', '1', '0', '0', '66', '0', '0', 'Proses Ubah Status');
INSERT INTO `acl` VALUES ('75', 'Galian C', 'igc_hapus', '1,3', '1', '0', '0', '66', '0', '0', null);
INSERT INTO `acl` VALUES ('76', 'Galian C Online', 'igconline_simpan', '1,3', '1', '0', '0', '26', null, '1', null);
INSERT INTO `acl` VALUES ('77', 'Galian C Online', 'igconline_selesai', '1,3', '1', '0', '0', '26', null, '1', null);
INSERT INTO `acl` VALUES ('78', 'Laporan Galian C', 'igc_report', '1,3', '1', '0', '0', '66', '6', '0', 'Laporan Ijin Galian C');
INSERT INTO `acl` VALUES ('79', 'Laporan Galian C', 'igc_print2', '1,3', '1', '0', '0', '55', '0', '0', null);
INSERT INTO `acl` VALUES ('80', 'Reklame', 'ir_tambah2', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('81', 'Reklame', 'reklame_simpan', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('82', 'Reklame', 'ir_edit', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('83', 'Reklame', 'ir_detail', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('84', 'Reklame', 'ir_hapus', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('85', 'Reklame', 'ir_proses', '1,3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('86', 'Laporan Reklame', 'ir_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan reklame');
INSERT INTO `acl` VALUES ('87', 'Laporan Reklame', 'ir_print2', '1,3', '1', '0', '0', '86', '0', '0', null);
INSERT INTO `acl` VALUES ('88', 'SITU HO', 'iho_tambah', '1,3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('89', 'SITU HO', 'ho_simpan', '1,3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('90', 'SITU HO', 'iho_edit', '13', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('91', 'SITU HO', 'iho_hapus', '1,3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('92', 'SITU HO', 'iho_detail', '1,3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('93', 'SITU HO', 'iho_proses', '1,3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('94', 'Data User', 'duser', null, '1', '1', '1', '0', '5', '0', 'Daftar User');
INSERT INTO `acl` VALUES ('95', 'Tambah Permohonan SIUP', 'siup_tambah', '3', '1', '0', '0', '4', '0', '0', 'Tambah Permohonan SIUP');
INSERT INTO `acl` VALUES ('96', 'Simpan data Pemohonan SIUP', 'siup_simpan', '3', '1', '0', '0', '4', '0', '0', 'Simpan data Pemohonan SIUP');
INSERT INTO `acl` VALUES ('97', 'Edit data Permohonan SIUP', 'siup_edit', '3', '1', '0', '0', '4', '0', '0', 'Edit data Permohonan SIUP');
INSERT INTO `acl` VALUES ('98', 'Simpan Perubahan Data Permohonan SIUP', 'siup_update', '3', '1', '0', '0', '4', '0', '0', 'Simpan Perubahan Data Permohonan SIUP');
INSERT INTO `acl` VALUES ('99', 'Reklame Online', 'ironline_simpan', '0', '1', '0', '0', '21', '0', '0', null);
INSERT INTO `acl` VALUES ('100', 'Reklame', 'oir_tambah2', '0', '1', '0', '0', '21', '0', '0', null);
INSERT INTO `acl` VALUES ('101', 'SITU HO Online', 'hoonline_simpan', '0', '1', '0', '0', '20', '0', '0', null);
INSERT INTO `acl` VALUES ('102', 'SITU HO Online', 'hoonline_selesai', '0', '1', '0', '0', '20', '0', '0', null);
INSERT INTO `acl` VALUES ('103', 'Hapus data permohonan SIUP', 'siup_hapus', '3', '1', '0', '0', '4', '0', '0', 'Hapus data permohonan SIUP');
INSERT INTO `acl` VALUES ('104', 'Set Perubahan status permohonan SIUP', 'siup_proses', '3', '1', '0', '0', '4', '0', '0', 'Set Perubahan status permohonan SIUP');
INSERT INTO `acl` VALUES ('105', 'Lihat detail data permohonan SIUP', 'siup_detail', '3', '1', '0', '0', '4', '0', '0', 'Lihat detail data permohonan SIUP');
INSERT INTO `acl` VALUES ('106', 'Simpan data Pemohonan SIUP Online', 'siuponline_simpan', '0', '1', '0', '0', '22', '0', '0', 'Simpan data Pemohonan SIUP Online');
INSERT INTO `acl` VALUES ('107', 'Selesai Permohonan SIUP Online', 'siuponline_selesai', '0', '1', '0', '0', '22', '0', '0', 'Selesai Permohonan SIUP Online');
INSERT INTO `acl` VALUES ('108', 'Laporan SIUP', 'siup_laporan', '3', '1', '0', '0', '0', '6', '0', 'Laporan SIUP');
INSERT INTO `acl` VALUES ('109', 'Rekap. Pembayaran Perijinan', 'rekap_pembayaran', '4', '1', '20', '1', '0', '6', '0', 'Rekapitulasi Pembayaran Perijinan');
INSERT INTO `acl` VALUES ('110', 'Tambah Permohonan Ijin Lokasi', 'lokasi_tambah', '3', '1', '0', '0', '10', '0', '0', 'Tambah Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('111', 'Simpan data Permohonan Ijin Lokasi', 'lokasi_simpan', '3', '1', '0', '0', '10', '0', '0', 'Simpan data Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('112', 'Edit data permohonan Ijin Lokasi', 'lokasi_edit', '3', '1', '0', '0', '10', '0', '0', 'Edit data Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('113', 'Update data permohonan Ijin Lokasi', 'lokasi_update', '3', '1', '0', '0', '10', '0', '0', 'Update data permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('114', 'Ubah status proses permohonan Ijin Lokasi', 'lokasi_proses', '3', '1', '0', '0', '10', '0', '0', 'Ubah status proses permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('115', 'Lihat Detail data Permohonan Ijin Lokasi', 'lokasi_detail', '3', '1', '0', '0', '10', '0', '0', 'Lihat Detail data Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('116', 'Hapus data permohonan Ijin Lokasi', 'lokasi_hapus', '3', '1', '0', '0', '10', '0', '0', 'Hapus data permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('117', 'Laporan Ijin Lokasi', 'lokasi_laporan', '3', '1', '8', '1', '0', '6', '0', 'Laporan Permohonan Ijin Lokasi');
INSERT INTO `acl` VALUES ('118', 'Selesai Proses permohonan Ijin Lokasi Online', 'lokasionline_selesai', '0', '1', '0', '0', '28', '0', '0', 'Selesai Proses permohonan Ijin Lokasi Online');
INSERT INTO `acl` VALUES ('119', 'Simpan data Permohonan Ijin Lokasi Online', 'lokasionline_simpan', '0', '1', '0', '0', '28', '0', '0', 'Simpan data Permohonan Ijin Lokasi Online');
INSERT INTO `acl` VALUES ('120', 'Tambah Permohonan Ijin Pam. & Hib. Insidentil', 'pameran_tambah', '3', '1', '0', '0', '9', '0', '0', 'Tambah Permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('121', 'Simpan data Pemohonan Ijin Pameran', 'pameran_simpan', '3', '1', '0', '0', '9', '0', '0', 'Simpan data Pemohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('122', 'Edit data permohonan Ijin Pameran', 'pameran_edit', '3', '1', '0', '0', '9', '0', '0', 'Edit data permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('123', 'Update data permohonan Ijin Pameran', 'pameran_update', '3', '1', '0', '0', '9', '0', '0', 'Update data permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('124', 'Lihat Detail data Permohonan Ijin Pameran', 'pameran_detail', '3', '1', '0', '0', '9', '0', '0', 'Lihat Detail data Permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('125', 'Ubah status proses permohonan Ijin Pameran', 'pameran_proses', '3', '1', '0', '0', '9', '0', '0', 'Ubah status proses permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('126', 'Hapus data permohonan Ijin Pameran', 'pameran_hapus', '3', '1', '0', '0', '9', '0', '0', 'Hapus data permohonan Ijin Pameran dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('127', 'Laporan Ijin Pameran', 'pameran_laporan', '3', '1', '8', '1', '0', '6', '0', 'Laporan Permohonan Ijin Pameran Dagang dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('128', 'Simpan data Pemohonan Ijin Pameran Online', 'pameranonline_simpan', '0', '1', '0', '0', '27', '0', '0', 'Simpan data Permohonan Ijin Pameran Dagang dan Usaha Hiburan Insidentil');
INSERT INTO `acl` VALUES ('129', 'Selesai Proses permohonan Ijin Pameran Online', 'pameranonline_selesai', '0', '1', '0', '0', '27', '0', '0', 'Selesai Proses permohonan Ijin Pameran Dagang dan Usaha Hiburan Insidentil secara Online');
INSERT INTO `acl` VALUES ('130', 'Pariwisata Online', 'wisataonline_selesai', '0', '1', '0', '0', '29', '0', '0', null);
INSERT INTO `acl` VALUES ('131', 'Pariwisata Online', 'wisataonline_simpan', '0', '1', '0', '0', '29', '0', '1', null);
INSERT INTO `acl` VALUES ('132', 'Laporan Pariwisata', 'wisata_print2', '1,3', '1', '0', '0', '140', '0', '0', null);
INSERT INTO `acl` VALUES ('133', 'Pariwisata', 'wisata_hapus', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('134', 'Pariwisata', 'wisata_detail', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('135', 'Pariwisata', 'wisata_print', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('136', 'Pariwisata', 'wisata_proses', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('137', 'Pariwisata', 'wisata_simpan', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('138', 'Pariwisata', 'wisata_edit', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('139', 'Pariwisata', 'wisata_tambah', '1,3', '1', '0', '0', '141', '0', '0', null);
INSERT INTO `acl` VALUES ('140', 'Laporan Pariwisata', 'wisata_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Ijin Pariwisata');
INSERT INTO `acl` VALUES ('141', 'Ijin Pariwisata', 'wisata_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Permohonan Ijin Pariwisata, Hiburan dan Rekreasi Umum');
INSERT INTO `acl` VALUES ('142', 'TDP Online', 'tdponline_selesai', '0', '1', '0', '0', '144', '0', '1', null);
INSERT INTO `acl` VALUES ('143', 'TDP Online', 'tdponline_simpan', '0', '1', '0', '0', '144', '0', '1', null);
INSERT INTO `acl` VALUES ('144', 'Tanda Daftar Perusahaan (TDP) Online', 'tdponline_tambah', '0', '1', '0', '0', '0', '3', '1', 'Pendaftaran TDP Online');
INSERT INTO `acl` VALUES ('145', 'TDP', 'tdp_proses', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('146', 'Laporan TDP', 'tdp_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan TDP');
INSERT INTO `acl` VALUES ('147', 'Laporan TDP', 'tdp_print2', '1,3', '1', '0', '0', '146', '0', '0', null);
INSERT INTO `acl` VALUES ('148', 'TDP', 'tdp_print', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('149', 'TDP', 'tdp_hapus', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('150', 'TDP', 'tdp_detail', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('151', 'TDP', 'tdp_edit', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('152', 'TDP', 'tdp_simpan', '1,3', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('153', 'TDP', 'tdp_tambah', '1,2', '1', '0', '0', '154', '0', '0', null);
INSERT INTO `acl` VALUES ('154', 'TDP', 'tdp_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Izin TDP');
INSERT INTO `acl` VALUES ('155', 'Reklame Online', 'ironline_selesai', '0', '1', '0', '0', '21', '0', '1', null);
INSERT INTO `acl` VALUES ('156', 'Laporan HO', 'iho_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Ijin HO');
INSERT INTO `acl` VALUES ('157', 'Laporan HO', 'iho_print2', '1,3', '1', '0', '0', '156', '0', '0', null);
INSERT INTO `acl` VALUES ('158', 'Cetak Blanko SK', 'cetak_blankosk', '3', '1', '1', '1', '0', '8', '0', 'Cetak Blanko SK');
INSERT INTO `acl` VALUES ('159', 'Ijin Utilitas', 'utilitas_daftar', '3', '1', '11', '1', '0', '3', '0', 'Daftar Permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('160', 'Tambah data permohonan Ijin Utilitas', 'utilitas_tambah', '3', '1', '0', '0', '159', '0', '0', 'Tambah data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('161', 'Simpan data permohonan Ijin Utilitas', 'utilitas_simpan', '3', '1', '0', '0', '159', '0', '0', 'Simpan data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('162', 'Lihat detail data permohonan Ijin Utilitas', 'utilitas_detail', '3', '1', '0', '0', '159', '0', '0', 'Lihat detail data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('163', 'Edit data permohonan Ijin Utilitas', 'utilitas_edit', '0', '1', '0', '0', '159', '0', '0', 'Edit data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('164', 'Ubah status permohonan Ijin Utilitas', 'utilitas_proses', '0', '1', '0', '0', '159', '0', '0', 'Ubah status permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('165', 'Hapus data permohonan Ijin Utilitas', 'utilitas_hapus', '3', '1', '0', '0', '159', '0', '0', 'Hapus data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('166', 'Update data permohonan Ijin Utilitas', 'utilitas_update', '3', '1', '0', '0', '159', '0', '0', 'Update data permohonan Ijin Utilitas');
INSERT INTO `acl` VALUES ('167', 'Laporan Ijin Utilitas', 'utilitas_laporan', '3', '1', '12', '1', '0', '6', '0', 'Laporan Ijin Utilitas');
INSERT INTO `acl` VALUES ('168', 'Tanda Tangan', 'tt_simpan', '1', '1', '0', '0', '171', '0', '0', null);
INSERT INTO `acl` VALUES ('169', 'Tanda Tangan', 'tt_edit', '1', '1', '0', '0', '171', '0', '0', null);
INSERT INTO `acl` VALUES ('170', 'Tanda Tangan', 'tt_tambah', '1', '1', '0', '0', '171', '0', '0', null);
INSERT INTO `acl` VALUES ('171', 'Tanda Tangan', 'tt_daftar', '1', '1', '0', '0', '0', '5', '0', 'Manajemen Tanda Tangan Dokumen');
INSERT INTO `acl` VALUES ('172', 'Syarat Perizinan', 'syaratperizinan_simpan', '1', '1', '0', '0', '174', '0', '0', null);
INSERT INTO `acl` VALUES ('173', 'Syarat Perizinan', 'syaratperizinan_detail', '1', '1', '0', '0', '174', '0', '0', null);
INSERT INTO `acl` VALUES ('174', 'Syarat Perizinan', 'syaratperizinan', '1', '1', '0', '0', '0', '5', '0', 'Pengaturan Syarat masing-masing perizinan');
INSERT INTO `acl` VALUES ('175', 'Syarat', 'syarat_simpan', '1', '1', '0', '0', '176', '0', '0', null);
INSERT INTO `acl` VALUES ('176', 'Syarat', 'syarat', '1', '1', '0', '0', '0', '5', '0', 'Master Syarat');
INSERT INTO `acl` VALUES ('177', 'Bentuk Bangunan', 'bentukbangunan_simpan', '1', '1', '0', '0', '178', '0', '0', null);
INSERT INTO `acl` VALUES ('178', 'Bentuk Bangunan', 'bentukbangunan', '1', '0', '0', '0', '0', '5', '0', 'Master Bentuk Perusahaan');
INSERT INTO `acl` VALUES ('179', 'No SK', 'nosk_daftar', '1', '1', '3', '0', '0', '5', '0', 'Ubah format dan counter nomor SK');
INSERT INTO `acl` VALUES ('180', 'No SK', 'nosk_edit', '1', '1', '0', '0', '179', '0', '0', null);
INSERT INTO `acl` VALUES ('181', 'No SK', 'nosk_simpan', '1', '1', '0', '0', '179', '0', '0', null);
INSERT INTO `acl` VALUES ('182', 'Laporan Grafik Jumlah Permohonan', 'laporan_sum_permohonan', '1', '1', '19', '0', '0', '6', '0', 'laporan jumlah permohonan perizinan yang masuk');
INSERT INTO `acl` VALUES ('183', 'TDP', 'tdp_simulasi', '0', '1', '3', '0', '0', '7', '1', 'Simulasi Perhitungan Retribusi TDP');
INSERT INTO `acl` VALUES ('184', 'Ijin Utilitas Online', 'utilitasonline_tambah', '0', '1', '12', '0', '0', '3', '1', 'Permohonan Ijin Utilitas secara online');
INSERT INTO `acl` VALUES ('185', 'Ijin Utilitas Online', 'utilitasonline_simpan', '0', '1', '12', '0', '184', '0', '0', null);
INSERT INTO `acl` VALUES ('186', 'Ijin Utilitas Online', 'utilitasonline_selesai', '0', '1', '12', '0', '184', '0', '0', null);
INSERT INTO `acl` VALUES ('187', 'Ganti Password', 'gantipwd', '1,2,3,4,5', '1', '0', '0', '0', '5', '0', 'Menu untuk ganti Password');
INSERT INTO `acl` VALUES ('188', 'Ubah Counter TDP', 'notdp_daftar', '1', '1', '0', '0', '0', '5', '0', 'Ubah Counter TDP');
INSERT INTO `acl` VALUES ('189', 'Ubah Counter TDP', 'notdp_edit', '1', '1', '0', '0', '188', '0', '0', null);
INSERT INTO `acl` VALUES ('190', 'Ubah Counter TDP', 'notdp_simpan', '1', '1', '0', '0', '188', '0', '0', null);
INSERT INTO `acl` VALUES ('191', 'Tabel Master', 'master', '1', '1', '0', '0', '0', '5', '0', 'Tabel Master');
INSERT INTO `acl` VALUES ('192', 'Tabel Master', 'master_daftar', '1', '1', '0', '0', '191', '0', '0', null);
INSERT INTO `acl` VALUES ('193', 'Tabel Master', 'master_edit', '1', '1', '0', '0', '191', '0', '0', null);
INSERT INTO `acl` VALUES ('194', 'Tabel Master', 'master_simpan', '1', '1', '0', '0', '191', '0', '0', null);
INSERT INTO `acl` VALUES ('195', 'Survei IMB', 'imb_survei', '1', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan IMB yang perlu di survei');
INSERT INTO `acl` VALUES ('196', 'IMB Survei', 'imb_detail_survei', '1', '1', '0', '0', '195', '0', '0', null);
INSERT INTO `acl` VALUES ('197', 'Galian C Survei', 'igc_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan IMB yang perlu di survei');
INSERT INTO `acl` VALUES ('198', 'Galian C Survei', 'igc_detail_survei', '5', '1', '0', '0', '197', '0', '0', null);
INSERT INTO `acl` VALUES ('199', 'HO Survei', 'iho_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan SITU/HO yang perlu di survei');
INSERT INTO `acl` VALUES ('200', 'HO Survei', 'iho_detail_survei', '5', '1', '0', '0', '199', '0', '0', null);
INSERT INTO `acl` VALUES ('201', 'Reklame Survei', 'ir_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan Reklame yang perlu di survei');
INSERT INTO `acl` VALUES ('202', 'Reklame Survei', 'ir_detail_survei', '5', '1', '0', '0', '201', '0', '0', null);
INSERT INTO `acl` VALUES ('203', 'IUJK Survei', 'iujk_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan IUJK yang perlu di survei');
INSERT INTO `acl` VALUES ('204', 'IUJK Survei', 'iujk_detail_survei', '5', '1', '0', '0', '203', '0', '0', null);
INSERT INTO `acl` VALUES ('205', 'Lokasi Survei', 'lokasi_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan Ijin Lokasi yang perlu di survei');
INSERT INTO `acl` VALUES ('206', 'Lokasi Survei', 'lokasi_detail_survei', '5', '1', '0', '0', '205', '0', '0', null);
INSERT INTO `acl` VALUES ('207', 'Pameran Survei', 'pameran_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan Pameran yang perlu di survei');
INSERT INTO `acl` VALUES ('208', 'Pameran Survei', 'pameran_detail_survei', '5', '1', '0', '0', '207', '0', '0', null);
INSERT INTO `acl` VALUES ('209', 'SIUP Survei', 'siup_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan SIUP yang perlu di survei');
INSERT INTO `acl` VALUES ('210', 'SIUP Survei', 'siup_detail_survei', '5', '1', '0', '0', '209', '0', '0', null);
INSERT INTO `acl` VALUES ('211', 'TDP Survei', 'tdp_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan TDP yang perlu di survei');
INSERT INTO `acl` VALUES ('212', 'TDP Survei', 'tdp_detail_survei', '5', '1', '0', '0', '211', '0', '0', null);
INSERT INTO `acl` VALUES ('213', 'Utilitas Survei', 'utilitas_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan Utilitas yang perlu di survei');
INSERT INTO `acl` VALUES ('214', 'Utilitas Survei', 'utilitas_detail_survei', '5', '1', '0', '0', '213', '0', '0', null);
INSERT INTO `acl` VALUES ('215', 'Wisata Survei', 'wisata_survei', '5', '1', '0', '0', '0', '3', '0', 'Lihat Permohonan Pariwisata yang perlu di survei');
INSERT INTO `acl` VALUES ('216', 'Wisata Survei', 'wisata_detail_survei', '5', '1', '0', '0', '215', '0', '0', null);
INSERT INTO `acl` VALUES ('217', 'Laporan Permohonan yang akan Habis', 'laporan_sk_expired', '1', '1', '0', '0', '0', '6', '0', 'Laporan Permohonan Ijin yang akan Habis');
INSERT INTO `acl` VALUES ('218', 'Laporan Bibit Tanaman', 'laporan_tanaman', '3', '1', '0', '0', '0', '6', '0', 'Laporan penyerahan bibit tanaman');
INSERT INTO `acl` VALUES ('219', 'Surat Jalan', 'suratjalan_daftar', null, '1', '0', '0', '0', '5', '0', 'Membuat Surat Jalan Untuk IMB');
INSERT INTO `acl` VALUES ('220', 'Surat Jalan', 'suratjalan_tambah', '3', '1', '0', '0', '219', '0', '0', null);
INSERT INTO `acl` VALUES ('221', 'Surat Jalan', 'suratjalan_simpan', '3', '1', '0', '0', '219', '0', '0', null);
INSERT INTO `acl` VALUES ('222', 'Surat Jalan', 'suratjalan_edit', '3', '1', '0', '0', '219', '0', '0', null);
INSERT INTO `acl` VALUES ('223', 'Laporan KPI', 'laporan_kpi', '1', '1', '0', '0', '0', '6', '0', 'Laporan KPI');
INSERT INTO `acl` VALUES ('224', 'Pembayaran Catatan Sipil', 'capil_daftar', '4', '1', '0', '0', '0', '3', '0', 'Pembayaran Catatan Sipil');
INSERT INTO `acl` VALUES ('225', 'Pembayaran Catatan Sipil', 'capil_tambah', '5', '1', '0', '0', '224', '0', '0', null);
INSERT INTO `acl` VALUES ('226', 'Pembayaran Catatan Sipil', 'capil_edit', '5', '1', '0', '0', '224', '0', '0', null);
INSERT INTO `acl` VALUES ('227', 'Pembayaran Catatan Sipil', 'capil_simpan', '5', '1', '0', '0', '224', '0', '0', null);
INSERT INTO `acl` VALUES ('228', 'Pembayaran Catatan Sipil', 'capil_detail', '5', '1', '0', '0', '224', '0', '0', null);
INSERT INTO `acl` VALUES ('229', 'Laporan Pembayaran Pelayanan & Perijinan', 'laporan_pembayaran', '4', '1', '0', '0', '0', '6', '0', 'Laporan Pembayaran Pelayanan & Perijinan');
INSERT INTO `acl` VALUES ('230', 'Rekap Pembayaran Capil', 'rekap_pembayaran_capil', '4', '0', '0', '0', '0', '6', '0', 'Laporan Rekapitulasi Pembayaran Catatan Sipil');
INSERT INTO `acl` VALUES ('231', 'Surat Jalan', 'suratjalan_detail', '3', '1', '0', '0', '219', '0', '0', null);
INSERT INTO `acl` VALUES ('232', 'Penguncian Data yang telah di rekap Kasir', 'rekap_lock', '4', '1', '0', '0', '229', '0', '0', 'Penguncian Data yang telah di rekap oleh kasir');
INSERT INTO `acl` VALUES ('234', 'Simulasi IUJK', 'iujk_tarif', '1', '1', '6', '1', '0', '5', '0', 'Setting Simulasi IUJK');
INSERT INTO `acl` VALUES ('235', 'Simulasi IUJK', 'iujk_tarif_update', '1', '1', '0', '0', '234', '0', '0', 'Setting Simulasi IUJK');
INSERT INTO `acl` VALUES ('236', 'SITU HO', 'iho_update', '3', '1', '0', '0', '2', '0', '0', null);
INSERT INTO `acl` VALUES ('237', 'Galian C', 'igc_update', '3', '1', '0', '0', '66', '0', '0', null);
INSERT INTO `acl` VALUES ('238', 'Reklame', 'ir_update', '3', '1', '0', '0', '72', '0', '0', null);
INSERT INTO `acl` VALUES ('239', 'Izin Hasil Hutan Kayu', 'ihhk_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Lihat Izin Hutan Hasil Kayu');
INSERT INTO `acl` VALUES ('240', 'Izin Hasil Hutan Kayu', 'ihhk_tambah', '1,3', '1', '0', '0', '249', '0', '0', 'Tambah daftar ijin hasil hutan kayu				');
INSERT INTO `acl` VALUES ('241', 'Izin Usaha Sarang Burung Walet', 'iusbw_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('242', 'Izin Usaha Sarang Burung Walet', 'iusbw_tambah', '1,3', '1', '0', '0', '241', '0', '0', 'Tambah Izin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('243', 'Izin Trayek', 'itr_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin Trayek	\r\n');
INSERT INTO `acl` VALUES ('244', 'Tambah Izin Trayek', 'itr_tambah', '1,3', '1', '0', '0', '243', '0', '0', 'Tambah Izin Trayek');
INSERT INTO `acl` VALUES ('245', 'Izin SIP(Surat Izin Pengeboran)', 'isip_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin SIP(Surat Izin Penggalian)');
INSERT INTO `acl` VALUES ('246', 'Izin SIP(Surat Izin Pengeboran)', 'isip_tambah', '1,3', '1', '0', '0', '245', '0', '0', 'Tambah Izin SIP(Surat Izin Penggalian)');
INSERT INTO `acl` VALUES ('247', 'Izin SIPA(Surat Izin Pengambilan Air Tanah', 'isipa_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin SIPA(Surat Izin Pengambilan Air Tanah)');
INSERT INTO `acl` VALUES ('248', 'Izin SIPA(Surat Izin Pengambilan Air Tanah', 'isipa_tambah', '1,3', '1', '0', '0', '247', '0', '0', 'Tambah Izin SIPA(Surat Izin Pengambilan Air Tanah)');
INSERT INTO `acl` VALUES ('249', 'Izin Angkutan Barang/Orang', 'iabo_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin Angkutan Barang/Orang');
INSERT INTO `acl` VALUES ('250', 'Izin Angkutan Barang/Orang', 'iabo_tambah', '1,3', '1', '0', '0', '249', '0', '0', 'Tambah Izin Angkutan Barang/Orang');
INSERT INTO `acl` VALUES ('251', 'Izin Pembuangan Limbah Cair', 'iplc_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Izin Pembuangan Limbah Cair');
INSERT INTO `acl` VALUES ('252', 'Izin Pembuangan Limbah Cair', 'iplc_tambah', '1,3', '1', '0', '0', '251', '0', '0', 'Tambah Izin Pembuangan Limbah Cair');
INSERT INTO `acl` VALUES ('253', 'Simpan Izin Hasil Hutan Kayu', 'ihhk_simpan', '1,3', '1', '0', '0', '239', '0', '0', 'Simpan Ijin Usaha Hasil Hutan Kayu');
INSERT INTO `acl` VALUES ('254', 'Simpan Izin Usaha Sarang Burung Walet', 'iusbw_simpan', '1,3', '1', '0', '0', '251', '0', '0', 'Simpan Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('255', 'Edit Izin Usaha Sarang Burung Walert', 'iusbw_edit', '1,3', '1', '0', '0', '241', '0', '0', 'Edit Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('256', 'Hapus Izin Usaha Sarang Burung Walert', 'iusbw_hapus', '1,3', '1', '0', '0', '241', '0', '0', 'Hapus Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('257', 'Update Izin Usaha Sarang Burung Walert', 'iusbw_update', '1,3', '1', '0', '0', '241', '0', '0', 'Update Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('258', 'Simpan Izin Usaha Angkutan Barang/Orang', 'iabo_simpan', '1,3', '1', '0', '0', '249', '0', '0', 'Simpan Ijin Usaha Angkutan Barang/Orang');
INSERT INTO `acl` VALUES ('259', 'Edit Izin Usaha Angkutan Barang/Orang', 'iabo_edit', '1,3', '1', '0', '0', '249', '0', '0', 'Edit Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('260', 'Hapus Izin Usaha Angkutan Barang/Orang', 'iabo_hapus', '1,3', '1', '0', '0', '249', '0', '0', 'Hapus Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('261', 'Update Izin Usaha Angkutan Barang/Orang', 'iabo_update', '1,3', '1', '0', '0', '249', '0', '0', 'Update Ijin Usaha Sarang Burung Walet	');
INSERT INTO `acl` VALUES ('262', 'Detail Izin Usaha Sarang Burung Walet', 'iusbw_detail', '1,3', '1', '0', '0', '241', '0', '0', 'Detail Izin Usaha Sarang Burung Walet');
INSERT INTO `acl` VALUES ('263', 'Detail Izin Usaha Angkut Barang/Orang', 'iabo_detail', '1,3', '1', '0', '0', '251', '0', '0', 'Detail Izin Usaha Angkut Barang/Orang');
INSERT INTO `acl` VALUES ('264', 'Simpan Izin Pembuangan Limbah Cari', 'iplc_simpan', '1,3', '1', '0', '0', '251', '0', '0', 'Simpan ijin pembuangan limbah cari');
INSERT INTO `acl` VALUES ('265', 'Edit Izin Pembuangan Limbah Cair', 'iplc_edit', '1,3', '1', '0', '0', '251', '0', '0', 'Edit ijin pembuangan limbah cair');
INSERT INTO `acl` VALUES ('266', 'Update Izin Pembuangan Limbah Cair', 'iplc_update', '1,3', '1', '0', '0', '251', '0', '0', 'Update Ijin pembuangan limbah cair');
INSERT INTO `acl` VALUES ('267', 'Hapus Izin Pembuangan Limbah Cair', 'iplc_hapus', '1,3', '1', '0', '0', '251', '0', '0', 'Hapus Ijin Pembuangan Limbah Cair');
INSERT INTO `acl` VALUES ('268', 'Detail Izin Pembuangan Limbah Cair', 'iplc_detail', '1,3', '1', '0', '0', '251', '0', '0', 'Detail Ijin Pembuangan Limbah Cair');
INSERT INTO `acl` VALUES ('269', 'Simpan Izin Surat Ijin Penggalian (SIP)', 'isip_simpan', '1,3', '1', '0', '0', '245', '0', '0', 'Simpan Izin Surat Ijin Penggalian (SIP');
INSERT INTO `acl` VALUES ('270', 'Edit Izin Surat Ijin Penggalian (SIP)', 'isip_edit', '1,3', '1', '0', '0', '245', '0', '0', 'Edit Izin Surat Ijin Penggalian (SIP)');
INSERT INTO `acl` VALUES ('271', 'Update Izin Surat Ijin Penggalian (SIP)', 'isip_update', '1,3', '1', '0', '0', '245', '0', '0', 'Update Izin Surat Ijin Penggalian (SIP)');
INSERT INTO `acl` VALUES ('272', 'Hapus Izin Surat Ijin Penggalian (SIP)', 'isip_hapus', '1,3', '1', '0', '0', '245', '0', '0', 'Hapus Izin Surat Ijin Penggalian (SIP)');
INSERT INTO `acl` VALUES ('273', 'Detail Izin Surat Ijin Penggalian (SIP)', 'isip_detail', '1,3', '1', '0', '0', '245', '0', '0', 'Detail Izin Surat Ijin Penggalian (SIP)');
INSERT INTO `acl` VALUES ('274', 'Simpan Izin Surat Ijin Pengambilan Air Tanah ', 'isipa_simpan', '1,3', '1', '0', '0', '247', '0', '0', 'Simpan Izin Surat Ijin Pengambilan Air Tanah (SIPA)');
INSERT INTO `acl` VALUES ('275', 'Edit Izin Surat Ijin Pengambilan Air Tanah (S', 'isipa_edit', '1,3', '1', '0', '0', '247', '0', '0', 'Edit Izin Surat Ijin Pengambilan Air Tanah (SIPA)');
INSERT INTO `acl` VALUES ('276', 'Update Izin Surat Ijin Pengambilan Air Tanah ', 'isipa_update', '1,3', '1', '0', '0', '247', '0', '0', 'Update Izin Surat Ijin Pengambilan Air Tanah (SIPA)');
INSERT INTO `acl` VALUES ('277', 'Hapus Izin Surat Ijin Pengambilan Air Tanah (', 'isipa_hapus', '1,3', '1', '0', '0', '247', '0', '0', 'Hapus Izin Surat Ijin Pengambilan Air Tanah (SIPA)');
INSERT INTO `acl` VALUES ('278', 'Detail Izin Surat Ijin Pengambilan Air Tanah ', 'isipa_detail', '1,3', '1', '0', '0', '247', '0', '0', 'Detail Izin Surat Ijin Pengambilan Air Tanah (SIPA)');
INSERT INTO `acl` VALUES ('279', 'Simpan Izin Trayek', 'itr_simpan', '1,3', '1', '0', '0', '243', '0', '0', 'Simpan Izin Trayek');
INSERT INTO `acl` VALUES ('280', 'Edit Izin Trayek', 'itr_edit', '1,3', '1', '0', '0', '243', '0', '0', 'Edit Izin Trayek');
INSERT INTO `acl` VALUES ('281', 'Update Izin Trayek', 'itr_update', '1,3', '1', '0', '0', '243', '0', '0', 'Update Izin Trayek');
INSERT INTO `acl` VALUES ('282', 'Hapus Izin Trayek', 'itr_hapus', '1,3', '1', '0', '0', '243', '0', '0', 'Hapus Izin Trayek');
INSERT INTO `acl` VALUES ('283', 'Detail Izin Trayek', 'itr_detail', '1,3', '1', '0', '0', '243', '0', '0', 'Detail Izin Trayek');
INSERT INTO `acl` VALUES ('285', 'Detail Izin Hasil Hutan Kayu', 'ihhk_detail', '1,3', '1', '0', '0', '239', '0', '0', 'Detail Ijin Hasil Hutan Kayu');
INSERT INTO `acl` VALUES ('286', 'Edit Izin Hasil Hutan Kayu', 'ihhk_edit', '1,3', '1', '0', '0', '239', '0', '0', 'Edit Izin Hasil Hutan Kayu');
INSERT INTO `acl` VALUES ('287', 'Update Hasil Hutan Kayu', 'ihhk_update', '1,3', '1', '0', '0', '239', '0', '0', 'Update Hasil Hutan Kayu	');
INSERT INTO `acl` VALUES ('288', 'Hapus Hasil Hutan Kayu', 'ihhk_hapus', '1,3', '1', '0', '0', '239', '0', '0', 'Hapus Hasil Hutan Kayu');
INSERT INTO `acl` VALUES ('290', 'Laporan Pengaduan', 'pengaduan_report', '3', '1', '5', '1', '0', '2', '0', 'Laporan Pengaduan');
INSERT INTO `acl` VALUES ('293', 'Ijin Pembuangan Limbar Cair Online', 'iplconline_tambah', '0', '1', '13', '1', '0', '3', '1', 'Ijin Pembuangan Limbah Cair Online');
INSERT INTO `acl` VALUES ('294', 'Ijin Pembuangan Limbar Cair Online Simpan', 'iplconline_simpan', '0', '1', '0', '0', '293', '0', '0', null);
INSERT INTO `acl` VALUES ('295', 'Ijin Usaha Burung Walet Online', 'iusbwonline_tambah', '0', '1', '14', '1', '0', '3', '0', 'Ijin Usaha Sarang Burung Walet Online');
INSERT INTO `acl` VALUES ('296', 'Ijin Usaha Burung Walet Online Simpan', 'iusbwonline_simpan', '0', '1', '0', '0', '295', '0', '0', null);
INSERT INTO `acl` VALUES ('297', 'Izin Surat Ijin Penggalian (SIP) Online', 'isiponline_tambah', '0', '1', '15', '1', '0', '3', '0', 'ISIP online');
INSERT INTO `acl` VALUES ('298', 'Izin Surat Ijin Penggalian (SIP) Online Simpa', 'isiponline_simpan', '0', '1', '0', '0', '297', '0', '0', 'ISIP online Simpan');
INSERT INTO `acl` VALUES ('299', 'Izin Surat Ijin Pengambilan Air Tanah (ISIPA)', 'isipaonline_tambah', '0', '1', '16', '1', '0', '3', '0', 'ISIPA Online');
INSERT INTO `acl` VALUES ('300', 'Izin Surat Ijin Pengambilan Air Tanah (ISIPA)', 'isipaonline_simpan', '0', '1', '0', '0', '299', '0', '0', 'ISIPA online simpan');
INSERT INTO `acl` VALUES ('301', 'Ijin Pembuangan Limbar Cair Online Selesai', 'iplconline_selesai', '0', '0', '0', '0', '293', '0', '0', null);
INSERT INTO `acl` VALUES ('302', 'Izin Usaha Sarang Burung Walet Online Selesai', 'iusbwonline_selesai', '0', '0', '0', '0', '295', '0', '0', null);
INSERT INTO `acl` VALUES ('303', 'Izin Surat Ijin Penggalian (SIP) Online Seles', 'isiponline_selesai', '0', '0', '0', '0', '297', '0', '0', null);
INSERT INTO `acl` VALUES ('304', 'Izin Surat Ijin Pengambilan Air Tanah (ISIPA)', 'isipaonline_selesai', '0', '0', '0', '0', '299', '0', '0', null);
INSERT INTO `acl` VALUES ('305', 'Izin Trayek Online', 'itronline_tambah', '0', '1', '17', '1', '0', '3', '0', 'Izin Trayek Online');
INSERT INTO `acl` VALUES ('306', 'Izin Trayek Oniine simpan', 'itronline_simpan', '0', '0', '0', '0', '305', '0', '0', 'Izin Trayek Simpan');
INSERT INTO `acl` VALUES ('307', 'Izin Trayek Online selesai', 'itronline_selesai', '0', '0', '0', '0', '305', '0', '0', 'Izin Trayek Online Selesai');
INSERT INTO `acl` VALUES ('308', 'Izin Angkutan Orang Online', 'iaoonline_tambah', '0', '1', '18', '1', '0', '3', '0', 'Izin Angkutan Orang Online');
INSERT INTO `acl` VALUES ('309', 'Izin Angkutan Orang Online Simpan', 'iaoonline_simpan', '0', '0', '0', '0', '307', '0', '0', null);
INSERT INTO `acl` VALUES ('310', 'Izin Angkutan ORang Online Selesai', 'iaoonline_selesai', '0', '0', '0', '0', '307', '0', '0', null);
INSERT INTO `acl` VALUES ('311', 'Izin Angkutan Barang ', 'iab_daftar', '1,3', '1', '0', '0', '0', '3', '0', 'Daftar Ijin Angkutan Barang');
INSERT INTO `acl` VALUES ('312', 'Izin Angkutan Barang Simpan', 'iab_simpan', '1,3', '1', '0', '0', '311', '0', '0', 'Simpan Ijin Angkutan Barang	');
INSERT INTO `acl` VALUES ('313', 'Izin Angkutan Barang Edit', 'iab_edit', '1,3', '1', '0', '0', '311', '0', '0', 'Edit Izin Angkutan Barang');
INSERT INTO `acl` VALUES ('314', 'Izin Angkutan Barang Update', 'iab_update', '1,3', '1', '0', '0', '311', '0', '0', 'Update Izin Pengangkutan Barang');
INSERT INTO `acl` VALUES ('315', 'Izin Angkutan Barang Hapus', 'iab_hapus', '1,3', '1', '0', '0', '311', '0', '0', 'Hapus Izin Angkutan Barang');
INSERT INTO `acl` VALUES ('316', 'Izin Angkutan Barang Detail', 'iab_detail', '1,3', '1', '0', '0', '311', '0', '0', 'Detail Izin Angkutan Barang');
INSERT INTO `acl` VALUES ('317', 'Izin Angkutan Barang Tambah', 'iab_tambah', '1,3', '1', '0', '0', '311', '0', '0', 'Tambah Izin Angkutan Barang ');
INSERT INTO `acl` VALUES ('318', 'Izin Hasil Hutan Kayu Online', 'ihhkonline_tambah', '0', '1', '19', '1', '0', '3', '0', 'Izin Hasil Hutan Kayu Online');
INSERT INTO `acl` VALUES ('319', 'Izin Hasil Hutan Kayu Online Simpan', 'ihhkonline_simpan', '0', '0', '0', '0', '318', '0', '0', null);
INSERT INTO `acl` VALUES ('320', 'Izin Hasil Hutan Kayu Selsai', 'ihhkonline_selesai', '0', '0', '0', '0', '318', '0', '0', null);
INSERT INTO `acl` VALUES ('321', 'Proses Ijin', 'ijin_proses', '1,3', '1', '0', '0', '0', '1', '0', 'Proses Status Ijin');
INSERT INTO `acl` VALUES ('322', 'Laporan Izin Angkutan Barang', 'iab_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Angkutan Barang');
INSERT INTO `acl` VALUES ('323', 'Laporan Izin Angkutan Orang', 'iabo_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Angkutan Orang');
INSERT INTO `acl` VALUES ('324', 'Laporan Izin Hasil Hutan Kayu', 'ihhk_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Hasil Hutan Kayu');
INSERT INTO `acl` VALUES ('325', 'Laporan Izin Pembuangan Limbah Cair', 'iplc_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Pembuangan Limbah Cair');
INSERT INTO `acl` VALUES ('326', 'Laporan Izin Surat Izin Pengeboran', 'isip_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Surat Izin Pengeboran');
INSERT INTO `acl` VALUES ('327', 'Laporan Izin Surat Izin Pengambilan Air Tanah', 'isipa_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Surat Izin Pengambilan Air Tanah');
INSERT INTO `acl` VALUES ('328', 'Laporan Izin Trayek', 'itr_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Trayek');
INSERT INTO `acl` VALUES ('329', 'Laporan Izin Usaha Sarang Burung Walet', 'iusbw_report', '1,3', '1', '0', '0', '0', '6', '0', 'Laporan Izin Usaha Sarang Burung Walet');

-- ----------------------------
-- Table structure for bentukbangunan
-- ----------------------------
DROP TABLE IF EXISTS `bentukbangunan`;
CREATE TABLE `bentukbangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bentuk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bentukbangunan
-- ----------------------------
INSERT INTO `bentukbangunan` VALUES ('1', 'Permanen');
INSERT INTO `bentukbangunan` VALUES ('2', 'Semi Permanen');

-- ----------------------------
-- Table structure for bentukperusahaan
-- ----------------------------
DROP TABLE IF EXISTS `bentukperusahaan`;
CREATE TABLE `bentukperusahaan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `retribusi` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bentukperusahaan
-- ----------------------------
INSERT INTO `bentukperusahaan` VALUES ('1', 'PT', '500000');
INSERT INTO `bentukperusahaan` VALUES ('2', 'BUMN', '500000');
INSERT INTO `bentukperusahaan` VALUES ('3', 'Koperasi', '75000');
INSERT INTO `bentukperusahaan` VALUES ('4', 'CV', '300000');
INSERT INTO `bentukperusahaan` VALUES ('5', 'Persekutuan Firma', '300000');
INSERT INTO `bentukperusahaan` VALUES ('6', 'Perusahaan Perorangan', '200000');
INSERT INTO `bentukperusahaan` VALUES ('7', 'Perusahaan Asing', '2500000');
INSERT INTO `bentukperusahaan` VALUES ('8', 'Lainnya', '150000');
INSERT INTO `bentukperusahaan` VALUES ('9', 'UD', '0');
INSERT INTO `bentukperusahaan` VALUES ('10', 'Partai', '0');
INSERT INTO `bentukperusahaan` VALUES ('11', 'Perorangan', '0');
INSERT INTO `bentukperusahaan` VALUES ('12', 'Toko', '0');
INSERT INTO `bentukperusahaan` VALUES ('13', 'Warnet', '0');

-- ----------------------------
-- Table structure for bentukperush_tdp
-- ----------------------------
DROP TABLE IF EXISTS `bentukperush_tdp`;
CREATE TABLE `bentukperush_tdp` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bentukperush_tdp
-- ----------------------------
INSERT INTO `bentukperush_tdp` VALUES ('1', 'PT');
INSERT INTO `bentukperush_tdp` VALUES ('2', 'Koperasi');
INSERT INTO `bentukperush_tdp` VALUES ('3', 'CV');
INSERT INTO `bentukperush_tdp` VALUES ('4', 'Fa');
INSERT INTO `bentukperush_tdp` VALUES ('5', 'PO / UD');
INSERT INTO `bentukperush_tdp` VALUES ('6', 'BUL');

-- ----------------------------
-- Table structure for bidangjasa
-- ----------------------------
DROP TABLE IF EXISTS `bidangjasa`;
CREATE TABLE `bidangjasa` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `bidang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bidangjasa
-- ----------------------------
INSERT INTO `bidangjasa` VALUES ('1', 'Arsitektur');
INSERT INTO `bidangjasa` VALUES ('2', 'Sipil');
INSERT INTO `bidangjasa` VALUES ('3', 'Mekanikal');
INSERT INTO `bidangjasa` VALUES ('4', 'Elektrikal');
INSERT INTO `bidangjasa` VALUES ('5', 'Tata Lingkungan');
INSERT INTO `bidangjasa` VALUES ('6', 'Jasa Inspeksi Teknis');

-- ----------------------------
-- Table structure for bidangjasa_proyek
-- ----------------------------
DROP TABLE IF EXISTS `bidangjasa_proyek`;
CREATE TABLE `bidangjasa_proyek` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(255) DEFAULT NULL,
  `bidangjasa_id` int(255) DEFAULT NULL,
  `iujk_id` int(255) DEFAULT NULL,
  `nama_proyek` text,
  `tahun_proyek` int(255) DEFAULT NULL,
  `nilai_proyek` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=515 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bidangjasa_proyek
-- ----------------------------
INSERT INTO `bidangjasa_proyek` VALUES ('74', '25436', '4', '568', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('89', '25572', '1', '573', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('90', '25572', '2', '573', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('91', '25572', '5', '573', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('105', '25659', '1', '579', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('106', '25659', '2', '579', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('113', '25693', '1', '582', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('114', '25693', '2', '582', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('117', '25600', '1', '574', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('118', '25600', '2', '574', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('119', '25600', '5', '574', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('120', '25660', '2', '580', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('121', '25694', '1', '583', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('122', '25694', '2', '583', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('123', '25756', '1', '589', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('124', '25756', '2', '589', 'Semenisasi Jl. Pontianak Pemkot ', '2011', '164.764.000');
INSERT INTO `bidangjasa_proyek` VALUES ('125', '25728', '1', '585', 'Pemeliharaan rumput, pohon dan pembersihan area d PT. Badak NGL Bontang ', '2006', '2.145.114,000,-');
INSERT INTO `bidangjasa_proyek` VALUES ('126', '25728', '2', '585', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('127', '25737', '1', '587', 'Perbaikan dan pengecatan Rumah Dinas  PT. PUPUK KALTIM', '2011', '159,750,000.00');
INSERT INTO `bidangjasa_proyek` VALUES ('128', '25737', '2', '587', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('129', '25738', '1', '588', 'Pembuatan Gedung Peralatan dan File PSDM . PT. PUPUK KALTIM ', '27', '163,468,100.00');
INSERT INTO `bidangjasa_proyek` VALUES ('130', '25738', '2', '588', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('131', '25723', '1', '584', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('132', '25723', '2', '584', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('133', '25723', '3', '584', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('134', '25736', '1', '586', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('135', '25736', '2', '586', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('148', '25840', '1', '608', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('149', '25840', '2', '608', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('150', '25839', '1', '607', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('151', '25839', '2', '607', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('152', '25622', '1', '576', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('153', '25451', '1', '569', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('154', '25451', '2', '569', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('155', '25539', '1', '570', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('156', '25539', '2', '570', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('157', '25542', '1', '571', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('158', '25542', '2', '571', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('159', '25570', '1', '572', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('160', '25570', '2', '572', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('163', '25629', '1', '577', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('164', '25629', '2', '577', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('167', '25618', '1', '575', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('168', '25618', '2', '575', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('177', '25838', '1', '606', 'Renovasi container Gas Aset Managemen PT. Indminco Mandiri', '2012', '73.234.400');
INSERT INTO `bidangjasa_proyek` VALUES ('178', '25838', '2', '606', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('179', '25816', '1', '597', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('180', '25816', '2', '597', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('181', '25815', '1', '596', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('182', '25815', '2', '596', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('206', '25922', '1', '615', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('210', '25923', '1', '616', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('211', '25923', '2', '616', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('228', '25942', '1', '618', 'Pembuatan Pagar dibelakang cooling Water Plant PT. Indominco Mandiri ', '2011', 'Rp. 230.000.000,-');
INSERT INTO `bidangjasa_proyek` VALUES ('229', '25942', '2', '618', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('231', '25794', '4', '592', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('233', '25800', '4', '594', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('234', '25780', '1', '590', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('235', '25780', '2', '590', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('236', '25789', '1', '591', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('237', '25789', '2', '591', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('238', '25924', '1', '617', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('239', '25924', '2', '617', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('242', '25836', '1', '604', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('243', '25836', '2', '604', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('244', '25921', '1', '614', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('245', '25921', '2', '614', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('252', '25824', '1', '598', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('253', '25824', '2', '598', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('254', '25833', '1', '601', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('255', '25833', '2', '601', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('256', '25826', '4', '600', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('257', '25835', '1', '603', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('258', '25835', '2', '603', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('259', '25837', '1', '605', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('260', '25837', '2', '605', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('261', '25834', '1', '602', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('262', '25834', '2', '602', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('263', '25825', '1', '599', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('264', '25825', '2', '599', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('265', '25845', '1', '612', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('266', '25845', '2', '612', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('267', '25845', '5', '612', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('268', '25844', '1', '611', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('269', '25844', '2', '611', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('270', '25842', '1', '609', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('271', '25842', '2', '609', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('272', '25843', '4', '610', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('279', '25920', '1', '613', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('280', '25920', '2', '613', 'Perencanaan Teknis Normalisasi Sungai/Kanal Dan Perkuatan Bronjong(Link 3)', '2010', 'Rp. 45.000.000,-');
INSERT INTO `bidangjasa_proyek` VALUES ('281', '25920', '6', '613', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('284', '25799', '4', '593', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('285', '23647', '1', '441', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('286', '23647', '2', '441', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('289', '26041', '1', '623', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('290', '26041', '2', '623', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('293', '26023', '1', '622', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('294', '26023', '2', '622', 'Peningkatan Jalan Tomat  (Tahap II) Pemkot Dinas Pekerjaan Umum ', '2012', 'Rp. 379.157.844,97');
INSERT INTO `bidangjasa_proyek` VALUES ('295', '26002', '1', '621', 'Pembangunan Sarana Lingkungan Gedung Di Pengadilan Negeri Bontang ', '2011', 'Rp. 298.809.000,-');
INSERT INTO `bidangjasa_proyek` VALUES ('296', '26002', '2', '621', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('297', '25986', '1', '620', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('298', '25986', '2', '620', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('299', '25976', '1', '619', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('300', '25976', '2', '619', 'Peningkatan Jalan Tomat  (Tahap II) Pemkot Dinas Pekerjaan Umum ', '2012', 'Rp. 379.157.844,97');
INSERT INTO `bidangjasa_proyek` VALUES ('307', '26093', '1', '626', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('308', '26093', '2', '626', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('309', '26092', '1', '625', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('310', '26092', '2', '625', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('335', '26193', '1', '631', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('336', '26193', '2', '631', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('346', '26194', '1', '632', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('347', '26194', '2', '632', 'Kegiatan semenisasi Jalan Lingkungan RT. 01 s/d RT. 10 Kel Berbas Tengah ', '2012', 'Rp. 508.484.590.00');
INSERT INTO `bidangjasa_proyek` VALUES ('348', '26194', '3', '632', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('373', '26207', '1', '638', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('374', '26207', '2', '638', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('379', '26248', '1', '645', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('380', '26248', '2', '645', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('383', '26253', '1', '646', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('384', '26253', '2', '646', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('387', '26223', '1', '639', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('388', '26223', '2', '639', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('389', '26330', '1', '651', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('390', '26330', '3', '651', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('391', '26301', '1', '649', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('392', '26301', '2', '649', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('395', '26230', '1', '643', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('396', '26230', '2', '643', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('397', '26196', '1', '634', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('398', '26196', '2', '634', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('399', '26224', '1', '640', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('400', '26224', '2', '640', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('401', '23505', '4', '421', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('402', '26313', '1', '650', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('403', '26313', '2', '650', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('406', '26333', '1', '652', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('407', '26333', '2', '652', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('412', '26393', '1', '655', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('413', '26393', '2', '655', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('429', '26236', '1', '644', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('430', '26236', '2', '644', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('433', '26389', '1', '653', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('434', '26389', '2', '653', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('437', '26390', '1', '654', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('438', '26390', '2', '654', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('441', '26421', '1', '657', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('442', '26421', '2', '657', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('445', '26424', '1', '658', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('446', '26424', '2', '658', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('449', '26411', '1', '656', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('450', '26411', '2', '656', 'Pemeliharaan dan Peningkatan Insfrastruktur Lingkungan RT. 16 (Pembuatan Poskamling', '2012', 'Rp. 30.591.000');
INSERT INTO `bidangjasa_proyek` VALUES ('453', '26202', '1', '637', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('454', '26202', '2', '637', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('459', '26229', '1', '642', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('460', '26229', '2', '642', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('463', '26228', '1', '641', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('464', '26228', '2', '641', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('465', '26190', '1', '630', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('466', '26190', '2', '630', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('467', '26165', '1', '629', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('468', '26165', '2', '629', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('469', '26150', '1', '627', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('470', '26150', '2', '627', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('474', '26297', '1', '648', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('475', '26297', '2', '648', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('480', '26467', '1', '661', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('481', '26467', '2', '661', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('484', '26538', '1', '664', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('485', '26538', '2', '664', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('488', '26541', '1', '667', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('489', '26541', '2', '667', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('492', '26548', '1', '669', 'Perbaikan Toko Citra Gedung Pika Playgroup dan Atap PMK PC VI PT. PKT', '2012', 'Rp. 406.000.000');
INSERT INTO `bidangjasa_proyek` VALUES ('493', '26548', '2', '669', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('494', '26594', '1', '671', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('495', '26594', '2', '671', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('498', '26542', '1', '668', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('499', '26542', '2', '668', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('500', '26562', '1', '670', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('501', '26562', '2', '670', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('504', '26537', '1', '663', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('505', '26537', '2', '663', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('506', '26463', '1', '660', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('507', '26463', '2', '660', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('508', '26463', '3', '660', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('509', '26445', '1', '659', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('510', '26445', '2', '659', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('511', '26156', '1', '628', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('512', '26156', '2', '628', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('513', '26671', '5', '674', '', '0', '');
INSERT INTO `bidangjasa_proyek` VALUES ('514', '26609', '4', '672', '', '0', '');

-- ----------------------------
-- Table structure for bidangjasa_sub
-- ----------------------------
DROP TABLE IF EXISTS `bidangjasa_sub`;
CREATE TABLE `bidangjasa_sub` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bidang_jasa_id` int(255) DEFAULT NULL,
  `nama` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bidangjasa_sub
-- ----------------------------
INSERT INTO `bidangjasa_sub` VALUES ('24', '1', 'Pekerjaan interior, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('14', '2', 'Drainase kota, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('38', '2', 'Pekerjaan penggalian dan pemindahan tanah');
INSERT INTO `bidangjasa_sub` VALUES ('1', '1', 'Perumahan tunggal dan kopel, termasuk perawatannya\r\n');
INSERT INTO `bidangjasa_sub` VALUES ('23', '1', 'Pekerjaan dinding dan jendela kaca, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('8', '1', 'Bangunan pergudangan dan industri, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('58', '3', 'Fasilitas produksi, penyimpanan minyak dan gas, termasuk perawatannya (pekerjaan rekayasa)');
INSERT INTO `bidangjasa_sub` VALUES ('76', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Sistem Kontrol Lalulintas');
INSERT INTO `bidangjasa_sub` VALUES ('2', '1', 'Bangunan komersial, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('45', '2', 'Pekerjaan konstruksi baja, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('46', '2', 'Pekerjaan pemasangan perancah pembetonan');
INSERT INTO `bidangjasa_sub` VALUES ('73', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Pekerjaan Teknik Sipil Bangunan');
INSERT INTO `bidangjasa_sub` VALUES ('74', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Pekerjaan Teknik Sipil Lainnya');
INSERT INTO `bidangjasa_sub` VALUES ('9', '1', 'Bangunan-bangunan non perumahan lainnya, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('55', '3', 'Instalasi thermal, bertekanan, minyak gas, geothermal, termasuk perawatannya (pekerjaan rekayasa)');
INSERT INTO `bidangjasa_sub` VALUES ('6', '5', 'Instalasi pengolahan limbah, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('69', '1', 'Jasa Penilai Perawatan Bangunan Gedung');
INSERT INTO `bidangjasa_sub` VALUES ('64', '5', 'Reboisasi/penghijauan');
INSERT INTO `bidangjasa_sub` VALUES ('63', '5', 'Pekerjaan pengeboran air tanah, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('21', '1', 'Pertamanan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('68', '1', 'Jasa Desain Interior');
INSERT INTO `bidangjasa_sub` VALUES ('53', '3', 'Instalasi lift dan escalator, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('62', '5', 'Perpipaan air bersih/limbah, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('15', '2', 'Bendung, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('42', '2', 'Pekerjaan kerangka konstruksi atap, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('16', '2', 'Irigasi dan drainase, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('39', '2', 'Pekerjaan struktur');
INSERT INTO `bidangjasa_sub` VALUES ('61', '5', 'Perpipaan gas lokal perkotaan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('26', '1', 'Pekerjaan Kayu');
INSERT INTO `bidangjasa_sub` VALUES ('13', '2', 'Pelabuhan atau dermaga, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('60', '5', 'Perpipaan minyak dan gas jarak jauh, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('44', '2', 'Pekerjaan pembetonan');
INSERT INTO `bidangjasa_sub` VALUES ('17', '2', 'Bendungan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('72', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Pekerjaan Teknik Sipil Transportasi');
INSERT INTO `bidangjasa_sub` VALUES ('10', '1', 'Fasilitas pelatihan sport di luar gedung, fasilitas rekreasi, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('57', '3', 'Konstruksi perpipaan minyak, gas dan energi, termasuk perawatannya (pekerjaan rekayasa)');
INSERT INTO `bidangjasa_sub` VALUES ('27', '1', 'Pekerjaan Logam');
INSERT INTO `bidangjasa_sub` VALUES ('70', '1', 'Jasa Arsitektur Lainnya');
INSERT INTO `bidangjasa_sub` VALUES ('4', '2', 'Jembatan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('34', '2', 'Pengerukan dan pengurugan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('20', '1', 'Perumahan multi hunian, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('18', '2', 'Pekerjaan penghancuran');
INSERT INTO `bidangjasa_sub` VALUES ('25', '1', 'Pekerjaan berketerampilan');
INSERT INTO `bidangjasa_sub` VALUES ('5', '5', 'Pengolahan air bersih, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('11', '1', 'Pekerjaan pemasangan instalasi asesoris bangunan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('28', '2', 'Jalan kereta api, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('71', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Bangunan');
INSERT INTO `bidangjasa_sub` VALUES ('35', '2', 'Pekerjaan persiapan');
INSERT INTO `bidangjasa_sub` VALUES ('50', '3', 'Perpipaan air dalam bangunan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('30', '2', 'Jalan layang, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('65', '1', 'Perawatan gedung/bangunan');
INSERT INTO `bidangjasa_sub` VALUES ('75', '1', 'Jasa Enjiniring Fase Konstruksi dan Instalasi Industrial Plant dan Proses');
INSERT INTO `bidangjasa_sub` VALUES ('49', '2', 'Pekerjaan pengaspalan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('47', '2', 'Pekerjaan pelaksana khusus lainnya');
INSERT INTO `bidangjasa_sub` VALUES ('31', '2', 'Terowongan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('22', '1', 'Finishing bangunan');
INSERT INTO `bidangjasa_sub` VALUES ('51', '3', 'Instalasi pipa gas dalam bangunan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('3', '2', 'Jalan raya, jalan lingkungan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('7', '3', 'Instalasi pemanas, ventilasi udara dan AC dalam bangunan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('40', '2', 'Pekerjaan pemancangan');
INSERT INTO `bidangjasa_sub` VALUES ('59', '3', 'Jasa penyedia peralatan kerja rekonstruksi');
INSERT INTO `bidangjasa_sub` VALUES ('48', '2', 'Pekerjaan finishing struktur');
INSERT INTO `bidangjasa_sub` VALUES ('66', '1', 'Jasa Nasihat/Pra-Desain, Desain dan Administrasi Kontrak Arsitektural');
INSERT INTO `bidangjasa_sub` VALUES ('33', '2', 'Persungaian rawa dan pantai, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('41', '2', 'Pekerjaan pelaksanaan pondasi, termasuk untuk perbaikannya');
INSERT INTO `bidangjasa_sub` VALUES ('29', '2', 'Lapangan terbang dan runway, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('56', '3', 'Konstruksi alat angkut dan alat angkat, termasuk perawatannya (pekerjaan rekayasa)');
INSERT INTO `bidangjasa_sub` VALUES ('43', '2', 'Pekerjaan atap dan kedap air, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('52', '3', 'Insulasi dalam bangunan, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('32', '2', 'Jalan bawah tanah, termasuk perawatannya');
INSERT INTO `bidangjasa_sub` VALUES ('19', '2', 'Pekerjaan penyiapan dan pengupasan lahan');
INSERT INTO `bidangjasa_sub` VALUES ('67', '1', 'Jasa Arsitektural Lansekap');
INSERT INTO `bidangjasa_sub` VALUES ('54', '3', 'Pertambangan dan manufaktur, termasuk perawatannya');

-- ----------------------------
-- Table structure for bidangjasa_sub_proyek
-- ----------------------------
DROP TABLE IF EXISTS `bidangjasa_sub_proyek`;
CREATE TABLE `bidangjasa_sub_proyek` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(255) DEFAULT NULL,
  `bidangjasa_sub_id` int(255) DEFAULT NULL,
  `iujk_id` int(255) DEFAULT NULL,
  `nama_proyek` text,
  `tahun_proyek` int(255) DEFAULT NULL,
  `nilai_proyek` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=430 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bidangjasa_sub_proyek
-- ----------------------------
INSERT INTO `bidangjasa_sub_proyek` VALUES ('182', '0', '9', '523', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('36', '24759', '1', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('399', '0', '9', '570', 'PEKERJAAN RENOVASI DEPO BONTANG . PT. ALTRAK 1978', '2007', '304.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('111', '24782', '11', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('412', '25572', '21', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('201', '0', '8', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('128', '0', '9', '510', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('330', '0', '9', '547', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('335', '0', '9', '548', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('136', '0', '2', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('307', '0', '14', '539', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('114', '24782', '3', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('105', '0', '14', '515', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('351', '0', '3', '552', 'Semenisasi Gang Rt. 19 Gunung Elai Dinas Pekerjaan Umum', '2011', '50.284.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('340', '24854', '9', '551', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('192', '0', '57', '524', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('270', '24837', '3', '542', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('123', '24782', '7', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('96', '0', '3', '514', 'Semenisasi Jalan Lingkungan RT. 42 Perum. Bukit Sintuk Dinas Pekerjaan Umum', '2011', '95.155.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('121', '24782', '18', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('318', '0', '9', '544', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('312', '0', '16', '540', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('38', '24759', '3', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('406', '0', '9', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('110', '24782', '10', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('97', '0', '14', '514', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('244', '0', '1', '535', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('175', '0', '3', '522', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('222', '0', '9', '531', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('419', '0', '9', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('323', '0', '9', '545', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('371', '0', '14', '556', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('191', '0', '45', '524', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('370', '0', '3', '556', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('299', '0', '14', '537', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('108', '24782', '8', '517', 'Gudang Urea USB V PKT', '2005', '190.635.850.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('8', '24629', '1', '503', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('363', '24866', '37', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('78', '0', '21', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('37', '24759', '9', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('310', '0', '9', '540', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('309', '0', '1', '540', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('122', '24782', '19', '517', 'Pengurukan dan pengurukan lahan industri di kawasan tursina bontang 001/sp/KIE/2001', '2001', '289.000.000.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('402', '0', '1', '570', 'PEKERJAAN RENOVASI DEPO BONTANG , PT. ALTRAK 1978', '2007', '307.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('193', '0', '58', '524', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('362', '24866', '33', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('204', '0', '33', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('152', '0', '33', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('150', '0', '3', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('58', '0', '21', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('302', '0', '3', '538', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('76', '0', '1', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('210', '0', '14', '529', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('392', '0', '9', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('125', '24782', '6', '517', 'Penggantian piping 21\" air limbah train B, C, D sepanjang 1.200 Meter PT. BADAK NGL Bontang', '2003', '28.929.212.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('115', '24782', '4', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('183', '0', '21', '523', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('328', '0', '14', '546', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('109', '24782', '9', '517', 'Pembangunan Kantor Safety dan tempat parkir area office PT. PAMA PERSADA NUSANTARA IR.A/0228/SPK-LH/XI2004', '2004', '79.998.400.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('400', '0', '1', '570', 'PEKERJAAN RENOVASI DEPO BONTANG , PT. ALTRAK 1978', '2007', '307.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('389', '0', '21', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('420', '0', '21', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('422', '0', '14', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('349', '0', '9', '552', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('139', '0', '14', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('353', '24856', '8', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('395', '0', '14', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('89', '0', '58', '513', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('358', '24866', '3', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('418', '0', '1', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('416', '25572', '5', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('410', '25572', '1', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('386', '0', '3', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('211', '0', '45', '529', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('315', '0', '14', '543', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('337', '0', '14', '548', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('426', '0', '9', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('295', '0', '1', '537', 'Pembangunan Gedung Field Maintenance PKT', '2010', '495000000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('166', '0', '9', '521', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('388', '0', '9', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('308', '0', '33', '539', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('342', '24854', '14', '551', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('228', '0', '9', '532', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('331', '0', '21', '547', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('238', '0', '3', '534', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('103', '0', '9', '515', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('159', '0', '21', '520', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('86', '0', '55', '513', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('397', '0', '1', '570', 'PEKERJAAN RENOVASI DEPO BONTANG , PT. ALTRAK 1978', '2007', '307.081.839');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('149', '0', '9', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('316', '0', '33', '543', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('354', '24856', '9', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('343', '24854', '16', '551', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('55', '0', '14', '508', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('230', '0', '17', '532', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('247', '0', '15', '535', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('378', '0', '14', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('300', '0', '57', '537', 'Perluasan Kantor Dept. Pemeliharaan PKT', '2010', '450000000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('205', '0', '37', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('95', '0', '9', '514', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('306', '0', '3', '539', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('267', '24836', '9', '541', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('301', '0', '9', '538', '-', '0', '-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('251', '0', '33', '536', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('80', '0', '14', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('246', '0', '14', '535', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('409', '0', '33', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('403', '0', '9', '570', 'PEKERJAAN RENOVASI DEPO BONTANG . PT. ALTRAK 1978', '2007', '304.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('361', '24866', '16', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('138', '0', '3', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('380', '0', '9', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('64', '24762', '14', '509', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('381', '0', '21', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('407', '0', '3', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('377', '0', '3', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('63', '24762', '3', '509', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('341', '24854', '3', '551', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('396', '0', '1', '570', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('408', '0', '14', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('53', '0', '21', '508', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('127', '0', '8', '510', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('219', '0', '14', '530', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('332', '0', '3', '547', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('129', '0', '21', '510', 'Pemotongan Rumput, Pemeliharaan taman dan kebersihan area zone I & II ( Paket A ) PT. BADAK NGL Kontrak No. CA - 10002', '2010', '7.157.284.000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('62', '24762', '9', '509', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('379', '0', '33', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('317', '0', '37', '543', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('176', '0', '14', '522', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('320', '0', '14', '544', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('338', '0', '9', '550', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('314', '0', '3', '543', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('217', '0', '9', '530', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('102', '0', '1', '515', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('119', '24782', '16', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('385', '0', '21', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('87', '0', '56', '513', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('329', '0', '33', '546', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('94', '0', '1', '514', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('324', '0', '3', '545', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('177', '0', '33', '522', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('326', '0', '9', '546', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('39', '24759', '14', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('184', '0', '3', '523', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('61', '0', '44', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('161', '0', '14', '520', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('26', '0', '1', '504', 'sdfdf', '1998', '188999');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('229', '0', '3', '532', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('126', '0', '1', '510', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('231', '0', '33', '532', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('60', '0', '14', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('360', '24866', '14', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('303', '0', '14', '538', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('393', '0', '21', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('271', '24837', '64', '542', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('359', '24866', '4', '555', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('116', '24782', '13', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('311', '0', '3', '540', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('387', '0', '14', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('429', '0', '33', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('106', '24782', '1', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('239', '0', '14', '534', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('169', '0', '14', '521', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('209', '0', '9', '529', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('368', '0', '1', '556', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('57', '0', '9', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('327', '0', '3', '546', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('27', '0', '10', '504', 'sgtrhtr', '24254', '14355');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('333', '0', '14', '547', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('268', '24837', '1', '542', '-', '0', '-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('34', '0', '2', '505', 'aefergrh', '13214', '132132');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('322', '0', '1', '545', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('120', '24782', '17', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('405', '0', '9', '570', 'PEKERJAAN RENOVASI DEPO BONTANG . PT. ALTRAK 1978', '2007', '304.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('373', '0', '3', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('81', '0', '19', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('88', '0', '57', '513', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('104', '0', '3', '515', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('140', '0', '15', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('297', '0', '3', '537', 'Pembangunan Warehouse PT. INDOMINCO MANDIRI', '2009', '1500000000');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('383', '0', '14', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('398', '0', '1', '570', 'PEKERJAAN RENOVASI DEPO BONTANG , PT. ALTRAK 1978', '2007', '307.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('391', '0', '14', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('427', '0', '3', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('113', '24782', '20', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('153', '0', '6', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('202', '0', '9', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('325', '0', '14', '545', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('298', '0', '4', '537', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('384', '0', '9', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('334', '0', '1', '548', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('141', '0', '33', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('137', '0', '9', '518', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('28', '0', '3', '504', 'fgrthr14', '1556', '14456767');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('118', '24782', '15', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('369', '0', '9', '556', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('304', '0', '33', '538', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('266', '24836', '1', '541', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('425', '0', '6', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('336', '0', '3', '548', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('35', '0', '3', '505', 'ajdnfk', '21343', '12233');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('376', '0', '9', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('218', '0', '21', '530', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('413', '25572', '3', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('411', '25572', '9', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('112', '24782', '12', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('305', '0', '21', '539', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('65', '24762', '33', '509', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('414', '25572', '14', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('296', '0', '9', '537', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('216', '0', '1', '530', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('357', '24856', '14', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('158', '0', '9', '520', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('352', '24856', '1', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('417', '25572', '6', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('237', '0', '21', '534', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('339', '0', '21', '550', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('372', '0', '9', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('236', '0', '9', '534', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('321', '0', '33', '544', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('375', '0', '33', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('319', '0', '3', '544', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('355', '24856', '3', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('203', '0', '3', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('390', '0', '3', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('185', '0', '64', '523', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('269', '24837', '9', '542', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('200', '0', '1', '528', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('348', '0', '1', '552', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('404', '0', '1', '570', 'PEKERJAAN RENOVASI DEPO BONTANG , PT. ALTRAK 1978', '2007', '307.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('350', '0', '21', '552', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('40', '24759', '16', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('223', '0', '21', '531', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('151', '0', '14', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('59', '0', '3', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('148', '0', '1', '519', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('167', '0', '21', '521', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('356', '24856', '4', '553', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('428', '0', '14', '572', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('394', '0', '3', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('424', '0', '5', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('245', '0', '3', '535', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('374', '0', '14', '569', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('160', '0', '3', '520', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('33', '0', '1', '505', 'sdfrfg', '456', '12233');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('41', '24759', '19', '506', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('56', '0', '1', '507', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('415', '25572', '19', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('52', '0', '1', '508', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('423', '0', '19', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('77', '0', '9', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('168', '0', '3', '521', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('174', '0', '9', '522', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('421', '0', '3', '573', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('401', '0', '9', '570', 'PEKERJAAN RENOVASI DEPO BONTANG . PT. ALTRAK 1978', '2007', '304.081.839,-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('107', '24782', '2', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('79', '0', '3', '512', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('124', '24782', '5', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('190', '0', '44', '524', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('250', '0', '3', '536', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('313', '0', '9', '543', '-', '0', '-');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('382', '0', '3', '571', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('117', '24782', '14', '517', '', '0', '');
INSERT INTO `bidangjasa_sub_proyek` VALUES ('54', '0', '3', '508', '', '0', '');

-- ----------------------------
-- Table structure for busaha
-- ----------------------------
DROP TABLE IF EXISTS `busaha`;
CREATE TABLE `busaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `bidang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of busaha
-- ----------------------------

-- ----------------------------
-- Table structure for capil
-- ----------------------------
DROP TABLE IF EXISTS `capil`;
CREATE TABLE `capil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemohon` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `layanan_id` int(11) NOT NULL,
  `no_akte` varchar(50) DEFAULT NULL,
  `tglpermohonan` datetime DEFAULT NULL,
  `tglbayar` datetime DEFAULT NULL,
  `retribusi` float DEFAULT NULL,
  `nama_ortu` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of capil
-- ----------------------------

-- ----------------------------
-- Table structure for cek_list_lingkungan
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_lingkungan`;
CREATE TABLE `cek_list_lingkungan` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`) USING BTREE,
  CONSTRAINT `cek_list_lingkungan_ibfk_2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_lingkungan
-- ----------------------------

-- ----------------------------
-- Table structure for cek_list_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_lokasi`;
CREATE TABLE `cek_list_lokasi` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`) USING BTREE,
  CONSTRAINT `FK_IJIN2` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lokasi` (`ID_IJIN_LOKASI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SYARAT2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_lokasi
-- ----------------------------

-- ----------------------------
-- Table structure for cek_list_sktr
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_sktr`;
CREATE TABLE `cek_list_sktr` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_SKTR` (`ID_IJIN`) USING BTREE,
  CONSTRAINT `FK_SKTR` FOREIGN KEY (`ID_IJIN`) REFERENCES `sktr` (`ID_SKTR`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_sktr
-- ----------------------------

-- ----------------------------
-- Table structure for cek_list_sppl
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_sppl`;
CREATE TABLE `cek_list_sppl` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_sppl
-- ----------------------------

-- ----------------------------
-- Table structure for cek_list_trayek
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_trayek`;
CREATE TABLE `cek_list_trayek` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cek_list_trayek
-- ----------------------------

-- ----------------------------
-- Table structure for counter_skr_ho
-- ----------------------------
DROP TABLE IF EXISTS `counter_skr_ho`;
CREATE TABLE `counter_skr_ho` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` text,
  `counter` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of counter_skr_ho
-- ----------------------------

-- ----------------------------
-- Table structure for counter_tdp
-- ----------------------------
DROP TABLE IF EXISTS `counter_tdp`;
CREATE TABLE `counter_tdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bentuk_id` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of counter_tdp
-- ----------------------------

-- ----------------------------
-- Table structure for desa
-- ----------------------------
DROP TABLE IF EXISTS `desa`;
CREATE TABLE `desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi_id` int(11) DEFAULT NULL,
  `kabkota_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desa_propinsi` (`propinsi_id`) USING BTREE,
  KEY `desa_kabkota` (`kabkota_id`) USING BTREE,
  KEY `desa_kecamatan` (`kecamatan_id`) USING BTREE,
  CONSTRAINT `desa_kabkota` FOREIGN KEY (`kabkota_id`) REFERENCES `kabkota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `desa_kecamatan` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `desa_propinsi` FOREIGN KEY (`propinsi_id`) REFERENCES `propinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of desa
-- ----------------------------

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dokumen
-- ----------------------------

-- ----------------------------
-- Table structure for dt_syarat
-- ----------------------------
DROP TABLE IF EXISTS `dt_syarat`;
CREATE TABLE `dt_syarat` (
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`,`ID_SYARAT`),
  KEY `FK_SYARAT` (`ID_SYARAT`) USING BTREE,
  CONSTRAINT `FK_IJIN` FOREIGN KEY (`ID_IJIN`) REFERENCES `master_ijin` (`ID_IJIN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SYARAT` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

-- ----------------------------
-- Table structure for fsbangunan
-- ----------------------------
DROP TABLE IF EXISTS `fsbangunan`;
CREATE TABLE `fsbangunan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fungsi` mediumtext,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fsbangunan
-- ----------------------------

-- ----------------------------
-- Table structure for groupmenu
-- ----------------------------
DROP TABLE IF EXISTS `groupmenu`;
CREATE TABLE `groupmenu` (
  `id` tinyint(4) NOT NULL,
  `menu` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `publik` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of groupmenu
-- ----------------------------

-- ----------------------------
-- Table structure for groupuser
-- ----------------------------
DROP TABLE IF EXISTS `groupuser`;
CREATE TABLE `groupuser` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of groupuser
-- ----------------------------

-- ----------------------------
-- Table structure for ho
-- ----------------------------
DROP TABLE IF EXISTS `ho`;
CREATE TABLE `ho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `statustempat_id` tinyint(4) NOT NULL,
  `luas` float NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `bentukbangunan_id` tinyint(4) NOT NULL,
  `butara` varchar(255) NOT NULL,
  `btimur` varchar(255) NOT NULL,
  `bselatan` varchar(255) NOT NULL,
  `bbarat` varchar(255) NOT NULL,
  `permohonan_jenis` tinyint(4) DEFAULT NULL COMMENT '1=baru, 2=perpanjangan',
  `permohonan_id` int(11) NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `indeksgangguan_id` tinyint(4) DEFAULT NULL,
  `indekslokasi_id` tinyint(4) DEFAULT NULL,
  `retribusi` float DEFAULT NULL,
  `tglsurvey` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  `peruntukan` varchar(255) DEFAULT '',
  `no_imb` text,
  PRIMARY KEY (`id`),
  KEY `ho_perusahaan` (`perusahaan_id`) USING BTREE,
  KEY `ho_indeksgangguan` (`indeksgangguan_id`) USING BTREE,
  KEY `ho_indekslokasi` (`indekslokasi_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ho
-- ----------------------------

-- ----------------------------
-- Table structure for iab
-- ----------------------------
DROP TABLE IF EXISTS `iab`;
CREATE TABLE `iab` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `daya_angkut` int(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of iab
-- ----------------------------

-- ----------------------------
-- Table structure for iabo
-- ----------------------------
DROP TABLE IF EXISTS `iabo`;
CREATE TABLE `iabo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `statustempat_id` int(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `bentukbangunan_id` int(255) DEFAULT NULL,
  `butara` text,
  `btimur` text,
  `bselatan` text,
  `bbarat` text,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `indeksgangguan_id` int(255) DEFAULT NULL,
  `indekslokasi_id` int(255) DEFAULT NULL,
  `retribusi` varchar(255) DEFAULT NULL,
  `tglsurvey` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of iabo
-- ----------------------------

-- ----------------------------
-- Table structure for igc
-- ----------------------------
DROP TABLE IF EXISTS `igc`;
CREATE TABLE `igc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bhngalian` tinytext,
  `peruntukan` tinytext,
  `luas_areal` float DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `statustempat_id` tinyint(4) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `butara` varchar(100) DEFAULT NULL,
  `btimur` varchar(100) DEFAULT NULL,
  `bselatan` varchar(100) DEFAULT NULL,
  `bbarat` varchar(100) DEFAULT NULL,
  `retribusi` float DEFAULT NULL,
  `keterangan` tinytext NOT NULL,
  `nama_kades` varchar(100) NOT NULL,
  `no_rek_kades` varchar(100) NOT NULL,
  `tgl_rek_kades` date NOT NULL,
  `nama_camat` varchar(100) NOT NULL,
  `no_rek_camat` varchar(100) NOT NULL,
  `tgl_rek_camat` date NOT NULL,
  `no_rek_dp` varchar(100) NOT NULL,
  `tgl_rek_dp` date NOT NULL,
  `no_rek_dpu` varchar(100) NOT NULL,
  `tgl_rek_dpu` date NOT NULL,
  `no_rek_ukl` varchar(100) DEFAULT NULL,
  `tgl_rek_ukl` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tambang_permohonan` (`permohonan_id`) USING BTREE,
  KEY `tambang_statustempat` (`statustempat_id`) USING BTREE,
  KEY `tambang_kecamatan` (`kecamatan_id`) USING BTREE,
  KEY `tambang_desa` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of igc
-- ----------------------------

-- ----------------------------
-- Table structure for ihhk
-- ----------------------------
DROP TABLE IF EXISTS `ihhk`;
CREATE TABLE `ihhk` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `alamat_pabrik` text,
  `luas_pabrik` int(255) DEFAULT NULL,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `hasil_kayu_bulat` text,
  `bahan_olahan` text,
  `hasil_olahan1` text,
  `hasil_olahan2` text,
  `lokasi_pabrik` int(255) DEFAULT NULL,
  `bulan_olah1` int(255) DEFAULT NULL,
  `bulan_olah2` int(255) DEFAULT NULL,
  `bulan_olah3` int(255) DEFAULT NULL,
  `bulan_olah4` int(255) DEFAULT NULL,
  `bulan_olah5` int(255) DEFAULT NULL,
  `bulan_olah6` int(255) DEFAULT NULL,
  `tahun_olah1` int(255) DEFAULT NULL,
  `tahun_olah2` int(255) DEFAULT NULL,
  `tahun_olah3` int(255) DEFAULT NULL,
  `tahun_olah4` int(255) DEFAULT NULL,
  `tahun_olah5` int(255) DEFAULT NULL,
  `tahun_olah6` int(255) DEFAULT NULL,
  `modal_tetap_tanah` text,
  `modal_tetap_bangunan` text,
  `modal_tetap_peralatan` text,
  `modal_tetap_lainya` text,
  `modal_kerja_bhbk` text,
  `modal_kerja_upah` text,
  `modal_kerja_lainya` text,
  `modal_sendiri` text,
  `tki_laki` int(255) DEFAULT NULL,
  `tki_wanita` int(255) DEFAULT NULL,
  `tka` int(255) DEFAULT NULL,
  `tka_asal` text,
  `tka_keahlian` text,
  `tka_lama_tinggal` text,
  `jlh_bhbk_kybulat_dalam_negeri` text,
  `satuan_bhbk_kybulat_dalam_negeri` text,
  `asal_bhbk_kybulat_dalam_negeri` text,
  `ket_bhbk_kybulat_dalam_negeri` text,
  `jlh_bhbk_kybulat_impor` text,
  `satuan_bhbk_kybulat_impor` text,
  `asal_bhbk_kybulat_impor` text,
  `ket_bhbk_kybulat_impor` text,
  `jlh_bhbk_kyolahan_dalam_negeri` text,
  `satuan_bhbk_kyolahan_dalam_negeri` text,
  `asal_bhbk_kyolahan_dalam_negeri` text,
  `ket_bhbk_kyolahan_dalam_negeri` text,
  `jlh_bhbk_kyolahan_impor` text,
  `satuan_bhbk_kyolahan_impor` text,
  `asal_bhbk_kyolahan_impor` text,
  `ket_bhbk_kyolahan_impor` text,
  `jlh_bh_penolong_dalam_negeri` text,
  `satuan_bh_penolong_dalam_negeri` text,
  `asal_bh_penolong_dalam_negeri` text,
  `ket_bh_penolong_dalam_negeri` text,
  `jlh_bh_penolong_impor` text,
  `satuan_bh_penolong_impor` text,
  `asal_bh_penolong_impor` text,
  `ket_bh_penolong_impor` text,
  `jlh_bbkb_dalam_negeri` text,
  `satuan_bbkb_dalam_negeri` text,
  `asal_bbkb_dalam_negeri` text,
  `ket_bbkb_dalam_negeri` text,
  `jlh_bbkb_impor` text,
  `satuan_bbkb_impor` text,
  `asal_bbkb_impor` text,
  `ket_bbkb_impor` text,
  `jlh_bbko_dalam_negeri` text,
  `satuan_bbko_dalam_negeri` text,
  `asal_bbko_dalam_negeri` text,
  `ket_bbko_dalam_negeri` text,
  `jlh_bbko_impor` text,
  `satuan_bbko_impor` text,
  `asal_bbko_impor` text,
  `ket_bbko_impor` text,
  `jlh_bp_dalam_negeri` text,
  `satuan_bp_dalam_negeri` text,
  `asal_bp_dalam_negeri` text,
  `ket_bp_dalam_negeri` text,
  `jlh_bp_impor` text,
  `satuan_bp_impor` text,
  `asal_bp_impor` text,
  `ket_bp_impor` text,
  `lgudang_bhbk` text,
  `lgudang_bbko` text,
  `lgudang_bp` text,
  `lokasi_lply` text,
  `luas_lply` text,
  `perijinan_lply` text,
  `sbr_air_kapasitas` text,
  `sbr_air_pemakaian` text,
  `pln_kapasitas` text,
  `pln_pemakaian` text,
  `genset_kapasitas` text,
  `genset_pemakaian` text,
  `pl_kapasitas` text,
  `pl_pemakaian` text,
  `gas_kapasitas` text,
  `gas_pemakaian` text,
  `lain_kapasitas` text,
  `lain_pemakaian` text,
  `lain_satuan` text,
  `limbah_padat_volume` text,
  `limbah_padat_satuan` text,
  `limbah_padat_penanganan` text,
  `limbah_gas_volume` text,
  `limbah_gas_satuan` text,
  `limbah_gas_penanganan` text,
  `limbah_cair_volume` text,
  `limbah_cair_satuan` text,
  `limbah_cair_penanganan` text,
  `limbah_lain_volume` text,
  `limbah_lain_satuan` text,
  `limbah_lain_penanganan` text,
  `harga_bbkb_dalam_negeri` text,
  `harga_bbkb_impor` text,
  `harga_bbko_dalam_negeri` text,
  `harga_bbko_impor` text,
  `harga_bbkp_dalam_negeri` text,
  `harga_bbkp_impor` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ihhk
-- ----------------------------

-- ----------------------------
-- Table structure for ihhk_mesin
-- ----------------------------
DROP TABLE IF EXISTS `ihhk_mesin`;
CREATE TABLE `ihhk_mesin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ihhk_id` int(255) DEFAULT NULL,
  `nama` text,
  `jumlah` int(255) DEFAULT NULL,
  `merk` text,
  `negara` text,
  `harga` text,
  `kapasitas` text,
  `status` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ihhk_mesin` (`ihhk_id`) USING BTREE,
  CONSTRAINT `FK_ihhk_mesin` FOREIGN KEY (`ihhk_id`) REFERENCES `ihhk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ihhk_mesin
-- ----------------------------

-- ----------------------------
-- Table structure for ihhk_pemasaran
-- ----------------------------
DROP TABLE IF EXISTS `ihhk_pemasaran`;
CREATE TABLE `ihhk_pemasaran` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ihhk_id` int(255) DEFAULT NULL,
  `jenis_produk` text,
  `rencana_pemasaran` text,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ihhk_pemasaran` (`ihhk_id`) USING BTREE,
  CONSTRAINT `FK_ihhk_pemasaran` FOREIGN KEY (`ihhk_id`) REFERENCES `ihhk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ihhk_pemasaran
-- ----------------------------

-- ----------------------------
-- Table structure for ihhk_produk
-- ----------------------------
DROP TABLE IF EXISTS `ihhk_produk`;
CREATE TABLE `ihhk_produk` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ihhk_id` int(255) DEFAULT NULL,
  `nama_produk` text,
  `jumlah_produk` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ihhk_produk` (`ihhk_id`) USING BTREE,
  CONSTRAINT `FK_ihhk_produk` FOREIGN KEY (`ihhk_id`) REFERENCES `ihhk` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ihhk_produk
-- ----------------------------

-- ----------------------------
-- Table structure for ijin
-- ----------------------------
DROP TABLE IF EXISTS `ijin`;
CREATE TABLE `ijin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `waktu` varchar(100) DEFAULT NULL,
  `retribusi` varchar(200) DEFAULT NULL,
  `bayar` tinyint(4) NOT NULL DEFAULT '1',
  `perkiraan_selesai` varchar(100) NOT NULL,
  `tgllock_kasir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ijin
-- ----------------------------

-- ----------------------------
-- Table structure for ijinsyarat
-- ----------------------------
DROP TABLE IF EXISTS `ijinsyarat`;
CREATE TABLE `ijinsyarat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ijin_id` int(255) DEFAULT NULL,
  `syarat_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ijinsyarat_ijin` (`ijin_id`) USING BTREE,
  KEY `ijinsyarat_syarat` (`syarat_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ijinsyarat
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lingkungan
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lingkungan`;
CREATE TABLE `ijin_lingkungan` (
  `ID_IJIN_LINGKUNGAN` int(11) NOT NULL DEFAULT '0',
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
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ijin_lingkungan
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lingkungan_inti
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
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN_INTI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ijin_lingkungan_inti
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lokasi
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
  `STATU_SURVEY` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LOKASI`),
  KEY `FK_IJIN_LOKASI_INTI` (`ID_PEMOHON`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ijin_lokasi
-- ----------------------------

-- ----------------------------
-- Table structure for ilokasi
-- ----------------------------
DROP TABLE IF EXISTS `ilokasi`;
CREATE TABLE `ilokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `luas` double unsigned DEFAULT NULL,
  `peruntukan` varchar(200) DEFAULT NULL,
  `point1` tinytext,
  `point1_2` tinytext,
  `point1_3` tinytext,
  `point2` tinytext,
  `point3` tinytext,
  `point6` varchar(50) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT NULL,
  `nosk_lama` varchar(50) DEFAULT NULL,
  `tglsk_lama` date DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `nosurat` varchar(50) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `permohonan_id` (`permohonan_id`) USING BTREE,
  KEY `kecamatan_id` (`kecamatan_id`) USING BTREE,
  KEY `desa_id` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ilokasi
-- ----------------------------

-- ----------------------------
-- Table structure for ilreklame
-- ----------------------------
DROP TABLE IF EXISTS `ilreklame`;
CREATE TABLE `ilreklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(200) DEFAULT NULL,
  `nilai` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ilreklame
-- ----------------------------

-- ----------------------------
-- Table structure for imb
-- ----------------------------
DROP TABLE IF EXISTS `imb`;
CREATE TABLE `imb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `indekstingkat_id` tinyint(4) NOT NULL DEFAULT '1',
  `struktur_id` tinyint(4) DEFAULT NULL,
  `fsbangunan_id` tinyint(4) NOT NULL DEFAULT '1',
  `permohonan_id` int(11) DEFAULT NULL,
  `lokasi` text,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kecamatan_id` int(11) NOT NULL DEFAULT '0',
  `desa_id` int(11) NOT NULL DEFAULT '0',
  `peruntukan` tinytext,
  `sertifikat_id` tinyint(100) DEFAULT '1',
  `luas` float DEFAULT '0',
  `butara` varchar(100) DEFAULT NULL,
  `bselatan` varchar(100) DEFAULT NULL,
  `bbarat` varchar(100) DEFAULT NULL,
  `btimur` varchar(100) DEFAULT NULL,
  `pondasi` varchar(200) DEFAULT NULL,
  `sloof` varchar(200) DEFAULT NULL,
  `tiang` varchar(200) DEFAULT NULL,
  `dinding` varchar(200) DEFAULT NULL,
  `ratap` varchar(200) DEFAULT NULL,
  `patap` varchar(200) DEFAULT NULL,
  `lantai` varchar(200) DEFAULT NULL,
  `jmllantai` tinyint(4) DEFAULT NULL,
  `kelasjalan_id` smallint(6) NOT NULL DEFAULT '1',
  `hargataksir` double NOT NULL,
  `plafoon` varchar(200) DEFAULT NULL,
  `retlama` double DEFAULT '0',
  `sdata` tinyint(4) DEFAULT '1',
  `no_rekomendasi` varchar(255) DEFAULT NULL,
  `no_register` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imb_struktur` (`struktur_id`) USING BTREE,
  KEY `imb_permohonan` (`permohonan_id`) USING BTREE,
  KEY `imb_kelasjalan` (`kelasjalan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of imb
-- ----------------------------

-- ----------------------------
-- Table structure for imbindeks
-- ----------------------------
DROP TABLE IF EXISTS `imbindeks`;
CREATE TABLE `imbindeks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imb_id` int(11) DEFAULT NULL,
  `nkluas` float DEFAULT NULL,
  `nktingkat` float DEFAULT NULL,
  `nklokasi` float DEFAULT NULL,
  `nkfungsi` float DEFAULT NULL,
  `nkstruktur` float DEFAULT NULL,
  `hargataksir` double DEFAULT '1000000',
  `banyakunit` int(11) DEFAULT '1',
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of imbindeks
-- ----------------------------

-- ----------------------------
-- Table structure for imb_data
-- ----------------------------
DROP TABLE IF EXISTS `imb_data`;
CREATE TABLE `imb_data` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `imb_id` int(255) DEFAULT NULL,
  `lokasi_id` smallint(3) DEFAULT NULL,
  `tingkat_id` smallint(3) DEFAULT NULL,
  `fungsi_id` smallint(3) DEFAULT NULL,
  `struktur_id` smallint(3) DEFAULT NULL,
  `luas` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of imb_data
-- ----------------------------

-- ----------------------------
-- Table structure for indeksgangguan
-- ----------------------------
DROP TABLE IF EXISTS `indeksgangguan`;
CREATE TABLE `indeksgangguan` (
  `id` tinyint(4) NOT NULL,
  `gangguan` varchar(100) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of indeksgangguan
-- ----------------------------

-- ----------------------------
-- Table structure for indekslokasi
-- ----------------------------
DROP TABLE IF EXISTS `indekslokasi`;
CREATE TABLE `indekslokasi` (
  `id` tinyint(4) NOT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of indekslokasi
-- ----------------------------

-- ----------------------------
-- Table structure for indeksluas
-- ----------------------------
DROP TABLE IF EXISTS `indeksluas`;
CREATE TABLE `indeksluas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `bmin` float NOT NULL,
  `bmax` float NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of indeksluas
-- ----------------------------

-- ----------------------------
-- Table structure for indekstingkat
-- ----------------------------
DROP TABLE IF EXISTS `indekstingkat`;
CREATE TABLE `indekstingkat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(100) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of indekstingkat
-- ----------------------------

-- ----------------------------
-- Table structure for iplc
-- ----------------------------
DROP TABLE IF EXISTS `iplc`;
CREATE TABLE `iplc` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `statustempat_id` int(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `bentukbangunan_id` int(255) DEFAULT NULL,
  `butara` text,
  `btimur` text,
  `bselatan` text,
  `bbarat` text,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `indeksgangguan_id` int(255) DEFAULT NULL,
  `indekslokasi_id` int(255) DEFAULT NULL,
  `retribusi` varchar(255) DEFAULT NULL,
  `tglsurvey` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `alamat_kegiatan` varchar(255) DEFAULT NULL,
  `tempat_kegiatan` varchar(255) DEFAULT NULL,
  `kecamatan_kegiatan_id` int(255) DEFAULT NULL,
  `desa_kegiatan_id` int(255) DEFAULT NULL,
  `tujuan_kegiatan` varchar(255) DEFAULT NULL,
  `volume_kegiatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of iplc
-- ----------------------------

-- ----------------------------
-- Table structure for isip
-- ----------------------------
DROP TABLE IF EXISTS `isip`;
CREATE TABLE `isip` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `statustempat_id` int(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `bentukbangunan_id` int(255) DEFAULT NULL,
  `butara` text,
  `btimur` text,
  `bselatan` text,
  `bbarat` text,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `indeksgangguan_id` int(255) DEFAULT NULL,
  `indekslokasi_id` int(255) DEFAULT NULL,
  `retribusi` varchar(255) DEFAULT NULL,
  `tglsurvey` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `lokasi_sumur` varchar(255) DEFAULT NULL,
  `nomor_sumur` varchar(255) DEFAULT NULL,
  `koordinat_sumur` varchar(255) DEFAULT NULL,
  `kedalaman_sumur` int(255) DEFAULT NULL,
  `rencana_debit_air` varchar(255) DEFAULT NULL,
  `kedalaman_screen` int(255) DEFAULT NULL,
  `pelaksana_pengeboran` text,
  `alamat_pelaksana` text,
  `nomor_sippat` varchar(255) DEFAULT NULL,
  `nomor_sub` varchar(255) DEFAULT NULL,
  `juru_bor` text,
  `instalasi_mesin_bor` varchar(255) DEFAULT NULL,
  `keperluan` text,
  `peruntukan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of isip
-- ----------------------------

-- ----------------------------
-- Table structure for isipa
-- ----------------------------
DROP TABLE IF EXISTS `isipa`;
CREATE TABLE `isipa` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `statustempat_id` int(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `bentukbangunan_id` int(255) DEFAULT NULL,
  `butara` text,
  `btimur` text,
  `bselatan` text,
  `bbarat` text,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `indeksgangguan_id` int(255) DEFAULT NULL,
  `indekslokasi_id` int(255) DEFAULT NULL,
  `retribusi` varchar(255) DEFAULT NULL,
  `tglsurvey` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `peruntukan` text,
  `lokasi_sumur` text,
  `nomor_sumur` text,
  `koordinat_sumur` text,
  `kedalaman_sumur` int(255) DEFAULT NULL,
  `rencana_debit_air` text,
  `kedalaman_screen` text,
  `keperluan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of isipa
-- ----------------------------

-- ----------------------------
-- Table structure for itr
-- ----------------------------
DROP TABLE IF EXISTS `itr`;
CREATE TABLE `itr` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `nomor_kendaran` varchar(255) DEFAULT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `alamat_pemilik` text,
  `no_hp` varchar(255) DEFAULT NULL,
  `nomor_rangka` varchar(255) DEFAULT NULL,
  `nomor_mesin` varchar(255) DEFAULT NULL,
  `kode_trayek` varchar(255) DEFAULT NULL,
  `nomor_uji_berkala` varchar(255) DEFAULT NULL,
  `peruntukan` text,
  `rt` text,
  `no_surat_permohonan` text,
  `tgl_surat_permohonan` date DEFAULT NULL,
  `no_rekomendasi` text,
  `tgl_rekomendasi` date DEFAULT NULL,
  `merk_kendaraan` text,
  `tahun_pembuatan` text,
  `daya_angkut` text,
  `kode_pelayanan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of itr
-- ----------------------------

-- ----------------------------
-- Table structure for iujk
-- ----------------------------
DROP TABLE IF EXISTS `iujk`;
CREATE TABLE `iujk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT NULL,
  `jenisjasa_id` tinyint(4) NOT NULL DEFAULT '0',
  `grade` tinyint(4) DEFAULT '1',
  `tglsurvey` date NOT NULL,
  `tglrekomendasi` date NOT NULL,
  `dirut1` varchar(100) DEFAULT NULL,
  `dirut2` varchar(100) DEFAULT NULL,
  `dirut3` varchar(100) DEFAULT NULL,
  `nama_pjt` varchar(100) DEFAULT NULL,
  `no_pjt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`jenisjasa_id`),
  KEY `iujk_permohonan` (`permohonan_id`) USING BTREE,
  KEY `iujk_perusahaan` (`perusahaan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of iujk
-- ----------------------------

-- ----------------------------
-- Table structure for iujkbidang
-- ----------------------------
DROP TABLE IF EXISTS `iujkbidang`;
CREATE TABLE `iujkbidang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iujk_id` int(11) DEFAULT NULL,
  `bidangjasa_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iujkbidang_iujk` (`iujk_id`) USING BTREE,
  KEY `iujkbidung_bidang` (`bidangjasa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of iujkbidang
-- ----------------------------

-- ----------------------------
-- Table structure for iujklayanan
-- ----------------------------
DROP TABLE IF EXISTS `iujklayanan`;
CREATE TABLE `iujklayanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iujk_id` int(11) DEFAULT NULL,
  `layanan_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iujklayanan_iujk` (`iujk_id`) USING BTREE,
  KEY `iujklayanan_layanan` (`layanan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of iujklayanan
-- ----------------------------

-- ----------------------------
-- Table structure for iujksubbidang
-- ----------------------------
DROP TABLE IF EXISTS `iujksubbidang`;
CREATE TABLE `iujksubbidang` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `iujk_id` int(255) DEFAULT NULL,
  `bidangjasa_sub_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of iujksubbidang
-- ----------------------------

-- ----------------------------
-- Table structure for iujktarif
-- ----------------------------
DROP TABLE IF EXISTS `iujktarif`;
CREATE TABLE `iujktarif` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kualifikasi_id` tinyint(4) NOT NULL,
  `jenisjasa_id` tinyint(4) NOT NULL,
  `tarif` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of iujktarif
-- ----------------------------

-- ----------------------------
-- Table structure for iusbw
-- ----------------------------
DROP TABLE IF EXISTS `iusbw`;
CREATE TABLE `iusbw` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` int(255) DEFAULT NULL,
  `statustempat_id` int(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kecamatan_id` int(255) DEFAULT NULL,
  `desa_id` int(255) DEFAULT NULL,
  `bentukbangunan_id` int(255) DEFAULT NULL,
  `butara` text,
  `btimur` text,
  `bselatan` text,
  `bbarat` text,
  `permohonan_id` int(255) DEFAULT NULL,
  `perusahaan_id` int(255) DEFAULT NULL,
  `indeksgangguan_id` int(255) DEFAULT NULL,
  `indekslokasi_id` int(255) DEFAULT NULL,
  `retribusi` varchar(255) DEFAULT NULL,
  `tglsurvey` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of iusbw
-- ----------------------------

-- ----------------------------
-- Table structure for jenisjasa
-- ----------------------------
DROP TABLE IF EXISTS `jenisjasa`;
CREATE TABLE `jenisjasa` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jenisjasa
-- ----------------------------

-- ----------------------------
-- Table structure for jenisreklame
-- ----------------------------
DROP TABLE IF EXISTS `jenisreklame`;
CREATE TABLE `jenisreklame` (
  `id` tinyint(4) NOT NULL,
  `reklame` varchar(200) DEFAULT NULL,
  `bbongkar` float NOT NULL COMMENT 'biaya bongkar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jenisreklame
-- ----------------------------

-- ----------------------------
-- Table structure for jpermohonan
-- ----------------------------
DROP TABLE IF EXISTS `jpermohonan`;
CREATE TABLE `jpermohonan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jpermohonan
-- ----------------------------

-- ----------------------------
-- Table structure for jusaha
-- ----------------------------
DROP TABLE IF EXISTS `jusaha`;
CREATE TABLE `jusaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `usaha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of jusaha
-- ----------------------------

-- ----------------------------
-- Table structure for kabkota
-- ----------------------------
DROP TABLE IF EXISTS `kabkota`;
CREATE TABLE `kabkota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi_id` int(11) DEFAULT NULL,
  `kabkota` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kabkota_propinsi` (`propinsi_id`) USING BTREE,
  CONSTRAINT `kabkota_propinsi` FOREIGN KEY (`propinsi_id`) REFERENCES `propinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kabkota
-- ----------------------------

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi_id` int(11) DEFAULT NULL,
  `kabkota_id` int(11) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kecamatan_propinsi` (`propinsi_id`) USING BTREE,
  KEY `kecamatan_kabkota` (`kabkota_id`) USING BTREE,
  CONSTRAINT `kecamatan_kabkota` FOREIGN KEY (`kabkota_id`) REFERENCES `kabkota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `kecamatan_propinsi` FOREIGN KEY (`propinsi_id`) REFERENCES `propinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------

-- ----------------------------
-- Table structure for kelasjalan
-- ----------------------------
DROP TABLE IF EXISTS `kelasjalan`;
CREATE TABLE `kelasjalan` (
  `id` smallint(6) NOT NULL,
  `kelasjalan` varchar(100) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kelasjalan
-- ----------------------------

-- ----------------------------
-- Table structure for kelembagaan
-- ----------------------------
DROP TABLE IF EXISTS `kelembagaan`;
CREATE TABLE `kelembagaan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kelembagaan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kelembagaan
-- ----------------------------

-- ----------------------------
-- Table structure for klui
-- ----------------------------
DROP TABLE IF EXISTS `klui`;
CREATE TABLE `klui` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kbli` int(255) DEFAULT NULL,
  `kegiatan_pokok` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of klui
-- ----------------------------

-- ----------------------------
-- Table structure for konstruksi
-- ----------------------------
DROP TABLE IF EXISTS `konstruksi`;
CREATE TABLE `konstruksi` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of konstruksi
-- ----------------------------

-- ----------------------------
-- Table structure for kpi
-- ----------------------------
DROP TABLE IF EXISTS `kpi`;
CREATE TABLE `kpi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ijin_id` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `petugas` varchar(100) NOT NULL,
  `mulai` tinyint(4) NOT NULL COMMENT '1=tgl permohonan, 2= tgl bayar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kpi
-- ----------------------------

-- ----------------------------
-- Table structure for kualifikasi
-- ----------------------------
DROP TABLE IF EXISTS `kualifikasi`;
CREATE TABLE `kualifikasi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kualifikasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kualifikasi
-- ----------------------------

-- ----------------------------
-- Table structure for kusaha
-- ----------------------------
DROP TABLE IF EXISTS `kusaha`;
CREATE TABLE `kusaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of kusaha
-- ----------------------------

-- ----------------------------
-- Table structure for layanan
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of layanan
-- ----------------------------

-- ----------------------------
-- Table structure for listreklame
-- ----------------------------
DROP TABLE IF EXISTS `listreklame`;
CREATE TABLE `listreklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reklame_id` int(11) DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `panjang` float DEFAULT NULL,
  `lebar` float DEFAULT NULL,
  `retribusi` double DEFAULT NULL,
  `jenisreklame_id` tinyint(4) DEFAULT NULL,
  `retribusireklame_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listreklame_reklame` (`reklame_id`) USING BTREE,
  KEY `listreklame_jenis` (`jenisreklame_id`) USING BTREE,
  KEY `listreklame_retribusi` (`retribusireklame_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of listreklame
-- ----------------------------

-- ----------------------------
-- Table structure for lokasibangunan
-- ----------------------------
DROP TABLE IF EXISTS `lokasibangunan`;
CREATE TABLE `lokasibangunan` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lokasi` mediumblob,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of lokasibangunan
-- ----------------------------

-- ----------------------------
-- Table structure for lokasireklame
-- ----------------------------
DROP TABLE IF EXISTS `lokasireklame`;
CREATE TABLE `lokasireklame` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `klasifikasi` varchar(45) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of lokasireklame
-- ----------------------------

-- ----------------------------
-- Table structure for loklistreklame
-- ----------------------------
DROP TABLE IF EXISTS `loklistreklame`;
CREATE TABLE `loklistreklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listreklame_id` int(11) DEFAULT NULL,
  `lokasireklame_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `loklistreklame_listreklame` (`listreklame_id`) USING BTREE,
  KEY `loklistreklame_lokasireklame` (`lokasireklame_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of loklistreklame
-- ----------------------------

-- ----------------------------
-- Table structure for master
-- ----------------------------
DROP TABLE IF EXISTS `master`;
CREATE TABLE `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tabel` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `insert` tinyint(1) NOT NULL DEFAULT '1',
  `update` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of master
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of master_ijin
-- ----------------------------
INSERT INTO `master_ijin` VALUES ('1', 'Ijin Depo Air Minum', 'dr. Indriati Asad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');
INSERT INTO `master_ijin` VALUES ('2', 'Ijin Pengambilan Mineral Bukan Logam dan Batuan', 'Rachman, SE', '19570411 198503 1 010', 'Kepala Badan Pelayanan Perijinan Terpadu Dan Penanaman Modal', 'Pembina Utama Muda', '5 hari');
INSERT INTO `master_ijin` VALUES ('3', 'Ijin Usaha Jasa Titipan', 'Drs. Akhmad Suharto, M.Si', '19660910 198609 1 001', 'Kepala Dinas Perhubungan Komunikasi dan Informatika', 'Pembina Tingkat 1', '5 hari');
INSERT INTO `master_ijin` VALUES ('4', 'Ijin Usaha Jasa Konstruksi', 'Rachman, SE', '19570411 198503 1 010', 'Kepala Badan Pelayanan Perijinan Terpadu Dan Penanaman Modal', 'Pembina Utama Muda', '5 hari');
INSERT INTO `master_ijin` VALUES ('5', 'Ijin Apotek', 'dr. Indriati As\'ad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');

-- ----------------------------
-- Table structure for master_syarat
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat`;
CREATE TABLE `master_syarat` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SYARAT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

-- ----------------------------
-- Table structure for master_user
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('1', 'admin', 'admin', 'Administrator', '19991011010101', '081303190712', 'admin@yahoo.com', '1');
INSERT INTO `master_user` VALUES ('2', 'noval', 'noval', 'Noval Debby Prasetyono', null, '03160684753', 'nvl@yahoo.com', '2');
INSERT INTO `master_user` VALUES ('3', 'pras', 'pras', 'Prasetyono, Noval Debby', null, '03160684753', 'pras@yahoo.com', '2');

-- ----------------------------
-- Table structure for merk
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `merk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of merk
-- ----------------------------

-- ----------------------------
-- Table structure for m_pemohon
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of m_pemohon
-- ----------------------------
INSERT INTO `m_pemohon` VALUES ('19', 'Noval Debby Prasetyono', 'Jl. Menganti Lidah Kulon', '03160684753', 'NPWP/01/12/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '3578180712940001', 'STRA/01/12/2013', 'SuratTugas/03/12/2013', 'Programmer', 'Surabaya', '1994-12-07', '2', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('20', 'Prasetyono Noval Debby', 'Llidah Kulon', '03160675384', 'NPWP/02/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '3578180712940002', 'STRA', 'ST', 'Programmer', 'Surabaya', '1994-12-07', '3', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('22', 'Noval - IPMBL', 'Lidah Kulon', '03160684753', 'NPWP', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '3578180712940003', 'STRA', 'Surat Tugas', 'Pekerjaan', 'Surabaya', '1994-12-07', '2', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('23', 'Noval - Apotek', 'Lidah Kulon No. 512', '03160684753', 'npwp/01/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '12345678901234', 'STRA/01/2013', 'Surat Tugas/01/2013', 'Apoteker', 'Surabaya', '1994-12-07', '2', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('24', 'Noval - IUJK', 'Lidah Kulon', '031606', 'NPWP/1/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', null, '1234567', 'stra', 'st', 'programmer', 'surabaya', '2013-12-31', '2', 'D3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('29', 'Noval - SIPD', 'Lidah Kulon', '031', 'npwp/1/2013', '5', '5', 'lidah kulon', 'lakarsantri', null, '123123', '', '', 'programmer', 'surabaya', '1994-12-07', '2', 'd3', '2013', null, null);
INSERT INTO `m_pemohon` VALUES ('32', 'Noval - MB', 'lidah kulon', '031', 'npwp/1', '5', '5', 'lidah kulon', 'lakarsantri', null, '121231', '', '', 'programmer', 'surabaya', '1994-12-07', '1', 'd3', '2013', null, null);

-- ----------------------------
-- Table structure for m_perlengkapan_apotek
-- ----------------------------
DROP TABLE IF EXISTS `m_perlengkapan_apotek`;
CREATE TABLE `m_perlengkapan_apotek` (
  `perlengkapan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perlengkapan_order` int(11) DEFAULT NULL,
  `perlengkapan_group` int(11) DEFAULT NULL,
  `perlengkapan_nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`perlengkapan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of m_perlengkapan_apotek
-- ----------------------------
INSERT INTO `m_perlengkapan_apotek` VALUES ('1', '1', '1', 'a. Alat Pembuatan, Pengolahan dan Peracikan Obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('2', '2', '0', '1) Timbangan miligram dengan anak timbangan yang sudah ditera');
INSERT INTO `m_perlengkapan_apotek` VALUES ('3', '3', '0', '2) Timbangan gram dengan anak timbangan yang sudah ditera');
INSERT INTO `m_perlengkapan_apotek` VALUES ('4', '4', '0', '3) Perlengkapan lain disesuaikan dengan kebutuhan');
INSERT INTO `m_perlengkapan_apotek` VALUES ('5', '5', '1', 'b. Perlengkapan dan Alat Perbekalan Farmasi');
INSERT INTO `m_perlengkapan_apotek` VALUES ('6', '6', '0', '1) Lemari dan Rak untuk penyimpanan obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('7', '7', '0', '2) Lemari Pendingin');
INSERT INTO `m_perlengkapan_apotek` VALUES ('8', '8', '0', '3) Lemari untuk penyimpanan narkotika dan psikotropika');
INSERT INTO `m_perlengkapan_apotek` VALUES ('9', '9', '1', 'c. Wadah pengemas dan pembungkus untuk penyerahan obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('10', '10', '0', '1) Etiket');
INSERT INTO `m_perlengkapan_apotek` VALUES ('11', '11', '0', '2) Wadah pengemas dan pembungkus untuk penyerahan obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('12', '12', '1', 'd. Alat Administrasi');
INSERT INTO `m_perlengkapan_apotek` VALUES ('13', '13', '0', '1) Blanko pesanan obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('14', '14', '0', '2) Blanko kartu stok obat');
INSERT INTO `m_perlengkapan_apotek` VALUES ('15', '15', '0', '3) Blanko salinan resep');
INSERT INTO `m_perlengkapan_apotek` VALUES ('16', '16', '0', '4) Blanko Faktur');
INSERT INTO `m_perlengkapan_apotek` VALUES ('17', '17', '0', '5) Blanko nota penjulana');
INSERT INTO `m_perlengkapan_apotek` VALUES ('18', '18', '0', '6) Buku pencatatan narkotika');
INSERT INTO `m_perlengkapan_apotek` VALUES ('19', '19', '0', '7) Buku pesanan obat narkotika');
INSERT INTO `m_perlengkapan_apotek` VALUES ('20', '20', '0', '8) Form laporan obat narkotika');
INSERT INTO `m_perlengkapan_apotek` VALUES ('21', '21', '1', 'e. Lain-lain');
INSERT INTO `m_perlengkapan_apotek` VALUES ('22', '22', '0', '1) Buku standar yang diwajibkan');
INSERT INTO `m_perlengkapan_apotek` VALUES ('23', '23', '0', '2) Kumpulan perundang-undangan yang berhubungan dengan apotek');

-- ----------------------------
-- Table structure for noformulir
-- ----------------------------
DROP TABLE IF EXISTS `noformulir`;
CREATE TABLE `noformulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of noformulir
-- ----------------------------

-- ----------------------------
-- Table structure for noregistrasi
-- ----------------------------
DROP TABLE IF EXISTS `noregistrasi`;
CREATE TABLE `noregistrasi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ijin_id` tinyint(4) DEFAULT NULL,
  `format` varchar(40) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of noregistrasi
-- ----------------------------

-- ----------------------------
-- Table structure for nosk
-- ----------------------------
DROP TABLE IF EXISTS `nosk`;
CREATE TABLE `nosk` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  `ijin` varchar(100) DEFAULT NULL,
  `format` varchar(40) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of nosk
-- ----------------------------
INSERT INTO `nosk` VALUES ('1', '2013', '1', 'xC/006/DAM/xB/xT/DISKES.05', '20');
INSERT INTO `nosk` VALUES ('2', '2014', '1', 'xC/006/DAM/xB/xT/DISKES.05', '3');

-- ----------------------------
-- Table structure for pameran
-- ----------------------------
DROP TABLE IF EXISTS `pameran`;
CREATE TABLE `pameran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `peruntukan` varchar(200) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `permohonan_id` (`permohonan_id`) USING BTREE,
  KEY `kecamatan_id` (`kecamatan_id`) USING BTREE,
  KEY `desa_id` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pameran
-- ----------------------------

-- ----------------------------
-- Table structure for pemohon
-- ----------------------------
DROP TABLE IF EXISTS `pemohon`;
CREATE TABLE `pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `ktp` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `warga_id` tinyint(4) DEFAULT NULL,
  `propinsi_id` tinyint(4) DEFAULT NULL,
  `kabkota_id` tinyint(4) DEFAULT NULL,
  `kecamatan_id` tinyint(4) DEFAULT NULL,
  `desa_id` tinyint(4) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pemohon_propinsi` (`propinsi_id`) USING BTREE,
  KEY `pemohon_kabkota` (`kabkota_id`) USING BTREE,
  KEY `pemohon_kecamatan` (`kecamatan_id`) USING BTREE,
  KEY `pemohon_desa` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pemohon
-- ----------------------------

-- ----------------------------
-- Table structure for pengaduan
-- ----------------------------
DROP TABLE IF EXISTS `pengaduan`;
CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `hp` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pengaduan` tinytext NOT NULL,
  `jawaban` tinytext,
  `tglpengaduan` datetime DEFAULT NULL,
  `user_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pengaduan
-- ----------------------------

-- ----------------------------
-- Table structure for pengurus
-- ----------------------------
DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengurus_perusahaan` (`perusahaan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pengurus
-- ----------------------------

-- ----------------------------
-- Table structure for peralatan
-- ----------------------------
DROP TABLE IF EXISTS `peralatan`;
CREATE TABLE `peralatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah` smallint(6) DEFAULT NULL,
  `kondisi_id` tinyint(4) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `peralatan_perusahaan` (`perusahaan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of peralatan
-- ----------------------------

-- ----------------------------
-- Table structure for permohonan
-- ----------------------------
DROP TABLE IF EXISTS `permohonan`;
CREATE TABLE `permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jpermohonan_id` tinyint(4) NOT NULL DEFAULT '0',
  `tahun` varchar(4) DEFAULT NULL,
  `noregistrasi` varchar(50) DEFAULT NULL,
  `ijin_id` tinyint(4) DEFAULT NULL,
  `pemohon_id` int(11) DEFAULT NULL,
  `tglpermohonan` datetime DEFAULT NULL,
  `nosk` varchar(50) DEFAULT NULL,
  `tglsk` datetime DEFAULT NULL,
  `tglexpired` date DEFAULT NULL,
  `pejabat` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `atasnama` varchar(100) DEFAULT NULL,
  `sbayar` tinyint(4) NOT NULL DEFAULT '0',
  `tglbayar` date DEFAULT NULL,
  `ketbayar` tinytext,
  `retribusi` double NOT NULL DEFAULT '0',
  `spermohonan_id` tinyint(4) NOT NULL DEFAULT '1',
  `jumlah_bibit` int(11) DEFAULT NULL,
  `nama_bibit` varchar(150) DEFAULT NULL,
  `no_agenda` varchar(11) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  `catatan_bo` text,
  PRIMARY KEY (`id`),
  KEY `permohonan_pemohon` (`pemohon_id`) USING BTREE,
  KEY `permohonan_ijin` (`ijin_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permohonan
-- ----------------------------

-- ----------------------------
-- Table structure for permohonanjenis
-- ----------------------------
DROP TABLE IF EXISTS `permohonanjenis`;
CREATE TABLE `permohonanjenis` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ijin_id` tinyint(4) NOT NULL,
  `jpermohonan_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permohonanjenis
-- ----------------------------

-- ----------------------------
-- Table structure for permohonanstatus
-- ----------------------------
DROP TABLE IF EXISTS `permohonanstatus`;
CREATE TABLE `permohonanstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `spermohonan_id` tinyint(4) DEFAULT NULL,
  `tglupdate` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permohonanstatus
-- ----------------------------

-- ----------------------------
-- Table structure for permohonansyarat
-- ----------------------------
DROP TABLE IF EXISTS `permohonansyarat`;
CREATE TABLE `permohonansyarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `syarat_id` smallint(6) DEFAULT NULL,
  `keterangan` mediumtext,
  `tglterima` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `permohonansyarat_permohonan` (`permohonan_id`) USING BTREE,
  KEY `permohonansyarat_syarat` (`syarat_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permohonansyarat
-- ----------------------------

-- ----------------------------
-- Table structure for perusahaan
-- ----------------------------
DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `npwp` varchar(100) DEFAULT NULL COMMENT 'NPWP Perusahaan',
  `nama` varchar(100) DEFAULT NULL,
  `noakta` varchar(100) DEFAULT NULL COMMENT 'No Akte Pendirian',
  `notaris` varchar(100) DEFAULT NULL,
  `tglakta` date DEFAULT NULL,
  `bentuk_id` tinyint(4) DEFAULT NULL COMMENT 'Bentuk Perusahaan\n1. PT\n2. BUMN\n3. Koperasi\n4. CV\n5. Persekutuan Firma\n6. Perusahaan Perorangan',
  `kualifikasi_id` tinyint(4) DEFAULT '1',
  `alamat` varchar(100) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `propinsi_id` int(11) DEFAULT NULL,
  `kabkota_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `kodepos` varchar(45) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `stempat_id` tinyint(4) DEFAULT NULL,
  `sperusahaan_id` tinyint(4) DEFAULT NULL,
  `usaha` text,
  `butara` varchar(100) DEFAULT NULL,
  `bselatan` varchar(100) DEFAULT NULL,
  `btimur` varchar(100) DEFAULT NULL,
  `bbarat` varchar(100) DEFAULT NULL,
  `modal` double DEFAULT NULL,
  `merk` tinyint(4) DEFAULT NULL COMMENT 'Merek\n1. Milik sendiri\n2. Lisensi',
  `jusaha_id` int(11) DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `perusahaan_statustempat` (`stempat_id`) USING BTREE,
  KEY `perusahaan_bentuk` (`bentuk_id`) USING BTREE,
  KEY `perusahaan_propinsi` (`propinsi_id`) USING BTREE,
  KEY `perusahaan_kabkota` (`kabkota_id`) USING BTREE,
  KEY `perusahaan_kecamatan` (`kecamatan_id`) USING BTREE,
  KEY `perusahaan_desa` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of perusahaan
-- ----------------------------

-- ----------------------------
-- Table structure for propinsi
-- ----------------------------
DROP TABLE IF EXISTS `propinsi`;
CREATE TABLE `propinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of propinsi
-- ----------------------------

-- ----------------------------
-- Table structure for reklame
-- ----------------------------
DROP TABLE IF EXISTS `reklame`;
CREATE TABLE `reklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `ho_id` int(11) DEFAULT NULL,
  `tglberlaku` date DEFAULT NULL,
  `tglberakhir` date DEFAULT NULL,
  `retribusi` float DEFAULT NULL,
  `expiredpajak` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reklame_permohonan` (`permohonan_id`) USING BTREE,
  KEY `reklame_perusahaan` (`perusahaan_id`) USING BTREE,
  KEY `reklame_ho` (`ho_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of reklame
-- ----------------------------

-- ----------------------------
-- Table structure for reklamedetail
-- ----------------------------
DROP TABLE IF EXISTS `reklamedetail`;
CREATE TABLE `reklamedetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) NOT NULL,
  `jenisreklame_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(200) NOT NULL,
  `cakupan_media` varchar(255) NOT NULL,
  `ilreklame_id` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `tanah_pemerintah` tinyint(1) NOT NULL COMMENT '0=tidak,1=ya',
  `sifat_reklame` tinyint(1) NOT NULL COMMENT '0=komersial,1=sosial',
  `rokok_alkohol` tinyint(1) NOT NULL COMMENT '0=tidak,1=ya',
  `tempat` varchar(255) NOT NULL,
  `tglmulai` date NOT NULL,
  `jangkawaktu` int(11) NOT NULL,
  `satuanwaktu_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of reklamedetail
-- ----------------------------

-- ----------------------------
-- Table structure for rekomendasi
-- ----------------------------
DROP TABLE IF EXISTS `rekomendasi`;
CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `nmpejabat` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `tambang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rekomendasi_tambang` (`tambang_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of rekomendasi
-- ----------------------------

-- ----------------------------
-- Table structure for retfsbangunan
-- ----------------------------
DROP TABLE IF EXISTS `retfsbangunan`;
CREATE TABLE `retfsbangunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `imb_id` int(11) DEFAULT NULL,
  `fsbangunan_id` tinyint(4) DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retfsbangunan_imb` (`imb_id`) USING BTREE,
  KEY `retfsbangunan_fsbangunan` (`fsbangunan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of retfsbangunan
-- ----------------------------

-- ----------------------------
-- Table structure for retjusaha
-- ----------------------------
DROP TABLE IF EXISTS `retjusaha`;
CREATE TABLE `retjusaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jusaha_id` tinyint(4) NOT NULL,
  `bmin` double NOT NULL,
  `bmax` double NOT NULL,
  `tarif` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of retjusaha
-- ----------------------------

-- ----------------------------
-- Table structure for retkonstruksi
-- ----------------------------
DROP TABLE IF EXISTS `retkonstruksi`;
CREATE TABLE `retkonstruksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` varchar(4) DEFAULT NULL,
  `imb_id` int(11) DEFAULT NULL,
  `konstruksi_id` tinyint(4) DEFAULT NULL,
  `luas` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `retkonstruksi_imb` (`imb_id`) USING BTREE,
  KEY `retkonstruksi_konstruksi` (`konstruksi_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of retkonstruksi
-- ----------------------------

-- ----------------------------
-- Table structure for retreklame
-- ----------------------------
DROP TABLE IF EXISTS `retreklame`;
CREATE TABLE `retreklame` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jenisreklame_id` tinyint(4) DEFAULT NULL,
  `satuan` varchar(45) DEFAULT NULL,
  `tarif` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of retreklame
-- ----------------------------

-- ----------------------------
-- Table structure for satuanwaktu
-- ----------------------------
DROP TABLE IF EXISTS `satuanwaktu`;
CREATE TABLE `satuanwaktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(20) NOT NULL,
  `pengali` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of satuanwaktu
-- ----------------------------

-- ----------------------------
-- Table structure for sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `sertifikat`;
CREATE TABLE `sertifikat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sertifikat
-- ----------------------------

-- ----------------------------
-- Table structure for siup
-- ----------------------------
DROP TABLE IF EXISTS `siup`;
CREATE TABLE `siup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(11) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT '0',
  `kusaha_id` tinyint(4) DEFAULT '0',
  `kbli` tinytext,
  `kelembagaan_id` tinyint(4) DEFAULT '0',
  `lembaga` tinytext,
  `busaha_id` tinyint(4) DEFAULT '0',
  `merk_id` tinyint(4) DEFAULT '0',
  `dagangan` text,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `siup_perusahaan` (`perusahaan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of siup
-- ----------------------------

-- ----------------------------
-- Table structure for sktr
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
  PRIMARY KEY (`ID_SKTR`),
  KEY `FK_PEMOHON_SKTR` (`ID_PEMOHON`) USING BTREE,
  CONSTRAINT `FK_PEMOHON_SKTR` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sktr
-- ----------------------------

-- ----------------------------
-- Table structure for spermohonan
-- ----------------------------
DROP TABLE IF EXISTS `spermohonan`;
CREATE TABLE `spermohonan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of spermohonan
-- ----------------------------

-- ----------------------------
-- Table structure for sperusahaan
-- ----------------------------
DROP TABLE IF EXISTS `sperusahaan`;
CREATE TABLE `sperusahaan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sperusahaan
-- ----------------------------

-- ----------------------------
-- Table structure for sppl
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
  PRIMARY KEY (`ID_SPPL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sppl
-- ----------------------------
INSERT INTO `sppl` VALUES ('1', '1', '21', null, null, 'Usaha', 'PJ', '031606', 'Jenis Usaha', 'Alamat usaha', '1', 'akta', '2013-12-31', '2013-12-31', '10', '10', '10', '10', null, null, '2013-12-31');

-- ----------------------------
-- Table structure for statustempat
-- ----------------------------
DROP TABLE IF EXISTS `statustempat`;
CREATE TABLE `statustempat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of statustempat
-- ----------------------------

-- ----------------------------
-- Table structure for stempat
-- ----------------------------
DROP TABLE IF EXISTS `stempat`;
CREATE TABLE `stempat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of stempat
-- ----------------------------

-- ----------------------------
-- Table structure for struktur
-- ----------------------------
DROP TABLE IF EXISTS `struktur`;
CREATE TABLE `struktur` (
  `id` tinyint(4) NOT NULL,
  `struktur` tinytext,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of struktur
-- ----------------------------

-- ----------------------------
-- Table structure for suratjalan
-- ----------------------------
DROP TABLE IF EXISTS `suratjalan`;
CREATE TABLE `suratjalan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `pejabat` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `atasnama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of suratjalan
-- ----------------------------

-- ----------------------------
-- Table structure for syarat
-- ----------------------------
DROP TABLE IF EXISTS `syarat`;
CREATE TABLE `syarat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `syarat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of syarat
-- ----------------------------

-- ----------------------------
-- Table structure for tandatangan
-- ----------------------------
DROP TABLE IF EXISTS `tandatangan`;
CREATE TABLE `tandatangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pejabat` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `atasnama` varchar(100) NOT NULL,
  `dokumen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tandatangan
-- ----------------------------

-- ----------------------------
-- Table structure for tdp
-- ----------------------------
DROP TABLE IF EXISTS `tdp`;
CREATE TABLE `tdp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) NOT NULL,
  `perusahaan_id` int(11) NOT NULL,
  `klui` varchar(100) NOT NULL,
  `klui_pokok` varchar(255) NOT NULL,
  `no_menkeh` varchar(100) NOT NULL,
  `tgl_menkeh` date NOT NULL,
  `no_aapad` varchar(100) NOT NULL,
  `tgl_aapad` date NOT NULL,
  `no_lpad` varchar(100) NOT NULL,
  `tgl_lpad` date NOT NULL,
  `counter_daftar` int(11) NOT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tdp
-- ----------------------------

-- ----------------------------
-- Table structure for tenaga
-- ----------------------------
DROP TABLE IF EXISTS `tenaga`;
CREATE TABLE `tenaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenagajenis_id` tinyint(4) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempatlahir` varchar(100) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenaga_perusahaan` (`perusahaan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tenaga
-- ----------------------------

-- ----------------------------
-- Table structure for tgl_libur
-- ----------------------------
DROP TABLE IF EXISTS `tgl_libur`;
CREATE TABLE `tgl_libur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tgl_libur
-- ----------------------------

-- ----------------------------
-- Table structure for tokoobat
-- ----------------------------
DROP TABLE IF EXISTS `tokoobat`;
CREATE TABLE `tokoobat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namatoko` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `permohonan_id` int(11) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `retribusi` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tokoobat_permohonan` (`permohonan_id`) USING BTREE,
  KEY `tokoobat_kecamatan` (`kecamatan_id`) USING BTREE,
  KEY `tokoobat_desa` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of tokoobat
-- ----------------------------

-- ----------------------------
-- Table structure for trayek
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of trayek
-- ----------------------------

-- ----------------------------
-- Table structure for trayek_inti
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of trayek_inti
-- ----------------------------

-- ----------------------------
-- Table structure for t_apotek
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_apotek
-- ----------------------------
INSERT INTO `t_apotek` VALUES ('1', 'Apotek Coba', 'Jl. Tulip 7', '0317079312', 'Lidah Kulon', 'Lakarsantri', '1', 'Noval Debby Prasetyono', 'Lidah Kulon', 'NPWP/01/2013', 'SIUP/01/2013');

-- ----------------------------
-- Table structure for t_apotek_asisten
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_asisten`;
CREATE TABLE `t_apotek_asisten` (
  `asisten_id` int(11) NOT NULL AUTO_INCREMENT,
  `asisten_apotek_id` int(11) DEFAULT NULL,
  `asisten_apotekdet_id` int(11) DEFAULT NULL,
  `asisten_nama` varchar(50) DEFAULT NULL,
  `asisten_sik` varchar(50) DEFAULT NULL,
  `asisten_lulus` varchar(10) DEFAULT NULL,
  `asisten_alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`asisten_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_apotek_asisten
-- ----------------------------
INSERT INTO `t_apotek_asisten` VALUES ('1', '1', '1', 'asisten2', 'sik2', '2013', 'alamat2');
INSERT INTO `t_apotek_asisten` VALUES ('2', '1', '1', 'asisten1', 'sik1', '2013', 'alamat1');

-- ----------------------------
-- Table structure for t_apotek_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_apotek_ceklist
-- ----------------------------
INSERT INTO `t_apotek_ceklist` VALUES ('1', '1', '1', '30', '0', 'sip');
INSERT INTO `t_apotek_ceklist` VALUES ('2', '1', '1', '31', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('3', '1', '1', '32', '1', 'sip');
INSERT INTO `t_apotek_ceklist` VALUES ('4', '1', '1', '33', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('5', '1', '1', '34', '1', '');
INSERT INTO `t_apotek_ceklist` VALUES ('6', '1', '1', '35', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('7', '1', '1', '36', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('8', '1', '1', '37', '1', 'sip');
INSERT INTO `t_apotek_ceklist` VALUES ('9', '1', '1', '38', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('10', '1', '1', '39', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('11', '1', '1', '40', '1', '');
INSERT INTO `t_apotek_ceklist` VALUES ('12', '1', '1', '41', '1', '');
INSERT INTO `t_apotek_ceklist` VALUES ('13', '1', '1', '42', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('14', '1', '1', '43', '1', '');
INSERT INTO `t_apotek_ceklist` VALUES ('15', '1', '1', '44', '0', '');
INSERT INTO `t_apotek_ceklist` VALUES ('16', '1', '1', '46', '0', '');

-- ----------------------------
-- Table structure for t_apotek_det
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_apotek_det
-- ----------------------------
INSERT INTO `t_apotek_det` VALUES ('1', '1', '1', '2013-12-31', '23', '1', 'penerima', '2013-12-31', '1', 'bap', '2013-12-31', '1', 'keterangan', '10', '1', '1', '1', '1', '1', 'PDAM', 'PLN', '10', 'Sedang', '10', '1', '1', '1', '1', '2', '5', '5', '10', '1', '0', '0000-00-00', '0000-00-00', 'sertifikat/01/2013', '2013', 'gs/01/2013', '2013-12-31', 'an', 'akta/1/2013', '2013', 'notaris', 'an', 'letterc', 'kec', '2013-12-31', 'petok', 'persil', 'A', 'an', 'pihak1', 'pihak2', 'perjanjian/1/2013', '2013-12-31', 'notaris', '18/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2013-12-31', 'Selesai, belum diambil', null);

-- ----------------------------
-- Table structure for t_apotek_ket
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_apotek_ket
-- ----------------------------
INSERT INTO `t_apotek_ket` VALUES ('1', '1', '1', '1', '1', '1');
INSERT INTO `t_apotek_ket` VALUES ('2', '1', '1', '2', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('3', '1', '1', '3', '1', '0');
INSERT INTO `t_apotek_ket` VALUES ('4', '1', '1', '4', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('5', '1', '1', '5', '1', '0');
INSERT INTO `t_apotek_ket` VALUES ('6', '1', '1', '6', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('7', '1', '1', '7', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('8', '1', '1', '8', '1', '0');
INSERT INTO `t_apotek_ket` VALUES ('9', '1', '1', '9', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('10', '1', '1', '10', '1', '0');
INSERT INTO `t_apotek_ket` VALUES ('11', '1', '1', '11', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('12', '1', '1', '12', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('13', '1', '1', '13', '1', '0');
INSERT INTO `t_apotek_ket` VALUES ('14', '1', '1', '14', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('15', '1', '1', '15', '0', '0');
INSERT INTO `t_apotek_ket` VALUES ('16', '1', '1', '16', '0', '0');

-- ----------------------------
-- Table structure for t_idam
-- ----------------------------
DROP TABLE IF EXISTS `t_idam`;
CREATE TABLE `t_idam` (
  `idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `idam_usaha` varchar(50) DEFAULT NULL,
  `idam_jenisusaha` varchar(50) DEFAULT NULL,
  `idam_alamat` varchar(100) DEFAULT NULL,
  `idam_sertifikatpkp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_idam
-- ----------------------------
INSERT INTO `t_idam` VALUES ('1', 'Usaha Depo Air Minum', 'Depo Air Minum', 'Jl. Menganti Lidah Kulon', 'SPKP/01/12/2013');
INSERT INTO `t_idam` VALUES ('3', 'Usaha Air Minum', 'Jenis', 'Alamat', 'SPKP');

-- ----------------------------
-- Table structure for t_idam_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_idam_ceklist
-- ----------------------------
INSERT INTO `t_idam_ceklist` VALUES ('1', '1', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('2', '2', '1', '1', '0', 'tidak jelas');
INSERT INTO `t_idam_ceklist` VALUES ('3', '3', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('4', '4', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('5', '5', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('6', '6', '1', '1', '0', 'tidak ada');
INSERT INTO `t_idam_ceklist` VALUES ('7', '7', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('8', '8', '1', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('9', '9', '1', '1', '0', 'kurang');
INSERT INTO `t_idam_ceklist` VALUES ('10', '1', '2', '2', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('11', '2', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('12', '3', '2', '2', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('13', '4', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('14', '5', '2', '2', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('15', '6', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('16', '7', '2', '2', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('17', '8', '2', '2', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('18', '9', '2', '2', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('19', '1', '3', '3', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('20', '2', '3', '3', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('21', '3', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('22', '4', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('23', '5', '3', '3', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('24', '6', '3', '3', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('25', '7', '3', '3', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('26', '8', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('27', '9', '3', '3', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('28', '1', '4', '1', '1', 'ok');
INSERT INTO `t_idam_ceklist` VALUES ('29', '2', '4', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('30', '3', '4', '1', '0', 'ok');
INSERT INTO `t_idam_ceklist` VALUES ('31', '4', '4', '1', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('32', '5', '4', '1', '0', 'ok');
INSERT INTO `t_idam_ceklist` VALUES ('33', '6', '4', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('34', '7', '4', '1', '0', 'ok');
INSERT INTO `t_idam_ceklist` VALUES ('35', '8', '4', '1', '1', '');
INSERT INTO `t_idam_ceklist` VALUES ('36', '9', '4', '1', '0', '');
INSERT INTO `t_idam_ceklist` VALUES ('37', '1', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('38', '2', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('39', '3', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('40', '4', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('41', '5', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('42', '6', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('43', '7', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('44', '8', '5', '1', '1', 'sip');
INSERT INTO `t_idam_ceklist` VALUES ('45', '9', '5', '1', '1', 'sip');

-- ----------------------------
-- Table structure for t_idam_det
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_idam_det
-- ----------------------------
INSERT INTO `t_idam_det` VALUES ('1', '1', '1', '2013-12-30', '19', '', '1', 'Keterangan Bap', '01/BAP/2013', '2013-12-31', '1', 'Penerima Berkas', '2013-12-31', '9/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2014-04-30', '0', 'Selesai, sudah diambil');
INSERT INTO `t_idam_det` VALUES ('3', '3', '1', '2013-12-31', '20', '', '1', 'Keterangan', '2013/01/BAP', '2013-12-31', '1', 'Petugas Terima', '2013-12-31', '10/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2014-05-31', '0', 'Selesai, belum diambil');
INSERT INTO `t_idam_det` VALUES ('5', '1', '2', '2013-12-31', '19', '', '1', 'Keterangan', 'BAP', '2013-12-31', '1', 'Petugas Penerima', '2013-12-31', '11/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2014-10-31', '0', 'Selesai, belum diambil');

-- ----------------------------
-- Table structure for t_ipmbl
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_ipmbl
-- ----------------------------
INSERT INTO `t_ipmbl` VALUES ('1', '10', '10', 'Penambangan tanah urug', 'Lidah Kulon', 'Lakarsantri', 'Pengambilan Mineral', 'Jl. Melati 10', 'Jl. Mawar 19');
INSERT INTO `t_ipmbl` VALUES ('2', '10', '10', 'Penambangan tanah urug', 'Lidah Kulon', 'Lakarsantri', 'Pengambilan Mineral', 'Alamat Usaha', 'Jl. Anggrek 1');

-- ----------------------------
-- Table structure for t_ipmbl_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_ipmbl_ceklist
-- ----------------------------
INSERT INTO `t_ipmbl_ceklist` VALUES ('1', '14', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('2', '15', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('3', '16', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('4', '17', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('5', '18', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('6', '19', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('7', '20', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('8', '21', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('9', '22', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('10', '23', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('11', '47', '1', '1', '0', 'Ada');
INSERT INTO `t_ipmbl_ceklist` VALUES ('12', '14', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('13', '15', '2', '2', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('14', '16', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('15', '17', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('16', '18', '2', '2', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('17', '19', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('18', '20', '2', '2', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('19', '21', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('20', '22', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('21', '23', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('22', '47', '2', '2', '0', 'sip');
INSERT INTO `t_ipmbl_ceklist` VALUES ('23', '14', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('24', '15', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('25', '16', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('26', '17', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('27', '18', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('28', '19', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('29', '20', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('30', '21', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('31', '22', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('32', '23', '3', '1', '0', 'oke');
INSERT INTO `t_ipmbl_ceklist` VALUES ('33', '47', '3', '1', '0', 'oke');

-- ----------------------------
-- Table structure for t_ipmbl_det
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_ipmbl_det
-- ----------------------------
INSERT INTO `t_ipmbl_det` VALUES ('1', '1', '1', '2013-12-31', '22', null, '1', '2013-12-31', '2014-01-01', '1', '1', 'Petugas Survey', 'Dinas Penyurvey', '12345678910', 'Pendapat tim survey', '01/BLH/REKOM/XII/2013', '2013-12-31', '01/BLH/KEL/XII/2013', '2013-12-31', '01/BLH/KEC/XII/2013', '2013-12-31', '12/006/DAM/XII/2013/DISKES.05', '2014-04-30', '2013-12-31', 'Selesai, belum diambil');
INSERT INTO `t_ipmbl_det` VALUES ('2', '2', '1', '2013-12-31', '20', null, '1', '2013-12-31', '2013-12-31', '1', '1', 'Petugas Survey', 'Dinas Survey', '1234567777', 'Pendapat tim survey', '01/BLH/XII/REKOM/2013', '2013-12-31', '01/BLH/XII/KEL/2013', '2013-12-31', '01/BLH/XII/KEC/2013', '2013-12-31', '13/006/DAM/XII/2013/DISKES.05', '2014-04-30', '2013-12-31', 'Selesai, belum diambil');
INSERT INTO `t_ipmbl_det` VALUES ('3', '1', '2', '2013-12-31', '22', null, '1', '2013-12-31', '2013-12-31', '1', '1', 'petugas', 'dinas', 'nip', 'pendapat', '01/BLH/REKOM/XII/2013', '2013-12-31', '01/BLH/KEL/XII/2013', '2013-12-31', '01/BLH/KEC/XII/2013', '2013-12-31', '14/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2013-12-31', 'Selesai, belum diambil');

-- ----------------------------
-- Table structure for t_ipmbl_dok
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_ipmbl_dok
-- ----------------------------
INSERT INTO `t_ipmbl_dok` VALUES ('1', 'penerima2', 'jabatan2', '2013-12-31', '--', '1', '1');
INSERT INTO `t_ipmbl_dok` VALUES ('2', 'penerima1', 'jabatan1', '2013-12-31', '--', '1', '1');
INSERT INTO `t_ipmbl_dok` VALUES ('3', 'penerima 2', 'jabatan 2', '2013-12-31', 'penerima ke -2', '2', '2');
INSERT INTO `t_ipmbl_dok` VALUES ('4', 'penerima 1', 'jabatan 1', '2013-12-31', 'penerima ke -1', '2', '2');
INSERT INTO `t_ipmbl_dok` VALUES ('5', 'penerima', 'jabatan', '2013-12-31', '--', '1', '3');

-- ----------------------------
-- Table structure for t_iujk
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
  `iujk_kelurahan` varchar(50) DEFAULT NULL,
  `iujk_kota` varchar(50) DEFAULT NULL,
  `iujk_propinsi` varchar(50) DEFAULT NULL,
  `iujk_telepon` varchar(20) DEFAULT NULL,
  `iujk_kodepos` varchar(7) DEFAULT NULL,
  `iujk_fax` varchar(20) DEFAULT NULL,
  `iujk_npwp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iujk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujk
-- ----------------------------
INSERT INTO `t_iujk` VALUES ('1', 'perusahaan', 'alamat', 'dir', 'gol', 'kualifikasi', 'bu', '5', '5', '0', '0', '0', '031606', '123456', '1234567', 'NPWP/1/2013');

-- ----------------------------
-- Table structure for t_iujk_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujk_ceklist
-- ----------------------------
INSERT INTO `t_iujk_ceklist` VALUES ('1', '24', '1', '1', '0', 'ada');
INSERT INTO `t_iujk_ceklist` VALUES ('2', '26', '1', '1', '0', 'ada');
INSERT INTO `t_iujk_ceklist` VALUES ('3', '27', '1', '1', '0', 'ada');
INSERT INTO `t_iujk_ceklist` VALUES ('4', '28', '1', '1', '0', 'ada');
INSERT INTO `t_iujk_ceklist` VALUES ('5', '29', '1', '1', '0', 'ada');
INSERT INTO `t_iujk_ceklist` VALUES ('6', '24', '2', '1', '0', 'sip');
INSERT INTO `t_iujk_ceklist` VALUES ('7', '26', '2', '1', '0', '');
INSERT INTO `t_iujk_ceklist` VALUES ('8', '27', '2', '1', '0', 'sip');
INSERT INTO `t_iujk_ceklist` VALUES ('9', '28', '2', '1', '0', '');
INSERT INTO `t_iujk_ceklist` VALUES ('10', '29', '2', '1', '0', 'sip');

-- ----------------------------
-- Table structure for t_iujk_det
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
  `det_iujk_sk` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujk_det
-- ----------------------------
INSERT INTO `t_iujk_det` VALUES ('1', '1', '1', '2013-12-31', '24', '1234567', 'rekom/1/2013', '2013-12-31', 'PJ1', 'PJ2', 'PJ3', 'PJteknis', 'pjjtbu/1/2013', '1', '2013-12-31', '2013-12-31', 'Selesai, belum diambil', '19/006/DAM/XII/2013/DISKES.05');
INSERT INTO `t_iujk_det` VALUES ('2', '1', '2', '2013-12-31', '24', '', 'rekom/02/2013', '2013-12-31', 'PJ1', 'PJ2', 'PJ3', 'PJteknis', 'pjjtbu/1/2013', '1', '2013-12-31', '2014-01-04', 'Selesai, belum diambil', '20/006/DAM/XII/2013/DISKES.05');

-- ----------------------------
-- Table structure for t_iujt
-- ----------------------------
DROP TABLE IF EXISTS `t_iujt`;
CREATE TABLE `t_iujt` (
  `iujt_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujt_usaha` varchar(50) DEFAULT NULL,
  `iujt_alamatusaha` varchar(100) DEFAULT NULL,
  `iujt_penanggungjawab` varchar(50) DEFAULT NULL,
  `iujt_statusperusahaan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iujt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujt
-- ----------------------------
INSERT INTO `t_iujt` VALUES ('1', 'Usaha IUJT', 'Alamat', 'Penanggung Jawab', 'Status');
INSERT INTO `t_iujt` VALUES ('2', 'IUJT Perusahaan', 'Jl. Mawar 10', 'Dr Penanggung Jawab', 'Kantor Cabang');

-- ----------------------------
-- Table structure for t_iujt_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujt_ceklist
-- ----------------------------
INSERT INTO `t_iujt_ceklist` VALUES ('1', '1', '1', '3', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('2', '1', '1', '10', '0', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('3', '1', '1', '11', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('4', '1', '1', '12', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('5', '1', '1', '13', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('6', '1', '1', '48', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('7', '1', '1', '49', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('8', '1', '1', '50', '0', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('9', '1', '1', '51', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('10', '1', '1', '52', '0', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('11', '2', '2', '3', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('12', '2', '2', '10', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('13', '2', '2', '11', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('14', '2', '2', '12', '0', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('15', '2', '2', '13', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('16', '2', '2', '48', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('17', '2', '2', '49', '1', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('18', '2', '2', '50', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('19', '2', '2', '51', '1', '');
INSERT INTO `t_iujt_ceklist` VALUES ('20', '2', '2', '52', '0', 'ada');
INSERT INTO `t_iujt_ceklist` VALUES ('21', '2', '3', '3', '1', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('22', '2', '3', '10', '0', '');
INSERT INTO `t_iujt_ceklist` VALUES ('23', '2', '3', '11', '1', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('24', '2', '3', '12', '1', '');
INSERT INTO `t_iujt_ceklist` VALUES ('25', '2', '3', '13', '0', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('26', '2', '3', '48', '1', '');
INSERT INTO `t_iujt_ceklist` VALUES ('27', '2', '3', '49', '1', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('28', '2', '3', '50', '1', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('29', '2', '3', '51', '0', 'sip');
INSERT INTO `t_iujt_ceklist` VALUES ('30', '2', '3', '52', '1', '');

-- ----------------------------
-- Table structure for t_iujt_det
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_iujt_det
-- ----------------------------
INSERT INTO `t_iujt_det` VALUES ('1', '1', '1', '2013-12-31', '19', null, '01/rekom/XII/2013', '2013-12-31', '1', null, '01/permohonan/2013', 'petugas cek', '2013-12-31', 'nip petugas', 'catatan', '15/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2013-12-31', 'Selesai, belum diambil', null);
INSERT INTO `t_iujt_det` VALUES ('2', '2', '1', '2013-12-31', '20', null, 'rekom/02/2013', '2013-12-31', '1', null, 'permohonan/01/203', 'petugas', '2013-12-31', '1234567', 'catatan khusus', '16/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2013-12-31', 'Selesai, belum diambil', null);
INSERT INTO `t_iujt_det` VALUES ('3', '2', '2', '2013-12-31', '20', null, 'rekom/03/2013', '2013-12-31', '1', null, 'permohonan/2013', 'petugas cek', '2013-12-31', '1234567', 'catatan khusus', '17/006/DAM/XII/2013/DISKES.05', '2013-12-31', '2013-12-31', 'Selesai, belum diambil', null);

-- ----------------------------
-- Table structure for t_log
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
  `log_tanggal` datetime DEFAULT NULL,
  `log_user` int(11) DEFAULT NULL,
  `log_pemohon` int(11) DEFAULT NULL,
  `log_permohonan` int(11) DEFAULT NULL,
  `log_aktifitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_log
-- ----------------------------

-- ----------------------------
-- Table structure for t_simb
-- ----------------------------
DROP TABLE IF EXISTS `t_simb`;
CREATE TABLE `t_simb` (
  `simb_id` int(11) NOT NULL AUTO_INCREMENT,
  `simb_per_npwp` varchar(50) DEFAULT NULL,
  `simb_per_nama` varchar(50) DEFAULT NULL,
  `simb_per_akta` varchar(50) DEFAULT NULL,
  `simb_per_bentuk` int(3) DEFAULT NULL,
  `simb_per_alamat` varchar(200) DEFAULT NULL,
  `simb_per_kel` varchar(50) DEFAULT NULL,
  `simb_per_kec` varchar(50) DEFAULT NULL,
  `simb_per_kota` varchar(50) DEFAULT NULL,
  `simb_per_telp` varchar(20) DEFAULT NULL,
  `simb_jenis` varchar(50) DEFAULT NULL,
  `simb_status` int(3) DEFAULT NULL,
  `simb_jenisusaha` varchar(50) DEFAULT NULL,
  `simb_panjang` int(5) DEFAULT NULL,
  `simb_lebar` int(5) DEFAULT NULL,
  `simb_alamat` varchar(100) DEFAULT NULL,
  `simb_kel` varchar(50) DEFAULT NULL,
  `simb_kec` varchar(50) DEFAULT NULL,
  `simb_bentuk` int(3) DEFAULT NULL,
  `simb_lokasi` int(3) DEFAULT NULL,
  `simb_gangguan` int(3) DEFAULT NULL,
  `simb_batasutara` varchar(100) DEFAULT NULL,
  `simb_batastimur` varchar(100) DEFAULT NULL,
  `simb_batasselatan` varchar(100) DEFAULT NULL,
  `simb_batasbarat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`simb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_simb
-- ----------------------------
INSERT INTO `t_simb` VALUES ('1', 'npwpd/1/2013', 'perusahaan', 'akta', '1', 'alamat perusahaan', 'lidah kulo', 'lakarsantri', 'surabaya', '031', 'pusat', '1', 'jenis usahaa', '20', '15', 'lidah kulon', 'lidah kulon', 'lakarsantri', '1', '1', '1', 'lapangan', 'lapangan', 'lapangan', 'lapangan');

-- ----------------------------
-- Table structure for t_simb_ceklist
-- ----------------------------
DROP TABLE IF EXISTS `t_simb_ceklist`;
CREATE TABLE `t_simb_ceklist` (
  `simb_cek_id` int(11) NOT NULL AUTO_INCREMENT,
  `simb_cek_simb_id` int(11) DEFAULT NULL,
  `simb_cek_simbdet_id` int(11) DEFAULT NULL,
  `simb_cek_syarat_id` int(11) DEFAULT NULL,
  `simb_cek_status` int(1) DEFAULT NULL,
  `simb_cek_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`simb_cek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_simb_ceklist
-- ----------------------------
INSERT INTO `t_simb_ceklist` VALUES ('1', '1', '1', '1', '0', 'ada');
INSERT INTO `t_simb_ceklist` VALUES ('2', '1', '1', '2', '1', 'ada');
INSERT INTO `t_simb_ceklist` VALUES ('3', '1', '1', '3', '1', 'ada');
INSERT INTO `t_simb_ceklist` VALUES ('4', '1', '1', '4', '1', '');
INSERT INTO `t_simb_ceklist` VALUES ('5', '1', '1', '5', '0', '');
INSERT INTO `t_simb_ceklist` VALUES ('6', '1', '1', '6', '1', 'ada');
INSERT INTO `t_simb_ceklist` VALUES ('7', '1', '1', '7', '1', '');
INSERT INTO `t_simb_ceklist` VALUES ('8', '1', '1', '8', '0', '');
INSERT INTO `t_simb_ceklist` VALUES ('9', '1', '1', '9', '1', 'ada');

-- ----------------------------
-- Table structure for t_simb_det
-- ----------------------------
DROP TABLE IF EXISTS `t_simb_det`;
CREATE TABLE `t_simb_det` (
  `det_simb_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_simb_simb_id` int(11) DEFAULT NULL,
  `det_simb_jenis` int(1) DEFAULT NULL,
  `det_simb_tanggal` date DEFAULT NULL,
  `det_simb_pemohon_id` int(11) DEFAULT NULL,
  `det_simb_nomorreg` varchar(50) DEFAULT NULL,
  `det_simb_proses` varchar(50) DEFAULT NULL,
  `det_simb_sk` varchar(50) DEFAULT NULL,
  `det_simb_berlaku` date DEFAULT NULL,
  `det_simb_kadaluarsa` date DEFAULT NULL,
  `det_simb_penerima` varchar(50) DEFAULT NULL,
  `det_simb_tanggalterima` date DEFAULT NULL,
  `det_simb_keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`det_simb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_simb_det
-- ----------------------------
INSERT INTO `t_simb_det` VALUES ('1', '1', '1', '2014-01-01', '32', '', 'Selesai, belum diambil', '3/006/DAM/I/2014/DISKES.05', '2014-01-01', '2014-01-31', 'penerima', '2014-01-01', 'keterangan');

-- ----------------------------
-- Table structure for t_sipd
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_sipd
-- ----------------------------
INSERT INTO `t_sipd` VALUES ('1', 'praktek noval', 'lidah kulon', '031', '1', 'dokter umum');
INSERT INTO `t_sipd` VALUES ('2', 'praktek noval', 'lidah kulon', '031', '1', 'dokter umum');

-- ----------------------------
-- Table structure for t_sipd_ceklist
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_sipd_ceklist
-- ----------------------------
INSERT INTO `t_sipd_ceklist` VALUES ('1', '1', '1', '1', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('2', '2', '1', '1', '0', '');
INSERT INTO `t_sipd_ceklist` VALUES ('3', '3', '1', '1', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('4', '4', '1', '1', '0', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('5', '5', '1', '1', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('6', '6', '1', '1', '1', '');
INSERT INTO `t_sipd_ceklist` VALUES ('7', '7', '1', '1', '0', '');
INSERT INTO `t_sipd_ceklist` VALUES ('8', '8', '1', '1', '0', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('9', '9', '1', '1', '1', '');
INSERT INTO `t_sipd_ceklist` VALUES ('10', '1', '2', '2', '0', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('11', '2', '2', '2', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('12', '3', '2', '2', '0', '');
INSERT INTO `t_sipd_ceklist` VALUES ('13', '4', '2', '2', '0', '');
INSERT INTO `t_sipd_ceklist` VALUES ('14', '5', '2', '2', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('15', '6', '2', '2', '0', '');
INSERT INTO `t_sipd_ceklist` VALUES ('16', '7', '2', '2', '1', 'Ada');
INSERT INTO `t_sipd_ceklist` VALUES ('17', '8', '2', '2', '1', '');
INSERT INTO `t_sipd_ceklist` VALUES ('18', '9', '2', '2', '0', '');

-- ----------------------------
-- Table structure for t_sipd_det
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of t_sipd_det
-- ----------------------------
INSERT INTO `t_sipd_det` VALUES ('1', '1', '1', '2014-01-01', '29', '', 'Selesai, belum diambil', '1/006/DAM/I/2014/DISKES.05', '0', '2014-01-01', '2014-01-31', 'penerima', '2014-01-01', '1', 'bap', '1', '2014-01-01', 'sip', 'op', 'str', 'dokter umum');
INSERT INTO `t_sipd_det` VALUES ('2', '2', '2', '2014-01-01', '29', '', 'Selesai, belum diambil', '2/006/DAM/I/2014/DISKES.05', '0', '2014-01-01', '2014-01-31', 'Penerima', '2014-01-01', '1', 'bap', '1', '2014-01-01', 'sip', 'op', 'str', 'dokter umum');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `telp` varchar(45) DEFAULT NULL,
  `groupuser_id` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `update` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_groupuser` (`groupuser_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for useracl
-- ----------------------------
DROP TABLE IF EXISTS `useracl`;
CREATE TABLE `useracl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acl_id` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `useracl_user` (`user_id`) USING BTREE,
  KEY `useracl_acl` (`acl_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of useracl
-- ----------------------------

-- ----------------------------
-- Table structure for utilitas
-- ----------------------------
DROP TABLE IF EXISTS `utilitas`;
CREATE TABLE `utilitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `atasnama` varchar(100) DEFAULT NULL,
  `penempatan` tinyint(20) DEFAULT '1',
  `alamat` varchar(255) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `desa_id` int(11) DEFAULT NULL,
  `peruntukan` tinytext,
  `norekomendasi` varchar(50) DEFAULT NULL,
  `tglrekomendasi` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permohonan_id` (`permohonan_id`) USING BTREE,
  KEY `kecamatan_id` (`kecamatan_id`) USING BTREE,
  KEY `desa_id` (`desa_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of utilitas
-- ----------------------------

-- ----------------------------
-- Table structure for warga
-- ----------------------------
DROP TABLE IF EXISTS `warga`;
CREATE TABLE `warga` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `warga` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of warga
-- ----------------------------

-- ----------------------------
-- Table structure for wisata
-- ----------------------------
DROP TABLE IF EXISTS `wisata`;
CREATE TABLE `wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(11) DEFAULT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `peruntukan` mediumtext,
  `nosurat` varchar(80) DEFAULT NULL,
  `tglsurat` date DEFAULT NULL,
  `sdata` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `wisata_permohonan` (`permohonan_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of wisata
-- ----------------------------

-- ----------------------------
-- View structure for vfho
-- ----------------------------
DROP VIEW IF EXISTS `vfho`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vfho` AS select `a`.`id` AS `id`,`c`.`nosk` AS `nosk`,`b`.`nama` AS `nama`,`b`.`alamat` AS `alamat` from ((`ho` `a` join `perusahaan` `b` on((`a`.`perusahaan_id` = `b`.`id`))) join `permohonan` `c` on(((`a`.`permohonan_id` = `c`.`id`) and (`c`.`ijin_id` = 2) and (`c`.`nosk` <> _latin1'')))) order by `b`.`nama` ;

-- ----------------------------
-- View structure for vfsiup
-- ----------------------------
DROP VIEW IF EXISTS `vfsiup`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vfsiup` AS select `a`.`id` AS `id`,`c`.`nosk` AS `nosk`,`b`.`nama` AS `nama`,`b`.`alamat` AS `alamat` from ((`siup` `a` join `perusahaan` `b` on((`a`.`perusahaan_id` = `b`.`id`))) join `permohonan` `c` on(((`a`.`permohonan_id` = `c`.`id`) and (`c`.`ijin_id` = 4)))) order by `b`.`nama` ;

-- ----------------------------
-- View structure for vgettglproses
-- ----------------------------
DROP VIEW IF EXISTS `vgettglproses`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vgettglproses` AS select `permohonanstatus`.`permohonan_id` AS `permohonan_id`,`permohonanstatus`.`spermohonan_id` AS `spermohonan_id`,`permohonanstatus`.`tglupdate` AS `tglupdate` from `permohonanstatus` order by `permohonanstatus`.`id` ;

-- ----------------------------
-- View structure for vho
-- ----------------------------
DROP VIEW IF EXISTS `vho`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vho` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`m`.`nama` AS `pemohon`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`ho` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for viujk
-- ----------------------------
DROP VIEW IF EXISTS `viujk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `viujk` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`r`.`nama` AS `nama`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses`,`t`.`tglrekomendasi` AS `tglrekomendasi`,`t`.`tglsurvey` AS `tglsurvey` from ((((`iujk` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vlimbah
-- ----------------------------
DROP VIEW IF EXISTS `vlimbah`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vlimbah` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`m`.`nama` AS `nama`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`iplc` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vlokasi
-- ----------------------------
DROP VIEW IF EXISTS `vlokasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vlokasi` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`m`.`nama` AS `nama`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from (((`ilokasi` `t` join `permohonan` `p`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vpemohon
-- ----------------------------
DROP VIEW IF EXISTS `vpemohon`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vpemohon` AS select distinct `pemohon`.`id` AS `id`,`pemohon`.`ktp` AS `ktp`,`pemohon`.`nama` AS `nama`,concat(`pemohon`.`tempatlahir`,_latin1', ',convert(date_format(`pemohon`.`tgllahir`,_utf8'%d-%b-%Y') using latin1)) AS `tempatlahir`,`pemohon`.`alamat` AS `alamat` from `pemohon` where (`pemohon`.`ktp` <> _latin1'') order by `pemohon`.`ktp`,`pemohon`.`nama` ;

-- ----------------------------
-- View structure for vperusahaan
-- ----------------------------
DROP VIEW IF EXISTS `vperusahaan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vperusahaan` AS select distinct `perusahaan`.`id` AS `id`,`perusahaan`.`npwp` AS `npwp`,`perusahaan`.`nama` AS `nama`,`perusahaan`.`alamat` AS `alamat` from `perusahaan` where (`perusahaan`.`npwp` <> _latin1'') order by `perusahaan`.`npwp`,`perusahaan`.`nama` ;

-- ----------------------------
-- View structure for vreklame
-- ----------------------------
DROP VIEW IF EXISTS `vreklame`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vreklame` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`m`.`nama` AS `nama`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`reklame` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vsiup
-- ----------------------------
DROP VIEW IF EXISTS `vsiup`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vsiup` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`siup` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vtdp
-- ----------------------------
DROP VIEW IF EXISTS `vtdp`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vtdp` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`tdp` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vtrayek
-- ----------------------------
DROP VIEW IF EXISTS `vtrayek`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vtrayek` AS select `p`.`id` AS `id`,`p`.`no_agenda` AS `no_agenda`,`p`.`nosk` AS `nosk`,`r`.`nama` AS `perusahaan`,`m`.`nama` AS `nama`,`p`.`tglpermohonan` AS `tglpermohonan`,`s`.`status` AS `status`,`p`.`catatan_bo` AS `catatan_bo`,`p`.`ijin_id` AS `ijin_id`,concat(if((`p`.`tglsk` = _utf8'0000-00-00 00:00:00'),`DateDiffBusiness`(curdate(),`p`.`tglpermohonan`),`DateDiffBusiness`(`p`.`tglsk`,`p`.`tglpermohonan`)),_utf8' hari') AS `lama_proses` from ((((`itr` `t` join `permohonan` `p`) join `perusahaan` `r`) join `pemohon` `m`) join `spermohonan` `s`) where ((`t`.`permohonan_id` = `p`.`id`) and (`t`.`perusahaan_id` = `r`.`id`) and (`p`.`pemohon_id` = `m`.`id`) and (`p`.`spermohonan_id` = `s`.`id`)) ;

-- ----------------------------
-- View structure for vvimb
-- ----------------------------
DROP VIEW IF EXISTS `vvimb`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vvimb` AS select `imb`.`permohonan_id` AS `idijin`,`imb`.`no_rekomendasi` AS `no_rekomendasi` from `imb` ;

-- ----------------------------
-- View structure for vviujk
-- ----------------------------
DROP VIEW IF EXISTS `vviujk`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vviujk` AS select `iujk`.`permohonan_id` AS `idijin`,`iujk`.`tglrekomendasi` AS `tglrekomendasi` from `iujk` ;

-- ----------------------------
-- Function structure for DateDiffBusiness
-- ----------------------------
DROP FUNCTION IF EXISTS `DateDiffBusiness`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `DateDiffBusiness`(d2 DATETIME, d1 DATETIME) RETURNS int(11)
BEGIN
return
(
select
BizDays
from
(
select
d1,
d2,
DAYOFWEEK(d1) AS dow1,
DAYOFWEEK(d2) AS dow2,
DATEDIFF(d2,d1) AS Days,
(
select FLOOR( days / 3.5 ) +
if( dow1 = 1 AND dow2 > 1 AND dow2< 7, 1,
if( dow1 = 7 AND dow2 = 1, 1,
if( dow1 = 7 AND dow2 = 7, 0,
if( dow1 > 1 AND dow1 > dow2 AND dow1<7, 1,
if( dow1 < 7 AND dow1>1 AND dow2 = 7, 0, 0 )
)
)
)
)
) AS WkndDays,
(select days - wkndDays) AS BizDays
) as temp
);
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GetTglProses
-- ----------------------------
DROP FUNCTION IF EXISTS `GetTglProses`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GetTglProses`(id_s INT,spermohonan_id_s INT) RETURNS datetime
BEGIN
DECLARE v_tgl DATETIME;
DECLARE v_idcari INT;
DECLARE v_jml INT;

set v_jml=0;

SELECT count(*) into v_jml
					FROM permohonanstatus
          					WHERE permohonan_id=id_s AND spermohonan_id=spermohonan_id_s;

if v_jml>0 then

    SELECT tglupdate into v_tgl
					FROM permohonanstatus
					WHERE permohonan_id=id_s AND spermohonan_id=spermohonan_id_s order by id limit 1;

end if;

RETURN v_tgl;

END
;;
DELIMITER ;
