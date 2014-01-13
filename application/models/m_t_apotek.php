<?php
class M_t_apotek extends App_Model{
	var $mainSql = "SELECT 
				apotek_id,
				apotek_nama,
				apotek_alamat,
				apotek_telp,
				apotek_kel,
				apotek_kec,
				apotek_kepemilikan,
				apotek_pemilik,
				apotek_pemilikalamat,
				apotek_pemiliknpwp,
				apotek_siup
				FROM t_apotek 
			WHERE apotek_id IS NOT NULL";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_apotek';
        $this->column_primary = 'apotek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					apotek_nama LIKE '%".$searchText."%' OR 
					apotek_alamat LIKE '%".$searchText."%' OR 
					apotek_telp LIKE '%".$searchText."%' OR 
					apotek_kel LIKE '%".$searchText."%' OR 
					apotek_kec LIKE '%".$searchText."%' OR 
					apotek_kepemilikan LIKE '%".$searchText."%' OR 
					apotek_pemilik LIKE '%".$searchText."%' OR 
					apotek_pemilikalamat LIKE '%".$searchText."%' OR 
					apotek_pemiliknpwp LIKE '%".$searchText."%' OR 
					apotek_siup LIKE '%".$searchText."%'
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
		
		if(@$apotek_nama != ''){
			$sql .= " AND apotek_nama LIKE '%".$apotek_nama."%' ";
		}
		if(@$apotek_alamat != ''){
			$sql .= " AND apotek_alamat LIKE '%".$apotek_alamat."%' ";
		}
		if(@$apotek_telp != ''){
			$sql .= " AND apotek_telp LIKE '%".$apotek_telp."%' ";
		}
		if(@$apotek_kel != ''){
			$sql .= " AND apotek_kel LIKE '%".$apotek_kel."%' ";
		}
		if(@$apotek_kec != ''){
			$sql .= " AND apotek_kec LIKE '%".$apotek_kec."%' ";
		}
		if(@$apotek_kepemilikan != ''){
			$sql .= " AND apotek_kepemilikan LIKE '%".$apotek_kepemilikan."%' ";
		}
		if(@$apotek_pemilik != ''){
			$sql .= " AND apotek_pemilik LIKE '%".$apotek_pemilik."%' ";
		}
		if(@$apotek_pemilikalamat != ''){
			$sql .= " AND apotek_pemilikalamat LIKE '%".$apotek_pemilikalamat."%' ";
		}
		if(@$apotek_pemiliknpwp != ''){
			$sql .= " AND apotek_pemiliknpwp LIKE '%".$apotek_pemiliknpwp."%' ";
		}
		if(@$apotek_siup != ''){
			$sql .= " AND apotek_siup LIKE '%".$apotek_siup."%' ";
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