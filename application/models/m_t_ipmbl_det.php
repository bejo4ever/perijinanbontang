<?php
class M_t_ipmbl_det extends App_model{
	var $mainSql = "SELECT 
				det_ipmbl_id,
				det_ipmbl_ipmbl_id,
				det_ipmbl_nama,
				det_ipmbl_alamat,
				det_ipmbl_kelurahan,
				det_ipmbl_kecamatan,
				det_ipmbl_kota,
				det_ipmbl_telp,
				det_ipmbl_namausaha,
				det_ipmbl_alamatusaha,
				det_ipmbl_namapimpinan
				FROM t_ipmbl_det 
			WHERE det_ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl_det';
        $this->column_primary = 'det_ipmbl_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_ipmbl_ipmbl_id LIKE '%".$searchText."%' OR 
					det_ipmbl_nama LIKE '%".$searchText."%' OR 
					det_ipmbl_alamat LIKE '%".$searchText."%' OR 
					det_ipmbl_kelurahan LIKE '%".$searchText."%' OR 
					det_ipmbl_kecamatan LIKE '%".$searchText."%' OR 
					det_ipmbl_kota LIKE '%".$searchText."%' OR 
					det_ipmbl_telp LIKE '%".$searchText."%' OR 
					det_ipmbl_namausaha LIKE '%".$searchText."%' OR 
					det_ipmbl_alamatusaha LIKE '%".$searchText."%' OR 
					det_ipmbl_namapimpinan LIKE '%".$searchText."%'
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
		
		if(@$det_ipmbl_ipmbl_id != ''){
			$sql .= " AND det_ipmbl_ipmbl_id LIKE '%".$det_ipmbl_ipmbl_id."%' ";
		}
		if(@$det_ipmbl_nama != ''){
			$sql .= " AND det_ipmbl_nama LIKE '%".$det_ipmbl_nama."%' ";
		}
		if(@$det_ipmbl_alamat != ''){
			$sql .= " AND det_ipmbl_alamat LIKE '%".$det_ipmbl_alamat."%' ";
		}
		if(@$det_ipmbl_kelurahan != ''){
			$sql .= " AND det_ipmbl_kelurahan LIKE '%".$det_ipmbl_kelurahan."%' ";
		}
		if(@$det_ipmbl_kecamatan != ''){
			$sql .= " AND det_ipmbl_kecamatan LIKE '%".$det_ipmbl_kecamatan."%' ";
		}
		if(@$det_ipmbl_kota != ''){
			$sql .= " AND det_ipmbl_kota LIKE '%".$det_ipmbl_kota."%' ";
		}
		if(@$det_ipmbl_telp != ''){
			$sql .= " AND det_ipmbl_telp LIKE '%".$det_ipmbl_telp."%' ";
		}
		if(@$det_ipmbl_namausaha != ''){
			$sql .= " AND det_ipmbl_namausaha LIKE '%".$det_ipmbl_namausaha."%' ";
		}
		if(@$det_ipmbl_alamatusaha != ''){
			$sql .= " AND det_ipmbl_alamatusaha LIKE '%".$det_ipmbl_alamatusaha."%' ";
		}
		if(@$det_ipmbl_namapimpinan != ''){
			$sql .= " AND det_ipmbl_namapimpinan LIKE '%".$det_ipmbl_namapimpinan."%' ";
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