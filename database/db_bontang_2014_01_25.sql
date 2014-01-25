/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang_fix

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-01-25 09:15:51
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
  `link_baru` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_groupmenu` (`groupmenu_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for bentukperush_tdp
-- ----------------------------
DROP TABLE IF EXISTS `bentukperush_tdp`;
CREATE TABLE `bentukperush_tdp` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`id`,`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for busaha
-- ----------------------------
DROP TABLE IF EXISTS `busaha`;
CREATE TABLE `busaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `bidang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=22687 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for cek_list_iuiphhk
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_iuiphhk`;
CREATE TABLE `cek_list_iuiphhk` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  CONSTRAINT `cek_list_lingkungan_ibfk_2` FOREIGN KEY (`ID_SYARAT`) REFERENCES `master_syarat` (`ID_SYARAT`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_LINGKUNGAN_SYARAT` FOREIGN KEY (`ID_IJIN`) REFERENCES `ijin_lingkungan` (`ID_IJIN_LINGKUNGAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for cek_list_prinsip
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_prinsip`;
CREATE TABLE `cek_list_prinsip` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for cek_list_trotoar
-- ----------------------------
DROP TABLE IF EXISTS `cek_list_trotoar`;
CREATE TABLE `cek_list_trotoar` (
  `ID_SYARAT` int(11) NOT NULL DEFAULT '0',
  `ID_IJIN` int(11) NOT NULL DEFAULT '0',
  `STATUS` int(11) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`,`ID_IJIN`),
  KEY `FK_IJIN2` (`ID_IJIN`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for counter_skr_ho
-- ----------------------------
DROP TABLE IF EXISTS `counter_skr_ho`;
CREATE TABLE `counter_skr_ho` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tahun` text,
  `counter` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for fsbangunan
-- ----------------------------
DROP TABLE IF EXISTS `fsbangunan`;
CREATE TABLE `fsbangunan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `fungsi` mediumtext,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for groupuser
-- ----------------------------
DROP TABLE IF EXISTS `groupuser`;
CREATE TABLE `groupuser` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=8651 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for ho_surveyor
-- ----------------------------
DROP TABLE IF EXISTS `ho_surveyor`;
CREATE TABLE `ho_surveyor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ho_id` int(255) unsigned NOT NULL,
  `nama_surveyor` varchar(255) DEFAULT NULL,
  `instansi_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for ijin_lingkungan
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
  `RETRIBUSI` float DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN`),
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`) USING BTREE,
  CONSTRAINT `FK_LINGKUNGAN` FOREIGN KEY (`ID_IJIN_LINGKUNGAN_INTI`) REFERENCES `ijin_lingkungan_inti` (`ID_IJIN_LINGKUNGAN_INTI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN_INTI`),
  KEY `FK_PEMOHON_LINGKUNGAN` (`ID_PEMOHON`) USING BTREE,
  CONSTRAINT `FK_PEMOHON_LINGKUNGAN` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `STATUS_SURVEY` int(11) DEFAULT NULL,
  `STATU_SURVEY` int(11) DEFAULT NULL,
  `TGL_PERMOHONAN` date DEFAULT NULL,
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LOKASI`),
  KEY `FK_IJIN_LOKASI_INTI` (`ID_PEMOHON`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for ijin_prinsip
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
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_PRINSIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for ilreklame
-- ----------------------------
DROP TABLE IF EXISTS `ilreklame`;
CREATE TABLE `ilreklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(200) DEFAULT NULL,
  `nilai` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=4816 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=13185 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=13398 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for indeksluas
-- ----------------------------
DROP TABLE IF EXISTS `indeksluas`;
CREATE TABLE `indeksluas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `bmin` float NOT NULL,
  `bmax` float NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for indekstingkat
-- ----------------------------
DROP TABLE IF EXISTS `indekstingkat`;
CREATE TABLE `indekstingkat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tingkat` varchar(100) NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Table structure for iuiphhk
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
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_IUIPHHK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for iuiphhk_rencana_alat
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
-- Table structure for iuiphhk_rencana_produksi
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
) ENGINE=InnoDB AUTO_INCREMENT=678 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=3015 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for iujksubbidang
-- ----------------------------
DROP TABLE IF EXISTS `iujksubbidang`;
CREATE TABLE `iujksubbidang` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `iujk_id` int(255) DEFAULT NULL,
  `bidangjasa_sub_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1428 DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for jenisjasa
-- ----------------------------
DROP TABLE IF EXISTS `jenisjasa`;
CREATE TABLE `jenisjasa` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for jpermohonan
-- ----------------------------
DROP TABLE IF EXISTS `jpermohonan`;
CREATE TABLE `jpermohonan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for jusaha
-- ----------------------------
DROP TABLE IF EXISTS `jusaha`;
CREATE TABLE `jusaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `usaha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for kelembagaan
-- ----------------------------
DROP TABLE IF EXISTS `kelembagaan`;
CREATE TABLE `kelembagaan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kelembagaan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for klui
-- ----------------------------
DROP TABLE IF EXISTS `klui`;
CREATE TABLE `klui` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kbli` int(255) DEFAULT NULL,
  `kegiatan_pokok` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=842 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for kualifikasi
