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
				pemohon_tahunlulus,
				det_iujk_retribusi
				FROM t_iujk_det 
				JOIN t_iujk ON t_iujk_det.det_iujk_iujk_id = t_iujk.iujk_id
				JOIN m_pemohon ON t_iujk_det.det_iujk_pemohon_id = m_pemohon.pemohon_id
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
		if(@$det_iujk_jenis != ''){
			$sql .= " AND det_iujk_jenis LIKE '%".$det_iujk_jenis."%' ";
		}
		if(@$det_iujk_tanggal != ''){
			$sql .= " AND det_iujk_tanggal LIKE '%".$det_iujk_tanggal."%' ";
		}
		if(@$det_iujk_nama != ''){
			$sql .= " AND det_iujk_nama LIKE '%".$det_iujk_nama."%' ";
		}
		if(@$det_iujk_nomorreg != ''){
			$sql .= " AND det_iujk_nomorreg LIKE '%".$det_iujk_nomorreg."%' ";
		}
		if(@$det_iujk_rekomnomor != ''){
			$sql .= " AND det_iujk_rekomnomor LIKE '%".$det_iujk_rekomnomor."%' ";
		}
		if(@$det_iujk_rekomtanggal != ''){
			$sql .= " AND det_iujk_rekomtanggal LIKE '%".$det_iujk_rekomtanggal."%' ";
		}
		if(@$det_iujk_berlaku != ''){
			$sql .= " AND det_iujk_berlaku LIKE '%".$det_iujk_berlaku."%' ";
		}
		if(@$det_iujk_kadaluarsa != ''){
			$sql .= " AND det_iujk_kadaluarsa LIKE '%".$det_iujk_kadaluarsa."%' ";
		}
		if(@$det_iujk_pj1 != ''){
			$sql .= " AND det_iujk_pj1 LIKE '%".$det_iujk_pj1."%' ";
		}
		if(@$det_iujk_pj2 != ''){
			$sql .= " AND det_iujk_pj2 LIKE '%".$det_iujk_pj2."%' ";
		}
		if(@$det_iujk_pj3 != ''){
			$sql .= " AND det_iujk_pj3 LIKE '%".$det_iujk_pj3."%' ";
		}
		if(@$det_iujk_pjteknis != ''){
			$sql .= " AND det_iujk_pjteknis LIKE '%".$det_iujk_pjteknis."%' ";
		}
		if(@$det_iujk_pjtbu != ''){
			$sql .= " AND det_iujk_pjtbu LIKE '%".$det_iujk_pjtbu."%' ";
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
				WHERE ID_IJIN = 4
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}