<?php
class M_ijin_lokasi extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LOKASI,
				ID_IJIN_LOKASI_INTI,
				NO_KTP,
				NAMA_LENGKAP,
				TEMPAT_LAHIR,
				TGL_LAHIR,
				PEKERJAAN,
				ALAMAT,
				ID_DESA,
				ID_KECAMATAN,
				ID_KOTA,
				TELEPON_PEMOHON
				FROM ijin_lokasi 
			WHERE ID_IJIN_LOKASI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'ijin_lokasi';
        $this->column_primary = 'ID_IJIN_LOKASI';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_IJIN_LOKASI_INTI LIKE '%".$searchText."%' OR 
					NO_KTP LIKE '%".$searchText."%' OR 
					NAMA_LENGKAP LIKE '%".$searchText."%' OR 
					TEMPAT_LAHIR LIKE '%".$searchText."%' OR 
					TGL_LAHIR LIKE '%".$searchText."%' OR 
					PEKERJAAN LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					ID_DESA LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					TELEPON_PEMOHON LIKE '%".$searchText."%'
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
		
		if(@$ID_IJIN_LOKASI_INTI != ''){
			$sql .= " AND ID_IJIN_LOKASI_INTI LIKE '%".$ID_IJIN_LOKASI_INTI."%' ";
		}
		if(@$NO_KTP != ''){
			$sql .= " AND NO_KTP LIKE '%".$NO_KTP."%' ";
		}
		if(@$NAMA_LENGKAP != ''){
			$sql .= " AND NAMA_LENGKAP LIKE '%".$NAMA_LENGKAP."%' ";
		}
		if(@$TEMPAT_LAHIR != ''){
			$sql .= " AND TEMPAT_LAHIR LIKE '%".$TEMPAT_LAHIR."%' ";
		}
		if(@$TGL_LAHIR != ''){
			$sql .= " AND TGL_LAHIR LIKE '%".$TGL_LAHIR."%' ";
		}
		if(@$PEKERJAAN != ''){
			$sql .= " AND PEKERJAAN LIKE '%".$PEKERJAAN."%' ";
		}
		if(@$ALAMAT != ''){
			$sql .= " AND ALAMAT LIKE '%".$ALAMAT."%' ";
		}
		if(@$ID_DESA != ''){
			$sql .= " AND ID_DESA LIKE '%".$ID_DESA."%' ";
		}
		if(@$ID_KECAMATAN != ''){
			$sql .= " AND ID_KECAMATAN LIKE '%".$ID_KECAMATAN."%' ";
		}
		if(@$ID_KOTA != ''){
			$sql .= " AND ID_KOTA LIKE '%".$ID_KOTA."%' ";
		}
		if(@$TELEPON_PEMOHON != ''){
			$sql .= " AND TELEPON_PEMOHON LIKE '%".$TELEPON_PEMOHON."%' ";
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