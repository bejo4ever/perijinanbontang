<?php
class M_trayek_inti extends App_Model{
	var $mainSql = "SELECT 
				ID_TRAYEK_INTI,
				ID_USER,
				NOMOR_KENDARAAN,
				NAMA_PEMILIK,
				ALAMAT_PEMILIK,
				NO_HP,
				NOMOR_RANGKA,
				NOMOR_MESIN,
				JENIS_PERMOHONAN
				FROM trayek_inti 
			WHERE ID_TRAYEK_INTI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'trayek_inti';
        $this->column_primary = 'ID_TRAYEK_INTI';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_USER LIKE '%".$searchText."%' OR 
					NOMOR_KENDARAAN LIKE '%".$searchText."%' OR 
					NAMA_PEMILIK LIKE '%".$searchText."%' OR 
					ALAMAT_PEMILIK LIKE '%".$searchText."%' OR 
					NO_HP LIKE '%".$searchText."%' OR 
					NOMOR_RANGKA LIKE '%".$searchText."%' OR 
					NOMOR_MESIN LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%'
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
		
		if(@$ID_USER != ''){
			$sql .= " AND ID_USER LIKE '%".$ID_USER."%' ";
		}
		if(@$NOMOR_KENDARAAN != ''){
			$sql .= " AND NOMOR_KENDARAAN LIKE '%".$NOMOR_KENDARAAN."%' ";
		}
		if(@$NAMA_PEMILIK != ''){
			$sql .= " AND NAMA_PEMILIK LIKE '%".$NAMA_PEMILIK."%' ";
		}
		if(@$ALAMAT_PEMILIK != ''){
			$sql .= " AND ALAMAT_PEMILIK LIKE '%".$ALAMAT_PEMILIK."%' ";
		}
		if(@$NO_HP != ''){
			$sql .= " AND NO_HP LIKE '%".$NO_HP."%' ";
		}
		if(@$NOMOR_RANGKA != ''){
			$sql .= " AND NOMOR_RANGKA LIKE '%".$NOMOR_RANGKA."%' ";
		}
		if(@$NOMOR_MESIN != ''){
			$sql .= " AND NOMOR_MESIN LIKE '%".$NOMOR_MESIN."%' ";
		}
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
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