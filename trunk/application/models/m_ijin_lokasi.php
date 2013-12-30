<?php
class M_ijin_lokasi extends App_model{
	var $mainSql = "SELECT 
				ID_IJIN_LOKASI,
				ID_PEMOHON,
				NO_SK,
				NO_SK_LAMA,
				NPWPD,
				NO_AKTA,
				BENTUK_PERUSAHAAN,
				ALAMAT,
				RT,
				RW,
				ID_KELURAHAN,
				ID_KECAMATAN,
				ID_KOTA,
				TELP,
				FUNGSI,
				STATUS_TANAH,
				KETERANGAN_TANAH,
				LUAS_LOKASI,
				ALAMAT_LOKASI,
				ID_KELURAHAN_LOKASI,
				ID_KECAMATAN_LOKASI,
				pemohon_nama,
				pemohon_alamat,
				pemohon_telp,
				pemohon_npwp,
				pemohon_rt,
				pemohon_rw,
				pemohon_kel,
				pemohon_kec,
				pemohon_kota,
				pemohon_nik,
				pemohon_stra,
				pemohon_surattugas,
				pemohon_pekerjaan,
				pemohon_tempatlahir,
				pemohon_tanggallahir,
				pemohon_user_id,
				pemohon_pendidikan,
				pemohon_tahunlulus,
				pemohon_wn,
				pemohon_hp
				FROM ijin_lokasi
				JOIN m_pemohon ON m_pemohon.pemohon_id = ijin_lokasi.ID_PEMOHON
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
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NO_SK_LAMA LIKE '%".$searchText."%' OR 
					NPWPD LIKE '%".$searchText."%' OR 
					NO_AKTA LIKE '%".$searchText."%' OR 
					BENTUK_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					RT LIKE '%".$searchText."%' OR 
					RW LIKE '%".$searchText."%' OR 
					ID_KELURAHAN LIKE '%".$searchText."%' OR 
					ID_KECAMATAN LIKE '%".$searchText."%' OR 
					ID_KOTA LIKE '%".$searchText."%' OR 
					TELP LIKE '%".$searchText."%' OR 
					FUNGSI LIKE '%".$searchText."%' OR 
					STATUS_TANAH LIKE '%".$searchText."%' OR 
					KETERANGAN_TANAH LIKE '%".$searchText."%' OR 
					LUAS_LOKASI LIKE '%".$searchText."%' OR 
					ALAMAT_LOKASI LIKE '%".$searchText."%' OR 
					ID_KELURAHAN_LOKASI LIKE '%".$searchText."%' OR 
					ID_KECAMATAN_LOKASI LIKE '%".$searchText."%'
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
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NO_SK_LAMA != ''){
			$sql .= " AND NO_SK_LAMA LIKE '%".$NO_SK_LAMA."%' ";
		}
		if(@$NPWPD != ''){
			$sql .= " AND NPWPD LIKE '%".$NPWPD."%' ";
		}
		if(@$NO_AKTA != ''){
			$sql .= " AND NO_AKTA LIKE '%".$NO_AKTA."%' ";
		}
		if(@$BENTUK_PERUSAHAAN != ''){
			$sql .= " AND BENTUK_PERUSAHAAN LIKE '%".$BENTUK_PERUSAHAAN."%' ";
		}
		if(@$ALAMAT != ''){
			$sql .= " AND ALAMAT LIKE '%".$ALAMAT."%' ";
		}
		if(@$RT != ''){
			$sql .= " AND RT LIKE '%".$RT."%' ";
		}
		if(@$RW != ''){
			$sql .= " AND RW LIKE '%".$RW."%' ";
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
		if(@$FUNGSI != ''){
			$sql .= " AND FUNGSI LIKE '%".$FUNGSI."%' ";
		}
		if(@$STATUS_TANAH != ''){
			$sql .= " AND STATUS_TANAH LIKE '%".$STATUS_TANAH."%' ";
		}
		if(@$KETERANGAN_TANAH != ''){
			$sql .= " AND KETERANGAN_TANAH LIKE '%".$KETERANGAN_TANAH."%' ";
		}
		if(@$LUAS_LOKASI != ''){
			$sql .= " AND LUAS_LOKASI LIKE '%".$LUAS_LOKASI."%' ";
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
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		if($_SESSION["IDHAK"] == 2){
			$sql .= " AND m_pemohon.pemohon_user_id = " . $_SESSION["USERID"];
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
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 7;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 7;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 7;");
		return $query->result_array();
	}
}