<?php
class M_ijin_lingkungan_inti extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LINGKUNGAN_INTI,
				ID_USER,
				NO_REG,
				JENIS_USAHA,
				ALAMAT,
				ID_KELURAHAN,
				ID_KECAMATAN,
				ID_KOTA,
				STATUS_LOKASI,
				LUAS_USAHA,
				LUAS_BAHAN,
				LUAS_BANGUNAN,
				LUAS_RUANG_USAHA,
				KAPASITAS,
				IZIN_SKTR,
				IZIN_LOKASI
				FROM ijin_lingkungan_inti 
			WHERE ID_IJIN_LINGKUNGAN_INTI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'ijin_lingkungan_inti';
        $this->column_primary = 'ID_IJIN_LINGKUNGAN_INTI';
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
					NO_REG LIKE '%".$searchText."%' OR 
					JENIS_USAHA LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					ID_KELURAHAN LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					STATUS_LOKASI LIKE '%".$searchText."%' OR 
					LUAS_USAHA LIKE '%".$searchText."%' OR 
					LUAS_BAHAN LIKE '%".$searchText."%' OR 
					LUAS_BANGUNAN LIKE '%".$searchText."%' OR 
					LUAS_RUANG_USAHA LIKE '%".$searchText."%' OR 
					KAPASITAS LIKE '%".$searchText."%' OR 
					IZIN_SKTR LIKE '%".$searchText."%' OR 
					IZIN_LOKASI LIKE '%".$searchText."%'
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
		if(@$NO_REG != ''){
			$sql .= " AND NO_REG LIKE '%".$NO_REG."%' ";
		}
		if(@$JENIS_USAHA != ''){
			$sql .= " AND JENIS_USAHA LIKE '%".$JENIS_USAHA."%' ";
		}
		if(@$ALAMAT != ''){
			$sql .= " AND ALAMAT LIKE '%".$ALAMAT."%' ";
		}
		if(@$ID_KELURAHAN != ''){
			$sql .= " AND ID_KELURAHAN LIKE '%".$ID_KELURAHAN."%' ";
		}
		if(@$ID_KECAMATAN != ''){
			$sql .= " AND ID_KECAMATAN LIKE '%".$ID_KECAMATAN."%' ";
		}
		if(@$ID_KOTA != ''){
			$sql .= " AND ID_KOTA LIKE '%".$ID_KOTA."%' ";
		}
		if(@$STATUS_LOKASI != ''){
			$sql .= " AND STATUS_LOKASI LIKE '%".$STATUS_LOKASI."%' ";
		}
		if(@$LUAS_USAHA != ''){
			$sql .= " AND LUAS_USAHA LIKE '%".$LUAS_USAHA."%' ";
		}
		if(@$LUAS_BAHAN != ''){
			$sql .= " AND LUAS_BAHAN LIKE '%".$LUAS_BAHAN."%' ";
		}
		if(@$LUAS_BANGUNAN != ''){
			$sql .= " AND LUAS_BANGUNAN LIKE '%".$LUAS_BANGUNAN."%' ";
		}
		if(@$LUAS_RUANG_USAHA != ''){
			$sql .= " AND LUAS_RUANG_USAHA LIKE '%".$LUAS_RUANG_USAHA."%' ";
		}
		if(@$KAPASITAS != ''){
			$sql .= " AND KAPASITAS LIKE '%".$KAPASITAS."%' ";
		}
		if(@$IZIN_SKTR != ''){
			$sql .= " AND IZIN_SKTR LIKE '%".$IZIN_SKTR."%' ";
		}
		if(@$IZIN_LOKASI != ''){
			$sql .= " AND IZIN_LOKASI LIKE '%".$IZIN_LOKASI."%' ";
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