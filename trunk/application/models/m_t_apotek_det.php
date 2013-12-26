<?php
class M_t_apotek_det extends App_model{
	var $mainSql = "SELECT 
				det_apotek_id,
				det_apotek_apotek_id,
				det_apotek_jenis,
				det_apotek_tanggal,
				CASE WHEN det_apotek_jenis = 1 THEN 'BARU'
					ELSE 'PERPANJANGAN'
					END AS det_apotek_jenis_nama,
				det_apotek_surveylulus,
				det_apotek_terima,
				det_apotek_terimatanggal,
				det_apotek_kelengkapan,
				CASE WHEN det_apotek_kelengkapan = 1 THEN 'LENGKAP'
					ELSE 'TIDAK LENGKAP'
					END AS det_apotek_kelengkapan_nama,
				det_apotek_bap,
				det_apotek_baptanggal,
				det_apotek_keputusan,
				CASE WHEN det_apotek_keputusan = 1 THEN 'DISETUJUI'
					WHEN det_apotek_keputusan = 2 THEN 'DITOLAK'
					ELSE 'DITANGGUHKAN'
					END AS det_apotek_keputusan_nama,
				det_apotek_keterangan,
				det_apotek_jarak,
				det_apotek_rracik,
				det_apotek_radmin,
				det_apotek_rkerja,
				det_apotek_rtunggu,
				det_apotek_rwc,
				det_apotek_air,
				det_apotek_listrik,
				det_apotek_apk,
				det_apotek_apkukuran,
				det_apotek_jendela,
				det_apotek_limbah,
				det_apotek_baksampah,
				det_apotek_parkir,
				det_apotek_papannama,
				det_apotek_pengelola,
				det_apotek_pendamping,
				det_apotek_asisten,
				det_apotek_luas,
				det_apotek_statustanah,
				det_apotek_sewalama,
				det_apotek_sewaawal,
				det_apotek_sewaakhir,
				det_apotek_shnomor,
				det_apotek_shtahun,
				det_apotek_shgssu,
				det_apotek_shtanggal,
				det_apotek_shan,
				det_apotek_aktano,
				det_apotek_aktatahun,
				det_apotek_aktanotaris,
				det_apotek_aktaan,
				det_apotek_ckutipan,
				det_apotek_ckec,
				det_apotek_ctanggal,
				det_apotek_cpetok,
				det_apotek_cpersil,
				det_apotek_ckelas,
				det_apotek_can,
				det_apotek_sppihak1,
				det_apotek_sppihak2,
				det_apotek_spnomor,
				det_apotek_sptanggal,
				det_apotek_notaris,
				det_apotek_sk,
				det_apotek_berlaku,
				det_apotek_kadaluarsa,
				det_apotek_proses,
				apotek_nama,
				apotek_alamat,
				apotek_telp,
				apotek_kel,
				apotek_kec,
				apotek_kepemilikan,
				apotek_pemilik,
				apotek_pemilikalamat,
				apotek_pemiliknpwp,
				apotek_siup,
				CONCAT(5 * (DATEDIFF(NOW(), det_apotek_tanggal) DIV 7) + 
					MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(NOW()) + WEEKDAY(det_apotek_tanggal) + 
						1, 1),' Hari') as lamaproses,
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
				pemohon_tahunlulus
				FROM t_apotek_det 
				JOIN t_apotek ON t_apotek.apotek_id = t_apotek_det.det_apotek_apotek_id
				JOIN m_pemohon ON t_apotek_det.det_apotek_pemohon_id = m_pemohon.pemohon_id
			WHERE det_apotek_id IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 't_apotek_det';
        $this->column_primary = 'det_apotek_id';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					det_apotek_apotek_id LIKE '%".$searchText."%' OR 
					det_apotek_jenis LIKE '%".$searchText."%' OR 
					det_apotek_surveylulus LIKE '%".$searchText."%' OR 
					det_apotek_nama LIKE '%".$searchText."%' OR 
					det_apotek_alamat LIKE '%".$searchText."%' OR 
					det_apotek_telp LIKE '%".$searchText."%' OR 
					det_apotek_sp LIKE '%".$searchText."%' OR 
					det_apotek_ktp LIKE '%".$searchText."%' OR 
					det_apotek_tempatlahir LIKE '%".$searchText."%' OR 
					det_apotek_tanggallahir LIKE '%".$searchText."%' OR 
					det_apotek_pekerjaan LIKE '%".$searchText."%' OR 
					det_apotek_npwp LIKE '%".$searchText."%' OR 
					det_apotek_stra LIKE '%".$searchText."%' OR 
					det_apotek_pendidikan LIKE '%".$searchText."%' OR 
					det_apotek_tahunlulus LIKE '%".$searchText."%' OR 
					det_apotek_terima LIKE '%".$searchText."%' OR 
					det_apotek_terimatanggal LIKE '%".$searchText."%' OR 
					det_apotek_kelengkapan LIKE '%".$searchText."%' OR 
					det_apotek_bap LIKE '%".$searchText."%' OR 
					det_apotek_baptanggal LIKE '%".$searchText."%' OR 
					det_apotek_keputusan LIKE '%".$searchText."%' OR 
					det_apotek_keterangan LIKE '%".$searchText."%' OR 
					det_apotek_jarak LIKE '%".$searchText."%' OR 
					det_apotek_rracik LIKE '%".$searchText."%' OR 
					det_apotek_radmin LIKE '%".$searchText."%' OR 
					det_apotek_rkerja LIKE '%".$searchText."%' OR 
					det_apotek_rtunggu LIKE '%".$searchText."%' OR 
					det_apotek_rwc LIKE '%".$searchText."%' OR 
					det_apotek_air LIKE '%".$searchText."%' OR 
					det_apotek_listrik LIKE '%".$searchText."%' OR 
					det_apotek_apk LIKE '%".$searchText."%' OR 
					det_apotek_apkukuran LIKE '%".$searchText."%' OR 
					det_apotek_jendela LIKE '%".$searchText."%' OR 
					det_apotek_limbah LIKE '%".$searchText."%' OR 
					det_apotek_baksampah LIKE '%".$searchText."%' OR 
					det_apotek_parkir LIKE '%".$searchText."%' OR 
					det_apotek_papannama LIKE '%".$searchText."%' OR 
					det_apotek_pengelola LIKE '%".$searchText."%' OR 
					det_apotek_pendamping LIKE '%".$searchText."%' OR 
					det_apotek_asisten LIKE '%".$searchText."%' OR 
					det_apotek_luas LIKE '%".$searchText."%' OR 
					det_apotek_statustanah LIKE '%".$searchText."%' OR 
					det_apotek_sewalama LIKE '%".$searchText."%' OR 
					det_apotek_sewaawal LIKE '%".$searchText."%' OR 
					det_apotek_sewaakhir LIKE '%".$searchText."%' OR 
					det_apotek_shnomor LIKE '%".$searchText."%' OR 
					det_apotek_shtahun LIKE '%".$searchText."%' OR 
					det_apotek_shgssu LIKE '%".$searchText."%' OR 
					det_apotek_shtanggal LIKE '%".$searchText."%' OR 
					det_apotek_shan LIKE '%".$searchText."%' OR 
					det_apotek_aktano LIKE '%".$searchText."%' OR 
					det_apotek_aktatahun LIKE '%".$searchText."%' OR 
					det_apotek_aktanotaris LIKE '%".$searchText."%' OR 
					det_apotek_aktaan LIKE '%".$searchText."%' OR 
					det_apotek_ckutipan LIKE '%".$searchText."%' OR 
					det_apotek_ckec LIKE '%".$searchText."%' OR 
					det_apotek_ctanggal LIKE '%".$searchText."%' OR 
					det_apotek_cpetok LIKE '%".$searchText."%' OR 
					det_apotek_cpersil LIKE '%".$searchText."%' OR 
					det_apotek_ckelas LIKE '%".$searchText."%' OR 
					det_apotek_can LIKE '%".$searchText."%' OR 
					det_apotek_sppihak1 LIKE '%".$searchText."%' OR 
					det_apotek_sppihak2 LIKE '%".$searchText."%' OR 
					det_apotek_spnomor LIKE '%".$searchText."%' OR 
					det_apotek_sptanggal LIKE '%".$searchText."%' OR 
					det_apotek_notaris LIKE '%".$searchText."%'
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
		
		if(@$det_apotek_id != ''){
			$sql .= " AND det_apotek_id LIKE '%".$det_apotek_id."%' ";
		}
		if(@$det_apotek_apotek_id != ''){
			$sql .= " AND det_apotek_apotek_id LIKE '%".$det_apotek_apotek_id."%' ";
		}
		if(@$det_apotek_jenis != ''){
			$sql .= " AND det_apotek_jenis LIKE '%".$det_apotek_jenis."%' ";
		}
		if(@$det_apotek_surveylulus != ''){
			$sql .= " AND det_apotek_surveylulus LIKE '%".$det_apotek_surveylulus."%' ";
		}
		if(@$det_apotek_nama != ''){
			$sql .= " AND det_apotek_nama LIKE '%".$det_apotek_nama."%' ";
		}
		if(@$det_apotek_alamat != ''){
			$sql .= " AND det_apotek_alamat LIKE '%".$det_apotek_alamat."%' ";
		}
		if(@$det_apotek_telp != ''){
			$sql .= " AND det_apotek_telp LIKE '%".$det_apotek_telp."%' ";
		}
		if(@$det_apotek_sp != ''){
			$sql .= " AND det_apotek_sp LIKE '%".$det_apotek_sp."%' ";
		}
		if(@$det_apotek_ktp != ''){
			$sql .= " AND det_apotek_ktp LIKE '%".$det_apotek_ktp."%' ";
		}
		if(@$det_apotek_tempatlahir != ''){
			$sql .= " AND det_apotek_tempatlahir LIKE '%".$det_apotek_tempatlahir."%' ";
		}
		if(@$det_apotek_tanggallahir != ''){
			$sql .= " AND det_apotek_tanggallahir LIKE '%".$det_apotek_tanggallahir."%' ";
		}
		if(@$det_apotek_pekerjaan != ''){
			$sql .= " AND det_apotek_pekerjaan LIKE '%".$det_apotek_pekerjaan."%' ";
		}
		if(@$det_apotek_npwp != ''){
			$sql .= " AND det_apotek_npwp LIKE '%".$det_apotek_npwp."%' ";
		}
		if(@$det_apotek_stra != ''){
			$sql .= " AND det_apotek_stra LIKE '%".$det_apotek_stra."%' ";
		}
		if(@$det_apotek_pendidikan != ''){
			$sql .= " AND det_apotek_pendidikan LIKE '%".$det_apotek_pendidikan."%' ";
		}
		if(@$det_apotek_tahunlulus != ''){
			$sql .= " AND det_apotek_tahunlulus LIKE '%".$det_apotek_tahunlulus."%' ";
		}
		if(@$det_apotek_terima != ''){
			$sql .= " AND det_apotek_terima LIKE '%".$det_apotek_terima."%' ";
		}
		if(@$det_apotek_terimatanggal != ''){
			$sql .= " AND det_apotek_terimatanggal LIKE '%".$det_apotek_terimatanggal."%' ";
		}
		if(@$det_apotek_kelengkapan != ''){
			$sql .= " AND det_apotek_kelengkapan LIKE '%".$det_apotek_kelengkapan."%' ";
		}
		if(@$det_apotek_bap != ''){
			$sql .= " AND det_apotek_bap LIKE '%".$det_apotek_bap."%' ";
		}
		if(@$det_apotek_baptanggal != ''){
			$sql .= " AND det_apotek_baptanggal LIKE '%".$det_apotek_baptanggal."%' ";
		}
		if(@$det_apotek_keputusan != ''){
			$sql .= " AND det_apotek_keputusan LIKE '%".$det_apotek_keputusan."%' ";
		}
		if(@$det_apotek_keterangan != ''){
			$sql .= " AND det_apotek_keterangan LIKE '%".$det_apotek_keterangan."%' ";
		}
		if(@$det_apotek_jarak != ''){
			$sql .= " AND det_apotek_jarak LIKE '%".$det_apotek_jarak."%' ";
		}
		if(@$det_apotek_rracik != ''){
			$sql .= " AND det_apotek_rracik LIKE '%".$det_apotek_rracik."%' ";
		}
		if(@$det_apotek_radmin != ''){
			$sql .= " AND det_apotek_radmin LIKE '%".$det_apotek_radmin."%' ";
		}
		if(@$det_apotek_rkerja != ''){
			$sql .= " AND det_apotek_rkerja LIKE '%".$det_apotek_rkerja."%' ";
		}
		if(@$det_apotek_rtunggu != ''){
			$sql .= " AND det_apotek_rtunggu LIKE '%".$det_apotek_rtunggu."%' ";
		}
		if(@$det_apotek_rwc != ''){
			$sql .= " AND det_apotek_rwc LIKE '%".$det_apotek_rwc."%' ";
		}
		if(@$det_apotek_air != ''){
			$sql .= " AND det_apotek_air LIKE '%".$det_apotek_air."%' ";
		}
		if(@$det_apotek_listrik != ''){
			$sql .= " AND det_apotek_listrik LIKE '%".$det_apotek_listrik."%' ";
		}
		if(@$det_apotek_apk != ''){
			$sql .= " AND det_apotek_apk LIKE '%".$det_apotek_apk."%' ";
		}
		if(@$det_apotek_apkukuran != ''){
			$sql .= " AND det_apotek_apkukuran LIKE '%".$det_apotek_apkukuran."%' ";
		}
		if(@$det_apotek_jendela != ''){
			$sql .= " AND det_apotek_jendela LIKE '%".$det_apotek_jendela."%' ";
		}
		if(@$det_apotek_limbah != ''){
			$sql .= " AND det_apotek_limbah LIKE '%".$det_apotek_limbah."%' ";
		}
		if(@$det_apotek_baksampah != ''){
			$sql .= " AND det_apotek_baksampah LIKE '%".$det_apotek_baksampah."%' ";
		}
		if(@$det_apotek_parkir != ''){
			$sql .= " AND det_apotek_parkir LIKE '%".$det_apotek_parkir."%' ";
		}
		if(@$det_apotek_papannama != ''){
			$sql .= " AND det_apotek_papannama LIKE '%".$det_apotek_papannama."%' ";
		}
		if(@$det_apotek_pengelola != ''){
			$sql .= " AND det_apotek_pengelola LIKE '%".$det_apotek_pengelola."%' ";
		}
		if(@$det_apotek_pendamping != ''){
			$sql .= " AND det_apotek_pendamping LIKE '%".$det_apotek_pendamping."%' ";
		}
		if(@$det_apotek_asisten != ''){
			$sql .= " AND det_apotek_asisten LIKE '%".$det_apotek_asisten."%' ";
		}
		if(@$det_apotek_luas != ''){
			$sql .= " AND det_apotek_luas LIKE '%".$det_apotek_luas."%' ";
		}
		if(@$det_apotek_statustanah != ''){
			$sql .= " AND det_apotek_statustanah LIKE '%".$det_apotek_statustanah."%' ";
		}
		if(@$det_apotek_sewalama != ''){
			$sql .= " AND det_apotek_sewalama LIKE '%".$det_apotek_sewalama."%' ";
		}
		if(@$det_apotek_sewaawal != ''){
			$sql .= " AND det_apotek_sewaawal LIKE '%".$det_apotek_sewaawal."%' ";
		}
		if(@$det_apotek_sewaakhir != ''){
			$sql .= " AND det_apotek_sewaakhir LIKE '%".$det_apotek_sewaakhir."%' ";
		}
		if(@$det_apotek_shnomor != ''){
			$sql .= " AND det_apotek_shnomor LIKE '%".$det_apotek_shnomor."%' ";
		}
		if(@$det_apotek_shtahun != ''){
			$sql .= " AND det_apotek_shtahun LIKE '%".$det_apotek_shtahun."%' ";
		}
		if(@$det_apotek_shgssu != ''){
			$sql .= " AND det_apotek_shgssu LIKE '%".$det_apotek_shgssu."%' ";
		}
		if(@$det_apotek_shtanggal != ''){
			$sql .= " AND det_apotek_shtanggal LIKE '%".$det_apotek_shtanggal."%' ";
		}
		if(@$det_apotek_shan != ''){
			$sql .= " AND det_apotek_shan LIKE '%".$det_apotek_shan."%' ";
		}
		if(@$det_apotek_aktano != ''){
			$sql .= " AND det_apotek_aktano LIKE '%".$det_apotek_aktano."%' ";
		}
		if(@$det_apotek_aktatahun != ''){
			$sql .= " AND det_apotek_aktatahun LIKE '%".$det_apotek_aktatahun."%' ";
		}
		if(@$det_apotek_aktanotaris != ''){
			$sql .= " AND det_apotek_aktanotaris LIKE '%".$det_apotek_aktanotaris."%' ";
		}
		if(@$det_apotek_aktaan != ''){
			$sql .= " AND det_apotek_aktaan LIKE '%".$det_apotek_aktaan."%' ";
		}
		if(@$det_apotek_ckutipan != ''){
			$sql .= " AND det_apotek_ckutipan LIKE '%".$det_apotek_ckutipan."%' ";
		}
		if(@$det_apotek_ckec != ''){
			$sql .= " AND det_apotek_ckec LIKE '%".$det_apotek_ckec."%' ";
		}
		if(@$det_apotek_ctanggal != ''){
			$sql .= " AND det_apotek_ctanggal LIKE '%".$det_apotek_ctanggal."%' ";
		}
		if(@$det_apotek_cpetok != ''){
			$sql .= " AND det_apotek_cpetok LIKE '%".$det_apotek_cpetok."%' ";
		}
		if(@$det_apotek_cpersil != ''){
			$sql .= " AND det_apotek_cpersil LIKE '%".$det_apotek_cpersil."%' ";
		}
		if(@$det_apotek_ckelas != ''){
			$sql .= " AND det_apotek_ckelas LIKE '%".$det_apotek_ckelas."%' ";
		}
		if(@$det_apotek_can != ''){
			$sql .= " AND det_apotek_can LIKE '%".$det_apotek_can."%' ";
		}
		if(@$det_apotek_sppihak1 != ''){
			$sql .= " AND det_apotek_sppihak1 LIKE '%".$det_apotek_sppihak1."%' ";
		}
		if(@$det_apotek_sppihak2 != ''){
			$sql .= " AND det_apotek_sppihak2 LIKE '%".$det_apotek_sppihak2."%' ";
		}
		if(@$det_apotek_spnomor != ''){
			$sql .= " AND det_apotek_spnomor LIKE '%".$det_apotek_spnomor."%' ";
		}
		if(@$det_apotek_sptanggal != ''){
			$sql .= " AND det_apotek_sptanggal LIKE '%".$det_apotek_sptanggal."%' ";
		}
		if(@$det_apotek_notaris != ''){
			$sql .= " AND det_apotek_notaris LIKE '%".$det_apotek_notaris."%' ";
		}
		if(@$limit_start != 0 && @$limit_start != 0){
			$sql .= " LIMIT ".@$limit_start.", ".@$limit_end." ";
		}
		$this->firephp->log($sql);
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
					apotek_cek_id,
					apotek_cek_syarat_id,
					apotek_cek_apotekdet_id,
					apotek_cek_apotek_id,
					apotek_cek_status,
					apotek_cek_keterangan,
					NAMA_SYARAT AS apotek_cek_syarat_nama
				FROM t_apotek_ceklist 
				LEFT JOIN master_syarat ON t_apotek_ceklist.apotek_cek_syarat_id = master_syarat.ID_SYARAT
				WHERE apotek_cek_apotekdet_id = ".$apotek_det_id."
				AND apotek_cek_apotek_id = ".$apotek_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS apotek_cek_id,
					master_syarat.ID_SYARAT AS apotek_cek_syarat_id,
					NAMA_SYARAT AS apotek_cek_syarat_nama
				FROM dt_syarat 
				LEFT JOIN master_syarat ON dt_syarat.ID_SYARAT = master_syarat.ID_SYARAT
				WHERE ID_IJIN = 5
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	function getPerlengkapan($params){
		extract($params);
		if($currentAction == 'update'){
			$sql = "
				SELECT 
					apotek_ket_id,
					apotek_ket_perlengkapanid,
					apotek_ket_status,
					apotek_ket_jumlah,
					perlengkapan_nama AS apotek_ket_perlengkapannama
				FROM t_apotek_ket 
				LEFT JOIN m_perlengkapan_apotek ON m_perlengkapan_apotek.perlengkapan_id = t_apotek_ket.apotek_ket_perlengkapanid
				WHERE apotek_ket_detapotek_id = ".$apotek_det_id."
				AND apotek_ket_apotek_id = ".$apotek_id."
			";
		}else{
			$sql = "
				SELECT 
					0 AS apotek_ket_id,
					m_perlengkapan_apotek.perlengkapan_id AS apotek_ket_perlengkapanid,
					perlengkapan_nama AS apotek_ket_perlengkapannama
				FROM m_perlengkapan_apotek 
			";
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}