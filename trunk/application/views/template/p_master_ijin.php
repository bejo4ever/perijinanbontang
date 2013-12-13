<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Ster_ijin</title>
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
	<title>Daftar Data Ster_ijin</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Ster_ijin</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">NAMA_IJIN</td>
				<th align="center">NAMA_PEJABAT</td>
				<th align="center">NIP_PEJABAT</td>
				<th align="center">JABATAN</td>
				<th align="center">PANGKAT</td>
				<th align="center">ATASNAMA</td>
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
					<td><?php echo $subrecord->NAMA_IJIN; ?></td>
					<td><?php echo $subrecord->NAMA_PEJABAT; ?></td>
					<td><?php echo $subrecord->NIP_PEJABAT; ?></td>
					<td><?php echo $subrecord->JABATAN; ?></td>
					<td><?php echo $subrecord->PANGKAT; ?></td>
					<td><?php echo $subrecord->ATASNAMA; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="6" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>