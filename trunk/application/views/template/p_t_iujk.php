<?php if(@$type=="EXCEL"){ ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Daftar Data Iujk</title>
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
	<title>Daftar Data Iujk</title>
	<link rel='stylesheet' type='text/css' href='../assets/css/printstyle.css'/>
</head>
<body onload="window.print();">
<?php } ?>	<table>
		<caption>Iujk</caption>
		<thead>
			<tr>
				<th align="center" width="50">No</td>
				<th align="center">iujk_perusahaan</td>
				<th align="center">iujk_alamat</td>
				<th align="center">iujk_direktur</td>
				<th align="center">iujk_golongan</td>
				<th align="center">iujk_kualifikasi</td>
				<th align="center">iujk_bidangusaha</td>
				<th align="center">iujk_rt</td>
				<th align="center">iujk_rw</td>
				<th align="center">iujk_kelurahan</td>
				<th align="center">iujk_kota</td>
				<th align="center">iujk_propinsi</td>
				<th align="center">iujk_telepon</td>
				<th align="center">iujk_kodepos</td>
				<th align="center">iujk_fax</td>
				<th align="center">iujk_npwp</td>
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
					<td><?php echo $subrecord->iujk_perusahaan; ?></td>
					<td><?php echo $subrecord->iujk_alamat; ?></td>
					<td><?php echo $subrecord->iujk_direktur; ?></td>
					<td><?php echo $subrecord->iujk_golongan; ?></td>
					<td><?php echo $subrecord->iujk_kualifikasi; ?></td>
					<td><?php echo $subrecord->iujk_bidangusaha; ?></td>
					<td><?php echo $subrecord->iujk_rt; ?></td>
					<td><?php echo $subrecord->iujk_rw; ?></td>
					<td><?php echo $subrecord->iujk_kelurahan; ?></td>
					<td><?php echo $subrecord->iujk_kota; ?></td>
					<td><?php echo $subrecord->iujk_propinsi; ?></td>
					<td><?php echo $subrecord->iujk_telepon; ?></td>
					<td><?php echo $subrecord->iujk_kodepos; ?></td>
					<td><?php echo $subrecord->iujk_fax; ?></td>
					<td><?php echo $subrecord->iujk_npwp; ?></td>
					</tr>
			<?php }} ?>			<tr>
				<td colspan="15" align="left">Total</td>
				<td><?php echo $total_record; ?></td>
			</tr>
		<tbody>
	</table>
</body>
</html>