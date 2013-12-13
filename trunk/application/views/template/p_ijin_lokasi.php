<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data In_lokasi</title>
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
	<title>Daftar Data In_lokasi</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>In_lokasi</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">ID_IJIN_LOKASI_INTI</td>
				<th align="center">NO_KTP</td>
				<th align="center">NAMA_LENGKAP</td>
				<th align="center">TEMPAT_LAHIR</td>
				<th align="center">TGL_LAHIR</td>
				<th align="center">PEKERJAAN</td>
				<th align="center">ALAMAT</td>
				<th align="center">ID_DESA</td>
				<th align="center">ID_KECAMATAN</td>
				<th align="center">ID_KOTA</td>
				<th align="center">TELEPON_PEMOHON</td>
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
					<td><?php echo $subrecord->ID_IJIN_LOKASI_INTI; ?></td>
					<td><?php echo $subrecord->NO_KTP; ?></td>
					<td><?php echo $subrecord->NAMA_LENGKAP; ?></td>
					<td><?php echo $subrecord->TEMPAT_LAHIR; ?></td>
					<td><?php echo $subrecord->TGL_LAHIR; ?></td>
					<td><?php echo $subrecord->PEKERJAAN; ?></td>
					<td><?php echo $subrecord->ALAMAT; ?></td>
					<td><?php echo $subrecord->ID_DESA; ?></td>
					<td><?php echo $subrecord->ID_KECAMATAN; ?></td>
					<td><?php echo $subrecord->ID_KOTA; ?></td>
					<td><?php echo $subrecord->TELEPON_PEMOHON; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="11" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>