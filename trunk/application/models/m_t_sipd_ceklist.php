<?php
class M_t_sipd_ceklist extends App_model{
	var $mainSql = "SELECT 
				sipd_cek_id,
				sipd_cek_syarat_id,
				sipd_cek_sipd_id,
				sipd_cek_sipddet_id,
				sipd_cek_status,
				sipd_cek_keterangan
				FROM t_sipd_ceklist 
			WHERE sipd_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_sipd_ceklist';
        $this->column_primary = 'sipd_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					sipd_cek_syarat_id LIKE '%".$searchText."%' OR 
					sipd_cek_sipd_id LIKE '%".$searchText."%' OR 
					sipd_cek_sipddet_id LIKE '%".$searchText."%' OR 
					sipd_cek_status LIKE '%".$searchText."%' OR 
					sipd_cek_keterangan LIKE '%".$searchText."%'
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
		
		if(@$sipd_cek_syarat_id != ''){
			$sql .= " AND sipd_cek_syarat_id LIKE '%".$sipd_cek_syarat_id."%' ";
		}
		if(@$sipd_cek_sipd_id != ''){
			$sql .= " AND sipd_cek_sipd_id LIKE '%".$sipd_cek_sipd_id."%' ";
		}
		if(@$sipd_cek_sipddet_id != ''){
			$sql .= " AND sipd_cek_sipddet_id LIKE '%".$sipd_cek_sipddet_id."%' ";
		}
		if(@$sipd_cek_status != ''){
			$sql .= " AND sipd_cek_status LIKE '%".$sipd_cek_status."%' ";
		}
		if(@$sipd_cek_keterangan != ''){
			$sql .= " AND sipd_cek_keterangan LIKE '%".$sipd_cek_keterangan."%' ";
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