<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Sipd_det</title>
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
	<title>Daftar Data Sipd_det</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Sipd_det</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">det_sipd_sipd_id</td>
				<th align="center">det_sipd_jenis</td>
				<th align="center">det_sipd_tanggal</td>
				<th align="center">det_sipd_pemohon_id</td>
				<th align="center">det_sipd_nomorreg</td>
				<th align="center">det_sipd_proses</td>
				<th align="center">det_sipd_sk</td>
				<th align="center">det_sipd_skurut</td>
				<th align="center">det_sipd_berlaku</td>
				<th align="center">det_sipd_kadaluarsa</td>
				<th align="center">det_sipd_terima</td>
				<th align="center">det_sipd_terimatanggal</td>
				<th align="center">det_sipd_kelengkapan</td>
				<th align="center">det_sipd_bap</td>
				<th align="center">det_sipd_keputusan</td>
				<th align="center">det_sipd_baptanggal</td>
				<th align="center">det_sipd_sip</td>
				<th align="center">det_sipd_nrop</td>
				<th align="center">det_sipd_str</td>
				<th align="center">det_sipd_kompetensi</td>
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
					<td><?php echo $subrecord->det_sipd_sipd_id; ?></td>
					<td><?php echo $subrecord->det_sipd_jenis; ?></td>
					<td><?php echo $subrecord->det_sipd_tanggal; ?></td>
					<td><?php echo $subrecord->det_sipd_pemohon_id; ?></td>
					<td><?php echo $subrecord->det_sipd_nomorreg; ?></td>
					<td><?php echo $subrecord->det_sipd_proses; ?></td>
					<td><?php echo $subrecord->det_sipd_sk; ?></td>
					<td><?php echo $subrecord->det_sipd_skurut; ?></td>
					<td><?php echo $subrecord->det_sipd_berlaku; ?></td>
					<td><?php echo $subrecord->det_sipd_kadaluarsa; ?></td>
					<td><?php echo $subrecord->det_sipd_terima; ?></td>
					<td><?php echo $subrecord->det_sipd_terimatanggal; ?></td>
					<td><?php echo $subrecord->det_sipd_kelengkapan; ?></td>
					<td><?php echo $subrecord->det_sipd_bap; ?></td>
					<td><?php echo $subrecord->det_sipd_keputusan; ?></td>
					<td><?php echo $subrecord->det_sipd_baptanggal; ?></td>
					<td><?php echo $subrecord->det_sipd_sip; ?></td>
					<td><?php echo $subrecord->det_sipd_nrop; ?></td>
					<td><?php echo $subrecord->det_sipd_str; ?></td>
					<td><?php echo $subrecord->det_sipd_kompetensi; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="20" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>