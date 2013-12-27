<?php
class M_trayek extends App_model{
	var $mainSql = "SELECT 
				ID_TRAYEK,
				trayek.ID_TRAYEK_INTI,
				KODE_TRAYEK,
				NOMOR_UB,
				TGL_PERMOHONAN,
				CONCAT(5 * (DATEDIFF(NOW(), TGL_PERMOHONAN) DIV 7) + 
				MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(TGL_PERMOHONAN) + 
				1, 1),' Hari') as lama_proses,
				NAMA_PERUSAHAAN,
				pemohon_nama,
				pemohon_alamat,
				pemohon_telp,
				NOMOR_KENDARAAN,
				NAMA_PEMILIK,
				ALAMAT_PEMILIK,
				NO_HP,
				NOMOR_RANGKA,
				NOMOR_MESIN,
				JENIS_PERMOHONAN,
				TGL_AKHIR
				FROM trayek
				JOIN trayek_inti ON trayek_inti.ID_TRAYEK_INTI = trayek.ID_TRAYEK_INTI
				JOIN m_pemohon ON m_pemohon.pemohon_id = trayek_inti.ID_PEMOHON
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
					NAMA_PEMOHON LIKE '%".$searchText."%' OR 
					TGL_AKHIR LIKE '%".$searchText."%'
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
		if(@$TGL_AKHIR != ''){
			$sql .= " AND TGL_AKHIR LIKE '%".$TGL_AKHIR."%' ";
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
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 6;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 6;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 6;");
		return $query->result_array();
	}
}