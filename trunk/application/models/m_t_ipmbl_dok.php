<?php
class M_t_ipmbl_dok extends App_model{
	var $mainSql = "SELECT 
				dok_ipmbl_id,
				dok_ipmbl_penerima,
				dok_ipmbl_jabatan,
				dok_ipmbl_tanggal,
				dok_ipmbl_keterangan,
				dok_ipmbl_ipmbl_id,
				dok_ipmbl_ipmbldet_id
				FROM t_ipmbl_dok 
			WHERE dok_ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl_dok';
        $this->column_primary = 'dok_ipmbl_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					dok_ipmbl_penerima LIKE '%".$searchText."%' OR 
					dok_ipmbl_jabatan LIKE '%".$searchText."%' OR 
					dok_ipmbl_tanggal LIKE '%".$searchText."%' OR 
					dok_ipmbl_keterangan LIKE '%".$searchText."%' OR 
					dok_ipmbl_ipmbl_id LIKE '%".$searchText."%' OR 
					dok_ipmbl_ipmbldet_id LIKE '%".$searchText."%'
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
		
		if(@$dok_ipmbl_penerima != ''){
			$sql .= " AND dok_ipmbl_penerima LIKE '%".$dok_ipmbl_penerima."%' ";
		}
		if(@$dok_ipmbl_jabatan != ''){
			$sql .= " AND dok_ipmbl_jabatan LIKE '%".$dok_ipmbl_jabatan."%' ";
		}
		if(@$dok_ipmbl_tanggal != ''){
			$sql .= " AND dok_ipmbl_tanggal LIKE '%".$dok_ipmbl_tanggal."%' ";
		}
		if(@$dok_ipmbl_keterangan != ''){
			$sql .= " AND dok_ipmbl_keterangan LIKE '%".$dok_ipmbl_keterangan."%' ";
		}
		if(@$dok_ipmbl_ipmbl_id != ''){
			$sql .= " AND dok_ipmbl_ipmbl_id LIKE '%".$dok_ipmbl_ipmbl_id."%' ";
		}
		if(@$dok_ipmbl_ipmbldet_id != ''){
			$sql .= " AND dok_ipmbl_ipmbldet_id LIKE '%".$dok_ipmbl_ipmbldet_id."%' ";
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