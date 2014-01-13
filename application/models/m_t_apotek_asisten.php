<?php
class M_t_apotek_asisten extends App_Model{
	var $mainSql = "SELECT 
				asisten_id,
				asisten_apotek_id,
				asisten_apotekdet_id,
				asisten_nama,
				asisten_sik,
				asisten_lulus,
				asisten_alamat
				FROM t_apotek_asisten 
			WHERE asisten_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_apotek_asisten';
        $this->column_primary = 'asisten_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					asisten_apotek_id LIKE '%".$searchText."%' OR 
					asisten_apotekdet_id LIKE '%".$searchText."%' OR 
					asisten_nama LIKE '%".$searchText."%' OR 
					asisten_sik LIKE '%".$searchText."%' OR 
					asisten_lulus LIKE '%".$searchText."%' OR 
					asisten_alamat LIKE '%".$searchText."%'
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
		
		if(@$asisten_apotek_id != ''){
			$sql .= " AND asisten_apotek_id LIKE '%".$asisten_apotek_id."%' ";
		}
		if(@$asisten_apotekdet_id != ''){
			$sql .= " AND asisten_apotekdet_id LIKE '%".$asisten_apotekdet_id."%' ";
		}
		if(@$asisten_nama != ''){
			$sql .= " AND asisten_nama LIKE '%".$asisten_nama."%' ";
		}
		if(@$asisten_sik != ''){
			$sql .= " AND asisten_sik LIKE '%".$asisten_sik."%' ";
		}
		if(@$asisten_lulus != ''){
			$sql .= " AND asisten_lulus LIKE '%".$asisten_lulus."%' ";
		}
		if(@$asisten_alamat != ''){
			$sql .= " AND asisten_alamat LIKE '%".$asisten_alamat."%' ";
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