<?php
class M_ijin_lokasi_inti extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LOKASI_INTI,
				NPWPD,
				NAMA_PERUSAHAAN,
				NO_AKTE,
				BENTUK_PERUSAHAAN,
				ALAMAT,
				ID_DESA,
				ID_KECAMATAN,
				ID_KOTA,
				TELEPON,
				PERUNTUKAN,
				STATUS_TANAH,
				KETERANGAN_STATUS,
				LUAS_TANAH,
				ALAMAT_LETAK_TANAH,
				ID_DESA_LETAK,
				ID_KECAMATAN_LETAK
				FROM ijin_lokasi_inti 
			WHERE ID_IJIN_LOKASI_INTI IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'ijin_lokasi_inti';
        $this->column_primary = 'ID_IJIN_LOKASI_INTI';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					NPWPD LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NO_AKTE LIKE '%".$searchText."%' OR 
					BENTUK_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					ID_DESA LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					TELEPON LIKE '%".$searchText."%' OR 
					PERUNTUKAN LIKE '%".$searchText."%' OR 
					STATUS_TANAH LIKE '%".$searchText."%' OR 
					KETERANGAN_STATUS LIKE '%".$searchText."%' OR 
					LUAS_TANAH LIKE '%".$searchText."%' OR 
					ALAMAT_LETAK_TANAH LIKE '%".$searchText."%' OR 
					ID_DESA_LETAK LIKE '%".$searchText."%' OR 
					ID_KECAMATAN_LETAK LIKE '%".$searchText."%'
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
		
		if(@$NPWPD != ''){
			$sql .= " AND NPWPD LIKE '%".$NPWPD."%' ";
		}
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$NO_AKTE != ''){
			$sql .= " AND NO_AKTE LIKE '%".$NO_AKTE."%' ";
		}
		if(@$BENTUK_PERUSAHAAN != ''){
			$sql .= " AND BENTUK_PERUSAHAAN LIKE '%".$BENTUK_PERUSAHAAN."%' ";
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
		if(@$TELEPON != ''){
			$sql .= " AND TELEPON LIKE '%".$TELEPON."%' ";
		}
		if(@$PERUNTUKAN != ''){
			$sql .= " AND PERUNTUKAN LIKE '%".$PERUNTUKAN."%' ";
		}
		if(@$STATUS_TANAH != ''){
			$sql .= " AND STATUS_TANAH LIKE '%".$STATUS_TANAH."%' ";
		}
		if(@$KETERANGAN_STATUS != ''){
			$sql .= " AND KETERANGAN_STATUS LIKE '%".$KETERANGAN_STATUS."%' ";
		}
		if(@$LUAS_TANAH != ''){
			$sql .= " AND LUAS_TANAH LIKE '%".$LUAS_TANAH."%' ";
		}
		if(@$ALAMAT_LETAK_TANAH != ''){
			$sql .= " AND ALAMAT_LETAK_TANAH LIKE '%".$ALAMAT_LETAK_TANAH."%' ";
		}
		if(@$ID_DESA_LETAK != ''){
			$sql .= " AND ID_DESA_LETAK LIKE '%".$ID_DESA_LETAK."%' ";
		}
		if(@$ID_KECAMATAN_LETAK != ''){
			$sql .= " AND ID_KECAMATAN_LETAK LIKE '%".$ID_KECAMATAN_LETAK."%' ";
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