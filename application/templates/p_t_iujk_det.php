<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Iujk_det</title>
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
	<title>Daftar Data Iujk_det</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Iujk_det</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">det_iujk_iujk_id</td>
				<th align="center">det_iujk_nama</td>
				<th align="center">det_iujk_perusahaan</td>
				<th align="center">det_iujk_direktur</td>
				<th align="center">det_iujk_alamatusaha</td>
				<th align="center">det_iujk_nomorreg</td>
				<th align="center">det_iujk_tanggalreg</td>
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
					<td><?php echo $subrecord->det_iujk_iujk_id; ?></td>
					<td><?php echo $subrecord->det_iujk_nama; ?></td>
					<td><?php echo $subrecord->det_iujk_perusahaan; ?></td>
					<td><?php echo $subrecord->det_iujk_direktur; ?></td>
					<td><?php echo $subrecord->det_iujk_alamatusaha; ?></td>
					<td><?php echo $subrecord->det_iujk_nomorreg; ?></td>
					<td><?php echo $subrecord->det_iujk_tanggalreg; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="7" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>