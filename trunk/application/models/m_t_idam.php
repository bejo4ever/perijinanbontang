<?php
class M_t_idam extends App_Model{
	var $mainSql = "SELECT 
				idam_id,
				idam_usaha,
				idam_jenisusaha,
				idam_alamat,
				idam_sertifikatpkp
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
					idam_usaha LIKE '%".$searchText."%' OR 
					idam_jenisusaha LIKE '%".$searchText."%' OR 
					idam_alamat LIKE '%".$searchText."%' OR 
					idam_sertifikatpkp LIKE '%".$searchText."%'
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