<?php
class M_perusahaan extends App_model{
	var $mainSql = "SELECT 
				id,
				npwp,
				nama,
				noakta,
				notaris,
				tglakta,
				bentuk_id,
				kualifikasi_id,
				alamat,
				rt,
				rw,
				propinsi_id,
				kabkota_id,
				kecamatan_id,
				desa_id,
				kodepos,
				telp,
				fax,
				stempat_id,
				sperusahaan_id,
				usaha,
				butara,
				bselatan,
				btimur,
				bbarat,
				modal,
				merk,
				jusaha_id,
				sdata
				FROM perusahaan 
			WHERE id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'perusahaan';
        $this->column_primary = 'id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					lower(npwp) LIKE '%".strtolower($searchText)."%' OR 
					lower(nama) LIKE '%".strtolower($searchText)."%' OR 
					lower(alamat) LIKE '%".strtolower($searchText)."%' 
					)
			";
		}
		if(@$limit_end){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function search($params){
		extract($params);
		
		$sql = $this->mainSql;
		
		if(@$npwp != ''){
			$sql .= " AND npwp LIKE '%".$npwp."%' ";
		}
		if(@$nama != ''){
			$sql .= " AND nama LIKE '%".$nama."%' ";
		}
		if(@$noakta != ''){
			$sql .= " AND noakta LIKE '%".$noakta."%' ";
		}
		if(@$notaris != ''){
			$sql .= " AND notaris LIKE '%".$notaris."%' ";
		}
		if(@$tglakta != ''){
			$sql .= " AND tglakta LIKE '%".$tglakta."%' ";
		}
		if(@$bentuk_id != ''){
			$sql .= " AND bentuk_id LIKE '%".$bentuk_id."%' ";
		}
		if(@$kualifikasi_id != ''){
			$sql .= " AND kualifikasi_id LIKE '%".$kualifikasi_id."%' ";
		}
		if(@$alamat != ''){
			$sql .= " AND alamat LIKE '%".$alamat."%' ";
		}
		if(@$rt != ''){
			$sql .= " AND rt LIKE '%".$rt."%' ";
		}
		if(@$rw != ''){
			$sql .= " AND rw LIKE '%".$rw."%' ";
		}
		if(@$propinsi_id != ''){
			$sql .= " AND propinsi_id LIKE '%".$propinsi_id."%' ";
		}
		if(@$kabkota_id != ''){
			$sql .= " AND kabkota_id LIKE '%".$kabkota_id."%' ";
		}
		if(@$kecamatan_id != ''){
			$sql .= " AND kecamatan_id LIKE '%".$kecamatan_id."%' ";
		}
		if(@$desa_id != ''){
			$sql .= " AND desa_id LIKE '%".$desa_id."%' ";
		}
		if(@$kodepos != ''){
			$sql .= " AND kodepos LIKE '%".$kodepos."%' ";
		}
		if(@$telp != ''){
			$sql .= " AND telp LIKE '%".$telp."%' ";
		}
		if(@$fax != ''){
			$sql .= " AND fax LIKE '%".$fax."%' ";
		}
		if(@$stempat_id != ''){
			$sql .= " AND stempat_id LIKE '%".$stempat_id."%' ";
		}
		if(@$sperusahaan_id != ''){
			$sql .= " AND sperusahaan_id LIKE '%".$sperusahaan_id."%' ";
		}
		if(@$usaha != ''){
			$sql .= " AND usaha LIKE '%".$usaha."%' ";
		}
		if(@$butara != ''){
			$sql .= " AND butara LIKE '%".$butara."%' ";
		}
		if(@$bselatan != ''){
			$sql .= " AND bselatan LIKE '%".$bselatan."%' ";
		}
		if(@$btimur != ''){
			$sql .= " AND btimur LIKE '%".$btimur."%' ";
		}
		if(@$bbarat != ''){
			$sql .= " AND bbarat LIKE '%".$bbarat."%' ";
		}
		if(@$modal != ''){
			$sql .= " AND modal LIKE '%".$modal."%' ";
		}
		if(@$merk != ''){
			$sql .= " AND merk LIKE '%".$merk."%' ";
		}
		if(@$jusaha_id != ''){
			$sql .= " AND jusaha_id LIKE '%".$jusaha_id."%' ";
		}
		if(@$sdata != ''){
			$sql .= " AND sdata LIKE '%".$sdata."%' ";
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