<?php
class M_t_iujt_det extends App_Model{
	var $mainSql = "SELECT 
				det_iujt_id,
				det_iujt_iujt_id,
				det_iujt_jenis,
				CASE WHEN det_iujt_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_iujt_jenis_nama,
				det_iujt_tanggal,
				det_iujt_nomorreg,
				det_iujt_norekom,
				det_iujt_tglrekom,
				det_iujt_sk,
				det_iujt_berlaku,
				det_iujt_kadaluarsa,
				det_iujt_surveylulus,
				det_iujt_nopermohonan,
				det_iujt_cekpetugas,
				det_iujt_cektanggal,
				det_iujt_ceknip,
				det_iujt_catatan,
				det_iujt_proses,
				det_iujt_perihal,
				iujt_usaha,
				iujt_alamatusaha,
				iujt_statusperusahaan,
				iujt_penanggungjawab,
				iujt_statusperusahaan,
				CONCAT(5 * (DATEDIFF(NOW(), det_iujt_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_iujt_tanggal) + 
						1, 1),' Hari') as lamaproses,
				det_iujt_retribusi,
				det_iujt_permohonan_id AS permohonan_id,
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
				FROM t_iujt_det 
				JOIN t_iujt ON t_iujt_det.det_iujt_iujt_id = t_iujt.iujt_id
				JOIN pemohon ON t_iujt_det.det_iujt_pemohon_id = pemohon.id
				JOIN perusahaan ON t_iujt.iujt_perusahaan_id = perusahaan.id
			WHERE det_iujt_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujt_det';
        $this->column_primary = 'det_iujt_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID']." ";
		}
		if(@$searchText != ''){
			$sql .= "
				AND (
					pemohon_nama LIKE '%".$searchText."%' OR 
					pemohon_npwp LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					iujt_usaha LIKE '%".$searchText."%' OR 
					det_iujt_sk LIKE '%".$searchText."%' 
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
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID']." ";
		}
		
		if(@$det_iujt_id != ''){
			$sql .= " AND det_iujt_id LIKE '%".$det_iujt_id."%' ";
		}
		if(@$det_iujt_iujt_id != ''){
			$sql .= " AND det_iujt_iujt_id LIKE '%".$det_iujt_iujt_id."%' ";
		}
		if(@$det_iujt_sk != ''){
			$sql .= " AND det_iujt_sk LIKE '%".$det_iujt_sk."%' ";
		}
		if(@$det_iujt_nomorreg != ''){
			$sql .= " AND det_iujt_nomorreg LIKE '%".$det_iujt_nomorreg."%' ";
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
				SELECT 
					iujt_cek_id,
					iujt_cek_syarat_id,
					iujt_cek_iujtdet_id,
					iujt_cek_iujt_id,
					iujt_cek_status,
					iujt_cek_keterangan,
					NAMA_SYARAT AS iujt_cek_syarat_nama
				FROM t_iujt_ceklist 
				LEFT JOIN master_syarat ON t_iujt_ceklist.iujt_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE iujt_cek_iujtdet_id = ".$iujt_det_id."
				AND iujt_cek_iujt_id = ".$iujt_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS iujt_cek_id,
					master_syarat.ID_SYARAT AS iujt_cek_syarat_id,
					NAMA_SYARAT AS iujt_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 24
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}