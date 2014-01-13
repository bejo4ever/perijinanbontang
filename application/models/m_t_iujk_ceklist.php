<?php
class M_t_iujk_ceklist extends App_Model{
	var $mainSql = "SELECT 
				iujk_cek_id,
				iujk_cek_syarat_id,
				iujk_cek_iujkdet_id,
				iujk_cek_iujk_id,
				iujk_cek_status,
				iujk_cek_keterangan
				FROM t_iujk_ceklist 
			WHERE iujk_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujk_ceklist';
        $this->column_primary = 'iujk_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					iujk_cek_syarat_id LIKE '%".$searchText."%' OR 
					iujk_cek_iujkdet_id LIKE '%".$searchText."%' OR 
					iujk_cek_iujk_id LIKE '%".$searchText."%' OR 
					iujk_cek_status LIKE '%".$searchText."%' OR 
					iujk_cek_keterangan LIKE '%".$searchText."%'
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
		
		if(@$iujk_cek_syarat_id != ''){
			$sql .= " AND iujk_cek_syarat_id LIKE '%".$iujk_cek_syarat_id."%' ";
		}
		if(@$iujk_cek_iujkdet_id != ''){
			$sql .= " AND iujk_cek_iujkdet_id LIKE '%".$iujk_cek_iujkdet_id."%' ";
		}
		if(@$iujk_cek_iujk_id != ''){
			$sql .= " AND iujk_cek_iujk_id LIKE '%".$iujk_cek_iujk_id."%' ";
		}
		if(@$iujk_cek_status != ''){
			$sql .= " AND iujk_cek_status LIKE '%".$iujk_cek_status."%' ";
		}
		if(@$iujk_cek_keterangan != ''){
			$sql .= " AND iujk_cek_keterangan LIKE '%".$iujk_cek_keterangan."%' ";
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