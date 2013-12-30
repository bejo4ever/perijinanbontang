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
				det_sipd_bap,
				det_sipd_keputusan,
				det_sipd_baptanggal,
				det_sipd_sip,
				det_sipd_nrop,
				det_sipd_str,
				det_sipd_kompetensi
				FROM t_sipd_det 
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
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_sipd_sipd_id LIKE '%".$searchText."%' OR 
					det_sipd_jenis LIKE '%".$searchText."%' OR 
					det_sipd_tanggal LIKE '%".$searchText."%' OR 
					det_sipd_pemohon_id LIKE '%".$searchText."%' OR 
					det_sipd_nomorreg LIKE '%".$searchText."%' OR 
					det_sipd_proses LIKE '%".$searchText."%' OR 
					det_sipd_sk LIKE '%".$searchText."%' OR 
					det_sipd_skurut LIKE '%".$searchText."%' OR 
					det_sipd_berlaku LIKE '%".$searchText."%' OR 
					det_sipd_kadaluarsa LIKE '%".$searchText."%' OR 
					det_sipd_terima LIKE '%".$searchText."%' OR 
					det_sipd_terimatanggal LIKE '%".$searchText."%' OR 
					det_sipd_kelengkapan LIKE '%".$searchText."%' OR 
					det_sipd_bap LIKE '%".$searchText."%' OR 
					det_sipd_keputusan LIKE '%".$searchText."%' OR 
					det_sipd_baptanggal LIKE '%".$searchText."%' OR 
					det_sipd_sip LIKE '%".$searchText."%' OR 
					det_sipd_nrop LIKE '%".$searchText."%' OR 
					det_sipd_str LIKE '%".$searchText."%' OR 
					det_sipd_kompetensi LIKE '%".$searchText."%'
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
	
}