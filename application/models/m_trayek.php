<?php
class M_trayek extends App_model{
	var $mainSql = "SELECT 
				ID_TRAYEK,
				ID_TRAYEK_INTI,
				KODE_TRAYEK,
				NOMOR_UB,
				TGL_PERMOHONAN,
				NAMA_PERUSAHAAN,
				NAMA_PEMOHON
				FROM trayek 
			WHERE ID_TRAYEK IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'trayek';
        $this->column_primary = 'ID_TRAYEK';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_TRAYEK_INTI LIKE '%".$searchText."%' OR 
					KODE_TRAYEK LIKE '%".$searchText."%' OR 
					NOMOR_UB LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NAMA_PEMOHON LIKE '%".$searchText."%'
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
		
		if(@$ID_TRAYEK_INTI != ''){
			$sql .= " AND ID_TRAYEK_INTI LIKE '%".$ID_TRAYEK_INTI."%' ";
		}
		if(@$KODE_TRAYEK != ''){
			$sql .= " AND KODE_TRAYEK LIKE '%".$KODE_TRAYEK."%' ";
		}
		if(@$NOMOR_UB != ''){
			$sql .= " AND NOMOR_UB LIKE '%".$NOMOR_UB."%' ";
		}
		if(@$TGL_PERMOHONAN != ''){
			$sql .= " AND TGL_PERMOHONAN LIKE '%".$TGL_PERMOHONAN."%' ";
		}
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$NAMA_PEMOHON != ''){
			$sql .= " AND NAMA_PEMOHON LIKE '%".$NAMA_PEMOHON."%' ";
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