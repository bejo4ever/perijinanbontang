<?php
class M_t_iujt_ceklist extends App_model{
	var $mainSql = "SELECT 
				iujt_cek_id,
				iujt_cek_iujt_id,
				iujt_cek_iujtdet_id,
				iujt_cek_syarat_id,
				iujt_cek_status
				FROM t_iujt_ceklist 
			WHERE iujt_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujt_ceklist';
        $this->column_primary = 'iujt_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					iujt_cek_iujt_id LIKE '%".$searchText."%' OR 
					iujt_cek_iujtdet_id LIKE '%".$searchText."%' OR 
					iujt_cek_syarat_id LIKE '%".$searchText."%' OR 
					iujt_cek_status LIKE '%".$searchText."%'
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
		
		if(@$iujt_cek_iujt_id != ''){
			$sql .= " AND iujt_cek_iujt_id LIKE '%".$iujt_cek_iujt_id."%' ";
		}
		if(@$iujt_cek_iujtdet_id != ''){
			$sql .= " AND iujt_cek_iujtdet_id LIKE '%".$iujt_cek_iujtdet_id."%' ";
		}
		if(@$iujt_cek_syarat_id != ''){
			$sql .= " AND iujt_cek_syarat_id LIKE '%".$iujt_cek_syarat_id."%' ";
		}
		if(@$iujt_cek_status != ''){
			$sql .= " AND iujt_cek_status LIKE '%".$iujt_cek_status."%' ";
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