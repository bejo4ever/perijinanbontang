/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2013-12-16 20:49:10
*/

SET FOREIGN_KEY_CHECKS=0;

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
  KEY `FK_IJIN2` (`ID_IJIN`),
  CONSTRAINT `cek_list_lingkungan_ibfk_1` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lingkungan` (`ID_IJIN_LINGUKANGAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cek_list_lingkungan_ibfk_2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  KEY `FK_IJIN2` (`ID_IJIN`),
  CONSTRAINT `FK_IJIN2` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lokasi` (`ID_IJIN_LOKASI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SYARAT2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
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
-- Table structure for dt_syarat
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

-- ----------------------------
-- Table structure for ijin_lingkungan
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lingkungan`;
CREATE TABLE `ijin_lingkungan` (
  `ID_IJIN_LINGUKANGAN` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN_LINGKUNGAN_INTI` int(11) DEFAULT NULL,
  `NO_KTP` varchar(50) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(100) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `KEWARGANEGARAAN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `ID_KELURAHAN` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `TELP` varchar(20) DEFAULT NULL,
  `NPWP` varchar(50) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NAMA_DIREKTUR` varchar(50) DEFAULT NULL,
  `NO_AKTE` varchar(50) DEFAULT NULL,
  `BENTUK_PERUSAHAAN` int(11) DEFAULT NULL,
  `ALAMAT_PERUSAHAAN` varchar(100) DEFAULT NULL,
  `ID_KELURAHAN2` int(11) DEFAULT NULL,
  `ID_KECAMATAN2` int(11) DEFAULT NULL,
  `ID_KOTA2` int(11) DEFAULT NULL,
  `TELP2` varchar(20) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGUKANGAN`),
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`),
  CONSTRAINT `FK_IJIN_LINGKUNGAN` FOREIGN KEY (`ID_IJIN_LINGKUNGAN_INTI`) REFERENCES `ijin_lingkungan_inti` (`ID_IJIN_LINGKUNGAN_INTI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lingkungan_inti
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lingkungan_inti`;
CREATE TABLE `ijin_lingkungan_inti` (
  `ID_IJIN_LINGKUNGAN_INTI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `NO_REG` varchar(11) DEFAULT NULL,
  `JENIS_USAHA` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `ID_KELURAHAN` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `STATUS_LOKASI` int(11) DEFAULT NULL,
  `LUAS_USAHA` float DEFAULT NULL,
  `LUAS_BAHAN` float DEFAULT NULL,
  `LUAS_BANGUNAN` float DEFAULT NULL,
  `LUAS_RUANG_USAHA` float DEFAULT NULL,
  `KAPASITAS` float DEFAULT NULL,
  `IZIN_SKTR` int(11) DEFAULT NULL,
  `IZIN_LOKASI` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN_INTI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan_inti
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lokasi`;
CREATE TABLE `ijin_lokasi` (
  `ID_IJIN_LOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN_LOKASI_INTI` int(11) DEFAULT NULL,
  `NO_KTP` varchar(255) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(255) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(255) DEFAULT NULL,
  `TGL_LAHIR` date DEFAULT NULL,
  `PEKERJAAN` varchar(255) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `ID_DESA` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `TELEPON_PEMOHON` varchar(255) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LOKASI`),
  KEY `FK_IJIN_LOKASI_INTI` (`ID_IJIN_LOKASI_INTI`),
  CONSTRAINT `FK_IJIN_LOKASI_INTI` FOREIGN KEY (`ID_IJIN_LOKASI_INTI`) REFERENCES `ijin_lokasi_inti` (`ID_IJIN_LOKASI_INTI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lokasi
-- ----------------------------

-- ----------------------------
-- Table structure for ijin_lokasi_inti
-- ----------------------------
DROP TABLE IF EXISTS `ijin_lokasi_inti`;
CREATE TABLE `ijin_lokasi_inti` (
  `ID_IJIN_LOKASI_INTI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `NPWPD` varchar(50) DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NO_AKTE` varchar(50) DEFAULT NULL,
  `BENTUK_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `ID_DESA` int(11) DEFAULT NULL,
  `ID_KECAMATAN` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `TELEPON` varchar(20) DEFAULT NULL,
  `PERUNTUKAN` text,
  `STATUS_TANAH` int(11) DEFAULT NULL,
  `KETERANGAN_STATUS` text,
  `LUAS_TANAH` float DEFAULT NULL,
  `ALAMAT_LETAK_TANAH` varchar(200) DEFAULT NULL,
  `ID_DESA_LETAK` int(11) DEFAULT NULL,
  `ID_KECAMATAN_LETAK` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LOKASI_INTI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lokasi_inti
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
  `JABATAN` varchar(50) DEFAULT NULL,
  `PANGKAT` varchar(50) DEFAULT NULL,
  `WAKTUSELESAI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_ijin
-- ----------------------------
INSERT INTO `master_ijin` VALUES ('1', 'idam', 'pejabat', 'nip', 'jabatan', 'pangkat', 'selesai');

-- ----------------------------
-- Table structure for master_syarat
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat`;
CREATE TABLE `master_syarat` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SYARAT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_syarat
-- ----------------------------
INSERT INTO `master_syarat` VALUES ('1', 'fotocopy ktp');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('1', 'nvl', 'nvl', 'nvl', '123', '123', 'nvl', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
-- Table structure for sktr
-- ----------------------------
DROP TABLE IF EXISTS `sktr`;
CREATE TABLE `sktr` (
  `ID_SKTR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `NAMA_PEMOHON` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `HAK_MILIK` int(11) DEFAULT NULL,
  `NAMA_PEMILIK` varchar(50) DEFAULT NULL,
  `NO_SURAT_TANAH` varchar(100) DEFAULT NULL,
  `ALAMAT_BANGUNAN` varchar(100) DEFAULT NULL,
  `RENCANA_PERUNTUKAN` varchar(100) DEFAULT NULL,
  `TINGGI_BANGUNAN` float DEFAULT NULL,
  `LUAS_PERSIL` float DEFAULT NULL,
  `LUAS_BANGUNAN` float DEFAULT NULL,
  `BATAS_KIRI` varchar(100) DEFAULT NULL,
  `BATAS_KANAN` varchar(100) DEFAULT NULL,
  `BATAS_DEPAN` varchar(100) DEFAULT NULL,
  `BATAS_BELAKANG` varchar(100) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  PRIMARY KEY (`ID_SKTR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sktr
-- ----------------------------

-- ----------------------------
-- Table structure for sppl
-- ----------------------------
DROP TABLE IF EXISTS `sppl`;
CREATE TABLE `sppl` (
  `ID_SPPL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `NO_SK` varchar(50) DEFAULT NULL,
  `NAMA_USAHA` varchar(50) DEFAULT NULL,
  `PENANGGUNG_JAWAB` varchar(50) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `JENIS_USAHA` varchar(100) DEFAULT NULL,
  `ALAMAT_USAHA` varchar(100) DEFAULT NULL,
  `STATUS_LAHAN` int(11) DEFAULT NULL,
  `NO_AKTA` varchar(100) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `LUAS_LAHAN` float DEFAULT NULL,
  `LUAS_TAPAK_BANGUNAN` float DEFAULT NULL,
  `LUAS_KEGIATAN` float DEFAULT NULL,
  `LUAS_PARKIR` float DEFAULT NULL,
  PRIMARY KEY (`ID_SPPL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sppl
-- ----------------------------

-- ----------------------------
-- Table structure for trayek
-- ----------------------------
DROP TABLE IF EXISTS `trayek`;
CREATE TABLE `trayek` (
  `ID_TRAYEK` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TRAYEK_INTI` int(11) DEFAULT NULL,
  `KODE_TRAYEK` varchar(50) DEFAULT NULL,
  `NOMOR_UB` varchar(50) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `NAMA_PERUSAHAAN` varchar(50) DEFAULT NULL,
  `NAMA_PEMOHON` varchar(50) DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
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
  `ID_USER` int(11) DEFAULT NULL,
  `NOMOR_KENDARAAN` varchar(20) DEFAULT NULL,
  `NAMA_PEMILIK` varchar(50) DEFAULT NULL,
  `ALAMAT_PEMILIK` varchar(100) DEFAULT NULL,
  `NO_HP` varchar(20) DEFAULT NULL,
  `NOMOR_RANGKA` varchar(50) DEFAULT NULL,
  `NOMOR_MESIN` varchar(50) DEFAULT NULL,
  `JENIS_PERMOHONAN` int(11) DEFAULT NULL,
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
  `apotek_id` int(11) NOT NULL,
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
-- Table structure for t_apotek_asisten
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_asisten`;
CREATE TABLE `t_apotek_asisten` (
  `asisten_id` int(11) NOT NULL,
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
-- Table structure for t_apotek_det
-- ----------------------------
DROP TABLE IF EXISTS `t_apotek_det`;
CREATE TABLE `t_apotek_det` (
  `det_apotek_id` int(11) NOT NULL,
  `det_apotek_apotek_id` int(11) DEFAULT NULL,
  `det_apotek_jenis` int(1) DEFAULT NULL,
  `det_apotek_surveylulus` int(1) DEFAULT NULL,
  `det_apotek_nama` varchar(50) DEFAULT NULL,
  `det_apotek_alamat` varchar(50) DEFAULT NULL,
  `det_apotek_telp` varchar(20) DEFAULT NULL,
  `det_apotek_sp` varchar(50) DEFAULT NULL,
  `det_apotek_ktp` varchar(20) DEFAULT NULL,
  `det_apotek_tempatlahir` varchar(50) DEFAULT NULL,
  `det_apotek_tanggallahir` date DEFAULT NULL,
  `det_apotek_pekerjaan` varchar(50) DEFAULT NULL,
  `det_apotek_npwp` varchar(50) DEFAULT NULL,
  `det_apotek_stra` varchar(50) DEFAULT NULL,
  `det_apotek_pendidikan` varchar(20) DEFAULT NULL,
  `det_apotek_tahunlulus` int(4) DEFAULT NULL,
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
  PRIMARY KEY (`det_apotek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_det
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam
-- ----------------------------
INSERT INTO `t_idam` VALUES ('1', 'RM Maju Terus', 'Rumah Makan', 'Jl Menganti Lidah Kulon', '01/SPKP/2013');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_ceklist
-- ----------------------------
INSERT INTO `t_idam_ceklist` VALUES ('1', '1', '1', '1', '1', 'Lengkap');

-- ----------------------------
-- Table structure for t_idam_det
-- ----------------------------
DROP TABLE IF EXISTS `t_idam_det`;
CREATE TABLE `t_idam_det` (
  `det_idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_idam_idam_id` int(11) DEFAULT NULL,
  `det_idam_jenis` int(1) DEFAULT NULL COMMENT '1=baru;2=perpanjangan',
  `det_idam_tanggal` date DEFAULT NULL COMMENT 'tanggal perijinan',
  `det_idam_nama` varchar(50) DEFAULT NULL,
  `det_idam_alamat` varchar(100) DEFAULT NULL,
  `det_idam_telp` varchar(20) DEFAULT NULL,
  `det_idam_tempatlahir` varchar(100) DEFAULT NULL,
  `det_idam_tanggallahir` date DEFAULT NULL,
  `det_idam_pendidikan` varchar(100) DEFAULT NULL,
  `det_idam_tahunlulus` int(5) DEFAULT NULL,
  `det_idam_status` varchar(50) DEFAULT NULL COMMENT 'status perijinan',
  `det_idam_keterangan` varchar(255) DEFAULT NULL COMMENT 'keterangan penerimaan berkas',
  `det_idam_bap` varchar(50) DEFAULT NULL,
  `det_idam_baptanggal` date DEFAULT NULL,
  `det_idam_kelengkapan` int(1) DEFAULT NULL,
  `det_idam_terima` varchar(50) DEFAULT NULL COMMENT 'penerima berkas',
  `det_idam_terimatanggal` date DEFAULT NULL,
  `det_idam_sk` varchar(255) DEFAULT NULL,
  `det_idam_skurut` int(11) DEFAULT NULL,
  `det_idam_berlaku` date DEFAULT NULL,
  `det_idam_kadaluarsa` date DEFAULT NULL,
  `det_idam_nomorreg` varchar(50) DEFAULT NULL,
  `det_idam_proses` int(1) DEFAULT '1',
  `det_idam_lulussurvey` int(1) DEFAULT '0',
  PRIMARY KEY (`det_idam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_det
-- ----------------------------
INSERT INTO `t_idam_det` VALUES ('1', '1', '1', '2013-12-15', 'Noval Debby P', 'Lidah Kulon', '031', 'Surabaya', '1994-12-07', 'D1 TI', '2013', '1', '--', '01/BAP/2013', '2013-12-15', '1', 'Penerima', '2013-12-15', '01/SK/2013', '0', '2013-12-15', '2013-12-31', '', '1', '1');

-- ----------------------------
-- Table structure for t_ipmbl
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl`;
CREATE TABLE `t_ipmbl` (
  `ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ipmbl_luas` float DEFAULT NULL,
  `ipmbl_volume` float DEFAULT NULL,
  `ipmbl_keperluan` varchar(255) DEFAULT NULL,
  `ipmbl_kelurahan` int(11) DEFAULT NULL,
  `ipmbl_kecamatan` int(11) DEFAULT NULL,
  `ipmbl_usaha` varchar(50) DEFAULT NULL,
  `ipmbl_alamatusaha` varchar(100) DEFAULT NULL,
  `ipmbl_lokasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ipmbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl
-- ----------------------------
INSERT INTO `t_ipmbl` VALUES ('1', '10', '10', '031', '0', '0', 'Usaha', 'Alamat', null);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for t_ipmbl_det
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl_det`;
CREATE TABLE `t_ipmbl_det` (
  `det_ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_ipmbl_ipmbl_id` int(11) DEFAULT NULL,
  `det_ipmbl_jenis` int(1) DEFAULT NULL,
  `det_ipmbl_tanggal` date DEFAULT NULL,
  `det_ipmbl_nama` varchar(50) DEFAULT NULL,
  `det_ipmbl_alamat` varchar(100) DEFAULT NULL,
  `det_ipmbl_kelurahan` int(11) DEFAULT NULL,
  `det_ipmbl_kecamatan` int(11) DEFAULT NULL,
  `det_ipmbl_kota` int(11) DEFAULT NULL,
  `det_ipmbl_telp` varchar(20) DEFAULT NULL,
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
  PRIMARY KEY (`det_ipmbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_det
-- ----------------------------
INSERT INTO `t_ipmbl_det` VALUES ('1', '1', '1', '2013-12-16', 'Noval D', 'Lidah', '1', '1', '1', '031', '1', '2013-12-16', '2013-12-16', '1', '1', 'petugas', 'asal', 'nip', 'pendapat', 'blh', '2013-12-16', 'rekomkel', '2013-12-16', 'kec', '2013-12-16', 'sk', '2013-12-16', '2013-12-31');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_dok
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for t_iujk_det
-- ----------------------------
DROP TABLE IF EXISTS `t_iujk_det`;
CREATE TABLE `t_iujk_det` (
  `det_iujk_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_iujk_iujk_id` int(11) DEFAULT NULL,
  `det_iujk_jenis` int(1) DEFAULT NULL,
  `det_iujk_tanggal` date DEFAULT NULL,
  `det_iujk_nama` varchar(50) DEFAULT NULL,
  `det_iujk_nomorreg` varchar(50) DEFAULT NULL,
  `det_iujk_rekomnomor` varchar(255) DEFAULT NULL,
  `det_iujk_rekomtanggal` date DEFAULT NULL,
  `det_iujk_berlaku` date DEFAULT NULL,
  `det_iujk_kadaluarsa` date DEFAULT NULL,
  `det_iujk_pj1` varchar(50) DEFAULT NULL,
  `det_iujk_pj2` varchar(50) DEFAULT NULL,
  `det_iujk_pj3` varchar(50) DEFAULT NULL,
  `det_iujk_pjteknis` varchar(50) DEFAULT NULL,
  `det_iujk_pjtbu` varchar(50) DEFAULT NULL,
  `det_iujk_surveylulus` int(1) DEFAULT NULL,
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_det
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt
-- ----------------------------
INSERT INTO `t_iujt` VALUES ('1', 'usaha', 'alamat', 'penanggungjawab', null);
INSERT INTO `t_iujt` VALUES ('2', 'usaha', 'alamat', 'penanggungjawab', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_ceklist
-- ----------------------------
INSERT INTO `t_iujt_ceklist` VALUES ('1', '2', '0', '1', '1', 'baik');

-- ----------------------------
-- Table structure for t_iujt_det
-- ----------------------------
DROP TABLE IF EXISTS `t_iujt_det`;
CREATE TABLE `t_iujt_det` (
  `det_iujt_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_iujt_iujt_id` int(11) DEFAULT NULL,
  `det_iujt_jenis` int(1) DEFAULT NULL,
  `det_iujt_tanggal` date DEFAULT NULL,
  `det_iujt_nama` varchar(50) DEFAULT NULL,
  `det_iujt_npwp` varchar(50) DEFAULT NULL,
  `det_iujt_alamat` varchar(100) DEFAULT NULL,
  `det_iujt_norekom` varchar(50) DEFAULT NULL,
  `det_iujt_tglrekom` date DEFAULT NULL,
  `det_iujt_sk` varchar(50) DEFAULT NULL,
  `det_iujt_berlaku` date DEFAULT NULL,
  `det_iujt_kadaluarsa` date DEFAULT NULL,
  `det_iujt_surveylulus` int(1) DEFAULT NULL,
  `det_iujt_surveytanggal` date DEFAULT NULL,
  `det_iujt_nopermohonan` varchar(50) DEFAULT NULL,
  `det_iujt_cekpetugas` varchar(50) DEFAULT NULL,
  `det_iujt_cektanggal` date DEFAULT NULL,
  `det_iujt_ceknip` varchar(50) DEFAULT NULL,
  `det_iujt_catatan` text,
  PRIMARY KEY (`det_iujt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_det
-- ----------------------------
INSERT INTO `t_iujt_det` VALUES ('1', '1', '1', '2013-12-16', 'noval debbyp', '123123', 'lidah kulon', null, null, 'sk', '2013-12-16', '2013-12-31', '1', null, '10/permohonan/2013', 'petugas', '2013-12-16', 'nip', 'catatan');
INSERT INTO `t_iujt_det` VALUES ('2', '2', '1', '2013-12-16', 'noval debbyp', '123123', 'lidah kulon', null, null, 'sk', '2013-12-16', '2013-12-31', '1', null, '10/permohonan/2013', 'petugas', '2013-12-16', 'nip', 'catatan');
