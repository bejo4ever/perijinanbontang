<?php
class M_t_ipmbl extends App_model{
	var $mainSql = "SELECT 
				ipmbl_id,
				ipmbl_jenis,
				ipmbl_tanggal,
				ipmbl_luas,
				ipmbl_volume,
				ipmbl_keperluan,
				ipmbl_alamat,
				ipmbl_kelurahan,
				ipmbl_kecamatan,
				ipmbl_nomoragenda,
				ipmbl_status,
				ipmbl_tanggalsurvey,
				ipmbl_rekomblh,
				ipmbl_rekomblh_tanggal,
				ipmbl_rekomkec,
				ipmbl_rekomkec_tanggal,
				ipmbl_rekomkel,
				ipmbl_rekomkel_tanggal,
				ipmbl_berlaku,
				ipmbl_kadaluarsa,
				ipmbl_nomorijin,
				ipmbl_nomorurut
				FROM t_ipmbl 
			WHERE ipmbl_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_ipmbl';
        $this->column_primary = 'ipmbl_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ipmbl_jenis LIKE '%".$searchText."%' OR 
					ipmbl_tanggal LIKE '%".$searchText."%' OR 
					ipmbl_luas LIKE '%".$searchText."%' OR 
					ipmbl_volume LIKE '%".$searchText."%' OR 
					ipmbl_keperluan LIKE '%".$searchText."%' OR 
					ipmbl_alamat LIKE '%".$searchText."%' OR 
					ipmbl_kelurahan LIKE '%".$searchText."%' OR 
					ipmbl_kecamatan LIKE '%".$searchText."%' OR 
					ipmbl_nomoragenda LIKE '%".$searchText."%' OR 
					ipmbl_status LIKE '%".$searchText."%' OR 
					ipmbl_tanggalsurvey LIKE '%".$searchText."%' OR 
					ipmbl_rekomblh LIKE '%".$searchText."%' OR 
					ipmbl_rekomblh_tanggal LIKE '%".$searchText."%' OR 
					ipmbl_rekomkec LIKE '%".$searchText."%' OR 
					ipmbl_rekomkec_tanggal LIKE '%".$searchText."%' OR 
					ipmbl_rekomkel LIKE '%".$searchText."%' OR 
					ipmbl_rekomkel_tanggal LIKE '%".$searchText."%' OR 
					ipmbl_berlaku LIKE '%".$searchText."%' OR 
					ipmbl_kadaluarsa LIKE '%".$searchText."%' OR 
					ipmbl_nomorijin LIKE '%".$searchText."%' OR 
					ipmbl_nomorurut LIKE '%".$searchText."%'
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
		
		if(@$ipmbl_jenis != ''){
			$sql .= " AND ipmbl_jenis LIKE '%".$ipmbl_jenis."%' ";
		}
		if(@$ipmbl_tanggal != ''){
			$sql .= " AND ipmbl_tanggal LIKE '%".$ipmbl_tanggal."%' ";
		}
		if(@$ipmbl_luas != ''){
			$sql .= " AND ipmbl_luas LIKE '%".$ipmbl_luas."%' ";
		}
		if(@$ipmbl_volume != ''){
			$sql .= " AND ipmbl_volume LIKE '%".$ipmbl_volume."%' ";
		}
		if(@$ipmbl_keperluan != ''){
			$sql .= " AND ipmbl_keperluan LIKE '%".$ipmbl_keperluan."%' ";
		}
		if(@$ipmbl_alamat != ''){
			$sql .= " AND ipmbl_alamat LIKE '%".$ipmbl_alamat."%' ";
		}
		if(@$ipmbl_kelurahan != ''){
			$sql .= " AND ipmbl_kelurahan LIKE '%".$ipmbl_kelurahan."%' ";
		}
		if(@$ipmbl_kecamatan != ''){
			$sql .= " AND ipmbl_kecamatan LIKE '%".$ipmbl_kecamatan."%' ";
		}
		if(@$ipmbl_nomoragenda != ''){
			$sql .= " AND ipmbl_nomoragenda LIKE '%".$ipmbl_nomoragenda."%' ";
		}
		if(@$ipmbl_status != ''){
			$sql .= " AND ipmbl_status LIKE '%".$ipmbl_status."%' ";
		}
		if(@$ipmbl_tanggalsurvey != ''){
			$sql .= " AND ipmbl_tanggalsurvey LIKE '%".$ipmbl_tanggalsurvey."%' ";
		}
		if(@$ipmbl_rekomblh != ''){
			$sql .= " AND ipmbl_rekomblh LIKE '%".$ipmbl_rekomblh."%' ";
		}
		if(@$ipmbl_rekomblh_tanggal != ''){
			$sql .= " AND ipmbl_rekomblh_tanggal LIKE '%".$ipmbl_rekomblh_tanggal."%' ";
		}
		if(@$ipmbl_rekomkec != ''){
			$sql .= " AND ipmbl_rekomkec LIKE '%".$ipmbl_rekomkec."%' ";
		}
		if(@$ipmbl_rekomkec_tanggal != ''){
			$sql .= " AND ipmbl_rekomkec_tanggal LIKE '%".$ipmbl_rekomkec_tanggal."%' ";
		}
		if(@$ipmbl_rekomkel != ''){
			$sql .= " AND ipmbl_rekomkel LIKE '%".$ipmbl_rekomkel."%' ";
		}
		if(@$ipmbl_rekomkel_tanggal != ''){
			$sql .= " AND ipmbl_rekomkel_tanggal LIKE '%".$ipmbl_rekomkel_tanggal."%' ";
		}
		if(@$ipmbl_berlaku != ''){
			$sql .= " AND ipmbl_berlaku LIKE '%".$ipmbl_berlaku."%' ";
		}
		if(@$ipmbl_kadaluarsa != ''){
			$sql .= " AND ipmbl_kadaluarsa LIKE '%".$ipmbl_kadaluarsa."%' ";
		}
		if(@$ipmbl_nomorijin != ''){
			$sql .= " AND ipmbl_nomorijin LIKE '%".$ipmbl_nomorijin."%' ";
		}
		if(@$ipmbl_nomorurut != ''){
			$sql .= " AND ipmbl_nomorurut LIKE '%".$ipmbl_nomorurut."%' ";
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