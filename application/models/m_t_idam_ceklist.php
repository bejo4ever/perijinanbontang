<?php
class M_t_idam_ceklist extends App_Model{
	var $mainSql = "SELECT 
				idam_cek_id,
				idam_cek_syarat_id,
				idam_cek_idamdet_id,
				idam_cek_idam_id,
				idam_cek_status,
				idam_cek_keterangan
				FROM t_idam_ceklist 
			WHERE idam_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_idam_ceklist';
        $this->column_primary = 'idam_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					idam_cek_syarat_id LIKE '%".$searchText."%' OR 
					idam_cek_idamdet_id LIKE '%".$searchText."%' OR 
					idam_cek_idam_id LIKE '%".$searchText."%' OR 
					idam_cek_status LIKE '%".$searchText."%' OR 
					idam_cek_keterangan LIKE '%".$searchText."%'
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
		
		if(@$idam_cek_syarat_id != ''){
			$sql .= " AND idam_cek_syarat_id LIKE '%".$idam_cek_syarat_id."%' ";
		}
		if(@$idam_cek_idamdet_id != ''){
			$sql .= " AND idam_cek_idamdet_id LIKE '%".$idam_cek_idamdet_id."%' ";
		}
		if(@$idam_cek_idam_id != ''){
			$sql .= " AND idam_cek_idam_id LIKE '%".$idam_cek_idam_id."%' ";
		}
		if(@$idam_cek_status != ''){
			$sql .= " AND idam_cek_status LIKE '%".$idam_cek_status."%' ";
		}
		if(@$idam_cek_keterangan != ''){
			$sql .= " AND idam_cek_keterangan LIKE '%".$idam_cek_keterangan."%' ";
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