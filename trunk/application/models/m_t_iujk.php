<?php
class M_t_iujk extends App_model{
	var $mainSql = "SELECT 
				iujk_id,
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
				iujk_npwp
				FROM t_iujk 
			WHERE iujk_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_iujk';
        $this->column_primary = 'iujk_id';
        $this->column_order = '';
		$this->column_unique = 'iujk_kodepos';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					iujk_perusahaan LIKE '%".$searchText."%' OR 
					iujk_alamat LIKE '%".$searchText."%' OR 
					iujk_direktur LIKE '%".$searchText."%' OR 
					iujk_golongan LIKE '%".$searchText."%' OR 
					iujk_kualifikasi LIKE '%".$searchText."%' OR 
					iujk_bidangusaha LIKE '%".$searchText."%' OR 
					iujk_rt LIKE '%".$searchText."%' OR 
					iujk_rw LIKE '%".$searchText."%' OR 
					iujk_kelurahan LIKE '%".$searchText."%' OR 
					iujk_kota LIKE '%".$searchText."%' OR 
					iujk_propinsi LIKE '%".$searchText."%' OR 
					iujk_telepon LIKE '%".$searchText."%' OR 
					iujk_kodepos LIKE '%".$searchText."%' OR 
					iujk_fax LIKE '%".$searchText."%' OR 
					iujk_npwp LIKE '%".$searchText."%'
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
		
		if(@$iujk_perusahaan != ''){
			$sql .= " AND iujk_perusahaan LIKE '%".$iujk_perusahaan."%' ";
		}
		if(@$iujk_alamat != ''){
			$sql .= " AND iujk_alamat LIKE '%".$iujk_alamat."%' ";
		}
		if(@$iujk_direktur != ''){
			$sql .= " AND iujk_direktur LIKE '%".$iujk_direktur."%' ";
		}
		if(@$iujk_golongan != ''){
			$sql .= " AND iujk_golongan LIKE '%".$iujk_golongan."%' ";
		}
		if(@$iujk_kualifikasi != ''){
			$sql .= " AND iujk_kualifikasi LIKE '%".$iujk_kualifikasi."%' ";
		}
		if(@$iujk_bidangusaha != ''){
			$sql .= " AND iujk_bidangusaha LIKE '%".$iujk_bidangusaha."%' ";
		}
		if(@$iujk_rt != ''){
			$sql .= " AND iujk_rt LIKE '%".$iujk_rt."%' ";
		}
		if(@$iujk_rw != ''){
			$sql .= " AND iujk_rw LIKE '%".$iujk_rw."%' ";
		}
		if(@$iujk_kelurahan != ''){
			$sql .= " AND iujk_kelurahan LIKE '%".$iujk_kelurahan."%' ";
		}
		if(@$iujk_kota != ''){
			$sql .= " AND iujk_kota LIKE '%".$iujk_kota."%' ";
		}
		if(@$iujk_propinsi != ''){
			$sql .= " AND iujk_propinsi LIKE '%".$iujk_propinsi."%' ";
		}
		if(@$iujk_telepon != ''){
			$sql .= " AND iujk_telepon LIKE '%".$iujk_telepon."%' ";
		}
		if(@$iujk_kodepos != ''){
			$sql .= " AND iujk_kodepos LIKE '%".$iujk_kodepos."%' ";
		}
		if(@$iujk_fax != ''){
			$sql .= " AND iujk_fax LIKE '%".$iujk_fax."%' ";
		}
		if(@$iujk_npwp != ''){
			$sql .= " AND iujk_npwp LIKE '%".$iujk_npwp."%' ";
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