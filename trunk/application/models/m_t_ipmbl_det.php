<?php
class M_t_ipmbl_det extends App_Model{
	var $mainSql = "SELECT 
				det_ipmbl_id,
				det_ipmbl_ipmbl_id,
				det_ipmbl_jenis,
				CASE WHEN det_ipmbl_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_ipmbl_jenis_nama,
				det_ipmbl_tanggal,
				det_ipmbl_nomoragenda,
				det_ipmbl_berkasmasuk,
				det_ipmbl_surveytanggal,
				det_ipmbl_surveylulus,
				det_ipmbl_status,
				CASE WHEN det_ipmbl_status = 1 THEN 'DISETUJUI'
					WHEN det_ipmbl_status = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
				END AS det_ipmbl_status_nama,
				det_ipmbl_surveypetugas,
				det_ipmbl_surveydinas,
				det_ipmbl_surveynip,
				det_ipmbl_surveypendapat,
				det_ipmbl_rekombl,
				det_ipmbl_rekomblhtanggal,
				det_ipmbl_rekomkel,
				det_ipmbl_rekomkeltanggal,
				det_ipmbl_rekomkec,
				det_ipmbl_rekomkectanggal,
				det_ipmbl_sk,
				det_ipmbl_kadaluarsa,
				det_ipmbl_berlaku,
				det_ipmbl_proses,
				ipmbl_luas,
				ipmbl_volume,
				ipmbl_keperluan,
				ipmbl_lokasi,
				ipmbl_kelurahan,
				ipmbl_kecamatan,
				ipmbl_usaha,
				ipmbl_alamatusaha,
				ipmbl_lokasi,
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
				CONCAT(5 * (DATEDIFF(NOW(), det_ipmbl_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_ipmbl_tanggal) + 
						1, 1),' Hari') as lamaproses
				FROM t_ipmbl_det 
				JOIN t_ipmbl ON t_ipmbl.ipmbl_id = t_ipmbl_det.det_ipmbl_ipmbl_id
				JOIN m_pemohon ON t_ipmbl_det.det_ipmbl_pemohon_id = m_pemohon.pemohon_id
			WHERE det_ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl_det';
        $this->column_primary = 'det_ipmbl_id';
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
					pemohon_npwp LIKE '%".$searchText."%' OR 
					ipmbl_usaha LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					det_ipmbl_sk LIKE '%".$searchText."%' 
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
		
