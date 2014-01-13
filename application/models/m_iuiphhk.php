<?php
class M_iuiphhk extends App_Model{
	var $mainSql = "SELECT 
				ID_IUIPHHK,
				ID_PEMOHON,
				NO_SK,
				NO_SK_LAMA,
				JENIS_PERMOHONAN,
				NAMA_PERUSAHAAN,
				NPWP,
				ALAMAT,
				STATUS_MODAL,
				NAMA_NOTARIS,
				NO_AKTA,
				PENANGGUNG_JAWAB,
				NAMA_DIREKSI,
				DEWAN_KOMISARIS,
				TUJUAN_PRODUKSI,
				LOKASI_PABRIK,
				LUAS_TANAH,
				ALAMAT_PABRIK,
				OLAH1_P_TAHUN,
				OLAH1_P_BULAN,
				OLAH2_P_TAHUN,
				OLAH2_P_BULAN,
				OLAH3_P_TAHUN,
				OLAH3_P_BULAN,
				OLAH1_S_TAHUN,
				OLAH1_S_BULAN,
				OLAH2_S_TAHUN,
				OLAH2_S_BULAN,
				OLAH3_S_TAHUN,
				OLAH3_S_BULAN,
				MT_TANAH,
				MT_BANGUNAN,
				MT_MESIN,
				MT_DLL,
				MK_BAHAN_BAKU,
				MK_UPAH,
				MK_DLL,
				SP_MODAL_SENDIRI,
				SP_PINJAMAN,
				TKI_L_JUMLAH,
				TKI_P_JUMLAH,
				TKA_JUMLAH,
				TKA_ASAL,
				TKA_JABATAN,
				TKA_JANGKA_WAKTU,
				DN_JENIS_PRODUK1,
				DN_JENIS_PRODUK2,
				DN_JENIS_PRODUK3,
				E_JENIS_PRODUK1,
				E_JENIS_PRODUK2,
				E_JENIS_PRODUK3,
				MERK_JENIS_PRODUK,
				BBKB_DN_JUMLAH,
				BBKB_DN_SATUAN,
				BBKB_DN_ASAL,
				BBKB_DN_HARGA,
				BBKB_DN_KETERANGAN,
				BBKO_DN_JUMLAH,
				BBKO_DN_SATUAN,
				BBKO_DN_ASAL,
				BBKO_DN_HARGA,
				BBKO_DN_KETERANGAN,
				BP_DN_JUMLAH,
				BP_DN_SATUAN,
				BP_DN_ASAL,
				BP_DN_HARGA,
				BP_DN_KETERANGAN,
				RBB_LUAS_GUDANG,
				RBB_KAYU_OLAHAN,
				RBB_PENOLONG,
				RBB_HASIL_PRODUKSI,
				RLPLY_LOKASI,
				RLPLY_LUAS,
				RLPLY_PERIZINAN,
				RSD1_KAPASITAS,
				RSD1_JUMLAH,
				RSD211_KAPASITAS,
				RSD211_JUMLAH,
				RSD212_KAPASITAS,
				RSD212_JUMLAH,
				RSD213_KAPASITAS,
				RSD213_JUMLAH,
				RSD22_KAPASITAS,
				RSD22_JUMLAH,
				RSD23_KAPASITAS,
				RSD23_JUMLAH,
				RPL1_VOLUME,
				RPL1_SATUAN,
				RPL1_PENANGANAN,
				RPL2_VOLUME,
				RPL2_SATUAN,
				RPL2_PENANGANAN,
				RPL3_VOLUME,
				RPL3_SATUAN,
				RPL3_PENANGANAN,
				RPL4_VOLUME,
				RPL4_SATUAN,
				RPL4_PENANGANAN,
				PENYETUJU,
				NOMOR_SURAT,
				TGL_TERLAMPIR,
				TGL_PERMOHONAN,
				STATUS_SURVEY,
				STATUS,
				TGL_BERLAKU,
				TGL_BERAKHIR
				FROM iuiphhk 
			WHERE ID_IUIPHHK IS NOT NULL 
	";
	
	function __construct(){
        parent::__construct();
        $this->table_name = 'iuiphhk';
        $this->column_primary = 'ID_IUIPHHK';
        $this->column_order = '';
		$this->column_unique = '';
    }
	
