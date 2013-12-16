/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2013-12-16 16:57:19
*/

SET FOREIGN_KEY_CHECKS=0;

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
  CONSTRAINT `cek_list_lingkungan_ibfk_1` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lingkungan` (`ID_IJIN_LINGUKANGAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cek_list_lingkungan_ibfk_2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE
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

-- ----------------------------
-- Table structure for `cek_list_sktr`
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_sktr`;
CREATE TABLE `cek_list_sktr` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_sktr
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_sppl
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cek_list_trayek
-- ----------------------------

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

-- ----------------------------
-- Table structure for `ijin_lingkungan`
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
-- Table structure for `ijin_lingkungan_inti`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan_inti
-- ----------------------------
INSERT INTO `ijin_lingkungan_inti` VALUES ('1', '0', '232323', '2323', '23', '23', '23', '23', '23', '23', '23', '23', '23', '23', '23', '23');

-- ----------------------------
-- Table structure for `ijin_lokasi`
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
-- Table structure for `ijin_lokasi_inti`
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
-- Table structure for `master_ijin`
-- ----------------------------
DROP TABLE IF EXISTS `master_ijin`;
CREATE TABLE `master_ijin` (
  `ID_IJIN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_IJIN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_ijin
-- ----------------------------

-- ----------------------------
-- Table structure for `master_syarat`
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat`;
CREATE TABLE `master_syarat` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SYARAT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_syarat
-- ----------------------------

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
INSERT INTO `master_user` VALUES ('1', 'nvl', 'nvl', 'nvl', '123', '123', 'nvl', '1');
INSERT INTO `master_user` VALUES ('2', 'user', 'user', 'user', '123', '123', 'usre', '2');

-- ----------------------------
-- Table structure for `sktr`
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sktr
-- ----------------------------
INSERT INTO `sktr` VALUES ('1', '2', 'zulmi1', '123', '1', 'zulmi', '123', '123', '123', '1', '1', '1', '123', '321', '234', '432', null);

-- ----------------------------
-- Table structure for `sppl`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sppl
-- ----------------------------

-- ----------------------------
-- Table structure for `trayek`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trayek
-- ----------------------------

-- ----------------------------
-- Table structure for `trayek_inti`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trayek_inti
-- ----------------------------

-- ----------------------------
-- Table structure for `t_idam`
-- ----------------------------
DROP TABLE IF EXISTS `t_idam`;
CREATE TABLE `t_idam` (
  `idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `idam_jenis` int(1) NOT NULL,
  `idam_tanggal` date NOT NULL,
  `idam_status` varchar(50) DEFAULT NULL,
  `idam_keterangan` varchar(255) DEFAULT NULL,
  `idam_bap` varchar(50) DEFAULT NULL,
  `idam_baptanggal` date DEFAULT NULL,
  `idam_kelengkapan` int(1) DEFAULT NULL,
  `idam_terima` varchar(50) DEFAULT NULL,
  `idam_terimatanggal` date DEFAULT NULL,
  `idam_usaha` varchar(50) DEFAULT NULL,
  `idam_jenisusaha` varchar(50) DEFAULT NULL,
  `idam_alamat` varchar(100) DEFAULT NULL,
  `idam_sertifikatpkp` varchar(50) DEFAULT NULL,
  `idam_nomorijin` varchar(50) DEFAULT NULL,
  `idam_nomorurut` int(11) DEFAULT NULL,
  `idam_berlaku` date DEFAULT NULL,
  `idam_kadaluarsa` date DEFAULT NULL,
  PRIMARY KEY (`idam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_ceklist
-- ----------------------------

-- ----------------------------
-- Table structure for `t_idam_det`
-- ----------------------------
DROP TABLE IF EXISTS `t_idam_det`;
CREATE TABLE `t_idam_det` (
  `det_idam_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_idam_idam_id` int(11) DEFAULT NULL,
  `det_idam_nama` varchar(50) DEFAULT NULL,
  `det_idam_alamat` varchar(100) DEFAULT NULL,
  `det_idam_telp` varchar(20) DEFAULT NULL,
  `det_idam_tempatlahir` varchar(100) DEFAULT NULL,
  `det_idam_tanggallahir` date DEFAULT NULL,
  `det_idam_pendidikan` varchar(100) DEFAULT NULL,
  `det_idam_tahunlulus` int(5) DEFAULT NULL,
  PRIMARY KEY (`det_idam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_ipmbl`
-- ----------------------------
DROP TABLE IF EXISTS `t_ipmbl`;
CREATE TABLE `t_ipmbl` (
  `ipmbl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ipmbl_jenis` int(1) NOT NULL,
  `ipmbl_tanggal` date NOT NULL,
  `ipmbl_luas` float DEFAULT NULL,
  `ipmbl_volume` float DEFAULT NULL,
  `ipmbl_keperluan` varchar(255) DEFAULT NULL,
  `ipmbl_alamat` varchar(100) DEFAULT NULL,
  `ipmbl_kelurahan` int(11) DEFAULT NULL,
  `ipmbl_kecamatan` int(11) DEFAULT NULL,
  `ipmbl_nomoragenda` int(11) DEFAULT NULL,
  `ipmbl_status` int(11) DEFAULT NULL,
  `ipmbl_tanggalsurvey` date DEFAULT NULL,
  `ipmbl_rekomblh` varchar(255) DEFAULT NULL,
  `ipmbl_rekomblh_tanggal` date DEFAULT NULL,
  `ipmbl_rekomkec` varchar(255) DEFAULT NULL,
  `ipmbl_rekomkec_tanggal` date DEFAULT NULL,
  `ipmbl_rekomkel` varchar(255) DEFAULT NULL,
  `ipmbl_rekomkel_tanggal` date DEFAULT NULL,
  `ipmbl_berlaku` date DEFAULT NULL,
  `ipmbl_kadaluarsa` date DEFAULT NULL,
  `ipmbl_nomorijin` varchar(255) DEFAULT NULL,
  `ipmbl_nomorurut` int(11) DEFAULT NULL,
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
  `det_ipmbl_nama` varchar(50) DEFAULT NULL,
  `det_ipmbl_alamat` varchar(100) DEFAULT NULL,
  `det_ipmbl_kelurahan` int(11) DEFAULT NULL,
  `det_ipmbl_kecamatan` int(11) DEFAULT NULL,
  `det_ipmbl_kota` int(11) DEFAULT NULL,
  `det_ipmbl_telp` varchar(20) DEFAULT NULL,
  `det_ipmbl_namausaha` varchar(50) DEFAULT NULL,
  `det_ipmbl_alamatusaha` varchar(100) DEFAULT NULL,
  `det_ipmbl_namapimpinan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`det_ipmbl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_det
-- ----------------------------

-- ----------------------------
-- Table structure for `t_iujk`
-- ----------------------------
DROP TABLE IF EXISTS `t_iujk`;
CREATE TABLE `t_iujk` (
  `iujk_id` int(11) NOT NULL AUTO_INCREMENT,
  `iujk_jenis` int(1) NOT NULL,
  `iujk_tanggal` date NOT NULL,
  `iujk_status` varchar(50) DEFAULT NULL,
  `iujk_noformulir` varchar(50) DEFAULT NULL,
  `iujk_nourutformulir` int(11) DEFAULT NULL,
  `iujk_lampiran` int(11) DEFAULT NULL,
  `iujk_rekom` varchar(50) DEFAULT NULL,
  `iujk_rekomurut` int(11) DEFAULT NULL,
  `iujk_rekomtanggal` date DEFAULT NULL,
  `iujk_perusahaan` varchar(50) DEFAULT NULL,
  `iujk_alamat` varchar(100) DEFAULT NULL,
  `iujk_direktur` varchar(50) DEFAULT NULL,
  `iujk_golongan` varchar(50) DEFAULT NULL,
  `iujk_kualifikasi` varchar(50) DEFAULT NULL,
  `iujk_bidangusaha` varchar(50) DEFAULT NULL,
  `iujk_kelurahan` int(11) DEFAULT NULL,
  `iujk_rt` int(11) DEFAULT NULL,
  `iujk_rw` int(3) DEFAULT NULL,
  `iujk_kota` int(11) DEFAULT NULL,
  `iujk_propinsi` int(11) DEFAULT NULL,
  `iujk_telepon` varchar(20) DEFAULT NULL,
  `iujk_kodepos` varchar(7) DEFAULT NULL,
  `iujk_fax` varchar(20) DEFAULT NULL,
  `iujk_npwp` varchar(50) DEFAULT NULL,
  `iujk_pjtbu` varchar(50) DEFAULT NULL,
  `iujk_pjteknis` varchar(50) DEFAULT NULL,
  `iujk_pj1` varchar(50) DEFAULT NULL,
  `iujk_pj2` varchar(50) DEFAULT NULL,
  `iujk_pj3` varchar(50) DEFAULT NULL,
  `iujk_berlaku` date DEFAULT NULL,
  `iujk_kadaluarsa` date DEFAULT NULL,
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
  `det_iujk_nama` varchar(50) DEFAULT NULL,
  `det_iujk_perusahaan` varchar(50) DEFAULT NULL,
  `det_iujk_direktur` varchar(50) DEFAULT NULL,
  `det_iujk_alamatusaha` varchar(100) DEFAULT NULL,
  `det_iujk_nomorreg` varchar(50) DEFAULT NULL,
  `det_iujk_tanggalreg` date DEFAULT NULL,
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_det
-- ----------------------------
