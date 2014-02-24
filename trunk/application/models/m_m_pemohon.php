<?php
class M_m_pemohon extends App_Model{
	var $mainSql = "SELECT 
				id AS pemohon_id,
				nama AS pemohon_nama,
				alamat AS pemohon_alamat,
				telp AS pemohon_telp,
				npwp AS pemohon_npwp,
				rt AS pemohon_rt,
				rw AS pemohon_rw,
				desa_id AS pemohon_kel,
				kecamatan_id AS pemohon_kec,
				kabkota_id AS pemohon_kota,
				ktp AS pemohon_nik,
				stra AS pemohon_stra,
				surattugas AS pemohon_surattugas,
				pekerjaan AS pemohon_pekerjaan,
				tempatlahir AS pemohon_tempatlahir,
				tgllahir AS pemohon_tanggallahir,
				pendidikan AS pemohon_pendidikan,
				tahunlulus AS pemohon_tahunlulus,
				warga_id AS pemohon_wn,
				hp AS pemohon_hp
				FROM pemohon 
			WHERE id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'm_pemohon';
        $this->column_primary = 'pemohon_id';
        $this->column_order = 'pemohon_id';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$_SESSION['IDHAK'] == 2){
			$sql .= " AND pemohon_user_id = ".$_SESSION['USERID'];
		}
		if(@$searchText != ''){
			$sql .= "
				AND (
					nama LIKE '%".$searchText."%' OR 
					alamat LIKE '%".$searchText."%' OR 
					ktp LIKE '%".$searchText."%' 
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
		
		if(@$pemohon_nama != ''){
			$sql .= " AND nama LIKE '%".$pemohon_nama."%' ";
		}
		if(@$pemohon_alamat != ''){
			$sql .= " AND alamat LIKE '%".$pemohon_alamat."%' ";
		}
		if(@$pemohon_npwp != ''){
			$sql .= " AND npwp LIKE '%".$pemohon_npwp."%' ";
		}
		if(@$pemohon_nik != ''){
			$sql .= " AND ktp LIKE '%".$pemohon_nik."%' ";
		}
		if(@$pemohon_stra != ''){
			$sql .= " AND stra LIKE '%".$pemohon_stra."%' ";
		}
		if(@$pemohon_surattugas != ''){
			$sql .= " AND surattugas LIKE '%".$pemohon_surattugas."%' ";
		}
		// if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		// }
		if($_SESSION["IDHAK"] == 2){
			$sql .= " AND pemohon_user_id = " . $_SESSION["USERID"];
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