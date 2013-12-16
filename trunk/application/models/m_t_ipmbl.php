<?php
class M_t_ipmbl extends App_model{
	var $mainSql = "SELECT 
				ipmbl_id,
				ipmbl_luas,
				ipmbl_volume,
				ipmbl_keperluan,
				ipmbl_alamat,
				ipmbl_kelurahan,
				ipmbl_kecamatan,
				ipmbl_status,
				ipmbl_tanggalsurvey,
				ipmbl_usaha,
				ipmbl_alamatusaha
				FROM t_ipmbl 
			WHERE ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl';
        $this->column_primary = 'ipmbl_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ipmbl_luas LIKE '%".$searchText."%' OR 
					ipmbl_volume LIKE '%".$searchText."%' OR 
					ipmbl_keperluan LIKE '%".$searchText."%' OR 
					ipmbl_alamat LIKE '%".$searchText."%' OR 
					ipmbl_kelurahan LIKE '%".$searchText."%' OR 
					ipmbl_kecamatan LIKE '%".$searchText."%' OR 
					ipmbl_status LIKE '%".$searchText."%' OR 
					ipmbl_tanggalsurvey LIKE '%".$searchText."%' OR 
					ipmbl_usaha LIKE '%".$searchText."%' OR 
					ipmbl_alamatusaha LIKE '%".$searchText."%'
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
		
		if(@$ipmbl_luas != ''){
			$sql .= " AND ipmbl_luas LIKE '%".$ipmbl_luas."%' ";
		}
		if(@$ipmbl_volume != ''){
			$sql .= " AND ipmbl_volume LIKE '%".$ipmbl_volume."%' ";
		}
		if(@$ipmbl_keperluan != ''){
			$sql .= " AND ipmbl_keperluan LIKE '%".$ipmbl_keperluan."%' ";
		}
		if(@$ipmbl_alamat != ''){
			$sql .= " AND ipmbl_alamat LIKE '%".$ipmbl_alamat."%' ";
		}
		if(@$ipmbl_kelurahan != ''){
			$sql .= " AND ipmbl_kelurahan LIKE '%".$ipmbl_kelurahan."%' ";
		}
		if(@$ipmbl_kecamatan != ''){
			$sql .= " AND ipmbl_kecamatan LIKE '%".$ipmbl_kecamatan."%' ";
		}
		if(@$ipmbl_status != ''){
			$sql .= " AND ipmbl_status LIKE '%".$ipmbl_status."%' ";
		}
		if(@$ipmbl_tanggalsurvey != ''){
			$sql .= " AND ipmbl_tanggalsurvey LIKE '%".$ipmbl_tanggalsurvey."%' ";
		}
		if(@$ipmbl_usaha != ''){
			$sql .= " AND ipmbl_usaha LIKE '%".$ipmbl_usaha."%' ";
		}
		if(@$ipmbl_alamatusaha != ''){
			$sql .= " AND ipmbl_alamatusaha LIKE '%".$ipmbl_alamatusaha."%' ";
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