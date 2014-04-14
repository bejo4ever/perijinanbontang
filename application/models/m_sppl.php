<?php
class M_sppl extends App_Model{
	var $mainSql = "SELECT 
				ID_SPPL,
				ID_PEMOHON,
				NO_SK,
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
				MULAI_KEGIATAN,
				TANGGAL,
				STATUS_SURVEY,
				STATUS,
				TGL_BERAKHIR,
				TGL_BERLAKU,
				LUAS_LAHAN,
				LUAS_TAPAK_BANGUNAN,
				LUAS_KEGIATAN,
				LUAS_PARKIR,
				pemohon.id AS pemohon_id,
				pemohon.nama AS pemohon_nama,
				pemohon.alamat AS pemohon_alamat,
				pemohon.telp AS pemohon_telp,
				pemohon.npwp AS pemohon_npwp,
				pemohon.rt AS pemohon_rt,
				pemohon.rw AS pemohon_rw,
				pemohon.desa_id AS pemohon_kel,
				pemohon.kecamatan_id AS pemohon_kec,
				pemohon.ktp AS pemohon_nik,
				pemohon.stra AS pemohon_stra,
				pemohon.surattugas AS pemohon_surattugas,
				pemohon.pekerjaan AS pemohon_pekerjaan,
				pemohon.tempatlahir AS pemohon_tempatlahir,
				pemohon.tgllahir AS pemohon_tanggallahir,
				pemohon.pendidikan AS pemohon_pendidikan,
				pemohon.tahunlulus AS pemohon_tahunlulus,
				perusahaan.id AS perusahaan_id,
				perusahaan.npwp AS perusahaan_npwp,
				perusahaan.nama AS perusahaan_nama,
				perusahaan.noakta AS perusahaan_noakta,
				perusahaan.notaris AS perusahaan_notaris,
				perusahaan.tglakta AS perusahaan_tglakta,
				perusahaan.bentuk_id AS perusahaan_bentuk_id,
				perusahaan.kualifikasi_id AS perusahaan_kualifikasi_id,
				perusahaan.alamat AS perusahaan_alamat,
				perusahaan.rt AS perusahaan_rt,
				perusahaan.rw AS perusahaan_rw,
				perusahaan.propinsi_id AS perusahaan_propinsi_id,
				perusahaan.kabkota_id AS perusahaan_kabkota_id,
				perusahaan.kecamatan_id AS perusahaan_kecamatan_id,
				perusahaan.desa_id AS perusahaan_desa_id,
				perusahaan.kodepos AS perusahaan_kodepos,
				perusahaan.telp AS perusahaan_telp,
				perusahaan.fax AS perusahaan_fax,
				perusahaan.stempat_id AS perusahaan_stempat_id,
				perusahaan.sperusahaan_id AS perusahaan_sperusahaan_id,
				perusahaan.usaha AS perusahaan_usaha,
				perusahaan.butara AS perusahaan_butara,
				perusahaan.bselatan AS perusahaan_bselatan,
				perusahaan.btimur AS perusahaan_btimur,
				perusahaan.bbarat AS perusahaan_bbarat,
				perusahaan.modal AS perusahaan_modal,
				perusahaan.merk AS perusahaan_merk,
				perusahaan.jusaha_id AS perusahaan_jusaha_id
				FROM sppl 
				JOIN pemohon ON sppl.ID_PEMOHON = pemohon.id
				JOIN perusahaan ON sppl.ID_PERUSAHAAN = perusahaan.id
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
		if($_SESSION["IDHAK"] == 2){
			$sql .= " AND m_pemohon.pemohon_user_id = " . $_SESSION["USERID"];
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
				SELECT cek_list_sppl.ID_SYARAT,cek_list_sppl.ID_IJIN,cek_list_sppl.`STATUS`,cek_list_sppl.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_sppl RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_sppl.ID_SYARAT AND cek_list_sppl.ID_IJIN = '" . $sppl_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 9;
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
	function get_lk($sppl_id){
		$query	= $this->db->query("SELECT cek_list_sppl.ID_SYARAT,cek_list_sppl.ID_IJIN,cek_list_sppl.`STATUS`,cek_list_sppl.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_sppl RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_sppl.ID_SYARAT AND cek_list_sppl.ID_IJIN = '" . $sppl_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 9;");
		return $query;
	}
}