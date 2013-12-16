<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Ipmbl_dok</title>
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
	<title>Daftar Data Ipmbl_dok</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Ipmbl_dok</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">dok_ipmbl_penerima</td>
				<th align="center">dok_ipmbl_jabatan</td>
				<th align="center">dok_ipmbl_tanggal</td>
				<th align="center">dok_ipmbl_keterangan</td>
				<th align="center">dok_ipmbl_ipmbl_id</td>
				<th align="center">dok_ipmbl_ipmbldet_id</td>
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
					<td><?php echo $subrecord->dok_ipmbl_penerima; ?></td>
					<td><?php echo $subrecord->dok_ipmbl_jabatan; ?></td>
					<td><?php echo $subrecord->dok_ipmbl_tanggal; ?></td>
					<td><?php echo $subrecord->dok_ipmbl_keterangan; ?></td>
					<td><?php echo $subrecord->dok_ipmbl_ipmbl_id; ?></td>
					<td><?php echo $subrecord->dok_ipmbl_ipmbldet_id; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="6" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>