<?php
class M_m_pemohon extends App_model{
	var $mainSql = "SELECT 
				pemohon_id,
				pemohon_nama,
				pemohon_alamat,
				pemohon_telp,
				pemohon_npwp,
				pemohon_rt,
				pemohon_rw,
				pemohon_kel,
				pemohon_kec,
				pemohon_kota,
				pemohon_nik,
				pemohon_stra,
				pemohon_surattugas,
				pemohon_pekerjaan,
				pemohon_tempatlahir,
				pemohon_tanggallahir,
				pemohon_user_id,
				pemohon_pendidikan,
				pemohon_tahunlulus,
				pemohon_wn,
				pemohon_hp
				FROM m_pemohon 
			WHERE pemohon_id IS NOT NULL 
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
					pemohon_nama LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					pemohon_npwp LIKE '%".$searchText."%' OR 
					pemohon_rt LIKE '%".$searchText."%' OR 
					pemohon_rw LIKE '%".$searchText."%' OR 
					pemohon_kel LIKE '%".$searchText."%' OR 
					pemohon_kec LIKE '%".$searchText."%' OR 
					pemohon_kota LIKE '%".$searchText."%' OR 
					pemohon_nik LIKE '%".$searchText."%' OR 
					pemohon_stra LIKE '%".$searchText."%' OR 
					pemohon_surattugas LIKE '%".$searchText."%' OR 
					pemohon_pekerjaan LIKE '%".$searchText."%' OR 
					pemohon_tempatlahir LIKE '%".$searchText."%' OR 
					pemohon_tanggallahir LIKE '%".$searchText."%' OR 
					pemohon_user_id LIKE '%".$searchText."%' OR 
					pemohon_pendidikan LIKE '%".$searchText."%' OR 
					pemohon_tahunlulus LIKE '%".$searchText."%' OR 
					pemohon_wn LIKE '%".$searchText."%' OR 
					pemohon_hp LIKE '%".$searchText."%'
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
			$sql .= " AND pemohon_nama LIKE '%".$pemohon_nama."%' ";
		}
		if(@$pemohon_alamat != ''){
			$sql .= " AND pemohon_alamat LIKE '%".$pemohon_alamat."%' ";
		}
		if(@$pemohon_telp != ''){
			$sql .= " AND pemohon_telp LIKE '%".$pemohon_telp."%' ";
		}
		if(@$pemohon_npwp != ''){
			$sql .= " AND pemohon_npwp LIKE '%".$pemohon_npwp."%' ";
		}
		if(@$pemohon_rt != ''){
			$sql .= " AND pemohon_rt LIKE '%".$pemohon_rt."%' ";
		}
		if(@$pemohon_rw != ''){
			$sql .= " AND pemohon_rw LIKE '%".$pemohon_rw."%' ";
		}
		if(@$pemohon_kel != ''){
			$sql .= " AND pemohon_kel LIKE '%".$pemohon_kel."%' ";
		}
		if(@$pemohon_kec != ''){
			$sql .= " AND pemohon_kec LIKE '%".$pemohon_kec."%' ";
		}
		if(@$pemohon_kota != ''){
			$sql .= " AND pemohon_kota LIKE '%".$pemohon_kota."%' ";
		}
		if(@$pemohon_nik != ''){
			$sql .= " AND pemohon_nik LIKE '%".$pemohon_nik."%' ";
		}
		if(@$pemohon_stra != ''){
			$sql .= " AND pemohon_stra LIKE '%".$pemohon_stra."%' ";
		}
		if(@$pemohon_surattugas != ''){
			$sql .= " AND pemohon_surattugas LIKE '%".$pemohon_surattugas."%' ";
		}
		if(@$pemohon_pekerjaan != ''){
			$sql .= " AND pemohon_pekerjaan LIKE '%".$pemohon_pekerjaan."%' ";
		}
		if(@$pemohon_tempatlahir != ''){
			$sql .= " AND pemohon_tempatlahir LIKE '%".$pemohon_tempatlahir."%' ";
		}
		if(@$pemohon_tanggallahir != ''){
			$sql .= " AND pemohon_tanggallahir LIKE '%".$pemohon_tanggallahir."%' ";
		}
		if(@$pemohon_user_id != ''){
			$sql .= " AND pemohon_user_id LIKE '%".$pemohon_user_id."%' ";
		}
		if(@$pemohon_pendidikan != ''){
			$sql .= " AND pemohon_pendidikan LIKE '%".$pemohon_pendidikan."%' ";
		}
		if(@$pemohon_tahunlulus != ''){
			$sql .= " AND pemohon_tahunlulus LIKE '%".$pemohon_tahunlulus."%' ";
		}
		if(@$pemohon_wn != ''){
			$sql .= " AND pemohon_wn LIKE '%".$pemohon_wn."%' ";
		}
		if(@$pemohon_hp != ''){
			$sql .= " AND pemohon_hp LIKE '%".$pemohon_hp."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
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