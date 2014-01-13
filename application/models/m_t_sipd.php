<?php
class M_t_sipd extends App_Model{
	var $mainSql = "SELECT 
				sipd_id,
				sipd_nama,
				sipd_alamat,
				sipd_telp,
				sipd_urutan,
				sipd_jenisdokter
				FROM t_sipd 
			WHERE sipd_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_sipd';
        $this->column_primary = 'sipd_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					sipd_nama LIKE '%".$searchText."%' OR 
					sipd_alamat LIKE '%".$searchText."%' OR 
					sipd_telp LIKE '%".$searchText."%' OR 
					sipd_urutan LIKE '%".$searchText."%' OR 
					sipd_jenisdokter LIKE '%".$searchText."%'
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
		
		if(@$sipd_nama != ''){
			$sql .= " AND sipd_nama LIKE '%".$sipd_nama."%' ";
		}
		if(@$sipd_alamat != ''){
			$sql .= " AND sipd_alamat LIKE '%".$sipd_alamat."%' ";
		}
		if(@$sipd_telp != ''){
			$sql .= " AND sipd_telp LIKE '%".$sipd_telp."%' ";
		}
		if(@$sipd_urutan != ''){
			$sql .= " AND sipd_urutan LIKE '%".$sipd_urutan."%' ";
		}
		if(@$sipd_jenisdokter != ''){
			$sql .= " AND sipd_jenisdokter LIKE '%".$sipd_jenisdokter."%' ";
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