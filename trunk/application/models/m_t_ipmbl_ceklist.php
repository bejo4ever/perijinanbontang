<?php
class M_t_ipmbl_ceklist extends App_Model{
	var $mainSql = "SELECT 
				ipmbl_cek_id,
				ipmbl_cek_syarat_id,
				ipmbl_cek_ipmbldet_id,
				ipmbl_cek_ipmbl_id,
				ipmbl_cek_status,
				ipmbl_cek_keterangan
				FROM t_ipmbl_ceklist 
			WHERE ipmbl_cek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl_ceklist';
        $this->column_primary = 'ipmbl_cek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ipmbl_cek_syarat_id LIKE '%".$searchText."%' OR 
					ipmbl_cek_ipmbldet_id LIKE '%".$searchText."%' OR 
					ipmbl_cek_ipmbl_id LIKE '%".$searchText."%' OR 
					ipmbl_cek_status LIKE '%".$searchText."%' OR 
					ipmbl_cek_keterangan LIKE '%".$searchText."%'
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
		
		if(@$ipmbl_cek_syarat_id != ''){
			$sql .= " AND ipmbl_cek_syarat_id LIKE '%".$ipmbl_cek_syarat_id."%' ";
		}
		if(@$ipmbl_cek_ipmbldet_id != ''){
			$sql .= " AND ipmbl_cek_ipmbldet_id LIKE '%".$ipmbl_cek_ipmbldet_id."%' ";
		}
		if(@$ipmbl_cek_ipmbl_id != ''){
			$sql .= " AND ipmbl_cek_ipmbl_id LIKE '%".$ipmbl_cek_ipmbl_id."%' ";
		}
		if(@$ipmbl_cek_status != ''){
			$sql .= " AND ipmbl_cek_status LIKE '%".$ipmbl_cek_status."%' ";
		}
		if(@$ipmbl_cek_keterangan != ''){
			$sql .= " AND ipmbl_cek_keterangan LIKE '%".$ipmbl_cek_keterangan."%' ";
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