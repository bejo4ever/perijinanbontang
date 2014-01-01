<?php
class M_iuiphhk_rencana_alat extends App_model{
	var $mainSql = "SELECT 
				ID_RENCANA_ALAT,
				ID_IUIPHHK,
				NAMA_ALAT,
				JUMLAH,
				KAPASITAS,
				MERK,
				TAHUN,
				NEGARA,
				HARGA,
				JENIS
				FROM iuiphhk_rencana_alat 
			WHERE ID_RENCANA_ALAT IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'iuiphhk_rencana_alat';
        $this->column_primary = 'ID_RENCANA_ALAT';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_IUIPHHK LIKE '%".$searchText."%' OR 
					NAMA_ALAT LIKE '%".$searchText."%' OR 
					JUMLAH LIKE '%".$searchText."%' OR 
					KAPASITAS LIKE '%".$searchText."%' OR 
					MERK LIKE '%".$searchText."%' OR 
					TAHUN LIKE '%".$searchText."%' OR 
					NEGARA LIKE '%".$searchText."%' OR 
					HARGA LIKE '%".$searchText."%' OR 
					JENIS LIKE '%".$searchText."%'
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
		
		if(@$ID_IUIPHHK != ''){
			$sql .= " AND ID_IUIPHHK LIKE '%".$ID_IUIPHHK."%' ";
		}
		if(@$NAMA_ALAT != ''){
			$sql .= " AND NAMA_ALAT LIKE '%".$NAMA_ALAT."%' ";
		}
		if(@$JUMLAH != ''){
			$sql .= " AND JUMLAH LIKE '%".$JUMLAH."%' ";
		}
		if(@$KAPASITAS != ''){
			$sql .= " AND KAPASITAS LIKE '%".$KAPASITAS."%' ";
		}
		if(@$MERK != ''){
			$sql .= " AND MERK LIKE '%".$MERK."%' ";
		}
		if(@$TAHUN != ''){
			$sql .= " AND TAHUN LIKE '%".$TAHUN."%' ";
		}
		if(@$NEGARA != ''){
			$sql .= " AND NEGARA LIKE '%".$NEGARA."%' ";
		}
		if(@$HARGA != ''){
			$sql .= " AND HARGA LIKE '%".$HARGA."%' ";
		}
		if(@$JENIS != ''){
			$sql .= " AND JENIS LIKE '%".$JENIS."%' ";
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