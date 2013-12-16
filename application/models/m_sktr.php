<?php
class M_sktr extends App_model{
	var $mainSql = "SELECT 
				ID_SKTR,
				ID_USER,
				NAMA_PEMOHON,
				NO_TELP,
				HAK_MILIK,
				NAMA_PEMILIK,
				NO_SURAT_TANAH,
				ALAMAT_BANGUNAN,
				RENCANA_PERUNTUKAN,
				TINGGI_BANGUNAN,
				LUAS_PERSIL,
				LUAS_BANGUNAN,
				BATAS_KIRI,
				BATAS_KANAN,
				BATAS_DEPAN,
				BATAS_BELAKANG,
				TGL_PERMOHONAN
				FROM sktr 
			WHERE ID_SKTR IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'sktr';
        $this->column_primary = 'ID_SKTR';
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
					NAMA_PEMOHON LIKE '%".$searchText."%' OR 
					NO_TELP LIKE '%".$searchText."%' OR 
					HAK_MILIK LIKE '%".$searchText."%' OR 
					NAMA_PEMILIK LIKE '%".$searchText."%' OR 
					NO_SURAT_TANAH LIKE '%".$searchText."%' OR 
					ALAMAT_BANGUNAN LIKE '%".$searchText."%' OR 
					RENCANA_PERUNTUKAN LIKE '%".$searchText."%' OR 
					TINGGI_BANGUNAN LIKE '%".$searchText."%' OR 
					LUAS_PERSIL LIKE '%".$searchText."%' OR 
					LUAS_BANGUNAN LIKE '%".$searchText."%' OR 
					BATAS_KIRI LIKE '%".$searchText."%' OR 
					BATAS_KANAN LIKE '%".$searchText."%' OR 
					BATAS_DEPAN LIKE '%".$searchText."%' OR 
					BATAS_BELAKANG LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%'
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
		if(@$NAMA_PEMOHON != ''){
			$sql .= " AND NAMA_PEMOHON LIKE '%".$NAMA_PEMOHON."%' ";
		}
		if(@$NO_TELP != ''){
			$sql .= " AND NO_TELP LIKE '%".$NO_TELP."%' ";
		}
		if(@$HAK_MILIK != ''){
			$sql .= " AND HAK_MILIK LIKE '%".$HAK_MILIK."%' ";
		}
		if(@$NAMA_PEMILIK != ''){
			$sql .= " AND NAMA_PEMILIK LIKE '%".$NAMA_PEMILIK."%' ";
		}
		if(@$NO_SURAT_TANAH != ''){
			$sql .= " AND NO_SURAT_TANAH LIKE '%".$NO_SURAT_TANAH."%' ";
		}
		if(@$ALAMAT_BANGUNAN != ''){
			$sql .= " AND ALAMAT_BANGUNAN LIKE '%".$ALAMAT_BANGUNAN."%' ";
		}
		if(@$RENCANA_PERUNTUKAN != ''){
			$sql .= " AND RENCANA_PERUNTUKAN LIKE '%".$RENCANA_PERUNTUKAN."%' ";
		}
		if(@$TINGGI_BANGUNAN != ''){
			$sql .= " AND TINGGI_BANGUNAN LIKE '%".$TINGGI_BANGUNAN."%' ";
		}
		if(@$LUAS_PERSIL != ''){
			$sql .= " AND LUAS_PERSIL LIKE '%".$LUAS_PERSIL."%' ";
		}
		if(@$LUAS_BANGUNAN != ''){
			$sql .= " AND LUAS_BANGUNAN LIKE '%".$LUAS_BANGUNAN."%' ";
		}
		if(@$BATAS_KIRI != ''){
			$sql .= " AND BATAS_KIRI LIKE '%".$BATAS_KIRI."%' ";
		}
		if(@$BATAS_KANAN != ''){
			$sql .= " AND BATAS_KANAN LIKE '%".$BATAS_KANAN."%' ";
		}
		if(@$BATAS_DEPAN != ''){
			$sql .= " AND BATAS_DEPAN LIKE '%".$BATAS_DEPAN."%' ";
		}
		if(@$BATAS_BELAKANG != ''){
			$sql .= " AND BATAS_BELAKANG LIKE '%".$BATAS_BELAKANG."%' ";
		}
		if(@$TGL_PERMOHONAN != ''){
			$sql .= " AND TGL_PERMOHONAN LIKE '%".$TGL_PERMOHONAN."%' ";
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