<?php
class M_t_idam extends App_model{
	var $mainSql = "SELECT 
				idam_id,
				idam_jenis,
				idam_tanggal,
				idam_status,
				idam_keterangan,
				idam_bap,
				idam_baptanggal,
				idam_kelengkapan,
				idam_terima,
				idam_terimatanggal,
				idam_usaha,
				idam_jenisusaha,
				idam_alamat,
				idam_sertifikatpkp,
				idam_nomorijin,
				idam_nomorurut,
				idam_berlaku,
				idam_kadaluarsa
				FROM t_idam 
			WHERE idam_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_idam';
        $this->column_primary = 'idam_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					idam_jenis LIKE '%".$searchText."%' OR 
					idam_tanggal LIKE '%".$searchText."%' OR 
					idam_status LIKE '%".$searchText."%' OR 
					idam_keterangan LIKE '%".$searchText."%' OR 
					idam_bap LIKE '%".$searchText."%' OR 
					idam_baptanggal LIKE '%".$searchText."%' OR 
					idam_kelengkapan LIKE '%".$searchText."%' OR 
					idam_terima LIKE '%".$searchText."%' OR 
					idam_terimatanggal LIKE '%".$searchText."%' OR 
					idam_usaha LIKE '%".$searchText."%' OR 
					idam_jenisusaha LIKE '%".$searchText."%' OR 
					idam_alamat LIKE '%".$searchText."%' OR 
					idam_sertifikatpkp LIKE '%".$searchText."%' OR 
					idam_nomorijin LIKE '%".$searchText."%' OR 
					idam_nomorurut LIKE '%".$searchText."%' OR 
					idam_berlaku LIKE '%".$searchText."%' OR 
					idam_kadaluarsa LIKE '%".$searchText."%'
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
		
		if(@$idam_jenis != ''){
			$sql .= " AND idam_jenis LIKE '%".$idam_jenis."%' ";
		}
		if(@$idam_tanggal != ''){
			$sql .= " AND idam_tanggal LIKE '%".$idam_tanggal."%' ";
		}
		if(@$idam_status != ''){
			$sql .= " AND idam_status LIKE '%".$idam_status."%' ";
		}
		if(@$idam_keterangan != ''){
			$sql .= " AND idam_keterangan LIKE '%".$idam_keterangan."%' ";
		}
		if(@$idam_bap != ''){
			$sql .= " AND idam_bap LIKE '%".$idam_bap."%' ";
		}
		if(@$idam_baptanggal != ''){
			$sql .= " AND idam_baptanggal LIKE '%".$idam_baptanggal."%' ";
		}
		if(@$idam_kelengkapan != ''){
			$sql .= " AND idam_kelengkapan LIKE '%".$idam_kelengkapan."%' ";
		}
		if(@$idam_terima != ''){
			$sql .= " AND idam_terima LIKE '%".$idam_terima."%' ";
		}
		if(@$idam_terimatanggal != ''){
			$sql .= " AND idam_terimatanggal LIKE '%".$idam_terimatanggal."%' ";
		}
		if(@$idam_usaha != ''){
			$sql .= " AND idam_usaha LIKE '%".$idam_usaha."%' ";
		}
		if(@$idam_jenisusaha != ''){
			$sql .= " AND idam_jenisusaha LIKE '%".$idam_jenisusaha."%' ";
		}
		if(@$idam_alamat != ''){
			$sql .= " AND idam_alamat LIKE '%".$idam_alamat."%' ";
		}
		if(@$idam_sertifikatpkp != ''){
			$sql .= " AND idam_sertifikatpkp LIKE '%".$idam_sertifikatpkp."%' ";
		}
		if(@$idam_nomorijin != ''){
			$sql .= " AND idam_nomorijin LIKE '%".$idam_nomorijin."%' ";
		}
		if(@$idam_nomorurut != ''){
			$sql .= " AND idam_nomorurut LIKE '%".$idam_nomorurut."%' ";
		}
		if(@$idam_berlaku != ''){
			$sql .= " AND idam_berlaku LIKE '%".$idam_berlaku."%' ";
		}
		if(@$idam_kadaluarsa != ''){
			$sql .= " AND idam_kadaluarsa LIKE '%".$idam_kadaluarsa."%' ";
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
	
}