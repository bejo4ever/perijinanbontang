<?php
class M_ijin_lingkungan extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LINGUKANGAN,
				ID_IJIN_LINGKUNGAN_INTI,
				NO_KTP,
				NAMA_LENGKAP,
				TEMPAT_LAHIR,
				TANGGAL_LAHIR,
				KEWARGANEGARAAN,
				ALAMAT,
				ID_KELURAHAN,
				ID_KECAMATAN,
				ID_KOTA,
				TELP,
				NPWP,
				NAMA_PERUSAHAAN,
				NAMA_DIREKTUR,
				NO_AKTE,
				BENTUK_PERUSAHAAN,
				ALAMAT_PERUSAHAAN,
				ID_KELURAHAN2,
				ID_KECAMATAN2,
				ID_KOTA2,
				TELP2,
				JENIS_PERMOHONAN
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
					NO_KTP LIKE '%".$searchText."%' OR 
					NAMA_LENGKAP LIKE '%".$searchText."%' OR 
					TEMPAT_LAHIR LIKE '%".$searchText."%' OR 
					TANGGAL_LAHIR LIKE '%".$searchText."%' OR 
					KEWARGANEGARAAN LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					ID_KELURAHAN LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					TELP LIKE '%".$searchText."%' OR 
					NPWP LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NAMA_DIREKTUR LIKE '%".$searchText."%' OR 
					NO_AKTE LIKE '%".$searchText."%' OR 
					BENTUK_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ALAMAT_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ID_KELURAHAN2 LIKE '%".$searchText."%' OR 
					ID_KECAMATAN2 LIKE '%".$searchText."%' OR 
					ID_KOTA2 LIKE '%".$searchText."%' OR 
					TELP2 LIKE '%".$searchText."%' OR 
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
		
		if(@$ID_IJIN_LINGKUNGAN_INTI != ''){
			$sql .= " AND ID_IJIN_LINGKUNGAN_INTI LIKE '%".$ID_IJIN_LINGKUNGAN_INTI."%' ";
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
		if(@$TANGGAL_LAHIR != ''){
			$sql .= " AND TANGGAL_LAHIR LIKE '%".$TANGGAL_LAHIR."%' ";
		}
		if(@$KEWARGANEGARAAN != ''){
			$sql .= " AND KEWARGANEGARAAN LIKE '%".$KEWARGANEGARAAN."%' ";
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
		if(@$TELP != ''){
			$sql .= " AND TELP LIKE '%".$TELP."%' ";
		}
		if(@$NPWP != ''){
			$sql .= " AND NPWP LIKE '%".$NPWP."%' ";
		}
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$NAMA_DIREKTUR != ''){
			$sql .= " AND NAMA_DIREKTUR LIKE '%".$NAMA_DIREKTUR."%' ";
		}
		if(@$NO_AKTE != ''){
			$sql .= " AND NO_AKTE LIKE '%".$NO_AKTE."%' ";
		}
		if(@$BENTUK_PERUSAHAAN != ''){
			$sql .= " AND BENTUK_PERUSAHAAN LIKE '%".$BENTUK_PERUSAHAAN."%' ";
		}
		if(@$ALAMAT_PERUSAHAAN != ''){
			$sql .= " AND ALAMAT_PERUSAHAAN LIKE '%".$ALAMAT_PERUSAHAAN."%' ";
		}
		if(@$ID_KELURAHAN2 != ''){
			$sql .= " AND ID_KELURAHAN2 LIKE '%".$ID_KELURAHAN2."%' ";
		}
		if(@$ID_KECAMATAN2 != ''){
			$sql .= " AND ID_KECAMATAN2 LIKE '%".$ID_KECAMATAN2."%' ";
		}
		if(@$ID_KOTA2 != ''){
			$sql .= " AND ID_KOTA2 LIKE '%".$ID_KOTA2."%' ";
		}
		if(@$TELP2 != ''){
			$sql .= " AND TELP2 LIKE '%".$TELP2."%' ";
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