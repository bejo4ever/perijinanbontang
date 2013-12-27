<?php
class M_sppl extends App_model{
	var $mainSql = "SELECT 
				ID_SPPL,
				ID_PEMOHON,
				NO_SK,
				pemohon_nama,
				pemohon_telp,
				pemohon_alamat,
				JENIS_PERMOHONAN,
				CONCAT(5 * (DATEDIFF(NOW(), TGL_PERMOHONAN) DIV 7) + 
				MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(TGL_PERMOHONAN) + 
				1, 1),' Hari') as lama_proses,
				NAMA_USAHA,
				PENANGGUNG_JAWAB,
				NO_TELP,
				JENIS_USAHA,
				ALAMAT_USAHA,
				STATUS_LAHAN,
				NO_AKTA,
				TANGGAL,
				LUAS_LAHAN,
				LUAS_TAPAK_BANGUNAN,
				LUAS_KEGIATAN,
				LUAS_PARKIR
				FROM sppl JOIN m_pemohon ON m_pemohon.pemohon_id = sppl.ID_PEMOHON
			WHERE ID_SPPL IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'sppl';
        $this->column_primary = 'ID_SPPL';
        $this->column_order = 'ID_SPPL ASC';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_USER LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NAMA_USAHA LIKE '%".$searchText."%' OR 
					PENANGGUNG_JAWAB LIKE '%".$searchText."%' OR 
					NO_TELP LIKE '%".$searchText."%' OR 
					JENIS_USAHA LIKE '%".$searchText."%' OR 
					ALAMAT_USAHA LIKE '%".$searchText."%' OR 
					STATUS_LAHAN LIKE '%".$searchText."%' OR 
					NO_AKTA LIKE '%".$searchText."%' OR 
					TANGGAL LIKE '%".$searchText."%' OR 
					LUAS_LAHAN LIKE '%".$searchText."%' OR 
					LUAS_TAPAK_BANGUNAN LIKE '%".$searchText."%' OR 
					LUAS_KEGIATAN LIKE '%".$searchText."%' OR 
					LUAS_PARKIR LIKE '%".$searchText."%'
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
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NAMA_USAHA != ''){
			$sql .= " AND NAMA_USAHA LIKE '%".$NAMA_USAHA."%' ";
		}
		if(@$PENANGGUNG_JAWAB != ''){
			$sql .= " AND PENANGGUNG_JAWAB LIKE '%".$PENANGGUNG_JAWAB."%' ";
		}
		if(@$NO_TELP != ''){
			$sql .= " AND NO_TELP LIKE '%".$NO_TELP."%' ";
		}
		if(@$JENIS_USAHA != ''){
			$sql .= " AND JENIS_USAHA LIKE '%".$JENIS_USAHA."%' ";
		}
		if(@$ALAMAT_USAHA != ''){
			$sql .= " AND ALAMAT_USAHA LIKE '%".$ALAMAT_USAHA."%' ";
		}
		if(@$STATUS_LAHAN != ''){
			$sql .= " AND STATUS_LAHAN LIKE '%".$STATUS_LAHAN."%' ";
		}
		if(@$NO_AKTA != ''){
			$sql .= " AND NO_AKTA LIKE '%".$NO_AKTA."%' ";
		}
		if(@$TANGGAL != ''){
			$sql .= " AND TANGGAL LIKE '%".$TANGGAL."%' ";
		}
		if(@$LUAS_LAHAN != ''){
			$sql .= " AND LUAS_LAHAN LIKE '%".$LUAS_LAHAN."%' ";
		}
		if(@$LUAS_TAPAK_BANGUNAN != ''){
			$sql .= " AND LUAS_TAPAK_BANGUNAN LIKE '%".$LUAS_TAPAK_BANGUNAN."%' ";
		}
		if(@$LUAS_KEGIATAN != ''){
			$sql .= " AND LUAS_KEGIATAN LIKE '%".$LUAS_KEGIATAN."%' ";
		}
		if(@$LUAS_PARKIR != ''){
			$sql .= " AND LUAS_PARKIR LIKE '%".$LUAS_PARKIR."%' ";
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
	function getSyarat($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 9;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 9;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 9;");
		return $query->result_array();
	}
}