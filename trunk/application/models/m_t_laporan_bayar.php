<?php
class M_t_laporan_bayar extends App_Model{
	
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
		switch($laporan_bayar_ijin){
			case 1:
				$sql = "
					SELECT
						idam_usaha AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_idam_retribusi AS permohonan_retribusi
					FROM t_idam_det
					JOIN t_idam ON t_idam_det.det_idam_idam_id = t_idam.idam_id
					JOIN m_pemohon ON t_idam_det.det_idam_pemohon_id = m_pemohon.pemohon_id
					WHERE det_idam_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_idam_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_idam_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_idam_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 2:
				$sql = "
					SELECT
						ipmbl_usaha AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_ipmbl_retribusi AS permohonan_retribusi
					FROM t_ipmbl_det
					JOIN t_ipmbl ON t_ipmbl_det.det_ipmbl_ipmbl_id = t_ipmbl.ipmbl_id
					JOIN m_pemohon ON t_ipmbl_det.det_ipmbl_pemohon_id = m_pemohon.pemohon_id
					WHERE det_ipmbl_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_ipmbl_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_ipmbl_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_ipmbl_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 3:
				$sql = "
					SELECT
						iujt_usaha AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_iujt_retribusi AS permohonan_retribusi
					FROM t_iujt_det
					JOIN t_iujt ON t_iujt_det.det_iujt_iujt_id = t_iujt.iujt_id
					JOIN m_pemohon ON t_iujt_det.det_iujt_pemohon_id = m_pemohon.pemohon_id
					WHERE det_iujt_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_iujt_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_iujt_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_iujt_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 4:
				$sql = "
					SELECT
						iujk_perusahaan AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_iujk_retribusi AS permohonan_retribusi
					FROM t_iujk_det
					JOIN t_iujk ON t_iujk_det.det_iujk_iujk_id = t_iujk.iujk_id
					JOIN m_pemohon ON t_iujk_det.det_iujk_pemohon_id = m_pemohon.pemohon_id
					WHERE det_iujk_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_iujk_kadaluarsa <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_iujk_kadaluarsa >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_iujk_kadaluarsa,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 5:
				$sql = "
					SELECT
						apotek_nama AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_apotek_retribusi AS permohonan_retribusi
					FROM t_apotek_det
					JOIN t_apotek ON t_apotek_det.det_apotek_apotek_id = t_apotek.apotek_id
					JOIN m_pemohon ON t_apotek_det.det_apotek_pemohon_id = m_pemohon.pemohon_id
					WHERE det_apotek_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_apotek_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_apotek_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_apotek_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 8:
				$sql = "
					SELECT
						NAMA_PERUSAHAAN AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM ijin_lingkungan 
					JOIN ijin_lingkungan_inti ON ijin_lingkungan_inti.ID_IJIN_LINGKUNGAN_INTI = ijin_lingkungan.ID_IJIN_LINGKUNGAN_INTI
					JOIN m_pemohon ON ijin_lingkungan_inti.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_IJIN_LINGKUNGAN IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_AKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_AKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_AKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 9:
				$sql = "
					SELECT 
						NAMA_USAHA AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM sppl 
					JOIN m_pemohon ON sppl.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_SPPL IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_BERAKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_BERAKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_BERAKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 10:
				$sql = "
					SELECT
						NAMA_PEMILIK AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM sktr 
					JOIN m_pemohon ON sktr.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_SKTR IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_BERAKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_BERAKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_BERAKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 11:
				$sql = "
					SELECT 
						NAMA_PERUSAHAAN AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM iuiphhk 
					JOIN m_pemohon ON iuiphhk.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_IUIPHHK IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_BERAKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_BERAKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_BERAKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 12:
				$sql = "
					SELECT 
						NAMA_PERUSAHAAN AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM ijin_prinsip 
					JOIN m_pemohon ON ijin_prinsip.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_IJIN_PRINSIP IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_BERAKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_BERAKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_BERAKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 13:
				$sql = "
					SELECT 
						NAMA_PERUSAHAAN AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						RETRIBUSI AS permohonan_retribusi
					FROM trotoar 
					JOIN m_pemohon ON trotoar.ID_PEMOHON = m_pemohon.pemohon_id
					WHERE ID_TROTOAR IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND TGL_BERAKHIR <= '".$laporan_bayar_tanggalAkhir."' 
						AND TGL_BERAKHIR >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(TGL_BERAKHIR,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 14:
				$sql = "
					SELECT
						simb_per_nama AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_simb_retribusi AS permohonan_retribusi
					FROM t_simb_det
					JOIN t_simb ON t_simb_det.det_simb_simb_id = t_simb.simb_id
					JOIN m_pemohon ON t_simb_det.det_simb_pemohon_id = m_pemohon.pemohon_id
					WHERE det_simb_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_simb_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_simb_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_simb_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
			case 15:
				$sql = "
					SELECT
						sipd_nama AS perusahaan_nama,
						pemohon_nama,
						pemohon_telp,
						pemohon_alamat,
						det_sipd_retribusi AS permohonan_retribusi
					FROM t_sipd_det
					JOIN t_sipd ON t_sipd_det.det_sipd_sipd_id = t_sipd.sipd_id
					JOIN m_pemohon ON t_sipd_det.det_sipd_pemohon_id = m_pemohon.pemohon_id
					WHERE det_sipd_id IS NOT NULL 
				";
				if($laporan_bayar_opsi == 'tanggal'){
					$sql .= " AND det_sipd_tanggal <= '".$laporan_bayar_tanggalAkhir."' 
						AND det_sipd_tanggal >= '".$laporan_bayar_tanggalAwal."' 
					";
				}else{
					$sql .= " AND DATE_FORMAT(det_sipd_tanggal,'%Y-%m') = '".$laporan_bayar_tahun.'-'.$laporan_bayar_bulan."' ";
				}
			break;
		}
		$result = $this->__listCore($sql, $params);
		return $result;
	}
	
}