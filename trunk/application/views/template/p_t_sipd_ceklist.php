<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Sipd_ceklist</title>
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
	<title>Daftar Data Sipd_ceklist</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Sipd_ceklist</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">sipd_cek_syarat_id</td>
				<th align="center">sipd_cek_sipd_id</td>
				<th align="center">sipd_cek_sipddet_id</td>
				<th align="center">sipd_cek_status</td>
				<th align="center">sipd_cek_keterangan</td>
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
					<td><?php echo $subrecord->sipd_cek_syarat_id; ?></td>
					<td><?php echo $subrecord->sipd_cek_sipd_id; ?></td>
					<td><?php echo $subrecord->sipd_cek_sipddet_id; ?></td>
					<td><?php echo $subrecord->sipd_cek_status; ?></td>
					<td><?php echo $subrecord->sipd_cek_keterangan; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="5" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>