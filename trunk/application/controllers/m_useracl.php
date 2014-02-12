<?php
class M_useracl extends App_model{
	var $mainSql = "SELECT 
				id,
				user_id,
				acl_id
				FROM useracl 
			WHERE id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'useracl';
        $this->column_primary = 'id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					user_id LIKE '%".$searchText."%' OR 
					acl_id LIKE '%".$searchText."%'
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
		
		if(@$user_id != ''){
			$sql .= " AND user_id LIKE '%".$user_id."%' ";
		}
		if(@$acl_id != ''){
			$sql .= " AND acl_id LIKE '%".$acl_id."%' ";
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