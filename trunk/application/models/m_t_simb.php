<?php
class M_t_simb extends App_model{
	var $mainSql = "SELECT 
				simb_id,
				simb_per_npwp,
				simb_per_nama,
				simb_per_akta,
				simb_per_bentuk,
				simb_per_alamat,
				simb_per_kel,
				simb_per_kec,
				simb_per_kota,
				simb_per_telp,
				simb_jenis,
				simb_status,
				simb_jenisusaha,
				simb_panjang,
				simb_lebar,
				simb_alamat,
				simb_kel,
				simb_kec,
				simb_bentuk,
				simb_lokasi,
				simb_gangguan,
				simb_batasutara,
				simb_batastimur,
				simb_batasselatan,
				simb_batasbarat
				FROM t_simb 
			WHERE simb_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_simb';
        $this->column_primary = 'simb_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					simb_per_npwp LIKE '%".$searchText."%' OR 
					simb_per_nama LIKE '%".$searchText."%' OR 
					simb_per_akta LIKE '%".$searchText."%' OR 
					simb_per_bentuk LIKE '%".$searchText."%' OR 
					simb_per_alamat LIKE '%".$searchText."%' OR 
					simb_per_kel LIKE '%".$searchText."%' OR 
					simb_per_kec LIKE '%".$searchText."%' OR 
					simb_per_kota LIKE '%".$searchText."%' OR 
					simb_per_telp LIKE '%".$searchText."%' OR 
					simb_jenis LIKE '%".$searchText."%' OR 
					simb_status LIKE '%".$searchText."%' OR 
					simb_jenisusaha LIKE '%".$searchText."%' OR 
					simb_panjang LIKE '%".$searchText."%' OR 
					simb_lebar LIKE '%".$searchText."%' OR 
					simb_alamat LIKE '%".$searchText."%' OR 
					simb_kel LIKE '%".$searchText."%' OR 
					simb_kec LIKE '%".$searchText."%' OR 
					simb_bentuk LIKE '%".$searchText."%' OR 
					simb_lokasi LIKE '%".$searchText."%' OR 
					simb_gangguan LIKE '%".$searchText."%' OR 
					simb_batasutara LIKE '%".$searchText."%' OR 
					simb_batastimur LIKE '%".$searchText."%' OR 
					simb_batasselatan LIKE '%".$searchText."%' OR 
					simb_batasbarat LIKE '%".$searchText."%'
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
		
		if(@$simb_per_npwp != ''){
			$sql .= " AND simb_per_npwp LIKE '%".$simb_per_npwp."%' ";
		}
		if(@$simb_per_nama != ''){
			$sql .= " AND simb_per_nama LIKE '%".$simb_per_nama."%' ";
		}
		if(@$simb_per_akta != ''){
			$sql .= " AND simb_per_akta LIKE '%".$simb_per_akta."%' ";
		}
		if(@$simb_per_bentuk != ''){
			$sql .= " AND simb_per_bentuk LIKE '%".$simb_per_bentuk."%' ";
		}
		if(@$simb_per_alamat != ''){
			$sql .= " AND simb_per_alamat LIKE '%".$simb_per_alamat."%' ";
		}
		if(@$simb_per_kel != ''){
			$sql .= " AND simb_per_kel LIKE '%".$simb_per_kel."%' ";
		}
		if(@$simb_per_kec != ''){
			$sql .= " AND simb_per_kec LIKE '%".$simb_per_kec."%' ";
		}
		if(@$simb_per_kota != ''){
			$sql .= " AND simb_per_kota LIKE '%".$simb_per_kota."%' ";
		}
		if(@$simb_per_telp != ''){
			$sql .= " AND simb_per_telp LIKE '%".$simb_per_telp."%' ";
		}
		if(@$simb_jenis != ''){
			$sql .= " AND simb_jenis LIKE '%".$simb_jenis."%' ";
		}
		if(@$simb_status != ''){
			$sql .= " AND simb_status LIKE '%".$simb_status."%' ";
		}
		if(@$simb_jenisusaha != ''){
			$sql .= " AND simb_jenisusaha LIKE '%".$simb_jenisusaha."%' ";
		}
		if(@$simb_panjang != ''){
			$sql .= " AND simb_panjang LIKE '%".$simb_panjang."%' ";
		}
		if(@$simb_lebar != ''){
			$sql .= " AND simb_lebar LIKE '%".$simb_lebar."%' ";
		}
		if(@$simb_alamat != ''){
			$sql .= " AND simb_alamat LIKE '%".$simb_alamat."%' ";
		}
		if(@$simb_kel != ''){
			$sql .= " AND simb_kel LIKE '%".$simb_kel."%' ";
		}
		if(@$simb_kec != ''){
			$sql .= " AND simb_kec LIKE '%".$simb_kec."%' ";
		}
		if(@$simb_bentuk != ''){
			$sql .= " AND simb_bentuk LIKE '%".$simb_bentuk."%' ";
		}
		if(@$simb_lokasi != ''){
			$sql .= " AND simb_lokasi LIKE '%".$simb_lokasi."%' ";
		}
		if(@$simb_gangguan != ''){
			$sql .= " AND simb_gangguan LIKE '%".$simb_gangguan."%' ";
		}
		if(@$simb_batasutara != ''){
			$sql .= " AND simb_batasutara LIKE '%".$simb_batasutara."%' ";
		}
		if(@$simb_batastimur != ''){
			$sql .= " AND simb_batastimur LIKE '%".$simb_batastimur."%' ";
		}
		if(@$simb_batasselatan != ''){
			$sql .= " AND simb_batasselatan LIKE '%".$simb_batasselatan."%' ";
		}
		if(@$simb_batasbarat != ''){
			$sql .= " AND simb_batasbarat LIKE '%".$simb_batasbarat."%' ";
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