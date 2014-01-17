<?php
class M_t_laporan extends App_Model{
	
	function __construct(){
        parent::__construct();
        $this->table_name = '';
        $this->column_primary = '';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getrecords($params){
		extract($params);
		$sql = "";
		switch($laporan_ijin){
			case 1:
				$sql = "
					SELECT CASE WHEN det_idam_jenis = 1 THEN 'BARU' ELSE 'PERPANJANGAN' END AS permohonan_jenis,
						pemohon_nama, pemohon_alamat, det_idam_proses AS permohonan_proses,
						det_idam_tanggal AS permohonan_tanggal, det_idam_sk AS permohonan_sk,
						det_idam_berlaku AS permohonan_terbit
						FROM t_idam_det 
						JOIN t_idam ON t_idam_det.det_idam_idam_id = t_idam.idam_id
						JOIN m_pemohon ON t_idam_det.det_idam_pemohon_id = m_pemohon.pemohon_id
					WHERE det_idam_id IS NOT NULL 
				";
				if($laporan_opsi == 'tanggal'){
					$sql .= " AND det_idam_tanggal <= '".$laporan_tanggalAkhir."' 
						AND det_idam_tanggal >= '".$laporan_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_idam_tanggal,'%Y-%m') = '".$laporan_tahun.'-'.$laporan_bulan."' ";
				}
			break;
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
	function getrecordssk($params){
		extract($params);
		$sql = "";
		switch($laporan_ijin){
			case 1:
				$sql = "
					SELECT 
						pemohon_nama, pemohon_alamat,
						det_idam_tanggal AS permohonan_tanggal, 
						det_idam_sk AS permohonan_sk,
						det_idam_berlaku AS permohonan_terbit,
						CONCAT(5 * (DATEDIFF(det_idam_tanggal, det_idam_berlaku) DIV 7) + 
							MID('0123444401233334012222340111123400001234000123450', 7 * WEEKDAY(det_idam_tanggal) + WEEKDAY(det_idam_berlaku) + 
								1, 1),' Hari') as lamaproses
						FROM t_idam_det 
						JOIN t_idam ON t_idam_det.det_idam_idam_id = t_idam.idam_id
						JOIN m_pemohon ON t_idam_det.det_idam_pemohon_id = m_pemohon.pemohon_id
					WHERE det_idam_id IS NOT NULL 
					AND det_idam_sk IS NOT NULL
				";
				if($laporan_opsi == 'tanggal'){
					$sql .= " AND det_idam_tanggal <= '".$laporan_tanggalAkhir."' 
						AND det_idam_tanggal >= '".$laporan_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_idam_tanggal,'%Y-%m') = '".$laporan_tahun.'-'.$laporan_bulan."' ";
				}
			break;
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}