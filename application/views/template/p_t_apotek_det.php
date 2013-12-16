<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Apotek_det</title>
	<xml>
	 <x:ExcelWorkbook>
	  <x:ExcelWorksheets>
	   <x:ExcelWorksheet>
		<x:Name>Sheet</x:Name>
		<x:WorksheetOptions>
		 <x:Print>
			<x:Gridlines />
		 </x:Print>
		</x:WorksheetOptions>
	   </x:ExcelWorksheet>
	  </x:ExcelWorksheets>
	 </x:ExcelWorkbook>
	</xml>
</head>
<body>
<?php }else{ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Apotek_det</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Apotek_det</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">det_apotek_apotek_id</td>
				<th align="center">det_apotek_jenis</td>
				<th align="center">det_apotek_surveylulus</td>
				<th align="center">det_apotek_nama</td>
				<th align="center">det_apotek_alamat</td>
				<th align="center">det_apotek_telp</td>
				<th align="center">det_apotek_sp</td>
				<th align="center">det_apotek_ktp</td>
				<th align="center">det_apotek_tempatlahir</td>
				<th align="center">det_apotek_tanggallahir</td>
				<th align="center">det_apotek_pekerjaan</td>
				<th align="center">det_apotek_npwp</td>
				<th align="center">det_apotek_stra</td>
				<th align="center">det_apotek_pendidikan</td>
				<th align="center">det_apotek_tahunlulus</td>
				<th align="center">det_apotek_terima</td>
				<th align="center">det_apotek_terimatanggal</td>
				<th align="center">det_apotek_kelengkapan</td>
				<th align="center">det_apotek_bap</td>
				<th align="center">det_apotek_baptanggal</td>
				<th align="center">det_apotek_keputusan</td>
				<th align="center">det_apotek_keterangan</td>
				<th align="center">det_apotek_jarak</td>
				<th align="center">det_apotek_rracik</td>
				<th align="center">det_apotek_radmin</td>
				<th align="center">det_apotek_rkerja</td>
				<th align="center">det_apotek_rtunggu</td>
				<th align="center">det_apotek_rwc</td>
				<th align="center">det_apotek_air</td>
				<th align="center">det_apotek_listrik</td>
				<th align="center">det_apotek_apk</td>
				<th align="center">det_apotek_apkukuran</td>
				<th align="center">det_apotek_jendela</td>
				<th align="center">det_apotek_limbah</td>
				<th align="center">det_apotek_baksampah</td>
				<th align="center">det_apotek_parkir</td>
				<th align="center">det_apotek_papannama</td>
				<th align="center">det_apotek_pengelola</td>
				<th align="center">det_apotek_pendamping</td>
				<th align="center">det_apotek_asisten</td>
				<th align="center">det_apotek_luas</td>
				<th align="center">det_apotek_statustanah</td>
				<th align="center">det_apotek_sewalama</td>
				<th align="center">det_apotek_sewaawal</td>
				<th align="center">det_apotek_sewaakhir</td>
				<th align="center">det_apotek_shnomor</td>
				<th align="center">det_apotek_shtahun</td>
				<th align="center">det_apotek_shgssu</td>
				<th align="center">det_apotek_shtanggal</td>
				<th align="center">det_apotek_shan</td>
				<th align="center">det_apotek_aktano</td>
				<th align="center">det_apotek_aktatahun</td>
				<th align="center">det_apotek_aktanotaris</td>
				<th align="center">det_apotek_aktaan</td>
				<th align="center">det_apotek_ckutipan</td>
				<th align="center">det_apotek_ckec</td>
				<th align="center">det_apotek_ctanggal</td>
				<th align="center">det_apotek_cpetok</td>
				<th align="center">det_apotek_cpersil</td>
				<th align="center">det_apotek_ckelas</td>
				<th align="center">det_apotek_can</td>
				<th align="center">det_apotek_sppihak1</td>
				<th align="center">det_apotek_sppihak2</td>
				<th align="center">det_apotek_spnomor</td>
				<th align="center">det_apotek_sptanggal</td>
				<th align="center">det_apotek_notaris</td>
				</tr>
		</thead>
		<tbody>
			<?php
			$total_record = 0; 
			if(count($records) > 0){ 
				foreach($records as $subrecord){
					$total_record++;
			?>
				<tr>
					<td><?php echo $total_record; ?></td>
					<td><?php echo $subrecord->det_apotek_apotek_id; ?></td>
					<td><?php echo $subrecord->det_apotek_jenis; ?></td>
					<td><?php echo $subrecord->det_apotek_surveylulus; ?></td>
					<td><?php echo $subrecord->det_apotek_nama; ?></td>
					<td><?php echo $subrecord->det_apotek_alamat; ?></td>
					<td><?php echo $subrecord->det_apotek_telp; ?></td>
					<td><?php echo $subrecord->det_apotek_sp; ?></td>
					<td><?php echo $subrecord->det_apotek_ktp; ?></td>
					<td><?php echo $subrecord->det_apotek_tempatlahir; ?></td>
					<td><?php echo $subrecord->det_apotek_tanggallahir; ?></td>
					<td><?php echo $subrecord->det_apotek_pekerjaan; ?></td>
					<td><?php echo $subrecord->det_apotek_npwp; ?></td>
					<td><?php echo $subrecord->det_apotek_stra; ?></td>
					<td><?php echo $subrecord->det_apotek_pendidikan; ?></td>
					<td><?php echo $subrecord->det_apotek_tahunlulus; ?></td>
					<td><?php echo $subrecord->det_apotek_terima; ?></td>
					<td><?php echo $subrecord->det_apotek_terimatanggal; ?></td>
					<td><?php echo $subrecord->det_apotek_kelengkapan; ?></td>
					<td><?php echo $subrecord->det_apotek_bap; ?></td>
					<td><?php echo $subrecord->det_apotek_baptanggal; ?></td>
					<td><?php echo $subrecord->det_apotek_keputusan; ?></td>
					<td><?php echo $subrecord->det_apotek_keterangan; ?></td>
					<td><?php echo $subrecord->det_apotek_jarak; ?></td>
					<td><?php echo $subrecord->det_apotek_rracik; ?></td>
					<td><?php echo $subrecord->det_apotek_radmin; ?></td>
					<td><?php echo $subrecord->det_apotek_rkerja; ?></td>
					<td><?php echo $subrecord->det_apotek_rtunggu; ?></td>
					<td><?php echo $subrecord->det_apotek_rwc; ?></td>
					<td><?php echo $subrecord->det_apotek_air; ?></td>
					<td><?php echo $subrecord->det_apotek_listrik; ?></td>
					<td><?php echo $subrecord->det_apotek_apk; ?></td>
					<td><?php echo $subrecord->det_apotek_apkukuran; ?></td>
					<td><?php echo $subrecord->det_apotek_jendela; ?></td>
					<td><?php echo $subrecord->det_apotek_limbah; ?></td>
					<td><?php echo $subrecord->det_apotek_baksampah; ?></td>
					<td><?php echo $subrecord->det_apotek_parkir; ?></td>
					<td><?php echo $subrecord->det_apotek_papannama; ?></td>
					<td><?php echo $subrecord->det_apotek_pengelola; ?></td>
					<td><?php echo $subrecord->det_apotek_pendamping; ?></td>
					<td><?php echo $subrecord->det_apotek_asisten; ?></td>
					<td><?php echo $subrecord->det_apotek_luas; ?></td>
					<td><?php echo $subrecord->det_apotek_statustanah; ?></td>
					<td><?php echo $subrecord->det_apotek_sewalama; ?></td>
					<td><?php echo $subrecord->det_apotek_sewaawal; ?></td>
					<td><?php echo $subrecord->det_apotek_sewaakhir; ?></td>
					<td><?php echo $subrecord->det_apotek_shnomor; ?></td>
					<td><?php echo $subrecord->det_apotek_shtahun; ?></td>
					<td><?php echo $subrecord->det_apotek_shgssu; ?></td>
					<td><?php echo $subrecord->det_apotek_shtanggal; ?></td>
					<td><?php echo $subrecord->det_apotek_shan; ?></td>
					<td><?php echo $subrecord->det_apotek_aktano; ?></td>
					<td><?php echo $subrecord->det_apotek_aktatahun; ?></td>
					<td><?php echo $subrecord->det_apotek_aktanotaris; ?></td>
					<td><?php echo $subrecord->det_apotek_aktaan; ?></td>
					<td><?php echo $subrecord->det_apotek_ckutipan; ?></td>
					<td><?php echo $subrecord->det_apotek_ckec; ?></td>
					<td><?php echo $subrecord->det_apotek_ctanggal; ?></td>
					<td><?php echo $subrecord->det_apotek_cpetok; ?></td>
					<td><?php echo $subrecord->det_apotek_cpersil; ?></td>
					<td><?php echo $subrecord->det_apotek_ckelas; ?></td>
					<td><?php echo $subrecord->det_apotek_can; ?></td>
					<td><?php echo $subrecord->det_apotek_sppihak1; ?></td>
					<td><?php echo $subrecord->det_apotek_sppihak2; ?></td>
					<td><?php echo $subrecord->det_apotek_spnomor; ?></td>
					<td><?php echo $subrecord->det_apotek_sptanggal; ?></td>
					<td><?php echo $subrecord->det_apotek_notaris; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="66" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>