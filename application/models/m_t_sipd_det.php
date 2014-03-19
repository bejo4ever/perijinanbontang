<?php
class M_t_sipd_det extends App_Model{
	var $mainSql = "SELECT 
				det_sipd_id,
				det_sipd_sipd_id,
				det_sipd_jenis,
				CASE WHEN det_sipd_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_sipd_jenis_nama,
				det_sipd_tanggal,
				det_sipd_pemohon_id,
				det_sipd_nomorreg,
				det_sipd_proses,
				det_sipd_sk,
				det_sipd_skurut,
				det_sipd_berlaku,
				det_sipd_kadaluarsa,
				det_sipd_terima,
				det_sipd_terimatanggal,
				det_sipd_kelengkapan,
				CASE WHEN det_sipd_kelengkapan = 1 THEN 'LENGKAP'
					ELSE 'TIDAK LENGKAP'
					END AS det_sipd_kelengkapan_nama,
				det_sipd_bap,
				det_sipd_keputusan,
				CASE WHEN det_sipd_keputusan = 1 THEN 'DISETUJUI'
					WHEN det_sipd_keputusan = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
					END AS det_sipd_keputusan_nama,
				det_sipd_baptanggal,
				det_sipd_sip,
				det_sipd_nrop,
				det_sipd_str,
				det_sipd_kompetensi,
				CONCAT(5 * (DATEDIFF(NOW(), det_sipd_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_sipd_tanggal) + 
						1, 1),' Hari') as lamaproses,
				det_sipd_retribusi,
				det_sipd_permohonan_id AS permohonan_id,
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
				FROM t_sipd_det 
				JOIN t_sipd ON t_sipd.sipd_id = t_sipd_det.det_sipd_sipd_id
				JOIN pemohon ON t_sipd_det.det_sipd_pemohon_id = pemohon.id
				JOIN perusahaan ON t_sipd.sipd_perusahaan_id = perusahaan.id
			WHERE det_sipd_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_sipd_det';
        $this->column_primary = 'det_sipd_id';
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
					det_sipd_sk LIKE '%".$searchText."%' OR 
					sipd_nama LIKE '%".$searchText."%' 
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
		if(@$det_sipd_id != ''){
			$sql .= " AND det_sipd_id = ".$det_sipd_id." ";
		}
		if(@$det_sipd_sipd_id != ''){
			$sql .= " AND det_sipd_sipd_id LIKE '%".$det_sipd_sipd_id."%' ";
		}
		if(@$det_sipd_sk != ''){
			$sql .= " AND det_sipd_sk LIKE '%".$det_sipd_sk."%' ";
		}
		if(@$det_sipd_nomorreg != ''){
			$sql .= " AND det_sipd_nomorreg LIKE '%".$det_sipd_nomorreg."%' ";
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
					sipd_cek_id,
					sipd_cek_syarat_id,
					sipd_cek_sipddet_id,
					sipd_cek_sipd_id,
					sipd_cek_status,
					sipd_cek_keterangan,
					NAMA_SYARAT AS sipd_cek_syarat_nama
				FROM t_sipd_ceklist 
				LEFT JOIN master_syarat ON t_sipd_ceklist.sipd_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE sipd_cek_sipddet_id = ".$sipd_det_id."
				AND sipd_cek_sipd_id = ".$sipd_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS sipd_cek_id,
					master_syarat.ID_SYARAT AS sipd_cek_syarat_id,
					NAMA_SYARAT AS sipd_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 26
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}