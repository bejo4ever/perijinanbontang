/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-02-07 19:16:05
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `RETRIBUSI` float(11,0) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_LINGKUNGAN`),
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`),
  CONSTRAINT `FK_LINGKUNGAN` FOREIGN KEY (`ID_IJIN_LINGKUNGAN_INTI`) REFERENCES `ijin_lingkungan_inti` (`ID_IJIN_LINGKUNGAN_INTI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lingkungan
-- ----------------------------
INSERT INTO `ijin_lingkungan` VALUES ('1', '1', null, 'Nomor/6/Tahun/2014', '', '1', null, '2014-02-06', '0000-00-00', '2', '0', null);
INSERT INTO `ijin_lingkungan` VALUES ('2', '2', null, 'Nomor/5/Tahun/2014', '', '1', '2014-02-06', '2014-02-06', '2014-02-27', '1', '1', null);

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
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN_PRINSIP`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_prinsip
-- ----------------------------
INSERT INTO `ijin_prinsip` VALUES ('8', '1', 'asd', '', '', '1', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '2019-12-31', '1', '1', null);
INSERT INTO `ijin_prinsip` VALUES ('9', '1', 'asd', '', '', '1', 'asd', 'asd', 'asd', 'ads', 'asd', 'asd', 'asd', 'asdd', '23', '2', '2', null, null, '2018-12-31', '0', '0', null);
INSERT INTO `ijin_prinsip` VALUES ('10', '1', 'asd', '', '8', '2', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '2019-12-31', '1', '1', null);
INSERT INTO `ijin_prinsip` VALUES ('11', '1', 'asd', null, '8', '1', 'asd', 'asd', 'asd', 'asd', 'ads', 'asd', 'adsa', 'ads', '23', '2', '2', null, null, '0000-00-00', '0', '0', null);
INSERT INTO `ijin_prinsip` VALUES ('12', '1', 'asd', null, '9', '2', 'asd', 'asd', 'asd', 'ads', 'asd', 'asd', 'asd', 'asdd', '23', '2', '2', null, null, '0000-00-00', '0', '0', null);
INSERT INTO `ijin_prinsip` VALUES ('13', '20', 'asd', '', '', '1', 'asd', 'asd', 'ads', 'asd', 'ads', 'asd', 'asd', 'asd', '12', '12', '12', '2014-02-07', null, '2014-02-13', '1', '1', '1000000');

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
  `RETRIBUSI` float DEFAULT NULL,
  `BBKB_I_JUMLAH` int(11) DEFAULT NULL,
  `BBKB_I_SATUAN` varchar(100) DEFAULT NULL,
  `BBKB_I_ASAL` varchar(100) DEFAULT NULL,
  `BBKB_I_HARGA` float DEFAULT NULL,
  `BBKB_I_KETERANGAN` varchar(200) DEFAULT NULL,
  `BBKO_I_JUMLAH` int(11) DEFAULT NULL,
  `BBKO_I_SATUAN` varchar(100) DEFAULT NULL,
  `BBKO_I_ASAL` varchar(100) DEFAULT NULL,
  `BBKO_I_HARGA` float DEFAULT NULL,
  `BBKO_I_KETERANGAN` varchar(200) DEFAULT NULL,
  `BP_I_JUMLAH` int(11) DEFAULT NULL,
  `BP_I_SATUAN` varchar(100) DEFAULT NULL,
  `BP_I_ASAL` varchar(100) DEFAULT NULL,
  `BP_I_HARGA` float DEFAULT NULL,
  `BP_I_KETERANGAN` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID_IUIPHHK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of iuiphhk
-- ----------------------------
INSERT INTO `iuiphhk` VALUES ('1', '0', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '0', '', '', '0', '', '0', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '', '', '0', '', '', '0', '', '', '', '', '0000-00-00', null, '0', '0', '0000-00-00', '0000-00-00', '0', '0', '', '', '0', '', '0', '', '', '0', '', '0', '', '', '0', '');

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
  `STATUS_RETRIBUSI` int(11) DEFAULT NULL,
  `RETRIBUSI` float NOT NULL,
  PRIMARY KEY (`ID_SKTR`),
  KEY `FK_PEMOHON_SKTR` (`ID_PEMOHON`) USING BTREE,
  CONSTRAINT `FK_PEMOHON_SKTR` FOREIGN KEY (`ID_PEMOHON`) REFERENCES `m_pemohon` (`pemohon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sktr
-- ----------------------------
INSERT INTO `sktr` VALUES ('1', '22', '1', '650/4/I DTRK-B', null, '0', 'Zulmi Adi Rizki', '123', 'toko', 'toko', 'toko', 'toko', 'Usaha', 'Wonocolo', '20', '120', '100', '2', '1', '2014-01-22', '2014-02-06', '2014-01-31', null, '1000000');

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
  `RETRIBUSI` float DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_SPPL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of sppl
-- ----------------------------
INSERT INTO `sppl` VALUES ('1', '1', '23', '2/SPPL/BLH/II/2014', null, 'Usaha', 'PJ', '031606', 'Jenis Usaha', 'Alamat usaha', '1', 'akta', '2013-12-31', '2013-12-31', '10', '10', '10', '10', null, '2', '2013-12-31', '2014-02-06', null, null, null);
INSERT INTO `sppl` VALUES ('2', '1', '22', '4/SPPL/BLH/II/2014', null, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '1', 'qwe', '2014-02-08', '2014-02-21', '3', '3', '223', '23', null, '2', '2014-02-06', '2014-02-06', '0000-00-00', null, null);

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
  `RETRIBUSI` float DEFAULT NULL,
  PRIMARY KEY (`ID_TROTOAR`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of trotoar
-- ----------------------------
INSERT INTO `trotoar` VALUES ('1', '23', '1', '1', '1', 'asd', 'asd', 'asd', 'asd', '0000-00-00', '0000-00-00', '2014-01-29', '1', '1', null);
INSERT INTO `trotoar` VALUES ('2', '22', '2', '', '1', 'ada', 'ada', 'ada', 'ada', '0000-00-00', '0000-00-00', '2014-01-17', '0', '0', null);
INSERT INTO `trotoar` VALUES ('3', '20', '2', '', '2', 'Mandiri Utama', 'Jl Bekisar', 'Pembangunan reklame', 'Jl Ambengan', '0000-00-00', '0000-00-00', '2015-12-31', '1', '1', null);

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

INSERT INTO `nosk` VALUES ('69', '2014', 'sktr', '650/xC/I DTRK-B', '4');
INSERT INTO `nosk` VALUES ('70', '2014', 'sppl', 'xC/SPPL/BLH/xB/xT', '11');
INSERT INTO `nosk` VALUES ('71', '2014', 'lingkungan', 'Nomor/xC/Tahun/xT', '6');

INSERT INTO `master_user` VALUES (30, 'iujk', 'iujk', 'iujk', '001', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (31, 'idam', 'idam', 'idam', '002', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (32, 'ipmbl', 'ipmbl', 'ipmbl', '003', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (33, 'iujt', 'iujt', 'iujt', '004', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (34, 'sktr', 'sktr', 'sktr', '005', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (35, 'sppl', 'sppl', 'sppl', '006', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (36, 'lingkungan', 'lingkungan', 'lingkungan', '007', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (37, 'apotek', 'apotek', 'apotek', '008', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (38, 'sipd', 'sipd', 'sipd', '009', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (39, 'iuiphhk', 'iuiphhk', 'iuiphhk', '010', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (40, 'prinsip', 'prinsip', 'prinsip', '011', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (41, 'trotoar', 'trotoar', 'trotoar', '012', '085706648944', 'mirra.ariesta@yahoo.com', 1);
INSERT INTO `master_user` VALUES (42, 'situmb', 'situmb', 'situmb', '013', '085706648944', 'mirra.ariesta@yahoo.com', 1);