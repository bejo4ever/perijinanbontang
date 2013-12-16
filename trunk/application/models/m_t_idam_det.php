<?php
class M_t_idam_det extends App_model{
	var $mainSql = "SELECT 
				det_idam_id,
				det_idam_idam_id,
				det_idam_nama,
				det_idam_alamat,
				det_idam_telp,
				det_idam_tempatlahir,
				det_idam_tanggallahir,
				det_idam_pendidikan,
				det_idam_tahunlulus
				FROM t_idam_det 
			WHERE det_idam_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_idam_det';
        $this->column_primary = 'det_idam_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_idam_idam_id LIKE '%".$searchText."%' OR 
					det_idam_nama LIKE '%".$searchText."%' OR 
					det_idam_alamat LIKE '%".$searchText."%' OR 
					det_idam_telp LIKE '%".$searchText."%' OR 
					det_idam_tempatlahir LIKE '%".$searchText."%' OR 
					det_idam_tanggallahir LIKE '%".$searchText."%' OR 
					det_idam_pendidikan LIKE '%".$searchText."%' OR 
					det_idam_tahunlulus LIKE '%".$searchText."%'
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
		
		if(@$det_idam_idam_id != ''){
			$sql .= " AND det_idam_idam_id LIKE '%".$det_idam_idam_id."%' ";
		}
		if(@$det_idam_nama != ''){
			$sql .= " AND det_idam_nama LIKE '%".$det_idam_nama."%' ";
		}
		if(@$det_idam_alamat != ''){
			$sql .= " AND det_idam_alamat LIKE '%".$det_idam_alamat."%' ";
		}
		if(@$det_idam_telp != ''){
			$sql .= " AND det_idam_telp LIKE '%".$det_idam_telp."%' ";
		}
		if(@$det_idam_tempatlahir != ''){
			$sql .= " AND det_idam_tempatlahir LIKE '%".$det_idam_tempatlahir."%' ";
		}
		if(@$det_idam_tanggallahir != ''){
			$sql .= " AND det_idam_tanggallahir LIKE '%".$det_idam_tanggallahir."%' ";
		}
		if(@$det_idam_pendidikan != ''){
			$sql .= " AND det_idam_pendidikan LIKE '%".$det_idam_pendidikan."%' ";
		}
		if(@$det_idam_tahunlulus != ''){
			$sql .= " AND det_idam_tahunlulus LIKE '%".$det_idam_tahunlulus."%' ";
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