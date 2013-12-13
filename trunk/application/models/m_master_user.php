<?php
class M_master_user extends App_model{
	var $mainSql = "SELECT 
				ID_USER,
				USER,
				PASS,
				NAMA,
				NIP,
				TELP,
				EMAIL,
				ID_HAK
				FROM master_user 
			WHERE ID_USER IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'master_user';
        $this->column_primary = 'ID_USER';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					USER LIKE '%".$searchText."%' OR 
					PASS LIKE '%".$searchText."%' OR 
					NAMA LIKE '%".$searchText."%' OR 
					NIP LIKE '%".$searchText."%' OR 
					TELP LIKE '%".$searchText."%' OR 
					EMAIL LIKE '%".$searchText."%' OR 
					ID_HAK LIKE '%".$searchText."%'
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
		
		if(@$USER != ''){
			$sql .= " AND USER LIKE '%".$USER."%' ";
		}
		if(@$PASS != ''){
			$sql .= " AND PASS LIKE '%".$PASS."%' ";
		}
		if(@$NAMA != ''){
			$sql .= " AND NAMA LIKE '%".$NAMA."%' ";
		}
		if(@$NIP != ''){
			$sql .= " AND NIP LIKE '%".$NIP."%' ";
		}
		if(@$TELP != ''){
			$sql .= " AND TELP LIKE '%".$TELP."%' ";
		}
		if(@$EMAIL != ''){
			$sql .= " AND EMAIL LIKE '%".$EMAIL."%' ";
		}
		if(@$ID_HAK != ''){
			$sql .= " AND ID_HAK LIKE '%".$ID_HAK."%' ";
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