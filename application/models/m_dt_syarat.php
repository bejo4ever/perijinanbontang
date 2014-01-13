<?php
class M_dt_syarat extends App_Model{
	var $mainSql = "SELECT 
				ID_IJIN,
				ID_SYARAT,
				JUMLAH
				FROM dt_syarat 
			WHERE ID_SYARAT IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'dt_syarat';
        $this->column_primary = 'ID_SYARAT';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params,$conditions=FALSE){
		extract($params);
		$sql = $this->mainSql;
		if($conditions == TRUE){
			$sql .="
				AND (
					ID_IIN = '" . $conditions . "'
				)
			";
		}
		if(@$searchText != ''){
			$sql .= "
				AND (
					JUMLAH LIKE '%".$searchText."%'
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
		
		if(@$JUMLAH != ''){
			$sql .= " AND JUMLAH LIKE '%".$JUMLAH."%' ";
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