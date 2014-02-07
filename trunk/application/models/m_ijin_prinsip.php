<?php
class M_ijin_prinsip extends App_Model{
	var $mainSql = "SELECT 
				m_pemohon.pemohon_id,
				m_pemohon.pemohon_nik,
				m_pemohon.pemohon_nama,
				m_pemohon.pemohon_alamat,
				m_pemohon.pemohon_telp,
				ID_IJIN_PRINSIP,
				ID_PEMOHON,
				NAMA_PERUSAHAAN,
				NO_SK,
				NO_SK_LAMA,
				JENIS_PERMOHONAN,
				NAMA_LOKASI,
				LONGITUDE,
				LATITUDE,
				ALAMAT_LOKASI,
				JENIS_TOWER,
				FUNGSI_BANGUNAN,
				JENIS_BANGUNAN,
				UKURAN_BANGUNAN,
				TINGGI_BANGUNAN,
				TIANG_BANGUNAN,
				PONDASI_BANGUNAN,
				STATUS,
				STATUS_SURVEY,
				RETRIBUSI,
				TGL_BERAKHIR
				FROM ijin_prinsip
				JOIN m_pemohon ON m_pemohon.pemohon_id = ijin_prinsip.ID_PEMOHON
			WHERE ID_IJIN_PRINSIP IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'ijin_prinsip';
        $this->column_primary = 'ID_IJIN_PRINSIP';
        $this->column_order = 'ID_IJIN_PRINSIP';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NO_SK_LAMA LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%' OR 
					NAMA_LOKASI LIKE '%".$searchText."%' OR 
					LONGITUDE LIKE '%".$searchText."%' OR 
					LATITUDE LIKE '%".$searchText."%' OR 
					ALAMAT_LOKASI LIKE '%".$searchText."%' OR 
					JENIS_TOWER LIKE '%".$searchText."%' OR 
					FUNGSI_BANGUNAN LIKE '%".$searchText."%' OR 
					JENIS_BANGUNAN LIKE '%".$searchText."%' OR 
					UKURAN_BANGUNAN LIKE '%".$searchText."%' OR 
					TINGGI_BANGUNAN LIKE '%".$searchText."%' OR 
					TIANG_BANGUNAN LIKE '%".$searchText."%' OR 
					PONDASI_BANGUNAN LIKE '%".$searchText."%'
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
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NO_SK_LAMA != ''){
			$sql .= " AND NO_SK_LAMA LIKE '%".$NO_SK_LAMA."%' ";
		}
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
		}
		if(@$NAMA_LOKASI != ''){
			$sql .= " AND NAMA_LOKASI LIKE '%".$NAMA_LOKASI."%' ";
		}
		if(@$LONGITUDE != ''){
			$sql .= " AND LONGITUDE LIKE '%".$LONGITUDE."%' ";
		}
		if(@$LATITUDE != ''){
			$sql .= " AND LATITUDE LIKE '%".$LATITUDE."%' ";
		}
		if(@$ALAMAT_LOKASI != ''){
			$sql .= " AND ALAMAT_LOKASI LIKE '%".$ALAMAT_LOKASI."%' ";
		}
		if(@$JENIS_TOWER != ''){
			$sql .= " AND JENIS_TOWER LIKE '%".$JENIS_TOWER."%' ";
		}
		if(@$FUNGSI_BANGUNAN != ''){
			$sql .= " AND FUNGSI_BANGUNAN LIKE '%".$FUNGSI_BANGUNAN."%' ";
		}
		if(@$JENIS_BANGUNAN != ''){
			$sql .= " AND JENIS_BANGUNAN LIKE '%".$JENIS_BANGUNAN."%' ";
		}
		if(@$UKURAN_BANGUNAN != ''){
			$sql .= " AND UKURAN_BANGUNAN LIKE '%".$UKURAN_BANGUNAN."%' ";
		}
		if(@$TINGGI_BANGUNAN != ''){
			$sql .= " AND TINGGI_BANGUNAN LIKE '%".$TINGGI_BANGUNAN."%' ";
		}
		if(@$TIANG_BANGUNAN != ''){
			$sql .= " AND TIANG_BANGUNAN LIKE '%".$TIANG_BANGUNAN."%' ";
		}
		if(@$PONDASI_BANGUNAN != ''){
			$sql .= " AND PONDASI_BANGUNAN LIKE '%".$PONDASI_BANGUNAN."%' ";
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
				SELECT cek_list_prinsip.ID_SYARAT,cek_list_prinsip.ID_IJIN,cek_list_prinsip.`STATUS`,cek_list_prinsip.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_prinsip RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_prinsip.ID_SYARAT AND cek_list_prinsip.ID_IJIN = '" . $ijin_prinsip_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 12;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 12;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 12;");
		return $query->result_array();
	}
	function get_lk($ijin_prinsip_id){
		$query	= $this->db->query("SELECT cek_list_prinsip.ID_SYARAT,cek_list_prinsip.ID_IJIN,cek_list_prinsip.`STATUS`,cek_list_prinsip.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_prinsip RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_prinsip.ID_SYARAT AND cek_list_prinsip.ID_IJIN = '" . $ijin_prinsip_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 12;");
		return $query;
	}
}