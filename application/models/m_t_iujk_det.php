<?php
class M_t_iujk_det extends App_Model{
	var $mainSql = "SELECT 
				det_iujk_id,
				det_iujk_iujk_id,
				det_iujk_jenis,
				CASE WHEN det_iujk_jenis = 1 THEN 'BARU' 
					ELSE 'PERPANJANGAN'
					END AS det_iujk_jenis_nama,
				det_iujk_tanggal,
				det_iujk_nomorreg,
				det_iujk_rekomnomor,
				det_iujk_rekomtanggal,
				det_iujk_berlaku,
				det_iujk_kadaluarsa,
				det_iujk_pj1,
				det_iujk_pj2,
				det_iujk_pj3,
				det_iujk_pjteknis,
				det_iujk_pjtbu,
				det_iujk_surveylulus,
				iujk_perusahaan,
				iujk_alamat,
				iujk_direktur,
				iujk_golongan,
				iujk_kualifikasi,
				iujk_bidangusaha,
				iujk_rt,
				iujk_rw,
				iujk_kelurahan,
				iujk_kota,
				iujk_propinsi,
				iujk_telepon,
				iujk_kodepos,
				iujk_fax,
				iujk_npwp,
				det_iujk_proses,
				det_iujk_sk,
				CONCAT(5 * (DATEDIFF(NOW(), det_iujk_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_iujk_tanggal) + 
						1, 1),' Hari') as lamaproses,
				det_iujk_retribusi,
				det_iujk_permohonan_id AS permohonan_id,
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
				FROM t_iujk_det 
				JOIN t_iujk ON t_iujk_det.det_iujk_iujk_id = t_iujk.iujk_id
				JOIN pemohon ON t_iujk_det.det_iujk_pemohon_id = pemohon.id
				JOIN perusahaan ON t_iujk.iujk_perusahaan_id = perusahaan.id
			WHERE det_iujk_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujk_det';
        $this->column_primary = 'det_iujk_id';
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
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					iujk_perusahaan LIKE '%".$searchText."%' OR 
					det_iujk_sk LIKE '%".$searchText."%' 
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
		
		if(@$det_iujk_id != ''){
			$sql .= " AND det_iujk_id LIKE '%".$det_iujk_id."%' ";
		}
		if(@$det_iujk_iujk_id != ''){
			$sql .= " AND det_iujk_iujk_id LIKE '%".$det_iujk_iujk_id."%' ";
		}
		if(@$det_iujk_sk != ''){
			$sql .= " AND det_iujk_sk LIKE '%".$det_iujk_sk."%' ";
		}
		if(@$det_iujk_nomorreg != ''){
			$sql .= " AND det_iujk_nomorreg LIKE '%".$det_iujk_nomorreg."%' ";
		}
		if(@$det_iujk_surveylulus != ''){
			$sql .= " AND det_iujk_surveylulus LIKE '%".$det_iujk_surveylulus."%' ";
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
					iujk_cek_id,
					iujk_cek_syarat_id,
					iujk_cek_iujkdet_id,
					iujk_cek_iujk_id,
					iujk_cek_status,
					iujk_cek_keterangan,
					NAMA_SYARAT AS iujk_cek_syarat_nama
				FROM t_iujk_ceklist 
				LEFT JOIN master_syarat ON t_iujk_ceklist.iujk_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE iujk_cek_iujkdet_id = ".$iujk_det_id."
				AND iujk_cek_iujk_id = ".$iujk_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS iujk_cek_id,
					master_syarat.ID_SYARAT AS iujk_cek_syarat_id,
					NAMA_SYARAT AS iujk_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 5
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function getBidang($iujkdet_id = 0){
		$iujkdet_id = is_numeric($iujkdet_id) ? $iujkdet_id : 0;
		$sql = "SELECT bidangjasa.id, bidangjasa.bidang, iujkbidang.id AS iujkbidang_id, iujk_id, nama_proyek, tahun_proyek, nilai_proyek
			FROM bidangjasa
			LEFT JOIN iujkbidang ON iujkbidang.bidangjasa_id = bidangjasa.id AND iujkbidang.iujk_id = ".$iujkdet_id." ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getSubBidang($iujkdet_id = 0){
		$iujkdet_id = is_numeric($iujkdet_id) ? $iujkdet_id : 0;
		$sql = "SELECT bidangjasa_sub.id, bidangjasa_sub.bidang_jasa_id, bidangjasa_sub.nama, iujksubbidang.id As iujksubbidang_id 
				,iujk_id FROM bidangjasa_sub
				LEFT JOIN iujksubbidang ON iujksubbidang.bidangjasa_sub_id = bidangjasa_sub.id AND iujksubbidang.iujk_id = ".$iujkdet_id."
				ORDER BY bidang_jasa_id ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
}