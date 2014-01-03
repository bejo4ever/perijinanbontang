/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-01-03 13:39:30
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
  KEY `FK_IJIN_LINGKUNGAN` (`ID_IJIN_LINGKUNGAN_INTI`)
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ijin_lokasi
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('1', 'admin', 'admin', 'Administrator', '19991011010101', '081303190712', 'admin@yahoo.com', '1');
INSERT INTO `master_user` VALUES ('2', 'noval', 'noval', 'Noval Debby Prasetyono', null, '03160684753', 'nvl@yahoo.com', '2');
INSERT INTO `master_user` VALUES ('3', 'pras', 'pras', 'Prasetyono, Noval Debby', null, '03160684753', 'pras@yahoo.com', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nosk
-- ----------------------------
INSERT INTO `nosk` VALUES ('1', '2013', '1', 'xC/006/DAM/xB/xT/DISKES.05', '20');
INSERT INTO `nosk` VALUES ('2', '2014', '1', 'xC/006/DAM/xB/xT/DISKES.05', '3');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('2013-12-30 23:41:42', '2', '19', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:04:41', '1', '19', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:05:54', '1', '19', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:28:03', '3', '20', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:51:33', '3', '0', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:53:33', '3', '20', '3', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 00:58:18', '1', '20', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:03:32', '1', '20', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:08:31', '1', '19', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:09:28', '1', '20', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:33:45', '2', '19', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:37:08', '2', '19', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 01:40:24', '1', '19', '5', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:02:46', '2', '22', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:14:41', '1', '22', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:41:56', '1', '22', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:49:54', '3', '20', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:51:22', '1', '20', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 02:51:58', '1', '20', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 03:02:55', '2', '22', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 03:04:05', '1', '22', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 03:04:35', '1', '22', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:16:46', '2', '19', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:19:45', '1', '19', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:21:43', '1', '19', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:36:17', '3', '20', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:37:39', '1', '20', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:39:24', '3', '20', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:40:27', '1', '20', '3', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 05:50:42', '2', '23', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 06:56:13', '1', '23', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 06:58:05', '1', '23', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 06:58:52', '1', '23', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 07:17:56', '2', '24', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 07:19:18', '1', '24', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2013-12-31 07:31:42', '2', '24', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2013-12-31 07:32:43', '1', '24', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2014-01-01 10:03:41', '2', '28', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 10:21:05', '2', '29', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 10:58:15', '1', '29', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 10:58:39', '1', '29', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2014-01-01 11:00:27', '1', '29', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2014-01-01 11:07:42', '1', '29', '2', 'Ubah');
INSERT INTO `t_log` VALUES ('2014-01-01 18:54:41', '1', '30', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 18:55:07', '1', '31', '2', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 19:00:39', '1', '32', '1', 'Tambah');
INSERT INTO `t_log` VALUES ('2014-01-01 19:52:52', '1', '32', '1', 'Ubah');
INSERT INTO `t_log` VALUES ('2014-01-01 19:53:23', '1', '32', '1', 'Ubah');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_sipd_det
-- ----------------------------
INSERT INTO `t_sipd_det` VALUES ('1', '1', '1', '2014-01-01', '29', '', 'Selesai, belum diambil', '1/006/DAM/I/2014/DISKES.05', '0', '2014-01-01', '2014-01-31', 'penerima', '2014-01-01', '1', 'bap', '1', '2014-01-01', 'sip', 'op', 'str', 'dokter umum');
INSERT INTO `t_sipd_det` VALUES ('2', '2', '2', '2014-01-01', '29', '', 'Selesai, belum diambil', '2/006/DAM/I/2014/DISKES.05', '0', '2014-01-01', '2014-01-31', 'Penerima', '2014-01-01', '1', 'bap', '1', '2014-01-01', 'sip', 'op', 'str', 'dokter umum');