		if(@$det_ipmbl_id != ''){
			$sql .= " AND det_ipmbl_id LIKE '%".$det_ipmbl_id."%' ";
		}
		if(@$det_ipmbl_ipmbl_id != ''){
			$sql .= " AND det_ipmbl_ipmbl_id LIKE '%".$det_ipmbl_ipmbl_id."%' ";
		}
		if(@$det_ipmbl_jenis != ''){
			$sql .= " AND det_ipmbl_jenis LIKE '%".$det_ipmbl_jenis."%' ";
		}
		if(@$det_ipmbl_tanggal != ''){
			$sql .= " AND det_ipmbl_tanggal LIKE '%".$det_ipmbl_tanggal."%' ";
		}
		if(@$det_ipmbl_nama != ''){
			$sql .= " AND det_ipmbl_nama LIKE '%".$det_ipmbl_nama."%' ";
		}
		if(@$det_ipmbl_alamat != ''){
			$sql .= " AND det_ipmbl_alamat LIKE '%".$det_ipmbl_alamat."%' ";
		}
		if(@$det_ipmbl_kelurahan != ''){
			$sql .= " AND det_ipmbl_kelurahan LIKE '%".$det_ipmbl_kelurahan."%' ";
		}
		if(@$det_ipmbl_kecamatan != ''){
			$sql .= " AND det_ipmbl_kecamatan LIKE '%".$det_ipmbl_kecamatan."%' ";
		}
		if(@$det_ipmbl_kota != ''){
			$sql .= " AND det_ipmbl_kota LIKE '%".$det_ipmbl_kota."%' ";
		}
		if(@$det_ipmbl_telp != ''){
			$sql .= " AND det_ipmbl_telp LIKE '%".$det_ipmbl_telp."%' ";
		}
		if(@$det_ipmbl_nomoragenda != ''){
			$sql .= " AND det_ipmbl_nomoragenda LIKE '%".$det_ipmbl_nomoragenda."%' ";
		}
		if(@$det_ipmbl_berkasmasuk != ''){
			$sql .= " AND det_ipmbl_berkasmasuk LIKE '%".$det_ipmbl_berkasmasuk."%' ";
		}
		if(@$det_ipmbl_surveytanggal != ''){
			$sql .= " AND det_ipmbl_surveytanggal LIKE '%".$det_ipmbl_surveytanggal."%' ";
		}
		if(@$det_ipmbl_surveylulus != ''){
			$sql .= " AND det_ipmbl_surveylulus LIKE '%".$det_ipmbl_surveylulus."%' ";
		}
		if(@$det_ipmbl_status != ''){
			$sql .= " AND det_ipmbl_status LIKE '%".$det_ipmbl_status."%' ";
		}
		if(@$det_ipmbl_surveypetugas != ''){
			$sql .= " AND det_ipmbl_surveypetugas LIKE '%".$det_ipmbl_surveypetugas."%' ";
		}
		if(@$det_ipmbl_surveydinas != ''){
			$sql .= " AND det_ipmbl_surveydinas LIKE '%".$det_ipmbl_surveydinas."%' ";
		}
		if(@$det_ipmbl_surveynip != ''){
			$sql .= " AND det_ipmbl_surveynip LIKE '%".$det_ipmbl_surveynip."%' ";
		}
		if(@$det_ipmbl_surveypendapat != ''){
			$sql .= " AND det_ipmbl_surveypendapat LIKE '%".$det_ipmbl_surveypendapat."%' ";
		}
		if(@$det_ipmbl_rekombl != ''){
			$sql .= " AND det_ipmbl_rekombl LIKE '%".$det_ipmbl_rekombl."%' ";
		}
		if(@$det_ipmbl_rekomblhtanggal != ''){
			$sql .= " AND det_ipmbl_rekomblhtanggal LIKE '%".$det_ipmbl_rekomblhtanggal."%' ";
		}
		if(@$det_ipmbl_rekomkel != ''){
			$sql .= " AND det_ipmbl_rekomkel LIKE '%".$det_ipmbl_rekomkel."%' ";
		}
		if(@$det_ipmbl_rekomkeltanggal != ''){
			$sql .= " AND det_ipmbl_rekomkeltanggal LIKE '%".$det_ipmbl_rekomkeltanggal."%' ";
		}
		if(@$det_ipmbl_rekomkec != ''){
			$sql .= " AND det_ipmbl_rekomkec LIKE '%".$det_ipmbl_rekomkec."%' ";
		}
		if(@$det_ipmbl_rekomkectanggal != ''){
			$sql .= " AND det_ipmbl_rekomkectanggal LIKE '%".$det_ipmbl_rekomkectanggal."%' ";
		}
		if(@$det_ipmbl_sk != ''){
			$sql .= " AND det_ipmbl_sk LIKE '%".$det_ipmbl_sk."%' ";
		}
		if(@$det_ipmbl_kadaluarsa != ''){
			$sql .= " AND det_ipmbl_kadaluarsa LIKE '%".$det_ipmbl_kadaluarsa."%' ";
		}
		if(@$det_ipmbl_berlaku != ''){
			$sql .= " AND det_ipmbl_berlaku LIKE '%".$det_ipmbl_berlaku."%' ";
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
					ipmbl_cek_id,
					ipmbl_cek_syarat_id,
					ipmbl_cek_ipmbldet_id,
					ipmbl_cek_ipmbl_id,
					ipmbl_cek_status,
					ipmbl_cek_keterangan,
					NAMA_SYARAT AS ipmbl_cek_syarat_nama
				FROM t_ipmbl_ceklist 
				LEFT JOIN master_syarat ON t_ipmbl_ceklist.ipmbl_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE ipmbl_cek_ipmbldet_id = ".$ipmbl_det_id."
				AND ipmbl_cek_ipmbl_id = ".$ipmbl_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS ipmbl_cek_id,
					master_syarat.ID_SYARAT AS ipmbl_cek_syarat_id,
					NAMA_SYARAT AS ipmbl_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 2
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getRiwayat($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT 
					*
				FROM t_ipmbl_dok 
				WHERE dok_ipmbl_ipmbldet_id = ".$ipmbl_det_id."
				AND dok_ipmbl_ipmbl_id = ".$ipmbl_id."
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}