<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data In_lingkungan_inti</title>
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
	<title>Daftar Data In_lingkungan_inti</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>In_lingkungan_inti</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">NO_REG</td>
				<th align="center">JENIS_USAHA</td>
				<th align="center">ALAMAT</td>
				<th align="center">ID_KELURAHAN</td>
				<th align="center">ID_KECAMATAN</td>
				<th align="center">ID_KOTA</td>
				<th align="center">STATUS_LOKASI</td>
				<th align="center">LUAS USAHA</td>
				<th align="center">LUAS_BAHAN</td>
				<th align="center">LUAS_BANGUNAN</td>
				<th align="center">LUAS_RUANG_USAHA</td>
				<th align="center">KAPASITAS</td>
				<th align="center">IZIN_SKTR</td>
				<th align="center">IZIN_LOKASI</td>
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
					<td><?php echo $subrecord->NO_REG; ?></td>
					<td><?php echo $subrecord->JENIS_USAHA; ?></td>
					<td><?php echo $subrecord->ALAMAT; ?></td>
					<td><?php echo $subrecord->ID_KELURAHAN; ?></td>
					<td><?php echo $subrecord->ID_KECAMATAN; ?></td>
					<td><?php echo $subrecord->ID_KOTA; ?></td>
					<td><?php echo $subrecord->STATUS_LOKASI; ?></td>
					<td><?php echo $subrecord->LUAS USAHA; ?></td>
					<td><?php echo $subrecord->LUAS_BAHAN; ?></td>
					<td><?php echo $subrecord->LUAS_BANGUNAN; ?></td>
					<td><?php echo $subrecord->LUAS_RUANG_USAHA; ?></td>
					<td><?php echo $subrecord->KAPASITAS; ?></td>
					<td><?php echo $subrecord->IZIN_SKTR; ?></td>
					<td><?php echo $subrecord->IZIN_LOKASI; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="14" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>