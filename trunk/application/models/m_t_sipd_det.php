<?php
class M_t_sipd_det extends App_model{
	var $mainSql = "SELECT 
				det_sipd_id,
				det_sipd_sipd_id,
				det_sipd_jenis,
				det_sipd_tanggal,
				det_sipd_pemohon_id,
				det_sipd_nomorreg,
				det_sipd_proses,
				det_sipd_sk,
				det_sipd_skurut,
				det_sipd_berlaku,
				det_sipd_kadaluarsa,
				det_sipd_terima,
				det_sipd_terimatanggal,
				det_sipd_kelengkapan,
				CASE WHEN det_sipd_kelengkapan = 1 THEN 'LENGKAP'
					ELSE 'TIDAK LENGKAP'
					END AS det_sipd_kelengkapan_nama,
				det_sipd_bap,
				det_sipd_keputusan,
				CASE WHEN det_sipd_keputusan = 1 THEN 'DISETUJUI'
					WHEN det_sipd_keputusan = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
					END AS det_sipd_keputusan_nama,
				det_sipd_baptanggal,
				det_sipd_sip,
				det_sipd_nrop,
				det_sipd_str,
				det_sipd_kompetensi,
				CONCAT(5 * (DATEDIFF(NOW(), det_sipd_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_sipd_tanggal) + 
						1, 1),' Hari') as lamaproses,
				sipd_nama,
				sipd_alamat,
				sipd_telp,
				sipd_urutan,
				sipd_jenisdokter,
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
				pemohon_pendidikan,
				pemohon_tahunlulus
				FROM t_sipd_det 
				JOIN t_sipd ON t_sipd.sipd_id = t_sipd_det.det_sipd_sipd_id
				JOIN m_pemohon ON t_sipd_det.det_sipd_pemohon_id = m_pemohon.pemohon_id
			WHERE det_sipd_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_sipd_det';
        $this->column_primary = 'det_sipd_id';
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
					det_sipd_sk LIKE '%".$searchText."%' OR 
					sipd_nama LIKE '%".$searchText."%' 
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
		if(@$det_sipd_id != ''){
			$sql .= " AND det_sipd_id = ".$det_sipd_id." ";
		}
		if(@$det_sipd_sipd_id != ''){
			$sql .= " AND det_sipd_sipd_id LIKE '%".$det_sipd_sipd_id."%' ";
		}
		if(@$det_sipd_jenis != ''){
			$sql .= " AND det_sipd_jenis LIKE '%".$det_sipd_jenis."%' ";
		}
		if(@$det_sipd_tanggal != ''){
			$sql .= " AND det_sipd_tanggal LIKE '%".$det_sipd_tanggal."%' ";
		}
		if(@$det_sipd_pemohon_id != ''){
			$sql .= " AND det_sipd_pemohon_id LIKE '%".$det_sipd_pemohon_id."%' ";
		}
		if(@$det_sipd_nomorreg != ''){
			$sql .= " AND det_sipd_nomorreg LIKE '%".$det_sipd_nomorreg."%' ";
		}
		if(@$det_sipd_proses != ''){
			$sql .= " AND det_sipd_proses LIKE '%".$det_sipd_proses."%' ";
		}
		if(@$det_sipd_sk != ''){
			$sql .= " AND det_sipd_sk LIKE '%".$det_sipd_sk."%' ";
		}
		if(@$det_sipd_skurut != ''){
			$sql .= " AND det_sipd_skurut LIKE '%".$det_sipd_skurut."%' ";
		}
		if(@$det_sipd_berlaku != ''){
			$sql .= " AND det_sipd_berlaku LIKE '%".$det_sipd_berlaku."%' ";
		}
		if(@$det_sipd_kadaluarsa != ''){
			$sql .= " AND det_sipd_kadaluarsa LIKE '%".$det_sipd_kadaluarsa."%' ";
		}
		if(@$det_sipd_terima != ''){
			$sql .= " AND det_sipd_terima LIKE '%".$det_sipd_terima."%' ";
		}
		if(@$det_sipd_terimatanggal != ''){
			$sql .= " AND det_sipd_terimatanggal LIKE '%".$det_sipd_terimatanggal."%' ";
		}
		if(@$det_sipd_kelengkapan != ''){
			$sql .= " AND det_sipd_kelengkapan LIKE '%".$det_sipd_kelengkapan."%' ";
		}
		if(@$det_sipd_bap != ''){
			$sql .= " AND det_sipd_bap LIKE '%".$det_sipd_bap."%' ";
		}
		if(@$det_sipd_keputusan != ''){
			$sql .= " AND det_sipd_keputusan LIKE '%".$det_sipd_keputusan."%' ";
		}
		if(@$det_sipd_baptanggal != ''){
			$sql .= " AND det_sipd_baptanggal LIKE '%".$det_sipd_baptanggal."%' ";
		}
		if(@$det_sipd_sip != ''){
			$sql .= " AND det_sipd_sip LIKE '%".$det_sipd_sip."%' ";
		}
		if(@$det_sipd_nrop != ''){
			$sql .= " AND det_sipd_nrop LIKE '%".$det_sipd_nrop."%' ";
		}
		if(@$det_sipd_str != ''){
			$sql .= " AND det_sipd_str LIKE '%".$det_sipd_str."%' ";
		}
		if(@$det_sipd_kompetensi != ''){
			$sql .= " AND det_sipd_kompetensi LIKE '%".$det_sipd_kompetensi."%' ";
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
					sipd_cek_id,
					sipd_cek_syarat_id,
					sipd_cek_sipddet_id,
					sipd_cek_sipd_id,
					sipd_cek_status,
					sipd_cek_keterangan,
					NAMA_SYARAT AS sipd_cek_syarat_nama
				FROM t_sipd_ceklist 
				LEFT JOIN master_syarat ON t_sipd_ceklist.sipd_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE sipd_cek_sipddet_id = ".$sipd_det_id."
				AND sipd_cek_sipd_id = ".$sipd_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS sipd_cek_id,
					master_syarat.ID_SYARAT AS sipd_cek_syarat_id,
					NAMA_SYARAT AS sipd_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 1
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}