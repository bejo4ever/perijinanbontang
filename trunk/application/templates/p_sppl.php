<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Pl</title>
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
	<title>Daftar Data Pl</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Pl</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">ID_USER</td>
				<th align="center">NO_SK</td>
				<th align="center">NAMA_USAHA</td>
				<th align="center">PENANGGUNG_JAWAB</td>
				<th align="center">NO_TELP</td>
				<th align="center">JENIS_USAHA</td>
				<th align="center">ALAMAT_USAHA</td>
				<th align="center">STATUS_LAHAN</td>
				<th align="center">NO_AKTA</td>
				<th align="center">TANGGAL</td>
				<th align="center">LUAS_LAHAN</td>
				<th align="center">LUAS_TAPAK_BANGUNAN</td>
				<th align="center">LUAS_KEGIATAN</td>
				<th align="center">LUAS_PARKIR</td>
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
					<td><?php echo $subrecord->ID_USER; ?></td>
					<td><?php echo $subrecord->NO_SK; ?></td>
					<td><?php echo $subrecord->NAMA_USAHA; ?></td>
					<td><?php echo $subrecord->PENANGGUNG_JAWAB; ?></td>
					<td><?php echo $subrecord->NO_TELP; ?></td>
					<td><?php echo $subrecord->JENIS_USAHA; ?></td>
					<td><?php echo $subrecord->ALAMAT_USAHA; ?></td>
					<td><?php echo $subrecord->STATUS_LAHAN; ?></td>
					<td><?php echo $subrecord->NO_AKTA; ?></td>
					<td><?php echo $subrecord->TANGGAL; ?></td>
					<td><?php echo $subrecord->LUAS_LAHAN; ?></td>
					<td><?php echo $subrecord->LUAS_TAPAK_BANGUNAN; ?></td>
					<td><?php echo $subrecord->LUAS_KEGIATAN; ?></td>
					<td><?php echo $subrecord->LUAS_PARKIR; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="14" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>