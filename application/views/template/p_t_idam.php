<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Idam</title>
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
	<title>Daftar Data Idam</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Idam</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">idam_jenis</td>
				<th align="center">idam_tanggal</td>
				<th align="center">idam_status</td>
				<th align="center">idam_keterangan</td>
				<th align="center">idam_bap</td>
				<th align="center">idam_baptanggal</td>
				<th align="center">idam_kelengkapan</td>
				<th align="center">idam_terima</td>
				<th align="center">idam_terimatanggal</td>
				<th align="center">idam_usaha</td>
				<th align="center">idam_jenisusaha</td>
				<th align="center">idam_alamat</td>
				<th align="center">idam_sertifikatpkp</td>
				<th align="center">idam_nomorijin</td>
				<th align="center">idam_nomorurut</td>
				<th align="center">idam_berlaku</td>
				<th align="center">idam_kadaluarsa</td>
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
					<td><?php echo $subrecord->idam_jenis; ?></td>
					<td><?php echo $subrecord->idam_tanggal; ?></td>
					<td><?php echo $subrecord->idam_status; ?></td>
					<td><?php echo $subrecord->idam_keterangan; ?></td>
					<td><?php echo $subrecord->idam_bap; ?></td>
					<td><?php echo $subrecord->idam_baptanggal; ?></td>
					<td><?php echo $subrecord->idam_kelengkapan; ?></td>
					<td><?php echo $subrecord->idam_terima; ?></td>
					<td><?php echo $subrecord->idam_terimatanggal; ?></td>
					<td><?php echo $subrecord->idam_usaha; ?></td>
					<td><?php echo $subrecord->idam_jenisusaha; ?></td>
					<td><?php echo $subrecord->idam_alamat; ?></td>
					<td><?php echo $subrecord->idam_sertifikatpkp; ?></td>
					<td><?php echo $subrecord->idam_nomorijin; ?></td>
					<td><?php echo $subrecord->idam_nomorurut; ?></td>
					<td><?php echo $subrecord->idam_berlaku; ?></td>
					<td><?php echo $subrecord->idam_kadaluarsa; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="17" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>