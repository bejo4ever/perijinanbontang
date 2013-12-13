<?php
class M_cek_list_lokasi extends App_model{
	var $mainSql = "SELECT 
				ID_SYARAT,
				ID_IJIN,
				STATUS,
				KETERANGAN
				FROM cek_list_lokasi 
			WHERE ID_IJIN IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'cek_list_lokasi';
        $this->column_primary = 'ID_IJIN';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					STATUS LIKE '%".$searchText."%' OR 
					KETERANGAN LIKE '%".$searchText."%'
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
		
		if(@$STATUS != ''){
			$sql .= " AND STATUS LIKE '%".$STATUS."%' ";
		}
		if(@$KETERANGAN != ''){
			$sql .= " AND KETERANGAN LIKE '%".$KETERANGAN."%' ";
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