<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Ayek</title>
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
	<title>Daftar Data Ayek</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Ayek</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">ID_TRAYEK_INTI</td>
				<th align="center">KODE_TRAYEK</td>
				<th align="center">NOMOR_UB</td>
				<th align="center">TGL_PERMOHONAN</td>
				<th align="center">NAMA_PERUSAHAAN</td>
				<th align="center">NAMA_PEMOHON</td>
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
					<td><?php echo $subrecord->ID_TRAYEK_INTI; ?></td>
					<td><?php echo $subrecord->KODE_TRAYEK; ?></td>
					<td><?php echo $subrecord->NOMOR_UB; ?></td>
					<td><?php echo $subrecord->TGL_PERMOHONAN; ?></td>
					<td><?php echo $subrecord->NAMA_PERUSAHAAN; ?></td>
					<td><?php echo $subrecord->NAMA_PEMOHON; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="6" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>