	function getList($params){
		extract($params);
		$sql = $this->mainSql;
		if(@$searchText != ''){
			$sql .= "
				AND (
					ID_PEMOHON LIKE '%".$searchText."%' OR 
					NO_SK LIKE '%".$searchText."%' OR 
					NO_SK_LAMA LIKE '%".$searchText."%' OR 
					JENIS_PERMOHONAN LIKE '%".$searchText."%' OR 
					NAMA_PERUSAHAAN LIKE '%".$searchText."%' OR 
					NPWP LIKE '%".$searchText."%' OR 
					ALAMAT LIKE '%".$searchText."%' OR 
					STATUS_MODAL LIKE '%".$searchText."%' OR 
					NAMA_NOTARIS LIKE '%".$searchText."%' OR 
					NO_AKTA LIKE '%".$searchText."%' OR 
					PENANGGUNG_JAWAB LIKE '%".$searchText."%' OR 
					NAMA_DIREKSI LIKE '%".$searchText."%' OR 
					DEWAN_KOMISARIS LIKE '%".$searchText."%' OR 
					TUJUAN_PRODUKSI LIKE '%".$searchText."%' OR 
					LOKASI_PABRIK LIKE '%".$searchText."%' OR 
					LUAS_TANAH LIKE '%".$searchText."%' OR 
					ALAMAT_PABRIK LIKE '%".$searchText."%' OR 
					OLAH1_P_TAHUN LIKE '%".$searchText."%' OR 
					OLAH1_P_BULAN LIKE '%".$searchText."%' OR 
					OLAH2_P_TAHUN LIKE '%".$searchText."%' OR 
					OLAH2_P_BULAN LIKE '%".$searchText."%' OR 
					OLAH3_P_TAHUN LIKE '%".$searchText."%' OR 
					OLAH3_P_BULAN LIKE '%".$searchText."%' OR 
					OLAH1_S_TAHUN LIKE '%".$searchText."%' OR 
					OLAH1_S_BULAN LIKE '%".$searchText."%' OR 
					OLAH2_S_TAHUN LIKE '%".$searchText."%' OR 
					OLAH2_S_BULAN LIKE '%".$searchText."%' OR 
					OLAH3_S_TAHUN LIKE '%".$searchText."%' OR 
					OLAH3_S_BULAN LIKE '%".$searchText."%' OR 
					MT_TANAH LIKE '%".$searchText."%' OR 
					MT_BANGUNAN LIKE '%".$searchText."%' OR 
					MT_MESIN LIKE '%".$searchText."%' OR 
					MT_DLL LIKE '%".$searchText."%' OR 
					MK_BAHAN_BAKU LIKE '%".$searchText."%' OR 
					MK_UPAH LIKE '%".$searchText."%' OR 
					MK_DLL LIKE '%".$searchText."%' OR 
					SP_MODAL_SENDIRI LIKE '%".$searchText."%' OR 
					SP_PINJAMAN LIKE '%".$searchText."%' OR 
					TKI_L_JUMLAH LIKE '%".$searchText."%' OR 
					TKI_P_JUMLAH LIKE '%".$searchText."%' OR 
					TKA_JUMLAH LIKE '%".$searchText."%' OR 
					TKA_ASAL LIKE '%".$searchText."%' OR 
					TKA_JABATAN LIKE '%".$searchText."%' OR 
					TKA_JANGKA_WAKTU LIKE '%".$searchText."%' OR 
					DN_JENIS_PRODUK1 LIKE '%".$searchText."%' OR 
					DN_JENIS_PRODUK2 LIKE '%".$searchText."%' OR 
					DN_JENIS_PRODUK3 LIKE '%".$searchText."%' OR 
					E_JENIS_PRODUK1 LIKE '%".$searchText."%' OR 
					E_JENIS_PRODUK2 LIKE '%".$searchText."%' OR 
					E_JENIS_PRODUK3 LIKE '%".$searchText."%' OR 
					MERK_JENIS_PRODUK LIKE '%".$searchText."%' OR 
					BBKB_DN_JUMLAH LIKE '%".$searchText."%' OR 
					BBKB_DN_SATUAN LIKE '%".$searchText."%' OR 
					BBKB_DN_ASAL LIKE '%".$searchText."%' OR 
					BBKB_DN_HARGA LIKE '%".$searchText."%' OR 
					BBKB_DN_KETERANGAN LIKE '%".$searchText."%' OR 
					BBKO_DN_JUMLAH LIKE '%".$searchText."%' OR 
					BBKO_DN_SATUAN LIKE '%".$searchText."%' OR 
					BBKO_DN_ASAL LIKE '%".$searchText."%' OR 
					BBKO_DN_HARGA LIKE '%".$searchText."%' OR 
					BBKO_DN_KETERANGAN LIKE '%".$searchText."%' OR 
					BP_DN_JUMLAH LIKE '%".$searchText."%' OR 
					BP_DN_SATUAN LIKE '%".$searchText."%' OR 
					BP_DN_ASAL LIKE '%".$searchText."%' OR 
					BP_DN_HARGA LIKE '%".$searchText."%' OR 
					BP_DN_KETERANGAN LIKE '%".$searchText."%' OR 
					RBB_LUAS_GUDANG LIKE '%".$searchText."%' OR 
					RBB_KAYU_OLAHAN LIKE '%".$searchText."%' OR 
					RBB_PENOLONG LIKE '%".$searchText."%' OR 
					RBB_HASIL_PRODUKSI LIKE '%".$searchText."%' OR 
					RLPLY_LOKASI LIKE '%".$searchText."%' OR 
					RLPLY_LUAS LIKE '%".$searchText."%' OR 
					RLPLY_PERIZINAN LIKE '%".$searchText."%' OR 
					RSD1_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD1_JUMLAH LIKE '%".$searchText."%' OR 
					RSD211_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD211_JUMLAH LIKE '%".$searchText."%' OR 
					RSD212_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD212_JUMLAH LIKE '%".$searchText."%' OR 
					RSD213_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD213_JUMLAH LIKE '%".$searchText."%' OR 
					RSD22_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD22_JUMLAH LIKE '%".$searchText."%' OR 
					RSD23_KAPASITAS LIKE '%".$searchText."%' OR 
					RSD23_JUMLAH LIKE '%".$searchText."%' OR 
					RPL1_VOLUME LIKE '%".$searchText."%' OR 
					RPL1_SATUAN LIKE '%".$searchText."%' OR 
					RPL1_PENANGANAN LIKE '%".$searchText."%' OR 
					RPL2_VOLUME LIKE '%".$searchText."%' OR 
					RPL2_SATUAN LIKE '%".$searchText."%' OR 
					RPL2_PENANGANAN LIKE '%".$searchText."%' OR 
					RPL3_VOLUME LIKE '%".$searchText."%' OR 
					RPL3_SATUAN LIKE '%".$searchText."%' OR 
					RPL3_PENANGANAN LIKE '%".$searchText."%' OR 
					RPL4_VOLUME LIKE '%".$searchText."%' OR 
					RPL4_SATUAN LIKE '%".$searchText."%' OR 
					RPL4_PENANGANAN LIKE '%".$searchText."%' OR 
					PENYETUJU LIKE '%".$searchText."%' OR 
					NOMOR_SURAT LIKE '%".$searchText."%' OR 
					TGL_TERLAMPIR LIKE '%".$searchText."%' OR 
					TGL_PERMOHONAN LIKE '%".$searchText."%' OR 
					STATUS_SURVEY LIKE '%".$searchText."%' OR 
					STATUS LIKE '%".$searchText."%' OR 
					TGL_BERLAKU LIKE '%".$searchText."%' OR 
					TGL_BERAKHIR LIKE '%".$searchText."%'
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
		
		if(@$ID_PEMOHON != ''){
			$sql .= " AND ID_PEMOHON LIKE '%".$ID_PEMOHON."%' ";
		}
		if(@$NO_SK != ''){
			$sql .= " AND NO_SK LIKE '%".$NO_SK."%' ";
		}
		if(@$NO_SK_LAMA != ''){
			$sql .= " AND NO_SK_LAMA LIKE '%".$NO_SK_LAMA."%' ";
		}
		if(@$JENIS_PERMOHONAN != ''){
			$sql .= " AND JENIS_PERMOHONAN LIKE '%".$JENIS_PERMOHONAN."%' ";
		}
		if(@$NAMA_PERUSAHAAN != ''){
			$sql .= " AND NAMA_PERUSAHAAN LIKE '%".$NAMA_PERUSAHAAN."%' ";
		}
		if(@$NPWP != ''){
			$sql .= " AND NPWP LIKE '%".$NPWP."%' ";
		}
		if(@$ALAMAT != ''){
			$sql .= " AND ALAMAT LIKE '%".$ALAMAT."%' ";
		}
		if(@$STATUS_MODAL != ''){
			$sql .= " AND STATUS_MODAL LIKE '%".$STATUS_MODAL."%' ";
		}
		if(@$NAMA_NOTARIS != ''){
			$sql .= " AND NAMA_NOTARIS LIKE '%".$NAMA_NOTARIS."%' ";
		}
		if(@$NO_AKTA != ''){
			$sql .= " AND NO_AKTA LIKE '%".$NO_AKTA."%' ";
		}
		if(@$PENANGGUNG_JAWAB != ''){
			$sql .= " AND PENANGGUNG_JAWAB LIKE '%".$PENANGGUNG_JAWAB."%' ";
		}
		if(@$NAMA_DIREKSI != ''){
			$sql .= " AND NAMA_DIREKSI LIKE '%".$NAMA_DIREKSI."%' ";
		}
		if(@$DEWAN_KOMISARIS != ''){
			$sql .= " AND DEWAN_KOMISARIS LIKE '%".$DEWAN_KOMISARIS."%' ";
		}
		if(@$TUJUAN_PRODUKSI != ''){
			$sql .= " AND TUJUAN_PRODUKSI LIKE '%".$TUJUAN_PRODUKSI."%' ";
		}
		if(@$LOKASI_PABRIK != ''){
			$sql .= " AND LOKASI_PABRIK LIKE '%".$LOKASI_PABRIK."%' ";
		}
		if(@$LUAS_TANAH != ''){
			$sql .= " AND LUAS_TANAH LIKE '%".$LUAS_TANAH."%' ";
		}
		if(@$ALAMAT_PABRIK != ''){
			$sql .= " AND ALAMAT_PABRIK LIKE '%".$ALAMAT_PABRIK."%' ";
		}
		if(@$OLAH1_P_TAHUN != ''){
			$sql .= " AND OLAH1_P_TAHUN LIKE '%".$OLAH1_P_TAHUN."%' ";
		}
		if(@$OLAH1_P_BULAN != ''){
			$sql .= " AND OLAH1_P_BULAN LIKE '%".$OLAH1_P_BULAN."%' ";
		}
		if(@$OLAH2_P_TAHUN != ''){
			$sql .= " AND OLAH2_P_TAHUN LIKE '%".$OLAH2_P_TAHUN."%' ";
		}
		if(@$OLAH2_P_BULAN != ''){
			$sql .= " AND OLAH2_P_BULAN LIKE '%".$OLAH2_P_BULAN."%' ";
		}
		if(@$OLAH3_P_TAHUN != ''){
			$sql .= " AND OLAH3_P_TAHUN LIKE '%".$OLAH3_P_TAHUN."%' ";
		}
		if(@$OLAH3_P_BULAN != ''){
			$sql .= " AND OLAH3_P_BULAN LIKE '%".$OLAH3_P_BULAN."%' ";
		}
		if(@$OLAH1_S_TAHUN != ''){
			$sql .= " AND OLAH1_S_TAHUN LIKE '%".$OLAH1_S_TAHUN."%' ";
		}
		if(@$OLAH1_S_BULAN != ''){
			$sql .= " AND OLAH1_S_BULAN LIKE '%".$OLAH1_S_BULAN."%' ";
		}
		if(@$OLAH2_S_TAHUN != ''){
			$sql .= " AND OLAH2_S_TAHUN LIKE '%".$OLAH2_S_TAHUN."%' ";
		}
		if(@$OLAH2_S_BULAN != ''){
			$sql .= " AND OLAH2_S_BULAN LIKE '%".$OLAH2_S_BULAN."%' ";
		}
		if(@$OLAH3_S_TAHUN != ''){
			$sql .= " AND OLAH3_S_TAHUN LIKE '%".$OLAH3_S_TAHUN."%' ";
		}
		if(@$OLAH3_S_BULAN != ''){
			$sql .= " AND OLAH3_S_BULAN LIKE '%".$OLAH3_S_BULAN."%' ";
		}
		if(@$MT_TANAH != ''){
			$sql .= " AND MT_TANAH LIKE '%".$MT_TANAH."%' ";
		}
		if(@$MT_BANGUNAN != ''){
			$sql .= " AND MT_BANGUNAN LIKE '%".$MT_BANGUNAN."%' ";
		}
		if(@$MT_MESIN != ''){
			$sql .= " AND MT_MESIN LIKE '%".$MT_MESIN."%' ";
		}
		if(@$MT_DLL != ''){
			$sql .= " AND MT_DLL LIKE '%".$MT_DLL."%' ";
		}
		if(@$MK_BAHAN_BAKU != ''){
			$sql .= " AND MK_BAHAN_BAKU LIKE '%".$MK_BAHAN_BAKU."%' ";
		}
		if(@$MK_UPAH != ''){
			$sql .= " AND MK_UPAH LIKE '%".$MK_UPAH."%' ";
		}
		if(@$MK_DLL != ''){
			$sql .= " AND MK_DLL LIKE '%".$MK_DLL."%' ";
		}
		if(@$SP_MODAL_SENDIRI != ''){
			$sql .= " AND SP_MODAL_SENDIRI LIKE '%".$SP_MODAL_SENDIRI."%' ";
		}
		if(@$SP_PINJAMAN != ''){
			$sql .= " AND SP_PINJAMAN LIKE '%".$SP_PINJAMAN."%' ";
		}
		if(@$TKI_L_JUMLAH != ''){
			$sql .= " AND TKI_L_JUMLAH LIKE '%".$TKI_L_JUMLAH."%' ";
		}
		if(@$TKI_P_JUMLAH != ''){
			$sql .= " AND TKI_P_JUMLAH LIKE '%".$TKI_P_JUMLAH."%' ";
		}
		if(@$TKA_JUMLAH != ''){
			$sql .= " AND TKA_JUMLAH LIKE '%".$TKA_JUMLAH."%' ";
		}
		if(@$TKA_ASAL != ''){
			$sql .= " AND TKA_ASAL LIKE '%".$TKA_ASAL."%' ";
		}
		if(@$TKA_JABATAN != ''){
			$sql .= " AND TKA_JABATAN LIKE '%".$TKA_JABATAN."%' ";
		}
		if(@$TKA_JANGKA_WAKTU != ''){
			$sql .= " AND TKA_JANGKA_WAKTU LIKE '%".$TKA_JANGKA_WAKTU."%' ";
		}
		if(@$DN_JENIS_PRODUK1 != ''){
			$sql .= " AND DN_JENIS_PRODUK1 LIKE '%".$DN_JENIS_PRODUK1."%' ";
		}
		if(@$DN_JENIS_PRODUK2 != ''){
			$sql .= " AND DN_JENIS_PRODUK2 LIKE '%".$DN_JENIS_PRODUK2."%' ";
		}
		if(@$DN_JENIS_PRODUK3 != ''){
			$sql .= " AND DN_JENIS_PRODUK3 LIKE '%".$DN_JENIS_PRODUK3."%' ";
		}
		if(@$E_JENIS_PRODUK1 != ''){
			$sql .= " AND E_JENIS_PRODUK1 LIKE '%".$E_JENIS_PRODUK1."%' ";
		}
		if(@$E_JENIS_PRODUK2 != ''){
			$sql .= " AND E_JENIS_PRODUK2 LIKE '%".$E_JENIS_PRODUK2."%' ";
		}
		if(@$E_JENIS_PRODUK3 != ''){
			$sql .= " AND E_JENIS_PRODUK3 LIKE '%".$E_JENIS_PRODUK3."%' ";
		}
		if(@$MERK_JENIS_PRODUK != ''){
			$sql .= " AND MERK_JENIS_PRODUK LIKE '%".$MERK_JENIS_PRODUK."%' ";
		}
		if(@$BBKB_DN_JUMLAH != ''){
			$sql .= " AND BBKB_DN_JUMLAH LIKE '%".$BBKB_DN_JUMLAH."%' ";
		}
		if(@$BBKB_DN_SATUAN != ''){
			$sql .= " AND BBKB_DN_SATUAN LIKE '%".$BBKB_DN_SATUAN."%' ";
		}
		if(@$BBKB_DN_ASAL != ''){
			$sql .= " AND BBKB_DN_ASAL LIKE '%".$BBKB_DN_ASAL."%' ";
		}
		if(@$BBKB_DN_HARGA != ''){
			$sql .= " AND BBKB_DN_HARGA LIKE '%".$BBKB_DN_HARGA."%' ";
		}
		if(@$BBKB_DN_KETERANGAN != ''){
			$sql .= " AND BBKB_DN_KETERANGAN LIKE '%".$BBKB_DN_KETERANGAN."%' ";
		}
		if(@$BBKO_DN_JUMLAH != ''){
			$sql .= " AND BBKO_DN_JUMLAH LIKE '%".$BBKO_DN_JUMLAH."%' ";
		}
		if(@$BBKO_DN_SATUAN != ''){
			$sql .= " AND BBKO_DN_SATUAN LIKE '%".$BBKO_DN_SATUAN."%' ";
		}
		if(@$BBKO_DN_ASAL != ''){
			$sql .= " AND BBKO_DN_ASAL LIKE '%".$BBKO_DN_ASAL."%' ";
		}
		if(@$BBKO_DN_HARGA != ''){
			$sql .= " AND BBKO_DN_HARGA LIKE '%".$BBKO_DN_HARGA."%' ";
		}
		if(@$BBKO_DN_KETERANGAN != ''){
			$sql .= " AND BBKO_DN_KETERANGAN LIKE '%".$BBKO_DN_KETERANGAN."%' ";
		}
		if(@$BP_DN_JUMLAH != ''){
			$sql .= " AND BP_DN_JUMLAH LIKE '%".$BP_DN_JUMLAH."%' ";
		}
		if(@$BP_DN_SATUAN != ''){
			$sql .= " AND BP_DN_SATUAN LIKE '%".$BP_DN_SATUAN."%' ";
		}
		if(@$BP_DN_ASAL != ''){
			$sql .= " AND BP_DN_ASAL LIKE '%".$BP_DN_ASAL."%' ";
		}
		if(@$BP_DN_HARGA != ''){
			$sql .= " AND BP_DN_HARGA LIKE '%".$BP_DN_HARGA."%' ";
		}
		if(@$BP_DN_KETERANGAN != ''){
			$sql .= " AND BP_DN_KETERANGAN LIKE '%".$BP_DN_KETERANGAN."%' ";
		}
		if(@$RBB_LUAS_GUDANG != ''){
			$sql .= " AND RBB_LUAS_GUDANG LIKE '%".$RBB_LUAS_GUDANG."%' ";
		}
		if(@$RBB_KAYU_OLAHAN != ''){
			$sql .= " AND RBB_KAYU_OLAHAN LIKE '%".$RBB_KAYU_OLAHAN."%' ";
		}
		if(@$RBB_PENOLONG != ''){
			$sql .= " AND RBB_PENOLONG LIKE '%".$RBB_PENOLONG."%' ";
		}
		if(@$RBB_HASIL_PRODUKSI != ''){
			$sql .= " AND RBB_HASIL_PRODUKSI LIKE '%".$RBB_HASIL_PRODUKSI."%' ";
		}
		if(@$RLPLY_LOKASI != ''){
			$sql .= " AND RLPLY_LOKASI LIKE '%".$RLPLY_LOKASI."%' ";
		}
		if(@$RLPLY_LUAS != ''){
			$sql .= " AND RLPLY_LUAS LIKE '%".$RLPLY_LUAS."%' ";
		}
		if(@$RLPLY_PERIZINAN != ''){
			$sql .= " AND RLPLY_PERIZINAN LIKE '%".$RLPLY_PERIZINAN."%' ";
		}
		if(@$RSD1_KAPASITAS != ''){
			$sql .= " AND RSD1_KAPASITAS LIKE '%".$RSD1_KAPASITAS."%' ";
		}
		if(@$RSD1_JUMLAH != ''){
			$sql .= " AND RSD1_JUMLAH LIKE '%".$RSD1_JUMLAH."%' ";
		}
		if(@$RSD211_KAPASITAS != ''){
			$sql .= " AND RSD211_KAPASITAS LIKE '%".$RSD211_KAPASITAS."%' ";
		}
		if(@$RSD211_JUMLAH != ''){
			$sql .= " AND RSD211_JUMLAH LIKE '%".$RSD211_JUMLAH."%' ";
		}
		if(@$RSD212_KAPASITAS != ''){
			$sql .= " AND RSD212_KAPASITAS LIKE '%".$RSD212_KAPASITAS."%' ";
		}
		if(@$RSD212_JUMLAH != ''){
			$sql .= " AND RSD212_JUMLAH LIKE '%".$RSD212_JUMLAH."%' ";
		}
		if(@$RSD213_KAPASITAS != ''){
			$sql .= " AND RSD213_KAPASITAS LIKE '%".$RSD213_KAPASITAS."%' ";
		}
		if(@$RSD213_JUMLAH != ''){
			$sql .= " AND RSD213_JUMLAH LIKE '%".$RSD213_JUMLAH."%' ";
		}
		if(@$RSD22_KAPASITAS != ''){
			$sql .= " AND RSD22_KAPASITAS LIKE '%".$RSD22_KAPASITAS."%' ";
		}
		if(@$RSD22_JUMLAH != ''){
			$sql .= " AND RSD22_JUMLAH LIKE '%".$RSD22_JUMLAH."%' ";
		}
		if(@$RSD23_KAPASITAS != ''){
			$sql .= " AND RSD23_KAPASITAS LIKE '%".$RSD23_KAPASITAS."%' ";
		}
		if(@$RSD23_JUMLAH != ''){
			$sql .= " AND RSD23_JUMLAH LIKE '%".$RSD23_JUMLAH."%' ";
		}
		if(@$RPL1_VOLUME != ''){
			$sql .= " AND RPL1_VOLUME LIKE '%".$RPL1_VOLUME."%' ";
		}
		if(@$RPL1_SATUAN != ''){
			$sql .= " AND RPL1_SATUAN LIKE '%".$RPL1_SATUAN."%' ";
		}
		if(@$RPL1_PENANGANAN != ''){
			$sql .= " AND RPL1_PENANGANAN LIKE '%".$RPL1_PENANGANAN."%' ";
		}
		if(@$RPL2_VOLUME != ''){
			$sql .= " AND RPL2_VOLUME LIKE '%".$RPL2_VOLUME."%' ";
		}
		if(@$RPL2_SATUAN != ''){
			$sql .= " AND RPL2_SATUAN LIKE '%".$RPL2_SATUAN."%' ";
		}
		if(@$RPL2_PENANGANAN != ''){
			$sql .= " AND RPL2_PENANGANAN LIKE '%".$RPL2_PENANGANAN."%' ";
		}
		if(@$RPL3_VOLUME != ''){
			$sql .= " AND RPL3_VOLUME LIKE '%".$RPL3_VOLUME."%' ";
		}
		if(@$RPL3_SATUAN != ''){
			$sql .= " AND RPL3_SATUAN LIKE '%".$RPL3_SATUAN."%' ";
		}
		if(@$RPL3_PENANGANAN != ''){
			$sql .= " AND RPL3_PENANGANAN LIKE '%".$RPL3_PENANGANAN."%' ";
		}
		if(@$RPL4_VOLUME != ''){
			$sql .= " AND RPL4_VOLUME LIKE '%".$RPL4_VOLUME."%' ";
		}
		if(@$RPL4_SATUAN != ''){
			$sql .= " AND RPL4_SATUAN LIKE '%".$RPL4_SATUAN."%' ";
		}
		if(@$RPL4_PENANGANAN != ''){
			$sql .= " AND RPL4_PENANGANAN LIKE '%".$RPL4_PENANGANAN."%' ";
		}
		if(@$PENYETUJU != ''){
			$sql .= " AND PENYETUJU LIKE '%".$PENYETUJU."%' ";
		}
		if(@$NOMOR_SURAT != ''){
			$sql .= " AND NOMOR_SURAT LIKE '%".$NOMOR_SURAT."%' ";
		}
		if(@$TGL_TERLAMPIR != ''){
			$sql .= " AND TGL_TERLAMPIR LIKE '%".$TGL_TERLAMPIR."%' ";
		}
		if(@$TGL_PERMOHONAN != ''){
			$sql .= " AND TGL_PERMOHONAN LIKE '%".$TGL_PERMOHONAN."%' ";
		}
		if(@$STATUS_SURVEY != ''){
			$sql .= " AND STATUS_SURVEY LIKE '%".$STATUS_SURVEY."%' ";
		}
		if(@$STATUS != ''){
			$sql .= " AND STATUS LIKE '%".$STATUS."%' ";
		}
		if(@$TGL_BERLAKU != ''){
			$sql .= " AND TGL_BERLAKU LIKE '%".$TGL_BERLAKU."%' ";
		}
		if(@$TGL_BERAKHIR != ''){
			$sql .= " AND TGL_BERAKHIR LIKE '%".$TGL_BERAKHIR."%' ";
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