<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Tr</title>
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
	<title>Daftar Data Tr</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Tr</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">ID_USER</td>
				<th align="center">NAMA_PEMOHON</td>
				<th align="center">NO_TELP</td>
				<th align="center">HAK_MILIK</td>
				<th align="center">NAMA_PEMILIK</td>
				<th align="center">NO_SURAT_TANAH</td>
				<th align="center">ALAMAT_BANGUNAN</td>
				<th align="center">RENCANA_PERUNTUKAN</td>
				<th align="center">TINGGI_BANGUNAN</td>
				<th align="center">LUAS_PERSIL</td>
				<th align="center">LUAS_BANGUNAN</td>
				<th align="center">BATAS_KIRI</td>
				<th align="center">BATAS_KANAN</td>
				<th align="center">BATAS_DEPAN</td>
				<th align="center">BATAS_BELAKANG</td>
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
					<td><?php echo $subrecord->NAMA_PEMOHON; ?></td>
					<td><?php echo $subrecord->NO_TELP; ?></td>
					<td><?php echo $subrecord->HAK_MILIK; ?></td>
					<td><?php echo $subrecord->NAMA_PEMILIK; ?></td>
					<td><?php echo $subrecord->NO_SURAT_TANAH; ?></td>
					<td><?php echo $subrecord->ALAMAT_BANGUNAN; ?></td>
					<td><?php echo $subrecord->RENCANA_PERUNTUKAN; ?></td>
					<td><?php echo $subrecord->TINGGI_BANGUNAN; ?></td>
					<td><?php echo $subrecord->LUAS_PERSIL; ?></td>
					<td><?php echo $subrecord->LUAS_BANGUNAN; ?></td>
					<td><?php echo $subrecord->BATAS_KIRI; ?></td>
					<td><?php echo $subrecord->BATAS_KANAN; ?></td>
					<td><?php echo $subrecord->BATAS_DEPAN; ?></td>
					<td><?php echo $subrecord->BATAS_BELAKANG; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="15" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>