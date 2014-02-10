<?php
class M_groupmenu extends App_model{
	var $mainSql = "SELECT 
				id,menu,icon,`order`,link,publik
				FROM groupmenu 
			WHERE id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'groupmenu';
        $this->column_primary = 'id';
        $this->column_order = 'id ASC';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					menu LIKE '%".$searchText."%' OR 
					icon LIKE '%".$searchText."%' OR 
					order LIKE '%".$searchText."%' OR 
					link LIKE '%".$searchText."%' OR 
					publik LIKE '%".$searchText."%'
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
		
		if(@$menu != ''){
			$sql .= " AND menu LIKE '%".$menu."%' ";
		}
		if(@$icon != ''){
			$sql .= " AND icon LIKE '%".$icon."%' ";
		}
		if(@$order != ''){
			$sql .= " AND order LIKE '%".$order."%' ";
		}
		if(@$link != ''){
			$sql .= " AND link LIKE '%".$link."%' ";
		}
		if(@$publik != ''){
			$sql .= " AND publik LIKE '%".$publik."%' ";
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