-- ----------------------------
DROP TABLE IF EXISTS `kualifikasi`;
CREATE TABLE `kualifikasi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kualifikasi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for kusaha
-- ----------------------------
DROP TABLE IF EXISTS `kusaha`;
CREATE TABLE `kusaha` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kegiatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for layanan
-- ----------------------------
DROP TABLE IF EXISTS `layanan`;
CREATE TABLE `layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for lokasibangunan
-- ----------------------------
DROP TABLE IF EXISTS `lokasibangunan`;
CREATE TABLE `lokasibangunan` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lokasi` mediumblob,
  `nilai` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for master_syarat
-- ----------------------------
DROP TABLE IF EXISTS `master_syarat`;
CREATE TABLE `master_syarat` (
  `ID_SYARAT` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_SYARAT` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SYARAT`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for merk
-- ----------------------------
DROP TABLE IF EXISTS `merk`;
CREATE TABLE `merk` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `merk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for noformulir
-- ----------------------------
DROP TABLE IF EXISTS `noformulir`;
CREATE TABLE `noformulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for nosk
-- ----------------------------
DROP TABLE IF EXISTS `nosk`;
CREATE TABLE `nosk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  `ijin` varchar(100) DEFAULT NULL,
  `format` varchar(40) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=31737 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=31650 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for permohonanjenis
-- ----------------------------
DROP TABLE IF EXISTS `permohonanjenis`;
CREATE TABLE `permohonanjenis` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `ijin_id` tinyint(4) NOT NULL,
  `jpermohonan_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  PRIMARY KEY (`id`),
  KEY `Index_2` (`permohonan_id`,`spermohonan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30030 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=127207 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=26760 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for propinsi
-- ----------------------------
DROP TABLE IF EXISTS `propinsi`;
CREATE TABLE `propinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `propinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=2547 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=1406 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for satuanwaktu
-- ----------------------------
DROP TABLE IF EXISTS `satuanwaktu`;
CREATE TABLE `satuanwaktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(20) NOT NULL,
  `pengali` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `sertifikat`;
CREATE TABLE `sertifikat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=7894 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_SKTR`),
  KEY `FK_PEMOHON_SKTR` (`ID_PEMOHON`) USING BTREE,
  CONSTRAINT `FK_PEMOHON_SKTR` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for spermohonan
-- ----------------------------
DROP TABLE IF EXISTS `spermohonan`;
CREATE TABLE `spermohonan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for sperusahaan
-- ----------------------------
DROP TABLE IF EXISTS `sperusahaan`;
CREATE TABLE `sperusahaan` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `TGL_BERLAKU` date DEFAULT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_SPPL`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for statustempat
-- ----------------------------
DROP TABLE IF EXISTS `statustempat`;
CREATE TABLE `statustempat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for stempat
-- ----------------------------
DROP TABLE IF EXISTS `stempat`;
CREATE TABLE `stempat` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for syarat
-- ----------------------------
DROP TABLE IF EXISTS `syarat`;
CREATE TABLE `syarat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `syarat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=6124 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for tgl_libur
-- ----------------------------
DROP TABLE IF EXISTS `tgl_libur`;
CREATE TABLE `tgl_libur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
-- Table structure for trotoar
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
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_TROTOAR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_apotek_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_apotek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_idam_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_idam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_ipmbl_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_ipmbl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_iujk_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_iujt_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_iujt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_simb_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_simb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `det_sipd_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_sipd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=13848 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for warga
-- ----------------------------
DROP TABLE IF EXISTS `warga`;
CREATE TABLE `warga` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `warga` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
