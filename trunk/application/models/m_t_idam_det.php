<?php
class M_t_idam_det extends App_Model{
	var $mainSql = "SELECT 
				det_idam_id,
				det_idam_idam_id,
				det_idam_jenis,
				CASE WHEN det_idam_jenis = 1 THEN 'BARU'
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
				id AS pemohon_id,
				nama AS pemohon_nama,
				alamat AS pemohon_alamat,
				telp AS pemohon_telp,
				npwp AS pemohon_npwp,
				rt AS pemohon_rt,
				rw AS pemohon_rw,
				desa_id AS pemohon_kel,
				kecamatan_id AS pemohon_kec,
				ktp AS pemohon_nik,
				stra AS pemohon_stra,
				surattugas AS pemohon_surattugas,
				pekerjaan AS pemohon_pekerjaan,
				tempatlahir AS pemohon_tempatlahir,
				tgllahir AS pemohon_tanggallahir,
				pendidikan AS pemohon_pendidikan,
				tahunlulus AS pemohon_tahunlulus,
				det_idam_retribusi
				FROM t_idam_det 
				JOIN t_idam ON t_idam_det.det_idam_idam_id = t_idam.idam_id
				JOIN pemohon ON t_idam_det.det_idam_pemohon_id = pemohon.id
			WHERE det_idam_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_idam_det';
        $this->column_primary = 'det_idam_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function search($params){
		extract($params);
		
		$sql = $this->mainSql;
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID'];
		}
		
		if(@$det_idam_id != ''){
			$sql .= " AND det_idam_id = ".$det_idam_id." ";
		}
		if(@$det_idam_idam_id != ''){
			$sql .= " AND det_idam_idam_id LIKE '%".$det_idam_idam_id."%' ";
		}
		if(@$det_idam_sk != ''){
			$sql .= " AND det_idam_sk LIKE '%".$det_idam_sk."%' ";
		}
		if(@$det_idam_nomorreg != ''){
			$sql .= " AND det_idam_nomorreg LIKE '%".$det_idam_nomorreg."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
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
					pemohon_telp LIKE '%".$searchText."%' OR 
					det_idam_sk LIKE '%".$searchText."%' OR 
					idam_usaha LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%'
				)
			";
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
				WHERE ID_IJIN = 22
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}