<?php
class M_sktr_inti extends App_Model{
	var $mainSql = "SELECT 
				ID_SKTR_INTI,
				FUNGSI,
				ALAMAT_BANGUNAN,
				TINGGI_BANGUNAN,
				LUAS_PERSIL,
				LUAS_BANGUNAN
				FROM sktr_inti 
			WHERE ID_SKTR_INTI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'sktr_inti';
        $this->column_primary = 'ID_SKTR_INTI';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					FUNGSI LIKE '%".$searchText."%' OR 
					ALAMAT_BANGUNAN LIKE '%".$searchText."%' OR 
					TINGGI_BANGUNAN LIKE '%".$searchText."%' OR 
					LUAS_PERSIL LIKE '%".$searchText."%' OR 
					LUAS_BANGUNAN LIKE '%".$searchText."%'
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
		
		if(@$FUNGSI != ''){
			$sql .= " AND FUNGSI LIKE '%".$FUNGSI."%' ";
		}
		if(@$ALAMAT_BANGUNAN != ''){
			$sql .= " AND ALAMAT_BANGUNAN LIKE '%".$ALAMAT_BANGUNAN."%' ";
		}
		if(@$TINGGI_BANGUNAN != ''){
			$sql .= " AND TINGGI_BANGUNAN LIKE '%".$TINGGI_BANGUNAN."%' ";
		}
		if(@$LUAS_PERSIL != ''){
			$sql .= " AND LUAS_PERSIL LIKE '%".$LUAS_PERSIL."%' ";
		}
		if(@$LUAS_BANGUNAN != ''){
			$sql .= " AND LUAS_BANGUNAN LIKE '%".$LUAS_BANGUNAN."%' ";
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