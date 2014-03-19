<?php
class M_t_ipmbl_det extends App_Model{
	var $mainSql = "SELECT 
				det_ipmbl_id,
				det_ipmbl_ipmbl_id,
				det_ipmbl_jenis,
				CASE WHEN det_ipmbl_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_ipmbl_jenis_nama,
				det_ipmbl_tanggal,
				det_ipmbl_nomoragenda,
				det_ipmbl_berkasmasuk,
				det_ipmbl_surveytanggal,
				det_ipmbl_surveylulus,
				det_ipmbl_status,
				CASE WHEN det_ipmbl_status = 1 THEN 'DISETUJUI'
					WHEN det_ipmbl_status = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
				END AS det_ipmbl_status_nama,
				det_ipmbl_surveypetugas,
				det_ipmbl_surveydinas,
				det_ipmbl_surveynip,
				det_ipmbl_surveypendapat,
				det_ipmbl_rekombl,
				det_ipmbl_rekomblhtanggal,
				det_ipmbl_rekomkel,
				det_ipmbl_rekomkeltanggal,
				det_ipmbl_rekomkec,
				det_ipmbl_rekomkectanggal,
				det_ipmbl_sk,
				det_ipmbl_kadaluarsa,
				det_ipmbl_berlaku,
				det_ipmbl_proses,
				ipmbl_luas,
				ipmbl_volume,
				ipmbl_keperluan,
				ipmbl_lokasi,
				ipmbl_kelurahan,
				ipmbl_kecamatan,
				ipmbl_usaha,
				ipmbl_alamatusaha,
				ipmbl_lokasi,
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
				CONCAT(5 * (DATEDIFF(NOW(), det_ipmbl_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_ipmbl_tanggal) + 
						1, 1),' Hari') as lamaproses,
				det_ipmbl_retribusi,
				det_ipmbl_permohonan_id AS permohonan_id
				FROM t_ipmbl_det 
				JOIN t_ipmbl ON t_ipmbl.ipmbl_id = t_ipmbl_det.det_ipmbl_ipmbl_id
				JOIN pemohon ON t_ipmbl_det.det_ipmbl_pemohon_id = pemohon.id
			WHERE det_ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl_det';
        $this->column_primary = 'det_ipmbl_id';
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
					pemohon_npwp LIKE '%".$searchText."%' OR 
					ipmbl_usaha LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					det_ipmbl_sk LIKE '%".$searchText."%' 
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
		
		if(@$det_ipmbl_id != ''){
			$sql .= " AND det_ipmbl_id LIKE '%".$det_ipmbl_id."%' ";
		}
		if(@$det_ipmbl_ipmbl_id != ''){
			$sql .= " AND det_ipmbl_ipmbl_id LIKE '%".$det_ipmbl_ipmbl_id."%' ";
		}
		if(@$det_ipmbl_sk != ''){
			$sql .= " AND det_ipmbl_sk LIKE '%".$det_ipmbl_sk."%' ";
		}
		if(@$det_ipmbl_nomorreg != ''){
			$sql .= " AND det_ipmbl_nomorreg LIKE '%".$det_ipmbl_nomorreg."%' ";
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
					ipmbl_cek_id,
					ipmbl_cek_syarat_id,
					ipmbl_cek_ipmbldet_id,
					ipmbl_cek_ipmbl_id,
					ipmbl_cek_status,
					ipmbl_cek_keterangan,
					NAMA_SYARAT AS ipmbl_cek_syarat_nama
				FROM t_ipmbl_ceklist 
				LEFT JOIN master_syarat ON t_ipmbl_ceklist.ipmbl_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE ipmbl_cek_ipmbldet_id = ".$ipmbl_det_id."
				AND ipmbl_cek_ipmbl_id = ".$ipmbl_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS ipmbl_cek_id,
					master_syarat.ID_SYARAT AS ipmbl_cek_syarat_id,
					NAMA_SYARAT AS ipmbl_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 23
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getRiwayat($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT 
					*
				FROM t_ipmbl_dok 
				WHERE dok_ipmbl_ipmbldet_id = ".$ipmbl_det_id."
				AND dok_ipmbl_ipmbl_id = ".$ipmbl_id."
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}