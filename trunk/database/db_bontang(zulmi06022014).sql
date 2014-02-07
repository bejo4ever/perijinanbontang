ALTER TABLE `sppl`
ADD COLUMN `TGL_BERLAKU`  date NULL AFTER `TGL_PERMOHONAN`,
ADD COLUMN `TGL_BERAKHIR`  date NULL AFTER `TGL_BERLAKU`,
ADD COLUMN `RETRIBUSI`  float NOT NULL AFTER `TGL_BERAKHIR`;
ADD COLUMN `JABATAN`  varchar(50) NULL AFTER `RETRIBUSI`;

ALTER TABLE `ijin_lingkungan`
ADD COLUMN `RETRIBUSI`  float NOT NULL AFTER `STATUS_SURVEY`;

ALTER TABLE `ijin_prinsip`
ADD COLUMN `RETRIBUSI`  float NOT NULL AFTER `STATUS_SURVEY`;

ALTER TABLE `iuiphhk`
ADD COLUMN `RETRIBUSI`  float NOT NULL AFTER `TGL_BERAKHIR`;
ADD COLUMN `BBKB_I_JUMLAH`  int NULL AFTER `RETRIBUSI`,
ADD COLUMN `BBKB_I_SATUAN`  varchar(100) NULL AFTER `BBKB_I_JUMLAH`,
ADD COLUMN `BBKB_I_ASAL`  varchar(100) NULL AFTER `BBKB_I_SATUAN`,
ADD COLUMN `BBKB_I_HARGA`  float NULL AFTER `BBKB_I_ASAL`,
ADD COLUMN `BBKB_I_KETERANGAN`  varchar(200) NULL AFTER `BBKB_I_HARGA`;

ADD COLUMN `BBKO_I_JUMLAH`  int NULL AFTER `BBKB_I_KETERANGAN`,
ADD COLUMN `BBKO_I_SATUAN`  varchar(100) NULL AFTER `BBKO_I_JUMLAH`,
ADD COLUMN `BBKO_I_ASAL`  varchar(100) NULL AFTER `BBKO_I_SATUAN`,
ADD COLUMN `BBKO_I_HARGA`  float NULL AFTER `BBKO_I_ASAL`,
ADD COLUMN `BBKO_I_KETERANGAN`  varchar(200) NULL AFTER `BBKO_I_HARGA`;

ADD COLUMN `BP_I_JUMLAH`  int NULL AFTER `BBKO_I_KETERANGAN`,
ADD COLUMN `BP_I_SATUAN`  varchar(100) NULL AFTER `BP_I_JUMLAH`,
ADD COLUMN `BP_I_ASAL`  varchar(100) NULL AFTER `BP_I_SATUAN`,
ADD COLUMN `BP_I_HARGA`  float NULL AFTER `BP_I_ASAL`,
ADD COLUMN `BP_I_KETERANGAN`  varchar(200) NULL AFTER `BP_I_HARGA`;

ALTER TABLE `trotoar`
ADD COLUMN `RETRIBUSI`  float NOT NULL AFTER `STATUS_SURVEY`;

ALTER TABLE `sktr`
ADD COLUMN `RETRIBUSI`  float NOT NULL DEFAULT NULL AFTER `STATUS_RETRIBUSI`;

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