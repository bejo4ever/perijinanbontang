<?php
class M_t_idam_det extends App_model{
	var $mainSql = "SELECT 
				det_idam_id,
				det_idam_idam_id,
				det_idam_jenis,
				CASE WHEN det_idam_jenis = 1 THEN 'PERPANJANGAN'
					ELSE 'PERPANJANGAN'
					END AS det_idam_jenis_nama,
				det_idam_tanggal,
				det_idam_status,
				CASE WHEN det_idam_status = 1 THEN 'DISETUJUI'
					WHEN det_idam_status = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
					END AS det_idam_status_nama,
				det_idam_keterangan,
				det_idam_bap,
				det_idam_baptanggal,
				det_idam_kelengkapan,
				CASE WHEN det_idam_kelengkapan = 1 THEN 'LENGKAP'
					ELSE 'TIDAK LENGKAP'
					END AS det_idam_kelengkapan_nama,
				det_idam_terima,
				det_idam_terimatanggal,
				det_idam_sk,
				det_idam_berlaku,
				det_idam_kadaluarsa,
				det_idam_nomorreg,
				det_idam_lulussurvey,
				det_idam_proses,
				idam_usaha,
				idam_jenisusaha,
				idam_alamat,
				idam_sertifikatpkp,
				CONCAT(5 * (DATEDIFF(NOW(), det_idam_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_idam_tanggal) + 
						1, 1),' Hari') as lamaproses,
				pemohon_id,
				pemohon_nama,
				pemohon_alamat,
				pemohon_telp,
				pemohon_npwp,
				pemohon_rt,
				pemohon_rw,
				pemohon_kel,
				pemohon_kec,
				pemohon_nik,
				pemohon_stra,
				pemohon_surattugas,
				pemohon_pekerjaan,
				pemohon_tempatlahir,
				pemohon_tanggallahir,
				pemohon_user_id,
				pemohon_pendidikan,
				pemohon_tahunlulus
				FROM t_idam_det 
				JOIN t_idam ON t_idam_det.det_idam_idam_id = t_idam.idam_id
				JOIN m_pemohon ON t_idam_det.det_idam_pemohon_id = m_pemohon.pemohon_id
			WHERE det_idam_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_idam_det';
        $this->column_primary = 'det_idam_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_idam_idam_id LIKE '%".$searchText."%' OR 
					det_idam_jenis LIKE '%".$searchText."%' OR 
					det_idam_tanggal LIKE '%".$searchText."%' OR 
					det_idam_nama LIKE '%".$searchText."%' OR 
					det_idam_alamat LIKE '%".$searchText."%' OR 
					det_idam_telp LIKE '%".$searchText."%' OR 
					det_idam_tempatlahir LIKE '%".$searchText."%' OR 
					det_idam_tanggallahir LIKE '%".$searchText."%' OR 
					det_idam_pendidikan LIKE '%".$searchText."%' OR 
					det_idam_tahunlulus LIKE '%".$searchText."%' OR 
					det_idam_status LIKE '%".$searchText."%' OR 
					det_idam_keterangan LIKE '%".$searchText."%' OR 
					det_idam_bap LIKE '%".$searchText."%' OR 
					det_idam_baptanggal LIKE '%".$searchText."%' OR 
					det_idam_kelengkapan LIKE '%".$searchText."%' OR 
					det_idam_terima LIKE '%".$searchText."%' OR 
					det_idam_terimatanggal LIKE '%".$searchText."%' OR 
					det_idam_sk LIKE '%".$searchText."%' OR 
					det_idam_berlaku LIKE '%".$searchText."%' OR 
					det_idam_kadaluarsa LIKE '%".$searchText."%' OR 
					det_idam_nomorreg LIKE '%".$searchText."%'
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
		
