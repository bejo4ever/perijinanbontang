<?php
class M_t_apotek_det extends App_Model{
	var $mainSql = "SELECT 
				det_apotek_id,
				det_apotek_apotek_id,
				det_apotek_jenis,
				det_apotek_tanggal,
				CASE WHEN det_apotek_jenis = 1 THEN 'BARU'
					ELSE 'PERUBAHAN'
					END AS det_apotek_jenis_nama,
				det_apotek_surveylulus,
				det_apotek_terima,
				det_apotek_terimatanggal,
				det_apotek_kelengkapan,
				CASE WHEN det_apotek_kelengkapan = 1 THEN 'LENGKAP'
					ELSE 'TIDAK LENGKAP'
					END AS det_apotek_kelengkapan_nama,
				det_apotek_bap,
				det_apotek_baptanggal,
				det_apotek_keputusan,
				CASE WHEN det_apotek_keputusan = 1 THEN 'DISETUJUI'
					WHEN det_apotek_keputusan = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
					END AS det_apotek_keputusan_nama,
				det_apotek_keterangan,
				det_apotek_jarak,
				det_apotek_rracik,
				det_apotek_radmin,
				det_apotek_rkerja,
				det_apotek_rtunggu,
				det_apotek_rwc,
				det_apotek_air,
				det_apotek_listrik,
				det_apotek_apk,
				det_apotek_apkukuran,
				det_apotek_jendela,
				det_apotek_limbah,
				det_apotek_baksampah,
				det_apotek_parkir,
				det_apotek_papannama,
				det_apotek_pengelola,
				det_apotek_pendamping,
				det_apotek_asisten,
				det_apotek_luas,
				det_apotek_statustanah,
				det_apotek_sewalama,
				det_apotek_sewaawal,
				det_apotek_sewaakhir,
				det_apotek_shnomor,
				det_apotek_shtahun,
				det_apotek_shgssu,
				det_apotek_shtanggal,
				det_apotek_shan,
				det_apotek_aktano,
				det_apotek_aktatahun,
				det_apotek_aktanotaris,
				det_apotek_aktaan,
				det_apotek_ckutipan,
				det_apotek_ckec,
				det_apotek_ctanggal,
				det_apotek_cpetok,
				det_apotek_cpersil,
				det_apotek_ckelas,
				det_apotek_can,
				det_apotek_sppihak1,
				det_apotek_sppihak2,
				det_apotek_spnomor,
				det_apotek_sptanggal,
				det_apotek_notaris,
				det_apotek_sk,
				det_apotek_berlaku,
				det_apotek_kadaluarsa,
				det_apotek_proses,
				apotek_nama,
				apotek_alamat,
				apotek_telp,
				apotek_kel,
				apotek_kec,
				apotek_kepemilikan,
				apotek_pemilik,
				apotek_pemilikalamat,
				apotek_pemiliknpwp,
				apotek_siup,
				CONCAT(5 * (DATEDIFF(NOW(), det_apotek_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_apotek_tanggal) + 
						1, 1),' Hari') as lamaproses,
				det_apotek_retribusi,
				det_apotek_permohonan_id AS permohonan_id,
				pemohon.id AS pemohon_id,
				pemohon.nama AS pemohon_nama,
				pemohon.alamat AS pemohon_alamat,
				pemohon.telp AS pemohon_telp,
				pemohon.npwp AS pemohon_npwp,
				pemohon.rt AS pemohon_rt,
				pemohon.rw AS pemohon_rw,
				pemohon.desa_id AS pemohon_kel,
				pemohon.kecamatan_id AS pemohon_kec,
				pemohon.ktp AS pemohon_nik,
				pemohon.stra AS pemohon_stra,
				pemohon.surattugas AS pemohon_surattugas,
				pemohon.pekerjaan AS pemohon_pekerjaan,
				pemohon.tempatlahir AS pemohon_tempatlahir,
				pemohon.tgllahir AS pemohon_tanggallahir,
				pemohon.pendidikan AS pemohon_pendidikan,
				pemohon.tahunlulus AS pemohon_tahunlulus,
				perusahaan.id AS perusahaan_id,
				perusahaan.npwp AS perusahaan_npwp,
				perusahaan.nama AS perusahaan_nama,
				perusahaan.noakta AS perusahaan_noakta,
				perusahaan.notaris AS perusahaan_notaris,
				perusahaan.tglakta AS perusahaan_tglakta,
				perusahaan.bentuk_id AS perusahaan_bentuk_id,
				perusahaan.kualifikasi_id AS perusahaan_kualifikasi_id,
				perusahaan.alamat AS perusahaan_alamat,
				perusahaan.rt AS perusahaan_rt,
				perusahaan.rw AS perusahaan_rw,
				perusahaan.propinsi_id AS perusahaan_propinsi_id,
				perusahaan.kabkota_id AS perusahaan_kabkota_id,
				perusahaan.kecamatan_id AS perusahaan_kecamatan_id,
				perusahaan.desa_id AS perusahaan_desa_id,
				perusahaan.kodepos AS perusahaan_kodepos,
				perusahaan.telp AS perusahaan_telp,
				perusahaan.fax AS perusahaan_fax,
				perusahaan.stempat_id AS perusahaan_stempat_id,
				perusahaan.sperusahaan_id AS perusahaan_sperusahaan_id,
				perusahaan.usaha AS perusahaan_usaha,
				perusahaan.butara AS perusahaan_butara,
				perusahaan.bselatan AS perusahaan_bselatan,
				perusahaan.btimur AS perusahaan_btimur,
				perusahaan.bbarat AS perusahaan_bbarat,
				perusahaan.modal AS perusahaan_modal,
				perusahaan.merk AS perusahaan_merk,
				perusahaan.jusaha_id AS perusahaan_jusaha_id
				FROM t_apotek_det 
				JOIN t_apotek ON t_apotek.apotek_id = t_apotek_det.det_apotek_apotek_id
				JOIN pemohon ON t_apotek_det.det_apotek_pemohon_id = pemohon.id
				LEFT JOIN perusahaan ON t_apotek.apotek_perusahaan_id = perusahaan.id
			WHERE det_apotek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_apotek_det';
        $this->column_primary = 'det_apotek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID']." ";
		}
		if(@$searchText != ''){
			$sql .= "
				AND (
					pemohon_nama LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					apotek_nama LIKE '%".$searchText."%' OR 
					det_apotek_sk LIKE '%".$searchText."%' 
				)
			";
		}
				if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function search($params){
		extract($params);
		
		$sql = $this->mainSql;
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID']." ";
		}
		
		if(@$det_apotek_id != ''){
			$sql .= " AND det_apotek_id LIKE '%".$det_apotek_id."%' ";
		}
		if(@$det_apotek_apotek_id != ''){
			$sql .= " AND det_apotek_apotek_id LIKE '%".$det_apotek_apotek_id."%' ";
		}
		if(@$det_apotek_sk != ''){
			$sql .= " AND det_apotek_sk LIKE '%".$det_apotek_sk."%' ";
		}
		if(@$det_apotek_nomorreg != ''){
			$sql .= " AND det_apotek_nomorreg LIKE '%".$det_apotek_nomorreg."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function printExcel($params){
		extract($params);
		if(@$currentAction == "GETLIST"){
			$result = $this->getList($params);
		}else if(@$currentAction == "SEARCH"){
			$result = $this->search($params);
		}
		return $result;
	}
	function getSyarat($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT 
					apotek_cek_id,
					apotek_cek_syarat_id,
					apotek_cek_apotekdet_id,
					apotek_cek_apotek_id,
					apotek_cek_status,
					apotek_cek_keterangan,
					NAMA_SYARAT AS apotek_cek_syarat_nama
				FROM t_apotek_ceklist 
				LEFT JOIN master_syarat ON t_apotek_ceklist.apotek_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE apotek_cek_apotekdet_id = ".$apotek_det_id."
				AND apotek_cek_apotek_id = ".$apotek_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS apotek_cek_id,
					master_syarat.ID_SYARAT AS apotek_cek_syarat_id,
					NAMA_SYARAT AS apotek_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 25
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getPerlengkapan($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT 
					apotek_ket_id,
					apotek_ket_perlengkapanid,
					apotek_ket_status,
					apotek_ket_jumlah,
					perlengkapan_nama AS apotek_ket_perlengkapannama
				FROM t_apotek_ket 
				LEFT JOIN m_perlengkapan_apotek ON m_perlengkapan_apotek.perlengkapan_id = t_apotek_ket.apotek_ket_perlengkapanid
				WHERE apotek_ket_detapotek_id = ".$apotek_det_id."
				AND apotek_ket_apotek_id = ".$apotek_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS apotek_ket_id,
					m_perlengkapan_apotek.perlengkapan_id AS apotek_ket_perlengkapanid,
					perlengkapan_nama AS apotek_ket_perlengkapannama
				FROM m_perlengkapan_apotek 
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getAsisten($params){
		extract($params);
		$sql = "
			SELECT 
				asisten_id,
				asisten_apotek_id,
				asisten_apotekdet_id,
				asisten_nama,
				asisten_sik,
				asisten_lulus,
				asisten_alamat
			FROM t_apotek_asisten 
			WHERE asisten_apotekdet_id = ".$apotek_det_id."
			AND asisten_apotek_id = ".$apotek_id."
		";
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}