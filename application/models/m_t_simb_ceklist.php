<?php
class M_t_simb_ceklist extends App_model{
	var $mainSql = "SELECT 
				simb_cek_id,
				simb_cek_simb_id,
				simb_cek_simbdet_id,
				simb_cek_syarat_id,
				simb_cek_status,
				simb_cek_keterangan
				FROM t_simb_ceklist 
			WHERE simb_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_simb_ceklist';
        $this->column_primary = 'simb_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					simb_cek_simb_id LIKE '%".$searchText."%' OR 
					simb_cek_simbdet_id LIKE '%".$searchText."%' OR 
					simb_cek_syarat_id LIKE '%".$searchText."%' OR 
					simb_cek_status LIKE '%".$searchText."%' OR 
					simb_cek_keterangan LIKE '%".$searchText."%'
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
		
		if(@$simb_cek_simb_id != ''){
			$sql .= " AND simb_cek_simb_id LIKE '%".$simb_cek_simb_id."%' ";
		}
		if(@$simb_cek_simbdet_id != ''){
			$sql .= " AND simb_cek_simbdet_id LIKE '%".$simb_cek_simbdet_id."%' ";
		}
		if(@$simb_cek_syarat_id != ''){
			$sql .= " AND simb_cek_syarat_id LIKE '%".$simb_cek_syarat_id."%' ";
		}
		if(@$simb_cek_status != ''){
			$sql .= " AND simb_cek_status LIKE '%".$simb_cek_status."%' ";
		}
		if(@$simb_cek_keterangan != ''){
			$sql .= " AND simb_cek_keterangan LIKE '%".$simb_cek_keterangan."%' ";
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