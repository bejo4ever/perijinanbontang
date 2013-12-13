<?php
class M_t_iujk extends App_model{
	var $mainSql = "SELECT 
				iujk_id,
				iujk_jenis,
				iujk_tanggal,
				iujk_status,
				iujk_noformulir,
				iujk_nourutformulir,
				iujk_lampiran,
				iujk_rekom,
				iujk_rekomurut,
				iujk_rekomtanggal,
				iujk_perusahaan,
				iujk_alamat,
				iujk_direktur,
				iujk_golongan,
				iujk_kualifikasi,
				iujk_bidangusaha,
				iujk_kelurahan,
				iujk_rt,
				iujk_rw,
				iujk_kota,
				iujk_propinsi,
				iujk_telepon,
				iujk_kodepos,
				iujk_fax,
				iujk_npwp,
				iujk_pjtbu,
				iujk_pjteknis,
				iujk_pj1,
				iujk_pj2,
				iujk_pj3,
				iujk_berlaku,
				iujk_kadaluarsa
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
					iujk_jenis LIKE '%".$searchText."%' OR 
					iujk_tanggal LIKE '%".$searchText."%' OR 
					iujk_status LIKE '%".$searchText."%' OR 
					iujk_noformulir LIKE '%".$searchText."%' OR 
					iujk_nourutformulir LIKE '%".$searchText."%' OR 
					iujk_lampiran LIKE '%".$searchText."%' OR 
					iujk_rekom LIKE '%".$searchText."%' OR 
					iujk_rekomurut LIKE '%".$searchText."%' OR 
					iujk_rekomtanggal LIKE '%".$searchText."%' OR 
					iujk_perusahaan LIKE '%".$searchText."%' OR 
					iujk_alamat LIKE '%".$searchText."%' OR 
					iujk_direktur LIKE '%".$searchText."%' OR 
					iujk_golongan LIKE '%".$searchText."%' OR 
					iujk_kualifikasi LIKE '%".$searchText."%' OR 
					iujk_bidangusaha LIKE '%".$searchText."%' OR 
					iujk_kelurahan LIKE '%".$searchText."%' OR 
					iujk_rt LIKE '%".$searchText."%' OR 
					iujk_rw LIKE '%".$searchText."%' OR 
					iujk_kota LIKE '%".$searchText."%' OR 
					iujk_propinsi LIKE '%".$searchText."%' OR 
					iujk_telepon LIKE '%".$searchText."%' OR 
					iujk_kodepos LIKE '%".$searchText."%' OR 
					iujk_fax LIKE '%".$searchText."%' OR 
					iujk_npwp LIKE '%".$searchText."%' OR 
					iujk_pjtbu LIKE '%".$searchText."%' OR 
					iujk_pjteknis LIKE '%".$searchText."%' OR 
					iujk_pj1 LIKE '%".$searchText."%' OR 
					iujk_pj2 LIKE '%".$searchText."%' OR 
					iujk_pj3 LIKE '%".$searchText."%' OR 
					iujk_berlaku LIKE '%".$searchText."%' OR 
					iujk_kadaluarsa LIKE '%".$searchText."%'
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
		
		if(@$iujk_jenis != ''){
			$sql .= " AND iujk_jenis LIKE '%".$iujk_jenis."%' ";
		}
		if(@$iujk_tanggal != ''){
			$sql .= " AND iujk_tanggal LIKE '%".$iujk_tanggal."%' ";
		}
		if(@$iujk_status != ''){
			$sql .= " AND iujk_status LIKE '%".$iujk_status."%' ";
		}
		if(@$iujk_noformulir != ''){
			$sql .= " AND iujk_noformulir LIKE '%".$iujk_noformulir."%' ";
		}
		if(@$iujk_nourutformulir != ''){
			$sql .= " AND iujk_nourutformulir LIKE '%".$iujk_nourutformulir."%' ";
		}
		if(@$iujk_lampiran != ''){
			$sql .= " AND iujk_lampiran LIKE '%".$iujk_lampiran."%' ";
		}
		if(@$iujk_rekom != ''){
			$sql .= " AND iujk_rekom LIKE '%".$iujk_rekom."%' ";
		}
		if(@$iujk_rekomurut != ''){
			$sql .= " AND iujk_rekomurut LIKE '%".$iujk_rekomurut."%' ";
		}
		if(@$iujk_rekomtanggal != ''){
			$sql .= " AND iujk_rekomtanggal LIKE '%".$iujk_rekomtanggal."%' ";
		}
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
		if(@$iujk_kelurahan != ''){
			$sql .= " AND iujk_kelurahan LIKE '%".$iujk_kelurahan."%' ";
		}
		if(@$iujk_rt != ''){
			$sql .= " AND iujk_rt LIKE '%".$iujk_rt."%' ";
		}
		if(@$iujk_rw != ''){
			$sql .= " AND iujk_rw LIKE '%".$iujk_rw."%' ";
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
		if(@$iujk_pjtbu != ''){
			$sql .= " AND iujk_pjtbu LIKE '%".$iujk_pjtbu."%' ";
		}
		if(@$iujk_pjteknis != ''){
			$sql .= " AND iujk_pjteknis LIKE '%".$iujk_pjteknis."%' ";
		}
		if(@$iujk_pj1 != ''){
			$sql .= " AND iujk_pj1 LIKE '%".$iujk_pj1."%' ";
		}
		if(@$iujk_pj2 != ''){
			$sql .= " AND iujk_pj2 LIKE '%".$iujk_pj2."%' ";
		}
		if(@$iujk_pj3 != ''){
			$sql .= " AND iujk_pj3 LIKE '%".$iujk_pj3."%' ";
		}
		if(@$iujk_berlaku != ''){
			$sql .= " AND iujk_berlaku LIKE '%".$iujk_berlaku."%' ";
		}
		if(@$iujk_kadaluarsa != ''){
			$sql .= " AND iujk_kadaluarsa LIKE '%".$iujk_kadaluarsa."%' ";
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