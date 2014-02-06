<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data SIPD</title>
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
	<title>Daftar Data SIPD</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Data Izin Praktek Dokter</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">Jenis</td>
				<th align="center">Tanggal</td>
				<th align="center">Pemohon</td>
				<th align="center">Alamat</td>
				<th align="center">Telp</td>
				<th align="center">Nama Praktek</td>
				<th align="center">Lama Proses</td>
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
					<td><?php echo $subrecord->det_sipd_jenis_nama; ?></td>
					<td><?php echo date('d-m-Y', strtotime($subrecord->det_sipd_tanggal)); ?></td>
					<td><?php echo $subrecord->pemohon_nama; ?></td>
					<td><?php echo $subrecord->pemohon_alamat; ?></td>
					<td><?php echo $subrecord->pemohon_telp; ?></td>
					<td><?php echo $subrecord->sipd_nama; ?></td>
					<td><?php echo $subrecord->lamaproses; ?></td>
				</tr>
			<?php }} ?>			<tr>
				<td>Total</td>
				<td colspan="7"><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>