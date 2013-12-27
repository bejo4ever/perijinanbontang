<?php
class M_ijin_lingkungan_inti extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LINGKUNGAN_INTI,
				ID_PEMOHON,
				NPWPD,
				NAMA_PERUSAHAAN,
				NO_AKTE,
				BENTUK_PERUSAHAAN,
				ALAMAT_PERUSAHAAN,
				ID_KOTA,
				ID_KECAMATAN,
				ID_KELURAHAN,
				NAMA_KEGIATAN,
				JENIS_USAHA,
				ALAMAT_LOKASI,
				ID_KELURAHAN_LOKASI,
				ID_KECAMATAN_LOKASI,
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
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					NPWPD LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NO_AKTE LIKE '%".$searchText."%' OR 
					BENTUK_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ALAMAT_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KELURAHAN LIKE '%".$searchText."%' OR 
					NAMA_KEGIATAN LIKE '%".$searchText."%' OR 
					JENIS_USAHA LIKE '%".$searchText."%' OR 
					ALAMAT_LOKASI LIKE '%".$searchText."%' OR 
					ID_KELURAHAN_LOKASI LIKE '%".$searchText."%' OR 
					ID_KECAMATAN_LOKASI LIKE '%".$searchText."%' OR 
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
		
		if(@$ID_PEMOHON != ''){
			$sql .= " AND ID_PEMOHON LIKE '%".$ID_PEMOHON."%' ";
		}
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
		if(@$ALAMAT_PERUSAHAAN != ''){
			$sql .= " AND ALAMAT_PERUSAHAAN LIKE '%".$ALAMAT_PERUSAHAAN."%' ";
		}
		if(@$ID_KOTA != ''){
			$sql .= " AND ID_KOTA LIKE '%".$ID_KOTA."%' ";
		}
		if(@$ID_KECAMATAN != ''){
			$sql .= " AND ID_KECAMATAN LIKE '%".$ID_KECAMATAN."%' ";
		}
		if(@$ID_KELURAHAN != ''){
			$sql .= " AND ID_KELURAHAN LIKE '%".$ID_KELURAHAN."%' ";
		}
		if(@$NAMA_KEGIATAN != ''){
			$sql .= " AND NAMA_KEGIATAN LIKE '%".$NAMA_KEGIATAN."%' ";
		}
		if(@$JENIS_USAHA != ''){
			$sql .= " AND JENIS_USAHA LIKE '%".$JENIS_USAHA."%' ";
		}
		if(@$ALAMAT_LOKASI != ''){
			$sql .= " AND ALAMAT_LOKASI LIKE '%".$ALAMAT_LOKASI."%' ";
		}
		if(@$ID_KELURAHAN_LOKASI != ''){
			$sql .= " AND ID_KELURAHAN_LOKASI LIKE '%".$ID_KELURAHAN_LOKASI."%' ";
		}
		if(@$ID_KECAMATAN_LOKASI != ''){
			$sql .= " AND ID_KECAMATAN_LOKASI LIKE '%".$ID_KECAMATAN_LOKASI."%' ";
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