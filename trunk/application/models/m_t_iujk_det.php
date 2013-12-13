<?php
class M_t_iujk_det extends App_model{
	var $mainSql = "SELECT 
				det_iujk_id,
				det_iujk_iujk_id,
				det_iujk_nama,
				det_iujk_perusahaan,
				det_iujk_direktur,
				det_iujk_alamatusaha,
				det_iujk_nomorreg,
				det_iujk_tanggalreg
				FROM t_iujk_det 
			WHERE det_iujk_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujk_det';
        $this->column_primary = 'det_iujk_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_iujk_iujk_id LIKE '%".$searchText."%' OR 
					det_iujk_nama LIKE '%".$searchText."%' OR 
					det_iujk_perusahaan LIKE '%".$searchText."%' OR 
					det_iujk_direktur LIKE '%".$searchText."%' OR 
					det_iujk_alamatusaha LIKE '%".$searchText."%' OR 
					det_iujk_nomorreg LIKE '%".$searchText."%' OR 
					det_iujk_tanggalreg LIKE '%".$searchText."%'
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
		
		if(@$det_iujk_iujk_id != ''){
			$sql .= " AND det_iujk_iujk_id LIKE '%".$det_iujk_iujk_id."%' ";
		}
		if(@$det_iujk_nama != ''){
			$sql .= " AND det_iujk_nama LIKE '%".$det_iujk_nama."%' ";
		}
		if(@$det_iujk_perusahaan != ''){
			$sql .= " AND det_iujk_perusahaan LIKE '%".$det_iujk_perusahaan."%' ";
		}
		if(@$det_iujk_direktur != ''){
			$sql .= " AND det_iujk_direktur LIKE '%".$det_iujk_direktur."%' ";
		}
		if(@$det_iujk_alamatusaha != ''){
			$sql .= " AND det_iujk_alamatusaha LIKE '%".$det_iujk_alamatusaha."%' ";
		}
		if(@$det_iujk_nomorreg != ''){
			$sql .= " AND det_iujk_nomorreg LIKE '%".$det_iujk_nomorreg."%' ";
		}
		if(@$det_iujk_tanggalreg != ''){
			$sql .= " AND det_iujk_tanggalreg LIKE '%".$det_iujk_tanggalreg."%' ";
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