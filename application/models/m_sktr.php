<?php
class M_sktr extends App_model{
	var $mainSql = "SELECT 
				ID_SKTR,
				ID_PEMOHON,
				JENIS_PERMOHONAN,
				NO_SK,
				pemohon_nama,
				pemohon_telp,
				pemohon_alamat,
				CONCAT(5 * (DATEDIFF(NOW(), TGL_PERMOHONAN) DIV 7) + 
				MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(TGL_PERMOHONAN) + 
				1, 1),' Hari') as lama_proses,
				HAK_MILIK,
				NAMA_PEMILIK,
				NO_SURAT_TANAH,
				BATAS_KIRI,
				BATAS_KANAN,
				BATAS_DEPAN,
				BATAS_BELAKANG,
				TGL_PERMOHONAN,
				STATUS
				FROM sktr JOIN m_pemohon ON m_pemohon.pemohon_user_id = sktr.ID_PEMOHON
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
		if($_SESSION["IDHAK"] == 2){
			$sql = "SELECT 
						ID_SKTR,
						ID_PEMOHON,
						JENIS_PERMOHONAN,
						NO_SK
						HAK_MILIK,
						NAMA_PEMILIK,
						NO_SURAT_TANAH,
						BATAS_KIRI,
						BATAS_KANAN,
						BATAS_DEPAN,
						BATAS_BELAKANG,
						TGL_PERMOHONAN,
						STATUS,
						pemohon_id,
						pemohon_nama,
						pemohon_alamat,
						pemohon_telp,
						pemohon_npwp,
						pemohon_rt,
						pemohon_rw,
						pemohon_kel,
						pemohon_kec,
						pemohon_nik,
						pemohon_stra,
						pemohon_surattugas,
						pemohon_pekerjaan,
						pemohon_tempatlahir,
						pemohon_tanggallahir,
						pemohon_user_id,
						CONCAT(5 * (DATEDIFF(NOW(), TGL_PERMOHONAN) DIV 7) + 
						MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(TGL_PERMOHONAN) + 
						1, 1),' Hari') as lama_proses
						FROM sktr
						JOIN m_pemohon ON m_pemohon.pemohon_id = sktr.ID_PEMOHON
					WHERE ID_SKTR IS NOT NULL 
			";
		} else {
			$sql = $this->mainSql;
		}
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					pemohon_nama LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					HAK_MILIK LIKE '%".$searchText."%' OR 
					NAMA_PEMILIK LIKE '%".$searchText."%' OR 
					NO_SURAT_TANAH LIKE '%".$searchText."%' OR 
					BATAS_KIRI LIKE '%".$searchText."%' OR 
					BATAS_KANAN LIKE '%".$searchText."%' OR 
					BATAS_DEPAN LIKE '%".$searchText."%' OR 
					BATAS_BELAKANG LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%' OR 
					STATUS LIKE '%".$searchText."%'
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
		
		// if(@$ID_SKTR_INTI != ''){
			// $sql .= " AND ID_SKTR_INTI LIKE '%".$ID_SKTR_INTI."%' ";
		// }
		if(@$ID_PEMOHON != ''){
			$sql .= " AND ID_PEMOHON LIKE '%".$ID_PEMOHON."%' ";
		}
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
		}
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
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
		if(@$STATUS != ''){
			$sql .= " AND STATUS LIKE '%".$STATUS."%' ";
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
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 10;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 10;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 10;");
		return $query->result_array();
	}
}