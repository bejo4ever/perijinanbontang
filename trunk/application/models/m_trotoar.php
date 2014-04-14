<?php
class M_trotoar extends App_Model{
	var $mainSql = "SELECT 
				ID_TROTOAR,
				ID_PEMOHON,
				JENIS_PERMOHONAN,
				NO_SK,
				NO_SK_LAMA,
				NAMA_PERUSAHAAN,
				trotoar.ALAMAT,
				PERUNTUKAN,
				ALAMAT_LOKASI,
				TGL_PERMOHONAN,
				TGL_BERLAKU,
				TGL_BERAKHIR,
				STATUS,
				STATUS_SURVEY,
				RETRIBUSI,
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
				FROM trotoar
				JOIN pemohon ON trotoar.ID_PEMOHON = pemohon.id
				JOIN perusahaan ON trotoar.ID_PERUSAHAAN = perusahaan.id
			WHERE ID_TROTOAR IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'trotoar';
        $this->column_primary = 'ID_TROTOAR';
        $this->column_order = 'ID_TROTOAR DESC';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NO_SK_LAMA LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					PERUNTUKAN LIKE '%".$searchText."%' OR 
					ALAMAT_LOKASI LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%' OR 
					TGL_BERLAKU LIKE '%".$searchText."%' OR 
					TGL_BERAKHIR LIKE '%".$searchText."%' OR 
					STATUS LIKE '%".$searchText."%' OR 
					STATUS_SURVEY LIKE '%".$searchText."%'
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
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
		}
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NO_SK_LAMA != ''){
			$sql .= " AND NO_SK_LAMA LIKE '%".$NO_SK_LAMA."%' ";
		}
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$ALAMAT != ''){
			$sql .= " AND ALAMAT LIKE '%".$ALAMAT."%' ";
		}
		if(@$PERUNTUKAN != ''){
			$sql .= " AND PERUNTUKAN LIKE '%".$PERUNTUKAN."%' ";
		}
		if(@$ALAMAT_LOKASI != ''){
			$sql .= " AND ALAMAT_LOKASI LIKE '%".$ALAMAT_LOKASI."%' ";
		}
		if(@$TGL_PERMOHONAN != ''){
			$sql .= " AND TGL_PERMOHONAN LIKE '%".$TGL_PERMOHONAN."%' ";
		}
		if(@$TGL_BERLAKU != ''){
			$sql .= " AND TGL_BERLAKU LIKE '%".$TGL_BERLAKU."%' ";
		}
		if(@$TGL_BERAKHIR != ''){
			$sql .= " AND TGL_BERAKHIR LIKE '%".$TGL_BERAKHIR."%' ";
		}
		if(@$STATUS != ''){
			$sql .= " AND STATUS LIKE '%".$STATUS."%' ";
		}
		if(@$STATUS_SURVEY != ''){
			$sql .= " AND STATUS_SURVEY LIKE '%".$STATUS_SURVEY."%' ";
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
				SELECT cek_list_trotoar.ID_SYARAT,cek_list_trotoar.ID_IJIN,cek_list_trotoar.`STATUS`,cek_list_trotoar.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_trotoar RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_trotoar.ID_SYARAT AND cek_list_trotoar.ID_IJIN = '" . $trotoar_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 13;
			";
		}else{
			$sql = "
				SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 13;
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getSyarat2(){
		$query = $this->db->query("SELECT master_syarat.ID_SYARAT,master_syarat.NAMA_SYARAT FROM `dt_syarat` JOIN master_syarat ON master_syarat.ID_SYARAT=dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 13;");
		return $query->result_array();
	}
	function get_lk($trotoar_id){
		$query	= $this->db->query("SELECT cek_list_trotoar.ID_SYARAT,cek_list_trotoar.ID_IJIN,cek_list_trotoar.`STATUS`,cek_list_trotoar.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_trotoar RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_trotoar.ID_SYARAT AND cek_list_trotoar.ID_IJIN = '" . $trotoar_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 13");
		return $query;
	}
}