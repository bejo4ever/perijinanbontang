<?php
class M_t_iujt extends App_model{
	var $mainSql = "SELECT 
				iujt_id,
				iujt_usaha,
				iujt_alamatusaha,
				iujt_penanggungjawab
				FROM t_iujt 
			WHERE iujt_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujt';
        $this->column_primary = 'iujt_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					iujt_usaha LIKE '%".$searchText."%' OR 
					iujt_alamatusaha LIKE '%".$searchText."%' OR 
					iujt_penanggungjawab LIKE '%".$searchText."%'
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
		
		if(@$iujt_usaha != ''){
			$sql .= " AND iujt_usaha LIKE '%".$iujt_usaha."%' ";
		}
		if(@$iujt_alamatusaha != ''){
			$sql .= " AND iujt_alamatusaha LIKE '%".$iujt_alamatusaha."%' ";
		}
		if(@$iujt_penanggungjawab != ''){
			$sql .= " AND iujt_penanggungjawab LIKE '%".$iujt_penanggungjawab."%' ";
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