		if(@$det_idam_id != ''){
			$sql .= " AND det_idam_id = ".$det_idam_id." ";
		}
		if(@$det_idam_idam_id != ''){
			$sql .= " AND det_idam_idam_id LIKE '%".$det_idam_idam_id."%' ";
		}
		if(@$det_idam_jenis != ''){
			$sql .= " AND det_idam_jenis LIKE '%".$det_idam_jenis."%' ";
		}
		if(@$det_idam_tanggal != ''){
			$sql .= " AND det_idam_tanggal LIKE '%".$det_idam_tanggal."%' ";
		}
		if(@$det_idam_nama != ''){
			$sql .= " AND det_idam_nama LIKE '%".$det_idam_nama."%' ";
		}
		if(@$det_idam_alamat != ''){
			$sql .= " AND det_idam_alamat LIKE '%".$det_idam_alamat."%' ";
		}
		if(@$det_idam_telp != ''){
			$sql .= " AND det_idam_telp LIKE '%".$det_idam_telp."%' ";
		}
		if(@$det_idam_tempatlahir != ''){
			$sql .= " AND det_idam_tempatlahir LIKE '%".$det_idam_tempatlahir."%' ";
		}
		if(@$det_idam_tanggallahir != ''){
			$sql .= " AND det_idam_tanggallahir LIKE '%".$det_idam_tanggallahir."%' ";
		}
		if(@$det_idam_pendidikan != ''){
			$sql .= " AND det_idam_pendidikan LIKE '%".$det_idam_pendidikan."%' ";
		}
		if(@$det_idam_tahunlulus != ''){
			$sql .= " AND det_idam_tahunlulus LIKE '%".$det_idam_tahunlulus."%' ";
		}
		if(@$det_idam_status != ''){
			$sql .= " AND det_idam_status LIKE '%".$det_idam_status."%' ";
		}
		if(@$det_idam_keterangan != ''){
			$sql .= " AND det_idam_keterangan LIKE '%".$det_idam_keterangan."%' ";
		}
		if(@$det_idam_bap != ''){
			$sql .= " AND det_idam_bap LIKE '%".$det_idam_bap."%' ";
		}
		if(@$det_idam_baptanggal != ''){
			$sql .= " AND det_idam_baptanggal LIKE '%".$det_idam_baptanggal."%' ";
		}
		if(@$det_idam_kelengkapan != ''){
			$sql .= " AND det_idam_kelengkapan LIKE '%".$det_idam_kelengkapan."%' ";
		}
		if(@$det_idam_terima != ''){
			$sql .= " AND det_idam_terima LIKE '%".$det_idam_terima."%' ";
		}
		if(@$det_idam_terimatanggal != ''){
			$sql .= " AND det_idam_terimatanggal LIKE '%".$det_idam_terimatanggal."%' ";
		}
		if(@$det_idam_sk != ''){
			$sql .= " AND det_idam_sk LIKE '%".$det_idam_sk."%' ";
		}
		if(@$det_idam_berlaku != ''){
			$sql .= " AND det_idam_berlaku LIKE '%".$det_idam_berlaku."%' ";
		}
		if(@$det_idam_kadaluarsa != ''){
			$sql .= " AND det_idam_kadaluarsa LIKE '%".$det_idam_kadaluarsa."%' ";
		}
		if(@$det_idam_nomorreg != ''){
			$sql .= " AND det_idam_nomorreg LIKE '%".$det_idam_nomorreg."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$this->firephp->log($sql);
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
					idam_cek_id,
					idam_cek_syarat_id,
					idam_cek_idamdet_id,
					idam_cek_idam_id,
					idam_cek_status,
					idam_cek_keterangan,
					NAMA_SYARAT AS idam_cek_syarat_nama
				FROM t_idam_ceklist 
				LEFT JOIN master_syarat ON t_idam_ceklist.idam_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE idam_cek_idamdet_id = ".$idam_det_id."
				AND idam_cek_idam_id = ".$idam_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS idam_cek_id,
					master_syarat.ID_SYARAT AS idam_cek_syarat_id,
					NAMA_SYARAT AS idam_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 1
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}