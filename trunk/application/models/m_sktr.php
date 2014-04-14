<?php
class M_sktr extends App_Model{
	var $mainSql = "SELECT 
						ID_SKTR,
						ID_PEMOHON,
						JENIS_PERMOHONAN,
						NO_SK,
						HAK_MILIK,
						NAMA_PEMILIK,
						NO_SURAT_TANAH,
						BATAS_KIRI,
						BATAS_KANAN,
						BATAS_DEPAN,
						BATAS_BELAKANG,
						TGL_PERMOHONAN,
						STATUS,
						TINGGI_BANGUNAN,
						LUAS_PERSIL,
						LUAS_BANGUNAN,
						FUNGSI,
						ALAMAT_BANGUNAN,
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
						perusahaan.jusaha_id AS perusahaan_jusaha_id,
						TGL_BERAKHIR,
						STATUS_SURVEY,
						RETRIBUSI,
						CONCAT(5 * (DATEDIFF(NOW(), TGL_PERMOHONAN) DIV 7) + 
						MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(TGL_PERMOHONAN) + 
						1, 1),' Hari') as lama_proses
						FROM sktr
						JOIN pemohon ON sktr.ID_PEMOHON = pemohon.id
						JOIN perusahaan ON sktr.ID_PERUSAHAAN = perusahaan.id
					WHERE ID_SKTR IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'sktr';
        $this->column_primary = 'ID_SKTR';
        $this->column_order = 'ID_SKTR ASC';
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
				SELECT cek_list_sktr.ID_SYARAT,cek_list_sktr.ID_IJIN,cek_list_sktr.`STATUS`,cek_list_sktr.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_sktr RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_sktr.ID_SYARAT AND cek_list_sktr.ID_IJIN = '" . $sktr_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 10;
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
	function get_lk($sktr_id){
		$query	= $this->db->query("SELECT cek_list_sktr.ID_SYARAT,cek_list_sktr.ID_IJIN,cek_list_sktr.`STATUS`,cek_list_sktr.KETERANGAN,master_syarat.NAMA_SYARAT FROM cek_list_sktr RIGHT JOIN dt_syarat ON dt_syarat.ID_SYARAT = cek_list_sktr.ID_SYARAT AND cek_list_sktr.ID_IJIN = '" . $sktr_id . "' JOIN master_syarat ON master_syarat.ID_SYARAT = dt_syarat.ID_SYARAT WHERE dt_syarat.ID_IJIN = 10;");
		return $query;
	}
}