<?php
class M_ijin_lingkungan extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LINGUKANGAN,
				ID_IJIN_LINGKUNGAN_INTI,
				NO_REG,
				NO_SK,
				NAMA_DIREKTUR,
				JENIS_PERMOHONAN,
				TGL_PERMOHONAN,
				TGL_AWAL,
				TGL_AKHIR,
				STATUS,
				STATUS_SURVEY
				FROM ijin_lingkungan 
			WHERE ID_IJIN_LINGUKANGAN IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'ijin_lingkungan';
        $this->column_primary = 'ID_IJIN_LINGUKANGAN';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_IJIN_LINGKUNGAN_INTI LIKE '%".$searchText."%' OR 
					NO_REG LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NAMA_DIREKTUR LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%' OR 
					TGL_AWAL LIKE '%".$searchText."%' OR 
					TGL_AKHIR LIKE '%".$searchText."%' OR 
					STATUS LIKE '%".$searchText."%' OR 
					STATUS_SURVEY LIKE '%".$searchText."%'
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
		
		if(@$ID_IJIN_LINGKUNGAN_INTI != ''){
			$sql .= " AND ID_IJIN_LINGKUNGAN_INTI LIKE '%".$ID_IJIN_LINGKUNGAN_INTI."%' ";
		}
		if(@$NO_REG != ''){
			$sql .= " AND NO_REG LIKE '%".$NO_REG."%' ";
		}
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NAMA_DIREKTUR != ''){
			$sql .= " AND NAMA_DIREKTUR LIKE '%".$NAMA_DIREKTUR."%' ";
		}
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
		}
		if(@$TGL_PERMOHONAN != ''){
			$sql .= " AND TGL_PERMOHONAN LIKE '%".$TGL_PERMOHONAN."%' ";
		}
		if(@$TGL_AWAL != ''){
			$sql .= " AND TGL_AWAL LIKE '%".$TGL_AWAL."%' ";
		}
		if(@$TGL_AKHIR != ''){
			$sql .= " AND TGL_AKHIR LIKE '%".$TGL_AKHIR."%' ";
		}
		if(@$STATUS != ''){
			$sql .= " AND STATUS LIKE '%".$STATUS."%' ";
		}
		if(@$STATUS_SURVEY != ''){
			$sql .= " AND STATUS_SURVEY LIKE '%".$STATUS_SURVEY."%' ";
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