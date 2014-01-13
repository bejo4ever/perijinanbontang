<?php
class M_t_simb_det extends App_Model{
	var $mainSql = "SELECT 
				det_simb_id,
				det_simb_simb_id,
				det_simb_jenis,
				CASE WHEN det_simb_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_simb_jenis_nama,
				det_simb_tanggal,
				det_simb_pemohon_id,
				det_simb_nomorreg,
				det_simb_proses,
				det_simb_sk,
				det_simb_berlaku,
				det_simb_kadaluarsa,
				det_simb_penerima,
				det_simb_tanggalterima,
				det_simb_keterangan,
				CONCAT(5 * (DATEDIFF(NOW(), det_simb_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_simb_tanggal) + 
						1, 1),' Hari') as lamaproses,
				simb_per_npwp,
				simb_per_nama,
				simb_per_akta,
				simb_per_bentuk,
				CASE WHEN simb_per_bentuk = 1 THEN 'PT'
					WHEN simb_per_bentuk = 2 THEN 'BUMN'
					WHEN simb_per_bentuk = 3 THEN 'KOPERASI'
					WHEN simb_per_bentuk = 4 THEN 'CV'
					WHEN simb_per_bentuk = 5 THEN 'PERSEKUTUAN FIRMA'
					ELSE 'PERUSAHAAN PERORANGAN'
					END AS simb_per_bentuk_nama,
				simb_per_alamat,
				simb_per_kel,
				simb_per_kec,
				simb_per_kota,
				simb_per_telp,
				simb_jenis,
				simb_status,
				CASE WHEN simb_status = 1 THEN 'MILIK SENDIRI'
					WHEN simb_status = 2 THEN 'SEWA'
					WHEN simb_status = 3 THEN 'KONTRAK'
					ELSE 'LAINNYA'
					END AS simb_status_nama,
				simb_jenisusaha,
				simb_panjang,
				simb_lebar,
				simb_alamat,
				simb_kel,
				simb_kec,
				simb_bentuk,
				CASE WHEN simb_bentuk = 1 THEN 'PERMANEN'
					ELSE 'SEMI PERMANEN'
					END AS simb_bentuk_nama,
				simb_lokasi,
				CASE WHEN simb_lokasi = 1 THEN 'KAWASAN INDUSTRI'
					WHEN simb_lokasi = 2 THEN 'ZONA INDUSTRI'
					ELSE 'KAWASAN CAMPURAN'
					END AS simb_lokasi_nama,
				simb_gangguan,
				CASE WHEN simb_gangguan = 1 THEN 'BESAR'
					WHEN simb_gangguan = 2 THEN 'SEDANG'
					ELSE 'KECIL'
					END AS simb_gangguan_nama,
				simb_batasutara,
				simb_batastimur,
				simb_batasselatan,
				simb_batasbarat,
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
				pemohon_wn
				FROM t_simb_det 
				JOIN t_simb ON t_simb.simb_id = t_simb_det.det_simb_simb_id
				JOIN m_pemohon ON t_simb_det.det_simb_pemohon_id = m_pemohon.pemohon_id
			WHERE det_simb_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_simb_det';
        $this->column_primary = 'det_simb_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					pemohon_nama LIKE '%".$searchText."%' OR 
					pemohon_alamat LIKE '%".$searchText."%' OR 
					pemohon_telp LIKE '%".$searchText."%' OR 
					det_simb_sk LIKE '%".$searchText."%' OR 
					simb_per_nama LIKE '%".$searchText."%' 
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
		
		if(@$det_simb_simb_id != ''){
			$sql .= " AND det_simb_simb_id LIKE '%".$det_simb_simb_id."%' ";
		}
		if(@$det_simb_jenis != ''){
			$sql .= " AND det_simb_jenis LIKE '%".$det_simb_jenis."%' ";
		}
		if(@$det_simb_tanggal != ''){
			$sql .= " AND det_simb_tanggal LIKE '%".$det_simb_tanggal."%' ";
		}
		if(@$det_simb_pemohon_id != ''){
			$sql .= " AND det_simb_pemohon_id LIKE '%".$det_simb_pemohon_id."%' ";
		}
		if(@$det_simb_nomorreg != ''){
			$sql .= " AND det_simb_nomorreg LIKE '%".$det_simb_nomorreg."%' ";
		}
		if(@$det_simb_proses != ''){
			$sql .= " AND det_simb_proses LIKE '%".$det_simb_proses."%' ";
		}
		if(@$det_simb_sk != ''){
			$sql .= " AND det_simb_sk LIKE '%".$det_simb_sk."%' ";
		}
		if(@$det_simb_berlaku != ''){
			$sql .= " AND det_simb_berlaku LIKE '%".$det_simb_berlaku."%' ";
		}
		if(@$det_simb_kadaluarsa != ''){
			$sql .= " AND det_simb_kadaluarsa LIKE '%".$det_simb_kadaluarsa."%' ";
		}
		if(@$det_simb_penerima != ''){
			$sql .= " AND det_simb_penerima LIKE '%".$det_simb_penerima."%' ";
		}
		if(@$det_simb_tanggalterima != ''){
			$sql .= " AND det_simb_tanggalterima LIKE '%".$det_simb_tanggalterima."%' ";
		}
		if(@$det_simb_keterangan != ''){
			$sql .= " AND det_simb_keterangan LIKE '%".$det_simb_keterangan."%' ";
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
					simb_cek_id,
					simb_cek_syarat_id,
					simb_cek_simbdet_id,
					simb_cek_simb_id,
					simb_cek_status,
					simb_cek_keterangan,
					NAMA_SYARAT AS simb_cek_syarat_nama
				FROM t_simb_ceklist 
				LEFT JOIN master_syarat ON t_simb_ceklist.simb_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE simb_cek_simbdet_id = ".$simb_det_id."
				AND simb_cek_simb_id = ".$simb_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS simb_cek_id,
					master_syarat.ID_SYARAT AS simb_cek_syarat_id,
					NAMA_SYARAT AS simb_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 1
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}