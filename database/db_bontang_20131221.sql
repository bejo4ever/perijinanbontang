/*
Navicat MySQL Data Transfer

Source Server         : local_mysql_183
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : db_bontang

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2013-12-21 09:18:18
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
  `JABATAN` varchar(75) DEFAULT NULL,
  `PANGKAT` varchar(50) DEFAULT NULL,
  `WAKTUSELESAI` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_IJIN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_ijin
-- ----------------------------
INSERT INTO `master_ijin` VALUES ('1', 'Ijin Depo Air Minum', 'dr. Indriati As\'ad. MM', '19620209 198803 2 006', 'Kepala Dinas Kesehatan Kota Bontang', 'Pembina Tk 1', '5 hari');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_user
-- ----------------------------
INSERT INTO `master_user` VALUES ('1', 'nvl', 'nvl', 'Noval', '19991011010101', '0316060000', 'nvl@yahoo.com', '1');
INSERT INTO `master_user` VALUES ('2', 'fo', 'fo', 'Front Office', null, '031888888', 'fo@yahoo.com', '2');

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
  `pemohon_nik` varchar(20) DEFAULT NULL,
  `pemohon_stra` varchar(50) DEFAULT NULL,
  `pemohon_surattugas` varchar(50) DEFAULT NULL,
  `pemohon_pekerjaan` varchar(50) DEFAULT NULL,
  `pemohon_tempatlahir` varchar(50) DEFAULT NULL,
  `pemohon_tanggallahir` date DEFAULT NULL,
  `pemohon_user_id` int(11) DEFAULT NULL,
  `pemohon_pendidikan` varchar(50) DEFAULT NULL,
  `pemohon_tahunlulus` int(5) DEFAULT NULL,
  PRIMARY KEY (`pemohon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of m_pemohon
-- ----------------------------
INSERT INTO `m_pemohon` VALUES ('1', 'Noval Debby Prasetyono', 'Lidah Kulon', '031606888', '1/NPWP/2013', '5', '5', 'Lidah Kulon', 'Lakarsantri', '357818000001', '1/STRA/2013', '1/ST/2013', 'Programmer', 'Surabaya', '1994-12-07', '2', 'D3', '2013');
INSERT INTO `m_pemohon` VALUES ('4', 'NOVAL', 'ALAMAT', '031', 'NPWP', '5', '5', 'KEL', 'KEC', '357818', 'STRA', 'SP', 'PEKERJAAN', 'SURABAYA', '2013-12-20', '0', 'PEND', '2013');
INSERT INTO `m_pemohon` VALUES ('5', 'NOVAL DEBBY PRASETYONO', 'LIDAH KULON', '03160684753', 'NPWP', '5', '5', 'LIDAH KULON', 'LAKARSANTRI', '3578180712940001', 'STRA', 'SURAT TUGAS', 'PROGRAMMER', 'SURABAYA', '1994-12-07', '0', 'D3', '2013');
INSERT INTO `m_pemohon` VALUES ('6', 'NOVAL D', 'ALAMAT', '123123', 'NPWP', '5', '5', 'LIDAH', 'LAKAR', '123123', 'STRA', 'SURAT TUGAS', 'PEKERJAAN', 'SURABAYA', '1994-12-07', '0', 'D3', '2013');
INSERT INTO `m_pemohon` VALUES ('7', 'NVL', 'LIDAH', '031', 'NPWP', '5', '5', 'KEL', 'KEC', '3578180712940001', 'STRA', 'ST', 'KERJA', 'SBY', '1994-12-07', '0', 'PEND', '2013');
INSERT INTO `m_pemohon` VALUES ('8', 'nama', 'alamat', '031', 'npwp', '5', '5', 'kel', 'kec', '123123', 'stra', 'st', 'pekerjaan', 'sby', '2013-12-21', '0', 'pend', '2013');
INSERT INTO `m_pemohon` VALUES ('9', 'test', 'test', '1231', 'asdalskdj', '1', '1', 'kel', 'kec', '12121', 'stra', 'surat tugas', 'pekerjaan', 'surabaya', '2013-12-21', '0', 'asdjapds', '123');
INSERT INTO `m_pemohon` VALUES ('10', 'test', 'test', '1231', 'asdalskdj', '1', '1', 'kel', 'kec', '12121', 'stra', 'surat tugas', 'pekerjaan', 'surabaya', '2013-12-21', '0', 'asdjapds', '123');
INSERT INTO `m_pemohon` VALUES ('11', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2013-12-21', '0', '1', '0');
INSERT INTO `m_pemohon` VALUES ('12', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

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
INSERT INTO `t_apotek` VALUES ('1', 'apote', 'alamat', '031', 'kel', 'kec', '1', 'pemilik', 'alamat', 'npwp', 'siup');

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
  `asisten_lulus` date DEFAULT NULL,
  `asisten_alamat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`asisten_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_asisten
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_ceklist
-- ----------------------------

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
  PRIMARY KEY (`det_apotek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_apotek_det
-- ----------------------------
INSERT INTO `t_apotek_det` VALUES ('1', '1', '1', null, null, '1', 'penerima', '2013-12-17', '1', 'bap', '2013-12-17', '1', 'keterangan', '10', '1', '1', '1', '1', '1', 'pam', 'pln', '10', 'sedang', '10', '1', '1', '1', '1', '10', '10', '10', '10', '1', '10', '2013-12-17', '2013-12-17', '10', '2012', 'gssu', '2013-12-17', 'an', 'akta', '2013', 'notaris', 'an', 'letterc', 'kec', '2013-12-17', 'petok', 'persil', 'kelas', 'an', 'pihak1', 'pihak2', 'np', '2013-12-17', 'notaris', null, null, null);

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
INSERT INTO `t_idam` VALUES ('1', 'PERUSAHAAN', 'RUMAH MAKAN', 'JL MENGANTI LIDAH KULON', 'SPKP');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_ceklist
-- ----------------------------
INSERT INTO `t_idam_ceklist` VALUES ('1', '1', '1', '1', '1', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('2', '2', '1', '1', '1', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('3', '3', '1', '1', '1', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('4', '4', '1', '1', '1', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('5', '5', '1', '1', '0', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('6', '6', '1', '1', '1', 'keterangana');
INSERT INTO `t_idam_ceklist` VALUES ('7', '7', '1', '1', '1', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('8', '8', '1', '1', '0', 'keterangan');
INSERT INTO `t_idam_ceklist` VALUES ('9', '9', '1', '1', '1', 'keterangan');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_idam_det
-- ----------------------------
INSERT INTO `t_idam_det` VALUES ('1', '1', '1', '2013-12-20', '5', '', '1', 'KETERANGAN', 'BAP', '2013-12-21', '1', 'PENERIMABERKAS', '2013-12-20', 'SK', '2013-12-23', '2014-01-31', '0', 'Ditolak');

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
INSERT INTO `t_ipmbl` VALUES ('1', '12', '12', '1', '0', '0', 'usaha', 'alamat', null);
INSERT INTO `t_ipmbl` VALUES ('2', '10', '10', 'PERLU', 'LIDAH', 'LAKAR', 'USAHA', 'ALAMAT', 'LOKASI');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_ceklist
-- ----------------------------
INSERT INTO `t_ipmbl_ceklist` VALUES ('1', '14', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('2', '15', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('3', '16', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('4', '17', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('5', '18', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('6', '19', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('7', '20', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('8', '21', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('9', '22', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('10', '23', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('11', '47', '1', '1', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('12', '14', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('13', '15', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('14', '16', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('15', '17', '2', '2', '0', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('16', '18', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('17', '19', '2', '2', '0', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('18', '20', '2', '2', '0', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('19', '21', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('20', '22', '2', '2', '1', '');
INSERT INTO `t_ipmbl_ceklist` VALUES ('21', '23', '2', '2', '1', 'KET');
INSERT INTO `t_ipmbl_ceklist` VALUES ('22', '47', '2', '2', '1', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_ipmbl_det
-- ----------------------------
INSERT INTO `t_ipmbl_det` VALUES ('1', '1', '1', '2013-12-20', null, null, '12', '2013-12-20', '2013-12-20', '0', '1', 'petugas', 'dinas', 'nip', 'pendapat', 'blh', '2013-12-20', 'kel', '2013-12-20', 'kec', '2013-12-20', 'sk', '2013-12-20', '2013-12-20', null);
INSERT INTO `t_ipmbl_det` VALUES ('2', '2', '1', '2013-12-21', '6', null, '1', '2013-12-21', '2013-12-21', '', '1', 'ASDADS', 'ASDADS', 'ASDAD', 'ASDADASDASD', '123123', '2013-12-21', '123123', '2013-12-21', 'A123123', '2013-12-21', 'SK', '2013-12-21', '2014-01-18', 'Selesai, belum diambil');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk
-- ----------------------------
INSERT INTO `t_iujk` VALUES ('1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_ceklist
-- ----------------------------
INSERT INTO `t_iujk_ceklist` VALUES ('1', '24', '1', '1', '1', 'Ket');
INSERT INTO `t_iujk_ceklist` VALUES ('2', '26', '1', '1', '1', '');
INSERT INTO `t_iujk_ceklist` VALUES ('3', '27', '1', '1', '0', 'Ket');
INSERT INTO `t_iujk_ceklist` VALUES ('4', '28', '1', '1', '1', 'Ket');
INSERT INTO `t_iujk_ceklist` VALUES ('5', '29', '1', '1', '1', '');

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
  PRIMARY KEY (`det_iujk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujk_det
-- ----------------------------
INSERT INTO `t_iujk_det` VALUES ('1', '1', '1', '2013-12-21', '11', '1', '1', '2013-12-21', '1', '1', '1', '1', '1', '1', '2013-12-21', '2013-12-21', 'Ditolak');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt
-- ----------------------------
INSERT INTO `t_iujt` VALUES ('1', 'usaha', 'alamat', 'penanggung jawab', 'kantor cabang');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_ceklist
-- ----------------------------
INSERT INTO `t_iujt_ceklist` VALUES ('1', '1', '1', '3', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('2', '1', '1', '10', '0', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('3', '1', '1', '11', '0', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('4', '1', '1', '12', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('5', '1', '1', '13', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('6', '1', '1', '48', '0', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('7', '1', '1', '49', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('8', '1', '1', '50', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('9', '1', '1', '51', '1', 'keterangan');
INSERT INTO `t_iujt_ceklist` VALUES ('10', '1', '1', '52', '1', 'keterangan');

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
  PRIMARY KEY (`det_iujt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_iujt_det
-- ----------------------------
INSERT INTO `t_iujt_det` VALUES ('1', '1', '1', '2013-12-21', '8', null, 'norekom', '2013-12-21', '1', null, 'pemrohonan', 'cek', '2013-12-21', 'nip', 'catatan.', 'sk', '2013-12-21', '2013-12-28', 'Ditolak');
