<?php
class M_t_iujt_det extends App_model{
	var $mainSql = "SELECT 
				det_iujt_id,
				det_iujt_iujt_id,
				det_iujt_jenis,
				det_iujt_nama,
				det_iujt_npwp,
				det_iujt_alamat,
				det_iujt_sk,
				det_iujt_berlaku,
				det_iujt_kadaluarsa,
				det_iujt_surveylulus,
				det_iujt_tanggal,
				det_iujt_nopermohonan,
				det_iujt_cekpetugas,
				det_iujt_cektanggal,
				det_iujt_ceknip,
				det_iujt_catatan
				FROM t_iujt_det 
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
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_iujt_iujt_id LIKE '%".$searchText."%' OR 
					det_iujt_jenis LIKE '%".$searchText."%' OR 
					det_iujt_nama LIKE '%".$searchText."%' OR 
					det_iujt_npwp LIKE '%".$searchText."%' OR 
					det_iujt_alamat LIKE '%".$searchText."%' OR 
					det_iujt_sk LIKE '%".$searchText."%' OR 
					det_iujt_berlaku LIKE '%".$searchText."%' OR 
					det_iujt_kadaluarsa LIKE '%".$searchText."%' OR 
					det_iujt_surveylulus LIKE '%".$searchText."%' OR 
					det_iujt_tanggal LIKE '%".$searchText."%' OR 
					det_iujt_nopermohonan LIKE '%".$searchText."%' OR 
					det_iujt_cekpetugas LIKE '%".$searchText."%' OR 
					det_iujt_cektanggal LIKE '%".$searchText."%' OR 
					det_iujt_ceknip LIKE '%".$searchText."%' OR 
					det_iujt_catatan LIKE '%".$searchText."%'
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
		
		if(@$det_iujt_iujt_id != ''){
			$sql .= " AND det_iujt_iujt_id LIKE '%".$det_iujt_iujt_id."%' ";
		}
		if(@$det_iujt_jenis != ''){
			$sql .= " AND det_iujt_jenis LIKE '%".$det_iujt_jenis."%' ";
		}
		if(@$det_iujt_nama != ''){
			$sql .= " AND det_iujt_nama LIKE '%".$det_iujt_nama."%' ";
		}
		if(@$det_iujt_npwp != ''){
			$sql .= " AND det_iujt_npwp LIKE '%".$det_iujt_npwp."%' ";
		}
		if(@$det_iujt_alamat != ''){
			$sql .= " AND det_iujt_alamat LIKE '%".$det_iujt_alamat."%' ";
		}
		if(@$det_iujt_sk != ''){
			$sql .= " AND det_iujt_sk LIKE '%".$det_iujt_sk."%' ";
		}
		if(@$det_iujt_berlaku != ''){
			$sql .= " AND det_iujt_berlaku LIKE '%".$det_iujt_berlaku."%' ";
		}
		if(@$det_iujt_kadaluarsa != ''){
			$sql .= " AND det_iujt_kadaluarsa LIKE '%".$det_iujt_kadaluarsa."%' ";
		}
		if(@$det_iujt_surveylulus != ''){
			$sql .= " AND det_iujt_surveylulus LIKE '%".$det_iujt_surveylulus."%' ";
		}
		if(@$det_iujt_tanggal != ''){
			$sql .= " AND det_iujt_tanggal LIKE '%".$det_iujt_tanggal."%' ";
		}
		if(@$det_iujt_nopermohonan != ''){
			$sql .= " AND det_iujt_nopermohonan LIKE '%".$det_iujt_nopermohonan."%' ";
		}
		if(@$det_iujt_cekpetugas != ''){
			$sql .= " AND det_iujt_cekpetugas LIKE '%".$det_iujt_cekpetugas."%' ";
		}
		if(@$det_iujt_cektanggal != ''){
			$sql .= " AND det_iujt_cektanggal LIKE '%".$det_iujt_cektanggal."%' ";
		}
		if(@$det_iujt_ceknip != ''){
			$sql .= " AND det_iujt_ceknip LIKE '%".$det_iujt_ceknip."%' ";
		}
		if(@$det_iujt_catatan != ''){
			$sql .= " AND det_iujt_catatan LIKE '%".$det_iujt_catatan."%' ";
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
				WHERE ID_IJIN = 1
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}